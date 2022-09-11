-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 11 sep. 2022 à 11:40
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `photo-famille`
--

-- --------------------------------------------------------

--
-- Structure de la table `branches`
--

CREATE TABLE `branches` (
  `branche_id` int(2) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `branches`
--

INSERT INTO `branches` (`branche_id`, `name`) VALUES
(1, 'carriou'),
(8, 'jego'),
(7, 'lechenadec'),
(6, 'lehouarner'),
(2, 'lemoing'),
(5, 'leny'),
(3, 'lequintrec'),
(4, 'roperch'),
(10, 'temporal');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `content` longtext NOT NULL,
  `picture_id` int(11) NOT NULL,
  `people_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`comment_id`, `created_at`, `content`, `picture_id`, `people_id`) VALUES
(1, '2022-08-16 12:34:48', 'siohighdoiqhoaezdsjkojpq$^gjsdpjspwjf ,îjue^zoi povqôiehiozjd ', 43, 51),
(2, '2022-08-17 17:46:04', 'test comment', 43, 52),
(3, '2022-08-17 17:46:14', 'Cette photo est top !', 43, 52),
(4, '2022-08-17 17:46:19', 'Banana !!', 43, 52),
(5, '2022-08-17 18:04:41', 'In ut quam vitae odio lacinia tincidunt. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Nunc nec neque.\r\n\r\nPraesent ut ligula non mi varius sagittis. Nulla sit amet est. Duis leo.\r\n\r\nNam commodo suscipit quam. Phasellus gravida semper nisi. Nunc interdum lacus sit amet orci.', 37, 52),
(6, '2022-08-17 18:06:33', 'Etiam rhoncus. Ut non enim eleifend felis pretium feugiat. Sed libero. Donec mi odio, faucibus at, scelerisque quis, convallis in, nisi. Donec vitae orci sed dolor rutrum auctor.\r\nSed lectus. Morbi mollis tellus ac sapien. Morbi mattis ullamcorper velit. Phasellus blandit leo ut odio. Curabitur ligula sapien, tincidunt non, euismod vitae, posuere imperdiet, leo.', 37, 52),
(7, '2022-08-17 18:07:16', 'Etiam rhoncus. Ut non enim eleifend felis pretium feugiat. Sed libero. Donec mi odio, faucibus at, scelerisque quis, convallis in, nisi. Donec vitae orci sed dolor rutrum auctor.\r\nSed lectus. Morbi mollis tellus ac sapien. Morbi mattis ullamcorper velit. Phasellus blandit leo ut odio. Curabitur ligula sapien, tincidunt non, euismod vitae, posuere imperdiet, leo.', 37, 52),
(8, '2022-08-26 15:13:34', '999', 43, 52),
(9, '2022-08-29 15:52:31', 'C\'est qui ?', 41, 52);

-- --------------------------------------------------------

--
-- Structure de la table `people`
--

CREATE TABLE `people` (
  `people_id` int(11) NOT NULL,
  `nom` varchar(80) NOT NULL,
  `prenom` varchar(80) NOT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `isUser` varchar(10) NOT NULL DEFAULT 'no',
  `picture` varchar(255) NOT NULL DEFAULT 'no-picture.png',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `people`
--

INSERT INTO `people` (`people_id`, `nom`, `prenom`, `dateOfBirth`, `isUser`, `picture`, `email`, `password`, `role`) VALUES
(50, 'Carriou', 'Hélène', '2022-08-18', 'yes', 'no-picture.png', 'hcarriou@gmail.com', '$2y$10$YHZX6QD8jHG0QfUCTAzZEe82qRaD0mQRl9BYveikUAjBm/tcSyraC', 0),
(51, 'De la Tour', 'Hubert', '2022-08-18', 'yes', 'no-picture.png', 'hubert@tour.net', '$2y$10$vlAce.EPIFs1H20epIwLA.6dFe65NVrRIBYVSZXlCRhj65/Taua3K', 0),
(52, 'Hamon', 'Séverine', '2022-08-18', 'yes', 'no-picture.png', 'severine@test.com', '$2y$10$8JLM5kKoDyjgnG0L0C0Z/.IvOqhS1epeQyLStWGIJGemUPbA1189m', 0),
(53, 'Lesage', 'Marie', '1965-01-12', 'yes', 'amy-shamblen-651683-unsplash.jpg', 'marie@test.com', '$2y$10$i0xb1YdpSSaA4Kir6/RyY.yKIWv1ayHI86CfvuB12g8Qgeers8A6e', 0),
(61, 'Dupont', 'Jean', '9564-05-08', 'yes', 'image.png', 'jean@test.com', '$2y$10$4Wh9MT8E4PYetQ8nX48viO7/maj/gmCzGd7arqGPqDbEnWDQX0LZG', 0),
(63, 'Mathieu', 'Mireille', '1875-06-05', 'yes', 'picture_Mireille.png', 'mireille@test.com', '$2y$10$t4E8H2IEG.VElTXShxvnx.BmgchV6BtI9ZWB5djf8mw36iJyv.z3W', 0),
(64, 'Dumas', 'Alexandre', '1742-12-05', 'yes', 'picture_Alexandre.png', 'alex@test.com', '$2y$10$TZ83n7ZmGFrme3C8acXhCejYamq9o/lRsQXoQI3P859GjhvwYBKbu', 0),
(67, 'Carriou', 'Pierre-Louis', '1901-09-21', 'no', '67.jpg', '', '', 0),
(68, 'Le Moing', 'Irma', '1905-11-27', 'no', '68.jpg', '', '', 0),
(69, 'Le Quintrec', 'Pierre', '1901-12-15', 'no', '69.jpg', '', '', 0),
(70, 'Roperch', 'Francine', '1902-10-07', 'no', '70.jpg', '', '', 0),
(71, 'Le Ny', 'Julien', '1906-06-06', 'no', '71.jpg', '', '', 0),
(72, 'Le Houarner', 'Marie-Barbe', '1906-06-24', 'no', '72.jpg', '', '', 0),
(73, 'Le Chenadec', 'Joseph', '1906-11-21', 'no', '73.jpg', '', '', 0),
(74, 'Jego', 'Marie-Françoise', '1913-01-02', 'no', '74.jpg', '', '', 0),
(79, 'nanti', 'yves', NULL, 'no', 'no-picture.png', '', '', 0),
(80, 'Round', 'Christelle', NULL, 'no', 'no-picture.png', '', '', 0),
(81, 'Carriou', 'Viviane', NULL, 'no', 'no-picture.png', '', '', 0),
(84, 'unique', 'test', NULL, 'no', 'no-picture.png', '', '', 0),
(85, 'User', 'New', NULL, 'no', 'no-picture.png', '', '', 0),
(86, 'Bens', 'Oncle', NULL, 'no', 'no-picture.png', '', '', 0),
(87, 'St Exupéry', 'Antoine', NULL, 'no', 'no-picture.png', '', '', 0),
(88, 'Blue', 'Eva', NULL, 'no', 'no-picture.png', '', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `people_branches`
--

CREATE TABLE `people_branches` (
  `people_id` int(11) NOT NULL,
  `branche_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `people_branches`
--

INSERT INTO `people_branches` (`people_id`, `branche_id`) VALUES
(50, 4),
(50, 8),
(51, 1),
(51, 7),
(51, 8),
(52, 1),
(52, 3),
(53, 1),
(53, 3),
(61, 4),
(63, 5),
(64, 8),
(67, 1),
(68, 2),
(69, 3),
(70, 4),
(71, 5),
(72, 6),
(73, 7),
(74, 8);

-- --------------------------------------------------------

--
-- Structure de la table `pictures`
--

CREATE TABLE `pictures` (
  `picture_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `owner_id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `dayPicture` varchar(2) NOT NULL,
  `monthPicture` varchar(60) NOT NULL,
  `yearPicture` varchar(4) NOT NULL,
  `locationPicture` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `brancheDefined` varchar(10) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pictures`
--

INSERT INTO `pictures` (`picture_id`, `created_at`, `owner_id`, `filename`, `dayPicture`, `monthPicture`, `yearPicture`, `locationPicture`, `description`, `brancheDefined`) VALUES
(3, '2022-08-07 10:30:02', 50, 'test', '', '', '', 'ici', '', 'no'),
(28, '2022-08-08 15:34:49', 50, 'picture_28.png', '', '', '', '', '', 'no'),
(29, '2022-08-08 16:26:50', 50, 'picture_29.png', '', '', '', '', '', 'yes'),
(33, '2022-08-08 17:51:20', 51, 'picture_33.jpg', '', '', '', '', '', 'yes'),
(37, '2022-08-08 17:00:54', 51, 'picture_37.png', '', '', '', '', '', 'yes'),
(38, '2022-08-08 17:01:35', 51, 'picture_38.png', '', '', '', '', '', 'yes'),
(39, '2022-08-08 17:01:49', 51, 'picture_39.png', '', '', '', '', '', 'yes'),
(41, '2022-08-08 18:06:33', 51, 'picture_41.jpg', '', '', '', '', '', 'yes'),
(42, '2022-08-11 11:13:06', 51, 'picture_42.jpg', '', '', '', '', '', 'yes'),
(43, '2022-08-11 11:22:45', 52, 'picture_43.jpg', '6', 'avril', '1821', 'Vannes', 'Cras ultricies ligula sed magna dictum porta. Curabitur aliquet quam id dui posuere blandit. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Proin eget tortor risus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. \r\nDonec rutrum congue leo eget malesuada. Nulla quis lorem ut libero malesuada feugiat.', 'yes'),
(44, '2022-08-31 17:12:57', 52, 'picture_4.1', '', '', '', '', '', 'yes'),
(45, '2022-08-31 17:13:51', 52, 'picture_4.1', '13', 'june', '1865', 'Lorient', 'zgrjp vfhd uifhpuish vnuiodzhpsnicup \r\n\r\nzeviosdhpxfvw r\r\nazqfevusodihpj', 'yes'),
(50, '2022-09-10 15:22:34', 52, 'picture_5.t', '', '', '', '', '', 'yes');

-- --------------------------------------------------------

--
-- Structure de la table `pictures_branches`
--

CREATE TABLE `pictures_branches` (
  `picture_id` int(11) NOT NULL,
  `branche_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pictures_branches`
--

INSERT INTO `pictures_branches` (`picture_id`, `branche_id`) VALUES
(33, 1),
(37, 1),
(37, 7),
(37, 8),
(38, 7),
(38, 8),
(39, 8),
(41, 1),
(42, 8),
(43, 3),
(44, 1),
(45, 1),
(50, 1),
(50, 3);

-- --------------------------------------------------------

--
-- Structure de la table `pictures_people`
--

CREATE TABLE `pictures_people` (
  `pictures_people_id` int(11) NOT NULL,
  `picture_id` int(11) NOT NULL,
  `people_id` int(11) NOT NULL,
  `coordonates` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pictures_people`
--

INSERT INTO `pictures_people` (`pictures_people_id`, `picture_id`, `people_id`, `coordonates`) VALUES
(1, 43, 52, ''),
(2, 43, 63, ''),
(3, 43, 70, ''),
(4, 41, 51, ''),
(5, 41, 52, ''),
(6, 41, 67, ''),
(7, 41, 70, ''),
(9, 41, 79, ''),
(10, 41, 80, ''),
(11, 41, 61, ''),
(17, 41, 84, ''),
(18, 41, 85, ''),
(19, 41, 71, ''),
(20, 41, 81, ''),
(21, 41, 50, ''),
(22, 41, 86, ''),
(25, 50, 88, ''),
(26, 50, 81, ''),
(27, 50, 51, '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branche_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `fk_picture_id` (`picture_id`),
  ADD KEY `fk_people_id_comment` (`people_id`);

--
-- Index pour la table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`people_id`);

--
-- Index pour la table `people_branches`
--
ALTER TABLE `people_branches`
  ADD PRIMARY KEY (`people_id`,`branche_id`),
  ADD KEY `people_branches_ibfk_2` (`branche_id`);

--
-- Index pour la table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`picture_id`),
  ADD KEY `fk_user_id` (`owner_id`);

--
-- Index pour la table `pictures_branches`
--
ALTER TABLE `pictures_branches`
  ADD PRIMARY KEY (`picture_id`,`branche_id`),
  ADD KEY `branche_id` (`branche_id`);

--
-- Index pour la table `pictures_people`
--
ALTER TABLE `pictures_people`
  ADD PRIMARY KEY (`pictures_people_id`),
  ADD KEY `fk_people_id` (`people_id`),
  ADD KEY `fk_tags_picture_id` (`picture_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `branches`
--
ALTER TABLE `branches`
  MODIFY `branche_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `people`
--
ALTER TABLE `people`
  MODIFY `people_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT pour la table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `pictures_people`
--
ALTER TABLE `pictures_people`
  MODIFY `pictures_people_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_people_id_comment` FOREIGN KEY (`people_id`) REFERENCES `people` (`people_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_picture_id` FOREIGN KEY (`picture_id`) REFERENCES `pictures` (`picture_id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `people_branches`
--
ALTER TABLE `people_branches`
  ADD CONSTRAINT `people_branches_ibfk_1` FOREIGN KEY (`people_id`) REFERENCES `people` (`people_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `people_branches_ibfk_2` FOREIGN KEY (`branche_id`) REFERENCES `branches` (`branche_id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`owner_id`) REFERENCES `people` (`people_id`);

--
-- Contraintes pour la table `pictures_branches`
--
ALTER TABLE `pictures_branches`
  ADD CONSTRAINT `pictures_branches_ibfk_1` FOREIGN KEY (`picture_id`) REFERENCES `pictures` (`picture_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pictures_branches_ibfk_2` FOREIGN KEY (`branche_id`) REFERENCES `branches` (`branche_id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `pictures_people`
--
ALTER TABLE `pictures_people`
  ADD CONSTRAINT `fk_people_id` FOREIGN KEY (`people_id`) REFERENCES `people` (`people_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tags_picture_id` FOREIGN KEY (`picture_id`) REFERENCES `pictures` (`picture_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
