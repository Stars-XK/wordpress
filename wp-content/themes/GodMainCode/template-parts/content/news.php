<section class="news-section section">
    <div class="container">
        <h2 class="section-title"><?php esc_html_e('Latest News', 'godmaincode'); ?></h2>
        
        <div class="news-container">
            <div class="news-main">
                <?php
                $news_args = array(
                    'category_name' => 'news',
                    'posts_per_page' => 1,
                    'post_status' => 'publish',
                );
                
                $news_query = new WP_Query($news_args);
                
                if ($news_query->have_posts()) {
                    while ($news_query->have_posts()) {
                        $news_query->the_post();
                        ?>
                        <article id="news-main-<?php the_ID(); ?>" <?php post_class('card news-main-card'); ?>>
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="news-main-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('large', array('class' => 'news-image')); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div class="news-main-content">
                                <span class="news-tag"><?php esc_html_e('Breaking', 'godmaincode'); ?></span>
                                <h3 class="news-main-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <p class="news-main-excerpt"><?php the_excerpt(); ?></p>
                                <div class="news-meta">
                                    <span class="news-date"><?php the_date(); ?></span>
                                    <span class="news-author"><?php the_author(); ?></span>
                                </div>
                            </div>
                        </article>
                        <?php
                    }
                    wp_reset_postdata();
                }
                ?>
            </div>
            
            <div class="news-sidebar">
                <h3><?php esc_html_e('Latest News', 'godmaincode'); ?></h3>
                <ul class="news-list">
                    <?php
                    $news_list_args = array(
                        'category_name' => 'news',
                        'posts_per_page' => 5,
                        'offset' => 1,
                        'post_status' => 'publish',
                    );
                    
                    $news_list_query = new WP_Query($news_list_args);
                    
                    if ($news_list_query->have_posts()) {
                        while ($news_list_query->have_posts()) {
                            $news_list_query->the_post();
                            ?>
                            <li class="news-item">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>" class="news-item-image">
                                        <?php the_post_thumbnail('thumbnail'); ?>
                                    </a>
                                <?php endif; ?>
                                <div class="news-item-content">
                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <span class="news-item-date"><?php the_date(); ?></span>
                                </div>
                            </li>
                            <?php
                        }
                        wp_reset_postdata();
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</section>