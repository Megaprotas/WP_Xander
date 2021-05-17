<?php 
get_header();

pageBanner(array(
    'title' => get_the_archive_title(),
    'tagline' => get_the_archive_description(),
    'photo' => NULL //change to other photo. But all tested and works
));
?>

<div class='content-container'>
    <div class="row">
        <div class="col-md-8 offset-md-3 col-xs-12">
<?php
    while(have_posts()) {
        the_post(); 
        ?>
        <h4 class="post-styles-all"><a href="<?php the_permalink(); ?>" class="content-title-link"><?php the_title(); ?></a></h4>
        <p class="blog-author">Posted by <strong><?php the_author_posts_link(); ?></strong> on <?php the_time('n-F-Y'); ?> in <?php echo get_the_category_list(', ')?></p>
        <?php 
            if (has_excerpt()) {
                echo get_the_excerpt();
            } else {
                echo wp_trim_words(get_the_content(), 10);
            } 
        ?>
        <p class="read-more-style">
            <a href="<?php the_permalink(); ?>">Continue reading</a>
        </p>
        <?php
            } 
            echo paginate_links(array(
                'prev_next' => true
                )
            );
        ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>