<?php get_header();

while(have_posts()) {
    the_post();
    pageBanner(array(
        'title' => NULL,
        'tagline' => NULL,
        'photo' => NULL //change to other photo. But all tested and works
    ));
}

    $pageParent = wp_get_post_parent_id(get_the_ID());
        if ($pageParent) { ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-md-3 offset-md-3" style="padding-left: 0;">
                    <small>You are viewing <?php the_title(); ?></small>
                </div>
                <div class="col-xs-12 col-md-3">
                    <small class='read-more-style'>
                        <a href='<?php echo get_permalink($pageParent); ?>'>Back to <?php echo get_the_title($pageParent); ?></a>
                    </small>
                </div>
            </div>
        </div>
    <?php }
    ?>

    <?php
        $checkIfParent = get_pages(array(
            'child_of' => get_the_ID()
        ));

        if ($pageParent or $checkIfParent) { ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-md-6 offset-md-3" style="padding-left: 0;">
                    <small>
                        <ul class="about-us-nav post-list">
                            <a href="<?php echo get_permalink($pageParent); ?>"><?php echo get_the_title($pageParent); ?></a>
                            <?php
                                if ($pageParent) {
                                    $pageChild = $pageParent;
                                } else {
                                    $pageChild = get_the_ID();
                                }
                                
                                wp_list_pages(array(
                                    'title_li' => NULL,
                                    'child_of' => $pageChild,
                                    'sort_column' => 'menu_order',
                                ));
                            ?>
                        </ul>
                    </small>       
                </div>
            </div>
        </div>

    <?php } ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-6 offset-md-3" style="padding-left: 0;">
                <p><?php the_content_custom_style(); ?></p>
            </div>
        </div>
    </div>

<?php get_footer(); ?>