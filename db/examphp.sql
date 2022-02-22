-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 22 fév. 2022 à 17:01
-- Version du serveur :  5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `examphp`
--

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `files` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `files`
--

INSERT INTO `files` (`id`, `files`, `user_id`) VALUES
(33, 'EAN P2023.2 Calendrier.pdf', 0),
(34, 'examen_livecampus à rendre.txt', 0),
(35, 'examen_livecampus à rendre.txt', 0),
(36, 'examen_livecampus.txt', 25),
(37, 'EAN P2023.2 Calendrier.pdf', 14);

-- --------------------------------------------------------

--
-- Structure de la table `urls`
--

CREATE TABLE `urls` (
  `id` int(11) NOT NULL,
  `long_url` varchar(255) NOT NULL,
  `short_url` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `fk_user_id` int(11) NOT NULL,
  `count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `urls`
--

INSERT INTO `urls` (`id`, `long_url`, `short_url`, `active`, `fk_user_id`, `count`) VALUES
(50, 'http://www.mavanimes.co/shingeki-no-kyojin-lattaque-des-titans-saison-4-23-vostfr/', 'http://shortURL.com/8a21382b46', 1, 14, 2),
(79, 'http://www.mavanimes.co/amagi-brilliant-park-special-2/', 'http://shortURL.com/753af7ff83', 1, 25, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `login` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `login`, `pass`) VALUES
(14, 'chris@gmail.com', 'chris', '$2y$10$slEnr8hnq887gA3g1Omsw.BvFra9E0WH.Oz8Y/5DocuFINRF3.bNu'),
(16, 'jeason@jeas.com', 'test', '$2y$10$V0zpBs.ZxeD2ApVDb1yeDemfI6o.7Qe27I4Np8hI3soqcUBFmIhPq'),
(22, 'mel@test.fr', 'mel', '$2y$10$38xAW6Y1YNxptr9g4ZZ50uIdR9O9KZP3xk4ZO1M21dIaLSnz4GAI.'),
(23, 'melanie@gmail.fr', 'test', '$2y$10$/tDJzWevyjKNgfcog83xUe8tmO7kImJca8RUqV.1RV50JryK/ehVS'),
(24, 'fklxjfklxjl@dFgfdf.ff', 'toto', '$2y$10$HqkjRGGcoh.P4oZZQoopWeat1qO3/UbjqPEiKSJnpd5n9.DEo/AvK'),
(25, 'ness@test.fr', 'ness', '$2y$10$CsJLKB/9aUueyahmbjJY4Og7RPGyOLP9TBoHgF3yw4OKv6Tzp8lwO');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `urls`
--
ALTER TABLE `urls`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `urls`
--
ALTER TABLE `urls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
