-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2021 at 08:17 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `long_link` varchar(200) NOT NULL,
  `short_link` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `user_id`, `long_link`, `short_link`, `created_at`) VALUES
(7, 12, 'www.qazvinfood.com', 'jDhyZ8pP', '2021-07-15 14:05:47'),
(8, 12, 'www.google.com', 'BVrAMf0U', '2021-07-15 14:39:35'),
(9, 12, 'www.varzesh3.com', 'LkNbeg0T', '2021-07-15 14:58:26'),
(10, 12, 'www.aparat.com', 'CPuvkmSh', '2021-07-15 15:38:37'),
(11, 12, 'www.php.net', 'sPPGR8lf', '2021-07-15 15:39:46'),
(12, 12, 'www.laravel.com', 'lNFXCFe3', '2021-07-15 15:42:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirm_password` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `type`, `email`, `password`, `confirm_password`, `created_at`) VALUES
(8, 'test', 'admin', 'test@gmail.com', '25d55ad283aa400af464c76d713c07ad', '', '2021-07-15 13:28:40'),
(9, 'matin', '', 'matin@gmail.com', '25d55ad283aa400af464c76d713c07ad', '', '2021-07-15 12:22:08'),
(10, 'leila', '', 'leila@gmail.com', '25d55ad283aa400af464c76d713c07ad', '', '2021-07-15 12:27:45'),
(11, 'matin1', '', 'matin1@gmail.com', '25d55ad283aa400af464c76d713c07ad', '', '2021-07-15 12:28:26'),
(12, 'matin2', '', 'matin2@gmail.com', '25d55ad283aa400af464c76d713c07ad', '', '2021-07-15 13:38:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `link_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `links`
--
ALTER TABLE `links`
  ADD CONSTRAINT `link_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
