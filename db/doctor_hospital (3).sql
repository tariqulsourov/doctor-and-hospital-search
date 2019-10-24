-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2018 at 05:42 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor_hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `police_station` varchar(50) NOT NULL,
  `post_office` varchar(50) NOT NULL,
  `post_code` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `division` varchar(20) NOT NULL,
  `version` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `police_station`, `post_office`, `post_code`, `city`, `division`, `version`, `created`, `updated`) VALUES
(1, 'Khilgaon', 'Khilgaon', 1219, 'Dhaka', 'Dhaka', 0, '2018-05-02 17:05:01', '0000-00-00 00:00:00'),
(2, 'Khilgaon', 'Khilgaon', 1219, 'Dhaka', 'Dhaka', 0, '2018-05-02 17:33:52', '0000-00-00 00:00:00'),
(3, 'Khilgaon', 'Khilgaon', 1219, 'Dhaka', 'Dhaka', 0, '2018-05-02 17:33:55', '0000-00-00 00:00:00'),
(4, 'Khilgaon', 'Khilgaon', 1219, 'Dhaka', 'Dhaka', 0, '2018-05-02 17:33:56', '0000-00-00 00:00:00'),
(5, 'Khilgaon', 'Khilgaon', 1219, 'Dhaka', 'Dhaka', 0, '2018-05-02 17:33:57', '0000-00-00 00:00:00'),
(6, 'Khilgaon', 'Khilgaon', 1219, 'Dhaka', 'Dhaka', 0, '2018-05-02 17:33:57', '0000-00-00 00:00:00'),
(7, 'Khilgaon', 'Khilgaon', 1219, 'Dhaka', 'Dhaka', 0, '2018-05-02 17:34:01', '0000-00-00 00:00:00'),
(8, 'test', 'test', 2323, 'test', 'test', 0, '2018-05-04 06:01:47', '0000-00-00 00:00:00'),
(9, 'bashabo', 'khilgaon', 1219, 'dhaka', 'dhaka', 0, '2018-05-04 13:48:03', '0000-00-00 00:00:00'),
(10, 'BASHABO', 'KHILGAON', 3434, 'DHAKA', 'DHAKA', 7, '2018-05-06 12:55:55', '2018-05-09 15:58:54'),
(11, 'dasdfads', '212', 23, 'dfjdasfj', 'dcfadsfj', 0, '2018-05-06 13:01:31', '0000-00-00 00:00:00'),
(12, 'dasdfads', '212', 23, 'dfjdasfj', 'dcfadsfj', 0, '2018-05-06 13:01:47', '0000-00-00 00:00:00'),
(13, 'dasdfads', '212', 23, 'dfjdasfj', 'dcfadsfj', 0, '2018-05-06 13:02:03', '0000-00-00 00:00:00'),
(14, 'four', 'four', 0, 'four', 'four', 0, '2018-05-06 18:54:12', '0000-00-00 00:00:00'),
(15, 'five', 'five', 1, 'five', 'five', 0, '2018-05-06 18:58:35', '0000-00-00 00:00:00'),
(101, 'TEST1', 'TEST1', 102, 'TEST1', 'TEST1', 0, '2018-05-09 16:41:41', '0000-00-00 00:00:00'),
(102, 'TEST2', 'TEST2', 102, 'TEST2', 'TEST2', 0, '2018-05-09 16:41:41', '0000-00-00 00:00:00'),
(103, 'RAMPURA', 'RAMPURA', 1219, 'DHAKA', 'DHAKA', 0, '2018-09-06 00:16:18', '0000-00-00 00:00:00'),
(104, 'RAMPURA', 'RAMPURA', 1219, 'DHAKA', 'DHAKA', 0, '2018-09-06 02:44:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `specility` varchar(255) NOT NULL DEFAULT 'x',
  `login_id` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL,
  `phone_no` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nid_no` varchar(50) DEFAULT NULL,
  `status` varchar(11) DEFAULT 'ACTIVE',
  `rating` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `version` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `specility`, `login_id`, `password`, `phone_no`, `email`, `nid_no`, `status`, `rating`, `address_id`, `version`, `created`, `updated`) VALUES
(1, 'erfan', 'Heart speciliest', '123', '123', 1234, 'abc@gmail.com', 'ACTIVE  ', '123', 8, 1, 0, '2018-05-02 17:09:19', '0000-00-00 00:00:00'),
(2, 'sourov', 'Pediatrics', 'Sourov', '123', 19863333, 'saqifjawad7@gmail.com', '0123222222225555888', 'ACTIVE', 0, 103, 0, '2018-09-06 00:16:18', '0000-00-00 00:00:00'),
(3, 'sourov', 'Surgery', '1', '123456', 1986395483, 'tariqulislamsourov@gmail.com', '01479999666333', 'ACTIVE', 0, 104, 0, '2018-09-06 02:44:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `grade` varchar(5) NOT NULL DEFAULT 'x',
  `login_id` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL,
  `phone_no` int(11) DEFAULT NULL,
  `web_site` varchar(50) DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `version` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `name`, `grade`, `login_id`, `password`, `phone_no`, `web_site`, `rating`, `address_id`, `version`, `created`, `updated`) VALUES
(1, 'Bangabandhu Medical', 'B', '21', '12345', 1988888, 'www.bm.com', 4, 103, 0, '2018-09-06 03:40:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_address`
--

CREATE TABLE `hospital_address` (
  `id` int(255) DEFAULT NULL,
  `police_station` varchar(255) DEFAULT NULL,
  `post_office` varchar(255) DEFAULT NULL,
  `post_code` int(20) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `division` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `search_frequency`
--

CREATE TABLE `search_frequency` (
  `id` int(10) NOT NULL,
  `specility` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `search_frequency`
--

INSERT INTO `search_frequency` (`id`, `specility`) VALUES
(1, 'Surgery'),
(2, 'Pediatrics'),
(3, 'Neurology'),
(4, 'Genetics'),
(5, 'Allergy'),
(6, 'Gynecology'),
(7, 'Physiology'),
(8, 'Anthropology');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_id` (`login_id`),
  ADD UNIQUE KEY `phone_no` (`phone_no`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nid_no` (`nid_no`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_id` (`login_id`),
  ADD UNIQUE KEY `phone_no` (`phone_no`),
  ADD UNIQUE KEY `web_site` (`web_site`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `search_frequency`
--
ALTER TABLE `search_frequency`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `search_frequency`
--
ALTER TABLE `search_frequency`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`);

--
-- Constraints for table `hospital`
--
ALTER TABLE `hospital`
  ADD CONSTRAINT `hospital_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
