-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 03, 2020 at 11:55 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devlan_liteERP`
--

-- --------------------------------------------------------

--
-- Table structure for table `liteERP_admin`
--

CREATE TABLE `liteERP_admin` (
  `admin_id` int(20) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(200) NOT NULL,
  `admin_dpic` varchar(200) NOT NULL,
  `created_at` timestamp(4) NOT NULL DEFAULT CURRENT_TIMESTAMP(4) ON UPDATE CURRENT_TIMESTAMP(4)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `liteERP_admin`
--

INSERT INTO `liteERP_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_dpic`, `created_at`) VALUES
(1, 'Super Admin', 'sysadmin@liteerp.org', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'boy.png', '2020-07-03 09:33:09.8189');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `liteERP_admin`
--
ALTER TABLE `liteERP_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `liteERP_admin`
--
ALTER TABLE `liteERP_admin`
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
