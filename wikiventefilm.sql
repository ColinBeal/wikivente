-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 03 avr. 2018 à 21:19
-- Version du serveur :  5.7.17
-- Version de PHP :  7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `wikiventefilm`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `titre` varchar(255) NOT NULL,
  `id` int(10) NOT NULL,
  `prix` int(10) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `version` varchar(255) NOT NULL,
  `urlimage` varchar(255) NOT NULL DEFAULT 'noimage.png',
  `support` varchar(255) NOT NULL,
  `etat` varchar(20) NOT NULL DEFAULT 'waiting'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`titre`, `id`, `prix`, `description`, `categorie`, `version`, `urlimage`, `support`, `etat`) VALUES
('Le seigneur des anneaux : la communauté de l\'anneau.', 1, 25, 'Le Seigneur des anneaux : La Communauté de l\'anneau (The Lord of The Rings: The Fellowship of the Ring) est un film américano-néo-zélandais réalisé par Peter Jackson, sorti en 2001. C\'est le premier volet de la trilogie Le Seigneur des anneaux et l\'adaptation du livre La Fraternité de l\'Anneau de J. R. R. Tolkien.', 'Fantastique', 'Collector Longue', 'images/lotr1vhs.jpg', 'VHS', 'accepted'),
('Le seigneur des anneaux : la communauté de l\'anneau.', 2, 16, 'Le Seigneur des anneaux : La Communauté de l\'anneau (The Lord of The Rings: The Fellowship of the Ring) est un film américano-néo-zélandais réalisé par Peter Jackson, sorti en 2001. C\'est le premier volet de la trilogie Le Seigneur des anneaux et l\'adaptation du livre La Fraternité de l\'Anneau de J. R. R. Tolkien.', 'Fantastique', 'Prestige', 'images/lotr1dvd.jpg', 'DVD', 'accepted'),
('Le seigneur des anneaux : la communauté de l\'anneau.', 3, 20, 'Le Seigneur des anneaux : La Communauté de l\'anneau (The Lord of The Rings: The Fellowship of the Ring) est un film américano-néo-zélandais réalisé par Peter Jackson, sorti en 2001. C\'est le premier volet de la trilogie Le Seigneur des anneaux et l\'adaptation du livre La Fraternité de l\'Anneau de J. R. R. Tolkien.', 'Fantastique', 'Collector', 'images/lotr1bluray.jpg', 'BLU-RAY', 'accepted'),
('Le seigneur des anneaux : la communauté de l\'anneau.', 4, 20, 'Le Seigneur des anneaux : La Communauté de l\'anneau (The Lord of The Rings: The Fellowship of the Ring) est un film américano-néo-zélandais réalisé par Peter Jackson, sorti en 2001. C\'est le premier volet de la trilogie Le Seigneur des anneaux et l\'adaptation du livre La Fraternité de l\'Anneau de J. R. R. Tolkien.', 'Fantastique', 'Collector Longue', 'images/lotr1dvd2.jpg', 'DVD', 'accepted'),
('ssd', 15, 2, 'sdsd', 'Fantastique', 'Collector', 'noimage.png', 'VHS', 'accepted'),
('dgdrg', 16, 5, 'gdrg', 'Fantastique', 'Longue', 'noimage.png', 'VHS', 'accepted');

-- --------------------------------------------------------

--
-- Structure de la table `meta_menu`
--

CREATE TABLE `meta_menu` (
  `nom` varchar(255) NOT NULL,
  `lien` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `meta_menu`
--

INSERT INTO `meta_menu` (`nom`, `lien`, `id`) VALUES
('Accueil', 'index.php', 1),
('Série', 'liste_serie.php', 2),
('Film', 'liste_film.php', 3),
('Annonces', 'liste_annonce.php', 4),
('Panier', 'panier.php', 5),
('Recherche', 'recherche.php', 6),
('moderation', 'moderation.php', 7),
('Ajout Annonce', 'creer_annonce.php', 8);

-- --------------------------------------------------------

--
-- Structure de la table `recherche`
--

CREATE TABLE `recherche` (
  `id` int(2) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `type` varchar(10) NOT NULL,
  `att_name` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recherche`
--

INSERT INTO `recherche` (`id`, `nom`, `type`, `att_name`) VALUES
(1, 'titre', 'text', 'titre'),
(2, 'version', 'select', 'version'),
(3, 'prix-min', 'number', 'min'),
(4, 'prix-max', 'number', 'max'),
(5, 'support', 'select', 'support'),
(6, 'categorie', 'select', 'categorie');

-- --------------------------------------------------------

--
-- Table structure for table `recherche_option`
--


-- Structure de la table `recherche_option`
--

CREATE TABLE `recherche_option` (
  `id` int(2) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `options` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recherche_option`
--

INSERT INTO `recherche_option` (`id`, `nom`, `options`) VALUES
(2, 'support', 'Selectionnez#VHS#DVD#BLU-RAY'),
(1, 'version', 'Selectionnez#Longue#Collector#Prestige#Collector Longue'),
(3, 'categorie', 'Selectionnez#Fantastique#Medieval#Policier#18+');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(2) NOT NULL,
  `login` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL DEFAULT 'client'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `pass`, `type`) VALUES
(1, 'michodu21', 'lolilol', 'client'),
(2, 'colindesbois', 'cocolapin', 'client'),
(3, 'modo1', 'modo1', 'moderateur'),
(4, 'agentcomm1', 'agentcomm1', 'communication'),
(5, 'contrib1', 'contrib1', 'contributeur'),
(6, 'alex', 'alex', 'client');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `meta_menu`
--
ALTER TABLE `meta_menu`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `recherche`
--
ALTER TABLE `recherche`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `recherche_option`
--
ALTER TABLE `recherche_option`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `meta_menu`
--
ALTER TABLE `meta_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `recherche`
--
ALTER TABLE `recherche`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `recherche_option`
--
ALTER TABLE `recherche_option`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
