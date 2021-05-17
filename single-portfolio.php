<?php get_header(); ?>
    
<!-- portfolio post logic -->
<?php 
while(have_posts()) {
    the_post(); 
    pageBanner(array(
        'title' => NULL,
        'tagline' => NULL,
        'photo' => NULL //change to other photo. But all tested and works
    ));
?>

<?php get_template_part('template-parts/content', 'portfolio'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 offset-md-3 col-xs-12" style="padding-left: 0px;">
            <!-- related artist and event logic here -->
        <?php
            $relatedArtists = new WP_Query(array(
                'posts_per_page' => -1,
                'post_type' => 'artist',
                'orderby' => 'title',
                'order' => 'ASC',
                'meta_query' => array(
                    array(
                        'key' => 'related_portfolio',
                        'compare' => 'LIKE',
                        'value' => '"' . get_the_ID() . '"'
                    )
                )
            ));

            if ($relatedArtists->have_posts()) {
                echo '<h4 class="content-title" style="margin-bottom: 30px;">' . get_the_title() . ' Artist(s)</h4>';
                echo '<ul style="padding-left: 0;">';
                while ($relatedArtists->have_posts()) {
                    $relatedArtists->the_post(); ?>
                    <li class="photo-container post-list">
                        <div class="artist-name">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </div>
                        <img src="<?php the_post_thumbnail_url('artistLandscape') ?>" style="width:100%;">
                    </li>
        <?php }
                echo '</ul>';
                echo '<hr style="margin: 30px 0 30px 0;">';
            } wp_reset_postdata();
        ?>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-3 col-xs-12">
        <?php
        $today = date('Ymd');
        $relatedEvents = new WP_Query(array(
            'posts_per_page' => 2,
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
                ),
                array(
                    'key' => 'related_portfolio',
                    'compare' => 'LIKE',
                    'value' => '"' . get_the_ID() . '"'
                )
            )
        ));

        if ($relatedEvents->have_posts()) {
            echo '<h4 class="content-title" style="margin-bottom: 30px;">Related ' . get_the_title() . ' Event</h4>';
            while ($relatedEvents->have_posts()) {
                $relatedEvents->the_post();
                    get_template_part('template-parts/content', 'event_all');
            }
        }

    } ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>