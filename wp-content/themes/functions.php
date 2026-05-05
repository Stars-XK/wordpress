<?php

function godmaincode_setup() {
    load_theme_textdomain('godmaincode', get_template_directory() . '/languages');
    
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ));

    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'godmaincode'),
        'footer'  => esc_html__('Footer Menu', 'godmaincode'),
    ));
    
    godmaincode_register_link_post_type();
}
add_action('after_setup_theme', 'godmaincode_setup');

function godmaincode_register_link_post_type() {
    $labels = array(
        'name'                  => _x('网址导航', 'Post Type General Name', 'godmaincode'),
        'singular_name'         => _x('导航链接', 'Post Type Singular Name', 'godmaincode'),
        'menu_name'             => __('网址导航', 'godmaincode'),
        'name_admin_bar'        => __('导航链接', 'godmaincode'),
        'archives'              => __('链接归档', 'godmaincode'),
        'attributes'            => __('链接属性', 'godmaincode'),
        'parent_item_colon'     => __('父链接:', 'godmaincode'),
        'all_items'             => __('所有链接', 'godmaincode'),
        'add_new_item'          => __('添加新链接', 'godmaincode'),
        'add_new'               => __('添加链接', 'godmaincode'),
        'new_item'              => __('新链接', 'godmaincode'),
        'edit_item'             => __('编辑链接', 'godmaincode'),
        'update_item'           => __('更新链接', 'godmaincode'),
        'view_item'             => __('查看链接', 'godmaincode'),
        'view_items'            => __('查看链接', 'godmaincode'),
        'search_items'          => __('搜索链接', 'godmaincode'),
        'not_found'             => __('没有找到链接', 'godmaincode'),
        'not_found_in_trash'    => __('回收站中没有链接', 'godmaincode'),
        'featured_image'        => __('链接图标', 'godmaincode'),
        'set_featured_image'    => __('设置链接图标', 'godmaincode'),
        'remove_featured_image' => __('移除链接图标', 'godmaincode'),
        'use_featured_image'    => __('使用作为链接图标', 'godmaincode'),
        'insert_into_item'      => __('插入链接', 'godmaincode'),
        'uploaded_to_this_item' => __('上传到此链接', 'godmaincode'),
        'items_list'            => __('链接列表', 'godmaincode'),
        'items_list_navigation' => __('链接列表导航', 'godmaincode'),
        'filter_items_list'     => __('筛选链接列表', 'godmaincode'),
    );
    
    $args = array(
        'label'                 => __('导航链接', 'godmaincode'),
        'description'           => __('网站导航链接管理', 'godmaincode'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'hierarchical'         => false,
        'public'               => true,
        'show_ui'              => true,
        'show_in_menu'         => true,
        'menu_position'        => 5,
        'menu_icon'            => 'dashicons-links',
        'show_in_admin_bar'    => true,
        'show_in_nav_menus'    => true,
        'can_export'           => true,
        'has_archive'          => true,
        'exclude_from_search'  => false,
        'publicly_queryable'   => true,
        'capability_type'      => 'post',
        'show_in_rest'         => true,
    );
    
    register_post_type('godmaincode_link', $args);
    
    register_taxonomy(
        'godmaincode_link_category',
        'godmaincode_link',
        array(
            'label' => __('链接分类', 'godmaincode'),
            'rewrite' => array('slug' => 'link-category'),
            'hierarchical' => true,
            'show_in_rest' => true,
        )
    );
}

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
        'name'          => esc_html__('Weather Widget', 'godmaincode'),
        'id'            => 'weather-1',
        'description'   => esc_html__('Weather widget area.', 'godmaincode'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Music Player', 'godmaincode'),
        'id'            => 'music-1',
        'description'   => esc_html__('Music player widget area.', 'godmaincode'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'godmaincode_widgets_init');

function godmaincode_enqueue_scripts() {
    wp_enqueue_style('godmaincode-style', get_stylesheet_uri(), array(), '2.0.1');
    
    wp_enqueue_style('godmaincode-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap', array(), null);
    
    wp_enqueue_script('godmaincode-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '2.0.1', true);
    
    wp_localize_script('godmaincode-main', 'godmaincode_weather_data', array(
        'api_key' => get_theme_mod('godmaincode_weather_api_key', ''),
        'city' => get_theme_mod('godmaincode_weather_city', 'Beijing'),
    ));
    
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'godmaincode_enqueue_scripts');

function godmaincode_customize_register($wp_customize) {
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    
    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => 'godmaincode_customize_partial_blogname',
        ));
        
        $wp_customize->selective_refresh->add_partial('blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'godmaincode_customize_partial_blogdescription',
        ));
    }

    $wp_customize->add_section('godmaincode_hero_settings', array(
        'title'    => esc_html__('Hero Section', 'godmaincode'),
        'priority' => 25,
    ));

    $wp_customize->add_setting('godmaincode_hero_title', array(
        'default'           => '欢迎来到',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('godmaincode_hero_title', array(
        'label'   => esc_html__('Hero Title', 'godmaincode'),
        'section' => 'godmaincode_hero_settings',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('godmaincode_hero_description', array(
        'default'           => '现代化WordPress主题，采用毛玻璃设计效果',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('godmaincode_hero_description', array(
        'label'   => esc_html__('Hero Description', 'godmaincode'),
        'section' => 'godmaincode_hero_settings',
        'type'    => 'textarea',
    ));

    $wp_customize->add_section('godmaincode_section_titles', array(
        'title'    => esc_html__('Section Titles', 'godmaincode'),
        'priority' => 26,
    ));

    $wp_customize->add_setting('godmaincode_links_title', array(
        'default'           => '网址导航',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('godmaincode_links_title', array(
        'label'   => esc_html__('Links Section Title', 'godmaincode'),
        'section' => 'godmaincode_section_titles',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('godmaincode_articles_title', array(
        'default'           => '最新文章',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('godmaincode_articles_title', array(
        'label'   => esc_html__('Articles Section Title', 'godmaincode'),
        'section' => 'godmaincode_section_titles',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('godmaincode_news_title', array(
        'default'           => '最新新闻',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('godmaincode_news_title', array(
        'label'   => esc_html__('News Section Title', 'godmaincode'),
        'section' => 'godmaincode_section_titles',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('godmaincode_weather_title', array(
        'default'           => '天气情况',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('godmaincode_weather_title', array(
        'label'   => esc_html__('Weather Section Title', 'godmaincode'),
        'section' => 'godmaincode_section_titles',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('godmaincode_music_title', array(
        'default'           => '音乐播放器',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('godmaincode_music_title', array(
        'label'   => esc_html__('Music Section Title', 'godmaincode'),
        'section' => 'godmaincode_section_titles',
        'type'    => 'text',
    ));

    $wp_customize->add_section('godmaincode_weather_settings', array(
        'title'    => esc_html__('Weather Settings', 'godmaincode'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('godmaincode_weather_api_key', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('godmaincode_weather_api_key', array(
        'label'    => esc_html__('OpenWeatherMap API Key', 'godmaincode'),
        'section'  => 'godmaincode_weather_settings',
        'type'     => 'text',
        'description' => esc_html__('Get your API key from https://openweathermap.org/', 'godmaincode'),
    ));

    $wp_customize->add_setting('godmaincode_weather_city', array(
        'default'           => 'Beijing',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('godmaincode_weather_city', array(
        'label'    => esc_html__('Default City', 'godmaincode'),
        'section'  => 'godmaincode_weather_settings',
        'type'     => 'text',
    ));

    $wp_customize->add_section('godmaincode_layout_settings', array(
        'title'    => esc_html__('Layout Settings', 'godmaincode'),
        'priority' => 31,
    ));

    $wp_customize->add_setting('godmaincode_music_player_position', array(
        'default'           => 'drawer',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('godmaincode_music_player_position', array(
        'label'    => esc_html__('Music Player Position', 'godmaincode'),
        'section'  => 'godmaincode_layout_settings',
        'type'     => 'select',
        'choices'  => array(
            'section' => esc_html__('Full Section', 'godmaincode'),
            'drawer'  => esc_html__('Bottom Drawer', 'godmaincode'),
        ),
    ));
}
add_action('customize_register', 'godmaincode_customize_register');

function godmaincode_theme_update_check() {
    $current_version = '2.0.0';
    $theme_slug = 'godmaincode';
    
    $theme_info = wp_remote_get("https://api.wordpress.org/themes/info/1.1/?action=theme_information&request[slug]={$theme_slug}");
    
    if (!is_wp_error($theme_info)) {
        $theme_data = json_decode(wp_remote_retrieve_body($theme_info), true);
        
        if (isset($theme_data['version']) && version_compare($theme_data['version'], $current_version, '>')) {
            add_action('admin_notices', function() use ($theme_data, $current_version) {
                ?>
                <div class="notice notice-info is-dismissible">
                    <p>
                        <?php 
                        printf(
                            esc_html__('A new version of %s is available! Current version: %s, Latest version: %s.', 'godmaincode'),
                            'GodMainCode',
                            $current_version,
                            $theme_data['version']
                        );
                        ?>
                    </p>
                    <p>
                        <a href="<?php echo esc_url(admin_url('update-core.php')); ?>" class="button button-primary">
                            <?php esc_html_e('Update Now', 'godmaincode'); ?>
                        </a>
                    </p>
                </div>
                <?php
            });
        }
    }
}
add_action('admin_init', 'godmaincode_theme_update_check');

function godmaincode_get_links_by_category() {
    $categories = get_terms(array(
        'taxonomy' => 'godmaincode_link_category',
        'hide_empty' => true,
    ));
    
    $links_by_category = array();
    
    if (!empty($categories) && !is_wp_error($categories)) {
        foreach ($categories as $category) {
            $links = get_posts(array(
                'post_type' => 'godmaincode_link',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'godmaincode_link_category',
                        'field' => 'slug',
                        'terms' => $category->slug,
                    ),
                ),
                'posts_per_page' => -1,
            ));
            
            if (!empty($links)) {
                $links_by_category[$category->term_id] = array(
                    'name' => $category->name,
                    'slug' => $category->slug,
                    'links' => $links,
                );
            }
        }
    }
    
    return $links_by_category;
}

function godmaincode_customize_partial_blogname() {
    bloginfo('name');
}

function godmaincode_customize_partial_blogdescription() {
    bloginfo('description');
}

function godmaincode_get_weather_data() {
    $api_key = get_theme_mod('godmaincode_weather_api_key');
    $city = get_theme_mod('godmaincode_weather_city', 'Beijing');
    
    if (empty($api_key)) {
        return array('error' => 'API key not set');
    }
    
    $response = wp_remote_get("https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$api_key}&units=metric");
    
    if (is_wp_error($response)) {
        return array('error' => 'Failed to fetch weather data');
    }
    
    $body = wp_remote_retrieve_body($response);
    return json_decode($body, true);
}

function godmaincode_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'godmaincode_excerpt_length');

function godmaincode_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'godmaincode_excerpt_more');

function godmaincode_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    
    if (get_the_time('U') !== get_the_modified_time('U')) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }
    
    $time_string = sprintf($time_string,
        esc_attr(get_the_date('c')),
        esc_html(get_the_date()),
        esc_attr(get_the_modified_date('c')),
        esc_html(get_the_modified_date())
    );
    
    $posted_on = sprintf(
        esc_html_x('Posted on %s', 'post date', 'godmaincode'),
        '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
    );
    
    echo '<span class="posted-on">' . $posted_on . '</span>';
}

function godmaincode_posted_by() {
    $byline = sprintf(
        esc_html_x('by %s', 'post author', 'godmaincode'),
        '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
    );
    
    echo '<span class="byline"> ' . $byline . '</span>';
}

function godmaincode_comment_navigation() {
    if (get_comment_pages_count() > 1 && get_option('page_comments')) {
        ?>
        <nav class="navigation comment-navigation" role="navigation">
            <h2 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'godmaincode'); ?></h2>
            <div class="nav-links">
                <?php
                if ($prev_link = get_previous_comments_link(__('Older Comments', 'godmaincode'))) {
                    printf('<div class="nav-previous">%s</div>', $prev_link);
                }
                if ($next_link = get_next_comments_link(__('Newer Comments', 'godmaincode'))) {
                    printf('<div class="nav-next">%s</div>', $next_link);
                }
                ?>
            </div>
        </nav>
        <?php
    }
}

function godmaincode_pagination() {
    the_posts_navigation(array(
        'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __('Previous', 'godmaincode') . '</span>',
        'next_text' => '<span class="meta-nav" aria-hidden="true">' . __('Next', 'godmaincode') . '</span>',
    ));
}

function godmaincode_get_posts_by_category($category_name, $number = 5) {
    $args = array(
        'category_name' => $category_name,
        'posts_per_page' => $number,
        'post_status' => 'publish',
    );
    
    return new WP_Query($args);
}

function godmaincode_sanitize_hex_color($color) {
    if (empty($color)) {
        return '#6366f1';
    }
    
    if (preg_match('/^#[a-f0-9]{6}$/i', $color)) {
        return $color;
    }
    
    return '#6366f1';
}