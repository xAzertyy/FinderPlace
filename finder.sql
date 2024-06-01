-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2024 at 03:07 PM
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
-- Database: `my_finderplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id_pos` int(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `tipologia` varchar(255) NOT NULL,
  `descrizione` varchar(30) NOT NULL DEFAULT 'pizzeria',
  `lat` double DEFAULT NULL,
  `lon` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id_pos`, `nome`, `tipologia`, `descrizione`, `lat`, `lon`) VALUES
(1, 'Bar Itria', 'cafe', 'A nice view in Itria', 37.320493463308814, 13.66392707501554),
(2, 'Oreste', 'cafe', 'A nice bar in Piazza Cavour', 37.31448347034573, 13.659404844666904),
(3, 'Pistritto', 'pizzeria', 'A beautiful pizzeria', 37.315487574594236, 13.66252563190376),
(4, 'Delice', 'pastry shop', 'A very good pastry shop', 37.318901167208, 13.66347256856),
(5, 'Caprice', 'pastry shop', 'A beautiful pastry shop', 37.321608160344, 13.6670152448),
(6, 'Mega Bar', 'cafe', 'A bar near a school', 37.32306121531672, 13.671644082127944),
(7, 'San Pio', 'bakery', 'A nice bakery with fresh bread', 37.32240537606414, 13.66941588108675),
(8, 'Sfizi di pane e pizze', 'bakery', 'A small bakery', 37.32254244896791, 13.6702364333537),
(9, 'Arte Bianca', 'pizzeria', 'Warm pizzas for everyone', 37.323069685903455, 13.671228153338676),
(10, 'Pizza Mania', 'pizzeria', 'A beautiful pizzeria', 37.32176671670421, 13.66398093939106),
(11, 'La Rotonda', 'pizzeria', 'A pizzeria in the centre', 37.32080096059611, 13.664033448109139),
(12, 'Mamma mia che pizza', 'pizzeria', 'A cool pizzeria', 37.32088617559767, 13.665561864248875),
(13, 'Il Pasticcino', 'pastry shop', 'a cool pastry shop', 37.323722304008, 13.663226042128),
(14, 'Panificio S. Antonio', 'bakery', 'Fresh bread everyday', 37.32290374144385, 13.663463562598844),
(15, 'Bar Arnone', 'cafe', 'A small but good bar', 37.321297834182815, 13.664008492885024),
(16, 'McDonald', 'fastfood', 'A famous FastFood', 37.270875846667366, 13.6228976168274),
(17, 'Cocoa', 'restaurant', 'A aperitv local', 37.309477271508065, 13.646502582535524),
(18, 'Sciauru', 'restaurant', 'A medium restaurant in Favara', 37.30583226222704, 13.65121035919294),
(19, 'Cavou Food Experience', 'restaurant', 'Big hamburgers', 37.30654134874106, 13.652505783979306),
(20, 'Cosi Dunci', 'pastry shop', 'Very sweet things', 37.3072134975, 13.653699060618),
(21, 'Bottone', 'cafe', 'long and short drinks', 37.3070567011496, 13.645812068548548),
(22, 'Il Casello', 'restaurant', 'A well known restaurant', 37.31235984338139, 13.661514465712644),
(23, 'Ostrea', 'restaurant', 'The fish is good', 37.307603936043, 13.65619826625),
(24, 'Stoner', 'pub', 'a pub', 37.30786097696241, 13.656476969388722),
(25, 'Studio Bar', 'fastfood', 'Good piadinas', 37.30623542522303, 13.648884338070538),
(26, 'King', 'restaurant', 'We make pizza too', 37.30586982048878, 13.649068195430457),
(27, 'Parigi Bistrot', 'restaurant', 'Nice food', 37.30882855640086, 13.644596521422693),
(28, 'Velo', 'pub', 'Good cocktails', 37.31717597757317, 13.658275151657808),
(29, 'Antica Panetteria', 'bakery', 'Good bread everyday', 37.31788552503647, 13.659767112935008);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_admin` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_admin`, `username`, `password`) VALUES
(0, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tipologia`
--

CREATE TABLE `tipologia` (
  `id_tipo` int(255) NOT NULL,
  `tipo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipologia`
--

INSERT INTO `tipologia` (`id_tipo`, `tipo`) VALUES
(1, 'pizzeria'),
(2, 'cafe'),
(3, 'restaurant'),
(4, 'fastfood'),
(5, 'bakery'),
(6, 'pastry shop'),
(7, 'pub');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id_pos`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tipologia`
--
ALTER TABLE `tipologia`
  ADD PRIMARY KEY (`id_tipo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id_pos` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tipologia`
--
ALTER TABLE `tipologia`
  MODIFY `id_tipo` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
