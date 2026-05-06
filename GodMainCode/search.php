<?php get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <header class="search-header">
            <h1 class="search-title">
                <?php esc_html_e('Search Results for:', 'godmaincode'); ?>
                <span class="search-term"><?php echo get_search_query(); ?></span>
            </h1>
            <p class="search-count">
                <?php
                printf(esc_html(_n('Found %d result', 'Found %d results', $wp_query->found_posts, 'godmaincode')), $wp_query->found_posts);
                ?>
            </p>
        </header>
        
        <?php if (have_posts()) : ?>
            <div class="search-results">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('search-result card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="result-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('thumbnail'); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        <div class="result-content">
                            <div class="result-meta">
                                <?php
                                $categories = get_the_category();
                                if (!empty($categories)) {
                                    echo '<span class="category-tag"><a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a></span>';
                                }
                                ?>
                                <span class="result-date"><?php echo get_the_date(); ?></span>
                            </div>
                            <h3 class="result-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="result-excerpt">
                                <?php the_excerpt(); ?>
                            </p>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <?php if ($wp_query->max_num_pages > 1) : ?>
                <div class="pagination">
                    <?php godmaincode_pagination(); ?>
                </div>
            <?php endif; ?>
        <?php else : ?>
            <div class="no-results">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.35-4.35"></path>
                </svg>
                <h3><?php esc_html_e('No results found', 'godmaincode'); ?></h3>
                <p><?php esc_html_e('Try a different search term or browse our categories.', 'godmaincode'); ?></p>
                <div class="search-again">
                    <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                        <input type="search" name="s" placeholder="<?php esc_attr_e('Search again...', 'godmaincode'); ?>">
                        <button type="submit" class="btn btn-primary">
                            <?php esc_html_e('Search', 'godmaincode'); ?>
                        </button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>