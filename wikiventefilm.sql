-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 06, 2018 at 01:27 PM
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
  `support` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`titre`, `id`, `prix`, `description`, `categorie`, `version`, `urlimage`, `support`) VALUES
('Le seigneur des anneaux : la communauté de l''anneau.', 1, 25, 'Le Seigneur des anneaux : La Communauté de l''anneau (The Lord of The Rings: The Fellowship of the Ring) est un film américano-néo-zélandais réalisé par Peter Jackson, sorti en 2001. C''est le premier volet de la trilogie Le Seigneur des anneaux et l''adaptation du livre La Fraternité de l''Anneau de J. R. R. Tolkien.', 'Fantastique', 'Collector Longue', 'images/lotr1vhs.jpg', 'VHS'),
('Le seigneur des anneaux : la communauté de l''anneau.', 2, 16, 'Le Seigneur des anneaux : La Communauté de l''anneau (The Lord of The Rings: The Fellowship of the Ring) est un film américano-néo-zélandais réalisé par Peter Jackson, sorti en 2001. C''est le premier volet de la trilogie Le Seigneur des anneaux et l''adaptation du livre La Fraternité de l''Anneau de J. R. R. Tolkien.', 'Fantastique', 'Prestige', 'images/lotr1dvd.jpg', 'DVD'),
('Le seigneur des anneaux : la communauté de l''anneau.', 3, 20, 'Le Seigneur des anneaux : La Communauté de l''anneau (The Lord of The Rings: The Fellowship of the Ring) est un film américano-néo-zélandais réalisé par Peter Jackson, sorti en 2001. C''est le premier volet de la trilogie Le Seigneur des anneaux et l''adaptation du livre La Fraternité de l''Anneau de J. R. R. Tolkien.', 'Fantastique', 'Collector', 'images/lotr1bluray.jpg', 'BLU-RAY'),
('Le seigneur des anneaux : la communauté de l''anneau.', 4, 20, 'Le Seigneur des anneaux : La Communauté de l''anneau (The Lord of The Rings: The Fellowship of the Ring) est un film américano-néo-zélandais réalisé par Peter Jackson, sorti en 2001. C''est le premier volet de la trilogie Le Seigneur des anneaux et l''adaptation du livre La Fraternité de l''Anneau de J. R. R. Tolkien.', 'Fantastique', 'Collector Longue', 'images/lotr1dvd2.jpg', 'DVD');

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
('Accueil', 'accueil.php', 1),
('Série', 'liste_serie.php', 2),
('Film', 'liste_film.php', 3),
('Annonces', 'liste_annonce.php', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
