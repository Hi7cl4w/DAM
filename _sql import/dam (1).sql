-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2014 at 10:28 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dam`
--

-- --------------------------------------------------------

--
-- Table structure for table `action_tbl`
--

CREATE TABLE IF NOT EXISTS `action_tbl` (
  `action_id` int(11) NOT NULL AUTO_INCREMENT,
  `prn` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `department` varchar(4) NOT NULL,
  `enqhead_prn` varchar(6) NOT NULL,
  `enqhead_name` varchar(30) NOT NULL,
  `faculty_prn` varchar(6) NOT NULL,
  `faculty_name` varchar(30) NOT NULL,
  `action` text NOT NULL,
  `reason` varchar(90) NOT NULL,
  `fine` bigint(9) DEFAULT NULL,
  `incident_date` date NOT NULL,
  `action_taken_date` date NOT NULL,
  `fine_payment_date` date DEFAULT NULL,
  `duration_days` int(5) DEFAULT NULL,
  `location` varchar(30) NOT NULL,
  `witnesses` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `addedtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`action_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `action_tbl`
--

INSERT INTO `action_tbl` (`action_id`, `prn`, `name`, `department`, `enqhead_prn`, `enqhead_name`, `faculty_prn`, `faculty_name`, `action`, `reason`, `fine`, `incident_date`, `action_taken_date`, `fine_payment_date`, `duration_days`, `location`, `witnesses`, `status`, `addedtime`) VALUES
(2, '11cs14', 'Jerin', 'CSE', '00eg00', 'sample name', 'root', 'Root', 'action sample', 'reason sample', 100000, '2014-12-11', '2014-06-11', '2014-12-11', 0, 'location sample', 'sample name 1, sample name 2', 'completed', '2014-11-03 14:42:43'),
(6, '11cs53', 'shifna', 'CSE', '22cs14', 'divya', '00eg77', 'sample ', 'fine', 'late coming', 200, '1970-01-01', '2014-12-11', '2014-11-11', 0, 'Chemperi', 'sample name 1, sample name 2', 'pending', '2014-11-04 04:46:31'),
(7, '11cs06', 'Anjith', 'CSE', '00ex66', 'asdfgghh', 'root', 'root', 'fgfghjk', 'kllkjlkjlkj', 2000000, '1970-01-01', '2014-10-11', '2014-12-11', 88, 'Chemperi', 'athul', 'enquiry', '2014-11-04 08:12:47'),
(8, '11cs41', 'minu', 'CSE', '00eg00', 'asdfgghh', 'root', 'Root', 'asdewf', 'late coming', 100, '1970-01-01', '2014-05-11', '1970-01-01', 4, '', '', 'completed', '2014-11-05 06:20:09'),
(9, '11CS53', 'SHIFNA', 'CSE', '', '', 'root', 'Root', 'SDF', 'SDF', 0, '1970-01-01', '1970-01-01', '1970-01-01', 0, '', '', 'pending', '2014-11-05 09:36:56'),
(10, '11cs16', 'manu', 'CSE', 'dfg23', 'divya', 'root', 'Root', 'leave', 'fvghjkl', 100000, '2014-05-11', '1970-01-01', '2014-12-11', 0, '', '', 'pending', '2014-11-06 04:01:46'),
(11, '11cs00', 'ashwin', 'CSE', '', '', 'root', 'Root', 'chatting', 'sdfg', 2000000, '2014-03-11', '1970-01-01', '1970-01-01', 4, '', '', 'pending', '2014-11-06 04:02:59'),
(12, '11cs01', 'gem george', 'CSE', '', '', 'root', 'Root', 'fine', 'improper unform', 10000, '2014-05-11', '1970-01-01', '1970-01-01', 4, '', '', 'pending', '2014-11-06 04:05:30'),
(13, '11ee43', 'ashitha', 'EEE', '', '', 'root', 'Root', 'fine', 'late coming', 100, '1970-01-01', '1970-01-01', '1970-01-01', 0, '', '', 'pending', '2014-11-06 04:08:19'),
(14, '11ee50', 'suhana', 'EEE', 'fee23', 'dhanya', 'root', 'Root', 'suspnsion', 'copied in exam', 19990, '1970-01-01', '1970-01-01', '1970-01-01', 0, '', '', 'pending', '2014-11-06 04:10:21'),
(15, '11ec19', 'aleena', 'EC', '', '', 'root', 'Root', 'fine', 'late coming', 100, '1970-01-01', '1970-01-01', '1970-01-01', 4, '', '', 'pending', '2014-11-06 04:11:27');

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE IF NOT EXISTS `admin_tbl` (
  `prn` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) NOT NULL,
  PRIMARY KEY (`prn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`prn`, `fname`, `lname`, `designation`, `email`) VALUES
('Dev', 'Dev', 'Dev', 'Dev', ''),
('root', 'Root', 'root', 'root', 'hackodezo@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `staff_tbl`
--

CREATE TABLE IF NOT EXISTS `staff_tbl` (
  `prn` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) NOT NULL,
  PRIMARY KEY (`prn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_tbl`
--

INSERT INTO `staff_tbl` (`prn`, `fname`, `lname`, `department`, `designation`, `email`) VALUES
('00eg77', 'sample ', 'sample', 'EEE', 'Staff', 'sample@mail.com'),
('00eq00', 'sample fn', 'sample ln', 'CSE', 'sample des', 'sample@mail.com'),
('fcs67', 'aaa', 'bbb', 'CSE', 'ap', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_tbl`
--

CREATE TABLE IF NOT EXISTS `student_tbl` (
  `prn` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admission_year` year(4) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`prn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_tbl`
--

INSERT INTO `student_tbl` (`prn`, `fname`, `lname`, `department`, `admission_year`, `email`) VALUES
('11cs06', 'Anjith', 'Sasindran', 'CSE', 2011, 'iamanjithsasindran@gmail.com'),
('11cs15', 'Joshwa', 'Philip', 'CSE', 2011, ''),
('11cs16', 'Manu', 'K', 'CSE', 2011, 'hackodezo@gmail.com'),
('11cs17', 'persi', '', 'CSE', 2011, ''),
('11cs19', 'Rithin', 'V', 'CSE', 2011, 'rithinv@gmail.com'),
('11cs33', 'dilna', '', 'CSE', 2011, ''),
('11cs41', 'minu', 'mohan', 'CSE', 2011, ''),
('11cs46', 'nishma', 'premnath', 'CSE', 2011, ''),
('11cs50', 'riya', 'benny', 'CSE', 2011, ''),
('11cs51', 'salu', '', 'CSE', 2011, ''),
('11cs53', 'shifna', 'kadz', 'CSE', 2011, ''),
('11cs54', 'smilty', '', 'CSE', 2011, ''),
('11cs57', 'ujwala', 'vijayan', 'CSE', 2011, ''),
('11cs60', 'Athul', '', 'CSE', 2011, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `prn` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `actype` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(2) NOT NULL,
  PRIMARY KEY (`prn`),
  UNIQUE KEY `prn` (`prn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`prn`, `user_password_hash`, `actype`, `status`) VALUES
('00eg77', '$2y$10$mVBM.JxD2oTMYVgrfC51hOp26hhRM4lOHGn/JuAx4YxIyMKHZNRyK', 'Staff', 1),
('00eq00', '$2y$10$72keeZ3sOnxz8CtB0nvDkeFXTEdN3H5Br3sYAnkUw/G1krLQXP6Vi', 'Staff', 1),
('11cs06', '$2y$10$RlozX8JN814WhstOD3Vg4Orq9TIlEfiOFMLhnTDblvMmBnerrxOra', 'Student', 1),
('11cs15', '$2y$10$FODHvao8YxH2eReobrPP9OqJPuMHcZOzCC6ZJXtgxuYbQ8TiCkPtu', 'Student', 1),
('11cs16', '$2y$10$r0JQLVNOwy7R3uEvzCnIaehIt2/.51g0apazTuSx6ArDQs1.hiIzW', 'Student', 1),
('11cs17', '$2y$10$iHriQfTAUdQv6KMaQRemMu7yeKL8A0DAui.ImDWoYXhXbhES8QxQG', 'Student', 1),
('11cs19', '$2y$10$3hdD6QUHjia7QYbZP8wzhu/DCKChbe7AsiKrlFxGqtKj9/b4LTNEO', 'Student', 1),
('11cs33', '$2y$10$vYslqudIGLLnxlwxyAWgL.8itOObD4FYwtGsn7RHEYSArCcX3agmC', 'Student', 1),
('11cs41', '$2y$10$67bxHKYIuyNpvJ3SbogoGeN7wmhXT4B/CAJTzp.Eu0ghiMmGcTh6G', 'Student', 1),
('11cs46', '$2y$10$4klP9tHNUYgzRxyw56qGzO/uvDbvXiUgYLLmJepogO2gxvcG/B5tq', 'Student', 1),
('11cs50', '$2y$10$gC/rqD.E2S8SyCHds0vWZOEEBTeuZCD0IvdVlBLZIM.Mcb96iSVjW', 'Student', 1),
('11cs51', '$2y$10$pOFQqlpVso941kMfw2a3g.bpuwwetYYoe1twE2akQpFqtsT0RRqOu', 'Student', 1),
('11cs53', '$2y$10$d27MK6ItFULmdkEOUugAOOHiQi0Fk9nqu1zJgSPTXiAzOuJGzQCty', 'Student', 1),
('11cs54', '$2y$10$xGP4F3IhpYHGNb4XZ61qjO6BOfGEeiSenVV6So2JYysNNCUe1oCBe', 'Student', 1),
('11cs57', '$2y$10$ajJbZxEGq2mrV5tDhd9meeYQAUSraGe/YzZNx2VgT01yUq6Oo2F.y', 'Student', 1),
('11cs60', '$2y$10$q2h/tVwcERoNlVSvsvkpXuWYVkU29GKD/SL5T80t7Qg9Um0FjcA/m', 'Student', 1),
('Dev', '$2y$10$F2KPoJjfGYKW/IY6pHuHvOKt2EP82NwaK2rm56/g0kMUhAJ9qtYcu', 'admin', 1),
('fcs67', '$2y$10$oG96W1a8.XLMZg79GJjavOyy9fQP4jQO1pN8mm/ia5pQreSoUpsH6', 'Staff', 1),
('root', '$2y$10$OPoiw7LfHfGEwwnUVIIJe.EqdkbxgD/7s4UUVIABZ795l.q.v7p1i', 'admin', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
