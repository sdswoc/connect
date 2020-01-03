-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 03, 2020 at 10:10 PM
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
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
