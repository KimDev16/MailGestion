-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 08 fév. 2025 à 18:29
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dli`
--

-- --------------------------------------------------------

--
-- Structure de la table `courrier`
--

CREATE TABLE `courrier` (
  `ID_COURRIER` int(11) NOT NULL,
  `NO_COURRIER` int(11) NOT NULL,
  `DATE_COURRIER` datetime NOT NULL,
  `ANALYSE` varchar(1000) NOT NULL,
  `TYPE_COURRIER` int(11) NOT NULL,
  `STRUCTURE_SOURCE_DE` int(11) NOT NULL,
  `COURRIER_RECU` tinyint(1) NOT NULL,
  `nature_courrier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `courrier`
--

INSERT INTO `courrier` (`ID_COURRIER`, `NO_COURRIER`, `DATE_COURRIER`, `ANALYSE`, `TYPE_COURRIER`, `STRUCTURE_SOURCE_DE`, `COURRIER_RECU`, `nature_courrier`) VALUES
(16, 546, '2025-01-10 12:51:00', 'Analyse 1', 1, 1, 0, 0),
(17, 125, '2025-01-13 20:30:00', 'Analyse 2', 1, 1, 0, 0),
(18, 546, '2025-01-13 21:20:00', 'Analyse 3', 1, 1, 0, 0),
(20, 5646, '2025-01-13 21:51:00', 'Analyse 4', 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `destination_courrier`
--

CREATE TABLE `destination_courrier` (
  `ID_DESTINATION_COURRIER` int(11) NOT NULL,
  `ID_COURRIER` int(11) NOT NULL,
  `ID_SOURCE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `destination_courrier`
--

INSERT INTO `destination_courrier` (`ID_DESTINATION_COURRIER`, `ID_COURRIER`, `ID_SOURCE`) VALUES
(6, 16, 1),
(7, 17, 2),
(8, 18, 1),
(9, 18, 2),
(10, 20, 1),
(11, 20, 2);

-- --------------------------------------------------------

--
-- Structure de la table `structure_source`
--

CREATE TABLE `structure_source` (
  `ID_SOURCE` int(11) NOT NULL,
  `SOURCE_AR` varchar(255) NOT NULL,
  `SOURCE_FR` varchar(255) NOT NULL,
  `BOOL_DLI` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `structure_source`
--

INSERT INTO `structure_source` (`ID_SOURCE`, `SOURCE_AR`, `SOURCE_FR`, `BOOL_DLI`) VALUES
(1, 'Enterprise 1', 'E1', 1),
(2, 'Enterprise 2', 'E2', 0);

-- --------------------------------------------------------

--
-- Structure de la table `type_courrier`
--

CREATE TABLE `type_courrier` (
  `ID_COURRIER` int(11) NOT NULL,
  `TYPE_COURRIER` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type_courrier`
--

INSERT INTO `type_courrier` (`ID_COURRIER`, `TYPE_COURRIER`) VALUES
(1, 'رسالة');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `courrier`
--
ALTER TABLE `courrier`
  ADD PRIMARY KEY (`ID_COURRIER`);

--
-- Index pour la table `destination_courrier`
--
ALTER TABLE `destination_courrier`
  ADD PRIMARY KEY (`ID_DESTINATION_COURRIER`),
  ADD KEY `ID_COURRIER` (`ID_COURRIER`),
  ADD KEY `ID_SOURCE` (`ID_SOURCE`);

--
-- Index pour la table `structure_source`
--
ALTER TABLE `structure_source`
  ADD PRIMARY KEY (`ID_SOURCE`);

--
-- Index pour la table `type_courrier`
--
ALTER TABLE `type_courrier`
  ADD PRIMARY KEY (`ID_COURRIER`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `courrier`
--
ALTER TABLE `courrier`
  MODIFY `ID_COURRIER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `destination_courrier`
--
ALTER TABLE `destination_courrier`
  MODIFY `ID_DESTINATION_COURRIER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `structure_source`
--
ALTER TABLE `structure_source`
  MODIFY `ID_SOURCE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `type_courrier`
--
ALTER TABLE `type_courrier`
  MODIFY `ID_COURRIER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `destination_courrier`
--
ALTER TABLE `destination_courrier`
  ADD CONSTRAINT `destination_courrier_ibfk_1` FOREIGN KEY (`ID_COURRIER`) REFERENCES `courrier` (`ID_COURRIER`),
  ADD CONSTRAINT `destination_courrier_ibfk_2` FOREIGN KEY (`ID_SOURCE`) REFERENCES `structure_source` (`ID_SOURCE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
