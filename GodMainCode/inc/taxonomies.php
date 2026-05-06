<?php

if (!defined('ABSPATH')) {
    exit;
}

function godmaincode_taxonomy_image_size() {
    add_image_size('taxonomy-thumbnail', 800, 400, true);
}
add_action('after_setup_theme', 'godmaincode_taxonomy_image_size');

function godmaincode_taxonomy_description_filter($description) {
    return wpautop(wptexturize($description));
}
add_filter('term_description', 'godmaincode_taxonomy_description_filter');

function godmaincode_get_taxonomy_post_count($term_id, $taxonomy = 'category') {
    $term = get_term($term_id, $taxonomy);
    if ($term) {
        return $term->count;
    }
    return 0;
}

function godmaincode_get_taxonomy_colors() {
    return array(
        '#6366f1',
        '#06b6d4',
        '#f472b6',
        '#10b981',
        '#f59e0b',
        '#ef4444',
        '#8b5cf6',
        '#ec4899',
    );
}

function godmaincode_get_taxonomy_color($term_id) {
    $colors = godmaincode_get_taxonomy_colors();
    return $colors[$term_id % count($colors)];
}

function godmaincode_register_custom_taxonomies() {
    register_taxonomy('product_category', 'product', array(
        'labels' => array(
            'name'              => esc_html__('Product Categories', 'godmaincode'),
            'singular_name'     => esc_html__('Product Category', 'godmaincode'),
            'search_items'      => esc_html__('Search Product Categories', 'godmaincode'),
            'all_items'         => esc_html__('All Product Categories', 'godmaincode'),
            'parent_item'       => esc_html__('Parent Product Category', 'godmaincode'),
            'parent_item_colon' => esc_html__('Parent Product Category:', 'godmaincode'),
            'edit_item'         => esc_html__('Edit Product Category', 'godmaincode'),
            'update_item'       => esc_html__('Update Product Category', 'godmaincode'),
            'add_new_item'      => esc_html__('Add New Product Category', 'godmaincode'),
            'new_item_name'     => esc_html__('New Product Category Name', 'godmaincode'),
            'menu_name'         => esc_html__('Categories', 'godmaincode'),
        ),
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'product-category'),
    ));

    register_taxonomy('link_category', 'link', array(
        'labels' => array(
            'name'              => esc_html__('Link Categories', 'godmaincode'),
            'singular_name'     => esc_html__('Link Category', 'godmaincode'),
            'search_items'      => esc_html__('Search Link Categories', 'godmaincode'),
            'all_items'         => esc_html__('All Link Categories', 'godmaincode'),
            'parent_item'       => esc_html__('Parent Link Category', 'godmaincode'),
            'parent_item_colon' => esc_html__('Parent Link Category:', 'godmaincode'),
            'edit_item'         => esc_html__('Edit Link Category', 'godmaincode'),
            'update_item'       => esc_html__('Update Link Category', 'godmaincode'),
            'add_new_item'      => esc_html__('Add New Link Category', 'godmaincode'),
            'new_item_name'     => esc_html__('New Link Category Name', 'godmaincode'),
            'menu_name'         => esc_html__('Categories', 'godmaincode'),
        ),
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'link-category'),
    ));
}
add_action('init', 'godmaincode_register_custom_taxonomies');