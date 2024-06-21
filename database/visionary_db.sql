-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 03:15 PM
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
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `expesnses_for` varchar(100) NOT NULL,
  `description` text NOT NULL DEFAULT '',
  `amount` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `expesnses_for`, `description`, `amount`) VALUES
(1, 'Chakula', 'Cha mchana', 2000.00);

-- --------------------------------------------------------

--
-- Table structure for table `fain`
--

CREATE TABLE `fain` (
  `id` int(11) NOT NULL,
  `member` int(11) NOT NULL,
  `description` text NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'not paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fain`
--

INSERT INTO `fain` (`id`, `member`, `description`, `amount`, `status`) VALUES
(1, 1, 'sijui bana', 12000, 'not paid'),
(4, 1, 'sijui', 20000, 'not paid'),
(5, 4, 'kuchelewa', 10000, 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `source` varchar(100) NOT NULL,
  `description` text NOT NULL DEFAULT '',
  `amount` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `source`, `description`, `amount`) VALUES
(1, 'Market', 'Sell members product 10 %', 20000.00);

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` int(11) NOT NULL,
  `member` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `amount_returned` int(11) NOT NULL DEFAULT 0,
  `balance` int(11) DEFAULT NULL,
  `loan_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `description` text DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'On going'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `member`, `amount`, `amount_returned`, `balance`, `loan_date`, `description`, `status`) VALUES
(2, 2, 1000000, 31000, 0, '2023-12-19 05:00:43', 'nanuna gtr 35 nismo double truble charge', 'On going'),
(3, 2, 10000, 0, 0, '2023-12-19 05:01:14', 'duuh ata sijui', 'On going'),
(4, 4, 12340, 2000, 0, '2023-12-19 05:04:09', 'hahaha', 'On going');

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
  `user_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `balance` int(11) NOT NULL DEFAULT 0,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_contributions`
--

INSERT INTO `tbl_contributions` (`id`, `user_id`, `member_id`, `category_id`, `amount`, `balance`, `createdAt`, `updatedAt`) VALUES
(1, 3, NULL, 1, 200000, -100000, '2024-05-03 12:08:52', '2024-05-03 12:08:52'),
(2, 2, NULL, 2, 200000, -50000, '2024-05-03 12:09:14', '2024-05-03 12:09:14');

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
  `isActive` int(2) NOT NULL DEFAULT 0,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `firstName`, `middleName`, `lastName`, `gender`, `emailAddress`, `mobileNumber`, `role`, `isActive`, `createdAt`, `updatedAt`) VALUES
(1, 'odilianame', '123', 'Odilia', 'Hamis', 'Msafiri', 'Female', 'odilia@gmail.com', '+255075678787', 'admin', 1, '2024-05-03 11:39:53', '2024-05-03 11:39:53'),
(2, 'John', '123', 'John', 'Opps', 'Hehe', 'Male', 'accountant@gmail.com', '+255075678787', 'accountant', 1, '2024-05-03 11:39:53', '2024-05-03 11:39:53'),
(3, 'Tean', '123', 'Tean', 'Tech', 'Tean', 'Male', 'tean@gmail.com', '074567833', 'admin', 1, '2024-05-03 11:55:46', '2024-05-03 11:55:46'),
(4, 'Anna', '123', 'Anna', 'Anna', 'Anna', 'Female', 'anna@anna.com', '0746574834', 'user', 1, '2023-12-17 01:15:50', '2023-12-17 01:15:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fain`
--
ALTER TABLE `fain`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member` (`member`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_UsersLoans` (`member`);

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
  ADD KEY `member_id` (`member_id`),
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
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fain`
--
ALTER TABLE `fain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_contributions`
--
ALTER TABLE `tbl_contributions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_members`
--
ALTER TABLE `tbl_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_projects`
--
ALTER TABLE `tbl_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fain`
--
ALTER TABLE `fain`
  ADD CONSTRAINT `fain_ibfk_1` FOREIGN KEY (`member`) REFERENCES `tbl_users` (`id`);

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `fk_UsersLoans` FOREIGN KEY (`member`) REFERENCES `tbl_users` (`id`);

--
-- Constraints for table `tbl_contributions`
--
ALTER TABLE `tbl_contributions`
  ADD CONSTRAINT `tbl_contributions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`),
  ADD CONSTRAINT `tbl_contributions_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `tbl_members` (`id`),
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
