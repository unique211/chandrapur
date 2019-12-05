-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2019 at 01:00 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chandrapur`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_master`
--

INSERT INTO `menu_master` (`id`, `menu_name`, `parent_id`, `is_child`, `menu_order`, `created_date`, `modify_date`, `is_active`) VALUES
(2, 'महापालिका', 0, 'FALSE', 2, '2019-11-06 17:08:40', '2019-11-06 11:42:03', 'TRUE'),
(3, 'मुख्य पृष्ठ', 0, 'FALSE', 1, '2019-11-06 17:12:42', '2019-11-06 11:42:42', 'TRUE'),
(4, 'महापालिका समिती', 2, 'TRUE', 1, '2019-11-06 17:13:21', '2019-11-06 11:43:21', 'TRUE'),
(5, 'क्षेत्रीय कार्यालये', 2, 'TRUE', 2, '2019-11-06 17:14:04', '2019-11-06 11:44:04', 'TRUE'),
(6, 'विभाग', 2, 'TRUE', 3, '2019-11-06 17:18:05', '2019-11-06 11:50:08', 'TRUE'),
(7, 'नागरिक ', 0, 'FALSE', 3, '2019-11-06 17:18:23', '2019-11-06 11:48:23', 'TRUE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu_master`
--
ALTER TABLE `menu_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu_master`
--
ALTER TABLE `menu_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
