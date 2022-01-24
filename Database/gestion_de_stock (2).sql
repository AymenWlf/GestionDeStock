-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 24 jan. 2022 à 10:59
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion de stock`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `ID_article` int(10) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `description` varchar(40) NOT NULL,
  `nombre_en_stock` int(20) NOT NULL,
  `image` varchar(250) NOT NULL,
  `id_categorie` int(10) NOT NULL,
  `id_fournisseur` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`ID_article`, `nom`, `description`, `nombre_en_stock`, `image`, `id_categorie`, `id_fournisseur`) VALUES
(1970, 'Camembert', 'Bon', 5, 'test.png', 1, 1),
(1971, 'Emmentale', 'Bon', 5, 'test.png', 1, 1),
(1972, 'Ouallaf', 'Bon', 8, 'test.png', 1, 1),
(1975, 'Fromage', 'Bon', 4, 'test.png', 2, 2),
(1976, 'Z', 'Bon', 4, 'test.png', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `ID_categorie` int(10) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`ID_categorie`, `nom`, `description`) VALUES
(1, 'phone', 'phones'),
(2, 'Accessoires', 'dsvdsvdvsdvvdsvdsvsdvdsdvsdvsdvsvsdvsd'),
(3, 'Accessoires', 'dsvdsvdvsdvvdsvdsvsdvdsdvsdvsdvsvsdvsd');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `ID_fournisseur` int(10) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `cin` char(10) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `telephone` int(10) NOT NULL,
  `email` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`ID_fournisseur`, `nom`, `prenom`, `cin`, `adresse`, `telephone`, `email`) VALUES
(1, 'ouallaf', 'aymen', 'BK87654', 'liduegdz ezvdezhd yuezvz', 6149898, 'test@gmail.com'),
(2, 'othmane', 'draga', 'BK83735', 'liduegdz ezvdezhd yuezvz', 6149898, 'test2@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `codeprod` varchar(10) NOT NULL,
  `nomprod` varchar(100) NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`codeprod`, `nomprod`, `prix`) VALUES
('nd', 'nido', 2750),
('s', 's', 1),
('scr', 'sucre en paquet', 1000),
('sp', 'spagueti', 500),
('sr', 'sardine', 500),
('ss', 'sss', 22344),
('sv', 'savon', 350);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(8, 'Pure Coding', 'example@gmail.com', '0139a3c5cf42394be982e766c93f5ed0'),
(0, 'youssef', 'youssef.example@gmail.com', '3b2285b348e95774cb556cb36e583106'),
(0, 'zakaria', 'zakaria.example@gmail.com', 'a01610228fe998f515a72dd730294d87'),
(0, 'test', 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`ID_article`),
  ADD KEY `id_categorie` (`id_categorie`),
  ADD KEY `id_fournisseur` (`id_fournisseur`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`ID_categorie`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`ID_fournisseur`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`codeprod`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `ID_article` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1977;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `ID_categorie` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `ID_fournisseur` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_fournisseur` FOREIGN KEY (`id_fournisseur`) REFERENCES `fournisseur` (`ID_fournisseur`),
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`ID_categorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
