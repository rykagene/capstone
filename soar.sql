-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2023 at 02:30 PM
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
-- Database: `soar`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `account_type` varchar(255) DEFAULT NULL,
  `reservation_count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `username`, `password`, `email`, `picture`, `account_type`, `reservation_count`) VALUES
(1, 'ricardojeyms', '123', 'richard@soar.com', NULL, 'admin', 0),
(2, '2020103475', '123', 'jeaysmie.digo.m@bulsu.edu.ph', 'assets/img/profilejeays id picture bsu.jpg', 'student', 0),
(3, '1234', '1234', 'digo.jeaysmie.m.3475@gmail.com', NULL, 'student', 0),
(4, '123', '123', '123@gmail.com', NULL, 'student', 0),
(5, 'nosection', '123', 'nosection@ga.com', NULL, 'student', 0),
(6, '123456', '123', '123@gmail.com', NULL, 'student', 0),
(7, '1234567', '123456', '123@gmail.com', NULL, 'student', 0),
(8, 'mj23', '123', 'mj23@gmail.com', NULL, 'admin', 0),
(9, 'robertooo', '123', 'robert@gmail.com', NULL, 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(11) NOT NULL,
  `isSuperAdmin` varchar(3) DEFAULT NULL,
  `rfid_no` varchar(50) DEFAULT NULL,
  `department` varchar(10) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `mobile_no` varchar(15) DEFAULT NULL,
  `tel_no` varchar(15) DEFAULT NULL,
  `fb_link` varchar(255) DEFAULT NULL,
  `linkedIn_link` varchar(255) DEFAULT NULL,
  `home_address` varchar(255) DEFAULT NULL,
  `work_status` varchar(20) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `isSuperAdmin`, `rfid_no`, `department`, `first_name`, `last_name`, `gender`, `mobile_no`, `tel_no`, `fb_link`, `linkedIn_link`, `home_address`, `work_status`, `account_id`) VALUES
('mj23', 'no', NULL, 'CICT', 'Michaela ', 'Jordan', 'Female', NULL, NULL, NULL, NULL, NULL, 'Temporary', 8),
('ricardojeym', 'yes', NULL, 'CICT', 'Richard James', 'Bagay', 'Male', '0976263839', '794-2677', 'facebook.com/ricardojeyms', 'facebook.com/ricardojeyms', 'Barangay Balayong Malolos Bulacan', 'Permanent', 1),
('robertooo', 'no', NULL, 'CLAW', 'Robert', 'Deniro', 'Male', NULL, NULL, NULL, NULL, NULL, 'Permanent', 9);

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `college_code` varchar(50) NOT NULL,
  `college_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`college_code`, `college_name`) VALUES
('CICT', 'College of Information and Communications Technology');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_code` varchar(50) NOT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `college_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_code`, `course_name`, `college_code`) VALUES
('BSIT', 'Bachelor of Science in Information Technology', 'CICT');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `history_id` int(11) NOT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `seat_id` int(11) DEFAULT NULL,
  `time_spent` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`history_id`, `reservation_id`, `date`, `start_time`, `end_time`, `user_id`, `seat_id`, `time_spent`) VALUES
(34, 87, '2023-09-27', '11:01:52', '11:06:12', 2020103475, 2, '00:04:20'),
(35, 87, '2023-09-27', '11:01:52', '11:06:13', 2020103475, 2, '00:04:20'),
(36, 88, '2023-09-28', '00:00:00', '20:17:59', 123, 1, '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `occupy`
--

CREATE TABLE `occupy` (
  `occupy_id` int(11) NOT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `seat_id` int(11) DEFAULT NULL,
  `time_spent` time DEFAULT NULL,
  `isDone` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `occupy`
--

INSERT INTO `occupy` (`occupy_id`, `reservation_id`, `date`, `start_time`, `end_time`, `user_id`, `seat_id`, `time_spent`, `isDone`) VALUES
(88, 87, '2023-09-27', '11:01:52', '11:06:13', 2020103475, 2, '00:04:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `review` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating_id`, `rating`, `review`, `date`, `user_id`) VALUES
(1, 5, 'sheesh', '2023-09-19', 2020103475),
(2, 3, 'nice!', '2023-09-19', 2020103475),
(3, 5, 'nice!', '2023-09-19', 2020103475),
(4, 4, '', '2023-09-19', 2020103475),
(5, 3, '', '2023-09-27', 2020103475),
(6, 4, 'sfdgdfdsfsd', '2023-09-27', 2020103475);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `seat_id` int(11) DEFAULT NULL,
  `isDone` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `date`, `start_time`, `end_time`, `user_id`, `seat_id`, `isDone`) VALUES
(87, '2023-09-27', '10:47:00', '11:06:00', 2020103475, 2, 1),
(88, '2023-09-28', '10:17:00', '12:17:00', 123, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `seat_id` int(11) NOT NULL,
  `seat_number` varchar(50) DEFAULT NULL,
  `data_surface` varchar(255) NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`seat_id`, `seat_number`, `data_surface`, `status`) VALUES
(1, '1', '221 2 495 496 497 0.513 0.203 0.284\r\n', '0'),
(2, '2', '220 3 7 10 9 0.179 0.274 0.547', '0'),
(3, '3', '219 3 11 10 12 0.125 0.438 0.437', '0'),
(4, '4', '218 1 823 824 826 0.428 0.044 0.528\r\n', '0'),
(5, '5', '222 1 437 438 478 0.134 0.069 0.796', '0');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `reservation` tinyint(1) DEFAULT NULL,
  `minDuration` int(11) DEFAULT NULL,
  `maxDuration` int(11) DEFAULT NULL,
  `reservePerDay` int(11) NOT NULL,
  `start_hour` time NOT NULL,
  `end_hour` time NOT NULL,
  `disabled_dates` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `reservation`, `minDuration`, `maxDuration`, `reservePerDay`, `start_hour`, `end_hour`, `disabled_dates`) VALUES
(1, 0, 1, 4, 4, '10:00:00', '17:00:00', '[\"2023-10-01\",\"2023-10-08\",\"2023-10-15\",\"2023-10-22\",\"2023-10-29\",\"2023-10-07\",\"2023-10-14\",\"2023-10-28\",\"2023-10-21\",\"2023-09-02\",\"2023-09-09\",\"2023-09-16\",\"2023-09-23\",\"2023-09-30\",\"2023-11-05\",\"2023-11-12\",\"2023-11-19\",\"2023-11-26\",\"2023-12-03\",\"2023-12-10\",\"2023-12-17\",\"2023-12-24\",\"2023-12-31\",\"2023-12-02\",\"2023-12-09\",\"2023-12-16\",\"2023-12-30\",\"2023-12-23\",\"2023-12-25\",\"2023-11-25\",\"2023-11-18\",\"2023-11-11\",\"2023-11-04\",\"2024-01-07\",\"2024-01-14\",\"2024-01-21\",\"2024-01-28\",\"2024-01-06\",\"2024-01-13\",\"2024-01-20\",\"2024-01-27\",\"2024-02-03\",\"2024-02-10\",\"2024-02-17\",\"2023-09-24\",\"2023-09-17\",\"2023-09-10\",\"2023-09-03\",\"2023-08-27\"]');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `rfid_no` varchar(50) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `course_code` varchar(50) DEFAULT NULL,
  `yearsec_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `rfid_no`, `first_name`, `last_name`, `account_id`, `course_code`, `yearsec_id`) VALUES
(0, NULL, 'nosection', 'nosection', 5, NULL, NULL),
(123, NULL, 'noCourse', 'noCourse', 4, NULL, 9),
(1234, NULL, 'JEAYSMIE', 'DIGO', 3, 'BSIT', 9),
(123456, NULL, '1234', '1234', 6, NULL, NULL),
(1234567, NULL, 'noCourses', 'noCourses', 7, NULL, NULL),
(2020103475, '12345', 'Jeaysmie', 'Digo', 2, 'BSIT', 9),
(2023000001, NULL, 'admin', 'admin', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `yearsec`
--

CREATE TABLE `yearsec` (
  `yearsec_id` int(11) NOT NULL,
  `year_level` int(11) DEFAULT NULL,
  `section` varchar(10) DEFAULT NULL,
  `section_group` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `yearsec`
--

INSERT INTO `yearsec` (`yearsec_id`, `year_level`, `section`, `section_group`) VALUES
(1, 3, 'A', '1'),
(2, 3, 'A', '2'),
(3, 3, 'B', '1'),
(4, 3, 'B', '2'),
(5, 3, 'C', '1'),
(6, 3, 'C', '2'),
(7, 3, 'D', '1'),
(8, 3, 'D', '2'),
(9, 3, 'E', '1'),
(10, 3, 'E', '2'),
(11, 3, 'F', '1'),
(12, 3, 'F', '2'),
(13, 3, 'G', '1'),
(14, 3, 'G', '2'),
(15, 3, 'H', '1'),
(16, 3, 'H', '2'),
(17, 3, 'I', '1'),
(18, 3, 'I', '2'),
(19, 3, 'J', '1'),
(20, 3, 'J', '2'),
(21, 3, 'K', '1'),
(22, 3, 'K', '2'),
(23, 3, 'L', '1'),
(24, 3, 'L', '2'),
(25, 3, 'M', '1'),
(26, 3, 'M', '2'),
(27, 3, 'N', '1'),
(28, 3, 'N', '2'),
(29, 3, 'O', '1'),
(30, 3, 'O', '2'),
(31, 3, 'P', '1'),
(32, 3, 'P', '2'),
(33, 3, 'Q', '1'),
(34, 3, 'Q', '2'),
(35, 3, 'R', '1'),
(36, 3, 'R', '2'),
(37, 3, 'S', '1'),
(38, 3, 'S', '2'),
(39, 3, 'T', '1'),
(40, 3, 'T', '2'),
(41, 3, 'U', '1'),
(42, 3, 'U', '2'),
(43, 3, 'V', '1'),
(44, 3, 'V', '2'),
(45, 3, 'W', '1'),
(46, 3, 'W', '2'),
(47, 3, 'X', '1'),
(48, 3, 'X', '2'),
(49, 3, 'Y', '1'),
(50, 3, 'Y', '2'),
(51, 3, 'Z', '1'),
(52, 3, 'Z', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`college_code`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_code`),
  ADD KEY `college_code` (`college_code`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `reservation_id` (`reservation_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `seat_id` (`seat_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `occupy`
--
ALTER TABLE `occupy`
  ADD PRIMARY KEY (`occupy_id`),
  ADD KEY `reservation_id` (`reservation_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `seat_id` (`seat_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `seat_id` (`seat_id`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`seat_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `course_code` (`course_code`),
  ADD KEY `yearsec_id` (`yearsec_id`);

--
-- Indexes for table `yearsec`
--
ALTER TABLE `yearsec`
  ADD PRIMARY KEY (`yearsec_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `occupy`
--
ALTER TABLE `occupy`
  MODIFY `occupy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`reservation_id`),
  ADD CONSTRAINT `history_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `history_ibfk_3` FOREIGN KEY (`seat_id`) REFERENCES `seat` (`seat_id`);

--
-- Constraints for table `occupy`
--
ALTER TABLE `occupy`
  ADD CONSTRAINT `occupy_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`reservation_id`),
  ADD CONSTRAINT `occupy_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `occupy_ibfk_3` FOREIGN KEY (`seat_id`) REFERENCES `seat` (`seat_id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`seat_id`) REFERENCES `seat` (`seat_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`course_code`) REFERENCES `course` (`course_code`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`yearsec_id`) REFERENCES `yearsec` (`yearsec_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE 'users'
ADD 'age' INT,
ADD 'contact_num' VARCHAR(15);

