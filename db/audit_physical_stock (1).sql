-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 18, 2016 at 10:54 PM
-- Server version: 5.5.42-37.1-log
-- PHP Version: 5.4.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `orlivnet_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_physical_stock`
--

DROP TABLE IF EXISTS `audit_physical_stock`;
CREATE TABLE IF NOT EXISTS `audit_physical_stock` (
  `ph_stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `audt_code` varchar(100) NOT NULL,
  `asset_id` int(11) NOT NULL,
  `asset_type` varchar(255) NOT NULL,
  `classification` varchar(255) NOT NULL,
  `ph_stock_qunatity` bigint(20) NOT NULL,
  `avail_stock_qunatity` int(11) NOT NULL,
  `diff_stock_quantity` int(11) NOT NULL,
  `extra_stock_quantity` bigint(20) NOT NULL,
  `old_ph_stock_qunatity` bigint(20) NOT NULL,
  `notification_date` date NOT NULL,
  `approved` text NOT NULL,
  PRIMARY KEY (`ph_stock_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4185 ;

--
-- Dumping data for table `audit_physical_stock`
--

INSERT INTO `audit_physical_stock` (`ph_stock_id`, `audt_code`, `asset_id`, `asset_type`, `classification`, `ph_stock_qunatity`, `avail_stock_qunatity`, `diff_stock_quantity`, `extra_stock_quantity`, `old_ph_stock_qunatity`, `notification_date`, `approved`) VALUES
(162, 'LOC134160111', 0, 'INTERIOR', 'Owned', 0, 0, 0, 0, 0, '0000-00-00', ''),
(163, 'LOC134160111', 0, 'CHAIRS', 'Owned', 46, 46, 37, 0, 9, '2016-01-15', 'Y'),
(164, 'LOC134160111', 0, 'SIGNAGE BOARD', 'Owned', 2, 0, 0, 0, 0, '0000-00-00', ''),
(165, 'LOC134160111', 0, 'TELEPHONE INSTRUMENTS', 'Owned', 40, 0, 0, 0, 0, '0000-00-00', ''),
(166, 'LOC134160111', 0, 'MUSICAL INSTRUMENTS', 'Owned', 1, 0, 0, 0, 0, '0000-00-00', ''),
(167, 'LOC134160111', 0, 'EPABX', 'Owned', 1, 0, 0, 0, 0, '0000-00-00', ''),
(168, 'LOC134160111', 0, 'CASH VAULT', 'Owned', 2, 2, 1, 0, 1, '2016-01-15', 'Y'),
(169, 'LOC134160111', 0, 'SPEAKER', 'Owned', 2, 0, 0, 0, 0, '0000-00-00', ''),
(170, 'LOC134160111', 0, 'SCANNER', 'Owned', 1, 0, 0, 0, 0, '0000-00-00', ''),
(171, 'LOC134160111', 0, 'FAN', 'Owned', 7, 0, 0, 0, 0, '0000-00-00', ''),
(172, 'LOC134160111', 0, 'CCTV SYSTEM', 'Owned', 3, 3, 1, 0, 2, '2016-01-15', 'Y'),
(173, 'LOC134160111', 0, 'TOKEN DISPENSER UNIT', 'Owned', 1, 0, 0, 0, 0, '0000-00-00', ''),
(174, 'LOC134160111', 0, 'FAKE NOTE DETECTOR', 'Owned', 1, 0, 0, 0, 0, '0000-00-00', ''),
(175, 'LOC134160111', 0, 'SOFT BOARD', 'Owned', 17, 17, 16, 0, 1, '2016-01-15', 'Y'),
(176, 'LOC134160111', 0, 'TOKEN DISPLAY', 'Owned', 1, 0, 0, 0, 0, '0000-00-00', ''),
(177, 'LOC134160111', 0, 'FIRE EXTINGUISHER', 'Owned', 3, 0, 0, 0, 0, '0000-00-00', ''),
(178, 'LOC134160111', 0, 'LAPTOP', 'Owned', 8, 8, 4, 0, 2, '2016-01-15', 'Y'),
(179, 'LOC134160111', 0, 'TABLET', 'Owned', 10, 0, 0, 0, 0, '0000-00-00', ''),
(180, 'LOC134160111', 0, 'DESKTOP', 'Owned', 13, 0, 0, 0, 0, '0000-00-00', ''),
(181, 'LOC134160111', 0, 'WEB CAMERA', 'Owned', 3, 0, 0, 0, 0, '0000-00-00', ''),
(182, 'LOC134160111', 0, 'ROUTER', 'Owned', 3, 3, 2, 0, 1, '2016-01-15', 'Y'),
(2312, 'LOC134160111', 0, '3 SEATER CHAIR', 'Owned', 3, 0, 0, 0, 0, '0000-00-00', ''),
(2313, 'LOC134160111', 0, 'AIR CONDITIONER', 'Owned', 3, 0, 0, 0, 0, '0000-00-00', ''),
(2314, 'LOC134160111', 0, 'CAMERAS', 'Owned', 4, 0, 0, 0, 0, '0000-00-00', ''),
(2315, 'LOC134160111', 0, 'CHAIR-EXECUTIVE', 'Owned', 38, 0, 0, 0, 0, '0000-00-00', ''),
(2316, 'LOC134160111', 0, 'CHEQUE DROP BOX', 'Owned', 1, 0, 0, 0, 0, '0000-00-00', ''),
(2317, 'LOC134160111', 0, 'COFFE MACHINE', 'Owned', 1, 0, 0, 0, 0, '0000-00-00', ''),
(2318, 'LOC134160111', 0, 'CUSTOMER TABLE', 'Owned', 1, 0, 0, 0, 0, '0000-00-00', ''),
(2319, 'LOC134160111', 0, 'EXHAUST FAN', 'Owned', 3, 0, 0, 0, 0, '0000-00-00', ''),
(2320, 'LOC134160111', 0, 'WALL FAN', 'Owned', 1, 0, 0, 0, 0, '0000-00-00', ''),
(2321, 'LOC134160111', 0, 'STAND FAN', 'Owned', 4, 0, 0, 0, 0, '0000-00-00', ''),
(2322, 'LOC134160111', 0, 'FCP BOX', 'Owned', 1, 0, 0, 0, 0, '0000-00-00', ''),
(2323, 'LOC134160111', 0, 'FIRE EXTINGUISHER-CO2', 'Owned', 1, 0, 0, 0, 0, '0000-00-00', ''),
(2324, 'LOC134160111', 0, 'FIRE PANEL', 'Owned', 1, 0, 0, 0, 0, '0000-00-00', ''),
(2325, 'LOC134160111', 0, 'FIRE SAFETY KIT', 'Owned', 1, 0, 0, 0, 0, '0000-00-00', ''),
(2326, 'LOC134160111', 0, 'FIRST AID BOX', 'Owned', 1, 0, 0, 0, 0, '0000-00-00', ''),
(2327, 'LOC134160111', 0, 'HOOTER', 'Owned', 2, 0, 0, 0, 0, '0000-00-00', ''),
(2328, 'LOC134160111', 0, 'KEYBOX', 'Owned', 2, 0, 0, 0, 0, '0000-00-00', ''),
(2329, 'LOC134160111', 0, 'MANAGER TABLE', 'Owned', 1, 0, 0, 0, 0, '0000-00-00', ''),
(2330, 'LOC134160111', 0, 'WORKSTATION', 'Owned', 38, 0, 0, 0, 0, '0000-00-00', ''),
(2331, 'LOC134160111', 0, 'MEETING TABLE', 'Owned', 2, 0, 0, 0, 0, '0000-00-00', ''),
(2332, 'LOC134160111', 0, 'PEDESTRIAL CHUB', 'Owned', 30, 0, 0, 0, 0, '0000-00-00', ''),
(2333, 'LOC134160111', 0, 'PRINTER', 'Owned', 3, 0, 0, 0, 0, '0000-00-00', ''),
(2334, 'LOC134160111', 0, 'PROJECTOR', 'Owned', 2, 0, 0, 0, 0, '0000-00-00', ''),
(2335, 'LOC134160111', 0, 'SECURITY TABLE', 'Owned', 1, 0, 0, 0, 0, '0000-00-00', ''),
(2336, 'LOC134160111', 0, 'SERVER RACK', 'Owned', 1, 0, 0, 0, 0, '0000-00-00', ''),
(2337, 'LOC134160111', 0, 'WHITE BOARD', 'Owned', 5, 0, 0, 0, 0, '0000-00-00', ''),
(2338, 'LOC134160111', 0, 'WATER COOLER', 'Owned', 1, 0, 0, 0, 0, '0000-00-00', ''),
(2339, 'LOC134160111', 0, 'WALL CLOCK', 'Owned', 3, 0, 0, 0, 0, '0000-00-00', ''),
(2340, 'LOC134160111', 0, 'BATERRY RACK', 'Owned', 1, 0, 0, 0, 0, '0000-00-00', ''),
(2341, 'LOC134160111', 0, 'UPS-BATTERIES', 'Owned', 20, 0, 0, 0, 0, '0000-00-00', ''),
(2342, 'LOC134160111', 0, 'UPS', 'Owned', 1, 0, 0, 0, 0, '0000-00-00', ''),
(2343, 'LOC134160111', 0, 'TRAINING STANDING DESK', 'Owned', 1, 0, 0, 0, 0, '0000-00-00', ''),
(2344, 'LOC134160111', 0, 'SMOKE DETECTOR', 'Owned', 18, 0, 0, 0, 0, '0000-00-00', ''),
(2345, 'LOC134160111', 0, 'STEEL NAME PLATE', 'Owned', 3, 0, 0, 0, 0, '0000-00-00', ''),
(2346, 'LOC134160111', 0, 'STORAGE RACK', 'Owned', 2, 0, 0, 0, 0, '0000-00-00', ''),
(2347, 'LOC134160111', 0, 'TIME STAMPING MACHINE', 'Owned', 1, 0, 0, 0, 0, '0000-00-00', ''),
(2348, 'LOC134160111', 0, 'WOODEN CABINET', 'Owned', 12, 0, 0, 0, 0, '0000-00-00', ''),
(2349, 'LOC134160111', 0, 'CD PLAYER', 'Owned', 1, 0, 0, 0, 0, '0000-00-00', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
