-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 05, 2019 at 10:32 AM
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
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `autono` int(11) NOT NULL,
  `regid` varchar(15) NOT NULL,
  `g_mobile` varchar(15) NOT NULL,
  `b_mobile` varchar(15) NOT NULL,
  `a_date` date NOT NULL,
  `time` time NOT NULL,
  `message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `birth_appointment`
--

CREATE TABLE `birth_appointment` (
  `id` int(11) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `app_mobile` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(10) NOT NULL,
  `message` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ref_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `birth_documents`
--

CREATE TABLE `birth_documents` (
  `id` int(11) NOT NULL,
  `ref_id` int(11) NOT NULL,
  `chk_id_proof` varchar(10) NOT NULL,
  `chk_cer_delivery` varchar(10) NOT NULL,
  `chk_affidavit` varchar(10) NOT NULL,
  `chk_noc` varchar(10) NOT NULL,
  `chk_court_reg` varchar(10) NOT NULL,
  `chk_order` varchar(10) NOT NULL,
  `file_id_proof` varchar(50) CHARACTER SET utf8 NOT NULL,
  `file_cer_delivery` varchar(50) CHARACTER SET utf8 NOT NULL,
  `file_affidavit` varchar(50) CHARACTER SET utf8 NOT NULL,
  `file_noc` varchar(50) CHARACTER SET utf8 NOT NULL,
  `file_court_reg` varchar(50) CHARACTER SET utf8 NOT NULL,
  `file_order` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `birth_registration`
--

CREATE TABLE `birth_registration` (
  `id` int(11) NOT NULL,
  `applicant_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `applicant_mobile` varchar(10) CHARACTER SET utf8 NOT NULL,
  `reg_year` varchar(4) CHARACTER SET utf8 NOT NULL,
  `zone` varchar(20) CHARACTER SET utf8 NOT NULL,
  `ward` varchar(20) CHARACTER SET utf8 NOT NULL,
  `reg_no` varchar(20) CHARACTER SET utf8 NOT NULL,
  `page_no` varchar(20) CHARACTER SET utf8 NOT NULL,
  `reg_date` date NOT NULL,
  `reg_no2` varchar(20) CHARACTER SET utf8 NOT NULL,
  `dob` date NOT NULL,
  `birth_place` varchar(50) CHARACTER SET utf8 NOT NULL,
  `birth_place_m` varchar(200) CHARACTER SET utf8 NOT NULL,
  `child_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `child_name_m` varchar(50) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 NOT NULL,
  `gender_m` varchar(10) CHARACTER SET utf8 NOT NULL,
  `father_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `mother_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `father_name_m` varchar(50) CHARACTER SET utf8 NOT NULL,
  `mother_name_m` varchar(50) CHARACTER SET utf8 NOT NULL,
  `parent_perminent_address` varchar(200) CHARACTER SET utf8 NOT NULL,
  `parent_addresss_at_birth` varchar(200) CHARACTER SET utf8 NOT NULL,
  `parent_perminent_address_m` varchar(200) CHARACTER SET utf8 NOT NULL,
  `parent_addresss_at_birth_m` varchar(200) CHARACTER SET utf8 NOT NULL,
  `remarks` varchar(200) CHARACTER SET utf8 NOT NULL,
  `remarks_m` varchar(200) CHARACTER SET utf8 NOT NULL,
  `date_of_issue` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
-- Table structure for table `cash_counter`
--

CREATE TABLE `cash_counter` (
  `id` int(11) NOT NULL,
  `ref_id` varchar(10) NOT NULL,
  `receipt_year` int(4) NOT NULL,
  `receipt_num` int(5) NOT NULL,
  `receipt_no` varchar(17) NOT NULL,
  `receipt_date` date NOT NULL,
  `collection_no` varchar(50) CHARACTER SET utf8 NOT NULL,
  `counter_no` varchar(50) NOT NULL,
  `receive_from` varchar(50) CHARACTER SET utf8 NOT NULL,
  `amt` varchar(10) NOT NULL,
  `amt_words` varchar(150) NOT NULL,
  `function` varchar(50) CHARACTER SET utf8 NOT NULL,
  `mode` varchar(50) NOT NULL,
  `amt2` varchar(10) NOT NULL,
  `chq_no` varchar(20) NOT NULL,
  `chq_date` date NOT NULL,
  `bank` varchar(50) NOT NULL,
  `bill_no` varchar(17) NOT NULL,
  `bill_date` date NOT NULL,
  `details` varchar(100) CHARACTER SET utf8 NOT NULL,
  `payble` varchar(50) NOT NULL,
  `receive_amt` varchar(10) NOT NULL,
  `total` varchar(10) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `zone_id` varchar(20) NOT NULL,
  `dept_id` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cash_counter_challan`
--

CREATE TABLE `cash_counter_challan` (
  `id` int(11) NOT NULL,
  `pre` varchar(10) NOT NULL,
  `sr` int(11) NOT NULL,
  `challan_no` varchar(20) NOT NULL,
  `c_date` date NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `zone_id` varchar(20) NOT NULL,
  `dept_id` varchar(20) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cash_counter_challan`
--

INSERT INTO `cash_counter_challan` (`id`, `pre`, `sr`, `challan_no`, `c_date`, `user_id`, `zone_id`, `dept_id`, `add_date`, `modify_date`, `status`) VALUES
(1, 'CMCC_GAC', 381, 'CMCC_GAC00381', '2019-08-21', 'aagaz', '1_3', '2', '2019-08-21 12:21:57', '2019-08-21 12:21:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `construction_certificate`
--

CREATE TABLE `construction_certificate` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ward_no` varchar(10) CHARACTER SET utf8 NOT NULL,
  `municipality_ward_no` varchar(10) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `language` varchar(10) CHARACTER SET utf8 NOT NULL,
  `year` varchar(4) NOT NULL,
  `unique_no` varchar(15) NOT NULL,
  `sr_no` int(5) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Pending',
  `remark` varchar(50) NOT NULL,
  `upload_doc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `construction_certificate`
--

INSERT INTO `construction_certificate` (`id`, `name`, `ward_no`, `municipality_ward_no`, `date`, `language`, `year`, `unique_no`, `sr_no`, `user_id`, `staff_id`, `status`, `remark`, `upload_doc`) VALUES
(1, 'hgj', 'jkjk', 'kjkj', '2019-09-16', 'marathi	', '2019', '2019CMCC0700001', 1, '9904760745', '', 'Approved', '', ''),
(2, 'SDS', 'DS4', '43', '2019-09-17', 'english', '2019', '2019CMCC0700002', 2, '9904760745', '', 'Approved', '', '');

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
-- Table structure for table `department_master`
--

CREATE TABLE `department_master` (
  `id` int(11) NOT NULL,
  `department` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `add_date` date NOT NULL,
  `modify_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_master`
--

INSERT INTO `department_master` (`id`, `department`, `status`, `add_date`, `modify_date`) VALUES
(1, 'dept1', 1, '2019-07-02', '0000-00-00'),
(2, 'Department2', 1, '2019-07-03', '0000-00-00');

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
-- Table structure for table `doc_upload`
--

CREATE TABLE `doc_upload` (
  `id` int(11) NOT NULL,
  `ref_id` varchar(10) NOT NULL,
  `file` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `certificate_type` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doc_upload`
--

INSERT INTO `doc_upload` (`id`, `ref_id`, `file`, `description`, `certificate_type`) VALUES
(33, '1', 'doc_(2).pdf', 'sdasd', 'Property_Transfer_Record'),
(9, '3', 'doc_(3)5.pdf', 'hn,m,m', 'Property_Transfer_Record'),
(10, '4', 'doc_(2)1.pdf', 'w', 'Property_Transfer_Record'),
(14, '1', 'doc_(3)2.pdf', ',jm,', 'fire_final_object'),
(13, '2', 'doc_(3)3.pdf', 'xa', 'Inheritance_Certificate'),
(31, '1', 'doc_(1)_(1).pdf', 'dfsf', 'Occupation'),
(16, '1', 'doc_(3)1.pdf', 'dfdf', 'part'),
(17, '1', 'doc_(3)1.pdf', '545stg', 'zone'),
(19, '1', 'doc_(3)1.pdf', 'kjkj', 'construction'),
(20, '1', 'doc_(2).pdf', 'hgh', 'plant'),
(21, '1', 'doc_(3)1.pdf', 'fdf', 'outstanding'),
(22, '1', 'doc_(3).pdf', 'fgfg', 'no_objection'),
(23, '1', 'doc_(3)1.pdf', 'klk', 'resident'),
(27, '8', 'IMG-20190821-WA0003.jpg', 'dfgdf', 'Property_Transfer_Record'),
(30, '5', 'doc_(2).pdf', 'gdfg', 'Inheritance_Certificate');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_structure`
--

INSERT INTO `fee_structure` (`id`, `service`, `amt`, `no_of_copy`, `status`, `add_date`, `modify_date`) VALUES
(2, 'Fire_Fighting_No_Objection_Certificate', 600, 5, 1, '2019-09-16 18:30:00', '2019-09-16 18:30:00'),
(3, 'Property_Transfer_Record', 500, 6, 1, '2019-09-16 18:30:00', '2019-09-17 11:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `fire_fighting`
--

CREATE TABLE `fire_fighting` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `prof_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `subject` varchar(200) CHARACTER SET utf8 NOT NULL,
  `ref_date` date NOT NULL,
  `fee` varchar(10) CHARACTER SET utf8 NOT NULL,
  `form_no` varchar(10) CHARACTER SET ucs2 NOT NULL,
  `bill_date` date NOT NULL,
  `fire_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `fire_sub` varchar(200) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `certificate_date` date NOT NULL,
  `language` varchar(10) CHARACTER SET utf8 NOT NULL,
  `year` varchar(4) NOT NULL,
  `unique_no` varchar(15) NOT NULL,
  `sr_no` int(5) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Pending',
  `remark` varchar(50) NOT NULL,
  `upload_doc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fire_fighting2`
--

CREATE TABLE `fire_fighting2` (
  `id` int(11) NOT NULL,
  `bussiness_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `address` varchar(250) CHARACTER SET utf8 NOT NULL,
  `details_solution` varchar(50) CHARACTER SET utf8 NOT NULL,
  `testing_agency` varchar(50) CHARACTER SET utf8 NOT NULL,
  `agency_license_no` varchar(20) CHARACTER SET utf8 NOT NULL,
  `certificate_date` datetime NOT NULL,
  `language` varchar(15) CHARACTER SET utf8 NOT NULL,
  `year` int(4) NOT NULL,
  `unique_no` varchar(20) NOT NULL,
  `sr_no` int(11) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `sr_no2` int(11) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Pending',
  `remark` varchar(100) CHARACTER SET utf8 NOT NULL,
  `doc_upload` varchar(250) CHARACTER SET utf8 NOT NULL,
  `add_date` datetime NOT NULL,
  `modigy_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fire_fighting2`
--

INSERT INTO `fire_fighting2` (`id`, `bussiness_name`, `address`, `details_solution`, `testing_agency`, `agency_license_no`, `certificate_date`, `language`, `year`, `unique_no`, `sr_no`, `reg_no`, `sr_no2`, `user_id`, `staff_id`, `status`, `remark`, `doc_upload`, `add_date`, `modigy_date`) VALUES
(1, 'fdf', 'dfd', 'fd', 'fd', 'fd', '2019-09-16 18:19:46', 'marathi', 2019, '2019CMCC090000', 0, '20191FRCMC000', 0, '9904760745', '', 'Approved', '', '', '2019-09-16 18:19:46', '2019-09-16 18:19:46');

-- --------------------------------------------------------

--
-- Table structure for table `fire_fighting_noc`
--

CREATE TABLE `fire_fighting_noc` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `prof_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `subject` varchar(200) NOT NULL,
  `ref_date` date NOT NULL,
  `fee` varchar(10) CHARACTER SET utf8 NOT NULL,
  `form_no` varchar(10) CHARACTER SET utf8 NOT NULL,
  `bill_date` date NOT NULL,
  `fire_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `fire_sub` varchar(200) CHARACTER SET utf8 NOT NULL,
  `certificate_date` date NOT NULL,
  `language` varchar(10) CHARACTER SET utf8 NOT NULL,
  `year` varchar(4) NOT NULL,
  `unique_no` varchar(15) NOT NULL,
  `sr_no` int(5) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Pending',
  `remark` varchar(50) NOT NULL,
  `upload_doc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fire_fighting_noc`
--

INSERT INTO `fire_fighting_noc` (`id`, `name`, `prof_name`, `subject`, `ref_date`, `fee`, `form_no`, `bill_date`, `fire_name`, `fire_sub`, `certificate_date`, `language`, `year`, `unique_no`, `sr_no`, `user_id`, `staff_id`, `status`, `remark`, `upload_doc`) VALUES
(1, 'asas', 'as', 'asdds', '2019-09-16', '100', '12345', '2019-09-16', 'ghg', 'gh', '2019-09-16', 'marathi	', '2019', '2019CMCC0300001', 1, '9904760745', '', 'Approved', '', 'doc_(3).pdf'),
(2, 'dsd', 'sdsd', 'dsd', '2019-09-17', '434', '43', '2019-09-17', '434', '4sdf', '2019-09-17', 'english', '2019', '2019CMCC0300002', 2, '9904760745', '', 'Approved', '', '');

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
-- Table structure for table `formd`
--

CREATE TABLE `formd` (
  `id` int(11) NOT NULL,
  `autono` int(11) NOT NULL,
  `w_date` date NOT NULL,
  `w_place` varchar(250) NOT NULL,
  `laws` varchar(250) NOT NULL,
  `h_name` varchar(250) NOT NULL,
  `h_aname` varchar(250) NOT NULL,
  `h_business` varchar(250) NOT NULL,
  `h_religion` varchar(250) NOT NULL,
  `h_areligion` varchar(250) NOT NULL,
  `h_born` varchar(250) NOT NULL,
  `h_age` varchar(250) NOT NULL,
  `h_address` varchar(250) NOT NULL,
  `h_mstate` varchar(250) NOT NULL,
  `w_name` varchar(250) NOT NULL,
  `w_aname` varchar(250) NOT NULL,
  `w_business` varchar(250) NOT NULL,
  `w_religion` varchar(250) NOT NULL,
  `w_areligion` varchar(250) NOT NULL,
  `w_born` varchar(250) NOT NULL,
  `w_age` varchar(250) NOT NULL,
  `w_address` varchar(250) NOT NULL,
  `w_mstate` varchar(250) NOT NULL,
  `w1_name` varchar(250) NOT NULL,
  `w1_address` varchar(250) NOT NULL,
  `w1_business` varchar(300) NOT NULL,
  `w1_relation` varchar(300) NOT NULL,
  `w2_name` varchar(250) NOT NULL,
  `w2_address` varchar(250) NOT NULL,
  `w2_business` varchar(300) NOT NULL,
  `w2_relation` varchar(300) NOT NULL,
  `w3_name` varchar(250) NOT NULL,
  `w3_address` varchar(250) NOT NULL,
  `w3_business` varchar(300) NOT NULL,
  `w3_relation` varchar(300) NOT NULL,
  `p_name` varchar(250) NOT NULL,
  `p_address` varchar(250) NOT NULL,
  `p_religion` varchar(250) NOT NULL,
  `p_age` int(5) NOT NULL,
  `p_date` date NOT NULL,
  `h_photo` varchar(250) NOT NULL,
  `w_photo` varchar(250) NOT NULL,
  `w1_photo` varchar(250) NOT NULL,
  `w2_photo` varchar(250) NOT NULL,
  `w3_photo` varchar(250) NOT NULL,
  `h_thumb` varchar(250) NOT NULL,
  `w_thumb` varchar(250) NOT NULL,
  `w1_thumb` varchar(250) NOT NULL,
  `w2_thumb` varchar(250) NOT NULL,
  `w3_thumb` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `inheritance_certificate`
--

CREATE TABLE `inheritance_certificate` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ward_no` varchar(10) CHARACTER SET utf8 NOT NULL,
  `municipality_ward_no` varchar(10) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `language` varchar(10) CHARACTER SET utf8 NOT NULL,
  `year` varchar(4) NOT NULL,
  `unique_no` varchar(15) NOT NULL,
  `sr_no` int(5) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Pending',
  `remark` varchar(50) NOT NULL,
  `upload_doc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inheritance_certificate`
--

INSERT INTO `inheritance_certificate` (`id`, `name`, `ward_no`, `municipality_ward_no`, `date`, `language`, `year`, `unique_no`, `sr_no`, `user_id`, `staff_id`, `status`, `remark`, `upload_doc`) VALUES
(2, 'ertet', '232', '23', '2019-09-16', 'english', '2019', '2019CMCC0200002', 2, '9904760745', '', 'Approved', '', 'doc_(3).pdf'),
(3, 'rsdss', '34', '43', '2019-09-17', 'marathi	', '2019', '2019CMCC0200003', 3, '9904760745', '', 'Approved', '', ''),
(4, 'dff', 'dsf', 'sd', '2019-09-17', 'english', '2019', '2019CMCC0200004', 4, '9904760745', '', 'Approved', '', ''),
(5, 'cfvc', 'dfdf', 'df54', '2019-09-17', 'marathi	', '2019', '2019CMCC0200005', 5, 'ajaz', '', 'Rejected', 'vbvb', ''),
(6, 'ajazbhai', '3222', '15', '2019-09-18', 'marathi	', '2019', '2019CMCC0200006', 6, '9904760745', '', 'Pending', '', '');

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
-- Table structure for table `login_master`
--

CREATE TABLE `login_master` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `role` varchar(10) NOT NULL,
  `status` varchar(1) NOT NULL,
  `add_date` date NOT NULL,
  `modify_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_master`
--

INSERT INTO `login_master` (`id`, `user_id`, `password`, `role`, `status`, `add_date`, `modify_date`) VALUES
(1, 'admin', 'admin', 'admin', '1', '2019-06-20', '2019-06-20'),
(3, 'ajazkhan@gmail.com', '111222', 'staff', '1', '2019-06-20', '0000-00-00'),
(44, '9904760745', '123456', 'user', '1', '2019-09-16', '2019-09-16'),
(5, '9028665254', 'prashik260', 'user', '1', '2019-06-21', '2019-06-21'),
(6, '9075613611', 'sanika26', 'user', '1', '2019-06-21', '2019-06-21'),
(7, '7016158344', '111111', 'user', '1', '2019-06-21', '2019-06-21'),
(8, '7574865414', '1234', 'user', '1', '2019-06-22', '2019-06-22'),
(9, '8390966444', 'dhiraj1990', 'user', '1', '2019-06-25', '2019-06-25'),
(10, '9970255587', '', 'user', '0', '2019-06-25', '0000-00-00'),
(11, '9423416948', 'vasantib', 'user', '1', '2019-06-27', '2019-06-27'),
(12, '8087407567', 'Aarti@777', 'user', '1', '2019-06-27', '2019-06-27'),
(13, '9325695631', '16021990', 'user', '1', '2019-06-27', '2019-06-27'),
(14, '9588492821', 'Pinku@2011', 'user', '1', '2019-06-27', '2019-06-27'),
(15, '9588492821', 'Pinku@2011', 'user', '1', '2019-06-27', '2019-06-27'),
(16, '9588492821', 'sam1602', 'user', '1', '2019-06-27', '2019-06-27'),
(17, '9588492821', '12345', 'user', '1', '2019-06-27', '2019-06-27'),
(18, '9588492821', 'Pinku@2011', 'user', '1', '2019-06-28', '2019-06-28'),
(19, '9588492821', 'Pinku@2011', 'user', '1', '2019-06-28', '2019-06-28'),
(20, '9588492821', 'Pinku@2011', 'user', '1', '2019-06-28', '2019-06-28'),
(21, '9588492821', 'Pinku@2011', 'user', '1', '2019-06-28', '2019-06-28'),
(22, '9588492821', 'Pinku@2011', 'user', '1', '2019-06-28', '2019-06-28'),
(23, '8983263896', '1602', 'user', '1', '2019-06-28', '2019-06-28'),
(24, '9588492821', 'Pinku@2011', 'user', '1', '2019-06-28', '2019-06-28'),
(25, '9588492821', '', 'user', '0', '2019-06-28', '0000-00-00'),
(26, '9588492821', '', 'user', '0', '2019-06-28', '0000-00-00'),
(27, '9588492821', '', 'user', '0', '2019-06-28', '0000-00-00'),
(28, '9588492821', '', 'user', '0', '2019-06-28', '0000-00-00'),
(29, '9588492821', '', 'user', '0', '2019-06-28', '0000-00-00'),
(30, '9588492821', 'Pinku@2011', 'user', '1', '2019-06-29', '2019-06-29'),
(31, '9673577664', 'nikure', 'user', '1', '2019-06-29', '2019-06-29'),
(32, '7083879254', 'poonam', 'user', '1', '2019-06-29', '2019-06-29'),
(33, '9423115475', 'kishori@12', 'user', '1', '2019-06-29', '2019-06-29'),
(34, '9423115475', 'kishori', 'user', '1', '2019-06-29', '2019-06-29'),
(35, '9588492821', 'Pinku@2011', 'user', '1', '2019-06-29', '2019-06-29'),
(36, '9673577664', '', 'user', '0', '2019-07-01', '0000-00-00'),
(37, 'arzoo@gmail.com', '123', 'staff', '1', '2019-07-02', '0000-00-00'),
(38, 'arzoo@gmail.com', '123', 'staff', '1', '2019-07-02', '0000-00-00'),
(39, 'arzoo', '123', 'staff', '1', '2019-07-02', '0000-00-00'),
(40, 'arzoo123', '123', 'staff', '1', '2019-07-02', '2019-07-02'),
(41, 'ajaz', '123', 'staff', '1', '2019-07-03', '0000-00-00'),
(42, 'sagar', 'sagar', 'staff', '1', '2019-07-13', '2019-07-13'),
(43, 'aagaz', '1234', 'staff', '1', '2019-07-13', '0000-00-00'),
(45, '9913829299', '12345', 'user', '1', '2019-09-16', '2019-09-16');

-- --------------------------------------------------------

--
-- Table structure for table `marrige_challan`
--

CREATE TABLE `marrige_challan` (
  `id` int(11) NOT NULL,
  `pre` varchar(10) NOT NULL,
  `sr` int(11) NOT NULL,
  `challan_no` varchar(20) NOT NULL,
  `c_date` date NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `zone_id` varchar(45) NOT NULL,
  `dept_id` varchar(45) NOT NULL,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `marrige_documents`
--

CREATE TABLE `marrige_documents` (
  `id` int(11) NOT NULL,
  `ref_id` int(11) NOT NULL,
  `ch_1` varchar(10) NOT NULL,
  `ch_2` varchar(10) NOT NULL,
  `ch_3_1` varchar(10) NOT NULL,
  `ch_3_2` varchar(10) NOT NULL,
  `ch_3_3` varchar(10) NOT NULL,
  `ch_4_1` varchar(10) NOT NULL,
  `ch_4_2` varchar(10) NOT NULL,
  `ch_5` varchar(10) NOT NULL,
  `ch_6_1` varchar(10) NOT NULL,
  `ch_6_2` varchar(10) NOT NULL,
  `ch_6_3` varchar(10) NOT NULL,
  `ch_6_4` varchar(10) NOT NULL,
  `ch_7_1` varchar(10) NOT NULL,
  `ch_7_2` varchar(10) NOT NULL,
  `ch_8_1` varchar(10) NOT NULL,
  `ch_8_2` varchar(10) NOT NULL,
  `ch_9` varchar(10) NOT NULL,
  `ch_10` varchar(10) NOT NULL,
  `ch_11` varchar(10) NOT NULL,
  `ch_12_1` varchar(10) NOT NULL,
  `ch_12_2` varchar(10) NOT NULL,
  `ch_12_3` varchar(10) NOT NULL,
  `ch_12_4` varchar(10) NOT NULL,
  `f_1` varchar(50) NOT NULL,
  `f_2` varchar(50) NOT NULL,
  `f_3_1` varchar(50) NOT NULL,
  `f_3_2` varchar(50) NOT NULL,
  `f_3_3` varchar(50) NOT NULL,
  `f_4_1` varchar(50) NOT NULL,
  `f_4_2` varchar(50) NOT NULL,
  `f_5` varchar(50) NOT NULL,
  `f_6_1` varchar(50) NOT NULL,
  `f_6_2` varchar(50) NOT NULL,
  `f_6_3` varchar(50) NOT NULL,
  `f_6_4` varchar(50) NOT NULL,
  `f_7_1` varchar(50) NOT NULL,
  `f_7_2` varchar(50) NOT NULL,
  `f_8_1` varchar(50) NOT NULL,
  `f_8_2` varchar(50) NOT NULL,
  `f_9` varchar(50) NOT NULL,
  `f_10` varchar(50) NOT NULL,
  `f_11` varchar(50) NOT NULL,
  `f_12_1` varchar(50) NOT NULL,
  `f_12_2` varchar(50) NOT NULL,
  `f_12_3` varchar(50) NOT NULL,
  `f_12_4` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marrige_documents`
--

INSERT INTO `marrige_documents` (`id`, `ref_id`, `ch_1`, `ch_2`, `ch_3_1`, `ch_3_2`, `ch_3_3`, `ch_4_1`, `ch_4_2`, `ch_5`, `ch_6_1`, `ch_6_2`, `ch_6_3`, `ch_6_4`, `ch_7_1`, `ch_7_2`, `ch_8_1`, `ch_8_2`, `ch_9`, `ch_10`, `ch_11`, `ch_12_1`, `ch_12_2`, `ch_12_3`, `ch_12_4`, `f_1`, `f_2`, `f_3_1`, `f_3_2`, `f_3_3`, `f_4_1`, `f_4_2`, `f_5`, `f_6_1`, `f_6_2`, `f_6_3`, `f_6_4`, `f_7_1`, `f_7_2`, `f_8_1`, `f_8_2`, `f_9`, `f_10`, `f_11`, `f_12_1`, `f_12_2`, `f_12_3`, `f_12_4`) VALUES
(1, 1, '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 2, '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `marrige_receipt`
--

CREATE TABLE `marrige_receipt` (
  `id` int(11) NOT NULL,
  `ref_id` varchar(10) NOT NULL,
  `receipt_year` int(5) NOT NULL,
  `receipt_num` int(5) NOT NULL,
  `receipt_no` varchar(20) NOT NULL,
  `receipt_date` date NOT NULL,
  `collection_no` varchar(50) NOT NULL,
  `counter_no` varchar(50) NOT NULL,
  `receive_from` varchar(50) CHARACTER SET utf8 NOT NULL,
  `amt` varchar(10) NOT NULL,
  `amt_words` varchar(150) NOT NULL,
  `function` varchar(50) NOT NULL,
  `mode` varchar(50) NOT NULL,
  `amt2` varchar(10) NOT NULL,
  `chq_no` varchar(20) NOT NULL,
  `chq_date` date NOT NULL,
  `bank` varchar(50) NOT NULL,
  `bill_no` varchar(20) NOT NULL,
  `bill_date` date NOT NULL,
  `details` varchar(100) NOT NULL,
  `payble` varchar(50) NOT NULL,
  `receive_amt` varchar(10) NOT NULL,
  `total` varchar(10) NOT NULL,
  `user_id` varchar(45) NOT NULL,
  `zone_id` varchar(45) NOT NULL,
  `dept_id` varchar(45) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marrige_receipt`
--

INSERT INTO `marrige_receipt` (`id`, `ref_id`, `receipt_year`, `receipt_num`, `receipt_no`, `receipt_date`, `collection_no`, `counter_no`, `receive_from`, `amt`, `amt_words`, `function`, `mode`, `amt2`, `chq_no`, `chq_date`, `bank`, `bill_no`, `bill_date`, `details`, `payble`, `receive_amt`, `total`, `user_id`, `zone_id`, `dept_id`, `add_date`) VALUES
(1, '2', 2019, 14245, '2019CCMC14245', '2019-08-28', 'aadhar', '2', 'ए.ए.', '450', 'Four Hundred Fifty ', 'Marriage', '1', '450', '', '0000-00-00', '', '2019CCMC14245', '2019-08-28', 'Marriage', '450', '450', '450', 'ajaz', 'zone_1', '2', '2019-08-28 04:52:33');

-- --------------------------------------------------------

--
-- Table structure for table `marrige_registration`
--

CREATE TABLE `marrige_registration` (
  `id` int(11) NOT NULL,
  `autono` int(11) NOT NULL,
  `regno` varchar(15) NOT NULL,
  `child_aadhar_no` varchar(20) CHARACTER SET utf8 NOT NULL,
  `girl_aadhar_no` varchar(20) CHARACTER SET utf8 NOT NULL,
  `zone` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ward` varchar(50) CHARACTER SET utf8 NOT NULL,
  `g_contact` varchar(10) CHARACTER SET utf8 NOT NULL,
  `b_contact` varchar(10) CHARACTER SET utf8 NOT NULL,
  `g_name` varchar(150) CHARACTER SET utf8 NOT NULL,
  `c_name` varchar(150) CHARACTER SET utf8 NOT NULL,
  `g_address` varchar(200) CHARACTER SET utf8 NOT NULL,
  `c_address` varchar(200) CHARACTER SET utf8 NOT NULL,
  `g_tahsil` varchar(50) CHARACTER SET utf8 NOT NULL,
  `c_tahsil` varchar(50) CHARACTER SET utf8 NOT NULL,
  `g_dist` varchar(50) CHARACTER SET utf8 NOT NULL,
  `c_dist` varchar(50) CHARACTER SET utf8 NOT NULL,
  `b_previous_name` varchar(150) CHARACTER SET utf8 NOT NULL,
  `g_previous_name` varchar(150) CHARACTER SET utf8 NOT NULL,
  `b_previous_address` varchar(200) CHARACTER SET utf8 NOT NULL,
  `g_previous_address` varchar(200) CHARACTER SET utf8 NOT NULL,
  `b_previous_tahsil` varchar(50) CHARACTER SET utf8 NOT NULL,
  `g_earlier_tahsil` varchar(50) CHARACTER SET utf8 NOT NULL,
  `b_previous_dist` varchar(50) CHARACTER SET utf8 NOT NULL,
  `g_previous_dist` varchar(50) CHARACTER SET utf8 NOT NULL,
  `marrige_address` varchar(200) CHARACTER SET utf8 NOT NULL,
  `wedding_place` varchar(50) CHARACTER SET utf8 NOT NULL,
  `date_of_marrige` date NOT NULL,
  `c_birth_date` date NOT NULL,
  `g_birth_date` date NOT NULL,
  `c_age` varchar(10) CHARACTER SET utf8 NOT NULL,
  `g_age` varchar(10) CHARACTER SET utf8 NOT NULL,
  `reg_date` date NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marrige_registration`
--

INSERT INTO `marrige_registration` (`id`, `autono`, `regno`, `child_aadhar_no`, `girl_aadhar_no`, `zone`, `ward`, `g_contact`, `b_contact`, `g_name`, `c_name`, `g_address`, `c_address`, `g_tahsil`, `c_tahsil`, `g_dist`, `c_dist`, `b_previous_name`, `g_previous_name`, `b_previous_address`, `g_previous_address`, `b_previous_tahsil`, `g_earlier_tahsil`, `b_previous_dist`, `g_previous_dist`, `marrige_address`, `wedding_place`, `date_of_marrige`, `c_birth_date`, `g_birth_date`, `c_age`, `g_age`, `reg_date`, `user_id`, `add_date`, `modify_date`, `status`) VALUES
(1, 0, '000867', '123456789', '123456789', '1', '9', '9904760745', '9998887774', 'AA', 'ए.ए.', 'Rajkot', 'राजकोट', 'Rajkot', 'राजकोट', 'Rajkot', 'राजकोट', 'bb', 'बीबी', 'Rajkot', 'राजकोट', 'Rajkot', 'राजकोट', 'Rajkot', 'राजकोट', 'Rajkot', 'राजकोट', '2019-08-15', '1995-05-25', '1997-05-15', '24', '22', '2019-08-28', 'admin', '2019-08-28 04:46:30', '2019-08-28 04:46:30', 1),
(2, 0, '000868', '12345678', '12345678', '2', '9', '9999888877', '9999955555', 'aa', 'ए.ए.', 'Rajkot', '\nराजकोट', 'Rajkot', ' राजकोट', 'Rajkot', ' राजकोट', 'bb', 'बीबी', 'Rajkot', '\nराजकोट', 'Rajkot', ' राजकोट', 'Rajkot', ' राजकोट', 'Rajkot', '\nराजकोट', '2018-08-15', '1995-05-25', '1996-04-20', '23', '22', '2019-08-28', 'ajaz', '2019-08-28 04:52:00', '2019-08-28 04:52:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `marrige_upload`
--

CREATE TABLE `marrige_upload` (
  `id` int(11) NOT NULL,
  `ref_id` varchar(10) NOT NULL,
  `f_1` varchar(50) NOT NULL,
  `f_2` varchar(50) NOT NULL,
  `f_3` varchar(50) NOT NULL,
  `f_4` varchar(50) NOT NULL,
  `f_5` varchar(50) NOT NULL,
  `t_1` varchar(50) NOT NULL,
  `t_2` varchar(50) NOT NULL,
  `t_3` varchar(50) NOT NULL,
  `t_4` varchar(50) NOT NULL,
  `t_5` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `marrige_voucher`
--

CREATE TABLE `marrige_voucher` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `reason` varchar(100) CHARACTER SET utf8 NOT NULL,
  `no_of_copy` varchar(10) NOT NULL,
  `remark` varchar(100) CHARACTER SET utf8 NOT NULL,
  `payble_amt` varchar(10) NOT NULL,
  `year` varchar(4) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `receipt_no` varchar(20) NOT NULL,
  `sequence_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `miscellaneous_cash_counter`
--

CREATE TABLE `miscellaneous_cash_counter` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `reason` varchar(100) CHARACTER SET utf8 NOT NULL,
  `no_of_copy` varchar(10) NOT NULL,
  `remark` varchar(100) CHARACTER SET utf8 NOT NULL,
  `payble_amt` varchar(10) NOT NULL,
  `year` varchar(4) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `receipt_no` varchar(20) NOT NULL,
  `sequence_no` int(11) NOT NULL,
  `receipt_date` date NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `zone_id` varchar(20) NOT NULL,
  `dept_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `miscellaneous_cash_counter`
--

INSERT INTO `miscellaneous_cash_counter` (`id`, `name`, `mobile`, `reason`, `no_of_copy`, `remark`, `payble_amt`, `year`, `add_date`, `receipt_no`, `sequence_no`, `receipt_date`, `user_id`, `zone_id`, `dept_id`) VALUES
(1, 'ajaz', '99956', 'dsd', '55', 'sdd', '230', '2019', '2019-08-22 04:25:11', '00001CMC/2019', 1, '2019-08-22', 'arzoo', 'zone_1', '2'),
(2, 'mohit', '88888', 'dsds', '55', 'sdsd', '200', '2019', '2019-08-22 04:25:33', '00002CMC/2019', 2, '2019-08-22', 'arzoo', 'zone_1', '2'),
(3, 'sagar', '8888888', 'sdsdsd', '44', 'sdsd', '1000', '2019', '2019-08-22 04:26:40', '00003CMC/2019', 3, '2019-08-22', 'arzoo', 'zone_1', '2'),
(4, 'ajazkhan', '9904760745', 'sddsd', '444', 'sdsdsd', '500', '2019', '2019-08-22 04:27:49', '00004CMC/2019', 4, '2019-08-22', 'ajaz', 'zone_1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `miscellaneous_cash_counter_challan`
--

CREATE TABLE `miscellaneous_cash_counter_challan` (
  `id` int(11) NOT NULL,
  `pre` varchar(10) NOT NULL,
  `sr` int(11) NOT NULL,
  `challan_no` varchar(20) NOT NULL,
  `c_date` date NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `zone_id` varchar(20) NOT NULL,
  `dept_id` varchar(20) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `miscellaneous_cash_counter_challan`
--

INSERT INTO `miscellaneous_cash_counter_challan` (`id`, `pre`, `sr`, `challan_no`, `c_date`, `user_id`, `zone_id`, `dept_id`, `add_date`, `modify_date`, `status`) VALUES
(1, 'CMCC_GAC', 381, 'CMCC_GAC00381', '2019-08-21', 'aagaz', '1_3', '2', '2019-08-21 12:32:20', '2019-08-21 09:14:51', 1),
(2, 'CMCC_GAC', 382, 'CMCC_GAC00382', '2019-08-21', 'ajaz', 'zone_1', '2', '2019-08-21 12:51:05', '2019-08-21 09:22:03', 1),
(3, 'CMCC_GAC', 383, 'CMCC_GAC00383', '2019-08-22', 'arzoo', 'zone_1', '2', '2019-08-22 04:54:19', '2019-08-22 05:52:33', 1);

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
-- Table structure for table `noc_certificate`
--

CREATE TABLE `noc_certificate` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `house_no` varchar(15) CHARACTER SET utf8 NOT NULL,
  `ward_no` varchar(10) CHARACTER SET utf8 NOT NULL,
  `language` varchar(10) CHARACTER SET utf8 NOT NULL,
  `year` varchar(4) NOT NULL,
  `unique_no` varchar(15) NOT NULL,
  `sr_no` int(5) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Pending',
  `remark` varchar(50) NOT NULL,
  `upload_doc` varchar(50) NOT NULL,
  `addDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `noc_certificate`
--

INSERT INTO `noc_certificate` (`id`, `name`, `house_no`, `ward_no`, `language`, `year`, `unique_no`, `sr_no`, `user_id`, `staff_id`, `status`, `remark`, `upload_doc`, `addDate`) VALUES
(1, 'gfg', 'gfg', 'fg', 'english', '2019', '2019CMCC1100001', 1, '9904760745', '', 'Approved', '', '', '2019-09-16 12:52:27'),
(2, 'SDS', 'D23', 'sdds', 'marathi	', '2019', '2019CMCC1100002', 2, '9904760745', '', 'Approved', '', '', '2019-09-17 05:36:22');

-- --------------------------------------------------------

--
-- Table structure for table `occuption_certificate`
--

CREATE TABLE `occuption_certificate` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ward_no` varchar(10) CHARACTER SET utf8 NOT NULL,
  `municipalty_ward_no` varchar(10) CHARACTER SET utf8 NOT NULL,
  `year` varchar(10) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `language` varchar(10) CHARACTER SET utf8 NOT NULL,
  `year2` varchar(4) NOT NULL,
  `unique_no` varchar(15) NOT NULL,
  `sr_no` int(5) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Pending',
  `remark` varchar(50) NOT NULL,
  `upload_doc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `occuption_certificate`
--

INSERT INTO `occuption_certificate` (`id`, `name`, `ward_no`, `municipalty_ward_no`, `year`, `date`, `language`, `year2`, `unique_no`, `sr_no`, `user_id`, `staff_id`, `status`, `remark`, `upload_doc`) VALUES
(1, 'sdas', '3233', '43', '43', '2019-09-16', 'marathi', '2019', '2019CMCC0400001', 1, '9904760745', '', 'Rejected', 'gvngbn', ''),
(2, 'FDF', 'SD', 'DFD', '2011', '2019-09-17', 'marathi', '2019', '2019CMCC0400002', 2, '9904760745', '', 'Approved', '', ''),
(3, 'FDF', 'FDF', 'ERFD', '2222', '2019-09-17', 'english', '2019', '2019CMCC0400003', 3, '9904760745', '', 'Approved', '', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_payment_master`
--

INSERT INTO `online_payment_master` (`id`, `client_id`, `ref_id`, `transaction_id`, `transaction_date`, `Services`, `no_of_copy`, `amount`, `status`) VALUES
(1, '9904760745', 0, '', '', 'Property_Transfer_Record', 1, 500, 0),
(2, '9904760745', 0, '308005432689', '17/09/2019 18:41:27', 'Property_Transfer_Record', 5, 500, 1),
(3, '9904760745', 0, '308005432705', '17/09/2019 18:44:35', 'Property_Transfer_Record', 6, 500, 1),
(4, '9904760745', 0, '308005433313', '18/09/2019 09:37:40', 'Property_Transfer_Record', 5, 500, 1),
(5, '9904760745', 3, '308005433322', '18/09/2019 09:44:08', 'Property_Transfer_Record', 100, 500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `outstanding_certificate`
--

CREATE TABLE `outstanding_certificate` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `income_no` varchar(15) CHARACTER SET utf8 NOT NULL,
  `app_date` date NOT NULL,
  `name2` varchar(50) CHARACTER SET utf8 NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 NOT NULL,
  `res_date` date NOT NULL,
  `language` varchar(10) CHARACTER SET utf8 NOT NULL,
  `year` varchar(4) NOT NULL,
  `unique_no` varchar(15) NOT NULL,
  `sr_no` int(5) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Pending',
  `remark` varchar(50) NOT NULL,
  `upload_doc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outstanding_certificate`
--

INSERT INTO `outstanding_certificate` (`id`, `name`, `income_no`, `app_date`, `name2`, `address`, `res_date`, `language`, `year`, `unique_no`, `sr_no`, `user_id`, `staff_id`, `status`, `remark`, `upload_doc`) VALUES
(1, 'sdfdf', 'fdg', '2019-09-16', 'fg', 'gfg', '2019-09-16', 'marathi	', '2019', '2019CMCC1000001', 1, '9904760745', '', 'Approved', '', ''),
(2, 'SSDS', 'SD', '2019-09-17', 'DDDDDDDDDDDDDDDDDD', 'DSSDD', '2019-09-17', 'english', '2019', '2019CMCC1000002', 2, '9904760745', '', 'Approved', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `part_certificate`
--

CREATE TABLE `part_certificate` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ward_no` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `municipality_ward_no` varchar(10) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `language` varchar(10) CHARACTER SET utf8 NOT NULL,
  `year` varchar(4) NOT NULL,
  `unique_no` varchar(15) NOT NULL,
  `sr_no` int(5) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Pending',
  `remark` varchar(50) NOT NULL,
  `upload_doc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `part_certificate`
--

INSERT INTO `part_certificate` (`id`, `name`, `ward_no`, `municipality_ward_no`, `date`, `language`, `year`, `unique_no`, `sr_no`, `user_id`, `staff_id`, `status`, `remark`, `upload_doc`) VALUES
(1, '2dfg', 'df', '555', '2019-09-16', 'marathi	', '2019', '2019CMCC0500001', 1, '9904760745', '', 'Approved', '', ''),
(2, 'ASA', '34', '555', '2019-09-17', 'marathi	', '2019', '2019CMCC0500002', 2, '9904760745', '', 'Approved', '', ''),
(3, 'DSD', '3', '34', '2019-09-17', 'english', '2019', '2019CMCC0500003', 3, '9904760745', '', 'Approved', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `plant_certificate`
--

CREATE TABLE `plant_certificate` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ward_no` varchar(10) CHARACTER SET utf8 NOT NULL,
  `municipality_ward_no` varchar(10) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `language` varchar(10) CHARACTER SET utf8 NOT NULL,
  `year` varchar(4) NOT NULL,
  `unique_no` varchar(15) NOT NULL,
  `sr_no` int(5) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Pending',
  `remark` varchar(50) NOT NULL,
  `upload_doc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plant_certificate`
--

INSERT INTO `plant_certificate` (`id`, `name`, `ward_no`, `municipality_ward_no`, `date`, `language`, `year`, `unique_no`, `sr_no`, `user_id`, `staff_id`, `status`, `remark`, `upload_doc`) VALUES
(1, 'fghfg', 'fg', 'gfg', '2019-09-16', 'marathi	', '2019', '2019CMCC0800001', 1, '9904760745', '', 'Approved', '', ''),
(2, 'DF', 'WER', '45', '2019-09-17', 'english', '2019', '2019CMCC0800002', 2, '9904760745', '', 'Approved', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `property_transfer_record`
--

CREATE TABLE `property_transfer_record` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ward_no` varchar(10) CHARACTER SET utf8 NOT NULL,
  `municipalty_ward_no` varchar(10) CHARACTER SET utf8 NOT NULL,
  `property_no` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `language` varchar(10) CHARACTER SET utf8 NOT NULL,
  `year` varchar(4) NOT NULL,
  `unique_no` varchar(15) NOT NULL,
  `sr_no` int(5) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Pending',
  `remark` varchar(50) NOT NULL,
  `upload_doc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_transfer_record`
--

INSERT INTO `property_transfer_record` (`id`, `name`, `ward_no`, `municipalty_ward_no`, `property_no`, `date`, `language`, `year`, `unique_no`, `sr_no`, `user_id`, `staff_id`, `status`, `remark`, `upload_doc`) VALUES
(1, 'ajaz', 'd23', '323', '23', '2019-09-17', 'marathi', '2019', '2019CMCC0100001', 1, '9904760745', 'ajaz', 'Pending', '', ''),
(2, 'sds', '2342', '23', '23', '2019-09-17', 'marathi', '2019', '2019CMCC0100002', 2, '9904760745', '', 'Pending', '', ''),
(3, 'ajazbhai', '3232', '2323', '232', '2019-09-18', 'marathi', '2019', '2019CMCC0100003', 3, '9904760745', '', 'Pending', '', '');

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
-- Table structure for table `resident_certificate`
--

CREATE TABLE `resident_certificate` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `word_no` varchar(10) CHARACTER SET utf8 NOT NULL,
  `municipality_word_no` varchar(10) CHARACTER SET utf8 NOT NULL,
  `year` varchar(10) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `language` varchar(10) CHARACTER SET utf8 NOT NULL,
  `year2` varchar(4) NOT NULL,
  `unique_no` varchar(15) NOT NULL,
  `sr_no` int(5) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Pending',
  `remark` varchar(50) NOT NULL,
  `upload_doc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resident_certificate`
--

INSERT INTO `resident_certificate` (`id`, `name`, `word_no`, `municipality_word_no`, `year`, `date`, `language`, `year2`, `unique_no`, `sr_no`, `user_id`, `staff_id`, `status`, `remark`, `upload_doc`) VALUES
(1, 'uiui', 'iui', 'uiuiu', 'uiui', '2019-09-16', 'marathi	', '2019', '2019CMCC1200001', 1, '9904760745', '', 'Approved', '', ''),
(2, 'SDFVDS', 'EW45R3', ' FG', '2222', '2019-09-17', 'english', '2019', '2019CMCC1200002', 2, '9904760745', '', 'Approved', '', '');

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
-- Table structure for table `staff_master`
--

CREATE TABLE `staff_master` (
  `id` int(11) NOT NULL,
  `department_id` varchar(10) NOT NULL,
  `zone` varchar(10) NOT NULL,
  `role` varchar(10) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `add_date` date NOT NULL,
  `modify_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_master`
--

INSERT INTO `staff_master` (`id`, `department_id`, `zone`, `role`, `name`, `mobile`, `email`, `user_id`, `status`, `add_date`, `modify_date`) VALUES
(1, '2', 'zone_1', 'staff', 'arzoo', '8866152292', 'a@a.com', 'arzoo', 1, '2019-07-02', '0000-00-00'),
(2, '2', 'zone_1', 'staff', 'आरजू शेख ', '8866152292', 'a@gmail.com', 'arzoo123', 1, '2019-07-02', '2019-07-02'),
(3, '2', 'zone_1', 'staff', 'ajaz', '8866152292', 'a@a.com', 'ajaz', 1, '2019-07-03', '0000-00-00'),
(4, '2', '6_1', 'staff', 'sagar', '9874563210', 'smorvadiya931@rku.ac.in', 'sagar', 1, '2019-07-13', '2019-07-13'),
(5, '2', '1_3', 'staff', 'AAGAZ', '8866152292', 'a@a.com', 'aagaz', 1, '2019-07-13', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `subzone_master`
--

CREATE TABLE `subzone_master` (
  `id` int(11) NOT NULL,
  `zoneid` int(11) NOT NULL,
  `subzonename` varchar(30) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `add_date` date NOT NULL,
  `modifydate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subzone_master`
--

INSERT INTO `subzone_master` (`id`, `zoneid`, `subzonename`, `status`, `add_date`, `modifydate`) VALUES
(1, 6, 'subzone123', 0, '2019-07-13', '2019-07-13'),
(2, 2, 'subzone2', 1, '2019-07-13', '0000-00-00'),
(3, 1, 'subzone1', 1, '2019-07-13', '0000-00-00'),
(4, 1, 'subzone2', 1, '2019-07-13', '0000-00-00');

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
-- Table structure for table `user_registration`
--

CREATE TABLE `user_registration` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`id`, `name`, `email`, `mobile`, `password`, `status`) VALUES
(1, 'arzoo', '', '8866152292', '123456', 0),
(2, 'arzoo', '', '8866152292', '123456', 1),
(4, 'sameer andankar', 'zodiactechsoft@gmail.com', '9325695631', 'admin', 1),
(5, 'Dhiraj', 'dhirajpeocit123@gmail.com', '8390966444', '', 0),
(6, 'Dhiraj junarkar', 'dhiraj44@hotmail.com', '7083828076', 'dhiraj@123', 1),
(40, 'Ajazkhan Pathan', 'ajazkhanpathan14@gmail.com', '9904760745', '123456', 1),
(8, 'digvijay', 'digvijay_warade@yahoo.com', '9028665254', 'prashik260', 1),
(9, 'digvijay warade', 'digvijay_warade@yahoo.com', '9075613611', 'sanika26', 1),
(10, 'Ajazkhan', 'ajazkhanpathan14@gmail.com', '7016158344', '111111', 1),
(11, 'Vishal Akbari', 'vishal.rkcet@gmail.com', '7574865414', '1234', 1),
(12, 'Dhiraj Junarkar', 'dhiraj44@hotmail.com', '8390966444', 'dhiraj1990', 1),
(13, 'sameer andankar', 'sam.andankar1990@gmail.com', '9970255587', '', 0),
(14, 'vasanti', 'vasantibahadure@gmail.com', '9423416948', 'vasantib', 1),
(15, 'ARTI ROBERT JOSEPH', 'naharkararti@gmail.com', '8087407567', 'Aarti@777', 1),
(16, 'sameer andankar', 'zodiactechsoft@gmail.com', '9325695631', '16021990', 1),
(17, 'sarita', 'saritamahatav83@gmail.com', '9588492821', 'Pinku@2011', 1),
(18, 'sarita', 'saritamahatav83@gmail.com', '9588492821', 'Pinku@2011', 1),
(19, 'sarita', 'saritamahatav83@gmail.com', '9588492821', 'sam1602', 1),
(20, 'sarita', 'saritamahatav83@gmail.com', '9588492821', '12345', 1),
(21, 'sarita', 'saritamahatav83@gmail.com', '9588492821', 'Pinku@2011', 1),
(22, 'sarita', 'saritamahatav83@gmail.com', '9588492821', 'Pinku@2011', 1),
(23, 'sarita', 'saritamahatav83@gmail.com', '9588492821', 'Pinku@2011', 1),
(24, 'sarita', 'saritamahatav83@gmail.com', '9588492821', 'Pinku@2011', 1),
(25, 'sarita', 'saritamahatav83@gmail.com', '9588492821', 'Pinku@2011', 1),
(26, 'sameer andankar', 'zodiactechsoft@gmail.com', '8983263896', '1602', 1),
(27, 'sarita', 'saritamahatav83@gmail.com', '9588492821', 'Pinku@2011', 1),
(28, 'sarita', 'saritamahatav83@gmail.com', '9588492821', '', 0),
(29, 'sarita', 'saritamahatav83@gmail.com', '9588492821', '', 0),
(30, 'sarita', 'saritamahatav83@gmail.com', '9588492821', '', 0),
(31, 'sarita', 'saritamahatav83@gmail.com', '9588492821', '', 0),
(32, 'sarita', 'saritasberiya@gmail.com', '9588492821', '', 0),
(33, 'sarita', 'saritamahatav83@gmail.com', '9588492821', 'Pinku@2011', 1),
(34, 'arvind nikure', 'Arvind@123', '9673577664', 'nikure', 1),
(35, 'poonam mahatav', 'mahatav.punam@gmail.com', '7083879254', 'poonam', 1),
(36, 'kishori gharote', '123@gmail.com', '9423115475', 'kishori@12', 1),
(37, 'kishori gharote', '123@gmail.com', '9423115475', 'kishori', 1),
(38, 'sarita', 'saritasberiya@gmail.com', '9588492821', 'Pinku@2011', 1),
(39, 'arvind nikure', 'Arvind@123', '9673577664', '', 0),
(41, 'Sagar Morvadiya', 'sagar@gmail.com', '9913829299', '12345', 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `zone_certificate`
--

CREATE TABLE `zone_certificate` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ward_no` varchar(10) CHARACTER SET utf8 NOT NULL,
  `municipality_ward_no` varchar(10) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `language` varchar(10) CHARACTER SET utf8 NOT NULL,
  `year` varchar(4) NOT NULL,
  `unique_no` varchar(15) NOT NULL,
  `sr_no` int(5) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Pending',
  `remark` varchar(50) NOT NULL,
  `upload_doc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zone_certificate`
--

INSERT INTO `zone_certificate` (`id`, `name`, `ward_no`, `municipality_ward_no`, `date`, `language`, `year`, `unique_no`, `sr_no`, `user_id`, `staff_id`, `status`, `remark`, `upload_doc`) VALUES
(1, 'ghg', 'rt554', '4545', '2019-09-16', 'marathi	', '2019', '2019CMCC0600001', 1, '9904760745', '', 'Approved', '', ''),
(2, 'GF', '34', 'RT', '2019-09-17', 'english', '2019', '2019CMCC0600002', 2, '9904760745', '', 'Approved', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `zone_master`
--

CREATE TABLE `zone_master` (
  `id` int(11) NOT NULL,
  `zonename` varchar(30) NOT NULL,
  `status` int(1) NOT NULL,
  `add_date` date NOT NULL,
  `modify_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zone_master`
--

INSERT INTO `zone_master` (`id`, `zonename`, `status`, `add_date`, `modify_date`) VALUES
(1, 'zone 1', 1, '2019-07-13', '2019-07-13'),
(2, 'zone 123', 1, '2019-07-13', '2019-07-13'),
(5, 'zone 12', 0, '2019-07-13', '0000-00-00'),
(6, 'zone 3', 1, '2019-07-13', '0000-00-00'),
(7, 'zone 2', 1, '2019-07-13', '0000-00-00');

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
-- Indexes for table `birth_appointment`
--
ALTER TABLE `birth_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `birth_documents`
--
ALTER TABLE `birth_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `birth_registration`
--
ALTER TABLE `birth_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash_counter`
--
ALTER TABLE `cash_counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash_counter_challan`
--
ALTER TABLE `cash_counter_challan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `construction_certificate`
--
ALTER TABLE `construction_certificate`
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
-- Indexes for table `department_master`
--
ALTER TABLE `department_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disaster_management`
--
ALTER TABLE `disaster_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doc_upload`
--
ALTER TABLE `doc_upload`
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
-- Indexes for table `fee_structure`
--
ALTER TABLE `fee_structure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fire_fighting`
--
ALTER TABLE `fire_fighting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fire_fighting2`
--
ALTER TABLE `fire_fighting2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fire_fighting_noc`
--
ALTER TABLE `fire_fighting_noc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `first_page_text`
--
ALTER TABLE `first_page_text`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formd`
--
ALTER TABLE `formd`
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
-- Indexes for table `inheritance_certificate`
--
ALTER TABLE `inheritance_certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `left_menu`
--
ALTER TABLE `left_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_master`
--
ALTER TABLE `login_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marrige_challan`
--
ALTER TABLE `marrige_challan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marrige_documents`
--
ALTER TABLE `marrige_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marrige_receipt`
--
ALTER TABLE `marrige_receipt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marrige_registration`
--
ALTER TABLE `marrige_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marrige_upload`
--
ALTER TABLE `marrige_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marrige_voucher`
--
ALTER TABLE `marrige_voucher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_edu_service`
--
ALTER TABLE `master_edu_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `miscellaneous_cash_counter`
--
ALTER TABLE `miscellaneous_cash_counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `miscellaneous_cash_counter_challan`
--
ALTER TABLE `miscellaneous_cash_counter_challan`
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
-- Indexes for table `noc_certificate`
--
ALTER TABLE `noc_certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `occuption_certificate`
--
ALTER TABLE `occuption_certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_payment_master`
--
ALTER TABLE `online_payment_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outstanding_certificate`
--
ALTER TABLE `outstanding_certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `part_certificate`
--
ALTER TABLE `part_certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plant_certificate`
--
ALTER TABLE `plant_certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_transfer_record`
--
ALTER TABLE `property_transfer_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quick_link`
--
ALTER TABLE `quick_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resident_certificate`
--
ALTER TABLE `resident_certificate`
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
-- Indexes for table `staff_master`
--
ALTER TABLE `staff_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subzone_master`
--
ALTER TABLE `subzone_master`
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
-- Indexes for table `user_registration`
--
ALTER TABLE `user_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_edu_master`
--
ALTER TABLE `web_edu_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zone_certificate`
--
ALTER TABLE `zone_certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zone_master`
--
ALTER TABLE `zone_master`
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
-- AUTO_INCREMENT for table `birth_appointment`
--
ALTER TABLE `birth_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `birth_documents`
--
ALTER TABLE `birth_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `birth_registration`
--
ALTER TABLE `birth_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `budget`
--
ALTER TABLE `budget`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cash_counter`
--
ALTER TABLE `cash_counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cash_counter_challan`
--
ALTER TABLE `cash_counter_challan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `construction_certificate`
--
ALTER TABLE `construction_certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `department_master`
--
ALTER TABLE `department_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `disaster_management`
--
ALTER TABLE `disaster_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doc_upload`
--
ALTER TABLE `doc_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
-- AUTO_INCREMENT for table `fee_structure`
--
ALTER TABLE `fee_structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fire_fighting`
--
ALTER TABLE `fire_fighting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fire_fighting2`
--
ALTER TABLE `fire_fighting2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fire_fighting_noc`
--
ALTER TABLE `fire_fighting_noc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `first_page_text`
--
ALTER TABLE `first_page_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `formd`
--
ALTER TABLE `formd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `inheritance_certificate`
--
ALTER TABLE `inheritance_certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `left_menu`
--
ALTER TABLE `left_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_master`
--
ALTER TABLE `login_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `marrige_challan`
--
ALTER TABLE `marrige_challan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marrige_documents`
--
ALTER TABLE `marrige_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `marrige_receipt`
--
ALTER TABLE `marrige_receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marrige_registration`
--
ALTER TABLE `marrige_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `marrige_upload`
--
ALTER TABLE `marrige_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marrige_voucher`
--
ALTER TABLE `marrige_voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_edu_service`
--
ALTER TABLE `master_edu_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `miscellaneous_cash_counter`
--
ALTER TABLE `miscellaneous_cash_counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `miscellaneous_cash_counter_challan`
--
ALTER TABLE `miscellaneous_cash_counter_challan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `noc_certificate`
--
ALTER TABLE `noc_certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `occuption_certificate`
--
ALTER TABLE `occuption_certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `online_payment_master`
--
ALTER TABLE `online_payment_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `outstanding_certificate`
--
ALTER TABLE `outstanding_certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `part_certificate`
--
ALTER TABLE `part_certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `plant_certificate`
--
ALTER TABLE `plant_certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `property_transfer_record`
--
ALTER TABLE `property_transfer_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quick_link`
--
ALTER TABLE `quick_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resident_certificate`
--
ALTER TABLE `resident_certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `staff_master`
--
ALTER TABLE `staff_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subzone_master`
--
ALTER TABLE `subzone_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `web_edu_master`
--
ALTER TABLE `web_edu_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `zone_certificate`
--
ALTER TABLE `zone_certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zone_master`
--
ALTER TABLE `zone_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
