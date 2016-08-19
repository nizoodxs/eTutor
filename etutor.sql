-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2016 at 04:21 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etutor`
--

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE IF NOT EXISTS `chapters` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `video_url` varchar(40) NOT NULL,
  `text_description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `course_id`, `position`, `video_url`, `text_description`) VALUES
(1, 1, 1, 'mMqMOz9wRDw', 'Implementing Google reCAPTCHA: Introduction (1/4)\r\n'),
(2, 1, 2, '8_7zPDr2g4o', 'Implementing Google reCAPTCHA: Registering your site (2/4)\r\n'),
(3, 1, 3, 'FFbp-0VgUHc', 'Implementing Google reCAPTCHA: Method one: Plain PHP using cURL (3/4)\r\n'),
(4, 1, 4, 'oots6qHYEkc', 'Implementing Google reCAPTCHA: Method two: Using the official package\r\n'),
(10, 6, 1, '3h04x-1uM80', 'Build a Twitter Bot: Getting mentions (1/4)'),
(11, 6, 2, 'gBJ3CSPJmCo', 'Build a Twitter Bot: Sentiment Analysis (2/4)'),
(12, 6, 3, 'xl42AwqWeIE', 'Build a Twitter Bot: Tracking replies (3/4)'),
(13, 6, 4, '9BkF7a6RUYE', 'Build a Twitter Bot: Replying (4/4)'),
(14, 7, 1, '3h04x-1uM80', 'Build a Twitter Bot: Getting mentions (1/4)'),
(15, 7, 2, 'gBJ3CSPJmCo', 'Build a Twitter Bot: Sentiment Analysis (2/4)'),
(16, 7, 3, 'xl42AwqWeIE', 'Build a Twitter Bot: Tracking replies (3/4)'),
(17, 7, 4, '9BkF7a6RUYE', 'Build a Twitter Bot: Replying (4/4)');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(120) NOT NULL,
  `category` varchar(120) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `category`, `description`) VALUES
(1, 'Implementing Google reCAPTCHA', 'Programming', 'Getting set up with reCAPTCHA, and two different methods of checking if a user has passed the check.'),
(6, 'Build a Twitter Bot', 'programming', 'A Twitter bot that uses sentiment analysis to reply to mentions with a happy, neutral or sad emoji.'),
(7, 'Build a Twitter Bot', 'development', 'A Twitter bot that uses sentiment analysis to reply to mentions with a happy, neutral or sad emoji.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(8) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(120) NOT NULL,
  `xp` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `first_name`, `last_name`, `email`, `xp`) VALUES
(1, 'nizoodxs', 'nischal12345', 'Nischal', 'Subedi', 'nischal@mail.com', 1),
(2, 'neepside', 'neeraj', 'Neeraj', 'Neupane', 'neeraj@gmail.com', 0),
(3, 'bnay', 'binay12345', 'Binay', 'Thapa', 'binay@gmail.com', 0),
(4, 'nepal', '4b69c24c4a31ae8998d261c7c52241ba711ee32c', 'nischal', 'subedi', 'nischal@mail.com', 0),
(5, 'haha', '4b69c24c4a31ae8998d261c7c52241ba711ee32c', 'nischal', 'subedi', 'nischal@mail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_course`
--

CREATE TABLE IF NOT EXISTS `user_course` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `editibility` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_course`
--

INSERT INTO `user_course` (`id`, `user_id`, `course_id`, `editibility`) VALUES
(2, 1, 6, 1),
(3, 1, 7, 1),
(5, 1, 7, 0),
(6, 1, 1, 0),
(7, 5, 6, 0),
(8, 5, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_course`
--
ALTER TABLE `user_course`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_course`
--
ALTER TABLE `user_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
