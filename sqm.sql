-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 24, 2014 at 06:53 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sqm`
--

-- --------------------------------------------------------

--
-- Table structure for table `aircraft`
--

CREATE TABLE IF NOT EXISTS `aircraft` (
  `CraftID` varchar(10) NOT NULL,
  `Capacity` int(11) NOT NULL,
  PRIMARY KEY (`CraftID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aircraft`
--

INSERT INTO `aircraft` (`CraftID`, `Capacity`) VALUES
('GA1990', 20),
('GA1991', 20),
('GA1992', 20),
('GA1993', 20),
('GA1994', 20),
('GA1995', 20);

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE IF NOT EXISTS `airport` (
  `PortID` varchar(10) NOT NULL,
  `Name` text NOT NULL,
  `Country` text NOT NULL,
  PRIMARY KEY (`PortID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airport`
--

INSERT INTO `airport` (`PortID`, `Name`, `Country`) VALUES
('KUC', 'Kuching - KUC', 'Malaysia'),
('KUL', 'Kuala Lumpur - KUL', 'Malaysia'),
('PEN', 'Penang - PEN', 'Malaysia');

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE IF NOT EXISTS `charges` (
  `ChargeID` varchar(10) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Description` varchar(255) NOT NULL,
  PRIMARY KEY (`ChargeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`ChargeID`, `Title`, `Amount`, `Description`) VALUES
('C1', '20KG', 30, 'Luggage '),
('C2', '30KG', 35, 'Luggage');

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE IF NOT EXISTS `flight` (
  `FlightID` int(10) NOT NULL AUTO_INCREMENT,
  `CraftID` varchar(10) NOT NULL,
  `RouteID` varchar(10) NOT NULL,
  `FlightDate` date NOT NULL,
  `DepartTime` varchar(20) NOT NULL,
  `ArriveTime` varchar(20) NOT NULL,
  PRIMARY KEY (`FlightID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`FlightID`, `CraftID`, `RouteID`, `FlightDate`, `DepartTime`, `ArriveTime`) VALUES
(1, 'GA1993', 'R1', '2015-02-03', '07:00', '09:00'),
(2, 'GA1993', 'R2', '2015-02-03', '09:10', '11:10'),
(3, 'GA1993', 'R1', '2015-02-03', '11:20', '13:20'),
(4, 'GA1993', 'R2', '2015-02-03', '13:30', '15:30'),
(5, 'GA1993', 'R1', '2015-02-03', '15:40', '17:40'),
(6, 'GA1993', 'R2', '2015-02-03', '17:50', '19:50'),
(7, 'GA1993', 'R1', '2015-02-03', '20:00', '22:00'),
(8, 'GA1992', 'R2', '2015-02-03', '07:00', '09:00'),
(9, 'GA1992', 'R1', '2015-02-03', '09:10', '11:10'),
(10, 'GA1992', 'R2', '2015-02-03', '11:20', '13:20'),
(11, 'GA1992', 'R1', '2015-02-03', '13:30', '15:30'),
(12, 'GA1992', 'R2', '2015-02-03', '15:40', '17:40'),
(13, 'GA1992', 'R1', '2015-02-03', '17:50', '19:50'),
(14, 'GA1992', 'R2', '2015-02-03', '20:00', '22:00');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE IF NOT EXISTS `passenger` (
  `PassID` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `Nation` varchar(255) NOT NULL,
  `Gender` tinyint(1) NOT NULL,
  `Contact` varchar(30) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `eName` varchar(255) NOT NULL,
  `eContact` varchar(255) NOT NULL,
  `Seat` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`PassID`),
  UNIQUE KEY `PassID` (`PassID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE IF NOT EXISTS `route` (
  `RouteID` varchar(10) NOT NULL,
  `From` varchar(4) NOT NULL,
  `To` varchar(4) NOT NULL,
  `Fee` int(10) NOT NULL,
  PRIMARY KEY (`RouteID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`RouteID`, `From`, `To`, `Fee`) VALUES
('R1', 'KUL', 'PEN', 115),
('R2', 'PEN', 'KUL', 120),
('R3', 'KUL', 'IPH', 100),
('R4', 'IPH', 'KUL', 130),
('R5', 'PEN', 'IPH', 90),
('R6', 'IPH', 'PEN', 110);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `BookingID` varchar(10) NOT NULL,
  `BookDate` date NOT NULL,
  `DFlightID` varchar(10) NOT NULL,
  `RFlightID` varchar(10) NOT NULL,
  `PassID` varchar(10) NOT NULL,
  `ChargeID` varchar(10) NOT NULL,
  PRIMARY KEY (`BookingID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
