<?php

if (!defined('ABSPATH')) {
    exit;
}

define('GODMAINCODE_VERSION', '1.0.0');
define('GODMAINCODE_DIR', get_template_directory());
define('GODMAINCODE_URI', get_template_directory_uri());

function godmaincode_setup() {
    load_theme_textdomain('godmaincode', get_template_directory() . '/languages');
    
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('custom-background', apply_filters('godmaincode_custom_background_args', array(
        'default-color' => '#ffffff',
        'default-image' => '',
    )));
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array('site-title', 'site-description'),
    ));
    
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'godmaincode'),
        'footer'  => esc_html__('Footer Menu', 'godmaincode'),
    ));
}
add_action('after_setup_theme', 'godmaincode_setup');

function godmaincode_enqueue_styles() {
    wp_enqueue_style('godmaincode-style', get_stylesheet_uri(), array(), GODMAINCODE_VERSION);
    wp_enqueue_style('godmaincode-light', get_template_directory_uri() . '/css/light.css', array(), GODMAINCODE_VERSION);
    
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'godmaincode_enqueue_styles');

function godmaincode_enqueue_scripts() {
    wp_enqueue_script('godmaincode-main', get_template_directory_uri() . '/js/main.js', array('jquery'), GODMAINCODE_VERSION, true);
    wp_enqueue_script('godmaincode-particles', get_template_directory_uri() . '/js/particles.js', array(), GODMAINCODE_VERSION, true);
    
    wp_localize_script('godmaincode-main', 'godmaincodeData', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'theme_uri' => get_template_directory_uri(),
    ));
}
add_action('wp_enqueue_scripts', 'godmaincode_enqueue_scripts');

function godmaincode_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'godmaincode'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'godmaincode'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer Widget 1', 'godmaincode'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Add widgets here.', 'godmaincode'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer Widget 2', 'godmaincode'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Add widgets here.', 'godmaincode'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'godmaincode_widgets_init');

function godmaincode_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'godmaincode_excerpt_length', 999);

function godmaincode_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'godmaincode_excerpt_more');

function godmaincode_body_classes($classes) {
    $particle_effect = get_theme_mod('godmaincode_particle_effect', 'sakura');
    if ($particle_effect !== 'none') {
        $classes[] = 'particle-effect-' . $particle_effect;
    }
    
    $theme_mode = get_theme_mod('godmaincode_theme_mode', 'light');
    $classes[] = 'theme-mode-' . $theme_mode;
    
    return $classes;
}
add_filter('body_class', 'godmaincode_body_classes');

function godmaincode_customize_register($wp_customize) {
    $wp_customize->add_section('godmaincode_theme_options', array(
        'title'    => esc_html__('Theme Options', 'godmaincode'),
        'priority' => 30,
    ));
    
    $wp_customize->add_setting('godmaincode_theme_mode', array(
        'default'           => 'light',
        'sanitize_callback' => 'sanitize_text_field',
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
}
add_action('customize_register', 'godmaincode_customize_register');

require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/post-types.php';
require_once get_template_directory() . '/inc/taxonomies.php';
require_once get_template_directory() . '/inc/widgets.php';
require_once get_template_directory() . '/inc/shortcodes.php';
require_once get_template_directory() . '/inc/hooks.php';
require_once get_template_directory() . '/inc/helpers.php';
require_once get_template_directory() . '/inc/subscribe.php';

if (is_admin()) {
    require_once get_template_directory() . '/admin/admin.php';
}