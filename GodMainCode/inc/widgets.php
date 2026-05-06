<?php

if (!defined('ABSPATH')) {
    exit;
}

class GodMainCode_Weather_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'godmaincode_weather_widget',
            esc_html__('Weather', 'godmaincode'),
            array('description' => esc_html__('Display current weather', 'godmaincode'))
        );
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];
        
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        
        $api_key = get_option('godmaincode_weather_api_key');
        $city = !empty($instance['city']) ? $instance['city'] : 'Beijing';
        
        if ($api_key) {
            $weather_data = godmaincode_get_weather_data($api_key, $city);
            if ($weather_data) {
                ?>
                <div class="weather-widget">
                    <div class="weather-icon">
                        <img src="http://openweathermap.org/img/wn/<?php echo esc_attr($weather_data['icon']); ?>@2x.png" alt="<?php echo esc_attr($weather_data['description']); ?>">
                    </div>
                    <div class="weather-info">
                        <div class="weather-temp"><?php echo esc_html($weather_data['temp']); ?>°C</div>
                        <div class="weather-city"><?php echo esc_html($city); ?></div>
                        <div class="weather-desc"><?php echo esc_html($weather_data['description']); ?></div>
                    </div>
                    <div class="weather-details">
                        <div class="detail-item">
                            <span class="detail-label"><?php esc_html_e('Humidity', 'godmaincode'); ?></span>
                            <span class="detail-value"><?php echo esc_html($weather_data['humidity']); ?>%</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label"><?php esc_html_e('Wind', 'godmaincode'); ?></span>
                            <span class="detail-value"><?php echo esc_html($weather_data['wind']); ?> m/s</span>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo '<p>' . esc_html__('Please set your OpenWeatherMap API key in Theme Options.', 'godmaincode') . '</p>';
        }
        
        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('Weather', 'godmaincode');
        $city = !empty($instance['city']) ? $instance['city'] : 'Beijing';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title:', 'godmaincode'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('city')); ?>"><?php esc_attr_e('City:', 'godmaincode'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('city')); ?>" name="<?php echo esc_attr($this->get_field_name('city')); ?>" type="text" value="<?php echo esc_attr($city); ?>">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['city'] = (!empty($new_instance['city'])) ? strip_tags($new_instance['city']) : '';
        return $instance;
    }
}

function godmaincode_register_widgets() {
    register_widget('GodMainCode_Weather_Widget');
}
add_action('widgets_init', 'godmaincode_register_widgets');

function godmaincode_get_weather_data($api_key, $city) {
    $transient_key = 'godmaincode_weather_' . md5($city);
    $cached_data = get_transient($transient_key);
    
    if ($cached_data) {
        return $cached_data;
    }
    
    $url = "https://api.openweathermap.org/data/2.5/weather?q=" . urlencode($city) . "&appid=" . $api_key . "&units=metric";
    $response = wp_remote_get($url);
    
    if (!is_wp_error($response)) {
        $data = json_decode(wp_remote_retrieve_body($response), true);
        
        if (isset($data['main'], $data['weather'][0], $data['wind'])) {
            $weather_data = array(
                'temp' => $data['main']['temp'],
                'humidity' => $data['main']['humidity'],
                'wind' => $data['wind']['speed'],
                'description' => ucfirst($data['weather'][0]['description']),
                'icon' => $data['weather'][0]['icon'],
            );
            
            set_transient($transient_key, $weather_data, 15 * MINUTE_IN_SECONDS);
            return $weather_data;
        }
    }
    
    return false;
}