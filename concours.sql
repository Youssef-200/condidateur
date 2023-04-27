-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 04 avr. 2023 à 19:53
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `concours`
--

-- --------------------------------------------------------

--
-- Structure de la table `etud3a`
--

CREATE TABLE `etud3a` (
  `id_3` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(40) NOT NULL,
  `date_naiss` date NOT NULL,
  `diplome` varchar(40) NOT NULL,
  `niveau` varchar(30) NOT NULL,
  `etbalissement` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `log` varchar(255) NOT NULL,
  `mdp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etud3a`
--

INSERT INTO `etud3a` (`id_3`, `nom`, `prenom`, `email`, `date_naiss`, `diplome`, `niveau`, `etbalissement`, `photo`, `cv`, `log`, `mdp`) VALUES
(14, 'H', 'H', 'o@gmail.com', '2023-04-01', 'HH', '3eme', '', 'cojo-rosales-BtCaPpajwBo-unsplash.jpg', 'ramon-kagie-iSwzfjgD3uU-unsplash.jpg', 'JJ', '2001');

-- --------------------------------------------------------

--
-- Structure de la table `etud4a`
--

CREATE TABLE `etud4a` (
  `id_4` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(40) NOT NULL,
  `date_naiss` date NOT NULL,
  `diplome` varchar(40) NOT NULL,
  `niveau` varchar(30) NOT NULL,
  `etbalissement` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `log` varchar(255) NOT NULL,
  `mdp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etud4a`
--

INSERT INTO `etud4a` (`id_4`, `nom`, `prenom`, `email`, `date_naiss`, `diplome`, `niveau`, `etbalissement`, `photo`, `cv`, `log`, `mdp`) VALUES
(1, 'H', 'H', 'o@gmail.com', '2023-04-01', 'HH', '3', '', 'cojo-rosales-BtCaPpajwBo-unsplash.jpg', 'kristaps-ungurs-8sehVODwNtk-unsplash.jpg', 'JJ', '2001');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `etud3a`
--
ALTER TABLE `etud3a`
  ADD PRIMARY KEY (`id_3`);

--
-- Index pour la table `etud4a`
--
ALTER TABLE `etud4a`
  ADD PRIMARY KEY (`id_4`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `etud3a`
--
ALTER TABLE `etud3a`
  MODIFY `id_3` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `etud4a`
--
ALTER TABLE `etud4a`
  MODIFY `id_4` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
