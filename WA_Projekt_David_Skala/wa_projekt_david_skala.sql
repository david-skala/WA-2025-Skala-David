-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2025 at 10:13 AM
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
-- Database: `wa_projekt_david_skala`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `page_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `comment`, `created_at`, `page_path`) VALUES
(1, 3, 'Testovací komentář poprvé.', '2025-06-06 16:37:42', 'clanek1.php'),
(3, 3, 'Komentář další...', '2025-06-06 17:23:51', 'clanek1.php'),
(5, 3, 'Teď už jsou dokonce u každýho článku zvlášť, paráda!', '2025-06-06 17:25:07', 'clanek1.php'),
(6, 3, 'Oooo, paráda!', '2025-06-06 17:29:07', 'clanek2.php'),
(7, 3, 'Hmm, další komentář. Opravený jednou.', '2025-06-06 17:29:18', 'clanek3.php'),
(8, 5, 'Skvělý článek, nejlepší co jsem kdy četl!', '2025-06-07 08:10:16', 'clanek3.php'),
(9, 5, 'Nádherný článek, fakt že jo!', '2025-06-07 08:27:17', 'clanek2.php'),
(10, 5, 'Tenhle článek je fakt super!', '2025-06-07 08:53:06', 'clanek1.php'),
(11, 4, 'Jojo, fakt pěkný.', '2025-06-07 09:06:27', 'clanek1.php'),
(13, 3, 'Perfektní!', '2025-06-08 08:11:24', 'clanek3.php');

-- --------------------------------------------------------

--
-- Table structure for table `inzeraty`
--

CREATE TABLE `inzeraty` (
  `id_cislo` int(11) NOT NULL,
  `nazev_vozu` varchar(50) NOT NULL,
  `rok_vyroby` int(11) NOT NULL,
  `najeto` int(11) NOT NULL,
  `cena` int(11) NOT NULL,
  `kontakt` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inzeraty`
--

INSERT INTO `inzeraty` (`id_cislo`, `nazev_vozu`, `rok_vyroby`, `najeto`, `cena`, `kontakt`, `created_at`, `updated_at`) VALUES
(2, 'Škoda Octavia', 2021, 58933, 454000, 'velmipravyemail@gmail.com', '2025-06-06 09:20:11', '2025-06-06 09:20:11'),
(3, 'Toyota Corolla', 2025, 2, 749900, '+420 475 214 438', '2025-06-06 09:22:19', '2025-06-06 09:22:19'),
(5, 'Mercedes-Benz SLS AMG', 2014, 1000, 42350000, '+420 382 272 563', '2025-06-06 09:25:36', '2025-06-07 08:21:35'),
(6, 'Audi RS6', 2020, 66827, 2199000, '+420 725 068 228', '2025-06-07 08:24:08', '2025-06-07 08:24:08'),
(7, 'Mitsubishi L200', 2020, 268419, 419000, 'realemail@seznam.cz', '2025-06-07 08:24:59', '2025-06-07 08:24:59'),
(8, 'Volkswagen Tiguan', 2017, 121829, 479000, '+420 724 289 292', '2025-06-07 08:25:31', '2025-06-07 08:25:31'),
(9, 'Jaguar I-Pace', 2019, 157353, 509000, 'superrealemail@email.cz', '2025-06-07 08:26:13', '2025-06-07 08:27:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `name` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password_hash`, `role`, `name`, `surname`, `created_at`, `updated_at`) VALUES
(3, 'Franta', NULL, '$2y$10$i0g1qEoYA832Y9f54FsMeOKlYGnDA8QxoVyctTFZTNxLCvwwZmhGC', 'user', NULL, NULL, '2025-06-04 10:55:34', '2025-06-04 17:01:31'),
(4, 'Pepa', 'pepuv.email@gmail.com', '$2y$10$OL2Zych4iMNcNI.eR36fSua3rQKRX5azImFxYpRZ.Rn30uBUK8Cgq', 'user', 'Pepa', 'Novák', '2025-06-04 14:52:14', '2025-06-04 17:01:55'),
(5, 'Admin', NULL, '$2y$10$n3XJovKMWqeIGE3GzQdkcug3JH7JQOkDIUeY6eYrIS8SlN7waoVSy', 'admin', NULL, NULL, '2025-06-07 07:33:30', '2025-06-07 07:35:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `inzeraty`
--
ALTER TABLE `inzeraty`
  ADD PRIMARY KEY (`id_cislo`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `inzeraty`
--
ALTER TABLE `inzeraty`
  MODIFY `id_cislo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
