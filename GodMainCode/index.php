<?php get_header(); ?>

<main id="primary" class="site-main">
    <?php get_template_part('template-parts/header/hero'); ?>

    <section class="articles-section">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e('Latest Articles', 'godmaincode'); ?></h2>
            <div class="articles-grid">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 6,
                    'order' => 'DESC',
                    'orderby' => 'date',
                );
                $query = new WP_Query($args);
                
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        get_template_part('template-parts/content/articles');
                    endwhile;
                    wp_reset_postdata();
                else :
                    get_template_part('template-parts/content/content', 'none');
                endif;
                ?>
            </div>
            <div class="view-more">
                <a href="<?php echo esc_url(get_post_type_archive_link('post')); ?>" class="btn btn-primary">
                    <?php esc_html_e('View More', 'godmaincode'); ?>
                </a>
            </div>
        </div>
    </section>

    <section class="news-section">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e('News', 'godmaincode'); ?></h2>
            <?php get_template_part('template-parts/content/news'); ?>
        </div>
    </section>

    <section class="timeline-section">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e('Timeline', 'godmaincode'); ?></h2>
            <?php get_template_part('template-parts/content/timeline'); ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>