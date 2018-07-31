-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2018 at 02:48 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ofms`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) UNSIGNED NOT NULL,
  `dept_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `dept_name`) VALUES
(1, 'CEO'),
(2, 'PA'),
(3, 'Managers'),
(4, 'Administrative'),
(5, 'Customer Care'),
(6, 'Marketing'),
(7, 'IT'),
(8, 'Front Desk');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `timeIn` varchar(100) NOT NULL,
  `date` varchar(50) NOT NULL,
  `summary` text NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'unread',
  `departmentId` int(11) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) UNSIGNED NOT NULL,
  `staff_id` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `staff_id`, `name`, `email`, `password`, `dept_id`, `level`) VALUES
(1, 'TIN011100', 'Abraham Tanta', 'tanta@tantainnovatives.com', 'tanta', 1, '5'),
(2, 'TIN011101', 'Obabueki Nosazeme', 'nosa@tantainnovatives.com', 'nosa', 7, '1'),
(3, 'TIN011106', 'Nwosu Kelechi', 'kelechi@tantainnovatives.com', 'kelechi', 7, '2'),
(4, 'TIN011107', 'Meduoye Oluwafemi', 'femi@tantainnovatives.com', 'femi', 7, '1'),
(5, 'TIN011103', 'Busola Gbemisola', 'busola@tantainnovatives.com', 'busola', 2, '4'),
(6, 'TIN011103', 'Ganiyu Gbolahan', 'gbolahan@tantainnovatives.com', 'gbolahan', 3, '3'),
(7, 'TIN011103', 'Ekpeyong Offiong', 'offiong@tantainnovatives.com', 'offiong', 3, '3'),
(8, 'TIN011103', 'Ipadeola Funmilayo', 'funmi@tantainnovatives.com', 'funmi', 5, '1'),
(9, 'TIN011103', 'Adediwura Gold', 'gold@tantainnovatives.com', 'gold', 6, '1'),
(10, 'TIN011103', 'Orjiakor Juliet', 'juliet@tantainnovatives.com', 'juliet', 8, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
