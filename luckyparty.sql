-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 19 Mai 2017 à 17:05
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
  `login_admin` varchar(20) DEFAULT NULL,
  `password_admin` varchar(10) DEFAULT NULL,
  `is_connected` tinyint(1) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`id_admin`, `login_admin`, `password_admin`, `is_connected`, `is_deleted`) VALUES
(1, 'iamadmin', 'iamadmin', NULL, NULL);

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
  `id_musique` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

CREATE TABLE `etablissement` (
  `id_etablissement` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `CP` char(5) DEFAULT NULL,
  `num` char(10) DEFAULT NULL,
  `horraire_ouverture` date DEFAULT NULL,
  `horraire_fermeture` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id_evenement` int(11) NOT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `date_event` date DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `CP` char(5) DEFAULT NULL,
  `id_etablissement` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `synopsis` varchar(255) DEFAULT NULL,
  `is_favorite` tinyint(1) DEFAULT NULL
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
  `id_livre` int(11) NOT NULL
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
  `titre` varchar(50) DEFAULT NULL,
  `is_favorite` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `musique`
--

CREATE TABLE `musique` (
  `id_musique` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `artiste` varchar(50) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `is_favorite` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `id_film` int(11) NOT NULL
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
  `CP` char(5) DEFAULT NULL,
  `is_connected` tinyint(1) DEFAULT NULL,
  `researching` tinyint(1) DEFAULT NULL,
  `id_groupe` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `date_created` timestamp NULL DEFAULT NULL,
  `date_updated` timestamp NULL DEFAULT NULL,
  `access_token` char(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `email`, `pseudo`, `prenom`, `nom`, `sexe`, `pwd`, `date_naissance`, `ville`, `CP`, `is_connected`, `researching`, `id_groupe`, `is_deleted`, `date_created`, `date_updated`, `access_token`) VALUES
(1, 'francois.kevin1998@gmail.com', 'ThyHabibi', 'KÃ©vin', 'FRANCOIS', 'm', '$2y$10$Po/qbtBYzFzmOZLZ3eMY/OqcuXTAoMbttmnMhRD.z.zH7U6BgBBZ.', '1998-03-29', 'Pontault-Combault', '77340', NULL, NULL, NULL, 0, NULL, NULL, '74af15323a4c24c0390990fff810d5ce'),
(2, 'moustapha.mohamed@gmail.com', 'Habibi', 'Mohamed', 'Moustapha', 'm', '$2y$10$RvYgnRZllMtstv2M.3ZYeOgmC1O7ODoXOM1OKI.37s9gG3eHwMJz.', '1997-07-07', 'Pontault-Combault', '77340', 0, NULL, NULL, 0, NULL, NULL, NULL);

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
