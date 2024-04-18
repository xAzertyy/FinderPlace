-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 18, 2024 alle 20:51
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finder`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `locations`
--

CREATE TABLE `locations` (
  `ID_pos` int(255) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Tipologia` varchar(255) NOT NULL,
  `lat` float DEFAULT NULL,
  `lon` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `locations`
--

INSERT INTO `locations` (`ID_pos`, `Nome`, `Tipologia`, `lat`, `lon`) VALUES
(1, 'fdfdfv', 'Cafè', 37.3217, 13.6671),
(2, 'Caprice', 'Fast Food', 37.3217, 13.6671),
(3, 'Caprice', 'Fast Food', 37.3217, 13.6671),
(4, 'Caprice', 'Fast Food', 37.3217, 13.6671),
(5, 'Caprice', 'Fast Food', 37.3217, 13.6671),
(6, 'Caprice', 'Reasturant', 37.3217, 13.6671);

-- --------------------------------------------------------

--
-- Struttura della tabella `tipologia`
--

CREATE TABLE `tipologia` (
  `id_tipo` int(255) NOT NULL,
  `tipo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `tipologia`
--

INSERT INTO `tipologia` (`id_tipo`, `tipo`) VALUES
(1, 'Cafè'),
(2, 'Bakery'),
(3, 'Reasturant'),
(4, 'Pizzeria'),
(5, 'FastFood');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`ID_pos`);

--
-- Indici per le tabelle `tipologia`
--
ALTER TABLE `tipologia`
  ADD PRIMARY KEY (`id_tipo`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `locations`
--
ALTER TABLE `locations`
  MODIFY `ID_pos` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `tipologia`
--
ALTER TABLE `tipologia`
  MODIFY `id_tipo` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
