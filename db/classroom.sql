-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2021 at 05:31 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

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
('admin', 'admin'),
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `f_id` int(5) NOT NULL,
  `a_id` int(5) NOT NULL,
  `t_id` int(5) NOT NULL,
  `s_id` int(5) NOT NULL,
  `f_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`f_id`, `a_id`, `t_id`, `s_id`, `f_path`) VALUES
(1, 1, 1, 1, '42ea480ea7e2c61d34d85fe0e3c48809'),
(2, 1, 1, 1, 'cab54afc799741003aed34f296caecb4png'),
(3, 1, 1, 1, '466f4731fb8a05367869bdaca075619d.png'),
(4, 1, 1, 1, '../uploads/'),
(5, 1, 1, 1, '../uploads/d2974b932a3be5108ad2687015fe080b.png');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(5) NOT NULL,
  `st_no` int(5) NOT NULL,
  `attendance` varchar(10) NOT NULL COMMENT '0-present\r\n1-absent',
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `st_no`, `attendance`, `date`) VALUES
(1, 1, '0', '2021-03-02'),
(2, 1, '0', '2021-03-22');

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
(7, 3, 'CS');

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
(3, 'MCA');

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
-- Table structure for table `new_assign`
--

CREATE TABLE `new_assign` (
  `na_id` int(11) NOT NULL,
  `na_title` varchar(50) NOT NULL,
  `na_desciption` varchar(255) NOT NULL,
  `t_id` int(11) NOT NULL,
  `dept_id` int(5) NOT NULL,
  `c_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_assign`
--

INSERT INTO `new_assign` (`na_id`, `na_title`, `na_desciption`, `t_id`, `dept_id`, `c_id`) VALUES
(1, 'Hello ', 'World ', 1, 1, 2);

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
(4, 'Class', '110'),
(5, 'Workshop', 'this resource only for engg students.'),
(6, 'Class', '101');

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
(7, 3, 7, 'SEM 1'),
(8, 1, 1, 'Sem 1'),
(9, 3, 7, 'SEM 2'),
(10, 1, 2, 'Sem 1');

-- --------------------------------------------------------

--
-- Table structure for table `student_reg`
--

CREATE TABLE `student_reg` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(30) NOT NULL,
  `s_enroll_no` varchar(20) NOT NULL,
  `s_phone` bigint(20) NOT NULL,
  `s_address` varchar(100) NOT NULL,
  `s_email` varchar(30) NOT NULL,
  `s_password` varchar(20) NOT NULL,
  `s_city` varchar(10) NOT NULL,
  `s_state` varchar(10) NOT NULL,
  `s_semester` int(10) NOT NULL,
  `s_department` int(10) NOT NULL,
  `s_course` int(10) NOT NULL,
  `status` int(5) NOT NULL DEFAULT 0 COMMENT '0 deactive 1 active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_reg`
--

INSERT INTO `student_reg` (`s_id`, `s_name`, `s_enroll_no`, `s_phone`, `s_address`, `s_email`, `s_password`, `s_city`, `s_state`, `s_semester`, `s_department`, `s_course`, `status`) VALUES
(1, 'Alok Rathava', '9512483438', 1248843, 'vad', 'alokrathava@gmail.com', 'admin', 'vad', 'guj ', 10, 3, 7, 0);

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
(5, 7, 3, 7, 'Maths'),
(6, 8, 1, 1, 'Marketing');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_reg`
--

CREATE TABLE `teacher_reg` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(30) NOT NULL,
  `t_phone` bigint(20) NOT NULL,
  `t_address` varchar(100) NOT NULL,
  `t_email` varchar(30) NOT NULL,
  `t_password` varchar(20) NOT NULL,
  `t_city` varchar(20) NOT NULL,
  `t_state` varchar(10) NOT NULL,
  `t_department` int(10) NOT NULL,
  `t_course` int(10) NOT NULL,
  `status` int(5) NOT NULL DEFAULT 0 COMMENT '0 deactive 1 active\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_reg`
--

INSERT INTO `teacher_reg` (`t_id`, `t_name`, `t_phone`, `t_address`, `t_email`, `t_password`, `t_city`, `t_state`, `t_department`, `t_course`, `status`) VALUES
(1, 'Wlok', 945439184, 'vad', 'al@gmail.com', 'admin', 'vad', 'guj', 1, 2, 0);

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
(1, 3, 7, 7, 5, 2, '2', 'Monday', 1),
(2, 3, 7, 7, 5, 4, '1', 'Friday', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`f_id`);

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
-- Indexes for table `new_assign`
--
ALTER TABLE `new_assign`
  ADD PRIMARY KEY (`na_id`);

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
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `teacher_reg`
--
ALTER TABLE `teacher_reg`
  ADD PRIMARY KEY (`t_id`);

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
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `f_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `new_assign`
--
ALTER TABLE `new_assign`
  MODIFY `na_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `resource`
--
ALTER TABLE `resource`
  MODIFY `re_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sem`
--
ALTER TABLE `sem`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_reg`
--
ALTER TABLE `student_reg`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teacher_reg`
--
ALTER TABLE `teacher_reg`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `time_slots`
--
ALTER TABLE `time_slots`
  MODIFY `slots_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `time_table`
--
ALTER TABLE `time_table`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
