-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 23, 2026 at 05:11 PM
-- Server version: 8.4.7
-- PHP Version: 8.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `url_shorts`
--

-- --------------------------------------------------------

--
-- Table structure for table `shorts_main`
--

DROP TABLE IF EXISTS `shorts_main`;
CREATE TABLE IF NOT EXISTS `shorts_main` (
  `short_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `short_long` varchar(1024) COLLATE utf8mb4_general_ci NOT NULL,
  `short_short` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `short_usage` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `short_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `short_used` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`short_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
