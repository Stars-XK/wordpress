<?php

if (!defined('ABSPATH')) {
    exit;
}

function godmaincode_reading_time() {
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200);
    
    if ($reading_time == 1) {
        return esc_html__('1 min read', 'godmaincode');
    } else {
        return sprintf(esc_html__('%d min read', 'godmaincode'), $reading_time);
    }
}

function godmaincode_get_post_views() {
    $count = get_post_meta(get_the_ID(), 'godmaincode_post_views', true);
    return $count ? number_format_i18n($count) : '0';
}

function godmaincode_set_post_views() {
    $post_id = get_the_ID();
    $count = get_post_meta($post_id, 'godmaincode_post_views', true);
    
    if ($count == '') {
        $count = 0;
        delete_post_meta($post_id, 'godmaincode_post_views');
        add_post_meta($post_id, 'godmaincode_post_views', '0');
    } else {
        $count++;
        update_post_meta($post_id, 'godmaincode_post_views', $count);
    }
}

function godmaincode_fallback_menu() {
    echo '<ul id="primary-menu" class="primary-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Home', 'godmaincode') . '</a></li>';
    echo '<li><a href="' . esc_url(get_post_type_archive_link('post')) . '">' . esc_html__('Blog', 'godmaincode') . '</a></li>';
    echo '<li><a href="' . esc_url(get_page_link(get_page_by_path('about'))) . '">' . esc_html__('About', 'godmaincode') . '</a></li>';
    echo '<li><a href="' . esc_url(get_page_link(get_page_by_path('contact'))) . '">' . esc_html__('Contact', 'godmaincode') . '</a></li>';
    echo '</ul>';
}

function godmaincode_custom_excerpt_length($length) {
    return 20;
}

function godmaincode_custom_excerpt_more($more) {
    return '&hellip;';
}

function godmaincode_pagination() {
    global $wp_query;
    
    $big = 999999999;
    
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_text' => '<svg class="pagination-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M15 19l-7-7 7-7"/>
        </svg>',
        'next_text' => '<svg class="pagination-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M9 5l7 7-7 7"/>
        </svg>',
        'type' => 'list',
        'before_page_number' => '',
        'after_page_number' => '',
    ));
}

function godmaincode_get_theme_mode() {
    return get_theme_mod('godmaincode_theme_mode', 'light');
}

function godmaincode_get_particle_effect() {
    return get_theme_mod('godmaincode_particle_effect', 'sakura');
}

function godmaincode_social_share_links() {
    $url = get_permalink();
    $title = urlencode(get_the_title());
    $image = get_the_post_thumbnail_url(get_the_ID(), 'large');
    
    $links = array(
        'wechat' => array(
            'label' => esc_html__('WeChat', 'godmaincode'),
            'url' => 'https://share.wechat.com/cgi-bin/share?text=' . $title . '&url=' . urlencode($url),
            'icon' => 'dashicons-share',
        ),
        'weibo' => array(
            'label' => esc_html__('Weibo', 'godmaincode'),
            'url' => 'https://service.weibo.com/share/share.php?url=' . urlencode($url) . '&title=' . $title . '&pic=' . urlencode($image),
            'icon' => 'dashicons-share-alt',
        ),
        'qq' => array(
            'label' => esc_html__('QQ', 'godmaincode'),
            'url' => 'https://connect.qq.com/widget/shareqq/index.html?url=' . urlencode($url) . '&title=' . $title,
            'icon' => 'dashicons-format-gallery',
        ),
        'twitter' => array(
            'label' => esc_html__('Twitter', 'godmaincode'),
            'url' => 'https://twitter.com/intent/tweet?url=' . urlencode($url) . '&text=' . $title,
            'icon' => 'dashicons-twitter',
        ),
        'facebook' => array(
            'label' => esc_html__('Facebook', 'godmaincode'),
            'url' => 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($url),
            'icon' => 'dashicons-facebook',
        ),
    );
    
    ob_start();
    ?>
    <div class="social-share">
        <span class="share-label"><?php esc_html_e('Share:', 'godmaincode'); ?></span>
        <div class="share-links">
            <?php foreach ($links as $key => $link) : ?>
                <a href="<?php echo esc_url($link['url']); ?>" target="_blank" rel="noopener noreferrer" class="share-link" title="<?php echo esc_attr($link['label']); ?>">
                    <span class="dashicons <?php echo esc_attr($link['icon']); ?>"></span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

function godmaincode_comment_callback($comment, $args, $depth) {
    $tag = ('div' === $args['style']) ? 'div' : 'li';
    ?>
    <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?>>
        <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
            <footer class="comment-meta">
                <div class="comment-author vcard">
                    <?php if (0 != $args['avatar_size']) { echo get_avatar($comment, $args['avatar_size']); } ?>
                    <cite class="fn"><?php echo get_comment_author_link(); ?></cite>
                    <span class="comment-metadata">
                        <time datetime="<?php comment_time('c'); ?>">
                            <?php printf(esc_html__('%1$s at %2$s', 'godmaincode'), get_comment_date(), get_comment_time()); ?>
                        </time>
                    </span>
                    <?php
                    comment_reply_link(array_merge($args, array(
                        'add_below' => 'div-comment',
                        'depth'     => $depth,
                        'max_depth' => $args['max_depth'],
                        'before'    => '<span class="reply">',
                        'after'     => '</span>',
                    )));
                    ?>
                </div>
                <?php if ('0' == $comment->comment_approved) : ?>
                    <p class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'godmaincode'); ?></p>
                <?php endif; ?>
            </footer>
            <div class="comment-content">
                <?php comment_text(); ?>
            </div>
        </article>
    <?php
}