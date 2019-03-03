-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2019 at 01:11 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `naturesspring`
--

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `island_group_id`) VALUES
(1, 'Abra', 1),
(2, 'Agusan del Norte', 3),
(3, 'Agusan del Sur', 3),
(4, 'Aklan', 2),
(5, 'Albay', 1),
(6, 'Antique', 2),
(7, 'Apayao', 1),
(8, 'Aurora', 1),
(9, 'Basilan', 3),
(10, 'Bataan', 1),
(11, 'Batanes', 1),
(12, 'Batangas', 1),
(13, 'Benguet', 1),
(14, 'Biliran', 2),
(15, 'Bohol', 2),
(16, 'Bukidnon', 3),
(17, 'Bulacan', 1),
(18, 'Cagayan', 1),
(19, 'Camarines Norte', 1),
(20, 'Camarines Sur', 1),
(21, 'Camiguin', 3),
(22, 'Capiz', 2),
(23, 'Catanduanes', 1),
(24, 'Cavite', 1),
(25, 'Cebu', 2),
(26, 'Compostela Valley', 3),
(27, 'Cotabato', 3),
(28, 'Davao del Norte', 3),
(29, 'Davao del Sur', 3),
(30, 'Davao Oriental', 3),
(31, 'Eastern Samar', 2),
(32, 'Guimaras', 2),
(33, 'Ifugao', 1),
(34, 'Ilocos Norte', 1),
(35, 'Ilocos Sur', 1),
(36, 'Iloilo', 2),
(37, 'Isabela', 1),
(38, 'Kalinga', 1),
(39, 'La Union', 1),
(40, 'Laguna', 1),
(41, 'Lanao del Norte', 3),
(42, 'Lanao del Sur', 3),
(43, 'Leyte', 2),
(44, 'Maguindanao', 3),
(45, 'Marinduque', 1),
(46, 'Masbate', 1),
(47, 'Metro Manila', 1),
(48, 'Misamis Occidental', 3),
(49, 'Misamis Oriental', 3),
(50, 'Mountain Province', 1),
(51, 'Negros Occidental', 2),
(52, 'Negros Oriental', 2),
(53, 'Northern Samar', 2),
(54, 'Nueva Ecija', 1),
(55, 'Nueva Vizcaya', 1),
(56, 'Occidental Mindoro', 1),
(57, 'Oriental Mindoro', 1),
(58, 'Palawan', 1),
(59, 'Pampanga', 1),
(60, 'Pangasinan', 1),
(61, 'Quezon', 1),
(62, 'Quirino', 1),
(63, 'Rizal', 1),
(64, 'Romblon', 1),
(65, 'Samar', 2),
(66, 'Sarangani', 3),
(67, 'Siquijor', 2),
(68, 'Sorsogon', 1),
(69, 'South Cotabato', 3),
(70, 'Southern Leyte', 2),
(71, 'Sultan Kudarat', 3),
(72, 'Sulu', 3),
(73, 'Surigao del Norte', 3),
(74, 'Surigao del Sur', 3),
(75, 'Tarlac', 1),
(76, 'Tawi-Tawi', 3),
(77, 'Zambales', 1),
(78, 'Zamboanga del Norte', 3),
(79, 'Zamboanga del Sur', 3),
(80, 'Zamboanga Sibugay', 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
