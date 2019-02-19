-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2019 at 05:09 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comp519`
--
CREATE DATABASE IF NOT EXISTS `comp519` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `comp519`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'kanji-karanja', '9996535e07258a7bbfd8b132435c5962');

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `id` int(11) NOT NULL,
  `day` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`id`, `day`, `time`, `count`) VALUES
(1, 'Monday', '15.00-17.00', 8),
(2, 'Tuesday', '14.00-16.00', 8),
(3, 'Thursday', '11.00-13.00', 0),
(4, 'Friday', '10.00-12.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `sid` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `slot_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`id`, `name`, `firstname`, `sid`, `email`, `slot_id`) VALUES
(1, 'Karim Kanji', 'Emmanuel', '1111', 'karimkanji101@gmail.com', 1),
(2, 'Karim Kanji', 'Emmanuel', '11117', 'karimkanji101@gmail.com', 1),
(3, 'Karim Kanji', 'Emmanuel', '111175', 'karimkanji101@gmail.com', 1),
(4, 'Karim Kanji', 'Emmanuel', '1111757', 'karimkanji101@gmail.com', 1),
(5, 'Karim Kanji', 'Emmanuel', '11117578', 'karimkanji101@gmail.com', 1),
(6, 'Karim Kanji', 'Emmanuel', '111175780', 'karimkanji101@gmail.com', 1),
(7, 'Karim Kanji', 'Emmanuel', '1111757806', 'karimkanji101@gmail.com', 1),
(8, 'Karim Kanji', 'Emmanuel', '11117578066', 'karimkanji101@gmail.com', 1),
(9, 'Karim Kanji', 'Emmanuel', '2', 'karimkanji101@gmail.com', 2),
(10, 'Karim Kanji', 'Emmanuel', '23', 'karimkanji101@gmail.com', 2),
(11, 'Karim Kanji', 'Emmanuel', '236', 'karimkanji101@gmail.com', 2),
(12, 'Karim Kanji', 'Emmanuel', '2368', 'karimkanji101@gmail.com', 2),
(13, 'Karim Kanji', 'Emmanuel', '23680', 'karimkanji101@gmail.com', 2),
(14, 'Karim Kanji', 'Emmanuel', '236805', 'karimkanji101@gmail.com', 2),
(15, 'Karim Kanji', 'Emmanuel', '23680529', 'karimkanji101@gmail.com', 2),
(16, 'Karim Kanji', 'Emmanuel', '236805290', 'karimkanji101@gmail.com', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slots`
--
ALTER TABLE `slots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_course`
--
ALTER TABLE `student_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
