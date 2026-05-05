<?php get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <?php
        while ( have_posts() ) :
            the_post();

            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="article-header">
                    <div class="article-meta">
                        <?php the_category( ', ' ); ?>
                        <span class="article-date"><?php the_date( 'Y年m月d日' ); ?></span>
                    </div>
                    <h1 class="article-title"><?php the_title(); ?></h1>
                    <div class="article-author">
                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 48 ); ?>
                        <div class="author-info">
                            <span class="author-name"><?php the_author(); ?></span>
                            <span class="author-description"><?php the_author_meta( 'description' ); ?></span>
                        </div>
                    </div>
                </header>

                <div class="article-content">
                    <?php the_content(); ?>
                </div>

                <footer class="article-footer">
                    <div class="article-tags">
                        <?php the_tags( '<span class="tag-label">标签：</span>', '', '' ); ?>
                    </div>
                    <div class="article-share">
                        <span class="share-label">分享：</span>
                        <div class="share-links">
                            <a href="#" class="share-link" title="分享到微信">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M8.691 2.188c-3.738 0-6.774 3.035-6.774 6.774 0 3.537 2.746 6.413 6.274 6.764-.063-.447-.063-.918-.063-1.441 0-3.249 2.638-5.884 5.889-5.884 3.251 0 5.891 2.635 5.891 5.884 0 3.248-2.64 5.884-5.891 5.884-1.614 0-3.014-.523-4.187-1.426-.154-.116-.184-.2-.184-.316 0-.066.014-.184.014-.28 0-.063-.014-.125-.014-.172 0-.062.041-.123.041-.213 0-.066-.041-.123-.041-.213 0-.07.027-.14.041-.192.082-.373.246-.633.492-.887.246-.254.582-.485.969-.607.246-.08.385-.247.385-.47 0-.123-.082-.247-.164-.37-.246-.373-.369-.804-.369-1.29 0-1.002.82-1.846 1.846-1.846.697 0 1.321.285 1.774.738.287-.396.861-.656 1.477-.656 1.106 0 2.002.896 2.002 2.002 0 1.106-.896 2.002-2.002 2.002-.738 0-1.372-.37-1.703-.895-.287.246-.697.402-1.127.402-.99 0-1.795-.804-1.795-1.795 0-.99.805-1.795 1.795-1.795.697 0 1.288.37 1.64.896.328-.246.697-.396 1.127-.396 1.29 0 2.338 1.049 2.338 2.339 0 1.29-1.048 2.338-2.338 2.338-.697 0-1.321-.285-1.774-.738-.287.396-.861.656-1.477.656-.41 0-.697-.103-.861-.205-.082.014-.164.014-.246.014-1.395 0-2.531-1.133-2.531-2.531 0-1.395 1.136-2.531 2.531-2.531 1.395 0 2.531 1.136 2.531 2.531 0 .801-.37 1.52-.945 1.998.205.066.41.117.615.117 1.395 0 2.531 1.136 2.531 2.531 0 1.395-1.136 2.531-2.531 2.531-.82 0-1.549-.395-2.002-1.002-.123.205-.41.344-.697.344-1.066 0-1.933-.867-1.933-1.933 0-.285.063-.562.172-.82-.328-.087-.656-.253-.902-.492-.41.192-.881.295-1.372.295z"/>
                                </svg>
                            </a>
                            <a href="#" class="share-link" title="分享到微博">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M10.098 20c-4.612 0-8.363-2.666-8.363-5.96 0-1.89 1.126-3.755 2.96-4.778 1.015-.566 2.127-1.023 2.98-1.261-.18-1.02-.18-1.62-.18-1.62 0-1.566 1.226-2.38 2.58-2.38 1.62 0 3.061 1.17 3.27 2.762.35-.17.71-.26 1.06-.26 1.35 0 2.56 1.01 2.56 2.59 0 1.71-.71 2.87-1.71 2.87-.53 0-.98-.17-1.19-.44-.08.56-.35 1.61-.44 2.07-.88-.34-1.83-.55-2.8-.61.08.53.12 1.06.12 1.56 0 3.294-3.685 5.96-8.246 5.96z"/>
                                    <ellipse cx="17.5" cy="5" rx="2.5" ry="2"/>
                                    <path d="M20 12.5c-.5 2-2 3.5-4 3.5-.5 0-1-.5-1-1 0-.5.5-1 1-1 1.5 0 2.5-1 2.5-2 0-1-.5-2-1.5-3-.5 0-1-.5-1-1 0-.5.5-1 1-1 2 0 4 2.5 4 5.5z"/>
                                </svg>
                            </a>
                            <a href="#" class="share-link" title="分享到QQ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C6.477 2 2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.879V14.89h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.989C18.343 21.129 22 16.99 22 12c0-5.523-4.477-10-10-10z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </footer>

                <nav class="article-navigation">
                    <div class="nav-previous">
                        <?php previous_post_link( '%link', '<span class="nav-label">上一篇</span><span class="nav-title">%title</span>' ); ?>
                    </div>
                    <div class="nav-next">
                        <?php next_post_link( '%link', '<span class="nav-label">下一篇</span><span class="nav-title">%title</span>' ); ?>
                    </div>
                </nav>

                <?php
                // If comments are open or we have at least one comment, load the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
                ?>

            </article>
            <?php

        endwhile; // End of the loop.
        ?>
    </div>
</main>

<?php get_footer(); ?>
