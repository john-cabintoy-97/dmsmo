-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2023 at 10:30 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dmsmo`
--

-- --------------------------------------------------------

--
-- Table structure for table `file_documents`
--

CREATE TABLE `file_documents` (
  `do_id` int(11) NOT NULL,
  `filename` varchar(256) NOT NULL,
  `filesize` varchar(256) NOT NULL,
  `filetype` varchar(100) NOT NULL,
  `upload_name` varchar(256) NOT NULL,
  `download` varchar(256) NOT NULL,
  `users_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `file_documents`
--


-- --------------------------------------------------------

--
-- Table structure for table `incoming_file`
--

CREATE TABLE `incoming_file` (
  `in_id` int(11) NOT NULL,
  `control_no` varchar(256) NOT NULL,
  `particulars` text NOT NULL,
  `directions` text NOT NULL,
  `remarks` varchar(256) NOT NULL,
  `do_id` int(11) NOT NULL,
  `shared_by` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `incoming_file`
--


-- --------------------------------------------------------

--
-- Table structure for table `memo_log`
--

CREATE TABLE `memo_log` (
  `memo_log_id` int(11) NOT NULL,
  `filname` varchar(256) NOT NULL,
  `recepient` varchar(256) NOT NULL,
  `sender` varchar(256) NOT NULL,
  `timestatmp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `outgoing_file`
--

CREATE TABLE `outgoing_file` (
  `out_id` int(11) NOT NULL,
  `control_no` varchar(256) NOT NULL,
  `sending_office` varchar(256) NOT NULL,
  `particulars` text NOT NULL,
  `receving_office` varchar(256) NOT NULL,
  `remarks` text NOT NULL,
  `do_id` int(11) NOT NULL,
  `shared_by` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `outgoing_file`
--

-- --------------------------------------------------------

--
-- Table structure for table `system_log`
--

CREATE TABLE `system_log` (
  `syslog_id` int(11) NOT NULL,
  `ip` varchar(256) NOT NULL,
  `host` varchar(256) NOT NULL,
  `logged_in` varchar(256) NOT NULL,
  `logged_out` varchar(256) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_log`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `user_type` varchar(256) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file_documents`
--
ALTER TABLE `file_documents`
  ADD PRIMARY KEY (`do_id`),
  ADD KEY `file_documents_ibfk_1` (`users_id`);

--
-- Indexes for table `incoming_file`
--
ALTER TABLE `incoming_file`
  ADD PRIMARY KEY (`in_id`),
  ADD KEY `shared_by` (`shared_by`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `incoming_file_ibfk_1` (`do_id`);

--
-- Indexes for table `outgoing_file`
--
ALTER TABLE `outgoing_file`
  ADD PRIMARY KEY (`out_id`),
  ADD KEY `outgoing_file_ibfk_2` (`users_id`),
  ADD KEY `outgoing_file_ibfk_1` (`do_id`),
  ADD KEY `outgoing_file_ibfk_3` (`shared_by`);

--
-- Indexes for table `system_log`
--
ALTER TABLE `system_log`
  ADD PRIMARY KEY (`syslog_id`),
  ADD KEY `system_log_ibfk_1` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file_documents`
--
ALTER TABLE `file_documents`
  MODIFY `do_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `incoming_file`
--
ALTER TABLE `incoming_file`
  MODIFY `in_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `outgoing_file`
--
ALTER TABLE `outgoing_file`
  MODIFY `out_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `system_log`
--
ALTER TABLE `system_log`
  MODIFY `syslog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `file_documents`
--
ALTER TABLE `file_documents`
  ADD CONSTRAINT `file_documents_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `incoming_file`
--
ALTER TABLE `incoming_file`
  ADD CONSTRAINT `incoming_file_ibfk_1` FOREIGN KEY (`do_id`) REFERENCES `file_documents` (`do_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `incoming_file_ibfk_2` FOREIGN KEY (`shared_by`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `incoming_file_ibfk_3` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `outgoing_file`
--
ALTER TABLE `outgoing_file`
  ADD CONSTRAINT `outgoing_file_ibfk_1` FOREIGN KEY (`do_id`) REFERENCES `file_documents` (`do_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `outgoing_file_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `outgoing_file_ibfk_3` FOREIGN KEY (`shared_by`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `system_log`
--
ALTER TABLE `system_log`
  ADD CONSTRAINT `system_log_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
