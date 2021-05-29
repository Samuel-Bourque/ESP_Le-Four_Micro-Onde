-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 08 mars 2021 à 10:58
-- Version du serveur :  10.3.27-MariaDB-cll-lve
-- Version de PHP : 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hellovid_general`
--

-- --------------------------------------------------------

--
-- Structure de la table `EnAttente`
--

CREATE TABLE `EnAttente` (
  `id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `code` varchar(20) COLLATE utf16_unicode_ci NOT NULL,
  `titre` varchar(50) COLLATE utf16_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf16_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Déclencheurs `EnAttente`
--
DELIMITER $$
CREATE TRIGGER `checktablelimit` BEFORE INSERT ON `EnAttente` FOR EACH ROW BEGIN
DECLARE currentCount INT;
DECLARE message VARCHAR(256);
SELECT COUNT(*) 
 FROM EnAttente INTO currentCount ; 
IF currentCount = 30 THEN 
 SET message = 'Table already has 30 records';
 SIGNAL SQLSTATE '45000'
  SET MESSAGE_TEXT = message; 
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `Gestionnaires`
--

CREATE TABLE `Gestionnaires` (
  `id` int(11) NOT NULL,
  `courriel` varchar(50) COLLATE utf16_unicode_ci DEFAULT NULL,
  `passwd` varchar(255) COLLATE utf16_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Déchargement des données de la table `Gestionnaires`
--

INSERT INTO `Gestionnaires` (`id`, `courriel`, `passwd`) VALUES
(2, 'hellovideo2021@gmail.com', '$2y$10$2OwvpFgkJeWOPnZcIsgL6Orjw4iohZtj7IGbr55FFAiiHydcR.F7G');

-- --------------------------------------------------------

--
-- Structure de la table `Tutoriels`
--

CREATE TABLE `Tutoriels` (
  `id` int(11) NOT NULL,
  `code` varchar(20) COLLATE utf16_unicode_ci NOT NULL,
  `titre` varchar(50) COLLATE utf16_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf16_unicode_ci DEFAULT NULL,
  `enAnglais` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Videos`
--

CREATE TABLE `Videos` (
  `id` int(11) NOT NULL,
  `code` varchar(20) COLLATE utf16_unicode_ci NOT NULL,
  `titre` varchar(50) COLLATE utf16_unicode_ci DEFAULT NULL,
  `description` varchar(250) COLLATE utf16_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `EnAttente`
--
ALTER TABLE `EnAttente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Index pour la table `Gestionnaires`
--
ALTER TABLE `Gestionnaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Tutoriels`
--
ALTER TABLE `Tutoriels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Index pour la table `Videos`
--
ALTER TABLE `Videos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `EnAttente`
--
ALTER TABLE `EnAttente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Gestionnaires`
--
ALTER TABLE `Gestionnaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `Tutoriels`
--
ALTER TABLE `Tutoriels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Videos`
--
ALTER TABLE `Videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
