-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 31, 2026 at 03:07 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(7, 'اقتصادي '),
(1, 'رياضي'),
(2, 'سياسي'),
(8, 'أدبي');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'active',
  `category_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `details`, `image`, `status`, `category_id`, `user_id`) VALUES
(1, 'ألفاريز برشلوني ', 'انتقل اللاعب الارجنتيني جوليان الفاريز صاحب الرفم 9 مساء الامس من اتليتكو مدريد الى برشلونة ', '', 'deleted', NULL, 3),
(7, 'نت سريم امن ', 'انسحاب الاحتلال من موقع نت سريم ', NULL, 'deleted', NULL, 3),
(10, 'نتساريم امن ', 'انسحاب الاحتلال من محور نتساريم ', 'الصور1780236655_نتساريم.jpg', 'active', 2, 3),
(8, 'هدنة بلا  هدنة ', 'تم الاتفاق في الاشهر السابقة على هنة بين طرفي المفاوضات ولكن جيش الاحتلال لم يلتزم بها و ينفذ استهدافات على المواطنين ', NULL, 'deleted', NULL, 3),
(9, 'الفا برشلوني ', 'انتقل مساء الامس اللاعب جواليا الفاريز صاحب الرقم 9 الى برشلونة ', 'الصور1780236383_الفاريز.jfif', 'active', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(4, 'heba', 'hebaH@gmail.com', '$2y$10$rcFpO9DsxSoJk5l3/k7z0ewaR8MkI4vsB6E1HxeDQkUNx7D6XzNYC'),
(3, 'hala salama ', 'hala1310@gmail.com', '$2y$10$uEjh7nG/S6sUu9xOm1syO.dEc3PAS5bAto4r7UOjyMEfzSR2n0rnC');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
