-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2024 at 03:06 AM
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
  `id` int(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `tipo` int(255) NOT NULL,
  `descrizione` varchar(30) NOT NULL DEFAULT 'pizzeria',
  `lat` double DEFAULT NULL,
  `lon` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `nome`, `tipo`, `descrizione`, `lat`, `lon`) VALUES
(1, 'Bar Itria', 2, 'A nice view in Itria', 37.320493463308814, 13.66392707501554),
(2, 'Oreste', 2, 'A nice bar in Piazza Cavour', 37.31448347034573, 13.659404844666904),
(3, 'Pistritto', 1, 'A beautiful pizzeria', 37.315487574594236, 13.66252563190376),
(4, 'Delice', 6, 'A very good pastry shop', 37.318901167208, 13.66347256856),
(5, 'Caprice', 6, 'A beautiful pastry shop', 37.321608160344, 13.6670152448),
(6, 'Mega Bar', 2, 'A bar near a school', 37.32306121531672, 13.671644082127944),
(7, 'San Pio', 5, 'A nice bakery with fresh bread', 37.32240537606414, 13.66941588108675),
(8, 'Sfizi di pane e pizze', 5, 'A small bakery', 37.32254244896791, 13.6702364333537),
(9, 'Arte Bianca', 1, 'Warm pizzas for everyone', 37.323069685903455, 13.671228153338676),
(10, 'Pizza Mania', 1, 'A beautiful pizzeria', 37.32176671670421, 13.66398093939106),
(11, 'La Rotonda', 1, 'A pizzeria in the centre', 37.32080096059611, 13.664033448109139),
(12, 'Mamma mia che pizza', 1, 'A cool pizzeria', 37.32088617559767, 13.665561864248875),
(13, 'Il Pasticcino', 6, 'a cool pastry shop', 37.323722304008, 13.663226042128),
(14, 'Panificio S. Antonio', 5, 'Fresh bread everyday', 37.32290374144385, 13.663463562598844),
(15, 'Bar Arnone', 2, 'A small but good bar', 37.321297834182815, 13.664008492885024),
(16, 'McDonald', 4, 'A famous FastFood', 37.270875846667366, 13.6228976168274),
(17, 'Cocoa', 3, 'A aperitv local', 37.309477271508065, 13.646502582535524),
(18, 'Sciauru', 3, 'A medium restaurant in Favara', 37.30583226222704, 13.65121035919294),
(19, 'Cavou Food Experience', 3, 'Big hamburgers', 37.30654134874106, 13.652505783979306),
(20, 'Cosi Dunci', 6, 'Very sweet things', 37.3072134975, 13.653699060618),
(21, 'Bottone', 2, 'long and short drinks', 37.3070567011496, 13.645812068548548),
(22, 'Il Casello', 3, 'A well known restaurant', 37.31235984338139, 13.661514465712644),
(23, 'Ostrea', 3, 'The fish is good', 37.307603936043, 13.65619826625),
(24, 'Stoner', 7, 'a pub', 37.30786097696241, 13.656476969388722),
(25, 'Studio Bar', 4, 'Good piadinas', 37.30623542522303, 13.648884338070538),
(26, 'King', 1, 'We make pizza too', 37.30586982048878, 13.649068195430457),
(27, 'Parigi Bistrot', 1, 'Nice food', 37.30882855640086, 13.644596521422693),
(28, 'Velo', 1, 'Good cocktails', 37.31717597757317, 13.658275151657808),
(29, 'Antica Panetteria', 1, 'Good bread everyday', 37.31788552503647, 13.659767112935008);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(0, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tipologia`
--

CREATE TABLE `tipologia` (
  `id` int(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `id_tipo` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipologia`
--

INSERT INTO `tipologia` (`id`, `tipo`, `id_tipo`) VALUES
(1, 'pizzeria', NULL),
(2, 'cafe', NULL),
(3, 'restaurant', NULL),
(4, 'fastfood', NULL),
(5, 'bakery', NULL),
(6, 'pastry shop', NULL),
(7, 'pub', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tipologia_id` (`tipo`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipologia`
--
ALTER TABLE `tipologia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tipologia`
--
ALTER TABLE `tipologia`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `fk_tipologia_id` FOREIGN KEY (`tipo`) REFERENCES `tipologia` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
