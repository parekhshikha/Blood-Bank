-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 09, 2021 at 09:44 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blood_bank`
--
CREATE DATABASE IF NOT EXISTS `blood_bank` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blood_bank`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `admin_id` int(10) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `email_id`, `pwd`) VALUES
(1, 'admin@bloodbank.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `blood_detail`
--

CREATE TABLE IF NOT EXISTS `blood_detail` (
  `blood_id` int(10) NOT NULL,
  `blood_group` varchar(3) NOT NULL,
  `qty` int(10) NOT NULL,
  `qty_plasma` int(10) NOT NULL,
  PRIMARY KEY (`blood_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_detail`
--

INSERT INTO `blood_detail` (`blood_id`, `blood_group`, `qty`, `qty_plasma`) VALUES
(1, 'A+', 99, 50),
(2, 'B+', 150, 74),
(3, 'AB+', 200, 100),
(4, 'O+', 1, 25),
(5, 'A-', 100, 50),
(6, 'B-', 200, 100),
(7, 'AB-', 300, 150),
(8, 'O-', 50, 25);

-- --------------------------------------------------------

--
-- Table structure for table `donor_registration`
--

CREATE TABLE IF NOT EXISTS `donor_registration` (
  `donor_id` int(10) NOT NULL,
  `donor_name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `dob` date NOT NULL,
  `blood_group` varchar(3) NOT NULL,
  PRIMARY KEY (`donor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor_registration`
--

INSERT INTO `donor_registration` (`donor_id`, `donor_name`, `address`, `city`, `mobile_no`, `email_id`, `pwd`, `gender`, `dob`, `blood_group`) VALUES
(1, 'dev', 'valsad pardi', 'valsad', '7896543210', 'desaidwij29@gmail.com', '111111', 'MALE', '2000-05-29', 'O+'),
(2, 'meet', 'billimora', 'billimora', '7458963120', 'mehtameet94@gmail.com', '111111', 'MALE', '2000-08-29', 'O+');

-- --------------------------------------------------------

--
-- Table structure for table `receiver_regis`
--

CREATE TABLE IF NOT EXISTS `receiver_regis` (
  `receiver_id` int(10) NOT NULL,
  `receiver_name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  `gender` varchar(11) NOT NULL,
  PRIMARY KEY (`receiver_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receiver_regis`
--

INSERT INTO `receiver_regis` (`receiver_id`, `receiver_name`, `address`, `city`, `mobile_no`, `email_id`, `pwd`, `gender`) VALUES
(1, 'shikha parekh', 'halar', 'valsad', '7485963210', 'shikha@yahoo.com', '111111', 'FEMALE'),
(2, 'fanty', 'kolak', 'udwada', '7485963210', 'fanty@yahoo.com', '111111', 'FEMALE');

-- --------------------------------------------------------

--
-- Table structure for table `request_blood`
--

CREATE TABLE IF NOT EXISTS `request_blood` (
  `req_id` int(10) NOT NULL,
  `req_date` date NOT NULL,
  `receiver_id` int(10) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `hospital_name` varchar(50) NOT NULL,
  `blood_group` varchar(3) NOT NULL,
  `dr_prescription` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`req_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_blood`
--

INSERT INTO `request_blood` (`req_id`, `req_date`, `receiver_id`, `patient_name`, `hospital_name`, `blood_group`, `dr_prescription`, `status`) VALUES
(1, '2021-04-29', 1, 'kirit', '21st century', 'A+', 'pres_img/P1.png', 1),
(2, '2021-04-30', 2, 'dharmesh', 'chitrakut hospital', 'O+', 'pres_img/P2.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `request_blood_donor`
--

CREATE TABLE IF NOT EXISTS `request_blood_donor` (
  `req_d_id` int(10) NOT NULL,
  `req_date` date NOT NULL,
  `receiver_id` int(10) NOT NULL,
  `req_id` int(10) NOT NULL,
  `donor_id` int(10) NOT NULL,
  `req_status` int(1) NOT NULL,
  PRIMARY KEY (`req_d_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_blood_donor`
--

INSERT INTO `request_blood_donor` (`req_d_id`, `req_date`, `receiver_id`, `req_id`, `donor_id`, `req_status`) VALUES
(1, '2021-05-01', 2, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `request_plasma`
--

CREATE TABLE IF NOT EXISTS `request_plasma` (
  `request_plasma_id` int(10) NOT NULL,
  `req_date` date NOT NULL,
  `receiver_id` int(10) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `hospital_name` varchar(50) NOT NULL,
  `blood_group` varchar(3) NOT NULL,
  `dr_prescription` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`request_plasma_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_plasma`
--

INSERT INTO `request_plasma` (`request_plasma_id`, `req_date`, `receiver_id`, `patient_name`, `hospital_name`, `blood_group`, `dr_prescription`, `status`) VALUES
(1, '2021-04-29', 1, 'sejal', 'kasturba', 'B+', 'plasma_img/P1.png', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
