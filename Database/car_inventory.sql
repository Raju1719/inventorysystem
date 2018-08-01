-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2018 at 07:56 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `createddate` datetime NOT NULL,
  `ip` varchar(250) NOT NULL,
  `flag` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `name`, `createddate`, `ip`, `flag`) VALUES
(1, 'test', '2018-07-30 21:48:31', '::1', 1),
(2, 'abc', '2018-07-30 21:50:02', '::1', 1),
(3, 'abc', '2018-07-30 21:50:37', '::1', 1),
(4, 'test', '2018-07-30 21:53:25', '::1', 1),
(5, 'test', '2018-07-30 21:53:41', '::1', 1),
(6, 'new', '2018-07-30 21:54:53', '::1', 1),
(7, 'new', '2018-07-30 21:55:05', '::1', 1),
(8, 'new', '2018-07-30 21:55:21', '::1', 1),
(9, 'df', '2018-07-30 21:55:54', '::1', 1),
(10, 'sdf', '2018-07-30 21:57:20', '::1', 1),
(11, 'da', '2018-07-30 21:57:34', '::1', 1),
(12, 'df', '2018-07-30 23:00:11', '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `manufacturer_id` int(10) NOT NULL,
  `model_color` varchar(100) NOT NULL,
  `model_year` varchar(250) NOT NULL,
  `reg_num` varchar(250) NOT NULL,
  `note` varchar(250) NOT NULL,
  `image_upload1` varchar(250) NOT NULL,
  `image_upload2` varchar(250) NOT NULL,
  `createddate` datetime NOT NULL,
  `ip` varchar(250) NOT NULL,
  `flag` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `name`, `manufacturer_id`, `model_color`, `model_year`, `reg_num`, `note`, `image_upload1`, `image_upload2`, `createddate`, `ip`, `flag`) VALUES
(1, 'd', 3, 'd', 'd', 'd', 'd', 'prashant.jpg', 'prashant.jpg', '2018-07-30 23:24:44', '::1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
