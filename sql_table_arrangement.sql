-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2022 at 02:55 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `cnt_id` int(11) NOT NULL,
  `cnt_name` varchar(100) NOT NULL,
  `cnt_uname` varchar(50) NOT NULL,
  `cnt_phone` varchar(10) NOT NULL,
  `cnt_email` varchar(50) NOT NULL,
  `cnt_address` varchar(250) NOT NULL,
  `cnt_gender` tinyint(4) NOT NULL,
  `cnt_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=>inactive 1=> active',
  `cnt_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `cnt_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`cnt_id`, `cnt_name`, `cnt_uname`, `cnt_phone`, `cnt_email`, `cnt_address`, `cnt_gender`, `cnt_status`, `cnt_created_at`, `cnt_image`) VALUES
(17, 'varun', 'vv', '2850506487', 'priyam9800@gmail.com', 'Roop Darpan, J.P. Market, Neamatpur', 2, 0, '2022-01-12 17:36:50', 'IMG61e7c2993366b9.78758792.jpeg'),
(21, 'varun', 'vv', '1524125412', 'v@gmail.com', 'pp', 1, 1, '2022-01-14 09:40:00', 'IMG61e144f0b6a2e3.12834845.jpeg'),
(22, 'rahul', 'kum', '1452147852', 'rahul@gmail.com', 'ret', 1, 1, '2022-01-17 06:37:40', 'IMG61e50eb4e47287.75353966.jpeg'),
(24, 'varun', 'gg12', '9876543212', 'g@gmail.com', 'polit', 1, 1, '2022-01-17 09:11:13', 'IMG61e532b189a678.12413246.jpeg'),
(26, 'varun', 'vv', '1524125412', 'v@gmail.com', '123', 1, 1, '2022-01-21 09:14:28', 'IMG61ea797449e7e5.25373067.png'),
(27, 'Priyam Goenka', 'ww', '0850506487', 'priyam9800@gmail.com', 'Roop Darpan, J.P. Market, Neamatpur', 1, 1, '2022-01-24 08:34:20', 'IMG61ee648cd88c55.11855929.jpg'),
(28, 'Priyam Goenka', 'ww', '0850506487', 'priyam9800@gmail.com', 'Roop Darpan, J.P. Market, Neamatpur', 1, 1, '2022-01-24 08:34:51', 'IMG61ee64ab359501.74019417.jpg'),
(29, 'Priyam Goenka', 'ww', '0850506487', 'priyam9800@gmail.com', 'Roop Darpan, J.P. Market, Neamatpur', 1, 1, '2022-01-24 08:35:34', 'IMG61ee64d6850652.12514460.jpg'),
(30, '', '', '', '', '', 0, 1, '2022-01-24 08:47:47', 'IMG61ee67b39ac5f9.96149666.jpg'),
(31, 'Priyam Goenka', 'ww', '0850506487', 'priyam9800@gmail.com', 'Roop Darpan, J.P. Market, Neamatpur', 1, 1, '2022-01-24 09:02:54', 'IMG61ee6b3e70fde1.08480097.jpg'),
(32, 'Priyam Goenka', 'ww', '0850506487', 'priyam9800@gmail.com', 'Roop Darpan, J.P. Market, Neamatpur', 1, 1, '2022-01-24 09:07:38', 'IMG61ee6c5a28fd37.34718054.jpg'),
(33, 'Priyam Goenka', 'ww', '0850506487', 'priyam9800@gmail.com', 'Roop Darpan, J.P. Market, Neamatpur', 1, 1, '2022-01-24 09:53:55', 'IMG61ee773363a4b7.64248460.jpg'),
(34, 'Priyam Goenka', 'ww', '0850506487', 'priyam9800@gmail.com', 'Roop Darpan, J.P. Market, Neamatpur', 1, 1, '2022-01-24 10:50:54', 'IMG61ee848e3a85c0.84718376.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact_followup`
--

CREATE TABLE `contact_followup` (
  `cnf_id` int(11) NOT NULL,
  `cnf_cnt_id` int(11) NOT NULL,
  `cnf_followup_status` int(11) NOT NULL COMMENT '0=>Responded,\r\n1=>Not Responded,\r\n2=>Contact Closed,\r\n3=>Call Transferred,\r\n4=>Ride Booked,\r\n5=>Ride completed,\r\n6=>Ride Complain/Refund,\r\n7=>Driver Complain',
  `cnf_next_followup_date` date DEFAULT NULL,
  `cnf_followup_transfer` int(11) DEFAULT NULL,
  `cnf_details` varchar(500) DEFAULT NULL,
  `cnf_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `cnf_created_by` varchar(20) NOT NULL,
  `cnf_status` int(11) NOT NULL DEFAULT 1 COMMENT '1=>active, 0=>inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_followup`
--

INSERT INTO `contact_followup` (`cnf_id`, `cnf_cnt_id`, `cnf_followup_status`, `cnf_next_followup_date`, `cnf_followup_transfer`, `cnf_details`, `cnf_created_at`, `cnf_created_by`, `cnf_status`) VALUES
(3, 17, 4, '2022-01-23', 1234, 'ride', '2022-01-19 11:53:11', 'p123', 1),
(4, 17, 5, '2022-01-24', 1234, 'done', '2022-01-19 11:54:36', 'p123', 1),
(5, 17, 7, '2022-01-23', 0, 'very annoying', '2022-01-19 13:19:04', 'p123', 1),
(8, 17, 1, '2022-01-23', 12121, 'call', '2022-01-21 14:46:03', 'p123', 1),
(9, 17, 3, '2022-01-19', 12121, '123', '2022-01-21 16:42:31', 'p123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_cnt_id` int(11) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `emp_uname` varchar(30) NOT NULL,
  `emp_password` varchar(30) NOT NULL,
  `emp_phone` varchar(10) NOT NULL,
  `emp_email` varchar(50) NOT NULL,
  `emp_addhar_number` int(20) NOT NULL,
  `emp_pan_number` varchar(20) NOT NULL,
  `emp_picture` varchar(100) NOT NULL,
  `emp_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `emp_status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=>inactive, 1=>active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_cnt_id`, `emp_name`, `emp_uname`, `emp_password`, `emp_phone`, `emp_email`, `emp_addhar_number`, `emp_pan_number`, `emp_picture`, `emp_created_date`, `emp_status`) VALUES
(1, 1234, 'varun', 'p123', 'MTIz', '0987654345', 'v@gmail.com', 2147483647, 'PID87987898', 'IMG61e79e8fd11169.28898378.jpeg', '2022-01-19 10:45:59', 1),
(2, 12121, 'Priyam Goenka', 'Priyam', 'MTIz', '1542875412', 'p@gmail.com', 2147483647, 'PID542654345', 'IMG61e7c3d9798b13.89630460.jpeg', '2022-01-19 13:25:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee_log`
--

CREATE TABLE `employee_log` (
  `log_id` int(11) NOT NULL,
  `log_emp_id` int(11) NOT NULL,
  `log_event` int(3) NOT NULL COMMENT '1=>emp login,\r\n2=>contact updated,\r\n3=>contact activated,\r\n4=>contact deactivated,\r\n5=>contact deleted,\r\n6=>created follow-up\r\n7=>emp logout\r\n8=>emp registered',
  `log_edited_cnt_id` int(11) DEFAULT NULL,
  `log_event_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_log`
--

INSERT INTO `employee_log` (`log_id`, `log_emp_id`, `log_event`, `log_edited_cnt_id`, `log_event_time`) VALUES
(3, 1234, 1, 0, '2022-01-21 16:34:41'),
(4, 1234, 7, NULL, '2022-01-21 16:37:59'),
(5, 1234, 1, NULL, '2022-01-21 16:38:14'),
(6, 0, 3, 17, '2022-01-21 16:38:22'),
(7, 1234, 4, 17, '2022-01-21 16:39:57'),
(8, 1234, 3, 18, '2022-01-21 16:40:28'),
(9, 1234, 5, 18, '2022-01-21 16:40:52'),
(10, 1234, 2, 17, '2022-01-21 16:42:06'),
(11, 0, 6, 17, '2022-01-21 16:42:31'),
(12, 1234, 1, NULL, '2022-01-23 23:14:23'),
(13, 1234, 1, NULL, '2022-01-24 10:16:35'),
(14, 1234, 1, NULL, '2022-01-24 10:18:32'),
(15, 1234, 1, NULL, '2022-01-24 10:24:45'),
(16, 1234, 1, NULL, '2022-01-24 10:27:54'),
(17, 1234, 7, NULL, '2022-01-24 10:38:44'),
(18, 1234, 1, NULL, '2022-01-24 11:18:24'),
(19, 1234, 7, NULL, '2022-01-24 13:58:23'),
(20, 1234, 1, NULL, '2022-01-24 15:22:08'),
(21, 1234, 7, NULL, '2022-01-24 15:23:22'),
(22, 1234, 1, NULL, '2022-01-24 16:21:35'),
(23, 1234, 7, NULL, '2022-01-24 16:21:41'),
(24, 1234, 1, NULL, '2022-01-28 15:02:23'),
(25, 1234, 2, 21, '2022-01-28 15:16:14'),
(26, 1234, 7, NULL, '2022-01-28 15:16:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`cnt_id`);

--
-- Indexes for table `contact_followup`
--
ALTER TABLE `contact_followup`
  ADD PRIMARY KEY (`cnf_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD UNIQUE KEY `emp_id` (`emp_id`);

--
-- Indexes for table `employee_log`
--
ALTER TABLE `employee_log`
  ADD PRIMARY KEY (`log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `cnt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `contact_followup`
--
ALTER TABLE `contact_followup`
  MODIFY `cnf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_log`
--
ALTER TABLE `employee_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
