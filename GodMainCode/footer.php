<footer id="colophon" class="site-footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-widgets">
                <?php if (is_active_sidebar('footer-1')) : ?>
                    <div class="footer-widget footer-widget-1">
                        <?php dynamic_sidebar('footer-1'); ?>
                    </div>
                <?php endif; ?>
                
                <?php if (is_active_sidebar('footer-2')) : ?>
                    <div class="footer-widget footer-widget-2">
                        <?php dynamic_sidebar('footer-2'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="footer-menu">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'menu_id'        => 'footer-menu',
                    'container'      => 'ul',
                    'menu_class'     => 'footer-menu-list',
                    'fallback_cb'    => false,
                ));
                ?>
            </div>

            <div class="footer-social">
                <ul class="social-links">
                    <li><a href="#" aria-label="<?php esc_attr_e('Twitter', 'godmaincode'); ?>">
                        <svg class="icon" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                        </svg>
                    </a></li>
                    <li><a href="#" aria-label="<?php esc_attr_e('GitHub', 'godmaincode'); ?>">
                        <svg class="icon" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                        </svg>
                    </a></li>
                    <li><a href="#" aria-label="<?php esc_attr_e('Instagram', 'godmaincode'); ?>">
                        <svg class="icon" viewBox="0 0 24 24" fill="currentColor">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
                        </svg>
                    </a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="copyright">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.', 'godmaincode'); ?></p>
            </div>
            <div class="footer-credit">
                <p><?php esc_html_e('Theme by', 'godmaincode'); ?> <a href="https://github.com/" target="_blank" rel="noopener noreferrer">GodMainCode</a></p>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>