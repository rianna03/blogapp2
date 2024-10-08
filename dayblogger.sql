-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 07, 2024 at 12:31 PM
-- Server version: 8.0.39-0ubuntu0.24.04.2
-- PHP Version: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dayblogger`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'JOSEPH NYAGA', 'JOSEPHNYAGA@GMAIL.COM', 'nscrowler39@gmail.com', 'dsfghjkl;\\\'\\\";lkjhgfdghj', '2024-10-07 12:06:37'),
(2, 'nicholus munene', 'nscrowler339@gmail.com', 'from kingpower', 'sdfghjklkjhgfd', '2024-10-07 12:14:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_admin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `is_admin`) VALUES
(1, 'yourusername', 'nscrowler39@gmail.com', '$2y$10$Obz9WGKhkNB0Zm5TVXbGaeHlmXEtrLc8HjDsm/xrPza6/V30A.bDa', '2024-10-03 12:31:01', 0),
(2, 'admin', 'nscrowler339@gmail.com', '$2y$10$Id9GxGIA4F1VTSSY35WUR.7J4gH/oaAbT2YOAvWCzZ1SXW5qJKqee', '2024-10-03 12:38:58', 0),
(3, 'blogger', 'JOSEPHNYAGA@GMAIL.COM', '$2y$10$vX.F44fx4bggOysAXCWx4OUpfDRjTtJKJYd.C9FZh33St05OQ37S.', '2024-10-03 13:11:00', 0),
(4, 'blogger2', 'nscrowler339fd@gmail.com', '$2y$10$.evHtDXt2YvEhYKqr0j1BO8ZcOKxY47RC5oHhBXMmkUiq6V6n96w.', '2024-10-03 13:15:20', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;