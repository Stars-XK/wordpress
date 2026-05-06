<?php get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <?php
        while (have_posts()) :
            the_post();
            ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class('page-article'); ?>>
                <header class="page-header">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                </header>
                
                <?php if (has_post_thumbnail()) : ?>
                    <div class="page-featured-image">
                        <?php the_post_thumbnail('large', array('class' => 'featured-image')); ?>
                    </div>
                <?php endif; ?>
                
                <div class="page-content">
                    <?php the_content(); ?>
                </div>
                
                <?php
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'godmaincode'),
                    'after'  => '</div>',
                ));
                ?>
            </article>
            
            <?php
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            
        endwhile;
        ?>
    </div>
</main>

<?php get_footer(); ?>