-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 02 mai 2020 à 14:49
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `moto_univers`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Motos'),
(2, 'Voyages'),
(3, 'Atelier');

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `image`, `category`) VALUES
(1, 'Harley', 'omment transformer le plus accessible modèle de la gamme Harley (après le XG 750 Street) en méchant garçon au caractère trempé dans l\'acier ? Simple. Il suffit de lui donner des effluves de peinture noire, d\'y ajouter des soufflets de protection, d\'y greffer une selle monoplace et un guidon style Black Drag, et de bien montrer les 2 échappements courts superposés. 2016 a apporté de quoi profiter avec plus de sérénité de la conduite de l\'Iron avec des suspensions améliorées. Une nouvelle cartouche s\'est installé dans la fourche et des amortisseurs réglables en précharge s\'occupent du train arrière. Un peu d\'efficacité supplémentaire sera appréciable et apprécié. Un petit toilettage s\'invite, avec une selle plus typée, des jantes à 9 bâtons, un filtre à air circulaire et rainuré, ainsi qu\'un protège-courroie, les pare-chaleurs d\'échappement et les pattes du garde-boue avant perforés.', 'iron.jpg', 1),
(2, 'Cercle polaire', 'Mon voyage dans le cercle polaire', 'voyage.jpg', 2),
(4, 'Tuto mécanique', 'Mon petit tuto méca pour les fans', 'meca.jpg', 3),
(6, 'MT-01', 'Dévoilé à l\'état de concept en 1999 au salon de Tokyo pour finalement être commercialisée 2005 au prix de 13 250 €, ce modèle de type roadster de forte cylindrée (bicylindre de 1 670 cm3 pour 90 chevaux) affiche un couple important à tous les niveaux de régime moteur : autour de 12 m·kg à 1 500 tr/min, près de 15 à 2 300 tr/min avec un maximum de 15,3 m·kg atteint à 3 750 tr/min. Cela se ressent par une réponse instantanée à chaque accélération. Ce moteur culbuté provient de la banque Yamaha puisqu\'il équipait déjà le Custom Road Star Warrior, même s\'il lui a été apporté quelques modifications pour l\'adapter au mieux au concept du Roadster où il se contentait de 85 ch et de 14 mkg de couple sur la Warrior.', 'mt01.jpg', 1),
(7, 'Harley Livewire', 'a Harley-Davidson LiveWire est une moto électrique de Harley-Davidson, leur premier véhicule électrique. Harley-Davidson dit que la vitesse maximale est de 95 mph avec un moteur de 105 ch revendiqué. Le LiveWire est sorti en 2019.', 'livewire.jpg', 1),
(8, 'BMW K1300S', 'Une GT  , un Roadster et pour finir une sportive. Amateurs de BMW, ces temps-ci Moto-Station vous gâte avec les essais de ces nouveautés allemandes ! Mais pas seulement vous, car ces K 1300 visent un public élargi. Plus méchante et plus sure comme nous l’avons dit, la livrée 2009 de ces trois fantastiques décuple l’agrément en même temps que l’efficacité, sans briser d’un soupçon leurs fondements technologiques. Structurellement inchangé, le 4-cylindres transversal commun grimpe de 1 157 à 1 293 cm3. Avec 175 chevaux (+ 8 chevaux), le bloc de la K 1300 S a pris des vitamines : il se montre le plus puissant de la gamme, tandis que le couple profite également des nombreuses modifications effectuées (voir « A retenir ») et progresse en valeur maxi de 13 à 14 daN.m. En attendant les premiers tours de roues de la BMW S 1000 RR en championnat Superbike mondial (WSBK), il nous tardait de jauger sa grande soeur dédiée à la route, cette nouvelle K 1300 S.', 'bmwK1300.jpg', 1),
(9, 'Yamaha R1', 'La R1 continue son chemin, aucunement rassasiée de sa soif de performances. Les victoires en Endurance ne font que conforter son statut de pistarde aboutie. Et l\'encourage à évoluer, doucement. Après sa mise à jour Euro4 en 2017, le millésime 2018 a amélioré le shifter - il fonctionne désormais dans les deux sens, montée et descente des rapports. Une mise à jour indispensable car toutes les sportives de gros calibres en sont équipées... ou le seront très bientôt. Il lui faut de cette technologie, et encore plus pour lutter voire dominer dans sa catégorie. Et elle ne le fait pas dans la demi-mesure. La R1 nouvelle génération semble à mi-chemin entre une moto de série et un prototype pour la course. Son regard a quasiment disparu, lui conférant une allure de machine de piste. C\'est clair, elle sort d\'un laboratoire piquousé à la sauce racing. Mais... mais... où sont la sensualité, les effets de fuite, l\'allure de demoiselle sauvage et l\'envie trépidante de plaire telle une actrice sous la plus fine des robes ?!? L\'audace a saigné le style, et la R1 ne pense plus qu\'à une chose : écraser le chrono sous les coups du cross-plane.', 'r1.jpg', 1),
(10, 'KTM RC', '’initiative de cet excellent mécanicien n’est pas exclusive, pas plus qu’inédite, car d’autres avant Daan avaient entrepris cette transformation. Toutefois, le hollandais a vraiment pris beaucoup de soin pour transformer une Super Duke R 1290 en RC8 R. Il a utilisé diverses pièces de chez KTM pour opérer la transformation du roadster en sportive. Daan s’est vraiment donné beaucoup de mal en repensant le té de fourche supérieur ou en concevant des platines de déports au niveau du bas moteur inférieur, sans compter l’intégration de l’échappement. Que de travail !', 'ktm.jpg', 1),
(11, 'Torres del Paine', 'En Patagonie chilienne, ce massif montagneux du sud des Andes abrite un parc national de 181 000 hectares déclaré réserve biosphère par l’UNESCO dès 1978. Une terre qui tient son nom des trois grandes formations granitiques qui le composent même si les paysages se caractérisent par leur grande diversité entre montagnes et vallées, glaciers et lacs. Le climat y est rude avec un vent fort parfois glacial et de nombreuses averses.', 'mountain.jpg', 2),
(12, 'Lac de Gadi Sagar', 'Situé à Jaisalmer, au Rajasthan, le lac de Gadi Sagar est entouré de temples et de sanctuaires, donnant des allures de Tomb Raider aux environs. En hiver, une grande variété d’oiseaux aquatiques s’y regroupent.', 'lac.jpg', 2),
(14, 'Sydney-Melbourne', 'La route Sydney - Melbourne via les Alpes Australiennes constitue à vrai défi pour les amateurs de sports en tous genres. Les Alpes traversent la Nouvelle Galles du sud, le Territoire de la capitale australienne et le Victoria, comprenant 16 parcs nationaux et réserves. Elles offrent des vues magnifiques et des possibilités d’aventures de plein air en toute saison. Dévalez les pentes en hiver à ski ou snowboard, faites du ski de fond parmi les gommiers des neiges ou partez en randonnée parmi les fleurs sauvages de l’été. Faites une partie du sentier de grande randonnée des Alpes australiennes, ou bien profitez des panoramas des nombreuses chaînes montagneuses en conduisant le long de la Great Alpine Road ou Great Alpine Way.', 'australie.jpg', 2),
(15, 'Chichen Itzà', 'D’une taille considérable et très touristique, le site est bien balisé et vous accéderez aux différentes parties du lieu très facilement.  Outre la magnifique pyramide principale “Kukulkan”, célèbre dans le monde entier de par son excellent état de conservation et représentant un serpent à plumes, vous y découvrirez différents types d’architecture maya tous plus beaux les uns que les autres : l’immense jeu de balle, l’observatoire astronomique, et le très ornementé couvent présentant tous des architectures très différentes…', 'mexico-3774303_640.jpg', 2),
(16, 'Connemara', 'Le nom de Connemara provient de l\'irlandais Conmaicne Mara, qui signifie littéralement « descendants de Con Mhac de la mer ». Les Conmaicne Mara sont en effet une branche d’une ancienne tribu irlandaise issue de Connacht et localisée sur la côte atlantique. Con Mhac, « fils du chien », d\'après la mythologie irlandaise, est le fils d\'une reine de Connacht.', 'bw.jpg', 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `lastname` varchar(150) CHARACTER SET utf8 NOT NULL,
  `firstname` varchar(150) CHARACTER SET utf8 NOT NULL,
  `pseudo` varchar(150) CHARACTER SET utf8 NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `lastname`, `firstname`, `pseudo`, `email`, `password`) VALUES
(11, 'Gaye', 'Sébastien', 'LeSénégalais', '2DeTensionJeSuisSenegalais@soleil.com', 'iLoveBedo'),
(12, 'Perie', 'Franck', 'Gewyn', 'franck@gmail.com', '$2y$10$UFH0Kk4VTsJDgmzVR96Syefyj7tk69RgQx.D3jeN2CJPNrzll3cha'),
(13, 'Dusart', 'Mylène', 'titemimi63', 'titemimi63@asmforever.clermont', '$2y$10$m0xxcErdXRRXTMqoaY61fezv8BredMCRdH4QwS2/lD2K4feD2mksK');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
