-- phpMyAdmin SQL Dump
-- version 3.4.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 21, 2014 at 12:02 AM
-- Server version: 5.5.36
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ivypharm_medicine`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

DROP TABLE IF EXISTS `admin_login`;
CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `user_ip` varchar(250) NOT NULL,
  `last_login_date` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usr` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`, `user_ip`, `last_login_date`) VALUES
(1, 'admin', '123', '103.249.4.39', '20/03/2014 07:11:36 am'),
(2, 'badmin', '12345', '103.249.4.39', '20/03/2014 07:09:49 am'),
(3, 'oadmin', '12345', '103.249.6.47', '28/01/2014 11:17:46 pm');

-- --------------------------------------------------------

--
-- Table structure for table `bihar_accounts`
--

DROP TABLE IF EXISTS `bihar_accounts`;
CREATE TABLE IF NOT EXISTS `bihar_accounts` (
  `acc_id` int(11) NOT NULL AUTO_INCREMENT,
  `particulars` varchar(250) NOT NULL,
  `debit` varchar(250) NOT NULL,
  `credit` varchar(250) NOT NULL,
  `on_date` date NOT NULL,
  `cust_name` varchar(250) NOT NULL,
  `customer_code` varchar(100) NOT NULL,
  `payment_mode` varchar(250) NOT NULL,
  `cheque_no` varchar(250) NOT NULL,
  `cheque_date` date NOT NULL,
  `invo_no` varchar(250) NOT NULL,
  `amount` varchar(250) NOT NULL,
  `temp_rand` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  PRIMARY KEY (`acc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `bihar_accounts`
--

INSERT INTO `bihar_accounts` (`acc_id`, `particulars`, `debit`, `credit`, `on_date`, `cust_name`, `customer_code`, `payment_mode`, `cheque_no`, `cheque_date`, `invo_no`, `amount`, `temp_rand`, `status`) VALUES
(1, 'Sale', '3838.00', '', '2014-03-17', 'astha drug', 'IVY-CUST2935', '', '', '0000-00-00', 'INVOICE(13/14)-1', '3838.00', '967420140317', ''),
(2, 'Sale', '8059.33', '', '2014-03-17', 'astha drug', 'IVY-CUST2935', '', '', '0000-00-00', 'INVOICE(13/14)-2', '8059.33', '904220140317', '');

-- --------------------------------------------------------

--
-- Table structure for table `bihar_cr_note`
--

DROP TABLE IF EXISTS `bihar_cr_note`;
CREATE TABLE IF NOT EXISTS `bihar_cr_note` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `packing` varchar(250) NOT NULL,
  `mrp_inc_tax` float NOT NULL,
  `mrp_inc_tax_amt` float NOT NULL,
  `category` varchar(100) NOT NULL,
  `vat_percent` varchar(100) NOT NULL,
  `mrp_exc_tax` float NOT NULL,
  `ptr` float NOT NULL,
  `tot_qty` float NOT NULL,
  `free` varchar(100) NOT NULL,
  `actual_qty` float NOT NULL,
  `expiry_date` date NOT NULL,
  `vat_amt` float NOT NULL,
  `net_amt` float NOT NULL,
  `temp_rand` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `present_date` date NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bihar_cr_note_info`
--

DROP TABLE IF EXISTS `bihar_cr_note_info`;
CREATE TABLE IF NOT EXISTS `bihar_cr_note_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial_no` varchar(250) NOT NULL,
  `credit_note_no` varchar(250) NOT NULL,
  `cr_date` varchar(250) NOT NULL,
  `customer_name` varchar(250) NOT NULL,
  `customer_tin_no` varchar(250) NOT NULL,
  `customer_cst_no` varchar(250) NOT NULL,
  `customer_dl_no` varchar(250) NOT NULL,
  `claim_date` varchar(250) NOT NULL,
  `total` float NOT NULL,
  `tax_amt5` float NOT NULL,
  `vat5` float NOT NULL,
  `tax_amt145` float NOT NULL,
  `vat145` float NOT NULL,
  `subtotal` float NOT NULL,
  `discount_percent` float NOT NULL,
  `discount` float NOT NULL,
  `net_bill` varchar(250) NOT NULL,
  `temp_rand` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `cash_discount` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bihar_depo`
--

DROP TABLE IF EXISTS `bihar_depo`;
CREATE TABLE IF NOT EXISTS `bihar_depo` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(200) NOT NULL,
  `product_code` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `mrp_inc_tax` float NOT NULL,
  `category` varchar(100) NOT NULL,
  `vat_percent` varchar(100) NOT NULL,
  `mrp_exc_tax` float NOT NULL,
  `ptr` float NOT NULL,
  `pts` float NOT NULL,
  `tot_qty` float NOT NULL,
  `free` varchar(100) NOT NULL,
  `actual_qty` float NOT NULL,
  `expiry_date` date NOT NULL,
  `present` date NOT NULL,
  `net_amt` float NOT NULL,
  `temp_rand` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `bihar_depo`
--

INSERT INTO `bihar_depo` (`p_id`, `product_id`, `product_code`, `product_name`, `batch_no`, `mrp_inc_tax`, `category`, `vat_percent`, `mrp_exc_tax`, `ptr`, `pts`, `tot_qty`, `free`, `actual_qty`, `expiry_date`, `present`, `net_amt`, `temp_rand`, `status`) VALUES
(18, '3', 'IVYPC6994', 'HELL SUSPENSION', 'ADL-151', 22.9, 'Drug', '5', 21.8095, 17.4476, 0, 800, '630', 0, '2014-04-30', '2014-02-20', 13958.1, '136220140220', 1),
(19, '25', 'IVYPC1569', 'RX JNR', 'ADL-223', 32, 'Drug', '5', 30.4762, 24.381, 0, 0, '225', 0, '2014-07-31', '2014-02-20', 0, '136220140220', 1),
(20, '25', 'IVYPC1569', 'RX JNR', 'ADL-385', 35, 'Drug', '5', 33.3333, 26.6667, 0, 3000, '206', 0, '2015-01-31', '2014-02-20', 80000, '136220140220', 1),
(21, '19', 'IVYPC9060', 'DECOSTA SUSP 60ML', 'ADL-03-167', 59.9, 'Drug', '5', 57.0476, 45.6381, 0, 0, '13', 0, '2014-02-28', '2014-02-20', 0, '136220140220', 1),
(22, '19', 'IVYPC9060', 'DECOSTA SUSP 60ML', 'ADL-163', 59.9, 'Drug', '5', 57.0476, 45.6381, 0, 0, '2', 0, '2014-05-30', '2014-02-20', 0, '136220140220', 1),
(23, '19', 'IVYPC9060', 'DECOSTA SUSP 60ML', 'ADL-186', 59.9, 'Drug', '5', 57.0476, 45.6381, 0, 0, '75', 0, '2014-06-30', '2014-02-20', 0, '136220140220', 1),
(24, '19', 'IVYPC9060', 'DECOSTA SUSP 60ML', '8439', 59.9, 'Drug', '5', 57.0476, 45.6381, 0, 2100, '320', 0, '2015-02-28', '2014-02-20', 95840, '136220140220', 1),
(25, '12', 'IVYPC9765', 'DECOSTA 6 TAB', 'ADT-1319', 42, 'Drug', '5', 40, 32, 0, 0, '5', 0, '2014-07-31', '2014-02-20', 0, '136220140220', 1),
(26, '12', 'IVYPC9765', 'DECOSTA 6 TAB', 'ADT-1770', 49, 'Drug', '5', 46.6667, 37.3333, 0, 0, '37', 0, '2014-12-31', '2014-02-20', 0, '136220140220', 1),
(27, '12', 'IVYPC9765', 'DECOSTA 6 TAB', 'ADT-1790', 49, 'Drug', '5', 46.6667, 37.3333, 0, 1400, '370', 0, '2015-01-31', '2014-02-20', 52266.7, '136220140220', 1),
(28, '9', 'IVYPC1244', 'DIACURE KID', 'ADL-182', 62, 'Drug', '5', 59.0476, 47.2381, 0, 900, '149', 0, '2014-06-30', '2014-02-20', 42514.3, '136220140220', 1),
(29, '9', 'IVYPC1244', 'DIACURE KID', 'ADL-03-153', 62, 'Drug', '5', 59.0476, 47.2381, 0, 0, '1', 0, '2014-02-28', '2014-02-20', 0, '136220140220', 1),
(30, '10', 'IVYPC7387', 'IVY NORM RZ', 'DP-582', 26.9, 'Food', '13.5', 23.7004, 18.9604, 0, 900, '200', 0, '2014-07-31', '2014-02-20', 17064.3, '136220140220', 1),
(31, '27', 'IVYPC2397', 'WNR GOLD', 'ADFC-12134', 99, 'Food', '13.5', 87.2247, 69.7797, 0, 0, '600', 0, '2014-05-31', '2014-02-20', 0, '136220140220', 1),
(32, '15', 'IVYPC6585', 'ROZZ SUSP', 'ADFL-03-075', 85, 'Food', '13.5', 74.8899, 59.9119, 0, 0, '2', 0, '2013-08-31', '2014-02-20', 0, '136220140220', 1),
(33, '15', 'IVYPC6585', 'ROZZ SUSP', 'ADFL-072', 85, 'Food', '13.5', 74.8899, 59.9119, 0, 600, '298', 0, '2014-03-31', '2014-02-20', 35947.1, '136220140220', 1),
(34, '25', 'IVYPC1569', 'RX JNR', 'ADL-339', 32, 'Drug', '5', 30.4762, 24.381, 0, 0, '69', 0, '2014-11-30', '2014-02-20', 0, '136220140220', 1),
(35, '12', 'IVYPC9765', 'DECOSTA 6 TAB', '031339', 49, 'Drug', '5', 46.6667, 37.3333, 0, 1000, '100', 0, '2015-02-28', '2014-03-17', 37333.3, '140420140317', 1),
(36, '9', 'IVYPC1244', 'DIACURE KID', 'ADL-07-097', 62, 'Drug', '5', 59.0476, 47.2381, 0, 1000, '100', 0, '2015-06-30', '2014-03-17', 47238.1, '140420140317', 1),
(37, '22', 'IVYPC7258', 'I FRESH', 'IIF-005', 47, 'Drug', '5', 44.7619, 35.8095, 0, 100, '10', 0, '2015-05-31', '2014-03-17', 3580.95, '140420140317', 1),
(38, '4', 'IVYPC5284', 'STRENGTH 50', 'AM-2719D', 109.9, 'Drug', '5', 104.667, 83.7333, 0, 900, '6', 0, '2015-04-30', '2014-03-17', 75360, '520620140317', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bihar_depo_info`
--

DROP TABLE IF EXISTS `bihar_depo_info`;
CREATE TABLE IF NOT EXISTS `bihar_depo_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `depo_no` varchar(250) NOT NULL,
  `grand_total` varchar(250) NOT NULL,
  `td_percent` varchar(250) NOT NULL,
  `td` varchar(250) NOT NULL,
  `net_bill` varchar(250) NOT NULL,
  `temp_rand` varchar(100) NOT NULL,
  `present_date` varchar(200) NOT NULL,
  `party` varchar(200) NOT NULL,
  `party_address` varchar(200) NOT NULL,
  `party_dl_no` varchar(200) NOT NULL,
  `party_tin_no` varchar(200) NOT NULL,
  `lr_no` varchar(200) NOT NULL,
  `lr_date` varchar(200) NOT NULL,
  `station` varchar(200) NOT NULL,
  `transport` varchar(200) NOT NULL,
  `mr_name` varchar(200) NOT NULL,
  `chalan_no` varchar(200) NOT NULL,
  `chalan_date` varchar(200) NOT NULL,
  `case_no` varchar(200) NOT NULL,
  `road_permit_no` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `bihar_depo_info`
--

INSERT INTO `bihar_depo_info` (`id`, `depo_no`, `grand_total`, `td_percent`, `td`, `net_bill`, `temp_rand`, `present_date`, `party`, `party_address`, `party_dl_no`, `party_tin_no`, `lr_no`, `lr_date`, `station`, `transport`, `mr_name`, `chalan_no`, `chalan_date`, `case_no`, `road_permit_no`) VALUES
(1, '1', '337591', '10', '33759.1', '0', '136220140220', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, '2', '88152', '10', '8815.2', '79336.8', '140420140317', '2013-07-01', 'NANDAN MEDICAL STORE', 'DD-35, SEBA HOSPITAL, SEC 1, SALTLAKE, KOLKATA -700064\r\n', '5377S/5388SB', '0000', '', '', '', '', '', '', '', '', ''),
(3, '3', '75360', '10', '7536', '67824', '520620140317', '', 'lokenath', 'naihati ', '0000', '00000', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `bihar_invoice`
--

DROP TABLE IF EXISTS `bihar_invoice`;
CREATE TABLE IF NOT EXISTS `bihar_invoice` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `packing` varchar(250) NOT NULL,
  `mrp_inc_tax` float NOT NULL,
  `mrp_inc_tax_amt` float NOT NULL,
  `category` varchar(100) NOT NULL,
  `vat_percent` varchar(100) NOT NULL,
  `mrp_exc_tax` float NOT NULL,
  `ptr` float NOT NULL,
  `tot_qty` float NOT NULL,
  `free` varchar(100) NOT NULL,
  `actual_qty` float NOT NULL,
  `expiry_date` date NOT NULL,
  `vat_amt` float NOT NULL,
  `net_amt` float NOT NULL,
  `temp_rand` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `present_date` date NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `bihar_invoice`
--

INSERT INTO `bihar_invoice` (`p_id`, `product_code`, `product_name`, `batch_no`, `packing`, `mrp_inc_tax`, `mrp_inc_tax_amt`, `category`, `vat_percent`, `mrp_exc_tax`, `ptr`, `tot_qty`, `free`, `actual_qty`, `expiry_date`, `vat_amt`, `net_amt`, `temp_rand`, `status`, `present_date`) VALUES
(1, 'IVYPC9765', 'DECOSTA 6 TAB', 'ADT-1790', '10X10', 49, 4900, 'Drug', '5', 46.6667, 37.3333, 100, '10', 0, '2015-01-31', 233.333, 3733.33, '967420140317', '', '2014-03-17'),
(2, 'IVYPC7258', 'I FRESH', 'IIF-005', '10X10', 47, 470, 'Drug', '5', 44.7619, 35.8095, 10, '1', 0, '2015-05-31', 22.381, 358.095, '967420140317', '', '2014-03-17'),
(3, 'IVYPC5284', 'STRENGTH 50', 'AM-2719D', '1 AMP', 109.9, 10990, 'Drug', '5', 104.667, 83.7333, 100, '100', 0, '2015-04-30', 523.333, 8373.33, '904220140317', '', '2014-03-17');

-- --------------------------------------------------------

--
-- Table structure for table `bihar_invoice_info`
--

DROP TABLE IF EXISTS `bihar_invoice_info`;
CREATE TABLE IF NOT EXISTS `bihar_invoice_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial_no` varchar(50) NOT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `purchase_date` varchar(200) NOT NULL,
  `party` varchar(50) NOT NULL,
  `party_address` varchar(250) NOT NULL,
  `party_dl_no` varchar(250) NOT NULL,
  `lr_no` varchar(50) NOT NULL,
  `lr_date` varchar(200) NOT NULL,
  `station` varchar(200) NOT NULL,
  `transport` varchar(200) NOT NULL,
  `mr_name` varchar(200) NOT NULL,
  `chalan_no` varchar(100) NOT NULL,
  `chalan_date` varchar(200) NOT NULL,
  `case_no` varchar(50) NOT NULL,
  `road_permit_no` varchar(50) NOT NULL,
  `total` float NOT NULL,
  `tax_amt5` float NOT NULL,
  `vat5` float NOT NULL,
  `tax_amt145` float NOT NULL,
  `vat145` float NOT NULL,
  `subtotal` float NOT NULL,
  `td_percent` float NOT NULL,
  `td` float NOT NULL,
  `misc_charges` float NOT NULL,
  `freight` float NOT NULL,
  `cash_disc` float NOT NULL,
  `net_bill` varchar(250) NOT NULL,
  `temp_rand` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `bihar_invoice_info`
--

INSERT INTO `bihar_invoice_info` (`id`, `serial_no`, `invoice_no`, `purchase_date`, `party`, `party_address`, `party_dl_no`, `lr_no`, `lr_date`, `station`, `transport`, `mr_name`, `chalan_no`, `chalan_date`, `case_no`, `road_permit_no`, `total`, `tax_amt5`, `vat5`, `tax_amt145`, `vat145`, `subtotal`, `td_percent`, `td`, `misc_charges`, `freight`, `cash_disc`, `net_bill`, `temp_rand`, `status`, `remarks`) VALUES
(1, '1', 'INVOICE(13/14)-1', '2014-01-01', 'astha drug', 'patna', '21342536hghj', '', '', '', '', 'Ravi Shankar', '', '', '', '', 4091.43, 5370, 255.71, 0, 0, 3582.29, 10, 409.143, 0, 100, 0, '3838.00', '967420140317', '', ''),
(2, '2', 'INVOICE(13/14)-2', '2014-03-31', 'astha drug', 'patna', '21342536hghj', '', '', '', '', 'Amit Kumar', '', '', '', '', 8373.33, 10990, 523.33, 0, 0, 7536, 10, 837.333, 0, 0, 0, '8059.33', '904220140317', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `bihar_replacement_invoice`
--

DROP TABLE IF EXISTS `bihar_replacement_invoice`;
CREATE TABLE IF NOT EXISTS `bihar_replacement_invoice` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `packing` varchar(250) NOT NULL,
  `mrp_inc_tax` float NOT NULL,
  `mrp_inc_tax_amt` float NOT NULL,
  `category` varchar(100) NOT NULL,
  `vat_percent` varchar(100) NOT NULL,
  `mrp_exc_tax` float NOT NULL,
  `ptr` float NOT NULL,
  `tot_qty` float NOT NULL,
  `free` varchar(100) NOT NULL,
  `actual_qty` float NOT NULL,
  `expiry_date` date NOT NULL,
  `vat_amt` float NOT NULL,
  `net_amt` float NOT NULL,
  `temp_rand` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `present_date` date NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bihar_replacement_invoice_info`
--

DROP TABLE IF EXISTS `bihar_replacement_invoice_info`;
CREATE TABLE IF NOT EXISTS `bihar_replacement_invoice_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial_no` varchar(50) NOT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `purchase_date` varchar(200) NOT NULL,
  `party` varchar(50) NOT NULL,
  `party_address` varchar(250) NOT NULL,
  `party_dl_no` varchar(250) NOT NULL,
  `lr_no` varchar(50) NOT NULL,
  `lr_date` varchar(200) NOT NULL,
  `station` varchar(200) NOT NULL,
  `transport` varchar(200) NOT NULL,
  `mr_name` varchar(200) NOT NULL,
  `chalan_no` varchar(100) NOT NULL,
  `chalan_date` varchar(200) NOT NULL,
  `case_no` varchar(50) NOT NULL,
  `road_permit_no` varchar(50) NOT NULL,
  `total` float NOT NULL,
  `tax_amt5` float NOT NULL,
  `vat5` float NOT NULL,
  `tax_amt145` float NOT NULL,
  `vat145` float NOT NULL,
  `subtotal` float NOT NULL,
  `td_percent` float NOT NULL,
  `td` float NOT NULL,
  `misc_charges` float NOT NULL,
  `freight` float NOT NULL,
  `cash_disc` float NOT NULL,
  `net_bill` varchar(250) NOT NULL,
  `temp_rand` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bihar_sample`
--

DROP TABLE IF EXISTS `bihar_sample`;
CREATE TABLE IF NOT EXISTS `bihar_sample` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(200) NOT NULL,
  `product_code` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `category` varchar(100) NOT NULL,
  `tot_qty` float NOT NULL,
  `expiry_date` date NOT NULL,
  `present` date NOT NULL,
  `temp_rand` varchar(250) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bihar_sample_info`
--

DROP TABLE IF EXISTS `bihar_sample_info`;
CREATE TABLE IF NOT EXISTS `bihar_sample_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ch_no` varchar(250) NOT NULL,
  `misc_charge` varchar(250) NOT NULL,
  `temp_rand` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bihar_stock`
--

DROP TABLE IF EXISTS `bihar_stock`;
CREATE TABLE IF NOT EXISTS `bihar_stock` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(200) NOT NULL,
  `product_code` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `mrp_inc_tax` float NOT NULL,
  `category` varchar(100) NOT NULL,
  `vat_percent` varchar(100) NOT NULL,
  `mrp_exc_tax` float NOT NULL,
  `ptr` float NOT NULL,
  `pts` float NOT NULL,
  `tot_qty` float NOT NULL,
  `free` varchar(100) NOT NULL,
  `actual_qty` float NOT NULL,
  `expiry_date` date NOT NULL,
  `present` date NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `bihar_stock`
--

INSERT INTO `bihar_stock` (`p_id`, `product_id`, `product_code`, `product_name`, `batch_no`, `mrp_inc_tax`, `category`, `vat_percent`, `mrp_exc_tax`, `ptr`, `pts`, `tot_qty`, `free`, `actual_qty`, `expiry_date`, `present`) VALUES
(1, '', 'IVYPC1569', 'RX JNR', 'ADL-339', 32, 'Drug', '5', 30.4762, 24.381, 0, 0, '69', 0, '2014-11-30', '2014-02-20'),
(2, '', 'IVYPC6585', 'ROZZ SUSP', 'ADFL-072', 85, 'Food', '13.5', 74.8899, 59.9119, 0, 600, '298', 0, '2014-03-31', '2014-02-20'),
(3, '', 'IVYPC6585', 'ROZZ SUSP', 'ADFL-03-075', 85, 'Food', '13.5', 74.8899, 59.9119, 0, 0, '2', 0, '2013-08-31', '2014-02-20'),
(4, '', 'IVYPC2397', 'WNR GOLD', 'ADFC-12134', 99, 'Food', '13.5', 87.2247, 69.7797, 0, 0, '600', 0, '2014-05-31', '2014-02-20'),
(5, '', 'IVYPC7387', 'IVY NORM RZ', 'DP-582', 26.9, 'Food', '13.5', 23.7004, 18.9604, 0, 900, '200', 0, '2014-07-31', '2014-02-20'),
(6, '', 'IVYPC1244', 'DIACURE KID', 'ADL-03-153', 62, 'Drug', '5', 59.0476, 47.2381, 0, 0, '1', 0, '2014-02-28', '2014-02-20'),
(7, '', 'IVYPC1244', 'DIACURE KID', 'ADL-182', 62, 'Drug', '5', 59.0476, 47.2381, 0, 900, '149', 0, '2014-06-30', '2014-02-20'),
(8, '', 'IVYPC9765', 'DECOSTA 6 TAB', 'ADT-1790', 49, 'Drug', '5', 46.6667, 37.3333, 0, 1310, '370', 0, '2015-01-31', '2014-02-20'),
(9, '', 'IVYPC9765', 'DECOSTA 6 TAB', 'ADT-1770', 49, 'Drug', '5', 46.6667, 37.3333, 0, 0, '37', 0, '2014-12-31', '2014-02-20'),
(10, '', 'IVYPC9765', 'DECOSTA 6 TAB', 'ADT-1319', 42, 'Drug', '5', 40, 32, 0, 0, '5', 0, '2014-07-31', '2014-02-20'),
(11, '', 'IVYPC9060', 'DECOSTA SUSP 60ML', '8439', 59.9, 'Drug', '5', 57.0476, 45.6381, 0, 2100, '320', 0, '2015-02-28', '2014-02-20'),
(12, '', 'IVYPC9060', 'DECOSTA SUSP 60ML', 'ADL-186', 59.9, 'Drug', '5', 57.0476, 45.6381, 0, 0, '75', 0, '2014-06-30', '2014-02-20'),
(13, '', 'IVYPC9060', 'DECOSTA SUSP 60ML', 'ADL-163', 59.9, 'Drug', '5', 57.0476, 45.6381, 0, 0, '2', 0, '2014-05-30', '2014-02-20'),
(14, '', 'IVYPC9060', 'DECOSTA SUSP 60ML', 'ADL-03-167', 59.9, 'Drug', '5', 57.0476, 45.6381, 0, 0, '13', 0, '2014-02-28', '2014-02-20'),
(15, '', 'IVYPC1569', 'RX JNR', 'ADL-385', 35, 'Drug', '5', 33.3333, 26.6667, 0, 3000, '206', 0, '2015-01-31', '2014-02-20'),
(16, '', 'IVYPC1569', 'RX JNR', 'ADL-223', 32, 'Drug', '5', 30.4762, 24.381, 0, 0, '225', 0, '2014-07-31', '2014-02-20'),
(17, '', 'IVYPC6994', 'HELL SUSPENSION', 'ADL-151', 22.9, 'Drug', '5', 21.8095, 17.4476, 0, 800, '630', 0, '2014-04-30', '2014-02-20'),
(18, '', 'IVYPC7258', 'I FRESH', 'IIF-005', 47, 'Drug', '5', 44.7619, 35.8095, 0, 91, '10', 0, '2015-05-31', '2014-03-17'),
(19, '', 'IVYPC1244', 'DIACURE KID', 'ADL-07-097', 62, 'Drug', '5', 59.0476, 47.2381, 0, 1000, '100', 0, '2015-06-30', '2014-03-17'),
(20, '', 'IVYPC9765', 'DECOSTA 6 TAB', '031339', 49, 'Drug', '5', 46.6667, 37.3333, 0, 1000, '100', 0, '2015-02-28', '2014-03-17'),
(21, '', 'IVYPC5284', 'STRENGTH 50', 'AM-2719D', 109.9, 'Drug', '5', 104.667, 83.7333, 0, 900, '6', 0, '2015-04-30', '2014-03-17');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_details`
--

DROP TABLE IF EXISTS `buyer_details`;
CREATE TABLE IF NOT EXISTS `buyer_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buyer_name` varchar(250) NOT NULL,
  `buyer_address` varchar(250) NOT NULL,
  `buyer_code` varchar(250) NOT NULL,
  `buyer_dl_no` varchar(250) NOT NULL,
  `buyer_tin_no` varchar(250) NOT NULL,
  `buyer_vat_no` varchar(200) NOT NULL,
  `buyer_cst_no` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `buyer_details`
--

INSERT INTO `buyer_details` (`id`, `buyer_name`, `buyer_address`, `buyer_code`, `buyer_dl_no`, `buyer_tin_no`, `buyer_vat_no`, `buyer_cst_no`, `state`) VALUES
(1, 'Adwin Pharma', 'Vill-Rampur jattan,Trilokepur road, Kalaamb, dist- sirmour,H.P - 173030', 'IVY-SC6259', 'S-MNB/08/11 , S-MB/08/12', '02040500001', '02040500001', '7584', 'WB'),
(2, 'Roseate Medicare', 'Vill- Anji solan H.P. - 173212', 'IVY-SC5228', 'S-MNB/08/21 , S-MB/08/22', '02020200264', '02020200264', '10687', 'WB'),
(3, 'M/S Biologics Inc', 'Suketi road , Kalaamb, Dist- sirmour, H.P. - 173030', 'IVY-SC3735', 'MNB/06/424 , MB/06/425', '02040400339', '02040400339', '02040400339', 'WB'),
(4, 'MMG Healthcare', 'Trilokpur road , kalaamb,\r\nDist-sirmour,H.P. - 173030', 'IVY-SC1564', 'MB/07/627 , MNB/08/19', '02040400120', '02040400120', '0204040039', 'WB'),
(5, 'Sarvear Pharmaceuticals U.A', 'C-7 Sara Industrial estate, Vill - Rampur, Selaqui, Dehradun, Uttarkhand - 248197', 'IVY-SC6372', '95/UA/SC/P2007', '05006037305', '05006037305', 'VN-5004310', 'WB'),
(6, 'Umaraj Enterprises', 'Near Utsav palace, Main road, Opp Nutan tower, Patna - 20', 'IVY-SC5448', '20B:-22 , 21B:-22A', '10128125081', '10128125081', '10126707139', 'WB'),
(7, 'MMC Healthcare (H.P.) Pvt. Ltd.', 'Solan-kalka Highway, deonghat, solan-173211,\r\nH.P.', 'IVY-SC8154', 'MNB/05/146 , MB/05/147', '02020200288', '02020200288', '8756', 'WB'),
(8, 'D.D. Nutritions (India)', 'J196, sec 2, D.S.I.I.D.C, Bawana Industrial area, new delhi 110039', 'IVY-SC8126', '000', '07130371956', '07130371956', '07130371956', 'WB');

-- --------------------------------------------------------

--
-- Table structure for table `credit_note`
--

DROP TABLE IF EXISTS `credit_note`;
CREATE TABLE IF NOT EXISTS `credit_note` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `packing` varchar(250) NOT NULL,
  `mrp_inc_tax` float NOT NULL,
  `mrp_inc_tax_amt` float NOT NULL,
  `category` varchar(100) NOT NULL,
  `vat_percent` varchar(100) NOT NULL,
  `mrp_exc_tax` float NOT NULL,
  `ptr` float NOT NULL,
  `tot_qty` float NOT NULL,
  `free` varchar(100) NOT NULL,
  `actual_qty` float NOT NULL,
  `expiry_date` date NOT NULL,
  `vat_amt` float NOT NULL,
  `net_amt` float NOT NULL,
  `temp_rand` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `present_date` date NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `credit_note`
--

INSERT INTO `credit_note` (`p_id`, `product_code`, `product_name`, `batch_no`, `packing`, `mrp_inc_tax`, `mrp_inc_tax_amt`, `category`, `vat_percent`, `mrp_exc_tax`, `ptr`, `tot_qty`, `free`, `actual_qty`, `expiry_date`, `vat_amt`, `net_amt`, `temp_rand`, `status`, `present_date`) VALUES
(1, 'IVYPC7193', 'APIMAX 200ML', 'ADL-322', '200ML', 75, 675, 'Drug', '5', 71.4286, 57.1429, 9, '1', 0, '2014-10-31', 32.1429, 514.286, '142520140317', '', '2014-03-17'),
(2, 'IVYPC1037', 'DRS XT', 'ADC-03-082', '10X10', 70, 252, 'Drug', '5', 66.6667, 53.3333, 3.6, '1.4', 0, '2014-02-28', 12, 192, '142520140317', '', '0000-00-00'),
(3, 'IVYPC7258', 'I FRESH', 'IIF-004', '10X10', 47, 470, 'Drug', '5', 44.7619, 35.8095, 10, '1', 0, '2014-09-30', 22.381, 358.095, '142520140317', '', '2014-03-17'),
(4, 'IVYPC1244', 'DIACURE KID', 'ADL-182', '60ML', 62, 6200000, 'Drug', '5', 59.0476, 47.2381, 100000, '99999', 0, '2014-06-30', 295238, 4723810, '890820140317', '', '2014-03-17'),
(5, 'IVYPC3908', 'DECOSTA 30 TAB', '051390', '10X10', 300, 30000, 'Drug', '5', 285.714, 228.571, 100, '10', 0, '2015-04-30', 1428.57, 22857.1, '', '', '2014-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `credit_note_info`
--

DROP TABLE IF EXISTS `credit_note_info`;
CREATE TABLE IF NOT EXISTS `credit_note_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial_no` varchar(250) NOT NULL,
  `credit_note_no` varchar(250) NOT NULL,
  `cr_date` varchar(250) NOT NULL,
  `customer_name` varchar(250) NOT NULL,
  `customer_tin_no` varchar(250) NOT NULL,
  `customer_cst_no` varchar(250) NOT NULL,
  `customer_dl_no` varchar(250) NOT NULL,
  `claim_date` varchar(250) NOT NULL,
  `total` float NOT NULL,
  `tax_amt5` float NOT NULL,
  `vat5` float NOT NULL,
  `tax_amt145` float NOT NULL,
  `vat145` float NOT NULL,
  `subtotal` float NOT NULL,
  `discount_percent` float NOT NULL,
  `discount` float NOT NULL,
  `net_bill` varchar(250) NOT NULL,
  `temp_rand` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `cash_discount` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `credit_note_info`
--

INSERT INTO `credit_note_info` (`id`, `serial_no`, `credit_note_no`, `cr_date`, `customer_name`, `customer_tin_no`, `customer_cst_no`, `customer_dl_no`, `claim_date`, `total`, `tax_amt5`, `vat5`, `tax_amt145`, `vat145`, `subtotal`, `discount_percent`, `discount`, `net_bill`, `temp_rand`, `status`, `remarks`, `cash_discount`) VALUES
(1, '1', 'IVY(CRINVOICE13/14)-1', '2013-12-04', 'C S ENTERPRISE', '0000', '0000', '4730SW / 4722SBW', '2013-12-03', 1064.38, 1397, 66.52, 0, 0, 957.942, 10, 106.438, '1024.46', '142520140317', '', '', 0),
(2, '2', 'IVY(CRINVOICE13/14)-2', '2014-03-11', 'M/S NEW MAHAMAYA AGENCY PHARMACEUTICAL DISTRIBUTORS', '0000', '0000', '6571SW/6572SBW', '2014-03-05', 4723810, 6200000, 295238, 0, 0, 2834290, 40, 1889520, '3129524.09', '890820140317', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

DROP TABLE IF EXISTS `customer_details`;
CREATE TABLE IF NOT EXISTS `customer_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(250) NOT NULL,
  `customer_address` varchar(250) NOT NULL,
  `customer_code` varchar(250) NOT NULL,
  `customer_dl_no` varchar(250) NOT NULL,
  `customer_tin_no` varchar(250) NOT NULL,
  `customer_vat_no` varchar(200) NOT NULL,
  `customer_cst_no` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `customer_account` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`id`, `customer_name`, `customer_address`, `customer_code`, `customer_dl_no`, `customer_tin_no`, `customer_vat_no`, `customer_cst_no`, `state`, `customer_account`) VALUES
(2, 'A R ENTERPRISE', 'C/O K.M MEDICAL HALL\r\nSHAHJAHAN ROAD, BARUIPUR\r\nKOLKATA 700144\r\nPH NO - 9903452247', 'IVY-CUST7929', '3587SW/3582SBW', '0000', '0000', '0000', 'WB', ''),
(3, 'C S ENTERPRISE', 'K. K. SUPER MARKET, NEAR CHOWMATHA, 1ST FLOOR, R.N ROAD, BASIRHAT, NORTH 24 PGNS.\r\nPH NO - 9733892522', 'IVY-CUST3471', '4730SW / 4722SBW', '0000', '0000', '0000', 'WB', '1024.46'),
(4, 'KALPANA DISTRIBUTAR', 'H/NO-476A, W/NO-10, KHANBAHADUR ROAD, BASIRHAT, NORTH 24 PGNS, PIN NO-743411\r\nPH NO - 9093604855', 'IVY-CUST2151', '5836SW / 5824SBW', '0000', '0000', '0000', 'WB', ''),
(5, 'GOPAL AGENCY', 'APURPAPUR, SINGUR, HOOGLY,\r\nPH NO - 9433083671', 'IVY-CUST6798', '69SW/70SBW', '0000', '0000', '0000', 'WB', ''),
(6, 'POPULAR MEDICAL AGENCY', 'VILL+PO- PACHARUL, DIST - HOWRAH, PIN - 711225\r\nPH NO - 9647018185', 'IVY-CUST2264', '0000', '0000', '0000', '0000', 'WB', ''),
(7, 'NANDAN MEDICAL STORE', 'DD-35, SEBA HOSPITAL, SEC 1, SALTLAKE, KOLKATA -700064\r\n', 'IVY-CUST7624', '5377S/5388SB', '0000', '0000', '0000', 'WB', ''),
(8, 'NANDAN MEDICAL AGENCY', '86A, DHANDEVI KHANNA ROAD,\r\nKOLKATA 700054 ', 'IVY-CUST4726', '8676SW/8512SBW', '0000', '0000', '0', 'WB', ''),
(9, 'GOBORDHAN DISTRIBUTORS', 'VILL+PO-EGRA, DIST-PURBA MEDINIPUR, PIN NO- 721429\r\nPH NO 9732644589', 'IVY-CUST2393', '1346SW/1335SBW', '0000', '0000', '0000', 'WB', ''),
(10, 'S.P. ENTERPRISE', 'VILL-TOWN- SANKARARA, PO+PS- TAMLUK, DIST-PURBA MEDINIPUR, PIN NO- 7212636\r\nPH NO 9434612901 ', 'IVY-CUST4437', '1788SW/1777SBW', '0000', '0000', '0000', 'WB', ''),
(11, 'M/S MANISHA MEDICAL PHARMACEUTICALS DISTRIBUTORS', 'SORKAR MINI MARKET,VILL+PO- KATWA, DIST- BARDWAN, PIN-713130\r\nPH NO- 9732249583', 'IVY-CUST4075', '8985SW/8886SBW', '0000', '0000', '0000', 'WB', ''),
(12, 'M/S NEW MAHAMAYA AGENCY PHARMACEUTICAL DISTRIBUTORS', 'MONOROMA SADAN 1ST FLOOR, ROOM NO 5, 73 PBC ROAD BARDWAN, PIN NO- 713101\r\nPH NO - 9932313249', 'IVY-CUST1056', '6571SW/6572SBW', '0000', '0000', '0000', 'WB', '3129524.09'),
(13, 'ma tara', 'baranagar ', 'IVY-CUST1673', '000', '000', '000', '0000', 'WB', ''),
(14, 'lokenath', 'naihati ', 'IVY-CUST7334', '0000', '00000', '0000', '0000', 'WB', ''),
(15, 'jeevan surakha', ' samarpally, opp. of 206 foot bridge, kolkata-700102', 'IVY-CUST6746', '00000', '0000', '0000', '0000', 'WB', ''),
(16, 'dr s k samanta', 'baranagar ', 'IVY-CUST7078', '0000', '0000', '0000', '0000', 'WB', ''),
(17, 'DR DIPU RANJAN BAIRAGI', 'DAKHIN BARASAT ', 'IVY-CUST4791', '0000', '00000', '0000', '0000', 'WB', ''),
(18, 'bhartiya drug', 'bihar', 'IVY-CUST5678', '34567', '245799', '23456', '245778f', 'BIHAR', ''),
(19, 'akhilesh drug', 'darbhanga', 'IVY-CUST2187', '14365hhr', '4547798', '5yugog33', '35547jmjh', 'BIHAR', ''),
(20, 'drug palace', 'narkatiagange', 'IVY-CUST1925', '14532476', 'rety566787809', '13546', '1227', 'BIHAR', ''),
(21, 'drug city', 'patna', 'IVY-CUST7079', '665778', '`232546', '367', 'ee567876', 'BIHAR', ''),
(22, 'astha drug', 'patna', 'IVY-CUST2935', '21342536hghj', '15568kk', '143657868', '324536', 'BIHAR', '');

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

DROP TABLE IF EXISTS `header`;
CREATE TABLE IF NOT EXISTS `header` (
  `header_id` int(250) NOT NULL AUTO_INCREMENT,
  `header` longtext NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`header_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`header_id`, `header`, `date`) VALUES
(1, '<p style="text-align: left; "><span style="font-size: large;"><font face="Arial"><b>IVY PHARMACEUTICALS</b></font></span><font face="Arial" size="2"><b><br />\r\n</b></font><strong><span style="font-size: smaller;">33 V.I.P. ROAD,KAIKHALI,&nbsp;KOLKATA- &nbsp; &nbsp;700136, WEST BENGAL</span></strong><span style="font-size: smaller;"><br />\r\nDL No. &nbsp;5560/SW, 5550/SBW,&nbsp;WBVAT No. &nbsp; 19678916032<br />\r\nCST No. 19678916032 &nbsp;PH No. 09432670421</span></p>', '21/01/2014'),
(2, '<h4 class="content16 tbold titCaps" style="text-transform: capitalize; font-family: Georgia, serif; font-size: 16px; line-height: 25px; padding: 0px; margin: 0px;">Acme Pharmaceuticals Pvt. Ltd.</h4>\r\n<address style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;"><br />\r\n<b>Address :</b><span class="titCaps" style="outline: rgb(0, 0, 0); padding: 0px; margin: 0px; border: 0px; text-transform: capitalize;">G-106, P.C. Colony, Kankarbagh<br />\r\nPatna - 800020, Bihar</span></address>', '26/12/2013'),
(3, '<p><span style="font-size: large;"><span style="font-family: Calibri; text-align: justify;">Pharma Odisha Cluster</span></span><br style="font-family: Calibri; font-size: medium; text-align: justify;" />\r\n<span style="font-size: small;"><span style="font-family: Calibri; text-align: justify;">Utkal Pharmaceuticals Manufacturers <br />\r\nAssociation (U P M A )<br />\r\n</span><span style="font-family: Calibri; text-align: justify;">Industutrial Estate&nbsp;</span><br style="font-family: Calibri; font-size: medium; text-align: justify;" />\r\n<span style="font-family: Calibri; text-align: justify;">Cuttack: 753010</span><span style="font-family: Calibri; text-align: justify;">&nbsp;<br />\r\nOdisha</span><br style="font-family: Calibri; font-size: medium; text-align: justify;" />\r\n<span style="font-family: Calibri; text-align: justify;">India&nbsp;</span></span></p>', '31/12/2013');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_info`
--

DROP TABLE IF EXISTS `invoice_info`;
CREATE TABLE IF NOT EXISTS `invoice_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial_no` varchar(50) NOT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `purchase_date` varchar(200) NOT NULL,
  `party` varchar(50) NOT NULL,
  `party_address` varchar(250) NOT NULL,
  `party_dl_no` varchar(250) NOT NULL,
  `lr_no` varchar(50) NOT NULL,
  `lr_date` varchar(200) NOT NULL,
  `station` varchar(200) NOT NULL,
  `transport` varchar(200) NOT NULL,
  `mr_name` varchar(200) NOT NULL,
  `chalan_no` varchar(100) NOT NULL,
  `chalan_date` varchar(200) NOT NULL,
  `case_no` varchar(50) NOT NULL,
  `road_permit_no` varchar(50) NOT NULL,
  `total` float NOT NULL,
  `tax_amt5` float NOT NULL,
  `vat5` float NOT NULL,
  `tax_amt145` float NOT NULL,
  `vat145` float NOT NULL,
  `subtotal` float NOT NULL,
  `td_percent` float NOT NULL,
  `td` float NOT NULL,
  `misc_charges` float NOT NULL,
  `freight` float NOT NULL,
  `cash_disc` float NOT NULL,
  `net_bill` varchar(250) NOT NULL,
  `temp_rand` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `invoice_info`
--

INSERT INTO `invoice_info` (`id`, `serial_no`, `invoice_no`, `purchase_date`, `party`, `party_address`, `party_dl_no`, `lr_no`, `lr_date`, `station`, `transport`, `mr_name`, `chalan_no`, `chalan_date`, `case_no`, `road_permit_no`, `total`, `tax_amt5`, `vat5`, `tax_amt145`, `vat145`, `subtotal`, `td_percent`, `td`, `misc_charges`, `freight`, `cash_disc`, `net_bill`, `temp_rand`, `status`, `remarks`) VALUES
(1, '1', 'IV (13/14)-1', '2013-04-04', 'A R ENTERPRISE', 'C/O K.M MEDICAL HALL\r\nSHAHJAHAN ROAD, BARUIPUR\r\nKOLKATA 700144\r\nPH NO - 9903452247', '3587SW/3582SBW', '', '', '', '', 'Soumitra Manna', '', '', '2', '', 6394.41, 0, 0, 10560, 1337.29, 5754.97, 10, 639.441, 0, 0, 0, '7092.26', '715920140219', '', ''),
(2, '2', 'IV (13/14)-2', '2013-04-04', 'NANDAN MEDICAL STORE', 'DD-35, SEBA HOSPITAL, SEC 1, SALTLAKE, KOLKATA -700064\r\n', '5377S/5388SB', '', '', '', '', 'Pinaki Bannerjee', '', '', '', '', 3680, 5313, 253, 0, 0, 3312, 10, 368, 0, 0, 0, '3565.00', '302820140219', '', ''),
(4, '3', 'IV (13/14)-3', '2013-04-04', 'ma tara', 'baranagar ', '000', '', '', '', '', 'Pinaki Bannerjee', '', '', '2', '', 8786.51, 12208.4, 581.35, 880, 111.44, 7894.86, 10, 878.651, 0, 0, 13, '8587.65', '410320140220', '', ''),
(5, '4', 'IV (13/14)-4', '2013-04-09', 'POPULAR MEDICAL AGENCY', 'VILL+PO- PACHARUL, DIST - HOWRAH, PIN - 711225\r\nPH NO - 9647018185', '0000', '', '', '', '', 'Pinaki Bannerjee', '', '', '', '', 25375.2, 22296, 1061.71, 12005, 1520.28, 10149.1, 60, 15225.1, 1, 0, 0, '12731.07', '648620140220', '', ''),
(6, '5', 'IV (13/14)-5', '2013-04-11', 'NANDAN MEDICAL STORE', 'DD-35, SEBA HOSPITAL, SEC 1, SALTLAKE, KOLKATA -700064\r\n', '5377S/5388SB', '', '', '', '', 'Pinaki Bannerjee', '', '', '', '', 2674.28, 3861, 183.86, 0, 0, 2342.85, 10, 267.428, 0, 0, 64, '2526.71', '733320140220', '', ''),
(7, '6', 'IV (13/14)-6', '2013-04-11', 'lokenath', 'naihati ', '0000', '', '', '', '', 'Pinaki Bannerjee', '', '', '', '', 5994.46, 3900, 185.71, 5280, 668.65, 5395.01, 10, 599.446, 0, 0, 0, '6249.37', '741420140221', '', ''),
(8, '7', 'IV (13/14)-7', '2013-04-11', 'jeevan surakha', ' samarpally, opp. of 206 foot bridge, kolkata-700102', '00000', '', '', '', '', 'Pinaki Bannerjee', '', '', '', '', 868.57, 1254, 59.71, 0, 0, 851.199, 2, 17.3714, 0, 0, 0, '910.91', '536320140221', '', ''),
(9, '8', 'IV (13/14)-8', '2013-04-13', 'GOPAL AGENCY', 'APURPAPUR, SINGUR, HOOGLY,\r\nPH NO - 9433083671', '69SW/70SBW', '', '', '', '', 'Pinaki Bannerjee', '', '', '', '', 12571.4, 16500, 785.71, 0, 0, 3900.29, 10, 1257.14, 0, 0, 7414.01, '4686.00', '480520140221', '', ''),
(10, '9', 'IV (13/14)-9', '2013-04-13', 'dr s k samanta', 'baranagar ', '0000', '', '', '', '', 'Pinaki Bannerjee', '', '', '', '', 297.14, 507, 24.14, 0, 0, 297.14, 0, 0, 0, 0, 0, '321.28', '846620140221', '', ''),
(11, '10', 'IV (13/14)-10', '2013-04-17', 'A R ENTERPRISE', 'C/O K.M MEDICAL HALL\r\nSHAHJAHAN ROAD, BARUIPUR\r\nKOLKATA 700144\r\nPH NO - 9903452247', '3587SW/3582SBW', '', '', '', '', 'Soumitra Manna', '', '', '', '', 12904.7, 10992, 523.43, 8404, 1064.26, 11614.2, 10, 1290.47, 0, 0, 0, '13201.91', '911420140221', '', ''),
(12, '10', 'IV (13/14)-11', '2013-04-17', 'A R ENTERPRISE', 'C/O K.M MEDICAL HALL\r\nSHAHJAHAN ROAD, BARUIPUR\r\nKOLKATA 700144\r\nPH NO - 9903452247', '3587SW/3582SBW', '', '', '', '', 'Soumitra Manna', '', '', '', '', 6148.47, 0, 0, 10560, 1337.29, 5533.62, 10, 614.847, 0, 0, 0, '6870.91', '612120140221', '', ''),
(13, '10', 'IV (13/14)-12', '2013-04-22', 'A R ENTERPRISE', 'C/O K.M MEDICAL HALL\r\nSHAHJAHAN ROAD, BARUIPUR\r\nKOLKATA 700144\r\nPH NO - 9903452247', '3587SW/3582SBW', '', '', '', '', 'Soumitra Manna', '', '', '', '', 1309.72, 1910, 90.95, 0, 0, 1178.75, 10, 130.972, 0, 0, 0, '1269.70', '163320140221', '', ''),
(14, '10', 'IV (13/14)-13', '2013-04-22', 'DR DIPU RANJAN BAIRAGI', 'DAKHIN BARASAT ', '0000', '', '', '', '', 'Soumitra Manna', '', '', '', '', 2689.52, 4942, 235.33, 0, 0, 2689.52, 0, 0, 0, 0, 0, '2924.85', '338820140221', '', ''),
(15, '10', 'IV (13/14)-14', '2013-04-22', 'jeevan surakha', ' samarpally, opp. of 206 foot bridge, kolkata-700102', '00000', '', '', '', '', 'Pinaki Bannerjee', '', '', '', '', 868.57, 1254, 59.71, 0, 0, 851.199, 2, 17.3714, 0, 0, 0, '910.91', '446020140221', '', ''),
(16, '10', 'IV (13/14)-15', '2013-04-24', 'A R ENTERPRISE', 'C/O K.M MEDICAL HALL\r\nSHAHJAHAN ROAD, BARUIPUR\r\nKOLKATA 700144\r\nPH NO - 9903452247', '3587SW/3582SBW', '', '', '', '', 'Soumitra Manna', '', '', '', '', 11676.8, 13106, 624.1, 4142.6, 524.61, 10509.1, 10, 1167.68, 0, 0, 0, '11657.86', '320820140221', '', ''),
(17, '10', 'IV (13/14)-16', '2013-04-24', 'NANDAN MEDICAL STORE', 'DD-35, SEBA HOSPITAL, SEC 1, SALTLAKE, KOLKATA -700064\r\n', '5377S/5388SB', '', '', '', '', 'Pinaki Bannerjee', '', '', '', '', 11394.6, 6864, 326.86, 10560, 1337.29, 9672.17, 10, 1139.46, 0, 0, 583, '11336.32', '859420140221', '', ''),
(18, '10', 'IV (13/14)-17', '2013-05-03', 'A R ENTERPRISE', 'C/O K.M MEDICAL HALL\r\nSHAHJAHAN ROAD, BARUIPUR\r\nKOLKATA 700144\r\nPH NO - 9903452247', '3587SW/3582SBW', '', '', '', '', 'Soumitra Manna', '', '', '', '', 6148.47, 0, 0, 10560, 1337.29, 5533.62, 10, 614.847, 0, 0, 0, '6870.91', '513220140221', '', ''),
(19, '10', 'IV (13/14)-18', '2013-05-03', 'A R ENTERPRISE', 'C/O K.M MEDICAL HALL\r\nSHAHJAHAN ROAD, BARUIPUR\r\nKOLKATA 700144\r\nPH NO - 9903452247', '3587SW/3582SBW', '', '', '', '', 'Soumitra Manna', '', '', '', '', 2075.11, 0, 0, 3267, 413.72, 1867.6, 10, 207.511, 0, 0, 0, '2281.32', '877320140221', '', ''),
(20, '10', 'IV (13/14)-19', '2013-05-03', 'ma tara', 'baranagar ', '000', '', '', '', '', 'Pinaki Bannerjee', '', '', '', '', 3544.82, 3520, 167.62, 1760, 222.88, 3190.34, 10, 354.482, 0, 0, 0, '3580.84', '279220140221', '', ''),
(21, '10', 'IV (13/14)-20', '2013-05-03', 'dr s k samanta', 'baranagar ', '0000', '', '', '', '', 'Pinaki Bannerjee', '', '', '', '', 297.14, 507, 24.14, 0, 0, 297.14, 0, 0, 0, 0, 0, '321.28', '935220140221', '', ''),
(22, '10', 'IV (13/14)-21', '2013-08-16', 'A R ENTERPRISE', 'C/O K.M MEDICAL HALL\r\nSHAHJAHAN ROAD, BARUIPUR\r\nKOLKATA 700144\r\nPH NO - 9903452247', '3587SW/3582SBW', '', '', '', '', 'Soumitra Manna', '', '', '', '', 14181.2, 7250, 345.24, 14440.8, 1828.75, 12711, 10, 1418.12, 0, 52, 0, '14885.03', '956220140317', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_name`
--

DROP TABLE IF EXISTS `invoice_name`;
CREATE TABLE IF NOT EXISTS `invoice_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pre_invoice` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `invoice_name`
--

INSERT INTO `invoice_name` (`id`, `pre_invoice`) VALUES
(1, 'IV (13/14)'),
(2, 'IVY(REPINVOICE13/14)'),
(3, 'IVY(CRINVOICE13/14)'),
(4, 'INVOICE(13/14)'),
(5, 'REPINVOICE(13/14)'),
(6, 'CRNOTE(13/14)'),
(7, 'INVOICE(13/14)'),
(8, 'REPINVOICE(13/14)'),
(9, 'CRNOTE(13/14)');

-- --------------------------------------------------------

--
-- Table structure for table `mr_details`
--

DROP TABLE IF EXISTS `mr_details`;
CREATE TABLE IF NOT EXISTS `mr_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mr_name` varchar(255) NOT NULL,
  `mr_code` varchar(250) NOT NULL,
  `area` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `mr_details`
--

INSERT INTO `mr_details` (`id`, `mr_name`, `mr_code`, `area`, `state`) VALUES
(3, 'Amit sarkar', 'WB-IVY-MR4535', 'Basirhat', 'WB'),
(4, 'Soumitra Manna', 'WB-IVY-MR9779', 'Baruipur', 'WB'),
(5, 'Swapan Chakraborty', 'WB-IVY-MR2894', 'Tamluk', 'WB'),
(6, 'Chanchal Maity', 'WB-IVY-MR6029', 'Contai', 'WB'),
(7, 'Rajeeb Ganguly', 'WB-IVY-MR9684', 'Bardwan', 'WB'),
(8, 'Tusar Hazra', 'WB-IVY-MR2709', 'Katwa', 'WB'),
(9, 'Pinaki Bannerjee', 'WB-IVY-MR2356', 'Kolkata', 'WB'),
(10, 'Prasun Chakraborty', 'WB-IVY-MR2709', 'Kolkata', 'WB'),
(11, 'Ravi Singh', 'BR-IVY-MR4725', 'Bettiah', 'BIHAR'),
(12, 'Amit Kumar', 'BR-IVY-MR9123', 'Sitamarhi', 'BIHAR'),
(13, 'Balkrishna Chaudhury', 'BR-IVY-MR6584', 'Darbhanga', 'BIHAR'),
(14, 'Rahul Roy', 'BR-IVY-MR1169', 'Darbhanga', 'BIHAR'),
(15, 'Sriniwas Bhushan', 'BR-IVY-MR4278', 'Patna', 'BIHAR'),
(16, 'Ravi Shankar', 'BR-IVY-MR2100', 'Patna', 'BIHAR'),
(17, 'Nand kishor', 'BR-IVY-MR7401', 'Patna', 'BIHAR'),
(18, 'Shivniwas Bhushan', 'BR-IVY-MR3296', 'Gaya', 'BIHAR'),
(19, 'Vijay Kumar Choudhury', 'BR-IVY-MR9338', 'Patna', 'BIHAR'),
(20, 'Rakesh Kumar', 'BR-IVY-MR4911', 'Begusarai', 'BIHAR'),
(21, 'Lakshmi kanta Mondal', 'OD-IVY-MR9962', 'Bhubaneswar', 'ODISHA'),
(22, 'Ranjan Kumar Das', 'OD-IVY-MR4305', 'Bhubaneswar', 'ODISHA');

-- --------------------------------------------------------

--
-- Table structure for table `odisha_accounts`
--

DROP TABLE IF EXISTS `odisha_accounts`;
CREATE TABLE IF NOT EXISTS `odisha_accounts` (
  `acc_id` int(11) NOT NULL AUTO_INCREMENT,
  `particulars` varchar(250) NOT NULL,
  `debit` varchar(250) NOT NULL,
  `credit` varchar(250) NOT NULL,
  `on_date` date NOT NULL,
  `cust_name` varchar(250) NOT NULL,
  `customer_code` varchar(100) NOT NULL,
  `payment_mode` varchar(250) NOT NULL,
  `cheque_no` varchar(250) NOT NULL,
  `cheque_date` date NOT NULL,
  `invo_no` varchar(250) NOT NULL,
  `amount` varchar(250) NOT NULL,
  `temp_rand` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  PRIMARY KEY (`acc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `odisha_cr_note`
--

DROP TABLE IF EXISTS `odisha_cr_note`;
CREATE TABLE IF NOT EXISTS `odisha_cr_note` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `packing` varchar(250) NOT NULL,
  `mrp_inc_tax` float NOT NULL,
  `mrp_inc_tax_amt` float NOT NULL,
  `category` varchar(100) NOT NULL,
  `vat_percent` varchar(100) NOT NULL,
  `mrp_exc_tax` float NOT NULL,
  `ptr` float NOT NULL,
  `tot_qty` float NOT NULL,
  `free` varchar(100) NOT NULL,
  `actual_qty` float NOT NULL,
  `expiry_date` date NOT NULL,
  `vat_amt` float NOT NULL,
  `net_amt` float NOT NULL,
  `temp_rand` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `present_date` date NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `odisha_cr_note_info`
--

DROP TABLE IF EXISTS `odisha_cr_note_info`;
CREATE TABLE IF NOT EXISTS `odisha_cr_note_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial_no` varchar(250) NOT NULL,
  `credit_note_no` varchar(250) NOT NULL,
  `cr_date` varchar(250) NOT NULL,
  `customer_name` varchar(250) NOT NULL,
  `customer_tin_no` varchar(250) NOT NULL,
  `customer_cst_no` varchar(250) NOT NULL,
  `customer_dl_no` varchar(250) NOT NULL,
  `claim_date` varchar(250) NOT NULL,
  `total` float NOT NULL,
  `tax_amt5` float NOT NULL,
  `vat5` float NOT NULL,
  `tax_amt145` float NOT NULL,
  `vat145` float NOT NULL,
  `subtotal` float NOT NULL,
  `discount_percent` float NOT NULL,
  `discount` float NOT NULL,
  `net_bill` varchar(250) NOT NULL,
  `temp_rand` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `cash_discount` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `odisha_depo`
--

DROP TABLE IF EXISTS `odisha_depo`;
CREATE TABLE IF NOT EXISTS `odisha_depo` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(200) NOT NULL,
  `product_code` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `mrp_inc_tax` float NOT NULL,
  `category` varchar(100) NOT NULL,
  `vat_percent` varchar(100) NOT NULL,
  `mrp_exc_tax` float NOT NULL,
  `ptr` float NOT NULL,
  `pts` float NOT NULL,
  `tot_qty` float NOT NULL,
  `free` varchar(100) NOT NULL,
  `actual_qty` float NOT NULL,
  `expiry_date` date NOT NULL,
  `present` date NOT NULL,
  `net_amt` float NOT NULL,
  `temp_rand` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `odisha_depo`
--

INSERT INTO `odisha_depo` (`p_id`, `product_id`, `product_code`, `product_name`, `batch_no`, `mrp_inc_tax`, `category`, `vat_percent`, `mrp_exc_tax`, `ptr`, `pts`, `tot_qty`, `free`, `actual_qty`, `expiry_date`, `present`, `net_amt`, `temp_rand`, `status`) VALUES
(1, '28', 'IVYPC7193', 'APIMAX 200ML', 'ADL-322', 75, 'Drug', '5', 71.4286, 57.1429, 0, 54, '6', 0, '2014-10-31', '2014-03-17', 3085.71, '389320140317', 0),
(2, '19', 'IVYPC9060', 'DECOSTA SUSP 60ML', '8439', 59.9, 'Drug', '5', 57.0476, 45.6381, 0, 90, '10', 0, '2015-02-28', '2014-03-17', 4107.43, '389320140317', 0),
(3, '12', 'IVYPC9765', 'DECOSTA 6 TAB', '031339', 49, 'Drug', '5', 46.6667, 37.3333, 0, 100, '10', 0, '2015-02-28', '2014-03-17', 3733.33, '', 0),
(4, '18', 'IVYPC1037', 'DRS XT', 'C0114112', 75, 'Drug', '5', 71.4286, 57.1429, 0, 2000, '200', 0, '2015-12-31', '2014-03-17', 114286, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `odisha_depo_info`
--

DROP TABLE IF EXISTS `odisha_depo_info`;
CREATE TABLE IF NOT EXISTS `odisha_depo_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `depo_no` varchar(250) NOT NULL,
  `grand_total` varchar(250) NOT NULL,
  `td_percent` varchar(250) NOT NULL,
  `td` varchar(250) NOT NULL,
  `net_bill` varchar(250) NOT NULL,
  `temp_rand` varchar(100) NOT NULL,
  `present_date` varchar(200) NOT NULL,
  `party` varchar(200) NOT NULL,
  `party_address` varchar(200) NOT NULL,
  `party_dl_no` varchar(200) NOT NULL,
  `party_tin_no` varchar(200) NOT NULL,
  `lr_no` varchar(200) NOT NULL,
  `lr_date` varchar(200) NOT NULL,
  `station` varchar(200) NOT NULL,
  `transport` varchar(200) NOT NULL,
  `mr_name` varchar(200) NOT NULL,
  `chalan_no` varchar(200) NOT NULL,
  `chalan_date` varchar(200) NOT NULL,
  `case_no` varchar(200) NOT NULL,
  `road_permit_no` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `odisha_depo_info`
--

INSERT INTO `odisha_depo_info` (`id`, `depo_no`, `grand_total`, `td_percent`, `td`, `net_bill`, `temp_rand`, `present_date`, `party`, `party_address`, `party_dl_no`, `party_tin_no`, `lr_no`, `lr_date`, `station`, `transport`, `mr_name`, `chalan_no`, `chalan_date`, `case_no`, `road_permit_no`) VALUES
(1, '1', '7193', '10', '719.3', '6473.7', '389320140317', '2014-02-01', 'jeevan surakha', ' samarpally, opp. of 206 foot bridge, kolkata-700102', '00000', '0000', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `odisha_invoice`
--

DROP TABLE IF EXISTS `odisha_invoice`;
CREATE TABLE IF NOT EXISTS `odisha_invoice` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `packing` varchar(250) NOT NULL,
  `mrp_inc_tax` float NOT NULL,
  `mrp_inc_tax_amt` float NOT NULL,
  `category` varchar(100) NOT NULL,
  `vat_percent` varchar(100) NOT NULL,
  `mrp_exc_tax` float NOT NULL,
  `ptr` float NOT NULL,
  `tot_qty` float NOT NULL,
  `free` varchar(100) NOT NULL,
  `actual_qty` float NOT NULL,
  `expiry_date` date NOT NULL,
  `vat_amt` float NOT NULL,
  `net_amt` float NOT NULL,
  `temp_rand` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `present_date` date NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `odisha_invoice_info`
--

DROP TABLE IF EXISTS `odisha_invoice_info`;
CREATE TABLE IF NOT EXISTS `odisha_invoice_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial_no` varchar(50) NOT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `purchase_date` varchar(200) NOT NULL,
  `party` varchar(50) NOT NULL,
  `party_address` varchar(250) NOT NULL,
  `party_dl_no` varchar(250) NOT NULL,
  `lr_no` varchar(50) NOT NULL,
  `lr_date` varchar(200) NOT NULL,
  `station` varchar(200) NOT NULL,
  `transport` varchar(200) NOT NULL,
  `mr_name` varchar(200) NOT NULL,
  `chalan_no` varchar(100) NOT NULL,
  `chalan_date` varchar(200) NOT NULL,
  `case_no` varchar(50) NOT NULL,
  `road_permit_no` varchar(50) NOT NULL,
  `total` float NOT NULL,
  `tax_amt5` float NOT NULL,
  `vat5` float NOT NULL,
  `tax_amt145` float NOT NULL,
  `vat145` float NOT NULL,
  `subtotal` float NOT NULL,
  `td_percent` float NOT NULL,
  `td` float NOT NULL,
  `misc_charges` float NOT NULL,
  `freight` float NOT NULL,
  `cash_disc` float NOT NULL,
  `net_bill` varchar(250) NOT NULL,
  `temp_rand` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `odisha_replacement_invoice`
--

DROP TABLE IF EXISTS `odisha_replacement_invoice`;
CREATE TABLE IF NOT EXISTS `odisha_replacement_invoice` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `packing` varchar(250) NOT NULL,
  `mrp_inc_tax` float NOT NULL,
  `mrp_inc_tax_amt` float NOT NULL,
  `category` varchar(100) NOT NULL,
  `vat_percent` varchar(100) NOT NULL,
  `mrp_exc_tax` float NOT NULL,
  `ptr` float NOT NULL,
  `tot_qty` float NOT NULL,
  `free` varchar(100) NOT NULL,
  `actual_qty` float NOT NULL,
  `expiry_date` date NOT NULL,
  `vat_amt` float NOT NULL,
  `net_amt` float NOT NULL,
  `temp_rand` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `present_date` date NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `odisha_replacement_invoice_info`
--

DROP TABLE IF EXISTS `odisha_replacement_invoice_info`;
CREATE TABLE IF NOT EXISTS `odisha_replacement_invoice_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial_no` varchar(50) NOT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `purchase_date` varchar(200) NOT NULL,
  `party` varchar(50) NOT NULL,
  `party_address` varchar(250) NOT NULL,
  `party_dl_no` varchar(250) NOT NULL,
  `lr_no` varchar(50) NOT NULL,
  `lr_date` varchar(200) NOT NULL,
  `station` varchar(200) NOT NULL,
  `transport` varchar(200) NOT NULL,
  `mr_name` varchar(200) NOT NULL,
  `chalan_no` varchar(100) NOT NULL,
  `chalan_date` varchar(200) NOT NULL,
  `case_no` varchar(50) NOT NULL,
  `road_permit_no` varchar(50) NOT NULL,
  `total` float NOT NULL,
  `tax_amt5` float NOT NULL,
  `vat5` float NOT NULL,
  `tax_amt145` float NOT NULL,
  `vat145` float NOT NULL,
  `subtotal` float NOT NULL,
  `td_percent` float NOT NULL,
  `td` float NOT NULL,
  `misc_charges` float NOT NULL,
  `freight` float NOT NULL,
  `cash_disc` float NOT NULL,
  `net_bill` varchar(250) NOT NULL,
  `temp_rand` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `odisha_sample`
--

DROP TABLE IF EXISTS `odisha_sample`;
CREATE TABLE IF NOT EXISTS `odisha_sample` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(200) NOT NULL,
  `product_code` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `category` varchar(100) NOT NULL,
  `tot_qty` float NOT NULL,
  `expiry_date` date NOT NULL,
  `present` date NOT NULL,
  `temp_rand` varchar(250) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `odisha_sample_info`
--

DROP TABLE IF EXISTS `odisha_sample_info`;
CREATE TABLE IF NOT EXISTS `odisha_sample_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ch_no` varchar(250) NOT NULL,
  `misc_charge` varchar(250) NOT NULL,
  `temp_rand` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `odisha_stock`
--

DROP TABLE IF EXISTS `odisha_stock`;
CREATE TABLE IF NOT EXISTS `odisha_stock` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(200) NOT NULL,
  `product_code` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `mrp_inc_tax` float NOT NULL,
  `category` varchar(100) NOT NULL,
  `vat_percent` varchar(100) NOT NULL,
  `mrp_exc_tax` float NOT NULL,
  `ptr` float NOT NULL,
  `pts` float NOT NULL,
  `tot_qty` float NOT NULL,
  `free` varchar(100) NOT NULL,
  `actual_qty` float NOT NULL,
  `expiry_date` date NOT NULL,
  `present` date NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `opening_balance`
--

DROP TABLE IF EXISTS `opening_balance`;
CREATE TABLE IF NOT EXISTS `opening_balance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `opening_date` date NOT NULL,
  `amount` float NOT NULL,
  `party` varchar(250) NOT NULL,
  `state` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `opening_balance`
--

INSERT INTO `opening_balance` (`id`, `opening_date`, `amount`, `party`, `state`) VALUES
(1, '2013-04-01', 60000, 'IVY-CUST3471', 'WB'),
(2, '2013-04-01', 30000, 'IVY-CUST3471', 'WB'),
(3, '2013-04-01', -2000, 'IVY-CUST2151', 'WB');

-- --------------------------------------------------------

--
-- Table structure for table `opening_stock`
--

DROP TABLE IF EXISTS `opening_stock`;
CREATE TABLE IF NOT EXISTS `opening_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `opening_date` date NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `qty` int(11) NOT NULL,
  `state` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

DROP TABLE IF EXISTS `product_details`;
CREATE TABLE IF NOT EXISTS `product_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `packing` varchar(250) NOT NULL,
  `company` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `product_code`, `product_name`, `packing`, `company`) VALUES
(3, 'IVYPC6994', 'HELL SUSPENSION', '10ML', 'IVY'),
(4, 'IVYPC5284', 'STRENGTH 50', '1 AMP', 'IVY'),
(5, 'IVYPC2261', 'STRENGTH 25', '1 AMP', 'IVY'),
(6, 'IVYPC1956', 'WNR IV', '5X1', 'IVY'),
(7, 'IVYPC5400', 'ROZZ TAB', '10X10', 'IVY'),
(8, 'IVYPC7037', 'IV MOX KID', '30ML', 'IVY'),
(9, 'IVYPC1244', 'DIACURE KID', '60ML', 'IVY'),
(10, 'IVYPC7387', 'IVY NORM RZ', '1X25', 'IVY'),
(11, 'IVYPC3659', 'PANIVO 40 TAB', '10X10', 'IVY'),
(12, 'IVYPC9765', 'DECOSTA 6 TAB', '10X10', 'IVY'),
(13, 'IVYPC1148', 'I LIVE TAB', '10X10', 'IVY'),
(14, 'IVYPC5887', 'IV MOX TAB', '10X6', 'IVY'),
(15, 'IVYPC6585', 'ROZZ SUSP', '150ML', 'IVY'),
(16, 'IVYPC9711', 'IVCEF KID', '1 VIAL', 'IVY'),
(17, 'IVYPC1730', 'PANIVO IV', '1 VIAL', 'IVY'),
(18, 'IVYPC1037', 'DRS XT', '10X10', 'IVY'),
(19, 'IVYPC9060', 'DECOSTA SUSP 60ML', '60ML', 'IVY'),
(20, 'IVYPC5263', 'DECOSTA SUSP 30ML', '30ML', 'IVY'),
(21, 'IVYPC8858', 'LEUMONT', '10X10', 'IVY'),
(22, 'IVYPC7258', 'I FRESH', '10X10', 'IVY'),
(23, 'IVYPC1755', 'DIACURE N', '10X10', 'IVY'),
(24, 'IVYPC2996', 'NEOREX JUNIOR', '60ML', 'IVY'),
(25, 'IVYPC1569', 'RX JNR', '60ML', 'IVY'),
(26, 'IVYPC4050', 'WNR 150', '200ML', 'IVY'),
(27, 'IVYPC2397', 'WNR GOLD', '10X10', 'IVY'),
(28, 'IVYPC7193', 'APIMAX 200ML', '200ML', 'IVY'),
(29, 'IVYPC1280', 'APIMAX 100ML', '100ML', 'IVY'),
(30, 'IVYPC8076', 'RXD', '100ML', 'IVY'),
(31, 'IVYPC8360', 'ISOGEN XT', '10X10', 'IVY'),
(32, 'IVYPC7330', 'IVCEF', '1 VIAL', 'IVY'),
(33, 'IVYPC3908', 'DECOSTA 30 TAB', '10X10', 'IVY'),
(34, 'IVYPC2495', 'IVPIME', '1 VIAL', 'IVY'),
(35, 'IVYPC4804', 'GIVMOX TAB', '10X10', 'IVY'),
(36, 'IVYPC1780', 'GIVMOX KID', '30ML', 'IVY'),
(37, 'IVYPC3349', 'I LIVE SUSP', '60ML', 'IVY'),
(38, 'IVYPC3439', 'HELL SUSP P/S', '10ML', 'IVY'),
(39, 'IVYPC1078', 'STRENGTH 50 P/S', '1 AMP', 'IVY'),
(40, 'IVYPC6736', 'STRENGTH 25 P/S', '1 AMP', 'IVY'),
(41, 'IVYPC8655', 'I FRESH P/S', '10X10', 'IVY'),
(42, 'IVYPC2356', 'WNR IV P/S', '1', 'IVY'),
(43, 'IVYPC5359', 'DECOSTA SUSP 30ML P/S', '30ML', 'IVY'),
(44, 'IVYPC4994', 'DECOSTA SUSP 60ML P/S', '60ML', 'IVY'),
(45, 'IVYPC5316', 'LEUMONT P/S', '10X10', 'IVY'),
(46, 'IVYPC8629', 'ROZZ TAB P/S', '10X10', 'IVY'),
(47, 'IVYPC9573', 'DIACURE N P/S', '10X10', 'IVY'),
(48, 'IVYPC4609', 'IV MOX TAB P/S', '2X1', 'IVY'),
(49, 'IVYPC2282', 'IV MOX KID P/S', '30ML', 'IVY'),
(50, 'IVYPC2592', 'DIACURE KID P/S', '30 ML', 'IVY'),
(51, 'IVYPC4972', 'IVY NORM RZ P/S', '1X1', 'IVY'),
(52, 'IVYPC4751', 'PANIVO 40 TAB P/S', '10X10', 'IVY'),
(53, 'IVYPC4745', 'DECOSTA 6 TAB P/S', '10X10', 'IVY'),
(54, 'IVYPC5222', 'I LIVE TAB P/S', '10X10', 'IVY'),
(55, 'IVYPC5955', 'I LIVE SUSP P/S', '60 ML', 'IVY'),
(56, 'IVYPC6360', 'ROZZ SUSP P/S', '150ML', 'IVY'),
(57, 'IVYPC5039', 'PANIVO IV P/S', '1X1', 'IVY'),
(58, 'IVYPC6297', 'DRS XT P/S', '10X10', 'IVY'),
(59, 'IVYPC9812', 'NEOREX JUNIOR P/S', '60ML', 'IVY'),
(60, 'IVYPC7786', 'RX JNR P/S', '60ML', 'IVY'),
(61, 'IVYPC5361', 'WNR 150 P/S', '150ML', 'IVY'),
(62, 'IVYPC1951', 'APIMAX 200ML P/S', '200ML', 'IVY'),
(63, 'IVYPC7694', 'APIMAX 100ML P/S', '100ML', 'IVY'),
(64, 'IVYPC8011', 'WNR GOLD P/S', '10X10', 'IVY'),
(65, 'IVYPC7583', 'RXD P/S', '100ML', 'IVY'),
(66, 'IVYPC6234', 'ISOGEN XT P/S', '10X10', 'IVY'),
(67, 'IVYPC7340', 'IVCEF P/S', '1 VIAL', 'IVY'),
(68, 'IVYPC1427', 'IVCEF KID P/S', '1 VIAL', 'IVY'),
(69, 'IVYPC3138', 'IV PIME P/S', '1 VIAL', 'IVY'),
(70, 'IVYPC1976', 'GIVMOX TAB P/S', '10X10', 'IVY'),
(71, 'IVYPC1020', 'GIVMOX KID P/S', '30ML', 'IVY'),
(72, 'IVYPC3093', 'tanmoy', '10x10', 'ivy');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
CREATE TABLE IF NOT EXISTS `purchase` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `category` varchar(100) NOT NULL,
  `expiry_date` date NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `free` varchar(200) NOT NULL,
  `rate` varchar(200) NOT NULL,
  `mrp` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `present` date NOT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `chalan_no` varchar(50) NOT NULL,
  `vat_percent` varchar(100) NOT NULL,
  `mrp_exc_tax` float NOT NULL,
  `ptr` float NOT NULL,
  `actual_qty` float NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`p_id`, `product_code`, `product_name`, `batch_no`, `category`, `expiry_date`, `quantity`, `free`, `rate`, `mrp`, `amount`, `present`, `invoice_no`, `chalan_no`, `vat_percent`, `mrp_exc_tax`, `ptr`, `actual_qty`) VALUES
(1, 'IVYPC7387', 'IVY NORM RZ', 'DP-657', 'Food', '2014-10-31', '10625', '', '3.8', '26.9', '40375', '2014-01-31', '11', '11', '14.5', 23.4935, 18.7948, 0),
(2, 'IVYPC7387', 'IVY NORM RZ', 'DP-582', 'Food', '2014-10-31', '950', '', '3.8', '26.9', '3610', '2014-01-31', '11', '11', '14.5', 23.4935, 18.7948, 0),
(3, 'IVYPC4972', 'IVY NORM RZ P/S', 'DP-657', 'Food', '2014-10-31', '1575', '', '3.8', '0', '5985', '2014-01-31', '11', '11', '14.5', 0, 0, 0),
(4, 'IVYPC5400', 'ROZZ TAB', '041303', 'Drug', '2015-03-31', '2520', '', '11', '80', '2772000', '2014-01-31', '10', '10', '5', 76.1905, 60.9524, 0),
(5, 'IVYPC8629', 'ROZZ TAB P/S', '041303', 'Drug', '2015-03-31', '410', '', '11', '0', '4510', '2014-01-31', '10', '10', '5', 0, 0, 0),
(6, 'IVYPC5361', 'WNR 150 P/S', 'ADFL-04-008', 'Food', '2014-09-30', '1509', '', '18.5', '0', '27916.5', '2014-01-31', '2013-14-0150', '2013-14-23', '14.5', 0, 0, 0),
(7, 'IVYPC4050', 'WNR 150', 'ADFL-04-008', 'Food', '2014-09-30', '3588', '', '18.5', '104.9', '66378', '2014-01-31', '2013-14-0150', '2013-14-23', '14.5', 91.6157, 73.2926, 0),
(8, 'IVYPC1148', 'I LIVE TAB', 'TA-9199', 'Drug', '2014-04-30', '4890', '', '18', '80', '88020', '2014-01-31', '00262', '00262', '5', 76.1905, 60.9524, 0),
(9, 'IVYPC5222', 'I LIVE TAB P/S', 'TA-9199', 'Drug', '2014-04-30', '810', '', '18', '0', '14580', '2014-01-31', '00262', '00262', '5', 0, 0, 0),
(10, 'IVYPC1569', 'RX JNR', 'BL-9326', 'Drug', '2015-05-31', '4878', '', '7.8', '35', '38048.4', '2014-01-31', '00262', '00262', '5', 33.3333, 26.6667, 0),
(11, 'IVYPC7387', 'IVY NORM RZ', 'DPD-128', 'Food', '2014-12-31', '8275', '', '3.8', '26.9', '31445', '2014-01-31', '118', '118', '14.5', 23.4935, 18.7948, 0),
(12, 'IVYPC1244', 'DIACURE KID', 'ADL-05-046', 'Drug', '2015-04-30', '3920', '', '15.50', '62', '60760', '2014-02-05', '2013-14-0324', '2013-14-0324', '5', 59.0476, 47.2381, 0),
(13, 'IVYPC1244', 'DIACURE KID', 'ADL-05-046', 'Drug', '2015-04-30', '50', '', '15.50', '62', '775', '2014-02-05', '2013-14-0325', '2013-14-0325', '5', 59.0476, 47.2381, 0),
(14, 'IVYPC3908', 'DECOSTA 30 TAB', '051390', 'Drug', '2015-04-30', '1920', '', '41.8', '300', '80256', '2014-02-05', '77', '77', '5', 285.714, 228.571, 0),
(15, 'IVYPC7258', 'I FRESH', 'IIF-005', 'Drug', '2015-05-31', '3880', '', '6.60', '47', '25608', '2014-02-05', '464HP/13-14', '464HP/13-14', '5', 44.7619, 35.8095, 0),
(16, 'IVYPC8655', 'I FRESH P/S', 'IIF-005', 'Drug', '2015-05-31', '500', '', '6.35', '0', '3175', '2014-02-05', '464HP/13-14', '464HP/13-14', '5', 0, 0, 0),
(17, 'IVYPC6585', 'ROZZ SUSP', 'ADFL-06-030', 'Food', '2014-11-30', '4008', '', '16', '80', '64128', '2014-02-05', '2013-14-3081', '2013-14-3081', '14.5', 69.869, 55.8952, 0),
(18, 'IVYPC6360', 'ROZZ SUSP P/S', 'ADFL-06-030', 'Food', '2014-11-30', '990', '', '16', '0', '15840', '2014-02-05', '2013-14-3081', '2013-14-3081', '14.5', 0, 0, 0),
(19, 'IVYPC3349', 'I LIVE SUSP', 'BL-9471', 'Drug', '2015-05-31', '4641', '', '12.15', '65', '56388.15', '2014-02-05', '00347', '00347', '5', 61.9048, 49.5238, 0),
(20, 'IVYPC3349', 'I LIVE SUSP', 'BL-9471', 'Drug', '2015-05-31', '4641', '', '12.15', '65', '56388.15', '2014-02-05', '00347', '00347', '5', 61.9048, 49.5238, 0),
(21, 'IVYPC4050', 'WNR 150', 'ADFL-07-042', 'Food', '2014-12-31', '5106', '', '18.50', '104.9', '94461', '2014-02-05', '2013-14-0590', '2013-14-0590', '14.5', 91.6157, 73.2926, 0),
(22, 'IVYPC7193', 'APIMAX 200ML', 'ADL-07-080', 'Drug', '2015-06-30', '3920', '', '16.75', '75', '65660', '2014-02-05', '2013-14-0566', '2013-14-0566', '5', 71.4286, 57.1429, 0),
(23, 'IVYPC1951', 'APIMAX 200ML P/S', 'ADL-07-083', 'Drug', '2015-06-30', '980', '', '16.75', '0', '16415', '2014-02-05', '2013-14-0566', '2013-14-0566', '5', 0, 0, 0),
(24, 'IVYPC7193', 'APIMAX 200ML', 'ADL-07-080', 'Drug', '2015-06-30', '75', '', '16.75', '75', '1256.25', '2014-02-05', '2013-14-0567', '2013-14-0567', '5', 71.4286, 57.1429, 0),
(25, 'IVYPC1951', 'APIMAX 200ML P/S', 'ADL-07-083', 'Drug', '2015-06-30', '80', '', '16.75', '0', '1340', '2014-02-05', '2013-14-0567', '2013-14-0567', '5', 0, 0, 0),
(26, 'IVYPC7387', 'IVY NORM RZ', 'DPD-214', 'Food', '2015-03-31', '11225', '', '3.80', '26.90', '42655', '2014-02-05', '212', '212', '14.5', 23.4935, 18.7948, 0),
(27, 'IVYPC9711', 'IVCEF KID', '130621', 'Drug', '2015-05-31', '2776', '', '11', '54', '30536', '2014-02-05', '00483', '00483', '5', 51.4286, 41.1429, 0),
(28, 'IVYPC2996', 'NEOREX JUNIOR', 'NJ-006', 'Drug', '2015-06-30', '8784', '', '9.90', '43', '86961.6', '2014-02-05', '743HP/13-14', '743HP/13-14', '5', 40.9524, 32.7619, 0),
(29, 'IVYPC9812', 'NEOREX JUNIOR P/S', 'NJ-006', 'Drug', '2015-06-30', '1000', '', '9.90', '0', '9900', '2014-02-05', '743HP/13-14', '743HP/13-14', '5', 0, 0, 0),
(30, 'IVYPC1037', 'DRS XT', 'ADC-07-048', 'Drug', '2015-06-30', '3920', '', '8', '70', '31360', '2014-02-05', '2013-14-0681', '2013-14-0681', '5', 66.6667, 53.3333, 0),
(31, 'IVYPC6297', 'DRS XT P/S', 'ADC-07-048', 'Drug', '2015-06-30', '980', '', '8', '0', '7840', '2014-02-05', '2013-14-0681', '2013-14-0681', '5', 0, 0, 0),
(32, 'IVYPC1037', 'DRS XT', 'ADC-07-048', 'Drug', '2015-06-30', '60', '', '8', '70', '480', '2014-02-05', '2013-14-0682', '2013-14-0682', '5', 66.6667, 53.3333, 0),
(33, 'IVYPC6297', 'DRS XT P/S', 'ADC-07-048', 'Drug', '2015-06-30', '80', '', '8', '0', '640', '2014-02-05', '2013-14-0682', '2013-14-0682', '5', 0, 0, 0),
(34, 'IVYPC1244', 'DIACURE KID', 'ADL-07-097', 'Drug', '2015-06-30', '4085', '', '15.50', '62', '63317.5', '2014-02-05', '2013-14-0789', '2013-14-0789', '5', 59.0476, 47.2381, 0),
(35, 'IVYPC2592', 'DIACURE KID P/S', 'ADL-07-097', 'Drug', '2015-06-30', '816', '', '15.50', '0', '12648', '2014-02-05', '2013-14-0789', '2013-14-0789', '5', 0, 0, 0),
(36, 'IVYPC1244', 'DIACURE KID', 'ADL-07-097', 'Drug', '2015-06-30', '206', '', '15.50', '62', '3193', '2014-02-05', '2013-14-0790', '2013-14-0790', '5', 59.0476, 47.2381, 0),
(37, 'IVYPC2592', 'DIACURE KID P/S', 'ADL-07-097', 'Drug', '2015-06-30', '46', '', '15.50', '0', '713', '2014-02-05', '2013-14-0790', '2013-14-0790', '5', 0, 0, 0),
(38, 'IVYPC1730', 'PANIVO IV', 'DM4912G', 'Drug', '2014-08-31', '2775', '', '10', '53.90', '27750', '2014-02-05', '02741', '02741', '5', 51.3333, 41.0667, 0),
(39, 'IVYPC1569', 'RX JNR', 'ADL-09-153', 'Drug', '2015-08-31', '4900', '', '8.75', '35', '42875', '2014-02-05', '2013-14-1113', '2013-14-1113', '5', 33.3333, 26.6667, 0),
(40, 'IVYPC1569', 'RX JNR', 'ADL-09-153', 'Drug', '2015-08-31', '163', '', '8.75', '35', '1426.25', '2014-02-05', '2013-14-1114', '2013-14-1114', '5', 33.3333, 26.6667, 0),
(41, 'IVYPC9765', 'DECOSTA 6 TAB', '101346', 'Drug', '2015-09-30', '3450', '', '12', '49', '41400', '2014-02-05', '342', '342', '5', 46.6667, 37.3333, 0),
(42, 'IVYPC9765', 'DECOSTA 6 TAB', '101346', 'Drug', '2015-09-30', '3450', '', '12', '49', '41400', '2014-02-05', '342', '342', '5', 46.6667, 37.3333, 0),
(43, 'IVYPC8076', 'RXD', 'ADL-10-175', 'Drug', '2015-09-30', '2940', '', '13.50', '53', '39690', '2014-02-05', '2013-14-1474', '2013-14-1474', '5', 50.4762, 40.381, 0),
(44, 'IVYPC7583', 'RXD P/S', 'ADL-10-175', 'Drug', '2015-09-30', '980', '', '13.50', '0', '13230', '2014-02-05', '2013-14-1474', '2013-14-1474', '5', 0, 0, 0),
(45, '', '', '', '', '0000-00-00', '', '', '', '', '', '2014-02-05', '', '', '', 0, 0, 0),
(46, 'IVYPC3659', 'PANIVO 40 TAB', 'ADT-10-710', 'Drug', '2015-09-30', '4900', '', '5.6', '60', '27440', '2014-02-05', '2013-14-1526', '2013-14-1526', '5', 57.1429, 45.7143, 0),
(47, 'IVYPC3659', 'PANIVO 40 TAB', 'ADT-10-710', 'Drug', '2015-09-30', '130', '', '5.6', '60', '728', '2014-02-05', '2013-14-1527', '2013-14-1527', '5', 57.1429, 45.7143, 0),
(48, 'IVYPC7330', 'IVCEF', '130622', 'Drug', '2015-05-31', '2800', '', '24.50', '139.90', '68600', '2014-02-05', '01196', '01196', '5', 133.238, 106.59, 0),
(49, 'IVYPC2495', 'IVPIME', 'DM-5637C', 'Drug', '2015-05-31', '1048', '', '50', '280', '52400', '2014-02-05', '04383', '04383', '5', 266.667, 213.333, 0),
(50, 'IVYPC8858', 'LEUMONT', '1213139', 'Drug', '2015-11-30', '2980', '', '9.9', '60', '29502', '2014-02-05', '582', '582', '5', 57.1429, 45.7143, 0),
(51, 'IVYPC4804', 'GIVMOX TAB', '692', 'Drug', '2015-06-30', '500', '', '48', '190', '24000', '2014-02-05', '01197', '01197', '5', 180.952, 144.762, 0),
(52, 'IVYPC1569', 'RX JNR', 'ADL-01-261', 'Drug', '2015-12-31', '4246', '', '8.75', '35', '37152.5', '2014-02-05', '2013-14-1899', '2013-14-1899', '5', 33.3333, 26.6667, 0),
(53, 'IVYPC1569', 'RX JNR', 'ADL-01-261', 'Drug', '2015-12-31', '164', '', '8.75', '35', '1435', '2014-02-05', '2013-14-1900', '2013-14-1900', '5', 33.3333, 26.6667, 0),
(54, 'IVYPC4804', 'GIVMOX TAB', '692', 'Drug', '2015-06-30', '1500', '', '48', '190', '72000', '2014-02-05', '01199', '01199', '5', 180.952, 144.762, 0),
(55, 'IVYPC1780', 'GIVMOX KID', '750', 'Drug', '2015-06-30', '992', '', '13.50', '56', '13392', '2014-02-05', '01243', '01243', '5', 53.3333, 42.6667, 0),
(56, 'IVYPC1037', 'DRS XT', 'C0114112', 'Drug', '2015-12-31', '3480', '', '8.4', '75', '29232', '2014-02-05', '698', '698', '5', 71.4286, 57.1429, 0),
(57, 'IVYPC9765', 'DECOSTA 6 TAB', '011455', 'Drug', '2015-12-31', '1450', '', '12', '49', '17400', '2014-02-05', '727', '727', '5', 46.6667, 37.3333, 0),
(58, 'IVYPC1956', 'WNR IV', 'AM-3554A', 'Drug', '2015-06-30', '5000', '', '4', '22.9', '20000', '2014-02-05', '05362', '05362', '5', 21.8095, 17.4476, 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_billing`
--

DROP TABLE IF EXISTS `purchase_billing`;
CREATE TABLE IF NOT EXISTS `purchase_billing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total_amount` float NOT NULL,
  `discount` float NOT NULL,
  `cst_percent` varchar(100) NOT NULL,
  `cst` float NOT NULL,
  `credit_note` float NOT NULL,
  `debit_note` float NOT NULL,
  `insurance` float NOT NULL,
  `packing_mf` float NOT NULL,
  `misc_charge` float NOT NULL,
  `grand_total` float NOT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `chalan_no` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `purchase_billing`
--

INSERT INTO `purchase_billing` (`id`, `total_amount`, `discount`, `cst_percent`, `cst`, `credit_note`, `debit_note`, `insurance`, `packing_mf`, `misc_charge`, `grand_total`, `invoice_no`, `chalan_no`) VALUES
(1, 49970, 0, '2', 999.4, 0, 0, 0, 0, 0, 50969, '11', '11'),
(2, 32230, 0, '1.5', 483.45, 0, 0, 0, 6500, 0, 39213, '10', '10'),
(3, 94294.5, 0, '1.5', 1414.42, 0, 0, 0, 0, 0, 95709, '2013-14-0150', '2013-14-23'),
(4, 140648, 0, '1.5', 2109.73, 0, 0, 0, 0, 3140.64, 145899, '00262', '00262'),
(5, 31445, 0, '2', 628.9, 0, 0, 0, 0, 0, 32074, '118', '118'),
(6, 60760, 0, '1.5', 911.4, 0, 0, 0, 0, 0, 61671, '2013-14-0324', '2013-14-0324'),
(7, 775, 0, '1.5', 11.625, 0, 0, 0, 0, 0, 787, '2013-14-0325', '2013-14-0325'),
(8, 80256, 0, '1.5', 1203.84, 0, 0, 0, 5000, 1500, 87960, '77', '77'),
(9, 28783, 0, '1.5', 431.745, 0, 0, 0, 0, 0, 29215, '464HP/13-14', '464HP/13-14'),
(10, 79968, 0, '1.5', 1199.52, 0, 0, 0, 0, 0, 81168, '2013-14-3081', '2013-14-3081'),
(11, 56388.1, 0, '1.5', 845.822, 0, 0, 56.38, 0, 0, 57290, '00347', '00347'),
(12, 56388.1, 0, '1.5', 845.822, 0, 0, 56.38, 0, 0, 57290, '00347', '00347'),
(13, 94461, 0, '1.5', 1416.92, 0, 0, 0, 0, 0, 95878, '2013-14-0590', '2013-14-0590'),
(14, 82075, 0, '1.5', 1231.12, 0, 0, 0, 0, 0, 83306, '2013-14-0566', '2013-14-0566'),
(15, 2596.25, 0, '1.5', 38.9437, 0, 0, 0, 0, 0, 2635, '2013-14-0567', '2013-14-0567'),
(16, 42655, 0, '2', 853.1, 0, 0, 0, 0, 0, 43508, '212', '212'),
(17, 30536, 0, '1', 305.36, 0, 0, 35, 0, 0, 30876, '00483', '00483'),
(18, 96861.6, 0, '1.5', 1452.92, 0, 0, 0, 0, 0, 98315, '743HP/13-14', '743HP/13-14'),
(19, 39200, 0, '1.5', 588, 0, 0, 0, 0, 0, 39788, '2013-14-0681', '2013-14-0681'),
(20, 1120, 0, '1.5', 16.8, 0, 0, 0, 0, 0, 1137, '2013-14-0682', '2013-14-0682'),
(21, 75965.5, 0, '1.5', 1139.48, 0, 0, 0, 0, 0, 77105, '2013-14-0789', '2013-14-0789'),
(22, 3906, 0, '1.5', 58.59, 0, 0, 0, 0, 0, 3965, '2013-14-0790', '2013-14-0790'),
(23, 27750, 0, '1.5', 416.25, 0, 0, 50, 0, 0, 28216, '02741', '02741'),
(24, 42875, 0, '1.5', 643.125, 0, 0, 0, 0, 0, 43518, '2013-14-1113', '2013-14-1113'),
(25, 1426.25, 0, '1.5', 21.3937, 0, 0, 0, 0, 0, 1448, '2013-14-1114', '2013-14-1114'),
(26, 41400, 0, '1.5', 621, 0, 0, 0, 150, 0, 42171, '342', '342'),
(28, 52920, 0, '1.5', 793.8, 0, 0, 0, 0, 0, 53714, '2013-14-1474', '2013-14-1474'),
(30, 27440, 0, '1.5', 411.6, 0, 0, 0, 0, 0, 27852, '2013-14-1526', '2013-14-1526'),
(31, 728, 0, '1.5', 10.92, 0, 0, 0, 0, 0, 739, '2013-14-1527', '2013-14-1527'),
(32, 68600, 0, '1', 686, 0, 0, 75, 0, 0, 69361, '01196', '01196'),
(33, 52400, 0, '1.5', 786, 0, 0, 100, 0, 0, 53286, '04383', '04383'),
(34, 29502, 0, '1.5', 442.53, 0, 0, 0, 3500, 1500, 34945, '582', '582'),
(35, 24000, 0, '1.5', 360, 0, 0, 24, 0, 600, 24984, '01197', '01197'),
(36, 37152.5, 0, '1.5', 557.287, 0, 0, 0, 0, 0, 37710, '2013-14-1899', '2013-14-1899'),
(37, 1435, 0, '1.5', 21.525, 0, 0, 0, 0, 0, 1457, '2013-14-1900', '2013-14-1900'),
(38, 72000, 0, '1.5', 1080, 0, 0, 72, 0, 1500, 74652, '01199', '01199'),
(39, 13392, 0, '1.5', 200.88, 0, 0, 13.39, 0, 1500, 15106, '01243', '01243'),
(40, 29232, 0, '1.5', 438.48, 0, 0, 0, 5000, 1500, 36170, '698', '698'),
(41, 17400, 0, '1.5', 261, 0, 0, 0, 0, 0, 17661, '727', '727'),
(42, 20000, 0, '1.5', 300, 0, 0, 50, 0, 0, 20350, '05362', '05362');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_detail`
--

DROP TABLE IF EXISTS `purchase_detail`;
CREATE TABLE IF NOT EXISTS `purchase_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial_no` varchar(50) NOT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `purchase_date` varchar(200) NOT NULL,
  `party` varchar(200) NOT NULL,
  `lr_no` varchar(50) NOT NULL,
  `lr_date` varchar(200) NOT NULL,
  `station` varchar(200) NOT NULL,
  `transport` varchar(200) NOT NULL,
  `mr_name` varchar(200) NOT NULL,
  `chalan_no` varchar(50) NOT NULL,
  `chalan_date` varchar(200) NOT NULL,
  `case_no` varchar(50) NOT NULL,
  `road_permit_no` varchar(50) NOT NULL,
  `product_codes` longtext NOT NULL,
  `product_names` longtext NOT NULL,
  `batch_nos` longtext NOT NULL,
  `mrp_inc_taxs` longtext NOT NULL,
  `categories` longtext NOT NULL,
  `vat_percents` longtext NOT NULL,
  `mrp_exc_taxs` longtext NOT NULL,
  `ptrs` longtext NOT NULL,
  `ptss` longtext NOT NULL,
  `tot_qtys` longtext NOT NULL,
  `frees` longtext NOT NULL,
  `actual_qtys` longtext NOT NULL,
  `expiry_dates` longtext NOT NULL,
  `amounts` longtext NOT NULL,
  `present` date NOT NULL,
  `total_amount` varchar(200) NOT NULL,
  `discount` varchar(200) NOT NULL,
  `cst_percent` varchar(100) NOT NULL,
  `cst` varchar(200) NOT NULL,
  `credit_note` varchar(200) NOT NULL,
  `debit_note` varchar(200) NOT NULL,
  `insurance` varchar(200) NOT NULL,
  `packing_mf` varchar(200) NOT NULL,
  `misc_charge` varchar(200) NOT NULL,
  `grand_total` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `purchase_detail`
--

INSERT INTO `purchase_detail` (`id`, `serial_no`, `invoice_no`, `purchase_date`, `party`, `lr_no`, `lr_date`, `station`, `transport`, `mr_name`, `chalan_no`, `chalan_date`, `case_no`, `road_permit_no`, `product_codes`, `product_names`, `batch_nos`, `mrp_inc_taxs`, `categories`, `vat_percents`, `mrp_exc_taxs`, `ptrs`, `ptss`, `tot_qtys`, `frees`, `actual_qtys`, `expiry_dates`, `amounts`, `present`, `total_amount`, `discount`, `cst_percent`, `cst`, `credit_note`, `debit_note`, `insurance`, `packing_mf`, `misc_charge`, `grand_total`) VALUES
(1, '1', '11', '2013-04-08', 'D.D. Nutritions (India)', '13140063915', '2013-04-09', 'new delhi', 'om logistics', '', '11', '2013-04-09', '3', 'T1920130613085372', 'IVYPC7387,IVYPC7387,IVYPC4972,,', 'IVY NORM RZ,IVY NORM RZ,IVY NORM RZ P/S,,', 'DP-657,DP-582,DP-657,,', '26.9,26.9,0,,', 'Food,Food,Food,,', '14.5,14.5,14.5,,', '23.4934497817,23.4934497817,0,0,0', '18.7947598253,18.7947598253,0,0,0', '', '10625,950,1575,,', '', '', '2014-10-31,2014-10-31,2014-10-31,,', '40375,3610,5985,0,0', '2014-01-31', '49970', '0', '2', '999.4', '0', '0', '0', '0', '0', '50969'),
(2, '2', '10', '2013-04-10', 'M/S Biologics Inc', '11060035090', '11060035090', 'KALAAMB', 'om logistics', '', '10', '2013-04-16', '7', 'T1920130619455556', 'IVYPC5400,IVYPC8629,,,', 'ROZZ TAB,ROZZ TAB P/S,,,', '041303,041303,,,', '80,0,,,', 'Drug,Drug,,,', '5,5,,,', '76.1904761905,0,0,0,0', '60.9523809524,0,0,0,0', '', '2520,410,,,', '', '', '2015-03-31,2015-03-31,,,', '2772000,4510,0,0,0', '2014-01-31', '32230', '0', '1.5', '483.45', '0', '0', '0', '6500', '0', '39213'),
(3, '3', '2013-14-0150', '2013-14-23', 'Adwin Pharma', '915508020', '2013-05-14', 'KALAAMB', 'TCI XPS', '', '2013-14-23', '2013-14-23', '86', 'T1920130638002053', 'IVYPC5361,IVYPC4050,,,', 'WNR 150 P/S,WNR 150,,,', 'ADFL-04-008,ADFL-04-008,,,', '0,104.9,,,', 'Food,Food,,,', '14.5,14.5,,,', '0,91.615720524,0,0,0', '0,73.2925764192,0,0,0', '', '1509,3588,,,', '', '', '2014-09-30,2014-09-30,,,', '27916.5,66378,0,0,0', '2014-01-31', '94294.5', '0', '1.5', '1414.4175', '0', '0', '0', '0', '0', '95709'),
(4, '4', '00262', '2013-06-07', 'Roseate Medicare', '915765255', '2013-06-12', 'SOLAN', 'TCI XPS', '', '00262', '2013-06-12', '56', 'T1920130656496364', 'IVYPC1148,IVYPC5222,IVYPC1569,,', 'I LIVE TAB,I LIVE TAB P/S,RX JNR,,', 'TA-9199,TA-9199,BL-9326,,', '80,0,35,,', 'Drug,Drug,Drug,,', '5,5,5,,', '76.1904761905,0,33.3333333333,0,0', '60.9523809524,0,26.6666666667,0,0', '', '4890,810,4878,,', '', '', '2014-04-30,2014-04-30,2015-05-31,,', '88020,14580,38048.4,0,0', '2014-01-31', '140648.4', '0', '1.5', '2109.7259999999997', '0', '0', '0', '0', '3140.64', '145899'),
(5, '5', '118', '2013-06-20', 'D.D. Nutritions (India)', 'D13529078', '', 'new delhi', 'DTDC PLUS', '', '118', '2013-06-20', '1', 'T1920130665638226', 'IVYPC7387,,,,', 'IVY NORM RZ,,,,', 'DPD-128,,,,', '26.9,,,,', 'Food,,,,', '14.5,,,,', '23.4934497817,0,0,0,0', '18.7947598253,0,0,0,0', '', '8275,,,,', '', '', '2014-12-31,,,,', '31445,0,0,0,0', '2014-01-31', '31445', '0', '2', '628.9', '0', '0', '0', '0', '0', '32074'),
(6, '6', '2013-14-0324', '2012-05-24', 'Adwin Pharma', '916075241', '2013-06-17', 'HIMACHAL PRADESH', 'TCI XPS', '', '2013-14-0324', '2012-05-24', '41', 'T1920130664248604', 'IVYPC1244,,,,', 'DIACURE KID,,,,', 'ADL-05-046,,,,', '62,,,,', 'Drug,,,,', '5,,,,', '59.0476190476,0,0,0,0', '47.2380952381,0,0,0,0', '', '3920,,,,', '', '', '2015-04-30,,,,', '60760,0,0,0,0', '2014-02-05', '60760', '0', '1.5', '911.4', '0', '0', '0', '0', '0', '61671'),
(7, '7', '2013-14-0325', '2013-05-24', 'Adwin Pharma', '916075241', '2013-06-17', 'HIMACHAL PRADESH', 'TCI XPS', '', '2013-14-0325', '2013-05-24', '41', 'T1920130664248604', 'IVYPC1244,,,,', 'DIACURE KID,,,,', 'ADL-05-046,,,,', '62,,,,', 'Drug,,,,', '5,,,,', '59.0476190476,0,0,0,0', '47.2380952381,0,0,0,0', '', '50,,,,', '', '', '2015-04-30,,,,', '775,0,0,0,0', '2014-02-05', '775', '0', '1.5', '11.625', '0', '0', '0', '0', '0', '787'),
(8, '8', '77', '2013-05-30', 'M/S Biologics Inc', '11060036509', '2013-06-05', 'HIMACHAL PRADESH', 'OM LOGISTIC', '', '77', '2013-05-30', '2', 'T1920130656456691', 'IVYPC3908,,,,', 'DECOSTA 30 TAB,,,,', '051390,,,,', '300,,,,', 'Drug,,,,', '5,,,,', '285.714285714,0,0,0,0', '228.571428571,0,0,0,0', '', '1920,,,,', '', '', '2015-04-30,,,,', '80256,0,0,0,0', '2014-02-05', '80256', '0', '1.5', '1203.84', '0', '0', '0', '5000', '1500', '87960'),
(9, '9', '464HP/13-14', '2013-06-28', 'MMC Healthcare (H.P.) Pvt. Ltd.', '916030496', '2013-06-28', 'HIMACHAL PRADESH', 'TCI XPS', '', '464HP/13-14', '2013-06-28', '5', 'T1920130668594689', 'IVYPC7258,IVYPC8655,,,', 'I FRESH,I FRESH P/S,,,', 'IIF-005,IIF-005,,,', '47,0,,,', 'Drug,Drug,,,', '5,5,,,', '44.7619047619,0,0,0,0', '35.8095238095,0,0,0,0', '', '3880,500,,,', '', '', '2015-05-31,2015-05-31,,,', '25608,3175,0,0,0', '2014-02-05', '28783', '0', '1.5', '431.745', '0', '0', '0', '0', '0', '29215'),
(10, '10', '2013-14-3081', '2013-06-07', 'Adwin Pharma', '916075985', '2013-06-25', 'HIMACHAL PRADESH', 'TCI XPS', '', '2013-14-3081', '2013-06-07', '101', 'T1920130677385411', 'IVYPC6585,IVYPC6360,,,', 'ROZZ SUSP,ROZZ SUSP P/S,,,', 'ADFL-06-030,ADFL-06-030,,,', '80,0,,,', 'Food,Food,,,', '14.5,14.5,,,', '69.8689956332,0,0,0,0', '55.8951965066,0,0,0,0', '', '4008,990,,,', '', '', '2014-11-30,2014-11-30,,,', '64128,15840,0,0,0', '2014-02-05', '79968', '0', '1.5', '1199.52', '0', '0', '0', '0', '0', '81168'),
(11, '10', '00347', '2013-07-01', 'Roseate Medicare', '916030916', '2013-07-05', 'HIMACHAL PRADESH', 'TCI XPS', '', '00347', '2013-07-01', '47', 'T1920130681405673', 'IVYPC3349,,,,', 'I LIVE SUSP,,,,', 'BL-9471,,,,', '65,,,,', 'Drug,,,,', '5,,,,', '61.9047619048,0,0,0,0', '49.5238095238,0,0,0,0', '', '4641,,,,', '', '', '2015-05-31,,,,', '56388.15,0,0,0,0', '2014-02-05', '56388.15', '0', '1.5', '845.82225', '0', '0', '56.38', '0', '0', '57290'),
(12, '10', '00347', '2013-07-01', 'Roseate Medicare', '916030916', '2013-07-05', 'HIMACHAL PRADESH', 'TCI XPS', '', '00347', '2013-07-01', '47', 'T1920130681405673', 'IVYPC3349,,,,', 'I LIVE SUSP,,,,', 'BL-9471,,,,', '65,,,,', 'Drug,,,,', '5,,,,', '61.9047619048,0,0,0,0', '49.5238095238,0,0,0,0', '', '4641,,,,', '', '', '2015-05-31,,,,', '56388.15,0,0,0,0', '2014-02-05', '56388.15', '0', '1.5', '845.82225', '0', '0', '56.38', '0', '0', '57290'),
(13, '10', '2013-14-0590', '2013-07-14', 'Adwin Pharma', '915813076', '2013-08-03', 'HIMACHAL PRADESH', 'TCI XPS', '', '2013-14-0590', '2013-07-14', '86', 'T1920130702526356', 'IVYPC4050,,,,', 'WNR 150,,,,', 'ADFL-07-042,,,,', '104.9,,,,', 'Food,,,,', '14.5,,,,', '91.615720524,0,0,0,0', '73.2925764192,0,0,0,0', '', '5106,,,,', '', '', '2014-12-31,,,,', '94461,0,0,0,0', '2014-02-05', '94461', '0', '1.5', '1416.915', '0', '0', '0', '0', '0', '95878'),
(14, '10', '2013-14-0566', '2013-07-10', 'Adwin Pharma', '915813485', '2013-08-01', 'HIMACHAL PRADESH', 'TCI XPS', '', '2013-14-0566', '2013-07-10', '85', 'T1920130702526259', 'IVYPC7193,IVYPC1951,,,', 'APIMAX 200ML,APIMAX 200ML P/S,,,', 'ADL-07-080,ADL-07-083,,,', '75,0,,,', 'Drug,Drug,,,', '5,5,,,', '71.4285714286,0,0,0,0', '57.1428571429,0,0,0,0', '', '3920,980,,,', '', '', '2015-06-30,2015-06-30,,,', '65660,16415,0,0,0', '2014-02-05', '82075', '0', '1.5', '1231.125', '0', '0', '0', '0', '0', '83306'),
(15, '10', '2013-14-0567', '2013-07-10', 'Adwin Pharma', '915813485', '2013-08-01', 'HIMACHAL PRADESH', 'TCI XPS', '', '2013-14-0567', '2013-07-10', '85', 'T1920130702526259', 'IVYPC7193,IVYPC1951,,,', 'APIMAX 200ML,APIMAX 200ML P/S,,,', 'ADL-07-080,ADL-07-083,,,', '75,0,,,', 'Drug,Drug,,,', '5,5,,,', '71.4285714286,0,0,0,0', '57.1428571429,0,0,0,0', '', '75,80,,,', '', '', '2015-06-30,2015-06-30,,,', '1256.25,1340,0,0,0', '2014-02-05', '2596.25', '0', '1.5', '38.94375', '0', '0', '0', '0', '0', '2635'),
(16, '10', '212', '2013-08-07', 'D.D. Nutritions (India)', '10840820', '2013-08-07', 'NEW DELHI', 'OM LOGISTIC', '', '212', '2013-08-07', '2', 'T1920130702528490', 'IVYPC7387,,,,', 'IVY NORM RZ,,,,', 'DPD-214,,,,', '26.90,,,,', 'Food,,,,', '14.5,,,,', '23.4934497817,0,0,0,0', '18.7947598253,0,0,0,0', '', '11225,,,,', '', '', '2015-03-31,,,,', '42655,0,0,0,0', '2014-02-05', '42655', '0', '2', '853.1', '0', '0', '0', '0', '0', '43508'),
(17, '10', '00483', '2013-07-18', 'Sarvear Pharmaceuticals U.A', '807590066', '2013-08-02', 'UTTARAKHAND', 'TCI XPS', '', '00483', '2013-07-18', '6', 'T1920130702531982', 'IVYPC9711,,,,', 'IVCEF KID,,,,', '130621,,,,', '54,,,,', 'Drug,,,,', '5,,,,', '51.4285714286,0,0,0,0', '41.1428571429,0,0,0,0', '', '2776,,,,', '', '', '2015-05-31,,,,', '30536,0,0,0,0', '2014-02-05', '30536', '0', '1', '305.36', '0', '0', '35', '0', '0', '30876'),
(18, '10', '743HP/13-14', '2013-08-17', 'MMC Healthcare (H.P.) Pvt. Ltd.', '916227480', '2013-08-17', 'HIMACHAL PRADESH', 'TCI XPS', '', '743HP/13-14', '2013-08-17', '98', 'T1920130710170344', 'IVYPC2996,IVYPC9812,,,', 'NEOREX JUNIOR,NEOREX JUNIOR P/S,,,', 'NJ-006,NJ-006,,,', '43,0,,,', 'Drug,Drug,,,', '5,5,,,', '40.9523809524,0,0,0,0', '32.7619047619,0,0,0,0', '', '8784,1000,,,', '', '', '2015-06-30,2015-06-30,,,', '86961.6,9900,0,0,0', '2014-02-05', '96861.6', '0', '1.5', '1452.9240000000002', '0', '0', '0', '0', '0', '98315'),
(19, '10', '2013-14-0681', '2013-07-29', 'Adwin Pharma', '915813463', '2013-08-19', 'HIMACHAL PRADESH', 'TCI XPS', '', '2013-14-0681', '2013-07-29', '9', 'T1920130711638536', 'IVYPC1037,IVYPC6297,,,', 'DRS XT,DRS XT P/S,,,', 'ADC-07-048,ADC-07-048,,,', '70,0,,,', 'Drug,Drug,,,', '5,5,,,', '66.6666666667,0,0,0,0', '53.3333333333,0,0,0,0', '', '3920,980,,,', '', '', '2015-06-30,2015-06-30,,,', '31360,7840,0,0,0', '2014-02-05', '39200', '0', '1.5', '588', '0', '0', '0', '0', '0', '39788'),
(20, '10', '2013-14-0682', '2013-07-29', 'Adwin Pharma', '915813463', '2013-08-19', 'HIMACHAL PRADESH', 'TCI XPS', '', '2013-14-0682', '2013-07-29', '9', 'T1920130711638536', 'IVYPC1037,IVYPC6297,,,', 'DRS XT,DRS XT P/S,,,', 'ADC-07-048,ADC-07-048,,,', '70,0,,,', 'Drug,Drug,,,', '5,5,,,', '66.6666666667,0,0,0,0', '53.3333333333,0,0,0,0', '', '60,80,,,', '', '', '2015-06-30,2015-06-30,,,', '480,640,0,0,0', '2014-02-05', '1120', '0', '1.5', '16.8', '0', '0', '0', '0', '0', '1137'),
(21, '10', '2013-14-0789', '2013-08-13', 'Adwin Pharma', '916216140', '2013-09-02', 'HIMACHAL PRADESH', 'TCI XPS', '', '2013-14-0789', '2013-08-13', '53', 'T1920130711638633', 'IVYPC1244,IVYPC2592,,,', 'DIACURE KID,DIACURE KID P/S,,,', 'ADL-07-097,ADL-07-097,,,', '62,0,,,', 'Drug,Drug,,,', '5,5,,,', '59.0476190476,0,0,0,0', '47.2380952381,0,0,0,0', '', '4085,816,,,', '', '', '2015-06-30,2015-06-30,,,', '63317.5,12648,0,0,0', '2014-02-05', '75965.5', '0', '1.5', '1139.4825', '0', '0', '0', '0', '0', '77105'),
(22, '10', '2013-14-0790', '2013-08-13', 'Adwin Pharma', '916216140', '2013-09-02', 'HIMACHAL PRADESH', 'TCI XPS', '', '2013-14-0790', '2013-08-13', '53', 'T1920130711638633', 'IVYPC1244,IVYPC2592,,,', 'DIACURE KID,DIACURE KID P/S,,,', 'ADL-07-097,ADL-07-097,,,', '62,0,,,', 'Drug,Drug,,,', '5,5,,,', '59.0476190476,0,0,0,0', '47.2380952381,0,0,0,0', '', '206,46,,,', '', '', '2015-06-30,2015-06-30,,,', '3193,713,0,0,0', '2014-02-05', '3906', '0', '1.5', '58.59', '0', '0', '0', '0', '0', '3965'),
(23, '10', '02741', '2013-09-16', 'MMG Healthcare', '916216442', '2013-09-17', 'HIMACHAL PRADESH', 'TCI XPS', '', '02741', '2013-09-16', '8', 'T1920130687224606', 'IVYPC1730,,,,', 'PANIVO IV,,,,', 'DM4912G,,,,', '53.90,,,,', 'Drug,,,,', '5,,,,', '51.3333333333,0,0,0,0', '41.0666666667,0,0,0,0', '', '2775,,,,', '', '', '2014-08-31,,,,', '27750,0,0,0,0', '2014-02-05', '27750', '0', '1.5', '416.25', '0', '0', '50', '0', '0', '28216'),
(24, '10', '2013-14-1113', '2013-10-06', 'Adwin Pharma', '915787493', '2013-10-18', 'HIMACHAL PRADESH', 'TCI XPS', '', '2013-14-1113', '2013-10-06', '57', 'T1920130760298198', 'IVYPC1569,,,,', 'RX JNR,,,,', 'ADL-09-153,,,,', '35,,,,', 'Drug,,,,', '5,,,,', '33.3333333333,0,0,0,0', '26.6666666667,0,0,0,0', '', '4900,,,,', '', '', '2015-08-31,,,,', '42875,0,0,0,0', '2014-02-05', '42875', '0', '1.5', '643.125', '0', '0', '0', '0', '0', '43518'),
(25, '10', '2013-14-1114', '2013-10-06', 'Adwin Pharma', '915787493', '2013-10-18', 'HIMACHAL PRADESH', 'TCI XPS', '', '2013-14-1114', '2013-10-06', '57', 'T1920130760298198', 'IVYPC1569,,,,', 'RX JNR,,,,', 'ADL-09-153,,,,', '35,,,,', 'Drug,,,,', '5,,,,', '33.3333333333,0,0,0,0', '26.6666666667,0,0,0,0', '', '163,,,,', '', '', '2015-08-31,,,,', '1426.25,0,0,0,0', '2014-02-05', '1426.25', '0', '1.5', '21.39375', '0', '0', '0', '0', '0', '1448'),
(26, '10', '342', '2013-10-21', 'M/S Biologics Inc', '915787876', '2013-10-22', 'HIMACHAL PRADESH', 'TCI XPS', '', '342', '2013-10-21', '3', 't1920130760337677', 'IVYPC9765,,,,', 'DECOSTA 6 TAB,,,,', '101346,,,,', '49,,,,', 'Drug,,,,', '5,,,,', '46.6666666667,0,0,0,0', '37.3333333333,0,0,0,0', '', '3450,,,,', '', '', '2015-09-30,,,,', '41400,0,0,0,0', '2014-02-05', '41400', '0', '1.5', '621', '0', '0', '0', '150', '0', '42171'),
(28, '10', '2013-14-1474', '2013-11-24', 'Adwin Pharma', '9169556143', '2013-12-03', 'HIMACHAL PRADESH', 'TCI XPS', '', '2013-14-1474', '2013-11-24', '36', 't1920130795245649', 'IVYPC8076,IVYPC7583,,,', 'RXD,RXD P/S,,,', 'ADL-10-175,ADL-10-175,,,', '53,0,,,', 'Drug,Drug,,,', '5,5,,,', '50.4761904762,0,0,0,0', '40.380952381,0,0,0,0', '', '2940,980,,,', '', '', '2015-09-30,2015-09-30,,,', '39690,13230,0,0,0', '2014-02-05', '52920', '0', '1.5', '793.8', '0', '0', '0', '0', '0', '53714'),
(30, '10', '2013-14-1526', '2013-11-29', 'Adwin Pharma', '916958744', '2013-12-07', 'HIMACHAL PRADESH', 'TCI XPS', '', '2013-14-1526', '2013-11-29', '3', 'T1920130798933880', 'IVYPC3659,,,,', 'PANIVO 40 TAB,,,,', 'ADT-10-710,,,,', '60,,,,', 'Drug,,,,', '5,,,,', '57.1428571429,0,0,0,0', '45.7142857143,0,0,0,0', '', '4900,,,,', '', '', '2015-09-30,,,,', '27440,0,0,0,0', '2014-02-05', '27440', '0', '1.5', '411.6', '0', '0', '0', '0', '0', '27852'),
(31, '10', '2013-14-1527', '2013-11-29', 'Adwin Pharma', '916958744', '2013-12-07', 'HIMACHAL PRADESH', 'TCI XPS', '', '2013-14-1527', '2013-11-29', '3', 'T1920130798933880', 'IVYPC3659,,,,', 'PANIVO 40 TAB,,,,', 'ADT-10-710,,,,', '60,,,,', 'Drug,,,,', '5,,,,', '57.1428571429,0,0,0,0', '45.7142857143,0,0,0,0', '', '130,,,,', '', '', '2015-09-30,,,,', '728,0,0,0,0', '2014-02-05', '728', '0', '1.5', '10.92', '0', '0', '0', '0', '0', '739'),
(32, '10', '01196', '2013-12-06', 'Sarvear Pharmaceuticals U.A', '807934805', '2013-12-09', 'UTTARAKHAND', 'TCI XPS', '', '01196', '2013-12-06', '8', 'T1920130760306055', 'IVYPC7330,,,,', 'IVCEF,,,,', '130622,,,,', '139.90,,,,', 'Drug,,,,', '5,,,,', '133.238095238,0,0,0,0', '106.59047619,0,0,0,0', '', '2800,,,,', '', '', '2015-05-31,,,,', '68600,0,0,0,0', '2014-02-05', '68600', '0', '1', '686', '0', '0', '75', '0', '0', '69361'),
(33, '10', '04383', '2013-12-09', 'MMG Healthcare', '916958943', '2013-12-10', 'HIMACHAL PRADESH', 'TCI XPS', '', '04383', '2013-12-09', '4', 'T1920130800917045', 'IVYPC2495,,,,', 'IVPIME,,,,', 'DM-5637C,,,,', '280,,,,', 'Drug,,,,', '5,,,,', '266.666666667,0,0,0,0', '213.333333333,0,0,0,0', '', '1048,,,,', '', '', '2015-05-31,,,,', '52400,0,0,0,0', '2014-02-05', '52400', '0', '1.5', '786', '0', '0', '100', '0', '0', '53286'),
(34, '10', '582', '2013-12-25', 'M/S Biologics Inc', '916959783', '2013-12-21', 'HIMACHAL PRADESH', 'TCI XPS', '', '582', '2013-12-25', '2', 'T1920130804176051', 'IVYPC8858,,,,', 'LEUMONT,,,,', '1213139,,,,', '60,,,,', 'Drug,,,,', '5,,,,', '57.1428571429,0,0,0,0', '45.7142857143,0,0,0,0', '', '2980,,,,', '', '', '2015-11-30,,,,', '29502,0,0,0,0', '2014-02-05', '29502', '0', '1.5', '442.53', '0', '0', '0', '3500', '1500', '34945'),
(35, '10', '01197', '2014-01-11', 'Roseate Medicare', 'MK-0135896X1', '2014-01-14', 'HIMACHAL PRADESH', 'FIRST FLIGHT', '', '01197', '2014-01-11', '1', 'T1920130789109138', 'IVYPC4804,,,,', 'GIVMOX TAB,,,,', '692,,,,', '190,,,,', 'Drug,,,,', '5,,,,', '180.952380952,0,0,0,0', '144.761904762,0,0,0,0', '', '500,,,,', '', '', '2015-06-30,,,,', '24000,0,0,0,0', '2014-02-05', '24000', '0', '1.5', '360', '0', '0', '24', '0', '600', '24984'),
(36, '10', '2013-14-1899', '2014-01-22', 'Adwin Pharma', '916628226', '2014-01-22', 'HIMACHAL PRADESH', 'TCI XPS', '', '2013-14-1899', '2014-01-22', '49', 'T1920130814871562', 'IVYPC1569,,,,', 'RX JNR,,,,', 'ADL-01-261,,,,', '35,,,,', 'Drug,,,,', '5,,,,', '33.3333333333,0,0,0,0', '26.6666666667,0,0,0,0', '', '4246,,,,', '', '', '2015-12-31,,,,', '37152.5,0,0,0,0', '2014-02-05', '37152.5', '0', '1.5', '557.2875', '0', '0', '0', '0', '0', '37710'),
(37, '10', '2013-14-1900', '2014-01-22', 'Adwin Pharma', '916628226', '2014-01-22', 'HIMACHAL PRADESH', 'TCI XPS', '', '2013-14-1900', '2014-01-22', '49', 'T1920130814871562', 'IVYPC1569,,,,', 'RX JNR,,,,', 'ADL-01-261,,,,', '35,,,,', 'Drug,,,,', '5,,,,', '33.3333333333,0,0,0,0', '26.6666666667,0,0,0,0', '', '164,,,,', '', '', '2015-12-31,,,,', '1435,0,0,0,0', '2014-02-05', '1435', '0', '1.5', '21.525', '0', '0', '0', '0', '0', '1457'),
(38, '10', '01199', '2014-01-13', 'Roseate Medicare', '916795740', '2014-01-15', 'HIMACHAL PRADESH', 'TCI XPS', '', '01199', '2014-01-13', '3', 'T1920140828945922', 'IVYPC4804,,,,', 'GIVMOX TAB,,,,', '692,,,,', '190,,,,', 'Drug,,,,', '5,,,,', '180.952380952,0,0,0,0', '144.761904762,0,0,0,0', '', '1500,,,,', '', '', '2015-06-30,,,,', '72000,0,0,0,0', '2014-02-05', '72000', '0', '1.5', '1080', '0', '0', '72', '0', '1500', '74652'),
(39, '10', '01243', '2014-01-21', 'Roseate Medicare', '916796086', '2014-01-23', 'HIMACHAL PRADESH', 'TCI XPS', '', '01243', '2014-01-21', '3', 'T1920140833691065', 'IVYPC1780,,,,', 'GIVMOX KID,,,,', '750,,,,', '56,,,,', 'Drug,,,,', '5,,,,', '53.3333333333,0,0,0,0', '42.6666666667,0,0,0,0', '', '992,,,,', '', '', '2015-06-30,,,,', '13392,0,0,,0', '2014-02-05', '13392', '0', '1.5', '200.88', '0', '0', '13.39', '0', '1500', '15106'),
(40, '10', '698', '2014-01-22', 'M/S Biologics Inc', '916628241', '2014-01-22', 'HIMACHAL PRADESH', 'TCI XPS', '', '698', '2014-01-22', '7', 'T1920140833777686', 'IVYPC1037,,,,', 'DRS XT,,,,', 'C0114112,,,,', '75,,,,', 'Drug,,,,', '5,,,,', '71.4285714286,0,0,0,0', '57.1428571429,0,0,0,0', '', '3480,,,,', '', '', '2015-12-31,,,,', '29232,0,0,,0', '2014-02-05', '29232', '0', '1.5', '438.48', '0', '0', '0', '5000', '1500', '36170'),
(41, '10', '727', '2014-01-28', 'M/S Biologics Inc', '916628683', '2014-01-28', 'HIMACHAL PRADESH', 'TCI XPS', '', '727', '2014-01-28', '1', 'T19201408338508667', 'IVYPC9765,,,,', 'DECOSTA 6 TAB,,,,', '011455,,,,', '49,,,,', 'Drug,,,,', '5,,,,', '46.6666666667,0,0,0,0', '37.3333333333,0,0,0,0', '', '1450,,,,', '', '', '2015-12-31,,,,', '17400,0,0,0,0', '2014-02-05', '17400', '0', '1.5', '261', '0', '0', '0', '0', '0', '17661'),
(42, '10', '05362', '2014-01-30', 'MMG Healthcare', '916628801', '2014-01-30', 'HIMACHAL PRADESH', 'TCI XPS', '', '05362', '2014-01-30', '2', 't1920140838528746', 'IVYPC1956,,,,', 'WNR IV,,,,', 'AM-3554A,,,,', '22.9,,,,', 'Drug,,,,', '5,,,,', '21.8095238095,0,0,0,0', '17.4476190476,0,0,0,0', '', '5000,,,,', '', '', '2015-06-30,,,,', '20000,0,0,0,0', '2014-02-05', '20000', '0', '1.5', '300', '0', '0', '50', '0', '0', '20350');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_info`
--

DROP TABLE IF EXISTS `purchase_info`;
CREATE TABLE IF NOT EXISTS `purchase_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial_no` varchar(50) NOT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `purchase_date` varchar(200) NOT NULL,
  `party` varchar(200) NOT NULL,
  `lr_no` varchar(50) NOT NULL,
  `lr_date` varchar(200) NOT NULL,
  `station` varchar(200) NOT NULL,
  `transport` varchar(200) NOT NULL,
  `mr_name` varchar(200) NOT NULL,
  `chalan_no` varchar(50) NOT NULL,
  `chalan_date` varchar(200) NOT NULL,
  `case_no` varchar(50) NOT NULL,
  `road_permit_no` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `purchase_info`
--

INSERT INTO `purchase_info` (`id`, `serial_no`, `invoice_no`, `purchase_date`, `party`, `lr_no`, `lr_date`, `station`, `transport`, `mr_name`, `chalan_no`, `chalan_date`, `case_no`, `road_permit_no`) VALUES
(1, '1', '11', '2013-04-08', 'D.D. Nutritions (India)', '13140063915', '2013-04-09', 'new delhi', 'om logistics', '', '11', '2013-04-09', '3', 'T1920130613085372'),
(2, '2', '10', '2013-04-10', 'M/S Biologics Inc', '11060035090', '11060035090', 'KALAAMB', 'om logistics', '', '10', '2013-04-16', '7', 'T1920130619455556'),
(3, '3', '2013-14-0150', '2013-14-23', 'Adwin Pharma', '915508020', '2013-05-14', 'KALAAMB', 'TCI XPS', '', '2013-14-23', '2013-14-23', '86', 'T1920130638002053'),
(4, '4', '00262', '2013-06-07', 'Roseate Medicare', '915765255', '2013-06-12', 'SOLAN', 'TCI XPS', '', '00262', '2013-06-12', '56', 'T1920130656496364'),
(5, '5', '118', '2013-06-20', 'D.D. Nutritions (India)', 'D13529078', '', 'new delhi', 'DTDC PLUS', '', '118', '2013-06-20', '1', 'T1920130665638226'),
(6, '6', '2013-14-0324', '2012-05-24', 'Adwin Pharma', '916075241', '2013-06-17', 'HIMACHAL PRADESH', 'TCI XPS', '', '2013-14-0324', '2012-05-24', '41', 'T1920130664248604'),
(7, '7', '2013-14-0325', '2013-05-24', 'Adwin Pharma', '916075241', '2013-06-17', 'HIMACHAL PRADESH', 'TCI XPS', '', '2013-14-0325', '2013-05-24', '41', 'T1920130664248604'),
(8, '8', '77', '2013-05-30', 'M/S Biologics Inc', '11060036509', '2013-06-05', 'HIMACHAL PRADESH', 'OM LOGISTIC', '', '77', '2013-05-30', '2', 'T1920130656456691'),
(9, '9', '464HP/13-14', '2013-06-28', 'MMC Healthcare (H.P.) Pvt. Ltd.', '916030496', '2013-06-28', 'HIMACHAL PRADESH', 'TCI XPS', '', '464HP/13-14', '2013-06-28', '5', 'T1920130668594689'),
(10, '10', '2013-14-3081', '2013-06-07', 'Adwin Pharma', '916075985', '2013-06-25', 'HIMACHAL PRADESH', 'TCI XPS', '', '2013-14-3081', '2013-06-07', '101', 'T1920130677385411'),
(11, '10', '00347', '2013-07-01', 'Roseate Medicare', '916030916', '2013-07-05', 'HIMACHAL PRADESH', 'TCI XPS', '', '00347', '2013-07-01', '47', 'T1920130681405673'),
(12, '10', '00347', '2013-07-01', 'Roseate Medicare', '916030916', '2013-07-05', 'HIMACHAL PRADESH', 'TCI XPS', '', '00347', '2013-07-01', '47', 'T1920130681405673'),
(13, '10', '2013-14-0590', '2013-07-14', 'Adwin Pharma', '915813076', '2013-08-03', 'HIMACHAL PRADESH', 'TCI XPS', '', '2013-14-0590', '2013-07-14', '86', 'T1920130702526356'),
(14, '10', '2013-14-0566', '2013-07-10', 'Adwin Pharma', '915813485', '2013-08-01', 'HIMACHAL PRADESH', 'TCI XPS', '', '2013-14-0566', '2013-07-10', '85', 'T1920130702526259'),
(15, '10', '2013-14-0567', '2013-07-10', 'Adwin Pharma', '915813485', '2013-08-01', 'HIMACHAL PRADESH', 'TCI XPS', '', '2013-14-0567', '2013-07-10', '85', 'T1920130702526259'),
(16, '10', '212', '2013-08-07', 'D.D. Nutritions (India)', '10840820', '2013-08-07', 'NEW DELHI', 'OM LOGISTIC', '', '212', '2013-08-07', '2', 'T1920130702528490'),
(17, '10', '00483', '2013-07-18', 'Sarvear Pharmaceuticals U.A', '807590066', '2013-08-02', 'UTTARAKHAND', 'TCI XPS', '', '00483', '2013-07-18', '6', 'T1920130702531982'),
(18, '10', '743HP/13-14', '2013-08-17', 'MMC Healthcare (H.P.) Pvt. Ltd.', '916227480', '2013-08-17', 'HIMACHAL PRADESH', 'TCI XPS', '', '743HP/13-14', '2013-08-17', '98', 'T1920130710170344'),
(19, '10', '2013-14-0681', '2013-07-29', 'Adwin Pharma', '915813463', '2013-08-19', 'HIMACHAL PRADESH', 'TCI XPS', '', '2013-14-0681', '2013-07-29', '9', 'T1920130711638536'),
(20, '10', '2013-14-0682', '2013-07-29', 'Adwin Pharma', '915813463', '2013-08-19', 'HIMACHAL PRADESH', 'TCI XPS', '', '2013-14-0682', '2013-07-29', '9', 'T1920130711638536'),
(21, '10', '2013-14-0789', '2013-08-13', 'Adwin Pharma', '916216140', '2013-09-02', 'HIMACHAL PRADESH', 'TCI XPS', '', '2013-14-0789', '2013-08-13', '53', 'T1920130711638633'),
(22, '10', '2013-14-0790', '2013-08-13', 'Adwin Pharma', '916216140', '2013-09-02', 'HIMACHAL PRADESH', 'TCI XPS', '', '2013-14-0790', '2013-08-13', '53', 'T1920130711638633'),
(23, '10', '02741', '2013-09-16', 'MMG Healthcare', '916216442', '2013-09-17', 'HIMACHAL PRADESH', 'TCI XPS', '', '02741', '2013-09-16', '8', 'T1920130687224606'),
(24, '10', '2013-14-1113', '2013-10-06', 'Adwin Pharma', '915787493', '2013-10-18', 'HIMACHAL PRADESH', 'TCI XPS', '', '2013-14-1113', '2013-10-06', '57', 'T1920130760298198'),
(25, '10', '2013-14-1114', '2013-10-06', 'Adwin Pharma', '915787493', '2013-10-18', 'HIMACHAL PRADESH', 'TCI XPS', '', '2013-14-1114', '2013-10-06', '57', 'T1920130760298198'),
(26, '10', '342', '2013-10-21', 'M/S Biologics Inc', '915787876', '2013-10-22', 'HIMACHAL PRADESH', 'TCI XPS', '', '342', '2013-10-21', '3', 't1920130760337677'),
(28, '10', '2013-14-1474', '2013-11-24', 'Adwin Pharma', '9169556143', '2013-12-03', 'HIMACHAL PRADESH', 'TCI XPS', '', '2013-14-1474', '2013-11-24', '36', 't1920130795245649'),
(30, '10', '2013-14-1526', '2013-11-29', 'Adwin Pharma', '916958744', '2013-12-07', 'HIMACHAL PRADESH', 'TCI XPS', '', '2013-14-1526', '2013-11-29', '3', 'T1920130798933880'),
(31, '10', '2013-14-1527', '2013-11-29', 'Adwin Pharma', '916958744', '2013-12-07', 'HIMACHAL PRADESH', 'TCI XPS', '', '2013-14-1527', '2013-11-29', '3', 'T1920130798933880'),
(32, '10', '01196', '2013-12-06', 'Sarvear Pharmaceuticals U.A', '807934805', '2013-12-09', 'UTTARAKHAND', 'TCI XPS', '', '01196', '2013-12-06', '8', 'T1920130760306055'),
(33, '10', '04383', '2013-12-09', 'MMG Healthcare', '916958943', '2013-12-10', 'HIMACHAL PRADESH', 'TCI XPS', '', '04383', '2013-12-09', '4', 'T1920130800917045'),
(34, '10', '582', '2013-12-25', 'M/S Biologics Inc', '916959783', '2013-12-21', 'HIMACHAL PRADESH', 'TCI XPS', '', '582', '2013-12-25', '2', 'T1920130804176051'),
(35, '10', '01197', '2014-01-11', 'Roseate Medicare', 'MK-0135896X1', '2014-01-14', 'HIMACHAL PRADESH', 'FIRST FLIGHT', '', '01197', '2014-01-11', '1', 'T1920130789109138'),
(36, '10', '2013-14-1899', '2014-01-22', 'Adwin Pharma', '916628226', '2014-01-22', 'HIMACHAL PRADESH', 'TCI XPS', '', '2013-14-1899', '2014-01-22', '49', 'T1920130814871562'),
(37, '10', '2013-14-1900', '2014-01-22', 'Adwin Pharma', '916628226', '2014-01-22', 'HIMACHAL PRADESH', 'TCI XPS', '', '2013-14-1900', '2014-01-22', '49', 'T1920130814871562'),
(38, '10', '01199', '2014-01-13', 'Roseate Medicare', '916795740', '2014-01-15', 'HIMACHAL PRADESH', 'TCI XPS', '', '01199', '2014-01-13', '3', 'T1920140828945922'),
(39, '10', '01243', '2014-01-21', 'Roseate Medicare', '916796086', '2014-01-23', 'HIMACHAL PRADESH', 'TCI XPS', '', '01243', '2014-01-21', '3', 'T1920140833691065'),
(40, '10', '698', '2014-01-22', 'M/S Biologics Inc', '916628241', '2014-01-22', 'HIMACHAL PRADESH', 'TCI XPS', '', '698', '2014-01-22', '7', 'T1920140833777686'),
(41, '10', '727', '2014-01-28', 'M/S Biologics Inc', '916628683', '2014-01-28', 'HIMACHAL PRADESH', 'TCI XPS', '', '727', '2014-01-28', '1', 'T19201408338508667'),
(42, '10', '05362', '2014-01-30', 'MMG Healthcare', '916628801', '2014-01-30', 'HIMACHAL PRADESH', 'TCI XPS', '', '05362', '2014-01-30', '2', 't1920140838528746');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_sample`
--

DROP TABLE IF EXISTS `purchase_sample`;
CREATE TABLE IF NOT EXISTS `purchase_sample` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `category` varchar(100) NOT NULL,
  `expiry_date` date NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `present` date NOT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `chalan_no` varchar(50) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_sample_detail`
--

DROP TABLE IF EXISTS `purchase_sample_detail`;
CREATE TABLE IF NOT EXISTS `purchase_sample_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial_no` varchar(50) NOT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `purchase_date` varchar(200) NOT NULL,
  `party` varchar(200) NOT NULL,
  `lr_no` varchar(50) NOT NULL,
  `lr_date` varchar(200) NOT NULL,
  `station` varchar(200) NOT NULL,
  `transport` varchar(200) NOT NULL,
  `mr_name` varchar(200) NOT NULL,
  `chalan_no` varchar(50) NOT NULL,
  `chalan_date` varchar(200) NOT NULL,
  `case_no` varchar(50) NOT NULL,
  `road_permit_no` varchar(50) NOT NULL,
  `present` date NOT NULL,
  `total_amount` varchar(200) NOT NULL,
  `discount` varchar(200) NOT NULL,
  `cst_percent` varchar(100) NOT NULL,
  `cst` varchar(200) NOT NULL,
  `credit_note` varchar(200) NOT NULL,
  `debit_note` varchar(200) NOT NULL,
  `insurance` varchar(200) NOT NULL,
  `packing_mf` varchar(200) NOT NULL,
  `misc_charge` varchar(200) NOT NULL,
  `grand_total` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `replacement_invoice`
--

DROP TABLE IF EXISTS `replacement_invoice`;
CREATE TABLE IF NOT EXISTS `replacement_invoice` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `packing` varchar(250) NOT NULL,
  `mrp_inc_tax` float NOT NULL,
  `mrp_inc_tax_amt` float NOT NULL,
  `category` varchar(100) NOT NULL,
  `vat_percent` varchar(100) NOT NULL,
  `mrp_exc_tax` float NOT NULL,
  `ptr` float NOT NULL,
  `tot_qty` float NOT NULL,
  `free` varchar(100) NOT NULL,
  `actual_qty` float NOT NULL,
  `expiry_date` date NOT NULL,
  `vat_amt` float NOT NULL,
  `net_amt` float NOT NULL,
  `temp_rand` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `present_date` date NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `replacement_invoice`
--

INSERT INTO `replacement_invoice` (`p_id`, `product_code`, `product_name`, `batch_no`, `packing`, `mrp_inc_tax`, `mrp_inc_tax_amt`, `category`, `vat_percent`, `mrp_exc_tax`, `ptr`, `tot_qty`, `free`, `actual_qty`, `expiry_date`, `vat_amt`, `net_amt`, `temp_rand`, `status`, `present_date`) VALUES
(1, 'IVYPC1037', 'DRS XT', 'ADC-07-048', '10X10', 70, 770, 'Drug', '5', 66.6667, 53.3333, 10, '1', 0, '2015-06-30', 36.6667, 533.333, '803220140317', '', '2014-03-17'),
(2, 'IVYPC7387', 'IVY NORM RZ', 'DP-657', '1X25', 26.9, 887.7, 'Food', '14.5', 23.4935, 18.7948, 30, '3', 0, '2014-10-31', 112.416, 563.844, '803220140317', '', '2014-03-17'),
(3, 'IVYPC5887', 'IV MOX TAB', 'PBT-1652', '10X6', 114, 2052, 'Drug', '5', 108.571, 86.8571, 14.5, '3.5', 0, '2014-02-28', 97.7143, 1259.43, '900820140317', '', '2014-03-17'),
(4, 'IVYPC8360', 'ISOGEN XT', 'ADFL-0031', '10X10', 70, 770, 'Food', '14.5', 61.1354, 48.9083, 10, '1', 0, '2014-06-30', 97.5109, 489.083, '900820140317', '', '2014-03-17');

-- --------------------------------------------------------

--
-- Table structure for table `replacement_invoice_info`
--

DROP TABLE IF EXISTS `replacement_invoice_info`;
CREATE TABLE IF NOT EXISTS `replacement_invoice_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial_no` varchar(50) NOT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `purchase_date` varchar(200) NOT NULL,
  `party` varchar(50) NOT NULL,
  `party_address` varchar(250) NOT NULL,
  `party_dl_no` varchar(250) NOT NULL,
  `lr_no` varchar(50) NOT NULL,
  `lr_date` varchar(200) NOT NULL,
  `station` varchar(200) NOT NULL,
  `transport` varchar(200) NOT NULL,
  `mr_name` varchar(200) NOT NULL,
  `chalan_no` varchar(100) NOT NULL,
  `chalan_date` varchar(200) NOT NULL,
  `case_no` varchar(50) NOT NULL,
  `road_permit_no` varchar(50) NOT NULL,
  `total` float NOT NULL,
  `tax_amt5` float NOT NULL,
  `vat5` float NOT NULL,
  `tax_amt145` float NOT NULL,
  `vat145` float NOT NULL,
  `subtotal` float NOT NULL,
  `td_percent` float NOT NULL,
  `td` float NOT NULL,
  `misc_charges` float NOT NULL,
  `freight` float NOT NULL,
  `cash_disc` float NOT NULL,
  `net_bill` varchar(250) NOT NULL,
  `temp_rand` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `replacement_invoice_info`
--

INSERT INTO `replacement_invoice_info` (`id`, `serial_no`, `invoice_no`, `purchase_date`, `party`, `party_address`, `party_dl_no`, `lr_no`, `lr_date`, `station`, `transport`, `mr_name`, `chalan_no`, `chalan_date`, `case_no`, `road_permit_no`, `total`, `tax_amt5`, `vat5`, `tax_amt145`, `vat145`, `subtotal`, `td_percent`, `td`, `misc_charges`, `freight`, `cash_disc`, `net_bill`, `temp_rand`, `status`, `remarks`) VALUES
(1, '1', 'IVY(REPINVOICE13/14)-1', '2013-12-03', 'A R ENTERPRISE', 'C/O K.M MEDICAL HALL\r\nSHAHJAHAN ROAD, BARUIPUR\r\nKOLKATA 700144\r\nPH NO - 9903452247', '3587SW/3582SBW', '', '', '', '', 'Soumitra Manna', '', '', '', '', 1097.18, 770, 36.67, 887.7, 112.42, 987.462, 10, 109.718, 0, 0, 0, '1136.55', '803220140317', '', ''),
(2, '2', 'IVY(REPINVOICE13/14)-2', '2013-12-10', 'C S ENTERPRISE', 'K. K. SUPER MARKET, NEAR CHOWMATHA, 1ST FLOOR, R.N ROAD, BASIRHAT, NORTH 24 PGNS.\r\nPH NO - 9733892522', '4730SW / 4722SBW', '', '', '', '', 'Amit sarkar', '', '', '', '', 1748.51, 2052, 97.71, 770, 97.51, 1573.66, 10, 174.851, 0, 0, 0, '1768.88', '900820140317', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `item_image` varchar(250) NOT NULL,
  `thumb_img1` varchar(250) NOT NULL,
  `review_title` longtext NOT NULL,
  `user_review` longtext NOT NULL,
  `review_date` varchar(100) NOT NULL,
  `rating` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_invoice`
--

DROP TABLE IF EXISTS `tmp_invoice`;
CREATE TABLE IF NOT EXISTS `tmp_invoice` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `packing` varchar(250) NOT NULL,
  `mrp_inc_tax` float NOT NULL,
  `mrp_inc_tax_amt` float NOT NULL,
  `category` varchar(100) NOT NULL,
  `vat_percent` varchar(100) NOT NULL,
  `mrp_exc_tax` float NOT NULL,
  `ptr` float NOT NULL,
  `tot_qty` float NOT NULL,
  `free` varchar(100) NOT NULL,
  `actual_qty` float NOT NULL,
  `expiry_date` date NOT NULL,
  `vat_amt` float NOT NULL,
  `net_amt` float NOT NULL,
  `temp_rand` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `present_date` date NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `tmp_invoice`
--

INSERT INTO `tmp_invoice` (`p_id`, `product_code`, `product_name`, `batch_no`, `packing`, `mrp_inc_tax`, `mrp_inc_tax_amt`, `category`, `vat_percent`, `mrp_exc_tax`, `ptr`, `tot_qty`, `free`, `actual_qty`, `expiry_date`, `vat_amt`, `net_amt`, `temp_rand`, `status`, `present_date`) VALUES
(6, 'IVYPC4050', 'WNR 150', 'ADFL-085', '200ML', 88, 5280, 'Food', '14.5', 76.8559, 61.4847, 50, '10', 0, '2014-05-31', 668.646, 3074.24, '715920140219', '', '0000-00-00'),
(7, 'IVYPC4050', 'WNR 150', 'ADFL-085', '200ML', 88, 5280, 'Food', '14.5', 76.8559, 61.4847, 54, '6', 0, '2014-05-31', 668.646, 3320.17, '715920140219', '', '0000-00-00'),
(8, 'IVYPC7258', 'I FRESH', 'IIF-004', '10X10', 47, 1551, 'Drug', '5', 44.7619, 35.8095, 30, '3', 0, '2014-09-30', 73.8571, 1074.29, '302820140219', '', '0000-00-00'),
(9, 'IVYPC5887', 'IV MOX TAB', 'PBT-1652', '10X6', 114, 3762, 'Drug', '5', 108.571, 86.8571, 30, '3', 0, '2014-02-28', 179.143, 2605.71, '302820140219', '', '0000-00-00'),
(24, 'IVYPC6994', 'HELL SUSPENSION', 'ADL-151', '10ML', 22.9, 503.8, 'Drug', '5', 21.8095, 17.4476, 20, '2', 0, '2014-04-30', 23.9905, 348.952, '410320140220', '', '0000-00-00'),
(25, 'IVYPC1569', 'RX JNR', 'ADL-385', '60ML', 35, 3150, 'Drug', '5', 33.3333, 26.6667, 81, '9', 0, '2015-01-31', 150, 2160, '410320140220', '', '0000-00-00'),
(26, 'IVYPC3349', 'I LIVE SUSP', 'ADL-120', '60ML', 55, 165, 'Drug', '5', 52.381, 41.9048, 2, '1', 0, '2014-08-31', 7.85714, 83.8096, '410320140220', '', '0000-00-00'),
(27, 'IVYPC3349', 'I LIVE SUSP', '7023', '60ML', 55, 385, 'Drug', '5', 52.381, 41.9048, 7, '0', 0, '2014-08-31', 18.3333, 293.334, '410320140220', '', '0000-00-00'),
(28, 'IVYPC4050', 'WNR 150', 'ADFL-026', '200ML', 88, 880, 'Food', '14.5', 76.8559, 61.4847, 9, '1', 0, '2013-12-31', 111.441, 553.362, '410320140220', '', '0000-00-00'),
(29, 'IVYPC7258', 'I FRESH', 'IIF-004', '10X10', 47, 517, 'Drug', '5', 44.7619, 35.8095, 10, '1', 0, '2014-09-30', 24.619, 358.095, '410320140220', '', '0000-00-00'),
(30, 'IVYPC1148', 'I LIVE TAB', 'ADT-1015', '10X10', 80, 80, 'Drug', '5', 76.1905, 60.9524, 0, '1', 0, '2014-07-31', 3.80952, 0, '410320140220', '', '0000-00-00'),
(31, 'IVYPC1148', 'I LIVE TAB', 'ADT-1290', '10X10', 80, 4320, 'Drug', '5', 76.1905, 60.9524, 50, '4', 0, '2014-07-31', 205.714, 3047.62, '410320140220', '', '0000-00-00'),
(32, 'IVYPC2261', 'STRENGTH 25', '2718C', '1 AMP', 59.9, 1437.6, 'Drug', '5', 57.0476, 45.6381, 20, '4', 0, '2014-03-31', 68.4571, 912.762, '410320140220', '', '0000-00-00'),
(33, 'IVYPC7193', 'APIMAX 200ML', 'ADL-322', '200ML', 75, 1650, 'Drug', '5', 71.4286, 57.1429, 18, '4', 0, '2014-10-31', 78.5714, 1028.57, '410320140220', '', '0000-00-00'),
(34, 'IVYPC1037', 'DRS XT', 'ADC-03-082', '10X10', 70, 4200, 'Drug', '5', 66.6667, 53.3333, 60, '0', 0, '2014-02-28', 200, 3200, '648620140220', '', '0000-00-00'),
(35, 'IVYPC3659', 'PANIVO 40 TAB', 'ADT-1680', '10X10', 55, 5500, 'Drug', '5', 52.381, 41.9048, 100, '0', 0, '2014-09-30', 261.905, 4190.48, '648620140220', '', '0000-00-00'),
(36, 'IVYPC8858', 'LEUMONT', 'ADT-1320', '10X10', 60, 1200, 'Drug', '5', 57.1429, 45.7143, 20, '0', 0, '2014-07-31', 57.1429, 914.286, '648620140220', '', '0000-00-00'),
(38, 'IVYPC9765', 'DECOSTA 6 TAB', 'ADT-1790', '10X10', 49, 2450, 'Drug', '5', 46.6667, 37.3333, 50, '0', 0, '2015-01-31', 116.667, 1866.67, '648620140220', '', '0000-00-00'),
(39, 'IVYPC7387', 'IVY NORM RZ', 'DP-582', '1X25', 26.9, 6725, 'Food', '14.5', 23.4935, 18.7948, 250, '0', 0, '2014-07-31', 851.638, 4698.7, '648620140220', '', '0000-00-00'),
(40, 'IVYPC8076', 'RXD', 'ADL-328', '100ML', 49, 2450, 'Drug', '5', 46.6667, 37.3333, 50, '0', 0, '2014-11-30', 116.667, 1866.67, '648620140220', '', '0000-00-00'),
(41, 'IVYPC7193', 'APIMAX 200ML', 'ADL-322', '200ML', 75, 4500, 'Drug', '5', 71.4286, 57.1429, 60, '0', 0, '2014-10-31', 214.286, 3428.57, '648620140220', '', '0000-00-00'),
(42, 'IVYPC4050', 'WNR 150', 'ADFL-085', '200ML', 88, 5280, 'Food', '14.5', 76.8559, 61.4847, 60, '0', 0, '2014-05-31', 668.646, 3689.08, '648620140220', '', '0000-00-00'),
(43, 'IVYPC5263', 'DECOSTA SUSP 30ML', '8440', '30ML', 49.9, 1996, 'Drug', '5', 47.5238, 38.019, 40, '0', 0, '2015-02-28', 95.0476, 1520.76, '648620140220', '', '0000-00-00'),
(44, 'IVYPC7258', 'I FRESH', 'IIF-004', '10X10', 47, 1551, 'Drug', '5', 44.7619, 35.8095, 30, '3', 0, '2014-09-30', 73.8571, 1074.29, '733320140220', '', '0000-00-00'),
(45, 'IVYPC1037', 'DRS XT', 'ADC-03-082', '10X10', 70, 2310, 'Drug', '5', 66.6667, 53.3333, 30, '3', 0, '2014-02-28', 110, 1600, '733320140220', '', '0000-00-00'),
(46, 'IVYPC4050', 'WNR 150', 'ADFL-085', '200ML', 88, 5280, 'Food', '14.5', 76.8559, 61.4847, 54, '6', 0, '2014-05-31', 668.646, 3320.17, '741420140221', '', '0000-00-00'),
(47, 'IVYPC2996', 'NEOREX JUNIOR', 'NJ-005', '60ML', 39, 3900, 'Drug', '5', 37.1429, 29.7143, 90, '10', 0, '2014-11-30', 185.714, 2674.29, '741420140221', '', '0000-00-00'),
(48, 'IVYPC5887', 'IV MOX TAB', 'PBT-1652', '10X6', 114, 1254, 'Drug', '5', 108.571, 86.8571, 10, '1', 0, '2014-02-28', 59.7143, 868.571, '536320140221', '', '0000-00-00'),
(49, 'IVYPC3659', 'PANIVO 40 TAB', 'ADT-1680', '10X10', 55, 16500, 'Drug', '5', 52.381, 41.9048, 300, '0', 0, '2014-09-30', 785.714, 12571.4, '480520140221', '', '0000-00-00'),
(50, 'IVYPC2996', 'NEOREX JUNIOR', 'NJ-005', '60ML', 39, 507, 'Drug', '5', 37.1429, 29.7143, 10, '3', 0, '2014-11-30', 24.1429, 297.143, '846620140221', '', '0000-00-00'),
(51, 'IVYPC5263', 'DECOSTA SUSP 30ML', '8440', '30ML', 49.9, 1497, 'Drug', '5', 47.5238, 38.019, 27, '3', 0, '2015-02-28', 71.2857, 1026.51, '911420140221', '', '0000-00-00'),
(52, 'IVYPC2996', 'NEOREX JUNIOR', 'NJ-005', '60ML', 39, 780, 'Drug', '5', 37.1429, 29.7143, 18, '2', 0, '2014-11-30', 37.1429, 534.857, '911420140221', '', '0000-00-00'),
(53, 'IVYPC8076', 'RXD', 'ADL-328', '100ML', 49, 980, 'Drug', '5', 46.6667, 37.3333, 18, '2', 0, '2014-11-30', 46.6667, 671.999, '911420140221', '', '0000-00-00'),
(54, 'IVYPC2397', 'WNR GOLD', 'ADFC-12134', '10X10', 99, 5445, 'Food', '14.5', 86.4629, 69.1703, 50, '5', 0, '2014-05-31', 689.542, 3458.51, '911420140221', '', '0000-00-00'),
(55, 'IVYPC7387', 'IVY NORM RZ', 'DP-582', '1X25', 26.9, 2959, 'Food', '14.5', 23.4935, 18.7948, 100, '10', 0, '2014-07-31', 374.721, 1879.48, '911420140221', '', '0000-00-00'),
(56, 'IVYPC1037', 'DRS XT', 'ADC-03-082', '10X10', 70, 7700, 'Drug', '5', 66.6667, 53.3333, 100, '10', 0, '2014-02-28', 366.667, 5333.33, '911420140221', '', '0000-00-00'),
(57, 'IVYPC1569', 'RX JNR', 'ADL-385', '60ML', 35, 35, 'Drug', '5', 33.3333, 26.6667, 0, '1', 0, '2015-01-31', 1.66667, 0, '911420140221', '', '0000-00-00'),
(58, 'IVYPC4050', 'WNR 150', 'ADFL-085', '200ML', 88, 10560, 'Food', '14.5', 76.8559, 61.4847, 100, '20', 0, '2014-05-31', 1337.29, 6148.47, '612120140221', '', '0000-00-00'),
(59, 'IVYPC7037', 'IV MOX KID', '7048', '30ML', 54, 540, 'Drug', '5', 51.4286, 41.1429, 9, '1', 0, '2014-02-28', 25.7143, 370.286, '163320140221', '', '0000-00-00'),
(60, 'IVYPC1244', 'DIACURE KID', 'ADL-182', '60ML', 62, 620, 'Drug', '5', 59.0476, 47.2381, 9, '1', 0, '2014-06-30', 29.5238, 425.143, '163320140221', '', '0000-00-00'),
(61, 'IVYPC7193', 'APIMAX 200ML', 'ADL-322', '200ML', 75, 750, 'Drug', '5', 71.4286, 57.1429, 9, '1', 0, '2014-10-31', 35.7143, 514.286, '163320140221', '', '0000-00-00'),
(63, 'IVYPC7037', 'IV MOX KID', '7048', '30ML', 54, 1512, 'Drug', '5', 51.4286, 41.1429, 20, '8', 0, '2014-02-28', 72, 822.858, '338820140221', '', '0000-00-00'),
(64, 'IVYPC9765', 'DECOSTA 6 TAB', '031339', '10X10', 49, 3430, 'Drug', '5', 46.6667, 37.3333, 50, '20', 0, '2015-02-28', 163.333, 1866.67, '338820140221', '', '0000-00-00'),
(65, 'IVYPC5887', 'IV MOX TAB', 'PBT-1652', '10X6', 114, 1254, 'Drug', '5', 108.571, 86.8571, 10, '1', 0, '2014-02-28', 59.7143, 868.571, '446020140221', '', '0000-00-00'),
(66, 'IVYPC5263', 'DECOSTA SUSP 30ML', '8440', '30ML', 49.9, 1497, 'Drug', '5', 47.5238, 38.019, 27, '3', 0, '2015-02-28', 71.2857, 1026.51, '320820140221', '', '0000-00-00'),
(67, 'IVYPC1148', 'I LIVE TAB', 'ADT-1290', '10X10', 80, 2640, 'Drug', '5', 76.1905, 60.9524, 30, '3', 0, '2014-07-31', 125.714, 1828.57, '320820140221', '', '0000-00-00'),
(68, 'IVYPC7387', 'IVY NORM RZ', 'DP-657', '1X25', 26.9, 4142.6, 'Food', '14.5', 23.4935, 18.7948, 140, '14', 0, '2014-10-31', 524.609, 2631.27, '320820140221', '', '0000-00-00'),
(69, 'IVYPC1569', 'RX JNR', 'ADL-385', '60ML', 35, 3150, 'Drug', '5', 33.3333, 26.6667, 81, '9', 0, '2015-01-31', 150, 2160, '320820140221', '', '0000-00-00'),
(70, 'IVYPC7258', 'I FRESH', 'IIF-004', '10X10', 47, 2585, 'Drug', '5', 44.7619, 35.8095, 50, '5', 0, '2014-09-30', 123.095, 1790.47, '320820140221', '', '0000-00-00'),
(71, 'IVYPC9765', 'DECOSTA 6 TAB', '031339', '10X10', 49, 3234, 'Drug', '5', 46.6667, 37.3333, 60, '6', 0, '2015-02-28', 154, 2240, '320820140221', '', '0000-00-00'),
(72, 'IVYPC4050', 'WNR 150', 'ADFL-085', '200ML', 88, 10560, 'Food', '14.5', 76.8559, 61.4847, 108, '12', 0, '2014-05-31', 1337.29, 6640.35, '859420140221', '', '0000-00-00'),
(73, 'IVYPC7258', 'I FRESH', 'IIF-004', '10X10', 47, 3102, 'Drug', '5', 44.7619, 35.8095, 60, '6', 0, '2014-09-30', 147.714, 2148.57, '859420140221', '', '0000-00-00'),
(74, 'IVYPC5887', 'IV MOX TAB', 'PBT-1652', '10X6', 114, 3762, 'Drug', '5', 108.571, 86.8571, 30, '3', 0, '2014-02-28', 179.143, 2605.71, '859420140221', '', '0000-00-00'),
(75, 'IVYPC4050', 'WNR 150', 'ADFL-085', '200ML', 88, 10560, 'Food', '14.5', 76.8559, 61.4847, 100, '20', 0, '2014-05-31', 1337.29, 6148.47, '513220140221', '', '0000-00-00'),
(76, 'IVYPC2397', 'WNR GOLD', 'ADFC-12134', '10X10', 99, 3267, 'Food', '14.5', 86.4629, 69.1703, 30, '3', 0, '2014-05-31', 413.725, 2075.11, '877320140221', '', '0000-00-00'),
(77, 'IVYPC1148', 'I LIVE TAB', 'ADT-1290', '10X10', 80, 3520, 'Drug', '5', 76.1905, 60.9524, 40, '4', 0, '2014-07-31', 167.619, 2438.1, '279220140221', '', '0000-00-00'),
(78, 'IVYPC4050', 'WNR 150', 'ADFL-085', '200ML', 88, 1760, 'Food', '14.5', 76.8559, 61.4847, 18, '2', 0, '2014-05-31', 222.882, 1106.72, '279220140221', '', '0000-00-00'),
(79, 'IVYPC2996', 'NEOREX JUNIOR', 'NJ-005', '60ML', 39, 507, 'Drug', '5', 37.1429, 29.7143, 10, '3', 0, '2014-11-30', 24.1429, 297.143, '935220140221', '', '0000-00-00'),
(81, 'IVYPC1244', 'DIACURE KID', 'ADL-182', '60ML', 62, 1860, 'Drug', '5', 59.0476, 47.2381, 27, '3', 0, '2014-06-30', 88.5714, 1275.43, '956220140317', '', '2014-03-17'),
(82, 'IVYPC9765', 'DECOSTA 6 TAB', '031339', '10X10', 49, 5390, 'Drug', '5', 46.6667, 37.3333, 100, '10', 0, '2015-02-28', 256.667, 3733.33, '956220140317', '', '2014-03-17'),
(83, 'IVYPC7387', 'IVY NORM RZ', 'DP-657', '1X25', 26.9, 3550.8, 'Food', '14.5', 23.4935, 18.7948, 120, '12', 0, '2014-10-31', 449.665, 2255.38, '956220140317', '', '2014-03-17'),
(84, 'IVYPC2397', 'WNR GOLD', 'ADFC-12134', '10X10', 99, 10890, 'Food', '14.5', 86.4629, 69.1703, 100, '10', 0, '2014-05-31', 1379.08, 6917.03, '956220140317', '', '2014-03-17');

-- --------------------------------------------------------

--
-- Table structure for table `vat`
--

DROP TABLE IF EXISTS `vat`;
CREATE TABLE IF NOT EXISTS `vat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vat_type` varchar(200) NOT NULL,
  `vat_percent` varchar(100) NOT NULL,
  `state` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `vat`
--

INSERT INTO `vat` (`id`, `vat_type`, `vat_percent`, `state`) VALUES
(2, 'Drug', '5', 'WB'),
(3, 'Food', '13.5', 'BIHAR'),
(4, 'Drug', '5', 'BIHAR'),
(5, 'Food', '13.5', 'ODISHA'),
(6, 'Drug', '5', 'ODISHA'),
(7, 'Food', '14.5', 'WB'),
(8, 'Sample', '0', 'BIHAR');

-- --------------------------------------------------------

--
-- Table structure for table `wb_accounts`
--

DROP TABLE IF EXISTS `wb_accounts`;
CREATE TABLE IF NOT EXISTS `wb_accounts` (
  `acc_id` int(11) NOT NULL AUTO_INCREMENT,
  `particulars` varchar(250) NOT NULL,
  `debit` varchar(250) NOT NULL,
  `credit` varchar(250) NOT NULL,
  `on_date` date NOT NULL,
  `cust_name` varchar(250) NOT NULL,
  `customer_code` varchar(100) NOT NULL,
  `payment_mode` varchar(250) NOT NULL,
  `cheque_no` varchar(250) NOT NULL,
  `cheque_date` date NOT NULL,
  `invo_no` varchar(250) NOT NULL,
  `amount` varchar(250) NOT NULL,
  `temp_rand` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  PRIMARY KEY (`acc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `wb_accounts`
--

INSERT INTO `wb_accounts` (`acc_id`, `particulars`, `debit`, `credit`, `on_date`, `cust_name`, `customer_code`, `payment_mode`, `cheque_no`, `cheque_date`, `invo_no`, `amount`, `temp_rand`, `status`) VALUES
(1, 'Sale', '7092.26', '', '2014-02-19', 'A R ENTERPRISE', 'IVY-CUST7929', '', '', '0000-00-00', 'IV (13/14)-1', '7092.26', '715920140219', ''),
(2, 'Sale', '3565.00', '', '2014-02-19', 'NANDAN MEDICAL STORE', 'IVY-CUST7624', '', '', '0000-00-00', 'IV (13/14)-2', '3565.00', '302820140219', ''),
(3, 'Sale', '8587.65', '', '2014-02-19', 'NANDAN MEDICAL STORE', 'IVY-CUST7624', '', '', '0000-00-00', 'IV (13/14)-3', '8587.65', '779320140219', ''),
(4, 'Sale', '8587.65', '', '2014-02-20', 'ma tara', 'IVY-CUST1673', '', '', '0000-00-00', 'IV (13/14)-3', '8587.65', '410320140220', ''),
(5, 'Sale', '12731.07', '', '2014-02-20', 'POPULAR MEDICAL AGENCY', 'IVY-CUST2264', '', '', '0000-00-00', 'IV (13/14)-4', '12731.07', '648620140220', ''),
(6, 'Sale', '2526.71', '', '2014-02-20', 'NANDAN MEDICAL STORE', 'IVY-CUST7624', '', '', '0000-00-00', 'IV (13/14)-5', '2526.71', '733320140220', ''),
(7, 'Sale', '6249.37', '', '2014-02-21', 'lokenath', 'IVY-CUST7334', '', '', '0000-00-00', 'IV (13/14)-6', '6249.37', '741420140221', ''),
(8, 'Sale', '910.91', '', '2014-02-21', 'jeevan surakha', 'IVY-CUST6746', '', '', '0000-00-00', 'IV (13/14)-7', '910.91', '536320140221', ''),
(9, 'Sale', '4686.00', '', '2014-02-21', 'GOPAL AGENCY', 'IVY-CUST6798', '', '', '0000-00-00', 'IV (13/14)-8', '4686.00', '480520140221', ''),
(10, 'Sale', '321.28', '', '2014-02-21', 'dr s k samanta', 'IVY-CUST7078', '', '', '0000-00-00', 'IV (13/14)-9', '321.28', '846620140221', ''),
(11, 'Sale', '13201.91', '', '2014-02-21', 'A R ENTERPRISE', 'IVY-CUST7929', '', '', '0000-00-00', 'IV (13/14)-10', '13201.91', '911420140221', ''),
(12, 'Sale', '6870.91', '', '2014-02-21', 'A R ENTERPRISE', 'IVY-CUST7929', '', '', '0000-00-00', 'IV (13/14)-11', '6870.91', '612120140221', ''),
(13, 'Sale', '1269.70', '', '2014-02-21', 'A R ENTERPRISE', 'IVY-CUST7929', '', '', '0000-00-00', 'IV (13/14)-12', '1269.70', '163320140221', ''),
(14, 'Sale', '2924.85', '', '2014-02-21', 'DR DIPU RANJAN BAIRAGI', 'IVY-CUST4791', '', '', '0000-00-00', 'IV (13/14)-13', '2924.85', '338820140221', ''),
(15, 'Sale', '910.91', '', '2014-02-21', 'jeevan surakha', 'IVY-CUST6746', '', '', '0000-00-00', 'IV (13/14)-14', '910.91', '446020140221', ''),
(16, 'Sale', '11657.86', '', '2014-02-21', 'A R ENTERPRISE', 'IVY-CUST7929', '', '', '0000-00-00', 'IV (13/14)-15', '11657.86', '320820140221', ''),
(17, 'Sale', '11336.32', '', '2014-02-21', 'NANDAN MEDICAL STORE', 'IVY-CUST7624', '', '', '0000-00-00', 'IV (13/14)-16', '11336.32', '859420140221', ''),
(18, 'Sale', '6870.91', '', '2014-02-21', 'A R ENTERPRISE', 'IVY-CUST7929', '', '', '0000-00-00', 'IV (13/14)-17', '6870.91', '513220140221', ''),
(19, 'Sale', '2281.32', '', '2014-02-21', 'A R ENTERPRISE', 'IVY-CUST7929', '', '', '0000-00-00', 'IV (13/14)-18', '2281.32', '877320140221', ''),
(20, 'Sale', '3580.84', '', '2014-02-21', 'ma tara', 'IVY-CUST1673', '', '', '0000-00-00', 'IV (13/14)-19', '3580.84', '279220140221', ''),
(21, 'Sale', '321.28', '', '2014-02-21', 'dr s k samanta', 'IVY-CUST7078', '', '', '0000-00-00', 'IV (13/14)-20', '321.28', '935220140221', ''),
(22, 'hdfc', '', '10000', '2013-12-17', 'A R ENTERPRISE', 'IVY-CUST7929', 'cheque', '7779999', '2013-12-18', 'Rec022', '10000', '', ''),
(23, 'indian bank', '', '5000', '2013-11-08', 'KALPANA DISTRIBUTAR', 'IVY-CUST2151', 'cash', '', '2013-11-08', 'Rec023', '5000', '', ''),
(24, 'andhra bank', '', '10000', '2013-09-20', 'C S ENTERPRISE', 'IVY-CUST3471', 'cash', '234456', '2013-09-21', 'Rec024', '10000', '', ''),
(25, 'Sale', '14885.03', '', '2014-03-17', 'A R ENTERPRISE', 'IVY-CUST7929', '', '', '0000-00-00', 'IV (13/14)-21', '14885.03', '956220140317', ''),
(26, 'Credit Note', '', '1024.46', '2014-03-17', 'C S ENTERPRISE', 'IVY-CUST3471', '', '', '0000-00-00', 'IVY(CRINVOICE13/14)-1', '1024.46', '142520140317', ''),
(27, 'Replacement', '1136.55', '', '2014-03-17', 'A R ENTERPRISE', 'IVY-CUST7929', '', '', '0000-00-00', 'IVY(REPINVOICE13/14)-1', '1136.55', '803220140317', ''),
(28, 'Replacement', '1768.88', '', '2014-03-17', 'C S ENTERPRISE', 'IVY-CUST3471', '', '', '0000-00-00', 'IVY(REPINVOICE13/14)-2', '1768.88', '900820140317', ''),
(29, 'Credit Note', '', '3129524.09', '2014-03-17', 'M/S NEW MAHAMAYA AGENCY PHARMACEUTICAL DISTRIBUTORS', 'IVY-CUST1056', '', '', '0000-00-00', 'IVY(CRINVOICE13/14)-2', '3129524.09', '890820140317', ''),
(30, 'NA', '', '20000', '2014-03-21', 'C S ENTERPRISE', 'IVY-CUST3471', 'cash', '', '0000-00-00', 'Rec030', '20000', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `wb_sample_stock`
--

DROP TABLE IF EXISTS `wb_sample_stock`;
CREATE TABLE IF NOT EXISTS `wb_sample_stock` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(200) NOT NULL,
  `product_code` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `category` varchar(100) NOT NULL,
  `tot_qty` float NOT NULL,
  `expiry_date` date NOT NULL,
  `present` date NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wb_stock`
--

DROP TABLE IF EXISTS `wb_stock`;
CREATE TABLE IF NOT EXISTS `wb_stock` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(200) NOT NULL,
  `product_code` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `mrp_inc_tax` float NOT NULL,
  `category` varchar(100) NOT NULL,
  `vat_percent` varchar(100) NOT NULL,
  `mrp_exc_tax` float NOT NULL,
  `ptr` float NOT NULL,
  `pts` float NOT NULL,
  `tot_qty` float NOT NULL,
  `free` varchar(100) NOT NULL,
  `actual_qty` float NOT NULL,
  `expiry_date` date NOT NULL,
  `present` date NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=99 ;

--
-- Dumping data for table `wb_stock`
--

INSERT INTO `wb_stock` (`p_id`, `product_id`, `product_code`, `product_name`, `batch_no`, `mrp_inc_tax`, `category`, `vat_percent`, `mrp_exc_tax`, `ptr`, `pts`, `tot_qty`, `free`, `actual_qty`, `expiry_date`, `present`) VALUES
(5, '3', 'IVYPC6994', 'HELL SUSPENSION', 'ADL-151', 22.9, 'Drug', '5', 21.8095, 17.4476, 0, 2781, '0', 4211, '2014-04-30', '2014-02-20'),
(6, '4', 'IVYPC5284', 'STRENGTH 50', 'AM-2719D', 109.9, 'Drug', '5', 104.667, 83.7333, 0, 0, '0', 906, '2015-04-30', '2014-01-21'),
(7, '5', 'IVYPC2261', 'STRENGTH 25', '2718C', 59.9, 'Drug', '5', 57.0476, 45.6381, 0, 498, '0', 522, '2014-03-31', '2014-02-20'),
(8, '22', 'IVYPC7258', 'I FRESH', 'IIF-004', 47, 'Drug', '5', 44.7619, 35.8095, 0, 281, '0', 435, '2014-09-30', '2014-02-20'),
(9, '6', 'IVYPC1956', 'WNR IV', 'AM-2598F', 22.9, 'Drug', '5', 21.8095, 17.4476, 0, 4550, '0', 4550, '2014-03-31', '2014-01-21'),
(10, '20', 'IVYPC5263', 'DECOSTA SUSP 30ML', '8440', 49.9, 'Drug', '5', 47.5238, 38.019, 0, 843, '0', 943, '2015-02-28', '2014-01-21'),
(11, '21', 'IVYPC8858', 'LEUMONT', 'ADT-1320', 60, 'Drug', '5', 57.1429, 45.7143, 0, 1659, '0', 1679, '2014-07-31', '2014-01-21'),
(12, '21', 'IVYPC8858', 'LEUMONT', 'ADT-1031', 60, 'Drug', '5', 57.1429, 45.7143, 0, 2, '0', 2, '2013-11-30', '2014-01-21'),
(13, '7', 'IVYPC5400', 'ROZZ TAB', 'ADT-1786', 80, 'Drug', '5', 76.1905, 60.9524, 0, 2510, '0', 2510, '2015-04-30', '2014-01-21'),
(14, '7', 'IVYPC5400', 'ROZZ TAB', 'ADT-03-701', 80, 'Drug', '5', 76.1905, 60.9524, 0, 329, '0', 329, '2013-08-31', '2014-01-21'),
(15, '23', 'IVYPC1755', 'DIACURE N', 'ADT-1287', 100, 'Drug', '5', 95.2381, 76.1905, 0, 3016, '0', 3016, '2014-06-30', '2014-01-21'),
(16, '23', 'IVYPC1755', 'DIACURE N', 'ADT-1008', 89, 'Drug', '5', 84.7619, 67.8095, 0, 5, '0', 5, '2014-03-31', '2014-01-21'),
(17, '8', 'IVYPC7037', 'IV MOX KID', '7048', 54, 'Drug', '5', 51.4286, 41.1429, 0, 682, '0', 720, '2014-02-28', '2014-01-21'),
(18, '9', 'IVYPC1244', 'DIACURE KID', 'ADL-182', 62, 'Drug', '5', 59.0476, 47.2381, 0, 200038, '0', 1128, '2014-06-30', '2014-01-21'),
(19, '9', 'IVYPC1244', 'DIACURE KID', 'ADL-03-153', 62, 'Drug', '5', 59.0476, 47.2381, 0, 0, '0', 1, '2014-02-28', '2014-01-21'),
(20, '9', 'IVYPC1244', 'DIACURE KID', 'ADL-03-153', 62, 'Drug', '5', 59.0476, 47.2381, 0, 0, '0', 1, '2014-02-28', '2014-01-21'),
(21, '10', 'IVYPC7387', 'IVY NORM RZ', 'DP-582', 26.9, 'Food', '14.5', 23.4935, 18.7948, 0, 33, '0', 1493, '2014-07-31', '2014-01-21'),
(22, '11', 'IVYPC3659', 'PANIVO 40 TAB', 'ADT-1680', 55, 'Drug', '5', 52.381, 41.9048, 0, 1621, '0', 2021, '2014-09-30', '2014-01-21'),
(23, '12', 'IVYPC9765', 'DECOSTA 6 TAB', 'ADT-1790', 49, 'Drug', '5', 46.6667, 37.3333, 0, 0, '0', 1820, '2015-01-31', '2014-01-21'),
(24, '12', 'IVYPC9765', 'DECOSTA 6 TAB', 'ADT-1770', 49, 'Drug', '5', 46.6667, 37.3333, 0, 0, '0', 37, '2014-12-31', '2014-01-21'),
(25, '12', 'IVYPC9765', 'DECOSTA 6 TAB', 'ADT-1319', 42, 'Drug', '5', 40, 32, 0, 2, '0', 7, '2014-07-31', '2014-01-21'),
(26, '13', 'IVYPC1148', 'I LIVE TAB', 'ADT-1290', 80, 'Drug', '5', 76.1905, 60.9524, 0, 25, '0', 156, '2014-07-31', '2014-02-20'),
(27, '13', 'IVYPC1148', 'I LIVE TAB', 'ADT-1015', 80, 'Drug', '5', 76.1905, 60.9524, 0, 0, '0', 1, '2014-07-31', '2014-02-20'),
(28, '14', 'IVYPC5887', 'IV MOX TAB', 'PBT-1652', 114, 'Drug', '5', 108.571, 86.8571, 0, 1758, '0', 1864, '2014-02-28', '2014-01-21'),
(29, '15', 'IVYPC6585', 'ROZZ SUSP', 'ADFL-072', 85, 'Food', '14.5', 74.2358, 59.3886, 0, 192, '0', 1090, '2014-03-31', '2014-01-21'),
(30, '15', 'IVYPC6585', 'ROZZ SUSP', 'ADFL-03-075', 85, 'Food', '14.5', 74.2358, 59.3886, 0, 0, '0', 2, '2013-08-31', '2014-01-21'),
(31, '17', 'IVYPC1730', 'PANIVO IV', 'DM-4799E', 51.9, 'Drug', '5', 49.4286, 39.5429, 0, 537, '0', 537, '2014-06-30', '2014-01-21'),
(32, '18', 'IVYPC1037', 'DRS XT', 'ADC-03-082', 70, 'Drug', '5', 66.6667, 53.3333, 0, 1876, '0', 2079, '2014-02-28', '2014-01-21'),
(33, '19', 'IVYPC9060', 'DECOSTA SUSP 60ML', 'ADL-186', 59.9, 'Drug', '5', 57.0476, 45.6381, 0, 3, '0', 78, '2014-06-30', '2014-01-21'),
(34, '19', 'IVYPC9060', 'DECOSTA SUSP 60ML', 'ADL-03-167', 59.9, 'Drug', '5', 57.0476, 45.6381, 0, 0, '0', 13, '2014-02-28', '2014-01-21'),
(35, '19', 'IVYPC9060', 'DECOSTA SUSP 60ML', 'ADL-163', 59.9, 'Drug', '5', 57.0476, 45.6381, 0, 0, '0', 2, '2014-05-30', '2014-01-21'),
(36, '19', 'IVYPC9060', 'DECOSTA SUSP 60ML', '8439', 59.9, 'Drug', '5', 57.0476, 45.6381, 0, 1500, '0', 4020, '2015-02-28', '2014-01-21'),
(37, '24', 'IVYPC2996', 'NEOREX JUNIOR', 'NJ-005', 39, 'Drug', '5', 37.1429, 29.7143, 0, 4397, '0', 4543, '2014-11-30', '2014-01-21'),
(38, '25', 'IVYPC1569', 'RX JNR', 'ADL-223', 32, 'Drug', '5', 30.4762, 24.381, 0, 0, '0', 225, '2014-07-31', '2014-01-21'),
(39, '25', 'IVYPC1569', 'RX JNR', 'ADL-339', 32, 'Drug', '5', 30.4762, 24.381, 0, -5, '0', 64, '2014-11-30', '2014-01-21'),
(40, '25', 'IVYPC1569', 'RX JNR', 'ADL-385', 35, 'Drug', '5', 33.3333, 26.6667, 0, 1808, '0', 5105, '2015-01-31', '2014-02-20'),
(41, '26', 'IVYPC4050', 'WNR 150', 'ADFL-026', 88, 'Food', '14.5', 76.8559, 61.4847, 0, 2, '0', 12, '2013-12-31', '2014-02-20'),
(43, '28', 'IVYPC7193', 'APIMAX 200ML', 'ADL-322', 75, 'Drug', '5', 71.4286, 57.1429, 0, 685, '0', 827, '2014-10-31', '2014-02-20'),
(44, '27', 'IVYPC2397', 'WNR GOLD', 'ADFC-12134', 99, 'Food', '14.5', 86.4629, 69.1703, 0, 5687, '0', 6485, '2014-05-31', '2014-01-21'),
(45, '27', 'IVYPC2397', 'WNR GOLD', 'ADFC-12111', 99, 'Food', '14.5', 86.4629, 69.1703, 0, 2, '0', 2, '2014-04-30', '2014-01-21'),
(46, '30', 'IVYPC8076', 'RXD', 'ADL-328', 49, 'Drug', '5', 46.6667, 37.3333, 0, 716, '0', 786, '2014-11-30', '2014-01-21'),
(47, '30', 'IVYPC8076', 'RXD', 'ADL-03-157', 49, 'Drug', '5', 46.6667, 37.3333, 0, 2, '0', 2, '2014-02-28', '2014-01-21'),
(48, '31', 'IVYPC8360', 'ISOGEN XT', 'ADFL-0031', 70, 'Food', '14.5', 61.1354, 48.9083, 0, 2829, '0', 2840, '2014-06-30', '2014-01-21'),
(49, '32', 'IVYPC7330', 'IVCEF', '121209', 139.9, 'Drug', '5', 133.238, 106.59, 0, 1080, '0', 1080, '2014-11-30', '2014-01-21'),
(50, '16', 'IVYPC9711', 'IVCEF KID', '121106', 54, 'Drug', '5', 51.4286, 41.1429, 0, 615, '0', 615, '2014-10-31', '2014-01-21'),
(51, '37', 'IVYPC3349', 'I LIVE SUSP', 'ADL-120', 55, 'Drug', '5', 52.381, 41.9048, 0, 0, '0', 3, '2014-08-31', '2014-02-20'),
(52, '37', 'IVYPC3349', 'I LIVE SUSP', '7023', 55, 'Drug', '5', 52.381, 41.9048, 0, 1083, '0', 1090, '2014-08-31', '2014-02-20'),
(53, '12', 'IVYPC9765', 'DECOSTA 6 TAB', '031339', 49, 'Drug', '5', 46.6667, 37.3333, 0, 3544, '', 0, '2015-02-28', '2014-01-30'),
(54, '10', 'IVYPC7387', 'IVY NORM RZ', 'DP-657', 26.9, 'Food', '14.5', 23.4935, 18.7948, 0, 10306, '', 0, '2014-10-31', '2014-01-31'),
(55, '10', 'IVYPC7387', 'IVY NORM RZ', 'DP-582', 26.9, 'Food', '14.5', 23.4935, 18.7948, 0, 33, '', 0, '2014-10-31', '2014-01-31'),
(56, '51', 'IVYPC4972', 'IVY NORM RZ P/S', 'DP-657', 0, 'Food', '14.5', 0, 0, 0, 1575, '', 0, '2014-10-31', '2014-01-31'),
(57, '7', 'IVYPC5400', 'ROZZ TAB', '041303', 80, 'Drug', '5', 76.1905, 60.9524, 0, 2520, '', 0, '2015-03-31', '2014-01-31'),
(58, '46', 'IVYPC8629', 'ROZZ TAB P/S', '041303', 0, 'Drug', '5', 0, 0, 0, 410, '', 0, '2015-03-31', '2014-01-31'),
(59, '61', 'IVYPC5361', 'WNR 150 P/S', 'ADFL-04-008', 0, 'Food', '14.5', 0, 0, 0, 1509, '', 0, '2014-09-30', '2014-01-31'),
(60, '26', 'IVYPC4050', 'WNR 150', 'ADFL-04-008', 104.9, 'Food', '14.5', 91.6157, 73.2926, 0, 3588, '', 0, '2014-09-30', '2014-01-31'),
(61, '13', 'IVYPC1148', 'I LIVE TAB', 'TA-9199', 80, 'Drug', '5', 76.1905, 60.9524, 0, 4890, '', 0, '2014-04-30', '2014-01-31'),
(62, '54', 'IVYPC5222', 'I LIVE TAB P/S', 'TA-9199', 0, 'Drug', '5', 0, 0, 0, 810, '', 0, '2014-04-30', '2014-01-31'),
(63, '25', 'IVYPC1569', 'RX JNR', 'BL-9326', 35, 'Drug', '5', 33.3333, 26.6667, 0, 4878, '', 0, '2015-05-31', '2014-01-31'),
(64, '10', 'IVYPC7387', 'IVY NORM RZ', 'DPD-128', 26.9, 'Food', '14.5', 23.4935, 18.7948, 0, 8275, '', 0, '2014-12-31', '0000-00-00'),
(65, '9', 'IVYPC1244', 'DIACURE KID', 'ADL-05-046', 62, 'Drug', '5', 59.0476, 47.2381, 0, 3970, '', 0, '2015-04-30', '0000-00-00'),
(66, '33', 'IVYPC3908', 'DECOSTA 30 TAB', '051390', 300, 'Drug', '5', 285.714, 228.571, 0, 2030, '', 0, '2015-04-30', '0000-00-00'),
(67, '22', 'IVYPC7258', 'I FRESH', 'IIF-005', 47, 'Drug', '5', 44.7619, 35.8095, 0, 3770, '', 0, '2015-05-31', '2014-02-05'),
(68, '41', 'IVYPC8655', 'I FRESH P/S', 'IIF-005', 0, 'Drug', '5', 0, 0, 0, 500, '', 0, '2015-05-31', '2014-02-05'),
(69, '15', 'IVYPC6585', 'ROZZ SUSP', 'ADFL-06-030', 80, 'Food', '14.5', 69.869, 55.8952, 0, 4008, '', 0, '2014-11-30', '2014-02-05'),
(70, '56', 'IVYPC6360', 'ROZZ SUSP P/S', 'ADFL-06-030', 0, 'Food', '14.5', 0, 0, 0, 990, '', 0, '2014-11-30', '2014-02-05'),
(71, '37', 'IVYPC3349', 'I LIVE SUSP', 'BL-9471', 65, 'Drug', '5', 61.9048, 49.5238, 0, 9282, '', 0, '2015-05-31', '0000-00-00'),
(72, '26', 'IVYPC4050', 'WNR 150', 'ADFL-07-042', 104.9, 'Food', '14.5', 91.6157, 73.2926, 0, 5106, '', 0, '2014-12-31', '0000-00-00'),
(73, '28', 'IVYPC7193', 'APIMAX 200ML', 'ADL-07-080', 75, 'Drug', '5', 71.4286, 57.1429, 0, 3995, '', 0, '2015-06-30', '2014-02-05'),
(74, '62', 'IVYPC1951', 'APIMAX 200ML P/S', 'ADL-07-083', 0, 'Drug', '5', 0, 0, 0, 1060, '', 0, '2015-06-30', '2014-02-05'),
(75, '10', 'IVYPC7387', 'IVY NORM RZ', 'DPD-214', 26.9, 'Food', '14.5', 23.4935, 18.7948, 0, 11225, '', 0, '2015-03-31', '0000-00-00'),
(76, '16', 'IVYPC9711', 'IVCEF KID', '130621', 54, 'Drug', '5', 51.4286, 41.1429, 0, 2776, '', 0, '2015-05-31', '0000-00-00'),
(77, '24', 'IVYPC2996', 'NEOREX JUNIOR', 'NJ-006', 43, 'Drug', '5', 40.9524, 32.7619, 0, 8784, '', 0, '2015-06-30', '2014-02-05'),
(78, '59', 'IVYPC9812', 'NEOREX JUNIOR P/S', 'NJ-006', 0, 'Drug', '5', 0, 0, 0, 1000, '', 0, '2015-06-30', '2014-02-05'),
(79, '18', 'IVYPC1037', 'DRS XT', 'ADC-07-048', 70, 'Drug', '5', 66.6667, 53.3333, 0, 3989, '', 0, '2015-06-30', '2014-02-05'),
(80, '58', 'IVYPC6297', 'DRS XT P/S', 'ADC-07-048', 0, 'Drug', '5', 0, 0, 0, 4000, '', 0, '2015-06-30', '2014-02-05'),
(81, '9', 'IVYPC1244', 'DIACURE KID', 'ADL-07-097', 62, 'Drug', '5', 59.0476, 47.2381, 0, 3031, '', 0, '2015-06-30', '2014-02-05'),
(82, '50', 'IVYPC2592', 'DIACURE KID P/S', 'ADL-07-097', 0, 'Drug', '5', 0, 0, 0, 4131, '', 0, '2015-06-30', '2014-02-05'),
(83, '17', 'IVYPC1730', 'PANIVO IV', 'DM4912G', 53.9, 'Drug', '5', 51.3333, 41.0667, 0, 2775, '', 0, '2014-08-31', '0000-00-00'),
(84, '25', 'IVYPC1569', 'RX JNR', 'ADL-09-153', 35, 'Drug', '5', 33.3333, 26.6667, 0, 5063, '', 0, '2015-08-31', '0000-00-00'),
(85, '12', 'IVYPC9765', 'DECOSTA 6 TAB', '101346', 49, 'Drug', '5', 46.6667, 37.3333, 0, 6900, '', 0, '2015-09-30', '0000-00-00'),
(86, '30', 'IVYPC8076', 'RXD', 'ADL-10-175', 53, 'Drug', '5', 50.4762, 40.381, 0, 2940, '', 0, '2015-09-30', '2014-02-05'),
(87, '65', 'IVYPC7583', 'RXD P/S', 'ADL-10-175', 0, 'Drug', '5', 0, 0, 0, 980, '', 0, '2015-09-30', '2014-02-05'),
(88, '11', 'IVYPC3659', 'PANIVO 40 TAB', 'ADT-10-710', 60, 'Drug', '5', 57.1429, 45.7143, 0, 5030, '', 0, '2015-09-30', '0000-00-00'),
(89, '32', 'IVYPC7330', 'IVCEF', '130622', 139.9, 'Drug', '5', 133.238, 106.59, 0, 2800, '', 0, '2015-05-31', '0000-00-00'),
(90, '34', 'IVYPC2495', 'IVPIME', 'DM-5637C', 280, 'Drug', '5', 266.667, 213.333, 0, 1048, '', 0, '2015-05-31', '0000-00-00'),
(91, '21', 'IVYPC8858', 'LEUMONT', '1213139', 60, 'Drug', '5', 57.1429, 45.7143, 0, 2980, '', 0, '2015-11-30', '0000-00-00'),
(92, '35', 'IVYPC4804', 'GIVMOX TAB', '692', 190, 'Drug', '5', 180.952, 144.762, 0, 2000, '', 0, '2015-06-30', '0000-00-00'),
(93, '25', 'IVYPC1569', 'RX JNR', 'ADL-01-261', 35, 'Drug', '5', 33.3333, 26.6667, 0, 4410, '', 0, '2015-12-31', '0000-00-00'),
(94, '36', 'IVYPC1780', 'GIVMOX KID', '750', 56, 'Drug', '5', 53.3333, 42.6667, 0, 992, '', 0, '2015-06-30', '0000-00-00'),
(95, '18', 'IVYPC1037', 'DRS XT', 'C0114112', 75, 'Drug', '5', 71.4286, 57.1429, 0, 1280, '', 0, '2015-12-31', '0000-00-00'),
(96, '12', 'IVYPC9765', 'DECOSTA 6 TAB', '011455', 49, 'Drug', '5', 46.6667, 37.3333, 0, 1450, '', 0, '2015-12-31', '0000-00-00'),
(97, '6', 'IVYPC1956', 'WNR IV', 'AM-3554A', 22.9, 'Drug', '5', 21.8095, 17.4476, 0, 5000, '', 0, '2015-06-30', '0000-00-00'),
(98, '26', 'IVYPC4050', 'WNR 150', 'ADFL-085', 88, 'Food', '14.5', 76.8559, 61.4847, 0, 180, '', 0, '2014-05-31', '2014-02-14');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
