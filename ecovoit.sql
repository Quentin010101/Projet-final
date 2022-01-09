-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 09 jan. 2022 à 17:28
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecovoit`
--

-- --------------------------------------------------------

--
-- Structure de la table `journey`
--

DROP TABLE IF EXISTS `journey`;
CREATE TABLE IF NOT EXISTS `journey` (
  `journey_id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `startingPlace` varchar(100) NOT NULL,
  `startingPlaceLatitude` float NOT NULL,
  `startingPlaceLongitude` float NOT NULL,
  `endingPlace` varchar(100) NOT NULL,
  `endingPlaceLatitude` float NOT NULL,
  `endingPlaceLongitude` float NOT NULL,
  `rideDistance` int(10) NOT NULL,
  `rideTime` float NOT NULL,
  `startingTime` time NOT NULL,
  `endingTime` time NOT NULL,
  `dateRide` date NOT NULL,
  `datePost` datetime NOT NULL,
  `nbSeat` int(11) NOT NULL,
  `statusRide` varchar(20) NOT NULL DEFAULT 'in progress',
  PRIMARY KEY (`journey_id`),
  KEY `person_id` (`person_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `journey`
--

INSERT INTO `journey` (`journey_id`, `person_id`, `startingPlace`, `startingPlaceLatitude`, `startingPlaceLongitude`, `endingPlace`, `endingPlaceLatitude`, `endingPlaceLongitude`, `rideDistance`, `rideTime`, `startingTime`, `endingTime`, `dateRide`, `datePost`, `nbSeat`, `statusRide`) VALUES
(9, 33, 'Marseille', 43.282, 5.405, 'Paris', 48.859, 2.347, 778, 8.11725, '15:21:00', '23:28:00', '2022-01-19', '2022-01-06 12:55:38', 2, 'in progress'),
(11, 33, 'Herré', 44.0103, -0.022136, 'Mas-Grenier', 43.8983, 1.19068, 147, 2.01056, '23:01:00', '01:01:00', '2022-01-13', '2022-01-06 16:39:36', 1, 'in progress'),
(12, 33, 'Fuveau', 43.4593, 5.55496, 'Peypin', 43.384, 5.57099, 13, 0.244667, '03:01:00', '03:15:00', '2022-01-31', '2022-01-09 11:28:06', 1, 'in progress'),
(13, 33, 'Marsanne', 44.6362, 4.89338, 'Lyon', 45.758, 4.835, 148, 1.79692, '15:02:00', '16:49:00', '2022-01-05', '2022-01-09 11:56:07', 2, 'in progress'),
(14, 33, 'Marseille', 43.282, 5.405, 'Strasbourg', 48.5798, 7.76145, 800, 8.42181, '12:05:00', '20:30:00', '2022-01-31', '2022-01-09 12:14:36', 2, 'in progress'),
(15, 34, 'Marseille', 43.282, 5.405, 'Paris', 48.859, 2.347, 778, 8.11725, '03:50:00', '11:57:00', '2022-01-19', '2022-01-09 14:34:07', 3, 'in progress'),
(16, 35, 'Marseille', 43.282, 5.405, 'Paris', 48.859, 2.347, 778, 8.07108, '10:24:00', '18:28:00', '2022-01-19', '2022-01-09 14:36:59', 2, 'in progress'),
(17, 35, 'Marseille', 43.282, 5.405, 'Paris', 48.859, 2.347, 778, 8.07108, '15:16:00', '23:20:00', '2022-01-19', '2022-01-09 16:46:50', 2, 'in progress');

-- --------------------------------------------------------

--
-- Structure de la table `person`
--

DROP TABLE IF EXISTS `person`;
CREATE TABLE IF NOT EXISTS `person` (
  `person_id` int(10) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phoneNumber` varchar(10) NOT NULL DEFAULT '0000000000',
  `password` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `user_type` varchar(10) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`person_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `person`
--

INSERT INTO `person` (`person_id`, `pseudo`, `name`, `surname`, `email`, `phoneNumber`, `password`, `date`, `user_type`) VALUES
(31, 'Kant01', 'Quentin', 'c', 'q@h.fr', '0000000000', '$2y$10$2mmNnmWSFX2WJ6xb941MnOFcwbL6d6drcbH1Gyu1ACr8W0rQ/PWPa', '2022-01-02 16:41:09', 'user'),
(32, 'Charlie', 'Charles', 'cc', 'a@a.fr', '0758632115', '$2y$10$3/6piqGQegucNGR/6ArUYOIVVedYYSTKZOr2Po1WR96m1ldOnCyNi', '2022-01-03 11:13:23', 'user'),
(33, 'Kant01', 'Quentin', 'Cozic', 'q@q.fr', '0790101010', '$2y$10$CHm7mXZUE1VRu/bFWWnu5e/sTY4S/ZuEUP8shqV4baqi4AfkQEO5W', '2022-01-05 10:15:32', 'user'),
(34, 'Camille33', 'aezr', 'azer', 'q@a.fr', '0000000000', '$2y$10$4UaqySqFO/qXdjumylfwt.TfrNJHaxc94rhBjavZNSceIFqbF.0kG', '2022-01-09 14:32:37', 'user'),
(35, 'FlorentDu10', 'sfg', 'sdfgs', 'q@b.fr', '0000000000', '$2y$10$H9svHDgxZ4YoZJj6/oPDeehUxswSCXYDcdRfbnxEBZvywAXjBzv.e', '2022-01-09 14:35:39', 'user');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `light` varchar(10) NOT NULL DEFAULT 'bright',
  `music` varchar(20) DEFAULT 'Yeah why not',
  `talk` varchar(20) DEFAULT 'Yeah why not',
  `smoker` varchar(20) DEFAULT 'No smoker!',
  `pet` varchar(20) DEFAULT 'No pet allowed!',
  `avatar` varchar(30) DEFAULT 'avatarDefault.png',
  PRIMARY KEY (`user_id`),
  KEY `person_id` (`person_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `person_id`, `light`, `music`, `talk`, `smoker`, `pet`, `avatar`) VALUES
(5, 31, 'bright', 'time to time', 'time to time', 'not allowed', 'not allowed', 'avatarDefault.png'),
(6, 32, 'bright', 'time to time', 'time to time', 'not allowed', 'not allowed', 'avatarDefault.png'),
(7, 33, 'bright', 'Yeah why not', 'Talking all the way!', 'Smoker allowed', 'No pet allowed!', '61d9c0d0e20a9.jpg'),
(8, 34, 'bright', 'No music!', 'No talking!', 'Smoker allowed', 'No pet allowed!', '61db06b69d945.png'),
(9, 35, 'dark', 'Yeah why not', 'Yeah why not', 'No smoker!', 'No pet allowed!', '61db069f78fac.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
