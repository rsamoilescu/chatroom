-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2013 at 11:28 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `text`
--

CREATE TABLE IF NOT EXISTS `text` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Text` text NOT NULL,
  `User` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

--
-- Dumping data for table `text`
--

INSERT INTO `text` (`ID`, `Text`, `User`, `email`) VALUES
(37, 'this is robert''s post', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(38, 'welcome to this website', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(39, 'this is nothing but a forum\n', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(40, 'why so serious ?? ', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(42, 'how are you ??', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(44, 'Something here', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(45, 'Something here', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(46, 'Something here', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(47, '1', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(48, '2', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(49, 'Something here', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(50, '10', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(51, '10', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(52, 'Something here', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(53, 'Something here', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(54, '12', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(55, 'Something here', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(56, 'Something here', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(57, '12', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(58, 'Something here', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(59, 'Something here', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(60, 'Something here', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(61, 'Something here', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(74, 'why so serious??', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(76, '1', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(77, '2', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(78, '3', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(79, '4', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(80, '5', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(81, '6', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(82, '8', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(83, '9', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(84, '10', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(85, '11', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(86, '12', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(87, '13', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(88, '14', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(89, '15', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(91, '17', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(92, '18', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(93, '19', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(94, '20', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(95, '21', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(96, 'why so serious???', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(97, 'Something here', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(98, 'vvv', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(99, '122', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(100, '111', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(101, 'Something here', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(102, 'qqq', 'Robert Samoilescu', 'rsamoilescu@yahoo.com'),
(104, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Alex Garrett', 'alex@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
