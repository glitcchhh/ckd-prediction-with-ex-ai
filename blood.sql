-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2024 at 09:49 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blood`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(225) NOT NULL,
  `doctor_id` varchar(225) NOT NULL,
  `slot_id` varchar(20) NOT NULL,
  `hospitalname` varchar(225) NOT NULL,
  `problem` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL,
  `slot_status` varchar(20) NOT NULL,
  `date` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `uid`, `doctor_id`, `slot_id`, `hospitalname`, `problem`, `status`, `slot_status`, `date`) VALUES
(2, '7', '6', '21', '9', 'headache', 'Approved', '1', '2024-04-01'),
(3, '7', '6', '22', '9', 'headache', 'Approved', '1', '2024-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `message` text NOT NULL,
  `userid` int(20) NOT NULL,
  `date_time` varchar(20) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sid`, `message`, `userid`, `date_time`, `type`) VALUES
(1, 7, 'haiii', 6, '2024-04-01 15:29:08', 'user'),
(2, 7, 'hellooooo', 7, '2024-04-01 15:31:25', 'user'),
(3, 7, 'hai paul doctor', 6, '2024-04-01 15:39:09', 'user'),
(4, 7, 'ff', 6, '2024-04-01 23:13:35', 'user'),
(5, 8, 'good morning doctor', 6, '2024-04-01 23:14:46', 'user'),
(6, 7, 'hi anandhu', 6, '2024-04-01 23:29:11', 'doctor'),
(7, 7, 'hi', 6, '2024-04-17 14:04:59', 'user'),
(8, 7, 'hi good mornf', 6, '2024-04-19 12:17:41', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE IF NOT EXISTS `consultation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `problem` varchar(255) NOT NULL,
  `symptoms` text NOT NULL,
  `findings` text NOT NULL,
  `medicines` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`id`, `patient_id`, `hospital_id`, `doctor_id`, `date`, `problem`, `symptoms`, `findings`, `medicines`) VALUES
(1, 7, 6, 6, '2023-11-25', 'Fever headache', 'high temperature', 'Viral fever.', 'Dolo, Aspirin');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE IF NOT EXISTS `doctors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `category` varchar(100) NOT NULL,
  `phno` bigint(11) NOT NULL,
  `hospname` varchar(150) NOT NULL,
  `consultation_fee` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `email`, `password`, `category`, `phno`, `hospname`, `consultation_fee`) VALUES
(6, 'Paul', 'paul@gmail.com', '123', 'Physician', 7355612288, '9', '500'),
(7, 'Nasreen', 'nasreen7@gmail.com', 'Nasreen@999', 'neuro', 1234567890, '5', '1000'),
(8, 'anju', 'paul@gmail.com', '123', 'Corporate law', 7355612288, '9', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `exercise`
--

CREATE TABLE IF NOT EXISTS `exercise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `description` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `exercise`
--

INSERT INTO `exercise` (`id`, `name`, `description`) VALUES
(1, 'Jithin Babu', 'tyut'),
(2, 'q', 'qwer');

-- --------------------------------------------------------

--
-- Table structure for table `glc_level`
--

CREATE TABLE IF NOT EXISTS `glc_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(20) NOT NULL,
  `glc_level` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `glc_level`
--

INSERT INTO `glc_level` (`id`, `uid`, `glc_level`, `date`) VALUES
(1, '1', '99', '2022-07-30'),
(2, '1', '100', '22-07-21'),
(3, '1', '129', '22-07-19'),
(4, '1', '111', '22-07-23'),
(5, '1', '130', '22-07-10'),
(6, '1', '97', '22-07-12'),
(7, '1', '127', '22-07-14'),
(8, '1', '92', '22-07-17'),
(10, '1', '119', '22-07-20'),
(11, '1', '150', '22-07-26'),
(12, '1', '98', '22-07-31');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE IF NOT EXISTS `hospital` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(225) NOT NULL,
  `phone` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `name`, `location`, `email`, `password`, `phone`) VALUES
(9, 'Renai Medicity', 'kochi', 'renai@gmail.com', '123', '7355612288'),
(10, 'Baby Care', 'kochi', 'rj@gmail.com', '1111', '7355612289');

-- --------------------------------------------------------

--
-- Table structure for table `medical`
--

CREATE TABLE IF NOT EXISTS `medical` (
  `meds` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE IF NOT EXISTS `medicine` (
  `category` varchar(50) NOT NULL,
  `medname` varchar(100) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`category`, `medname`, `id`) VALUES
('english', 'metformin', 1),
('english', 'metformin', 2),
('english', 'metformin', 3);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(225) NOT NULL,
  `doctor_id` varchar(225) NOT NULL,
  `hospital_id` varchar(225) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `amount` varchar(25) NOT NULL,
  `cardname` varchar(200) NOT NULL,
  `cardnumber` varchar(225) NOT NULL,
  `card_type` varchar(225) NOT NULL,
  `cardyear` varchar(225) NOT NULL,
  `cardmonth` varchar(225) NOT NULL,
  `cvv` varchar(225) NOT NULL,
  `date` varchar(225) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `uid`, `doctor_id`, `hospital_id`, `appointment_id`, `amount`, `cardname`, `cardnumber`, `card_type`, `cardyear`, `cardmonth`, `cvv`, `date`, `status`) VALUES
(1, '7', '6', '6', 1, '500', 'Roshan', '1234567765432123', 'debit', '2024', '10', '123', '2023-11-25 12:25:48', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `password`, `phone`, `email`, `address`) VALUES
(1, 'john', '123', '0', 'rj@gmail.com', ''),
(2, 'sara', '12345', '5555555', 'sadsdscvfg@kjk', ''),
(3, 'llll', 'jjjj', '0', 'iuhdfhfjfhjfh', ''),
(4, 'javed', 'sarajaved', '2147483647', 'javed@gmail.com', ''),
(5, 'Shabna Sara Jithin', '122', '7654234566', 'ammu@gmail.com', 'kollamm'),
(6, 'John', '', '9825561890', '', ''),
(7, 'Anandhu', '123', '7355612288', 'mike@gmail.com', 'kochi'),
(8, 'safna ka', 'Safna@999', '9526317417', 'safnaka@gmail.com', 'kalappurackal');

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE IF NOT EXISTS `slot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_id` varchar(11) NOT NULL,
  `slot` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`id`, `doc_id`, `slot`) VALUES
(1, '4', '11:00-11:30'),
(2, '4', '11:30-12:00'),
(3, '4', '12:00-12:30'),
(4, '4', '14:00-14:30'),
(5, '4', '15:00-15:30'),
(6, '4', '15:30-16:00'),
(7, '4', '16:30-17:00'),
(9, '5', '11:00-11:30'),
(10, '5', '11:30-12:00'),
(11, '5', '12:00-12:30'),
(12, '5', '15:30-16:00'),
(13, '5', '14:00-14:30'),
(14, '3', '11:00-11:30'),
(15, '3', '11:30-12:00'),
(16, '2', '11:00-11:30'),
(17, '2', '11:30-12:00'),
(18, '2', '15:00-15:30'),
(21, '6', '10:00 - 10:30'),
(22, '6', '10:30 - 11:00'),
(23, '6', '11:30 - 12:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(200) NOT NULL,
  `weight` float NOT NULL,
  `height` float NOT NULL,
  `bmi` float NOT NULL,
  `age` int(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `medical_history` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `uid`, `weight`, `height`, `bmi`, `age`, `gender`, `medical_history`) VALUES
(1, '7', 50, 160, 19.53, 21, 'male', 'asthma. taking medicines');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
