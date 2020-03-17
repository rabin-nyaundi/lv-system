-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 07, 2020 at 07:27 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leave_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `leave_user_type`
--

CREATE TABLE `leave_user_type` (
  `id` int(45) UNSIGNED NOT NULL,
  `user_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_user_type`
--

INSERT INTO `leave_user_type` (`id`, `user_type`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `lv_approval`
--

CREATE TABLE `lv_approval` (
  `approval_id` int(45) UNSIGNED NOT NULL,
  `approval_user_id` int(45) UNSIGNED NOT NULL,
  `approval_leave_id` int(45) UNSIGNED NOT NULL,
  `approver_id` int(45) UNSIGNED NOT NULL,
  `approval_date` datetime NOT NULL,
  `Remarks` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `approval_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lv_department`
--

CREATE TABLE `lv_department` (
  `deoartment_id` int(45) UNSIGNED NOT NULL,
  `department_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lv_department`
--

INSERT INTO `lv_department` (`deoartment_id`, `department_name`) VALUES
(1, 'Finace'),
(2, 'Technical'),
(3, 'Legal');

-- --------------------------------------------------------

--
-- Table structure for table `lv_leave`
--

CREATE TABLE `lv_leave` (
  `lv_leave_id` int(45) UNSIGNED NOT NULL,
  `leave_user_id` int(45) UNSIGNED NOT NULL,
  `leave_subject` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lv_date_raised` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `lv_start_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lv_end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lv_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lv_users`
--

CREATE TABLE `lv_users` (
  `id` int(45) UNSIGNED NOT NULL,
  `emp_no` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_fname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_lname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_pswd` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` int(50) NOT NULL,
  `department` int(45) UNSIGNED NOT NULL,
  `user_type` int(45) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lv_users`
--

INSERT INTO `lv_users` (`id`, `emp_no`, `user_fname`, `user_lname`, `user_email`, `user_pswd`, `user_phone`, `department`, `user_type`) VALUES
(1, 'LV001', 'Rabin ', 'Nyaundi', 'nyaundirabin@gmail.com', '41781', 700304178, 1, 1),
(2, 'LV002', 'Oliver', 'Korir', 'oliver@gmail.com', '41781', 781365980, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leave_user_type`
--
ALTER TABLE `leave_user_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lv_approval`
--
ALTER TABLE `lv_approval`
  ADD PRIMARY KEY (`approval_id`),
  ADD KEY `fk_lv_userid` (`approval_user_id`),
  ADD KEY `fk_leave_id` (`approval_leave_id`);

--
-- Indexes for table `lv_department`
--
ALTER TABLE `lv_department`
  ADD PRIMARY KEY (`deoartment_id`);

--
-- Indexes for table `lv_leave`
--
ALTER TABLE `lv_leave`
  ADD PRIMARY KEY (`lv_leave_id`),
  ADD KEY `fk_user_id` (`leave_user_id`);

--
-- Indexes for table `lv_users`
--
ALTER TABLE `lv_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email_id` (`user_email`),
  ADD UNIQUE KEY `employee_no` (`emp_no`(45)),
  ADD KEY `fk_department` (`department`),
  ADD KEY `fk_user_type` (`user_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leave_user_type`
--
ALTER TABLE `leave_user_type`
  MODIFY `id` int(45) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lv_approval`
--
ALTER TABLE `lv_approval`
  MODIFY `approval_id` int(45) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lv_department`
--
ALTER TABLE `lv_department`
  MODIFY `deoartment_id` int(45) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lv_leave`
--
ALTER TABLE `lv_leave`
  MODIFY `lv_leave_id` int(45) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lv_users`
--
ALTER TABLE `lv_users`
  MODIFY `id` int(45) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lv_approval`
--
ALTER TABLE `lv_approval`
  ADD CONSTRAINT `fk_leave_id` FOREIGN KEY (`approval_leave_id`) REFERENCES `lv_leave` (`lv_leave_id`),
  ADD CONSTRAINT `fk_lv_userid` FOREIGN KEY (`approval_user_id`) REFERENCES `lv_users` (`id`);

--
-- Constraints for table `lv_leave`
--
ALTER TABLE `lv_leave`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`leave_user_id`) REFERENCES `lv_users` (`id`);

--
-- Constraints for table `lv_users`
--
ALTER TABLE `lv_users`
  ADD CONSTRAINT `fk_department` FOREIGN KEY (`department`) REFERENCES `lv_department` (`deoartment_id`),
  ADD CONSTRAINT `fk_user_type` FOREIGN KEY (`user_type`) REFERENCES `leave_user_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
