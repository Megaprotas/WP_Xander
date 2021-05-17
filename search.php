<?php
    get_header();
    pageBanner(array(
        'title' => 'Search results',
        'tagline' => 'Here is the results for &ldquo;' . esc_html(get_search_query(false)) .'&rdquo;',
        'photo' => NULL //change to other photo. But all tested and works
    ));
?>

<div class='contaner-fluid'>
    <?php
    if (have_posts()) {
        while(have_posts()) {
            the_post(); 
            get_template_part('template-parts/content', get_post_type());
        } 
        echo paginate_links();
    } else {
        echo '<h3>No results found</h3>';
    }
    get_search_form();
    ?>
</div>

<?php get_footer(); ?>