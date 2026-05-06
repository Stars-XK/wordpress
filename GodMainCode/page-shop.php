<?php
/*
Template Name: Shop Page
*/

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title"><?php the_title(); ?></h1>
            <p class="page-description"><?php echo get_post_meta(get_the_ID(), 'shop_description', true); ?></p>
        </header>
        
        <div class="shop-container">
            <aside class="shop-sidebar">
                <div class="sidebar-section">
                    <h3 class="sidebar-title"><?php esc_html_e('Categories', 'godmaincode'); ?></h3>
                    <ul class="category-list">
                        <li><a href="#" class="active"><?php esc_html_e('All Products', 'godmaincode'); ?></a></li>
                        <?php
                        $product_categories = get_terms(array(
                            'taxonomy' => 'product_category',
                            'hide_empty' => true,
                        ));
                        if (!empty($product_categories)) :
                            foreach ($product_categories as $category) :
                                ?>
                                <li><a href="#"><?php echo esc_html($category->name); ?></a></li>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </ul>
                </div>
                
                <div class="sidebar-section">
                    <h3 class="sidebar-title"><?php esc_html_e('Price Range', 'godmaincode'); ?></h3>
                    <div class="price-filter">
                        <input type="range" min="0" max="1000" value="0" class="price-min">
                        <input type="range" min="0" max="1000" value="1000" class="price-max">
                        <div class="price-display">
                            <span><?php esc_html_e('$', 'godmaincode'); ?><span class="price-min-value">0</span> - <?php esc_html_e('$', 'godmaincode'); ?><span class="price-max-value">1000</span></span>
                        </div>
                    </div>
                </div>
                
                <div class="sidebar-section">
                    <h3 class="sidebar-title"><?php esc_html_e('Sort By', 'godmaincode'); ?></h3>
                    <select class="sort-select">
                        <option value="date"><?php esc_html_e('Newest', 'godmaincode'); ?></option>
                        <option value="price-asc"><?php esc_html_e('Price: Low to High', 'godmaincode'); ?></option>
                        <option value="price-desc"><?php esc_html_e('Price: High to Low', 'godmaincode'); ?></option>
                        <option value="title"><?php esc_html_e('Name: A-Z', 'godmaincode'); ?></option>
                    </select>
                </div>
            </aside>
            
            <div class="shop-products">
                <div class="products-grid">
                    <?php
                    $products_args = array(
                        'post_type' => 'product',
                        'posts_per_page' => 12,
                        'order' => 'DESC',
                        'orderby' => 'date',
                    );
                    $products_query = new WP_Query($products_args);
                    
                    if ($products_query->have_posts()) :
                        while ($products_query->have_posts()) : $products_query->the_post();
                            $price = get_post_meta(get_the_ID(), 'product_price', true);
                            $regular_price = get_post_meta(get_the_ID(), 'product_regular_price', true);
                            $sale = get_post_meta(get_the_ID(), 'product_sale', true);
                            ?>
                            <article class="product-card card">
                                <div class="product-image-wrapper">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('medium'); ?>
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
                                    <?php if ($sale) : ?>
                                        <span class="sale-badge"><?php esc_html_e('Sale', 'godmaincode'); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="product-info">
                                    <h3 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <p class="product-excerpt"><?php the_excerpt(); ?></p>
                                    <div class="product-price">
                                        <span class="current-price"><?php echo esc_html('$' . number_format($price, 2)); ?></span>
                                        <?php if ($regular_price && $regular_price > $price) : ?>
                                            <span class="regular-price"><?php echo esc_html('$' . number_format($regular_price, 2)); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <button class="btn btn-primary add-to-cart-btn" data-product-id="<?php the_ID(); ?>">
                                        <?php esc_html_e('Add to Cart', 'godmaincode'); ?>
                                    </button>
                                </div>
                            </article>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        ?>
                        <div class="empty-state">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21 15 16 10 5 21"></polyline>
                            </svg>
                            <p><?php esc_html_e('No products found.', 'godmaincode'); ?></p>
                        </div>
                        <?php
                    endif;
                    ?>
                </div>
                
                <?php
                if ($products_query->max_num_pages > 1) :
                    ?>
                    <div class="pagination">
                        <?php godmaincode_pagination(); ?>
                    </div>
                    <?php
                endif;
                ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>