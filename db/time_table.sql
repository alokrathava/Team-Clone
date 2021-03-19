-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2021 at 09:47 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `email` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`email`, `pass`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(5) NOT NULL,
  `st_no` int(5) NOT NULL,
  `attendance` varchar(10) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `st_no`, `attendance`, `date`) VALUES
(1, 1, '0', '2021-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` int(5) NOT NULL,
  `st_id` int(5) NOT NULL,
  `t_id` int(5) NOT NULL,
  `comp_description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `st_id`, `t_id`, `comp_description`) VALUES
(1, 1, 1, 'Bakwas ');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `c_id` int(11) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `dep_id`, `c_name`) VALUES
(1, 1, 'Electrical'),
(2, 1, 'Computer'),
(3, 1, 'Cemical'),
(4, 2, 'Maths'),
(5, 2, 'Physics'),
(6, 2, 'Bio'),
(7, 3, 'marketing');

-- --------------------------------------------------------

--
-- Table structure for table `deparment`
--

CREATE TABLE `deparment` (
  `dep_id` int(11) NOT NULL,
  `d_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deparment`
--

INSERT INTO `deparment` (`dep_id`, `d_name`) VALUES
(1, 'BE'),
(2, 'MSC'),
(3, 'MBA');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(5) NOT NULL,
  `event_name` varchar(50) NOT NULL,
  `event_description` varchar(100) NOT NULL,
  `event_image` varchar(200) NOT NULL,
  `event_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_description`, `event_image`, `event_date`) VALUES
(1, 'TechFest', 'Hello ', 'upload/—Pngtree—children reading book_3634303.png', '2022-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE `resource` (
  `re_id` int(20) NOT NULL,
  `re_name` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resource`
--

INSERT INTO `resource` (`re_id`, `re_name`, `description`) VALUES
(2, 'Lab', 'no '),
(4, 'Class', 'no'),
(5, 'Workshop', 'this resource only for engg students.');

-- --------------------------------------------------------

--
-- Table structure for table `sem`
--

CREATE TABLE `sem` (
  `s_id` int(11) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `s_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sem`
--

INSERT INTO `sem` (`s_id`, `dep_id`, `c_id`, `s_name`) VALUES
(1, 1, 3, 'SEM 1'),
(2, 1, 3, 'SEM 2'),
(3, 2, 6, 'SEM 1'),
(4, 2, 6, 'SEM 2'),
(5, 1, 3, 'SEM 4'),
(7, 3, 7, 'SEM 1');

-- --------------------------------------------------------

--
-- Table structure for table `student_reg`
--

CREATE TABLE `student_reg` (
  `student_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `enroll_no` varchar(20) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `city` varchar(10) NOT NULL,
  `state` varchar(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `couse` varchar(20) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `status` int(5) NOT NULL DEFAULT 0 COMMENT '0 deactive 1 active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_reg`
--

INSERT INTO `student_reg` (`student_id`, `name`, `enroll_no`, `phone`, `address`, `email`, `password`, `city`, `state`, `semester`, `couse`, `branch`, `status`) VALUES
(1, 'Alok Rathava', '18520452363', 9512334819, '301-sai aprtment', 'alokrathava@gmail.com', 'alokrathava', 'Vadodara', 'Gujarat', 1, 'Computer science', 'BE', 1),
(2, 'radhika', '15428525262', 120120455620, 'chandod', 'rp@gmail.com', '123', 'Vadodara', 'Gujarat', 2, 'Mechnical', 'Diploma', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` int(20) NOT NULL,
  `sem_id` int(20) NOT NULL,
  `dep_id` int(20) NOT NULL,
  `c_id` int(20) NOT NULL,
  `sub_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `sem_id`, `dep_id`, `c_id`, `sub_name`) VALUES
(1, 1, 1, 3, 'Electron Data'),
(2, 1, 1, 3, 'Mathmatical formula'),
(3, 3, 2, 6, 'Anatomy'),
(4, 4, 2, 6, 'Botny'),
(5, 7, 3, 7, 'Maths');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_reg`
--

CREATE TABLE `teacher_reg` (
  `teacher_id` int(11) NOT NULL,
  `t_name` varchar(30) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(10) NOT NULL,
  `courses` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `status` int(5) NOT NULL DEFAULT 0 COMMENT '0 deactive 1 active\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_reg`
--

INSERT INTO `teacher_reg` (`teacher_id`, `t_name`, `phone`, `address`, `email`, `password`, `city`, `state`, `courses`, `branch`, `status`) VALUES
(1, 'JIGAR', 879978987, 'NA                        ', 'ABC@GMAIL.COM', '1', 'vadodara', 'gujarat', 'Compurter science', 'BE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `time_slots`
--

CREATE TABLE `time_slots` (
  `slots_id` int(20) NOT NULL,
  `time` varchar(25) NOT NULL,
  `s_time` time NOT NULL,
  `e_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_slots`
--

INSERT INTO `time_slots` (`slots_id`, `time`, `s_time`, `e_time`) VALUES
(1, '1 hour', '14:00:00', '15:00:00'),
(2, '1 hours', '22:00:00', '23:00:00'),
(3, '45 min', '13:00:00', '14:45:00'),
(4, '1 hour', '00:00:00', '00:00:00'),
(5, '30 MIn', '15:30:00', '16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `time_table`
--

CREATE TABLE `time_table` (
  `t_id` int(11) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `res_id` int(11) NOT NULL,
  `time_slot` varchar(50) NOT NULL,
  `day` varchar(100) NOT NULL,
  `tech_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_table`
--

INSERT INTO `time_table` (`t_id`, `dep_id`, `c_id`, `sem_id`, `sub_id`, `res_id`, `time_slot`, `day`, `tech_id`) VALUES
(1, 1, 3, 1, 1, 2, '1', 'Monday', 1),
(2, 1, 3, 1, 2, 4, '2', 'Monday', 1),
(3, 3, 7, 7, 5, 4, '1', 'Tuesday', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `deparment`
--
ALTER TABLE `deparment`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `resource`
--
ALTER TABLE `resource`
  ADD PRIMARY KEY (`re_id`);

--
-- Indexes for table `sem`
--
ALTER TABLE `sem`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `student_reg`
--
ALTER TABLE `student_reg`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `teacher_reg`
--
ALTER TABLE `teacher_reg`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `time_slots`
--
ALTER TABLE `time_slots`
  ADD PRIMARY KEY (`slots_id`);

--
-- Indexes for table `time_table`
--
ALTER TABLE `time_table`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `deparment`
--
ALTER TABLE `deparment`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `resource`
--
ALTER TABLE `resource`
  MODIFY `re_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sem`
--
ALTER TABLE `sem`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_reg`
--
ALTER TABLE `student_reg`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher_reg`
--
ALTER TABLE `teacher_reg`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `time_slots`
--
ALTER TABLE `time_slots`
  MODIFY `slots_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `time_table`
--
ALTER TABLE `time_table`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
