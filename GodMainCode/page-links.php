<?php
/*
Template Name: Links Page
*/

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title"><?php the_title(); ?></h1>
            <p class="page-description"><?php echo get_post_meta(get_the_ID(), 'links_description', true); ?></p>
        </header>
        
        <?php
        $categories = get_terms(array(
            'taxonomy' => 'link_category',
            'hide_empty' => false,
        ));
        
        if (!empty($categories)) :
            foreach ($categories as $category) :
                $links_args = array(
                    'post_type' => 'link',
                    'posts_per_page' => -1,
                    'order' => 'ASC',
                    'orderby' => 'title',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'link_category',
                            'field' => 'slug',
                            'terms' => $category->slug,
                        ),
                    ),
                );
                $links_query = new WP_Query($links_args);
                
                if ($links_query->have_posts()) :
                    ?>
                    <section class="link-category">
                        <h2 class="category-title">
                            <span class="category-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                                    <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                                </svg>
                            </span>
                            <?php echo esc_html($category->name); ?>
                        </h2>
                        
                        <div class="links-grid">
                            <?php
                            while ($links_query->have_posts()) : $links_query->the_post();
                                $link_url = get_post_meta(get_the_ID(), 'link_url', true);
                                $link_favicon = get_post_meta(get_the_ID(), 'link_favicon', true);
                                ?>
                                <article class="link-card card">
                                    <a href="<?php echo esc_url($link_url); ?>" target="_blank" rel="noopener noreferrer">
                                        <div class="link-icon">
                                            <?php if ($link_favicon) : ?>
                                                <img src="<?php echo esc_url($link_favicon); ?>" alt="<?php esc_attr_e('Favicon', 'godmaincode'); ?>">
                                            <?php else : ?>
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                                    <line x1="3" y1="9" x2="21" y2="9"></line>
                                                    <line x1="9" y1="21" x2="9" y2="9"></line>
                                                </svg>
                                            <?php endif; ?>
                                        </div>
                                        <div class="link-info">
                                            <h3 class="link-title"><?php the_title(); ?></h3>
                                            <p class="link-description"><?php the_excerpt(); ?></p>
                                        </div>
                                    </a>
                                </article>
                                <?php
                            endwhile;
                            ?>
                        </div>
                    </section>
                    <?php
                    wp_reset_postdata();
                endif;
            endforeach;
        else :
            $all_links_args = array(
                'post_type' => 'link',
                'posts_per_page' => -1,
                'order' => 'ASC',
                'orderby' => 'title',
            );
            $all_links_query = new WP_Query($all_links_args);
            
            if ($all_links_query->have_posts()) :
                ?>
                <div class="links-grid">
                    <?php
                    while ($all_links_query->have_posts()) : $all_links_query->the_post();
                        $link_url = get_post_meta(get_the_ID(), 'link_url', true);
                        $link_favicon = get_post_meta(get_the_ID(), 'link_favicon', true);
                        ?>
                        <article class="link-card card">
                            <a href="<?php echo esc_url($link_url); ?>" target="_blank" rel="noopener noreferrer">
                                <div class="link-icon">
                                    <?php if ($link_favicon) : ?>
                                        <img src="<?php echo esc_url($link_favicon); ?>" alt="<?php esc_attr_e('Favicon', 'godmaincode'); ?>">
                                    <?php else : ?>
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                            <line x1="3" y1="9" x2="21" y2="9"></line>
                                            <line x1="9" y1="21" x2="9" y2="9"></line>
                                        </svg>
                                    <?php endif; ?>
                                </div>
                                <div class="link-info">
                                    <h3 class="link-title"><?php the_title(); ?></h3>
                                    <p class="link-description"><?php the_excerpt(); ?></p>
                                </div>
                            </a>
                        </article>
                        <?php
                    endwhile;
                    ?>
                </div>
                <?php
                wp_reset_postdata();
            else :
                ?>
                <div class="empty-state">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                        <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                    </svg>
                    <p><?php esc_html_e('No links found. Please add some links in the admin.', 'godmaincode'); ?></p>
                </div>
                <?php
            endif;
        endif;
        ?>
    </div>
</main>

<?php get_footer(); ?>