<?php

if (!defined('ABSPATH')) {
    exit;
}

function godmaincode_custom_dashboard() {
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
    remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');
    remove_meta_box('dashboard_primary', 'dashboard', 'side');
    remove_meta_box('dashboard_secondary', 'dashboard', 'side');
    
    add_meta_box('godmaincode_dashboard_stats', esc_html__('Site Stats', 'godmaincode'), 'godmaincode_dashboard_stats', 'dashboard', 'normal', 'high');
    add_meta_box('godmaincode_dashboard_quick_actions', esc_html__('Quick Actions', 'godmaincode'), 'godmaincode_dashboard_quick_actions', 'dashboard', 'side', 'high');
    add_meta_box('godmaincode_dashboard_recent_posts', esc_html__('Recent Posts', 'godmaincode'), 'godmaincode_dashboard_recent_posts', 'dashboard', 'normal', 'default');
    add_meta_box('godmaincode_dashboard_recent_comments', esc_html__('Recent Comments', 'godmaincode'), 'godmaincode_dashboard_recent_comments', 'dashboard', 'side', 'default');
}
add_action('wp_dashboard_setup', 'godmaincode_custom_dashboard');

function godmaincode_dashboard_stats() {
    $post_count = wp_count_posts('post');
    $page_count = wp_count_posts('page');
    $comment_count = wp_count_comments();
    $user_count = count_users();
    
    $stats = array(
        array(
            'label' => esc_html__('Posts', 'godmaincode'),
            'value' => $post_count->publish,
            'icon' => 'dashicons-welcome-write-blog',
            'color' => '#6366f1',
        ),
        array(
            'label' => esc_html__('Pages', 'godmaincode'),
            'value' => $page_count->publish,
            'icon' => 'dashicons-pages',
            'color' => '#06b6d4',
        ),
        array(
            'label' => esc_html__('Comments', 'godmaincode'),
            'value' => $comment_count->approved,
            'icon' => 'dashicons-comments',
            'color' => '#f472b6',
        ),
        array(
            'label' => esc_html__('Users', 'godmaincode'),
            'value' => $user_count['total_users'],
            'icon' => 'dashicons-users',
            'color' => '#10b981',
        ),
    );
    ?>
    <div class="godmaincode-stats-grid">
        <?php foreach ($stats as $stat) : ?>
            <div class="stat-card" style="--stat-color: <?php echo esc_attr($stat['color']); ?>">
                <div class="stat-icon">
                    <span class="dashicons <?php echo esc_attr($stat['icon']); ?>"></span>
                </div>
                <div class="stat-info">
                    <span class="stat-value"><?php echo esc_html($stat['value']); ?></span>
                    <span class="stat-label"><?php echo esc_html($stat['label']); ?></span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php
}

function godmaincode_dashboard_quick_actions() {
    $actions = array(
        array(
            'label' => esc_html__('Add New Post', 'godmaincode'),
            'url' => admin_url('post-new.php'),
            'icon' => 'dashicons-plus',
        ),
        array(
            'label' => esc_html__('Add New Page', 'godmaincode'),
            'url' => admin_url('post-new.php?post_type=page'),
            'icon' => 'dashicons-plus-alt',
        ),
        array(
            'label' => esc_html__('Upload Media', 'godmaincode'),
            'url' => admin_url('media-new.php'),
            'icon' => 'dashicons-upload',
        ),
        array(
            'label' => esc_html__('Theme Options', 'godmaincode'),
            'url' => admin_url('themes.php?page=godmaincode-options'),
            'icon' => 'dashicons-admin-customizer',
        ),
    );
    ?>
    <div class="godmaincode-quick-actions">
        <?php foreach ($actions as $action) : ?>
            <a href="<?php echo esc_url($action['url']); ?>" class="action-link">
                <span class="dashicons <?php echo esc_attr($action['icon']); ?>"></span>
                <span class="action-label"><?php echo esc_html($action['label']); ?></span>
            </a>
        <?php endforeach; ?>
    </div>
    <?php
}

function godmaincode_dashboard_recent_posts() {
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 5,
        'order' => 'DESC',
        'orderby' => 'date',
    );
    $query = new WP_Query($args);
    
    if ($query->have_posts()) :
        ?>
        <div class="godmaincode-recent-posts">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="recent-post-item">
                    <div class="post-title">
                        <a href="<?php echo get_edit_post_link(); ?>"><?php the_title(); ?></a>
                    </div>
                    <div class="post-meta">
                        <span class="post-date"><?php echo get_the_date(); ?></span>
                        <span class="post-status <?php echo get_post_status(); ?>"><?php echo get_post_status(); ?></span>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="view-all">
            <a href="<?php echo admin_url('edit.php'); ?>"><?php esc_html_e('View All Posts', 'godmaincode'); ?></a>
        </div>
        <?php
        wp_reset_postdata();
    endif;
}

function godmaincode_dashboard_recent_comments() {
    $comments = get_comments(array(
        'number' => 5,
        'status' => 'approve',
        'order' => 'DESC',
    ));
    
    if (!empty($comments)) :
        ?>
        <div class="godmaincode-recent-comments">
            <?php foreach ($comments as $comment) : ?>
                <div class="recent-comment-item">
                    <div class="comment-author">
                        <?php echo get_avatar($comment->user_id, 32); ?>
                        <span class="author-name"><?php echo get_comment_author($comment); ?></span>
                    </div>
                    <div class="comment-excerpt">
                        <?php echo wp_trim_words($comment->comment_content, 10); ?>
                    </div>
                    <div class="comment-post">
                        <a href="<?php echo get_edit_post_link($comment->comment_post_ID); ?>"><?php echo get_the_title($comment->comment_post_ID); ?></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="view-all">
            <a href="<?php echo admin_url('edit-comments.php'); ?>"><?php esc_html_e('View All Comments', 'godmaincode'); ?></a>
        </div>
        <?php
    endif;
}

function godmaincode_dashboard_styles() {
    ?>
    <style>
        .godmaincode-stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
            margin-top: 16px;
        }
        
        .stat-card {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.1), rgba(139, 92, 246, 0.1));
            border-radius: 12px;
            padding: 16px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .stat-icon {
            width: 48px;
            height: 48px;
            background: var(--stat-color);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }
        
        .stat-icon .dashicons {
            font-size: 24px;
        }
        
        .stat-info {
            display: flex;
            flex-direction: column;
        }
        
        .stat-value {
            font-size: 28px;
            font-weight: 700;
            color: #1f2937;
        }
        
        .stat-label {
            font-size: 13px;
            color: #6b7280;
        }
        
        .godmaincode-quick-actions {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-top: 16px;
        }
        
        .action-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            background: #f9fafb;
            border-radius: 8px;
            color: #374151;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .action-link:hover {
            background: #efeff5;
            color: #6366f1;
        }
        
        .action-link .dashicons {
            font-size: 18px;
        }
        
        .godmaincode-recent-posts,
        .godmaincode-recent-comments {
            margin-top: 16px;
        }
        
        .recent-post-item,
        .recent-comment-item {
            padding: 12px 0;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .recent-post-item:last-child,
        .recent-comment-item:last-child {
            border-bottom: none;
        }
        
        .post-title a,
        .comment-post a {
            color: #374151;
            text-decoration: none;
            font-size: 14px;
        }
        
        .post-title a:hover,
        .comment-post a:hover {
            color: #6366f1;
        }
        
        .post-meta {
            display: flex;
            gap: 12px;
            margin-top: 4px;
            font-size: 12px;
            color: #6b7280;
        }
        
        .post-status {
            padding: 2px 8px;
            border-radius: 4px;
            font-weight: 500;
            font-size: 11px;
        }
        
        .post-status.publish {
            background: rgba(16, 185, 129, 0.1);
            color: #10b981;
        }
        
        .post-status.draft {
            background: rgba(251, 191, 36, 0.1);
            color: #f59e0b;
        }
        
        .comment-author {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 4px;
        }
        
        .author-name {
            font-size: 13px;
            color: #374151;
        }
        
        .comment-excerpt {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 4px;
        }
        
        .view-all {
            margin-top: 16px;
            text-align: right;
        }
        
        .view-all a {
            font-size: 13px;
            color: #6366f1;
            text-decoration: none;
        }
        
        @media (max-width: 782px) {
            .godmaincode-stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <?php
}
add_action('admin_head', 'godmaincode_dashboard_styles');