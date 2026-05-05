<?php
/**
 * GodMainCode functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package GodMainCode
 */

if ( ! defined( 'GODMAINCODE_VERSION' ) ) {
	define( 'GODMAINCODE_VERSION', '2.3.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function godmaincode_setup() {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	) );

	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'godmaincode' ),
		'footer'  => esc_html__( 'Footer Menu', 'godmaincode' ),
	) );
}
add_action( 'after_setup_theme', 'godmaincode_setup' );

/**
 * Register widget area.
 */
function godmaincode_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'godmaincode' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'godmaincode' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area', 'godmaincode' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets to footer.', 'godmaincode' ),
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="footer-widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'godmaincode_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function godmaincode_scripts() {
	wp_enqueue_style( 'godmaincode-style', get_stylesheet_uri(), array(), GODMAINCODE_VERSION );
	wp_enqueue_style( 'godmaincode-additional', get_template_directory_uri() . '/css/additional-styles.css', array(), GODMAINCODE_VERSION );

	wp_enqueue_script( 'godmaincode-script', get_template_directory_uri() . '/js/main.js', array(), GODMAINCODE_VERSION, true );

	wp_localize_script( 'godmaincode-script', 'godmaincodeData', array(
		'ajaxUrl' => admin_url( 'admin-ajax.php' ),
		'nonce'   => wp_create_nonce( 'godmaincode_nonce' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'godmaincode_scripts' );

/**
 * Enqueue admin scripts and styles.
 */
function godmaincode_admin_styles() {
	if ( is_admin() ) {
		wp_enqueue_style( 'godmaincode-admin-style', get_template_directory_uri() . '/css/admin-style.css', array(), GODMAINCODE_VERSION );
	}
}
add_action( 'admin_enqueue_scripts', 'godmaincode_admin_styles' );

/**
 * Register Custom Post Type for Links
 */
function godmaincode_register_link_post_type() {
	$labels = array(
		'name'                  => esc_html_x( '网址导航', 'Post Type General Name', 'godmaincode' ),
		'singular_name'         => esc_html_x( '导航链接', 'Post Type Singular Name', 'godmaincode' ),
		'menu_name'             => esc_html__( '网址导航', 'godmaincode' ),
		'name_admin_bar'        => esc_html__( '导航链接', 'godmaincode' ),
		'all_items'             => esc_html__( '所有链接', 'godmaincode' ),
		'add_new_item'          => esc_html__( '添加新链接', 'godmaincode' ),
		'add_new'               => esc_html__( '添加新', 'godmaincode' ),
		'new_item'              => esc_html__( '新链接', 'godmaincode' ),
		'edit_item'             => esc_html__( '编辑链接', 'godmaincode' ),
		'update_item'           => esc_html__( '更新链接', 'godmaincode' ),
		'view_item'             => esc_html__( '查看链接', 'godmaincode' ),
		'search_items'          => esc_html__( '搜索链接', 'godmaincode' ),
		'not_found'             => esc_html__( '未找到', 'godmaincode' ),
	);
	$args = array(
		'label'               => esc_html__( '导航链接', 'godmaincode' ),
		'description'         => esc_html__( '网站导航链接管理', 'godmaincode' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'custom-fields' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-links',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'show_in_rest'        => true,
	);
	register_post_type( 'godmaincode_link', $args );

	register_taxonomy(
		'godmaincode_link_category',
		'godmaincode_link',
		array(
			'label'        => esc_html__( '链接分类', 'godmaincode' ),
			'rewrite'      => array( 'slug' => 'link-category' ),
			'hierarchical' => true,
			'show_in_rest' => true,
		)
	);
}
add_action( 'init', 'godmaincode_register_link_post_type' );

/**
 * Add custom fields meta boxes for link post type
 */
function godmaincode_link_meta_box() {
	add_meta_box(
		'godmaincode_link_details',
		esc_html__( '链接详情', 'godmaincode' ),
		'godmaincode_link_meta_box_callback',
		'godmaincode_link',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'godmaincode_link_meta_box' );

function godmaincode_link_meta_box_callback( $post ) {
	wp_nonce_field( 'godmaincode_link_meta_box', 'godmaincode_link_meta_box_nonce' );

	$url  = get_post_meta( $post->ID, 'godmaincode_link_url', true );
	$icon = get_post_meta( $post->ID, 'godmaincode_link_icon', true );
	?>
	<p>
		<label for="godmaincode_link_url"><?php esc_html_e( '网址 URL', 'godmaincode' ); ?></label>
		<input type="url" id="godmaincode_link_url" name="godmaincode_link_url" value="<?php echo esc_url( $url ); ?>" class="widefat" placeholder="https://example.com">
	</p>
	<p>
		<label for="godmaincode_link_icon"><?php esc_html_e( '图标文字', 'godmaincode' ); ?></label>
		<input type="text" id="godmaincode_link_icon" name="godmaincode_link_icon" value="<?php echo esc_attr( $icon ); ?>" class="widefat" placeholder="例：百度">
		<span class="description"><?php esc_html_e( '显示在链接图标上的文字，默认显示标题前两个字符', 'godmaincode' ); ?></span>
	</p>
	<?php
}

function godmaincode_save_link_meta( $post_id ) {
	if ( ! isset( $_POST['godmaincode_link_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['godmaincode_link_meta_box_nonce'], 'godmaincode_link_meta_box' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( isset( $_POST['godmaincode_link_url'] ) ) {
		update_post_meta( $post_id, 'godmaincode_link_url', esc_url_raw( $_POST['godmaincode_link_url'] ) );
	}

	if ( isset( $_POST['godmaincode_link_icon'] ) ) {
		update_post_meta( $post_id, 'godmaincode_link_icon', sanitize_text_field( $_POST['godmaincode_link_icon'] ) );
	}
}
add_action( 'save_post', 'godmaincode_save_link_meta' );

/**
 * Get links grouped by category
 */
function godmaincode_get_links_by_category() {
	$categories = get_terms( array(
		'taxonomy'   => 'godmaincode_link_category',
		'hide_empty' => true,
	) );

	$results = array();

	if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
		foreach ( $categories as $category ) {
			$args  = array(
				'post_type'      => 'godmaincode_link',
				'posts_per_page' => -1,
				'post_status'    => 'publish',
				'tax_query'      => array(
					array(
						'taxonomy' => 'godmaincode_link_category',
						'field'    => 'term_id',
						'terms'    => $category->term_id,
					),
				),
			);
			$links = get_posts( $args );

			if ( ! empty( $links ) ) {
				$results[] = array(
					'name'  => $category->name,
					'links' => $links,
				);
			}
		}
	}

	return $results;
}

/**
 * Get all links without category grouping
 */
function godmaincode_get_all_links() {
	$args  = array(
		'post_type'      => 'godmaincode_link',
		'posts_per_page' => -1,
		'post_status'    => 'publish',
	);
	return get_posts( $args );
}

/**
 * Theme Customizer Settings
 */
function godmaincode_customize_register( $wp_customize ) {
	$wp_customize->add_section( 'godmaincode_general', array(
		'title'    => esc_html__( '主题设置', 'godmaincode' ),
		'priority' => 30,
	) );

	$wp_customize->add_setting( 'godmaincode_logo_text', array(
		'default'           => get_bloginfo( 'name' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'godmaincode_logo_text', array(
		'label'   => esc_html__( '网站标题文字', 'godmaincode' ),
		'section' => 'godmaincode_general',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'godmaincode_hero_title', array(
		'default'           => '欢迎访问',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'godmaincode_hero_title', array(
		'label'   => esc_html__( 'Hero 标题', 'godmaincode' ),
		'section' => 'godmaincode_general',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'godmaincode_hero_subtitle', array(
		'default'           => '探索精彩内容',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'godmaincode_hero_subtitle', array(
		'label'   => esc_html__( 'Hero 副标题', 'godmaincode' ),
		'section' => 'godmaincode_general',
		'type'    => 'text',
	) );

	$wp_customize->add_section( 'godmaincode_sections', array(
		'title'    => esc_html__( '板块设置', 'godmaincode' ),
		'priority' => 35,
	) );

	$wp_customize->add_setting( 'godmaincode_links_title', array(
		'default'           => '网址导航',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'godmaincode_links_title', array(
		'label'   => esc_html__( '网址导航标题', 'godmaincode' ),
		'section' => 'godmaincode_sections',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'godmaincode_news_title', array(
		'default'           => '最新新闻',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'godmaincode_news_title', array(
		'label'   => esc_html__( '新闻板块标题', 'godmaincode' ),
		'section' => 'godmaincode_sections',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'godmaincode_articles_title', array(
		'default'           => '最新文章',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'godmaincode_articles_title', array(
		'label'   => esc_html__( '文章板块标题', 'godmaincode' ),
		'section' => 'godmaincode_sections',
		'type'    => 'text',
	) );

	$wp_customize->add_section( 'godmaincode_footer', array(
		'title'    => esc_html__( '页脚设置', 'godmaincode' ),
		'priority' => 40,
	) );

	$wp_customize->add_setting( 'godmaincode_footer_about', array(
		'default'           => 'GodMainCode - 现代化WordPress主题',
		'sanitize_callback' => 'sanitize_textarea_field',
	) );
	$wp_customize->add_control( 'godmaincode_footer_about', array(
		'label'   => esc_html__( '关于我们', 'godmaincode' ),
		'section' => 'godmaincode_footer',
		'type'    => 'textarea',
	) );

	$wp_customize->add_setting( 'godmaincode_footer_copyright', array(
		'default'           => '© ' . date( 'Y' ) . ' GodMainCode. All rights reserved.',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'godmaincode_footer_copyright', array(
		'label'   => esc_html__( '版权信息', 'godmaincode' ),
		'section' => 'godmaincode_footer',
		'type'    => 'text',
	) );
}
add_action( 'customize_register', 'godmaincode_customize_register' );

/**
 * AJAX handler for weather data
 */
function godmaincode_get_weather() {
	check_ajax_referer( 'godmaincode_nonce', 'nonce' );

	$city = isset( $_POST['city'] ) ? sanitize_text_field( $_POST['city'] ) : 'Shanghai';

	$response = wp_remote_get( "https://wttr.in/{$city}?format=%t" );

	if ( is_wp_error( $response ) ) {
		wp_send_json_error( array( 'message' => '无法获取天气数据' ) );
	}

	$temperature = wp_remote_retrieve_body( $response );
	wp_send_json_success( array( 'temperature' => trim( $temperature ) ) );
}
add_action( 'wp_ajax_get_weather', 'godmaincode_get_weather' );
add_action( 'wp_ajax_nopriv_get_weather', 'godmaincode_get_weather' );

/**
 * Comments callback function
 */
function godmaincode_comments_callback( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<div class="comment-body">
			<div class="comment-author vcard">
				<?php echo get_avatar( $comment, 48 ); ?>
				<cite class="fn"><?php echo get_comment_author_link(); ?></cite>
			</div>
			<div class="comment-meta">
				<a href="<?php echo esc_url( get_comment_link() ); ?>">
					<?php printf( esc_html__( '%1$s at %2$s', 'godmaincode' ), get_comment_date(), get_comment_time() ); ?>
				</a>
			</div>
			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'godmaincode' ); ?></p>
			<?php endif; ?>
			<?php comment_text(); ?>
			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div>
		</div>
	<?php
}

/**
 * Excerpt length
 */
function godmaincode_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'godmaincode_excerpt_length' );

/**
 * Excerpt more
 */
function godmaincode_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'godmaincode_excerpt_more' );

/**
 * Theme activation notice
 */
function godmaincode_activation_admin_notice() {
	global $pagenow;
	if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
		add_theme_support( 'admin-notice' );
		?>
		<div class="notice notice-success is-dismissible">
			<p><?php esc_html_e( 'GodMainCode 主题已激活！请访问', 'godmaincode' ); ?> <a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>"><?php esc_html_e( '自定义设置', 'godmaincode' ); ?></a> <?php esc_html_e( '来配置您的网站。', 'godmaincode' ); ?></p>
		</div>
		<?php
	}
}
add_action( 'admin_notices', 'godmaincode_activation_admin_notice' );
