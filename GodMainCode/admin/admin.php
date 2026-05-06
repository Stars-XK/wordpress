<?php

if (!defined('ABSPATH')) {
    exit;
}

require_once get_template_directory() . '/admin/login-customizer.php';
require_once get_template_directory() . '/admin/dashboard.php';

function godmaincode_admin_enqueue_styles() {
    wp_enqueue_style('godmaincode-admin', get_template_directory_uri() . '/admin/css/admin.css', array(), GODMAINCODE_VERSION);
}
add_action('admin_enqueue_scripts', 'godmaincode_admin_enqueue_styles');

function godmaincode_admin_enqueue_scripts() {
    wp_enqueue_script('godmaincode-admin', get_template_directory_uri() . '/admin/js/admin.js', array('jquery'), GODMAINCODE_VERSION, true);
}
add_action('admin_enqueue_scripts', 'godmaincode_admin_enqueue_scripts');

function godmaincode_add_admin_menu() {
    add_theme_page(
        esc_html__('GodMainCode Options', 'godmaincode'),
        esc_html__('GodMainCode', 'godmaincode'),
        'manage_options',
        'godmaincode-options',
        'godmaincode_options_page'
    );
}
add_action('admin_menu', 'godmaincode_add_admin_menu');

function godmaincode_options_page() {
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.', 'godmaincode'));
    }
    ?>
    <div class="wrap godmaincode-admin">
        <div class="godmaincode-header">
            <h1><?php esc_html_e('GodMainCode Theme Options', 'godmaincode'); ?></h1>
            <p class="description"><?php esc_html_e('Configure your theme settings.', 'godmaincode'); ?></p>
        </div>
        
        <div class="godmaincode-content">
            <div class="godmaincode-sidebar">
                <nav class="nav-tab-wrapper">
                    <a href="#general" class="nav-tab nav-tab-active"><?php esc_html_e('General', 'godmaincode'); ?></a>
                    <a href="#appearance" class="nav-tab"><?php esc_html_e('Appearance', 'godmaincode'); ?></a>
                    <a href="#weather" class="nav-tab"><?php esc_html_e('Weather', 'godmaincode'); ?></a>
                    <a href="#advanced" class="nav-tab"><?php esc_html_e('Advanced', 'godmaincode'); ?></a>
                </nav>
            </div>
            
            <div class="godmaincode-main">
                <form method="post" action="options.php" class="godmaincode-form">
                    <?php
                    settings_fields('godmaincode_settings');
                    do_settings_sections('godmaincode-options');
                    submit_button();
                    ?>
                </form>
            </div>
        </div>
    </div>
    <?php
}

function godmaincode_register_settings() {
    register_setting('godmaincode_settings', 'godmaincode_weather_api_key', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => '',
    ));
    
    register_setting('godmaincode_settings', 'godmaincode_default_city', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 'Beijing',
    ));
    
    register_setting('godmaincode_settings', 'godmaincode_custom_css', array(
        'sanitize_callback' => 'wp_filter_nohtml_kses',
        'default' => '',
    ));
    
    register_setting('godmaincode_settings', 'godmaincode_custom_js', array(
        'sanitize_callback' => 'wp_filter_nohtml_kses',
        'default' => '',
    ));
    
    add_settings_section('godmaincode_general_section', '', '__return_empty_string', 'godmaincode-options');
    
    add_settings_section('godmaincode_appearance_section', '', '__return_empty_string', 'godmaincode-options');
    
    add_settings_section('godmaincode_weather_section', '', '__return_empty_string', 'godmaincode-options');
    
    add_settings_section('godmaincode_advanced_section', '', '__return_empty_string', 'godmaincode-options');
    
    add_settings_field('godmaincode_weather_api_key_field', esc_html__('OpenWeatherMap API Key', 'godmaincode'), 'godmaincode_weather_api_key_field_callback', 'godmaincode-options', 'godmaincode_weather_section');
    
    add_settings_field('godmaincode_default_city_field', esc_html__('Default City', 'godmaincode'), 'godmaincode_default_city_field_callback', 'godmaincode-options', 'godmaincode_weather_section');
    
    add_settings_field('godmaincode_custom_css_field', esc_html__('Custom CSS', 'godmaincode'), 'godmaincode_custom_css_field_callback', 'godmaincode-options', 'godmaincode_advanced_section');
    
    add_settings_field('godmaincode_custom_js_field', esc_html__('Custom JavaScript', 'godmaincode'), 'godmaincode_custom_js_field_callback', 'godmaincode-options', 'godmaincode_advanced_section');
}
add_action('admin_init', 'godmaincode_register_settings');

function godmaincode_weather_api_key_field_callback() {
    $value = get_option('godmaincode_weather_api_key', '');
    ?>
    <input type="text" name="godmaincode_weather_api_key" id="godmaincode_weather_api_key" value="<?php echo esc_attr($value); ?>" class="regular-text">
    <p class="description"><?php esc_html_e('Get your API key from', 'godmaincode'); ?> <a href="https://openweathermap.org/" target="_blank">openweathermap.org</a></p>
    <?php
}

function godmaincode_default_city_field_callback() {
    $value = get_option('godmaincode_default_city', 'Beijing');
    ?>
    <input type="text" name="godmaincode_default_city" id="godmaincode_default_city" value="<?php echo esc_attr($value); ?>" class="regular-text">
    <p class="description"><?php esc_html_e('Enter the default city for weather display.', 'godmaincode'); ?></p>
    <?php
}

function godmaincode_custom_css_field_callback() {
    $value = get_option('godmaincode_custom_css', '');
    ?>
    <textarea name="godmaincode_custom_css" id="godmaincode_custom_css" rows="10" cols="50" class="large-text code"><?php echo esc_textarea($value); ?></textarea>
    <p class="description"><?php esc_html_e('Add custom CSS to override theme styles.', 'godmaincode'); ?></p>
    <?php
}

function godmaincode_custom_js_field_callback() {
    $value = get_option('godmaincode_custom_js', '');
    ?>
    <textarea name="godmaincode_custom_js" id="godmaincode_custom_js" rows="10" cols="50" class="large-text code"><?php echo esc_textarea($value); ?></textarea>
    <p class="description"><?php esc_html_e('Add custom JavaScript.', 'godmaincode'); ?></p>
    <?php
}

function godmaincode_ajax_get_weather() {
    $api_key = get_option('godmaincode_weather_api_key');
    $city = get_option('godmaincode_default_city', 'Beijing');
    
    if (!$api_key) {
        wp_send_json_error(array('message' => 'API key not set'));
    }
    
    $url = "https://api.openweathermap.org/data/2.5/weather?q=" . urlencode($city) . "&appid=" . $api_key . "&units=metric";
    $response = wp_remote_get($url);
    
    if (is_wp_error($response)) {
        wp_send_json_error(array('message' => 'Failed to fetch weather data'));
    }
    
    $data = json_decode(wp_remote_retrieve_body($response), true);
    
    if (!isset($data['main'], $data['weather'][0])) {
        wp_send_json_error(array('message' => 'Invalid weather data'));
    }
    
    $weather_data = array(
        'temp' => $data['main']['temp'],
        'humidity' => $data['main']['humidity'],
        'wind' => $data['wind']['speed'],
        'description' => ucfirst($data['weather'][0]['description']),
        'icon' => $data['weather'][0]['icon'],
    );
    
    wp_send_json_success($weather_data);
}
add_action('wp_ajax_godmaincode_get_weather', 'godmaincode_ajax_get_weather');
add_action('wp_ajax_nopriv_godmaincode_get_weather', 'godmaincode_ajax_get_weather');

function godmaincode_custom_css_output() {
    $custom_css = get_option('godmaincode_custom_css', '');
    if (!empty($custom_css)) {
        echo '<style type="text/css">' . esc_html($custom_css) . '</style>';
    }
}
add_action('wp_head', 'godmaincode_custom_css_output');

function godmaincode_custom_js_output() {
    $custom_js = get_option('godmaincode_custom_js', '');
    if (!empty($custom_js)) {
        echo '<script type="text/javascript">' . esc_html($custom_js) . '</script>';
    }
}
add_action('wp_footer', 'godmaincode_custom_js_output');