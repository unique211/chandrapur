-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 28, 2019 at 03:36 AM
-- Server version: 5.6.46-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chandrapur`
--
CREATE DATABASE IF NOT EXISTS `chandrapur` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `chandrapur`;

-- --------------------------------------------------------

--
-- Table structure for table `fee_structure`
--

CREATE TABLE `fee_structure` (
  `id` int(11) NOT NULL,
  `service` varchar(100) NOT NULL,
  `amt` int(11) NOT NULL,
  `no_of_copy` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_structure`
--

INSERT INTO `fee_structure` (`id`, `service`, `amt`, `no_of_copy`, `status`, `add_date`, `modify_date`) VALUES
(6, 'Fire_Fighting_No_Objection_Certificate', 150, 1, 1, '2019-09-17 07:00:00', '2019-09-17 14:02:22'),
(5, 'Inheritance_Certificate', 100, 1, 1, '2019-09-17 07:00:00', '2019-09-17 14:02:13'),
(4, 'Property_Transfer_Record', 50, 1, 1, '2019-09-17 07:00:00', '2019-09-17 07:00:00'),
(7, 'Occupation_Certificate', 200, 1, 1, '2019-09-17 07:00:00', '2019-09-17 14:02:30'),
(8, 'Part_Certificate', 250, 1, 1, '2019-09-17 07:00:00', '2019-09-17 14:02:39'),
(9, 'Zone_Certificate', 300, 1, 1, '2019-09-17 07:00:00', '2019-09-17 14:02:48'),
(10, 'Construction_Certificate', 350, 1, 1, '2019-09-17 07:00:00', '2019-09-17 14:02:55'),
(11, 'Plant_Certificate', 350, 1, 1, '2019-09-17 07:00:00', '2019-09-17 14:03:03'),
(12, 'Fire_Fighting', 400, 1, 1, '2019-09-17 07:00:00', '2019-09-17 14:03:15'),
(13, 'Outstanding_Certificate', 200, 1, 1, '2019-09-17 07:00:00', '2019-09-17 14:03:24'),
(14, 'No_Objection_Certificate', 200, 1, 1, '2019-09-17 07:00:00', '2019-09-17 14:03:33'),
(15, 'Resident_Certificate', 300, 1, 1, '2019-09-17 07:00:00', '2019-09-17 14:03:41'),
(16, 'Asset_Detail_Certificate', 250, 1, 1, '2019-09-17 07:00:00', '2019-09-17 14:03:48');

-- --------------------------------------------------------

--
-- Table structure for table `menu_master`
--

CREATE TABLE `menu_master` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `is_child` enum('TRUE','FALSE') NOT NULL DEFAULT 'FALSE',
  `menu_order` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` enum('TRUE','FALSE') NOT NULL DEFAULT 'TRUE'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_master`
--

INSERT INTO `menu_master` (`id`, `menu_name`, `parent_id`, `is_child`, `menu_order`, `created_date`, `modify_date`, `is_active`) VALUES
(1, 'ABC', 0, 'FALSE', 2, '2019-11-07 14:49:08', '2019-11-07 21:53:29', 'TRUE');

-- --------------------------------------------------------

--
-- Table structure for table `online_payment_master`
--

CREATE TABLE `online_payment_master` (
  `id` int(11) NOT NULL,
  `client_id` varchar(11) NOT NULL,
  `ref_id` int(11) NOT NULL,
  `transaction_id` varchar(30) NOT NULL,
  `transaction_date` varchar(50) NOT NULL,
  `Services` varchar(50) NOT NULL,
  `no_of_copy` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_payment_master`
--

INSERT INTO `online_payment_master` (`id`, `client_id`, `ref_id`, `transaction_id`, `transaction_date`, `Services`, `no_of_copy`, `amount`, `status`) VALUES
(1, '7083828076', 5, '', '', 'Property_Transfer_Record', 1, 50, 0),
(2, '7574865414', 1, '308005434750', '18/09/2019 14:46:56', 'Inheritance_Certificate', 1, 100, 1),
(3, '7083828076', 5, '', '', 'Property_Transfer_Record', 1, 50, 0),
(4, '7083828076', 2, '', '', 'Inheritance_Certificate', 1, 100, 0),
(5, '7083828076', 5, '308005434795', '18/09/2019 14:56:04', 'Property_Transfer_Record', 1, 50, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fee_structure`
--
ALTER TABLE `fee_structure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_master`
--
ALTER TABLE `menu_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_payment_master`
--
ALTER TABLE `online_payment_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fee_structure`
--
ALTER TABLE `fee_structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `menu_master`
--
ALTER TABLE `menu_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `online_payment_master`
--
ALTER TABLE `online_payment_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
