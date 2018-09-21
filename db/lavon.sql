-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: rumahapp.com    Database: lavon
-- ------------------------------------------------------
-- Server version	5.5.44-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(50) NOT NULL,
  `ip_address` varchar(16) NOT NULL,
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(20) NOT NULL,
  `user_data` text,
  PRIMARY KEY (`session_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('bade96e5532a6bba8f10584446d00521','::1','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36',1525687458,'a:6:{s:8:\"cms_lang\";s:10:\"indonesian\";s:13:\"popup_session\";b:1;s:13:\"cms_user_name\";s:10:\"superadmin\";s:11:\"cms_user_id\";s:1:\"8\";s:18:\"cms_user_real_name\";s:13:\"Putra Budiman\";s:14:\"cms_user_email\";s:20:\"cristminix@gmail.com\";}'),('8bcd8e4514f918ad160d062b1cdc8fa4','120.188.7.177','Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36',1537504697,'a:1:{s:8:\"cms_lang\";s:10:\"indonesian\";}'),('b0f4eec9561f4b451ebd8044c2082c50','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36',1537510228,'a:1:{s:8:\"cms_lang\";s:10:\"indonesian\";}');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `main_authorization`
--

DROP TABLE IF EXISTS `main_authorization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `main_authorization` (
  `authorization_id` int(20) NOT NULL AUTO_INCREMENT,
  `authorization_name` varchar(50) NOT NULL,
  `description` text,
  PRIMARY KEY (`authorization_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `main_authorization`
--

LOCK TABLES `main_authorization` WRITE;
/*!40000 ALTER TABLE `main_authorization` DISABLE KEYS */;
INSERT INTO `main_authorization` VALUES (1,'Public','Pengunjung Publik Site'),(2,'Non Group','Publik Namun Yang Tidak Login'),(3,'Member Only','Hanya Member Yang Login'),(4,'Roled User','Hanya Member Dengan Role Tertentu'),(5,'Admin','Admin atau Teller'),(6,'Super User','Super User (spv)');
/*!40000 ALTER TABLE `main_authorization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `main_config`
--

DROP TABLE IF EXISTS `main_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `main_config` (
  `config_id` int(20) NOT NULL AUTO_INCREMENT,
  `config_name` varchar(50) NOT NULL,
  `value` text,
  `description` text,
  PRIMARY KEY (`config_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `main_config`
--

LOCK TABLES `main_config` WRITE;
/*!40000 ALTER TABLE `main_config` DISABLE KEYS */;
INSERT INTO `main_config` VALUES (1,'site_name','BKPP','Site title'),(2,'site_slogan','BKPP Tangerang Selatan','Site slogan'),(5,'site_footer','Situs BKPP Tangerang &copy; 2017','Site footer'),(6,'site_theme','neutral','Site theme'),(7,'site_layout','default','Site layout'),(8,'site_language','indonesian','Site language'),(9,'max_menu_depth','5','Depth of menu recursive'),(10,'cms_email_reply_address','no-reply@bkpp.tangerangselatan.go.id','Email address'),(11,'cms_email_reply_name','BKPP Tangsel','Email name'),(12,'cms_email_forgot_subject','Re-activate your account at BKPP','Email subject sent when user forgot his/her password'),(13,'cms_email_forgot_message','Dear, {{ user_real_name }}<br />Click <a href=\"{{ site_url }}main/forgot/{{ activation_code }}\">{{ site_url }}main/forgot/{{ activation_code }}</a> to reactivate your account','Email message sent when user forgot his/her password'),(14,'cms_email_signup_subject','Aktifkan akun anda.','Email subject sent to activate user'),(15,'cms_email_signup_message','Dear, {{ user_real_name }}<br />Click <a href=\"{{ site_url }}main/activate/{{ activation_code }}\">{{ site_url }}main/activate/{{ activation_code }}</a> to activate your account','Email message sent to activate user'),(16,'cms_signup_activation','FALSE','Send activation email to new member. Default : false, Alternatives : true, false'),(17,'cms_email_useragent','Codeigniter','Default : CodeIgniter'),(18,'cms_email_protocol','smtp','Default : smtp, Alternatives : mail, sendmail, smtp'),(19,'cms_email_mailpath','/usr/sbin/sendmail','Default : /usr/sbin/sendmail'),(20,'cms_email_smtp_host','ssl://smtp.googlemail.com','SMTP SERVER'),(21,'cms_email_smtp_user','bkpp.tangsel@gmail.com','EMAIL FOR SMTP'),(22,'cms_email_smtp_pass','eHBFRm5wMW1PWWFIbU1uTWJLSTllUT09','Encrypted Email Password'),(23,'cms_email_smtp_port','465','smtp port, default : 465'),(24,'cms_email_smtp_timeout','30','default : 30'),(25,'cms_email_wordwrap','TRUE','Enable word-wrap. Default : true, Alternatives : true, false'),(26,'cms_email_wrapchars','76','Character count to wrap at.'),(27,'cms_email_mailtype','html','Type of mail. If you send HTML email you must send it as a complete web page. Make sure you do not have any relative links or relative image paths otherwise they will not work. Default : html, Alternatives : html, text'),(28,'cms_email_charset','utf-8','Character set (utf-8, iso-8859-1, etc.).'),(29,'cms_email_validate','FALSE','Whether to validate the email address. Default: true, Alternatives : true, false'),(30,'cms_email_priority','3','1, 2, 3, 4, 5  Email Priority. 1 = highest. 5 = lowest. 3 = normal.'),(31,'cms_email_bcc_batch_mode','FALSE','Enable BCC Batch Mode. Default: false, Alternatives: true'),(32,'cms_email_bcc_batch_size','200','Number of emails in each BCC batch.'),(33,'cms_google_analytic_property_id','','Google analytics property ID (e.g: UA-30285787-1) '),(34,'general_default_group','5',NULL);
/*!40000 ALTER TABLE `main_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `main_group`
--

DROP TABLE IF EXISTS `main_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `main_group`
--

LOCK TABLES `main_group` WRITE;
/*!40000 ALTER TABLE `main_group` DISABLE KEYS */;
INSERT INTO `main_group` VALUES (1,'Super Admin','Super Admin dapat mengakses seluruh modul situs',1,'2018-05-07 17:00:25','superadmin','2018-05-07 17:00:25','superadmin',0),(2,'Admin','Admin Website',1,'0000-00-00 00:00:00','','0000-00-00 00:00:00','',0),(3,'Penulis Konten','HAnya diperbolehkan untuk menulis dan mengubah konten',1,'0000-00-00 00:00:00','','0000-00-00 00:00:00','',0),(4,'test',NULL,1,'2018-05-07 16:55:39','superadmin','2018-05-07 16:55:39','superadmin',0);
/*!40000 ALTER TABLE `main_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `main_group_navigation`
--

DROP TABLE IF EXISTS `main_group_navigation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `main_group_navigation` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `group_id` int(5) NOT NULL,
  `navigation_id` int(5) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `main_group_navigation`
--

LOCK TABLES `main_group_navigation` WRITE;
/*!40000 ALTER TABLE `main_group_navigation` DISABLE KEYS */;
INSERT INTO `main_group_navigation` VALUES (1,1,45),(2,2,41),(3,1,41);
/*!40000 ALTER TABLE `main_group_navigation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `main_group_privilege`
--

DROP TABLE IF EXISTS `main_group_privilege`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `main_group_privilege` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `group_id` int(5) NOT NULL,
  `privilege_id` int(5) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `main_group_privilege`
--

LOCK TABLES `main_group_privilege` WRITE;
/*!40000 ALTER TABLE `main_group_privilege` DISABLE KEYS */;
/*!40000 ALTER TABLE `main_group_privilege` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `main_group_user`
--

DROP TABLE IF EXISTS `main_group_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `main_group_user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `group_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `main_group_user`
--

LOCK TABLES `main_group_user` WRITE;
/*!40000 ALTER TABLE `main_group_user` DISABLE KEYS */;
INSERT INTO `main_group_user` VALUES (1,1,1),(2,2,2);
/*!40000 ALTER TABLE `main_group_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `main_group_widget`
--

DROP TABLE IF EXISTS `main_group_widget`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `main_group_widget` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `group_id` int(5) NOT NULL,
  `widget_id` int(5) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `main_group_widget`
--

LOCK TABLES `main_group_widget` WRITE;
/*!40000 ALTER TABLE `main_group_widget` DISABLE KEYS */;
/*!40000 ALTER TABLE `main_group_widget` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `main_module`
--

DROP TABLE IF EXISTS `main_module`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `main_module` (
  `module_id` int(20) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(50) NOT NULL,
  `module_path` varchar(100) NOT NULL,
  `version` varchar(50) DEFAULT NULL,
  `user_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`module_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `main_module`
--

LOCK TABLES `main_module` WRITE;
/*!40000 ALTER TABLE `main_module` DISABLE KEYS */;
INSERT INTO `main_module` VALUES (1,'artisan','artisan','1.0',1);
/*!40000 ALTER TABLE `main_module` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `main_module_dependency`
--

DROP TABLE IF EXISTS `main_module_dependency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `main_module_dependency` (
  `module_dependency_id` int(20) NOT NULL AUTO_INCREMENT,
  `module_id` int(5) NOT NULL,
  `parent_id` int(5) NOT NULL,
  PRIMARY KEY (`module_dependency_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `main_module_dependency`
--

LOCK TABLES `main_module_dependency` WRITE;
/*!40000 ALTER TABLE `main_module_dependency` DISABLE KEYS */;
/*!40000 ALTER TABLE `main_module_dependency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `main_navigation`
--

DROP TABLE IF EXISTS `main_navigation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `main_navigation`
--

LOCK TABLES `main_navigation` WRITE;
/*!40000 ALTER TABLE `main_navigation` DISABLE KEYS */;
INSERT INTO `main_navigation` VALUES (1,'main_login',NULL,'Login','glyphicon-home','Login',NULL,'Visitor need to login for authentication','main/login',2,1,3,0,NULL,0,NULL,'default-one-column'),(2,'main_forgot',NULL,'Lupa Password','glyphicon-th-large','Forgot',NULL,'Accidentally forgot password','main/forgot',2,0,6,0,NULL,0,NULL,NULL),(3,'main_logout',NULL,'Logout','glyphicon-th-large','Logout',NULL,'Logout for deauthentication','main/logout',3,1,5,0,NULL,0,NULL,NULL),(4,'main_management',NULL,'Dashboard','glyphicon-th-large','Dashboard',NULL,'Dashboard','main/management',4,1,8,0,NULL,0,NULL,NULL),(5,'main_register',NULL,'Register','glyphicon-th-large','Register',NULL,'New User Registration','main/register',2,0,7,0,NULL,0,NULL,NULL),(6,'main_change_profile',NULL,'Profile','glyphicon-th-large','Profil',NULL,'Change Current Profile','main/change_profile',3,1,9,0,NULL,0,NULL,NULL),(7,'main_group_management',4,'Group','glyphicon-th-large','Group',NULL,'Group','main/group',4,1,0,0,NULL,0,NULL,NULL),(8,'main_navigation_management',4,'Menu','glyphicon-th-large','Pengaturan Menu',NULL,'Pengaturan Menu','main/navigation',4,1,3,0,NULL,0,NULL,NULL),(9,'main_privilege_management',4,'Role','glyphicon-th-large','Role',NULL,'Pengaturan Role','main/privilege',4,1,2,0,NULL,0,NULL,NULL),(10,'main_user_management',4,'User','glyphicon-th-large','User',NULL,'Manage User','main/user',4,1,1,0,NULL,0,NULL,NULL),(11,'main_module_management',4,'Module','glyphicon-th-large','Module',NULL,'Kelola Module','main/module_management',4,1,5,0,NULL,0,NULL,NULL),(13,'main_widget_management',4,'Widget','glyphicon-th-large','Widget',NULL,'Kelola Widget','main/widget',4,1,4,0,NULL,0,NULL,NULL),(14,'main_quicklink_management',4,'Link','glyphicon-th-large','Link',NULL,'Kelola Link','main/quicklink',4,1,7,0,NULL,0,NULL,NULL),(15,'main_config_management',4,'Variabel','glyphicon-th-large','Variabel',NULL,'Manage Variabel','main/config',4,1,8,0,NULL,0,NULL,NULL),(16,'main_layout',4,'Layout','glyphicon-th-large','Layout',NULL,'Pengaturan Layout','main/layout',4,1,9,0,NULL,0,NULL,NULL),(17,'homepage_beranda',NULL,'Home','glyphicon-home','Selamat Datang di Web BKPP Kota Tangerang Selatan',NULL,'Website resmin BKPP kota Tangerang Selatan','homepage/beranda',1,1,1,0,'<style type=\"text/css\">body{\r\nbackground-image: -webkit-gradient(linear, left top, right bottom, color-stop(0, white), color-stop(1, white))!important;\r\nbackground-image: -webkit-linear-gradient(top left, white 0%, white 100%)!important;\r\nbackground-image: linear-gradient(top left, white 0%, white 100%)!important;\r\n}\r\n#__section-left-and-content {\r\nbackground-image: -ms-linear-gradient(top left, #EEEEEE 0%, #EEEEEE 100%)!important;\r\nbackground-image: -moz-linear-gradient(top left, #EEEEEE 0%, #EEEEEE 100%)!important;\r\nbackground-image: -o-linear-gradient(top left, #EEEEEE 0%, #EEEEEE 100%)!important;\r\nbackground-image: -webkit-gradient(linear, left top, right bottom, color-stop(0, #EEEEEE), color-stop(1, #EEEEEE))!important;\r\nbackground-image: -webkit-linear-gradient(top left, #EEEEEE 0%, #EEEEEE 100%)!important;\r\nbackground-image: linear-gradient(top left, #EEEEEE 0%, #EEEEEE 100%)!important;\r\n}\r\n.thumbnail .caption p{\r\nfont-size:small;\r\n}\r\n.thumbnail{\r\nborder:none!important;\r\nbackground-color:#EEEEEE!important;\r\ntext-align:center;\r\n}\r\n.page-header, .page-header h1{\r\nmargin-top:0px;\r\n}\r\n#__section-left-and-content hr, #__section-left-and-content .breadcrumb{\r\nmargin:0px;\r\n}\r\n#__section-left-and-content p.lead{\r\nmargin-top:20px;\r\n}\r\n</style>\r\n<div class=\"page-header\">\r\n    <h1>Halaman Home</h1></div>\r\n<script type=\"text/javascript\">\r\n    $(window).load(function(){\r\n        function __adjust_component(identifier){\r\n            var max_height = 0;\r\n            $(identifier).each(function(){\r\n                $(this).css(\'margin-bottom\', 0);\r\n                if($(this).height()>max_height){\r\n                    max_height = $(this).height();\r\n                }\r\n            });\r\n            console.log(max_height);\r\n            $(identifier).each(function(){\r\n                var margin_bottom = 0;               \r\n                if($(this).height()<max_height){\r\n                    margin_bottom = max_height - $(this).height();\r\n                    console.log([max_height, $(this).height()]);\r\n                }\r\n                margin_bottom += 10;\r\n                $(this).css(\'margin-bottom\', margin_bottom);\r\n            });\r\n        }\r\n        function adjust_thumbnail(){\r\n            __adjust_component(\'.thumbnail img\');\r\n            __adjust_component(\'.thumbnail div.caption\');\r\n        }\r\n        adjust_thumbnail();\r\n\r\n        // resize\r\n        $(window).resize(function(){\r\n            adjust_thumbnail();\r\n        });\r\n    });\r\n</script>',0,NULL,'homepage'),(19,'main_third_party_auth',NULL,'Third Party Authentication','glyphicon-th-large','Third Party Authentication',NULL,'Third Party Authentication','main/hauth/index',1,0,4,0,NULL,0,NULL,NULL),(32,'main_bkpp_layanan',NULL,'Layanan',NULL,'Admin Layanan','-','-','main/bkpp/layanan',3,1,10,0,NULL,0,NULL,'management'),(33,'homepage_layanan',NULL,'Publik Layanan',NULL,'Layanan','-','-','layanan',1,1,11,0,NULL,0,NULL,'homepage'),(34,'homepage_profile',NULL,'Homepage Profile',NULL,'Profile','Profile','Profile','profile',1,1,12,0,NULL,0,NULL,'homepage'),(35,'main_bkpp_profile',NULL,'Admin Profile',NULL,'BKPP Profile','-','-','main/bkpp/profile',3,1,13,0,NULL,0,NULL,'homepage'),(36,'homepage_konten',NULL,'Homepage Konten',NULL,'Konten','-','-','konten',1,1,14,0,NULL,0,NULL,'homepage'),(37,'homepage_pencarian',NULL,'Homepage Pencarian',NULL,'Pencarian','-','-','pencarian',1,1,15,0,NULL,0,NULL,'homepage'),(38,'homepage_buku_tamu',NULL,'Homepage Buku Tamu',NULL,'Buku Tamu','-','-','buku-tamu',1,1,16,0,NULL,0,NULL,'homepage'),(39,'homepage_konsultasi',NULL,'Homepage Konsultasi',NULL,'Konsultasi','-','-','konsultasi',1,1,17,0,NULL,0,NULL,'homepage'),(40,'blog_index',NULL,'Blog','glyphicon-pencil',NULL,NULL,'Blog','blog',1,1,18,0,NULL,0,NULL,NULL),(41,'blog_manage_article',40,'Manage Article',NULL,NULL,NULL,'Add, edit, and delete blog articles','blog/manage_article',4,1,1,0,NULL,0,NULL,NULL),(42,'blog_manage_category',40,'Manage Category',NULL,NULL,NULL,'Add, edit, and delete categories. Each article can has one or more categories','blog/manage_category',4,1,2,0,NULL,0,NULL,NULL),(43,'public_files',NULL,'Public Files',NULL,'Public Files','-','-','files',1,1,19,0,NULL,0,NULL,'homepage'),(45,'admin_area',NULL,'Admin Area',NULL,'Admin Area',NULL,NULL,'admin',4,1,20,0,NULL,0,'neutral','management');
/*!40000 ALTER TABLE `main_navigation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `main_privilege`
--

DROP TABLE IF EXISTS `main_privilege`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `main_privilege` (
  `privilege_id` int(20) NOT NULL AUTO_INCREMENT,
  `privilege_name` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text,
  `authorization_id` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`privilege_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `main_privilege`
--

LOCK TABLES `main_privilege` WRITE;
/*!40000 ALTER TABLE `main_privilege` DISABLE KEYS */;
INSERT INTO `main_privilege` VALUES (1,'cms_install_module','Install Module','Install Module is a very critical privilege, it allow authorized user to Install a module to the CMS.<br />By Installing module, the database structure can be changed. There might be some additional navigation and privileges added.<br /><br />You\'d be better to give this authorization only authenticated and authorized user. (I suggest to make only admin have such a privilege)\r\n&nbsp;',4),(2,'cms_manage_access','Manage Access','Manage access\r\n&nbsp;',4),(3,'admin_menu_read','Admin Menu Management - READ',' - ',1),(4,'admin_menu_insert','Admin Menu Management - INSERT',' - ',1),(5,'admin_menu_update','Admin Menu Management - UPDATE',' - ',1),(6,'admin_menu_remove','Admin Menu Management - REMOVE',' - ',1);
/*!40000 ALTER TABLE `main_privilege` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `main_quicklink`
--

DROP TABLE IF EXISTS `main_quicklink`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `main_quicklink` (
  `quicklink_id` int(20) NOT NULL AUTO_INCREMENT,
  `navigation_id` int(5) NOT NULL,
  `index` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`quicklink_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `main_quicklink`
--

LOCK TABLES `main_quicklink` WRITE;
/*!40000 ALTER TABLE `main_quicklink` DISABLE KEYS */;
INSERT INTO `main_quicklink` VALUES (1,17,0),(2,5,1),(3,2,2),(4,4,3),(5,40,4);
/*!40000 ALTER TABLE `main_quicklink` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `main_user`
--

DROP TABLE IF EXISTS `main_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `main_user`
--

LOCK TABLES `main_user` WRITE;
/*!40000 ALTER TABLE `main_user` DISABLE KEYS */;
INSERT INTO `main_user` VALUES (2,'test1','test@test.com','d15d92b98ab237e2c8a054fe53d0627e',NULL,'test',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(8,'superadmin','cristminix@gmail.com','25d55ad283aa400af464c76d713c07ad',NULL,'Putra Budiman',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0);
/*!40000 ALTER TABLE `main_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `main_widget`
--

DROP TABLE IF EXISTS `main_widget`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `main_widget`
--

LOCK TABLES `main_widget` WRITE;
/*!40000 ALTER TABLE `main_widget` DISABLE KEYS */;
INSERT INTO `main_widget` VALUES (1,'section_custom_script','Script','','',1,1,1,1,'<style type=\"text/css\"></style><script type=\"text/javascript\"></script>',NULL),(2,'section_top_fix','Top Fix Section','','',1,1,1,1,'{{ widget_name:top_navigation }}',NULL),(3,'section_banner','Banner Section','','',1,1,2,1,'<div class=\"jumbotron hidden-xs hidden-sm\" style=\"margin-top:10px;\">\r\n  <img src =\"{{ site_logo }}\" style=\"max-width:20%; float:left; margin-right:10px; margin-bottom:10px;\" />\r\n  <h1>{{ site_name }}</h1>\r\n  <p>{{ site_slogan }}</p>\r\n</div>',NULL),(4,'section_left','Left Section','','',1,1,3,1,'',NULL),(5,'section_right','Right Section','','',1,1,4,1,'{{ widget_slug:sidebar }}<hr />{{ widget_slug:advertisement }}',NULL),(6,'section_bottom','Bottom Section','','',1,1,5,1,'{{ site_footer }}',NULL),(7,'left_navigation','Left Navigation','','main/widget_left_nav',1,1,6,0,NULL,NULL),(8,'top_navigation','Top Navigation','','main/widget_top_nav',1,1,7,0,NULL,NULL),(9,'quicklink','Quicklinks','','main/widget_quicklink',1,1,8,0,NULL,NULL),(10,'login','Login','Visitor need to login for authentication','main/widget_login',2,1,9,0,'<form action=\"{{ site_url }}main/login\" method=\"post\" accept-charset=\"utf-8\"><label>Identity</label><br><input type=\"text\" name=\"identity\" value=\"\"><br><label>Password</label><br><input type=\"password\" name=\"password\" value=\"\"><br><input type=\"submit\" name=\"login\" value=\"Log In\"></form>','sidebar, user_widget'),(11,'logout','User Info','Logout','main/widget_logout',3,1,10,1,'{{ language:Welcome }} {{ user_name }}<br />\r\n<a href=\"{{ site_url }}main/logout\">{{ language:Logout }}</a><br />','sidebar, user_widget'),(12,'social_plugin','Share This Page !!','Addthis','main/widget_social_plugin',1,1,11,1,'<!-- AddThis Button BEGIN -->\r\n<div class=\"addthis_toolbox addthis_default_style \"><a class=\"addthis_button_preferred_1\"></a> <a class=\"addthis_button_preferred_2\"></a> <a class=\"addthis_button_preferred_3\"></a> <a class=\"addthis_button_preferred_4\"></a> <a class=\"addthis_button_preferred_5\"></a> <a class=\"addthis_button_preferred_6\"></a> <a class=\"addthis_button_preferred_7\"></a> <a class=\"addthis_button_preferred_8\"></a> <a class=\"addthis_button_preferred_9\"></a> <a class=\"addthis_button_preferred_10\"></a> <a class=\"addthis_button_preferred_11\"></a> <a class=\"addthis_button_preferred_12\"></a> <a class=\"addthis_button_preferred_13\"></a> <a class=\"addthis_button_preferred_14\"></a> <a class=\"addthis_button_preferred_15\"></a> <a class=\"addthis_button_preferred_16\"></a> <a class=\"addthis_button_compact\"></a> <a class=\"addthis_counter addthis_bubble_style\"></a></div>\r\n<script src=\"http://s7.addthis.com/js/250/addthis_widget.js?domready=1\" type=\"text/javascript\"></script>\r\n<!-- AddThis Button END -->','sidebar'),(13,'google_search','Search','Search from google','',1,0,12,1,'<!-- Google Custom Search Element -->\r\n<div id=\"cse\" style=\"width: 100%;\">Loading</div>\r\n<script src=\"http://www.google.com/jsapi\" type=\"text/javascript\"></script>\r\n<script type=\"text/javascript\">// <![CDATA[\r\n    google.load(\'search\', \'1\');\r\n    google.setOnLoadCallback(function(){var cse = new google.search.CustomSearchControl();cse.draw(\'cse\');}, true);\r\n// ]]></script>','sidebar'),(14,'google_translate','Translate !!','<p>The famous google translate</p>','',1,0,13,1,'<!-- Google Translate Element -->\r\n<div id=\"google_translate_element\" style=\"display:block\"></div>\r\n<script>\r\nfunction googleTranslateElementInit() {\r\n  new google.translate.TranslateElement({pageLanguage: \"af\"}, \"google_translate_element\");\r\n};\r\n</script>\r\n<script src=\"http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit\"></script>\r\n','sidebar'),(15,'calendar','Calendar','Indonesian Calendar','',1,0,14,1,'<!-------Do not change below this line------->\r\n<div align=\"center\" height=\"200px\">\r\n    <iframe align=\"center\" src=\"http://www.calendarlabs.com/calendars/web-content/calendar.php?cid=1001&uid=162232623&c=22&l=en&cbg=C3D9FF&cfg=000000&hfg=000000&hfg1=000000&ct=1&cb=1&cbc=2275FF&cf=verdana&cp=bottom&sw=0&hp=t&ib=0&ibc=&i=\" width=\"170\" height=\"155\" marginwidth=0 marginheight=0 frameborder=no scrolling=no allowtransparency=\'true\'>\r\n    Loading...\r\n    </iframe>\r\n    <div align=\"center\" style=\"width:140px;font-size:10px;color:#666;\">\r\n        Powered by <a  href=\"http://www.calendarlabs.com/\" target=\"_blank\" style=\"font-size:10px;text-decoration:none;color:#666;\">Calendar</a> Labs\r\n    </div>\r\n</div>\r\n\r\n<!-------Do not change above this line------->','sidebar'),(16,'google_map','Map','google map','',1,0,15,1,'<!-- Google Maps Element Code -->\r\n<iframe frameborder=0 marginwidth=0 marginheight=0 border=0 style=\"border:0;margin:0;width:150px;height:250px;\" src=\"http://www.google.com/uds/modules/elements/mapselement/iframe.html?maptype=roadmap&element=true\" scrolling=\"no\" allowtransparency=\"true\"></iframe>','sidebar'),(17,'donate_nocms','Widget Donasi','No-CMS Donation',NULL,1,1,16,1,'Donasi','advertisement'),(18,'navigation_right_partial','top navigation right partial','Right Partial of Top Navigation Bar. Use this when you want to add something like facebook login form',NULL,1,1,17,1,'',NULL),(19,'blog_newest_article','Newest Articles',NULL,'blog/blog_widget/newest',1,1,16,0,NULL,'sidebar'),(20,'blog_article_category','Categories',NULL,'blog/blog_widget/category',1,1,17,0,NULL,'sidebar'),(21,'public_menu','widget_public_menu','widget_public_menu','homepage/widget_public_menu',1,1,18,0,NULL,'widget_public_menu'),(22,'info_dinas_menu','widget_info_dinas_menu','widget_info_dinas_menu','homepage/widget_info_dinas_menu',1,1,19,0,NULL,NULL),(27,'agenda_kegiatan_menu','Widget agenda_kegiatan_menu','Widget agenda_kegiatan_menu','homepage/widget_agenda_kegiatan_menu',1,1,100,0,NULL,NULL),(28,'article_menu','Widget article_menu','Widget article_menu','homepage/widget_article_menu',1,1,100,0,NULL,NULL),(29,'galeri_menu','Widget galeri_menu','Widget galeri_menu','homepage/widget_galeri_menu',1,1,100,0,NULL,NULL),(30,'download_menu','Widget download_menu','Widget download_menu','homepage/widget_download_menu',1,1,100,0,NULL,NULL);
/*!40000 ALTER TABLE `main_widget` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-21 14:38:53
