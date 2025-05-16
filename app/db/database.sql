-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: May 16, 2025 at 12:17 AM
-- Server version: 8.0.42
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homelix`
--
CREATE DATABASE IF NOT EXISTS `homelix` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `homelix`;

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

DROP TABLE IF EXISTS `alerts`;
CREATE TABLE `alerts` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `alarm` tinyint(1) NOT NULL DEFAULT '0',
  `occurred_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `alerts`
--

INSERT INTO `alerts` (`id`, `name`, `alarm`, `occurred_at`) VALUES
(1, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:20:33'),
(2, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:20:33'),
(3, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:20:33'),
(4, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:20:33'),
(5, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:20:34'),
(6, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:20:34'),
(7, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:20:34'),
(8, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:20:36'),
(9, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:20:38'),
(10, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:20:38'),
(11, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:20:39'),
(12, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:20:40'),
(13, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:20:44'),
(14, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:20:46'),
(15, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:41:47'),
(16, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:41:47'),
(17, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:41:47'),
(18, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:41:47'),
(19, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:41:47'),
(20, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:41:47'),
(21, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:41:47'),
(22, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:41:50'),
(23, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:41:52'),
(24, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:41:52'),
(25, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:41:53'),
(26, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:41:56'),
(27, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:41:57'),
(28, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:41:57'),
(29, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:41:57'),
(30, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:00'),
(31, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:03'),
(32, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:03'),
(33, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:03'),
(34, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:06'),
(35, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:08'),
(36, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:08'),
(37, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:08'),
(38, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:08'),
(39, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:09'),
(40, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:12'),
(41, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:13'),
(42, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:13'),
(43, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:15'),
(44, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:18'),
(45, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:18'),
(46, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:18'),
(47, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:18'),
(48, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:21'),
(49, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:23'),
(50, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:23'),
(51, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:24'),
(52, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:27'),
(53, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:28'),
(54, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:28'),
(55, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:28'),
(56, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:28'),
(57, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:30'),
(58, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:33'),
(59, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:33'),
(60, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:33'),
(61, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:36'),
(62, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:38'),
(63, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:38'),
(64, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:38'),
(65, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:39'),
(66, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:41'),
(67, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:42'),
(68, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:42'),
(69, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:44'),
(70, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:47'),
(71, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:47'),
(72, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:47'),
(73, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:47'),
(74, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:47'),
(75, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:50'),
(76, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:52'),
(77, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:52'),
(78, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:53'),
(79, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:56'),
(80, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:57'),
(81, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:57'),
(82, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:57'),
(83, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:42:59'),
(84, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:02'),
(85, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:02'),
(86, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:02'),
(87, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:05'),
(88, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:07'),
(89, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:07'),
(90, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:07'),
(91, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:07'),
(92, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:08'),
(93, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:11'),
(94, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:12'),
(95, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:12'),
(96, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:14'),
(97, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:17'),
(98, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:17'),
(99, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:17'),
(100, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:17'),
(101, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:20'),
(102, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:22'),
(103, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:22'),
(104, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:23'),
(105, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:26'),
(106, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:27'),
(107, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:27'),
(108, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:27'),
(109, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:27'),
(110, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:29'),
(111, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:32'),
(112, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:32'),
(113, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:32'),
(114, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:35'),
(115, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:37'),
(116, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:37'),
(117, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:37'),
(118, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:38'),
(119, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:41'),
(120, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:42'),
(121, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:42'),
(122, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:44'),
(123, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:47'),
(124, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:47'),
(125, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:47'),
(126, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:47'),
(127, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:47'),
(128, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:50'),
(129, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:52'),
(130, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:52'),
(131, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:53'),
(132, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:56'),
(133, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:57'),
(134, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:57'),
(135, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:57'),
(136, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:43:59'),
(137, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:44:02'),
(138, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:44:02'),
(139, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:44:02'),
(140, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:44:05'),
(141, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:44:07'),
(142, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:44:07'),
(143, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:44:07'),
(144, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:44:07'),
(145, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:44:08'),
(146, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:44:11'),
(147, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:44:12'),
(148, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:44:12'),
(149, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:44:14'),
(150, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:44:17'),
(151, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:44:17'),
(152, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:44:17'),
(153, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:44:17'),
(154, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:44:19'),
(155, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:44:19'),
(156, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:44:20'),
(157, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:44:20'),
(158, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:44:21'),
(159, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:44:22'),
(160, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:44:22'),
(161, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:44:22'),
(162, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:44:23'),
(163, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:44:23'),
(164, 'Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', 0, '2025-05-15 22:44:23'),
(1795, 'Alarm deaktivován klávesnicí', 0, '2025-05-16 00:15:39'),
(1796, 'Alarm deaktivován klávesnicí', 0, '2025-05-16 00:15:40'),
(1797, 'Alarm deaktivován klávesnicí', 0, '2025-05-16 00:15:40'),
(1798, 'Alarm deaktivován klávesnicí', 0, '2025-05-16 00:15:40'),
(1799, 'Alarm deaktivován klávesnicí', 0, '2025-05-16 00:15:40'),
(1800, 'Alarm deaktivován klávesnicí', 0, '2025-05-16 00:15:40'),
(1801, 'Alarm deaktivován klávesnicí', 0, '2025-05-16 00:15:40'),
(1802, 'Alarm deaktivován klávesnicí', 0, '2025-05-16 00:15:40'),
(1803, 'Alarm deaktivován klávesnicí', 0, '2025-05-16 00:15:46'),
(1870, 'Alarm deaktivován klávesnicí', 0, '2025-05-16 00:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `keypad_entries`
--

DROP TABLE IF EXISTS `keypad_entries`;
CREATE TABLE `keypad_entries` (
  `id` int NOT NULL,
  `code` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `keypad_entries`
--

INSERT INTO `keypad_entries` (`id`, `code`, `created_at`) VALUES
(1, 666666, '2025-05-15 23:45:05'),
(2, 603603, '2025-05-15 23:46:27'),
(3, 603603, '2025-05-15 23:47:15');

-- --------------------------------------------------------

--
-- Table structure for table `peripherals`
--

DROP TABLE IF EXISTS `peripherals`;
CREATE TABLE `peripherals` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` enum('LED','RELAY','FAN','BUZZER','MOTOR','LIGHT') NOT NULL,
  `room_id` int DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `peripherals`
--

INSERT INTO `peripherals` (`id`, `name`, `type`, `room_id`, `created_at`) VALUES
(1, 'LED pásek', 'LED', 2, '2025-05-15 21:31:45'),
(2, 'Klimatizace', 'FAN', 2, '2025-05-15 21:31:45'),
(3, 'Závěsy', 'MOTOR', 2, '2025-05-15 21:31:45'),
(4, 'Čerpadlo', 'RELAY', 3, '2025-05-15 21:31:45'),
(5, 'Stropní světlo', 'LIGHT', 1, '2025-05-15 21:31:45');

-- --------------------------------------------------------

--
-- Table structure for table `peripheral_states`
--

DROP TABLE IF EXISTS `peripheral_states`;
CREATE TABLE `peripheral_states` (
  `peripheral_id` int NOT NULL,
  `value_float` float DEFAULT NULL,
  `value_bool` tinyint(1) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE `rooms` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `description`) VALUES
(1, 'Kuchyň', 'Hlavní kuchyňský prostor'),
(2, 'Obývák', 'Společný obývací prostor'),
(3, 'Koupelna', 'Senzory pro koupelnu'),
(4, 'Garáž', 'Senzory v garáži');

-- --------------------------------------------------------

--
-- Table structure for table `scenes`
--

DROP TABLE IF EXISTS `scenes`;
CREATE TABLE `scenes` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `scenes`
--

INSERT INTO `scenes` (`id`, `name`, `enabled`, `created_at`, `updated_at`) VALUES
(1, 'arrive', 0, '2025-05-15 21:26:56', '2025-05-15 23:48:06'),
(2, 'leave', 0, '2025-05-15 21:26:56', '2025-05-15 23:48:22'),
(3, 'day', 0, '2025-05-15 21:26:56', '2025-05-15 23:48:53'),
(4, 'night', 1, '2025-05-15 21:26:56', '2025-05-15 23:48:53');

-- --------------------------------------------------------

--
-- Table structure for table `sensors`
--

DROP TABLE IF EXISTS `sensors`;
CREATE TABLE `sensors` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` enum('TEMPERATURE','HUMIDITY','SOUND','LIGHT','GAS','WATER','PIR') NOT NULL,
  `room_id` int DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sensors`
--

INSERT INTO `sensors` (`id`, `name`, `type`, `room_id`, `created_at`) VALUES
(1, 'TEMPERATURE', 'TEMPERATURE', 2, '2025-05-15 06:46:16'),
(2, 'HUMIDITY', 'HUMIDITY', 3, '2025-05-15 06:46:16'),
(3, 'SOUND', 'SOUND', 2, '2025-05-15 06:46:16'),
(4, 'LIGHT', 'LIGHT', 4, '2025-05-15 06:46:16'),
(5, 'GAS', 'GAS', 1, '2025-05-15 06:46:16'),
(6, 'WATER', 'WATER', 3, '2025-05-15 06:46:16'),
(7, 'PIR', 'PIR', 4, '2025-05-15 06:46:16');

-- --------------------------------------------------------

--
-- Table structure for table `sensor_readings`
--

DROP TABLE IF EXISTS `sensor_readings`;
CREATE TABLE `sensor_readings` (
  `id` int NOT NULL,
  `sensor_id` int NOT NULL,
  `value_float` float DEFAULT NULL,
  `value_bool` tinyint(1) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sensor_readings`
--

INSERT INTO `sensor_readings` (`id`, `sensor_id`, `value_float`, `value_bool`, `created_at`) VALUES
(1, 1, 24.49, NULL, '2025-05-15 06:46:16'),
(2, 2, 61.86, NULL, '2025-05-15 06:46:16'),
(3, 3, 63.61, NULL, '2025-05-15 06:46:16'),
(4, 4, 791.07, NULL, '2025-05-15 06:46:16'),
(5, 5, 114.11, NULL, '2025-05-15 06:46:16'),
(6, 6, NULL, 1, '2025-05-15 06:46:16'),
(7, 7, NULL, 0, '2025-05-15 06:46:16'),
(8, 1, 23.94, NULL, '2025-05-15 08:01:00'),
(9, 2, 58.22, NULL, '2025-05-15 08:01:00'),
(10, 3, 67.33, NULL, '2025-05-15 08:01:00'),
(11, 4, 805.45, NULL, '2025-05-15 08:01:00'),
(12, 5, 120.8, NULL, '2025-05-15 08:01:00'),
(13, 6, NULL, 0, '2025-05-15 08:01:00'),
(14, 7, NULL, 1, '2025-05-15 08:01:00'),
(15, 1, 24.65, NULL, '2025-05-15 08:10:00'),
(16, 2, 60, NULL, '2025-05-15 08:10:00'),
(17, 3, 62.1, NULL, '2025-05-15 08:10:00'),
(18, 4, 780, NULL, '2025-05-15 08:10:00'),
(19, 5, 130.2, NULL, '2025-05-15 08:10:00'),
(20, 6, NULL, 1, '2025-05-15 08:10:00'),
(21, 7, NULL, 0, '2025-05-15 08:10:00'),
(22, 6, NULL, 1, '2025-05-15 08:15:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keypad_entries`
--
ALTER TABLE `keypad_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peripherals`
--
ALTER TABLE `peripherals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `peripheral_states`
--
ALTER TABLE `peripheral_states`
  ADD PRIMARY KEY (`peripheral_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scenes`
--
ALTER TABLE `scenes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `sensors`
--
ALTER TABLE `sensors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `sensor_readings`
--
ALTER TABLE `sensor_readings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sensor_id` (`sensor_id`,`created_at`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alerts`
--
ALTER TABLE `alerts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1871;

--
-- AUTO_INCREMENT for table `keypad_entries`
--
ALTER TABLE `keypad_entries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peripherals`
--
ALTER TABLE `peripherals`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `scenes`
--
ALTER TABLE `scenes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sensors`
--
ALTER TABLE `sensors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sensor_readings`
--
ALTER TABLE `sensor_readings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peripherals`
--
ALTER TABLE `peripherals`
  ADD CONSTRAINT `peripherals_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `peripheral_states`
--
ALTER TABLE `peripheral_states`
  ADD CONSTRAINT `peripheral_states_ibfk_1` FOREIGN KEY (`peripheral_id`) REFERENCES `peripherals` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sensors`
--
ALTER TABLE `sensors`
  ADD CONSTRAINT `sensors_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `sensor_readings`
--
ALTER TABLE `sensor_readings`
  ADD CONSTRAINT `sensor_readings_ibfk_1` FOREIGN KEY (`sensor_id`) REFERENCES `sensors` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
