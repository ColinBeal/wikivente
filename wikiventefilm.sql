-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 06 fév. 2018 à 16:26
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

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
  `urlimage` varchar(255) NOT NULL,
  `support` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`titre`, `id`, `prix`, `description`, `categorie`, `version`, `urlimage`, `support`) VALUES
('Le seigneur des anneaux : la communauté de l\'anneau.', 1, 25, 'Le Seigneur des anneaux : La Communauté de l\'anneau (The Lord of The Rings: The Fellowship of the Ring) est un film américano-néo-zélandais réalisé par Peter Jackson, sorti en 2001. C\'est le premier volet de la trilogie Le Seigneur des anneaux et l\'adaptation du livre La Fraternité de l\'Anneau de J. R. R. Tolkien.', 'Fantastique', 'Collector Longue', 'images/lotr1vhs.jpg', 'VHS'),
('Le seigneur des anneaux : la communauté de l\'anneau.', 2, 16, 'Le Seigneur des anneaux : La Communauté de l\'anneau (The Lord of The Rings: The Fellowship of the Ring) est un film américano-néo-zélandais réalisé par Peter Jackson, sorti en 2001. C\'est le premier volet de la trilogie Le Seigneur des anneaux et l\'adaptation du livre La Fraternité de l\'Anneau de J. R. R. Tolkien.', 'Fantastique', 'Prestige', 'images/lotr1dvd.jpg', 'DVD'),
('Le seigneur des anneaux : la communauté de l\'anneau.', 3, 20, 'Le Seigneur des anneaux : La Communauté de l\'anneau (The Lord of The Rings: The Fellowship of the Ring) est un film américano-néo-zélandais réalisé par Peter Jackson, sorti en 2001. C\'est le premier volet de la trilogie Le Seigneur des anneaux et l\'adaptation du livre La Fraternité de l\'Anneau de J. R. R. Tolkien.', 'Fantastique', 'Collector', 'images/lotr1bluray.jpg', 'BLU-RAY'),
('Le seigneur des anneaux : la communauté de l\'anneau.', 4, 20, 'Le Seigneur des anneaux : La Communauté de l\'anneau (The Lord of The Rings: The Fellowship of the Ring) est un film américano-néo-zélandais réalisé par Peter Jackson, sorti en 2001. C\'est le premier volet de la trilogie Le Seigneur des anneaux et l\'adaptation du livre La Fraternité de l\'Anneau de J. R. R. Tolkien.', 'Fantastique', 'Collector Longue', 'images/lotr1dvd2.jpg', 'DVD');

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
('Annonces', 'liste_annonce.php', 4);

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
(5, 'support', 'select', 'support');

-- --------------------------------------------------------

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
(2, 'support', 'VHS#DVD#BLU-RAY'),
(1, 'version', 'Longue#Collector#Prestige');

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
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `recherche`
--
ALTER TABLE `recherche`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
