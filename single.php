<?php get_header(); ?>

<div class="container-fluid">
    <div class="row">
        <div class='hidden-class col-xs-12 col-md-6 offset-md-3'>
            <?php 
            while(have_posts()) {
                the_post(); ?>
                <h4><?php the_title(); ?></h4>
                <p class="read-more-style">
                    <small>Posted by 
                        <strong class="blog-author">
                            <?php the_author_posts_link(); ?>
                        </strong> on <?php the_time('n-F-Y'); ?> in <?php echo get_the_category_list(', ')?>
                    </small>
                </p>
                <p><?php the_content_custom_style(); ?></p>
            <?php } ?>
        </div>
        <div class='col-xs-12 col-md-6 offset-md-3'>
            <small class="read-more-style">
                <a href='<?php echo site_url('/blog'); ?>'>Back to Blog</a>
            </small>
        </div>
    </div>
</div>

<?php get_footer(); ?>