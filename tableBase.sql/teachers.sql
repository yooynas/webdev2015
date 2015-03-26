-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Jeu 12 Mars 2015 à 19:51
-- Version du serveur :  5.5.38
-- Version de PHP :  5.5.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `webdev2015`
--

-- --------------------------------------------------------

--
-- Structure de la table `teachers`
--

CREATE TABLE `teachers` (
`id_teacher` int(20) NOT NULL,
  `firstname_teacher` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nickname_teacher` varchar(50) CHARACTER SET latin1 NOT NULL,
  `lastname_teacher` varchar(50) CHARACTER SET latin1 NOT NULL,
  `email_teacher` varchar(100) CHARACTER SET latin1 NOT NULL,
  `pass_teacher` varchar(255) COLLATE utf8_bin NOT NULL,
  `rank_teacher` smallint(1) NOT NULL DEFAULT '0',
  `first_login_teacher` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `teachers`
--

INSERT INTO `teachers` (`id_teacher`, `firstname_teacher`, `nickname_teacher`, `lastname_teacher`, `email_teacher`, `pass_teacher`, `rank_teacher`, `first_login_teacher`) VALUES
(1, 'Rudy', 'Goupyl', 'Renard', 'rudy.renard@ifosupwavre.be', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 0, '2015-02-26'),
(2, 'Julien', 'Raks3010', 'Houyet', 'julien.houyet@gmail.com', '8A+wXozwqcjEvZqqqlVBjQ62z3gT1doiRvWq0xLr/vFextywhfim3Nz8PuRnIn4OneG4xgmMbiFt2/CJeC/3NQ==', 1, '0000-00-00'),
(3, 'Damien', 'damslesbraslong', 'Geniesse', 'geniessed@gmail.com', 'tfcZ+oT3l4NrdXRTqOb5yaGLCFWSGLLSG/AHUGxuOxuIMs7HKcxPuWIS/iVpi6TNWORb2wz9k2Kw2Cpe9Dy9ZQ==', 1, '0000-00-00');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `teachers`
--
ALTER TABLE `teachers`
 ADD PRIMARY KEY (`id_teacher`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `teachers`
--
ALTER TABLE `teachers`
MODIFY `id_teacher` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;