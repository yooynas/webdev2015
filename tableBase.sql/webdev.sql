-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Jeu 26 Mars 2015 à 18:38
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
  `name_chapter` varchar(100) COLLATE utf8_bin NOT NULL,
  `begin_chapter` date NOT NULL,
  `num_chapter` int(20) NOT NULL,
  `fk_lessons_chapter` int(20) NOT NULL,
  PRIMARY KEY (`id_chapter`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=10 ;

--
-- Contenu de la table `chapter`
--

INSERT INTO `chapter` (`id_chapter`, `name_chapter`, `begin_chapter`, `num_chapter`, `fk_lessons_chapter`) VALUES
(1, 'Semaine 1 : base de l''HTML, liste à puce', '2015-02-15', 1, 1),
(2, 'Semaine 2 : Les liens et les images', '2015-03-02', 2, 1),
(3, 'Semaine 3 : début CSS', '2015-03-09', 3, 1),
(4, 'Semaine 4 : CSS les classes et ID', '2015-03-16', 4, 1),
(5, 'Semaine 5 : les images d''arrière plan', '2015-03-23', 5, 1),
(6, 'Semaine 6 : CSS les boites', '2015-03-19', 6, 1),
(7, 'Semaine 7 : CSS les boites , allons plus loin', '2015-03-26', 7, 1),
(8, 'Semaine 8 : CSS la profondeur', '2015-03-31', 8, 1),
(9, 'Semaine 9 : Les tableaux et formulaire', '2015-04-08', 9, 1);

-- --------------------------------------------------------

--
-- Structure de la table `choices`
--

CREATE TABLE `choices` (
  `id_choice` int(20) NOT NULL AUTO_INCREMENT,
  `label_choice` text COLLATE utf8_bin NOT NULL,
  `check_choice` tinyint(1) NOT NULL,
  `help_choice` text COLLATE utf8_bin NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Contenu de la table `courses`
--

INSERT INTO `courses` (`id_courses`, `fk_lesson_courses`, `fk_student_courses`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

CREATE TABLE `documents` (
  `id_document` int(20) NOT NULL AUTO_INCREMENT,
  `name_document` varchar(100) CHARACTER SET latin1 NOT NULL,
  `ext_document` varchar(10) COLLATE utf8_bin NOT NULL,
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
  `nb_questions` int(2) NOT NULL,
  `fk_chapter_module` int(20) NOT NULL,
  PRIMARY KEY (`id_module`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=47 ;

--
-- Contenu de la table `modules`
--

INSERT INTO `modules` (`id_module`, `name_module`, `num_module`, `nb_questions`, `fk_chapter_module`) VALUES
(1, 'Fonctionnement des sites Web', 1, 2, 1),
(2, 'Rédiger sa 1er page HTML', 2, 2, 1),
(3, 'Méthodes pour créer un document HTML', 3, 0, 1),
(4, 'Baliser le texte de sa page', 4, 0, 1),
(5, 'Créer une liste à puce ou numérotée', 5, 0, 1),
(6, 'Révision', 6, 0, 1),
(7, 'Exercices évalué', 7, 0, 1),
(8, 'Les liens', 1, 0, 2),
(9, 'Insérer des images', 2, 2, 2),
(10, 'Révision', 3, 2, 2),
(11, 'Exercice de révision\r\n', 4, 0, 2),
(12, 'Pourquoi le CSS ?', 1, 2, 3),
(13, 'Le CSS aujourd''hui...', 2, 2, 3),
(14, 'Outils nécessaires pour rediger des feuilles de style …', 3, 0, 3),
(15, 'La syntaxe de base des feuilles de style', 4, 0, 3),
(16, 'Association d’une feuille de style a un document HTML', 5, 0, 3),
(17, 'La couleur en CSS', 6, 0, 3),
(18, 'La typographie et la mise en forme de caracteres', 7, 0, 3),
(19, 'La taille des caracteres', 8, 2, 3),
(20, 'Les bordures', 9, 2, 3),
(21, 'Les pseudo-classes', 10, 2, 3),
(22, 'Révisions', 11, 0, 3),
(23, 'Exercice de révision', 12, 0, 3),
(24, 'Les classes et les id\r\n', 1, 2, 4),
(25, 'Les balises universelles (span et div)', 2, 2, 4),
(26, 'Les selecteurs et l''arborescence', 3, 2, 4),
(27, 'Cascades et specificites', 4, 2, 4),
(28, 'Exercice de révision', 5, 0, 4),
(29, 'Gérer les images d’arriere-plan', 1, 2, 5),
(30, 'Exercice de révision', 2, 0, 5),
(31, 'Préparation au cours suivant\r\n', 3, 0, 5),
(32, 'Comprendre le modele de boite', 1, 2, 6),
(33, 'Les zones structurelles HTML5', 2, 2, 6),
(34, 'Le positionnement dans le flux courant (flux normal)', 3, 2, 6),
(35, 'Les autres méthodes de positionnement', 1, 2, 7),
(36, 'La profondeur : z-index', 1, 2, 8),
(37, 'Flottement et passages a la ligne', 2, 2, 8),
(38, 'Exercice de révision', 3, 0, 8),
(39, 'Insérer des tableaux de donnees', 1, 2, 9),
(40, 'Insérer un formulaire', 2, 2, 9),
(41, 'Exercices de révision', 3, 0, 9),
(42, 'Bonnes pratiques', 4, 0, 9),
(45, 'Outils en ligne et logiciels', 5, 0, 9),
(46, 'Evaluation certificative', 1, 0, 10);

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id_question` int(20) NOT NULL AUTO_INCREMENT,
  `label_question` text COLLATE utf8_bin NOT NULL,
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
  `pass_student` varchar(255) COLLATE utf8_bin NOT NULL,
  `first_login_student` date NOT NULL,
  `activationkey_student` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_student`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Contenu de la table `students`
--

INSERT INTO `students` (`id_student`, `firstname_student`, `nickname_student`, `lastname_student`, `email_student`, `pass_student`, `first_login_student`, `activationkey_student`) VALUES
(1, 'renard', 'goupyl', 'rudy', 'goupyl@mac.com', 'MH1Qg8DV76ESltxUwT7jslfQM1XbuOk939Y12bWpZg5KsEI58gyj8MOOgleQk8lurzBlqwKJFjFqfD6wPkajUQ==', '2015-03-03', '');

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
