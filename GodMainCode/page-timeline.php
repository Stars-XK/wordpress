<?php
/*
Template Name: Timeline Page
*/

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title"><?php the_title(); ?></h1>
            <p class="page-description"><?php echo get_post_meta(get_the_ID(), 'timeline_description', true); ?></p>
        </header>
        
        <div class="timeline-container">
            <?php
            $timeline_args = array(
                'post_type' => array('post', 'timeline_event'),
                'posts_per_page' => -1,
                'order' => 'DESC',
                'orderby' => 'date',
            );
            $timeline_query = new WP_Query($timeline_args);
            
            if ($timeline_query->have_posts()) :
                $current_year = '';
                while ($timeline_query->have_posts()) : $timeline_query->the_post();
                    $post_year = get_the_date('Y');
                    
                    if ($post_year != $current_year) :
                        $current_year = $post_year;
                        ?>
                        <div class="timeline-year">
                            <span class="year-label"><?php echo esc_html($post_year); ?></span>
                            <div class="year-line"></div>
                        </div>
                        <?php
                    endif;
                    ?>
                    
                    <div class="timeline-item">
                        <div class="timeline-node">
                            <div class="node-dot" data-type="<?php echo get_post_type(); ?>"></div>
                            <div class="node-line"></div>
                        </div>
                        
                        <article id="timeline-post-<?php the_ID(); ?>" class="timeline-content card">
                            <div class="timeline-header">
                                <span class="timeline-type">
                                    <?php
                                    if (get_post_type() == 'post') {
                                        esc_html_e('Article', 'godmaincode');
                                    } else {
                                        esc_html_e('Event', 'godmaincode');
                                    }
                                    ?>
                                </span>
                                <span class="timeline-date"><?php echo get_the_date('M j, Y'); ?></span>
                            </div>
                            
                            <h3 class="timeline-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="timeline-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <p class="timeline-excerpt">
                                <?php the_excerpt(); ?>
                            </p>
                            
                            <div class="timeline-footer">
                                <a href="<?php the_permalink(); ?>" class="read-more">
                                    <?php esc_html_e('Read More', 'godmaincode'); ?>
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <div class="timeline-empty">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                    <p><?php esc_html_e('No timeline events found.', 'godmaincode'); ?></p>
                </div>
                <?php
            endif;
            ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>