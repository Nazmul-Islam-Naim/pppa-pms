-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 29, 2022 at 06:13 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mazar_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

DROP TABLE IF EXISTS `account_type`;
CREATE TABLE IF NOT EXISTS `account_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`id`, `branch_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'ddd', 1, '2022-01-09 04:57:10', '2022-01-09 04:57:10'),
(2, 1, 'sving', 1, '2022-01-26 07:06:32', '2022-01-26 07:06:32');

-- --------------------------------------------------------

--
-- Table structure for table `apartments`
--

DROP TABLE IF EXISTS `apartments`;
CREATE TABLE IF NOT EXISTS `apartments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `apartment_no` varchar(191) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `description` text,
  `base_price` decimal(15,2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '2=>Assigned',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apartments`
--

INSERT INTO `apartments` (`id`, `apartment_no`, `project_id`, `image`, `description`, `base_price`, `status`, `created_at`, `updated_at`) VALUES
(1, '123', 1, NULL, 'dfff', '10000.00', 2, '2022-03-06 01:21:54', '2022-03-06 01:36:25'),
(2, '234', 2, NULL, 'werr', '3444.00', 1, '2022-03-06 01:21:54', '2022-03-06 01:35:13');

-- --------------------------------------------------------

--
-- Table structure for table `apartment_bill`
--

DROP TABLE IF EXISTS `apartment_bill`;
CREATE TABLE IF NOT EXISTS `apartment_bill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL,
  `month_id` int(11) DEFAULT NULL,
  `year` varchar(191) DEFAULT NULL,
  `rent_bill` decimal(15,2) DEFAULT NULL,
  `water_bill` decimal(15,2) DEFAULT NULL,
  `gas_bill` decimal(15,2) DEFAULT NULL,
  `total_bill` decimal(15,2) DEFAULT NULL,
  `paid_amount` decimal(15,2) DEFAULT '0.00',
  `created_by` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=> Bill Created, 0=> Paid',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apartment_bill`
--

INSERT INTO `apartment_bill` (`id`, `member_id`, `month_id`, `year`, `rent_bill`, `water_bill`, `gas_bill`, `total_bill`, `paid_amount`, `created_by`, `status`, `created_at`, `updated_at`) VALUES
(3, 15, 1, '2022', '500.00', '0.00', '0.00', '500.00', '500.00', 1, 1, '2022-03-06 05:16:08', '2022-03-07 05:42:33'),
(4, 15, 6, '2022', '500.00', '0.00', '0.00', NULL, '0.00', 1, 1, '2022-03-07 03:18:59', '2022-03-07 03:18:59'),
(5, 15, 9, '2022', '5.00', '6.00', '6.00', '17.00', '0.00', 1, 1, '2022-03-07 03:40:48', '2022-03-07 03:40:48'),
(6, 15, 8, '2022', '10000.00', '1000.00', '1500.00', '12500.00', '12500.00', 1, 1, '2022-03-07 03:59:36', '2022-03-07 05:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `apartment_bill_payment`
--

DROP TABLE IF EXISTS `apartment_bill_payment`;
CREATE TABLE IF NOT EXISTS `apartment_bill_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(191) DEFAULT NULL,
  `bill_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `month_id` int(11) DEFAULT NULL,
  `year` varchar(191) DEFAULT NULL,
  `paid_amount` decimal(15,2) DEFAULT '0.00',
  `payment_method` int(11) DEFAULT NULL,
  `created_by` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=> paid',
  `tok` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apartment_bill_payment`
--

INSERT INTO `apartment_bill_payment` (`id`, `date`, `bill_id`, `member_id`, `month_id`, `year`, `paid_amount`, `payment_method`, `created_by`, `status`, `tok`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 15, 3, '2022', '10000.00', 1, 1, 1, '20220306073713', '2022-03-06 01:37:13', '2022-03-06 01:37:13'),
(2, '2022-03-07', 3, 15, 1, '2022', '500.00', NULL, 1, 1, '20220307114233', '2022-03-07 05:42:33', '2022-03-07 05:42:33'),
(3, '2022-03-07', 6, 15, 8, '2022', '12500.00', 1, 1, 1, '20220307114336', '2022-03-07 05:43:36', '2022-03-07 05:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `apartment_member_ledger`
--

DROP TABLE IF EXISTS `apartment_member_ledger`;
CREATE TABLE IF NOT EXISTS `apartment_member_ledger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL COMMENT 'sell(bill), receive',
  `invoice_no` varchar(191) DEFAULT NULL,
  `tok` varchar(255) DEFAULT NULL,
  `bill_id` int(11) DEFAULT NULL,
  `created_by` tinyint(2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apartment_member_ledger`
--

INSERT INTO `apartment_member_ledger` (`id`, `branch_id`, `date`, `bank_id`, `customer_id`, `amount`, `reason`, `invoice_no`, `tok`, `bill_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-03-06', 1, 15, '10000.00', 'Apartment bill paid', NULL, NULL, 1, 1, '2022-03-06 01:37:13', '2022-03-06 01:37:13'),
(2, 1, '2022-03-07', 0, 15, '17.00', 'Apartment bill Created', NULL, NULL, 5, 1, '2022-03-07 03:40:48', '2022-03-07 03:40:48'),
(3, 1, '2022-03-07', 0, 15, '12500.00', 'Apartment bill Created', NULL, NULL, 6, 1, '2022-03-07 03:59:36', '2022-03-07 03:59:36'),
(4, 1, '2022-03-07', 1, 15, '500.00', 'Apartment bill paid', NULL, NULL, 3, 1, '2022-03-07 05:42:33', '2022-03-07 05:42:33'),
(5, 1, '2022-03-07', 1, 15, '12500.00', 'Apartment bill paid', NULL, NULL, 6, 1, '2022-03-07 05:43:36', '2022-03-07 05:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

DROP TABLE IF EXISTS `assets`;
CREATE TABLE IF NOT EXISTS `assets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_type_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `details` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `asset_type_id`, `name`, `location`, `area`, `details`, `created_at`, `updated_at`) VALUES
(1, 0, 'Madrasa Area', 'Mirpur', '2.3', 'Mirpur Updated', '2022-03-07 07:07:36', '2022-03-07 07:07:45'),
(2, 1, 'abcd', NULL, NULL, NULL, '2022-03-08 05:00:18', '2022-03-08 05:00:18');

-- --------------------------------------------------------

--
-- Table structure for table `assets_mamla`
--

DROP TABLE IF EXISTS `assets_mamla`;
CREATE TABLE IF NOT EXISTS `assets_mamla` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_id` int(11) DEFAULT NULL,
  `mamla_no` varchar(255) DEFAULT NULL,
  `complainant` varchar(255) DEFAULT NULL,
  `defendant` varchar(255) DEFAULT NULL,
  `details` text,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assets_mamla`
--

INSERT INTO `assets_mamla` (`id`, `asset_id`, `mamla_no`, `complainant`, `defendant`, `details`, `status`, `created_at`, `updated_at`) VALUES
(4, 2, '102', 'naim', 'amit', 'asset_id asset_id asset_id asset_id asset_id asset_id asset_id asset_id  asset_id asset_id asset_id asset_id asset_id asset_id asset_id asset_id \r\nasset_id asset_id asset_id asset_id asset_id asset_id asset_id asset_id  asset_id asset_id asset_id asset_id asset_id asset_id asset_id asset_id', 1, '2022-03-08 05:49:06', '2022-03-08 05:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `assign_apartment`
--

DROP TABLE IF EXISTS `assign_apartment`;
CREATE TABLE IF NOT EXISTS `assign_apartment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `apartment_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assign_apartment`
--

INSERT INTO `assign_apartment` (`id`, `member_id`, `project_id`, `apartment_id`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 15, 1, 1, 1, 1, '2022-03-06 01:36:25', '2022-03-06 01:36:25');

-- --------------------------------------------------------

--
-- Table structure for table `bank_account`
--

DROP TABLE IF EXISTS `bank_account`;
CREATE TABLE IF NOT EXISTS `bank_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) DEFAULT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_type` int(11) DEFAULT NULL,
  `bank_branch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` decimal(15,2) DEFAULT NULL,
  `opening_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=>Active, 0=>Inactive',
  `created_by` int(11) DEFAULT NULL COMMENT 'User Id',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_account`
--

INSERT INTO `bank_account` (`id`, `branch_id`, `bank_name`, `account_name`, `account_no`, `account_type`, `bank_branch`, `balance`, `opening_date`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cash', 'Cash', 'Cash', 1, 'utt', '165077.00', '2022-01-26', 1, 1, '2022-01-26 07:06:49', '2022-02-28 04:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `bill_generate`
--

DROP TABLE IF EXISTS `bill_generate`;
CREATE TABLE IF NOT EXISTS `bill_generate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rent_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `market_id` int(11) DEFAULT NULL,
  `floor_id` int(11) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `issue_date` varchar(191) DEFAULT NULL,
  `rent_month` varchar(191) DEFAULT NULL,
  `rent_year` varchar(191) DEFAULT NULL,
  `monthly_rent` decimal(15,2) DEFAULT '0.00',
  `electricity_bill` decimal(15,2) DEFAULT '0.00',
  `service_charge` decimal(15,2) DEFAULT '0.00',
  `total_bill` decimal(15,2) DEFAULT '0.00',
  `total_paid` decimal(15,2) DEFAULT '0.00',
  `tok` varchar(191) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill_generate`
--

INSERT INTO `bill_generate` (`id`, `rent_id`, `customer_id`, `market_id`, `floor_id`, `shop_id`, `issue_date`, `rent_month`, `rent_year`, `monthly_rent`, `electricity_bill`, `service_charge`, `total_bill`, `total_paid`, `tok`, `created_by`, `created_at`, `updated_at`) VALUES
(10, 18, 14, 2, 1, 9, '2022-03-05', 'February', '2022', '500.00', '0.00', '0.00', '500.00', '500.00', '20220305101042', 1, '2022-03-05 04:10:42', '2022-03-05 04:10:42'),
(11, 17, 14, 1, 1, 7, '2022-03-05', 'February', '2022', '10.00', '0.00', '0.00', '10.00', '10.00', '20220305101042', 1, '2022-03-05 04:10:42', '2022-03-05 04:10:42'),
(12, 16, 14, 1, 1, 6, '2022-03-05', 'February', '2022', '500.00', '0.00', '0.00', '500.00', '0.00', '20220305101042', 1, '2022-03-05 04:10:42', '2022-03-05 04:10:42'),
(14, 18, 14, 2, 1, 9, '2022-03-05', 'March', '2022', '500.00', '0.00', '0.00', '500.00', '500.00', '20220305101441', 1, '2022-03-05 04:14:41', '2022-03-05 04:14:41'),
(15, 16, 14, 1, 1, 6, '2022-03-05', 'March', '2022', '500.00', '0.00', '0.00', '500.00', '0.00', '20220305101441', 1, '2022-03-05 04:14:41', '2022-03-05 04:14:41');

-- --------------------------------------------------------

--
-- Table structure for table `cheque_book`
--

DROP TABLE IF EXISTS `cheque_book`;
CREATE TABLE IF NOT EXISTS `cheque_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` int(11) DEFAULT NULL COMMENT 'Bank Id',
  `status` tinyint(1) DEFAULT NULL COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cheque_no`
--

DROP TABLE IF EXISTS `cheque_no`;
CREATE TABLE IF NOT EXISTS `cheque_no` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) DEFAULT NULL,
  `cheque_book` int(11) DEFAULT NULL,
  `cheque_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=>Active, 0=>Used',
  `tok` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

DROP TABLE IF EXISTS `currency`;
CREATE TABLE IF NOT EXISTS `currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `symbol` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `country`, `currency`, `code`, `symbol`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh', 'Bangladeshi Taka.', 'BDT', '৳', '2021-12-23 11:06:59', '2021-12-23 05:49:35');

-- --------------------------------------------------------

--
-- Table structure for table `customer_ledger`
--

DROP TABLE IF EXISTS `customer_ledger`;
CREATE TABLE IF NOT EXISTS `customer_ledger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL COMMENT 'sell(bill), receive',
  `invoice_no` varchar(191) DEFAULT NULL,
  `tok` varchar(255) DEFAULT NULL,
  `created_by` tinyint(2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_ledger`
--

INSERT INTO `customer_ledger` (`id`, `branch_id`, `date`, `bank_id`, `customer_id`, `amount`, `reason`, `invoice_no`, `tok`, `created_by`, `created_at`, `updated_at`) VALUES
(1, NULL, '2022/02/27', NULL, 14, '44.00', 'receive(Advance for Shop)', NULL, '20220227110510', NULL, '2022-02-27 05:08:05', '2022-02-27 05:08:05'),
(2, NULL, '2022/02/27', NULL, 14, '444.00', 'receive(Advance for Bill)', NULL, '20220227110510', NULL, '2022-02-27 05:08:05', '2022-02-27 05:08:05'),
(3, NULL, '2022/02/28', NULL, 14, '10000.00', 'receive(Advance for Shop)', NULL, '20220228071829', NULL, '2022-02-28 01:18:29', '2022-02-28 01:18:29'),
(4, NULL, '2022/02/28', NULL, 14, '1000.00', 'receive(Advance for Bill)', NULL, '20220228071829', NULL, '2022-02-28 01:18:29', '2022-02-28 01:18:29'),
(5, NULL, '2022/02/28', NULL, 14, '1000.00', 'receive(Advance for Shop)', NULL, '20220228101736', NULL, '2022-02-28 04:17:36', '2022-02-28 04:17:36'),
(6, NULL, '2022/02/28', NULL, 14, '1000.00', 'receive(Advance for Bill)', NULL, '20220228101736', NULL, '2022-02-28 04:17:36', '2022-02-28 04:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

DROP TABLE IF EXISTS `designations`;
CREATE TABLE IF NOT EXISTS `designations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Manager', 1, '2022-03-08 00:25:16', '2022-03-08 00:25:16'),
(2, 'Office Staff', 1, '2022-03-08 00:25:27', '2022-03-08 00:25:27');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joining_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `basic_salary` decimal(15,2) DEFAULT NULL,
  `employee_image` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `branch_id`, `employee_id`, `designation_id`, `name`, `email`, `joining_date`, `contact`, `address`, `basic_salary`, `employee_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1000, 1, 'abcd', 'abcd@gmail.com', '2022-03-05', '03979797', 'Uttara', '15000.00', NULL, 1, '2022-03-05 06:58:18', '2022-03-08 00:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `employee_ledger`
--

DROP TABLE IF EXISTS `employee_ledger`;
CREATE TABLE IF NOT EXISTS `employee_ledger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_id` int(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `month` varchar(191) DEFAULT NULL,
  `year` varchar(191) DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL COMMENT 'salary',
  `tok` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_by` tinyint(2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_ledger`
--

INSERT INTO `employee_ledger` (`id`, `bill_id`, `date`, `bank_id`, `employee_id`, `month`, `year`, `amount`, `reason`, `tok`, `note`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-02-09', 3, 1, 'January', '2022', '100.00', 'salary - ', '20220209100247', NULL, 2, '2022-02-09 04:02:47', '2022-02-09 04:02:47'),
(3, 5, '2022-03-06', 1, 1, 'May', '2022', '15000.00', 'salary - 444', '20220306122922', '444', 1, '2022-03-06 06:29:22', '2022-03-06 06:29:22');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_bill`
--

DROP TABLE IF EXISTS `employee_salary_bill`;
CREATE TABLE IF NOT EXISTS `employee_salary_bill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `paid_amount` decimal(15,2) DEFAULT '0.00',
  `month_name` varchar(191) DEFAULT NULL,
  `year_name` varchar(191) DEFAULT NULL,
  `note` text,
  `date` varchar(191) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_salary_bill`
--

INSERT INTO `employee_salary_bill` (`id`, `employee_id`, `amount`, `paid_amount`, `month_name`, `year_name`, `note`, `date`, `created_by`, `created_at`, `updated_at`) VALUES
(5, 1, '15000.00', '15000.00', 'May', '2022', NULL, '2022-03-06', 1, '2022-03-06 06:21:52', '2022-03-06 06:21:52');

-- --------------------------------------------------------

--
-- Table structure for table `floors`
--

DROP TABLE IF EXISTS `floors`;
CREATE TABLE IF NOT EXISTS `floors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floor_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `floors`
--

INSERT INTO `floors` (`id`, `name`, `floor_no`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'First', '1001', 'ss', 1, '2022-01-26 02:29:22', '2022-01-26 02:29:22');

-- --------------------------------------------------------

--
-- Table structure for table `hafeez`
--

DROP TABLE IF EXISTS `hafeez`;
CREATE TABLE IF NOT EXISTS `hafeez` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) DEFAULT NULL,
  `hafeez_type_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hafeez`
--

INSERT INTO `hafeez` (`id`, `branch_id`, `hafeez_type_id`, `name`, `phone`, `guardian_name`, `guardian_phone`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'abcd', NULL, NULL, NULL, 'Uttara', 1, '2022-03-05 06:58:18', '2022-03-08 00:50:37'),
(2, NULL, 1, 'Abcd', '74484787', 'Abcd updated', '4487', 'JJsjdjdj', 1, '2022-03-09 02:24:10', '2022-03-09 02:24:57');

-- --------------------------------------------------------

--
-- Table structure for table `hafeez_expense_voucher`
--

DROP TABLE IF EXISTS `hafeez_expense_voucher`;
CREATE TABLE IF NOT EXISTS `hafeez_expense_voucher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) DEFAULT NULL,
  `hafeez_type_id` int(11) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `payment_for` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `payment_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issue_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=>Active, 0=>Inactive',
  `created_by` int(11) DEFAULT NULL,
  `tok` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hafeez_expense_voucher`
--

INSERT INTO `hafeez_expense_voucher` (`id`, `branch_id`, `hafeez_type_id`, `bank_id`, `payment_for`, `amount`, `payment_date`, `issue_by`, `note`, `status`, `created_by`, `tok`, `created_at`, `updated_at`) VALUES
(6, 1, 1, 1, 'abcd', '1000.00', '2022-03-09', 'admin', 'sjhhj', 1, 1, '20220309093140', '2022-03-09 03:31:40', '2022-03-09 03:31:40');

-- --------------------------------------------------------

--
-- Table structure for table `hafeez_type`
--

DROP TABLE IF EXISTS `hafeez_type`;
CREATE TABLE IF NOT EXISTS `hafeez_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hafeez_type`
--

INSERT INTO `hafeez_type` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Hafeez 25\r\n', '2022-03-09 07:38:02', NULL),
(2, 'Hafeez 33', '2022-03-09 07:38:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `markets`
--

DROP TABLE IF EXISTS `markets`;
CREATE TABLE IF NOT EXISTS `markets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `dag_no` varchar(255) DEFAULT NULL,
  `address` text,
  `total_shop` int(11) DEFAULT NULL,
  `rental_shop` int(11) DEFAULT NULL,
  `sell_shop` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `markets`
--

INSERT INTO `markets` (`id`, `name`, `area`, `dag_no`, `address`, `total_shop`, `rental_shop`, `sell_shop`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Market 1', '555', '44', 'Uttara Dhaka', 55, 45, 5, 1, '2022-02-27 01:25:18', '2022-02-28 04:11:08'),
(2, 'Market 2', '666', '444', 'Market 1 Market 1 Market 1 Market 1 Market 1 Market 1 Market 1 Market 1 Market 1 updated', 4, 555, 5, 1, '2022-02-28 07:04:38', '2022-02-28 04:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(191) DEFAULT NULL,
  `module_address` varchar(191) DEFAULT NULL,
  `phone_number` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `setup_date` varchar(191) DEFAULT NULL,
  `builders_name` varchar(191) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `module_name`, `module_address`, `phone_number`, `email`, `setup_date`, `builders_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Market', 'Hazrat Sha Ali Mazar, Mirpur 01, Dhaka', '0167587696', 'hostel1@gmail.com', '2021-12-12', 'Hostel 1', 1, '2021-12-25 07:53:30', NULL),
(2, 'Mazar', 'Shah Jalal Mazar', '06573883', 'hostel2@gmail.com', '2021-12-12', 'Hostel 1', 1, '2021-12-25 07:53:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `other_payment_sub_type`
--

DROP TABLE IF EXISTS `other_payment_sub_type`;
CREATE TABLE IF NOT EXISTS `other_payment_sub_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) DEFAULT NULL,
  `payment_type_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_payment_sub_type`
--

INSERT INTO `other_payment_sub_type` (`id`, `branch_id`, `payment_type_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Daily 2 Dags Tobarok', 1, '2022-03-08 01:26:44', '2022-03-08 01:26:44'),
(2, 1, 1, '25 Jon Atim Ar Thaka Khawa', 1, '2022-03-08 01:27:12', '2022-03-08 01:27:12'),
(3, 1, 1, 'Beyarish Lash Dafon/Kafon', 1, '2022-03-08 01:28:02', '2022-03-08 01:28:02'),
(4, 1, 1, 'Arthik Onudan (Gorib Dukhi/Dhormio Prothisthan)', 1, '2022-03-08 01:28:51', '2022-03-08 01:28:51'),
(5, 1, 1, 'Boroder Kuran Shikkha (bad Esha)', 1, '2022-03-08 01:30:01', '2022-03-08 01:30:01'),
(6, 1, 1, 'Shisuder Moktob', 1, '2022-03-08 01:30:26', '2022-03-08 01:30:26'),
(7, 1, 1, 'Eid-ul-azha', 1, '2022-03-08 01:30:47', '2022-03-08 01:30:47'),
(8, 1, 1, 'Edit-ul-fitur', 1, '2022-03-08 01:30:58', '2022-03-08 01:30:58');

-- --------------------------------------------------------

--
-- Table structure for table `other_payment_type`
--

DROP TABLE IF EXISTS `other_payment_type`;
CREATE TABLE IF NOT EXISTS `other_payment_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_payment_type`
--

INSERT INTO `other_payment_type` (`id`, `branch_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Social Service', 1, '2022-03-08 01:25:45', '2022-03-08 01:25:45');

-- --------------------------------------------------------

--
-- Table structure for table `other_payment_voucher`
--

DROP TABLE IF EXISTS `other_payment_voucher`;
CREATE TABLE IF NOT EXISTS `other_payment_voucher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) DEFAULT NULL,
  `payment_type_id` int(11) DEFAULT NULL,
  `payment_sub_type_id` int(11) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `payment_for` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `payment_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issue_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=>Active, 0=>Inactive',
  `created_by` int(11) DEFAULT NULL,
  `tok` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_payment_voucher`
--

INSERT INTO `other_payment_voucher` (`id`, `branch_id`, `payment_type_id`, `payment_sub_type_id`, `bank_id`, `payment_for`, `amount`, `payment_date`, `issue_by`, `note`, `status`, `created_by`, `tok`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 'ddd', '200.00', '2022-03-08', 'ddd', 'ff', 1, 1, '20220308080041', '2022-03-08 02:00:41', '2022-03-08 02:00:41'),
(2, 1, 1, 1, 1, 'ff', '400.00', '2022-03-08', 'fff', 'f', 1, 1, '20220308081530', '2022-03-08 02:15:30', '2022-03-08 02:15:30'),
(3, 1, 1, 2, 1, 'rtt', '566.00', '2022-03-08', 'vgg', NULL, 1, 1, '20220308081636', '2022-03-08 02:16:36', '2022-03-08 02:16:36'),
(4, 1, 1, 3, 1, 'khawa', '677.00', '2022-03-08', 'khawa', 'khawa dawa', 1, 1, '20220308081750', '2022-03-08 02:17:50', '2022-03-08 02:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `other_receive_sub_type`
--

DROP TABLE IF EXISTS `other_receive_sub_type`;
CREATE TABLE IF NOT EXISTS `other_receive_sub_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) DEFAULT NULL,
  `receive_type_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_receive_sub_type`
--

INSERT INTO `other_receive_sub_type` (`id`, `branch_id`, `receive_type_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Khula Dokan', 1, '2022-03-08 02:57:52', '2022-03-08 02:57:52'),
(2, 1, 2, 'Palank', 1, '2022-03-08 04:01:33', '2022-03-08 04:01:33'),
(3, 1, 2, 'Milad Box', 1, '2022-03-08 04:01:48', '2022-03-08 04:01:48'),
(4, 1, 2, 'Shindhuk Hote Prapto', 1, '2022-03-08 04:02:02', '2022-03-08 04:02:02'),
(5, 1, 2, 'Domestic Animal Ezara', 1, '2022-03-08 04:02:32', '2022-03-08 04:02:32'),
(6, 1, 2, 'Agarbati/Mombati/Golapjol Ezara', 1, '2022-03-08 04:03:01', '2022-03-08 04:03:01'),
(7, 1, 2, 'Gono Souchagar Ezara', 1, '2022-03-08 04:03:24', '2022-03-08 04:03:24'),
(8, 1, 2, 'Daily Kachabazar Mati Vara', 1, '2022-03-08 04:03:36', '2022-03-08 04:04:36'),
(9, 1, 2, 'Dag Vara', 1, '2022-03-08 04:04:48', '2022-03-08 04:04:48');

-- --------------------------------------------------------

--
-- Table structure for table `other_receive_type`
--

DROP TABLE IF EXISTS `other_receive_type`;
CREATE TABLE IF NOT EXISTS `other_receive_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_receive_type`
--

INSERT INTO `other_receive_type` (`id`, `branch_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Vara', 1, '2022-03-08 02:57:39', '2022-03-08 02:57:39'),
(2, 1, 'Mazar Shorifer Income Source', 1, '2022-03-08 04:01:13', '2022-03-08 04:01:13');

-- --------------------------------------------------------

--
-- Table structure for table `other_receive_voucher`
--

DROP TABLE IF EXISTS `other_receive_voucher`;
CREATE TABLE IF NOT EXISTS `other_receive_voucher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) DEFAULT NULL,
  `receive_type_id` int(11) DEFAULT NULL,
  `receive_sub_type_id` int(11) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `receive_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `receive_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issue_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=>Active, 0=>Inactive',
  `created_by` int(11) DEFAULT NULL,
  `tok` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_receive_voucher`
--

INSERT INTO `other_receive_voucher` (`id`, `branch_id`, `receive_type_id`, `receive_sub_type_id`, `bank_id`, `receive_from`, `amount`, `receive_date`, `issue_by`, `note`, `status`, `created_by`, `tok`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 'kkk', '900.00', '2022-03-08', 'admin', 'jhjhj', 1, 1, '20220308090130', '2022-03-08 03:01:30', '2022-03-08 03:01:30'),
(2, 1, 1, 1, 1, 'gg', '4500.00', '2022-03-08', 'admin', 'ffgg', 1, 1, '20220308090223', '2022-03-08 03:02:23', '2022-03-08 03:02:23'),
(3, 1, 1, 1, 1, 'ddd', '600.00', '2022-03-08', 'admin', 'abcd', 1, 1, '20220308091054', '2022-03-08 03:10:54', '2022-03-08 03:10:54'),
(4, 1, 2, 6, 1, 'Admin', '600.00', '2022-03-08', 'Admin', 'fff', 1, 1, '20220308102141', '2022-03-08 04:21:41', '2022-03-08 04:21:41');

-- --------------------------------------------------------

--
-- Table structure for table `raw_markets`
--

DROP TABLE IF EXISTS `raw_markets`;
CREATE TABLE IF NOT EXISTS `raw_markets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tenant_name` varchar(255) DEFAULT NULL,
  `total_dokan` int(11) DEFAULT NULL,
  `rent_amount` decimal(15,2) DEFAULT NULL,
  `rent_for` int(11) DEFAULT NULL,
  `rent_type` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `raw_markets`
--

INSERT INTO `raw_markets` (`id`, `tenant_name`, `total_dokan`, `rent_amount`, `rent_for`, `rent_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Amit', 11, '1000.00', 0, 0, 1, '2022-03-08 06:38:56', '2022-03-08 06:38:56');

-- --------------------------------------------------------

--
-- Table structure for table `raw_markets_bill_collection`
--

DROP TABLE IF EXISTS `raw_markets_bill_collection`;
CREATE TABLE IF NOT EXISTS `raw_markets_bill_collection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) DEFAULT NULL,
  `tenant_id` int(11) DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `tok` varchar(255) DEFAULT NULL,
  `collect_by` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `raw_markets_bill_collection`
--

INSERT INTO `raw_markets_bill_collection` (`id`, `date`, `tenant_id`, `amount`, `note`, `tok`, `collect_by`, `status`, `created_at`, `updated_at`) VALUES
(3, '2022-03-09', 1, '50002.00', 'dd', '20220309064728', 1, 1, '2022-03-09 00:47:28', '2022-03-09 00:47:28'),
(4, '2022-03-09', 1, '555.00', 'tggg', '20220309064834', 1, 1, '2022-03-09 00:48:34', '2022-03-09 00:48:34');

-- --------------------------------------------------------

--
-- Table structure for table `rents`
--

DROP TABLE IF EXISTS `rents`;
CREATE TABLE IF NOT EXISTS `rents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `market_id` int(11) DEFAULT NULL,
  `floor_id` int(11) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `guarantor_name` varchar(191) DEFAULT NULL,
  `guarantor_phone` varchar(191) DEFAULT NULL,
  `guarantor_nid` varchar(191) DEFAULT NULL,
  `shop_advance_amount` decimal(15,2) DEFAULT '0.00',
  `bill_advance_amount` decimal(15,2) DEFAULT '0.00',
  `monthly_rent` decimal(15,2) DEFAULT NULL,
  `rent_duration` int(11) DEFAULT NULL,
  `rent_date` varchar(191) DEFAULT NULL,
  `aggrement_expire_date` varchar(191) DEFAULT NULL,
  `aggrement_photo` text,
  `aggrement` varchar(255) DEFAULT NULL,
  `tok` varchar(191) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rents`
--

INSERT INTO `rents` (`id`, `customer_id`, `bank_id`, `market_id`, `floor_id`, `shop_id`, `shop_name`, `guarantor_name`, `guarantor_phone`, `guarantor_nid`, `shop_advance_amount`, `bill_advance_amount`, `monthly_rent`, `rent_duration`, `rent_date`, `aggrement_expire_date`, `aggrement_photo`, `aggrement`, `tok`, `created_by`, `created_at`, `updated_at`) VALUES
(16, 14, 1, 1, 1, 6, 'Best IT 2', '11', '4444', NULL, '44.00', '444.00', '4.00', 2, '2022/02/27', '2022/02/27', '486270222110805.png_150270222110805.svg', 'fff', '20220227110510', 1, '2022-02-27 05:08:05', '2022-02-27 05:08:05'),
(17, 14, 1, 1, 1, 7, 'Best IT 3', 'Amit', '34555', NULL, '10000.00', '1000.00', '500.00', 2, '2022/02/28', '2024-02-28', '522280222071829.jpg_452280222071829.jpg', 'ffffffff', '20220228071829', 1, '2022-02-28 01:18:29', '2022-02-28 01:18:29'),
(18, 14, 1, 2, 1, 9, 'Best IT', 'AMit', '748787487', NULL, '1000.00', '1000.00', '500.00', 3, '2022/02/28', '2025-02-28', '101280222101736.jpg_410280222101736.jpg', 'jhjhdjhdjhdjh jgjdbjhuh', '20220228101736', 1, '2022-02-28 04:17:36', '2022-02-28 04:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `rent_bill_payment`
--

DROP TABLE IF EXISTS `rent_bill_payment`;
CREATE TABLE IF NOT EXISTS `rent_bill_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(191) DEFAULT NULL,
  `bill_id` int(11) DEFAULT NULL,
  `rent_list_id` int(11) DEFAULT NULL,
  `month_id` varchar(255) DEFAULT NULL,
  `year` varchar(191) DEFAULT NULL,
  `paid_amount` decimal(15,2) DEFAULT '0.00',
  `payment_method` int(11) DEFAULT NULL,
  `created_by` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=> paid',
  `tok` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rent_bill_payment`
--

INSERT INTO `rent_bill_payment` (`id`, `date`, `bill_id`, `rent_list_id`, `month_id`, `year`, `paid_amount`, `payment_method`, `created_by`, `status`, `tok`, `created_at`, `updated_at`) VALUES
(14, NULL, 7, 17, 'April', '2022', '100.00', 1, 1, 1, '20220228095319', '2022-02-28 03:53:19', '2022-02-28 03:53:19'),
(13, NULL, 6, 17, 'March', '2022', '16.00', 1, 1, 1, '20220228082122', '2022-02-28 02:21:22', '2022-02-28 02:42:03'),
(15, '2022-03-07', 10, 18, 'February', '2022', '500.00', 1, 1, 1, '20220307080008', '2022-03-07 02:00:08', '2022-03-07 02:00:08'),
(16, '2022-03-07', 11, 17, 'February', '2022', '10.00', 1, 1, 1, '20220307080023', '2022-03-07 02:00:23', '2022-03-07 02:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `rent_list_from_owner`
--

DROP TABLE IF EXISTS `rent_list_from_owner`;
CREATE TABLE IF NOT EXISTS `rent_list_from_owner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(191) DEFAULT NULL,
  `no_of_apartment` int(11) DEFAULT NULL,
  `address` text,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rent_list_from_owner`
--

INSERT INTO `rent_list_from_owner` (`id`, `project_name`, `no_of_apartment`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ddddd', 34, 'swe', 1, '2022-03-06 07:03:52', NULL),
(2, 'naim mia', 23, 'ddd', 1, '2022-03-06 01:21:28', '2022-03-06 01:21:28');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

DROP TABLE IF EXISTS `shops`;
CREATE TABLE IF NOT EXISTS `shops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `market_id` int(11) DEFAULT NULL,
  `shop_type_id` int(11) DEFAULT NULL,
  `room_no` varchar(191) DEFAULT NULL,
  `floor_id` int(11) DEFAULT NULL,
  `room_photos` text,
  `description` text,
  `slug` text,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `market_id`, `shop_type_id`, `room_no`, `floor_id`, `room_photos`, `description`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(6, 1, 1, '101', 1, NULL, '101', 'first-101-6', 0, '2022-02-27 02:14:52', '2022-02-27 05:08:05'),
(7, 1, 2, '202', 1, NULL, '202', 'first-202-7', 0, '2022-02-28 00:28:09', '2022-02-28 01:18:29'),
(8, 1, 2, '304', 1, NULL, '304', 'first-304-8', 1, '2022-02-28 00:28:53', '2022-02-28 00:28:54'),
(9, 2, 1, '1020', 1, NULL, '1020', 'first-1020-9', 0, '2022-02-28 04:12:52', '2022-02-28 04:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `shop_type`
--

DROP TABLE IF EXISTS `shop_type`;
CREATE TABLE IF NOT EXISTS `shop_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop_type`
--

INSERT INTO `shop_type` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Rental', 1, '2022-02-28 06:24:49', NULL),
(2, 'Sells', 1, '2022-02-28 06:24:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `site_setting`
--

DROP TABLE IF EXISTS `site_setting`;
CREATE TABLE IF NOT EXISTS `site_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_page_title` varchar(255) DEFAULT NULL,
  `hotel_name` varchar(255) DEFAULT NULL,
  `hotel_email` varchar(255) DEFAULT NULL,
  `hotel_phone` varchar(255) DEFAULT NULL,
  `hotel_website` varchar(255) DEFAULT NULL,
  `hotel_address` text,
  `management_fee` decimal(15,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_setting`
--

INSERT INTO `site_setting` (`id`, `site_page_title`, `hotel_name`, `hotel_email`, `hotel_phone`, `hotel_website`, `hotel_address`, `management_fee`, `created_at`, `updated_at`) VALUES
(1, 'CodexEco Hotel & Resort', 'CodexEco Hotel & Resort', 'codexeco@gmail.com', '1234567890', 'https://codexeco.com/', 'Colony Road, near Bikash Bharati High School.Jangal Khas.', '10.00', '2021-12-23 05:36:32', '2021-12-23 05:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `theme_setting`
--

DROP TABLE IF EXISTS `theme_setting`;
CREATE TABLE IF NOT EXISTS `theme_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `theme_id` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theme_setting`
--

INSERT INTO `theme_setting` (`id`, `user_id`, `theme_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2022-01-10 10:15:48', '2022-02-27 00:54:31'),
(2, 2, 1, '2022-01-10 10:16:02', NULL),
(3, 3, 1, '2022-01-10 10:16:10', NULL),
(4, 10, 1, '2022-01-30 11:05:23', NULL),
(5, 13, 3, '2022-02-27 03:52:03', '2022-02-27 03:52:03'),
(6, 14, 3, '2022-02-27 03:53:04', '2022-02-27 03:53:04'),
(7, 15, 3, '2022-03-06 00:12:22', '2022-03-06 00:12:22');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Receive, Payment',
  `amount` decimal(15,2) DEFAULT NULL,
  `tok` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=>Active, 0=>Inactive',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `branch_id`, `date`, `reason`, `amount`, `tok`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-01-26', 'Payment(Apartment Rent Advance)', '10000.00', '20220126075727', 1, 1, '2022-01-26 01:57:27', '2022-01-26 01:57:27'),
(2, 1, '2022-01-26', 'Receive(Member Bill Paid for Hostel)', '100.00', '20220126010700', 1, 1, '2022-01-26 07:07:00', '2022-01-26 07:07:00'),
(3, 1, '2022-01-26', 'Receive(Member Bill Paid for Hostel)', '50.00', '20220126011211', 1, 1, '2022-01-26 07:12:11', '2022-01-26 07:12:11'),
(4, 1, '2022-01-26', 'Payment(Bill Paid for Rent Apartment)', '100.00', '20220126014133', 1, 1, '2022-01-26 07:41:33', '2022-01-26 07:41:33'),
(5, 1, '2022-01-26', 'Payment(Bill Paid for Rent Apartment)', '100.00', '20220126014133', 1, 1, '2022-01-26 07:41:33', '2022-01-26 07:41:33'),
(6, 1, '2022-01-26', 'Payment(Bill Paid for Rent Apartment)', '100.00', '20220126014434', 1, 1, '2022-01-26 07:44:34', '2022-01-26 07:44:34'),
(7, 1, '2022-01-26', 'Payment(Bill Paid for Rent Apartment)', '200.00', '20220126014450', 1, 1, '2022-01-26 07:44:50', '2022-01-26 07:44:50'),
(8, 1, '2022-01-26', 'Payment(Bill Paid for Rent Apartment)', '1200.00', '20220126014527', 1, 1, '2022-01-26 07:45:27', '2022-01-26 07:45:27'),
(10, NULL, '2022/02/27', 'Receive(Advance for Shop)', '44.00', '20220227110510', 1, 1, '2022-02-27 05:08:05', '2022-02-27 05:08:05'),
(11, NULL, '2022/02/27', 'Receive(Advance for Bill)', '444.00', '20220227110510', 1, 1, '2022-02-27 05:08:05', '2022-02-27 05:08:05'),
(12, 1, '2022-02-27', 'Payment(Bill Collect for Shop)', '80.00', '20220227011821', 1, 1, '2022-02-27 07:18:21', '2022-02-27 07:18:21'),
(13, 1, '2022-02-27', 'Payment(Bill Collect for Shop)', '4.00', '20220227012014', 1, 1, '2022-02-27 07:20:14', '2022-02-27 07:20:14'),
(14, 1, '2022-02-27', 'Payment(Bill Collect for Shop)', '4.00', '20220227012413', 1, 1, '2022-02-27 07:24:13', '2022-02-27 07:24:13'),
(15, NULL, '2022/02/28', 'Receive(Advance for Shop)', '10000.00', '20220228071829', 1, 1, '2022-02-28 01:18:29', '2022-02-28 01:18:29'),
(16, NULL, '2022/02/28', 'Receive(Advance for Bill)', '1000.00', '20220228071829', 1, 1, '2022-02-28 01:18:29', '2022-02-28 01:18:29'),
(17, 1, '2022-02-28', 'Payment(Bill Collect for Shop)', '10.00', '20220228080228', 1, 1, '2022-02-28 02:02:28', '2022-02-28 02:02:28'),
(18, 1, '2022-02-28', 'Payment(Bill Collect for Shop)', '90.00', '20220228081408', 1, 1, '2022-02-28 02:14:08', '2022-02-28 02:14:08'),
(19, 1, '2022-02-28', 'Payment(Bill Collect for Shop)', '2.00', '20220228081435', 1, 1, '2022-02-28 02:14:35', '2022-02-28 02:14:35'),
(20, 1, '2022-02-28', 'Payment(Bill Collect for Shop)', '8.00', '20220228081828', 1, 1, '2022-02-28 02:18:28', '2022-02-28 02:18:28'),
(21, 1, '2022-02-28', 'Payment(Bill Collect for Shop)', '16.00', '20220228082122', 1, 1, '2022-02-28 02:21:22', '2022-02-28 02:42:03'),
(22, 1, '2022-02-28', 'Payment(Bill Collect for Shop)', '100.00', '20220228095319', 1, 1, '2022-02-28 03:53:19', '2022-02-28 03:53:19'),
(23, NULL, '2022/02/28', 'Receive(Advance for Shop)', '1000.00', '20220228101736', 1, 1, '2022-02-28 04:17:36', '2022-02-28 04:17:36'),
(24, NULL, '2022/02/28', 'Receive(Advance for Bill)', '1000.00', '20220228101736', 1, 1, '2022-02-28 04:17:36', '2022-02-28 04:17:36'),
(25, NULL, '2022/03/05', 'Payment(employee salary - abcd-fff)', '15000.00', '20220305013602', 1, 1, '2022-03-05 07:36:02', '2022-03-05 07:36:02'),
(26, 1, '2022-03-06', 'Receive(Member Bill Paid for Apartment)', '10000.00', '20220306073713', 1, 1, '2022-03-06 01:37:13', '2022-03-06 01:37:13'),
(27, NULL, '2022/03/06', 'Payment(employee salary - abcd-444)', '15000.00', '20220306122922', 1, 1, '2022-03-06 06:29:22', '2022-03-06 06:29:22'),
(28, 1, '2022-03-07', 'Payment(Bill Collect for Shop)', '500.00', '20220307080008', 1, 1, '2022-03-07 02:00:08', '2022-03-07 02:00:08'),
(29, 1, '2022-03-07', 'Payment(Bill Collect for Shop)', '10.00', '20220307080023', 1, 1, '2022-03-07 02:00:23', '2022-03-07 02:00:23'),
(30, 1, '2022-03-07', 'Receive(Member Bill Paid for Apartment)', '500.00', '20220307114233', 1, 1, '2022-03-07 05:42:33', '2022-03-07 05:42:33'),
(31, 1, '2022-03-07', 'Receive(Member Bill Paid for Apartment)', '12500.00', '20220307114336', 1, 1, '2022-03-07 05:43:36', '2022-03-07 05:43:36'),
(32, 1, '2022-03-08', 'Payment(others-Social Service)', '200.00', '20220308080041', 1, 1, '2022-03-08 02:00:41', '2022-03-08 02:00:41'),
(33, 1, '2022-03-08', 'Payment(Expense -Social Service(Daily 2 Dags Tobarok))', '400.00', '20220308081530', 1, 1, '2022-03-08 02:15:30', '2022-03-08 02:15:30'),
(34, 1, '2022-03-08', 'Payment(Social Service-25 Jon Atim Ar Thaka Khawa)', '566.00', '20220308081636', 1, 1, '2022-03-08 02:16:36', '2022-03-08 02:16:36'),
(35, 1, '2022-03-08', 'Payment(Social Service - Beyarish Lash Dafon/Kafon)', '677.00', '20220308081750', 1, 1, '2022-03-08 02:17:50', '2022-03-08 02:17:50'),
(36, 1, '2022-03-08', 'Receive(Vara - Daily 2 Dags Tobarok)', '900.00', '20220308090130', 1, 1, '2022-03-08 03:01:30', '2022-03-08 03:01:30'),
(37, 1, '2022-03-08', 'Receive(Vara - Khula Dokan)', '4500.00', '20220308090223', 1, 1, '2022-03-08 03:02:23', '2022-03-08 03:02:23'),
(38, 1, '2022-03-08', 'Receive(Vara - Khula Dokan)', '600.00', '20220308091054', 1, 1, '2022-03-08 03:10:54', '2022-03-08 03:10:54'),
(39, 1, '2022-03-08', 'Receive(Mazar Shorifer Income Source - Agarbati/Mombati/Golapjol Ezara)', '600.00', '20220308102141', 1, 1, '2022-03-08 04:21:41', '2022-03-08 04:21:41'),
(40, 1, '2022-03-09', 'Receive(From Temporary Kacha Bazar)', '5001.00', '20220309064645', 1, 1, '2022-03-09 00:46:45', '2022-03-09 00:46:45'),
(41, 1, '2022-03-09', 'Receive(From Temporary Kacha Bazar)', '50002.00', '20220309064728', 1, 1, '2022-03-09 00:47:28', '2022-03-09 00:47:28'),
(42, 1, '2022-03-09', 'Receive(From Temporary Kacha Bazar)', '555.00', '20220309064834', 1, 1, '2022-03-09 00:48:34', '2022-03-09 00:48:34'),
(43, 1, '2022-03-09', 'Payment(Hafeez 25\r\n)', '1000.00', '20220309093140', 1, 1, '2022-03-09 03:31:40', '2022-03-09 03:31:40');

-- --------------------------------------------------------

--
-- Table structure for table `transation_report`
--

DROP TABLE IF EXISTS `transation_report`;
CREATE TABLE IF NOT EXISTS `transation_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL COMMENT 'Bank Id',
  `transaction_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT '0.00',
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `tok` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=>Active, 0=>Inactive',
  `created_by` tinyint(2) DEFAULT NULL COMMENT 'User Id',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transation_report`
--

INSERT INTO `transation_report` (`id`, `branch_id`, `bank_id`, `transaction_date`, `amount`, `reason`, `note`, `tok`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-01-26', '10000.00', 'payment(Apartment Rent Advance)', '', '20220126075727', 1, 1, '2022-01-26 01:57:27', '2022-01-26 01:57:27'),
(2, 1, 1, '2022-01-26', '100000.00', 'Opening Balance', NULL, '20220126010649', 1, 1, '2022-01-26 07:06:49', '2022-01-26 07:06:49'),
(3, 1, 1, '2022-01-26', '100.00', 'receive(Member Bill Paid for Hostel)', '', '20220126010700', 1, 1, '2022-01-26 07:07:00', '2022-01-26 07:07:00'),
(4, 1, 1, '2022-01-26', '50.00', 'receive(Member Bill Paid for Hostel)', '', '20220126011211', 1, 1, '2022-01-26 07:12:11', '2022-01-26 07:12:11'),
(5, 1, 1, '2022-01-26', '100.00', 'payment(Bill Paid for Rent Apartment)', '', '20220126014133', 1, 1, '2022-01-26 07:41:33', '2022-01-26 07:41:33'),
(6, 1, 1, '2022-01-26', '100.00', 'payment(Bill Paid for Rent Apartment)', '', '20220126014133', 1, 1, '2022-01-26 07:41:33', '2022-01-26 07:41:33'),
(7, 1, 1, '2022-01-26', '100.00', 'payment(Bill Paid for Rent Apartment)', '', '20220126014434', 1, 1, '2022-01-26 07:44:35', '2022-01-26 07:44:35'),
(8, 1, 1, '2022-01-26', '200.00', 'payment(Bill Paid for Rent Apartment)', '', '20220126014450', 1, 1, '2022-01-26 07:44:50', '2022-01-26 07:44:50'),
(9, 1, 1, '2022-01-26', '1200.00', 'payment(Bill Paid for Rent Apartment)', '', '20220126014527', 1, 1, '2022-01-26 07:45:27', '2022-01-26 07:45:27'),
(11, NULL, 1, '2022/02/27', '44.00', 'receive(Advance for Shop)', NULL, '20220227110510', 1, 1, '2022-02-27 05:08:05', '2022-02-27 05:08:05'),
(12, NULL, 1, '2022/02/27', '444.00', 'receive(Advance for Bill)', NULL, '20220227110510', 1, 1, '2022-02-27 05:08:05', '2022-02-27 05:08:05'),
(13, 1, 1, '2022-02-27', '80.00', 'payment(Bill Collect for Shop)', '', '20220227011821', 1, 1, '2022-02-27 07:18:21', '2022-02-27 07:18:21'),
(14, 1, 1, '2022-02-27', '4.00', 'payment(Bill Collect for Shop)', '', '20220227012014', 1, 1, '2022-02-27 07:20:14', '2022-02-27 07:20:14'),
(15, 1, 1, '2022-02-27', '4.00', 'payment(Bill Collect for Shop)', '', '20220227012413', 1, 1, '2022-02-27 07:24:13', '2022-02-27 07:24:13'),
(16, NULL, 1, '2022/02/28', '10000.00', 'receive(Advance for Shop)', NULL, '20220228071829', 1, 1, '2022-02-28 01:18:29', '2022-02-28 01:18:29'),
(17, NULL, 1, '2022/02/28', '1000.00', 'receive(Advance for Bill)', NULL, '20220228071829', 1, 1, '2022-02-28 01:18:29', '2022-02-28 01:18:29'),
(18, 1, 1, '2022-02-28', '10.00', 'payment(Bill Collect for Shop)', '', '20220228080228', 1, 1, '2022-02-28 02:02:28', '2022-02-28 02:02:28'),
(19, 1, 1, '2022-02-28', '90.00', 'payment(Bill Collect for Shop)', '', '20220228081408', 1, 1, '2022-02-28 02:14:08', '2022-02-28 02:14:08'),
(20, 1, 1, '2022-02-28', '2.00', 'payment(Bill Collect for Shop)', '', '20220228081435', 1, 1, '2022-02-28 02:14:35', '2022-02-28 02:14:35'),
(21, 1, 1, '2022-02-28', '8.00', 'payment(Bill Collect for Shop)', '', '20220228081828', 1, 1, '2022-02-28 02:18:28', '2022-02-28 02:18:28'),
(22, 1, 1, '2022-02-28', '16.00', 'payment(Bill Collect for Shop)', '', '20220228082122', 1, 1, '2022-02-28 02:21:22', '2022-02-28 02:42:03'),
(23, 1, 1, '2022-02-28', '100.00', 'payment(Bill Collect for Shop)', '', '20220228095319', 1, 1, '2022-02-28 03:53:19', '2022-02-28 03:53:19'),
(24, NULL, 1, '2022/02/28', '1000.00', 'receive(Advance for Shop)', NULL, '20220228101736', 1, 1, '2022-02-28 04:17:36', '2022-02-28 04:17:36'),
(25, NULL, 1, '2022/02/28', '1000.00', 'receive(Advance for Bill)', NULL, '20220228101736', 1, 1, '2022-02-28 04:17:36', '2022-02-28 04:17:36'),
(26, NULL, 1, '2022/03/05', '15000.00', 'payment(employee salary -abcd-fff)', 'fff', '20220305013602', 1, 1, '2022-03-05 07:36:02', '2022-03-05 07:36:02'),
(27, 1, 1, '2022-03-06', '10000.00', 'receive(Member Bill Paid for Apartment)', '', '20220306073713', 1, 1, '2022-03-06 01:37:13', '2022-03-06 01:37:13'),
(28, NULL, 1, '2022/03/06', '15000.00', 'payment(employee salary -abcd-444)', '444', '20220306122922', 1, 1, '2022-03-06 06:29:22', '2022-03-06 06:29:22'),
(29, 1, 1, '2022-03-07', '500.00', 'payment(Bill Collect for Shop)', '', '20220307080008', 1, 1, '2022-03-07 02:00:08', '2022-03-07 02:00:08'),
(30, 1, 1, '2022-03-07', '10.00', 'payment(Bill Collect for Shop)', '', '20220307080023', 1, 1, '2022-03-07 02:00:23', '2022-03-07 02:00:23'),
(31, 1, 1, '2022-03-07', '500.00', 'receive(Member Bill Paid for Apartment)', '', '20220307114233', 1, 1, '2022-03-07 05:42:33', '2022-03-07 05:42:33'),
(32, 1, 1, '2022-03-07', '12500.00', 'receive(Member Bill Paid for Apartment)', '', '20220307114336', 1, 1, '2022-03-07 05:43:36', '2022-03-07 05:43:36'),
(33, 1, 1, '2022-03-08', '200.00', 'payment(others-Social Service)', 'ff', '20220308080041', 1, 1, '2022-03-08 02:00:41', '2022-03-08 02:00:41'),
(34, 1, 1, '2022-03-08', '400.00', 'payment(Social Service - Daily 2 Dags Tobarok)', 'f', '20220308081530', 1, 1, '2022-03-08 02:15:30', '2022-03-08 02:15:30'),
(35, 1, 1, '2022-03-08', '566.00', 'payment(Social Service-25 Jon Atim Ar Thaka Khawa)', NULL, '20220308081636', 1, 1, '2022-03-08 02:16:36', '2022-03-08 02:16:36'),
(36, 1, 1, '2022-03-08', '677.00', 'payment(Social Service - Beyarish Lash Dafon/Kafon)', 'khawa dawa', '20220308081750', 1, 1, '2022-03-08 02:17:50', '2022-03-08 02:17:50'),
(37, 1, 1, '2022-03-08', '900.00', 'receive(Vara - Daily 2 Dags Tobarok)', 'jhjhj', '20220308090130', 1, 1, '2022-03-08 03:01:30', '2022-03-08 03:01:30'),
(38, 1, 1, '2022-03-08', '4500.00', 'receive(Vara - Khula Dokan)', 'ffgg', '20220308090223', 1, 1, '2022-03-08 03:02:23', '2022-03-08 03:02:23'),
(39, 1, 1, '2022-03-08', '600.00', 'receive(Vara - Khula Dokan)', 'abcd', '20220308091054', 1, 1, '2022-03-08 03:10:54', '2022-03-08 03:10:54'),
(40, 1, 1, '2022-03-08', '600.00', 'receive(Mazar Shorifer Income Source - Agarbati/Mombati/Golapjol Ezara)', 'fff', '20220308102141', 1, 1, '2022-03-08 04:21:41', '2022-03-08 04:21:41'),
(42, 1, 1, '2022-03-09', '50002.00', 'receive(From Temporary Kacha Bazar)', 'dd', '20220309064728', 1, 1, '2022-03-09 00:47:28', '2022-03-09 00:47:28'),
(43, 1, 1, '2022-03-09', '555.00', 'receive(From Temporary Kacha Bazar)', 'tggg', '20220309064834', 1, 1, '2022-03-09 00:48:34', '2022-03-09 00:48:34'),
(44, 1, 1, '2022-03-09', '1000.00', 'payment(Hafeez 25\r\n)', 'sjhhj', '20220309093140', 1, 1, '2022-03-09 03:31:40', '2022-03-09 03:31:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_hint` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `user_type` tinyint(2) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `shop_advance_amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `bill_advance_amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(2) DEFAULT NULL COMMENT '2=>Bed Assigned',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `password_hint`, `company`, `dob`, `gender`, `phone`, `address`, `nid_no`, `join_date`, `guardian_name`, `guardian_phone`, `image`, `user_type`, `branch_id`, `shop_advance_amount`, `bill_advance_amount`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$58P7gogqP6oE.VVgbsz5F.JUbCAJbsr1XwBSmJ2W7IwQ28tTviOzK', '12345678', NULL, NULL, NULL, '01708027394', NULL, NULL, NULL, NULL, NULL, '20211221074644.jpeg', 1, NULL, '0.00', '0.00', 1, NULL, NULL, '2021-12-23 06:03:15'),
(14, 'rr', NULL, NULL, NULL, 'rrr updated', '2022/02/27', 2, '01708027394', '01708027394', '4555 999', '1970-01-01', NULL, NULL, NULL, 3, 1, '1000.00', '1000.00', 1, NULL, '2022-02-27 03:53:04', '2022-02-28 04:17:36'),
(15, 'apartment', 'apartment@gmail.com', '$2y$10$WUI2VzFzAX/ZY9mKXIxqQeyRMd2bfy.UjXUmyRkv75NmOk4llI3Lq', '12345678', 'binaryit', '2022-03-06', 1, '01708027394', 'House 12, Road 10', NULL, '2022-03-06', 'ffff', '01708027394', NULL, 4, 1, '0.00', '0.00', 2, NULL, '2022-03-06 00:12:22', '2022-03-06 01:36:25');

-- --------------------------------------------------------

--
-- Table structure for table `users_type`
--

DROP TABLE IF EXISTS `users_type`;
CREATE TABLE IF NOT EXISTS `users_type` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_type`
--

INSERT INTO `users_type` (`id`, `user_type`, `user_role`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', NULL, '2021-06-17 15:58:30', NULL),
(2, 'Admin', NULL, '2021-09-11 12:46:42', NULL),
(3, 'Manager', NULL, '2021-12-25 09:01:45', NULL),
(4, 'Apartment Member', NULL, '2021-12-28 07:40:58', NULL),
(5, 'Hostel Member', NULL, '2021-12-11 09:14:43', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
