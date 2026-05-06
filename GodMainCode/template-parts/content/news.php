<div class="news-container">
    <?php
    $news_args = array(
        'post_type' => 'post',
        'posts_per_page' => 1,
        'category_name' => 'news',
        'order' => 'DESC',
        'orderby' => 'date',
    );
    $news_query = new WP_Query($news_args);
    
    if ($news_query->have_posts()) :
        while ($news_query->have_posts()) : $news_query->the_post();
            ?>
            <article id="news-featured" class="news-featured">
                <div class="news-featured-image">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('large', array('class' => 'news-featured-thumb')); ?>
                        </a>
                    <?php else : ?>
                        <div class="news-placeholder">
                            <svg class="placeholder-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21 15 16 10 5 21"></polyline>
                            </svg>
                        </div>
                    <?php endif; ?>
                    <div class="news-featured-overlay"></div>
                </div>
                <div class="news-featured-content">
                    <div class="news-featured-category">
                        <?php
                        $categories = get_the_category();
                        if (!empty($categories)) {
                            echo '<span class="category-tag">' . esc_html($categories[0]->name) . '</span>';
                        }
                        ?>
                    </div>
                    <h2 class="news-featured-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <p class="news-featured-excerpt">
                        <?php the_excerpt(); ?>
                    </p>
                    <div class="news-featured-meta">
                        <span class="news-author"><?php the_author(); ?></span>
                        <span class="news-date"><?php echo get_the_date(); ?></span>
                    </div>
                </div>
            </article>
            <?php
        endwhile;
        wp_reset_postdata();
    endif;
    ?>

    <div class="news-list">
        <?php
        $news_list_args = array(
            'post_type' => 'post',
            'posts_per_page' => 5,
            'category_name' => 'news',
            'order' => 'DESC',
            'orderby' => 'date',
            'offset' => 1,
        );
        $news_list_query = new WP_Query($news_list_args);
        
        if ($news_list_query->have_posts()) :
            while ($news_list_query->have_posts()) : $news_list_query->the_post();
                ?>
                <article id="news-item-<?php the_ID(); ?>" class="news-item">
                    <div class="news-item-image">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('thumbnail', array('class' => 'news-item-thumb')); ?>
                            </a>
                        <?php else : ?>
                            <div class="news-item-placeholder">
                                <svg class="placeholder-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                    <polyline points="21 15 16 10 5 21"></polyline>
                                </svg>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="news-item-content">
                        <h3 class="news-item-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <span class="news-item-date"><?php echo get_the_date(); ?></span>
                    </div>
                </article>
                <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
</div>