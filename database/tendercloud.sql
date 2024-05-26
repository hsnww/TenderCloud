-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 26, 2024 at 07:20 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tendercloud`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'الصيانة والنظافة', '2024-05-25 17:41:24', '2024-05-25 17:41:24'),
(2, 'الإنشاء', '2024-05-25 17:41:24', '2024-05-25 17:41:24'),
(3, 'توريد المواد الغذائية', '2024-05-25 17:41:24', '2024-05-25 17:41:24'),
(4, 'الإعاشة', '2024-05-25 17:41:24', '2024-05-25 17:41:24'),
(5, 'التدريب والتعليم', '2024-05-25 17:41:24', '2024-05-25 17:41:24'),
(6, 'الصحة', '2024-05-25 17:41:24', '2024-05-25 17:41:24');

-- --------------------------------------------------------

--
-- Table structure for table `bid_requests`
--

CREATE TABLE `bid_requests` (
  `id` bigint UNSIGNED NOT NULL,
  `company_id` bigint UNSIGNED NOT NULL,
  `project_id` bigint UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1716552196),
('356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1716552196;', 1716552196);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `industry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employees_count` int NOT NULL,
  `established_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `city`, `address`, `industry`, `email`, `phone`, `mobile`, `employees_count`, `established_at`, `created_at`, `updated_at`) VALUES
(1, 'شركة البناء المتقدمة', 'الرياض', 'شارع الملك فهد', 'البناء', 'info@advancedbuild.com', '0112345678', '0551234567', 150, '2005-03-15', NULL, NULL),
(2, 'مؤسسة التكنولوجيا الحديثة', 'جدة', 'حي الروضة', 'التكنولوجيا', 'info@moderntech.com', '0123456789', '0562345678', 75, '2010-06-20', NULL, NULL),
(3, 'مصنع الأثاث الراقي', 'الدمام', 'شارع الملك سعود', 'الأثاث', 'info@luxuryfurniture.com', '0134567890', '0573456789', 120, '1998-11-25', NULL, NULL),
(4, 'شركة المعدات الثقيلة', 'الرياض', 'حي العليا', 'المعدات', 'info@heavyequipment.com', '0115678901', '0584567890', 200, '2012-02-10', NULL, NULL),
(5, 'مؤسسة الزراعة الخضراء', 'المدينة المنورة', 'حي الجامعة', 'الزراعة', 'info@greenagriculture.com', '0146789012', '0595678901', 60, '2007-09-05', NULL, NULL),
(6, 'مصنع الإلكترونيات الذكية', 'جدة', 'شارع الأمير سلطان', 'الإلكترونيات', 'info@smartelectronics.com', '0127890123', '0506789012', 100, '2015-04-12', NULL, NULL),
(7, 'شركة النقل السريع', 'الدمام', 'حي الشاطئ', 'النقل', 'info@fastransport.com', '0138901234', '0517890123', 90, '2003-08-18', NULL, NULL),
(8, 'مؤسسة المياه النقية', 'الرياض', 'حي الصحافة', 'المياه', 'info@purewater.com', '0119012345', '0528901234', 130, '2009-01-22', NULL, NULL),
(9, 'مصنع الملابس العصرية', 'جدة', 'شارع التحلية', 'الملابس', 'info@modernfashion.com', '0120123456', '0539012345', 80, '2011-07-30', NULL, NULL),
(10, 'شركة الطاقة المستدامة', 'الدمام', 'شارع الخليج', 'الطاقة', 'info@sustainableenergy.com', '0131234567', '0540123456', 110, '2006-12-14', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_05_25_145833_create_companies_table', 2),
(5, '2024_05_25_145838_create_contractors_table', 2),
(6, '2024_05_25_145850_create_projects_table', 2),
(7, '2024_05_25_150134_create_bid_requests_table', 2),
(8, '2024_05_25_150218_create_project_awards_table', 2),
(9, '2024_05_25_161418_create_tenders_table', 3),
(10, '2024_05_25_161430_create_vendors_table', 3),
(11, '2024_05_25_150218_create_tender_awards_table.php', 1),
(12, '2024_05_25_150218_create_tender_awards_table', 4),
(13, '2024_05_25_173510_create_activities_table', 4),
(14, '2024_05_25_173522_create_project_types_table', 4),
(15, '2024_05_26_060520_add_mobile_to_users_table', 5),
(16, '2024_05_26_064038_create_permission_tables', 6);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 7),
(3, 'App\\Models\\User', 8),
(3, 'App\\Models\\User', 9),
(3, 'App\\Models\\User', 10),
(3, 'App\\Models\\User', 11),
(3, 'App\\Models\\User', 12),
(3, 'App\\Models\\User', 13),
(3, 'App\\Models\\User', 14),
(4, 'App\\Models\\User', 15),
(4, 'App\\Models\\User', 16),
(4, 'App\\Models\\User', 17),
(4, 'App\\Models\\User', 18),
(3, 'App\\Models\\User', 19),
(3, 'App\\Models\\User', 21),
(3, 'App\\Models\\User', 22),
(3, 'App\\Models\\User', 23),
(4, 'App\\Models\\User', 24),
(4, 'App\\Models\\User', 25),
(3, 'App\\Models\\User', 26),
(3, 'App\\Models\\User', 29),
(3, 'App\\Models\\User', 32),
(4, 'App\\Models\\User', 34),
(3, 'App\\Models\\User', 36),
(3, 'App\\Models\\User', 37),
(4, 'App\\Models\\User', 38),
(3, 'App\\Models\\User', 39),
(3, 'App\\Models\\User', 40),
(4, 'App\\Models\\User', 41),
(3, 'App\\Models\\User', 42),
(3, 'App\\Models\\User', 44),
(3, 'App\\Models\\User', 45),
(3, 'App\\Models\\User', 46),
(3, 'App\\Models\\User', 47),
(3, 'App\\Models\\User', 48),
(3, 'App\\Models\\User', 50);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_types`
--

CREATE TABLE `project_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_types`
--

INSERT INTO `project_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'مناقصة عامة', '2024-05-25 17:43:40', '2024-05-25 17:43:40'),
(2, 'دعوات خاصة', '2024-05-25 17:43:40', '2024-05-25 17:43:40'),
(3, 'شراء مباشر', '2024-05-25 17:43:40', '2024-05-25 17:43:40');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'web', '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(2, 'moderator', 'web', '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(3, 'vendor_member', 'web', '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(4, 'company_member', 'web', '2024-05-24 08:12:17', '2024-05-24 08:12:17');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4nFweJMyvKjXiGO6ceE14mROj1uZmQJsIUzo4Jmm', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVUhoeEo1Tk9BalNWMUhmdVpXcFI2RVU2ZVA2MUhibFcyQ3oyWWdEUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1716700995),
('LcEulbv9dyneUx3WiHhDt3zAkT72FNUCOAqm9MBh', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiV1hUT2s5VlI4N2pIUkhKVk4wRURvZ2NtbWgwRFNEYmp2UGo0aldZdSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1716662288),
('qltZ6xsa0yx4h9F9TkmSJBIp52JFAeLg9XIsfW0G', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNHRHaWtlNFFiVUFMbHdQbjR1S3hRUVlBdnhzUEJ0c1hzZGJoVHM5dyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1716665130);

-- --------------------------------------------------------

--
-- Table structure for table `tenders`
--

CREATE TABLE `tenders` (
  `id` bigint UNSIGNED NOT NULL,
  `company_id` bigint UNSIGNED NOT NULL,
  `activity_id` int NOT NULL DEFAULT '1',
  `project_type_id` int NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` date NOT NULL,
  `submission_deadline` date NOT NULL,
  `opening_date` date NOT NULL,
  `document_fee` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tenders`
--

INSERT INTO `tenders` (`id`, `company_id`, `activity_id`, `project_type_id`, `name`, `description`, `release_date`, `submission_deadline`, `opening_date`, `document_fee`, `created_at`, `updated_at`) VALUES
(45, 1, 1, 1, 'مشروع بناء مدرسة', 'بناء مدرسة جديدة في حي الربيع لتوفير التعليم الأساسي لطلاب المنطقة.', '2024-01-10', '2024-02-15', '2024-02-20', '5000.00', '2024-04-30 17:52:30', '2024-05-12 17:52:30'),
(46, 2, 2, 2, 'مشروع تطوير نظام معلومات', 'تطوير نظام معلومات متكامل لإدارة البيانات في المؤسسة.', '2024-01-15', '2024-02-20', '2024-02-25', '7500.00', '2024-05-07 17:52:30', '2024-05-05 17:52:30'),
(47, 3, 3, 3, 'مشروع إنشاء حديقة عامة', 'إنشاء حديقة عامة تشمل مناطق للجلوس وألعاب للأطفال وممرات للمشاة.', '2024-01-20', '2024-02-25', '2024-03-01', '6000.00', '2024-05-10 17:52:30', '2024-05-11 17:52:30'),
(48, 4, 1, 1, 'مشروع تحسين البنية التحتية', 'تحسين وتطوير البنية التحتية للطرق والشوارع في حي النخيل.', '2024-01-25', '2024-03-01', '2024-03-05', '8500.00', '2024-04-28 17:52:30', '2024-05-23 17:52:30'),
(49, 5, 2, 2, 'مشروع تصميم موقع إلكتروني', 'تصميم وتطوير موقع إلكتروني تفاعلي للمؤسسة.', '2024-02-01', '2024-03-05', '2024-03-10', '4000.00', '2024-05-05 17:52:30', '2024-05-24 17:52:30'),
(50, 6, 3, 3, 'مشروع تجهيز مركز طبي', 'تجهيز مركز طبي بأحدث الأجهزة والمعدات الطبية.', '2024-02-05', '2024-03-10', '2024-03-15', '10000.00', '2024-05-20 17:52:30', '2024-05-02 17:52:30'),
(51, 7, 1, 1, 'مشروع صيانة مباني', 'صيانة وترميم مباني المؤسسة لتحسين جودة البيئة العمل.', '2024-02-10', '2024-03-15', '2024-03-20', '7000.00', '2024-05-18 17:52:30', '2024-04-29 17:52:30'),
(52, 8, 2, 2, 'مشروع تركيب أنظمة طاقة شمسية', 'تركيب أنظمة طاقة شمسية لتوفير الكهرباء للمباني.', '2024-02-15', '2024-03-20', '2024-03-25', '9000.00', '2024-05-06 17:52:30', '2024-05-09 17:52:30'),
(53, 9, 3, 3, 'مشروع تحسين شبكة المياه', 'تحسين وتطوير شبكة المياه في حي الأندلس لتوفير مياه نقية للسكان.', '2024-02-20', '2024-03-25', '2024-03-30', '8000.00', '2024-05-02 17:52:30', '2024-05-20 17:52:30'),
(54, 10, 1, 1, 'مشروع بناء مستودع', 'بناء مستودع جديد لتخزين المواد الخام والمنتجات النهائية.', '2024-02-25', '2024-04-01', '2024-04-05', '6500.00', '2024-05-07 17:52:30', '2024-05-10 17:52:30'),
(55, 1, 2, 2, 'مشروع تطوير تطبيق موبايل', 'تطوير تطبيق موبايل للتواصل مع العملاء وإدارة الطلبات.', '2024-03-01', '2024-04-05', '2024-04-10', '5500.00', '2024-05-06 17:52:30', '2024-05-07 17:52:30'),
(56, 2, 3, 3, 'مشروع إعادة تأهيل متنزه', 'إعادة تأهيل متنزه قديم وتحسين المساحات الخضراء والمرافق العامة.', '2024-03-05', '2024-04-10', '2024-04-15', '7500.00', '2024-05-22 17:52:30', '2024-05-02 17:52:30'),
(57, 3, 1, 1, 'مشروع تصميم هوية بصرية', 'تصميم هوية بصرية جديدة وشاملة للمؤسسة.', '2024-03-10', '2024-04-15', '2024-04-20', '3000.00', '2024-05-13 17:52:30', '2024-05-03 17:52:30'),
(58, 4, 2, 2, 'مشروع تجهيز مختبر علمي', 'تجهيز مختبر علمي بأحدث الأجهزة والمعدات التعليمية.', '2024-03-15', '2024-04-20', '2024-04-25', '9500.00', '2024-05-10 17:52:30', '2024-05-18 17:52:30'),
(59, 5, 3, 3, 'مشروع صيانة أنظمة التكييف', 'صيانة شاملة لأنظمة التكييف في مباني المؤسسة.', '2024-03-20', '2024-04-25', '2024-04-30', '6000.00', '2024-05-07 17:52:30', '2024-05-15 17:52:30'),
(60, 6, 1, 1, 'مشروع تركيب كاميرات مراقبة', 'تركيب نظام كاميرات مراقبة متكامل لتحسين الأمن والحماية.', '2024-03-25', '2024-04-30', '2024-05-05', '4000.00', '2024-04-29 17:52:30', '2024-05-18 17:52:30'),
(61, 7, 2, 2, 'مشروع تطوير منصة تعليمية', 'تطوير منصة تعليمية عبر الإنترنت لتوفير الدروس والمواد التعليمية.', '2024-04-01', '2024-05-05', '2024-05-10', '8000.00', '2024-05-07 17:52:30', '2024-05-17 17:52:30'),
(62, 8, 3, 3, 'مشروع إنشاء محطة معالجة مياه', 'إنشاء محطة لمعالجة مياه الصرف الصحي وتحويلها إلى مياه صالحة للاستخدام.', '2024-04-05', '2024-05-10', '2024-05-15', '12000.00', '2024-05-10 17:52:30', '2024-05-06 17:52:30'),
(63, 1, 1, 1, 'مشروع تصميم تطبيق ويب', 'تصميم وتطوير تطبيق ويب لإدارة العمليات الداخلية للمؤسسة.', '2024-04-10', '2024-05-15', '2024-05-20', '7000.00', '2024-05-04 17:52:30', '2024-05-08 17:52:30'),
(64, 2, 2, 2, 'مشروع تجهيز قاعة اجتماعات', 'تجهيز قاعة اجتماعات بأثاث ومعدات حديثة.', '2024-04-15', '2024-05-20', '2024-05-25', '5000.00', '2024-05-03 17:52:30', '2024-04-26 17:52:30'),
(65, 1, 3, 3, 'مشروع بناء مجمع سكني', 'بناء مجمع سكني حديث لتوفير السكن للموظفين.', '2024-04-20', '2024-05-25', '2024-05-30', '15000.00', '2024-05-07 17:52:30', '2024-05-20 17:52:30'),
(66, 2, 1, 1, 'مشروع تطوير نظام أمان', 'تطوير نظام أمان متكامل يشمل أجهزة الإنذار والكاميرات والبوابات الإلكترونية.', '2024-04-25', '2024-05-30', '2024-06-04', '9000.00', '2024-04-28 17:52:30', '2024-05-23 17:52:30'),
(67, 3, 2, 2, 'مشروع تحسين شبكة الكهرباء', 'تحسين شبكة الكهرباء في المنطقة لضمان استمرارية الخدمة.', '2024-05-01', '2024-06-05', '2024-06-10', '10000.00', '2024-05-05 17:52:30', '2024-04-25 17:52:30'),
(68, 4, 3, 3, 'مشروع تجهيز مركز تدريب', 'تجهيز مركز تدريب مجهز بأحدث التقنيات والأدوات التعليمية.', '2024-05-05', '2024-06-10', '2024-06-15', '11000.00', '2024-04-25 17:52:30', '2024-05-24 17:52:30'),
(69, 5, 1, 1, 'مشروع تصميم وبرمجة لعبة تعليمية', 'تصميم وبرمجة لعبة تعليمية تفاعلية للأطفال.', '2024-05-10', '2024-06-15', '2024-06-20', '6000.00', '2024-05-23 17:52:30', '2024-05-18 17:52:30'),
(70, 6, 2, 2, 'مشروع تطوير مصنع', 'تطوير وتحسين مصنع لزيادة الإنتاجية والكفاءة.', '2024-05-15', '2024-06-20', '2024-06-25', '13000.00', '2024-04-27 17:52:30', '2024-05-24 17:52:30'),
(71, 7, 3, 3, 'مشروع إنشاء مسرح', 'إنشاء مسرح حديث مجهز بأحدث التقنيات الصوتية والبصرية.', '2024-05-20', '2024-06-25', '2024-06-30', '14000.00', '2024-05-15 17:52:30', '2024-05-11 17:52:30'),
(72, 8, 1, 1, 'مشروع تطوير تطبيق محاسبي', 'تطوير تطبيق محاسبي لإدارة الحسابات والفواتير.', '2024-05-25', '2024-06-30', '2024-07-05', '7000.00', '2024-05-14 17:52:30', '2024-05-10 17:52:30'),
(73, 9, 2, 2, 'مشروع تجهيز مختبر بيئي', 'تجهيز مختبر بيئي لتحليل العينات البيئية.', '2024-06-01', '2024-07-05', '2024-07-10', '12000.00', '2024-05-17 17:52:30', '2024-05-01 17:52:30'),
(74, 3, 3, 3, 'مشروع تطوير منصة تجارة إلكترونية', 'تطوير منصة تجارة إلكترونية لبيع المنتجات عبر الإنترنت.', '2024-06-05', '2024-07-10', '2024-07-15', '9000.00', '2024-05-17 17:52:30', '2024-04-28 17:52:30'),
(75, 1, 1, 1, 'مشروع بناء قاعة مؤتمرات', 'بناء قاعة مؤتمرات حديثة تستوعب عدد كبير من الحضور.', '2024-06-10', '2024-07-15', '2024-07-20', '16000.00', '2024-05-04 17:52:30', '2024-05-03 17:52:30'),
(76, 2, 2, 2, 'مشروع تصميم نظام إدارة محتوى', 'تصميم نظام إدارة محتوى لتسهيل إدارة الموقع الإلكتروني.', '2024-06-15', '2024-07-20', '2024-07-25', '8000.00', '2024-05-10 17:52:30', '2024-05-14 17:52:30'),
(77, 3, 3, 3, 'مشروع تطوير نظام حجز مواعيد', 'تطوير نظام حجز مواعيد عبر الإنترنت للعيادات والمستشفيات.', '2024-06-20', '2024-07-25', '2024-07-30', '10000.00', '2024-05-15 17:52:30', '2024-05-11 17:52:30'),
(78, 4, 1, 1, 'مشروع إنشاء ملعب رياضي', 'إنشاء ملعب رياضي متكامل للأنشطة الرياضية المختلفة.', '2024-06-25', '2024-07-30', '2024-08-04', '14000.00', '2024-05-15 17:52:30', '2024-05-17 17:52:30'),
(79, 5, 2, 2, 'مشروع تطوير نظام موارد بشرية', 'تطوير نظام لإدارة الموارد البشرية وتحسين عمليات التوظيف والتقييم.', '2024-07-01', '2024-08-05', '2024-08-10', '8500.00', '2024-05-16 17:52:30', '2024-05-04 17:52:30'),
(80, 6, 3, 3, 'مشروع تجهيز مركز لياقة بدنية', 'تجهيز مركز لياقة بدنية بأحدث المعدات الرياضية.', '2024-07-05', '2024-08-10', '2024-08-15', '15000.00', '2024-05-09 17:52:30', '2024-05-07 17:52:30'),
(81, 7, 1, 1, 'مشروع إنشاء محطة وقود', 'إنشاء محطة وقود جديدة لتلبية احتياجات المنطقة.', '2024-07-10', '2024-08-15', '2024-08-20', '13000.00', '2024-05-15 17:52:30', '2024-04-27 17:52:30'),
(82, 8, 2, 2, 'مشروع تطوير نظام تخزين سحابي', 'تطوير نظام تخزين سحابي لتخزين البيانات والوصول إليها عبر الإنترنت.', '2024-07-15', '2024-08-20', '2024-08-25', '11000.00', '2024-05-06 17:52:30', '2024-05-15 17:52:30'),
(83, 9, 3, 3, 'مشروع تصميم تطبيق تعلم لغات', 'تصميم تطبيق لتعلم اللغات الأجنبية بشكل تفاعلي.', '2024-07-20', '2024-08-25', '2024-08-30', '7000.00', '2024-05-01 17:52:30', '2024-04-25 17:52:30'),
(84, 10, 1, 1, 'مشروع تطوير نظام تتبع مركبات', 'تطوير نظام لتتبع المركبات وإدارة الأسطول بشكل فعال.', '2024-07-25', '2024-08-30', '2024-09-04', '9000.00', '2024-05-07 17:52:30', '2024-04-25 17:52:30'),
(85, 1, 2, 2, 'مشروع بناء فندق', 'بناء فندق حديث لتوفير الإقامة الفاخرة للزوار.', '2024-08-01', '2024-09-05', '2024-09-10', '20000.00', '2024-05-19 17:52:30', '2024-04-25 17:52:30'),
(86, 2, 3, 3, 'مشروع تجهيز مصنع أغذية', 'تجهيز مصنع أغذية بأحدث المعدات والتقنيات لزيادة الإنتاجية.', '2024-08-05', '2024-09-10', '2024-09-15', '15000.00', '2024-05-16 17:52:30', '2024-05-11 17:52:30'),
(87, 3, 1, 1, 'مشروع تطوير تطبيق صحة شخصية', 'تطوير تطبيق لمتابعة الصحة الشخصية والنشاطات الرياضية.', '2024-08-10', '2024-09-15', '2024-09-20', '6000.00', '2024-05-12 17:52:30', '2024-05-01 17:52:30'),
(88, 4, 2, 2, 'مشروع إنشاء مكتبة عامة', 'إنشاء مكتبة عامة تشمل مجموعة كبيرة من الكتب والمراجع.', '2024-08-15', '2024-09-20', '2024-09-25', '18000.00', '2024-05-04 17:52:30', '2024-05-24 17:52:30');

-- --------------------------------------------------------

--
-- Table structure for table `tender_awards`
--

CREATE TABLE `tender_awards` (
  `id` bigint UNSIGNED NOT NULL,
  `company_id` bigint UNSIGNED NOT NULL,
  `tender_id` bigint UNSIGNED NOT NULL,
  `vendor_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hassan Alzahrani', 'hsnwww@gmail.com', '966505943390', '2024-05-26 06:50:38', '$2y$12$wIumIOtWEQPa4y1bkX3t8e9iCt6zA8hwvaL5bCJ5gytRVbsq3vnM.', 'CDBrtyq4elnok0Irq8JeBUxtB3lVYPj9zRM8upSfuSvdrCh8HpdPrwFCZgA8', '2024-05-24 08:12:17', '2024-05-24 09:02:16'),
(2, 'بلماء أبو داوود', 'ryf64@gmail.com', '9665554478506', '2024-05-26 06:50:38', 'LE9ZKEaX+Y', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(3, 'السيدة بشرى آل رفيع', 'wsylal-tf@gmail.com', '9665782129381', '2024-05-26 06:50:38', '$84HOcigM@', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(4, 'بهية آل خضير', 'wdy47@b.com', '9665122486027', '2024-05-26 06:50:38', '#ikRUFpg4l', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(5, 'المهندسة بلسم آل سعود', 'bw-dwwdrby@lmshwl.org', '9665551454525', '2024-05-26 06:50:38', '^1ehJVlvoX', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(6, 'الأستاذ نور آل حسين', 'tlthnbwly@al.biz', '9665191205103', '2024-05-26 06:50:38', ')%GTtm6p&8', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(7, 'بتلاء آل صفوان', 'btl27@bw.com', '9665458465845', '2024-05-26 06:50:38', 's(I80Nags)', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(8, 'السيد عمّار آل بن لافي', 'kbyr17@lmhn.info', '9665167713660', '2024-05-26 06:50:38', 'V!Q*2UjyGI', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(9, 'الآنسة بنان آل مقطة', 'hlym96@yahoo.com', '9665437395002', '2024-05-26 06:50:38', 'TN1kRL$o^7', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(10, 'الأستاذة ديمه أبا الخيل', 'tj-ldwynknw@yahoo.com', '9665148536270', '2024-05-26 06:50:38', '$_fRrSs44$', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(11, 'السيدة كوثر آل علي', 'al-qsyrtmr@yahoo.com', '9665238170251', '2024-05-26 06:50:38', 'r0GApaHt#V', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(12, 'حلا مهنا', 'slhkyr@gmail.com', '9665858967415', '2024-05-26 06:50:38', 'F4hJyJpO&3', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(13, 'الدكتورة شهد كانو', 'vlrshd@lmshwl-lqyl.biz', '9665684125524', '2024-05-26 06:50:38', '*S2YPrvi%g', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(14, 'ريف أبا الخيل', 'sdymlshy@yahoo.com', '9665493797350', '2024-05-26 06:50:38', 'odr2V0EJ@&', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(15, 'الدكتورة لوجين الحكير', 'khsh79@ldbg.org', '9665571504209', '2024-05-26 06:50:38', '_81Mg8xtgY', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(16, 'الآنسة لوجين الجفالي', 'al-jfral@lmhydb.com', '9665407410391', '2024-05-26 06:50:38', '&9YOLIp796', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(17, 'جميلة آل محمد بن علي بن جماز', 'lrshdkml@fsyl.biz', '9665866676184', '2024-05-26 06:50:38', ')H0WfZ*h74', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(18, 'جمال آل مقطة', 'mdhtljfly@gmail.com', '9665272314197', '2024-05-26 06:50:38', '9y2v5#WkE_', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(19, 'الأستاذة بنان آل صفوان', 'zhral-jfr@b.net', '9665868223125', '2024-05-26 06:50:38', '@84QKiI11+', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(20, 'عالية أبا الخيل', 'wthwb20@yahoo.com', '9665992272544', '2024-05-26 06:50:38', '!n#($8P1*9', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(21, 'السيدة محمد آل سلطان', 'clhkyr@ldbg.org', '9665687386546', '2024-05-26 06:50:38', '56$BkdhA_8', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(22, 'الدكتورة راما آل العسكري', 'srhn77@hnbwly.com', '9665419918221', '2024-05-26 06:50:38', '(5uO)jo@_q', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(23, 'مُرسي آل خضير', 'rljbr@hotmail.com', '9665931992190', '2024-05-26 06:50:38', 'r&145aHv5)', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(24, 'شبيب آل عواض', 'hmydal-lskry@ljbr.com', '9665495189804', '2024-05-26 06:50:38', 'j7M#7FzdpZ', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(25, 'جيلان الدباغ', 'knwftwh@al.info', '9665714033612', '2024-05-26 06:50:38', '@pTGXwQiW0', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(26, 'الأستاذ حليم بقشان', 'b-lkhylsbh@hotmail.com', '9665716514325', '2024-05-26 06:50:38', '3ZJL^N@t%0', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(27, 'الدكتورة هند آل سعود', 'hal-mhmd-bn-ly-bn-jmz@fsyl.biz', '9665309499025', '2024-05-26 06:50:38', 'D)qn7JDjPK', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(28, 'الدكتورة هايدي آل عواض', 'sbh22@lhkyr.com', '9665942506615', '2024-05-26 06:50:38', '21TDRaY6(7', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(29, 'سمير آل بن لافي', 'yn50@lmshwl.info', '9665628421150', '2024-05-26 06:50:38', 'q+5f52YpJ&', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(30, 'حيدر أبو داوود', 'al-khdyrysry@hotmail.com', '9665228418155', '2024-05-26 06:50:38', '_4ZSOvRr5B', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(31, 'السيدة جمان حنبولي', 'rlmhydb@al.com', '9665715311421', '2024-05-26 06:50:38', 'y9v+2LKcPM', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(32, 'وسجايا حجار', 'shbly32@al.com', '9665989777748', '2024-05-26 06:50:38', '8HIH96Uah+', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(33, 'المهندس فادي الجفالي', 'lb-lkhyl@yahoo.com', '9665673684605', '2024-05-26 06:50:38', 'u79M%Tmp)2', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(34, 'المهندس خالدي آل عواض', 'lshytmwh@al.info', '9665487252402', '2024-05-26 06:50:38', 'zL9P&2j%v(', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(35, 'بوران الدباغ', 'mhdy13@shrbtly-al.info', '9665439936930', '2024-05-26 06:50:38', '4SlSyPUv*4', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(36, 'الأستاذ هيمان العجلان', 'lkhrfysbhy@gmail.com', '9665955247434', '2024-05-26 06:50:38', ')1LrU9qCfG', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(37, 'السيدة ضحى المهيدب', 'cknw@lmshwl.info', '9665331346933', '2024-05-26 06:50:38', '#7zXSMzDGl', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(38, 'الأستاذ راسم آل مقطة', 'ual-tf@yahoo.com', '9665253910913', '2024-05-26 06:50:38', '^mrYGa@6l3', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(39, 'عائد آل حسين', 'nal-sfwn@knw.com', '9665856654510', '2024-05-26 06:50:38', '$1_9Zm(h_S', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(40, 'حبّاب الراشد', 'nal-mqt@hotmail.com', '9665704296436', '2024-05-26 06:50:38', 'b(7m^MAxkA', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(41, 'السيد نبراس آل قصير', 'olmgwl@gmail.com', '9665933224345', '2024-05-26 06:50:38', 'z0FD9#Yo)6', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(42, 'الأستاذة سجى مهنا', 'mal-hsyn@gmail.com', '9665622978364', '2024-05-26 06:50:38', 'x(iu6Ga8Bt', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(43, 'عتاب آل العسكري', 'al-jfrtryf@lshy.com', '9665837264211', '2024-05-26 06:50:38', 'cZc6!5Xa#h', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(44, 'المهندسة جلنار الحجار', 'jswr41@hotmail.com', '9665301745114', '2024-05-26 06:50:38', 'l6QtjDh@&S', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(45, 'ناجح آل بن لافي', 'al-sltnwdy@yahoo.com', '9665812837003', '2024-05-26 06:50:38', 'rKn33UpbB(', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(46, 'ريمان آل خضير', 'zhr79@yahoo.com', '9665616595783', '2024-05-26 06:50:38', '*34aDssQZ)', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(47, 'الآنسة بلند أبا الخيل', 'al-rfywsf@al.com', '9665943620909', '2024-05-26 06:50:38', '2!7X^+ixq!', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(48, 'الدكتورة ريما آل معيض', 'hal-bn-zfr@fsyl-al.info', '9665380015746', '2024-05-26 06:50:38', 'B(7SDwH3+s', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(49, 'السيد وريد آل سلطان', 'slymal-khdyr@al.info', '9665200101946', '2024-05-26 06:50:38', ')85RvvmgZ+', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17'),
(50, 'الأستاذة نشوة شربتلي', 'al-bn-lfyjd@gmail.com', '9665742268885', '2024-05-26 06:50:38', 'dM4q&0Iv(1', NULL, '2024-05-24 08:12:17', '2024-05-24 08:12:17');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `industry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employees_count` int NOT NULL,
  `established_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `city`, `address`, `industry`, `email`, `phone`, `mobile`, `employees_count`, `established_at`, `created_at`, `updated_at`) VALUES
(1, 'شركة البناء الحديثة', 'الرياض', 'شارع الحرمين', 'البناء', 'info@modernbuild.com', '0112345670', '0551234570', 100, '2008-05-12', NULL, NULL),
(2, 'مؤسسة البرمجة الذكية', 'جدة', 'حي النهضة', 'البرمجة', 'info@smartcoding.com', '0123456781', '0562345671', 50, '2013-03-23', NULL, NULL),
(3, 'شركة التصميم الجرافيكي', 'الدمام', 'شارع الملك عبدالعزيز', 'التصميم', 'info@graphicdesign.com', '0134567892', '0573456782', 40, '2001-10-19', NULL, NULL),
(4, 'مؤسسة النقل البحري', 'الرياض', 'حي الخليج', 'النقل', 'info@maritimetransport.com', '0115678903', '0584567893', 150, '2005-01-28', NULL, NULL),
(5, 'شركة الأبحاث العلمية', 'المدينة المنورة', 'حي النخيل', 'الأبحاث', 'info@scienceresearch.com', '0146789014', '0595678904', 60, '2010-09-30', NULL, NULL),
(6, 'مصنع الإلكترونيات المتطورة', 'جدة', 'شارع المكرونة', 'الإلكترونيات', 'info@advancedelectronics.com', '0127890125', '0506789015', 90, '2018-06-11', NULL, NULL),
(7, 'شركة الصيانة العامة', 'الدمام', 'حي الورود', 'الصيانة', 'info@generalmaintenance.com', '0138901236', '0517890126', 80, '2000-12-21', NULL, NULL),
(8, 'مؤسسة الحدائق الخضراء', 'الرياض', 'حي الربيع', 'الزراعة', 'info@greenparks.com', '0119012347', '0528901237', 70, '2006-04-17', NULL, NULL),
(9, 'شركة الطباعة المتقدمة', 'جدة', 'شارع الأمير ماجد', 'الطباعة', 'info@advancedprinting.com', '0120123458', '0539012348', 50, '2012-11-09', NULL, NULL),
(10, 'مصنع الأدوات الصحية', 'الدمام', 'شارع الأمير محمد', 'الأدوات الصحية', 'info@healthcaretools.com', '0131234569', '0540123459', 100, '2007-03-29', NULL, NULL),
(11, 'شركة البرمجيات السحابية', 'الرياض', 'حي العليا', 'البرمجيات', 'info@cloudsoftware.com', '0112345671', '0551234571', 120, '2014-08-13', NULL, NULL),
(12, 'مؤسسة الأثاث المنزلي', 'جدة', 'حي السلام', 'الأثاث', 'info@homefurniture.com', '0123456782', '0562345672', 70, '2001-05-22', NULL, NULL),
(13, 'شركة الطاقة الشمسية', 'الدمام', 'شارع الخليج', 'الطاقة', 'info@solarenergy.com', '0134567893', '0573456783', 90, '2015-12-06', NULL, NULL),
(14, 'مؤسسة التعليم الالكتروني', 'الرياض', 'حي الحمراء', 'التعليم', 'info@elearning.com', '0115678904', '0584567894', 50, '2009-07-18', NULL, NULL),
(15, 'مصنع الملابس الرياضية', 'جدة', 'شارع الأمير عبدالله', 'الملابس', 'info@sportswear.com', '0127890126', '0506789016', 60, '2017-01-25', NULL, NULL),
(16, 'شركة السياحة والسفر', 'الدمام', 'شارع الأمير تركي', 'السياحة', 'info@tourismtravel.com', '0138901237', '0517890127', 80, '2000-09-14', NULL, NULL),
(17, 'مؤسسة الديكور الداخلي', 'الرياض', 'حي النزهة', 'الديكور', 'info@interiordecor.com', '0119012348', '0528901238', 100, '2011-06-28', NULL, NULL),
(18, 'شركة الإلكترونيات الحديثة', 'جدة', 'حي الروضة', 'الإلكترونيات', 'info@modernelectronics.com', '0120123459', '0539012349', 90, '2003-02-03', NULL, NULL),
(19, 'مصنع الأجهزة الطبية', 'الدمام', 'شارع الأمير نايف', 'الأجهزة الطبية', 'info@medicaldevices.com', '0131234570', '0540123460', 110, '2010-10-15', NULL, NULL),
(20, 'شركة الأزياء الراقية', 'الرياض', 'حي الملك عبدالله', 'الأزياء', 'info@luxuryfashion.com', '0112345672', '0551234572', 70, '2004-04-10', NULL, NULL),
(21, 'مؤسسة البناء المقاولات', 'جدة', 'حي النخيل', 'البناء', 'info@construction.com', '0123456783', '0562345673', 150, '2016-09-23', NULL, NULL),
(22, 'شركة الزراعة العضوية', 'الدمام', 'شارع الملك فيصل', 'الزراعة', 'info@organicfarming.com', '0134567894', '0573456784', 80, '2007-11-12', NULL, NULL),
(23, 'مؤسسة التقنية الحديثة', 'الرياض', 'حي الملك فهد', 'التكنولوجيا', 'info@moderntech.com', '0115678905', '0584567895', 100, '2013-05-19', NULL, NULL),
(24, 'شركة المقاولات الكبرى', 'جدة', 'حي الأندلس', 'المقاولات', 'info@bigcontractors.com', '0127890127', '0506789017', 200, '2002-08-27', NULL, NULL),
(25, 'مصنع الزجاج والمرآة', 'الدمام', 'شارع الأمير سعود', 'الزجاج', 'info@glassmirror.com', '0138901238', '0517890128', 60, '2018-03-02', NULL, NULL),
(26, 'شركة الطاقة البديلة', 'الرياض', 'حي الصحافة', 'الطاقة', 'info@alternativeenergy.com', '0119012349', '0528901239', 90, '2011-12-30', NULL, NULL),
(27, 'مؤسسة التدريب المهني', 'جدة', 'حي الرحاب', 'التدريب', 'info@vocationaltraining.com', '0120123460', '0539012350', 50, '2005-06-14', NULL, NULL),
(28, 'شركة الأبحاث التسويقية', 'الدمام', 'شارع الملك خالد', 'الأبحاث', 'info@marketingresearch.com', '0131234571', '0540123461', 40, '2010-11-17', NULL, NULL),
(29, 'مصنع العطور الفاخرة', 'الرياض', 'حي السفارات', 'العطور', 'info@luxuryperfumes.com', '0112345673', '0551234573', 70, '2014-07-03', NULL, NULL),
(30, 'شركة السيارات الذكية', 'جدة', 'حي الشاطئ', 'السيارات', 'info@smartcars.com', '0123456784', '0562345674', 90, '2008-02-12', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `activities_name_unique` (`name`);

--
-- Indexes for table `bid_requests`
--
ALTER TABLE `bid_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bid_requests_company_id_foreign` (`company_id`),
  ADD KEY `bid_requests_project_id_foreign` (`project_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `project_types`
--
ALTER TABLE `project_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `project_types_name_unique` (`name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tenders`
--
ALTER TABLE `tenders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenders_creator_id_foreign` (`company_id`);

--
-- Indexes for table `tender_awards`
--
ALTER TABLE `tender_awards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tender_awards_company_id_foreign` (`company_id`),
  ADD KEY `tender_awards_tender_id_foreign` (`tender_id`),
  ADD KEY `tender_awards_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendors_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bid_requests`
--
ALTER TABLE `bid_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_types`
--
ALTER TABLE `project_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tenders`
--
ALTER TABLE `tenders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `tender_awards`
--
ALTER TABLE `tender_awards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bid_requests`
--
ALTER TABLE `bid_requests`
  ADD CONSTRAINT `bid_requests_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bid_requests_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tenders`
--
ALTER TABLE `tenders`
  ADD CONSTRAINT `tenders_creator_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tender_awards`
--
ALTER TABLE `tender_awards`
  ADD CONSTRAINT `tender_awards_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tender_awards_tender_id_foreign` FOREIGN KEY (`tender_id`) REFERENCES `tenders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tender_awards_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
