-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 21, 2021 at 10:44 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wwwresum_cheque_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_level`
--

CREATE TABLE `access_level` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permissions` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `access_level`
--

INSERT INTO `access_level` (`id`, `role_id`, `permissions`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 'a:23:{s:16:\"Bank-details/add\";s:16:\"Bank-details/add\";s:17:\"Bank-details/view\";s:17:\"Bank-details/view\";s:30:\"Bank-details/bank-details-view\";s:30:\"Bank-details/bank-details-view\";s:30:\"Bank-details/bank-details-edit\";s:30:\"Bank-details/bank-details-edit\";s:32:\"Bank-details/delete-bank-details\";s:32:\"Bank-details/delete-bank-details\";s:20:\"customer-details/add\";s:20:\"customer-details/add\";s:21:\"customer-details/view\";s:21:\"customer-details/view\";s:21:\"customer-details/show\";s:21:\"customer-details/show\";s:21:\"customer-details/edit\";s:21:\"customer-details/edit\";s:23:\"customer-details/delete\";s:23:\"customer-details/delete\";s:19:\"Tranaction-Code/add\";s:19:\"Tranaction-Code/add\";s:20:\"Tranaction-Code/view\";s:20:\"Tranaction-Code/view\";s:36:\"Tranaction-Code/Tranaction-Code-view\";s:36:\"Tranaction-Code/Tranaction-Code-view\";s:36:\"Tranaction-Code/Tranaction-Code-edit\";s:36:\"Tranaction-Code/Tranaction-Code-edit\";s:22:\"Tranaction-Code/delete\";s:22:\"Tranaction-Code/delete\";s:10:\"Orders/add\";s:10:\"Orders/add\";s:11:\"Orders/view\";s:11:\"Orders/view\";s:14:\"Orders/details\";s:14:\"Orders/details\";s:11:\"Orders-edit\";s:11:\"Orders-edit\";s:20:\"Orders/delete-orders\";s:20:\"Orders/delete-orders\";s:9:\"dashboard\";s:9:\"dashboard\";s:11:\"logs-report\";s:11:\"logs-report\";s:7:\"Reports\";s:7:\"Reports\";}', '2021-04-26 10:52:05', '2021-05-07 05:24:17', NULL, NULL),
(2, 2, 'a:5:{s:16:\"Bank-details/add\";s:16:\"Bank-details/add\";s:17:\"Bank-details/view\";s:17:\"Bank-details/view\";s:30:\"Bank-details/bank-details-view\";s:30:\"Bank-details/bank-details-view\";s:30:\"Bank-details/bank-details-edit\";s:30:\"Bank-details/bank-details-edit\";s:32:\"Bank-details/delete-bank-details\";s:32:\"Bank-details/delete-bank-details\";}', '2021-04-26 11:10:52', '2021-05-22 09:43:59', NULL, NULL),
(3, 3, 'a:14:{s:16:\"Bank-details/add\";s:16:\"Bank-details/add\";s:17:\"Bank-details/view\";s:17:\"Bank-details/view\";s:30:\"Bank-details/bank-details-edit\";s:30:\"Bank-details/bank-details-edit\";s:20:\"customer-details/add\";s:20:\"customer-details/add\";s:21:\"customer-details/show\";s:21:\"customer-details/show\";s:21:\"customer-details/edit\";s:21:\"customer-details/edit\";s:23:\"customer-details/delete\";s:23:\"customer-details/delete\";s:20:\"Tranaction-Code/view\";s:20:\"Tranaction-Code/view\";s:36:\"Tranaction-Code/Tranaction-Code-view\";s:36:\"Tranaction-Code/Tranaction-Code-view\";s:36:\"Tranaction-Code/Tranaction-Code-edit\";s:36:\"Tranaction-Code/Tranaction-Code-edit\";s:22:\"Tranaction-Code/delete\";s:22:\"Tranaction-Code/delete\";s:10:\"Orders/add\";s:10:\"Orders/add\";s:11:\"Orders/view\";s:11:\"Orders/view\";s:11:\"Orders-edit\";s:11:\"Orders-edit\";}', '2021-04-30 09:50:18', '2021-04-30 10:57:41', NULL, NULL),
(4, 6, 'a:4:{s:16:\"Bank-details/add\";s:16:\"Bank-details/add\";s:17:\"Bank-details/view\";s:17:\"Bank-details/view\";s:30:\"Bank-details/bank-details-view\";s:30:\"Bank-details/bank-details-view\";s:9:\"dashboard\";s:9:\"dashboard\";}', '2021-05-21 10:16:21', '2021-05-21 10:16:21', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `account_types`
--

CREATE TABLE `account_types` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_types`
--

INSERT INTO `account_types` (`id`, `code`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted`) VALUES
(1, 'Corporate', 'this is a corporate account ', '2021-04-07 08:30:05', '2021-04-07 08:30:05', 1, 1, 'No'),
(2, 'Personal', 'this is a personal account', '2021-04-07 08:30:05', '2021-04-07 08:30:05', 1, 1, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_code` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted` enum('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`id`, `bank_name`, `bank_code`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted`) VALUES
(1, 'State Bank of India', '40', '2021-05-26 20:43:47', '2021-05-26 20:43:47', 1, NULL, 'No'),
(2, 'ICICI Bank', '70', '2021-05-26 20:44:15', '2021-06-04 14:14:49', 1, NULL, 'Yes'),
(3, 'EQUITY BANK', '14', '2021-06-04 13:08:48', '2021-06-04 13:08:48', 1, NULL, 'No'),
(4, 'DIAMOND TRUST BANK', '20', '2021-06-04 13:21:57', '2021-06-04 14:13:49', 1, 1, 'No'),
(5, 'Imported bank 1', '45', '2021-06-19 11:50:59', '2021-06-19 11:50:59', 1, NULL, 'No'),
(6, 'Imported bank 2', '46', '2021-06-19 11:50:59', '2021-06-19 11:50:59', 1, NULL, 'No'),
(7, 'Imported bank 3', '49', '2021-06-21 11:17:37', '2021-06-21 11:17:37', 1, NULL, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `bank_row_details`
--

CREATE TABLE `bank_row_details` (
  `id` int(11) NOT NULL,
  `bank_details_id` int(11) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `branch_code` varchar(255) NOT NULL,
  `clearance` varchar(255) NOT NULL,
  `sort_code` varchar(255) NOT NULL,
  `street_address` text,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `branch_details` text,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` enum('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_row_details`
--

INSERT INTO `bank_row_details` (`id`, `bank_details_id`, `branch_name`, `branch_code`, `clearance`, `sort_code`, `street_address`, `country`, `state`, `city`, `zipcode`, `branch_details`, `updated_at`, `created_at`, `deleted`) VALUES
(1, 1, 'Durga Nursery Road', '60', '60', '40-60-60', 'Ground & 1st Floor, Daroli House WN 34, Savina Main Rd, Sunderwas, Pratap Nagar,', 'India', 'Rajasthan', 'Udaipur', '', NULL, '2021-05-26 15:13:47', '2021-05-26 15:13:47', 'No'),
(2, 2, 'Pathon Ki Magri', '90', '90', '70-90-90', '', '', '', '', '', NULL, '2021-05-26 15:14:15', '2021-05-26 15:14:15', 'No'),
(3, 3, 'KAMPALA BRANCH', '01', '47', '14-01-47', '', 'UGANDA', '', 'KAMPALA', '', NULL, '2021-06-04 07:38:48', '2021-06-04 07:38:48', 'No'),
(4, 4, 'EQUATORIA BRANCH', '03', '47', '20-03-47', 'WILLIAM STREET', 'UGANDA', NULL, 'KAMPALA', NULL, NULL, '2021-06-04 14:13:49', '2021-06-04 07:51:57', 'No'),
(5, 5, 'ib 1 br 1', '11', '40', '45-11-40', 'ib1 br steet 1', 'africa', 'state1', 'city1', '123456', NULL, '2021-06-19 11:50:59', '2021-06-19 11:50:59', 'No'),
(6, 5, 'ib 1 br 2', '12', '41', '45-12-41', 'ib1 br steet 2', 'africa', 'state2', 'city2', '123457', NULL, '2021-06-19 11:50:59', '2021-06-19 11:50:59', 'No'),
(7, 5, 'ib 1 br 3', '13', '42', '45-13-42', 'ib1 br steet 3', 'africa', 'state3', 'city3', '123458', NULL, '2021-06-19 11:50:59', '2021-06-19 11:50:59', 'No'),
(8, 5, 'ib 1 br 4', '14', '43', '45-14-43', 'ib1 br steet 4', 'africa', 'state4', 'city4', '123459', NULL, '2021-06-19 11:50:59', '2021-06-19 11:50:59', 'No'),
(9, 5, 'ib 1 br 5', '15', '44', '45-15-44', 'ib1 br steet 5', 'africa', 'state5', 'city5', '123460', NULL, '2021-06-19 11:50:59', '2021-06-19 11:50:59', 'No'),
(10, 5, 'ib 1 br 6', '16', '45', '45-16-45', 'ib1 br steet 6', 'africa', 'state6', 'city6', '123461', NULL, '2021-06-19 11:50:59', '2021-06-19 11:50:59', 'No'),
(11, 5, 'ib 1 br 7', '17', '46', '45-17-46', 'ib1 br steet 7', 'africa', 'state7', 'city7', '123462', NULL, '2021-06-19 11:50:59', '2021-06-19 11:50:59', 'No'),
(12, 6, 'ib2 br1', '18', '47', '46-18-47', 'ib2 br steet 1', 'africa', 'state8', 'city8', '123463', NULL, '2021-06-19 11:50:59', '2021-06-19 11:50:59', 'No'),
(13, 6, 'ib2 br2', '19', '48', '46-19-48', 'ib2 br steet 2', 'africa', 'state9', 'city9', '123464', NULL, '2021-06-19 11:50:59', '2021-06-19 11:50:59', 'No'),
(14, 6, 'ib2 br3', '20', '49', '46-20-49', 'ib2 br steet 3', 'africa', 'state10', 'city10', '123465', NULL, '2021-06-19 11:50:59', '2021-06-19 11:50:59', 'No'),
(15, 6, 'ib2 br4', '21', '50', '46-21-50', 'ib2 br steet 4', 'africa', 'state11', 'city11', '123466', NULL, '2021-06-19 11:50:59', '2021-06-19 11:50:59', 'No'),
(16, 6, 'ib2 br5', '22', '51', '46-22-51', 'ib2 br steet 5', 'africa', 'state12', 'city12', '123467', NULL, '2021-06-19 11:50:59', '2021-06-19 11:50:59', 'No'),
(17, 6, 'ib2 br6', '23', '52', '46-23-52', 'ib2 br steet 6', 'africa', 'state13', 'city13', '123468', NULL, '2021-06-19 11:50:59', '2021-06-19 11:50:59', 'No'),
(18, 6, 'ib2 br7', '24', '53', '46-24-53', 'ib2 br steet 7', 'africa', 'state14', 'city14', '123469', NULL, '2021-06-19 11:50:59', '2021-06-19 11:50:59', 'No'),
(19, 6, 'ib2 br8', '25', '54', '46-25-54', 'ib2 br steet 8', 'africa', 'state15', 'city15', '123470', NULL, '2021-06-19 11:50:59', '2021-06-19 11:50:59', 'No'),
(20, 6, 'ib2 br9', '26', '55', '46-26-55', 'ib2 br steet 9', 'africa', 'state16', 'city16', '123471', NULL, '2021-06-19 11:50:59', '2021-06-19 11:50:59', 'No'),
(21, 6, 'ib2 br10', '27', '56', '46-27-56', 'ib2 br steet 10', 'africa', 'state17', 'city17', '123472', NULL, '2021-06-19 11:50:59', '2021-06-19 11:50:59', 'No'),
(22, 7, 'ib 3 br 1', '11', '40', '49-11-40', 'ib1 br steet 1', 'africa', 'state1', 'city1', '123456', NULL, '2021-06-21 11:17:37', '2021-06-21 11:17:37', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `cheque_leaf_waste`
--

CREATE TABLE `cheque_leaf_waste` (
  `id` int(80) NOT NULL,
  `bank_id` int(80) DEFAULT NULL,
  `no_leaves` int(80) DEFAULT NULL,
  `from_date` datetime DEFAULT NULL,
  `to_date` datetime DEFAULT NULL,
  `created_by` int(80) DEFAULT NULL,
  `updated_by` int(80) DEFAULT NULL,
  `deleted` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cheque_leaf_waste`
--

INSERT INTO `cheque_leaf_waste` (`id`, `bank_id`, `no_leaves`, `from_date`, `to_date`, `created_by`, `updated_by`, `deleted`) VALUES
(1, 2, 50, '2021-05-19 00:00:00', '1970-01-01 00:00:00', NULL, NULL, 'No'),
(2, 2, 90, '2021-05-18 00:00:00', '2021-05-05 00:00:00', NULL, NULL, 'No'),
(3, 2, 450, '2021-05-25 00:00:00', '1970-01-01 00:00:00', NULL, NULL, 'No'),
(4, 1, 50000, '2021-04-02 13:01:01', '1970-01-01 00:00:00', NULL, NULL, 'No'),
(5, 2, 10, '2021-05-28 00:00:00', '2021-05-28 00:00:00', NULL, NULL, 'No'),
(6, 1, 10, '2021-06-19 00:00:00', '2021-06-19 00:00:00', NULL, NULL, 'No'),
(7, 4, 200, '2021-05-04 00:00:00', '2021-06-16 00:00:00', NULL, NULL, 'No'),
(8, 5, 200, '2021-05-04 00:00:00', '2021-06-19 00:00:00', NULL, NULL, 'No'),
(9, 1, 50, '2021-06-19 00:00:00', '2021-06-19 00:00:00', NULL, NULL, 'No'),
(10, 4, 45, '2021-06-19 00:00:00', '2021-06-19 00:00:00', NULL, NULL, 'No'),
(11, 3, 70, '2021-06-20 00:00:00', '2021-06-21 00:00:00', NULL, NULL, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `id` int(11) NOT NULL,
  `bank_details_id` int(11) DEFAULT NULL,
  `bank_detail_row_id` int(11) DEFAULT NULL,
  `bank_detail_row_child_id` int(11) DEFAULT NULL,
  `account_type_id` int(11) DEFAULT NULL,
  `account_no` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `short_code` varchar(255) DEFAULT NULL,
  `cheque_digit` varchar(255) DEFAULT NULL,
  `street_address` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `deleted` enum('Yes','No') NOT NULL DEFAULT 'No' COMMENT 'deleted = Yes Not Deleted =No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`id`, `bank_details_id`, `bank_detail_row_id`, `bank_detail_row_child_id`, `account_type_id`, `account_no`, `first_name`, `middle_name`, `last_name`, `short_code`, `cheque_digit`, `street_address`, `country`, `state`, `city`, `zipcode`, `contact_no`, `email_id`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted`) VALUES
(1, 1, 1, NULL, 2, '7788999089', 'Dummy', '', 'User', NULL, '01', '', '', '', '', '', '', '', '2021-05-28 10:54:57', NULL, '2021-05-28 10:54:57', NULL, 'No'),
(2, 3, 3, NULL, 2, '0123456789', 'MARIE-ELEN', 'ODIMBA', 'KOMBE', NULL, '011', '', '', '', '', '', '', '', '2021-06-04 13:11:33', NULL, '2021-06-04 13:13:11', NULL, 'No'),
(3, 3, 3, NULL, 1, '9876543210', 'RACHEAL', 'NANSUBUGA', '', NULL, '07', '', '', '', '', '', '', '', '2021-06-04 13:15:04', NULL, '2021-06-04 13:15:04', NULL, 'No'),
(4, 4, 4, NULL, 2, '11110004567890', 'PAULA', '', 'MIREMBE', NULL, '05', '', '', '', '', '', '', '', '2021-06-04 13:23:35', NULL, '2021-06-19 11:29:26', NULL, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `customer_row_details`
--

CREATE TABLE `customer_row_details` (
  `id` int(11) NOT NULL,
  `customer_details_id` int(11) NOT NULL,
  `transaction_code_id` int(11) NOT NULL,
  `last_cheque_no` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_row_details`
--

INSERT INTO `customer_row_details` (`id`, `customer_details_id`, `transaction_code_id`, `last_cheque_no`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '115', '2021-05-28 10:55:45', '2021-05-28 10:56:25'),
(2, 2, 2, '700', '2021-06-04 07:43:11', '2021-06-04 13:16:48'),
(3, 3, 2, '000150', '2021-06-04 07:45:04', NULL),
(8, 4, 4, '965300', '2021-06-19 05:59:26', NULL),
(9, 4, 3, '20', '2021-06-19 05:59:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` enum('Yes','No') NOT NULL DEFAULT 'No' COMMENT 'Deleted = Yes not deleted = No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department_name`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'Manager', '2021-04-08 11:01:06', '2021-04-08 11:01:06', 'No'),
(2, 'Clerk', '2021-04-08 11:01:15', '2021-04-08 11:01:15', 'No');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(6, '2021_04_04_102518_create_sessions_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL,
  `bank_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `order_status` enum('1','0') NOT NULL DEFAULT '0' COMMENT '1 = completed 0= pending',
  `deleted` enum('Yes','No') NOT NULL DEFAULT 'No' COMMENT 'deleted= Yes not deleted = No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_no`, `order_date`, `bank_id`, `created_at`, `updated_at`, `updated_by`, `created_by`, `order_status`, `deleted`) VALUES
(1, '12', '2021-05-12 17:24:01', 1, '2021-05-27 11:54:20', '2021-05-28 05:25:21', NULL, 0, '0', 'Yes'),
(2, 'OID/05/21/0002', '2021-05-28 00:00:00', 1, '2021-05-28 05:25:45', '2021-06-17 14:25:59', NULL, 1, '0', 'No'),
(3, 'OID/05/21/0003', '2021-05-28 00:00:00', 1, '2021-05-28 05:26:25', '2021-05-28 05:26:25', NULL, 1, '0', 'No'),
(4, 'OID/06/21/0004', '2021-06-04 00:00:00', 3, '2021-06-04 07:46:48', '2021-06-21 05:49:57', NULL, 1, '1', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `order_rows`
--

CREATE TABLE `order_rows` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `transaction_code_id` int(11) NOT NULL,
  `start_no` varchar(255) DEFAULT NULL,
  `end_no` varchar(255) DEFAULT NULL,
  `leaves` varchar(255) NOT NULL,
  `remarks` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_rows`
--

INSERT INTO `order_rows` (`id`, `order_id`, `customer_id`, `transaction_code_id`, `start_no`, `end_no`, `leaves`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 2, '1', '15', '15', 'ok', '2021-05-28 05:25:45', NULL),
(2, 3, 1, 2, '16', '115', '100', 'ok', '2021-05-28 05:26:25', NULL),
(5, 4, 2, 2, '601', '700', '100', 'Null', '2021-06-21 05:49:57', NULL);

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` enum('Yes','No') NOT NULL DEFAULT 'No' COMMENT 'deleted = yes not deleted = No',
  `active` enum('Yes','No') NOT NULL DEFAULT 'Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `roles`, `created_at`, `updated_at`, `deleted`, `active`) VALUES
(1, 'Admin', '2021-04-08 10:44:39', '2021-05-05 10:24:40', 'No', 'Yes'),
(2, 'Management', '2021-04-08 10:46:07', '2021-05-04 08:13:18', 'No', 'Yes'),
(3, 'Role 1', '2021-04-08 10:46:07', '2021-05-04 08:08:04', 'No', 'No'),
(4, 'Role 2', '2021-04-08 10:46:07', '2021-04-08 10:46:07', 'No', 'Yes'),
(5, 'Role 3', '2021-04-30 10:59:08', '2021-05-04 07:30:36', 'No', 'No'),
(6, 'Role 4', '2021-04-30 10:59:08', '2021-04-30 10:59:08', 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('H4nvKXuKVwZtxcE9swb75g41wB8XjVMSvUvLgyel', 1, '157.47.193.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.106 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiWTNYVUpHRFZtSEtBR2VvQjg4MnJVYUh3aWMxVjJKQjl6MnZIcEt6eiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9yZXN1bWVjaGFrcmEuY29tL2NoZXF1ZW1hbmFnZW1lbnQvbG9ncy1yZXBvcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkWE56RzkyT3d5enNrdjA3ZFdCVHIvdUZCSXFQQXVaSnlRbkZocUpEbkN5RjZrd3prbDUvNXkiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJFhOekc5Mk93eXpza3YwN2RXQlRyL3VGQklxUEF1Wkp5UW5GaHFKRG5DeUY2a3d6a2w1LzV5Ijt9', 1624254794),
('UkG5pdUybT8NB0Zch9oqscIQDcD7SMiJ9Pip6pjI', 1, '157.47.211.213', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiRjVaUjVjZjdrYmFmQVc5MHNCMUlWcTZnYUZzR0NvYXVVaThtalJ6WiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHA6Ly9yZXN1bWVjaGFrcmEuY29tL2NoZXF1ZW1hbmFnZW1lbnQvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJFhOekc5Mk93eXpza3YwN2RXQlRyL3VGQklxUEF1Wkp5UW5GaHFKRG5DeUY2a3d6a2w1LzV5IjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRYTnpHOTJPd3l6c2t2MDdkV0JUci91RkJJcVBBdVpKeVFuRmhxSkRuQ3lGNmt3emtsNS81eSI7fQ==', 1624102281);

-- --------------------------------------------------------

--
-- Table structure for table `toner_details`
--

CREATE TABLE `toner_details` (
  `id` int(80) NOT NULL,
  `toners` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` longtext COLLATE utf8_unicode_ci,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL,
  `created_by` int(50) DEFAULT NULL,
  `updated_by` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `toner_details`
--

INSERT INTO `toner_details` (`id`, `toners`, `remarks`, `from_date`, `to_date`, `created_by`, `updated_by`) VALUES
(7, '8', '8', '2021-06-01 00:00:00', '2021-05-10 00:00:00', NULL, NULL),
(8, '5', '2', '2021-05-28 00:00:00', '2021-05-28 00:00:00', NULL, NULL),
(9, '0', '5', '2021-05-28 00:00:00', '2021-04-28 00:00:00', NULL, NULL),
(10, '3', 'sneha', '2021-06-19 00:00:00', '2021-06-19 00:00:00', NULL, NULL),
(11, '56', 'vijay', '2021-06-19 00:00:00', '2021-06-19 00:00:00', NULL, NULL),
(12, '4', 'issued to sneha', '2021-06-21 00:00:00', '2021-06-21 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_code`
--

CREATE TABLE `transaction_code` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted` enum('Yes','No') NOT NULL DEFAULT 'No' COMMENT 'deleted = 1, non-deleted-0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_code`
--

INSERT INTO `transaction_code` (`id`, `code`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted`) VALUES
(1, '45', NULL, '2021-05-25 12:07:47', '2021-05-25 12:07:57', 1, NULL, 'Yes'),
(2, '15', 'Dummy', '2021-05-28 05:25:13', '2021-05-28 05:25:13', 1, NULL, 'No'),
(3, '11', 'UGX', '2021-06-04 07:54:01', '2021-06-04 07:54:01', 1, NULL, 'No'),
(4, '22', 'USD', '2021-06-04 07:54:19', '2021-06-04 07:54:19', 1, NULL, 'No'),
(5, '23', 'EURO', '2021-06-04 07:54:42', '2021-06-04 07:54:42', 1, NULL, 'No'),
(6, '24', 'GBP', '2021-06-04 07:54:58', '2021-06-04 07:54:58', 1, NULL, 'No');

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
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `active` enum('Yes','No') COLLATE utf8mb4_unicode_ci DEFAULT 'Yes',
  `deleted` enum('No','Yes') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No' COMMENT 'deleted = yes not deleted= no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `first_name`, `last_name`, `designation`, `department`, `contact_no`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`, `created_by`, `updated_by`, `active`, `deleted`) VALUES
(1, 1, 'Admin', 'admin@banksoft.com', 'Vijay', 'Lakshkar', 'Developer', '1', '8561082545', NULL, '$2y$10$XNzG92Owyzskv07dWBTr/uFBIqPAuZJyQnFhqJDnCyF6kwzkl5/5y', NULL, NULL, NULL, '2021-04-04 05:05:44', '2021-05-25 12:59:08', 0, NULL, 'Yes', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `id` int(80) NOT NULL,
  `user_id` int(80) NOT NULL,
  `access` longtext NOT NULL,
  `description` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`id`, `user_id`, `access`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'User Add', 'Admin Added the User', '2021-05-22 09:54:39', '2021-05-22 09:54:39'),
(2, 1, 'User Add', 'Admin Added the User', '2021-05-22 09:55:10', '2021-05-22 09:55:10'),
(3, 1, 'User Add', 'Admin Added the User', '2021-05-22 09:55:23', '2021-05-22 09:55:23'),
(4, 1, 'Bank Details Checked', 'Admin checked the Banks View Panel', '2021-05-22 15:26:07', '2021-05-22 15:26:07'),
(5, 1, 'Bank Details Checked', 'Admin checked the Banks View Panel', '2021-05-22 15:41:02', '2021-05-22 15:41:02'),
(6, 1, 'Customers View', 'Admin  checked the Customer View Panel', '2021-05-22 15:41:07', '2021-05-22 15:41:07'),
(7, 1, 'Transaction Code View', 'Admin checked the Transaction View Panel', '2021-05-22 15:41:12', '2021-05-22 15:41:12'),
(8, 1, 'Orders View', 'Admin checked the Orders View Panel', '2021-05-22 15:41:20', '2021-05-22 15:41:20'),
(9, 1, 'Logs Report', 'Admin checked the logs View Panel', '2021-05-22 15:41:25', '2021-05-22 15:41:25'),
(10, 1, 'User Access', 'Admin Visited the access page', '2021-05-22 10:11:44', '2021-05-22 10:11:44'),
(11, 1, 'Bank Details Checked', 'Admin checked the Banks View Panel', '2021-05-24 13:41:36', '2021-05-24 13:41:36'),
(12, 1, 'Customers View', 'Admin  checked the Customer View Panel', '2021-05-24 13:41:41', '2021-05-24 13:41:41'),
(13, 1, 'Transaction Code View', 'Admin checked the Transaction View Panel', '2021-05-24 13:41:46', '2021-05-24 13:41:46'),
(14, 1, 'Orders View', 'Admin checked the Orders View Panel', '2021-05-24 13:41:51', '2021-05-24 13:41:51'),
(15, 1, 'Logs Report', 'Admin checked the logs View Panel', '2021-05-24 13:41:55', '2021-05-24 13:41:55'),
(16, 1, 'Orders View', 'Admin checked the Orders View Panel', '2021-05-25 17:04:12', '2021-05-25 17:04:12'),
(17, 1, 'Transaction Code Add', 'Admin added 45', '2021-05-25 17:37:47', '2021-05-25 17:37:47'),
(18, 1, 'Transaction Code View', 'Admin checked the Transaction View Panel', '2021-05-25 17:37:51', '2021-05-25 17:37:51'),
(19, 1, 'Transaction Code Delete', 'Admin deleted 45', '2021-05-25 17:37:57', '2021-05-25 17:37:57'),
(20, 1, 'Transaction Code View', 'Admin checked the Transaction View Panel', '2021-05-25 17:37:58', '2021-05-25 17:37:58'),
(21, 1, 'Bank Details Checked', 'Admin checked the Banks View Panel', '2021-05-25 18:37:58', '2021-05-25 18:37:58'),
(22, 1, 'Transaction Code View', 'Admin checked the Transaction View Panel', '2021-05-25 18:38:04', '2021-05-25 18:38:04'),
(23, 1, 'Logs Report', 'Admin checked the logs View Panel', '2021-05-26 15:42:39', '2021-05-26 15:42:39'),
(24, 1, 'Logs Report', 'Admin checked the logs View Panel', '2021-05-26 15:43:19', '2021-05-26 15:43:19'),
(25, 1, 'Orders View', 'Admin checked the Orders View Panel', '2021-05-26 18:48:12', '2021-05-26 18:48:12'),
(26, 1, 'Bank Details Export', 'Admin Exported Banks Details', '2021-05-26 20:08:24', '2021-05-26 20:08:24'),
(27, 1, 'Logs Report', 'Admin checked the logs View Panel', '2021-05-26 20:43:01', '2021-05-26 20:43:01'),
(28, 1, 'Bank Details Add', 'Admin added State Bank of India', '2021-05-26 20:43:47', '2021-05-26 20:43:47'),
(29, 1, 'Bank Details Checked', 'Admin checked the Banks View Panel', '2021-05-26 20:43:49', '2021-05-26 20:43:49'),
(30, 1, 'Bank Details Add', 'Admin added ICICI Bank', '2021-05-26 20:44:15', '2021-05-26 20:44:15'),
(31, 1, 'Bank Details Checked', 'Admin checked the Banks View Panel', '2021-05-26 20:44:18', '2021-05-26 20:44:18'),
(32, 1, 'Logs Report', 'Admin checked the logs View Panel', '2021-05-27 09:14:22', '2021-05-27 09:14:22'),
(33, 1, 'Toner Create', 'Admin created the toner from 01/05/2021 to 10/05/2021 remarks Sample Remarks', '2021-05-27 09:14:48', '2021-05-27 09:14:48'),
(34, 1, 'Logs Report', 'Admin checked the logs View Panel', '2021-05-27 09:14:52', '2021-05-27 09:14:52'),
(35, 1, 'Logs Report', 'Admin checked the logs View Panel', '2021-05-27 09:31:55', '2021-05-27 09:31:55'),
(36, 1, 'Logs Report', 'Admin checked the logs View Panel', '2021-05-27 09:32:04', '2021-05-27 09:32:04'),
(37, 1, 'Toner Add', 'Admin created the toner from 10/05/2021 to 20/05/2021 remarks Development', '2021-05-27 09:32:24', '2021-05-27 09:32:24'),
(38, 1, 'Logs Report', 'Admin checked the logs View Panel', '2021-05-27 09:32:28', '2021-05-27 09:32:28'),
(39, 1, 'Cheque Leaf waste Add', 'Admin created the cheque leaf waste', '2021-05-27 09:33:36', '2021-05-27 09:33:36'),
(40, 1, 'Logs Report', 'Admin checked the logs View Panel', '2021-05-27 09:33:44', '2021-05-27 09:33:44'),
(41, 1, 'Cheque Leaf Waste Add', 'Admin created the cheque leaf waste', '2021-05-27 09:38:15', '2021-05-27 09:38:15'),
(42, 1, 'Logs Report', 'Admin checked the logs View Panel', '2021-05-27 09:38:33', '2021-05-27 09:38:33'),
(43, 1, 'Toner Add', 'Admin created the toner from 01-05-2021 to 10-05-2021 remarks vijay', '2021-05-27 19:38:33', '2021-05-27 19:38:33'),
(44, 1, 'Orders View', 'Admin checked the Orders View Panel', '2021-05-28 10:50:21', '2021-05-28 10:50:21'),
(45, 1, 'Orders View', 'Admin checked the Orders View Panel', '2021-05-28 10:53:47', '2021-05-28 10:53:47'),
(46, 1, 'Customer Add', 'Admin added Dummy User', '2021-05-28 10:54:57', '2021-05-28 10:54:57'),
(47, 1, 'Customers View', 'Admin  checked the Customer View Panel', '2021-05-28 10:55:00', '2021-05-28 10:55:00'),
(48, 1, 'Transaction Code Add', 'Admin added 15', '2021-05-28 10:55:13', '2021-05-28 10:55:13'),
(49, 1, 'Transaction Code View', 'Admin checked the Transaction View Panel', '2021-05-28 10:55:15', '2021-05-28 10:55:15'),
(50, 1, 'Order Delete', 'Admin deleted 12', '2021-05-28 10:55:21', '2021-05-28 10:55:21'),
(51, 1, 'Orders View', 'Admin checked the Orders View Panel', '2021-05-28 10:55:22', '2021-05-28 10:55:22'),
(52, 1, 'Orders Add', 'Admin added OID/05/21/0002', '2021-05-28 10:55:45', '2021-05-28 10:55:45'),
(53, 1, 'Orders View', 'Admin checked the Orders View Panel', '2021-05-28 10:55:48', '2021-05-28 10:55:48'),
(54, 1, 'Orders Add', 'Admin added OID/05/21/0003', '2021-05-28 10:56:25', '2021-05-28 10:56:25'),
(55, 1, 'Orders View', 'Admin checked the Orders View Panel', '2021-05-28 10:56:29', '2021-05-28 10:56:29'),
(56, 1, 'Orders View', 'Admin checked the Orders View Panel', '2021-05-28 10:56:40', '2021-05-28 10:56:40'),
(57, 1, 'Order Status', 'Admin changed OID/05/21/0002 no status', '2021-05-28 10:56:45', '2021-05-28 10:56:45'),
(58, 1, 'Orders View', 'Admin checked the Orders View Panel', '2021-05-28 10:56:54', '2021-05-28 10:56:54'),
(59, 1, 'Orders Export', 'Admin Exported the orders', '2021-05-28 10:56:57', '2021-05-28 10:56:57'),
(60, 1, 'Toner Add', 'Admin created the toner from 28-05-2021 to 28-05-2021 remarks 2', '2021-05-28 10:57:55', '2021-05-28 10:57:55'),
(61, 1, 'Toner Add', 'Admin created the toner from 28-05-2021 to 28-05-2021 remarks 5', '2021-05-28 10:58:15', '2021-05-28 10:58:15'),
(62, 1, 'Cheque Leaf Waste Add', 'Admin created the cheque leaf waste', '2021-05-28 10:58:38', '2021-05-28 10:58:38'),
(63, 1, 'Logs Report', 'Admin checked the logs View Panel', '2021-05-28 10:59:28', '2021-05-28 10:59:28'),
(64, 1, 'Orders View', 'Admin checked the Orders View Panel', '2021-05-28 11:03:35', '2021-05-28 11:03:35'),
(65, 1, 'Orders Export', 'Admin Exported the orders', '2021-05-28 11:03:38', '2021-05-28 11:03:38'),
(66, 1, 'Bank Details Checked', 'Admin checked the Banks View Panel', '2021-05-28 11:05:11', '2021-05-28 11:05:11'),
(67, 1, 'Bank Details Checked', 'Admin checked the Banks View Panel', '2021-05-28 13:04:57', '2021-05-28 13:04:57'),
(68, 1, 'Orders View', 'Admin checked the Orders View Panel', '2021-05-28 13:12:55', '2021-05-28 13:12:55'),
(69, 1, 'Orders View', 'Admin checked the Orders View Panel', '2021-05-28 13:13:50', '2021-05-28 13:13:50'),
(70, 1, 'Logs Report', 'Admin checked the logs View Panel', '2021-05-28 13:14:11', '2021-05-28 13:14:11'),
(71, 1, 'Bank Details Checked', 'Admin checked the Banks View Panel', '2021-06-03 16:12:29', '2021-06-03 16:12:29'),
(72, 1, 'Customers View', 'Admin  checked the Customer View Panel', '2021-06-03 16:12:36', '2021-06-03 16:12:36'),
(73, 1, 'Bank Details Add', 'Admin added EQUITY BANK', '2021-06-04 13:08:48', '2021-06-04 13:08:48'),
(74, 1, 'Bank Details Checked', 'Admin checked the Banks View Panel', '2021-06-04 13:08:50', '2021-06-04 13:08:50'),
(75, 1, 'Bank Details Checked', 'Admin checked the Banks View Panel', '2021-06-04 13:09:22', '2021-06-04 13:09:22'),
(76, 1, 'Customer Add', 'Admin added MARIE-ELEN KOMBE', '2021-06-04 13:11:33', '2021-06-04 13:11:33'),
(77, 1, 'Customers View', 'Admin  checked the Customer View Panel', '2021-06-04 13:11:35', '2021-06-04 13:11:35'),
(78, 1, 'Customer Update', 'Admin update the customer details', '2021-06-04 13:12:20', '2021-06-04 13:12:20'),
(79, 1, 'Customer Update', 'Admin updated details of the MARIE-ELEN KOMBE', '2021-06-04 13:12:20', '2021-06-04 13:12:20'),
(80, 1, 'Customers View', 'Admin  checked the Customer View Panel', '2021-06-04 13:12:22', '2021-06-04 13:12:22'),
(81, 1, 'Customer Update', 'Admin update the customer details', '2021-06-04 13:13:11', '2021-06-04 13:13:11'),
(82, 1, 'Customer Update', 'Admin updated details of the MARIE-ELEN KOMBE', '2021-06-04 13:13:11', '2021-06-04 13:13:11'),
(83, 1, 'Customers View', 'Admin  checked the Customer View Panel', '2021-06-04 13:13:13', '2021-06-04 13:13:13'),
(84, 1, 'Customer Add', 'Admin added RACHEAL ', '2021-06-04 13:15:04', '2021-06-04 13:15:04'),
(85, 1, 'Customers View', 'Admin  checked the Customer View Panel', '2021-06-04 13:15:06', '2021-06-04 13:15:06'),
(86, 1, 'Orders Add', 'Admin added OID/06/21/0004', '2021-06-04 13:16:48', '2021-06-04 13:16:48'),
(87, 1, 'Orders View', 'Admin checked the Orders View Panel', '2021-06-04 13:16:52', '2021-06-04 13:16:52'),
(88, 1, 'Logs Report', 'Admin checked the logs View Panel', '2021-06-04 13:17:47', '2021-06-04 13:17:47'),
(89, 1, 'Logs Report Export', 'Admin exported logs report', '2021-06-04 13:18:45', '2021-06-04 13:18:45'),
(90, 1, 'Bank Details Add', 'Admin added DTB', '2021-06-04 13:21:57', '2021-06-04 13:21:57'),
(91, 1, 'Bank Details Checked', 'Admin checked the Banks View Panel', '2021-06-04 13:22:00', '2021-06-04 13:22:00'),
(92, 1, 'Customer Add', 'Admin added PAULA MIREMBE', '2021-06-04 13:23:35', '2021-06-04 13:23:35'),
(93, 1, 'Customers View', 'Admin  checked the Customer View Panel', '2021-06-04 13:23:38', '2021-06-04 13:23:38'),
(94, 1, 'Transaction Code Add', 'Admin added 11', '2021-06-04 13:24:01', '2021-06-04 13:24:01'),
(95, 1, 'Transaction Code View', 'Admin checked the Transaction View Panel', '2021-06-04 13:24:04', '2021-06-04 13:24:04'),
(96, 1, 'Transaction Code Add', 'Admin added 22', '2021-06-04 13:24:19', '2021-06-04 13:24:19'),
(97, 1, 'Transaction Code View', 'Admin checked the Transaction View Panel', '2021-06-04 13:24:21', '2021-06-04 13:24:21'),
(98, 1, 'Transaction Code Add', 'Admin added 23', '2021-06-04 13:24:42', '2021-06-04 13:24:42'),
(99, 1, 'Transaction Code View', 'Admin checked the Transaction View Panel', '2021-06-04 13:24:44', '2021-06-04 13:24:44'),
(100, 1, 'Transaction Code Add', 'Admin added 24', '2021-06-04 13:24:58', '2021-06-04 13:24:58'),
(101, 1, 'Transaction Code View', 'Admin checked the Transaction View Panel', '2021-06-04 13:25:00', '2021-06-04 13:25:00'),
(102, 1, 'Customers View', 'Admin  checked the Customer View Panel', '2021-06-04 13:25:07', '2021-06-04 13:25:07'),
(103, 1, 'Customer Update', 'Admin update the customer details', '2021-06-04 13:25:41', '2021-06-04 13:25:41'),
(104, 1, 'Customer Update', 'Admin updated details of the PAULA MIREMBE', '2021-06-04 13:25:41', '2021-06-04 13:25:41'),
(105, 1, 'Customers View', 'Admin  checked the Customer View Panel', '2021-06-04 13:25:44', '2021-06-04 13:25:44'),
(106, 1, 'Customer Update', 'Admin update the customer details', '2021-06-04 13:26:11', '2021-06-04 13:26:11'),
(107, 1, 'Customer Update', 'Admin updated details of the PAULA MIREMBE', '2021-06-04 13:26:11', '2021-06-04 13:26:11'),
(108, 1, 'Customers View', 'Admin  checked the Customer View Panel', '2021-06-04 13:26:13', '2021-06-04 13:26:13'),
(109, 1, 'Bank Details Checked', 'Admin checked the Banks View Panel', '2021-06-04 14:13:26', '2021-06-04 14:13:26'),
(110, 1, 'Bank Details Update', 'Admin updated details of the DIAMOND TRUST BANK', '2021-06-04 14:13:49', '2021-06-04 14:13:49'),
(111, 1, 'Bank Details Checked', 'Admin checked the Banks View Panel', '2021-06-04 14:13:51', '2021-06-04 14:13:51'),
(112, 1, 'Bank Details Delete', 'Admin deleted ICICI Bank', '2021-06-04 14:14:49', '2021-06-04 14:14:49'),
(113, 1, 'Bank Details Checked', 'Admin checked the Banks View Panel', '2021-06-04 14:14:50', '2021-06-04 14:14:50'),
(114, 1, 'Bank Details Checked', 'Admin checked the Banks View Panel', '2021-06-04 14:14:56', '2021-06-04 14:14:56'),
(115, 1, 'Customers View', 'Admin  checked the Customer View Panel', '2021-06-04 14:15:59', '2021-06-04 14:15:59'),
(116, 1, 'Customer Update', 'Admin update the customer details', '2021-06-04 14:20:43', '2021-06-04 14:20:43'),
(117, 1, 'Customer Update', 'Admin updated details of the PAULA MIREMBE', '2021-06-04 14:20:43', '2021-06-04 14:20:43'),
(118, 1, 'Customers View', 'Admin  checked the Customer View Panel', '2021-06-04 14:20:45', '2021-06-04 14:20:45'),
(119, 1, 'Customers View', 'Admin  checked the Customer View Panel', '2021-06-04 14:21:26', '2021-06-04 14:21:26'),
(120, 1, 'Transaction Code View', 'Admin checked the Transaction View Panel', '2021-06-04 14:21:57', '2021-06-04 14:21:57'),
(121, 1, 'Orders View', 'Admin checked the Orders View Panel', '2021-06-04 14:22:05', '2021-06-04 14:22:05'),
(122, 1, 'Customers View', 'Admin  checked the Customer View Panel', '2021-06-04 14:22:53', '2021-06-04 14:22:53'),
(123, 1, 'Logs Report', 'Admin checked the logs View Panel', '2021-06-09 11:15:12', '2021-06-09 11:15:12'),
(124, 1, 'Logs Report', 'Admin checked the logs View Panel', '2021-06-09 11:29:46', '2021-06-09 11:29:46'),
(125, 1, 'Toners Export', 'Admin Exported the Toners', '2021-06-09 12:40:21', '2021-06-09 12:40:21'),
(126, 1, 'Toners Export', 'Admin Exported the Toners', '2021-06-09 12:41:08', '2021-06-09 12:41:08'),
(127, 1, 'Toners Export', 'Admin Exported the Toners', '2021-06-09 12:42:59', '2021-06-09 12:42:59'),
(128, 1, 'Toners Export', 'Admin Exported the Toners', '2021-06-09 12:44:19', '2021-06-09 12:44:19'),
(129, 1, 'Toners Export', 'Admin Exported the Toners', '2021-06-09 12:55:27', '2021-06-09 12:55:27'),
(130, 1, 'Toners Export', 'Admin Exported the Toners', '2021-06-09 12:55:52', '2021-06-09 12:55:52'),
(131, 1, 'Toners Export', 'Admin Exported the Toners', '2021-06-09 13:00:19', '2021-06-09 13:00:19'),
(132, 1, 'Toners Export', 'Admin Exported the Toners', '2021-06-09 13:01:36', '2021-06-09 13:01:36'),
(133, 1, 'Orders View', 'Admin checked the Orders View Panel', '2021-06-17 14:25:39', '2021-06-17 14:25:39'),
(134, 1, 'Orders Export', 'Admin Exported the orders', '2021-06-17 14:25:48', '2021-06-17 14:25:48'),
(135, 1, 'Order Status', 'Admin changed OID/05/21/0002 no status', '2021-06-17 14:25:59', '2021-06-17 14:25:59'),
(136, 1, 'Orders Update', 'Admin updated details of the OID/06/21/0004', '2021-06-17 14:26:33', '2021-06-17 14:26:33'),
(137, 1, 'Orders Export', 'Admin Exported the orders', '2021-06-17 14:26:35', '2021-06-17 14:26:35'),
(138, 1, 'Orders View', 'Admin checked the Orders View Panel', '2021-06-17 14:26:40', '2021-06-17 14:26:40'),
(139, 1, 'Customers View', 'Admin  checked the Customer View Panel', '2021-06-17 14:27:26', '2021-06-17 14:27:26'),
(140, 1, 'Customers View', 'Admin  checked the Customer View Panel', '2021-06-17 14:33:09', '2021-06-17 14:33:09'),
(141, 1, 'Logs Report', 'Admin checked the logs View Panel', '2021-06-17 14:50:33', '2021-06-17 14:50:33'),
(142, 1, 'Orders View', 'Admin checked the Orders View Panel', '2021-06-17 14:51:03', '2021-06-17 14:51:03'),
(143, 1, 'Customers View', 'Admin  checked the Customer View Panel', '2021-06-17 15:56:49', '2021-06-17 15:56:49'),
(144, 1, 'Customers View', 'Admin  checked the Customer View Panel', '2021-06-17 16:34:12', '2021-06-17 16:34:12'),
(145, 1, 'Bank Details Checked', 'Admin checked the Banks View Panel', '2021-06-17 16:34:25', '2021-06-17 16:34:25'),
(146, 1, 'Customers View', 'Admin  checked the Customer View Panel', '2021-06-17 16:34:40', '2021-06-17 16:34:40'),
(147, 1, 'Toners Export', 'Admin Exported the Toners', '2021-06-18 10:37:47', '2021-06-18 10:37:47'),
(148, 1, 'Orders View', 'Admin checked the Orders View Panel', '2021-06-18 10:58:02', '2021-06-18 10:58:02'),
(149, 1, 'Logs Report', 'Admin checked the logs View Panel', '2021-06-18 10:58:06', '2021-06-18 10:58:06'),
(150, 1, 'User Access', 'Admin Visited the access page', '2021-06-18 05:28:12', '2021-06-18 05:28:12'),
(151, 1, 'Bank Details Checked', 'Admin checked the Banks View Panel', '2021-06-18 10:58:36', '2021-06-18 10:58:36'),
(152, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 11:01:38', '2021-06-18 11:01:38'),
(153, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 11:18:26', '2021-06-18 11:18:26'),
(154, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 11:19:30', '2021-06-18 11:19:30'),
(155, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 11:21:03', '2021-06-18 11:21:03'),
(156, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 11:21:09', '2021-06-18 11:21:09'),
(157, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 11:23:15', '2021-06-18 11:23:15'),
(158, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 11:23:51', '2021-06-18 11:23:51'),
(159, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 11:24:25', '2021-06-18 11:24:25'),
(160, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 11:24:48', '2021-06-18 11:24:48'),
(161, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 11:27:22', '2021-06-18 11:27:22'),
(162, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 11:28:38', '2021-06-18 11:28:38'),
(163, 1, 'Toners Export', 'Admin Exported the Toners', '2021-06-18 11:29:37', '2021-06-18 11:29:37'),
(164, 1, 'Toners Export', 'Admin Exported the Toners', '2021-06-18 11:30:26', '2021-06-18 11:30:26'),
(165, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 12:42:25', '2021-06-18 12:42:25'),
(166, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 12:43:14', '2021-06-18 12:43:14'),
(167, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 12:43:42', '2021-06-18 12:43:42'),
(168, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 12:44:14', '2021-06-18 12:44:14'),
(169, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 12:44:57', '2021-06-18 12:44:57'),
(170, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 12:49:35', '2021-06-18 12:49:35'),
(171, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 12:51:01', '2021-06-18 12:51:01'),
(172, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 12:54:29', '2021-06-18 12:54:29'),
(173, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 12:55:08', '2021-06-18 12:55:08'),
(174, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 13:05:28', '2021-06-18 13:05:28'),
(175, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 13:05:47', '2021-06-18 13:05:47'),
(176, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 13:06:39', '2021-06-18 13:06:39'),
(177, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 13:06:59', '2021-06-18 13:06:59'),
(178, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 13:10:10', '2021-06-18 13:10:10'),
(179, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 13:10:32', '2021-06-18 13:10:32'),
(180, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 17:40:48', '2021-06-18 17:40:48'),
(181, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 17:41:18', '2021-06-18 17:41:18'),
(182, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 17:42:52', '2021-06-18 17:42:52'),
(183, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 17:43:14', '2021-06-18 17:43:14'),
(184, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 17:43:37', '2021-06-18 17:43:37'),
(185, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 17:47:24', '2021-06-18 17:47:24'),
(186, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 17:47:48', '2021-06-18 17:47:48'),
(187, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 17:53:56', '2021-06-18 17:53:56'),
(188, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 17:55:08', '2021-06-18 17:55:08'),
(189, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 17:57:57', '2021-06-18 17:57:57'),
(190, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 17:59:16', '2021-06-18 17:59:16'),
(191, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 18:01:19', '2021-06-18 18:01:19'),
(192, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 18:10:02', '2021-06-18 18:10:02'),
(193, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-18 18:10:43', '2021-06-18 18:10:43'),
(194, 1, 'Toners Export', 'Admin Exported the Toners', '2021-06-18 18:18:56', '2021-06-18 18:18:56'),
(195, 1, 'Toners Export', 'Admin Exported the Toners', '2021-06-18 18:20:22', '2021-06-18 18:20:22'),
(196, 1, 'Toners Export', 'Admin Exported the Toners', '2021-06-18 18:21:02', '2021-06-18 18:21:02'),
(197, 1, 'Customers View', 'Admin  checked the Customer View Panel', '2021-06-19 09:40:36', '2021-06-19 09:40:36'),
(198, 1, 'Customers View', 'Admin  checked the Customer View Panel', '2021-06-19 11:28:07', '2021-06-19 11:28:07'),
(199, 1, 'Customer Update', 'Admin update the customer details', '2021-06-19 11:29:26', '2021-06-19 11:29:26'),
(200, 1, 'Customer Update', 'Admin updated details of the PAULA MIREMBE', '2021-06-19 11:29:26', '2021-06-19 11:29:26'),
(201, 1, 'Customers View', 'Admin  checked the Customer View Panel', '2021-06-19 11:29:28', '2021-06-19 11:29:28'),
(202, 1, 'Bank Details Checked', 'Admin checked the Banks View Panel', '2021-06-19 11:31:03', '2021-06-19 11:31:03'),
(203, 1, 'Bank Details Import', 'Admin Imported Banks Details', '2021-06-19 11:50:59', '2021-06-19 11:50:59'),
(204, 1, 'Bank Details Checked', 'Admin checked the Banks View Panel', '2021-06-19 11:51:00', '2021-06-19 11:51:00'),
(205, 1, 'Orders View', 'Admin checked the Orders View Panel', '2021-06-19 11:54:43', '2021-06-19 11:54:43'),
(206, 1, 'Order Status', 'Admin changed OID/06/21/0004 no status', '2021-06-19 11:54:48', '2021-06-19 11:54:48'),
(207, 1, 'Orders Export', 'Admin Exported the orders', '2021-06-19 11:54:50', '2021-06-19 11:54:50'),
(208, 1, 'Orders View', 'Admin checked the Orders View Panel', '2021-06-19 11:56:52', '2021-06-19 11:56:52'),
(209, 1, 'Orders View', 'Admin checked the Orders View Panel', '2021-06-19 11:59:18', '2021-06-19 11:59:18'),
(210, 1, 'Logs Report', 'Admin checked the logs View Panel', '2021-06-19 12:05:35', '2021-06-19 12:05:35'),
(211, 1, 'Cheque Leaf Waste Add', 'Admin created the cheque leaf waste', '2021-06-19 12:06:16', '2021-06-19 12:06:16'),
(212, 1, 'Toner Add', 'Admin created the toner from 19-06-2021 to 19-06-2021 remarks sneha', '2021-06-19 12:06:51', '2021-06-19 12:06:51'),
(213, 1, 'Logs Report', 'Admin checked the logs View Panel', '2021-06-19 12:07:00', '2021-06-19 12:07:00'),
(214, 1, 'Cheque Leaf Waste Add', 'Admin created the cheque leaf waste', '2021-06-19 12:09:07', '2021-06-19 12:09:07'),
(215, 1, 'Logs Report', 'Admin checked the logs View Panel', '2021-06-19 12:09:21', '2021-06-19 12:09:21'),
(216, 1, 'Cheque Leaf Waste Add', 'Admin created the cheque leaf waste', '2021-06-19 12:09:57', '2021-06-19 12:09:57'),
(217, 1, 'Toners Export', 'Admin Exported the Toners', '2021-06-19 12:20:53', '2021-06-19 12:20:53'),
(218, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-19 12:21:17', '2021-06-19 12:21:17'),
(219, 1, 'Toners Export', 'Admin Exported the Toners', '2021-06-19 12:25:54', '2021-06-19 12:25:54'),
(220, 1, 'Cheque Waste Leaf Export', 'Admin Exported the Cheque Waste Leaf', '2021-06-19 12:26:36', '2021-06-19 12:26:36'),
(221, 1, 'Orders View', 'Admin checked the Orders View Panel', '2021-06-19 13:50:26', '2021-06-19 13:50:26'),
(222, 1, 'Orders Export', 'Admin Exported the orders', '2021-06-19 13:50:39', '2021-06-19 13:50:39'),
(223, 1, 'Orders View', 'Admin checked the Orders View Panel', '2021-06-19 13:53:19', '2021-06-19 13:53:19'),
(224, 1, 'Orders Export', 'Admin Exported the orders', '2021-06-19 13:53:26', '2021-06-19 13:53:26'),
(225, 1, 'Orders View', 'Admin checked the Orders View Panel', '2021-06-19 13:55:28', '2021-06-19 13:55:28'),
(226, 1, 'Orders Export', 'Admin Exported the orders', '2021-06-19 13:55:31', '2021-06-19 13:55:31'),
(227, 1, 'Orders View', 'Admin checked the Orders View Panel', '2021-06-19 13:56:41', '2021-06-19 13:56:41'),
(228, 1, 'Orders Export', 'Admin Exported the orders', '2021-06-19 13:56:45', '2021-06-19 13:56:45'),
(229, 1, 'Orders View', 'Admin checked the Orders View Panel', '2021-06-19 13:57:17', '2021-06-19 13:57:17'),
(230, 1, 'Orders Export', 'Admin Exported the orders', '2021-06-19 13:57:22', '2021-06-19 13:57:22'),
(231, 1, 'Logs Report', 'Admin checked the logs View Panel', '2021-06-19 14:13:33', '2021-06-19 14:13:33'),
(232, 1, 'Cheque Leaf Waste Add', 'Admin created the cheque leaf waste | leaves 50 Bank name State Bank of India', '2021-06-19 14:19:55', '2021-06-19 14:19:55'),
(233, 1, 'Logs Report', 'Admin checked the logs View Panel', '2021-06-19 14:20:02', '2021-06-19 14:20:02'),
(234, 1, 'Toner Add', 'Admin created the toner from 19-06-2021 to 19-06-2021 remarks vijay quantity 56', '2021-06-19 14:20:29', '2021-06-19 14:20:29'),
(235, 1, 'Logs Report', 'Admin checked the logs View Panel', '2021-06-19 14:20:36', '2021-06-19 14:20:36'),
(236, 1, 'Cheque Leaf Waste Add', 'Admin created the cheque leaf waste | from 19-06-2021 To 19-06-2021 leaves 45 Bank name DIAMOND TRUST BANK', '2021-06-19 14:22:19', '2021-06-19 14:22:19'),
(237, 1, 'Logs Report', 'Admin checked the logs View Panel', '2021-06-19 14:22:24', '2021-06-19 14:22:24'),
(238, 1, 'Toners Export', 'Admin Exported the Toners', '2021-06-19 14:27:54', '2021-06-19 14:27:54'),
(239, 1, 'Logs Report', 'Admin checked the logs View Panel', '2021-06-19 14:29:14', '2021-06-19 14:29:14'),
(240, 1, 'Bank Details Import', 'Admin Imported Banks Details', '2021-06-21 11:15:31', '2021-06-21 11:15:31'),
(241, 1, 'Bank Details Import', 'Admin Imported Banks Details', '2021-06-21 11:17:37', '2021-06-21 11:17:37'),
(242, 1, 'Bank Details Checked', 'Admin checked the Banks View Panel', '2021-06-21 11:17:39', '2021-06-21 11:17:39'),
(243, 1, 'Orders View', 'Admin checked the Orders View Panel', '2021-06-21 11:19:17', '2021-06-21 11:19:17'),
(244, 1, 'Orders Export', 'Admin Exported the orders', '2021-06-21 11:19:22', '2021-06-21 11:19:22'),
(245, 1, 'Orders Update', 'Admin updated details of the OID/06/21/0004', '2021-06-21 11:19:57', '2021-06-21 11:19:57'),
(246, 1, 'Orders Export', 'Admin Exported the orders', '2021-06-21 11:20:00', '2021-06-21 11:20:00'),
(247, 1, 'Orders View', 'Admin checked the Orders View Panel', '2021-06-21 11:20:05', '2021-06-21 11:20:05'),
(248, 1, 'Toner Add', 'Admin created the toner from 21-06-2021 to 21-06-2021 remarks issued to sneha quantity 4', '2021-06-21 11:22:07', '2021-06-21 11:22:07'),
(249, 1, 'Logs Report', 'Admin checked the logs View Panel', '2021-06-21 11:22:13', '2021-06-21 11:22:13'),
(250, 1, 'Cheque Leaf Waste Add', 'Admin created the cheque leaf waste | from 20-06-2021 To 21-06-2021 leaves 70 Bank name EQUITY BANK', '2021-06-21 11:22:59', '2021-06-21 11:22:59'),
(251, 1, 'Logs Report', 'Admin checked the logs View Panel', '2021-06-21 11:23:12', '2021-06-21 11:23:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_level`
--
ALTER TABLE `access_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_types`
--
ALTER TABLE `account_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_row_details`
--
ALTER TABLE `bank_row_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cheque_leaf_waste`
--
ALTER TABLE `cheque_leaf_waste`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_row_details`
--
ALTER TABLE `customer_row_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_rows`
--
ALTER TABLE `order_rows`
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
-- Indexes for table `toner_details`
--
ALTER TABLE `toner_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_code`
--
ALTER TABLE `transaction_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `account_types`
--
ALTER TABLE `account_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bank_row_details`
--
ALTER TABLE `bank_row_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cheque_leaf_waste`
--
ALTER TABLE `cheque_leaf_waste`
  MODIFY `id` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_row_details`
--
ALTER TABLE `customer_row_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_rows`
--
ALTER TABLE `order_rows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `toner_details`
--
ALTER TABLE `toner_details`
  MODIFY `id` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transaction_code`
--
ALTER TABLE `transaction_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
