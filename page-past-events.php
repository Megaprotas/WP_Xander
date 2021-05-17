<?php
get_header();
pageBanner(array(
    'title' => 'Past Events',
    'tagline' => 'Remember the old events',
    'photo' => NULL //change to other photo. But all tested and works
));
?>

<div class='container-fluid'>
    <div class="row" style="padding-left: 0;">
        <div class="col-md-8 offset-md-3 col-xs-12">
            <?php 
                $today = date('Ymd');
                $pastEvents = new WP_Query(array(
                    'paged' => get_query_var('paged', 1),
                    'posts_per_page' => 20,
                    'post_type' => 'event',
                    'meta_key' => 'event_date',
                    'orderby' => 'meta_value_num',
                    'order' => 'ASC',
                    'meta_query' => array(
                        array(
                            'key' => 'event_date',
                            'compare' => '<',
                            'value' => $today,
                            'type' => 'numeric'
                        )
                    )
                ));

                while($pastEvents->have_posts()) {
                    $pastEvents->the_post();
                    get_template_part('template-parts/content', 'event_all');
                }
            echo paginate_links(array(
                'total' => $pastEvents->max_num_pages
            ));
            ?>
            <p class='past-events read-more-style'>
                <a href="<?php echo get_post_type_archive_link('event') ?>">Upcoming Events</a>
            </p>
        </div>
    </div>
</div>

<?php get_footer(); ?>