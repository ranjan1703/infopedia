-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2017 at 06:01 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sams`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE `tbl_attendance` (
  `id` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `attend` varchar(255) NOT NULL,
  `att_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`id`, `roll`, `attend`, `att_time`) VALUES
(1, 11, 'absent', '2017-07-18'),
(2, 15, 'present', '2017-07-18'),
(3, 27, 'absent', '2017-07-18'),
(4, 12, 'present', '2017-07-18'),
(5, 10, 'absent', '2017-07-18'),
(6, 13, 'present', '2017-07-18'),
(7, 16, 'absent', '2017-07-18'),
(8, 17, 'present', '2017-07-18'),
(9, 11, 'present', '2017-07-19'),
(10, 15, 'absent', '2017-07-19'),
(11, 27, 'present', '2017-07-19'),
(12, 12, 'absent', '2017-07-19'),
(13, 10, 'present', '2017-07-19'),
(14, 13, 'absent', '2017-07-19'),
(15, 16, 'present', '2017-07-19'),
(16, 14, 'absent', '2017-07-19'),
(17, 17, 'present', '2017-07-19'),
(18, 11, 'present', '2017-07-17'),
(19, 15, 'absent', '2017-07-17'),
(20, 27, 'present', '2017-07-17'),
(21, 12, 'absent', '2017-07-17'),
(22, 10, 'present', '2017-07-17'),
(23, 13, 'absent', '2017-07-17'),
(24, 16, 'present', '2017-07-17'),
(25, 14, 'absent', '2017-07-17'),
(26, 17, 'present', '2017-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `roll` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `name`, `roll`) VALUES
(1, 'Bhaskar Banerjee', 11),
(2, 'Rupsekher Roy', 15),
(3, 'Sudip Sadhukhan', 27),
(4, 'Prapti Mitra', 12),
(5, 'Parama Mukhopadhay', 10),
(6, 'Sourav Panchal', 13),
(7, 'Baljeet Singh', 16),
(8, 'Manojit Chakraborty', 14),
(9, 'Soumydeep Saha', 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roll` (`roll`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
