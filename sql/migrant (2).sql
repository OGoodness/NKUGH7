-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2018 at 12:20 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `globalhack7`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrant`
--

CREATE TABLE `migrant` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `users_id` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(32) NOT NULL,
  `self_desc` text NOT NULL,
  `religion` varchar(128) DEFAULT NULL,
  `marital_status` varchar(128) DEFAULT NULL,
  `city` varchar(128) NOT NULL,
  `state` varchar(2) NOT NULL,
  `nationality` varchar(128) DEFAULT NULL,
  `latitude` int(11) NOT NULL,
  `longitude` int(11) NOT NULL,
  `primary_language` varchar(128) NOT NULL,
  `secondary_language` varchar(128) DEFAULT NULL,
  `hobby_1` text,
  `hobby_2` text,
  `family_desc` text,
  `end_goal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migrant`
--

INSERT INTO `migrant` (`id`, `users_id`, `age`, `gender`, `self_desc`, `religion`, `marital_status`, `city`, `state`, `nationality`, `latitude`, `longitude`, `primary_language`, `secondary_language`, `hobby_1`, `hobby_2`, `family_desc`, `end_goal`) VALUES
(0, 10, 21, 'Noah Fields', 'fasdf', NULL, NULL, 'morning view', 'KY', 'United States', 0, 0, 'dasdf', 'asd', 'asdf', 'asdf', 'sadfasd', 'asdf');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
