<?php get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <header class="archive-header">
            <?php
            the_archive_title('<h1 class="archive-title">', '</h1>');
            the_archive_description('<p class="archive-description">', '</p>');
            ?>
        </header>
        
        <?php if (have_posts()) : ?>
            <div class="articles-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('template-parts/content/articles'); ?>
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
                    <folder>
                        <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                    </folder>
                </svg>
                <p><?php esc_html_e('No posts found in this category.', 'godmaincode'); ?></p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>