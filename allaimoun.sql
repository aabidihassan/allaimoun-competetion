-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 24, 2022 at 11:56 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `allaimoun`
--

-- --------------------------------------------------------

--
-- Table structure for table `facture`
--

CREATE TABLE `facture` (
  `id` int(11) NOT NULL,
  `mois` int(2) NOT NULL,
  `type` varchar(4) NOT NULL,
  `montant` double NOT NULL,
  `participant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `facture`
--

INSERT INTO `facture` (`id`, `mois`, `type`, `montant`, `participant`) VALUES
(11, 1, 'elec', 200, 6),
(12, 1, 'eau', 150, 6),
(13, 2, 'elec', 250, 6),
(14, 2, 'eau', 100, 6),
(15, 3, 'elec', 100, 6),
(16, 3, 'eau', 150, 6),
(17, 1, 'elec', 200, 7),
(18, 1, 'eau', 300, 7),
(19, 2, 'elec', 300, 7),
(20, 2, 'eau', 100, 7),
(21, 3, 'elec', 200, 7),
(22, 3, 'eau', 150, 7),
(23, 1, 'elec', 250, 9),
(24, 1, 'eau', 100, 9),
(25, 2, 'elec', 150, 9),
(26, 2, 'eau', 200, 9),
(27, 3, 'elec', 200, 9),
(28, 3, 'eau', 250, 9),
(29, 1, 'elec', 100, 10),
(30, 1, 'eau', 130, 10),
(31, 2, 'elec', 200, 10),
(32, 2, 'eau', 100, 10),
(33, 3, 'elec', 150, 10),
(34, 3, 'eau', 190, 10),
(35, 1, 'elec', 130, 8),
(36, 1, 'eau', 150, 8),
(37, 2, 'elec', 240, 8),
(38, 2, 'eau', 300, 8),
(39, 3, 'elec', 200, 8),
(40, 3, 'eau', 250, 8);

-- --------------------------------------------------------

--
-- Table structure for table `Participation`
--

CREATE TABLE `Participation` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `adresse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Participation`
--

INSERT INTO `Participation` (`id`, `nom`, `prenom`, `telephone`, `adresse`) VALUES
(6, 'Aabidi', 'Hassan', '0637842698', 'izdihar Marrakech'),
(7, 'Elhajjout', 'Abderrahman', '0612345678', 'Merjane Marrakech'),
(8, 'Hamza', 'Laila', '0612341234', 'Mabrouka Marrakech'),
(9, 'Lechhab', 'Hind', '0612345678', 'Douha Marrakech'),
(10, 'Essakhi', 'Hamza', '0600000000', 'Sidi Abbad Marrakech');

-- --------------------------------------------------------

--
-- Table structure for table `total`
--

CREATE TABLE `total` (
  `id` int(11) NOT NULL,
  `totaleau` double NOT NULL,
  `totalelec` double NOT NULL,
  `participant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `total`
--

INSERT INTO `total` (`id`, `totaleau`, `totalelec`, `participant`) VALUES
(5, 400, 550, 6),
(6, 550, 700, 7),
(7, 550, 600, 9),
(8, 420, 450, 10),
(9, 700, 570, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Participation`
--
ALTER TABLE `Participation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total`
--
ALTER TABLE `total`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `facture`
--
ALTER TABLE `facture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `Participation`
--
ALTER TABLE `Participation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `total`
--
ALTER TABLE `total`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
