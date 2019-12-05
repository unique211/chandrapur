-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 17, 2019 at 10:01 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

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
-- Table structure for table `about_muni_corp`
--

CREATE TABLE `about_muni_corp` (
  `id` int(11) NOT NULL,
  `file` varchar(100) CHARACTER SET utf8 NOT NULL,
  `desc` varchar(500) CHARACTER SET utf8 NOT NULL,
  `desc_m` varchar(500) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_muni_corp`
--

INSERT INTO `about_muni_corp` (`id`, `file`, `desc`, `desc_m`, `status`, `add_date`, `modify_date`, `user_id`) VALUES
(1, '9904760745.pdf', 'ajazkhan', 'pathan', 1, '2019-08-30 04:34:19', '2019-08-30 04:34:38', 'ajaz');

-- --------------------------------------------------------

--
-- Table structure for table `admin_staff_profile`
--

CREATE TABLE `admin_staff_profile` (
  `id` int(11) NOT NULL,
  `file` varchar(100) CHARACTER SET utf8 NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `name_m` varchar(100) CHARACTER SET utf8 NOT NULL,
  `mobile1` varchar(15) CHARACTER SET utf8 NOT NULL,
  `mobile2` varchar(15) CHARACTER SET utf8 NOT NULL,
  `designation` varchar(10) CHARACTER SET utf8 NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 NOT NULL,
  `section` varchar(10) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_staff_profile`
--

INSERT INTO `admin_staff_profile` (`id`, `file`, `name`, `name_m`, `mobile1`, `mobile2`, `designation`, `description`, `section`, `status`, `add_date`, `modify_date`, `user_id`) VALUES
(1, '9904760745.pdf', 'Ajazkhan', 'ajaz', '9904760745', '7016158344', '2', 'zxdzcx', '2', 1, '2019-08-29 07:16:24', '2019-08-29 07:16:24', 'ajaz');

-- --------------------------------------------------------

--
-- Table structure for table `annual_account`
--

CREATE TABLE `annual_account` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `desc` varchar(100) CHARACTER SET utf8 NOT NULL,
  `desc_m` varchar(100) CHARACTER SET utf8 NOT NULL,
  `file` varchar(100) CHARACTER SET utf8 NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `title_m` varchar(100) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

CREATE TABLE `budget` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `desc` varchar(100) CHARACTER SET utf8 NOT NULL,
  `desc_m` varchar(100) CHARACTER SET utf8 NOT NULL,
  `file` varchar(100) CHARACTER SET utf8 NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `title_m` varchar(100) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `contact` varchar(300) CHARACTER SET utf8 NOT NULL,
  `contact_m` varchar(300) CHARACTER SET utf8 NOT NULL,
  `map` varchar(500) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `contact`, `contact_m`, `map`, `status`, `add_date`, `modify_date`, `user_id`) VALUES
(1, 'ajaz', 'pathan', 'dfdsfsdf', 1, '2019-08-29 12:53:21', '2019-08-29 12:53:21', 'ajaz');

-- --------------------------------------------------------

--
-- Table structure for table `councilor_profile`
--

CREATE TABLE `councilor_profile` (
  `id` int(11) NOT NULL,
  `file` varchar(100) CHARACTER SET utf8 NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `name_m` varchar(100) CHARACTER SET utf8 NOT NULL,
  `mobile1` varchar(15) CHARACTER SET utf8 NOT NULL,
  `mobile2` varchar(15) CHARACTER SET utf8 NOT NULL,
  `designation` varchar(10) CHARACTER SET utf8 NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ward` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ward_m` varchar(50) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `councilor_profile`
--

INSERT INTO `councilor_profile` (`id`, `file`, `name`, `name_m`, `mobile1`, `mobile2`, `designation`, `description`, `ward`, `ward_m`, `status`, `add_date`, `modify_date`, `user_id`) VALUES
(1, 'allysoftsolutions_(1).png', 'ajaz', 'pathan', '9904760745', '7016158344', '1', 'wdsads', '323', '5511', 1, '2019-09-02 10:04:38', '2019-09-02 10:06:27', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `disaster_management`
--

CREATE TABLE `disaster_management` (
  `id` int(11) NOT NULL,
  `parent` varchar(100) CHARACTER SET utf8 NOT NULL,
  `file` varchar(100) CHARACTER SET utf8 NOT NULL,
  `file2` varchar(100) CHARACTER SET utf8 NOT NULL,
  `name` varchar(500) CHARACTER SET utf8 NOT NULL,
  `name_m` varchar(500) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disaster_management`
--

INSERT INTO `disaster_management` (`id`, `parent`, `file`, `file2`, `name`, `name_m`, `status`, `add_date`, `modify_date`, `user_id`) VALUES
(1, 'parent_1', '99047607454.pdf', 'admin_panel_changes.pdf', 'ajaz', 'parthan', 1, '2019-08-30 05:13:24', '2019-08-30 05:14:36', 'ajaz');

-- --------------------------------------------------------

--
-- Table structure for table `emergency_phone`
--

CREATE TABLE `emergency_phone` (
  `id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `title_m` varchar(100) CHARACTER SET utf8 NOT NULL,
  `phone` bigint(15) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emergency_phone`
--

INSERT INTO `emergency_phone` (`id`, `title`, `title_m`, `phone`, `status`, `add_date`, `modify_date`, `user_id`) VALUES
(1, 'Police', 'emergency', 100, 1, '2019-08-29 10:31:58', '2019-08-29 10:31:58', 'ajaz'),
(2, 'Ambulance', 'emergency', 108, 1, '2019-08-29 10:32:22', '2019-08-29 10:32:35', 'ajaz');

-- --------------------------------------------------------

--
-- Table structure for table `e_link`
--

CREATE TABLE `e_link` (
  `id` int(11) NOT NULL,
  `e_link` varchar(100) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `e_link`
--

INSERT INTO `e_link` (`id`, `e_link`, `status`, `add_date`, `modify_date`, `user_id`) VALUES
(1, 'ajaz.com.in', 1, '2019-08-29 09:28:42', '2019-08-29 09:28:53', 'ajaz');

-- --------------------------------------------------------

--
-- Table structure for table `e_tenders`
--

CREATE TABLE `e_tenders` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `desc` varchar(100) CHARACTER SET utf8 NOT NULL,
  `desc_m` varchar(100) CHARACTER SET utf8 NOT NULL,
  `file` varchar(100) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `e_tenders`
--

INSERT INTO `e_tenders` (`id`, `date`, `desc`, `desc_m`, `file`, `status`, `add_date`, `modify_date`, `user_id`) VALUES
(1, '2019-08-29', 'sasas223', 'asas', 'admin_panel_changes.pdf', 1, '2019-08-29 11:10:05', '2019-08-29 11:10:10', 'ajaz');

-- --------------------------------------------------------

--
-- Table structure for table `first_page_text`
--

CREATE TABLE `first_page_text` (
  `id` int(11) NOT NULL,
  `tomb` varchar(300) CHARACTER SET utf8 NOT NULL,
  `tomb_m` varchar(300) CHARACTER SET utf8 NOT NULL,
  `desc` varchar(500) CHARACTER SET utf8 NOT NULL,
  `desc_m` varchar(500) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `first_page_text`
--

INSERT INTO `first_page_text` (`id`, `tomb`, `tomb_m`, `desc`, `desc_m`, `status`, `add_date`, `modify_date`, `user_id`) VALUES
(1, 'ajazkhan', 'pathan', 'bbcc', 'aa', 1, '2019-08-29 12:03:23', '2019-08-29 12:22:18', 'ajaz');

-- --------------------------------------------------------

--
-- Table structure for table `frequiently_ask_questions`
--

CREATE TABLE `frequiently_ask_questions` (
  `id` int(11) NOT NULL,
  `question` varchar(300) CHARACTER SET utf8 NOT NULL,
  `question_m` varchar(300) CHARACTER SET utf8 NOT NULL,
  `ans` varchar(300) CHARACTER SET utf8 NOT NULL,
  `ans_m` varchar(300) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frequiently_ask_questions`
--

INSERT INTO `frequiently_ask_questions` (`id`, `question`, `question_m`, `ans`, `ans_m`, `status`, `add_date`, `modify_date`, `user_id`) VALUES
(1, 'ajazkhan pathan', 'jjjj1111', 'ajazx2222', 'sdsdsd', 1, '2019-09-02 11:56:52', '2019-09-02 11:58:19', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `file` varchar(100) CHARACTER SET utf8 NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `title_m` varchar(100) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `heat_action_plan`
--

CREATE TABLE `heat_action_plan` (
  `id` int(11) NOT NULL,
  `parent` varchar(50) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `desc` varchar(100) CHARACTER SET utf8 NOT NULL,
  `desc_m` varchar(100) CHARACTER SET utf8 NOT NULL,
  `file` varchar(100) CHARACTER SET utf8 NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `title_m` varchar(100) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `info_about_city`
--

CREATE TABLE `info_about_city` (
  `id` int(11) NOT NULL,
  `title` varchar(300) CHARACTER SET utf8 NOT NULL,
  `title_m` varchar(300) CHARACTER SET utf8 NOT NULL,
  `explaination` varchar(300) CHARACTER SET utf8 NOT NULL,
  `explaination_m` varchar(300) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `left_menu`
--

CREATE TABLE `left_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(100) CHARACTER SET utf8 NOT NULL,
  `menu_m` varchar(100) CHARACTER SET utf8 NOT NULL,
  `path` varchar(100) CHARACTER SET utf8 NOT NULL,
  `sort` varchar(100) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `left_menu`
--

INSERT INTO `left_menu` (`id`, `menu`, `menu_m`, `path`, `sort`, `status`, `add_date`, `modify_date`, `user_id`) VALUES
(1, 'ajaz', 'pathan', '1235', '555', 1, '2019-08-30 06:14:04', '2019-08-30 06:14:10', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `master_edu_service`
--

CREATE TABLE `master_edu_service` (
  `id` int(11) NOT NULL,
  `desc` varchar(100) CHARACTER SET utf8 NOT NULL,
  `desc_m` varchar(100) CHARACTER SET utf8 NOT NULL,
  `file` varchar(100) CHARACTER SET utf8 NOT NULL,
  `service` varchar(100) CHARACTER SET utf8 NOT NULL,
  `service_m` varchar(100) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_edu_service`
--

INSERT INTO `master_edu_service` (`id`, `desc`, `desc_m`, `file`, `service`, `service_m`, `status`, `add_date`, `modify_date`, `user_id`) VALUES
(1, 'dsdsd', 'sdsdsds', 'admin_panel_changes_(1).pdf', 'ajazsdsd', 'dsdsds55', 1, '2019-08-29 09:13:10', '2019-08-29 09:13:28', 'ajaz');

-- --------------------------------------------------------

--
-- Table structure for table `municipal_election`
--

CREATE TABLE `municipal_election` (
  `id` int(11) NOT NULL,
  `parent` varchar(50) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `news_desc` varchar(100) CHARACTER SET utf8 NOT NULL,
  `event_desc` varchar(100) CHARACTER SET utf8 NOT NULL,
  `file` varchar(100) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `municipal_resolutions_decisions`
--

CREATE TABLE `municipal_resolutions_decisions` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `decisions` varchar(100) CHARACTER SET utf8 NOT NULL,
  `decisions_m` varchar(100) CHARACTER SET utf8 NOT NULL,
  `file` varchar(100) CHARACTER SET utf8 NOT NULL,
  `resolutions` varchar(100) CHARACTER SET utf8 NOT NULL,
  `resolutions_m` varchar(100) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `municipal_resolutions_decisions`
--

INSERT INTO `municipal_resolutions_decisions` (`id`, `date`, `decisions`, `decisions_m`, `file`, `resolutions`, `resolutions_m`, `status`, `add_date`, `modify_date`, `user_id`) VALUES
(1, '2019-08-29', 'Hello', 'हॅलो', '9904760745.pdf', 'Bye', ' बाय', 1, '2019-08-29 04:38:42', '2019-08-29 04:39:15', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `new_developments`
--

CREATE TABLE `new_developments` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `desc` varchar(100) CHARACTER SET utf8 NOT NULL,
  `desc_m` varchar(100) CHARACTER SET utf8 NOT NULL,
  `file` varchar(100) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_developments`
--

INSERT INTO `new_developments` (`id`, `date`, `desc`, `desc_m`, `file`, `status`, `add_date`, `modify_date`, `user_id`) VALUES
(1, '2019-09-02', 'ajaz44', 'asa', '2.png', 1, '2019-09-02 10:55:47', '2019-09-02 10:56:06', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `quick_link`
--

CREATE TABLE `quick_link` (
  `id` int(11) NOT NULL,
  `quik_link` varchar(100) CHARACTER SET utf8 NOT NULL,
  `quik_link_m` varchar(100) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `right_menu`
--

CREATE TABLE `right_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(100) CHARACTER SET utf8 NOT NULL,
  `menu_m` varchar(100) CHARACTER SET utf8 NOT NULL,
  `path` varchar(100) CHARACTER SET utf8 NOT NULL,
  `type` varchar(100) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `right_menu`
--

INSERT INTO `right_menu` (`id`, `menu`, `menu_m`, `path`, `type`, `status`, `add_date`, `modify_date`, `user_id`) VALUES
(1, 'asas', 'sasasas333', 'ffff', 'Search', 1, '2019-08-30 06:29:02', '2019-08-30 06:29:13', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `right_to_info`
--

CREATE TABLE `right_to_info` (
  `id` int(11) NOT NULL,
  `parent` varchar(100) CHARACTER SET utf8 NOT NULL,
  `file` varchar(100) CHARACTER SET utf8 NOT NULL,
  `name` varchar(500) CHARACTER SET utf8 NOT NULL,
  `name_m` varchar(500) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `right_to_info`
--

INSERT INTO `right_to_info` (`id`, `parent`, `file`, `name`, `name_m`, `status`, `add_date`, `modify_date`, `user_id`) VALUES
(1, 'parent_1', '2.png', 'ajazkhan', 'pathan', 1, '2019-09-02 11:18:06', '2019-09-02 11:18:23', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `slider_info`
--

CREATE TABLE `slider_info` (
  `id` int(11) NOT NULL,
  `desc` varchar(100) CHARACTER SET utf8 NOT NULL,
  `info` varchar(100) CHARACTER SET utf8 NOT NULL,
  `file` varchar(100) CHARACTER SET utf8 NOT NULL,
  `sort` varchar(100) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider_info`
--

INSERT INTO `slider_info` (`id`, `desc`, `info`, `file`, `sort`, `status`, `add_date`, `modify_date`, `user_id`) VALUES
(1, 'hihi', 'ajaz', '2_(1).png', 'doskdos', 1, '2019-09-02 07:11:59', '2019-09-02 07:12:08', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `desc` varchar(100) CHARACTER SET utf8 NOT NULL,
  `desc_m` varchar(100) CHARACTER SET utf8 NOT NULL,
  `file` varchar(100) CHARACTER SET utf8 NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `title_m` varchar(100) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `title_menu`
--

CREATE TABLE `title_menu` (
  `id` int(11) NOT NULL,
  `menu_parent` varchar(100) CHARACTER SET utf8 NOT NULL,
  `menu` varchar(100) CHARACTER SET utf8 NOT NULL,
  `menu_m` varchar(100) CHARACTER SET utf8 NOT NULL,
  `path` varchar(100) CHARACTER SET utf8 NOT NULL,
  `sort` varchar(100) CHARACTER SET utf8 NOT NULL,
  `dept` varchar(100) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title_menu`
--

INSERT INTO `title_menu` (`id`, `menu_parent`, `menu`, `menu_m`, `path`, `sort`, `dept`, `status`, `add_date`, `modify_date`, `user_id`) VALUES
(1, 'Home', 'my menu', 'ajaz', 'menu.php', 'ajazkhan', '2', 1, '2019-09-02 06:08:11', '2019-09-02 06:08:29', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `underway_pro`
--

CREATE TABLE `underway_pro` (
  `id` int(11) NOT NULL,
  `parent` varchar(50) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `title_m` varchar(100) CHARACTER SET utf8 NOT NULL,
  `desc` varchar(100) CHARACTER SET utf8 NOT NULL,
  `desc_m` varchar(100) CHARACTER SET utf8 NOT NULL,
  `file` varchar(100) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `underway_pro`
--

INSERT INTO `underway_pro` (`id`, `parent`, `date`, `title`, `title_m`, `desc`, `desc_m`, `file`, `status`, `add_date`, `modify_date`, `user_id`) VALUES
(1, 'parent_1', '2019-09-02', 'dfdfd', 'dsd555', 'sdsdsd', 'asdad', '2.png', 1, '2019-09-02 09:23:59', '2019-09-02 09:25:31', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `web_edu_master`
--

CREATE TABLE `web_edu_master` (
  `id` int(11) NOT NULL,
  `parent` varchar(100) CHARACTER SET utf8 NOT NULL,
  `edu` varchar(100) CHARACTER SET utf8 NOT NULL,
  `edu_m` varchar(100) CHARACTER SET utf8 NOT NULL,
  `students` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_edu_master`
--

INSERT INTO `web_edu_master` (`id`, `parent`, `edu`, `edu_m`, `students`, `status`, `add_date`, `modify_date`, `user_id`) VALUES
(1, 'parent_1', 'abcd', 'ass', 500, 1, '2019-08-29 10:07:48', '2019-08-29 10:07:55', 'ajaz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_muni_corp`
--
ALTER TABLE `about_muni_corp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_staff_profile`
--
ALTER TABLE `admin_staff_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `annual_account`
--
ALTER TABLE `annual_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `councilor_profile`
--
ALTER TABLE `councilor_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disaster_management`
--
ALTER TABLE `disaster_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emergency_phone`
--
ALTER TABLE `emergency_phone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_link`
--
ALTER TABLE `e_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_tenders`
--
ALTER TABLE `e_tenders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `first_page_text`
--
ALTER TABLE `first_page_text`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frequiently_ask_questions`
--
ALTER TABLE `frequiently_ask_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `heat_action_plan`
--
ALTER TABLE `heat_action_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info_about_city`
--
ALTER TABLE `info_about_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `left_menu`
--
ALTER TABLE `left_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_edu_service`
--
ALTER TABLE `master_edu_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `municipal_election`
--
ALTER TABLE `municipal_election`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `municipal_resolutions_decisions`
--
ALTER TABLE `municipal_resolutions_decisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_developments`
--
ALTER TABLE `new_developments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quick_link`
--
ALTER TABLE `quick_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `right_menu`
--
ALTER TABLE `right_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `right_to_info`
--
ALTER TABLE `right_to_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_info`
--
ALTER TABLE `slider_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title_menu`
--
ALTER TABLE `title_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `underway_pro`
--
ALTER TABLE `underway_pro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_edu_master`
--
ALTER TABLE `web_edu_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_muni_corp`
--
ALTER TABLE `about_muni_corp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_staff_profile`
--
ALTER TABLE `admin_staff_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `annual_account`
--
ALTER TABLE `annual_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `budget`
--
ALTER TABLE `budget`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `councilor_profile`
--
ALTER TABLE `councilor_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `disaster_management`
--
ALTER TABLE `disaster_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emergency_phone`
--
ALTER TABLE `emergency_phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `e_link`
--
ALTER TABLE `e_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `e_tenders`
--
ALTER TABLE `e_tenders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `first_page_text`
--
ALTER TABLE `first_page_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `frequiently_ask_questions`
--
ALTER TABLE `frequiently_ask_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `heat_action_plan`
--
ALTER TABLE `heat_action_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `info_about_city`
--
ALTER TABLE `info_about_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `left_menu`
--
ALTER TABLE `left_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `master_edu_service`
--
ALTER TABLE `master_edu_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `municipal_election`
--
ALTER TABLE `municipal_election`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `municipal_resolutions_decisions`
--
ALTER TABLE `municipal_resolutions_decisions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `new_developments`
--
ALTER TABLE `new_developments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quick_link`
--
ALTER TABLE `quick_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `right_menu`
--
ALTER TABLE `right_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `right_to_info`
--
ALTER TABLE `right_to_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider_info`
--
ALTER TABLE `slider_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `title_menu`
--
ALTER TABLE `title_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `underway_pro`
--
ALTER TABLE `underway_pro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web_edu_master`
--
ALTER TABLE `web_edu_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
