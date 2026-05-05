-- ========================================
-- GodMainCode Sample Pages Data
-- ========================================

SET NAMES utf8mb4;

-- Clean old pages
DELETE FROM wp_posts WHERE post_type = 'page' AND post_name IN ('about', 'contact', 'privacy');

-- ========================================
-- Add Sample Pages
-- ========================================

-- About Page
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count) VALUES 
(1, '2024-01-01 00:00:00', '2024-01-01 00:00:00', '<p>这是关于我们页面的内容。在实际使用时，这个页面会被模板文件template-about.php替代。</p>', '关于我们', '', 'publish', 'closed', 'closed', '', 'about', '', '', '2024-01-01 00:00:00', '2024-01-01 00:00:00', '', 0, 'https://godmaincode.com/about', 0, 'page', '', 0);

SET @page_id1 = LAST_INSERT_ID();

-- Contact Page
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count) VALUES 
(1, '2024-01-01 00:00:00', '2024-01-01 00:00:00', '<p>这是联系我们页面的内容。在实际使用时，这个页面会被模板文件template-contact.php替代。</p>', '联系我们', '', 'publish', 'closed', 'closed', '', 'contact', '', '', '2024-01-01 00:00:00', '2024-01-01 00:00:00', '', 0, 'https://godmaincode.com/contact', 1, 'page', '', 0);

SET @page_id2 = LAST_INSERT_ID();

-- Privacy Policy Page
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count) VALUES 
(1, '2024-01-01 00:00:00', '2024-01-01 00:00:00', '<p>隐私政策</p><h2>信息收集</h2><p>我们收集您主动提供的信息，如邮箱地址等。</p><h2>信息使用</h2><p>您的信息仅用于改善用户体验和发送您订阅的内容。</p><h2>信息保护</h2><p>我们采取必要的安全措施保护您的个人信息。</p><h2>Cookies</h2><p>我们使用Cookies来提升用户体验。</p><h2>第三方链接</h2><p>我们的网站可能包含第三方链接，我们不对第三方网站的隐私政策负责。</p><h2>政策更新</h2><p>我们可能会更新本隐私政策，更新内容会在本页面发布。</p><h2>联系我们</h2><p>如有任何隐私相关问题，请通过<a href="mailto:info@godmaincode.com">info@godmaincode.com</a>联系我们。</p>', '隐私政策', '', 'publish', 'closed', 'closed', '', 'privacy', '', '', '2024-01-01 00:00:00', '2024-01-01 00:00:00', '', 0, 'https://godmaincode.com/privacy', 2, 'page', '', 0);

SET @page_id3 = LAST_INSERT_ID();

SELECT 'Sample pages created successfully!' AS message;
