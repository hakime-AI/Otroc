-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 21 fév. 2022 à 10:15
-- Version du serveur : 5.7.33
-- Version de PHP : 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet4`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `description` text,
  `prix` varchar(50) DEFAULT NULL,
  `id_email` varchar(50) DEFAULT NULL,
  `identifiant` varchar(255) DEFAULT NULL,
  `validite` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`id`, `nom`, `description`, `prix`, `id_email`, `identifiant`, `validite`) VALUES
(1, 'Villa en bord de lac', 'Villa proche des commodités (écoles et commerces), dans un lotissement calme.\r\nVisitez une belle villa familliale avec 4 chambres et un bel espace piscine.', '550000', NULL, NULL, NULL),
(2, 'Maison en bord de lac', 'Dans un parc arboré de 2240 m2, cette maison offre de beaux volumes avec 42 m2 de séjour avec insert, une cuisine spacieuse donnant sur une véranda, 3 chambres, une salle d\'eau, un espace bureau . Elle dispose également de nombreuses dépendances idéal pour un artisan, du stockage ou du stationnement .', '270000', NULL, NULL, NULL),
(3, 'Mercedes 2004', 'Mercedes 220 dci  2004 128000 km boîte automatique, diesel, siege en cuir chauffant, detecteur av et ar, camera de recul .', '10000', NULL, NULL, NULL),
(4, 'Sac à main', 'Vends sac cuir neuf avec la pochette jamais utiliser. Paiement et remise en main propre', '500', NULL, NULL, NULL),
(5, 'Téléphone Samsung Galaxy A20e', 'Vends Samsung Galaxy A20e blanc.\r\nCapacité : 32 Go - Écran : 5.8 pouces.\r\nNeuf, jamais utilisé.\r\nPaiement en espèces ou par Paypal uniquement.', '100', NULL, NULL, NULL),
(6, 'Guide Final Fantasy 8', 'Final Fantasy le guide officiel « authorised collection »  pour PS2 très bon état\r\nA retirer sur place, pas de livraison,\r\npaiement uniquement en espèces.', '50', NULL, NULL, NULL),
(7, 'Guide Zelda - Breath of the Wild', 'The Legend of Zelda - Breath of the Wild le guide officiel complet + poster carte pour Switch.\r\nPaiement en espèce et à retirer sur place.', '30', NULL, NULL, NULL),
(8, 'VTT', 'Je vends mon VTT Shimano rouge, très bon état avec 2 garde-boue.', '65', NULL, NULL, NULL),
(9, 'Trottinette', 'Vends trottinette blanche, excellent état (peu servi).\r\n', '10', NULL, NULL, NULL),
(10, 'Moto Honda CB 125 R', 'Moto Honda CB 125 R Neo Sports Café Naked Roadster en excellent état. Kilométrage : 5081 km.', '3999', NULL, NULL, NULL),
(11, 'Siège bébé', 'Siège bébé comme neuf servi 4fois devient trop petit. \r\nIl est dans son emballage d\'origine je l\'ai acheté 69€90 et je le revendre 40€', '40', NULL, NULL, NULL),
(12, 'Transat bébé', 'Transat Rocker-Napper 3 en 1 convertible\r\nen couffin puis siège évolutif.\r\nTransformation en balancelle ou couffin d’un seul clic.\r\nMobile réglable en 3 positions.\r\nPoids: 4,73 kg / Dimensions: 75 / 45,7 / 77\r\n', '50', NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
