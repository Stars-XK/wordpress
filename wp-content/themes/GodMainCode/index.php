<?php get_header(); ?>

<main id="primary" class="site-main">
	<section class="section">
		<div class="container">
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
							<h2 class="article-title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h2>
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
			else :
				?>
				<div class="links-empty">
					<p>暂无内容</p>
				</div>
				<?php
			endif;
			?>
		</div>
	</section>
</main>

<?php get_footer(); ?>