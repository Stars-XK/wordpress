<?php
/*
Template Name: Order Success Page
*/

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <div class="order-success">
            <div class="success-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polyline points="6 12 10 16 18 8"></polyline>
                </svg>
            </div>
            <h1 class="success-title"><?php esc_html_e('Order Confirmed!', 'godmaincode'); ?></h1>
            <p class="success-message">
                <?php esc_html_e('Thank you for your purchase. Your order has been confirmed and will be shipped within 1-3 business days.', 'godmaincode'); ?>
            </p>
            
            <div class="order-info">
                <div class="info-item">
                    <span class="info-label"><?php esc_html_e('Order Number', 'godmaincode'); ?></span>
                    <span class="info-value">#<?php echo date('Ymd') . rand(1000, 9999); ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label"><?php esc_html_e('Order Date', 'godmaincode'); ?></span>
                    <span class="info-value"><?php echo date('F j, Y'); ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label"><?php esc_html_e('Total Amount', 'godmaincode'); ?></span>
                    <span class="info-value total"><?php echo '$' . number_format($_SESSION['godmaincode_order_total'] ?? 0, 2); ?></span>
                </div>
            </div>
            
            <div class="success-actions">
                <a href="<?php echo get_post_type_archive_link('product'); ?>" class="btn btn-primary">
                    <?php esc_html_e('Continue Shopping', 'godmaincode'); ?>
                </a>
                <a href="<?php echo get_page_link(get_page_by_path('profile')); ?>" class="btn btn-secondary">
                    <?php esc_html_e('View Orders', 'godmaincode'); ?>
                </a>
            </div>
            
            <div class="shipping-info">
                <h3><?php esc_html_e('Shipping Information', 'godmaincode'); ?></h3>
                <p><?php esc_html_e('You will receive a confirmation email shortly with tracking information.', 'godmaincode'); ?></p>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>