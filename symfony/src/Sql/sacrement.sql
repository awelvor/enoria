-- phpMyAdmin SQL Dump
-- version 5.2.3deb1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : dim. 06 sep. 2026 à 08:06
-- Version du serveur : 8.4.11-0ubuntu0.26.04.1
-- Version de PHP : 8.5.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `enoria`
--

-- --------------------------------------------------------

--
-- Structure de la table `sacrement`
--

CREATE TABLE `sacrement` (
  `id` int NOT NULL,
  `type` varchar(50) NOT NULL,
  `date_prevue` date DEFAULT NULL,
  `lieu_reservation` longtext,
  `entite_liee` longtext,
  `dossier_beneficiaires` longtext,
  `dossier` longtext,
  `celebrant` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `sacrement`
--

INSERT INTO `sacrement` (`id`, `type`, `date_prevue`, `lieu_reservation`, `entite_liee`, `dossier_beneficiaires`, `dossier`, `celebrant`) VALUES
(169025, 'bapteme', '2026-01-02', NULL, '[\'nom\'=>\'lannion\']', NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `sacrement`
--
ALTER TABLE `sacrement`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `sacrement`
--
ALTER TABLE `sacrement`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169026;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
