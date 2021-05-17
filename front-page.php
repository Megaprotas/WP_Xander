<?php get_header(); ?>

<div class='class="container-fluid p-0'>
    <div class="row no-gutters">       
        <div class="col-md-6 col-xs-12" style="background-image: url(<?php echo get_theme_file_uri('/images/hero.jpg') ?>); 
                                                background-repeat: no-repeat; 
                                                background-size: contain; 
                                                resize: both;">
            <h1 class="FP-hero-header"><?php bloginfo('title'); ?></h1>

            <div class="hidden-class">
                <button class="fixed-search-button text-center">
                    <a href="<?php echo get_search_link() ?>">
                        <i class="fa fa-search"></i>
                    </a>
                </button>
            </div>
        </div>

        <div class="col-md-6 col-xs-12">
            <div class="hidden-class info-container">
                <h3 class='front-page-header text-center'>
                    <a href="<?php echo get_post_type_archive_link('event')?>">Events</a>
                </h3>
                <?php 
                    $today = date('Ymd');
                    $frontEvents = new WP_Query(array(
                    'posts_per_page' => 3,
                    'post_type' => 'event',
                    'meta_key' => 'event_date',
                    'orderby' => 'meta_value_num',
                    'order' => 'ASC',
                    'meta_query' => array(
                            array(
                                'key' => 'event_date',
                                'compare' => '>=',
                                'value' => $today,
                                'type' => 'numeric'
                            )
                    )
                    ));

                    while($frontEvents->have_posts()) {
                        $frontEvents->the_post();
                        get_template_part('template-parts/content', 'event_all');
                    }
                ?>
                <p class='text-center read-more-style'>
                    <small>
                        <a href="<?php echo get_post_type_archive_link('event') ?>">View All Events</a>
                    </small>
                </p>
            </div>

            <hr style="margin: 30px 0 30px 0;">

            <div class="hidden-class info-container">
                <h3 class='front-page-header text-center'>
                    <a href="<?php echo site_url('/blog') ?>">Latest Posts</a>
                </h3>
                <?php
                    $blogPosts = new WP_Query(array(
                        'posts_per_page' => 2,
                        // 'category_name' => 'data_science'
                    ));

                    while($blogPosts->have_posts()) {
                        $blogPosts->the_post(); ?>
                        <li class="post-list">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h4 class='post-styles-all'>
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        <small style="font-size: 12px;"><?php the_time('n-F-Y'); ?></small>
                                    </h4>
                                    <p class='read-more-style'>
                                        <?php if (has_excerpt()) {
                                            echo get_the_excerpt();
                                        } else {
                                            echo wp_trim_words(get_the_content(), 10);
                                        } ?>
                                        <a href="<?php the_permalink(); ?>">Read more</a>
                                    </p>
                                </div>
                            </div>
                        </li>
                <?php } wp_reset_postdata();
                ?>
                <p class='read-more-style text-center'>
                    <small>
                        <a href="<?php echo site_url('/blog'); ?>">View All Posts</a>
                    </small>
                </p>
            </div>
        </div>
    </div>    
</div>

<?php get_template_part('template-parts/content', 'cards'); ?>
<?php get_template_part('template-parts/content', 'slider'); ?>

<?php get_footer(); ?>