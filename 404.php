<?php 
get_header();
pageBanner(array(
    'title' => 'Opps something went wrong',
    'tagline' => 'Sorry about inconvenience',
    'photo' => NULL //change to other photo. But all tested and works
)); ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-3 col-xs-12" style='padding-left: 0;'>
            <?php
            the_widget('WP_Widget_Recent_Posts', array(
                'title'         => 'Latest Posts',
                'number'        => 3
            ));
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>