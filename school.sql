-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 21, 2018 at 06:26 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `class_insert_proc` (IN `value` INT(11))  BEGIN
    	insert into class (class) value (value);
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `class_proc` ()  BEGIN
 select class from class;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `studentlist_proc` ()  NO SQL
BEGIN
	SELECT s.*,t.name as TeacherName from student s left JOIN teachers t on s.class=t.class  and t.status='0' where s.status='0'
    order by s.class DESC;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(22),
(23),
(25),
(26),
(30);

-- --------------------------------------------------------

--
-- Table structure for table `SignUP`
--

CREATE TABLE `SignUP` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `verify` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `SignUP`
--

INSERT INTO `SignUP` (`id`, `name`, `email`, `password`, `token`, `verify`) VALUES
(1, 'xyz', 'xyz@gmail.com', '613d3b9c91e9445abaeca02f2342e5a6', 'e562ad6f8ef05a1469630d22f6e2f7d5', 1),
(2, 'abc', 'abc@gmail.com', 'e99a18c428cb38d5f260853678922e03', '7b575214d3fa6947a644d3d9ef1bbae9', 0),
(6, 'plo', 'plo@gmail.com', '3888df325de15a8c041a684095c57489', '1c7fb729207745f007038cb8756f2771', 0),
(7, 'wqe', 'wqe@gmail.com', '49e5d5849e9a0d5dce66147ca7a63786', 'b01ad2e59496b56ed96215edc8e2c1bb', 0),
(9, 'nitish', 'nitish@gmail.com', 'fde62956f023ab40685ecceee22c402e', '52e68687923eeebc11f1a74bf668614b', 0),
(12, 'niti', 'nn@hfh.com', '562917cf56e2e64e0564b26865794aa7', '9287bfa253b0bfe649d39a9b799f48f3', 0),
(14, 'pqr', 'pqr@gmail.com', '49a928d41a0e21f6859b190b60469de9', 'f38e7fc33de9630f13e2b96f343f6122', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `class` int(11) NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `dob`, `class`, `gender`, `status`) VALUES
(1, 'sujay', '2017-07-19', 1, 'male', 1),
(2, 'sidda', '2017-04-30', 2, 'male', 1),
(3, 'arya', '2016-12-11', 2, 'female', 1),
(4, 'palli', '2017-08-16', 1, 'female', 1),
(5, 'sukhanya', '2016-10-21', 2, 'female', 1),
(6, 'sujay', '2018-02-06', 2, 'male', 0),
(7, 'palli', '2018-03-10', 10, 'female', 0),
(8, 'aaa', '2017-09-22', 3, 'female', 0),
(9, 'pradeep', '2018-02-10', 13, 'male', 0),
(10, 'bbb', '2018-02-10', 2, 'female', 0),
(11, 'ccc', '2018-01-12', 12, 'male', 0),
(12, 'mnb', '2018-02-11', 11, 'male', 0),
(13, 'sdf', '2018-02-10', 3, 'male', 0),
(14, 'sdf', '2018-02-10', 9, 'female', 1),
(15, 'zxc', '2018-02-06', 1, 'female', 0),
(16, 'test', '2018-02-01', 13, 'male', 0),
(17, 'asdfg', '2018-02-25', 7, 'female', 0),
(18, 'wdfgh', '2018-02-10', 15, 'male', 0),
(19, 'qwer', '2018-02-17', 22, 'male', 0),
(20, 'kamalesh', '2018-02-16', 23, 'male', 0),
(21, 'jhk', '2018-02-09', 14, 'male', 0),
(22, 'fgh', '2018-02-17', 8, 'female', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `class` int(11) NOT NULL,
  `gender` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `qualification` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `name`, `class`, `gender`, `qualification`, `status`) VALUES
(1, 'suma', 1, 'female', 'graduation', 1),
(2, 'chetan', 1, 'female', 'postgraduates', 0),
(3, 'jaya', 2, 'female', 'graduates', 0),
(4, 'rekha', 3, 'male', 'graduates', 0),
(5, 'jalesh', 5, 'male', 'postgraduate', 1),
(6, 'sharath', 4, 'male', 'postgraduate', 0),
(7, 'sheetal', 9, 'female', 'postgraduate', 1),
(8, 'purvi', 5, 'female', 'postgraduate', 0),
(9, 'ravindra', 7, 'male', 'postgraduate', 1),
(10, 'sridevi', 7, 'female', 'postgraduate', 1),
(11, 'lkj', 10, 'female', 'graduate', 0),
(12, 'abc', 11, 'female', 'postgraduates', 1),
(13, 'test', 6, 'male', 'graduates', 0),
(14, 'vivek', 13, 'male', 'graduates', 0),
(15, 'hnm', 7, 'male', 'graduates', 0),
(16, 'tyui', 15, 'female', 'postgraduates', 0),
(17, 'kamala', 11, 'female', 'postgraduates', 0),
(18, 'snoop dog', 23, 'male', 'graduate', 0),
(19, 'cersi', 8, 'female', 'postgraduates', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class`);

--
-- Indexes for table `SignUP`
--
ALTER TABLE `SignUP`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_class` (`class`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `fk_teacher_class` (`class`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `SignUP`
--
ALTER TABLE `SignUP`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
