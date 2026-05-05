<?php get_header(); ?>

<main id="primary" class="site-main">

	<section class="hero-carousel section">
		<div class="carousel-container">
			<div class="carousel-wrapper" id="carousel-wrapper">
				<div class="carousel-slide active">
					<div class="slide-content">
						<div class="slide-text">
							<span class="slide-tag">欢迎访问</span>
							<h1 class="slide-title">探索精彩内容</h1>
							<p class="slide-desc">发现最新技术趋势，获取优质资源链接</p>
							<a href="#links" class="btn btn-primary">立即开始</a>
						</div>
						<div class="slide-visual">
							<div class="visual-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
									<circle cx="12" cy="12" r="10"></circle>
									<path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path>
									<path d="M12 2a14.5 14.5 0 0 1 0 20 14.5 14.5 0 0 1 0-20"></path>
									<circle cx="12" cy="12" r="3"></circle>
								</svg>
							</div>
						</div>
					</div>
				</div>

				<div class="carousel-slide">
					<div class="slide-content">
						<div class="slide-text">
							<span class="slide-tag">技术前沿</span>
							<h1 class="slide-title">最新文章更新</h1>
							<p class="slide-desc">关注行业动态，学习最新技术</p>
							<a href="#articles" class="btn btn-primary">阅读更多</a>
						</div>
						<div class="slide-visual">
							<div class="visual-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
									<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
									<polyline points="14 2 14 8 20 8"></polyline>
									<line x1="16" x2="8" y1="13" y2="13"></line>
									<line x1="16" x2="8" y1="17" y2="17"></line>
									<polyline points="10 9 9 9 8 9"></polyline>
								</svg>
							</div>
						</div>
					</div>
				</div>

				<div class="carousel-slide">
					<div class="slide-content">
						<div class="slide-text">
							<span class="slide-tag">精选资源</span>
							<h1 class="slide-title">优质网址导航</h1>
							<p class="slide-desc">汇聚各类优质网站，一键直达</p>
							<a href="#links" class="btn btn-primary">浏览导航</a>
						</div>
						<div class="slide-visual">
							<div class="visual-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
									<path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
									<path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
								</svg>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="carousel-indicators" id="carousel-indicators">
				<button class="indicator active" data-index="0"></button>
				<button class="indicator" data-index="1"></button>
				<button class="indicator" data-index="2"></button>
			</div>

			<button class="carousel-prev" id="carousel-prev">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
					<polygon points="15 18 9 12 15 6 15 18"></polygon>
				</svg>
			</button>
			<button class="carousel-next" id="carousel-next">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
					<polygon points="9 18 15 12 9 6 9 18"></polygon>
				</svg>
			</button>
		</div>
	</section>

	<section class="stats-section section">
		<div class="container">
			<div class="stats-grid">
				<div class="stat-card">
					<div class="stat-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<path d="M18 20V10"></path>
							<path d="M12 20V4"></path>
							<path d="M6 20v-6"></path>
						</svg>
					</div>
					<div class="stat-content">
						<span class="stat-number" data-target="50">0</span>
						<span class="stat-label">优质链接</span>
					</div>
				</div>

				<div class="stat-card">
					<div class="stat-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
							<polyline points="14 2 14 8 20 8"></polyline>
						</svg>
					</div>
					<div class="stat-content">
						<span class="stat-number" data-target="100">0</span>
						<span class="stat-label">文章数量</span>
					</div>
				</div>

				<div class="stat-card">
					<div class="stat-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
							<polyline points="22 4 12 14.01 9 11.01"></polyline>
						</svg>
					</div>
					<div class="stat-content">
						<span class="stat-number" data-target="5000">0</span>
						<span class="stat-label">访问人数</span>
					</div>
				</div>

				<div class="stat-card">
					<div class="stat-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
						</svg>
					</div>
					<div class="stat-content">
						<span class="stat-number" data-target="24">0</span>
						<span class="stat-label">分类导航</span>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="features-section section">
		<div class="container">
			<h2 class="section-title">特色功能</h2>
			<p class="section-subtitle">专为现代化网站设计的强大功能</p>

			<div class="features-grid">
				<div class="feature-card">
					<div class="feature-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<circle cx="12" cy="12" r="10"></circle>
							<circle cx="12" cy="12" r="4"></circle>
							<line x1="4.93" x2="9.17" y1="4.93" y2="9.17"></line>
							<line x1="14.83" x2="19.07" y1="14.83" y2="19.07"></line>
							<line x1="14.83" x2="19.07" y1="9.17" y2="4.93"></line>
							<line x1="14.83" x2="18.36" y1="9.17" y2="5.64"></line>
						</svg>
					</div>
					<h3 class="feature-title">智能搜索</h3>
					<p class="feature-desc">支持快捷键搜索，快速定位所需内容，提升浏览效率</p>
				</div>

				<div class="feature-card">
					<div class="feature-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
							<path d="M15.54 8.46a5 5 0 0 1 0 7.07"></path>
							<path d="M19.07 4.93a10 10 0 0 1 0 14.14"></path>
						</svg>
					</div>
					<h3 class="feature-title">音乐播放器</h3>
					<p class="feature-desc">内置音乐播放器，支持播放列表管理，让浏览更加愉悦</p>
				</div>

				<div class="feature-card">
					<div class="feature-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<path d="M19 17c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 6c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 11.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path>
						</svg>
					</div>
					<h3 class="feature-title">实时天气</h3>
					<p class="feature-desc">顶部导航实时显示天气信息，随时了解天气变化</p>
				</div>

				<div class="feature-card">
					<div class="feature-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<path d="M3 21l1.65-3.8a9 9 0 1 1 3.4 2.9L3 21"></path>
							<path d="M16.7 17.9A6 6 0 0 1 6 13"></path>
							<path d="M14.5 14.5A3.5 3.5 0 0 1 9 11"></path>
						</svg>
					</div>
					<h3 class="feature-title">数据统计</h3>
					<p class="feature-desc">实时数据统计展示，直观了解网站运营情况</p>
				</div>

				<div class="feature-card">
					<div class="feature-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
							<line x1="9" x2="15" y1="3" y2="3"></line>
						</svg>
					</div>
					<h3 class="feature-title">响应式设计</h3>
					<p class="feature-desc">完美适配各种设备，无论是手机还是桌面端</p>
				</div>

				<div class="feature-card">
					<div class="feature-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
							<circle cx="12" cy="7" r="4"></circle>
						</svg>
					</div>
					<h3 class="feature-title">用户友好</h3>
					<p class="feature-desc">简洁直观的界面设计，操作简单便捷</p>
				</div>
			</div>
		</div>
	</section>

	<section class="tools-section section">
		<div class="container">
			<h2 class="section-title">快捷工具</h2>
			<p class="section-subtitle">日常必备的实用工具，一键直达</p>

			<div class="tools-grid">
				<div class="tool-card">
					<div class="tool-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
							<path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
						</svg>
					</div>
					<h4 class="tool-name">密码生成器</h4>
					<p class="tool-desc">生成强密码</p>
				</div>

				<div class="tool-card">
					<div class="tool-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
							<line x1="16" x2="16" y1="2" y2="6"></line>
							<line x1="8" x2="8" y1="2" y2="6"></line>
							<line x1="3" x2="21" y1="10" y2="10"></line>
						</svg>
					</div>
					<h4 class="tool-name">日历日程</h4>
					<p class="tool-desc">查看日期</p>
				</div>

				<div class="tool-card">
					<div class="tool-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
							<line x1="1" x2="23" y1="10" y2="10"></line>
						</svg>
					</div>
					<h4 class="tool-name">汇率转换</h4>
					<p class="tool-desc">货币计算</p>
				</div>

				<div class="tool-card">
					<div class="tool-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<polyline points="16 18 22 12 16 6"></polyline>
							<polyline points="8 6 2 12 8 18"></polyline>
						</svg>
					</div>
					<h4 class="tool-name">代码格式化</h4>
					<p class="tool-desc">美化代码</p>
				</div>

				<div class="tool-card">
					<div class="tool-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<circle cx="12" cy="12" r="10"></circle>
							<line x1="2" x2="22" y1="12" y2="12"></line>
							<path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
						</svg>
					</div>
					<h4 class="tool-name">IP查询</h4>
					<p class="tool-desc">查询IP信息</p>
				</div>

				<div class="tool-card">
					<div class="tool-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
							<polyline points="7 10 12 15 17 10"></polyline>
							<line x1="12" x2="12" y1="15" y2="3"></line>
						</svg>
					</div>
					<h4 class="tool-name">图片压缩</h4>
					<p class="tool-desc">压缩图片</p>
				</div>

				<div class="tool-card">
					<div class="tool-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
							<path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
						</svg>
					</div>
					<h4 class="tool-name">在线笔记</h4>
					<p class="tool-desc">快速记录</p>
				</div>

				<div class="tool-card">
					<div class="tool-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
							<polyline points="22,6 12,13 2,6"></polyline>
						</svg>
					</div>
					<h4 class="tool-name">邮箱验证</h4>
					<p class="tool-desc">验证邮箱</p>
				</div>
			</div>
		</div>
	</section>

	<section id="links" class="links-section section">
		<div class="container">
			<h2 class="section-title"><?php echo get_theme_mod( 'godmaincode_links_title', '网址导航' ); ?></h2>

			<?php
			$links_by_category = godmaincode_get_links_by_category();

			if ( ! empty( $links_by_category ) ) {
				?>
				<div class="links-grid">
					<?php foreach ( $links_by_category as $category ) : ?>
					<div class="link-category">
						<h3><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg> <?php echo esc_html( $category['name'] ); ?></h3>
						<div class="link-items">
							<?php foreach ( $category['links'] as $link ) :
								$url = get_post_meta( $link->ID, 'godmaincode_link_url', true );
								$icon = get_post_meta( $link->ID, 'godmaincode_link_icon', true );
								?>
								<a href="<?php echo esc_url( $url ); ?>" target="_blank" class="link-item">
									<span class="link-icon"><?php echo ! empty( $icon ) ? esc_html( $icon ) : mb_substr( get_the_title( $link->ID ), 0, 2 ); ?></span>
									<span class="link-name"><?php echo get_the_title( $link->ID ); ?></span>
								</a>
							<?php endforeach; ?>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			<?php } else {
				$all_links = godmaincode_get_all_links();
				if ( ! empty( $all_links ) ) {
					?>
					<div class="links-grid">
						<div class="link-category">
							<h3><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg> 常用链接</h3>
							<div class="link-items">
								<?php foreach ( $all_links as $link ) :
									$url = get_post_meta( $link->ID, 'godmaincode_link_url', true );
									$icon = get_post_meta( $link->ID, 'godmaincode_link_icon', true );
									?>
									<a href="<?php echo esc_url( $url ); ?>" target="_blank" class="link-item">
										<span class="link-icon"><?php echo ! empty( $icon ) ? esc_html( $icon ) : mb_substr( get_the_title( $link->ID ), 0, 2 ); ?></span>
										<span class="link-name"><?php echo get_the_title( $link->ID ); ?></span>
									</a>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				<?php } else { ?>
				<div class="links-empty">
					<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
						<path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
						<path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
					</svg>
					<p>暂无导航链接，请在后台添加</p>
					<a href="<?php echo admin_url( 'post-new.php?post_type=godmaincode_link' ); ?>" class="btn btn-primary">添加链接</a>
				</div>
			<?php }
			}
			?>
		</div>
	</section>

	<section class="tags-section section">
		<div class="container">
			<h2 class="section-title">热门标签</h2>
			<p class="section-subtitle">探索感兴趣的话题</p>

			<div class="tags-cloud">
				<a href="#" class="tag-item tag-large">JavaScript</a>
				<a href="#" class="tag-item tag-medium">Python</a>
				<a href="#" class="tag-item tag-small">React</a>
				<a href="#" class="tag-item tag-large">Vue.js</a>
				<a href="#" class="tag-item tag-medium">Node.js</a>
				<a href="#" class="tag-item tag-small">TypeScript</a>
				<a href="#" class="tag-item tag-medium">CSS3</a>
				<a href="#" class="tag-item tag-large">HTML5</a>
				<a href="#" class="tag-item tag-small">Docker</a>
				<a href="#" class="tag-item tag-medium">Kubernetes</a>
				<a href="#" class="tag-item tag-large">AWS</a>
				<a href="#" class="tag-item tag-small">Git</a>
				<a href="#" class="tag-item tag-medium">Linux</a>
				<a href="#" class="tag-item tag-small">SQL</a>
				<a href="#" class="tag-item tag-large">MongoDB</a>
				<a href="#" class="tag-item tag-medium">GraphQL</a>
				<a href="#" class="tag-item tag-small">REST API</a>
				<a href="#" class="tag-item tag-medium">Web安全</a>
				<a href="#" class="tag-item tag-small">AI</a>
				<a href="#" class="tag-item tag-large">机器学习</a>
			</div>
		</div>
	</section>

	<section class="news-section section">
		<div class="container">
			<h2 class="section-title"><?php echo get_theme_mod( 'godmaincode_news_title', '最新新闻' ); ?></h2>

			<div class="news-grid">
				<?php
				$news_args = array(
					'post_type'      => 'post',
					'posts_per_page' => 4,
					'post_status'    => 'publish',
					'category_name'  => 'news',
				);

				$news_query = new WP_Query( $news_args );

				if ( $news_query->have_posts() ) {
					$index = 0;
					while ( $news_query->have_posts() ) {
						$news_query->the_post();
						if ( $index === 0 ) {
							?>
							<article class="news-card news-featured">
								<div class="news-card-content">
									<div class="news-tags">
										<span class="news-tag">置顶</span>
										<?php the_category( '' ); ?>
									</div>
									<h3 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<p class="news-excerpt"><?php the_excerpt(); ?></p>
									<div class="news-meta">
										<span class="news-date"><?php the_date( 'Y年m月d日' ); ?></span>
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
										<span class="news-date"><?php the_date( 'm月d日' ); ?></span>
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
					<div class="links-empty">
						<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
							<polyline points="14 2 14 8 20 8"></polyline>
							<line x1="16" x2="8" y1="13" y2="13"></line>
							<line x1="16" x2="8" y1="17" y2="17"></line>
							<polyline points="10 9 9 9 8 9"></polyline>
						</svg>
						<p>暂无新闻内容</p>
					</div>
				<?php
				}
				?>
			</div>

			<div class="view-more">
				<a href="<?php echo esc_url( get_category_link( get_cat_ID( 'news' ) ) ); ?>" class="btn btn-outline">查看更多新闻</a>
			</div>
		</div>
	</section>

	<section class="projects-section section">
		<div class="container">
			<h2 class="section-title">精选项目</h2>
			<p class="section-subtitle">开源优质项目推荐</p>

			<div class="projects-grid">
				<div class="project-card">
					<div class="project-header">
						<div class="project-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								<polygon points="16 18 22 12 16 6"></polygon>
								<polygon points="8 6 2 12 8 18"></polygon>
							</svg>
						</div>
						<div class="project-platform">GitHub</div>
					</div>
					<h3 class="project-title">GodMainCode Theme</h3>
					<p class="project-desc">现代化WordPress主题，支持丰富的组件和响应式设计</p>
					<div class="project-stats">
						<span class="project-stat">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="16 18 22 12 16 6 16 18"></polygon><polygon points="8 6 2 12 8 18 8 6"></polygon></svg>
							2.1k
						</span>
						<span class="project-stat">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
							5.2k
						</span>
					</div>
				</div>

				<div class="project-card">
					<div class="project-header">
						<div class="project-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								<path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
							</svg>
						</div>
						<div class="project-platform">GitHub</div>
					</div>
					<h3 class="project-title">Vue.js</h3>
					<p class="project-desc">渐进式JavaScript框架，用于构建用户界面</p>
					<div class="project-stats">
						<span class="project-stat">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="16 18 22 12 16 6 16 18"></polygon><polygon points="8 6 2 12 8 18 8 6"></polygon></svg>
							201k
						</span>
						<span class="project-stat">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
							32.5k
						</span>
					</div>
				</div>

				<div class="project-card">
					<div class="project-header">
						<div class="project-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								<circle cx="12" cy="12" r="10"></circle>
								<circle cx="12" cy="12" r="4"></circle>
								<line x1="4.93" x2="9.17" y1="4.93" y2="9.17"></line>
								<line x1="14.83" x2="19.07" y1="14.83" y2="19.07"></line>
								<line x1="14.83" x2="19.07" y1="9.17" y2="4.93"></line>
								<line x1="14.83" x2="18.36" y1="9.17" y2="5.64"></line>
							</svg>
						</div>
						<div class="project-platform">GitHub</div>
					</div>
					<h3 class="project-title">React</h3>
					<p class="project-desc">用于构建用户界面的JavaScript库</p>
					<div class="project-stats">
						<span class="project-stat">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="16 18 22 12 16 6 16 18"></polygon><polygon points="8 6 2 12 8 18 8 6"></polygon></svg>
							223k
						</span>
						<span class="project-stat">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
							46.8k
						</span>
					</div>
				</div>

				<div class="project-card">
					<div class="project-header">
						<div class="project-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								<path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
							</svg>
						</div>
						<div class="project-platform">GitHub</div>
					</div>
					<h3 class="project-title">VS Code</h3>
					<p class="project-desc">为开发者打造的代码编辑器</p>
					<div class="project-stats">
						<span class="project-stat">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="16 18 22 12 16 6 16 18"></polygon><polygon points="8 6 2 12 8 18 8 6"></polygon></svg>
							148k
						</span>
						<span class="project-stat">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
							35.2k
						</span>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="articles" class="articles-section section">
		<div class="container">
			<h2 class="section-title"><?php echo get_theme_mod( 'godmaincode_articles_title', '最新文章' ); ?></h2>

			<div class="articles-grid">
				<?php
				$args = array(
					'posts_per_page' => 6,
					'post_status'    => 'publish',
					'category__not_in' => array( get_cat_ID( 'news' ) ),
				);

				$query = new WP_Query( $args );

				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();
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
					}
					wp_reset_postdata();
				} else {
					?>
					<div class="links-empty">
						<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
							<polyline points="14 2 14 8 20 8"></polyline>
							<line x1="16" x2="8" y1="13" y2="13"></line>
							<line x1="16" x2="8" y1="17" y2="17"></line>
							<polyline points="10 9 9 9 8 9"></polyline>
						</svg>
						<p>暂无文章内容</p>
					</div>
				<?php
				}
				?>
			</div>

			<div class="view-more">
				<a href="<?php echo esc_url( get_post_type_archive_link( 'post' ) ); ?>" class="btn btn-outline">查看全部文章</a>
			</div>
		</div>
	</section>

	<section class="subscribe-section section">
		<div class="container">
			<div class="subscribe-box">
				<div class="subscribe-content">
					<h2 class="subscribe-title">订阅更新</h2>
					<p class="subscribe-desc">订阅我们的邮件通讯，第一时间获取最新内容和更新通知</p>
					<form class="subscribe-form">
						<input type="email" class="subscribe-input" placeholder="输入您的邮箱地址">
						<button type="submit" class="btn btn-primary">立即订阅</button>
					</form>
				</div>
				<div class="subscribe-social">
					<h4>关注我们</h4>
					<div class="social-links">
						<a href="#" class="social-link" title="微信">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
								<path d="M8.691 2.188c-3.738 0-6.774 3.035-6.774 6.774 0 3.537 2.746 6.413 6.274 6.764-.063-.447-.063-.918-.063-1.441 0-3.249 2.638-5.884 5.889-5.884 3.251 0 5.891 2.635 5.891 5.884 0 3.248-2.64 5.884-5.891 5.884-1.614 0-3.014-.523-4.187-1.426-.154-.116-.184-.2-.184-.316 0-.066.014-.184.014-.28 0-.063-.014-.125-.014-.172 0-.062.041-.123.041-.213 0-.066-.041-.123-.041-.213 0-.07.027-.14.041-.192.082-.373.246-.633.492-.887.246-.254.582-.485.969-.607.246-.08.385-.247.385-.47 0-.123-.082-.247-.164-.37-.246-.373-.369-.804-.369-1.29 0-1.002.82-1.846 1.846-1.846.697 0 1.321.285 1.774.738.287-.396.861-.656 1.477-.656 1.106 0 2.002.896 2.002 2.002 0 1.106-.896 2.002-2.002 2.002-.738 0-1.372-.37-1.703-.895-.287.246-.697.402-1.127.402-.99 0-1.795-.804-1.795-1.795 0-.99.805-1.795 1.795-1.795.697 0 1.288.37 1.64.896.328-.246.697-.396 1.127-.396 1.29 0 2.338 1.049 2.338 2.339 0 1.29-1.048 2.338-2.338 2.338-.697 0-1.321-.285-1.774-.738-.287.396-.861.656-1.477.656-.41 0-.697-.103-.861-.205-.082.014-.164.014-.246.014-1.395 0-2.531-1.133-2.531-2.531 0-1.395 1.136-2.531 2.531-2.531 1.395 0 2.531 1.136 2.531 2.531 0 .801-.37 1.52-.945 1.998.205.066.41.117.615.117 1.395 0 2.531 1.136 2.531 2.531 0 1.395-1.136 2.531-2.531 2.531-.82 0-1.549-.395-2.002-1.002-.123.205-.41.344-.697.344-1.066 0-1.933-.867-1.933-1.933 0-.285.063-.562.172-.82-.328-.087-.656-.253-.902-.492-.41.192-.881.295-1.372.295z"/>
							</svg>
						</a>
						<a href="#" class="social-link" title="微博">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
								<path d="M10.098 20c-4.612 0-8.363-2.666-8.363-5.96 0-1.89 1.126-3.755 2.96-4.778 1.015-.566 2.127-1.023 2.98-1.261-.18-1.02-.18-1.62-.18-1.62 0-1.566 1.226-2.38 2.58-2.38 1.62 0 3.061 1.17 3.27 2.762.35-.17.71-.26 1.06-.26 1.35 0 2.56 1.01 2.56 2.59 0 1.71-.71 2.87-1.71 2.87-.53 0-.98-.17-1.19-.44-.08.56-.35 1.61-.44 2.07-.88-.34-1.83-.55-2.8-.61.08.53.12 1.06.12 1.56 0 3.294-3.685 5.96-8.246 5.96z"/>
								<ellipse cx="17.5" cy="5" rx="2.5" ry="2"/>
								<path d="M20 12.5c-.5 2-2 3.5-4 3.5-.5 0-1-.5-1-1 0-.5.5-1 1-1 1.5 0 2.5-1 2.5-2 0-1-.5-2-1.5-3-.5 0-1-.5-1-1 0-.5.5-1 1-1 2 0 4 2.5 4 5.5z"/>
							</svg>
						</a>
						<a href="#" class="social-link" title="GitHub">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
								<path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
							</svg>
						</a>
						<a href="#" class="social-link" title="B站">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
								<path d="M17.813 4.653h.854c1.51.054 2.769.578 3.773 1.574 1.004.995 1.524 2.249 1.56 3.76v7.36c-.036 1.51-.556 2.769-1.56 3.773s-2.262 1.524-3.773 1.56H5.333c-1.51-.036-2.769-.556-3.773-1.56S.036 18.858 0 17.347v-7.36c.036-1.511.556-2.765 1.56-3.76 1.004-.996 2.262-1.52 3.773-1.574h.774l-1.174-1.12a1.234 1.234 0 0 1-.373-.906c0-.356.124-.659.373-.907l.027-.027c.267-.249.573-.373.92-.373.347 0 .653.124.92.373L9.653 4.44c.071.071.134.142.187.213h4.267a.836.836 0 0 1 .16-.213l2.853-2.747c.267-.249.573-.373.92-.373.347 0 .662.151.929.4.267.249.391.551.391.907 0 .355-.124.657-.373.906zM5.333 7.24c-.746.018-1.373.276-1.88.773-.506.498-.769 1.13-.786 1.894v7.52c.017.764.28 1.395.786 1.893.507.498 1.134.756 1.88.773h13.334c.746-.017 1.373-.275 1.88-.773.506-.498.769-1.129.786-1.893v-7.52c-.017-.765-.28-1.396-.786-1.894-.507-.497-1.134-.755-1.88-.773zM8 11.107c.373 0 .684.124.933.373.25.249.383.569.383.96s-.124.71-.383.96c-.249.249-.56.373-.933.373s-.684-.124-.933-.373c-.249-.249-.373-.569-.373-.96s.124-.71.373-.96c.249-.249.56-.373.933-.373zm8 0c.373 0 .684.124.933.373.25.249.383.569.383.96s-.124.71-.383.96c-.249.249-.56.373-.933.373s-.684-.124-.933-.373c-.249-.249-.373-.569-.373-.96s.124-.71.373-.96c.249-.249.56-.373.933-.373z"/>
							</svg>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="about-section section">
		<div class="container">
			<div class="about-grid">
				<div class="about-content">
					<h2 class="section-title" style="text-align:left;">关于我们</h2>
					<p class="about-text">GodMainCode 是一个专注于技术分享与资源导航的个人站点。我们致力于为开发者和技术爱好者提供一个便捷、高效的上网导航平台，同时分享最新的技术文章和行业动态。</p>
					<p class="about-text">在这里，您可以找到最实用的开发工具、最热门的技术文章，以及最全面的网址导航。我们相信，通过分享与交流，可以让技术变得更加简单有趣。</p>
					<div class="about-stats">
						<div class="about-stat">
							<span class="about-stat-number">3+</span>
							<span class="about-stat-label">年运营经验</span>
						</div>
						<div class="about-stat">
							<span class="about-stat-number">1000+</span>
							<span class="about-stat-label">活跃用户</span>
						</div>
						<div class="about-stat">
							<span class="about-stat-number">500+</span>
							<span class="about-stat-label">精选链接</span>
						</div>
					</div>
				</div>
				<div class="about-team">
					<h3 class="team-title">核心团队</h3>
					<div class="team-grid">
						<div class="team-member">
							<div class="team-avatar">
								<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
									<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
									<circle cx="12" cy="7" r="4"></circle>
								</svg>
							</div>
							<h4 class="team-name">GodMainCode</h4>
							<p class="team-role">创始人 & 开发者</p>
						</div>
						<div class="team-member">
							<div class="team-avatar">
								<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
									<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
									<circle cx="12" cy="7" r="4"></circle>
								</svg>
							</div>
							<h4 class="team-name">技术编辑</h4>
							<p class="team-role">内容运营</p>
						</div>
						<div class="team-member">
							<div class="team-avatar">
								<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
									<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
									<circle cx="12" cy="7" r="4"></circle>
								</svg>
							</div>
							<h4 class="team-name">设计师</h4>
							<p class="team-role">UI/UX设计</p>
						</div>
					</div>
				</div>
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