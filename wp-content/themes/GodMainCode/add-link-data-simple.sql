-- ========================================
-- GodMainCode Link Data Initialization
-- ========================================

SET NAMES utf8mb4;

-- ========================================
-- Step 1: Clean Old Data
-- ========================================
DELETE FROM wp_posts WHERE post_type = 'godmaincode_link';
DELETE FROM wp_term_relationships WHERE object_id IN (SELECT ID FROM wp_posts WHERE post_type = 'godmaincode_link');

DELETE FROM wp_terms WHERE term_id IN (SELECT term_id FROM wp_term_taxonomy WHERE taxonomy = 'godmaincode_link_category');
DELETE FROM wp_term_taxonomy WHERE taxonomy = 'godmaincode_link_category';

-- ========================================
-- Step 2: Add Categories
-- ========================================

-- 1. Search Engines
INSERT INTO wp_terms (name, slug, term_group) VALUES ('Search Engines', 'search-engine', 0);
SET @term_id1 = LAST_INSERT_ID();
INSERT INTO wp_term_taxonomy (term_id, taxonomy, description, parent, count) VALUES (@term_id1, 'godmaincode_link_category', 'Popular search engines', 0, 0);
SET @tax_id1 = LAST_INSERT_ID();

-- 2. Social Media
INSERT INTO wp_terms (name, slug, term_group) VALUES ('Social Media', 'social-media', 0);
SET @term_id2 = LAST_INSERT_ID();
INSERT INTO wp_term_taxonomy (term_id, taxonomy, description, parent, count) VALUES (@term_id2, 'godmaincode_link_category', 'Social media platforms', 0, 0);
SET @tax_id2 = LAST_INSERT_ID();

-- 3. Tech Community
INSERT INTO wp_terms (name, slug, term_group) VALUES ('Tech Community', 'tech-community', 0);
SET @term_id3 = LAST_INSERT_ID();
INSERT INTO wp_term_taxonomy (term_id, taxonomy, description, parent, count) VALUES (@term_id3, 'godmaincode_link_category', 'Developer communities', 0, 0);
SET @tax_id3 = LAST_INSERT_ID();

-- 4. Dev Tools
INSERT INTO wp_terms (name, slug, term_group) VALUES ('Dev Tools', 'dev-tools', 0);
SET @term_id4 = LAST_INSERT_ID();
INSERT INTO wp_term_taxonomy (term_id, taxonomy, description, parent, count) VALUES (@term_id4, 'godmaincode_link_category', 'Development tools', 0, 0);
SET @tax_id4 = LAST_INSERT_ID();

-- 5. Learning
INSERT INTO wp_terms (name, slug, term_group) VALUES ('Learning', 'online-learning', 0);
SET @term_id5 = LAST_INSERT_ID();
INSERT INTO wp_term_taxonomy (term_id, taxonomy, description, parent, count) VALUES (@term_id5, 'godmaincode_link_category', 'Online learning platforms', 0, 0);
SET @tax_id5 = LAST_INSERT_ID();

-- 6. Life Services
INSERT INTO wp_terms (name, slug, term_group) VALUES ('Life Services', 'life-services', 0);
SET @term_id6 = LAST_INSERT_ID();
INSERT INTO wp_term_taxonomy (term_id, taxonomy, description, parent, count) VALUES (@term_id6, 'godmaincode_link_category', 'Daily life services', 0, 0);
SET @tax_id6 = LAST_INSERT_ID();

-- 7. Design
INSERT INTO wp_terms (name, slug, term_group) VALUES ('Design', 'design-resources', 0);
SET @term_id7 = LAST_INSERT_ID();
INSERT INTO wp_term_taxonomy (term_id, taxonomy, description, parent, count) VALUES (@term_id7, 'godmaincode_link_category', 'Design tools and resources', 0, 0);
SET @tax_id7 = LAST_INSERT_ID();

-- 8. News
INSERT INTO wp_terms (name, slug, term_group) VALUES ('News', 'news-media', 0);
SET @term_id8 = LAST_INSERT_ID();
INSERT INTO wp_term_taxonomy (term_id, taxonomy, description, parent, count) VALUES (@term_id8, 'godmaincode_link_category', 'Tech news and media', 0, 0);
SET @tax_id8 = LAST_INSERT_ID();

-- ========================================
-- Step 3: Add Links
-- ========================================

-- Category 1: Search Engines
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count) VALUES 
(1, NOW(), NOW(), '', 'Baidu', '', 'publish', 'closed', 'closed', '', 'baidu', '', '', NOW(), NOW(), '', 0, 'https://baidu.com', 0, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '', 'Google', '', 'publish', 'closed', 'closed', '', 'google', '', '', NOW(), NOW(), '', 0, 'https://google.com', 1, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '', 'Bing', '', 'publish', 'closed', 'closed', '', 'bing', '', '', NOW(), NOW(), '', 0, 'https://bing.com', 2, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '', 'GitHub', '', 'publish', 'closed', 'closed', '', 'github', '', '', NOW(), NOW(), '', 0, 'https://github.com', 3, 'godmaincode_link', '', 0);

SET @post_id1 = LAST_INSERT_ID() - 3;
INSERT INTO wp_term_relationships (object_id, term_taxonomy_id) VALUES 
(@post_id1, @tax_id1),
(@post_id1 + 1, @tax_id1),
(@post_id1 + 2, @tax_id1),
(@post_id1 + 3, @tax_id1);

INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES 
(@post_id1, 'godmaincode_link_url', 'https://www.baidu.com'),
(@post_id1, 'godmaincode_link_icon', 'Baidu'),
(@post_id1 + 1, 'godmaincode_link_url', 'https://www.google.com'),
(@post_id1 + 1, 'godmaincode_link_icon', 'Google'),
(@post_id1 + 2, 'godmaincode_link_url', 'https://www.bing.com'),
(@post_id1 + 2, 'godmaincode_link_icon', 'Bing'),
(@post_id1 + 3, 'godmaincode_link_url', 'https://github.com'),
(@post_id1 + 3, 'godmaincode_link_icon', 'GH');

UPDATE wp_term_taxonomy SET count = 4 WHERE term_taxonomy_id = @tax_id1;

-- Category 2: Social Media
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count) VALUES 
(1, NOW(), NOW(), '', 'WeChat', '', 'publish', 'closed', 'closed', '', 'wechat', '', '', NOW(), NOW(), '', 0, 'https://weixin.qq.com', 0, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '', 'Weibo', '', 'publish', 'closed', 'closed', '', 'weibo', '', '', NOW(), NOW(), '', 0, 'https://weibo.com', 1, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '', 'QQ', '', 'publish', 'closed', 'closed', '', 'qq', '', '', NOW(), NOW(), '', 0, 'https://im.qq.com', 2, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '', 'Douyin', '', 'publish', 'closed', 'closed', '', 'douyin', '', '', NOW(), NOW(), '', 0, 'https://douyin.com', 3, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '', 'LinkedIn', '', 'publish', 'closed', 'closed', '', 'linkedin', '', '', NOW(), NOW(), '', 0, 'https://linkedin.com', 4, 'godmaincode_link', '', 0);

SET @post_id2 = LAST_INSERT_ID() - 4;
INSERT INTO wp_term_relationships (object_id, term_taxonomy_id) VALUES 
(@post_id2, @tax_id2),
(@post_id2 + 1, @tax_id2),
(@post_id2 + 2, @tax_id2),
(@post_id2 + 3, @tax_id2),
(@post_id2 + 4, @tax_id2);

INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES 
(@post_id2, 'godmaincode_link_url', 'https://weixin.qq.com'),
(@post_id2, 'godmaincode_link_icon', 'WeChat'),
(@post_id2 + 1, 'godmaincode_link_url', 'https://weibo.com'),
(@post_id2 + 1, 'godmaincode_link_icon', 'Weibo'),
(@post_id2 + 2, 'godmaincode_link_url', 'https://im.qq.com'),
(@post_id2 + 2, 'godmaincode_link_icon', 'QQ'),
(@post_id2 + 3, 'godmaincode_link_url', 'https://www.douyin.com'),
(@post_id2 + 3, 'godmaincode_link_icon', 'Douyin'),
(@post_id2 + 4, 'godmaincode_link_url', 'https://www.linkedin.com'),
(@post_id2 + 4, 'godmaincode_link_icon', 'LinkedIn');

UPDATE wp_term_taxonomy SET count = 5 WHERE term_taxonomy_id = @tax_id2;

-- Category 3: Tech Community
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count) VALUES 
(1, NOW(), NOW(), '', 'Stack Overflow', '', 'publish', 'closed', 'closed', '', 'stackoverflow', '', '', NOW(), NOW(), '', 0, 'https://stackoverflow.com', 0, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '', 'GitHub', '', 'publish', 'closed', 'closed', '', 'github2', '', '', NOW(), NOW(), '', 0, 'https://github.com', 1, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '', 'Juejin', '', 'publish', 'closed', 'closed', '', 'juejin', '', '', NOW(), NOW(), '', 0, 'https://juejin.cn', 2, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '', 'OSChina', '', 'publish', 'closed', 'closed', '', 'oschina', '', '', NOW(), NOW(), '', 0, 'https://oschina.net', 3, 'godmaincode_link', '', 0);

SET @post_id3 = LAST_INSERT_ID() - 3;
INSERT INTO wp_term_relationships (object_id, term_taxonomy_id) VALUES 
(@post_id3, @tax_id3),
(@post_id3 + 1, @tax_id3),
(@post_id3 + 2, @tax_id3),
(@post_id3 + 3, @tax_id3);

INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES 
(@post_id3, 'godmaincode_link_url', 'https://stackoverflow.com'),
(@post_id3, 'godmaincode_link_icon', 'SO'),
(@post_id3 + 1, 'godmaincode_link_url', 'https://github.com'),
(@post_id3 + 1, 'godmaincode_link_icon', 'GH'),
(@post_id3 + 2, 'godmaincode_link_url', 'https://juejin.cn'),
(@post_id3 + 2, 'godmaincode_link_icon', 'Juejin'),
(@post_id3 + 3, 'godmaincode_link_url', 'https://www.oschina.net'),
(@post_id3 + 3, 'godmaincode_link_icon', 'OSChina');

UPDATE wp_term_taxonomy SET count = 4 WHERE term_taxonomy_id = @tax_id3;

-- Category 4: Dev Tools
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count) VALUES 
(1, NOW(), NOW(), '', 'VS Code', '', 'publish', 'closed', 'closed', '', 'vscode', '', '', NOW(), NOW(), '', 0, 'https://code.visualstudio.com', 0, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '', 'Postman', '', 'publish', 'closed', 'closed', '', 'postman', '', '', NOW(), NOW(), '', 0, 'https://postman.com', 1, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '', 'CodePen', '', 'publish', 'closed', 'closed', '', 'codepen', '', '', NOW(), NOW(), '', 0, 'https://codepen.io', 2, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '', 'npm', '', 'publish', 'closed', 'closed', '', 'npm', '', '', NOW(), NOW(), '', 0, 'https://www.npmjs.com', 3, 'godmaincode_link', '', 0);

SET @post_id4 = LAST_INSERT_ID() - 3;
INSERT INTO wp_term_relationships (object_id, term_taxonomy_id) VALUES 
(@post_id4, @tax_id4),
(@post_id4 + 1, @tax_id4),
(@post_id4 + 2, @tax_id4),
(@post_id4 + 3, @tax_id4);

INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES 
(@post_id4, 'godmaincode_link_url', 'https://code.visualstudio.com'),
(@post_id4, 'godmaincode_link_icon', 'VSCode'),
(@post_id4 + 1, 'godmaincode_link_url', 'https://www.postman.com'),
(@post_id4 + 1, 'godmaincode_link_icon', 'Postman'),
(@post_id4 + 2, 'godmaincode_link_url', 'https://codepen.io'),
(@post_id4 + 2, 'godmaincode_link_icon', 'CodePen'),
(@post_id4 + 3, 'godmaincode_link_url', 'https://www.npmjs.com'),
(@post_id4 + 3, 'godmaincode_link_icon', 'npm');

UPDATE wp_term_taxonomy SET count = 4 WHERE term_taxonomy_id = @tax_id4;

-- Category 5: Learning
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count) VALUES 
(1, NOW(), NOW(), '', 'Coursera', '', 'publish', 'closed', 'closed', '', 'coursera', '', '', NOW(), NOW(), '', 0, 'https://www.coursera.org', 0, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '', 'edX', '', 'publish', 'closed', 'closed', '', 'edx', '', '', NOW(), NOW(), '', 0, 'https://www.edx.org', 1, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '', 'iMooc', '', 'publish', 'closed', 'closed', '', 'imooc', '', '', NOW(), NOW(), '', 0, 'https://www.imooc.com', 2, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '', 'GeekTime', '', 'publish', 'closed', 'closed', '', 'geektime', '', '', NOW(), NOW(), '', 0, 'https://time.geekbang.org', 3, 'godmaincode_link', '', 0);

SET @post_id5 = LAST_INSERT_ID() - 3;
INSERT INTO wp_term_relationships (object_id, term_taxonomy_id) VALUES 
(@post_id5, @tax_id5),
(@post_id5 + 1, @tax_id5),
(@post_id5 + 2, @tax_id5),
(@post_id5 + 3, @tax_id5);

INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES 
(@post_id5, 'godmaincode_link_url', 'https://www.coursera.org'),
(@post_id5, 'godmaincode_link_icon', 'Coursera'),
(@post_id5 + 1, 'godmaincode_link_url', 'https://www.edx.org'),
(@post_id5 + 1, 'godmaincode_link_icon', 'edX'),
(@post_id5 + 2, 'godmaincode_link_url', 'https://www.imooc.com'),
(@post_id5 + 2, 'godmaincode_link_icon', 'iMooc'),
(@post_id5 + 3, 'godmaincode_link_url', 'https://time.geekbang.org'),
(@post_id5 + 3, 'godmaincode_link_icon', 'GeekTime');

UPDATE wp_term_taxonomy SET count = 4 WHERE term_taxonomy_id = @tax_id5;

-- Category 6: Life Services
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count) VALUES 
(1, NOW(), NOW(), '', 'Taobao', '', 'publish', 'closed', 'closed', '', 'taobao', '', '', NOW(), NOW(), '', 0, 'https://www.taobao.com', 0, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '', 'JD', '', 'publish', 'closed', 'closed', '', 'jd', '', '', NOW(), NOW(), '', 0, 'https://www.jd.com', 1, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '', 'Meituan', '', 'publish', 'closed', 'closed', '', 'meituan', '', '', NOW(), NOW(), '', 0, 'https://www.meituan.com', 2, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '', 'Alipay', '', 'publish', 'closed', 'closed', '', 'alipay', '', '', NOW(), NOW(), '', 0, 'https://www.alipay.com', 3, 'godmaincode_link', '', 0);

SET @post_id6 = LAST_INSERT_ID() - 3;
INSERT INTO wp_term_relationships (object_id, term_taxonomy_id) VALUES 
(@post_id6, @tax_id6),
(@post_id6 + 1, @tax_id6),
(@post_id6 + 2, @tax_id6),
(@post_id6 + 3, @tax_id6);

INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES 
(@post_id6, 'godmaincode_link_url', 'https://www.taobao.com'),
(@post_id6, 'godmaincode_link_icon', 'Taobao'),
(@post_id6 + 1, 'godmaincode_link_url', 'https://www.jd.com'),
(@post_id6 + 1, 'godmaincode_link_icon', 'JD'),
(@post_id6 + 2, 'godmaincode_link_url', 'https://www.meituan.com'),
(@post_id6 + 2, 'godmaincode_link_icon', 'Meituan'),
(@post_id6 + 3, 'godmaincode_link_url', 'https://www.alipay.com'),
(@post_id6 + 3, 'godmaincode_link_icon', 'Alipay');

UPDATE wp_term_taxonomy SET count = 4 WHERE term_taxonomy_id = @tax_id6;

-- Category 7: Design
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count) VALUES 
(1, NOW(), NOW(), '', 'Figma', '', 'publish', 'closed', 'closed', '', 'figma', '', '', NOW(), NOW(), '', 0, 'https://www.figma.com', 0, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '', 'Unsplash', '', 'publish', 'closed', 'closed', '', 'unsplash', '', '', NOW(), NOW(), '', 0, 'https://unsplash.com', 1, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '', 'Dribbble', '', 'publish', 'closed', 'closed', '', 'dribbble', '', '', NOW(), NOW(), '', 0, 'https://dribbble.com', 2, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '', 'Behance', '', 'publish', 'closed', 'closed', '', 'behance', '', '', NOW(), NOW(), '', 0, 'https://www.behance.net', 3, 'godmaincode_link', '', 0);

SET @post_id7 = LAST_INSERT_ID() - 3;
INSERT INTO wp_term_relationships (object_id, term_taxonomy_id) VALUES 
(@post_id7, @tax_id7),
(@post_id7 + 1, @tax_id7),
(@post_id7 + 2, @tax_id7),
(@post_id7 + 3, @tax_id7);

INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES 
(@post_id7, 'godmaincode_link_url', 'https://www.figma.com'),
(@post_id7, 'godmaincode_link_icon', 'Figma'),
(@post_id7 + 1, 'godmaincode_link_url', 'https://unsplash.com'),
(@post_id7 + 1, 'godmaincode_link_icon', 'Unsplash'),
(@post_id7 + 2, 'godmaincode_link_url', 'https://dribbble.com'),
(@post_id7 + 2, 'godmaincode_link_icon', 'Dribbble'),
(@post_id7 + 3, 'godmaincode_link_url', 'https://www.behance.net'),
(@post_id7 + 3, 'godmaincode_link_icon', 'Behance');

UPDATE wp_term_taxonomy SET count = 4 WHERE term_taxonomy_id = @tax_id7;

-- Category 8: News
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count) VALUES 
(1, NOW(), NOW(), '', '36Kr', '', 'publish', 'closed', 'closed', '', '36kr', '', '', NOW(), NOW(), '', 0, 'https://36kr.com', 0, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '', 'Huxiu', '', 'publish', 'closed', 'closed', '', 'huxiu', '', '', NOW(), NOW(), '', 0, 'https://www.huxiu.com', 1, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '', 'InfoQ', '', 'publish', 'closed', 'closed', '', 'infoq', '', '', NOW(), NOW(), '', 0, 'https://www.infoq.cn', 2, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '', 'Hacker News', '', 'publish', 'closed', 'closed', '', 'hacker-news', '', '', NOW(), NOW(), '', 0, 'https://news.ycombinator.com', 3, 'godmaincode_link', '', 0);

SET @post_id8 = LAST_INSERT_ID() - 3;
INSERT INTO wp_term_relationships (object_id, term_taxonomy_id) VALUES 
(@post_id8, @tax_id8),
(@post_id8 + 1, @tax_id8),
(@post_id8 + 2, @tax_id8),
(@post_id8 + 3, @tax_id8);

INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES 
(@post_id8, 'godmaincode_link_url', 'https://36kr.com'),
(@post_id8, 'godmaincode_link_icon', '36Kr'),
(@post_id8 + 1, 'godmaincode_link_url', 'https://www.huxiu.com'),
(@post_id8 + 1, 'godmaincode_link_icon', 'Huxiu'),
(@post_id8 + 2, 'godmaincode_link_url', 'https://www.infoq.cn'),
(@post_id8 + 2, 'godmaincode_link_icon', 'InfoQ'),
(@post_id8 + 3, 'godmaincode_link_url', 'https://news.ycombinator.com'),
(@post_id8 + 3, 'godmaincode_link_icon', 'HN');

UPDATE wp_term_taxonomy SET count = 4 WHERE term_taxonomy_id = @tax_id8;

SELECT 'Link data imported successfully! 8 categories, 32 links.' AS message;
