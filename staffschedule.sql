-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2024 at 10:53 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `staffschedule`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `id` int(10) NOT NULL,
  `role` int(10) NOT NULL COMMENT '0 student,1 faculty',
  `facultyname` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `sem` int(20) NOT NULL,
  `department` varchar(20) NOT NULL,
  `submitdate` date NOT NULL,
  `pdf` varchar(100) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id`, `role`, `facultyname`, `subject`, `sem`, `department`, `submitdate`, `pdf`, `created_at`, `updated_at`) VALUES
(3, 1, ' sanjay', 'MPI', 1, 'computer', '2024-01-12', 'pdf/ass1.pdf', '2024-04-19 10:09:58.142967', '2024-04-19 10:09:58.142967'),
(4, 1, 'komal', 'AJ', 1, 'computer', '2024-01-09', 'pdf/ass1.pdf', '2024-04-19 10:14:44.408090', '2024-04-19 10:14:44.408090');

-- --------------------------------------------------------

--
-- Table structure for table `midmarks`
--

CREATE TABLE `midmarks` (
  `id` int(10) NOT NULL,
  `sem` varchar(20) DEFAULT NULL,
  `class` varchar(20) DEFAULT NULL,
  `dept` varchar(20) DEFAULT NULL,
  `pdf` varchar(1000) DEFAULT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `midmarks`
--

INSERT INTO `midmarks` (`id`, `sem`, `class`, `dept`, `pdf`, `created_at`, `updated_at`) VALUES
(2, '1', 'comp-1', 'comp', 'pdf/midmarks.pdf', '2024-04-19 10:11:37.262901', '2024-04-19 10:11:37.262901'),
(3, '6', 'comp-1', 'comp', 'pdf/midmarks.pdf', '2024-04-19 10:16:33.445262', '2024-04-19 10:16:33.445262');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(10) NOT NULL,
  `role` int(10) NOT NULL COMMENT '0 student,1 faculty',
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `dept` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `enroll` bigint(20) NOT NULL,
  `class` varchar(50) DEFAULT NULL,
  `sem` varchar(50) DEFAULT NULL,
  `profileimage` varchar(200) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `role`, `name`, `email`, `mobile`, `dept`, `dob`, `gender`, `enroll`, `class`, `sem`, `profileimage`, `password`, `created_at`, `updated_at`) VALUES
(16, 1, 'komal', 'komal@gmail.com', 6789564327, 'comp', NULL, NULL, 0, NULL, NULL, 'css/imagef.jpg', '123', '2024-04-19 09:52:46.913315', '2024-04-19 09:52:46.913315'),
(17, 1, 'krishna', 'krishna@gmail.com', 9345892209, 'IT', NULL, NULL, 0, NULL, NULL, 'css/imagef.jpg', '456', '2024-04-19 09:53:33.636639', '2024-04-19 09:53:33.636639'),
(18, 1, 'sanjay', 'sanjay@gmail.com', 8769540321, 'comp', NULL, NULL, 0, NULL, NULL, 'css/imageb.png', '789', '2024-04-19 09:54:09.648710', '2024-04-19 09:54:09.648710'),
(19, 0, 'riya talaviya', 'riya@gmail.com', NULL, 'comp', '2003-01-01', 'female', 210760107001, 'comp-1', '1', 'f.jpg', '123', '2024-04-19 09:57:41.747034', '2024-04-19 09:57:41.747034'),
(22, 0, 'tiya kapadiya', 'tiya1@gmail.com', NULL, 'IT', '2003-08-04', 'female', 210760107100, 'compIt-1', '4', 'f.jpg', '456', '2024-04-19 09:59:57.691469', '2024-04-19 09:59:57.691469'),
(23, 0, 'ram', 'ram@gmail.com', NULL, 'EC', '2004-08-08', 'male', 210760107100, 'EC-1', '5', 'b.png', '789', '2024-04-19 10:00:53.663396', '2024-04-19 10:00:53.663396'),
(25, 0, 'johan dave', 'johan@gmail.com', NULL, 'comp', '2002-08-01', 'male', 210760107001, 'comp-2', '3', 'b.png', '789', '2024-04-19 10:02:50.229967', '2024-04-19 10:02:50.229967'),
(26, 0, 'alice doe', 'doe@gmail.com', NULL, 'mech', '2004-09-18', 'female', 210760107107, 'mech-1', '1', 'f.jpg', '123', '2024-04-19 10:04:04.177993', '2024-04-19 10:04:04.177993'),
(27, 0, 'david smith', 'smith@gmail.com', NULL, 'Civil', '2004-10-05', 'male', 210760107023, 'civil-2', '7', 'b.png', '456', '2024-04-19 10:05:10.425649', '2024-04-19 10:05:10.425649'),
(28, 0, 'sita', 'sita@gmail.com', NULL, 'comp', '2003-04-30', 'female', 21076010789, 'comp-1', '8', 'f.jpg', '123', '2024-04-19 10:06:22.050447', '2024-04-19 10:06:22.050447'),
(29, 0, 'tina', 'tina@gmail.com', NULL, 'IT', '2004-07-07', 'female', 21076010788, 'compIt-1', '3', 'f.jpg', '456', '2024-04-19 10:07:15.025029', '2024-04-19 10:07:15.025029'),
(30, 0, 'raj', 'raj@gmail.com', NULL, 'mech', '2003-01-23', 'male', 210760107029, 'mech-1', '4', 'b.png', '789', '2024-04-19 10:08:11.183009', '2024-04-19 10:08:11.183009');

-- --------------------------------------------------------

--
-- Table structure for table `studentstatus`
--

CREATE TABLE `studentstatus` (
  `id` int(10) NOT NULL,
  `enroll` bigint(20) DEFAULT NULL,
  `subject` varchar(20) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `sem` varchar(20) DEFAULT NULL,
  `class` varchar(20) DEFAULT NULL,
  `dept` varchar(20) DEFAULT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentstatus`
--

INSERT INTO `studentstatus` (`id`, `enroll`, `subject`, `name`, `email`, `mobile`, `sem`, `class`, `dept`, `created_at`, `updated_at`) VALUES
(1, 210760107029, 'ipdc', NULL, NULL, NULL, '1', 'mech-1', NULL, '2024-04-19 15:12:53.544740', '2024-04-19 15:12:53.544740'),
(2, 210760107029, 'mpi', NULL, NULL, NULL, '3', 'mech-1', NULL, '2024-04-19 15:16:42.554833', '2024-04-19 15:16:42.554833'),
(3, 210760107029, 'iot', NULL, NULL, NULL, '3', 'mech-1', NULL, '2024-04-19 15:18:00.334643', '2024-04-19 15:18:00.334643');

-- --------------------------------------------------------

--
-- Table structure for table `timetable1`
--

CREATE TABLE `timetable1` (
  `id` int(10) NOT NULL,
  `role` int(50) NOT NULL COMMENT '0 student, 1 faculty',
  `sem` varchar(50) DEFAULT NULL,
  `dept` varchar(50) DEFAULT NULL,
  `class` varchar(50) DEFAULT NULL,
  `facultyname` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `pdf` varchar(1000) DEFAULT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timetable1`
--

INSERT INTO `timetable1` (`id`, `role`, `sem`, `dept`, `class`, `facultyname`, `subject`, `pdf`, `created_at`, `updated_at`) VALUES
(4, 0, '6', 'computer', 'comp-1', NULL, NULL, 'pdf/timetable.pdf', '2024-04-19 10:12:16.662720', '2024-04-19 10:12:16.662720'),
(5, 0, '1', 'comp', 'comp-1', NULL, NULL, 'pdf/timetable.pdf', '2024-04-19 10:17:02.186132', '2024-04-19 10:17:02.186132'),
(6, 1, '1', 'comp', NULL, 'komal', 'iot', 'pdf/timetable.pdf', '2024-04-20 04:03:32.347639', '2024-04-20 04:03:32.347639');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `midmarks`
--
ALTER TABLE `midmarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `studentstatus`
--
ALTER TABLE `studentstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetable1`
--
ALTER TABLE `timetable1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `midmarks`
--
ALTER TABLE `midmarks`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `studentstatus`
--
ALTER TABLE `studentstatus`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `timetable1`
--
ALTER TABLE `timetable1`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
