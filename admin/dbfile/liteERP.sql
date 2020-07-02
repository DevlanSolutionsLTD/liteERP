-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 01, 2020 at 07:00 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `liteERP`
--

-- --------------------------------------------------------

--
-- Table structure for table `Superadmin`
--

CREATE TABLE `Superadmin` (
  `userid` int(11) NOT NULL,
  `username` varchar(254) NOT NULL,
  `email` varchar(234) NOT NULL,
  `password` varchar(250) NOT NULL,
  `createdon` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Superadmin`
--

INSERT INTO `Superadmin` (`userid`, `username`, `email`, `password`, `createdon`) VALUES
(1, 'Superadmin', 'superadmin@lite.com', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', '2020-07-01 12:56:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Superadmin`
--
ALTER TABLE `Superadmin`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Superadmin`
--
ALTER TABLE `Superadmin`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
