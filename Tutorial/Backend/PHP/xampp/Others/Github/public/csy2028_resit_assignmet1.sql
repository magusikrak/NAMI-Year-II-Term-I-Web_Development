-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2020 at 02:37 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csy2028_resit_assignmet1`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `ad_id` int(11) NOT NULL,
  `ad_firstname` varchar(255) NOT NULL,
  `ad_surname` varchar(255) NOT NULL,
  `ad_email` varchar(255) NOT NULL,
  `ad_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`ad_id`, `ad_firstname`, `ad_surname`, `ad_email`, `ad_password`) VALUES
(1, 'yalamber', 'ingnam', 'yalamberingnam900@gmail.com', '$2y$10$Huuh/k4OVR7kWbzQZJkmIuCUS0DlREcFDig6HbV.e2XGDyja8OeNO');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `date_of_comment` date NOT NULL,
  `Status` char(1) NOT NULL DEFAULT 'F'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `match_id`, `user_id`, `comment`, `date_of_comment`, `Status`) VALUES
(5, 4, 3, 'rewtytewqerwte', '2020-03-11', 'T'),
(8, 8, 7, 'lets gooo', '2020-03-28', 'T'),
(13, 10, 7, 'This is the best game over yeah man lets go', '2020-04-14', 'T'),
(15, 2, 7, 'what a game man!!!!', '2020-04-14', 'F'),
(16, 4, 7, 'woooo....what a match man\r\n', '2020-04-22', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `match_id` int(11) NOT NULL,
  `team1_id` int(11) NOT NULL,
  `team2_id` int(11) NOT NULL,
  `date_of_match` date NOT NULL,
  `team1_score` int(11) NOT NULL,
  `team2_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`match_id`, `team1_id`, `team2_id`, `date_of_match`, `team1_score`, `team2_score`) VALUES
(1, 25, 27, '2020-03-24', 2, 3),
(2, 20, 24, '2020-03-23', 1, 1),
(4, 19, 16, '2020-03-11', 3, 1),
(7, 28, 26, '2020-03-25', 5, 6),
(8, 23, 10, '2020-03-24', 1, 3),
(9, 29, 19, '2020-03-24', 3, 2),
(10, 10, 29, '2020-03-10', 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `team_id` int(11) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`team_id`, `team_name`, `points`) VALUES
(10, 'yale', 1011),
(16, 'ingnam', 89),
(19, 'arsenal', 78),
(20, 'real madrid', 60),
(21, 'hala madrid', 90),
(23, 'PSG', 50),
(24, 'chelse', 80),
(25, 'engodo', 77),
(26, 'kakani', 87),
(27, 'nawalparasi', 70),
(28, 'Baneshwor', 98),
(29, 'Damak', 47);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_surname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_phone_Number` varchar(15) NOT NULL,
  `user_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_firstname`, `user_surname`, `user_email`, `user_password`, `user_phone_Number`, `user_address`) VALUES
(3, 'yalamber', 'ingnam', 'yalamberlimbu@gmail.com', '$2y$10$KzTsXC6etV6DOLVJhaGUduEQU/8OOjbVY3gRKyI5OqlO0dV5kibu.', '9823434866', 'ghattekulo'),
(7, 'bibhu', 'lohani', 'bibhu@gmail.com', '$2y$10$JBOTf6c8RdubNLdz8Vk7oOCuwfgyljVvmnrJ.rDquqXBj6DmugMeK', '9856437689', 'baneshwor'),
(9, 'ram', 'shah', 'yalamberingnam@gmail.com', '$2y$10$lUpeS4J5D1K2eA5IUqfP0u3HYQgwOUZr55xxnPnTS19HJXS4jVPL6', '2454325', 'afasdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `match_id` (`match_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`match_id`),
  ADD KEY `team1_id` (`team1_id`),
  ADD KEY `team2_id` (`team2_id`),
  ADD KEY `match_id` (`match_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`team_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `match_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`match_id`) REFERENCES `matches` (`match_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`team1_id`) REFERENCES `teams` (`team_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `matches_ibfk_2` FOREIGN KEY (`team2_id`) REFERENCES `teams` (`team_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
