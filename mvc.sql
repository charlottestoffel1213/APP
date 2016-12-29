-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 16 Décembre 2016 à 11:48
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `mvc`
--

CREATE TABLE `mvc` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `mvc`
--

INSERT INTO `mvc` (`id`, `username`, `password`) VALUES
(1, 'cha', 'cha'),
(2, 'cha', 'cha'),
(3, 'charlotte', 'cha'),
(4, 'cha', 'cha'),
(5, 'char', 'cha'),
(6, 'char', 'CHA'),
(7, 'CHA', 'CHA'),
(8, 'Gaga', 'souvanheuane'),
(9, 'cha', 'cha'),
(10, 'chacha', 'cha'),
(11, 'chacha', 'cha'),
(12, 'cha', 'cha'),
(13, 'cha', 'cha'),
(14, 'cha', 'cha'),
(15, 'cha', 'cha'),
(16, 'cha', 'cha'),
(17, 'cha', 'fjakb'),
(18, 'charlotte', 'cha'),
(19, 'charlotte', 'cha'),
(20, 'cha', '$2y$10$blPYcni1waZBlH3.u8f2Aul6H/6EXc/UQuXyZMxnizAZ0A1v9eBIe'),
(21, 'charlotte', '$2y$10$JNKSQSCxEDijkxfS7/GA2.aiZ6ned0.dOuxtzdW7bqIQtdk0todSC'),
(22, 'aaaa', 'bbb');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `mvc`
--
ALTER TABLE `mvc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `mvc`
--
ALTER TABLE `mvc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
