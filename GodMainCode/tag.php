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
                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                </svg>
                <p><?php esc_html_e('No posts found with this tag.', 'godmaincode'); ?></p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>