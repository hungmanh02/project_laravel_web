-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 17, 2023 at 04:11 PM
-- Server version: 8.0.31
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_project_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`) VALUES
(2, 'Iphone 11', 'iphone', 0, '2023-03-28 06:32:08', '2023-03-28 06:32:08'),
(3, 'Nokia', 'nokia', 2, '2023-03-28 07:12:38', '2023-03-29 07:23:33'),
(4, 'hùng mạnh', 'hung-manh', 0, '2023-03-28 07:52:50', '2023-03-28 07:52:50'),
(5, 'update name', 'update-name', 0, '2023-03-29 07:42:57', '2023-03-29 07:42:57'),
(6, 'Đỗ Hùng Mạnh', 'do-hung-manh', 0, '2023-03-29 07:43:02', '2023-03-29 07:43:02'),
(7, 'con 1', 'con-1', 6, '2023-03-29 07:43:28', '2023-03-29 07:43:28'),
(8, 'con 2', 'con-2', 4, '2023-03-29 07:43:36', '2023-03-29 07:43:36'),
(9, 'Manh me', 'manh-me', 2, '2023-03-29 08:36:13', '2023-03-29 09:24:59'),
(10, 'Manh ne', 'manh-ne', 9, '2023-03-29 08:36:26', '2023-03-29 08:36:26'),
(11, 'update name', 'update-name', 2, '2023-03-29 09:19:44', '2023-03-29 09:19:44'),
(12, 'asad', 'asad', 2, '2023-03-29 09:26:35', '2023-03-29 09:26:35'),
(13, 'update name', 'update-name', 0, '2023-03-30 08:08:46', '2023-03-30 08:08:46');

-- --------------------------------------------------------

--
-- Table structure for table `categories_courses`
--

DROP TABLE IF EXISTS `categories_courses`;
CREATE TABLE IF NOT EXISTS `categories_courses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int UNSIGNED NOT NULL,
  `course_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_courses_category_id_foreign` (`category_id`),
  KEY `categories_courses_course_id_foreign` (`course_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories_courses`
--

INSERT INTO `categories_courses` (`id`, `category_id`, `course_id`, `created_at`, `updated_at`) VALUES
(15, 4, 8, '2023-05-17 07:00:05', '2023-05-17 07:00:05'),
(14, 6, 8, '2023-05-17 07:00:05', '2023-05-17 07:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_id` int NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL DEFAULT '0.00',
  `sale_price` double(8,2) NOT NULL DEFAULT '0.00',
  `code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `durations` double(8,2) NOT NULL DEFAULT '0.00',
  `is_document` tinyint(1) NOT NULL DEFAULT '0',
  `supports` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `slug`, `detail`, `teacher_id`, `thumbnail`, `price`, `sale_price`, `code`, `durations`, `is_document`, `supports`, `status`, `created_at`, `updated_at`) VALUES
(8, 'Laravel Online', 'laravel-online', '<p>zalo</p>', 1, '/storage/photos/shares/bien-vo-cuc-thai-binh-346.jpeg', 385000.00, 0.00, 'LaraOnl', 0.00, 1, '<p>mới</p>', 1, '2023-05-17 06:59:44', '2023-05-17 06:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_03_28_062451_creat_categories_table', 1),
(6, '2023_03_30_052714_create_courses_table', 2),
(7, '2023_04_02_112902_create_categories_courses_table', 3),
(8, '2023_04_14_052714_create_teachers_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `epx` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `slug`, `description`, `image`, `epx`, `created_at`, `updated_at`) VALUES
(4, 'update name', 'update-name', '<p>kinh nghiệm trong lĩnh vực lập t&igrave;nh website</p>', '/storage/photos/shares/bien-vo-cuc-thai-binh-346.jpeg', 3.00, '2023-05-17 08:26:48', '2023-05-17 08:34:18'),
(5, 'Đỗ Hùng Mạnh', 'do-hung-manh', '<p>&acirc;faf</p>', '/storage/photos/anh-gai-xinh-1.jpg', 12.00, '2023-05-17 09:00:24', '2023-05-17 09:00:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `group_id`, `email_verified_at`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Daisha Hauck', 'ethan69@hotmail.com', 2, NULL, '$2y$10$RutAiQ2SVCK6kvdGcar6v.Qb2W1juJcmX5czeuS78ByDtmt1bloye', NULL, NULL),
(2, 'Ms. Mariana Mosciski', 'ollie.kreiger@gmail.com', 2, NULL, '$2y$10$1TJkfl4Uc/wPPklTpBBGMuvgY51FuDs0APHRIcUfnY4VIoOQaGPl2', NULL, NULL),
(3, 'Alejandra Borer', 'neha.bradtke@hotmail.com', 2, NULL, '$2y$10$DVKQo.bAElM6sAu6vBSRx.Xtli1SJnKXepWB8e468bMdd4fHVQ5uS', NULL, NULL),
(4, 'Dagmar Pollich', 'derek.vandervort@hotmail.com', 2, NULL, '$2y$10$V1kQrEHbFdykef5ppysZ7.ai69PqxIcpdQ7HQVD.7eTju6loJU9Cy', NULL, NULL),
(5, 'Magali Halvorson', 'arden.orn@rice.com', 2, NULL, '$2y$10$qgVl5SLBvtuopHwirpqP4OPrYlRh2hMO/SA7VpjwMBqTqxlE/OMj6', NULL, NULL),
(6, 'Ulices O\'Reilly', 'conner.damore@crist.com', 2, NULL, '$2y$10$xQgodbzlH9AMoYS6MXLP2uOnRVlx1ngYExdgMAfDjDAYQglGlugba', NULL, NULL),
(7, 'Ms. Delphine Auer DDS', 'grady.odie@yost.com', 2, NULL, '$2y$10$CDnfh/kRGIhKHDb.qXLkw.R7O3W8kCroKcGUGaKQpUIM1soreNWfW', NULL, NULL),
(8, 'Maudie Marquardt V', 'emery16@gusikowski.com', 2, NULL, '$2y$10$ogsUHcRoq0uAM9rZUOH2GOKtwVB67TDot6c1UY0hFudZE/CyhTss.', NULL, NULL),
(9, 'Mitchel Bayer', 'rcollier@wintheiser.com', 2, NULL, '$2y$10$bt8KE.hDd9VuNVkqsOSEM.h2Db9xEoiJi52sB7O7DFIysRBvtvwPq', NULL, NULL),
(10, 'Dr. Burnice Haag', 'gwyman@gmail.com', 2, NULL, '$2y$10$qeYCIJYB6txPwV5HRDx49OwOIBAHLGG9.w/nAKspqZtW9A/hZAolS', NULL, NULL),
(11, 'Dr. Lesley Lakin I', 'rod87@yahoo.com', 2, NULL, '$2y$10$wSgTNnxvKoDAxAnXNapJOu10C.WmJndo5QNePyRaKbAcBjfcXK5c6', NULL, NULL),
(12, 'Destinee Turcotte', 'rhowell@collins.org', 2, NULL, '$2y$10$.wj0DUr9tKAUZ7ggAEf38.vpzPoDg57lRwsE06T8N8yXFq.WMtAcy', NULL, NULL),
(13, 'Raven Hayes', 'dfriesen@wiza.net', 2, NULL, '$2y$10$M0CuuaIEO3E8RESTwMgMIOJcskANMU2uaKVYyJoM8fvqr3/r7Khpu', NULL, NULL),
(14, 'Janis Herman', 'gaylord.erik@gmail.com', 2, NULL, '$2y$10$BL.ea7d9/i6ZEovQWbdEWOHoZFgCppzSq/kNszJxDhSBKEmgBZ.6K', NULL, NULL),
(15, 'Chadd Zboncak PhD', 'abernathy.jaron@tremblay.com', 2, NULL, '$2y$10$Nsw3CV0.QTG/8udPmimgXO3fUHyBVuNVZXeVti88shYj3LpaXpi3i', NULL, NULL),
(16, 'Marianna Steuber', 'pauline.littel@gmail.com', 2, NULL, '$2y$10$YytmdfTEsC2xH.Jne8WEwuGu264H0FlBd/hwmDo14IMcPWCIOLoV6', NULL, NULL),
(17, 'Noemy Schroeder IV', 'nichole.zemlak@yahoo.com', 2, NULL, '$2y$10$NywzdCnSoy6pPsVg1Qvr.u/Y8Ami1S8y7Nh5GF32lRElHCqKwt3w.', NULL, NULL),
(18, 'Gayle Mayert DVM', 'devante.yost@gmail.com', 2, NULL, '$2y$10$tmDT4j47fa20mA7rEBLx7uLSswi4uee9kGYmkY.jWnuobaP7bfJRa', NULL, NULL),
(19, 'Augustus Conn', 'lbogan@torp.net', 2, NULL, '$2y$10$5yYjiEZXFeRme5AFelkzxun6bueufy9MVT8j6siEdjkl.5XexQxSG', NULL, NULL),
(20, 'Orville Schultz PhD', 'nolan.sydney@blanda.info', 2, NULL, '$2y$10$MdYdpxT.stMSNsYPLxHziu.5oVuamjpmpgSKpIiZrRTUpz6WUDsOq', NULL, NULL),
(21, 'Ardith Swaniawski', 'tanner.kutch@watsica.com', 2, NULL, '$2y$10$m0JwRWGpX0/jtznQpjaZduJ3I6RZfQV9SREq3LAB5MJrsucVOUete', NULL, NULL),
(22, 'Savannah Spinka', 'dorothy.cremin@roob.biz', 2, NULL, '$2y$10$MHsHm/AjbrDKbrn42t2PyOpIDq6zpA35okwH8BOsyUNQVXCtrDNRi', NULL, NULL),
(23, 'Lester Mayert', 'legros.greta@legros.org', 2, NULL, '$2y$10$CLSw/YtUbsK3ZuT0UZS2f.5q/S1SWaL2RsLDSZeRg8u0SadpraBra', NULL, NULL),
(24, 'Jordan Conroy', 'wheidenreich@cummings.com', 2, NULL, '$2y$10$EMPlia5yp6flyA5/..LhA.5iw5AUvovO97da3USjAW5p6TSAWYct6', NULL, NULL),
(25, 'Prof. Edgar Hagenes PhD', 'bkoelpin@aufderhar.com', 2, NULL, '$2y$10$CL8CqZjrI5FD6EDW6PtCDOWJoiTjpRGnXW4E1TRdvaOdJQHmN9odO', NULL, NULL),
(26, 'Frederic Rippin', 'roslyn52@runte.com', 2, NULL, '$2y$10$LojgUO4SFNDqT1lVN6ZdveckTQSiIpWVfQkV1ecNucMb/tKT5OsiC', NULL, NULL),
(27, 'Jaren Rath', 'golden81@fisher.com', 2, NULL, '$2y$10$YQu4gEoxxumRqphK9A0sbOMw53l0viSpBjp4RY66/7TQMomB6uu7K', NULL, NULL),
(28, 'Dr. Maiya Heaney', 'edmond80@gmail.com', 2, NULL, '$2y$10$JSENx2ztkAYW54dNf4PHPeoLiKENyyVFKa/3TtBoaO3VH/FTW6Jr.', NULL, NULL),
(29, 'Kacey Zboncak', 'gbins@hotmail.com', 2, NULL, '$2y$10$9LVR2XKlpNnuaw0ecEnuIuUiWCgaPl6o/79NdZg7xtWaExfQoBvIC', NULL, NULL),
(30, 'Keven Kemmer', 'orrin39@grimes.com', 2, NULL, '$2y$10$wb5d5W46zvwsRR29Zo4UjupmlzrHcHf3.xcdVws46RHCrQy/jfJZK', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
