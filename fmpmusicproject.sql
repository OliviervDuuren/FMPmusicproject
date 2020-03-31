-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 31 mrt 2020 om 17:19
-- Serverversie: 10.4.11-MariaDB
-- PHP-versie: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fmpmusicproject`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `blocks`
--

CREATE TABLE `blocks` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projects`
--

CREATE TABLE `projects` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `niveau` int(8) NOT NULL,
  `level` int(8) NOT NULL,
  `maxlevel` int(8) NOT NULL,
  `points` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(8) NOT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `parent_id` int(8) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `level` int(8) NOT NULL,
  `vordering` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `surname`, `lastname`, `username`, `password`, `parent_id`, `role`, `level`, `vordering`) VALUES
(1, 'Developer', '', 'developer', 'FMPmusicproject', 0, 'Developer', 3, 0),
(2, 'Kind', '', 'kind', 'maestro', 2, 'Child', 2, 100),
(3, 'Leerkracht', '', 'leerkracht', 'maestro', 0, 'Teacher', 3, 100),
(5, 'Leerling', '1', 'Le1', 'root', 1, 'Child', 1, 60),
(15, 'Leerling', '2', 'Le2', 'root', 1, 'Child', 2, 0),
(20, 'Leerling', '3', 'Le3', 'root', 1, 'Child', 3, 20),
(21, 'Leerling', '4', 'Le4', 'root', 1, 'Child', 2, 40),
(22, 'Leerling', '5', 'Le5', 'root', 1, 'Child', 2, 60);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
