-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 28 avr. 2024 à 02:52
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_fin_etude`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `ID_Admin` varchar(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `mot_de_passe` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`ID_Admin`, `nom`, `prenom`, `email`, `mot_de_passe`) VALUES
('123R', 'Ben Moussa', 'selma', 'selma@gmail.com', '1234S');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `Num_Client` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `adresse` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`Num_Client`, `nom`, `prenom`, `adresse`, `email`) VALUES
(1, 'El Badmoussi', 'Anouar', 'Rue 05 hay sabadiya', 'anouar@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `demande_stage`
--

CREATE TABLE `demande_stage` (
  `ID_Demande` int(11) NOT NULL,
  `ID_Stagiaire` int(11) DEFAULT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `Texte` varchar(30) DEFAULT NULL,
  `Cv` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `demande_stage`
--

INSERT INTO `demande_stage` (`ID_Demande`, `ID_Stagiaire`, `nom`, `prenom`, `Texte`, `Cv`) VALUES
(10000, 100, 'El Morabit', 'Med', 'je veux un stage', 'hello');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `Num_Facture` int(11) NOT NULL,
  `Num_Client` int(11) DEFAULT NULL,
  `Num_Contrat` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`Num_Facture`, `Num_Client`, `Num_Contrat`) VALUES
(1000, 1, '983417');

-- --------------------------------------------------------

--
-- Structure de la table `stagiaire`
--

CREATE TABLE `stagiaire` (
  `ID_Stagiaire` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `stagiaire`
--

INSERT INTO `stagiaire` (`ID_Stagiaire`, `nom`, `prenom`, `email`, `date_naissance`) VALUES
(100, 'El Morabit', 'Med', 'med@gmail.com', '2000-10-10');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_Admin`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`Num_Client`);

--
-- Index pour la table `demande_stage`
--
ALTER TABLE `demande_stage`
  ADD PRIMARY KEY (`ID_Demande`),
  ADD KEY `ID_Stagiaire` (`ID_Stagiaire`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`Num_Facture`),
  ADD KEY `Num_Client` (`Num_Client`);

--
-- Index pour la table `stagiaire`
--
ALTER TABLE `stagiaire`
  ADD PRIMARY KEY (`ID_Stagiaire`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `Num_Client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `demande_stage`
--
ALTER TABLE `demande_stage`
  MODIFY `ID_Demande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10001;

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `Num_Facture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;

--
-- AUTO_INCREMENT pour la table `stagiaire`
--
ALTER TABLE `stagiaire`
  MODIFY `ID_Stagiaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `demande_stage`
--
ALTER TABLE `demande_stage`
  ADD CONSTRAINT `demande_stage_ibfk_1` FOREIGN KEY (`ID_Stagiaire`) REFERENCES `stagiaire` (`ID_Stagiaire`);

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `facture_ibfk_1` FOREIGN KEY (`Num_Client`) REFERENCES `client` (`Num_Client`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
