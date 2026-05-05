<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text">搜索：</span>
		<input type="search" class="search-field" placeholder="搜索..." value="<?php echo get_search_query(); ?>" name="s">
	</label>
	<button type="submit" class="search-submit">搜索</button>
</form>