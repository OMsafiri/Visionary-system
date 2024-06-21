-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2024 at 12:19 PM
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
-- Database: `visionary_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `name`, `description`, `amount`) VALUES
(1, 'Membership', 'This is a membership Contribution', 100000),
(2, 'Rambirambi', 'This is a Rambirambi contribution', 150000),
(3, 'Sickness', 'This contribution is designed for for all sickness purpose for all members', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contributions`
--

CREATE TABLE `tbl_contributions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `balance` int(11) NOT NULL DEFAULT 0,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_contributions`
--

INSERT INTO `tbl_contributions` (`id`, `user_id`, `category_id`, `amount`, `balance`, `createdAt`, `updatedAt`) VALUES
(38, 1, 1, 50000, 50000, '2024-04-18 10:15:07', '2024-04-18 10:15:07'),
(39, 1, 1, 10000, 90000, '2024-04-18 10:15:29', '2024-04-18 10:15:29'),
(40, 1, 1, 60000, 40000, '2024-04-18 10:17:44', '2024-04-18 10:17:44'),
(41, 1, 1, 5000, 95000, '2024-04-18 10:17:58', '2024-04-18 10:17:58'),
(42, 1, 1, 95000, 5000, '2024-04-18 10:18:26', '2024-04-18 10:18:26'),
(43, 1, 1, 5000, 95000, '2024-04-18 10:18:37', '2024-04-18 10:18:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members`
--

CREATE TABLE `tbl_members` (
  `id` int(11) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `middleName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `emailAddress` varchar(30) NOT NULL,
  `mobileNumber` varchar(13) NOT NULL,
  `isActive` int(2) NOT NULL DEFAULT 0,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_members`
--

INSERT INTO `tbl_members` (`id`, `firstName`, `middleName`, `lastName`, `gender`, `emailAddress`, `mobileNumber`, `isActive`, `createdAt`, `updatedAt`) VALUES
(5, 'Diana', 'L', 'Katabaro', 'Female', 'dkatabaro@gmail.com', '0769234321', 0, '2024-03-27 17:13:06', '2024-03-27 17:13:06'),
(7, 'Lilian', 'Richard', 'Mwacha', 'Female', 'lilian@gmail.com', '07455443343', 0, '2024-04-03 11:25:41', '2024-04-03 11:25:41'),
(8, 'Lisa', 'Creus', 'Kyoma', 'Female', 'lisa255@gmail.com', '0713560923', 0, '2024-04-03 13:30:33', '2024-04-03 13:30:33'),
(9, 'Lisa ', 'C', 'Kyoma', 'Female', 'lisa255@gmail.com', '0713240956', 0, '2024-04-03 13:38:04', '2024-04-03 13:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_projects`
--

CREATE TABLE `tbl_projects` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `project_type` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `budget` varchar(30) NOT NULL,
  `isActive` int(2) NOT NULL DEFAULT 0,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_projects`
--

INSERT INTO `tbl_projects` (`id`, `user_id`, `name`, `description`, `project_type`, `location`, `startDate`, `endDate`, `budget`, `isActive`, `createdAt`, `updatedAt`) VALUES
(1, 1, 'Kuku wa nyama na Mayai', 'Kufuga Kuku wa nyama na mayai ', 'Fishing', 'Moivo - Arusha ', '2024-04-12', '2024-06-12', '12000000', 0, '2024-03-21 12:41:57', '2024-03-21 12:41:57'),
(2, 1, 'Mboga mboga', 'Mboga mboga aina ya mchicha, sukuma wiki, saro, saladi na spinachi', 'Fishing', 'Tengeru - Arusha ', '2024-05-20', '2024-08-20', '4000000', 0, '2024-03-21 12:47:59', '2024-03-21 12:47:59'),
(3, 1, 'KILIMO CHA SAMAKI', 'Kilimo cha Samaki aina ya perege na sato', 'wool making', 'Mirerani- Manyara', '2024-04-01', '2024-09-30', '10000000', 0, '2024-03-27 17:11:09', '2024-03-27 17:11:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `middleName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `emailAddress` varchar(30) NOT NULL,
  `mobileNumber` varchar(13) NOT NULL,
  `role` varchar(15) NOT NULL DEFAULT '2',
  `isActive` int(2) NOT NULL DEFAULT 1,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `firstName`, `middleName`, `lastName`, `gender`, `emailAddress`, `mobileNumber`, `role`, `isActive`, `createdAt`, `updatedAt`) VALUES
(1, 'odilianame', '9a618248b64db62d15b300a07b00580b', 'Odilia', 'Hamis', 'Msafiri', 'Female', 'odilia@gmail.com', '+255075678787', 'admin', 1, '2024-03-21 12:24:30', '2024-03-21 12:24:30'),
(5, 'Tean', '202cb962ac59075b964b07152d234b70', 'Tean', 'Tean', 'Tean', 'Male', 'tean@gmail.com', '0766717175', 'admin', 1, '2024-03-27 12:31:20', '2024-03-27 12:31:20'),
(6, 'Boni', '202cb962ac59075b964b07152d234b70', 'Boni', 'Deoratius', 'Massawe', 'Male', 'bmassawe@gmail.com', '0766717175', 'accountant', 1, '2024-03-27 12:55:40', '2024-03-27 12:55:40'),
(7, 'Emma', '202cb962ac59075b964b07152d234b70', 'Emma', 'Deoratius', 'Massawe', 'Male', 'emma@gmail.com', '0766717175', 'user', 1, '2024-03-27 13:51:43', '2024-03-27 13:51:43'),
(11, 'Elisa', '25f9e794323b453885f5181f1b624d0b', 'Lisa', 'Creus', 'Kyoma', 'Male', 'lisa255@gmail.com', '0713230956', 'user', 1, '2024-04-03 13:40:14', '2024-04-03 13:40:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contributions`
--
ALTER TABLE `tbl_contributions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tbl_members`
--
ALTER TABLE `tbl_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_projects`
--
ALTER TABLE `tbl_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_contributions`
--
ALTER TABLE `tbl_contributions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_members`
--
ALTER TABLE `tbl_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_projects`
--
ALTER TABLE `tbl_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_contributions`
--
ALTER TABLE `tbl_contributions`
  ADD CONSTRAINT `tbl_contributions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`),
  ADD CONSTRAINT `tbl_contributions_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `tbl_categories` (`id`);

--
-- Constraints for table `tbl_projects`
--
ALTER TABLE `tbl_projects`
  ADD CONSTRAINT `tbl_projects_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
