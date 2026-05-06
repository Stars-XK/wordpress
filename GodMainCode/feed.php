<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <title><?php echo esc_html(get_bloginfo('name')); ?></title>
        <link><?php echo esc_url(get_bloginfo('url')); ?></link>
        <description><?php echo esc_html(get_bloginfo('description')); ?></description>
        <language><?php echo esc_html(get_bloginfo('language')); ?></language>
        <atom:link href="<?php echo esc_url(get_bloginfo('url')); ?>/feed/" rel="self" type="application/rss+xml" />
        
        <?php
        $posts_query = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 20,
            'order' => 'DESC',
            'orderby' => 'date',
        ));
        
        while ($posts_query->have_posts()) : $posts_query->the_post();
            ?>
            <item>
                <title><?php echo esc_html(get_the_title()); ?></title>
                <link><?php echo esc_url(get_permalink()); ?></link>
                <pubDate><?php echo get_the_date('D, d M Y H:i:s +0000'); ?></pubDate>
                <dc:creator xmlns:dc="http://purl.org/dc/elements/1.1/"><?php echo esc_html(get_the_author()); ?></dc:creator>
                <description><![CDATA[<?php echo wp_strip_all_tags(get_the_excerpt()); ?>]]></description>
                <guid><?php echo esc_url(get_permalink()); ?></guid>
            </item>
            <?php
        endwhile;
        wp_reset_postdata();
        ?>
    </channel>
</rss>