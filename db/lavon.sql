/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : lavon

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-09-21 15:42:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ci_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(50) NOT NULL,
  `ip_address` varchar(16) NOT NULL,
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(20) NOT NULL,
  `user_data` text,
  PRIMARY KEY (`session_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ci_sessions
-- ----------------------------
INSERT INTO `ci_sessions` VALUES ('bade96e5532a6bba8f10584446d00521', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '1525687458', 'a:6:{s:8:\"cms_lang\";s:10:\"indonesian\";s:13:\"popup_session\";b:1;s:13:\"cms_user_name\";s:10:\"superadmin\";s:11:\"cms_user_id\";s:1:\"8\";s:18:\"cms_user_real_name\";s:13:\"Putra Budiman\";s:14:\"cms_user_email\";s:20:\"cristminix@gmail.com\";}');

-- ----------------------------
-- Table structure for `main_authorization`
-- ----------------------------
DROP TABLE IF EXISTS `main_authorization`;
CREATE TABLE `main_authorization` (
  `authorization_id` int(20) NOT NULL AUTO_INCREMENT,
  `authorization_name` varchar(50) NOT NULL,
  `description` text,
  PRIMARY KEY (`authorization_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of main_authorization
-- ----------------------------
INSERT INTO `main_authorization` VALUES ('1', 'Public', 'Pengunjung Publik Site');
INSERT INTO `main_authorization` VALUES ('2', 'Non Group', 'Publik Namun Yang Tidak Login');
INSERT INTO `main_authorization` VALUES ('3', 'Member Only', 'Hanya Member Yang Login');
INSERT INTO `main_authorization` VALUES ('4', 'Roled User', 'Hanya Member Dengan Role Tertentu');
INSERT INTO `main_authorization` VALUES ('5', 'Admin', 'Admin atau Teller');
INSERT INTO `main_authorization` VALUES ('6', 'Super User', 'Super User (spv)');

-- ----------------------------
-- Table structure for `main_config`
-- ----------------------------
DROP TABLE IF EXISTS `main_config`;
CREATE TABLE `main_config` (
  `config_id` int(20) NOT NULL AUTO_INCREMENT,
  `config_name` varchar(50) NOT NULL,
  `value` text,
  `description` text,
  PRIMARY KEY (`config_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of main_config
-- ----------------------------
INSERT INTO `main_config` VALUES ('1', 'site_name', 'Lavon', 'Site title');
INSERT INTO `main_config` VALUES ('2', 'site_slogan', 'Lavon Property', 'Site slogan');
INSERT INTO `main_config` VALUES ('5', 'site_footer', 'Sintech Berkah Abadi &copy; 2018', 'Site footer');
INSERT INTO `main_config` VALUES ('6', 'site_theme', 'metronic', 'Site theme');
INSERT INTO `main_config` VALUES ('7', 'site_layout', 'default', 'Site layout');
INSERT INTO `main_config` VALUES ('8', 'site_language', 'indonesian', 'Site language');
INSERT INTO `main_config` VALUES ('9', 'max_menu_depth', '5', 'Depth of menu recursive');
INSERT INTO `main_config` VALUES ('10', 'cms_email_reply_address', 'no-reply@rumahapp.com', 'Email address');
INSERT INTO `main_config` VALUES ('11', 'cms_email_reply_name', 'Lavon Support', 'Email name');
INSERT INTO `main_config` VALUES ('12', 'cms_email_forgot_subject', 'Re-activate your account at Lavon', 'Email subject sent when user forgot his/her password');
INSERT INTO `main_config` VALUES ('13', 'cms_email_forgot_message', 'Dear, {{ user_real_name }}<br />Click <a href=\"{{ site_url }}main/forgot/{{ activation_code }}\">{{ site_url }}main/forgot/{{ activation_code }}</a> to reactivate your account', 'Email message sent when user forgot his/her password');
INSERT INTO `main_config` VALUES ('14', 'cms_email_signup_subject', 'Aktifkan akun anda.', 'Email subject sent to activate user');
INSERT INTO `main_config` VALUES ('15', 'cms_email_signup_message', 'Dear, {{ user_real_name }}<br />Click <a href=\"{{ site_url }}main/activate/{{ activation_code }}\">{{ site_url }}main/activate/{{ activation_code }}</a> to activate your account', 'Email message sent to activate user');
INSERT INTO `main_config` VALUES ('16', 'cms_signup_activation', 'FALSE', 'Send activation email to new member. Default : false, Alternatives : true, false');
INSERT INTO `main_config` VALUES ('17', 'cms_email_useragent', 'Codeigniter', 'Default : CodeIgniter');
INSERT INTO `main_config` VALUES ('18', 'cms_email_protocol', 'smtp', 'Default : smtp, Alternatives : mail, sendmail, smtp');
INSERT INTO `main_config` VALUES ('19', 'cms_email_mailpath', '/usr/sbin/sendmail', 'Default : /usr/sbin/sendmail');
INSERT INTO `main_config` VALUES ('20', 'cms_email_smtp_host', 'ssl://smtp.googlemail.com', 'SMTP SERVER');
INSERT INTO `main_config` VALUES ('21', 'cms_email_smtp_user', 'app.lavon@gmail.com', 'EMAIL FOR SMTP');
INSERT INTO `main_config` VALUES ('22', 'cms_email_smtp_pass', 'eHBFRm5wMW1PWWFIbU1uTWJLSTllUT09', 'Encrypted Email Password');
INSERT INTO `main_config` VALUES ('23', 'cms_email_smtp_port', '465', 'smtp port, default : 465');
INSERT INTO `main_config` VALUES ('24', 'cms_email_smtp_timeout', '30', 'default : 30');
INSERT INTO `main_config` VALUES ('25', 'cms_email_wordwrap', 'TRUE', 'Enable word-wrap. Default : true, Alternatives : true, false');
INSERT INTO `main_config` VALUES ('26', 'cms_email_wrapchars', '76', 'Character count to wrap at.');
INSERT INTO `main_config` VALUES ('27', 'cms_email_mailtype', 'html', 'Type of mail. If you send HTML email you must send it as a complete web page. Make sure you do not have any relative links or relative image paths otherwise they will not work. Default : html, Alternatives : html, text');
INSERT INTO `main_config` VALUES ('28', 'cms_email_charset', 'utf-8', 'Character set (utf-8, iso-8859-1, etc.).');
INSERT INTO `main_config` VALUES ('29', 'cms_email_validate', 'FALSE', 'Whether to validate the email address. Default: true, Alternatives : true, false');
INSERT INTO `main_config` VALUES ('30', 'cms_email_priority', '3', '1, 2, 3, 4, 5  Email Priority. 1 = highest. 5 = lowest. 3 = normal.');
INSERT INTO `main_config` VALUES ('31', 'cms_email_bcc_batch_mode', 'FALSE', 'Enable BCC Batch Mode. Default: false, Alternatives: true');
INSERT INTO `main_config` VALUES ('32', 'cms_email_bcc_batch_size', '200', 'Number of emails in each BCC batch.');
INSERT INTO `main_config` VALUES ('33', 'cms_google_analytic_property_id', '', 'Google analytics property ID (e.g: UA-30285787-1) ');
INSERT INTO `main_config` VALUES ('34', 'general_default_group', '5', null);

-- ----------------------------
-- Table structure for `main_group`
-- ----------------------------
DROP TABLE IF EXISTS `main_group`;
CREATE TABLE `main_group` (
  `group_id` int(20) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(50) NOT NULL,
  `description` text,
  `status` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(150) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` varchar(150) NOT NULL,
  `trash` tinyint(4) NOT NULL,
  PRIMARY KEY (`group_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of main_group
-- ----------------------------
INSERT INTO `main_group` VALUES ('1', 'Super Admin', 'Super Admin dapat mengakses seluruh modul situs', '1', '2018-05-07 17:00:25', 'superadmin', '2018-05-07 17:00:25', 'superadmin', '0');
INSERT INTO `main_group` VALUES ('2', 'Admin', 'Admin Website', '1', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0');
INSERT INTO `main_group` VALUES ('3', 'Penulis Konten', 'HAnya diperbolehkan untuk menulis dan mengubah konten', '1', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0');
INSERT INTO `main_group` VALUES ('4', 'test', null, '1', '2018-05-07 16:55:39', 'superadmin', '2018-05-07 16:55:39', 'superadmin', '0');

-- ----------------------------
-- Table structure for `main_group_navigation`
-- ----------------------------
DROP TABLE IF EXISTS `main_group_navigation`;
CREATE TABLE `main_group_navigation` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `group_id` int(5) NOT NULL,
  `navigation_id` int(5) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of main_group_navigation
-- ----------------------------
INSERT INTO `main_group_navigation` VALUES ('1', '1', '45');
INSERT INTO `main_group_navigation` VALUES ('2', '2', '41');
INSERT INTO `main_group_navigation` VALUES ('3', '1', '41');

-- ----------------------------
-- Table structure for `main_group_privilege`
-- ----------------------------
DROP TABLE IF EXISTS `main_group_privilege`;
CREATE TABLE `main_group_privilege` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `group_id` int(5) NOT NULL,
  `privilege_id` int(5) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of main_group_privilege
-- ----------------------------

-- ----------------------------
-- Table structure for `main_group_user`
-- ----------------------------
DROP TABLE IF EXISTS `main_group_user`;
CREATE TABLE `main_group_user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `group_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of main_group_user
-- ----------------------------
INSERT INTO `main_group_user` VALUES ('1', '1', '1');
INSERT INTO `main_group_user` VALUES ('2', '2', '2');

-- ----------------------------
-- Table structure for `main_group_widget`
-- ----------------------------
DROP TABLE IF EXISTS `main_group_widget`;
CREATE TABLE `main_group_widget` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `group_id` int(5) NOT NULL,
  `widget_id` int(5) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of main_group_widget
-- ----------------------------

-- ----------------------------
-- Table structure for `main_module`
-- ----------------------------
DROP TABLE IF EXISTS `main_module`;
CREATE TABLE `main_module` (
  `module_id` int(20) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(50) NOT NULL,
  `module_path` varchar(100) NOT NULL,
  `version` varchar(50) DEFAULT NULL,
  `user_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`module_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of main_module
-- ----------------------------
INSERT INTO `main_module` VALUES ('1', 'artisan', 'artisan', '1.0', '1');
INSERT INTO `main_module` VALUES ('2', 'main', 'main', '1.0', '1');

-- ----------------------------
-- Table structure for `main_module_dependency`
-- ----------------------------
DROP TABLE IF EXISTS `main_module_dependency`;
CREATE TABLE `main_module_dependency` (
  `module_dependency_id` int(20) NOT NULL AUTO_INCREMENT,
  `module_id` int(5) NOT NULL,
  `parent_id` int(5) NOT NULL,
  PRIMARY KEY (`module_dependency_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of main_module_dependency
-- ----------------------------

-- ----------------------------
-- Table structure for `main_navigation`
-- ----------------------------
DROP TABLE IF EXISTS `main_navigation`;
CREATE TABLE `main_navigation` (
  `navigation_id` int(20) NOT NULL AUTO_INCREMENT,
  `navigation_name` varchar(50) NOT NULL,
  `parent_id` int(5) DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `bootstrap_glyph` varchar(50) DEFAULT NULL,
  `page_title` varchar(50) DEFAULT NULL,
  `page_keyword` varchar(100) DEFAULT NULL,
  `description` text,
  `url` varchar(100) DEFAULT NULL,
  `authorization_id` int(5) NOT NULL DEFAULT '1',
  `active` int(5) NOT NULL DEFAULT '1',
  `index` int(5) NOT NULL DEFAULT '0',
  `is_static` int(5) NOT NULL DEFAULT '0',
  `static_content` text,
  `only_content` int(5) NOT NULL DEFAULT '0',
  `default_theme` varchar(50) DEFAULT NULL,
  `default_layout` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`navigation_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of main_navigation
-- ----------------------------
INSERT INTO `main_navigation` VALUES ('1', 'main_login', null, 'Login', 'glyphicon-home', 'Login', null, 'Visitor need to login for authentication', 'main/login', '2', '1', '3', '0', null, '0', null, 'default-one-column');
INSERT INTO `main_navigation` VALUES ('2', 'main_forgot', null, 'Lupa Password', 'glyphicon-th-large', 'Forgot', null, 'Accidentally forgot password', 'main/forgot', '2', '0', '6', '0', null, '0', null, null);
INSERT INTO `main_navigation` VALUES ('3', 'main_logout', null, 'Logout', 'glyphicon-th-large', 'Logout', null, 'Logout for deauthentication', 'main/logout', '3', '1', '5', '0', null, '0', null, null);
INSERT INTO `main_navigation` VALUES ('4', 'main_management', null, 'Dashboard', 'glyphicon-th-large', 'Dashboard', null, 'Dashboard', 'main/management', '4', '1', '8', '0', null, '0', null, null);
INSERT INTO `main_navigation` VALUES ('5', 'main_register', null, 'Register', 'glyphicon-th-large', 'Register', null, 'New User Registration', 'main/register', '2', '0', '7', '0', null, '0', null, null);
INSERT INTO `main_navigation` VALUES ('6', 'main_change_profile', null, 'Profile', 'glyphicon-th-large', 'Profil', null, 'Change Current Profile', 'main/change_profile', '3', '1', '9', '0', null, '0', null, null);
INSERT INTO `main_navigation` VALUES ('7', 'main_group_management', '4', 'Group', 'glyphicon-th-large', 'Group', null, 'Group', 'main/group', '4', '1', '0', '0', null, '0', null, null);
INSERT INTO `main_navigation` VALUES ('8', 'main_navigation_management', '4', 'Menu', 'glyphicon-th-large', 'Pengaturan Menu', null, 'Pengaturan Menu', 'main/navigation', '4', '1', '3', '0', null, '0', null, null);
INSERT INTO `main_navigation` VALUES ('9', 'main_privilege_management', '4', 'Role', 'glyphicon-th-large', 'Role', null, 'Pengaturan Role', 'main/privilege', '4', '1', '2', '0', null, '0', null, null);
INSERT INTO `main_navigation` VALUES ('10', 'main_user_management', '4', 'User', 'glyphicon-th-large', 'User', null, 'Manage User', 'main/user', '4', '1', '1', '0', null, '0', null, null);
INSERT INTO `main_navigation` VALUES ('11', 'main_module_management', '4', 'Module', 'glyphicon-th-large', 'Module', null, 'Kelola Module', 'main/module_management', '4', '1', '5', '0', null, '0', null, null);
INSERT INTO `main_navigation` VALUES ('13', 'main_widget_management', '4', 'Widget', 'glyphicon-th-large', 'Widget', null, 'Kelola Widget', 'main/widget', '4', '1', '4', '0', null, '0', null, null);
INSERT INTO `main_navigation` VALUES ('14', 'main_quicklink_management', '4', 'Link', 'glyphicon-th-large', 'Link', null, 'Kelola Link', 'main/quicklink', '4', '1', '7', '0', null, '0', null, null);
INSERT INTO `main_navigation` VALUES ('15', 'main_config_management', '4', 'Variabel', 'glyphicon-th-large', 'Variabel', null, 'Manage Variabel', 'main/config', '4', '1', '8', '0', null, '0', null, null);
INSERT INTO `main_navigation` VALUES ('16', 'main_layout', '4', 'Layout', 'glyphicon-th-large', 'Layout', null, 'Pengaturan Layout', 'main/layout', '4', '1', '9', '0', null, '0', null, null);
INSERT INTO `main_navigation` VALUES ('17', 'homepage_beranda', null, 'Home', 'glyphicon-home', 'Selamat Datang di Web BKPP Kota Tangerang Selatan', null, 'Website resmin BKPP kota Tangerang Selatan', 'homepage/beranda', '1', '1', '1', '0', '<style type=\"text/css\">body{\r\nbackground-image: -webkit-gradient(linear, left top, right bottom, color-stop(0, white), color-stop(1, white))!important;\r\nbackground-image: -webkit-linear-gradient(top left, white 0%, white 100%)!important;\r\nbackground-image: linear-gradient(top left, white 0%, white 100%)!important;\r\n}\r\n#__section-left-and-content {\r\nbackground-image: -ms-linear-gradient(top left, #EEEEEE 0%, #EEEEEE 100%)!important;\r\nbackground-image: -moz-linear-gradient(top left, #EEEEEE 0%, #EEEEEE 100%)!important;\r\nbackground-image: -o-linear-gradient(top left, #EEEEEE 0%, #EEEEEE 100%)!important;\r\nbackground-image: -webkit-gradient(linear, left top, right bottom, color-stop(0, #EEEEEE), color-stop(1, #EEEEEE))!important;\r\nbackground-image: -webkit-linear-gradient(top left, #EEEEEE 0%, #EEEEEE 100%)!important;\r\nbackground-image: linear-gradient(top left, #EEEEEE 0%, #EEEEEE 100%)!important;\r\n}\r\n.thumbnail .caption p{\r\nfont-size:small;\r\n}\r\n.thumbnail{\r\nborder:none!important;\r\nbackground-color:#EEEEEE!important;\r\ntext-align:center;\r\n}\r\n.page-header, .page-header h1{\r\nmargin-top:0px;\r\n}\r\n#__section-left-and-content hr, #__section-left-and-content .breadcrumb{\r\nmargin:0px;\r\n}\r\n#__section-left-and-content p.lead{\r\nmargin-top:20px;\r\n}\r\n</style>\r\n<div class=\"page-header\">\r\n    <h1>Halaman Home</h1></div>\r\n<script type=\"text/javascript\">\r\n    $(window).load(function(){\r\n        function __adjust_component(identifier){\r\n            var max_height = 0;\r\n            $(identifier).each(function(){\r\n                $(this).css(\'margin-bottom\', 0);\r\n                if($(this).height()>max_height){\r\n                    max_height = $(this).height();\r\n                }\r\n            });\r\n            console.log(max_height);\r\n            $(identifier).each(function(){\r\n                var margin_bottom = 0;               \r\n                if($(this).height()<max_height){\r\n                    margin_bottom = max_height - $(this).height();\r\n                    console.log([max_height, $(this).height()]);\r\n                }\r\n                margin_bottom += 10;\r\n                $(this).css(\'margin-bottom\', margin_bottom);\r\n            });\r\n        }\r\n        function adjust_thumbnail(){\r\n            __adjust_component(\'.thumbnail img\');\r\n            __adjust_component(\'.thumbnail div.caption\');\r\n        }\r\n        adjust_thumbnail();\r\n\r\n        // resize\r\n        $(window).resize(function(){\r\n            adjust_thumbnail();\r\n        });\r\n    });\r\n</script>', '0', null, 'homepage');
INSERT INTO `main_navigation` VALUES ('19', 'main_third_party_auth', null, 'Third Party Authentication', 'glyphicon-th-large', 'Third Party Authentication', null, 'Third Party Authentication', 'main/hauth/index', '1', '0', '4', '0', null, '0', null, null);
INSERT INTO `main_navigation` VALUES ('32', 'main_bkpp_layanan', null, 'Layanan', null, 'Admin Layanan', '-', '-', 'main/bkpp/layanan', '3', '1', '10', '0', null, '0', null, 'management');
INSERT INTO `main_navigation` VALUES ('33', 'homepage_layanan', null, 'Publik Layanan', null, 'Layanan', '-', '-', 'layanan', '1', '1', '11', '0', null, '0', null, 'homepage');
INSERT INTO `main_navigation` VALUES ('34', 'homepage_profile', null, 'Homepage Profile', null, 'Profile', 'Profile', 'Profile', 'profile', '1', '1', '12', '0', null, '0', null, 'homepage');
INSERT INTO `main_navigation` VALUES ('35', 'main_bkpp_profile', null, 'Admin Profile', null, 'BKPP Profile', '-', '-', 'main/bkpp/profile', '3', '1', '13', '0', null, '0', null, 'homepage');
INSERT INTO `main_navigation` VALUES ('36', 'homepage_konten', null, 'Homepage Konten', null, 'Konten', '-', '-', 'konten', '1', '1', '14', '0', null, '0', null, 'homepage');
INSERT INTO `main_navigation` VALUES ('37', 'homepage_pencarian', null, 'Homepage Pencarian', null, 'Pencarian', '-', '-', 'pencarian', '1', '1', '15', '0', null, '0', null, 'homepage');
INSERT INTO `main_navigation` VALUES ('38', 'homepage_buku_tamu', null, 'Homepage Buku Tamu', null, 'Buku Tamu', '-', '-', 'buku-tamu', '1', '1', '16', '0', null, '0', null, 'homepage');
INSERT INTO `main_navigation` VALUES ('39', 'homepage_konsultasi', null, 'Homepage Konsultasi', null, 'Konsultasi', '-', '-', 'konsultasi', '1', '1', '17', '0', null, '0', null, 'homepage');
INSERT INTO `main_navigation` VALUES ('40', 'blog_index', null, 'Blog', 'glyphicon-pencil', null, null, 'Blog', 'blog', '1', '1', '18', '0', null, '0', null, null);
INSERT INTO `main_navigation` VALUES ('41', 'blog_manage_article', '40', 'Manage Article', null, null, null, 'Add, edit, and delete blog articles', 'blog/manage_article', '4', '1', '1', '0', null, '0', null, null);
INSERT INTO `main_navigation` VALUES ('42', 'blog_manage_category', '40', 'Manage Category', null, null, null, 'Add, edit, and delete categories. Each article can has one or more categories', 'blog/manage_category', '4', '1', '2', '0', null, '0', null, null);
INSERT INTO `main_navigation` VALUES ('43', 'public_files', null, 'Public Files', null, 'Public Files', '-', '-', 'files', '1', '1', '19', '0', null, '0', null, 'homepage');
INSERT INTO `main_navigation` VALUES ('45', 'admin_area', null, 'Admin Area', null, 'Admin Area', null, null, 'admin', '4', '1', '20', '0', null, '0', 'neutral', 'management');

-- ----------------------------
-- Table structure for `main_privilege`
-- ----------------------------
DROP TABLE IF EXISTS `main_privilege`;
CREATE TABLE `main_privilege` (
  `privilege_id` int(20) NOT NULL AUTO_INCREMENT,
  `privilege_name` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text,
  `authorization_id` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`privilege_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of main_privilege
-- ----------------------------
INSERT INTO `main_privilege` VALUES ('1', 'cms_install_module', 'Install Module', 'Install Module is a very critical privilege, it allow authorized user to Install a module to the CMS.<br />By Installing module, the database structure can be changed. There might be some additional navigation and privileges added.<br /><br />You\'d be better to give this authorization only authenticated and authorized user. (I suggest to make only admin have such a privilege)\r\n&nbsp;', '4');
INSERT INTO `main_privilege` VALUES ('2', 'cms_manage_access', 'Manage Access', 'Manage access\r\n&nbsp;', '4');
INSERT INTO `main_privilege` VALUES ('3', 'admin_menu_read', 'Admin Menu Management - READ', ' - ', '1');
INSERT INTO `main_privilege` VALUES ('4', 'admin_menu_insert', 'Admin Menu Management - INSERT', ' - ', '1');
INSERT INTO `main_privilege` VALUES ('5', 'admin_menu_update', 'Admin Menu Management - UPDATE', ' - ', '1');
INSERT INTO `main_privilege` VALUES ('6', 'admin_menu_remove', 'Admin Menu Management - REMOVE', ' - ', '1');

-- ----------------------------
-- Table structure for `main_quicklink`
-- ----------------------------
DROP TABLE IF EXISTS `main_quicklink`;
CREATE TABLE `main_quicklink` (
  `quicklink_id` int(20) NOT NULL AUTO_INCREMENT,
  `navigation_id` int(5) NOT NULL,
  `index` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`quicklink_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of main_quicklink
-- ----------------------------
INSERT INTO `main_quicklink` VALUES ('1', '17', '0');
INSERT INTO `main_quicklink` VALUES ('2', '5', '1');
INSERT INTO `main_quicklink` VALUES ('3', '2', '2');
INSERT INTO `main_quicklink` VALUES ('4', '4', '3');
INSERT INTO `main_quicklink` VALUES ('5', '40', '4');

-- ----------------------------
-- Table structure for `main_user`
-- ----------------------------
DROP TABLE IF EXISTS `main_user`;
CREATE TABLE `main_user` (
  `user_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `activation_code` varchar(50) DEFAULT NULL,
  `real_name` varchar(100) DEFAULT NULL,
  `active` int(5) NOT NULL DEFAULT '1',
  `auth_OpenID` varchar(100) DEFAULT NULL,
  `auth_Facebook` varchar(100) DEFAULT NULL,
  `auth_Twitter` varchar(100) DEFAULT NULL,
  `auth_Yahoo` varchar(100) DEFAULT NULL,
  `auth_LinkedIn` varchar(100) DEFAULT NULL,
  `auth_MySpace` varchar(100) DEFAULT NULL,
  `auth_Foursquare` varchar(100) DEFAULT NULL,
  `auth_AOL` varchar(100) DEFAULT NULL,
  `auth_Live` varchar(100) DEFAULT NULL,
  `trash` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of main_user
-- ----------------------------
INSERT INTO `main_user` VALUES ('2', 'test1', 'test@test.com', 'd15d92b98ab237e2c8a054fe53d0627e', null, 'test', '1', null, null, null, null, null, null, null, null, null, '0');
INSERT INTO `main_user` VALUES ('8', 'superadmin', 'cristminix@gmail.com', '25d55ad283aa400af464c76d713c07ad', null, 'Putra Budiman', '1', null, null, null, null, null, null, null, null, null, '0');

-- ----------------------------
-- Table structure for `main_widget`
-- ----------------------------
DROP TABLE IF EXISTS `main_widget`;
CREATE TABLE `main_widget` (
  `widget_id` int(20) NOT NULL AUTO_INCREMENT,
  `widget_name` varchar(50) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` text,
  `url` varchar(100) DEFAULT NULL,
  `authorization_id` int(5) NOT NULL DEFAULT '1',
  `active` int(5) NOT NULL DEFAULT '1',
  `index` int(5) NOT NULL DEFAULT '0',
  `is_static` int(5) NOT NULL DEFAULT '0',
  `static_content` text,
  `slug` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`widget_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of main_widget
-- ----------------------------
INSERT INTO `main_widget` VALUES ('1', 'section_custom_script', 'Script', '', '', '1', '1', '1', '1', '<style type=\"text/css\"></style><script type=\"text/javascript\"></script>', null);
INSERT INTO `main_widget` VALUES ('2', 'section_top_fix', 'Top Fix Section', '', '', '1', '1', '1', '1', '{{ widget_name:top_navigation }}', null);
INSERT INTO `main_widget` VALUES ('3', 'section_banner', 'Banner Section', '', '', '1', '1', '2', '1', '<div class=\"jumbotron hidden-xs hidden-sm\" style=\"margin-top:10px;\">\r\n  <img src =\"{{ site_logo }}\" style=\"max-width:20%; float:left; margin-right:10px; margin-bottom:10px;\" />\r\n  <h1>{{ site_name }}</h1>\r\n  <p>{{ site_slogan }}</p>\r\n</div>', null);
INSERT INTO `main_widget` VALUES ('4', 'section_left', 'Left Section', '', '', '1', '1', '3', '1', '', null);
INSERT INTO `main_widget` VALUES ('5', 'section_right', 'Right Section', '', '', '1', '1', '4', '1', '{{ widget_slug:sidebar }}<hr />{{ widget_slug:advertisement }}', null);
INSERT INTO `main_widget` VALUES ('6', 'section_bottom', 'Bottom Section', '', '', '1', '1', '5', '1', '{{ site_footer }}', null);
INSERT INTO `main_widget` VALUES ('7', 'left_navigation', 'Left Navigation', '', 'main/widget_left_nav', '1', '1', '6', '0', null, null);
INSERT INTO `main_widget` VALUES ('8', 'top_navigation', 'Top Navigation', '', 'main/widget_top_nav', '1', '1', '7', '0', null, null);
INSERT INTO `main_widget` VALUES ('9', 'quicklink', 'Quicklinks', '', 'main/widget_quicklink', '1', '1', '8', '0', null, null);
INSERT INTO `main_widget` VALUES ('10', 'login', 'Login', 'Visitor need to login for authentication', 'main/widget_login', '2', '1', '9', '0', '<form action=\"{{ site_url }}main/login\" method=\"post\" accept-charset=\"utf-8\"><label>Identity</label><br><input type=\"text\" name=\"identity\" value=\"\"><br><label>Password</label><br><input type=\"password\" name=\"password\" value=\"\"><br><input type=\"submit\" name=\"login\" value=\"Log In\"></form>', 'sidebar, user_widget');
INSERT INTO `main_widget` VALUES ('11', 'logout', 'User Info', 'Logout', 'main/widget_logout', '3', '1', '10', '1', '{{ language:Welcome }} {{ user_name }}<br />\r\n<a href=\"{{ site_url }}main/logout\">{{ language:Logout }}</a><br />', 'sidebar, user_widget');
INSERT INTO `main_widget` VALUES ('12', 'social_plugin', 'Share This Page !!', 'Addthis', 'main/widget_social_plugin', '1', '1', '11', '1', '<!-- AddThis Button BEGIN -->\r\n<div class=\"addthis_toolbox addthis_default_style \"><a class=\"addthis_button_preferred_1\"></a> <a class=\"addthis_button_preferred_2\"></a> <a class=\"addthis_button_preferred_3\"></a> <a class=\"addthis_button_preferred_4\"></a> <a class=\"addthis_button_preferred_5\"></a> <a class=\"addthis_button_preferred_6\"></a> <a class=\"addthis_button_preferred_7\"></a> <a class=\"addthis_button_preferred_8\"></a> <a class=\"addthis_button_preferred_9\"></a> <a class=\"addthis_button_preferred_10\"></a> <a class=\"addthis_button_preferred_11\"></a> <a class=\"addthis_button_preferred_12\"></a> <a class=\"addthis_button_preferred_13\"></a> <a class=\"addthis_button_preferred_14\"></a> <a class=\"addthis_button_preferred_15\"></a> <a class=\"addthis_button_preferred_16\"></a> <a class=\"addthis_button_compact\"></a> <a class=\"addthis_counter addthis_bubble_style\"></a></div>\r\n<script src=\"http://s7.addthis.com/js/250/addthis_widget.js?domready=1\" type=\"text/javascript\"></script>\r\n<!-- AddThis Button END -->', 'sidebar');
INSERT INTO `main_widget` VALUES ('13', 'google_search', 'Search', 'Search from google', '', '1', '0', '12', '1', '<!-- Google Custom Search Element -->\r\n<div id=\"cse\" style=\"width: 100%;\">Loading</div>\r\n<script src=\"http://www.google.com/jsapi\" type=\"text/javascript\"></script>\r\n<script type=\"text/javascript\">// <![CDATA[\r\n    google.load(\'search\', \'1\');\r\n    google.setOnLoadCallback(function(){var cse = new google.search.CustomSearchControl();cse.draw(\'cse\');}, true);\r\n// ]]></script>', 'sidebar');
INSERT INTO `main_widget` VALUES ('14', 'google_translate', 'Translate !!', '<p>The famous google translate</p>', '', '1', '0', '13', '1', '<!-- Google Translate Element -->\r\n<div id=\"google_translate_element\" style=\"display:block\"></div>\r\n<script>\r\nfunction googleTranslateElementInit() {\r\n  new google.translate.TranslateElement({pageLanguage: \"af\"}, \"google_translate_element\");\r\n};\r\n</script>\r\n<script src=\"http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit\"></script>\r\n', 'sidebar');
INSERT INTO `main_widget` VALUES ('15', 'calendar', 'Calendar', 'Indonesian Calendar', '', '1', '0', '14', '1', '<!-------Do not change below this line------->\r\n<div align=\"center\" height=\"200px\">\r\n    <iframe align=\"center\" src=\"http://www.calendarlabs.com/calendars/web-content/calendar.php?cid=1001&uid=162232623&c=22&l=en&cbg=C3D9FF&cfg=000000&hfg=000000&hfg1=000000&ct=1&cb=1&cbc=2275FF&cf=verdana&cp=bottom&sw=0&hp=t&ib=0&ibc=&i=\" width=\"170\" height=\"155\" marginwidth=0 marginheight=0 frameborder=no scrolling=no allowtransparency=\'true\'>\r\n    Loading...\r\n    </iframe>\r\n    <div align=\"center\" style=\"width:140px;font-size:10px;color:#666;\">\r\n        Powered by <a  href=\"http://www.calendarlabs.com/\" target=\"_blank\" style=\"font-size:10px;text-decoration:none;color:#666;\">Calendar</a> Labs\r\n    </div>\r\n</div>\r\n\r\n<!-------Do not change above this line------->', 'sidebar');
INSERT INTO `main_widget` VALUES ('16', 'google_map', 'Map', 'google map', '', '1', '0', '15', '1', '<!-- Google Maps Element Code -->\r\n<iframe frameborder=0 marginwidth=0 marginheight=0 border=0 style=\"border:0;margin:0;width:150px;height:250px;\" src=\"http://www.google.com/uds/modules/elements/mapselement/iframe.html?maptype=roadmap&element=true\" scrolling=\"no\" allowtransparency=\"true\"></iframe>', 'sidebar');
INSERT INTO `main_widget` VALUES ('17', 'donate_nocms', 'Widget Donasi', 'No-CMS Donation', null, '1', '1', '16', '1', 'Donasi', 'advertisement');
INSERT INTO `main_widget` VALUES ('18', 'navigation_right_partial', 'top navigation right partial', 'Right Partial of Top Navigation Bar. Use this when you want to add something like facebook login form', null, '1', '1', '17', '1', '', null);
INSERT INTO `main_widget` VALUES ('19', 'blog_newest_article', 'Newest Articles', null, 'blog/blog_widget/newest', '1', '1', '16', '0', null, 'sidebar');
INSERT INTO `main_widget` VALUES ('20', 'blog_article_category', 'Categories', null, 'blog/blog_widget/category', '1', '1', '17', '0', null, 'sidebar');
INSERT INTO `main_widget` VALUES ('21', 'public_menu', 'widget_public_menu', 'widget_public_menu', 'homepage/widget_public_menu', '1', '1', '18', '0', null, 'widget_public_menu');
INSERT INTO `main_widget` VALUES ('22', 'info_dinas_menu', 'widget_info_dinas_menu', 'widget_info_dinas_menu', 'homepage/widget_info_dinas_menu', '1', '1', '19', '0', null, null);
INSERT INTO `main_widget` VALUES ('27', 'agenda_kegiatan_menu', 'Widget agenda_kegiatan_menu', 'Widget agenda_kegiatan_menu', 'homepage/widget_agenda_kegiatan_menu', '1', '1', '100', '0', null, null);
INSERT INTO `main_widget` VALUES ('28', 'article_menu', 'Widget article_menu', 'Widget article_menu', 'homepage/widget_article_menu', '1', '1', '100', '0', null, null);
INSERT INTO `main_widget` VALUES ('29', 'galeri_menu', 'Widget galeri_menu', 'Widget galeri_menu', 'homepage/widget_galeri_menu', '1', '1', '100', '0', null, null);
INSERT INTO `main_widget` VALUES ('30', 'download_menu', 'Widget download_menu', 'Widget download_menu', 'homepage/widget_download_menu', '1', '1', '100', '0', null, null);

-- ----------------------------
-- Table structure for `m_cluster`
-- ----------------------------
DROP TABLE IF EXISTS `m_cluster`;
CREATE TABLE `m_cluster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_dibuat` datetime NOT NULL,
  `tg_diubah` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_cluster
-- ----------------------------
INSERT INTO `m_cluster` VALUES ('1', 'CL-001', 'Allura\n ', '2018-04-04 15:44:09', '2018-04-04 15:44:14');
INSERT INTO `m_cluster` VALUES ('2', 'CL-002', 'Gracia', '2018-04-04 15:44:09', '2018-04-04 15:44:09');
INSERT INTO `m_cluster` VALUES ('3', 'CL-003', 'Corona\n', '2018-04-04 15:45:27', '2018-04-04 15:45:30');
INSERT INTO `m_cluster` VALUES ('4', 'CL-004', 'Enchanta', '2018-04-04 15:46:03', '2018-04-04 15:46:06');
INSERT INTO `m_cluster` VALUES ('5', 'CL-005', 'Lavisa', '2018-04-04 15:46:32', '2018-04-04 15:46:35');
INSERT INTO `m_cluster` VALUES ('6', 'CL-006', 'Grandura', '2018-04-04 15:47:13', '2018-04-04 15:47:15');

-- ----------------------------
-- Table structure for `m_fasilitas`
-- ----------------------------
DROP TABLE IF EXISTS `m_fasilitas`;
CREATE TABLE `m_fasilitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tenan` int(11) DEFAULT NULL,
  `nama` varchar(225) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `nilai_poin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tenan` (`id_tenan`),
  CONSTRAINT `m_fasilitas_ibfk_1` FOREIGN KEY (`id_tenan`) REFERENCES `m_tenan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_fasilitas
-- ----------------------------

-- ----------------------------
-- Table structure for `m_kota`
-- ----------------------------
DROP TABLE IF EXISTS `m_kota`;
CREATE TABLE `m_kota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=449 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_kota
-- ----------------------------
INSERT INTO `m_kota` VALUES ('1', 'Kab. Kepulauan Seribu');
INSERT INTO `m_kota` VALUES ('2', 'Kota Jakarta Pusat');
INSERT INTO `m_kota` VALUES ('3', 'Kota Jakarta Utara');
INSERT INTO `m_kota` VALUES ('4', 'Kota Jakarta Barat');
INSERT INTO `m_kota` VALUES ('5', 'Kota Jakarta Selatan');
INSERT INTO `m_kota` VALUES ('6', 'Kota Jakarta Timur');
INSERT INTO `m_kota` VALUES ('7', 'Kab. Bogor');
INSERT INTO `m_kota` VALUES ('8', 'Kab. Sukabumi');
INSERT INTO `m_kota` VALUES ('9', 'Kab. Cianjur');
INSERT INTO `m_kota` VALUES ('10', 'Kab. Bandung');
INSERT INTO `m_kota` VALUES ('11', 'Kab. Sumedang');
INSERT INTO `m_kota` VALUES ('12', 'Kab. Garut');
INSERT INTO `m_kota` VALUES ('13', 'Kab. Tasikmalaya');
INSERT INTO `m_kota` VALUES ('14', 'Kab. Ciamis');
INSERT INTO `m_kota` VALUES ('15', 'Kab. Kuningan');
INSERT INTO `m_kota` VALUES ('16', 'Kab. Majalengka');
INSERT INTO `m_kota` VALUES ('17', 'Kab. Cirebon');
INSERT INTO `m_kota` VALUES ('18', 'Kab. Indramayu');
INSERT INTO `m_kota` VALUES ('19', 'Kab. Subang');
INSERT INTO `m_kota` VALUES ('20', 'Kab. Purwakarta');
INSERT INTO `m_kota` VALUES ('21', 'Kab. Karawang');
INSERT INTO `m_kota` VALUES ('22', 'Kab. Bekasi');
INSERT INTO `m_kota` VALUES ('23', 'Kab. Bandung Barat');
INSERT INTO `m_kota` VALUES ('24', 'Kota Bandung');
INSERT INTO `m_kota` VALUES ('25', 'Kota Bogor');
INSERT INTO `m_kota` VALUES ('26', 'Kota Sukabumi');
INSERT INTO `m_kota` VALUES ('27', 'Kota Cirebon');
INSERT INTO `m_kota` VALUES ('28', 'Kota Bekasi');
INSERT INTO `m_kota` VALUES ('29', 'Kota Depok');
INSERT INTO `m_kota` VALUES ('30', 'Kota Cimahi');
INSERT INTO `m_kota` VALUES ('31', 'Kota Tasikmalaya');
INSERT INTO `m_kota` VALUES ('32', 'Kota Banjar');
INSERT INTO `m_kota` VALUES ('33', 'Kab. Pandeglang');
INSERT INTO `m_kota` VALUES ('34', 'Kab. Lebak');
INSERT INTO `m_kota` VALUES ('35', 'Kab. Tangerang');
INSERT INTO `m_kota` VALUES ('36', 'Kab. Serang');
INSERT INTO `m_kota` VALUES ('37', 'Kota Cilegon');
INSERT INTO `m_kota` VALUES ('38', 'Kota Tangerang');
INSERT INTO `m_kota` VALUES ('39', 'Kota Serang');
INSERT INTO `m_kota` VALUES ('40', 'Kota Tangerang Selatan');
INSERT INTO `m_kota` VALUES ('41', 'Kab. Cilacap');
INSERT INTO `m_kota` VALUES ('42', 'Kab. Banyumas');
INSERT INTO `m_kota` VALUES ('43', 'Kab. Purbalingga');
INSERT INTO `m_kota` VALUES ('44', 'Kab. Banjarnegara');
INSERT INTO `m_kota` VALUES ('45', 'Kab. Kebumen');
INSERT INTO `m_kota` VALUES ('46', 'Kab. Purworejo');
INSERT INTO `m_kota` VALUES ('47', 'Kab. Wonosobo');
INSERT INTO `m_kota` VALUES ('48', 'Kab. Magelang');
INSERT INTO `m_kota` VALUES ('49', 'Kab. Boyolali');
INSERT INTO `m_kota` VALUES ('50', 'Kab. Klaten');
INSERT INTO `m_kota` VALUES ('51', 'Kab. Sukoharjo');
INSERT INTO `m_kota` VALUES ('52', 'Kab. Wonogiri');
INSERT INTO `m_kota` VALUES ('53', 'Kab. Karanganyar');
INSERT INTO `m_kota` VALUES ('54', 'Kab. Sragen');
INSERT INTO `m_kota` VALUES ('55', 'Kab. Grobogan');
INSERT INTO `m_kota` VALUES ('56', 'Kab. Blora');
INSERT INTO `m_kota` VALUES ('57', 'Kab. Rembang');
INSERT INTO `m_kota` VALUES ('58', 'Kab. Pati');
INSERT INTO `m_kota` VALUES ('59', 'Kab. Kudus');
INSERT INTO `m_kota` VALUES ('60', 'Kab. Jepara');
INSERT INTO `m_kota` VALUES ('61', 'Kab. Demak');
INSERT INTO `m_kota` VALUES ('62', 'Kab. Semarang');
INSERT INTO `m_kota` VALUES ('63', 'Kab. Temanggung');
INSERT INTO `m_kota` VALUES ('64', 'Kab. Kendal');
INSERT INTO `m_kota` VALUES ('65', 'Kab. Batang');
INSERT INTO `m_kota` VALUES ('66', 'Kab. Pekalongan');
INSERT INTO `m_kota` VALUES ('67', 'Kab. Pemalang');
INSERT INTO `m_kota` VALUES ('68', 'Kab. Tegal');
INSERT INTO `m_kota` VALUES ('69', 'Kab. Brebes');
INSERT INTO `m_kota` VALUES ('70', 'Kota Magelang');
INSERT INTO `m_kota` VALUES ('71', 'Kota Surakarta');
INSERT INTO `m_kota` VALUES ('72', 'Kota Salatiga');
INSERT INTO `m_kota` VALUES ('73', 'Kota Semarang');
INSERT INTO `m_kota` VALUES ('74', 'Kota Pekalongan');
INSERT INTO `m_kota` VALUES ('75', 'Kota Tegal');
INSERT INTO `m_kota` VALUES ('76', 'Kab. Bantul');
INSERT INTO `m_kota` VALUES ('77', 'Kab. Sleman');
INSERT INTO `m_kota` VALUES ('78', 'Kab. Gunung Kidul');
INSERT INTO `m_kota` VALUES ('79', 'Kab. Kulon Progo');
INSERT INTO `m_kota` VALUES ('80', 'Kota Yogyakarta');
INSERT INTO `m_kota` VALUES ('81', 'Kab. Gresik');
INSERT INTO `m_kota` VALUES ('82', 'Kab. Sidoarjo');
INSERT INTO `m_kota` VALUES ('83', 'Kab. Mojokerto');
INSERT INTO `m_kota` VALUES ('84', 'Kab. Jombang');
INSERT INTO `m_kota` VALUES ('85', 'Kab. Bojonegoro');
INSERT INTO `m_kota` VALUES ('86', 'Kab. Tuban');
INSERT INTO `m_kota` VALUES ('87', 'Kab. Lamongan');
INSERT INTO `m_kota` VALUES ('88', 'Kab. Madiun');
INSERT INTO `m_kota` VALUES ('89', 'Kab. Ngawi');
INSERT INTO `m_kota` VALUES ('90', 'Kab. Magetan');
INSERT INTO `m_kota` VALUES ('91', 'Kab. Ponorogo');
INSERT INTO `m_kota` VALUES ('92', 'Kab. Pacitan');
INSERT INTO `m_kota` VALUES ('93', 'Kab. Kediri');
INSERT INTO `m_kota` VALUES ('94', 'Kab. Nganjuk');
INSERT INTO `m_kota` VALUES ('95', 'Kab. Blitar');
INSERT INTO `m_kota` VALUES ('96', 'Kab. Tulungagung');
INSERT INTO `m_kota` VALUES ('97', 'Kab. Trenggalek');
INSERT INTO `m_kota` VALUES ('98', 'Kab. Malang');
INSERT INTO `m_kota` VALUES ('99', 'Kab. Pasuruan');
INSERT INTO `m_kota` VALUES ('100', 'Kab. Probolinggo');
INSERT INTO `m_kota` VALUES ('101', 'Kab. Lumajang');
INSERT INTO `m_kota` VALUES ('102', 'Kab. Bondowoso');
INSERT INTO `m_kota` VALUES ('103', 'Kab. Situbondo');
INSERT INTO `m_kota` VALUES ('104', 'Kab. Jember');
INSERT INTO `m_kota` VALUES ('105', 'Kab. Banyuwangi');
INSERT INTO `m_kota` VALUES ('106', 'Kab. Pamekasan');
INSERT INTO `m_kota` VALUES ('107', 'Kab. Sampang');
INSERT INTO `m_kota` VALUES ('108', 'Kab. Sumenep');
INSERT INTO `m_kota` VALUES ('109', 'Kab. Bangkalan');
INSERT INTO `m_kota` VALUES ('110', 'Kota Surabaya');
INSERT INTO `m_kota` VALUES ('111', 'Kota Malang');
INSERT INTO `m_kota` VALUES ('112', 'Kota Madiun');
INSERT INTO `m_kota` VALUES ('113', 'Kota Kediri');
INSERT INTO `m_kota` VALUES ('114', 'Kota Mojokerto');
INSERT INTO `m_kota` VALUES ('115', 'Kota Blitar');
INSERT INTO `m_kota` VALUES ('116', 'Kota Pasuruan');
INSERT INTO `m_kota` VALUES ('117', 'Kota Probolinggo');
INSERT INTO `m_kota` VALUES ('118', 'Kota Batu');
INSERT INTO `m_kota` VALUES ('119', 'Kab. Agam');
INSERT INTO `m_kota` VALUES ('120', 'Kab. Pasaman');
INSERT INTO `m_kota` VALUES ('121', 'Kab. Lima Puluh Koto');
INSERT INTO `m_kota` VALUES ('122', 'Kab. Solok');
INSERT INTO `m_kota` VALUES ('123', 'Kab. Padang Pariaman');
INSERT INTO `m_kota` VALUES ('124', 'Kab. Pesisir Selatan');
INSERT INTO `m_kota` VALUES ('125', 'Kab. Tanah Datar');
INSERT INTO `m_kota` VALUES ('126', 'Kab. Sawahlunto/ Sijunjung');
INSERT INTO `m_kota` VALUES ('127', 'Kab. Kepulauan Mentawai');
INSERT INTO `m_kota` VALUES ('128', 'Kab. Solok Selatan');
INSERT INTO `m_kota` VALUES ('129', 'Kab. Dharmas Raya');
INSERT INTO `m_kota` VALUES ('130', 'Kab. Pasaman Barat');
INSERT INTO `m_kota` VALUES ('131', 'Kota Bukittinggi');
INSERT INTO `m_kota` VALUES ('132', 'Kota Padang');
INSERT INTO `m_kota` VALUES ('133', 'Kota Padang Panjang');
INSERT INTO `m_kota` VALUES ('134', 'Kota Sawah Lunto');
INSERT INTO `m_kota` VALUES ('135', 'Kota Solok');
INSERT INTO `m_kota` VALUES ('136', 'Kota Payakumbuh');
INSERT INTO `m_kota` VALUES ('137', 'Kota Pariaman');
INSERT INTO `m_kota` VALUES ('138', 'Kab. Kampar');
INSERT INTO `m_kota` VALUES ('139', 'Kab. Bengkalis');
INSERT INTO `m_kota` VALUES ('140', 'Kab. Indragiri Hulu');
INSERT INTO `m_kota` VALUES ('141', 'Kab. Indragiri Hilir');
INSERT INTO `m_kota` VALUES ('142', 'Kab. Pelalawan');
INSERT INTO `m_kota` VALUES ('143', 'Kab. Siak');
INSERT INTO `m_kota` VALUES ('144', 'Kab. Kuantan Singingi');
INSERT INTO `m_kota` VALUES ('145', 'Kab. Rokan Hulu');
INSERT INTO `m_kota` VALUES ('146', 'Kab. Rokan Hilir');
INSERT INTO `m_kota` VALUES ('147', 'Kab. Kep. Meranti');
INSERT INTO `m_kota` VALUES ('148', 'Kota Pekanbaru');
INSERT INTO `m_kota` VALUES ('149', 'Kota Dumai');
INSERT INTO `m_kota` VALUES ('150', 'Kab. Bintan');
INSERT INTO `m_kota` VALUES ('151', 'Kab. Karimun');
INSERT INTO `m_kota` VALUES ('152', 'Kab. Natuna');
INSERT INTO `m_kota` VALUES ('153', 'Kab. Lingga');
INSERT INTO `m_kota` VALUES ('154', 'Kab. Kep. Anambas');
INSERT INTO `m_kota` VALUES ('155', 'Kota Batam');
INSERT INTO `m_kota` VALUES ('156', 'Kota Tanjungpinang');
INSERT INTO `m_kota` VALUES ('157', 'Kab. Batang Hari');
INSERT INTO `m_kota` VALUES ('158', 'Kab. Bungo');
INSERT INTO `m_kota` VALUES ('159', 'Kab. Sarolangun');
INSERT INTO `m_kota` VALUES ('160', 'Kab. Tanjung Jabung Barat');
INSERT INTO `m_kota` VALUES ('161', 'Kab. Kerinci');
INSERT INTO `m_kota` VALUES ('162', 'Kab. Tebo');
INSERT INTO `m_kota` VALUES ('163', 'Kab. Muaro Jambi');
INSERT INTO `m_kota` VALUES ('164', 'Kab. Tanjung Jabung Timur');
INSERT INTO `m_kota` VALUES ('165', 'Kab. Merangin');
INSERT INTO `m_kota` VALUES ('166', 'Kota Jambi');
INSERT INTO `m_kota` VALUES ('167', 'Kota. Sungai Penuh');
INSERT INTO `m_kota` VALUES ('168', 'Kab. Musi Banyu Asin');
INSERT INTO `m_kota` VALUES ('169', 'Kab. Ogan Komering Ilir');
INSERT INTO `m_kota` VALUES ('170', 'Kab. Ogan Komering Ulu');
INSERT INTO `m_kota` VALUES ('171', 'Kab. Muara Enim');
INSERT INTO `m_kota` VALUES ('172', 'Kab. Lahat');
INSERT INTO `m_kota` VALUES ('173', 'Kab. Musi Rawas');
INSERT INTO `m_kota` VALUES ('174', 'Kab. Banyuasin');
INSERT INTO `m_kota` VALUES ('175', 'Kab. Ogan Komering Ulu Timur');
INSERT INTO `m_kota` VALUES ('176', 'Kab. Ogan Komering Ulu Sel.');
INSERT INTO `m_kota` VALUES ('177', 'Kab. Ogan Ilir');
INSERT INTO `m_kota` VALUES ('178', 'Kab. Empat Lawang');
INSERT INTO `m_kota` VALUES ('179', 'Kota Palembang');
INSERT INTO `m_kota` VALUES ('180', 'Kota Prabumulih');
INSERT INTO `m_kota` VALUES ('181', 'Kota Lubuk Linggau');
INSERT INTO `m_kota` VALUES ('182', 'Kota Pagar Alam');
INSERT INTO `m_kota` VALUES ('183', 'Kab. Bangka');
INSERT INTO `m_kota` VALUES ('184', 'Kab. Belitung');
INSERT INTO `m_kota` VALUES ('185', 'Kab. Bangka Tengah');
INSERT INTO `m_kota` VALUES ('186', 'Kab. Bangka Barat');
INSERT INTO `m_kota` VALUES ('187', 'Kab. Bangka Selatan');
INSERT INTO `m_kota` VALUES ('188', 'Kab. Belitung Timur');
INSERT INTO `m_kota` VALUES ('189', 'Kota Pangkalpinang');
INSERT INTO `m_kota` VALUES ('190', 'Kab. Bengkulu Utara');
INSERT INTO `m_kota` VALUES ('191', 'Kab. Rejang Lebong');
INSERT INTO `m_kota` VALUES ('192', 'Kab. Bengkulu Selatan');
INSERT INTO `m_kota` VALUES ('193', 'Kab. Muko-muko');
INSERT INTO `m_kota` VALUES ('194', 'Kab. Kepahiang');
INSERT INTO `m_kota` VALUES ('195', 'Kab. Lebong');
INSERT INTO `m_kota` VALUES ('196', 'Kab. Kaur');
INSERT INTO `m_kota` VALUES ('197', 'Kab. Seluma');
INSERT INTO `m_kota` VALUES ('198', 'Kab. Bengkulu Tengah');
INSERT INTO `m_kota` VALUES ('199', 'Kota Bengkulu');
INSERT INTO `m_kota` VALUES ('200', 'Kab. Bintan');
INSERT INTO `m_kota` VALUES ('201', 'Kab. Karimun');
INSERT INTO `m_kota` VALUES ('202', 'Kab. Natuna');
INSERT INTO `m_kota` VALUES ('203', 'Kab. Lingga');
INSERT INTO `m_kota` VALUES ('204', 'Kab. Kep. Anambas');
INSERT INTO `m_kota` VALUES ('205', 'Kota Batam');
INSERT INTO `m_kota` VALUES ('206', 'Kota Tanjungpinang');
INSERT INTO `m_kota` VALUES ('207', 'Kab. Lampung Selatan');
INSERT INTO `m_kota` VALUES ('208', 'Kab. Lampung Tengah');
INSERT INTO `m_kota` VALUES ('209', 'Kab. Lampung Utara');
INSERT INTO `m_kota` VALUES ('210', 'Kab. Lampung Barat');
INSERT INTO `m_kota` VALUES ('211', 'Kab. Tulang Bawang');
INSERT INTO `m_kota` VALUES ('212', 'Kab. Tanggamus');
INSERT INTO `m_kota` VALUES ('213', 'Kab. Lampung Timur');
INSERT INTO `m_kota` VALUES ('214', 'Kab. Way Kanan');
INSERT INTO `m_kota` VALUES ('215', 'Kab. Pesawaran');
INSERT INTO `m_kota` VALUES ('216', 'Kab. Pringsewu');
INSERT INTO `m_kota` VALUES ('217', 'Kab. Mesuji');
INSERT INTO `m_kota` VALUES ('218', 'Kab. Tulang Bawang Barat');
INSERT INTO `m_kota` VALUES ('219', 'Kota Bandar Lampung');
INSERT INTO `m_kota` VALUES ('220', 'Kota Metro');
INSERT INTO `m_kota` VALUES ('221', 'Kab. Sambas');
INSERT INTO `m_kota` VALUES ('222', 'Kab. Pontianak');
INSERT INTO `m_kota` VALUES ('223', 'Kab. Sanggau');
INSERT INTO `m_kota` VALUES ('224', 'Kab. Sintang');
INSERT INTO `m_kota` VALUES ('225', 'Kab. Kapuas Hulu');
INSERT INTO `m_kota` VALUES ('226', 'Kab. Ketapang');
INSERT INTO `m_kota` VALUES ('227', 'Kab. Bengkayang');
INSERT INTO `m_kota` VALUES ('228', 'Kab. Landak');
INSERT INTO `m_kota` VALUES ('229', 'Kab. Sekadau');
INSERT INTO `m_kota` VALUES ('230', 'Kab. Melawi');
INSERT INTO `m_kota` VALUES ('231', 'Kab. Kayong Utara');
INSERT INTO `m_kota` VALUES ('232', 'Kab. Kubu Raya');
INSERT INTO `m_kota` VALUES ('233', 'Kota Pontianak');
INSERT INTO `m_kota` VALUES ('234', 'Kota Singkawang');
INSERT INTO `m_kota` VALUES ('235', 'Kab. Kapuas');
INSERT INTO `m_kota` VALUES ('236', 'Kab. Barito Selatan');
INSERT INTO `m_kota` VALUES ('237', 'Kab. Barito Utara');
INSERT INTO `m_kota` VALUES ('238', 'Kab. Kotawaringin Timur');
INSERT INTO `m_kota` VALUES ('239', 'Kab. Kotawaringin Barat');
INSERT INTO `m_kota` VALUES ('240', 'Kab. Katingan');
INSERT INTO `m_kota` VALUES ('241', 'Kab. Seruyan');
INSERT INTO `m_kota` VALUES ('242', 'Kab. Sukamara');
INSERT INTO `m_kota` VALUES ('243', 'Kab. Lamandau');
INSERT INTO `m_kota` VALUES ('244', 'Kab. Gunung Mas');
INSERT INTO `m_kota` VALUES ('245', 'Kab. Pulang Pisau');
INSERT INTO `m_kota` VALUES ('246', 'Kab. Murung Raya');
INSERT INTO `m_kota` VALUES ('247', 'Kab. Barito Timur');
INSERT INTO `m_kota` VALUES ('248', 'Kota Palangka Raya');
INSERT INTO `m_kota` VALUES ('249', 'Kab. Banjar');
INSERT INTO `m_kota` VALUES ('250', 'Kab. Tanah Laut');
INSERT INTO `m_kota` VALUES ('251', 'Kab. Barito Kuala');
INSERT INTO `m_kota` VALUES ('252', 'Kab. Tapin');
INSERT INTO `m_kota` VALUES ('253', 'Kab. Hulu Sungai Selatan');
INSERT INTO `m_kota` VALUES ('254', 'Kab. Hulu Sungai Tengah');
INSERT INTO `m_kota` VALUES ('255', 'Kab. Hulu Sungai Utara');
INSERT INTO `m_kota` VALUES ('256', 'Kab. Tabalong');
INSERT INTO `m_kota` VALUES ('257', 'Kab. Kota Baru');
INSERT INTO `m_kota` VALUES ('258', 'Kab. Balangan');
INSERT INTO `m_kota` VALUES ('259', 'Kab. Tanah Bumbu');
INSERT INTO `m_kota` VALUES ('260', 'Kota Banjarmasin');
INSERT INTO `m_kota` VALUES ('261', 'Kota Banjarbaru');
INSERT INTO `m_kota` VALUES ('262', 'Kab. Pasir');
INSERT INTO `m_kota` VALUES ('263', 'Kab. Kutai Kartanegara');
INSERT INTO `m_kota` VALUES ('264', 'Kab. Berau');
INSERT INTO `m_kota` VALUES ('265', 'Kab. Bulungan');
INSERT INTO `m_kota` VALUES ('266', 'Kab. Malinau');
INSERT INTO `m_kota` VALUES ('267', 'Kab. Nunukan');
INSERT INTO `m_kota` VALUES ('268', 'Kab. Kutai Barat');
INSERT INTO `m_kota` VALUES ('269', 'Kab. Kutai Timur');
INSERT INTO `m_kota` VALUES ('270', 'Kab. Penajam Paser Utara');
INSERT INTO `m_kota` VALUES ('271', 'Kab. Tana Tidung');
INSERT INTO `m_kota` VALUES ('272', 'Kota Samarinda');
INSERT INTO `m_kota` VALUES ('273', 'Kota Balikpapan');
INSERT INTO `m_kota` VALUES ('274', 'Kota Tarakan');
INSERT INTO `m_kota` VALUES ('275', 'Kota Bontang');
INSERT INTO `m_kota` VALUES ('276', 'Kab. Bolaang Mengondow');
INSERT INTO `m_kota` VALUES ('277', 'Kab. Minahasa');
INSERT INTO `m_kota` VALUES ('278', 'Kab. Kepulauan Sangihe');
INSERT INTO `m_kota` VALUES ('279', 'Kab. Kepulauan Talaud');
INSERT INTO `m_kota` VALUES ('280', 'Kab. Minahasa Selatan');
INSERT INTO `m_kota` VALUES ('281', 'Kab. Minahasa Utara');
INSERT INTO `m_kota` VALUES ('282', 'Kab. Bolaang Mongondow Utara');
INSERT INTO `m_kota` VALUES ('283', 'Kab. Siau Tagulandang Biaro');
INSERT INTO `m_kota` VALUES ('284', 'Kab. Minahasa Tenggara');
INSERT INTO `m_kota` VALUES ('285', 'Kab. Bolaang Mongondow Timur');
INSERT INTO `m_kota` VALUES ('286', 'Kab. Bolaang Mongondow Selatan');
INSERT INTO `m_kota` VALUES ('287', 'Kota Manado');
INSERT INTO `m_kota` VALUES ('288', 'Kota Bitung');
INSERT INTO `m_kota` VALUES ('289', 'Kota Tomohon');
INSERT INTO `m_kota` VALUES ('290', 'Kota Kotamobagu');
INSERT INTO `m_kota` VALUES ('291', 'Kab. Boalemo');
INSERT INTO `m_kota` VALUES ('292', 'Kab. Gorontalo');
INSERT INTO `m_kota` VALUES ('293', 'Kab. Pohuwato');
INSERT INTO `m_kota` VALUES ('294', 'Kab. Bone Bolango');
INSERT INTO `m_kota` VALUES ('295', 'Kab. Gorontalo Utara');
INSERT INTO `m_kota` VALUES ('296', 'Kota Gorontalo');
INSERT INTO `m_kota` VALUES ('297', 'Kab. Banggai Kepulauan');
INSERT INTO `m_kota` VALUES ('298', 'Kab. Donggala');
INSERT INTO `m_kota` VALUES ('299', 'Kab. Poso');
INSERT INTO `m_kota` VALUES ('300', 'Kab. Banggai');
INSERT INTO `m_kota` VALUES ('301', 'Kab. Buol');
INSERT INTO `m_kota` VALUES ('302', 'Kab. Toli-Toli');
INSERT INTO `m_kota` VALUES ('303', 'Kab. Morowali');
INSERT INTO `m_kota` VALUES ('304', 'Kab. Parigi Moutong');
INSERT INTO `m_kota` VALUES ('305', 'Kab. Tojo Una-Una');
INSERT INTO `m_kota` VALUES ('306', 'Kab. Sigi');
INSERT INTO `m_kota` VALUES ('307', 'Kota Palu');
INSERT INTO `m_kota` VALUES ('308', 'Kab. Maros');
INSERT INTO `m_kota` VALUES ('309', 'Kab. Pangkajene Kepulauan');
INSERT INTO `m_kota` VALUES ('310', 'Kab. Gowa');
INSERT INTO `m_kota` VALUES ('311', 'Kab. Takalar');
INSERT INTO `m_kota` VALUES ('312', 'Kab. Jeneponto');
INSERT INTO `m_kota` VALUES ('313', 'Kab. Barru');
INSERT INTO `m_kota` VALUES ('314', 'Kab. Bone');
INSERT INTO `m_kota` VALUES ('315', 'Kab. Wajo');
INSERT INTO `m_kota` VALUES ('316', 'Kab. Soppeng');
INSERT INTO `m_kota` VALUES ('317', 'Kab. Bantaeng');
INSERT INTO `m_kota` VALUES ('318', 'Kab. Bulukumba');
INSERT INTO `m_kota` VALUES ('319', 'Kab. Sinjai');
INSERT INTO `m_kota` VALUES ('320', 'Kab. Selayar');
INSERT INTO `m_kota` VALUES ('321', 'Kab. Pinrang');
INSERT INTO `m_kota` VALUES ('322', 'Kab. Sidenreng Rappang');
INSERT INTO `m_kota` VALUES ('323', 'Kab. Enrekang');
INSERT INTO `m_kota` VALUES ('324', 'Kab. Luwu');
INSERT INTO `m_kota` VALUES ('325', 'Kab. Tana Toraja');
INSERT INTO `m_kota` VALUES ('326', 'Kab. Tana Toraja Utara');
INSERT INTO `m_kota` VALUES ('327', 'Kab. Luwu Utara');
INSERT INTO `m_kota` VALUES ('328', 'Kab. Luwu Timur');
INSERT INTO `m_kota` VALUES ('329', 'Kota Makassar');
INSERT INTO `m_kota` VALUES ('330', 'Kota Pare-Pare');
INSERT INTO `m_kota` VALUES ('331', 'Kota Palopo');
INSERT INTO `m_kota` VALUES ('332', 'Kab. Mamuju');
INSERT INTO `m_kota` VALUES ('333', 'Kab. Mamuju Utara');
INSERT INTO `m_kota` VALUES ('334', 'Kab. Polewali Mandar');
INSERT INTO `m_kota` VALUES ('335', 'Kab. Mamasa');
INSERT INTO `m_kota` VALUES ('336', 'Kab. Majene');
INSERT INTO `m_kota` VALUES ('337', 'Kab. Konawe');
INSERT INTO `m_kota` VALUES ('338', 'Kab. Muna');
INSERT INTO `m_kota` VALUES ('339', 'Kab. Buton');
INSERT INTO `m_kota` VALUES ('340', 'Kab. Kolaka');
INSERT INTO `m_kota` VALUES ('341', 'Kab. Konawe Selatan');
INSERT INTO `m_kota` VALUES ('342', 'Kab. Wakatobi');
INSERT INTO `m_kota` VALUES ('343', 'Kab. Bombana');
INSERT INTO `m_kota` VALUES ('344', 'Kab. Kolaka Utara');
INSERT INTO `m_kota` VALUES ('345', 'Kab. Konawe Utara');
INSERT INTO `m_kota` VALUES ('346', 'Kab. Buton Utara');
INSERT INTO `m_kota` VALUES ('347', 'Kota Kendari');
INSERT INTO `m_kota` VALUES ('348', 'Kota Baubau');
INSERT INTO `m_kota` VALUES ('349', 'Kab. Maluku Tengah');
INSERT INTO `m_kota` VALUES ('350', 'Kab. Maluku Tenggara');
INSERT INTO `m_kota` VALUES ('351', 'Kab. Buru');
INSERT INTO `m_kota` VALUES ('352', 'Kab. Maluku Tenggara Barat');
INSERT INTO `m_kota` VALUES ('353', 'Kab. Seram Bagian Barat');
INSERT INTO `m_kota` VALUES ('354', 'Kab. Seram Bagian Timur');
INSERT INTO `m_kota` VALUES ('355', 'Kab. Kepulauan Aru');
INSERT INTO `m_kota` VALUES ('356', 'Kab. Maluku Barat Daya');
INSERT INTO `m_kota` VALUES ('357', 'Kab. Buru Selatan');
INSERT INTO `m_kota` VALUES ('358', 'Kota Ambon');
INSERT INTO `m_kota` VALUES ('359', 'Kota Tual');
INSERT INTO `m_kota` VALUES ('360', 'Kab. Halmahera Tengah');
INSERT INTO `m_kota` VALUES ('361', 'Kab. Halmahera Barat');
INSERT INTO `m_kota` VALUES ('362', 'Kab. Halmahera Utara');
INSERT INTO `m_kota` VALUES ('363', 'Kab. Halmahera Selatan');
INSERT INTO `m_kota` VALUES ('364', 'Kab. Halmahera Timur');
INSERT INTO `m_kota` VALUES ('365', 'Kab. Kepulauan Sula');
INSERT INTO `m_kota` VALUES ('366', 'Kab. Kepulauan Morotai');
INSERT INTO `m_kota` VALUES ('367', 'Kota Ternate');
INSERT INTO `m_kota` VALUES ('368', 'Kota Tidore Kepulauan');
INSERT INTO `m_kota` VALUES ('369', 'Kab. Buleleng');
INSERT INTO `m_kota` VALUES ('370', 'Kab. Jembrana');
INSERT INTO `m_kota` VALUES ('371', 'Kab. Tabanan');
INSERT INTO `m_kota` VALUES ('372', 'Kab. Badung');
INSERT INTO `m_kota` VALUES ('373', 'Kab. Gianyar');
INSERT INTO `m_kota` VALUES ('374', 'Kab. Klungkung');
INSERT INTO `m_kota` VALUES ('375', 'Kab. Bangli');
INSERT INTO `m_kota` VALUES ('376', 'Kab. Karang Asem');
INSERT INTO `m_kota` VALUES ('377', 'Kota Denpasar');
INSERT INTO `m_kota` VALUES ('378', 'Kab. Lombok Barat');
INSERT INTO `m_kota` VALUES ('379', 'Kab. Lombok Tengah');
INSERT INTO `m_kota` VALUES ('380', 'Kab. Lombok Timur');
INSERT INTO `m_kota` VALUES ('381', 'Kab. Sumbawa');
INSERT INTO `m_kota` VALUES ('382', 'Kab. Dompu');
INSERT INTO `m_kota` VALUES ('383', 'Kab. Bima');
INSERT INTO `m_kota` VALUES ('384', 'Kab. Sumbawa Barat');
INSERT INTO `m_kota` VALUES ('385', 'Kab. Lombok Utara');
INSERT INTO `m_kota` VALUES ('386', 'Kota Mataram');
INSERT INTO `m_kota` VALUES ('387', 'Kota Bima');
INSERT INTO `m_kota` VALUES ('388', 'Kab. Kupang');
INSERT INTO `m_kota` VALUES ('389', 'Kab. Timor Tengah Selatan');
INSERT INTO `m_kota` VALUES ('390', 'Kab. Timor Tengah Utara');
INSERT INTO `m_kota` VALUES ('391', 'Kab. Belu');
INSERT INTO `m_kota` VALUES ('392', 'Kab. Alor');
INSERT INTO `m_kota` VALUES ('393', 'Kab. Flores Timur');
INSERT INTO `m_kota` VALUES ('394', 'Kab. Sikka');
INSERT INTO `m_kota` VALUES ('395', 'Kab. Ende');
INSERT INTO `m_kota` VALUES ('396', 'Kab. Ngada');
INSERT INTO `m_kota` VALUES ('397', 'Kab. Manggarai');
INSERT INTO `m_kota` VALUES ('398', 'Kab. Sumba Timur');
INSERT INTO `m_kota` VALUES ('399', 'Kab. Sumba Barat');
INSERT INTO `m_kota` VALUES ('400', 'Kab. Lembata');
INSERT INTO `m_kota` VALUES ('401', 'Kab. Rote-Ndao');
INSERT INTO `m_kota` VALUES ('402', 'Kab. Manggarai Barat');
INSERT INTO `m_kota` VALUES ('403', 'Kab. Nagekeo');
INSERT INTO `m_kota` VALUES ('404', 'Kab. Sumba Tengah');
INSERT INTO `m_kota` VALUES ('405', 'Kab. Sumba Barat Daya');
INSERT INTO `m_kota` VALUES ('406', 'Kab. Manggarai Timur');
INSERT INTO `m_kota` VALUES ('407', 'Kab. Sabu Raijua');
INSERT INTO `m_kota` VALUES ('408', 'Kota Kupang');
INSERT INTO `m_kota` VALUES ('409', 'Kab. Jayapura');
INSERT INTO `m_kota` VALUES ('410', 'Kab. Biak Numfor');
INSERT INTO `m_kota` VALUES ('411', 'Kab. Yapen Waropen');
INSERT INTO `m_kota` VALUES ('412', 'Kab. Merauke');
INSERT INTO `m_kota` VALUES ('413', 'Kab. Jayawijaya');
INSERT INTO `m_kota` VALUES ('414', 'Kab. Nabire');
INSERT INTO `m_kota` VALUES ('415', 'Kab. Paniai');
INSERT INTO `m_kota` VALUES ('416', 'Kab. Puncak Jaya');
INSERT INTO `m_kota` VALUES ('417', 'Kab. Mimika');
INSERT INTO `m_kota` VALUES ('418', 'Kab. Boven Digoel');
INSERT INTO `m_kota` VALUES ('419', 'Kab. Mappi');
INSERT INTO `m_kota` VALUES ('420', 'Kab. Asmat');
INSERT INTO `m_kota` VALUES ('421', 'Kab. Yahukimo');
INSERT INTO `m_kota` VALUES ('422', 'Kab. Pegunungan Bintang');
INSERT INTO `m_kota` VALUES ('423', 'Kab. Tolikara');
INSERT INTO `m_kota` VALUES ('424', 'Kab. Sarmi');
INSERT INTO `m_kota` VALUES ('425', 'Kab. Keerom');
INSERT INTO `m_kota` VALUES ('426', 'Kab. Waropen');
INSERT INTO `m_kota` VALUES ('427', 'Kab. Supiori');
INSERT INTO `m_kota` VALUES ('428', 'Kab. Memberamo Raya');
INSERT INTO `m_kota` VALUES ('429', 'Kab. Nduga Tengah');
INSERT INTO `m_kota` VALUES ('430', 'Kab. Lanny Jaya');
INSERT INTO `m_kota` VALUES ('431', 'Kab. Mamberamo Tengah');
INSERT INTO `m_kota` VALUES ('432', 'Kab. Yalimo');
INSERT INTO `m_kota` VALUES ('433', 'Kab. Puncak');
INSERT INTO `m_kota` VALUES ('434', 'Kab. Dogiyai');
INSERT INTO `m_kota` VALUES ('435', 'Kab. Deiyai');
INSERT INTO `m_kota` VALUES ('436', 'Kab. Intan Jaya');
INSERT INTO `m_kota` VALUES ('437', 'Kota Jayapura');
INSERT INTO `m_kota` VALUES ('438', 'Kab. Fak-Fak');
INSERT INTO `m_kota` VALUES ('439', 'Kab. Kaimana');
INSERT INTO `m_kota` VALUES ('440', 'Kab. Teluk Wondama');
INSERT INTO `m_kota` VALUES ('441', 'Kab. Teluk Bintuni');
INSERT INTO `m_kota` VALUES ('442', 'Kab. Manokwari');
INSERT INTO `m_kota` VALUES ('443', 'Kab. Sorong Selatan');
INSERT INTO `m_kota` VALUES ('444', 'Kab. Sorong');
INSERT INTO `m_kota` VALUES ('445', 'Kab. Kep. Raja Ampat');
INSERT INTO `m_kota` VALUES ('446', 'Kab. Tambrauw');
INSERT INTO `m_kota` VALUES ('447', 'Kab. Maybrat');
INSERT INTO `m_kota` VALUES ('448', 'Kota Sorong');

-- ----------------------------
-- Table structure for `m_marcendais`
-- ----------------------------
DROP TABLE IF EXISTS `m_marcendais`;
CREATE TABLE `m_marcendais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `redeem_poin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_marcendais
-- ----------------------------

-- ----------------------------
-- Table structure for `m_member`
-- ----------------------------
DROP TABLE IF EXISTS `m_member`;
CREATE TABLE `m_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit` int(11) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_identitas` enum('KTP','SIM','Passport') NOT NULL,
  `nomor_identitas` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `kontak` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `distrik` varchar(50) NOT NULL,
  `id_kota` int(11) DEFAULT NULL,
  `status` enum('Home Owner','Lessee') NOT NULL,
  `tgl_berlaku` date NOT NULL,
  `tgl_berakhir` date NOT NULL,
  `tgl_dibuat` datetime NOT NULL,
  `tgl_diubah` datetime NOT NULL,
  `is_active` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1500 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_member
-- ----------------------------
INSERT INTO `m_member` VALUES ('2', '2', 'IVAN HADI PUTRA', 'KTP', '3671010104950002', '0000-00-00', '', '', 'KOMP. MAHKOTA MAS BLOK P.5 NO.2 RT/RW 02/09', 'CIKOKOL', null, 'Home Owner', '2017-12-08', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('3', '3', 'SHEN YU', 'KTP', 'G27166717', '0000-00-00', '', '', 'APT 501, #45, 333 WU YANG EAST ROAD, ', 'JIADING DISTRICT, SHANGHAI', null, 'Home Owner', '2017-12-27', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('4', '4', 'HENDRIK EKO ANDI PUTRA DAN HEIDY KARTINI', 'KTP', '3173021004820012', '0000-00-00', '', '', 'APT. MEDITERANIA G.2 TWR.F-10-F/M RT 003 RW 005', 'KEL. TANJUNG DUREN SELATAN ', null, 'Home Owner', '2017-12-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('5', '5', 'ASTRI AYUNANI', 'KTP', '6471055911880006', '0000-00-00', '', '', 'BALIK PAPAN REGENCY BLOK FA S NO 23 ', 'BALIKPAPAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('6', '6', 'DAVID POLTAK SINAGA', 'KTP', '3172011001800029', '0000-00-00', '', '', 'BELMONT RESIDENCE TOWER EVREST LANTAI 23/2301 D', 'RT. 008/007', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('7', '7', 'FIRDAUS', 'KTP', '7106120513374', '0000-00-00', '', '', 'BOJONG RANGKONG NO. 48  RT/RW 007/003 ', 'KEL. PULO GEBANG KEC. CAKUNG ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('8', '8', 'ARMIDA NURCAHAYA MANURUNG', 'KTP', '3674024603780006', '0000-00-00', '', '', 'DUTA BINTARO BLOK A 1 / 25 SERPONG UTARA ', 'SERPONG UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('9', '9', 'ERVINA', 'KTP', '3671044610900002', '0000-00-00', '', '', 'DUTA GARDENIA BLOK F.9/14', 'RT 015/008 JURUMUDI BARU', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('10', '10', 'LAI CHANGYUAN', 'KTP', 'EA9115775', '0000-00-00', '', '', 'EQUITY TOWER, 42ND FLOOR SUDIRMAN CENTRAL BUSINESS DISTRICT', '(SCBD) LOT 9 JL. JENDRAL SUDIRMAN KAV. 52-53', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('11', '11', 'KANG ZHAOHUI', 'KTP', 'e20317921', '0000-00-00', '', '', 'EQUITY TOWER, 42ND FLOOR SUDIRMAN CENTRAL BUSINESS DISTRICT', '(SCBD) LOT 9 JL. JENDRAL SUDIRMAN KAV. 52-53', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('12', '12', 'LEI HUA', 'KTP', 'PE 0998390', '0000-00-00', '', '', 'EQUITY TOWER, 42ND FLOOR SUDIRMAN CENTRAL BUSINESS DISTRICT', '(SCBD) LOT 9 JL. JENDRAL SUDIRMAN KAV. 52-53, JAKA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('13', '13', 'LIU FENGYOU', 'KTP', 'G58108430', '0000-00-00', '', '', 'EQUITY TOWER, 42ND FLOOR SUDIRMAN CENTRAL BUSINESS DISTRICT', '(SCBD) LOT 9 JL. JENDRAL SUDIRMAN KAV. 52-53, JAKA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('14', '14', 'CAI ZHIQING', 'KTP', 'EA2999228', '0000-00-00', '', '', 'EQUITY TOWER, 42ND FLOOR SUDIRMAN CENTRAL BUSINESS DISTRICT', '(SCBD) LOT 9 JL. JENDRAL SUDIRMAN KAV. 52-53, JAKA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('15', '15', 'XIANG LI', 'KTP', 'E234124221', '0000-00-00', '', '', 'EQUITY TOWER, 42ND FLOOR SUDIRMAN CENTRAL BUSINESS DISTRICT ', ' (SCBD) LOT 9 JL. JENDRAL SUDIRMAN KAV. 52-53, JAK', null, 'Home Owner', '2018-02-08', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('16', '16', 'LI WEI DAVID', 'KTP', 'K03844210', '0000-00-00', '', '', 'FLAT B28, 1/F BLOCK B, PROFICIENT INDUSTRIAL CENTRE,', '6 WANG KWUN ROAD KOWLOON BAY, HONGKONG', null, 'Home Owner', '2018-01-05', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('17', '17', 'LI WEI DAVID', 'KTP', 'K03844210', '0000-00-00', '', '', 'FLAT B28, 1/F BLOCK B, PROFICIENT INDUSTRIAL CENTRE,', '6 WANG KWUN ROAD KOWLOON BAY, HONGKONG', null, 'Home Owner', '2018-01-05', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('18', '18', 'BILLY AUSTEN MANAKALANGI', 'KTP', '3603281607950001', '0000-00-00', '', '', 'GADING SERPONG SEKTOR 6A GB 2 36 RT/RW 002/004', 'CURUG SANGERENG KELAPA DUA ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('19', '19', 'ELLA SARTIKA', 'KTP', '3175035005920002', '0000-00-00', '', '', 'GANG BANTEN IX RT/RW 008/005', 'KEL. BALI MESTER KEC. JATINEGARA, JAKARTA TIMUR', null, 'Home Owner', '2018-02-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('20', '20', 'KRISTIAN OEYNEDY', 'KTP', 'KRISTIAN OEYNEDY', '0000-00-00', '', '', 'GG. DUKUH III/17', 'RT 004/007 TANJUNG DUREN UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('21', '21', 'DANIAL RIFKI', 'KTP', '3175030312820015', '0000-00-00', '', '', 'GG. PADESIN RT/RW : 016/010', 'KEL BIDARA CINA', null, 'Home Owner', '2017-12-08', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('22', '22', 'William Gani', 'KTP', '3172012105830009', '0000-00-00', '', '', 'Golf Lake Residence San Lorenzo 6 No 25', 'RT 002 RW 011', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('23', '23', 'MARTIN ADRIANUS', 'KTP', '3671082810900003', '0000-00-00', '', '', 'GRIYA SANGIANG MAS JL. ANGGREK V NO. 18 RT/RW 001/007', 'KEL. GEBANG RAYA KEC. PERIUK, TANGERANG', null, 'Home Owner', '2017-12-26', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('24', '24', 'SUWANDI', 'KTP', '94021205970541', '0000-00-00', '', '', 'HARAPAN INDAH BLOK P/14 RT 010/007, ', 'KEL. JELAMBAR BARU KEC. GROGOL PETAMBURAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('25', '25', 'WENDI', 'KTP', '3173042707900010', '0000-00-00', '', '', 'JL DURI BANGKIT RT/RW 010/009 KEL JEMBATAN BESI', 'KEC TAMBORA DKI JAKARTA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('26', '26', 'ERICK HERMAWAN', 'KTP', '3671082312890002', '0000-00-00', '', '', 'JL KS TUBUN RT 004/003 KOANG JAYA', 'KARAWACI TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('27', '27', 'SRIYOLA SEPTRIA LESTARI', 'KTP', '3173047009890002', '0000-00-00', '', '', 'JL MENTENG KECIL I NO 4A RT 010 RW 009 ', 'KEL KEBON SIRIH KEC MENTENG ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('28', '28', 'SI ANDI GUNAWAN', 'KTP', '3173041510820007', '0000-00-00', '', '', 'JL P. JAYAKARTA NO 68-C.19 RT 010 RW 010', 'KEL MANGGA DUA SELATAN KEC SAWAH BESAR', null, 'Home Owner', '2017-09-23', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('29', '29', 'STEVEN PHANG DRG', 'KTP', '0', '0000-00-00', '', '', 'JL PEMBANGUNAN II NO 52 B. GLUGUR DARAT II ', 'KOTA MEDAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('30', '30', 'WIDATO', 'KTP', '3173040811850011', '0000-00-00', '', '', 'JL SAMARASA I.C / 18 RT/RW 003/004 ', 'KEL ANGKE KEC TAMBORA ', null, 'Home Owner', '2017-09-24', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('31', '31', 'HENDRI', 'KTP', '3173011907950001', '0000-00-00', '', '', 'JL TAMAN PALEM LESTARI BLOK A 8 NO 32 RT 004 RW 016 ', 'CENGKARENG BARAT', null, 'Home Owner', '2017-12-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('32', '32', 'LIM CHORINA', 'KTP', '3172017005820001', '0000-00-00', '', '', 'JL TANAH PASIR NO. 37 RT/RW : 003/007', 'KEL PENJARINGAN', null, 'Home Owner', '2017-12-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('33', '33', 'KUSTARI TANDANU', 'KTP', '3173021804650005', '0000-00-00', '', '', 'JL TMN DAAN MOGOT III/2A RT/RW 001/001', 'KEL. TANJUNG DUREN UTARA ', null, 'Home Owner', '2017-12-08', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('34', '34', 'LIONG BERLY ALBERT', 'KTP', '3172011110830012', '0000-00-00', '', '', 'JL WALET INDAH 6 NO 32 RT/RW 014/006', 'KEL/DESA KAPUK MUARA KEC PENJARINGAN', null, 'Home Owner', '2017-12-08', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('35', '35', 'KENANGA MUTIARA', 'KTP', '367101560780003', '0000-00-00', '', '', 'JL. A. YANI NO. 24 RT. 004/005 ', 'KEL. SUKARASA KEC. TANGERANG, TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('36', '36', 'EKO MARTONO HALIM', 'KTP', '3172022303740012', '0000-00-00', '', '', 'JL. ANCOL SELATAN RT/RW 002/002', 'KEL. SUNTER AGUNG KEC. TANJUNG PRIOK', null, 'Home Owner', '2018-01-07', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('37', '37', 'SITI PRIHATIN', 'KTP', '3173074405860007', '0000-00-00', '', '', 'JL. ANDONG  RAYA NO 21 RT/RW 001/008', 'PALMERAH', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('38', '38', 'YOSEPH HALIM', 'KTP', '3173050607830001', '0000-00-00', '', '', 'JL. ANGSANA II GG. B / 15 RT/RW 011/005', 'KEL. KEBON JERUK KEC.', null, 'Home Owner', '2017-12-13', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('39', '39', 'FREDY LASTRIO & AURELIA KUSUMA ST.SE', 'KTP', '3173051204880006', '0000-00-00', '', '', 'JL. ANGSANA IV BLK D.5 NO.34 RT 013 RW 004', 'KEL. KEDOYA SELATAN KEC. KEBON JERUK, JAKARTA BARA', null, 'Home Owner', '2017-12-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('40', '40', 'FU KONG PHIN', 'KTP', '3271011607600008', '0000-00-00', '', '', 'JL. BATUTULIS GG AMIL NO.28 RT 002 RW 002 ', 'KEL. BATUTULIS KEC. KOTA BOGOR SELATAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('41', '41', 'SEPTIANA', 'KTP', '3175036009900008', '0000-00-00', '', '', 'JL. BEKASI TIMUR V RT 011/009', 'KEL. CIPINANG BESAR UTARA KEC. JATINEGARA, JAKARTA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('42', '42', 'DEWI', 'KTP', '3173015209950013', '0000-00-00', '', '', 'JL. BERDIKARI I RT 006 RW 001 ', 'KEL. KAPUK KEC. CENGKARENG, JAKARTA BARAT ', null, 'Home Owner', '2017-12-18', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('43', '43', 'BUDIHARJO SALIM', 'KTP', '3171072805860003', '0000-00-00', '', '', 'JL. G BLKG ALADIN NO. 1 F RT. 011/006', 'KEL. PEJAGALAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('44', '44', 'RENY CHRISTINA', 'KTP', '3171025905760006', '0000-00-00', '', '', 'JL. G RAYA NO. 28 RT/RW 002/007', 'KEL. KARANG ANYAR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('45', '45', 'RICHARD RUSLI', 'KTP', '3173040704900002', '0000-00-00', '', '', 'JL. GG. KOJA KEBON NO. 2-A RT 009/004', 'KEL. PEKOJAN KEC. TAMBORA, JAKARTA BARAT', null, 'Home Owner', '2017-12-08', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('46', '46', 'TANDIONO', 'KTP', '3671042007870003', '0000-00-00', '', '', 'JL. GLATIK RAYA BLOK C-2 ', 'NO. 12 PONDOK SEJAHTERA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('47', '47', 'BENNY', 'KTP', '3173010602840005', '0000-00-00', '', '', 'JL. JANUR KUNING II FEXT. 9/12 RT 007/015', 'KEL. DURI KOSAMBI KEC. CENGKARENG, JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('48', '48', 'SYLVIANA MICHICCO', 'KTP', '1502114111770001', '0000-00-00', '', '', 'JL. JELAMBAR UTAMA IV NO. 2 RT/RW 009/008', 'KEL. JELAMBAR KEC. GROGOL PETAMBURAN, JAKARTA BARA', null, 'Home Owner', '2017-12-11', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('49', '49', 'Ranto Rosmawati, SH', 'KTP', '3671095207780001', '0000-00-00', '', '', 'JL. Kalingga Raya No 12 RT 006 RW 016', 'Uwung Jaya', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('50', '50', 'MARKO SUCIADI CITAWAN', 'KTP', '1971040203870002', '0000-00-00', '', '', 'JL. KAPT. SURAIMAN ARIEF', 'RT 002/002 MASJID JAMIK ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('51', '51', 'FERRYADI WILLYANTO', 'KTP', '3173071604790004', '0000-00-00', '', '', 'JL. KEMANGGISAN ILIR VI NO.35 RT/RW:005/012', 'KEL.PALMERAH, KEC.PALMERAH, JAKARTA BARAT', null, 'Home Owner', '2017-12-08', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('52', '52', 'LITANTO ALAM K', 'KTP', '3671092910940002', '0000-00-00', '', '', 'JL. KENANGA VI BLOK D2 NO. 20', 'RT 006/006 UWUNG JAYA CIBODAS', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('53', '53', 'WILLY RUSDIAN UDIN', 'KTP', '3171020207590002', '0000-00-00', '', '', 'JL. MANGGA BESAR RAYA RT/RW 014/001', 'KEL. MANGGA DUA SELATAN KEC. ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('54', '54', 'MELIATI', 'KTP', '3172016407731002', '0000-00-00', '', '', 'JL. MOA NO. 55B', 'RT 010/012', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('55', '55', 'ATIK', 'KTP', '3172016908840005', '0000-00-00', '', '', 'JL. MUARA ANGKE RT/RW 013/011 ', 'KEL. PLUIT KEC. PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2018-02-17', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('56', '56', 'JESSICA GRACE', 'KTP', '3671015211900003', '0000-00-00', '', '', 'JL. P. RATU SELATAN BLOK C2/38 MDI RT/RW 003/001', 'KEL. KELAPA INDAH KEC. TANGERANG, TANGERANG', null, 'Home Owner', '2017-12-07', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('57', '57', 'ANDREW', 'KTP', '3173041004880011', '0000-00-00', '', '', 'JL. PADAMULYA IV NO.15 RT 008/008', 'KEL. ANGKE KEC. TAMBORA, JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('58', '58', 'LINDAWATY', 'KTP', '3172054412700003', '0000-00-00', '', '', 'JL. PADEMANGAN II GG. 15 RT/RW 001/003', 'KEL. PADEMANGAN TIMUR KEC.PADEMANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('59', '59', 'ANGGA PRAWIRA HADI', 'KTP', '3573040503880003', '0000-00-00', '', '', 'JL. PELT. SUJONO 14 RT. 001/002', 'KEL. CIPTOMULYO KEC. SUKUN, MALANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('60', '60', 'Novydiana', 'KTP', '3172016611870001', '0000-00-00', '', '', 'Jl. Pluit Raya No.8 Blok BI 012/007', 'Penjaringan', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('61', '61', 'FANDI WIJAYA', 'KTP', '1271012405860002', '0000-00-00', '', '', 'JL. PUSAT PASAR NO. 16 MEDAN RT/RW -/-', 'KEL. PUSAT PASAR KEC. MEDAN KOTA, MEDAN', null, 'Home Owner', '2018-02-19', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('62', '62', 'RICKY NANDA PRASETYA', 'KTP', '3674031711870006', '0000-00-00', '', '', 'JL. RAJAWALI II NLOK HD.9/21 BINJAY IX RT/RW 002/008', 'KEL. PONDOK PUCUNG KEC. PONDOK AREN, TANGERANG SEL', null, 'Home Owner', '2018-02-11', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('63', '63', 'FENDY CORNELIS', 'KTP', '3173021512880007', '0000-00-00', '', '', 'JL. RAWA KEPA 1 NO 618', 'TOMANG, GROGOL PETAMBURAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('64', '64', 'SELLY', 'KTP', '3172015609800002', '0000-00-00', '', '', 'JL. SENI BUDAYA V NO. 37 RT. 001/003', 'KEL. JELMABAR BARU KEC. GROGOL PETAMBURAN, JAKARTA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('65', '65', 'YAMIN TANUTAMA', 'KTP', '3173050802970005', '0000-00-00', '', '', 'JL. SURYA MUTIARA III/3 RT/RW 009/002', 'KEL. KEDOYA SELATAN KEC. KEDOYA', null, 'Home Owner', '2017-12-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('66', '66', 'MUHAMMAD ROMI', 'KTP', '3171070207880005', '0000-00-00', '', '', 'JL. TALI VII RT/RW 002/009', 'KEL. KOTA BAMBU SELATAN KEC. PALMERAH', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('67', '67', 'SIWA KUMAR', 'KTP', '3275081305750015', '0000-00-00', '', '', 'JL. TAMAN OSAKA NO. 97 LIPPO KARAWACI', 'BINONG', null, 'Home Owner', '2017-12-10', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('68', '68', 'FIFI LIDIAWATI, SE', 'KTP', '3173045005760004', '0000-00-00', '', '', 'JL. TANAH SEREAL RAYA, NO 6. RT/RW 012/011', 'KEL. TANAH SEREAL KEC. TAMBORA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('69', '69', 'DINDA PERMATASARI', 'KTP', '3671096211940001', '0000-00-00', '', '', 'JL. TERATAI V D-13 NO. 13 RT/RW 008/006', 'KEL. UWUNG JAYA KEC. CIBODAS, KOTA TANGERANG', null, 'Home Owner', '2018-02-12', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('70', '70', 'SRI MURNI', 'KTP', '3172015807800003', '0000-00-00', '', '', 'JLN RAWA BEBEK RT 001 RW 010 ', 'KEL PENJARINGAN KEC. PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('71', '71', 'ANDY', 'KTP', '3173022204840004', '0000-00-00', '', '', 'KEBON JERUK MANIS V RT 001 RW 010 ', 'KEL. KEBON JERUK KEC. KEBON JERUK, JAKARTA BARAT', null, 'Home Owner', '2017-12-10', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('72', '72', 'HELSA SULANDANAH', 'KTP', '3174055104890005', '0000-00-00', '', '', 'KEBON MANGGA II RT 002/003', 'CIPULIR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('73', '73', 'THEODORE SEPTIAN IRAWAN', 'KTP', '3173012609950003', '0000-00-00', '', '', 'KL KENANGAN II RT/RW 001/002', 'KEL. CENGKARENG BARAT KEC.CENGKARENG', null, 'Home Owner', '2017-12-08', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('74', '74', 'I KETUT FERY UTAMEYASA', 'KTP', '3603131202710002', '0000-00-00', '', '', 'KOMPLEK GARUDA BLOK B.1 NO. 81 RT/RW 003/014', 'KEL. KAMPUNG MELAYU TIMUR KEC. TELUK NAGA, KAB. TA', null, 'Home Owner', '2018-02-10', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('75', '75', 'PETRUS PIPIN HANDY', 'KTP', '3173012705750018', '0000-00-00', '', '', 'KOMPLEK MELATI LOKA BLOK H-12 NO 70', 'RT/RW 002/016 PAKUJAYA SERPONG UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('76', '76', 'MAYA MAHATMA PUTRI', 'KTP', '1371086505890002', '0000-00-00', '', '', 'KOMPRINDANG ALAM NO 46 RT/RW 003/003', 'KEL KOTA LUAR KEC PAUH', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('77', '77', 'KASMAN INDRA ATAN W', 'KTP', '3173010707640009', '0000-00-00', '', '', 'KOSAMBI BARU CEXT II/9', 'RT. 002/015 DURI KOSAMBI CENGKARENG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('78', '78', 'ANWAR TAMIHARJA', 'KTP', '3603131708650003', '0000-00-00', '', '', 'KP MELAYU TIMUR RT RW 002/010', 'KEC TELUK NAGA TANGERANG BANTEN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('79', '79', 'BILLY JUNIOR', 'KTP', '3173060704950003', '0000-00-00', '', '', 'KP MENCENG TM TORAM IV NO 31 ', 'JAKARTA ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('80', '80', 'ANTONIUS', 'KTP', '3671021503900003', '0000-00-00', '', '', 'KP. KEBONCAU RT 003 RW 004 ', 'KEL. JATAKE KEC. JATIUWUNG, TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('81', '81', 'SEPTIANDIKA PERMANA', 'KTP', '3603132409880006', '0000-00-00', '', '', 'KP. MELAYU TIMUR RT 001 RW 013 DUSUN', 'KEL. KAMPUNG MELAYU TIMUR KEC. TELUKNAGA, KAB. TAN', null, 'Home Owner', '2017-12-28', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('82', '82', 'Ade Supriatna', 'KTP', '83031205970614', '0000-00-00', '', '', 'KP. PLUIS RT/RW 001/014', 'KEL.GROGOL UTARA, KEC.KEBAYORAN LAMA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('83', '83', 'TJIE SENG LIE', 'KTP', '3173061809740009', '0000-00-00', '', '', 'KP. WADAS RT/RW 005/006', 'KEL. PEGADUNGAN KEC. KALIDERES', null, 'Home Owner', '2017-12-15', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('84', '84', 'WILLIAM STEFANUS', 'KTP', '3172010806850003', '0000-00-00', '', '', 'MUARA KARANG BOK Y 5 TIMUR NO 20', 'RT/RW 011/017 PLUIT PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('85', '85', 'ALBERT JONATHAN', 'KTP', '2171101902939003', '0000-00-00', '', '', 'ORCHID PARK BLOK C.1 NO 83 RT/RW 001/ 004', 'KEL. TAMAN BALOI KEC. BATAM KOTA, BATAM', null, 'Home Owner', '2018-01-16', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('86', '86', 'XIANG LI', 'KTP', 'E03555067', '0000-00-00', '', '', 'PANTAI INDAH KAPUK LAYAR NO. 8', 'PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2018-02-08', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('87', '87', 'XIANG LI', 'KTP', 'E03555067', '0000-00-00', '', '', 'PANTAI INDAH KAPUK LAYAR NO. 8', 'PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2018-02-08', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('88', '88', 'XIANG LI', 'KTP', 'E03555067', '0000-00-00', '', '', 'PANTAI INDAH KAPUK LAYAR NO. 8', 'PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2018-02-08', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('89', '89', 'XIANG LI', 'KTP', 'E03555067', '0000-00-00', '', '', 'PANTAI INDAH KAPUK LAYAR NO. 8', 'PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2018-02-08', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('90', '90', 'XIANG LI', 'KTP', 'E03555067', '0000-00-00', '', '', 'PANTAI INDAH KAPUK LAYAR NO. 8', 'PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2018-02-08', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('91', '91', 'XIANG LI', 'KTP', 'E03555067', '0000-00-00', '', '', 'PANTAI INDAH KAPUK LAYAR NO. 8', 'PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2018-02-08', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('92', '92', 'XIANG LI', 'KTP', 'E03555067', '0000-00-00', '', '', 'PANTAI INDAH KAPUK LAYAR NO. 8', 'PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2018-02-08', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('93', '93', 'XIANG LI', 'KTP', 'E03555067', '0000-00-00', '', '', 'PANTAI INDAH KAPUK LAYAR NO. 8', 'PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2018-02-08', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('94', '94', 'XIANG LI', 'KTP', 'E03555067', '0000-00-00', '', '', 'PANTAI INDAH KAPUK LAYAR NO. 8', 'PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2018-02-08', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('95', '95', 'XIANG LI', 'KTP', 'E03555067', '0000-00-00', '', '', 'PANTAI INDAH KAPUK LAYAR NO. 8', 'PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2018-02-08', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('96', '96', 'PANJI SURYO NUGROHO', 'KTP', '3372013009860004', '0000-00-00', '', '', 'PANULARAN RT 06/08 LAWEYAN ', 'SURAKARTA JAWA TENGAH', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('97', '97', 'SAFITRI', 'KTP', '3603116609800001', '0000-00-00', '', '', 'PD. SUKATANI PERMAI BLOK C 11/08 RT 006 RW 004', 'KEL. SUKATANI KEC. RAJEG, KABUPATEN TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('98', '98', 'HERMAN TASLIM', 'KTP', '3275082712810027', '0000-00-00', '', '', 'PERUM ESSENCE PARK BLOK A 3 NO 20 RT/RW 002/013', 'KEL. JATICEMPAKA KEC. PONDOK GEDE', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('99', '99', 'KENT HILMAN', 'KTP', '3515072810700003', '0000-00-00', '', '', 'PERUM MEGA ASRI B-153 RT/RW 038/008', 'KEL. LARANGAN KEC. ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('100', '100', 'RIKA VERONIKA', 'KTP', '3603235402790005', '0000-00-00', '', '', 'PERUM RENGGANIS RT/RW 001/012', 'KEL. RAWAKALONG KEC. GUNUNG SINDUR, KAB. BOGOR', null, 'Home Owner', '2017-12-11', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('101', '101', 'ASTRI MUTIARA SETYA', 'KTP', '3671016501870002', '0000-00-00', '', '', 'PINANG RANTI RT 001/001', 'KEL. PINANGRANTI KEC. MAKASAR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('102', '102', 'HUANG SHENG YU', 'KTP', 'Ea3590267', '0000-00-00', '', '', 'PLUIT TIMUR BLOK W.SEL/50\n005/009\nPLUIT', 'PLUIT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('103', '103', 'FITRIA NURJANAH', 'KTP', '3172015210851002', '0000-00-00', '', '', 'PONDOK ALAM PERMAI F.2/23 RT/RW 003/007', 'KEL. ALAM JAYA KEC. JATIUWUNG, KOTA TANGERANG', null, 'Home Owner', '2017-12-16', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('104', '104', 'RIZKI DWI YULIEANTO', 'KTP', '3671021607910001', '0000-00-00', '', '', 'PONDOK ALAM PERMAI L 7 NO 8-9 RT/RW 003/008', 'KEL. ALAM JAYA KEC.PRIUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('105', '105', 'MOSES HARAZAKI TELAUMBANUA', 'KTP', '3671052009960009', '0000-00-00', '', '', 'PORIS INDAH BLOK H NO. 92 RT/RW 003/002', 'KEL. CIPONDOH INDAH KEC. CIPONDOH', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('106', '106', 'ANDRIANA PEITER', 'KTP', '3173065401680005', '0000-00-00', '', '', 'PURI GARDENA 2 BLOK F3/2 RT/RW 005/014', 'KEL. PEGADUNGAN KEC. KALIDERES, JAKARTA BARAT', null, 'Home Owner', '2017-12-19', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('107', '107', 'VICTOR LESMANA', 'KTP', '3578032706810001', '0000-00-00', '', '', 'RUNGKUT ASRI BARAT 4/9 RT 002/012', 'KEL. RUNGKUT KIDUL KEC. RUNGKUT SURABAYA', null, 'Home Owner', '2017-12-19', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('108', '108', 'SANTI SANDRA WIDJAJA', 'KTP', '3671036805820004', '0000-00-00', '', '', 'SIMPRUG DIPORIS BLOK F4/30', 'TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('109', '109', 'FREDDY RINALDI, SE', 'KTP', '3674021312580001', '0000-00-00', '', '', 'SUTERA GARDENIA V/30 RT/RW 003/012', 'KEL. PONDOK JAGUNG KEC. SERPONG UTARA, TANGERANG S', null, 'Home Owner', '2018-02-11', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('110', '110', 'GALIH SURYA DWIPANTARA', 'KTP', '3674021708880006', '0000-00-00', '', '', 'SUTERA GARDENIA V/30 RT/RW 003/012', 'KEL.PONDOK JAGUNG KEC. SERPONG UTARA, KOTA TANGERA', null, 'Home Owner', '2018-02-18', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('111', '111', 'JONG ENDRA', 'KTP', '800412058142', '0000-00-00', '', '', 'TANGERANG', 'TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('112', '112', 'PAUL TJANDRA DJUANDA', 'KTP', '3172012410620003', '0000-00-00', '', '', 'TERS. BANDENGAN UTR. 95 BLOK C.10 RT/RW003/016', 'KEL. PEJAGALAN KEC. PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2017-12-13', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('113', '113', 'SETIO DARMAWAN', 'KTP', '3674012804780001', '0000-00-00', '', '', 'THE GREEN CLUSTER VINEYARD EB 9/6 RT/RW 016/006', 'KEL. CILENGGANG KEC. SERPONG, KOTA TANGERANG SELAT', null, 'Home Owner', '2018-02-23', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('114', '114', 'MALVIN RENDI SANDIGO', 'KTP', '3173011405860012', '0000-00-00', '', '', 'TMN PALEM LESTARI BLK D.1 NO. 1 E RT/RW 009/015', 'KEL. CENGKARENG BARAT KEC. CENGKARENG', null, 'Home Owner', '2017-12-25', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('115', '115', 'BRAM REANSON', 'KTP', '3173012910920003', '0000-00-00', '', '', 'TMN PALEM LESTARI BLK D.1 NO. 1 RT/RW 009/015', 'KEL. CENGKARENG BARAT KEC. CENGKARENG', null, 'Home Owner', '2018-01-03', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('116', '116', 'NURUL IPAH', 'KTP', '3173066010910009', '0000-00-00', '', '', 'TMN SURYA V BLOK 002/34 RT/RW 006/017', 'KEL. PEGADUNGAN KEC.KALIDERES', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('117', '117', 'NINA OKTIANTI', 'KTP', '3603126710830002', '0000-00-00', '', '', 'VILA TANGERANG ELOK BLOK D-4 NO 36 RT/RW 015/007', 'KEL.KUTA JAYA KEC. PASAR KEMIS,KAB.TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('118', '118', 'JAENI', 'KTP', '367108180370000', '0000-00-00', '', '', 'VILLA MUTIARA PLUIT BLOK D.7 NO. 20', 'RT 010 / 011, PERIUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('119', '119', 'ADRIAN SURYO HATMOJO', 'KTP', '3175032905830004', '0000-00-00', '', '', 'APARTMENT GADING NIAS RESIDENCE E/26/EA', 'KELAPA GADING', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('120', '120', 'MICHAEL BILLY SUSANTO', 'KTP', '3471102609870001', '0000-00-00', '', '', 'JL. BHAYANGKARA NO. 40 RT/RW 010/003', 'KEL.NGUPASAN KEC. GONDOMANAN, YOGYAKARTA', null, 'Home Owner', '2018-02-18', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('121', '121', 'OSCAR', 'KTP', '1209192402860001', '0000-00-00', '', '', 'SM RAJA GG RUKUN NO. 9', 'KEL. TEBING KISARAN KEC. KOTA KISARAN BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('122', '122', 'DAVID LIEM KIN SAN', 'KTP', '5171020906830001', '0000-00-00', '', '', 'JL. BADAK II A/8 DPSB R/LINK SUNGIANG SARI', 'KEL. SUMERTA KELOD KEC. DENPASAR TIMUR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('123', '123', 'HARRYANTO PRAMONO', 'KTP', '3273091206700003', '0000-00-00', '', '', 'JL. SULTAN TIRTAYASA NO 37\nRT/RW 008/005', '0', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('124', '124', 'BRIO PRAMANA BUDIONO', 'KTP', '3273122107900001', '0000-00-00', '', '', 'JLN PISCES NO 8, RT 004, RW 009 ', 'KEL.GEMURUH KEC.BATUNUNGGAL', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('125', '125', 'USMAN SIHOMBING', 'KTP', '3672072503730002', '0000-00-00', '', '', 'JL. BESI IV NO. 14 KOMP KS RT 004 RW 004', 'KEL. KOTABUMI KEC. PURWAKARTA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('126', '126', 'CRISTINE MAGDALENA BEE H.B', 'KTP', '3603174703720003', '0000-00-00', '', '', 'PERUMAHAN TAMAN UBUD LOKA BLOK 10/10', 'LIPPO KARAWACI, TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('127', '127', 'VELANCIUS PHILIP JOVIAN DAN HALIM JOVIAN', 'KTP', '3302242111900005 ', '0000-00-00', '', '', 'JL. GERILYA NO. 106', 'KEL. KARANGKLESEM KEC. PURWOKERTO SELATAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('128', '128', 'HAMAIDI', 'KTP', '2171091706860003', '0000-00-00', '', '', 'PASAR SUKARAMAI BLOK C NO 46. RT 005/008', 'KEL. BENGKONG INDAH. KEC. BENGKONG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('129', '129', 'SHOVIE AGUSTINE', 'KTP', '3275025108730023', '0000-00-00', '', '', 'JL. PEMUDA NO. 18 RT. 002/003 ', 'KEL. KRANJI KEC. BEKASI BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('130', '130', 'RATNA KEMALA SARI', 'KTP', '3275034405820036', '0000-00-00', '', '', 'JL. TOMAT BLOK B13', 'RT 001/015', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('131', '131', 'EMIR NGATIDJO', 'KTP', '3310081812700002', '0000-00-00', '', '', 'JL.RUSIA I BLOK G NO. 129 RT001/RW008', 'KEL. SERTAJAYA KEC. CIKARANG TIMUR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('132', '132', 'ANTON', 'KTP', '1275020604890004', '0000-00-00', '', '', 'PT PACINESIA CHEMICAL INDUSTRY JL MANIS II NO 9 ', 'ZONA INDUSTRI MANIS KM 8,5 ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('133', '133', 'CINTYA DEWI SUTJIPTO', 'KTP', '3578314409880001', '0000-00-00', '', '', 'BUKIT GOLF D I/28 RT. 008/009', 'KEL. SAMBIKEREP', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('134', '134', 'ELISABET, SE', 'KTP', '3201056507740002', '0000-00-00', '', '', 'JL. PAJAJARAN NO. 123 MEDITERANIA I SENTUL CITY RT 003/008', 'KEL. CIJAYANTI KEC. BABAKAN MADANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('135', '135', 'IRVAN', 'KTP', '3171081703870002', '0000-00-00', '', '', 'JL. Rawa Tengah No 5 RT 002 RW 006', 'Kel. Galur', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('136', '136', 'DEDY GUSTIANTO', 'KTP', '3201291308790005', '0000-00-00', '', '', 'KEBUN RAYA RESIDENCE BLOK W NO.7 RT.005/010 ', 'KEL. MEKARJAYA KEL. CIOMAS', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('137', '137', 'THOMAS PRAMONO HADI, MSI', 'KTP', '3175070402750008', '0000-00-00', '', '', 'APARTEMEN GREEN PARK VIEW TOWER E 849', 'RT. 001/005 DURI KOSAMBI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('138', '138', 'Dicky Wiryanto', 'KTP', '3173011307740015', '0000-00-00', '', '', 'Jalan Fajar Baru Selatan ', 'KEL. CENGKARENG TIMUR KEC. CENGKARENG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('139', '139', 'HENDHARTO', 'KTP', '3173012909790005', '0000-00-00', '', '', 'JL. SIANTAN 2 NO.30 RT/RW: 012/001', 'CENGKARENG BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('140', '140', 'SUKMA SEMADI', 'KTP', '3276050602850009', '0000-00-00', '', '', 'PERUM GRAHA PRIMA BLOK B NO 6 RT 004 RW 020', 'KEL. SUKAMAJU KEC. CILODONG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('141', '141', 'JULIUS HARRY DHAMO, SE', 'KTP', '3276030507690012', '0000-00-00', '', '', 'PERUM NUANSA ASRI D.15 RT 003 RW 011', 'KEL. CINANGKA KEC. SAWANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('142', '142', 'AGUS KARTADIPURA CHANDRA', 'KTP', '3273131708810008', '0000-00-00', '', '', 'GREEN LAKE RUKAN SENTRA NIAGA BLOK P/12 RT/RW:007/008', 'KEL. DURI KOSAMBI, KEC. ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('143', '143', 'SITIK', 'KTP', '3173024609570005', '0000-00-00', '', '', 'JL. JELAMBAR BARAT II E NO. 429-B', 'RT/RW 011/011 JELAMBAR BARU', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('144', '144', 'MARIATI YEO', 'KTP', '2101044111860002', '0000-00-00', '', '', 'KOMPLEK GREENVILLE BLOK X-64', 'KEL. DURI KEPA KEC. KEBUN JERUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('145', '145', 'RAMLI AMIR', 'KTP', '3173021506830002', '0000-00-00', '', '', 'TAMAN HARAPAN INDAH BLOK.R NO. 3 ', 'RT009/RW007 JELAMBAR BARU', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('146', '146', 'FRANSISCUS FADELI', 'KTP', '3171020102880001', '0000-00-00', '', '', 'APT PURI PARK VIEW TWR AA LT 20/05 RT/RW 009/005', 'KEL MERUYA UTARA KEMBANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('147', '147', 'ADI WARTAWINATA', 'KTP', '3173032812920003', '0000-00-00', '', '', 'JL TAMAN SARI A NO 1 TAMAN SARI', 'JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('148', '148', 'ANG, MEILINDA ANGRIANI', 'KTP', '3173046005850019', '0000-00-00', '', '', 'JL. KRENDANG TIMUR III/39 RT.004 RW.001', 'KEL. KRENDANG KEC. TAMBORA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('149', '149', 'DEDY', 'KTP', '3173012302840003', '0000-00-00', '', '', 'KAPUK RAYA NO. 76 RT 010 RW 001 ', 'KEL. KAPUK KEC. CENGKARENG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('150', '150', 'MULIANI SANTOSO', 'KTP', '3173016004640010', '0000-00-00', '', '', 'ANGSOKA UTAMA I.E 9/27 RT 001 RW 009', 'KEL. DURI KOSAMBI KEC. CENGKARENG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('151', '151', 'EDEN WIJAYA', 'KTP', '1872030802810001', '0000-00-00', '', '', 'APT MENARA LATUMENTEN TWR.D LT.2/DI RT/RW: 001/001', 'KEC. JELAMBAR BARU KEC. GROGOL PETAMBURAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('152', '152', 'KEVIN UTOMO', 'KTP', '7271012611890005', '0000-00-00', '', '', 'APT. SKY TLC TOWER ULUWATU UNIT U1211', 'RT/RW 007/017 KEL. KALIDERES KEC.', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('153', '153', 'WINIARTI', 'KTP', '317306610982007', '0000-00-00', '', '', 'CITRA 2 EXT BLOK BK 2/60 RT. 006/020', 'KEL. PEGADUNGAN KEC. KALIDERES', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('154', '154', 'ANDIKA KRISTANTO', 'KTP', '3173013107840004', '0000-00-00', '', '', 'CITRA 5 BLOK A2 NO.22 RT 002 RW 010', 'KEL. KAMAL KEC. KALIDERES', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('155', '155', 'EVAN LEONARDI RUSLIJANTO', 'KTP', '3173061008840015', '0000-00-00', '', '', 'CITRA GARDEN 1 BLOK A-9 NO 6 RT 014 RW 009  ', 'KEL. KALIDERES KEC. KALIDERES', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('156', '156', 'MELLISA JULIANA', 'KTP', '3173066707880003', '0000-00-00', '', '', 'CITRA GARDEN II BLOK G 4/21 RT. 008/019', 'PEGADUNGAN KALIDERES', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('157', '157', 'YUDI IRHAMSYAH', 'KTP', '3173066105970014', '0000-00-00', '', '', 'CITRA GARDEN V BLOK A4 NO 11 RT/RW 003/010', 'KEL.KAMAL KEC.KALIDERES', null, 'Home Owner', '2017-12-14', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('158', '158', 'HADI HAMDANI', 'KTP', '3173050207840004', '0000-00-00', '', '', 'DURI RAYA GANG MUSHOLAH 52 A RT002 RW 001 ', 'KEL. DURI KEPA KEC. KEBON JERUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('159', '159', 'ANITA', 'KTP', '3173024402890003', '0000-00-00', '', '', 'GG MANGGIS XVII/12 RT 09 RW 04, ', 'KEL. TANJUNG DUREN SELATAN KEC. GROGOL', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('160', '160', 'MARIA LOA', 'KTP', '3173044208880006', '0000-00-00', '', '', 'GG. SIAGA 2 NO.7 RT/RW : 009/004', 'ANGKE, TAMBORA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('161', '161', 'YUNITA', 'KTP', '3171046506880002', '0000-00-00', '', '', 'GREEN VILLE BLK.AT/12.A RT 007 RW 014 ', 'KEL. DURI KEPA KEC. KEBON JERUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('162', '162', 'HELEN WIDIAAWATI', 'KTP', '3173055201720006', '0000-00-00', '', '', 'GREEN VILLE BLOK AU 14 RT/RW : 07/14 ', 'KEL. DURI KEPA, KEC. KEBON JERUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('163', '163', 'RINA', 'KTP', '3173015902800007', '0000-00-00', '', '', 'JALAN BAMBU BETUNG V NOMOR 9 RT 006 RW 005', 'KEL. RAWA BUAYA KEC. CENGKARENG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('164', '164', 'YOHANES PAUWZHE PURNAMA', 'KTP', '3173051111840007', '0000-00-00', '', '', 'JALAN DUTA BUNTU NO 92. RT 016/RW 007', 'KEL.  DURI KEPA KEC. KEBON JERUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('165', '165', 'ANG NJUK HWA', 'KTP', '3173044504690007', '0000-00-00', '', '', 'JALAN KRENDANG TENGAH NOMOR 40 RT 009 RW 003', 'KEL. KRENDANG KEC. TAMBORA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('166', '166', 'NURIYATI', 'KTP', '3173044402920006', '0000-00-00', '', '', 'JALAN TANAH SEREAL VIII / WASPADA 1/24 RT 004 RW 012', 'KEL. TANAH SEREAL KEC. TAMBORA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('167', '167', 'LIE YULIA', 'KTP', '3173045107820001', '0000-00-00', '', '', 'JL ANGKE JAYA XIII GG. II NO.24 RT RW 010/005', 'KEL: ANGKE KEC: TAMBORA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('168', '168', 'AGUS EFFENDY', 'KTP', '3173052511810007', '0000-00-00', '', '', 'JL ANGSANA 4 NO 3 RT 015 RW 007', 'KEL DURI KEPA KEC KEBON JERUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('169', '169', 'DYTHIA SENDRATA', 'KTP', '3173070810820010', '0000-00-00', '', '', 'JL DAAN MOGOT ESTATE BLOK DA NO 2 RT 003 RW 015', 'KEL. KAPUK KEC. CENGKARENG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('170', '170', 'HARRY DARMAWAN', 'KTP', '3173022607810009', '0000-00-00', '', '', 'JL JANUR KUNING 1F EXT 7/9 ', 'KEL. DURI KOSAMBI KEC. CENGKARENG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('171', '171', 'WILLIAM LEONARDO SUNJAYA', 'KTP', '3173021008971001', '0000-00-00', '', '', 'JL JELAMBAR BARAT 111/B-7 RT 013 RW 011', 'KEL. JELAMBAR BARU KEC. GROGOL PETAMBURAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('172', '172', 'IVAN ANDRI HOLIM, S.KOM', 'KTP', '3173022902840002', '0000-00-00', '', '', 'JL JELAMBAR BARU RAYA NO. 29-B RT 004 RW 007', 'KEL. JELAMBAR KEC. GROGOL PETAMBURAN ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('173', '173', 'NG KHUEI SAN', 'KTP', '3173021303840005', '0000-00-00', '', '', 'JL JELAMBAR JAYA III GG P/26 C RT.009 RW.002 ', 'KEL. JELAMBAR BARU KEC. GROGOL PETAMBURAN ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('174', '174', 'HERNIWATY', 'KTP', '3173026410870002', '0000-00-00', '', '', 'JL JELAMBAR UTAMA 3 NO 26 RT 002 RW 008 ', 'KEL. JELAMBAR, KEC GROGOL PETAMBURAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('175', '175', 'CAIYUANTO KOSMAN', 'KTP', '3173022206830003', '0000-00-00', '', '', 'JL JELAMBAR UTAMA IX NO.13 RT/RW : 008/004', 'KEL. JELAMBAR BARU, KEC. GROGOL PETAMBURAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('176', '176', 'HAFANDI LUBIS', 'KTP', '3173050602710001', '0000-00-00', '', '', 'JL JERUK MANIS NOMER 30 RT 002 RW 010', 'KEL. KEBUN JERUK  KEC. KEBUN JERUK ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('177', '177', 'LIE HENDRI', 'KTP', '3173041302820003', '0000-00-00', '', '', 'JL TANAH SEREAL RAYA NO 8. RT 012/011. ', 'KEL. TANAH SEREAL KEC. TAMBORA ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('178', '178', 'EDI, S KOM', 'KTP', '3173020204780006', '0000-00-00', '', '', 'JL. DUKUH BARAT III/10 A RT 009 RW 007', 'KEL. TANJUNG DUREN UTARA, KEC. GROGOL PETAMBURAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('179', '179', 'YUDI KARTOLO SUSANTO', 'KTP', '3173052405900005', '0000-00-00', '', '', 'JL. GILI SAMPENG RT 009 RW 003', 'KEL. KEBON JERUK KEC. KEBON JERUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('180', '180', 'BUDI HARTONO', 'KTP', '3173023006760012', '0000-00-00', '', '', 'JL. GILIMANUK IV BLOK J1 NO. 12 RT. 006/017', 'KEL. KALIDERES KEC. KALIDERES', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('181', '181', 'EMILIA HALIM', 'KTP', '3173050909941001', '0000-00-00', '', '', 'JL. GREEN GARDEN BLOK N.5/25A RT RW 005/010', 'KEL: KEDOYA UTARA KEC: KEBON JERUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('182', '182', 'FRANKY YULIYANTO', 'KTP', '3374013107820001', '0000-00-00', '', '', 'JL. H MUHAMMAD RAHUM NO 162 RT 02/01 ', 'DURI KOSAMBI KEC CENGKARENG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('183', '183', 'EDDYSON TANIWAN', 'KTP', '1271032411910001', '0000-00-00', '', '', 'JL. JELAMBAR SELATAN IV NO. 42.A', 'RT. 004/004 JELAMBAR BARU', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('184', '184', 'JUNITA TANIWAN', 'KTP', '1271035406860001', '0000-00-00', '', '', 'JL. JELAMBAR SELATAN IV NO. 42-A', 'RT 004/004', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('185', '185', 'SYURI MARGARETH', 'KTP', '7174015909820001', '0000-00-00', '', '', 'JL. JELAMBAR UTAMA IV RT.009 RW.008 ', 'KEL. JELAMBAR GROGOL KEC. PETAMBURAN ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('186', '186', 'FREDY NYOMAN', 'KTP', '3173022511870010', '0000-00-00', '', '', 'JL. JELAMBAR UTARA A NO. 17 RT. 005/006', 'KEL. JELAMBAR BARU KEC. GROGOL PETAMBURAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('187', '187', 'ALBERT', 'KTP', '3173041210830011', '0000-00-00', '', '', 'JL. JEMBATAN ITEM NO. 33', 'RT 001/007 PEKOJAN TAMBORA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('188', '188', 'DENI ANDREAN', 'KTP', '3172051508860003', '0000-00-00', '', '', 'JL. KEBON JERUK XIV NO. 17 RT 002 RW 008', 'KEL. MAPHAR KEC. TAMAN SARI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('189', '189', 'ISKANDAR MUDA', 'KTP', '3173052802620008', '0000-00-00', '', '', 'JL. KEDOYA RAYA NO. 45 B RT 003 RW 002', 'KEL. KEDOYA SELATAN KEC. KEBON JERUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('190', '190', 'I KETUT ADI PUTRA', 'KTP', '3173032607890001', '0000-00-00', '', '', 'JL. KEMURNIAN IV NO 38 A. RT 015 RW 001 ', 'KEL. GLODOK KEC. TAMAN SARI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('191', '191', 'SHIRLEY JULISA WIDJAYA', 'KTP', '3173035607810001', '0000-00-00', '', '', 'JL. KEMURNIAN UTARA NO.6, RT/RW: 012/001', 'KEL. GLODOK KEC. TAMAN SARI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('192', '192', 'LINTJE WINARNI', 'KTP', '3173066801740007', '0000-00-00', '', '', 'JL. LINGKUNGAN III RT 003 RW 003', 'KEL. TEGAL ALUR KEC. KALI DERES', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('193', '193', 'WIWIN SETIAWAN', 'KTP', '3173085709860004', '0000-00-00', '', '', 'JL. MERUYA SELATAN RT 007 RW 004', 'KEL. MERUYA SELATAN KEC. KEMBANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('194', '194', 'ELLIOT NOVERANCIA', 'KTP', '3173060911830008', '0000-00-00', '', '', 'JL. PALAPA BLOK I-3 NO. 20', 'RT 009/006', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('195', '195', 'EFFENDY GUNAWAN', 'KTP', '3173032008660001', '0000-00-00', '', '', 'JL. PANCORAN V NO. 7 RT. 008/002', 'KEL. GLODOK KEC. TAMAN SARI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('196', '196', 'DR MERLIN RAHARJO', 'KTP', '3173036006700001', '0000-00-00', '', '', 'JL. PECAH KULIT DALAM NO.8 RT 004/001. ', 'KEL. PINANGSIA KEC. TAMANSARI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('197', '197', 'RENDY WIRYADINATA', 'KTP', '3173021203870002', '0000-00-00', '', '', 'JL. PROF DR. LATUMENTEN VI GG.2 NO.22A RT/RW 011/006', 'KEL. JELAMBAR KEC. GROGOL PETAMBURAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('198', '198', 'JONA NG', 'KTP', '3173084803800001', '0000-00-00', '', '', 'JL. PULAU  DAMAR IV D-10/27 RT 013 RW 009', 'KEL. KEMBANGAN UTARA KEC. KEMBANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('199', '199', 'RAJA PUTRA KLAUDIUS MANURUNG', 'KTP', '3173085402600001', '0000-00-00', '', '', 'JL. PULAU TIDUNG XII BLK B-5/29\nRT/RW : 017/009\nKEMBANGAN UTARA\nJAKARTA BARAT', 'KEMBANGAN', null, 'Home Owner', '2018-02-26', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('200', '200', 'YUSEN', 'KTP', '3173042405870009', '0000-00-00', '', '', 'JL. SAMARASA RT. 011/005 ', 'KEL. ANGKE KEC. TAMBORA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('201', '201', 'SRI MULIATI', 'KTP', '3173044611880005', '0000-00-00', '', '', 'JL. SAWAH LIO 1 NO. 19 RT 007 RW 006', 'KEL. JEMBATAN LIMA KEC. TAMBORA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('202', '202', 'LUSIANA', 'KTP', '3173035607790001', '0000-00-00', '', '', 'JL. TANAH SEREAL XII FFI NO.9 RT003/RW011', 'KEL. TANAH SEREAL KEC. TAMBORA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('203', '203', 'TJHI NJAN FO', 'KTP', '3173010110710002', '0000-00-00', '', '', 'JL. WARU VIII NO.7 RT 014 RW 009', 'KEL. KAPUK KEC. CENGKARENG ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('204', '204', 'DRS. DEDEN AHMAD SARJANA', 'KTP', '3173071103680009', '0000-00-00', '', '', 'JL. Z NO. 22A RT/RW 011/002 ', 'KEL. SLIPI KEC. ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('205', '205', 'TINI SABRINA PRATAMANINGTYAS', 'KTP', '3173075607841001', '0000-00-00', '', '', 'JL.BRIGJEN KATAMSO RT 003 RW 007 ', 'KEL.KOTA BAMBU SELATAN KEC. PALMERAH', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('206', '206', 'LIM ENG SHIA/SUMARNO', 'KTP', '3173051307550006', '0000-00-00', '', '', 'JL.KEDOYA RAYA BLOK BB/1 RT. 002 RW. 007  ', 'KEL. KEDOYA UTARA KEC. KEBON JERUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('207', '207', 'LUSIANA', 'KTP', '3173035607790001', '0000-00-00', '', '', 'JL.TANAH SEREAL XII FFI NO.19 RT003/RW011', 'KEL.TANAH SEREAL. KEC TAMBORA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('208', '208', 'ERNY', 'KTP', '3173015612810007', '0000-00-00', '', '', 'JLN BOJONG RAYA 007/004', 'KEL. RAWA BUAYA KEC. CENGKARENG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('209', '209', 'ANDRE', 'KTP', '3173082311920005', '0000-00-00', '', '', 'KB JERUK INDAH BLOK F/6', 'RT. 008/007 SRENGSENG KEMBANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('210', '210', 'SANTY', 'KTP', '3173054807700008', '0000-00-00', '', '', 'KEBON JERUK BARU BLOK A 7 NO. 5 RT 004 RW 008', 'KEL. KEBON JERUK KEC. KEBON JERUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('211', '211', 'LINA', 'KTP', '3173056005810008', '0000-00-00', '', '', 'KEDOYA RAYA NO 11 RT 009 RW 007', 'KEL. KEDOYA UTARA KEC. KEBON JERUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('212', '212', 'SANTOSO HADI', 'KTP', '3173070503860002', '0000-00-00', '', '', 'KEMANGGISAN ILIR VI RT 009/012', 'KEL. PALMERAH, KEC. PAL MERAH', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('213', '213', 'DAVIN HIDAYAT WIRAWAN', 'KTP', '3173050204870003', '0000-00-00', '', '', 'KEPA DURI MAS BLOK OO/9 RT. 001/004', 'KEL. DURI KEPA KEC. KEBON JERUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('214', '214', 'NENA ANGGRAHITANINGTYAS', 'KTP', '3173025304860001', '0000-00-00', '', '', 'KOMP. RS JIWA JAKARTA NO.19 RT/RW : 001/004', 'KEL. JELAMBAR, KEC. GROGOL PETAMBURAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('215', '215', 'SALMA SYARIFAH', 'KTP', '3173065104880013', '0000-00-00', '', '', 'KOMPLEK KODAM JAYA K2/130, RT/RW: 007/005, ', 'KEL. KALIDERES, KEC. KALIDERES', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('216', '216', 'MICHAEL SETIAWAN', 'KTP', '3173082305890004', '0000-00-00', '', '', 'KOMPLEK UNILEVER B 1/24 RT/RW 001/009', 'KEL.  MERUYA SELATAN KEC. KEMBANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('217', '217', 'CHRISTIAN TOK', 'KTP', '3173042910850004', '0000-00-00', '', '', 'KOSAMBI BARU JL. KEMUNING HIJAU 5 BLOK A8 NO. 15', 'RT 003/010 CENGKARENG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('218', '218', 'HERMAN', 'KTP', '3172010907750015', '0000-00-00', '', '', 'MUTIARA TAMAN PALEM BLOK C 5 NO 16 RT/RW 006/014 ', 'KEL. CENGKARENG TIMUR KEC. CENGKARENG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('219', '219', 'RONNY WUISAN', 'KTP', '31730505720021', '0000-00-00', '', '', 'PERUMAHAN PURI MANSION UNIT: HAWAI RAYA 15', 'JORR WEST PURI, JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('220', '220', 'KEVIN YOHANES', 'KTP', '3173011003880012', '0000-00-00', '', '', 'PURI GARDENA BLOK C-1/22 RT 003 RW 014', 'KEL.PEGADUNGAN KEC. KALIDERES', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('221', '221', 'NOORJATI HADI', 'KTP', '3173026010590001', '0000-00-00', '', '', 'RAWA KEPA NO. 21 RT/RW:03/05, ', 'KEL. TOMANG KEC. GROGOL PETAMBURAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('222', '222', 'SAMUEL R LUMENTUT', 'KTP', '3173083108800003', '0000-00-00', '', '', 'TAMAN ALFA INDAH BLOK B 14/26. RT 011/007. JOGLO, KEMBANGAN. ', '0', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('223', '223', 'JULIUS DONNY', 'KTP', '3173050207870001', '0000-00-00', '', '', 'TAMAN COSMOS BLOK G/59 RT 012 RW 007', 'KEL. KEDOYA UTARA KEC. KEBON JERUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('224', '224', 'RUSLY AMIR', 'KTP', '3173020606850003', '0000-00-00', '', '', 'TAMAN HARAPAN INDAH BLOK G-II NO. 21 RT. 004 RW 007', 'KEL. JELAMBAR BARU KEC. GROGOL PETAMBURAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('225', '225', 'LINASWATI', 'KTP', '3173084811610008', '0000-00-00', '', '', 'TAMAN KEBON JERUK D-7', 'KEL. MERUYA SELATAN KEC. KEMBANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('226', '226', 'YULIUS SUSANTO SALINATA', 'KTP', '3173051807820003', '0000-00-00', '', '', 'TAMAN RATU BLOK D 2/12 RT 006/ RW 013 ', 'KEL. DURI KEPA KEC. KEBUN JERUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('227', '227', 'WIWIN SULAIMAN', 'KTP', '3171026901910005', '0000-00-00', '', '', 'TAMAN SEMANAN INDAH BLOK D 3/5 RT 008 RW 012', 'KEL. SEMANAN KEC. KALIDERES', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('228', '228', 'ERO INDAHWATI', 'KTP', '3173015504810021', '0000-00-00', '', '', 'TAMAN SEMANAN INDAH BLOK H8 NO.5 RT/RW:015/012', 'KEL. SEMANAN KEC. KALIDERES', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('229', '229', 'KANG MELISA TANDIANTO', 'KTP', '3578277003830001', '0000-00-00', '', '', 'TAMAN SURYA 2 BLOK C 3 NO 25 RT/RW : 006 / 015, PEGADUNGAN, KALIDERES', 'KEL.PEGADUNGAN KEC.KALIDERES', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('230', '230', 'MEISKE MEITA PAAT', 'KTP', '3173016405760001', '0000-00-00', '', '', 'THE GREEN COURT RESIDENCE, DANAU BATUR NO. 9', 'KEL. CENGKARENG TIMUR KEC. CENGKARENG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('231', '231', 'HARYANTO', 'KTP', '94021205970541', '0000-00-00', '', '', 'TM HARAPAN INDAH BLOK P/14 RT 010/007 ', 'JELAMBAR BARU ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('232', '232', 'SUCY SUSANTO', 'KTP', '3173016607660003', '0000-00-00', '', '', 'TMN PALEM LESTARI BLOK A3 NO 8 RT 008 RW 016', 'KEL. CENGKARENG BARAT KEL. CENGKARENG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('233', '233', 'ERIC YUDO', 'KTP', '3173030303860001', '0000-00-00', '', '', 'TZU CHI CENTER TOWER 2 LT. 6 JL.PANTAI INDAH KAPUK BOULEVARD', 'PANTAI INDAH KAPUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('234', '234', 'HENDRY', 'KTP', '3173021905880003', '0000-00-00', '', '', 'UTAMA SAKTI RAYA NO 15 RT.003/007', '0', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('235', '235', 'STEVEN', 'KTP', '3173051711880006', '0000-00-00', '', '', 'VILLA TOMANG MAS C19 RT004/011', 'KEL. DURI KEPA KEC. KEBON JERUK ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('236', '236', 'SANNITA ANGGRAENI ATMADJA', 'KTP', '3173065403670004', '0000-00-00', '', '', 'CITRA GARDEN 2 BLOK  C NO 2/2 RT 003 RW 019', 'KEL. PEGADUNGAN KEC. KALIDERES. ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('237', '237', 'IWAN HALIM', 'KTP', '3173050605750004', '0000-00-00', '', '', 'JL. PALMA RAYA BLK E 8/21 ', 'RT. 016/004', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('238', '238', 'ABDUR RAHMAN AFIFF', 'KTP', '3171072109550004', '0000-00-00', '', '', 'APT SUDIRMAN PARK A/41 AB RT 011 RW 009', 'KEL. KARET TENGSIN KEC. TANAH ABANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('239', '239', 'LOE SOVYA', 'KTP', '3171024701750002', '0000-00-00', '', '', 'JALAN BUDI RAHAYU RT/RW 013/009', 'KEL. MANGGA DUA SELATAN KEC. SAWAH BESAR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('240', '240', 'FERRY FONGER', 'KTP', '1271031204810006', '0000-00-00', '', '', 'JL AIPDA KS TUBUN NO. 45 RT 003 RW 002', 'KEL. PETAMBURAN KEC. TANAH ABANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('241', '241', 'HALIM SUGIARTO', 'KTP', '3571021611850002', '0000-00-00', '', '', 'JL KARTINI IV DALAM NO. 2. ', 'KEL. KARTINI. KEC. SAWAH BESAR. ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('242', '242', 'GANDHI KAHAR S.SOS', 'KTP', '0', '0000-00-00', '', '', 'JL MANGGA DUA DALAM RT 008/006 ', 'MANGGA DUA SELATAN KEC SAWAH BESAR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('243', '243', 'ABRAM YONATHAN', 'KTP', '3171011510910002', '0000-00-00', '', '', 'JL PETOJO SELATAN IV/21 RT 014/RW05', 'KELURAHAN PETOJO UTARA KEC GAMBIR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('244', '244', 'DANIEL PRASETIO', 'KTP', '3171021612880002', '0000-00-00', '', '', 'JL. BANDENGAN UTARA RAYA I NO. A6 RT 001/010', 'KEL. PEKOJAN KEC. TAMBORA, JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('245', '245', 'HONG GIOK WIBAWA', 'KTP', '3171034310650002', '0000-00-00', '', '', 'JL. BUNGUR BESAR 17/153', 'RT 001/004 GN SAHARI SELATAN, KEMAYORAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('246', '246', 'MARTHA MARYATI SULAIMAN', 'KTP', '3171024404900002', '0000-00-00', '', '', 'JL. DWIWARNA C NO: 9, RT/RW: 009/001,', ' KEL. KARTINI KEC. SAWAH BESAR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('247', '247', 'DESSY', 'KTP', '3172014912890007', '0000-00-00', '', '', 'JL. GARUDA NO 26I ', 'RT/RW 001/002 DESA KEMAYORAN KECAMATAN KEMAYORAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('248', '248', 'HANY WITARSA', 'KTP', '3173035601870002', '0000-00-00', '', '', 'JL. HAJI. SAMANHUDI NO.42 RTRW 005/003. ', 'KEL: PAS.BARU KEC:SW.BESAR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('249', '249', 'DR. H. IRFAN MAULANI', 'KTP', '3171042601790005', '0000-00-00', '', '', 'JL. KRAMAT SAWAH VI/5 RT 008 RW 002', 'KEL. PASEBAN KEC. SENEN ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('250', '250', 'NELLA SARI MUNAWAR.S.KOM', 'KTP', '3171065407700002', '0000-00-00', '', '', 'JL.MATRAMAN DALAM III\nRT 006 RW 007 KEL.PEGANGSAAN KEC.MENTENG', '0', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('251', '251', 'ANINDYA KINTAN PRADESTI', 'KTP', '3371024607860004', '0000-00-00', '', '', 'JL.PETOJO UTARA III/31 RT 003/003 ', 'KEL. PETOJO UTARA KEC. GAMBIR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('252', '252', 'MEWI NURWATY', 'KTP', '3174106706700005', '0000-00-00', '', '', 'CILEDUG RAYA / 12 A RT 002 RW 003 ', 'ULUJAMI KEC PESANGGRAHAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('253', '253', 'DAME SARI VALENTIN SILALAHI', 'KTP', '1208165402910005', '0000-00-00', '', '', 'JL PALEM 1 PALEM GARDENIA\nRT/RW : 006/008\nPETUKANGAN UTARA\nPESANGGRAHAN', 'KEL. PETUKANGAN UTARA KEC. PESANGGRAHAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('254', '254', 'BARRY PRATAMA', 'KTP', '3671116410880001', '0000-00-00', '', '', 'JL. PIRANHA NO. 30 RT. 002/006', 'KEL. KUNCIRAN INDAH KEC. PINANG, TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('255', '255', 'LOLA YESSY CHRISTINA', 'KTP', '3276026907810007', '0000-00-00', '', '', 'JL. PONDOK JAYA IV/12 RT. 004/006', 'KEL. PELA MAMPANG KEC. MAMPANG PRAPATAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('256', '256', 'LIE RUSTAM SABA', 'KTP', '3175030706560004', '0000-00-00', '', '', 'JL MERAH DELIMA 2 NO.14 RT 002 RW 011', 'KEL. CIPINANG CEMPEDAK KEC. JATINEGARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('257', '257', 'FERNANDO ARATANIO PINTO NURAK', 'KTP', '3175081907820017', '0000-00-00', '', '', 'JL. CAKRAWALA RT. 013/001', 'KEL. KEBON PALA KEC. MAKASAR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('258', '258', 'FLORA CHRISTINA MARPAUNG', 'KTP', '3175024412710001', '0000-00-00', '', '', 'JL. DUYUNG RAYA NO. B.5 RT 002 RW 008', 'KEL JATI KEC. PULOGADUNG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('259', '259', 'MICHAEL SOBANDI', 'KTP', '3175091811810007', '0000-00-00', '', '', 'JL. KARYA BHAKTI NO. I RT 008 RW 007', 'KEL. CIBUBU KEC. CIRACAS', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('260', '260', 'BAGAS ADHITYO SIDHARTA', 'KTP', '3175061703890004', '0000-00-00', '', '', 'KP. PISANGAN RT008/RRW003', 'KEL. PENGGILINGAN KEC. CAKUNG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('261', '261', 'MEITY PURNAMA SARI', 'KTP', '1671076405820013', '0000-00-00', '', '', 'APART. TELUK INTAN TWR. TOPAZ LT. 20-II', 'RT 010/013 KEL. PEJAGALAN ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('262', '262', 'PUJIANA JAUHARI', 'KTP', '3172016512880004', '0000-00-00', '', '', 'DUTA HARAPAN INDAH BLOK J NO 9 RT 007 RW 002 ', 'KEL KAPUK MUARA KEC PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('263', '263', 'YANTI', 'KTP', '3172014712790011', '0000-00-00', '', '', 'JELAMBAR FAJAR JL B NO. 8 RT 009 RW 017', 'KEL. PEJAGALAN KEC. PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('264', '264', 'ALDI TJANDRA KURNIAWAN', 'KTP', '3172011808840011', '0000-00-00', '', '', 'JELAMBAR FAJAR JL.U /19\nRT 001 / 017', 'KEL. PEJAGALAN KEC. PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('265', '265', 'HENDRA', 'KTP', '3172012305880003', '0000-00-00', '', '', 'JELAMBAR FAJAR NO. 80 RT 004/RW 006', 'KEL. PEJAGALAN KEC. PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('266', '266', 'JAYA DIMAN', 'KTP', '3172055301740001', '0000-00-00', '', '', 'JL AMPERA BESAR NO 21 RT 002 RW 009 ', 'KEL PADEMANGAN BARAT KEC PADEMANGAN', null, 'Home Owner', '2017-12-13', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('267', '267', 'RONALD WAROUW', 'KTP', '3172031310770013', '0000-00-00', '', '', 'JL DUKUH NO 14A RT 008 RW 017', 'KEL. LAGOA KEC, KOJA ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('268', '268', 'MUNADI', 'KTP', '3172010109730004', '0000-00-00', '', '', 'JL KERTAJAYA UJUNG NO. 52A - 55 RT 005 RW 015', 'KEL. PENJARINGAN KEC. PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('269', '269', 'MUNADI', 'KTP', '3172010109730004', '0000-00-00', '', '', 'JL KERTAJAYA UJUNG NO. 52A - 55 RT 005 RW 015', 'KEL. PENJARINGAN KEC. PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('270', '270', 'BONG DJAN BIE', 'KTP', '3172020707510003', '0000-00-00', '', '', 'JL PARADISE 13 THP II BLOK P/8 RT/RW 002/019', 'KEL SUNTER AGUNG KEC TANJUNG PRIOK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('271', '271', 'WILLEY EDISON', 'KTP', '3276026608820007', '0000-00-00', '', '', 'JL PLUIT RAYA BLOK B1 NO 8 RT 012 RW 007', 'KEL PENJARINGAN KEC PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('272', '272', 'SANTOSO SALIM', 'KTP', '3172010611630008', '0000-00-00', '', '', 'JL SINAR BUDI NO 35 RT/RW 006/003 ', 'PEJAGALAN KEC PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('273', '273', 'BONG SUSY ERIANTI', 'KTP', '3172014910750002', '0000-00-00', '', '', 'JL SUKARELA NO 18 A RT 009 RW 010', 'KE. PENJARINGAN KEC. PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('274', '274', 'TRIVIA', 'KTP', '3172016209820007', '0000-00-00', '', '', 'JL TELUK GONG RAYA NO 15 RT 006 RW 016', 'KEL. PEJAGALAN KEC. PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('275', '275', 'LINDAWATI', 'KTP', '3172055901820003', '0000-00-00', '', '', 'JL. BUDI MULIA NO 18 RT 013/ 010', 'PADEMANGAN BARAT KEC PADEMANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('276', '276', 'IGNATIUS PRAWIRA', 'KTP', '3172012806920005', '0000-00-00', '', '', 'JL. KERTAJAYA III RT. 010/014', 'PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('277', '277', 'YONATHAN OKKY WIJAYA', 'KTP', '3375020510830003', '0000-00-00', '', '', 'JL. MANYAR PERMAI 9 BLOK V7 NO. 1B RT 016 RW 006', 'KEL. KAPUK MUARA KEC. PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('278', '278', 'VITARIA', 'KTP', '3172055909820006', '0000-00-00', '', '', 'JL. PADEMANGAN III GG. 24 NO. 5 RT/RW 004/002', 'PADEMANGAN TIMUR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('279', '279', 'MUSA DIRGANTARA', 'KTP', '3172010107690011', '0000-00-00', '', '', 'JL. PLUIT UTARA IV NO.1 RT/RW 003005', 'KEL.PLUIT KEC.PENJARINGAN ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('280', '280', 'SUSANTO', 'KTP', '3172020405830009', '0000-00-00', '', '', 'JL. STR INDAH RAYA BLOK M 2 NO 2 RT 018 RW 010', 'KEL. SUNTER JAYA KEC. TANJUNG PRIOK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('281', '281', 'RYAN REEVES', 'KTP', '3671072411780007', '0000-00-00', '', '', 'KOMP RUKO LODAN CENTER BLOK C.6 RT/RW 001/001', 'KEL.ANCOL KEC.PADEMANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('282', '282', 'JULIYUS GAUTAMA', 'KTP', '3172013107900001', '0000-00-00', '', '', 'KP BARU KUBUR KOJA RT 004/015', 'PENJARINGAN ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('283', '283', 'RUDY SURJADI', 'KTP', '3172011803720007', '0000-00-00', '', '', 'MUARA KARANG BLOK D .X.U/15 RT 002 RW 013', 'KEL PLUIT KEC PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('284', '284', 'ANDRY EKA', 'KTP', '3172010911850001', '0000-00-00', '', '', 'MUARA KARANG BLOK K.5.T/14 RT 005/017', 'KEL. PLUIT KEC. PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('285', '285', 'WILLIAM', 'KTP', '3173030909880006', '0000-00-00', '', '', 'MUARA KARANG BLOK M9 U/53 RT 009 RW 015 ', 'KEL.PLUIT KEC.PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('286', '286', 'EDDY ESAPUTRA', 'KTP', '0', '0000-00-00', '', '', 'MUARA KARANG BLOK Z 5.S/14', 'RT/RW 011/017 KEL PLUIT KEC PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('287', '287', 'INDRA GOTAMA', 'KTP', '3172053000760001', '0000-00-00', '', '', 'PADEMANGAN 3 GG.8 N0.24 RT011/RW09', 'PADEMANGAN TIMUR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('288', '288', 'ADEPUTRA SALIM', 'KTP', '3172010603920004', '0000-00-00', '', '', 'PINISI PERMAI V NO 9 RT 005 RW 007', 'KEL. KAPUK MUARA KEC. PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('289', '289', 'CAROLINE', 'KTP', '3172015901860007', '0000-00-00', '', '', 'PLUIT TIMUR BLOK J. UTR / 9 RT 003 RW 009', 'KEL. PLUIT KEC. PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('290', '290', 'ILSA', 'KTP', '3173045604910005', '0000-00-00', '', '', 'RUSUN BLOK B LANTAI 4 NO 14 RT 002 RW 009 ', 'KEL KAPUK MUARA KEC. PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('291', '291', 'HENDY KURNIADIJAYA', 'KTP', '3172010807870011', '0000-00-00', '', '', 'TELUK GONG 3 NO.29 RT/RW 005/012', 'KEL.PENJAGALAN KEC. PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('292', '292', 'OEN NJOEK JIN', 'KTP', '3172016904510001', '0000-00-00', '', '', 'TELUK GONG GG. H NO. 10 RT 002 RW 006', 'KEL. PEJAGALAN KEC. PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('293', '293', 'HENDRY AFRIYANTHO', 'KTP', '3172012604920002', '0000-00-00', '', '', 'TELUK GONG JL D NO 266 A RT/RW 009/008 ', 'KEL PEJAGALAN KEC PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('294', '294', 'GOUW IWAN', 'KTP', '3172011507760002', '0000-00-00', '', '', 'TELUK GONG JLN.P NO.20 RT 011 RW 006', 'KEL. PEJAGALAN KEC. PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('295', '295', 'YORMAN', 'KTP', '0', '0000-00-00', '', '', 'TL GONG JL B2 BLOK A 4/31 RT/RW 002/013 ', 'PEJAGALAN KEC PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('296', '296', 'FANNY TANIATI', 'KTP', '3172016808860008', '0000-00-00', '', '', 'TPI II BLOK N NO 6 RT 014/015 ', 'KEL. PEJAGALAN,', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('297', '297', 'MIKAIL SANDHY LINGGA ATMAJA', 'KTP', '1571031112830021', '0000-00-00', '', '', 'JL MULAWARMAN NO 22 RT 017 KEL TALANG BANJAR JAMBI TIMUR KOTA JAMBI', 'RT. 017 TALANG BANJAR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('298', '298', 'NATANAEL SUGANDHA', 'KTP', '327703212880001', '0000-00-00', '', '', 'TAMAN CITEUREUP JL. NUSA SARI UTARA 1 NO. 11 RT. 006 RW. 001 ', 'KEL. CITEUREUP KEC. CIMAHI UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('299', '299', 'MANNIE', 'KTP', '3374020802790001', '0000-00-00', '', '', 'JL. BETON MAS RAYA B247-249. RT 002/007 ', 'KEL. PANGGUNG LOR KEC. SEMARANG UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('300', '300', 'YANG ZHE', 'KTP', 'E82263989', '0000-00-00', '', '', 'EQUITY TOWER, 42ND FLOOR SUDIRMAN CENTRAL BUSINESS DISTRICT ', '(SCBD) LOT 9 JL. JENDRAL SUDIRMAN KAV. 52-53, JAKA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('301', '301', 'SUWARDY YODO', 'KTP', '3515181304620004', '0000-00-00', '', '', 'JL PALEM TENGAH MA 77 RT 003 RW 008 ', 'KEL WADUNGASRI KEC. WARU', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('302', '302', 'FANNY NOVITA SOETIOSO', 'KTP', '3374026211840001', '0000-00-00', '', '', 'PONDOK JATI II RT 046 RW 011 ', 'KEL PAGERWOJO KEC BUDURAN ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('303', '303', 'HERMAN TJHANG', 'KTP', '6102150508820004', '0000-00-00', '', '', 'KP KAWARON GIRANG RT 003 RW 003', 'WANAKERTA KEC SINDANG JAYA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('304', '304', 'WUJUD RATNO', 'KTP', '3603120905660009', '0000-00-00', '', '', 'TAMAN KUTABUMI BLOK C KAV 12 NO 21', 'RT/RW 04/012 KEC PASAR KEMIS', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('305', '305', 'BUDI SANTOSO', 'KTP', '3509172409870001', '0000-00-00', '', '', 'JLN.DUSUN KRAJAN', 'RT. 002/001 KLOMPANGAN AJUNG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('306', '306', 'INAYATI AMINI', 'KTP', '3603035305920002', '0000-00-00', '', '', 'KP. KATOMAS RT 001 / 001', 'TIGA RAKSA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('307', '307', 'YANTO', 'KTP', '6112012004910004', '0000-00-00', '', '', 'JL. SUNGAI RAYA DALAM GG. CERIA 2 NO. 43 RT. 006/001', 'KEL. SUNGAI RAYA, KEC. SUNGAI RAYA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('308', '308', 'ELLY KARTINI', 'KTP', '1206076104820001', '0000-00-00', '', '', 'LINGK. VIII DARMA PSR 4', 'KEL. PERDAMAIAN KEC. STABAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('309', '309', 'NIGIANTO', 'KTP', '6102181211940002', '0000-00-00', '', '', 'JL. RAYA (KOMPLEK PASAR) RT/RW 010/003', 'KEL. SUNGAI BAKAU KECIL KEC. MEMPAWAH TIMUR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('310', '310', 'RIANTI HAMDANI', 'KTP', '7371075704870002', '0000-00-00', '', '', 'JALAN PERTAMA RUKO ASIA MILENIUM BLOK C1 NO 53-55 ', 'KEL BINIONG KEC CURUG ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('311', '311', 'KRISTINA ENDAH ADI PRAMONO', 'KTP', '3603175707860015', '0000-00-00', '', '', 'TAMAN PARAHYANGAN II/71 RT 001/001', 'KEL. BINONG, KEC. CURUG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('312', '312', 'YUDHISTIRA LIM', 'KTP', '3173062910660005', '0000-00-00', '', '', 'TMN SEMANAN INDAH BLOK E1 / 72', 'RT.013/012 SEMANAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('313', '313', 'ANGGI', 'KTP', '6202057005860002', '0000-00-00', '', '', 'PRUMNAS BUKIT PERMAI NO. 65 SAMPIT', 'BAAMANG WARINGIN TIMUR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('314', '314', 'ALWIN SUNARDI', 'KTP', '3172010912870004', '0000-00-00', '', '', 'JL JEMBATAN III NO 2 G RT 002 RW 016 KEL PENJARINGAN KEC PENJARINGAN JAKARTA UTARA', 'RT/RW 002/016 KEL PENJARINGAN ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('315', '315', 'ERI NUR WIDIANINGRUM', 'KTP', '3173084606740009', '0000-00-00', '', '', 'JL. MERUYA UTARA RT/RW: 005/010', 'KEL. MERUYA UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('316', '316', 'ERIC YUNARTA', 'KTP', '6104170203900003', '0000-00-00', '', '', 'JL. R. SUPRAPTO RT 021 RW 007', 'KEL. TENGAH KEC. DELTA PAWAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('317', '317', 'SUHENDRIK', 'KTP', '3603140806900005', '0000-00-00', '', '', 'VILLA TAMAN BANDARA F6/2', 'RT. 004/008 DADAP', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('318', '318', 'MARTIN', 'KTP', '3275032203940018', '0000-00-00', '', '', 'JALAN BAMBU RUNCING NO.3. RT 001/007.', 'KEL. MARGA MULYA KEC. BEKASI UTARA.', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('319', '319', 'JULIUS CHRISTIAN', 'KTP', '3271012607920012', '0000-00-00', '', '', 'JL. INTAN PAKUAN III NO. 4, TAJUR', 'RT. 002/007 PAKUAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('320', '320', 'HENDRA KUSUMA', 'KTP', '1173020205890002', '0000-00-00', '', '', 'JL SUKARAMAI NO 62\nKOTA LHOKSEUMAWE', 'KEL.KOTA LHOKSEUMAWE KEC. BANDA SAKTI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('321', '321', 'HENDRIK', 'KTP', '1273020911890001', '0000-00-00', '', '', 'JL. SANTEONG RT 000/000', 'KEL. PANCURAN GEROBAK, KEC. SIBOLGA KOTA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('322', '322', 'MICHELLE NH. STEFANNY VH,CYNTHIA CH', 'KTP', '3578265312950002', '0000-00-00', '', '', 'KERTAJAYA INDAH TIMUR X/12 RT/RW 005/010', 'KEL. MANYAR SABRANGAN, KEC. MULYOREJO', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('323', '323', 'KARMINI', 'KTP', '3573046104770008', '0000-00-00', '', '', 'JL. KLABAT NO.1 RT 001/006', 'PISANGCANDI, SUKUN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('324', '324', 'YUFONY CHANDRA', 'KTP', '7171036510720001', '0000-00-00', '', '', 'JL POGIDON RAYA LINGK 1 ', 'KEL. MAASING KEC. TUMINTING', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('325', '325', 'JONATHAN STEPHANUS', 'KTP', '1271101410740003', '0000-00-00', '', '', 'APARTEMEN GREEN BAY TOWER H LT. 21 UNIT BH RT/RW 008/010', 'KEL. PLUIT KEC. PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('326', '326', 'SURYANY', 'KTP', '1271106911800003', '0000-00-00', '', '', 'JL. PUKAT II NO. 61A MEDAN', '0', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('327', '327', 'STEVEN LIE', 'KTP', '3601120503740004', '0000-00-00', '', '', 'KP. MASJID TIMUR RT001/RW006', 'KEL. LABUAN KEC. LABUAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('328', '328', 'ANDRI', 'KTP', '7372032504700003', '0000-00-00', '', '', 'JL SURYA FATMAN MANGGU NO 15', 'RT 001/005 KEL KAMPUNG PISANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('329', '329', 'ANDRI', 'KTP', '7372032504700003', '0000-00-00', '', '', 'JL SURYA FATMAN MANGGU NO 15 ', 'RT/RW 001/005 KEC SOREANG KOTA PARE PARE', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('330', '330', 'EFFENDI', 'KTP', '3603120211830005', '0000-00-00', '', '', 'VILA REGENSI TNG II BLOK AB 05/02 RT 002/005', 'KEL. GELAM JAYA KEC. PASAR KEMIS', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('331', '331', 'IR. RICO NURDJAJA', 'KTP', '3514112010680009', '0000-00-00', '', '', 'PERUM BATUMAS D2/6', 'RT 004/001', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('332', '332', 'FACHRUL KAMAL', 'KTP', '1471062712650001', '0000-00-00', '', '', 'JL PATRIA SARI NO 33 RT/RW : 005/012', 'KEL. UMBAN SARI, KEC. RUMBAI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('333', '333', 'ASMINAWATY DJUNARY', 'KTP', '1272046512790003', '0000-00-00', '', '', 'JL. PANE NO. 15 E RT. 008/003', 'KEL. KARO KEC. SIANTAR SELATAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('334', '334', 'PUTRA WISATA', 'KTP', '1271011407860001', '0000-00-00', '', '', 'APARTEMEN GREAT WESTERN RESORT BLOK 3117', 'RT. 004/002 PANUNGGANGAN UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('335', '335', 'LASWIN PURNOMO', 'KTP', '1271140905850001', '0000-00-00', '', '', 'BANJAR WIJAYA CLUSTER ASIA BLOK B 30 NO 1C', 'RT. 001/006 CIPETE', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('336', '336', 'MUHAMMAD ANDIRA MULIA', 'KTP', '6171051708910011', '0000-00-00', '', '', 'JL H.M SUWIGNYO KOMP. CITRA INDAH I RT/RW 003/017', 'KEL DESA SUNGAI JAWI ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('337', '337', 'TJONG SUI TJIN ALIAS LINA', 'KTP', '6171035812600003', '0000-00-00', '', '', 'KOMP DUTA KALBAR INDAH C- 38', 'SUNGAI JAWI LUAR PONTIANAK BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('338', '338', 'TANNY FRANSISKA', 'KTP', '6171026303860006', '0000-00-00', '', '', 'KOMP GERBANG PERMATA ASRI E/12', 'RT 002 RW 014 DALAM BUGIS ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('339', '339', 'EMAN', 'KTP', '3603111702750005', '0000-00-00', '', '', 'JL NUANSA MEKARSARI A-1/25 RT/RW 002/006', 'KEL MEKARSARI KEC RAJEG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('340', '340', 'MEYLIANI TANJUNG', 'KTP', '3171025504910002', '0000-00-00', '', '', 'JL. KREKOT JAYA BLOK F NO.6 RT/RW:002/007', 'PASAR BARU', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('341', '341', 'FEBYA ACHMAD RIZKY', 'KTP', '3374152602910002', '0000-00-00', '', '', 'LINGKLEGO RT1/2 NGEMPON KEC. BERGAS,  KAB. SEMARANG', 'SEMARANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('342', '342', 'BUDI KUSUMA', 'KTP', '6172020610940003', '0000-00-00', '', '', 'JL. TANI GG NAGA SARI NO. 41 RT. 004/001', 'KEL. KUALA KEC. SINGKAWANG BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('343', '343', 'AULIA SHAHNAZ', 'KTP', '1674024412900004', '0000-00-00', '', '', 'JL. JENDRAL SUDIRMAN NO 12, RT 002/003,', 'KEL.  GUNUNG IBUL KEC. PRABUMULIH TIMUR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('344', '344', 'JHONNY SINAGA', 'KTP', '1208160405740004', '0000-00-00', '', '', 'JL. HARANGGAOL NO. 107', 'KEL. TIGA RAJA KEC. GIRSANG SIPANGAN BOLON', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('345', '345', 'CITRA DEWI', 'KTP', '1274016604880002', '0000-00-00', '', '', 'JLN. JEND SUDIRMAN NO 61 C LK. IV', 'KEL. TANJUNGBALAI KOTA I KEC. TANJUNGBALAI SELATAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('346', '346', 'INDAHWATI SUTJIPTO', 'KTP', '3578315105840001', '0000-00-00', '', '', 'BUKIT GOLF D I/28 RT. 008/009', 'KEL. SAMBIKEREP, KEC. SAMBI KEREP', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('347', '347', 'LIDYA SETYAWATI', 'KTP', '3578255907920001', '0000-00-00', '', '', 'RUNGKUT MENANGGAL HARAPAN BLOK O NO. 32 RT. 014/004', 'KEL.RUNGKUT MENANGGAL KEC.GUNUNG ANYAR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('348', '348', 'FRISCA PATRICIA FERIANTO', 'KTP', '3372026310910004', '0000-00-00', '', '', 'JL. DR. RAJIMAN 228 RT. 003/005', 'KEL. KEMLAYAM KEC. SERENGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('349', '349', 'JORDY STEFANO FERIANTO', 'KTP', '3372021712930002', '0000-00-00', '', '', 'JL. DR. RAJIMAN 228 RT. 003/005', 'KEL. KEMLAYAN KEC. SERENGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('350', '350', 'JHONSON ANGGAWIJAYA', 'KTP', '3173040902900002', '0000-00-00', '', '', 'JL PEKOJAN III GG. 3 NO.18', 'RT. 004/009 PEKOJAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('351', '351', 'ANTHONY JANUAR WIJAYA', 'KTP', '3173040701900001', '0000-00-00', '', '', 'JL. KAMPUNG JANIS NO. 37', 'RT. 007/009 PEKOJAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('352', '352', 'RUSTAM LIUS RIJAB', 'KTP', '841112193005', '0000-00-00', '', '', 'BANJAR WIJAYA KRISAN B67/27 RT 001 RW 010', 'KEL. CIPETE KEC. PINANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('353', '353', 'RORIA MARSITTA ULI L.S', 'KTP', '3603175002850006', '0000-00-00', '', '', 'BINONG PERMAI BLOK B 45 NO .17 RT 001 RW 004', 'KEL. BINONG KEC. CURUG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('354', '354', 'SUPARNO', 'KTP', '3603170406700001', '0000-00-00', '', '', 'BINONG PERMAI BLOK H-29/6 011/015 ', 'KEL. BINONG KEC. CURUG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('355', '355', 'SUPARNO', 'KTP', '3603170406700001', '0000-00-00', '', '', 'BINONG PERMAI BLOK H-29/6 011/015 ', 'KEL. BINONG KEC. CURUG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('356', '356', 'TJHANG SU KIAN', 'KTP', '3173046705680002', '0000-00-00', '', '', 'CITRA RAYA CLUSTER TAMAN RAYA', 'BLOK L1 NO.34', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('357', '357', 'NIKO MATIUS KURNIAWAN', 'KTP', '3671081301850002', '0000-00-00', '', '', 'GLOBAL MANSION BLOK A9 NO 10 L, RT 006 RW 014, ', 'KECAMATAN PERIUK KEL. PERIUK, ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('358', '358', 'MELKY SURYAWIJAYA', 'KTP', '3671010605900002', '0000-00-00', '', '', 'JL SAHAM NO 12. RT/RW 004/006. ', 'KEL. SUKASARI. KEC. TANGERANG.', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('359', '359', 'KHOUW NAI HIANG', 'KTP', '6171024405630007', '0000-00-00', '', '', 'JL. ASIA 7 NO. 38 RT 002 RW 008', 'KEL. PETIR KEC. CIPONDOH', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('360', '360', 'SEPTHEVEN LIM', 'KTP', '3671052709900004', '0000-00-00', '', '', 'JL. BUKIT GOLF VI OG 3/15 MODERNLAND. RT. 004. RW.014', 'DESA. PORIS PLAWAD. KEC. CIPONDOH', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('361', '361', 'DEDY LUKMANA', 'KTP', '3671092012940002', '0000-00-00', '', '', 'JL. DELTA VII NO. 276', 'RT. 005/006', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('362', '362', 'HUNTARY', 'KTP', '3671135602640004', '0000-00-00', '', '', 'JL. HOS COKROAMINOTO RT 007/009', 'KEL: LARANGAN INDAH KEC: LARANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('363', '363', 'ROGER LIM', 'KTP', '3603180604870015', '0000-00-00', '', '', 'JL. INDUSTRI RAYA III BLOK AC NO. 84, RT/RW: 009/002', 'KEL. BUNDER KEC. CIKUPA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('364', '364', 'ARIE WIJAYA', 'KTP', '3173042907880008', '0000-00-00', '', '', 'JL. KELAPA PUAN XIX BLOK AJ 5/5 RT 002 RW 012 ', 'KEL.PAKULONAN BARAT KEC. KELAPA DUA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('365', '365', 'BONG FREDDY SIMON', 'KTP', '3173041909640003', '0000-00-00', '', '', 'JL. SOEBANDI PABUARAN RESIDENT BLOK B6/1 RT. 002/005', 'KEL. MARGASARI, KEC. KARAWACI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('366', '366', 'HENDI SEPTIAN', 'KTP', '3671090409920003', '0000-00-00', '', '', 'JL. SULTAN AGUNG X NO 12 RT 006 RW 005', 'KEL. CIBODAS KEC. CIBODAS', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('367', '367', 'TRISNO WIDJAJA', 'KTP', '360328091270007', '0000-00-00', '', '', 'JL. TAMAN GOLF NO. 0070 LIIPO KARAWACI RT 007/008', 'KEL. BENCONGAN INDAH KEC. ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('368', '368', 'TRISNO WIDJAJA', 'KTP', '360328091270007', '0000-00-00', '', '', 'JL. TAMAN GOLF NO. 0070 LIIPO KARAWACI RT 007/008', 'KEL. BENCONGAN INDAH KEC. ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('369', '369', 'AGUNG DARMADI', 'KTP', '3671061309780004', '0000-00-00', '', '', 'JL. TANAH SERATUS. RT 005/009. ', 'KEL. SUDIMARA JAYA KEC. CILEDUG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('370', '370', 'MICHELLE CLARA LANDON', 'KTP', '3671135705910006', '0000-00-00', '', '', 'JL.HOS COKROAMINOTI RT 002 RW 009 ', 'KEL. LARANGAN INDAH KEC. LARANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('371', '371', 'HARMONO', 'KTP', '3671101106810001', '0000-00-00', '', '', 'KAMPUNG KARANG ANYAR RT/RW 004/002', 'KEL. KARANG ANYAR, KEC. NEGLASARI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('372', '372', 'KEVIN DANAR CENDANA', 'KTP', '3671120806930002', '0000-00-00', '', '', 'KARANG TENGAH PERMAI TA 1 NO 20 C', 'KEL. KARANG TIMUR, KEC. KARANG TENGAH', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('373', '373', 'BINSAR GOSEN', 'KTP', '3175082210780009', '0000-00-00', '', '', 'KOMP. RUMAH BAMBU NO. 66 RT 004 RW 008', 'KEL. KREO KEC. LARANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('374', '374', '#N/A', 'KTP', '3671022311900002', '0000-00-00', '', '', 'KP. PASIR RT 004 RW 003', 'KEL. PASIR JAYA KEC. JATIUWUNG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('375', '375', 'AGUSTIN SRIWINDARI', 'KTP', '3171015708860003', '0000-00-00', '', '', 'PERUM CIKUPA CLUSTER AGHATIS BLOK A3/12 ', 'KEL. PASIR GUDANG KEC. CIKUPA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('376', '376', 'NUR ASRIN FADLI', 'KTP', '3671062610760002', '0000-00-00', '', '', 'PERUM PALEM GANDA PERMAI BLOK B NO. 6 RT. 001/009', 'KEL. PANINGGILAN KEC. CILEDUG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('377', '377', 'SURYA DINATA', 'KTP', '3671050405730004', '0000-00-00', '', '', 'PORIS PARADISE I BC 2/30 RT 002 RW 010', 'KEL. CIPONDOH INDAH KEC. CIPONDOH', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('378', '378', 'TIMOTEUS', 'KTP', '3671054404780005', '0000-00-00', '', '', 'PURI METROPOLITAN BLOK B.7/05. RT 002/008. ', 'KEL. PETIR KEC. CIPONDOH. ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('379', '379', 'LINA', 'KTP', '3671056803790004', '0000-00-00', '', '', 'PURI METROPOLITAN BLOK E.3/46 RT 004 RW 008', 'KEL. PETIR KEC. CIPONDOH ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('380', '380', 'ERIK BUDI SETIAWAN', 'KTP', '3603171606850013', '0000-00-00', '', '', 'PURI NUSA KARAWACI BLOK N9 RT 001 RW 005', 'KEL. BINONG, KEC. CURUG ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('381', '381', 'DENNY DESTIAN', 'KTP', '3603172212820011', '0000-00-00', '', '', 'TAMAN PERMATA PARAHIAYANGAN NO. 39', 'KEL: BINONG kEC: CURUG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('382', '382', 'YULIE', 'KTP', '3671014107760001', '0000-00-00', '', '', 'TAMAN ROYAL 3 AKASIA 3 AS.23/50 RT 005 RW 015', 'KEL. TANAH TINGGI  KEC. TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('383', '383', 'AHMAD ROJALI', 'KTP', '3671052202700004', '0000-00-00', '', '', 'TAMAN ROYAL III BLOK A.3/9 RT 002 RW 007', 'KEL. PORIS PLAWAD UTARA KEC. CIPONDOH', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('384', '384', 'RICCO', 'KTP', '3603282403930007', '0000-00-00', '', '', 'TAMAN UBUD CEMPAKA BARAT 3/17 LIPPO KARAWACI', 'BINONG CURUG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('385', '385', 'WILLY EFFENDY', 'KTP', '3603230901810002', '0000-00-00', '', '', 'THE ICON COSMO BLOK D 7 NO.02 BSD CITY RT 006 RW 007', 'KEL. SAMPORA KEC. CISAUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('386', '386', 'TJHANG DJUN HO', 'KTP', '3603140705660003', '0000-00-00', '', '', 'VILLA TAMAN BANDARA M-7 NO. 14 ', 'RT.001 RW.009 DADAP KOSAMBI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('387', '387', 'JEMMY GO', 'KTP', '3671086906820003', '0000-00-00', '', '', 'VILLA TAMAN CIBODAS BLOK M2 NO 3 RT 005 RW 011 ', 'KEL SANGIANG JAYA KEC PERIUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('388', '388', 'JONATHAN', 'KTP', '3603122307930007', '0000-00-00', '', '', 'VILLA TOMANG BARU BLOK F-1/35 RT 001 RW 017', 'KEL. GELAM JAYA KEC. PASAR KEMIS', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('389', '389', 'ELISABETH SUTIONO', 'KTP', '3674026410700002', '0000-00-00', '', '', 'JL. SUTERA FLAMBOYAN UTAMA NO. 2A RT 004 RW 011', 'KEL. PONDOK JAGUNG KEC. SERPONG UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('390', '390', 'HELEN IRENE KURNIAWAN', 'KTP', '3674025309870002', '0000-00-00', '', '', 'KAMURANG ATAS RT RW 002/001 ', 'DESA PAKUALAM SERPONG UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('391', '391', 'SARMA RESMAS DHORA P', 'KTP', '780612191314', '0000-00-00', '', '', 'KOMP. YPK BLOK C/60 RT 58/06 JELUPANG', 'SERPONG UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('392', '392', 'MUHAMAD FADLI KESUMA JAYA', 'KTP', '3674060505920024', '0000-00-00', '', '', 'PAMULANG PERMAI II C16/8', 'RT 002/011', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('393', '393', 'MUHAMMAD RIZKI RINALDI', 'KTP', '3674030105860005', '0000-00-00', '', '', 'PERUM BINTARO MANSION NO. 8 RT. 005 RW. 001 ', 'KEL. PONDOK AREN KEC. PONDOK AREN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('394', '394', 'INDRAWANTI AGUS SUSILO', 'KTP', '3674024311660005', '0000-00-00', '', '', 'SUTERA JELITA III/1 RT 003/006', 'KEL.PONDOK JAGUNG TIMUR KEC.SERPONG UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('395', '395', 'ALBERT TANUMIHARDJA', 'KTP', '3674010505670006', '0000-00-00', '', '', 'THE GREEN MONTECARLO BLOK G.1/07', 'RT. 002/005 SERPONG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('396', '396', 'ANDY INDRAJAYA', 'KTP', '3674040102750009', '0000-00-00', '', '', 'VILLA DAGO TOL G.5 NO. 9 RT 002 RW 020', 'KEL. SERUA KEC. CIPUTAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('397', '397', 'FENNY ANGGRAINI', 'KTP', '2172015903920001', '0000-00-00', '', '', 'JL JAHAN II PERUM SARI INDAH BLOK D', 'NO 4  RT/RW 004/003 KAMPUNG BARU ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('398', '398', 'ANGGIE DWI SAVITRI', 'KTP', '3172054404900004', '0000-00-00', '', '', 'JL. ANCOL SELATAN NO.52A', 'RT. 019/001 SUNTER AGUNG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('399', '399', 'RACHMAT IDRIS', 'KTP', '3171070505760003', '0000-00-00', '', '', 'APT BATAVIA T.I/2805 JL KH MAS MANSYUR KV126 RT/RW 011/003', 'KEL. KARET TENGSIN KEC. TANAH ABANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('400', '400', 'ANDY SUCIPTO', 'KTP', '1571040412840021', '0000-00-00', '', '', 'APT PERMATA SURYA I TWR H 519 RT/RW 011/017', 'KEL. PEGADUNGAN KEC. KALIDERES ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('401', '401', 'FERDITIUS BERNARDUS', 'KTP', '367113012920002', '0000-00-00', '', '', 'BANJAR WIJAYA BLOK B 55 NO. 9 RT. 005/007', 'KEL. CIPETE KEC. PINANG, TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('402', '402', 'STEVILIA THAMWILYO', 'KTP', '3674015006790003', '0000-00-00', '', '', 'BSD BLOK RB 2/4 SEKTOR 1-1 RT 001/013', 'KEL. RAWA BUNTU KEC.SERPONG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('403', '403', 'Chrarensia Dewi, Pieter Gunawan', 'KTP', '3173067008800008', '0000-00-00', '', '', 'Citra 2 Ext Blok BB-3/3.A RT/RW 004/020', 'PEGADUNGAN ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('404', '404', 'RIEKE SETIAWAN', 'KTP', '3603186102900018', '0000-00-00', '', '', 'CITRA RAYA BLK. H 3 / 15 RT/RW 007/002', 'KEL. CIKUPA KEC. CIKUPA', null, 'Home Owner', '2017-12-07', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('405', '405', 'JULIUS', 'KTP', '3603181812850001', '0000-00-00', '', '', 'CLUSTER TRIMEZIA 8 NO.21 GADING SERPONG RT/RW 004/008', 'KEL.CURUG SANGERENG  KEC.KELAPA DUA', null, 'Home Owner', '2017-12-13', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('406', '406', 'WHILDAN MAHARDIKA', 'KTP', '3506060608900001', '0000-00-00', '', '', 'DSN TEMBORO 007/002 PLAOSAN WATES KEDIRI', 'TAMAN ALFA INDAH HI/29, JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('407', '407', 'MURYATIE', 'KTP', '3275016001700016', '0000-00-00', '', '', 'DUKUH ZAMRUD BLOK S-11/07', 'RT 008/011 PEDURENAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('408', '408', 'JUNITA', 'KTP', '3671065006830004', '0000-00-00', '', '', 'DUREN VILLAGE BLOK D5/11 RT 004/012', 'TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('409', '409', 'JANUAR RUSDI', 'KTP', '3603131101740002', '0000-00-00', '', '', 'DUTA BANDARA PERMAI BLOK IU-4 NO.42 RT 002 RW 011', 'KEL. JATI MULYA KEC. KOSAMBI, KAB. TANGERANG', null, 'Home Owner', '2018-02-16', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('410', '410', 'ADI PUTRA SETIAWAN', 'KTP', '3172010203900009', '0000-00-00', '', '', 'DUTA HARAPAN INDAH BLOK PP NO.2 RT 008 RW 002 ', 'KEL. KAPUK MUARA KEC. PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2018-02-10', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('411', '411', 'HAN XU', 'KTP', 'G48727888', '0000-00-00', '', '', 'EQUITY TOWER, 42ND FLOOR SUDIRMAN CENTRAL BUSINESS DISTRICT', '  (SCBD) LOT 9 JL. JENDRAL SUDIRMAN KAV. 52-53', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('412', '412', 'LIU KAI', 'KTP', 'E41273491', '0000-00-00', '', '', 'EQUITY TOWER, 42ND FLOOR SUDIRMAN CENTRAL BUSINESS DISTRICT', ' (SCBD) LOT 9 JL. JENDRAL SUDIRMAN KAV. 52-53, JAK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('413', '413', 'CHEN BOER', 'KTP', 'G42503869', '0000-00-00', '', '', 'EQUITY TOWER, 42ND FLOOR SUDIRMAN CENTRAL BUSINESS DISTRICT', '(SCBD) LOT 9 JL. JENDRAL SUDIRMAN KAV. 52-53', null, 'Home Owner', '2017-12-12', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('414', '414', 'KANG ZHAOHUI', 'KTP', 'E20317921', '0000-00-00', '', '', 'EQUITY TOWER, 42ND FLOOR SUDIRMAN CENTRAL BUSINESS DISTRICT', '(SCBD) LOT 9 JL. JENDRAL SUDIRMAN KAV. 52-53, JAKA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('415', '415', 'LI QING', 'KTP', 'E44299284', '0000-00-00', '', '', 'EQUITY TOWER, 42ND FLOOR SUDIRMAN CENTRAL BUSINESS DISTRICT', '(SCBD) LOT 9 JL. JENDRAL SUDIRMAN KAV. 52-53, JAKA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('416', '416', 'LAI CHANGYUAN', 'KTP', 'EA9115775', '0000-00-00', '', '', 'EQUITY TOWER, 42ND FLOOR SUDIRMAN CENTRAL BUSINESS DISTRICT', '(SCBD) LOT 9 JL. JENDRAL SUDIRMAN KAV. 52-53, JAKA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('417', '417', 'DENG YI QIANG', 'KTP', 'G57661608', '0000-00-00', '', '', 'EQUITY TOWER, 42ND FLOOR SUDIRMAN CENTRAL BUSINESS DISTRICT ', '(SCBD) LOT 9 JL. JENDRAL SUDIRMAN KAV. 52-53, JAKA', null, 'Home Owner', '2017-12-15', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('418', '418', 'CHEN CHAO', 'KTP', '565588670', '0000-00-00', '', '', 'EQUITY TOWER, 42ND FLOOR SUDIRMAN CENTRAL BUSINESS DISTRICT ', '(SCBD) LOT 9 JL. JENDRAL SUDIRMAN KAV. 52-53, JAKA', null, 'Home Owner', '2017-12-25', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('419', '419', 'SISILIA ANGELINA BONG', 'KTP', '3175057101690003', '0000-00-00', '', '', 'GG LAPAN II NO 3 RT 010 RW 001 ', 'KEL.PEKAYON, KEC.PASAR REBO', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('420', '420', 'ENDRIK', 'KTP', '3173042006810018', '0000-00-00', '', '', 'GG PONDOK TUAK II NO.20 RT 004 / RW 002', 'KEL. PINANGSIA KEC.TAMAN SARI', null, 'Home Owner', '2017-12-12', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('421', '421', 'INDRA WIJAYA', 'KTP', '3674033110930001', '0000-00-00', '', '', 'GG. SUKUN RT/RW 002/006', 'KEL. PONDOK KACANG TIMUR KEC. PONDOK AREN', null, 'Home Owner', '2018-02-26', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('422', '422', 'HO WIE CHUN', 'KTP', '3671052201830003', '0000-00-00', '', '', 'GRIYA PERMATA BLOK E.6/22 RT/RW 004/009', 'KEL. PETIR KEC. CIPONDOH, TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('423', '423', 'HUANG JINHUI', 'KTP', 'E86675334', '0000-00-00', '', '', 'GUANG DONG. CHINA', 'CHINA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('424', '424', 'SONG XINYI', 'KTP', 'EA5734412', '0000-00-00', '', '', 'GUANGDONG', 'CHINA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('425', '425', 'LIANG WENTAO', 'KTP', 'EB3316649', '0000-00-00', '', '', 'HUA XIA XING FU,5TH FLOOR NAN YIN BUILDING ,NO.2 DONG SAN ', 'HUAN BEI ROAD, CHAO YANG, BEIJING, CHINA', null, 'Home Owner', '2018-01-26', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('426', '426', 'LANNY, KHOE', 'KTP', '3171074510580004', '0000-00-00', '', '', 'JATI BUNDER II / 15 RT/RW 006/009', 'KEL. KEBON KACANG KEC. TANAH ABANG, JAKARTA PUSAT', null, 'Home Owner', '2017-12-17', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('427', '427', 'DEDDY PRAWIRO HAKKI', 'KTP', '3173041406800010', '0000-00-00', '', '', 'JL ANGKE JAYA NO 27 RT/RW 005/006', 'KEL. ANGKE KEC. TAMBORA', null, 'Home Owner', '2017-12-15', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('428', '428', 'SUGIARTO', 'KTP', '1171020805770002', '0000-00-00', '', '', 'JL DARMA NO 25 RT/RW 000/000', 'KEL. LAKSANA ', null, 'Home Owner', '2017-12-08', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('429', '429', 'YENTI GOHZALI', 'KTP', '1271086202850001', '0000-00-00', '', '', 'JL KARYA GGIDI II NO. 43 RT/RW 000/000', 'KEL. KARANG BEROMBAK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('430', '430', 'ANNISA NOVIA PERDANA', 'KTP', '6371024411900004', '0000-00-00', '', '', 'JL PRAMUKA KOMP RAHAYU PEMBINA III RIL 29  RT 023 RW 002', 'KEL SUNGAI LULUT KEC BANJARMASIN TIMUR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('431', '431', 'ARCHIED NOTO PRADONO', 'KTP', '3173081602720006', '0000-00-00', '', '', 'JL PULAU ANYER II NO 6 RT 006 RW 009 ', 'KEL KEMBANGAN UTARA KEC KEMBANGAN ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('432', '432', 'YANES Y MATULATUWA', 'KTP', '3173082108800006', '0000-00-00', '', '', 'JL PULAU PELANGI II NO 11 RT 003/009 KEL KEMBANGAN UTARA', 'KECAMATAN KEMBANGAN ', null, 'Home Owner', '2018-02-24', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('433', '433', 'SAMUEL SAMUDERA', 'KTP', '3173042611890005', '0000-00-00', '', '', 'JL TAVIP RAYA NO 1 RT 005 RW 014 KEL TANAH SEREAL', 'KEC TAMBORA ', null, 'Home Owner', '2017-12-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('434', '434', 'MARIO ALBERTUS KARAMOY', 'KTP', '3671091003860002', '0000-00-00', '', '', 'JL TMN TERATAI V B-12 NO 71 RT/RW 004/004', 'KEL. UWUNG JAYA ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('435', '435', 'MICHAELA VANIA SUTOKO', 'KTP', '3173054709920005', '0000-00-00', '', '', 'JL TRAPESIUM IV BLK A.3/6 RT 005 RW 007 ', 'KEL. KEBON JERUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('436', '436', 'MUHAMMAD GOGOD SUGIARTA', 'KTP', '3671082510900003', '0000-00-00', '', '', 'JL. ANGGGREK XIV BLOK L.5 NO.14 RT/RW:006/006', 'KEL.SANGIANG JAYA KEC.PERIUK, KOTA TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('437', '437', 'THIO TIAN GIOK', 'KTP', '3174020505670003', '0000-00-00', '', '', 'JL. ANGGREK VIII KART BELAKANG RT/RW 016/002', 'KEL. KUNINGAN KEC. SETIA BUDI, JAKARTA SELATAN', null, 'Home Owner', '2017-12-15', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('438', '438', 'DEDI KRISTIADI', 'KTP', '3603122812890001', '0000-00-00', '', '', 'JL. ANYELIR RAYA BLOK EN/14', 'RT 002/006', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('439', '439', 'ESTER WIDYA', 'KTP', '6171056103910007', '0000-00-00', '', '', 'JL. BUKIT BARISAN NO. 45 RT 002 RW 009 ', 'KEL. SUNGAI JAWI KEC. PONTIANAK KOTA, KOTA PONTIAN', null, 'Home Owner', '2018-02-25', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('440', '440', 'RICKY IRAWAN', 'KTP', '3671082410840003', '0000-00-00', '', '', 'JL. CEMPAKA II NO. 88 RT. 001/007', 'KEL. PERIUK JAYA KEC. PERIUK, TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('441', '441', 'YUNITA DWI ARYANI', 'KTP', '3173015403740003', '0000-00-00', '', '', 'JL. CENDRAWASIH RAYA/33 RT/RW 001/006', 'KEL.CENGKARENG BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('442', '442', 'Joshua Eric Christofel', 'KTP', '3671011212940001', '0000-00-00', '', '', 'JL. Damar VI/39 Taman Royal I ', 'RT 009 RW 015 Tanah Tinggi', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('443', '443', 'ARWIN SETIANANDA', 'KTP', '3203012005880001', '0000-00-00', '', '', 'JL. DR. MUWARDI NO. 17 RT/RW : 001/009', 'KEL. MUKA, KEC. CIANJUR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('444', '444', 'JULIANA BUNARTO', 'KTP', '3578125907830003', '0000-00-00', '', '', 'JL. H. KELIK B 25 PERMATA REGENCY RT/RW 001/006', 'KEL. SRENGSENG ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('445', '445', 'ESTER RITALENA', 'KTP', '3171024101890003', '0000-00-00', '', '', 'JL. Industri VIII/32C RT/RW 006/001', 'GUNUNG SAHARI UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('446', '446', 'JULIUS CHRISTIAN', 'KTP', '3271012607920012', '0000-00-00', '', '', 'JL. INTAN PAKUAN III/4 RT/RW 002/007', 'KEL. PAKUAN KEC. KOTA BOGOR SELATAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('447', '447', 'PAULA ANDRIANI', 'KTP', '3671014705820010', '0000-00-00', '', '', 'JL. IR. SUTAMI NO. 28/188 RT/RW 005/011', 'KEL. SUKASARI KEC. TANGERANG, TANGERANG', null, 'Home Owner', '2018-02-28', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('448', '448', 'ANTONIUS', 'KTP', '3173022902920003', '0000-00-00', '', '', 'JL. JELAMBAR BARAT III NO. 2G RT/RW 013/010', 'KEL. JELAMBAR BARU ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('449', '449', 'WONG TJIE TJIANG', 'KTP', '3603281610590002', '0000-00-00', '', '', 'JL. KELAPA LILIN UTARA UTARA II BLOK DF-4 NO. 48', 'KEL. KELAPA DUA KEC. KELAPA DUA, KAB. TANGERANG', null, 'Home Owner', '2017-12-08', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('450', '450', 'SULAEMAN', 'KTP', '3173051507760002', '0000-00-00', '', '', 'JL. KP. PEJUANGAN RT 003 RW 007 ', 'KEL. KEBON JERUK KEC. KEBON JERUK, JAKARTA BARAT', null, 'Home Owner', '2018-02-15', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('451', '451', 'HANSEN', 'KTP', '3173030109830003', '0000-00-00', '', '', 'JL. MANGGA BESAR IV P/42.BLK RT 010 / RW 005', 'KEL. TAMAN SARI KEC. TAMAN SARI, JAKARTA BARAT', null, 'Home Owner', '2017-12-05', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('452', '452', 'DESIH ERNA WATTIE', 'KTP', '3671084612790003', '0000-00-00', '', '', 'JL. MELTI II BLOK F.8 NO. 60 RT/RW 002/009', 'KEL. SANGIANG JAYA KEC. PERIUK, KOTA TANGERANG', null, 'Home Owner', '2018-02-25', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('453', '453', 'FERDY CHRISTIANDI', 'KTP', '3173052108921001', '0000-00-00', '', '', 'JL. MELUR NO. 46 RT/RW 001/006', 'KEL. KEBON JERUK KEC. KEBON JERUK, JAKARTA BARAT', null, 'Home Owner', '2018-02-23', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('454', '454', 'DESIANA', 'KTP', '1671136912910005', '0000-00-00', '', '', 'JL. MP. MANGKU NEGARA KOMP. TIRTA LESTARI INDAH RT. 003/001', 'KEL. 8 ILIR KEC. ILIR TIMUR II, PALEMBANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('455', '455', 'VANIA HARSONO', 'KTP', '3173014108930010', '0000-00-00', '', '', 'JL. NUSA INDAH C.EXT. 12/52 RT/RW 005/015', 'KEL. DURI KOSAMBI ', null, 'Home Owner', '2017-12-11', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('456', '456', 'CATHERINE HARTANTO', 'KTP', '3173067005810009', '0000-00-00', '', '', 'JL. P JAYAKARTA 135 RT 007 RW 010', 'KEL. MANGGA DUA SELATAN', null, 'Home Owner', '2017-12-04', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('457', '457', 'SUTRISNO', 'KTP', '3172050110720011', '0000-00-00', '', '', 'JL. PADEMANGAN II GG. XI NO. 37 B RT/RW 006/005', 'KEL. PADEMANGAN TIMUR KEC. PADEMANGAN, JAKARTA UTA', null, 'Home Owner', '2018-02-25', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('458', '458', 'ANWAR ARIFIN', 'KTP', '3671122102800003', '0000-00-00', '', '', 'JL. RADEN SALEH GG. H. ZAKARIA /2 RT. 002/002', 'KEL. KARANG MULYA KEC. KARANG TENGAH, TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('459', '459', 'MUN WAH', 'KTP', '3174100207840004', '0000-00-00', '', '', 'JL. RAYA SRENGSENG RT 004/006', 'KEL. SRENGSENG KEC. KEMBANGAN', null, 'Home Owner', '2018-02-17', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('460', '460', 'GIANTO WIJAYA NG', 'KTP', '3173081912730005', '0000-00-00', '', '', 'JL. RUBY B-1/26 PURI MEDIA RT 005/001 KEMBANGAN UTARA ', 'KEMBANGAN UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('461', '461', 'AMRIANSYAH MAULANA', 'KTP', '3671112310900003', '0000-00-00', '', '', 'JL. SOKA BLOK F/17 TAMAN PINANG INDAH RT/RW 002/004', 'KEL. NEROKTOG KEC. PINANG, KOTA TANGERANG', null, 'Home Owner', '2018-02-28', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('462', '462', 'INTAN AYU SRIKANDI', 'KTP', '3209205803960003', '0000-00-00', '', '', 'JL. SRIWIJAYA II NO. 15 RT/RW 003/003', 'KEL. KEDAWUNG KEC. KEDAWUNG, KAB. CIREBON', null, 'Home Owner', '2018-02-21', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('463', '463', 'ANDRI', 'KTP', '7372032504700003', '0000-00-00', '', '', 'JL. SURYA FATMAN MANGGU NO.15 RT/RW : 001/005', 'KEL. KAMPUNG PISANG KEC. SOREANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('464', '464', 'ANDRI', 'KTP', '7372032504700003', '0000-00-00', '', '', 'JL. SURYA FATMAN MANGGU NO.15 RT/RW : 001/005', 'KEL. KAMPUNG PISANG KEC. SOREANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('465', '465', 'ANDRI', 'KTP', '7372032504700003', '0000-00-00', '', '', 'JL. SURYA FATMAN MANGGU NO.15 RT/RW : 001/005', 'KEL. KAMPUNG PISANG KEC. SOREANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('466', '466', 'ANDRI', 'KTP', '7372032504700003', '0000-00-00', '', '', 'JL. SURYA FATMAN MANGGU NO.15 RT/RW : 001/005', 'KEL. KAMPUNG PISANG, KEC. SOREANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('467', '467', 'HERWAN', 'KTP', '1971040710890002', '0000-00-00', '', '', 'JL. TOMANG TINGGI I NO.20A RT 001 RW 006 ', 'KEL. TOMANG KEC. GROGOL PETAMBURAN, JAKARTA BARAT', null, 'Home Owner', '2017-12-03', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('468', '468', 'JIMMY ANDREAS', 'KTP', '6371050306630003', '0000-00-00', '', '', 'JL.AES NASUTION NO.39 RT/RW 015/002', 'KEL.SEBERANG MESJID, KEC.BANJARMASIN TENGAH', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('469', '469', 'CANGGIH PERDANA JAUHARI', 'KTP', '3171070710890001', '0000-00-00', '', '', 'JL.JATI BARU IV/2 RT 010 RW 001 ', 'KEL. KAMPUNG BALI KEC. TANAH ABANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('470', '470', 'ANDY SURYANA, ST.', 'KTP', '3172063009750002', '0000-00-00', '', '', 'JL.KELAPA LILIN VIII NI-5 NO. 1-A', 'RT 031/012 PEGANGSAAN DUA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('471', '471', 'ABDUL LATHIF ANSORI', 'KTP', '3404070411900004', '0000-00-00', '', '', 'JOHO BLOK I NO 134 RT 007 RW 060 ', 'KEL CONDONGCATUR KEC DEPOK ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('472', '472', 'DELLA NOVERIANA', 'KTP', '3173085811950012', '0000-00-00', '', '', 'KAMP. KEMBANG KEREP RT/RW 007/002', 'KEL. MERUYA UTARA KEC. KEMBANGAN, DKI JAKARTA', null, 'Home Owner', '2018-01-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('473', '473', 'LINAWATI', 'KTP', '3173085212790012', '0000-00-00', '', '', 'KEMBANGAN HARUM IV C 2/32, RT/RW 005/004', 'KEL.KEMBANGAN SELATAN, KEC.KEMBANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('474', '474', 'ISLAMI TRIANDIKO', 'KTP', '1371111808920016', '0000-00-00', '', '', 'KOMP. TAMAN PUSPA BLOK E 3 NO. 1 A', 'RT/RW 003/005 KEL. CIKUPA KEC. CIKUPA, KAB. TANGER', null, 'Home Owner', '2018-02-19', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('475', '475', 'YAN CAHYADI MULIANTO', 'KTP', '3173023003810001', '0000-00-00', '', '', 'KOND. T. ANGGREK TWR 6/32 H RT. 006/007', 'KEL. TANJUNG DUREN SELATAN KEC. GROGOL PETAMBURAN,', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('476', '476', 'KASMAN INDRA ATAN W', 'KTP', '3173010707640009', '0000-00-00', '', '', 'KOSAMBI BARU CEXT II/9', 'RT. 002/015 DURI KOSAMBI CENGKARENG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('477', '477', 'DJOHAN', 'KTP', '3171041003680002', '0000-00-00', '', '', 'KP KEPU GG 8/7.A', 'RT. 014/003 BUNGUR, SENEN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('478', '478', 'RISFA RESMINI ASIH', 'KTP', '3671026611900001', '0000-00-00', '', '', 'KP. CIKONENG ILIR RT/RW 001/007', 'KEL. JATAKE KEC. JATIUWUNG, KOTA TANGERANG', null, 'Home Owner', '2018-02-23', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('479', '479', 'DESY SURYANI', 'KTP', '3173024612910001', '0000-00-00', '', '', 'KP. GUSTI RT/RW 004/005 ', 'KEL. WIJAYA KUSUMA KEC. GROGOL PETAMBURAN, JAKARTA', null, 'Home Owner', '2018-02-25', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('480', '480', 'LINA ROLISTIANA DEWI', 'KTP', '3603285708910016', '0000-00-00', '', '', 'KP.CURUG RT/RW 003/001', 'KEL.CURUG SANGERENG KEC.KELAPA DUA, KABUPATEN TANG', null, 'Home Owner', '2017-12-11', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('481', '481', 'THEN TJHIN SANG', 'KTP', '3173040202800006', '0000-00-00', '', '', 'KRENDANG BARAT NO 5 RT 006 RW 004', 'KEL KRENDANG KEC TAMBORA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('482', '482', 'LILY ANGKOUW', 'KTP', '7171075705730005', '0000-00-00', '', '', 'LINGKUNGAN IX RT 000 RW 009 ', 'KEL. TELING ATAS KEC. WANEA, KOTA MANADO', null, 'Home Owner', '2018-02-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('483', '483', 'RIZKY DJUWONO', 'KTP', '3173010712880005', '0000-00-00', '', '', 'MAHONI HIJAU UTM.I.F VIII/52 RT 006 RW 009', 'KEL. DURI KOSAMBI KEC. CENGKARENG, JAKARTA BARAT', null, 'Home Owner', '2018-02-26', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('484', '484', 'SRI NIKMAH, SE', 'KTP', '3375026412860003', '0000-00-00', '', '', 'MBERAN RT/RW 002/001', 'KEL. WATESALIT KEC. BATANG, KAB. BATANG', null, 'Home Owner', '2018-02-28', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('485', '485', 'RICKY', 'KTP', '3172010404840023', '0000-00-00', '', '', 'MEDITERANIA BOULEVARD PIK NO 39', 'RT/RW 09/07 KAPUK MUARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('486', '486', 'THOMAS HAWARI', 'KTP', '3172011709800008', '0000-00-00', '', '', 'MUARA KARANG BLOK J 6 U NO. 3 RT/RW 006/008', 'KEL. PLUIT KEC. PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('487', '487', 'THOMAS HAWARI', 'KTP', '3172011709800008', '0000-00-00', '', '', 'MUARA KARANG J6 U NO.3 RT/RW : 006/008', 'KEL PLUIT', null, 'Home Owner', '2017-12-09', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('488', '488', 'MEITA GUNAWAN', 'KTP', '3674036104780001', '0000-00-00', '', '', 'PALM BINTARO BLOK E 4/5 RT/RW 001/010', 'KEL. PONDOK AREN ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('489', '489', 'TRI UTAMI NATAOKTAVIA', 'KTP', '3603125010940002', '0000-00-00', '', '', 'PERMATA TANGERANG CB-2 NO. 4 RT 009 RW 021', 'KEL. GELAM JAYA KEC. PASAR KEMIS, KAB. TANGERANG ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('490', '490', 'SUGIANI', 'KTP', '3571015003800010', '0000-00-00', '', '', 'PERUM MOJOROTO INDAH BLOK F-18 RT. 043/011', 'KEL. MOJOROTO KEC. MOJOROTO, KEDIRI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('491', '491', 'WANDA VANYA', 'KTP', '3521155405920002', '0000-00-00', '', '', 'PERUMAHAN GREEN LAKE CITY CLUSTER ASIA JL. ASIA 008 NO. 072', 'RT/RW 003/008 KEL GONDRONG KEC. CIPONDOH, TANGERAN', null, 'Home Owner', '2018-02-13', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('492', '492', 'ERI MARLIZAR R', 'KTP', '3175080409921001', '0000-00-00', '', '', 'PERUMAHAN TAMAN DUREN SAWIT', 'NO 1 RT/RW 009/016 KEL DUREN SAWIT KEC DUREN SAWIT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('493', '493', 'YUYUN HANDOYO', 'KTP', '3174104712750001', '0000-00-00', '', '', 'PESANGGRAHAN PERMAI C-2', 'RT 008/007 PETUKANGAN SELATAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('494', '494', 'EMIR NGATIDJO', 'KTP', '3172010510660011', '0000-00-00', '', '', 'PLUIT MAS SELT IV BLOK N/4 RT/RW : 006/018', 'KEL PEJAGALAN KEC PENJARINGAN', null, 'Home Owner', '2017-12-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('495', '495', 'VONNY VALENTINA', 'KTP', '3172015903820007', '0000-00-00', '', '', 'PLUIT TIMUR BLOK CC. SEL/ 18 ', 'RT / RW 009/009 PLUIT PENJARINGAN JAKARTA UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('496', '496', 'SILVIA CHUANG', 'KTP', '3172016710870013', '0000-00-00', '', '', 'PLUIT TIMUR BLOK W SEL/50 005/009', 'PLUIT PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('497', '497', 'DEWI AYU KRISHARYANTI', 'KTP', '3671084710890002', '0000-00-00', '', '', 'PONDOK MAKMUR BLOK A.10 NO. 13', 'RT 003/004 KEL. GEBANG RAYA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('498', '498', 'WIRA ADIGUNA', 'KTP', '3671053006850002', '0000-00-00', '', '', 'PORIS INDAH BLOK D/570 RT/RW : 006/007', 'KEL. CIPONDOH INDAH, KEC CIPONDOH', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('499', '499', 'RIVKY YONNY WAHYUDI', 'KTP', '3671052806890005', '0000-00-00', '', '', 'PORIS INDAHBLOK C/316 RT/RW 004/006', 'KEL. CIPONDOH INDAH KEC. CIPONDOH, KOTA TANGERANG', null, 'Home Owner', '2018-02-25', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('500', '500', 'SHANTY SULISTIO WIBOWO', 'KTP', '3175066809900008', '0000-00-00', '', '', 'PULO GEBANG RT/RW 008/006 KEL PULO GEBANG ', 'KEC CAKUNG JAKARTA TIMUR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('501', '501', 'MUHAMAD THESAR ANJASMARA', 'KTP', '3674021307950003', '0000-00-00', '', '', 'REGENSI MELATI MAS BLOK C 12/3 RT/RW 003/017', 'KEL.PONDOK JAGUNG, KEC.SERPONG UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('502', '502', 'SHANDY REINATA', 'KTP', '3173086302850003', '0000-00-00', '', '', 'TAMAN ALFA INDAH B-14/26 RT RW 011/007', 'DESA JOGLO KEC KEMBANGAN KAB JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('503', '503', 'LUCKY HALIM', 'KTP', '3173081106680003', '0000-00-00', '', '', 'TAMAN ALFA INDAH F3 NO.41 . ', 'RT 009/005 . JOGLO, KEMBANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('504', '504', 'FIKA RATU SYAH HARRY', 'KTP', '3671086509920011', '0000-00-00', '', '', 'TAMAN CIBODAS JL. ANGGREK XII BLOK L.4 NO. 46 RT/RW 005/006', 'KEL. SANGIANG JAYA', null, 'Home Owner', '2017-12-12', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('505', '505', 'SINTRA', 'KTP', '3172012409810016', '0000-00-00', '', '', 'TAMAN GRISENDA BLOK D4 NO 11B', 'RT 004/010', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('506', '506', 'RICHARD SANTIO', 'KTP', '3173081409880003', '0000-00-00', '', '', 'TAMAN KOTA BLOK A 2 NO.8 RT/RW: 001/005', 'KEL.:KEMBANGAN UTARA; KEC.:KEMBANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('507', '507', 'EDDY SARTANA', 'KTP', '3578241511820002', '0000-00-00', '', '', 'TAMAN UBUD PERMATA TIMUR III NO. 66', 'RT/RW 000/000 BINONG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('508', '508', 'IMAN', 'KTP', '3172012808790004', '0000-00-00', '', '', 'TELUK GONG JL. 20 NO. 23 RT/RW 007/010', 'KEL. PEJAGALAN KEC. PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2018-02-14', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('509', '509', 'DESHI AGASI', 'KTP', '6102075507890004', '0000-00-00', '', '', 'TERS BANDENGAN UTR. SOKA II/30 RT. 004/016', 'KEL. PEJAGALAN KEC. PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('510', '510', 'YANES Y MATULATUWA', 'KTP', '3275092206660004', '0000-00-00', '', '', 'THE ICON, CLUSTER SIMPLICITY BLOK B.7 NO. 7 BSD CITY', 'RT 001 RW 007 KEL. SAMPORA KEC. CISAUK, KAB. TANGE', null, 'Home Owner', '2018-02-24', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('511', '511', 'NIKEN YURIVIKA', 'KTP', '3173085606830008', '0000-00-00', '', '', 'TMN MERUYA ILIR BLOK G-2 NO.11', 'KEMBANGAN  ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('512', '512', 'IRANI HIMASILANI', 'KTP', '3173066110700003', '0000-00-00', '', '', 'TMN SURYA 2 BLOK C-4/8 RT/RW 006/015', 'KEL PEGADUNGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('513', '513', 'TJOA LIANG MEI', 'KTP', '3172060904540002', '0000-00-00', '', '', 'VILA GADING INDAH BLK N/29', 'RT 003/014', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('514', '514', 'KEVIN CHANDRA THE', 'KTP', '3603120306920005', '0000-00-00', '', '', 'VILA REGENSI TNG II BLOK FB-4 NO. 21 RT/RW 005/009', 'KEL. GELAM JAYA KEC. PASAR KEMIS, KAB. TANGERANG', null, 'Home Owner', '2018-02-18', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('515', '515', 'YOHANES AMOS NUMBERI', 'KTP', '3674021403590005', '0000-00-00', '', '', 'VILLA MELATI MAS BLOK G 11 NO 16 RT 026 RW 009 ', 'KEL JELUPANG KEC SERPONG UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('516', '516', 'MAGRET', 'KTP', '3674026009800004', '0000-00-00', '', '', 'VILLA MELATI MAS BLOK P-9/6 RT. 046/008', 'KEL. JELUPANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('517', '517', 'YOGIE HARTONO DAN JANICE CHRISTIYANTI', 'KTP', '3603141005930007', '0000-00-00', '', '', 'VILLA TAMAN BANDARA D-6 NO. 20 RT 009 RW 009', 'KEL. DADAP', null, 'Home Owner', '2017-12-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('518', '518', 'AGUS SETIAWAN', 'KTP', '3671082006680001', '0000-00-00', '', '', 'VILLA TAMAN CIBODAS BLOK O.3 NO. 1A RT/RW 009/011', 'KEL. SANGIANG JAYA KEC. PERIUK, TANGERANG', null, 'Home Owner', '2018-02-27', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('519', '519', 'SALLY NOVA', 'KTP', '3671084211880001', '0000-00-00', '', '', 'VILLA TANGERANG REGENCY I BLOK KB. 1 NO. 12', 'RT. 001/011 KEL.GEBANG RAYA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('520', '520', 'CHEN XIAOBO', 'KTP', 'EA8740872', '0000-00-00', '', '', 'WNA', 'WNA', null, 'Home Owner', '2017-12-15', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('521', '521', 'IR.H.ZUHRI', 'KTP', '3603011212600003', '0000-00-00', '', '', 'JL.RAYA SERANG KM. 24,5 NO. 73', 'RT. 001/003', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('522', '522', 'IR.H.ZUHRI', 'KTP', '3603011212600003', '0000-00-00', '', '', 'JL.RAYA SERANG KM.24,5 NO.73', 'RT. 001/003', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('523', '523', 'DOMBAT FEBRIANA TARINGAN. S.E', 'KTP', '6471035002880002', '0000-00-00', '', '', 'JL. SATU GG. MANUNGGAL BAKTI NO. 26 RT 056 RW -', 'KEL. GUNUNG SAMARINDA KEC. BALLIKPAPAN UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('524', '524', 'LOEKITO MARTONO', 'KTP', '3402160503800004', '0000-00-00', '', '', 'JL. TAMBAK NO. 13 KAV 10 RT 003 RW --', 'KEL. NGESTIHARJO KEC. KASIHAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('525', '525', 'RAVI', 'KTP', '3603172807860005', '0000-00-00', '', '', 'JATI BENING RT 006 RW 001 ', 'KEL JATIBENING KEC PONDOK GEDE ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('526', '526', 'MEGAWATI', 'KTP', '3173016908670004', '0000-00-00', '', '', 'JL NUSA INDAH I BLK CEX 9/19', 'RT.003/015 DURI KOSAMBI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('527', '527', 'HENDI LIE', 'KTP', '1671041708720007', '0000-00-00', '', '', 'KP. BABAKAN JL. KAPITAN I R 001 RW 004', 'KEL. SUKATANI KEC. TAPOS', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('528', '528', 'ANDREAS', 'KTP', '3276066312980004', '0000-00-00', '', '', 'KP. KEMIRI SAWAH RT 004 RW 015', 'KEL. KEMIRIMUKA KEC. BEJI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('529', '529', 'ANDRY TANHARDJO', 'KTP', '7203091607860002', '0000-00-00', '', '', 'JL. LATIGAU RT 000 RW 000, ', 'KEL. LABUAN KEC. LABUAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('530', '530', 'STEPHANIE ANGELIA', 'KTP', '3173025811920005', '0000-00-00', '', '', 'PRIMA INDAH 2 BLOK WW/20', 'RT 015/003 WIJAYA KUSUMA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('531', '531', 'SALANTI TIRTANEGARA', 'KTP', '3175034202680017', '0000-00-00', '', '', 'JL. H. YAKUP SAIDI NO 8 RT 001 RW 003, ', 'KEL. RAWA BUNGA KEC. JATINEGARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('532', '532', 'FARIDA HALIM', 'KTP', '3172054607510001', '0000-00-00', '', '', 'JL. PADEMANGAN IV GANG 22 RT 001/001', 'PADEMANGAN TIMUR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('533', '533', 'LIM SIOK ENG', 'KTP', '1671054910570004', '0000-00-00', '', '', 'PURI GARDENA BLOK B-2-29', 'RT. 002/014', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('534', '534', 'GEORGE SUTANTO', 'KTP', '3173081402830011', '0000-00-00', '', '', 'APT. CITY PARK TWR F 3/3 RT 009 RW 014', 'KEL. CENGKARENG TIMUR KEC. CENGKARENG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('535', '535', 'SURYA DARMA', 'KTP', '3172010212790012', '0000-00-00', '', '', 'CITRA V BLOK A2 NO 35 RT 002/010', 'KEL KAMAL KEC KALIDERES', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('536', '536', 'SANNITA ANGGRAENI ATMADJA', 'KTP', '3173065403670004', '0000-00-00', '', '', 'CITRABGARDEN 2, BLOK C 2/2, RT 03/13', 'KEL.PEGADUNGANGAN. KALIDERES', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('537', '537', 'ARIANDA SEBASTIAN', 'KTP', '3173020102730007', '0000-00-00', '', '', 'GG. DUREN IV NO. 25 RT 008 RW 003', 'KEL. TANJUNG DUREN SELATAN KEC. GROROL PETAMBURAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('538', '538', 'FIDIASANTI LIE', 'KTP', '3173055203840005', '0000-00-00', '', '', 'H MARJUKI /23 RT 010 RW 005', 'KEL. KEDOYA SELATAN KEC. KEBON JERUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('539', '539', 'GEMASURYA CHRIS SABDO', 'KTP', '3173082206910009', '0000-00-00', '', '', 'JL BUANA BIRU BESAR II/19 RT 004 RW 009 ', 'KEL KEMBANGAN UTARA KEC KEMBANGAN ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('540', '540', 'TONY CHENDRA', 'KTP', '3173041910890005', '0000-00-00', '', '', 'JL GG BALOK IV NO 15 RT 009 RW 004', 'KEL. DURI UTARA KEC. TAMBORA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('541', '541', 'NELLY', 'KTP', '3173015809810018', '0000-00-00', '', '', 'JL GUNUNG GALUNGGUNG 1 BLOK E 5/6 RT 001 RW 015', 'KEL. CENGKARENG TIMUR KEC. CENGKARENG ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('542', '542', 'SULIANA TANUDJAJA', 'KTP', '3173025306780001', '0000-00-00', '', '', 'JL JELAMBAR ILIR RT 011 RW 010 ', 'KEL JELAMBAR BARU KEC GROGOL PETAMBURAN ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('543', '543', 'FELICIA ROSARY DAN MELINDA ROSARY', 'KTP', '3173035902890006', '0000-00-00', '', '', 'JL KEADILAN DALAM II/44 RT 088/001', 'KEL KEAGUNGAN TAMAN SARI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('544', '544', 'KRISNA DWI ASTUTI SH, MH', 'KTP', '3173084403800009', '0000-00-00', '', '', 'JL LAPANGAN BOLA RT 008 RW 001', 'KEL SRENGSENG KEC KEMBANGAN ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('545', '545', 'LIE AI LY', 'KTP', '3173025211780006', '0000-00-00', '', '', 'JL WARU NO 6 RT 013 RW 003 ', 'KEL. JATIPULO KEC. PALMERAH', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('546', '546', 'MA LIONG', 'KTP', '3173021002790002', '0000-00-00', '', '', 'JL WIDARA BLOK P/236.B RT/RW 007/004', 'DESA WIJAYA KUSUMA KEC GROGO; PETAMBURAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('547', '547', 'ZULHARMANS', 'KTP', '3173070510851001', '0000-00-00', '', '', 'JL. ANGGREK ROSLIANA VI/128A RT 009 RW 005', 'KEL. KEMANGGISAN KEC. PALMERAH', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('548', '548', 'LUTHFY FEBRIANSYAH', 'KTP', '3173050802890006', '0000-00-00', '', '', 'JL. B KEBON JERUK. RT 011/001', 'KB. JERUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('549', '549', 'ALEXANDER BUTAMA', 'KTP', '3173041004790004', '0000-00-00', '', '', 'JL. B. KEBON JERUK RT 010 RW 001', 'KEL. KEBON JERUK KEC. KEBON JERUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('550', '550', 'LANNY', 'KTP', '3175076612770010', '0000-00-00', '', '', 'JL. CITRA 1 BLOK B4/5 RT 011 RW 009', 'KEL. KALIDERES KEC. KALIDERES', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('551', '551', 'SANNY', 'KTP', '3173045307860007', '0000-00-00', '', '', 'JL. JELAMBAR SELATAN XV NO  70-B RT 010 RW 005', 'KEL JELAMBAR BARU KEC GROGOL PETAMBURAN ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('552', '552', 'IRAWAN', 'KTP', '3173011906690007', '0000-00-00', '', '', 'JL. KENANGA II RT 001 RW 002', 'KEL. CENGKARENG BARAT KEC. CENGKARENG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('553', '553', 'HERMANTO JAHJA SADJI', 'KTP', '3173041707700007', '0000-00-00', '', '', 'JL. KHM. MANSYUR NO. 60 RT 004 RW 005', 'KEL. TAMBORA KEC. TAMBORA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('554', '554', 'AUTINO SUARLANO', 'KTP', '831112050854', '0000-00-00', '', '', 'JL. KINTAMANI UTARA BLOK LB/8 RT 001 RW 017', 'KEL. KALIDERES', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('555', '555', 'SISILYA SUTANTO', 'KTP', '3173045404830001', '0000-00-00', '', '', 'JL. PADA MULYA I RT 001 RW 008', 'KEL. ANGKE KEC. TAMBORA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('556', '556', 'MICKEY MULIA WIDJAJA', 'KTP', '3173050109720005', '0000-00-00', '', '', 'JL. RATU MELATI V BLK E3/39 RT012/RW013', 'KEL.DURI KEPA KEC. KEBON JEROK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('557', '557', 'IMELDA OMAR', 'KTP', '3173056611780006', '0000-00-00', '', '', 'JL. SURYA BHAKTI I/G-8 RT 003 RW 005 ', 'KEL.KEDOYA UTARA KEC.KEBON JERUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('558', '558', 'CHRISTINE', 'KTP', '3171026806840005', '0000-00-00', '', '', 'JL. TAMAN SARI IV / 50 RT 011 RW 008', 'KEL. TAMAN SARI KEC. TAMAN SARI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('559', '559', 'SHERLY SUFIANTI', 'KTP', '3673065111690001', '0000-00-00', '', '', 'JL. TAMPAK SIRING TIMUR VI / 10 RT. 004/017', 'KEL. KALIDERES KEC. KALIDERES', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('560', '560', 'MERY SUSANTI', 'KTP', '3173045805820007', '0000-00-00', '', '', 'JLN. KRENDANG SELATAN RT/RW: 002/006, ', 'KEL. KRENDANG, KEC. TAMBORA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('561', '561', 'KUSTARI TANDANU', 'KTP', '31730218045650005', '0000-00-00', '', '', 'JLN. TAMAN DAAN MOGOT III/2A RT 001 RW 001', 'KEL. TANJUNG DUREN UTARA KEC. GROGOL PETAMBURAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('562', '562', 'HARRY TJAHAYA SANTOSA', 'KTP', '3173061711670006', '0000-00-00', '', '', 'KALIDERES PERMAI BLOK C VI/4.A', 'RT 002/014', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('563', '563', 'TJOA JONG TIANG', 'KTP', '3173061707590004', '0000-00-00', '', '', 'KAV. PTB BLOK A.8/14 RT 001/007', 'KEL. TEGAL ALUR KEC. KELIDERES', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('564', '564', 'NATALIA SASTROAMIDJOJO', 'KTP', '3172055309730004', '0000-00-00', '', '', 'KOMPLEKS RUKO DMB BLOK LA 14 NO. 2 RT 003 RW 017', 'KEL. KALIDERES KEC. KALIDERES', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('565', '565', 'JEVICA', 'KTP', '3173064607901001', '0000-00-00', '', '', 'PURI GARDENA BLOK B-2 / 29 , RT 002 RW 014', 'KEL. PEGADUNGAN KEC. KALIDERES', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('566', '566', 'CARLO INDRA ASWINATHA', 'KTP', '3173081512720008', '0000-00-00', '', '', 'TAMAN ARIES BLK C1/2 RT003/RW006', 'KEL.MERUYA UTARA KEC. KEMBANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('567', '567', 'JONG KHONG LIONG', 'KTP', '3173021608770007', '0000-00-00', '', '', 'TAMAN DUTA MAS BLOK B3 NO. 12 RT 001 RW 009 ', 'KEL. WIJAYA KUSUMA KEC. GROGOL PETAMBURAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('568', '568', 'VINCENT', 'KTP', '3173080708900009', '0000-00-00', '', '', 'TAMAN KOTA BLOK E-3/2. RT 012/005. ', 'KEL. KEMBANGAN UTARA KEC. KEMBANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('569', '569', 'ARITA NURANTINI', 'KTP', '3173084802700005', '0000-00-00', '', '', 'TM. MERUYA ILIR H.6 / 11 RT/RW : 004/007 ', 'KEL. MERUYA UTARA KEC. KEMBANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('570', '570', 'RI LING', 'KTP', '3172055404820002', '0000-00-00', '', '', 'TG DUREN RAYA NO. 161 RT/RW:005/003', 'KEL TANJUNG DUREN SELATAN KEC GROGOL PETAMBURAN ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('571', '571', 'SANNITA', 'KTP', '3173065403670004', '0000-00-00', '', '', 'CITRA GARDEN 2 BLOK  C NO 2/2 RT 003 RW 019', 'KEL. PEGADUNGAN KEC. KALIDERES. ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('572', '572', 'DONNI THEO', 'KTP', '3172050910870012', '0000-00-00', '', '', 'GANG BUGIS NO 100 RT 008 RW 010 ', ' KEL. KEMAYORAN KEC. KEMAYORAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('573', '573', 'GLEVE HANDOKO', 'KTP', '3171012005910003', '0000-00-00', '', '', 'JALAN PETOJO UTARA VII/9 A PETOJO UTARA GAMBIR', 'KEL. PETOJO UTARA KEC. GAMBIR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('574', '574', 'TYA RESTAMI', 'KTP', '3171065811910003', '0000-00-00', '', '', 'JL CIKINI AMPIUN RT 014 RW 001', 'KEL. PEGANGSAAN KEC. MENTENG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('575', '575', 'DESY K NAPITUPULU', 'KTP', '3171044212890002', '0000-00-00', '', '', 'JL KRAMAT SAWAH IV 177 RT/RW 004/007', 'DESA PASEBAN KEC SENEN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('576', '576', 'WELLIE ALI', 'KTP', '3171021609880001', '0000-00-00', '', '', 'JL LAUTZE  NO 55 /127 RT 011 RW 003 ', 'KEL. KARANG ANYAR  KEC. SAWAH BESAR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('577', '577', 'SHERLY TANDY SENGKEY', 'KTP', '3171026109890005', '0000-00-00', '', '', 'JL. KARTINI XII DALAM, 011/009 KARTINI, SAWAH BESAR', 'KEL. KARTINI KEC. SAWAH BESAR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('578', '578', 'CHARLIE', 'KTP', '3171021701860004', '0000-00-00', '', '', 'JL. LAUTZE NO. 55 /127 RT 011/003  ', 'KEL. KARANG ANYAR. KEC. SAWAH BESAR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('579', '579', 'DANNY', 'KTP', '3171010702810008', '0000-00-00', '', '', 'JL. PETOJO UTARA III NO. 2A RT 007/003. ', 'KEL. PETOJO UTARA. KEC. GAMBIR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('580', '580', 'BERNADUS YOUCKE', 'KTP', '0', '0000-00-00', '', '', 'JL. PULO KENANGA III / 33 RT 005 RW 015', 'KEL. GROGOL KEC. KEBAYORAN LAMA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('581', '581', 'MICHAEL PANG', 'KTP', '3172021201920004', '0000-00-00', '', '', 'JLN KEMANDORAN I NO 38 RT 002/004', 'GROGOL UTARA KEBAYORAN LAMA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('582', '582', 'LANDY AGUSTINI', 'KTP', '3174064508680011', '0000-00-00', '', '', 'KOMPLEK BANK MANDIRI JL. BURSA /14 RT 008 RW 013', 'KEL. CILANDAK BARAT KEC. CILANDAK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('583', '583', 'NOVA PUSPITA SARI', 'KTP', '3175054106870006', '0000-00-00', '', '', 'JL. MASJID NO. 34 RT 004 RW 001', 'KEL. GEDONG KEC. PASAR REBO', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('584', '584', 'YARNILA', 'KTP', '1806024805830006', '0000-00-00', '', '', 'JLN. SUPRIADI RT/RW: 006/003, ', 'KEL. UTAN KAYU KEC. MATRAMAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('585', '585', 'MUTIANA', 'KTP', '3175034710780005', '0000-00-00', '', '', 'KP RAWADAS RT 004 RW 003 ', 'KEL PONDOK KOPI KEC DUREN SAWIT ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('586', '586', 'NOVI KURNIAWATI', 'KTP', '3302114711850001', '0000-00-00', '', '', 'DUTA MUARA INDAH B-12 RT/RW : 015/005', 'KEL. KAPUK MUARA, KEC.  PENJARINGAN ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('587', '587', 'VERALINA', 'KTP', '3671125802820001', '0000-00-00', '', '', 'GRAHA SUNTER PRATAMA BLOK M/IIA RT/RW : 016/002', 'KEL. SUNTER AGUNG KEC. TANJUNG PRIOK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('588', '588', 'VERONICA WIJAYA', 'KTP', '3172065704840001', '0000-00-00', '', '', 'JALAN KELAPA KOPYOR BARAT 2 CF.1/7 RT.002/012 KELAPA GADING TIMUR', 'JAKARTA UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('589', '589', 'ELYNA WATY', 'KTP', '3172015902780003', '0000-00-00', '', '', 'JELAMBAR ALADIN NO 66G RT 005/006.', 'KEL. PEJAGALAN KEC. PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('590', '590', 'ALGA TJANDRA KURNIAWAN', 'KTP', '3172011806900004', '0000-00-00', '', '', 'JELAMBAR FAJAR JL. U.19 RT 001 RW 017', 'KEL. PEJAGALAN KEC. PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('591', '591', 'EDWARD SISWONO', 'KTP', '3172012309800009', '0000-00-00', '', '', 'JEMBATAN II SINAR BUDI, RT/RW :007/004, ', 'KEL. PEJAGALAN KEC. PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('592', '592', 'RITA SUSILOWATY', 'KTP', '3172015804710004', '0000-00-00', '', '', 'JL BEROK DALAM RT 003 RW 004 ', 'KEL. PENJARINGAN KEC. PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('593', '593', 'GUNAWAN', 'KTP', '3172020710800012', '0000-00-00', '', '', 'JL GRIYA ELOK BLOK O/122 RT RW 008/020', 'SUNTER AGUNG TANJUNG PRIOK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('594', '594', 'TANLIPOTO TANDIONO', 'KTP', '3172010403700008', '0000-00-00', '', '', 'JL PLUIT UTARA 1 NO 14, RT 001/005, ', 'KEL. PLUIT KEC. PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('595', '595', 'NOVITA FEBRIANI', 'KTP', '317201670200003', '0000-00-00', '', '', 'JL VIKAMAS BRT II BLK B VII NO 3 RT 004 RW 003', 'KEL. KAPUK MUARA KEC. PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('596', '596', 'DAVID DAN GRACE IRYANI', 'KTP', '3172022104870001', '0000-00-00', '', '', 'JL. ANGGREK RAYA NO.15A RT/RW : 009/009', 'KEL. KAPUK KEC. CENGKARENG, JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('597', '597', 'RAYMOND SEPVIJAYA', 'KTP', '3172052609840005', '0000-00-00', '', '', 'JL. HIDUP BARU III BLOK C NO. 8 RT 011 RW 003', 'KEL. PADEMANGAN BARAT KEC. PADEMANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('598', '598', 'EDRIC NOVIDIYANTO', 'KTP', '3172051911800006', '0000-00-00', '', '', 'JL. HIDUP BARU RT 011 RW 003', 'KEL. PADEMANGAN BARAT KEC. PADEMANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('599', '599', 'IWAN', 'KTP', '3172051907620002', '0000-00-00', '', '', 'JL. INDUSTRI III DALAM 01 RT 001 RW 014', 'KEL. PADEMANGAN BARAT KEC. PADEMANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('600', '600', 'JOHN VADDHANA LIAWINATA', 'KTP', '3172012301851001', '0000-00-00', '', '', 'JL. MELATI INDAH III/32 C RT 001 RW 014. ', 'KEL. KAPUK KEC. CENGKARENG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('601', '601', 'Fony Hananto', 'KTP', '3172054302760004', '0000-00-00', '', '', 'JL. RE MARTADINATANO 56 BLK D5', 'RT 006/004 ANCOL PADEMANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('602', '602', 'SUMANDI MARLINA HALIM', 'KTP', '3172011611780005', '0000-00-00', '', '', 'JL. TANAH PASIR NO. 12 A RT 010 RW 009', 'KEL. PENJARINGAN KEC. PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('603', '603', 'HENGKY', 'KTP', '3172022312800016', '0000-00-00', '', '', 'JL.GADING MAS BRT VI BLK D-8/4 RT 004 RW 011', 'KEL. PEGANGSAAN DUA KEC. KELAPA GADING', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('604', '604', 'FENNY', 'KTP', '3172016411770005', '0000-00-00', '', '', 'JL.PINISI PERMAI V / NO.19 RT 005/RW001', 'KEL.KAPUK MUARA KEC.PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('605', '605', 'FRANKY SUTIONO', 'KTP', '3172012503820010', '0000-00-00', '', '', 'MUARA KARANG BLOK D 6 S - 16 RT. 005/008', 'KEL. PLUIT KEC. PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('606', '606', 'LOH.DANNY', 'KTP', '3172010107820001', '0000-00-00', '', '', 'MUARA KARANG BLOK E1U NO.31 RT.020/002', 'KEL. PLUIT KEC. PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('607', '607', 'NORMA YUNITA', 'KTP', '3172055811880005', '0000-00-00', '', '', 'PADEMANGAN II GG XI NO 14 RT 007 RW 005 ', 'KEL PADEMANGAN TIMUR KEC PADEMANGAN ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('608', '608', 'RUTH YOANNA SAMARIA', 'KTP', '7901120560001', '0000-00-00', '', '', 'SUNTER JAYA VI B BLOK K 5 RT 001 RW 007', 'SUNTER JAYA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('609', '609', 'TIRTO SUJANTO', 'KTP', '3172011709880005', '0000-00-00', '', '', 'TELUK GONG RAYA NO. 329C', 'RT 008/008 PEJAGALAN PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('610', '610', 'MEILIA', 'KTP', '140704305880001', '0000-00-00', '', '', 'VILA KAPUK MAS 1 BLOK E2 NO 3 RT 010 RW 005', 'KEL. KAPUK MUARA KEC. PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('611', '611', 'PRICILIA FELIANY AFFANDY', 'KTP', '3374136204940008', '0000-00-00', '', '', 'JL. PURI ANJASMORO L-12/2 RT 003 RW 002', 'KEL. TAWANGSARI KEC. SEMARANG BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('612', '612', 'DIANA WIDIYASTUTI', 'KTP', '3374024606760011', '0000-00-00', '', '', 'TAMAN MARINA A-2/32 RT 001 RW 009', 'KEL. TAWANGSARI KEC. SEMARANG BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('613', '613', 'DIANA WIDIYASTUTI', 'KTP', '3374024606760011', '0000-00-00', '', '', 'TAMAN MARINA A-2/32 RT 001 RW 009', 'KEL. TAWANGSARI KEC. SEMARANG BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('614', '614', 'PAINO SE', 'KTP', '1207260803730010', '0000-00-00', '', '', 'DUSUN I JL LETDA SUJONO GG BATU V NO 19 RT/RW 000/000', 'KEC. MEDAN ESTATE KEC. PERCUT SEI TUAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('615', '615', 'ALINDA RORESTIA', 'KTP', '3603284707870002', '0000-00-00', '', '', 'JALAN BOROBUDUR RAYA NO 34 RT 004 RW 017', 'KEL BENCONGAN KEC KELAPA DUA ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('616', '616', 'TJEN KIM SIAN', 'KTP', '3603145902710001', '0000-00-00', '', '', 'VILLA TAMAN BANDARA C-12 NO.32 RT/RW : 006/010', 'KEL. DADAP, KEC. KOSAMBI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('617', '617', 'KEVIN', 'KTP', '3671070411940006', '0000-00-00', '', '', 'JL IMAM BONJOL GG KRAMAT 1 NO 3 RT 003 RW 002', 'KEL. KARAWACI KEC. KARAWACI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('618', '618', 'SUYANTO', 'KTP', '3671012201790006', '0000-00-00', '', '', 'JL MURNI NO 27 RT 002RW 006', 'DESA SUKARASA KEC TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('619', '619', 'EDY YUHANA', 'KTP', '3671092107670002', '0000-00-00', '', '', 'JL PEPAYA  1 NO 175 RT/RW 001/006', 'KEL CIBODASARI  KEC. CIBODAS', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('620', '620', 'SENDARTI WIDYAWATY SILITONGA, A. Md. Par', 'KTP', '3578266404720001', '0000-00-00', '', '', 'KOMP. VILLA CERIA LESTARI BLOK F NO28 RT011/008', 'KEL. SUNGAIRAYA DALAM KEC. SUNGAI RAYA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('621', '621', 'SUYANDI', 'KTP', '6112011409840001', '0000-00-00', '', '', 'GG. NURUL HUDA NO. 105', 'RT 002/010 SUNGAI RAYA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('622', '622', 'MICHEL ANDREW MALO, A.MD', 'KTP', '7371143004880002', '0000-00-00', '', '', 'BTN ASAL MULA BLOK C 10 NO. 5 RT 002 RW 005', 'KEL. TAMALANREA INDAH KEC. TAMALANREA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('623', '623', 'SAMUEL ARIEF', 'KTP', '1271202703930001', '0000-00-00', '', '', 'JL. HARYONO MT NO 71', 'KEL.GANG BUNTU, KEC.MEDAN TIMUR', null, 'Home Owner', '2017-12-07', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('624', '624', 'HENDRA', 'KTP', '1271010610880004', '0000-00-00', '', '', 'JL. PUSAT PASAR NO 129. MEDAN', 'KEL. PUSAT PASAR, KEC. MEDAN KOTA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('625', '625', 'IRMATATI TJUATJA', 'KTP', '1371025012610006', '0000-00-00', '', '', 'PERUMAHAN RANGKAI PERMATA BLOK D NO 3', 'RT/RW 004/001 GANTING PARAK GADANG ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('626', '626', 'LENNY LOLONGAN', 'KTP', '7372035911750003', '0000-00-00', '', '', 'JL. SURYA ATMAN MANGGU NO. 15 RT 001 RW 005', 'KEL. KAMPUNG PISANG KEC. SOREANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('627', '627', 'LENNY LOLONGAN', 'KTP', '7372035911750003', '0000-00-00', '', '', 'JL. SURYA ATMAN MANGGU NO. 15 RT 001 RW 005', 'KEL. KAMPUNG PISANG KEC. SOREANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('628', '628', 'LENNY LOLONGAN', 'KTP', ' 7372035911750003', '0000-00-00', '', '', 'JL. SURYA FATMAN MANGGU NO. 15 RT 001 RW 005', 'KEL. KAMPUNG PISANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('629', '629', 'LENNY LOLONGAN', 'KTP', ' 7372035911750003', '0000-00-00', '', '', 'JL. SURYA FATMAN MANGGU NO. 15 RT 001 RW 005', 'KEL. KAMPUNG PISANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('630', '630', 'LENNY LOLONGAN', 'KTP', ' 7372035911750003', '0000-00-00', '', '', 'JL. SURYA FATMAN MANGGU NO. 15 RT 001 RW 005', 'KEL. KAMPUNG PISANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('631', '631', 'LENNY LOLONGAN', 'KTP', ' 7372035911750003', '0000-00-00', '', '', 'JL. SURYA FATMAN MANGGU NO. 15 RT 001 RW 005', 'KEL. KAMPUNG PISANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('632', '632', 'DENNY SURYA CHAU', 'KTP', '1471042406910001', '0000-00-00', '', '', 'JALAN KAMPAR NOMOR 92-B RT 004 RW 001', 'KEL. SEKIP KEC. LIMA PULUH', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('633', '633', 'KUMALA KENCANAWATI', 'KTP', '3375026506820011', '0000-00-00', '', '', 'JL. MATANA NO 36 A. RT 008/006. ', 'KEL. PONCOL. KEC. PEKALONGAN TIMUR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('634', '634', 'NOVIYANTI', 'KTP', '6171014811910015', '0000-00-00', '', '', 'GG PURNAMA ANGGREK IV NO 4 ', 'RT/RW 002/015 KEL PARIT TOKAYA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('635', '635', 'LINA ROSMIN', 'KTP', '6171035901680003', '0000-00-00', '', '', 'JLN KOM. YOS SUDARSO GG. SALAK 2 NO 15 A - SUNGAI JAWI LUAR - PONTIANAK BARAT', 'KEL. SUNGAI JAWI LUAR KEC. PONTIANAK BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('636', '636', 'KELVIN CONNERY', 'KTP', '6171011708930002', '0000-00-00', '', '', 'KOMP. PURNAMA AGUNG 2 NO. A7-A8 RT 006 RW 005', 'KEL. PARIT TOKAYA KEC. PONTIANAK SELATAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('637', '637', 'MARTINA', 'KTP', '6171015802620014', '0000-00-00', '', '', 'KOMP PURI INDAH BLOK AI NO 14. RT/RW 004/006. KEL. AKCAYA. .KEC PONTIANAK SELATAN. PONTIANAK', 'KEL. AKRAYA. KEC PONTIANAK SELATAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('638', '638', 'dr. MEILIASARI WIDJAJA', 'KTP', '6171015312660004', '0000-00-00', '', '', 'JL PH HUSIN 2 KOMPLEK ALEX GRIYA 3D-16/17 RT 004 RW 002', 'KEL BANSIR DARAT KEC PONTIANAK TENGGARA ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('639', '639', 'MAYA ELSERA', 'KTP', '3673015006870002', '0000-00-00', '', '', 'TAMAN WIDYA ASRI BLOK B2 NO 17 RT 003 RW 010', 'KEL. LONTARBARU KEC. SERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('640', '640', 'GUNTUR WISATAWAN', 'KTP', '3515160412770002', '0000-00-00', '', '', 'GRIYA PERMATA GEDANGAN J-4 NO. 12 RT 002 RW 008', 'KEL. KEBOANSIKEP KEC. GEDANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('641', '641', 'HERMAWAN SUSILO', 'KTP', '1371010306890003', '0000-00-00', '', '', 'JL KAMPUNG NIAS VI NO 1B RT 003 RW 003', 'KEL. RANAH PARAK RUMBIO KEC. PADANG SELATAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('642', '642', 'SUHERMAN LIMJADI', 'KTP', '1673061412710001', '0000-00-00', '', '', 'JLN. JENDERAL SUDIRMAN NO.19 RT 002 RW -', 'KEL. PASAR PEMIRI KEC. LUBUKLINGGAU BARAT II', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('643', '643', 'SILVIA SANTOSO', 'KTP', '3578314301810003', '0000-00-00', '', '', 'JL. BUKIT PAKAL IX BLOK D.29 PAKAL RESIDENCE RT 005 RW 003', 'KEL. PAKAL KEC. PAKAL', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('644', '644', 'RINIWATI SWATAN', 'KTP', '3578084304560007', '0000-00-00', '', '', 'NGAGEL WASONO 1/120 RT 002 RW 002', 'KEL. BARATA JAYA KEC. GUBENG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('645', '645', 'SANNY', 'KTP', '3173047004880006', '0000-00-00', '', '', 'BANJAR WIJAYA BLOK A27-6A', 'RT/RW 001/011 KEL PORIS PLAWAD INDAH KEC. CIPONDOH', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('646', '646', 'SUNDY HALIM', 'KTP', '3671081206740007', '0000-00-00', '', '', 'CLUSTER BAVARIA BLOK BV 10 NO 3 RT 005 RW 007', 'KEL. BABAKAN KEC, TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('647', '647', 'SUGIYANTI', 'KTP', '3671055703790005', '0000-00-00', '', '', 'CLUSTER CIPONDOH BLOK E/7 RT 004 RW 010 ', 'KEL CIPONDOH KEC CIPONDOH ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('648', '648', 'DR. DIAN ANGGRENI', 'KTP', '3671064611840001', '0000-00-00', '', '', 'GRIYA KENCANA II BLOK N NO 6 RT 003 RW 015', 'KEL. SUDIMARA BARAT KEC. CILEDUG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('649', '649', 'VINCENTIA OKTAVANI', 'KTP', '3671065310900001', '0000-00-00', '', '', 'GRIYA KENCANA II BLOK X NO.18 RT. 003/014', 'KEL. SUDIMARA BARAT KEC. CILEDUG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('650', '650', 'NANDA NADHIA', 'KTP', '3671085707910004', '0000-00-00', '', '', 'GRIYA SANGIANG MAS BLOK KA 9 NO.10 RT 003 RW 011', 'KEL. GEBANG RAYA KEC. PERIUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('651', '651', 'LAUW LOIS ANASTASIA GUNAWAN', 'KTP', '3603285708610002', '0000-00-00', '', '', 'JALAN JADE UTARA 5/8 RT.001/020 ', 'KEL. PAKULONAN BARAT KEC. KELAPA DUA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('652', '652', 'REKY PERMANA FIRDAUS', 'KTP', '3603281404780010', '0000-00-00', '', '', 'JALAN KANO VI NO.25 RT 03/RW09', 'KEL. KELAPA DUA KEC. KELAPA DUA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('653', '653', 'SUANDI', 'KTP', '3603281007740019', '0000-00-00', '', '', 'JALAN KELAPA KOPYOR CB-19/NO.12 RT 005/RW 008', 'KEL. PAKULONAN BARAT KEC. KELAPA DUA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('654', '654', 'PT YH PRATAMA INDO', 'KTP', '0', '0000-00-00', '', '', 'JL IMAM BONJOL KM 2.6 KELURAHAN BOJONG JAYA ', 'KARAWACI TANGERANG BANTEN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('655', '655', 'ENAWAR, S. PD.MM', 'KTP', '3671012202630001', '0000-00-00', '', '', 'JL. AL.MUHAJIRIN NO.32 RT002/011', 'KEL. TANAH TINGGI KEC. TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('656', '656', 'ENAWAR, S. PD.MM', 'KTP', '3671012202630001', '0000-00-00', '', '', 'JL. AL.MUHAJIRIN NO.32 RT002/011', 'KEL. TANAH TINGGI KEC. TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('657', '657', 'TITI RIANA SETIAWAN', 'KTP', '3671084510900002', '0000-00-00', '', '', 'JL. ANGSANA IV NO. 106', 'RT 004/005 PERIUK JAYA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('658', '658', 'ADITYA NAGATAMA', 'KTP', '3671072802880005', '0000-00-00', '', '', 'JL. IMAM BONJOL NO. 48 RT. 001/004', 'KEL. SUKAJADI KEC. KARAWACI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('659', '659', 'EZRA ADIPRAMANA GUNAWAN', 'KTP', '3603281212920003', '0000-00-00', '', '', 'JL. JADE UTARA 6 NO 8 RT 001 RW 020', 'KEL. PAKULONAN BARAT KEC. KELAPA DUA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('660', '660', 'WILLIAM IGNATIUS', 'KTP', '3671090308940002', '0000-00-00', '', '', 'JL. KENANGA IIC 8 NO.17 RT. 004/007', 'CIBODAS', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('661', '661', 'NASIM', 'KTP', '3671110702680005', '0000-00-00', '', '', 'JL. KH. MOCH CUP. RT 009/001. ', 'KEL. PINANG KEC. PINANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('662', '662', 'CHANDRA TANSYAH', 'KTP', '3671012809850005', '0000-00-00', '', '', 'JL. KISAMAUN GG. ABDURAHMAN 3 RT004/RW001', 'KEL. BABAKAN KEC. TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('663', '663', 'STEVEN NURTANIO', 'KTP', '3603034609690001', '0000-00-00', '', '', 'JL. MANGGIS II NO. 12 PERUM TGR RT  004 RW 002', 'KEL. MARGASARI KEC. TIGARAKSA', null, 'Home Owner', '2018-01-09', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('664', '664', 'BERNADUS WENZEL GUNARDI', 'KTP', '3671072905850006', '0000-00-00', '', '', 'JL. MOCH JAMIL NO 45 RT/RW : 001/001', 'KEL. PASAR BARU, KEC. KARAWACI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('665', '665', 'SUTIADI PUTRA WIDJAYA', 'KTP', '3671010301900002', '0000-00-00', '', '', 'JL. PULAU DEWA I PI NO. 22 RT 005 RW 002', 'KEL. KELAPA INDAH KEC. TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('666', '666', 'TINNUS RENO KRISNANDO', 'KTP', '3671120407860003', '0000-00-00', '', '', 'JL. WANAMULYA UTAMA/ 28 001/003 KARANG TENGAH', 'KEL. KARANG MULYA KEC. KARANG TENGAH', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('667', '667', 'IWAN', 'KTP', '1403051904891448', '0000-00-00', '', '', 'JL.KARET RAYA NO. 45 RT 001/022', 'KEL.CIBODASARI KEC.CIBODAS', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('668', '668', 'LIUS HENDRAWAN', 'KTP', '1207191401890003', '0000-00-00', '', '', 'JLN. PRABU SILIWANGI MESS PT BROCCO', 'RT. 001/006 KERONCONG JATIUWUNG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('669', '669', 'ARIANTI TAKELIA SUNGORO', 'KTP', '3671015301880002', '0000-00-00', '', '', 'JLN.ANGGREK NO.32 RT 001 RW 001', 'KEL. SUKASARI KEC. TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('670', '670', 'SAN SAN', 'KTP', '3603092507750003', '0000-00-00', '', '', 'KP KEMIRI RT 008 RW 003', 'KEL. KEMIRI KEC. KEMIRI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('671', '671', 'ERICK ADRIANO', 'KTP', '3603281805910012', '0000-00-00', '', '', 'KP. BENCONGAN RT 003 RW 001 ', 'KEL. BENCONGAN KEC. KELAPA DUA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('672', '672', 'DJIANTO SOEGENG', 'KTP', '3671120503720003', '0000-00-00', '', '', 'MANYAR KARTIKA 3/15 RT/RW 003/007', 'KEL. MENUR PUMPUNGAN KEC. ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('673', '673', 'PATISANDHIKA SIDARTA', 'KTP', '3671051803820002', '0000-00-00', '', '', 'MODERNLAND FG 2/3 RT/RW 002/014. PORIS PLAWAD INDAH, CIPONDOH. TANGERANG', 'TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('674', '674', 'VHETI FATIMAH', 'KTP', '3603116112810001', '0000-00-00', '', '', 'PD SUKATANI PERMAI BLOK E09/59 RT 003 RRW 003', 'KEL. SUKATANI KEC. RAJEG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('675', '675', 'ALTON RISNANDI, SE', 'KTP', '3671050605740003', '0000-00-00', '', '', 'PERUM BANJAR WIJAYA BLOK B 5-1 RT/RW : 001/013', 'DESA/KEL : PORIS PLAWAD INDAH KEC : CIPONDOH', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('676', '676', 'YESSICA THERESIA IBRAHIM', 'KTP', '3671076402910001', '0000-00-00', '', '', 'PERUM BENUA INDAH BLOK F4-10 RT 005 RW 008', 'KEL. PABUARAN TUMPENG KEC. KARAWACI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('677', '677', 'CHI CHI ANGGI STEPANI', 'KTP', '3603034901940001', '0000-00-00', '', '', 'PERUM TIGARAKSA BLK AF 25/06', 'RT/RW 006/002 KADUAGUNG TIGARAKSA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('678', '678', 'RYAN LUCKY BAHARA PASARIBU', 'KTP', '3603032702900002', '0000-00-00', '', '', 'PERUM TIGARAKSA BLK AF 25/06 RT 006 RW 002', 'KEL. KADUAGUNG KEC. TIGARAKSA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('679', '679', 'JUMIATI', 'KTP', '3671085202810009', '0000-00-00', '', '', 'PERUMAHAN GLOBAL MANSION BLOK B.7 NO.1 RT/RW:003/014', 'KEL PERIUK KEC PERIUK ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('680', '680', 'IBRAHIM WIDJIANGTO', 'KTP', '3671052805710003', '0000-00-00', '', '', 'PURI METRIPOLITAN BLOK B7/9', 'CIPONDOH, TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('681', '681', 'SIDHI OLIK', 'KTP', '3603281109750008', '0000-00-00', '', '', 'SERPONG HILL RESIDENCE BLOK C NO.10 RT/RW 003/006', 'CIATER', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('682', '682', 'A.RAFIK', 'KTP', '3671052508850008', '0000-00-00', '', '', 'TAMAN ROYAL 3 JL. CEMPAKA NO. 52 RT 001 RW 010', 'KEL. PORIS PLAWAD KEC. CIPONDOH', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('683', '683', 'FREDY K', 'KTP', '3603121612890002', '0000-00-00', '', '', 'VILA REGENSI TNG II BLOK FD3/1A RT004/RW010', 'KEL.GELAM JAYA KEC. PASARKEMIS', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('684', '684', 'ANDI HERMAWAN', 'KTP', '3273101712800001', '0000-00-00', '', '', 'JL.TAMAN FERONIA TAMAN NO.35 RT/RW 002/016 ', 'KELURAHAN PONDOK JAGUNG KECAMATAN SERPONG UTARA ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('685', '685', 'IR. BUDIARTO SETIADI', 'KTP', '3674022110720005', '0000-00-00', '', '', 'SUTERA ELOK VI NO 41 RT/RW 002/ 011 ', 'KEL. PONDOK JAGUNG KEC. SERPONG UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('686', '686', 'SUMENDI TENDIANTO', 'KTP', '3674022810650002', '0000-00-00', '', '', 'VILLA MELATI MAS BLOK I-XI NO 9 RT 039/009 ', 'KEL. JELUPANG KEC. SERPONG UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('687', '687', 'CHRISTIAN SOSILA', 'KTP', '3374061312950013', '0000-00-00', '', '', 'TLOGO TIMUN BLOK E NO. 4 RT/RW 006/001', 'KEL. TLOGOSARI KULON KEC. PEDURUNGAN, SEMARANG', null, 'Home Owner', '2018-02-23', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('688', '688', 'CHRISTIAN SOSILA', 'KTP', '3374061312950013', '0000-00-00', '', '', 'TLOGO TIMUN BLOK E NO. 4 RT/RW 006/001', 'KEL. TLOGOSARI KULON KEC. PEDURUNGAN, SEMARANG', null, 'Home Owner', '2018-02-23', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('689', '689', 'ROBERT SUTANTO', 'KTP', '3603142701810001', '0000-00-00', '', '', 'APT. CITY PARK TWR CC LT. 15 NO. 17 RT/RW 008/014', 'KEL. CENGKARENG TIMUR KEC. CENGKARENG, JAKARTA BAR', null, 'Home Owner', '2018-02-28', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('690', '690', 'REGINA AMALIA', 'KTP', '367109420888002', '0000-00-00', '', '', 'JL SULTAN VIII NO 12 RT 4/5', 'CIBODAS BARU ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('691', '691', 'AHMAD KHUMAIDI', 'KTP', '317301151080002', '0000-00-00', '', '', 'KOMP.IMIGRASI  NO 37 ', 'CENGKARENG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('692', '692', 'ADI PUTRA HENDRO', 'KTP', '0', '0000-00-00', '', '', 'JL. HAYAM WURUK RAYA NO. 27 RT/RW 001/-, CEMPAKA PUTIH', 'JELUTUNG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('693', '693', 'LEO AGUSMAN', 'KTP', '1471091708860081', '0000-00-00', '', '', 'JL 20 DESEMBER 78A RT 01 RW 03', 'PEGADUNGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('694', '694', 'A. INDRA', 'KTP', '0', '0000-00-00', '', '', 'VILLA TAMAN BANDARA D-5 NO.5 RT/RW 09/09, DADAB', 'KOSAMBI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('695', '695', 'RITA LUSIANA MARPAUNG', 'KTP', '0', '0000-00-00', '', '', 'CURUG INDAH B1 NO.16 RT/RW 05/08, CIPINANG MELAYU', 'MAKASSAR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('696', '696', 'Andrew', 'KTP', '0', '0000-00-00', '', '', 'JL. JELAMBAR JAYA 2 NO.17 RT/RW 06/02, JELAMBAR BARU', 'GROGORL PETAMBURAN', null, 'Home Owner', '2017-12-25', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('697', '697', 'YURIKO', 'KTP', '367109291193003', '0000-00-00', '', '', 'METRO PERTAMA I L2/41 ', 'KARANG TENGAH', null, 'Home Owner', '2017-12-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('698', '698', 'NELSEN HARTONO', 'KTP', '0', '0000-00-00', '', '', 'CITRA V BLOK E2/20 , RT/RW 01/16 , PEGADUNGAN', 'KALIDERES JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('699', '699', 'RIFKY MUAHAMMAD', 'KTP', '3671125111790005', '0000-00-00', '', '', 'CLUSTER MUNAWARNAH BLOK KG 1', 'VILLA IRHAMI ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('700', '700', 'HERLENTI KRISTINA', 'KTP', '0', '0000-00-00', '', '', 'CITRA GARDEN 2 BLOK C6 NO.1 RT/RW 003/019, PENGADUNGAN', 'KALIDERES JAKARTA BARAT', null, 'Home Owner', '2017-12-06', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('701', '701', 'YAN CAHYADI MULIANTO', 'KTP', '0', '0000-00-00', '', '', 'TAMAN ANGGREK TOWER 6-32.H RT/RW 06/07 TANJUNG DUREN SELATAN', 'GROGORL PETAMBURAN', null, 'Home Owner', '2017-12-01', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('702', '702', 'DR.ADIDHARMA DEWANTO S.', 'KTP', '', '0000-00-00', '', '', 'BSD BLOK H4 10 A SEKTOR 1.1 RAWA BUNTU', 'SERPONG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('703', '703', 'SUCAHYADI', 'KTP', '3674012702690004', '0000-00-00', '', '', 'GG. GAYA RT 003 RW 001 PASAR MINGGU', 'PASAR MINGGU', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('704', '704', 'ROBBY SALEH', 'KTP', '3174040708760011', '0000-00-00', '', '', 'GG. KRAMAT RT 003 RW 004', '', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('705', '705', 'EDWIN SUTEDJA', 'KTP', '3671112801780007', '0000-00-00', '', '', 'GREEN GARDEN BLOK I NO 12', 'CENGKARENG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('706', '706', 'NIKE  ARINDA', 'KTP', '3713051412810004', '0000-00-00', '', '', 'JL LAKSANA B-IV NO 251 RT 009 RW 006 KARTINI', 'SAWAH BESAR ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('707', '707', 'ERWIN RINALDI', 'KTP', '3171024304930003', '0000-00-00', '', '', 'JL. DR. MUWARDI III A/4C', 'GROGOL', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('708', '708', 'SHINTYA OKTORA', 'KTP', '3173021507760011', '0000-00-00', '', '', 'JL. PADEMANGAN IV NO 5 A RT.RW. 013/001.', 'PADEMANGAN TIMUR ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('709', '709', 'DESY TRISNAWATI', 'KTP', '3172056010880005', '0000-00-00', '', '', 'KOMPLEK WISMA ANGKASA PURA JL.TABING BLOK L5 NO 48', 'TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('710', '710', 'ABIGAEL CHINTYA ANGGERIANA', 'KTP', '3171024212870001', '0000-00-00', '', '', 'TAMAN UBUD PERMAI 1 NO 59 LIPPO KARAWACI\n', 'TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('711', '711', 'KE. CHUNHAI', 'KTP', '3173034802970003', '0000-00-00', '', '', 'ZHEJIANG, CHINA', '0', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('712', '712', 'F.X YUSTIN TANUDJAJA', 'KTP', 'E94277018', '0000-00-00', '', '', 'CITRA I EXT BLOK AD 3/6 KALIDERES', 'JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('713', '713', 'RATNA TRIHARTATI', 'KTP', '861112053191', '0000-00-00', '', '', 'JALAN PANTAI SANUR 6 NO 16 ', 'ANCOL PADEMANGAN JAKARTA UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('714', '714', 'DENIES ARIES', 'KTP', '3172055511610006', '0000-00-00', '', '', 'TAMAN UBUD ASRI V/36, CURUG', 'DESA BINONG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('715', '715', 'DENIES ARIES', 'KTP', '3603172807860005', '0000-00-00', '', '', 'TAMAN UBUD ASRI V/36, CURUG', 'DESA BINONG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('716', '716', 'SULISTYOWATI', 'KTP', '3603172807860005', '0000-00-00', '', '', 'JL. H. SELONG RT 013/001', 'DURI KOSAMBI CENGKARENG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('717', '717', 'LELIANA HANANTO', 'KTP', '3173016507720015', '0000-00-00', '', '', 'JL. JADE SELATAN 1 NO. 21 PONDOK HIJAU GOLF', 'GADING SERPONG, TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('718', '718', 'DIAN ANDRIANI', 'KTP', '3171072207440001', '0000-00-00', '', '', 'HARPA IV DD/28 010/007 PEGANGSAAN DUA KELAPA GADING', 'JAKARTA UTARA', null, 'Home Owner', '2018-01-09', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('719', '719', 'ANTONIUS', 'KTP', '3301251103840001', '0000-00-00', '', '', 'KP. KEBONCAU RT 003 RW 004,', 'JATAKE,  KEC. JATIUWUNG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('720', '720', 'S CHANDRA SEGARAN', 'KTP', '3671021503900003', '0000-00-00', '', '', 'TAMAN ALFA INDAH B 4/8 RT 008/007 ', 'JOGLO', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('721', '721', 'PITRI LAILI', 'KTP', '3173083110420002', '0000-00-00', '', '', 'JL. KALI BARU BARAT IX RT 011/005', 'KALI BARU', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('722', '722', 'JENNI', 'KTP', '3172046605941004', '0000-00-00', '', '', 'CITRA I BLOK C-5 NO.17 RT/RW 001/016 ', 'KALIDERES JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('723', '723', 'ANTONNIUS SOEMANTO', 'KTP', '3173066501860009', '0000-00-00', '', '', 'JL.KESEJAHTERAAN NO.44A RT006 RW007 ', 'KEAGUNGAN ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('724', '724', 'IR FERRY BASTAMAN HAKIM', 'KTP', '3173031509890004', '0000-00-00', '', '', 'JL MUSA NO 38 C RT 009 / 010 ', 'KEBAYORAN LAMA SELATAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('725', '725', 'OKKE AJUHAN', 'KTP', '3174052303760011', '0000-00-00', '', '', 'JL. S. WIRYOPRANOTO NO 6F RT 002 RW 001,', 'KEBON KELAPA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('726', '726', 'INDRI HALIM', 'KTP', '3171010512840002', '0000-00-00', '', '', 'JL CEMARA RAYA NO 41 RT/RW  1/20 KELURAHAN CIBODASARI', 'KEC CIBODAS KOTA TANGERANG ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('727', '727', 'DINA', 'KTP', '3671085307700004', '0000-00-00', '', '', 'JLN CEMPAKA LK II RT/RW - KEL TANJUNG KOA IV', 'KEC TANJUNG BALAI UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('728', '728', 'x', 'KTP', '1274026212810002', '0000-00-00', '', '', 'JL. PERINTIS NO.8 RT 003 RW 001 KEL. JOGLO', 'KEC. KEMBANGAN, JAKARTA BARAT', null, 'Home Owner', '2018-01-28', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('729', '729', 'JONNY', 'KTP', '3173086403970005', '0000-00-00', '', '', 'WISMA HARAPAN BLOK D.3/16 RT. 004/011', 'KEC. PERIUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('730', '730', 'JESSICA SAMUEL LIAUW & DAVID YULIANTO', 'KTP', '801012192507', '0000-00-00', '', '', 'JL. ALBASIA RAYA B.XI/11 RT. 008/004 ', 'KEDOYA SELATAN KEBON JERUK JAKARTA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('731', '731', 'DR. MIRZA INDRAJANTI S.B', 'KTP', '3173056003860007', '0000-00-00', '', '', 'JL. SURYA BAKTI III E NO. 14 RT 003/005', 'KEDOYA UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('732', '732', 'SILVIA', 'KTP', '3173054809590006', '0000-00-00', '', '', 'JL.KLP HIBRIDA VII RB14/01 RT18/RW15 ', 'KEL : PEGANGSAAN DUA, KEC; KELAPA GADING', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('733', '733', 'SISCA SUSANTI', 'KTP', '3172064501570001', '0000-00-00', '', '', 'JLN.KLP HIBRIDA VII RB-14/01 RT18/RW15 ', 'KEL : PEGANGSAAN, KEC : KELAPA GADING', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('734', '734', 'DENIES ARIES', 'KTP', '3172064606830004', '0000-00-00', '', '', 'TAMAN UBUD ASRI V/36 RT 008 RW 020 ', 'KEL BINONG KEC BINOING', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('735', '735', 'WIDYAWATI GUNAWAN', 'KTP', '3603172807860005', '0000-00-00', '', '', 'JL TAMAN MEKAR RAHARJA I.32 RT 005 RW 004 ', 'KEL CIBADUYUT WETAN KEC BOJONG LOA KIDUL', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('736', '736', 'MUSLIHUN, SE', 'KTP', '3273174404810004', '0000-00-00', '', '', 'JL BEKASI TIMUR VI NO 18 RT 009 RW 008', 'KEL CIPINANG BESAR UTARA KEC JATINEGARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('737', '737', 'LUCIA', 'KTP', '3175030812730002', '0000-00-00', '', '', 'KOMP KRESEK II NO 17 D RT/RW 003/012', 'KEL DURI KOSAMBI KEC CENGKARENG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('738', '738', 'PANG JULIA', 'KTP', '3173015909840004', '0000-00-00', '', '', 'VILLA TANGERANG REGENCY BLOK OC.6 NO.14 RT OO5 RW 017', 'KEL GEBANG RAYA KEC PERIUK ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('739', '739', 'BUDI', 'KTP', '3671085309740002', '0000-00-00', '', '', 'KOMP DUTA HARAPAN INDAH BLK L/16 RT/RW : 008/002', 'KEL KAPUK MUARA, KEC PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('740', '740', 'HENDRO', 'KTP', '3175032004830006', '0000-00-00', '', '', 'JL. METRO PERMATA 2 C.6 / 16 RT RW 003/013', 'KEL KARANG MULYA KEC. KARANG TENGAH ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('741', '741', 'NAVET', 'KTP', '3671122912820005', '0000-00-00', '', '', 'JL KEBUN JERUK XII NO 40 RT 010 RW 005 ', 'KEL MAPHAR KEC MAPHAR TAMAN SARI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('742', '742', 'SILVY MELISSA', 'KTP', '3173034102871002', '0000-00-00', '', '', 'JL MESJID PEKOJAN NO 196-E. RT/RW 002/006. ', 'KEL PEKOJAN. KEC TAMBORA. JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('743', '743', 'Masitoh', 'KTP', '3173046905870003', '0000-00-00', '', '', 'Kp Sinangpalai 001/001', 'KEL SITU GADUNG KEC. PAGEDANGAN, KAB. TANGERANG', null, 'Home Owner', '2018-01-18', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('744', '744', 'RADIKTRA MAHINSA', 'KTP', '3603226703760002', '0000-00-00', '', '', 'DSN TRIGALA', 'KEL SUKA MAJU KEC TANAH PINOH', null, 'Home Owner', '2017-12-25', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('745', '745', 'LIWARNA', 'KTP', '6110061501830001', '0000-00-00', '', '', 'KOMP DUTA SQUARE C/6 RT/RW : 012/005', 'KEL WIJAYA KUSUMA KEC GROGOL PETAMBURAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('746', '746', 'GOH LIE KIAU', 'KTP', '3173025202840008', '0000-00-00', '', '', 'TAMAN DUTA MAS BLOK F3/28', 'KEL WIJAYA KUSUMA KEC GROGOL PETAMBURAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('747', '747', 'YUNITA ROMELA', 'KTP', '3175072107620015', '0000-00-00', '', '', 'KOMPLEK YAKTAPENA 2 NO 08-663 RT/RW 012/004', 'KEL. 16 ULU KEC. SEBERANG ULU II, KOTA PALEMBANG', null, 'Home Owner', '2017-12-19', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('748', '748', 'BUDI WIDJAJA', 'KTP', '1671034806880004', '0000-00-00', '', '', 'JL KARANG BOLONG I NO 2-3 RT 01/11, ', 'KEL. ANCOL KEC. PADEMANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('749', '749', 'HANNA WIJAYA', 'KTP', '3172050106660007', '0000-00-00', '', '', 'GG SIAGA II/16 RT 012 RW 004 ', 'KEL. ANGKE KEC. TAMBORA, JAKARTA BARAT', null, 'Home Owner', '2018-01-30', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('750', '750', 'HERIYANTO', 'KTP', '3173046002870003', '0000-00-00', '', '', 'JL. TERS.SURYANI GG.AL HUDA RT/RW 002/002', 'KEL. BABAKAN KEC BABAKAN CIPARAY', null, 'Home Owner', '2017-12-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('751', '751', 'USWATUN HASANAH', 'KTP', '3273030803910001', '0000-00-00', '', '', 'JL. TARUNA II NO. 33 RT/RW 005/003 ', 'KEL. BABAKAN KEC. TANGERANG, TANGERANG', null, 'Home Owner', '2018-01-16', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('752', '752', 'ASEP SOLEHUDIN', 'KTP', '0', '0000-00-00', '', '', 'KP. BLOK DESA RT 003/006', 'KEL. BANJARAN WETAN KEC. BANJARAN, KAB. BANDUNG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('753', '753', 'RICHA CAROLIN', 'KTP', '3204132208840004', '0000-00-00', '', '', 'JL SOSIAL II NO 87 PRUMNAS III RT 002 RW 005 ', 'KEL. BD JAYA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('754', '754', 'GRACE JANE', 'KTP', '840311210209', '0000-00-00', '', '', 'JL. EMPU BARADA V NO. 03 RT 004/013', 'KEL. BENCONGAN KEC. KELAPA DUA KAB. TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('755', '755', 'FRANSISCO', 'KTP', '3603286601920004', '0000-00-00', '', '', 'PAMULANG PERMAI II BLOK F 14/4 RT 06/10', 'KEL. BENDA BARU KEC. PAMULANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('756', '756', 'YUDISTIRA ARSIE', 'KTP', '3674062102830001', '0000-00-00', '', '', 'RUSUN BENDHIL 1 BLOK C.I NO.11 RT 008 RW 009', 'KEL. BENDUNGAN HILIR KEC. TANAH ABANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('757', '757', 'RICHARD NELSON', 'KTP', '6171041210870020', '0000-00-00', '', '', 'VILLA PERMATA A.7/68 RT/RW 001/001', 'KEL. BINONG KEC. CURUG KABUPATEN TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('758', '758', 'USUP SUPRIATNO, S.KOM.MM', 'KTP', '3603172906940003', '0000-00-00', '', '', 'SARI BUMI INDAH D-57/20 RT/RW 005/018', 'KEL. BINONG KEC. CURUG, KAB. TANGERANG', null, 'Home Owner', '2018-01-18', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('759', '759', 'MELLY IMELDA JACKLIEN', 'KTP', '3603171611650011', '0000-00-00', '', '', 'TAMAN UBUD LESTARI I/1 LIPPO VILLAGE ', 'KEL. BINONG KEC. CURUG, KAB. TANGERANG', null, 'Home Owner', '2018-01-18', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('760', '760', 'SUHENDI', 'KTP', '3603174505700013', '0000-00-00', '', '', 'TAMAN UBUD VI/11 RT001/RW001', 'KEL. BINONG KEC.CURUG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('761', '761', 'PRISKILLA FELYCIA WIJANTO', 'KTP', '3603170206580008', '0000-00-00', '', '', 'PB SUDIRMAN III/548 RT 015 RW 004', 'KEL. BLINDUNGAN KEC. BONDOWOSO', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('762', '762', 'AYU DEWI SUSANTI KONJONGIAN', 'KTP', '3511114604880003', '0000-00-00', '', '', 'DASANA INDAH BLOK UE 6 NO 5 RT 005 RW 027', 'KEL. BOJONG NANGKA KEC. KELAPA DUA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('763', '763', 'MUHAMMAD ARIEF REYNALDI', 'KTP', '3603285103850004', '0000-00-00', '', '', 'JL. BOJONG MOLEK VI BLOK F25/13-14 RT 006 RW 014', 'KEL. BOJONG RAWALUMBU KEC. RAWALUMBU, BEKASI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('764', '764', 'NOVARIA, S.E', 'KTP', '3275051306930015', '0000-00-00', '', '', 'JL. TANJUNG SARI 11 LR, TANJUNG MAS NO. 88 RT 032/007', 'KEL. BUKIT SANGKAL KEC. KALIDONI PALEMBANG', null, 'Home Owner', '2017-12-31', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('765', '765', 'GERRY GIDEON NOVIANTO', 'KTP', '1671104911720003', '0000-00-00', '', '', 'JL. MAHONI NO. 5 RT/RW 005/008', 'KEL. BUNGER, KEC. SENEN, JAKARTA PUSAT', null, 'Home Owner', '2017-12-11', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('766', '766', 'CLARISSA TANIA', 'KTP', '3171040311730003', '0000-00-00', '', '', 'JL. KALIBARU TIMUR V NO. 55 A RT 007 RW 002', 'KEL. BUNGUR KEC. SENEN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('767', '767', 'RESKO ADRINO MARDANUS', 'KTP', '3171046905950002', '0000-00-00', '', '', 'KOMP PUSPOM ABRI RT 010 RW 002', 'KEL. CEGER KEC. CIPAYUNG, JAKARTA TIMUR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('768', '768', 'CHERLY', 'KTP', '3171010703800004', '0000-00-00', '', '', 'JL. SEMBOJA NO. 53 RT 009/001', 'KEL. CENGKARENG BARAT KEC. CENGKARENG JAKARTA BARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('769', '769', 'ADHI HANDOYO', 'KTP', '3173015908780007', '0000-00-00', '', '', 'JL. SIANTAN VI NO. 18 RT/RW 011/001', 'KEL. CENGKARENG BARAT KEC. CENGKARENG, JAKARTA BAR', null, 'Home Owner', '2018-01-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('770', '770', 'DHANY DARMAWAN', 'KTP', '3173012209750001', '0000-00-00', '', '', 'TMN PALEM LESTARI BLK A.12 NO. 32 RT 002 RW 016 ', 'KEL. CENGKARENG BARAT KEC. CENGKARENG, JAKARTA BAR', null, 'Home Owner', '2018-02-04', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('771', '771', 'HENRICA JOHANNES', 'KTP', '3173010407831003', '0000-00-00', '', '', 'APT CITY PARK TWR DA LT 11 NO.11 rt 008 rw 014', 'KEL. CENGKARENG TIMUR KEC. CENGKARENG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('772', '772', 'EKA LILYANA SUWARDI', 'KTP', '3173055004710001', '0000-00-00', '', '', 'APT CITYPARK TOWER G LT. 11 NO. 02 RT 009 RW 014', 'KEL. CENGKARENG TIMUR KEC. CENGKARENG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('773', '773', 'ANA MARDIANA', 'KTP', '3173025602790001', '0000-00-00', '', '', 'KP UTAN BAHAGIA RT 005 RW 004', 'KEL. CENGKARENG TIMUR KEC. CENGKARENG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('774', '774', 'VONY', 'KTP', '3173046603850004', '0000-00-00', '', '', 'APT CITY PARK TWR DC/05/10 RT 008/014', 'KEL. CENGKARENG TIMUR KEC. CENGKARENG JAKARTA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('775', '775', 'TULUS JATI PRABOWO', 'KTP', '6171044406900004', '0000-00-00', '', '', 'JL. KARANG KATES II NO. 4 RT/RW 002/011', 'KEL. CIBODAS BARU KEC. CIBODAS, KOTA TANGERANG', null, 'Home Owner', '2018-02-04', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('776', '776', 'FIZTRIANA', 'KTP', '3671092604940003', '0000-00-00', '', '', 'JL. EMPU GANDRING NO.12 RT 005 RW 009', 'KEL. CIBODAS BARU KEC. CIBODAS, TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('777', '777', 'DR. MELANIE M.HARLIE', 'KTP', '3671096702850001', '0000-00-00', '', '', 'JL. BIAK NO.56 RT/RW 005/011', 'KEL. CIDENG KEC. GAMBIR, JAKARTA PUSAT', null, 'Home Owner', '2017-12-03', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('778', '778', 'ELISABETH ASRIATI PUTRIASI', 'KTP', '3171015206470002', '0000-00-00', '', '', 'PERMATA CIMANGGIS CLUSTER MUTIARA C8/17 RT 003 RW 023', 'KEL. CIMPAEUN KEC. TAPOS, DEPOK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('779', '779', 'DESI', 'KTP', '1405014809890001', '0000-00-00', '', '', 'KP. CIMUNING RT/RW 002/007', 'KEL. CIMUNING KEC. MUSTIKA JAYA, KOTA BEKASI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('780', '780', 'REYNALDO RAVEND', 'KTP', '3275116712890001', '0000-00-00', '', '', 'KP. CIPENDAWA RT/RW 003/011', 'KEL. CIPENDAWA KEC. PACET, KAB. CIANJUR', null, 'Home Owner', '2018-01-06', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('781', '781', 'UMAR SEPRI HUSRIADI', 'KTP', '3203101006950004', '0000-00-00', '', '', 'ASR BRIMOB CIP BAWAH NO 10 C RT001/014', 'KEL. CIPINANG KEC. PULO GADUNG JAKARTA TIMUR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('782', '782', 'RICHIE ALEXANDER', 'KTP', '1671071209860005', '0000-00-00', '', '', 'PORIS INDAH BLOK C/284 RT/RW 006/006', 'KEL. CIPONDOH INDAH KEC. CIPONDOH, KOTA TANGERANG', null, 'Home Owner', '2017-12-19', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('783', '783', 'Virya Kurniawan Chandra', 'KTP', '3671052802900004', '0000-00-00', '', '', 'Villa Taman Bandara H-1 No.2 RT/RW : 014/008 Dadap Kosambi', 'KEL. DADAP KEC. KOSAMBI, KAB. TANGERANG', null, 'Home Owner', '2018-01-16', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('784', '784', 'VERONICA SUSILO', 'KTP', '3603140205900006', '0000-00-00', '', '', 'VILLA TAMAN BANDARA BLOK G-7 NO. 1 RT/RW 008/010', 'KEL. DADAP KEC. KOSAMBI, KABUPATEN TANGERANG', null, 'Home Owner', '2017-12-10', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('785', '785', 'YOSEPHUS BANI PERWIRA', 'KTP', '3603146502880008', '0000-00-00', '', '', 'KOMP. BPP BARU CLUSTER VANCOUVER BLOK HY3 NO. 5 RT/RW 015/-', 'KEL. DAMAI BARU KEC. BALIKPAPAN SELATAN, BALIKPAPA', null, 'Home Owner', '2018-01-28', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('786', '786', 'Joshua Andrew Mulia', 'KTP', '3175052501860004', '0000-00-00', '', '', 'Jl. Jaya Giri No.11', 'KEL. DANGIN PURI KELOD KEC. DENPASAR TIMUR, DENPAS', null, 'Home Owner', '2018-01-30', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('787', '787', 'CALVIN NOVA ASIKIN', 'KTP', '5171022305900002', '0000-00-00', '', '', 'BUKIT NOVO BLOK A 6/1 RT/RW 004/015', 'KEL. DEPOK, KEC. PANCORAN MAS, KOTA DEPOK', null, 'Home Owner', '2017-12-03', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('788', '788', 'SUSANA SETIAWAN', 'KTP', '3276011907900004', '0000-00-00', '', '', 'TAMAN RATU INDAH D1 NO 26 RT 006 RW 013, ', 'KEL. DURI KEPA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('789', '789', 'SILVIA WIJAYA', 'KTP', '3173054708690003', '0000-00-00', '', '', 'JL. KRESEK RAYA KAV NO 6. RT 009 RW 015', 'KEL. DURI KOSAMBI KEC. CENGKARENG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('790', '790', 'BONG NYONG KHIM', 'KTP', '3173015612770008', '0000-00-00', '', '', 'JL. MAHONI HIJAU III BLOK F4 NO.15 RT 006/009', 'KEL. DURI KOSAMBI KEC. CENGKARENG DKI JAKARTA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('791', '791', 'ALBERT KURNIAWAN DINATA', 'KTP', '3173017009790020', '0000-00-00', '', '', 'APART. GREEN PALM RESIDENCE BLOK B. 15/3 RT/RW 007/013', 'KEL. DURI KOSAMBI KEC. CENGKARENG, JAKARTA BARAT', null, 'Home Owner', '2018-01-06', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('792', '792', 'HARRY MARVIN S.', 'KTP', '3173011402890003', '0000-00-00', '', '', 'JL. H. MALI NO. 41 RT 006 RW 001 ', 'KEL. DURI KOSAMBI KEC. CENGKARENG, JAKARTA BARAT', null, 'Home Owner', '2018-02-13', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('793', '793', 'YONATHAN', 'KTP', '3173010602960001', '0000-00-00', '', '', 'KOSAMBI BARU BLOK CX-3 NO. 17 RT/RW 001/015', 'KEL. DURI KOSAMBI KEC. CENGKARENG, JAKARTA BARAT', null, 'Home Owner', '2018-01-05', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('794', '794', 'JOHANNES ADHI NUGRAHA', 'KTP', '3173012107920003', '0000-00-00', '', '', 'JL. FLAMBOYAN 1 C2/11A RT 009 RW 010 ', 'KEL. DURI KOSAMBI KEC. CNGKARENG, JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('795', '795', 'KOE SELDEN', 'KTP', '3173012212900006', '0000-00-00', '', '', 'GG. BALOK III NO. 22 RT 009/004', 'KEL. DURI UTARA KEC. TAMBORA JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('796', '796', 'KOE JULIANA', 'KTP', '3173042409900002', '0000-00-00', '', '', 'GG. BALOK III NO. 22 RT/RW 009/004', 'KEL. DURI UTARA KEC. TAMBORA, JAKARTA BARAT', null, 'Home Owner', '2018-01-14', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('797', '797', 'LOA, VIDORA', 'KTP', '3173044807790005', '0000-00-00', '', '', 'KAMP KRENDANG NO 9 RT/RW 007/008 ', 'KEL. DURI UTARA TAMBORA KEC. TAMBORA, JAKARTA BARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('798', '798', 'HERDIYAN', 'KTP', '3173046605840007', '0000-00-00', '', '', 'KP. KAMAL RT/RW 004/005', 'KEL. GAGA KEC. PAKUHAJI, KAB. TANGERANG', null, 'Home Owner', '2017-12-10', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('799', '799', 'IRWAN SANSTOSO', 'KTP', '3603156401920004', '0000-00-00', '', '', 'JL. RAWA TENGAH RT/RW 005/007 ', 'KEL. GALUR KEC. JOHAR BARU, JAKARTA PUSAT', null, 'Home Owner', '2018-12-21', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('800', '800', 'YULIANTI KURNIAWAN', 'KTP', '3171081811950004', '0000-00-00', '', '', 'KOMP. PONDOK INDAH BLOK G-8 RT 003 RW 001', 'KEL. GANTING PARAK GADANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('801', '801', 'FRANSISKA IRA RIMBA', 'KTP', '1371026107680006', '0000-00-00', '', '', 'GRAND DUTA TANGERANG BLOK JADE 6 NO 9 ', 'KEL. GEBANG RAYA KEC. PERIUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('802', '802', 'HENDRI', 'KTP', '3578254801810001', '0000-00-00', '', '', 'VILLA TANGERANG INDAH BLOK CC.4 NO 21 RT 010 RW 010', 'KEL. GEBANG RAYA KEC. PERIUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('803', '803', 'MICHAEL', 'KTP', '3671080510920002', '0000-00-00', '', '', 'VILLA TANGERANG REGENCY I BLOK KB. 1 NO. 12 RT/RW 001/011', 'KEL. GEBANG RAYA KEC. PERIUK, TANGERANG', null, 'Home Owner', '2018-01-13', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('804', '804', 'JIMMY ADITYALIM', 'KTP', '3671081006850002', '0000-00-00', '', '', 'VILLA TANGERANG INDAH BLOK DA 11 NO. 18 RT 011 RW 010', 'KEL. GEBANG RAYA KEC. PERIUK, TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('805', '805', 'YUDI', 'KTP', '3671083005920001', '0000-00-00', '', '', 'VILLA REGENSI TANGERANG II BLOK FD-5 NO. 26 RT. 008/010', 'KEL. GELAM JAYA KEC. PASAR KEMIS', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('806', '806', 'SRI AGUSTINA BE', 'KTP', '3603122501810013', '0000-00-00', '', '', 'VILA REGENSI TNG II BLOK FC-3/28 RT 007 RW 009', 'KEL. GELAM JAYA KEC. PASAR KEMIS, KABUPATEN TANGER', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('807', '807', 'ANDY GUNAWAN', 'KTP', '3603126502730004', '0000-00-00', '', '', 'VILLA REGENSI TNG II BLOK AA 4/1 RT 001 RW 005', 'KEL. GELAM JAYA KEC.PASAR KEMIS ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('808', '808', 'ROSITA HALIM', 'KTP', '3603120506950004', '0000-00-00', '', '', 'GERENDENG TEGAL JL PRIBADI IV NO 80 RT 004/ 011', 'KEL. GERENDENG KEC. KARAWACI, TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('809', '809', 'WEIDY HARTONO', 'KTP', '3671075502690005', '0000-00-00', '', '', 'JL. KEMENANGAN V NO 25 RT 005 RW 004', 'KEL. GLODOK KEC. TAMAN SARI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('810', '810', 'TAUFAN ATMADJA', 'KTP', '3173032510790003', '0000-00-00', '', '', 'JL KEMENANGAN VI NO 35 RT 004 RW 003 ', 'KEL. GLODOK KEC. TAMAN SARI, JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('811', '811', 'ATJE SANJAYA TJHANG', 'KTP', '3173032805720002', '0000-00-00', '', '', 'JL. KEMENANGAN V GG.2 NO.18 RT/RW: 001/003', 'KEL. GLODOK, KEC. TAMAN SARI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('812', '812', 'LUCIANA FELLENA DIRJAYA', 'KTP', '3173030209690003', '0000-00-00', '', '', 'TOAPEKONG I NO. 9 C RT. 002/011', 'KEL. GROGOL SELATAN KEC. KEBAYORAN LAMA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('813', '813', 'HADI RAHARDJA PHANGESTU', 'KTP', '3174055702940004', '0000-00-00', '', '', 'JL PULO ASEM NO. 38 RT/RW 011/001', 'KEL. JATI KEC. PULOGADUNG, JAKARTA TIMUR', null, 'Home Owner', '2018-01-05', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('814', '814', 'JIMMY HALIM', 'KTP', '3175020705900002', '0000-00-00', '', '', 'JL JELAMBAR BARU UTAMA VII NO.37A RT 009 RW 004 ', 'KEL. JELAMBAR BARU', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('815', '815', 'HERDI', 'KTP', '3173021203760002', '0000-00-00', '', '', 'JL SETIA JAYA RAYA NO.3 RT 001 RW 006', 'KEL. JELAMBAR BARU', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('816', '816', 'STEPHANIE LIVIA RIZAL', 'KTP', '3173021302790002', '0000-00-00', '', '', 'JL. JELAMBAR JAYA II  NO. 15-A RT/RW 005/003', 'KEL. JELAMBAR BARU KEC. GROGOL PETAMBURAN', null, 'Home Owner', '2017-12-05', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('817', '817', 'NG MELIA', 'KTP', '3173024508900006', '0000-00-00', '', '', 'JL. JELAMBAR UTARA NO 38 RT003/006', 'KEL. JELAMBAR BARU. KEC. GROGOL PETAMBURAN JAKARTA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('818', '818', 'JULIA TRISNO', 'KTP', '3173020410810005', '0000-00-00', '', '', 'JL.JELAMBAR BARU IV/28A RT 009/007', 'KEL. JELAMBAR KEC. GROGOL PETAMBURAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('819', '819', 'HANDOKO WIDJAJA', 'KTP', '3173026907880003', '0000-00-00', '', '', 'KOMP. RS JIWA JAKARTA RT/RW 002/004 ', 'KEL. JELAMBAR KEC. GROGOL PETAMBURAN, JAKARTA BARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('820', '820', 'WILIADI LIADINATA', 'KTP', '3173021511620006', '0000-00-00', '', '', 'JL. JELAMBAR BARU IV/28 A RT 009 RW 007', 'KEL. JELAMBAR KEC. PETAMBURAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('821', '821', 'SAHALA ALBERTO S.SH.LLM', 'KTP', '3173020403860011', '0000-00-00', '', '', 'MELATI MAS RESIDENCE BLOK SR 28 NO. 10 RT 001 RW 005', 'KEL. JELUPANG KEC. SERPONG UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('822', '822', 'HERYANI', 'KTP', '3674022001810001', '0000-00-00', '', '', 'MELATI MAS RESIDENCE BLOK V - 8/12 RT 015 RW 008', 'KEL. JELUPANG KEC. SERPONG UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('823', '823', 'STEVEN LOUIS', 'KTP', '3671056508730001', '0000-00-00', '', '', 'JLN PTB ANGKE NO.5 RT 006/002. ', 'KEL. JEMBATAN LIMA KEC. TAMBORA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('824', '824', 'KIM LAN LIM', 'KTP', '3173041209920001', '0000-00-00', '', '', 'JLN SAWAH LIO III NO.28 RT/RW 012/007 ', 'KEL. JEMBATAN LIMA KEC. TAMBORA JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('825', '825', 'APRIYANTI', 'KTP', '3173046101790002', '0000-00-00', '', '', 'MEGA KEBON JERUK BLOK B-5/9 RT/RW 003/009', 'KEL. JOGLO', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('826', '826', 'NALINI', 'KTP', '1571085104810001', '0000-00-00', '', '', 'TMN ALFA INDAH B4/8 RT 008 RW 007 ', 'KEL. JOGLO ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('827', '827', 'SIFAK UNISAK.M.M', 'KTP', '3173086308580005', '0000-00-00', '', '', 'BUKIT KENCANA ESTAT 3 NO. 25 RT/RW 015/-', 'KEL. KALI BALAU KENCANA KEC. KEDAMAIAN, BANDAR LAM', null, 'Home Owner', '2018-01-27', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('828', '828', 'JULIAR CHANDRA', 'KTP', '1871125511690004', '0000-00-00', '', '', 'JL. TAMPAK SIRING TIMUR I / 20 RT/RW : 004/017', 'KEL. KALIDERES KEC. KALIDERES', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('829', '829', 'YORDAN SAPUTRA DAN RYAN NATAGAWA RIBUAN', 'KTP', '3173061207810006', '0000-00-00', '', '', 'CITRA GARDEN I BLOK F 7/5 RT 005 RW 009', 'KEL. KALIDERES KEC. KALIDERES, JAKARTA BARAT', null, 'Home Owner', '2018-01-28', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('830', '830', 'LAIJ, VIVI JULIANTY', 'KTP', '3671042109940001', '0000-00-00', '', '', 'JL ADELYA I BLOK I NO 35 RT/RW 005/013', 'KEL. KALIJAGA KEC. HARJAMUKTI KOTA CIREBON', null, 'Home Owner', '2017-12-03', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('831', '831', 'EVY ROSA SUHARTANA', 'KTP', '3274034607880017', '0000-00-00', '', '', 'GOLD COAST AVENUE NO. 27 BGM PIK RT 004 RW 006', 'KEL. KAMAL MUARA KEC. PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2018-02-03', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('832', '832', 'THE, ELLIE', 'KTP', '3172025706650003', '0000-00-00', '', '', 'JL. KAMPUNG BALI GG NO.26/5, 005/008, ', 'KEL. KAMPUNG BALI KEC. TANAH ABANG ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('833', '833', 'SUMADI', 'KTP', '3171074710780003', '0000-00-00', '', '', 'JL. DELIMA RT/RW 004/002 ', 'KEL. KAMPUNG BARU KEC. TANJUNGPINANG BARAT, TANJUN', null, 'Home Owner', '2017-12-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('834', '834', 'LELA SARI', 'KTP', '2172012504740003', '0000-00-00', '', '', 'JL. PEDONGKELAN RT 010/016', 'KEL. KAPUK KEC. CENGKARENG JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('835', '835', 'YOSSY HANDAYANI LIMANTO', 'KTP', '3173016603910003', '0000-00-00', '', '', 'KAPUK RAYA RT/RW 004/011', 'KEL. KAPUK KEC. CENGKARENG, JAKARTA BARAT', null, 'Home Owner', '2017-12-14', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('836', '836', 'IKA DINA PUJININGTYAS', 'KTP', '3173016212610006', '0000-00-00', '', '', 'RUSUN BLOK A LANTAI 1 NO. 25 RT/RW 001/009', 'KEL. KAPUK MUARA KEC. ', null, 'Home Owner', '2017-12-08', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('837', '837', 'VELEN', 'KTP', '3172014904800001', '0000-00-00', '', '', 'JL. MEDITERANIA BOULEVARD PIK NO 39 RT 009 RW 007', 'KEL. KAPUK MUARA KEC. PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('838', '838', 'SUMIYATI PAULINA JAUHARI', 'KTP', '3172012607900005', '0000-00-00', '', '', 'DUTA HARAPAN INDAH BLOK J NO. 9 RT 007 RW 002', 'KEL. KAPUK MUARA KEC. PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('839', '839', 'ARRYANTO UTOMO', 'KTP', '3172016104840010', '0000-00-00', '', '', 'DUTA HARAPAN INDAH H NO 16. RT 007/002. ', 'KEL. KAPUK MUARA KEC. PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('840', '840', 'SUYANTI', 'KTP', '3172012307650002', '0000-00-00', '', '', 'JL BAHTERA PERMAI I NO 52 RT 10/07', 'KEL. KAPUK MUARA KEC. PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('841', '841', 'YANG CHARRY WIJAYA', 'KTP', '3173044403880010', '0000-00-00', '', '', 'VIKAMAS RAYA BLOK F.II NO. 19A RT 013/005', 'KEL. KAPUK MUARA KEC. PENJARINGAN JAKARTA UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('842', '842', 'TERI GUNAWAN', 'KTP', '3172012907850001', '0000-00-00', '', '', 'DUTA HARAPAN INDAH BLOK P NO. 57 RT/RW 007/002', 'KEL. KAPUK MUARA KEC. PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2018-02-06', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('843', '843', 'MARKO BAKAHIA', 'KTP', '3173042102920005', '0000-00-00', '', '', 'JL. KARET SAWAH II NO. 11 RT/RW 008/003', 'KEL. KARET SEMANGGI KEC. SETIA BUDI, JAKARTA SELAT', null, 'Home Owner', '2018-01-30', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('844', '844', 'PUNDAWANI', 'KTP', '3175072403820012', '0000-00-00', '', '', 'JL. KARTINI IX DALAM NO. 2 RT/RW 014/003', 'KEL. KARTINI KEC. SAWAH BESAR, JAKARTA PUSAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('845', '845', 'STEVEN', 'KTP', '3171025301680002', '0000-00-00', '', '', 'JL. KESEDERHANAAN NO. 17 RT 006 RW 004', 'KEL. KEAGUNGAN KEC. TAMAN SARI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('846', '846', 'SUSILAWATI', 'KTP', '3273011605900005', '0000-00-00', '', '', 'TAMAN KEDOYA PERMAI A II/6 RT 005 RW 007', 'KEL. KEBON JERUK KEC. KEBON JERUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('847', '847', 'SEKUNDUS', 'KTP', '3173056810720003', '0000-00-00', '', '', 'JL. JENGKI GG. KI ALAM RT/RW 008/002', 'KEL. KEBON PALA KEC. MAKASAR, DKI JAKARTA', null, 'Home Owner', '2018-02-13', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('848', '848', 'AHMAD ZARIFUDDIN', 'KTP', '3175082809800008', '0000-00-00', '', '', 'KAMP KALIMATI RT/RW 008/006', 'KEL. KEDAUNG KALI ANGKE KEC.', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('849', '849', 'JOHANNES ENDY FIRMANSYAH', 'KTP', '3173012206850022', '0000-00-00', '', '', 'JL. KEDOYA DURI RAYA RT/RW 001/004 ', 'KEL. KEDOYA SELATAN KEC. KEBON JERUK JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('850', '850', 'ARTEDDI', 'KTP', '3173021502880004', '0000-00-00', '', '', 'JL. SURYA MUSTIKA IV B/32 RT 013 RW 005', 'KEL. KEDOYA UTARA KEC. KEBON JERUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('851', '851', 'EDWIN SUTEDJA', 'KTP', '317305050581007', '0000-00-00', '', '', 'GREED GARDEN BLOK I 6 NO. 12 A RT001/004', 'KEL. KEDOYA UTARA KEC. KEBON JERUK JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('852', '852', 'FEBIYANTI GUNADI', 'KTP', '3173051412810004', '0000-00-00', '', '', 'JL. PESING KONENG RT/RW 006/002', 'KEL. KEDOYA UTARA KEC. KEBON JERUK, JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('853', '853', 'SHERLY LOKADHI', 'KTP', '3173054502940004', '0000-00-00', '', '', 'GREEN GARDEN BLOK B XII/I RT 013 RW 003 ', 'KEL. KEDOYA UTARA KEC. KEBUN JERUK JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('854', '854', 'KWOK KUMALA DEWI', 'KTP', '3173056111780013', '0000-00-00', '', '', 'JL. JANUR RAYA BLOK E/11 RT 003 RW 007', 'KEL. KELAPA DUA KEC. KEBON JERUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('855', '855', 'SAMSU ROSADI', 'KTP', '3175035710750005', '0000-00-00', '', '', 'JL. SINAI V NO. 50 VILLA ILHAMI RT 003 RW 015', 'KEL. KELAPA DUA KEC. KELAPA DUA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('856', '856', 'CAHAYADI', 'KTP', '3603280107670001', '0000-00-00', '', '', 'GADING KIRANA TIMUR IV  BLOK G5 NO 20 RT 009 RW 006', 'KEL. KELAPA GADING BARAT KEC. KELAPA GADING', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('857', '857', 'FERI SAPRY', 'KTP', '3172060507730001', '0000-00-00', '', '', 'APT FRENCH WALK TOWER NICE GARDEN LT 12 O RT011/RW019 ', 'KEL. KELAPA GADING BARAT KEC. KEPALA GADING, JAKAR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('858', '858', 'ALBERTUS IRWAN IW', 'KTP', '1472010602880041', '0000-00-00', '', '', 'JL GADING PUTIH IV SC 1/2 RT 007/002', 'KEL. KELAPA GADING TIMUR KEC. KELAPA GADING JAKART', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('859', '859', 'ADITYA WIRANATA', 'KTP', '3172061909790007', '0000-00-00', '', '', 'JL. P DEWA III BLOK P.3/23 MDL RT 005 RW 002', 'KEL. KELAPA INDAH KEC. TANGERANG, TANGERANG', null, 'Home Owner', '2018-02-03', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('860', '860', 'YULIANI HENDRAWAN', 'KTP', '3671012102930001', '0000-00-00', '', '', 'KEPU DALAM I/ 284 A RT/RW 002/004', 'KEL. KEMAYORAN, KEC. KEMAYORAN, JAKARTA PUSAT', null, 'Home Owner', '2017-12-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('861', '861', 'SUTOMO', 'KTP', '317106507770006', '0000-00-00', '', '', 'JL. BUCKINGHAM RAYA NO 79 PURI MANSION RT 002 RW 001', 'KEL. KEMBANGAN SELATAN KEC. KEMBANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('862', '862', 'FENNY WIJAYA', 'KTP', '3173021709820005', '0000-00-00', '', '', 'JL. RAYA TAMANKOTA NO. 67 RT 016/005', 'KEL. KEMBANGAN UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('863', '863', 'HARRY ANGKIRIWANG', 'KTP', '3173086011850004', '0000-00-00', '', '', 'JL. P PARI G-1/9 RT 010 RW 009', 'KEL. KEMBANGAN UTARA KEC. KEMBANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('864', '864', 'SISILIA WIJAYA', 'KTP', '3173082008660005', '0000-00-00', '', '', 'KP.SALO RT 008 RW 007 ', 'KEL. KEMBANGAN UTARA KEC. KEMBANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('865', '865', 'DANDY LIMARDI', 'KTP', '3173086909770001', '0000-00-00', '', '', 'KP BUGIS RT/RW  002/003', 'KEL. KEMBANGAN UTARA KEC. KEMBANGAN JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('866', '866', 'ANDRIAS WIRADI', 'KTP', '3173080404830013', '0000-00-00', '', '', 'TAMAN KOTA BLOK E VI NO 2 RT.013 RW.005', 'KEL. KEMBANGAN UTARA KEC.KEMBANGAN, JAKARTA BARAT', null, 'Home Owner', '2017-12-23', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('867', '867', 'BOBBY NOVENES', 'KTP', '3173081908840010', '0000-00-00', '', '', 'JL. KS TUBUN I NO. 17 RT 007/002', 'KEL. KOTA BAMBU SELATAN KEC. PAL MERAH, JAKARTA BA', null, 'Home Owner', '2017-12-08', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('868', '868', 'RAMLI', 'KTP', '3173070311860006', '0000-00-00', '', '', 'JL. KRAMAT PULO DALAM II / F 18 B RT 010 RW 006', 'KEL. KRAMAT KEC. SENEN  ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('869', '869', 'JULIANA ONG PEI I', 'KTP', '3171040207670001', '0000-00-00', '', '', 'JL. S. SAMBAS VII NO. 16 RT/RW 006/005', 'KEL. KRAMAT PELAKEC. KEBAYORAN BARU, JAKARTA SELAT', null, 'Home Owner', '2018-02-10', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('870', '870', 'VIVI FITRIANI', 'KTP', '3174076411580003', '0000-00-00', '', '', 'JL. KRENDANG TIMUR NO. 27 A RT/RW 003/001', 'KEL. KRENDANG KEC. TAMBORA, JAKARTA BARAT', null, 'Home Owner', '2018-01-19', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('871', '871', 'CAROLINE', 'KTP', '3173045305900007', '0000-00-00', '', '', 'JL. KEUTAMAAN DALAM NO. 43 RT/RW 014/004', 'KEL. KRUKUT KEC. TAMAN SARI, JAKARTA BARAT', null, 'Home Owner', '2018-01-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('872', '872', 'VERONIKA', 'KTP', '3171015704870004', '0000-00-00', '', '', 'JL. BEO RAYA BLOK C8/25 PONDOK INDAH RT/RW 002/009 ', 'KEL. KUTABUMI KEC. PASAR KEMIS, KAB. TANGERANG', null, 'Home Owner', '2018-01-29', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('873', '873', 'YADI', 'KTP', '3603125902770006', '0000-00-00', '', '', 'VILLA TANGERANG ELOK BLOK A 7/9 RT 014 RW 007', 'KEL. KUTAJAYA KEC. PASAR KEMIS', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('874', '874', 'MESJE SUTIONO', 'KTP', '3603121512700012', '0000-00-00', '', '', 'JL. KWITANG RAYA NO 27 A RT001/RW004', 'KEL. KWITANG KEC. SENEN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('875', '875', 'MARIA DIANAWATI', 'KTP', '3171046912650001', '0000-00-00', '', '', 'KRAMAT KWITANG 1C / 5C RT 002 RW 004', 'KEL. KWITANG KEC. SENEN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('876', '876', 'ANDRIO WICAKSANA PUTRA', 'KTP', '3171044409810004', '0000-00-00', '', '', 'JL. TIUNG NO. 1 RT 003 RW 007', 'KEL. LABUHBARU TIMUR KEC. PAYUNG SESAKI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('877', '877', 'IVANA YULIA PUSPOWADJOJO', 'KTP', '1471052311910021', '0000-00-00', '', '', 'JL. SOMPOK NO. 46 RT 002 RW 005', 'KEL. LAMPER LOR KEC. SEMARANG SELATAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('878', '878', 'ERNAWATI', 'KTP', '3374075507910002', '0000-00-00', '', '', 'PERUM LEGOK PERMAI B1 /C1 RT.006/RW.007 ', 'KEL. LEGOK KEC . LEGOK ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('879', '879', 'ALVIN DJAJA PUTRA', 'KTP', '3603206809850001', '0000-00-00', '', '', 'VILLA MELATI MAS BLOK SR.24/40 RT/RW 004/001', 'KEL. LENGKOP KARYA KEC. SERPONG UTARA, TANGERANG S', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('880', '880', 'RAHMAT', 'KTP', '3674020501890002', '0000-00-00', '', '', 'KOMP.SRI USAHA BLOK H-01 RT 005 / RW 002', 'KEL. LUBUK BAJA KOTA KEC. LUBUK BAJA, BATAM ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('881', '881', 'FENNY SENDY PARUNTU', 'KTP', '2171060608759003', '0000-00-00', '', '', 'JL.CAMAR NO 116 LINGKUNGAN V 005 ', 'KEL. MALENDENG KEC. TIKALA ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('882', '882', 'SCHOLASTICA MARIA ELLYS', 'KTP', '7171054203660001', '0000-00-00', '', '', 'JL. BUNI NO.27 B, RT/RW 006/003', 'KEL. MANGGA BESAR, KEC.TAMAN SARI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('883', '883', 'HERMAN DJOHARI', 'KTP', '3173035910680001', '0000-00-00', '', '', 'JL. P JAYAKARTA 22 RT 002 RW 006', 'KEL. MANGGA DUA SELATAN KEC. SAWAH BESAR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('884', '884', 'STEVEN TJUNG', 'KTP', '3171020208680002', '0000-00-00', '', '', 'JL. SUKA DAMAI RT 003/-', 'KEL. MANGKOL KEC. PANGKALAN BARU, BANGKA TENGAH', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('885', '885', 'SIAUW LIE PAO', 'KTP', '1904020907750001', '0000-00-00', '', '', 'JL LASINRANG NO 38B RT. 003/003', 'KEL. MANGKURA KEC. UJUNG PANDANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('886', '886', 'HENDRA HORATIAN', 'KTP', '7371046306610001', '0000-00-00', '', '', 'MARGOREJO INDAH 12/C-310 RT/RW 003/008', 'KEL. MARGOREJO KEC. WONOCOLO, KOTA SURABAYA', null, 'Home Owner', '2018-01-10', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('887', '887', 'PATRICK HORATIAN', 'KTP', '3578022303620004', '0000-00-00', '', '', 'MARGOREJO INDAH 12/C-310 RT 003 RW 008 ', 'KEL. MARGOREJO KEC. WONOCOLO, SURABAYA', null, 'Home Owner', '2018-01-04', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('888', '888', 'RESSI BONTI MUHAMMAD', 'KTP', '3578042203920010', '0000-00-00', '', '', 'MEDANG LESTARI BLOK B.III/B.11 RT/RW 002/006', 'KEL. MEDANG KEC.', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('889', '889', 'LEONARDO', 'KTP', '3603221904960001', '0000-00-00', '', '', 'JL. KARAWACI LEGOK BLOK D2 NO. A2 RT/RW 007/013', 'KEL. MEDANG KEC. PAGEDANGAN, KAB. TANGERANG', null, 'Home Owner', '2018-02-10', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('890', '890', 'RENI HERLIANTI', 'KTP', '0', '0000-00-00', '', '', 'MEDANG LESTARI BLOK B.II/B.11 RT/RW 002/012', 'KEL. MEDANG KEC. PAGEDANGAN, KAB. TANGERANG', null, 'Home Owner', '2017-12-10', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('891', '891', 'HARRI THUNARDI THOENG', 'KTP', '3603227107670001', '0000-00-00', '', '', 'GRAHA PESONA BLOK 10 RT 19/27 RT 002/010 ', 'KEL. MEKAR BAKTI KEC. PANONGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('892', '892', 'SUI HOA', 'KTP', '3603196602750001', '0000-00-00', '', '', 'SIRNAGALIH  RT 004 RW 001', 'KEL. MEKAR SARI  KEC. NEGLASARI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('893', '893', 'ARDIAN', 'KTP', '3671104502640001', '0000-00-00', '', '', 'JL. RAJAWALI NO.4 RT 002 RW 014 ', 'KEL. MEKARSARI KEC. CIMANGGIS, DEPOK', null, 'Home Owner', '2018-01-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('894', '894', 'SANTI', 'KTP', '3276021908830016', '0000-00-00', '', '', 'JL. SOLIHIN GP NO. 03 RT 009/003', 'KEL. MELINTANG KEC. RANGKUI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('895', '895', 'PETRUS DWI SURJOPUTRO', 'KTP', '1971044404800004', '0000-00-00', '', '', 'TAMAN MERUYA ILIR BLOK E6. NO 17 RT 020 RW 004', 'KEL. MERUYA UTARA KEC. KEMBANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('896', '896', 'NATHANIA', 'KTP', '3173050911680007', '0000-00-00', '', '', 'TAMAN ARIES E-15/21 RT 008 RW 008 ', 'KEL. MERUYA UTARA KEC. KEMBANGAN ', null, 'Home Owner', '2017-12-09', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('897', '897', 'ROEDI HARTONO BOEDI J', 'KTP', '3173085801820003', '0000-00-00', '', '', 'TAMAN ARIES BLOK A3/ 22 -23 RT 005 RW 009', 'KEL. MERUYA UTARA KEC. KEMBANGAN ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('898', '898', 'BUDI SUSILO', 'KTP', '3173082912580004', '0000-00-00', '', '', 'TMN MERUYA ILIR H.7 / 5 RT. 005/007', 'KEL. MERUYA UTARA KEC. KEMBANGAN, JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('899', '899', 'CHRISTHOPER DIMAS', 'KTP', '3173080105660001', '0000-00-00', '', '', 'KAV. DKI BLOK 85 NO 11 RT 004/010', 'KEL. MERUYA UTARA. KEC. KEMBANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('900', '900', 'HUSIN ISNA', 'KTP', '3173081108880009', '0000-00-00', '', '', 'JL PABUARAN NO 16 RT/RW 005/002 ', 'KEL. NYOMPLONG ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('901', '901', 'ROBERT CHANDRA', 'KTP', '3272041512580021', '0000-00-00', '', '', 'JALAN PABUARAN NO 16 RT/RW 005/002 ', 'KEL. NYOMPLONG KEC.SUKABUMI, SUKABUMI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('902', '902', 'ELIA', 'KTP', '3272041404910041', '0000-00-00', '', '', 'JL. KENANGA RT/RW 025/008 ', 'KEL. PAAL SATU ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('903', '903', 'ARUM SENTIA', 'KTP', '1902016105850004', '0000-00-00', '', '', 'KOMP. MERPATI R/5 RT/RW 028/011', 'KEL. PABEAN KEC. SEDATI, KAB. SIDOARJO', null, 'Home Owner', '2018-01-05', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('904', '904', 'LILIS MARIANIE/LILIS JONG', 'KTP', '6471026509940001', '0000-00-00', '', '', 'JL. MERDEKA NO. 116 A-B RT 001 RW 002', 'KEL. PABUARAN KEC. KARAWACI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('905', '905', 'LILIS MARIANIE/LILIS JONG', 'KTP', '3671075304650005', '0000-00-00', '', '', 'JL. MERDEKA NO. 116 A-B RT 001 RW 002', 'KEL. PABUARAN KEC. KARAWACI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('906', '906', 'LILIS MARIANIE / LILIS JONG', 'KTP', '3671075304650005', '0000-00-00', '', '', 'JL. MERDEKA NO. 116 A-B RT 001/RW002', 'KEL. PABUARAN KEC. KARAWACI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('907', '907', 'LUMBA GUNAWAN', 'KTP', '3671075304650005', '0000-00-00', '', '', 'JL. DHARMA BAKTI RT 003 / RW 004 ', 'KEL. PABUARAN KEC. KARAWACI, KOTA TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('908', '908', 'RAHMAT FITRIANTO', 'KTP', '3671073105880004', '0000-00-00', '', '', 'ALAI RT/RW : -/-', 'KEL. PADANG GELUGUR, KEC. PADANG GELUGUR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('909', '909', 'VERA HERAWATI', 'KTP', '1308172904890002', '0000-00-00', '', '', 'JL. PADEMANGAN IV GG. 25 RT. 004/001', 'KEL. PADEMANGAN TIMUR KEC. PADEMANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('910', '910', 'Yunita Anggriani', 'KTP', '3172054810720001', '0000-00-00', '', '', 'JL. PADEMANGAN VII NO. 2 RT/RW 015/001', 'KEL. PADEMANGAN TIMUR KEC. PADEMANGAN, JAKARTA UTA', null, 'Home Owner', '2017-12-13', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('911', '911', 'CHRISTHOPORUS RANDY R.', 'KTP', '3172025506740024', '0000-00-00', '', '', 'GRAHA RAYA BINTARO BLOK F-1 NO. 10 RT/RW 001/011', 'KEL. PAKU JAYA KEC. SERPONG UTARA, TANGERANG SELAT', null, 'Home Owner', '2018-01-16', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('912', '912', 'WELLYANA HUI', 'KTP', '3674021310850003', '0000-00-00', '', '', 'JL. KOL POL M. THAHER RT/RW 024/-', 'KEL. PAKUAN BARU KEC. JAMBI SELATAN, KOTA JAMBI', null, 'Home Owner', '2017-12-07', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('913', '913', 'ANGELIA', 'KTP', '1571025510630001', '0000-00-00', '', '', 'GRBJ. BOUGENVILLE LOKA M3/15 RT/RW 002/008', 'KEL. PAKUJAYA KEC. SERPONG UTARA ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('914', '914', 'SURIANTO WIDJAYA, SE', 'KTP', '1871035307850005', '0000-00-00', '', '', 'JL. KELAPA KOPYOR IV CA. 18/3 GADING SERPONRT 005 RW 009', 'KEL. PAKULONAN BARAT KEC. KELAPA DUA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('915', '915', 'MIARNA  SE', 'KTP', '3603281111680012', '0000-00-00', '', '', 'JL KELAPA PUAN 22 BLOK AK2 NO 28', 'KEL. PAKULONAN BARAT KEC. KELAPA DUA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('916', '916', 'BENNY TOHAR, S. KOM', 'KTP', '3603286008730002', '0000-00-00', '', '', 'SERENADE LAKE BLOK B9 NO 7 RT/RW 001/021', 'KEL. PAKULONAN BARAT KEC. KELAPA DUA, KABUPATEN TA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('917', '917', 'MARLIN MARGARET TAMBUN', 'KTP', '3603282303780009', '0000-00-00', '', '', 'JL PALMERAH III NO 27 a RT 005 RW 006 ', 'KEL. PALMERAH KEC. PALMERAH', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('918', '918', 'FERRYADI WILLIYANTO', 'KTP', '3174104908860010', '0000-00-00', '', '', 'JL. KEMANGGISAN ILIR VI NO. 35 RT/RW 005/012', 'KEL. PALMERAH KEC. PALMERAH, JAKARTA BARAT', null, 'Home Owner', '2017-12-08', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('919', '919', 'RATNAWATI', 'KTP', '3173071604790004', '0000-00-00', '', '', 'JL. HOS COKROAMINOTO NO. 123 ', 'KEL. PANDAU HILIR KEC. MEDAN PERJUANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('920', '920', 'EDDY YODO', 'KTP', '1271184906560001', '0000-00-00', '', '', 'JL HOS COKROAMINOTO NO 44 MDN ', 'KEL. PANDAU HULU I ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('921', '921', 'ARAMLI', 'KTP', '1271011810580001', '0000-00-00', '', '', 'JL.BAWAL RT 003 RW 003', 'KEL. PANIPAHAN KEC. PASIR LIMAU KAPAS, RIAU', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('922', '922', 'NIKOLAS PRANATRA ONGKOWIDJOJO', 'KTP', '1407062106680001', '0000-00-00', '', '', 'JL. PASUKETAN NO. 58 RT 001 RW 009', 'KEL. PANJUNAN KEC. LEMAHWUNGKUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('923', '923', 'EDRIA LEONIEVIRSA AGATA', 'KTP', '3274022109880003', '0000-00-00', '', '', 'JL PAPANGGO II C NO 58 RT 005 RW 003', 'KEL. PAPANGGO KEC. TANJUNG PRIOK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('924', '924', 'x', 'KTP', '3172026008790002', '0000-00-00', '', '', 'KP. PURNAMA AGUNG IV NO. C-8 RT/RW 005/005', 'KEL. PARIT TOKAYA KEC. PONTIANAK SELATAN, PONTIANA', null, 'Home Owner', '2018-01-24', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('925', '925', 'TJONG, ROBIN SANJAYA', 'KTP', '6171016307900007', '0000-00-00', '', '', 'CITRA 2 BLOK D-6/23 RT/RW 004/019K', 'KEL. PEGADUNGAN ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('926', '926', 'WILLIAM', 'KTP', '3173060805840015', '0000-00-00', '', '', 'CITRA GARDEN 2 BLOK I-4 NO. 12 A RT/RW 001/012', 'KEL. PEGADUNGAN ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('927', '927', 'ALICE', 'KTP', '3172010204940003', '0000-00-00', '', '', 'PERMATA TAMAN PALEM BLOK D2 NO 21 RT/RW 005/003', 'KEL. PEGADUNGAN ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('928', '928', 'SANNITA ANGGRAENI ATMADJA', 'KTP', '1271105612560005', '0000-00-00', '', '', 'CITRA GARDEN 2 BLOK C-2/2 RT 003 RW 019', 'KEL. PEGADUNGAN KEC. KALI DERES', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('929', '929', 'SUI FONG', 'KTP', '3173065403670004', '0000-00-00', '', '', 'GOLDEN PALM RESIDENCE BLOK D NO. 2 RT 002 RW 004', 'KEL. PEGADUNGAN KEC. KALI DERES', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('930', '930', 'FERRIC CHRISTIAN', 'KTP', '360312540260004', '0000-00-00', '', '', 'CITRA 3 BLOK B-6/17 RT 009 RW 013', 'KEL. PEGADUNGAN KEC. KALIDERES', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('931', '931', 'JANI PURWANA', 'KTP', '3173060902902900002', '0000-00-00', '', '', 'TMN SURYA V BLOK JJ 3/31 RT. 004/017', 'KEL. PEGADUNGAN KEC. KALIDERES', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('932', '932', 'DESI YANTI', 'KTP', '3173066508650007', '0000-00-00', '', '', 'JL UTAN JATI RT 011/11', 'KEL. PEGADUNGAN KEC. KALIDERES JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('933', '933', 'RIWANTO', 'KTP', '3173064912830013', '0000-00-00', '', '', 'APARTEMEN PERMATA SURYA I LT.4 TOWER E NO.5/6 RT 009 RW 017', 'KEL. PEGADUNGAN KEC. KALIDERES, JAKARTA BARAT', null, 'Home Owner', '2018-01-10', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('934', '934', 'JESSLYN', 'KTP', '3171022010870004', '0000-00-00', '', '', 'APT. PERMATA SURYA I TWR A NO.101 RT 008 / RW 017', 'KEL. PEGADUNGAN KEC. KALIDERES, JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('935', '935', 'DARWIN ISKANDAR', 'KTP', '1271154801900001', '0000-00-00', '', '', 'KP. MAJA RT/RW  008/005 ', 'KEL. PEGADUNGAN KEC. KALIDERES, JAKARTA BARAT', null, 'Home Owner', '2017-12-09', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('936', '936', 'JEREMY HERMANTO', 'KTP', '3173060204810013', '0000-00-00', '', '', 'JL. KELAPA PUAN TIMUR VI BLOK NB 7/32 RT 006/012', 'KEL. PEGANGSAAN DUA KEC. KELAPA GADING JAKARTA UTA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('937', '937', 'AGUNG HADIYANTO', 'KTP', '3172062711690001', '0000-00-00', '', '', 'JL CIKINI AMPIUN RT 014 RW 001', 'KEL. PEGANGSAAN KEC. MENTENG', null, 'Home Owner', '2017-12-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('938', '938', 'MICHAEL SETIAWAN SANYOTO', 'KTP', '3171065811910003', '0000-00-00', '', '', 'JL. ANTOSURA LEMBAH PUJIAN C-12Br/linkPENGUKUH ', 'KEL. PEGUYANGAN KANGIN ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('939', '939', 'SRI MURNI', 'KTP', '5171041901940002', '0000-00-00', '', '', 'JL. B7 BLOK A22 NO.4 RT007/RW013', 'KEL. PEJAGALAN KEC PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('940', '940', 'ASI', 'KTP', '1407064310920001', '0000-00-00', '', '', 'TELUK GONG JL. X NO. 172', 'KEL. PEJAGALAN KEC. PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('941', '941', 'NOVIA FARTINI', 'KTP', '3172015811790005', '0000-00-00', '', '', 'JL. TELUK GONG RT 012 RW 012', 'KEL. PEJAGALAN KEC. PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('942', '942', 'SUHERMAN', 'KTP', '3172016211700003', '0000-00-00', '', '', 'TELUK GONG JL SIRI RAYA BLOK P II/ 10 RT 003 RW 012', 'KEL. PEJAGALAN KEC. PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('943', '943', 'ADRIANI BUYUNG', 'KTP', '3172012110880001', '0000-00-00', '', '', 'JL TELUK GONG RT 002.008 ', 'KEL. PEJAGALAN KEC. PENJARINGAN ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('944', '944', 'INDRA', 'KTP', '3172014608800007', '0000-00-00', '', '', 'TELUK GONG A I NO.28 RT 001 RW 010', 'KEL. PEJAGALAN KEC. PENJARINGAN , JAKARTA UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('945', '945', 'MEXSON FITRI LIE', 'KTP', '3172011109850005', '0000-00-00', '', '', 'JL. BIDARA RAYA NO. 14 RT 012/004', 'KEL. PEJAGALAN KEC. PENJARINGAN JAKARTA UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('946', '946', 'BRIGITTE BAHTSEBA', 'KTP', '647204187880005', '0000-00-00', '', '', 'JL. A. TELUK GONG RT/RW 013/010', 'KEL. PEJAGALAN KEC. PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2017-12-15', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('947', '947', 'JENNIFER', 'KTP', '3172016302800001', '0000-00-00', '', '', 'TELUK GONG JL. TERI I NO. 9 RT/RW 016/012', 'KEL. PEJAGALAN KEC. PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2018-01-12', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('948', '948', 'ARIFIN SUANDY', 'KTP', '3172016107931001', '0000-00-00', '', '', 'PETRATEAN BARAT GG II NO. 97 RT/RW 004/003', 'KEL. PEKALIPAN KEC. PEKALIPAN, CIREBON', null, 'Home Owner', '2018-01-07', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('949', '949', 'RITA', 'KTP', '3274040402910009', '0000-00-00', '', '', 'JL PELITA NO 12 RT 003 RW 006', 'KEL. PEKOJAN KEC. TAMBORA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('950', '950', 'MELLY', 'KTP', '3173045608700001', '0000-00-00', '', '', 'JL. PEJAGALAN I NO. 28 RT 003 RW 005', 'KEL. PEKOJAN KEC. TAMBORA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('951', '951', 'LIM YENNY', 'KTP', '3172015003780011', '0000-00-00', '', '', 'JL. GEDONG PANJANG II NO.19 RT 001 RW 010 ', 'KEL. PEKOJAN KEC. TAMBORA, JAKARTA BARAT ', null, 'Home Owner', '2018-01-18', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('952', '952', 'DAVID AGUNG SUSANTO', 'KTP', '3173044201800013', '0000-00-00', '', '', 'PEKUNDEN TENGAH NO. 1071 RT/RW 004/002', 'KEL. PEKUNDEN KEC. SEMARANG TENGAH, KOTA SEMARANG', null, 'Home Owner', '2018-01-31', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('953', '953', 'PHILIP SUTEJO', 'KTP', '3374012107910001', '0000-00-00', '', '', 'JL. TELUK GONG RAYA BLOK C 4/20 RT. 007/017', 'KEL. PENJAGALAN KEC. PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('954', '954', 'HENDRY/CHUN CHUN', 'KTP', '1272021001950001', '0000-00-00', '', '', 'JL TANAH PASIR NO 27 RT/RW 003/007 ', 'KEL. PENJARINGAN KEC. PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2017-12-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('955', '955', 'DEVIE YULIANA', 'KTP', '3172011305910005', '0000-00-00', '', '', 'JL. KP BARU KB KOJA RT/RW 007/015 ', 'KEL. PENJARINGAN KEC. PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2017-12-07', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('956', '956', 'HERU SUGARA', 'KTP', '3172016806820014', '0000-00-00', '', '', 'JL. PETIR UTAMA NO. 42A RT/RW 003/003', 'KEL. PETIR KEC. CIPONDOH, TANGERANG', null, 'Home Owner', '2018-02-11', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('957', '957', 'SHERLEY TJANDRA', 'KTP', '3671050910770005', '0000-00-00', '', '', 'JL. TANAH ABANG IV NO.34F RT/RW 003/003', 'KEL. PETOJO SELATAN KEC. GAMBIR, JAKARTA PUSAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('958', '958', 'MEILIYANA', 'KTP', '3171014109800001', '0000-00-00', '', '', 'JL. SADAR IV NO. 15 A RT 006 RW 004', 'KEL. PETOJO UTARA KEC. GAMBIR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('959', '959', 'KEVIN SASMITAJAYA', 'KTP', '3171015505820011', '0000-00-00', '', '', 'JL. AM SANGAJI NO.28 RT001/004 ', 'KEL. PETOJO UTARA KEC. GAMBIR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('960', '960', 'SAYYID HASAN ASSEGAF', 'KTP', '3171012607920003', '0000-00-00', '', '', 'PESANGGRAHAN PERMAI BLOK B-35 RT 003 RW 007 ', 'KEL. PETUKANGAN SELATAN KEC.', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('961', '961', 'VIVINE DAN ANGELINA', 'KTP', '3275082812890018', '0000-00-00', '', '', 'JL KEMUKUS BLOK B-28 RT/RW 004/006', 'KEL. PINANGSIA ', null, 'Home Owner', '2017-12-19', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('962', '962', 'PANG WENG SENG', 'KTP', '3172016111960001', '0000-00-00', '', '', 'JL PINANGSIA II/1B RT 001 RW 005', 'KEL. PINANGSIA KEC. TAMAN SARI ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('963', '963', 'GERALD ALEXANDER HALIM', 'KTP', '3173032306570001', '0000-00-00', '', '', 'JL. GAMALAMA NO.42 RT/RW 002/010', 'KEL. PISANG CANDI KEC SUKUN, KOTA MALANG', null, 'Home Owner', '2017-12-18', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('964', '964', 'CHRISTIAN', 'KTP', '3271031906740009', '0000-00-00', '', '', 'JL. G. MERAPI 215 RT. 004/004', 'KEL. PISANG SELATAN KEC. UJUNG PANDANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('965', '965', 'ANNISA ROSA NASUTION.S.PSI', 'KTP', '7371041108770001', '0000-00-00', '', '', 'JL MANDOR BARET NO.3 RT 008 RW 007 ', 'KEL. PISANGAN KEC. CIPUTAT TIMUR, TANGERANG SELATA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('966', '966', 'URI HAMDAYANI', 'KTP', '1271215812860003', '0000-00-00', '', '', 'GG AKIK YAMAN NO. 33 KEL. RT/RW 009/005', 'KEL. PISANGAN TIMUR KEC. PULO GADUNG, JAKARTA', null, 'Home Owner', '2017-12-18', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('967', '967', 'LIM HOCK LIE', 'KTP', '3175024409850002', '0000-00-00', '', '', 'MUARA KARANG BLOK B.3.S/12 RT 003 RW 018', 'KEL. PLUIT KEC. PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('968', '968', 'LOH.DANNY', 'KTP', '3172010512630007', '0000-00-00', '', '', 'MUARA KARANG BLOK E1U NO. 31 RT.020/002', 'KEL. PLUIT KEC. PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('969', '969', 'EDDY SADIKIN', 'KTP', '3172010107820001', '0000-00-00', '', '', 'APARTEMEN GREEN BAY TOWER A LT 17 RT 001/010', 'KEL. PLUIT KEC. PENJARINGAN JAKARTA UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('970', '970', 'EDDY SADIKIN', 'KTP', '3173011203620005', '0000-00-00', '', '', 'APARTEMEN GREEN BAY TOWER A LT 17 RT 001/010', 'KEL. PLUIT KEC. PENJARINGAN JAKARTA UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('971', '971', 'STEVEN SAKSONO', 'KTP', '3173011203620005', '0000-00-00', '', '', 'PLUIT TIMUR RAYA NO. 19 RT/RW 005/006', 'KEL. PLUIT KEC. PENJARINGAN, JAKARTA', null, 'Home Owner', '2017-12-26', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('972', '972', 'JEFFREY', 'KTP', '3172011204880005', '0000-00-00', '', '', 'APARTEMEN GREEN BAY TOWER G LT. 22 UNIT AJ RT/RW 007/010', 'KEL. PLUIT KEC. PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2018-02-11', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('973', '973', 'EUIS RUSMIYATI DAN ERWIN RIYADI YUNIANSA', 'KTP', '3173020706880004', '0000-00-00', '', '', 'JL. PLUIT SELATAN I NO. 45 RT 021 RW 006 ', 'KEL. PLUIT KEC. PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2018-01-09', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('974', '974', 'SUWARSIH TJAHYADI', 'KTP', '3172015507770002', '0000-00-00', '', '', 'PLUIT BARAT III B/2 RT/RW 015/007', 'KEL. PLUIT KEC. PENJARINGN, JAKARTA UTARA', null, 'Home Owner', '2018-02-06', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('975', '975', 'MUHAMAD FADLI KESUMA JAYA', 'KTP', '3172016212660003', '0000-00-00', '', '', 'PAMULANG PERMAI II C-16/8 RT 002 RW 011', 'KEL. PONDOK BENDA KEC. PAMULANG, KOTA TANGERANG SE', null, 'Home Owner', '2017-12-27', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('976', '976', 'EFFENDI TJAHJADI', 'KTP', '3674060505920024', '0000-00-00', '', '', 'SUTERA KIRANA 3 NO. 9 ALAM SUTERA RT 001 RW 007', 'KEL. PONDOK JAGUNG TIMUR KEC. SERPONG UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('977', '977', 'EFFENDI TJAHJADI', 'KTP', '3674020811570001', '0000-00-00', '', '', 'SUTERA KIRANA 3 NO. 9 ALAM SUTERA RT 001 RW 007', 'KEL. PONDOK JAGUNG TIMUR KEC. SERPONG UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('978', '978', 'MELLINA NURSYAFNI', 'KTP', '3674020811570001', '0000-00-00', '', '', 'SUTERA FERONIA V NO 20 RT03/RW016 ', 'KEL. PONDOK JAGUNG, KEC. SERPONG UTARA TANGERANG S', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('979', '979', 'SOLIHIN', 'KTP', '3674024606930010', '0000-00-00', '', '', 'METRO PERMATA I N-7/15 RT 005 RW 007 ', 'KEL. PONDOK PUCUNG KEC. KARANG TENGAH, TANGERANG', null, 'Home Owner', '2017-12-13', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('980', '980', 'IRWAN SYAHPUTRA', 'KTP', '3671121804800006', '0000-00-00', '', '', 'PORISGAGA BARU RT 005 RW 001 ', 'KEL. PORIS GAGA BARU KEC. BATU CEPER, KOTA TANGERA', null, 'Home Owner', '2017-12-17', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('981', '981', 'SUSANTI KURNIAWAN', 'KTP', '3671030304840009', '0000-00-00', '', '', 'BUDI INDAH JL KERINCI NO 35 RT RW 007/007', 'KEL. PORIS GAGA KEC. BATUCEPER', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('982', '982', 'NG SE MUIJ', 'KTP', '3671035210690006', '0000-00-00', '', '', 'ALAM INDAH BLOK B.3/10 RT/RW 003/005', 'KEL. PORIS PLAWAD INDAH KEC.', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('983', '983', 'SHAKINA HANYDASARI', 'KTP', '3671054606600004', '0000-00-00', '', '', 'PURI DEWATA INDAH BLOK D2-10 RT 004 RW 001 ', 'KEL. PORIS PLAWAD KEC. CIPONDOH', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('984', '984', 'NOVA TRISCHA A MANURUNG', 'KTP', '3671054207890002', '0000-00-00', '', '', 'JL CEMARA I NO 09 MEDAN RT/RW - / -', 'KEL. PULO BRAYAN BENGKEL BARU KEC. MEDAN TIMUR, ME', null, 'Home Owner', '2018-01-13', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('985', '985', 'MANGIRING TAMBUNAN', 'KTP', '1271205911870004', '0000-00-00', '', '', 'APARTEMEN GICA II B /LT 19 NO. 23 RT/RW 005/011', 'KEL. PULO GADUNG KEC. PULO GADUNG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('986', '986', 'ANTONO DEWANTO', 'KTP', '3175020801741001', '0000-00-00', '', '', 'BOJONG RANGKONG NO.2 RT 008 RW 003 ', 'KEL. PULO GEBANG KEC. CAKUNG, JAKARTA TIMUR', null, 'Home Owner', '2018-01-13', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('987', '987', 'TETY OENDARI', 'KTP', '3175061703780001', '0000-00-00', '', '', 'KP. MALANG NO. 304 RT 005/004', 'KEL. PURWODINATAN KEC. SEMARANG TENGAH SEMARANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('988', '988', 'CHEN RUI YUE', 'KTP', '3374015507560003', '0000-00-00', '', '', 'JL RAYA NO 154 RT 004 RW 004', 'KEL. PURWOSARI KEC. PURWOSARI, KAB. PASURUAN JAWA ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('989', '989', 'R.RIZKIANDINI KUSUMAWARDHANI', 'KTP', '3514085103660001', '0000-00-00', '', '', 'JL. CEMARA BLOK A NO. 26 ADIPURA RT 001 RW 007', 'KEL. RANCABOLANG KEC. GDEBAGE', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('990', '990', 'ANDREA NATHANIA', 'KTP', '3273275301920002', '0000-00-00', '', '', 'JL. BUNCIS 1/8 RT004/007 ', 'KEL. RAWA BUAYA KEC. CENGKARENG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('991', '991', 'IDAH HAMIDAH', 'KTP', '3173014804870005', '0000-00-00', '', '', 'KP. RENGED RT/RW 003/001', 'KEL. RENGED KEC. KRESEK, KAB. TANGERANG', null, 'Home Owner', '2017-12-27', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('992', '992', 'LUTHFI DITYA PUTRI', 'KTP', '3603064507810010', '0000-00-00', '', '', 'NGEBELGEDE RT/RW 010/034', 'KEL. SARDONOHARJO KEC. NGAGLIK, KAB. SLEMAN', null, 'Home Owner', '2017-12-26', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('993', '993', 'AL SOFI', 'KTP', '3404123009900002', '0000-00-00', '', '', 'SEMINGKIR RT/RW 004/004', 'KEL. SEMINGKIR KEC. RANDUDONGKAL, KAB. PEMALANG', null, 'Home Owner', '2018-01-18', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('994', '994', 'HENDRI', 'KTP', '3327070305940001', '0000-00-00', '', '', 'KP SERDANG RT 006/002 ', 'KEL. SERDANG KULON KEC. PANONGAN ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('995', '995', 'ASEP KURNIAWAN', 'KTP', '3201203105770002', '0000-00-00', '', '', 'KOMPLEK PLP RT/RW 002/005', 'KEL. SERDANG WETAN KEC. LEGOK, KAB. TANGERANG', null, 'Home Owner', '2018-01-14', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('996', '996', 'MOCHAMMAD HELMI', 'KTP', '1571022603870101', '0000-00-00', '', '', 'PANGLIMA SUDIRMAN 126 RT 001 RW 003 ', 'KEL. SIDOMORO KEC. KEBOMAS, KAB. GRESIK', null, 'Home Owner', '2018-01-06', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('997', '997', 'MOH SAEPUL BAHRI', 'KTP', '3525140810840001', '0000-00-00', '', '', 'PERUM GERIYA LESTARI PERMAI BLOK A-5/02 RT/RW 006/009 ', 'KEL. SINDANG PANON KEC. SINDANG JAYA ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('998', '998', 'DIAN NOVITA ANDRIANI', 'KTP', '3603291803810001', '0000-00-00', '', '', 'CITRA GRAHA PRIMA R-23 NO 36 RT 003 RW 013 ', 'KEL. SINGASARI ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('999', '999', 'BUDI SETYAWAN', 'KTP', '3201064311870002', '0000-00-00', '', '', 'KP. RANCAGEDE RT 005 RW 003', 'KEL. SITU GADUNG KEC. PAGEDANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1000', '1000', 'FITRIANA', 'KTP', '3603221804880004', '0000-00-00', '', '', 'MOJO MULYO RT 003/010', 'KEL. SRAGEN KULON KEC. SRAGEN KAB. SRAGEN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1001', '1001', 'DEWI MANIHURUK', 'KTP', '331410640990001', '0000-00-00', '', '', 'JL. MANDOR SALIM NO 10 RT/RW 004/002', 'KEL. SRENGSENG KEC. KEMBANGAN, JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1002', '1002', 'IRMA SASMITA', 'KTP', '3173064211840008', '0000-00-00', '', '', 'KP. DUKUH RT/RW 002/003', 'KEL. SUDIMARA SELATAN KEC. CILEDUG, TANGERANG', null, 'Home Owner', '2017-12-14', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1003', '1003', 'LAURENTIUS ANDHIKA PUTRA & SHANLY VIVIA FALIMAN', 'KTP', '3671065302900004', '0000-00-00', '', '', 'GADING GRIYA LESTARI BLOK H-2/12 RT/RW 003/009', 'KEL. SUKAPURA KEC. CILINCING, JAKARTA UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1004', '1004', 'JOHNNY WIJAYA KUSUMA', 'KTP', '3172041812880001', '0000-00-00', '', '', 'JL. JENDRAL A. YANI NO. 02 RT 005/003', 'KEL. SUKMAJAYA KEC. JOMBANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1005', '1005', 'JUVENTIA VICKY RIANA', 'KTP', '3672052010610002', '0000-00-00', '', '', 'JL. GURAMI NO. 32, RT/RW: 002/001, ', 'KEL. SUNGAI DAMA, KEC. SAMARINDA ILIR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1006', '1006', 'STEFANI', 'KTP', '6472045106900002', '0000-00-00', '', '', 'JL. SELAT SUMBA BLOK M NO. 39 RT 016 RW 002', 'KEL. SUNTER AGUNG KEC. TANJUNG PRIOK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1007', '1007', 'VENNY VERONIKA', 'KTP', '3171047105840002', '0000-00-00', '', '', 'JLN. STR KARYA BLK HB XI/3 RT 018 RW 013', 'KEL. SUNTER AGUNG KEC. TANJUNG PRIOK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1008', '1008', 'DENNY SYAHPUTRA', 'KTP', '3172025701670003', '0000-00-00', '', '', 'JL. NUSANTARA I BLOK H NO. 29 RT 001/017', 'KEL. SUNTER AGUNG KEC. TANJUNG PRIOK, JAKARTA UTAR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1009', '1009', 'LIM FEI JIN', 'KTP', '3172050302860005', '0000-00-00', '', '', 'VILLA SUNTER MAS TMR.H.Q/7 RT 010 RW 008', 'KEL. SUNTER KEC.TANJUNG PRIOK, JAKARTA UTARA', null, 'Home Owner', '2017-12-17', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1010', '1010', 'HERDIKA HIMAWAN', 'KTP', '3172026409640008', '0000-00-00', '', '', 'JL SUCI NO.44 RT 007 RW 004', 'KEL. SUSUKAN KEC. CIRACAS ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1011', '1011', 'HERFIN JODANA', 'KTP', '3175091603900002', '0000-00-00', '', '', 'JL. GG. SIONG PEK NO.132 RT004/RW002', 'KEL. TAMBORA KEC. TAMBORA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1012', '1012', 'HIAN HIAN KUSUMA JAYA', 'KTP', '3173041308810008', '0000-00-00', '', '', 'JL. TAMBORA III GG.3 RT 006 RW 006', 'KEL. TAMBORA KEC. TAMBORA JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1013', '1013', 'HUI MANDRA P', 'KTP', '6172023010910002', '0000-00-00', '', '', 'JL. JAMBU NO. 15 RT 003 RW 007 ', 'KEL. TAMPAN KEC. PAYUNG SEKAKI, PAKANBARU', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1014', '1014', 'JULIAN CARLO MANABA', 'KTP', '1471111411670004', '0000-00-00', '', '', 'JL. PURBAYA NO.15 RT 010 RW 005', 'KEL. TANAH TINGGI KEC. JOHAR BARU, JAKARTA PUSAT', null, 'Home Owner', '2018-01-03', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1015', '1015', 'RIRIN NOVIYANTI', 'KTP', '3171081507900008', '0000-00-00', '', '', 'JL. JENDERAL SUDIRMAN NO. 117', 'KEL. TANJUNG AMAN KEC. KOTABUMI SELATAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1016', '1016', 'PRIMA ADI SANTJOKO', 'KTP', '1603105011890008', '0000-00-00', '', '', 'APT MEDITERANIA G TOWER C-20 G/A RT 003 RW 005', 'KEL. TANJUNG DUREN SELATAN KEC. GROGOL PETAMBURAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1017', '1017', 'STEFANIE', 'KTP', '3173020905710009', '0000-00-00', '', '', 'TG. DUREN SELATAN II GG.V NO 5 RT 014 RW 002', 'KEL. TANJUNG DUREN SELATAN KEC. GROGOL PETAMBURAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1018', '1018', 'PETTY PUSPA LINDA', 'KTP', '3173026411820005', '0000-00-00', '', '', 'JL. TG. DUREN UTARA VI.A NO. 309 RT 005/003', 'KEL. TANJUNG DUREN UTARA KEC.GROGOL PETAMBURAN JAK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1019', '1019', 'VINCENT RIONALDO', 'KTP', '3173025301840002', '0000-00-00', '', '', 'GANG ALPUKAT XIII/441 RT 006 RW 002', 'KEL. TANJUNG DUREN UTARA, KEC. GROGOL PETAMBURAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1020', '1020', 'PUNGKY ANDY PRADANA, ST', 'KTP', '3173022309810002', '0000-00-00', '', '', 'JL. ABDUL HAKIM KOMP. VILLA SETIA BUDI GARDEN RT/RW 000/000', 'KEL. TANJUNG SARI KEC. MEDAN SELAYANG, KOTA MEDAN', null, 'Home Owner', '2017-12-25', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1021', '1021', 'ANTHONY SUSANTO', 'KTP', '3573010711860005', '0000-00-00', '', '', 'JL. TANJUNG SARI BARU 3 NO. 38 RT/RW 003/003', 'KEL. TANJUNG SARI KEC. SUKOMANUNGGAL, KOTA SURABAY', null, 'Home Owner', '2018-01-31', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1022', '1022', 'MUHAMAD MUHIDIN', 'KTP', '3374012305970001', '0000-00-00', '', '', 'JL. PELOPOR 14A NO.14, RT/RW:  001/005', 'KEL. TEGAL ALUR KEC. KALIDERES', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1023', '1023', 'NURWATY', 'KTP', '3173062802750002', '0000-00-00', '', '', 'JL. MALIOBORO III BLOK E-5/19 RT/RW007/006', 'KEL. TEGAL ALUR KEC. KALIDERES, JAKARTA BARAT', null, 'Home Owner', '2017-12-09', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1024', '1024', 'JONSON ELVIN', 'KTP', '3173064512840016', '0000-00-00', '', '', 'KAV. PTB BLOK K6 NO 23. ', 'KEL. TEGAL ALUR. KEC. KALIDERES JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1025', '1025', 'DR.ANDRIAN NUGRAHA', 'KTP', '3173060805890005', '0000-00-00', '', '', 'JL. JEND SUDIRMAN NO.65 RT 003 RW 001', 'KEL. TELADAN KEC. TOBOALI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1026', '1026', 'DIANE LIDYA SARAYAR', 'KTP', '1903011012680002', '0000-00-00', '', '', 'PERUM CENTRE POINT BLOK A1 NO. 06 RT 001/014', 'KEL. TELUK KERING KEC. BATAM KOTA, KOTA BATAM', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1027', '1027', 'BUDI SIDARTA', 'KTP', '2171104312739003', '0000-00-00', '', '', 'JL TENGGILIS UTARA NO 25. RT/RW 006/004. ', 'KEL. TENGGILIS MEJOYO', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1028', '1028', 'ELBET', 'KTP', '3175020705780001', '0000-00-00', '', '', 'JL. TINGGI I NO. 10 RT/RW 009/006', 'KEL. TOMANG KEC GROGOL PETAMBURAN, JAKARTA BARAT', null, 'Home Owner', '2018-01-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1029', '1029', 'MEGAHWATI KURNIASARI M', 'KTP', '7509120512337', '0000-00-00', '', '', 'JL. MANDALA SELT VII/11B RT 013 RW 004', 'KEL. TOMANG KEC. GROGOL PETAMBURAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1030', '1030', 'YENI SUGIARTI', 'KTP', '3173025705760002', '0000-00-00', '', '', 'TOYAREKA RT/RW 002/010', 'KEL. TOYAREKA KEC. KEMANGKON, KAB. PURBALINGGA', null, 'Home Owner', '2018-01-06', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1031', '1031', 'FERA NITA', 'KTP', '3304056412870003', '0000-00-00', '', '', 'JL. BANGAU NO. 016 RT 001 RW 001', 'KEL. TUGU KECIL KEC. PRABUMULIH TIMUR, KOTA PRABUM', null, 'Home Owner', '2017-12-10', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1032', '1032', 'KRISTIANA CHANDRA', 'KTP', '1674025802850001', '0000-00-00', '', '', 'JL GADING V BLOK D/11 RT/RW:05/06 ', 'KEL. TUGU SELATAN KEC. KOJA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1033', '1033', 'EDWARD.R. WENEHEN', 'KTP', '3172036611530002', '0000-00-00', '', '', 'BUPER PERMAI BTN POLDA G.I NO.4 RT 006 RW 001 ', 'KEL. WAENA KEC. HERAM KOTA JAYAPURA, PAPUA ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1034', '1034', 'FIANY J S MAMARIMBING', 'KTP', '9171052010900002', '0000-00-00', '', '', 'JL PELITA RAYA TENGAH A3 NO.18 RT/RW:003/009', 'KEL.BALLA PARANG KEC.RAPPOCINI, KOTA MAKASSAR', null, 'Home Owner', '2017-12-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1035', '1035', 'YULIANA LIMANTARA', 'KTP', '7371135401880003', '0000-00-00', '', '', 'JL. BUKIT GOLF XI BLOK QG-V/26 RT/RW:001/008', 'KEL.CIPETE KEC.PINANG, KOTA TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1036', '1036', 'KHIM KHU', 'KTP', '3671110806730004', '0000-00-00', '', '', 'JL. KELAPA LILIN II SEK 7 BLOK DC NO.10 GADIN RT 006 RW 003 ', 'KEL.CURUG SANGERENG KEC. KELAPA DUA, KAB. TANGERAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1037', '1037', 'Hendra Efrain Puerwanto', 'KTP', '6102071202740001', '0000-00-00', '', '', 'DENDENGAN DALAM LINGKUNGAN V RT/RW:-/005', 'KEL.DENDENGAN DALAM KEC.TIKALA, KOTA MANADO', null, 'Home Owner', '2017-12-05', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1038', '1038', 'ROCKY', 'KTP', '7171052311910002', '0000-00-00', '', '', 'JL GARUDA NO.9 RT/RW:012/002', 'KEL.DURI UTARA KEC.TAMBORA, JAKARTA BARAT', null, 'Home Owner', '2017-12-11', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1039', '1039', 'HENNY YUSTINA', 'KTP', '3173042212860005', '0000-00-00', '', '', 'JL.TAMAN BOUGENVILLE BLOK T-21RT/RW 009/014', 'KEL.JAKA SETIA KEC. BEKASI SELATAN, BEKASI', null, 'Home Owner', '2018-01-09', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1040', '1040', 'SAGI SUDIRGO', 'KTP', '3275047001820010', '0000-00-00', '', '', 'RAWA BEBEK I NO.26A RT/R :010/011', 'KEL.PENJARINGAN KEC.PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2017-12-07', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1041', '1041', 'JEMMY GUNAWAN', 'KTP', '3173040612850004', '0000-00-00', '', '', 'APARTEMEN GREEN BAY TOWER D LT 07 UNIT BF ', 'KEL.PLUIT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1042', '1042', 'DJONI MUKSIN', 'KTP', '1407020907940009', '0000-00-00', '', '', 'P. SMUDRA 2 MENARA MARINA LT. 11 R,  RT/RW:012/005', 'KEL.PLUIT, KEC. PENJARINGAN ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1043', '1043', 'MA\'MUR JACHJA', 'KTP', '3172013005350001', '0000-00-00', '', '', 'JL CABANG UTAMA NO.31 RT/RW:009/005', 'KEL.SLIPI, KEC.PALANG MERAH, JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1044', '1044', 'YENNY', 'KTP', '3173082801680002', '0000-00-00', '', '', 'PERMATA REGENCY BLOK E/6 RT001/RW006', 'KEL.SRENGSENG KEC KEMBANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1045', '1045', 'EDAWATY, HUI', 'KTP', '3173085711780014', '0000-00-00', '', '', 'JL.SRI REZEKI RT/RW 005/000', 'KEL.SULANJANA KEC.JAMBI TIMUR, KOTA JAMBI', null, 'Home Owner', '2017-12-11', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1046', '1046', 'THAM KET BUN', 'KTP', '1571035311660001', '0000-00-00', '', '', 'JL. PEKAPURAN NO VII NO 17 RT 001/ RW 004', 'KEL.TANAH SEREAL KEC.TAMBORA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1047', '1047', 'VANIA UTARINI', 'KTP', '3173040110640002', '0000-00-00', '', '', 'JL. TG. DUREN UTARA VII/444 RT004/RW003', 'KEL.TANJUNG DUREN UTARA KEC. GROGOL PETAMBURAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1048', '1048', 'NICO SANTOSO', 'KTP', '3173026603910002', '0000-00-00', '', '', 'JLN. PONDOK TUAK NO. 15 RT/RW. 007/ 002 ', 'KEL/DESA PINANGSIA KEC. TAMAN SARI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1049', '1049', 'H HERRY IRWAN', 'KTP', '3173030407820001', '0000-00-00', '', '', 'KP. KELAPA NO 71 RT 002/004', 'KELAPA INDAH', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1050', '1050', 'SUMITA THERESIA', 'KTP', '3671012306620002', '0000-00-00', '', '', 'KAMPUNG DURI DALAM RT 09/ RW 05 ', 'KELURAHAN DURI SELATAN. KECAMATAN TAMBORA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1051', '1051', 'SCHOLASTICA MARIA ELLYS', 'KTP', '3173045611780001', '0000-00-00', '', '', 'JL BUNI NO 27B RT 09/03', 'MANGGA BESAR TAMANSARI ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1052', '1052', 'GLEAND ANDRO DATOE', 'KTP', '3173035910680001', '0000-00-00', '', '', 'PERUM POLITEKNIK PERMAI LINGK VII KAIRAGI DUA RT 000/007', 'MAPANGET MANADO', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1053', '1053', 'SARI TANTONO', 'KTP', '7171080904910002', '0000-00-00', '', '', 'PERUM BENTANG PADALARANG REGENCY JL. GA MANULANG BLOK C', 'NO. 10 KEL. JAYAMEKAR KEC. PADALARANG, BANDUNG BAR', null, 'Home Owner', '2018-01-30', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1054', '1054', 'RONALD YONATAN', 'KTP', '3173015709860005', '0000-00-00', '', '', 'APARTEMEN PURI PARK VIEW TOWER AB LANTAI 23', 'NO. 12 RT/RW 009/005 KEL.MERUYA UTARA', null, 'Home Owner', '2018-02-13', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1055', '1055', 'YEAN FRYDA', 'KTP', '1271202209830002', '0000-00-00', '', '', 'JL. BUDI MULIA NO.9 RT/RW 011/010 ', 'PADEMANGAN BARAT ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1056', '1056', 'SARI ULLY ARTHA', 'KTP', '3172054406820004', '0000-00-00', '', '', 'JL. PANCORAN BUNTU II/9  RT 006/002', 'PANCORAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1057', '1057', 'MARTINUS SURYA WIDJAJA', 'KTP', '3174084709840001', '0000-00-00', '', '', 'PERUM PURI GARDENA BLOK G1 NO 26 RT 005 RW 014 ', 'PEGADUNGAN KALIDERES JAKARTA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1058', '1058', 'DESI  YANTI', 'KTP', '3173011302830008', '0000-00-00', '', '', 'JL UTAN JATI RT 011 RW 011 ', 'PEGADUNGAN KALIDERES JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1059', '1059', 'LYNDA', 'KTP', '3173064912830013', '0000-00-00', '', '', 'PERMATA TAMAN PALEM BLK D2 NO.21 RT/RW 005/003 ', 'PEGADUNGAN, KALIDERES - JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1060', '1060', 'MARIA ALEXANDRA MELISSA', 'KTP', '1271105108810008', '0000-00-00', '', '', 'PUSPA GADING I BLOK H1/20 RT 011/016', 'PEGANGSAAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1061', '1061', 'OSCAR', 'KTP', '3172066302870001', '0000-00-00', '', '', 'JL. ASRAMA PUTRA RT 007/008', 'PISANGAN CIPUTAT TIMUR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1062', '1062', 'HARVESTIANTO GILBERT KEVIAWAN SWANOPATI', 'KTP', '3674050209740005', '0000-00-00', '', '', 'BANGUN REKSA INDAH II V/24 RT/RW 002/006 ', 'PONDOK PUCUNG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1063', '1063', 'MALKIT', 'KTP', '3671122611950001', '0000-00-00', '', '', 'PURI DEWATA INDAH BLOK AE NO.11 RT002/006 ', 'PORIS PLAWAD UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1064', '1064', 'AMANDA SHERLY', 'KTP', '3671054506590004', '0000-00-00', '', '', 'JL PERWIRA V NO 83 ', 'PULO BRAYAN BENGKEL ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1065', '1065', 'DAVIK HARMOKO', 'KTP', '1271206807920001', '0000-00-00', '', '', 'JL. MARTADIREJA I RT 001/006', 'PURWOKERTO WETAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1066', '1066', 'DOKTOR CAING', 'KTP', '3302260507830004', '0000-00-00', '', '', 'MODERNLAND\nJL TAMAN GOLF AG 6/22\nPORIS PLAWAD INDAH\nCIPONDOH', 'RT 001 RW 014 KEL. PORIS PLAWAD KEC. CIPONDOH', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1067', '1067', 'NOVITASARI', 'KTP', '3671050105570004', '0000-00-00', '', '', 'JL. TELAGA RATNA I', 'RT 001/001 SUNTER JAYA TANJUNG PRIUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1068', '1068', 'KUKUH AJI IRIANDA', 'KTP', '3172024911830006', '0000-00-00', '', '', 'JL. HAYAM WURUK RAYA NO. 39', 'RT 001/002 CIBODAS BARU', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1069', '1069', 'LIOE KURNIAWANTO', 'KTP', '3671092503840002', '0000-00-00', '', '', 'KP DURI GG. GERINDO IV NO. 7A', 'RT 004/004', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1070', '1070', 'EDDI HERMAN', 'KTP', '3173042605610001', '0000-00-00', '', '', 'JL. MERDEKA NO. 17', 'RT 005/003 PASAR BARU CURUP', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1071', '1071', 'JACQUELINE', 'KTP', '1702092301610001', '0000-00-00', '', '', 'TAMAN PALEM MUTIARA BLOK A5/33', 'RT 006/014 CENGKARENG ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1072', '1072', 'WIHARTATI MALIK', 'KTP', '3173015110930002', '0000-00-00', '', '', 'TMN. PEGANGSAAN INDAH BLK Q/12', 'RT 007/019', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1073', '1073', 'FRANSISKA LUKMAN', 'KTP', '3172066608630004', '0000-00-00', '', '', 'JL. DANAU AGUNG 20 BLOK E.12 NO.15', 'RT 008 RW 016 KEL. SUNTER AGUNG KEC', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1074', '1074', 'PANG WENG SENG', 'KTP', '3172025509830002', '0000-00-00', '', '', 'JL. PINANGSIA II/1B', 'RT. 001/005 PINANGSIA, TAMAN SARI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1075', '1075', 'LISA SOFIANA LIJUWARDI', 'KTP', '3173032306570001', '0000-00-00', '', '', 'APART. P MUTIARA TOWER BUNAKEN LT. 22/6', 'RT. 010/016 PLUIT PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1076', '1076', 'DENNY GUNAWAN', 'KTP', '3173026009700004', '0000-00-00', '', '', 'VILA REGENSI TNG II BLOK AB-4/20', 'RT/RW 002/005 DESA GELAM JAYA', null, 'Home Owner', '2018-01-21', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1077', '1077', 'RENDI RIFANO', 'KTP', '3603124111960001', '0000-00-00', '', '', 'JORONG SARUASO TIMUR', 'SARUASO', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1078', '1078', 'DR. JULIET J SAID', 'KTP', '1304053010920002', '0000-00-00', '', '', 'JL. MADRASAH II NO. 100 RT/RW 001/010', 'SUKABUMI UTARA, KEBON JERUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1079', '1079', 'INDAH KARNAIN C', 'KTP', '3173055507650008', '0000-00-00', '', '', 'JL. SETRA RIA NO. 8 RT 006/003', 'SUKAGALIH', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1080', '1080', 'KRISNA PUTRADARMA', 'KTP', '3273074112650002', '0000-00-00', '', '', 'JL.SELAT MALAKA BLOK H NO7 RT/RW 015/002 ', 'SUNTER AGUNG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1081', '1081', 'HARWIN', 'KTP', '3175030410860001', '0000-00-00', '', '', 'JL. SAMIAJI NO. RT 016/005', 'TANAH TINGGI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1082', '1082', 'HARTO DARMONO', 'KTP', '3171082606850001', '0000-00-00', '', '', 'JL PELANTAR 2 NO 05 TANJUNG PINANG KOTA ', 'TANJUNG PINANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1083', '1083', 'CHANDRA SANTOSO', 'KTP', '2172033012900001', '0000-00-00', '', '', 'KOMP DUTA SQUARE C/6 RT 012/005', 'WIJAYA KUSUMA KEC. GROGOL PETAMBURAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1084', '1084', 'GRACE LEDIYANI KOMALAJAYA', 'KTP', '317206571143002', '0000-00-00', '', '', 'VILLA GD INDAH E 30 RT 2 RW 14', 'KELAPA GADING', null, 'Home Owner', '2017-12-11', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1085', '1085', 'PISCA AGUSTINA', 'KTP', 'A8580282', '0000-00-00', '', '', 'GAJAH TIMUR II RT 6 TW 33', 'KOTA GAJAH TIMMUR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1086', '1086', 'ERLIN MARSI', 'KTP', '3175027004850008', '0000-00-00', '', '', 'JL. KAYU PUTIH UTARA B17 RT 10 RW 8', 'PULO GADUNG', null, 'Home Owner', '2017-12-07', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1087', '1087', 'ALEXANDER ARIANTO RIMBA', 'KTP', '3578090101770005', '0000-00-00', '', '', 'JL MAWAR RAYA NO 1 TLH LIPPO CIKARANG', 'CIKARANG', null, 'Home Owner', '2017-12-03', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1088', '1088', 'CAROLINE', 'KTP', '3172015901860007', '0000-00-00', '', '', 'PULIT TIMUR BLOK J UTR/9 RT 03 RW 09', 'PLUIT , PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1089', '1089', 'RICHI ARMANDO SHEYOPUTRA', 'KTP', '3578270207860001', '0000-00-00', '', '', 'APART THAMRIN EXECUTIVE RESIDENCE', 'KEBON MELATI, TANAH ABANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1090', '1090', 'PHILIPS SENOPATI', 'KTP', '1271022704840003', '0000-00-00', '', '', 'JL SEMAMBU NO 9 A ', 'PETISAH TENGAH', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1091', '1091', 'AGNES FRANSISKA KAREN', 'KTP', '360316208810004', '0000-00-00', '', '', 'PURI NAGA INDAH BLOK B IV NO. 17', 'KAMPUNG MELAYU', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1092', '1092', 'AMELIA KAPORO', 'KTP', '3172065601820002', '0000-00-00', '', '', 'JL. KLP HIBRIDA VI RB 13/7 RT 18 RW 15', 'PEGANGSAAN DUA', null, 'Home Owner', '2017-12-05', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1093', '1093', 'SISILIA ANGELINA BONG', 'KTP', '3175057101690003', '0000-00-00', '', '', 'GG LAPAN II NO 3 ', 'PASAR REBO', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1094', '1094', 'HASTA KIRANA', 'KTP', '7371122310400001', '0000-00-00', '', '', 'JL TODDOPULI RAYA TIMUR NO A1/16 RT 05 RW 03', 'BORONG', null, 'Home Owner', '2017-12-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1095', '1095', 'VITA', 'KTP', '360317531178005', '0000-00-00', '', '', 'JL SAWAH LIO IV GG 9 NO 30', 'JEMBATAN LIMA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1096', '1096', 'YOELI ISTYAWATI', 'KTP', '3507196507610001', '0000-00-00', '', '', 'JALAN GOTONG ROYONG I/69 RT 11 RW 2', 'KEBONAGUNG', null, 'Home Owner', '2017-12-09', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1097', '1097', 'YOHAN', 'KTP', '1173020403890007', '0000-00-00', '', '', 'LHOKSEUMAWE', 'LHOKSEUMAWE', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1098', '1098', 'LIM SHIERLLY JUSNITA', 'KTP', '317107550586006', '0000-00-00', '', '', 'TMN ALFA INDAH BLOK D7/5 RT 05/05', 'JOGLO', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1099', '1099', 'TJHANG CHEN PHIN', 'KTP', '3172052002790003', '0000-00-00', '', '', 'GG HAJI MUHAMMAD RAHUM NO 126C', 'CENGKARENG', null, 'Home Owner', '2017-12-07', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1100', '1100', 'YUNIS PANTIAKADAU', 'KTP', '367103020683003', '0000-00-00', '', '', 'DAAN MOGOT ARCADIA BLOK B6 NO 18', 'BATU CEPER', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1101', '1101', 'AHMAD NADIRSYAH', 'KTP', '3603182110900005', '0000-00-00', '', '', 'KP. TALAGA RT 2 RW 1 ', 'TELAGA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1102', '1102', 'RUDY YAPUTRA', 'KTP', '3173020611820003', '0000-00-00', '', '', 'JALAN SWADAYA RAYA NO. 47 RT 1 RW 6', 'WIJAYA KUSUMA', null, 'Home Owner', '2017-12-08', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1103', '1103', 'WANG TAO', 'KTP', 'G55957258', '0000-00-00', '', '', 'GUANG DONG', '0', null, 'Home Owner', '2017-12-09', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1104', '1104', 'BRYAN THE', 'KTP', '930712052667', '0000-00-00', '', '', 'JL. DWIWARNA NO 16 RT/RW 0150/09 KARANG ANYAR, JAKARTA PUSAT', 'KARANG ANYAR', null, 'Home Owner', '2017-12-09', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1105', '1105', 'LIE MIN', 'KTP', '3603121705750008', '0000-00-00', '', '', 'KP KEBON KELAPA, PASAR KEMIS, TANGERANG', 'PASAR KEMIS', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1106', '1106', 'SANNY HARTOYO', 'KTP', '6171015204880011', '0000-00-00', '', '', 'HARAPAN INDAH 2 CLUSTER HARMONI', ' BLOK HZ 10 NO 18 RT 009/018 KEL. PUSAKA RAKYAT ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1107', '1107', 'NANCY WIDJAJANTI HALIM', 'KTP', '31730856016880002', '0000-00-00', '', '', 'TAMAN MERUYA ILIR H. 7/5 RT/RW 005/007', ' KEL. MERUYA UTAMA KEC. KEMBANGAN, JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1108', '1108', 'LENNYWATY HADIWIDJAJA', 'KTP', '3172064105750006', '0000-00-00', '', '', 'APT. GADING MEDITERANIA RESIDENCES, UNIT CC/10/AC', ' RT/RW 008/018 KEL. KELAPA GADING BARAT', null, 'Home Owner', '2017-12-03', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1109', '1109', 'ZHAO HONGJING', 'KTP', 'E89295188', '0000-00-00', '', '', 'EQUITY TOWER, 42ND FLOOR SUDIRMAN CENTRAL BUSINESS DISTRICT', '(SCBD) LOT 9 JL. JENDRAL SUDIRMAN KAV. 52-53, JAKA', null, 'Home Owner', '2017-12-11', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1110', '1110', 'SURYANTO TANJUNG', 'KTP', '3578091907810001', '0000-00-00', '', '', 'APT. OAK TOWER A703 JL. PERINTIS KEMERDEKAAN KAV 99 RT/RW ', '003/011, PULO GADUNG, DKI JAKARTA', null, 'Home Owner', '2018-01-13', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1111', '1111', 'HADI', 'KTP', '1806011208560001', '0000-00-00', '', '', 'JL. SAMUDRA NO. 448, RT/RW: 002/001', '1, PASAR MADANG, KOTAAGUNG LAMPUNG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1112', '1112', 'ST WULUNGSETO', 'KTP', '3271021512750009', '0000-00-00', '', '', 'JL. DANAU TOWUTI E2/23 ', 'BENDUNGAN HILIR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1113', '1113', 'ST. WULUNGSETO', 'KTP', '3271021512750009', '0000-00-00', '', '', 'JL. DANAU TOWUTI E2/23\nRT 017\nRW 004\nBENHIL TANAH ABANG ', 'BENDUNGAN HILIR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1114', '1114', 'WYNE CHANDRA', 'KTP', '3173067009880009', '0000-00-00', '', '', 'DASANA INDAH TH. 10/16 RT 005/031', 'BOJONG NANGKA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1115', '1115', 'YULI TW', 'KTP', '3277016105350018', '0000-00-00', '', '', 'GG. H. SAFEI RT 001 RW 028', 'CIBEUREUM,  CIMAHI SELATAN KOTA CIMAHI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1116', '1116', 'SUYATMI', 'KTP', '3671096809680001', '0000-00-00', '', '', 'JL. RAHWANA II NO. 34 RT. 003/002 ', 'CIBODAS BARU CIBODAS KOTA TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1117', '1117', 'TJHANG VERA JULIE KRISTIN', 'KTP', '31730470078900004', '0000-00-00', '', '', 'JL KOMP SD GARUDA NO 0 JKARTA BARAT ', 'DURI UTARA TAMBORA ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1118', '1118', 'GORYANTO', 'KTP', '3173043112810013', '0000-00-00', '', '', 'JLN KAMPUNG KRENDANG RT.005/008 ', 'DURI UTARA, TAMBORA, JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1119', '1119', 'TJOE O WEN', 'KTP', '3173032502810002', '0000-00-00', '', '', 'JL. INDUSTRI II KAV 16 RT 013/006', 'GUNUNG SAHARI UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1120', '1120', 'ARIJANTO', 'KTP', '3603140711710001', '0000-00-00', '', '', 'DUTA BANDARA PERMAI GU 3 NO 17 RT 004 RW 011 ', 'JATI MULYA ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1121', '1121', 'LIN YONG', 'KTP', 'E92204794', '0000-00-00', '', '', 'PT XIN YUAN STEEL INDONESIA ', 'JL SENTUL JAYA KM 25,5 BALARAJA TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1122', '1122', 'THIO YIOK HAN', 'KTP', '3172012605650004', '0000-00-00', '', '', 'JL. JOHAR GOLF 1 NO 11, BGM PIK, RT 003/ RW 006', 'KAMAL MUARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1123', '1123', 'THIO YIOK HAN', 'KTP', '3172012605650004', '0000-00-00', '', '', 'JL. JOHAR GOLF 1 NO 11, BGM PIK, RT 003/ RW 006', 'KAMAL MUARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1124', '1124', 'DOLLI', 'KTP', '3174053003800005', '0000-00-00', '', '', 'JL. BUNGUR 1 RT 007 RW 001 KEL. KEBAYORAN LAMA SELATAN', 'KEC. KEBAYORAN LAMA, JAKARTA SELATAN', null, 'Home Owner', '2018-01-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1125', '1125', 'SUGITO', 'KTP', '3671091406730007', '0000-00-00', '', '', 'JL LABU II NO 86 RT002/003 ', 'KEL CIBODASARI KEC CIBODAS', null, 'Home Owner', '2017-12-17', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1126', '1126', 'FERDINANDUS PEDULI BEDA', 'KTP', '3276093010750001', '0000-00-00', '', '', 'KOMPLEK BPC BLOK B 52 RT 036 RW 010 ', 'KEL GANDUL KEC. CINERE', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1127', '1127', 'CALVIN ANDRIAN', 'KTP', '3172052604860002', '0000-00-00', '', '', 'JL PADEMANGAN 2 GANG 12 NO 21 RT 008 RW 005', 'KEL PADEMANGAN TIMUR ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1128', '1128', 'LUSIANAH BUSTAMIN', 'KTP', '3173035512690002', '0000-00-00', '', '', 'CITRA GARDEN II BLOK P9 NO. 12 RT/RW : 007/012', 'KEL PEGADUNGAN KEC KALIDERES', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1129', '1129', 'DEWI KARTIKA', 'KTP', '1471055808770001', '0000-00-00', '', '', 'JL. JEND. SUDIRMAN NO 128 RT/RW 001/001 ', 'KEL SAGO KEC SENAPELAN, KOTA PEKAN BARU', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1130', '1130', 'PHILIPUS SANJAYA', 'KTP', '9202122007890004', '0000-00-00', '', '', 'JL TRIKORA RT 002 RW 003 ', 'KEL WOSI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1131', '1131', 'ANDRIE GANI SUMITO', 'KTP', '1671052202890003', '0000-00-00', '', '', 'JL. KOPRAL UMAR SAID NO. 3236 RT/RW 026/009', 'KEL. 20 ILIR D. III KEC. ILIR TIMUR I, KOTA PALEMB', null, 'Home Owner', '2018-02-28', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1132', '1132', 'JENMI SINTARA', 'KTP', '5271013105850006', '0000-00-00', '', '', 'JL. RAMPAI NO.9 LING. MELAYU TIMUR RT 001 RW 007 ', 'KEL. AMPENAN TENGAH KEC. AMPENAN, MATARAM', null, 'Home Owner', '2017-12-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1133', '1133', 'WENDY', 'KTP', '3273112403820001', '0000-00-00', '', '', 'KOMP. PADMAE REGENCY BLOK C7 RT/RW 002/007', 'KEL. ANCOL KEC. REGOL, KOTA BANDUNG', null, 'Home Owner', '2017-12-11', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1134', '1134', 'JULITA', 'KTP', '3172057007790007', '0000-00-00', '', '', 'JL. PADA MULYA V NO. 41 KK RT/RW 005/009 ', 'KEL. ANGKE KEC. TAMBORA, JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1135', '1135', 'CINDIANI DIAN WIDJAJA', 'KTP', '3173046506890002', '0000-00-00', '', '', 'JL. SIAGA II NO.14 RT/RW 005/004', 'KEL. ANGKE KEC. TAMBORA, JAKARTA BARAT', null, 'Home Owner', '2017-12-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1136', '1136', 'SELLY HASNAN', 'KTP', '3173014104870021', '0000-00-00', '', '', 'RUSUN TAMBORA IV BLOK B II NO. 214 RT 013 RW 011', 'KEL. ANGKE KEC. TAMBORA, JAKARTA BARAT', null, 'Home Owner', '2018-02-28', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1137', '1137', 'IR. DIAN RACHMAWAN', 'KTP', '3174041405640009', '0000-00-00', '', '', 'JL. BRAWIJAYA NO. 9 B RT 005/006', 'KEL. BABAKAN ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1138', '1138', 'ANASTHASIS', 'KTP', '1207190302820002', '0000-00-00', '', '', 'DUSUN II JLN BAKARAN BATU KOMP SURYA', 'KEL. BAKARAN BATU KEC. LUBUK PAKAM, KABUPATEN DELI', null, 'Home Owner', '2017-12-07', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1139', '1139', 'BASKAMI', 'KTP', '1207192506850001', '0000-00-00', '', '', 'DUSUN II JLN BAKARAN BATU KOMP. SURYA', 'KEL. BAKARAN BATU KEC. LUBUK PAKAM, KABUPATEN DELI', null, 'Home Owner', '2017-12-07', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1140', '1140', 'ALBERTO TAN', 'KTP', '3275012001910011', '0000-00-00', '', '', 'JL. BERLIAN RAYA RT/RW 006/005', 'KEL. BEKASI JAYA KEC. BEKASI TIMUR, BEKASI', null, 'Home Owner', '2018-01-14', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1141', '1141', 'NILAM AULIA PUTRI', 'KTP', '3603285106960008', '0000-00-00', '', '', 'JL. PERUNGGU RAYA NO. 03 RT/RW 005/006', 'KEL. BENCONGAN KEC. KELAPA DUA, KABUPATEN TANGERAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1142', '1142', 'HERMAN D. M. LOSE DASILVA', 'KTP', '3271021512750009', '0000-00-00', '', '', 'JL. DANAU TOWUTI E 11 NO 23 ', 'KEL. BENDUNGAN HILIR KEC. TANAH ABANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1143', '1143', 'KARTINI', 'KTP', '3603175609700006', '0000-00-00', '', '', 'BINONG PERMAI C 9 NO 22 RT 004 RW 011', 'KEL. BINONG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1144', '1144', 'STEVEN VINCENTXIUS', 'KTP', '3603171009930007', '0000-00-00', '', '', 'TAMAN PARAHYANGAN I/6 RT 001 RW 001', 'KEL. BINONG KEC. CURUG, KAB. TANGERANG', null, 'Home Owner', '2017-12-03', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1145', '1145', 'ALBERTUS ENDRIYANTO PRAMONO PUTRO', 'KTP', '3307062311920001', '0000-00-00', '', '', 'TAMAN PARAHYANGAN BLOK II NO. 71 LIPPO VILLAGE RT/RW 001/001', 'KEL. BINONG KEC. CURUG, KABUPATEN TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1146', '1146', 'IRAS BP RUMBIAK', 'KTP', '9106125410680002', '0000-00-00', '', '', 'JL. SRIWIJAYA NO.18 RT/RW 002/004 ', 'KEL. BRAMBAKEN KEC. SAMOFA, KAB. BIAK NUMFOR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1147', '1147', 'IRAS BP RUMBIAK', 'KTP', '9106125410680002', '0000-00-00', '', '', 'JL. SRIWIJAYA NO. 18 RT 002 RW 004 ', 'KEL. BRAMBAKEN KEC. SAMOFA, KAB. BIAK NUMFOR PAPUA', null, 'Home Owner', '2018-02-11', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1148', '1148', 'SILFI', 'KTP', '3671015803770002', '0000-00-00', '', '', 'KOMP. KEHAKIMAN BPHN BLOK E NO.90 RT 005 RW 001 ', 'KEL. BUARAN INDAH', null, 'Home Owner', '2018-02-10', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1149', '1149', 'MARIUS', 'KTP', '6171041803850003', '0000-00-00', '', '', 'JL. PROF DR SOEPOMO RT/RW 001/004', 'KEL. BUARAN INDAH KEC. TANGERANG, KOTA TANGERANG', null, 'Home Owner', '2017-12-08', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1150', '1150', 'WAHYUDIAH SUBEKTI', 'KTP', '3174016811890001', '0000-00-00', '', '', 'JL. SAWO KECIK 1/05 RT 009/007', 'KEL. BUKIT DURI KEC. TEBET JAKARTA SELATAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1151', '1151', 'BERLIANA GULTOM', 'KTP', '1472034505670003', '0000-00-00', '', '', 'JL.SOEKARNO HATTA RT 011 RW 000', 'KEL. BUKITNENAS KEC. BUKIT KAPUR, KOTA DUMAI', null, 'Home Owner', '2017-12-19', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1152', '1152', 'BERLIANA GULTOM', 'KTP', '1472034505670003', '0000-00-00', '', '', 'JL. SOEKARNO HATTA RT 011 RW 000', 'KEL. BUKITNENAS KEC. BUKITKAPUR, KOTA DUMAI', null, 'Home Owner', '2017-12-19', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1153', '1153', 'ARI PIKA SUSANTI', 'KTP', '1673025002880002', '0000-00-00', '', '', 'JAKARTA GARDEN CITY CLUSTER ZEBRINA NO.101 RT 004 RW 014', 'KEL. CAKUNG TIMUR KEC. CAKUNG, JAKARTA TIMUR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1154', '1154', 'EDDY SANJAYA', 'KTP', '3374020111750007', '0000-00-00', '', '', 'JL. CEMPAKA PUTIH BARAT XI GG.E/26 RT/RW 002/011', 'KEL. CEMPAKA PUTIH BARAT KEC. CEMPAKA PUTIH, JAKAR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1155', '1155', 'KOK SAMUEL SANTOSO', 'KTP', '3173012401850008', '0000-00-00', '', '', 'KOMP KFT BLOK C3 NO 25\nRT/RW : 007/011\nCENGKARENG BARAT\nCENGKARENG', 'KEL. CENGKARENG BARAT KEC. CENGKARENG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1156', '1156', 'VINCENT YENO GAN', 'KTP', '3173011104680004', '0000-00-00', '', '', 'TAMAN PALEM LESTARI BLOK D5A-7 RT 009 RW 015', 'KEL. CENGKARENG BARAT KEC. CENGKARENG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1157', '1157', 'THERESIA', 'KTP', '6171045410880008', '0000-00-00', '', '', 'TMN PALEM LESTARI BLOK Q NO. 33 RT/RW 013/008', 'KEL. CENGKARENG BARAT KEC. CENGKARENG, TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1158', '1158', 'LIAUW JUN MING', 'KTP', '3173052304740001', '0000-00-00', '', '', 'CITY RESORT BLOK L3 HAWAII RT/RW: 006/014 ', 'KEL. CENGKARENG TIMUR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1159', '1159', 'ANDREAS DANIEL CALLYSTA.H', 'KTP', '3173022711670008', '0000-00-00', '', '', 'GOLF LAKE RESIDENCE JL. SAN LORENZO 5/72 RT 002 RW 011 ', 'KEL. CENGKARENG TIMUR KEC. CENGKARENG', null, 'Home Owner', '2017-12-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1160', '1160', 'IVAN HALIM', 'KTP', '3173010807820018', '0000-00-00', '', '', 'JL PUSPA II NO. 12 RT 011 RW 12 ', 'KEL. CENGKARENG TIMUR KEC. CENGKARENG ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1161', '1161', 'LING LING', 'KTP', '6104056709780002', '0000-00-00', '', '', 'JL PELITA 1 RT 007 RW 001 ', 'KEL. CENGKARENG TIMUR KEC. CENGKARENG, JAKARTA BAR', null, 'Home Owner', '2017-12-12', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1162', '1162', 'ALLEN', 'KTP', '3674014310840001', '0000-00-00', '', '', 'BSD SEKT. XIV-6 JL. BIAK BLOK OA/11 RT/RW 010/008', 'KEL. CIATER', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1163', '1163', 'DEVI AGUSTIN', 'KTP', '3671094908950002', '0000-00-00', '', '', 'JL EMPU KANWA X NO 17 RT/RW 007/006', 'KEL. CIBODAS BARU, KEC. CIBODAS, KOTA. TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1164', '1164', 'FANNY', 'KTP', '3173065603860018', '0000-00-00', '', '', 'JL. KARET RAYA NO. 75 RT/RW 005/018', 'KEL. CIBODASARI KEC.CIBODAS', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1165', '1165', 'ADI WINATA', 'KTP', '3671090405800003', '0000-00-00', '', '', 'JL. PALEM RAYA NO. 11 RT 004/007', 'KEL. CIBODASSARI, KEC. CIBODAS, TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1166', '1166', 'SUSETYO HARIJANTO', 'KTP', '3603180211690009', '0000-00-00', '', '', 'CITRA RAYA BLK C.5/42 RT 001 RW 005 ', 'KEL. CIKUPA KEC. CIKUPA, KAB. TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1167', '1167', 'WIWIN RAHMAWATI', 'KTP', '3603186309750003', '0000-00-00', '', '', 'CITRA RAYA BLK.H4 / 08 RT/RW:007/002', 'KEL. CIKUPA KEC. CIKUPA, KABUPATEN TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1168', '1168', 'HJ. RENI UMIRI', 'KTP', '3671077009740003', '0000-00-00', '', '', 'JL. RAYA PROKLAMASI NO. 1 RT 002/009 ', 'KEL. CIMONE KEC. KARAWACI, KOTA TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1169', '1169', 'ABD. WAHID WIJAYA', 'KTP', '3671070208860006', '0000-00-00', '', '', 'JL. BANJARMASIN BLOK C IV NO. 6 RT/RW 007/004', 'KEL. CIMONE KEC. KARAWACI, TANGERANG', null, 'Home Owner', '2017-12-05', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1170', '1170', 'MUHAMMAD AKBAR', 'KTP', '3671071805940001', '0000-00-00', '', '', 'JL. GAMA IV NO. 18 RT 007/008', 'KEL. CIMONE KEC. KARAWACI, TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1171', '1171', 'MEI WULAN SARI SUYONO, ST.', 'KTP', '3671134805810006', '0000-00-00', '', '', 'KOMP. DEPLU KAV. 198 NO. 8 RT/RW 007/007', 'KEL. CIPADU JAYA KEC. LARANGAN, TANGERANG', null, 'Home Owner', '0000-00-00', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1172', '1172', 'INDRA GUNAWAN', 'KTP', '3671110806730004', '0000-00-00', '', '', 'JL. BUKIT GOLF XI BLOK QG-V/26 RT/RW 001/008', 'KEL. CIPETE KEC. PINANG, TANGERANG', null, 'Home Owner', '2017-12-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1173', '1173', 'NA LINDA', 'KTP', '3175034110730009', '0000-00-00', '', '', 'JL. BIRU LAUT X/7 RT/RW 012/011', 'KEL. CIPINANG CEMPEDAK', null, 'Home Owner', '2017-12-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1174', '1174', 'IRMA HADI SUTJIPTO', 'KTP', '3175034608831001', '0000-00-00', '', '', 'JL CIPINANG MUARA RT/RW 008/001 ', 'KEL. CIPINANG MUARA KEC.JATI NEGARA, JAKARTA TIMUR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1175', '1175', 'ENY SUWARTINI SUSANTO', 'KTP', '3671055609670001', '0000-00-00', '', '', 'PORIS INDAH BLOK E/718 RT/RW 013/005', 'KEL. CIPONDOH INDAH KEC. CIPONDOH', null, 'Home Owner', '2017-12-07', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1176', '1176', 'TJHIN AY CEN', 'KTP', '3671054506740013', '0000-00-00', '', '', 'PORIS INDAH BLOK G 13/16 RT/RW 004/001', 'KEL. CIPONDOH INDAH KEC. CIPONDOH, KOTA TANGERANG', null, 'Home Owner', '2018-01-17', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1177', '1177', 'WILLIAM BERNHARD', 'KTP', '3671052607840092', '0000-00-00', '', '', 'CIPONDOH MAKMUR BLOK CV/28 RT/RW 008/004', 'KEL. CIPONDOH MAKMUR KEC. CIPONDOH, TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1178', '1178', 'LIANA ODILIA', 'KTP', '3201014409940005', '0000-00-00', '', '', 'TAMAN PERMATA CIBINONG BLOK E2 NO.14 RT 008 RW 009 ', 'KEL. CIRIUNG KEC. CIBINONG KAB. BOGOR ', null, 'Home Owner', '2018-02-10', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1179', '1179', 'LUSIYANA JUWITA RESDIANI', 'KTP', '3604294509820006', '0000-00-00', '', '', 'KP CISAAT KIDUL 012/004 ', 'KEL. CISAAT KEC. PADARINCANG, KAB. SERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1180', '1180', 'NOVIANTI DA YENA', 'KTP', '1174035011910003', '0000-00-00', '', '', 'CLUSTER TRIMEZIA 8 NO.21 GADING SERPONG RT 004 RW 008', 'KEL. CURUG SANGERENG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1181', '1181', 'JULIUS', 'KTP', '3603181812850001', '0000-00-00', '', '', 'CLUSTER TRIMEZIA 8 NO. 21 GADING SERPONG RT 004/008', 'KEL. CURUG SANGERENG KEC. KELAPA DUA KAB. TANGERAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1182', '1182', 'JUNIWATY', 'KTP', '3603145906840008', '0000-00-00', '', '', 'VILLA TAMAN BANDARA O-5 NO. 31 B RT/RW 009/010', 'KEL. DADAP ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1183', '1183', 'SUSANTY', 'KTP', '3603144108760001', '0000-00-00', '', '', 'GRIYA DADAP ESTATE F4 NO. 12A RT 003/007', 'KEL. DADAP KEC. KOSAMBI KAB. TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1184', '1184', 'WIDI LETTAN', 'KTP', '3603140709680003', '0000-00-00', '', '', 'VILLA TAMAN BANDARA M-3 NO. 16 RT/RW 001/010', 'KEL. DADAP KEC. KOSAMBI, KAB. TANGERANG', null, 'Home Owner', '2017-12-17', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1185', '1185', 'EFFENDY DAN LI KIAN', 'KTP', '3603145204740001', '0000-00-00', '', '', 'VILLA TAMAN BANDARA H-5 NO.19 RT 004 RW 010', 'KEL. DADAP KEC.KOSAMBI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1186', '1186', 'VALENTINE ADRIAAN', 'KTP', '7171054502910001', '0000-00-00', '', '', 'LINGKUNGAN. VI RT-/006 ', 'KEL. DENDENGAN DALAM KEC. TIKALA, MANADO', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1187', '1187', 'JOHANES KURNIAWAN WINATA', 'KTP', '3374030905920005', '0000-00-00', '', '', 'GREEN VILLE BLOK AL. 28-29 RT/RW 005/014', 'KEL. DURI KEPA KEC. KEBON JERUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1188', '1188', 'HERSON LIMOA', 'KTP', '3173051006850006', '0000-00-00', '', '', 'JL ANGSANA RAYA I BLOK K 400/7 RT 015/007 ', 'KEL. DURI KEPA KEC. KEBON JERUK, DKI JAKARTA', null, 'Home Owner', '2017-12-07', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1189', '1189', 'SISKA WELIANI SE', 'KTP', '5271034608880003', '0000-00-00', '', '', 'JL. MANGGA I BLOK C NO. 3 RT 008/003', 'KEL. DURI KEPA KEC. KEBON JERUK, JAKARTA BARAT', null, 'Home Owner', '2017-12-07', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1190', '1190', 'PRASELIA KRISTIANA', 'KTP', '3173016403880008', '0000-00-00', '', '', 'JL. H. MALI NO. 41 RT 006/001', 'KEL. DURI KOSAMBI KEC. CENGKARENG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1191', '1191', 'DIDIK SUTRISNO', 'KTP', '3173012601710002', '0000-00-00', '', '', 'JL. CHRYSANT BLOK L NO. 15 RT/RW 004/012', 'KEL. DURI KOSAMBI KEC. CENGKARENG, JAKARTA BARAT', null, 'Home Owner', '2018-01-07', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1192', '1192', 'NATASYA PUTRI', 'KTP', '3173016402920001', '0000-00-00', '', '', 'KOSAMBI BARU BLOK D5/15 RT/RW 008/009', 'KEL. DURI KOSAMBI KEC. CENGKARENG, JAKARTA BARAT', null, 'Home Owner', '2018-02-28', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1193', '1193', 'TJHANG VERONICA B', 'KTP', '3173045411910003', '0000-00-00', '', '', 'JL. SD GARUDA NO. 11 B RT/RW 003/002', 'KEL. DURI UTARA KEC. TAMBORA, JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1194', '1194', 'TJONG SE MIN', 'KTP', '3173040908660004', '0000-00-00', '', '', 'GG. MESJID NO. 7 RT/RW 007/002', 'KEL. DURI UTARA KEC. TAMBORA, JAKARTA BARAT', null, 'Home Owner', '2017-12-04', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1195', '1195', 'TJHAI LI FUNG', 'KTP', '3173044204740006', '0000-00-00', '', '', 'JL. TSS GG. TRIKORA II/22-A RT 002/005', 'KEL. DURI UTARA KEC. TAMBORA, JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1196', '1196', 'GOU EDY GUNAWAN', 'KTP', '3276041011630003', '0000-00-00', '', '', 'JL. BUKIT CINERE NO. 58 RT 002 RW 001 ', 'KEL. GANDUL KEC. CINERE, DEPOK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1197', '1197', 'ERNAWATY', 'KTP', '3671085507730009', '0000-00-00', '', '', 'JL. VILA TANGERANG REGENCY I BLOK OB NO. 22 RT/RW 007/017', 'KEL. GEBANG RAYA KEC. PERIUK, TANGERANG', null, 'Home Owner', '2017-12-11', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1198', '1198', 'JUHARDI', 'KTP', '3671081911820004', '0000-00-00', '', '', 'VLLA TANGERANG REGENCY BLOK NC3 NO 15 RT 005 RW 007 ', 'KEL. GEBANG RAYA KEC. PERIUK, TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1199', '1199', 'LIANA', 'KTP', '3671086901850004', '0000-00-00', '', '', 'VILLA TANGERANG INDAH BLOK AC 2 NO. 5 RT 005/012', 'KEL. GEBANG RAYA KEC. PERIUK, TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1200', '1200', 'JOHANES SETIADJAJA', 'KTP', '3603121803700002', '0000-00-00', '', '', 'VILA REGENSI TNG II BLOK AA-1 NO.1 RT 001 RW 005 ', 'KEL. GELAM JAYA KEC. PASAR KEMIS', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1201', '1201', 'BONG BUN MIN', 'KTP', '3671051303720007', '0000-00-00', '', '', 'JL.RAJAWALI SELATAN 1 RT 018 RW 002', 'KEL. GUNUNG SAHARI UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1202', '1202', 'GUSTAV OCTHORA', 'KTP', '3171021708840006', '0000-00-00', '', '', 'JL INDUSTRI II/40 RT/RW 013/001', 'KEL. GUNUNG SAHARI UTARA KEC. SAWAH BESAR, JAKARTA', null, 'Home Owner', '2017-12-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1203', '1203', 'TJEUW ANDRY', 'KTP', '3171020502730007', '0000-00-00', '', '', 'JL. GUNUNG SAHARI IX/27 RT 009 RW 004 ', 'KEL. GUNUNG SAHARI UTARA KEC. SAWAH BESAR, JAKARTA', null, 'Home Owner', '2017-12-10', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1204', '1204', 'MAURITZ NAINGGOLAN', 'KTP', '3171020802730004', '0000-00-00', '', '', 'KOMPLEK W.A.P BLOK J.26 RT 007 RW 007 ', 'KEL. GUNUNG SAHARI UTARA KEC. SAWAH BESAR, JAKARTA', null, 'Home Owner', '2017-12-17', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1205', '1205', 'LINDA PUSPA DEWI', 'KTP', '3201035308860001', '0000-00-00', '', '', 'PERUM INDOGREEN BLOK C.8/31 RT/RW 004/004', 'KEL. GUNUNGSARI KEC.', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1206', '1206', 'SYARIF HIDAYATULLOH', 'KTP', '1801160605710002', '0000-00-00', '', '', 'JALAN KECAPI RAYA RT01 RW 06 ', 'KEL. JAGARAKSA KEC. JAGARAKSA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1207', '1207', 'GRACE NATALIA SURIPATTY', 'KTP', '3275081601070040', '0000-00-00', '', '', 'JL. CURUG RAYA B NO. 32 RT 005 RW 001', 'KEL. JATI CEMPAKA KEC. PONDOK GEDE', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1208', '1208', 'IMELDA GANI', 'KTP', '3173026904820002', '0000-00-00', '', '', 'KOMP. PAKUWON BLOK.A NO. 14 RT/RW 007/003', 'KEL. JELAMBAR BARU KEC. GROGOL PETAMBURAN', null, 'Home Owner', '2017-12-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1209', '1209', 'WILLIAM WINARTO', 'KTP', '3173062306960007', '0000-00-00', '', '', 'KOMP. PAKUWON BLOK M NO.2 RT 004 RW 009 ', 'KEL. JELAMBAR BARU KEC. GROGOL PETAMBURAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1210', '1210', 'LOSDI', 'KTP', '3173020505610006', '0000-00-00', '', '', 'TMN DUTA MAS BLOK A-4 NO.3 RT 003 RW 012 ', 'KEL. JELAMBAR BARU KEC. GROGOL PETAMBURAN, JAKARTA', null, 'Home Owner', '2017-12-09', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1211', '1211', 'IVAN ANDRI HOLIM. S.KOM', 'KTP', '3173022902840002', '0000-00-00', '', '', 'JL. JELAMBAR BARU RAYA NO 29B. RT 004/007. ', 'KEL. JELAMBAR KEC. GROGOL PETAMBURAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1212', '1212', 'RIANGTO SUPARDY', 'KTP', '3674020209830004', '0000-00-00', '', '', 'VILLA MELATI MAS BLOK U-9 NO. 29 RT/RW 005/008', 'KEL. JELUPANG KEC. SERPONG UTARA, TANGERANG SELATA', null, 'Home Owner', '2018-01-13', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1213', '1213', 'FREDDY CHANDRA', 'KTP', '3173022905820011', '0000-00-00', '', '', 'TMN ALFA INDAH D9/13 RT 005 / RW 005 ', 'KEL. JOGLO KEC. KEMBANGAN, JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1214', '1214', 'KUNTORO ADI JAYA', 'KTP', '3671042911640001', '0000-00-00', '', '', 'PURI LESTARI BLOK E2/21 RT 001 RW 007 ', 'KEL. JURUMUDI KEC. BENDA, TANGERANG', null, 'Home Owner', '2017-12-25', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1215', '1215', 'SUNG SEN NGO', 'KTP', '3671046802790002', '0000-00-00', '', '', 'PURI LESTARI BLOK H.3/05 RT/RW 002/007', 'KEL. JURUMUDI KEC. BENDA, TANGERANG', null, 'Home Owner', '2017-12-25', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1216', '1216', 'DEDEN KURNIADI', 'KTP', '3603182003850008', '0000-00-00', '', '', 'PERUM GRAND PURI ASIH BLOK B3/6 RT 004/007', 'KEL. KADU JAYA KEC. CURUG KAB. TANGERANG', null, 'Home Owner', '2017-12-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1217', '1217', 'ROY SANDY', 'KTP', '3173062202890013', '0000-00-00', '', '', 'CITRA I EXT BLOK AC-5/5 RT/RW 007/015', 'KEL. KALIDERES', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1218', '1218', 'MEGA SANTHI', 'KTP', '3172014709800009', '0000-00-00', '', '', 'VIKAMAS II BLOK J-6 NO.27 RT 005/003', 'KEL. KAPUK MUARA KEC. PENJARINGAN JAKARTA UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1219', '1219', 'FERONIKA ARYATI', 'KTP', '1274014502940004', '0000-00-00', '', '', 'RUKO KAPUK KENCANA I NO.1 RT/RW 004/003', 'KEL. KAPUK MUARA KEC. PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1220', '1220', 'GINGER DOROTHY', 'KTP', '3671075709980003', '0000-00-00', '', '', 'JL. BERINGIN RAYA BLOK 29 / 53 RT 006/003', 'KEL. KARAWACI BARAT KEC.KARAWACI TANGERANG', null, 'Home Owner', '2017-12-07', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1221', '1221', 'FRANSISCA', 'KTP', '3174026712790001', '0000-00-00', '', '', 'KARET BELAKANG RT/RW 017/007', 'KEL. KARET KUNINGAN KEC. SETIA BUDI, JAKARTA SELAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1222', '1222', 'SHERLY TANDY', 'KTP', '3171026109890005', '0000-00-00', '', '', 'JL. KARTINI XIII DALAM RT/RW 011/009 ', 'KEL. KARTINI ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1223', '1223', 'MUH NUR RAHMAT RAMADHAN', 'KTP', '3174040808790020', '0000-00-00', '', '', 'KEBAGUSAN IV NO.15 RT 006 RW 004', 'KEL. KEBAGUSAN KEC. PASAR MINGGU, JAKARTA SELATAN', null, 'Home Owner', '2018-02-10', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1224', '1224', 'FRANSISCUS XAVERIUS JOHAN', 'KTP', '3173050404910009', '0000-00-00', '', '', 'KEBON JERUK BARU A9/23 RT 001/008', 'KEL. KEBON JERUK KEC. KEBON JERUK, JAKARTA BARAT', null, 'Home Owner', '2017-12-03', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1225', '1225', 'ANDY', 'KTP', '3173022204840004', '0000-00-00', '', '', 'KEBON JERUK MANIS V RT 001 RW 010', 'KEL. KEBON JERUK KEC. KEBON JERUK, JAKARTA BARAT', null, 'Home Owner', '2018-01-28', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1226', '1226', 'BELINDA', 'KTP', '3171076910870006', '0000-00-00', '', '', 'KEBON KACANG 19 NO. 3-A RT/RW 001/003', 'KEL. KEBON KACANG KEC. TANAH ABANG, JAKARTA PUSAT', null, 'Home Owner', '2018-01-18', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1227', '1227', 'MARIA', 'KTP', '3173014306720017', '0000-00-00', '', '', 'PERUM CASA JARDIN BLOK C6 NO. 10 RT 001/009', 'KEL. KEDAUNG KALI ANGKE KEC. CENGKARENG JAKARTA BA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1228', '1228', 'YUSTINA', 'KTP', '317305617800002', '0000-00-00', '', '', 'JL. SURYA MANDALA BLK K-3/39 RT/RW 001/005', 'KEL. KEDOYA UTARA KEC. KEBON JERUK, JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1229', '1229', 'YUSTINA', 'KTP', '3173056107800002', '0000-00-00', '', '', 'JL. SURYA MANDALA BLK K-3/39 RT/RW 001/005', 'KEL. KEDOYA UTARA KEC. KEBON JERUK, JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1230', '1230', 'YUSTINA', 'KTP', '3173056107800002', '0000-00-00', '', '', 'JL. SURYA MANDALA BLK K-3/39 RT/RW 001/005', 'KEL. KEDOYA UTARA KEC. KEBON JERUK, JAKARTA BARAT', null, 'Home Owner', '2017-12-08', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1231', '1231', 'CINDY', 'KTP', '3171025809830005', '0000-00-00', '', '', 'APT. CITY HOME TOWER MANHATTAN BAY LT.21/11 RT/RW 009/019', 'KEL. KELAPA GADING BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1232', '1232', 'KEVIN KATAMSIE', 'KTP', '3671011211580003', '0000-00-00', '', '', 'JL. P. DEWA III BLOK P. 4/8 MDL RT 006/002', 'KEL. KELAPA INDAH KEC. TANGERANG, TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1233', '1233', 'KIANADI FERNANDES', 'KTP', '3173051501650003', '0000-00-00', '', '', 'JL. KEMBANGAN RAYA NO.112 RT 004 RW 003', 'KEL. KEMBANGAN UTARA KEC. KEMBANGAN, JAKARTA BARAT', null, 'Home Owner', '2017-12-13', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1234', '1234', 'MELLY GANI', 'KTP', '3173055004670010', '0000-00-00', '', '', 'JL. PULAU OPAK III BLOK A12 NO.10 RT 005 RW 011', 'KEL. KEMBANGAN UTARA KEC. KEMBANGAN, JAKARTA BARAT', null, 'Home Owner', '2017-12-14', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1235', '1235', 'WIWIN WINARSIH', 'KTP', '3212224502950001', '0000-00-00', '', '', 'BLOK KIBUYUT RT 008/001', 'KEL. KERTAJAYA KEC. BONGSAS', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1236', '1236', 'FITRIANA PATRICIA WANGANIA', 'KTP', '1871064402920005', '0000-00-00', '', '', 'GREEN LAKE CITY CLUSTER WEST EUROPE 10 NO. 51 RT 004 RW 009', 'KEL. KETAPANG KEC. CIPONDOH, KOTA TANGERANG', null, 'Home Owner', '2018-02-28', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1237', '1237', 'BONG FRANSISKUS', 'KTP', '3603142408510001', '0000-00-00', '', '', 'KOSAMBI TIMUR RT/RW 030/008', 'KEL. KOSAMBI TIMUR KEC. KOSAMBI, KABUPATEN TANGERA', null, 'Home Owner', '2017-12-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1238', '1238', 'DEVI', 'KTP', '3604116010890001', '0000-00-00', '', '', 'KP. SENTUL RT/RW 005/004', 'KEL. KRAGILAN KEC. KRAGILAN, KABUPATEN SERANG', null, 'Home Owner', '2017-12-15', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1239', '1239', 'BAMBANG ISWAHYUDI', 'KTP', '3603120811860006', '0000-00-00', '', '', 'PERUM GRIYA LEBAK WANGI BLOK G-3 NO.10 RT 004 RW 009', 'KEL. LEBAK WANGI KEC. SEPATAN TIMUR, KAB. TANGERAN', null, 'Home Owner', '2018-02-27', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1240', '1240', 'RONAL WIJAYA', 'KTP', '3674012410830003', '0000-00-00', '', '', 'VILLA MELATI MAS SR-12 NO. 12 RT/RW 002/001', 'KEL. LENGKONG KARYA ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1241', '1241', 'JEMI WIJAYA', 'KTP', '3674021012800001', '0000-00-00', '', '', 'VILLA MELATI MAS BLOK SR.9/8 RT/RW 001/001', 'KEL. LENGKONG KARYA ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1242', '1242', 'RAHMAT KURNIAWAN DJUNAIDI', 'KTP', '3173062709700009', '0000-00-00', '', '', 'JL. MANGGA BESAR 13 NO. 178 RT 005/004', 'KEL. MANGGA DUA SELATAN KEC. SAWAH BESAR, JAKARTA ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1243', '1243', 'THEN DJUN NGO', 'KTP', '3171026404650002', '0000-00-00', '', '', 'JL. MANGGA BESAR XIII RT 007/005 ', 'KEL. MANGGA DUA SELATAN KEC. SAWAH BESAR, JAKARTA ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1244', '1244', 'MEGA LINDAWATI', 'KTP', '3171026103840004', '0000-00-00', '', '', 'JL. MANGGA BESAR XIII RT/RW 008/003', 'KEL. MANGGA DUA SELATAN KEC. SAWAH BESAR, JAKARTA ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1245', '1245', 'YOSSIANA', 'KTP', '3171025203890003', '0000-00-00', '', '', 'JL. P JAYAKARTA DALAM RT 004/008', 'KEL. MANGGA DUA SELATAN KEC. SAWAH BESAR, JAKARTA ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1246', '1246', 'JULIANA', 'KTP', '3173035012790001', '0000-00-00', '', '', 'JLN. KEBON JERUKXVII DLM. NO.3  RT 014 RW 008', 'KEL. MAPHAR KEC. TAMAN SARI, JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1247', '1247', 'JESSLYN LAWIN', 'KTP', '1271174208920001', '0000-00-00', '', '', 'JL. LETJEN JAMIN GINTING NO. 46 RT/RW 000/000', 'KEL. MERDEKA KEC. MEDAN BARU, KOTA MEDAN', null, 'Home Owner', '2018-01-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1248', '1248', 'FRANKY LENGKONG', 'KTP', '3173081510770005', '0000-00-00', '', '', 'TAMAN KEBON JERUK A II/12 RT 004 RW 007 ', 'KEL. MERUYA SELATAN KEC. KEMBANGAN, JAKARTA BARAT', null, 'Home Owner', '2018-01-29', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1249', '1249', 'WADI', 'KTP', '3173082103830005', '0000-00-00', '', '', 'TMN VILLA MERUYA A I/45 RT/RW 001/010', 'KEL. MERUYA SELATAN KEC. KEMBANGAN, JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1250', '1250', 'VALENTINO TANIDJAYA', 'KTP', '1371012111830005', '0000-00-00', '', '', 'APT. PURI PARK VIEW TOWER E 12/11 RT/RW 008/005', 'KEL. MERUYA UTARA KEC. KEMBANGAN, JAKARTA BARAT', null, 'Home Owner', '2017-12-11', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1251', '1251', 'MELY', 'KTP', '1971016108870002', '0000-00-00', '', '', 'CIKAHURIPAN RT/RW 005/006', 'KEL. NEGLASARI KEC. NEGLASARI, KOTA TANGERANG', null, 'Home Owner', '2017-12-19', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1252', '1252', 'LOEKITO MARTONO', 'KTP', '3402160503800004', '0000-00-00', '', '', 'JL TAMBAK NO 13 KAV 10 RT/RW 003/-', 'KEL. NGESTIHARJO KEC. KASIHAN KABUPATEN BANTUL', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1253', '1253', 'TRESYE', 'KTP', '3671077007810004', '0000-00-00', '', '', 'TAMAN PABUARAN BLOK B-4 NO.1 RT 005 RW 006', 'KEL. PABUARAN KEC. KARAWACI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1254', '1254', 'MELY', 'KTP', '3671075908870002', '0000-00-00', '', '', 'BENUA INDAH BLOK A-8 NO. 5 RT 002 RW 005', 'KEL. PABUARAN TUMPENG KEC. KARAWACI, TANGERANG', null, 'Home Owner', '2018-02-10', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1255', '1255', 'LEO HARI WIJAYA', 'KTP', '3671071109900002', '0000-00-00', '', '', 'BENUA INDAH BLOK A-8 NO. 5 RT 002 RW 005', 'KEL. PABUARAN TUMPENG KEC. KARAWACI, TANGERANG', null, 'Home Owner', '2018-02-10', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1256', '1256', 'ADE JOKO SETIAWAN NG', 'KTP', '3172050608690011', '0000-00-00', '', '', 'JL. TAMAN HIDUP BARU NO. 79 RT/RW 014/014', 'KEL. PADEMANGAN BARAT KEC. PADEMANGAN, JAKARTA UTA', null, 'Home Owner', '2017-12-13', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1257', '1257', 'THENDRI LIANTO', 'KTP', '3172051807790003', '0000-00-00', '', '', 'JL. PADEMANGAN II GG. 24 NO. 1 RT/RW 006/002', 'KEL. PADEMANGAN TIMUR KEC. PADEMANGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1258', '1258', 'RIONALDO HARYADI', 'KTP', '3275113103990006', '0000-00-00', '', '', 'PERUM LEGENDA PARK BLOK C1 NO. 23 RT 004 RW 017', 'KEL. PADURENAN KEC. MUSTIKA JAYA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1259', '1259', 'DENNY SAHALA', 'KTP', '1571022109780001', '0000-00-00', '', '', 'JL. A. TARMIZI KADIR NO. 51 RT/RW 004/000', 'KEL. PAKUAN BARU KEC. JAMBI SELATAN, KOTA JAMBI', null, 'Home Owner', '2018-02-09', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1260', '1260', 'EDY GALAXCY', 'KTP', '6171012802870004', '0000-00-00', '', '', 'GRBJ. CLUSTER VERINA BLOK J NO.5 RT 004 RW 020', 'KEL. PAKUJAYA KEC. SERPONG UTARA, KOTA TANGERANG S', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1261', '1261', 'EDWIN S GOSAL', 'KTP', '3674022606620006', '0000-00-00', '', '', 'GRAHA RAYA BINTARO JAYA BLOK F4/17 RT 001 RW 011', 'KEL. PAKUJAYA KEC. SERPONG UTARA, TANGERANG SELATA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1262', '1262', 'IVONNY KURNIA', 'KTP', '3603284407740009', '0000-00-00', '', '', 'JL. GAJAH MADA I AD-7/3 RT 003 RW 0122 ', 'KEL. PAKULONAN BARAT KEC. KELAPA DUA, KAB. TANGERA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1263', '1263', 'TAN ZHAO SHENG', 'KTP', '3671090907640004', '0000-00-00', '', '', 'JL. TAMAN PARIS I NO. 228. LIPPO KARAWACI. RT. 001. RW.009. ', 'KEL. PANUNGGANGAN BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1264', '1264', 'MAYA NURLAELY', 'KTP', '790513241947', '0000-00-00', '', '', 'KOMP. BPPB BLOK P NO. 51 RT/RW 001/004', 'KEL. PASIRMULYA KOTA BOGOR', null, 'Home Owner', '2017-12-07', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1265', '1265', 'ELLEN BUDIMAN', 'KTP', '1871125507880006', '0000-00-00', '', '', 'CITRA 5 BLOK E 5/9 RT 003/016', 'KEL. PEGADUNGAN KEC. KALI DERES, JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1266', '1266', 'SELLY SULISTHIA', 'KTP', '3671037008900001', '0000-00-00', '', '', 'TMN SURYA 3 BLOK J-4/30 RT 009 RW 015 ', 'KEL. PEGADUNGAN KEC. KALI DERES, JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1267', '1267', 'CALVIN AFFANDI', 'KTP', '3173060607740004', '0000-00-00', '', '', 'CITRA 2 EXT BLK BJ7/10 RT/RW 010/002', 'KEL. PEGADUNGAN KEC. KALIDERES, JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1268', '1268', 'SELVY NOVIATI', 'KTP', '3374026211830004', '0000-00-00', '', '', 'APT GADING NIAS RESIDENCES W/10/WF RT/RW 002/003', 'KEL. PEGANGSAAN DUA KEC. KELAPA GADING, JAKARTA UT', null, 'Home Owner', '2017-12-13', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1269', '1269', 'HENY YULIANTI', 'KTP', '3172055012810002', '0000-00-00', '', '', 'JL. KELAPA NIAS PC 3 NO.14 RT 001 RW 003 ', 'KEL. PEGANGSAAN DUA KEC. KELAPA GADING, JAKARTA UT', null, 'Home Owner', '2017-12-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1270', '1270', 'JULI', 'KTP', '3172045611780017', '0000-00-00', '', '', 'APT GADING GREEN HILL U B/07/17 RT/RW 004/003', 'KEL. PEGANGSAAN DUA, KEC. KELAPA GADING, JAKARTA U', null, 'Home Owner', '2017-12-03', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1271', '1271', 'EDDIYANTO', 'KTP', '3172010506740009', '0000-00-00', '', '', 'JL. C NO 4 TELUK GONG KAV RT 11/010 ', 'KEL. PEJAGALAN KEC. PENJARINGAN JAKARTA UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1272', '1272', 'WIDYA ELSHINTA', 'KTP', '3173046406720004', '0000-00-00', '', '', 'JL. JEMBATAN ITEM NO.25 RT 004 RW 007 ', 'KEL. PEKOJAN KEC. TAMBORA, JAKARTA BARAT', null, 'Home Owner', '2018-02-10', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1273', '1273', 'RIDWAN SUDJANA', 'KTP', '3172012512800018', '0000-00-00', '', '', 'JL. PLUIT DALAM RT/RW 004/008', 'KEL. PENJARINGAN KEC. PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1274', '1274', 'LIM FUI SHANG', 'KTP', '3172012904800002', '0000-00-00', '', '', 'JL. TANAH PASIR RT 003/011', 'KEL. PENJARINGAN KEC. PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1275', '1275', 'TJU, STEVEN CHIPUTRA', 'KTP', '3172011309850004', '0000-00-00', '', '', 'JL. RAWA BEBEK I NO. 12 RT/RW 016/011', 'KEL. PENJARINGAN, KAB. PENJARINGAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1276', '1276', 'LEONARDI WILLIM', 'KTP', '1471042110620001', '0000-00-00', '', '', 'JL. TANJUNG DATUK NO. 130-A 004/003', 'KEL. PESISIR KEC. LIMA PULUH, PEKANBARU', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1277', '1277', 'MEYLIA I Y RIZAL', 'KTP', '3171076405810007', '0000-00-00', '', '', 'PETAMBURAN RT.010 RW.006', 'KEL. PETAMBURAN KEC. TANAH ABANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1278', '1278', 'VALENS ADITYA WIHARTO', 'KTP', '3671052004820006', '0000-00-00', '', '', 'KOMPLEK CANTIGA BLOK A4-4 RT/RW 001/005', 'KEL. PETIR KEC. CIPONDOH, KOTA TANGERANG', null, 'Home Owner', '2017-12-25', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1279', '1279', 'INGGRID KURNIAWAN', 'KTP', '3171014408760003', '0000-00-00', '', '', 'JL. PETOJO SABANGAN XI / 12 RT 015 RW 004 ', 'KEL. PETOJO SELATAN KEC. GAMBIR ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1280', '1280', 'TJIA SWANTY', 'KTP', '3171015911440001', '0000-00-00', '', '', 'JL SADAR III/2 RT/RW 007/004', 'KEL. PETOJO UTARA KEC. GAMBIR, JAKARTA PUSAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1281', '1281', 'ROBERT TJAHJADI', 'KTP', '317101141282001', '0000-00-00', '', '', 'JL. AM SANGAJI NO. 21 A RT/RW 008/003', 'KEL. PETOJO UTARA, KEC. GAMBIR, JAKARTA PUSAT', null, 'Home Owner', '2017-12-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1282', '1282', 'INDRIANI', 'KTP', '3172016803900002', '0000-00-00', '', '', 'MUARA KARANG BLOK AA.5.UTR/21 RT/RW 010/017', 'KEL. PLUIT KEC.', null, 'Home Owner', '2017-12-07', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1283', '1283', 'DRS. BUDI TJAHYADI', 'KTP', '3172011707510004', '0000-00-00', '', '', 'MUARA KARANG BLOK F.1.U/19 RT/RW 007/002', 'KEL. PLUIT KEC.', null, 'Home Owner', '2017-12-19', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1284', '1284', 'YOHANES', 'KTP', '3172011501870010', '0000-00-00', '', '', 'MUARA KARANG BLOK H.5.T/32 RT/RW 007/001', 'KEL. PLUIT KEC. PENJARINGAN JAKARTA UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1285', '1285', 'TOMMY SUGITA', 'KTP', '3671051409920004', '0000-00-00', '', '', 'JL. TAMAN GOLF BARAT 2 AG.7/45 RT/RW 001/014', 'KEL. PORIS PLAWAD INDAH KEC. CIPONDOH, TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1286', '1286', 'SUINOTO', 'KTP', '3671050504890014', '0000-00-00', '', '', 'GG. H HALIMAH RT/RW 002/001', 'KEL. PORIS PLAWAD UTARA KEC. CIPONDOH, TANGERANG', null, 'Home Owner', '2017-12-08', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1287', '1287', 'UTE VALENTINA DARMALI', 'KTP', '3175026202510003', '0000-00-00', '', '', 'JL. KAYU PUTIH 1/IIA RT 011/008', 'KEL. PULO GADUNG KEC. PULO GADUNG JAKARTA TIMUR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1288', '1288', 'UTE VALENTINA DARMALI', 'KTP', '3175026202510003', '0000-00-00', '', '', 'JL. KAYU PUTIH I/11 A RT 011/008', 'KEL. PULO GADUNG KEC. PULO GADUNG, JAKARTA TIMUR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1289', '1289', 'FENNY', 'KTP', '3576024902910001', '0000-00-00', '', '', 'JL. WR. SUPRATMAN 20 RT/RW 002/001', 'KEL. PURWOTENGAH KEC. MAGERSARI, KOTA MOJOKERTO', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1290', '1290', 'SANDI ROMADON', 'KTP', '1812011005850012', '0000-00-00', '', '', 'JL. DHARMA WANITA V RT 004 RW 001 ', 'KEL. RAWA BUAYA KEC. CENGKARENG, JAKARTA BARAT', null, 'Home Owner', '2018-02-27', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1291', '1291', 'NOVITA AGUSTINA', 'KTP', '3316024312870003', '0000-00-00', '', '', 'DESA SAMBONGWANGAN RT/RW 001/001', 'KEL. SAMBONGWANGAN KEC. ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1292', '1292', 'JOSHUA', 'KTP', '3674012807931001', '0000-00-00', '', '', 'THE ICON VERDANT VIEW BLOK J.5 NO. 7 BSD CITY RT/RW 004/010', 'KEL. SAMPORA KEC. CISAUK, KAB. TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1293', '1293', 'IRHAMSYAH', 'KTP', '1771061411880002', '0000-00-00', '', '', 'JL SEPAKAT I NO.52 RT 014 RW 004 ', 'KEL. SAWAH LEBAR BARU KEC. RATU AGUNG, BENGKULU', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1294', '1294', 'ROBBY DAN BERRY CANDERA', 'KTP', '3173020806850005', '0000-00-00', '', '', 'PERUM GREENLAND CLUSTER 1 BLOK H 36 RT 005/002', 'KEL. SELINDUNG KEC. GABEK PANGKAL PINANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1295', '1295', 'NGADI LUPULINDA', 'KTP', '3173065111670002', '0000-00-00', '', '', 'TAMAN SEMANAN INDAH BLOK D 3/29 RT/RW 008/012', 'KEL. SEMANAN KEC.', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1296', '1296', 'ENDANG SURYATI', 'KTP', '3173065407780009', '0000-00-00', '', '', 'TAMAN SEMANAN INDAH BLOK G.1/46 RT/RW 016/012', 'KEL. SEMANAN KEC.', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1297', '1297', 'HERWAN TANATA', 'KTP', '3216052712520002', '0000-00-00', '', '', 'RUKO KALIMALANG INDAH BLOK E NO 3-4 RT/RW 004/003', 'KEL. SETIADARMA KEC. TAMBUN SELATAN, KABUPATEN BEK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1298', '1298', 'FIRDAUS KOMARNO', 'KTP', '3277020402610011', '0000-00-00', '', '', 'JL KPAD SRIWIJAYA 1 NO.19 RT 003/008', 'KEL. SETIAMANAH KEC. CIMAHI TENGAH CIMAHI', null, 'Home Owner', '2018-01-30', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1299', '1299', 'MUHIDIN', 'KTP', '3671110306590001', '0000-00-00', '', '', 'JL. SULTAN AGENG TIRTAYASA RT/RW 002/003', 'KEL. SUDIMARA PINANG KEC. ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1300', '1300', 'ARTHER CHRISTOVAL', 'KTP', '3173052511820001', '0000-00-00', '', '', 'JL. MADRASAH II RT 003 RW 002', 'KEL. SUKABUMI UTARA, KEC. KEBON JERUK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1301', '1301', 'HJ. JUMRIAH', 'KTP', '3603186511570001', '0000-00-00', '', '', 'KP. KADU RT 008 RW 003 ', 'KEL. SUKAMULYA KEC. CIKUPA, KAB. TANGERANG', null, 'Home Owner', '2017-12-19', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1302', '1302', 'YOGI PRAKARSA RITONGA', 'KTP', '3671012805840006', '0000-00-00', '', '', 'JL. KASASI VII BLOK C.7 NO. 6 RT/RW 005/013', 'KEL. SUKASARI KEC. TANGERANG, KOTA TANGERANG', null, 'Home Owner', '2018-02-19', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1303', '1303', 'HASNUL ARIFIN', 'KTP', '3604011906650317', '0000-00-00', '', '', 'JL. SARIBANON BLOK D NO. 4 RT/RW 001/011', 'KEL. SUMUR PECUNG KEC. SERANG, SERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1304', '1304', 'SUDJONO SUNGKONO', 'KTP', '3172061710740002', '0000-00-00', '', '', 'AGUNG PERKASA 16 BL9K J12 NO.114 RT 011 RW 014', 'KEL. SUNTER AGUNG KEC. TANJUNG PRIOK', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1305', '1305', 'HENDRY', 'KTP', '3172021605690007', '0000-00-00', '', '', 'JL. ANCOL SELATAN II NO. 24 A RT/RW 007/007', 'KEL. SUNTER AGUNG KEC. TANJUNG PRIOK, JAKARTA UTAR', null, 'Home Owner', '2017-12-10', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1306', '1306', 'JUNIANTY', 'KTP', '3172066406780008', '0000-00-00', '', '', 'JL. ANCOL SELATAN RT 001 RW 001 ', 'KEL. SUNTER AGUNG KEC. TANJUNG PRIOK, JAKARTA UTAR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1307', '1307', 'DENNY SYAHPUTRA', 'KTP', '3172050302860005', '0000-00-00', '', '', 'JL. NUSANTARA I BLOK H NO. 29 RT 001/017', 'KEL. SUNTER AGUNG KEC. TANJUNG PRIOK, JAKARTA UTAR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1308', '1308', 'SUSAN LIELIANA', 'KTP', '3172025212760020', '0000-00-00', '', '', 'JL. SUNTER MAS BARAT III BLOK H.7 NO. 21 RT/RW 019/008', 'KEL. SUNTER JAYA KEC. TANJUNG PRIOK, JAKARTA UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1309', '1309', 'HERU NAWASI HUDORI', 'KTP', '3603180706920011', '0000-00-00', '', '', 'KP. TALAGA RT 006 RW 001', 'KEL. TALAGA KEC. CIKUPA, KAB. TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1310', '1310', 'PAULIN ANGELINE', 'KTP', '1571086408910001', '0000-00-00', '', '', 'JL. P. DIPOENEGORO NO. 01 RT 002/000', 'KEL. TALANG JAUH KEC. JELUTUNG, JAMBI', null, 'Home Owner', '2018-01-22', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1311', '1311', 'SUSAN LIWANG', 'KTP', '317304420476000', '0000-00-00', '', '', 'JL. TAMBORA V/2 RT 006/001', 'KEL. TAMBORA KEC. TAMBORA JAKARTA BARAT', null, 'Home Owner', '2018-01-30', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1312', '1312', 'SANTI GOWANI', 'KTP', '1902015309880004', '0000-00-00', '', '', 'JL. TAMBORA I/V NO. 73 RT/RW 004/003', 'KEL. TAMBORA KEC. TAMBORA, JAKARTA BARAT', null, 'Home Owner', '2017-12-27', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1313', '1313', 'SUSANTI DEWI', 'KTP', '3271064910700008', '0000-00-00', '', '', 'JL. A. YANI NO. 61 RT 006/004', 'KEL. TANAH SAREAL KEC. TANAH SAREAL, KOTA BOGOR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1314', '1314', 'AGUS MUSTAPA', 'KTP', '3172051206860010', '0000-00-00', '', '', 'JL PEKAPURAN X/25 RT/RW 002/002', 'KEL. TANAH SEREAL KEC. TAMBORA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1315', '1315', 'Djairman Martina', 'KTP', '3173041107680006', '0000-00-00', '', '', 'Jl k.h.z arifin no 30AA', 'KEL. TANAH SEREAL KEC. TAMBORA, JAKARTA BARAT', null, 'Home Owner', '2018-01-05', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1316', '1316', 'MICHAEL THUROVIN', 'KTP', '3173042910910001', '0000-00-00', '', '', 'JL. K.H.M. MANSYUR /170 A RT 001/009', 'KEL. TANAH SEREAL KEC. TAMBORA, JAKARTA BARAT', null, 'Home Owner', '2017-12-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1317', '1317', 'MERY OEITARSA', 'KTP', '3173045006850004', '0000-00-00', '', '', 'JLN. TANAH SEREAL VIII / 25 RT/RW 003/012', 'KEL. TANAH SEREAL KEC. TAMBORA, JAKARTA BARAT', null, 'Home Owner', '2017-12-09', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1318', '1318', 'TJHIN ANDY CRISTIANTO', 'KTP', '3173040404790003', '0000-00-00', '', '', 'TANAH SEREAL XIV / 17 RT/RW 009/010', 'KEL. TANAH SEREAL KEC. TAMBORA, JAKARTA BARAT', null, 'Home Owner', '2017-12-11', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1319', '1319', 'ERICK RINALDO', 'KTP', '3671050303940002', '0000-00-00', '', '', 'TAMAN ROYAL 1 BLOK PINUS 1 NO. 89 RT 006/016', 'KEL. TANAH TINGGI KEC. TANGERANG, KOTA TANGERANG', null, 'Home Owner', '2017-12-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1320', '1320', 'RETTAH', 'KTP', '3671016211720002', '0000-00-00', '', '', 'JL. MAHONI IV NO. 36 TAMAN ROYAL I RT/RW 008/015', 'KEL. TANAH TINGGI KEC. TANGERANG, TANGERANG', null, 'Home Owner', '2017-12-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1321', '1321', 'YAN CAHYADI MULYANTO', 'KTP', '3578241511820002', '0000-00-00', '', '', 'KOND. T. ANGGREK TWR. 6/32 H RT 006/007', 'KEL. TANJUNG DUREN SELATAN KEC GROGOL PETAMBURAN J', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1322', '1322', 'MAGDALENA VIDIAANGRENI', 'KTP', '3173024406850003', '0000-00-00', '', '', 'TG. DUREN SELT II. GG.I/33 RT 013 RW 002 ', 'KEL. TANJUNG DUREN SELATAN KEC. GROGOL PETAMBURAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1323', '1323', 'HENDRIK SUSANTO', 'KTP', '3173022010720009', '0000-00-00', '', '', 'JL. TG DUREN UTR VIII/8/766 RT 002 RW 003 ', 'KEL. TANJUNG DUREN UTARA', null, 'Home Owner', '2017-12-17', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1324', '1324', 'ABIGAEL ELZA CHARISMA', 'KTP', '3175066708970010', '0000-00-00', '', '', 'JL SALAK TIMUR IV/11 RT 003 RW 005 ', 'KEL. TANJUNG DUREN UTARA KEC.', null, 'Home Owner', '2018-01-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1325', '1325', 'JON SOPAKUA', 'KTP', '2171122708799009', '0000-00-00', '', '', 'PARAMA RESIDENCE BLOK F NO. 2 RT/RW 007/010', 'KEL. TANJUNG UNCUNG KEC. BATU AJI, BATAM', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1326', '1326', 'NURWATY', 'KTP', '3173064512840016', '0000-00-00', '', '', 'JL. MALIOBORO III BLOK E-5 / 19 RT 007 RW 006 ', 'KEL. TEGAL ALUR KEC. KALIDERES, JAKARTA BARAT', null, 'Home Owner', '2017-12-09', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1327', '1327', 'VIXTOR', 'KTP', '830712050909', '0000-00-00', '', '', 'PTB KAVLING BLOK B 6 / 12 RT/RW 003/007', 'KEL. TEGAL ALUR KEC. KALIDERES, JAKARTA BARAT', null, 'Home Owner', '2017-12-17', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1328', '1328', 'MUHAMMAD RIZKY FAJAR', 'KTP', '3175040711940008', '0000-00-00', '', '', 'KEL. TENGAH NO.59 RT/RW 006/003 ', 'KEL. TENGAH KEC. KRAMAT JATI, JAKARTA TIMUR', null, 'Home Owner', '2018-02-16', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1329', '1329', 'ERIKSON TANUWIDJAJA', 'KTP', '3173022712890005', '0000-00-00', '', '', 'JL MANDALA TENGAH NO.57 RT 015 RW 004', 'KEL. TOMANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1330', '1330', 'IRAWAN SEPTIAN NUGROHO', 'KTP', '3173022709870013', '0000-00-00', '', '', 'JL.GELONG BARU TENGAH NO.10 ', 'KEL. TOMANG KEC. GROGOL PETAMBURAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1331', '1331', 'LENNY ANGGRAINI', 'KTP', '3175044906840001', '0000-00-00', '', '', 'JL. TOMANG TINGGI IX/8B RT/RW:010/007', 'KEL. TOMANG, KEC. GROGOL PETAMBURAN, JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1332', '1332', 'YANTI YUVIANI', 'KTP', '3174104912640001', '0000-00-00', '', '', 'JL SWADARMA II RT 001 RW 008 ', 'KEL. ULUJAMI KEC. PESANGGRAHAN, JAKARTA SELATAN', null, 'Home Owner', '2017-12-18', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1333', '1333', 'ANDY STEVEN', 'KTP', '3171031601920002', '0000-00-00', '', '', 'JL. HAJI UNG GG. V 6/383 B RT/RW 012/002', 'KEL. UTAN PANJANG, KEC. KEMAYORAN, JAKARTA PUSAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1334', '1334', 'SARAH DANASTRI LANDJANG', 'KTP', '3671095205920002', '0000-00-00', '', '', 'JL. TAMAN TERATAI VIII E-9 NO 8 RT/RW 006/004', 'KEL. UWUNG JAYA KEC. CIBODAS TANGERANG', null, 'Home Owner', '2017-12-07', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1335', '1335', 'RUTH NOVIANA', 'KTP', '3172026211850008', '0000-00-00', '', '', 'JL. WARAKAS III GG.18 NO.11 A ', 'KEL. WARAKAS KEC. TANJUNG PRIOK, JAKARTA UTARA', null, 'Home Owner', '2017-12-12', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1336', '1336', 'DAVID ANDERSON', 'KTP', '317020910840009', '0000-00-00', '', '', 'TAMAN DUTA MAS BLOK E5 NO. 4 RT/RW 008/009 ', 'KEL. WIJAYA KUSUMA KEC.', null, 'Home Owner', '2017-12-07', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1337', '1337', 'IDA BAGUS TEDJA AMBARA', 'KTP', '3174031503700006', '0000-00-00', '', '', 'KEMANG I B RT/RW:010/005', 'KEL.BANGKA KEC.MAMPANG PRAPATAN, JAKARTA SELATAN', null, 'Home Owner', '2017-12-03', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1338', '1338', 'THERESIA', 'KTP', '6171045410880008', '0000-00-00', '', '', 'TMN PALEM LESTARI BLOK Q NO.33 RT/RW 013/008', 'KEL.CENGKARENG BARAT KEC.CENGKARENG, JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1339', '1339', 'JASON INDARTO', 'KTP', '3271012001820017', '0000-00-00', '', '', 'PERUM. MONTECARLO JL. PURNAWARMAN II NO.3A RT/RW:001/006', 'KEL.CIPAKU, KEC.KOTA BOGOR SELATAN, KOTA BOGOR', null, 'Home Owner', '2017-12-09', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1340', '1340', 'SUZILAWATI MATFIQIH', 'KTP', '3671066010830011', '0000-00-00', '', '', 'JL. CIPETE 1 NO.12 RT/RW:007/003 ', 'KEL.CIPETE SELATAN KEC.CILANDAK JAKARTA SELATAN', null, 'Home Owner', '2017-12-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1341', '1341', 'YOHAN GUNAWAN, LING', 'KTP', '3374031009820004', '0000-00-00', '', '', 'JL.JAGALAN MALANG 341 RT/RW:002/006', 'KEL.GABAHAN KEC.SEMARANG TENGAH, KOTA SEMARANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1342', '1342', 'DEVI KRISTINA', 'KTP', '3174056604850004', '0000-00-00', '', '', 'JLN PULO KENANGA RAYA NO.14 A RT/RW:005/015', 'KEL.GROGOL UTARA KEC. KEBAYORAN LAMA JAKARTA SELAT', null, 'Home Owner', '2017-12-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1343', '1343', 'JULIUS LOBIUA,SH MH', 'KTP', '3671011504620002', '0000-00-00', '', '', 'APARTEMENT MODERLAND RED TOWER LT.2 NO.7 RT/RW:001/006', 'KEL.KELAPA INDAH KEC.TANGERANG, KOTA TANGERANG', null, 'Home Owner', '2017-12-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1344', '1344', 'PURWANTO', 'KTP', '3603312712760002', '0000-00-00', '', '', 'TAMAN KIRANA SURYA BLOK C.06/14 RT 006 RW 010', 'KEL.PASANGGRAHAN KEC.SOLEAR ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1345', '1345', 'HENDRA HALIM', 'KTP', '3671120506520003', '0000-00-00', '', '', 'METRO PERMATA I N.6 / 16 RT 005 RW 007 ', 'KEL.PONDOK PUCUNG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1346', '1346', 'METY ANGRIANI', 'KTP', '1871124805920003', '0000-00-00', '', '', 'JL.DOSOMUKO NO 12 LK II RT.011 RW.000 ', 'KEL.SAWAH BREBES KEC.TANJUNG KARANG TIMUR, BANDAR ', null, 'Home Owner', '2017-12-14', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1347', '1347', 'JOHAN. PANDIMAN', 'KTP', '3173012308710008', '0000-00-00', '', '', 'CITRA 6 BLOK H.11 NO 57 RT 011 RW 015 ', 'KEL.TEGAL ALUR, KALIDERES', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1348', '1348', 'MEILINA OEI', 'KTP', '3172064705770004', '0000-00-00', '', '', 'JL GADING PUTIH RAYA UTARA CA-2/6,RT/RW: 011/012 ', 'KEL:KELAPA GADING TIMUR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1349', '1349', 'WENNIATI GUNAWAN', 'KTP', '3173085410630002', '0000-00-00', '', '', 'JL. PULAU PELANGI II/3 RT 003/009', 'KEMBANGAN UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1350', '1350', 'MERRY SEPTHIA MASAL', 'KTP', '6271035802970007', '0000-00-00', '', '', 'JL. MENTENG 1 NO. 7 RT 002/001 ', 'MENTENG ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1351', '1351', 'CHEN HUI', 'KTP', '1320170902440807', '0000-00-00', '', '', 'MES PT. CENTURI METALINDO RT1/1 ', 'NAMBO ILIR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1352', '1352', 'CHEN HUI', 'KTP', '1320170902440', '0000-00-00', '', '', 'MESS PT. CENTURY METALINDO RT 001/001', 'NAMBO ILIR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1353', '1353', 'BURGARI', 'KTP', '3671091407960004', '0000-00-00', '', '', 'JL. ROTTERDAM NO. 25 LIPPO KARAWACI UTARA RT 001/009', 'PANUNGGANGAN BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1354', '1354', 'WU JUN', 'KTP', 'G36135862', '0000-00-00', '', '', 'RRC / PLUIT TIMUR BLOK W SELATAN NO. 50', 'PLUIT TIMUR RESIDENCE', null, 'Home Owner', '2017-12-12', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1355', '1355', 'TJANDRAYANI ARMININGTYASH', 'KTP', '1271056704710001', '0000-00-00', '', '', 'JLKL SUDARSONO NO. 15 LK12 RT 000/000', 'PULO BRAYAN ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1356', '1356', 'EDWIN WIJAYA', 'KTP', '3275031204760017', '0000-00-00', '', '', 'APT SEASONS CITY TH/TA/P4A/AE JL. LATUMENTEN', 'RT/RW 001/005 KEL. JEMBATAN BESI KEC. ', null, 'Home Owner', '2017-12-05', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1357', '1357', 'JAQUELINE GRACE IMELDA SUNARJO', 'KTP', '3271026201750001', '0000-00-00', '', '', 'APT PARK ROYALE TWR 3 UNIT 0813, JL. GATOT SUBROTO KAV 35-39 ', 'RT/RW 009/002 KEL. BENDUNGAN HILIR KEC. ', null, 'Home Owner', '2018-01-31', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1358', '1358', 'ENDRAWATI', 'KTP', '3578304707820002', '0000-00-00', '', '', 'APARTEMEN TELUK INTAN TOWER TOPAZ 7-D JL. TELU ', 'RT/RW 012/013 KEL. PEJAGALAN KEC.', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1359', '1359', 'HINDRALUKITO', 'KTP', '3671011702640001', '0000-00-00', '', '', 'JL. BENTENG MAKASAR GG. IV NO. 35 RT 002/008', 'SUKARASA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1360', '1360', 'ELIZABETH KANYA AN', 'KTP', '3374116809940003', '0000-00-00', '', '', 'JL.BUKIT PALMA 12 RT/RW 008/004 ', 'SUMORBOTO, BANYUMANIK, SEMARANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1361', '1361', 'ELIZABETH KANYA AN', 'KTP', '3374116809940003', '0000-00-00', '', '', 'JL.BUKIT PALMA 12 RT/RW 008/004 ', 'SUMURBOTO, BANYUMANIK, SEMARANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1362', '1362', 'KRISTANTO', 'KTP', '1671052905830002', '0000-00-00', '', '', 'APT. MEDITERANIA G 1 TWR B-07-DD, RT/RW 003/005 ', 'TANJUNG DUREN SELATAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1363', '1363', 'YAYAH BADRIAH', 'KTP', '', '0000-00-00', '', '', 'BENTENG MAKASAR NO.2 RT/RW 004/009, SUKARASA', 'TANGERANG', null, 'Home Owner', '2018-02-28', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1364', '1364', 'LIN JIQUN', 'KTP', 'EB2073030', '0000-00-00', '', '', 'APARTEMEN PALM COURT I UNIT 1435 JL. JEND G SUBROTO', 'JAKARTA SELATAN', null, 'Home Owner', '2018-01-19', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1365', '1365', 'MAS SULISTYO & SHINTA DEWI WIJAYA', 'KTP', '3275040310800005', '0000-00-00', '', '', 'APT. MEDITERANIA G. 2 TWR K-01-KA RT/RW 003/005', 'KEL. TANJUNG DUREN SELATAN KEC.', null, 'Home Owner', '2018-01-25', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1366', '1366', 'WINARSO', 'KTP', '3603172203680001', '0000-00-00', '', '', 'BINONG PERMAI BLOK H-12 NO. 5 RT/RW 004/015', 'KEL. BINONG KEC. CURUG, KAB. TANGERANG', null, 'Home Owner', '2018-01-28', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1367', '1367', 'ANDREAS VALENTINO', 'KTP', '3173021703860001', '0000-00-00', '', '', 'CENGKARENG INDAH D/27 RT 004 RW 014', 'KEL. KAPUK KEC. CENGKARENG, JAKARTA BARAT', null, 'Home Owner', '2018-01-07', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1368', '1368', 'JESSICA RIEN', 'KTP', '0', '0000-00-00', '', '', 'CIATER BARAT JL. TEKNO NO. 20 RT/RW 003/001', 'KEL. CIATER KEC. SERPONG, TANGERANG SELATAN', null, 'Home Owner', '2018-02-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1369', '1369', 'IDRUS TANTONO', 'KTP', '3173060704600004', '0000-00-00', '', '', 'citra 3 ext block b22/3a', 'KEL. PEGADUNGAN KEC. KALIDERES, JAKARTA BARAT', null, 'Home Owner', '2018-02-25', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1370', '1370', 'BUDI HARTAWAN', 'KTP', '1207231910780002', '0000-00-00', '', '', 'DUSUN VIII JL. MELATI NO. 98 RT/RW 000/000', 'KEL. PURWODADI KEC. SUNGGAL, KAB. DELI SERDANG', null, 'Home Owner', '2017-12-27', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1371', '1371', 'Grace sagita Wijono', 'KTP', '7209056711810001', '0000-00-00', '', '', 'Jl Pulau Talatako no 3, 007/004', 'KEL. UENTANAGA BAWAH KEC. RATOLINDO, KAB. TOJO UNA', null, 'Home Owner', '2018-01-24', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1372', '1372', 'SUSANTY', 'KTP', '3603124310830002', '0000-00-00', '', '', 'JL RAYA KUTABUMI BLOK A-5/24 RT/RW 008/008', 'KEL. KUTABUMI KEC. PASAR KEMIS, KAB. TANGERANG', null, 'Home Owner', '2018-01-17', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1373', '1373', 'MUHAMMAD GOGOD SUGIARTA', 'KTP', '3671082510900003', '0000-00-00', '', '', 'JL. ANGGREK XIV BLOK L.5 NO.14 RT/RW 006/006', 'KEL. SANGIANG JAYA KEC. PERIUK, TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1374', '1374', 'AFIFAH NURULITA', 'KTP', '3671074709980003', '0000-00-00', '', '', 'JL. GATOT SUBROTO NO.37 RT/RW', 'KEL. CIMONE KEC. KARAWACI, TANGERANG', null, 'Home Owner', '2018-01-03', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1375', '1375', 'WEINY ANDRIANY', 'KTP', '1971036804890001', '0000-00-00', '', '', 'JL. GRIYA LARAS BLOK F NO.18 RT 007 RW 020 ', 'KEL. SUNTER AGUNG KEC. TANJUNG PRIOK, JAKARTA UTAR', null, 'Home Owner', '2018-01-05', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1376', '1376', 'ANTON SUYONO', 'KTP', '7271020606850016', '0000-00-00', '', '', 'JL. IMAMA BONJOL NO. 40 PALU RT/RW 001/002', 'KEL. SIRANINDI KEC. PALU BARAT, PALU', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1377', '1377', 'NOVITA SILALAHI', 'KTP', '1272055111860001', '0000-00-00', '', '', 'JL. KAMP. BAKTI V/14 RT/RW 003/007', 'KEL. CIDENG KEC. GAMBIR, JAKARTA PUSAT', null, 'Home Owner', '2018-02-11', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1378', '1378', 'MARINI KERSEN', 'KTP', '3671126511850002', '0000-00-00', '', '', 'JL. KAYU MANIS VIII NO. 51 RT/RW 016/007', 'KEL. KAYU MANIS KEC. MATRAMAN, JAKARTA TIMUR', null, 'Home Owner', '2018-02-19', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1379', '1379', 'FRANSISKUS HERIYANTO', 'KTP', '3275051005830071', '0000-00-00', '', '', 'JL. KEMANDORAN III NO. 33 RT 011 RW 003 ', 'KEL. GROGOL UTARA KEC. KEBAYORAN LAMA, JAKARTA SEL', null, 'Home Owner', '2018-02-25', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1380', '1380', 'ADY SUTONO', 'KTP', '3603282201780003', '0000-00-00', '', '', 'JL. KLP. PUAN XXV AK - 5/52 RT/RW 005/010', 'KEL. PAKULONAN BARAT KEC. KELAPA DUA, KABUPATEN TA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1381', '1381', 'TJONG, HENDRI PIRNATA', 'KTP', '3173040801730001', '0000-00-00', '', '', 'JL. LAKSA LUAR NO. 6 RT 010/001', 'KEL. JEMBATAN LIMA KEC. TAMBORA, JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1382', '1382', 'AGUS', 'KTP', '3671100612830006', '0000-00-00', '', '', 'JL. MANGGA DUA SQUARE BLK B/10-11 RT 011 RW 005 ', 'KEL. ANCOL KEC. PADEMANGAN, JAKARTA UTARA', null, 'Home Owner', '2018-02-28', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1383', '1383', 'BEBBYS RATIH DEWI', 'KTP', '3275084202640017', '0000-00-00', '', '', 'JL. MASJID SENTOSA NO. 1 JATICEMPAKA RT/RW 001/012', 'KEL. JATICEMPAKA KEC. PONDOKGEDE, KOTA BEKASI', null, 'Home Owner', '2018-02-14', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1384', '1384', 'LINDAWATI', 'KTP', '6104175710790001', '0000-00-00', '', '', 'JL. MERDEKA RT 006 RW 002 KEL. KANTOR', 'KEC. DELTA PAWAN KAB. KETAPANG, KALIMANTAN BARAT', null, 'Home Owner', '2018-02-22', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1385', '1385', 'MUFIDA', 'KTP', '3174014903840003', '0000-00-00', '', '', 'JL. MERPATI I NO.7 RT 005 RW 015 ', 'KEL. MENTENG DALAM KEC. TEBET, JAKARTA SELATAN', null, 'Home Owner', '2018-02-10', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1386', '1386', 'HENGKY', 'KTP', '3171020905770002', '0000-00-00', '', '', 'JL. P JAYAKARTA DALAM RT/RW 008/008', 'KEL. MANGGA DUA SELATAN KEC. SAWAH BESAR, JAKARTA ', null, 'Home Owner', '2018-02-24', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1387', '1387', 'LILIE GANY', 'KTP', '7271015803680003', '0000-00-00', '', '', 'JL. P JAYAKARTA NO. 27 RT/RW 001/003', 'KEL. PINANGSIA KEC. TAMAN SARI, JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1388', '1388', 'NITA HERVINA', 'KTP', '3471025007880001', '0000-00-00', '', '', 'JL. PAJEKSAN KIDUL NO. 18 RT/RW 002/001', 'KEL. NGUPASAN KEC. GONDOMANAN, KOTA YOGYAKARTA', null, 'Home Owner', '2018-02-25', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1389', '1389', 'PHANG KET LIONG', 'KTP', '3173042802780008', '0000-00-00', '', '', 'JL. PEKAPURAN RAYA GG 3/104A RT 009 RW 003 ', 'KEL. TANAH SEREAL KEC. TAMBORA, JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1390', '1390', 'HENRY MARGO', 'KTP', '6171062708790001', '0000-00-00', '', '', 'JL. PERINTIS KEMERDEKAAN RT 008 RW 001', 'KEL. PULO GADUNG KEC. PULO GADUNG, JAKARTA TIMUR', null, 'Home Owner', '2018-02-24', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1391', '1391', 'EMIWATI KOZALY', 'KTP', '3172015708670005', '0000-00-00', '', '', 'JL. PLUIT UTARA VIII/16 RT/RW 006/005 ', 'KEL. PLUIT KEC. PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1392', '1392', 'ELLY', 'KTP', '1271196407730001', '0000-00-00', '', '', 'JL. PTENUN-TINDAH BLOK B1 RT/RW 000/000', 'KEL. SEI PUTIH TENGAH KEC. MEDAN PETISAH, KOTA MED', null, 'Home Owner', '2018-02-04', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1393', '1393', 'MICHAEL SUDIYANTO', 'KTP', '3173020303500004', '0000-00-00', '', '', 'JL. SUKA JAYA I NO. 18 RT/RW 006/001', 'KEL. JELAMBAR BARU KEC. GROGOL PETAMBURAN, JAKARTA', null, 'Home Owner', '2018-02-14', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1394', '1394', 'RIVANO TRIANA', 'KTP', '3173065005780012', '0000-00-00', '', '', 'JL. TAMPAK SIRING TIMUR III NO. 16 ', 'KEL. KALIDERES KEC. KALIDERES, JAKARTA BARAT', null, 'Home Owner', '2018-01-15', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1395', '1395', 'MEGA ISTIATI', 'KTP', '3172016601760008', '0000-00-00', '', '', 'JL. TELUK GONG RT 011 RW 010 ', 'KEL. PEJAGALAN KEC. PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2018-02-10', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1396', '1396', 'YULIANTI', 'KTP', '3173015509880004', '0000-00-00', '', '', 'JL. TERATE RT 013 RW 002 ', 'KEL. CENGKARENG BARAT KEC. CENGKARENG, JAKARTA BAR', null, 'Home Owner', '2018-02-09', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1397', '1397', 'FEBRIAN JIUWIRA', 'KTP', '3173010502930006', '0000-00-00', '', '', 'JL. UTAMA V NO. 12 RT/RW 007/001', 'KEL. CENGKARENG BARAT KEC. CENGKARENG, JAKARTA BAR', null, 'Home Owner', '2018-02-11', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1398', '1398', 'LESTARI SARI PAMBUDI', 'KTP', '3173055010900005', '0000-00-00', '', '', 'JL.SURYA WIJAYA II-2/18 RT/RW:015/007', 'KEL.KEDOYA UTARA KEC.KEBON JERUK, JAKARTA BARAT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1399', '1399', 'LIE NA', 'KTP', '3603176402740001', '0000-00-00', '', '', 'JP. CANDU RT/RW 002/007 KEL. CURUG KULON', 'KEC. CURUG, KAB. TANGERANG', null, 'Home Owner', '2018-01-27', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1400', '1400', 'SUDJONO YAP', 'KTP', '1271020304660004', '0000-00-00', '', '', 'KOMP SUNGGAL POINT BLOK C NO.10 RT 000/ RW 000 ', 'MEDAN SUNGGAL, MEDAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1401', '1401', 'SUDJONO YAP', 'KTP', '1271020304660004', '0000-00-00', '', '', 'KOMP. SUNGGAL POINT BLOK C NO. 10 RT 000/ RW 000', 'KEL. SUNGGAL KEC. MEDAN SUNGGAL, MEDAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1402', '1402', 'NANO ARYONO', 'KTP', '3603121005810005', '0000-00-00', '', '', 'KP. JAMBU RT 001 RW 004 ', 'KEL. GELAM JAYA KEC. PASAR KEMIS, KAB. TANGERANG', null, 'Home Owner', '2018-02-10', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1403', '1403', 'INDRA SURYA MIHARJA', 'KTP', '3603180502820023', '0000-00-00', '', '', 'KP. KADU RT/RW 008/003 KEL. SUKAMULYA ', 'KEC. CIKUPA, KAB. TANGERANG', null, 'Home Owner', '2017-12-19', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1404', '1404', 'ANDI CHANDRA', 'KTP', '3202163103730003', '0000-00-00', '', '', 'KP. LEBAK PASAR RT/RW 002/006', 'KEL. CICURUG KEC. CICURUG, KABUPATEN SUKABUMI', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1405', '1405', 'MOHAMAD JAYADI', 'KTP', '3603010304860011', '0000-00-00', '', '', 'KP. PASIRNANGKA RT/RW 004/002 ', 'KEL. PASIR NANGKA KEC. TIGARAKSA, KAB. TANGERANG ', null, 'Home Owner', '2018-01-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1406', '1406', 'IQHBAL YUNAS ALFIANSYAH', 'KTP', '3603121809950003', '0000-00-00', '', '', 'KP.PASAR KEMIS RT/RW 002/003 KEL. SUKA ASIH', 'KEC. PASAR KEMIS, KAB. TANGERANG', null, 'Home Owner', '2018-01-19', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1407', '1407', 'ANDINTA BAYU SULISTIAWAN', 'KTP', '3201011211900005', '0000-00-00', '', '', 'PADURENAN RT/RW 005/013 KEL. PABUARAN', 'KEC. CIBINONG, KAB. BOGOR', null, 'Home Owner', '2018-01-23', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1408', '1408', 'INNA SHOLIHATI EMBRIK', 'KTP', '3208194912890002', '0000-00-00', '', '', 'PERUM TALAGA BESTARI CLUSTER HARMONY BLOK HA/11', 'RT/RW 015/002 KEL. WANAKERTA KEC.', null, 'Home Owner', '2018-01-17', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1409', '1409', 'BENNY ISKANDAR SOFJAN', 'KTP', '3172010809800014', '0000-00-00', '', '', 'PLUIT SAKTI 8 NO. 56 RT/RW 001/007', 'KEL. PLUIT KEC. PENJARINGAN, DKI JAKARTA', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1410', '1410', 'BENNY ISKANDAR SOFJAN', 'KTP', '3172010809800014', '0000-00-00', '', '', 'PLUIT SAKTI 8 NO. 56 RT001 RW 007  ', 'KEL. PLUIT KEC. PENJARINGAN, JAKARTA UTARA', null, 'Home Owner', '2018-02-08', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1411', '1411', 'STEPHANUS HEDY PRIAMBODO', 'KTP', '3275043012600016', '0000-00-00', '', '', 'PONDOK PEKAYON INDAH BLOK AA13 NO. 03', 'RT/RW 002/012 KEL. PEKAYON JAYA KEC. BEKASI SELATA', null, 'Home Owner', '2018-02-18', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1412', '1412', 'NUR AYU F. KASTELLA', 'KTP', '3276024906890008', '0000-00-00', '', '', 'PURI SRI WEDARI BLOK Q NO. 7 RT 001 RW 012', 'KEL. HARJAMUKTI KEC. CIMANGGIS, KOTA DEPOK', null, 'Home Owner', '2018-02-28', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1413', '1413', 'PT. PRIMATAMA CONCEPTINDO ABADI', 'KTP', '09.04.1.46.22290', '0000-00-00', '', '', 'RUKO BUKIT DURI PERMAI B.29 JL. JATINEGARA BARAT NO.54E RT', '014/004 KEL. KAMPUNG MELAYU KEC. JATINEGARA, JAKAR', null, 'Home Owner', '2017-12-24', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1414', '1414', 'A. DEWI SURYASUKESI', 'KTP', '3674026512600001', '0000-00-00', '', '', 'SUTERA GARDENIA V/30 RT/RW 003/012', 'KEL. PONDOK JAGUNG KEC. SERPONG UTARA, TANGERANG S', null, 'Home Owner', '2018-01-28', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1415', '1415', 'DAYANG PERMATA DEWI', 'KTP', '3674026302930001', '0000-00-00', '', '', 'SUTERA GARDENIA V/30 RT/RW 003/012 ', 'KEL. PONDOK JAGUNG KEC. SERPONG UTARA, TANGERANG S', null, 'Home Owner', '2018-01-26', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1416', '1416', 'CHRISTIAN SOSILA', 'KTP', '3374061312950013', '0000-00-00', '', '', 'TLOGO TIMUN BLOK E NO.4 RT 006 RW 001 ', 'KEL. TLOGOSARI KULON KEC. PENDURUNGAN, SEMARANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1417', '1417', 'EN PIN', 'KTP', '3173012908710010', '0000-00-00', '', '', 'TMN. PALEM LESTARI BLK. E 8 / 16 - 17 RT/RW 005/015', 'KEL. CENGKARENG BARAT KEC. CENGKARENG, JAKARTA BAR', null, 'Home Owner', '2017-12-17', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1418', '1418', 'TAN SUN HO', 'KTP', '3671081706620006', '0000-00-00', '', '', 'WISMA HARAPAN BLOK A.5 NO 30 RT/RW 005/009', 'KEL GEMBOR KEC PERIUK, KOTA TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1419', '1419', 'NANCY RAMELI', 'KTP', '3172056609870002', '0000-00-00', '', '', 'JL. PADEMANGAN II GG 3 NO. 8 RT/RW 007/006', 'KEL. PADEMANGAN TIMUR, KEC. PADEMANGAN, JAKARTA UT', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1420', '1420', 'KUSUMAWATI', 'KTP', 'G44425715', '0000-00-00', '', '', '26-3 Menara 1MK', 'No.1 Jalan Kiara, Mont Kiara', null, 'Home Owner', '2018-02-04', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1421', '1421', 'THENISIA WARINTA', 'KTP', 'G44425715', '0000-00-00', '', '', '26-3 Menara 1MK', 'No.1 Jalan Kiara, Mont Kiara', null, 'Home Owner', '2018-02-10', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1422', '1422', 'INDRA SULISTIA', 'KTP', 'G44425715', '0000-00-00', '', '', '26-3 Menara 1MK', 'No.1 Jalan Kiara, Mont Kiara', null, 'Home Owner', '2018-02-11', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1423', '1423', 'RUDY PRASETYA ROYALI', 'KTP', 'G44425715', '0000-00-00', '', '', '26-3 Menara 1MK', 'No.1 Jalan Kiara, Mont Kiara', null, 'Home Owner', '2018-02-09', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1424', '1424', 'ERICK SUSANTO', 'KTP', '-', '0000-00-00', '', '', 'GEDUNG PRO MANDIRI LANTAI 3', 'JALAN PROF DR LATUMENTEN NO.50', null, 'Home Owner', '2018-01-28', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1425', '1425', 'V. ARI HENDRIAWAN', 'KTP', '-', '0000-00-00', '', '', 'GEDUNG PRO MANDIRI LANTAI 3', 'JALAN PROF DR LATUMENTEN NO.50', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1426', '1426', 'HJ ETI ROFILAH', 'KTP', '-', '0000-00-00', '', '', 'JL. MANGGA BESAR RAYA NO 81', 'KOMPLEK THR LOKASARI RUKO BLOK A, NO 1', null, 'Home Owner', '2018-01-26', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1427', '1427', 'MELVIN MOHAN', 'KTP', '-', '0000-00-00', '', '', 'JL. MANGGA BESAR RAYA NO 81', 'KOMPLEK THR LOKASARI RUKO BLOK A, NO 1', null, 'Home Owner', '2018-02-10', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1428', '1428', 'RISMA IMAS', 'KTP', '-', '0000-00-00', '', '', 'JL. MANGGA BESAR RAYA NO 81', 'KOMPLEK THR LOKASARI RUKO BLOK A, NO 1', null, 'Home Owner', '2018-02-25', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1429', '1429', 'DEDY OKTOVIANUS TANUWIJAYA', 'KTP', '-', '0000-00-00', '', '', 'JL. MANGGA BESAR RAYA NO 81', 'KOMPLEK THR LOKASARI RUKO BLOK A, NO 1', null, 'Home Owner', '2018-02-13', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1430', '1430', 'MERY', 'KTP', '-', '0000-00-00', '', '', 'JL. MANGGA BESAR RAYA NO 81', 'KOMPLEK THR LOKASARI RUKO BLOK A, NO 1', null, 'Home Owner', '2018-02-11', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1431', '1431', 'ELVA YANUARICA', 'KTP', '-', '0000-00-00', '', '', 'JL. MANGGA BESAR RAYA NO 81', 'KOMPLEK THR LOKASARI RUKO BLOK A, NO 1', null, 'Home Owner', '2018-02-11', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1432', '1432', 'EKA KAMELIA, SE', 'KTP', '-', '0000-00-00', '', '', 'JL. MANGGA BESAR RAYA NO 81', 'KOMPLEK THR LOKASARI RUKO BLOK A, NO 1', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1433', '1433', 'AHMAD KOMARA', 'KTP', '-', '0000-00-00', '', '', 'JLN BANGKA RAYA NO. 18 C-D', 'MAMPANG PRAPATAN', null, 'Home Owner', '2018-02-16', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1434', '1434', 'RUDY SUWIGNYO', 'KTP', '-', '0000-00-00', '', '', 'JLN BANGKA RAYA NO. 18 C-D', 'MAMPANG PRAPATAN', null, 'Home Owner', '2018-02-06', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1435', '1435', 'KHUNG EVANNA', 'KTP', '-', '0000-00-00', '', '', 'JLN BANGKA RAYA NO. 18 C-D', 'MAMPANG PRAPATAN', null, 'Home Owner', '2018-02-24', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1436', '1436', 'OCTAVIANNA SANTOSO', 'KTP', '-', '0000-00-00', '', '', 'JLN BANGKA RAYA NO. 18 C-D', 'MAMPANG PRAPATAN', null, 'Home Owner', '2018-02-10', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1437', '1437', 'TJIOE SULIANTO', 'KTP', '-', '0000-00-00', '', '', 'JLN BANGKA RAYA NO. 18 C-D', 'MAMPANG PRAPATAN', null, 'Home Owner', '2018-02-25', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1438', '1438', 'MARCELLA NATHANIA', 'KTP', '-', '0000-00-00', '', '', 'JLN BANGKA RAYA NO. 18 C-D', 'MAMPANG PRAPATAN', null, 'Home Owner', '2018-01-18', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1439', '1439', 'INDRA', 'KTP', '-', '0000-00-00', '', '', 'JLN BANGKA RAYA NO. 18 C-D', 'MAMPANG PRAPATAN', null, 'Home Owner', '2018-02-10', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1440', '1440', 'ADHITYA', 'KTP', '-', '0000-00-00', '', '', 'JLN BANGKA RAYA NO. 18 C-D', 'MAMPANG PRAPATAN', null, 'Home Owner', '2018-02-03', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1441', '1441', 'HENDRIK UTOMO', 'KTP', '-', '0000-00-00', '', '', 'JLN BANGKA RAYA NO. 18 C-D', 'MAMPANG PRAPATAN', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1442', '1442', 'SOERYONO DJUARTA', 'KTP', '-', '0000-00-00', '', '', 'JLN BANGKA RAYA NO. 18 C-D', 'MAMPANG PRAPATAN', null, 'Home Owner', '2018-01-23', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1443', '1443', 'ISAAC GANESH TRINUGROHO, ST', 'KTP', '-', '0000-00-00', '', '', 'JLN BANGKA RAYA NO. 18 C-D', 'MAMPANG PRAPATAN', null, 'Home Owner', '2018-01-21', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1444', '1444', 'ERINALDI SAWAL Z', 'KTP', '367110070589004', '0000-00-00', '', '', 'PERUM ANGGREK PERMAI BLOK A NO.6 JL. RAYA CIJENGIR', 'RT/RW 005/007 KEL. KADU KEC. CURUG,KAB. TANGERANG', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1445', '1445', 'RINA', 'KTP', '-', '0000-00-00', '', '', 'RUKO DELTA NIAGA BLOK C. 2', 'JL. WARU DS 2 LIPPO CIKARANG DESA CIBATU ', null, 'Home Owner', '2018-02-28', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1446', '1446', 'AYRINNA INDRA', 'KTP', '3275055311820019', '0000-00-00', '', '', 'JL CEMPAKA RAYA BLOK BK II KEMANG PRATAMA II ', 'BOJONG MENTENG', null, 'Home Owner', '2018-02-28', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1447', '1447', 'KIUN SAN', 'KTP', '1901010910790003', '0000-00-00', '', '', 'JL NAGA NO 76 B ', 'KUDAI, SUNGAILIAT', null, 'Home Owner', '2018-02-24', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1448', '1448', 'STEFIE', 'KTP', '3603136709930008', '0000-00-00', '', '', 'KP PANGKALAN RT 01 RW 01', 'PANGKALAN', null, 'Home Owner', '2018-02-28', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1449', '1449', 'AMELIA', 'KTP', '-', '0000-00-00', '', '', 'RUKO DELTA NIAGA BLOK C. 2', 'JL. WARU DS 2 LIPPO CIKARANG DESA CIBATU ', null, 'Home Owner', '2018-02-01', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1450', '1450', 'LUIS FERNANDO', 'KTP', '-', '0000-00-00', '', '', 'RUKO DELTA NIAGA BLOK C. 2', 'JL. WARU DS 2 LIPPO CIKARANG DESA CIBATU ', null, 'Home Owner', '2018-01-10', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1451', '1451', 'NG SJIN HIN', 'KTP', '-', '0000-00-00', '', '', 'RUKO DELTA NIAGA BLOK C. 2', 'JL. WARU DS 2 LIPPO CIKARANG DESA CIBATU ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1452', '1452', 'EKO BUDIANTORO', 'KTP', '-', '0000-00-00', '', '', 'RUKO DELTA NIAGA BLOK C. 2', 'JL. WARU DS 2 LIPPO CIKARANG DESA CIBATU ', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1453', '1453', 'CHRISTINE DEVIANA MOHAN', 'KTP', '-', '0000-00-00', '', '', 'RUKO DELTA NIAGA II', 'JALAN WARU BLOK C NO 2 LIPPO CIKARANG ', null, 'Home Owner', '2018-02-10', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1454', '1454', 'MURNIATI', 'KTP', '3671095307700003', '0000-00-00', '', '', 'JL MANGGGA IV NO 23 RT 001 RW 018 ', 'CIBODASARI', null, 'Home Owner', '2018-02-09', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1455', '1455', 'ALEXANDER RANGGA S', 'KTP', '3173080804860010', '0000-00-00', '', '', 'KAV DKI BLOK 56/10 RT 003 RW 010', 'MERUYA UTARA', null, 'Home Owner', '2018-02-06', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1456', '1456', 'MUHAMMAD ROY HIMBAS ASBI', 'KTP', '2171021201620002', '0000-00-00', '', '', 'APRT MEDIT MARINA TOWER D 21 AG RT 015 RW 002', 'ANCOL', null, 'Home Owner', '2018-02-25', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1457', '1457', 'H. ADE AWALUDIN SH, MH,', 'KTP', '-', '0000-00-00', '', '', 'RUKO DELTA NIAGA II', 'JALAN WARU BLOK C NO 2 LIPPO CIKARANG ', null, 'Home Owner', '2018-02-18', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1458', '1458', 'EDRIC', 'KTP', '-', '0000-00-00', '', '', 'RUKO DELTA NIAGA II', 'JALAN WARU BLOK C NO 2 LIPPO CIKARANG ', null, 'Home Owner', '2018-02-28', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1459', '1459', 'YOHANES CHRISTIANTO KUNCORO', 'KTP', '-', '0000-00-00', '', '', 'RUKO DELTA NIAGA II', 'JALAN WARU BLOK C NO 2 LIPPO CIKARANG ', null, 'Home Owner', '2018-02-09', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1460', '1460', 'CHRISTINE PUTRI', 'KTP', '-', '0000-00-00', '', '', 'RUKO DELTA NIAGA II', 'JALAN WARU BLOK C NO 2 LIPPO CIKARANG ', null, 'Home Owner', '2018-01-21', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1461', '1461', 'KIUN SAN', 'KTP', '1901010910790003', '0000-00-00', '', '', 'JL NAGA NO 76 B ', 'KUDAI, SUNGAILIAT', null, 'Home Owner', '2018-01-21', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1462', '1462', 'Y. SUMARNI', 'KTP', '3275024307670017', '0000-00-00', '', '', 'JL SOKA KUNING 2-24 RT 008 RW 013', 'KOTA BARU', null, 'Home Owner', '2018-02-11', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1463', '1463', 'MARCEL WIJAYA', 'KTP', '-', '0000-00-00', '', '', 'RUKO DELTA NIAGA II', 'JALAN WARU BLOK C NO 2 LIPPO CIKARANG ', null, 'Home Owner', '2018-02-17', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1464', '1464', 'DR. LIANA DEWI SUHADI', 'KTP', '3171025910700002', '0000-00-00', '', '', 'JL GOTONG ROYONG NO 58 RT 14 RW 02', 'SAWAH BESAR ', null, 'Home Owner', '2018-02-10', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1465', '1465', 'LYDIA WIJAYA', 'KTP', '1276054210860001', '0000-00-00', '', '', 'JL UDANG NO A2 LINGK IV ', 'TEBING TINGGI', null, 'Home Owner', '2018-01-04', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1466', '1466', 'LILIK SURYANI', 'KTP', '3510074506720015', '0000-00-00', '', '', 'DSN KAMPUNG BARU RT 003 RW 001', 'JAJAG', null, 'Home Owner', '2018-02-01', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1467', '1467', 'IRA WINARNI', 'KTP', '-', '0000-00-00', '', '', 'RUKO DELTA NIAGA II', 'JALAN WARU BLOK C NO 2 LIPPO CIKARANG ', null, 'Home Owner', '2018-02-02', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1468', '1468', 'BENNY WINATA', 'KTP', '3171051810870001', '0000-00-00', '', '', 'JL PERCATAKAN NEGARA NO 28 ', 'RAWASARI', null, 'Home Owner', '2018-01-27', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1469', '1469', 'LINTONG HUTASOIT', 'KTP', '3603181010750002', '0000-00-00', '', '', 'CITRA RAYA BLOK D 7/34', 'CIKUPA', null, 'Home Owner', '2018-02-10', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1470', '1470', 'NURAINI CHAN', 'KTP', '-', '0000-00-00', '', '', 'D9-3A, DARA I COMMERCIAL CENTRE', 'JLN PJU IA/46, 47301 PETALING JAYA', null, 'Home Owner', '2018-02-10', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1471', '1471', 'INDAH KHAIRUNISA', 'KTP', '-', '0000-00-00', '', '', 'D9-3A, DARA I COMMERCIAL CENTRE', 'JLN PJU IA/46, 47301 PETALING JAYA', null, 'Home Owner', '2018-02-18', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1472', '1472', 'TEDY TANJAYA', 'KTP', '-', '0000-00-00', '', '', 'D9-3A, DARA I COMMERCIAL CENTRE', 'JLN PJU IA/46, 47301 PETALING JAYA', null, 'Home Owner', '2018-02-27', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1473', '1473', 'JENNY STEPHANIE KOSASIH', 'KTP', '-', '0000-00-00', '', '', 'D9-3A, DARA I COMMERCIAL CENTRE', 'JLN PJU IA/46, 47301 PETALING JAYA', null, 'Home Owner', '2018-02-24', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1474', '1474', 'UDIN', 'KTP', '-', '0000-00-00', '', '', 'D9-3A, DARA I COMMERCIAL CENTRE', 'JLN PJU IA/46, 47301 PETALING JAYA', null, 'Home Owner', '2018-02-10', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1475', '1475', 'IMAS RISMAYANTI', 'KTP', '3204466003780003', '0000-00-00', '', '', 'KMP SUKAWANGI RT 02 RW 01', 'KUTAWARINGIN', null, 'Home Owner', '2018-02-18', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1476', '1476', 'IMAS RISMAYANTI', 'KTP', '3204466003780003', '0000-00-00', '', '', 'KMP SUKAWANGI RT 02 RW 02', 'KUTAWARINGIN', null, 'Home Owner', '2018-02-18', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1477', '1477', 'ANDRIAN AUTAWI', 'KTP', '1271200609890004', '0000-00-00', '', '', 'VILLA MELATI MAS BLOK N 4 NO 3G', 'SERPONG UTARA', null, 'Home Owner', '2018-02-10', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1478', '1478', 'MEY YAGAICHY', 'KTP', '1209135702860002', '0000-00-00', '', '', 'KOMP NAYOGA HILL BLOK A9 ', 'LUBUK BAJA', null, 'Home Owner', '2018-02-19', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1479', '1479', 'ROSDIANAWATI', 'KTP', '-', '0000-00-00', '', '', 'RUKO DE MANSION', 'JL JALUR SUTERA BLOK A NO 8 KUNCIRAN PINANG', null, 'Home Owner', '2018-02-11', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1480', '1480', 'WAHYU ABIDIN', 'KTP', '3173032606740011', '0000-00-00', '', '', 'JL BADILA II/6 RT 014 RW 004', 'TANGKI', null, 'Home Owner', '2018-02-18', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1481', '1481', 'LENNY', 'KTP', '1271154408880004', '0000-00-00', '', '', 'JL WARNA NO 17 EE MEDAN ', 'SUKARAJA', null, 'Home Owner', '2018-01-24', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1482', '1482', 'SITI ULYANAH', 'KTP', '3671116010710002', '0000-00-00', '', '', 'SUDIMARA PINANG RT 002 RW 003', 'SUDIMARA PINANG', null, 'Home Owner', '2018-01-21', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1483', '1483', 'YOSI YANG', 'KTP', '-', '0000-00-00', '', '', 'RUKO DE MANSION', 'JL JALUR SUTERA BLOK A NO 8 KUNCIRAN PINANG', null, 'Home Owner', '2018-02-14', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1484', '1484', 'NESIA JULITA', 'KTP', '-', '0000-00-00', '', '', 'RUKO DE MANSION', 'JL JALUR SUTERA BLOK A NO 8 KUNCIRAN PINANG', null, 'Home Owner', '2018-01-31', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1485', '1485', '#N/A', 'KTP', '-', '0000-00-00', '', '', 'RUKO DE MANSION', 'JL JALUR SUTERA BLOK A NO 8 KUNCIRAN PINANG', null, 'Home Owner', '2018-02-25', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1486', '1486', 'Imelda Maria', 'KTP', '-', '0000-00-00', '', '', 'RUKO DE MANSION', 'JL JALUR SUTERA BLOK A NO 8 KUNCIRAN PINANG', null, 'Home Owner', '2018-02-18', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1487', '1487', 'LILY GOHZALI', 'KTP', '1271054211880003', '0000-00-00', '', '', 'JL MUJAHIR NO 14B ', 'PANDAU HULU II', null, 'Home Owner', '2017-12-29', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1488', '1488', 'YUSANTI DEWI', 'KTP', '3173015707790006', '0000-00-00', '', '', 'JL BUNCI RAYA NO 17 RT 04 RW 07', 'CENGKARENG', null, 'Home Owner', '2018-02-08', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1489', '1489', 'FELDA DIANA T', 'KTP', '-', '0000-00-00', '', '', 'RUKO DE MANSION', 'JL JALUR SUTERA BLOK A NO 8 KUNCIRAN PINANG', null, 'Home Owner', '2017-12-28', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1490', '1490', 'ANGGA SUGIHARTO PRATAMA', 'KTP', '3671081607900002', '0000-00-00', '', '', 'PERSADA RAYA ', 'GEMBOR', null, 'Home Owner', '2017-12-20', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1491', '1491', 'JIMMY', 'KTP', '-', '0000-00-00', '', '', 'RUKO DE MANSION', 'JL JALUR SUTERA BLOK A NO 8 KUNCIRAN PINANG', null, 'Home Owner', '2017-12-27', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1498', '1', 'EDI', 'KTP', '3172012505760000', '1969-12-31', '8977175234', 'edi@gmail.com', 'JELAMBAR RT/RW 06/06 PEJAGALAN', 'PENJARINGAN', '3', 'Home Owner', '0000-00-00', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_member` VALUES ('1499', '1', 'INDRA', 'KTP', '3172012505760000', '1969-12-31', '8977175234', 'indra@gmail.com', 'JELAMBAR RT/RW 06/06 PEJAGALAN', 'PENJARINGAN', '3', 'Lessee', '0000-00-00', '0000-00-00', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');

-- ----------------------------
-- Table structure for `m_poin_unit`
-- ----------------------------
DROP TABLE IF EXISTS `m_poin_unit`;
CREATE TABLE `m_poin_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit` int(11) NOT NULL,
  `nilai_poin` int(11) NOT NULL,
  `tgl_buat` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tgl_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `tgl_expired` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id_unit` (`id_unit`),
  CONSTRAINT `m_poin_unit_ibfk_1` FOREIGN KEY (`id_unit`) REFERENCES `m_unit` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_poin_unit
-- ----------------------------

-- ----------------------------
-- Table structure for `m_tenan`
-- ----------------------------
DROP TABLE IF EXISTS `m_tenan`;
CREATE TABLE `m_tenan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_tenan
-- ----------------------------

-- ----------------------------
-- Table structure for `m_unit`
-- ----------------------------
DROP TABLE IF EXISTS `m_unit`;
CREATE TABLE `m_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `card_number` varchar(50) NOT NULL,
  `id_cluster` int(11) NOT NULL,
  `unit_number` varchar(15) NOT NULL,
  `max_member` int(11) NOT NULL,
  `tgl_berlaku` date DEFAULT NULL,
  `tgl_berakhir` date DEFAULT NULL,
  `tgl_dibuat` datetime NOT NULL,
  `tgl_diubah` datetime NOT NULL,
  `is_active` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cluster` (`id_cluster`),
  CONSTRAINT `m_unit_ibfk_1` FOREIGN KEY (`id_cluster`) REFERENCES `m_cluster` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1492 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_unit
-- ----------------------------
INSERT INTO `m_unit` VALUES ('1', '3190992624', '1', '1-15-23', '5', '2017-12-20', '2022-12-31', '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('2', '', '1', '1-15-35', '5', '2017-12-08', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('3', '', '1', '1-9-15', '5', '2017-12-27', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('4', '', '1', '1-11-28', '5', '2017-12-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('5', '', '1', '1-2-2', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('6', '', '1', '1-3-31', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('7', '', '1', '1-17-6', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('8', '', '1', '1-5-58', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('9', '', '1', '1-15-33', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('10', '', '1', '1-8-56', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('11', '', '1', '1-9-37', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('12', '', '1', '1-2-27', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('13', '', '1', '1-3-51', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('14', '', '1', '1-15-56', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('15', '', '1', '1-11-20', '5', '2018-02-08', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('16', '', '1', '1-9-17', '5', '2018-01-05', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('17', '', '1', '1-9-27', '5', '2018-01-05', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('18', '', '1', '1-1-19', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('19', '', '1', '1-10-25', '5', '2018-02-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('20', '', '1', '1-9-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('21', '', '1', '1-11-10', '5', '2017-12-08', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('22', '', '1', '1-9-18', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('23', '', '1', '1-18-26', '5', '2017-12-26', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('24', '', '1', '1-17-50', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('25', '', '1', '1-16-6', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('26', '', '1', '1-18-35', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('27', '', '1', '1-17-53', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('28', '', '1', '1-6-1', '5', '2017-09-23', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('29', '', '1', '1-18-17', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('30', '', '1', '1-3-60', '5', '2017-09-24', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('31', '', '1', '1-11-7', '5', '2017-12-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('32', '', '1', '1-10-18', '5', '2017-12-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('33', '', '1', '1-11-5', '5', '2017-12-08', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('34', '', '1', '1-11-32', '5', '2017-12-08', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('35', '', '1', '1-18-57', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('36', '', '1', '1-10-8', '5', '2018-01-07', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('37', '', '1', '1-18-2', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('38', '', '1', '1-18-66', '5', '2017-12-13', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('39', '', '1', '1-11-9', '5', '2017-12-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('40', '', '1', '1-10-22', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('41', '', '1', '1-2-7', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('42', '', '1', '1-15-16', '5', '2017-12-18', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('43', '', '1', '1-9-12', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('44', '', '1', '1-10-7', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('45', '', '1', '1-12-52', '5', '2017-12-08', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('46', '', '1', '1-15-5', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('47', '', '1', '1-12-7', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('48', '', '1', '1-17-18', '5', '2017-12-11', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('49', '', '1', '1-7-6', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('50', '', '1', '1-1-16', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('51', '', '1', '1-1-15', '5', '2017-12-08', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('52', '', '1', '1-6-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('53', '', '1', '1-10-11', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('54', '', '1', '1-7-20', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('55', '', '1', '1-17-23', '5', '2018-02-17', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('56', '', '1', '1-18-50', '5', '2017-12-07', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('57', '', '1', '1-11-30', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('58', '', '1', '1-10-16', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('59', '', '1', '1-5-20', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('60', '', '1', '1-11-18', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('61', '', '1', '1-15-2', '5', '2018-02-19', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('62', '', '1', '1-10-26', '5', '2018-02-11', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('63', '', '1', '1-12-6', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('64', '', '1', '1-12-18', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('65', '', '1', '1-2-3', '5', '2017-12-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('66', '', '1', '1-17-10', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('67', '', '1', '1-15-18', '5', '2017-12-10', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('68', '', '1', '1-8-27', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('69', '', '1', '1-15-1', '5', '2018-02-12', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('70', '', '1', '1-3-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('71', '', '1', '1-12-11', '5', '2017-12-10', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('72', '', '1', '1-8-23', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('73', '', '1', '1-11-3', '5', '2017-12-08', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('74', '', '1', '1-12-22', '5', '2018-02-10', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('75', '', '1', '1-6-30', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('76', '', '1', '1-8-17', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('77', '', '1', '1-8-7', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('78', '', '1', '1-11-31', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('79', '', '1', '1-5-17', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('80', '', '1', '1-16-2', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('81', '', '1', '1-12-20', '5', '2017-12-28', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('82', '', '1', '1-2-5', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('83', '', '1', '1-16-52', '5', '2017-12-15', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('84', '', '1', '1-7-18', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('85', '', '1', '1-17-16', '5', '2018-01-16', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('86', '', '1', '1-6-22', '5', '2018-02-08', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('87', '', '1', '1-7-28', '5', '2018-02-08', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('88', '', '1', '1-8-21', '5', '2018-02-08', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('89', '', '1', '1-16-32', '5', '2018-02-08', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('90', '', '1', '1-16-50', '5', '2018-02-08', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('91', '', '1', '1-17-25', '5', '2018-02-08', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('92', '', '1', '1-17-27', '5', '2018-02-08', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('93', '', '1', '1-17-31', '5', '2018-02-08', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('94', '', '1', '1-17-32', '5', '2018-02-08', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('95', '', '1', '1-17-51', '5', '2018-02-08', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('96', '', '1', '1-3-39', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('97', '', '1', '1-1-21', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('98', '', '1', '1-6-21', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('99', '', '1', '1-10-6', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('100', '', '1', '1-15-29', '5', '2017-12-11', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('101', '', '1', '1-17-66', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('102', '', '1', '1-8-38', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('103', '', '1', '1-17-7', '5', '2017-12-16', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('104', '', '1', '1-10-21', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('105', '', '1', '1-15-19', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('106', '', '1', '1-18-22', '5', '2017-12-19', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('107', '', '1', '1-3-22', '5', '2017-12-19', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('108', '', '1', '1-18-6', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('109', '', '1', '1-15-17', '5', '2018-02-11', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('110', '', '1', '1-17-26', '5', '2018-02-18', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('111', '', '1', '1-10-23', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('112', '', '1', '1-15-32', '5', '2017-12-13', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('113', '', '1', '1-16-16', '5', '2018-02-23', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('114', '', '1', '1-18-51', '5', '2017-12-25', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('115', '', '1', '1-18-53', '5', '2018-01-03', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('116', '', '1', '1-17-9', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('117', '', '1', '1-10-15', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('118', '', '1', '1-9-2', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('119', '', '1', '1-7-12', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('120', '', '1', '1-12-1', '5', '2018-02-18', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('121', '', '1', '1-5-10', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('122', '', '1', '1-18-29', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('123', '', '1', '1-9-25', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('124', '', '1', '1-12-58', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('125', '', '1', '1-7-35', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('126', '', '1', '1-8-20', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('127', '', '1', '1-9-33', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('128', '', '1', '1-18-31', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('129', '', '1', '1-15-22', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('130', '', '1', '1-7-2', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('131', '', '1', '1-18-21', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('132', '', '1', '1-18-15', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('133', '', '1', '1-15-50', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('134', '', '1', '1-17-62', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('135', '', '1', '1-2-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('136', '', '1', '1-1-20', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('137', '', '1', '1-18-28', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('138', '', '1', '1-10-29', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('139', '', '1', '1-12-29', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('140', '', '1', '1-15-39', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('141', '', '1', '1-3-2', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('142', '', '1', '1-12-30', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('143', '', '1', '1-8-35', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('144', '', '1', '1-7-5', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('145', '', '1', '1-16-20', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('146', '', '1', '1-6-56', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('147', '', '1', '1-10-10', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('148', '', '1', '1-18-19', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('149', '', '1', '1-18-11', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('150', '', '1', '1-3-56', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('151', '', '1', '1-1-2', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('152', '', '1', '1-16-12', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('153', '', '1', '1-11-12', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('154', '', '1', '1-15-15', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('155', '', '1', '1-5-38', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('156', '', '1', '1-5-7', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('157', '', '1', '1-12-2', '5', '2017-12-14', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('158', '', '1', '1-5-56', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('159', '', '1', '1-15-28', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('160', '', '1', '1-12-10', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('161', '', '1', '1-2-30', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('162', '', '1', '1-6-29', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('163', '', '1', '1-16-23', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('164', '', '1', '1-17-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('165', '', '1', '1-7-19', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('166', '', '1', '1-12-5', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('167', '', '1', '1-7-50', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('168', '', '1', '1-12-28', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('169', '', '1', '1-6-10', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('170', '', '1', '1-11-26', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('171', '', '1', '1-16-25', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('172', '', '1', '1-8-50', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('173', '', '1', '1-11-6', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('174', '', '1', '1-8-37', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('175', '', '1', '1-3-36', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('176', '', '1', '1-16-37', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('177', '', '1', '1-5-29', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('178', '', '1', '1-6-20', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('179', '', '1', '1-15-52', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('180', '', '1', '1-7-3', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('181', '', '1', '1-8-12', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('182', '', '1', '1-2-17', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('183', '', '1', '1-8-9', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('184', '', '1', '1-8-11', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('185', '', '1', '1-7-1', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('186', '', '1', '1-18-5', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('187', '', '1', '1-9-7', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('188', '', '1', '1-12-25', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('189', '', '1', '1-8-52', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('190', '', '1', '1-9-35', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('191', '', '1', '1-5-9', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('192', '', '1', '1-18-30', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('193', '', '1', '1-18-9', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('194', '', '1', '1-18-58', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('195', '', '1', '1-18-55', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('196', '', '1', '1-6-39', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('197', '', '1', '1-12-27', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('198', '', '1', '1-10-1', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('199', '', '1', '1-18-25', '5', '2018-02-26', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('200', '', '1', '1-6-25', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('201', '', '1', '1-10-12', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('202', '', '1', '1-8-26', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('203', '', '1', '1-3-1', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('204', '', '1', '1-7-37', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('205', '', '1', '1-11-2', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('206', '', '1', '1-15-7', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('207', '', '1', '1-9-21', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('208', '', '1', '1-16-30', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('209', '', '1', '1-8-32', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('210', '', '1', '1-15-10', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('211', '', '1', '1-7-52', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('212', '', '1', '1-15-3', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('213', '', '1', '1-12-31', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('214', '', '1', '1-18-16', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('215', '', '1', '1-18-36', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('216', '', '1', '1-16-27', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('217', '', '1', '1-8-29', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('218', '', '1', '1-12-56', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('219', '', '1', '1-2-6', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('220', '', '1', '1-8-36', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('221', '', '1', '1-15-11', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('222', '', '1', '1-12-23', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('223', '', '1', '1-3-7', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('224', '', '1', '1-16-18', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('225', '', '1', '1-11-19', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('226', '', '1', '1-6-38', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('227', '', '1', '1-7-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('228', '', '1', '1-15-38', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('229', '', '1', '1-7-30', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('230', '', '1', '1-11-50', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('231', '', '1', '1-17-52', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('232', '', '1', '1-12-26', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('233', '', '1', '1-18-62', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('234', '', '1', '1-12-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('235', '', '1', '1-5-32', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('236', '', '1', '1-10-38', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('237', '', '1', '1-11-23', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('238', '', '1', '1-17-55', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('239', '', '1', '1-7-58', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('240', '', '1', '1-9-10', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('241', '', '1', '1-17-36', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('242', '', '1', '1-1-18', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('243', '', '1', '1-18-10', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('244', '', '1', '1-1-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('245', '', '1', '1-16-31', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('246', '', '1', '1-7-29', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('247', '', '1', '1-12-38', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('248', '', '1', '1-8-10', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('249', '', '1', '1-9-22', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('250', '', '1', '1-9-1', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('251', '', '1', '1-16-7', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('252', '', '1', '1-12-50', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('253', '', '1', '1-17-20', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('254', '', '1', '1-8-39', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('255', '', '1', '1-6-32', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('256', '', '1', '1-18-39', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('257', '', '1', '1-15-36', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('258', '', '1', '1-15-6', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('259', '', '1', '1-3-52', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('260', '', '1', '1-2-10', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('261', '', '1', '1-11-25', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('262', '', '1', '1-12-15', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('263', '', '1', '1-7-9', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('264', '', '1', '1-3-18', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('265', '', '1', '1-10-30', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('266', '', '1', '1-12-32', '5', '2017-12-13', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('267', '', '1', '1-1-3', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('268', '', '1', '1-3-27', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('269', '', '1', '1-3-29', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('270', '', '1', '1-7-27', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('271', '', '1', '1-11-38', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('272', '', '1', '1-1-5', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('273', '', '1', '1-7-25', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('274', '', '1', '1-17-39', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('275', '', '1', '1-3-10', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('276', '', '1', '1-9-29', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('277', '', '1', '1-10-28', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('278', '', '1', '1-12-19', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('279', '', '1', '1-18-68', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('280', '', '1', '1-12-21', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('281', '', '1', '1-8-25', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('282', '', '1', '1-16-10', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('283', '', '1', '1-15-25', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('284', '', '1', '1-5-16', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('285', '', '1', '1-1-28', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('286', '', '1', '1-5-51', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('287', '', '1', '1-7-36', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('288', '', '1', '1-3-5', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('289', '', '1', '1-2-9', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('290', '', '1', '1-6-52', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('291', '', '1', '1-7-7', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('292', '', '1', '1-11-29', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('293', '', '1', '1-9-28', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('294', '', '1', '1-15-37', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('295', '', '1', '1-11-21', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('296', '', '1', '1-16-33', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('297', '', '1', '1-12-9', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('298', '', '1', '1-18-18', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('299', '', '1', '1-16-3', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('300', '', '1', '1-9-36', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('301', '', '1', '1-10-2', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('302', '', '1', '1-15-26', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('303', '', '1', '1-11-17', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('304', '', '1', '1-17-15', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('305', '', '1', '1-8-22', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('306', '', '1', '1-16-22', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('307', '', '1', '1-5-36', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('308', '', '1', '1-8-16', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('309', '', '1', '1-18-3', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('310', '', '1', '1-17-2', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('311', '', '1', '1-8-33', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('312', '', '1', '1-7-21', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('313', '', '1', '1-6-37', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('314', '', '1', '1-6-31', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('315', '', '1', '1-18-20', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('316', '', '1', '1-2-23', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('317', '', '1', '1-3-58', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('318', '', '1', '1-8-15', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('319', '', '1', '1-6-6', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('320', '', '1', '1-1-10', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('321', '', '1', '1-7-32', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('322', '', '1', '1-12-17', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('323', '', '1', '1-8-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('324', '', '1', '1-8-1', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('325', '', '1', '1-12-12', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('326', '', '1', '1-11-27', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('327', '', '1', '1-11-1', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('328', '', '1', '1-8-30', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('329', '', '1', '1-16-66', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('330', '', '1', '1-18-37', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('331', '', '1', '1-10-20', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('332', '', '1', '1-7-26', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('333', '', '1', '1-2-12', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('334', '', '1', '1-5-18', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('335', '', '1', '1-7-22', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('336', '', '1', '1-5-25', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('337', '', '1', '1-16-38', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('338', '', '1', '1-16-58', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('339', '', '1', '1-12-36', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('340', '', '1', '1-16-9', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('341', '', '1', '1-5-30', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('342', '', '1', '1-6-3', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('343', '', '1', '1-16-35', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('344', '', '1', '1-2-1', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('345', '', '1', '1-5-33', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('346', '', '1', '1-11-22', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('347', '', '1', '1-16-29', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('348', '', '1', '1-18-12', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('349', '', '1', '1-18-7', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('350', '', '1', '1-15-9', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('351', '', '1', '1-15-12', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('352', '', '1', '1-16-60', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('353', '', '1', '1-16-36', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('354', '', '1', '1-7-15', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('355', '', '1', '1-7-17', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('356', '', '1', '1-10-19', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('357', '', '1', '1-3-23', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('358', '', '1', '1-18-60', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('359', '', '1', '1-16-56', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('360', '', '1', '1-8-3', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('361', '', '1', '1-18-70', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('362', '', '1', '1-10-32', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('363', '', '1', '1-18-38', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('364', '', '1', '1-5-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('365', '', '1', '1-11-36', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('366', '', '1', '1-9-5', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('367', '', '1', '1-1-7', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('368', '', '1', '1-1-9', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('369', '', '1', '1-8-5', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('370', '', '1', '1-10-27', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('371', '', '1', '1-10-36', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('372', '', '1', '1-1-6', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('373', '', '1', '1-9-30', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('374', '', '1', '1-18-27', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('375', '', '1', '1-15-20', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('376', '', '1', '1-9-32', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('377', '', '1', '1-7-33', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('378', '', '1', '1-15-27', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('379', '', '1', '1-7-56', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('380', '', '1', '1-17-35', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('381', '', '1', '1-1-12', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('382', '', '1', '1-18-32', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('383', '', '1', '1-2-38', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('384', '', '1', '1-18-72', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('385', '', '1', '1-16-62', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('386', '', '1', '1-7-38', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('387', '', '1', '1-6-27', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('388', '', '1', '1-15-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('389', '', '1', '1-7-10', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('390', '', '1', '1-15-30', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('391', '', '1', '1-16-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('392', '', '1', '1-10-17', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('393', '', '1', '1-18-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('394', '', '1', '1-8-28', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('395', '', '1', '1-8-18', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('396', '', '1', '1-12-33', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('397', '', '1', '1-11-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('398', '', '1', '1-17-12', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('399', '', '2', '2-17-52', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('400', '', '2', '2-5-7', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('401', '', '2', '2-7-5', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('402', '', '2', '2-7-10', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('403', '', '2', '2-11-5', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('404', '', '2', '2-12-32', '5', '2017-12-07', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('405', '', '2', '2-10-28', '5', '2017-12-13', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('406', '', '2', '2-17-32', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('407', '', '2', '2-11-31', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('408', '', '2', '2-8-3', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('409', '', '2', '2-10-21', '5', '2018-02-16', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('410', '', '2', '2-8-60', '5', '2018-02-10', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('411', '', '2', '2-10-25', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('412', '', '2', '2-6-17', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('413', '', '2', '2-11-15', '5', '2017-12-12', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('414', '', '2', '2-17-10', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('415', '', '2', '2-12-30', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('416', '', '2', '2-8-51', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('417', '', '2', '2-12-1', '5', '2017-12-15', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('418', '', '2', '2-10-3', '5', '2017-12-25', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('419', '', '2', '2-8-5', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('420', '', '2', '2-11-12', '5', '2017-12-12', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('421', '', '2', '2-9-56', '5', '2018-02-26', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('422', '', '2', '2-6-15', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('423', '', '2', '2-7-2', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('424', '', '2', '2-16-50', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('425', '', '2', '2-17-22', '5', '2018-01-26', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('426', '', '2', '2-15-32', '5', '2017-12-17', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('427', '', '2', '2-8-16', '5', '2017-12-15', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('428', '', '2', '2-12-50', '5', '2017-12-08', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('429', '', '2', '2-12-38', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('430', '', '2', '2-3-6', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('431', '', '2', '2-10-30', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('432', '', '2', '2-1-10', '5', '2018-02-24', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('433', '', '2', '2-10-9', '5', '2017-12-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('434', '', '2', '2-17-20', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('435', '', '2', '2-8-27', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('436', '', '2', '2-10-1', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('437', '', '2', '2-6-2', '5', '2017-12-15', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('438', '', '2', '2-2-5', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('439', '', '2', '2-17-35', '5', '2018-02-25', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('440', '', '2', '2-7-12', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('441', '', '2', '2-10-33', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('442', '', '2', '2-7-17', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('443', '', '2', '2-9-16', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('444', '', '2', '2-17-6', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('445', '', '2', '2-7-9', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('446', '', '2', '2-8-36', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('447', '', '2', '2-10-59', '5', '2018-02-28', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('448', '', '2', '2-8-7', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('449', '', '2', '2-11-25', '5', '2017-12-08', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('450', '', '2', '2-10-57', '5', '2018-02-15', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('451', '', '2', '2-12-21', '5', '2017-12-05', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('452', '', '2', '2-17-29', '5', '2018-02-25', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('453', '', '2', '2-17-28', '5', '2018-02-23', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('454', '', '2', '2-18-16', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('455', '', '2', '2-15-28', '5', '2017-12-11', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('456', '', '2', '2-10-17', '5', '2017-12-04', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('457', '', '2', '2-17-26', '5', '2018-02-25', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('458', '', '2', '2-1-22', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('459', '', '2', '2-10-32', '5', '2018-02-17', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('460', '', '2', '2-9-39', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('461', '', '2', '2-12-56', '5', '2018-02-28', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('462', '', '2', '2-16-52', '5', '2018-02-21', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('463', '', '2', '2-11-16', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('464', '', '2', '2-12-29', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('465', '', '2', '2-17-16', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('466', '', '2', '2-11-3', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('467', '', '2', '2-8-6', '5', '2017-12-03', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('468', '', '2', '2-9-18', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('469', '', '2', '2-12-5', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('470', '', '2', '2-10-11', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('471', '', '2', '2-10-31', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('472', '', '2', '2-9-72', '5', '2018-01-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('473', '', '2', '2-3-9', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('474', '', '2', '2-8-62', '5', '2018-02-19', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('475', '', '2', '2-12-23', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('476', '', '2', '2-6-7', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('477', '', '2', '2-10-15', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('478', '', '2', '2-18-20', '5', '2018-02-23', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('479', '', '2', '2-16-29', '5', '2018-02-25', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('480', '', '2', '2-15-36', '5', '2017-12-11', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('481', '', '2', '2-11-19', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('482', '', '2', '2-16-33', '5', '2018-02-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('483', '', '2', '2-18-7', '5', '2018-02-26', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('484', '', '2', '2-9-68', '5', '2018-02-28', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('485', '', '2', '2-10-37', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('486', '', '2', '2-5-17', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('487', '', '2', '2-11-35', '5', '2017-12-09', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('488', '', '2', '2-12-36', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('489', '', '2', '2-10-55', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('490', '', '2', '2-17-27', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('491', '', '2', '2-8-58', '5', '2018-02-13', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('492', '', '2', '2-11-6', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('493', '', '2', '2-9-37', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('494', '', '2', '2-10-10', '5', '2017-12-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('495', '', '2', '2-9-12', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('496', '', '2', '2-9-21', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('497', '', '2', '2-15-29', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('498', '', '2', '2-9-59', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('499', '', '2', '2-17-30', '5', '2018-02-25', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('500', '', '2', '2-18-18', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('501', '', '2', '2-6-22', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('502', '', '2', '2-10-16', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('503', '', '2', '2-9-20', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('504', '', '2', '2-8-39', '5', '2017-12-12', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('505', '', '2', '2-10-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('506', '', '2', '2-10-38', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('507', '', '2', '2-11-21', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('508', '', '2', '2-10-53', '5', '2018-02-14', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('509', '', '2', '2-9-61', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('510', '', '2', '2-10-61', '5', '2018-02-24', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('511', '', '2', '2-8-21', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('512', '', '2', '2-10-65', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('513', '', '2', '2-9-33', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('514', '', '2', '2-8-66', '5', '2018-02-18', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('515', '', '2', '2-16-36', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('516', '', '2', '2-8-32', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('517', '', '2', '2-12-3', '5', '2017-12-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('518', '', '2', '2-11-10', '5', '2018-02-27', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('519', '', '2', '2-10-6', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('520', '', '2', '2-7-19', '5', '2017-12-15', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('521', '', '2', '2-5-1', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('522', '', '2', '2-5-3', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('523', '', '2', '2-19-3', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('524', '', '2', '2-12-7', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('525', '', '2', '2-15-23', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('526', '', '2', '2-11-30', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('527', '', '2', '2-5-5', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('528', '', '2', '2-8-26', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('529', '', '2', '2-9-78', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('530', '', '2', '2-9-7', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('531', '', '2', '2-9-76', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('532', '', '2', '2-10-2', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('533', '', '2', '2-12-11', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('534', '', '2', '2-8-30', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('535', '', '2', '2-9-52', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('536', '', '2', '2-11-18', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('537', '', '2', '2-15-30', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('538', '', '2', '2-8-20', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('539', '', '2', '2-11-22', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('540', '', '2', '2-7-20', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('541', '', '2', '2-7-3', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('542', '', '2', '2-16-25', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('543', '', '2', '2-5-9', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('544', '', '2', '2-12-31', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('545', '', '2', '2-10-39', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('546', '', '2', '2-10-29', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('547', '', '2', '2-19-5', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('548', '', '2', '2-18-12', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('549', '', '2', '2-18-10', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('550', '', '2', '2-7-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('551', '', '2', '2-7-22', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('552', '', '2', '2-9-36', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('553', '', '2', '2-10-7', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('554', '', '2', '2-8-72', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('555', '', '2', '2-3-17', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('556', '', '2', '2-9-11', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('557', '', '2', '2-9-50', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('558', '', '2', '2-8-28', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('559', '', '2', '2-10-18', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('560', '', '2', '2-10-5', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('561', '', '2', '2-9-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('562', '', '2', '2-11-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('563', '', '2', '2-10-35', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('564', '', '2', '2-9-27', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('565', '', '2', '2-12-9', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('566', '', '2', '2-8-29', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('567', '', '2', '2-17-12', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('568', '', '2', '2-5-20', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('569', '', '2', '2-6-6', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('570', '', '2', '2-6-11', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('571', '', '2', '2-11-17', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('572', '', '2', '2-8-1', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('573', '', '2', '2-9-19', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('574', '', '2', '2-10-52', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('575', '', '2', '2-7-16', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('576', '', '2', '2-5-15', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('577', '', '2', '2-18-15', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('578', '', '2', '2-2-9', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('579', '', '2', '2-2-7', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('580', '', '2', '2-9-5', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('581', '', '2', '2-11-32', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('582', '', '2', '2-8-52', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('583', '', '2', '2-3-2', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('584', '', '2', '2-8-11', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('585', '', '2', '2-6-9', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('586', '', '2', '2-12-25', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('587', '', '2', '2-10-12', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('588', '', '2', '2-6-1', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('589', '', '2', '2-6-20', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('590', '', '2', '2-3-3', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('591', '', '2', '2-8-10', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('592', '', '2', '2-11-23', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('593', '', '2', '2-8-23', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('594', '', '2', '2-9-29', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('595', '', '2', '2-2-23', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('596', '', '2', '2-9-6', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('597', '', '2', '2-5-10', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('598', '', '2', '2-5-2', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('599', '', '2', '2-9-31', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('600', '', '2', '2-9-38', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('601', '', '2', '2-5-6', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('602', '', '2', '2-8-70', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('603', '', '2', '2-8-2', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('604', '', '2', '2-5-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('605', '', '2', '2-12-15', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('606', '', '2', '2-11-36', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('607', '', '2', '2-10-19', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('608', '', '2', '2-2-26', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('609', '', '2', '2-1-2', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('610', '', '2', '2-15-38', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('611', '', '2', '2-7-18', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('612', '', '2', '2-3-16', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('613', '', '2', '2-3-18', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('614', '', '2', '2-10-26', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('615', '', '2', '2-9-35', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('616', '', '2', '2-11-28', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('617', '', '2', '2-8-19', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('618', '', '2', '2-8-50', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('619', '', '2', '2-9-1', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('620', '', '2', '2-5-11', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('621', '', '2', '2-10-20', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('622', '', '2', '2-6-3', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('623', '', '2', '2-11-20', '5', '2017-12-07', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('624', '', '2', '2-9-15', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('625', '', '2', '2-9-2', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('626', '', '2', '2-9-26', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('627', '', '2', '2-9-28', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('628', '', '2', '2-9-23', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('629', '', '2', '2-9-25', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('630', '', '2', '2-9-30', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('631', '', '2', '2-9-32', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('632', '', '2', '2-7-11', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('633', '', '2', '2-6-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('634', '', '2', '2-9-3', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('635', '', '2', '2-11-1', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('636', '', '2', '2-9-22', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('637', '', '2', '2-10-50', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('638', '', '2', '2-8-22', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('639', '', '2', '2-2-11', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('640', '', '2', '2-9-66', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('641', '', '2', '2-18-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('642', '', '2', '2-12-35', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('643', '', '2', '2-11-27', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('644', '', '2', '2-11-29', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('645', '', '2', '2-18-6', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('646', '', '2', '2-7-15', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('647', '', '2', '2-12-17', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('648', '', '2', '2-8-12', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('649', '', '2', '2-8-56', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('650', '', '2', '2-8-68', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('651', '', '2', '2-3-10', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('652', '', '2', '2-10-22', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('653', '', '2', '2-8-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('654', '', '2', '2-10-67', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('655', '', '2', '2-17-18', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('656', '', '2', '2-18-1', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('657', '', '2', '2-11-26', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('658', '', '2', '2-9-9', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('659', '', '2', '2-3-12', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('660', '', '2', '2-17-25', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('661', '', '2', '2-7-6', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('662', '', '2', '2-9-58', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('663', '', '2', '2-19-11', '5', '2018-01-09', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('664', '', '2', '2-9-57', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('665', '', '2', '2-9-60', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('666', '', '2', '2-1-26', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('667', '', '2', '2-8-18', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('668', '', '2', '2-2-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('669', '', '2', '2-12-27', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('670', '', '2', '2-9-17', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('671', '', '2', '2-17-2', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('672', '', '2', '2-11-9', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('673', '', '2', '2-8-37', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('674', '', '2', '2-15-27', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('675', '', '2', '2-12-28', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('676', '', '2', '2-16-27', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('677', '', '2', '2-10-23', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('678', '', '2', '2-9-10', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('679', '', '2', '2-15-25', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('680', '', '2', '2-11-7', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('681', '', '2', '2-18-23', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('682', '', '2', '2-8-25', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('683', '', '2', '2-2-3', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('684', '', '2', '2-16-32', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('685', '', '2', '2-10-36', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('686', '', '2', '2-11-11', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('687', '', '3', '3-3-12', '5', '2018-02-23', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('688', '', '3', '3-3-16', '5', '2018-02-23', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('689', '', '3', '3-8-1', '5', '2018-02-28', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('690', '', '4', '4-5-51', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('691', '', '4', '4-5-59', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('692', '', '4', '4-5-69', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('693', '', '4', '4-5-78', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('694', '', '4', '4-5-88', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('695', '', '4', '4-6-17', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('696', '', '4', '4-7-3', '5', '2017-12-25', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('697', '', '4', '4-7-10', '5', '2017-12-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('698', '', '4', '4-7-50', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('699', '', '4', '4-8-52', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('700', '', '4', '4-8-62', '5', '2017-12-06', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('701', '', '4', '4-8-72', '5', '2017-12-01', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('702', '', '4', '4-3-23', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('703', '', '4', '4-6-5', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('704', '', '4', '4-5-16', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('705', '', '4', '4-2-58', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('706', '', '4', '4-8-22', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('707', '', '4', '4-5-26', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('708', '', '4', '4-5-3', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('709', '', '4', '4-2-88', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('710', '', '4', '4-5-11', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('711', '', '4', '4-5-23', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('712', '', '4', '4-7-17', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('713', '', '4', '4-5-10', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('714', '', '4', '4-2-55', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('715', '', '4', '4-7-58', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('716', '', '4', '4-7-1', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('717', '', '4', '4-7-67', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('718', '', '4', '4-7-12', '5', '2018-01-09', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('719', '', '4', '4-2-86', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('720', '', '4', '4-3-78', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('721', '', '4', '4-2-76', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('722', '', '4', '4-5-25', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('723', '', '4', '4-3-52', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('724', '', '4', '4-3-3', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('725', '', '4', '4-5-15', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('726', '', '4', '4-6-25', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('727', '', '4', '4-6-59', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('728', '', '4', '4-2-33', '5', '2018-01-28', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('729', '', '4', '4-7-88', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('730', '', '4', '4-6-80', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('731', '', '4', '4-5-9', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('732', '', '4', '4-3-73', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('733', '', '4', '4-2-96', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('734', '', '4', '4-7-38', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('735', '', '4', '4-2-36', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('736', '', '4', '4-7-18', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('737', '', '4', '4-6-9', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('738', '', '4', '4-5-38', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('739', '', '4', '4-5-12', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('740', '', '4', '4-5-6', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('741', '', '4', '4-1-6', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('742', '', '4', '4-1-28', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('743', '', '4', '4-2-19', '5', '2018-01-18', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('744', '', '4', '4-5-22', '5', '2017-12-25', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('745', '', '4', '4-5-55', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('746', '', '4', '4-7-29', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('747', '', '4', '4-8-26', '5', '2017-12-19', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('748', '', '4', '4-8-3', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('749', '', '4', '4-1-62', '5', '2018-01-30', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('750', '', '4', '4-7-30', '5', '2017-12-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('751', '', '4', '4-2-66', '5', '2018-01-16', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('752', '', '4', '4-2-32', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('753', '', '4', '4-2-39', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('754', '', '4', '4-3-90', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('755', '', '4', '4-3-18', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('756', '', '4', '4-3-53', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('757', '', '4', '4-3-88', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('758', '', '4', '4-1-18', '5', '2018-01-18', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('759', '', '4', '4-7-70', '5', '2018-01-18', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('760', '', '4', '4-6-1', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('761', '', '4', '4-3-92', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('762', '', '4', '4-1-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('763', '', '4', '4-8-36', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('764', '', '4', '4-3-58', '5', '2017-12-31', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('765', '', '4', '4-7-20', '5', '2017-12-11', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('766', '', '4', '4-3-10', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('767', '', '4', '4-8-57', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('768', '', '4', '4-2-35', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('769', '', '4', '4-6-72', '5', '2018-01-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('770', '', '4', '4-6-65', '5', '2018-02-04', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('771', '', '4', '4-3-31', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('772', '', '4', '4-7-21', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('773', '', '4', '4-6-7', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('774', '', '4', '4-3-28', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('775', '', '4', '4-2-61', '5', '2018-02-04', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('776', '', '4', '4-6-15', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('777', '', '4', '4-3-82', '5', '2017-12-03', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('778', '', '4', '4-8-59', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('779', '', '4', '4-1-58', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('780', '', '4', '4-2-70', '5', '2018-01-06', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('781', '', '4', '4-3-62', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('782', '', '4', '4-3-76', '5', '2017-12-19', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('783', '', '4', '4-8-39', '5', '2018-01-16', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('784', '', '4', '4-5-76', '5', '2017-12-10', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('785', '', '4', '4-6-71', '5', '2018-01-28', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('786', '', '4', '4-6-56', '5', '2018-01-30', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('787', '', '4', '4-6-70', '5', '2017-12-03', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('788', '', '4', '4-7-69', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('789', '', '4', '4-5-31', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('790', '', '4', '4-5-52', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('791', '', '4', '4-8-16', '5', '2018-01-06', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('792', '', '4', '4-2-53', '5', '2018-02-13', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('793', '', '4', '4-1-72', '5', '2018-01-05', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('794', '', '4', '4-1-22', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('795', '', '4', '4-5-65', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('796', '', '4', '4-8-53', '5', '2018-01-14', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('797', '', '4', '4-3-26', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('798', '', '4', '4-8-65', '5', '2017-12-10', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('799', '', '4', '4-2-59', '5', '2018-12-21', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('800', '', '4', '4-8-82', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('801', '', '4', '4-5-79', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('802', '', '4', '4-2-17', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('803', '', '4', '4-8-90', '5', '2018-01-13', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('804', '', '4', '4-1-16', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('805', '', '4', '4-3-30', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('806', '', '4', '4-2-21', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('807', '', '4', '4-3-12', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('808', '', '4', '4-1-32', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('809', '', '4', '4-3-5', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('810', '', '4', '4-3-35', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('811', '', '4', '4-7-5', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('812', '', '4', '4-2-10', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('813', '', '4', '4-7-51', '5', '2018-01-05', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('814', '', '4', '4-7-78', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('815', '', '4', '4-5-63', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('816', '', '4', '4-1-70', '5', '2017-12-05', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('817', '', '4', '4-8-38', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('818', '', '4', '4-2-1', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('819', '', '4', '4-5-37', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('820', '', '4', '4-2-69', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('821', '', '4', '4-3-25', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('822', '', '4', '4-3-1', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('823', '', '4', '4-8-9', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('824', '', '4', '4-3-55', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('825', '', '4', '4-5-56', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('826', '', '4', '4-3-80', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('827', '', '4', '4-8-92', '5', '2018-01-27', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('828', '', '4', '4-3-22', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('829', '', '4', '4-7-82', '5', '2018-01-28', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('830', '', '4', '4-3-71', '5', '2017-12-03', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('831', '', '4', '4-8-5', '5', '2018-02-03', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('832', '', '4', '4-5-77', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('833', '', '4', '4-5-73', '5', '2017-12-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('834', '', '4', '4-1-56', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('835', '', '4', '4-7-31', '5', '2017-12-14', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('836', '', '4', '4-8-7', '5', '2017-12-08', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('837', '', '4', '4-7-16', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('838', '', '4', '4-3-16', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('839', '', '4', '4-2-23', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('840', '', '4', '4-6-61', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('841', '', '4', '4-2-20', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('842', '', '4', '4-8-12', '5', '2018-02-06', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('843', '', '4', '4-8-10', '5', '2018-01-30', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('844', '', '4', '4-3-7', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('845', '', '4', '4-5-28', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('846', '', '4', '4-5-19', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('847', '', '4', '4-8-51', '5', '2018-02-13', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('848', '', '4', '4-7-66', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('849', '', '4', '4-2-30', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('850', '', '4', '4-3-38', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('851', '', '4', '4-2-60', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('852', '', '4', '4-5-27', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('853', '', '4', '4-6-39', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('854', '', '4', '4-2-7', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('855', '', '4', '4-2-3', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('856', '', '4', '4-3-63', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('857', '', '4', '4-6-38', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('858', '', '4', '4-2-27', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('859', '', '4', '4-6-67', '5', '2018-02-03', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('860', '', '4', '4-7-68', '5', '2017-12-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('861', '', '4', '4-8-56', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('862', '', '4', '4-6-33', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('863', '', '4', '4-6-35', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('864', '', '4', '4-6-2', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('865', '', '4', '4-5-66', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('866', '', '4', '4-2-18', '5', '2017-12-23', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('867', '', '4', '4-2-26', '5', '2017-12-08', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('868', '', '4', '4-3-59', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('869', '', '4', '4-2-90', '5', '2018-02-10', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('870', '', '4', '4-8-29', '5', '2018-01-19', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('871', '', '4', '4-6-16', '5', '2018-01-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('872', '', '4', '4-8-25', '5', '2018-01-29', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('873', '', '4', '4-3-66', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('874', '', '4', '4-8-11', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('875', '', '4', '4-5-72', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('876', '', '4', '4-6-53', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('877', '', '4', '4-2-22', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('878', '', '4', '4-5-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('879', '', '4', '4-5-92', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('880', '', '4', '4-7-26', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('881', '', '4', '4-2-28', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('882', '', '4', '4-8-35', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('883', '', '4', '4-3-61', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('884', '', '4', '4-6-69', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('885', '', '4', '4-3-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('886', '', '4', '4-7-72', '5', '2018-01-10', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('887', '', '4', '4-7-76', '5', '2018-01-04', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('888', '', '4', '4-5-82', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('889', '', '4', '4-2-38', '5', '2018-02-10', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('890', '', '4', '4-5-86', '5', '2017-12-10', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('891', '', '4', '4-5-68', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('892', '', '4', '4-1-50', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('893', '', '4', '4-1-60', '5', '2018-01-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('894', '', '4', '4-3-56', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('895', '', '4', '4-3-65', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('896', '', '4', '4-8-2', '5', '2017-12-09', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('897', '', '4', '4-7-55', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('898', '', '4', '4-7-62', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('899', '', '4', '4-5-35', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('900', '', '4', '4-6-26', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('901', '', '4', '4-3-33', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('902', '', '4', '4-5-71', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('903', '', '4', '4-5-20', '5', '2018-01-05', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('904', '', '4', '4-5-70', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('905', '', '4', '4-6-32', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('906', '', '4', '4-6-66', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('907', '', '4', '4-6-36', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('908', '', '4', '4-7-36', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('909', '', '4', '4-6-3', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('910', '', '4', '4-7-53', '5', '2017-12-13', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('911', '', '4', '4-8-27', '5', '2018-01-16', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('912', '', '4', '4-6-51', '5', '2017-12-07', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('913', '', '4', '4-8-18', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('914', '', '4', '4-2-5', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('915', '', '4', '4-8-1', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('916', '', '4', '4-3-11', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('917', '', '4', '4-2-25', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('918', '', '4', '4-2-82', '5', '2017-12-08', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('919', '', '4', '4-8-17', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('920', '', '4', '4-5-58', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('921', '', '4', '4-6-22', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('922', '', '4', '4-3-9', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('923', '', '4', '4-3-2', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('924', '', '4', '4-2-50', '5', '2018-01-24', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('925', '', '4', '4-2-78', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('926', '', '4', '4-7-52', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('927', '', '4', '4-5-53', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('928', '', '4', '4-6-27', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('929', '', '4', '4-6-28', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('930', '', '4', '4-3-19', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('931', '', '4', '4-5-96', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('932', '', '4', '4-2-92', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('933', '', '4', '4-8-88', '5', '2018-01-10', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('934', '', '4', '4-3-72', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('935', '', '4', '4-2-37', '5', '2017-12-09', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('936', '', '4', '4-5-17', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('937', '', '4', '4-8-76', '5', '2017-12-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('938', '', '4', '4-7-60', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('939', '', '4', '4-7-25', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('940', '', '4', '4-6-50', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('941', '', '4', '4-6-78', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('942', '', '4', '4-3-37', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('943', '', '4', '4-6-73', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('944', '', '4', '4-2-29', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('945', '', '4', '4-5-62', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('946', '', '4', '4-7-80', '5', '2017-12-15', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('947', '', '4', '4-8-31', '5', '2018-01-12', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('948', '', '4', '4-2-52', '5', '2018-01-07', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('949', '', '4', '4-3-15', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('950', '', '4', '4-3-20', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('951', '', '4', '4-7-65', '5', '2018-01-18', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('952', '', '4', '4-8-21', '5', '2018-01-31', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('953', '', '4', '4-6-12', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('954', '', '4', '4-5-67', '5', '2017-12-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('955', '', '4', '4-2-68', '5', '2017-12-07', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('956', '', '4', '4-3-86', '5', '2018-02-11', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('957', '', '4', '4-2-65', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('958', '', '4', '4-3-50', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('959', '', '4', '4-3-60', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('960', '', '4', '4-6-58', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('961', '', '4', '4-3-17', '5', '2017-12-19', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('962', '', '4', '4-5-2', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('963', '', '4', '4-8-60', '5', '2017-12-18', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('964', '', '4', '4-8-30', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('965', '', '4', '4-1-26', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('966', '', '4', '4-3-57', '5', '2017-12-18', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('967', '', '4', '4-8-70', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('968', '', '4', '4-7-2', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('969', '', '4', '4-6-21', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('970', '', '4', '4-6-23', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('971', '', '4', '4-7-86', '5', '2017-12-26', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('972', '', '4', '4-8-63', '5', '2018-02-11', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('973', '', '4', '4-8-58', '5', '2018-01-09', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('974', '', '4', '4-8-61', '5', '2018-02-06', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('975', '', '4', '4-2-67', '5', '2017-12-27', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('976', '', '4', '4-5-36', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('977', '', '4', '4-6-29', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('978', '', '4', '4-5-30', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('979', '', '4', '4-7-28', '5', '2017-12-13', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('980', '', '4', '4-3-67', '5', '2017-12-17', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('981', '', '4', '4-1-2', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('982', '', '4', '4-6-68', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('983', '', '4', '4-6-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('984', '', '4', '4-8-32', '5', '2018-01-13', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('985', '', '4', '4-5-18', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('986', '', '4', '4-1-76', '5', '2018-01-13', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('987', '', '4', '4-2-16', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('988', '', '4', '4-6-19', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('989', '', '4', '4-1-30', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('990', '', '4', '4-1-12', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('991', '', '4', '4-8-68', '5', '2017-12-27', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('992', '', '4', '4-6-52', '5', '2017-12-26', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('993', '', '4', '4-2-72', '5', '2018-01-18', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('994', '', '4', '4-6-75', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('995', '', '4', '4-7-61', '5', '2018-01-14', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('996', '', '4', '4-8-50', '5', '2018-01-06', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('997', '', '4', '4-3-27', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('998', '', '4', '4-5-60', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('999', '', '4', '4-7-27', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1000', '', '4', '4-1-66', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1001', '', '4', '4-7-56', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1002', '', '4', '4-2-31', '5', '2017-12-14', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1003', '', '4', '4-6-60', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1004', '', '4', '4-7-9', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1005', '', '4', '4-8-15', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1006', '', '4', '4-7-63', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1007', '', '4', '4-3-32', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1008', '', '4', '4-5-75', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1009', '', '4', '4-2-11', '5', '2017-12-17', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1010', '', '4', '4-6-62', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1011', '', '4', '4-6-18', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1012', '', '4', '4-3-21', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1013', '', '4', '4-6-37', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1014', '', '4', '4-2-51', '5', '2018-01-03', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1015', '', '4', '4-2-15', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1016', '', '4', '4-2-12', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1017', '', '4', '4-3-39', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1018', '', '4', '4-8-80', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1019', '', '4', '4-5-32', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1020', '', '4', '4-7-32', '5', '2017-12-25', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1021', '', '4', '4-8-23', '5', '2018-01-31', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1022', '', '4', '4-5-5', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1023', '', '4', '4-1-78', '5', '2017-12-09', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1024', '', '4', '4-8-78', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1025', '', '4', '4-2-62', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1026', '', '4', '4-7-22', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1027', '', '4', '4-6-55', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1028', '', '4', '4-6-76', '5', '2018-01-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1029', '', '4', '4-3-36', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1030', '', '4', '4-8-75', '5', '2018-01-06', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1031', '', '4', '4-6-31', '5', '2017-12-10', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1032', '', '4', '4-5-61', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1033', '', '4', '4-5-80', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1034', '', '4', '4-8-6', '5', '2017-12-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1035', '', '4', '4-5-90', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1036', '', '4', '4-3-29', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1037', '', '4', '4-7-37', '5', '2017-12-05', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1038', '', '4', '4-6-11', '5', '2017-12-11', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1039', '', '4', '4-8-86', '5', '2018-01-09', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1040', '', '4', '4-2-56', '5', '2017-12-07', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1041', '', '4', '4-1-20', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1042', '', '4', '4-8-77', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1043', '', '4', '4-6-63', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1044', '', '4', '4-7-39', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1045', '', '4', '4-6-57', '5', '2017-12-11', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1046', '', '4', '4-6-30', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1047', '', '4', '4-7-11', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1048', '', '4', '4-8-96', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1049', '', '4', '4-5-7', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1050', '', '4', '4-8-55', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1051', '', '4', '4-8-37', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1052', '', '4', '4-1-10', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1053', '', '4', '4-2-57', '5', '2018-01-30', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1054', '', '4', '4-3-70', '5', '2018-02-13', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1055', '', '4', '4-3-51', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1056', '', '4', '4-7-7', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1057', '', '4', '4-5-50', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1058', '', '4', '4-5-81', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1059', '', '4', '4-5-39', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1060', '', '4', '4-5-21', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1061', '', '4', '4-5-33', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1062', '', '4', '4-6-20', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1063', '', '4', '4-2-9', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1064', '', '4', '4-2-63', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1065', '', '4', '4-8-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1066', '', '4', '4-7-35', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1067', '', '4', '4-6-77', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1068', '', '4', '4-3-6', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1069', '', '4', '4-5-29', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1070', '', '4', '4-7-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1071', '', '4', '4-7-59', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1072', '', '4', '4-7-57', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1073', '', '4', '4-7-33', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1074', '', '4', '4-5-1', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1075', '', '4', '4-3-68', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1076', '', '4', '4-8-28', '5', '2018-01-21', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1077', '', '4', '4-2-2', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1078', '', '4', '4-7-90', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1079', '', '4', '4-7-19', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1080', '', '4', '4-2-6', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1081', '', '4', '4-2-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1082', '', '4', '4-6-6', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1083', '', '4', '4-5-57', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1084', '', '5', '5-1-9', '5', '2017-12-11', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1085', '', '5', '5-1-17', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1086', '', '5', '5-1-20', '5', '2017-12-07', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1087', '', '5', '5-2-9', '5', '2017-12-03', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1088', '', '5', '5-2-27', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1089', '', '5', '5-2-38', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1090', '', '5', '5-2-55', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1091', '', '5', '5-5-16', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1092', '', '5', '5-6-20', '5', '2017-12-05', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1093', '', '5', '5-7-3', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1094', '', '5', '5-7-10', '5', '2017-12-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1095', '', '5', '5-7-25', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1096', '', '5', '5-7-26', '5', '2017-12-09', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1097', '', '5', '5-7-30', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1098', '', '5', '5-7-38', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1099', '', '5', '5-7-60', '5', '2017-12-07', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1100', '', '5', '5-8-9', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1101', '', '5', '5-8-15', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1102', '', '5', '5-8-22', '5', '2017-12-08', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1103', '', '5', '5-7-16', '5', '2017-12-09', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1104', '', '5', '5-5-31', '5', '2017-12-09', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1105', '', '5', '5-3-17', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1106', '', '5', '5-2-32', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1107', '', '5', '5-3-78', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1108', '', '5', '5-7-18', '5', '2017-12-03', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1109', '', '5', '5-3-29', '5', '2017-12-11', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1110', '', '5', '5-1-32', '5', '2018-01-13', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1111', '', '5', '5-3-9', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1112', '', '5', '5-5-25', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1113', '', '5', '5-3-36', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1114', '', '5', '5-3-30', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1115', '', '5', '5-2-36', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1116', '', '5', '5-6-32', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1117', '', '5', '5-7-1', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1118', '', '5', '5-1-11', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1119', '', '5', '5-5-21', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1120', '', '5', '5-5-23', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1121', '', '5', '5-7-21', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1122', '', '5', '5-6-22', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1123', '', '5', '5-7-23', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1124', '', '5', '5-1-55', '5', '2018-01-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1125', '', '5', '5-3-61', '5', '2017-12-17', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1126', '', '5', '5-2-6', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1127', '', '5', '5-2-28', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1128', '', '5', '5-5-20', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1129', '', '5', '5-7-58', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1130', '', '5', '5-2-10', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1131', '', '5', '5-7-22', '5', '2018-02-28', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1132', '', '5', '5-7-12', '5', '2017-12-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1133', '', '5', '5-8-11', '5', '2017-12-11', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1134', '', '5', '5-3-25', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1135', '', '5', '5-3-50', '5', '2017-12-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1136', '', '5', '5-7-31', '5', '2018-02-28', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1137', '', '5', '5-2-76', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1138', '', '5', '5-3-57', '5', '2017-12-07', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1139', '', '5', '5-2-35', '5', '2017-12-07', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1140', '', '5', '5-8-53', '5', '2018-01-14', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1141', '', '5', '5-3-12', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1142', '', '5', '5-2-25', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1143', '', '5', '5-6-16', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1144', '', '5', '5-2-68', '5', '2017-12-03', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1145', '', '5', '5-3-38', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1146', '', '5', '5-1-57', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1147', '', '5', '5-1-59', '5', '2018-02-11', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1148', '', '5', '5-1-29', '5', '2018-02-10', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1149', '', '5', '5-3-31', '5', '2017-12-08', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1150', '', '5', '5-5-33', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1151', '', '5', '5-3-90', '5', '2017-12-19', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1152', '', '5', '5-8-63', '5', '2017-12-19', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1153', '', '5', '5-1-23', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1154', '', '5', '5-1-12', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1155', '', '5', '5-2-26', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1156', '', '5', '5-5-18', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1157', '', '5', '5-3-72', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1158', '', '5', '5-3-11', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1159', '', '5', '5-3-56', '5', '2017-12-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1160', '', '5', '5-2-2', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1161', '', '5', '5-5-12', '5', '2017-12-12', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1162', '', '5', '5-2-17', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1163', '', '5', '5-7-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1164', '', '5', '5-7-52', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1165', '', '5', '5-7-19', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1166', '', '5', '5-8-58', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1167', '', '5', '5-8-2', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1168', '', '5', '5-3-18', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1169', '', '5', '5-2-62', '5', '2017-12-05', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1170', '', '5', '5-2-52', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1171', '', '5', '5-1-37', '5', '0000-00-00', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1172', '', '5', '5-2-70', '5', '2017-12-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1173', '', '5', '5-1-25', '5', '2017-12-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1174', '', '5', '5-3-19', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1175', '', '5', '5-1-65', '5', '2017-12-07', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1176', '', '5', '5-1-58', '5', '2018-01-17', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1177', '', '5', '5-2-1', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1178', '', '5', '5-9-59', '5', '2018-02-10', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1179', '', '5', '5-8-37', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1180', '', '5', '5-7-68', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1181', '', '5', '5-2-21', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1182', '', '5', '5-2-58', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1183', '', '5', '5-1-27', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1184', '', '5', '5-3-52', '5', '2017-12-17', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1185', '', '5', '5-5-11', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1186', '', '5', '5-5-2', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1187', '', '5', '5-2-39', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1188', '', '5', '5-1-21', '5', '2017-12-07', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1189', '', '5', '5-6-7', '5', '2017-12-07', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1190', '', '5', '5-9-19', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1191', '', '5', '5-8-19', '5', '2018-01-07', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1192', '', '5', '5-3-62', '5', '2018-02-28', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1193', '', '5', '5-5-1', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1194', '', '5', '5-9-21', '5', '2017-12-04', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1195', '', '5', '5-8-57', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1196', '', '5', '5-8-20', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1197', '', '5', '5-3-70', '5', '2017-12-11', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1198', '', '5', '5-7-33', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1199', '', '5', '5-8-26', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1200', '', '5', '5-1-1', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1201', '', '5', '5-8-55', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1202', '', '5', '5-6-28', '5', '2017-12-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1203', '', '5', '5-6-3', '5', '2017-12-10', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1204', '', '5', '5-2-23', '5', '2017-12-17', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1205', '', '5', '5-3-32', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1206', '', '5', '5-6-1', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1207', '', '5', '5-5-39', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1208', '', '5', '5-3-8', '5', '2017-12-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1209', '', '5', '5-7-50', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1210', '', '5', '5-2-30', '5', '2017-12-09', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1211', '', '5', '5-2-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1212', '', '5', '5-7-70', '5', '2018-01-13', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1213', '', '5', '5-9-25', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1214', '', '5', '5-8-21', '5', '2017-12-25', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1215', '', '5', '5-1-30', '5', '2017-12-25', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1216', '', '5', '5-9-61', '5', '2017-12-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1217', '', '5', '5-8-68', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1218', '', '5', '5-7-7', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1219', '', '5', '5-1-7', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1220', '', '5', '5-2-61', '5', '2017-12-07', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1221', '', '5', '5-2-19', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1222', '', '5', '5-5-5', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1223', '', '5', '5-9-65', '5', '2018-02-10', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1224', '', '5', '5-8-86', '5', '2017-12-03', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1225', '', '5', '5-1-52', '5', '2018-01-28', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1226', '', '5', '5-1-36', '5', '2018-01-18', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1227', '', '5', '5-2-72', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1228', '', '5', '5-9-69', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1229', '', '5', '5-9-71', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1230', '', '5', '5-9-73', '5', '2017-12-08', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1231', '', '5', '5-2-37', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1232', '', '5', '5-3-35', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1233', '', '5', '5-2-5', '5', '2017-12-13', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1234', '', '5', '5-2-59', '5', '2017-12-14', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1235', '', '5', '5-1-88', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1236', '', '5', '5-9-33', '5', '2018-02-28', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1237', '', '5', '5-3-55', '5', '2017-12-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1238', '', '5', '5-2-66', '5', '2017-12-15', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1239', '', '5', '5-8-52', '5', '2018-02-27', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1240', '', '5', '5-3-68', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1241', '', '5', '5-1-28', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1242', '', '5', '5-5-9', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1243', '', '5', '5-1-39', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1244', '', '5', '5-8-7', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1245', '', '5', '5-1-31', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1246', '', '5', '5-9-15', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1247', '', '5', '5-8-33', '5', '2018-01-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1248', '', '5', '5-8-18', '5', '2018-01-29', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1249', '', '5', '5-2-3', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1250', '', '5', '5-1-3', '5', '2017-12-11', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1251', '', '5', '5-3-59', '5', '2017-12-19', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1252', '', '5', '5-5-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1253', '', '5', '5-3-16', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1254', '', '5', '5-1-77', '5', '2018-02-10', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1255', '', '5', '5-8-39', '5', '2018-02-10', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1256', '', '5', '5-2-7', '5', '2017-12-13', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1257', '', '5', '5-1-22', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1258', '', '5', '5-3-3', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1259', '', '5', '5-9-51', '5', '2018-02-09', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1260', '', '5', '5-1-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1261', '', '5', '5-3-33', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1262', '', '5', '5-7-5', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1263', '', '5', '5-3-5', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1264', '', '5', '5-2-20', '5', '2017-12-07', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1265', '', '5', '5-3-22', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1266', '', '5', '5-3-10', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1267', '', '5', '5-2-51', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1268', '', '5', '5-2-15', '5', '2017-12-13', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1269', '', '5', '5-8-56', '5', '2017-12-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1270', '', '5', '5-7-28', '5', '2017-12-03', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1271', '', '5', '5-1-35', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1272', '', '5', '5-8-82', '5', '2018-02-10', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1273', '', '5', '5-2-57', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1274', '', '5', '5-2-29', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1275', '', '5', '5-3-51', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1276', '', '5', '5-8-70', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1277', '', '5', '5-2-60', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1278', '', '5', '5-1-50', '5', '2017-12-25', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1279', '', '5', '5-6-5', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1280', '', '5', '5-3-53', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1281', '', '5', '5-2-56', '5', '2017-12-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1282', '', '5', '5-7-27', '5', '2017-12-07', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1283', '', '5', '5-5-15', '5', '2017-12-19', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1284', '', '5', '5-2-16', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1285', '', '5', '5-3-39', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1286', '', '5', '5-9-63', '5', '2017-12-08', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1287', '', '5', '5-7-17', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1288', '', '5', '5-1-15', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1289', '', '5', '5-6-12', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1290', '', '5', '5-9-9', '5', '2018-02-27', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1291', '', '5', '5-1-6', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1292', '', '5', '5-2-53', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1293', '', '5', '5-8-51', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1294', '', '5', '5-3-76', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1295', '', '5', '5-6-26', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1296', '', '5', '5-3-15', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1297', '', '5', '5-9-37', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1298', '', '5', '5-5-7', '5', '2018-01-30', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1299', '', '5', '5-8-5', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1300', '', '5', '5-3-2', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1301', '', '5', '5-2-33', '5', '2017-12-19', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1302', '', '5', '5-9-35', '5', '2018-02-19', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1303', '', '5', '5-3-7', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1304', '', '5', '5-5-17', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1305', '', '5', '5-1-38', '5', '2017-12-10', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1306', '', '5', '5-9-3', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1307', '', '5', '5-3-60', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1308', '', '5', '5-6-6', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1309', '', '5', '5-6-11', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1310', '', '5', '5-8-35', '5', '2018-01-22', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1311', '', '5', '5-7-9', '5', '2018-01-30', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1312', '', '5', '5-8-28', '5', '2017-12-27', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1313', '', '5', '5-7-11', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1314', '', '5', '5-3-1', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1315', '', '5', '5-8-31', '5', '2018-01-05', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1316', '', '5', '5-7-20', '5', '2017-12-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1317', '', '5', '5-1-33', '5', '2017-12-09', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1318', '', '5', '5-5-10', '5', '2017-12-11', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1319', '', '5', '5-1-2', '5', '2017-12-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1320', '', '5', '5-1-26', '5', '2017-12-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1321', '', '5', '5-5-19', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1322', '', '5', '5-3-80', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1323', '', '5', '5-3-58', '5', '2017-12-17', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1324', '', '5', '5-7-2', '5', '2018-01-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1325', '', '5', '5-9-17', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1326', '', '5', '5-5-3', '5', '2017-12-09', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1327', '', '5', '5-3-88', '5', '2017-12-17', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1328', '', '5', '5-9-1', '5', '2018-02-16', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1329', '', '5', '5-6-2', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1330', '', '5', '5-2-12', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1331', '', '5', '5-2-31', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1332', '', '5', '5-6-30', '5', '2017-12-18', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1333', '', '5', '5-1-16', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1334', '', '5', '5-7-72', '5', '2017-12-07', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1335', '', '5', '5-8-8', '5', '2017-12-12', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1336', '', '5', '5-2-11', '5', '2017-12-07', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1337', '', '5', '5-6-10', '5', '2017-12-03', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1338', '', '5', '5-8-67', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1339', '', '5', '5-3-6', '5', '2017-12-09', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1340', '', '5', '5-1-10', '5', '2017-12-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1341', '', '5', '5-2-50', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1342', '', '5', '5-1-18', '5', '2017-12-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1343', '', '5', '5-3-20', '5', '2017-12-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1344', '', '5', '5-2-22', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1345', '', '5', '5-7-56', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1346', '', '5', '5-3-37', '5', '2017-12-14', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1347', '', '5', '5-5-27', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1348', '', '5', '5-3-27', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1349', '', '5', '5-5-35', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1350', '', '5', '5-2-18', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1351', '', '5', '5-3-28', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1352', '', '5', '5-3-26', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1353', '', '5', '5-6-18', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1354', '', '5', '5-8-3', '5', '2017-12-12', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1355', '', '5', '5-5-29', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1356', '', '5', '5-9-39', '5', '2017-12-05', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1357', '', '5', '5-7-15', '5', '2018-01-31', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1358', '', '5', '5-5-6', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1359', '', '5', '5-5-37', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1360', '', '5', '5-3-23', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1361', '', '5', '5-3-21', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1362', '', '5', '5-3-66', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1363', '', '6', '6-17-63', '5', '2018-02-28', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1364', '', '6', '6-15-6', '5', '2018-01-19', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1365', '', '6', '6-16-20', '5', '2018-01-25', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1366', '', '6', '6-5-17', '5', '2018-01-28', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1367', '', '6', '6-18-8', '5', '2018-01-07', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1368', '', '6', '6-20-20', '5', '2018-02-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1369', '', '6', '6-15-20', '5', '2018-02-25', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1370', '', '6', '6-20-38', '5', '2017-12-27', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1371', '', '6', '6-11-11', '5', '2018-01-24', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1372', '', '6', '6-1-8', '5', '2018-01-17', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1373', '', '6', '6-11-9', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1374', '', '6', '6-18-20', '5', '2018-01-03', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1375', '', '6', '6-11-1', '5', '2018-01-05', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1376', '', '6', '6-11-8', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1377', '', '6', '6-6-6', '5', '2018-02-11', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1378', '', '6', '6-8-8', '5', '2018-02-19', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1379', '', '6', '6-18-50', '5', '2018-02-25', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1380', '', '6', '6-18-22', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1381', '', '6', '6-15-15', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1382', '', '6', '6-6-31', '5', '2018-02-28', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1383', '', '6', '6-2-7', '5', '2018-02-14', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1384', '', '6', '6-20-25', '5', '2018-02-22', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1385', '', '6', '6-21-5', '5', '2018-02-10', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1386', '', '6', '6-16-27', '5', '2018-02-24', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1387', '', '6', '6-15-3', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1388', '', '6', '6-20-90', '5', '2018-02-25', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1389', '', '6', '6-15-11', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1390', '', '6', '6-20-92', '5', '2018-02-24', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1391', '', '6', '6-20-10', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1392', '', '6', '6-12-23', '5', '2018-02-04', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1393', '', '6', '6-15-2', '5', '2018-02-14', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1394', '', '6', '6-16-32', '5', '2018-01-15', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1395', '', '6', '6-20-68', '5', '2018-02-10', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1396', '', '6', '6-16-18', '5', '2018-02-09', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1397', '', '6', '6-10-2', '5', '2018-02-11', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1398', '', '6', '6-15-9', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1399', '', '6', '6-6-17', '5', '2018-01-27', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1400', '', '6', '6-20-16', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1401', '', '6', '6-20-12', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1402', '', '6', '6-1-6', '5', '2018-02-10', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1403', '', '6', '6-15-5', '5', '2017-12-19', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1404', '', '6', '6-20-3', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1405', '', '6', '6-20-32', '5', '2018-01-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1406', '', '6', '6-1-2', '5', '2018-01-19', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1407', '', '6', '6-20-88', '5', '2018-01-23', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1408', '', '6', '6-11-3', '5', '2018-01-17', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1409', '', '6', '6-18-2', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1410', '', '6', '6-1-10', '5', '2018-02-08', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1411', '', '6', '6-17-36', '5', '2018-02-18', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1412', '', '6', '6-11-6', '5', '2018-02-28', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1413', '', '6', '6-15-1', '5', '2017-12-24', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1414', '', '6', '6-21-3', '5', '2018-01-28', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1415', '', '6', '6-21-9', '5', '2018-01-26', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1416', '', '6', '6-11-12', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1417', '', '6', '6-20-8', '5', '2017-12-17', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1418', '', '6', '6-11-10', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1419', '', '6', '6-11-2', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1420', '', '6', '6-19-50', '5', '2018-02-04', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1421', '', '6', '6-20-39', '5', '2018-02-10', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1422', '', '6', '6-20-96', '5', '2018-02-11', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1423', '', '6', '6-20-98', '5', '2018-02-09', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1424', '', '6', '6-6-12', '5', '2018-01-28', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1425', '', '6', '6-18-16', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1426', '', '6', '6-2-15', '5', '2018-01-26', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1427', '', '6', '6-2-18', '5', '2018-02-10', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1428', '', '6', '6-2-22', '5', '2018-02-25', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1429', '', '6', '6-15-8', '5', '2018-02-13', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1430', '', '6', '6-16-72', '5', '2018-02-11', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1431', '', '6', '6-16-76', '5', '2018-02-11', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1432', '', '6', '6-20-2', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1433', '', '6', '6-3-2', '5', '2018-02-16', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1434', '', '6', '6-5-15', '5', '2018-02-06', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1435', '', '6', '6-16-30', '5', '2018-02-24', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1436', '', '6', '6-16-36', '5', '2018-02-10', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1437', '', '6', '6-16-52', '5', '2018-02-25', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1438', '', '6', '6-17-17', '5', '2018-01-18', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1439', '', '6', '6-19-2', '5', '2018-02-10', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1440', '', '6', '6-19-6', '5', '2018-02-03', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1441', '', '6', '6-20-36', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1442', '', '6', '6-20-50', '5', '2018-01-23', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1443', '', '6', '6-20-52', '5', '2018-01-21', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1444', '', '6', '6-11-15', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1445', '', '6', '6-9-1', '5', '2018-02-28', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1446', '', '6', '6-9-5', '5', '2018-02-28', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1447', '', '6', '6-9-7', '5', '2018-02-24', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1448', '', '6', '6-17-30', '5', '2018-02-28', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1449', '', '6', '6-18-12', '5', '2018-02-01', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1450', '', '6', '6-18-23', '5', '2018-01-10', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1451', '', '6', '6-20-1', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1452', '', '6', '6-20-5', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1453', '', '6', '6-3-15', '5', '2018-02-10', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1454', '', '6', '6-3-23', '5', '2018-02-09', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1455', '', '6', '6-3-28', '5', '2018-02-06', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1456', '', '6', '6-3-32', '5', '2018-02-25', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1457', '', '6', '6-5-27', '5', '2018-02-18', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1458', '', '6', '6-7-5', '5', '2018-02-28', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1459', '', '6', '6-8-20', '5', '2018-02-09', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1460', '', '6', '6-8-22', '5', '2018-01-21', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1461', '', '6', '6-9-2', '5', '2018-01-21', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1462', '', '6', '6-9-8', '5', '2018-02-11', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1463', '', '6', '6-20-21', '5', '2018-02-17', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1464', '', '6', '6-20-56', '5', '2018-02-10', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1465', '', '6', '6-20-58', '5', '2018-01-04', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1466', '', '6', '6-20-62', '5', '2018-02-01', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1467', '', '6', '6-20-80', '5', '2018-02-02', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1468', '', '6', '6-20-82', '5', '2018-01-27', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1469', '', '6', '6-5-22', '5', '2018-02-10', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1470', '', '6', '6-16-7', '5', '2018-02-10', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1471', '', '6', '6-17-1', '5', '2018-02-18', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1472', '', '6', '6-17-2', '5', '2018-02-27', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1473', '', '6', '6-20-70', '5', '2018-02-24', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1474', '', '6', '6-20-72', '5', '2018-02-10', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1475', '', '6', '6-2-2', '5', '2018-02-18', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1476', '', '6', '6-2-6', '5', '2018-02-18', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1477', '', '6', '6-2-10', '5', '2018-02-10', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1478', '', '6', '6-2-12', '5', '2018-02-19', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1479', '', '6', '6-3-1', '5', '2018-02-11', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1480', '', '6', '6-3-3', '5', '2018-02-18', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1481', '', '6', '6-3-9', '5', '2018-01-24', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1482', '', '6', '6-3-11', '5', '2018-01-21', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1483', '', '6', '6-15-10', '5', '2018-02-14', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1484', '', '6', '6-15-22', '5', '2018-01-31', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1485', '', '6', '6-16-33', '5', '2018-02-25', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1486', '', '6', '6-20-7', '5', '2018-02-18', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1487', '', '6', '6-20-18', '5', '2017-12-29', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1488', '', '6', '6-20-19', '5', '2018-02-08', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1489', '', '6', '6-20-22', '5', '2017-12-28', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1490', '', '6', '6-20-26', '5', '2017-12-20', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');
INSERT INTO `m_unit` VALUES ('1491', '', '6', '6-20-28', '5', '2017-12-27', null, '2018-04-21 10:23:00', '2018-04-22 08:00:00', '1');

-- ----------------------------
-- Table structure for `tr_poin`
-- ----------------------------
DROP TABLE IF EXISTS `tr_poin`;
CREATE TABLE `tr_poin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_member` int(11) NOT NULL,
  `id_fasilitas` int(11) NOT NULL,
  `nilai_poin` int(11) NOT NULL,
  `tgl_dibuat` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_member` (`id_member`),
  KEY `id_fasilitas` (`id_fasilitas`),
  CONSTRAINT `tr_poin_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `m_member` (`id`),
  CONSTRAINT `tr_poin_ibfk_2` FOREIGN KEY (`id_fasilitas`) REFERENCES `m_fasilitas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tr_poin
-- ----------------------------

-- ----------------------------
-- Table structure for `tr_redeem`
-- ----------------------------
DROP TABLE IF EXISTS `tr_redeem`;
CREATE TABLE `tr_redeem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_marcendaise` int(11) NOT NULL,
  `nilai_poin` int(11) NOT NULL,
  `tgl_dibuat` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_member` (`id_member`),
  KEY `tr_redeem_ibfk_1` (`id_unit`),
  CONSTRAINT `tr_redeem_ibfk_1` FOREIGN KEY (`id_unit`) REFERENCES `m_unit` (`id`),
  CONSTRAINT `tr_redeem_ibfk_2` FOREIGN KEY (`id_member`) REFERENCES `m_member` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tr_redeem
-- ----------------------------
