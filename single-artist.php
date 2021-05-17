<?php get_header(); ?>  

<?php 
while(have_posts()) {
    the_post(); 
    pageBanner(array(
        'title' => NULL,
        'tagline' => NULL,
        'photo' => NULL //change to other photo. But all tested and works
    )); ?>
    <div class="container-fluid">
        <div class="row"> 
            <div class="col-md-6 offset-md-3 col-xs-12" style="padding-left: 0px;">
                <div class='photo-container2'>
                    <p class='single-artist-name artist-name'><?php the_title(); ?></p>
                    <?php the_post_thumbnail('artistPortait'); ?>
                </div>
                <p><?php the_content_custom_style(); ?></p>
                <hr style="margin: 30px 0 30px 0;">
            </div>
        </div>
    </div>

    <div class="container-fluid" style="padding-left: 0px;">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-xs-12" style="padding-left: 0px;">
                <!-- relation of event to portfolio items -->
                <?php
                $relatedPortfolio = get_field('related_portfolio');
                if ($relatedPortfolio) {
                    echo '<h4 class="content-title" style="margin-bottom: 30px;">Related Portfolio Items:</h4>';
                    foreach($relatedPortfolio as $portfolio) { ?>
                        <li class='post-list post-styles-all'>
                            <a href="<?php echo get_the_permalink($portfolio); ?>"><?php echo get_the_title($portfolio); ?></a>
                        </li>
            </div>
        </div>
    </div>
            <?php }
            } 
        } ?>

<?php get_footer(); ?>