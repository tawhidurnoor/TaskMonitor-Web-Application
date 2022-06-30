-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2022 at 12:59 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `time_tracker_solution`
--

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exchange_rate` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `code` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employer_id` bigint(20) NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `screenshot_duration` int(11) DEFAULT NULL,
  `mac_address` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_archived` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employer_id`, `employee_id`, `screenshot_duration`, `mac_address`, `is_archived`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 2, NULL, 0, '2022-06-19 06:50:52', '2022-06-19 10:55:01'),
(2, 1, 3, NULL, NULL, 0, '2022-06-19 10:31:43', '2022-06-19 10:31:43');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ghost_employees`
--

CREATE TABLE `ghost_employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mac_id_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mac_id_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_info` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employer_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invitations`
--

CREATE TABLE `invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_request_accepted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_12_06_202158_create_permission_tables', 1),
(5, '2022_04_23_085553_create_projects_table', 1),
(6, '2022_04_29_192751_create_project_people_table', 1),
(7, '2022_04_30_062107_create_time_trackers_table', 1),
(8, '2022_05_17_070918_create_screenshots_table', 1),
(9, '2022_05_22_093042_create_employees_table', 1),
(10, '2022_05_23_104053_create_invitations_table', 1),
(11, '2022_05_28_055016_create_ghost_employees_table', 1),
(12, '2022_05_30_035404_create_settings_table', 1),
(13, '2022_06_01_034657_create_currencies_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `amount`, `address`, `status`, `transaction_id`, `currency`) VALUES
(1, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 10, 'Customer Address', 'Processing', '62ba72e4153ac', 'BDT'),
(2, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 10, 'Customer Address', 'Processing', '62ba73057bc05', 'BDT'),
(3, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 10, 'Customer Address', 'Failed', '62ba768caea97', 'BDT'),
(4, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 10, 'Customer Address', 'Pending', '62ba78cf40914', 'BDT'),
(5, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 10, 'Customer Address', 'Failed', '62ba78ee55bfa', 'BDT'),
(6, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 10, 'Customer Address', 'Processing', '62ba79c745605', 'BDT');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard.view', 'web', 'dashboard', '2022-06-18 10:14:28', '2022-06-18 10:14:28'),
(2, 'dashboard.edit', 'web', 'dashboard', '2022-06-18 10:14:28', '2022-06-18 10:14:28'),
(3, 'blog.create', 'web', 'blog', '2022-06-18 10:14:28', '2022-06-18 10:14:28'),
(4, 'blog.view', 'web', 'blog', '2022-06-18 10:14:28', '2022-06-18 10:14:28'),
(5, 'blog.edit', 'web', 'blog', '2022-06-18 10:14:28', '2022-06-18 10:14:28'),
(6, 'blog.delete', 'web', 'blog', '2022-06-18 10:14:28', '2022-06-18 10:14:28'),
(7, 'blog.approve', 'web', 'blog', '2022-06-18 10:14:28', '2022-06-18 10:14:28'),
(8, 'admin.create', 'web', 'admin', '2022-06-18 10:14:28', '2022-06-18 10:14:28'),
(9, 'admin.view', 'web', 'admin', '2022-06-18 10:14:28', '2022-06-18 10:14:28'),
(10, 'admin.edit', 'web', 'admin', '2022-06-18 10:14:28', '2022-06-18 10:14:28'),
(11, 'admin.delete', 'web', 'admin', '2022-06-18 10:14:28', '2022-06-18 10:14:28'),
(12, 'admin.approve', 'web', 'admin', '2022-06-18 10:14:28', '2022-06-18 10:14:28'),
(13, 'role.create', 'web', 'role', '2022-06-18 10:14:28', '2022-06-18 10:14:28'),
(14, 'role.view', 'web', 'role', '2022-06-18 10:14:28', '2022-06-18 10:14:28'),
(15, 'role.edit', 'web', 'role', '2022-06-18 10:14:28', '2022-06-18 10:14:28'),
(16, 'role.delete', 'web', 'role', '2022-06-18 10:14:28', '2022-06-18 10:14:28'),
(17, 'role.approve', 'web', 'role', '2022-06-18 10:14:28', '2022-06-18 10:14:28'),
(18, 'profile.view', 'web', 'profile', '2022-06-18 10:14:28', '2022-06-18 10:14:28'),
(19, 'profile.edit', 'web', 'profile', '2022-06-18 10:14:28', '2022-06-18 10:14:28');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_logo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `project_logo`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'CodeCloud Catting Solution', 'This is to provide our employee a chatting solution', '1655621946_codecloud_1.svg', 1, '2022-06-19 06:59:06', '2022-06-19 06:59:06');

-- --------------------------------------------------------

--
-- Table structure for table `project_people`
--

CREATE TABLE `project_people` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `project_id` bigint(20) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_people`
--

INSERT INTO `project_people` (`id`, `user_id`, `project_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2022-06-19 06:59:06', '2022-06-19 06:59:06'),
(2, 2, 1, 0, '2022-06-19 08:29:38', '2022-06-30 10:48:44'),
(3, 3, 1, 0, '2022-06-19 10:33:00', '2022-06-19 10:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'web', '2022-06-18 10:14:28', '2022-06-18 10:14:28'),
(2, 'admin', 'web', '2022-06-18 10:14:28', '2022-06-18 10:14:28'),
(3, 'editor', 'web', '2022-06-18 10:14:28', '2022-06-18 10:14:28'),
(4, 'user', 'web', '2022-06-18 10:14:28', '2022-06-18 10:14:28');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `screenshots`
--

CREATE TABLE `screenshots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `time_tracker_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `screenshots`
--

INSERT INTO `screenshots` (`id`, `time_tracker_id`, `user_id`, `image`, `activity`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '1655627618_knil_time_tracker_no_1.jpg', 'Excellent', '2022-06-19 08:33:38', '2022-06-19 08:33:38'),
(2, 1, 2, '1655627738_knil_time_tracker_no_1.jpg', 'Excellent', '2022-06-19 08:35:38', '2022-06-19 08:35:38'),
(3, 1, 2, '1655627858_knil_time_tracker_no_1.jpg', 'Excellent', '2022-06-19 08:37:38', '2022-06-19 08:37:38'),
(4, 1, 2, '1655627979_knil_time_tracker_no_1.jpg', 'Excellent', '2022-06-19 08:39:39', '2022-06-19 08:39:39'),
(5, 2, 2, '1655636024_knil_time_tracker_no_2.jpg', 'Excellent', '2022-06-19 10:53:44', '2022-06-19 10:53:44'),
(6, 3, 2, '1655636140_knil_time_tracker_no_3.jpg', 'Excellent', '2022-06-19 10:55:40', '2022-06-19 10:55:40'),
(7, 4, 2, '1655636155_knil_time_tracker_no_4.jpg', 'Excellent', '2022-06-19 10:55:55', '2022-06-19 10:55:55'),
(8, 5, 2, '1655636180_knil_time_tracker_no_5.jpg', 'Excellent', '2022-06-19 10:56:20', '2022-06-19 10:56:20'),
(9, 3, 2, '1655636260_knil_time_tracker_no_3.jpg', 'Excellent', '2022-06-19 10:57:40', '2022-06-19 10:57:40'),
(10, 4, 2, '1655636275_knil_time_tracker_no_4.jpg', 'Excellent', '2022-06-19 10:57:55', '2022-06-19 10:57:55'),
(11, 5, 2, '1655636300_knil_time_tracker_no_5.jpg', 'Excellent', '2022-06-19 10:58:20', '2022-06-19 10:58:20'),
(12, 6, 1, '1655784552_rudihwat_time_tracker_no_6.jpg', 'Excellent', '2022-06-21 04:09:12', '2022-06-21 04:09:12'),
(13, 7, 1, '1655784622_rudihwat_time_tracker_no_7.jpg', 'Excellent', '2022-06-21 04:10:22', '2022-06-21 04:10:22'),
(14, 8, 1, '1655784854_rudihwat_time_tracker_no_8.jpg', 'Excellent', '2022-06-21 04:14:14', '2022-06-21 04:14:14'),
(15, 9, 2, '1655798039_knil_time_tracker_no_9.jpg', 'Excellent', '2022-06-21 07:53:59', '2022-06-21 07:53:59'),
(16, 10, 2, '1655798128_knil_time_tracker_no_10.jpg', 'Excellent', '2022-06-21 07:55:28', '2022-06-21 07:55:28'),
(17, 9, 2, '1655798159_knil_time_tracker_no_9.jpg', 'Excellent', '2022-06-21 07:55:59', '2022-06-21 07:55:59'),
(18, 11, 2, '1655798183_knil_time_tracker_no_11.jpg', 'Excellent', '2022-06-21 07:56:23', '2022-06-21 07:56:23'),
(19, 10, 2, '1655798248_knil_time_tracker_no_10.jpg', 'Excellent', '2022-06-21 07:57:28', '2022-06-21 07:57:28'),
(20, 9, 2, '1655798279_knil_time_tracker_no_9.jpg', 'Excellent', '2022-06-21 07:57:59', '2022-06-21 07:57:59'),
(21, 11, 2, '1655798303_knil_time_tracker_no_11.jpg', 'Excellent', '2022-06-21 07:58:23', '2022-06-21 07:58:23'),
(22, 10, 2, '1655798369_knil_time_tracker_no_10.jpg', 'Excellent', '2022-06-21 07:59:29', '2022-06-21 07:59:29'),
(23, 9, 2, '1655798400_knil_time_tracker_no_9.jpg', 'Excellent', '2022-06-21 08:00:00', '2022-06-21 08:00:00'),
(24, 11, 2, '1655798423_knil_time_tracker_no_11.jpg', 'Excellent', '2022-06-21 08:00:23', '2022-06-21 08:00:23'),
(25, 10, 2, '1655798489_knil_time_tracker_no_10.jpg', 'Excellent', '2022-06-21 08:01:29', '2022-06-21 08:01:29'),
(26, 9, 2, '1655798520_knil_time_tracker_no_9.jpg', 'Excellent', '2022-06-21 08:02:00', '2022-06-21 08:02:00'),
(27, 11, 2, '1655798544_knil_time_tracker_no_11.jpg', 'Excellent', '2022-06-21 08:02:24', '2022-06-21 08:02:24'),
(28, 10, 2, '1655798609_knil_time_tracker_no_10.jpg', 'Excellent', '2022-06-21 08:03:29', '2022-06-21 08:03:29'),
(29, 9, 2, '1655798640_knil_time_tracker_no_9.jpg', 'Excellent', '2022-06-21 08:04:00', '2022-06-21 08:04:00'),
(30, 11, 2, '1655798664_knil_time_tracker_no_11.jpg', 'Excellent', '2022-06-21 08:04:24', '2022-06-21 08:04:24'),
(31, 10, 2, '1655798729_knil_time_tracker_no_10.jpg', 'Excellent', '2022-06-21 08:05:29', '2022-06-21 08:05:29'),
(32, 9, 2, '1655798760_knil_time_tracker_no_9.jpg', 'Excellent', '2022-06-21 08:06:00', '2022-06-21 08:06:00'),
(33, 11, 2, '1655798784_knil_time_tracker_no_11.jpg', 'Excellent', '2022-06-21 08:06:24', '2022-06-21 08:06:24'),
(34, 10, 2, '1655798850_knil_time_tracker_no_10.jpg', 'Excellent', '2022-06-21 08:07:30', '2022-06-21 08:07:30'),
(35, 9, 2, '1655798881_knil_time_tracker_no_9.jpg', 'Excellent', '2022-06-21 08:08:01', '2022-06-21 08:08:01'),
(36, 11, 2, '1655798904_knil_time_tracker_no_11.jpg', 'Excellent', '2022-06-21 08:08:24', '2022-06-21 08:08:24'),
(37, 10, 2, '1655798970_knil_time_tracker_no_10.jpg', 'Excellent', '2022-06-21 08:09:30', '2022-06-21 08:09:30'),
(38, 12, 1, '1655798982_rudihwat_time_tracker_no_12.jpg', 'Excellent', '2022-06-21 08:09:42', '2022-06-21 08:09:42'),
(39, 9, 2, '1655799001_knil_time_tracker_no_9.jpg', 'Excellent', '2022-06-21 08:10:01', '2022-06-21 08:10:01'),
(40, 11, 2, '1655799025_knil_time_tracker_no_11.jpg', 'Excellent', '2022-06-21 08:10:25', '2022-06-21 08:10:25'),
(41, 13, 1, '1655799070_rudihwat_time_tracker_no_13.jpg', 'Excellent', '2022-06-21 08:11:10', '2022-06-21 08:11:10'),
(42, 14, 2, '1655799221_knil_time_tracker_no_14.jpg', 'Excellent', '2022-06-21 08:13:41', '2022-06-21 08:13:41'),
(43, 14, 2, '1655799342_knil_time_tracker_no_14.jpg', 'Excellent', '2022-06-21 08:15:42', '2022-06-21 08:15:42'),
(44, 14, 2, '1655799462_knil_time_tracker_no_14.jpg', 'Excellent', '2022-06-21 08:17:42', '2022-06-21 08:17:42'),
(45, 14, 2, '1655799582_knil_time_tracker_no_14.jpg', 'Excellent', '2022-06-21 08:19:42', '2022-06-21 08:19:42'),
(46, 14, 2, '1655799703_knil_time_tracker_no_14.jpg', 'Excellent', '2022-06-21 08:21:43', '2022-06-21 08:21:43'),
(47, 14, 2, '1655799823_knil_time_tracker_no_14.jpg', 'Excellent', '2022-06-21 08:23:43', '2022-06-21 08:23:43'),
(48, 14, 2, '1655799943_knil_time_tracker_no_14.jpg', 'Excellent', '2022-06-21 08:25:43', '2022-06-21 08:25:43'),
(49, 14, 2, '1655800063_knil_time_tracker_no_14.jpg', 'Excellent', '2022-06-21 08:27:43', '2022-06-21 08:27:43'),
(50, 14, 2, '1655800183_knil_time_tracker_no_14.jpg', 'Excellent', '2022-06-21 08:29:43', '2022-06-21 08:29:43'),
(51, 14, 2, '1655800304_knil_time_tracker_no_14.jpg', 'Excellent', '2022-06-21 08:31:44', '2022-06-21 08:31:44'),
(52, 14, 2, '1655800424_knil_time_tracker_no_14.jpg', 'Excellent', '2022-06-21 08:33:44', '2022-06-21 08:33:44'),
(53, 14, 2, '1655800544_knil_time_tracker_no_14.jpg', 'Excellent', '2022-06-21 08:35:44', '2022-06-21 08:35:44'),
(54, 16, 2, '1655960607_knil_time_tracker_no_16.jpg', 'Low', '2022-06-23 05:03:27', '2022-06-23 05:03:27'),
(55, 17, 1, '1655966097_rudihwat_time_tracker_no_17.jpg', 'Low', '2022-06-23 06:34:57', '2022-06-23 06:34:57'),
(56, 18, 2, '1655966259_knil_time_tracker_no_18.jpg', 'Low', '2022-06-23 06:37:39', '2022-06-23 06:37:39'),
(57, 18, 2, '1655966379_knil_time_tracker_no_18.jpg', 'Low', '2022-06-23 06:39:39', '2022-06-23 06:39:39'),
(58, 19, 2, '1655966505_knil_time_tracker_no_19.jpg', 'Low', '2022-06-23 06:41:45', '2022-06-23 06:41:45'),
(59, 19, 2, '1655966625_knil_time_tracker_no_19.jpg', 'Low', '2022-06-23 06:43:45', '2022-06-23 06:43:45'),
(60, 20, 2, '1655966879_knil_time_tracker_no_20.jpg', 'Low', '2022-06-23 06:47:59', '2022-06-23 06:47:59'),
(61, 20, 2, '1655966999_knil_time_tracker_no_20.jpg', 'Low', '2022-06-23 06:49:59', '2022-06-23 06:49:59'),
(62, 21, 2, '1655967131_knil_time_tracker_no_21.jpg', 'Low', '2022-06-23 06:52:11', '2022-06-23 06:52:11'),
(63, 21, 2, '1655967251_knil_time_tracker_no_21.jpg', 'Low', '2022-06-23 06:54:11', '2022-06-23 06:54:11'),
(64, 21, 2, '1655967371_knil_time_tracker_no_21.jpg', 'Low', '2022-06-23 06:56:11', '2022-06-23 06:56:11'),
(65, 21, 2, '1655967492_knil_time_tracker_no_21.jpg', 'Low', '2022-06-23 06:58:12', '2022-06-23 06:58:12'),
(66, 22, 2, '1655967654_knil_time_tracker_no_22.jpg', 'Low', '2022-06-23 07:00:54', '2022-06-23 07:00:54'),
(67, 22, 2, '1655967775_knil_time_tracker_no_22.jpg', 'Excellent', '2022-06-23 07:02:55', '2022-06-23 07:02:55'),
(68, 22, 2, '1655967895_knil_time_tracker_no_22.jpg', 'Low', '2022-06-23 07:04:55', '2022-06-23 07:04:55'),
(69, 23, 2, '1655968146_knil_time_tracker_no_23.jpg', 'Low', '2022-06-23 07:09:06', '2022-06-23 07:09:06'),
(70, 23, 2, '1655968267_knil_time_tracker_no_23.jpg', 'Low', '2022-06-23 07:11:07', '2022-06-23 07:11:07'),
(71, 24, 2, '1655968327_knil_time_tracker_no_24.jpg', 'Low', '2022-06-23 07:12:07', '2022-06-23 07:12:07'),
(72, 24, 2, '1655968447_knil_time_tracker_no_24.jpg', 'Okay', '2022-06-23 07:14:07', '2022-06-23 07:14:07'),
(73, 24, 2, '1655968568_knil_time_tracker_no_24.jpg', 'Low', '2022-06-23 07:16:08', '2022-06-23 07:16:08'),
(74, 25, 2, '1656142830_knil_time_tracker_no_25.jpg', 'Low', '2022-06-25 07:40:30', '2022-06-25 07:40:30'),
(75, 26, 2, '1656142911_knil_time_tracker_no_26.jpg', 'Low', '2022-06-25 07:41:51', '2022-06-25 07:41:51'),
(76, 26, 2, '1656143032_knil_time_tracker_no_26.jpg', 'Okay', '2022-06-25 07:43:52', '2022-06-25 07:43:52'),
(77, 26, 2, '1656143152_knil_time_tracker_no_26.jpg', 'Okay', '2022-06-25 07:45:52', '2022-06-25 07:45:52'),
(78, 27, 2, '1656143717_knil_time_tracker_no_27.jpg', 'Low', '2022-06-25 07:55:17', '2022-06-25 07:55:17'),
(79, 27, 2, '1656143837_knil_time_tracker_no_27.jpg', 'Okay', '2022-06-25 07:57:17', '2022-06-25 07:57:17'),
(80, 27, 2, '1656143958_knil_time_tracker_no_27.jpg', 'Low', '2022-06-25 07:59:18', '2022-06-25 07:59:18'),
(81, 27, 2, '1656144078_knil_time_tracker_no_27.jpg', 'Low', '2022-06-25 08:01:18', '2022-06-25 08:01:18'),
(82, 27, 2, '1656144198_knil_time_tracker_no_27.jpg', 'Low', '2022-06-25 08:03:18', '2022-06-25 08:03:18'),
(83, 27, 2, '1656144318_knil_time_tracker_no_27.jpg', 'Low', '2022-06-25 08:05:18', '2022-06-25 08:05:18'),
(84, 27, 2, '1656144439_knil_time_tracker_no_27.jpg', 'Low', '2022-06-25 08:07:19', '2022-06-25 08:07:19'),
(85, 27, 2, '1656144559_knil_time_tracker_no_27.jpg', 'Low', '2022-06-25 08:09:19', '2022-06-25 08:09:19'),
(86, 27, 2, '1656144679_knil_time_tracker_no_27.jpg', 'Low', '2022-06-25 08:11:19', '2022-06-25 08:11:19'),
(87, 27, 2, '1656144799_knil_time_tracker_no_27.jpg', 'Low', '2022-06-25 08:13:19', '2022-06-25 08:13:19'),
(88, 28, 2, '1656145000_knil_time_tracker_no_28.jpg', 'Low', '2022-06-25 08:16:40', '2022-06-25 08:16:40'),
(89, 28, 2, '1656145120_knil_time_tracker_no_28.jpg', 'Excellent', '2022-06-25 08:18:40', '2022-06-25 08:18:40'),
(90, 29, 2, '1656145357_knil_time_tracker_no_29.jpg', 'Low', '2022-06-25 08:22:37', '2022-06-25 08:22:37'),
(91, 29, 2, '1656145477_knil_time_tracker_no_29.jpg', 'Low', '2022-06-25 08:24:37', '2022-06-25 08:24:37'),
(92, 30, 2, '1656145531_knil_time_tracker_no_30.jpg', 'Low', '2022-06-25 08:25:31', '2022-06-25 08:25:31'),
(93, 31, 2, '1656145552_knil_time_tracker_no_31.jpg', 'Low', '2022-06-25 08:25:52', '2022-06-25 08:25:52'),
(94, 29, 2, '1656145597_knil_time_tracker_no_29.jpg', 'Low', '2022-06-25 08:26:37', '2022-06-25 08:26:37'),
(95, 30, 2, '1656145651_knil_time_tracker_no_30.jpg', 'Low', '2022-06-25 08:27:31', '2022-06-25 08:27:31'),
(96, 31, 2, '1656145672_knil_time_tracker_no_31.jpg', 'Low', '2022-06-25 08:27:52', '2022-06-25 08:27:52'),
(97, 32, 2, '1656145815_knil_time_tracker_no_32.jpg', 'Low', '2022-06-25 08:30:15', '2022-06-25 08:30:15'),
(98, 32, 2, '1656145936_knil_time_tracker_no_32.jpg', 'Low', '2022-06-25 08:32:16', '2022-06-25 08:32:16'),
(99, 32, 2, '1656146056_knil_time_tracker_no_32.jpg', 'Low', '2022-06-25 08:34:16', '2022-06-25 08:34:16'),
(100, 32, 2, '1656146176_knil_time_tracker_no_32.jpg', 'Low', '2022-06-25 08:36:16', '2022-06-25 08:36:16'),
(101, 32, 2, '1656146297_knil_time_tracker_no_32.jpg', 'Low', '2022-06-25 08:38:17', '2022-06-25 08:38:17'),
(102, 32, 2, '1656146417_knil_time_tracker_no_32.jpg', 'Low', '2022-06-25 08:40:17', '2022-06-25 08:40:17');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `screenshot_duration` int(11) NOT NULL DEFAULT 10,
  `keep_screenshots` int(11) NOT NULL DEFAULT 60,
  `currency_id` bigint(20) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `user_id`, `screenshot_duration`, `keep_screenshots`, `currency_id`, `created_at`, `updated_at`) VALUES
(1, 2, 10, 60, 1, '2022-06-19 06:49:21', '2022-06-19 06:49:21'),
(2, 3, 10, 60, 1, '2022-06-19 06:56:32', '2022-06-19 06:56:32'),
(3, 1, 10, 60, 1, '2022-06-19 06:49:21', '2022-06-19 06:49:21'),
(4, 4, 10, 60, 1, '2022-06-20 08:10:27', '2022-06-20 08:10:27'),
(5, 9, 10, 60, 1, '2022-06-29 10:05:47', '2022-06-29 10:05:47'),
(6, 10, 10, 60, 1, '2022-06-29 10:17:00', '2022-06-29 10:17:00'),
(7, 11, 10, 60, 1, '2022-06-29 10:23:54', '2022-06-29 10:23:54'),
(8, 12, 10, 60, 1, '2022-06-29 10:28:09', '2022-06-29 10:28:09'),
(9, 13, 10, 60, 1, '2022-06-29 10:29:45', '2022-06-29 10:29:45'),
(10, 14, 10, 60, 1, '2022-06-29 10:31:59', '2022-06-29 10:31:59'),
(11, 15, 10, 60, 1, '2022-06-30 06:04:08', '2022-06-30 06:04:08');

-- --------------------------------------------------------

--
-- Table structure for table `time_trackers`
--

CREATE TABLE `time_trackers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `task_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` timestamp NOT NULL DEFAULT current_timestamp(),
  `end` timestamp NULL DEFAULT NULL,
  `project_people_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_trackers`
--

INSERT INTO `time_trackers` (`id`, `project_id`, `user_id`, `task_title`, `start`, `end`, `project_people_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Making User Interface', '2022-06-19 08:33:37', '2022-06-19 08:39:46', 0, '2022-06-19 08:33:37', '2022-06-19 08:39:46'),
(2, 1, 2, 'Dextop', '2022-06-19 10:53:43', '2022-06-19 10:54:28', 0, '2022-06-19 10:53:43', '2022-06-19 10:54:28'),
(3, 1, 2, 'Dextop 2', '2022-06-19 10:55:39', '2022-06-19 10:55:49', 0, '2022-06-19 10:55:39', '2022-06-19 10:55:49'),
(4, 1, 2, 'Dextop 3', '2022-06-19 10:55:54', '2022-06-19 10:56:03', 0, '2022-06-19 10:55:54', '2022-06-19 10:56:03'),
(5, 1, 2, 'Dextop 4', '2022-06-19 10:56:20', '2022-06-19 10:59:01', 0, '2022-06-19 10:56:20', '2022-06-19 10:59:01'),
(6, 1, 1, 'Stopwatch slow issue fixing', '2022-06-21 04:09:12', '2022-06-21 04:10:14', 0, '2022-06-21 04:09:12', '2022-06-21 04:10:14'),
(7, 1, 1, 'Stopwatch slow issue fixing', '2022-06-21 04:10:22', '2022-06-21 04:12:47', 0, '2022-06-21 04:10:22', '2022-06-21 04:12:47'),
(8, 1, 1, 'Stopwatch on dextop app', '2022-06-21 04:14:14', '2022-06-21 04:19:49', 0, '2022-06-21 04:14:14', '2022-06-21 04:19:49'),
(9, 1, 2, 'hoour test', '2022-06-21 07:53:58', '2022-06-21 07:55:24', 0, '2022-06-21 07:53:58', '2022-06-21 07:55:24'),
(10, 1, 2, 'hoour test', '2022-06-21 07:55:28', '2022-06-21 07:56:18', 0, '2022-06-21 07:55:28', '2022-06-21 07:56:18'),
(11, 1, 2, 'hoour test 2', '2022-06-21 07:56:23', '2022-06-21 08:00:33', 0, '2022-06-21 07:56:23', '2022-06-21 08:00:33'),
(12, 1, 1, 'Screenshot save in Documents', '2022-06-21 08:09:42', NULL, 0, '2022-06-21 08:09:42', '2022-06-21 08:09:42'),
(13, 1, 1, 'Screenshot saved in Documents', '2022-06-21 08:11:10', NULL, 0, '2022-06-21 08:11:10', '2022-06-21 08:11:10'),
(14, 1, 2, 'Delete image afer taking screenshot', '2022-06-21 08:13:41', '2022-06-21 08:36:05', 0, '2022-06-21 08:13:41', '2022-06-21 08:36:05'),
(15, 1, 1, 'Screensot activity', '2022-06-22 11:02:15', '2022-06-22 11:02:22', 0, '2022-06-22 11:02:15', '2022-06-22 11:02:22'),
(16, 1, 2, 'Activity tracker', '2022-06-23 04:59:26', '2022-06-23 05:04:22', 2, '2022-06-23 04:59:26', '2022-06-23 05:04:22'),
(17, 1, 1, 'keylogger', '2022-06-23 06:34:57', '2022-06-23 06:37:06', 1, '2022-06-23 06:34:57', '2022-06-23 06:37:06'),
(18, 1, 2, 'key logger 12:37', '2022-06-23 06:37:39', '2022-06-23 06:39:46', 2, '2022-06-23 06:37:39', '2022-06-23 06:39:46'),
(19, 1, 2, 'keylogger 12:41', '2022-06-23 06:41:44', '2022-06-23 06:43:51', 2, '2022-06-23 06:41:44', '2022-06-23 06:43:51'),
(20, 1, 2, 'keylogger 12:47', '2022-06-23 06:47:59', '2022-06-23 06:50:09', 2, '2022-06-23 06:47:59', '2022-06-23 06:50:09'),
(21, 1, 2, 'timetracker 12:52', '2022-06-23 06:52:10', '2022-06-23 06:58:32', 2, '2022-06-23 06:52:10', '2022-06-23 06:58:32'),
(22, 1, 2, 'timetracker 01:00', '2022-06-23 07:00:54', '2022-06-23 07:05:04', 2, '2022-06-23 07:00:54', '2022-06-23 07:05:04'),
(23, 1, 2, 'keylogger 01:09', '2022-06-23 07:09:06', NULL, 2, '2022-06-23 07:09:06', '2022-06-23 07:09:06'),
(24, 1, 2, 'timetracker 01:12', '2022-06-23 07:12:07', NULL, 2, '2022-06-23 07:12:07', '2022-06-23 07:12:07'),
(25, 1, 2, 'key press status', '2022-06-25 07:40:30', '2022-06-25 07:40:42', 2, '2022-06-25 07:40:30', '2022-06-25 07:40:42'),
(26, 1, 2, 'ke789822 konno', '2022-06-25 07:41:51', '2022-06-25 07:47:02', 2, '2022-06-25 07:41:51', '2022-06-25 07:47:02'),
(27, 1, 2, 'tkp-01:55', '2022-06-25 07:55:17', '2022-06-25 08:14:48', 2, '2022-06-25 07:55:17', '2022-06-25 08:14:48'),
(28, 1, 2, '02:16', '2022-06-25 08:16:40', NULL, 2, '2022-06-25 08:16:40', '2022-06-25 08:16:40'),
(29, 1, 2, '02:22', '2022-06-25 08:22:37', '2022-06-25 08:25:25', 2, '2022-06-25 08:22:37', '2022-06-25 08:25:25'),
(30, 1, 2, '02:25', '2022-06-25 08:25:30', '2022-06-25 08:25:35', 2, '2022-06-25 08:25:30', '2022-06-25 08:25:35'),
(31, 1, 2, '02:25', '2022-06-25 08:25:52', NULL, 2, '2022-06-25 08:25:52', '2022-06-25 08:25:52'),
(32, 1, 2, '02:30', '2022-06-25 08:30:15', '2022-06-25 08:40:24', 2, '2022-06-25 08:30:15', '2022-06-25 08:40:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `login_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_method` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'email',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `company_name`, `profile_picture`, `otp`, `email_verified_at`, `login_mode`, `login_method`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tawhidur Noor Badhan', 'tawhidbadhan@gmail.com', 'Noor\'s Workspace', NULL, NULL, '2022-06-18 11:03:31', 'employer', 'email', '$2y$10$urM5XoLv.FdVG8IcgH1G6.EhigXWGxlLCsYNuvuKoVTqOfNCFum8e', NULL, '2022-06-18 10:14:28', '2022-06-30 08:15:13'),
(2, 'Tawhidur Noor Badhan', 'link2badhan@gmail.com', 'Bishal Boro Company', NULL, NULL, NULL, 'employer', 'gmail', '$2y$10$urM5XoLv.FdVG8IcgH1G6.EhigXWGxlLCsYNuvuKoVTqOfNCFum8e', 'U65GZqEm7PEQZJt5KgZ1K3cEdUoJo0RUnigrylmR8mmZ4LN9QsWMcPVCmIZN', '2022-06-29 07:17:45', '2022-06-30 08:18:04'),
(3, 'Tawhidur Noor Badhan DIU', 'tawhidur35-2374@diu.edu.bd', NULL, NULL, NULL, '2022-06-19 06:57:02', 'employee', 'email', '$2y$10$WzarROp3Al.PeLXirYFoGeeTlE.Q03eus/XgK5y0/eNZxwAYBejnK', NULL, '2022-06-19 06:56:32', '2022-06-19 08:28:34'),
(4, 'Vung Vabg', 'vungvang@gmail.com', NULL, NULL, NULL, '2022-06-30 06:40:56', 'employee', 'email', '$2y$10$xXzEkFox6YxFdUKpjKPJReq1sIixPmd8TU7hMNoqxv1pG6UcqCW1S', NULL, '2022-06-20 08:10:27', '2022-06-20 08:10:27'),
(11, 'Demo User', 'demo@gmail.com', 'Demo Company', NULL, NULL, '2022-06-30 06:40:56', 'employer', 'email', '$2y$10$GRlVLRxXNzpXN9FHsV4m/uw1mcuhTz66rhkUTIrl4tAt2tRAthH1C', NULL, '2022-06-29 10:23:54', '2022-06-29 10:23:54'),
(12, 'Demo User 2', 'demo2@gmail.com', 'Demo Company 2', NULL, NULL, '2022-06-30 06:40:56', 'employer', 'email', '$2y$10$JM8SfFZESw04jYLxDWuoY.gscssYHn9L4x2uiAHSULp.mEOHevkt6', NULL, '2022-06-29 10:28:09', '2022-06-29 10:28:09'),
(13, 'Demo User 3', 'demo3@gmail.com', 'Demo Company 3', NULL, NULL, '2022-06-30 06:40:56', 'employer', 'email', '$2y$10$OSzRNZylEZTU.Zi3NGzwUevEWZC8sDA8Hj9gQrlXMtf1MaO2rUMYC', NULL, '2022-06-29 10:29:45', '2022-06-29 10:29:45'),
(14, 'Demo User 4', 'demo4@gmail.com', 'Demo Company 4', NULL, NULL, '2022-06-30 06:40:56', 'employer', 'email', '$2y$10$ljN5o7eb4nHOfavC0I0V7e.OHbKpiXCgEDhDAovtsu4GX8qY5Ws..', NULL, '2022-06-29 10:31:59', '2022-06-29 10:31:59'),
(15, 'Demo Email', 'demodemo@gmail.com', 'DemoDemo Ltd.', NULL, NULL, '2022-06-30 06:41:38', 'employer', 'email', '$2y$10$ys7WSER3YJG4Qr4lpSoo5eqd/80pQFXX0QAcYFsI8lpV2IdYY/Iy.', NULL, '2022-06-30 06:04:08', '2022-06-30 06:04:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ghost_employees`
--
ALTER TABLE `ghost_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invitations`
--
ALTER TABLE `invitations`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_people`
--
ALTER TABLE `project_people`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `screenshots`
--
ALTER TABLE `screenshots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_trackers`
--
ALTER TABLE `time_trackers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ghost_employees`
--
ALTER TABLE `ghost_employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invitations`
--
ALTER TABLE `invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project_people`
--
ALTER TABLE `project_people`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `screenshots`
--
ALTER TABLE `screenshots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `time_trackers`
--
ALTER TABLE `time_trackers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
