<?php
/*
Template Name: Gallery Page
*/

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title"><?php the_title(); ?></h1>
            <p class="page-description"><?php echo get_post_meta(get_the_ID(), 'gallery_description', true); ?></p>
        </header>
        
        <div class="gallery-filters">
            <button class="filter-btn active" data-filter="all">
                <?php esc_html_e('All', 'godmaincode'); ?>
            </button>
            <?php
            $categories = get_terms(array(
                'taxonomy' => 'category',
                'hide_empty' => true,
            ));
            if (!empty($categories)) :
                foreach ($categories as $category) :
                    ?>
                    <button class="filter-btn" data-filter="<?php echo esc_attr($category->slug); ?>">
                        <?php echo esc_html($category->name); ?>
                    </button>
                    <?php
                endforeach;
            endif;
            ?>
        </div>
        
        <div class="gallery-grid">
            <?php
            $gallery_args = array(
                'post_type' => 'post',
                'posts_per_page' => -1,
                'order' => 'DESC',
                'orderby' => 'date',
                'meta_query' => array(
                    array(
                        'key' => '_thumbnail_id',
                        'compare' => 'EXISTS',
                    ),
                ),
            );
            $gallery_query = new WP_Query($gallery_args);
            
            if ($gallery_query->have_posts()) :
                while ($gallery_query->have_posts()) : $gallery_query->the_post();
                    $categories = get_the_category();
                    $category_slugs = array();
                    if (!empty($categories)) {
                        foreach ($categories as $category) {
                            $category_slugs[] = $category->slug;
                        }
                    }
                    ?>
                    <article class="gallery-item" data-categories="<?php echo esc_attr(implode(' ', $category_slugs)); ?>">
                        <div class="gallery-image-wrapper">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('large', array('class' => 'gallery-image')); ?>
                            </a>
                            <div class="gallery-overlay">
                                <h3 class="gallery-title"><?php the_title(); ?></h3>
                                <span class="gallery-category">
                                    <?php
                                    if (!empty($categories)) {
                                        echo esc_html($categories[0]->name);
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <div class="empty-state">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                        <circle cx="8.5" cy="8.5" r="1.5"></circle>
                        <polyline points="21 15 16 10 5 21"></polyline>
                    </svg>
                    <p><?php esc_html_e('No gallery images found.', 'godmaincode'); ?></p>
                </div>
                <?php
            endif;
            ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>