-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2021 at 09:40 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ifpdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `log_id` int(11) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `log_activity` varchar(70) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`log_id`, `user_id`, `log_activity`, `timestamp`) VALUES
(1, 'U00001', 'Logout', '2021-05-01 05:58:42'),
(7, 'U00001', 'Login', '2021-05-01 05:59:29'),
(8, 'U00001', 'Unblack customer CUS00002', '2021-05-01 06:06:29'),
(9, 'U00001', 'Unblack customer CUS00004', '2021-05-01 06:06:48'),
(10, 'U00001', 'Block customer CUS00004', '2021-05-01 06:07:41'),
(11, 'U00001', 'Sent mail to customer', '2021-05-01 06:10:09'),
(12, 'U00001', 'Handover order OR00013', '2021-05-01 06:15:08'),
(13, 'U00001', 'Logout', '2021-05-01 06:15:41'),
(14, 'U00002', 'Login', '2021-05-01 06:16:12'),
(15, 'U00002', 'Sent email to Lakshitha@gmail.com', '2021-05-01 06:16:43'),
(17, 'U00002', 'Start order process OR00099', '2021-05-01 06:25:09'),
(18, 'U00002', 'Set order completed OR00096', '2021-05-01 06:29:15'),
(19, 'U00002', 'Start order delivery OR00077', '2021-05-01 06:31:15'),
(20, 'U00002', 'Add sub category chamratrade@gmail.com', '2021-05-01 06:46:57'),
(21, 'U00002', 'Deactivate supplier  SUP00005', '2021-05-01 06:54:53'),
(22, 'U00002', 'Activate supplier  SUP00005', '2021-05-01 06:54:58'),
(23, 'U00002', 'Update supplier SUP00005', '2021-05-01 06:57:59'),
(24, 'U00002', 'Logout', '2021-05-01 07:07:54'),
(26, 'U00001', 'Login', '2021-05-01 07:08:04'),
(28, 'U00001', 'Deactivate user U00003', '2021-05-01 07:11:00'),
(29, 'U00001', 'Activate user U00003', '2021-05-01 07:11:08'),
(30, 'U00001', 'Logout', '2021-05-01 07:11:26'),
(31, 'U00001', 'Login', '2021-05-01 07:11:31'),
(32, 'U00001', 'Update profile U00001', '2021-05-01 07:21:47'),
(33, 'U00001', 'Logout', '2021-05-01 07:30:37'),
(34, 'U00002', 'Login', '2021-05-01 07:30:44'),
(35, 'U00002', 'Logout', '2021-05-01 07:32:09'),
(36, 'U00001', 'Login', '2021-05-01 07:32:16'),
(37, 'U00001', 'Add user U00005', '2021-05-01 11:50:47'),
(38, 'U00001', 'Add user U00005', '2021-05-01 11:50:57'),
(39, 'U00001', 'Add user U00005', '2021-05-01 12:05:12'),
(40, 'U00001', 'Add user U00006', '2021-05-01 12:06:27'),
(41, 'U00001', 'Logout', '2021-05-01 20:22:33'),
(42, '', 'Try to reset password', '2021-05-01 20:24:40'),
(43, '', 'Login', '2021-05-02 06:07:41'),
(44, 'U00001', 'Login', '2021-05-02 06:07:47'),
(45, 'U00001', 'Logout', '2021-05-02 08:22:11'),
(46, 'U00002', 'Login', '2021-05-02 08:22:17'),
(47, 'U00002', 'Logout', '2021-05-02 08:23:27'),
(48, '', 'Login', '2021-05-02 08:23:39'),
(49, 'U00001', 'Login', '2021-05-02 08:23:44'),
(50, 'U00001', 'Deactivate user U00001', '2021-05-02 08:25:12'),
(51, 'U00001', 'Activate user U00001', '2021-05-02 08:25:16'),
(52, 'U00001', 'Deactivate supplier  SUP00005', '2021-05-02 10:28:16'),
(53, 'U00001', 'Add new material type MAT00010', '2021-05-02 18:48:42'),
(54, 'U00001', 'Add material ', '2021-05-02 18:54:04'),
(55, 'U00001', 'Add material MAT00001', '2021-05-02 18:54:47'),
(56, 'U00001', 'Add material MAT00001', '2021-05-02 18:54:57'),
(57, 'U00001', 'Add material MAT00001', '2021-05-02 18:56:10'),
(58, 'U00001', 'Add material MAT00004', '2021-05-02 18:57:37'),
(59, 'U00001', 'Add material MAT00003', '2021-05-02 19:31:03'),
(60, '', 'Login', '2021-05-03 15:09:12'),
(61, 'U00001', 'Login', '2021-05-03 15:09:17'),
(62, 'U00001', 'Logout', '2021-05-03 15:33:19'),
(63, '', 'Login', '2021-05-03 15:33:32'),
(64, 'U00001', 'Login', '2021-05-03 15:33:40'),
(65, 'U00001', 'Start order process OR00105', '2021-05-03 15:35:38'),
(66, 'U00001', 'Add user U00007', '2021-05-03 17:53:12'),
(67, 'U00001', 'Add user U00008', '2021-05-03 17:56:29'),
(68, 'U00001', 'Add user U00009', '2021-05-03 17:59:17'),
(69, 'U00001', 'Add user U00010', '2021-05-03 17:59:37'),
(70, 'U00001', 'Add user U00011', '2021-05-03 18:00:34'),
(71, 'U00001', 'Add user U00012', '2021-05-03 18:01:41'),
(72, 'U00001', 'Add user U00002', '2021-05-03 18:07:19'),
(73, 'U00001', 'Add user U00003', '2021-05-03 18:08:50'),
(74, 'U00001', 'Add user U00004', '2021-05-03 18:09:27'),
(75, 'U00001', 'Add user U00005', '2021-05-03 18:10:24'),
(76, 'U00001', 'Udate user ', '2021-05-03 18:26:39'),
(77, 'U00001', 'Udate user <br />\r\n<b>Notice</b>:  Undefined variable: U00001 in <b>C:', '2021-05-03 18:28:16'),
(78, 'U00001', 'Udate user <br />\r\n<b>Notice</b>:  Undefined variable: U00001 in <b>C:', '2021-05-03 18:29:44'),
(79, 'U00001', 'Udate user <br />\r\n<b>Notice</b>:  Undefined variable: U00001 in <b>C:', '2021-05-03 18:30:47'),
(80, 'U00001', 'Udate user <br />\r\n<b>Notice</b>:  Undefined variable: U00001 in <b>C:', '2021-05-03 18:31:29'),
(81, 'U00001', 'Udate user <br />\r\n<b>Notice</b>:  Undefined variable: U00001 in <b>C:', '2021-05-03 18:32:55'),
(82, 'U00001', 'Udate user <br />\r\n<b>Notice</b>:  Undefined variable: U00001 in <b>C:', '2021-05-03 18:32:58'),
(83, 'U00001', 'Udate user <br />\r\n<b>Notice</b>:  Undefined variable: U00001 in <b>C:', '2021-05-03 18:32:58'),
(84, 'U00001', 'Udate user <br />\r\n<b>Notice</b>:  Undefined variable: U00001 in <b>C:', '2021-05-03 18:32:59'),
(85, 'U00001', 'Udate user <br />\r\n<b>Notice</b>:  Undefined variable: U00001 in <b>C:', '2021-05-03 18:34:45'),
(86, 'U00001', 'Udate user <br />\r\n<b>Notice</b>:  Undefined variable: U00001 in <b>C:', '2021-05-03 18:35:55'),
(87, 'U00001', 'Udate user <br />\r\n<b>Notice</b>:  Undefined variable: U00001 in <b>C:', '2021-05-03 18:36:07'),
(88, 'U00001', 'Udate user <br />\r\n<b>Notice</b>:  Undefined variable: U00001 in <b>C:', '2021-05-03 18:36:49'),
(89, 'U00001', 'Udate user <br />\r\n<b>Notice</b>:  Undefined variable: U00001 in <b>C:', '2021-05-03 18:37:09'),
(90, 'U00001', 'Udate user <br />\r\n<b>Notice</b>:  Undefined variable: U00001 in <b>C:', '2021-05-03 18:37:19'),
(91, 'U00001', 'Udate user <br />\r\n<b>Notice</b>:  Undefined variable: U00001 in <b>C:', '2021-05-03 18:39:11'),
(92, 'U00001', 'Udate user <br />\r\n<b>Notice</b>:  Undefined variable: U00002 in <b>C:', '2021-05-03 18:40:55'),
(93, 'U00001', 'Udate user U00002', '2021-05-03 18:42:00'),
(94, 'U00001', 'Udate user U00002', '2021-05-03 18:42:57'),
(95, 'U00001', 'Udate user U00002', '2021-05-03 18:43:26'),
(96, 'U00001', 'Udate user U00004', '2021-05-03 18:45:10'),
(97, 'U00001', 'Udate user U00003', '2021-05-03 18:45:30'),
(98, 'U00001', 'Set order completed OR00016', '2021-05-03 18:55:22'),
(99, 'U00001', 'Set order completed OR00016', '2021-05-03 18:58:43'),
(100, 'U00001', 'Set order completed OR00071', '2021-05-03 18:58:55'),
(101, 'U00001', 'Start order process OR00106', '2021-05-03 18:59:45'),
(102, 'U00001', 'Set order completed OR00011', '2021-05-03 18:59:51'),
(103, 'U00001', 'Start order delivery OR00096', '2021-05-03 19:00:00'),
(104, 'U00001', 'Start delivery OR00015', '2021-05-03 19:00:20'),
(105, 'U00001', 'Handover order OR00015', '2021-05-03 19:00:27'),
(106, 'U00001', 'Start delivery OR00096', '2021-05-03 19:05:30'),
(107, 'U00001', 'Handover order OR00002', '2021-05-03 19:05:35'),
(108, 'U00001', 'Handover order OR00096', '2021-05-03 19:08:13'),
(109, 'U00001', 'Handover order OR00015', '2021-05-03 20:03:54'),
(110, 'U00001', 'Start order process OR00104', '2021-05-03 21:06:24'),
(111, 'U00001', 'Start order process OR00103', '2021-05-03 21:06:28'),
(112, 'U00001', 'Start order process OR00100', '2021-05-03 21:06:34'),
(113, 'U00001', 'Set order completed OR00012', '2021-05-03 21:06:39'),
(114, 'U00001', 'Set order completed OR00087', '2021-05-03 21:06:48'),
(115, 'U00001', 'Set order completed OR00088', '2021-05-03 21:06:55'),
(116, 'U00001', 'Start order delivery OR00016', '2021-05-03 21:07:04'),
(117, 'U00001', 'Start order delivery OR00014', '2021-05-03 21:07:11'),
(118, 'U00001', 'Start order delivery OR00010', '2021-05-03 21:07:18'),
(119, 'U00001', 'Start delivery OR00010', '2021-05-03 21:07:33'),
(120, 'U00001', 'Start delivery OR00016', '2021-05-03 21:07:37'),
(121, 'U00001', 'Start delivery OR00004', '2021-05-03 21:07:41'),
(122, 'U00001', 'Handover order OR00010', '2021-05-03 21:07:46'),
(123, 'U00001', 'Handover order OR00004', '2021-05-03 21:07:54'),
(124, 'U00001', 'Handover order OR00016', '2021-05-03 21:08:02'),
(125, '', 'Try to reset password', '2021-05-03 21:55:38'),
(126, '', 'Try to reset password', '2021-05-03 21:55:54'),
(127, '', 'Try to reset password', '2021-05-03 21:58:01'),
(128, '', 'Reset password', '2021-05-03 22:07:09'),
(129, '', 'Reset password', '2021-05-03 22:19:24'),
(130, '', 'Reset password', '2021-05-03 22:19:52'),
(131, '', 'Reset password', '2021-05-03 22:20:11'),
(132, '', 'Reset password', '2021-05-03 22:20:57'),
(133, '', 'Login', '2021-05-03 22:21:04'),
(134, 'U00001', 'Login', '2021-05-03 22:21:16'),
(135, 'U00001', 'Add new material type MAT00010', '2021-05-03 22:21:43'),
(136, 'U00001', 'Add new material type MAT00010', '2021-05-04 01:36:49'),
(137, 'U00001', 'Add new material type MAT00011', '2021-05-04 01:37:20'),
(138, 'U00001', 'Add new material type MAT00012', '2021-05-04 01:37:42'),
(139, 'U00001', 'Add new design PR00008', '2021-05-04 01:39:46'),
(140, 'U00001', 'Add new design PR00009', '2021-05-04 01:41:07'),
(141, 'U00001', 'Add new design PR00010', '2021-05-04 01:43:46'),
(142, 'U00001', 'Login', '2021-05-04 02:11:02'),
(143, 'U00001', 'Start order process OR00102', '2021-05-04 02:11:45'),
(144, 'U00001', 'Logout', '2021-05-04 02:53:40'),
(145, '', 'Reset password', '2021-05-04 02:54:53'),
(146, 'U00002', 'Login', '2021-05-04 02:55:12'),
(147, 'U00002', 'Change password U00002', '2021-05-04 02:56:06'),
(148, 'U00002', 'Login', '2021-05-04 02:56:21'),
(149, 'U00002', 'Logout', '2021-05-04 02:56:29'),
(150, 'U00001', 'Login', '2021-05-04 02:56:36'),
(151, 'U00001', 'Change password U00001', '2021-05-04 02:56:52'),
(152, 'U00001', 'Login', '2021-05-04 02:57:00'),
(153, 'U00001', 'Logout', '2021-05-04 02:57:08'),
(154, '', 'Login', '2021-05-04 03:12:16'),
(155, '', 'Reset password', '2021-05-04 03:13:22'),
(156, 'U00001', 'Login', '2021-05-04 03:13:32'),
(157, 'U00001', 'Udate user U00004', '2021-05-04 03:15:00'),
(158, 'U00001', 'Deactivate user U00004', '2021-05-04 03:15:10'),
(159, 'U00001', 'Add user U00006', '2021-05-04 03:17:51'),
(160, 'U00001', 'Start order process OR00107', '2021-05-04 03:18:40'),
(161, 'U00001', 'Set order completed OR00001', '2021-05-04 03:19:10'),
(162, 'U00001', 'Sent email to customer', '2021-05-04 03:20:35'),
(163, 'U00001', 'Block customer CUS00002', '2021-05-04 03:20:56'),
(164, 'U00001', 'Unblack customer CUS00002', '2021-05-04 03:21:07'),
(165, 'U00001', 'Start delivery OR00014', '2021-05-04 03:21:54'),
(166, 'U00001', 'Handover order OR00014', '2021-05-04 03:22:23'),
(167, 'U00001', 'Activate supplier  SUP00005', '2021-05-04 03:22:51'),
(168, 'U00001', 'Add new supplier SUP00006', '2021-05-04 03:23:37'),
(169, 'U00001', 'Update supplier  SUP00002', '2021-05-04 03:23:53'),
(170, 'U00001', 'Add new material type MAT00013', '2021-05-04 03:24:38'),
(171, 'U00001', 'Add material MAT00010', '2021-05-04 03:24:51'),
(172, 'U00001', 'Add new design PR00011', '2021-05-04 03:28:15'),
(173, 'U00001', 'Add sub category DES00006', '2021-05-04 03:28:51'),
(174, 'U00001', 'Update profile U00001', '2021-05-04 03:35:20'),
(175, 'U00001', 'Change password U00001', '2021-05-04 03:35:59'),
(176, 'U00001', 'Login', '2021-05-04 03:36:16'),
(177, 'U00001', 'Logout', '2021-05-04 03:38:37'),
(178, 'U00001', 'Login', '2021-05-04 03:42:12'),
(179, 'U00001', 'Start delivery OR00077', '2021-05-04 03:52:09'),
(180, '', 'Login', '2021-05-07 21:25:44'),
(181, '', 'Login', '2021-05-07 21:27:10'),
(182, '', 'Login', '2021-05-07 21:27:15'),
(183, '', 'Login', '2021-05-07 21:27:22'),
(184, '', 'Login', '2021-05-07 21:27:27'),
(185, '', 'Login', '2021-05-07 21:27:35'),
(186, '', 'Login', '2021-05-07 21:27:39'),
(187, '', 'Login', '2021-05-07 21:27:44'),
(188, '', 'Login', '2021-05-07 21:27:50'),
(189, '', 'Reset password', '2021-05-07 21:28:29'),
(190, 'U00001', 'Login', '2021-05-07 21:28:34');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` varchar(20) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_status` int(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_status`) VALUES
('CAT00001', 'Metal', 1),
('CAT00002', 'Wood', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_sub_category`
--

CREATE TABLE `category_sub_category` (
  `cat_id` varchar(20) NOT NULL,
  `sub_cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_sub_category`
--

INSERT INTO `category_sub_category` (`cat_id`, `sub_cat_id`) VALUES
('CAT00001', 1),
('CAT00001', 4),
('CAT00002', 1),
('CAT00002', 2),
('CAT00002', 3),
('CAT00002', 4),
('CAT00002', 5);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` text NOT NULL,
  `contact` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `sendNreceive` int(2) NOT NULL,
  `read_status` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `contact`, `subject`, `message`, `sendNreceive`, `read_status`) VALUES
(2, 'Shahen', 'shahen@gmail.com', 767034394, 'Regarding orders', 'May i know about my order status', 1, 1),
(3, 'Udara', 'xogive@mailinator.com', 767034394, 'Regarding orders', 'order stast', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` varchar(11) NOT NULL,
  `customer_fName` varchar(30) NOT NULL,
  `customer_lName` varchar(30) NOT NULL,
  `customer_nic` varchar(15) NOT NULL,
  `customer_tel` varchar(10) NOT NULL,
  `customer_email` text NOT NULL,
  `customer_img` varchar(20) NOT NULL,
  `customer_gender` text NOT NULL,
  `customer_address` text NOT NULL,
  `customer_zip_code` int(11) NOT NULL,
  `customer_longitude` double NOT NULL,
  `customer_latitude` double NOT NULL,
  `customer_status` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_fName`, `customer_lName`, `customer_nic`, `customer_tel`, `customer_email`, `customer_img`, `customer_gender`, `customer_address`, `customer_zip_code`, `customer_longitude`, `customer_latitude`, `customer_status`) VALUES
('CUS00001', 'Sachini', 'Ruwanthika', '972720026V', '0718817067', 'sachi.sjp@gmail.com', 'sachi.jpg', '0', 'No.36, R.B 01, Somapura, Trincomalee.', 31222, 8.325152, 81.302178, 1),
('CUS00002', 'Lakshitha', 'Sandaruwan', '963439909V', '0704545678', 'Lakshitha@gmail.com', 'lakshitha.jpg', '1', 'No:45,Beliaththa.', 31343, 0, 0, 1),
('CUS00003', 'Mudhitha', 'rajapakshe', '954534534V', '0765645321', 'mudhitha@gmail.com', '', '1', 'No 87/1, kandy Road,kurunegala', 31222, 0, 0, 1),
('CUS00004', 'Lahiru', 'chamara', '953478856V', '0718834567', 'chamara@gmail.com', '', '1', 'No 54, alpitiya Road, Beliaththa', 31222, 0, 0, 1),
('CUS00005', 'Mudhitha', 'Rajapakshe', '953457756V', '0767876765', 'muditha@gmail.com', '', '1', 'kurunegala', 2334, 0, 0, 1),
('CUS00006', 'Achini', 'Harshika', '926810529V', '0711723361', 'achi.harshi@gmail.com', '', '0', 'No 36, R.B 01, Somapura, Trincomalee..', 31222, 0, 0, 1),
('CUS00007', 'Sandula', 'Rashmika', '992720045V', '0718817040', 'sandula@gmail.com', '', '1', 'No:45/A, Mollipatana, kanthale.', 3214, 0, 0, 1),
('CUS00008', 'Nimesha', 'sathsarani', '972720029V', '0718817099', 'nimesha@gmail.com', '', '0', 'No:53/A, Templase Road,Huludagoda.', 2314, 0, 0, 1),
('CUS00009', 'Madhawa', 'Dilshan', '973454329V', '0785634556', 'madhawa@gmail.com', '', '1', 'No:82/1, Katunayaka', 2345, 0, 0, 1),
('CUS00010', 'Dilina', 'Dilshan', '953423367V', '0717767567', 'dilina@gmail.com', '', '1', 'No:65/2, Awissawela road, mipe', 24578, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_login`
--

CREATE TABLE `customer_login` (
  `login_id` int(11) NOT NULL,
  `customer_user_name` varchar(50) NOT NULL,
  `customer_password` text NOT NULL,
  `customer_id` varchar(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_login`
--

INSERT INTO `customer_login` (`login_id`, `customer_user_name`, `customer_password`, `customer_id`, `status`) VALUES
(1, 'ruwanthika@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'CUS00001', 1),
(2, 'lakshitha@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'CUS00002', 1),
(4, 'chamara@gmail.com', '3582a25652ffd37222ccda439cab3ac92a0d3038', 'CUS00004', 1),
(5, 'muditha@gmail.com', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 'CUS00005', 1),
(6, 'achi.harshi@gmail.com', '5f6955d227a320c7f1f6c7da2a6d96a851a8118f', 'CUS00006', 1),
(7, 'sandula@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'CUS00007', 1),
(8, 'nimesha@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'CUS00008', 1),
(9, 'madhawa@gmail.com', '5f6955d227a320c7f1f6c7da2a6d96a851a8118f', 'CUS00009', 1),
(10, 'dilina@gmail.com', '5f6955d227a320c7f1f6c7da2a6d96a851a8118f', 'CUS00010', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `product_id` varchar(11) NOT NULL,
  `customer_id` varchar(11) NOT NULL,
  `rating` int(2) NOT NULL,
  `feedback_msg` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `product_id`, `customer_id`, `rating`, `feedback_msg`) VALUES
(1, 'PR00002', 'CUS00002', 4, 'perfect design'),
(2, 'PR00003', 'CUS00002', 5, 'exelent frames'),
(3, 'PR00002', 'CUS00002', 4, 'nice design and fast delivery'),
(4, 'PR00006', 'CUS00002', 4, 'nice design and fast delivery'),
(5, 'PR00001', 'CUS00001', 5, 'exelent customer sevice '),
(6, 'PR00006', 'CUS00001', 5, 'exelent customer sevice '),
(7, 'PR00002', 'CUS00002', 3, 'not bad');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` varchar(20) NOT NULL,
  `payment_id` varchar(20) NOT NULL,
  `order_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `payment_id`, `order_id`) VALUES
('IN00001', 'P00001', 'OR00001'),
('IN00002', 'P00002', 'OR00002'),
('IN00003', 'P00003', 'OR00004'),
('IN00004', 'P00004', 'OR00005'),
('IN00005', 'P00005', 'OR00006'),
('IN00006', 'P00006', 'OR00003'),
('IN00007', 'P00007', 'OR00006'),
('IN00008', 'P00008', 'OR00004'),
('IN00009', 'P00009', 'OR00003'),
('IN00010', 'P00010', 'OR00002'),
('IN00011', 'P00011', 'OR00001'),
('IN00012', 'P00012', 'OR00007'),
('IN00013', 'P00013', 'OR00008'),
('IN00014', 'P00014', 'OR00010'),
('IN00015', 'P00015', 'OR00013'),
('IN00016', 'P00016', 'OR00014'),
('IN00017', 'P00017', 'OR00009'),
('IN00018', 'P00018', 'OR00009'),
('IN00019', 'P00019', 'OR00015'),
('IN00020', 'P00020', 'OR00015'),
('IN00021', 'P00021', 'OR00014'),
('IN00022', 'P00022', 'OR00013'),
('IN00023', 'P00023', 'OR00012'),
('IN00024', 'P00024', 'OR00011'),
('IN00025', 'P00025', 'OR00010'),
('IN00026', 'P00026', 'OR00016'),
('IN00027', 'P00027', 'OR00017'),
('IN00028', 'P00028', 'OR00018'),
('IN00029', 'P00029', 'OR00019'),
('IN00030', 'P00030', 'OR00020'),
('IN00031', 'P00031', 'OR00021'),
('IN00032', 'P00032', 'OR00022'),
('IN00033', 'P00033', 'OR00023'),
('IN00034', 'P00034', 'OR00024'),
('IN00035', 'P00035', 'OR00025'),
('IN00036', 'P00036', 'OR00026'),
('IN00037', 'P00037', 'OR00027'),
('IN00038', 'P00038', 'OR00028'),
('IN00039', 'P00039', 'OR00029'),
('IN00040', 'P00040', 'OR00030'),
('IN00041', 'P00041', 'OR00031'),
('IN00042', 'P00042', 'OR00032'),
('IN00043', 'P00043', 'OR00033'),
('IN00044', 'P00044', 'OR00034'),
('IN00045', 'P00045', 'OR00035'),
('IN00046', 'P00046', 'OR00036'),
('IN00047', 'P00047', 'OR00037'),
('IN00048', 'P00048', 'OR00038'),
('IN00049', 'P00049', 'OR00039'),
('IN00050', 'P00050', 'OR00040'),
('IN00051', 'P00051', 'OR00041'),
('IN00052', 'P00052', 'OR00042'),
('IN00053', 'P00053', 'OR00043'),
('IN00054', 'P00054', 'OR00044'),
('IN00055', 'P00055', 'OR00045'),
('IN00056', 'P00056', 'OR00046'),
('IN00057', 'P00057', 'OR00047'),
('IN00058', 'P00058', 'OR00048'),
('IN00059', 'P00059', 'OR00049'),
('IN00060', 'P00060', 'OR00050'),
('IN00061', 'P00061', 'OR00051'),
('IN00062', 'P00062', 'OR00052'),
('IN00063', 'P00063', 'OR00053'),
('IN00064', 'P00064', 'OR00054'),
('IN00065', 'P00065', 'OR00055'),
('IN00066', 'P00066', 'OR00056'),
('IN00067', 'P00067', 'OR00057'),
('IN00068', 'P00068', 'OR00058'),
('IN00069', 'P00069', 'OR00059'),
('IN00070', 'P00070', 'OR00060'),
('IN00071', 'P00071', 'OR00061'),
('IN00072', 'P00072', 'OR00062'),
('IN00073', 'P00073', 'OR00063'),
('IN00074', 'P00074', 'OR00064'),
('IN00075', 'P00075', 'OR00065'),
('IN00076', 'P00076', 'OR00066'),
('IN00077', 'P00077', 'OR00067'),
('IN00078', 'P00078', 'OR00068'),
('IN00079', 'P00079', 'OR00069'),
('IN00080', 'P00080', 'OR00070'),
('IN00081', 'P00081', 'OR00071'),
('IN00082', 'P00082', 'OR00072'),
('IN00083', 'P00083', 'OR00073'),
('IN00084', 'P00084', 'OR00074'),
('IN00085', 'P00085', 'OR00075'),
('IN00086', 'P00086', 'OR00076'),
('IN00087', 'P00087', 'OR00077'),
('IN00088', 'P00088', 'OR00078'),
('IN00089', 'P00089', 'OR00079'),
('IN00090', 'P00090', 'OR00080'),
('IN00091', 'P00091', 'OR00081'),
('IN00092', 'P00092', 'OR00082'),
('IN00093', 'P00093', 'OR00083'),
('IN00094', 'P00094', 'OR00084'),
('IN00095', 'P00095', 'OR00085'),
('IN00096', 'P00096', 'OR00086'),
('IN00097', 'P00097', 'OR00087'),
('IN00098', 'P00098', 'OR00088'),
('IN00099', 'P00099', 'OR00089'),
('IN00100', 'P00100', 'OR00090'),
('IN00101', 'P00101', 'OR00091'),
('IN00102', 'P00102', 'OR00092'),
('IN00103', 'P00103', 'OR00093'),
('IN00104', 'P00104', 'OR00094'),
('IN00105', 'P00105', 'OR00096'),
('IN00106', 'P00106', 'OR00097'),
('IN00107', 'P00107', 'OR00098'),
('IN00108', 'P00108', 'OR00099'),
('IN00109', 'P00109', 'OR00100'),
('IN00110', 'P00110', 'OR00101'),
('IN00111', 'P00111', 'OR00102'),
('IN00112', 'P00112', 'OR00103'),
('IN00113', 'P00113', 'OR00104'),
('IN00114', 'P00114', 'OR00105'),
('IN00115', 'P00115', 'OR00106'),
('IN00116', 'P00116', 'OR00107');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `login_username` varchar(80) NOT NULL,
  `login_password` text NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `login_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `login_username`, `login_password`, `user_id`, `login_status`) VALUES
(1, 'Udara@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'U00001', 1),
(18, 'miron@gmail.com', 'd8aa4483f70bf559e62d5ad5d1fd75b26ca1acc6', 'U00002', 1),
(19, 'lakshitha@gmail.com', 'bff7953002891b2a94e7a4d61b21154858d84d92', 'U00003', 1),
(20, 'hamidea@gmail.com', '8f6576d52c7d03939715c34358fdbc6e3ad4eccc', 'U00004', 1),
(21, 'hiru@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'U00005', 1),
(22, 'udarwa@gmail.com', '1b1e3523f1491ce985f1b2df96e5d4a624ea30e3', 'U00006', 1);

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `material_id` varchar(20) NOT NULL,
  `material_name` varchar(100) NOT NULL,
  `material_type` varchar(20) NOT NULL,
  `qty` float NOT NULL DEFAULT '0',
  `order_request` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`material_id`, `material_name`, `material_type`, `qty`, `order_request`) VALUES
('MAT00001', 'Glass', 'CAT00003', 20003.9, 1),
('MAT00002', 'Hardboard', 'CAT00004', 20000, 1),
('MAT00003', 'Deep Gunmetal Gray Metal Canvas Floater ', 'CAT00001', 43.083, 1),
('MAT00004', 'Deep Black Metal Canvas Floater', 'CAT00001', 44.2495, 1),
('MAT00005', 'Black Metal Canvas Floater', 'CAT00001', 98.1666, 1),
('MAT00006', 'Gunmetal Gray Metal Canvas Floater', 'CAT00001', 5000, 1),
('MAT00007', 'Deep Black with Gold Metal Canvas Floater Picture', 'CAT00001', 4985, 1),
('MAT00008', 'Modern Gold Leaf Canvas Floater', 'CAT00002', 86.7499, 0),
('MAT00009', 'Modern White Canvas Floater', 'CAT00002', 96.25, 0),
('MAT00010', 'Antiqued silver ', 'CAT00001', 100, 0),
('MAT00011', 'Gold bamboo', 'CAT00002', 0, 0),
('MAT00012', 'Whitewashed gallery', 'CAT00001', 0, 0),
('MAT00013', 'Deep Black Metal  Floater Frame', 'CAT00002', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `module_id` int(11) NOT NULL,
  `module_name` varchar(30) NOT NULL,
  `module_class` text NOT NULL,
  `module_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`module_id`, `module_name`, `module_class`, `module_url`) VALUES
(1, 'User management', 'far fa-users-cog', 'user.php'),
(2, 'Order management', 'far fa-shopping-cart', 'order.php'),
(3, 'Customer management', 'fad fa-user-edit', 'customer.php'),
(4, 'Delivery management ', 'fas fa-truck-container', 'delivery.php'),
(5, 'Suppliers management', 'fal fa-user-cog', 'supplier.php'),
(6, 'Inventory management', 'fas fa-inventory', 'inventory.php'),
(7, 'Product management', 'far fa-photo-video', 'product.php'),
(8, 'Payment management', 'far fa-file-invoice-dollar', 'payment.php'),
(9, 'Report generating', 'fad fa-clipboard-list', 'report.php');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` varchar(20) NOT NULL,
  `customer_id` varchar(11) NOT NULL,
  `order_sub_total` double NOT NULL,
  `order_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_payment_status` int(11) NOT NULL DEFAULT '0',
  `order_status` int(11) NOT NULL DEFAULT '1',
  `order_notification` int(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `customer_id`, `order_sub_total`, `order_timestamp`, `order_payment_status`, `order_status`, `order_notification`) VALUES
('OR00001', 'CUS00001', 480, '2021-01-20 08:55:53', 1, 3, 0),
('OR00002', 'CUS00001', 240, '2021-02-16 12:21:13', 1, 6, 0),
('OR00003', 'CUS00001', 570, '2021-03-23 14:25:37', 1, 1, 0),
('OR00004', 'CUS00001', 2550, '2021-03-23 14:26:06', 1, 6, 0),
('OR00005', 'CUS00001', 120, '2021-03-26 09:36:00', 1, 5, 0),
('OR00006', 'CUS00001', 2060, '2021-03-26 09:39:41', 1, 1, 0),
('OR00007', 'CUS00001', 130, '2021-04-03 02:33:19', 1, 2, 0),
('OR00008', 'CUS00001', 555, '2021-04-10 05:33:18', 2, 2, 0),
('OR00009', 'CUS00001', 130, '2021-04-10 05:33:51', 1, 2, 0),
('OR00010', 'CUS00002', 1390, '2021-04-21 01:15:33', 1, 6, 0),
('OR00011', 'CUS00002', 360, '2021-04-21 09:18:35', 1, 3, 0),
('OR00012', 'CUS00002', 130, '2021-04-21 09:18:57', 1, 3, 0),
('OR00013', 'CUS00002', 9900, '2021-04-22 08:01:10', 1, 6, 0),
('OR00014', 'CUS00002', 10960, '2021-04-22 08:04:44', 1, 6, 0),
('OR00015', 'CUS00002', 32335, '2021-04-26 13:38:30', 1, 6, 0),
('OR00016', 'CUS00002', 4860, '2021-04-26 18:22:37', 1, 6, 0),
('OR00017', 'CUS00002', 3810, '2021-04-27 18:48:05', 1, 1, 0),
('OR00018', 'CUS00004', 26735, '2020-04-29 01:51:49', 2, 1, 0),
('OR00019', 'CUS00004', 43200, '2020-04-29 01:54:24', 1, 1, 0),
('OR00020', 'CUS00004', 16350, '2020-04-30 01:56:23', 1, 1, 0),
('OR00021', 'CUS00001', 47250, '2020-04-30 01:58:06', 1, 1, 0),
('OR00022', 'CUS00001', 19200, '2020-04-30 01:59:11', 2, 1, 0),
('OR00023', 'CUS00002', 91350, '2020-05-06 02:03:33', 2, 1, 0),
('OR00024', 'CUS00002', 80375, '2020-05-18 02:05:52', 1, 1, 0),
('OR00025', 'CUS00002', 11400, '2020-06-06 06:13:55', 1, 1, 0),
('OR00026', 'CUS00002', 26760, '2020-06-11 06:17:34', 1, 1, 0),
('OR00027', 'CUS00002', 50890, '2020-06-18 06:18:32', 2, 1, 0),
('OR00028', 'CUS00002', 9430, '2020-06-28 06:19:23', 1, 1, 0),
('OR00029', 'CUS00001', 21340, '2020-07-28 10:06:35', 2, 1, 0),
('OR00030', 'CUS00002', 8640, '2020-07-28 10:07:23', 1, 1, 0),
('OR00031', 'CUS00005', 18900, '2020-07-28 10:07:40', 1, 1, 0),
('OR00032', 'CUS00004', 37550, '2020-07-28 10:08:00', 1, 1, 0),
('OR00033', 'CUS00002', 23640, '2020-08-12 10:09:04', 1, 1, 0),
('OR00034', 'CUS00001', 36275, '2020-08-12 10:09:41', 2, 1, 0),
('OR00035', 'CUS00005', 31850, '2020-08-12 10:10:31', 1, 1, 0),
('OR00036', 'CUS00004', 61935, '2020-08-12 10:11:24', 1, 1, 0),
('OR00037', 'CUS00004', 37665, '2020-08-22 10:12:15', 1, 1, 0),
('OR00038', 'CUS00005', 60425, '2020-08-22 10:13:04', 1, 1, 0),
('OR00039', 'CUS00001', 27140, '2020-08-22 10:13:27', 2, 1, 0),
('OR00040', 'CUS00002', 38545, '2020-08-22 10:14:07', 2, 1, 0),
('OR00041', 'CUS00002', 23640, '2020-08-22 10:14:37', 1, 1, 0),
('OR00042', 'CUS00002', 50270, '2020-09-06 10:16:13', 2, 1, 0),
('OR00043', 'CUS00001', 22545, '2020-09-06 10:17:12', 2, 1, 0),
('OR00044', 'CUS00005', 12600, '2020-09-06 10:17:44', 1, 1, 0),
('OR00045', 'CUS00004', 24995, '2020-09-06 10:18:27', 2, 1, 0),
('OR00046', 'CUS00004', 21360, '2020-09-13 10:19:08', 2, 1, 0),
('OR00047', 'CUS00005', 18985, '2020-09-13 10:19:43', 2, 1, 0),
('OR00048', 'CUS00001', 16250, '2020-09-13 10:20:53', 2, 1, 0),
('OR00049', 'CUS00002', 32000, '2020-09-13 10:21:34', 2, 1, 0),
('OR00050', 'CUS00002', 28250, '2020-09-28 10:22:11', 1, 1, 0),
('OR00051', 'CUS00001', 8800, '2020-09-28 10:26:15', 1, 1, 0),
('OR00052', 'CUS00005', 12385, '2020-09-28 10:26:54', 2, 1, 0),
('OR00053', 'CUS00004', 23450, '2020-09-28 10:27:29', 2, 1, 0),
('OR00054', 'CUS00004', 19870, '2020-10-25 10:28:10', 1, 1, 0),
('OR00055', 'CUS00005', 9120, '2020-10-25 10:28:46', 1, 1, 0),
('OR00056', 'CUS00001', 27160, '2020-10-25 10:29:57', 2, 1, 0),
('OR00057', 'CUS00002', 13800, '2020-10-25 10:30:47', 1, 1, 0),
('OR00058', 'CUS00004', 27510, '2020-11-10 10:32:02', 1, 1, 0),
('OR00059', 'CUS00005', 9680, '2020-11-10 10:32:35', 1, 1, 0),
('OR00060', 'CUS00001', 16500, '2020-11-10 10:33:01', 2, 1, 0),
('OR00061', 'CUS00002', 9450, '2020-11-10 10:33:20', 1, 1, 0),
('OR00062', 'CUS00004', 9165, '2020-12-18 10:33:57', 1, 1, 0),
('OR00063', 'CUS00001', 9730, '2020-12-18 10:34:18', 2, 1, 0),
('OR00064', 'CUS00004', 14370, '2021-01-16 10:34:56', 1, 1, 0),
('OR00065', 'CUS00005', 22095, '2021-01-16 10:35:46', 1, 1, 0),
('OR00066', 'CUS00001', 13100, '2021-01-16 10:36:24', 1, 1, 0),
('OR00067', 'CUS00004', 13400, '2021-01-23 10:37:11', 2, 1, 0),
('OR00068', 'CUS00005', 11625, '2021-01-23 10:37:55', 1, 1, 0),
('OR00069', 'CUS00002', 700, '2021-01-23 10:38:25', 1, 1, 0),
('OR00070', 'CUS00001', 9070, '2021-01-23 10:38:34', 2, 1, 0),
('OR00071', 'CUS00004', 12550, '2021-02-23 10:39:28', 2, 3, 0),
('OR00072', 'CUS00005', 10280, '2021-02-23 10:40:08', 1, 1, 0),
('OR00073', 'CUS00001', 52000, '2021-02-23 10:40:30', 1, 1, 0),
('OR00074', 'CUS00002', 47910, '2021-02-23 10:41:05', 2, 1, 0),
('OR00075', 'CUS00004', 11470, '2021-02-18 10:41:45', 1, 1, 0),
('OR00076', 'CUS00005', 8955, '2021-02-18 10:42:15', 1, 1, 0),
('OR00077', 'CUS00001', 11700, '2021-02-18 10:42:38', 1, 5, 0),
('OR00078', 'CUS00002', 35400, '2021-02-18 10:43:30', 1, 1, 0),
('OR00079', 'CUS00004', 42965, '2021-03-02 10:44:42', 1, 2, 0),
('OR00080', 'CUS00005', 40000, '2021-03-02 10:45:22', 2, 2, 0),
('OR00081', 'CUS00001', 23680, '2021-03-02 10:45:55', 1, 2, 0),
('OR00082', 'CUS00002', 2320, '2021-03-02 10:46:30', 1, 2, 0),
('OR00083', 'CUS00004', 32080, '2021-03-05 10:47:06', 1, 1, 0),
('OR00084', 'CUS00002', 55000, '2021-03-05 10:47:41', 2, 2, 0),
('OR00085', 'CUS00001', 12075, '2021-03-05 10:48:05', 1, 2, 0),
('OR00086', 'CUS00005', 14640, '2021-03-05 10:48:32', 1, 2, 0),
('OR00087', 'CUS00005', 28600, '2021-03-16 10:49:44', 2, 3, 0),
('OR00088', 'CUS00002', 11920, '2021-03-16 10:50:13', 1, 3, 0),
('OR00089', 'CUS00004', 59300, '2021-04-07 10:50:44', 1, 2, 0),
('OR00090', 'CUS00002', 22060, '2021-04-07 10:51:27', 2, 3, 0),
('OR00091', 'CUS00001', 4060, '2021-04-07 10:51:43', 1, 3, 0),
('OR00092', 'CUS00004', 28870, '2021-04-10 10:52:19', 1, 3, 0),
('OR00093', 'CUS00001', 28090, '2021-04-10 10:52:47', 2, 3, 0),
('OR00094', 'CUS00002', 42715, '2021-04-10 10:53:33', 2, 3, 0),
('OR00095', 'CUS00002', 2400, '2021-04-30 09:31:54', 0, 1, 0),
('OR00096', 'CUS00002', 130, '2021-04-30 09:34:34', 2, 6, 0),
('OR00097', 'CUS00002', 130, '2021-04-30 20:48:00', 1, 1, 0),
('OR00098', 'CUS00002', 100, '2021-04-30 21:02:27', 2, 1, 0),
('OR00099', 'CUS00004', 680, '2021-04-30 21:35:29', 1, 2, 0),
('OR00100', 'CUS00004', 1500, '2021-05-01 13:58:59', 1, 2, 0),
('OR00101', 'CUS00004', 500, '2021-05-01 14:21:27', 1, 1, 0),
('OR00102', 'CUS00004', 3710, '2021-05-01 14:22:00', 2, 2, 0),
('OR00103', 'CUS00002', 130, '2021-05-02 08:38:55', 1, 2, 1),
('OR00104', 'CUS00002', 790, '2021-05-02 10:16:41', 2, 2, 1),
('OR00105', 'CUS00010', 2000, '2021-05-03 10:45:22', 1, 2, 1),
('OR00106', 'CUS00001', 2620, '2021-05-03 15:36:46', 1, 2, 1),
('OR00107', 'CUS00001', 760, '2021-05-04 03:09:34', 2, 2, 1),
('OR00108', 'CUS00001', 130, '2021-05-04 05:41:55', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_id` varchar(20) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `size_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_id`, `product_id`, `size_id`, `quantity`, `unit_price`) VALUES
('OR00001', 'PR00001', 3, 3, 160),
('OR00002', 'PR00002', 1, 2, 130),
('OR00002', 'PR00003', 1, 1, 110),
('OR00003', 'PR00001', 1, 1, 120),
('OR00004', 'PR00001', 11, 1, 450),
('OR00004', 'PR00006', 13, 3, 700),
('OR00005', 'PR00001', 1, 1, 120),
('OR00006', 'PR00001', 17, 2, 790),
('OR00007', 'PR00002', 1, 1, 130),
('OR00008', 'PR00002', 12, 1, 555),
('OR00009', 'PR00002', 1, 1, 130),
('OR00010', 'PR00002', 15, 2, 695),
('OR00011', 'PR00002', 1, 1, 130),
('OR00012', 'PR00002', 1, 1, 130),
('OR00013', 'PR00002', 8, 2, 330),
('OR00013', 'PR00002', 13, 6, 590),
('OR00013', 'PR00006', 1, 1, 100),
('OR00013', 'PR00006', 13, 8, 700),
('OR00014', 'PR00002', 15, 4, 695),
('OR00014', 'PR00002', 12, 4, 555),
('OR00014', 'PR00007', 14, 8, 745),
('OR00015', 'PR00001', 16, 10, 720),
('OR00015', 'PR00005', 18, 23, 945),
('OR00015', 'PR00005', 9, 8, 425),
('OR00016', 'PR00002', 4, 3, 210),
('OR00016', 'PR00002', 16, 5, 720),
('OR00016', 'PR00006', 5, 3, 210),
('OR00017', 'PR00002', 1, 1, 130),
('OR00017', 'PR00002', 8, 4, 330),
('OR00017', 'PR00004', 13, 4, 590),
('OR00018', 'PR00001', 8, 15, 310),
('OR00018', 'PR00006', 12, 17, 530),
('OR00018', 'PR00006', 2, 10, 120),
('OR00018', 'PR00005', 10, 5, 485),
('OR00018', 'PR00005', 18, 10, 945),
('OR00019', 'PR00004', 16, 10, 750),
('OR00019', 'PR00004', 21, 5, 1300),
('OR00019', 'PR00004', 1, 10, 145),
('OR00019', 'PR00004', 12, 10, 530),
('OR00019', 'PR00005', 14, 10, 700),
('OR00019', 'PR00005', 19, 10, 1050),
('OR00019', 'PR00007', 1, 10, 135),
('OR00019', 'PR00007', 6, 12, 300),
('OR00020', 'PR00003', 9, 10, 350),
('OR00020', 'PR00001', 11, 10, 450),
('OR00020', 'PR00007', 4, 10, 235),
('OR00020', 'PR00002', 21, 5, 1200),
('OR00021', 'PR00001', 17, 10, 790),
('OR00021', 'PR00001', 7, 10, 280),
('OR00021', 'PR00003', 3, 20, 140),
('OR00021', 'PR00003', 14, 15, 600),
('OR00021', 'PR00003', 21, 25, 990),
('OR00022', 'PR00003', 1, 50, 110),
('OR00022', 'PR00003', 19, 10, 875),
('OR00022', 'PR00003', 21, 5, 990),
('OR00023', 'PR00001', 1, 40, 120),
('OR00023', 'PR00001', 13, 10, 560),
('OR00023', 'PR00006', 3, 10, 145),
('OR00023', 'PR00006', 14, 10, 785),
('OR00023', 'PR00006', 16, 10, 865),
('OR00023', 'PR00006', 21, 10, 1100),
('OR00023', 'PR00007', 12, 25, 610),
('OR00023', 'PR00007', 2, 50, 150),
('OR00023', 'PR00001', 20, 10, 925),
('OR00023', 'PR00007', 15, 25, 800),
('OR00024', 'PR00002', 1, 20, 130),
('OR00024', 'PR00002', 15, 25, 695),
('OR00024', 'PR00002', 20, 50, 960),
('OR00024', 'PR00004', 14, 20, 620),
('OR00025', 'PR00001', 16, 10, 720),
('OR00025', 'PR00006', 5, 20, 210),
('OR00026', 'PR00002', 10, 17, 460),
('OR00026', 'PR00007', 21, 1, 1340),
('OR00026', 'PR00007', 18, 16, 1100),
('OR00027', 'PR00006', 1, 15, 100),
('OR00027', 'PR00005', 17, 26, 880),
('OR00027', 'PR00004', 15, 20, 700),
('OR00027', 'PR00002', 15, 18, 695),
('OR00028', 'PR00002', 1, 1, 130),
('OR00028', 'PR00004', 14, 15, 620),
('OR00029', 'PR00001', 8, 20, 310),
('OR00029', 'PR00004', 14, 12, 620),
('OR00029', 'PR00007', 11, 14, 550),
('OR00030', 'PR00002', 1, 12, 130),
('OR00030', 'PR00002', 13, 12, 590),
('OR00031', 'PR00001', 7, 15, 280),
('OR00031', 'PR00006', 19, 15, 980),
('OR00032', 'PR00001', 10, 10, 390),
('OR00032', 'PR00006', 13, 10, 700),
('OR00032', 'PR00007', 16, 25, 850),
('OR00032', 'PR00007', 1, 40, 135),
('OR00033', 'PR00001', 1, 18, 120),
('OR00033', 'PR00001', 6, 25, 240),
('OR00033', 'PR00001', 19, 18, 860),
('OR00034', 'PR00004', 12, 15, 530),
('OR00034', 'PR00004', 2, 15, 155),
('OR00034', 'PR00004', 21, 20, 1300),
('OR00035', 'PR00002', 1, 24, 130),
('OR00035', 'PR00002', 20, 13, 960),
('OR00035', 'PR00002', 18, 13, 850),
('OR00035', 'PR00007', 5, 20, 260),
('OR00036', 'PR00004', 7, 13, 355),
('OR00036', 'PR00005', 1, 17, 160),
('OR00036', 'PR00005', 12, 26, 590),
('OR00036', 'PR00005', 21, 26, 1300),
('OR00036', 'PR00004', 9, 13, 420),
('OR00037', 'PR00002', 15, 15, 695),
('OR00037', 'PR00002', 7, 15, 290),
('OR00037', 'PR00006', 9, 13, 390),
('OR00037', 'PR00006', 15, 22, 810),
('OR00038', 'PR00002', 1, 17, 130),
('OR00038', 'PR00002', 20, 17, 960),
('OR00038', 'PR00007', 9, 19, 430),
('OR00038', 'PR00007', 20, 19, 1290),
('OR00038', 'PR00005', 10, 19, 485),
('OR00039', 'PR00004', 13, 46, 590),
('OR00040', 'PR00002', 18, 24, 850),
('OR00040', 'PR00004', 15, 15, 700),
('OR00040', 'PR00002', 15, 11, 695),
('OR00041', 'PR00007', 1, 24, 135),
('OR00041', 'PR00007', 16, 24, 850),
('OR00042', 'PR00002', 8, 27, 330),
('OR00042', 'PR00001', 14, 12, 630),
('OR00042', 'PR00004', 16, 18, 750),
('OR00042', 'PR00007', 14, 18, 745),
('OR00042', 'PR00006', 12, 13, 530),
('OR00043', 'PR00002', 9, 15, 385),
('OR00043', 'PR00002', 19, 7, 890),
('OR00043', 'PR00004', 14, 17, 620),
('OR00044', 'PR00002', 11, 15, 500),
('OR00044', 'PR00002', 4, 15, 210),
('OR00044', 'PR00002', 1, 15, 130),
('OR00045', 'PR00002', 12, 13, 555),
('OR00045', 'PR00006', 5, 18, 210),
('OR00045', 'PR00005', 14, 20, 700),
('OR00046', 'PR00001', 13, 1, 560),
('OR00046', 'PR00001', 18, 12, 800),
('OR00046', 'PR00005', 14, 16, 700),
('OR00047', 'PR00002', 1, 23, 130),
('OR00047', 'PR00002', 9, 23, 385),
('OR00047', 'PR00004', 9, 17, 420),
('OR00048', 'PR00003', 1, 22, 110),
('OR00048', 'PR00003', 14, 15, 600),
('OR00048', 'PR00003', 6, 23, 210),
('OR00049', 'PR00002', 13, 20, 590),
('OR00049', 'PR00002', 18, 13, 850),
('OR00049', 'PR00007', 12, 15, 610),
('OR00050', 'PR00001', 14, 15, 630),
('OR00050', 'PR00001', 19, 6, 860),
('OR00050', 'PR00004', 14, 22, 620),
('OR00051', 'PR00002', 8, 10, 330),
('OR00051', 'PR00006', 11, 11, 500),
('OR00052', 'PR00002', 6, 15, 250),
('OR00052', 'PR00002', 3, 25, 195),
('OR00052', 'PR00007', 4, 16, 235),
('OR00053', 'PR00006', 11, 22, 500),
('OR00053', 'PR00007', 13, 15, 680),
('OR00053', 'PR00007', 2, 15, 150),
('OR00054', 'PR00004', 10, 12, 465),
('OR00054', 'PR00005', 10, 14, 485),
('OR00054', 'PR00001', 12, 15, 500),
('OR00055', 'PR00001', 7, 14, 280),
('OR00055', 'PR00005', 8, 13, 400),
('OR00056', 'PR00001', 13, 27, 560),
('OR00056', 'PR00001', 3, 39, 160),
('OR00056', 'PR00003', 8, 20, 290),
('OR00057', 'PR00001', 12, 15, 500),
('OR00057', 'PR00001', 1, 20, 120),
('OR00057', 'PR00006', 9, 10, 390),
('OR00058', 'PR00002', 5, 20, 230),
('OR00058', 'PR00002', 21, 11, 1200),
('OR00058', 'PR00005', 8, 11, 400),
('OR00058', 'PR00004', 13, 9, 590),
('OR00059', 'PR00001', 3, 18, 160),
('OR00059', 'PR00005', 8, 17, 400),
('OR00060', 'PR00002', 1, 20, 130),
('OR00060', 'PR00002', 15, 20, 695),
('OR00061', 'PR00001', 14, 15, 630),
('OR00062', 'PR00002', 1, 1, 130),
('OR00062', 'PR00002', 15, 13, 695),
('OR00063', 'PR00002', 15, 14, 695),
('OR00064', 'PR00001', 8, 22, 310),
('OR00064', 'PR00004', 12, 11, 530),
('OR00064', 'PR00007', 9, 4, 430),
('OR00065', 'PR00002', 7, 19, 290),
('OR00065', 'PR00002', 11, 19, 500),
('OR00065', 'PR00004', 1, 17, 145),
('OR00065', 'PR00006', 8, 14, 330),
('OR00066', 'PR00002', 10, 20, 460),
('OR00066', 'PR00002', 1, 30, 130),
('OR00067', 'PR00006', 13, 12, 700),
('OR00067', 'PR00006', 2, 10, 120),
('OR00067', 'PR00006', 6, 10, 250),
('OR00067', 'PR00005', 5, 5, 260),
('OR00068', 'PR00003', 4, 11, 160),
('OR00068', 'PR00003', 8, 11, 290),
('OR00068', 'PR00004', 1, 15, 145),
('OR00068', 'PR00004', 6, 15, 300),
('OR00069', 'PR00004', 15, 1, 700),
('OR00070', 'PR00003', 1, 1, 110),
('OR00070', 'PR00003', 13, 16, 560),
('OR00071', 'PR00004', 7, 20, 355),
('OR00071', 'PR00004', 1, 20, 145),
('OR00071', 'PR00005', 2, 15, 170),
('OR00072', 'PR00002', 8, 15, 330),
('OR00072', 'PR00002', 1, 22, 130),
('OR00072', 'PR00004', 3, 13, 190),
('OR00073', 'PR00003', 15, 80, 650),
('OR00074', 'PR00002', 1, 33, 130),
('OR00074', 'PR00002', 16, 46, 720),
('OR00074', 'PR00004', 15, 15, 700),
('OR00075', 'PR00001', 5, 13, 210),
('OR00075', 'PR00004', 8, 23, 380),
('OR00076', 'PR00002', 2, 22, 140),
('OR00076', 'PR00007', 4, 25, 235),
('OR00077', 'PR00004', 4, 20, 230),
('OR00077', 'PR00004', 7, 20, 355),
('OR00078', 'PR00006', 11, 40, 500),
('OR00078', 'PR00004', 11, 20, 500),
('OR00078', 'PR00007', 6, 18, 300),
('OR00079', 'PR00006', 10, 18, 430),
('OR00079', 'PR00006', 1, 27, 100),
('OR00079', 'PR00007', 1, 15, 135),
('OR00079', 'PR00007', 11, 20, 550),
('OR00079', 'PR00005', 15, 26, 750),
('OR00080', 'PR00002', 1, 21, 130),
('OR00080', 'PR00002', 10, 21, 460),
('OR00080', 'PR00002', 20, 25, 960),
('OR00080', 'PR00004', 3, 19, 190),
('OR00081', 'PR00001', 1, 48, 120),
('OR00081', 'PR00001', 13, 32, 560),
('OR00082', 'PR00006', 3, 16, 145),
('OR00083', 'PR00007', 3, 20, 190),
('OR00083', 'PR00007', 14, 28, 745),
('OR00083', 'PR00006', 12, 14, 530),
('OR00084', 'PR00002', 1, 1, 130),
('OR00084', 'PR00002', 14, 18, 660),
('OR00084', 'PR00002', 20, 30, 960),
('OR00084', 'PR00002', 8, 43, 330),
('OR00085', 'PR00002', 12, 1, 555),
('OR00085', 'PR00002', 16, 16, 720),
('OR00086', 'PR00007', 12, 24, 610),
('OR00087', 'PR00004', 9, 44, 420),
('OR00087', 'PR00004', 2, 28, 155),
('OR00087', 'PR00005', 7, 17, 340),
('OR00088', 'PR00002', 13, 17, 590),
('OR00088', 'PR00002', 4, 9, 210),
('OR00089', 'PR00002', 6, 28, 250),
('OR00089', 'PR00002', 18, 22, 850),
('OR00089', 'PR00002', 21, 28, 1200),
('OR00090', 'PR00004', 12, 12, 530),
('OR00090', 'PR00005', 10, 12, 485),
('OR00090', 'PR00005', 3, 22, 190),
('OR00090', 'PR00007', 8, 15, 380),
('OR00091', 'PR00002', 7, 14, 290),
('OR00092', 'PR00002', 5, 16, 230),
('OR00092', 'PR00002', 14, 24, 660),
('OR00092', 'PR00007', 16, 11, 850),
('OR00093', 'PR00001', 1, 38, 120),
('OR00093', 'PR00001', 15, 23, 710),
('OR00093', 'PR00007', 6, 24, 300),
('OR00094', 'PR00002', 12, 19, 555),
('OR00094', 'PR00004', 12, 17, 530),
('OR00094', 'PR00004', 17, 25, 820),
('OR00094', 'PR00005', 3, 14, 190),
('OR00095', 'PR00001', 18, 3, 800),
('OR00096', 'PR00002', 1, 1, 130),
('OR00097', 'PR00002', 1, 1, 130),
('OR00098', 'PR00006', 1, 1, 100),
('OR00099', 'PR00001', 1, 1, 120),
('OR00099', 'PR00001', 13, 1, 560),
('OR00100', 'PR00001', 12, 3, 500),
('OR00101', 'PR00002', 6, 2, 250),
('OR00102', 'PR00006', 12, 7, 530),
('OR00103', 'PR00002', 1, 1, 130),
('OR00104', 'PR00002', 1, 1, 130),
('OR00104', 'PR00002', 14, 1, 660),
('OR00105', 'PR00002', 11, 4, 500),
('OR00106', 'PR00002', 1, 2, 130),
('OR00106', 'PR00002', 13, 4, 590),
('OR00107', 'PR00008', 3, 1, 760),
('OR00108', 'PR00002', 1, 1, 130);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`status_id`, `status_name`) VALUES
(1, 'Pending'),
(2, 'On Process'),
(3, 'Waitig For Payment'),
(4, 'On Delivery'),
(5, 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` varchar(20) NOT NULL,
  `order_id` varchar(20) NOT NULL,
  `payment_amount` int(11) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `payment_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `order_id`, `payment_amount`, `payment_type`, `payment_timestamp`) VALUES
('P00001', 'OR00001', 480, 2, '2021-02-16 10:13:52'),
('P00002', 'OR00002', 120, 2, '2021-02-16 12:21:18'),
('P00003', 'OR00004', 1275, 2, '2021-03-23 14:26:15'),
('P00004', 'OR00005', 120, 1, '2021-03-26 09:37:18'),
('P00005', 'OR00006', 515, 2, '2021-03-31 17:58:02'),
('P00006', 'OR00003', 285, 2, '2021-03-31 17:58:32'),
('P00007', 'OR00006', 1030, 2, '2021-04-03 02:30:47'),
('P00008', 'OR00004', 1275, 2, '2021-04-03 02:30:52'),
('P00009', 'OR00003', 285, 2, '2021-04-03 02:30:58'),
('P00010', 'OR00002', 120, 2, '2021-04-03 02:31:02'),
('P00011', 'OR00001', 240, 2, '2021-04-03 02:31:08'),
('P00012', 'OR00007', 130, 1, '2021-04-03 02:33:23'),
('P00013', 'OR00008', 278, 2, '2021-04-10 05:33:22'),
('P00014', 'OR00010', 695, 2, '2021-04-21 01:15:39'),
('P00015', 'OR00013', 4950, 2, '2021-04-22 08:01:25'),
('P00016', 'OR00014', 5480, 2, '2021-04-22 08:06:09'),
('P00017', 'OR00009', 65, 2, '2021-04-22 12:44:44'),
('P00018', 'OR00009', 65, 2, '2021-04-22 12:45:22'),
('P00019', 'OR00015', 16168, 2, '2021-04-26 13:38:35'),
('P00020', 'OR00015', 16168, 2, '2021-04-26 13:41:02'),
('P00021', 'OR00014', 5480, 2, '2021-04-26 13:42:06'),
('P00022', 'OR00013', 4950, 2, '2021-04-26 13:42:10'),
('P00023', 'OR00012', 130, 1, '2021-04-26 13:42:14'),
('P00024', 'OR00011', 360, 1, '2021-04-26 13:42:19'),
('P00025', 'OR00010', 695, 2, '2021-04-26 13:42:23'),
('P00026', 'OR00016', 4860, 1, '2021-04-26 18:22:41'),
('P00027', 'OR00017', 3810, 1, '2021-04-27 18:48:08'),
('P00028', 'OR00018', 13368, 2, '2020-04-29 01:52:03'),
('P00029', 'OR00019', 43200, 1, '2020-04-29 01:54:28'),
('P00030', 'OR00020', 16350, 1, '2020-04-30 01:56:28'),
('P00031', 'OR00021', 47250, 1, '2020-04-30 01:58:11'),
('P00032', 'OR00022', 9600, 2, '2020-04-30 01:59:15'),
('P00033', 'OR00023', 45675, 2, '2020-05-06 02:03:40'),
('P00034', 'OR00024', 80375, 1, '2020-05-18 02:05:54'),
('P00035', 'OR00025', 11400, 1, '2020-06-06 06:14:20'),
('P00036', 'OR00026', 26760, 1, '2020-06-11 06:17:39'),
('P00037', 'OR00027', 25445, 2, '2020-06-18 06:18:35'),
('P00038', 'OR00028', 9430, 1, '2020-06-28 06:19:25'),
('P00039', 'OR00029', 10670, 2, '2020-07-28 10:06:40'),
('P00040', 'OR00030', 8640, 1, '2020-07-28 10:07:26'),
('P00041', 'OR00031', 18900, 1, '2020-07-28 10:07:45'),
('P00042', 'OR00032', 37550, 1, '2020-07-28 10:08:04'),
('P00043', 'OR00033', 23640, 1, '2020-08-12 10:09:07'),
('P00044', 'OR00034', 18138, 2, '2020-08-12 10:09:45'),
('P00045', 'OR00035', 31850, 1, '2020-08-12 10:10:35'),
('P00046', 'OR00036', 61935, 1, '2020-08-12 10:11:27'),
('P00047', 'OR00037', 37665, 1, '2020-08-22 10:12:17'),
('P00048', 'OR00038', 60425, 1, '2020-08-22 10:13:06'),
('P00049', 'OR00039', 13570, 2, '2020-08-22 10:13:30'),
('P00050', 'OR00040', 19273, 2, '2020-08-22 10:14:11'),
('P00051', 'OR00041', 23640, 1, '2020-08-22 10:14:40'),
('P00052', 'OR00042', 25135, 2, '2020-09-06 10:16:17'),
('P00053', 'OR00043', 11273, 2, '2020-09-06 10:17:16'),
('P00054', 'OR00044', 12600, 1, '2020-09-06 10:17:46'),
('P00055', 'OR00045', 12498, 2, '2020-09-06 10:18:31'),
('P00056', 'OR00046', 10680, 2, '2020-09-13 10:19:12'),
('P00057', 'OR00047', 9493, 2, '2020-09-13 10:19:48'),
('P00058', 'OR00048', 8125, 2, '2020-09-13 10:20:56'),
('P00059', 'OR00049', 16000, 2, '2020-09-13 10:21:37'),
('P00060', 'OR00050', 28250, 1, '2020-09-28 10:22:13'),
('P00061', 'OR00051', 8800, 1, '2020-09-28 10:26:18'),
('P00062', 'OR00052', 6193, 2, '2020-09-28 10:26:58'),
('P00063', 'OR00053', 11725, 2, '2020-09-28 10:27:32'),
('P00064', 'OR00054', 19870, 1, '2020-10-25 10:28:14'),
('P00065', 'OR00055', 9120, 1, '2020-10-25 10:28:48'),
('P00066', 'OR00056', 13580, 2, '2020-10-25 10:30:03'),
('P00067', 'OR00057', 13800, 1, '2020-10-25 10:30:53'),
('P00068', 'OR00058', 27510, 1, '2020-11-10 10:32:04'),
('P00069', 'OR00059', 9680, 1, '2020-11-10 10:32:37'),
('P00070', 'OR00060', 8250, 2, '2020-11-10 10:33:05'),
('P00071', 'OR00061', 9450, 1, '2020-11-10 10:33:22'),
('P00072', 'OR00062', 9165, 1, '2020-12-18 10:33:59'),
('P00073', 'OR00063', 4865, 2, '2020-12-18 10:34:21'),
('P00074', 'OR00064', 14370, 1, '2021-01-16 10:34:58'),
('P00075', 'OR00065', 22095, 1, '2021-01-16 10:35:49'),
('P00076', 'OR00066', 13100, 1, '2021-01-16 10:36:28'),
('P00077', 'OR00067', 6700, 2, '2021-01-23 10:37:14'),
('P00078', 'OR00068', 11625, 1, '2021-01-23 10:37:57'),
('P00079', 'OR00069', 700, 1, '2021-01-23 10:38:27'),
('P00080', 'OR00070', 4535, 2, '2021-01-23 10:38:38'),
('P00081', 'OR00071', 6275, 2, '2021-02-23 10:39:31'),
('P00082', 'OR00072', 10280, 1, '2021-02-23 10:40:10'),
('P00083', 'OR00073', 52000, 1, '2021-02-23 10:40:32'),
('P00084', 'OR00074', 23955, 2, '2021-02-23 10:41:09'),
('P00085', 'OR00075', 11470, 1, '2021-02-18 10:41:48'),
('P00086', 'OR00076', 8955, 1, '2021-02-18 10:42:17'),
('P00087', 'OR00077', 11700, 1, '2021-02-18 10:42:41'),
('P00088', 'OR00078', 35400, 1, '2021-02-18 10:43:33'),
('P00089', 'OR00079', 42965, 1, '2021-03-02 10:44:44'),
('P00090', 'OR00080', 20000, 2, '2021-03-02 10:45:25'),
('P00091', 'OR00081', 23680, 1, '2021-03-02 10:45:57'),
('P00092', 'OR00082', 2320, 1, '2021-03-02 10:46:32'),
('P00093', 'OR00083', 32080, 1, '2021-03-05 10:47:08'),
('P00094', 'OR00084', 27500, 2, '2021-03-05 10:47:44'),
('P00095', 'OR00085', 12075, 1, '2021-03-05 10:48:07'),
('P00096', 'OR00086', 14640, 1, '2021-03-05 10:48:34'),
('P00097', 'OR00087', 14300, 2, '2021-03-16 10:49:48'),
('P00098', 'OR00088', 11920, 1, '2021-03-16 10:50:15'),
('P00099', 'OR00089', 59300, 1, '2021-04-07 10:50:46'),
('P00100', 'OR00090', 11030, 2, '2021-04-07 10:51:30'),
('P00101', 'OR00091', 4060, 1, '2021-04-07 10:51:45'),
('P00102', 'OR00092', 28870, 1, '2021-04-10 10:52:21'),
('P00103', 'OR00093', 14045, 2, '2021-04-10 10:52:51'),
('P00104', 'OR00094', 21358, 2, '2021-04-10 10:53:37'),
('P00105', 'OR00096', 65, 2, '2021-04-30 09:35:11'),
('P00106', 'OR00097', 130, 1, '2021-04-30 20:48:03'),
('P00107', 'OR00098', 50, 2, '2021-04-30 21:02:32'),
('P00108', 'OR00099', 680, 1, '2021-04-30 21:35:41'),
('P00109', 'OR00100', 1500, 1, '2021-05-01 13:59:35'),
('P00110', 'OR00101', 500, 1, '2021-05-01 14:21:37'),
('P00111', 'OR00102', 1855, 2, '2021-05-01 14:22:07'),
('P00112', 'OR00103', 130, 1, '2021-05-02 08:38:57'),
('P00113', 'OR00104', 395, 2, '2021-05-02 10:17:41'),
('P00114', 'OR00105', 2000, 1, '2021-05-03 11:25:43'),
('P00115', 'OR00106', 2620, 1, '2021-05-03 15:37:23'),
('P00116', 'OR00107', 380, 2, '2021-05-04 03:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` varchar(20) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_code` text NOT NULL,
  `material_id` varchar(20) NOT NULL,
  `product_color` varchar(20) NOT NULL,
  `product_img_1` text NOT NULL,
  `product_img_2` text NOT NULL,
  `sub_cat_id` varchar(20) NOT NULL,
  `product_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_code`, `material_id`, `product_color`, `product_img_1`, `product_img_2`, `sub_cat_id`, `product_status`) VALUES
('PR00001', 'Deep Gunmetal Gray Metal Canvas Floater Frame', '718GUN', 'CAT00001', 'Gray', '1603086975_718GUN_l_7.jpg', '1603086975_718GUN_l_7s.jpg', 'DES00001', 1),
('PR00002', 'Deep Black Metal Canvas Floater Frame', '718BLK', 'CAT00001', 'Black', '1603087223_718BLK_l.jpg', '1603087223_718BLK_ls.jpg', 'DES00001', 1),
('PR00003', 'Black Metal Canvas Floater Frame', '720BLK', 'CAT00001', 'Black', '1603089827_720BLK_l_8.jpg', '1603089827_720BLK_l_8s.jpg', 'DES00001', 1),
('PR00004', 'Gunmetal Gray Metal Canvas Floater Frame', '720GUN', 'CAT00001', 'Gray', '1603090010_720GUN_l_7.jpg', '1603090010_720GUN_l_7s.jpeg', 'DES00001', 1),
('PR00005', 'Deep Black with Gold Metal Canvas Floater Picture', '718GFB', 'CAT00001', 'Gold', '1603090218_718GFB_l_13.jpg', '1603090218_718GFB_l_13s.jpeg', 'DES00001', 1),
('PR00006', 'Modern Gold Leaf Canvas Floater Frame', 'CFS3', 'CAT00002', 'Gold', '1603090528_CFS3.jpg', '1603090528_CFS3s.jpeg', 'DES00001', 1),
('PR00007', 'Modern White Canvas Floater Frame', 'CFS9', 'CAT00002', 'White', '1603090689_CFS9_l_2.jpg', '1603090689_CFS9_l_2s.jpeg', 'DES00001', 1),
('PR00008', 'Gold bamboo frame', 'GBM01', 'CAT00002', 'Gold', '1620092386_Red_Abstract_Art_Gold_Bamboo_Frame_Angle.jpg', '1620092386_Navy_Red_Abstract_Art_Gold_Bamboo_Frame_White_Wall.jpg', 'DES00005', 1),
('PR00009', 'Antiqued silver frame', 'ASF', 'CAT00001', 'white', '1620092467_Geode_Art_Silver_Frame_Angle.jpg', '1620092467_Geode_Art_Silver_Frame_White_Wall.jpg', 'DES00004', 1),
('PR00010', 'Whitewashed gallery frame', 'WG003', 'CAT00001', 'White', '1620092625_Man_Swimming_Art_Black_Frame_Angle.jpg', '1620092625_Man_Swimming_Art_Black_Frame_Table_Plant_Books.jpg', 'DES00002', 1),
('PR00011', 'modern black canvas  frame', 'CF1', 'CAT00001', 'Black', '1620098895_Red_Abstract_Art_Gold_Bamboo_Frame_Angle.jpg', '1620098895_Navy_Red_Abstract_Art_Gold_Bamboo_Frame_White_Wall.jpg', 'DES00004', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_material`
--

CREATE TABLE `product_material` (
  `product_id` varchar(20) NOT NULL,
  `material_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_material`
--

INSERT INTO `product_material` (`product_id`, `material_id`) VALUES
('PR00001', 'MAT00003'),
('PR00002', 'MAT00004'),
('PR00003', 'MAT00005'),
('PR00004', 'MAT00006'),
('PR00005', 'MAT00007'),
('PR00006', 'MAT00008'),
('PR00007', 'MAT00009'),
('PR00008', 'MAT00011'),
('PR00009', 'MAT00010'),
('PR00010', 'MAT00012'),
('PR00011', 'MAT00010');

-- --------------------------------------------------------

--
-- Table structure for table `product_price`
--

CREATE TABLE `product_price` (
  `product_id` varchar(20) NOT NULL,
  `size_id` int(11) NOT NULL,
  `product_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_price`
--

INSERT INTO `product_price` (`product_id`, `size_id`, `product_price`) VALUES
('PR00001', 1, 120),
('PR00001', 2, 135),
('PR00001', 3, 160),
('PR00001', 4, 190),
('PR00001', 5, 210),
('PR00001', 6, 240),
('PR00001', 7, 280),
('PR00001', 8, 310),
('PR00001', 9, 350),
('PR00001', 10, 390),
('PR00001', 11, 450),
('PR00001', 12, 500),
('PR00001', 13, 560),
('PR00001', 14, 630),
('PR00001', 15, 710),
('PR00001', 16, 720),
('PR00001', 17, 790),
('PR00001', 18, 800),
('PR00001', 19, 860),
('PR00001', 20, 925),
('PR00001', 21, 1000),
('PR00002', 1, 130),
('PR00002', 2, 140),
('PR00002', 3, 195),
('PR00002', 4, 210),
('PR00002', 5, 230),
('PR00002', 6, 250),
('PR00002', 7, 290),
('PR00002', 8, 330),
('PR00002', 9, 385),
('PR00002', 10, 460),
('PR00002', 11, 500),
('PR00002', 12, 555),
('PR00002', 13, 590),
('PR00002', 14, 660),
('PR00002', 15, 695),
('PR00002', 16, 720),
('PR00002', 17, 780),
('PR00002', 18, 850),
('PR00002', 19, 890),
('PR00002', 20, 960),
('PR00002', 21, 1200),
('PR00003', 1, 110),
('PR00003', 2, 125),
('PR00003', 3, 140),
('PR00003', 4, 160),
('PR00003', 5, 180),
('PR00003', 6, 210),
('PR00003', 7, 250),
('PR00003', 8, 290),
('PR00003', 9, 350),
('PR00003', 10, 385),
('PR00003', 11, 450),
('PR00003', 12, 490),
('PR00003', 13, 560),
('PR00003', 14, 600),
('PR00003', 15, 650),
('PR00003', 16, 730),
('PR00003', 17, 790),
('PR00003', 18, 840),
('PR00003', 19, 875),
('PR00003', 20, 925),
('PR00003', 21, 990),
('PR00004', 1, 145),
('PR00004', 2, 155),
('PR00004', 3, 190),
('PR00004', 4, 230),
('PR00004', 5, 260),
('PR00004', 6, 300),
('PR00004', 7, 355),
('PR00004', 8, 380),
('PR00004', 9, 420),
('PR00004', 10, 465),
('PR00004', 11, 500),
('PR00004', 12, 530),
('PR00004', 13, 590),
('PR00004', 14, 620),
('PR00004', 15, 700),
('PR00004', 16, 750),
('PR00004', 17, 820),
('PR00004', 18, 900),
('PR00004', 19, 990),
('PR00004', 20, 1250),
('PR00004', 21, 1300),
('PR00005', 1, 160),
('PR00005', 2, 170),
('PR00005', 3, 190),
('PR00005', 4, 225),
('PR00005', 5, 260),
('PR00005', 6, 295),
('PR00005', 7, 340),
('PR00005', 8, 400),
('PR00005', 9, 425),
('PR00005', 10, 485),
('PR00005', 11, 530),
('PR00005', 12, 590),
('PR00005', 13, 630),
('PR00005', 14, 700),
('PR00005', 15, 750),
('PR00005', 16, 815),
('PR00005', 17, 880),
('PR00005', 18, 945),
('PR00005', 19, 1050),
('PR00005', 20, 1225),
('PR00005', 21, 1300),
('PR00006', 1, 100),
('PR00006', 2, 120),
('PR00006', 3, 145),
('PR00006', 4, 180),
('PR00006', 5, 210),
('PR00006', 6, 250),
('PR00006', 7, 290),
('PR00006', 8, 330),
('PR00006', 9, 390),
('PR00006', 10, 430),
('PR00006', 11, 500),
('PR00006', 12, 530),
('PR00006', 13, 700),
('PR00006', 14, 785),
('PR00006', 15, 810),
('PR00006', 16, 865),
('PR00006', 17, 900),
('PR00006', 18, 930),
('PR00006', 19, 980),
('PR00006', 20, 1000),
('PR00006', 21, 1100),
('PR00007', 1, 135),
('PR00007', 2, 150),
('PR00007', 3, 190),
('PR00007', 4, 235),
('PR00007', 5, 260),
('PR00007', 6, 300),
('PR00007', 7, 350),
('PR00007', 8, 380),
('PR00007', 9, 430),
('PR00007', 10, 480),
('PR00007', 11, 550),
('PR00007', 12, 610),
('PR00007', 13, 680),
('PR00007', 14, 745),
('PR00007', 15, 800),
('PR00007', 16, 850),
('PR00007', 17, 925),
('PR00007', 18, 1100),
('PR00007', 19, 1225),
('PR00007', 20, 1290),
('PR00007', 21, 1340),
('PR00008', 1, 300),
('PR00008', 2, 400),
('PR00008', 3, 760),
('PR00008', 4, 1000),
('PR00009', 2, 200),
('PR00009', 4, 280),
('PR00009', 8, 350),
('PR00010', 1, 100),
('PR00010', 2, 130),
('PR00010', 3, 145),
('PR00010', 4, 170),
('PR00010', 5, 230),
('PR00010', 6, 300),
('PR00010', 7, 340),
('PR00010', 8, 380),
('PR00010', 9, 405),
('PR00010', 10, 430),
('PR00010', 11, 480),
('PR00010', 12, 530),
('PR00010', 13, 560),
('PR00010', 14, 625),
('PR00010', 15, 670),
('PR00010', 16, 700),
('PR00010', 17, 745),
('PR00010', 18, 800),
('PR00010', 19, 834),
('PR00010', 20, 900),
('PR00010', 21, 1000),
('PR00011', 2, 100),
('PR00011', 4, 150),
('PR00011', 8, 200);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(30) NOT NULL,
  `role_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `role_status`) VALUES
(1, '	 Administrator', 1),
(2, 'Manager', 1),
(3, '	 Stock Keeper', 1),
(4, 'Product Supervisor', 1),
(5, 'Delivery Agent', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role_module`
--

CREATE TABLE `role_module` (
  `role_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_module`
--

INSERT INTO `role_module` (`role_id`, `module_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(3, 5),
(3, 6),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(4, 7),
(4, 9),
(5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size_id` int(11) NOT NULL,
  `width` double NOT NULL,
  `height` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size_id`, `width`, `height`) VALUES
(1, 5, 5),
(2, 5, 7),
(3, 8, 8),
(4, 8, 10),
(5, 9, 12),
(6, 10, 10),
(7, 11, 14),
(8, 12, 12),
(9, 12, 16),
(10, 14, 18),
(11, 16, 20),
(12, 18, 24),
(13, 20, 20),
(14, 20, 24),
(15, 20, 30),
(16, 24, 24),
(17, 24, 30),
(18, 24, 36),
(19, 28, 32),
(20, 30, 40),
(21, 40, 60);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_cat_id` varchar(20) NOT NULL,
  `sub_cat_name` varchar(50) NOT NULL,
  `sub_cat_status` int(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_cat_id`, `sub_cat_name`, `sub_cat_status`) VALUES
('DES00001', 'Canvas floater', 0),
('DES00002', 'Plein Air', 0),
('DES00003', 'Document', 0),
('DES00004', 'Collage', 1),
('DES00005', 'Tabletop', 1),
('DES00006', 'TEST CAT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category_size`
--

CREATE TABLE `sub_category_size` (
  `sub_cat_id` varchar(20) NOT NULL,
  `size_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category_size`
--

INSERT INTO `sub_category_size` (`sub_cat_id`, `size_id`) VALUES
('DES00001', 1),
('DES00001', 2),
('DES00001', 3),
('DES00001', 4),
('DES00001', 5),
('DES00001', 6),
('DES00001', 7),
('DES00001', 8),
('DES00001', 9),
('DES00001', 10),
('DES00001', 11),
('DES00001', 12),
('DES00001', 13),
('DES00001', 14),
('DES00001', 15),
('DES00001', 16),
('DES00001', 17),
('DES00001', 18),
('DES00001', 19),
('DES00001', 20),
('DES00001', 21),
('DES00002', 1),
('DES00002', 2),
('DES00002', 3),
('DES00002', 4),
('DES00002', 5),
('DES00002', 6),
('DES00002', 7),
('DES00002', 8),
('DES00002', 9),
('DES00002', 10),
('DES00002', 11),
('DES00002', 12),
('DES00002', 13),
('DES00002', 14),
('DES00002', 15),
('DES00002', 16),
('DES00002', 17),
('DES00002', 18),
('DES00002', 19),
('DES00002', 20),
('DES00002', 21),
('DES00003', 1),
('DES00003', 2),
('DES00003', 3),
('DES00003', 4),
('DES00003', 5),
('DES00003', 6),
('DES00003', 7),
('DES00003', 8),
('DES00003', 9),
('DES00003', 10),
('DES00003', 11),
('DES00003', 12),
('DES00003', 13),
('DES00003', 14),
('DES00003', 15),
('DES00003', 16),
('DES00003', 17),
('DES00003', 18),
('DES00003', 19),
('DES00003', 20),
('DES00003', 21),
('DES00004', 2),
('DES00004', 4),
('DES00004', 8),
('DES00005', 1),
('DES00005', 2),
('DES00005', 3),
('DES00005', 4),
('DES00006', 1),
('DES00006', 2),
('DES00006', 3),
('DES00006', 4);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` varchar(11) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `supplier_cno` varchar(11) NOT NULL,
  `supplier_email` text NOT NULL,
  `supplier_address` varchar(100) NOT NULL,
  `supplier_status` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_cno`, `supplier_email`, `supplier_address`, `supplier_status`) VALUES
('SUP00001', 'Trade Promoters (Pvt) Ltd', '0777777777', 'trade@gmail.com', 'No:11/3a, Huludagoda Rd, Mt.Lavinia.', 1),
('SUP00002', 'Chamara Trades (Pvt) Ltd', '0718817067', 'chamratrade@gmail.com', 'No:212, Kottawa Rd, Panniitiya.', 1),
('SUP00003', 'Parakrama Timber Stores', '0756778987', 'parakramats@gmail.com', 'Parakrama Timber Stores, Galle Road, Moratuwa.', 1),
('SUP00004', 'Mudhitha Traders', '0113434898', 'iammudhitha@gmail.com', 'No:780, Kuliyapitiya Road, Kurunegala.', 1),
('SUP00005', 'Glass House', '0777777770', 'iammuditha@gmail.com', 'No 36, Kandy Road, Sri Lanka.', 1),
('SUP00006', 'Mudhitha Traders', '0767034194', 'xogie@mailinator.com', 'No 36, R.B 01, Somapura, Trincomalee, Sri Lanka.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_material`
--

CREATE TABLE `supplier_material` (
  `supplier_id` varchar(11) NOT NULL,
  `material_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_material`
--

INSERT INTO `supplier_material` (`supplier_id`, `material_id`) VALUES
('SUP00001', 'MAT00001'),
('SUP00001', 'MAT00002'),
('SUP00002', 'MAT00001'),
('SUP00002', 'MAT00003'),
('SUP00002', 'MAT00004'),
('SUP00002', 'MAT00005'),
('SUP00002', 'MAT00007'),
('SUP00002', 'MAT00009'),
('SUP00002', 'MAT00010'),
('SUP00003', 'MAT00002'),
('SUP00003', 'MAT00008'),
('SUP00004', 'MAT00002'),
('SUP00004', 'MAT00003'),
('SUP00004', 'MAT00004'),
('SUP00004', 'MAT00005'),
('SUP00004', 'MAT00006'),
('SUP00004', 'MAT00007'),
('SUP00004', 'MAT00008'),
('SUP00004', 'MAT00009'),
('SUP00005', 'MAT00001'),
('SUP00005', 'MAT00002'),
('SUP00005', 'MAT00003'),
('SUP00005', 'MAT00004'),
('SUP00005', 'MAT00005'),
('SUP00005', 'MAT00006'),
('SUP00005', 'MAT00007'),
('SUP00006', 'MAT00001'),
('SUP00006', 'MAT00002'),
('SUP00006', 'MAT00003'),
('SUP00006', 'MAT00005');

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `precentage` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`id`, `name`, `precentage`) VALUES
(1, 'test', '10'),
(2, 'new tax', '6'),
(3, 'new tax', '10'),
(4, '', '10');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(11) NOT NULL,
  `user_fname` varchar(30) NOT NULL,
  `user_lname` varchar(30) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_gender` int(11) NOT NULL,
  `user_dob` date NOT NULL,
  `user_nic` varchar(20) NOT NULL,
  `user_address` text NOT NULL,
  `user_cno` varchar(10) NOT NULL,
  `role_id` varchar(50) NOT NULL,
  `user_status` int(11) NOT NULL DEFAULT '1',
  `user_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_gender`, `user_dob`, `user_nic`, `user_address`, `user_cno`, `role_id`, `user_status`, `user_image`) VALUES
('U00001', 'Udara', 'Athapathu', 'Udara@gmail.com', 1, '1997-09-28', '973456756v', 'No:36, R.B. 01, Somapura, Trincomalee.', '0718817067', '1', 1, '1619368346_1619237340_m.jpg'),
('U00002', 'Mirona', 'Nishmika', 'miron@gmail.com', 1, '1997-10-29', '974567845V', 'No:56, Kandy Road, Kiribathgoda', '0712345692', '2', 1, '1620067406_john_martin.jpg'),
('U00003', 'Lakshitha', 'Sandaruwan', 'lakshitha@gmail.com', 1, '1995-10-17', '974507845V', 'No:70, Galle Road, Rathmalana', '0772345692', '3', 1, '1620067530_images.jpg'),
('U00004', 'Hamide', 'udar', 'hamidea@gmail.com', 1, '1995-10-17', '974507843V', 'No: 67, Galle Road, Rathmalana', '0772345092', '4', 0, '1620067509_smiling-man_1187-1055.jpg'),
('U00005', 'Hiruni', 'Bhagya', 'hiru@gmail.com', 0, '1996-10-17', '974547843V', 'No: 67, Galle Road, Rathmalana', '0772340092', '5', 1, '1620065424_profile-pic.jpg'),
('U00006', 'achuni', 'harshika', 'udarwa@gmail.com', 0, '2008-06-25', '972724026V', 'No 36, R.B 01, Somapura, Trincomalee, Sri Lanka.', '0745628653', '4', 1, 'defaultImage.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `category_sub_category`
--
ALTER TABLE `category_sub_category`
  ADD PRIMARY KEY (`cat_id`,`sub_cat_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_login`
--
ALTER TABLE `customer_login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_material`
--
ALTER TABLE `product_material`
  ADD PRIMARY KEY (`product_id`,`material_id`);

--
-- Indexes for table `product_price`
--
ALTER TABLE `product_price`
  ADD PRIMARY KEY (`product_id`,`size_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `role_module`
--
ALTER TABLE `role_module`
  ADD PRIMARY KEY (`role_id`,`module_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- Indexes for table `sub_category_size`
--
ALTER TABLE `sub_category_size`
  ADD PRIMARY KEY (`sub_cat_id`,`size_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `supplier_material`
--
ALTER TABLE `supplier_material`
  ADD PRIMARY KEY (`supplier_id`,`material_id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_login`
--
ALTER TABLE `customer_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
