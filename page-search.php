<?php get_header();

while(have_posts()) {
    the_post();
    pageBanner(array(
        'title' => 'Search',
        'tagline' => 'Default tagline',
        'photo' => NULL //change to other photo. But all tested and works
    ));
} 
get_search_form();
?>
    
<?php get_footer(); ?>