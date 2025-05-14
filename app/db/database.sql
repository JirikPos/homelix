-- Create database
CREATE DATABASE IF NOT EXISTS `homelix` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE `homelix`;

-- Sensors definition
CREATE TABLE IF NOT EXISTS
  `sensors` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(50) NOT NULL,
    `type` ENUM(
      'TEMPERATURE',
      'HUMIDITY',
      'SOUND',
      'LIGHT',
      'GAS',
      'WATER',
      'PIR'
    ) NOT NULL,
    `location` VARCHAR(50) DEFAULT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- Sensor readings (floats or booleans)
CREATE TABLE IF NOT EXISTS
  `sensor_readings` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `sensor_id` INT NOT NULL,
    `value_float` FLOAT DEFAULT NULL,
    `value_bool` TINYINT(1) DEFAULT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`sensor_id`) REFERENCES `sensors` (`id`) ON DELETE CASCADE,
    INDEX (`sensor_id`, `created_at`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- Keypads
CREATE TABLE IF NOT EXISTS
  `keypads` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(50) NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- Keypad entries
CREATE TABLE IF NOT EXISTS
  `keypad_entries` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `keypad_id` INT NOT NULL,
    `code` INT NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`keypad_id`) REFERENCES `keypads` (`id`) ON DELETE CASCADE,
    INDEX (`keypad_id`, `created_at`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- Alerts log
CREATE TABLE IF NOT EXISTS
  `alerts_log` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `sensor_id` INT NOT NULL,
    `reading_id` INT DEFAULT NULL,
    `value` FLOAT NOT NULL,
    `threshold_type` ENUM('LOW', 'HIGH') NOT NULL,
    `occurred_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`sensor_id`) REFERENCES `sensors` (`id`) ON DELETE CASCADE,
    FOREIGN KEY (`reading_id`) REFERENCES `sensor_readings` (`id`) ON DELETE SET NULL,
    INDEX (`sensor_id`, `occurred_at`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- Scenes
CREATE TABLE IF NOT EXISTS
  `scenes` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL UNIQUE,
    `enabled` TINYINT(1) NOT NULL DEFAULT 0,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- Scene conditions
CREATE TABLE IF NOT EXISTS
  `scene_conditions` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `scene_id` INT NOT NULL,
    `sensor` VARCHAR(50) NOT NULL,
    `operator` ENUM('>', '<', '==', '>=', '<=', '!=') NOT NULL,
    `value` VARCHAR(50) NOT NULL,
    FOREIGN KEY (`scene_id`) REFERENCES `scenes` (`id`) ON DELETE CASCADE,
    INDEX (`scene_id`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- Scene actions
CREATE TABLE IF NOT EXISTS
  `scene_actions` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `scene_id` INT NOT NULL,
    `type` VARCHAR(50) NOT NULL, -- e.g. 'notify','sound','command'
    `params` JSON NOT NULL, -- action-specific parameters
    FOREIGN KEY (`scene_id`) REFERENCES `scenes` (`id`) ON DELETE CASCADE,
    INDEX (`scene_id`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- Peripherals (outputs that Arduino will poll)
CREATE TABLE IF NOT EXISTS
  `peripherals` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(50) NOT NULL,
    `type` ENUM('LED', 'RELAY', 'FAN', 'BUZZER', 'MOTOR', 'LIGHT') NOT NULL,
    `location` VARCHAR(50) DEFAULT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- Peripheral states (current desired state for each peripheral)
CREATE TABLE IF NOT EXISTS
  `peripheral_states` (
    `peripheral_id` INT NOT NULL PRIMARY KEY,
    `value_float` FLOAT DEFAULT NULL,
    `value_bool` TINYINT(1) DEFAULT NULL,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`peripheral_id`) REFERENCES `peripherals` (`id`) ON DELETE CASCADE
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;