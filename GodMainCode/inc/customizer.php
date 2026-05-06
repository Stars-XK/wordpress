<?php

if (!defined('ABSPATH')) {
    exit;
}

function godmaincode_customizer_register($wp_customize) {
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    $wp_customize->add_section('godmaincode_theme_options', array(
        'title'    => esc_html__('Theme Options', 'godmaincode'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('godmaincode_theme_mode', array(
        'default'           => 'light',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control('godmaincode_theme_mode', array(
        'label'    => esc_html__('Theme Mode', 'godmaincode'),
        'section'  => 'godmaincode_theme_options',
        'type'     => 'select',
        'choices'  => array(
            'light' => esc_html__('Light', 'godmaincode'),
            'dark'  => esc_html__('Dark', 'godmaincode'),
            'gray'  => esc_html__('Gray', 'godmaincode'),
        ),
    ));

    $wp_customize->add_setting('godmaincode_particle_effect', array(
        'default'           => 'sakura',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control('godmaincode_particle_effect', array(
        'label'    => esc_html__('Particle Effect', 'godmaincode'),
        'section'  => 'godmaincode_theme_options',
        'type'     => 'select',
        'choices'  => array(
            'none'   => esc_html__('None', 'godmaincode'),
            'sakura' => esc_html__('Sakura', 'godmaincode'),
            'snow'   => esc_html__('Snow', 'godmaincode'),
        ),
    ));

    $wp_customize->add_setting('godmaincode_primary_color', array(
        'default'           => '#6366f1',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'godmaincode_primary_color', array(
        'label'    => esc_html__('Primary Color', 'godmaincode'),
        'section'  => 'colors',
    )));

    $wp_customize->add_setting('godmaincode_secondary_color', array(
        'default'           => '#06b6d4',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'godmaincode_secondary_color', array(
        'label'    => esc_html__('Secondary Color', 'godmaincode'),
        'section'  => 'colors',
    )));

    $wp_customize->add_setting('godmaincode_accent_color', array(
        'default'           => '#f472b6',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'godmaincode_accent_color', array(
        'label'    => esc_html__('Accent Color', 'godmaincode'),
        'section'  => 'colors',
    )));
}
add_action('customize_register', 'godmaincode_customizer_register');

function godmaincode_customize_preview_js() {
    wp_enqueue_script('godmaincode-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array('customize-preview'), GODMAINCODE_VERSION, true);
}
add_action('customize_preview_init', 'godmaincode_customize_preview_js');

function godmaincode_customizer_css() {
    $primary_color = get_theme_mod('godmaincode_primary_color', '#6366f1');
    $secondary_color = get_theme_mod('godmaincode_secondary_color', '#06b6d4');
    $accent_color = get_theme_mod('godmaincode_accent_color', '#f472b6');
    
    $css = "
        :root {
            --primary-color: {$primary_color};
            --secondary-color: {$secondary_color};
            --accent-color: {$accent_color};
        }
    ";
    
    wp_add_inline_style('godmaincode-style', $css);
}
add_action('wp_enqueue_scripts', 'godmaincode_customizer_css');