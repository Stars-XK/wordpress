<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="particle-container" id="particles"></div>

<header id="masthead" class="site-header">
    <nav id="site-navigation" class="main-navigation">
        <div class="container">
            <div class="nav-wrapper">
                <div class="site-branding">
                    <?php
                    the_custom_logo();
                    if (is_front_page() && is_home()) :
                        ?>
                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                    <?php else : ?>
                        <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                    <?php endif; ?>
                    <p class="site-description"><?php bloginfo('description'); ?></p>
                </div>

                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                    <span class="menu-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>

                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'container'      => 'ul',
                    'menu_class'     => 'primary-menu',
                    'fallback_cb'    => 'godmaincode_fallback_menu',
                ));
                ?>

                <div class="header-actions">
                    <button class="search-toggle" aria-label="<?php esc_attr_e('Search', 'godmaincode'); ?>">
                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.35-4.35"></path>
                        </svg>
                    </button>
                    <button class="cart-toggle" aria-label="<?php esc_attr_e('Cart', 'godmaincode'); ?>">
                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 1.99-1.61L23 6H6"></path>
                        </svg>
                        <span class="cart-count">0</span>
                    </button>
                    <?php if (is_user_logged_in()) : ?>
                        <div class="user-menu">
                            <button class="user-toggle" aria-label="<?php esc_attr_e('User Menu', 'godmaincode'); ?>">
                                <img src="<?php echo get_avatar_url(get_current_user_id(), array('size' => 40)); ?>" alt="<?php esc_attr_e('User Avatar', 'godmaincode'); ?>" class="user-avatar">
                            </button>
                        </div>
                    <?php else : ?>
                        <a href="<?php echo wp_login_url(); ?>" class="login-link">
                            <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <div class="search-overlay" id="search-overlay">
        <div class="search-content">
            <button class="search-close" aria-label="<?php esc_attr_e('Close Search', 'godmaincode'); ?>">
                <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
            <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search...', 'placeholder', 'godmaincode'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                <button type="submit" class="search-submit">
                    <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.35-4.35"></path>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</header>