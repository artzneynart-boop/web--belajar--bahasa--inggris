-- Jalankan file ini di phpMyAdmin atau MySQL CLI
-- untuk membuat database dan tabel yang diperlukan

CREATE DATABASE IF NOT EXISTS belajar_bahasa_inggris
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE belajar_bahasa_inggris;

CREATE TABLE IF NOT EXISTS users (
  id         INT          AUTO_INCREMENT PRIMARY KEY,
  username   VARCHAR(50)  NOT NULL UNIQUE,
  email      VARCHAR(100) NOT NULL UNIQUE,
  password   VARCHAR(255) NOT NULL,          -- bcrypt hash
  created_at TIMESTAMP    DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
