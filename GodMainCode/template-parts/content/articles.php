<article id="post-<?php the_ID(); ?>" <?php post_class('article-card'); ?>>
    <div class="article-image">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('medium', array('class' => 'article-thumb')); ?>
            </a>
        <?php else : ?>
            <div class="article-placeholder">
                <svg class="placeholder-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                    <polyline points="21 15 16 10 5 21"></polyline>
                </svg>
            </div>
        <?php endif; ?>
        <div class="article-category">
            <?php
            $categories = get_the_category();
            if (!empty($categories)) {
                echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '" class="category-link">' . esc_html($categories[0]->name) . '</a>';
            }
            ?>
        </div>
    </div>
    
    <div class="article-content">
        <h3 class="article-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>
        
        <p class="article-excerpt">
            <?php the_excerpt(); ?>
        </p>
        
        <div class="article-meta">
            <div class="author-info">
                <img src="<?php echo get_avatar_url(get_the_author_meta('ID'), array('size' => 32)); ?>" alt="<?php esc_attr_e('Author Avatar', 'godmaincode'); ?>" class="author-avatar">
                <span class="author-name"><?php the_author(); ?></span>
            </div>
            <span class="article-date"><?php echo get_the_date(); ?></span>
        </div>
        
        <div class="article-stats">
            <span class="read-time">
                <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polyline points="12 6 12 12 16 14"></polyline>
                </svg>
                <?php echo godmaincode_reading_time(); ?>
            </span>
            <span class="read-count">
                <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                </svg>
                <?php echo godmaincode_get_post_views(); ?>
            </span>
        </div>
    </div>
</article>