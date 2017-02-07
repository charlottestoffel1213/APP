-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 07 Février 2017 à 22:13
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `leanon`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie_forum`
--

CREATE TABLE `categorie_forum` (
  `id` int(11) NOT NULL,
  `nom_forum` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie_forum`
--

INSERT INTO `categorie_forum` (`id`, `nom_forum`) VALUES
(1, 'Utiliser et gerer les objets connectes'),
(2, 'Installation');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_obj_connectes`
--

CREATE TABLE `categorie_obj_connectes` (
  `id` int(11) NOT NULL,
  `nom_categorie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie_obj_connectes`
--

INSERT INTO `categorie_obj_connectes` (`id`, `nom_categorie`) VALUES
(4, 'humidite'),
(2, 'luminosite'),
(3, 'securite'),
(1, 'temperature');

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `requete` varchar(255) NOT NULL,
  `id_createur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `chat`
--

INSERT INTO `chat` (`id`, `requete`, `id_createur`) VALUES
(4, 'J''ai un problÃ¨me d''affichage avec une donnÃ©e de capteur/actionneur', 61);

-- --------------------------------------------------------

--
-- Structure de la table `chat_msg`
--

CREATE TABLE `chat_msg` (
  `id` int(11) NOT NULL,
  `id_expediteur` int(11) NOT NULL,
  `id_destinataire` int(11) NOT NULL,
  `id_chat` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `chat_msg`
--

INSERT INTO `chat_msg` (`id`, `id_expediteur`, `id_destinataire`, `id_chat`, `message`, `date`) VALUES
(109, 61, 83, 4, 'aide please', '2017-02-02 17:48:38');

-- --------------------------------------------------------

--
-- Structure de la table `controle`
--

CREATE TABLE `controle` (
  `id` int(11) NOT NULL,
  `id_utilisateurs` int(11) NOT NULL,
  `id_objets_connectés` int(11) NOT NULL,
  `modification` int(11) NOT NULL,
  `visualisation` int(11) NOT NULL,
  `id_mode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `envoi`
--

CREATE TABLE `envoi` (
  `id` int(11) NOT NULL,
  `id_notifications` int(11) NOT NULL,
  `id_utilisateurs` int(11) NOT NULL,
  `date_heure` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `questions` text NOT NULL,
  `reponses` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `habite`
--

CREATE TABLE `habite` (
  `id` int(11) NOT NULL,
  `id_objets_connectes` int(11) NOT NULL,
  `id_pieces` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `maison`
--

CREATE TABLE `maison` (
  `id` int(11) NOT NULL,
  `id_type_maison` int(11) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `postal` int(6) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `code_client` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `message` text NOT NULL,
  `id_message_d'origine` text NOT NULL,
  `id_sujet_du_forum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `auteur`, `date`, `message`, `id_message_d'origine`, `id_sujet_du_forum`) VALUES
(35, '61', '2017-01-12 10:09:36', 'J''ai besoin d''aide\r\n', '', 28),
(50, '61', '2017-02-07 22:06:39', 'Je n''arrive pas a installer mon dÃ©tecteur de fumÃ©e. Pouvez vous m''aider svp?', '', 18),
(51, '61', '2017-02-07 22:07:54', 'Bonjours, Devrai-je installer un deuxiÃ¨me dÃ©tecteur de mouvement dans ma chambre? ', '', 26),
(52, '61', '2017-02-07 22:08:38', 'Que dois-je faire ? ', '', 29);

-- --------------------------------------------------------

--
-- Structure de la table `mode_obj`
--

CREATE TABLE `mode_obj` (
  `id` int(11) NOT NULL,
  `nom_mode` varchar(100) NOT NULL,
  `temperature` int(11) NOT NULL,
  `luminosite` int(11) NOT NULL,
  `securite` int(11) NOT NULL,
  `id_maison` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `mode_obj`
--

INSERT INTO `mode_obj` (`id`, `nom_mode`, `temperature`, `luminosite`, `securite`, `id_maison`) VALUES
(1, 'Mode Nuit', 18, 0, 1, 0),
(2, 'Mode Jour', 20, 0, 0, 0),
(5, 'LumiÃ¨re activÃ©', 20, 1, 0, 1),
(6, 'ok', 40, 0, 0, 2),
(7, 'Mode Ã©conomie', 25, 0, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `id_type_notification` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `frequence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `obj_connectes`
--

CREATE TABLE `obj_connectes` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `id_type_objets_connectes` int(11) NOT NULL,
  `id_categorie_objets_connectes` int(11) NOT NULL,
  `id_piece` int(11) NOT NULL,
  `batterie` int(11) NOT NULL,
  `donnee_demandee` int(11) NOT NULL,
  `donnee_recue` varchar(255) NOT NULL,
  `seuil_erreur` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `frequence` date NOT NULL,
  `etat` varchar(50) NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `obj_connectes`
--

INSERT INTO `obj_connectes` (`id`, `nom`, `id_type_objets_connectes`, `id_categorie_objets_connectes`, `id_piece`, `batterie`, `donnee_demandee`, `donnee_recue`, `seuil_erreur`, `description`, `frequence`, `etat`, `code`) VALUES
(1, 'temp1', 0, 1, 0, 0, 0, '', 0, '', '0000-00-00', 'fonctionne', 0),
(2, 'temp2', 2, 1, 1, 0, 20, '20', 1, '', '0000-00-00', 'fonctionne', 0),
(3, 'temp3', 2, 1, 2, 0, 0, '20', 3, '', '0000-00-00', 'dysfonctionnement', 0),
(4, 'secu1', 0, 3, 1, 0, 0, '0', 0, '', '0000-00-00', 'fonctionne', 0),
(5, 'lumi1', 0, 2, 1, 0, 0, '0', 0, '', '0000-00-00', 'fonctionne', 0),
(6, 'lumi2', 2, 2, 2, 0, 0, '0', 0, '', '0000-00-00', 'fonctionne', 0),
(7, 'secu2', 2, 3, 2, 0, 0, '0', 0, '', '0000-00-00', 'fonctionne', 0),
(8, 'secu3', 2, 3, 1, 0, 0, '0', 0, '', '0000-00-00', 'fonctionne', 0),
(9, 'temp4', 2, 1, 4, 0, 0, '40', 0, '', '0000-00-00', 'dysfonctionnement', 0),
(11, 'secu1', 1, 3, 27, 0, 0, '0', 0, '', '0000-00-00', 'fonctionne', 0),
(12, 'secu2', 1, 3, 27, 0, 0, '0', 0, '', '0000-00-00', 'fonctionne', 0),
(13, 'lumi1', 0, 2, 27, 0, 0, '1', 0, '', '0000-00-00', 'disfonctionnement', 0),
(14, 'lumi2', 0, 2, 27, 0, 0, '1', 0, '', '0000-00-00', 'disfonctionnement', 0),
(15, 'humi1', 1, 4, 27, 0, 0, '30', 0, '', '0000-00-00', '', 0),
(16, 'humi2', 1, 4, 28, 0, 0, '21', 0, '', '0000-00-00', '', 0),
(17, 'temp1', 1, 1, 27, 0, 0, '34', 0, '', '0000-00-00', '', 0),
(18, 'temp2', 1, 1, 27, 0, 0, '34', 0, '', '0000-00-00', '', 0),
(19, 'temp3', 0, 0, 28, 0, 0, '6', 0, '', '0000-00-00', '', 0),
(20, 'humidité_ga1', 1, 4, 1, 0, 0, '30', 0, '', '0000-00-00', '', 0),
(21, 'humidité_ga2', 1, 4, 2, 0, 0, '60', 0, '', '0000-00-00', '', 0),
(22, 'lampe de chevet ', 0, 2, 1, 0, 0, '0', 0, '', '0000-00-00', 'fonctionne', 1608),
(23, '', 1, 4, 0, 0, 0, '49%', 0, '', '0000-00-00', '', 123),
(24, '', 1, 4, 0, 0, 0, '48%', 0, '', '0000-00-00', '', 124),
(25, '', 1, 4, 0, 0, 0, '65%', 0, '', '0000-00-00', '', 125),
(26, '', 1, 4, 0, 0, 0, '80%', 0, '', '0000-00-00', '', 126),
(27, '', 1, 4, 0, 0, 0, '75%', 0, '', '0000-00-00', '', 127),
(28, '', 1, 4, 0, 0, 0, '56%', 0, '', '0000-00-00', '', 128),
(29, '', 1, 4, 0, 0, 0, '34%', 0, '', '0000-00-00', '', 129),
(30, '', 1, 4, 0, 0, 0, '51%', 0, '', '0000-00-00', '', 130),
(31, '', 1, 2, 0, 0, 0, '1', 0, '', '0000-00-00', '', 131),
(32, '', 1, 2, 0, 0, 0, '0', 0, '', '0000-00-00', '', 132),
(33, '', 1, 4, 0, 0, 0, '49%', 0, '', '0000-00-00', '', 133),
(34, '', 1, 2, 0, 0, 0, '1', 0, '', '0000-00-00', '', 134),
(35, '', 1, 2, 0, 0, 0, '0', 0, '', '0000-00-00', '', 135),
(36, '', 1, 2, 0, 0, 0, '1', 0, '', '0000-00-00', '', 136),
(37, '', 1, 2, 0, 0, 0, '0', 0, '', '0000-00-00', '', 137),
(38, '', 1, 2, 0, 0, 0, '1', 0, '', '0000-00-00', '', 138),
(39, '', 1, 2, 0, 0, 0, '0', 0, '', '0000-00-00', '', 139),
(40, '', 1, 4, 0, 0, 0, '50%', 0, '', '0000-00-00', '', 140),
(41, '', 1, 2, 0, 0, 0, '1', 0, '', '0000-00-00', '', 141),
(42, '', 1, 2, 0, 0, 0, '0', 0, '', '0000-00-00', '', 142),
(43, '', 1, 2, 0, 0, 0, '1', 0, '', '0000-00-00', '', 143),
(44, '', 1, 2, 0, 0, 0, '0', 0, '', '0000-00-00', '', 144),
(45, '', 1, 4, 0, 0, 0, '60%', 0, '', '0000-00-00', '', 145),
(46, '', 1, 2, 0, 0, 0, '1', 0, '', '0000-00-00', '', 146),
(47, '', 1, 2, 0, 0, 0, '0', 0, '', '0000-00-00', '', 147),
(48, '', 1, 2, 0, 0, 0, '1', 0, '', '0000-00-00', '', 148),
(49, '', 1, 4, 0, 0, 0, '70%', 0, '', '0000-00-00', '', 149),
(50, '', 1, 2, 0, 0, 0, '0', 0, '', '0000-00-00', '', 150),
(51, '', 1, 2, 0, 0, 0, '1', 0, '', '0000-00-00', '', 151),
(52, '', 1, 2, 0, 0, 0, '0', 0, '', '0000-00-00', '', 152),
(53, '', 1, 4, 0, 0, 0, '80%', 0, '', '0000-00-00', '', 153),
(54, '', 1, 2, 0, 0, 0, '1', 0, '', '0000-00-00', '', 154),
(55, '', 1, 2, 0, 0, 0, '0', 0, '', '0000-00-00', '', 155),
(56, '', 1, 1, 0, 0, 0, '19,5Â°', 0, '', '0000-00-00', '', 156),
(57, '', 1, 4, 0, 0, 0, '47%', 0, '', '0000-00-00', '', 157),
(58, '', 1, 1, 0, 0, 0, '16,0Â°', 0, '', '0000-00-00', '', 158),
(59, '', 1, 1, 0, 0, 0, '19,6Â°', 0, '', '0000-00-00', '', 159),
(60, '', 1, 4, 0, 0, 0, '47%', 0, '', '0000-00-00', '', 160),
(61, '', 1, 1, 0, 0, 0, '16,0Â°', 0, '', '0000-00-00', '', 161),
(62, '', 1, 1, 0, 0, 0, '19,5Â°', 0, '', '0000-00-00', '', 162);

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `droits_d'utilisateurs` text NOT NULL,
  `mentions_legales` text NOT NULL,
  `mails` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pieces`
--

CREATE TABLE `pieces` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `id_maison` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `pieces`
--

INSERT INTO `pieces` (`id`, `nom`, `id_maison`) VALUES
(1, 'Salon', 1),
(2, 'Cuisine', 1),
(3, 'Salle de bain', 1),
(4, 'Salon', 2),
(12, 'Cuisine', 25),
(13, 'Chambre1', 25),
(14, 'Salon', 25),
(15, 'Cuisine', 26),
(16, 'Chambre1', 26),
(17, 'Salon', 26),
(18, 'Salle de bain', 26),
(19, 'Cuisine', 27),
(20, 'Chambre1', 27),
(21, 'Chambre2', 27),
(22, 'Salon', 27),
(23, 'Salle de bain', 27),
(24, 'Cuisine', 28),
(25, 'Chambre1', 28),
(26, 'Chambre de MÃ©mÃ©', 28),
(27, 'cuisinette', 29),
(29, 'Cuisine', 30),
(30, 'Chambre1', 30),
(31, 'Salon', 30),
(32, 'Cuisine', 31);

-- --------------------------------------------------------

--
-- Structure de la table `sujet_du_forum`
--

CREATE TABLE `sujet_du_forum` (
  `id` int(11) NOT NULL,
  `auteur_du_sujet` varchar(255) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `nombre_de_vues` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sujet_du_forum`
--

INSERT INTO `sujet_du_forum` (`id`, `auteur_du_sujet`, `id_categorie`, `nombre_de_vues`, `nom`) VALUES
(18, '4', 2, 0, 'Besoin d''aide'),
(26, '23', 2, 0, 'Qu''en pensez vous?'),
(28, '61', 1, 0, 'Bonjour'),
(29, '61', 2, 0, 'Je n''arrive pas a relier mon compte Ã  ma maison'),
(30, '61', 1, 0, 'Je ne sais pas comment lire les donnÃ©es');

-- --------------------------------------------------------

--
-- Structure de la table `type_maison`
--

CREATE TABLE `type_maison` (
  `id` int(11) NOT NULL,
  `type_maison` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_maison`
--

INSERT INTO `type_maison` (`id`, `type_maison`) VALUES
(2, 'apartement'),
(1, 'pavillon');

-- --------------------------------------------------------

--
-- Structure de la table `type_notifications`
--

CREATE TABLE `type_notifications` (
  `id` int(11) NOT NULL,
  `type_notification` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_notifications`
--

INSERT INTO `type_notifications` (`id`, `type_notification`) VALUES
(3, 'confirmation_de_fontionnement'),
(1, 'danger'),
(2, 'dysfonctionnement'),
(4, 'news');

-- --------------------------------------------------------

--
-- Structure de la table `type_obj_connectes`
--

CREATE TABLE `type_obj_connectes` (
  `id` int(11) NOT NULL,
  `type_obj` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_obj_connectes`
--

INSERT INTO `type_obj_connectes` (`id`, `type_obj`) VALUES
(2, 'actionneur'),
(1, 'capteur');

-- --------------------------------------------------------

--
-- Structure de la table `type_utilisateurs`
--

CREATE TABLE `type_utilisateurs` (
  `id` int(11) NOT NULL,
  `type_user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_utilisateurs`
--

INSERT INTO `type_utilisateurs` (`id`, `type_user`) VALUES
(1, 'client_principal'),
(2, 'client_secondaire'),
(3, 'maintenance');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `hash_validation` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `naissance` date NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `postal` varchar(100) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `id_type_utilisateur` int(11) NOT NULL,
  `id_principal` int(11) NOT NULL,
  `avatar` varchar(128) NOT NULL,
  `date_inscription` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `username`, `mail`, `hash_validation`, `password`, `nom`, `prenom`, `naissance`, `adresse`, `ville`, `postal`, `tel`, `id_type_utilisateur`, `id_principal`, `avatar`, `date_inscription`) VALUES
(61, 'GaÃ«lle', 'sou.gaelle@gmail.com', '', '811584043b844704c9bb9a6e99dd05d3', 'Svh', 'Gaga', '0000-00-00', '17 rue', 'Saint Thib', '77400', '06 02 34', 1, 0, '', '0000-00-00'),
(83, 'maintenance', 'maintenance@gmail.com', '', '57cb773ae7a82c8c8aae12fa8f8d7abd', 'Maintenance', 'Reparateur', '0000-00-00', '', '', '', '', 3, 0, '', '2017-01-20');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs_maison`
--

CREATE TABLE `utilisateurs_maison` (
  `id` int(11) NOT NULL,
  `id_utilisateurs` int(11) NOT NULL,
  `id_maison` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateurs_maison`
--

INSERT INTO `utilisateurs_maison` (`id`, `id_utilisateurs`, `id_maison`) VALUES
(1, 61, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs_messages`
--

CREATE TABLE `utilisateurs_messages` (
  `id_utilisateurs` int(11) NOT NULL,
  `id_messages` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs_sujet_du_forum`
--

CREATE TABLE `utilisateurs_sujet_du_forum` (
  `id_utilisateurs` int(11) NOT NULL,
  `id_sujet_du_forum` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie_forum`
--
ALTER TABLE `categorie_forum`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie_obj_connectes`
--
ALTER TABLE `categorie_obj_connectes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nom_categorie` (`nom_categorie`);

--
-- Index pour la table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_createur` (`id_createur`);

--
-- Index pour la table `chat_msg`
--
ALTER TABLE `chat_msg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_expediteur` (`id_expediteur`,`id_destinataire`),
  ADD KEY `id_chat` (`id_chat`);

--
-- Index pour la table `controle`
--
ALTER TABLE `controle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateurs` (`id_utilisateurs`),
  ADD KEY `id_objets_connectés` (`id_objets_connectés`),
  ADD KEY `id_mode` (`id_mode`);

--
-- Index pour la table `envoi`
--
ALTER TABLE `envoi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_notifications` (`id_notifications`,`id_utilisateurs`),
  ADD KEY `id_utilisateurs` (`id_utilisateurs`);

--
-- Index pour la table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `habite`
--
ALTER TABLE `habite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_objets_connectes` (`id_objets_connectes`,`id_pieces`);

--
-- Index pour la table `maison`
--
ALTER TABLE `maison`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_maison` (`id_type_maison`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sujet_du_forum` (`id_sujet_du_forum`);

--
-- Index pour la table `mode_obj`
--
ALTER TABLE `mode_obj`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_maison` (`id_maison`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_notification` (`id_type_notification`);

--
-- Index pour la table `obj_connectes`
--
ALTER TABLE `obj_connectes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_objets_connectes` (`id_type_objets_connectes`,`id_categorie_objets_connectes`,`id_piece`);

--
-- Index pour la table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pieces`
--
ALTER TABLE `pieces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_maison` (`id_maison`);

--
-- Index pour la table `sujet_du_forum`
--
ALTER TABLE `sujet_du_forum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auteur_du_sujet` (`auteur_du_sujet`,`id_categorie`);

--
-- Index pour la table `type_maison`
--
ALTER TABLE `type_maison`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_maison` (`type_maison`);

--
-- Index pour la table `type_notifications`
--
ALTER TABLE `type_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_notification` (`type_notification`);

--
-- Index pour la table `type_obj_connectes`
--
ALTER TABLE `type_obj_connectes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_obj` (`type_obj`);

--
-- Index pour la table `type_utilisateurs`
--
ALTER TABLE `type_utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_user` (`type_user`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD KEY `id_type_utilisateur` (`id_type_utilisateur`),
  ADD KEY `id_principal` (`id_principal`);

--
-- Index pour la table `utilisateurs_maison`
--
ALTER TABLE `utilisateurs_maison`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateurs` (`id_utilisateurs`,`id_maison`);

--
-- Index pour la table `utilisateurs_messages`
--
ALTER TABLE `utilisateurs_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateurs` (`id_utilisateurs`,`id_messages`);

--
-- Index pour la table `utilisateurs_sujet_du_forum`
--
ALTER TABLE `utilisateurs_sujet_du_forum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateurs` (`id_utilisateurs`,`id_sujet_du_forum`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie_forum`
--
ALTER TABLE `categorie_forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `categorie_obj_connectes`
--
ALTER TABLE `categorie_obj_connectes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `chat_msg`
--
ALTER TABLE `chat_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT pour la table `controle`
--
ALTER TABLE `controle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `envoi`
--
ALTER TABLE `envoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `habite`
--
ALTER TABLE `habite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `maison`
--
ALTER TABLE `maison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT pour la table `mode_obj`
--
ALTER TABLE `mode_obj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `obj_connectes`
--
ALTER TABLE `obj_connectes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT pour la table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `pieces`
--
ALTER TABLE `pieces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT pour la table `sujet_du_forum`
--
ALTER TABLE `sujet_du_forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `type_maison`
--
ALTER TABLE `type_maison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `type_notifications`
--
ALTER TABLE `type_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `type_obj_connectes`
--
ALTER TABLE `type_obj_connectes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `type_utilisateurs`
--
ALTER TABLE `type_utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT pour la table `utilisateurs_maison`
--
ALTER TABLE `utilisateurs_maison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `utilisateurs_messages`
--
ALTER TABLE `utilisateurs_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateurs_sujet_du_forum`
--
ALTER TABLE `utilisateurs_sujet_du_forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `controle`
--
ALTER TABLE `controle`
  ADD CONSTRAINT `controle_ibfk_3` FOREIGN KEY (`id_utilisateurs`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `controle_ibfk_4` FOREIGN KEY (`id_objets_connectés`) REFERENCES `obj_connectes` (`id`);

--
-- Contraintes pour la table `envoi`
--
ALTER TABLE `envoi`
  ADD CONSTRAINT `envoi_ibfk_1` FOREIGN KEY (`id_notifications`) REFERENCES `notifications` (`id`),
  ADD CONSTRAINT `envoi_ibfk_2` FOREIGN KEY (`id_utilisateurs`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `maison`
--
ALTER TABLE `maison`
  ADD CONSTRAINT `maison_ibfk_1` FOREIGN KEY (`id_type_maison`) REFERENCES `type_maison` (`id`);

--
-- Contraintes pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`id_type_notification`) REFERENCES `type_notifications` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
