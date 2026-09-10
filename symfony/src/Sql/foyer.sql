-- phpMyAdmin SQL Dump
-- version 5.2.3deb1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 10 sep. 2026 à 07:46
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
-- Structure de la table `foyer`
--

CREATE TABLE `foyer` (
  `id` int NOT NULL,
  `pere` json DEFAULT NULL,
  `mere` json DEFAULT NULL,
  `adresse_postale` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `foyer`
--

INSERT INTO `foyer` (`id`, `pere`, `mere`, `adresse_postale`) VALUES
(850495, '{\"id\": 1, \"nom\": \"BERTRAND\", \"prenom\": \"Matthieu, Joseph, Jean-Benoît\"}', '{\"id\": 2, \"nom\": \"BERTRAND\", \"prenom\": \"Benedicte, Marie-Jeanne\"}', '{\"cp\": \"89240\", \"rue\": \"Rue des Concises\", \"ville\": \"Villefargeau\", \"numeroRue\": 5}');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `foyer`
--
ALTER TABLE `foyer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `foyer`
--
ALTER TABLE `foyer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=850496;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
