-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 21, 2019 at 02:31 AM
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
-- Table structure for table `userData`
--

CREATE TABLE `userData` (
  `userID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `enrl` varchar(50) NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `branch_y` varchar(50) DEFAULT NULL,
  `bhawan` varchar(50) NOT NULL,
  `follow_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userData`
--

INSERT INTO `userData` (`userID`, `name`, `username`, `email`, `password`, `enrl`, `img`, `bio`, `branch_y`, `bhawan`, `follow_count`) VALUES
(8, 'Anant', 'anant_insane', 'anant_i@ch.iitr.ac.in', '123', '19112011', '8.jpeg', ' I\'m infinity!', NULL, 'Radhakrishnan Bhawan', 8),
(12, 'iron_shark', 'iron', 'aryamanbehera@gmail.co.in', '123', '123', '12.jpg', 'I\'m iron man!', NULL, 'Rajeev Bhawan', 4),
(14, 'Ayushi', 'ayu', 'ayushi@gmail.co.in', 'ayu', '19120900', '24.jpg', 'I\'m Ayushi.', 'CH - 1st year', 'Sarojini Bhawan', 5),
(15, 'Rituraj', 'ritu', 'rituraj@gmail.com', '123', '19112065', NULL, 'm ritu hu!', NULL, 'Rajeev Bhawan', 3),
(16, 'Ayuhsi', '123', 'ayu@live.com', '123', '1911019', '16.jpeg', ' Hey! I am Ayuhsighj', NULL, 'Rajeev Bhawan', 3),
(17, 'Arya_man', 'ary', 'ablive@iitr.ac.in', 'ary', '19112020', '17.jpeg', 'Iron_man!', 'CH - 1st yr', 'Rajendra Bhawan', 4),
(18, 'Ankita Pareek', 'ankita', 'ankitapareek2000@gmail.com', 'abcdef', '12345678', NULL, 'Hey! I am Ankita Pareek', NULL, 'Sarojini Bhawan', 2),
(19, 'Sarvesh', 'sarv', 'sarvraut56@rediffmail.com', '123', '19112013', '19.jpg', 'hey! I\'m Sarvesh', NULL, 'Kasturba Bhawan', 1),
(20, 'Sagar', 'Sagar_gupta', 'sagarkumargupta8@gmail.com', 'Sagar@123', '19112069', NULL, 'Hey! I am Sagar', NULL, 'Rajendra Bhawan', 0),
(21, 'SAKSHAM SAXENA', 'Lallantop', 'saxenasaksham8@gmail.com', 'password', '19410029', NULL, 'Hey! I am SAKSHAM SAXENA', NULL, 'Rajendra Bhawan', 0),
(22, 'leshna', 'leshna', 'lbalara@gmail.com', 'leshna', '18114044', NULL, 'Hey! I am leshna', NULL, 'Kasturba Bhawan', 1),
(24, 'Vinyas Pandey', 'bittu.911', 'vinyaspandey1109@gmail.com', 'hhhhhhhhhh', '19111037', NULL, 'Hey! I am Vinyas Pandey', NULL, 'Rajendra Bhawan', 0),
(26, 'Saurabh', '100rabh', '100rabh@gmail.com', '123456', '19112022', '26.jpg', 'S-square', NULL, 'Sarojini Bhawan', 0),
(27, 'Akshita Agarwal', 'akshi;)', 'akshita_a@ch.iitr.ac.in', 'aryu', '19112009', NULL, 'Hey! I am Akshita Agarwal', NULL, 'Sarojini Bhawan', 3),
(30, 'Aryaman', 'arya', 'aryaman@woc.com', '123', '19112020', '30.jpeg', 'Aryaman! The IRON_MAN!', NULL, 'Rajeev Bhawan', 1),
(31, 'Ananya Agarwal', 'ananya_ags', 'ananya_a@ch.iitr.ac.in', 'ananya3011', '19112012', NULL, 'Hey! I am Ananya Agarwal', NULL, 'Sarojini Bhawan', 1),
(32, 'Akshat garg', 'Akshat', 'akshatgarg01@gmail.com', 'akshat', '19112007', NULL, 'Hey! I am Akshat garg', 'Chemical and 1st year', 'Rajendra Bhawan', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userData`
--
ALTER TABLE `userData`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userData`
--
ALTER TABLE `userData`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
