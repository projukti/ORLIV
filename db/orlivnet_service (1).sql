-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2016 at 08:37 AM
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
-- Table structure for table `accounts_details`
--

CREATE TABLE IF NOT EXISTS `accounts_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `act_name` varchar(255) NOT NULL,
  `act_code` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `area` varchar(250) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `user_ip` varchar(250) NOT NULL,
  `last_login_date` varchar(250) NOT NULL,
  `add_prove` varchar(250) NOT NULL,
  `voter_id` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `accounts_details`
--

INSERT INTO `accounts_details` (`id`, `act_name`, `act_code`, `address`, `blood_group`, `contact`, `photo`, `area`, `salary`, `username`, `password`, `user_ip`, `last_login_date`, `add_prove`, `voter_id`) VALUES
(1, 'Biswajit Mozumder', 'ACC-8730', 'East Tentulberia, Madhyapara, Panchpota, Garia, Kolkata - 700152', 'B+', '9804377757/ 9830155597', '9533Biswajit_Mozumder(B+), Emp. code-OPS-7828,Emergency Contact -(0)9163632930.jpg', 'Garia, Kolkata', '12000.00', 'biswajit_acc', 'bisu123', 'host_bb.wishnetkolkata.com', '03/03/2015 07:26:56 am', '6060', '1036');

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
(2, 'admin', '123', 'Projukti05-PC', '28/12/2015 10:19:27 am');

-- --------------------------------------------------------

--
-- Table structure for table `audit_asset_type`
--

CREATE TABLE IF NOT EXISTS `audit_asset_type` (
  `asset_id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_name` varchar(255) NOT NULL,
  `asset_prefix` varchar(100) NOT NULL,
  `asset_description` longtext NOT NULL,
  PRIMARY KEY (`asset_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `audit_asset_type`
--

INSERT INTO `audit_asset_type` (`asset_id`, `asset_name`, `asset_prefix`, `asset_description`) VALUES
(1, 'Chair', 'CH', ''),
(2, 'Table', 'TB', '');

-- --------------------------------------------------------

--
-- Table structure for table `audit_branch`
--

CREATE TABLE IF NOT EXISTS `audit_branch` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_code` varchar(100) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `branch_address` longtext NOT NULL,
  `branch_ph` bigint(20) NOT NULL,
  `branch_email` varchar(255) NOT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `audit_branch`
--

INSERT INTO `audit_branch` (`branch_id`, `branch_code`, `branch_name`, `branch_address`, `branch_ph`, `branch_email`) VALUES
(1, 'AB01', 'gd', 'gdgg', 7878676775, 'd@g.com'),
(2, 'BC01', 'GTG', 'ADDRESS', 78786767757, 'd@g.com'),
(3, 'CD01', 'A', 'gfg', 545, 'k@gfg.com');

-- --------------------------------------------------------

--
-- Table structure for table `audit_physical_stock`
--

CREATE TABLE IF NOT EXISTS `audit_physical_stock` (
  `ph_stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `audt_code` varchar(100) NOT NULL,
  `asset_id` int(11) NOT NULL,
  `asset_type` varchar(255) NOT NULL,
  `asset_description` varchar(255) NOT NULL,
  `gl_description` varchar(255) NOT NULL,
  `classification` varchar(255) NOT NULL,
  `ph_stock_qunatity` bigint(20) NOT NULL,
  `extra_stock_quantity` bigint(20) NOT NULL,
  `old_ph_stock_qunatity` bigint(20) NOT NULL,
  `notification_date` date NOT NULL,
  `approved` text NOT NULL,
  PRIMARY KEY (`ph_stock_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `audit_physical_stock`
--

INSERT INTO `audit_physical_stock` (`ph_stock_id`, `audt_code`, `asset_id`, `asset_type`, `asset_description`, `gl_description`, `classification`, `ph_stock_qunatity`, `extra_stock_quantity`, `old_ph_stock_qunatity`, `notification_date`, `approved`) VALUES
(1, '91691', 0, '', 'INTERIORS CALCUTTA', '', 'Owned', 5, 0, 0, '0000-00-00', ''),
(2, '78527', 0, 'INTERIOR', 'INTERIORS CALCUTTA', 'Improvements to Leasehold Property', 'Owned', 5, 0, 0, '0000-00-00', ''),
(3, '11167', 0, 'INTERIOR', 'INTERIORS CALCUTTA', 'Improvements to Leasehold Property', 'Owned', 5, 0, 0, '0000-00-00', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `audit_physical_stock_details`
--

INSERT INTO `audit_physical_stock_details` (`id`, `audt_code`, `ph_stock_id`, `asset_id`, `asset_barcode`, `barcode_details`, `verify`, `is_audit`) VALUES
(1, '91691', 1, 0, 'LOC043916910', '-LOC043-91691-0', '', ''),
(2, '78527', 2, 0, 'INLOC043785270', 'IN-LOC043-78527-0', '', ''),
(3, '11167', 3, 0, 'INLOC043111670', 'IN-LOC043-11167-0', '', ''),
(4, '11167', 3, 0, 'INLOC043111671', 'IN-LOC043-11167-1', '', ''),
(5, '11167', 3, 0, 'INLOC043111672', 'IN-LOC043-11167-2', '', ''),
(6, '11167', 3, 0, 'INLOC043111673', 'IN-LOC043-11167-3', '', ''),
(7, '11167', 3, 0, 'INLOC043111674', 'IN-LOC043-11167-4', '', '');

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
  `entry_date` date NOT NULL,
  `audit_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `audit_physical_stock_info`
--

INSERT INTO `audit_physical_stock_info` (`id`, `audt_code`, `audt_id`, `branch_id`, `branch_code`, `entry_date`, `audit_date`) VALUES
(1, '47806', 0, 0, 'LOC043', '2016-01-05', '2016-01-05'),
(2, '002', 1, 1, '', '2016-01-05', '2015-02-05'),
(3, '91691', 0, 0, 'LOC043', '2016-01-05', '2016-01-05'),
(4, '78527', 0, 0, 'LOC043', '2016-01-05', '2016-01-05'),
(5, '11167', 0, 0, 'LOC043', '2016-01-05', '2016-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `audit_stock_auditor`
--

CREATE TABLE IF NOT EXISTS `audit_stock_auditor` (
  `audt_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) NOT NULL,
  `audt_name` varchar(255) NOT NULL,
  `audt_address` longtext NOT NULL,
  `audt_ph` int(11) NOT NULL,
  `audt_email` varchar(255) NOT NULL,
  `audt_photo` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `last_login_date` varchar(100) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`audt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `audit_stock_auditor`
--

INSERT INTO `audit_stock_auditor` (`audt_id`, `branch_id`, `audt_name`, `audt_address`, `audt_ph`, `audt_email`, `audt_photo`, `username`, `password`, `last_login_date`, `user_ip`, `active`) VALUES
(1, 1, 'ABC', 'gd', 75757, 'g', '34927978384ceb4.jpg', 'abc', '123', '03/01/2016 08:19:56 pm', 'DESKTOP-M990L3G', 1);

-- --------------------------------------------------------

--
-- Table structure for table `convence_oper`
--

CREATE TABLE IF NOT EXISTS `convence_oper` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `on_date` date NOT NULL,
  `boq_quot_no` varchar(250) NOT NULL,
  `mkt_code` varchar(250) NOT NULL,
  `oper_code` varchar(250) NOT NULL,
  `oper_name` varchar(250) NOT NULL,
  `refund` varchar(250) NOT NULL,
  `amount` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE IF NOT EXISTS `customer_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) NOT NULL,
  `job_type` longtext NOT NULL,
  `location` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `assigned` varchar(255) NOT NULL,
  `cust_code` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`id`, `customer_name`, `job_type`, `location`, `address`, `contact_person`, `contact`, `assigned`, `cust_code`, `status`) VALUES
(1, 'ICICI Prudencial Life Insurance Company Ltd.', 'CCTV Installation, Maping & Maintenance,Data &Voice Network Installation. ,Data &Voice Network Maintenance ,Electrical Job Work.,Fire Alarm Installation Maintenance,Online Power Solution (UPS) Support', 'Kolkata, WB, Jharkhand, Bihar, Odissa, North East', '145 Rash Behari Avenue, 2nd. floor, Kolkata - 29', 'Mr. Rajeeb Mukherjee / Vikesh Sharma', '9230513500 / 9051604222', 'MKT-4632', 'CUST-2867', 0),
(2, 'Birla Sun Life Insurance Company Ltd.', 'Carpentry Job Work.,CCTV Installation, Maping & Maintenance,Conference room solution,Data &Voice Network Installation. ,Data &Voice Network Maintenance ,Electrical Job Work.,IT Consultancy,Miscellaneous Sales. ,Miscellaneous Service,Online Power Solution (UPS) Support,Set up office Infrastructure.', 'Kolkata', '39 A, Harish Mukherjee Road, Mullik Guest House, 1st. floor, Kolkata - 25', 'Mr. Debopriya Ojha / Chandrima Bhattacharya', '9831026228 / 8820470143', 'MKT-4632', 'CUST-9199', 0),
(3, 'Reliance Capital Asset Management Ltd.', 'Carpentry Job Work.,CCTV Installation, Maping & Maintenance,Computer Hardware Service	,Conference room solution,Data &Voice Network Installation. ,Data &Voice Network Maintenance ,Electrical Job Work.,Fire Alarm Installation Maintenance,Miscellaneous Sales. ,Miscellaneous Service,Online Power Solution (UPS) Support,Set up office Infrastructure.', 'West Bengal, Bihar, Odissa, North East', 'One India Bulls Centre - Tower one 12th. floor, Jupiter Mills Compound.Mumbai - 400013', 'Mr. Uttam Batabyal', '+919330014906/ +919874238383', 'MKT-4632', 'CUST-5273', 0),
(4, 'Futute Generali India Insurance Co. Ltd.', 'Carpentry Job Work.,CCTV Installation, Maping & Maintenance,Computer Hardware Sales.	,Conference room solution,Data &Voice Network Installation. ,Data &Voice Network Maintenance ,Electrical Job Work.,Fire Alarm Installation Maintenance,Miscellaneous Sales. ,Miscellaneous Service,Online Power Solution (UPS) Support,Set up office Infrastructure.', 'West Bengal, Bihar, Odissa, North East', 'Lodha - I Think, Techno Campus, A Wing, Pokhran Road No.2, Off Eastern Express Hihgway, Behind TCS, Thane West. Mumbai - 400607.', 'Mr. Abhijit Biswas/ Mr. Tanmoy', '+919007002951/ +918335826688', 'MKT-4632', 'CUST-2871', 0),
(5, 'Future Generali Life Insurance Co. Ltd.', 'Carpentry Job Work.,CCTV Installation, Maping & Maintenance,Computer Hardware Sales.	,Conference room solution,Data &Voice Network Installation. ,Data &Voice Network Maintenance ,Electrical Job Work.,Fire Alarm Installation Maintenance,Miscellaneous Sales. ,Miscellaneous Service,Online Power Solution (UPS) Support,Set up office Infrastructure.', 'West Bengal, Bihar, odissa, North East', 'Lodha - I Think, Techno Campus, A Wing, Pokhran Road No. 2, Off Eastern Express Highway, Behind TCS, Thane West, Mumbai - 400607.', 'Mr. Abhijit Biswas/ Mr. Tanmoy', '+919007002951/ +918335826688', 'MKT-4632', 'CUST-8257', 0),
(6, 'Janalakshmi financial Service Pvt. Ltd.', 'Carpentry Job Work.,CCTV Installation, Maping & Maintenance,Computer Hardware Service	,Data &Voice Network Installation. ,Data &Voice Network Maintenance ,Electrical Job Work.,Miscellaneous Sales. ,Miscellaneous Service,Online Power Solution (UPS) Support,Set up office Infrastructure.', 'West Bengal, Bihar, Odissa, North East', '34, J. P. Pearl Building, Andree Road, Shantinagar, Bangalore - 560027.', 'Mr. Saurav Banerjee.', '+918334923444', 'MKT-4632', 'CUST-9717', 0),
(7, 'Debanjan Sinha', 'Carpentry Job Work.,Conference room solution', 'Garia', 'P 24 Green view Garia', 'Debu', '9775370208', 'MKT-4632', 'CUST-4402', 0),
(8, 'A A Print & Supply.', 'Computer Hardware Sales.	,Computer Hardware Service	,Data &Voice Network Installation. ,Data &Voice Network Maintenance ,Electrical Job Work.,Fire Alarm Installation Maintenance', 'Bengal, Bihar, Odissa, North East', 'Garia Garden, Kolkata', 'Debasish Dutta', '+919903514562', 'MKT-4632', 'CUST-4188', 0),
(9, 'ORLIV', 'Miscellaneous Sales. ,Miscellaneous Service', 'Kolkata', '981, Beltala, Fartabad, Garia, Kolkata - 700084', 'Aniruddha Chattopadhyay', '+919804245112', 'MKT-4632', 'CUST-8361', 0),
(10, 'ORLIV', 'Miscellaneous Sales. ,Miscellaneous Service', 'Kolkata', '981, Beltala, Fartabad, Garia, Kolkata - 700084', 'Aniruddha Chattopadhyay', '+919804245112', 'MKT-4632', 'CUST-5631', 0),
(11, '', '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `drive`
--

CREATE TABLE IF NOT EXISTS `drive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `upload_file` varchar(255) NOT NULL,
  `marketing` int(11) NOT NULL,
  `operation` int(11) NOT NULL,
  `purchase` int(11) NOT NULL,
  `accounts` int(11) NOT NULL,
  `post` varchar(250) NOT NULL,
  `holder` varchar(255) NOT NULL,
  `holder_id` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_name`
--

CREATE TABLE IF NOT EXISTS `invoice_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quot_name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `job_info`
--

CREATE TABLE IF NOT EXISTS `job_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visited_date` date NOT NULL,
  `cust_name` varchar(250) NOT NULL,
  `cust_code` varchar(250) NOT NULL,
  `visited_by` varchar(250) NOT NULL,
  `job_type` varchar(250) NOT NULL,
  `next_date` date NOT NULL,
  `boq_quot` varchar(250) NOT NULL,
  `boq_quot_no` varchar(250) NOT NULL,
  `order_date` date NOT NULL,
  `order_no` varchar(250) NOT NULL,
  `bill_no` varchar(250) NOT NULL,
  `po_no` varchar(250) NOT NULL,
  `location` varchar(250) NOT NULL,
  `consult_operating_person` varchar(250) NOT NULL,
  `operating_person_code` varchar(250) NOT NULL,
  `project_up` varchar(250) NOT NULL,
  `cost` varchar(250) NOT NULL,
  `completion_date` date NOT NULL,
  `approve_status` int(11) NOT NULL,
  `completion_report` varchar(250) NOT NULL,
  `post` varchar(250) NOT NULL,
  `post_holder` varchar(250) NOT NULL,
  `holder_code` varchar(250) NOT NULL,
  `accept_status` int(11) NOT NULL,
  `ok_complete` int(11) NOT NULL,
  `material_costing` varchar(250) NOT NULL,
  `submitted` int(11) NOT NULL,
  `pay_deliver` int(11) NOT NULL,
  `project_details` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `job_info`
--

INSERT INTO `job_info` (`id`, `visited_date`, `cust_name`, `cust_code`, `visited_by`, `job_type`, `next_date`, `boq_quot`, `boq_quot_no`, `order_date`, `order_no`, `bill_no`, `po_no`, `location`, `consult_operating_person`, `operating_person_code`, `project_up`, `cost`, `completion_date`, `approve_status`, `completion_report`, `post`, `post_holder`, `holder_code`, `accept_status`, `ok_complete`, `material_costing`, `submitted`, `pay_deliver`, `project_details`) VALUES
(1, '2015-02-24', 'Futute Generali India Insurance Co. Ltd.', 'CUST-2871', 'Aniruddha Chattopadhyay', 'Data &Voice Network Installation. ', '2015-03-03', 'no', 'NIL', '2015-02-12', '', '3000', 'FGILIC/2014-15/LIO554', 'Dhanbad', 'Sk. Hasibul Haque', 'OPS-8949', '3352order_letter_dhanbad.pdf', '4000.00', '2015-03-04', 1, '1907', 'Marketing', 'Aniruddha Chattopadhyay', 'MKT-4632', 1, 0, '', 0, 0, '5 no. new connections need to draw for new Br. location at Dhanbad'),
(2, '2015-02-26', 'ICICI Prudencial Life Insurance Company Ltd.', 'CUST-2867', 'Aniruddha Chattopadhyay', 'Miscellaneous Service', '2015-02-04', 'no', 'NIL', '0000-00-00', 'NIL', '3001', 'NIL', 'Kolkata', 'Sk. Hasibul Haque', 'OPS-8949', '6063', '100', '2015-02-04', 1, '', 'Marketing', 'Aniruddha Chattopadhyay', 'MKT-4632', 1, 0, '', 0, 0, '3 nos. of repaired projectors are already in  stock.'),
(4, '2015-03-06', 'A A Print & Supply.', 'CUST-4188', 'Aniruddha Chattopadhyay', 'Data &Voice Network Installation. ', '2015-03-16', 'no', 'NIL', '0000-00-00', 'NIL', '3003', 'NIL', 'Baharampur(WB)', 'Sk. Hasibul Haque', 'OPS-8949', '6216', 'Rs.20,000.00', '2015-04-01', 1, '', 'Marketing', 'Aniruddha Chattopadhyay', 'MKT-4632', 1, 0, '', 0, 0, 'Data & Voice connection along with Ecectrical wiring for new Br. location of HDFC Life at Baharampur(WB), need to install. Site area approx 1000 sq. ft.'),
(5, '2015-03-06', 'Birla Sun Life Insurance Company Ltd.', 'CUST-9199', 'Aniruddha Chattopadhyay', 'Carpentry Job Work.', '2015-03-13', 'no', 'NIL', '0000-00-00', 'NIL', '3004', 'NIL', 'North East (different locations)', 'Sk. Hasibul Haque', 'OPS-8949', '7744', 'Rs. 150,000.00', '2015-04-10', 1, '', 'Marketing', 'Aniruddha Chattopadhyay', 'MKT-4632', 1, 0, '', 0, 0, 'Making of cash counter');

-- --------------------------------------------------------

--
-- Table structure for table `job_to_vendor`
--

CREATE TABLE IF NOT EXISTS `job_to_vendor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(250) NOT NULL,
  `vendor_code` varchar(250) NOT NULL,
  `job_type` varchar(250) NOT NULL,
  `boq_quot_no` varchar(250) NOT NULL,
  `order_date` date NOT NULL,
  `po_no` varchar(250) NOT NULL,
  `consult_operating_person` varchar(250) NOT NULL,
  `operating_person_code` varchar(250) NOT NULL,
  `project_up` varchar(250) NOT NULL,
  `cost` varchar(250) NOT NULL,
  `completion_date` date NOT NULL,
  `completion_report` varchar(250) NOT NULL,
  `post` varchar(250) NOT NULL,
  `post_holder` varchar(250) NOT NULL,
  `holder_code` varchar(250) NOT NULL,
  `approve_status` int(11) NOT NULL,
  `project_details` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `job_type`
--

CREATE TABLE IF NOT EXISTS `job_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `job_type`
--

INSERT INTO `job_type` (`id`, `job`) VALUES
(6, 'Computer Hardware Sales.	'),
(7, 'Computer Hardware Service	'),
(8, 'Carpentry Job Work.'),
(9, 'Electrical Job Work.'),
(10, 'CCTV Installation, Maping & Maintenance'),
(11, 'Fire Alarm Installation Maintenance'),
(12, 'Conference room solution'),
(13, 'IT Consultancy'),
(14, 'Online Power Solution (UPS) Support'),
(15, 'Data &Voice Network Installation. '),
(16, 'Data &Voice Network Maintenance '),
(17, 'Set up office Infrastructure.'),
(18, 'Miscellaneous Sales. '),
(19, 'Miscellaneous Service');

-- --------------------------------------------------------

--
-- Table structure for table `location_name`
--

CREATE TABLE IF NOT EXISTS `location_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `location_name`
--

INSERT INTO `location_name` (`id`, `location`) VALUES
(1, 'Kolkata'),
(3, 'Dhanbad'),
(7, 'Baharampur(WB)'),
(9, 'North East (different locations)');

-- --------------------------------------------------------

--
-- Table structure for table `marketing_details`
--

CREATE TABLE IF NOT EXISTS `marketing_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mkt_name` varchar(255) NOT NULL,
  `mkt_code` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `email` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `user_ip` varchar(250) NOT NULL,
  `last_login_date` varchar(250) NOT NULL,
  `add_prove` varchar(250) NOT NULL,
  `voter_id` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `marketing_details`
--

INSERT INTO `marketing_details` (`id`, `mkt_name`, `mkt_code`, `address`, `blood_group`, `contact`, `photo`, `area`, `salary`, `email`, `username`, `password`, `user_ip`, `last_login_date`, `add_prove`, `voter_id`) VALUES
(1, 'Aniruddha Chattopadhyay', 'MKT-4632', 'Beltala, Fartabad, Garia, Kolkata -700084', 'A+', '+919804245112', '4987pix_aniruddha.jpg', 'Garia, Kolkata', 'Rs. 35000.00', 'aniruddha@orliv.net', 'aniruddha', 'ani123', 'host_bb.wishnetkolkata.com', '11/04/2015 05:58:26 am', '2705voter_icard.jpg', '8551');

-- --------------------------------------------------------

--
-- Table structure for table `material_costing`
--

CREATE TABLE IF NOT EXISTS `material_costing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `on_date` date NOT NULL,
  `amount` varchar(250) NOT NULL,
  `material` varchar(250) NOT NULL,
  `pur_name` varchar(250) NOT NULL,
  `pur_code` varchar(250) NOT NULL,
  `refund` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `material_details`
--

CREATE TABLE IF NOT EXISTS `material_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `material_name` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `material_purchase`
--

CREATE TABLE IF NOT EXISTS `material_purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `material_name` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `qty` varchar(250) NOT NULL,
  `purchase_date` date NOT NULL,
  `price` varchar(250) NOT NULL,
  `pur_name` varchar(250) NOT NULL,
  `pur_code` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `material_request`
--

CREATE TABLE IF NOT EXISTS `material_request` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `material_name` longtext NOT NULL,
  `qty` varchar(250) NOT NULL,
  `type` longtext NOT NULL,
  `boq_quot_no` varchar(250) NOT NULL,
  `mkt_code` varchar(250) NOT NULL,
  `oper_name` varchar(200) NOT NULL,
  `oper_code` varchar(250) NOT NULL,
  `present_date` date NOT NULL,
  `accept` int(11) NOT NULL,
  `delivered` int(11) NOT NULL,
  `refund` varchar(250) NOT NULL,
  `ok` int(11) NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `material_stock`
--

CREATE TABLE IF NOT EXISTS `material_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `material_name` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `qty` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `miscellaneous`
--

CREATE TABLE IF NOT EXISTS `miscellaneous` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `boq_quot_no` varchar(250) NOT NULL,
  `on_date` date NOT NULL,
  `amount` varchar(250) NOT NULL,
  `remarks` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `operation_details`
--

CREATE TABLE IF NOT EXISTS `operation_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `per_name` varchar(255) NOT NULL,
  `per_code` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `email` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `user_ip` varchar(250) NOT NULL,
  `last_login_date` varchar(250) NOT NULL,
  `add_prove` varchar(250) NOT NULL,
  `voter_id` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `operation_details`
--

INSERT INTO `operation_details` (`id`, `per_name`, `per_code`, `address`, `blood_group`, `contact`, `photo`, `area`, `salary`, `email`, `username`, `password`, `user_ip`, `last_login_date`, `add_prove`, `voter_id`) VALUES
(1, 'Sk. Hasibul Haque', 'OPS-8949', 'Astna Road, Ward No. - 10, Basirhat,  24 Pgs(N), PIN - 743411', 'A+', '9804194475/ 9563142066', '9825Sk._Hasibul_Haque(A+),Emp. code-AL001 Emergency Contact -(0)9563142066.jpg', 'Garia, Kolkata', 'Rs.19500.00', 'hasibul@orliv.net', 'hasib', 'raju123', 'host_bb.wishnetkolkata.com', '12/03/2015 01:43:09 am', '1319', '4917'),
(2, 'Biswajit Mozumder', 'OPS-7828', 'East Tentulberia, Madhyapara, Panchpota, Garia, Kolkata - 700152', 'B+', '9804377757/ 9830155597', '8982Biswajit_Mozumder(B+), Emp. code-PE001,Emergency Contact -(0)9163632930.jpg', 'Garia, Kolkata', '12000.00', 'biswajit@orliv.net', 'biswajit', '123', 'host_bb.wishnetkolkata.com', '06/08/2014 02:57:46 am', '1924', '3553'),
(3, 'Srimonta Mondal', 'OPS-4925', 'C/O - Late Ram Chandra Mondal, Vill+ Po.-Shaktipur,Dist-Murshidabad,PIN-742163', 'B+', '9609060921/9378444123', '4471Srimonta_Mondal (B+), Emp. code - CL001,Emergency Contact - (0)9378444123.jpg', 'Dumdum, Kolkata', '8,500.00', 'sromonta@orliv.net', 'srimonta', '123', '59.162.185.222.static.vsnl.net.in', '27/06/2014 06:28:50 am', '2325', '3592'),
(4, 'Sk. Hasibul Haque', 'OPS-6012', 'Astna Road, Ward No. - 10, Basirhat,  24 Pgs(N), PIN - 743411', 'A+', '9804194475/ 9563142066', '2372Sk._Hasibul_Haque(A+),Emp. code-OPS-8949 Emergency Contact -(0)9563142066.jpg', 'Garia, Kolkata', '19500.00', 'hasibul@orliv.net', 'hasib_pur', '123', 'host_bb.wishnetkolkata.com', '03/03/2015 07:47:29 am', '4540', '3434'),
(5, 'Aniruddha Chattopadhyay', 'OPS-6192', 'Beltala,Fartabad,Garia,Kolkata-700084', 'A+', '9804245112/ 9830320875', '8686Aniruddha_Chattopadhyay(A+), Emp. code-MKT-4632,Emergency Contact - (0)7278487207.jpg', 'Garia, Kolkata', '35000', 'aniruddha@orliv.net', 'aniruddha_ops', '123', '115.115.136.26.static-kolkata.tcl.net.in', '04/06/2014 08:49:52 am', '8696aniruddha_icard.doc', '5379');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

CREATE TABLE IF NOT EXISTS `purchase_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pur_name` varchar(255) NOT NULL,
  `pur_code` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `user_ip` varchar(250) NOT NULL,
  `last_login_date` varchar(250) NOT NULL,
  `add_prove` varchar(250) NOT NULL,
  `voter_id` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `purchase_details`
--

INSERT INTO `purchase_details` (`id`, `pur_name`, `pur_code`, `address`, `blood_group`, `contact`, `photo`, `area`, `salary`, `username`, `password`, `user_ip`, `last_login_date`, `add_prove`, `voter_id`) VALUES
(1, 'Sk. Hasibul Haque', 'PUR-3901', 'Astna Road, Ward No. - 10, Basirhat,  24 Pgs(N), PIN - 743411', 'A+', '9804194475/ 9563142066', '8894Sk._Hasibul_Haque(A+),Emp. code-OPS-8949 Emergency Contact -(0)9563142066.jpg', 'Garia, Kolkata', '19000.00', 'hasib_pur', '123', 'host_bb.wishnetkolkata.com', '03/03/2015 07:45:07 am', '9637', '3028');

-- --------------------------------------------------------

--
-- Table structure for table `stock_out`
--

CREATE TABLE IF NOT EXISTS `stock_out` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `material_name` longtext NOT NULL,
  `qty` varchar(250) NOT NULL,
  `type` longtext NOT NULL,
  `boq_quot_no` varchar(250) NOT NULL,
  `mkt_code` varchar(250) NOT NULL,
  `oper_code` varchar(250) NOT NULL,
  `on_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `superauditor_details`
--

CREATE TABLE IF NOT EXISTS `superauditor_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `superauditor_name` varchar(255) NOT NULL,
  `superauditor_code` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `email` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `user_ip` varchar(250) NOT NULL,
  `last_login_date` varchar(250) NOT NULL,
  `add_prove` varchar(250) NOT NULL,
  `voter_id` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `superauditor_details`
--

INSERT INTO `superauditor_details` (`id`, `superauditor_name`, `superauditor_code`, `address`, `blood_group`, `contact`, `photo`, `area`, `salary`, `email`, `username`, `password`, `user_ip`, `last_login_date`, `add_prove`, `voter_id`) VALUES
(1, 'test', 'SAUDT-4632', 'test', 'A+', '+911234567890', '93199462generic_avatar.jpg', 'Garia, Kolkata', 'Rs. 35000.00', 'abc@orliv.net', 'admin', '123', 'DESKTOP-M990L3G', '03/01/2016 08:14:39 pm', '2878abc.jpg', '9198voter-id-b-18-5-2012.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `technician_assign`
--

CREATE TABLE IF NOT EXISTS `technician_assign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `boq_quot_no` varchar(250) NOT NULL,
  `completion_date` date NOT NULL,
  `area` varchar(250) NOT NULL,
  `tech_code` longtext NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `technician_details`
--

CREATE TABLE IF NOT EXISTS `technician_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tech_name` varchar(255) NOT NULL,
  `tech_code` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `add_prove` varchar(250) NOT NULL,
  `voter_id` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `technician_details`
--

INSERT INTO `technician_details` (`id`, `tech_name`, `tech_code`, `address`, `blood_group`, `contact`, `photo`, `area`, `salary`, `add_prove`, `voter_id`) VALUES
(2, 'Sk. Hasibul Haque', 'TECH-5774', 'Astana Road, Saipala, Basirhat, North Pgs. PIN - 743411', 'A+', '9804194475/ 9563142066', '3118Sk._Hasibul_Haque(A+),Emp. code-OPS-8949 Emergency Contact -(0)9563142066.jpg', 'Garia', '', '6528', '7893'),
(3, 'Biswajit Mozumder', 'TECH-9453', '52/A Babubagan Lane.\r\nKolkata - 700029', 'B+', '9804377757/ 9830155597', '7930Biswajit_Mozumder(B+), Emp. code-OPS-7828,Emergency Contact -(0)9163632930.jpg', 'Dhakuria, Kolkata', '', '2875', '1719'),
(5, 'Soumitra Dhori ', 'TECH-7996', 'Ekbalpur, Dingal, kamargeriya, West Mednapore, W.B, 721232', 'B+', '8001700304', '3420IMG_20140623_140031993.jpg', 'Garia, Kolkata', '', '6853', '9096'),
(6, 'Rabindra Nath Santra', 'TECH-1995', 'Sitapur(U,PU.O.U.P.PARA,Kalipalaparyant), Daspur, Midnapur(W) 721170 ', 'A+', '9679154664', '3890IMG_20140623_231712 (1).jpg', 'Garia, Kolkata', '', '6967', '5114'),
(7, 'Sital Roy', 'TECH-3213', 'Ekbalpur, Dingil Kamargeriya, Midnapur(W), W.B, 721232 ', 'O --', '7685052605 ', '7049IMG_20140623_135951076.jpg', 'Garia, Kolkata', '', '9263', '2758');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_details`
--

CREATE TABLE IF NOT EXISTS `vendor_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(250) NOT NULL,
  `vendor_code` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `contact` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vendor_details`
--

INSERT INTO `vendor_details` (`id`, `vendor_name`, `vendor_code`, `address`, `contact`) VALUES
(1, 'Samir (Printer & Projector Repairing)', 'VEN-5080', 'C/O - \r\nPolice Sector -Nodakhali.\r\nBawali,Budgebudge, 24 Pgs(s)', '7687885635'),
(2, 'Debasish Dey( Ch. Level - Level - iV)', 'VEN-8696', 'B 58 Ganganagar, Po. - Jadavpur, Kolkata - 700099', '9748644623');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
