-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2023 at 12:57 AM
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
-- Database: `soni`
--

-- --------------------------------------------------------

--
-- Table structure for table `comm`
--

CREATE TABLE `comm` (
  `file` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comment` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comm`
--

INSERT INTO `comm` (`file`, `email`, `comment`) VALUES
('uploads/ok.jpg', 'avskaushik123@gmail.com', 'Wow!!!'),
('uploads/k1.jpg', 'lalli@gmail.com', 'My fav'),
('uploads/sk1.jpg', 'sonu@gmail.com', 'Lovely scne');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `name` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `imgid` bigint(250) NOT NULL,
  `likes` bigint(250) DEFAULT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`name`, `file`, `imgid`, `likes`, `email`) VALUES
('kaushik', 'uploads/ok.jpg', 1, 2, 'avskaushik123@gmail.com'),
('kaushik', 'uploads/gk2.jpg', 2, 1, 'avskaushik123@gmail.com'),
('Lalli', 'uploads/sk1.jpg', 3, 3, 'lalli@gmail.com'),
('Lalli', 'uploads/k1.jpg', 4, 2, 'lalli@gmail.com'),
('Soni', 'uploads/nk2.jpg', 5, 1, 'sonu@gmail.com'),
('Soni', 'uploads/gk1.jpg', 6, 0, 'sonu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `file` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`file`, `email`) VALUES
('uploads/ok.jpg', 'avskaushik123@gmail.com'),
('uploads/ok.jpg', 'lalli@gmail.com'),
('uploads/k1.jpg', 'lalli@gmail.com'),
('uploads/sk1.jpg', 'lalli@gmail.com'),
('uploads/nk2.jpg', 'sonu@gmail.com'),
('uploads/k1.jpg', 'sonu@gmail.com'),
('uploads/sk1.jpg', 'sonu@gmail.com'),
('uploads/gk2.jpg', 'sonu@gmail.com'),
('uploads/sk1.jpg', 'avskaushik123@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `phone` bigint(100) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `gender`, `phone`, `dob`, `password`) VALUES
('kaushik', 'avskaushik123@gmail.com', 'male', 7075824426, '2023-04-20', '20092003'),
('Soni', 'sonu@gmail.com', 'Female', 8769876542, '2023-04-05', '20092003'),
('Lalli', 'lalli@gmail.com', 'Female', 6756789876, '2004-02-10', '20092003');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
