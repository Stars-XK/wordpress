<?php get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <header class="category-header">
            <?php
            $category = get_queried_object();
            ?>
            <h1 class="category-title"><?php echo single_cat_title( '', false ); ?></h1>
            <?php if ( ! empty( $category->description ) ) : ?>
                <p class="category-description"><?php echo $category->description; ?></p>
            <?php endif; ?>
        </header>

        <div class="articles-grid">
            <?php
            if ( have_posts() ) :

                while ( have_posts() ) :
                    the_post();

                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'article-card' ); ?>>
                        <div class="article-content">
                            <div class="article-header">
                                <?php the_category( '' ); ?>
                                <span class="article-date"><?php the_date( 'Y年m月d日' ); ?></span>
                            </div>

                            <h3 class="article-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>

                            <p class="article-excerpt"><?php the_excerpt(); ?></p>

                            <div class="article-footer">
                                <div class="article-author">
                                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 28 ); ?>
                                    <span><?php the_author(); ?></span>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="read-more">阅读全文</a>
                            </div>
                        </div>
                    </article>
                    <?php

                endwhile;

                the_posts_navigation();

            else :

                ?>
                <div class="links-empty">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                    </svg>
                    <p>该分类下暂无文章</p>
                </div>
                <?php

            endif;
            ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
