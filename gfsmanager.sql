-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 29, 2024 at 12:26 PM
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
-- Database: `gfsmanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

DROP TABLE IF EXISTS `activity_logs`;
CREATE TABLE IF NOT EXISTS `activity_logs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL DEFAULT '0',
  `project_id` int NOT NULL DEFAULT '0',
  `task_id` int NOT NULL DEFAULT '0',
  `deal_id` int NOT NULL DEFAULT '0',
  `log_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_payment_settings`
--

DROP TABLE IF EXISTS `admin_payment_settings`;
CREATE TABLE IF NOT EXISTS `admin_payment_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_payment_settings_name_created_by_unique` (`name`,`created_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `allowances`
--

DROP TABLE IF EXISTS `allowances`;
CREATE TABLE IF NOT EXISTS `allowances` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` int NOT NULL,
  `allowance_option` int NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `allowances`
--

INSERT INTO `allowances` (`id`, `employee_id`, `allowance_option`, `title`, `amount`, `type`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Fees', '100000.00', 'fixed', 1, '2024-07-10 10:10:00', '2024-07-10 10:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `allowance_options`
--

DROP TABLE IF EXISTS `allowance_options`;
CREATE TABLE IF NOT EXISTS `allowance_options` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `allowance_options`
--

INSERT INTO `allowance_options` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'School Fees', 1, '2024-07-06 07:38:10', '2024-07-06 07:38:10');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

DROP TABLE IF EXISTS `announcements`;
CREATE TABLE IF NOT EXISTS `announcements` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `branch_id` int NOT NULL DEFAULT '0',
  `department_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `start_date`, `end_date`, `branch_id`, `department_id`, `employee_id`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Maxime et beatae bla', '2024-01-22', '2020-05-19', 1, '[null]', '[null]', 'Exercitation incidid', 1, '2024-07-10 10:19:39', '2024-07-10 10:19:39'),
(2, 'Ea nostrum eu eiusmo', '1981-08-21', '1993-01-17', 0, '[null]', '[\"1\"]', 'Eum debitis ducimus', 1, '2024-07-10 10:20:02', '2024-07-10 10:20:02');

-- --------------------------------------------------------

--
-- Table structure for table `announcement_employees`
--

DROP TABLE IF EXISTS `announcement_employees`;
CREATE TABLE IF NOT EXISTS `announcement_employees` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `announcement_id` int NOT NULL,
  `employee_id` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcement_employees`
--

INSERT INTO `announcement_employees` (`id`, `announcement_id`, `employee_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, '2024-07-10 10:20:02', '2024-07-10 10:20:02');

-- --------------------------------------------------------

--
-- Table structure for table `appraisals`
--

DROP TABLE IF EXISTS `appraisals`;
CREATE TABLE IF NOT EXISTS `appraisals` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `branch` int NOT NULL DEFAULT '0',
  `employee` int NOT NULL DEFAULT '0',
  `rating` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appraisal_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_experience` int NOT NULL DEFAULT '0',
  `marketing` int NOT NULL DEFAULT '0',
  `administration` int NOT NULL DEFAULT '0',
  `professionalism` int NOT NULL DEFAULT '0',
  `integrity` int NOT NULL DEFAULT '0',
  `attendance` int NOT NULL DEFAULT '0',
  `remark` text COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appraisals`
--

INSERT INTO `appraisals` (`id`, `branch`, `employee`, `rating`, `appraisal_date`, `customer_experience`, `marketing`, `administration`, `professionalism`, `integrity`, `attendance`, `remark`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '{\"1\":\"3\"}', '2024-04', 0, 0, 0, 0, 0, 0, 'Quis ducimus autem', 1, '2024-07-10 10:15:56', '2024-07-10 10:15:56');

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

DROP TABLE IF EXISTS `assets`;
CREATE TABLE IF NOT EXISTS `assets` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` text COLLATE utf8mb4_unicode_ci,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_date` date NOT NULL,
  `supported_date` date NOT NULL,
  `amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `employee_id`, `name`, `purchase_date`, `supported_date`, `amount`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '3', 'Alana Harrison', '2023-12-26', '2013-01-03', '46.00', 'Nulla sed est aliqu', 1, '2024-07-10 10:21:34', '2024-07-10 10:21:34');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_employees`
--

DROP TABLE IF EXISTS `attendance_employees`;
CREATE TABLE IF NOT EXISTS `attendance_employees` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` int NOT NULL,
  `date` date NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clock_in` time NOT NULL,
  `clock_out` time NOT NULL,
  `late` time NOT NULL,
  `early_leaving` time NOT NULL,
  `overtime` time NOT NULL,
  `total_rest` time NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

DROP TABLE IF EXISTS `awards`;
CREATE TABLE IF NOT EXISTS `awards` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` int NOT NULL,
  `award_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `gift` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`id`, `employee_id`, `award_type`, `date`, `gift`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '1975-09-01', 'Qui aut beatae velit', 'Aut voluptatem minu', 1, '2024-07-10 10:18:01', '2024-07-10 10:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `award_types`
--

DROP TABLE IF EXISTS `award_types`;
CREATE TABLE IF NOT EXISTS `award_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `award_types`
--

INSERT INTO `award_types` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Dominic Baldwin', 1, '2024-07-10 10:13:20', '2024-07-10 10:13:20');

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

DROP TABLE IF EXISTS `bank_accounts`;
CREATE TABLE IF NOT EXISTS `bank_accounts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `holder_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chart_account_id` int NOT NULL DEFAULT '0',
  `opening_balance` double(15,2) NOT NULL DEFAULT '0.00',
  `contact_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_transfers`
--

DROP TABLE IF EXISTS `bank_transfers`;
CREATE TABLE IF NOT EXISTS `bank_transfers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `from_account` int NOT NULL DEFAULT '0',
  `to_account` int NOT NULL DEFAULT '0',
  `amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `date` date NOT NULL,
  `payment_method` int NOT NULL DEFAULT '0',
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

DROP TABLE IF EXISTS `bills`;
CREATE TABLE IF NOT EXISTS `bills` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `bill_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `vender_id` int NOT NULL,
  `bill_date` date NOT NULL,
  `due_date` date NOT NULL,
  `order_number` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '0',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_display` int NOT NULL DEFAULT '1',
  `send_date` date DEFAULT NULL,
  `discount_apply` int NOT NULL DEFAULT '0',
  `category_id` int NOT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bill_accounts`
--

DROP TABLE IF EXISTS `bill_accounts`;
CREATE TABLE IF NOT EXISTS `bill_accounts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `chart_account_id` int NOT NULL DEFAULT '0',
  `price` decimal(15,2) NOT NULL DEFAULT '0.00',
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_id` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bill_payments`
--

DROP TABLE IF EXISTS `bill_payments`;
CREATE TABLE IF NOT EXISTS `bill_payments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `bill_id` int NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(16,2) NOT NULL DEFAULT '0.00',
  `account_id` int NOT NULL,
  `payment_method` int NOT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `add_receipt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bill_products`
--

DROP TABLE IF EXISTS `bill_products`;
CREATE TABLE IF NOT EXISTS `bill_products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `bill_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` double(25,2) NOT NULL DEFAULT '0.00',
  `tax` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` double(8,2) NOT NULL DEFAULT '0.00',
  `price` decimal(16,2) NOT NULL DEFAULT '0.00',
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
CREATE TABLE IF NOT EXISTS `branches` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Nero Key', 1, '2024-07-05 09:02:11', '2024-07-05 09:02:11');

-- --------------------------------------------------------

--
-- Table structure for table `budgets`
--

DROP TABLE IF EXISTS `budgets`;
CREATE TABLE IF NOT EXISTS `budgets` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `period` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income_data` text COLLATE utf8mb4_unicode_ci,
  `expense_data` text COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bugs`
--

DROP TABLE IF EXISTS `bugs`;
CREATE TABLE IF NOT EXISTS `bugs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `bug_id` int NOT NULL DEFAULT '0',
  `project_id` int NOT NULL DEFAULT '0',
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `assign_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bug_comments`
--

DROP TABLE IF EXISTS `bug_comments`;
CREATE TABLE IF NOT EXISTS `bug_comments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bug_id` int NOT NULL DEFAULT '0',
  `user_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bug_files`
--

DROP TABLE IF EXISTS `bug_files`;
CREATE TABLE IF NOT EXISTS `bug_files` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bug_id` int NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bug_statuses`
--

DROP TABLE IF EXISTS `bug_statuses`;
CREATE TABLE IF NOT EXISTS `bug_statuses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chart_of_accounts`
--

DROP TABLE IF EXISTS `chart_of_accounts`;
CREATE TABLE IF NOT EXISTS `chart_of_accounts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` int NOT NULL DEFAULT '0',
  `type` int NOT NULL DEFAULT '0',
  `sub_type` int NOT NULL DEFAULT '0',
  `parent` int NOT NULL DEFAULT '0',
  `is_enabled` int NOT NULL DEFAULT '1',
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chart_of_account_parents`
--

DROP TABLE IF EXISTS `chart_of_account_parents`;
CREATE TABLE IF NOT EXISTS `chart_of_account_parents` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_type` int NOT NULL DEFAULT '0',
  `type` int NOT NULL DEFAULT '0',
  `account` int NOT NULL DEFAULT '0',
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chart_of_account_sub_types`
--

DROP TABLE IF EXISTS `chart_of_account_sub_types`;
CREATE TABLE IF NOT EXISTS `chart_of_account_sub_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `type` int NOT NULL DEFAULT '0',
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chart_of_account_types`
--

DROP TABLE IF EXISTS `chart_of_account_types`;
CREATE TABLE IF NOT EXISTS `chart_of_account_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ch_favorites`
--

DROP TABLE IF EXISTS `ch_favorites`;
CREATE TABLE IF NOT EXISTS `ch_favorites` (
  `id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `favorite_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ch_messages`
--

DROP TABLE IF EXISTS `ch_messages`;
CREATE TABLE IF NOT EXISTS `ch_messages` (
  `id` bigint NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` bigint NOT NULL,
  `to_id` bigint NOT NULL,
  `body` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_deals`
--

DROP TABLE IF EXISTS `client_deals`;
CREATE TABLE IF NOT EXISTS `client_deals` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` bigint UNSIGNED NOT NULL,
  `deal_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `client_deals_client_id_foreign` (`client_id`),
  KEY `client_deals_deal_id_foreign` (`deal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commissions`
--

DROP TABLE IF EXISTS `commissions`;
CREATE TABLE IF NOT EXISTS `commissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` int NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_payment_settings`
--

DROP TABLE IF EXISTS `company_payment_settings`;
CREATE TABLE IF NOT EXISTS `company_payment_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `company_payment_settings_name_created_by_unique` (`name`,`created_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_policies`
--

DROP TABLE IF EXISTS `company_policies`;
CREATE TABLE IF NOT EXISTS `company_policies` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `branch` int NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_policies`
--

INSERT INTO `company_policies` (`id`, `branch`, `title`, `description`, `attachment`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Amet mollit consequ', 'Id atque a quaerat v', '', 1, '2024-07-10 10:22:16', '2024-07-10 10:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `competencies`
--

DROP TABLE IF EXISTS `competencies`;
CREATE TABLE IF NOT EXISTS `competencies` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `competencies`
--

INSERT INTO `competencies` (`id`, `name`, `type`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Freya Merritt', '1', '1', '2024-07-10 10:14:18', '2024-07-10 10:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

DROP TABLE IF EXISTS `complaints`;
CREATE TABLE IF NOT EXISTS `complaints` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `complaint_from` int NOT NULL,
  `complaint_against` int NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complaint_date` date NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `complaint_from`, `complaint_against`, `title`, `complaint_date`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Eos amet officiis', '1972-09-12', 'Anim voluptas quaera', '1', '2024-07-10 10:19:01', '2024-07-10 10:19:01');

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

DROP TABLE IF EXISTS `contracts`;
CREATE TABLE IF NOT EXISTS `contracts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_name` int NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_description` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `client_signature` longtext COLLATE utf8mb4_unicode_ci,
  `company_signature` longtext COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contract_attachment`
--

DROP TABLE IF EXISTS `contract_attachment`;
CREATE TABLE IF NOT EXISTS `contract_attachment` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `contract_id` int NOT NULL DEFAULT '0',
  `user_id` int NOT NULL DEFAULT '0',
  `files` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contract_comment`
--

DROP TABLE IF EXISTS `contract_comment`;
CREATE TABLE IF NOT EXISTS `contract_comment` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `contract_id` int NOT NULL DEFAULT '0',
  `user_id` int NOT NULL DEFAULT '0',
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contract_notes`
--

DROP TABLE IF EXISTS `contract_notes`;
CREATE TABLE IF NOT EXISTS `contract_notes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `contract_id` int NOT NULL DEFAULT '0',
  `user_id` int NOT NULL DEFAULT '0',
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contract_types`
--

DROP TABLE IF EXISTS `contract_types`;
CREATE TABLE IF NOT EXISTS `contract_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contract_types`
--

INSERT INTO `contract_types` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Freelance Contract', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `credit_notes`
--

DROP TABLE IF EXISTS `credit_notes`;
CREATE TABLE IF NOT EXISTS `credit_notes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice` int NOT NULL DEFAULT '0',
  `customer` int NOT NULL DEFAULT '0',
  `amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_by` int NOT NULL DEFAULT '0',
  `is_active` int NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `billing_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_zip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address` text COLLATE utf8mb4_unicode_ci,
  `shipping_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_zip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `balance` double(8,2) NOT NULL DEFAULT '0.00',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_id`, `name`, `email`, `tax_number`, `contact`, `avatar`, `created_by`, `is_active`, `email_verified_at`, `billing_name`, `billing_country`, `billing_state`, `billing_city`, `billing_phone`, `billing_zip`, `billing_address`, `shipping_name`, `shipping_country`, `shipping_state`, `shipping_city`, `shipping_phone`, `shipping_zip`, `shipping_address`, `lang`, `balance`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ifeoma Hodge', 'bahunub@mailinator.com', '380', '2', '', 1, 1, NULL, 'Brenna Hurst', 'Soluta aliquam elit', 'Harum sit officia e', 'Quod et voluptate in', '+1 (906) 316-6573', '52259', 'Labore nihil dolorem', 'Beverly Solis', 'Est molestiae suscip', 'Laudantium tenetur', 'Nam eos obcaecati c', '+1 (185) 197-6482', '89526', 'Sed maiores nobis al', '', 0.00, NULL, '2024-07-10 10:27:20', '2024-07-10 10:27:20');

-- --------------------------------------------------------

--
-- Table structure for table `custom_fields`
--

DROP TABLE IF EXISTS `custom_fields`;
CREATE TABLE IF NOT EXISTS `custom_fields` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_fields`
--

INSERT INTO `custom_fields` (`id`, `name`, `type`, `module`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Kelly Prince', 'email', 'customer', 1, '2024-07-10 10:29:37', '2024-07-10 10:29:37');

-- --------------------------------------------------------

--
-- Table structure for table `custom_field_values`
--

DROP TABLE IF EXISTS `custom_field_values`;
CREATE TABLE IF NOT EXISTS `custom_field_values` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `record_id` bigint UNSIGNED NOT NULL,
  `field_id` bigint UNSIGNED NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `custom_field_values_record_id_field_id_unique` (`record_id`,`field_id`),
  KEY `custom_field_values_field_id_foreign` (`field_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `custom_questions`
--

DROP TABLE IF EXISTS `custom_questions`;
CREATE TABLE IF NOT EXISTS `custom_questions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_required` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

DROP TABLE IF EXISTS `deals`;
CREATE TABLE IF NOT EXISTS `deals` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(15,2) DEFAULT '0.00',
  `pipeline_id` int NOT NULL,
  `stage_id` int NOT NULL,
  `sources` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `products` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `labels` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `created_by` int NOT NULL,
  `is_active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deal_calls`
--

DROP TABLE IF EXISTS `deal_calls`;
CREATE TABLE IF NOT EXISTS `deal_calls` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `deal_id` bigint UNSIGNED NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `call_type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `call_result` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `deal_calls_deal_id_foreign` (`deal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deal_discussions`
--

DROP TABLE IF EXISTS `deal_discussions`;
CREATE TABLE IF NOT EXISTS `deal_discussions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `deal_id` bigint UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `deal_discussions_deal_id_foreign` (`deal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deal_emails`
--

DROP TABLE IF EXISTS `deal_emails`;
CREATE TABLE IF NOT EXISTS `deal_emails` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `deal_id` bigint UNSIGNED NOT NULL,
  `to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `deal_emails_deal_id_foreign` (`deal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deal_files`
--

DROP TABLE IF EXISTS `deal_files`;
CREATE TABLE IF NOT EXISTS `deal_files` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `deal_id` bigint UNSIGNED NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `deal_files_deal_id_foreign` (`deal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deal_tasks`
--

DROP TABLE IF EXISTS `deal_tasks`;
CREATE TABLE IF NOT EXISTS `deal_tasks` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `deal_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `priority` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `deal_tasks_deal_id_foreign` (`deal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `debit_notes`
--

DROP TABLE IF EXISTS `debit_notes`;
CREATE TABLE IF NOT EXISTS `debit_notes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `bill` int NOT NULL DEFAULT '0',
  `vendor` int NOT NULL DEFAULT '0',
  `amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deduction_options`
--

DROP TABLE IF EXISTS `deduction_options`;
CREATE TABLE IF NOT EXISTS `deduction_options` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deduction_options`
--

INSERT INTO `deduction_options` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Amela Norton', 1, '2024-07-10 10:12:48', '2024-07-10 10:12:48');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `branch_id` int NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `branch_id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cadman Schneider', 1, '2024-07-05 09:02:42', '2024-07-05 09:02:42');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

DROP TABLE IF EXISTS `designations`;
CREATE TABLE IF NOT EXISTS `designations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `department_id` int NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `department_id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nathaniel Woods', 1, '2024-07-05 09:03:00', '2024-07-05 09:03:00');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

DROP TABLE IF EXISTS `devices`;
CREATE TABLE IF NOT EXISTS `devices` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `device_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `authorized` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `user_id`, `device_type`, `user_agent`, `authorized`, `created_at`, `updated_at`) VALUES
(1, 1, 'Desktop', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 1, '2024-07-01 11:37:16', '2024-07-01 11:42:59');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE IF NOT EXISTS `documents` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_required` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `name`, `is_required`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Kylee Bowers', '0', 1, '2024-07-10 10:12:10', '2024-07-10 10:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `ducument_uploads`
--

DROP TABLE IF EXISTS `ducument_uploads`;
CREATE TABLE IF NOT EXISTS `ducument_uploads` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ducument_uploads`
--

INSERT INTO `ducument_uploads` (`id`, `name`, `role`, `document`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Nerea Rivera', '5', '1721129104_tracking-bg2.png', 'Eum dolorem voluptat', 1, '2024-07-16 10:25:04', '2024-07-16 10:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

DROP TABLE IF EXISTS `email_templates`;
CREATE TABLE IF NOT EXISTS `email_templates` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_template_langs`
--

DROP TABLE IF EXISTS `email_template_langs`;
CREATE TABLE IF NOT EXISTS `email_template_langs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int NOT NULL,
  `lang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `branch_id` int NOT NULL DEFAULT '0',
  `department_id` int NOT NULL DEFAULT '0',
  `designation_id` int NOT NULL DEFAULT '0',
  `company_doj` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documents` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_holder_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_identifier_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_payer_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account` int DEFAULT NULL,
  `salary_type` int DEFAULT NULL,
  `salary` int DEFAULT NULL,
  `is_active` int NOT NULL DEFAULT '1',
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `user_id`, `name`, `dob`, `gender`, `phone`, `address`, `email`, `password`, `employee_id`, `branch_id`, `department_id`, `designation_id`, `company_doj`, `documents`, `account_holder_name`, `account_number`, `bank_name`, `bank_identifier_code`, `branch_location`, `tax_payer_id`, `account`, `salary_type`, `salary`, `is_active`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 3, 'Pearl Perry', '2017-01-10', 'Male', '+1 (507) 285-6753', 'Ab magna et distinct', 'wuse@mailinator.com', '$2y$10$va/8ud637MyoVXbzIdj6MuUQLY1rxtGWuxvCMNcDnIvP19gI6LsIW', '1', 1, 1, 1, '2001-01-15', NULL, 'Ava Wiley', '369', 'Giselle Spence', 'Qui perspiciatis as', 'Quis facere Nam culp', 'Debitis rem dolore a', NULL, NULL, NULL, 1, 1, '2024-07-05 09:08:46', '2024-07-05 09:08:46');

-- --------------------------------------------------------

--
-- Table structure for table `employee_contracts`
--

DROP TABLE IF EXISTS `employee_contracts`;
CREATE TABLE IF NOT EXISTS `employee_contracts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` int NOT NULL,
  `contract_type_id` int NOT NULL,
  `template_id` int DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_value` int DEFAULT NULL,
  `contract_description` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_signature` longtext COLLATE utf8mb4_unicode_ci,
  `company_signature` longtext COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_contracts`
--

INSERT INTO `employee_contracts` (`id`, `employee_id`, `contract_type_id`, `template_id`, `start_date`, `end_date`, `description`, `contract_value`, `contract_description`, `status`, `file`, `client_signature`, `company_signature`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 3, '1978-05-18', '1982-09-20', '<p>Aut quidem labore do.ssvdv</p><ul><li>boolean</li><li>yess</li></ul>', 200000, NULL, 'suspended', NULL, NULL, NULL, 1, '2024-07-08 11:50:44', '2024-07-09 08:36:57'),
(3, 1, 1, NULL, '1974-03-12', '1979-08-22', 'Pariatur. Tempor imp.', 1100000, NULL, 'accept', NULL, NULL, NULL, 1, '2024-07-09 08:52:57', '2024-07-09 08:52:57'),
(4, 1, 1, 1, '2022-05-02', '1973-02-06', 'Quam natus corporis .', 170000, NULL, 'pending', 'C:\\wamp64\\www\\VTC\\gfsmanager\\storage\\uploads/employee-contracts/Rapport journalier WAMBA HERMANN 08-07-2024.docx', NULL, NULL, 1, '2024-07-09 13:01:22', '2024-07-09 13:01:22');

-- --------------------------------------------------------

--
-- Table structure for table `employee_contract_templates`
--

DROP TABLE IF EXISTS `employee_contract_templates`;
CREATE TABLE IF NOT EXISTS `employee_contract_templates` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_contract_templates`
--

INSERT INTO `employee_contract_templates` (`id`, `name`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Freelance contract template', '', NULL, NULL),
(3, 'Abigail Robertson', 'Aut quidem labore do.ssvdv', '2024-07-08 15:18:34', '2024-07-08 15:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `employee_documents`
--

DROP TABLE IF EXISTS `employee_documents`;
CREATE TABLE IF NOT EXISTS `employee_documents` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` int NOT NULL,
  `document_id` int NOT NULL,
  `document_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employee_document_type_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_documents`
--

INSERT INTO `employee_documents` (`id`, `employee_id`, `document_id`, `document_value`, `created_by`, `created_at`, `updated_at`, `employee_document_type_id`) VALUES
(1, 1, 1, 'Debriefing_du_40_Juillet_2024_1720175294.docx', 1, '2024-07-05 09:28:14', '2024-07-05 09:40:19', 2),
(2, 1, 1, 'VTC2024 EMPLOYEE EVALUATION FORMs_1720177685.docx', 1, '2024-07-05 10:08:05', '2024-07-05 10:08:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee_document_types`
--

DROP TABLE IF EXISTS `employee_document_types`;
CREATE TABLE IF NOT EXISTS `employee_document_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employee_document_types_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_document_types`
--

INSERT INTO `employee_document_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Motivation Letter', '2024-07-05 09:17:27', '2024-07-05 09:17:27'),
(2, 'Curriculum VItaee', '2024-07-05 09:18:39', '2024-07-05 09:21:30');

-- --------------------------------------------------------

--
-- Table structure for table `estimations`
--

DROP TABLE IF EXISTS `estimations`;
CREATE TABLE IF NOT EXISTS `estimations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `estimation_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_date` date NOT NULL,
  `discount` double(8,2) NOT NULL,
  `tax_id` bigint UNSIGNED NOT NULL,
  `terms` text COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `branch_id` int NOT NULL,
  `department_id` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `branch_id`, `department_id`, `employee_id`, `title`, `start_date`, `end_date`, `color`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, '[\"0\"]', '[\"1\"]', 'Incididunt sint tem', '2004-12-04', '1981-06-04', 'event-danger', 'Commodo repellendus', 1, '2024-07-10 10:20:51', '2024-07-10 10:20:51');

-- --------------------------------------------------------

--
-- Table structure for table `event_employees`
--

DROP TABLE IF EXISTS `event_employees`;
CREATE TABLE IF NOT EXISTS `event_employees` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `event_id` int NOT NULL,
  `employee_id` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_employees`
--

INSERT INTO `event_employees` (`id`, `event_id`, `employee_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2024-07-10 10:20:51', '2024-07-10 10:20:51');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
CREATE TABLE IF NOT EXISTS `expenses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(16,2) NOT NULL DEFAULT '0.00',
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_id` int NOT NULL DEFAULT '0',
  `task_id` int NOT NULL DEFAULT '0',
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `experience_certificates`
--

DROP TABLE IF EXISTS `experience_certificates`;
CREATE TABLE IF NOT EXISTS `experience_certificates` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form_builders`
--

DROP TABLE IF EXISTS `form_builders`;
CREATE TABLE IF NOT EXISTS `form_builders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int NOT NULL DEFAULT '1',
  `is_lead_active` int NOT NULL DEFAULT '0',
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `form_builders_code_unique` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form_fields`
--

DROP TABLE IF EXISTS `form_fields`;
CREATE TABLE IF NOT EXISTS `form_fields` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `form_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form_field_responses`
--

DROP TABLE IF EXISTS `form_field_responses`;
CREATE TABLE IF NOT EXISTS `form_field_responses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `form_id` bigint UNSIGNED NOT NULL,
  `subject_id` int NOT NULL,
  `name_id` int NOT NULL,
  `email_id` int NOT NULL,
  `user_id` int NOT NULL,
  `pipeline_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form_responses`
--

DROP TABLE IF EXISTS `form_responses`;
CREATE TABLE IF NOT EXISTS `form_responses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `form_id` bigint UNSIGNED NOT NULL,
  `response` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `generate_offer_letters`
--

DROP TABLE IF EXISTS `generate_offer_letters`;
CREATE TABLE IF NOT EXISTS `generate_offer_letters` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `lang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genrate_payslip_options`
--

DROP TABLE IF EXISTS `genrate_payslip_options`;
CREATE TABLE IF NOT EXISTS `genrate_payslip_options` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

DROP TABLE IF EXISTS `goals`;
CREATE TABLE IF NOT EXISTS `goals` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `is_display` int NOT NULL DEFAULT '1',
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `goal_trackings`
--

DROP TABLE IF EXISTS `goal_trackings`;
CREATE TABLE IF NOT EXISTS `goal_trackings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `branch` int NOT NULL,
  `goal_type` int NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_achievement` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` int NOT NULL DEFAULT '0',
  `progress` int NOT NULL DEFAULT '0',
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `goal_trackings`
--

INSERT INTO `goal_trackings` (`id`, `branch`, `goal_type`, `start_date`, `end_date`, `subject`, `rating`, `target_achievement`, `description`, `status`, `progress`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1971-02-24', '1993-03-27', 'Magni ut dicta quis', NULL, 'Quam repudiandae cup', 'Dolorem natus quis o', 0, 0, 1, '2024-07-10 10:16:17', '2024-07-10 10:16:17');

-- --------------------------------------------------------

--
-- Table structure for table `goal_types`
--

DROP TABLE IF EXISTS `goal_types`;
CREATE TABLE IF NOT EXISTS `goal_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `goal_types`
--

INSERT INTO `goal_types` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Perry Barrera', 1, '2024-07-10 10:12:59', '2024-07-10 10:12:59');

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

DROP TABLE IF EXISTS `holidays`;
CREATE TABLE IF NOT EXISTS `holidays` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `end_date` date NOT NULL,
  `occasion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `date`, `end_date`, `occasion`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '1996-12-04', '1991-04-02', 'Rerum dolor fugit e', 1, '2024-07-10 10:20:14', '2024-07-10 10:20:14');

-- --------------------------------------------------------

--
-- Table structure for table `indicators`
--

DROP TABLE IF EXISTS `indicators`;
CREATE TABLE IF NOT EXISTS `indicators` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `branch` int NOT NULL DEFAULT '0',
  `department` int NOT NULL DEFAULT '0',
  `designation` int NOT NULL DEFAULT '0',
  `rating` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_experience` int NOT NULL DEFAULT '0',
  `marketing` int NOT NULL DEFAULT '0',
  `administration` int NOT NULL DEFAULT '0',
  `professionalism` int NOT NULL DEFAULT '0',
  `integrity` int NOT NULL DEFAULT '0',
  `attendance` int NOT NULL DEFAULT '0',
  `created_user` int NOT NULL DEFAULT '0',
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `indicators`
--

INSERT INTO `indicators` (`id`, `branch`, `department`, `designation`, `rating`, `customer_experience`, `marketing`, `administration`, `professionalism`, `integrity`, `attendance`, `created_user`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '{\"1\":\"3\"}', 0, 0, 0, 0, 0, 0, 1, 1, '2024-07-10 10:15:22', '2024-07-10 10:15:22');

-- --------------------------------------------------------

--
-- Table structure for table `interview_schedules`
--

DROP TABLE IF EXISTS `interview_schedules`;
CREATE TABLE IF NOT EXISTS `interview_schedules` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `candidate` int NOT NULL,
  `employee` int NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `time` time NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `employee_response` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE IF NOT EXISTS `invoices` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice_id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `issue_date` date NOT NULL,
  `due_date` date NOT NULL,
  `send_date` date DEFAULT NULL,
  `category_id` int NOT NULL,
  `ref_number` text COLLATE utf8mb4_unicode_ci,
  `status` int NOT NULL DEFAULT '0',
  `shipping_display` int NOT NULL DEFAULT '1',
  `discount_apply` int NOT NULL DEFAULT '0',
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_bank_transfers`
--

DROP TABLE IF EXISTS `invoice_bank_transfers`;
CREATE TABLE IF NOT EXISTS `invoice_bank_transfers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice_id` int NOT NULL,
  `order_id` int NOT NULL,
  `amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `receipt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_payments`
--

DROP TABLE IF EXISTS `invoice_payments`;
CREATE TABLE IF NOT EXISTS `invoice_payments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice_id` int NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(16,2) NOT NULL DEFAULT '0.00',
  `account_id` int NOT NULL DEFAULT '0',
  `payment_method` int NOT NULL DEFAULT '0',
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `txn_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Manually',
  `receipt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `add_receipt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_products`
--

DROP TABLE IF EXISTS `invoice_products`;
CREATE TABLE IF NOT EXISTS `invoice_products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` double(25,2) NOT NULL DEFAULT '0.00',
  `tax` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` double(8,2) NOT NULL DEFAULT '0.00',
  `price` decimal(16,2) NOT NULL DEFAULT '0.00',
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ip_restricts`
--

DROP TABLE IF EXISTS `ip_restricts`;
CREATE TABLE IF NOT EXISTS `ip_restricts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `requirement` text COLLATE utf8mb4_unicode_ci,
  `branch` int NOT NULL DEFAULT '0',
  `category` int NOT NULL DEFAULT '0',
  `skill` text COLLATE utf8mb4_unicode_ci,
  `position` int DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visibility` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_question` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

DROP TABLE IF EXISTS `job_applications`;
CREATE TABLE IF NOT EXISTS `job_applications` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `job` int NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_letter` text COLLATE utf8mb4_unicode_ci,
  `dob` date DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stage` int NOT NULL DEFAULT '1',
  `order` int NOT NULL DEFAULT '0',
  `skill` text COLLATE utf8mb4_unicode_ci,
  `rating` int NOT NULL DEFAULT '0',
  `is_archive` int NOT NULL DEFAULT '0',
  `custom_question` text COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_application_notes`
--

DROP TABLE IF EXISTS `job_application_notes`;
CREATE TABLE IF NOT EXISTS `job_application_notes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `application_id` int NOT NULL DEFAULT '0',
  `note_created` int NOT NULL DEFAULT '0',
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

DROP TABLE IF EXISTS `job_categories`;
CREATE TABLE IF NOT EXISTS `job_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_categories`
--

INSERT INTO `job_categories` (`id`, `title`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Sit voluptate et et', 1, '2024-07-10 10:13:42', '2024-07-10 10:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `job_on_boards`
--

DROP TABLE IF EXISTS `job_on_boards`;
CREATE TABLE IF NOT EXISTS `job_on_boards` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `application` int NOT NULL,
  `joining_date` date DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `convert_to_employee` int NOT NULL DEFAULT '0',
  `job_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `days_of_week` int DEFAULT NULL,
  `salary` int DEFAULT NULL,
  `salary_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_stages`
--

DROP TABLE IF EXISTS `job_stages`;
CREATE TABLE IF NOT EXISTS `job_stages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '0',
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_stages`
--

INSERT INTO `job_stages` (`id`, `title`, `order`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Sunt inventore qui l', 0, 1, '2024-07-10 10:13:54', '2024-07-10 10:13:54');

-- --------------------------------------------------------

--
-- Table structure for table `joining_letters`
--

DROP TABLE IF EXISTS `joining_letters`;
CREATE TABLE IF NOT EXISTS `joining_letters` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `lang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `join_us`
--

DROP TABLE IF EXISTS `join_us`;
CREATE TABLE IF NOT EXISTS `join_us` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `join_us_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `journal_entries`
--

DROP TABLE IF EXISTS `journal_entries`;
CREATE TABLE IF NOT EXISTS `journal_entries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `journal_id` int NOT NULL DEFAULT '0',
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `journal_items`
--

DROP TABLE IF EXISTS `journal_items`;
CREATE TABLE IF NOT EXISTS `journal_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `journal` int NOT NULL DEFAULT '0',
  `account` int NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci,
  `debit` double(15,2) NOT NULL DEFAULT '0.00',
  `credit` double(15,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `labels`
--

DROP TABLE IF EXISTS `labels`;
CREATE TABLE IF NOT EXISTS `labels` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pipeline_id` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `landing_page_settings`
--

DROP TABLE IF EXISTS `landing_page_settings`;
CREATE TABLE IF NOT EXISTS `landing_page_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `landing_page_settings_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `landing_page_settings`
--

INSERT INTO `landing_page_settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'topbar_status', 'on', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(2, 'topbar_notification_msg', '70% Special Offer. Don’t Miss it. The offer ends in 72 hours.', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(3, 'menubar_status', 'on', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(4, 'menubar_page', '[{\"menubar_page_name\": \"About Us\",\"template_name\": \"page_content\",\"page_url\": \"\",\"menubar_page_contant\": \"Welcome to the Erpgo website. By accessing this website, you agree to comply with and be bound by the following terms and conditions of use. If you disagree with any part of these terms, please do not use our website. The content of the pages of this website is for your general information and use only. It is subject to change without notice. This website uses cookies to monitor browsing preferences. If you do allow cookies to be used, personal information may be stored by us for use by third parties. Neither we nor any third parties provide any warranty or guarantee as to the accuracy, timeliness, performance, completeness, or suitability of the information and materials found or offered on this website for any particular purpose. You acknowledge that such information and materials may contain inaccuracies or errors, and we expressly exclude liability for any such inaccuracies or errors to the fullest extent permitted by law. Your use of any information or materials on this website is entirely at your own risk, for which we shall not be liable. It shall be your own responsibility to ensure that any products, services, or information available through this website meet your specific requirements. This website contains material that is owned by or licensed to us. This material includes, but is not limited to, the design, layout, look, appearance, and graphics. Reproduction is prohibited other than in accordance with the copyright notice, which forms part of these terms and conditions. Unauthorized use of this website may give rise to a claim for damages and\\/or be a criminal offense. From time to time, this website may also include links to other websites. These links are provided for your convenience to provide further information. They do not signify that we endorse the website(s). We have no responsibility for the content of the linked website(s\",\"page_slug\": \"about_us\",\"header\": \"on\",\"footer\": \"on\",\"login\": \"on\"},{\"menubar_page_name\": \"Terms and Conditions\",\"template_name\": \"page_content\",\"page_url\": \"\",\"menubar_page_contant\": \"Welcome to the Erpgo website. By accessing this website, you agree to comply with and be bound by the following terms and conditions of use. If you disagree with any part of these terms, please do not use our website.\\r\\n\\r\\nThe content of the pages of this website is for your general information and use only. It is subject to change without notice.\\r\\n\\r\\nThis website uses cookies to monitor browsing preferences. If you do allow cookies to be used, personal information may be stored by us for use by third parties.\\r\\n\\r\\nNeither we nor any third parties provide any warranty or guarantee as to the accuracy, timeliness, performance, completeness, or suitability of the information and materials found or offered on this website for any particular purpose. You acknowledge that such information and materials may contain inaccuracies or errors, and we expressly exclude liability for any such inaccuracies or errors to the fullest extent permitted by law.\\r\\n\\r\\nYour use of any information or materials on this website is entirely at your own risk, for which we shall not be liable. It shall be your own responsibility to ensure that any products, services, or information available through this website meet your specific requirements.\\r\\n\\r\\nThis website contains material that is owned by or licensed to us. This material includes, but is not limited to, the design, layout, look, appearance, and graphics. Reproduction is prohibited other than in accordance with the copyright notice, which forms part of these terms and conditions.\\r\\n\\r\\nUnauthorized use of this website may give rise to a claim for damages and\\/or be a criminal offense.\\r\\n\\r\\nFrom time to time, this website may also include links to other websites. These links are provided for your convenience to provide further information. They do not signify that we endorse the website(s). We have no responsibility for the content of the linked website(s).\",\"page_slug\": \"terms_and_conditions\",\"header\": \"off\",\"footer\": \"on\",\"login\": \"on\"},{\"menubar_page_name\": \"Privacy Policy\",\"template_name\": \"page_content\",\"page_url\": \"\",\"menubar_page_contant\": \"Introduction: An overview of the privacy policy, including the purpose and scope of the policy. Information Collection: Details about the types of information collected from users\\/customers, such as personal information (name, address, email), device information, usage data, and any other relevant data. Data Usage: An explanation of how the collected data will be used, including providing services, improving products, personalization, analytics, and any other legitimate business purposes. Data Sharing: Information about whether and how the company shares user data with third parties, such as partners, service providers, or affiliates, along with the purposes of such sharing. Data Security: Details about the measures taken to protect user data from unauthorized access, loss, or misuse, including encryption, secure protocols, access controls, and data breach notification procedures. User Choices: Information on the choices available to users regarding the collection, use, and sharing of their personal data, including opt-out mechanisms and account settings. Cookies and Tracking Technologies: Explanation of the use of cookies, web beacons, and similar technologies for tracking user activity and collecting information for analytics and advertising purposes. Third-Party Links: Clarification that the companys website or services may contain links to third-party websites or services and that the privacy policy does not extend to those external sites. Data Retention: Details about the retention period for user data and how long it will be stored by the company. Legal Basis and Compliance: Information about the legal basis for processing personal data, compliance with applicable data protection laws, and the rights of users under relevant privacy regulations (e.g., GDPR, CCPA). Updates to the Privacy Policy: Notification that the privacy policy may be updated from time to time, and how users will be informed of any material changes. Contact Information: How users can contact the company regarding privacy-related concerns or inquiries.\",\"page_slug\": \"privacy_policy\",\"header\": \"off\",\"footer\": \"on\",\"login\": \"on\"}]', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(5, 'site_logo', 'site_logo.png', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(6, 'site_description', 'We build modern web tools to help you jump-start your daily business work.', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(7, 'home_status', 'on', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(8, 'home_offer_text', '70% Special Offer', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(9, 'home_title', 'Home', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(10, 'home_heading', 'ERPGo All In One Business ERP With Project, Account, HRM, CRM & POS', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(11, 'home_description', 'Use these awesome forms to login or create new account in your project for free.', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(12, 'home_trusted_by', '1000+ Customer', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(13, 'home_live_demo_link', 'https://demo.rajodiya.com/erpgo/login', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(14, 'home_buy_now_link', 'https://codecanyon.net/item/erpgo-all-in-one-business-erp-with-project-account-hrm-crm-pos/33263435', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(15, 'home_banner', 'home_banner.png', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(16, 'home_logo', 'home_logo.png,home_logo.png,home_logo.png,home_logo.png,home_logo.png,home_logo.png,home_logo.png', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(17, 'feature_status', 'on', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(18, 'feature_title', 'Features', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(19, 'feature_heading', 'All In One Place CRM System', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(20, 'feature_description', 'Use these awesome forms to login or create new account in your project for free. Use these awesome forms to login or create new account in your project for free.', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(21, 'feature_buy_now_link', 'https://codecanyon.net/item/erpgo-all-in-one-business-erp-with-project-account-hrm-crm-pos/33263435', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(22, 'feature_of_features', '[{\"feature_logo\":\"1688108756-feature_logo.png\",\"feature_heading\":\"Feature\",\"feature_description\":\"<p>Use these awesome forms to login or create new account in your project for free.Use these awesome forms to login or create new account in your project for free.<\\/p>\"},{\"feature_logo\":\"1688099120-feature_logo.png\",\"feature_heading\":\"Support\",\"feature_description\":\"<p>Use these awesome forms to login or create new account in your project for free.Use these awesome forms to login or create new account in your project for free.<\\/p>\"},{\"feature_logo\":\"1688099197-feature_logo.png\",\"feature_heading\":\"Integration\",\"feature_description\":\"<p>Use these awesome forms to login or create new account in your project for free.Use these awesome forms to login or create new account in your project for free.<\\/p>\"}]', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(23, 'highlight_feature_heading', 'ERPGo All In One Business ERP With Project, Account, HRM, CRM & POS', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(24, 'highlight_feature_description', 'Use these awesome forms to login or create new account in your project for free.', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(25, 'highlight_feature_image', 'highlight_feature_image.png', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(26, 'other_features', '[{\"other_features_image\":\"1688108824-other_features_image.png\",\"other_features_heading\":\"ERPGo All In One Business ERP With Project, Account, HRM, CRM & POS\",\"other_featured_description\":\"<p>Use these awesome forms to login or create new account in your project for free.<\\/p>\",\"other_feature_buy_now_link\":\"https://codecanyon.net/item/erpgo-all-in-one-business-erp-with-project-account-hrm-crm-pos/33263435\"},{\"other_features_image\":\"1688108842-other_features_image.png\",\"other_features_heading\":\"ERPGo All In One Business ERP With Project, Account, HRM, CRM & POS \",\"other_featured_description\":\"<p>Use these awesome forms to login or create new account in your project for free.<\\/p>\",\"other_feature_buy_now_link\":\"https://codecanyon.net/item/erpgo-all-in-one-business-erp-with-project-account-hrm-crm-pos/33263435\"},{\"other_features_image\":\"1688115908-other_features_image.png\",\"other_features_heading\":\"ERPGo All In One Business ERP With Project, Account, HRM, CRM & POS \",\"other_featured_description\":\"<p>Use these awesome forms to login or create new account in your project for free.<\\/p>\",\"other_feature_buy_now_link\":\"https://codecanyon.net/item/erpgo-all-in-one-business-erp-with-project-account-hrm-crm-pos/33263435\"},{\"other_features_image\":\"1688108947-other_features_image.png\",\"other_features_heading\":\"ERPGo All In One Business ERP With Project, Account, HRM, CRM & POS \",\"other_featured_description\":\"<p>Use these awesome forms to login or create new account in your project for free.<\\/p>\",\"other_feature_buy_now_link\":\"https://codecanyon.net/item/erpgo-all-in-one-business-erp-with-project-account-hrm-crm-pos/33263435\"}]', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(27, 'discover_status', 'on', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(28, 'discover_heading', 'ERPGo All In One Business ERP With Project, Account, HRM, CRM & POS ', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(29, 'discover_description', 'Use these awesome forms to login or create new account in your project for free.', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(30, 'discover_live_demo_link', 'https://demo.rajodiya.com/erpgo/login', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(31, 'discover_buy_now_link', 'https://codecanyon.net/item/erpgo-all-in-one-business-erp-with-project-account-hrm-crm-pos/33263435', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(32, 'discover_of_features', '[{\"discover_logo\":\"1688099306-discover_logo.png\",\"discover_heading\":\"Feature\",\"discover_description\":\"<p>Use these awesome forms to login or create new account in your project for free.Use these awesome forms to login or create new account in your project for free.<\\/p>\"},{\"discover_logo\":\"1688099328-discover_logo.png\",\"discover_heading\":\"Feature\",\"discover_description\":\"<p>Use these awesome forms to login or create new account in your project for free.Use these awesome forms to login or create new account in your project for free.<\\/p>\"},{\"discover_logo\":\"1688099359-discover_logo.png\",\"discover_heading\":\"Feature\",\"discover_description\":\"<p>Use these awesome forms to login or create new account in your project for free.Use these awesome forms to login or create new account in your project for free.<\\/p>\"},{\"discover_logo\":\"1688099377-discover_logo.png\",\"discover_heading\":\"Feature\",\"discover_description\":\"<p>Use these awesome forms to login or create new account in your project for free.Use these awesome forms to login or create new account in your project for free.<\\/p>\"},{\"discover_logo\":\"1688099401-discover_logo.png\",\"discover_heading\":\"Feature\",\"discover_description\":\"<p>Use these awesome forms to login or create new account in your project for free.Use these awesome forms to login or create new account in your project for free.<\\/p>\"},{\"discover_logo\":\"1688099416-discover_logo.png\",\"discover_heading\":\"Feature\",\"discover_description\":\"<p>Use these awesome forms to login or create new account in your project for free.Use these awesome forms to login or create new account in your project for free.<\\/p>\"},{\"discover_logo\":\"1688099434-discover_logo.png\",\"discover_heading\":\"Feature\",\"discover_description\":\"<p>Use these awesome forms to login or create new account in your project for free.Use these awesome forms to login or create new account in your project for free.<\\/p>\"},{\"discover_logo\":\"1688099443-discover_logo.png\",\"discover_heading\":\"Feature\",\"discover_description\":\"<p>Use these awesome forms to login or create new account in your project for free.Use these awesome forms to login or create new account in your project for free.<\\/p>\"}]', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(33, 'screenshots_status', 'on', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(34, 'screenshots_heading', 'ERPGo All In One Business ERP With Project, Account, HRM, CRM & POS ', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(35, 'screenshots_description', 'Use these awesome forms to login or create new account in your project for free.', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(36, 'screenshots', '[{\"screenshots\":\"1688109087-screenshots.png\",\"screenshots_heading\":\"Balance Sheet\"},{\"screenshots\":\"1688109104-screenshots.png\",\"screenshots_heading\":\"Budget Plan\"},{\"screenshots\":\"1688100981-screenshots.png\",\"screenshots_heading\":\"CRM Deals\"},{\"screenshots\":\"1688109222-screenshots.png\",\"screenshots_heading\":\"Project\"},{\"screenshots\":\"1688108614-screenshots.png\",\"screenshots_heading\":\"Job Career\"},{\"screenshots\":\"1688108626-screenshots.png\",\"screenshots_heading\":\"POS\"}]', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(37, 'plan_status', 'on', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(38, 'plan_title', 'Plan', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(39, 'plan_heading', 'ERPGo All In One Business ERP With Project, Account, HRM, CRM & POS ', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(40, 'plan_description', 'Use these awesome forms to login or create new account in your project for free.', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(41, 'faq_status', 'on', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(42, 'faq_title', 'Faq', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(43, 'faq_heading', 'ERPGo All In One Business ERP With Project, Account, HRM, CRM & POS', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(44, 'faq_description', 'Use these awesome forms to login or create new account in your project for free.', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(45, 'faqs', '[{\"faq_questions\":\"#What does \\\"Theme\\/Package Installation\\\" mean?\",\"faq_answer\":\"For an easy-to-install theme\\/package, we have included step-by-step detailed documentation (in English). However, if it is not done perfectly, please feel free to contact the support team at support@workdo.io\"},{\"faq_questions\":\"#What does \\\"Theme\\/Package Installation\\\" mean?\",\"faq_answer\":\"For an easy-to-install theme\\/package, we have included step-by-step detailed documentation (in English). However, if it is not done perfectly, please feel free to contact the support team at support@workdo.io\"},{\"faq_questions\":\"#What does \\\"Lifetime updates\\\" mean?\",\"faq_answer\":\"For an easy-to-install theme\\/package, we have included step-by-step detailed documentation (in English). However, if it is not done perfectly, please feel free to contact the support team at support@workdo.io\"},{\"faq_questions\":\"#What does \\\"Lifetime updates\\\" mean?\",\"faq_answer\":\"For an easy-to-install theme\\/package, we have included step-by-step detailed documentation (in English). However, if it is not done perfectly, please feel free to contact the support team at support@workdo.io\"},{\"faq_questions\":\"# What does \\\"6 months of support\\\" mean?\",\"faq_answer\":\"Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa\\r\\n                                    nesciunt\\r\\n                                    laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt\\r\\n                                    sapiente ea\\r\\n                                    proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven heard of them accusamus labore sustainable VHS.\"},{\"faq_questions\":\"# What does \\\"6 months of support\\\" mean?\",\"faq_answer\":\"Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa\\r\\n                                    nesciunt\\r\\n                                    laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt\\r\\n                                    sapiente ea\\r\\n                                    proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven heard of them accusamus labore sustainable VHS.\"}]', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(46, 'testimonials_status', 'on', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(47, 'testimonials_heading', 'From our Clients', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(48, 'testimonials_description', 'Use these awesome forms to login or create new account in your project for free.', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(49, 'testimonials_long_description', 'WorkDo seCommerce package offers you a “sales-ready.”secure online store. The package puts all the key pieces together, from design to payment processing. This gives you a headstart in your eCommerce venture. Every store is built using a reliable PHP framework -laravel. Thisspeeds up the development process while increasing the store’s security and performance.Additionally, thanks to the accompanying mobile app, you and your team can manage the store on the go. What’s more, because the app works both for you and your customers, you can use it to reach a wider audience.And, unlike popular eCommerce platforms, it doesn’t bind you to any terms and conditions or recurring fees. You get to choose where you host it or which payment gateway you use. Lastly, you getcomplete control over the looks of the store. And if it lacks any functionalities that you need, just reach out, and let’s discuss customization possibilities', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(50, 'testimonials', '[{\"testimonials_user_avtar\":\"1688466247-testimonials_user_avtar.jpg\",\"testimonials_title\":\"Tbistone\",\"testimonials_description\":\"Very quick customer support, installing this application on my machine locally, within 5 minutes of creating a ticket, the developer was able to fix the issue I had within 10 minutes. EXCELLENT! Thank you very much\",\"testimonials_user\":\"Chordsnstrings\",\"testimonials_designation\":\"from codecanyon\",\"testimonials_star\":\"5\"},{\"testimonials_user_avtar\":\"1688466264-testimonials_user_avtar.jpg\",\"testimonials_title\":\"Tbistone\",\"testimonials_description\":\"Very quick customer support, installing this application on my machine locally, within 5 minutes of creating a ticket, the developer was able to fix the issue I had within 10 minutes. EXCELLENT! Thank you very much\",\"testimonials_user\":\"Chordsnstrings\",\"testimonials_designation\":\"from codecanyon\",\"testimonials_star\":\"5\"},{\"testimonials_user_avtar\":\"1688466271-testimonials_user_avtar.jpg\",\"testimonials_title\":\"Tbistone\",\"testimonials_description\":\"Very quick customer support, installing this application on my machine locally, within 5 minutes of creating a ticket, the developer was able to fix the issue I had within 10 minutes. EXCELLENT! Thank you very much\",\"testimonials_user\":\"Chordsnstrings\",\"testimonials_designation\":\"from codecanyon\",\"testimonials_star\":\"5\"}]', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(51, 'footer_status', 'on', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(52, 'joinus_status', 'on', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(53, 'joinus_heading', 'Join Our Community', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(54, 'joinus_description', 'We build modern web tools to help you jump-start your daily business work.', '2024-07-01 11:35:00', '2024-07-01 11:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `code`, `full_name`, `created_at`, `updated_at`) VALUES
(1, 'en', 'English', NULL, NULL),
(2, 'fr', 'French', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

DROP TABLE IF EXISTS `leads`;
CREATE TABLE IF NOT EXISTS `leads` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `pipeline_id` int NOT NULL,
  `stage_id` int NOT NULL,
  `sources` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `products` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `labels` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `created_by` int NOT NULL,
  `is_active` int NOT NULL DEFAULT '1',
  `is_converted` int NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `leads_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lead_activity_logs`
--

DROP TABLE IF EXISTS `lead_activity_logs`;
CREATE TABLE IF NOT EXISTS `lead_activity_logs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `lead_id` bigint UNSIGNED NOT NULL,
  `log_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lead_calls`
--

DROP TABLE IF EXISTS `lead_calls`;
CREATE TABLE IF NOT EXISTS `lead_calls` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `lead_id` bigint UNSIGNED NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `call_type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `call_result` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lead_calls_lead_id_foreign` (`lead_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lead_discussions`
--

DROP TABLE IF EXISTS `lead_discussions`;
CREATE TABLE IF NOT EXISTS `lead_discussions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `lead_id` bigint UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lead_discussions_lead_id_foreign` (`lead_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lead_emails`
--

DROP TABLE IF EXISTS `lead_emails`;
CREATE TABLE IF NOT EXISTS `lead_emails` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `lead_id` bigint UNSIGNED NOT NULL,
  `to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lead_emails_lead_id_foreign` (`lead_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lead_files`
--

DROP TABLE IF EXISTS `lead_files`;
CREATE TABLE IF NOT EXISTS `lead_files` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `lead_id` bigint UNSIGNED NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lead_files_lead_id_foreign` (`lead_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lead_stages`
--

DROP TABLE IF EXISTS `lead_stages`;
CREATE TABLE IF NOT EXISTS `lead_stages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pipeline_id` int NOT NULL,
  `created_by` int NOT NULL,
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

DROP TABLE IF EXISTS `leaves`;
CREATE TABLE IF NOT EXISTS `leaves` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` int NOT NULL,
  `leave_type_id` int NOT NULL,
  `applied_on` date NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_leave_days` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leave_reason` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `employee_id`, `leave_type_id`, `applied_on`, `start_date`, `end_date`, `total_leave_days`, `leave_reason`, `remark`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-07-16', '2024-01-10', '2024-01-17', '8', 'Quidem quibusdam qui', 'Praesentium magna at', 'Pending', 1, '2024-07-16 07:48:50', '2024-07-16 07:48:50');

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

DROP TABLE IF EXISTS `leave_types`;
CREATE TABLE IF NOT EXISTS `leave_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `days` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `title`, `days`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Tempora magnam ut ip', 10, 1, '2024-07-10 10:11:55', '2024-07-10 10:11:55');

-- --------------------------------------------------------

--
-- Table structure for table `legal_disputes`
--

DROP TABLE IF EXISTS `legal_disputes`;
CREATE TABLE IF NOT EXISTS `legal_disputes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `legal_basis` text COLLATE utf8mb4_unicode_ci,
  `desired_outcome` text COLLATE utf8mb4_unicode_ci,
  `complain_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` int DEFAULT '0',
  `conclusion` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `legal_disputes`
--

INSERT INTO `legal_disputes` (`id`, `subject`, `legal_basis`, `desired_outcome`, `complain_date`, `end_date`, `status`, `conclusion`, `created_at`, `updated_at`) VALUES
(1, 'Voluptas quis nihil', 'Ducimus, consectetur.', 'Accusantium eiusmod', '1974-08-20', '1998-11-05', 0, 'Aut blanditiis nobis.', '2024-07-12 12:26:14', '2024-07-12 12:26:14'),
(2, 'Rerum non impedit c', 'Omnis laborum. Molli.', 'Eveniet est duis ea', '2009-07-04', '2006-08-30', 1, 'Dolorem explicabo. P.', '2024-07-12 12:36:54', '2024-07-12 13:19:24'),
(3, 'Aut ducimus qui vel', 'Quisquam eaque facer.', 'Nihil non excepteur', '1990-07-26', '2006-08-06', -1, 'Ad quis dolor sit do.', '2024-07-12 14:17:07', '2024-07-12 14:17:07');

-- --------------------------------------------------------

--
-- Table structure for table `legal_dispute_consultants`
--

DROP TABLE IF EXISTS `legal_dispute_consultants`;
CREATE TABLE IF NOT EXISTS `legal_dispute_consultants` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `legal_dispute_id` int NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `legal_dispute_consultants`
--

INSERT INTO `legal_dispute_consultants` (`id`, `legal_dispute_id`, `name`, `job_title`, `start_date`, `end_date`, `description`, `created_at`, `updated_at`) VALUES
(1, 3, 'Noni', 'Lawyer', '2024-07-03', '2024-07-31', 'Description', '2024-07-12 14:17:07', '2024-07-12 14:17:07');

-- --------------------------------------------------------

--
-- Table structure for table `legal_dispute_handlers`
--

DROP TABLE IF EXISTS `legal_dispute_handlers`;
CREATE TABLE IF NOT EXISTS `legal_dispute_handlers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `legal_dispute_id` int NOT NULL,
  `employee_id` int NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `legal_dispute_involved_parties`
--

DROP TABLE IF EXISTS `legal_dispute_involved_parties`;
CREATE TABLE IF NOT EXISTS `legal_dispute_involved_parties` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `legal_dispute_id` int NOT NULL,
  `employee_id` int DEFAULT NULL,
  `customer_id` int DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `legal_dispute_involved_parties`
--

INSERT INTO `legal_dispute_involved_parties` (`id`, `legal_dispute_id`, `employee_id`, `customer_id`, `type`, `created_at`, `updated_at`) VALUES
(5, 1, NULL, 1, 'CUSTOMER', '2024-07-12 13:18:38', '2024-07-12 13:18:38'),
(6, 1, 1, NULL, 'EMPLOYEE', '2024-07-12 13:18:38', '2024-07-12 13:18:38'),
(7, 2, NULL, 1, 'CUSTOMER', '2024-07-12 13:19:25', '2024-07-12 13:19:25'),
(8, 2, 1, NULL, 'EMPLOYEE', '2024-07-12 13:19:25', '2024-07-12 13:19:25'),
(9, 3, NULL, 1, 'CUSTOMER', '2024-07-12 14:17:07', '2024-07-12 14:17:07'),
(10, 3, 1, NULL, 'EMPLOYEE', '2024-07-12 14:17:07', '2024-07-12 14:17:07');

-- --------------------------------------------------------

--
-- Table structure for table `legal_dispute_involved_procedures`
--

DROP TABLE IF EXISTS `legal_dispute_involved_procedures`;
CREATE TABLE IF NOT EXISTS `legal_dispute_involved_procedures` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `legal_dispute_id` int NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `procedure_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `legal_dispute_involved_procedures`
--

INSERT INTO `legal_dispute_involved_procedures` (`id`, `legal_dispute_id`, `name`, `description`, `attachment`, `procedure_date`, `created_at`, `updated_at`) VALUES
(4, 3, '', NULL, NULL, NULL, '2024-07-12 15:09:10', '2024-07-12 15:09:10'),
(3, 1, 'Pro Pro', NULL, NULL, '2024-07-25', '2024-07-12 13:18:38', '2024-07-12 13:18:38');

-- --------------------------------------------------------

--
-- Table structure for table `legal_dispute_resources`
--

DROP TABLE IF EXISTS `legal_dispute_resources`;
CREATE TABLE IF NOT EXISTS `legal_dispute_resources` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `legal_dispute_id` int NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `legal_dispute_resources`
--

INSERT INTO `legal_dispute_resources` (`id`, `legal_dispute_id`, `name`, `file_url`, `description`, `created_at`, `updated_at`) VALUES
(3, 2, 'Lana Rodriguez', '/uploads/legal-dispute-resources/Planning de travail semaine du 08 au 12 JUILLET 2024 - WAMBA HERMANN_669131766a47c.xlsx', 'Exercitation cupidat', '2024-07-12 13:19:24', '2024-07-12 13:19:24'),
(2, 1, 'CV', '/uploads/legal-dispute-resources/REPORTING_HERMANN_11_juillet__2024(1)_66913b3e729e0.xlsx', 'Description', '2024-07-12 13:18:38', '2024-07-12 13:18:38');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

DROP TABLE IF EXISTS `loans`;
CREATE TABLE IF NOT EXISTS `loans` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` int NOT NULL,
  `loan_option` int NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan_options`
--

DROP TABLE IF EXISTS `loan_options`;
CREATE TABLE IF NOT EXISTS `loan_options` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loan_options`
--

INSERT INTO `loan_options` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Jasper Kline', 1, '2024-07-10 10:12:36', '2024-07-10 10:12:36');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

DROP TABLE IF EXISTS `login_details`;
CREATE TABLE IF NOT EXISTS `login_details` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_activities`
--

DROP TABLE IF EXISTS `log_activities`;
CREATE TABLE IF NOT EXISTS `log_activities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `time` time NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_id` bigint UNSIGNED NOT NULL,
  `created_by` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

DROP TABLE IF EXISTS `meetings`;
CREATE TABLE IF NOT EXISTS `meetings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `branch_id` int NOT NULL,
  `department_id` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`id`, `branch_id`, `department_id`, `employee_id`, `title`, `date`, `time`, `note`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, '[\"1\"]', '[\"1\"]', 'Error aperiam autem', '2015-09-21', '04:08:00', 'Sed illo voluptatem', 1, '2024-07-10 10:21:15', '2024-07-10 10:21:15');

-- --------------------------------------------------------

--
-- Table structure for table `meeting_employees`
--

DROP TABLE IF EXISTS `meeting_employees`;
CREATE TABLE IF NOT EXISTS `meeting_employees` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `meeting_id` int NOT NULL,
  `employee_id` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meeting_employees`
--

INSERT INTO `meeting_employees` (`id`, `meeting_id`, `employee_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2024-07-10 10:21:15', '2024-07-10 10:21:15');

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
) ENGINE=MyISAM AUTO_INCREMENT=213 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_09_22_192348_create_messages_table', 1),
(5, '2019_09_28_102009_create_settings_table', 1),
(6, '2019_09_30_050856_create_pipelines_table', 1),
(7, '2019_09_30_052036_create_sources_table', 1),
(8, '2019_09_30_061801_create_stages_table', 1),
(9, '2019_09_30_092218_create_labels_table', 1),
(10, '2019_10_03_052618_create_deals_table', 1),
(11, '2019_10_05_045358_create_user_deals_table', 1),
(12, '2019_10_05_045359_create_client_deals_table', 1),
(13, '2019_10_07_054657_create_deal_files_table', 1),
(14, '2019_10_07_091153_create_deal_tasks_table', 1),
(15, '2019_10_14_055151_create_deal_discussions_table', 1),
(16, '2019_10_16_211433_create_favorites_table', 1),
(17, '2019_10_18_223259_add_avatar_to_users', 1),
(18, '2019_10_20_211056_add_messenger_color_to_users', 1),
(19, '2019_10_22_000539_add_dark_mode_to_users', 1),
(20, '2019_10_24_060326_create_projectstages_table', 1),
(21, '2019_10_25_214038_add_active_status_to_users', 1),
(22, '2019_11_12_073012_create_bug_comments_table', 1),
(23, '2019_11_12_100007_create_bug_files_table', 1),
(24, '2019_11_13_051828_create_taxes_table', 1),
(25, '2019_11_13_055026_create_invoices_table', 1),
(26, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(27, '2019_12_18_110230_create_bugs_table', 1),
(28, '2019_12_18_112007_create_bug_statuses_table', 1),
(29, '2019_12_26_101754_create_departments_table', 1),
(30, '2019_12_26_101814_create_designations_table', 1),
(31, '2019_12_26_105721_create_documents_table', 1),
(32, '2019_12_27_083751_create_branches_table', 1),
(33, '2019_12_27_090831_create_employees_table', 1),
(34, '2019_12_27_112922_create_employee_documents_table', 1),
(35, '2019_12_28_050508_create_awards_table', 1),
(36, '2019_12_28_050919_create_award_types_table', 1),
(37, '2019_12_31_060916_create_termination_types_table', 1),
(38, '2019_12_31_062259_create_terminations_table', 1),
(39, '2019_12_31_070521_create_resignations_table', 1),
(40, '2019_12_31_072252_create_travels_table', 1),
(41, '2019_12_31_090637_create_promotions_table', 1),
(42, '2019_12_31_092838_create_transfers_table', 1),
(43, '2019_12_31_100319_create_warnings_table', 1),
(44, '2019_12_31_103019_create_complaints_table', 1),
(45, '2020_01_02_090837_create_payslip_types_table', 1),
(46, '2020_01_02_093331_create_allowance_options_table', 1),
(47, '2020_01_02_102558_create_loan_options_table', 1),
(48, '2020_01_02_103822_create_deduction_options_table', 1),
(49, '2020_01_02_110828_create_genrate_payslip_options_table', 1),
(50, '2020_01_02_111807_create_set_salaries_table', 1),
(51, '2020_01_03_084302_create_allowances_table', 1),
(52, '2020_01_03_101735_create_commissions_table', 1),
(53, '2020_01_03_105019_create_loans_table', 1),
(54, '2020_01_03_105046_create_saturation_deductions_table', 1),
(55, '2020_01_03_105100_create_other_payments_table', 1),
(56, '2020_01_03_105111_create_overtimes_table', 1),
(57, '2020_01_04_060343_create_contract_types_table', 1),
(58, '2020_01_04_060343_create_performance_type_table', 1),
(59, '2020_01_04_060354_create_contracts_table', 1),
(60, '2020_01_04_072527_create_pay_slips_table', 1),
(61, '2020_01_08_063207_create_product_services_table', 1),
(62, '2020_01_08_084029_create_product_service_categories_table', 1),
(63, '2020_01_08_092717_create_product_service_units_table', 1),
(64, '2020_01_08_121541_create_customers_table', 1),
(65, '2020_01_09_104945_create_venders_table', 1),
(66, '2020_01_09_113852_create_bank_accounts_table', 1),
(67, '2020_01_09_124222_create_bank_transfers_table', 1),
(68, '2020_01_10_064723_create_transactions_table', 1),
(69, '2020_01_13_072608_create_invoice_products_table', 1),
(70, '2020_01_13_084720_create_events_table', 1),
(71, '2020_01_15_034438_create_revenues_table', 1),
(72, '2020_01_15_051228_create_bills_table', 1),
(73, '2020_01_15_060859_create_bill_products_table', 1),
(74, '2020_01_15_073237_create_payments_table', 1),
(75, '2020_01_16_041720_create_announcements_table', 1),
(76, '2020_01_16_043907_create_orders_table', 1),
(77, '2020_01_16_090747_create_leave_types_table', 1),
(78, '2020_01_16_093256_create_leaves_table', 1),
(79, '2020_01_16_110357_create_meetings_table', 1),
(80, '2020_01_18_051650_create_invoice_payments_table', 1),
(81, '2020_01_18_051650_create_pos_payments_table', 1),
(82, '2020_01_20_091035_create_bill_payments_table', 1),
(83, '2020_01_23_101613_create_meeting_employees_table', 1),
(84, '2020_01_23_123844_create_event_employees_table', 1),
(85, '2020_01_24_062752_create_announcement_employees_table', 1),
(86, '2020_01_27_052503_create_attendance_employees_table', 1),
(87, '2020_02_25_052356_create_credit_notes_table', 1),
(88, '2020_02_26_033827_create_debit_notes_table', 1),
(89, '2020_03_04_122711_create_leads_table', 1),
(90, '2020_03_04_122801_create_lead_stages_table', 1),
(91, '2020_03_05_042105_create_lead_activity_logs_table', 1),
(92, '2020_03_05_042308_create_lead_discussions_table', 1),
(93, '2020_03_05_042318_create_user_leads_table', 1),
(94, '2020_03_05_042549_create_lead_files_table', 1),
(95, '2020_03_05_042636_create_lead_emails_table', 1),
(96, '2020_03_05_042710_create_lead_calls_table', 1),
(97, '2020_03_05_044157_create_deal_emails_table', 1),
(98, '2020_03_05_044322_create_deal_calls_table', 1),
(99, '2020_03_12_120749_create_user_coupons_table', 1),
(100, '2020_03_17_104345_create_estimations_table', 1),
(101, '2020_03_18_104909_create_notifications_table', 1),
(102, '2020_04_02_045834_create_proposals_table', 1),
(103, '2020_04_02_055706_create_proposal_products_table', 1),
(104, '2020_04_18_035141_create_goals_table', 1),
(105, '2020_04_21_115823_create_assets_table', 1),
(106, '2020_04_24_023732_create_custom_fields_table', 1),
(107, '2020_04_24_024217_create_custom_field_values_table', 1),
(108, '2020_05_01_122144_create_ducument_uploads_table', 1),
(109, '2020_05_02_075614_create_email_templates_table', 1),
(110, '2020_05_02_075630_create_email_template_langs_table', 1),
(111, '2020_05_02_075647_create_user_email_templates_table', 1),
(112, '2020_05_04_070452_create_indicators_table', 1),
(113, '2020_05_05_023742_create_appraisals_table', 1),
(114, '2020_05_05_061241_create_goal_types_table', 1),
(115, '2020_05_05_095926_create_goal_trackings_table', 1),
(116, '2020_05_07_093520_create_company_policies_table', 1),
(117, '2020_05_07_131311_create_training_types_table', 1),
(118, '2020_05_08_023838_create_trainers_table', 1),
(119, '2020_05_08_043039_create_trainings_table', 1),
(120, '2020_05_21_065337_create_permission_tables', 1),
(121, '2020_06_02_085538_create_task_stages_table', 1),
(122, '2020_06_30_043627_create_user_to_dos_table', 1),
(123, '2020_07_04_041452_create_project_email_templates_table', 1),
(124, '2020_07_06_110501_create_user_contacts_table', 1),
(125, '2020_08_10_073242_create_project_invoices_table', 1),
(126, '2020_08_26_093539_create_time_trackers_table', 1),
(127, '2020_10_07_034726_create_holidays_table', 1),
(128, '2021_01_11_062508_create_chart_of_accounts_table', 1),
(129, '2021_01_11_070441_create_chart_of_account_types_table', 1),
(130, '2021_01_12_032834_create_journal_entries_table', 1),
(131, '2021_01_12_033815_create_journal_items_table', 1),
(132, '2021_01_20_072219_create_chart_of_account_sub_types_table', 1),
(133, '2021_01_20_113044_create_log_activities_table', 1),
(134, '2021_03_13_093312_create_ip_restricts_table', 1),
(135, '2021_03_13_114832_create_job_categories_table', 1),
(136, '2021_03_13_123125_create_job_stages_table', 1),
(137, '2021_03_15_094707_create_jobs_table', 1),
(138, '2021_03_15_153745_create_job_applications_table', 1),
(139, '2021_03_16_115140_create_job_application_notes_table', 1),
(140, '2021_03_17_100224_create_projects_table', 1),
(141, '2021_03_17_163107_create_custom_questions_table', 1),
(142, '2021_03_18_060536_create_project_tasks_table', 1),
(143, '2021_03_18_070146_create_milestones_table', 1),
(144, '2021_03_18_091547_create_task_checklists_table', 1),
(145, '2021_03_18_092113_create_task_files_table', 1),
(146, '2021_03_18_092400_create_task_comments_table', 1),
(147, '2021_03_18_102517_create_activity_logs_table', 1),
(148, '2021_03_18_140630_create_interview_schedules_table', 1),
(149, '2021_03_19_053350_create_project_users_table', 1),
(150, '2021_03_22_100636_create_expenses_table', 1),
(151, '2021_03_22_122532_create_job_on_boards_table', 1),
(152, '2021_03_23_032633_create_timesheets_table', 1),
(153, '2021_08_03_093459_create_form_builders_table', 1),
(154, '2021_08_03_094508_create_form_fields_table', 1),
(155, '2021_08_03_094534_create_form_field_responses_table', 1),
(156, '2021_08_03_094548_create_form_responses_table', 1),
(157, '2021_08_04_072610_admin_payment_settings', 1),
(158, '2021_08_04_090539_company_payment_settings', 1),
(159, '2021_08_05_114738_create_supports_table', 1),
(160, '2021_08_05_115212_create_support_replies_table', 1),
(161, '2021_08_20_084119_create_competencies_table', 1),
(162, '2021_09_03_112043_create_track_photos_table', 1),
(163, '2021_12_02_052828_create_budgets_table', 1),
(164, '2021_12_24_104639_create_zoom_meetings_table', 1),
(165, '2022_03_11_035602_create_stock_reports_table', 1),
(166, '2022_07_21_033939_create_contract_attachment_table', 1),
(167, '2022_07_21_034802_create_contract_comment_table', 1),
(168, '2022_07_21_034957_create_contract_notes_table', 1),
(169, '2022_08_10_051439_generate__offer__letter', 1),
(170, '2022_08_16_050109_joining_letter', 1),
(171, '2022_08_17_045033_experience_certificate', 1),
(172, '2022_08_17_051049_create_warehouses_table', 1),
(173, '2022_08_17_065806_noc_certificate', 1),
(174, '2022_08_18_055612_create_purchases_table', 1),
(175, '2022_08_18_072314_create_purchase_products_table', 1),
(176, '2022_08_22_050630_create_purchase_payments', 1),
(177, '2022_08_24_045854_create_warehouse_products', 1),
(178, '2022_08_25_112305_create_pos_table', 1),
(179, '2022_08_25_124531_create_pos_products_table', 1),
(180, '2023_04_19_113655_create_login_details_table', 1),
(181, '2023_04_20_102814_create_notification_templates_table', 1),
(182, '2023_04_20_121414_create_notification_template_langs_table', 1),
(183, '2023_04_24_073041_create_webhook_settings_table', 1),
(184, '2023_05_29_063149_create_invoice_bank_transfer_table', 1),
(185, '2023_06_05_043450_create_landing_page_settings_table', 1),
(186, '2023_06_06_043306_create_templates_table', 1),
(187, '2023_06_10_114031_create_join_us_table', 1),
(188, '2023_06_27_114746_create_languages_table', 1),
(189, '2023_07_12_220924_create_warehouse_transfers_table', 1),
(190, '2023_07_27_144907_create_bill_account_table', 1),
(191, '2023_11_29_060818_create_transaction_lines_table', 1),
(192, '2023_12_20_103442_create_project_expenses_table', 1),
(193, '2023_12_26_061204_create_chart_of_account_parents_table', 1),
(194, '2023_12_29_105150_add_parent_to_chart_of_accounts', 1),
(195, '2023_12_29_105244_add_created_by_to_chart_of_account_sub_types', 1),
(196, '2023_12_29_105321_add_account_to_employees', 1),
(197, '2024_01_04_110658_create_quotation_products_table', 1),
(198, '2024_01_04_110718_create_quotations_table', 1),
(199, '2024_01_14_093708_create_shipments_table', 1),
(200, '2024_03_16_150729_add_otp_columns_to_users_table', 1),
(201, '2024_03_18_151454_create_devices_table', 1),
(202, '2024_03_20_093550_create_cache_table', 1),
(203, '2024_04_02_112427_create_employee_contracts_table', 1),
(204, '2024_04_02_115529_create_employee_contract_templates_table', 1),
(205, '2024_07_05_075153_create_employee_document_types_table', 2),
(206, '2024_07_05_075500_update_employee_documents_table', 2),
(207, '2024_07_12_113403_create_legal_disputes_table', 3),
(208, '2024_07_12_113428_create_legal_dispute_handlers_table', 3),
(209, '2024_07_12_113447_create_legal_dispute_involved_parties_table', 3),
(210, '2024_07_12_113500_create_legal_dispute_involved_procedures_table', 3),
(211, '2024_07_12_113518_create_legal_dispute_resources_table', 3),
(212, '2024_07_12_145854_create_legal_dispute_consultants_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `milestones`
--

DROP TABLE IF EXISTS `milestones`;
CREATE TABLE IF NOT EXISTS `milestones` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_id` int NOT NULL DEFAULT '0',
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `progress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` double(15,2) NOT NULL DEFAULT '0.00',
  `start_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(3, 'App\\Models\\Vender', 1),
(4, 'App\\Models\\User', 1),
(6, 'App\\Models\\User', 3),
(7, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `noc_certificates`
--

DROP TABLE IF EXISTS `noc_certificates`;
CREATE TABLE IF NOT EXISTS `noc_certificates` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint NOT NULL,
  `priority` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification_templates`
--

DROP TABLE IF EXISTS `notification_templates`;
CREATE TABLE IF NOT EXISTS `notification_templates` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_templates`
--

INSERT INTO `notification_templates` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'New Lead', 'new_lead', '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(2, 'Lead to Deal Conversion', 'lead_to_deal_conversion', '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(3, 'New Project', 'new_project', '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(4, 'Task Stage Updated', 'task_stage_updated', '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(5, 'New Deal', 'new_deal', '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(6, 'New Contract', 'new_contract', '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(7, 'New Task', 'new_task', '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(8, 'New Task Comment', 'new_task_comment', '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(9, 'New Monthly Payslip', 'new_monthly_payslip', '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(10, 'New Announcement', 'new_announcement', '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(11, 'New Support Ticket', 'new_support_ticket', '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(12, 'New Meeting', 'new_meeting', '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(13, 'New Award', 'new_award', '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(14, 'New Holiday', 'new_holiday', '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(15, 'New Event', 'new_event', '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(16, 'New Company Policy', 'new_company_policy', '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(17, 'New Invoice', 'new_invoice', '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(18, 'New Bill', 'new_bill', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(19, 'New Budget', 'new_budget', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(20, 'New Revenue', 'new_revenue', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(21, 'New Invoice Payment', 'new_invoice_payment', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(22, 'New Customer', 'new_customer', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(23, 'New Vendor', 'new_vendor', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(24, 'New Proposal', 'new_proposal', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(25, 'New Payment', 'bill_payment', '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(26, 'Invoice Payment Reminder', 'invoice_payment_reminder', '2024-07-01 11:35:00', '2024-07-01 11:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `notification_template_langs`
--

DROP TABLE IF EXISTS `notification_template_langs`;
CREATE TABLE IF NOT EXISTS `notification_template_langs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int NOT NULL,
  `lang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `variables` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=417 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_template_langs`
--

INSERT INTO `notification_template_langs` (`id`, `parent_id`, `lang`, `content`, `variables`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'ar', 'تم إنشاء عميل محتمل جديد بواسطة {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead Name\": \"lead_name\",\r\n                    \"Lead Email\": \"lead_email\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(2, 1, 'zh', '{user_name} 创建的新商机', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead Name\": \"lead_name\",\r\n                    \"Lead Email\": \"lead_email\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(3, 1, 'da', 'Neuer Lead erstellt von {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead Name\": \"lead_name\",\r\n                    \"Lead Email\": \"lead_email\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(4, 1, 'de', 'Ny kundeemne oprettet af {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead Name\": \"lead_name\",\r\n                    \"Lead Email\": \"lead_email\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(5, 1, 'en', 'New Lead created by {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead Name\": \"lead_name\",\r\n                    \"Lead Email\": \"lead_email\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(6, 1, 'es', 'Nuevo cliente potencial creado por {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead Name\": \"lead_name\",\r\n                    \"Lead Email\": \"lead_email\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(7, 1, 'fr', 'Nouveau prospect créé par {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead Name\": \"lead_name\",\r\n                    \"Lead Email\": \"lead_email\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(8, 1, 'he', 'ביצוע חדש שנוצר על-ידי {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead Name\": \"lead_name\",\r\n                    \"Lead Email\": \"lead_email\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(9, 1, 'it', 'Nuovo lead creato da {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead Name\": \"lead_name\",\r\n                    \"Lead Email\": \"lead_email\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(10, 1, 'ja', '{user_name} によって作成された新しいリード', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead Name\": \"lead_name\",\r\n                    \"Lead Email\": \"lead_email\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(11, 1, 'nl', 'Nieuwe lead gemaakt door {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead Name\": \"lead_name\",\r\n                    \"Lead Email\": \"lead_email\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(12, 1, 'pl', 'Nowy potencjalny klient utworzony przez użytkownika {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead Name\": \"lead_name\",\r\n                    \"Lead Email\": \"lead_email\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(13, 1, 'ru', 'Новый интерес создан пользователем {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead Name\": \"lead_name\",\r\n                    \"Lead Email\": \"lead_email\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(14, 1, 'pt', 'Novo lead criado por {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead Name\": \"lead_name\",\r\n                    \"Lead Email\": \"lead_email\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(15, 1, 'tr', '{ user_name } tarafından oluşturulan Yeni Lider', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead Name\": \"lead_name\",\r\n                    \"Lead Email\": \"lead_email\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(16, 1, 'pt-br', 'Novo Lead criado por {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead Name\": \"lead_name\",\r\n                    \"Lead Email\": \"lead_email\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(17, 2, 'ar', 'تم تحويل الصفقة من خلال العميل المحتمل {lead_user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead User Name\": \"lead_user_name\",\r\n                    \"Lead Name\": \"lead_name\",\r\n                    \"Lead Email\": \"lead_email\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(18, 2, 'zh', '已通过商机 {lead_user_name} 进行转换', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead User Name\": \"lead_user_name\",\r\n                    \"Lead Name\": \"lead_name\",\r\n                    \"Lead Email\": \"lead_email\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(19, 2, 'da', 'Aftale konverteret via kundeemne {lead_user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead User Name\": \"lead_user_name\",\r\n                    \"Lead Name\": \"lead_name\",\r\n                    \"Lead Email\": \"lead_email\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(20, 2, 'de', 'Geschäftsabschluss durch Lead {lead_user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead User Name\": \"lead_user_name\",\r\n                    \"Lead Name\": \"lead_name\",\r\n                    \"Lead Email\": \"lead_email\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(21, 2, 'en', 'Deal converted through lead {lead_user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead User Name\": \"lead_user_name\",\r\n                    \"Lead Name\": \"lead_name\",\r\n                    \"Lead Email\": \"lead_email\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(22, 2, 'es', 'Trato convertido a través del cliente potencial {lead_user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead User Name\": \"lead_user_name\",\r\n                    \"Lead Name\": \"lead_name\",\r\n                    \"Lead Email\": \"lead_email\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(23, 2, 'fr', 'Offre convertie via le prospect {lead_user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead User Name\": \"lead_user_name\",\r\n                    \"Lead Name\": \"lead_name\",\r\n                    \"Lead Email\": \"lead_email\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(24, 2, 'he', 'העסקה הומרה באמצעות עופרת {lead_user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead User Name\": \"lead_user_name\",\r\n                    \"Lead Name\": \"lead_name\",\r\n                    \"Lead Email\": \"lead_email\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(25, 2, 'it', 'Offerta convertita tramite il lead {lead_user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead User Name\": \"lead_user_name\",\r\n                    \"Lead Name\": \"lead_name\",\r\n                    \"Lead Email\": \"lead_email\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(26, 2, 'ja', 'リード {lead_user_name} を通じて商談が成立', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead User Name\": \"lead_user_name\",\r\n                    \"Lead Name\": \"lead_name\",\r\n                    \"Lead Email\": \"lead_email\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(27, 2, 'nl', 'Deal geconverteerd via lead {lead_user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead User Name\": \"lead_user_name\",\r\n                    \"Lead Name\": \"lead_name\",\r\n                    \"Lead Email\": \"lead_email\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(28, 2, 'pl', 'Umowa przekonwertowana przez lead {lead_user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead User Name\": \"lead_user_name\",\r\n                    \"Lead Name\": \"lead_name\",\r\n                    \"Lead Email\": \"lead_email\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(29, 2, 'ru', 'Конвертация сделки через лид {lead_user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead User Name\": \"lead_user_name\",\r\n                    \"Lead Name\": \"lead_name\",\r\n                    \"Lead Email\": \"lead_email\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(30, 2, 'pt', 'Negócio convertido por meio do lead {lead_user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead User Name\": \"lead_user_name\",\r\n                    \"Lead Name\": \"lead_name\",\r\n                    \"Lead Email\": \"lead_email\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(31, 2, 'tr', 'Baş { lead_user_name } ile dönüştürülen anlaşma', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead User Name\": \"lead_user_name\",\r\n                    \"Lead Name\": \"lead_name\",\r\n                    \"Lead Email\": \"lead_email\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(32, 2, 'pt-br', 'Acordo convertido através do lead {lead_user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead User Name\": \"lead_user_name\",\r\n                    \"Lead Name\": \"lead_name\",\r\n                    \"Lead Email\": \"lead_email\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(33, 3, 'ar', 'تم تكوين مشروع جديد { project_name } بواسطة { user_name }', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(34, 3, 'zh', '{user_name} 创建了新的 {project_name} 项目', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(35, 3, 'da', 'Nyt { project_name } projekt oprettet af { user_name }', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(36, 3, 'de', 'Neues Projekt {project_name} erstellt von {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(37, 3, 'en', 'New {project_name} project created by {user_name}.', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(38, 3, 'es', 'Nuevo proyecto {project_name} creado por {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(39, 3, 'fr', 'Nouveau projet { project_name } créé par { nom_utilisateur }', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(40, 3, 'he', 'פרויקט {project_name} חדש שנוצר על ידי {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(41, 3, 'it', 'Nuovo progetto {project_name} creato da {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(42, 3, 'ja', '{user_name} によって作成された新規 {project_name} プロジェクト', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(43, 3, 'nl', 'Nieuw project { project_name } gemaakt door { user_name }', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(44, 3, 'pl', 'Nowy projekt {project_name } utworzony przez użytkownika {user_name }', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(45, 3, 'ru', 'Новый проект { project_name }, созданный пользователем { user_name }', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(46, 3, 'pt', 'Novo projeto {project_name} criado por {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(47, 3, 'tr', '{ user_name } tarafından oluşturulan yeni { project_name } projesi', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(48, 3, 'pt-br', 'Novo projeto {project_name} criado por {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(49, 4, 'ar', 'تم تغيير حالة { task_name } من { old_stage_name } الى { new_stage_name }', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Old Stage Name\": \"old_stage_name\",\r\n                    \"New Stage Name\": \"new_stage_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(50, 4, 'zh', '{task_name} 状态已从 {old_stage_name} 更改为 {new_stage_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Old Stage Name\": \"old_stage_name\",\r\n                    \"New Stage Name\": \"new_stage_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(51, 4, 'da', 'Status for { task_name } er ændret fra { old_stage_name } til { new_stage_name }', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Old Stage Name\": \"old_stage_name\",\r\n                    \"New Stage Name\": \"new_stage_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(52, 4, 'de', 'Status {task_name} wurde von {old_stage_name} in {new_stage_name} geändert', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Old Stage Name\": \"old_stage_name\",\r\n                    \"New Stage Name\": \"new_stage_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(53, 4, 'en', '{task_name} status changed from {old_stage_name} to {new_stage_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Old Stage Name\": \"old_stage_name\",\r\n                    \"New Stage Name\": \"new_stage_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(54, 4, 'es', 'El estado de {task_name} cambió de {old_stage_name} a {new_stage_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Old Stage Name\": \"old_stage_name\",\r\n                    \"New Stage Name\": \"new_stage_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(55, 4, 'fr', 'Le statut de {task_name} est passé de {old_stage_name} à {new_stage_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Old Stage Name\": \"old_stage_name\",\r\n                    \"New Stage Name\": \"new_stage_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(56, 4, 'he', 'הסטאטוס {task_name} השתנה מ - {old_stage_name} ל - {new_stage_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Old Stage Name\": \"old_stage_name\",\r\n                    \"New Stage Name\": \"new_stage_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(57, 4, 'it', 'Lo stato di {task_name} è cambiato da {old_stage_name} a {new_stage_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Old Stage Name\": \"old_stage_name\",\r\n                    \"New Stage Name\": \"new_stage_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(58, 4, 'ja', '{task_name} のステータスが {old_stage_name} から {new_stage_name} に変更されました', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Old Stage Name\": \"old_stage_name\",\r\n                    \"New Stage Name\": \"new_stage_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(59, 4, 'nl', '{task_name}-status gewijzigd van {old_stage_name} in {new_stage_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Old Stage Name\": \"old_stage_name\",\r\n                    \"New Stage Name\": \"new_stage_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(60, 4, 'pl', 'Zmieniono status {task_name} z {old_stage_name} na {new_stage_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Old Stage Name\": \"old_stage_name\",\r\n                    \"New Stage Name\": \"new_stage_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(61, 4, 'ru', 'Статус {task_name} изменен с {old_stage_name} на {new_stage_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Old Stage Name\": \"old_stage_name\",\r\n                    \"New Stage Name\": \"new_stage_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(62, 4, 'pt', '{task_name} status alterado de {old_stage_name} para {new_stage_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Old Stage Name\": \"old_stage_name\",\r\n                    \"New Stage Name\": \"new_stage_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(63, 4, 'tr', '{ task_name } durumu, { old_stage_name } tarafından { new_stage_name } olarak değiştirildi', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Old Stage Name\": \"old_stage_name\",\r\n                    \"New Stage Name\": \"new_stage_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(64, 4, 'pt-br', '{task_name} status alterado de {old_stage_name} para {new_stage_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Old Stage Name\": \"old_stage_name\",\r\n                    \"New Stage Name\": \"new_stage_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(65, 5, 'ar', 'تم إنشاء الصفقة الجديدة بواسطة {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead Name\": \"deal_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(66, 5, 'zh', '{user_name} 创建的新政', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead Name\": \"deal_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(67, 5, 'da', 'Ny aftale oprettet af {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead Name\": \"deal_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(68, 5, 'de', 'Neuer Deal erstellt von {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead Name\": \"deal_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(69, 5, 'en', 'New Deal created by {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead Name\": \"deal_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(70, 5, 'es', 'Nueva oferta creada por {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead Name\": \"deal_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(71, 5, 'fr', 'Nouvelle offre créée par {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead Name\": \"deal_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(72, 5, 'he', 'עסקה חדשה שנוצרה על-ידי {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead Name\": \"deal_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(73, 5, 'it', 'New Deal creato da {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead Name\": \"deal_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(74, 5, 'ja', '{user_name} によって作成された新しいディール', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead Name\": \"deal_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(75, 5, 'nl', 'Nieuwe deal gemaakt door {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead Name\": \"deal_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(76, 5, 'pl', 'Nowa oferta utworzona przez użytkownika {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead Name\": \"deal_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(77, 5, 'ru', 'Новая сделка создана пользователем {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead Name\": \"deal_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(78, 5, 'pt', 'Novo negócio criado por {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead Name\": \"deal_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(79, 5, 'tr', '{ user_name } tarafından oluşturulan Yeni Anlaşma', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead Name\": \"deal_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(80, 5, 'pt-br', 'Novo negócio criado por {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Lead Name\": \"deal_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(81, 6, 'ar', 'تم إنشاء عقد {Contract_subject} لـ {contract_client} بواسطة {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Contract Name\": \"contract_subject\",\r\n                    \"Client Name\": \"contract_client\",\r\n                    \"Contract Price\": \"contract_value\",\r\n                    \"Contract Start Date\": \"contract_start_date\",\r\n                    \"Contract End Date\": \"contract_end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(82, 6, 'zh', '{contract_subject } 合同已由 {user_name} 创建 { contract_client}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Contract Name\": \"contract_subject\",\r\n                    \"Client Name\": \"contract_client\",\r\n                    \"Contract Price\": \"contract_value\",\r\n                    \"Contract Start Date\": \"contract_start_date\",\r\n                    \"Contract End Date\": \"contract_end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(83, 6, 'da', '{contract_subject} kontrakt oprettet for {contract_client} af {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Contract Name\": \"contract_subject\",\r\n                    \"Client Name\": \"contract_client\",\r\n                    \"Contract Price\": \"contract_value\",\r\n                    \"Contract Start Date\": \"contract_start_date\",\r\n                    \"Contract End Date\": \"contract_end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(84, 6, 'de', '{contract_subject} Vertrag erstellt für {contract_client} von {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Contract Name\": \"contract_subject\",\r\n                    \"Client Name\": \"contract_client\",\r\n                    \"Contract Price\": \"contract_value\",\r\n                    \"Contract Start Date\": \"contract_start_date\",\r\n                    \"Contract End Date\": \"contract_end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(85, 6, 'en', '{contract_subject} contract created for {contract_client} by {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Contract Name\": \"contract_subject\",\r\n                    \"Client Name\": \"contract_client\",\r\n                    \"Contract Price\": \"contract_value\",\r\n                    \"Contract Start Date\": \"contract_start_date\",\r\n                    \"Contract End Date\": \"contract_end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(86, 6, 'es', '{contract_subject} contrato creado para {contract_client} por {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Contract Name\": \"contract_subject\",\r\n                    \"Client Name\": \"contract_client\",\r\n                    \"Contract Price\": \"contract_value\",\r\n                    \"Contract Start Date\": \"contract_start_date\",\r\n                    \"Contract End Date\": \"contract_end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(87, 6, 'fr', 'Contrat {contract_subject} créé pour {contract_client} par {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Contract Name\": \"contract_subject\",\r\n                    \"Client Name\": \"contract_client\",\r\n                    \"Contract Price\": \"contract_value\",\r\n                    \"Contract Start Date\": \"contract_start_date\",\r\n                    \"Contract End Date\": \"contract_end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(88, 6, 'he', '{contract_subject} חוזה שנוצר עבור {contract_client} על-ידי {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Contract Name\": \"contract_subject\",\r\n                    \"Client Name\": \"contract_client\",\r\n                    \"Contract Price\": \"contract_value\",\r\n                    \"Contract Start Date\": \"contract_start_date\",\r\n                    \"Contract End Date\": \"contract_end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(89, 6, 'it', 'Contratto {contract_subject} creato per {contract_client} da {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Contract Name\": \"contract_subject\",\r\n                    \"Client Name\": \"contract_client\",\r\n                    \"Contract Price\": \"contract_value\",\r\n                    \"Contract Start Date\": \"contract_start_date\",\r\n                    \"Contract End Date\": \"contract_end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(90, 6, 'ja', '{user_name} によって {contract_client} のために作成された {contract_subject} 契約', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Contract Name\": \"contract_subject\",\r\n                    \"Client Name\": \"contract_client\",\r\n                    \"Contract Price\": \"contract_value\",\r\n                    \"Contract Start Date\": \"contract_start_date\",\r\n                    \"Contract End Date\": \"contract_end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(91, 6, 'nl', '{contract_subject} contract gemaakt voor {contract_client} door {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Contract Name\": \"contract_subject\",\r\n                    \"Client Name\": \"contract_client\",\r\n                    \"Contract Price\": \"contract_value\",\r\n                    \"Contract Start Date\": \"contract_start_date\",\r\n                    \"Contract End Date\": \"contract_end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(92, 6, 'pl', 'Umowa {contract_subject} utworzona dla {contract_client} przez {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Contract Name\": \"contract_subject\",\r\n                    \"Client Name\": \"contract_client\",\r\n                    \"Contract Price\": \"contract_value\",\r\n                    \"Contract Start Date\": \"contract_start_date\",\r\n                    \"Contract End Date\": \"contract_end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(93, 6, 'ru', 'Контракт {contract_subject} создан для {contract_client} пользователем {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Contract Name\": \"contract_subject\",\r\n                    \"Client Name\": \"contract_client\",\r\n                    \"Contract Price\": \"contract_value\",\r\n                    \"Contract Start Date\": \"contract_start_date\",\r\n                    \"Contract End Date\": \"contract_end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(94, 6, 'pt', 'Contrato {contract_subject} criado para {contract_client} por {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Contract Name\": \"contract_subject\",\r\n                    \"Client Name\": \"contract_client\",\r\n                    \"Contract Price\": \"contract_value\",\r\n                    \"Contract Start Date\": \"contract_start_date\",\r\n                    \"Contract End Date\": \"contract_end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(95, 6, 'tr', '{ user_name } tarafından { contract_client } için { contract_subject } sözleşmesi oluşturuldu', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Contract Name\": \"contract_subject\",\r\n                    \"Client Name\": \"contract_client\",\r\n                    \"Contract Price\": \"contract_value\",\r\n                    \"Contract Start Date\": \"contract_start_date\",\r\n                    \"Contract End Date\": \"contract_end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(96, 6, 'pt-br', 'Contrato {contract_subject} criado para {contract_client} por {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Contract Name\": \"contract_subject\",\r\n                    \"Client Name\": \"contract_client\",\r\n                    \"Contract Price\": \"contract_value\",\r\n                    \"Contract Start Date\": \"contract_start_date\",\r\n                    \"Contract End Date\": \"contract_end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(97, 7, 'ar', 'تم إنشاء مهمة {task_name} لمشروع {project_name} بواسطة {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(98, 7, 'zh', '{user_name} 为 {project_name} 项目创建 {task_name} 任务', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(99, 7, 'da', '{task_name} opgave oprettet for {project_name}-projekt af {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(100, 7, 'de', 'Aufgabe {task_name} erstellt für Projekt {project_name} von {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(101, 7, 'en', '{task_name} task create for {project_name} project by {user_name}.', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(102, 7, 'es', '{task_name} tarea creada para {project_name} proyecto por {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(103, 7, 'fr', 'Tâche {task_name} créée pour le projet {project_name} par {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(104, 7, 'he', 'המשימה {task_name} יוצרת עבור {project_name} פרויקט על ידי {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(105, 7, 'it', 'Attività {task_name} creata per il progetto {project_name} da {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(106, 7, 'ja', '{user_name} による {project_name} プロジェクトの {task_name} タスク作成', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(107, 7, 'nl', '{task_name} taak gemaakt voor {project_name} project door {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(108, 7, 'pl', 'Zadanie {task_name} utworzono dla projektu {project_name} przez użytkownika {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(109, 7, 'ru', 'Задача {task_name} создана для проекта {project_name} пользователем {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(110, 7, 'pt', 'Tarefa {task_name} criada para o projeto {project_name} por {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(111, 7, 'tr', '{ user_name } tarafından { proje_name } projesi için { task_name } görev oluşturma', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(112, 7, 'pt-br', 'Tarefa {task_name} criada para o projeto {project_name} por {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(113, 8, 'ar', 'تمت إضافة تعليق جديد في المهمة {task_name} للمشروع {project_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(114, 8, 'zh', '项目 {project_name} 的任务 {task_name} 中添加了新注释', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(115, 8, 'da', 'Ny kommentar tilføjet til opgave {task_name} i projekt {project_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(116, 8, 'de', 'Neuer Kommentar in Aufgabe {task_name} von Projekt {project_name} hinzugefügt', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(117, 8, 'en', 'New Comment added in task {task_name} of project {project_name}.', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(118, 8, 'es', 'Nuevo comentario agregado en la tarea {task_name} del proyecto {project_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(119, 8, 'fr', 'Nouveau commentaire ajouté dans la tâche {task_name} du projet {project_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(120, 8, 'he', 'הערה חדשה נוספה במשימה {task_name} של הפרויקט {project_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(121, 8, 'it', 'Nuovo commento aggiunto nell\'attività {task_name} del progetto {project_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(122, 8, 'ja', 'プロジェクト {project_name} のタスク {task_name} に新しいコメントが追加されました', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(123, 8, 'nl', 'Nieuwe opmerking toegevoegd in taak {task_name} van project {project_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(124, 8, 'pl', 'Dodano nowy komentarz w zadaniu {task_name} projektu {project_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(125, 8, 'ru', 'Новый комментарий добавлен в задачу {task_name} проекта {project_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(126, 8, 'pt', 'Novo comentário adicionado na tarefa {task_name} do projeto {project_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(127, 8, 'tr', '{ project_name } projesinin { task_name } görevine yeni bir yorum eklendi', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(128, 8, 'pt-br', 'Novo comentário adicionado na tarefa {task_name} do projeto {project_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Task Name\": \"task_name\",\r\n                    \"Project Name\": \"project_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(129, 9, 'ar', 'تم إنشاء قسيمة دفع جديدة بتاريخ {year}', '{\r\n                    \"Year\": \"year\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(130, 9, 'zh', '{ y年内} 生成的新 payslip', '{\r\n                    \"Year\": \"year\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(131, 9, 'da', 'Ny lønseddel genereret af {year}', '{\r\n                    \"Year\": \"year\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(132, 9, 'de', 'Neue Gehaltsabrechnung erstellt vom {year}', '{\r\n                    \"Year\": \"year\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(133, 9, 'en', 'New payslip generated of {year}', '{\r\n                    \"Year\": \"year\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(134, 9, 'es', 'Nueva nómina generada de {year}', '{\r\n                    \"Year\": \"year\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(135, 9, 'fr', 'Nouvelle fiche de paie générée de {year}', '{\r\n                    \"Year\": \"year\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(136, 9, 'he', 'תשלום חדש שהופק מ - {year}', '{\r\n                    \"Year\": \"year\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(137, 9, 'it', 'Nuova busta paga generata di {year}', '{\r\n                    \"Year\": \"year\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(138, 9, 'ja', '{year} の新しい給​​与明細が作成されました', '{\r\n                    \"Year\": \"year\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(139, 9, 'nl', 'Nieuwe loonstrook gegenereerd van {year}', '{\r\n                    \"Year\": \"year\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(140, 9, 'pl', 'Nowy odcinek wypłaty wygenerowany za {year}', '{\r\n                    \"Year\": \"year\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(141, 9, 'ru', 'Новая расчетная ведомость создана за {year}', '{\r\n                    \"Year\": \"year\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(142, 9, 'pt', 'Novo contracheque gerado de {year}', '{\r\n                    \"Year\": \"year\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(143, 9, 'tr', '{ year } tarafından oluşturulan yeni payslip', '{\r\n                    \"Year\": \"year\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(144, 9, 'pt-br', 'Novo contracheque gerado de {year}', '{\r\n                    \"Year\": \"year\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(145, 10, 'ar', 'تم إنشاء إعلان {calling_title} للفرع {Branch_name} من {start_date} إلى {end_date}', '{\r\n                    \"Announcement Title\": \"announcement_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Start Date\": \"start_date\",\r\n                    \"End Date\": \"end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(146, 10, 'zh', '已为分支 {branch_name} 从 {start_date} 到 {end_date} 创建 {announcement_title} 声明', '{\r\n                    \"Announcement Title\": \"announcement_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Start Date\": \"start_date\",\r\n                    \"End Date\": \"end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(147, 10, 'da', '{announcement_title}-meddelelse oprettet for filial {branch_name} fra {start_date} til {end_date}', '{\r\n                    \"Announcement Title\": \"announcement_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Start Date\": \"start_date\",\r\n                    \"End Date\": \"end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(148, 10, 'de', '{announcement_title}-Ankündigung erstellt für Branche {branch_name} von {start_date} bis {end_date}', '{\r\n                    \"Announcement Title\": \"announcement_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Start Date\": \"start_date\",\r\n                    \"End Date\": \"end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(149, 10, 'en', '{announcement_title} announcement created for branch {branch_name} from {start_date} to {end_date}.', '{\r\n                    \"Announcement Title\": \"announcement_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Start Date\": \"start_date\",\r\n                    \"End Date\": \"end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59');
INSERT INTO `notification_template_langs` (`id`, `parent_id`, `lang`, `content`, `variables`, `created_by`, `created_at`, `updated_at`) VALUES
(150, 10, 'es', 'Anuncio {announcement_title} creado para la sucursal {branch_name} desde el {start_date} hasta el {end_date}', '{\r\n                    \"Announcement Title\": \"announcement_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Start Date\": \"start_date\",\r\n                    \"End Date\": \"end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(151, 10, 'fr', '{announcement_title} annonce créée pour la succursale {branch_name} du {start_date} au {end_date}', '{\r\n                    \"Announcement Title\": \"announcement_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Start Date\": \"start_date\",\r\n                    \"End Date\": \"end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(152, 10, 'he', '{להכריז על הכרזה שנוצרה עבור ענף {מיתוג} מ - {start_date} ל - {end_date}', '{\r\n                    \"Announcement Title\": \"announcement_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Start Date\": \"start_date\",\r\n                    \"End Date\": \"end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(153, 10, 'it', '{announcement_title} annuncio creato per la filiale {branch_name} dal {start_date} al {end_date}', '{\r\n                    \"Announcement Title\": \"announcement_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Start Date\": \"start_date\",\r\n                    \"End Date\": \"end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(154, 10, 'ja', '{announcement_title} ブランチ {branch_name} の {start_date} から {end_date} までのお知らせが作成されました', '{\r\n                    \"Announcement Title\": \"announcement_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Start Date\": \"start_date\",\r\n                    \"End Date\": \"end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(155, 10, 'nl', '{announcement_title} aankondiging gemaakt voor filiaal {branch_name} van {start_date} tot {end_date}', '{\r\n                    \"Announcement Title\": \"announcement_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Start Date\": \"start_date\",\r\n                    \"End Date\": \"end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(156, 10, 'pl', 'Ogłoszenie {announcement_title} utworzone dla oddziału {branch_name} od {start_date} do {end_date}', '{\r\n                    \"Announcement Title\": \"announcement_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Start Date\": \"start_date\",\r\n                    \"End Date\": \"end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(157, 10, 'ru', 'Объявление {announcement_title} создано для филиала {branch_name} с {start_date} по {end_date}', '{\r\n                    \"Announcement Title\": \"announcement_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Start Date\": \"start_date\",\r\n                    \"End Date\": \"end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(158, 10, 'pt', 'Anúncio de {announcement_title} criado para a filial {branch_name} de {start_date} a {end_date}', '{\r\n                    \"Announcement Title\": \"announcement_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Start Date\": \"start_date\",\r\n                    \"End Date\": \"end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(159, 10, 'tr', '{ branch_name } dalı için { start_date }-{ end_date } tarihleri arasında { announcement_title } duyurusu oluşturuldu', '{\r\n                    \"Announcement Title\": \"announcement_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Start Date\": \"start_date\",\r\n                    \"End Date\": \"end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(160, 10, 'pt-br', 'Anúncio de {announcement_title} criado para a filial {branch_name} de {start_date} a {end_date}', '{\r\n                    \"Announcement Title\": \"announcement_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Start Date\": \"start_date\",\r\n                    \"End Date\": \"end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(161, 11, 'ar', 'تم إنشاء بطاقة دعم جديدة ذات أولوية {support_priority} لـ {support_user_name}', '{\r\n                    \"Support Priority\": \"support_priority\",\r\n                    \"Support User Name\": \"support_user_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(162, 11, 'zh', '为 {support_user_name} 创建了 { support_priority} 优先级的新支持凭单', '{\r\n                    \"Support Priority\": \"support_priority\",\r\n                    \"Support User Name\": \"support_user_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(163, 11, 'da', 'Ny supportbillet oprettet med prioritet {support_priority} til {support_user_name}', '{\r\n                    \"Support Priority\": \"support_priority\",\r\n                    \"Support User Name\": \"support_user_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(164, 11, 'de', 'Neues Support-Ticket mit Priorität {support_priority} für {support_user_name} erstellt', '{\r\n                    \"Support Priority\": \"support_priority\",\r\n                    \"Support User Name\": \"support_user_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(165, 11, 'en', 'New Support ticket created of {support_priority} priority for {support_user_name}', '{\r\n                    \"Support Priority\": \"support_priority\",\r\n                    \"Support User Name\": \"support_user_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(166, 11, 'es', 'Nuevo ticket de soporte creado con prioridad {support_priority} para {support_user_name}', '{\r\n                    \"Support Priority\": \"support_priority\",\r\n                    \"Support User Name\": \"support_user_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(167, 11, 'fr', 'Nouveau ticket d\'assistance créé avec la priorité {support_priority} pour {support_user_name}', '{\r\n                    \"Support Priority\": \"support_priority\",\r\n                    \"Support User Name\": \"support_user_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(168, 11, 'he', 'כרטיס תמיכה חדש שנוצר עבור קדימות {support_priority} עבור {support_user_name}', '{\r\n                    \"Support Priority\": \"support_priority\",\r\n                    \"Support User Name\": \"support_user_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(169, 11, 'it', 'Nuovo ticket di assistenza creato con priorità {support_priority} per {support_user_name}', '{\r\n                    \"Support Priority\": \"support_priority\",\r\n                    \"Support User Name\": \"support_user_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(170, 11, 'ja', '{support_user_name} の優先度 {support_priority} の新しいサポート チケットが作成されました', '{\r\n                    \"Support Priority\": \"support_priority\",\r\n                    \"Support User Name\": \"support_user_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(171, 11, 'nl', 'Nieuw ondersteuningsticket gemaakt met prioriteit {support_priority} voor {support_user_name}', '{\r\n                    \"Support Priority\": \"support_priority\",\r\n                    \"Support User Name\": \"support_user_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(172, 11, 'pl', 'Utworzono nowe zgłoszenie do pomocy technicznej o priorytecie {support_priority} dla użytkownika {support_user_name}', '{\r\n                    \"Support Priority\": \"support_priority\",\r\n                    \"Support User Name\": \"support_user_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(173, 11, 'ru', 'Создан новый запрос в службу поддержки с приоритетом {support_priority} для {support_user_name}', '{\r\n                    \"Support Priority\": \"support_priority\",\r\n                    \"Support User Name\": \"support_user_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(174, 11, 'pt', 'Novo tíquete de suporte criado com prioridade {support_priority} para {support_user_name}', '{\r\n                    \"Support Priority\": \"support_priority\",\r\n                    \"Support User Name\": \"support_user_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(175, 11, 'tr', '{ support_user_name } için { support_priority } önceliğine ilişkin yeni Destek bileti oluşturuldu', '{\r\n                    \"Support Priority\": \"support_priority\",\r\n                    \"Support User Name\": \"support_user_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(176, 11, 'pt-br', 'Novo tíquete de suporte criado com prioridade {support_priority} para {support_user_name}', '{\r\n                    \"Support Priority\": \"support_priority\",\r\n                    \"Support User Name\": \"support_user_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(177, 12, 'ar', 'تم إنشاء اجتماع {meeting_title} للفرع {Branch_name} من {meeting_date} في {meeting_time}', '{\r\n                    \"Meeting Title\": \"meeting_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Meeting Date\": \"meeting_date\",\r\n                    \"Meeting Time\": \"meeting_time\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(178, 12, 'zh', '已从 { meeting_time} 为分支 {branch_name} 创建了 { meetting_title } 会议 { meeting_date}', '{\r\n                    \"Meeting Title\": \"meeting_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Meeting Date\": \"meeting_date\",\r\n                    \"Meeting Time\": \"meeting_time\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(179, 12, 'da', '{meeting_title} møde oprettet for filial {branch_name} fra {meeting_date} kl. {meeting_time}', '{\r\n                    \"Meeting Title\": \"meeting_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Meeting Date\": \"meeting_date\",\r\n                    \"Meeting Time\": \"meeting_time\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(180, 12, 'de', '{meeting_title}-Meeting für Zweigstelle {branch_name} vom {meeting_date} um {meeting_time} erstellt', '{\r\n                    \"Meeting Title\": \"meeting_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Meeting Date\": \"meeting_date\",\r\n                    \"Meeting Time\": \"meeting_time\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(181, 12, 'en', '{meeting_title} meeting created for branch {branch_name} from {meeting_date} at {meeting_time}.', '{\r\n                    \"Meeting Title\": \"meeting_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Meeting Date\": \"meeting_date\",\r\n                    \"Meeting Time\": \"meeting_time\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(182, 12, 'es', '{meeting_title} reunión creada para la sucursal {branch_name} de {meeting_date} a las {meeting_time}', '{\r\n                    \"Meeting Title\": \"meeting_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Meeting Date\": \"meeting_date\",\r\n                    \"Meeting Time\": \"meeting_time\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(183, 12, 'fr', 'Réunion {meeting_title} créée pour la succursale {branch_name} à partir du {meeting_date} à {meeting_time}', '{\r\n                    \"Meeting Title\": \"meeting_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Meeting Date\": \"meeting_date\",\r\n                    \"Meeting Time\": \"meeting_time\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(184, 12, 'he', '{meeting_title} פגישה שנוצרה עבור ענף {מיתוג} מתוך {meeting_date} ב - {meeting_time}', '{\r\n                    \"Meeting Title\": \"meeting_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Meeting Date\": \"meeting_date\",\r\n                    \"Meeting Time\": \"meeting_time\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(185, 12, 'it', 'Meeting {meeting_title} creato per la filiale {branch_name} da {meeting_date} alle {meeting_time}', '{\r\n                    \"Meeting Title\": \"meeting_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Meeting Date\": \"meeting_date\",\r\n                    \"Meeting Time\": \"meeting_time\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(186, 12, 'ja', '{meeting_date} から {meeting_time} に {meeting_title} ブランチ {branch_name} 用に作成された {meeting_title} ミーティング', '{\r\n                    \"Meeting Title\": \"meeting_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Meeting Date\": \"meeting_date\",\r\n                    \"Meeting Time\": \"meeting_time\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(187, 12, 'nl', '{meeting_title} vergadering gemaakt voor filiaal {branch_name} vanaf {meeting_date} om {meeting_time}', '{\r\n                    \"Meeting Title\": \"meeting_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Meeting Date\": \"meeting_date\",\r\n                    \"Meeting Time\": \"meeting_time\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(188, 12, 'pl', 'Spotkanie {meeting_title} utworzone dla oddziału {branch_name} od {meeting_date} o {meeting_time}', '{\r\n                    \"Meeting Title\": \"meeting_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Meeting Date\": \"meeting_date\",\r\n                    \"Meeting Time\": \"meeting_time\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(189, 12, 'ru', 'Встреча {meeting_title} создана для филиала {branch_name} с {meeting_date} в {meeting_time}', '{\r\n                    \"Meeting Title\": \"meeting_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Meeting Date\": \"meeting_date\",\r\n                    \"Meeting Time\": \"meeting_time\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(190, 12, 'pt', 'Reunião {meeting_title} criada para a filial {branch_name} de {meeting_date} às {meeting_time}', '{\r\n                    \"Meeting Title\": \"meeting_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Meeting Date\": \"meeting_date\",\r\n                    \"Meeting Time\": \"meeting_time\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(191, 12, 'tr', '{ meeting_title } { branch_name } dalı için { meeting_date } dalından { meeting_time } saatinde oluşturulan toplantı oluşturuldu', '{\r\n                    \"Meeting Title\": \"meeting_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Meeting Date\": \"meeting_date\",\r\n                    \"Meeting Time\": \"meeting_time\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(192, 12, 'pt-br', 'Reunião {meeting_title} criada para a filial {branch_name} de {meeting_date} às {meeting_time}', '{\r\n                    \"Meeting Title\": \"meeting_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Meeting Date\": \"meeting_date\",\r\n                    \"Meeting Time\": \"meeting_time\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(193, 13, 'ar', 'تم إنشاء {Award_name} لـ {Employee_name} من {Award_date}', '{\r\n                    \"Award Name\": \"award_name\",\r\n                    \"Employee Name\": \"employee_name\",\r\n                    \"Award Date\": \"award_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(194, 13, 'zh', '已从 {award_date} 为 {employe_name} 创建 {award_name}', '{\r\n                    \"Award Name\": \"award_name\",\r\n                    \"Employee Name\": \"employee_name\",\r\n                    \"Award Date\": \"award_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(195, 13, 'da', '{award_name} oprettet til {employee_name} fra {award_date}', '{\r\n                    \"Award Name\": \"award_name\",\r\n                    \"Employee Name\": \"employee_name\",\r\n                    \"Award Date\": \"award_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(196, 13, 'de', '{award_name} erstellt für {employee_name} vom {award_date}', '{\r\n                    \"Award Name\": \"award_name\",\r\n                    \"Employee Name\": \"employee_name\",\r\n                    \"Award Date\": \"award_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(197, 13, 'en', '{award_name} created for {employee_name} from {award_date}', '{\r\n                    \"Award Name\": \"award_name\",\r\n                    \"Employee Name\": \"employee_name\",\r\n                    \"Award Date\": \"award_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(198, 13, 'es', '{award_name} creado para {employee_name} de {award_date}', '{\r\n                    \"Award Name\": \"award_name\",\r\n                    \"Employee Name\": \"employee_name\",\r\n                    \"Award Date\": \"award_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(199, 13, 'fr', '{award_name} créé pour {employee_name} à partir du {award_date}', '{\r\n                    \"Award Name\": \"award_name\",\r\n                    \"Employee Name\": \"employee_name\",\r\n                    \"Award Date\": \"award_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(200, 13, 'he', '{award_name} שנוצר עבור {העובד ee_name} מ - {award_date}', '{\r\n                    \"Award Name\": \"award_name\",\r\n                    \"Employee Name\": \"employee_name\",\r\n                    \"Award Date\": \"award_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(201, 13, 'it', '{award_name} creato per {employee_name} da {award_date}', '{\r\n                    \"Award Name\": \"award_name\",\r\n                    \"Employee Name\": \"employee_name\",\r\n                    \"Award Date\": \"award_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(202, 13, 'ja', '{employee_name} のために {award_name} が {award_date} から作成されました', '{\r\n                    \"Award Name\": \"award_name\",\r\n                    \"Employee Name\": \"employee_name\",\r\n                    \"Award Date\": \"award_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(203, 13, 'nl', '{award_name} gemaakt voor {employee_name} vanaf {award_date}', '{\r\n                    \"Award Name\": \"award_name\",\r\n                    \"Employee Name\": \"employee_name\",\r\n                    \"Award Date\": \"award_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(204, 13, 'pl', '{award_name} utworzone dla {employee_name} od {award_date}', '{\r\n                    \"Award Name\": \"award_name\",\r\n                    \"Employee Name\": \"employee_name\",\r\n                    \"Award Date\": \"award_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(205, 13, 'ru', '{award_name} создано для {employee_name} с {award_date}', '{\r\n                    \"Award Name\": \"award_name\",\r\n                    \"Employee Name\": \"employee_name\",\r\n                    \"Award Date\": \"award_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(206, 13, 'pt', '{award_name} criado para {employee_name} de {award_date}', '{\r\n                    \"Award Name\": \"award_name\",\r\n                    \"Employee Name\": \"employee_name\",\r\n                    \"Award Date\": \"award_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(207, 13, 'tr', '{ employee_name } için { award_date } içinden { award_name } oluşturuldu', '{\r\n                    \"Award Name\": \"award_name\",\r\n                    \"Employee Name\": \"employee_name\",\r\n                    \"Award Date\": \"award_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(208, 13, 'pt-br', '{award_name} criado para {employee_name} de {award_date}', '{\r\n                    \"Award Name\": \"award_name\",\r\n                    \"Employee Name\": \"employee_name\",\r\n                    \"Award Date\": \"award_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(209, 14, 'ar', '{holiday_title} عطلة يوم {holiday_date}', '{\r\n                    \"Holiday Title\": \"holiday_title\",\r\n                    \"Holiday Date\": \"holiday_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(210, 14, 'zh', '{holiday_date} 上的 {holiday_title} 假日', '{\r\n                    \"Holiday Title\": \"holiday_title\",\r\n                    \"Holiday Date\": \"holiday_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(211, 14, 'da', '{holiday_title} helligdag på {holiday_date}', '{\r\n                    \"Holiday Title\": \"holiday_title\",\r\n                    \"Holiday Date\": \"holiday_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(212, 14, 'de', '{holiday_title} Feiertag am {holiday_date}', '{\r\n                    \"Holiday Title\": \"holiday_title\",\r\n                    \"Holiday Date\": \"holiday_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(213, 14, 'en', '{holiday_title} holiday on {holiday_date}', '{\r\n                    \"Holiday Title\": \"holiday_title\",\r\n                    \"Holiday Date\": \"holiday_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(214, 14, 'es', '{holiday_title} feriado el {holiday_date}', '{\r\n                    \"Holiday Title\": \"holiday_title\",\r\n                    \"Holiday Date\": \"holiday_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(215, 14, 'fr', '{holiday_title} vacances le {holiday_date}', '{\r\n                    \"Holiday Title\": \"holiday_title\",\r\n                    \"Holiday Date\": \"holiday_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(216, 14, 'he', '{הולידיי _title} חגים ב - {הולידיי _date}', '{\r\n                    \"Holiday Title\": \"holiday_title\",\r\n                    \"Holiday Date\": \"holiday_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(217, 14, 'it', '{holiday_title} festività il giorno {holiday_date}', '{\r\n                    \"Holiday Title\": \"holiday_title\",\r\n                    \"Holiday Date\": \"holiday_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(218, 14, 'ja', '{holiday_date} の {holiday_title} 休日', '{\r\n                    \"Holiday Title\": \"holiday_title\",\r\n                    \"Holiday Date\": \"holiday_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(219, 14, 'nl', '{holiday_title} vakantie op {holiday_date}', '{\r\n                    \"Holiday Title\": \"holiday_title\",\r\n                    \"Holiday Date\": \"holiday_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(220, 14, 'pl', '{holiday_title} wakacje w dniu {holiday_date}', '{\r\n                    \"Holiday Title\": \"holiday_title\",\r\n                    \"Holiday Date\": \"holiday_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(221, 14, 'ru', '{holiday_title} праздник {holiday_date}', '{\r\n                    \"Holiday Title\": \"holiday_title\",\r\n                    \"Holiday Date\": \"holiday_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(222, 14, 'pt', '{holiday_title} feriado em {holiday_date}', '{\r\n                    \"Holiday Title\": \"holiday_title\",\r\n                    \"Holiday Date\": \"holiday_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(223, 14, 'tr', '{ holiday_date } tarihinde ({ holiday_date })', '{\r\n                    \"Holiday Title\": \"holiday_title\",\r\n                    \"Holiday Date\": \"holiday_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(224, 14, 'pt-br', '{holiday_title} feriado em {holiday_date}', '{\r\n                    \"Holiday Title\": \"holiday_title\",\r\n                    \"Holiday Date\": \"holiday_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(225, 15, 'ar', 'تم إنشاء حدث {event_title} للفرع {Branch_name} من {event_start_date} إلى {event_end_date}', '{\r\n                    \"Event Title\": \"event_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Event Start Date\": \"event_start_date\",\r\n                    \"Event End Date\": \"event_end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(226, 15, 'zh', '为分支 {branch_name} 从 {event_start_date} 创建的 {event_title } 事件为 {event_end_date}', '{\r\n                    \"Event Title\": \"event_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Event Start Date\": \"event_start_date\",\r\n                    \"Event End Date\": \"event_end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(227, 15, 'da', '{event_title}-begivenhed oprettet for grenen {branch_name} fra {event_start_date} til {event_end_date}', '{\r\n                    \"Event Title\": \"event_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Event Start Date\": \"event_start_date\",\r\n                    \"Event End Date\": \"event_end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(228, 15, 'de', '{event_title} Veranstaltung erstellt für Branche {branch_name} von {event_start_date} bis {event_end_date}', '{\r\n                    \"Event Title\": \"event_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Event Start Date\": \"event_start_date\",\r\n                    \"Event End Date\": \"event_end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(229, 15, 'en', '{event_title} event created for branch {branch_name} from {event_start_date} to {event_end_date}', '{\r\n                    \"Event Title\": \"event_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Event Start Date\": \"event_start_date\",\r\n                    \"Event End Date\": \"event_end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(230, 15, 'es', '{event_title} evento creado para la sucursal {branch_name} desde el {event_start_date} hasta el {event_end_date}', '{\r\n                    \"Event Title\": \"event_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Event Start Date\": \"event_start_date\",\r\n                    \"Event End Date\": \"event_end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(231, 15, 'fr', 'Événement {event_title} créé pour la succursale {branch_name} du {event_start_date} au {event_end_date}', '{\r\n                    \"Event Title\": \"event_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Event Start Date\": \"event_start_date\",\r\n                    \"Event End Date\": \"event_end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(232, 15, 'he', '{event_title} אירוע שנוצר עבור ענף {ברנch_name} מ - {event_start_date} אל {event_end_date}', '{\r\n                    \"Event Title\": \"event_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Event Start Date\": \"event_start_date\",\r\n                    \"Event End Date\": \"event_end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(233, 15, 'it', 'Evento {event_title} creato per il ramo {branch_name} da {event_start_date} a {event_end_date}', '{\r\n                    \"Event Title\": \"event_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Event Start Date\": \"event_start_date\",\r\n                    \"Event End Date\": \"event_end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(234, 15, 'ja', '{event_title} ブランチ {branch_name} に対して {event_start_date} から {event_end_date} まで作成された {event_title} イベント', '{\r\n                    \"Event Title\": \"event_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Event Start Date\": \"event_start_date\",\r\n                    \"Event End Date\": \"event_end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(235, 15, 'nl', '{event_title} evenement gemaakt voor filiaal {branch_name} van {event_start_date} tot {event_end_date}', '{\r\n                    \"Event Title\": \"event_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Event Start Date\": \"event_start_date\",\r\n                    \"Event End Date\": \"event_end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(236, 15, 'pl', 'Wydarzenie {event_title} utworzone dla oddziału {branch_name} od {event_start_date} do {event_end_date}', '{\r\n                    \"Event Title\": \"event_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Event Start Date\": \"event_start_date\",\r\n                    \"Event End Date\": \"event_end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(237, 15, 'ru', 'Событие {event_title} создано для филиала {branch_name} с {event_start_date} по {event_end_date}', '{\r\n                    \"Event Title\": \"event_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Event Start Date\": \"event_start_date\",\r\n                    \"Event End Date\": \"event_end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(238, 15, 'pt', 'Evento {event_title} criado para a ramificação {branch_name} de {event_start_date} a {event_end_date}', '{\r\n                    \"Event Title\": \"event_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Event Start Date\": \"event_start_date\",\r\n                    \"Event End Date\": \"event_end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(239, 15, 'tr', '{ branch_name } dalı için { event_start_date }-{ event_end_date } tarihleri arasında { event_title } olayı yaratıldı', '{\r\n                    \"Event Title\": \"event_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Event Start Date\": \"event_start_date\",\r\n                    \"Event End Date\": \"event_end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(240, 15, 'pt-br', 'Evento {event_title} criado para a ramificação {branch_name} de {event_start_date} a {event_end_date}', '{\r\n                    \"Event Title\": \"event_title\",\r\n                    \"Branch Name\": \"branch_name\",\r\n                    \"Event Start Date\": \"event_start_date\",\r\n                    \"Event End Date\": \"event_end_date\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(241, 16, 'ar', 'تم إنشاء سياسة {company_policy_name} لفرع {Branch_name}', '{\r\n                    \"Company Policy Name\": \"company_policy_name\",\r\n                    \"Branch Name\": \"branch_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(242, 16, 'zh', '已创建 {branch_name} 分支的 {company_policy_name} 策略', '{\r\n                    \"Company Policy Name\": \"company_policy_name\",\r\n                    \"Branch Name\": \"branch_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(243, 16, 'da', '{company_policy_name}-politik for filialen {branch_name} er oprettet', '{\r\n                    \"Company Policy Name\": \"company_policy_name\",\r\n                    \"Branch Name\": \"branch_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(244, 16, 'de', 'Richtlinie {company_policy_name} für Zweigstelle {branch_name} erstellt', '{\r\n                    \"Company Policy Name\": \"company_policy_name\",\r\n                    \"Branch Name\": \"branch_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(245, 16, 'en', '{company_policy_name} policy for {branch_name} branch created', '{\r\n                    \"Company Policy Name\": \"company_policy_name\",\r\n                    \"Branch Name\": \"branch_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(246, 16, 'es', 'Política {company_policy_name} para la sucursal {branch_name} creada', '{\r\n                    \"Company Policy Name\": \"company_policy_name\",\r\n                    \"Branch Name\": \"branch_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(247, 16, 'fr', 'Stratégie {company_policy_name} pour la succursale {branch_name} créée', '{\r\n                    \"Company Policy Name\": \"company_policy_name\",\r\n                    \"Branch Name\": \"branch_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(248, 16, 'he', '{company_policy_name} מדיניות עבור ענף {מיתוג} נוצרה', '{\r\n                    \"Company Policy Name\": \"company_policy_name\",\r\n                    \"Branch Name\": \"branch_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(249, 16, 'it', 'Politica {company_policy_name} per la filiale {branch_name} creata', '{\r\n                    \"Company Policy Name\": \"company_policy_name\",\r\n                    \"Branch Name\": \"branch_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(250, 16, 'ja', '{branch_name} ブランチの {company_policy_name} ポリシーが作成されました', '{\r\n                    \"Company Policy Name\": \"company_policy_name\",\r\n                    \"Branch Name\": \"branch_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(251, 16, 'nl', '{company_policy_name}-beleid voor filiaal {branch_name} gemaakt', '{\r\n                    \"Company Policy Name\": \"company_policy_name\",\r\n                    \"Branch Name\": \"branch_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(252, 16, 'pl', 'Polityka {company_policy_name} dla oddziału {branch_name} została utworzona', '{\r\n                    \"Company Policy Name\": \"company_policy_name\",\r\n                    \"Branch Name\": \"branch_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(253, 16, 'ru', 'Создана политика {company_policy_name} для филиала {branch_name}', '{\r\n                    \"Company Policy Name\": \"company_policy_name\",\r\n                    \"Branch Name\": \"branch_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(254, 16, 'pt', 'política {company_policy_name} para a filial {branch_name} criada', '{\r\n                    \"Company Policy Name\": \"company_policy_name\",\r\n                    \"Branch Name\": \"branch_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(255, 16, 'tr', '{ branch_name } şubesi için { company_policy_name } ilkesi oluşturuldu', '{\r\n                    \"Company Policy Name\": \"company_policy_name\",\r\n                    \"Branch Name\": \"branch_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(256, 16, 'pt-br', 'política {company_policy_name} para a filial {branch_name} criada', '{\r\n                    \"Company Policy Name\": \"company_policy_name\",\r\n                    \"Branch Name\": \"branch_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(257, 17, 'ar', 'تم إنشاء الفاتورة الجديدة {invoice_number} بواسطة {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Invoice Number\": \"invoice_number\",\r\n                    \"Invoice Issue Date\": \"invoice_issue_date\",\r\n                    \"Invoice Due Date\": \"invoice_due_date\",\r\n                    \"Customer Name\": \"customer_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(258, 17, 'zh', '{user_name} 创建的新发票 {invoice_number}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Invoice Number\": \"invoice_number\",\r\n                    \"Invoice Issue Date\": \"invoice_issue_date\",\r\n                    \"Invoice Due Date\": \"invoice_due_date\",\r\n                    \"Customer Name\": \"customer_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(259, 17, 'da', 'Ny faktura {invoice_number} oprettet af {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Invoice Number\": \"invoice_number\",\r\n                    \"Invoice Issue Date\": \"invoice_issue_date\",\r\n                    \"Invoice Due Date\": \"invoice_due_date\",\r\n                    \"Customer Name\": \"customer_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(260, 17, 'de', 'Neue Rechnung {invoice_number} erstellt von {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Invoice Number\": \"invoice_number\",\r\n                    \"Invoice Issue Date\": \"invoice_issue_date\",\r\n                    \"Invoice Due Date\": \"invoice_due_date\",\r\n                    \"Customer Name\": \"customer_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(261, 17, 'en', 'New Invoice {invoice_number} created by {user_name}.', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Invoice Number\": \"invoice_number\",\r\n                    \"Invoice Issue Date\": \"invoice_issue_date\",\r\n                    \"Invoice Due Date\": \"invoice_due_date\",\r\n                    \"Customer Name\": \"customer_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(262, 17, 'es', 'Nueva factura {invoice_number} creada por {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Invoice Number\": \"invoice_number\",\r\n                    \"Invoice Issue Date\": \"invoice_issue_date\",\r\n                    \"Invoice Due Date\": \"invoice_due_date\",\r\n                    \"Customer Name\": \"customer_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(263, 17, 'fr', 'Nouvelle facture {invoice_number} créée par {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Invoice Number\": \"invoice_number\",\r\n                    \"Invoice Issue Date\": \"invoice_issue_date\",\r\n                    \"Invoice Due Date\": \"invoice_due_date\",\r\n                    \"Customer Name\": \"customer_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(264, 17, 'he', 'חשבונית חדשה {invoice_number} נוצרה על-ידי {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Invoice Number\": \"invoice_number\",\r\n                    \"Invoice Issue Date\": \"invoice_issue_date\",\r\n                    \"Invoice Due Date\": \"invoice_due_date\",\r\n                    \"Customer Name\": \"customer_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(265, 17, 'it', 'Nuova fattura {invoice_number} creata da {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Invoice Number\": \"invoice_number\",\r\n                    \"Invoice Issue Date\": \"invoice_issue_date\",\r\n                    \"Invoice Due Date\": \"invoice_due_date\",\r\n                    \"Customer Name\": \"customer_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(266, 17, 'ja', '{user_name} によって作成された新しい請求書 {invoice_number}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Invoice Number\": \"invoice_number\",\r\n                    \"Invoice Issue Date\": \"invoice_issue_date\",\r\n                    \"Invoice Due Date\": \"invoice_due_date\",\r\n                    \"Customer Name\": \"customer_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(267, 17, 'nl', 'Nieuwe factuur {invoice_number} gemaakt door {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Invoice Number\": \"invoice_number\",\r\n                    \"Invoice Issue Date\": \"invoice_issue_date\",\r\n                    \"Invoice Due Date\": \"invoice_due_date\",\r\n                    \"Customer Name\": \"customer_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(268, 17, 'pl', 'Nowa faktura {invoice_number} utworzona przez użytkownika {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Invoice Number\": \"invoice_number\",\r\n                    \"Invoice Issue Date\": \"invoice_issue_date\",\r\n                    \"Invoice Due Date\": \"invoice_due_date\",\r\n                    \"Customer Name\": \"customer_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(269, 17, 'ru', 'Новый счет {invoice_number}, созданный {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Invoice Number\": \"invoice_number\",\r\n                    \"Invoice Issue Date\": \"invoice_issue_date\",\r\n                    \"Invoice Due Date\": \"invoice_due_date\",\r\n                    \"Customer Name\": \"customer_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(270, 17, 'pt', 'Nova fatura {invoice_number} criada por {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Invoice Number\": \"invoice_number\",\r\n                    \"Invoice Issue Date\": \"invoice_issue_date\",\r\n                    \"Invoice Due Date\": \"invoice_due_date\",\r\n                    \"Customer Name\": \"customer_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(271, 17, 'tr', 'Yeni Fatura { invoice_number }, { user_name } tarafından oluşturuldu', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Invoice Number\": \"invoice_number\",\r\n                    \"Invoice Issue Date\": \"invoice_issue_date\",\r\n                    \"Invoice Due Date\": \"invoice_due_date\",\r\n                    \"Customer Name\": \"customer_name\"\r\n                    }', 1, '2024-07-01 11:34:59', '2024-07-01 11:34:59'),
(272, 17, 'pt-br', 'Nova fatura {invoice_number} criada por {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Invoice Number\": \"invoice_number\",\r\n                    \"Invoice Issue Date\": \"invoice_issue_date\",\r\n                    \"Invoice Due Date\": \"invoice_due_date\",\r\n                    \"Customer Name\": \"customer_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(273, 18, 'ar', 'تم إنشاء الفاتورة الجديدة {bill_number} بواسطة {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Bill Number\": \"bill_number\",\r\n                    \"Bill Date\": \"bill_date\",\r\n                    \"Bill Due Date\": \"bill_due_date\",\r\n                    \"Vendor Name\": \"vendor_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(274, 18, 'zh', '{ user_name} 创建的新帐单 {bill_number}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Bill Number\": \"bill_number\",\r\n                    \"Bill Date\": \"bill_date\",\r\n                    \"Bill Due Date\": \"bill_due_date\",\r\n                    \"Vendor Name\": \"vendor_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(275, 18, 'da', 'Ny regning {bill_number} oprettet af {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Bill Number\": \"bill_number\",\r\n                    \"Bill Date\": \"bill_date\",\r\n                    \"Bill Due Date\": \"bill_due_date\",\r\n                    \"Vendor Name\": \"vendor_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(276, 18, 'de', 'Neue Rechnung {bill_number} erstellt von {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Bill Number\": \"bill_number\",\r\n                    \"Bill Date\": \"bill_date\",\r\n                    \"Bill Due Date\": \"bill_due_date\",\r\n                    \"Vendor Name\": \"vendor_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(277, 18, 'en', 'New Bill {bill_number} created by {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Bill Number\": \"bill_number\",\r\n                    \"Bill Date\": \"bill_date\",\r\n                    \"Bill Due Date\": \"bill_due_date\",\r\n                    \"Vendor Name\": \"vendor_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(278, 18, 'es', 'Nueva factura {bill_number} creada por {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Bill Number\": \"bill_number\",\r\n                    \"Bill Date\": \"bill_date\",\r\n                    \"Bill Due Date\": \"bill_due_date\",\r\n                    \"Vendor Name\": \"vendor_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(279, 18, 'fr', 'Nouvelle facture {bill_number} créée par {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Bill Number\": \"bill_number\",\r\n                    \"Bill Date\": \"bill_date\",\r\n                    \"Bill Due Date\": \"bill_due_date\",\r\n                    \"Vendor Name\": \"vendor_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(280, 18, 'he', '{ user_name} 创建的新帐单 {bill_number}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Bill Number\": \"bill_number\",\r\n                    \"Bill Date\": \"bill_date\",\r\n                    \"Bill Due Date\": \"bill_due_date\",\r\n                    \"Vendor Name\": \"vendor_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(281, 18, 'it', 'Nuova fattura {bill_number} creata da {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Bill Number\": \"bill_number\",\r\n                    \"Bill Date\": \"bill_date\",\r\n                    \"Bill Due Date\": \"bill_due_date\",\r\n                    \"Vendor Name\": \"vendor_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(282, 18, 'ja', '{user_name} によって作成された新しい請求書 {bill_number}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Bill Number\": \"bill_number\",\r\n                    \"Bill Date\": \"bill_date\",\r\n                    \"Bill Due Date\": \"bill_due_date\",\r\n                    \"Vendor Name\": \"vendor_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00');
INSERT INTO `notification_template_langs` (`id`, `parent_id`, `lang`, `content`, `variables`, `created_by`, `created_at`, `updated_at`) VALUES
(283, 18, 'nl', 'Nieuwe factuur {bill_number} gemaakt door {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Bill Number\": \"bill_number\",\r\n                    \"Bill Date\": \"bill_date\",\r\n                    \"Bill Due Date\": \"bill_due_date\",\r\n                    \"Vendor Name\": \"vendor_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(284, 18, 'pl', 'Nowy rachunek {bill_number} utworzony przez użytkownika {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Bill Number\": \"bill_number\",\r\n                    \"Bill Date\": \"bill_date\",\r\n                    \"Bill Due Date\": \"bill_due_date\",\r\n                    \"Vendor Name\": \"vendor_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(285, 18, 'ru', 'Новый счет {bill_number}, созданный {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Bill Number\": \"bill_number\",\r\n                    \"Bill Date\": \"bill_date\",\r\n                    \"Bill Due Date\": \"bill_due_date\",\r\n                    \"Vendor Name\": \"vendor_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(286, 18, 'pt', 'Nova fatura {bill_number} criada por {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Bill Number\": \"bill_number\",\r\n                    \"Bill Date\": \"bill_date\",\r\n                    \"Bill Due Date\": \"bill_due_date\",\r\n                    \"Vendor Name\": \"vendor_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(287, 18, 'tr', '{ user_name } tarafından oluşturulan yeni Fatura { bill_number }', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Bill Number\": \"bill_number\",\r\n                    \"Bill Date\": \"bill_date\",\r\n                    \"Bill Due Date\": \"bill_due_date\",\r\n                    \"Vendor Name\": \"vendor_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(288, 18, 'pt-br', 'Nova fatura {bill_number} criada por {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Bill Number\": \"bill_number\",\r\n                    \"Bill Date\": \"bill_date\",\r\n                    \"Bill Due Date\": \"bill_due_date\",\r\n                    \"Vendor Name\": \"vendor_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(289, 19, 'ar', 'تم إنشاء ميزانية {budget_period} البالغة {budget_year} لـ {budget_name}', '{\r\n                    \"Budget Period\": \"budget_period\",\r\n                    \"Budget Year\": \"budget_year\",\r\n                    \"Budget Name\": \"budget_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(290, 19, 'zh', '已为 {budget_name} 创建 {budget_period} 预算 { budget_period }', '{\r\n                    \"Budget Period\": \"budget_period\",\r\n                    \"Budget Year\": \"budget_year\",\r\n                    \"Budget Name\": \"budget_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(291, 19, 'da', '{budget_period} budget på {budget_year} oprettet for {budget_name}', '{\r\n                    \"Budget Period\": \"budget_period\",\r\n                    \"Budget Year\": \"budget_year\",\r\n                    \"Budget Name\": \"budget_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(292, 19, 'de', '{budget_period} Budget von {budget_year} erstellt für {budget_name}', '{\r\n                    \"Budget Period\": \"budget_period\",\r\n                    \"Budget Year\": \"budget_year\",\r\n                    \"Budget Name\": \"budget_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(293, 19, 'en', '{budget_period} budget of {budget_year} created for {budget_name}', '{\r\n                    \"Budget Period\": \"budget_period\",\r\n                    \"Budget Year\": \"budget_year\",\r\n                    \"Budget Name\": \"budget_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(294, 19, 'es', '{budget_period} presupuesto de {budget_year} creado para {budget_name}', '{\r\n                    \"Budget Period\": \"budget_period\",\r\n                    \"Budget Year\": \"budget_year\",\r\n                    \"Budget Name\": \"budget_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(295, 19, 'fr', '{budget_period} budget de {budget_year} créé pour {budget_name}', '{\r\n                    \"Budget Period\": \"budget_period\",\r\n                    \"Budget Year\": \"budget_year\",\r\n                    \"Budget Name\": \"budget_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(296, 19, 'he', '{budget_לתקופת} תקציב של {budget_year} שנוצר עבור {budget_name}', '{\r\n                    \"Budget Period\": \"budget_period\",\r\n                    \"Budget Year\": \"budget_year\",\r\n                    \"Budget Name\": \"budget_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(297, 19, 'it', '{budget_period} budget di {budget_year} creato per {budget_name}', '{\r\n                    \"Budget Period\": \"budget_period\",\r\n                    \"Budget Year\": \"budget_year\",\r\n                    \"Budget Name\": \"budget_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(298, 19, 'ja', '{budget_name} 用に作成された {budget_year} の {budget_period} 予算', '{\r\n                    \"Budget Period\": \"budget_period\",\r\n                    \"Budget Year\": \"budget_year\",\r\n                    \"Budget Name\": \"budget_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(299, 19, 'nl', '{budget_period} budget van {budget_year} gemaakt voor {budget_name}', '{\r\n                    \"Budget Period\": \"budget_period\",\r\n                    \"Budget Year\": \"budget_year\",\r\n                    \"Budget Name\": \"budget_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(300, 19, 'pl', 'Budżet {budget_period} w wysokości {budget_year} został utworzony dla {budget_name}', '{\r\n                    \"Budget Period\": \"budget_period\",\r\n                    \"Budget Year\": \"budget_year\",\r\n                    \"Budget Name\": \"budget_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(301, 19, 'ru', 'Бюджет {budget_period} на {budget_year} создан для {budget_name}', '{\r\n                    \"Budget Period\": \"budget_period\",\r\n                    \"Budget Year\": \"budget_year\",\r\n                    \"Budget Name\": \"budget_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(302, 19, 'pt', 'Orçamento de {budget_period} de {budget_year} criado para {budget_name}', '{\r\n                    \"Budget Period\": \"budget_period\",\r\n                    \"Budget Year\": \"budget_year\",\r\n                    \"Budget Name\": \"budget_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(303, 19, 'tr', '{ budget_year }, { budget_name } için { budget_period } bütçesi oluşturuldu', '{\r\n                    \"Budget Period\": \"budget_period\",\r\n                    \"Budget Year\": \"budget_year\",\r\n                    \"Budget Name\": \"budget_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(304, 19, 'pt-br', 'Orçamento de {budget_period} de {budget_year} criado para {budget_name}', '{\r\n                    \"Budget Period\": \"budget_period\",\r\n                    \"Budget Year\": \"budget_year\",\r\n                    \"Budget Name\": \"budget_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(305, 20, 'ar', 'تم إنشاء الإيرادات الجديدة من {الأرباح_amount} لـ {customer_name} بواسطة {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Revenue Amount\": \"revenue_amount\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Revenue Date\": \"revenue_date\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(306, 20, 'zh', '{user_name} 为 {customer_name} 创建的新收入 { 金额 }', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Revenue Amount\": \"revenue_amount\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Revenue Date\": \"revenue_date\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(307, 20, 'da', 'Ny omsætning på {revenue_amount} oprettet for {customer_name} af {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Revenue Amount\": \"revenue_amount\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Revenue Date\": \"revenue_date\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(308, 20, 'de', 'Neuer Umsatz von {revenue_amount} erstellt für {customer_name} von {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Revenue Amount\": \"revenue_amount\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Revenue Date\": \"revenue_date\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(309, 20, 'en', 'New Revenue of {revenue_amount} created for {customer_name} by {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Revenue Amount\": \"revenue_amount\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Revenue Date\": \"revenue_date\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(310, 20, 'es', 'Nuevos ingresos de {revenue_amount} creados para {customer_name} por {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Revenue Amount\": \"revenue_amount\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Revenue Date\": \"revenue_date\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(311, 20, 'fr', 'Nouveau revenu de {revenue_amount} créé pour {customer_name} par {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Revenue Amount\": \"revenue_amount\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Revenue Date\": \"revenue_date\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(312, 20, 'he', 'הכנסה חדשה של {Revenue_סכום} שנוצרה עבור {customer_name} על-ידי {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Revenue Amount\": \"revenue_amount\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Revenue Date\": \"revenue_date\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(313, 20, 'it', 'Nuove entrate di {revenue_amount} create per {customer_name} da {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Revenue Amount\": \"revenue_amount\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Revenue Date\": \"revenue_date\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(314, 20, 'ja', '{user_name} によって {customer_name} に作成された {revenue_amount} の新しい収入', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Revenue Amount\": \"revenue_amount\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Revenue Date\": \"revenue_date\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(315, 20, 'nl', 'Nieuwe opbrengst van {revenue_amount} gecreëerd voor {customer_name} door {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Revenue Amount\": \"revenue_amount\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Revenue Date\": \"revenue_date\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(316, 20, 'pl', 'Nowy przychód w wysokości {revenue_amount} utworzony dla klienta {customer_name} przez użytkownika {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Revenue Amount\": \"revenue_amount\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Revenue Date\": \"revenue_date\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(317, 20, 'ru', 'Новый доход в размере {revenue_amount} создан для {customer_name} пользователем {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Revenue Amount\": \"revenue_amount\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Revenue Date\": \"revenue_date\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(318, 20, 'pt', 'Nova receita de {revenue_amount} criada para {customer_name} por {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Revenue Amount\": \"revenue_amount\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Revenue Date\": \"revenue_date\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(319, 20, 'tr', '{ user_name } tarafından { customer_name } için yeni { revenue_amount } Geliri oluşturuldu', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Revenue Amount\": \"revenue_amount\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Revenue Date\": \"revenue_date\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(320, 20, 'pt-br', 'Nova receita de {revenue_amount} criada para {customer_name} por {user_name}', '{\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Revenue Amount\": \"revenue_amount\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Revenue Date\": \"revenue_date\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(321, 21, 'ar', 'تم إنشاء دفعة جديدة بقيمة {payment_price} لـ {customer_name} بواسطة {invoice_payment_type}', '{\r\n                    \"Payment Price\": \"payment_price\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Payment Type\": \"invoice_payment_type\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(322, 21, 'zh', '{invoice_payment_type} 为 {customer_name} 创建了新支付 { payment_price}', '{\r\n                    \"Payment Price\": \"payment_price\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Payment Type\": \"invoice_payment_type\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(323, 21, 'da', 'Ny betaling på {payment_price} oprettet for {customer_name} af {invoice_payment_type}', '{\r\n                    \"Payment Price\": \"payment_price\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Payment Type\": \"invoice_payment_type\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(324, 21, 'de', 'Neue Zahlung von {payment_price} erstellt für {customer_name} von {invoice_payment_type}', '{\r\n                    \"Payment Price\": \"payment_price\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Payment Type\": \"invoice_payment_type\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(325, 21, 'en', 'New payment of {payment_price} created for {customer_name} by {invoice_payment_type}', '{\r\n                    \"Payment Price\": \"payment_price\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Payment Type\": \"invoice_payment_type\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(326, 21, 'es', 'Nuevo pago de {payment_price} creado para {customer_name} por {invoice_payment_type}', '{\r\n                    \"Payment Price\": \"payment_price\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Payment Type\": \"invoice_payment_type\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(327, 21, 'fr', 'Nouveau paiement de {payment_price} créé pour {customer_name} par {invoice_payment_type}', '{\r\n                    \"Payment Price\": \"payment_price\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Payment Type\": \"invoice_payment_type\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(328, 21, 'he', 'תשלום חדש של {payment_פרייס} שנוצר עבור {customer_name} על-ידי {invoice_payment_type}', '{\r\n                    \"Payment Price\": \"payment_price\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Payment Type\": \"invoice_payment_type\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(329, 21, 'it', 'Nuovo pagamento di {payment_price} creato per {customer_name} da {invoice_payment_type}', '{\r\n                    \"Payment Price\": \"payment_price\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Payment Type\": \"invoice_payment_type\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(330, 21, 'ja', '{invoice_payment_type} によって {customer_name} のために作成された {payment_price} の新しい支払い', '{\r\n                    \"Payment Price\": \"payment_price\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Payment Type\": \"invoice_payment_type\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(331, 21, 'nl', 'Nieuwe betaling van {payment_price} gemaakt voor {customer_name} door {invoice_payment_type}', '{\r\n                    \"Payment Price\": \"payment_price\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Payment Type\": \"invoice_payment_type\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(332, 21, 'pl', 'Nowa płatność {payment_price} utworzona dla {customer_name} przez {invoice_payment_type}', '{\r\n                    \"Payment Price\": \"payment_price\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Payment Type\": \"invoice_payment_type\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(333, 21, 'ru', 'Создан новый платеж {payment_price} для {customer_name} по {invoice_payment_type}', '{\r\n                    \"Payment Price\": \"payment_price\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Payment Type\": \"invoice_payment_type\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(334, 21, 'pt', 'Novo pagamento de {payment_price} criado para {customer_name} por {invoice_payment_type}', '{\r\n                    \"Payment Price\": \"payment_price\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Payment Type\": \"invoice_payment_type\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(335, 21, 'tr', '{ customer_name } için { invoice_payment_type } tarafından oluşturulan { payment_price } için yeni ödeme', '{\r\n                    \"Payment Price\": \"payment_price\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Payment Type\": \"invoice_payment_type\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(336, 21, 'pt-br', 'Novo pagamento de {payment_price} criado para {customer_name} por {invoice_payment_type}', '{\r\n                    \"Payment Price\": \"payment_price\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Payment Type\": \"invoice_payment_type\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(337, 22, 'ar', 'عميل جديد أنشأه {user_name}', '{\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Customer Email\": \"customer_email\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(338, 22, 'zh', '由 {user_name} 创建的新客户', '{\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Customer Email\": \"customer_email\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(339, 22, 'da', 'Ny kunde oprettet af {user_name}', '{\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Customer Email\": \"customer_email\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(340, 22, 'de', 'Neuer Kunde erstellt von {user_name}', '{\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Customer Email\": \"customer_email\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(341, 22, 'en', 'New Customer created by {user_name}', '{\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Customer Email\": \"customer_email\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(342, 22, 'es', 'Nuevo cliente creado por {user_name}', '{\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Customer Email\": \"customer_email\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(343, 22, 'fr', 'Nouveau client créé par {user_name}', '{\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Customer Email\": \"customer_email\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(344, 22, 'he', 'לקוח חדש נוצר על-ידי {user_name}', '{\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Customer Email\": \"customer_email\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(345, 22, 'it', 'Nuovo cliente creato da {user_name}', '{\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Customer Email\": \"customer_email\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(346, 22, 'ja', '{user_name} によって作成された新しい顧客', '{\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Customer Email\": \"customer_email\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(347, 22, 'nl', 'Nieuwe klant gemaakt door {user_name}', '{\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Customer Email\": \"customer_email\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(348, 22, 'pl', 'Nowy klient utworzony przez {user_name}', '{\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Customer Email\": \"customer_email\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(349, 22, 'ru', 'Новый клиент создан {user_name}', '{\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Customer Email\": \"customer_email\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(350, 22, 'pt', 'Novo cliente criado por {user_name}', '{\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Customer Email\": \"customer_email\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(351, 22, 'tr', '{ user_name } tarafından oluşturulan yeni Müşteri', '{\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Customer Email\": \"customer_email\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(352, 22, 'pt-br', 'Novo cliente criado por {user_name}', '{\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Customer Email\": \"customer_email\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(353, 23, 'ar', 'تم إنشاء بائع جديد بواسطة {user_name}', '{\r\n                    \"Vendor Name\": \"vendor_name\",\r\n                    \"Vendor Email\": \"vendor_email\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(354, 23, 'zh', '{user_name} 创建的新供应商', '{\r\n                    \"Vendor Name\": \"vendor_name\",\r\n                    \"Vendor Email\": \"vendor_email\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(355, 23, 'da', 'Ny leverandør oprettet af {user_name}', '{\r\n                    \"Vendor Name\": \"vendor_name\",\r\n                    \"Vendor Email\": \"vendor_email\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(356, 23, 'de', 'Neuer Anbieter erstellt von {user_name}', '{\r\n                    \"Vendor Name\": \"vendor_name\",\r\n                    \"Vendor Email\": \"vendor_email\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(357, 23, 'en', 'New Vendor created by {user_name}', '{\r\n                    \"Vendor Name\": \"vendor_name\",\r\n                    \"Vendor Email\": \"vendor_email\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(358, 23, 'es', 'Nuevo proveedor creado por {user_name}', '{\r\n                    \"Vendor Name\": \"vendor_name\",\r\n                    \"Vendor Email\": \"vendor_email\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(359, 23, 'fr', 'Nouveau fournisseur créé par {user_name}', '{\r\n                    \"Vendor Name\": \"vendor_name\",\r\n                    \"Vendor Email\": \"vendor_email\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(360, 23, 'he', 'משווק חדש שנוצר על-ידי {user_name}', '{\r\n                    \"Vendor Name\": \"vendor_name\",\r\n                    \"Vendor Email\": \"vendor_email\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(361, 23, 'it', 'Nuovo fornitore creato da {user_name}', '{\r\n                    \"Vendor Name\": \"vendor_name\",\r\n                    \"Vendor Email\": \"vendor_email\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(362, 23, 'ja', '{user_name} によって作成された新しいベンダー', '{\r\n                    \"Vendor Name\": \"vendor_name\",\r\n                    \"Vendor Email\": \"vendor_email\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(363, 23, 'nl', 'Nieuwe leverancier gemaakt door {user_name}', '{\r\n                    \"Vendor Name\": \"vendor_name\",\r\n                    \"Vendor Email\": \"vendor_email\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(364, 23, 'pl', 'Nowy dostawca utworzony przez {user_name}', '{\r\n                    \"Vendor Name\": \"vendor_name\",\r\n                    \"Vendor Email\": \"vendor_email\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(365, 23, 'ru', 'Новый поставщик создан пользователем {user_name}', '{\r\n                    \"Vendor Name\": \"vendor_name\",\r\n                    \"Vendor Email\": \"vendor_email\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(366, 23, 'pt', 'Novo fornecedor criado por {user_name}', '{\r\n                    \"Vendor Name\": \"vendor_name\",\r\n                    \"Vendor Email\": \"vendor_email\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(367, 23, 'tr', '{ user_name } tarafından oluşturulan Yeni Satıcı', '{\r\n                    \"Vendor Name\": \"vendor_name\",\r\n                    \"Vendor Email\": \"vendor_email\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(368, 23, 'pt-br', 'Novo fornecedor criado por {user_name}', '{\r\n                    \"Vendor Name\": \"vendor_name\",\r\n                    \"Vendor Email\": \"vendor_email\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(369, 24, 'ar', 'تم إنشاء اقتراح جديد بواسطة {user_name}', '{\r\n                    \"Proposal Number\": \"proposal_number\",\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Proposal Issue Date\": \"proposal_issue_date\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(370, 24, 'zh', '{user_name} 创建的新建议', '{\r\n                    \"Proposal Number\": \"proposal_number\",\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Proposal Issue Date\": \"proposal_issue_date\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(371, 24, 'da', 'Nyt forslag oprettet af {user_name}', '{\r\n                    \"Proposal Number\": \"proposal_number\",\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Proposal Issue Date\": \"proposal_issue_date\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(372, 24, 'de', 'Neues Angebot erstellt von {user_name}', '{\r\n                    \"Proposal Number\": \"proposal_number\",\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Proposal Issue Date\": \"proposal_issue_date\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(373, 24, 'en', 'New Proposal created by {user_name}', '{\r\n                    \"Proposal Number\": \"proposal_number\",\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Proposal Issue Date\": \"proposal_issue_date\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(374, 24, 'es', 'Nueva propuesta creada por {user_name}', '{\r\n                    \"Proposal Number\": \"proposal_number\",\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Proposal Issue Date\": \"proposal_issue_date\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(375, 24, 'fr', 'Nouvelle proposition créée par {user_name}', '{\r\n                    \"Proposal Number\": \"proposal_number\",\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Proposal Issue Date\": \"proposal_issue_date\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(376, 24, 'he', 'הצעה חדשה שנוצרה על-ידי {user_name}', '{\r\n                    \"Proposal Number\": \"proposal_number\",\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Proposal Issue Date\": \"proposal_issue_date\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(377, 24, 'it', 'Nuova proposta creata da {user_name}', '{\r\n                    \"Proposal Number\": \"proposal_number\",\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Proposal Issue Date\": \"proposal_issue_date\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(378, 24, 'ja', '{user_name} によって作成された新しい提案', '{\r\n                    \"Proposal Number\": \"proposal_number\",\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Proposal Issue Date\": \"proposal_issue_date\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(379, 24, 'nl', 'Nieuw voorstel gemaakt door {user_name}', '{\r\n                    \"Proposal Number\": \"proposal_number\",\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Proposal Issue Date\": \"proposal_issue_date\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(380, 24, 'pl', 'Nowa propozycja utworzona przez użytkownika {user_name}', '{\r\n                    \"Proposal Number\": \"proposal_number\",\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Proposal Issue Date\": \"proposal_issue_date\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(381, 24, 'ru', 'Новое предложение, созданное {user_name}', '{\r\n                    \"Proposal Number\": \"proposal_number\",\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Proposal Issue Date\": \"proposal_issue_date\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(382, 24, 'pt', 'Nova proposta criada por {user_name}', '{\r\n                    \"Proposal Number\": \"proposal_number\",\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Proposal Issue Date\": \"proposal_issue_date\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(383, 24, 'tr', '{ user_name } tarafından oluşturulan Yeni Teklif', '{\r\n                    \"Proposal Number\": \"proposal_number\",\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Proposal Issue Date\": \"proposal_issue_date\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(384, 24, 'pt-br', 'Nova proposta criada por {user_name}', '{\r\n                    \"Proposal Number\": \"proposal_number\",\r\n                    \"Company Name\": \"user_name\",\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Proposal Issue Date\": \"proposal_issue_date\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(385, 25, 'ar', 'تم إنشاء دفعة جديدة بقيمة {payment_amount} لـ {vendor_name} بواسطة {payment_type}', '{\r\n                    \"Payment Amount\": \"payment_amount\",\r\n                    \"Vendor Name\": \"vendor_name\",\r\n                    \"Payment Type\": \"payment_type\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(386, 25, 'zh', '{payment_type} 为 {vendor_name} 创建了新的支付 { payment_金额}', '{\r\n                    \"Payment Amount\": \"payment_amount\",\r\n                    \"Vendor Name\": \"vendor_name\",\r\n                    \"Payment Type\": \"payment_type\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(387, 25, 'da', 'Ny betaling på {payment_amount} oprettet for {vendor_name} af {payment_type}', '{\r\n                    \"Payment Amount\": \"payment_amount\",\r\n                    \"Vendor Name\": \"vendor_name\",\r\n                    \"Payment Type\": \"payment_type\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(388, 25, 'de', 'Neue Zahlung in Höhe von {payment_amount} erstellt für {vendor_name} von {payment_type}', '{\r\n                    \"Payment Amount\": \"payment_amount\",\r\n                    \"Vendor Name\": \"vendor_name\",\r\n                    \"Payment Type\": \"payment_type\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(389, 25, 'en', 'New payment of {payment_amount} created for {vendor_name} by {payment_type}', '{\r\n                    \"Payment Amount\": \"payment_amount\",\r\n                    \"Vendor Name\": \"vendor_name\",\r\n                    \"Payment Type\": \"payment_type\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(390, 25, 'es', 'Nuevo pago de {pago_cantidad} creado para {vendor_name} por {pago_tipo}', '{\r\n                    \"Payment Amount\": \"payment_amount\",\r\n                    \"Vendor Name\": \"vendor_name\",\r\n                    \"Payment Type\": \"payment_type\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(391, 25, 'fr', 'Nouveau paiement de {payment_amount} créé pour {vendor_name} par {payment_type}', '{\r\n                    \"Payment Amount\": \"payment_amount\",\r\n                    \"Vendor Name\": \"vendor_name\",\r\n                    \"Payment Type\": \"payment_type\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(392, 25, 'he', 'תשלום חדש של {payment_מאונט} שנוצר עבור {vendor_name} על-ידי {payment_type}', '{\r\n                    \"Payment Amount\": \"payment_amount\",\r\n                    \"Vendor Name\": \"vendor_name\",\r\n                    \"Payment Type\": \"payment_type\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(393, 25, 'it', 'Nuovo pagamento di {payment_amount} creato per {vendor_name} da {payment_type}', '{\r\n                    \"Payment Amount\": \"payment_amount\",\r\n                    \"Vendor Name\": \"vendor_name\",\r\n                    \"Payment Type\": \"payment_type\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(394, 25, 'ja', '{payment_type} によって {vendor_name} に対して作成された {payment_mount} の新しい支払い', '{\r\n                    \"Payment Amount\": \"payment_amount\",\r\n                    \"Vendor Name\": \"vendor_name\",\r\n                    \"Payment Type\": \"payment_type\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(395, 25, 'nl', 'Nieuwe betaling van {payment_amount} gemaakt voor {vendor_name} door {payment_type}', '{\r\n                    \"Payment Amount\": \"payment_amount\",\r\n                    \"Vendor Name\": \"vendor_name\",\r\n                    \"Payment Type\": \"payment_type\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(396, 25, 'pl', 'Nowa płatność {payment_amount} utworzona dla {vendor_name} przez {payment_type}', '{\r\n                    \"Payment Amount\": \"payment_amount\",\r\n                    \"Vendor Name\": \"vendor_name\",\r\n                    \"Payment Type\": \"payment_type\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(397, 25, 'ru', 'Создан новый платеж {payment_amount} для {vendor_name} по {payment_type}', '{\r\n                    \"Payment Amount\": \"payment_amount\",\r\n                    \"Vendor Name\": \"vendor_name\",\r\n                    \"Payment Type\": \"payment_type\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(398, 25, 'pt', 'Novo pagamento de {payment_amount} criado para {vendor_name} por {payment_type}', '{\r\n                    \"Payment Amount\": \"payment_amount\",\r\n                    \"Vendor Name\": \"vendor_name\",\r\n                    \"Payment Type\": \"payment_type\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(399, 25, 'tr', '{ payment_type } tarafından { vendor_name } için yeni { payment_amount } ödemesi oluşturuldu', '{\r\n                    \"Payment Amount\": \"payment_amount\",\r\n                    \"Vendor Name\": \"vendor_name\",\r\n                    \"Payment Type\": \"payment_type\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(400, 25, 'pt-br', 'Novo pagamento de {payment_amount} criado para {vendor_name} por {payment_type}', '{\r\n                    \"Payment Amount\": \"payment_amount\",\r\n                    \"Vendor Name\": \"vendor_name\",\r\n                    \"Payment Type\": \"payment_type\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(401, 26, 'ar', 'تم إنشاء تذكير دفع جديد لـ {invoice_number} بواسطة {user_name}', '{\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Invoice Number\": \"invoice_number\",\r\n                    \"Company Name\": \"user_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(402, 26, 'zh', '{ user_name} 创建的 { invoice_number} 的新支付提醒', '{\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Invoice Number\": \"invoice_number\",\r\n                    \"Company Name\": \"user_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(403, 26, 'da', 'Ny betalingspåmindelse om {invoice_number} oprettet af {user_name}', '{\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Invoice Number\": \"invoice_number\",\r\n                    \"Company Name\": \"user_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(404, 26, 'de', 'Neue Zahlungserinnerung von {invoice_number} erstellt von {user_name}', '{\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Invoice Number\": \"invoice_number\",\r\n                    \"Company Name\": \"user_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(405, 26, 'en', 'New Payment Reminder of {invoice_number} created by {user_name}', '{\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Invoice Number\": \"invoice_number\",\r\n                    \"Company Name\": \"user_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(406, 26, 'es', 'Nuevo recordatorio de pago de {invoice_number} creado por {user_name}', '{\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Invoice Number\": \"invoice_number\",\r\n                    \"Company Name\": \"user_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(407, 26, 'fr', 'Nouveau rappel de paiement de {invoice_number} créé par {user_name}', '{\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Invoice Number\": \"invoice_number\",\r\n                    \"Company Name\": \"user_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(408, 26, 'he', 'תזכורת חדשה לתשלום עבור {invoice_number} שנוצרה על-ידי {user_name}', '{\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Invoice Number\": \"invoice_number\",\r\n                    \"Company Name\": \"user_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(409, 26, 'it', 'Nuovo sollecito di pagamento di {invoice_number} creato da {user_name}', '{\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Invoice Number\": \"invoice_number\",\r\n                    \"Company Name\": \"user_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(410, 26, 'ja', '{user_name} によって作成された {invoice_number} の新しい支払い通知', '{\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Invoice Number\": \"invoice_number\",\r\n                    \"Company Name\": \"user_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(411, 26, 'nl', 'Nieuwe betalingsherinnering van {invoice_number} gemaakt door {user_name}', '{\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Invoice Number\": \"invoice_number\",\r\n                    \"Company Name\": \"user_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(412, 26, 'pl', 'Nowe przypomnienie o płatności {invoice_number} utworzone przez użytkownika {user_name}', '{\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Invoice Number\": \"invoice_number\",\r\n                    \"Company Name\": \"user_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(413, 26, 'ru', 'Новое напоминание об оплате {invoice_number}, созданное {user_name}', '{\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Invoice Number\": \"invoice_number\",\r\n                    \"Company Name\": \"user_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(414, 26, 'pt', 'Novo lembrete de pagamento de {invoice_number} criado por {user_name}', '{\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Invoice Number\": \"invoice_number\",\r\n                    \"Company Name\": \"user_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(415, 26, 'tr', '{ user_name } tarafından oluşturulan { invoice_number } adlı yeni Ödeme Anımsatıcısı', '{\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Invoice Number\": \"invoice_number\",\r\n                    \"Company Name\": \"user_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00'),
(416, 26, 'pt-br', 'Novo lembrete de pagamento de {invoice_number} criado por {user_name}', '{\r\n                    \"Customer Name\": \"customer_name\",\r\n                    \"Invoice Number\": \"invoice_number\",\r\n                    \"Company Name\": \"user_name\"\r\n                    }', 1, '2024-07-01 11:35:00', '2024-07-01 11:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_number` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_exp_month` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_exp_year` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_id` int NOT NULL,
  `price` double(8,2) NOT NULL,
  `price_currency` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `txn_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Manually',
  `receipt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_order_id_unique` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `other_payments`
--

DROP TABLE IF EXISTS `other_payments`;
CREATE TABLE IF NOT EXISTS `other_payments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` int NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `overtimes`
--

DROP TABLE IF EXISTS `overtimes`;
CREATE TABLE IF NOT EXISTS `overtimes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` int NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_days` int NOT NULL,
  `hours` int NOT NULL,
  `rate` int NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `amount` decimal(16,2) NOT NULL DEFAULT '0.00',
  `account_id` int NOT NULL,
  `chart_account_id` int NOT NULL DEFAULT '0',
  `vender_id` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `category_id` int NOT NULL,
  `recurring` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` int NOT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `add_receipt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payslip_types`
--

DROP TABLE IF EXISTS `payslip_types`;
CREATE TABLE IF NOT EXISTS `payslip_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payslip_types`
--

INSERT INTO `payslip_types` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Daryl Holmes', 1, '2024-07-10 10:12:22', '2024-07-10 10:12:22');

-- --------------------------------------------------------

--
-- Table structure for table `pay_slips`
--

DROP TABLE IF EXISTS `pay_slips`;
CREATE TABLE IF NOT EXISTS `pay_slips` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` int NOT NULL,
  `net_payble` int NOT NULL,
  `salary_month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `basic_salary` int NOT NULL,
  `allowance` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `commission` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `saturation_deduction` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_payment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `overtime` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pay_slips`
--

INSERT INTO `pay_slips` (`id`, `employee_id`, `net_payble`, `salary_month`, `status`, `basic_salary`, `allowance`, `commission`, `loan`, `saturation_deduction`, `other_payment`, `overtime`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 100000, '2024-07', 0, 0, '[{\"id\":1,\"employee_id\":1,\"allowance_option\":1,\"title\":\"Fees\",\"amount\":\"100000.00\",\"type\":\"fixed\",\"created_by\":1,\"created_at\":\"2024-07-10T11:10:00.000000Z\",\"updated_at\":\"2024-07-10T11:10:00.000000Z\"}]', '[]', '[]', '[]', '[]', '[]', 1, '2024-07-10 10:10:39', '2024-07-10 10:10:39');

-- --------------------------------------------------------

--
-- Table structure for table `performance_types`
--

DROP TABLE IF EXISTS `performance_types`;
CREATE TABLE IF NOT EXISTS `performance_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `performance_types`
--

INSERT INTO `performance_types` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Marsden Brown', 1, '2024-07-10 10:14:06', '2024-07-10 10:14:06');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=571 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'show pos dashboard', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(2, 'show crm dashboard', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(3, 'show hrm dashboard', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(4, 'copy invoice', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(5, 'show project dashboard', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(6, 'show account dashboard', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(7, 'manage user', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(8, 'create user', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(9, 'edit user', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(10, 'delete user', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(11, 'create language', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(12, 'manage role', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(13, 'create role', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(14, 'edit role', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(15, 'delete role', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(16, 'manage permission', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(17, 'create permission', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(18, 'edit permission', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(19, 'delete permission', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(20, 'manage company settings', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(21, 'manage print settings', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(22, 'manage business settings', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(23, 'manage stripe settings', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(24, 'manage expense', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(25, 'create expense', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(26, 'edit expense', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(27, 'delete expense', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(28, 'manage invoice', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(29, 'create invoice', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(30, 'edit invoice', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(31, 'delete invoice', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(32, 'show invoice', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(33, 'create payment invoice', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(34, 'delete payment invoice', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(35, 'send invoice', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(36, 'delete invoice product', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(37, 'convert invoice', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(38, 'manage constant unit', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(39, 'create constant unit', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(40, 'edit constant unit', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(41, 'delete constant unit', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(42, 'manage constant tax', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(43, 'create constant tax', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(44, 'edit constant tax', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(45, 'delete constant tax', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(46, 'manage constant category', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(47, 'create constant category', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(48, 'edit constant category', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(49, 'delete constant category', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(50, 'manage product & service', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(51, 'create product & service', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(52, 'edit product & service', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(53, 'delete product & service', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(54, 'manage customer', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(55, 'create customer', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(56, 'edit customer', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(57, 'delete customer', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(58, 'show customer', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(59, 'manage vender', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(60, 'create vender', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(61, 'edit vender', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(62, 'delete vender', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(63, 'show vender', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(64, 'manage bank account', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(65, 'create bank account', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(66, 'edit bank account', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(67, 'delete bank account', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(68, 'manage bank transfer', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(69, 'create bank transfer', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(70, 'edit bank transfer', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(71, 'delete bank transfer', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(72, 'manage transaction', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(73, 'manage revenue', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(74, 'create revenue', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(75, 'edit revenue', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(76, 'delete revenue', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(77, 'manage bill', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(78, 'create bill', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(79, 'edit bill', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(80, 'delete bill', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(81, 'show bill', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(82, 'manage payment', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(83, 'create payment', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(84, 'edit payment', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(85, 'delete payment', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(86, 'delete bill product', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(87, 'send bill', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(88, 'create payment bill', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(89, 'delete payment bill', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(90, 'manage order', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(91, 'income report', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(92, 'expense report', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(93, 'income vs expense report', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(94, 'invoice report', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(95, 'bill report', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(96, 'stock report', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(97, 'tax report', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(98, 'loss & profit report', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(99, 'manage customer payment', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(100, 'manage customer transaction', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(101, 'manage customer invoice', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(102, 'vender manage bill', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(103, 'manage vender bill', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(104, 'manage vender payment', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(105, 'manage vender transaction', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(106, 'manage credit note', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(107, 'create credit note', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(108, 'edit credit note', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(109, 'delete credit note', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(110, 'manage debit note', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(111, 'create debit note', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(112, 'edit debit note', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(113, 'delete debit note', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(114, 'duplicate invoice', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(115, 'duplicate bill', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(116, 'manage proposal', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(117, 'create proposal', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(118, 'edit proposal', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(119, 'delete proposal', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(120, 'duplicate proposal', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(121, 'show proposal', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(122, 'send proposal', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(123, 'delete proposal product', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(124, 'manage customer proposal', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(125, 'manage goal', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(126, 'create goal', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(127, 'edit goal', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(128, 'delete goal', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(129, 'manage assets', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(130, 'create assets', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(131, 'edit assets', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(132, 'delete assets', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(133, 'statement report', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(134, 'manage constant custom field', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(135, 'create constant custom field', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(136, 'edit constant custom field', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(137, 'delete constant custom field', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(138, 'manage chart of account', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(139, 'create chart of account', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(140, 'edit chart of account', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(141, 'delete chart of account', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(142, 'manage journal entry', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(143, 'create journal entry', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(144, 'edit journal entry', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(145, 'delete journal entry', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(146, 'show journal entry', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(147, 'balance sheet report', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(148, 'ledger report', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(149, 'trial balance report', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(150, 'manage client', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(151, 'create client', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(152, 'edit client', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(153, 'delete client', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(154, 'manage lead', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(155, 'create lead', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(156, 'view lead', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(157, 'edit lead', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(158, 'delete lead', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(159, 'move lead', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(160, 'create lead call', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(161, 'edit lead call', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(162, 'delete lead call', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(163, 'create lead email', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(164, 'manage pipeline', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(165, 'create pipeline', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(166, 'edit pipeline', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(167, 'delete pipeline', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(168, 'manage lead stage', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(169, 'create lead stage', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(170, 'edit lead stage', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(171, 'delete lead stage', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(172, 'convert lead to deal', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(173, 'manage source', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(174, 'create source', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(175, 'edit source', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(176, 'delete source', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(177, 'manage label', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(178, 'create label', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(179, 'edit label', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(180, 'delete label', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(181, 'manage deal', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(182, 'create deal', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(183, 'view task', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(184, 'create task', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(185, 'edit task', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(186, 'delete task', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(187, 'edit deal', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(188, 'view deal', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(189, 'delete deal', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(190, 'move deal', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(191, 'create deal call', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(192, 'edit deal call', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(193, 'delete deal call', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(194, 'create deal email', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(195, 'manage stage', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(196, 'create stage', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(197, 'edit stage', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(198, 'delete stage', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(199, 'manage employee', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(200, 'create employee', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(201, 'view employee', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(202, 'edit employee', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(203, 'delete employee', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(204, 'manage employee profile', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(205, 'show employee profile', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(206, 'manage department', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(207, 'create department', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(208, 'view department', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(209, 'edit department', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(210, 'delete department', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(211, 'manage designation', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(212, 'create designation', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(213, 'view designation', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(214, 'edit designation', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(215, 'delete designation', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(216, 'manage branch', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(217, 'create branch', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(218, 'edit branch', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(219, 'delete branch', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(220, 'manage document type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(221, 'create document type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(222, 'edit document type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(223, 'delete document type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(224, 'manage document', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(225, 'create document', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(226, 'edit document', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(227, 'delete document', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(228, 'manage payslip type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(229, 'create payslip type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(230, 'edit payslip type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(231, 'delete payslip type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(232, 'create allowance', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(233, 'edit allowance', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(234, 'delete allowance', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(235, 'create commission', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(236, 'edit commission', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(237, 'delete commission', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(238, 'manage allowance option', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(239, 'create allowance option', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(240, 'edit allowance option', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(241, 'delete allowance option', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(242, 'manage loan option', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(243, 'create loan option', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(244, 'edit loan option', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(245, 'delete loan option', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(246, 'manage deduction option', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(247, 'create deduction option', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(248, 'edit deduction option', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(249, 'delete deduction option', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(250, 'create loan', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(251, 'edit loan', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(252, 'delete loan', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(253, 'create saturation deduction', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(254, 'edit saturation deduction', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(255, 'delete saturation deduction', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(256, 'create other payment', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(257, 'edit other payment', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(258, 'delete other payment', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(259, 'create overtime', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(260, 'edit overtime', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(261, 'delete overtime', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(262, 'manage set salary', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(263, 'edit set salary', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(264, 'manage pay slip', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(265, 'create set salary', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(266, 'create pay slip', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(267, 'manage company policy', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(268, 'create company policy', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(269, 'edit company policy', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(270, 'manage appraisal', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(271, 'create appraisal', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(272, 'edit appraisal', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(273, 'show appraisal', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(274, 'delete appraisal', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(275, 'manage goal tracking', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(276, 'create goal tracking', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(277, 'edit goal tracking', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(278, 'delete goal tracking', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(279, 'manage goal type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(280, 'create goal type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(281, 'edit goal type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(282, 'delete goal type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(283, 'manage indicator', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(284, 'create indicator', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(285, 'edit indicator', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(286, 'show indicator', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(287, 'delete indicator', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(288, 'manage training', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(289, 'create training', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(290, 'edit training', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(291, 'delete training', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(292, 'show training', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(293, 'manage trainer', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(294, 'create trainer', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(295, 'edit trainer', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(296, 'delete trainer', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(297, 'manage training type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(298, 'create training type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(299, 'edit training type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(300, 'delete training type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(301, 'manage award', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(302, 'create award', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(303, 'edit award', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(304, 'delete award', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(305, 'manage award type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(306, 'create award type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(307, 'edit award type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(308, 'delete award type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(309, 'manage resignation', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(310, 'create resignation', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(311, 'edit resignation', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(312, 'delete resignation', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(313, 'manage travel', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(314, 'create travel', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(315, 'edit travel', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(316, 'delete travel', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(317, 'manage promotion', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(318, 'create promotion', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(319, 'edit promotion', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(320, 'delete promotion', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(321, 'manage complaint', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(322, 'create complaint', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(323, 'edit complaint', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(324, 'delete complaint', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(325, 'manage warning', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(326, 'create warning', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(327, 'edit warning', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(328, 'delete warning', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(329, 'manage termination', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(330, 'create termination', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(331, 'edit termination', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(332, 'delete termination', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(333, 'manage termination type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(334, 'create termination type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(335, 'edit termination type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(336, 'delete termination type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(337, 'manage job application', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(338, 'create job application', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(339, 'show job application', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(340, 'delete job application', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(341, 'move job application', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(342, 'add job application skill', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(343, 'add job application note', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(344, 'delete job application note', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(345, 'manage job onBoard', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(346, 'manage job category', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(347, 'create job category', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(348, 'edit job category', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(349, 'delete job category', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(350, 'manage job', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(351, 'create job', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(352, 'edit job', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(353, 'show job', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(354, 'delete job', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(355, 'manage job stage', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(356, 'create job stage', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(357, 'edit job stage', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(358, 'delete job stage', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(359, 'Manage Competencies', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(360, 'Create Competencies', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(361, 'Edit Competencies', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(362, 'Delete Competencies', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(363, 'manage custom question', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(364, 'create custom question', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(365, 'edit custom question', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(366, 'delete custom question', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(367, 'create interview schedule', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(368, 'edit interview schedule', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(369, 'delete interview schedule', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(370, 'show interview schedule', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(371, 'create estimation', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(372, 'view estimation', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(373, 'edit estimation', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(374, 'delete estimation', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(375, 'edit holiday', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(376, 'create holiday', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(377, 'delete holiday', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(378, 'manage holiday', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(379, 'show career', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(380, 'manage meeting', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(381, 'create meeting', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(382, 'edit meeting', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(383, 'delete meeting', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(384, 'manage event', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(385, 'create event', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(386, 'edit event', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(387, 'delete event', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(388, 'manage transfer', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(389, 'create transfer', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(390, 'edit transfer', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(391, 'delete transfer', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(392, 'manage announcement', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(393, 'create announcement', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(394, 'edit announcement', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(395, 'delete announcement', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(396, 'manage leave', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(397, 'create leave', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(398, 'edit leave', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(399, 'delete leave', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(400, 'manage leave type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(401, 'create leave type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(402, 'edit leave type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(403, 'delete leave type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(404, 'manage attendance', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(405, 'create attendance', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(406, 'edit attendance', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(407, 'delete attendance', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(408, 'manage report', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(409, 'manage project', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(410, 'create project', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(411, 'view project', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(412, 'edit project', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(413, 'delete project', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(414, 'share project', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(415, 'create milestone', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(416, 'edit milestone', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(417, 'delete milestone', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(418, 'view milestone', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(419, 'view grant chart', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(420, 'manage project stage', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(421, 'create project stage', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(422, 'edit project stage', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(423, 'delete project stage', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(424, 'view timesheet', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(425, 'view expense', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(426, 'manage project task', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(427, 'create project task', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(428, 'edit project task', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(429, 'view project task', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(430, 'delete project task', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(431, 'view activity', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(432, 'view CRM activity', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(433, 'manage project task stage', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(434, 'edit project task stage', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(435, 'create project task stage', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(436, 'delete project task stage', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(437, 'manage timesheet', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(438, 'create timesheet', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(439, 'edit timesheet', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(440, 'delete timesheet', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(441, 'manage bug report', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(442, 'create bug report', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(443, 'edit bug report', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(444, 'delete bug report', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(445, 'move bug report', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(446, 'manage bug status', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(447, 'create bug status', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(448, 'edit bug status', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(449, 'delete bug status', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(450, 'manage client dashboard', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(451, 'manage super admin dashboard', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(452, 'manage system settings', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(453, 'manage plan', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(454, 'create plan', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(455, 'edit plan', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(456, 'manage coupon', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(457, 'create coupon', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(458, 'edit coupon', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(459, 'delete coupon', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(460, 'manage company plan', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(461, 'buy plan', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(462, 'manage form builder', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(463, 'create form builder', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(464, 'edit form builder', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(465, 'delete form builder', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(466, 'manage performance type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(467, 'create performance type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(468, 'edit performance type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(469, 'delete performance type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(470, 'manage form field', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(471, 'create form field', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(472, 'edit form field', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(473, 'delete form field', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(474, 'view form response', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(475, 'create budget plan', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(476, 'edit budget plan', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(477, 'manage budget plan', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(478, 'delete budget plan', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(479, 'view budget plan', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(480, 'manage warehouse', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(481, 'create warehouse', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(482, 'edit warehouse', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(483, 'show warehouse', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(484, 'delete warehouse', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(485, 'manage purchase', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(486, 'create purchase', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(487, 'edit purchase', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(488, 'show purchase', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(489, 'delete purchase', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(490, 'send purchase', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(491, 'create payment purchase', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(492, 'delete payment purchase', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(493, 'manage pos', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(494, 'manage contract type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(495, 'create contract type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(496, 'edit contract type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(497, 'delete contract type', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(498, 'manage contract', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(499, 'create contract', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(500, 'edit contract', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(501, 'delete contract', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(502, 'show contract', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(503, 'create barcode', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(504, 'create webhook', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(505, 'edit webhook', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(506, 'delete webhook', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(507, 'manage project expense', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(508, 'create project expense', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(509, 'edit project expense', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(510, 'delete project expense', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(511, 'manage quotation', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(512, 'create quotation', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(513, 'edit quotation', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(514, 'delete quotation', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(515, 'show quotation', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(516, 'convert quotation', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(517, 'show pos', 'web', '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(518, 'manage dispute', 'web', NULL, NULL),
(519, 'create dispute', 'web', NULL, NULL),
(520, 'view dispute', 'web', NULL, NULL),
(521, 'edit dispute', 'web', NULL, NULL),
(522, 'delete dispute', 'web', NULL, NULL),
(523, 'manage market strategy', 'web', NULL, NULL),
(524, 'create market strategy', 'web', NULL, NULL),
(525, 'view market strategy', 'web', NULL, NULL),
(526, 'edit market strategy', 'web', NULL, NULL),
(527, 'delete market strategy', 'web', NULL, NULL),
(528, 'manage public relations', 'web', NULL, NULL),
(529, 'create posts', 'web', NULL, NULL),
(530, 'edit posts', 'web', NULL, NULL),
(531, 'view posts', 'web', NULL, NULL),
(532, 'delete posts', 'web', NULL, NULL),
(533, 'manage customer requests', 'web', NULL, NULL),
(534, 'create customer requests', 'web', NULL, NULL),
(535, 'view customer requests', 'web', NULL, NULL),
(536, 'edit customer requests', 'web', NULL, NULL),
(537, 'delete customer requests', 'web', NULL, NULL),
(538, 'manage customer claims', 'web', NULL, NULL),
(539, 'create customer claims', 'web', NULL, NULL),
(540, 'view customer claimss', 'web', NULL, NULL),
(541, 'edit customer claims', 'web', NULL, NULL),
(542, 'delete customer claims', 'web', NULL, NULL),
(543, 'manage customer ratings', 'web', NULL, NULL),
(544, 'crate customer ratings', 'web', NULL, NULL),
(545, 'edit customer ratings', 'web', NULL, NULL),
(546, 'delete customer ratings', 'web', NULL, NULL),
(547, 'manage performance type', 'web', NULL, NULL),
(548, 'crate performance type', 'web', NULL, NULL),
(549, 'edit performance type', 'web', NULL, NULL),
(550, 'delete performance type', 'web', NULL, NULL),
(551, 'manage shipment', 'web', NULL, NULL),
(552, 'crate shipment', 'web', NULL, NULL),
(553, 'edit shipment', 'web', NULL, NULL),
(554, 'delete shipment', 'web', NULL, NULL),
(555, 'manage support', 'web', NULL, NULL),
(556, 'crate support', 'web', NULL, NULL),
(557, 'edit support', 'web', NULL, NULL),
(558, 'delete support', 'web', NULL, NULL),
(559, 'manage app integrations', 'web', NULL, NULL),
(560, 'manage warehouse transfer', 'web', NULL, NULL),
(561, 'crate warehouse transfer', 'web', NULL, NULL),
(562, 'edit warehouse transfer', 'web', NULL, NULL),
(563, 'delete warehouse transfer', 'web', NULL, NULL),
(564, 'create customer ratings', 'web', NULL, NULL),
(565, 'create support', 'web', NULL, NULL),
(566, 'create shipment', 'web', NULL, NULL),
(567, 'view shipment', 'web', NULL, NULL),
(568, 'view customer ratings', 'web', NULL, NULL),
(569, 'view support', 'web', NULL, NULL),
(570, 'reply support', 'web', NULL, NULL);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pipelines`
--

DROP TABLE IF EXISTS `pipelines`;
CREATE TABLE IF NOT EXISTS `pipelines` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pipelines`
--

INSERT INTO `pipelines` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'pipeline 1', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pos`
--

DROP TABLE IF EXISTS `pos`;
CREATE TABLE IF NOT EXISTS `pos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `pos_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `customer_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `warehouse_id` int NOT NULL DEFAULT '0',
  `pos_date` date DEFAULT NULL,
  `category_id` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '0',
  `shipping_display` int NOT NULL DEFAULT '1',
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pos_payments`
--

DROP TABLE IF EXISTS `pos_payments`;
CREATE TABLE IF NOT EXISTS `pos_payments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `pos_id` int NOT NULL,
  `date` date DEFAULT NULL,
  `amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `discount` double(8,2) DEFAULT NULL,
  `discount_amount` decimal(15,2) DEFAULT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pos_products`
--

DROP TABLE IF EXISTS `pos_products`;
CREATE TABLE IF NOT EXISTS `pos_products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `pos_id` int NOT NULL DEFAULT '0',
  `product_id` int NOT NULL DEFAULT '0',
  `quantity` double(25,2) NOT NULL DEFAULT '0.00',
  `tax` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0.00',
  `discount` double(8,2) DEFAULT '0.00',
  `price` decimal(15,2) NOT NULL DEFAULT '0.00',
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_services`
--

DROP TABLE IF EXISTS `product_services`;
CREATE TABLE IF NOT EXISTS `product_services` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_price` decimal(16,2) NOT NULL DEFAULT '0.00',
  `purchase_price` decimal(16,2) NOT NULL DEFAULT '0.00',
  `quantity` double(8,2) NOT NULL DEFAULT '0.00',
  `tax_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int NOT NULL DEFAULT '0',
  `unit_id` int NOT NULL DEFAULT '0',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_chartaccount_id` int NOT NULL DEFAULT '0',
  `expense_chartaccount_id` int NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci,
  `pro_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_service_categories`
--

DROP TABLE IF EXISTS `product_service_categories`;
CREATE TABLE IF NOT EXISTS `product_service_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `chart_account_id` int NOT NULL DEFAULT '0',
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#fc544b',
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_service_categories`
--

INSERT INTO `product_service_categories` (`id`, `name`, `type`, `chart_account_id`, `color`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Hanae Fields', 'expense', 0, 'FFFFFF', 1, '2024-07-10 10:29:09', '2024-07-10 10:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `product_service_units`
--

DROP TABLE IF EXISTS `product_service_units`;
CREATE TABLE IF NOT EXISTS `product_service_units` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_service_units`
--

INSERT INTO `product_service_units` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'cm', 1, '2024-07-10 10:29:21', '2024-07-10 10:29:21');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `project_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `budget` int DEFAULT NULL,
  `client_id` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estimated_hrs` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copylinksetting` text COLLATE utf8mb4_unicode_ci,
  `tags` text COLLATE utf8mb4_unicode_ci,
  `created_by` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projectstages`
--

DROP TABLE IF EXISTS `projectstages`;
CREATE TABLE IF NOT EXISTS `projectstages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_email_templates`
--

DROP TABLE IF EXISTS `project_email_templates`;
CREATE TABLE IF NOT EXISTS `project_email_templates` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `template_id` int NOT NULL,
  `project_id` int NOT NULL,
  `is_active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_expenses`
--

DROP TABLE IF EXISTS `project_expenses`;
CREATE TABLE IF NOT EXISTS `project_expenses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `attachment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` int NOT NULL,
  `task_id` int NOT NULL DEFAULT '0',
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_invoices`
--

DROP TABLE IF EXISTS `project_invoices`;
CREATE TABLE IF NOT EXISTS `project_invoices` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice_id` bigint UNSIGNED NOT NULL,
  `project_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `tax_id` bigint UNSIGNED NOT NULL,
  `due_date` date NOT NULL,
  `created_by` int NOT NULL,
  `status` smallint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_tasks`
--

DROP TABLE IF EXISTS `project_tasks`;
CREATE TABLE IF NOT EXISTS `project_tasks` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `estimated_hrs` int NOT NULL DEFAULT '0',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `priority` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'medium',
  `priority_color` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assign_to` text COLLATE utf8mb4_unicode_ci,
  `project_id` int NOT NULL DEFAULT '0',
  `milestone_id` int NOT NULL DEFAULT '0',
  `stage_id` int NOT NULL DEFAULT '0',
  `order` int NOT NULL DEFAULT '0',
  `created_by` int NOT NULL DEFAULT '0',
  `is_favourite` int NOT NULL DEFAULT '0',
  `is_complete` int NOT NULL DEFAULT '0',
  `marked_at` date DEFAULT NULL,
  `progress` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_users`
--

DROP TABLE IF EXISTS `project_users`;
CREATE TABLE IF NOT EXISTS `project_users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_id` int NOT NULL,
  `user_id` int NOT NULL,
  `invited_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

DROP TABLE IF EXISTS `promotions`;
CREATE TABLE IF NOT EXISTS `promotions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` int NOT NULL DEFAULT '0',
  `designation_id` int NOT NULL DEFAULT '0',
  `promotion_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promotion_date` date NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `employee_id`, `designation_id`, `promotion_title`, `promotion_date`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'In duis aut ea aliqu', '2011-03-10', 'Ipsum delectus ips', '1', '2024-07-10 10:18:47', '2024-07-10 10:18:47');

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

DROP TABLE IF EXISTS `proposals`;
CREATE TABLE IF NOT EXISTS `proposals` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `proposal_id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `issue_date` date NOT NULL,
  `send_date` date DEFAULT NULL,
  `category_id` int NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `discount_apply` int NOT NULL DEFAULT '0',
  `is_convert` int NOT NULL DEFAULT '0',
  `converted_invoice_id` int NOT NULL DEFAULT '0',
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proposal_products`
--

DROP TABLE IF EXISTS `proposal_products`;
CREATE TABLE IF NOT EXISTS `proposal_products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `proposal_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` double(25,2) NOT NULL DEFAULT '0.00',
  `tax` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` double(8,2) NOT NULL DEFAULT '0.00',
  `price` decimal(16,2) NOT NULL DEFAULT '0.00',
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

DROP TABLE IF EXISTS `purchases`;
CREATE TABLE IF NOT EXISTS `purchases` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `purchase_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `vender_id` int NOT NULL,
  `warehouse_id` int NOT NULL,
  `purchase_date` date NOT NULL,
  `purchase_number` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '0',
  `shipping_display` int NOT NULL DEFAULT '1',
  `send_date` date DEFAULT NULL,
  `discount_apply` int NOT NULL DEFAULT '0',
  `category_id` int NOT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_payments`
--

DROP TABLE IF EXISTS `purchase_payments`;
CREATE TABLE IF NOT EXISTS `purchase_payments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `purchase_id` int NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `account_id` int NOT NULL,
  `payment_method` int NOT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `add_receipt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_products`
--

DROP TABLE IF EXISTS `purchase_products`;
CREATE TABLE IF NOT EXISTS `purchase_products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `purchase_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` double(25,2) NOT NULL DEFAULT '0.00',
  `tax` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` double(8,2) NOT NULL DEFAULT '0.00',
  `price` decimal(15,2) NOT NULL DEFAULT '0.00',
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `queue_jobs`
--

DROP TABLE IF EXISTS `queue_jobs`;
CREATE TABLE IF NOT EXISTS `queue_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `queue_jobs`
--

INSERT INTO `queue_jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'scout', '{\"uuid\":\"539aebd3-a387-4049-85d2-fb78e9cfc23e\",\"displayName\":\"Laravel\\\\Scout\\\\Jobs\\\\MakeSearchable\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Laravel\\\\Scout\\\\Jobs\\\\MakeSearchable\",\"command\":\"O:33:\\\"Laravel\\\\Scout\\\\Jobs\\\\MakeSearchable\\\":3:{s:6:\\\"models\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Competencies\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:10:\\\"connection\\\";s:8:\\\"database\\\";s:5:\\\"queue\\\";s:5:\\\"scout\\\";}\"}}', 0, NULL, 1721745229, 1721745229),
(2, 'scout', '{\"uuid\":\"714081cb-572a-4c1f-a966-dc43b877399f\",\"displayName\":\"Laravel\\\\Scout\\\\Jobs\\\\MakeSearchable\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Laravel\\\\Scout\\\\Jobs\\\\MakeSearchable\",\"command\":\"O:33:\\\"Laravel\\\\Scout\\\\Jobs\\\\MakeSearchable\\\":3:{s:6:\\\"models\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:10:\\\"connection\\\";s:8:\\\"database\\\";s:5:\\\"queue\\\";s:5:\\\"scout\\\";}\"}}', 0, NULL, 1721762299, 1721762299),
(3, 'scout', '{\"uuid\":\"91d60750-3a83-4207-b084-a491870dda9f\",\"displayName\":\"Laravel\\\\Scout\\\\Jobs\\\\MakeSearchable\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Laravel\\\\Scout\\\\Jobs\\\\MakeSearchable\",\"command\":\"O:33:\\\"Laravel\\\\Scout\\\\Jobs\\\\MakeSearchable\\\":3:{s:6:\\\"models\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:10:\\\"connection\\\";s:8:\\\"database\\\";s:5:\\\"queue\\\";s:5:\\\"scout\\\";}\"}}', 0, NULL, 1721831109, 1721831109);

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

DROP TABLE IF EXISTS `quotations`;
CREATE TABLE IF NOT EXISTS `quotations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `quotation_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `customer_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `warehouse_id` int NOT NULL DEFAULT '0',
  `quotation_date` date DEFAULT NULL,
  `category_id` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '0',
  `converted_pos_id` int NOT NULL DEFAULT '0',
  `is_converted` int NOT NULL DEFAULT '0',
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotation_products`
--

DROP TABLE IF EXISTS `quotation_products`;
CREATE TABLE IF NOT EXISTS `quotation_products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `quotation_id` int NOT NULL DEFAULT '0',
  `product_id` int NOT NULL DEFAULT '0',
  `quantity` int NOT NULL DEFAULT '0',
  `tax` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0.00',
  `discount` double(8,2) DEFAULT '0.00',
  `price` decimal(15,2) NOT NULL DEFAULT '0.00',
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resignations`
--

DROP TABLE IF EXISTS `resignations`;
CREATE TABLE IF NOT EXISTS `resignations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` int NOT NULL DEFAULT '0',
  `notice_date` date NOT NULL,
  `resignation_date` date NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resignations`
--

INSERT INTO `resignations` (`id`, `employee_id`, `notice_date`, `resignation_date`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, '2011-01-16', '1977-07-18', 'Id ut harum doloribu', 1, '2024-07-10 10:18:23', '2024-07-10 10:18:23');

-- --------------------------------------------------------

--
-- Table structure for table `revenues`
--

DROP TABLE IF EXISTS `revenues`;
CREATE TABLE IF NOT EXISTS `revenues` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `amount` decimal(16,2) NOT NULL DEFAULT '0.00',
  `account_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `category_id` int NOT NULL,
  `payment_method` int NOT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `add_receipt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'web', 0, '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(2, 'customer', 'web', 0, '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(3, 'vender', 'web', 0, '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(4, 'company', 'web', 0, '2024-07-01 11:36:05', '2024-07-01 11:36:05'),
(5, 'accountant', 'web', 1, '2024-07-01 11:36:06', '2024-07-01 11:36:06'),
(6, 'Employee', 'web', 1, '2024-07-01 11:36:06', '2024-07-01 11:36:06'),
(7, 'client', 'web', 1, '2024-07-01 11:36:06', '2024-07-01 11:36:06');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(6, 4),
(6, 5),
(7, 4),
(8, 4),
(9, 4),
(10, 4),
(12, 4),
(13, 4),
(14, 4),
(15, 4),
(16, 4),
(17, 4),
(18, 4),
(19, 4),
(20, 4),
(21, 4),
(21, 5),
(22, 4),
(24, 4),
(24, 5),
(25, 4),
(25, 5),
(26, 4),
(26, 5),
(27, 4),
(27, 5),
(28, 4),
(28, 5),
(29, 4),
(29, 5),
(30, 4),
(30, 5),
(31, 4),
(31, 5),
(32, 2),
(32, 4),
(32, 5),
(33, 4),
(33, 5),
(34, 4),
(34, 5),
(35, 4),
(35, 5),
(36, 4),
(36, 5),
(37, 4),
(37, 5),
(38, 4),
(38, 5),
(39, 4),
(39, 5),
(40, 4),
(40, 5),
(41, 4),
(41, 5),
(42, 4),
(42, 5),
(43, 4),
(43, 5),
(44, 4),
(44, 5),
(45, 4),
(45, 5),
(46, 4),
(46, 5),
(47, 4),
(47, 5),
(48, 4),
(48, 5),
(49, 4),
(49, 5),
(50, 4),
(50, 5),
(51, 4),
(51, 5),
(52, 4),
(52, 5),
(53, 4),
(53, 5),
(54, 4),
(54, 5),
(55, 4),
(55, 5),
(56, 4),
(56, 5),
(57, 4),
(57, 5),
(58, 2),
(58, 4),
(58, 5),
(59, 4),
(59, 5),
(60, 4),
(60, 5),
(61, 4),
(61, 5),
(62, 4),
(62, 5),
(63, 3),
(63, 4),
(63, 5),
(64, 4),
(64, 5),
(65, 4),
(65, 5),
(66, 4),
(66, 5),
(67, 4),
(67, 5),
(68, 4),
(68, 5),
(69, 4),
(69, 5),
(70, 4),
(70, 5),
(71, 4),
(71, 5),
(72, 4),
(72, 5),
(73, 4),
(73, 5),
(74, 4),
(74, 5),
(75, 4),
(75, 5),
(76, 4),
(76, 5),
(77, 4),
(77, 5),
(78, 4),
(78, 5),
(79, 4),
(79, 5),
(80, 4),
(80, 5),
(81, 3),
(81, 4),
(81, 5),
(82, 4),
(82, 5),
(83, 4),
(83, 5),
(84, 4),
(84, 5),
(85, 4),
(85, 5),
(86, 4),
(86, 5),
(87, 4),
(87, 5),
(88, 4),
(88, 5),
(89, 4),
(89, 5),
(90, 4),
(91, 4),
(91, 5),
(92, 4),
(92, 5),
(93, 4),
(93, 5),
(94, 4),
(94, 5),
(95, 4),
(95, 5),
(96, 4),
(96, 5),
(97, 4),
(97, 5),
(98, 4),
(98, 5),
(99, 2),
(100, 2),
(101, 2),
(102, 3),
(103, 3),
(104, 3),
(105, 3),
(106, 4),
(106, 5),
(107, 4),
(107, 5),
(108, 4),
(108, 5),
(109, 4),
(109, 5),
(110, 4),
(110, 5),
(111, 4),
(111, 5),
(112, 4),
(112, 5),
(113, 4),
(113, 5),
(114, 4),
(115, 4),
(116, 4),
(116, 5),
(117, 4),
(117, 5),
(118, 4),
(118, 5),
(119, 4),
(119, 5),
(120, 4),
(120, 5),
(121, 2),
(121, 4),
(121, 5),
(122, 4),
(122, 5),
(123, 4),
(123, 5),
(124, 2),
(125, 4),
(125, 5),
(126, 4),
(126, 5),
(127, 4),
(127, 5),
(128, 4),
(128, 5),
(129, 4),
(129, 5),
(130, 4),
(130, 5),
(131, 4),
(131, 5),
(132, 4),
(132, 5),
(133, 4),
(133, 5),
(134, 4),
(134, 5),
(135, 4),
(135, 5),
(136, 4),
(136, 5),
(137, 4),
(137, 5),
(138, 4),
(138, 5),
(139, 4),
(139, 5),
(140, 4),
(140, 5),
(141, 4),
(141, 5),
(142, 4),
(142, 5),
(143, 4),
(143, 5),
(144, 4),
(144, 5),
(145, 4),
(145, 5),
(146, 4),
(146, 5),
(147, 4),
(147, 5),
(148, 4),
(148, 5),
(149, 4),
(149, 5),
(150, 4),
(151, 4),
(152, 4),
(153, 4),
(154, 4),
(155, 4),
(156, 4),
(157, 4),
(158, 4),
(159, 4),
(160, 4),
(161, 4),
(162, 4),
(163, 4),
(164, 4),
(165, 4),
(166, 4),
(167, 4),
(168, 4),
(169, 4),
(170, 4),
(171, 4),
(172, 4),
(173, 4),
(174, 4),
(175, 4),
(176, 4),
(177, 4),
(178, 4),
(179, 4),
(180, 4),
(181, 4),
(182, 4),
(183, 4),
(184, 4),
(185, 4),
(186, 4),
(187, 4),
(188, 4),
(189, 4),
(190, 4),
(191, 4),
(192, 4),
(193, 4),
(194, 4),
(195, 4),
(196, 4),
(197, 4),
(198, 4),
(199, 4),
(200, 4),
(201, 4),
(202, 4),
(203, 4),
(204, 4),
(205, 4),
(206, 4),
(207, 4),
(208, 4),
(209, 4),
(210, 4),
(211, 4),
(212, 4),
(213, 4),
(214, 4),
(215, 4),
(216, 4),
(217, 4),
(218, 4),
(219, 4),
(220, 4),
(221, 4),
(222, 4),
(223, 4),
(224, 4),
(225, 4),
(226, 4),
(227, 4),
(228, 4),
(229, 4),
(230, 4),
(231, 4),
(232, 4),
(233, 4),
(234, 4),
(235, 4),
(236, 4),
(237, 4),
(238, 4),
(239, 4),
(240, 4),
(241, 4),
(242, 4),
(243, 4),
(244, 4),
(245, 4),
(246, 4),
(247, 4),
(248, 4),
(249, 4),
(250, 4),
(251, 4),
(252, 4),
(253, 4),
(254, 4),
(255, 4),
(256, 4),
(257, 4),
(258, 4),
(259, 4),
(260, 4),
(261, 4),
(262, 4),
(263, 4),
(264, 4),
(265, 4),
(266, 4),
(267, 4),
(268, 4),
(269, 4),
(270, 4),
(271, 4),
(272, 4),
(273, 4),
(274, 4),
(275, 4),
(276, 4),
(277, 4),
(278, 4),
(279, 4),
(280, 4),
(281, 4),
(282, 4),
(283, 4),
(284, 4),
(285, 4),
(286, 4),
(287, 4),
(288, 4),
(289, 4),
(290, 4),
(291, 4),
(292, 4),
(293, 4),
(294, 4),
(295, 4),
(296, 4),
(297, 4),
(298, 4),
(299, 4),
(300, 4),
(301, 4),
(302, 4),
(303, 4),
(304, 4),
(305, 4),
(306, 4),
(307, 4),
(308, 4),
(309, 4),
(310, 4),
(311, 4),
(312, 4),
(313, 4),
(314, 4),
(315, 4),
(316, 4),
(317, 4),
(318, 4),
(319, 4),
(320, 4),
(321, 4),
(322, 4),
(323, 4),
(324, 4),
(325, 4),
(326, 4),
(327, 4),
(328, 4),
(329, 4),
(330, 4),
(331, 4),
(332, 4),
(333, 4),
(334, 4),
(335, 4),
(336, 4),
(337, 4),
(338, 4),
(339, 4),
(340, 4),
(341, 4),
(342, 4),
(343, 4),
(344, 4),
(345, 4),
(346, 4),
(347, 4),
(348, 4),
(349, 4),
(350, 4),
(351, 4),
(352, 4),
(353, 4),
(354, 4),
(355, 4),
(356, 4),
(357, 4),
(358, 4),
(359, 4),
(360, 4),
(361, 4),
(362, 4),
(363, 4),
(364, 4),
(365, 4),
(366, 4),
(367, 4),
(368, 4),
(369, 4),
(370, 4),
(371, 4),
(372, 4),
(373, 4),
(374, 4),
(375, 4),
(376, 4),
(377, 4),
(378, 4),
(379, 4),
(380, 4),
(381, 4),
(382, 4),
(383, 4),
(384, 4),
(385, 4),
(386, 4),
(387, 4),
(388, 4),
(389, 4),
(390, 4),
(391, 4),
(392, 4),
(393, 4),
(394, 4),
(395, 4),
(396, 4),
(397, 4),
(398, 4),
(399, 4),
(400, 4),
(401, 4),
(402, 4),
(403, 4),
(404, 4),
(405, 4),
(406, 4),
(407, 4),
(408, 4),
(409, 4),
(410, 4),
(411, 4),
(412, 4),
(413, 4),
(414, 4),
(415, 4),
(416, 4),
(417, 4),
(418, 4),
(419, 4),
(420, 4),
(421, 4),
(422, 4),
(423, 4),
(424, 4),
(425, 4),
(426, 4),
(427, 4),
(428, 4),
(429, 4),
(430, 4),
(431, 4),
(432, 4),
(433, 4),
(434, 4),
(435, 4),
(436, 4),
(437, 4),
(438, 4),
(439, 4),
(440, 4),
(441, 4),
(442, 4),
(443, 4),
(444, 4),
(445, 4),
(446, 4),
(447, 4),
(448, 4),
(449, 4),
(453, 4),
(460, 4),
(461, 4),
(462, 4),
(463, 4),
(464, 4),
(465, 4),
(466, 4),
(467, 4),
(468, 4),
(469, 4),
(470, 4),
(471, 4),
(472, 4),
(473, 4),
(474, 4),
(475, 4),
(475, 5),
(476, 4),
(476, 5),
(477, 4),
(477, 5),
(478, 4),
(478, 5),
(479, 4),
(479, 5),
(480, 4),
(481, 4),
(482, 4),
(483, 4),
(484, 4),
(485, 4),
(486, 4),
(487, 4),
(488, 4),
(489, 4),
(490, 4),
(491, 4),
(492, 4),
(493, 4),
(494, 4),
(495, 4),
(496, 4),
(497, 4),
(498, 4),
(499, 4),
(500, 4),
(501, 4),
(502, 4),
(503, 4),
(503, 5),
(504, 4),
(504, 5),
(505, 4),
(505, 5),
(506, 4),
(506, 5),
(507, 4),
(508, 4),
(509, 4),
(510, 4),
(511, 4),
(512, 4),
(513, 4),
(514, 4),
(515, 4),
(516, 4),
(517, 4),
(520, 4),
(521, 4),
(522, 4),
(523, 4),
(524, 4),
(525, 4),
(526, 4),
(527, 4),
(528, 4),
(529, 4),
(530, 4),
(531, 4),
(532, 4),
(533, 4),
(534, 4),
(535, 4),
(536, 4),
(537, 4),
(538, 4),
(539, 4),
(540, 4),
(541, 4),
(542, 4),
(543, 4),
(544, 4),
(545, 4),
(546, 4),
(547, 4),
(548, 4),
(549, 4),
(550, 4),
(551, 4),
(552, 4),
(553, 4),
(554, 4),
(555, 4),
(556, 4),
(557, 4),
(558, 4),
(559, 4),
(560, 4),
(561, 4),
(562, 4),
(563, 4),
(564, 4),
(565, 4),
(566, 4);

-- --------------------------------------------------------

--
-- Table structure for table `saturation_deductions`
--

DROP TABLE IF EXISTS `saturation_deductions`;
CREATE TABLE IF NOT EXISTS `saturation_deductions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` int NOT NULL,
  `deduction_option` int NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_name_created_by_unique` (`name`,`created_by`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'company_name', 'VTC', 1, NULL, NULL),
(2, 'company_address', 'Tamtam', 1, NULL, NULL),
(3, 'company_city', 'Yaounde', 1, NULL, NULL),
(4, 'company_state', NULL, 1, NULL, NULL),
(5, 'company_zipcode', NULL, 1, NULL, NULL),
(6, 'company_country', NULL, 1, NULL, NULL),
(7, 'company_telephone', NULL, 1, NULL, NULL),
(8, 'registration_number', NULL, 1, NULL, NULL),
(9, 'company_start_time', '09:00', 1, NULL, NULL),
(10, 'company_end_time', '18:00', 1, NULL, NULL),
(11, 'timezone', NULL, 1, NULL, NULL),
(12, 'vat_number', NULL, 1, NULL, NULL),
(13, 'vat_gst_number_switch', 'off', 1, NULL, NULL),
(14, 'ip_restrict', 'off', 1, NULL, NULL),
(15, 'site_currency', 'XAF', 1, '2024-07-10 08:29:20', '2024-07-10 08:29:20'),
(16, 'site_currency_symbol', 'XAF', 1, '2024-07-10 08:29:20', '2024-07-10 08:29:20'),
(17, 'site_currency_symbol_position', 'pre', 1, '2024-07-10 08:29:20', '2024-07-10 08:29:20'),
(18, 'decimal_number', '2', 1, '2024-07-10 08:29:20', '2024-07-10 08:29:20'),
(19, 'site_date_format', 'M j, Y', 1, '2024-07-10 08:29:20', '2024-07-10 08:29:20'),
(20, 'site_time_format', 'g:i A', 1, '2024-07-10 08:29:20', '2024-07-10 08:29:20'),
(21, 'customer_prefix', '#CUST', 1, '2024-07-10 08:29:20', '2024-07-10 08:29:20'),
(22, 'vender_prefix', '#VEND', 1, '2024-07-10 08:29:20', '2024-07-10 08:29:20'),
(23, 'proposal_prefix', '#PROP', 1, '2024-07-10 08:29:20', '2024-07-10 08:29:20'),
(24, 'invoice_prefix', '#INVO', 1, '2024-07-10 08:29:20', '2024-07-10 08:29:20'),
(25, 'bill_prefix', '#BILL', 1, '2024-07-10 08:29:20', '2024-07-10 08:29:20'),
(26, 'quotation_prefix', '#QUO', 1, '2024-07-10 08:29:20', '2024-07-10 08:29:20'),
(27, 'purchase_prefix', '#PUR', 1, '2024-07-10 08:29:20', '2024-07-10 08:29:20'),
(28, 'pos_prefix', '#POS', 1, '2024-07-10 08:29:20', '2024-07-10 08:29:20'),
(29, 'journal_prefix', '#JUR', 1, '2024-07-10 08:29:20', '2024-07-10 08:29:20'),
(30, 'expense_prefix', '#EXP', 1, '2024-07-10 08:29:20', '2024-07-10 08:29:20'),
(31, 'shipping_display', 'on', 1, '2024-07-10 08:29:20', '2024-07-10 08:29:20'),
(32, 'footer_title', NULL, 1, '2024-07-10 08:29:20', '2024-07-10 08:29:20'),
(33, 'SITE_RTL', 'off', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `set_salaries`
--

DROP TABLE IF EXISTS `set_salaries`;
CREATE TABLE IF NOT EXISTS `set_salaries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

DROP TABLE IF EXISTS `shipments`;
CREATE TABLE IF NOT EXISTS `shipments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tracking_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipper_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipper_phone` int NOT NULL,
  `shipper_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipper_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_phone` int NOT NULL,
  `receiver_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_of_shipment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` int NOT NULL,
  `packages` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mode_field` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attach_file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_freight` int NOT NULL,
  `carrier_field` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carrier_ref_number` int NOT NULL,
  `departure_time` time NOT NULL,
  `origin_field` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_date` date NOT NULL,
  `pickup_time` time NOT NULL,
  `delivery_date` date NOT NULL,
  `comments` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_date` date NOT NULL,
  `status_time` time NOT NULL,
  `status_location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipments`
--

INSERT INTO `shipments` (`id`, `tracking_no`, `shipper_name`, `shipper_phone`, `shipper_address`, `shipper_email`, `receiver_name`, `receiver_phone`, `receiver_address`, `receiver_email`, `type_of_shipment`, `weight`, `packages`, `mode_field`, `product`, `qty`, `payment_method`, `attach_file`, `total_freight`, `carrier_field`, `carrier_ref_number`, `departure_time`, `origin_field`, `destination`, `pickup_date`, `pickup_time`, `delivery_date`, `comments`, `status_date`, `status_time`, `status_location`, `package_status`, `created_at`, `updated_at`) VALUES
(1, 'GFS_1078767', 'Nerea Lowery', 1, 'Sed sed nihil veniam', 'lezasa@mailinator.com', 'Guinevere Morrison', 1, 'Et ut sed quaerat pa', 'labaxykyf@mailinator.com', 'Air Freight', 0, 'Nesciunt aspernatur', 'Air Freight', 'Anim quia qui id aut', 946, 'online', '/assets/images/shipment-files/778e9f51-9c06-48f7-817d-c7b6b615eaa3pexels-julius-silver-240301-753331.jpg', 0, 'USPS', 714, '03:52:00', 'Botswana', 'Sri Lanka', '2014-07-07', '10:05:00', '1971-12-24', 'Sed doloribus soluta', '2020-08-05', '03:13:00', 'Molestias ipsa magn', 'In Transit', '2024-07-08 09:03:08', '2024-07-08 09:03:08');

-- --------------------------------------------------------

--
-- Table structure for table `sources`
--

DROP TABLE IF EXISTS `sources`;
CREATE TABLE IF NOT EXISTS `sources` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stages`
--

DROP TABLE IF EXISTS `stages`;
CREATE TABLE IF NOT EXISTS `stages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pipeline_id` int NOT NULL,
  `created_by` int NOT NULL,
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_reports`
--

DROP TABLE IF EXISTS `stock_reports`;
CREATE TABLE IF NOT EXISTS `stock_reports` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL DEFAULT '0',
  `quantity` int NOT NULL DEFAULT '0',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supports`
--

DROP TABLE IF EXISTS `supports`;
CREATE TABLE IF NOT EXISTS `supports` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_created` int NOT NULL DEFAULT '0',
  `user` int NOT NULL DEFAULT '0',
  `priority` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` date NOT NULL,
  `ticket_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_replies`
--

DROP TABLE IF EXISTS `support_replies`;
CREATE TABLE IF NOT EXISTS `support_replies` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `support_id` int NOT NULL,
  `user` int NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL,
  `is_read` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_checklists`
--

DROP TABLE IF EXISTS `task_checklists`;
CREATE TABLE IF NOT EXISTS `task_checklists` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_id` int NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_comments`
--

DROP TABLE IF EXISTS `task_comments`;
CREATE TABLE IF NOT EXISTS `task_comments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_id` int NOT NULL,
  `user_id` int NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_files`
--

DROP TABLE IF EXISTS `task_files`;
CREATE TABLE IF NOT EXISTS `task_files` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_id` int NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_stages`
--

DROP TABLE IF EXISTS `task_stages`;
CREATE TABLE IF NOT EXISTS `task_stages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complete` tinyint(1) NOT NULL DEFAULT '0',
  `project_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `color` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

DROP TABLE IF EXISTS `taxes`;
CREATE TABLE IF NOT EXISTS `taxes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `name`, `rate`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Wyoming Emerson', '41', 1, '2024-07-10 10:28:55', '2024-07-10 10:28:55');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

DROP TABLE IF EXISTS `templates`;
CREATE TABLE IF NOT EXISTS `templates` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `template_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prompt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `module` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_json` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_tone` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `template_name`, `prompt`, `module`, `field_json`, `is_tone`, `created_at`, `updated_at`) VALUES
(1, 'leave_reason', 'Generate a comma-separated string of common leave reasons that employees may provide to their employers. Include both personal and professional reasons for taking leave, such only ##type## . Aim to generate a diverse range of leave reasons that can be used in different situations. Please provide a comprehensive and varied list of leave reasons that can help employers understand and accommodate their employees\' needs.', 'leave', '{\"field\":[{\"label\":\"Leave Type\",\"placeholder\":\"e.g.illness, family emergencies,vacation\",\"field_type\":\"text_box\",\"field_name\":\"type\"}]}', 1, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(2, 'subject', 'Generate a goal subject for an employee\'s goal related type to ##type##.', 'goal tracking', '{\"field\":[{\"label\":\"Goal Type\",\"placeholder\":\"e.g.invoice, production,hiring\",\"field_type\":\"text_box\",\"field_name\":\"type\"}]}', 0, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(3, 'description', 'Generate a goal descriptions for an employee\'s goal title is ##title##.', 'goal tracking', '{\"field\":[{\"label\":\"Goal Title\",\"placeholder\":\"e.g.Invoice Accuracy\",\"field_type\":\"text_box\",\"field_name\":\"title\"}]}', 1, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(4, 'description', 'Generate a job training descriptions for a ##position## position. The training description should include responsibilities such as ##responsibilities##. Please ensure the descriptions are concise, informative, and accurately reflect the key responsibilities of a ##position##.', 'training', '{\"field\":[{\"label\":\"Position\",\"placeholder\":\"job training descriptions\",\"field_type\":\"text_box\",\"field_name\":\"position\"},{\"label\":\"Responsibilities\",\"placeholder\":\"Managing training logistics\",\"field_type\":\"textarea\",\"field_name\":\"responsibilities\"}]}', 1, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(5, 'title', 'Generate a list of job titles commonly found in an ##work_place##. The job titles should cover a range of roles and responsibilities within the field of ##field##. Include positions such as ##positions##. Please provide a diverse selection of job titles that accurately reflect the various positions found in an ##work_place##.', 'job', '{\"field\":[{\"label\":\"Work Place\",\"placeholder\":\"e.g.IT Company,hospital\",\"field_type\":\"text_box\",\"field_name\":\"work_place\"},{\"label\":\"Field \",\"placeholder\":\"e.g.Backend\",\"field_type\":\"text_box\",\"field_name\":\"field\"},{\"label\":\"Positions\",\"placeholder\":\"e.g.developer,tester\",\"field_type\":\"text_box\",\"field_name\":\"positions\"}]}', 0, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(6, 'description', 'Generate a job descriptions for a ##position## position. The job description should include responsibilities such as ##responsibilities##. Please ensure the descriptions are concise, informative, and accurately reflect the key responsibilities of a ##position##.', 'job', '{\"field\":[{\"label\":\"Position\",\"placeholder\":\"job for a position\",\"field_type\":\"text_box\",\"field_name\":\"position\"},{\"label\":\"Responsibilities\",\"placeholder\":\"\",\"field_type\":\"textarea\",\"field_name\":\"responsibilities\"}]}', 1, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(7, 'requirement', 'Generate a comma-separated string of job requirements for a ##position## position. The requirements should include ##description##. Please provide the requirements in a comma-separated string format.', 'job', '{\"field\":[{\"label\":\"Position\",\"placeholder\":\"requirement of job\",\"field_type\":\"text_box\",\"field_name\":\"position\"},{\"label\":\"Description\",\"placeholder\":\"\",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 1, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(8, 'description', 'Generate a description for presenting the Award. The description should highlight ##reasons##. Emphasize the significance of the  Award as a symbol of recognition for employee\'s remarkable accomplishments and its representation of her \'##reasons##\' and impact on the organization. Please create a personalized and engaging description that conveys appreciation, pride, and gratitude for employee\'s contributions to the company\'s sucess', 'award', '{\"field\":[{\"label\":\"Award reasons\",\"placeholder\":\"e.g.skilled, focused ,efficiency\",\"field_type\":\"textarea\",\"field_name\":\"reasons\"}]}', 1, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(9, 'description', 'Generate a list of common reasons for employee transfers within an organization. Include reasons such as ##reasons##. Please provide a comprehensive and varied list of reasons that can help employers understand and address employee transfer situations effectively.', 'transfer', '{\"field\":[{\"label\":\"Transfer reasons\",\"placeholder\":\"e.g.career development,special projects or initiatives\",\"field_type\":\"textarea\",\"field_name\":\"reasons\"}]}', 1, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(10, 'description', 'Generate a description why an employee might choose to resign and request a transfer to another location within the company. Include both professional and personal reasons that could contribute to this decision. Examples may include ##reasons##. Aim to provide a comprehensive and varied description that can help employers understand and accommodate employees\' needs when considering a transfer request', 'resignation', '{\"field\":[{\"label\":\"Resignation reasons\",\"placeholder\":\"e.g.career development,health issues\",\"field_type\":\"textarea\",\"field_name\":\"reasons\"}]}', 1, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(11, 'description', 'Generate a description for organizing a company trip. The trip aims to ##aims## . Please provide a diverse description that highlight the benefits and positive outcomes associated with organizing a company trip. Focus on creating an engaging and enjoyable experience for employees while also achieving business objectives and cultivating a positive work environment.', 'travel', '{\"field\":[{\"label\":\"Aims\",\"placeholder\":\"e.g.career development,health issues\",\"field_type\":\"textarea\",\"field_name\":\"aims\"}]}', 1, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(12, 'promotion_title', 'Generate a list of promotion title suggestions for an ##role##. The promotion titles should reflect ##reasons##, and recognition of the ##role##\'s accomplishments. Please provide a diverse range of promotion titles that align with ##role## job roles and levels within the company. Aim to create titles that are both professional and descriptive, highlighting the ##role##\'s progression and impact within the organization.', 'promotion', '{\"field\":[{\"label\":\"Job\",\"placeholder\":\"e.g.doctor, developer\",\"field_type\":\"text_box\",\"field_name\":\"role\"},{\"label\":\"Promotion Reasons\",\"placeholder\":\"e.g.increased responsibility, higher position\",\"field_type\":\"textarea\",\"field_name\":\"reasons\"}]}', 0, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(13, 'description', 'Generate a promotion description for this title:##title##. ', 'promotion', '{\"field\":[{\"label\":\"Promotion Title\",\"placeholder\":\"e.g.Medical Director\",\"field_type\":\"text_box\",\"field_name\":\"title\"}]}', 1, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(14, 'title', 'Generate a list of titles for complaints related to employee and company issues. ##reasons##. Please provide a range of titles that accurately reflect common complaint categories, ensuring they are concise, descriptive, and effective in conveying the nature of the complaint. ', 'complaint', '{\"field\":[{\"label\":\"Complaint reasons\",\"placeholder\":\"e.g.unprofessional behavior, harassment,\",\"field_type\":\"textarea\",\"field_name\":\"reasons\"}]}', 0, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(15, 'description', 'Generate a Complaint description for this title:##title##. ', 'complaint', '{\"field\":[{\"label\":\"Complaint Title\",\"placeholder\":\"e.g.Unprofessional Behavior Complaint\",\"field_type\":\"text_box\",\"field_name\":\"title\"}]}', 1, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(16, 'description', 'Generate a warning description for an employee who consistently ##reasons##. The warning should address the employee\'s ##reasons##, including further disciplinary action or termination of employment. Please provide a clear and firm warning message that encourages the employee to review the policy and make immediate improvements.', 'warning', '{\"field\":[{\"label\":\"Warning reasons\",\"placeholder\":\"e.g.break attendance policy\",\"field_type\":\"textarea\",\"field_name\":\"reasons\"}]}', 1, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(17, 'description', 'Generate a termination description for  the reason :##reason##. The description should convey the company\'s regret over the decision and outline the specific concerns, such as ##reasons##. Please provide a clear and professional message that explains the decision while expressing appreciation for the employee\'s contributions. Aim to offer guidance for personal and professional growth and provide necessary instructions regarding final paycheck and return of company property.', 'termination', '{\"field\":[{\"label\":\"Termination reasons\",\"placeholder\":\"e.g.Poor Performance\",\"field_type\":\"textarea\",\"field_name\":\"reasons\"}]}', 1, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(18, 'description', 'Generate an announcement title for ##reasons##. The title should be attention-grabbing and informative, effectively conveying the key message to the intended audience. Please ensure the title is appropriate for the given situation, whether it\'s about a ##reasons##. Aim to create a title that captures the essence of the announcement and sparks interest or curiosity among the readers.', 'announcement', '{\"field\":[{\"label\":\"Announcement reasons\",\"placeholder\":\"e.g.Growth Opportunities\",\"field_type\":\"textarea\",\"field_name\":\"reasons\"}]}', 1, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(19, 'occasion', 'Generate a list of holiday occasions for celebrations and gatherings. The occasions should cover a variety of holidays and events throughout the year, such as ##name##. Please provide a diverse range of occasions that can be used for hosting parties, organizing special events, or planning festive activities. Aim to offer unique and creative ideas that cater to different cultures, traditions, and preferences.', 'holiday', '{\"field\":[{\"label\":\"Any Specific occasions\",\"placeholder\":\"e.g.Cultural Celebration\",\"field_type\":\"text_box\",\"field_name\":\"name\"}]}', 0, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(20, 'title', 'Generate a creative and engaging event title for an upcoming event. The event can be a ##type##. Please focus on creating a title that captures the essence of the event, sparks curiosity, and encourages attendance. Aim to make the title memorable, intriguing, and aligned with the purpose and theme of the event. Consider the target audience, event objectives, and any specific keywords or ideas you would like to incorporate', 'event', '{\"field\":[{\"label\":\"Specific type of event\",\"placeholder\":\"e.g.conference, workshop, seminar\",\"field_type\":\"text_box\",\"field_name\":\"name\"}]}', 0, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(21, 'title', 'Generate a meeting title that is catchy and informative. The title should effectively convey the purpose and focus of the meeting, whether it\'s for ##purpose##. Please aim to create a title that grabs the attention of participants, reflects the importance of the meeting, and provides a clear understanding of what will be discussed or accomplished during the session.', 'meeting', '{\"field\":[{\"label\":\"Meeting purpose\",\"placeholder\":\"e.g.conference, workshop\",\"field_type\":\"textarea\",\"field_name\":\"purpose\"}]}', 0, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(22, 'description', 'Generate a descriptive response for a given ##title##. The response should be detailed, engaging, and informative, providing relevant information and capturing the reader\'s interest', 'account asset', '{\"field\":[{\"label\":\"Asset name\",\"placeholder\":\"HR may provide some devices \",\"field_type\":\"text_box\",\"field_name\":\"title\"}]}', 1, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(23, 'description', 'Generate a description based on a given document name:##name##. The document name: ##name## represents a specific file or document, and you need a descriptive summary or overview of its contents. Please provide a clear and concise description that captures the main points, purpose, or key information contained within the document. Aim to create a brief but informative description that gives the reader an understanding of what they can expect when accessing or reviewing the document.', 'document', '{\"field\":[{\"label\":\"Asset name\",\"placeholder\":\"e.g. Employee handbook\",\"field_type\":\"text_box\",\"field_name\":\"title\"}]}', 1, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(24, 'title', 'Generate a suitable title for the company policy regarding ##description##. The title should be clear, concise, and informative, effectively conveying the purpose and scope of the policy. Please ensure that the title reflects the importance of ##description##. Aim to create a title that is professional, easily understandable, and aligned with the company\'s culture and values.', 'company policy', '{\"field\":[{\"label\":\"Description of policy\",\"placeholder\":\"e.g.Leave policies,Performance management\",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 0, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(25, 'description', 'generate description for this title ##title##', 'chart of account', '{\"field\":[{\"label\":\" Title \",\"placeholder\":\"e.g.Accounts Receivable,Office Equipment\",\"field_type\":\"textarea\",\"field_name\":\"title\"}]}', 1, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(26, 'description', 'generate description for this title ##title##', 'journal entry', '{\"field\":[{\"label\":\" Title \",\"placeholder\":\"e.g.Accounts Receivable,Office Equipment\",\"field_type\":\"textarea\",\"field_name\":\"title\"}]}', 1, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(27, 'subject', 'Generate a lead subject line for a marketing campaign targeting potential customers for a software development company specializing in web and mobile applications.', 'lead', '{\"field\":[{\"label\":\"Description\",\"placeholder\":\"e.g. Leads represent potential sales opportunities for a business\",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 0, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(28, 'name', 'generate deal name for this proposal description ##description##', 'deal', '{\"field\":[{\"label\":\"Proposal Description\",\"placeholder\":\"e.g.Collaboration and Partnerships\",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 0, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(29, 'subject', 'generate contract subject for this contract description ##description##', 'contract', '{\"field\":[{\"label\":\"Proposal Description\",\"placeholder\":\"e.g.Terms and Conditions\",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 0, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(30, 'description', 'generate contract description for this contract subject ##subject##', 'contract', '{\"field\":[{\"label\":\"Contract Subject\",\"placeholder\":\"e.g.Legal Protection,Terms and Conditions\",\"field_type\":\"textarea\",\"field_name\":\"subject\"}]}', 1, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(31, 'project_name', 'Create creative product names:  ##description## \n\nSeed words: ##keywords## \n\n', 'project', '{\"field\":[{\"label\":\"Project Description\",\"placeholder\":\"e.g.Efficiency and Optimization,Business Growth and Expansion\",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 0, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(32, 'name', 'Generate a task name for a project in an ##project_name##, specifically related to ##instruction##.', 'project task', '{\"field\":[{\"label\":\"Project name\",\"placeholder\":\"e.g.Solving Problems\",\"field_type\":\"text_box\",\"field_name\":\"project_name\"},{\"label\":\"Task Instruction\",\"placeholder\":\"e.g.Data Analysis\",\"field_type\":\"textarea\",\"field_name\":\"instruction\"}]}', 0, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(33, 'title', 'Generate a milestone name for a ##project_name##,specifically related to ##instruction##.', 'project milestone', '{\"field\":[{\"label\":\"Milestone Description\",\"placeholder\":\"e.g.Design Approved\",\"field_type\":\"textarea\",\"field_name\":\"description\"},{\"label\":\" Instruction\",\"placeholder\":\"e.g. incorporated feedback and revisions\",\"field_type\":\"textarea\",\"field_name\":\"instruction\"}]}', 0, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(34, 'title', 'You are a software developer working on a platform or service, and you\'re experiencing a bug where ##description##. You need to come up with a descriptive bug title for this issue. Please generate a few bug titles that could be used to report this problem.', 'project bug', '{\"field\":[{\"label\":\"Description of Bug\",\"placeholder\":\"e.g.identify bugs and issues\",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 0, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(35, 'description', 'Write a long creative product description for: ##title## \n\nTarget audience is: ##audience## \n\nUse this description: ##description## \n\nTone of generated text must be:\n ##tone_language## \n\n', 'productservice', '{\"field\":[{\"label\":\"Product name\",\"placeholder\":\"e.g. VR, Honda\",\"field_type\":\"text_box\",\"field_name\":\"title\"},{\"label\":\"Audience\",\"placeholder\":\"e.g. Women, Aliens\",\"field_type\":\"text_box\",\"field_name\":\"audience\"},{\"label\":\"Product Description\",\"placeholder\":\"e.g. VR is an innovative device that can allow you to be part of virtual world\",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 1, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(36, 'name', 'generate warehouse name for ##description##', 'warehouse', '{\"field\":[{\"label\":\" Description \",\"placeholder\":\"e.g. North Warehouse\",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 0, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(37, 'subject', 'generate example of  subject for bug in ecommerce base website support ticket', 'support', '{\"field\":[{\"label\":\"Ticket Description of Bug\",\"placeholder\":\"e.g.Bug Summary\",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 0, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(38, 'description', 'generate support ticket description of  subject for ##subject## ', 'support', '{\"field\":[{\"label\":\"Ticket Subject\",\"placeholder\":\"e.g.Error Message Displayed\",\"field_type\":\"textarea\",\"field_name\":\"subject\"}]}', 1, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(39, 'title', 'Generate a list of Zoom meeting topics for ##description## metting. The purpose of the meeting is to  ##description##. Structure the topics to ensure a productive discussion.', 'zoom meeting', '{\"field\":[{\"label\":\"Meeting description \",\"placeholder\":\"e.g.Remote Collaboration\",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 0, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(40, 'content', 'Generate a meeting notification message for an ##topic## meeting. Include the date, time, location, and a brief agenda with three key discussion points.', 'notification template', '{\"field\":[{\"label\":\"Notification Message\",\"placeholder\":\"e.g.brief explanation of the purpose or background of the notification\",\"field_type\":\"textarea\",\"field_name\":\"topic\"}]}', 0, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(41, 'name', 'please suggest subscription plan  name  for this  :  ##description##  for my business', 'plan', '{\"field\":[{\"label\":\"What is your plan about?\",\"placeholder\":\"e.g. Describe your plan details \",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 0, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(42, 'description', 'please suggest subscription plan  description  for this  :  ##title##:  for my business', 'plan', '{\"field\":[{\"label\":\"What is your plan title?\",\"placeholder\":\"e.g. Pro Resller,Exclusive Access\",\"field_type\":\"text_box\",\"field_name\":\"title\"}]}', 1, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(43, 'name', 'give 10 catchy only name of Offer or discount Coupon for : ##keywords##', 'coupon', '{\"field\":[{\"label\":\"Seed words\",\"placeholder\":\"e.g.coupon will provide you with a discount on your selected plan\",\"field_type\":\"text_box\",\"field_name\":\"keywords\"}]}', 0, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(44, 'meta_title', 'Write SEO meta title for:\n\n ##description## \n\nWebsite name is:\n ##title## \n\nSeed words:\n ##keywords## \n\n', 'seo', '{\"field\":[{\"label\":\"Website Name\",\"placeholder\":\"e.g. Amazon, Google\",\"field_type\":\"text_box\",\"field_name\":\"title\"},{\"label\":\"Website Description\",\"placeholder\":\"e.g. Describe what your website or business do\",\"field_type\":\"textarea\",\"field_name\":\"description\"},{\"label\":\"Keywords\",\"placeholder\":\"e.g.  cloud services, databases\",\"field_type\":\"text_box\",\"field_name\":\"keywords\"}]}', 0, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(45, 'meta_desc', 'Write SEO meta description for:\n\n ##description## \n\nWebsite name is:\n ##title## \n\nSeed words:\n ##keywords## \n\n', 'seo', '{\"field\":[{\"label\":\"Website Name\",\"placeholder\":\"e.g. Amazon, Google\",\"field_type\":\"text_box\",\"field_name\":\"title\"},{\"label\":\"Website Description\",\"placeholder\":\"e.g. Describe what your website or business do\",\"field_type\":\"textarea\",\"field_name\":\"description\"},{\"label\":\"Keywords\",\"placeholder\":\"e.g.  cloud services, databases\",\"field_type\":\"text_box\",\"field_name\":\"keywords\"}]}', 1, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(46, 'cookie_title', 'please suggest me cookie title for this ##description## website which i can use in my website cookie', 'cookie', '{\"field\":[{\"label\":\"Website name or info\",\"placeholder\":\"e.g. example website \",\"field_type\":\"textarea\",\"field_name\":\"title\"}]}', 0, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(47, 'cookie_description', 'please suggest me  Cookie description for this cookie title ##title##  which i can use in my website cookie', 'cookie', '{\"field\":[{\"label\":\"Cookie Title \",\"placeholder\":\"e.g. example website \",\"field_type\":\"text_box\",\"field_name\":\"title\"}]}', 1, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(48, 'strictly_cookie_title', 'please suggest me only Strictly Cookie Title for this ##description## website which i can use in my website cookie', 'cookie', '{\"field\":[{\"label\":\"Website name or info\",\"placeholder\":\"e.g. example website \",\"field_type\":\"textarea\",\"field_name\":\"title\"}]}', 0, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(49, 'strictly_cookie_description', 'please suggest me Strictly Cookie description for this Strictly cookie title ##title##  which i can use in my website cookie', 'cookie', '{\"field\":[{\"label\":\"Strictly Cookie Title \",\"placeholder\":\"e.g. example website \",\"field_type\":\"text_box\",\"field_name\":\"title\"}]}', 1, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(50, 'more_information_description', 'I need assistance in crafting compelling content for my ##web_name## website\'s \'Contact Us\' page of my website. The page should provide relevant information to users, encourage them to reach out for inquiries, support, and feedback, and reflect the unique value proposition of my business.', 'cookie', '{\"field\":[{\"label\":\"Websit Name\",\"placeholder\":\"e.g. example website \",\"field_type\":\"text_box\",\"field_name\":\"web_name\"}]}', 1, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(51, 'content', 'generate email template for ##type##', 'email template', '{\"field\":[{\"label\":\"Email Type\",\"placeholder\":\"e.g. new user,new client\",\"field_type\":\"text_box\",\"field_name\":\"type\"}]}', 1, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(52, 'note', 'Generate short description Note for lead ##description##', 'lead', '{\"field\":[{\"label\":\"Lead description\",\"placeholder\":\"e.g. create notes for lead user \",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 1, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(53, 'description', 'Generate a short note summarizing the key points discussed during a lead ##name## call. The purpose of the note is to capture important details and action items discussed with the ##name## lead. Please structure the note in a concise and organized manner.', 'lead', '{\"field\":[{\"label\":\"Lead name\",\"placeholder\":\"e.g. create description for lead user \",\"field_type\":\"textarea\",\"field_name\":\"name\"}]}', 1, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(54, 'note', 'Generate short description Note for deal ##description##', 'deal', '{\"field\":[{\"label\":\"Deal description\",\"placeholder\":\"e.g.create note for deal client\",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 1, '2024-07-01 11:36:17', '2024-07-01 11:36:17'),
(55, 'description', 'Generate a short note summarizing a deal call. Imagine you just had a call with a potential client or partner to discuss a ##description## deal. Write a concise summary of the key points discussed during the call. Include the important details such as the client\'s name, the purpose of the call, any agreements or decisions made, and next steps to be taken.', 'deal', '{\"field\":[{\"label\":\"Deal name\",\"placeholder\":\"e.g. Establishing Communication \",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 1, '2024-07-01 11:36:17', '2024-07-01 11:36:17');

-- --------------------------------------------------------

--
-- Table structure for table `terminations`
--

DROP TABLE IF EXISTS `terminations`;
CREATE TABLE IF NOT EXISTS `terminations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` int NOT NULL DEFAULT '0',
  `notice_date` date NOT NULL,
  `termination_date` date NOT NULL,
  `termination_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terminations`
--

INSERT INTO `terminations` (`id`, `employee_id`, `notice_date`, `termination_date`, `termination_type`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, '1979-07-31', '2008-07-07', '1', 'Fuga Sequi culpa an', 1, '2024-07-10 10:19:24', '2024-07-10 10:19:24');

-- --------------------------------------------------------

--
-- Table structure for table `termination_types`
--

DROP TABLE IF EXISTS `termination_types`;
CREATE TABLE IF NOT EXISTS `termination_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `termination_types`
--

INSERT INTO `termination_types` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Logan Hull', 1, '2024-07-10 10:13:31', '2024-07-10 10:13:31');

-- --------------------------------------------------------

--
-- Table structure for table `timesheets`
--

DROP TABLE IF EXISTS `timesheets`;
CREATE TABLE IF NOT EXISTS `timesheets` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_id` int NOT NULL,
  `task_id` int NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `time` time NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `time_trackers`
--

DROP TABLE IF EXISTS `time_trackers`;
CREATE TABLE IF NOT EXISTS `time_trackers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_id` int DEFAULT NULL,
  `task_id` int DEFAULT NULL,
  `tag_id` text COLLATE utf8mb4_unicode_ci,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_billable` int NOT NULL DEFAULT '0',
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `total_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `is_active` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `track_photos`
--

DROP TABLE IF EXISTS `track_photos`;
CREATE TABLE IF NOT EXISTS `track_photos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `track_id` int NOT NULL DEFAULT '0',
  `user_id` int NOT NULL DEFAULT '0',
  `img_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

DROP TABLE IF EXISTS `trainers`;
CREATE TABLE IF NOT EXISTS `trainers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `branch` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `expertise` text COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `branch`, `firstname`, `lastname`, `contact`, `email`, `address`, `expertise`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '1', 'Merrill', 'Lee', 'Dignissimos rem duci', 'zawoqibur@mailinator.com', 'Fuga Est saepe quo', 'Aliquid dolor duis q', 1, '2024-07-10 10:17:22', '2024-07-10 10:17:22');

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

DROP TABLE IF EXISTS `trainings`;
CREATE TABLE IF NOT EXISTS `trainings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `branch` int NOT NULL,
  `trainer_option` int NOT NULL,
  `training_type` int NOT NULL,
  `trainer` int NOT NULL,
  `training_cost` double(8,2) NOT NULL DEFAULT '0.00',
  `employee` int NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `performance` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '0',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`id`, `branch`, `trainer_option`, `training_type`, `trainer`, `training_cost`, `employee`, `start_date`, `end_date`, `description`, `performance`, `status`, `remarks`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 55.00, 1, '1998-04-23', '2002-03-03', 'Vel voluptate id eum', 0, 0, NULL, 1, '2024-07-10 10:17:41', '2024-07-10 10:17:41');

-- --------------------------------------------------------

--
-- Table structure for table `training_types`
--

DROP TABLE IF EXISTS `training_types`;
CREATE TABLE IF NOT EXISTS `training_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `training_types`
--

INSERT INTO `training_types` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Joelle Sawyer', 1, '2024-07-10 10:13:10', '2024-07-10 10:13:10');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` int NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(16,2) NOT NULL DEFAULT '0.00',
  `description` text COLLATE utf8mb4_unicode_ci,
  `date` date NOT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `payment_id` int NOT NULL DEFAULT '0',
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_lines`
--

DROP TABLE IF EXISTS `transaction_lines`;
CREATE TABLE IF NOT EXISTS `transaction_lines` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `account_id` int NOT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_id` int NOT NULL,
  `reference_sub_id` int NOT NULL,
  `date` date NOT NULL,
  `credit` decimal(15,2) NOT NULL DEFAULT '0.00',
  `debit` decimal(15,2) NOT NULL DEFAULT '0.00',
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

DROP TABLE IF EXISTS `transfers`;
CREATE TABLE IF NOT EXISTS `transfers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` int NOT NULL DEFAULT '0',
  `branch_id` int NOT NULL DEFAULT '0',
  `department_id` int NOT NULL DEFAULT '0',
  `transfer_date` date NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`id`, `employee_id`, `branch_id`, `department_id`, `transfer_date`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2015-10-19', 'Eaque quaerat volupt', '1', '2024-07-10 10:18:12', '2024-07-10 10:18:12');

-- --------------------------------------------------------

--
-- Table structure for table `travels`
--

DROP TABLE IF EXISTS `travels`;
CREATE TABLE IF NOT EXISTS `travels` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` int NOT NULL DEFAULT '0',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `purpose_of_visit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_of_visit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `travels`
--

INSERT INTO `travels` (`id`, `employee_id`, `start_date`, `end_date`, `purpose_of_visit`, `place_of_visit`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, '1994-01-01', '2005-12-24', 'Totam tempora et dol', 'Expedita excepturi q', 'Tempor enim irure nu', '1', '2024-07-10 10:18:35', '2024-07-10 10:18:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan` int DEFAULT NULL,
  `plan_expire_date` date DEFAULT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `messenger_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#2180f3',
  `lang` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `default_pipeline` int DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '0',
  `delete_status` int NOT NULL DEFAULT '1',
  `mode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'light',
  `dark_mode` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` int NOT NULL DEFAULT '1',
  `last_login_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `otp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp_expires_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_unique` (`phone`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `plan`, `plan_expire_date`, `type`, `avatar`, `messenger_color`, `lang`, `created_by`, `default_pipeline`, `active_status`, `delete_status`, `mode`, `dark_mode`, `is_active`, `last_login_at`, `remember_token`, `created_at`, `updated_at`, `otp`, `otp_expires_at`) VALUES
(1, 'company', 'company@example.com', '', NULL, '$2y$10$02v5UMkxAkgTCAZFk.WcHuxxSIaynsn1pipffCewVu.LYlDQnGVJm', 1, NULL, 'company', '', '#2180f3', 'en', 1, 1, 0, 1, 'light', 0, 1, '2024-07-24 14:25:09', NULL, '2024-07-01 11:36:06', '2024-07-24 13:25:09', NULL, NULL),
(3, 'Pearl Perry', 'wuse@mailinator.com', '+1 (507) 285-6753', NULL, '$2y$10$A6YjITnDeTmbsd/Kq5ApQuVSrqfW8O9E0l7FF46gsnx.nCqIc.hgi', NULL, NULL, 'employee', 'avatar.png', '#2180f3', 'en', 1, NULL, 0, 1, 'light', 0, 1, NULL, NULL, '2024-07-05 09:08:46', '2024-07-05 09:08:46', NULL, NULL),
(4, 'Zachary Stewart', 'sirimiw@mailinator.com', '+1 (541) 682-4416', NULL, '$2y$10$Kpv5Q04kv31nLd/zZ8u1KujF9tFg/9UscgE4RxdTzzKAZxH7lB8Ri', NULL, NULL, 'client', 'avatar.png', '#2180f3', 'en', 1, NULL, 0, 1, 'light', 0, 1, NULL, NULL, '2024-07-10 10:24:43', '2024-07-10 10:24:43', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_contacts`
--

DROP TABLE IF EXISTS `user_contacts`;
CREATE TABLE IF NOT EXISTS `user_contacts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_coupons`
--

DROP TABLE IF EXISTS `user_coupons`;
CREATE TABLE IF NOT EXISTS `user_coupons` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user` int NOT NULL,
  `coupon` int NOT NULL,
  `order` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_deals`
--

DROP TABLE IF EXISTS `user_deals`;
CREATE TABLE IF NOT EXISTS `user_deals` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `deal_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_deals_user_id_foreign` (`user_id`),
  KEY `user_deals_deal_id_foreign` (`deal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_email_templates`
--

DROP TABLE IF EXISTS `user_email_templates`;
CREATE TABLE IF NOT EXISTS `user_email_templates` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `template_id` int NOT NULL,
  `user_id` int NOT NULL,
  `is_active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_leads`
--

DROP TABLE IF EXISTS `user_leads`;
CREATE TABLE IF NOT EXISTS `user_leads` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `lead_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_leads_user_id_foreign` (`user_id`),
  KEY `user_leads_lead_id_foreign` (`lead_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_to_dos`
--

DROP TABLE IF EXISTS `user_to_dos`;
CREATE TABLE IF NOT EXISTS `user_to_dos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_complete` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `venders`
--

DROP TABLE IF EXISTS `venders`;
CREATE TABLE IF NOT EXISTS `venders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `vender_id` int NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_by` int NOT NULL DEFAULT '0',
  `is_active` int NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `billing_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_zip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address` text COLLATE utf8mb4_unicode_ci,
  `shipping_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_zip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `balance` double(8,2) NOT NULL DEFAULT '0.00',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `venders_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `venders`
--

INSERT INTO `venders` (`id`, `vender_id`, `name`, `email`, `tax_number`, `password`, `contact`, `avatar`, `created_by`, `is_active`, `email_verified_at`, `billing_name`, `billing_country`, `billing_state`, `billing_city`, `billing_phone`, `billing_zip`, `billing_address`, `shipping_name`, `shipping_country`, `shipping_state`, `shipping_city`, `shipping_phone`, `shipping_zip`, `shipping_address`, `lang`, `balance`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Solomon Webster', 'darimij@mailinator.com', '455', NULL, '17', '', 1, 1, NULL, 'Aimee Watts', 'Ipsam esse et nostru', 'Quaerat molestiae eu', 'Dolore amet sit con', '+1 (854) 953-7109', '77241', 'Laudantium necessit', 'Sade Yang', 'Et harum dolores vol', 'Quia deserunt blandi', 'Delectus ea hic aut', '+1 (148) 626-7099', '16783', 'Ut aliquip voluptate', '', 0.00, NULL, '2024-07-10 10:26:22', '2024-07-10 10:26:22');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

DROP TABLE IF EXISTS `warehouses`;
CREATE TABLE IF NOT EXISTS `warehouses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_zip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`, `address`, `city`, `city_zip`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Yardley Ballard', 'Maxime eum totam rer', 'Laboriosam qui qui', '44045', 1, '2024-07-10 10:26:35', '2024-07-10 10:26:35');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_products`
--

DROP TABLE IF EXISTS `warehouse_products`;
CREATE TABLE IF NOT EXISTS `warehouse_products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `warehouse_id` int NOT NULL DEFAULT '0',
  `product_id` int NOT NULL DEFAULT '0',
  `quantity` double(25,2) NOT NULL DEFAULT '0.00',
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_transfers`
--

DROP TABLE IF EXISTS `warehouse_transfers`;
CREATE TABLE IF NOT EXISTS `warehouse_transfers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `from_warehouse` int NOT NULL DEFAULT '0',
  `to_warehouse` int NOT NULL DEFAULT '0',
  `product_id` int NOT NULL DEFAULT '0',
  `quantity` int NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `warnings`
--

DROP TABLE IF EXISTS `warnings`;
CREATE TABLE IF NOT EXISTS `warnings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `warning_to` int NOT NULL,
  `warning_by` int NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warning_date` date NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warnings`
--

INSERT INTO `warnings` (`id`, `warning_to`, `warning_by`, `subject`, `warning_date`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Aliquid quis debitis', '1988-07-19', 'Pariatur Ut sed tem', '1', '2024-07-10 10:19:12', '2024-07-10 10:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `webhook_settings`
--

DROP TABLE IF EXISTS `webhook_settings`;
CREATE TABLE IF NOT EXISTS `webhook_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `module` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zoom_meetings`
--

DROP TABLE IF EXISTS `zoom_meetings`;
CREATE TABLE IF NOT EXISTS `zoom_meetings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meeting_id` int NOT NULL DEFAULT '0',
  `project_id` int NOT NULL DEFAULT '0',
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` int NOT NULL DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `duration` int NOT NULL DEFAULT '0',
  `start_url` text COLLATE utf8mb4_unicode_ci,
  `join_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'waiting',
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
