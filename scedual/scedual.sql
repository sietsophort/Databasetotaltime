-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 15, 2017 at 01:49 AM
-- Server version: 5.5.49-log
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scedual`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE IF NOT EXISTS `time` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `timein` time DEFAULT NULL,
  `timeout` time DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `totalhours` varchar(50) NOT NULL,
  `date` date DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`id`, `name`, `timein`, `timeout`, `status`, `totalhours`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Jacky', '09:00:00', '19:00:00', 'Full time', '8.30', '2017-08-11', '2017-08-14', '2017-08-14'),
(2, 'Harry', '08:00:00', '11:30:00', 'Part time', '3.30', '2017-08-11', '2017-08-14', '2017-08-14'),
(3, 'HookSmith', '08:30:00', '17:30:00', 'Full time', '7.30', '2017-08-11', '2017-08-14', '2017-08-14'),
(4, 'Richie', '08:00:00', '18:00:00', 'Full time', '8.30', '2017-08-11', '2017-08-14', '2017-08-14'),
(5, 'Mario', '09:00:00', '19:00:00', 'Full time', '8.30', '2017-08-11', '2017-08-14', '2017-08-14'),
(6, 'Remi', '08:00:00', '17:00:00', 'Full time', '7.30', '2017-08-11', '2017-08-14', '2017-08-14'),
(7, 'Cody', NULL, NULL, 'Permission', '0', '2017-08-11', '2017-08-14', '2017-08-14'),
(8, 'Martin', NULL, NULL, 'Permission', '0', '2017-08-11', '2017-08-14', '2017-08-14'),
(9, 'Henry', '08:25:00', '18:00:00', 'Full time', '8.5', '2017-08-11', '2017-08-14', '2017-08-14'),
(10, 'Peter', '09:00:00', '18:00:00', 'Full time', '7.30', '2017-08-11', '2017-08-14', '2017-08-14'),
(11, 'Sean', '08:45:00', '12:00:00', 'Part time', '3.15', '2017-08-11', '2017-08-14', '2017-08-14'),
(12, 'Johnny', '08:05:00', '18:30:00', 'Full time', '8.55', '2017-08-11', '2017-08-14', '2017-08-14'),
(13, 'Vincent', '09:00:00', '17:00:00', 'Full time', '6.30', '2017-08-11', '2017-08-14', '2017-08-14'),
(14, 'Kevin', '08:40:00', '19:00:00', 'Full time', '8.50', '2017-08-11', '2017-08-14', '2017-08-14'),
(15, 'Ben', '08:35:00', '18:30:00', 'Full time', '8.24', '2017-08-11', '2017-08-14', '2017-08-14'),
(16, 'Kimberly', '08:00:00', '18:15:00', 'Full time', '8.45', '2017-08-11', '2017-08-14', '2017-08-14'),
(17, 'Sony', '08:15:00', '19:00:00', 'Full time', '9.15', '2017-08-11', '2017-08-14', '2017-08-14'),
(18, 'Masha', '09:15:00', '18:00:00', 'Full time', '7.15', '2017-08-11', '2017-08-14', '2017-08-14'),
(19, 'July', '08:20:00', '17:30:00', 'Full time', '7.39', '2017-08-11', '2017-08-14', '2017-08-14'),
(20, 'Gigi', '08:00:00', '11:35:00', 'Part time', '3.35', '2017-08-11', '2017-08-14', '2017-08-14'),
(21, 'Biya', '00:00:00', '00:00:00', 'Permission', '0', '2017-08-11', '2017-08-14', '2017-08-14'),
(23, 'test', NULL, NULL, 'Permission', '0', NULL, '2017-08-14', '2017-08-14'),
(24, 'biya', NULL, NULL, 'Permission', '0', '2017-08-14', '2017-08-14', '2017-08-14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'mao.chenda60@gmail.com', '$2y$10$uDonqk0bcrIXvkQGElRb5.r5bfxlrVONdcPy4eo5O13xHSqcvKdIO', 'Tw3xs7amN6gM6Ua6g6DhP2ENuFOShLw81WUNRdiolF8VBvsSRu7jEWl4OX5a', '2017-08-03 00:38:28', '2017-08-03 00:38:28'),
(2, 'ka', 'ka@gmail.com', '$2y$10$vOllvJu/rBy/eilizKOPaOSObB4sQ0KRbs8qj0AlOXJydZjXKJ8/W', 'sOxPau2m1Rdm2ZVt3PlcqTUr6qp3MsCcLHlhaf7jPwmdMm2ZTzWag1yX2Smh', '2017-08-04 03:07:53', '2017-08-04 03:07:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
