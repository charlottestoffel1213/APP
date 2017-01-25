-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 24 Janvier 2017 à 19:10
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
(2, 'luminosite'),
(3, 'securite'),
(1, 'temperature');

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `id_expediteur` int(11) NOT NULL,
  `id_destinataire` int(11) NOT NULL,
  `requette` text NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `chat`
--

INSERT INTO `chat` (`id`, `id_expediteur`, `id_destinataire`, `requette`, `message`, `date`) VALUES
(1, 43, 22, '', 'CJSQL', '0000-00-00 00:00:00'),
(2, 43, 4, '', 'hello\r\n', '0000-00-00 00:00:00'),
(3, 43, 22, '', 'Bonjour', '0000-00-00 00:00:00'),
(4, 43, 33, '', 'Bienvenue', '0000-00-00 00:00:00'),
(5, 43, 33, '', 'Bienvenue', '0000-00-00 00:00:00'),
(6, 43, 33, '', 'Bienvenue', '0000-00-00 00:00:00'),
(7, 43, 33, '', 'Bienvenue', '0000-00-00 00:00:00'),
(8, 43, 33, '', 'Bienvenue', '0000-00-00 00:00:00'),
(9, 43, 33, '', 'Bienvenue', '0000-00-00 00:00:00'),
(10, 43, 33, '', 'Bienvenue', '0000-00-00 00:00:00'),
(11, 43, 33, '', 'Bienvenue', '0000-00-00 00:00:00'),
(12, 43, 33, '', 'Bienvenue', '0000-00-00 00:00:00'),
(13, 43, 4, '', 'hello\r\n', '0000-00-00 00:00:00'),
(14, 43, 33, '', 'Bienvenue', '0000-00-00 00:00:00'),
(15, 43, 16, '', 'by', '0000-00-00 00:00:00'),
(16, 43, 16, '', 'nk', '0000-00-00 00:00:00'),
(17, 43, 33, '', 'Bonjour', '0000-00-00 00:00:00'),
(18, 44, 33, '', 'hello!', '0000-00-00 00:00:00'),
(19, 33, 44, '', 'bonjour', '0000-00-00 00:00:00'),
(20, 33, 28, '', 'csk', '0000-00-00 00:00:00'),
(21, 43, 32, '', 'hello\r\nmaintenance', '0000-00-00 00:00:00'),
(22, 43, 33, '', 'hello', '0000-00-00 00:00:00'),
(23, 43, 33, '', 'hello', '0000-00-00 00:00:00'),
(24, 43, 33, '', 'bonjour', '0000-00-00 00:00:00'),
(25, 43, 33, '', 'bonjour', '0000-00-00 00:00:00'),
(26, 43, 33, '', 'hello maintenance', '0000-00-00 00:00:00'),
(27, 43, 33, '', 'hello maintenance', '0000-00-00 00:00:00'),
(28, 43, 33, '', 'bonjour la maintenance', '0000-00-00 00:00:00'),
(29, 43, 33, '', 'bonjour la maintenance', '0000-00-00 00:00:00'),
(30, 43, 33, '', 'bonjour la maintenance', '0000-00-00 00:00:00'),
(31, 43, 33, '', 'hy!', '0000-00-00 00:00:00'),
(32, 33, 16, '', 'bonjour', '0000-00-00 00:00:00'),
(33, 33, 44, '', 'marie bonjour', '0000-00-00 00:00:00'),
(34, 44, 33, '', 'comment vas tu?', '0000-00-00 00:00:00'),
(35, 43, 33, '', 'bonjour', '0000-00-00 00:00:00'),
(36, 43, 33, '', 'delphine', '0000-00-00 00:00:00'),
(37, 33, 44, '', 'Bonjour', '0000-00-00 00:00:00'),
(38, 33, 44, '', 'Bonjour marie, comment vas tu?', '0000-00-00 00:00:00'),
(39, 44, 33, '', 'Bonjour,j ai capteur ma salle de bain qui marche plus comment faire?', '0000-00-00 00:00:00'),
(40, 33, 44, '', 'oui j ai la solution', '0000-00-00 00:00:00'),
(41, 33, 44, '', 'oui j ai la solution', '0000-00-00 00:00:00'),
(42, 33, 44, '', 'oui j ai la solution', '0000-00-00 00:00:00'),
(43, 33, 44, '', 'oui j ai la solution', '0000-00-00 00:00:00'),
(44, 33, 44, '', 'oui j ai la solution', '0000-00-00 00:00:00'),
(45, 44, 33, '', 'Bonjour la maintenancecomment allez vous?\r\n', '0000-00-00 00:00:00'),
(46, 44, 33, '', 'HELLO\r\n', '0000-00-00 00:00:00'),
(47, 44, 33, '', 'HELLO\r\n', '0000-00-00 00:00:00'),
(48, 44, 33, '', 'HELLO\r\n', '0000-00-00 00:00:00'),
(49, 44, 33, '', 'HELLO\r\n', '0000-00-00 00:00:00'),
(50, 44, 33, '', 'HELLO\r\n', '0000-00-00 00:00:00'),
(51, 44, 33, '', 'HELLO\r\n', '0000-00-00 00:00:00'),
(52, 44, 33, '', 'HELLO\r\n', '0000-00-00 00:00:00'),
(53, 44, 33, '', 'HELLO\r\n', '0000-00-00 00:00:00'),
(54, 44, 33, '', 'HELLO\r\n', '0000-00-00 00:00:00'),
(55, 44, 33, '', 'HELLO\r\n', '0000-00-00 00:00:00'),
(56, 44, 33, '', 'HELLO\r\n', '0000-00-00 00:00:00'),
(57, 44, 33, '', 'HELLO\r\n', '0000-00-00 00:00:00'),
(58, 44, 33, '', 'HELLO\r\n', '0000-00-00 00:00:00'),
(59, 44, 33, '', 'HELLO\r\n', '0000-00-00 00:00:00'),
(60, 44, 33, '', 'HELLO\r\n', '0000-00-00 00:00:00'),
(61, 44, 33, '', 'HELLO\r\n', '0000-00-00 00:00:00'),
(62, 44, 33, 'Un capteur/actionneur est defaillant dans ma maison', 'ja i un probleme avec un capteur dans ma maison!', '0000-00-00 00:00:00'),
(63, 44, 33, 'Un capteur/actionneur est defaillant dans ma maison', 'ja i un probleme avec un capteur dans ma maison!', '0000-00-00 00:00:00'),
(64, 44, 33, 'Un capteur/actionneur est defaillant dans ma maison', 'ja i un probleme avec un capteur dans ma maison!', '0000-00-00 00:00:00'),
(65, 44, 33, 'Un capteur/actionneur est defaillant dans ma maison', 'ja i un probleme avec un capteur dans ma maison!', '0000-00-00 00:00:00'),
(66, 44, 33, 'Autres problÃ¨mes', 'bonjour', '0000-00-00 00:00:00'),
(67, 44, 33, 'Autres problÃ¨mes', 'bonjour', '0000-00-00 00:00:00'),
(68, 44, 33, 'Autres problÃ¨mes', 'bonjour', '0000-00-00 00:00:00'),
(69, 44, 33, 'Autres problÃ¨mes', 'bonjour', '0000-00-00 00:00:00'),
(70, 44, 33, 'Autres problÃ¨mes', 'bonjour', '0000-00-00 00:00:00'),
(71, 44, 33, 'Autres problÃ¨mes', 'bonjour', '0000-00-00 00:00:00'),
(72, 44, 33, 'Rajouter un capteur/actionneur dans une piÃ¨ce', 'bonjour', '0000-00-00 00:00:00'),
(73, 33, 44, '', 'marie la plus belle', '0000-00-00 00:00:00'),
(74, 44, 33, 'Un capteur/actionneur est defaillant dans ma maison', 'hello', '0000-00-00 00:00:00'),
(75, 44, 33, 'J''ai un problÃ¨me d''affichage avec une donnÃ©e de capteur/actionneur', 'hello', '0000-00-00 00:00:00'),
(76, 44, 33, 'J''ai un problÃ¨me d''affichage avec une donnÃ©e de capteur/actionneur', 'hello', '0000-00-00 00:00:00'),
(77, 44, 33, 'J''ai un problÃ¨me d''affichage avec une donnÃ©e de capteur/actionneur', 'hello', '0000-00-00 00:00:00'),
(78, 44, 33, 'J''ai un problÃ¨me d''affichage avec une donnÃ©e de capteur/actionneur', 'hello', '0000-00-00 00:00:00'),
(79, 44, 33, 'J''ai un problÃ¨me d''affichage avec une donnÃ©e de capteur/actionneur', 'hello', '0000-00-00 00:00:00'),
(80, 33, 44, '', 'bonjour', '0000-00-00 00:00:00'),
(81, 33, 44, '', 'bonjour', '2017-01-13 00:00:00'),
(82, 33, 44, '', 'bonjour marie coucou', '2017-01-13 00:00:00'),
(83, 44, 33, 'Autres problÃ¨mes', 'Bonjour', '2017-01-13 00:00:00'),
(84, 44, 33, 'Autres problÃ¨mes', 'Bonjour', '2017-01-13 00:00:00'),
(85, 44, 33, 'Autres problÃ¨mes', 'Bonjour', '2017-01-13 00:00:00'),
(86, 44, 33, 'Autres problÃ¨mes', 'Bonjour', '2017-01-13 00:00:00'),
(87, 44, 33, 'Autres problÃ¨mes', 'Bonjour', '2017-01-13 00:00:00'),
(88, 44, 33, 'Autres problÃ¨mes', 'Bonjour', '2017-01-13 00:00:00'),
(89, 44, 33, 'Autres problÃ¨mes', 'Bonjour', '2017-01-13 00:00:00'),
(90, 44, 33, 'Autres problÃ¨mes', 'Bonjour', '2017-01-13 00:00:00'),
(91, 44, 33, 'Autres problÃ¨mes', 'Bonjour', '2017-01-13 00:00:00'),
(92, 44, 33, 'Rajouter un capteur/actionneur dans une piÃ¨ce', 'Bonjourno', '2017-01-13 00:00:00'),
(93, 44, 33, 'J''ai un problÃ¨me d''affichage avec une donnÃ©e de capteur/actionneur', 'hello', '2017-01-13 00:00:00'),
(94, 44, 33, 'Un capteur/actionneur est defaillant dans ma maison', 'hello', '2017-01-13 00:00:00'),
(95, 33, 44, '', 'hello', '2017-01-13 13:26:40'),
(96, 33, 44, '', 'bonjour marie', '2017-01-14 11:26:07'),
(97, 33, 44, '', 'Bonjour hello\r\n', '2017-01-16 16:20:36'),
(98, 83, 80, '', 'Coucou', '2017-01-22 17:45:29'),
(99, 61, 83, 'J''ai un problÃ¨me d''affichage avec une donnÃ©e de capteur/actionneur', 'aidez moi', '2017-01-22 17:49:59'),
(100, 83, 61, '', 'Je vous Ã©coute ', '2017-01-22 17:50:43'),
(101, 61, 83, 'Autres problÃ¨mes', 'non', '2017-01-22 17:54:10');

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

--
-- Contenu de la table `maison`
--

INSERT INTO `maison` (`id`, `id_type_maison`, `adresse`, `postal`, `ville`, `code_client`) VALUES
(1, 2, '', 0, '', '0'),
(2, 2, '', 0, '', '0'),
(5, 2, 'ok', 77400, 'paris', '0'),
(6, 2, 'ok', 77400, 'paris', '0'),
(7, 2, 'ok', 77400, 'paris', '0'),
(8, 2, 'ok', 77400, 'paris', '0'),
(9, 2, 'ok', 77400, 'paris', '0'),
(10, 2, 'ok', 77400, 'paris', '0'),
(11, 2, '17 rue de la grande grille', 77400, 'Saint thibault des vignes', '0'),
(12, 2, 'coucou', 95050, 'PAris', '0'),
(13, 2, 'coucou', 95050, 'PAris', '0'),
(14, 2, 'coucou', 95050, 'PAris', '0'),
(15, 2, 'coucou', 95050, 'PAris', '0'),
(16, 2, 'test', 92, 'test', '0'),
(17, 2, 'test', 92, 'test', '0'),
(18, 2, 'test', 92, 'test', '0'),
(19, 2, 'test', 92, 'test', '0'),
(20, 2, 'test', 92, 'test', '0'),
(21, 2, 'test', 92, 'test', '0'),
(22, 2, 'test', 92, 'test', '0'),
(23, 2, 'test', 92, 'test', '0'),
(24, 2, 'test', 92, 'test', '0'),
(25, 2, '10 rue de vanve', 83478, 'Issy les moulineaux', '0'),
(26, 2, '12 rue notre dame des champs', 75006, 'Paris', '7cc9932eb3b8569777121dd589989527'),
(27, 2, '12rue', 75, 'Paris', '415acf9f5104e76405b7cc98c8e93bbe'),
(28, 2, '10 rue', 75, 'Paris', '39563b102fe4b7fbbfdeeb0c072bc913');

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
(4, '17', '2017-01-01 22:53:44', 'Ceci est un appel a l''aide!', '', 14),
(5, '4', '2017-01-02 11:38:37', 'J''utilise l''utilisateur Charlotte, id 4.', '', 15),
(6, '4', '2017-01-02 12:05:50', 'D''accord ', '', 15),
(7, '4', '2017-01-02 12:26:09', 'Bonjour, je test une nouvelle fois le forum', '', 16),
(8, '4', '2017-01-02 12:26:22', 'J''espere que Ã§a marche la\r\n', '', 16),
(9, '4', '2017-01-02 12:35:23', ' Oui encore une fois ', '', 17),
(10, '4', '2017-01-02 21:09:16', 'Bonjour, j''ai besoin de votre avis ', '', 18),
(11, '4', '2017-01-02 21:27:16', 'Bonjour :)', '', 16),
(12, '4', '2017-01-02 21:27:21', 'Bonjour :)', '', 16),
(13, '4', '2017-01-02 21:30:08', 'Bonjour :)', '', 16),
(14, '4', '2017-01-02 21:30:20', 'oups', '', 16),
(15, '5', '2017-01-02 21:30:37', 'Salut\r\n', '', 16),
(16, '5', '2017-01-03 10:48:38', 'coucou', '', 16),
(17, '5', '2017-01-03 10:50:19', 'idris', '', 16),
(18, '5', '2017-01-03 16:11:55', 'Bonjour', '', 16),
(19, '5', '2017-01-03 21:28:58', 'Dites moi que tout marche svp', '', 19),
(26, '5', '2017-01-04 18:02:13', 'Apparemment non ', '', 20),
(27, '5', '2017-01-04 18:48:19', 'Je t''Ã©coute ', '', 18),
(28, '14', '2017-01-04 18:51:00', 'Je t''Ã©coute ', '', 18),
(29, '13', '2017-01-04 18:51:27', 'Je suis la aussi', '', 18),
(30, '23', '2017-01-04 20:15:31', 'test\r\n', '', 18),
(31, '23', '2017-01-07 10:39:35', 'tkt', '', 19),
(32, '23', '2017-01-07 10:45:19', 'Je ne sais pas', '', 26),
(33, '23', '2017-01-07 10:45:59', 'bjr', '', 27),
(34, '23', '2017-01-07 11:53:42', 'ok', '', 16),
(35, '61', '2017-01-12 10:09:36', 'J''ai besoin d''aide\r\n', '', 28),
(36, '61', '2017-01-12 10:09:41', 'ok\r\n', '', 28),
(37, '61', '2017-01-12 10:33:33', 'ok', '', 28),
(38, '61', '2017-01-12 10:34:14', 'Bonjour', '', 29),
(39, '61', '2017-01-14 00:10:02', 'test\r\n', '', 29),
(40, '61', '2017-01-16 16:49:03', 'coucou\r\n', '', 29),
(41, '80', '2017-01-20 21:56:08', 'ok', '', 29);

-- --------------------------------------------------------

--
-- Structure de la table `mode_obj`
--

CREATE TABLE `mode_obj` (
  `id` int(11) NOT NULL,
  `nom_mode` varchar(100) NOT NULL,
  `temperature` int(11) NOT NULL,
  `luminosite` int(11) NOT NULL,
  `securite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `mode_obj`
--

INSERT INTO `mode_obj` (`id`, `nom_mode`, `temperature`, `luminosite`, `securite`) VALUES
(1, 'mode_nuit', 18, 0, 1),
(2, 'mode_jour', 20, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `mode_obj_pers`
--

CREATE TABLE `mode_obj_pers` (
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `id_piece` varchar(255) NOT NULL,
  `batterie` int(11) NOT NULL,
  `donnee_demandee` int(11) NOT NULL,
  `donnee_recue` varchar(255) NOT NULL,
  `seuil_erreur` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `frequence` date NOT NULL,
  `etat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `obj_connectes`
--

INSERT INTO `obj_connectes` (`id`, `nom`, `id_type_objets_connectes`, `id_categorie_objets_connectes`, `id_piece`, `batterie`, `donnee_demandee`, `donnee_recue`, `seuil_erreur`, `description`, `frequence`, `etat`) VALUES
(1, 'temp1', 0, 1, '', 0, 0, '', 0, '', '0000-00-00', 'fonctionne'),
(2, 'temp2', 2, 1, '1', 0, 0, '30', 0, '', '0000-00-00', 'disfonctionnement'),
(3, 'temp3', 2, 1, '2', 0, 0, '30', 0, '', '0000-00-00', 'fonctionne'),
(4, 'secu1', 0, 3, '1', 0, 0, '0', 0, '', '0000-00-00', 'fonctionne'),
(5, 'lumi1', 0, 2, '1', 0, 0, '0', 0, '', '0000-00-00', 'fonctionne'),
(6, 'lumi2', 2, 2, '2', 0, 0, '0', 0, '', '0000-00-00', 'fonctionne'),
(7, 'secu2', 2, 3, '2', 0, 0, '0', 0, '', '0000-00-00', 'fonctionne'),
(8, 'secu3', 2, 3, '1', 0, 0, '0', 0, '', '0000-00-00', 'fonctionne'),
(9, 'temp4', 2, 1, '4', 0, 0, '10', 0, '', '0000-00-00', ''),
(10, 'idriss', 0, 0, '', 0, 0, '', 0, '', '0000-00-00', '');

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
(5, 'Enrengistrer', 0),
(6, 'idriss', 0),
(7, 'idriss', 0),
(8, 'gaga', 0),
(9, 'papa', 0),
(10, 'gaga1', 0),
(11, 'charlotte', 0),
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
(26, 'Chambre de MÃ©mÃ©', 28);

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
(29, '61', 2, 0, 'Je n''arrive pas a relier mon compte Ã  ma maison');

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
(54, 'Gaga3', 'gaga@gmail.com', '', '811584043b844704c9bb9a6e99dd05d3', '', '', '0000-00-00', '', '', '', '', 2, 52, '', '0000-00-00'),
(55, 'quentin', 'quentin', '', 'c7f413a4f6f4a658c24f0a437666089e', 'Hugon', '', '0000-00-00', '', '', '', '', 1, 0, '', '0000-00-00'),
(61, 'GaÃ«lle', 'sou.gaelle@gmail.com', '', '59b0cde44fd9215416b0200f99efafc8', 'Svh', 'Gaga', '0000-00-00', '17 rue', 'Saint Thib', '77400', '06 02', 1, 0, '', '0000-00-00'),
(62, 'Alex', 'alex@gmail.com', '', '534b44a19bf18d20b71ecc4eb77c572f', '', '', '0000-00-00', '', '', '', '', 1, 61, '', '0000-00-00'),
(63, 'Kevin', 'Kevin', '', 'f1cd318e412b5f7226e5f377a9544ff7', '', '', '0000-00-00', '', '', '', '', 2, 61, '', '0000-00-00'),
(64, 'Hugo', 'hugo@gmail.com', '', 'f1f58e8c06b2a61ce13e0c0aa9473a72', '', '', '0000-00-00', '', '', '', '', 1, 0, '', '0000-00-00'),
(65, 'mickael', 'mick', '', '29bfe372865737fe2bfcfd3618b1da7d', '', '', '0000-00-00', '', '', '', '', 1, 0, '', '0000-00-00'),
(66, 'cylia', 'cylia', '', '471c1f3fc1dd7bb8cd0341b03e4be59e', '', '', '0000-00-00', '', '', '', '', 1, 0, '', '0000-00-00'),
(67, 'elyn', 'elyn@gmail.com', '', '5f73b98c74b8596d88becee9358cb33c', '', '', '0000-00-00', '', '', '', '', 1, 0, '', '0000-00-00'),
(69, 'Gaelle1', 'test@gmail.com', '', '811584043b844704c9bb9a6e99dd05d3', '', '', '0000-00-00', '', '', '', '', 1, 0, '', '0000-00-00'),
(71, 'Gaelle2', 'r5@gmail.com', '', '811584043b844704c9bb9a6e99dd05d3', '', '', '0000-00-00', '', '', '', '', 1, 0, '', '0000-00-00'),
(72, 'Gaelle3', 'p5@gmail.com', '', '811584043b844704c9bb9a6e99dd05d3', 'Souvanheuane', '', '0000-00-00', '', '', '', '', 1, 0, '', '2017-01-12'),
(73, 'maintenance1', 'maintenance1@gmail.com', '', '57cb773ae7a82c8c8aae12fa8f8d7abd', '', '', '0000-00-00', '', '', '', '', 3, 0, '', '2017-01-12'),
(79, 'Nelly', 'nelly@gmail.com', '', '3a2e8986d4c2bc69a82effbe87e86757', '', '', '0000-00-00', '', '', '', '', 1, 0, '', '2017-01-14'),
(80, 'Tina', 'tina@gmail.com', '', 'ef2afe0ea76c76b6b4b1ee92864c4d5c', '', '', '0000-00-00', '', '', '', '', 2, 61, '', '2017-01-14'),
(81, 'Elisabeth', 'elisabeth@gmail.com', '', 'f11d689dda4227953e50a0c4ee2ed3f2', '', '', '0000-00-00', '', '', '', '', 2, 61, '', '2017-01-14'),
(83, 'maintenance', 'maintenance@gmail.com', '', '57cb773ae7a82c8c8aae12fa8f8d7abd', 'Maintenance', 'Reparateur', '0000-00-00', '', '', '', '', 3, 0, '', '2017-01-20'),
(84, 'Test2', 'test', '', '098f6bcd4621d373cade4e832627b4f6', '', '', '0000-00-00', '', '', '', '', 1, 0, '', '2017-01-24'),
(85, 'Gaelle5', 'gaelle', '', '8180a8725f728c45aaafb3ad3c112c08', '', '', '0000-00-00', '', '', '', '', 1, 0, '', '2017-01-24'),
(86, 'Pepe2', 'pepe', '', '926e27eecdbc7a18858b3798ba99bddd', '', '', '0000-00-00', '', '', '', '', 1, 0, '', '2017-01-24');

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
(1, 61, 1),
(2, 79, 2),
(3, 81, 2),
(4, 82, 2),
(5, 83, 2),
(6, 86, 28);

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
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT pour la table `mode_obj`
--
ALTER TABLE `mode_obj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `obj_connectes`
--
ALTER TABLE `obj_connectes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `pieces`
--
ALTER TABLE `pieces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `sujet_du_forum`
--
ALTER TABLE `sujet_du_forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT pour la table `utilisateurs_maison`
--
ALTER TABLE `utilisateurs_maison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
