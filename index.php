<?php
get_header();
pageBanner(array(
    'title' => 'Welcome to our Blog',
    'tagline' => 'Check newest blog posts',
    'photo' => NULL //change to other photo. But all tested and works
));
?>

<div class='container-fluid'>
    <div class="row">
        <div class="col-md-8 offset-md-3 col-xs-12">
            <?php
                while(have_posts()) {
                    the_post();
                    get_template_part('template-parts/content', 'post');
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