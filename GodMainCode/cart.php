<?php
/*
Template Name: Cart Page
*/

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e('Shopping Cart', 'godmaincode'); ?></h1>
        </header>
        
        <div class="cart-container">
            <div class="cart-items">
                <?php
                $cart_items = isset($_SESSION['godmaincode_cart']) ? $_SESSION['godmaincode_cart'] : array();
                
                if (!empty($cart_items)) :
                    foreach ($cart_items as $product_id => $item) :
                        $product = get_post($product_id);
                        if (!$product) continue;
                        ?>
                        <article class="cart-item">
                            <div class="cart-item-image">
                                <?php if (has_post_thumbnail($product_id)) : ?>
                                    <a href="<?php echo get_permalink($product_id); ?>">
                                        <?php echo get_the_post_thumbnail($product_id, 'thumbnail'); ?>
                                    </a>
                                <?php else : ?>
                                    <div class="placeholder-image">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                            <polyline points="21 15 16 10 5 21"></polyline>
                                        </svg>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="cart-item-info">
                                <h3 class="cart-item-title">
                                    <a href="<?php echo get_permalink($product_id); ?>"><?php echo esc_html($product->post_title); ?></a>
                                </h3>
                                <p class="cart-item-description"><?php echo wp_trim_words($product->post_excerpt, 10); ?></p>
                            </div>
                            
                            <div class="cart-item-quantity">
                                <button class="quantity-btn minus" data-product-id="<?php echo $product_id; ?>">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                </button>
                                <input type="number" class="quantity-input" value="<?php echo $item['quantity']; ?>" min="1" data-product-id="<?php echo $product_id; ?>">
                                <button class="quantity-btn plus" data-product-id="<?php echo $product_id; ?>">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                </button>
                            </div>
                            
                            <div class="cart-item-price">
                                <?php
                                $price = get_post_meta($product_id, 'product_price', true);
                                if (!$price) $price = '0.00';
                                echo esc_html('$' . number_format($price * $item['quantity'], 2));
                                ?>
                            </div>
                            
                            <button class="cart-item-remove" data-product-id="<?php echo $product_id; ?>">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button>
                        </article>
                        <?php
                    endforeach;
                else :
                    ?>
                    <div class="empty-cart">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 1.99-1.61L23 6H6"></path>
                        </svg>
                        <p><?php esc_html_e('Your cart is empty.', 'godmaincode'); ?></p>
                        <a href="<?php echo get_post_type_archive_link('product'); ?>" class="btn btn-primary">
                            <?php esc_html_e('Shop Now', 'godmaincode'); ?>
                        </a>
                    </div>
                    <?php
                endif;
                ?>
            </div>
            
            <div class="cart-summary">
                <div class="summary-card">
                    <h3 class="summary-title"><?php esc_html_e('Cart Summary', 'godmaincode'); ?></h3>
                    
                    <div class="summary-row">
                        <span class="summary-label"><?php esc_html_e('Subtotal', 'godmaincode'); ?></span>
                        <span class="summary-value">
                            <?php
                            $subtotal = 0;
                            foreach ($cart_items as $product_id => $item) {
                                $price = get_post_meta($product_id, 'product_price', true);
                                if (!$price) $price = 0;
                                $subtotal += $price * $item['quantity'];
                            }
                            echo esc_html('$' . number_format($subtotal, 2));
                            ?>
                        </span>
                    </div>
                    
                    <div class="summary-row">
                        <span class="summary-label"><?php esc_html_e('Shipping', 'godmaincode'); ?></span>
                        <span class="summary-value"><?php esc_html_e('Free', 'godmaincode'); ?></span>
                    </div>
                    
                    <div class="summary-row total">
                        <span class="summary-label"><?php esc_html_e('Total', 'godmaincode'); ?></span>
                        <span class="summary-value">
                            <?php echo esc_html('$' . number_format($subtotal, 2)); ?>
                        </span>
                    </div>
                    
                    <div class="coupon-section">
                        <input type="text" class="coupon-input" placeholder="<?php esc_attr_e('Enter coupon code', 'godmaincode'); ?>">
                        <button class="btn btn-secondary apply-coupon-btn">
                            <?php esc_html_e('Apply', 'godmaincode'); ?>
                        </button>
                    </div>
                    
                    <button class="btn btn-primary checkout-btn">
                        <?php esc_html_e('Proceed to Checkout', 'godmaincode'); ?>
                    </button>
                    
                    <button class="btn btn-outline clear-cart-btn">
                        <?php esc_html_e('Clear Cart', 'godmaincode'); ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>