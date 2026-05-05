<?php get_header(); ?>

<main id="primary" class="site-main">

    <section class="links-section section">
        <div class="container">
            <h2 class="section-title"><?php echo get_theme_mod('godmaincode_links_title', '网址导航'); ?></h2>
            
            <?php 
            $links_by_category = godmaincode_get_links_by_category();
            
            if (!empty($links_by_category)) {
            ?>
            <div class="links-grid">
                <?php foreach ($links_by_category as $category) : ?>
                <div class="link-category">
                    <h3><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg> <?php echo esc_html($category['name']); ?></h3>
                    <div class="link-items">
                        <?php foreach ($category['links'] as $link) : 
                            $url = get_post_meta($link->ID, 'godmaincode_link_url', true);
                            $icon = get_post_meta($link->ID, 'godmaincode_link_icon', true);
                            ?>
                            <a href="<?php echo esc_url($url); ?>" target="_blank" class="link-item">
                                <span class="link-icon"><?php echo !empty($icon) ? esc_html($icon) : substr(get_the_title($link->ID), 0, 2); ?></span>
                                <span class="link-name"><?php echo get_the_title($link->ID); ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php } else { ?>
            <div class="links-empty">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                    <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                </svg>
                <p>暂无导航链接，请在后台添加</p>
                <a href="<?php echo admin_url('post-new.php?post_type=godmaincode_link'); ?>" class="btn btn-primary">添加链接</a>
            </div>
            <?php } ?>
        </div>
    </section>

    <section class="news-section section">
        <div class="container">
            <h2 class="section-title"><?php echo get_theme_mod('godmaincode_news_title', '最新新闻'); ?></h2>
            
            <div class="news-grid">
                <?php
                $news_args = array(
                    'category_name' => 'news',
                    'posts_per_page' => 4,
                    'post_status' => 'publish',
                );
                
                $news_query = new WP_Query($news_args);
                
                if ($news_query->have_posts()) {
                    $index = 0;
                    while ($news_query->have_posts()) {
                        $news_query->the_post();
                        if ($index === 0) {
                        ?>
                        <article class="news-card news-featured">
                            <div class="news-card-content">
                                <div class="news-tags">
                                    <span class="news-tag">置顶</span>
                                    <?php the_category(''); ?>
                                </div>
                                <h3 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p class="news-excerpt"><?php the_excerpt(); ?></p>
                                <div class="news-meta">
                                    <span class="news-date"><?php the_date('Y年m月d日'); ?></span>
                                    <span class="news-author"><?php the_author(); ?></span>
                                </div>
                            </div>
                        </article>
                        <?php
                        } else {
                        ?>
                        <article class="news-card news-normal">
                            <div class="news-card-content">
                                <h3 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p class="news-excerpt"><?php the_excerpt(); ?></p>
                                <div class="news-meta">
                                    <span class="news-date"><?php the_date('m月d日'); ?></span>
                                </div>
                            </div>
                        </article>
                        <?php
                        }
                        $index++;
                    }
                    wp_reset_postdata();
                } else {
                    ?>
                    <div class="no-news">
                        <p>暂无新闻内容</p>
                    </div>
                    <?php
                }
                ?>
            </div>
            
            <div class="view-more">
                <a href="<?php echo esc_url(get_category_link(get_cat_ID('news'))); ?>" class="btn btn-outline">查看更多新闻</a>
            </div>
        </div>
    </section>

    <section class="articles-section section">
        <div class="container">
            <h2 class="section-title"><?php echo get_theme_mod('godmaincode_articles_title', '最新文章'); ?></h2>
            
            <div class="articles-grid">
                <?php
                $args = array(
                    'posts_per_page' => 6,
                    'post_status' => 'publish',
                    'category__not_in' => array(get_cat_ID('news')),
                );
                
                $query = new WP_Query($args);
                
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('article-card'); ?>>
                            <div class="article-content">
                                <div class="article-header">
                                    <?php the_category(''); ?>
                                    <span class="article-date"><?php the_date('Y年m月d日'); ?></span>
                                </div>
                                
                                <h3 class="article-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                
                                <p class="article-excerpt"><?php the_excerpt(); ?></p>
                                
                                <div class="article-footer">
                                    <div class="article-author">
                                        <?php echo get_avatar(get_the_author_meta('ID'), 28); ?>
                                        <span><?php the_author(); ?></span>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="read-more">阅读全文</a>
                                </div>
                            </div>
                        </article>
                        <?php
                    }
                    wp_reset_postdata();
                } else {
                    ?>
                    <div class="no-posts">
                        <p>暂无文章内容</p>
                    </div>
                    <?php
                }
                ?>
            </div>
            
            <div class="view-more">
                <a href="<?php echo esc_url(get_post_type_archive_link('post')); ?>" class="btn btn-outline">查看全部文章</a>
            </div>
        </div>
    </section>

</main>

<div class="music-drawer">
    <button class="drawer-toggle" id="drawer-toggle">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
            <path d="M15.54 8.46a5 5 0 0 1 0 7.07"></path>
            <path d="M19.07 4.93a10 10 0 0 1 0 14.14"></path>
        </svg>
        <span class="drawer-badge">3</span>
    </button>
    
    <div class="drawer-content" id="drawer-content">
        <div class="drawer-header">
            <h3 class="drawer-title">音乐播放器</h3>
            <button class="drawer-close" id="drawer-close">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" x2="6" y1="6" y2="18"></line>
                    <line x1="6" x2="18" y1="6" y2="18"></line>
                </svg>
            </button>
        </div>
        
        <div class="drawer-player">
            <div class="mini-track-info">
                <div class="mini-album-art">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
                        <path d="M15.54 8.46a5 5 0 0 1 0 7.07"></path>
                        <path d="M19.07 4.93a10 10 0 0 1 0 14.14"></path>
                    </svg>
                </div>
                <div class="mini-info">
                    <h4 class="mini-track-title">选择一首歌曲</h4>
                    <p class="mini-track-artist">艺术家名称</p>
                </div>
            </div>
            
            <div class="mini-progress">
                <div class="mini-progress-bar">
                    <div class="mini-progress-fill" id="mini-progress-fill"></div>
                </div>
                <span class="mini-time">0:00 / 3:45</span>
            </div>
            
            <div class="mini-controls">
                <button class="mini-control-btn" id="mini-prev-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="19 20 9 12 19 4 19 20"></polygon>
                        <polygon points="5 20 15 12 5 4 5 20"></polygon>
                    </svg>
                </button>
                <button class="mini-control-btn mini-play-btn" id="mini-play-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="5 3 19 12 5 21 5 3"></polygon>
                    </svg>
                </button>
                <button class="mini-control-btn" id="mini-next-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="5 4 15 12 5 20 5 4"></polygon>
                        <polygon points="19 4 9 12 19 20 19 4"></polygon>
                    </svg>
                </button>
            </div>
            
            <div class="drawer-playlist">
                <h4>播放列表</h4>
                <ul class="drawer-track-list">
                    <li class="drawer-track-item active">
                        <span class="drawer-track-number">1</span>
                        <span class="drawer-track-name">示例歌曲 1</span>
                        <span class="drawer-track-duration">3:45</span>
                    </li>
                    <li class="drawer-track-item">
                        <span class="drawer-track-number">2</span>
                        <span class="drawer-track-name">示例歌曲 2</span>
                        <span class="drawer-track-duration">4:20</span>
                    </li>
                    <li class="drawer-track-item">
                        <span class="drawer-track-number">3</span>
                        <span class="drawer-track-name">示例歌曲 3</span>
                        <span class="drawer-track-duration">3:58</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
