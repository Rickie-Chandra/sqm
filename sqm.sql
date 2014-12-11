-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 11, 2014 at 05:57 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

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
  `craftID` varchar(10) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aircraft`
--

INSERT INTO `aircraft` (`craftID`, `capacity`) VALUES
('GA1990', 32),
('GA1991', 32),
('GA1992', 32),
('GA1993', 32),
('GA1994', 32),
('GA1995', 32);

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE IF NOT EXISTS `airport` (
  `portID` varchar(10) NOT NULL,
  `name` text NOT NULL,
  `country` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airport`
--

INSERT INTO `airport` (`portID`, `name`, `country`) VALUES
('KUC', 'Kuching - KUC', 'Malaysia'),
('KUL', 'Kuala Lumpur - KUL', 'Malaysia'),
('PEN', 'Penang - PEN', 'Malaysia');

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE IF NOT EXISTS `charges` (
  `chargeID` varchar(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `fee` int(10) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`chargeID`, `title`, `fee`, `description`) VALUES
('C1', 'Luggage', 30, '20KG'),
('C2', 'Luggage', 35, '30KG'),
('C3', 'Food', 10, 'Nasi Lemak'),
('C4', 'Food & Luggage ', 35, '20KG + Nasi Lemak'),
('C5', 'Food & Luggage ', 38, '30KG + Nasi Lemak');

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE IF NOT EXISTS `flight` (
`flightID` int(10) NOT NULL,
  `craftID` varchar(10) NOT NULL,
  `routeID` varchar(10) NOT NULL,
  `flightDate` date NOT NULL,
  `departTime` varchar(20) NOT NULL,
  `arriveTime` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`flightID`, `craftID`, `routeID`, `flightDate`, `departTime`, `arriveTime`) VALUES
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
`passID` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `icPass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `emergencyName` varchar(255) NOT NULL,
  `emergencyRelation` varchar(255) NOT NULL,
  `emergencyPhone` varchar(255) NOT NULL,
  `departSeat` varchar(5) DEFAULT NULL,
  `returnSeat` varchar(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`passID`, `name`, `DOB`, `icPass`, `email`, `phone`, `address`, `emergencyName`, `emergencyRelation`, `emergencyPhone`, `departSeat`, `returnSeat`) VALUES
(1, 'Rickie 2', '2014-12-12', 'IcPassport', 'Rickie_Chandra@yahoo.com', '123', 'add', 'ename', 'Brother / Sister', '321', '3B', '3B'),
(2, 'Rickie', '2014-12-26', '123', 'Rickie_Chandra@yahoo.com', '1811', 'add', 'eName', 'Children', '321', '3A', '3C');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
`payID` int(10) NOT NULL,
  `cardType` varchar(30) NOT NULL,
  `cardNum` varchar(255) NOT NULL,
  `cardHold` varchar(255) NOT NULL,
  `expDate` date NOT NULL,
  `cwcid` varchar(255) NOT NULL,
  `cardCountry` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payID`, `cardType`, `cardNum`, `cardHold`, `expDate`, `cwcid`, `cardCountry`) VALUES
(1, 'VISA', 'cardNum', 'cardHold', '2014-12-24', 'cwcid', 'indonesia'),
(9, 'Master', 'cardNum', 'cardHold', '2014-12-13', 'cwcid', 'Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE IF NOT EXISTS `route` (
  `routeID` varchar(10) NOT NULL,
  `from` varchar(4) NOT NULL,
  `to` varchar(4) NOT NULL,
  `fee` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`routeID`, `from`, `to`, `fee`) VALUES
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
  `bookingID` varchar(10) NOT NULL,
  `bookDate` date NOT NULL,
  `departID` varchar(10) NOT NULL,
  `returnID` varchar(10) NOT NULL,
  `passID` varchar(10) NOT NULL,
  `chargeID` varchar(10) DEFAULT NULL,
  `payID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`bookingID`, `bookDate`, `departID`, `returnID`, `passID`, `chargeID`, `payID`) VALUES
('1', '2014-12-11', '3', '8', '1', 'C5', 1),
('2', '2014-12-11', '3', '8', '2', 'C5', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aircraft`
--
ALTER TABLE `aircraft`
 ADD PRIMARY KEY (`craftID`);

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
 ADD PRIMARY KEY (`portID`);

--
-- Indexes for table `charges`
--
ALTER TABLE `charges`
 ADD PRIMARY KEY (`chargeID`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
 ADD PRIMARY KEY (`flightID`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
 ADD PRIMARY KEY (`passID`), ADD UNIQUE KEY `PassID` (`passID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
 ADD PRIMARY KEY (`payID`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
 ADD PRIMARY KEY (`routeID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
 ADD PRIMARY KEY (`bookingID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
MODIFY `flightID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
MODIFY `passID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
MODIFY `payID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
