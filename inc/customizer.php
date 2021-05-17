<?php
function theme_customizer($wp_customize) {
    $wp_customize->add_section(
        'sec_slider', array(
            'title'         => 'Slider Settings',
            'description'   => 'Slider Section'
        )
    );
    //Slide 1 Field 1
    $wp_customize->add_setting(
        'set_slider_page1', array (
            'type'              => 'theme_mod',
            'default'            => '',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control(
        'set_slider_page1', array (
            'label'         => 'Set slider page 1',
            'descrption'    => 'Set slider page 1',
            'section'       => 'sec_slider',
            'type'          => 'dropdown-pages'
        )
    );

    //Slide 1 Field 2
    $wp_customize->add_setting(
        'set_slider_button_text1', array (
            'type'               => 'theme_mod',
            'default'            => '',
            'sanitize_callback'  => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'set_slider_button_text1', array (
            'label'         => 'Button Text 1',
            'descrption'    => 'Button Text 1',
            'section'       => 'sec_slider',
            'type'          => 'text'
        )
    );

    //Slide 1 Field 3
    $wp_customize->add_setting(
        'set_slider_url1', array (
            'type'               => 'theme_mod',
            'default'            => '',
            'sanitize_callback'  => 'esc_url_raw'
        )
    );

    $wp_customize->add_control(
        'set_slider_url1', array (
            'label'         => 'URL page 1',
            'descrption'    => 'URL page 1',
            'section'       => 'sec_slider',
            'type'          => 'url'
        )
    );

    //Slide 2 Field 1
    $wp_customize->add_setting(
        'set_slider_page2', array (
            'type'              => 'theme_mod',
            'default'            => '',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control(
        'set_slider_page2', array (
            'label'         => 'Set slider page 2',
            'descrption'    => 'Set slider page 2',
            'section'       => 'sec_slider',
            'type'          => 'dropdown-pages'
        )
    );

    //Slide 2 Field 2
    $wp_customize->add_setting(
        'set_slider_button_text2', array (
            'type'               => 'theme_mod',
            'default'            => '',
            'sanitize_callback'  => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'set_slider_button_text2', array (
            'label'         => 'Button Text 2',
            'descrption'    => 'Button Text 2',
            'section'       => 'sec_slider',
            'type'          => 'text'
        )
    );

    //Slide 2 Field 3
    $wp_customize->add_setting(
        'set_slider_url2', array (
            'type'               => 'theme_mod',
            'default'            => '',
            'sanitize_callback'  => 'esc_url_raw'
        )
    );

    $wp_customize->add_control(
        'set_slider_url2', array (
            'label'         => 'URL page 2',
            'descrption'    => 'URL page 2',
            'section'       => 'sec_slider',
            'type'          => 'url'
        )
    );

    //Slide 3 Field 1
    $wp_customize->add_setting(
        'set_slider_page3', array (
            'type'              => 'theme_mod',
            'default'            => '',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control(
        'set_slider_page3', array (
            'label'         => 'Set slider page 3',
            'descrption'    => 'Set slider page 3',
            'section'       => 'sec_slider',
            'type'          => 'dropdown-pages'
        )
    );

    //Slide 3 Field 2
    $wp_customize->add_setting(
        'set_slider_button_text3', array (
            'type'               => 'theme_mod',
            'default'            => '',
            'sanitize_callback'  => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'set_slider_button_text3', array (
            'label'         => 'Button Text 3',
            'descrption'    => 'Button Text 3',
            'section'       => 'sec_slider',
            'type'          => 'text'
        )
    );

    //Slide 3 Field 3
    $wp_customize->add_setting(
        'set_slider_url3', array (
            'type'               => 'theme_mod',
            'default'            => '',
            'sanitize_callback'  => 'esc_url_raw'
        )
    );

    $wp_customize->add_control(
        'set_slider_url3', array (
            'label'         => 'URL page 3',
            'descrption'    => 'URL page 3',
            'section'       => 'sec_slider',
            'type'          => 'url'
        )
    );
}

add_action('customize_register', 'theme_customizer');