-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2022 at 10:22 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csc_dormitory`
--

-- --------------------------------------------------------

--
-- Table structure for table `dormitory`
--

CREATE TABLE `dormitory` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `dormitory_room` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `desscription` text DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'null.jpg',
  `address` text DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `status` enum('APPROVE','WAIT_APPROVE') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dormotory_detail`
--

CREATE TABLE `dormotory_detail` (
  `id` int(11) NOT NULL,
  `dormitory_id` int(11) DEFAULT NULL,
  `map` text DEFAULT NULL,
  `other` text NOT NULL DEFAULT '..',
  `line` text DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `ig` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `image_detail`
--

CREATE TABLE `image_detail` (
  `id` int(11) NOT NULL,
  `dormitory_id` int(11) DEFAULT NULL,
  `image_1` varchar(255) NOT NULL DEFAULT 'null.jpg',
  `image_2` varchar(255) NOT NULL DEFAULT 'null.jpg',
  `image_3` varchar(255) NOT NULL DEFAULT 'null.jpg',
  `image_4` varchar(255) NOT NULL DEFAULT 'null.jpg',
  `image_5` varchar(255) NOT NULL DEFAULT 'null.jpg',
  `image_6` varchar(255) NOT NULL DEFAULT 'null.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pass`, `name`, `last_name`, `role`) VALUES
(1, 'admin', 'admin', 'ad', 'min', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dormitory`
--
ALTER TABLE `dormitory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dormotory_detail`
--
ALTER TABLE `dormotory_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_detail`
--
ALTER TABLE `image_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dormitory`
--
ALTER TABLE `dormitory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dormotory_detail`
--
ALTER TABLE `dormotory_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image_detail`
--
ALTER TABLE `image_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
