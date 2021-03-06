-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2016 at 12:52 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE IF NOT EXISTS `audit_physical_stock` (
  `ph_stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `audt_code` varchar(100) NOT NULL,
  `asset_id` int(11) NOT NULL,
  `asset_type` varchar(255) NOT NULL,
  `classification` varchar(255) NOT NULL,
  `ph_stock_qunatity` bigint(20) NOT NULL,
  `extra_stock_quantity` bigint(20) NOT NULL,
  `old_ph_stock_qunatity` bigint(20) NOT NULL,
  `notification_date` date NOT NULL,
  `approved` text NOT NULL,
  PRIMARY KEY (`ph_stock_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `audit_physical_stock`
--

INSERT INTO `audit_physical_stock` (`ph_stock_id`, `audt_code`, `asset_id`, `asset_type`, `classification`, `ph_stock_qunatity`, `extra_stock_quantity`, `old_ph_stock_qunatity`, `notification_date`, `approved`) VALUES
(1, 'LOC1193160106', 0, 'REMOTE MONITORING UNITS', 'Rented', 0, 0, 0, '0000-00-00', ''),
(2, 'LOC1193160106', 0, 'AIR CONDITIONER', 'Rented', 2, 0, 0, '0000-00-00', ''),
(3, 'LOC1193160106', 0, 'INTERIOR', 'Owned', 0, 0, 0, '0000-00-00', ''),
(4, 'LOC1193160106', 0, 'CHAIRS', 'Owned', 19, 0, 0, '0000-00-00', ''),
(5, 'LOC1193160106', 0, 'SIGNAGE BOARD', 'Owned', 1, 0, 0, '0000-00-00', ''),
(6, 'LOC1193160106', 0, 'CASH VAULT', 'Owned', 0, 0, 0, '0000-00-00', ''),
(7, 'LOC1193160106', 0, 'PROJECTOR', 'Owned', 1, 0, 0, '0000-00-00', ''),
(8, 'LOC1193160106', 0, 'SPEAKER', 'Owned', 2, 0, 0, '0000-00-00', ''),
(9, 'LOC1193160106', 0, 'TIME STAMPING MACHINE', 'Owned', 1, 0, 0, '0000-00-00', ''),
(10, 'LOC1193160106', 0, 'SCANNER', 'Owned', 0, 0, 0, '0000-00-00', ''),
(11, 'LOC1193160106', 0, 'FAKE NOTE DITECTOR', 'Owned', 1, 0, 0, '0000-00-00', ''),
(12, 'LOC1193160106', 0, 'SOFT BOARD', 'Owned', 56, 0, 0, '0000-00-00', ''),
(13, 'LOC1193160106', 0, 'FIRE EXTINGUISHER', 'Owned', 1, 0, 0, '0000-00-00', ''),
(14, 'LOC1193160106', 0, 'CCTV System', 'Owned', 0, 0, 0, '0000-00-00', ''),
(15, 'LOC1193160106', 0, 'LAPTOP', 'Owned', 0, 0, 0, '0000-00-00', ''),
(16, 'LOC1193160106', 0, 'DESKTOP', 'Owned', 6, 0, 0, '0000-00-00', ''),
(17, 'LOC1193160106', 0, 'APPLE IPAD MINI', 'Owned', 0, 0, 0, '0000-00-00', ''),
(18, 'LOC1193160106', 0, 'UPS', 'Owned', 1, 0, 0, '0000-00-00', ''),
(19, 'LOC1193160106', 0, 'CASH COUNTING MACHINE', 'Owned', 1, 0, 0, '0000-00-00', ''),
(20, 'LOC1193160106', 0, 'WATER COOLER', 'Owned', 1, 0, 0, '0000-00-00', ''),
(21, 'LOC1193160106', 0, 'CASH SAFE', 'Owned', 1, 0, 0, '0000-00-00', ''),
(22, 'LOC1193160106', 0, 'UPS-BATTERIES', 'Owned', 16, 0, 0, '0000-00-00', ''),
(23, 'LOC1193160106', 0, 'UPS-BATTERIES STAND', 'Owned', 1, 0, 0, '0000-00-00', ''),
(24, 'LOC1193160106', 0, 'FIRE PANEL', 'Owned', 1, 0, 0, '0000-00-00', ''),
(25, 'LOC1193160106', 0, 'HOOTER', 'Owned', 1, 0, 0, '0000-00-00', ''),
(26, 'LOC1193160106', 0, 'SMOKE DETECTOR', 'Owned', 8, 0, 0, '0000-00-00', ''),
(27, 'LOC1193160106', 0, 'FIRE EXTINGUISHER-CO2', 'Owned', 1, 0, 0, '0000-00-00', ''),
(28, 'LOC1193160106', 0, 'PRINTER', 'Owned', 2, 0, 0, '0000-00-00', ''),
(29, 'LOC1193160106', 0, 'EXHAUST FAN', 'Owned', 3, 0, 0, '0000-00-00', ''),
(30, 'LOC1193160106', 0, 'MUSIC SYSTEM', 'Owned', 1, 0, 0, '0000-00-00', ''),
(31, 'LOC1193160106', 0, 'TRAINING ROOM SPEAKER', 'Owned', 1, 0, 0, '0000-00-00', ''),
(32, 'LOC1193160106', 0, 'TELEPHONE SET', 'Owned', 3, 0, 0, '0000-00-00', ''),
(33, 'LOC1193160106', 0, 'PEDESTRIAL CHUB', 'Owned', 12, 0, 0, '0000-00-00', ''),
(34, 'LOC1193160106', 0, 'WOODEN CABINET', 'Owned', 3, 0, 0, '0000-00-00', ''),
(35, 'LOC1193160106', 0, 'MANGER TABLE', 'Owned', 1, 0, 0, '0000-00-00', ''),
(36, 'LOC1193160106', 0, 'MODULAR TABLE/WORK STATION', 'Owned', 9, 0, 0, '0000-00-00', ''),
(37, 'LOC1193160106', 0, 'CUSTOMER TABLE', 'Owned', 1, 0, 0, '0000-00-00', ''),
(38, 'LOC1193160106', 0, 'SERVER BOX', 'Owned', 1, 0, 0, '0000-00-00', ''),
(39, 'LOC1193160106', 0, 'OVEN', 'Owned', 1, 0, 0, '0000-00-00', ''),
(40, 'LOC1193160106', 0, 'WHITE BOARD', 'Owned', 2, 0, 0, '0000-00-00', ''),
(41, 'LOC1193160106', 0, 'MODEM', 'Owned', 1, 0, 0, '0000-00-00', ''),
(42, 'LOC1193160106', 0, 'COFFE MACHINE', 'Owned', 1, 0, 0, '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `audit_physical_stock_details`
--

CREATE TABLE IF NOT EXISTS `audit_physical_stock_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `audt_code` varchar(100) NOT NULL,
  `ph_stock_id` int(11) NOT NULL,
  `asset_id` int(11) NOT NULL,
  `asset_barcode` varchar(100) NOT NULL,
  `barcode_details` varchar(255) NOT NULL,
  `verify` text NOT NULL,
  `is_audit` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=165 ;

--
-- Dumping data for table `audit_physical_stock_details`
--

INSERT INTO `audit_physical_stock_details` (`id`, `audt_code`, `ph_stock_id`, `asset_id`, `asset_barcode`, `barcode_details`, `verify`, `is_audit`) VALUES
(1, 'LOC1193160106', 2, 0, 'ARCR11930', 'ARC-R-1193-0', '', ''),
(2, 'LOC1193160106', 2, 0, 'ARCR11931', 'ARC-R-1193-1', '', ''),
(3, 'LOC1193160106', 4, 0, 'CHRO11930', 'CHR-O-1193-0', '', ''),
(4, 'LOC1193160106', 4, 0, 'CHRO11931', 'CHR-O-1193-1', '', ''),
(5, 'LOC1193160106', 4, 0, 'CHRO11932', 'CHR-O-1193-2', '', ''),
(6, 'LOC1193160106', 4, 0, 'CHRO11933', 'CHR-O-1193-3', '', ''),
(7, 'LOC1193160106', 4, 0, 'CHRO11934', 'CHR-O-1193-4', '', ''),
(8, 'LOC1193160106', 4, 0, 'CHRO11935', 'CHR-O-1193-5', '', ''),
(9, 'LOC1193160106', 4, 0, 'CHRO11936', 'CHR-O-1193-6', '', ''),
(10, 'LOC1193160106', 4, 0, 'CHRO11937', 'CHR-O-1193-7', '', ''),
(11, 'LOC1193160106', 4, 0, 'CHRO11938', 'CHR-O-1193-8', '', ''),
(12, 'LOC1193160106', 4, 0, 'CHRO11939', 'CHR-O-1193-9', '', ''),
(13, 'LOC1193160106', 4, 0, 'CHRO119310', 'CHR-O-1193-10', '', ''),
(14, 'LOC1193160106', 4, 0, 'CHRO119311', 'CHR-O-1193-11', '', ''),
(15, 'LOC1193160106', 4, 0, 'CHRO119312', 'CHR-O-1193-12', '', ''),
(16, 'LOC1193160106', 4, 0, 'CHRO119313', 'CHR-O-1193-13', '', ''),
(17, 'LOC1193160106', 4, 0, 'CHRO119314', 'CHR-O-1193-14', '', ''),
(18, 'LOC1193160106', 4, 0, 'CHRO119315', 'CHR-O-1193-15', '', ''),
(19, 'LOC1193160106', 4, 0, 'CHRO119316', 'CHR-O-1193-16', '', ''),
(20, 'LOC1193160106', 4, 0, 'CHRO119317', 'CHR-O-1193-17', '', ''),
(21, 'LOC1193160106', 4, 0, 'CHRO119318', 'CHR-O-1193-18', '', ''),
(22, 'LOC1193160106', 5, 0, 'SGBO11930', 'SGB-O-1193-0', '', ''),
(23, 'LOC1193160106', 7, 0, 'PRJO11930', 'PRJ-O-1193-0', '', ''),
(24, 'LOC1193160106', 8, 0, 'SPKO11930', 'SPK-O-1193-0', '', ''),
(25, 'LOC1193160106', 8, 0, 'SPKO11931', 'SPK-O-1193-1', '', ''),
(26, 'LOC1193160106', 9, 0, 'TSMO11930', 'TSM-O-1193-0', '', ''),
(27, 'LOC1193160106', 11, 0, 'FNDO11930', 'FND-O-1193-0', '', ''),
(28, 'LOC1193160106', 12, 0, 'SFBO11930', 'SFB-O-1193-0', '', ''),
(29, 'LOC1193160106', 12, 0, 'SFBO11931', 'SFB-O-1193-1', '', ''),
(30, 'LOC1193160106', 12, 0, 'SFBO11932', 'SFB-O-1193-2', '', ''),
(31, 'LOC1193160106', 12, 0, 'SFBO11933', 'SFB-O-1193-3', '', ''),
(32, 'LOC1193160106', 12, 0, 'SFBO11934', 'SFB-O-1193-4', '', ''),
(33, 'LOC1193160106', 12, 0, 'SFBO11935', 'SFB-O-1193-5', '', ''),
(34, 'LOC1193160106', 12, 0, 'SFBO11936', 'SFB-O-1193-6', '', ''),
(35, 'LOC1193160106', 12, 0, 'SFBO11937', 'SFB-O-1193-7', '', ''),
(36, 'LOC1193160106', 12, 0, 'SFBO11938', 'SFB-O-1193-8', '', ''),
(37, 'LOC1193160106', 12, 0, 'SFBO11939', 'SFB-O-1193-9', '', ''),
(38, 'LOC1193160106', 12, 0, 'SFBO119310', 'SFB-O-1193-10', '', ''),
(39, 'LOC1193160106', 12, 0, 'SFBO119311', 'SFB-O-1193-11', '', ''),
(40, 'LOC1193160106', 12, 0, 'SFBO119312', 'SFB-O-1193-12', '', ''),
(41, 'LOC1193160106', 12, 0, 'SFBO119313', 'SFB-O-1193-13', '', ''),
(42, 'LOC1193160106', 12, 0, 'SFBO119314', 'SFB-O-1193-14', '', ''),
(43, 'LOC1193160106', 12, 0, 'SFBO119315', 'SFB-O-1193-15', '', ''),
(44, 'LOC1193160106', 12, 0, 'SFBO119316', 'SFB-O-1193-16', '', ''),
(45, 'LOC1193160106', 12, 0, 'SFBO119317', 'SFB-O-1193-17', '', ''),
(46, 'LOC1193160106', 12, 0, 'SFBO119318', 'SFB-O-1193-18', '', ''),
(47, 'LOC1193160106', 12, 0, 'SFBO119319', 'SFB-O-1193-19', '', ''),
(48, 'LOC1193160106', 12, 0, 'SFBO119320', 'SFB-O-1193-20', '', ''),
(49, 'LOC1193160106', 12, 0, 'SFBO119321', 'SFB-O-1193-21', '', ''),
(50, 'LOC1193160106', 12, 0, 'SFBO119322', 'SFB-O-1193-22', '', ''),
(51, 'LOC1193160106', 12, 0, 'SFBO119323', 'SFB-O-1193-23', '', ''),
(52, 'LOC1193160106', 12, 0, 'SFBO119324', 'SFB-O-1193-24', '', ''),
(53, 'LOC1193160106', 12, 0, 'SFBO119325', 'SFB-O-1193-25', '', ''),
(54, 'LOC1193160106', 12, 0, 'SFBO119326', 'SFB-O-1193-26', '', ''),
(55, 'LOC1193160106', 12, 0, 'SFBO119327', 'SFB-O-1193-27', '', ''),
(56, 'LOC1193160106', 12, 0, 'SFBO119328', 'SFB-O-1193-28', '', ''),
(57, 'LOC1193160106', 12, 0, 'SFBO119329', 'SFB-O-1193-29', '', ''),
(58, 'LOC1193160106', 12, 0, 'SFBO119330', 'SFB-O-1193-30', '', ''),
(59, 'LOC1193160106', 12, 0, 'SFBO119331', 'SFB-O-1193-31', '', ''),
(60, 'LOC1193160106', 12, 0, 'SFBO119332', 'SFB-O-1193-32', '', ''),
(61, 'LOC1193160106', 12, 0, 'SFBO119333', 'SFB-O-1193-33', '', ''),
(62, 'LOC1193160106', 12, 0, 'SFBO119334', 'SFB-O-1193-34', '', ''),
(63, 'LOC1193160106', 12, 0, 'SFBO119335', 'SFB-O-1193-35', '', ''),
(64, 'LOC1193160106', 12, 0, 'SFBO119336', 'SFB-O-1193-36', '', ''),
(65, 'LOC1193160106', 12, 0, 'SFBO119337', 'SFB-O-1193-37', '', ''),
(66, 'LOC1193160106', 12, 0, 'SFBO119338', 'SFB-O-1193-38', '', ''),
(67, 'LOC1193160106', 12, 0, 'SFBO119339', 'SFB-O-1193-39', '', ''),
(68, 'LOC1193160106', 12, 0, 'SFBO119340', 'SFB-O-1193-40', '', ''),
(69, 'LOC1193160106', 12, 0, 'SFBO119341', 'SFB-O-1193-41', '', ''),
(70, 'LOC1193160106', 12, 0, 'SFBO119342', 'SFB-O-1193-42', '', ''),
(71, 'LOC1193160106', 12, 0, 'SFBO119343', 'SFB-O-1193-43', '', ''),
(72, 'LOC1193160106', 12, 0, 'SFBO119344', 'SFB-O-1193-44', '', ''),
(73, 'LOC1193160106', 12, 0, 'SFBO119345', 'SFB-O-1193-45', '', ''),
(74, 'LOC1193160106', 12, 0, 'SFBO119346', 'SFB-O-1193-46', '', ''),
(75, 'LOC1193160106', 12, 0, 'SFBO119347', 'SFB-O-1193-47', '', ''),
(76, 'LOC1193160106', 12, 0, 'SFBO119348', 'SFB-O-1193-48', '', ''),
(77, 'LOC1193160106', 12, 0, 'SFBO119349', 'SFB-O-1193-49', '', ''),
(78, 'LOC1193160106', 12, 0, 'SFBO119350', 'SFB-O-1193-50', '', ''),
(79, 'LOC1193160106', 12, 0, 'SFBO119351', 'SFB-O-1193-51', '', ''),
(80, 'LOC1193160106', 12, 0, 'SFBO119352', 'SFB-O-1193-52', '', ''),
(81, 'LOC1193160106', 12, 0, 'SFBO119353', 'SFB-O-1193-53', '', ''),
(82, 'LOC1193160106', 12, 0, 'SFBO119354', 'SFB-O-1193-54', '', ''),
(83, 'LOC1193160106', 12, 0, 'SFBO119355', 'SFB-O-1193-55', '', ''),
(84, 'LOC1193160106', 13, 0, 'FEXO11930', 'FEX-O-1193-0', '', ''),
(85, 'LOC1193160106', 16, 0, 'DSKO11930', 'DSK-O-1193-0', '', ''),
(86, 'LOC1193160106', 16, 0, 'DSKO11931', 'DSK-O-1193-1', '', ''),
(87, 'LOC1193160106', 16, 0, 'DSKO11932', 'DSK-O-1193-2', '', ''),
(88, 'LOC1193160106', 16, 0, 'DSKO11933', 'DSK-O-1193-3', '', ''),
(89, 'LOC1193160106', 16, 0, 'DSKO11934', 'DSK-O-1193-4', '', ''),
(90, 'LOC1193160106', 16, 0, 'DSKO11935', 'DSK-O-1193-5', '', ''),
(91, 'LOC1193160106', 18, 0, 'UPSO11930', 'UPS-O-1193-0', '', ''),
(92, 'LOC1193160106', 19, 0, 'CCMO11930', 'CCM-O-1193-0', '', ''),
(93, 'LOC1193160106', 20, 0, 'WCLO11930', 'WCL-O-1193-0', '', ''),
(94, 'LOC1193160106', 21, 0, 'CSSO11930', 'CSS-O-1193-0', '', ''),
(95, 'LOC1193160106', 22, 0, 'UPBO11930', 'UPB-O-1193-0', '', ''),
(96, 'LOC1193160106', 22, 0, 'UPBO11931', 'UPB-O-1193-1', '', ''),
(97, 'LOC1193160106', 22, 0, 'UPBO11932', 'UPB-O-1193-2', '', ''),
(98, 'LOC1193160106', 22, 0, 'UPBO11933', 'UPB-O-1193-3', '', ''),
(99, 'LOC1193160106', 22, 0, 'UPBO11934', 'UPB-O-1193-4', '', ''),
(100, 'LOC1193160106', 22, 0, 'UPBO11935', 'UPB-O-1193-5', '', ''),
(101, 'LOC1193160106', 22, 0, 'UPBO11936', 'UPB-O-1193-6', '', ''),
(102, 'LOC1193160106', 22, 0, 'UPBO11937', 'UPB-O-1193-7', '', ''),
(103, 'LOC1193160106', 22, 0, 'UPBO11938', 'UPB-O-1193-8', '', ''),
(104, 'LOC1193160106', 22, 0, 'UPBO11939', 'UPB-O-1193-9', '', ''),
(105, 'LOC1193160106', 22, 0, 'UPBO119310', 'UPB-O-1193-10', '', ''),
(106, 'LOC1193160106', 22, 0, 'UPBO119311', 'UPB-O-1193-11', '', ''),
(107, 'LOC1193160106', 22, 0, 'UPBO119312', 'UPB-O-1193-12', '', ''),
(108, 'LOC1193160106', 22, 0, 'UPBO119313', 'UPB-O-1193-13', '', ''),
(109, 'LOC1193160106', 22, 0, 'UPBO119314', 'UPB-O-1193-14', '', ''),
(110, 'LOC1193160106', 22, 0, 'UPBO119315', 'UPB-O-1193-15', '', ''),
(111, 'LOC1193160106', 23, 0, 'UBSO11930', 'UBS-O-1193-0', '', ''),
(112, 'LOC1193160106', 24, 0, 'FRPO11930', 'FRP-O-1193-0', '', ''),
(113, 'LOC1193160106', 25, 0, 'HTRO11930', 'HTR-O-1193-0', '', ''),
(114, 'LOC1193160106', 26, 0, 'SMDO11930', 'SMD-O-1193-0', '', ''),
(115, 'LOC1193160106', 26, 0, 'SMDO11931', 'SMD-O-1193-1', '', ''),
(116, 'LOC1193160106', 26, 0, 'SMDO11932', 'SMD-O-1193-2', '', ''),
(117, 'LOC1193160106', 26, 0, 'SMDO11933', 'SMD-O-1193-3', '', ''),
(118, 'LOC1193160106', 26, 0, 'SMDO11934', 'SMD-O-1193-4', '', ''),
(119, 'LOC1193160106', 26, 0, 'SMDO11935', 'SMD-O-1193-5', '', ''),
(120, 'LOC1193160106', 26, 0, 'SMDO11936', 'SMD-O-1193-6', '', ''),
(121, 'LOC1193160106', 26, 0, 'SMDO11937', 'SMD-O-1193-7', '', ''),
(122, 'LOC1193160106', 27, 0, 'FECO11930', 'FEC-O-1193-0', '', ''),
(123, 'LOC1193160106', 28, 0, 'PRNO11930', 'PRN-O-1193-0', '', ''),
(124, 'LOC1193160106', 28, 0, 'PRNO11931', 'PRN-O-1193-1', '', ''),
(125, 'LOC1193160106', 29, 0, 'EXFO11930', 'EXF-O-1193-0', '', ''),
(126, 'LOC1193160106', 29, 0, 'EXFO11931', 'EXF-O-1193-1', '', ''),
(127, 'LOC1193160106', 29, 0, 'EXFO11932', 'EXF-O-1193-2', '', ''),
(128, 'LOC1193160106', 30, 0, 'MUSO11930', 'MUS-O-1193-0', '', ''),
(129, 'LOC1193160106', 31, 0, 'TRSO11930', 'TRS-O-1193-0', '', ''),
(130, 'LOC1193160106', 32, 0, 'TPSO11930', 'TPS-O-1193-0', '', ''),
(131, 'LOC1193160106', 32, 0, 'TPSO11931', 'TPS-O-1193-1', '', ''),
(132, 'LOC1193160106', 32, 0, 'TPSO11932', 'TPS-O-1193-2', '', ''),
(133, 'LOC1193160106', 33, 0, 'PECO11930', 'PEC-O-1193-0', '', ''),
(134, 'LOC1193160106', 33, 0, 'PECO11931', 'PEC-O-1193-1', '', ''),
(135, 'LOC1193160106', 33, 0, 'PECO11932', 'PEC-O-1193-2', '', ''),
(136, 'LOC1193160106', 33, 0, 'PECO11933', 'PEC-O-1193-3', '', ''),
(137, 'LOC1193160106', 33, 0, 'PECO11934', 'PEC-O-1193-4', '', ''),
(138, 'LOC1193160106', 33, 0, 'PECO11935', 'PEC-O-1193-5', '', ''),
(139, 'LOC1193160106', 33, 0, 'PECO11936', 'PEC-O-1193-6', '', ''),
(140, 'LOC1193160106', 33, 0, 'PECO11937', 'PEC-O-1193-7', '', ''),
(141, 'LOC1193160106', 33, 0, 'PECO11938', 'PEC-O-1193-8', '', ''),
(142, 'LOC1193160106', 33, 0, 'PECO11939', 'PEC-O-1193-9', '', ''),
(143, 'LOC1193160106', 33, 0, 'PECO119310', 'PEC-O-1193-10', '', ''),
(144, 'LOC1193160106', 33, 0, 'PECO119311', 'PEC-O-1193-11', '', ''),
(145, 'LOC1193160106', 34, 0, 'WOCO11930', 'WOC-O-1193-0', '', ''),
(146, 'LOC1193160106', 34, 0, 'WOCO11931', 'WOC-O-1193-1', '', ''),
(147, 'LOC1193160106', 34, 0, 'WOCO11932', 'WOC-O-1193-2', '', ''),
(148, 'LOC1193160106', 35, 0, 'MTBO11930', 'MTB-O-1193-0', '', ''),
(149, 'LOC1193160106', 36, 0, 'MOTO11930', 'MOT-O-1193-0', '', ''),
(150, 'LOC1193160106', 36, 0, 'MOTO11931', 'MOT-O-1193-1', '', ''),
(151, 'LOC1193160106', 36, 0, 'MOTO11932', 'MOT-O-1193-2', '', ''),
(152, 'LOC1193160106', 36, 0, 'MOTO11933', 'MOT-O-1193-3', '', ''),
(153, 'LOC1193160106', 36, 0, 'MOTO11934', 'MOT-O-1193-4', '', ''),
(154, 'LOC1193160106', 36, 0, 'MOTO11935', 'MOT-O-1193-5', '', ''),
(155, 'LOC1193160106', 36, 0, 'MOTO11936', 'MOT-O-1193-6', '', ''),
(156, 'LOC1193160106', 36, 0, 'MOTO11937', 'MOT-O-1193-7', '', ''),
(157, 'LOC1193160106', 36, 0, 'MOTO11938', 'MOT-O-1193-8', '', ''),
(158, 'LOC1193160106', 37, 0, 'CUTO11930', 'CUT-O-1193-0', '', ''),
(159, 'LOC1193160106', 38, 0, 'SVBO11930', 'SVB-O-1193-0', '', ''),
(160, 'LOC1193160106', 39, 0, 'OVNO11930', 'OVN-O-1193-0', '', ''),
(161, 'LOC1193160106', 40, 0, 'WHBO11930', 'WHB-O-1193-0', '', ''),
(162, 'LOC1193160106', 40, 0, 'WHBO11931', 'WHB-O-1193-1', '', ''),
(163, 'LOC1193160106', 41, 0, 'MODO11930', 'MOD-O-1193-0', '', ''),
(164, 'LOC1193160106', 42, 0, 'CFMO11930', 'CFM-O-1193-0', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `audit_physical_stock_info`
--

CREATE TABLE IF NOT EXISTS `audit_physical_stock_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `audt_code` varchar(100) NOT NULL,
  `audt_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `branch_code` text NOT NULL,
  `classification` varchar(100) NOT NULL,
  `entry_date` date NOT NULL,
  `audit_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `audit_physical_stock_info`
--

INSERT INTO `audit_physical_stock_info` (`id`, `audt_code`, `audt_id`, `branch_id`, `branch_code`, `classification`, `entry_date`, `audit_date`) VALUES
(1, 'LOC1193160106', 0, 0, 'LOC1193', 'Rented', '2016-01-06', '2016-01-06'),
(2, 'LOC1193160106', 0, 0, 'LOC1193', 'Owned', '2016-01-06', '2016-01-06');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
