-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 15 mars 2021 à 13:48
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
-- Base de données :  `bdd_app_aprun`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE `absence` (
  `id` int(11) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `duree` int(11) NOT NULL,
  `justifie` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `absence`
--

INSERT INTO `absence` (`id`, `id_user`, `date`, `duree`, `justifie`) VALUES
(2, '6001433378bcb', '2021-01-19', 4, 'true'),
(4, '60014333788f7', '2021-01-19', 4, 'false'),
(10, '60014333788f7', '2021-02-11', 4, 'false'),
(9, '60014333774fe', '2021-02-05', 4, 'true'),
(7, '60014333788f7', '2021-01-21', 4, 'false'),
(8, '6001433376a30', '2021-01-21', 4, 'true');

-- --------------------------------------------------------

--
-- Structure de la table `absence_justificatif`
--

CREATE TABLE `absence_justificatif` (
  `id` int(11) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `motif` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `justificatif` varchar(100) DEFAULT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `absence_justificatif`
--

INSERT INTO `absence_justificatif` (`id`, `id_user`, `motif`, `date`, `justificatif`, `description`) VALUES
(23, '60014333788f7', 'Maladie', '2021-01-19', '114628fb605c242858abab18bdeaf45f', 'absence cause malade !');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id_evenement` varchar(100) NOT NULL,
  `id_promo` varchar(100) NOT NULL,
  `titre` varchar(200) NOT NULL,
  `start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id_evenement`, `id_promo`, `titre`, `start`, `end`) VALUES
('0', '5ff8e46e857dd', 'Vacances', '2021-01-09 21:38:27', '2021-01-10 20:00:00'),
('1', '5ff8e46e857dd', 'Projet en groupe', '2021-01-09 21:35:49', '2021-01-09 10:00:00'),
('3', '5ff81d1502e4d', 'Insertion Professionnelle', '2021-01-12 06:00:00', '2021-01-12 11:00:00'),
('5ffe040e8fd2e', '5ff81d1502e4d', 'Cours de programmation JavaScript', '2021-01-21 02:58:52', '2021-01-14 12:00:00'),
('6008ef3df2897', '5ff8e46e857dd', 'Cours Laravel', '2021-01-18 06:00:00', '2021-01-18 11:00:00'),
('600671dd25b1b', '5ff8e46e857dd', 'HTML/CSS', '2021-01-21 02:59:05', '2021-01-22 11:00:00'),
('60068076062ec', '5ff8e46e857dd', 'Code', '2021-01-23 05:00:00', '2021-01-23 11:00:00'),
('6007c4902cbe5', '5ff81d1502e4d', 'Programmation orientÃ© objet C++', '2021-01-22 06:00:00', '2021-01-22 11:00:00'),
('6007c5b391293', '5ff81d1502e4d', 'Petit dÃ©jeuner', '2021-01-19 02:00:00', '2021-01-19 06:00:00'),
('6007c5e1a0a36', '5ff81d1502e4d', 'SÃ©ance de sport', '2021-01-19 11:00:00', '2021-01-19 14:00:00'),
('6007c633083dd', '5ff81d1502e4d', 'DÃ©veloppement Front CSS', '2021-01-18 05:00:00', '2021-01-18 11:00:00'),
('600914625bdcd', '5ff8e46e857dd', 'Rendez Run By Simplon', '2021-01-20 06:00:00', '2021-01-20 08:00:00'),
('600bc12a3f3c2', '5ff8e46e857dd', 'Manger pizza', '2021-01-23 08:00:00', '2021-01-23 10:00:00'),
('601d6ffdc3329', '5ff81d1502e4d', 'Cours HTML', '2021-02-05 06:00:00', '2021-02-05 10:00:00'),
('6024cb7bbc42d', '5ff8e46e857dd', 'Cours de programmation', '2021-02-11 06:15:00', '2021-02-11 08:15:00');

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE `module` (
  `id_module` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `module`
--

INSERT INTO `module` (`id_module`, `nom`) VALUES
('0', 'Insertion professionnelle'),
('1', 'Projet en groupe ');

-- --------------------------------------------------------

--
-- Structure de la table `nbre_absence_utilisateur`
--

CREATE TABLE `nbre_absence_utilisateur` (
  `id` int(11) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `nbre` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `nbre_absence_utilisateur`
--

INSERT INTO `nbre_absence_utilisateur` (`id`, `id_user`, `nbre`) VALUES
(24, '600bc0e524f63', 0),
(3, '6001433376a30', 4),
(4, '6001433376e00', 0),
(5, '6001433377180', 0),
(6, '60014333774fe', 4),
(7, '600143337780b', 0),
(22, '60067f75460eb', 0),
(9, '6001433377f22', 0),
(10, '60014333782ab', 0),
(11, '60014333785ec', 0),
(12, '60014333788f7', 8),
(13, '6001433378bcb', 0),
(14, '6001433378e24', 0),
(23, '6008ee9d7854f', 0),
(17, '600143337946b', 0),
(18, '6001433379684', 0),
(19, '60014333799ac', 0),
(20, '6001433379c27', 0),
(21, '6001433379e5c', 0);

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE `promotion` (
  `id_promo` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `formation` varchar(100) NOT NULL,
  `debut` int(11) NOT NULL,
  `fin` int(11) NOT NULL,
  `duree` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`id_promo`, `nom`, `formation`, `debut`, `fin`, `duree`) VALUES
('5ff81d1502e4d', 'Team Adrie', 'BPJEPS', 2022, 2025, 480),
('5ff8e46e857dd', 'BOUYAKA', 'DEJEPS', 2023, 2023, 40),
('600521f43e633', 'ACI Pole Numerique', 'DEJEPS', 2023, 2023, 10),
('60067f9f8382b', 'Promo ToTo', 'BPJEPS', 2021, 2022, 600),
('6007c3929f306', 'Dont Repeat Yourself', 'CPJEPS', 2020, 2021, 500),
('6008eeaa40bb4', 'Simplon', 'DEJEPS', 2022, 2023, 400),
('600913493c4c5', 'Village CA', 'BPJEPS', 2021, 2022, 4000),
('60095554eb703', 'Promotion Redirection', 'DEJEPS', 2020, 2022, 500),
('6009676d073b4', 'Test', 'DEJEPS', 2020, 2021, 800);

-- --------------------------------------------------------

--
-- Structure de la table `promotion_a_module`
--

CREATE TABLE `promotion_a_module` (
  `id` int(11) NOT NULL,
  `id_promo` varchar(100) NOT NULL,
  `id_module` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `promotion_a_module`
--

INSERT INTO `promotion_a_module` (`id`, `id_promo`, `id_module`) VALUES
(1, '5ff8e46e857dd', '0');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_role` int(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(2, 'Formateur'),
(1, 'Apprenant'),
(0, 'Admin'),
(3, 'Tuteur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_user` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mdp` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `nom`, `prenom`, `email`, `mdp`) VALUES
('0', 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
('600bc0e524f63', 'Yukz', 'Bren', 'bren@mail.com', '098f6bcd4621d373cade4e832627b4f6'),
('6008ee9d7854f', 'Snow', 'John', 'johnsnow@mail.com', '098f6bcd4621d373cade4e832627b4f6'),
('6001433376a30', 'Test', 'Apprenant', 'apprenant2@mail.com', '098f6bcd4621d373cade4e832627b4f6'),
('6001433376e00', 'apprenant3', 'apprenant3', 'apprenant3@mail.com', '098f6bcd4621d373cade4e832627b4f6'),
('6001433377180', 'apprenant4', 'apprenant4', 'apprenant4@mail.com', '098f6bcd4621d373cade4e832627b4f6'),
('60014333774fe', 'apprenant5', 'apprenant5', 'apprenant5@mail.com', '098f6bcd4621d373cade4e832627b4f6'),
('600143337780b', 'apprenant6', 'apprenant6', 'apprenant6@mail.com', '098f6bcd4621d373cade4e832627b4f6'),
('60067f75460eb', 'Raza', 'Andy', 'andy@mail.com', '098f6bcd4621d373cade4e832627b4f6'),
('6001433377f22', 'apprenant8', 'apprenant8', 'apprenant8@mail.com', '098f6bcd4621d373cade4e832627b4f6'),
('60014333782ab', 'apprenant9', 'apprenant9', 'apprenant9@mail.com', '098f6bcd4621d373cade4e832627b4f6'),
('60014333785ec', 'apprenant10', 'apprenant10', 'apprenant10@mail.com', '098f6bcd4621d373cade4e832627b4f6'),
('60014333788f7', 'apprenant11', 'apprenant11', 'apprenant11@mail.com', '098f6bcd4621d373cade4e832627b4f6'),
('6001433378bcb', 'apprenant12', 'apprenant12', 'apprenant12@mail.com', '098f6bcd4621d373cade4e832627b4f6'),
('6001433378e24', 'apprenant13', 'apprenant13', 'apprenant13@mail.com', '098f6bcd4621d373cade4e832627b4f6'),
('600143337946b', 'apprenant16', 'apprenant16', 'apprenant16@mail.com', '098f6bcd4621d373cade4e832627b4f6'),
('6001433379684', 'apprenant17', 'apprenant17', 'apprenant17@mail.com', '098f6bcd4621d373cade4e832627b4f6'),
('60014333799ac', 'apprenant18', 'apprenant18', 'apprenant18@mail.com', '098f6bcd4621d373cade4e832627b4f6'),
('6001433379c27', 'apprenant19', 'apprenant19', 'apprenant19@mail.com', '098f6bcd4621d373cade4e832627b4f6'),
('6001433379e5c', 'apprenant20', 'apprenant20', 'apprenant20@mail.com', '098f6bcd4621d373cade4e832627b4f6'),
('6001603ba5e15', 'Razafindrazaka', 'Andry', 'tuteur@mail.com', '098f6bcd4621d373cade4e832627b4f6'),
('6004740b2fb74', 'Raza', 'Andy', 'formateur@mail.com', '098f6bcd4621d373cade4e832627b4f6');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_promotion`
--

CREATE TABLE `utilisateur_promotion` (
  `id_user` varchar(100) NOT NULL,
  `id_promo` varchar(100) NOT NULL,
  `entree` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur_promotion`
--

INSERT INTO `utilisateur_promotion` (`id_user`, `id_promo`, `entree`) VALUES
('600bc0e524f63', '5ff81d1502e4d', '2021-01-23'),
('6008ee9d7854f', '600521f43e633', '2021-01-21'),
('6001433376a30', '5ff81d1502e4d', '2021-01-12'),
('6001433376e00', '5ff81d1502e4d', '2021-01-12'),
('6001433377180', '5ff81d1502e4d', '2021-01-12'),
('60014333774fe', '5ff81d1502e4d', '2021-01-12'),
('600143337780b', '5ff81d1502e4d', '2021-01-12'),
('60067f75460eb', '600521f43e633', '2021-01-19'),
('6001433377f22', '5ff81d1502e4d', '2021-01-12'),
('60014333782ab', '5ff81d1502e4d', '2021-01-12'),
('60014333785ec', '5ff81d1502e4d', '2021-01-12'),
('60014333788f7', '5ff8e46e857dd', '2021-01-12'),
('6001433378bcb', '5ff8e46e857dd', '2021-01-12'),
('6001433378e24', '5ff8e46e857dd', '2021-01-12'),
('600143337946b', '5ff8e46e857dd', '2021-01-12'),
('6001433379684', '5ff8e46e857dd', '2021-01-12'),
('60014333799ac', '5ff8e46e857dd', '2021-01-12'),
('6001433379c27', '5ff8e46e857dd', '2021-01-12'),
('6001433379e5c', '5ff8e46e857dd', '2021-01-12');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_role`
--

CREATE TABLE `utilisateur_role` (
  `id` int(11) NOT NULL,
  `id_user` varchar(100) COLLATE utf8_bin NOT NULL,
  `id_role` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `utilisateur_role`
--

INSERT INTO `utilisateur_role` (`id`, `id_user`, `id_role`) VALUES
(1, '0', '0'),
(30, '600bc0e524f63', '1'),
(28, '6008ee9d7854f', '1'),
(4, '6001433376a30', '1'),
(5, '6001433376e00', '1'),
(6, '6001433377180', '1'),
(7, '60014333774fe', '1'),
(8, '600143337780b', '1'),
(26, '60067f75460eb', '1'),
(10, '6001433377f22', '1'),
(11, '60014333782ab', '1'),
(12, '60014333785ec', '1'),
(13, '60014333788f7', '1'),
(14, '6001433378bcb', '1'),
(15, '6001433378e24', '1'),
(18, '600143337946b', '1'),
(19, '6001433379684', '1'),
(20, '60014333799ac', '1'),
(21, '6001433379c27', '1'),
(22, '6001433379e5c', '1'),
(24, '6001603ba5e15', '3'),
(25, '6004740b2fb74', '2');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_tuteur`
--

CREATE TABLE `utilisateur_tuteur` (
  `id` int(11) NOT NULL,
  `id_user_apprenant` varchar(100) NOT NULL,
  `id_user_tuteur` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur_tuteur`
--

INSERT INTO `utilisateur_tuteur` (`id`, `id_user_apprenant`, `id_user_tuteur`) VALUES
(3, '6001433376a30', '6001603ba5e15'),
(4, '6001433376e00', NULL),
(5, '6001433377180', '6001603ba5e15'),
(6, '60014333774fe', '6001603ba5e15'),
(7, '600143337780b', NULL),
(9, '6001433377f22', NULL),
(10, '60014333782ab', NULL),
(11, '60014333785ec', NULL),
(12, '60014333788f7', NULL),
(13, '6001433378bcb', NULL),
(14, '6001433378e24', '6001603ba5e15'),
(17, '600143337946b', NULL),
(18, '6001433379684', NULL),
(19, '60014333799ac', NULL),
(20, '6001433379c27', NULL),
(21, '6001433379e5c', NULL),
(24, '600bc0e524f63', NULL),
(23, '6008ee9d7854f', NULL),
(22, '60067f75460eb', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `absence_justificatif`
--
ALTER TABLE `absence_justificatif`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id_evenement`);

--
-- Index pour la table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id_module`);

--
-- Index pour la table `nbre_absence_utilisateur`
--
ALTER TABLE `nbre_absence_utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id_promo`);

--
-- Index pour la table `promotion_a_module`
--
ALTER TABLE `promotion_a_module`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `utilisateur_promotion`
--
ALTER TABLE `utilisateur_promotion`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `utilisateur_role`
--
ALTER TABLE `utilisateur_role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur_tuteur`
--
ALTER TABLE `utilisateur_tuteur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `absence`
--
ALTER TABLE `absence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `absence_justificatif`
--
ALTER TABLE `absence_justificatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `nbre_absence_utilisateur`
--
ALTER TABLE `nbre_absence_utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `promotion_a_module`
--
ALTER TABLE `promotion_a_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `utilisateur_role`
--
ALTER TABLE `utilisateur_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `utilisateur_tuteur`
--
ALTER TABLE `utilisateur_tuteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
