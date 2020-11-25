-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 25 nov. 2020 à 01:17
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `flights`
--

-- --------------------------------------------------------

--
-- Structure de la table `airlines`
--

CREATE TABLE `airlines` (
  `id` int(11) NOT NULL COMMENT 'ID obce',
  `region_id` int(11) NOT NULL COMMENT 'region',
  `country_id` int(11) NOT NULL COMMENT 'country',
  `code` varchar(11) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL COMMENT 'Kód obce',
  `name` varchar(80) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL COMMENT 'Název obce'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci COMMENT='airline';

--
-- Déchargement des données de la table `airlines`
--

INSERT INTO `airlines` (`id`, `region_id`, `country_id`, `code`, `name`) VALUES
(1, 1, 1, '010301', 'Air Canada'),
(2, 2, 2, '031020', 'Cargojet'),
(3, 3, 3, '060424', 'Fedex'),
(4, 4, 4, '211619', 'UPS'),
(5, 5, 5, '211916', 'USPS'),
(6, 6, 6, '012018', 'Air Transat'),
(7, 7, 7, '041220', 'Delta Airlines'),
(8, 5, 8, '011301', 'American Airlines'),
(9, 3, 9, '549258', 'Cargolux'),
(10, 2, 2, '191223', 'Silkway Airlines');

-- --------------------------------------------------------

--
-- Structure de la table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `booking` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `bookings`
--

INSERT INTO `bookings` (`id`, `flight_id`, `name`, `booking`, `created`, `modified`) VALUES
(9, 16, 'Pass01', '427 Passagers', '2020-11-24 00:00:00', '2020-11-24 00:00:00'),
(11, 17, 'cargo01', '26 245lbs cargo Bestbuy', '2020-11-24 00:00:00', '2020-11-24 00:00:00'),
(12, 17, 'cargo02', '95 158lbs cargo MedicAir', '2020-11-24 00:00:00', '2020-11-24 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL COMMENT 'ID countryu',
  `region_id` int(11) NOT NULL COMMENT 'region',
  `code` varchar(9) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL COMMENT 'Kód countryu',
  `name` varchar(80) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL COMMENT 'Název countryu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci COMMENT='country';

--
-- Déchargement des données de la table `countries`
--

INSERT INTO `countries` (`id`, `region_id`, `code`, `name`) VALUES
(1, 5, 'C', 'Canada'),
(2, 5, 'N', 'Étas-Unis'),
(3, 2, 'F', 'France'),
(4, 6, 'XA', 'Mexique'),
(5, 6, 'YV', 'Vénézuela'),
(6, 4, 'VH', 'Australie'),
(7, 3, 'B', 'Chine'),
(8, 2, 'RA', 'Russie'),
(9, 2, 'EC', 'Espagne'),
(10, 2, 'G', 'Angleterre'),
(11, 2, 'OO', 'Belgique'),
(12, 6, 'CU', 'Cuba');

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Active, 0 = Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `files`
--

INSERT INTO `files` (`id`, `name`, `path`, `created`, `modified`, `status`) VALUES
(1, 'boeing757.jpg', 'files/add/', '2020-09-27 00:00:00', '2020-09-27 00:00:00', 1),
(2, 'boeing767.jpg', 'files/add/', '2020-09-28 01:50:46', '2020-09-28 01:50:46', 1),
(3, 'boeing747.jpg', 'files/add/', '2020-09-28 03:05:33', '2020-09-28 03:05:33', 1),
(4, 'airbusA320.jpg', 'files/add/', '2020-09-28 03:05:33', '2020-09-28 03:05:33', 1),
(5, 'airbusA340.jpg', 'files/add/', '2020-09-28 03:05:33', '2020-09-28 03:05:33', 1),
(6, 'airbusA380.jpg', 'files/add/', '2020-09-28 03:05:33', '2020-09-28 03:05:33', 1);

-- --------------------------------------------------------

--
-- Structure de la table `flights`
--

CREATE TABLE `flights` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `airline_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `body` text,
  `published` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `flights`
--

INSERT INTO `flights` (`id`, `user_id`, `airline_id`, `title`, `slug`, `body`, `published`, `created`, `modified`) VALUES
(16, 2, 1, 'Montreal-Paris', 'Montreal-Paris', 'sans escale', 1, '2020-11-24 22:03:59', '2020-11-24 22:03:59'),
(17, 2, 2, 'Calgary-Vancouver', 'Calgary-Vancouver', 'Escale à Edmonton', 1, '2020-11-24 22:06:11', '2020-11-24 22:06:11');

-- --------------------------------------------------------

--
-- Structure de la table `flights_files`
--

CREATE TABLE `flights_files` (
  `id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `flights_files`
--

INSERT INTO `flights_files` (`id`, `flight_id`, `file_id`) VALUES
(7, 16, 3),
(8, 17, 2);

-- --------------------------------------------------------

--
-- Structure de la table `flights_tags`
--

CREATE TABLE `flights_tags` (
  `flight_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `flights_tags`
--

INSERT INTO `flights_tags` (`flight_id`, `tag_id`) VALUES
(16, 1),
(17, 2);

-- --------------------------------------------------------

--
-- Structure de la table `i18n`
--

CREATE TABLE `i18n` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `model` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL COMMENT 'ID region',
  `code` varchar(7) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL COMMENT 'Kód region',
  `name` varchar(80) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL COMMENT 'Název region'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci COMMENT='region';

--
-- Déchargement des données de la table `regions`
--

INSERT INTO `regions` (`id`, `code`, `name`) VALUES
(1, 'AF', 'Afrique'),
(2, 'EU', 'Europe'),
(3, 'AS', 'Asie'),
(4, 'AU', 'Australie'),
(5, 'NA', 'Amérique du nord'),
(6, 'SA', 'Amérique du sud'),
(7, 'AM', 'Amérique');

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tags`
--

INSERT INTO `tags` (`id`, `title`, `created`, `modified`) VALUES
(1, 'Cargo', '2020-09-27 16:37:54', '2020-09-27 16:42:08'),
(2, 'Passager', '2020-09-27 16:38:31', '2020-09-27 16:42:16'),
(3, 'Mixte', '2020-09-27 16:38:48', '2020-09-27 16:42:24');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `uuid`, `confirmed`, `created`, `modified`) VALUES
(1, 'cakephp@example.com', '$2y$10$iBI.6gNPxKfepjyRSDOcweqT6p6Tkf.ZkNsbIKn9AKkQvjWcvu/42', '7ffcb25d-16df-419a-9363-a5d6bdbdb0d0', 0, '2020-08-30 12:25:57', '2020-09-29 16:28:39'),
(2, 'admin@admin.com', '$2y$10$AQvpqlMoXhHtjad/4RsVyOw9Epw7XVmltfCDavvzICJd1AFIeYVda', '207d7070-3653-473a-bbcb-6ba835ce605b', 0, '2020-09-09 22:05:30', '2020-09-29 16:28:45'),
(7, 'apilon@cmontmorency.qc.ca', '$2y$10$JUFdTWjGMWsdDd4fDmSpQOugxMJSumERgCMRChYe.jHiI9rCjd70S', '29a3fc66-4349-423d-b7a2-57324b94e9cb', 1, '2020-09-29 18:25:02', '2020-09-29 18:25:54');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `airlines`
--
ALTER TABLE `airlines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_id` (`region_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Index pour la table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flight_bookings_fk` (`flight_id`);

--
-- Index pour la table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_id` (`region_id`);

--
-- Index pour la table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `user_key` (`user_id`),
  ADD KEY `airline_id` (`airline_id`);

--
-- Index pour la table `flights_files`
--
ALTER TABLE `flights_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flight_id` (`flight_id`),
  ADD KEY `file_id` (`file_id`);

--
-- Index pour la table `flights_tags`
--
ALTER TABLE `flights_tags`
  ADD PRIMARY KEY (`flight_id`,`tag_id`),
  ADD KEY `tag_key` (`tag_id`);

--
-- Index pour la table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`,`foreign_key`,`field`),
  ADD KEY `I18N_FIELD` (`model`,`foreign_key`,`field`);

--
-- Index pour la table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `airlines`
--
ALTER TABLE `airlines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID obce', AUTO_INCREMENT=6253;

--
-- AUTO_INCREMENT pour la table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID countryu', AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT pour la table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `flights`
--
ALTER TABLE `flights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `flights_files`
--
ALTER TABLE `flights_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID region', AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `airlines`
--
ALTER TABLE `airlines`
  ADD CONSTRAINT `airline_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`),
  ADD CONSTRAINT `airline_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Contraintes pour la table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `flight_bookings_fk` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `countries`
--
ALTER TABLE `countries`
  ADD CONSTRAINT `country_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`);

--
-- Contraintes pour la table `flights`
--
ALTER TABLE `flights`
  ADD CONSTRAINT `flights_airline` FOREIGN KEY (`airline_id`) REFERENCES `airlines` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `flights_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `flights_files`
--
ALTER TABLE `flights_files`
  ADD CONSTRAINT `Files_flights` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `flights_files` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `flights_tags`
--
ALTER TABLE `flights_tags`
  ADD CONSTRAINT `flights_tags_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`),
  ADD CONSTRAINT `flights_tags_ibfk_2` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
