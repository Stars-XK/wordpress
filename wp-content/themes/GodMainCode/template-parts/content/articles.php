<section class="articles-section section">
    <div class="container">
        <h2 class="section-title"><?php esc_html_e('Latest Articles', 'godmaincode'); ?></h2>
        
        <div class="grid grid-3">
            <?php
            $args = array(
                'posts_per_page' => 6,
                'post_status' => 'publish',
            );
            
            $query = new WP_Query($args);
            
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('card article-card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="article-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium', array('class' => 'article-image')); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="article-content">
                            <div class="article-meta">
                                <?php the_category(', '); ?>
                                <span class="article-date"><?php the_date(); ?></span>
                            </div>
                            
                            <h3 class="article-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            
                            <p class="article-excerpt"><?php the_excerpt(); ?></p>
                            
                            <div class="article-author">
                                <span class="author-avatar">
                                    <?php echo get_avatar(get_the_author_meta('ID'), 32); ?>
                                </span>
                                <span class="author-name"><?php the_author(); ?></span>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" class="read-more">
                                <?php esc_html_e('Read More', 'godmaincode'); ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m9 18 6-6-6-6"></path>
                                </svg>
                            </a>
                        </div>
                    </article>
                    <?php
                }
                wp_reset_postdata();
            } else {
                ?>
                <div class="no-posts">
                    <p><?php esc_html_e('No articles found.', 'godmaincode'); ?></p>
                </div>
                <?php
            }
            ?>
        </div>
        
        <div class="view-more">
            <a href="<?php echo esc_url(get_post_type_archive_link('post')); ?>" class="btn btn-outline">
                <?php esc_html_e('View All Articles', 'godmaincode'); ?>
            </a>
        </div>
    </div>
</section>