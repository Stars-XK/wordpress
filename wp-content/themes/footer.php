<footer id="colophon" class="site-footer glass">
    <div class="container">
        <div class="footer-content grid grid-4">
            <div class="footer-brand">
                <?php the_custom_logo(); ?>
                <h3 class="site-title"><?php bloginfo('name'); ?></h3>
                <p class="site-description"><?php bloginfo('description'); ?></p>
            </div>

            <div class="footer-links">
                <h4><?php esc_html_e('Quick Links', 'godmaincode'); ?></h4>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'menu_class'     => 'footer-menu',
                    'container'      => false,
                ));
                ?>
            </div>

            <div class="footer-contact">
                <h4><?php esc_html_e('Contact', 'godmaincode'); ?></h4>
                <ul>
                    <li><a href="mailto:<?php echo antispambot(get_option('admin_email')); ?>"><?php echo antispambot(get_option('admin_email')); ?></a></li>
                </ul>
            </div>

            <div class="footer-social">
                <h4><?php esc_html_e('Follow Us', 'godmaincode'); ?></h4>
                <div class="social-links">
                    <a href="#" aria-label="Twitter">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"></path>
                        </svg>
                    </a>
                    <a href="#" aria-label="GitHub">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.28 1.15-.28 2.35 0 3.5-1 1.02-1.28 2.25-1 3.5 0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4"></path>
                            <path d="M9 18c-4.51 2-5-2-7-2"></path>
                        </svg>
                    </a>
                    <a href="#" aria-label="RSS">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 11a9 9 0 0 1 9 9"></path>
                            <path d="M4 4a16 16 0 0 1 16 16"></path>
                            <circle cx="5" cy="19" r="1"></circle>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p class="copyright">
                <?php esc_html_e('©', 'godmaincode'); ?> <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.', 'godmaincode'); ?>
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>