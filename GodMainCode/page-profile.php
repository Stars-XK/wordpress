<?php
/*
Template Name: Profile Page
*/

get_header();

if (!is_user_logged_in()) {
    echo '<div class="container"><p>' . esc_html__('Please login to view your profile.', 'godmaincode') . '</p></div>';
    get_footer();
    exit;
}

$current_user = wp_get_current_user();
?>

<main id="primary" class="site-main">
    <div class="container">
        <div class="profile-container">
            <div class="profile-sidebar">
                <div class="profile-card">
                    <div class="profile-avatar">
                        <img src="<?php echo get_avatar_url($current_user->ID, array('size' => 128)); ?>" alt="<?php esc_attr_e('Profile Avatar', 'godmaincode'); ?>">
                        <div class="status-indicator online"></div>
                    </div>
                    <h2 class="profile-name"><?php echo esc_html($current_user->display_name); ?></h2>
                    <p class="profile-bio"><?php echo esc_html($current_user->description); ?></p>
                    
                    <div class="profile-stats">
                        <div class="stat-item">
                            <span class="stat-value"><?php echo count_user_posts($current_user->ID); ?></span>
                            <span class="stat-label"><?php esc_html_e('Posts', 'godmaincode'); ?></span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value"><?php echo count(get_comments(array('user_id' => $current_user->ID))); ?></span>
                            <span class="stat-label"><?php esc_html_e('Comments', 'godmaincode'); ?></span>
                        </div>
                    </div>
                    
                    <div class="profile-actions">
                        <button class="btn btn-secondary edit-profile-btn">
                            <?php esc_html_e('Edit Profile', 'godmaincode'); ?>
                        </button>
                        <a href="<?php echo wp_logout_url(get_permalink()); ?>" class="btn logout-btn">
                            <?php esc_html_e('Logout', 'godmaincode'); ?>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="profile-content">
                <div class="profile-tabs">
                    <button class="tab-btn active" data-tab="posts">
                        <?php esc_html_e('My Posts', 'godmaincode'); ?>
                    </button>
                    <button class="tab-btn" data-tab="comments">
                        <?php esc_html_e('My Comments', 'godmaincode'); ?>
                    </button>
                    <button class="tab-btn" data-tab="favorites">
                        <?php esc_html_e('Favorites', 'godmaincode'); ?>
                    </button>
                    <button class="tab-btn" data-tab="orders">
                        <?php esc_html_e('Orders', 'godmaincode'); ?>
                    </button>
                </div>
                
                <div class="tab-content active" id="posts-tab">
                    <?php
                    $user_posts_args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 10,
                        'author' => $current_user->ID,
                        'order' => 'DESC',
                        'orderby' => 'date',
                    );
                    $user_posts_query = new WP_Query($user_posts_args);
                    
                    if ($user_posts_query->have_posts()) :
                        ?>
                        <div class="posts-list">
                            <?php while ($user_posts_query->have_posts()) : $user_posts_query->the_post(); ?>
                                <article class="post-item">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('thumbnail'); ?>
                                        </a>
                                    <?php endif; ?>
                                    <div class="post-info">
                                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <span class="post-date"><?php echo get_the_date(); ?></span>
                                        <span class="post-status"><?php echo get_post_status(); ?></span>
                                    </div>
                                    <div class="post-actions">
                                        <a href="<?php echo get_edit_post_link(); ?>"><?php esc_html_e('Edit', 'godmaincode'); ?></a>
                                    </div>
                                </article>
                            <?php endwhile; ?>
                        </div>
                        <?php
                        wp_reset_postdata();
                    else :
                        ?>
                        <div class="empty-state">
                            <p><?php esc_html_e('You have no posts yet.', 'godmaincode'); ?></p>
                        </div>
                        <?php
                    endif;
                    ?>
                </div>
                
                <div class="tab-content" id="comments-tab">
                    <?php
                    $user_comments = get_comments(array(
                        'user_id' => $current_user->ID,
                        'number' => 10,
                        'status' => 'approve',
                    ));
                    
                    if (!empty($user_comments)) :
                        ?>
                        <div class="comments-list">
                            <?php foreach ($user_comments as $comment) : ?>
                                <article class="comment-item">
                                    <p><?php echo esc_html($comment->comment_content); ?></p>
                                    <span class="comment-post">
                                        <?php esc_html_e('On', 'godmaincode'); ?> <a href="<?php echo get_permalink($comment->comment_post_ID); ?>"><?php echo get_the_title($comment->comment_post_ID); ?></a>
                                    </span>
                                    <span class="comment-date"><?php echo mysql2date(get_option('date_format'), $comment->comment_date); ?></span>
                                </article>
                            <?php endforeach; ?>
                        </div>
                        <?php
                    else :
                        ?>
                        <div class="empty-state">
                            <p><?php esc_html_e('You have no comments yet.', 'godmaincode'); ?></p>
                        </div>
                        <?php
                    endif;
                    ?>
                </div>
                
                <div class="tab-content" id="favorites-tab">
                    <div class="empty-state">
                        <p><?php esc_html_e('Favorites feature coming soon.', 'godmaincode'); ?></p>
                    </div>
                </div>
                
                <div class="tab-content" id="orders-tab">
                    <div class="empty-state">
                        <p><?php esc_html_e('Orders feature coming soon.', 'godmaincode'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>