
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- bkpp_agenda_kegiatan
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `bkpp_agenda_kegiatan`;

CREATE TABLE `bkpp_agenda_kegiatan`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `judul` VARCHAR(300) NOT NULL,
    `gambar` VARCHAR(300) NOT NULL,
    `keterangan_gambar` VARCHAR(400),
    `slug` VARCHAR(300),
    `tempat` VARCHAR(300),
    `keterangan` VARCHAR(300) NOT NULL,
    `date` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- bkpp_banner
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `bkpp_banner`;

CREATE TABLE `bkpp_banner`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `gambar` VARCHAR(300),
    `judul` VARCHAR(300) DEFAULT '',
    `keterangan` TEXT,
    `publish` INTEGER(1) DEFAULT 1,
    `date` DATE,
    `link` VARCHAR(255),
    `cat` VARCHAR(255) NOT NULL,
    `value` VARCHAR(255),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- bkpp_buku_tamu
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `bkpp_buku_tamu`;

CREATE TABLE `bkpp_buku_tamu`
(
    `id` INTEGER(5) NOT NULL AUTO_INCREMENT,
    `nama` VARCHAR(80) NOT NULL,
    `email` VARCHAR(80) NOT NULL,
    `isi` TEXT NOT NULL,
    `jawaban` TEXT NOT NULL,
    `publish` INTEGER DEFAULT 1 NOT NULL,
    `tanggal` DATETIME,
    `tanggal_dijawab` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- bkpp_content_label
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `bkpp_content_label`;

CREATE TABLE `bkpp_content_label`
(
    `kode_label` INTEGER(5) DEFAULT 0 NOT NULL,
    `kode_content` INTEGER(5) DEFAULT 0 NOT NULL,
    PRIMARY KEY (`kode_label`,`kode_content`),
    INDEX `kode_label` (`kode_label`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- bkpp_download
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `bkpp_download`;

CREATE TABLE `bkpp_download`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `judul` VARCHAR(100) NOT NULL,
    `keterangan` TEXT,
    `file` VARCHAR(100) NOT NULL,
    `kategori` VARCHAR(20) NOT NULL,
    `uploader` VARCHAR(100) NOT NULL,
    `date` DATE,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- bkpp_galery_image_items
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `bkpp_galery_image_items`;

CREATE TABLE `bkpp_galery_image_items`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `galery_id` INTEGER NOT NULL,
    `file` VARCHAR(300),
    `judul` VARCHAR(300) DEFAULT '',
    `keterangan` TEXT,
    `tgl_dibuat` DATE,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- bkpp_galery_images
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `bkpp_galery_images`;

CREATE TABLE `bkpp_galery_images`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `slug` VARCHAR(300),
    `judul` VARCHAR(300) DEFAULT '' NOT NULL,
    `keterangan` TEXT NOT NULL,
    `tgl_dibuat` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- bkpp_galery_video_items
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `bkpp_galery_video_items`;

CREATE TABLE `bkpp_galery_video_items`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `galery_id` INTEGER NOT NULL,
    `judul` VARCHAR(300) DEFAULT '' NOT NULL,
    `url` VARCHAR(300) NOT NULL,
    `keterangan` TEXT NOT NULL,
    `tgl_dibuat` DATE,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- bkpp_galery_videos
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `bkpp_galery_videos`;

CREATE TABLE `bkpp_galery_videos`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `judul` VARCHAR(300) DEFAULT '' NOT NULL,
    `keterangan` TEXT NOT NULL,
    `tgl_dibuat` DATE,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- bkpp_info_dinas
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `bkpp_info_dinas`;

CREATE TABLE `bkpp_info_dinas`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `slug` VARCHAR(300),
    `judul` VARCHAR(300),
    `gambar` VARCHAR(300),
    `keterangan_gambar` VARCHAR(300),
    `isi` LONGTEXT,
    `file` VARCHAR(300),
    `date` DATE,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- bkpp_konsultasi
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `bkpp_konsultasi`;

CREATE TABLE `bkpp_konsultasi`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `pengirim` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `pertanyaan` TEXT NOT NULL,
    `untuk` VARCHAR(5) NOT NULL,
    `jawaban` TEXT NOT NULL,
    `publish` INTEGER(1) DEFAULT 1,
    `tanggal` DATETIME,
    `tanggal_dijawab` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- bkpp_layanan
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `bkpp_layanan`;

CREATE TABLE `bkpp_layanan`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `kategori` VARCHAR(25),
    `slug` VARCHAR(225),
    `judul` VARCHAR(225),
    `konten` TEXT,
    `date` DATE,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- bkpp_links
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `bkpp_links`;

CREATE TABLE `bkpp_links`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `judul` VARCHAR(300),
    `url` VARCHAR(300),
    `gambar` VARCHAR(300),
    `keterangan` VARCHAR(300),
    `date` DATE,
    `order` INTEGER(3),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- bkpp_pengumuman
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `bkpp_pengumuman`;

CREATE TABLE `bkpp_pengumuman`
(
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `date` DATE NOT NULL,
    `text` TEXT,
    `publish` INTEGER(1) DEFAULT 1,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- bkpp_profile
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `bkpp_profile`;

CREATE TABLE `bkpp_profile`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `kategori` VARCHAR(25),
    `slug` VARCHAR(225),
    `gambar` VARCHAR(500),
    `judul` VARCHAR(225),
    `konten` LONGTEXT,
    `date` DATETIME,
    `hide_gambar` INTEGER(1) DEFAULT 0,
    `keterangan_gambar` VARCHAR(225),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- blog_article
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `blog_article`;

CREATE TABLE `blog_article`
(
    `article_id` INTEGER(20) NOT NULL AUTO_INCREMENT,
    `article_title` VARCHAR(100),
    `article_url` VARCHAR(100),
    `keyword` VARCHAR(100),
    `description` TEXT,
    `date` DATETIME,
    `author_user_id` INTEGER(20),
    `content` TEXT,
    `allow_comment` INTEGER(20),
    `file` VARCHAR(300),
    `view` INTEGER,
    `alt_image` VARCHAR(300),
    PRIMARY KEY (`article_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- blog_category
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `blog_category`;

CREATE TABLE `blog_category`
(
    `category_id` INTEGER(20) NOT NULL AUTO_INCREMENT,
    `category_name` VARCHAR(50),
    `description` TEXT,
    `invalid` INTEGER DEFAULT 0,
    `rplc` INTEGER,
    PRIMARY KEY (`category_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- blog_category_article
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `blog_category_article`;

CREATE TABLE `blog_category_article`
(
    `category_article_id` INTEGER(20) NOT NULL AUTO_INCREMENT,
    `category_id` INTEGER(20),
    `article_id` INTEGER(20),
    PRIMARY KEY (`category_article_id`),
    INDEX `category_id` (`category_id`),
    INDEX `blog_category_article_ibfk_1` (`article_id`),
    CONSTRAINT `blog_category_article_ibfk_1`
        FOREIGN KEY (`article_id`)
        REFERENCES `blog_article` (`article_id`)
        ON DELETE CASCADE,
    CONSTRAINT `blog_category_article_ibfk_2`
        FOREIGN KEY (`category_id`)
        REFERENCES `blog_category` (`category_id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- blog_comment
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `blog_comment`;

CREATE TABLE `blog_comment`
(
    `comment_id` INTEGER(20) NOT NULL AUTO_INCREMENT,
    `article_id` INTEGER(20),
    `date` DATETIME,
    `author_user_id` INTEGER(20),
    `name` VARCHAR(50),
    `email` VARCHAR(50),
    `website` VARCHAR(50),
    `content` TEXT,
    PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- blog_photo
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `blog_photo`;

CREATE TABLE `blog_photo`
(
    `photo_id` INTEGER(20) NOT NULL AUTO_INCREMENT,
    `article_id` INTEGER(10) NOT NULL,
    `url` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`photo_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ci_sessions
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions`
(
    `session_id` VARCHAR(50) NOT NULL,
    `ip_address` VARCHAR(16) NOT NULL,
    `user_agent` VARCHAR(120) NOT NULL,
    `last_activity` INTEGER(20) NOT NULL,
    `user_data` TEXT,
    PRIMARY KEY (`session_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- history
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `history`;

CREATE TABLE `history`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `cat` VARCHAR(255),
    `val` VARCHAR(255),
    `ipaddr` VARCHAR(30) NOT NULL,
    `cx` INTEGER DEFAULT 1,
    `date` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- main_authorization
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `main_authorization`;

CREATE TABLE `main_authorization`
(
    `authorization_id` INTEGER(20) NOT NULL AUTO_INCREMENT,
    `authorization_name` VARCHAR(50) NOT NULL,
    `description` TEXT,
    PRIMARY KEY (`authorization_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- main_config
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `main_config`;

CREATE TABLE `main_config`
(
    `config_id` INTEGER(20) NOT NULL AUTO_INCREMENT,
    `config_name` VARCHAR(50) NOT NULL,
    `value` TEXT,
    `description` TEXT,
    PRIMARY KEY (`config_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- main_group
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `main_group`;

CREATE TABLE `main_group`
(
    `group_id` INTEGER(20) NOT NULL AUTO_INCREMENT,
    `group_name` VARCHAR(50) NOT NULL,
    `description` TEXT,
    PRIMARY KEY (`group_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- main_group_navigation
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `main_group_navigation`;

CREATE TABLE `main_group_navigation`
(
    `id` INTEGER(20) NOT NULL AUTO_INCREMENT,
    `group_id` INTEGER(5) NOT NULL,
    `navigation_id` INTEGER(5) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- main_group_privilege
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `main_group_privilege`;

CREATE TABLE `main_group_privilege`
(
    `id` INTEGER(20) NOT NULL AUTO_INCREMENT,
    `group_id` INTEGER(5) NOT NULL,
    `privilege_id` INTEGER(5) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- main_group_user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `main_group_user`;

CREATE TABLE `main_group_user`
(
    `id` INTEGER(20) NOT NULL AUTO_INCREMENT,
    `group_id` INTEGER(5) NOT NULL,
    `user_id` INTEGER(5) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- main_group_widget
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `main_group_widget`;

CREATE TABLE `main_group_widget`
(
    `id` INTEGER(20) NOT NULL AUTO_INCREMENT,
    `group_id` INTEGER(5) NOT NULL,
    `widget_id` INTEGER(5) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- main_module
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `main_module`;

CREATE TABLE `main_module`
(
    `module_id` INTEGER(20) NOT NULL AUTO_INCREMENT,
    `module_name` VARCHAR(50) NOT NULL,
    `module_path` VARCHAR(100) NOT NULL,
    `version` VARCHAR(50),
    `user_id` INTEGER(5),
    PRIMARY KEY (`module_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- main_module_dependency
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `main_module_dependency`;

CREATE TABLE `main_module_dependency`
(
    `module_dependency_id` INTEGER(20) NOT NULL AUTO_INCREMENT,
    `module_id` INTEGER(5) NOT NULL,
    `parent_id` INTEGER(5) NOT NULL,
    PRIMARY KEY (`module_dependency_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- main_navigation
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `main_navigation`;

CREATE TABLE `main_navigation`
(
    `navigation_id` INTEGER(20) NOT NULL AUTO_INCREMENT,
    `navigation_name` VARCHAR(50) NOT NULL,
    `parent_id` INTEGER(5),
    `title` VARCHAR(50) NOT NULL,
    `bootstrap_glyph` VARCHAR(50),
    `page_title` VARCHAR(50),
    `page_keyword` VARCHAR(100),
    `description` TEXT,
    `url` VARCHAR(100),
    `authorization_id` INTEGER(5) DEFAULT 1 NOT NULL,
    `active` INTEGER(5) DEFAULT 1 NOT NULL,
    `index` INTEGER(5) DEFAULT 0 NOT NULL,
    `is_static` INTEGER(5) DEFAULT 0 NOT NULL,
    `static_content` TEXT,
    `only_content` INTEGER(5) DEFAULT 0 NOT NULL,
    `default_theme` VARCHAR(50),
    `default_layout` VARCHAR(50),
    PRIMARY KEY (`navigation_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- main_privilege
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `main_privilege`;

CREATE TABLE `main_privilege`
(
    `privilege_id` INTEGER(20) NOT NULL AUTO_INCREMENT,
    `privilege_name` VARCHAR(50) NOT NULL,
    `title` VARCHAR(50) NOT NULL,
    `description` TEXT,
    `authorization_id` INTEGER(5) DEFAULT 1 NOT NULL,
    PRIMARY KEY (`privilege_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- main_quicklink
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `main_quicklink`;

CREATE TABLE `main_quicklink`
(
    `quicklink_id` INTEGER(20) NOT NULL AUTO_INCREMENT,
    `navigation_id` INTEGER(5) NOT NULL,
    `index` INTEGER(5) DEFAULT 0 NOT NULL,
    PRIMARY KEY (`quicklink_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- main_user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `main_user`;

CREATE TABLE `main_user`
(
    `user_id` INTEGER(20) NOT NULL AUTO_INCREMENT,
    `user_name` VARCHAR(50) NOT NULL,
    `email` VARCHAR(50),
    `password` VARCHAR(255),
    `activation_code` VARCHAR(50),
    `real_name` VARCHAR(100),
    `active` INTEGER(5) DEFAULT 1 NOT NULL,
    `auth_OpenID` VARCHAR(100),
    `auth_Facebook` VARCHAR(100),
    `auth_Twitter` VARCHAR(100),
    `auth_Yahoo` VARCHAR(100),
    `auth_LinkedIn` VARCHAR(100),
    `auth_MySpace` VARCHAR(100),
    `auth_Foursquare` VARCHAR(100),
    `auth_AOL` VARCHAR(100),
    `auth_Live` VARCHAR(100),
    PRIMARY KEY (`user_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- main_widget
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `main_widget`;

CREATE TABLE `main_widget`
(
    `widget_id` INTEGER(20) NOT NULL AUTO_INCREMENT,
    `widget_name` VARCHAR(50) NOT NULL,
    `title` VARCHAR(50),
    `description` TEXT,
    `url` VARCHAR(100),
    `authorization_id` INTEGER(5) DEFAULT 1 NOT NULL,
    `active` INTEGER(5) DEFAULT 1 NOT NULL,
    `index` INTEGER(5) DEFAULT 0 NOT NULL,
    `is_static` INTEGER(5) DEFAULT 0 NOT NULL,
    `static_content` TEXT,
    `slug` VARCHAR(100),
    PRIMARY KEY (`widget_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- polling_data
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `polling_data`;

CREATE TABLE `polling_data`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `parent` INTEGER,
    `value` INTEGER(4),
    `ip` VARCHAR(30),
    `date` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- pollings
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `pollings`;

CREATE TABLE `pollings`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `judul` TEXT,
    `date` DATE,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- related
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `related`;

CREATE TABLE `related`
(
    `jd` INTEGER NOT NULL AUTO_INCREMENT,
    `cat` VARCHAR(100),
    `pk` INTEGER,
    `rpk` INTEGER,
    `date` DATETIME,
    PRIMARY KEY (`jd`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- shares
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shares`;

CREATE TABLE `shares`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `t` INTEGER,
    `hash` VARCHAR(255),
    `cx` BIGINT,
    `ts` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
