<?php get_header();

pageBanner(array(
    'title' => 'All Events',
    'tagline' => 'Best events on site',
    'photo' => NULL //change to other photo. But all tested and works
));
?>

<!-- check function -> theme_adjust_queries in functions.php  for sorting logic -->
<div class='container-fluid'>
    <div class="row">
        <div class="col-md-8 offset-md-3 col-xs-12" style="padding-left: 0;">
            <?php
            while(have_posts()) {
                the_post();
                get_template_part('template-parts/content', 'event_all');
            } 
            echo paginate_links(array(
                'prev_next' => true
                )
            );
            ?>
            <p class='past-events read-more-style'>
                <a href='<?php echo site_url('/past-events'); ?>'>Past Events</a>
            </p>
        </div>
    </div>
</div>

<?php get_footer(); ?>