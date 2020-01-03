-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 03, 2020 at 10:14 PM
-- Server version: 8.0.18-0ubuntu0.19.10.1
-- PHP Version: 7.3.11-0ubuntu0.19.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rconnect`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `message_id` int(50) NOT NULL,
  `to_user_id` int(50) NOT NULL,
  `from_user_id` int(50) NOT NULL,
  `chat_message` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `msg_time` varchar(255) DEFAULT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`message_id`, `to_user_id`, `from_user_id`, `chat_message`, `msg_time`, `status`) VALUES
(1, 17, 18, 'hello', '2020-01-02 22:58:29', 0),
(2, 18, 17, 'hi', '2020-01-02 22:58:34', 0),
(3, 17, 18, 'bye', '2020-01-02 22:58:37', 0),
(4, 8, 14, 'tum chitye hu', '2020-01-03 14:46:31', 0),
(5, 14, 8, 'm gandu hu', '2020-01-03 14:46:36', 0),
(6, 8, 14, 'ha pta h', '2020-01-03 14:46:42', 0),
(7, 14, 8, 'to m kya lru?', '2020-01-03 14:46:45', 0),
(8, 17, 12, 'Ar kaise ho bhai?', '2020-01-03 18:07:02', 0),
(9, 12, 17, 'badhia tu bta bsdk', '2020-01-03 18:07:11', 0),
(10, 17, 12, 'gaali nai!!!!', '2020-01-03 18:07:15', 0),
(11, 12, 17, 'bhg mc!', '2020-01-03 18:07:19', 0),
(12, 8, 14, 'hello bro!', '2020-01-03 18:38:35', 0),
(13, 14, 8, 'hiiii', '2020-01-03 18:38:40', 0),
(14, 8, 14, 'tum gandu ho', '2020-01-03 21:58:02', 0),
(15, 14, 8, 'ha to?!', '2020-01-03 21:58:05', 0),
(16, 8, 14, 'I ain\'t sure abt it!', '2020-01-03 21:58:09', 0),
(17, 14, 8, 'Fck off u asshole!', '2020-01-03 21:58:18', 0),
(18, 8, 14, 'Cool!', '2020-01-03 21:58:23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `followerData`
--

CREATE TABLE `followerData` (
  `Sr. No.` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `followerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `followerData`
--

INSERT INTO `followerData` (`Sr. No.`, `userID`, `followerID`) VALUES
(2, 14, 8),
(4, 8, 14),
(6, 8, 15),
(8, 16, 12),
(9, 14, 12),
(12, 13, 14),
(16, 13, 8),
(20, 26, 19),
(21, 8, 19),
(22, 27, 17),
(23, 8, 27),
(24, 12, 27),
(25, 14, 27),
(26, 15, 27),
(27, 17, 27),
(28, 22, 27),
(29, 21, 27),
(30, 27, 12),
(31, 18, 17),
(32, 27, 15),
(33, 14, 15),
(35, 15, 17),
(39, 23, 14),
(44, 17, 18),
(45, 23, 18),
(46, 8, 28),
(52, 29, 8),
(53, 8, 30),
(54, 22, 30),
(55, 21, 30),
(57, 8, 31),
(58, 17, 31),
(59, 27, 31),
(60, 12, 31),
(61, 14, 31),
(62, 24, 31),
(63, 31, 17),
(64, 20, 14),
(67, 26, 14),
(68, 31, 14),
(82, 17, 8),
(85, 8, 17),
(88, 24, 14),
(92, 12, 14),
(93, 27, 14),
(95, 18, 14),
(96, 19, 17),
(97, 17, 19),
(100, 14, 17),
(101, 17, 14),
(112, 17, 30),
(114, 30, 17),
(115, 12, 17),
(116, 17, 12);

-- --------------------------------------------------------

--
-- Table structure for table `goalData`
--

CREATE TABLE `goalData` (
  `Sr. No.` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `goal_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `goalData`
--

INSERT INTO `goalData` (`Sr. No.`, `userID`, `goal_ID`) VALUES
(3, 14, 2),
(10, 26, 5),
(13, 12, 3),
(14, 12, 5),
(15, 12, 4),
(17, 8, 2),
(19, 17, 5),
(20, 15, 5),
(26, 14, 4),
(31, 30, 2),
(32, 30, 1),
(35, 51, 3),
(38, 17, 2);

-- --------------------------------------------------------

--
-- Table structure for table `hobbieData`
--

CREATE TABLE `hobbieData` (
  `Sr. No.` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `hobbie_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hobbieData`
--

INSERT INTO `hobbieData` (`Sr. No.`, `userID`, `hobbie_ID`) VALUES
(3, 14, 5),
(10, 26, 3),
(11, 26, 5),
(12, 26, 6),
(14, 12, 5),
(15, 12, 6),
(16, 12, 1),
(19, 27, 5),
(22, 17, 6),
(24, 15, 4),
(25, 14, 6),
(35, 30, 5),
(36, 30, 2),
(38, 30, 1),
(41, 17, 5),
(42, 51, 3),
(45, 8, 5),
(46, 8, 4),
(47, 8, 6),
(48, 14, 4),
(49, 17, 3),
(50, 18, 6),
(51, 18, 3);

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(50) NOT NULL,
  `userID` int(50) NOT NULL,
  `last_activity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `userID`, `last_activity`) VALUES
(1, 14, '2020-01-03 22:04:28'),
(2, 8, '2020-01-03 22:01:50'),
(3, 17, '2020-01-03 22:04:27'),
(4, 18, '2020-01-02 23:14:10'),
(5, 12, '2020-01-03 18:35:56'),
(6, 27, '2019-12-26 06:29:35'),
(7, 19, '2019-12-26 21:59:09'),
(8, 33, '2019-12-27 01:31:29'),
(9, 48, '2019-12-27 02:47:04'),
(10, 16, '2019-12-28 16:30:05'),
(11, 55, '2020-01-01 20:05:34'),
(12, 30, '2020-01-02 19:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `notificationData`
--

CREATE TABLE `notificationData` (
  `notif_id` int(11) NOT NULL,
  `typeOf` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `to_userID` int(11) NOT NULL,
  `from_userID` int(11) NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `notif_time` varchar(255) DEFAULT NULL,
  `seen_status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `notificationData`
--

INSERT INTO `notificationData` (`notif_id`, `typeOf`, `to_userID`, `from_userID`, `message`, `notif_time`, `seen_status`) VALUES
(19, 'msg_post', 16, 12, 'iron shared a message recently!', NULL, 0),
(23, 'msg_post', 16, 8, 'anant_insane shared a message recently!', NULL, 0),
(29, 'msg_post', 16, 8, 'anant_insane shared a message recently!', NULL, 0),
(34, 'follow_request', 26, 19, 'sarv started following you! Follow Back?', NULL, 0),
(43, 'follow_request', 22, 27, 'akshi;) started following you! Follow Back?', NULL, 0),
(44, 'follow_request', 21, 27, 'akshi;) started following you! Follow Back?', NULL, 0),
(52, 'follow_request', 15, 17, 'ary started following you! Follow Back?', NULL, 0),
(57, 'msg_post', 15, 14, 'ayu shared a message recently!', NULL, 0),
(62, 'msg_post', 15, 14, 'ayu shared a message recently!', NULL, 0),
(79, 'follow_request', 21, 29, 'arya started following you! Follow Back?', NULL, 0),
(80, 'follow_request', 22, 29, 'arya started following you! Follow Back?', NULL, 0),
(84, 'follow_request', 22, 30, 'arya started following you! Follow Back?', NULL, 0),
(85, 'follow_request', 21, 30, 'arya started following you! Follow Back?', NULL, 0),
(93, 'follow_request', 24, 31, 'ananya_ags started following you! Follow Back?', NULL, 0),
(95, 'follow_request', 20, 14, 'ayu started following you! Follow Back?', NULL, 0),
(96, 'follow_request', 21, 14, 'ayu started following you! Follow Back?', NULL, 0),
(100, 'msg_post', 15, 14, 'ayu shared a message recently!', NULL, 0),
(101, 'msg_post', 31, 14, 'ayu shared a message recently!', NULL, 0),
(102, 'accepted_request', 31, 8, 'anant_insane followed you back!', NULL, 0),
(103, 'follow_request', 26, 14, 'ayu started following you! Follow Back?', NULL, 0),
(104, 'accepted_request', 31, 14, 'ayu followed you back!', NULL, 0),
(105, 'follow_request', 19, 14, 'ayu started following you! Follow Back?', NULL, 0),
(110, 'accepted_request', 15, 14, 'ayu followed you back!', NULL, 0),
(111, 'follow_request', 22, 14, 'ayu started following you! Follow Back?', NULL, 0),
(115, 'msg_post', 15, 14, 'ayu shared a message recently!', NULL, 0),
(116, 'msg_post', 31, 14, 'ayu shared a message recently!', NULL, 0),
(118, 'msg_post', 16, 8, 'anant_insane shared a message recently!', NULL, 0),
(119, 'msg_post', 15, 8, 'anant_insane shared a message recently!', NULL, 0),
(120, 'msg_post', 19, 8, 'anant_insane shared a message recently!', NULL, 0),
(122, 'msg_post', 28, 8, 'anant_insane shared a message recently!', NULL, 0),
(124, 'msg_post', 31, 8, 'anant_insane shared a message recently!', NULL, 0),
(128, 'msg_post', 15, 14, 'ayu shared a message recently!', NULL, 0),
(129, 'msg_post', 31, 14, 'ayu shared a message recently!', NULL, 0),
(133, 'msg_post', 15, 14, 'ayu shared a message recently!', NULL, 0),
(134, 'msg_post', 31, 14, 'ayu shared a message recently!', NULL, 0),
(136, 'msg_post', 16, 8, 'anant_insane shared a message recently!', NULL, 0),
(137, 'msg_post', 15, 8, 'anant_insane shared a message recently!', NULL, 0),
(138, 'msg_post', 19, 8, 'anant_insane shared a message recently!', NULL, 0),
(140, 'msg_post', 28, 8, 'anant_insane shared a message recently!', NULL, 0),
(142, 'msg_post', 31, 8, 'anant_insane shared a message recently!', NULL, 0),
(147, 'msg_post', 16, 8, 'anant_insane shared a message recently!', NULL, 0),
(148, 'msg_post', 15, 8, 'anant_insane shared a message recently!', NULL, 0),
(149, 'msg_post', 19, 8, 'anant_insane shared a message recently!', NULL, 0),
(151, 'msg_post', 28, 8, 'anant_insane shared a message recently!', NULL, 0),
(153, 'msg_post', 31, 8, 'anant_insane shared a message recently!', NULL, 0),
(158, 'msg_post', 15, 14, 'ayu shared a message recently!', NULL, 0),
(159, 'msg_post', 31, 14, 'ayu shared a message recently!', NULL, 0),
(160, 'follow_request', 32, 17, 'ary started following you! Follow Back?', NULL, 0),
(164, 'msg_post', 15, 14, 'ayu shared a message recently!', NULL, 0),
(165, 'msg_post', 31, 14, 'ayu shared a message recently!', NULL, 0),
(166, 'accepted_request', 15, 14, 'ayu followed you back!', NULL, 0),
(168, 'msg_post', 16, 8, 'anant_insane shared a message recently!', NULL, 0),
(169, 'msg_post', 15, 8, 'anant_insane shared a message recently!', NULL, 0),
(170, 'msg_post', 19, 8, 'anant_insane shared a message recently!', NULL, 0),
(172, 'msg_post', 28, 8, 'anant_insane shared a message recently!', NULL, 0),
(174, 'msg_post', 31, 8, 'anant_insane shared a message recently!', NULL, 0),
(176, 'msg_post', 16, 8, 'anant_insane shared a message recently!', NULL, 0),
(177, 'msg_post', 15, 8, 'anant_insane shared a message recently!', NULL, 0),
(178, 'msg_post', 19, 8, 'anant_insane shared a message recently!', NULL, 0),
(180, 'msg_post', 28, 8, 'anant_insane shared a message recently!', NULL, 0),
(182, 'msg_post', 31, 8, 'anant_insane shared a message recently!', NULL, 0),
(186, 'msg_post', 15, 14, 'ayu shared a message recently!', NULL, 0),
(187, 'msg_post', 31, 14, 'ayu shared a message recently!', NULL, 0),
(193, 'msg_post', 16, 8, 'anant_insane shared a message recently!', NULL, 0),
(194, 'msg_post', 15, 8, 'anant_insane shared a message recently!', NULL, 0),
(195, 'msg_post', 19, 8, 'anant_insane shared a message recently!', NULL, 0),
(197, 'msg_post', 28, 8, 'anant_insane shared a message recently!', NULL, 0),
(199, 'msg_post', 31, 8, 'anant_insane shared a message recently!', NULL, 0),
(204, 'msg_post', 15, 14, 'ayu shared a message recently!', NULL, 0),
(205, 'msg_post', 31, 14, 'ayu shared a message recently!', NULL, 0),
(206, 'follow_request', 19, 14, 'ayu started following you! Follow Back?', NULL, 0),
(208, 'follow_request', 24, 14, 'ayu started following you! Follow Back?', NULL, 0),
(216, 'msg_post', 31, 17, 'ary shared a message recently!', NULL, 0),
(220, 'follow_request', 19, 17, 'ary started following you! Follow Back?', NULL, 0),
(224, 'msg_post', 27, 14, 'ayu shared a message recently!', NULL, 0),
(225, 'msg_post', 15, 14, 'ayu shared a message recently!', NULL, 0),
(226, 'msg_post', 31, 14, 'ayu shared a message recently!', NULL, 0),
(227, 'follow_request', 24, 17, 'ary started following you! Follow Back?', NULL, 0),
(232, 'msg_post', 27, 14, 'ayu shared a message recently!', NULL, 0),
(233, 'msg_post', 15, 14, 'ayu shared a message recently!', NULL, 0),
(234, 'msg_post', 31, 14, 'ayu shared a message recently!', NULL, 0),
(237, 'msg_post', 27, 17, 'ary shared a message recently!', NULL, 0),
(239, 'msg_post', 31, 17, 'ary shared a message recently!', NULL, 0),
(241, 'msg_post', 19, 17, 'ary shared a message recently!', NULL, 0),
(245, 'msg_post', 27, 14, 'ayu shared a message recently!', NULL, 0),
(246, 'msg_post', 15, 14, 'ayu shared a message recently!', NULL, 0),
(247, 'msg_post', 31, 14, 'ayu shared a message recently!', NULL, 0),
(251, 'msg_post', 27, 14, 'ayu shared a message recently!', NULL, 0),
(252, 'msg_post', 15, 14, 'ayu shared a message recently!', NULL, 0),
(253, 'msg_post', 31, 14, 'ayu shared a message recently!', NULL, 0),
(257, 'msg_post', 27, 14, 'ayu shared a message recently!', NULL, 0),
(258, 'msg_post', 15, 14, 'ayu shared a message recently!', NULL, 0),
(259, 'msg_post', 31, 14, 'ayu shared a message recently!', NULL, 0),
(261, 'msg_post', 27, 17, 'ary shared a message recently!', NULL, 0),
(263, 'msg_post', 31, 17, 'ary shared a message recently!', NULL, 0),
(265, 'msg_post', 19, 17, 'ary shared a message recently!', NULL, 0),
(267, 'msg_post', 27, 17, 'ary shared a message recently!', NULL, 0),
(269, 'msg_post', 31, 17, 'ary shared a message recently!', NULL, 0),
(271, 'msg_post', 19, 17, 'ary shared a message recently!', NULL, 0),
(273, 'msg_post', 27, 17, 'ary shared a message recently!', NULL, 0),
(275, 'msg_post', 31, 17, 'ary shared a message recently!', NULL, 0),
(277, 'msg_post', 19, 17, 'ary shared a message recently!', NULL, 0),
(294, 'msg_post', 27, 14, 'ayu shared a message recently!', NULL, 0),
(295, 'msg_post', 15, 14, 'ayu shared a message recently!', NULL, 0),
(296, 'msg_post', 31, 14, 'ayu shared a message recently!', NULL, 0),
(298, 'msg_post', 27, 17, 'ary shared a message recently!', NULL, 0),
(300, 'msg_post', 31, 17, 'ary shared a message recently!', NULL, 0),
(302, 'msg_post', 19, 17, 'ary shared a message recently!', NULL, 0),
(304, 'msg_post', 30, 17, 'ary shared a message recently!', NULL, 0),
(305, 'msg_post', 27, 17, 'ary shared a message recently!', NULL, 0),
(306, 'msg_post', 18, 17, 'ary shared a message recently!', NULL, 0),
(307, 'msg_post', 31, 17, 'ary shared a message recently!', NULL, 0),
(309, 'msg_post', 19, 17, 'ary shared a message recently!', NULL, 0),
(310, 'msg_post', 14, 17, 'ary shared a message recently!', NULL, 1),
(311, 'msg_post', 30, 17, 'ary shared a message recently!', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `publicMessageData`
--

CREATE TABLE `publicMessageData` (
  `publicMessageID` int(11) NOT NULL,
  `from_ID` int(11) NOT NULL,
  `audience_id` varchar(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `posting_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `publicMessageData`
--

INSERT INTO `publicMessageData` (`publicMessageID`, `from_ID`, `audience_id`, `message`, `posting_time`) VALUES
(1, 26, '1', 'ar launde, kya haal chaal?!', '2019-12-18 20:17:20'),
(2, 8, '1', 'ar launde, kya haal chaal?!', '2019-12-18 20:18:07'),
(3, 13, '1', 'mera msg mila na tko?!', '2019-12-18 23:35:59'),
(4, 15, '1', 'Ritu raj hu maI!', '2019-12-18 23:36:55'),
(5, 16, '1', 'apun Ayushi ka fake accont hai', '2019-12-18 23:37:34'),
(6, 12, '1', 'Shark', '2019-12-19 00:18:37'),
(7, 8, '1', 'I m infinitY!', '2019-12-19 00:38:46'),
(8, 15, '1', 'Rituraj ke dusra vaar!!!', '2019-12-19 00:54:09'),
(9, 8, '1', 'Hi there! It\'s Anant here', '2019-12-19 00:55:59'),
(10, 15, '1', 'I got your message Anant!', '2019-12-19 00:56:39'),
(11, 19, '1', 'DP dekho re meri 😜', '2019-12-19 01:19:07'),
(12, 17, '1', 'heya people', '2019-12-20 00:35:39'),
(13, 14, '1', 'Ar sb badhiya bhai log?!', '2019-12-20 00:57:33'),
(14, 14, '1', 'This is another message from Ayu!!', '2019-12-20 01:03:28'),
(15, 19, '1', 'apun ko bhi izzat chahiye!!', '2019-12-20 01:20:50'),
(16, 18, '1', 'Hey everyone! I\'m excited!', '2019-12-20 04:20:40'),
(17, 29, '1', 'Heya people! I\'m new here! Wassup?!', '2019-12-20 19:26:32'),
(18, 30, '1', 'Thanks for following my people!', '2019-12-20 20:09:32'),
(19, 14, '1', 'I\'m getting bored!! Any 1 up for Fooseball?!', '2019-12-21 01:19:33'),
(20, 14, '1', 'Test msh!', '2019-12-21 18:33:26'),
(21, 8, '1', 'Tested successfully!', '2019-12-21 18:52:00'),
(22, 14, '1', 'Let\'s see if it appears!', '2019-12-21 19:05:19'),
(23, 14, '1', 'Damn! It did appear', '2019-12-21 19:05:41'),
(24, 8, '1', 'Yes! It did buddy!', '2019-12-21 19:08:31'),
(25, 8, '1', 'I\'m going to ABN ground! wanna join?!', '2019-12-21 19:37:00'),
(26, 14, '1', 'Yeah bro! I\'m in!', '2019-12-21 19:39:45'),
(27, 14, '1', 'Heya! I\'m going\' to dinner', '2019-12-21 20:54:27'),
(28, 8, '1', 'hey Ayu!', '2019-12-22 18:37:50'),
(29, 8, '1', 'hey again! @ayushi', '2019-12-22 18:39:06'),
(30, 14, '1', 'AYuuuuu', '2019-12-22 18:47:22'),
(31, 8, '1', 'Ayu! I\'m gonna shock ya!', '2019-12-22 18:51:51'),
(32, 14, '1', 'Yeah! I did get your message! Great!', '2019-12-22 18:52:17'),
(33, 17, '1', 'I miss you darling!', '2019-12-23 18:37:24'),
(34, 14, '1', 'ar chutiyo?!', '2019-12-27 03:46:46'),
(35, 14, '1', 'fdgdnhfchg', '2020-01-02 10:51:19'),
(36, 17, '1', 'AB Rockzz!', '2020-01-02 17:41:28'),
(37, 14, '1', 'tum chufiye ho', '2020-01-02 17:42:51'),
(38, 14, '1', 'fbsebkjfq', '2020-01-02 17:44:23'),
(39, 14, '1', 'LSJVRNRD', '2020-01-02 17:45:19'),
(40, 17, '1', 'tum chutiye ho', '2020-01-02 17:52:05'),
(41, 17, '1', 'ayu bekar h', '2020-01-02 17:58:40'),
(42, 17, '1', 'boht zyada bekar but still she\'s cute!', '2020-01-02 17:58:57'),
(43, 14, '1', 'I am AYu!', '2020-01-02 21:50:45'),
(44, 17, '1', 'ankita yaha pr h', '2020-01-02 22:56:16'),
(45, 17, '1', 'I\'m with Mrinal!', '2020-01-03 18:03:42');

-- --------------------------------------------------------

--
-- Table structure for table `userData`
--

CREATE TABLE `userData` (
  `userID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `enrl` varchar(50) NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `bio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `branch_y` varchar(50) DEFAULT NULL,
  `bhawan` varchar(50) NOT NULL,
  `follow_count` int(11) DEFAULT NULL,
  `rwd_pts` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `userData`
--

INSERT INTO `userData` (`userID`, `name`, `username`, `email`, `password`, `enrl`, `img`, `bio`, `branch_y`, `bhawan`, `follow_count`, `rwd_pts`) VALUES
(8, 'Anant', 'anant_insane', 'anant_i@ch.iitr.ac.in', '$2y$10$SdTCZp7flEmc0N0wYqbemuPe/Dv96ZUmrA101ajUcohY3WjUMOH9K', '19112011', '8.jpeg', ' I\'m infinity!', 'CH - 1st yr', 'Radhakrishnan Bhawan', 8, 0),
(12, 'iron_shark', 'iron', 'aryamanbehera@gmail.co.in', '$2y$10$I53Z7T8J0yiCATBDs7p8DOJif4og71SxknT.d4rOIlZrggczMKJti', '123', '12.jpg', 'I\'m iron', 'CH - 1st yr', 'Rajeev Bhawan', 4, 0),
(14, 'Ayushi', 'ayu', 'ayushi@gmail.co.in', '$2y$10$AyTUKgSU/s1FDHvXQXrW2ukAFXWkU3MqjFWZhFdXtZlByNR0Kcm7G', '19120900', '14.jpg', 'I\'m Ayushi.', 'CH - 1st year', 'Sarojini Bhawan', 6, 0),
(15, 'Rituraj', 'ritu', 'rituraj@gmail.com', '$2y$10$cxvOh9NBafJXD1hQ9vjWw.dA5R2UNk5V/Nau1PJDPijSVyyt5r3am', '19112065', NULL, 'm ritu hu!', 'CH - 1st yr', 'Rajeev Bhawan', 1, 0),
(17, 'Arya_man', 'ary', 'ablive@iitr.ac.in', '$2y$10$Eh8RyNRFs9gyp95N2qpI/eXHmLSDiuWaae51ulAvZJwacHj9Wibyq', '19112020', '17.jpeg', 'Iron_man!', 'CH - 1st yr', 'Rajendra Bhawan', 8, 0),
(18, 'Ankita Pareek', 'ankita', 'ankitapareek2000@gmail.com', '$2y$10$NBDTkoz4YzwtpjYomRAoNunyuYaWcPR7ljmQBUxTu8j9Up/WGkQf2', '12345678', NULL, 'Hey! I am Ankita Pareek', 'CH - 1st yr', 'Sarojini Bhawan', 2, 0),
(19, 'Sarvesh', 'sarv', 'sarvraut56@rediffmail.com', '$2y$10$qLQY5AVj7D11vLMNX.0c0ebiuqqH6JI16psOHckyW8cB2QTwB2.6q', '19112013', '19.jpg', 'hey! I\'m Sarvesh', 'CH - 1st yr', 'Kasturba Bhawan', 1, 0),
(20, 'Sagar', 'Sagar_gupta', 'sagarkumargupta8@gmail.com', '$2y$10$iyZUcDUWEjXNns9lhAx4CuVVUVlBa4zb5N/r5jN6W5GhSYrmJO4Ka', '19112069', NULL, 'Hey! I am Sagar', 'CH - 1st yr', 'Rajendra Bhawan', 0, 0),
(21, 'SAKSHAM SAXENA', 'Lallantop', 'saxenasaksham8@gmail.com', '$2y$10$MJioV70fUb2cY5ksG8pSV.qxqJJtMW2eJt77K4NlC4gmQPQkfPDr6', '19410029', NULL, 'Hey! I am SAKSHAM SAXENA', 'CH - 1st yr', 'Rajendra Bhawan', 0, 0),
(22, 'leshna', 'leshna', 'lbalara@gmail.com', '$2y$10$67UA/RR8Rpirsv4A8/h3CuUA0YuEGdK/h4BDt36VRi3DLD51ovSOq', '18114044', NULL, 'Hey! I am leshna', 'CSE - 2nd yr', 'Kasturba Bhawan', 1, 0),
(24, 'Vinyas Pandey', 'bittu.911', 'vinyaspandey1109@gmail.com', '$2y$10$S0wo3ql7gf9xBE.VWmezLe0ttOj1LIwRFbOwz6JdL1eEld1ktuj4a', '19111037', NULL, 'Hey! I am Vinyas Pandey', 'CH - 1st yr', 'Rajendra Bhawan', 1, 0),
(26, 'Saurabh', '100rabh', '100rabh@gmail.com', '$2y$10$5W8ifIKXHR.QUNaaxa3ZO.55S5DNT2fEDr8aGm6rppi1vJVoqzWre', '19112022', '26.jpg', 'S-square', 'CH - 1st yr', 'Sarojini Bhawan', 1, 0),
(27, 'Akshita Agarwal', 'akshi;)', 'akshita_a@ch.iitr.ac.in', '$2y$10$ieW3r1S/ocRslugczlG4x.N08x4kAwhqTtrI.AyOUSKiSOi9YUCQq', '19112009', NULL, 'Hey! I am Akshita Agarwal', 'CH - 1st yr', 'Sarojini Bhawan', 5, 0),
(30, 'Aryaman', 'arya', 'aryaman@woc.com', '$2y$10$KS27Rz0Hl2vUwlfsF/5AjexWaRg2d/4wEGUl9BQ1TlsvJcDy50lQO', '19112020', '30.jpeg', 'Aryaman! The IRON_MAN!', 'CH - 1st yr', 'Rajeev Bhawan', 1, 0),
(31, 'Ananya Agarwal', 'ananya_ags', 'ananya_a@ch.iitr.ac.in', '$2y$10$.PGlbkhQzOyIp9wh69AqvuQWr8znOUE2U3rtoslLNK1aqFKXKhIQK', '19112012', NULL, 'Hey! I am Ananya Agarwal', 'CH - 1st yr', 'Sarojini Bhawan', 0, 0),
(32, 'Akshat garg', 'Akshat', 'akshatgarg01@gmail.com', '$2y$10$pBeLLVt8oSWzSPbvTRfGVufj2D6HObZbcQhm2Wq6zRrXypxL5/b4q', '19112007', NULL, 'Hey! I am Akshat garg', 'CH - 1st yr', 'Rajendra Bhawan', 0, 0),
(48, 'Aryaman Behera', 'waes', 'as@hjop.cpm', '$2y$10$mm4n2F3tq3euT9.9iKHiDuNOnzke.jOC1jFLpaWM2egvbJdC65Erq', '3243r233', NULL, 'Hey! I am Aryaman Behera', 'CH - 1st year', 'Sarojini Bhawan', 0, 0),
(49, 'Aryaman', 'aryya', 'arya@woc.com', '$2y$10$Xx3nVNI43AO48QVdemddfe26mpymsxIwe9pJZB7xw03LaD/BXWD9e', '19112398', NULL, 'Hey! I am Aryaman', 'ME - I', 'Rajendra Bhawan', 0, 0),
(50, 'Ayushi', 'ayu123', 'ayu@wo', '$2y$10$voxlSiJQ8xKQpEYGrHYawefX.LW/V61X79B86181Tk9hyO/Bznd/K', '19112290', NULL, 'Hey! I am Ayushi', 'ME - II', 'Sarojini Bhawan', 0, 0),
(55, 'ary', 'aryan', 'aryagqisuh@jdlwi', '$2y$10$7Jl/60FM/DajMj/zPMI2/.jBEDbJVRG4im2tXfTeiL4KZqVaCBYK.', '12324322', NULL, 'Hey! I am ary', 'Celfk', 'we;f', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `followerData`
--
ALTER TABLE `followerData`
  ADD PRIMARY KEY (`Sr. No.`);

--
-- Indexes for table `goalData`
--
ALTER TABLE `goalData`
  ADD PRIMARY KEY (`Sr. No.`);

--
-- Indexes for table `hobbieData`
--
ALTER TABLE `hobbieData`
  ADD PRIMARY KEY (`Sr. No.`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- Indexes for table `notificationData`
--
ALTER TABLE `notificationData`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indexes for table `publicMessageData`
--
ALTER TABLE `publicMessageData`
  ADD PRIMARY KEY (`publicMessageID`);

--
-- Indexes for table `userData`
--
ALTER TABLE `userData`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `message_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `followerData`
--
ALTER TABLE `followerData`
  MODIFY `Sr. No.` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `goalData`
--
ALTER TABLE `goalData`
  MODIFY `Sr. No.` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `hobbieData`
--
ALTER TABLE `hobbieData`
  MODIFY `Sr. No.` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notificationData`
--
ALTER TABLE `notificationData`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=314;

--
-- AUTO_INCREMENT for table `publicMessageData`
--
ALTER TABLE `publicMessageData`
  MODIFY `publicMessageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `userData`
--
ALTER TABLE `userData`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
