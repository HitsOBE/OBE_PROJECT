-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2016 at 09:31 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hits_events`
--

-- --------------------------------------------------------

--
-- Table structure for table `co_po_mapping`
--

DROP TABLE IF EXISTS `co_po_mapping`;
CREATE TABLE IF NOT EXISTS `co_po_mapping` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `faculty_code` varchar(10) NOT NULL,
  `depart_code` varchar(4) NOT NULL,
  `programme_code` varchar(4) NOT NULL,
  `batch_code` varchar(4) NOT NULL,
  `semester_code` varchar(4) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `co_code` varchar(20) NOT NULL,
  `po1` varchar(20) NOT NULL,
  `po2` varchar(20) NOT NULL,
  `po3` varchar(20) NOT NULL,
  `po4` varchar(20) NOT NULL,
  `po5` varchar(20) NOT NULL,
  `po6` varchar(20) NOT NULL,
  `po7` varchar(20) NOT NULL,
  `po8` varchar(20) NOT NULL,
  `po9` varchar(20) NOT NULL,
  `po10` varchar(20) NOT NULL,
  `po11` varchar(20) NOT NULL,
  `po12` varchar(20) NOT NULL,
  `co_po_value` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
