-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 04, 2014 at 10:54 AM
-- Server version: 5.5.34-0ubuntu0.13.04.1
-- PHP Version: 5.4.9-4ubuntu2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ca`
--

-- --------------------------------------------------------

--
-- Table structure for table `inout`
--

CREATE TABLE IF NOT EXISTS `inout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(5) NOT NULL,
  `doc_name` varchar(100) NOT NULL,
  `sub_cat` char(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `inout`
--

INSERT INTO `inout` (`id`, `cid`, `doc_name`, `sub_cat`) VALUES
(1, 100, 'Some account document', 'INA'),
(2, 100, 'Some other accounts', 'INA'),
(3, 100, 'Our doc', 'OUT'),
(4, 100, 'Som sour', 'OUT'),
(5, 100, 'Some notices', 'INN'),
(6, 100, 'Some other notices', 'INN'),
(7, 100, 'Some other documents', 'INO'),
(8, 100, 'Some more other documents', 'INO');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
