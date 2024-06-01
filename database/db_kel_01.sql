/*
SQLyog Ultimate v8.55 
MySQL - 5.5.5-10.4.28-MariaDB : Database - proyek
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`proyek` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `proyek`;

/*Table structure for table `announcement_categories` */

DROP TABLE IF EXISTS `announcement_categories`;

CREATE TABLE `announcement_categories` (
  `id_announcement_categories` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(20) NOT NULL DEFAULT 'adminYPA',
  `updated_by` varchar(20) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_announcement_categories`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `announcement_categories` */

insert  into `announcement_categories`(`id_announcement_categories`,`name`,`description`,`created_at`,`updated_at`,`created_by`,`updated_by`,`active`) values ('AC01','Pendidikan','<p>.</p>','2024-05-05 13:49:54','2024-05-27 02:13:00','adminYPA',NULL,1),('AC02','Donasi','<p>Deskripsi</p>','2024-05-22 08:45:19','2024-05-27 02:13:27','adminYPA',NULL,1),('AC03','Kegiatan Siswa','<p>Siswa</p>','2024-05-27 02:13:43','2024-05-27 02:13:43','adminYPA',NULL,1);

/*Table structure for table `announcements` */

DROP TABLE IF EXISTS `announcements`;

CREATE TABLE `announcements` (
  `id_announcements` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `announcement_category_id` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_by` varchar(20) NOT NULL DEFAULT 'adminYPA',
  `updated_by` varchar(20) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_announcements`),
  KEY `announcements_announcement_category_id_foreign` (`announcement_category_id`),
  CONSTRAINT `announcements_announcement_category_id_foreign` FOREIGN KEY (`announcement_category_id`) REFERENCES `announcement_categories` (`id_announcement_categories`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `announcements` */

insert  into `announcements`(`id_announcements`,`title`,`photo`,`location`,`announcement_category_id`,`description`,`created_by`,`updated_by`,`active`,`created_at`,`updated_at`) values ('A01','Donasi Buku untuk Perpustakaan Sekolah','Screenshot 2024-05-05 104641.png','Rumah Yatim Andam Dewi','AC02','<p><p style=\"border: 0px solid rgb(227, 227, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; margin-bottom: 0.5em; margin-top: 0.5em; padding-left: 0.375em;\"></p></p><p style=\"border: 0px solid rgb(227, 227, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; margin-bottom: 0.5em; margin-top: 0.5em; padding-left: 0.375em;\"><ol></ol></p><p style=\"border: 0px solid rgb(227, 227, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; margin: 1.25em 0px;\" class=\"\">Kami membuka program donasi buku untuk perpustakaan sekolah. Bagi Anda yang ingin menyumbangkan buku, baik buku pelajaran maupun buku bacaan, dapat menghubungi bagian administrasi kami. Donasi dibuka sepanjang tahun.</p>','adminYPA',NULL,1,'2024-05-05 13:51:09','2024-05-27 02:52:23'),('A02','Penerimaan Siswa Baru Tahun Ajaran 2024/2025','IMG-20240504-WA0063.jpg','Kantor YPARumahDamai','AC01','<p>Yayasan Pendidikan Anak Rumah Damai membuka pendaftaran siswa baru untuk tahun ajaran 2024/2025. Pendaftaran dibuka mulai 1 Juni 2024 hingga 30 Juli 2024. Untuk informasi lebih lanjut, silakan kunjungi halaman pendaftaran atau hubungi kantor administrasi kami.<br></p>','adminYPA',NULL,1,'2024-05-08 07:37:19','2024-05-27 02:55:14'),('A03','Lomba Cerdas Cermat Antar Sekolah','IMG-20240504-WA0038.jpg','Gedung Serbaguna Balige','AC03','<p>Yayasan Pendidikan Anak Rumah Damai akan mengadakan Lomba Cerdas Cermat antar sekolah pada 20 Agustus 2024. Kami mengundang seluruh siswa untuk berpartisipasi dan menunjukkan kemampuan terbaik mereka. Pendaftaran peserta dibuka mulai 1 Juli 2024.<br></p>','adminYPA',NULL,1,'2024-05-08 07:38:12','2024-05-27 02:57:00'),('A04','Pelatihan Keterampilan Hidup untuk Siswa','IMG-20240504-WA0065.jpg','Rumah Yatim Andam Dewi','AC01','<div><span style=\"font-size: 1rem;\">Kami akan mengadakan pelatihan keterampilan hidup bagi siswa pada 5 Agustus 2024. Pelatihan ini bertujuan untuk membekali siswa dengan keterampilan praktis yang dapat digunakan dalam kehidupan sehari-hari. Pendaftaran dibuka hingga 31 Juli 2024.</span><br></div>','adminYPA',NULL,1,'2024-05-08 07:38:48','2024-05-27 02:59:22'),('A05','Pelatihan Seni','Screenshot 2024-05-05 105015.png','Rumah Yatim Andam Dewi','AC01','<p>Pelatihan seni untuk siswa-siswa sekolah.<br></p>','adminYPA',NULL,1,'2024-05-22 08:45:45','2024-05-27 03:02:47');

/*Table structure for table `child_with_disabilities` */

DROP TABLE IF EXISTS `child_with_disabilities`;

CREATE TABLE `child_with_disabilities` (
  `id_child_with_disabilities` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` enum('Laki-Laki','Perempuan') NOT NULL,
  `date_of_birth` date NOT NULL,
  `date_joined` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(20) NOT NULL DEFAULT 'adminYPA',
  `updated_by` varchar(20) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_child_with_disabilities`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `child_with_disabilities` */

insert  into `child_with_disabilities`(`id_child_with_disabilities`,`name`,`gender`,`date_of_birth`,`date_joined`,`created_at`,`updated_at`,`created_by`,`updated_by`,`active`) values ('CWD01','Joel','Laki-Laki','2011-11-25','2022-12-22','2024-05-15 06:25:51','2024-05-27 01:46:30','adminYPA',NULL,1),('CWD02','Putri Amelia Siahaan','Perempuan','2012-05-22','2022-11-21','2024-05-27 01:47:02','2024-05-27 01:47:02','adminYPA',NULL,1),('CWD03','Raspika Riska Butarbutar','Perempuan','2013-04-21','2022-05-24','2024-05-27 01:47:43','2024-05-27 01:47:43','adminYPA',NULL,1),('CWD04','Dormasi Marito Siahaan','Perempuan','2015-08-13','2022-04-15','2024-05-27 01:48:19','2024-05-27 01:48:19','adminYPA',NULL,1),('CWD05','Benardo Liasta Tarigan','Laki-Laki','2011-09-21','2024-12-25','2024-05-27 01:49:06','2024-05-27 01:49:06','adminYPA',NULL,1);

/*Table structure for table `contact` */

DROP TABLE IF EXISTS `contact`;

CREATE TABLE `contact` (
  `id_contact` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `contact` */

insert  into `contact`(`id_contact`,`name`,`email`,`phone_number`,`message`,`created_by`,`updated_by`,`active`,`created_at`,`updated_at`) values ('C01','Franklyn Aldo Ignatia Lumbantoruan','franklynsihombing2211@gmail.com','085925551916','Halo Aku Franklyn',NULL,NULL,1,'2024-05-05 05:49:53','2024-05-05 05:49:53'),('C02','FRANKLYN','franklynsihombing2211@gmail.com','085925551916','Haloo',NULL,NULL,1,'2024-05-27 12:16:38','2024-05-27 12:16:38');

/*Table structure for table `donates` */

DROP TABLE IF EXISTS `donates`;

CREATE TABLE `donates` (
  `id_donate` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone_number` varchar(255) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `donation_amount` decimal(15,2) DEFAULT NULL,
  `evidence_of_transfer` varchar(255) DEFAULT NULL,
  `Description` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `goods_name` varchar(255) DEFAULT NULL,
  `goods_quantity` int(11) DEFAULT NULL,
  `created_by` varchar(20) NOT NULL DEFAULT 'adminYPA',
  `updated_by` varchar(20) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_donate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `donates` */

insert  into `donates`(`id_donate`,`Name`,`Email`,`Phone_number`,`origin`,`donation_amount`,`evidence_of_transfer`,`Description`,`category`,`goods_name`,`goods_quantity`,`created_by`,`updated_by`,`status`,`created_at`,`updated_at`) values ('D01','Joel','febyanti@gmail.com','08123456789','Parapat','1000000.00','IMG-20240504-WA0033.jpg','Sama sama','money',NULL,NULL,'adminYPA',NULL,0,'2024-05-20 02:48:49','2024-05-22 09:26:35'),('D02','Adi','adi@gmail.com','08123456789','Parapat',NULL,NULL,'Bantuan untuk pendidikan anak-anak.','goods','Alat tulis',12,'adminYPA',NULL,1,'2024-05-27 03:22:05','2024-05-27 03:24:49'),('D03','Fulan','fulan@gmail.com','08765432100','Batang Kuis','1000000.00','Screenshot 2024-03-15 150858.png','Donasi untuk pelatihan seni.','money',NULL,NULL,'adminYPA',NULL,1,'2024-05-27 03:23:55','2024-05-27 03:24:43');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `footer` */

DROP TABLE IF EXISTS `footer`;

CREATE TABLE `footer` (
  `id_footer` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `facebook_url` varchar(255) NOT NULL,
  `instagram_url` varchar(255) NOT NULL,
  `youtube_url` varchar(255) NOT NULL,
  `tiktok_url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_footer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `footer` */

insert  into `footer`(`id_footer`,`about`,`phone_number`,`email`,`facebook_url`,`instagram_url`,`youtube_url`,`tiktok_url`,`created_at`,`updated_at`) values ('F01','<h5 class=\"\" style=\"\"><span style=\"font-family: Arial;\">Wilayah I</span></h5><p><span style=\"text-align: center;\">Desa Lumban Silintong, Kecamatan Balige, Kabupaten Toba,&nbsp;</span><span style=\"text-align: center;\">Provinsi&nbsp;</span><span style=\"text-align: center;\">Sumatera Utara 22312, Indonesia<br></span></p><h5 class=\"\" style=\"\"><span style=\"font-family: Arial;\">Wilayah II</span></h5><p><span style=\"text-align: center;\">Desa Sawah Lamo, Kecamatan Andam Dewi Kabupaten Tapanuli Tengah,&nbsp;</span><span style=\"text-align: center;\">Provinsi Sumatera Utara 22651, Indonesia</span><br></p>','081262945602','yparumahdamai@gmail.com','https://www.facebook.com/profile.php?id=100053673963466&mibextid=ZbWKwL','https://www.instagram.com/yparumahdamai?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==','https://youtube.com/@YPARumahDamai?si=pM1psXMxLX3Jastg','https://www.tiktok.com/@yparumahdamai?_t=8mJdexmqwuQ&_r=1','2024-05-14 06:32:50','2024-05-14 13:17:53');

/*Table structure for table `foundation_data` */

DROP TABLE IF EXISTS `foundation_data`;

CREATE TABLE `foundation_data` (
  `id_foundation_data` varchar(255) NOT NULL,
  `foundation_name` varchar(40) DEFAULT NULL,
  `history` text NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `created_by` varchar(20) NOT NULL DEFAULT 'adminYPA',
  `updated_by` varchar(20) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_foundation_data`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `foundation_data` */

insert  into `foundation_data`(`id_foundation_data`,`foundation_name`,`history`,`visi`,`misi`,`created_by`,`updated_by`,`active`,`created_at`,`updated_at`) values ('FD01','Yayasan Pendidikan Anak Rumah Damai','<p></p><div style=\"text-align: justify;\"><div style=\"text-align: left;\"><span style=\"font-size: 1rem;\">Yayasan Pendidikan Anak Rumah Damai atau</span><br></div><div style=\"text-align: left;\">yang sering dikenal masyarakat adalah</div><div style=\"text-align: left;\">Rumah Damai berdiri pada tanggal 25</div><div style=\"text-align: left;\">Januari 2022 yang dahulu bernama</div><div style=\"text-align: left;\">Komunitas Rumah Dame. Komunitas ini</div><div style=\"text-align: left;\">dimulai dari sebuah desa di pinggiran Danau</div><div style=\"text-align: left;\">Toba yaitu Desa Lumban Silintong dengan</div><div style=\"text-align: left;\">mengajak anak-anak di desa tersebut. Pada</div><div style=\"text-align: left;\">11 Maret 2023, komunitas Rumah Dame resmi</div><div style=\"text-align: left;\">terdaftar di Kemenkuham dengan SK</div><div style=\"text-align: left;\">Pendirian nomor AHU-004325.AH.01.04.Tahun</div><div style=\"text-align: left;\">2023 dan berubah nama menjadi Yayasan</div><div style=\"text-align: left;\">Pendidikan Anak Rumah Damai.</div></div><p></p>','<p>Mewujudnyatakan kedamaian bagi setiap anak<br></p>','<p>Memberikan pendidikan kreatif dan kontekstual kepada anak</p><p>Memberikan ruang kepada setiap anak untuk mengespresikan dirinya melalui kemampuan yang di miliki</p><p>Memberikan ruang bagi setiap anak untuk sharing setiap aspek-aspek kehidupan yang terjadi dalam kehidupannya</p>','adminYPA',NULL,1,'2024-05-05 15:52:31','2024-05-22 09:01:46');

/*Table structure for table `galleries` */

DROP TABLE IF EXISTS `galleries`;

CREATE TABLE `galleries` (
  `id_galleries` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_by` varchar(20) NOT NULL DEFAULT 'adminYPA',
  `updated_by` varchar(20) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_galleries`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `galleries` */

insert  into `galleries`(`id_galleries`,`title`,`description`,`photo`,`created_by`,`updated_by`,`active`,`created_at`,`updated_at`) values ('G01','Perayaan Hari Anak Nasional 2022: Rumah Dame Mempererat Kebudayaan Batak di Bukit Pahoda','<p><span style=\"line-height: 107%;\">Pada\r\nMinggu, 11 September 2022, Rumah Dame Lumban Silintong mengadakan sebuah acara\r\nistimewa yang diisi dengan wisata kebudayaan bagi anak-anak mereka menuju\r\nMuseum TB Silalahi</span><br></p>','IMG-20240504-WA0034.jpg','adminYPA',NULL,1,'2024-05-05 22:48:31','2024-05-22 11:59:30'),('G02','.','<p>.</p>','IMG-20240504-WA0055.jpg','adminYPA',NULL,1,'2024-05-05 22:48:52','2024-05-05 22:48:52'),('G03','Perayaan Hari Anak Nasional 2022: Rumah Dame Mempererat Kebudayaan Batak di Bukit Pahoda','<p><span style=\"line-height: 107%;\">Perayaan\r\nHari Anak Nasional 2022: Rumah Dame Mempererat Kebudayaan Batak di Bukit Pahoda</span><br></p>','IMG-20240504-WA0054.jpg','adminYPA',NULL,1,'2024-05-27 03:05:35','2024-05-27 03:05:35'),('G04','Perayaan Hari Anak Nasional 2022: Rumah Dame Mempererat Kebudayaan Batak di Bukit Pahoda','<p><span style=\"line-height: 107%;\">Perayaan\r\nHari Anak Nasional 2022: Rumah Dame Mempererat Kebudayaan Batak di Bukit Pahoda</span><br></p>','IMG-20240504-WA0041.jpg','adminYPA',NULL,1,'2024-05-27 03:06:26','2024-05-27 03:06:26');

/*Table structure for table `hero_sections` */

DROP TABLE IF EXISTS `hero_sections`;

CREATE TABLE `hero_sections` (
  `id_hero_sections` varchar(255) NOT NULL,
  `header` varchar(255) NOT NULL,
  `paragraph` text NOT NULL,
  `created_by` varchar(20) NOT NULL DEFAULT 'adminYPA',
  `updated_by` varchar(20) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_hero_sections`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `hero_sections` */

insert  into `hero_sections`(`id_hero_sections`,`header`,`paragraph`,`created_by`,`updated_by`,`active`,`created_at`,`updated_at`) values ('HS01','Yayasan Pendidikan Anak Rumah Damai','<p><font color=\"#f7f7f7\"><span data-metadata=\"<!--(figmeta)eyJmaWxlS2V5IjoiZTdub3d2bUp1bFJjckZ4MjdHQlJVUiIsInBhc3RlSUQiOjEzODIxNzk0MzIsImRhdGFUeXBlIjoic2NlbmUifQo=(/figmeta)-->\" style=\"\"></span><span data-buffer=\"<!--(figma)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(/figma)-->\" style=\"\"></span>Yayasan pendidikan Anak Rumah Damai adalah komunitas yang dimulai dari sebuah desa di pinggiran Danau Toba yaitu Desa Lumban Silintong dengan mengajak anak-anak di desa tersebut.</font><br></p>','adminYPA',NULL,1,'2024-05-05 15:53:24','2024-05-27 08:07:26');

/*Table structure for table `informal_school_child` */

DROP TABLE IF EXISTS `informal_school_child`;

CREATE TABLE `informal_school_child` (
  `id_informal_school_child` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` enum('Laki-Laki','Perempuan') NOT NULL,
  `date_of_birth` date NOT NULL,
  `date_joined` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(20) NOT NULL DEFAULT 'adminYPA',
  `updated_by` varchar(20) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_informal_school_child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `informal_school_child` */

insert  into `informal_school_child`(`id_informal_school_child`,`name`,`gender`,`date_of_birth`,`date_joined`,`created_at`,`updated_at`,`created_by`,`updated_by`,`active`) values ('ISC01','Rambo Raja Roger Butarbutar','Laki-Laki','2010-04-16','2022-02-21','2024-05-15 06:26:12','2024-05-27 01:46:00','adminYPA',NULL,1),('ISC02','Intan Rohani Siahaan','Perempuan','2010-12-01','2022-03-30','2024-05-27 01:43:20','2024-05-27 01:43:20','adminYPA',NULL,1),('ISC03','Dapot Simatupang','Laki-Laki','2010-04-26','2022-04-12','2024-05-27 01:44:05','2024-05-27 01:44:05','adminYPA',NULL,1),('ISC04','Bresia Latranita Tarigan','Perempuan','2010-03-19','2022-02-12','2024-05-27 01:44:54','2024-05-27 01:44:54','adminYPA',NULL,1),('ISC05','Ronauli Angraeni Butarbutar','Perempuan','2011-09-25','2022-05-31','2024-05-27 01:45:49','2024-05-27 01:45:49','adminYPA',NULL,1);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2024_03_25_011810_create_volunteers_table',1),(6,'2024_04_13_063944_create_announcement_categories_table',1),(7,'2024_04_13_075251_create_donates_table',1),(8,'2024_04_17_091806_create_news_categories_table',1),(9,'2024_04_17_161542_create_hero_sections_table',1),(10,'2024_04_17_162205_create_testimonies_table',1),(11,'2024_04_18_032415_create_foundation_data_table',1),(12,'2024_04_19_034058_create_news_table',1),(13,'2024_04_20_031649_create_child_with_disabilities_table',1),(14,'2024_04_20_031743_create_informal_school_child_table',1),(15,'2024_04_20_153216_create_staff_table',1),(16,'2024_04_21_091928_create_galleries_table',1),(17,'2024_04_23_033945_create_partnership_table',1),(18,'2024_04_25_071030_create_sponsor_table',1),(19,'2024_04_26_021638_create_announcements_table',1),(20,'2024_04_27_155837_create_contact_table',1),(21,'2024_05_10_064733_create_footer_table',2),(22,'2024_05_10_074141_create_child_with_disabilities_table',3),(23,'2024_05_13_012030_create_footer_table',4),(24,'2024_05_13_030341_create_footer_table',5),(25,'2024_05_14_124740_create_donates_table',6),(26,'2024_05_14_124911_create_volunteers_table',6),(27,'2024_05_14_125221_create_sponsor_table',7),(28,'2024_05_15_063948_create_news_table',8),(29,'2024_05_15_131009_create_secretary_table',9),(30,'2024_05_15_150713_create_secretarys_table',10),(31,'2024_05_15_150855_create_secretaries_table',11),(32,'2024_05_17_092652_create_secretaries_table',12),(33,'2024_05_18_142800_create_donates_table',13),(34,'2024_05_20_012654_create_donates_table',14),(35,'2024_05_20_012724_create_volunteers_table',14),(36,'2024_05_23_033337_create_programs_table',15);

/*Table structure for table `news` */

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `id_news` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `news_category_id` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_by` varchar(20) NOT NULL DEFAULT 'adminYPA',
  `updated_by` varchar(20) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `total_visitors` bigint(20) unsigned NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_news`),
  UNIQUE KEY `news_slug_unique` (`slug`),
  KEY `news_news_category_id_foreign` (`news_category_id`),
  CONSTRAINT `news_news_category_id_foreign` FOREIGN KEY (`news_category_id`) REFERENCES `news_categories` (`id_news_categories`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `news` */

insert  into `news`(`id_news`,`title`,`slug`,`location`,`date`,`photo`,`news_category_id`,`description`,`created_by`,`updated_by`,`active`,`total_visitors`,`created_at`,`updated_at`) values ('N02','Kelas Futsal Perdana \"Menginspirasi Anak Pesisir\" Memulai Era Baru Pendidikan di Desa Lumban Silintong, Toba','apa','Diasana','2024-02-21','IMG-20240504-WA0059.jpg','NC02','<p class=\"MsoListParagraphCxSpFirst\" style=\"\">Dalam upaya memberikan akses pendidikan yang\r\nlebih merata bagi anak-anak pesisir pantai Danau Toba, Yayasan Pendidikan Anak\r\nRumah Damai telah menggelar kelas-kelas edukatif di Desa Lumban Silintong,\r\nKabupaten Toba. Dengan semangat untuk mewujudkan masa depan yang lebih cerah\r\nbagi generasi muda, kegiatan ini menjadi tonggak bersejarah dalam membuka\r\npeluang pendidikan yang lebih luas.<o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"\">Di bawah naungan\r\nYayasan Pendidikan Anak Rumah Damai, puluhan anak pesisir pantai Danau Toba\r\nmengikuti kelas-kelas yang dirancang khusus untuk memenuhi kebutuhan pendidikan\r\nmereka. Dengan berbagai program pembelajaran yang disesuaikan dengan lingkungan\r\ndan potensi lokal, anak-anak ini diberikan kesempatan untuk mengembangkan bakat\r\ndan minat mereka secara optimal.<o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"\">\"Kami\r\npercaya bahwa setiap anak memiliki potensi yang luar biasa. Melalui program\r\nini, kami berharap dapat memberikan mereka kesempatan yang sama untuk mengakses\r\npendidikan berkualitas,\" ujar Kepala Yayasan Pendidikan Anak Rumah Damai,\r\nBapak Iwan Siregar.<o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"\">Kelas-kelas yang\r\ndigelar mencakup berbagai bidang, mulai dari pendidikan formal hingga\r\nketerampilan praktis yang dapat meningkatkan kemandirian mereka di masa depan.\r\nDengan demikian, diharapkan anak-anak ini dapat tumbuh menjadi individu yang\r\nlebih mandiri dan berkontribusi positif bagi masyarakat sekitar.<o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"\">Selain\r\nmemberikan pengetahuan dan keterampilan, kegiatan ini juga bertujuan untuk\r\nmembangun rasa percaya diri dan semangat kebersamaan di antara anak-anak\r\npesisir Danau Toba. Melalui berbagai kegiatan sosial dan kebudayaan, mereka\r\ndiajak untuk saling menghargai dan mendukung satu sama lain dalam proses\r\nbelajar-mengajar.<o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"\">Dengan adanya\r\ndukungan dari berbagai pihak, termasuk masyarakat setempat dan para donatur\r\nyang peduli akan pendidikan anak-anak, Yayasan Pendidikan Anak Rumah Damai\r\nberkomitmen untuk terus mengembangkan program-program edukatif yang berdampak\r\npositif bagi anak-anak pesisir pantai Danau Toba.<o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"\">\"Kami\r\nmengucapkan terima kasih yang sebesar-besarnya kepada semua pihak yang telah\r\nmendukung dan turut berpartisipasi dalam kegiatan ini. Bersama-sama, mari kita\r\nwujudkan masa depan yang lebih cerah bagi generasi penerus bangsa,\" tutup\r\nBapak Iwan Siregar dengan penuh harap.<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoListParagraphCxSpLast\" style=\"\">Dengan semangat\r\nyang menggebu, Yayasan Pendidikan Anak Rumah Damai terus bergerak maju untuk\r\nmemberikan harapan baru bagi anak-anak pesisir Danau Toba, membangun masa depan\r\nyang lebih baik untuk mereka dan untuk negeri ini.<o:p></o:p></p>','adminYPA',NULL,1,1,'2024-05-22 08:39:07','2024-05-27 01:56:46'),('N06','Kelas Literasi untuk Anak Pesisir Danau','kelas-literasi-untuk-anak-pesisir-danau','Desa Lumban Silintong','2022-02-20','IMG-20240504-WA0065.jpg','NC01','<p class=\"\" style=\"\">Yayasan Pendidikan Anak Rumah Damai menggelar\r\nkelas literasi yang menarik perhatian para anak pesisir pantai di Desa Lumban\r\nSilintong, Kabupaten Tobabuat. Kelas literasi ini bertujuan untuk mengembangkan\r\nkemampuan menulis dan bercerita pada anak-anak di lingkungan tersebut, agar\r\nmereka dapat menyampaikan pengalaman mereka dengan lebih baik melalui tulisan.<o:p></o:p></p><p class=\"MsoListParagraphCxSpLast\" style=\"\">Di lingkungan\r\nkeluarga, banyak anak-anak pesisir pantai mengalami berbagai pengalaman yang\r\nunik dan berharga. Mereka mungkin memiliki kisah tentang kehidupan sehari-hari\r\nbersama keluarga di desa, menjalani tradisi dan adat istiadat, serta menghadapi\r\ntantangan dan perjuangan dalam kehidupan sehari-hari. Dalam kelas literasi,\r\nanak-anak diajak untuk mengekspresikan pengalaman-pengalaman ini melalui\r\ntulisan, sehingga dapat menghargai kekayaan budaya dan kehidupan keluarga\r\nmereka.<o:p></o:p></p><p class=\"MsoNormal\" style=\"margin-left: 36pt;\">Lingkungan\r\nsekolah juga menjadi bagian penting dalam pembentukan literasi anak-anak\r\npesisir pantai. Melalui kelas literasi ini, mereka diberikan kesempatan untuk\r\nmengeksplorasi dunia tulis-menulis dengan lebih mendalam. Mereka dapat\r\nmenuliskan cerita-cerita tentang pengalaman belajar di sekolah, hubungan dengan\r\nteman-teman sekelas, serta impian dan harapan mereka untuk masa depan. Dengan\r\ndemikian, kelas literasi tidak hanya menjadi tempat untuk meningkatkan\r\nkemampuan menulis, tetapi juga sebagai wadah untuk mengembangkan kreativitas\r\ndan minat baca anak-anak pesisir pantai.<o:p></o:p></p><p class=\"MsoNormal\" style=\"margin-left: 36pt;\">Di lingkungan\r\nmasyarakat, anak-anak pesisir pantai sering kali memiliki pengalaman yang unik\r\ndalam berinteraksi dengan lingkungan sekitar. Mereka mungkin memiliki kisah\r\ntentang kegiatan bersama teman-teman di pantai, menjalani kegiatan sosial di\r\ndesa, atau bahkan menghadapi tantangan lingkungan seperti perubahan iklim dan\r\nkeberlanjutan lingkungan. Melalui kelas literasi, anak-anak diajak untuk\r\nmengungkapkan pemikiran dan perasaan mereka tentang lingkungan sekitar melalui\r\ntulisan, sehingga dapat menjadi suara yang dihargai dalam upaya pelestarian\r\nlingkungan.<o:p></o:p></p><p style=\"\" class=\"\">\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<span style=\"line-height: 107%;\">Dengan adanya kelas literasi ini, diharapkan\r\nanak-anak pesisir pantai dapat semakin percaya diri dalam menyampaikan\r\npengalaman dan cerita mereka melalui tulisan. Mereka juga diharapkan dapat\r\nmenjadi agen perubahan yang positif dalam masyarakat melalui karya-karya tulis\r\nmereka. Yayasan Pendidikan Anak Rumah Damai berkomitmen untuk terus mendukung\r\npengembangan literasi anak-anak pesisir pantai, sehingga mereka dapat memiliki\r\nsuara yang kuat dan terdengar dalam masyarakat.</span><br></p>','adminYPA',NULL,1,1,'2024-05-26 12:19:51','2024-05-27 12:14:29'),('N07','Anak Desa Berkarya: Menyelami Seni dan Budaya Toba di Kelas Pesisir Pantai','anak-desa-berkarya-menyelami-seni-dan-budaya-toba-di-kelas-pesisir-pantai','Desa Lumban Silintong','2022-03-16','IMG-20240504-WA0035.jpg','NC01','<p class=\"MsoListParagraphCxSpFirst\" style=\"\">Desa Lumban Silintong, Kabupaten Toba - Sebuah\r\ninisiatif membanggakan telah diluncurkan oleh Yayasan Pendidikan Anak Rumah\r\nDamai, yang menggelar kelas khusus untuk anak-anak pesisir pantai Danau Toba.\r\nDalam upaya memperkenalkan serta memperkuat ikatan generasi muda dengan warisan\r\nseni dan budaya khas Toba, kegiatan ini mengambil tempat di desa Lumban\r\nSilintong, yang terletak di tepi indah Danau Toba.<o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"\">Dengan tagar\r\n#AnakDesaBerkarya, kelas ini bukan hanya sekadar tempat belajar, tetapi juga\r\nmenjadi wadah bagi para anak-anak desa untuk mengekspresikan bakat dan\r\nkreativitas mereka. Dengan dukungan dari para pendidik yang berdedikasi, mereka\r\ndiberi kesempatan untuk menjelajahi beragam aspek seni dan budaya Toba, mulai\r\ndari tarian tradisional hingga kerajinan lokal yang memukau.<o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"\">\"Sangat\r\nmembanggakan melihat semangat dan antusiasme para anak-anak ini dalam belajar\r\ndan menghargai warisan budaya kami,\" kata Bapak Martua Silalahi, salah\r\nsatu pendiri yayasan. \"Kelas ini bukan hanya tentang melatih keterampilan\r\nseni, tetapi juga membentuk karakter dan kebanggaan akan identitas budaya\r\nmereka.\"<o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"\">Di samping\r\npelajaran langsung, para peserta juga diajak untuk melakukan eksplorasi ke\r\nlokasi-lokasi bersejarah dan budaya di sekitar Danau Toba, menjadikan\r\npembelajaran mereka lebih hidup dan berkesan. Dari perahu tradisional hingga\r\nrumah adat Batak, setiap kunjungan memberikan pemahaman yang lebih dalam\r\ntentang akar budaya mereka.<o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"\">\"Tak hanya\r\nmenambah pengetahuan, tetapi kelas ini juga membuka mata dan hati kami tentang\r\nkekayaan budaya yang kita miliki,\" ujar Sarah Nasution, salah satu peserta\r\nkelas. \"Kami belajar tidak hanya dari buku, tetapi juga dari pengalaman langsung\r\ndi lapangan.\"<o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"\">Diharapkan bahwa\r\nmelalui upaya seperti ini, anak-anak pesisir pantai Danau Toba dapat tumbuh\r\nmenjadi generasi yang kuat, bangga akan identitas budaya mereka, dan siap\r\nmenghadapi tantangan masa depan dengan kepercayaan diri. Kredit juga diberikan\r\nkepada para sponsor lokal dan donatur yang telah turut serta dalam mendukung\r\nkegiatan ini.<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoListParagraphCxSpLast\" style=\"\">Dengan semangat\r\n#AnakDesaBerkarya, langkah ini menjadi bagian dari upaya lebih luas dalam\r\nmemperkuat dan melestarikan warisan budaya yang kaya dan berharga bagi\r\nmasyarakat Toba. Semoga kegiatan serupa dapat terus berkembang dan memberi\r\nmanfaat yang lebih luas bagi generasi mendatang.<o:p></o:p></p>','adminYPA',NULL,1,0,'2024-05-26 12:21:48','2024-05-27 01:54:55'),('N08','Yayasan Pendidikan Anak Rumah Damai Berikan Harapan Baru Bagi Anak Pesisir Danau Toba di Desa Lumban Silintong','yayasan-pendidikan-anak-rumah-damai-berikan-harapan-baru-bagi-anak-pesisir-danau-toba-di-desa-lumban-silintong','Desa Lumban Silintong','2022-05-17','IMG-20240504-WA0057.jpg','NC01','<p class=\"MsoListParagraphCxSpFirst\" style=\"\">Dalam upaya memberikan akses pendidikan yang\r\nlebih merata bagi anak-anak pesisir pantai Danau Toba, Yayasan Pendidikan Anak\r\nRumah Damai telah menggelar kelas-kelas edukatif di Desa Lumban Silintong,\r\nKabupaten Toba. Dengan semangat untuk mewujudkan masa depan yang lebih cerah\r\nbagi generasi muda, kegiatan ini menjadi tonggak bersejarah dalam membuka\r\npeluang pendidikan yang lebih luas.<o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"\">Di bawah naungan\r\nYayasan Pendidikan Anak Rumah Damai, puluhan anak pesisir pantai Danau Toba\r\nmengikuti kelas-kelas yang dirancang khusus untuk memenuhi kebutuhan pendidikan\r\nmereka. Dengan berbagai program pembelajaran yang disesuaikan dengan lingkungan\r\ndan potensi lokal, anak-anak ini diberikan kesempatan untuk mengembangkan bakat\r\ndan minat mereka secara optimal.<o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"\">\"Kami\r\npercaya bahwa setiap anak memiliki potensi yang luar biasa. Melalui program\r\nini, kami berharap dapat memberikan mereka kesempatan yang sama untuk mengakses\r\npendidikan berkualitas,\" ujar Kepala Yayasan Pendidikan Anak Rumah Damai,\r\nBapak Iwan Siregar.<o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"\">Kelas-kelas yang\r\ndigelar mencakup berbagai bidang, mulai dari pendidikan formal hingga\r\nketerampilan praktis yang dapat meningkatkan kemandirian mereka di masa depan.\r\nDengan demikian, diharapkan anak-anak ini dapat tumbuh menjadi individu yang\r\nlebih mandiri dan berkontribusi positif bagi masyarakat sekitar.<o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"\">Selain\r\nmemberikan pengetahuan dan keterampilan, kegiatan ini juga bertujuan untuk\r\nmembangun rasa percaya diri dan semangat kebersamaan di antara anak-anak\r\npesisir Danau Toba. Melalui berbagai kegiatan sosial dan kebudayaan, mereka\r\ndiajak untuk saling menghargai dan mendukung satu sama lain dalam proses\r\nbelajar-mengajar.<o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"\">Dengan adanya\r\ndukungan dari berbagai pihak, termasuk masyarakat setempat dan para donatur\r\nyang peduli akan pendidikan anak-anak, Yayasan Pendidikan Anak Rumah Damai\r\nberkomitmen untuk terus mengembangkan program-program edukatif yang berdampak\r\npositif bagi anak-anak pesisir pantai Danau Toba.<o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"\">\"Kami\r\nmengucapkan terima kasih yang sebesar-besarnya kepada semua pihak yang telah\r\nmendukung dan turut berpartisipasi dalam kegiatan ini. Bersama-sama, mari kita\r\nwujudkan masa depan yang lebih cerah bagi generasi penerus bangsa,\" tutup\r\nBapak Iwan Siregar dengan penuh harap.<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoListParagraphCxSpLast\" style=\"\">Dengan semangat\r\nyang menggebu, Yayasan Pendidikan Anak Rumah Damai terus bergerak maju untuk\r\nmemberikan harapan baru bagi anak-anak pesisir Danau Toba, membangun masa depan\r\nyang lebih baik untuk mereka dan untuk negeri ini.<o:p></o:p></p>','adminYPA',NULL,1,12,'2024-05-26 12:23:50','2024-05-27 01:55:14'),('N09','Yayasan Pendidikan Anak Rumah Damai Gelar Sesi Ibadah Kreatif untuk Anak Pesisir Pantai Danau Toba di Desa Lumban Silintong, Balige.','yayasan-pendidikan-anak-rumah-damai-gelar-sesi-ibadah-kreatif-untuk-anak-pesisir-pantai-danau-toba-di-desa-lumban-silintong-balige','Balige','2022-04-12','IMG-20240504-WA0062.jpg','NC03','<p class=\"MsoListParagraphCxSpFirst\" style=\"\">Dalam upaya mendukung pendidikan dan\r\nspiritualitas anak-anak pesisir pantai Danau Toba, Yayasan Pendidikan Anak\r\nRumah Damai mengadakan sesi ibadah kreatif yang dihelat secara berkala di Desa\r\nLumban Silintong, Kabupaten Toba.<o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"\">Kelas-kelas ini\r\ntidak hanya memberikan pemahaman agama, tetapi juga merangkul kreativitas dan\r\nsemangat komunitas. Kak Cristy, penggagas acara ini, menegaskan bahwa tujuan\r\nutamanya adalah menciptakan lingkungan yang inklusif, di mana setiap anak\r\nmerasa didengar dan dihargai.<o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"\">\"Sesi\r\nibadah kreatif ini adalah langkah konkret kami untuk memperkuat nilai-nilai\r\nkebersamaan dan kepedulian sosial,\" ujar Kak Cristy. \"Kami ingin\r\nmenciptakan ruang bagi anak-anak untuk mengekspresikan diri mereka sendiri\r\nmelalui berbagai kegiatan, mulai dari seni lukis, musik, hingga teater.\"<o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"\">Dalam sesi\r\nterbarunya, anak-anak diajak untuk berpartisipasi dalam berbagai kegiatan\r\nseperti drama, nyanyian, dan diskusi kelompok. Mereka diberikan ruang untuk\r\nmengekspresikan ide-ide mereka sendiri tentang nilai-nilai agama dan bagaimana\r\nmenerapkannya dalam kehidupan sehari-hari.<o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"\">\"Kami\r\npercaya bahwa melalui pendekatan yang kreatif dan inklusif, anak-anak akan\r\nlebih mudah memahami pesan-pesan agama dan menerapkannya dalam kehidupan\r\nmereka,\" tambah Kak Cristy.<o:p></o:p></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"\">Selain itu, sesi\r\nini juga menjadi momen penting untuk memperkuat ikatan antara anak-anak dengan\r\nlingkungan sekitar mereka. Melalui kegiatan-kegiatan yang melibatkan masyarakat\r\nsetempat, anak-anak diajak untuk lebih peduli terhadap lingkungan dan membangun\r\nhubungan yang harmonis dengan sesama.<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoListParagraphCxSpLast\" style=\"\">Acara ini mendapat\r\nsambutan hangat dari para orang tua dan komunitas setempat. Mereka menyambut\r\nbaik inisiatif Yayasan Pendidikan Anak Rumah Damai dan berharap kegiatan\r\nsemacam ini dapat terus dilakukan di masa mendatang.Dengan semangat yang\r\nmenggelora, Yayasan Pendidikan Anak Rumah Damai berkomitmen untuk terus\r\nmenyelenggarakan sesi-sesi ibadah kreatif ini sebagai wujud nyata dari upaya\r\nmereka dalam menciptakan generasi yang cerdas, beriman, dan berbudaya di\r\ntengah-tengah masyarakat pesisir pantai Danau Toba.<o:p></o:p></p>','adminYPA',NULL,1,0,'2024-05-27 01:58:28','2024-05-27 01:58:28');

/*Table structure for table `news_categories` */

DROP TABLE IF EXISTS `news_categories`;

CREATE TABLE `news_categories` (
  `id_news_categories` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Created_by` varchar(20) NOT NULL DEFAULT 'adminYPA',
  `Updated_by` varchar(20) DEFAULT NULL,
  `Active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_news_categories`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `news_categories` */

insert  into `news_categories`(`id_news_categories`,`Name`,`Description`,`created_at`,`updated_at`,`Created_by`,`Updated_by`,`Active`) values ('NC01','Anak Disabilitas','<div>Berita yang berfokus pada isu, cerita, atau prestasi anak-anak dengan disabilitas, termasuk pendidikan inklusif, layanan kesehatan khusus, dan dukungan sosial.</div><div>Anak Dampingan Lumban Silintong: Berita yang berkaitan dengan anak-anak yang berada di bawah program pendampingan di Lumban Silintong, termasuk kegiatan, perkembangan, dan cerita inspiratif dari program tersebut.</div>','2024-05-05 13:52:50','2024-05-27 01:51:18','adminYPA',NULL,1),('NC02','Kelas Futsal','<p>Berita yang meliput kelas atau kegiatan futsal, termasuk turnamen, pelatihan, dan prestasi anak-anak dalam futsal.</p>','2024-05-22 08:37:45','2024-05-27 01:51:52','adminYPA',NULL,1),('NC03','Kelas Karya Seni','<p>Berita tentang kelas seni, termasuk lukisan, patung, dan berbagai bentuk seni lainnya yang diajarkan kepada anak-anak, serta pameran dan acara terkait.</p>','2024-05-22 08:38:01','2024-05-27 01:52:21','adminYPA',NULL,1),('NC04','Kelas Tari','<p>Berita mengenai kelas tari, meliputi pelatihan, pertunjukan tari, dan perkembangan anak-anak dalam bidang tari.<br></p>','2024-05-22 08:38:14','2024-05-27 01:52:42','adminYPA',NULL,1);

/*Table structure for table `partnership` */

DROP TABLE IF EXISTS `partnership`;

CREATE TABLE `partnership` (
  `id_partnership` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `program` varchar(255) NOT NULL,
  `created_by` varchar(20) NOT NULL DEFAULT 'adminYPA',
  `updated_by` varchar(20) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_partnership`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `partnership` */

insert  into `partnership`(`id_partnership`,`name`,`logo`,`program`,`created_by`,`updated_by`,`active`,`created_at`,`updated_at`) values ('P01','Indamia','indamia.jpg','Salon','adminYPA',NULL,1,'2024-05-10 09:27:11','2024-05-27 03:28:31'),('P02','Gereja HKBP','hkbp.png','Donasi','adminYPA',NULL,1,'2024-05-25 13:24:11','2024-05-27 03:34:52'),('P03','Pokde','IMG-20240504-WA0042.jpg','ksaljdaskldasjdslakd','adminYPA',NULL,1,'2024-05-25 13:24:24','2024-05-25 13:24:24'),('P04','Franklyn Aldo Ignatia Lumbantoruan','IMG-20240504-WA0061.jpg','asdaasdawdada','adminYPA',NULL,1,'2024-05-25 13:24:42','2024-05-25 13:24:42'),('P05','Lasro','IMG-20240504-WA0066.jpg','asdaasdawdada','adminYPA',NULL,1,'2024-05-25 13:25:08','2024-05-25 13:25:08');

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `programs` */

DROP TABLE IF EXISTS `programs`;

CREATE TABLE `programs` (
  `id_programs` varchar(255) NOT NULL,
  `program_title` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `created_by` varchar(20) NOT NULL DEFAULT 'adminYPA',
  `updated_by` varchar(20) DEFAULT NULL,
  `Active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_programs`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `programs` */

insert  into `programs`(`id_programs`,`program_title`,`Description`,`created_by`,`updated_by`,`Active`,`created_at`,`updated_at`) values ('OR01','Kesehatan Jasmani dan Rohani','<p>Dalam mendukung kesehatan Rohani, kami melakukan ibadah sekali seminggu. Didalam YPA Rumah Damai menjunjung tinggi nilai-nilai pluralisme. Setiap anak yang beragama muslim diajari oleh Guru yang beragama Muslim sedangkan anak yang beragama kristen diajari oleh guru yang beragama kristen. Dalam mendukung kesehatan jasmani, kami melakukan berbagi gizi dan olahraga. Diselenggarakan melalui kelas futsal dan berenang.</p>','adminYPA',NULL,1,'2024-05-25 13:50:25','2024-05-25 13:50:25'),('OR02','Kelestarian Budaya Lokal','<p>Dalam menunjang kelestarian budaya kontekstual, kami mengajarkan Bahasa suku, tarian, filosofi rumah adat dan tulisan-tulisan budaya kontekstual dan wisata kebudayaan.</p>','adminYPA',NULL,1,'2024-05-26 03:59:23','2024-05-26 03:59:23'),('OR03','Kelestarian Lingkungan','<p>Dalam melestarikan lingkungan, anak-anak belajar membuat setiap karya yang ramah lingkungan dengan mendaur ulang sampah-sampah serta turut dalam penanaman tumbuhan muda.</p><p>Berdasarkan Visi Misi serta 3 Bidang pelayanan, maka YPA Rumah Damai menerapkan melalui kelas:</p><ul><li>Kelas Spiritualitas</li><li>Kelas Karya Seni dan Budaya</li><li>Kelas Bahasa Inggris</li><li>Kelas Musik Tradisional</li><li>Kelas Futsal</li><li>Pendampingan Anak Berkebutuhan Khusu</li></ul>','adminYPA',NULL,1,'2024-05-26 04:03:03','2024-05-26 04:03:03');

/*Table structure for table `secretaries` */

DROP TABLE IF EXISTS `secretaries`;

CREATE TABLE `secretaries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `secretaries_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `secretaries` */

insert  into `secretaries`(`id`,`name`,`email`,`email_verified_at`,`password`,`status`,`remember_token`,`created_at`,`updated_at`) values (2,'Anggiat Saut Parulian','anggiat.parulian@del.ac.id',NULL,'$2y$12$qnJLSHP9mhUW5hKlO.gK4OjPqz7YCcc5kODxpHCeLtWhqW3208p9e',1,NULL,'2024-05-22 15:12:20','2024-05-22 15:12:31');

/*Table structure for table `sponsor` */

DROP TABLE IF EXISTS `sponsor`;

CREATE TABLE `sponsor` (
  `id_sponsor` varchar(255) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `created_by` varchar(20) NOT NULL DEFAULT 'adminYPA',
  `updated_by` varchar(20) DEFAULT NULL,
  `Active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_sponsor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sponsor` */

insert  into `sponsor`(`id_sponsor`,`Name`,`photo`,`Description`,`created_by`,`updated_by`,`Active`,`created_at`,`updated_at`) values ('S01','Tokopedia','sponsor tokopedia.png','<p><font color=\"#ffffff\">Tokopedia adalah toko online</font></p>','adminYPA',NULL,1,'2024-05-15 06:20:18','2024-05-15 06:22:23');

/*Table structure for table `staff` */

DROP TABLE IF EXISTS `staff`;

CREATE TABLE `staff` (
  `id_staff` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` enum('Laki-Laki','Perempuan') NOT NULL,
  `date_of_birth` date NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `date_joined` date NOT NULL,
  `job_title` enum('Ketua Yayasan','Pengajar','Staff') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(20) NOT NULL DEFAULT 'adminYPA',
  `updated_by` varchar(20) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_staff`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `staff` */

insert  into `staff`(`id_staff`,`name`,`gender`,`date_of_birth`,`photo`,`date_joined`,`job_title`,`created_at`,`updated_at`,`created_by`,`updated_by`,`active`) values ('S04','Wida Wenty Panjaitan','Perempuan','2005-11-22',NULL,'2024-12-22','Pengajar','2024-05-07 07:27:31','2024-05-22 08:26:54','adminYPA',NULL,1),('S05','Lerih H. Panjaitan','Perempuan','1998-04-22',NULL,'2022-01-21','Ketua Yayasan','2024-05-27 01:31:48','2024-05-27 01:31:48','adminYPA',NULL,1),('S06','Anggiat Saut Parulian','Laki-Laki','1996-06-23',NULL,'2022-02-14','Staff','2024-05-27 01:33:50','2024-05-27 01:33:50','adminYPA',NULL,1),('S07','Eva Nababan','Perempuan','1998-02-04',NULL,'2022-02-05','Staff','2024-05-27 01:35:01','2024-05-27 01:35:01','adminYPA',NULL,1),('S08','Lamhot Simanullang','Laki-Laki','1995-07-12',NULL,'2022-02-28','Staff','2024-05-27 01:39:43','2024-05-27 01:39:43','adminYPA',NULL,1);

/*Table structure for table `testimonies` */

DROP TABLE IF EXISTS `testimonies`;

CREATE TABLE `testimonies` (
  `id_testimonies` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `gender` enum('Laki-Laki','Perempuan') NOT NULL,
  `created_by` varchar(20) NOT NULL DEFAULT 'adminYPA',
  `updated_by` varchar(20) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_testimonies`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `testimonies` */

insert  into `testimonies`(`id_testimonies`,`name`,`photo`,`description`,`gender`,`created_by`,`updated_by`,`active`,`created_at`,`updated_at`) values ('T01','Joel Nathgur','Joel.jpg','<p>Yayasan ini adalah sebuah Yayasan yang sangat hebat untuk mendidik anak anak.&nbsp;</p>','Laki-Laki','adminYPA',NULL,1,'2024-05-08 02:06:42','2024-05-27 02:11:12'),('T02','Franklyn Aldo Ignatia Lumbantoruan','franklyn.jpg','<p><span style=\"font-family: \" open=\"\" sans\",=\"\" system-ui,=\"\" -apple-system,=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" \"noto=\"\" \"liberation=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\",=\"\" emoji\";=\"\" text-align:=\"\" center;\"=\"\">Saya merasa terbantu dan bahagia mendapatkan pendidikan di YPARumahDamai.&nbsp;</span><span style=\"font-size: 1rem;\">Saya sangat senang berpartisipasi dengan Yayasan Pendidikan Anak Rumah Damai ini. ?</span><br></p>','Laki-Laki','adminYPA',NULL,1,'2024-05-08 10:18:28','2024-05-27 02:11:24'),('T04','Febyanti','Screenshot 2024-05-27 090619.png','<p><span style=\"font-family: \" open=\"\" sans\",=\"\" system-ui,=\"\" -apple-system,=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" \"noto=\"\" \"liberation=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\",=\"\" emoji\";=\"\" text-align:=\"\" center;\"=\"\">Terima kasih atas kesempatan belajar dan berkembang di sini.</span><br></p>','Perempuan','adminYPA',NULL,1,'2024-05-08 10:19:02','2024-05-27 02:06:37'),('T05','Lasro','20221228143208_IMG_3587.JPG','<p><span style=\"font-family: \" open=\"\" sans\",=\"\" system-ui,=\"\" -apple-system,=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" \"noto=\"\" \"liberation=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\",=\"\" emoji\";=\"\" text-align:=\"\" center;\"=\"\">Dukungan dari yayasan ini sungguh membantu masa depan anak-anak.</span><br></p>','Perempuan','adminYPA',NULL,1,'2024-05-08 10:19:19','2024-05-27 02:07:57'),('T06','Roy Budi','roy.jpg','<p>Saya merasa bangga menjadi bagian dari komunitas ini.<br></p>','Laki-Laki','adminYPA',NULL,1,'2024-05-27 02:09:54','2024-05-27 02:09:54');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'Admin YPA Rumah Damai','admin@gmail.com',NULL,'$2y$12$PA44rRWobMllwFcijmT0RupV9eFjK7G7VW4tJi3W9Pmdzrkf9d8Wm',NULL,'2024-05-05 05:21:03','2024-05-14 07:50:43');

/*Table structure for table `volunteers` */

DROP TABLE IF EXISTS `volunteers`;

CREATE TABLE `volunteers` (
  `id_volunteers` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `origin` varchar(255) NOT NULL,
  `location` enum('Wilayah I, Desa Lumban Silintong, Kecamatan Balige, Kabupaten Toba','Wilayah II, Desa Sawah Lamo, Kecamatan Andam Dewi, Kabupaten Tapanuli Tengah') NOT NULL,
  `cv` blob DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(20) NOT NULL DEFAULT 'adminYPA',
  `updated_by` varchar(20) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_volunteers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `volunteers` */

insert  into `volunteers`(`id_volunteers`,`name`,`email`,`phone_number`,`date_of_birth`,`origin`,`location`,`cv`,`created_at`,`updated_at`,`created_by`,`updated_by`,`status`) values ('V01','Joel','pokde1@gmail.com','081262945602','2005-11-22','Parapat','Wilayah I, Desa Lumban Silintong, Kecamatan Balige, Kabupaten Toba','08 Surat Pernyataan Akhir 2022.pdf','2024-05-20 01:48:05','2024-05-20 02:13:57','adminYPA',NULL,1),('V02','Rahmat','rahmat@gmail.com','08123456789','1995-02-10','Laguboti','Wilayah II, Desa Sawah Lamo, Kecamatan Andam Dewi, Kabupaten Tapanuli Tengah','AK_USM123030135_FranklynAldoIgnatiaLumbantoruan.pdf','2024-05-27 03:16:45','2024-05-27 03:24:25','adminYPA',NULL,1),('V03','Dewi','dewi@gmail.com','08765432100','1998-09-20','Parapat','Wilayah I, Desa Lumban Silintong, Kecamatan Balige, Kabupaten Toba','Constraint.pdf','2024-05-27 03:17:57','2024-05-27 03:17:57','adminYPA',NULL,0),('V04','Gani','gani@gmail.com','08567894567','1994-07-03','Balige','Wilayah II, Desa Sawah Lamo, Kecamatan Andam Dewi, Kabupaten Tapanuli Tengah','Praktikum07S03-Data Integrity_D3TI01_010.pdf','2024-05-27 03:19:03','2024-05-27 03:19:03','adminYPA',NULL,0),('V05','Fitri','fitri@gmail.com','08111223344','1996-03-08','Medan','Wilayah I, Desa Lumban Silintong, Kecamatan Balige, Kabupaten Toba','bda917b4-a916-46cd-b4b4-1d91a83938d4.pdf','2024-05-27 03:20:17','2024-05-27 03:20:17','adminYPA',NULL,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
