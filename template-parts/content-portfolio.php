<div class="container-fluid">
    <div class="row">
        <div class="hidden-class col-xs-12 col-md-6 offset-md-3" style="padding-left: 0px;">
            <p class="post-info">
                <small>Presented by 
                <strong class="blog-author"><?php the_author_posts_link(); ?></strong> on <?php the_time('n-F-Y'); ?> in <?php echo get_the_category_list(', ')?>
                </small>
            </p>
            <small class="read-more-style">
                <a href='<?php echo get_post_type_archive_link('portfolio') ?>'>Back to Portfolio</a>
            </small>
            <p><?php the_content_custom_style(); ?></p>
            <hr style="margin: 30px 0 30px 0">
        </div>
    </div>
</div>