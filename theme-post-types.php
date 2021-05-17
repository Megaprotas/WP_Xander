<?php
// custom post types (like events, artists and projects goes here)
function theme_post_types() {
    // Portfolio post type
    register_post_type('portfolio', array(
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'excerpt'),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array(
            'slug' => 'portfolio'
        ),
        'labels' => array(
            'name' => 'Portfolio',
            'add_new_item' => 'Add New Item',
            'edit_item' => 'Edit Item',
            'all_items' => 'All Items',
            'singular_name' => 'Portfolio'
        ),
        'menu_icon' => 'dashicons-art'
    ));

    // Artist post type
    register_post_type('artist', array(
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail', ),
        'public' => true,
        'labels' => array(
            'name' => 'Artists',
            'add_new_item' => 'Add New Artist',
            'edit_item' => 'Edit Artist',
            'all_items' => 'All Artists',
            'singular_name' => 'Artist'
        ),
        'menu_icon' => 'dashicons-admin-appearance'
    ));

    // Event post type
    register_post_type('event', array(
        'capability_type' => 'event',
        'map_meta_cap' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'excerpt'),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array(
            'slug' => 'events'
        ),
        'labels' => array(
            'name' => 'Events',
            'add_new_item' => 'Add New Event',
            'edit_item' => 'Edit Event',
            'all_items' => 'All Events',
            'singular_name' => 'Event'
        ),
        'menu_icon' => 'dashicons-format-audio'
    ));
}

add_action('init', 'theme_post_types');

