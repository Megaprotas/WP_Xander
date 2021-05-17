<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php wp_head(); ?>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body <?php body_class(); ?>>
<nav class="navbar">
    <div class="logo-area"> 
        <a href="<?php echo home_url('/') ?>" id="logo-link">
            <?php 
            if (has_custom_logo()) {
                the_custom_logo();
            } else {
                bloginfo('title');
            } ?>
        </a>
        <p id='logo-tagline'><?php bloginfo('description') ?></p>
    </div>

    <ul class="nav justify-content-end">
        <li <?php if (is_page('home')) echo 'class="active nav-item"'?> class="nav-item">
            <a class="nav-link" href="<?php echo home_url('/')?>">Home</a>
        </li>
        <li <?php if (get_post_type() == 'event' OR is_page('past-events')) echo 'class="active nav-item"'?> class="nav-item">
            <a class="nav-link" href="<?php echo get_post_type_archive_link('event')?>">Events</a>
        </li>
        <li <?php if (get_post_type() == 'portfolio') echo 'class="active nav-item"'?>class="nav-item">
            <a class="nav-link" href="<?php echo get_post_type_archive_link('portfolio') ?>">Portfolio</a>
        </li>
        <li <?php if (get_post_type() == 'post') echo 'class="active nav-item"' ?> class="nav-item">
            <a class="nav-link" href="<?php echo site_url('/blog') ?>">Blog</a>
        </li>
        <li <?php if (is_page('about-us') OR wp_get_post_parent_id(get_the_ID())) echo 'class="active nav-item"' ?> class="nav-item">
            <a class="nav-link" href="<?php echo site_url('/about-us') ?>">About Us</a>
        </li>
    
    <?php 
        if (is_user_logged_in()) { ?>
            <li class="nav-btn nav-item">
                <a class="nav-link" href="<?php echo wp_logout_url(); ?>">Log-out</a>
            </li>
    <?php } 
        else { ?>
            <li class="nav-btn nav-item" style="margin-right: 5px">
                <a class="nav-link" href="<?php echo wp_login_url(); ?>">Log-in</a>
            </li>
            <li class="nav-btn nav-item">
                <a class="nav-link" href="<?php echo wp_registration_url(); ?>">Register</a>
            </li>
    <?php } ?>
    </ul>

</nav>
