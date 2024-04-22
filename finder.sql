-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 11:56 PM
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
-- Database: `finder`
--

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id_pos` int(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `tipologia` varchar(255) NOT NULL,
  `descrizione` varchar(255) NOT NULL DEFAULT 'pizzeria',
  `lat` double DEFAULT NULL,
  `lon` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id_pos`, `nome`, `tipologia`, `descrizione`, `lat`, `lon`) VALUES
(1, 'Caprice 1', 'pizzeria', 'Desc 1', 37.30830848313282, 13.656475862341866),
(2, 'Caprice 2', 'cafe', 'Desc 2', 37.308103677377154, 13.656832596137313),
(3, 'Caprice 3', 'restaurant', 'Desc 3', 37.30778366726766, 13.656913062402745),
(4, 'Caprice 4', 'bakery', 'Desc 4', 37.307580993493396, 13.656738718841567),
(5, 'Caprice 5', 'biscotteria', 'Desc 5', 37.30763432875002, 13.656127175253452),
(6, 'Très Chich', 'fastfood', 'Desc 6', 37.307860469817754, 13.656052073409295),
(7, 'Très Chich', 'pub', 'Desc 7', 37.30808447680866, 13.656191548262726),
(8, 'LSLSLSL', 'pub', 'Desc 8', 37.32170104980469, 23.2322998046875),
(9, 'Caprice 9', 'cafe', 'Desc 9', 37.32170104980469, 13.667099952697754),
(10, 'Caprice 10', 'restaurant', 'Desc 10', 37.32170104980469, 13.667099952697754),
(11, 'Sambriglia', 'sconosciuta', 'L´unico ristorante di Sutera', 37.523929595947266, 13.736589431762695);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id_pos`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id_pos` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
