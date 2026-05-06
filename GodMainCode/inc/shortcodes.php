<?php

if (!defined('ABSPATH')) {
    exit;
}

function godmaincode_button_shortcode($atts, $content = null) {
    $atts = shortcode_atts(array(
        'url' => '#',
        'type' => 'primary',
        'size' => 'normal',
        'target' => '_self',
        'rel' => '',
    ), $atts);
    
    $size_class = '';
    if ($atts['size'] == 'small') {
        $size_class = 'btn-sm';
    } elseif ($atts['size'] == 'large') {
        $size_class = 'btn-lg';
    }
    
    $rel_attr = '';
    if ($atts['rel']) {
        $rel_attr = 'rel="' . esc_attr($atts['rel']) . '"';
    }
    
    return '<a href="' . esc_url($atts['url']) . '" class="btn btn-' . esc_attr($atts['type']) . ' ' . esc_attr($size_class) . '" target="' . esc_attr($atts['target']) . '" ' . $rel_attr . '>' . do_shortcode($content) . '</a>';
}
add_shortcode('button', 'godmaincode_button_shortcode');

function godmaincode_card_shortcode($atts, $content = null) {
    $atts = shortcode_atts(array(
        'title' => '',
        'image' => '',
        'url' => '',
    ), $atts);
    
    $output = '<div class="card shortcode-card">';
    
    if ($atts['image']) {
        $output .= '<div class="card-image">';
        if ($atts['url']) {
            $output .= '<a href="' . esc_url($atts['url']) . '"><img src="' . esc_url($atts['image']) . '" alt="' . esc_attr($atts['title']) . '"></a>';
        } else {
            $output .= '<img src="' . esc_url($atts['image']) . '" alt="' . esc_attr($atts['title']) . '">';
        }
        $output .= '</div>';
    }
    
    if ($atts['title']) {
        $output .= '<h3 class="card-title">';
        if ($atts['url']) {
            $output .= '<a href="' . esc_url($atts['url']) . '">' . esc_html($atts['title']) . '</a>';
        } else {
            $output .= esc_html($atts['title']);
        }
        $output .= '</h3>';
    }
    
    $output .= '<div class="card-content">' . do_shortcode($content) . '</div>';
    $output .= '</div>';
    
    return $output;
}
add_shortcode('card', 'godmaincode_card_shortcode');

function godmaincode_columns_shortcode($atts, $content = null) {
    $atts = shortcode_atts(array(
        'columns' => 2,
        'gap' => 'normal',
    ), $atts);
    
    $gap_class = '';
    if ($atts['gap'] == 'small') {
        $gap_class = 'gap-sm';
    } elseif ($atts['gap'] == 'large') {
        $gap_class = 'gap-lg';
    }
    
    return '<div class="columns columns-' . esc_attr($atts['columns']) . ' ' . esc_attr($gap_class) . '">' . do_shortcode($content) . '</div>';
}
add_shortcode('columns', 'godmaincode_columns_shortcode');

function godmaincode_column_shortcode($atts, $content = null) {
    return '<div class="column">' . do_shortcode($content) . '</div>';
}
add_shortcode('column', 'godmaincode_column_shortcode');

function godmaincode_alert_shortcode($atts, $content = null) {
    $atts = shortcode_atts(array(
        'type' => 'info',
        'dismissible' => 'false',
    ), $atts);
    
    $dismissible = '';
    if ($atts['dismissible'] == 'true') {
        $dismissible = ' alert-dismissible';
    }
    
    return '<div class="alert alert-' . esc_attr($atts['type']) . $dismissible . '">' . do_shortcode($content) . '</div>';
}
add_shortcode('alert', 'godmaincode_alert_shortcode');

function godmaincode_spacer_shortcode($atts) {
    $atts = shortcode_atts(array(
        'height' => '20',
    ), $atts);
    
    return '<div class="spacer" style="height: ' . esc_attr($atts['height']) . 'px;"></div>';
}
add_shortcode('spacer', 'godmaincode_spacer_shortcode');