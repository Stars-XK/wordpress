<?php

if (!defined('ABSPATH')) {
    exit;
}

function godmaincode_before_header() {
    do_action('godmaincode_before_header');
}

function godmaincode_after_header() {
    do_action('godmaincode_after_header');
}

function godmaincode_before_main_content() {
    do_action('godmaincode_before_main_content');
}

function godmaincode_after_main_content() {
    do_action('godmaincode_after_main_content');
}

function godmaincode_before_footer() {
    do_action('godmaincode_before_footer');
}

function godmaincode_after_footer() {
    do_action('godmaincode_after_footer');
}

function godmaincode_before_article($post) {
    do_action('godmaincode_before_article', $post);
}

function godmaincode_after_article($post) {
    do_action('godmaincode_after_article', $post);
}

function godmaincode_post_thumbnail_html($html, $post_id, $post_thumbnail_id, $size, $attr) {
    if (!empty($html)) {
        $html = '<div class="post-thumbnail">' . $html . '</div>';
    }
    return $html;
}
add_filter('post_thumbnail_html', 'godmaincode_post_thumbnail_html', 10, 5);

function godmaincode_body_class($classes) {
    $theme_mode = godmaincode_get_theme_mode();
    $classes[] = 'theme-mode-' . $theme_mode;
    
    $particle_effect = godmaincode_get_particle_effect();
    if ($particle_effect != 'none') {
        $classes[] = 'particle-effect-' . $particle_effect;
    }
    
    return $classes;
}
add_filter('body_class', 'godmaincode_body_class');

function godmaincode_post_class($classes) {
    $classes[] = 'article-item';
    return $classes;
}
add_filter('post_class', 'godmaincode_post_class');

function godmaincode_wp_title($title, $sep) {
    global $paged, $page;
    
    if (is_feed()) {
        return $title;
    }
    
    $title .= get_bloginfo('name');
    
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && (is_home() || is_front_page())) {
        $title = "$title $sep $site_description";
    }
    
    if ($paged >= 2 || $page >= 2) {
        $title = "$title $sep " . sprintf(__('Page %s', 'godmaincode'), max($paged, $page));
    }
    
    return $title;
}
add_filter('wp_title', 'godmaincode_wp_title', 10, 2);