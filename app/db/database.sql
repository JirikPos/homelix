CREATE DATABASE IF NOT EXIST homelix
CREATE TABLE
  sensors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    type ENUM(
      'TEMPERATURE',
      'HUMIDITY',
      'SOUND',
      'LIGHT',
      'GAS',
      'WATER',
      'PIR'
    ) NOT NULL,
    location VARCHAR(50) NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
  );

CREATE TABLE
  sensor_readings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sensor_id INT NOT NULL,
    value_float FLOAT NULL,
    value_bool TINYINT(1) NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sensor_id) REFERENCES sensors (id) ON DELETE CASCADE,
    INDEX (sensor_id, created_at)
  );

CREATE TABLE
  keypads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
  );

CREATE TABLE
  keypad_entries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    keypad_id INT NOT NULL,
    code INT NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (keypad_id) REFERENCES keypads (id) ON DELETE CASCADE,
    INDEX (keypad_id, created_at)
  );

CREATE TABLE
  alerts_log (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sensor_id INT NOT NULL,
    reading_id INT NULL,
    value FLOAT NOT NULL,
    threshold_type ENUM('LOW', 'HIGH') NOT NULL,
    occurred_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sensor_id) REFERENCES sensors (id) ON DELETE CASCADE,
    INDEX (sensor_id, occurred_at)
  );