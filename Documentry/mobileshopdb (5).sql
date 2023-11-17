-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2023 at 04:17 AM
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
  `name` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone1` varchar(100) NOT NULL,
  `phone2` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`nic`, `name`, `address`, `phone1`, `phone2`, `email`) VALUES
('199632458123', 'Kebuni', 'Matara', '0771234567', '0711234567', 'kebuni@gmail.com'),
('200012345678', 'Dasuni', 'Kadawatha', '1703633667', '0173633667', 'kebuni@gmail.com'),
('200041300147', 'Kanchana', 'Panadura', '0114563698', '0740231478', 'kanchana@gmail.com'),
('200176800124', 'Lakna', 'Kurunagala', '0748965321', '0789632258', 'lak@gmail.com'),
('200254102596', 'Suresh', 'Colombo', '0757815234', '0112578964', 'suresh@gmail.com'),
('200541025874', 'Ehara', 'Colombo', '0718753269', '0774852365', 'ehara@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `empNo` int(11) NOT NULL,
  `nic` varchar(20) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `daddress` varchar(250) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`empNo`, `nic`, `dname`, `daddress`, `phone`, `email`) VALUES
(1, '199845235711', 'Suresh', 'Kottawa', '0714523651', 'sureshcharuka@gmail.com'),
(2, '199912348564', 'Poornima', 'Mount Lavinia', '0778967125', 'poornima@gmail.com'),
(3, '199814253674', 'Keshan', 'Kandy', '0712458632', 'keshan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `imiNumber` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `extra` varchar(250) DEFAULT NULL,
  `nic` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`imiNumber`, `brand`, `model`, `extra`, `nic`) VALUES
('145782345', 'Oppo', 'X7', '-', '200254102596'),
('324567890912', 'Apple', 'A7', 'plus', '200176800124'),
('3524678512', 'Samsung', 'A32', 'A series', '200041300147'),
('457821345', 'Samsung', 'A21s', 'A series', '199632458123'),
('77758214', 'Samsung', 'A21s', 'A series', '200541025874');

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

-- --------------------------------------------------------

--
-- Table structure for table `inquries`
--

CREATE TABLE `inquries` (
  `mid` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `isOpened` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoiceNo` int(255) NOT NULL,
  `cusName` varchar(100) DEFAULT NULL,
  `amount` int(255) DEFAULT NULL,
  `paymentStatus` varchar(255) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoiceNo`, `cusName`, `amount`, `paymentStatus`, `status`, `date`) VALUES
(24, 'Lakna', 1500, '', 'Pending', '2023-10-27'),
(25, 'Suresh', 1700, '', 'Pending', '2023-10-27'),
(26, 'Suresh', 1300, '', 'Pending', '2023-10-27'),
(27, 'Upani', 3500, '', 'Pending', '2023-10-29'),
(28, 'Kebuni', 3500, '', 'Approved', '2023-11-04'),
(29, 'Suresh', 7500, '', 'Pending', '2023-11-04'),
(30, '3', 0, '', 'Pending', '2023-11-04');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemCode` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `cost` float NOT NULL,
  `unit` varchar(255) NOT NULL,
  `sellingPrice` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemCode`, `name`, `stock`, `cost`, `unit`, `sellingPrice`) VALUES
('1', 'Battery', 38, 500, 'units', 1500),
('2', 'Display', 20, 1000, 'units', 1500),
('3', 'Antena', 38, 400, 'units', 500),
('4', 'Battery Charger', 47, 550, 'units', 600),
('5', 'RAM', 0, 500, 'units', 650),
('6', 'Speaker', 85, 4500, 'units', 4800);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `jobDate` datetime NOT NULL,
  `systemuserId` int(11) NOT NULL,
  `deviceId` varchar(100) NOT NULL,
  `paymentStatus` char(1) NOT NULL,
  `amount` int(255) NOT NULL,
  `isInvoiced` char(1) NOT NULL,
  `remark` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `jobDate`, `systemuserId`, `deviceId`, `paymentStatus`, `amount`, `isInvoiced`, `remark`) VALUES
(1, '2023-10-05 00:00:00', 2, '324567890912', '0', 4500, '0', 'Done'),
(2, '2023-10-19 19:12:02', 2, '145782345', '0', 3000, '1', 'No materials were needed.'),
(3, '2023-10-19 19:13:01', 2, '145782345', '0', 0, '0', ''),
(4, '2023-11-05 06:04:15', 2, '145782345', '0', 0, '0', 'test 3'),
(5, '2023-11-05 06:06:43', 3, '457821345', '0', 0, '0', 'test 4'),
(6, '2023-11-05 06:33:29', 2, '457821345', '0', 2500, '0', ''),
(7, '2023-11-05 06:35:16', 2, '457821345', '0', 1900, '1', 'Test R'),
(8, '2023-11-11 19:27:19', 2, '77758214', '0', 0, '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `jobdelivery`
--

CREATE TABLE `jobdelivery` (
  `id` int(11) NOT NULL,
  `jobid` int(11) NOT NULL,
  `deliid` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  `locFromId` int(11) NOT NULL,
  `locToId` int(11) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobdelivery`
--

INSERT INTO `jobdelivery` (`id`, `jobid`, `deliid`, `date`, `locFromId`, `locToId`, `note`) VALUES
(1, 2, 1, '2023-11-05 04:15:09', 2, 1, ''),
(2, 4, 3, '2023-11-11 19:33:17', 2, 1, 'Need fast delivery');

-- --------------------------------------------------------

--
-- Table structure for table `jobitem`
--

CREATE TABLE `jobitem` (
  `jobitemid` int(11) NOT NULL,
  `jobid` int(11) NOT NULL,
  `itemId` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobitem`
--

INSERT INTO `jobitem` (`jobitemid`, `jobid`, `itemId`, `qty`, `price`) VALUES
(45, 7, '2', 1, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `jobservice`
--

CREATE TABLE `jobservice` (
  `jobserviceid` int(11) NOT NULL,
  `jobid` int(11) NOT NULL,
  `serviceid` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobservice`
--

INSERT INTO `jobservice` (`jobserviceid`, `jobid`, `serviceid`, `price`) VALUES
(44, 7, 4, 400),
(45, 2, 2, 2500),
(46, 2, 3, 500);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `locid` int(11) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `laddress` varchar(250) NOT NULL,
  `phone1` varchar(100) NOT NULL,
  `phone2` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`locid`, `lname`, `laddress`, `phone1`, `phone2`, `email`) VALUES
(1, 'HO', 'Colombo', '123456', '12345', 'ho@gmail.com'),
(2, 'Kurunagala', 'Malwaththa Rd Kurunagala', '0372283309', '0774152369', 'kmrskurunagala@gmail.com'),
(3, 'Kandy', 'Main street Kandy', '0812388693', '0774152908', 'kmrskandy@gmail.com'),
(4, 'Rathnapura', 'Kuruwita ,Rathnapura', '0749632545', '0778963654', 'kmrsrathnapura@gmail.com'),
(5, 'Galle', 'Udugama,Galle', '0114587233', '0745821546', 'kmrsgalle@gmail.com'),
(6, 'Kolpity', 'Kolpity,Colombo', '0113636396', '0703636396', 'kmrskolpity@gmail.com'),
(7, '6', 'Kolpity', '0113636396', '0703636396', 'kmrskolpity@gmail.com'),
(8, '6', 'Kolpity', '0113636396', '0703636396', 'kmrskolpity@gmail.com'),
(9, '6', 'Kolpity', '0113636396', '0703636396', 'kmrskolpity@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `sid` int(11) NOT NULL,
  `service` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `cost` float NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`sid`, `service`, `description`, `cost`, `date`) VALUES
(1, 'Diagnosing of Issues', 'Diagnosing of errors for better use', 1500, '2023-10-01 00:00:00'),
(2, 'Software Installation', 'Insertion of softwares for all devices', 2500, '2023-10-02 00:00:00'),
(3, 'Phone Setting', 'Setting up the phone for proper usage', 500, '2023-10-01 00:00:00'),
(4, 'Phone Unlock', 'Unlocking of accidentally locked phones', 400, '2023-10-02 00:00:00'),
(5, 'Virus Clearing ', 'Cleaning of phone virus', 3450, '2023-10-31 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `systemuser`
--

CREATE TABLE `systemuser` (
  `empNo` int(11) NOT NULL,
  `nic` varchar(20) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `uaddress` varchar(250) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `locid` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `systemuser`
--

INSERT INTO `systemuser` (`empNo`, `nic`, `uname`, `uaddress`, `phone`, `email`, `password`, `locid`, `type`) VALUES
(1, '200176800124', 'Lakna', 'Kurunagala', '123', 'lakna@gmail.com', 'lakna123', 1, 'ADMIN'),
(2, '199901410750', 'Yasiru', 'Panadura', '1232\r\n', 'abc@gmail.com', '123', 2, 'BR'),
(3, '100025633147', 'Test', 'Test', '1234', 'test@gmail.com', '123', 1, 'TECH');

-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

CREATE TABLE `technician` (
  `empNo` int(11) NOT NULL,
  `nic` varchar(20) NOT NULL,
  `tname` varchar(100) NOT NULL,
  `taddress` varchar(250) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `technician`
--

INSERT INTO `technician` (`empNo`, `nic`, `tname`, `taddress`, `phone`, `email`) VALUES
(1, '199625369789', 'Saman', 'Kurunagala', '0748596321', 'saman@gmail.com'),
(2, '199624157352', 'Mihin', 'Negambo', '0714585623', 'mihin@gamil.con'),
(3, '198724575859', 'Arvin', 'Kolpity', '0702525263', 'arvin@gmail.com');

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
  ADD KEY `jobid` (`jobid`),
  ADD KEY `systemuserId` (`systemuserId`);

--
-- Indexes for table `inquries`
--
ALTER TABLE `inquries`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoiceNo`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemCode`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `systemuserId` (`systemuserId`),
  ADD KEY `deviceId` (`deviceId`);

--
-- Indexes for table `jobdelivery`
--
ALTER TABLE `jobdelivery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobid` (`jobid`),
  ADD KEY `deliid` (`deliid`),
  ADD KEY `locFromId` (`locFromId`),
  ADD KEY `locToId` (`locToId`);

--
-- Indexes for table `jobitem`
--
ALTER TABLE `jobitem`
  ADD PRIMARY KEY (`jobitemid`),
  ADD KEY `jobid` (`jobid`),
  ADD KEY `itemId` (`itemId`);

--
-- Indexes for table `jobservice`
--
ALTER TABLE `jobservice`
  ADD PRIMARY KEY (`jobserviceid`),
  ADD KEY `jobid` (`jobid`),
  ADD KEY `serviceid` (`serviceid`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`locid`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`sid`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquries`
--
ALTER TABLE `inquries`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoiceNo` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobdelivery`
--
ALTER TABLE `jobdelivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobitem`
--
ALTER TABLE `jobitem`
  MODIFY `jobitemid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `jobservice`
--
ALTER TABLE `jobservice`
  MODIFY `jobserviceid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `locid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`jobid`) REFERENCES `job` (`id`),
  ADD CONSTRAINT `history_ibfk_2` FOREIGN KEY (`systemuserId`) REFERENCES `systemuser` (`empNo`);

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`systemuserId`) REFERENCES `systemuser` (`empNo`),
  ADD CONSTRAINT `job_ibfk_2` FOREIGN KEY (`deviceId`) REFERENCES `device` (`imiNumber`);

--
-- Constraints for table `jobdelivery`
--
ALTER TABLE `jobdelivery`
  ADD CONSTRAINT `jobdelivery_ibfk_1` FOREIGN KEY (`jobid`) REFERENCES `job` (`id`),
  ADD CONSTRAINT `jobdelivery_ibfk_2` FOREIGN KEY (`deliid`) REFERENCES `delivery` (`empNo`),
  ADD CONSTRAINT `jobdelivery_ibfk_3` FOREIGN KEY (`locFromId`) REFERENCES `location` (`locid`),
  ADD CONSTRAINT `jobdelivery_ibfk_4` FOREIGN KEY (`locToId`) REFERENCES `location` (`locid`);

--
-- Constraints for table `jobitem`
--
ALTER TABLE `jobitem`
  ADD CONSTRAINT `jobitem_ibfk_1` FOREIGN KEY (`jobid`) REFERENCES `job` (`id`),
  ADD CONSTRAINT `jobitem_ibfk_2` FOREIGN KEY (`itemId`) REFERENCES `item` (`itemCode`);

--
-- Constraints for table `jobservice`
--
ALTER TABLE `jobservice`
  ADD CONSTRAINT `jobservice_ibfk_1` FOREIGN KEY (`jobid`) REFERENCES `job` (`id`),
  ADD CONSTRAINT `jobservice_ibfk_2` FOREIGN KEY (`serviceid`) REFERENCES `services` (`sid`);

--
-- Constraints for table `systemuser`
--
ALTER TABLE `systemuser`
  ADD CONSTRAINT `systemuser_ibfk_1` FOREIGN KEY (`locid`) REFERENCES `location` (`locid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
