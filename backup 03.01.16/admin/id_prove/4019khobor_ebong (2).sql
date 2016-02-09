-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 10, 2014 at 01:33 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `khobor_ebong`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad`
--

CREATE TABLE IF NOT EXISTS `ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catagory` varchar(255) NOT NULL,
  `feature_product_image` varchar(255) NOT NULL,
  `url` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `ad`
--

INSERT INTO `ad` (`id`, `catagory`, `feature_product_image`, `url`) VALUES
(8, '1', '539201.jpg', '#'),
(9, '1', '728002.jpg', '#'),
(10, '1', '375803.jpg', '#'),
(11, '2', '814601.jpg', '#'),
(12, '2', '375502.jpg', '#'),
(13, '2', '211903.jpg', '#'),
(14, '3', '425401.jpg', '#'),
(15, '3', '348202.jpg', '#'),
(16, '3', '446103.jpg', '#'),
(17, '4', '880801.jpg', '#'),
(18, '4', '815102.jpg', '#'),
(19, '4', '878703.jpg', '#'),
(20, '5', '906501.jpg', '#'),
(21, '5', '577602.jpg', '#'),
(22, '5', '921403.jpg', '#'),
(23, '1', '5617us-t.jpg', '#'),
(24, '2', '5502ch-t.jpg', 'www.hileder.com');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `user_ip` varchar(250) NOT NULL,
  `last_login_date` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usr` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`, `user_ip`, `last_login_date`) VALUES
(2, 'admin', '12345', 'localhost', '10/03/2014 04:55:25 pm');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'khobor_a_bangla.php'),
(2, 'bharat.php'),
(3, 'antarjatik.php'),
(4, 'siksha_o_career.php'),
(5, 'sastha_o_lifestyle.php'),
(6, 'fashion_o_festival.php'),
(7, 'bazar_o_business.php'),
(8, 'technology.php'),
(9, 'sports.php'),
(10, 'aaj.php'),
(11, 'ladies_special.php'),
(12, 'publink.php'),
(13, 'pendrive.php');

-- --------------------------------------------------------

--
-- Table structure for table `feature_slider`
--

CREATE TABLE IF NOT EXISTS `feature_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_image` varchar(250) NOT NULL,
  `path` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `feature_slider`
--

INSERT INTO `feature_slider` (`id`, `slider_image`, `path`) VALUES
(1, '01.jpg', 'http://khaborebong.com/antarjatik.php'),
(2, '02.jpg', 'http://khaborebong.com/sports.php'),
(3, '03.jpg', 'http://khaborebong.com/antarjatik.php'),
(4, '04.jpg', 'http://khaborebong.com/ladies_special.php');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `caption` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `caption_display` int(11) NOT NULL,
  `recent_news` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `category`, `caption`, `image`, `description`, `caption_display`, `recent_news`) VALUES
(1, 'siksha_o_career.php', 'prathomik siksha', 'download.jpg', 'yefglwaegftyrgdreyeryesrgdfgryg', 0, 0),
(2, 'ladies_special.php', 'ladies', 'd.png', 'jklhngdtteyuycbbcnsyhdn', 0, 1),
(3, 'bharat.php', 'uiiii', 'in-t.jpg', 'etrtt', 1, 0),
(4, 'bharat.php', 'bharat', '', 'bharat', 1, 0),
(5, 'aaj.php', 'fhh', '5602us-t.jpg', 'ertreydrh', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qs` longtext NOT NULL,
  `y` int(11) NOT NULL,
  `n` int(11) NOT NULL,
  `count` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `qs`, `y`, `n`, `count`) VALUES
(3, 'rgrhrddfhfdhfdh', 0, 0, 0),
(4, 'hyhyhyhyhyhyhy???', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `static_ads`
--

CREATE TABLE IF NOT EXISTS `static_ads` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `static_ads`
--

INSERT INTO `static_ads` (`id`, `url`, `image`) VALUES
(1, '#', '3937de-t.jpg'),
(2, '#', '2466uk-t.jpg'),
(3, '', ''),
(4, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL,
  `video_path` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `video_path`) VALUES
(1, 'dfxhxfgjfgjghkjghkgk');
