<?php

if (!defined('ABSPATH')) {
    exit;
}

function godmaincode_subscribe_form() {
    ob_start();
    ?>
    <div class="subscribe-widget">
        <h3 class="widget-title"><?php esc_html_e('Subscribe', 'godmaincode'); ?></h3>
        <p class="subscribe-description"><?php esc_html_e('Subscribe to get updates and news.', 'godmaincode'); ?></p>
        <form class="subscribe-form" method="post" action="">
            <?php wp_nonce_field('godmaincode_subscribe_nonce', 'subscribe_nonce'); ?>
            <input type="email" name="subscribe_email" placeholder="<?php esc_attr_e('Enter your email', 'godmaincode'); ?>" required>
            <button type="submit" class="btn btn-primary subscribe-btn">
                <?php esc_html_e('Subscribe', 'godmaincode'); ?>
            </button>
        </form>
        <p class="subscribe-privacy"><?php esc_html_e('We respect your privacy. Unsubscribe anytime.', 'godmaincode'); ?></p>
    </div>
    <?php
    return ob_get_clean();
}

function godmaincode_handle_subscribe() {
    if (isset($_POST['subscribe_email']) && wp_verify_nonce($_POST['subscribe_nonce'], 'godmaincode_subscribe_nonce')) {
        $email = sanitize_email($_POST['subscribe_email']);
        
        if (is_email($email)) {
            $subscribers = get_option('godmaincode_subscribers', array());
            
            if (!in_array($email, $subscribers)) {
                $subscribers[] = $email;
                update_option('godmaincode_subscribers', $subscribers);
                
                wp_send_json_success(array('message' => esc_html__('Successfully subscribed!', 'godmaincode')));
            } else {
                wp_send_json_error(array('message' => esc_html__('You are already subscribed.', 'godmaincode')));
            }
        } else {
            wp_send_json_error(array('message' => esc_html__('Invalid email address.', 'godmaincode')));
        }
    }
}
add_action('wp_ajax_godmaincode_subscribe', 'godmaincode_handle_subscribe');
add_action('wp_ajax_nopriv_godmaincode_subscribe', 'godmaincode_handle_subscribe');

function godmaincode_send_new_post_notification($post_id) {
    if (get_post_type($post_id) !== 'post' || get_post_status($post_id) !== 'publish') {
        return;
    }
    
    $subscribers = get_option('godmaincode_subscribers', array());
    
    if (empty($subscribers)) {
        return;
    }
    
    $post = get_post($post_id);
    $subject = sprintf(esc_html__('New Post: %s', 'godmaincode'), $post->post_title);
    $message = sprintf(esc_html__('Hi there,\n\nA new post has been published on %s:\n\n%s\n%s\n\nRead more: %s\n\nBest regards,\n%s', 'godmaincode'),
        get_bloginfo('name'),
        $post->post_title,
        wp_trim_words($post->post_content, 20),
        get_permalink($post_id),
        get_bloginfo('name')
    );
    
    foreach ($subscribers as $email) {
        wp_mail($email, $subject, $message);
    }
}
add_action('publish_post', 'godmaincode_send_new_post_notification');

function godmaincode_subscribers_menu() {
    add_submenu_page(
        'options-general.php',
        esc_html__('Subscribers', 'godmaincode'),
        esc_html__('Subscribers', 'godmaincode'),
        'manage_options',
        'godmaincode-subscribers',
        'godmaincode_subscribers_page'
    );
}
add_action('admin_menu', 'godmaincode_subscribers_menu');

function godmaincode_subscribers_page() {
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.', 'godmaincode'));
    }
    
    $subscribers = get_option('godmaincode_subscribers', array());
    
    if (isset($_POST['delete_subscriber']) && wp_verify_nonce($_POST['subscribers_nonce'], 'godmaincode_subscribers_nonce')) {
        $email = sanitize_email($_POST['delete_subscriber']);
        $subscribers = array_diff($subscribers, array($email));
        update_option('godmaincode_subscribers', $subscribers);
    }
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('Subscribers', 'godmaincode'); ?></h1>
        <p><?php esc_html_e('Manage email subscribers.', 'godmaincode'); ?></p>
        
        <?php if (!empty($subscribers)) : ?>
            <table class="wp-list-table widefat fixed striped">
                <thead>
                    <tr>
                        <th><?php esc_html_e('Email', 'godmaincode'); ?></th>
                        <th><?php esc_html_e('Actions', 'godmaincode'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($subscribers as $email) : ?>
                        <tr>
                            <td><?php echo esc_html($email); ?></td>
                            <td>
                                <form method="post" action="" style="display: inline;">
                                    <?php wp_nonce_field('godmaincode_subscribers_nonce', 'subscribers_nonce'); ?>
                                    <input type="hidden" name="delete_subscriber" value="<?php echo esc_attr($email); ?>">
                                    <button type="submit" class="button button-secondary" onclick="return confirm('<?php esc_attr_e('Are you sure?', 'godmaincode'); ?>')">
                                        <?php esc_html_e('Delete', 'godmaincode'); ?>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p><?php esc_html_e('No subscribers yet.', 'godmaincode'); ?></p>
        <?php endif; ?>
    </div>
    <?php
}