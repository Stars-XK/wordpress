<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title">
                    <?php esc_html_e('Welcome to', 'godmaincode'); ?>
                    <span class="text-gradient"><?php bloginfo('name'); ?></span>
                </h1>
                <p class="hero-description">
                    <?php bloginfo('description'); ?>
                </p>
                <div class="hero-actions">
                    <a href="#" class="btn btn-primary"><?php esc_html_e('Explore', 'godmaincode'); ?></a>
                    <a href="#" class="btn btn-secondary"><?php esc_html_e('Learn More', 'godmaincode'); ?></a>
                </div>
            </div>
            <div class="hero-visual">
                <div class="hero-glass-card glass">
                    <div class="stats">
                        <div class="stat-item">
                            <span class="stat-number"><?php echo wp_count_posts()->publish; ?></span>
                            <span class="stat-label"><?php esc_html_e('Articles', 'godmaincode'); ?></span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">10K+</span>
                            <span class="stat-label"><?php esc_html_e('Visitors', 'godmaincode'); ?></span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">50+</span>
                            <span class="stat-label"><?php esc_html_e('Categories', 'godmaincode'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>