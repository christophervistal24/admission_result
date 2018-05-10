-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2018 at 11:41 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admission`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission_result`
--

CREATE TABLE `admission_result` (
  `id` int(11) NOT NULL,
  `examiner_info_id` int(11) NOT NULL,
  `entrace_rating_id` int(11) NOT NULL,
  `preferred_course_id_1` int(11) NOT NULL,
  `preferred_course_id_2` int(11) NOT NULL,
  `guidance_counselor_id` int(50) NOT NULL,
  `exam_at` int(11) NOT NULL,
  `is_delete` enum('YES','NO') NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admission_result`
--

INSERT INTO `admission_result` (`id`, `examiner_info_id`, `entrace_rating_id`, `preferred_course_id_1`, `preferred_course_id_2`, `guidance_counselor_id`, `exam_at`, `is_delete`) VALUES
(1, 1, 1, 9, 1, 1, 1525873094, 'NO'),
(10, 10, 10, 1, 1, 1, 1525888633, 'NO'),
(11, 11, 11, 1, 1, 1, 1525894412, 'NO'),
(13, 13, 13, 1, 1, 1, 1525934087, 'NO'),
(16, 18, 18, 1, 1, 1, 1525973383, 'NO'),
(17, 19, 19, 9, 1, 1, 1525973411, 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `course` varchar(255) NOT NULL,
  `dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course`, `dept_id`) VALUES
(1, 'Bachelor of Arts in Economics', 1),
(2, 'Bachelor of Arts in English', 1),
(3, 'Bachelor of Arts in Filipino', 1),
(4, 'Bachelor of Arts in Political Science', 1),
(5, 'Bachelor of Arts in Public Administration', 1),
(6, 'Bachelor of Arts in Social Science', 1),
(7, 'Bachelor of Science in Biology	', 1),
(8, 'Bachelor of Science in Environmental Science', 1),
(9, 'Bachelor of Science in Midwifery', 1),
(10, 'Associate in Hotel & Restaurant Management	', 2),
(11, 'Bachelor of Science in Business Administration major in Human Resource Development Management	Candidate Status', 2),
(12, 'Bachelor of Science in Business Administration Major in Financial Management', 2),
(13, 'Bachelor of Science in Business Administration major in Marketing Management', 2),
(14, 'Bachelor of Science in Hotel and Restaurant Management', 2),
(15, 'Bachelor of Science in Civil Engineering	', 3),
(16, 'Bachelor of Science in Computer Science', 3),
(17, 'Bachelor of Early Childhood Education', 4),
(18, 'Bachelor of Physical Education', 4),
(19, 'Bachelor of Secondary Education major in English', 4),
(20, 'Bachelor of Secondary Education major in Filipino', 4),
(21, 'Bachelor of Secondary Education major in Sciences', 4),
(22, 'Diploma in Teaching', 4);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`) VALUES
(1, 'College of Arts and Sciences'),
(2, 'College of Business Management'),
(3, 'College of Engineering, Computer Studies and Technology'),
(4, 'College of Teacher Education');

-- --------------------------------------------------------

--
-- Table structure for table `entrace_rating`
--

CREATE TABLE `entrace_rating` (
  `id` int(11) NOT NULL,
  `verbal_comprehension` int(11) NOT NULL,
  `verbal_reasoning` int(11) NOT NULL,
  `figurative_reasoning` int(11) NOT NULL,
  `quantitative_reasoning` int(11) NOT NULL,
  `verbal_total` int(11) NOT NULL,
  `non_verbal_total` int(11) NOT NULL,
  `over_all_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entrace_rating`
--

INSERT INTO `entrace_rating` (`id`, `verbal_comprehension`, `verbal_reasoning`, `figurative_reasoning`, `quantitative_reasoning`, `verbal_total`, `non_verbal_total`, `over_all_total`) VALUES
(1, 1, 2, 3, 4, 3, 7, 10),
(10, 25, 1, 1, 1, 26, 2, 28),
(11, 2, 3, 5, 6, 5, 11, 16),
(13, 10, 11, 15, 15, 21, 30, 51),
(18, 1, 2, 3, 4, 3, 7, 10),
(19, 2, 1, 4, 3, 3, 7, 10);

-- --------------------------------------------------------

--
-- Table structure for table `examiner_info`
--

CREATE TABLE `examiner_info` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `sex` enum('Female','Male') NOT NULL,
  `age` int(11) NOT NULL,
  `birthdate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examiner_info`
--

INSERT INTO `examiner_info` (`id`, `firstname`, `middlename`, `lastname`, `sex`, `age`, `birthdate`) VALUES
(1, 'Christopher', 'm', 'Vistal', 'Male', 13, '2018-05-01'),
(10, 'Test', 'm', 'Dummy', 'Female', 1, '1997-01-01'),
(11, 'D', 'M', 'D', 'Female', 1, '2018-05-31'),
(13, 'Mark', 'x', 'santing', 'Male', 18, '2000-01-06'),
(18, 'Testing', 'A', 'Testing', 'Female', 1, '1997-01-01'),
(19, 'Again', 'M', 'Testing', 'Female', 56, '1997-12-09');

-- --------------------------------------------------------

--
-- Table structure for table `guidance_conselors`
--

CREATE TABLE `guidance_conselors` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `signature` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guidance_conselors`
--

INSERT INTO `guidance_conselors` (`id`, `fullname`, `position`, `signature`, `created_at`, `updated_at`) VALUES
(1, 'JOAN A. MARTIZANO ZARTIGA,MA,RGC', 'Guidance Counselor III', 'untitled.png', 1525970344, 0),
(2, 'Christopher Platino Vistal', 'Guidance Counselor II', 'noimage.jpg', 1525970344, 0);

-- --------------------------------------------------------

--
-- Table structure for table `preferred_courses`
--

CREATE TABLE `preferred_courses` (
  `id` int(11) NOT NULL,
  `first_course` varchar(50) NOT NULL,
  `second_course` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preferred_courses`
--

INSERT INTO `preferred_courses` (`id`, `first_course`, `second_course`) VALUES
(5, '1', '2'),
(7, '16', '16'),
(8, '16', '16'),
(9, '1', '2'),
(10, '1', '2'),
(11, '1', '2'),
(12, '16', '16'),
(13, '16', '16'),
(14, '16', '16'),
(15, '16', '16'),
(16, '16', '16'),
(17, '8', '6'),
(18, '1', '1'),
(19, '1', '1'),
(20, '1', '1'),
(21, '1', '1'),
(22, '1', '1'),
(23, '1', '1'),
(24, '1', '1'),
(25, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$xsdPGnB/mmS9tkwzz5zxcupgExqlLJKDYKOrkpVPtR582kAZCLvXi', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_info`
--

CREATE TABLE `tbl_user_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` enum('Female','Male') NOT NULL,
  `birthdate` varchar(50) NOT NULL,
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_info`
--

INSERT INTO `tbl_user_info` (`id`, `user_id`, `firstname`, `middlename`, `lastname`, `gender`, `birthdate`, `profile`) VALUES
(1, 1, 'christopher', 'P', 'vistal', 'Female', '1997-01-06', '73fcf44f5ec321d710dca54114818f4a--jeong-yeon-jeongyeon-twice.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission_result`
--
ALTER TABLE `admission_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entrace_rating`
--
ALTER TABLE `entrace_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examiner_info`
--
ALTER TABLE `examiner_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guidance_conselors`
--
ALTER TABLE `guidance_conselors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preferred_courses`
--
ALTER TABLE `preferred_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_info`
--
ALTER TABLE `tbl_user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission_result`
--
ALTER TABLE `admission_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `entrace_rating`
--
ALTER TABLE `entrace_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `examiner_info`
--
ALTER TABLE `examiner_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `guidance_conselors`
--
ALTER TABLE `guidance_conselors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `preferred_courses`
--
ALTER TABLE `preferred_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user_info`
--
ALTER TABLE `tbl_user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
