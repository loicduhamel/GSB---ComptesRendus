-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Mar 01 Mai 2018 à 15:09
-- Version du serveur :  5.6.35
-- Version de PHP :  7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `compte_rendu`
--

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `id` int(11) NOT NULL,
  `Numero` varchar(25) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `departement`
--

INSERT INTO `departement` (`id`, `Numero`, `nom`) VALUES
(59, '59', 'Nord'),
(62, '62', 'Pas-de-Calais');

-- --------------------------------------------------------

--
-- Structure de la table `medicament`
--

CREATE TABLE `medicament` (
  `id` int(11) NOT NULL,
  `depot_legal` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `composition` varchar(255) DEFAULT NULL,
  `effets` varchar(255) DEFAULT NULL,
  `contre_indication` varchar(255) DEFAULT NULL,
  `prix_echantillon` varchar(255) DEFAULT NULL,
  `famille` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `medicament`
--

INSERT INTO `medicament` (`id`, `depot_legal`, `nom`, `composition`, `effets`, `contre_indication`, `prix_echantillon`, `famille`) VALUES
(1, 'Paracétamol ', ' Efferalgan', 'Sorbitol (E420)\r\nTalc (E553b)\r\nMéthacrylate\r\nMagnésium oxyde (E530)\r\nCarmellose sodique', 'traitement symptomatique des douleurs d\'intensité légère à modérée et/ou des états fébriles.', 'Le paracétamol n\'a aucun effet ou un effet négligeable sur l\'aptitude à conduire des véhicules et à utiliser des machines.', '15 €', '	\r\nAntalgiques'),
(2, '	Paracétamol ', 'Doliprane', 'Amidon de riz\r\nGlycérol distéarate\r\nMagnésium stéarate (E572)\r\nEnveloppe de la gélule :\r\nGélatine', 'Traitement symptomatique des douleurs d\'intensité légère à modérée et/ou des états fébriles.', 'Hypersensibilité à la substance active ou à l\'un des excipients mentionnés à la rubrique Composition', '5 €', 'Antalgiques'),
(3, '	Phloroglucinol ', 'Spasfon', 'Lactose\r\nSaccharose\r\nPolyvinyle acétate\r\nAmidon de blé', 'Traitement symptomatique des douleurs liées aux troubles fonctionnels du tube digestif et des voies biliaires.', 'Hypersensibilité à l\'un des composants.\r\n\r\n', '	2,14 €', 'Antispasmodiques'),
(4, '	Diclofénac ', 'Voltarene', 'Glycérides semisynthétiques', 'Elles procèdent de l\'activité anti-inflammatoire du diclofénac, de l\'importance des manifestations d\'intolérance auxquelles le médicament donne lieu et de sa place dans l\'éventail des produits anti-inflammatoires actuellement disponibles.', ' hypersensibilité à la substance active ou à l\'un des excipients, mentionnés à la rubrique Composition. \r\n  insuffisance rénale sévère', '2,36 €', '	\r\nAnti-inflammatoires'),
(5, 'Macrogol 4000 ', 'Forlax', 'Saccharine sodique (E954)\r\nArôme orange-pamplemousse :\r\nOrange\r\nPamplemousse\r\nOrange', 'Traitement symptomatique de la constipation chez l\'adulte et chez l\'enfant à partir de 8 ans.', ' Maladies inflammatoires sévères de l\'intestin (rectocolite hémorragique, maladie de Crohn) ou mégacôlon toxique.', '	2,93 €', 'Gastro-Entéro-Hépatologie'),
(6, 'Diosmine ', 'Daflon', '	\r\nCarboxyméthylamidon\r\nCellulose microcristalline (E460)\r\nGélatine\r\nMagnésium stéarate (E572)\r\nTalc (E553b)', 'Traitement des symptômes en rapport avec l\'insuffisance veinolymphatique (jambes lourdes, douleurs, impatiences du primo-décubitus).', 'Hypersensibilité à la fraction flavonoïque purifiée micronisée ou à l\'un des excipients (voir rubrique Composition).', '7 €', 'Cardiologie et angéiologie'),
(7, '	Desloratadine ', NULL, NULL, 'traitement de  l\'urticaire et de  la rhinite allergique ', 'Hypersensibilité au principe actif ou à l\'un des excipients mentionnés à la rubrique Composition ou à la loratadine.\r\n\r\n', '4,76 €\r\n', '	\r\nAllergologie');

-- --------------------------------------------------------

--
-- Structure de la table `praticien`
--

CREATE TABLE `praticien` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `coefficient` varchar(255) DEFAULT NULL,
  `specialite` varchar(255) DEFAULT NULL,
  `id_Departement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `praticien`
--

INSERT INTO `praticien` (`id`, `nom`, `prenom`, `adresse`, `coefficient`, `specialite`, `id_Departement`) VALUES
(1, 'George', 'Holmes', 'Appartement 543-6466 Proin Chemin', '1', ' Biologiste', NULL),
(2, 'Beck', 'Bernard', 'CP 774, 4369 Nullam Ave', '6', ' Cabinet médical', NULL),
(3, 'basil', 'legros', 'Appartement 233-3064 Sit Rd.', '18', ' Biologiste', NULL),
(4, 'Mcintyre', 'Martena', '8496 Nullam Impasse', '3', ' Psychiatre', NULL),
(5, 'Huff', 'Rhonda', '7867 Nulla. Chemin', '13', ' O.R.L - Otorhinolaryngologiste', NULL),
(6, 'Stevens', 'Garth', 'Appartement 925-8410 In Rue', '5', ' Dentiste', NULL),
(7, 'Howard', 'Mason', '5925 Praesent Rd.', '19', ' Ophtalmologiste', NULL),
(8, 'Nicholson', 'Buckminster', 'Appartement 626-462 Amet Rd.', '16', ' Gynécologue', NULL),
(9, 'Marshall', 'Cade', '793-9818 Auctor Route', '2', ' Biologiste', NULL),
(10, 'Mcintosh', 'Cody', 'CP 636, 7787 In Impasse', '20', ' Chirurgien', NULL),
(11, 'Brennan', 'Ursula', '186 Neque Chemin', '18', ' Orthodontiste', NULL),
(12, 'Noel', 'Malik', '845-8228 Aliquam Avenue', '7', ' Echographiste', NULL),
(13, 'Conley', 'Stone', 'Appartement 416-3327 Mauris, Impasse', '6', ' Psychiatre', NULL),
(14, 'Eaton', 'Wyoming', '7237 Facilisis Route', '16', ' Cabinet médical', NULL),
(15, 'Vazquez', 'Jayme', 'Appartement 499-4670 Nisi Chemin', '19', ' Pédiatre', NULL),
(16, 'Duke', 'Miranda', 'CP 193, 8848 In Av.', '6', ' Anesthésiste', NULL),
(17, 'Boyle', 'Bradley', 'Appartement 261-2499 Luctus Chemin', '17', ' Echographiste', NULL),
(18, 'George', 'Sybil', 'CP 875, 6166 Enim. Av.', '2', ' Pédiatre', NULL),
(19, 'Powell', 'Herman', 'Appartement 454-4975 Fusce Impasse', '20', ' Orthodontiste', NULL),
(20, 'Maddox', 'Alfonso', '5994 Dictum Route', '7', ' Allergologue', NULL),
(21, 'Potter', 'Steel', 'Appartement 423-844 Dignissim Route', '1', ' Nutritionniste', NULL),
(22, 'Henson', 'Natalie', '134-4093 Ut, Avenue', '15', ' Anesthésiste', NULL),
(23, 'Ware', 'Theodore', 'CP 497, 6846 Fusce Impasse', '19', ' Ophtalmologiste', NULL),
(24, 'Klein', 'Gavin', '696-1983 Amet Rue', '6', ' Pédiatre', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `rapport_visit`
--

CREATE TABLE `rapport_visit` (
  `id` int(11) NOT NULL,
  `date_visite` date DEFAULT NULL,
  `practicien` varchar(255) DEFAULT NULL,
  `coefficient` varchar(255) DEFAULT NULL,
  `remplacant` tinyint(1) DEFAULT NULL,
  `date_rap` date DEFAULT NULL,
  `motif` varchar(25) DEFAULT NULL,
  `bilan` varchar(1000) DEFAULT NULL,
  `premier_produit_presente` varchar(255) DEFAULT NULL,
  `deuxieme_produit_presente` varchar(255) DEFAULT NULL,
  `documentation_offerte` tinyint(1) DEFAULT NULL,
  `echantillons` varchar(255) DEFAULT NULL,
  `quantite_echantillon` varchar(25) DEFAULT NULL,
  `id_Visiteur` int(11) DEFAULT NULL,
  `id_Praticien` int(11) DEFAULT NULL,
  `id_Medicament` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `rapport_visit`
--

INSERT INTO `rapport_visit` (`id`, `date_visite`, `practicien`, `coefficient`, `remplacant`, `date_rap`, `motif`, `bilan`, `premier_produit_presente`, `deuxieme_produit_presente`, `documentation_offerte`, `echantillons`, `quantite_echantillon`, `id_Visiteur`, `id_Praticien`, `id_Medicament`) VALUES
(1, '2018-04-27', 'Praticien 1', '15', 0, '2018-05-01', 'Sollicitation praticien', 'Test', '', '', 1, 'Produits', '7', 1, NULL, NULL),
(2, '2018-05-01', 'Praticien 1', '12', 1, '2018-05-01', 'Relance', 'Test2', '', '', 0, 'Produits', '2', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

CREATE TABLE `visiteur` (
  `id` int(11) NOT NULL,
  `utilisateur` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `secteur` varchar(255) DEFAULT NULL,
  `id_Departement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `visiteur`
--

INSERT INTO `visiteur` (`id`, `utilisateur`, `password`, `nom`, `prenom`, `adresse`, `mail`, `secteur`, `id_Departement`) VALUES
(1, 'loic.duhamel', 'Duhamel62', 'Duhamel', 'Loïc', '16 rue Wandhofen 62138 Violaines', 'loic.duhamel@hotmail.fr', 'Visiteur', 62),
(2, 'jocelyn.hamel', 'Hamel59', 'Hamel', 'Jocelyn', '7 bis rue de Messe', 'sakkowhml@gmail.com', 'Visiteur', 59),
(3, 'lvillachane', 'jux7g', 'Villechalane', 'Louis', '8 rue des Charmes, Cahors', 'Villechalane@gmail.com', ' Biologiste', NULL),
(4, 'dandre', 'oppg5', 'Andre', 'David', '1 rue Petit, Lalbenque', 'David22@gmail.com', ' Biologiste', NULL),
(5, 'cbedos', 'gmhxd', 'Bedos', 'Christian', '1 rue Peranud, Montcuq', 'Christian32@epsi.fr', ' Orthodontiste', NULL),
(6, 'pbentot', 'doyw1', 'Bentot', 'Pascal', '11 allée des Cerises, Bessines', 'Bentot.Pascal@numericable.fr', ' O.R.L - Otorhinolaryngologiste', NULL),
(7, 'fdaburon', '7oqpv', 'Daburon', 'François', '13 rue de Chanzy, Créteil', 'Daburon@laposte.fr', ' Dentiste', NULL),
(8, 'mdebelle', 'od5rt', 'Debelle', 'Michel', '181 avenue Barbusse, Rosny', 'Debelle@gmail.com', ' Radiologue', NULL),
(9, 'ndesmarquest', 'f1fob', 'Desmarquest', 'Nathalie', '14 Place d Arc, Orléans', 'Desmarquest@hotmail.fr', ' Nutritionniste', NULL),
(10, 'veynde', 'i7sn3', 'Eynde', 'Valérie', '3 Grand Place, Marseille', 'EyndeValérie@gmail.com', ' Ophtalmologiste', NULL),
(11, 'jfinck', 'mpb3t', 'Finck', 'Jacques', '10 avenue du Prado, Marseille', 'Finck@epsi.fr', ' Pédiatre', NULL),
(12, 'ffremont', 'xs5tq', 'Frémont', 'Fernande', '4 route de la mer, Allauh', 'Fernande.11@laposte.com', ' Echographiste', NULL),
(13, 'agest', 'dywvt', 'Gest', 'Alain', '30 avenue de la mer, Berre', 'Gest.Alain@orange.com', ' Dentiste', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `medicament`
--
ALTER TABLE `medicament`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `praticien`
--
ALTER TABLE `praticien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Praticien_id_Departement` (`id_Departement`);

--
-- Index pour la table `rapport_visit`
--
ALTER TABLE `rapport_visit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Rapport_visit_id_Visiteur` (`id_Visiteur`),
  ADD KEY `FK_Rapport_visit_id_Praticien` (`id_Praticien`),
  ADD KEY `FK_Rapport_visit_id_Medicament` (`id_Medicament`);

--
-- Index pour la table `visiteur`
--
ALTER TABLE `visiteur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Visiteur_id_Departement` (`id_Departement`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `departement`
--
ALTER TABLE `departement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT pour la table `medicament`
--
ALTER TABLE `medicament`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `praticien`
--
ALTER TABLE `praticien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `rapport_visit`
--
ALTER TABLE `rapport_visit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `visiteur`
--
ALTER TABLE `visiteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `praticien`
--
ALTER TABLE `praticien`
  ADD CONSTRAINT `FK_Praticien_id_Departement` FOREIGN KEY (`id_Departement`) REFERENCES `departement` (`id`);

--
-- Contraintes pour la table `rapport_visit`
--
ALTER TABLE `rapport_visit`
  ADD CONSTRAINT `FK_Rapport_visit_id_Medicament` FOREIGN KEY (`id_Medicament`) REFERENCES `medicament` (`id`),
  ADD CONSTRAINT `FK_Rapport_visit_id_Praticien` FOREIGN KEY (`id_Praticien`) REFERENCES `praticien` (`id`),
  ADD CONSTRAINT `FK_Rapport_visit_id_Visiteur` FOREIGN KEY (`id_Visiteur`) REFERENCES `visiteur` (`id`);

--
-- Contraintes pour la table `visiteur`
--
ALTER TABLE `visiteur`
  ADD CONSTRAINT `FK_Visiteur_id_Departement` FOREIGN KEY (`id_Departement`) REFERENCES `departement` (`id`);
