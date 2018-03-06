-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 06, 2018 at 01:52 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wikiventefilm`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `titre` varchar(255) NOT NULL,
  `id` int(10) NOT NULL,
  `prix` int(10) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `version` varchar(255) NOT NULL,
  `urlimage` varchar(255) NOT NULL,
  `support` varchar(255) NOT NULL,
  `etat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`titre`, `id`, `prix`, `description`, `categorie`, `version`, `urlimage`, `support`, `etat`) VALUES
('Le seigneur des anneaux : la communauté de l''anneau.', 1, 25, 'Le Seigneur des anneaux : La Communauté de l''anneau (The Lord of The Rings: The Fellowship of the Ring) est un film américano-néo-zélandais réalisé par Peter Jackson, sorti en 2001. C''est le premier volet de la trilogie Le Seigneur des anneaux et l''adaptation du livre La Fraternité de l''Anneau de J. R. R. Tolkien.', 'Fantastique', 'Collector Longue', 'images/lotr1vhs.jpg', 'VHS', 'accepted'),
('Le seigneur des anneaux : la communauté de l''anneau.', 2, 16, 'Le Seigneur des anneaux : La Communauté de l''anneau (The Lord of The Rings: The Fellowship of the Ring) est un film américano-néo-zélandais réalisé par Peter Jackson, sorti en 2001. C''est le premier volet de la trilogie Le Seigneur des anneaux et l''adaptation du livre La Fraternité de l''Anneau de J. R. R. Tolkien.', 'Fantastique', 'Prestige', 'images/lotr1dvd.jpg', 'DVD', 'accepted'),
('Le seigneur des anneaux : la communauté de l''anneau.', 3, 20, 'Le Seigneur des anneaux : La Communauté de l''anneau (The Lord of The Rings: The Fellowship of the Ring) est un film américano-néo-zélandais réalisé par Peter Jackson, sorti en 2001. C''est le premier volet de la trilogie Le Seigneur des anneaux et l''adaptation du livre La Fraternité de l''Anneau de J. R. R. Tolkien.', 'Fantastique', 'Collector', 'images/lotr1bluray.jpg', 'BLU-RAY', 'accepted'),
('Le seigneur des anneaux : la communauté de l''anneau.', 4, 20, 'Le Seigneur des anneaux : La Communauté de l''anneau (The Lord of The Rings: The Fellowship of the Ring) est un film américano-néo-zélandais réalisé par Peter Jackson, sorti en 2001. C''est le premier volet de la trilogie Le Seigneur des anneaux et l''adaptation du livre La Fraternité de l''Anneau de J. R. R. Tolkien.', 'Fantastique', 'Collector Longue', 'images/lotr1dvd2.jpg', 'DVD', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `meta_menu`
--

CREATE TABLE IF NOT EXISTS `meta_menu` (
  `nom` varchar(255) NOT NULL,
  `lien` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meta_menu`
--

INSERT INTO `meta_menu` (`nom`, `lien`, `id`) VALUES
('Accueil', 'index.php', 1),
('Série', 'liste_serie.php', 2),
('Film', 'liste_film.php', 3),
('Annonces', 'liste_annonce.php', 4),
('Panier', 'panier.php', 5),
('Recherche', 'recherche.php', 6);

-- --------------------------------------------------------

--
-- Table structure for table `recherche`
--

CREATE TABLE IF NOT EXISTS `recherche` (
  `id` int(2) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `type` varchar(10) NOT NULL,
  `att_name` varchar(30) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recherche`
--

INSERT INTO `recherche` (`id`, `nom`, `type`, `att_name`) VALUES
(1, 'titre', 'text', 'titre'),
(2, 'version', 'select', 'version'),
(3, 'prix-min', 'number', 'min'),
(4, 'prix-max', 'number', 'max'),
(5, 'support', 'select', 'support');

-- --------------------------------------------------------

--
-- Table structure for table `recherche_option`
--

CREATE TABLE IF NOT EXISTS `recherche_option` (
  `id` int(2) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `options` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recherche_option`
--

INSERT INTO `recherche_option` (`id`, `nom`, `options`) VALUES
(2, 'support', 'Selectionnez#VHS#DVD#BLU-RAY'),
(1, 'version', 'Selectionnez#Longue#Collector#Prestige#Collector Longue');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta_menu`
--
ALTER TABLE `meta_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recherche`
--
ALTER TABLE `recherche`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recherche_option`
--
ALTER TABLE `recherche_option`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `recherche`
--
ALTER TABLE `recherche`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
