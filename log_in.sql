-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2023 at 06:29 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `log_in`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `activityName` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(15) NOT NULL,
  `location` varchar(100) NOT NULL,
  `ootd` varchar(50) NOT NULL,
  `userId` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `remark` enum('cancelled','done','other') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `activityName`, `date`, `time`, `location`, `ootd`, `userId`, `created_at`, `remark`) VALUES
(1, 'asdasdsad', '2023-10-17', '12:22', 'san', 'Sinina', 2, '2023-10-18 12:55:01', 'cancelled'),
(2, 'asdasdsa', '2023-11-03', '01:33', 'san', 'asdsad', 4, '2023-10-18 17:32:51', ''),
(3, 'FDSFDSF', '2023-10-13', '04:56', 'san', 'asadad', 7, '2023-10-18 20:55:02', ''),
(4, 'asdasd', '2023-10-04', '05:13', 'san', 'asdsad', 6, '2023-10-18 21:10:14', ''),
(5, 'asdasd', '2023-10-05', '05:13', 'sadasd', 'asdasdsa', 6, '2023-10-18 21:10:22', ''),
(6, 'Cheerdancing', '2023-10-24', '13:30', 'USC Talamban', 'Cheer dancing outfit', 11, '2023-10-24 03:28:20', 'cancelled'),
(7, 'Jogging', '2024-01-24', '23:35', 'USC Talamban', 'Secret', 11, '2023-10-24 03:33:20', 'done');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `content`, `created_at`) VALUES
(1, 'Web Dev Project', 'Yeheyyyyyyyy, finally nahuman na ang website!', '2023-10-18 19:53:48'),
(3, 'Going Home', 'Mo uli gyud ko inig Saturday ba!', '2023-10-18 19:56:03'),
(4, 'Example', 'Try ra ni if mogana huhu', '2023-10-18 19:56:39'),
(5, 'eh', 'eh eh', '2023-10-18 20:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `gender`, `email`, `password`, `role`, `status`) VALUES
(5, 'Mr. Admin', 'Master', 'Male', 'admin@gmail.com', 'adminuser', 'admin', 'active'),
(10, 'Catherine', 'Vidas', 'Female', 'cath@gmail.com', 'cathy', 'user', 'active'),
(11, 'Ma. Laiza', 'Hino-o', 'Female', 'lai25@gmail.com', 'lailai', 'user', 'active'),
(12, 'Jay Clark', 'Anore', 'Male', 'clark@gmail.com', 'clark123', 'user', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
