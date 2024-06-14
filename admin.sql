-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2024 at 08:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `adding components`
--

CREATE TABLE `adding components` (
  `Sr. Number` int(240) NOT NULL,
  `Components_Name` varchar(5000) CHARACTER SET cp1256 COLLATE cp1256_general_ci NOT NULL,
  `Componets_Quantity` int(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adding components`
--

INSERT INTO `adding components` (`Sr. Number`, `Components_Name`, `Componets_Quantity`) VALUES
(1, 'Arduino Uno', 15),
(2, 'DHT11', 20);

-- --------------------------------------------------------

--
-- Table structure for table `drone`
--

CREATE TABLE `drone` (
  `id` int(11) NOT NULL,
  `componet` varchar(50) NOT NULL,
  `quantities` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drone`
--

INSERT INTO `drone` (`id`, `componet`, `quantities`, `status`) VALUES
(1, 'BLDC', '3', 1),
(2, 'Propellor', '700 ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `electonics`
--

CREATE TABLE `electonics` (
  `id` int(11) NOT NULL,
  `componet` varchar(50) NOT NULL,
  `quantities` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `electonics`
--

INSERT INTO `electonics` (`id`, `componet`, `quantities`, `status`) VALUES
(1, 'IC', '22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `microcontrollars`
--

CREATE TABLE `microcontrollars` (
  `id` int(11) NOT NULL,
  `componet` varchar(50) NOT NULL,
  `quantities` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `microcontrollars`
--

INSERT INTO `microcontrollars` (`id`, `componet`, `quantities`, `status`) VALUES
(32, 'Arduino', '0', 1),
(34, 'Rassberrypie', '132', 1),
(35, 'nano', '90', 1);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `account_holder_name` varchar(100) NOT NULL,
  `component_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `request_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `account_holder_name`, `component_name`, `quantity`, `request_date`, `status`) VALUES
(1, 'John Doe', 'Arduino', 10, '2024-05-08 07:06:02', 'Rejected'),
(2, 'Harsh', 'Arduino', 20, '2024-05-08 07:08:02', 'Rejected'),
(3, 'Harsh', 'Arduino', 10, '2024-05-08 07:23:53', 'Rejected'),
(4, 'Harsh', 'Arduino', 8, '2024-05-08 08:10:28', 'Rejected'),
(5, 'Harsh', 'Arduino', 12, '2024-05-08 08:20:20', 'Rejected'),
(6, 'Harsh', 'Arduino', 50, '2024-05-08 08:35:07', 'Approved'),
(7, 'Harsh', 'Arduino', 60, '2024-05-08 08:36:52', 'Approved'),
(8, 'Harsh', 'UltraSonic', 12, '2024-05-08 08:40:50', 'Rejected'),
(9, 'Harsh', 'Arduino', 2, '2024-05-08 08:49:34', 'Approved'),
(10, 'Harsh', 'UltraSonic', 12, '2024-05-08 08:50:05', 'Rejected'),
(11, 'Harsh', 'IC', 12, '2024-05-08 08:50:22', 'Approved'),
(12, 'Harsh', 'BLDC', 12, '2024-05-08 08:51:07', 'Rejected'),
(13, 'Harsh', 'Arduino', 10, '2024-05-08 08:58:46', 'Approved'),
(14, 'Harsh', 'Arduino', 12, '2024-05-08 09:04:10', 'Rejected'),
(15, 'Harsh', 'Arduino', 12, '2024-05-08 09:06:04', 'Approved'),
(16, 'Harsh', 'Arduino', 10, '2024-05-08 09:06:13', 'Rejected'),
(17, 'Harsh', 'Arduino', 25, '2024-05-08 09:19:19', 'Approved'),
(18, 'Harsh', 'Arduino', 12, '2024-05-08 09:25:42', 'Approved'),
(19, 'Harsh', 'Arduino', 12, '2024-05-08 09:27:53', 'Rejected'),
(20, 'Harsh', 'ESP8266', 12, '2024-05-08 09:28:07', 'Rejected'),
(21, 'Harsh', 'ESP8266', 12, '2024-05-08 09:28:10', 'Approved'),
(22, 'Harsh', 'Arduino', 12, '2024-05-08 09:29:13', 'Approved'),
(23, 'Harsh', 'Arduino', 100, '2024-05-08 09:29:38', 'Approved'),
(24, 'Harsh', 'Rassberrypie', 100, '2024-05-08 09:30:22', 'Approved'),
(25, 'Harsh', 'Arduino', 350, '2024-05-08 09:43:33', 'Approved'),
(26, 'Harsh', 'Rassberrypie', 10, '2024-05-08 10:03:34', 'Approved'),
(27, 'Harsh', 'nano', 10, '2024-05-08 10:06:19', 'Approved'),
(28, 'Harsh', 'Rassberrypie', 20, '2024-05-08 10:12:46', 'Approved'),
(29, 'Harsh', 'Rassberrypie', 200, '2024-05-08 10:13:13', NULL),
(30, 'Harsh', 'Rassberrypie', 10, '2024-05-08 10:54:41', 'Approved'),
(31, 'Harsh', 'Rassberrypie', 1, '2024-05-08 16:38:16', NULL),
(32, 'Harsh', 'UltraSonic', 1, '2024-05-08 17:21:38', NULL),
(33, 'Harsh', 'UltraSonic', 1, '2024-05-08 17:23:27', NULL),
(34, 'Harsh', 'UltraSonic', 1, '2024-05-08 17:24:03', NULL),
(35, 'Ritesh', 'Rassberrypie', 1, '2024-05-08 17:56:39', 'Approved'),
(36, 'Ritesh', 'Rassberrypie', 2, '2024-05-08 18:01:17', NULL),
(37, 'Harsh', 'Rassberrypie', 1, '2024-05-08 18:02:31', NULL),
(38, 'Harsh', 'Rassberrypie', 12, '2024-05-08 18:03:09', NULL),
(39, 'Harsh', 'UltraSonic', 1, '2024-05-08 18:14:41', NULL),
(40, 'Harsh', 'UltraSonic', 5, '2024-05-08 18:15:08', NULL),
(41, 'Harsh', 'Rassberrypie', 1, '2024-05-08 18:18:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sensors`
--

CREATE TABLE `sensors` (
  `id` int(11) NOT NULL,
  `componet` varchar(50) NOT NULL,
  `quantities` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sensors`
--

INSERT INTO `sensors` (`id`, `componet`, `quantities`, `status`) VALUES
(1, 'UltraSonic', '1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adding components`
--
ALTER TABLE `adding components`
  ADD PRIMARY KEY (`Sr. Number`);

--
-- Indexes for table `drone`
--
ALTER TABLE `drone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `electonics`
--
ALTER TABLE `electonics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `microcontrollars`
--
ALTER TABLE `microcontrollars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sensors`
--
ALTER TABLE `sensors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adding components`
--
ALTER TABLE `adding components`
  MODIFY `Sr. Number` int(240) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `drone`
--
ALTER TABLE `drone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `electonics`
--
ALTER TABLE `electonics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `microcontrollars`
--
ALTER TABLE `microcontrollars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `sensors`
--
ALTER TABLE `sensors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
