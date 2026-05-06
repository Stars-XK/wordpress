<?php
/*
Template Name: Checkout Page
*/

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e('Checkout', 'godmaincode'); ?></h1>
        </header>
        
        <div class="checkout-container">
            <div class="checkout-form">
                <h2 class="checkout-section-title"><?php esc_html_e('Billing Details', 'godmaincode'); ?></h2>
                
                <form class="billing-form" method="post" action="">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="billing-first-name"><?php esc_html_e('First Name', 'godmaincode'); ?> *</label>
                            <input type="text" id="billing-first-name" name="billing_first_name" required>
                        </div>
                        <div class="form-group">
                            <label for="billing-last-name"><?php esc_html_e('Last Name', 'godmaincode'); ?> *</label>
                            <input type="text" id="billing-last-name" name="billing_last_name" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="billing-email"><?php esc_html_e('Email Address', 'godmaincode'); ?> *</label>
                        <input type="email" id="billing-email" name="billing_email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="billing-phone"><?php esc_html_e('Phone Number', 'godmaincode'); ?> *</label>
                        <input type="tel" id="billing-phone" name="billing_phone" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="billing-address"><?php esc_html_e('Address', 'godmaincode'); ?> *</label>
                        <input type="text" id="billing-address" name="billing_address" required placeholder="<?php esc_attr_e('Street address', 'godmaincode'); ?>">
                    </div>
                    
                    <div class="form-group">
                        <input type="text" name="billing_address_2" placeholder="<?php esc_attr_e('Apartment, suite, unit etc. (optional)', 'godmaincode'); ?>">
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="billing-city"><?php esc_html_e('City', 'godmaincode'); ?> *</label>
                            <input type="text" id="billing-city" name="billing_city" required>
                        </div>
                        <div class="form-group">
                            <label for="billing-state"><?php esc_html_e('State / Province', 'godmaincode'); ?> *</label>
                            <input type="text" id="billing-state" name="billing_state" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="billing-postcode"><?php esc_html_e('Postcode / ZIP', 'godmaincode'); ?> *</label>
                            <input type="text" id="billing-postcode" name="billing_postcode" required>
                        </div>
                        <div class="form-group">
                            <label for="billing-country"><?php esc_html_e('Country', 'godmaincode'); ?> *</label>
                            <select id="billing-country" name="billing_country" required>
                                <option value="CN"><?php esc_html_e('China', 'godmaincode'); ?></option>
                                <option value="US"><?php esc_html_e('United States', 'godmaincode'); ?></option>
                                <option value="JP"><?php esc_html_e('Japan', 'godmaincode'); ?></option>
                                <option value="KR"><?php esc_html_e('South Korea', 'godmaincode'); ?></option>
                                <option value="GB"><?php esc_html_e('United Kingdom', 'godmaincode'); ?></option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="order-notes"><?php esc_html_e('Order Notes', 'godmaincode'); ?></label>
                        <textarea id="order-notes" name="order_notes" rows="4" placeholder="<?php esc_attr_e('Notes about your order, e.g. special notes for delivery.', 'godmaincode'); ?>"></textarea>
                    </div>
                </form>
            </div>
            
            <div class="checkout-summary">
                <h2 class="checkout-section-title"><?php esc_html_e('Your Order', 'godmaincode'); ?></h2>
                
                <div class="order-items">
                    <?php
                    $cart_items = isset($_SESSION['godmaincode_cart']) ? $_SESSION['godmaincode_cart'] : array();
                    $subtotal = 0;
                    
                    if (!empty($cart_items)) :
                        foreach ($cart_items as $product_id => $item) :
                            $product = get_post($product_id);
                            if (!$product) continue;
                            
                            $price = get_post_meta($product_id, 'product_price', true);
                            if (!$price) $price = 0;
                            $subtotal += $price * $item['quantity'];
                            ?>
                            <div class="order-item">
                                <div class="order-item-info">
                                    <h4 class="order-item-title"><?php echo esc_html($product->post_title); ?></h4>
                                    <span class="order-item-quantity"><?php esc_html_e('Qty:', 'godmaincode'); ?> <?php echo $item['quantity']; ?></span>
                                </div>
                                <div class="order-item-price">
                                    <?php echo esc_html('$' . number_format($price * $item['quantity'], 2)); ?>
                                </div>
                            </div>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </div>
                
                <div class="order-totals">
                    <div class="total-row">
                        <span class="total-label"><?php esc_html_e('Subtotal', 'godmaincode'); ?></span>
                        <span class="total-value"><?php echo esc_html('$' . number_format($subtotal, 2)); ?></span>
                    </div>
                    <div class="total-row">
                        <span class="total-label"><?php esc_html_e('Shipping', 'godmaincode'); ?></span>
                        <span class="total-value"><?php esc_html_e('Free Shipping', 'godmaincode'); ?></span>
                    </div>
                    <div class="total-row total">
                        <span class="total-label"><?php esc_html_e('Total', 'godmaincode'); ?></span>
                        <span class="total-value"><?php echo esc_html('$' . number_format($subtotal, 2)); ?></span>
                    </div>
                </div>
                
                <div class="payment-methods">
                    <h3><?php esc_html_e('Payment Method', 'godmaincode'); ?></h3>
                    <div class="payment-options">
                        <label class="payment-option">
                            <input type="radio" name="payment_method" value="paypal" checked>
                            <span class="payment-icon paypal"></span>
                            <span class="payment-label"><?php esc_html_e('PayPal', 'godmaincode'); ?></span>
                        </label>
                        <label class="payment-option">
                            <input type="radio" name="payment_method" value="credit-card">
                            <span class="payment-icon credit-card"></span>
                            <span class="payment-label"><?php esc_html_e('Credit Card', 'godmaincode'); ?></span>
                        </label>
                        <label class="payment-option">
                            <input type="radio" name="payment_method" value="bank-transfer">
                            <span class="payment-icon bank"></span>
                            <span class="payment-label"><?php esc_html_e('Bank Transfer', 'godmaincode'); ?></span>
                        </label>
                    </div>
                </div>
                
                <button class="btn btn-primary place-order-btn">
                    <?php esc_html_e('Place Order', 'godmaincode'); ?>
                </button>
                
                <p class="terms-text">
                    <?php esc_html_e('By placing an order, you agree to our', 'godmaincode'); ?>
                    <a href="#"><?php esc_html_e('Terms and Conditions', 'godmaincode'); ?></a>
                    <?php esc_html_e('and', 'godmaincode'); ?>
                    <a href="#"><?php esc_html_e('Privacy Policy', 'godmaincode'); ?></a>.
                </p>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>