-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 06 apr 2020 om 13:23
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
(1, 'Developer', '', 'developer', 'FMPmusicproject', 0, 'Developer', 3, 100),
(2, 'Kind', '', 'kind', 'maestro', 2, 'Child', 2, 1),
(3, 'Leerkracht', '', 'leerkracht', 'maestro', 0, 'Teacher', 3, 100),
(5, 'Aart', 'de Jong', 'kind1', 'root', 3, 'Child', 1, 1),
(15, 'Babette', 'Jansen', 'kind2', 'root', 3, 'Child', 2, 1),
(20, 'Camiel', 'de Vries', 'kind3', 'root', 3, 'Child', 3, 1),
(21, 'Dagmar', 'van den Berg', 'kind4', 'root', 3, 'Child', 2, 18),
(22, 'Ed', 'van Dijk', 'kind5', 'root', 3, 'Child', 2, 10),
(25, 'Famke', 'Bakker', 'kind6', 'root', 3, 'Child', 1, 1),
(26, 'Gabriël', 'Janssen', 'kind7', 'root', 3, 'Child', 1, 1),
(27, 'Hadewig', 'Visser', 'kind8', 'root', 3, 'Child', 1, 1),
(28, 'Ian', 'Smit', 'kind9', 'root', 3, 'Child', 1, 1),
(29, 'Jacoba', 'Meijer', 'kind10', 'root', 3, 'Child', 1, 5),
(30, 'Kaeso', 'de Boer', 'kind11', 'root', 3, 'Child', 1, 1),
(31, 'Laetitia', 'Mulder', 'kind12', 'root', 3, 'Child', 1, 1),
(32, 'Maarten', 'de Groot', 'kind13', 'root', 3, 'Child', 1, 1),
(33, 'Nadia', 'Bos', 'kind14', 'root', 3, 'Child', 1, 1),
(34, 'Octaaf', 'Vos', 'kind15', 'root', 3, 'Child', 1, 1),
(35, 'Pamela', 'Peters', 'kind16', 'root', 3, 'Child', 1, 1),
(36, 'Quentin', 'Hendriks', 'kind17', 'root', 3, 'Child', 1, 1),
(37, 'Rachel', 'van Leeuwen', 'kin18', 'root', 3, 'Child', 1, 1),
(38, 'Said', 'Dekker', 'kind19', 'root', 3, 'Child', 1, 1),
(39, 'Tamira', 'Brouwer', 'kind20', 'root', 3, 'Child', 1, 1),
(40, 'Ulrich', 'de Wit', 'kind21', 'root', 3, 'Child', 1, 1),
(41, 'Valerie', 'Dijkstra', 'kind22', 'root', 3, 'Child', 1, 1),
(42, 'Walt', 'Smits', 'kind23', 'root', 3, 'Child', 1, 1),
(43, 'Xandra', 'de Graaf', 'kind24', 'root', 3, 'Child', 1, 1),
(44, 'Yannick', 'van der Meer', 'kind25', 'root', 3, 'Child', 1, 1),
(45, 'Ziva', 'van der Linden', 'kind26', 'root', 3, 'Child', 1, 1);

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
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
