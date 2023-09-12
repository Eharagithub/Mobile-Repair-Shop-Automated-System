-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2023 at 08:26 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobileshopdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `nic` varchar(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `phone1` varchar(100) DEFAULT NULL,
  `phone2` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`nic`, `name`, `address`, `phone1`, `phone2`, `email`) VALUES
('', '', '2343', '2334', '2344', '12314'),
('1234', 'yasiru', '2343', '2334', '2344', '12314'),
('200176800124', 'lakna', 'Kuliyapitiya', '0712488852', '0774713426', 'lakna@gmailcom'),
('200176800125', 'lakna', 'Kuliyapitiya', '0712488852', '0774713426', 'lakna@gmailcom'),
('34654', 'ABC', 'dsgdf', '12345', '1122', 'abc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `empNo` int(11) NOT NULL,
  `nic` varchar(20) NOT NULL,
  `dname` varchar(100) DEFAULT NULL,
  `daddress` varchar(250) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`empNo`, `nic`, `dname`, `daddress`, `phone`, `email`) VALUES
(123, '200084500124', 'lak', 'hhh', '0145765321', 'lak@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `imiNumber` varchar(100) NOT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `extra` varchar(250) DEFAULT NULL,
  `nic` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`imiNumber`, `brand`, `model`, `extra`, `nic`) VALUES
('hshhs', 'nnn', '   hhh', 'nsbxb', '200176800124');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `htype` varchar(100) DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  `noteDate` datetime DEFAULT NULL,
  `systemuserId` int(11) NOT NULL,
  `jobid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `htype`, `note`, `noteDate`, `systemuserId`, `jobid`) VALUES
(2, 'bvvv', 'vc', '0000-00-00 00:00:00', 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `isActive` char(1) NOT NULL,
  `jobDate` datetime NOT NULL,
  `deliveryId` int(11) DEFAULT NULL,
  `technicianId` int(11) DEFAULT NULL,
  `systemuserId` int(11) NOT NULL,
  `deviceId` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `isActive`, `jobDate`, `deliveryId`, `technicianId`, `systemuserId`, `deviceId`) VALUES
(1, 'y', '0000-00-00 00:00:00', 123, 123, 100, 'hshhs');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `locid` int(11) NOT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `laddress` varchar(250) DEFAULT NULL,
  `phone1` varchar(100) DEFAULT NULL,
  `phone2` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`locid`, `lname`, `laddress`, `phone1`, `phone2`, `email`) VALUES
(1, 'HO', 'ho Colombo', '1111111', '2222222', 'ho@gmail.com'),
(8, 'kurunagala', 'kurunagala', '0372283309', '0114785963', 'kuru@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `systemuser`
--

CREATE TABLE `systemuser` (
  `empNo` int(11) NOT NULL,
  `nic` varchar(20) NOT NULL,
  `uname` varchar(100) DEFAULT NULL,
  `uaddress` varchar(250) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `locid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `systemuser`
--

INSERT INTO `systemuser` (`empNo`, `nic`, `uname`, `uaddress`, `phone`, `email`, `password`, `locid`) VALUES
(100, '12345v', 'Kanchana', '23 Panadura', '123456', 'kanchana@gmail.com', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

CREATE TABLE `technician` (
  `empNo` int(11) NOT NULL,
  `nic` varchar(20) DEFAULT NULL,
  `tname` varchar(100) DEFAULT NULL,
  `taddress` varchar(250) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `technician`
--

INSERT INTO `technician` (`empNo`, `nic`, `tname`, `taddress`, `phone`, `email`) VALUES
(0, '', '', '', '', ''),
(123, '2000896333125', 'hhh', 'nnnn', '0114569321', 'lka@gmail.com'),
(124, '100025633147', 'laknagaa', 'naa', '0114285369', 'lakkk@gmail.com'),
(125, '100025633147', 'ddd', 'zzz', '0114178963', 'lkj@gmail.com'),
(321, '200041300147', 'lakj', 'nhhh', '0114785963', 'lkj@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`nic`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`empNo`);

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`imiNumber`),
  ADD KEY `nic` (`nic`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `systemuserId` (`systemuserId`),
  ADD KEY `jobid` (`jobid`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deliveryId` (`deliveryId`),
  ADD KEY `technicianId` (`technicianId`),
  ADD KEY `systemuserId` (`systemuserId`),
  ADD KEY `deviceId` (`deviceId`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`locid`);

--
-- Indexes for table `systemuser`
--
ALTER TABLE `systemuser`
  ADD PRIMARY KEY (`empNo`),
  ADD KEY `locid` (`locid`);

--
-- Indexes for table `technician`
--
ALTER TABLE `technician`
  ADD PRIMARY KEY (`empNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `locid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `device`
--
ALTER TABLE `device`
  ADD CONSTRAINT `device_ibfk_1` FOREIGN KEY (`nic`) REFERENCES `customer` (`nic`);

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`systemuserId`) REFERENCES `systemuser` (`empNo`),
  ADD CONSTRAINT `history_ibfk_2` FOREIGN KEY (`jobid`) REFERENCES `job` (`id`);

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`deliveryId`) REFERENCES `delivery` (`empNo`),
  ADD CONSTRAINT `job_ibfk_2` FOREIGN KEY (`technicianId`) REFERENCES `technician` (`empNo`),
  ADD CONSTRAINT `job_ibfk_3` FOREIGN KEY (`systemuserId`) REFERENCES `systemuser` (`empNo`),
  ADD CONSTRAINT `job_ibfk_4` FOREIGN KEY (`deviceId`) REFERENCES `device` (`imiNumber`);

--
-- Constraints for table `systemuser`
--
ALTER TABLE `systemuser`
  ADD CONSTRAINT `systemuser_ibfk_1` FOREIGN KEY (`locid`) REFERENCES `location` (`locid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
