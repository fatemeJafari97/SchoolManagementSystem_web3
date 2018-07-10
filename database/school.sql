-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2018 at 05:14 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `Class_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `room_no` int(11) NOT NULL,
  `Class_fees` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `Class_name`, `room_no`, `Class_fees`, `start_time`, `end_time`, `start_date`, `end_date`) VALUES
(22, 'Ø§Ù†Ú¯Ù„ÛŒØ³ÛŒ', 2, 450, '14:00:00', '15:00:00', '2018-01-01', '2018-01-02'),
(23, 'Ú©Ø§Ù…Ù¾ÛŒÙˆØªØ± Ø§ÛŒ Ø³ÛŒ Ø¯ÛŒ Ø§Ù„', 1, 2000, '09:00:00', '10:00:00', '2017-04-03', '2017-04-04'),
(24, 'Ø§Ù†Ú¯Ù„ÛŒØ³ÛŒ (Ø§Ø³Ù¾ÛŒÚ©ÛŒÙ†Ú¯)', 1, 600, '08:00:00', '10:00:00', '2017-11-01', '2017-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `Student_id` int(11) NOT NULL AUTO_INCREMENT,
  `Student_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `student_lastname` varchar(50) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `student_fathername` varchar(50) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `student_ssn` int(11) NOT NULL,
  `student_phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `student_email` varchar(45) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `class_id` int(11) NOT NULL,
  PRIMARY KEY (`Student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Student_id`, `Student_name`, `student_lastname`, `student_fathername`, `gender`, `student_ssn`, `student_phone`, `student_email`, `address`, `class_id`) VALUES
(12, 'Ø§Ø­Ù…Ø¯', 'Ù…Ø­Ù…Ø¯ÛŒ', 'Ø§Ø­Ù…Ø¯', 'male', 3454236, '0787987688', 'ahmad_ahmadi@yahoo.com', '								    								    								    Ù‡Ø±Ø§Øª - Ø´Ù‡Ø±Ú© Ø®Ø§ØªÙ… Ø§Ù„Ù†Ø¨ÛŒØ§								 								 								 								 ', 21),
(13, 'Ø¹Ù„ÛŒ', 'Ù…Ø­Ù…Ø¯ÛŒ', 'Ù…ÛŒÙ„Ø§Ø¯', 'male', 4434235, '0787787887', 'ali_mohammadi@yahoo.com', 'Ù‡Ø±Ø§Øª - Ø¬Ø¨Ø±ÛŒÛŒÙ„', 22),
(14, 'Ù…Ø±ÛŒÙ… ', 'Ø§Ù…ÛŒÙ†ÛŒ', 'Ù…Ø­Ù…Ø¯', 'female', 4434235, '0787787887', 'maryam@yahoo.com', 'Ù‡Ø±Ø§Øª - Ø¬Ø¨Ø±ÛŒÛŒÙ„', 22),
(15, 'Ù†Ø±Ú¯Ø³', 'Ø­Ø³Ù†ÛŒ', 'Ø§Ù…ÛŒØ±', 'female', 2121234, '0767676563', 'narges@yahoo.com', 'Ú©Ø§Ø¨Ù„ - Ú©Ø§Ø¨Ù„ Ù†Ùˆ', 22),
(16, 'Ø§Ø­Ù…Ø¯', 'Ø§Ø­Ù…Ø¯ÛŒ', 'Ø­Ø³ÛŒÙ†', 'male', 23232312, '0778787878', 'ahmad_ahmadi@yahoo.com', 'Afghanistan - Herat', 23);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `teacher_lastname` varchar(50) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `teacher_fathername` varchar(50) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `teacher_ssn` int(11) NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `teacher_phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `teacher_address` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `teacher_name`, `teacher_lastname`, `teacher_fathername`, `teacher_ssn`, `email`, `teacher_phone`, `teacher_address`) VALUES
(2, 'Ø­Ù…ÛŒØ¯ Ø±Ø¶Ø§', 'Ø§Ø­Ù…Ø¯ÛŒ', 'Ø­Ø³ÛŒÙ†', 339878, 'hamidreza@yahoo.com', '0787676788', '								    								    								    Ù‡Ø±Ø§Øª -Ø¬Ø¨Ø±ÛŒÛŒÙ„ - ØªÙˆØ­ÛŒØ¯ 3								 								 								 ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `lastName` varchar(50) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `fathername` varchar(50) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `photo` varchar(100) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(132) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `phone` varchar(14) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `Email` varchar(80) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=102 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastName`, `fathername`, `photo`, `username`, `password`, `phone`, `Email`) VALUES
(101, 'ali', 'karimi', 'mahmoud', 'photo/ju.jpg', 'ali', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '0956546546535', 'ali@yahoo.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
