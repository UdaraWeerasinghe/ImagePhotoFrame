-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2021 at 10:05 PM
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
-- Database: `bit_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `log_activity` varchar(70) NOT NULL,
  `log_description` varchar(200) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_fName` varchar(30) NOT NULL,
  `customer_lName` varchar(30) NOT NULL,
  `customer_tel` varchar(10) NOT NULL,
  `customer_email` text NOT NULL,
  `customer_address` text NOT NULL,
  `customer_longitude` double NOT NULL,
  `customer_latitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_fName`, `customer_lName`, `customer_tel`, `customer_email`, `customer_address`, `customer_longitude`, `customer_latitude`) VALUES
(1, 'Sachini', 'Ruwanthika', '0718817067', 'sachi.sjp@gmail.com', 'No.36, R.B 01, Somapura, Trincomalee.', 8.325152, 81.302178),
(2, 'Lakshitha', 'Sandaruwan', '0704545678', 'Lakshitha@gmail.com', 'No:45,Beliaththa.', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_login`
--

CREATE TABLE `customer_login` (
  `login_id` int(11) NOT NULL,
  `customer_user_name` varchar(50) NOT NULL,
  `customer_password` text NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_login`
--

INSERT INTO `customer_login` (`login_id`, `customer_user_name`, `customer_password`, `customer_id`, `status`) VALUES
(1, 'ruwanthika@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 1),
(2, 'lakshitha@gmail.com', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 2, 1);

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
(1, 'Udara@gmail.com', '40BD001563085FC35165329EA1FF5C5ECBDBBEEF', 'U00001', 1),
(2, 'fenozehy@mailinator.com', 'd9322f4ce0d5499944510024da6a118dee46af41', 'U00002', 1),
(3, 'zasebywe@mailinator.com', '1b6c095eede95d6ba98f7ee5e55eac36e38b8469', 'U00003', 1),
(9, 'vyfos@mailinator.com', '08f58f499349543a956f49f0cdb81fb7b9a3cd23', 'U00004', 1);

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `material_id` varchar(20) NOT NULL,
  `material_name` varchar(100) NOT NULL,
  `material_type` varchar(20) NOT NULL,
  `qty` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`material_id`, `material_name`, `material_type`, `qty`) VALUES
('MAT00001', 'Glass', 'CAT00003', 97.83),
('MAT00002', 'Hardboard', 'CAT00004', 97.83),
('MAT00003', 'Deep Gunmetal Gray Metal Canvas Floater Frame', 'CAT00001', 998.583),
('MAT00004', 'Deep Black Metal Canvas Floater Frame', 'CAT00001', 100),
('MAT00005', 'Black Metal Canvas Floater Frame', 'CAT00001', 100),
('MAT00006', 'Gunmetal Gray Metal Canvas Floater Frame', 'CAT00001', 5000),
('MAT00007', 'Deep Black with Gold Metal Canvas Floater Picture', 'CAT00001', 5000),
('MAT00008', 'Modern Gold Leaf Canvas Floater Frame', 'CAT00002', 100),
('MAT00009', 'Modern White Canvas Floater Frame', 'CAT00002', 99.08);

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
  `customer_id` int(11) NOT NULL,
  `order_sub_total` double NOT NULL,
  `order_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_payment_status` int(11) NOT NULL DEFAULT '0',
  `order_status` int(11) NOT NULL DEFAULT '1',
  `reject_reason` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `customer_id`, `order_sub_total`, `order_timestamp`, `order_payment_status`, `order_status`, `reject_reason`) VALUES
('OR00001', 1, 480, '2021-01-20 08:55:53', 1, 2, NULL),
('OR00002', 1, 130, '2021-01-20 09:09:04', 2, 1, NULL),
('OR00003', 1, 1255, '2021-01-20 16:17:10', 1, 1, NULL);

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
('OR00002', 'PR00002', 1, 1, 130),
('OR00003', 'PR00002', 3, 2, 195),
('OR00003', 'PR00006', 16, 1, 865);

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
  `payment_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `order_id`, `payment_amount`, `payment_type`) VALUES
('P00001', 'OR00002', 480, 1),
('P00002', 'OR00002', 65, 2),
('P00003', 'OR00003', 1255, 1);

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
('PR00007', 'Modern White Canvas Floater Frame', 'CFS9', 'CAT00002', 'White', '1603090689_CFS9_l_2.jpg', '1603090689_CFS9_l_2s.jpeg', 'DES00001', 1);

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
('PR00007', 'MAT00009');

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
('PR00007', 21, 1340);

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
('DES00003', 'Document', 1),
('DES00004', 'Collage', 1),
('DES00005', 'Tabletop', 1);

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
('DES00005', 4);

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
  `user_cno` varchar(10) NOT NULL,
  `role_id` varchar(50) NOT NULL,
  `user_status` int(11) NOT NULL DEFAULT '1',
  `user_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_gender`, `user_dob`, `user_nic`, `user_cno`, `role_id`, `user_status`, `user_image`) VALUES
('U00001', 'Udara', 'Weerasinghe', 'Udara@gmail.com', 1, '1997-09-28', '987777777V', '0711122666', '1', 1, 'defaultImage.jpg'),
('U00002', 'Tamekah Lyons', 'Roth Blackburn', 'fenozehy@mailinator.com', 0, '1996-09-08', '972720046v', '5', '3', 0, 'defaultImage.jpg'),
('U00003', 'Holmes Preston', 'Bethany Fuentes', 'zasebywe@mailinator.com', 0, '2018-12-02', '926810529V', '44', '2', 1, 'defaultImage.jpg'),
('U00004', 'Rhonda Howe', 'Burke Vaughn', 'vyfos@mailinator.com', 1, '1976-10-24', 'Error est facilis ex', '10', '3', 0, 'defaultImage.jpg');

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
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_id`,`product_id`);

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
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_login`
--
ALTER TABLE `customer_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
