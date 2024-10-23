-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 22, 2024 at 05:56 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `php_textilemgmt`
--
CREATE DATABASE IF NOT EXISTS `php_textilemgmt` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `php_textilemgmt`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `userid` varchar(100) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userid`, `pwd`) VALUES
('rktex', 'kannan');

-- --------------------------------------------------------

--
-- Table structure for table `cloth`
--

CREATE TABLE IF NOT EXISTS `cloth` (
  `clothname` varchar(200) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`clothname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cloth`
--

INSERT INTO `cloth` (`clothname`, `stock`) VALUES
('Churidhar', 50),
('Coat', 5),
('Suit', 4),
('T-Shirt', 125);

-- --------------------------------------------------------

--
-- Table structure for table `clothstock`
--

CREATE TABLE IF NOT EXISTS `clothstock` (
  `clothname` varchar(200) NOT NULL,
  `lowstock` int(11) NOT NULL,
  `highstock` int(11) NOT NULL,
  PRIMARY KEY (`clothname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clothstock`
--

INSERT INTO `clothstock` (`clothname`, `lowstock`, `highstock`) VALUES
('Churidhar', 50, 100),
('Coat', 2, 8),
('Suit', 2, 4),
('T-Shirt', 50, 100);

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE IF NOT EXISTS `emp` (
  `empno` int(11) NOT NULL,
  `ename` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `addr` varchar(200) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `basic` int(11) NOT NULL,
  PRIMARY KEY (`empno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`empno`, `ename`, `gender`, `addr`, `mobile`, `basic`) VALUES
(1000, 'Ram', 'Male', '94,South Car Street,\r\nKK Nagar,\r\nMadurai', '9823498329', 750),
(1001, 'Samuel,', 'Male', '343,Church Road,\r\nMadurai', '9328932849', 700);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dt` date NOT NULL,
  `purid` int(11) NOT NULL,
  `pymtmode` varchar(20) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `chqno` varchar(20) NOT NULL,
  `amt` float NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `dt`, `purid`, `pymtmode`, `bank`, `chqno`, `amt`) VALUES
(1, '2024-02-09', 2, 'Cash', '', '', 5000),
(2, '2024-02-09', 2, 'Cheque', 'Sbi', '125222', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE IF NOT EXISTS `purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dt` date NOT NULL,
  `clothname` varchar(200) NOT NULL,
  `supplier` varchar(200) NOT NULL,
  `qty` int(11) NOT NULL,
  `billamt` float NOT NULL,
  `paidamt` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `dt`, `clothname`, `supplier`, `qty`, `billamt`, `paidamt`) VALUES
(2, '2024-01-30', 'T-Shirt', 'Ram Textiles', 250, 50000, 30000),
(3, '2024-01-30', 'Churidhar', 'Sundar Textiles', 100, 35000, 0),
(4, '2024-01-24', 'Coat', 'Ram Textiles', 20, 30000, 0),
(5, '2024-02-24', 'Suit', 'Sundar Textiles', 10, 20000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE IF NOT EXISTS `receipt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dt` date NOT NULL,
  `sid` int(11) NOT NULL,
  `pymtmode` varchar(20) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `chqno` varchar(20) NOT NULL,
  `amt` float NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`id`, `dt`, `sid`, `pymtmode`, `bank`, `chqno`, `amt`) VALUES
(1, '2024-02-20', 3, 'Cash', '', '', 5000),
(2, '2024-02-22', 3, 'Cheque', 'Sbi', '242333', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE IF NOT EXISTS `salary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empno` int(11) NOT NULL,
  `month` varchar(50) NOT NULL,
  `present` int(11) NOT NULL,
  `da` float NOT NULL,
  `hra` float NOT NULL,
  `pf` float NOT NULL,
  `net` float NOT NULL,
  PRIMARY KEY (`empno`,`month`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `empno`, `month`, `present`, `da`, `hra`, `pf`, `net`) VALUES
(9, 1000, 'Jan-2024', 31, 17437.5, 8137.5, 1627.5, 47198),
(10, 1001, 'Jan-2024', 30, 15750, 7350, 1470, 42630);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dt` date NOT NULL,
  `clothname` varchar(200) NOT NULL,
  `customer` varchar(500) NOT NULL,
  `qty` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `billamt` int(11) NOT NULL,
  `receipt` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `dt`, `clothname`, `customer`, `qty`, `rate`, `billamt`, `receipt`) VALUES
(3, '2024-01-01', 'Churidhar', 'Ram Tex', 10, 1500, 15000, 10000),
(4, '2024-01-10', 'Coat', 'Ram Tex', 5, 2000, 10000, 0),
(5, '2024-01-17', 'Suit', 'Hanifa Textiles', 2, 3000, 6000, 0),
(6, '2024-01-24', 'T-Shirt', 'Hanifa Textiles', 100, 1000, 100000, 0),
(7, '2024-02-24', 'Churidhar', 'Ram Tex', 40, 2000, 80000, 0),
(8, '2024-02-24', 'Coat', 'Hanifa Textiles', 10, 2500, 25000, 0),
(9, '2024-02-24', 'Suit', 'Ram Tex', 4, 5000, 20000, 0),
(10, '2024-02-24', 'T-Shirt', 'Hanifa Textiles', 25, 1200, 30000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stitching`
--

CREATE TABLE IF NOT EXISTS `stitching` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clothname` varchar(200) NOT NULL,
  `tailor` varchar(200) NOT NULL,
  `addr` varchar(200) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `dt` date NOT NULL,
  `rdt` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `stitching`
--

INSERT INTO `stitching` (`id`, `clothname`, `tailor`, `addr`, `mobile`, `qty`, `dt`, `rdt`) VALUES
(1, 'Churidhar', 'Ram Tailors', '343,South Car Street,\r\nMadurai', '8289489938', 25, '2024-02-24', '2024-02-24'),
(2, 'T-Shirt', 'Kumar and Sons', '343,West Car Street,\r\nMadurai', '8728343827', 25, '2024-02-24', '0000-00-00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
