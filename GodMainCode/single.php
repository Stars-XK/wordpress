<?php get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <?php
        while (have_posts()) :
            the_post();
            godmaincode_set_post_views();
            ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class('single-article'); ?>>
                <header class="article-header">
                    <div class="article-meta-top">
                        <?php
                        $categories = get_the_category();
                        if (!empty($categories)) {
                            echo '<span class="category-tag"><a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a></span>';
                        }
                        ?>
                        <span class="post-date"><?php echo get_the_date(); ?></span>
                    </div>
                    
                    <h1 class="article-title"><?php the_title(); ?></h1>
                    
                    <div class="article-author">
                        <img src="<?php echo get_avatar_url(get_the_author_meta('ID'), array('size' => 64)); ?>" alt="<?php esc_attr_e('Author Avatar', 'godmaincode'); ?>" class="author-avatar-lg">
                        <div class="author-info">
                            <span class="author-name"><?php the_author(); ?></span>
                            <span class="author-bio"><?php echo get_the_author_meta('description'); ?></span>
                        </div>
                    </div>
                    
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="article-featured-image">
                            <?php the_post_thumbnail('large', array('class' => 'featured-image')); ?>
                        </div>
                    <?php endif; ?>
                </header>
                
                <div class="article-content-wrapper">
                    <div class="article-main-content">
                        <div class="article-content">
                            <?php the_content(); ?>
                        </div>
                        
                        <div class="article-tags">
                            <?php
                            the_tags('<span class="tags-label">' . esc_html__('Tags:', 'godmaincode') . '</span>', '', '');
                            ?>
                        </div>
                        
                        <div class="article-actions">
                            <button class="action-btn like-btn">
                                <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                                </svg>
                                <span class="action-count"><?php echo get_post_meta(get_the_ID(), 'godmaincode_likes', true) ?: 0; ?></span>
                            </button>
                            <button class="action-btn share-btn">
                                <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
                                </svg>
                                <span class="action-label"><?php esc_html_e('Share', 'godmaincode'); ?></span>
                            </button>
                        </div>
                    </div>
                    
                    <aside class="article-sidebar">
                        <div class="sidebar-section">
                            <h3 class="sidebar-title"><?php esc_html_e('Related Posts', 'godmaincode'); ?></h3>
                            <?php
                            $related_args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 3,
                                'order' => 'DESC',
                                'orderby' => 'rand',
                                'post__not_in' => array(get_the_ID()),
                                'category__in' => wp_get_post_categories(get_the_ID()),
                            );
                            $related_query = new WP_Query($related_args);
                            
                            if ($related_query->have_posts()) :
                                ?>
                                <ul class="related-posts">
                                    <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                                        <li class="related-post">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <?php the_post_thumbnail('thumbnail', array('class' => 'related-thumb')); ?>
                                                <?php endif; ?>
                                                <span class="related-title"><?php the_title(); ?></span>
                                            </a>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                                <?php
                                wp_reset_postdata();
                            else :
                                echo '<p>' . esc_html__('No related posts found.', 'godmaincode') . '</p>';
                            endif;
                            ?>
                        </div>
                        
                        <div class="sidebar-section">
                            <h3 class="sidebar-title"><?php esc_html_e('Author Info', 'godmaincode'); ?></h3>
                            <div class="author-card">
                                <img src="<?php echo get_avatar_url(get_the_author_meta('ID'), array('size' => 80)); ?>" alt="<?php esc_attr_e('Author Avatar', 'godmaincode'); ?>" class="author-avatar-card">
                                <h4 class="author-name-card"><?php the_author(); ?></h4>
                                <p class="author-bio-card"><?php echo get_the_author_meta('description'); ?></p>
                                <div class="author-stats">
                                    <span class="stat-item"><?php echo count_user_posts(get_the_author_meta('ID')); ?> <?php esc_html_e('posts', 'godmaincode'); ?></span>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
                
                <div class="article-comments">
                    <?php
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
                </div>
            </article>
            
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>