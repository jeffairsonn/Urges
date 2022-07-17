-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 17 Juillet 2022 à 15:06
-- Version du serveur :  5.7.11
-- Version de PHP :  7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `urges`
--

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `id_classe` int(11) NOT NULL,
  `nom_classe` varchar(60) NOT NULL,
  `annee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `classe`
--

INSERT INTO `classe` (`id_classe`, `nom_classe`, `annee`) VALUES
(1, 'Architecture des Logiciels', 3),
(2, 'Ingenierie du Web', 3),
(777, 'Classe Administratif', 6),
(888, 'Classe Intervenants', 6),
(999, 'Classe de test', 6),
(1000, 'Sécurité informatique', 3);

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id_cours` int(11) NOT NULL,
  `nom_cours` varchar(80) NOT NULL,
  `id_intervenant` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cours`
--

INSERT INTO `cours` (`id_cours`, `nom_cours`, `id_intervenant`, `id_classe`) VALUES
(1, 'Base de données & MERISE', 7, 1);

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE `evenements` (
  `id_event` int(11) NOT NULL,
  `texte_event` varchar(500) NOT NULL,
  `resume_event` varchar(100) NOT NULL,
  `date_event` varchar(12) NOT NULL,
  `archive` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `evenements`
--

INSERT INTO `evenements` (`id_event`, `texte_event`, `resume_event`, `date_event`, `archive`) VALUES
(1, 'Rendez-vous au rez-de-chaussée pour une petite collation entre membres de l\'ESGI', 'Pot de bienvenue', '06-09-2021', '1'),
(2, 'Concert de solidarité pour les étudiants en informatique ', 'Concert de solidarité', '02-11-2021', '0'),
(5, 'Hackaton test', 'Hackaton ESGI', '23-02-2022', '0');

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id_note` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `note` double NOT NULL,
  `date_note` varchar(12) DEFAULT NULL,
  `id_cours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

CREATE TABLE `offres` (
  `id_offre` int(11) NOT NULL,
  `lieu_offre` varchar(60) NOT NULL,
  `texte_offre` varchar(500) NOT NULL,
  `resume_offre` varchar(100) NOT NULL,
  `date_offre` varchar(12) NOT NULL,
  `duree_offre` varchar(12) NOT NULL,
  `archive` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `offres`
--

INSERT INTO `offres` (`id_offre`, `lieu_offre`, `texte_offre`, `resume_offre`, `date_offre`, `duree_offre`, `archive`) VALUES
(1, 'Lille (59)', 'Recherche un alternant pour un contrat de 12 mois', 'Développement PHP - AXIA', '12-05-2022', '12 mois', '0'),
(3, 'Douai (59)', 'Mise en place de serveur Azure', 'Mise en place de serveur - Admin système', '15-07-2022', '24 mois', '0');

-- --------------------------------------------------------

--
-- Structure de la table `planning`
--

CREATE TABLE `planning` (
  `id_planning` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `id_intervenant` int(11) NOT NULL,
  `nom_cours` varchar(60) NOT NULL,
  `creneau` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nom_profil` varchar(70) NOT NULL,
  `prenom_profil` varchar(70) NOT NULL,
  `adresse_profil` varchar(230) NOT NULL,
  `ville_profil` varchar(60) NOT NULL,
  `CP` varchar(5) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `id_classe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `profil`
--

INSERT INTO `profil` (`id_profil`, `id_user`, `nom_profil`, `prenom_profil`, `adresse_profil`, `ville_profil`, `CP`, `telephone`, `id_classe`) VALUES
(1, 6, 'Test', 'Eleve', '32 rue des tests', 'TestLand4', '59350', '0656893987', 999),
(2, 98, 'test', 'test', 'test', 'test', '59000', '0645131', 2),
(3, 7, 'Klomski', 'Louis', '45 rue du dev', 'Lille', '59000', '0645789621', 1),
(4, 8, 'Dupont', 'Jean', '2 rue des potiers', 'Lambersart', '59130', '0358964121', 1),
(5, 4, 'Administratif', 'Test', '3 rue de l\'administration', 'Lille', '59000', '0645122154', 777),
(6, 3, 'ValJean', 'Jean', '3 rue des révolutions', 'Douai', '59500', '0327845132', 888),
(7, 9, 'De données', 'Base', '1 rue des profs', 'Lille', '59000', '0682719346', 888);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `login` varchar(60) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `mail` varchar(80) NOT NULL,
  `d1` int(11) NOT NULL,
  `d2` int(11) NOT NULL,
  `d3` int(11) NOT NULL,
  `d4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `login`, `pass`, `mail`, `d1`, `d2`, `d3`, `d4`) VALUES
(1, 'root', '63a9f0ea7bb98050796b649e85481845', 'root@urges.fr', 0, 0, 0, 1),
(3, 'intervtest', '223d2be38488f24611ace4cabedb59e6', 'intervtest@urges.fr', 0, 1, 0, 0),
(4, 'adminitest', 'b650d5c24988830b1cff0cd685371077', 'aministratiftest@urges.fr', 0, 0, 1, 0),
(6, 'elevetest', '8066e519563be9370591f5a442d2c0c0', 'elevetest@gmail.com', 1, 0, 0, 0),
(7, 'klomski', '9527faf665e0bc950f6450d76ca70f64', 'klomski.gmail.com', 1, 0, 0, 0),
(8, 'Eleve1', 'a3e3a3c24335ca042812b8bab9ea61d7', 'eleve1@gmail.com', 1, 0, 0, 0),
(9, 'bdd', '61de962f19b684dc9ce24c0fdcdbd0de', 'coursbdd@gmail.com', 0, 1, 0, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id_classe`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id_cours`);

--
-- Index pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD PRIMARY KEY (`id_event`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id_note`);

--
-- Index pour la table `offres`
--
ALTER TABLE `offres`
  ADD PRIMARY KEY (`id_offre`);

--
-- Index pour la table `planning`
--
ALTER TABLE `planning`
  ADD PRIMARY KEY (`id_planning`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `id_classe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;
--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id_cours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `evenements`
--
ALTER TABLE `evenements`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id_note` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `offres`
--
ALTER TABLE `offres`
  MODIFY `id_offre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `planning`
--
ALTER TABLE `planning`
  MODIFY `id_planning` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
