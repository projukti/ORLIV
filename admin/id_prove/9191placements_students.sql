-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2014 at 09:49 PM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `placements_students`
--

CREATE TABLE IF NOT EXISTS `placements_students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `batch_id` varchar(255) NOT NULL,
  `placement_id` varchar(255) NOT NULL,
  `student` varchar(255) NOT NULL,
  `registration` varchar(255) NOT NULL,
  `approve` varchar(255) NOT NULL,
  `attendance` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `placements_students`
--

INSERT INTO `placements_students` (`id`, `batch_id`, `placement_id`, `student`, `registration`, `approve`, `attendance`, `status`) VALUES
(1, '2', '3', 'ADMNO/1/2014', '1', '1', 'n', 'notplaced'),
(2, '2', '3', 'ADMNO/2/2014', '0', '0', '0', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
