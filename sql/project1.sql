-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2020 at 06:39 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlog`
--

CREATE TABLE `adminlog` (
  `email` varchar(70) NOT NULL,
  `password` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlog`
--

INSERT INTO `adminlog` (`email`, `password`) VALUES
('bala@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `lectdetails`
--

CREATE TABLE `lectdetails` (
  `name` char(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `id` varchar(10) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `department` varchar(100) NOT NULL,
  `designation` char(50) NOT NULL,
  `sem` char(2) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lectdetails`
--

INSERT INTO `lectdetails` (`name`, `email`, `id`, `phone`, `department`, `designation`, `sem`, `subject`, `password`) VALUES
('bala12', 'balakrishna12345@gmail.com', '100A1', '9123163055', 'MCA', 'Professor', '1', 'C++', 'abhi'),
('Manjunath BM', 'manja@gmail.com', '100A2', '9045231233', 'MCA', 'Professor', '1', 'Java', 'manja'),
('Adarsh KS', 'adhi@gmail.com', '100A3', '8975342112', 'MCA', 'Professor', '1', 'PHP', 'adhi');

-- --------------------------------------------------------

--
-- Table structure for table `studentatt`
--

CREATE TABLE `studentatt` (
  `usn` varchar(10) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `date1` date DEFAULT NULL,
  `timef` time DEFAULT NULL,
  `timet` time DEFAULT NULL,
  `stat` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentatt`
--

INSERT INTO `studentatt` (`usn`, `name`, `subject`, `date1`, `timef`, `timet`, `stat`) VALUES
('1MS19MCA01', 'Abhi', 'C++', '2020-11-26', '12:39:00', '12:41:00', 'Present'),
('1MS19MCA01', 'Abhi', 'C++', '2020-11-27', '14:00:00', '15:01:00', 'Present'),
('1MS19MCA01', 'Abhi', 'C++', '2020-11-28', '17:58:00', '18:58:00', 'Absent'),
('1MS19MCA02', 'Adarsh', 'Java', '2020-11-26', '13:17:00', '14:18:00', 'Present'),
('1MS19MCA02', 'Adarsh', 'Java', '2020-11-27', '14:20:00', '15:21:00', 'Absent'),
('1MS19MCA02', 'Adarsh', 'C++', '2020-11-26', '15:41:00', '17:43:00', 'Present'),
('1MS19MCA02', 'Adarsh', 'C++', '2020-11-27', '14:41:00', '17:44:00', 'Present'),
('1MS19MCA01', 'Abhi', 'PHP', '2020-11-26', '15:51:00', '16:52:00', 'Present'),
('1MS19MCA01', 'Abhi', 'PHP', '2020-11-27', '16:50:00', '17:50:00', 'Absent'),
('1MS19MCA02', 'Adarsh', 'PHP', '2020-11-26', '16:55:00', '17:55:00', 'Present'),
('1MS19MCA02', 'Adarsh', 'PHP', '2020-11-27', '16:55:00', '17:55:00', 'Absent'),
('1MS19MCA01', 'Abhi', 'Java', '2020-11-26', '13:50:00', '14:50:00', 'Present'),
('1MS19MCA01', 'Abhi', 'Java', '2020-11-24', '09:50:00', '10:50:00', 'Present'),
('1MS19MCA01', 'Abhi', 'Java', '2020-11-10', '09:50:00', '10:50:00', 'Absent');

-- --------------------------------------------------------

--
-- Table structure for table `studentdetails`
--

CREATE TABLE `studentdetails` (
  `name` char(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `usn` varchar(10) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `department` varchar(100) NOT NULL,
  `sem` char(2) NOT NULL,
  `gardian` varchar(100) NOT NULL,
  `mark10` double(5,2) NOT NULL,
  `mark12` double(5,2) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentdetails`
--

INSERT INTO `studentdetails` (`name`, `email`, `usn`, `phone`, `department`, `sem`, `gardian`, `mark10`, `mark12`, `password`) VALUES
('Abhi', 'abhi124@gmail.com', '1MS19MCA01', '8123163055', 'MCA', '1', 'Father', 34.00, 35.00, 'abhi123'),
('Adarsh', 'adarshks@gmail.com', '1MS19MCA02', '7346921233', 'MCA', '1', 'Father', 90.00, 90.00, '123');

-- --------------------------------------------------------

--
-- Table structure for table `studentia`
--

CREATE TABLE `studentia` (
  `usn` varchar(10) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `sem` int(1) DEFAULT NULL,
  `ia1` int(2) DEFAULT NULL,
  `ia2` int(2) DEFAULT NULL,
  `ia3` int(2) DEFAULT NULL,
  `aq1` int(2) DEFAULT NULL,
  `aq2` int(2) DEFAULT NULL,
  `total` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentia`
--

INSERT INTO `studentia` (`usn`, `name`, `subject`, `sem`, `ia1`, `ia2`, `ia3`, `aq1`, `aq2`, `total`) VALUES
('1MS19MCA01', 'Abhi', 'C++', 1, 30, 25, 0, 10, 0, 38),
('1MS19MCA02', 'Adarsh', 'C++', 1, 30, 25, 0, 10, 10, 48),
('1MS19MCA01', 'Abhi', 'PHP', 1, 23, 30, 0, 10, 10, 47),
('1MS19MCA02', 'Adarsh', 'PHP', 1, 25, 30, 0, 10, 10, 48),
('1MS19MCA01', 'Abhi', 'Java', 1, 30, 30, 0, 0, 10, 40),
('1MS19MCA02', 'Adarsh', 'Java', 1, 30, 30, 0, 10, 10, 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlog`
--
ALTER TABLE `adminlog`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `lectdetails`
--
ALTER TABLE `lectdetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `studentatt`
--
ALTER TABLE `studentatt`
  ADD KEY `usn` (`usn`);

--
-- Indexes for table `studentdetails`
--
ALTER TABLE `studentdetails`
  ADD PRIMARY KEY (`usn`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `studentia`
--
ALTER TABLE `studentia`
  ADD KEY `usn` (`usn`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `studentatt`
--
ALTER TABLE `studentatt`
  ADD CONSTRAINT `studentatt_ibfk_1` FOREIGN KEY (`usn`) REFERENCES `studentdetails` (`usn`);

--
-- Constraints for table `studentia`
--
ALTER TABLE `studentia`
  ADD CONSTRAINT `studentia_ibfk_1` FOREIGN KEY (`usn`) REFERENCES `studentdetails` (`usn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
