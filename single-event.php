<?php get_header(); ?>

<?php 
while(have_posts()) {
    the_post();
    pageBanner(array(
        'title' => NULL,
        'tagline' => NULL,
        'photo' => NULL //change to other photo. But all tested and works
    )); ?>

    <div class="row">
        <div class="hidden-class col-xs-12 col-md-6 offset-md-3" style="padding-left: 5px;">
            <p>
                <small>Presented by 
                <strong class="blog-author"><?php the_author_posts_link(); ?></strong> on <?php the_time('n-F-Y'); ?> in <?php echo get_the_category_list(', ')?>
                </small>
            </p>
            <p><?php the_content_custom_style(); ?></p>
            <small class="read-more-style">
                <a href='<?php echo get_post_type_archive_link('event') ?>'>Back to Events</a>
            </small>
            <hr style='margin: 30px 0 30px 0'>

            <!-- relation of event to portfolio items -->
    
        <?php
        $relatedPortfolio = get_field('related_portfolio');
        if ($relatedPortfolio) {
            echo '<p><strong>Related to following portfolio items:</strong></p>';
            foreach($relatedPortfolio as $portfolio) { ?>
                <li class="post-list read-more-style">
                    <a href="<?php echo get_the_permalink($portfolio); ?>"><?php echo get_the_title($portfolio); ?></a>
                </li>
        <?php
            }
        } 
} ?>
        </div>
    </div>
<?php get_footer(); ?>