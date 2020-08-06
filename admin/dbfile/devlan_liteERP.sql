-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 06, 2020 at 06:06 PM
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
  `admin_dpic` varchar(200) NOT NULL,
  `admin_bio` longtext NOT NULL,
  `created_at` timestamp(4) NOT NULL DEFAULT CURRENT_TIMESTAMP(4) ON UPDATE CURRENT_TIMESTAMP(4)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `liteERP_admin`
--

INSERT INTO `liteERP_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_dpic`, `admin_bio`, `created_at`) VALUES
(1, 'Lite ERP Administrator', 'sysadmin@liteerp.org', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sed nibh vitae quam vehicula tempus. In id bibendum augue. In bibendum dui a lacus bibendum laoreet. Aliquam erat volutpat. Nulla at vulputate purus. In hac habitasse platea dictumst. Pellentesque ac velit nibh. Etiam at nulla augue. Maecenas pharetra lacus vel leo iaculis, vel tempus ante pharetra. Vestibulum est dui, fermentum eu ligula nec, pellentesque pretium dolor.\r\n\r\nAenean sed pretium felis. Fusce sit amet semper enim. In posuere tincidunt ante. Ut mollis euismod metus ac ultricies. Aenean vitae feugiat ante. Sed tincidunt orci justo, et finibus lectus euismod quis. Proin elementum malesuada dignissim. Suspendisse id diam non eros aliquam placerat. Nulla porttitor nunc et semper tempor. Nunc efficitur accumsan sem, consequat tincidunt urna. Nulla maximus elit rutrum, maximus massa at, rutrum odio. Praesent tortor augue, hendrerit imperdiet feugiat ut, iaculis ac arcu. Etiam tempor placerat nunc. Nam venenatis odio quis posuere rutrum. Phasellus lacinia convallis nibh id commodo. Curabitur vehicula vestibulum orci, eget dapibus nisi egestas id. ', '2020-08-06 15:53:11.1570');

-- --------------------------------------------------------

--
-- Table structure for table `liteERP_Login`
--

CREATE TABLE `liteERP_Login` (
  `login_id` int(20) NOT NULL,
  `login_user_password` varchar(200) NOT NULL,
  `login_user_email` varchar(200) NOT NULL,
  `login_user_permission` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `liteERP_Login`
--

INSERT INTO `liteERP_Login` (`login_id`, `login_user_password`, `login_user_email`, `login_user_permission`, `created_at`) VALUES
(1, 'a69681bcf334ae130217fea4505fd3c994f5683f', 'sysadmin@liteerp.org', '1', '2020-08-06 07:30:26.440253');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `liteERP_admin`
--
ALTER TABLE `liteERP_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `liteERP_Login`
--
ALTER TABLE `liteERP_Login`
  ADD PRIMARY KEY (`login_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `liteERP_admin`
--
ALTER TABLE `liteERP_admin`
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `liteERP_Login`
--
ALTER TABLE `liteERP_Login`
  MODIFY `login_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
