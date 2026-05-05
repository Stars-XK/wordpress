<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'godmaincode' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="header-container">
			<div class="navbar-brand">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				?>
			</div>

			<nav id="site-navigation" class="main-navigation">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'menu_class'     => 'primary-menu',
						'container'      => 'ul',
					)
				);
				?>
			</nav>

			<div class="header-actions">
				<div class="header-weather">
					<div class="weather-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<circle cx="12" cy="12" r="4"></circle>
							<path d="M12 2v2"></path>
							<path d="M12 20v2"></path>
							<path d="m4.93 4.93 1.41 1.41"></path>
							<path d="m17.66 17.66 1.41 1.41"></path>
							<path d="M2 12h2"></path>
							<path d="M20 12h2"></path>
							<path d="m6.34 17.66-1.41 1.41"></path>
							<path d="m19.07 4.93-1.41 1.41"></path>
					</svg>
					</div>
					<span class="weather-text">--°C</span>
				</div>

				<button class="search-icon" aria-label="搜索">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
						<circle cx="11" cy="11" r="8"></circle>
						<path d="m21 21-4.35-4.35"></path>
					</svg>
				</button>

				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
						<line x1="3" x2="21" y1="12" y2="12"></line>
						<line x1="3" x2="21" y1="6" y2="6"></line>
						<line x1="3" x2="21" y1="18" y2="18"></line>
					</svg>
				</button>
			</div>
		</div>

		<div class="search-overlay">
			<div class="search-container">
				<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<label>
						<span class="screen-reader-text">搜索：</span>
						<input type="search" class="search-field" placeholder="搜索..." value="<?php echo get_search_query(); ?>" name="s">
					</label>
					<button type="submit" class="search-submit">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<circle cx="11" cy="11" r="8"></circle>
							<path d="m21 21-4.35-4.35"></path>
					</svg>
					</button>
				</form>
				<button class="close-search">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
						<line x1="18" x2="6" y1="6" y2="18"></line>
						<line x1="6" x2="18" y1="6" y2="18"></line>
					</svg>
				</button>
			</div>
		</div>
	</header>
