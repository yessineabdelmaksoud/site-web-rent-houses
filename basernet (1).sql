-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 07 mai 2024 à 08:58
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
-- Base de données :  `basernet`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `username`, `email`, `phone`, `password`, `gender`) VALUES
(1, 'yessine', 'mak', 'yessineabdelmaksoud03gmail.com', '20455488', 'yessine0123', 'Male'),
(2, 'abdelmaksoud', 'makkoud', 'yessineabdelmaksoud13@gmail.com', '28555666', '55', 'Male'),
(3, 'daaldoul', 'dall', 'daldoul@gmail.com', '22222222', 'dal', 'Male'),
(4, 'dali', 'abid', 'daldoul03@gmail.com', '284444444', 'dali123', 'Male'),
(7, 'rayen', 'rayon', 'rayen@gmail.com', '22222222', 'rayen123', 'Male'),
(8, 'rayen', 'rayon', 'rayen123@gmail.com', '22222222', '1232', 'Male'),
(10, 'daaldoul', '', 'daldoul111@gmail.com', '22222222', 'yyy', 'Male'),
(13, 'oussema ghazal', 'ghaazel', 'ghazel@gmail.com', '200000', '11', 'Male');

-- --------------------------------------------------------

--
-- Structure de la table `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL,
  `for_` varchar(50) NOT NULL,
  `nbroom` int(11) NOT NULL,
  `localisation` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `type` varchar(50) NOT NULL,
  `describe_` text NOT NULL,
  `main_image` varchar(255) NOT NULL,
  `other_images` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `home`
--

INSERT INTO `home` (`id`, `for_`, `nbroom`, `localisation`, `price`, `type`, `describe_`, `main_image`, `other_images`, `created_at`) VALUES
(7, 'rent', 2, 'kairouan', '100.00', '2 personne', 'bad', 'uploads/lose.png', 'uploads/multiple/backk.png,uploads/multiple/chicken1.png,uploads/multiple/enter.png,uploads/multiple/lose.png', '2024-05-06 19:31:54'),
(5, 'rent', 3, 'sfax', '400.00', 'student', 'good', 'uploads/start.jpg', NULL, '2024-05-06 18:56:32'),
(3, 'rent', 2, 'kairouan', '20.00', 'friends', '55', 'uploads/backk.png', NULL, '2024-05-06 18:50:57'),
(4, 'rent', 2, 'kairouan', '20.00', 'rent ', '55', 'uploads/backk.png', NULL, '2024-05-06 18:51:41'),
(6, 'rent', 5, 'monastir', '600.00', 'famly', 'very good', 'uploads/start.jpg', NULL, '2024-05-06 19:19:11');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
