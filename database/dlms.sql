-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2021 at 04:10 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dlms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_acc`
--

CREATE TABLE `admin_acc` (
  `admin_id` int(11) NOT NULL,
  `fullname` varchar(1000) NOT NULL,
  `admin_user` varchar(1000) NOT NULL,
  `admin_pass` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_acc`
--

INSERT INTO `admin_acc` (`admin_id`, `fullname`, `admin_user`, `admin_pass`) VALUES
(1, 'admin Alucards', 'admin@username', 'admin@password');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `aid` int(10) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `cou_id` int(10) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `atype` varchar(50) NOT NULL,
  `amessage` varchar(1000) NOT NULL,
  `photo` varchar(5000) NOT NULL,
  `adminname` varchar(1000) NOT NULL,
  `date_posted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`aid`, `admin_id`, `cou_id`, `title`, `atype`, `amessage`, `photo`, `adminname`, `date_posted`) VALUES
(37, 1, 0, 'Hello Asa Ka', 'GENERAL ANNOUCEMENT', 'Hello', '', 'admin Alucard', '2021-10-18 00:00:00'),
(38, 1, 26, 'Hello', 'LEARNER ANNOUNCEMENT', '  Waddup  ', '20429858_1408645595838496_1065546460807191019_n.jpg', 'admin Alucard', '2021-10-18 00:00:00'),
(39, 1, 26, 'sampletext3', 'LEARNER ANNOUNCEMENT', 'wahahahaha', '', 'admin Alucards', '2021-10-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `course_tbl`
--

CREATE TABLE `course_tbl` (
  `cou_id` int(11) NOT NULL,
  `cou_name` varchar(1000) NOT NULL,
  `stu_capacity` int(10) NOT NULL,
  `minexam_pass` int(10) NOT NULL,
  `cou_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_tbl`
--

INSERT INTO `course_tbl` (`cou_id`, `cou_name`, `stu_capacity`, `minexam_pass`, `cou_created`) VALUES
(26, 'BSIT', 7, 3, '2021-11-18 03:06:00'),
(72, 'BSXRM', 50, 0, '2021-09-30 02:23:38'),
(74, 'BSA', 31, 2, '2021-10-18 05:49:00'),
(77, 'YAMAHA', 3, 4, '2021-10-22 03:53:29');

-- --------------------------------------------------------

--
-- Table structure for table `exam_answers`
--

CREATE TABLE `exam_answers` (
  `exans_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `quest_id` int(11) NOT NULL,
  `exans_answer` varchar(1000) NOT NULL,
  `exans_status` varchar(1000) NOT NULL DEFAULT 'new',
  `exans_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_answers`
--

INSERT INTO `exam_answers` (`exans_id`, `stu_id`, `exam_id`, `quest_id`, `exans_answer`, `exans_status`, `exans_created`) VALUES
(667, 20215181, 54, 60, 'kiboloy', 'new', '2021-10-20 06:59:26'),
(668, 20215181, 54, 59, 'scam', 'new', '2021-10-20 06:59:26'),
(669, 20215181, 55, 61, 'fighter', 'new', '2021-10-20 06:59:43'),
(670, 20215181, 55, 62, 'dokkaebi', 'new', '2021-10-20 06:59:43'),
(671, 20219534, 55, 61, 'sample', 'new', '2021-10-20 14:22:50'),
(672, 20219534, 55, 62, 'dokkaebi', 'new', '2021-10-20 14:22:51'),
(673, 20215181, 46, 51, 'engineoile', 'old', '2021-10-22 03:22:04'),
(674, 20215181, 46, 50, 'kerosine', 'old', '2021-10-22 03:22:04'),
(675, 20215181, 46, 52, 'ligid sa sakyanan', 'old', '2021-10-22 03:22:04'),
(676, 20215181, 46, 53, 'RUSI', 'old', '2021-10-22 03:22:04'),
(677, 20215181, 39, 47, 'xd', 'old', '2021-10-22 03:24:31'),
(678, 20215181, 39, 49, 'kaon', 'old', '2021-10-22 03:24:31'),
(679, 20215181, 39, 48, 'imo mama', 'old', '2021-10-22 03:24:31'),
(680, 20215181, 29, 43, 'GRACE', 'old', '2021-10-22 03:28:39'),
(681, 20215181, 29, 41, 'EDEBEWANPEPTI', 'old', '2021-10-22 03:28:39'),
(682, 20215181, 29, 40, 'KYUETWANPAYB', 'old', '2021-10-22 03:28:39'),
(683, 20215181, 29, 42, 'PAYTER', 'old', '2021-10-22 03:28:39'),
(684, 20215181, 46, 53, 'RUSI', 'new', '2021-10-22 03:22:05'),
(685, 20215181, 46, 51, 'sanaoil', 'new', '2021-10-22 03:22:05'),
(686, 20215181, 46, 50, 'unleaded', 'new', '2021-10-22 03:22:06'),
(687, 20215181, 46, 52, 'ligid sa motor', 'new', '2021-10-22 03:22:06'),
(688, 20215181, 39, 47, 'xd', 'old', '2021-10-22 03:33:19'),
(689, 20215181, 39, 48, 'imo mama', 'old', '2021-10-22 03:33:19'),
(690, 20215181, 39, 49, 'palit kanon', 'old', '2021-10-22 03:33:19'),
(691, 20215181, 29, 40, 'PHCARE', 'new', '2021-10-22 03:28:39'),
(692, 20215181, 29, 41, 'EDEBEWANPEPTI', 'new', '2021-10-22 03:28:39'),
(693, 20215181, 29, 43, 'GRACE', 'new', '2021-10-22 03:28:39'),
(694, 20215181, 29, 42, 'PAYTER', 'new', '2021-10-22 03:28:40'),
(695, 20215181, 39, 49, 'palit kanon', 'old', '2021-11-11 06:38:41'),
(696, 20215181, 39, 48, 'imong nawng', 'old', '2021-11-11 06:38:41'),
(697, 20215181, 39, 47, 'ambot', 'old', '2021-11-11 06:38:41'),
(698, 20215181, 33, 54, '<!doctype html></html>', 'old', '2021-11-11 06:06:46'),
(699, 20215181, 33, 56, '<body> gg</body>', 'old', '2021-11-11 06:06:46'),
(700, 20215181, 33, 55, '<p align=\"center\">hello</p>', 'old', '2021-11-11 06:06:46'),
(701, 20219534, 54, 59, 'scam', 'new', '2021-11-01 11:20:36'),
(702, 20219534, 54, 60, 'kiboloy', 'new', '2021-11-01 11:20:36'),
(703, 20219534, 56, 66, 'google', 'old', '2021-11-09 02:34:36'),
(704, 20219534, 56, 69, '<p align=\"left\">hahahaha</p>', 'old', '2021-11-09 02:34:36'),
(705, 20219534, 56, 63, '<html>', 'old', '2021-11-09 02:34:36'),
(706, 20219534, 56, 64, 'aa', 'old', '2021-11-09 02:34:36'),
(707, 20219534, 56, 67, 'c', 'old', '2021-11-09 02:34:36'),
(708, 20219534, 46, 50, 'unleaded', 'new', '2021-11-02 01:40:21'),
(709, 20219534, 46, 53, 'RUSI', 'new', '2021-11-02 01:40:21'),
(710, 20219534, 46, 52, 'ligid sa motor', 'new', '2021-11-02 01:40:21'),
(711, 20219534, 46, 51, 'engineoil', 'new', '2021-11-02 01:40:21'),
(712, 20219534, 39, 49, 'kaon', 'new', '2021-11-02 01:40:37'),
(713, 20219534, 39, 47, 'xd', 'new', '2021-11-02 01:40:37'),
(714, 20219534, 39, 48, 'imong nawng', 'new', '2021-11-02 01:40:37'),
(715, 20219534, 33, 55, '<p align=\"center\">hello</p>', 'new', '2021-11-02 01:41:09'),
(716, 20219534, 33, 56, 'aewe', 'new', '2021-11-02 01:41:09'),
(717, 20219534, 33, 54, '<!doctype html></html>', 'new', '2021-11-02 01:41:09'),
(718, 20219534, 29, 40, 'PHCARE', 'old', '2021-11-02 01:43:17'),
(719, 20219534, 29, 43, 'WILLA', 'old', '2021-11-02 01:43:17'),
(720, 20219534, 29, 42, 'PAYTER', 'old', '2021-11-02 01:43:17'),
(721, 20219534, 29, 41, 'EDEBEWANPEPTI', 'old', '2021-11-02 01:43:17'),
(722, 20219534, 29, 43, 'GRACE', 'old', '2021-11-26 05:18:51'),
(723, 20219534, 29, 42, 'PAYTER', 'old', '2021-11-26 05:18:51'),
(724, 20219534, 29, 41, 'EDEBEWANPEPTI', 'old', '2021-11-26 05:18:51'),
(725, 20219534, 29, 40, 'PHCARE', 'old', '2021-11-26 05:18:51'),
(726, 20219534, 56, 67, 'a', 'old', '2021-11-09 02:35:41'),
(727, 20219534, 56, 66, 'google', 'old', '2021-11-09 02:35:41'),
(728, 20219534, 56, 68, 'hiyoca', 'old', '2021-11-09 02:35:41'),
(729, 20219534, 56, 69, '<b>hello<b>dddd', 'old', '2021-11-09 02:35:41'),
(730, 20219534, 56, 64, 'ea', 'old', '2021-11-09 02:35:41'),
(731, 20219534, 56, 69, '<b>hello<b>dddd', 'new', '2021-11-09 02:35:42'),
(732, 20219534, 56, 66, 'google', 'new', '2021-11-09 02:35:43'),
(733, 20219534, 56, 64, 'ea', 'new', '2021-11-09 02:35:43'),
(734, 20219534, 56, 68, 'hiyoca', 'new', '2021-11-09 02:35:44'),
(735, 20219534, 56, 63, '<html>', 'new', '2021-11-09 02:35:44'),
(736, 20215181, 33, 55, 'adadad', 'old', '2021-11-11 06:18:53'),
(737, 20215181, 33, 56, '<b>hello<b>d', 'old', '2021-11-11 06:18:53'),
(738, 20215181, 33, 54, '<!doctype html></html>', 'old', '2021-11-11 06:18:53'),
(739, 20215181, 33, 56, '<b>hello<b>d', 'new', '2021-11-11 06:18:53'),
(740, 20215181, 33, 54, '<!doctype html></html>', 'new', '2021-11-11 06:18:53'),
(741, 20215181, 33, 55, 'dadad', 'new', '2021-11-11 06:18:54'),
(742, 20215181, 39, 47, 'xd', 'old', '2021-11-11 12:19:28'),
(743, 20215181, 39, 47, 'xd', 'new', '2021-11-11 12:19:37'),
(744, 20219534, 29, 41, 'EDEBEWANPEPTI', 'new', '2021-11-26 05:19:12'),
(745, 20219534, 29, 42, 'PAYTER', 'new', '2021-11-26 05:19:13'),
(746, 20219534, 29, 43, 'WILLA', 'new', '2021-11-26 05:19:15'),
(747, 20219534, 29, 40, 'PHCARE', 'new', '2021-11-26 05:19:15');

-- --------------------------------------------------------

--
-- Table structure for table `exam_attempt`
--

CREATE TABLE `exam_attempt` (
  `examat_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `examat_status` varchar(1000) NOT NULL DEFAULT 'used',
  `examat_used` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_attempt`
--

INSERT INTO `exam_attempt` (`examat_id`, `stu_id`, `exam_id`, `examat_status`, `examat_used`) VALUES
(164, 20215181, 54, 'used', '2021-10-20 14:59:26'),
(165, 20215181, 55, 'used', '2021-10-20 14:59:44'),
(166, 20219534, 55, 'used', '2021-10-20 22:22:51'),
(170, 20215181, 46, 'used', '2021-10-22 11:22:07'),
(172, 20215181, 29, 'used', '2021-10-22 11:28:40'),
(175, 20219534, 54, 'used', '2021-11-01 19:20:36'),
(177, 20219534, 46, 'used', '2021-11-02 09:40:21'),
(178, 20219534, 39, 'used', '2021-11-02 09:40:37'),
(179, 20219534, 33, 'used', '2021-11-02 09:41:09'),
(183, 20219534, 56, 'used', '2021-11-09 10:35:41'),
(185, 20215181, 33, 'used', '2021-11-11 02:18:53'),
(187, 20215181, 39, 'used', '2021-11-11 08:19:37'),
(188, 20219534, 29, 'used', '2021-11-26 01:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `exam_question_tbl`
--

CREATE TABLE `exam_question_tbl` (
  `eqt_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `exam_question` varchar(1000) NOT NULL,
  `exam_photo` mediumtext NOT NULL,
  `exam_ch1` text NOT NULL,
  `exam_ch2` text NOT NULL,
  `exam_ch3` text NOT NULL,
  `exam_ch4` text NOT NULL,
  `exam_answer` varchar(1000) NOT NULL,
  `exam_status` varchar(1000) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_question_tbl`
--

INSERT INTO `exam_question_tbl` (`eqt_id`, `exam_id`, `exam_question`, `exam_photo`, `exam_ch1`, `exam_ch2`, `exam_ch3`, `exam_ch4`, `exam_answer`, `exam_status`) VALUES
(39, 27, 'Unsay motor ni PH CARE', '', 'RUSI RFi 175', 'RAIDER 15-', 'ADV150', 'xrM', 'ADV150', 'active'),
(40, 29, 'Sample', '', 'PHCARE', 'LODICAKES', 'ANDRUIDPROJECT', 'KYUETWANPAYB', 'PHCARE', 'active'),
(41, 29, 'SAMPLE2', '', 'SNAYPERWANPEPTI', 'REYDIIRRARWANPEPTI', 'DEEL WANPEPTI', 'EDEBEWANPEPTI', 'EDEBEWANPEPTI', 'active'),
(42, 29, 'ALUCARD', '', 'PAYTER', 'MAGE', 'JUNGLER', 'CORE', 'CORE', 'active'),
(43, 29, 'SALUTATORIA', '', 'GRACE', 'WILLA', 'MALLDOG', 'CYKABLYAT', 'GRACE', 'active'),
(44, 30, 'CSS-Inline', '', '<style></style>', '<div>', 'undefined variable', 'echo\"\";', '<style></style>', 'active'),
(45, 30, 'print hello world in php', '', '<body> hello world</body>', 'printf(\"hello world\");', 'echo\"hello world\";', 'System.oout.println(\"hello world\");', 'echo\"hello world\";', 'active'),
(46, 30, 'Willa Mae hiyoca', '', 'brayt', 'toxic', 'ambot', 'wa ko kahibaw', 'toxic', 'active'),
(47, 39, 'lol', '', 'xd', 'mem', 'ambot', 'ambot', 'xd', 'active'),
(48, 39, 'sa', '', 'imong nawng', 'imo mama', 'ambot', 'wa', 'imo mama', 'active'),
(49, 39, 'gi gutom', '', 'palit kanon', 'kaon', 'dota pa', 'wa', 'kaon', 'active'),
(50, 46, 'gasulina', '', 'unleaded', '97', 'diesel', 'kerosine', 'unleaded', 'active'),
(51, 46, 'oil', '', 'engineoile', 'engineoil', 'babyoil', 'sanaoil', 'engineoil', 'active'),
(52, 46, 'ligid', '', 'tractpra', 'ligid sa bike', 'ligid sa motor', 'ligid sa sakyanan', 'ligid sa motor', 'active'),
(53, 46, 'brand', '', 'RUSI', 'Yamaha', 'Kawasaki', 'SKYGO', 'RUSI', 'active'),
(54, 33, 'html', '', '<!doctype html></html>', '<?php echo?>', '</script>', 'cout<<hello world', '<!doctype html></html>', 'active'),
(55, 33, '<p align=\"center\">hello</p>', '', 'dadad', 'adadad', '<p align=\"center\">hello</p>', 'dad', 'dadad', 'active'),
(56, 33, '<!DOCTYPE html>\r\n<html>\r\n    <head>\r\n        <title>Example</title>\r\n    </head>\r\n    <body>\r\n        <p>This is an example of a simple HTML page with one paragraph.</p>\r\n    </body>\r\n</html>', '', '<b>hello<b>d', '<p align=\"left\">hahahaha</p>', 'php', 'java', '<b>hello<b>d', 'active'),
(59, 54, 'kapa', '', 'scam', 'dli', 'ambot', 'wa ko kahibaw', 'scam', 'active'),
(60, 54, 'kuntra', '', 'gloria', 'duterte', 'noynoy', 'kiboloy', 'kiboloy', 'active'),
(61, 55, 'guinbaroquegg', 'judes.jpg', 'sample', 'fighter', 'core', 'tank', 'fighter', 'active'),
(62, 55, 'alucard', 'Capture.PNG', 'dokkaebi', 'sessionstert', 'ceres', 'sample text', 'dokkaebi', 'active'),
(63, 56, '<!doctype>', '', '<html>', '<div>', '<?php?>', 'echo\"hello world\";', '<html>', 'active'),
(64, 56, 'sampletext', '', 'ea', 'ea', 'a', 'aa', 'a', 'active'),
(66, 56, 'hellog', 'Googlelogo.png', 'gg', 'google', 'bing', 'safare', 'bing', 'active'),
(67, 56, 'hadasdasda', '', 'a', 'bc', 'c', 'dd', 'c', 'active'),
(68, 56, 'willa mae', 'FB_IMG_1568914934697.jpg', 'epee', 'hiyoca', 'fantonial', 'mallen', 'hiyoca', 'active'),
(69, 56, '<!DOCTYPE html>\r\n<html>rushbdddd\r\n    <head>\r\n        <title>Example</title>\r\n    </head>\r\n    <body>\r\n        <p>This is an example of a simple HTML page with one paragraph.</p>\r\n    </bodyd>\r\n</html>', 'IMG_20190102_172845.jpg', '<b>hello<b>dddd', '<p align=\"left\">hahahaha</p>', 'rush b', 'java', '<b>hello<b>dddd', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `exam_result`
--

CREATE TABLE `exam_result` (
  `res_id` int(10) NOT NULL,
  `examat_id` int(10) NOT NULL,
  `ex_id` int(10) NOT NULL,
  `ex_title` varchar(50) NOT NULL,
  `exam_created` varchar(50) NOT NULL,
  `exam_taken` varchar(200) NOT NULL,
  `stu_id` int(10) NOT NULL,
  `max_score` int(10) NOT NULL,
  `stu_score` int(10) NOT NULL,
  `score_percent` int(50) NOT NULL,
  `res_stat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_result`
--

INSERT INTO `exam_result` (`res_id`, `examat_id`, `ex_id`, `ex_title`, `exam_created`, `exam_taken`, `stu_id`, `max_score`, `stu_score`, `score_percent`, `res_stat`) VALUES
(86, 0, 54, 'Go kapa way sirado', '2021-09-24 15:11:16', '2021-10-20 14:59:26', 20215181, 2, 2, 0, 'PASSED'),
(87, 0, 55, 'Chapter 99999 Asa Si PH Care pt 2', '2021-09-27 16:09:20', '2021-10-20 14:59:44', 20215181, 2, 2, 0, 'PASSED'),
(88, 0, 55, 'Chapter 99999 Asa Si PH Care pt 2', '2021-09-27 16:09:20', '2021-10-20 22:22:51', 20219534, 1, 2, 0, 'FAIL'),
(90, 0, 39, 'Hello world', '2021-09-20 14:19:54', '2021-10-22 11:15:40', 20215181, 3, 5, 0, 'FAIL'),
(91, 0, 29, 'Chapter 99999 Asa Si PH Care', '2021-09-15 11:10:54', '2021-10-22 11:16:41', 20215181, 2, 4, 0, 'FAIL'),
(93, 0, 39, 'Hello world', '2021-09-20 14:19:54', '2021-10-22 11:24:31', 20215181, 2, 5, 0, 'FAIL'),
(94, 0, 46, 'r3', '2021-09-20 18:25:18', '2021-10-22 11:22:07', 20215181, 3, 4, 0, 'PASSED'),
(95, 0, 29, 'Chapter 99999 Asa Si PH Care', '2021-09-15 11:10:54', '2021-10-22 11:28:40', 20215181, 3, 4, 0, 'PASSED'),
(96, 0, 39, 'Hello world', '2021-09-20 14:19:54', '2021-10-22 11:33:21', 20215181, 0, 5, 0, 'FAIL'),
(97, 0, 33, 'Grace Fantonial', '2021-09-20 12:38:06', '2021-10-22 11:42:22', 20215181, 1, 4, 0, 'FAIL'),
(98, 0, 54, 'Go kapa way sirado', '2021-09-24 15:11:16', '2021-11-01 19:20:36', 20219534, 2, 2, 0, 'PASSED'),
(99, 0, 29, 'Chapter 99999 Asa Si PH Care', '2021-09-15 11:10:54', '2021-11-02 09:43:20', 20219534, 3, 4, 0, 'PASSED'),
(100, 0, 33, 'Grace Fantonial', '2021-09-20 12:38:06', '2021-11-02 09:41:09', 20219534, 2, 4, 0, 'FAIL'),
(101, 0, 46, 'r3', '2021-09-20 18:25:18', '2021-11-02 09:40:21', 20219534, 4, 4, 0, 'PASSED'),
(103, 0, 33, 'Grace Fantonial', '2021-09-20 12:38:06', '2021-11-11 02:18:53', 20215181, 3, 4, 0, 'PASSED');

-- --------------------------------------------------------

--
-- Table structure for table `exam_tbl`
--

CREATE TABLE `exam_tbl` (
  `ex_id` int(11) NOT NULL,
  `cou_id` int(11) NOT NULL,
  `ex_title` varchar(1000) NOT NULL,
  `ex_time_limit` varchar(1000) NOT NULL,
  `ex_questlimit_display` int(11) NOT NULL,
  `ex_description` varchar(1000) NOT NULL,
  `ex_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_tbl`
--

INSERT INTO `exam_tbl` (`ex_id`, `cou_id`, `ex_title`, `ex_time_limit`, `ex_questlimit_display`, `ex_description`, `ex_created`) VALUES
(29, 26, 'Chapter 99999 Asa Si PH Care', '10', 4, 'ph care', '2021-09-15 11:10:54'),
(33, 26, 'Grace Fantonial', '10', 4, 'sample', '2021-09-20 12:38:06'),
(39, 26, 'Hello world', '20', 5, 'sample', '2021-09-20 14:19:54'),
(46, 26, 'r3', '30', 4, 'adad', '2021-09-20 18:25:18'),
(50, 26, 'SAMPLE3', '30', 2, 'dda', '2021-09-21 09:02:11'),
(52, 26, 'Sample154', '20', 4, 'eawe', '2021-09-23 16:56:09'),
(54, 26, 'Go kapa way sirado', '10', 2, 'sample', '2021-09-24 15:11:16'),
(55, 26, 'Chapter 99999 Asa Si PH Care pt 2', '10', 2, 'sample', '2021-09-27 16:09:20'),
(56, 26, 'SAMPLE13', '10', 5, 'sample', '2021-11-03 13:42:30'),
(57, 26, 'wahahahah', '10', 1, 'sample', '2021-11-09 10:16:48'),
(58, 26, 'asa ang manok', '10', 4, 'sample saple hahahaha', '2021-11-29 10:42:48'),
(59, 74, 'samples2', '10', 2, 'da', '2021-12-10 02:31:12'),
(60, 74, 'eawe', '10', 2, 'a', '2021-12-10 02:31:31');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks_tbl`
--

CREATE TABLE `feedbacks_tbl` (
  `fb_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `fb_exmne_as` varchar(1000) NOT NULL,
  `fb_feedbacks` varchar(1000) NOT NULL,
  `fb_date` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacks_tbl`
--

INSERT INTO `feedbacks_tbl` (`fb_id`, `stu_id`, `fb_exmne_as`, `fb_feedbacks`, `fb_date`) VALUES
(5, 6, 'Anonymous', 'Lageh, idol na nako!', 'December 05, 2019'),
(11, 10, 'Grace Ybanez Fantonial', 'Hahahahahahahahahahahahahahah', 'September 14, 2021'),
(12, 10, 'Grace Ybanez Fantonial', 'i layk it bahalag naay bug', 'September 15, 2021'),
(13, 28, 'Hannah Dela Cerna  Epe', 'shout out ko Arvin arnoco', 'September 22, 2021'),
(14, 48, 'Karen Hiyoca', 'hahahahha', 'October 11, 2021'),
(15, 20215650, 'Guada Mae Cuadera Noval', 'hahahahhaah shoutout', 'October 19, 2021'),
(16, 20214255, 'Grace Fantonial', 'dadada', 'October 20, 2021'),
(17, 20215181, 'Grace Ybanez Fantonial', 'lorem ipsum', 'November 05, 2021');

-- --------------------------------------------------------

--
-- Table structure for table `lessonfile`
--

CREATE TABLE `lessonfile` (
  `lid` int(11) NOT NULL,
  `less_id` int(11) NOT NULL,
  `cou_id` int(11) NOT NULL,
  `uploadfile` varchar(5000) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lessonfile`
--

INSERT INTO `lessonfile` (`lid`, `less_id`, `cou_id`, `uploadfile`, `date_added`) VALUES
(734, 176, 26, 'price (2).png', '2021-11-25 04:42:06'),
(735, 176, 26, 'price (3).png', '2021-11-25 04:42:06'),
(736, 176, 26, 'price (4).png', '2021-11-25 04:42:06'),
(737, 176, 26, 'hiyoca .jpg', '2021-12-06 10:14:21'),
(738, 500, 26, 'p', '2021-12-06 09:31:24'),
(739, 500, 26, 'p', '2021-12-06 09:31:24'),
(740, 500, 26, 'p', '2021-12-06 09:31:24'),
(741, 500, 26, 'hannah.jpg', '2021-12-06 10:18:09'),
(742, 356, 26, 'palahubog.jpg', '2021-12-06 08:52:05'),
(743, 970, 26, '36-367136_png-file-svg-transparent-notification-bell-png-download.png', '2021-12-06 10:19:42'),
(744, 970, 26, '522-5227787_finance-clipart-peso-money-philippine-peso-sign-icon.png', '2021-12-06 10:19:42'),
(745, 970, 26, 'wrong icon button.png', '2021-12-06 10:23:43');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `less_id` int(11) NOT NULL,
  `cou_id` int(11) NOT NULL,
  `lec_title` varchar(1000) NOT NULL,
  `lesson_desc` varchar(1000) NOT NULL,
  `lesson_link` varchar(1000) NOT NULL,
  `uploadfile` varchar(1000) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`less_id`, `cou_id`, `lec_title`, `lesson_desc`, `lesson_link`, `uploadfile`, `date_added`) VALUES
(176, 26, 'Finding Hiyoca', 'sample', '', '', '2021-11-25 04:42:06'),
(356, 26, 'Asa Si ph cares', 'sdadaqa', '', '', '2021-11-25 06:12:17'),
(500, 26, 'Sample ML', 'hahdhahadad', '', '', '2021-11-25 06:15:59'),
(800, 26, 'apple pen', 'awew', '', '', '2021-12-12 10:31:18'),
(970, 26, 'Tokyo Drift', 'sample', '', '', '2021-12-06 10:19:42');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_url`
--

CREATE TABLE `lesson_url` (
  `url_id` int(11) NOT NULL,
  `less_id` int(11) NOT NULL,
  `lesson_link` varchar(250) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lesson_url`
--

INSERT INTO `lesson_url` (`url_id`, `less_id`, `lesson_link`, `date_created`) VALUES
(26, 176, 'https://www.youtube.com/embed/1SvsbcWg-u0', '2021-11-25 04:42:06'),
(27, 176, 'https://www.youtube.com/embed/dTL4xfoP-Yk', '2021-11-25 04:42:06'),
(28, 176, 'https://www.youtube.com/embed/KW1EWn5RB88', '2021-11-25 04:42:06'),
(29, 176, 'https://www.youtube.com/embed/_3Q0qUMy_1c', '2021-11-25 04:42:06'),
(30, 356, 'https://www.youtube.com/embed/kXptPzKNMq4', '2021-11-25 06:12:17'),
(31, 356, 'https://www.youtube.com/embed/GgoEq_FnHYg', '2021-11-25 06:12:17'),
(32, 356, 'https://www.youtube.com/embed/R2o6m_fCKGQ', '2021-11-25 06:12:17'),
(33, 356, 'https://www.youtube.com/embed/bHEmC76yA-Q', '2021-11-25 06:12:17'),
(34, 500, 'https://www.youtube.com/embed/uDJP2PtzCns', '2021-11-25 06:15:59'),
(35, 500, 'https://www.youtube.com/embed/_3Q0qUMy_1c', '2021-11-25 06:15:59'),
(36, 500, 'https://www.youtube.com/embed/GgoEq_FnHYg', '2021-11-25 06:15:59'),
(37, 500, 'https://www.youtube.com/embed/bHEmC76yA-Q', '2021-11-25 06:15:59'),
(38, 970, 'https://www.youtube.com/embed/9EIU9KfEeKQ', '2021-12-06 10:19:42'),
(39, 970, 'https://www.youtube.com/embed/1SvsbcWg-u0', '2021-12-06 10:19:42'),
(40, 800, 'https://www.youtube.com/watch?v=_3Q0qUMy_1c', '2021-12-12 10:31:18'),
(41, 800, 'https://www.youtube.com/embed/kXptPzKNMq4', '2021-12-12 10:31:18');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_vid`
--

CREATE TABLE `lesson_vid` (
  `vid` int(11) NOT NULL,
  `less_id` int(11) NOT NULL,
  `video_name` varchar(500) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `req_id` int(10) NOT NULL,
  `ex_id` int(10) NOT NULL,
  `examat_id` int(10) NOT NULL,
  `exam_name` varchar(1000) NOT NULL,
  `stu_id` int(10) NOT NULL,
  `student_fullname` varchar(1000) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `year_level` varchar(50) NOT NULL,
  `messagerequest` varchar(1000) NOT NULL,
  `rstat` varchar(100) NOT NULL,
  `date_requested` datetime NOT NULL,
  `date_approved` datetime NOT NULL,
  `remarks` varchar(1000) NOT NULL,
  `approve_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`req_id`, `ex_id`, `examat_id`, `exam_name`, `stu_id`, `student_fullname`, `course_name`, `year_level`, `messagerequest`, `rstat`, `date_requested`, `date_approved`, `remarks`, `approve_name`) VALUES
(47, 29, 180, 'Chapter 99999 Asa Si PH Care', 20219534, 'Guinevere Gusions', 'BSIT', '4', ' Hi im Guinevere Gusions + message of yours ', 'APPROVE', '2021-11-02 00:00:00', '2021-11-02 09:41:58', '  Enter message here', 'admin Alucards'),
(48, 56, 176, 'SAMPLE13', 20219534, 'Guinevere Gusions', 'BSIT', '4', ' Hi im Guinevere Gusions + message of yours ', 'APPROVE', '2021-11-02 00:00:00', '2021-11-08 02:44:30', '  Enter message here', 'admin Alucards'),
(49, 33, 174, 'Grace Fantonial', 20215181, 'Grace Ybanez Fantonial', 'BSIT', '4', ' Hi im Grace Ybanez Fantonial + message of yours ', 'DENIED', '2021-11-08 00:00:00', '2021-11-08 02:41:49', '  Enter message here', 'admin Alucards'),
(50, 33, 174, 'Grace Fantonial', 20215181, 'Grace Ybanez Fantonial', 'BSIT', '4', ' Hi im Grace Ybanez Fantonial + message of yours ', 'APPROVE', '2021-11-08 02:59:16', '2021-11-08 03:01:50', '  Enter message here', 'admin Alucards');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stu_id` int(11) NOT NULL,
  `stu_fullname` varchar(1000) NOT NULL,
  `stu_photo` varchar(50) NOT NULL,
  `stu_course` varchar(1000) NOT NULL,
  `stu_gender` varchar(1000) NOT NULL,
  `stu_birthdate` varchar(1000) NOT NULL,
  `stu_age` int(3) NOT NULL,
  `stu_comadd` varchar(1000) NOT NULL,
  `stu_muni` varchar(1000) NOT NULL,
  `stu_year_level` varchar(1000) NOT NULL,
  `stu_email` varchar(1000) NOT NULL,
  `stu_password` varchar(1000) NOT NULL,
  `stu_parent` varchar(100) NOT NULL,
  `parent_phone` int(50) NOT NULL,
  `parent_email` varchar(250) NOT NULL,
  `parent_address` varchar(250) NOT NULL,
  `stu_elem` varchar(100) NOT NULL,
  `stu_jhs` varchar(100) NOT NULL,
  `stu_shs` varchar(100) NOT NULL,
  `stu_stat` varchar(1000) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_approved` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stu_id`, `stu_fullname`, `stu_photo`, `stu_course`, `stu_gender`, `stu_birthdate`, `stu_age`, `stu_comadd`, `stu_muni`, `stu_year_level`, `stu_email`, `stu_password`, `stu_parent`, `parent_phone`, `parent_email`, `parent_address`, `stu_elem`, `stu_jhs`, `stu_shs`, `stu_stat`, `date_added`, `date_approved`) VALUES
(20211792, 'Mak rov', '', '77', 'female', '1998-12-12', 22, '1296 MJ CUENCO HIPODROMO CC', 'Compostela', '1', 'shiyocz@gmail', 'tot', 'magtot', 21313, 'shiyocz@gmail.com', 'tot', 'no data', 'no data', 'no data', 'ACTIVE', '2021-11-17 11:15:37', '0000-00-00 00:00:00'),
(20212088, 'Yamaha Sniper', '', '77', 'Male', '2015-11-11', 6, 'yamaha premio', 'Daanbantayan', '3', 'yamaha@sniper', '1234', 'yamaha rusi', 911, 'yama@kawa', 'premio', 'no data', 'no data', 'no data', 'ACTIVE', '2021-11-22 10:22:42', '2021-11-25 06:39:11'),
(20212638, 'Jan Wick', 'meme.jpg', '72', 'male', '2002-01-01', 19, 'dw', 'Consolacion', '2', 'sample@gmail.com', '12345', 'wala', 23, 'wal@a.ph', 'wala', 'sample3 ', 'saple 4', 'sapmoea', 'ACTIVE', '2021-11-18 02:51:43', '2021-11-18 02:51:43'),
(20213185, 'Meme Mallen', 'meme.jpg', '74', 'Male', '1911-11-11', 110, '1296 MJ CUENCO HIPODROMO CC', 'Cebu City', '3', 'shiyocz@gmail.com', '1111', 'sa', 123, 'email@add', 'sad', 'no data', 'no data', 'no data', 'ACTIVE', '2021-11-22 10:00:58', '2021-11-25 06:39:24'),
(20214277, 'Cherlyn Mallen Flores', 'srp.png', '77', 'Female', '1992-12-12', 28, 'japan', 'Lapu-Lapu City', '4', 'sample@gg.ph', 'gggg', 'sawa', 92313, 'sample', 'dika', '', '', '', 'ACITVE', '2021-11-17 11:15:37', '0000-00-00 00:00:00'),
(20214370, 'Dokkaebi', 'meme.jpg', '26', 'male', '1992-12-12', 28, '1296 MJ CUENCO HIPODROMO CC', 'Catmon', '1', 'rovelyn1@email', 'sampleqwe', 'sdad', 212321, 'shiyocz@gmail.com', '1296 MJ CUENCO HIPODROMO CC', 'sample', 'sample', 'sample', 'ACTIVE', '2021-11-17 11:15:37', '0000-00-00 00:00:00'),
(20215181, 'Grace Ybanez Fantonial', 'IMG_20190920_173024 (2).jpg', '26', 'female', '1996-10-08', 25, 'Lamintak Norte Medellin Cebu 6012', 'Medellin', '4', 'gfantonial@username', 'grace', 'Rukiya Ruki', 911, '0917 313231', 'Lamintak Norte Medellin', 'Mammbaling', 'wa ko kahibaw', 'wa sad ko kahibaw', 'ACTIVE', '2021-11-17 11:15:37', '2021-12-06 12:21:59'),
(20215262, 'Taguro Rukiya', '18236009_496959667361686_1723196664_o.png', '74', 'male', '1998-10-09', 23, '1296 MJ CUENCO HIPODROMO CC', 'Carmen', '3', 'emai@gg.ph', 'gfantonial', 'Cyanigen Mod', 2313, 'shiyocz@gmail.com', '1296 MJ CUENCO HIPODROMO CC', 'Malbago Es', 'Buanoy HS', 'UC Pri', 'ACTIVE', '2021-11-17 11:15:37', '0000-00-00 00:00:00'),
(20216053, 'Cherlyn Diaz Mallens', '', '26', 'Female', '1992-11-01', 29, '1296 MJ CUENCO HIPODROMO CC', 'Cebu City', '3', 'shiyocz@gmail.com', '2', 'darude', 2131, 'shiyoc2z@gmail.com', 'JAPAN', 'no data', 'no data', 'no data', 'ACTIVE', '2021-12-07 06:03:59', '2021-12-12 08:08:06'),
(20216777, 'Karina Gusion', '', '26', 'female', '2001-12-12', 19, 'amoa', 'Cebu City', 'first year', 'karina@gg', 'gg3', 'Japan Japan', 9121312, 'wala', 'amoa china', '', '', '', 'ACTIVE', '2021-11-17 11:15:37', '0000-00-00 00:00:00'),
(20216825, 'Go Kapa', 'chingch0ng.png', '72', 'Female', '2002-02-12', 19, 'japan japan', 'Medellin', '4', 'wahaha@gg.ru', 'sample', 'wala', 231, 'wala@pd', 'wala', 'no data', 'no data', 'no data', 'ACTIVE', '2021-11-17 11:15:37', '2021-11-17 01:33:18'),
(20217088, 'Willa Mae Hiyoca', 'FB_IMG_1517634893211.jpg', '26', 'female', '1998-11-20', 22, 'la aldea', 'Lapu-Lapu City', '2', 'willa@email', 'willa', 'Nissan Almera', 2147483647, 'shiyocz@gmail.com', '1296 MJ CUENCO HIPODROMO CC', 'no data', 'no data', 'no data', 'ACTIVE', '2021-11-17 11:15:37', '2021-11-18 01:25:37'),
(20217666, 'Japon Melvin', '', '77', 'male', '1992-12-12', 28, '1296 MJ CUENCO HIPODROMO CC', 'Cebu City', '2', 'shiyocz@gmail.com', 'yamaha', 'pit senyor', 12312, 'amoa@gg', 'japan', 'no data', 'no datad', 'no data', 'ACTIVE', '2021-11-17 11:15:37', '0000-00-00 00:00:00'),
(20219408, 'gusion', '', '72', 'male', '1992-12-12', 28, 'POOL', 'Carmen', '2', 'gusion@ml', 'gusion', 'NO DATA GIVEN', 0, 'NO DATA', 'NO DATA GIVEN', 'no data', 'no data', 'no data', 'BLOCK', '2021-11-17 11:15:37', '0000-00-00 00:00:00'),
(20219534, 'Guinevere Gusions', 'FB_IMG_1517634893211.jpg', '26', 'Female', '1992-06-15', 29, 'POOL', 'Lapu-Lapu City', '4', 'dave@gmail.com', 'dave', 'Karina Gusion', 2147483647, 'shiyocz@gmail.com', 'POOL', 'Angela Merkel ES', 'Alamcen Toreddes NHS', 'CNU', 'ACTIVE', '2021-11-17 11:15:37', '2021-11-18 10:08:34'),
(20219828, 'General Waws', 'Capture.PNG', '26', 'male', '1998-12-12', 22, 'sandstorms', 'Samboan', '4', 'sandstorm@gmail.com', 'sadndstorm', 'ses', 2131, 'shiyocz@gmail.com', 'lol', 'no data', 'no data', 'no data', 'ACTIVE', '2021-11-17 11:15:37', '2021-11-18 11:30:49');

-- --------------------------------------------------------

--
-- Table structure for table `studentqr`
--

CREATE TABLE `studentqr` (
  `qid` int(10) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `qr_img` varchar(5000) NOT NULL,
  `date_generated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentqr`
--

INSERT INTO `studentqr` (`qid`, `stu_id`, `qr_img`, `date_generated`) VALUES
(14, 20215181, 'Grace Ybanez Fantonial.png', '2021-11-18 01:02:07'),
(15, 20217088, 'Willa Mae Hiyoca.png', '2021-11-18 01:25:37'),
(16, 20212638, 'Jan Wick.png', '2021-11-18 02:51:43'),
(17, 20219534, 'Guinevere Gusions.png', '2021-11-18 10:08:34'),
(19, 20215262, 'Taguro Rukiya.png', '2021-11-19 08:27:32'),
(21, 20212088, 'Yamaha Sniper.png', '2021-11-22 10:22:42'),
(22, 20213185, 'Meme Mallen.png', '2021-11-25 06:39:24'),
(24, 20216053, 'Cherlyn Diaz Mallens.png', '2021-12-07 06:03:59');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `stu_id` int(11) NOT NULL,
  `parent_name` varchar(100) NOT NULL,
  `contact_no` int(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`stu_id`, `parent_name`, `contact_no`, `email`, `adress`) VALUES
(20219534, 'Karina Gusion', 2147483647, 'shiyocz@gmail.com', '1296 MJ CUENCO HIPODROMO CC'),
(20215181, 'Rukiya Ruki', 911, 'na', 'Lamintak Norte Medellin');

-- --------------------------------------------------------

--
-- Table structure for table `student_voucher`
--

CREATE TABLE `student_voucher` (
  `vou_code` varchar(20) NOT NULL,
  `vou_stat` varchar(22) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `vou_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_voucher`
--

INSERT INTO `student_voucher` (`vou_code`, `vou_stat`, `stu_id`, `vou_created`) VALUES
('STU-A09MA', 'used', 20214277, '0000-00-00 00:00:00'),
('STU-I5L3R', 'unused', 0, '2021-11-08 01:34:53'),
('STU-3DA27', 'unused', 0, '2021-11-29 09:20:26');

-- --------------------------------------------------------

--
-- Table structure for table `stu_municipality`
--

CREATE TABLE `stu_municipality` (
  `name` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stu_municipality`
--

INSERT INTO `stu_municipality` (`name`) VALUES
('Alcantara'),
('Alcoy'),
('Alegria'),
('Aloginsan'),
('Argao'),
('Asturias'),
('Badian'),
('Balamban'),
('Bantayan'),
('Barili'),
('Bogo City'),
('Boljoon'),
('Borbon'),
('Carcar City'),
('Carmen'),
('Catmon'),
('Cebu City'),
('Compostela'),
('Consolacion'),
('Cordova'),
('Daanbantayan'),
('Dalaguete'),
('Danao City'),
('Dumanjug'),
('Ginatilan'),
('Lapu-Lapu City'),
('Liloan'),
('Madridejos'),
('Malabuyoc'),
('Mandaue City'),
('Minglanilla'),
('Moalboal'),
('Medellin'),
('Naga City'),
('Oslob'),
('Poro'),
('Ronda'),
('Samboan'),
('San Fernando'),
('San Francisco'),
('San Remigio'),
('Santa Fe'),
('Santander'),
('Sibonga'),
('Sogod'),
('Tabogon'),
('Tabuelan'),
('Talisay City'),
('Tuburan'),
('Toledo City'),
('Tudela'),
('Alcantara'),
('Alcoy'),
('Alegria'),
('Aloginsan'),
('Argao'),
('Asturias'),
('Badian'),
('Balamban'),
('Bantayan'),
('Barili'),
('Bogo City'),
('Boljoon'),
('Borbon'),
('Carcar City'),
('Carmen'),
('Catmon'),
('Cebu City'),
('Compostela'),
('Consolacion'),
('Cordova'),
('Daanbantayan'),
('Dalaguete'),
('Danao City'),
('Dumanjug'),
('Ginatilan'),
('Lapu-Lapu City'),
('Liloan'),
('Madridejos'),
('Malabuyoc'),
('Mandaue City'),
('Minglanilla'),
('Moalboal'),
('Medellin'),
('Naga City'),
('Oslob'),
('Poro'),
('Ronda'),
('Samboan'),
('San Fernando'),
('San Francisco'),
('San Remigio'),
('Santa Fe'),
('Santander'),
('Sibonga'),
('Sogod'),
('Tabogon'),
('Tabuelan'),
('Talisay City'),
('Tuburan'),
('Toledo City'),
('Tudela');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_acc`
--
ALTER TABLE `admin_acc`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`aid`,`admin_id`),
  ADD KEY `syncadmindata` (`admin_id`);

--
-- Indexes for table `course_tbl`
--
ALTER TABLE `course_tbl`
  ADD PRIMARY KEY (`cou_id`);

--
-- Indexes for table `exam_answers`
--
ALTER TABLE `exam_answers`
  ADD PRIMARY KEY (`exans_id`),
  ADD KEY `deletestuanswers` (`stu_id`);

--
-- Indexes for table `exam_attempt`
--
ALTER TABLE `exam_attempt`
  ADD PRIMARY KEY (`examat_id`),
  ADD KEY `deletestudata` (`stu_id`);

--
-- Indexes for table `exam_question_tbl`
--
ALTER TABLE `exam_question_tbl`
  ADD PRIMARY KEY (`eqt_id`);

--
-- Indexes for table `exam_result`
--
ALTER TABLE `exam_result`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `deleteresultdata` (`stu_id`);

--
-- Indexes for table `exam_tbl`
--
ALTER TABLE `exam_tbl`
  ADD PRIMARY KEY (`ex_id`),
  ADD KEY `synccourse` (`cou_id`);

--
-- Indexes for table `feedbacks_tbl`
--
ALTER TABLE `feedbacks_tbl`
  ADD PRIMARY KEY (`fb_id`);

--
-- Indexes for table `lessonfile`
--
ALTER TABLE `lessonfile`
  ADD PRIMARY KEY (`lid`),
  ADD KEY `sync_lesson` (`less_id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`less_id`),
  ADD KEY `syncwithcourse` (`cou_id`);

--
-- Indexes for table `lesson_url`
--
ALTER TABLE `lesson_url`
  ADD PRIMARY KEY (`url_id`),
  ADD KEY `synclesson` (`less_id`);

--
-- Indexes for table `lesson_vid`
--
ALTER TABLE `lesson_vid`
  ADD PRIMARY KEY (`vid`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`req_id`),
  ADD KEY `syncstudent` (`stu_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `studentqr`
--
ALTER TABLE `studentqr`
  ADD PRIMARY KEY (`qid`),
  ADD KEY `synclearner` (`stu_id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD KEY `syncstud` (`stu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_acc`
--
ALTER TABLE `admin_acc`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `aid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `course_tbl`
--
ALTER TABLE `course_tbl`
  MODIFY `cou_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `exam_answers`
--
ALTER TABLE `exam_answers`
  MODIFY `exans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=748;

--
-- AUTO_INCREMENT for table `exam_attempt`
--
ALTER TABLE `exam_attempt`
  MODIFY `examat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `exam_question_tbl`
--
ALTER TABLE `exam_question_tbl`
  MODIFY `eqt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `exam_result`
--
ALTER TABLE `exam_result`
  MODIFY `res_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `exam_tbl`
--
ALTER TABLE `exam_tbl`
  MODIFY `ex_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `feedbacks_tbl`
--
ALTER TABLE `feedbacks_tbl`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `lessonfile`
--
ALTER TABLE `lessonfile`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=746;

--
-- AUTO_INCREMENT for table `lesson_url`
--
ALTER TABLE `lesson_url`
  MODIFY `url_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `lesson_vid`
--
ALTER TABLE `lesson_vid`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `req_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `studentqr`
--
ALTER TABLE `studentqr`
  MODIFY `qid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `syncadmindata` FOREIGN KEY (`admin_id`) REFERENCES `admin_acc` (`admin_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `exam_answers`
--
ALTER TABLE `exam_answers`
  ADD CONSTRAINT `deletestuanswers` FOREIGN KEY (`stu_id`) REFERENCES `student` (`stu_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `exam_attempt`
--
ALTER TABLE `exam_attempt`
  ADD CONSTRAINT `deletestudata` FOREIGN KEY (`stu_id`) REFERENCES `student` (`stu_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `exam_result`
--
ALTER TABLE `exam_result`
  ADD CONSTRAINT `deleteresultdata` FOREIGN KEY (`stu_id`) REFERENCES `student` (`stu_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `exam_tbl`
--
ALTER TABLE `exam_tbl`
  ADD CONSTRAINT `synccourse` FOREIGN KEY (`cou_id`) REFERENCES `course_tbl` (`cou_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `lessonfile`
--
ALTER TABLE `lessonfile`
  ADD CONSTRAINT `sync_lesson` FOREIGN KEY (`less_id`) REFERENCES `lessons` (`less_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lesson_url`
--
ALTER TABLE `lesson_url`
  ADD CONSTRAINT `synclesson` FOREIGN KEY (`less_id`) REFERENCES `lessons` (`less_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `syncstudent` FOREIGN KEY (`stu_id`) REFERENCES `student` (`stu_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `studentqr`
--
ALTER TABLE `studentqr`
  ADD CONSTRAINT `synclearner` FOREIGN KEY (`stu_id`) REFERENCES `student` (`stu_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `student_info`
--
ALTER TABLE `student_info`
  ADD CONSTRAINT `syncstud` FOREIGN KEY (`stu_id`) REFERENCES `student` (`stu_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
