-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 20 Juin 2017 à 11:16
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `do`
--

-- --------------------------------------------------------

--
-- Structure de la table `materiels`
--

CREATE TABLE `materiels` (
  `id` int(11) NOT NULL,
  `Urgence` varchar(80) NOT NULL,
  `Etat_du_dossier` varchar(80) NOT NULL,
  `Zone_de_stockage` varchar(80) NOT NULL,
  `Num_Entree_CRESA` varchar(80) NOT NULL,
  `Num_Contenu_CRESA` varchar(80) NOT NULL,
  `Marque` varchar(80) NOT NULL,
  `Autre_marque` varchar(80) NOT NULL,
  `Modele_Type` varchar(80) NOT NULL,
  `Num_IMEI` varchar(80) NOT NULL,
  `Titre` varchar(80) NOT NULL,
  `Num_de_Serie` varchar(80) NOT NULL,
  `Description` varchar(80) NOT NULL,
  `Archive` int(10) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `materiels`
--
ALTER TABLE `materiels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `materiels`
--
ALTER TABLE `materiels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
