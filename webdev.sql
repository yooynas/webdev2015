-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Jeu 26 Février 2015 à 18:05
-- Version du serveur :  5.5.34
-- Version de PHP :  5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `webdev`
--

-- --------------------------------------------------------

--
-- Structure de la table `announcements`
--

CREATE TABLE `announcements` (
  `id_announcement` int(20) NOT NULL AUTO_INCREMENT,
  `message_announcement` text CHARACTER SET latin1 NOT NULL,
  `fk_lessons` int(11) NOT NULL,
  PRIMARY KEY (`id_announcement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id_category` int(20) NOT NULL AUTO_INCREMENT,
  `name_category` varchar(50) CHARACTER SET latin1 NOT NULL,
  `fk_category` int(20) DEFAULT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id_category`, `name_category`, `fk_category`) VALUES
(1, 'Web', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `chapter`
--

CREATE TABLE `chapter` (
  `id_chapter` int(20) NOT NULL AUTO_INCREMENT,
  `name_chapter` varchar(100) CHARACTER SET latin1 NOT NULL,
  `begin_chapter` date NOT NULL,
  `num_chapter` int(20) NOT NULL,
  `fk_lessons_chapter` int(20) NOT NULL,
  PRIMARY KEY (`id_chapter`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Contenu de la table `chapter`
--

INSERT INTO `chapter` (`id_chapter`, `name_chapter`, `begin_chapter`, `num_chapter`, `fk_lessons_chapter`) VALUES
(1, 'Chapitre 01 : Créer et structurer une page web ', '2015-02-15', 1, 1),
(2, 'Chapitre 02 : Intégration des styles CSS', '2015-03-02', 2, 1),
(3, 'Chapitre 03 : CSS, les techniques de mise en page', '2015-03-09', 3, 1),
(4, 'Chapitre 04 : Tableaux de données et formulaires', '2015-03-16', 4, 1),
(5, 'Conclusions', '2015-03-23', 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `choices`
--

CREATE TABLE `choices` (
  `id_choice` int(20) NOT NULL AUTO_INCREMENT,
  `label_choice` text CHARACTER SET latin1 NOT NULL,
  `check_choice` tinyint(1) NOT NULL,
  `fk_questions_choice` int(20) NOT NULL,
  PRIMARY KEY (`id_choice`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

CREATE TABLE `courses` (
  `id_courses` int(20) NOT NULL AUTO_INCREMENT,
  `fk_lesson_courses` int(20) NOT NULL,
  `fk_student_courses` int(20) NOT NULL,
  PRIMARY KEY (`id_courses`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

CREATE TABLE `documents` (
  `id_document` int(20) NOT NULL AUTO_INCREMENT,
  `name_document` varchar(100) CHARACTER SET latin1 NOT NULL,
  `fk_module_document` int(20) NOT NULL,
  PRIMARY KEY (`id_document`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `follows`
--

CREATE TABLE `follows` (
  `id_follow` int(20) NOT NULL AUTO_INCREMENT,
  `total_follow` int(20) NOT NULL,
  `count_follow` int(20) NOT NULL,
  `fk_student_follow` int(20) NOT NULL,
  `fk_module_follow` int(20) NOT NULL,
  PRIMARY KEY (`id_follow`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `lessons`
--

CREATE TABLE `lessons` (
  `id_lesson` int(20) NOT NULL AUTO_INCREMENT,
  `name_lesson` varchar(150) COLLATE utf8_bin NOT NULL,
  `description_lesson` text COLLATE utf8_bin NOT NULL,
  `begin_lesson` date NOT NULL,
  `end_lesson` date NOT NULL,
  `fk_category_lesson` int(20) NOT NULL,
  `fk_holder_lesson` int(20) NOT NULL,
  PRIMARY KEY (`id_lesson`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Contenu de la table `lessons`
--

INSERT INTO `lessons` (`id_lesson`, `name_lesson`, `description_lesson`, `begin_lesson`, `end_lesson`, `fk_category_lesson`, `fk_holder_lesson`) VALUES
(1, 'Base web', 0x41707072656e74697373616765206465732062617365206465206c2748544d4c352065742043535333, '2015-02-18', '2015-06-26', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `modules`
--

CREATE TABLE `modules` (
  `id_module` int(20) NOT NULL AUTO_INCREMENT,
  `name_module` varchar(250) COLLATE utf8_bin NOT NULL,
  `num_module` int(20) NOT NULL,
  `type_module` varchar(80) COLLATE utf8_bin NOT NULL,
  `fk_chapter_module` int(20) NOT NULL,
  PRIMARY KEY (`id_module`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=33 ;

--
-- Contenu de la table `modules`
--

INSERT INTO `modules` (`id_module`, `name_module`, `num_module`, `type_module`, `fk_chapter_module`) VALUES
(1, 'Fonctionnement des sites Web', 1, '', 1),
(2, 'Créer et structurer le canevas d’une page HTML de base (HTML5)', 2, '', 1),
(3, 'Les balises de structuration du document', 3, '', 1),
(4, 'Les balises de hiérarchisation des contenus', 4, '', 1),
(5, 'Les balises de contenus textuels', 5, '', 1),
(6, 'Les hyperliens', 6, '', 1),
(7, 'Les balises de contenus multimédia externes (images)', 7, '', 1),
(8, 'Créer et structurer un document HML bien formé et validé par une DTD', 8, '', 1),
(9, 'Respecter la sémantique lors du choix des balises', 9, '', 1),
(10, 'Créer et structurer une feuille de style CSS en déterminant les sélecteurs et en utilisant les attributs', 1, '', 2),
(11, 'Réaliser la liaison entre les feuilles de styles et les pages web en utilisant les techniques et méthodologies les plus pertinentes', 2, '', 2),
(12, 'Formater des pages HTML à l’aide du CSS : couleurs (pleine, nommées, transparentes), typographie (les @font-face, les sites de font et les @font-face generator), taille des caractères (absolues et relatives), bordures, images, …', 3, '', 2),
(13, 'Les classes et les identifiants, les balises universelles', 4, '', 2),
(14, 'Les pseudo-classes ', 5, '', 2),
(15, 'Ciblage et arborescence, cascade et spécificité', 6, '', 2),
(16, 'Gérer les images (puces, arrière-plan, images d’arrière-plan multiples …)', 7, '', 2),
(17, 'Comprendre le modèle de boîte', 1, '', 3),
(18, 'Les imbrications de boîtes', 2, '', 3),
(19, 'Les zones structurelles de l’HTML 5', 3, '', 3),
(20, 'Le positionnement dans le flux courant (flux normal) ', 4, '', 3),
(21, 'Les autres méthodes de positionnement', 5, '', 3),
(22, 'La profondeur : Z-Index', 6, '', 3),
(23, 'Flottement et passages à la ligne', 7, '', 3),
(24, 'Exercice de synthèse', 8, '', 3),
(25, 'Insérer des tableaux de données', 1, '', 4),
(26, 'Accessibilité des tableaux de données', 2, '', 4),
(27, 'Mise en forme d’un tableau de données', 3, '', 4),
(28, 'Insérer un formulaire', 4, '', 4),
(29, 'Les éléments de formulaire', 5, '', 4),
(30, 'Mise en forme des formulaires avec le CSS3', 6, '', 4),
(31, 'Bonnes pratiques', 1, '', 5),
(32, 'Outils en ligne et logiciels', 2, '', 5);

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id_question` int(20) NOT NULL AUTO_INCREMENT,
  `label_question` text CHARACTER SET latin1 NOT NULL,
  `fk_module_question` int(20) NOT NULL,
  PRIMARY KEY (`id_question`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `students`
--

CREATE TABLE `students` (
  `id_student` int(20) NOT NULL AUTO_INCREMENT,
  `firstname_student` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nickname_student` varchar(50) CHARACTER SET latin1 NOT NULL,
  `lastname_student` varchar(50) CHARACTER SET latin1 NOT NULL,
  `email_student` varchar(100) CHARACTER SET latin1 NOT NULL,
  `pass_student` binary(20) NOT NULL,
  `first_login_student` date NOT NULL,
  PRIMARY KEY (`id_student`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `teachers`
--

CREATE TABLE `teachers` (
  `id_teacher` int(20) NOT NULL AUTO_INCREMENT,
  `firstname_teacher` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nickname_teacher` varchar(50) CHARACTER SET latin1 NOT NULL,
  `lastname_teacher` varchar(50) CHARACTER SET latin1 NOT NULL,
  `email_teacher` varchar(100) CHARACTER SET latin1 NOT NULL,
  `pass_teacher` binary(20) NOT NULL,
  `first_login_teacher` date NOT NULL,
  PRIMARY KEY (`id_teacher`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Contenu de la table `teachers`
--

INSERT INTO `teachers` (`id_teacher`, `firstname_teacher`, `nickname_teacher`, `lastname_teacher`, `email_teacher`, `pass_teacher`, `first_login_teacher`) VALUES
(1, 'Rudy', 'Goupyl', 'Renard', 'rudy.renard@ifosupwavre.be', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '2015-02-26');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
