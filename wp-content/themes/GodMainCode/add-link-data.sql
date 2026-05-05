-- ========================================
-- GodMainCode 网址导航数据初始化脚本
-- ========================================

-- 设置字符集
SET NAMES utf8mb4;

-- ========================================
-- 第一步：清理旧数据（可选）
-- ========================================
-- 先清理旧的链接数据
DELETE FROM wp_posts WHERE post_type = 'godmaincode_link';
DELETE FROM wp_term_relationships WHERE object_id IN (SELECT ID FROM wp_posts WHERE post_type = 'godmaincode_link');

-- 清理旧的分类
DELETE FROM wp_terms WHERE term_id IN (SELECT term_id FROM wp_term_taxonomy WHERE taxonomy = 'godmaincode_link_category');
DELETE FROM wp_term_taxonomy WHERE taxonomy = 'godmaincode_link_category';
DELETE FROM wp_term_relationships WHERE term_taxonomy_id IN (SELECT term_taxonomy_id FROM wp_term_taxonomy WHERE taxonomy = 'godmaincode_link_category');

-- ========================================
-- 第二步：添加链接分类
-- ========================================

-- 1. 搜索引擎
INSERT INTO wp_terms (name, slug, term_group) VALUES 
('搜索引擎', 'search-engine', 0);

SET @term_id1 = LAST_INSERT_ID();

INSERT INTO wp_term_taxonomy (term_id, taxonomy, description, parent, count) VALUES 
(@term_id1, 'godmaincode_link_category', '常用的搜索引擎', 0, 0);

SET @tax_id1 = LAST_INSERT_ID();

-- 2. 社交媒体
INSERT INTO wp_terms (name, slug, term_group) VALUES 
('社交媒体', 'social-media', 0);

SET @term_id2 = LAST_INSERT_ID();

INSERT INTO wp_term_taxonomy (term_id, taxonomy, description, parent, count) VALUES 
(@term_id2, 'godmaincode_link_category', '主流社交媒体平台', 0, 0);

SET @tax_id2 = LAST_INSERT_ID();

-- 3. 技术社区
INSERT INTO wp_terms (name, slug, term_group) VALUES 
('技术社区', 'tech-community', 0);

SET @term_id3 = LAST_INSERT_ID();

INSERT INTO wp_term_taxonomy (term_id, taxonomy, description, parent, count) VALUES 
(@term_id3, 'godmaincode_link_category', '开发者社区与问答平台', 0, 0);

SET @tax_id3 = LAST_INSERT_ID();

-- 4. 开发工具
INSERT INTO wp_terms (name, slug, term_group) VALUES 
('开发工具', 'dev-tools', 0);

SET @term_id4 = LAST_INSERT_ID();

INSERT INTO wp_term_taxonomy (term_id, taxonomy, description, parent, count) VALUES 
(@term_id4, 'godmaincode_link_category', '常用的开发工具和资源', 0, 0);

SET @tax_id4 = LAST_INSERT_ID();

-- 5. 在线学习
INSERT INTO wp_terms (name, slug, term_group) VALUES 
('在线学习', 'online-learning', 0);

SET @term_id5 = LAST_INSERT_ID();

INSERT INTO wp_term_taxonomy (term_id, taxonomy, description, parent, count) VALUES 
(@term_id5, 'godmaincode_link_category', '在线教育和学习平台', 0, 0);

SET @tax_id5 = LAST_INSERT_ID();

-- 6. 生活服务
INSERT INTO wp_terms (name, slug, term_group) VALUES 
('生活服务', 'life-services', 0);

SET @term_id6 = LAST_INSERT_ID();

INSERT INTO wp_term_taxonomy (term_id, taxonomy, description, parent, count) VALUES 
(@term_id6, 'godmaincode_link_category', '日常生活服务平台', 0, 0);

SET @tax_id6 = LAST_INSERT_ID();

-- 7. 设计资源
INSERT INTO wp_terms (name, slug, term_group) VALUES 
('设计资源', 'design-resources', 0);

SET @term_id7 = LAST_INSERT_ID();

INSERT INTO wp_term_taxonomy (term_id, taxonomy, description, parent, count) VALUES 
(@term_id7, 'godmaincode_link_category', '设计工具和素材资源', 0, 0);

SET @tax_id7 = LAST_INSERT_ID();

-- 8. 资讯媒体
INSERT INTO wp_terms (name, slug, term_group) VALUES 
('资讯媒体', 'news-media', 0);

SET @term_id8 = LAST_INSERT_ID();

INSERT INTO wp_term_taxonomy (term_id, taxonomy, description, parent, count) VALUES 
(@term_id8, 'godmaincode_link_category', '科技资讯和新闻媒体', 0, 0);

SET @tax_id8 = LAST_INSERT_ID();

-- ========================================
-- 第三步：添加链接数据
-- ========================================

-- 1. 搜索引擎分类下的链接
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count) VALUES 
(1, NOW(), NOW(), '全球最大的中文搜索引擎', '百度', '', 'publish', 'closed', 'closed', '', 'baidu', '', '', NOW(), NOW(), '', 0, 'https://baidu.com', 0, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '全球最大的搜索引擎', '谷歌', '', 'publish', 'closed', 'closed', '', 'google', '', '', NOW(), NOW(), '', 0, 'https://google.com', 1, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '微软的搜索引擎', '必应', '', 'publish', 'closed', 'closed', '', 'bing', '', '', NOW(), NOW(), '', 0, 'https://bing.com', 2, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '专注于开发者的搜索引擎', 'Stack Overflow搜索', '', 'publish', 'closed', 'closed', '', 'stackoverflow-search', '', '', NOW(), NOW(), '', 0, 'https://stackoverflow.com', 3, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '搜索代码片段', 'GitHub搜索', '', 'publish', 'closed', 'closed', '', 'github-search', '', '', NOW(), NOW(), '', 0, 'https://github.com', 4, 'godmaincode_link', '', 0);

-- 获取刚才插入的帖子ID并关联到分类
SET @post_id1 = LAST_INSERT_ID() - 4;
INSERT INTO wp_term_relationships (object_id, term_taxonomy_id) VALUES 
(@post_id1, @tax_id1),
(@post_id1 + 1, @tax_id1),
(@post_id1 + 2, @tax_id1),
(@post_id1 + 3, @tax_id1),
(@post_id1 + 4, @tax_id1);

-- 添加链接URL的自定义字段
INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES 
(@post_id1, 'godmaincode_link_url', 'https://www.baidu.com'),
(@post_id1, 'godmaincode_link_icon', '百度'),
(@post_id1 + 1, 'godmaincode_link_url', 'https://www.google.com'),
(@post_id1 + 1, 'godmaincode_link_icon', '谷歌'),
(@post_id1 + 2, 'godmaincode_link_url', 'https://www.bing.com'),
(@post_id1 + 2, 'godmaincode_link_icon', '必应'),
(@post_id1 + 3, 'godmaincode_link_url', 'https://stackoverflow.com'),
(@post_id1 + 3, 'godmaincode_link_icon', 'SO'),
(@post_id1 + 4, 'godmaincode_link_url', 'https://github.com'),
(@post_id1 + 4, 'godmaincode_link_icon', 'GH');

-- 更新分类计数
UPDATE wp_term_taxonomy SET count = 5 WHERE term_taxonomy_id = @tax_id1;

-- 2. 社交媒体分类下的链接
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count) VALUES 
(1, NOW(), NOW(), '全球最大的社交媒体平台', 'Facebook', '', 'publish', 'closed', 'closed', '', 'facebook', '', '', NOW(), NOW(), '', 0, 'https://facebook.com', 0, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '中国最受欢迎的社交媒体', '微信', '', 'publish', 'closed', 'closed', '', 'wechat', '', '', NOW(), NOW(), '', 0, 'https://weixin.qq.com', 1, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '中国最大的社交平台之一', '微博', '', 'publish', 'closed', 'closed', '', 'weibo', '', '', NOW(), NOW(), '', 0, 'https://weibo.com', 2, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '即时消息和视频通话', 'QQ', '', 'publish', 'closed', 'closed', '', 'qq', '', '', NOW(), NOW(), '', 0, 'https://im.qq.com', 3, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '短视频分享平台', '抖音', '', 'publish', 'closed', 'closed', '', 'douyin', '', '', NOW(), NOW(), '', 0, 'https://douyin.com', 4, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '专业社交网络', 'LinkedIn', '', 'publish', 'closed', 'closed', '', 'linkedin', '', '', NOW(), NOW(), '', 0, 'https://linkedin.com', 5, 'godmaincode_link', '', 0);

SET @post_id2 = LAST_INSERT_ID() - 5;
INSERT INTO wp_term_relationships (object_id, term_taxonomy_id) VALUES 
(@post_id2, @tax_id2),
(@post_id2 + 1, @tax_id2),
(@post_id2 + 2, @tax_id2),
(@post_id2 + 3, @tax_id2),
(@post_id2 + 4, @tax_id2),
(@post_id2 + 5, @tax_id2);

INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES 
(@post_id2, 'godmaincode_link_url', 'https://www.facebook.com'),
(@post_id2, 'godmaincode_link_icon', 'FB'),
(@post_id2 + 1, 'godmaincode_link_url', 'https://weixin.qq.com'),
(@post_id2 + 1, 'godmaincode_link_icon', '微信'),
(@post_id2 + 2, 'godmaincode_link_url', 'https://weibo.com'),
(@post_id2 + 2, 'godmaincode_link_icon', '微博'),
(@post_id2 + 3, 'godmaincode_link_url', 'https://im.qq.com'),
(@post_id2 + 3, 'godmaincode_link_icon', 'QQ'),
(@post_id2 + 4, 'godmaincode_link_url', 'https://www.douyin.com'),
(@post_id2 + 4, 'godmaincode_link_icon', '抖音'),
(@post_id2 + 5, 'godmaincode_link_url', 'https://www.linkedin.com'),
(@post_id2 + 5, 'godmaincode_link_icon', '领英');

UPDATE wp_term_taxonomy SET count = 6 WHERE term_taxonomy_id = @tax_id2;

-- 3. 技术社区分类下的链接
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count) VALUES 
(1, NOW(), NOW(), '全球最大的程序员问答社区', 'Stack Overflow', '', 'publish', 'closed', 'closed', '', 'stackoverflow', '', '', NOW(), NOW(), '', 0, 'https://stackoverflow.com', 0, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '全球最大的代码托管平台', 'GitHub', '', 'publish', 'closed', 'closed', '', 'github', '', '', NOW(), NOW(), '', 0, 'https://github.com', 1, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), 'GitLab代码托管平台', 'GitLab', '', 'publish', 'closed', 'closed', '', 'gitlab', '', '', NOW(), NOW(), '', 0, 'https://gitlab.com', 2, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '掘金 - 帮助开发者成长的社区', '掘金', '', 'publish', 'closed', 'closed', '', 'juejin', '', '', NOW(), NOW(), '', 0, 'https://juejin.cn', 3, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '思否问答平台', 'SegmentFault', '', 'publish', 'closed', 'closed', '', 'segmentfault', '', '', NOW(), NOW(), '', 0, 'https://segmentfault.com', 4, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '开源中国社区', 'OSChina', '', 'publish', 'closed', 'closed', '', 'oschina', '', '', NOW(), NOW(), '', 0, 'https://oschina.net', 5, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '博客园', '博客园', '', 'publish', 'closed', 'closed', '', 'cnblogs', '', '', NOW(), NOW(), '', 0, 'https://cnblogs.com', 6, 'godmaincode_link', '', 0);

SET @post_id3 = LAST_INSERT_ID() - 6;
INSERT INTO wp_term_relationships (object_id, term_taxonomy_id) VALUES 
(@post_id3, @tax_id3),
(@post_id3 + 1, @tax_id3),
(@post_id3 + 2, @tax_id3),
(@post_id3 + 3, @tax_id3),
(@post_id3 + 4, @tax_id3),
(@post_id3 + 5, @tax_id3),
(@post_id3 + 6, @tax_id3);

INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES 
(@post_id3, 'godmaincode_link_url', 'https://stackoverflow.com'),
(@post_id3, 'godmaincode_link_icon', 'SO'),
(@post_id3 + 1, 'godmaincode_link_url', 'https://github.com'),
(@post_id3 + 1, 'godmaincode_link_icon', 'GH'),
(@post_id3 + 2, 'godmaincode_link_url', 'https://gitlab.com'),
(@post_id3 + 2, 'godmaincode_link_icon', 'GL'),
(@post_id3 + 3, 'godmaincode_link_url', 'https://juejin.cn'),
(@post_id3 + 3, 'godmaincode_link_icon', '掘金'),
(@post_id3 + 4, 'godmaincode_link_url', 'https://segmentfault.com'),
(@post_id3 + 4, 'godmaincode_link_icon', 'SF'),
(@post_id3 + 5, 'godmaincode_link_url', 'https://www.oschina.net'),
(@post_id3 + 5, 'godmaincode_link_icon', 'OS'),
(@post_id3 + 6, 'godmaincode_link_url', 'https://www.cnblogs.com'),
(@post_id3 + 6, 'godmaincode_link_icon', '博客');

UPDATE wp_term_taxonomy SET count = 7 WHERE term_taxonomy_id = @tax_id3;

-- 4. 开发工具分类下的链接
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count) VALUES 
(1, NOW(), NOW(), '微软的代码编辑器', 'VS Code', '', 'publish', 'closed', 'closed', '', 'vscode', '', '', NOW(), NOW(), '', 0, 'https://code.visualstudio.com', 0, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), 'JetBrains IDEs', 'IntelliJ IDEA', '', 'publish', 'closed', 'closed', '', 'intellij', '', '', NOW(), NOW(), '', 0, 'https://jetbrains.com', 1, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), 'API开发和测试工具', 'Postman', '', 'publish', 'closed', 'closed', '', 'postman', '', '', NOW(), NOW(), '', 0, 'https://postman.com', 2, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '在线代码编辑器', 'CodePen', '', 'publish', 'closed', 'closed', '', 'codepen', '', '', NOW(), NOW(), '', 0, 'https://codepen.io', 3, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), 'JSON格式化工具', 'JSON编辑器', '', 'publish', 'closed', 'closed', '', 'json-editor', '', '', NOW(), NOW(), '', 0, 'https://jsoneditoronline.org', 4, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '正则表达式测试工具', 'RegExr', '', 'publish', 'closed', 'closed', '', 'regexr', '', '', NOW(), NOW(), '', 0, 'https://regexr.com', 5, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '前端图标库', 'Font Awesome', '', 'publish', 'closed', 'closed', '', 'fontawesome', '', '', NOW(), NOW(), '', 0, 'https://fontawesome.com', 6, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), 'npm包管理器', 'npm', '', 'publish', 'closed', 'closed', '', 'npm', '', '', NOW(), NOW(), '', 0, 'https://www.npmjs.com', 7, 'godmaincode_link', '', 0);

SET @post_id4 = LAST_INSERT_ID() - 7;
INSERT INTO wp_term_relationships (object_id, term_taxonomy_id) VALUES 
(@post_id4, @tax_id4),
(@post_id4 + 1, @tax_id4),
(@post_id4 + 2, @tax_id4),
(@post_id4 + 3, @tax_id4),
(@post_id4 + 4, @tax_id4),
(@post_id4 + 5, @tax_id4),
(@post_id4 + 6, @tax_id4),
(@post_id4 + 7, @tax_id4);

INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES 
(@post_id4, 'godmaincode_link_url', 'https://code.visualstudio.com'),
(@post_id4, 'godmaincode_link_icon', 'VS'),
(@post_id4 + 1, 'godmaincode_link_url', 'https://www.jetbrains.com'),
(@post_id4 + 1, 'godmaincode_link_icon', 'JB'),
(@post_id4 + 2, 'godmaincode_link_url', 'https://www.postman.com'),
(@post_id4 + 2, 'godmaincode_link_icon', 'PM'),
(@post_id4 + 3, 'godmaincode_link_url', 'https://codepen.io'),
(@post_id4 + 3, 'godmaincode_link_icon', 'CP'),
(@post_id4 + 4, 'godmaincode_link_url', 'https://jsoneditoronline.org'),
(@post_id4 + 4, 'godmaincode_link_icon', 'JSON'),
(@post_id4 + 5, 'godmaincode_link_url', 'https://regexr.com'),
(@post_id4 + 5, 'godmaincode_link_icon', 'RegEx'),
(@post_id4 + 6, 'godmaincode_link_url', 'https://fontawesome.com'),
(@post_id4 + 6, 'godmaincode_link_icon', 'FA'),
(@post_id4 + 7, 'godmaincode_link_url', 'https://www.npmjs.com'),
(@post_id4 + 7, 'godmaincode_link_icon', 'npm');

UPDATE wp_term_taxonomy SET count = 8 WHERE term_taxonomy_id = @tax_id4;

-- 5. 在线学习分类下的链接
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count) VALUES 
(1, NOW(), NOW(), '中国大学MOOC', '中国大学MOOC', '', 'publish', 'closed', 'closed', '', 'icourse163', '', '', NOW(), NOW(), '', 0, 'https://icourse163.org', 0, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), 'Coursera在线课程平台', 'Coursera', '', 'publish', 'closed', 'closed', '', 'coursera', '', '', NOW(), NOW(), '', 0, 'https://www.coursera.org', 1, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), 'edX在线学习平台', 'edX', '', 'publish', 'closed', 'closed', '', 'edx', '', '', NOW(), NOW(), '', 0, 'https://www.edx.org', 2, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '网易云课堂', '网易云课堂', '', 'publish', 'closed', 'closed', '', 'study163', '', '', NOW(), NOW(), '', 0, 'https://study.163.com', 3, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '腾讯课堂', '腾讯课堂', '', 'publish', 'closed', 'closed', '', 'keqq', '', '', NOW(), NOW(), '', 0, 'https://ke.qq.com', 4, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '慕课网 - IT技能学习平台', '慕课网', '', 'publish', 'closed', 'closed', '', 'imooc', '', '', NOW(), NOW(), '', 0, 'https://www.imooc.com', 5, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '极客时间', '极客时间', '', 'publish', 'closed', 'closed', '', 'geektime', '', '', NOW(), NOW(), '', 0, 'https://time.geekbang.org', 6, 'godmaincode_link', '', 0);

SET @post_id5 = LAST_INSERT_ID() - 6;
INSERT INTO wp_term_relationships (object_id, term_taxonomy_id) VALUES 
(@post_id5, @tax_id5),
(@post_id5 + 1, @tax_id5),
(@post_id5 + 2, @tax_id5),
(@post_id5 + 3, @tax_id5),
(@post_id5 + 4, @tax_id5),
(@post_id5 + 5, @tax_id5),
(@post_id5 + 6, @tax_id5);

INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES 
(@post_id5, 'godmaincode_link_url', 'https://www.icourse163.org'),
(@post_id5, 'godmaincode_link_icon', 'MOOC'),
(@post_id5 + 1, 'godmaincode_link_url', 'https://www.coursera.org'),
(@post_id5 + 1, 'godmaincode_link_icon', 'Coursera'),
(@post_id5 + 2, 'godmaincode_link_url', 'https://www.edx.org'),
(@post_id5 + 2, 'godmaincode_link_icon', 'edX'),
(@post_id5 + 3, 'godmaincode_link_url', 'https://study.163.com'),
(@post_id5 + 3, 'godmaincode_link_icon', '云课堂'),
(@post_id5 + 4, 'godmaincode_link_url', 'https://ke.qq.com'),
(@post_id5 + 4, 'godmaincode_link_icon', '腾讯'),
(@post_id5 + 5, 'godmaincode_link_url', 'https://www.imooc.com'),
(@post_id5 + 5, 'godmaincode_link_icon', '慕课'),
(@post_id5 + 6, 'godmaincode_link_url', 'https://time.geekbang.org'),
(@post_id5 + 6, 'godmaincode_link_icon', '极客');

UPDATE wp_term_taxonomy SET count = 7 WHERE term_taxonomy_id = @tax_id5;

-- 6. 生活服务分类下的链接
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count) VALUES 
(1, NOW(), NOW(), '淘宝购物', '淘宝', '', 'publish', 'closed', 'closed', '', 'taobao', '', '', NOW(), NOW(), '', 0, 'https://www.taobao.com', 0, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '京东商城', '京东', '', 'publish', 'closed', 'closed', '', 'jd', '', '', NOW(), NOW(), '', 0, 'https://www.jd.com', 1, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '天猫购物', '天猫', '', 'publish', 'closed', 'closed', '', 'tmall', '', '', NOW(), NOW(), '', 0, 'https://www.tmall.com', 2, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '美团外卖', '美团', '', 'publish', 'closed', 'closed', '', 'meituan', '', '', NOW(), NOW(), '', 0, 'https://www.meituan.com', 3, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '滴滴出行', '滴滴出行', '', 'publish', 'closed', 'closed', '', 'didi', '', '', NOW(), NOW(), '', 0, 'https://www.didiglobal.com', 4, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '支付宝', '支付宝', '', 'publish', 'closed', 'closed', '', 'alipay', '', '', NOW(), NOW(), '', 0, 'https://www.alipay.com', 5, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '微信支付', '微信支付', '', 'publish', 'closed', 'closed', '', 'wechatpay', '', '', NOW(), NOW(), '', 0, 'https://pay.weixin.qq.com', 6, 'godmaincode_link', '', 0);

SET @post_id6 = LAST_INSERT_ID() - 6;
INSERT INTO wp_term_relationships (object_id, term_taxonomy_id) VALUES 
(@post_id6, @tax_id6),
(@post_id6 + 1, @tax_id6),
(@post_id6 + 2, @tax_id6),
(@post_id6 + 3, @tax_id6),
(@post_id6 + 4, @tax_id6),
(@post_id6 + 5, @tax_id6),
(@post_id6 + 6, @tax_id6);

INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES 
(@post_id6, 'godmaincode_link_url', 'https://www.taobao.com'),
(@post_id6, 'godmaincode_link_icon', '淘宝'),
(@post_id6 + 1, 'godmaincode_link_url', 'https://www.jd.com'),
(@post_id6 + 1, 'godmaincode_link_icon', '京东'),
(@post_id6 + 2, 'godmaincode_link_url', 'https://www.tmall.com'),
(@post_id6 + 2, 'godmaincode_link_icon', '天猫'),
(@post_id6 + 3, 'godmaincode_link_url', 'https://www.meituan.com'),
(@post_id6 + 3, 'godmaincode_link_icon', '美团'),
(@post_id6 + 4, 'godmaincode_link_url', 'https://www.didiglobal.com'),
(@post_id6 + 4, 'godmaincode_link_icon', '滴滴'),
(@post_id6 + 5, 'godmaincode_link_url', 'https://www.alipay.com'),
(@post_id6 + 5, 'godmaincode_link_icon', '支付宝'),
(@post_id6 + 6, 'godmaincode_link_url', 'https://pay.weixin.qq.com'),
(@post_id6 + 6, 'godmaincode_link_icon', '微信');

UPDATE wp_term_taxonomy SET count = 7 WHERE term_taxonomy_id = @tax_id6;

-- 7. 设计资源分类下的链接
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count) VALUES 
(1, NOW(), NOW(), 'Figma在线设计工具', 'Figma', '', 'publish', 'closed', 'closed', '', 'figma', '', '', NOW(), NOW(), '', 0, 'https://www.figma.com', 0, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), 'Sketch设计工具', 'Sketch', '', 'publish', 'closed', 'closed', '', 'sketch', '', '', NOW(), NOW(), '', 0, 'https://www.sketch.com', 1, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), 'Adobe XD设计', 'Adobe XD', '', 'publish', 'closed', 'closed', '', 'adobe-xd', '', '', NOW(), NOW(), '', 0, 'https://www.adobe.com/products/xd.html', 2, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), 'Unsplash免费图片', 'Unsplash', '', 'publish', 'closed', 'closed', '', 'unsplash', '', '', NOW(), NOW(), '', 0, 'https://unsplash.com', 3, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), 'Pexels免费图片', 'Pexels', '', 'publish', 'closed', 'closed', '', 'pexels', '', '', NOW(), NOW(), '', 0, 'https://www.pexels.com', 4, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), 'Dribbble设计社区', 'Dribbble', '', 'publish', 'closed', 'closed', '', 'dribbble', '', '', NOW(), NOW(), '', 0, 'https://dribbble.com', 5, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), 'Behance设计作品展示', 'Behance', '', 'publish', 'closed', 'closed', '', 'behance', '', '', NOW(), NOW(), '', 0, 'https://www.behance.net', 6, 'godmaincode_link', '', 0);

SET @post_id7 = LAST_INSERT_ID() - 6;
INSERT INTO wp_term_relationships (object_id, term_taxonomy_id) VALUES 
(@post_id7, @tax_id7),
(@post_id7 + 1, @tax_id7),
(@post_id7 + 2, @tax_id7),
(@post_id7 + 3, @tax_id7),
(@post_id7 + 4, @tax_id7),
(@post_id7 + 5, @tax_id7),
(@post_id7 + 6, @tax_id7);

INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES 
(@post_id7, 'godmaincode_link_url', 'https://www.figma.com'),
(@post_id7, 'godmaincode_link_icon', 'Figma'),
(@post_id7 + 1, 'godmaincode_link_url', 'https://www.sketch.com'),
(@post_id7 + 1, 'godmaincode_link_icon', 'Sketch'),
(@post_id7 + 2, 'godmaincode_link_url', 'https://www.adobe.com/products/xd.html'),
(@post_id7 + 2, 'godmaincode_link_icon', 'XD'),
(@post_id7 + 3, 'godmaincode_link_url', 'https://unsplash.com'),
(@post_id7 + 3, 'godmaincode_link_icon', 'Unsplash'),
(@post_id7 + 4, 'godmaincode_link_url', 'https://www.pexels.com'),
(@post_id7 + 4, 'godmaincode_link_icon', 'Pexels'),
(@post_id7 + 5, 'godmaincode_link_url', 'https://dribbble.com'),
(@post_id7 + 5, 'godmaincode_link_icon', 'Dribbble'),
(@post_id7 + 6, 'godmaincode_link_url', 'https://www.behance.net'),
(@post_id7 + 6, 'godmaincode_link_icon', 'Behance');

UPDATE wp_term_taxonomy SET count = 7 WHERE term_taxonomy_id = @tax_id7;

-- 8. 资讯媒体分类下的链接
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count) VALUES 
(1, NOW(), NOW(), '36氪 - 关注创业及互联网', '36氪', '', 'publish', 'closed', 'closed', '', '36kr', '', '', NOW(), NOW(), '', 0, 'https://36kr.com', 0, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '虎嗅网', '虎嗅', '', 'publish', 'closed', 'closed', '', 'huxiu', '', '', NOW(), NOW(), '', 0, 'https://www.huxiu.com', 1, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), '极客公园', '极客公园', '', 'publish', 'closed', 'closed', '', 'geekpark', '', '', NOW(), NOW(), '', 0, 'https://www.geekpark.net', 2, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), 'InfoQ - 软件开发资讯', 'InfoQ', '', 'publish', 'closed', 'closed', '', 'infoq', '', '', NOW(), NOW(), '', 0, 'https://www.infoq.cn', 3, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), 'Hacker News', 'Hacker News', '', 'publish', 'closed', 'closed', '', 'hacker-news', '', '', NOW(), NOW(), '', 0, 'https://news.ycombinator.com', 4, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), 'Reddit', 'Reddit', '', 'publish', 'closed', 'closed', '', 'reddit', '', '', NOW(), NOW(), '', 0, 'https://www.reddit.com', 5, 'godmaincode_link', '', 0),
(1, NOW(), NOW(), 'TechCrunch', 'TechCrunch', '', 'publish', 'closed', 'closed', '', 'techcrunch', '', '', NOW(), NOW(), '', 0, 'https://techcrunch.com', 6, 'godmaincode_link', '', 0);

SET @post_id8 = LAST_INSERT_ID() - 6;
INSERT INTO wp_term_relationships (object_id, term_taxonomy_id) VALUES 
(@post_id8, @tax_id8),
(@post_id8 + 1, @tax_id8),
(@post_id8 + 2, @tax_id8),
(@post_id8 + 3, @tax_id8),
(@post_id8 + 4, @tax_id8),
(@post_id8 + 5, @tax_id8),
(@post_id8 + 6, @tax_id8);

INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES 
(@post_id8, 'godmaincode_link_url', 'https://36kr.com'),
(@post_id8, 'godmaincode_link_icon', '36氪'),
(@post_id8 + 1, 'godmaincode_link_url', 'https://www.huxiu.com'),
(@post_id8 + 1, 'godmaincode_link_icon', '虎嗅'),
(@post_id8 + 2, 'godmaincode_link_url', 'https://www.geekpark.net'),
(@post_id8 + 2, 'godmaincode_link_icon', '极客'),
(@post_id8 + 3, 'godmaincode_link_url', 'https://www.infoq.cn'),
(@post_id8 + 3, 'godmaincode_link_icon', 'InfoQ'),
(@post_id8 + 4, 'godmaincode_link_url', 'https://news.ycombinator.com'),
(@post_id8 + 4, 'godmaincode_link_icon', 'HN'),
(@post_id8 + 5, 'godmaincode_link_url', 'https://www.reddit.com'),
(@post_id8 + 5, 'godmaincode_link_icon', 'Reddit'),
(@post_id8 + 6, 'godmaincode_link_url', 'https://techcrunch.com'),
(@post_id8 + 6, 'godmaincode_link_icon', 'TC');

UPDATE wp_term_taxonomy SET count = 7 WHERE term_taxonomy_id = @tax_id8;

-- ========================================
-- 完成！
-- ========================================
SELECT '网址导航数据导入完成！共导入8个分类，43个链接。' AS message;
