-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2025 at 08:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password_hash`) VALUES
(1, 'chan', '$2y$10$EpMpzOVFy7mrXKWieXN5zuHRaKbnRZftXIin4GcnpPcNQoPzaFeD2'),
(2, 'andiason', '$2y$10$dRS83vhLsFmhvXx5PDZurOeLWypmSv5Pftq5K.XXu6i01T6xMJM5G'),
(3, 'java', '$2y$10$nOvr8h1SPnn.1V1BpCTQ9eHnGcxqAgbv01xGRxSV3gOffVF4vBGCC'),
(4, 'CHANX', '$2y$10$s6rAOeqjBgIZgaqtUeJAPe9nT8I71OBIQ5tJ2wlja5wr/8DpJ.xLK'),
(5, 'hacc', '$2y$10$jeVqinMzcDf4w9ZLDC7ISea07xFSHhGMw2K8jYWcpFhHV2GXgk096'),
(6, 'kakashi', '$2y$10$qUUwjbDuW7CkG9boy8wdmOaA.S3MfKG49bjwqjZcNHq2XYe/kZjMO'),
(7, 'andiason123', '$2y$10$vYSED4s7.ps4BnI673.S4.qv5f63JHjMjhG59VD3lRHWgArCXrxZy'),
(8, 'deli', '$2y$10$whk3ALQ0CC0NlVyJKksj7OrCoHkaYFynofaPd3uQ7Z/UTG.oQ31Xe'),
(9, 'shep', '$2y$10$.0hUVvW5vg.1airH.Mj9Yub/X/4bSLcc8Twml4qu7U3lywF8Dykj.'),
(10, 'gain', '$2y$10$NrLgn5oI3jOu5/MVTH0RZu6Re5MJvMe5xwl872T.yw7c1jct5FFn6'),
(11, 'can', '$2y$10$IFbKD2DLPbJfodwUg/9GoeqSbhNMbRxubbleVD0rVfiJqFT1DtBEm'),
(12, 'henry', '$2y$10$j//3Jbq5PC6EoEFndphliu4iSzae6hAuSL/Z9l0AxHkL9CthZ9FDq');

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `height` float NOT NULL,
  `weight` float NOT NULL,
  `gender` varchar(10) NOT NULL,
  `bmi` float NOT NULL,
  `user_points` int(11) NOT NULL,
  `bmi_category` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`user_id`, `name`, `age`, `height`, `weight`, `gender`, `bmi`, `user_points`, `bmi_category`) VALUES
(1, 'chan', 25, 1.6, 50, 'male', 19.5312, 0, 'Normal'),
(2, 'christian andiason', 21, 1.6, 50, 'male', 19.5312, 0, 'Normal'),
(5, 'heeen', 35, 1.6, 60, 'male', 23.4375, 0, 'Normal'),
(6, 'kakashi', 20, 1.6, 50, 'male', 19.5312, 25, 'Normal'),
(7, 'ren', 25, 1.6, 50, 'male', 19.5312, 15, 'Normal'),
(8, 'eugene', 25, 1.6, 50, 'male', 19.5312, 5, 'Normal'),
(9, 'shep', 25, 2.5, 50, 'male', 8, 135, 'Underweight'),
(10, 'gain', 25, 1.6, 50, 'male', 19.5312, 110, 'Normal'),
(11, 'can', 25, 1.2, 50, 'male', 34.7222, 105, 'Obese'),
(12, 'Henry B. Gwapohon', 25, 1.6, 60, 'male', 23.4375, 210, 'Normal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `password_hash` (`password_hash`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD KEY `fk_user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_info`
--
ALTER TABLE `users_info`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
