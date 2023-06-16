-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2021 at 07:22 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_hcmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appoint_id` int(10) NOT NULL,
  `app_from` int(30) NOT NULL,
  `app_to` int(25) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `app_date` varchar(25) NOT NULL,
  `app_time` varchar(25) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Pending'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appoint_id`, `app_from`, `app_to`, `phone`, `app_date`, `app_time`, `message`, `status`) VALUES
(17, 2, 13, '0777200300', '2018-06-20', '', 'na hapo je?', 'Accepted'),
(22, 11, 13, '0776787665', '2018-06-08', '', 'This is test Appoitment', 'Declined'),
(23, 13, 31, '0678908765', '2018-06-28', '', 'This is another Appoitmnet\r\n', 'Pending'),
(51, 44, 39, '1234567890', '2021-12-26', '11:46', '', 'Accepted'),
(50, 43, 37, '123', '1111-12-11', '11:11', '', 'Accepted'),
(49, 42, 0, '78421545', '2021-11-02', '21:47', 'ttytft', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `position` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `user_id`, `uname`, `email`, `position`) VALUES
(39, 40, 'Lab', 'lab2@gmail.com', 'Lab Technician'),
(38, 39, 'Doctor', 'doctor2@gmail.com', 'Doctor'),
(37, 38, 'Reception', 'reception2@gmail.com', 'Receptionist'),
(36, 37, 'doctor', 'doctor1@gmail.com', 'Doctor');

-- --------------------------------------------------------

--
-- Table structure for table `fitness`
--

CREATE TABLE `fitness` (
  `fit_id` int(20) NOT NULL,
  `Name_with_tittle` varchar(50) NOT NULL,
  `Parents_Name` varchar(20) NOT NULL,
  `Village` varchar(10) NOT NULL,
  `Age_Years` varchar(10) NOT NULL,
  `Doctor_Name` varchar(20) NOT NULL,
  `Post_Office` varchar(20) NOT NULL,
  `Massage` varchar(100) NOT NULL,
  `State` varchar(20) NOT NULL,
  `Pincode` varchar(10) NOT NULL,
  `District` varchar(20) NOT NULL,
  `Registration_No` varchar(20) NOT NULL,
  `Date_Of_Issue` varchar(20) NOT NULL,
  `Joining_date` varchar(20) NOT NULL,
  `Status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lab_appoint`
--

CREATE TABLE `lab_appoint` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `req_test` text NOT NULL,
  `e_date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_appoint`
--

INSERT INTO `lab_appoint` (`id`, `patient_id`, `doc_id`, `req_test`, `e_date`, `status`) VALUES
(1, 24, 15, '', '2018-07-17', 1),
(2, 30, 38, '', '2018-07-20', 1),
(5, 34, 15, '', '2018-07-20', 1),
(6, 35, 15, '', '2018-07-25', 1),
(7, 36, 15, '', '2018-08-15', 1),
(8, 34, 15, '', '2018-08-30', 1),
(9, 34, 15, 'Malaria,Typhoid,HIV/AIDs', '2018-08-31', 1),
(10, 32, 38, 'Malaria,U.T.P,Blood Pressure', '2018-08-31', 1),
(11, 37, 15, 'Malaria,Blood Pressure', '2018-08-31', 1),
(12, 39, 15, '', '2019-02-27', 1),
(13, 40, 15, 'Malaria,Blood Group', '2019-03-28', 1),
(14, 41, 38, 'Malaria', '2019-03-31', 1),
(15, 43, 0, 'U.T.P', '2021-11-15', 0),
(16, 2, 0, '1', '2021-12-26', 0),
(17, 2, 0, '1', '2021-12-26', 0),
(18, 2, 0, '1', '2021-12-26', 0),
(19, 2, 0, '1', '2021-12-26', 0),
(20, 44, 0, 'U.T.P', '2021-12-26', 1),
(21, 44, 0, 'Malaria,Typhoid,HIV/AIDs', '2021-12-26', 1),
(22, 44, 0, 'Malaria,Typhoid,HIV/AIDs', '2021-12-26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lab_results`
--

CREATE TABLE `lab_results` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `malaria` varchar(30) NOT NULL,
  `typhoid` varchar(100) NOT NULL,
  `HIV/AIDs` varchar(100) NOT NULL,
  `blood_group` varchar(100) NOT NULL,
  `UTI` varchar(100) NOT NULL,
  `UTP` varchar(100) NOT NULL,
  `blood_pressure` varchar(100) NOT NULL,
  `weight` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `allergy` varchar(5) NOT NULL,
  `checked_by` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_results`
--

INSERT INTO `lab_results` (`id`, `patient_id`, `malaria`, `typhoid`, `HIV/AIDs`, `blood_group`, `UTI`, `UTP`, `blood_pressure`, `weight`, `height`, `allergy`, `checked_by`, `status`) VALUES
(1, 2, 'No', 'No', 'No', 'A', 'No', 'No', 'No', 67, 59, 'No', 'Fatma ALi', 1),
(2, 24, 'Yes', 'Yes', 'No', 'B', 'Yes', 'No', 'Yes', 50, 70, 'No', 'Mkarafuu Mkavu', 0),
(4, 29, 'No', 'No', 'No', 'A', 'No', 'No', 'No', 50, 50, 'No', 'Mkarafuu Mkavu', 1),
(5, 2, 'Yes', 'No', 'No', '0', 'No', 'Yes', 'No', 67, 70, 'No', 'John  Doe', 1),
(6, 30, 'Yes', 'No', 'Positive', '0', 'Yes', 'Yes', 'No', 80, 90, 'No', 'John  Doe', 1),
(7, 31, 'Yes', 'No', 'No', '0', 'Yes', 'No', 'Yes', 78, 77, 'Yes', 'Mkarafuu Mkavu', 1),
(8, 33, 'Yes', 'Yes', 'No', 'B', 'Yes', 'No', 'No', 50, 50, 'No', 'Mkarafuu Mkavu', 1),
(9, 34, 'Yes', 'No', 'No', 'B', 'No', 'No', 'No', 67, 78, 'No', 'Mkarafuu Mkavu', 1),
(10, 35, 'No', 'No', 'No', 'B', 'No', 'No', 'No', 76, 78, 'No', 'Mkarafuu Mkavu', 1),
(11, 36, 'Yes', 'No', 'Negative', 'A', 'No', 'No', 'No', 90, 50, 'No', 'Mkarafuu Mkavu', 1),
(12, 34, 'Yes', 'No', 'Negative', 'n/a', 'n/a', 'n/a', 'n/a', 0, 0, 'n/a', 'Mkarafuu Mkavu', 1),
(13, 32, 'Yes', 'n/a', 'n/a', 'n/a', 'No', 'n/a', 'No', 0, 0, 'n/a', 'John  Doe', 1),
(14, 37, 'No', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'No', 0, 0, 'n/a', 'Mkarafuu Mkavu', 1),
(15, 39, 'No', 'n/a', 'n/a', 'B', 'n/a', 'n/a', 'n/a', 69, 0, 'n/a', 'Mkarafuu Mkavu', 1),
(16, 40, 'No', 'No', 'n/a', 'B', 'n/a', 'n/a', 'n/a', 0, 0, 'n/a', 'Mkarafuu Mkavu', 1),
(17, 41, 'No', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 0, 0, 'n/a', 'John  Doe', 1),
(18, 44, 'No', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 0, 0, 'n/a', 'Lab Second', 1);

-- --------------------------------------------------------

--
-- Table structure for table `malipo`
--

CREATE TABLE `malipo` (
  `malipo_id` int(10) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `amount` int(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `malipo`
--

INSERT INTO `malipo` (`malipo_id`, `patient_id`, `amount`, `status`) VALUES
(9, 34, 201600, 'Paid'),
(8, 30, 61000, 'Paid'),
(7, 29, 3000, 'Paid'),
(10, 30, 45750, 'Paid'),
(11, 35, 61800, 'Paid'),
(12, 2, 0, 'Paid'),
(13, 34, 151200, 'Paid'),
(14, 34, 151200, 'Paid'),
(15, 36, 3600, 'Paid'),
(16, 34, 375, 'Paid'),
(17, 34, 375, 'Paid'),
(18, 34, 375, 'Paid'),
(19, 32, 2213, 'Paid'),
(20, 32, 2213, 'Paid'),
(21, 32, 2213, 'Paid'),
(22, 37, 1500, 'Paid'),
(23, 39, 900, 'Paid'),
(24, 40, 159563, 'Paid'),
(25, 41, 4875, 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `medication`
--

CREATE TABLE `medication` (
  `id` int(10) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `med_name` varchar(100) NOT NULL,
  `med_qty` int(11) NOT NULL,
  `dosage` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `comments` text NOT NULL,
  `md_date` date NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medication`
--

INSERT INTO `medication` (`id`, `patient_id`, `med_name`, `med_qty`, `dosage`, `cost`, `comments`, `md_date`, `status`) VALUES
(2, 2, 'Panadol', 10, 2, 0, '', '2018-07-15', '1'),
(5, 2, 'Delpa', 5, 1, 0, '', '2018-07-16', '1'),
(6, 2, 'Cofta', 10, 3, 0, '', '2018-07-16', '1'),
(7, 3, 'Panadol', 20, 2, 0, 'moja mara 3', '2018-07-16', '1'),
(8, 3, 'Action', 10, 2, 0, '2 mara 4', '2018-07-16', '1'),
(9, 2, 'Panadol', 10, 2, 0, '2 kwa siku', '2018-07-17', '1'),
(10, 2, 'Delpa', 5, 1, 0, '1 mara 3', '2018-07-17', '1'),
(30, 29, 'Colgate', 1, 1, 2000, '1', '2018-07-18', '1'),
(29, 29, 'Panadol', 20, 1, 1000, '1 ma 4', '2018-07-18', '1'),
(28, 24, 'Cogate', 2, 1, 0, '1 per week', '2018-07-17', '1'),
(27, 24, 'Panadol', 30, 2, 0, '2 mara 3', '2018-07-17', '1'),
(43, 30, 'Panadol', 5, 2, 500, 'dsfs fsd sdfds sdfsd fsd', '2018-07-20', '1'),
(42, 30, 'Panadol', 5, 1, 500, 'Â dfsefsd fsd sdf sdfs d', '2018-07-20', '1'),
(44, 30, 'CoolMax', 6, 2, 60000, 'sdfsd fsd fsdf sfsd fsd s', '2018-07-20', '1'),
(45, 31, 'Panadol', 12, 2, 1200, '2 mara 3', '2018-07-20', '1'),
(46, 31, 'CoolMax', 6, 2, 60000, '2 mara 1', '2018-07-20', '1'),
(47, 34, 'Panadol', 10, 2, 1000, 'ule 2 mara 3', '2018-07-20', '1'),
(48, 34, 'CoolMax', 20, 3, 200000, '3 mara 3', '2018-07-20', '1'),
(49, 34, 'Headaxe', 3, 4, 600, '6 mara 5 ', '2018-07-20', '1'),
(50, 35, 'Panadol', 10, 2, 1000, 'jahus adnjsnajdsna', '2018-07-25', '1'),
(51, 35, 'CoolMax', 2, 3, 20000, 'sjbdajs', '2018-07-25', '1'),
(52, 35, 'Mettacofline', 34, 3, 40800, 'jabsdbaj', '2018-07-25', '1'),
(53, 36, 'Panadol', 10, 2, 1000, 'This is comment 1', '2018-08-15', '1'),
(54, 36, 'Action', 8, 3, 1600, 'This is comment 2', '2018-08-15', '1'),
(55, 36, 'Headaxe', 5, 3, 1000, 'This is comment 3', '2018-08-15', '1'),
(56, 34, 'Panadol', 5, 5, 500, 'dgdf dfg dfgd gdf gdfgÂ ', '2018-08-31', '1'),
(57, 32, 'Panadol', 10, 2, 1000, 'coment 1', '2018-08-31', '1'),
(58, 32, 'Cofta', 5, 4, 750, 'coment 2', '2018-08-31', '1'),
(59, 32, 'Headaxe', 6, 3, 1200, 'coment 3', '2018-08-31', '1'),
(60, 37, 'Panadol', 20, 2, 2000, 'comment 2', '2018-08-31', '1'),
(61, 0, 'Panadol', 121, 0, 12100, 'e1231', '2018-09-26', '0'),
(62, 0, 'Mettacofline', 1231, 31, 1477200, 'xzx', '2018-09-26', '0'),
(63, 39, 'Cofta', 4, 4, 600, 'thus sus usisiÂ ', '2019-02-27', '1'),
(64, 39, 'Action', 3, 2, 600, 'thasu asua ia', '2019-02-27', '1'),
(65, 40, 'CoolMax', 20, 6, 200000, 'hhhhhj', '2019-03-28', '1'),
(66, 40, 'Mettacofline', 10, 7, 12000, 'hhhh', '2019-03-28', '1'),
(67, 40, 'Cofta', 5, 5, 750, 'ggghgd', '2019-03-28', '1'),
(68, 41, 'Panadol', 5, 2, 500, 'some comments', '2019-03-31', '1'),
(69, 41, 'Mettacofline', 5, 2, 6000, 'some comments', '2019-03-31', '1'),
(70, 0, 'CoolMax', 1, 1, 10000, 'ddad', '2021-12-26', '0'),
(71, 0, 'Panadol', 0, 0, 0, 's', '2021-12-26', '0'),
(72, 0, 'Cofta', 0, 0, 0, 'fgg', '2021-12-26', '0'),
(73, 0, 'Mettacofline', 0, 0, 0, 'fgg', '2021-12-26', '0'),
(74, 44, 'Panadol', 10, 0, 1000, '10', '2021-12-26', '0');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `p_price` int(11) NOT NULL,
  `s_price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `added_at` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `m_name`, `p_price`, `s_price`, `qty`, `added_by`, `added_at`, `status`) VALUES
(1, 'Panadol', 90, 100, 1000, 'Khadija Khamis', '2018-07-15', 'active'),
(2, 'CoolMax', 9000, 10000, 90, 'Khadija Khamis', '2018-07-15', 'active'),
(3, 'Mettacofline', 1000, 1200, 100, 'Khadija Khamis', '2018-07-15', 'active'),
(4, 'Cofta', 100, 150, 90, 'Khadija Khamis', '2018-07-15', 'active'),
(5, 'Action', 180, 200, 200, 'Khadija Khamis', '2018-07-15', 'active'),
(6, 'Headaxe', 140, 200, 120, 'Khadija Khamis', '2018-07-15', 'active'),
(7, 'Colgate', 1800, 2000, 100, 'Khadija Khamis', '2018-07-15', 'active'),
(8, 'Whitedent', 2500, 3000, 1500, 'Khadija Khamis', '2018-07-15', 'active'),
(9, 'aspirin', 250, 280, 10, 'Khadija Khamis', '2021-11-02', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `status` varchar(100) NOT NULL,
  `regNumber` varchar(100) NOT NULL,
  `address` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `regDate` date NOT NULL,
  `code` int(15) NOT NULL,
  `treated` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `fname`, `lname`, `status`, `regNumber`, `address`, `phone`, `email`, `dob`, `gender`, `regDate`, `code`, `treated`) VALUES
(2, 'Aisha', 'Deo', 'non student', '-', 'Kibonde mzungu', '773545566', 'abass@hotmail.com', '1995-05-15', 'male', '2018-05-15', 15271, 1),
(39, 'Amria', 'Ali', 'student', 'BFAA/2/18/001', 'Mikocheni', '0717676430', '-', '2013-02-01', 'female', '2019-02-27', 0, 1),
(44, 'First', 'Patiernt', 'non student', '-', 'Mumbai', '1234567890', 'first@gmail.com', '2001-12-12', 'male', '2021-12-26', 0, 2),
(43, 'MM', 'NN', 'non student', '-', 'Nanded', '123', 'mm@gmail.com', '1111-11-11', 'male', '2021-11-15', 0, 0),
(29, 'Abass', 'Hassan', 'non student', '17/OIA/001', 'Kibonde mzungu', '773545566', 'abass@hotmail.com', '1997-05-30', 'male', '2018-07-16', 0, 1),
(42, 'Rani', 'kk', 'student', '114', 'fgfty', '78421545', 'pathak.pvt100@gmail.com', '2021-11-24', 'female', '2021-11-02', 0, 0),
(34, 'Hussein', 'Khamis', 'student', '16/OIA/012', 'Kizimbani', '0711787872', 'hussein@gmail.com', '1973-06-13', 'male', '2018-07-20', 0, 1),
(35, 'Juma', 'Ali', 'non student', '-', 'Kizimbani', '0777876540', 'juma@gmail.com', '1995-11-05', 'male', '2018-07-25', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `presc_id` int(10) NOT NULL,
  `pid` varchar(50) NOT NULL,
  `prescription` text NOT NULL,
  `Email` varchar(30) NOT NULL,
  `userread` varchar(6) NOT NULL,
  `period` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `rep_id` int(10) NOT NULL,
  `patient_id` int(10) NOT NULL,
  `LTT` text NOT NULL,
  `Result` text NOT NULL,
  `Labtech` varchar(40) NOT NULL,
  `File` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`rep_id`, `patient_id`, `LTT`, `Result`, `Labtech`, `File`) VALUES
(1, 2, 'Some default panel content here. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur. ', 'Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'This is LabTech', 'This is File');

-- --------------------------------------------------------

--
-- Table structure for table `sick_description`
--

CREATE TABLE `sick_description` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `problem` varchar(100) NOT NULL,
  `since` date NOT NULL,
  `nature` varchar(100) NOT NULL,
  `checked_by` varchar(100) NOT NULL,
  `checked_date` date NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sick_description`
--

INSERT INTO `sick_description` (`id`, `patient_id`, `problem`, `since`, `nature`, `checked_by`, `checked_date`, `comment`) VALUES
(4, 27, 'Typhoid', '2018-07-03', 'Sijui', 'Salum Rajab', '2018-07-07', 'This is some comment'),
(5, 7, 'Kichwa', '2018-07-18', 'Sijui', 'Salum Bonano', '2018-07-15', 'Some comments'),
(6, 7, 'Typhoid', '2018-07-19', 'Sijui', 'Salum Bonano', '2018-07-15', 'This is some comments'),
(7, 32, 'Malaria', '2018-07-14', 'Kulala bila net', 'Salum Bonano', '2018-07-16', 'this is some doctor comment'),
(8, 29, 'Homa', '2018-07-25', 'Sijui', 'Salum Bonano', '2018-07-16', 'Comment'),
(9, 31, 'Kichwa', '2018-07-16', 'Sijui', 'Salum Bonano', '2018-07-17', 'Utumiaji mwingi wa kio'),
(10, 2, 'Kichwa', '2018-07-16', 'Sijui', 'Salum Bonano', '2018-07-17', 'Comment comment'),
(11, 24, 'Typhoid', '2018-07-11', 'Kulala bila net', 'Salum Bonano', '2018-07-17', 'some comments'),
(12, 29, 'Tumbo', '2018-07-17', 'Sijui', 'Salum Bonano', '2018-07-18', 'some commentcsasa asda aahap hapa'),
(14, 30, 'Homa', '2018-07-19', 'Kulala bila net', 'Marya Doe', '2018-07-20', 'asdas sadsad asdasd asdasd asdsadsa sads af a fafa fsa'),
(15, 31, 'Homa', '2018-07-19', 'I dont know', 'Marya Doe', '2018-07-20', 'This is some comment about this patient'),
(16, 33, 'Homa', '2018-07-19', 'I dont know', 'Marya Doe', '2018-07-20', 'gs fsdfsd'),
(17, 34, 'Homa', '2018-07-19', 'I dont know', 'Marya Doe', '2018-07-20', 'This is some comment to this patient'),
(18, 35, 'Homa', '2018-07-24', 'Sijui', 'Fatma  Sahim', '2018-07-25', 'haksd akdsaknak '),
(22, 34, 'Homa', '2018-08-04', 'Sijui', 'Marya Doe', '2018-08-30', 'huhuhuhu'),
(24, 34, 'Homa', '2018-08-11', 'Kulala bila net', 'Marya Doe', '2018-08-30', 'decgvgv vgvrft'),
(25, 34, 'Homa', '2018-08-01', 'Sijui', 'Marya Doe', '2018-08-31', 'this is some comments'),
(26, 32, 'Homa', '2018-08-09', 'Kulala bila net', 'Abuu Juma', '2018-08-31', 'this is is is'),
(27, 37, 'Homa', '2018-08-30', 'Sijui', 'Fatma  Sahim', '2018-08-31', 'hey thusadsc ascas'),
(28, 24, 'Kichwa', '2018-12-05', 'Sijui', 'Abuu Juma', '2018-12-05', 'test'),
(29, 39, 'Kichwa', '2019-02-25', 'Sijui', 'Fahad Juma', '2019-02-27', 'this is doctors comment'),
(30, 40, 'Homa', '2019-03-27', 'Sijui', 'Fatma  Sahim', '2019-03-28', 'homessad '),
(31, 41, 'Fever', '2019-03-29', 'dont know', 'Abuu Juma', '2019-03-31', 'some comments'),
(32, 43, 'Viral', '1111-11-11', 'Viral', 'doctor .', '2021-11-15', ''),
(33, 44, 'Viral', '2021-12-24', 'Viral', 'Doctor Second', '2021-12-26', ''),
(34, 44, 'Viral', '2021-12-22', 'Viral', 'Doctor Second', '2021-12-26', ''),
(35, 44, 'Viral', '2021-12-22', 'Viral', 'Doctor Second', '2021-12-26', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date_reg` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `position` int(10) NOT NULL,
  `last_login` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `phone`, `email`, `password`, `status`, `date_reg`, `position`, `last_login`) VALUES
(12, 'Admin', '-', '0678578950', 'admin@gmail.com', 'admin', 'Admin', '2021-12-26 06:15:55.154298', 2, '26th December, 2021 07:15:55 AM'),
(15, 'Harris', 'Joe', '0778909090', 'labtech@gmail.com', 'admin', 'Lab Technician', '2021-11-02 15:12:43.216415', 1, '2nd November, 2021 04:12:43 PM'),
(16, 'Khadija', 'Khamis', '0711787876', 'pharmasist@gmail.com', '12345', 'Pharmasist', '2021-11-02 15:15:43.102348', 1, '2nd November, 2021 04:15:43 PM'),
(31, 'Abuu', 'Juma', '0779876543', 'doctor@gmail.com', 'test1234', 'Doctor', '2021-12-26 05:20:37.807764', 1, '26th December, 2021 06:20:37 AM'),
(36, 'Aisha', 'Deo', '0799909090', 'receptionist@gmail.com', 'HCMS123', 'Receptionist', '2021-11-15 14:33:35.831439', 1, '15th November, 2021 03:33:35 PM'),
(37, 'doctor', '.', '1234567890', 'doctor1@gmail.com', 'HCMS123', 'Doctor', '2021-11-15 14:34:45.646143', 1, '15th November, 2021 03:34:45 PM'),
(38, 'Reception', 'Second', '1234456567', 'reception2@gmail.com', 'HCMS123', 'Receptionist', '2021-12-26 06:14:54.761777', 1, '26th December, 2021 07:14:54 AM'),
(39, 'Doctor', 'Second', '12345667890', 'doctor2@gmail.com', 'HCMS123', 'Doctor', '2021-12-26 06:22:22.511584', 1, '26th December, 2021 07:22:22 AM'),
(40, 'Lab', 'Second', '1234567890', 'lab2@gmail.com', 'HCMS123', 'Lab Technician', '2021-12-26 06:19:23.728248', 1, '26th December, 2021 07:19:23 AM');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

CREATE TABLE `vaccine` (
  `id` int(10) NOT NULL,
  `name` varchar(225) NOT NULL,
  `dname` varchar(258) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `status` varchar(10) NOT NULL,
  `vac_nme` varchar(50) NOT NULL,
  `reg_dte` varchar(50) NOT NULL,
  `aadhar` varchar(225) NOT NULL,
  `dosh_no` varchar(20) NOT NULL,
  `reg_upd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vaccine`
--

INSERT INTO `vaccine` (`id`, `name`, `dname`, `phone`, `status`, `vac_nme`, `reg_dte`, `aadhar`, `dosh_no`, `reg_upd`) VALUES
(17, 'pooja', 'pooja', '124501', 'Done', 'covishield', '29-Oct-2021 - 03:07:41 PM', '0154445857878', '1', '29-Oct-2021 - 03:35:31 PM'),
(18, 'Rishikesh', '', '8237391421', 'Register', 'Covaxin', '29-Oct-2021 - 03:13:20 PM', '78945-2535-1541', '2', '');

-- --------------------------------------------------------

--
-- Table structure for table `vacc_stk`
--

CREATE TABLE `vacc_stk` (
  `id` int(10) NOT NULL,
  `date` varchar(50) NOT NULL,
  `vac_name` varchar(10) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vacc_stk`
--

INSERT INTO `vacc_stk` (`id`, `date`, `vac_name`, `quantity`, `price`) VALUES
(1, '2021-10-06', 'Covaxin', '5000', 100),
(2, '2021-10-29', 'covishield', '2000', 5400);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appoint_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `fitness`
--
ALTER TABLE `fitness`
  ADD PRIMARY KEY (`fit_id`);

--
-- Indexes for table `lab_appoint`
--
ALTER TABLE `lab_appoint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_results`
--
ALTER TABLE `lab_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `malipo`
--
ALTER TABLE `malipo`
  ADD PRIMARY KEY (`malipo_id`);

--
-- Indexes for table `medication`
--
ALTER TABLE `medication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`presc_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`rep_id`);

--
-- Indexes for table `sick_description`
--
ALTER TABLE `sick_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vacc_stk`
--
ALTER TABLE `vacc_stk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appoint_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `fitness`
--
ALTER TABLE `fitness`
  MODIFY `fit_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab_appoint`
--
ALTER TABLE `lab_appoint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `lab_results`
--
ALTER TABLE `lab_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `malipo`
--
ALTER TABLE `malipo`
  MODIFY `malipo_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `medication`
--
ALTER TABLE `medication`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `presc_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `rep_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sick_description`
--
ALTER TABLE `sick_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `vacc_stk`
--
ALTER TABLE `vacc_stk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
