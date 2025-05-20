-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : mar. 20 mai 2025 à 22:35
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fitness_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `affectation_coach`
--

CREATE TABLE `affectation_coach` (
  `id_affectation` int(11) NOT NULL,
  `id_coach` int(11) NOT NULL,
  `semaine` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `affectation_coach`
--

INSERT INTO `affectation_coach` (`id_affectation`, `id_coach`, `semaine`) VALUES
(5, 2, '2025-05-20'),
(6, 4, '2025-05-20'),
(7, 2, '2025-06-03');

-- --------------------------------------------------------

--
-- Structure de la table `discipline`
--

CREATE TABLE `discipline` (
  `id_discipline` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `discipline`
--

INSERT INTO `discipline` (`id_discipline`, `nom`, `description`, `photo`) VALUES
(1, 'Musculation', 'Développez votre force et sculptez votre corps avec des équipements professionnels.', ''),
(2, 'Cardio', 'Améliorez votre endurance et votre santé avec nos séances de cardio variées.', ''),
(3, 'Zumba', 'Bougez au rythme de la musique et brûlez des calories tout en vous amusant.', ''),
(4, 'Yoga', 'Apaisez votre esprit, travaillez votre souplesse et réduisez le stress.', ''),
(5, 'CrossFit', 'Repoussez vos limites avec des entraînements intenses et variés pour une forme optimale.', ''),
(6, 'Pilates', 'Renforcez vos muscles profonds, améliorez votre posture et gagnez en souplesse en douceur.', ''),
(7, 'Boxe', '', ''),
(8, 'Cycling', '', ''),
(9, 'Danse fitness', '', ''),
(10, 'HIIT', '', ''),
(11, 'Meditation', 'maitrrise ton esprit et devient libre.', ''),
(12, 'Pushup', 'Construit toi avec ton unique \"ce que tu pèse dans l\'espace\" pour ne plus être étranger dans ton propre corps.', ''),
(13, 'Spirituality', 'Être libre d\'esprit.', 'discipline_682cafa96e455.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `equipement`
--

CREATE TABLE `equipement` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `quantite` int(11) NOT NULL,
  `etat` enum('Bon','En réparation','Usé') NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `equipement`
--

INSERT INTO `equipement` (`id`, `nom`, `quantite`, `etat`, `photo`) VALUES
(11, 'Espace de Body Building', 2, '', '../assets/Images/Bar room.jpg'),
(14, 'Alter', 410, '', '../assets/Images/Alter.jpg'),
(15, 'Cross Barre', 36, 'Bon', '../assets/Images/acceuil.jpg'),
(16, 'Abdo Zone A', 1, 'Bon', '../assets/Images/abdoespace.jpg'),
(17, 'Boxe Zone', 1, 'En réparation', '../assets/Images/Boxe.jpg'),
(18, 'Cross Barre DN4', 5, 'Bon', '../assets/Images/cross-bar.jpg'),
(19, 'Dorsal man 1', 3, 'Bon', '../assets/Images/dispodos.jpg'),
(20, 'Pedalo Cardio & Tapi Roulant', 11, 'Bon', '../assets/Images/fitness7.jpg'),
(21, 'Cuisse man', 7, 'Usé', '../assets/Images/cuisse.jpg'),
(22, 'Cuisse man', 15, 'Bon', '../assets/Images/cuisse.jpg'),
(23, 'Velo Cardio gns2', 2, 'Usé', '../assets/Images/padalo.jpg'),
(24, 'Velo Cardio gns2', 12, 'En réparation', '../assets/Images/padalo.jpg'),
(25, 'Punch bag USA5', 9, 'Bon', '../assets/Images/sacbox.jpg'),
(26, 'Salle Cycliste 2', 3, 'Bon', '../assets/Images/velomis.jpg'),
(27, 'Salle Yoga', 5, 'Bon', '../assets/Images/yoga.jpg'),
(28, 'Roue002', 475, 'Bon', '../assets/Images/roueAbdo.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom_complet` varchar(100) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `date_inscription` date NOT NULL,
  `type_abonnement` varchar(100) NOT NULL,
  `mot_de_passe` varchar(150) NOT NULL,
  `specialite` varchar(150) NOT NULL,
  `experience_pro` text NOT NULL,
  `photo` varchar(150) DEFAULT NULL,
  `role` enum('client','coach') NOT NULL,
  `id_discipline` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom_complet`, `pseudo`, `date_inscription`, `type_abonnement`, `mot_de_passe`, `specialite`, `experience_pro`, `photo`, `role`, `id_discipline`) VALUES
(2, 'Paul las', 'LTK', '2025-05-05', '1 mois', 'user-1', '', '', NULL, 'client', 1),
(3, 'Olivier Kriosey', 'Lynx', '2022-05-02', '10 ans', 'user-2', 'Expert en musculation', 'Le préparateur physique des éperviers du Togo.', NULL, 'coach', 7),
(4, 'Francine De paris', 'Financrrr', '2024-05-05', '1 ans', 'user-3', '', '', NULL, 'client', 8),
(5, 'Eric Bel', 'BelDV', '2019-05-19', 'Illimité', 'user-4', 'Cycliste professionnel', 'Champion en 2019 de la tour de france.', NULL, 'coach', 8),
(9, 'Audrey Fanil', 'Olivx0', '2025-05-20', '2 ans', '$2y$10$e9/IF6QqpmYGljfpL1ZOY.jb.hDv5dDl03F6LpY/wUlrUvmxPC8ZC', 'Yoga', 'Vice présidente de l\'AYT-Togo. ', 'user_1551af7c3aabee5b.jpg', 'coach', 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `affectation_coach`
--
ALTER TABLE `affectation_coach`
  ADD PRIMARY KEY (`id_affectation`),
  ADD KEY `id_coach` (`id_coach`);

--
-- Index pour la table `discipline`
--
ALTER TABLE `discipline`
  ADD PRIMARY KEY (`id_discipline`);

--
-- Index pour la table `equipement`
--
ALTER TABLE `equipement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD UNIQUE KEY `pseudo` (`pseudo`),
  ADD KEY `id_discipline` (`id_discipline`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `affectation_coach`
--
ALTER TABLE `affectation_coach`
  MODIFY `id_affectation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `discipline`
--
ALTER TABLE `discipline`
  MODIFY `id_discipline` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `equipement`
--
ALTER TABLE `equipement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `affectation_coach`
--
ALTER TABLE `affectation_coach`
  ADD CONSTRAINT `affectation_coach_ibfk_1` FOREIGN KEY (`id_coach`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`id_discipline`) REFERENCES `discipline` (`id_discipline`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
