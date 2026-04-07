-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 07 avr. 2026 à 06:02
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `agences`
--

INSERT INTO `agences` (`id_agence`, `ville_agence`) VALUES
(1, 'Paris'),
(2, 'Lyon'),
(3, 'Marseille'),
(4, 'Toulouse'),
(5, 'Nice'),
(6, 'Nantes'),
(7, 'Strasbourg'),
(8, 'Montpellier'),
(9, 'Bordeaux'),
(10, 'Lille'),
(11, 'Rennes'),
(12, 'Reims'),
(13, 'Aurillac');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `trajets`
--

INSERT INTO `trajets` (`id_trajets`, `depart_agence_trajet`, `depart_date_trajet`, `arrivee_agence_trajet`, `arrivee_date_trajet`, `places_dispo_trajet`, `total_place_trajet`, `id_users`) VALUES
(1, 3, '2026-04-12 12:00:00', 8, '2026-04-12 14:00:00', 3, 4, 1),
(6, 9, '2026-04-19 14:32:33', 4, '2026-04-19 16:32:33', 2, 4, 10),
(7, 1, '2026-04-15 08:32:33', 2, '2026-04-19 12:32:33', 2, 3, 20),
(8, 12, '2026-04-22 07:00:11', 1, '2026-04-22 10:00:10', 1, 5, 4),
(10, 2, '2026-04-29 10:00:00', 3, '2026-04-29 13:00:00', 2, 5, 21);

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_users`, `nom_users`, `prenom_users`, `phone_users`, `mail_users`, `password_users`, `is_admin_users`) VALUES
(1, 'Martin', 'Alexandre', '0612345678', 'alexandre.martin@email.fr', '', 0),
(2, 'Dubois', 'Sophie', '0698765432', 'sophie.dubois@email.fr', '', 0),
(3, 'Bernard', 'Julien', '0622446688', 'julien.bernard@email.fr', '', 0),
(4, 'Moreau', 'Camille', '0611223344', 'camille.moreau@email.fr', '', 0),
(5, 'Lefèvre', 'Lucie', '0777889900', 'lucie.lefevre@email.fr', '', 0),
(6, 'Leroy', 'Thomas', '0655443322', 'thomas.leroy@email.fr', '', 0),
(7, 'Roux', 'Chloé', '0633221199', 'chloe.roux@email.fr', '', 0),
(8, 'Petit', 'Maxime', '0766778899', 'maxime.petit@email.fr', '', 0),
(9, 'Garnier', 'Laura', '0688776655', 'laura.garnier@email.fr', '', 0),
(10, 'Dupuis', 'Antoine', '0744556677', 'antoine.dupuis@email.fr', '', 0),
(11, 'Lefebvre', 'Emma', '0699887766', 'emma.lefebvre@email.fr', '', 0),
(12, 'Fontaine', 'Louis', '0655667788', 'louis.fontaine@email.fr', '', 0),
(13, 'Chevalier', 'Clara', '0788990011', 'clara.chevalier@email.fr', '', 0),
(14, 'Robin', 'Nicolas', '0644332211', 'nicolas.robin@email.fr', '', 0),
(15, 'Gauthier', 'Marine', '0677889922', 'marine.gauthier@email.fr', '', 0),
(16, 'Fournier', 'Pierre', '0722334455', 'pierre.fournier@email.fr', '', 0),
(17, 'Girard', 'Sarah', '0688665544', 'sarah.girard@email.fr', '', 0),
(18, 'Lambert', 'Hugo', '0611223366', 'hugolambert@email.fr', '', 0),
(19, 'Masson', 'Julie', '0733445566', 'julie.masson@email.fr\r\n', '', 0),
(20, 'Henry', 'Arthur', '0666554433', 'arthur.henry@email.fr', '', 0),
(21, 'NomTest', 'PrenomTest', '0102030405', 'test@email.com', '$2y$10$v.isUc9nV0hC3mSEAc.VdexWn0cfacWeODPTIralD5/D4HMSsgU.u', 0),
(22, 'Admin', 'Admin', '0607080910', 'admin@email.com', '$2y$10$QlYXw/gyammE9SpUImm80umFJUYdRBfsiU948ewqVoCAi4cHY/UNS', 1);

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
