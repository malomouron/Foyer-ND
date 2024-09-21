-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 21 sep. 2024 à 11:05
-- Version du serveur : 8.3.0
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Structure de la table `foyer_insr`
--

DROP TABLE IF EXISTS `foyer_insr`;
CREATE TABLE IF NOT EXISTS `foyer_insr` (
  `id_foyer` int NOT NULL AUTO_INCREMENT,
  `prenom_foyer` varchar(20) NOT NULL,
  `nom_foyer` varchar(20) NOT NULL,
  `id_ph` int NOT NULL,
  `id_js` int NOT NULL,
  PRIMARY KEY (`id_foyer`),
  KEY `fk_foyer_insr_jour-semaine` (`id_js`),
  KEY `fk_foyer_insr_plage-horaire` (`id_ph`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `foyer_jour_semaine`
--

DROP TABLE IF EXISTS `foyer_jour_semaine`;
CREATE TABLE IF NOT EXISTS `foyer_jour_semaine` (
  `id_js` int NOT NULL AUTO_INCREMENT,
  `jour-semaine` varchar(20) NOT NULL,
  PRIMARY KEY (`id_js`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `foyer_plage_horaire`
--

DROP TABLE IF EXISTS `foyer_plage_horaire`;
CREATE TABLE IF NOT EXISTS `foyer_plage_horaire` (
  `id_ph` int NOT NULL AUTO_INCREMENT,
  `plage_horaire` varchar(20) NOT NULL,
  PRIMARY KEY (`id_ph`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `foyer_insr`
--
ALTER TABLE `foyer_insr`
  ADD CONSTRAINT `fk_foyer_insr_jour-semaine` FOREIGN KEY (`id_js`) REFERENCES `foyer_jour_semaine` (`id_js`),
  ADD CONSTRAINT `fk_foyer_insr_plage-horaire` FOREIGN KEY (`id_ph`) REFERENCES `foyer_plage_horaire` (`id_ph`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
