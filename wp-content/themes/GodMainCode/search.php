<?php get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <header class="search-header">
            <h1 class="search-title">搜索结果</h1>
            <p class="search-query">您搜索的关键词："<?php echo get_search_query(); ?>"</p>
        </header>

        <?php
        if ( have_posts() ) :
            ?>
            <div class="articles-grid">
                <?php
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
                ?>
            </div>
            <?php

        else :

            ?>
            <div class="links-empty">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.35-4.35"></path>
                </svg>
                <p>没有找到与 "<?php echo get_search_query(); ?>" 相关的内容</p>
                <div class="search-again">
                    <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <input type="search" class="search-field" placeholder="尝试其他关键词..." value="" name="s">
                        <button type="submit" class="search-submit">搜索</button>
                    </form>
                </div>
            </div>
            <?php

        endif;
        ?>
    </div>
</main>

<?php get_footer(); ?>
