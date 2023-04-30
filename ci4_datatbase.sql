-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2023 at 10:10 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `mobile`, `message`) VALUES
(1, 'Adewoye', 'uche.chukwu@grenvilleschool.com', 1234567890, 'sdf'),
(2, 'Micky', 'eathorne@yahoo.com', 1234567890, 'fghh'),
(3, 'Babajide Sanwolu', 'eathorne@yahoo.com', 1234567890, 'fgh');

-- --------------------------------------------------------

--
-- Table structure for table `login_activity`
--

CREATE TABLE `login_activity` (
  `id` int(11) NOT NULL,
  `uniid` varchar(32) NOT NULL,
  `agent` varchar(100) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `login_time` datetime NOT NULL,
  `logout_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login_activity`
--

INSERT INTO `login_activity` (`id`, `uniid`, `agent`, `ip`, `login_time`, `logout_time`) VALUES
(1, '5c860770fdbefc5768f6e081f01cfb1f', 'Firefox', '127.0.0.1', '2023-03-30 15:30:55', '2023-03-30 03:31:16'),
(2, '5c860770fdbefc5768f6e081f01cfb1f', 'Firefox', '127.0.0.1', '2023-03-30 15:31:23', '2023-03-30 03:42:48'),
(3, '5c860770fdbefc5768f6e081f01cfb1f', 'Firefox', '127.0.0.1', '2023-03-30 15:42:58', '2023-03-30 03:54:56'),
(4, '90222ded18f04e0c6850bc737f584b4a', 'Firefox', '127.0.0.1', '2023-03-30 15:55:14', '0000-00-00 00:00:00'),
(5, '5c860770fdbefc5768f6e081f01cfb1f', 'Firefox', '127.0.0.1', '2023-03-31 08:30:53', '0000-00-00 00:00:00'),
(6, '5c860770fdbefc5768f6e081f01cfb1f', 'Edge', '::1', '2023-04-01 19:52:45', '0000-00-00 00:00:00'),
(7, '5c860770fdbefc5768f6e081f01cfb1f', 'Firefox', '127.0.0.1', '2023-04-05 09:06:59', '0000-00-00 00:00:00'),
(8, '5c860770fdbefc5768f6e081f01cfb1f', 'Firefox', '127.0.0.1', '2023-04-30 09:02:23', '2023-04-30 09:02:28'),
(9, '5c860770fdbefc5768f6e081f01cfb1f', 'Firefox', '127.0.0.1', '2023-04-30 09:02:40', '2023-04-30 09:03:13'),
(10, '5c860770fdbefc5768f6e081f01cfb1f', 'Firefox', '127.0.0.1', '2023-04-30 09:04:53', '2023-04-30 09:04:58');

-- --------------------------------------------------------

--
-- Table structure for table `social_login`
--

CREATE TABLE `social_login` (
  `id` int(11) NOT NULL,
  `oauth_id` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `profile_pic` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `social_login`
--

INSERT INTO `social_login` (`id`, `oauth_id`, `email`, `first_name`, `last_name`, `profile_pic`, `created_at`, `updated_at`) VALUES
(1, '102205448859811086041', 'info@grenvilleschool.com', 'Grenville', 'Schools', 'https://lh3.googleusercontent.com/a/AGNmyxZabb4CGvve2ja7vb_m-Fj2tmB4ckX7l7rfbHbs=s96-c', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '101565183305580417013', 'iamrich0385@gmail.com', 'Damilola', 'Richard', 'https://lh3.googleusercontent.com/a/AGNmyxabFzn6uRsCm6MQuHshLk1qNU7unA9mdn6zqKjU=s96-c', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '100050661333068686568', 'mikipary@gmail.com', 'Mickypary', 'Codz', 'https://lh3.googleusercontent.com/a/AGNmyxYiWCydDEozOWLUd_fXnARoZzn-ZMAORb52x-U3=s96-c', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `name` varchar(150) NOT NULL COMMENT 'Name',
  `email` varchar(255) NOT NULL COMMENT 'Email',
  `phone` varchar(250) NOT NULL COMMENT 'Phone',
  `created_at` varchar(20) NOT NULL COMMENT 'Date Created'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='Student table';

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `phone`, `created_at`) VALUES
(1, 'Sam Coury', ' christine1998@yahoo.com', ' 772-267-3636', ' 2021-02-02'),
(2, 'Chris Ellis', ' ellis@yahoo.com', ' 270-562-2304', ' 2020-03-03'),
(3, 'Cameron Finley', ' cameron@rediff.com', ' 813-416-4979', ' 2019-01-05'),
(4, 'Howard Schlueter', ' schlueter@gmail.com', ' 828-207-1592', ' 2018-05-02'),
(5, 'Jordan Tafoya', ' annabell2001@hotmail.com', ' 512-596-3622', ' 2017-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `profile_pic` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'inactive',
  `uniid` varchar(32) NOT NULL,
  `activation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `mobile`, `gender`, `profile_pic`, `created_at`, `status`, `uniid`, `activation_date`) VALUES
(1, 'Mickypary', 'mikipary@gmail.com', '$2y$10$xWCfor1bl28.8o7lm8e3XukOUKabTPYqjR3v8qfxH6gF6EwqRcyvO', '9062684833', 'male', '', '2023-03-27 16:17:44', 'active', '5c860770fdbefc5768f6e081f01cfb1f', '2023-03-27 04:17:44'),
(2, 'Gophp', 'vicolistic@yahoo.com', '$2y$10$XnCBbcKF4Oin8hxyGZvrsOvwveZ.1aycNos58EKFCZkfQigpflTqy', '9062684833', '', '', '2023-03-28 16:41:06', 'active', '90222ded18f04e0c6850bc737f584b4a', '2023-03-28 04:41:06'),
(3, 'Amos', 'amozsolo@gmail.com', '$2y$10$8MOGd4ZRo3y0Bb0AIH1rcenKBickMdivAKBKv3xQAPwTtQBXul6em', '9062684833', 'female', '', '2023-03-29 12:44:53', 'active', 'fb2899e6c773846548294002b4163516', '2023-03-29 12:44:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_activity`
--
ALTER TABLE `login_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_login`
--
ALTER TABLE `social_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_activity`
--
ALTER TABLE `login_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `social_login`
--
ALTER TABLE `social_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
