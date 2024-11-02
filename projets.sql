-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 29 mai 2024 à 00:28
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
-- Base de données : `projets`
--


-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_commentaire` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_tache` int(11) NOT NULL,
  `id_projet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id_commentaire` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id_commentaire`, `nom`, `email`, `message`) VALUES
(1, 'Ross', 'sukeiroyami7@gmail.com', 'je suis le tout premier commentaire'),
(4, 'gogo ', 'sukeiroyami7@gmail.com', 'je suis un commentaire\r\n'),
(5, 'gogo ', 'sukeiroyami7@gmail.com', 'je suis un commentaire\r\n'),
(6, 'gogo ', 'sukeiroyami7@gmail.com', 'je suis un commentaire\r\n'),
(7, 'gogo ', 'sukeiroyami7@gmail.com', 'je suis un commentaire\r\n'),
(8, 'gogo ', 'sukeiroyami7@gmail.com', 'je suis un commentaire\r\n'),
(9, 'gogo ', 'sukeiroyami7@gmail.com', 'je suis un commentaire\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

CREATE TABLE `document` (
  `id_document` int(11) NOT NULL,
  `titre_document` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `id_equipe` int(11) NOT NULL,
  `responsable` varchar(50) NOT NULL,
  `membre` varchar(50) NOT NULL,
  `intitule` varchar(50) NOT NULL,
  `numero_equipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`id_equipe`, `responsable`, `membre`, `intitule`, `numero_equipe`) VALUES
(1, 'yoyo', 'gogo,soso', 'devops', 2),
(2, 'mr le maire', 'roro,  gogo,  soso,  titi', 'fullstack', 3),
(3, 'zaparo', 'titi, tata, toto, tutu, loulou, doudou, gogo', 'frontend', 4),
(4, 'nouveau responsabke', 'titi, tata, toto, tutu, loulou, doudou, gogo; imik', 'test', 1),
(5, 'test1', 'gogo,soso, tonton', 'frontend test', 6);

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `id_notification` int(11) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `participe`
--

CREATE TABLE `participe` (
  `id_tache` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id_projet` int(11) NOT NULL,
  `nom_projet` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `date_debut` varchar(50) NOT NULL,
  `date_fin` varchar(50) NOT NULL,
  `statut` varchar(50) NOT NULL,
  `budget` int(11) NOT NULL,
  `id_equipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`id_projet`, `nom_projet`, `description`, `date_debut`, `date_fin`, `statut`, `budget`, `id_equipe`) VALUES
(1, 'projet de test', 'description du projet de test', '2024-05-01', '2024-05-31', 'en cours', 10000, 1),
(2, 'projet de test', 'description du projet de test', '2024-05-01', '2024-05-31', 'en cours', 10000, 1),
(5, 'projet x', 'Outil de gestion de cloud', '2024-05-31', '2024-07-06', 'Proposé', 10000, 5),
(6, 'captech', 'application web de gestion de projet collaboratif', '2024-05-20', '2024-05-29', 'en cours', 2000, 7);

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

CREATE TABLE `tache` (
  `id_tache` int(11) NOT NULL,
  `nom_tache` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `statut` varchar(50) NOT NULL,
  `id_projet` int(11) NOT NULL,
  `id_projet_appartient` int(11) NOT NULL,
  `id_notification` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_commentaire` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `email`, `password`, `id_commentaire`) VALUES
(1, 'user1', 'first', 'sukeiroyami7@gmail.com', '$2y$10$ckLoYNNo7.LXvaPASdSP7OYyg5PQUFu04vVJf9GX1XU', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD UNIQUE KEY `commentaire_utilisateur0_AK` (`id_utilisateur`),
  ADD KEY `commentaire_tache1_FK` (`id_tache`),
  ADD KEY `commentaire_projet2_FK` (`id_projet`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id_commentaire`);

--
-- Index pour la table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id_document`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id_equipe`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id_notification`);

--
-- Index pour la table `participe`
--
ALTER TABLE `participe`
  ADD PRIMARY KEY (`id_tache`,`id_utilisateur`),
  ADD KEY `participe_utilisateur1_FK` (`id_utilisateur`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id_projet`);

--
-- Index pour la table `tache`
--
ALTER TABLE `tache`
  ADD PRIMARY KEY (`id_tache`),
  ADD KEY `tache_projet0_FK` (`id_projet_appartient`),
  ADD KEY `tache_notification1_FK` (`id_notification`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `document`
--
ALTER TABLE `document`
  MODIFY `id_document` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `id_equipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `id_notification` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id_projet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `tache`
--
ALTER TABLE `tache`
  MODIFY `id_tache` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_projet2_FK` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`),
  ADD CONSTRAINT `commentaire_tache1_FK` FOREIGN KEY (`id_tache`) REFERENCES `tache` (`id_tache`),
  ADD CONSTRAINT `commentaire_utilisateur0_FK` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `participe`
--
ALTER TABLE `participe`
  ADD CONSTRAINT `participe_tache0_FK` FOREIGN KEY (`id_tache`) REFERENCES `tache` (`id_tache`),
  ADD CONSTRAINT `participe_utilisateur1_FK` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `tache`
--
ALTER TABLE `tache`
  ADD CONSTRAINT `tache_notification1_FK` FOREIGN KEY (`id_notification`) REFERENCES `notification` (`id_notification`),
  ADD CONSTRAINT `tache_projet0_FK` FOREIGN KEY (`id_projet_appartient`) REFERENCES `projet` (`id_projet`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
