-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2026 at 10:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belajar_bahasa_inggris`
--

-- --------------------------------------------------------

--
-- Table structure for table `kamus`
--

CREATE TABLE `kamus` (
  `id` int(11) NOT NULL,
  `kata_inggris` varchar(100) NOT NULL,
  `fonetik` varchar(100) DEFAULT NULL,
  `arti_indonesia` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kamus`
--

INSERT INTO `kamus` (`id`, `kata_inggris`, `fonetik`, `arti_indonesia`, `created_at`) VALUES
(1, 'Beautiful', '/ˈbjuː.tɪ.fəl/', 'Indah; cantik; memiliki kecantikan yang luar biasa', '2026-06-05 15:01:58'),
(2, 'Happy', '/ˈhæp.i/', 'Bahagia; senang', '2026-06-05 15:01:58'),
(3, 'Sad', '/sæd/', 'Sedih', '2026-06-05 15:01:58'),
(4, 'Smart', '/smɑːrt/', 'Pintar; cerdas', '2026-06-05 15:01:58'),
(5, 'Brave', '/breɪv/', 'Berani', '2026-06-05 15:01:58'),
(6, 'Strong', '/strɒŋ/', 'Kuat', '2026-06-05 15:01:58'),
(7, 'Weak', '/wiːk/', 'Lemah', '2026-06-05 15:01:58'),
(8, 'Kind', '/kaɪnd/', 'Baik hati', '2026-06-05 15:01:58'),
(9, 'Friendly', '/ˈfrend.li/', 'Ramah', '2026-06-05 15:01:58'),
(10, 'Honest', '/ˈɒn.ɪst/', 'Jujur', '2026-06-05 15:01:58'),
(11, 'Careful', '/ˈkeə.fəl/', 'Hati-hati', '2026-06-05 15:01:58'),
(12, 'Helpful', '/ˈhelp.fəl/', 'Suka menolong', '2026-06-05 15:01:58'),
(13, 'Patient', '/ˈpeɪ.ʃənt/', 'Sabar', '2026-06-05 15:01:58'),
(14, 'Polite', '/pəˈlaɪt/', 'Sopan', '2026-06-05 15:01:58'),
(15, 'Creative', '/kriˈeɪ.tɪv/', 'Kreatif', '2026-06-05 15:01:58'),
(16, 'Amazing', '/əˈmeɪ.zɪŋ/', 'Luar biasa', '2026-06-05 15:01:58'),
(17, 'Excellent', '/ˈek.səl.ənt/', 'Sangat baik', '2026-06-05 15:01:58'),
(18, 'Important', '/ɪmˈpɔː.tənt/', 'Penting', '2026-06-05 15:01:58'),
(19, 'Interesting', '/ˈɪn.trə.stɪŋ/', 'Menarik', '2026-06-05 15:01:58'),
(20, 'Difficult', '/ˈdɪf.ɪ.kəlt/', 'Sulit', '2026-06-05 15:01:58'),
(21, 'Easy', '/ˈiː.zi/', 'Mudah', '2026-06-05 15:01:58'),
(22, 'Fast', '/fɑːst/', 'Cepat', '2026-06-05 15:01:58'),
(23, 'Slow', '/sləʊ/', 'Lambat', '2026-06-05 15:01:58'),
(24, 'Big', '/bɪɡ/', 'Besar', '2026-06-05 15:01:58'),
(25, 'Small', '/smɔːl/', 'Kecil', '2026-06-05 15:01:58'),
(26, 'Tall', '/tɔːl/', 'Tinggi', '2026-06-05 15:01:58'),
(27, 'Short', '/ʃɔːt/', 'Pendek', '2026-06-05 15:01:58'),
(28, 'Young', '/jʌŋ/', 'Muda', '2026-06-05 15:01:58'),
(29, 'Old', '/əʊld/', 'Tua', '2026-06-05 15:01:58'),
(30, 'Rich', '/rɪtʃ/', 'Kaya', '2026-06-05 15:01:58'),
(31, 'Poor', '/pʊər/', 'Miskin', '2026-06-05 15:01:58'),
(32, 'Clean', '/kliːn/', 'Bersih', '2026-06-05 15:01:58'),
(33, 'Dirty', '/ˈdɜː.ti/', 'Kotor', '2026-06-05 15:01:58'),
(34, 'Hot', '/hɒt/', 'Panas', '2026-06-05 15:01:58'),
(35, 'Cold', '/kəʊld/', 'Dingin', '2026-06-05 15:01:58'),
(36, 'Busy', '/ˈbɪz.i/', 'Sibuk', '2026-06-05 15:01:58'),
(37, 'Free', '/friː/', 'Luang; bebas', '2026-06-05 15:01:58'),
(38, 'Open', '/ˈəʊ.pən/', 'Terbuka', '2026-06-05 15:01:58'),
(39, 'Close', '/kləʊs/', 'Dekat', '2026-06-05 15:01:58'),
(40, 'Far', '/fɑːr/', 'Jauh', '2026-06-05 15:01:58'),
(41, 'Love', '/lʌv/', 'Cinta; menyukai', '2026-06-05 15:01:58'),
(42, 'Learn', '/lɜːn/', 'Belajar', '2026-06-05 15:01:58'),
(43, 'Study', '/ˈstʌd.i/', 'Mempelajari', '2026-06-05 15:01:58'),
(44, 'Speak', '/spiːk/', 'Berbicara', '2026-06-05 15:01:58'),
(45, 'Listen', '/ˈlɪs.ən/', 'Mendengarkan', '2026-06-05 15:01:58'),
(46, 'Write', '/raɪt/', 'Menulis', '2026-06-05 15:01:58'),
(47, 'Read', '/riːd/', 'Membaca', '2026-06-05 15:01:58'),
(48, 'Think', '/θɪŋk/', 'Berpikir', '2026-06-05 15:01:58'),
(49, 'Understand', '/ˌʌn.dəˈstænd/', 'Memahami', '2026-06-05 15:01:58'),
(50, 'Success', '/səkˈses/', 'Keberhasilan', '2026-06-05 15:01:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kamus`
--
ALTER TABLE `kamus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kamus`
--
ALTER TABLE `kamus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
