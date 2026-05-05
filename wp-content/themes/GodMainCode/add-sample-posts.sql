-- ========================================
-- GodMainCode Sample Posts Data
-- ========================================

SET NAMES utf8mb4;

-- Clean old posts
DELETE FROM wp_posts WHERE post_type = 'post' AND post_name LIKE 'sample-%';

-- ========================================
-- Add Sample Posts
-- ========================================

-- Post 1: JavaScript Tutorial
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count) VALUES 
(1, '2024-01-15 10:00:00', '2024-01-15 10:00:00', '<p>JavaScript是现代Web开发的核心技术之一。本文将介绍JavaScript的基础知识和实用技巧。</p><h2>变量和数据类型</h2><p>JavaScript中有多种数据类型，包括字符串、数字、布尔值、对象和数组等。</p><h2>函数和作用域</h2><p>函数是JavaScript的基本构建块，理解作用域对于编写高质量代码至关重要。</p><h2>异步编程</h2><p>async/await和Promise是现代JavaScript异步编程的主要方式。</p><blockquote>JavaScript既是面向对象的，也是函数式的编程语言。</blockquote>', 'JavaScript入门指南：从基础到进阶', 'JavaScript是现代Web开发的核心技术之一。本文将介绍JavaScript的基础知识和实用技巧，帮助您快速掌握这门语言。', 'publish', 'open', 'closed', '', 'sample-javascript-guide', '', '', '2024-01-15 10:00:00', '2024-01-15 10:00:00', '', 0, 'https://godmaincode.com/sample-javascript-guide', 0, 'post', '', 0);

SET @post_id1 = LAST_INSERT_ID();

-- Set categories
INSERT INTO wp_term_relationships (object_id, term_taxonomy_id) 
SELECT @post_id1, term_taxonomy_id FROM wp_term_taxonomy WHERE taxonomy = 'category' AND term_id IN (SELECT term_id FROM wp_terms WHERE slug IN ('javascript', 'tutorials'));

-- Set tags
INSERT INTO wp_term_relationships (object_id, term_taxonomy_id)
SELECT @post_id1, term_taxonomy_id FROM wp_term_taxonomy WHERE taxonomy = 'post_tag' AND term_id IN (SELECT term_id FROM wp_terms WHERE name IN ('JavaScript', '前端开发', '教程'));

-- Post 2: React Best Practices
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count) VALUES 
(1, '2024-01-20 14:30:00', '2024-01-20 14:30:00', '<p>React是Facebook开发的用于构建用户界面的JavaScript库。本文分享一些React开发的最佳实践。</p><h2>组件设计原则</h2><p>良好的组件设计应该遵循单一职责原则，每个组件只负责一件事。</p><h2>状态管理</h2><p>合理地管理组件状态，避免不必要的状态提升。</p><h2>性能优化</h2><p>使用React.memo、useMemo和useCallback来优化性能。</p>', 'React开发最佳实践与性能优化', 'React是Facebook开发的用于构建用户界面的JavaScript库。本文分享一些React开发的最佳实践和性能优化技巧。', 'publish', 'open', 'closed', '', 'sample-react-best-practices', '', '', '2024-01-20 14:30:00', '2024-01-20 14:30:00', '', 0, 'https://godmaincode.com/sample-react-best-practices', 1, 'post', '', 0);

SET @post_id2 = LAST_INSERT_ID();

INSERT INTO wp_term_relationships (object_id, term_taxonomy_id) 
SELECT @post_id2, term_taxonomy_id FROM wp_term_taxonomy WHERE taxonomy = 'category' AND term_id IN (SELECT term_id FROM wp_terms WHERE slug IN ('react', 'frontend'));

-- Post 3: CSS Grid Layout
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count) VALUES 
(1, '2024-01-25 09:00:00', '2024-01-25 09:00:00', '<p>CSS Grid是CSS3引入的二维布局系统，可以轻松创建复杂的页面布局。</p><h2>Grid容器属性</h2><p>display: grid、grid-template-columns和grid-template-rows是基础属性。</p><h2>网格项定位</h2><p>使用grid-column和grid-row来精确控制网格项的位置。</p><h2>响应式设计</h2><p>结合媒体查询创建响应式网格布局。</p>', 'CSS Grid布局完全指南', 'CSS Grid是CSS3引入的二维布局系统，可以轻松创建复杂的页面布局。本文详细介绍CSS Grid的使用方法。', 'publish', 'open', 'closed', '', 'sample-css-grid-guide', '', '', '2024-01-25 09:00:00', '2024-01-25 09:00:00', '', 0, 'https://godmaincode.com/sample-css-grid-guide', 2, 'post', '', 0);

SET @post_id3 = LAST_INSERT_ID();

INSERT INTO wp_term_relationships (object_id, term_taxonomy_id) 
SELECT @post_id3, term_taxonomy_id FROM wp_term_taxonomy WHERE taxonomy = 'category' AND term_id IN (SELECT term_id FROM wp_terms WHERE slug IN ('css', 'frontend'));

-- Post 4: Node.js API Development
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count) VALUES 
(1, '2024-02-01 11:00:00', '2024-02-01 11:00:00', '<p>Node.js是JavaScript运行时环境，可用于开发服务器端应用程序。本文介绍如何使用Node.js构建RESTful API。</p><h2>Express框架</h2><p>Express是最流行的Node.js Web框架，可以快速构建API。</p><h2>数据库集成</h2><p>使用MongoDB或MySQL存储数据。</p><h2>身份验证</h2><p>实现JWT身份验证保护API端点。</p>', '使用Node.js和Express构建RESTful API', 'Node.js是JavaScript运行时环境，可用于开发服务器端应用程序。本文介绍如何使用Node.js和Express构建RESTful API。', 'publish', 'open', 'closed', '', 'sample-nodejs-api', '', '', '2024-02-01 11:00:00', '2024-02-01 11:00:00', '', 0, 'https://godmaincode.com/sample-nodejs-api', 3, 'post', '', 0);

SET @post_id4 = LAST_INSERT_ID();

INSERT INTO wp_term_relationships (object_id, term_taxonomy_id) 
SELECT @post_id4, term_taxonomy_id FROM wp_term_taxonomy WHERE taxonomy = 'category' AND term_id IN (SELECT term_id FROM wp_terms WHERE slug IN ('nodejs', 'backend'));

-- Post 5: Git Version Control
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count) VALUES 
(1, '2024-02-05 16:00:00', '2024-02-05 16:00:00', '<p>Git是现代软件开发不可或缺的版本控制系统。本文介绍Git的基本命令和工作流程。</p><h2>基础命令</h2><p>git init、git add、git commit是日常使用最频繁的命令。</p><h2>分支管理</h2><p>使用git branch和git checkout管理分支。</p><h2>团队协作</h2><p>通过Pull Request和Code Review进行团队协作。</p>', 'Git版本控制完全指南', 'Git是现代软件开发不可或缺的版本控制系统。本文介绍Git的基本命令、工作流程和最佳实践。', 'publish', 'open', 'closed', '', 'sample-git-guide', '', '', '2024-02-05 16:00:00', '2024-02-05 16:00:00', '', 0, 'https://godmaincode.com/sample-git-guide', 4, 'post', '', 0);

SET @post_id5 = LAST_INSERT_ID();

INSERT INTO wp_term_relationships (object_id, term_taxonomy_id) 
SELECT @post_id5, term_taxonomy_id FROM wp_term_taxonomy WHERE taxonomy = 'category' AND term_id IN (SELECT term_id FROM wp_terms WHERE slug IN ('git', 'devtools'));

-- Post 6: Docker Containerization
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count) VALUES 
(1, '2024-02-10 13:00:00', '2024-02-10 13:00:00', '<p>Docker是一个开源的容器化平台，可以让开发者打包应用及其依赖到容器中。</p><h2>Docker镜像</h2><p>使用Dockerfile定义镜像构建过程。</p><h2>容器管理</h2><p>docker run、docker ps、docker stop等基本命令。</p><h2>Docker Compose</h2><p>使用Docker Compose编排多容器应用。</p>', 'Docker容器化部署完全指南', 'Docker是一个开源的容器化平台，可以让开发者打包应用及其依赖到容器中，实现一致的运行环境。', 'publish', 'open', 'closed', '', 'sample-docker-guide', '', '', '2024-02-10 13:00:00', '2024-02-10 13:00:00', '', 0, 'https://godmaincode.com/sample-docker-guide', 5, 'post', '', 0);

SET @post_id6 = LAST_INSERT_ID();

INSERT INTO wp_term_relationships (object_id, term_taxonomy_id) 
SELECT @post_id6, term_taxonomy_id FROM wp_term_taxonomy WHERE taxonomy = 'category' AND term_id IN (SELECT term_id FROM wp_terms WHERE slug IN ('docker', 'devops'));

SELECT 'Sample posts created successfully!' AS message;
