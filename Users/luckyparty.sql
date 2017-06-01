-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Sam 27 Mai 2017 à 12:45
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `luckyparty`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id_admin` int(11) NOT NULL,
  `mail` varchar(20) DEFAULT NULL,
  `pwd_admin` varchar(60) DEFAULT NULL,
  `accessToken` char(32) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`id_admin`, `mail`, `pwd_admin`, `accessToken`, `is_deleted`) VALUES
(2, 'admin1@admin1.com', '$2y$10$7jw8EamxvM7WIOdCsKNIBOGpv3rB6qhLuADwr2ibGqNLxyKmZGrwS', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `creer`
--

CREATE TABLE `creer` (
  `id` tinyint(1) NOT NULL,
  `id_evenement` int(11) NOT NULL,
  `id_groupe` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ecouter`
--

CREATE TABLE `ecouter` (
  `id` tinyint(1) NOT NULL,
  `id_musique` int(11) NOT NULL,
  `is_favourite` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ecouter`
--

INSERT INTO `ecouter` (`id`, `id_musique`, `is_favourite`) VALUES
(1, 8, 1),
(2, 8, 1),
(4, 8, 1),
(9, 8, 1),
(5, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

CREATE TABLE `etablissement` (
  `id_etablissement` int(11) NOT NULL,
  `nom_etablissement` varchar(25) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `CP` char(5) DEFAULT NULL,
  `num` char(10) DEFAULT NULL,
  `horraire_ouverture` time DEFAULT NULL,
  `horraire_fermeture` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etablissement`
--

INSERT INTO `etablissement` (`id_etablissement`, `nom_etablissement`, `type`, `genre`, `adresse`, `CP`, `num`, `horraire_ouverture`, `horraire_fermeture`) VALUES
(1, 'wdfbdwbfb', 'wdfbwdfbbwdb', 'wfdwdfbwdfbdbf', 'wdfbdfbwdbfwd', '12345', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id_evenement` int(11) NOT NULL,
  `nom_event` varchar(30) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `date_event` date DEFAULT NULL,
  `id_etablissement` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `evenement`
--

INSERT INTO `evenement` (`id_evenement`, `nom_event`, `genre`, `date_event`, `id_etablissement`) VALUES
(1, 'Patate', 'Rock', '2017-08-11', NULL),
(2, 'Ca Marche !!', 'Zouk', '2018-01-21', NULL),
(3, 'nzmdounv', 'Rock', '2017-05-11', NULL),
(4, 'mserknvmdjfqnvf', 'swdfwf', '1995-08-11', NULL),
(13, 'rave down', 'electro', '2017-06-04', NULL),
(12, 'latinas', 'latino', '2017-06-03', NULL),
(11, 'salami', 'rap', '2017-05-27', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `id_film` int(11) NOT NULL,
  `titre` varchar(50) DEFAULT NULL,
  `realisateur` varchar(50) DEFAULT NULL,
  `senariste` varchar(50) DEFAULT NULL,
  `acteur` varchar(50) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `synopsis` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `gerer`
--

CREATE TABLE `gerer` (
  `id_admin` int(11) NOT NULL,
  `id` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `id_groupe` int(11) NOT NULL,
  `capacite_max` int(11) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `lire`
--

CREATE TABLE `lire` (
  `id` tinyint(1) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `is_favourite` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `id_livre` int(11) NOT NULL,
  `auteur` varchar(50) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `titre` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `musique`
--

CREATE TABLE `musique` (
  `id_musique` int(11) NOT NULL,
  `nom_piste` varchar(50) DEFAULT NULL,
  `artiste` varchar(50) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `album` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `musique`
--

INSERT INTO `musique` (`id_musique`, `nom_piste`, `artiste`, `genre`, `album`) VALUES
(1, NULL, NULL, NULL, NULL),
(2, '<skmjfdnoqvbnm', 'will smith', 'Hip-hop', 'wdvfwdfww'),
(3, 'Highway to hell', 'acdc', 'rock', 'Highway to hell'),
(4, 'speedom', 'Tech N9ne', 'rap', 'special effect'),
(5, 'dark places', 'hollywood Undead', 'rock', 'day of the dead'),
(6, 'cool girl', 'tove lo', 'pop', 'lady wood'),
(7, 'wawa', 'party favor', 'electro', 'wawa'),
(8, 'magu', 'becky g', 'latino', 'magu');

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

CREATE TABLE `participer` (
  `id_groupe` int(11) NOT NULL,
  `id_evenement` int(11) NOT NULL,
  `id` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `regarder`
--

CREATE TABLE `regarder` (
  `id` tinyint(1) NOT NULL,
  `id_film` int(11) NOT NULL,
  `is_favourite` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `se_rendre`
--

CREATE TABLE `se_rendre` (
  `id` tinyint(1) NOT NULL,
  `id_etablissement` int(11) NOT NULL,
  `id_groupe` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` tinyint(1) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pseudo` varchar(16) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `sexe` char(1) DEFAULT NULL,
  `pwd` varchar(60) NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `pays` varchar(30) NOT NULL DEFAULT 'France',
  `CP` char(5) DEFAULT NULL,
  `comfirmkey` varchar(255) NOT NULL,
  `is_comfirmed` int(1) NOT NULL DEFAULT '0',
  `is_connected` tinyint(1) DEFAULT NULL,
  `researching` tinyint(1) DEFAULT NULL,
  `id_groupe` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT CURRENT_TIMESTAMP,
  `access_token` char(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `email`, `pseudo`, `prenom`, `nom`, `sexe`, `pwd`, `date_naissance`, `ville`, `pays`, `CP`, `comfirmkey`, `is_comfirmed`, `is_connected`, `researching`, `id_groupe`, `is_deleted`, `date_created`, `date_updated`, `access_token`) VALUES
(1, 'arthurblanc98@gmail.com', 'alpheonix98', 'Arthur', 'BLANC', 'm', '$2y$10$rsrA2HImmQI7sB2G7t74/.4GTa0m9Y05mfp7qkePIItsdRR0xQc6m', '1998-12-06', 'paris', 'France', '75015', '123456789456123', 1, 1, 1, 0, 0, '2017-04-24 11:55:38', NULL, 'dce8626e0283b7933b922202614d0841'),
(2, 'mounir.bakhalek@gmail.com', 'Lasdrius', 'Mounir', 'BAKHALEK', 'm', '$2y$10$8WHXjLnr4kNsl0SpH0mwmu1RnF1jmg5UQjfX0bJEcuFk7uusm.8Vq', '1996-10-05', 'paris', 'France', '75015', '123456789456123', 1, NULL, 1, NULL, 0, '2017-04-24 11:58:33', NULL, NULL),
(3, 'domitille.blanc7@wannadoo.fr', 'Domiwhite', 'Domitille', 'BLANC', 'w', '$2y$10$mxEC8TvdNzgnmPCFsisYy.vAR6huUxXm2jhmPR0ZT2D0UMvytNT02', '1971-05-21', 'paris', 'France', '75015', '123456789456123', 1, NULL, 1, 0, 0, '2017-04-26 17:36:31', NULL, NULL),
(4, 'valentin.blanc2000@gmail.com', 'Windjer', 'valentin', 'Blanc', 'm', '$2y$10$clsUoNrnUmNlkdh.s7diiud.M8xWtFIPM5xcUFKbZ9GVHUcyyr.cq', '1998-12-06', 'paris', 'France', '75015', '123456789456123', 1, NULL, 1, 0, 0, '2017-04-29 13:39:02', NULL, NULL),
(5, 'ludoroche@gmail.com', 'luluvroumette', 'Ludo', 'Roche', 'w', '$2y$10$6Q4XJ1nUANWi1muayT.A2.iJCZpKyNknyVGGnzHGWL0tkGcd3Hb7i', '1975-12-07', 'paris', 'France', '75016', '123456789456123', 1, NULL, 1, NULL, 0, '2017-04-29 13:40:19', NULL, NULL),
(6, 'francois.blanc7@gmail.com', 'ppahtde', 'Francois', 'Blanc', 'm', '$2y$10$xHnZQfhNXp8gbJVcj8RMT.LUKHtGspai01yJy4fCCEsFPXR5Wgtlq', '1971-10-14', 'paris', 'France', '75014', '123456789456123', 1, NULL, 1, 0, 0, '2017-04-29 13:42:10', NULL, NULL),
(7, 'chloe-budard@gmail.com', 'joueuseSN', 'Chloe', 'Budard', 'w', '$2y$10$ziY.n8OfrLdVGXXDB6VnjOEC4XWdj48ffaInpiw5itHUwJy92OzCy', '1998-06-05', 'paris', 'France', '75015', '123456789456123', 1, NULL, 1, 0, 0, '2017-04-29 13:44:13', NULL, NULL),
(8, 'viccibold@gmail.com', 'Viccistar', 'victoria', 'Boldi', 'w', '$2y$10$5ePAfzAnMnG9JrXKe0lHM.Jwcvbmb45Yek82ULppuX.HfIA96UDcy', '1993-09-22', 'paris', 'France', '75020', '123456789456123', 1, NULL, 1, 0, 0, '2017-04-29 13:47:20', NULL, NULL),
(9, 'xxcarlosxx@gmail.com', 'xxcarlosxx', 'Carlos', 'RANKINIOS', 'm', '$2y$10$jUsNBLj7UpRssytm4xueq.1hEZ7QqGhF0ekIkLYz7K3ms6pK7eYea', '1993-10-26', 'iere', 'France', '95200', '123456789456123', 1, NULL, 1, NULL, 0, '2017-05-24 19:20:29', NULL, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `creer`
--
ALTER TABLE `creer`
  ADD PRIMARY KEY (`id`,`id_evenement`,`id_groupe`),
  ADD KEY `FK_CREER_id_evenement` (`id_evenement`),
  ADD KEY `FK_CREER_id_groupe` (`id_groupe`);

--
-- Index pour la table `ecouter`
--
ALTER TABLE `ecouter`
  ADD PRIMARY KEY (`id`,`id_musique`),
  ADD KEY `FK_ECOUTER_id_musique` (`id_musique`);

--
-- Index pour la table `etablissement`
--
ALTER TABLE `etablissement`
  ADD PRIMARY KEY (`id_etablissement`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id_evenement`),
  ADD KEY `FK_EVENEMENT_id_etablissement` (`id_etablissement`);

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`);

--
-- Index pour la table `gerer`
--
ALTER TABLE `gerer`
  ADD PRIMARY KEY (`id_admin`,`id`),
  ADD KEY `FK_GERER_id` (`id`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id_groupe`);

--
-- Index pour la table `lire`
--
ALTER TABLE `lire`
  ADD PRIMARY KEY (`id`,`id_livre`),
  ADD KEY `FK_LIRE_id_livre` (`id_livre`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`id_livre`);

--
-- Index pour la table `musique`
--
ALTER TABLE `musique`
  ADD PRIMARY KEY (`id_musique`);

--
-- Index pour la table `participer`
--
ALTER TABLE `participer`
  ADD PRIMARY KEY (`id_groupe`,`id_evenement`,`id`),
  ADD KEY `FK_PARTICIPER_id_evenement` (`id_evenement`),
  ADD KEY `FK_PARTICIPER_id` (`id`);

--
-- Index pour la table `regarder`
--
ALTER TABLE `regarder`
  ADD PRIMARY KEY (`id`,`id_film`),
  ADD KEY `FK_REGARDER_id_film` (`id_film`);

--
-- Index pour la table `se_rendre`
--
ALTER TABLE `se_rendre`
  ADD PRIMARY KEY (`id`,`id_etablissement`,`id_groupe`),
  ADD KEY `FK_SE_RENDRE_id_etablissement` (`id_etablissement`),
  ADD KEY `FK_SE_RENDRE_id_groupe` (`id_groupe`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`,`email`),
  ADD KEY `FK_UTILISATEUR_id_groupe` (`id_groupe`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `etablissement`
--
ALTER TABLE `etablissement`
  MODIFY `id_etablissement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id_evenement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `musique`
--
ALTER TABLE `musique`
  MODIFY `id_musique` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
