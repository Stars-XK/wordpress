<?php

if (!defined('ABSPATH')) {
    exit;
}

function godmaincode_register_custom_post_types() {
    register_post_type('product', array(
        'labels' => array(
            'name'                  => esc_html__('Products', 'godmaincode'),
            'singular_name'         => esc_html__('Product', 'godmaincode'),
            'add_new'               => esc_html__('Add New', 'godmaincode'),
            'add_new_item'          => esc_html__('Add New Product', 'godmaincode'),
            'edit_item'             => esc_html__('Edit Product', 'godmaincode'),
            'new_item'              => esc_html__('New Product', 'godmaincode'),
            'view_item'             => esc_html__('View Product', 'godmaincode'),
            'search_items'          => esc_html__('Search Products', 'godmaincode'),
            'not_found'             => esc_html__('No products found', 'godmaincode'),
            'not_found_in_trash'    => esc_html__('No products found in Trash', 'godmaincode'),
            'parent_item_colon'     => '',
            'menu_name'             => esc_html__('Products', 'godmaincode'),
        ),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 25,
        'menu_icon'           => 'dashicons-store',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'rewrite'             => array(
            'slug'       => 'products',
            'with_front' => true,
        ),
        'supports' => array(
            'title',
            'editor',
            'author',
            'thumbnail',
            'excerpt',
            'custom-fields',
        ),
        'taxonomies' => array('product_category'),
    ));

    register_post_type('guestbook', array(
        'labels' => array(
            'name'                  => esc_html__('Guestbook', 'godmaincode'),
            'singular_name'         => esc_html__('Guestbook Message', 'godmaincode'),
            'add_new'               => esc_html__('Add New', 'godmaincode'),
            'add_new_item'          => esc_html__('Add New Message', 'godmaincode'),
            'edit_item'             => esc_html__('Edit Message', 'godmaincode'),
            'new_item'              => esc_html__('New Message', 'godmaincode'),
            'view_item'             => esc_html__('View Message', 'godmaincode'),
            'search_items'          => esc_html__('Search Messages', 'godmaincode'),
            'not_found'             => esc_html__('No messages found', 'godmaincode'),
            'not_found_in_trash'    => esc_html__('No messages found in Trash', 'godmaincode'),
            'parent_item_colon'     => '',
            'menu_name'             => esc_html__('Guestbook', 'godmaincode'),
        ),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => false,
        'menu_position'       => 30,
        'menu_icon'           => 'dashicons-format-chat',
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'rewrite'             => array(
            'slug'       => 'guestbook',
            'with_front' => true,
        ),
        'supports' => array(
            'title',
            'editor',
            'author',
        ),
    ));

    register_post_type('timeline_event', array(
        'labels' => array(
            'name'                  => esc_html__('Timeline Events', 'godmaincode'),
            'singular_name'         => esc_html__('Timeline Event', 'godmaincode'),
            'add_new'               => esc_html__('Add New', 'godmaincode'),
            'add_new_item'          => esc_html__('Add New Event', 'godmaincode'),
            'edit_item'             => esc_html__('Edit Event', 'godmaincode'),
            'new_item'              => esc_html__('New Event', 'godmaincode'),
            'view_item'             => esc_html__('View Event', 'godmaincode'),
            'search_items'          => esc_html__('Search Events', 'godmaincode'),
            'not_found'             => esc_html__('No events found', 'godmaincode'),
            'not_found_in_trash'    => esc_html__('No events found in Trash', 'godmaincode'),
            'parent_item_colon'     => '',
            'menu_name'             => esc_html__('Timeline', 'godmaincode'),
        ),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-calendar-alt',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'rewrite'             => array(
            'slug'       => 'timeline',
            'with_front' => true,
        ),
        'supports' => array(
            'title',
            'editor',
            'author',
            'thumbnail',
            'excerpt',
            'custom-fields',
        ),
        'taxonomies' => array('category', 'post_tag'),
    ));

    register_post_type('link', array(
        'labels' => array(
            'name'                  => esc_html__('Links', 'godmaincode'),
            'singular_name'         => esc_html__('Link', 'godmaincode'),
            'add_new'               => esc_html__('Add New', 'godmaincode'),
            'add_new_item'          => esc_html__('Add New Link', 'godmaincode'),
            'edit_item'             => esc_html__('Edit Link', 'godmaincode'),
            'new_item'              => esc_html__('New Link', 'godmaincode'),
            'view_item'             => esc_html__('View Link', 'godmaincode'),
            'search_items'          => esc_html__('Search Links', 'godmaincode'),
            'not_found'             => esc_html__('No links found', 'godmaincode'),
            'not_found_in_trash'    => esc_html__('No links found in Trash', 'godmaincode'),
            'parent_item_colon'     => '',
            'menu_name'             => esc_html__('Links', 'godmaincode'),
        ),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 25,
        'menu_icon'           => 'dashicons-admin-links',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'rewrite'             => array(
            'slug'       => 'links',
            'with_front' => true,
        ),
        'supports' => array(
            'title',
            'editor',
            'author',
            'thumbnail',
            'custom-fields',
        ),
        'taxonomies' => array('link_category'),
    ));
}
add_action('init', 'godmaincode_register_custom_post_types');

function godmaincode_register_custom_taxonomies() {
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