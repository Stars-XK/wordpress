<?php get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <div class="error-404">
            <div class="error-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="15" x2="9" y1="9" y2="15"></line>
                    <line x1="9" x2="15" y1="9" y2="15"></line>
                </svg>
            </div>
            <h1 class="error-title">404</h1>
            <p class="error-description">页面未找到</p>
            <p class="error-message">很抱歉，您访问的页面不存在或已被删除。</p>
            <div class="error-actions">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">返回首页</a>
                <a href="#" class="btn btn-secondary" onclick="history.back()">返回上一页</a>
            </div>
            <div class="search-suggestion">
                <p>或者搜索您需要的内容：</p>
                <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <input type="search" class="search-field" placeholder="搜索..." value="" name="s">
                    <button type="submit" class="search-submit">搜索</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
