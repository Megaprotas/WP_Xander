<?php

@require_once get_template_directory() . '/inc/customizer.php';

// banner design function + fallback function in case title is not provided. So it's set title to page name from template 
function pageBanner($args = NULL) {
    if (!$args['title']) {
        $args['title'] = get_the_title();
    } 
    
    if (!$args['tagline']) {
        $args['tagline'] = get_field('banner_tagline');
    }

    if (!$args['photo']) {
        if (get_field('bground-pic') AND !is_archive() AND !is_home()) {
            $args['photo'] = get_field('bground-pic')['sizes']['pageBanner'];
        } else {
            $args['photo'] = get_theme_file_uri('/images/pageBanner.jpg');
        }
    }
    ?>
    <div class="banner-style container-fluid" style="background-image: url(<?php echo $args['photo']; ?>);">
        <div class="row">
            <div class="col-xs-12 offset-md-3">
                <h3 class="content-title"><?php echo $args['title'] ?></h3>
                <p class='page-tagline'><?php echo $args['tagline']; ?></p>
            </div>
        </div>
    </div>
<?php 
}

function theme_files() {
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/inc/bootstrap/bootstrap.min.js', array('jquery'), '4.6.0', true);
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/inc/bootstrap/bootstrap.min.css', NULL, '4.6.0', 'all');

    wp_enqueue_script('flexslider-min-js', get_template_directory_uri() . '/inc/flexslider/jquery.flexslider-min.js', array('jquery'), '', true);
    wp_enqueue_style('flexslider-css', get_template_directory_uri() . '/inc/flexslider/flexslider.css', NULL, '', 'all');
    wp_enqueue_script('flexslider-js', get_template_directory_uri() . '/js/modules/Slider.js', array('jquery'), '', true);
    wp_enqueue_script('fader-js', get_template_directory_uri() . '/js/modules/Load_animation.js', array('jquery'), '', true);

    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css2?family=Lato:wght@100;300;400;900&display=swap');
    wp_enqueue_style('font-awesome', '//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('theme_main_styles', get_stylesheet_uri());

    wp_enqueue_style( 'dashicons' );
}

add_action('wp_enqueue_scripts', 'theme_files');

function theme_features() {
    add_theme_support('title-tag'); //tab title
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    $defaults = array(
        'default-image'          => '',
        'default-preset'         => 'default',
        'default-position-x'     => 'left',
        'default-position-y'     => 'top',
        'default-size'           => 'auto',
        'default-repeat'         => 'no-repeat',
        'default-attachment'     => 'scroll',
        'default-color'          => '',
        'wp-head-callback'       => '_custom_background_cb',
        'admin-head-callback'    => '',
        'admin-preview-callback' => '',
    );
    add_theme_support('custom-background', $defaults);
    add_theme_support('post-thumbnails');
    
    add_image_size('artistLandscape', 200, 200, true);
    add_image_size('artistPortait', 500, 250, true);
    add_image_size('pageBanner', 1500, 350, true);
    // register_nav_menu('primaryMenu', 'Primary Menu');
    // register_nav_menu('footerMenu', 'Footer Menu');
    add_image_size('sliderImage', 640, 426, true);
}

add_action('after_setup_theme', 'theme_features');

function theme_adjust_queries($query) {
    if (!is_admin() AND is_post_type_archive('portfolio') AND $query->is_main_query()) {
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
        $query->set('posts_per_page', -1); //unlimited posts per page
    }

    $today = date('Ymd');
    if (!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()) {
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'ASC');
        $query->set('meta_query', array(
            array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => $today,
                'type' => 'numeric'
            )
       ));
    }
}

add_action('pre_get_posts', 'theme_adjust_queries');

// Redirect out of admin to homepage after registration/login (not admin users)
add_action('admin_init', 'redirectHome');

function redirectHome() {
    $currentUser = wp_get_current_user();
    if (count($currentUser->roles) == 1 AND $currentUser->roles[0] == 'subscriber') {
        wp_redirect(site_url('/'));
        exit;
    }
}

// customize log in screen
add_filter('login_headerurl', 'customHeader');
// redirect to homepage after pressing logo on login/register screen
function customHeader() {
    return esc_url(site_url('/'));
}

add_filter('login_headertitle', 'headerTitle');
// Leave in case 
function headerTitle() {
    return get_bloginfo('name');
}

// limit words on excerpt
function custom_excerpt_length( $length ) {
	return 10;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

add_action('login_enqueue_scripts', 'loginPageCSS');
// load css styles for login/register screen
function loginPageCSS() {
    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css2?family=Lato:wght@100;400;900&display=swap');
    wp_enqueue_style('font-awesome', '//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('our-main-styles', get_stylesheet_uri('/bundled-assets/styles.5aa35daa03e4d7c137b9.css'));
}

// custom the_content(); style
function the_content_custom_style() {
    $phrase = get_the_content();
    $phrase = apply_filters('the_content', $phrase);
    $replace = '<p style="line-height: 2em;">';

    echo str_replace('<p>', $replace, $phrase);
}