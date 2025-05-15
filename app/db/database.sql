-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: May 15, 2025 at 09:35 PM
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

CREATE TABLE `alerts` (
  `id` int NOT NULL,
  `alarm` tinyint(1) NOT NULL DEFAULT '0',
  `occurred_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keypads`
--

CREATE TABLE `keypads` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `room_id` int DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keypad_entries`
--

CREATE TABLE `keypad_entries` (
  `id` int NOT NULL,
  `keypad_id` int NOT NULL,
  `code` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peripherals`
--

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
(1, 'arrive', 0, '2025-05-15 21:26:56', '2025-05-15 21:26:56'),
(2, 'leave', 0, '2025-05-15 21:26:56', '2025-05-15 21:26:56'),
(3, 'day', 0, '2025-05-15 21:26:56', '2025-05-15 21:26:56'),
(4, 'night', 0, '2025-05-15 21:26:56', '2025-05-15 21:26:56');

-- --------------------------------------------------------

--
-- Table structure for table `sensors`
--

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `occurred_at` (`occurred_at`);

--
-- Indexes for table `keypads`
--
ALTER TABLE `keypads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `keypad_entries`
--
ALTER TABLE `keypad_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keypad_id` (`keypad_id`,`created_at`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keypads`
--
ALTER TABLE `keypads`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keypad_entries`
--
ALTER TABLE `keypad_entries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `keypads`
--
ALTER TABLE `keypads`
  ADD CONSTRAINT `keypads_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `keypad_entries`
--
ALTER TABLE `keypad_entries`
  ADD CONSTRAINT `keypad_entries_ibfk_1` FOREIGN KEY (`keypad_id`) REFERENCES `keypads` (`id`) ON DELETE CASCADE;

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
