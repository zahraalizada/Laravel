-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 17, 2023 at 10:08 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_oguz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`) VALUES
(1, 'Furkan Gurel', 'furkan@hotmail.com', '$2y$10$O.2m4RESr1a/Yi3Od3H3W.gguYkh1Qer/geTjvxklgHSutvoNz1.S');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `hit` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '0' COMMENT '0:pasif 1:aktif',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_category_id_foreign` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `category_id`, `title`, `image`, `content`, `hit`, `status`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Numquam repellendus officiis qui est aliquam.', 'https://via.placeholder.com/800x400.png/00cc77?text=cats+Codeingnither+Hocasi+ea', 'Sunt totam impedit commodi quas nisi. Aut harum vel aut quod tempora sapiente. Ut nemo in eum aut. Quod rerum magni totam voluptates.', 0, 1, 'numquam-repellendus-officiis-qui-est-aliquam', NULL, '1983-05-10 17:48:03', '2023-05-17 01:50:56'),
(2, 2, 'Consequatur eaque pariatur quidem.', 'https://via.placeholder.com/800x400.png/0066cc?text=cats+Codeingnither+Hocasi+eum', 'Quia ea et voluptas vitae. Sit adipisci reprehenderit blanditiis et assumenda. Et quia non sunt quia deserunt ut minus. Sit eum illum quia vero. Unde ut sit nulla eaque ipsam numquam. Id eos iusto voluptate quia error esse. Reprehenderit voluptas omnis incidunt perferendis dolor.', 0, 1, 'consequatur-eaque-pariatur-quidem', NULL, '1972-06-02 02:28:40', '2023-05-17 01:50:56'),
(3, 7, 'Eos voluptatum excepturi vero et.', 'https://via.placeholder.com/800x400.png/00ffff?text=cats+Codeingnither+Hocasi+quia', 'Sint incidunt natus ratione illum nemo vero in itaque. Perferendis id ab deleniti dolor vitae commodi sequi. Sunt ullam ut voluptatem sint quis quia voluptatem. Ut ad dolorem inventore fuga corporis.', 0, 1, 'eos-voluptatum-excepturi-vero-et', NULL, '1989-08-24 17:21:06', '2023-05-17 01:34:55'),
(4, 5, 'Quis unde est est consequatur numquam et.dsc', 'https://via.placeholder.com/800x400.png/00dd77?text=cats+Codeingnither+Hocasi+voluptatem', 'Soluta saepe excepturi aut maxime inventore cum. Officiis et molestias aperiam autem sint adipisci. Eius excepturi dolor aut libero. Laudantium totam itaque consequatur et ab et qui. Voluptatem tempore nemo at ut aut autem ut eaque. Sunt ut possimus eos consectetur placeat alias placeat sed. Quos vel aspernatur voluptates nesciunt fugiat iusto. Aut corrupti tempore asperiores.', 0, 1, 'quis-unde-est-est-consequatur-numquam-etdsc', NULL, '1990-05-21 23:43:34', '2023-05-17 01:35:07'),
(5, 1, 'ilk makale', '/uploads/ilk-makale.jpg', '<p>dcsc</p>', 0, 0, 'ilk-makale', '2023-05-16 01:52:44', '2023-05-16 01:52:35', '2023-05-16 01:52:44');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Genel', 'genel', 1, '2023-05-16 00:31:21', '2023-05-17 01:20:42'),
(2, 'Eglence', 'eglence', 1, '2023-05-16 00:31:21', '2023-05-17 01:50:52'),
(3, 'Bilisim', 'bilisim', 1, '2023-05-16 00:31:21', '2023-05-17 01:20:48'),
(4, 'Gezi', 'gezi', 1, '2023-05-16 00:31:21', '2023-05-17 01:50:52'),
(5, 'Teknoloji', 'teknoloji', 1, '2023-05-16 00:31:21', '2023-05-16 00:31:21'),
(6, 'Saglik', 'saglik', 1, '2023-05-16 00:31:21', '2023-05-17 01:50:53'),
(7, 'Spor', 'spor', 1, '2023-05-16 00:31:21', '2023-05-17 01:50:54'),
(8, 'Gunluk Yasam', 'gunluk-yasam', 1, '2023-05-16 00:31:21', '2023-05-17 01:50:53');

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

DROP TABLE IF EXISTS `configs`;
CREATE TABLE IF NOT EXISTS `configs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int NOT NULL DEFAULT '1',
  `facebook` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `title`, `logo`, `favicon`, `active`, `facebook`, `twitter`, `github`, `linkedin`, `youtube`, `instagram`, `created_at`, `updated_at`) VALUES
(1, 'Codeignither hocasi', 'uploads/codeignither-hocasi-logo.png', 'uploads/codeignither-hocasi-favicon.png', 1, 'https://www.facebook.com/', 'https://www.twitter.com', 'https://www.github.com/', 'https://www.linkedin.com/', 'https://www.youtube.com/', 'https://www.instagram.com/', '2023-05-16 07:33:52', '2023-05-16 08:45:51');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_05_03_131702_categories', 1),
(3, '2023_05_04_123533_articles', 1),
(4, '2023_05_11_050625_pages', 1),
(5, '2023_05_11_084534_contact', 1),
(6, '2023_05_12_033644_admin', 1),
(7, '2023_05_16_111827_config', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `image`, `content`, `slug`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hakkimizda', 'https://www.thebalancemoney.com/thmb/QwUIfnT82yrLj0HQv1H_3Jo_W8A=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/two-young-women-having-a-discussion-in-a-business-607477463-4c806dd0eb2b45c39c2ba7af6b558903.jpg', 'Lorem ipsum dolor sit amet, constectetur adipisicing elit,\r\n                            sed do psum dolor sit amet, constectetur adipisicing elit\r\n                            psum dolor sit amet, constectetur adipisicing elit psum\r\n                            dolor sit amet, constectetur adipisicing elit.', 'hakkimizda', 1, 1, '2023-05-16 00:31:21', '2023-05-17 01:50:58'),
(2, 'Kariyer', 'https://www.thebalancemoney.com/thmb/QwUIfnT82yrLj0HQv1H_3Jo_W8A=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/two-young-women-having-a-discussion-in-a-business-607477463-4c806dd0eb2b45c39c2ba7af6b558903.jpg', 'Lorem ipsum dolor sit amet, constectetur adipisicing elit,\n                            sed do psum dolor sit amet, constectetur adipisicing elit\n                            psum dolor sit amet, constectetur adipisicing elit psum\n                            dolor sit amet, constectetur adipisicing elit.', 'kariyer', 0, 1, '2023-05-16 00:31:21', '2023-05-16 04:07:17'),
(3, 'Vizyonumuz', 'https://www.thebalancemoney.com/thmb/QwUIfnT82yrLj0HQv1H_3Jo_W8A=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/two-young-women-having-a-discussion-in-a-business-607477463-4c806dd0eb2b45c39c2ba7af6b558903.jpg', 'Lorem ipsum dolor sit amet, constectetur adipisicing elit,\n                            sed do psum dolor sit amet, constectetur adipisicing elit\n                            psum dolor sit amet, constectetur adipisicing elit psum\n                            dolor sit amet, constectetur adipisicing elit.', 'vizyonumuz', 2, 1, '2023-05-16 00:31:21', '2023-05-16 04:07:17'),
(4, 'Misyonumuz', 'https://www.thebalancemoney.com/thmb/QwUIfnT82yrLj0HQv1H_3Jo_W8A=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/two-young-women-having-a-discussion-in-a-business-607477463-4c806dd0eb2b45c39c2ba7af6b558903.jpg', 'Lorem ipsum dolor sit amet, constectetur adipisicing elit,\n                            sed do psum dolor sit amet, constectetur adipisicing elit\n                            psum dolor sit amet, constectetur adipisicing elit psum\n                            dolor sit amet, constectetur adipisicing elit.', 'misyonumuz', 3, 1, '2023-05-16 00:31:21', '2023-05-16 04:07:17');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
