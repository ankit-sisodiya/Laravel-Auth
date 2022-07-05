-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2022 at 02:02 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_level`
--

CREATE TABLE `access_level` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permissions` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `access_level`
--

INSERT INTO `access_level` (`id`, `role_id`, `permissions`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 'a:7:{s:10:\"Orders/add\";s:10:\"Orders/add\";s:11:\"Orders/view\";s:11:\"Orders/view\";s:14:\"Orders/details\";s:14:\"Orders/details\";s:11:\"Orders-edit\";s:11:\"Orders-edit\";s:20:\"Orders/delete-orders\";s:20:\"Orders/delete-orders\";s:9:\"dashboard\";s:9:\"dashboard\";s:11:\"logs-report\";s:11:\"logs-report\";}', '2022-06-07 07:01:55', '2022-06-07 07:01:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` enum('Yes','No') NOT NULL DEFAULT 'No' COMMENT 'Deleted = Yes not deleted = No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department_name`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'IT', '2021-04-08 05:31:06', '2021-04-08 05:31:06', 'No'),
(2, 'Back-Office', '2021-04-08 05:31:15', '2021-04-08 05:31:15', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_04_04_102518_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `otp_confirmation`
--

CREATE TABLE `otp_confirmation` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `status` enum('Yes','No') NOT NULL DEFAULT 'No',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otp_confirmation`
--

INSERT INTO `otp_confirmation` (`id`, `email`, `otp`, `status`, `created_at`, `updated_at`) VALUES
(1, 'vijay.phppoets@gmail.com', '6627', 'Yes', '2022-06-07 12:26:16', '2022-06-07 12:27:23'),
(2, 'vijay.phppoets@gmail.com', '2628', 'Yes', '2022-06-08 09:51:05', '2022-06-08 09:51:50'),
(3, 'vijay.phppoets@gmail.com', '6797', 'No', '2022-06-08 17:23:25', '2022-06-08 17:23:25'),
(4, 'vijay.phppoets@gmail.com', '3070', 'No', '2022-06-08 17:26:11', '2022-06-08 17:26:11'),
(5, 'vijay.phppoets@gmail.com', '7193', 'No', '2022-06-08 17:27:30', '2022-06-08 17:27:30'),
(6, 'vijay.phppoets@gmail.com', '8616', 'No', '2022-06-08 17:27:52', '2022-06-08 17:27:52'),
(7, 'vijay.phppoets@gmail.com', '3727', 'No', '2022-06-08 17:37:54', '2022-06-08 17:37:54'),
(8, 'vijay.phppoets@gmail.com', '9276', 'Yes', '2022-06-08 17:41:01', '2022-06-08 17:41:54'),
(9, 'vijay.phppoets@gmail.com', '1467', 'Yes', '2022-06-08 17:45:26', '2022-06-08 17:45:42'),
(10, 'vijay.phppoets@gmail.com', '6158', 'Yes', '2022-06-08 17:48:38', '2022-06-08 17:48:53'),
(11, 'vijay.phppoets@gmail.com', '7141', 'Yes', '2022-06-08 17:51:20', '2022-06-08 17:51:34'),
(12, 'vijay.phppoets@gmail.com', '9502', 'Yes', '2022-06-08 17:51:52', '2022-06-08 17:52:06'),
(13, 'vijay.phppoets@gmail.com', '1306', 'Yes', '2022-06-08 17:53:47', '2022-06-08 17:54:18'),
(14, 'vijay.phppoets@gmail.com', '8744', 'Yes', '2022-06-08 17:55:56', '2022-06-08 17:56:09'),
(15, 'vijay.phppoets@gmail.com', '3809', 'Yes', '2022-06-08 17:57:57', '2022-06-08 17:58:12'),
(16, 'vijay.phppoets@gmail.com', '7206', 'No', '2022-06-08 17:58:27', '2022-06-08 17:58:27'),
(17, 'vijay.phppoets@gmail.com', '9474', 'No', '2022-06-09 16:09:24', '2022-06-09 16:09:24'),
(18, 'vijay.phppoets@gmail.com', '5124', 'No', '2022-06-09 16:29:48', '2022-06-09 16:29:48'),
(19, 'vijay.phppoets@gmail.com', '1386', 'Yes', '2022-06-09 16:30:40', '2022-06-09 16:31:19'),
(20, 'vijay.phppoets@gmail.com', '1790', 'No', '2022-06-09 16:41:40', '2022-06-09 16:41:40'),
(21, 'vijay.phppoets@gmail.com', '9668', 'No', '2022-06-09 16:46:59', '2022-06-09 16:46:59'),
(22, 'vijay.phppoets@gmail.com', '6025', 'No', '2022-06-09 16:48:17', '2022-06-09 16:48:17'),
(23, 'vijay.phppoets@gmail.com', '8181', 'No', '2022-06-09 16:49:10', '2022-06-09 16:49:10'),
(24, 'vijay.phppoets@gmail.com', '5419', 'No', '2022-06-09 16:50:07', '2022-06-09 16:50:07'),
(25, 'vijay.phppoets@gmail.com', '2986', 'No', '2022-06-09 16:53:35', '2022-06-09 16:53:35'),
(26, 'vijay.phppoets@gmail.com', '1361', 'No', '2022-06-09 16:55:02', '2022-06-09 16:55:02'),
(27, 'vijay.phppoets@gmail.com', '6366', 'No', '2022-06-09 16:55:43', '2022-06-09 16:55:43'),
(28, 'vijay.phppoets@gmail.com', '3269', 'No', '2022-06-09 17:06:13', '2022-06-09 17:06:13'),
(29, 'vijay.phppoets@gmail.com', '4344', 'No', '2022-06-09 17:06:51', '2022-06-09 17:06:51'),
(30, 'vijay.phppoets@gmail.com', '7164', 'Yes', '2022-06-09 17:30:56', '2022-06-09 17:31:40'),
(31, 'vijay.phppoets@gmail.com', '8013', 'Yes', '2022-06-09 17:31:53', '2022-06-09 17:32:42'),
(32, 'vijay.phppoets@gmail.com', '7064', 'Yes', '2022-06-09 17:35:42', '2022-06-09 17:36:14'),
(33, 'vijay.phppoets@gmail.com', '6173', 'No', '2022-06-09 17:36:20', '2022-06-09 17:36:20'),
(34, 'vijay.phppoets@gmail.com', '3988', 'Yes', '2022-06-09 17:37:21', '2022-06-09 17:37:41'),
(35, 'vijay.phppoets@gmail.com', '2127', 'Yes', '2022-06-09 17:39:41', '2022-06-09 17:40:07'),
(36, 'vijay.phppoets@gmail.com', '6138', 'Yes', '2022-06-09 17:40:49', '2022-06-09 17:41:08'),
(37, 'vijay.phppoets@gmail.com', '6150', 'Yes', '2022-06-09 17:45:49', '2022-06-09 17:46:21'),
(38, 'vijay.phppoets@gmail.com', '6345', 'Yes', '2022-06-09 17:50:23', '2022-06-09 17:50:50'),
(39, 'vijay.phppoets@gmail.com', '2935', 'No', '2022-06-09 17:52:19', '2022-06-09 17:52:19'),
(40, 'vijay.phppoets@gmail.com', '3448', 'Yes', '2022-06-09 17:52:37', '2022-06-09 17:53:07'),
(41, 'vijay.phppoets@gmail.com', '2395', 'Yes', '2022-06-09 18:03:20', '2022-06-09 18:04:06'),
(42, 'vijay.phppoets@gmail.com', '1993', 'No', '2022-06-09 18:03:53', '2022-06-09 18:03:53'),
(43, 'vijay.phppoets@gmail.com', '6751', 'Yes', '2022-06-09 18:04:39', '2022-06-09 18:04:55'),
(44, 'vijay.phppoets@gmail.com', '2111', 'Yes', '2022-06-09 18:07:05', '2022-06-09 18:07:18'),
(45, 'vijay.phppoets@gmail.com', '1669', 'Yes', '2022-06-09 18:07:38', '2022-06-09 18:08:00'),
(46, 'vijay.phppoets@gmail.com', '3306', 'Yes', '2022-06-09 18:09:40', '2022-06-09 18:09:53'),
(47, 'vijay.phppoets@gmail.com', '8215', 'Yes', '2022-06-09 18:10:45', '2022-06-09 18:10:57'),
(48, 'vijay.phppoets@gmail.com', '5484', 'No', '2022-06-09 18:11:09', '2022-06-09 18:11:09'),
(49, 'vijay.phppoets@gmail.com', '3242', 'Yes', '2022-06-09 18:12:06', '2022-06-09 18:13:35'),
(50, 'vijay.phppoets@gmail.com', '3145', 'Yes', '2022-06-09 18:13:45', '2022-06-09 18:14:07'),
(51, 'vijay.phppoets@gmail.com', '7920', 'Yes', '2022-06-09 18:15:07', '2022-06-09 18:15:25'),
(52, 'vijay.phppoets@gmail.com', '8345', 'No', '2022-06-09 18:15:46', '2022-06-09 18:15:46'),
(53, 'vijay.phppoets@gmail.com', '6317', 'No', '2022-06-09 18:17:05', '2022-06-09 18:17:05'),
(54, 'vijay.phppoets@gmail.com', '7650', 'Yes', '2022-06-09 18:23:43', '2022-06-09 18:24:05'),
(55, 'vijay.phppoets@gmail.com', '5626', 'Yes', '2022-06-09 18:25:59', '2022-06-09 18:28:07'),
(56, 'vijay.phppoets@gmail.com', '5518', 'Yes', '2022-06-09 18:34:02', '2022-06-09 18:34:15'),
(57, 'vijay.phppoets@gmail.com', '5496', 'Yes', '2022-06-09 18:36:21', '2022-06-09 18:36:41'),
(58, 'vijay.phppoets@gmail.com', '2273', 'Yes', '2022-06-10 12:19:07', '2022-06-10 12:19:25'),
(59, 'vijay.phppoets@gmail.com', '4684', 'Yes', '2022-06-14 10:00:54', '2022-06-14 10:01:14'),
(60, 'vijay.phppoets@gmail.com', '5919', 'Yes', '2022-06-14 10:01:23', '2022-06-14 10:01:39'),
(61, 'vijay.phppoets@gmail.com', '4394', 'Yes', '2022-06-14 10:01:46', '2022-06-14 15:35:33'),
(62, 'vijay.phppoets@gmail.com', '6653', 'No', '2022-06-14 15:35:14', '2022-06-14 15:35:14'),
(63, 'vijay.phppoets@gmail.com', '5650', 'Yes', '2022-06-14 15:36:40', '2022-06-14 15:36:54'),
(64, 'vijay.phppoets@gmail.com', '8183', 'Yes', '2022-06-14 15:39:56', '2022-06-14 15:40:19'),
(65, 'vijay.phppoets@gmail.com', '5646', 'Yes', '2022-06-14 15:42:15', '2022-06-14 15:42:34'),
(66, 'vijay.phppoets@gmail.com', '9341', 'Yes', '2022-06-14 16:27:02', '2022-06-14 16:27:16'),
(67, 'vijay.phppoets@gmail.com', '5980', 'Yes', '2022-06-14 16:27:46', '2022-06-14 16:28:07'),
(68, 'vijay.phppoets@gmail.com', '7124', 'Yes', '2022-06-14 16:36:02', '2022-06-14 16:36:15'),
(69, 'vijay.phppoets@gmail.com', '2795', 'Yes', '2022-06-14 16:36:43', '2022-06-14 16:36:58'),
(70, 'vijay.phppoets@gmail.com', '3686', 'Yes', '2022-06-14 16:38:49', '2022-06-14 16:39:06'),
(71, 'vijay.phppoets@gmail.com', '3066', 'Yes', '2022-06-20 15:50:57', '2022-06-20 15:51:11'),
(72, 'vijay.phppoets@gmail.com', '7926', 'Yes', '2022-06-21 09:50:55', '2022-06-21 09:51:11'),
(73, 'vijay.phppoets@gmail.com', '8508', 'Yes', '2022-06-21 09:51:50', '2022-06-21 09:52:07'),
(74, 'vijay.phppoets@gmail.com', '2548', 'Yes', '2022-06-21 15:21:02', '2022-06-21 15:21:19'),
(75, 'vijay.phppoets@gmail.com', '8797', 'Yes', '2022-06-21 15:21:39', '2022-06-21 15:21:52'),
(76, 'vijay.phppoets@gmail.com', '8748', 'Yes', '2022-06-22 16:35:28', '2022-06-22 16:35:45'),
(77, 'vijay.phppoets@gmail.com', '3612', 'Yes', '2022-07-04 16:39:24', '2022-07-04 16:39:59');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `roles` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` enum('Yes','No') NOT NULL DEFAULT 'No' COMMENT 'deleted = yes not deleted = No',
  `active` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `keywords` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `roles`, `created_at`, `updated_at`, `deleted`, `active`, `keywords`) VALUES
(1, 'Admin', '2021-04-08 05:14:39', '2022-01-22 01:01:14', 'No', 'Yes', 'admin'),
(2, 'Management', '2021-04-08 05:16:07', '2021-05-04 02:43:18', 'No', 'Yes', 'management');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3ezjtgEAjs8OSwVlxeg4fx20wSDaW68wbbyhe6c8', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSE1tUHNSTFI1ZGRKeWhaRnd0WGh0bGhPMTk1U1kxSEZ1SVd0ZTNOTCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyOToiaHR0cDovL2xvY2FsaG9zdC9sYXJhdmVsX2F1dGgiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2xvY2FsaG9zdC9sYXJhdmVsX2F1dGgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1656932951),
('7mRoIzqcii5faZJoKgMTIY6rrekLUL52CcJSVl24', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiNlVpaWtTZXBKTFVrYTc2YzBDQ0pjcUpKdkpUR1RZekNYTEUyT1BFQSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1655958518),
('ALKE2l2vTxenmlt3lUTjoaApRMHFLcIg0mbHR4rp', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZ1M4U1ZJZU11SnY5YUw1QUwyeG9lUHNOR2hacjhiQkNZM2hYc3hNTSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyOToiaHR0cDovL2xvY2FsaG9zdC9sYXJhdmVsX2F1dGgiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cDovL2xvY2FsaG9zdC9sYXJhdmVsX2F1dGgvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjE2OiJsYXN0QWN0aXZpdHlUaW1lIjtpOjE2NTYzOTYyMTg7fQ==', 1656396222),
('gWznelxXKEtcOV1CZfx2sw9XSCDaleSrkJb73V96', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQTNCNVdSTnFmMkRQbTVFTm5RZjlSb1RrZm9ucXFmNU11M0lNbXpycCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyOToiaHR0cDovL2xvY2FsaG9zdC9sYXJhdmVsX2F1dGgiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2xvY2FsaG9zdC9sYXJhdmVsX2F1dGgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1656396216),
('k7LtXkCi3jHx898u7ECozdkrLdcPaizVt27HZss0', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoickJkdEJVQzJTZmFZbWM0cFIybFhvU3JhS2lBdmlUcFQwTEVaNWxaMSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyOToiaHR0cDovL2xvY2FsaG9zdC9sYXJhdmVsX2F1dGgiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozOToiaHR0cDovL2xvY2FsaG9zdC9sYXJhdmVsX2F1dGgvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxNjoibGFzdEFjdGl2aXR5VGltZSI7aToxNjU2OTMzMDAyO3M6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyYSQxMiRRNm5wbnpURTR2dkQxcGw3WUpRTFBPVWVyT2dEQVdDY2pvRGRFNEprb1NDQ3Mzdm4xcElUSyI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMmEkMTIkUTZucG56VEU0dnZEMXBsN1lKUUxQT1Vlck9nREFXQ2Nqb0RkRTRKa29TQ0NzM3ZuMXBJVEsiO30=', 1656933003),
('nZReR3viDSEuCCk1kG3FBqo5eIMd4b6XjUHRqbFx', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRjlqRXJFNHhKRmxZMjVjcTU2UUthT2tFbWZlS2phd0pBUkZXTzZ5diI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyOToiaHR0cDovL2xvY2FsaG9zdC9sYXJhdmVsX2F1dGgiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cDovL2xvY2FsaG9zdC9sYXJhdmVsX2F1dGgvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjE2OiJsYXN0QWN0aXZpdHlUaW1lIjtpOjE2NTU5ODg4Njk7fQ==', 1655988870),
('QoKffApFOrhUyqwfB8rubkuOlab0CxXgnkGv1TAZ', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOVNLc2RBbnpQOFJIeFZXMWtwSGtocHl4VHUyajhVeXpheVV6SmtpRiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyOToiaHR0cDovL2xvY2FsaG9zdC9sYXJhdmVsX2F1dGgiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyOToiaHR0cDovL2xvY2FsaG9zdC9sYXJhdmVsX2F1dGgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1655988868),
('R6VsigNIwFoPynWzhousi1lcBhTpZb46jYjGfGYp', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoiQkdwUXJBZDhUWUpGZFhKS2FwRFdqVkVDaGx4dnVFR0g5b0J0UGJHeiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyOToiaHR0cDovL2xvY2FsaG9zdC9sYXJhdmVsX2F1dGgiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozOToiaHR0cDovL2xvY2FsaG9zdC9sYXJhdmVsX2F1dGgvVXNlcnMvYWRkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJhJDEyJFE2bnBuelRFNHZ2RDFwbDdZSlFMUE9VZXJPZ0RBV0Njam9EZEU0SmtvU0NDczN2bjFwSVRLIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyYSQxMiRRNm5wbnpURTR2dkQxcGw3WUpRTFBPVWVyT2dEQVdDY2pvRGRFNEprb1NDQ3Mzdm4xcElUSyI7czoxNjoibGFzdEFjdGl2aXR5VGltZSI7aToxNjU1OTAxNzIzO30=', 1655901723),
('rEMjJYb1BjlvhM1fxrHewjwLW7rGmdJBzz6at7vW', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVUpLQW5sa3E3MGdSM0tBb0VBTmJBMkhlbzBjanlJQ3k1bFJqVkJGZSI7czoxNjoibGFzdEFjdGl2aXR5VGltZSI7aToxNjU2MDczMzIzO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM1OiJodHRwOi8vbG9jYWxob3N0L2xhcmF2ZWxfYXV0aC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1656073325);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `active` enum('Yes','No') COLLATE utf8mb4_unicode_ci DEFAULT 'Yes',
  `IsActive` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `deleted` enum('No','Yes') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No' COMMENT 'deleted = yes not deleted= no',
  `keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `first_name`, `last_name`, `designation`, `department`, `contact_no`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`, `created_by`, `updated_by`, `active`, `IsActive`, `deleted`, `keywords`) VALUES
(1, 1, 'Admin', 'vijay.phppoets@gmail.com', 'Vijay', 'Lakshkar', 'Developer', '1', '8561082545', NULL, '$2a$12$Q6npnzTE4vvD1pl7YJQLPOUerOgDAWCcjoDdE4JkoSCCs3vn1pITK', NULL, NULL, NULL, '2021-04-03 23:35:44', '2022-07-04 11:09:59', 0, NULL, 'Yes', 'Yes', 'No', 'Vijay, Lakshkar, vijay.phppoets@gmail.com, 8561082545, admin'),
(6, 2, 'vijay krishna', 'krishna@gmail.com', 'vijay', 'krishna', NULL, '1', '9762926990', NULL, '', NULL, NULL, NULL, '2022-06-07 10:01:43', '2022-06-07 10:01:43', 0, NULL, 'Yes', 'No', 'No', 'Vijay, krishna,9762926990, krishna@gmail.com'),
(7, 2, 'Neetu', 'Neetu@gmail.com', 'Neetu', 'Lakshkar', 'House Wife', '2', '9166169178', NULL, '$2y$10$OysItQYrLOHIpMvxTlXL9.Yg1dioDST7Nrpdp0u9C8R4u6gWAJmo6', NULL, NULL, NULL, '2022-06-07 10:31:48', '2022-06-07 10:31:48', 1, NULL, 'Yes', 'No', 'No', 'Neetu, Lakshkar, 9166169178, House Wife, Neetu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `id` int(80) NOT NULL,
  `user_id` int(80) NOT NULL,
  `access` longtext NOT NULL,
  `description` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`id`, `user_id`, `access`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Logs Report', 'Admin checked the logs View Panel', '2022-06-07 12:18:04', '2022-06-07 06:48:04'),
(2, 1, 'Logs Report', 'Admin checked the logs View Panel', '2022-06-07 12:31:14', '2022-06-07 07:01:14'),
(3, 1, 'User Access', 'Admin Visited the access page', '2022-06-07 12:31:17', '2022-06-07 07:01:17'),
(4, 1, 'User Access', 'Admin Visited the access page', '2022-06-07 12:31:43', '2022-06-07 07:01:43'),
(5, 1, 'User Access', 'Admin Granted The Access', '2022-06-07 12:31:55', '2022-06-07 07:01:55'),
(6, 1, 'User Access', 'Admin Visited the access page', '2022-06-07 12:31:55', '2022-06-07 07:01:55'),
(7, 1, 'Logs Report', 'Admin checked the logs View Panel', '2022-06-07 12:32:05', '2022-06-07 07:02:05'),
(8, 1, 'User Add', 'Admin Added the User', '2022-06-07 16:01:47', '2022-06-07 10:31:47'),
(9, 1, 'User Access', 'Admin Visited the access page', '2022-06-07 16:05:16', '2022-06-07 10:35:16'),
(10, 1, 'User Access', 'Admin Visited the access page', '2022-06-07 16:14:45', '2022-06-07 10:44:45'),
(11, 1, 'Logs Report', 'Admin checked the logs View Panel', '2022-06-07 17:36:18', '2022-06-07 12:06:18'),
(12, 1, 'User Access', 'Admin Visited the access page', '2022-06-07 17:36:20', '2022-06-07 12:06:20'),
(13, 1, 'Logs Report', 'Admin checked the logs View Panel', '2022-06-07 17:36:32', '2022-06-07 12:06:32'),
(14, 1, 'Logs Report', 'Admin checked the logs View Panel', '2022-06-08 09:27:21', '2022-06-08 03:57:21'),
(15, 1, 'User Access', 'Admin Visited the access page', '2022-06-08 16:37:18', '2022-06-08 11:07:18'),
(16, 1, 'Logs Report', 'Admin checked the logs View Panel', '2022-06-10 12:28:57', '2022-06-10 06:58:57'),
(17, 1, 'User Access', 'Admin Visited the access page', '2022-06-10 12:29:03', '2022-06-10 06:59:03'),
(18, 1, 'Orders View', 'Admin checked the Orders View Panel', '2022-06-20 15:51:34', '2022-06-20 10:21:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_level`
--
ALTER TABLE `access_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp_confirmation`
--
ALTER TABLE `otp_confirmation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_level`
--
ALTER TABLE `access_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `otp_confirmation`
--
ALTER TABLE `otp_confirmation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
