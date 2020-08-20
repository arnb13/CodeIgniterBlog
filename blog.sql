-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2020 at 12:26 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `body`, `author`, `time`, `slug`) VALUES
(3, 'New Blog', 'this is the body of new blog', 'new author', '2020-08-19 21:07:53', 'New Blog'),
(10, 'admin blog', 'body of admin blog\r\n', 'Nafis Hasrat Arnob', '2020-08-21 01:12:02', 'admin blog'),
(15, 'new blog user 2', 'new blog', 'New User 2', '2020-08-21 03:12:29', 'new blog user 2'),
(17, 'user 3 blog', 'new user 3 blog body new user 3 blog body', 'new user 3 ', '2020-08-21 04:23:33', 'user 3 blog');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `joined` datetime NOT NULL DEFAULT current_timestamp(),
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `joined`, `is_admin`) VALUES
(1, 'Nafis Hasrat Arnob', 'arnb13@gmail.com', '$2y$10$5OqgliCkeD8D/I4Y5As.Z.2UEwMcFKMdyadsUVM90GH7e8H.68xay', '2020-08-20 05:29:11', 1),
(7, 'User 1 name', 'user1@gmail.com', '$2y$10$cPcQm0A4lO2nNzm0nMOVgO7wDq/bmg6DcYmBp.YxkDexHYoPLlZ.e', '2020-08-20 05:27:50', 0),
(12, 'New User 22', 'user2@gmail.com', '$2y$10$WAbOWHZFUwENckn8798aKe2cQn.cvg.HXrWN5ySCrQFaMf1eyH2nm', '2020-08-21 03:10:51', 0),
(13, 'new user 3 ', 'user3@gmail.com', '$2y$10$koHnft6GCJblWqCNpogMmux6jG5UNo0wavAMd2p4Zf/GogneKYZeW', '2020-08-21 04:22:43', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
