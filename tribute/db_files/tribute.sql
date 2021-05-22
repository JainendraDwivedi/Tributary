-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2021 at 08:39 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tribute`
--

-- --------------------------------------------------------

--
-- Table structure for table `tributes`
--

CREATE TABLE `tributes` (
  `tribute_id` int(11) NOT NULL,
  `tribute_person_name` varchar(100) NOT NULL,
  `date_of_birth` datetime NOT NULL,
  `date_passed_away` datetime NOT NULL,
  `tribute_content` text NOT NULL,
  `tribute_image_name` varchar(300) NOT NULL,
  `tribute_count` int(11) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tributes`
--

INSERT INTO `tributes` (`tribute_id`, `tribute_person_name`, `date_of_birth`, `date_passed_away`, `tribute_content`, `tribute_image_name`, `tribute_count`, `created_date`) VALUES
(1, 'Ram Manohar', '1968-06-19 00:00:00', '2021-05-12 00:00:00', 'Test data', 'Dynamite.png', 9, '2021-05-21 23:10:46'),
(2, 'Ram Khelawan', '1967-08-25 00:00:00', '2021-05-14 00:00:00', 'Test data', '768px-Mangekyou_Sharingan_Sasuke_(Eternal).svg.png', 4, '2021-05-21 23:39:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tributes`
--
ALTER TABLE `tributes`
  ADD PRIMARY KEY (`tribute_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tributes`
--
ALTER TABLE `tributes`
  MODIFY `tribute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
