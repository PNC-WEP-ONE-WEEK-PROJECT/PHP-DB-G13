-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2022 at 08:06 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fb_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `postID` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentID`, `userID`, `postID`, `comment`) VALUES
(75, 1, 82, 'ds'),
(76, 22, 84, 'sds'),
(77, 22, 84, 'dfd'),
(78, 22, 86, 'dkjdkj'),
(79, 1, 83, 'ddff'),
(80, 22, 83, 'hello'),
(81, 22, 86, 'dkjdkj'),
(82, 22, 86, 'dkjdkj');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `userID` int(11) NOT NULL,
  `postID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`userID`, `postID`) VALUES
(1, 83),
(22, 83),
(22, 84),
(22, 86);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postID`, `userID`, `description`, `image`, `date`) VALUES
(82, 1, 'sd', 'DragonPasswordFINAL.jpg', '2022-03-24 06:09:10'),
(83, 1, 'sds', 'Dragon-Pulse-Emblem-Only-1024px.png', '2022-03-24 06:12:40'),
(84, 22, 'sdsd', 'image_2022_02_11T02_53_39_491Z.png', '2022-03-24 06:14:16'),
(86, 22, 'sdsd', 'images.jfif', '2022-03-24 09:29:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` char(10) NOT NULL,
  `date` date NOT NULL,
  `profile` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `firstName`, `lastName`, `email`, `password`, `gender`, `date`, `profile`) VALUES
(1, 'Cham', 'Smey', 'cham.@gmail.com', 'cham.pnc', '', '0000-00-00', 'IMG_9075.JPG'),
(20, 'NHOR', 'cham', 'KEARe@gmail.com', '11111111', 'Gender', '2022-03-09', 'fake-profile.png'),
(21, 'nhor', 'kear', 'nhorkear@gmail.com', 'nhorkear2022', 'male', '2013-02-15', 'male.png'),
(22, 'cham', 'cham', 'chamcham@gmail.com', '222222222', 'female', '2022-03-16', 'female.png'),
(23, 'sss', 'fffff', 'sdfghj@ghj.com', '1', 'female', '2022-03-24', 'female.png'),
(24, 'fdf', 'ffdf', 'ddham@gmail.com', '333333333', 'female', '2022-03-08', 'female.png'),
(25, 'hak', 'kim', 'hak@gmail.com', '11112222', 'male', '2022-03-24', 'male.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `postID` (`postID`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD KEY `userID` (`userID`,`postID`),
  ADD KEY `likes_ibfk_2` (`postID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`postID`) REFERENCES `posts` (`postID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`postID`) REFERENCES `posts` (`postID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
