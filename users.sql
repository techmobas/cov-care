-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2021 at 02:38 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `vaccine` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `vaccine`, `created_at`) VALUES
(1, 'test123', '$2y$10$fKyN2zdI5CKoMmCN2cPOjO7TOGWxnjn0RmEngcBLnnwvoXHiWsMW.', 'Sinovac', '2021-04-11 03:18:54'),
(2, 'asd123', '$2y$10$qzpoSHSSZgjy.sQFyZO6xODmWWRB2XZ7JhA6M.UH.SUjsH1cm37Gu', 'Sinovac', '2021-04-11 03:20:55'),
(3, 'asdf123', '$2y$10$MdVoU1AvuPZejBvD6ZN1X.GZiUwpPYAcCyYHlueGbXWzJzei2o/ja', 'Sinovac', '2021-04-11 03:23:28'),
(4, 'gdfg123', '$2y$10$Bf0wg4xcpVXlylEktPhj0.2PRNjRnbXI.v5BsnOjBOemFxUTd6Bpq', 'AstraZeneca', '2021-04-11 03:23:45'),
(5, 'aaa123', '$2y$10$CVQ2mRAU93H3HzLR7sHAmukzzwK0P9YgMeHrvG2Q7xN7FNb6AvftO', 'Sinovac', '2021-04-11 03:41:22'),
(9, 'sebas', '$2y$10$MIqa3Z.KJQZg1g.iXldgM.0jjpSYgECV4EMyIjKyqua0ITFkw0Zt.', 'Pfizer', '2021-04-11 16:33:58'),
(10, 'covcareuser', '$2y$10$0y.8Eyonf1/d4VIR1R4gVOFjKUiJDCzaY8XuyO2gRKAwKyfDA/wHK', 'AstraZeneca', '2021-04-11 19:30:36'),
(13, 'covcareuser2', '$2y$10$O3jKda1BuSKOlzGklGe8C.2aDs.iuOPRCHtAIz3TO3fsra5rB6qzO', 'Sinovac', '2021-04-13 21:57:42'),
(14, 'covcareuser0', '$2y$10$DKvF1d8F9hRG89iENXy0iOSe0s3YslqGDztVa8g30dghTUPh1LWnS', 'AstraZeneca', '2021-04-27 17:09:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
