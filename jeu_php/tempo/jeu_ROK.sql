-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 08, 2022 at 05:17 PM
-- Server version: 8.0.31-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jeu_ROK`
--

-- --------------------------------------------------------

--
-- Table structure for table `joueur`
--

CREATE TABLE `joueur` (
  `id` int NOT NULL,
  `pseudo` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `vitalité` int NOT NULL DEFAULT '100',
  `ressource` int NOT NULL DEFAULT '40',
  `energie` int NOT NULL DEFAULT '20',
  `troupe` int NOT NULL DEFAULT '0',
  `x` int NOT NULL,
  `y` int NOT NULL,
  `PV/s` int NOT NULL DEFAULT '1',
  `energie/s` int NOT NULL DEFAULT '1',
  `ressource/s` int NOT NULL DEFAULT '1',
  `PV_max` int NOT NULL DEFAULT '100',
  `energie_max` int NOT NULL DEFAULT '20',
  `ressource_max` int NOT NULL DEFAULT '40'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `joueur`
--

INSERT INTO `joueur` (`id`, `pseudo`, `vitalité`, `ressource`, `energie`, `troupe`, `x`, `y`, `PV/s`, `energie/s`, `ressource/s`, `PV_max`, `energie_max`, `ressource_max`) VALUES
(1, 'griffen', 100, 40, 20, 0, 500, 500, 1, 1, 1, 100, 20, 40),
(3, 'william', 100, 40, 20, 0, 520, 40, 1, 1, 1, 100, 20, 40),
(8, 'test', 100, 40, 20, 0, 470, 240, 1, 1, 1, 100, 20, 40);

-- --------------------------------------------------------

--
-- Table structure for table `troupe`
--

CREATE TABLE `troupe` (
  `id` int NOT NULL,
  `nom` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `attaque` int NOT NULL,
  `PV` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `troupe`
--

INSERT INTO `troupe` (`id`, `nom`, `attaque`, `PV`) VALUES
(1, 'barbare', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `troupe`
--
ALTER TABLE `troupe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `joueur`
--
ALTER TABLE `joueur`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `troupe`
--
ALTER TABLE `troupe`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
