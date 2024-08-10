-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2024 at 04:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jspl`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_mang`
--

CREATE TABLE `user_mang` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `signature` longblob NOT NULL,
  `authority_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_mang`
--

INSERT INTO `user_mang` (`id`, `username`, `password`, `user`, `user_type`, `email`, `signature`, `authority_name`) VALUES
(1, 'rahulsingh09638', '123456', '', 'admin', 'kumar.prince2022@vitstudent.ac.in', '', ''),
(2, 'quality', '123', '', 'quality', 'rahulsingh09638@gmail.com', '', ''),
(3, 'kit', '1234', '', 'rsc', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_mang`
--
ALTER TABLE `user_mang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_mang`
--
ALTER TABLE `user_mang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
