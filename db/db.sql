-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table tenderboardsite.administrators
CREATE TABLE IF NOT EXISTS `administrators` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `administrators_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tenderboardsite.administrators: ~0 rows (approximately)
/*!40000 ALTER TABLE `administrators` DISABLE KEYS */;
INSERT IGNORE INTO `administrators` (`id`, `name`, `surname`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin', 'admin@tendernoticeboard.co.zw', NULL, '$2y$10$x/HGDAoK0zw2oBn3u4BDBu08RaqMYVCjxaok.zRx8tcmZSRA45UOO', NULL, NULL, NULL);
/*!40000 ALTER TABLE `administrators` ENABLE KEYS */;

-- Dumping structure for table tenderboardsite.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tenderboardsite.categories: ~4 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT IGNORE INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'ICT', NULL, NULL),
	(2, 'Construction', NULL, NULL),
	(3, 'Medical', NULL, NULL),
	(4, 'Civil Works', NULL, NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table tenderboardsite.companies
CREATE TABLE IF NOT EXISTS `companies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emails` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phones` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tenderboardsite.companies: ~0 rows (approximately)
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;

-- Dumping structure for table tenderboardsite.companytypes
CREATE TABLE IF NOT EXISTS `companytypes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tenderboardsite.companytypes: ~1 rows (approximately)
/*!40000 ALTER TABLE `companytypes` DISABLE KEYS */;
INSERT IGNORE INTO `companytypes` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Private Company(Pvt Ltd)', NULL, NULL),
	(2, 'Private Business Cooperation(PBC)', NULL, NULL);
/*!40000 ALTER TABLE `companytypes` ENABLE KEYS */;

-- Dumping structure for table tenderboardsite.company_users
CREATE TABLE IF NOT EXISTS `company_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tenderboardsite.company_users: ~0 rows (approximately)
/*!40000 ALTER TABLE `company_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_users` ENABLE KEYS */;

-- Dumping structure for table tenderboardsite.directories
CREATE TABLE IF NOT EXISTS `directories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emails` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phones` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tenderboardsite.directories: ~1 rows (approximately)
/*!40000 ALTER TABLE `directories` DISABLE KEYS */;
INSERT IGNORE INTO `directories` (`id`, `user_id`, `uuid`, `company`, `address`, `emails`, `phones`, `bio`, `created_at`, `updated_at`) VALUES
	(1, 2, '90c0487c-0fdb-4e8d-9214-78b0af29d7e5', 'AnixSys Pvt Ltd', '16832 stoneridge park harare', 'benson.misi@outlook.com', '+263775474661', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galle', '2021-08-13 10:15:58', '2021-08-13 10:15:58');
/*!40000 ALTER TABLE `directories` ENABLE KEYS */;

-- Dumping structure for table tenderboardsite.directory_products
CREATE TABLE IF NOT EXISTS `directory_products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `directory_id` int(10) unsigned NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tenderboardsite.directory_products: ~2 rows (approximately)
/*!40000 ALTER TABLE `directory_products` DISABLE KEYS */;
INSERT IGNORE INTO `directory_products` (`id`, `directory_id`, `name`, `image`, `created_at`, `updated_at`) VALUES
	(2, 1, 'Website development', 'products/aMkW95py6yz1uL3J8jsGgZRsjRQV34HnxmqexdMN.jpg', '2021-08-13 10:52:41', '2021-08-13 10:52:41');
/*!40000 ALTER TABLE `directory_products` ENABLE KEYS */;

-- Dumping structure for table tenderboardsite.documents
CREATE TABLE IF NOT EXISTS `documents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filesize` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filetype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filecount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tenderboardsite.documents: ~0 rows (approximately)
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;
INSERT IGNORE INTO `documents` (`id`, `service_id`, `name`, `filesize`, `filetype`, `filecount`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Shareholder National IDs', '5mb', '*', '0', NULL, NULL);
/*!40000 ALTER TABLE `documents` ENABLE KEYS */;

-- Dumping structure for table tenderboardsite.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tenderboardsite.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table tenderboardsite.invoicenumbers
CREATE TABLE IF NOT EXISTS `invoicenumbers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `invoicenumber` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tenderboardsite.invoicenumbers: ~0 rows (approximately)
/*!40000 ALTER TABLE `invoicenumbers` DISABLE KEYS */;
INSERT IGNORE INTO `invoicenumbers` (`id`, `invoicenumber`, `created_at`, `updated_at`) VALUES
	(1, 49, NULL, '2021-08-14 14:17:52');
/*!40000 ALTER TABLE `invoicenumbers` ENABLE KEYS */;

-- Dumping structure for table tenderboardsite.invoices
CREATE TABLE IF NOT EXISTS `invoices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `invoicenumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tenderboardsite.invoices: ~12 rows (approximately)
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
INSERT IGNORE INTO `invoices` (`id`, `user_id`, `service_id`, `invoicenumber`, `description`, `currency`, `amount`, `status`, `created_at`, `updated_at`) VALUES
	(2, 1, 0, 'inv202171951', 'Company Registration', 'ZWL', '8000', 'AWAITING', '2021-07-19 13:12:27', '2021-07-19 16:55:39'),
	(3, 1, 0, 'inv202171961', 'Company Registration', 'ZWL', '8000', 'AWAITING', '2021-07-19 19:02:34', '2021-07-19 19:08:06'),
	(4, 1, 0, 'inv202172071', 'Company Registration', 'ZWL', '8000', 'PAID', '2021-07-20 10:03:07', '2021-07-20 15:41:04'),
	(5, 1, 0, 'inv2021720121', 'Company Registration', 'ZWL', '8000', 'PAID', '2021-07-20 15:54:23', '2021-07-21 10:19:18'),
	(6, 1, 0, 'inv2021721141', 'Company Registration', 'ZWL', '8000', 'PAID', '2021-07-21 11:22:33', '2021-08-14 14:17:52'),
	(7, 2, 2, 'inv2021811182', 'prazapplication', 'ZWL', '24000', 'PAID', '2021-08-11 15:01:15', '2021-08-11 15:25:07'),
	(8, 2, 2, 'inv2021811232', 'prazapplication', 'ZWL', '24000', 'AWAITING', '2021-08-11 15:30:36', '2021-08-12 09:29:45'),
	(9, 2, 1, 'inv2021812262', 'Company Registration', 'ZWL', '8000', 'PAID', '2021-08-12 10:15:13', '2021-08-12 10:15:53'),
	(11, 2, 3, 'inv2021812312', 'vendorregistration', 'ZWL', '8000', 'PAID', '2021-08-12 15:28:19', '2021-08-12 15:32:51'),
	(12, 2, 3, 'inv2021812332', 'vendorregistration', 'ZWL', '8000', 'PAID', '2021-08-12 15:40:50', '2021-08-14 14:10:12'),
	(13, 2, 3, 'inv2021812342', 'vendorregistration', 'ZWL', '8000', 'PAID', '2021-08-12 16:19:10', '2021-08-12 16:19:42'),
	(14, 2, 3, 'inv2021812362', 'vendorregistration', 'ZWL', '8000', 'PAID', '2021-08-12 16:22:41', '2021-08-12 16:23:20'),
	(15, 2, 3, 'inv2021812382', 'vendorregistration', 'ZWL', '8000', 'PAID', '2021-08-12 16:24:25', '2021-08-12 16:24:52'),
	(16, 2, 4, 'inv2021813422', 'vendorregistration', 'ZWL', '24000', 'PAID', '2021-08-13 15:51:35', '2021-08-13 16:00:55'),
	(17, 2, 4, 'inv2021813442', 'subscription', 'ZWL', '1620000', 'PAID', '2021-08-13 16:03:56', '2021-08-13 16:04:49');
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;

-- Dumping structure for table tenderboardsite.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tenderboardsite.migrations: ~29 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(13, '2014_10_12_000000_create_users_table', 1),
	(14, '2014_10_12_100000_create_password_resets_table', 1),
	(15, '2019_08_19_000000_create_failed_jobs_table', 1),
	(16, '2021_07_14_083441_create_companies_table', 1),
	(17, '2021_07_14_083803_create_administrators_table', 1),
	(18, '2021_07_14_084115_company_users', 1),
	(19, '2021_07_16_103948_create_services_table', 2),
	(20, '2021_07_16_104119_create_service_prices_table', 2),
	(21, '2021_07_16_105444_create_documents_table', 3),
	(22, '2021_07_16_105552_create_userdocuments_table', 3),
	(23, '2021_07_16_110202_create_myapplications_table', 3),
	(24, '2021_07_16_110414_create_invoices_table', 3),
	(25, '2021_07_16_110703_create_onlinepayments_table', 4),
	(26, '2021_07_16_112546_create_transfers_table', 4),
	(27, '2021_07_18_094618_create_companytypes_table', 5),
	(28, '2021_07_19_082710_create_invoicenumbers_table', 6),
	(29, '2021_07_19_154650_create_pops_table', 7),
	(30, '2021_07_20_100659_create_receipts_table', 8),
	(43, '2021_07_24_130959_create_prazapplications_table', 9),
	(44, '2021_07_24_131815_create_prazcategories_table', 9),
	(45, '2021_07_24_132102_create_prazapplication_items_table', 9),
	(47, '2021_08_12_113523_create_vendorapplications_table', 10),
	(61, '2021_08_12_161423_create_notifications_table', 11),
	(62, '2021_08_12_165510_create_procurements_table', 11),
	(63, '2021_08_12_170558_create_categories_table', 11),
	(64, '2021_08_12_173521_create_procurementtypes_table', 11),
	(65, '2021_08_12_185130_create_directories_table', 11),
	(66, '2021_08_13_075714_create_directory_products_table', 11),
	(67, '2021_08_13_112128_create_packages_table', 12),
	(68, '2021_08_13_113831_create_subscriptions_table', 12);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table tenderboardsite.myapplications
CREATE TABLE IF NOT EXISTS `myapplications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `invoicenumber` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `fields` json NOT NULL,
  `approved` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tenderboardsite.myapplications: ~6 rows (approximately)
/*!40000 ALTER TABLE `myapplications` DISABLE KEYS */;
INSERT IGNORE INTO `myapplications` (`id`, `user_id`, `service_id`, `invoicenumber`, `fields`, `approved`, `status`, `created_at`, `updated_at`) VALUES
	(3, 1, 1, 'inv202171951', '{"names": [{"name": "AnixSys Pvt Ltd", "status": "PENDING"}, {"name": "Anix Sys Pvt Ltd", "status": "PENDING"}, {"name": "Anix-Sys Pvt Ltd", "status": "PENDING"}], "directors": [{"name": "Benson Misi", "shares": "50", "address": "16832 stoneridge park harare", "national_id": "29-2499999999"}, {"name": "Vimbai Matenga", "shares": "50", "address": "76 samora machael", "national_id": "29-2499999999"}]}', NULL, 'PENDING', '2021-07-19 13:12:27', '2021-07-19 13:12:27'),
	(4, 1, 1, 'inv202171961', '{"names": [{"name": "iVerify Pvt Ltd", "status": "PENDING"}, {"name": "eVerification Pvt Ltd", "status": "PENDING"}, {"name": "iVerifictation Pvt Ltd", "status": "PENDING"}], "directors": [{"name": "Benson Misi", "shares": "50", "address": "16832 stoneridge park harare", "national_id": "29-2499999999"}, {"name": "Vimbai Matenga", "shares": "50", "address": "76 samora machael", "national_id": "29-2499999999"}]}', NULL, 'AWAITING', '2021-07-19 19:02:34', '2021-07-19 19:08:06'),
	(5, 1, 1, 'inv202172071', '{"names": [{"name": "Belly Motors", "status": "PENDING"}, {"name": "Belly Motors", "status": "PENDING"}, {"name": "PRAZ", "status": "PENDING"}], "directors": [{"name": "test", "shares": "50", "address": "16832 stoneridge park harare", "national_id": "29-2499999999"}, {"name": "Benson Misi", "shares": "50", "address": "16832 stoneridge park harare", "national_id": "29-2499999999"}]}', NULL, 'IN-PROGRESS', '2021-07-20 10:03:07', '2021-07-20 15:41:04'),
	(6, 1, 1, 'inv2021720121', '{"names": [{"name": "AnixSys Pvt Ltd", "status": "PENDING"}, {"name": "AnixSys Pvt Ltd", "status": "PENDING"}, {"name": "AnixSys Pvt Ltd", "status": "PENDING"}], "directors": [{"name": "Benson Misi", "shares": "50", "address": "16832 stoneridge park harare", "national_id": "29-2499999999"}, {"name": "Benson Misi", "shares": "50", "address": "76 samora machael", "national_id": "29-2499999999"}]}', NULL, 'IN-PROGRESS', '2021-07-20 15:54:23', '2021-07-21 10:19:18'),
	(7, 1, 1, 'inv2021721141', '{"names": [{"name": "AnixSys Pvt Ltd", "status": "PENDING"}, {"name": "AnixSys Pvt Ltd", "status": "PENDING"}, {"name": "AnixSys Pvt Ltd", "status": "PENDING"}], "directors": [{"name": "Benson Misi", "shares": "50", "address": "16832 stoneridge park harare", "national_id": "29-2499999999"}, {"name": "Benson Misi", "shares": "50", "address": "76 samora machael", "national_id": "29-2499999999"}]}', 'AnixSys Pvt Ltd', 'PROCESSED', '2021-07-21 11:22:33', '2021-08-14 16:52:06'),
	(10, 2, 1, 'inv2021812262', '{"names": [{"name": "AnixSys Pvt Ltd", "status": "PENDING"}, {"name": "AnixSys Pvt Ltd", "status": "PENDING"}, {"name": "AnixSys Pvt Ltd", "status": "PENDING"}], "directors": [{"name": "Benson Misi", "shares": "50", "address": "16832 stoneridge park harare", "national_id": "29-2499999999"}, {"name": "Benson Misi", "shares": "50", "address": "76 samora machael", "national_id": "29-2499999999"}]}', 'AnixSys Pvt Ltd', 'PROCESSED', '2021-08-12 10:15:13', '2021-08-14 16:51:41');
/*!40000 ALTER TABLE `myapplications` ENABLE KEYS */;

-- Dumping structure for table tenderboardsite.notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tenderboardsite.notifications: ~0 rows (approximately)
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;

-- Dumping structure for table tenderboardsite.onlinepayments
CREATE TABLE IF NOT EXISTS `onlinepayments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `invoicenumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poll_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tenderboardsite.onlinepayments: ~11 rows (approximately)
/*!40000 ALTER TABLE `onlinepayments` DISABLE KEYS */;
INSERT IGNORE INTO `onlinepayments` (`id`, `user_id`, `invoicenumber`, `poll_url`, `amount`, `status`, `mode`, `created_at`, `updated_at`) VALUES
	(1, 1, 'inv202172071', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=a40aecce-f3db-49fa-94fe-3e80b608f60d', '8000', 'paid', 'ECOCASH', '2021-07-20 15:35:56', '2021-07-20 15:43:19'),
	(2, 1, 'inv2021720121', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=daf1fd8c-48f2-4269-adce-d8b19214e4bb', '8000', 'paid', 'ECOCASH', '2021-07-21 10:19:04', '2021-07-21 10:19:18'),
	(3, 2, 'inv2021811182', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=d3849fde-7110-45ed-8ed7-9a0fbd827894', '10000', 'paid', 'ECOCASH', '2021-08-11 15:12:32', '2021-08-11 15:12:46'),
	(4, 2, 'inv2021811182', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=cbab5122-1896-4bb6-9b00-c38f5eea3534', '10000', 'paid', 'ECOCASH', '2021-08-11 15:13:39', '2021-08-11 15:14:26'),
	(5, 2, 'inv2021811182', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=4018e624-e567-4454-8f09-95364c56179f', '2000', 'paid', 'ECOCASH', '2021-08-11 15:15:57', '2021-08-11 15:16:14'),
	(6, 2, 'inv2021811182', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=839d26c9-bbb9-49ef-b860-549d4924cfe4', '2000', 'paid', 'ECOCASH', '2021-08-11 15:24:28', '2021-08-11 15:25:07'),
	(7, 2, 'inv2021812262', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=1696aa29-e74f-4439-a351-8bc0d6fedb75', '8000', 'paid', 'ECOCASH', '2021-08-12 10:15:37', '2021-08-12 10:15:53'),
	(8, 2, 'inv2021812312', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=626756a3-63b4-4f25-b787-b5d199f69e17', '8000', 'paid', 'ECOCASH', '2021-08-12 15:32:40', '2021-08-12 15:32:51'),
	(9, 2, 'inv2021812342', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=e6aca73e-a9fd-4363-9519-6f92e0424578', '8000', 'paid', 'ECOCASH', '2021-08-12 16:19:23', '2021-08-12 16:19:41'),
	(10, 2, 'inv2021812362', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=2fbaba73-3f3e-43fb-9f8d-64454565a1b1', '8000', 'paid', 'ECOCASH', '2021-08-12 16:22:51', '2021-08-12 16:23:20'),
	(11, 2, 'inv2021812382', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=4261cfc3-4704-487d-8272-c2ea8ef75e52', '8000', 'paid', 'ECOCASH', '2021-08-12 16:24:38', '2021-08-12 16:24:52'),
	(12, 2, 'inv2021813422', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=ffa97272-c621-4079-9543-6f82d2e9c5b9', '24000', 'paid', 'ECOCASH', '2021-08-13 16:00:36', '2021-08-13 16:00:55'),
	(13, 2, 'inv2021813442', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=f6ea977d-083c-4ff9-aa6e-4afca3e3abdb', '1620000', 'paid', 'ECOCASH', '2021-08-13 16:04:25', '2021-08-13 16:04:49');
/*!40000 ALTER TABLE `onlinepayments` ENABLE KEYS */;

-- Dumping structure for table tenderboardsite.packages
CREATE TABLE IF NOT EXISTS `packages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rfqs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenders` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expression` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `praz` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `directory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tenderboardsite.packages: ~4 rows (approximately)
/*!40000 ALTER TABLE `packages` DISABLE KEYS */;
INSERT IGNORE INTO `packages` (`id`, `name`, `email`, `whatsapp`, `rfqs`, `tenders`, `expression`, `vendor`, `praz`, `company`, `directory`, `currency`, `amount`, `created_at`, `updated_at`) VALUES
	(1, 'Free', 'N', 'N', 'N', 'N', 'N', 'Y', 'Y', 'Y', 'N', 'ZWL', '0', NULL, NULL),
	(2, 'Starter', 'Y', 'N', 'Y', 'N', 'Y', 'Y', 'Y', 'Y', 'Y', 'ZWL', '8000', NULL, NULL),
	(3, 'SME', 'Y', 'Y', 'Y', 'N', 'Y', 'Y', 'Y', 'Y', 'Y', 'ZWL', '9000', NULL, NULL),
	(4, 'Enterprises', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'ZWL', '10000', NULL, NULL);
/*!40000 ALTER TABLE `packages` ENABLE KEYS */;

-- Dumping structure for table tenderboardsite.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tenderboardsite.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table tenderboardsite.pops
CREATE TABLE IF NOT EXISTS `pops` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tenderboardsite.pops: ~4 rows (approximately)
/*!40000 ALTER TABLE `pops` DISABLE KEYS */;
INSERT IGNORE INTO `pops` (`id`, `invoice_id`, `filename`, `created_at`, `updated_at`) VALUES
	(2, 2, 'pops/UZwWLfALjCe4Wua3HvaOfgeRxOCzbk8AHXaXDSR1.pdf', '2021-07-19 16:55:39', '2021-07-19 16:55:39'),
	(3, 3, 'pops/3q9CycMOcK5t24I6lPVZyz60fIjtVIO8mYPIxv2X.pdf', '2021-07-19 19:03:26', '2021-07-19 19:03:26'),
	(4, 3, 'pops/h46ePUEoK2QS2OSGPbw47SkAFMupSl0yyZkUNHlr.pdf', '2021-07-19 19:04:37', '2021-07-19 19:04:37'),
	(5, 3, 'pops/hB4c5Oyonj6P37LaL3C75pZXHrCJk4nAJlFGoR5W.pdf', '2021-07-19 19:08:06', '2021-07-19 19:08:06');
/*!40000 ALTER TABLE `pops` ENABLE KEYS */;

-- Dumping structure for table tenderboardsite.prazapplications
CREATE TABLE IF NOT EXISTS `prazapplications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `invoicenumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `companyname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `companytype_id` int(11) NOT NULL,
  `hasaccount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tenderboardsite.prazapplications: ~3 rows (approximately)
/*!40000 ALTER TABLE `prazapplications` DISABLE KEYS */;
INSERT IGNORE INTO `prazapplications` (`id`, `user_id`, `service_id`, `invoicenumber`, `companyname`, `companytype_id`, `hasaccount`, `email`, `password`, `locality`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, 'inv2021724171', 'AnixSys Pvt Ltd', 1, 'Y', 'benson.misi@gmail.com', 'chikomba2020@', 'LOCAL', 'PENDING', '2021-07-24 17:06:17', '2021-07-24 17:06:17'),
	(2, 2, 2, 'inv2021811182', 'Vimbai Marketing', 1, 'Y', 'vimbai.matenga@gmail.com', 'makoni2020@', 'LOCAL', 'PROCESSED', '2021-08-11 12:12:00', '2021-08-14 17:47:34'),
	(3, 2, 2, 'inv2021811232', 'AnixSys Pvt Ltd', 1, 'Y', 'benson.misi@outlook.com', '2019###', 'LOCAL', 'AWAITING', '2021-08-11 15:30:19', '2021-08-12 09:29:45');
/*!40000 ALTER TABLE `prazapplications` ENABLE KEYS */;

-- Dumping structure for table tenderboardsite.prazapplication_items
CREATE TABLE IF NOT EXISTS `prazapplication_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `prazapplication_id` int(11) NOT NULL,
  `prazcategory_id` int(11) NOT NULL,
  `regyear` int(11) NOT NULL,
  `currency` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `amount` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tenderboardsite.prazapplication_items: ~6 rows (approximately)
/*!40000 ALTER TABLE `prazapplication_items` DISABLE KEYS */;
INSERT IGNORE INTO `prazapplication_items` (`id`, `user_id`, `prazapplication_id`, `prazcategory_id`, `regyear`, `currency`, `amount`, `status`, `created_at`, `updated_at`) VALUES
	(1, 2, 2, 108, 2021, 'ZWL', 8000, 'PENDING', '2021-08-11 14:28:20', '2021-08-11 14:28:20'),
	(2, 2, 2, 131, 2021, 'ZWL', 8000, 'PENDING', '2021-08-11 14:28:20', '2021-08-11 14:28:20'),
	(4, 2, 2, 52, 2021, 'ZWL', 8000, 'PENDING', '2021-08-11 14:57:02', '2021-08-11 14:57:02'),
	(5, 2, 3, 56, 2021, 'ZWL', 8000, 'PENDING', '2021-08-11 15:30:30', '2021-08-11 15:30:30'),
	(6, 2, 3, 55, 2021, 'ZWL', 8000, 'PENDING', '2021-08-11 15:30:30', '2021-08-11 15:30:30'),
	(7, 2, 3, 54, 2021, 'ZWL', 8000, 'PENDING', '2021-08-11 15:30:30', '2021-08-11 15:30:30');
/*!40000 ALTER TABLE `prazapplication_items` ENABLE KEYS */;

-- Dumping structure for table tenderboardsite.prazcategories
CREATE TABLE IF NOT EXISTS `prazcategories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tenderboardsite.prazcategories: ~132 rows (approximately)
/*!40000 ALTER TABLE `prazcategories` DISABLE KEYS */;
INSERT IGNORE INTO `prazcategories` (`id`, `code`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'GA002', 'Arms and Ammunition', NULL, NULL),
	(2, 'SA002', 'Architectural Services ', NULL, NULL),
	(3, 'SA005', 'Actuarial Consultancy Services ', NULL, NULL),
	(4, 'SA003', 'Auctioneering Services', NULL, NULL),
	(5, 'SA004', 'Audit Services (External)', NULL, NULL),
	(6, 'SB001', 'Bicycle Maintenance & Repair', NULL, NULL),
	(7, 'SB002', 'Blasting', NULL, NULL),
	(8, 'SB003', 'Borehole Siting, Casing, Drilling and Repairs', NULL, NULL),
	(9, 'SB004', 'Building and Roof Repairs & Maintenance Services ', NULL, NULL),
	(10, 'SB005', 'Bulk and Cargo Transport Services', NULL, NULL),
	(11, 'SC001', 'Cable Trenching', NULL, NULL),
	(12, 'SC002', 'Catering Services', NULL, NULL),
	(13, 'SC004', 'Cloud Seeding', NULL, NULL),
	(14, 'SC008', 'Courier & Removal Services', NULL, NULL),
	(15, 'SC009', 'Custodial Services (archiving & related services)', NULL, NULL),
	(16, 'SC010', 'Customs Clearance & related Import Export Services', NULL, NULL),
	(17, 'SD001', 'Debt Collection Services ', NULL, NULL),
	(18, 'SD002', 'Dry Cleaning Services', NULL, NULL),
	(19, 'SE001', 'Engineering Consultancy', NULL, NULL),
	(20, 'SE002', 'Environmental Impact Assessment Services', NULL, NULL),
	(21, 'SF001', 'Fencing Services', NULL, NULL),
	(22, 'SF002', 'Fire Fighting Equipment Maintenance', NULL, NULL),
	(23, 'SF003', 'Forensic Services', NULL, NULL),
	(24, 'SF004', 'Fumigation Services', NULL, NULL),
	(25, 'SH001', 'Heavy Vehicle Maintenance', NULL, NULL),
	(26, 'SH003', 'Hire of Tents, Outdoor & Camping Equipment', NULL, NULL),
	(27, 'SH004', 'Hotels and Conference Facilities', NULL, NULL),
	(28, 'SH005', 'Human Resources Consultancy', NULL, NULL),
	(29, 'SI006', 'Insurance and Brokerage Services', NULL, NULL),
	(30, 'SL001', 'Land Scaping, Gardening and Florist', NULL, NULL),
	(31, 'SL002', 'Land Surveyors ', NULL, NULL),
	(32, 'SL003', 'Legal Services', NULL, NULL),
	(33, 'SL004', 'Lifts and Elevator Maintenance', NULL, NULL),
	(34, 'SL005', 'Light Motor Vehicle Maintenance', NULL, NULL),
	(35, 'SM001', 'Management & General Consultancy Services', NULL, NULL),
	(36, 'SM002', 'Marketing and Advertising Services ', NULL, NULL),
	(37, 'SM004', 'Media Production ((filming, photography etc)', NULL, NULL),
	(38, 'SM005', 'Milling (grain, saw, etc)', NULL, NULL),
	(39, 'SM006', 'Motor Cycle Maintenance', NULL, NULL),
	(40, 'SP001', 'Panel Beating', NULL, NULL),
	(41, 'SP002', 'Partitioning , Shop and Household-fittings', NULL, NULL),
	(42, 'SP003', 'Passenger Transport, Travel and Tour', NULL, NULL),
	(43, 'SP004', 'Plant and Equipment Maintenance', NULL, NULL),
	(44, 'SP005', 'Plumbing & Related (Jobbing) Services', NULL, NULL),
	(45, 'SP006', 'Printing Services', NULL, NULL),
	(46, 'SP007', 'Private Security Guards & CIT Services', NULL, NULL),
	(47, 'SP008', 'Project Management', NULL, NULL),
	(48, 'SP009', 'Property Evaluation and Estate Agents Services', NULL, NULL),
	(49, 'SQ001', 'Quantity Surveying ', NULL, NULL),
	(50, 'SR003', 'Road Maintenance Services', NULL, NULL),
	(51, 'SS001', 'Signage and Branding Services', NULL, NULL),
	(52, 'SS003', 'Storage and Warehousing', NULL, NULL),
	(53, 'ST001', 'Tailoring Services (Cut-Make & Trim) ', NULL, NULL),
	(54, 'ST003', 'Texbook and Booklet Publishing', NULL, NULL),
	(55, 'ST004', 'Tiling and Carpeting Services (New) ', NULL, NULL),
	(56, 'ST005', 'Tyre Repairs, Wheel Balancing and Alignment', NULL, NULL),
	(57, 'SV001', 'Vehicle Towing Services', NULL, NULL),
	(58, 'SW001', 'Waste Collection and Management (New)', NULL, NULL),
	(59, 'GB001', 'Bedding (Blankets, Sheets, etc..)', NULL, NULL),
	(60, 'GB002', 'Bulky Water Supply', NULL, NULL),
	(61, 'GB003', 'Butchery (beef, pork, fish, poultry products etc)', NULL, NULL),
	(62, 'GC001', 'Canvas & Tarpaulins', NULL, NULL),
	(63, 'GC002', 'Catering Equipment, Accessories & Spares', NULL, NULL),
	(64, 'GC003', 'Cleaning Chemicals', NULL, NULL),
	(65, 'GC004', 'Coal', NULL, NULL),
	(66, 'GC008', 'Corporate Gifts', NULL, NULL),
	(67, 'GC009', 'Corporate Wear', NULL, NULL),
	(68, 'GF001', 'Fibre Optic Cable and Accessories', NULL, NULL),
	(69, 'GF002', 'Fire Fighting Equipment', NULL, NULL),
	(70, 'GF003', 'Fuels & Lubricants', NULL, NULL),
	(71, 'GG001', 'Gas (Industrial and Domestic)', NULL, NULL),
	(72, 'GG002', 'Grain (Maize, Rice Wheat etc )', NULL, NULL),
	(73, 'GG003', 'Groceries and Provisions', NULL, NULL),
	(74, 'GI001', 'Irrigation Equipment', NULL, NULL),
	(75, 'GL001', 'Limestone', NULL, NULL),
	(76, 'GM005', 'Musical Instruments (PA Systems and Accessories)', NULL, NULL),
	(77, 'GN001', 'New Bicycles', NULL, NULL),
	(78, 'GN002', 'New Heavy Motor Vehicles & Buses', NULL, NULL),
	(79, 'GN003', 'New Light Motor Vehicles', NULL, NULL),
	(80, 'GN004', 'New Motor Cycles', NULL, NULL),
	(81, 'GN005', 'New Plant and Equipment', NULL, NULL),
	(82, 'GN006', 'Non-Agricultural Herbicides', NULL, NULL),
	(83, 'GO002', 'Outdoor, Camping & Hunting Equipment', NULL, NULL),
	(84, 'GP001', 'Packaging Materials & Related Products', NULL, NULL),
	(85, 'GP002', 'Paints and Accessories', NULL, NULL),
	(86, 'GP005', 'Protective Clothing', NULL, NULL),
	(87, 'GP006', 'PVC, HDPE, LDPE, GRP  Pipes and  Fittings', NULL, NULL),
	(88, 'GS001', 'Saddlery and Related Articles & Accessories', NULL, NULL),
	(89, 'GS003', 'Sewing Machines, Spares and Accessories', NULL, NULL),
	(90, 'GS004', 'Solar Panels and Accessories', NULL, NULL),
	(91, 'GS005', 'Sports Wear and Equipment', NULL, NULL),
	(92, 'GS006', 'Stationery Products and Paper Raw Materials', NULL, NULL),
	(93, 'GT001', 'Timber and Boards', NULL, NULL),
	(94, 'GT002', 'Tools and Hardware', NULL, NULL),
	(95, 'GU001', 'Used Heavy Motor Vehicles', NULL, NULL),
	(96, 'GU002', 'Used Light Motor Vehicles', NULL, NULL),
	(97, 'GU003', 'Used Motor Cycles', NULL, NULL),
	(98, 'GU004', 'Used Plant and Equipment', NULL, NULL),
	(99, 'GU005', 'Uniform and Textile Materials', NULL, NULL),
	(100, 'GV001', 'Veterinary Drugs, Vaccines and Chemicals', NULL, NULL),
	(101, 'GV002', 'Vegetables and Fruits (Fresh Farm produce)', NULL, NULL),
	(102, 'GW001', 'Water Treatment Chemicals', NULL, NULL),
	(103, 'GW002', 'Weighbridges, Scales and Accessories', NULL, NULL),
	(104, 'PBG001', 'General', NULL, NULL),
	(105, 'GF003B', 'Lubricants Only', NULL, NULL),
	(106, 'PBS001', 'PBS001', NULL, NULL),
	(107, 'SG001', 'Geomatics (surveying and mapping).', NULL, NULL),
	(108, 'SZ005', 'Water And Sewer Engineering And Utilities', NULL, NULL),
	(109, 'GZ004', 'Home Appliances', NULL, NULL),
	(110, 'SZ006', 'Safari Activities', NULL, NULL),
	(111, 'GA003', 'Livestock Feed Premixes and Additives', NULL, NULL),
	(112, 'GA004', 'sanitary products and services', NULL, NULL),
	(113, 'SI009', 'Investment and Banking', NULL, NULL),
	(114, 'SD003', 'Dyeing and Tanning Extracts', NULL, NULL),
	(115, 'GP007', 'Pre-paid Meters (electricty, Water etc)', NULL, NULL),
	(116, 'GL002', 'Livestock', NULL, NULL),
	(117, 'GC022', 'Industrial Chemicals', NULL, NULL),
	(118, 'SM007', 'Medical Practice and Health Services', NULL, NULL),
	(119, 'GZ033', 'Aviation Spares and accessories', NULL, NULL),
	(120, 'GY001', 'Meteorology systems', NULL, NULL),
	(121, 'GV003', 'VEHICLE BODIES & TRAILERS, AND VEHICLE CONVERSIONS', NULL, NULL),
	(122, 'GH002', 'Hazard Warning Equipement', NULL, NULL),
	(123, 'GH003', 'Road Maintance Equipment & Accessories', NULL, NULL),
	(124, 'GH005', 'Borehole Siting, Casing and Drilling Equipment', NULL, NULL),
	(125, 'GR001', 'Locomotives and Railway Equipment and Spares', NULL, NULL),
	(126, 'GH007', 'Survey equipment & Accessories', NULL, NULL),
	(127, 'SS004', 'Standards Development', NULL, NULL),
	(128, 'ST006', 'Testing and Inspection Services', NULL, NULL),
	(129, 'FG001', 'Forensic and Ballistic Equipment', NULL, NULL),
	(130, 'GX001', 'SCRAP', NULL, NULL),
	(131, 'SX007', 'MIC Diagnostic and Interventional Radiology', NULL, NULL),
	(132, 'GL003', 'Poultry and Livestock', NULL, NULL);
/*!40000 ALTER TABLE `prazcategories` ENABLE KEYS */;

-- Dumping structure for table tenderboardsite.procurements
CREATE TABLE IF NOT EXISTS `procurements` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `closing_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` text COLLATE utf8mb4_unicode_ci,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PRIVATE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tenderboardsite.procurements: ~2 rows (approximately)
/*!40000 ALTER TABLE `procurements` DISABLE KEYS */;
INSERT IGNORE INTO `procurements` (`id`, `uuid`, `user_id`, `company`, `type`, `title`, `description`, `closing_date`, `document`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
	(1, '0ecebfda-d166-4dff-a6f9-1de65c5c0e51', 2, 'Anixsys Pvt', '1', 'Computers', 'The name method may be used to prefix each route name in the group with a given string. For example, you may want to prefix all of the grouped route\'s names with admin. The given string is prefixed to the route name exactly as it is specified, so we will be sure to provide the trailing . character in the prefix:', '2021-08-27', 'notices/YFrzsDiXOsYRtjPpo3dOZ29aGypV8EQZn5pfLPU9.pdf', '1', 'PUBLIC', '2021-08-14 15:40:24', '2021-08-14 15:40:24'),
	(2, 'f7fb6f1b-127e-42b7-bce2-192a6d16271b', 2, 'Anixsys Pvt', '1', 'Computers', 'The name method may be used to prefix each route name in the group with a given string. For example, you may want to prefix all of the grouped route\'s names with admin. The given string is prefixed to the route name exactly as it is specified, so we will be sure to provide the trailing . character in the prefix:', '2021-08-19', 'notices/BHzD9U8G9su4xg5blyeujtpqK8SNRAhU8NV7zZh0.pdf', '1', 'PUBLIC', '2021-08-14 15:40:51', '2021-08-14 15:40:51');
/*!40000 ALTER TABLE `procurements` ENABLE KEYS */;

-- Dumping structure for table tenderboardsite.procurementtypes
CREATE TABLE IF NOT EXISTS `procurementtypes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tenderboardsite.procurementtypes: ~3 rows (approximately)
/*!40000 ALTER TABLE `procurementtypes` DISABLE KEYS */;
INSERT IGNORE INTO `procurementtypes` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Request for Qouations', NULL, NULL),
	(2, 'Competetive Bidding', NULL, NULL),
	(3, 'Expression of Interest', NULL, NULL);
/*!40000 ALTER TABLE `procurementtypes` ENABLE KEYS */;

-- Dumping structure for table tenderboardsite.receipts
CREATE TABLE IF NOT EXISTS `receipts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `invoicenumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiptnumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source_id` int(11) NOT NULL DEFAULT '0',
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tenderboardsite.receipts: ~13 rows (approximately)
/*!40000 ALTER TABLE `receipts` DISABLE KEYS */;
INSERT IGNORE INTO `receipts` (`id`, `invoicenumber`, `receiptnumber`, `source`, `source_id`, `currency`, `amount`, `created_at`, `updated_at`) VALUES
	(1, 'inv202172071', 'rpt2021720111', 'onlinepayment', 1, 'ZWL', '8000', '2021-07-20 15:43:20', '2021-07-20 15:43:20'),
	(2, 'inv2021720121', 'rpt2021721131', 'onlinepayment', 2, 'ZWL', '8000', '2021-07-21 10:19:18', '2021-07-21 10:19:18'),
	(3, 'inv2021811182', 'rpt2021811192', 'onlinepayment', 3, 'ZWL', '10000', '2021-08-11 15:12:46', '2021-08-11 15:12:46'),
	(4, 'inv2021811182', 'rpt2021811202', 'onlinepayment', 4, 'ZWL', '10000', '2021-08-11 15:14:26', '2021-08-11 15:14:26'),
	(5, 'inv2021811182', 'rpt2021811212', 'onlinepayment', 5, 'ZWL', '2000', '2021-08-11 15:16:14', '2021-08-11 15:16:14'),
	(6, 'inv2021811182', 'rpt2021811222', 'onlinepayment', 6, 'ZWL', '2000', '2021-08-11 15:25:07', '2021-08-11 15:25:07'),
	(7, 'inv2021812262', 'rpt2021812272', 'onlinepayment', 7, 'ZWL', '8000', '2021-08-12 10:15:53', '2021-08-12 10:15:53'),
	(8, 'inv2021812312', 'rpt2021812322', 'onlinepayment', 8, 'ZWL', '8000', '2021-08-12 15:32:51', '2021-08-12 15:32:51'),
	(9, 'inv2021812342', 'rpt2021812352', 'onlinepayment', 9, 'ZWL', '8000', '2021-08-12 16:19:42', '2021-08-12 16:19:42'),
	(10, 'inv2021812362', 'rpt2021812372', 'onlinepayment', 10, 'ZWL', '8000', '2021-08-12 16:23:20', '2021-08-12 16:23:20'),
	(11, 'inv2021812382', 'rpt2021812392', 'onlinepayment', 11, 'ZWL', '8000', '2021-08-12 16:24:52', '2021-08-12 16:24:52'),
	(12, 'inv2021813422', 'rpt2021813432', 'onlinepayment', 12, 'ZWL', '24000', '2021-08-13 16:00:55', '2021-08-13 16:00:55'),
	(13, 'inv2021813442', 'rpt2021813452', 'onlinepayment', 13, 'ZWL', '1620000', '2021-08-13 16:04:49', '2021-08-13 16:04:49'),
	(14, 'inv2021812332', 'rpt2021814462', 'transfer', 3, 'ZWL', '8000', '2021-08-14 14:10:12', '2021-08-14 14:10:12'),
	(15, 'inv2021721141', 'rpt2021814481', 'transfer', 1, 'ZWL', '8000', '2021-08-14 14:17:52', '2021-08-14 14:17:52');
/*!40000 ALTER TABLE `receipts` ENABLE KEYS */;

-- Dumping structure for table tenderboardsite.services
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tenderboardsite.services: ~2 rows (approximately)
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT IGNORE INTO `services` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Company Registrations', NULL, NULL),
	(2, 'PRAZ Registrations', NULL, NULL),
	(3, 'Vendor Registratons', NULL, NULL),
	(4, 'Subscriptions', NULL, NULL);
/*!40000 ALTER TABLE `services` ENABLE KEYS */;

-- Dumping structure for table tenderboardsite.service_prices
CREATE TABLE IF NOT EXISTS `service_prices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `locality` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'LOCAL',
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tenderboardsite.service_prices: ~3 rows (approximately)
/*!40000 ALTER TABLE `service_prices` DISABLE KEYS */;
INSERT IGNORE INTO `service_prices` (`id`, `service_id`, `locality`, `currency`, `amount`, `created_at`, `updated_at`) VALUES
	(1, 1, 'LOCAL', 'ZWL', '8000', NULL, NULL),
	(2, 2, 'LOCAL', 'ZWL', '8000', NULL, NULL),
	(3, 3, 'LOCAL', 'ZWL', '8000', NULL, NULL);
/*!40000 ALTER TABLE `service_prices` ENABLE KEYS */;

-- Dumping structure for table tenderboardsite.subscriptions
CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `invoicenumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL,
  `expire_date` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tenderboardsite.subscriptions: ~4 rows (approximately)
/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;
INSERT IGNORE INTO `subscriptions` (`id`, `user_id`, `package_id`, `invoicenumber`, `duration`, `expire_date`, `status`, `created_at`, `updated_at`) VALUES
	(2, 2, 1, 'FREE', 30, '09/13/2021', 'ACTIVE', NULL, NULL),
	(4, 2, 3, 'inv2021813442', 180, '2022-02-09 16:03:56', 'ACTIVE', '2021-08-13 16:03:56', '2021-08-13 16:04:49'),
	(5, 3, 1, 'FREE3', 30, '2021-09-13 10:45:37', 'ACTIVE', '2021-08-14 10:45:37', '2021-08-14 10:45:37'),
	(6, 4, 1, 'FREE4', 30, '2021-09-13 11:45:12', 'ACTIVE', '2021-08-14 11:45:12', '2021-08-14 11:45:12'),
	(7, 5, 1, 'import5', 30, '9-13-2021 11:45', 'ACTIVE', '2021-08-14 18:29:47', '2021-08-14 18:29:47'),
	(8, 6, 1, 'import6', 30, '9-14-2021 11:45', 'ACTIVE', '2021-08-14 18:29:47', '2021-08-14 18:29:47');
/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;

-- Dumping structure for table tenderboardsite.transfers
CREATE TABLE IF NOT EXISTS `transfers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL DEFAULT '0',
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tenderboardsite.transfers: ~3 rows (approximately)
/*!40000 ALTER TABLE `transfers` DISABLE KEYS */;
INSERT IGNORE INTO `transfers` (`id`, `user_id`, `invoice_id`, `bank`, `payment_date`, `filename`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 6, 'NMB', '2021-07-15', 'pops/ZdVfNZ9zCNa2D5wG7AiQd9tl0Co1YDjbFHSXtwXa.pdf', 'PENDING', '2021-07-21 11:34:54', '2021-07-21 11:34:54'),
	(2, 2, 8, 'CBZ', '2021-08-13', 'pops/NcWDgtowwPX0Ih2DKHGJOsgU5PLk6dOhpgKyqItE.pdf', 'PENDING', '2021-08-12 09:29:45', '2021-08-12 09:29:45'),
	(3, 2, 12, 'NMB', '2021-08-13', 'pops/dV39nmbuXLbNmPqm69mwqCbYRsA0qpF07A3StDRu.pdf', 'PENDING', '2021-08-12 15:41:11', '2021-08-12 15:41:11');
/*!40000 ALTER TABLE `transfers` ENABLE KEYS */;

-- Dumping structure for table tenderboardsite.userdocuments
CREATE TABLE IF NOT EXISTS `userdocuments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `myapplication_id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tenderboardsite.userdocuments: ~0 rows (approximately)
/*!40000 ALTER TABLE `userdocuments` DISABLE KEYS */;
/*!40000 ALTER TABLE `userdocuments` ENABLE KEYS */;

-- Dumping structure for table tenderboardsite.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tenderboardsite.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT IGNORE INTO `users` (`id`, `name`, `surname`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Benson', 'Misi', 'benson.misi@gmail.com', NULL, '$2y$10$AbqvZTEzw3IjTccG5evEwuPWdjRUiW9h5u8qNyPyf/MBiIQVhiXUq', 'user', NULL, '2021-07-14 12:25:00', '2021-07-14 12:25:00'),
	(2, 'Vimbai', 'Misi', 'benson.misi@outlook.com', NULL, '$2y$10$lIouVVCYYdvEmKSvRkAjQ.Y5uJqfoPS32tyUOXVPB1.klUi5jMP4C', 'user', NULL, '2021-08-11 11:16:02', '2021-08-11 11:16:02'),
	(3, 'Tadiwa', 'Misi', 'misib@praz.org.zw', NULL, '$2y$10$0HgOSPLWCAzc1wzYwdFuqujXZIa1UMLcWFMf2t1BL05Pjx8fTL5LW', 'user', NULL, '2021-08-14 10:45:37', '2021-08-14 10:45:37'),
	(4, 'Admin', 'Admin', 'admin@tendernoticeboard.co.zw', NULL, '$2y$10$nUVL34imep83BPikuMHwXemO5rdhcA6p/N.DxGAfbg7kF3qzsUs7i', 'admin', NULL, '2021-08-14 11:45:12', '2021-08-14 11:45:12'),
	(5, 'Test1', 'test1', 'test1@test1.co.zw', NULL, '123456789', 'user', NULL, '2021-08-14 18:29:47', '2021-08-14 18:29:47'),
	(6, 'Test2', 'test2', 'test2@test1.co.zw', NULL, '123456789', 'user', NULL, '2021-08-14 18:29:47', '2021-08-14 18:29:47');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table tenderboardsite.vendorapplications
CREATE TABLE IF NOT EXISTS `vendorapplications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoicenumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicationtype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accountnumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branchcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentstatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tenderboardsite.vendorapplications: ~4 rows (approximately)
/*!40000 ALTER TABLE `vendorapplications` DISABLE KEYS */;
INSERT IGNORE INTO `vendorapplications` (`id`, `user_id`, `company`, `invoicenumber`, `applicationtype`, `address`, `city`, `state`, `country`, `zipcode`, `bank`, `accountnumber`, `branch`, `branchcode`, `email`, `name`, `surname`, `position`, `year`, `paymentstatus`, `status`, `created_at`, `updated_at`) VALUES
	(2, 2, 'AnixSys Pvt Ltd', 'inv2021812312', 'NEW', '16832 stoneridge park harare', 'Harare', 'Please choose', 'ZIMBABWE', '263', 'NMB', '320019974', 'JOINA', '01111', 'benson.misi@outlook.com', 'Benson Misi', 'Misi', 'ICT Officer', '2021', 'PENDING', 'PENDING', '2021-08-12 15:28:19', '2021-08-12 15:28:19'),
	(3, 2, 'PAZ', 'inv2021812332', 'NEW', '76 samora machael\r\n5th Floor', 'CBD', 'Harare', 'ZIMBABWE', '263', 'NMB', '466654', 'fdgsdffd', '01111', 'benson.misi@outlook.com', 'Tendai chipika', 'Misi', 'ICT Officer', '2020', 'PENDING', 'PROCESSED', '2021-08-12 15:40:50', '2021-08-14 17:27:03'),
	(4, 2, 'AnixSys Pvt Ltd', 'inv2021812342', 'NEW', '16832 stoneridge park harare', 'Harare', 'Please choose', 'ZIMBABWE', '263', 'NMB', '466654', 'fdgsdffd', '01111', 'benson.misi@outlook.com', 'Benson Misi', 'Misi', 'ICT Officer', '2020', 'PENDING', 'PROCESSED', '2021-08-12 16:19:10', '2021-08-14 17:27:07'),
	(5, 2, 'AnixSys Pvt Ltd', 'inv2021812362', 'NEW', '16832 stoneridge park harare', 'Harare', 'Please choose', 'ZIMBABWE', '263', 'NMB', '466654', 'JOINA', '01111', 'benson.misi@outlook.com', 'Benson Misi', 'Misi', 'ICT Officer', '2020', 'PENDING', 'PROCESSED', '2021-08-12 16:22:41', '2021-08-14 17:27:10'),
	(6, 2, 'PAZ', 'inv2021812382', 'NEW', '76 samora machael\r\n5th Floor', 'CBD', 'Harare', 'ZIMBABWE', '263', 'NMB', '466654', 'JOINA', '01111', 'benson.misi@outlook.com', 'Tendai chipika', 'Misi', 'ICT Officer', '2020', 'PENDING', 'PROCESSED', '2021-08-12 16:24:25', '2021-08-14 17:27:13');
/*!40000 ALTER TABLE `vendorapplications` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
