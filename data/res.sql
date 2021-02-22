-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2021 at 04:38 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `res`
--

-- --------------------------------------------------------

--
-- Table structure for table `bulletin_bord`
--

CREATE TABLE `bulletin_bord` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img_src` varchar(255) NOT NULL,
  `isDelete` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `createdBy` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulletin_bord`
--

INSERT INTO `bulletin_bord` (`id`, `title`, `description`, `img_src`, `isDelete`, `status`, `createdBy`, `updatedBy`, `created_at`, `updated_at`) VALUES
(1, 'Leave Application', 'tesaas\r\ndf\r\nasd\r\nf\r\nas', 'EMPLOYEE_DIRECT_DEPOSIT_ENROLLMENT_FORM-1.pdf', 0, 1, 11, 0, '2021-02-17 04:52:40', '0000-00-00 00:00:00'),
(2, 'Today advicess', 'toadf\r\nasdf\r\n\r\nasdf\r\nasdf', '', 0, 1, 11, 0, '2021-02-17 05:06:35', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `img_src` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0-no 1-yes',
  `isDelete` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cleaning`
--

CREATE TABLE `cleaning` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `ch_id` int(11) NOT NULL,
  `isDelete` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `createdBy` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cleaning`
--

INSERT INTO `cleaning` (`id`, `title`, `shift_id`, `ch_id`, `isDelete`, `status`, `createdBy`, `updatedBy`, `created_at`, `updated_at`) VALUES
(1, 'Clean chair lags, table, booths, pictures and keep front door free of finger prints as needed.', 1, 2, 0, 1, 11, 0, '2021-02-17 17:22:49', '0000-00-00 00:00:00'),
(2, 'Clean restroom walls, mirrors, toilet, change trash bag, restock paper towel and shop as needed.', 2, 2, 0, 1, 11, 11, '2021-02-17 17:23:26', '2021-02-17 18:03:58'),
(3, 'Stock veggies and meat up to chill line and rotated properly, look for Expired Product', 1, 1, 0, 1, 11, 0, '2021-02-17 17:23:46', '2021-02-17 22:41:06'),
(4, 'Clean soda Machine in Dinning room including re stocking Lids, Straws Etc..', 1, 2, 0, 1, 11, 0, '2021-02-17 17:24:04', '0000-00-00 00:00:00'),
(5, 'test', 1, 2, 0, 1, 11, 0, '2021-02-17 17:35:43', '0000-00-00 00:00:00'),
(6, 'test 2', 1, 1, 0, 1, 11, 0, '2021-02-17 17:38:24', '0000-00-00 00:00:00'),
(7, 'test night 1', 2, 1, 0, 1, 11, 11, '2021-02-17 17:57:33', '2021-02-17 18:00:40'),
(8, 'test 22222', 1, 3, 0, 1, 11, 0, '2021-02-17 18:48:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cleaning_heading`
--

CREATE TABLE `cleaning_heading` (
  `ch_id` int(11) NOT NULL,
  `ch_title` varchar(255) NOT NULL,
  `isDelete` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `createdBy` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cleaning_heading`
--

INSERT INTO `cleaning_heading` (`ch_id`, `ch_title`, `isDelete`, `status`, `createdBy`, `updatedBy`, `created_at`, `updated_at`) VALUES
(1, 'Cashier Task', 0, 1, 11, 0, '2021-02-17 16:32:25', '2021-02-17 22:08:12'),
(2, 'Front Line People Task', 0, 1, 11, 0, '2021-02-17 16:32:37', '2021-02-17 22:12:25'),
(3, 'Drive Line People Test', 0, 1, 11, 0, '2021-02-17 16:32:44', '0000-00-00 00:00:00'),
(4, 'Manager in charge Duty', 0, 1, 11, 0, '2021-02-17 16:32:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_email` varchar(150) NOT NULL,
  `company_phone` varchar(30) NOT NULL,
  `company_address` text NOT NULL,
  `company_policy` varchar(255) NOT NULL,
  `isDelete` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_email`, `company_phone`, `company_address`, `company_policy`, `isDelete`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Foodies Company', 'foodies@gmail.com', '25257578', 'lorie lipsum lorie lipsum \r\nlorie lipsum lorie lipsum \r\nlorie lipsum lorie lipsum', 'Night_Shift_Cleaning_List1.xlsx', 0, 1, '2021-02-16 15:59:04', '2021-02-20 14:28:26');

-- --------------------------------------------------------

--
-- Table structure for table `demo`
--

CREATE TABLE `demo` (
  `id` int(11) NOT NULL,
  `isDelete` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `createdBy` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `res_id` int(11) NOT NULL,
  `inv_date` date NOT NULL,
  `notes` text NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `isDelete` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `createdBy` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `title`, `res_id`, `inv_date`, `notes`, `invoice`, `isDelete`, `status`, `createdBy`, `updatedBy`, `created_at`, `updated_at`) VALUES
(1, 'test1', 1, '2021-02-10', 'sfasf\r\nas\r\nfd\r\nasdf', 'ORDER_CALCULATOR_2021.xlsx', 0, 1, 11, 11, '2021-02-18 18:18:26', '2021-02-18 18:29:47'),
(2, 'test 2', 2, '2021-02-16', 'sfasfd\r\na\r\nsdf\r\nas\r\ndf', 'Temp_Log.xlsx', 0, 1, 11, 0, '2021-02-18 18:19:37', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `manager_details`
--

CREATE TABLE `manager_details` (
  `id` int(11) NOT NULL,
  `manager_details_id` int(11) NOT NULL,
  `isDelete` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `createdBy` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newspaper`
--

CREATE TABLE `newspaper` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `img_src` varchar(255) NOT NULL,
  `sound_src` varchar(255) NOT NULL DEFAULT 'nosound.mp3',
  `isDelete` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `restaurant_id` int(11) NOT NULL,
  `res_name` varchar(255) NOT NULL,
  `res_owner_name` varchar(255) NOT NULL,
  `res_admin_id` int(11) NOT NULL,
  `res_manager_id` int(11) NOT NULL,
  `res_address` text NOT NULL,
  `res_phone` varchar(50) NOT NULL,
  `res_email` varchar(50) NOT NULL,
  `res_minmum_wages` varchar(255) NOT NULL,
  `res_start_day` int(11) NOT NULL,
  `res_hours` varchar(255) NOT NULL,
  `res_pictures` varchar(255) NOT NULL,
  `res_licence` varchar(255) NOT NULL,
  `res_permit` varchar(255) NOT NULL,
  `isDelete` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `createdBy` int(11) NOT NULL DEFAULT '0',
  `updatedBy` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`restaurant_id`, `res_name`, `res_owner_name`, `res_admin_id`, `res_manager_id`, `res_address`, `res_phone`, `res_email`, `res_minmum_wages`, `res_start_day`, `res_hours`, `res_pictures`, `res_licence`, `res_permit`, `isDelete`, `status`, `createdBy`, `updatedBy`, `created_at`, `updated_at`) VALUES
(1, 'Taj', 'Hitesh', 12, 14, 'loreis lipsum loreis lipsum \r\nloreis lipsum loreis lipsum \r\nloreis lipsum loreis lipsum \r\nloreis lipsum loreis lipsum', '454545545', 'taj@gmail.com', '500', 2, '40', 'Bread_Count.xlsx', 'work.docx', 'EMPLOYEE_CONSULTATIONE_FORM_2020.pdf', 0, 1, 11, 11, '2021-02-16 19:33:15', '2021-02-21 05:17:12'),
(2, 'Oberai', 'Raj Oberai', 13, 16, 'lorie lipsum lorie lipsum \r\nlorie lipsum lorie lipsum \r\nlorie lipsum lorie lipsum', '14141414141', 'ramnik@gmail.com', '5000', 3, '10', 'EMPLOYEE_DIRECT_DEPOSIT_ENROLLMENT_FORM-1.pdf', 'SCHEDULE_(1).xls', 'work1.docx', 0, 1, 11, 0, '2021-02-18 17:53:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `language` varchar(10) NOT NULL,
  `notification` tinyint(1) NOT NULL DEFAULT '1',
  `isDelete` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `site_title` varchar(255) NOT NULL,
  `site_logo` varchar(255) NOT NULL,
  `site_favicon` varchar(255) NOT NULL,
  `meta_tag` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  `fb_link` text NOT NULL,
  `instagram_link` text NOT NULL,
  `map_embeded` text NOT NULL,
  `latitude` varchar(25) NOT NULL,
  `longitude` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` text NOT NULL,
  `paypal_username` varchar(255) NOT NULL,
  `paypal_password` varchar(255) NOT NULL,
  `paypal_sign` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `site_name`, `site_title`, `site_logo`, `site_favicon`, `meta_tag`, `meta_keyword`, `meta_description`, `fb_link`, `instagram_link`, `map_embeded`, `latitude`, `longitude`, `address`, `email`, `phone`, `paypal_username`, `paypal_password`, `paypal_sign`, `updated_at`) VALUES
(1, 'subway', 'subway', 'logo.png', 'logo1.png', 'subway', 'subway', 'subway', '', '', '', '-33.8498426', '', '', 'subway@gmail.com', '', '', '', '', '2021-02-20 10:50:04');

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE `suggestion` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `isDelete` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `createdBy` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suggestion`
--

INSERT INTO `suggestion` (`id`, `title`, `description`, `isDelete`, `status`, `createdBy`, `updatedBy`, `created_at`, `updated_at`) VALUES
(1, 'Leave Application d', 'tesaas\r\ndf\r\nasd\r\nf\r\nas', 0, 1, 11, 11, '2021-02-17 04:52:40', '2021-02-19 03:41:36'),
(2, 'Today advicess', 'toadf\r\nasdf\r\n\r\nasdf\r\nasdf', 0, 1, 11, 0, '2021-02-17 05:06:35', '0000-00-00 00:00:00'),
(3, 'test 1111', 'asdasd\r\nfas\r\ndf\r\nasd', 0, 1, 11, 0, '2021-02-19 03:40:59', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_last_login`
--

CREATE TABLE `tbl_last_login` (
  `id` bigint(20) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `sessionData` varchar(2048) NOT NULL,
  `machineIp` varchar(1024) NOT NULL,
  `userAgent` varchar(128) NOT NULL,
  `agentString` varchar(1024) NOT NULL,
  `platform` varchar(128) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_last_login`
--

INSERT INTO `tbl_last_login` (`id`, `userId`, `sessionData`, `machineIp`, `userAgent`, `agentString`, `platform`, `createdDtm`) VALUES
(1, 11, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Admin\"}', '::1', 'Chrome 88.0.4324.150', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36', 'Windows 8.1', '2021-02-14 15:41:23'),
(2, 11, '{\"role\":\"1\",\"roleText\":\"Super admin\",\"name\":\"Admin\"}', '::1', 'Chrome 88.0.4324.150', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36', 'Windows 8.1', '2021-02-15 20:33:45'),
(3, 11, '{\"role\":\"1\",\"roleText\":\"Super admin\",\"name\":\"Admin\"}', '::1', 'Chrome 88.0.4324.150', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36', 'Windows 8.1', '2021-02-16 19:56:48'),
(4, 11, '{\"role\":\"1\",\"roleText\":\"Super admin\",\"name\":\"Admin\"}', '::1', 'Chrome 88.0.4324.150', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36', 'Windows 8.1', '2021-02-17 09:01:22'),
(5, 11, '{\"role\":\"1\",\"roleText\":\"Super admin\",\"name\":\"Admin\"}', '::1', 'Chrome 88.0.4324.150', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36', 'Windows 8.1', '2021-02-17 20:43:48'),
(6, 11, '{\"role\":\"1\",\"roleText\":\"Super admin\",\"name\":\"Admin\"}', '::1', 'Chrome 88.0.4324.150', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36', 'Windows 8.1', '2021-02-18 08:06:11'),
(7, 11, '{\"role\":\"1\",\"roleText\":\"Super admin\",\"name\":\"Admin\"}', '::1', 'Chrome 88.0.4324.150', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36', 'Windows 8.1', '2021-02-18 20:38:25'),
(8, 11, '{\"role\":\"1\",\"roleText\":\"Super admin\",\"name\":\"Admin\"}', '::1', 'Chrome 88.0.4324.150', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36', 'Windows 8.1', '2021-02-19 08:08:31'),
(9, 11, '{\"role\":\"1\",\"roleText\":\"Super admin\",\"name\":\"Admin\"}', '::1', 'Chrome 88.0.4324.182', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36', 'Windows 8.1', '2021-02-19 20:24:42'),
(10, 11, '{\"role\":\"1\",\"roleText\":\"Super admin\",\"name\":\"Admin\"}', '::1', 'Chrome 88.0.4324.182', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36', 'Windows 8.1', '2021-02-20 09:34:53'),
(11, 11, '{\"role\":\"1\",\"roleText\":\"Super admin\",\"name\":\"Admin\"}', '::1', 'Chrome 88.0.4324.182', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36', 'Windows 8.1', '2021-02-20 12:29:56'),
(12, 11, '{\"role\":\"1\",\"roleText\":\"Super admin\",\"name\":\"Admin\"}', '::1', 'Chrome 88.0.4324.182', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36', 'Windows 8.1', '2021-02-20 17:44:36'),
(13, 11, '{\"role\":\"1\",\"roleText\":\"Super admin\",\"name\":\"Admin\"}', '::1', 'Chrome 88.0.4324.182', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36', 'Windows 8.1', '2021-02-20 19:02:29'),
(14, 11, '{\"role\":\"1\",\"roleText\":\"Super admin\",\"name\":\"Admin\"}', '::1', 'Chrome 88.0.4324.182', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36', 'Windows 8.1', '2021-02-20 21:53:35'),
(15, 11, '{\"role\":\"1\",\"roleText\":\"Super admin\",\"name\":\"Admin\"}', '::1', 'Chrome 88.0.4324.182', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36', 'Windows 8.1', '2021-02-20 23:24:09'),
(16, 11, '{\"role\":\"1\",\"roleText\":\"Super admin\",\"name\":\"Admin\"}', '::1', 'Chrome 88.0.4324.182', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36', 'Windows 8.1', '2021-02-21 08:04:06'),
(17, 40, '{\"role\":\"5\",\"roleText\":\"Employee\",\"name\":\"Jack sparrow\"}', '::1', 'Chrome 88.0.4324.182', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36', 'Windows 8.1', '2021-02-21 10:10:33'),
(18, 40, '{\"role\":\"5\",\"roleText\":\"Employee\",\"name\":\"Jack sparrow\"}', '::1', 'Chrome 88.0.4324.182', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36', 'Windows 8.1', '2021-02-21 10:56:47'),
(19, 11, '{\"role\":\"1\",\"roleText\":\"Super admin\",\"name\":\"Admin\"}', '::1', 'Chrome 88.0.4324.182', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36', 'Windows 8.1', '2021-02-22 20:37:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reset_password`
--

CREATE TABLE `tbl_reset_password` (
  `id` bigint(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activation_id` varchar(32) NOT NULL,
  `agent` varchar(512) NOT NULL,
  `client_ip` varchar(32) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` bigint(20) NOT NULL DEFAULT '1',
  `createdDtm` datetime NOT NULL,
  `updatedBy` bigint(20) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `roleId` tinyint(4) NOT NULL COMMENT 'role id',
  `role` varchar(50) NOT NULL COMMENT 'role text'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`roleId`, `role`) VALUES
(1, 'Super admin'),
(2, 'Admin'),
(3, 'Manager'),
(4, 'Shifts incharge'),
(5, 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userId` int(11) NOT NULL,
  `email` varchar(128) NOT NULL COMMENT 'login email',
  `password` varchar(128) NOT NULL COMMENT 'hashed login password',
  `name` varchar(128) DEFAULT NULL COMMENT 'full name of user',
  `mobile` varchar(20) DEFAULT NULL,
  `dob` date NOT NULL,
  `doj` date NOT NULL,
  `roleId` tinyint(4) NOT NULL,
  `multi_task_ids` varchar(255) NOT NULL,
  `isDelete` tinyint(1) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `email`, `password`, `name`, `mobile`, `dob`, `doj`, `roleId`, `multi_task_ids`, `isDelete`, `createdBy`, `status`, `created_at`, `updatedBy`, `updated_at`) VALUES
(11, 'superadmin@gmail.com', '$2y$10$4kxpQVMfT432IeKHLZ3PhuKs2GVzO1IcoOMqasQbv7Z/kRUlwn4u6', 'Admin', '', '2020-02-18', '2021-02-18', 1, '', 0, 1, 1, '2018-05-31 23:37:16', NULL, NULL),
(12, 'admin1@gmail.com', '$2y$10$di4qb.PaWjmN94PuJj0z..Uw/YUfACcabPdBPAOK25m2aJwnPzs7u', 'Admin User', '123123123', '2019-02-18', '2021-02-18', 2, '1,2', 0, 11, 1, '2021-02-16 18:54:06', NULL, '2021-02-16 23:24:06'),
(13, 'admin2@gmail.com', '$2y$10$Ay7RWVZ2.mhAkw25YkIwIulc48rKjy/u3FZXFJDovWNwEIEvLQ6Xy', 'Admin User 2', '7789789897', '2020-02-18', '2021-02-18', 2, '2', 0, 11, 1, '2021-02-16 19:07:37', NULL, '2021-02-16 23:37:37'),
(14, 'manager1@gmail.com', '$2y$10$yWcqw2SFf0RBF5bMiwepFeDyQ/zObSoQ0xmT0P0Zh5p24T9hvmNRO', 'Manager 1', '9898989898', '2021-02-18', '2020-02-18', 3, '1', 0, 11, 1, '2021-02-16 19:07:56', NULL, '2021-02-16 23:37:56'),
(15, 'manager2@gmail.com', '$2y$10$Eh3pxJ8aZSlq9RoXqptyneDwycp6CvOGdjwwLNAhibiE9fJg0qDqS', 'Manager 2', '74185859', '2020-02-18', '2021-02-18', 4, '', 0, 11, 1, '2021-02-16 19:08:13', NULL, '2021-02-18 04:09:03'),
(16, 'r@gmail.com', '$2y$10$1KUGVZyNW9KyizK9D.0mg.McCE0sEXruK5yCl/t4VPDxJo0yHlxwu', 'ramnik', '123213212', '2021-02-12', '2021-03-04', 3, '2', 0, 11, 1, '2021-02-18 03:48:05', NULL, '2021-02-18 04:06:04'),
(26, 'www3@gmail.com', '$2y$10$ilAQU9If9DmSKq8feijxEOw6rjY/M2YxYjHnBJ6peTD/bSGng5rXu', '1', '54654', '2021-02-20', '0000-00-00', 5, '1', 1, 0, 1, '2021-02-20 13:12:10', NULL, '2021-02-20 17:42:10'),
(25, '22233@gmail.com', '$2y$10$Qs4j/Ycag5Qe4kzwj.WP5uXa9rKwsv2oAW/G8QbcNLowWSwfEqZhq', '1', '54654', '2021-02-20', '0000-00-00', 5, '1', 1, 0, 1, '2021-02-20 13:10:48', NULL, '2021-02-20 17:40:48'),
(24, '222@gmail.com', '$2y$10$ZgkmTVT4q5/5Sq89WtXABO3h.ARCEEiF.rzv.h68Rp4F.65lXMKd2', '1', '54654', '2021-02-20', '0000-00-00', 5, '1', 1, 0, 1, '2021-02-20 13:09:15', NULL, '2021-02-20 17:39:15'),
(23, '22@gmail.com', '$2y$10$AluqpGQww2Xd6L3XPZcbAOVKCpK39boDVOoC9Z7ucrTxEU9Smm.9a', '1', '54654', '2021-02-20', '0000-00-00', 5, '1', 1, 0, 1, '2021-02-20 13:03:56', NULL, '2021-02-20 17:33:56'),
(22, 'hitesh@gmail.com', '$2y$10$G4CQ31OtpjngyY9IWeJdMOqyYxxGJ7oMb/RmPGH9k3YgUkPvvTocC', 'Hitesh', '465456456', '2021-02-19', '0000-00-00', 5, '\"0,1,2\"', 1, 0, 1, '2021-02-20 11:27:37', NULL, '2021-02-20 15:57:37'),
(27, 'ssssa.iipl2013@gmail.com', '$2y$10$HGfCmv2ncXTc.c0drCJGVOS2rE5kyCYncI7MS6zFl6FDM2NvNNaSC', 'Hitesh', '465456465', '2021-02-20', '0000-00-00', 5, '2', 1, 0, 1, '2021-02-20 13:13:45', NULL, '2021-02-20 17:43:45'),
(28, 'vinesh@gmail.com', '$2y$10$TWJcgsfpBSemPX73CnQfxuQRedXX2BfJOPUj65DIWNS7RlSfQNZVi', 'vinesh122', '97885798787', '2021-02-20', '0000-00-00', 5, '1,2', 1, 0, 1, '2021-02-20 15:10:15', NULL, '2021-02-20 17:19:22'),
(29, 'rajesh@gmail.com', '$2y$10$4zRdxblF9AqIw6QWfIPXiuAoTJumVVlgiav6mvI.39qpAhO681Q1K', 'rajesh1', '123', '2021-02-20', '0000-00-00', 5, '1', 1, 0, 1, '2021-02-20 17:20:33', NULL, '2021-02-20 17:21:18'),
(30, 'ma@gmail.com', '$2y$10$k8shsue7sL6gOJrG.cKike6BDkpj7kdpyh9G/0fr9W0Z6RUafu4F2', 'mahendra', '7', '2021-02-20', '0000-00-00', 5, '2', 1, 0, 1, '2021-02-20 17:22:29', NULL, '2021-02-20 21:52:29'),
(31, '33@gmail.com', '$2y$10$mL0EacDQlYn1z9tSYobETuP8/59dhDNlVkmQEP95D9itzu2kLh4AG', '662', '444', '2021-02-20', '2021-02-20', 4, '', 0, 11, 1, '2021-02-20 18:03:01', NULL, '2021-02-20 18:04:24'),
(32, '898@gmail.com', '$2y$10$/E.C/2CHSJeh2uFlLp.MZODF36HRdHemoftftijzpJ6EFG59mb83i', '99', '545646', '2021-02-20', '2021-02-20', 4, '', 0, 11, 1, '2021-02-20 18:04:13', NULL, '2021-02-20 22:34:13'),
(33, '7878@gmail.com', '$2y$10$xuBEvmFiwp4ZjDy2ko/oRur/XLy/Giy8N4ia/hQX8xP6nw5oPlzue', '78787878333', '474745474', '2021-02-20', '2021-02-20', 2, '', 1, 11, 1, '2021-02-20 18:24:09', NULL, '2021-02-20 18:24:21'),
(34, '111@gmail.com', '$2y$10$.U4duVrKwh3Vv/j7PSutQ.IoQ9vTNoNnQ/DcLM/2eWxrSeSBpECFm', 'mna1222', '78979878', '2021-02-20', '2021-02-20', 3, '', 1, 11, 1, '2021-02-20 18:26:09', NULL, '2021-02-20 18:26:17'),
(35, 'test77@gmail.com', '$2y$10$fS8tkaSgGK0yeAafg9z8TeyCo3P1U.nWPErsy2JEWg9JTqewq6w0e', 'test444433', '111', '2021-02-20', '2021-02-20', 4, '', 1, 11, 1, '2021-02-20 18:30:24', NULL, '2021-02-20 18:30:31'),
(36, 'k@gmail.com', '$2y$10$rJQtpkB9JAJ18lF/vV8Swu26qS/ImIXH0.UgSz1roPedIHI.WhFcq', 'kkk', '465465', '2021-02-20', '0000-00-00', 5, '1', 1, 0, 1, '2021-02-20 18:41:13', NULL, '2021-02-20 23:11:13'),
(37, 'k44@gmail.com', '$2y$10$K17V6aq.9AJ6httevGtpUuMMV9S6R6ts0uybOvARJqFiTTeqmipty', 'kkk', '465465', '2021-02-20', '0000-00-00', 5, '1,2', 1, 0, 1, '2021-02-20 18:42:10', NULL, '2021-02-20 23:12:10'),
(38, '111.iipl2013@gmail.com', '$2y$10$lktukHQSefyVTueybxsIkucOTW126g2vDmsjSKgqp1lNGAIOTTdPi', 'Hitesh1', '456465465', '2021-02-20', '0000-00-00', 5, '1', 0, 0, 1, '2021-02-20 18:45:22', NULL, '2021-02-20 18:45:31'),
(39, 'from@gmail.com', '$2y$10$Y4juLcp8Dafu6kxPI27Oyuu1RSTeDd8D9sOv9vEx/34egCc9o7Tdm', 'from front', '789798789', '2021-02-20', '0000-00-00', 5, '1', 0, 0, 1, '2021-02-20 18:53:27', NULL, '2021-02-20 23:23:27'),
(40, 'jk@gmail.com', '$2y$10$2T5OH7QauFgR.3vP8M6iKukCqYu/WjeiALeFrZMvvOrBz445U68Ku', 'Jack sparrow', '4546546545', '2021-02-23', '0000-00-00', 5, '0,1,2', 0, 0, 1, '2021-02-21 05:39:57', NULL, '2021-02-21 08:56:00'),
(41, 'tesls@gmail.com', '$2y$10$FtbGPco5kmD9XvFfPG4/yObx2W7CROZkBpVxSb2thVNt5SHb2bmDu', 'tesla', '45465', '2021-02-21', '0000-00-00', 5, '1', 0, 0, 0, '2021-02-21 08:52:19', NULL, '2021-02-21 13:22:19'),
(42, '', '$2y$10$eMvycmQlDtNa0WkVIA33Wefgdng5UhOJyvwEwQp71gVGbLrM3nHmS', '', '', '1970-01-01', '0000-00-00', 5, '', 0, 0, 0, '2021-02-21 08:54:19', NULL, '2021-02-21 13:24:19');

-- --------------------------------------------------------

--
-- Table structure for table `training_materials`
--

CREATE TABLE `training_materials` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img_src` varchar(255) NOT NULL,
  `isDelete` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `createdBy` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `training_materials`
--

INSERT INTO `training_materials` (`id`, `title`, `description`, `img_src`, `isDelete`, `status`, `createdBy`, `updatedBy`, `created_at`, `updated_at`) VALUES
(1, 'Leave Application', 'tesaas\r\ndf\r\nasd\r\nf\r\nas', 'EMPLOYEE_DIRECT_DEPOSIT_ENROLLMENT_FORM-1.pdf', 0, 1, 11, 0, '2021-02-17 04:52:40', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users_details`
--

CREATE TABLE `users_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `social_security_number` varchar(100) NOT NULL,
  `work_eligibility` varchar(255) NOT NULL,
  `transformation` varchar(255) NOT NULL,
  `criminal` varchar(255) NOT NULL,
  `school_attended` varchar(255) NOT NULL,
  `degrees_obtained` varchar(255) NOT NULL,
  `graduation_date` date NOT NULL,
  `skills` text NOT NULL,
  `extracurricular_activities` text NOT NULL,
  `previous_employer_names` varchar(255) NOT NULL,
  `previous_contact_information` varchar(255) NOT NULL,
  `previous_titles` varchar(255) NOT NULL,
  `previous_responsibilities` text NOT NULL,
  `reasons_for_leaving` text NOT NULL,
  `previous_permission_to_contact` tinyint(1) NOT NULL DEFAULT '1',
  `references` varchar(255) NOT NULL,
  `open_for_suggestions` text NOT NULL,
  `img_src` text NOT NULL,
  `achievements` text NOT NULL,
  `ids` text NOT NULL,
  `sss` text NOT NULL,
  `work_permit` text NOT NULL,
  `parental_permission` text NOT NULL,
  `disciplinary_form` text NOT NULL,
  `isDelete` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `createdBy` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_details`
--

INSERT INTO `users_details` (`id`, `user_id`, `address`, `social_security_number`, `work_eligibility`, `transformation`, `criminal`, `school_attended`, `degrees_obtained`, `graduation_date`, `skills`, `extracurricular_activities`, `previous_employer_names`, `previous_contact_information`, `previous_titles`, `previous_responsibilities`, `reasons_for_leaving`, `previous_permission_to_contact`, `references`, `open_for_suggestions`, `img_src`, `achievements`, `ids`, `sss`, `work_permit`, `parental_permission`, `disciplinary_form`, `isDelete`, `status`, `createdBy`, `updatedBy`, `created_at`, `updated_at`) VALUES
(1, 22, 'address<br />\r\nasdfasdf<br />\r\nasdf<br />\r\na<br />\r\nsdf', '123132231', 'work eligibility', 'trafsormation', 'criminal', 'school', 'degree', '0000-00-00', 'skill1,skill2', 'extrad curricular activitie<br />\r\nextrad curricular activitie<br />\r\nextrad curricular activitie', 'Pre Emp name', 'pre contact 123123', 'pre emp title', 'pre responsibility pre responsibility pre responsibility <br />\r\npre responsibility <br />\r\npre responsibility <br />\r\npre responsibility ', 'reson for leaving <br />\r\nreson for leaving <br />\r\nreson for leaving reson for leaving ', 1, 'reference', 'lkasdjflasjdflasdf<br />\r\nas<br />\r\ndf<br />\r\nas<br />\r\ndf', '', '', '', '', '', '', '', 0, 1, 0, 0, '2021-02-20 15:57:37', '0000-00-00 00:00:00'),
(2, 25, '564', '5456', '4654', '65', '654', '56465', '46565', '0000-00-00', '456', '56465', '65', '564', '654', '65', '4', 1, '12', '1321', '', '', '', '', '', '', '', 0, 1, 0, 0, '2021-02-20 17:40:48', '0000-00-00 00:00:00'),
(3, 26, '564', '5456', '4654', '65', '654', '56465', '46565', '0000-00-00', '456', '56465', '65', '564', '654', '65', '4', 1, '12', '1321', '', '', '', '', '', '', '', 0, 1, 0, 0, '2021-02-20 17:42:10', '0000-00-00 00:00:00'),
(4, 27, 'Shastrinagar st no-4, Nr. gandhigram, Rajkot4654', '65465', '465', '465', '65', '46', '6454', '0000-00-00', '4654', '56', '5465', '465', '4', '65', '4', 1, '5245', '64', '', '', '', '', '', '', '', 0, 1, 0, 0, '2021-02-20 17:43:45', '0000-00-00 00:00:00'),
(5, 28, 'address <br />\r\naddress <br />\r\naddress address ', 'spcoa secirotu mi,ber', 'work eleigibility', 'trafsormation', 'criminal', 'schools', 'degree', '0000-00-00', 'skill1,skill2', 'extra curricular activities<br />\r\nextra curricular activities<br />\r\nextra curricular activities<br />\r\nextra curricular activities', 'previous employer names', 'contact info', 'pre title', 'pre responsibility <br />\r\npre responsibility <br />\r\npre responsibility pre responsibility ', 'resons for leaving <br />\r\nresons for leaving resons for leaving <br />\r\nresons for leaving ', 0, 'reference', 'suggestion <br />\r\nsuggestion <br />\r\nsuggestion suggestion <br />\r\nsuggestion <br />\r\n', '', '', '', '', '', '', '', 0, 1, 0, 0, '2021-02-20 19:40:15', '2021-02-20 20:50:28'),
(6, 29, '8', '132', '1', '2', '3', '4', '5', '0000-00-00', '6', '7', '9', '10', '11', '12', '123', 0, '14', '15', '', '', '', '', '', '', '', 0, 1, 0, 0, '2021-02-20 21:50:33', '2021-02-20 21:51:18'),
(7, 30, '7', '7', '7', '7', '7', '7', '7', '0000-00-00', '7', '7', '7', '7', '7', '7', '7', 0, '7', '7', '', '', '', '', '', '', '', 0, 1, 0, 0, '2021-02-20 21:52:29', '0000-00-00 00:00:00'),
(8, 36, '654', '465456', '465', '465', '4654', '654', '456464', '0000-00-00', '4654', '654', '4654', '87', '987', '98', '798', 1, '9798', '7987', '', '', '', '', '', '', '', 0, 1, 0, 0, '2021-02-20 23:11:13', '0000-00-00 00:00:00'),
(9, 37, '654', '465456', '465', '465', '4654', '654', '456464', '0000-00-00', '4654', '654', '4654', '87', '987', '98', '798', 1, '9798', '7987', '', '', '', '', '', '', '', 0, 1, 0, 0, '2021-02-20 23:12:10', '0000-00-00 00:00:00'),
(10, 38, 'Shastrinagar st no-4, Nr. gandhigram, Rajkot564', '5464654654', '654654', '54654', '654', '654', '65', '0000-00-00', '65465', '564654', '65465', '465', '465', '46', '54654', 0, '4546', '465465', '', '', '', '', '', '', '', 0, 1, 0, 0, '2021-02-20 23:15:22', '2021-02-20 23:15:31'),
(11, 39, '789798', '798897', '98', '798', '7987', '98', '798', '0000-00-00', 'sd,asdf', '987987', '78978', '97', '987', '987', '987', 1, '98789', '7897', '', '[\"6033cae4c3500_1_hwt_(1).jpg\",\"6033cae500972_1_hwt_(2).jpg\",\"6033cae4c3500_1_hwt_(1).jpg\",\"6033cae500972_1_hwt_(2).jpg\"]', '[\"6033ccb0cc68d_1_hwt_(3).jpg\"]', '[\"6033cee4c91ea_1_hwt_(8).jpg\"]', '[\"6033cedeb2df1_1_hwt_(6).jpg\"]', '[\"6033ced6a8b86_1_hwt_(6).jpg\"]', '[\"6033cecf9f7fb_1_hwt_(5).jpg\"]', 0, 1, 0, 0, '2021-02-20 23:23:27', '2021-02-22 16:33:58'),
(12, 40, 'address<br />\r\naddress<br />\r\naddress', '77777', 'work eligibility', 'trafsormation', 'criminal', 'shool', 'degree', '0000-00-00', 'skill1,skill2', 'extra curricular activities extra curricular activities extra curricular activities extra curricular activities extra curricular activities extra curricular activities extra curricular activities extra curricular activities extra curricular activities extra curricular activities extra curricular activities ', 'pre employer name', 'pre constact information', 'pre employe title', 'pre responsibility<br />\r\npre responsibility<br />\r\npre responsibilitypre responsibility', 'reson for leaving<br />\r\nreson for leaving', 1, 'references', '132132464as654a65sdf<br />\r\na<br />\r\nsdf<br />\r\na<br />\r\nsd', '[\"603229ec6ee8f_1_hwt_(1).jpg\",\"603229eca4b39_1_hwt_(2).jpg\",\"603229ecd96bf_1_hwt_(3).jpg\",\"60322b7bc062b_1_hwt_(6).jpg\",\"60322ba4b9fb9_Daily_hwt_PREP_hwt_LIST.xlsx\",\"60322ba9be5e7_EMPLOYEE_hwt_DIRECT_hwt_DEPOSIT_hwt_ENROLLMENT_hwt__hwt_FORM-1.pdf\"]', '[\"6032367fe26b1_1_hwt_(1).jpg\",\"6032368030c99_1_hwt_(2).jpg\"]', '[\"603236acede04_1_hwt_(5).jpg\",\"603236ad2f0ad_1_hwt_(6).jpg\",\"603236ad65bab_1_hwt_(7).jpg\",\"603236ad9ad95_1_hwt_(8).jpg\"]', '[\"60323876e2de0_1_hwt_(4).jpg\",\"6032387734cd9_1_hwt_(5).jpg\",\"603238776311c_1_hwt_(6).jpg\"]', '[\"60323ddfd85b1_1_hwt_(6).jpg\",\"60323de019bfe_1_hwt_(7).jpg\"]', '[\"60323ddb7c067_1_hwt_(5).jpg\",\"60323ddbbb976_1_hwt_(6).jpg\",\"60323ddbe900d_1_hwt_(7).jpg\"]', '[\"60323dd5f3b37_1_hwt_(1).jpg\",\"60323dd646c56_1_hwt_(2).jpg\"]', 0, 1, 0, 0, '2021-02-21 10:09:57', '2021-02-21 12:02:58'),
(13, 41, '65', '465', '465', '4', '654', '654', '65', '0000-00-00', '654', '654', '4', '654', '654', '65', '4', 0, '6465', '46', '', '', '', '', '', '', '', 0, 1, 0, 0, '2021-02-21 13:22:19', '0000-00-00 00:00:00'),
(14, 42, '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 1, 0, 0, '2021-02-21 13:24:19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `weekday`
--

CREATE TABLE `weekday` (
  `day_id` int(11) NOT NULL,
  `day_name` varchar(100) NOT NULL,
  `day_number` int(11) NOT NULL,
  `isDelete` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `weekday`
--

INSERT INTO `weekday` (`day_id`, `day_name`, `day_number`, `isDelete`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Monday', 1, 0, 1, '2021-02-16 22:16:55', '0000-00-00 00:00:00'),
(2, 'Tuesday', 2, 0, 1, '2021-02-16 22:16:55', '0000-00-00 00:00:00'),
(3, 'Wednesday', 3, 0, 1, '2021-02-16 22:17:34', '0000-00-00 00:00:00'),
(4, 'Thursday', 4, 0, 1, '2021-02-16 22:17:34', '0000-00-00 00:00:00'),
(5, 'Friday', 5, 0, 1, '2021-02-16 22:17:57', '0000-00-00 00:00:00'),
(6, 'Saturday', 6, 0, 1, '2021-02-16 22:17:57', '0000-00-00 00:00:00'),
(7, 'Sunday', 7, 0, 1, '2021-02-16 22:18:08', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bulletin_bord`
--
ALTER TABLE `bulletin_bord`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `cleaning`
--
ALTER TABLE `cleaning`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cleaning_heading`
--
ALTER TABLE `cleaning_heading`
  ADD PRIMARY KEY (`ch_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `demo`
--
ALTER TABLE `demo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager_details`
--
ALTER TABLE `manager_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newspaper`
--
ALTER TABLE `newspaper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`restaurant_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suggestion`
--
ALTER TABLE `suggestion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_last_login`
--
ALTER TABLE `tbl_last_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `training_materials`
--
ALTER TABLE `training_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_details`
--
ALTER TABLE `users_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weekday`
--
ALTER TABLE `weekday`
  ADD PRIMARY KEY (`day_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bulletin_bord`
--
ALTER TABLE `bulletin_bord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cleaning`
--
ALTER TABLE `cleaning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `cleaning_heading`
--
ALTER TABLE `cleaning_heading`
  MODIFY `ch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `demo`
--
ALTER TABLE `demo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `manager_details`
--
ALTER TABLE `manager_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `newspaper`
--
ALTER TABLE `newspaper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `suggestion`
--
ALTER TABLE `suggestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_last_login`
--
ALTER TABLE `tbl_last_login`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `training_materials`
--
ALTER TABLE `training_materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users_details`
--
ALTER TABLE `users_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `weekday`
--
ALTER TABLE `weekday`
  MODIFY `day_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
