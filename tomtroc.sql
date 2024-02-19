-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 19 fév. 2024 à 14:41
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tomtroc`
--

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `picture` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `title` varchar(128) NOT NULL,
  `autor` varchar(128) NOT NULL,
  `comment` text NOT NULL,
  `disponibility` varchar(16) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`id`, `id_user`, `picture`, `title`, `autor`, `comment`, `disponibility`) VALUES
(25, 8, 'src/images/bookCover/frosty-ilze-tfYL1j1jKNo-unsplash1.png', 'The Kinkfolk Table', 'Nathan Williams', 'J&#039;ai récemment plongé dans les pages de &#039;The Kinfolk Table&#039; et j&#039;ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d&#039;une simple collection de recettes ; il célèbre l&#039;art de partager des moments authentiques autour de la table. \r\n\r\nLes photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité. \r\n\r\nChaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers. \r\n\r\n&#039;The Kinfolk Table&#039; incarne parfaitement l&#039;esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.', 'disponible'),
(26, 8, 'src/images/bookCover/frosty-ilze-tfYL1j1jKNo-unsplash1.png', 'The Kinkfolk Table', 'Nathan Williams', 'J&#039;ai récemment plongé dans les pages de &#039;The Kinfolk Table&#039; et j&#039;ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d&#039;une simple collection de recettes ; il célèbre l&#039;art de partager des moments authentiques autour de la table. \r\n\r\nLes photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité. \r\n\r\nChaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers. \r\n\r\n&#039;The Kinfolk Table&#039; incarne parfaitement l&#039;esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.', 'disponible'),
(27, 8, 'src/images/bookCover/frosty-ilze-tfYL1j1jKNo-unsplash1.png', 'The Kinkfolk Table', 'Nathan Williams', 'J&#039;ai récemment plongé dans les pages de &#039;The Kinfolk Table&#039; et j&#039;ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d&#039;une simple collection de recettes ; il célèbre l&#039;art de partager des moments authentiques autour de la table. \r\n\r\nLes photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité. \r\n\r\nChaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers. \r\n\r\n&#039;The Kinfolk Table&#039; incarne parfaitement l&#039;esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.', 'non dispo.'),
(28, 8, 'src/images/bookCover/frosty-ilze-tfYL1j1jKNo-unsplash1.png', 'The Kinkfolk Table', 'Nathan Williams', 'J&#039;ai récemment plongé dans les pages de &#039;The Kinfolk Table&#039; et j&#039;ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d&#039;une simple collection de recettes ; il célèbre l&#039;art de partager des moments authentiques autour de la table. \r\n\r\nLes photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité. \r\n\r\nChaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers. \r\n\r\n&#039;The Kinfolk Table&#039; incarne parfaitement l&#039;esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.', 'disponible');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `id_autor` int NOT NULL,
  `id_recipient` int NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_autor/id_user` (`id_autor`),
  KEY `id_recipient/id_user` (`id_recipient`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `content`, `id_autor`, `id_recipient`, `date`) VALUES
(32, 'Bonjour Admin n°1.', 9, 8, '2024-02-19 14:30:08'),
(33, 'Bonjour Admin n°2, tu vas bien ? ', 8, 9, '2024-02-19 14:30:37'),
(34, 'Très bien, et toi ? ', 9, 8, '2024-02-19 14:31:15'),
(35, 'Moi aussi je vais très bien !', 8, 9, '2024-02-19 14:31:47');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `profilePicture` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `profilePicture`) VALUES
(8, 'Admin', '$2y$10$M.sN2HTn0RruTq/4fPbDfunDfK/bafX1ST7wFZfd/9wks3xxvEpjS', 'Admin@gmail.com', 'src/images/profilePicture/Mask_group.png'),
(9, 'Admin2', '$2y$10$Xy5kzpN//kBMWMkbRJjjiula1i1ua09c9/e273xDs2TbLZ9g8/xqi', 'Admin2@gmail.com', 'src/images/profilePicture/ALICE.png');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
