<li class="post-list">
    <h3 class="post-styles-all">
        <a href="<?php the_permalink(); ?>" class="content-title-link"><?php the_title(); ?></a>
    </h3>
    <p>
        <small>Posted by <strong class="blog-author">
        <?php the_author_posts_link(); ?></strong> on <?php the_time('n-F-Y'); ?>
        </small>
    </p>
    <p class='read-more-style'>
        <a href="<?php the_permalink(); ?>">Continue reading</a>
    </p>
    <hr style="margin-top: 30px;">
</li>