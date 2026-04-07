-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 07 avr. 2026 à 06:04
-- Version du serveur : 8.4.7
-- Version de PHP : 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tpak`
--

-- --------------------------------------------------------

--
-- Structure de la table `agences`
--

DROP TABLE IF EXISTS `agences`;
CREATE TABLE IF NOT EXISTS `agences` (
  `id_agence` int NOT NULL AUTO_INCREMENT,
  `ville_agence` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_agence`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `trajets`
--

DROP TABLE IF EXISTS `trajets`;
CREATE TABLE IF NOT EXISTS `trajets` (
  `id_trajets` int NOT NULL AUTO_INCREMENT,
  `depart_agence_trajet` int NOT NULL,
  `depart_date_trajet` datetime NOT NULL,
  `arrivee_agence_trajet` int NOT NULL,
  `arrivee_date_trajet` datetime NOT NULL,
  `places_dispo_trajet` tinyint NOT NULL,
  `total_place_trajet` tinyint NOT NULL,
  `id_users` int NOT NULL,
  PRIMARY KEY (`id_trajets`),
  KEY `depart_agence_trajet` (`depart_agence_trajet`),
  KEY `arrivee_agence_trajet` (`arrivee_agence_trajet`),
  KEY `id_users` (`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_users` int NOT NULL AUTO_INCREMENT,
  `nom_users` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_users` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_users` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_users` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  `password_users` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin_users` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `trajets`
--
ALTER TABLE `trajets`
  ADD CONSTRAINT `trajets_ibfk_1` FOREIGN KEY (`depart_agence_trajet`) REFERENCES `agences` (`id_agence`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `trajets_ibfk_2` FOREIGN KEY (`arrivee_agence_trajet`) REFERENCES `agences` (`id_agence`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `trajets_ibfk_3` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
