-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 05 mai 2020 à 15:24
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
(6, 'MT-01', 'Dévoilé à l\'état de concept en 1999 au salon de Tokyo pour finalement être commercialisée 2005 au prix de 13 250 €, ce modèle de type roadster de forte cylindrée (bicylindre de 1 670 cm3 pour 90 chevaux) affiche un couple important à tous les niveaux de régime moteur : autour de 12 m·kg à 1 500 tr/min, près de 15 à 2 300 tr/min avec un maximum de 15,3 m·kg atteint à 3 750 tr/min. Cela se ressent par une réponse instantanée à chaque accélération. Ce moteur culbuté provient de la banque Yamaha puisqu\'il équipait déjà le Custom Road Star Warrior, même s\'il lui a été apporté quelques modifications pour l\'adapter au mieux au concept du Roadster où il se contentait de 85 ch et de 14 mkg de couple sur la Warrior.', 'mt01.jpg', 1),
(7, 'Harley Livewire', 'a Harley-Davidson LiveWire est une moto électrique de Harley-Davidson, leur premier véhicule électrique. Harley-Davidson dit que la vitesse maximale est de 95 mph avec un moteur de 105 ch revendiqué. Le LiveWire est sorti en 2019.', 'livewire.jpg', 1),
(8, 'BMW K1300S', 'Une GT  , un Roadster et pour finir une sportive. Amateurs de BMW, ces temps-ci Moto-Station vous gâte avec les essais de ces nouveautés allemandes ! Mais pas seulement vous, car ces K 1300 visent un public élargi. Plus méchante et plus sure comme nous l’avons dit, la livrée 2009 de ces trois fantastiques décuple l’agrément en même temps que l’efficacité, sans briser d’un soupçon leurs fondements technologiques. Structurellement inchangé, le 4-cylindres transversal commun grimpe de 1 157 à 1 293 cm3. Avec 175 chevaux (+ 8 chevaux), le bloc de la K 1300 S a pris des vitamines : il se montre le plus puissant de la gamme, tandis que le couple profite également des nombreuses modifications effectuées (voir « A retenir ») et progresse en valeur maxi de 13 à 14 daN.m. En attendant les premiers tours de roues de la BMW S 1000 RR en championnat Superbike mondial (WSBK), il nous tardait de jauger sa grande soeur dédiée à la route, cette nouvelle K 1300 S.', 'bmwK1300.jpg', 1),
(9, 'Yamaha R1', 'La R1 continue son chemin, aucunement rassasiée de sa soif de performances. Les victoires en Endurance ne font que conforter son statut de pistarde aboutie. Et l\'encourage à évoluer, doucement. Après sa mise à jour Euro4 en 2017, le millésime 2018 a amélioré le shifter - il fonctionne désormais dans les deux sens, montée et descente des rapports. Une mise à jour indispensable car toutes les sportives de gros calibres en sont équipées... ou le seront très bientôt. Il lui faut de cette technologie, et encore plus pour lutter voire dominer dans sa catégorie. Et elle ne le fait pas dans la demi-mesure. La R1 nouvelle génération semble à mi-chemin entre une moto de série et un prototype pour la course. Son regard a quasiment disparu, lui conférant une allure de machine de piste. C\'est clair, elle sort d\'un laboratoire piquousé à la sauce racing. Mais... mais... où sont la sensualité, les effets de fuite, l\'allure de demoiselle sauvage et l\'envie trépidante de plaire telle une actrice sous la plus fine des robes ?!? L\'audace a saigné le style, et la R1 ne pense plus qu\'à une chose : écraser le chrono sous les coups du cross-plane.', 'r1.jpg', 1),
(10, 'KTM RC', '’initiative de cet excellent mécanicien n’est pas exclusive, pas plus qu’inédite, car d’autres avant Daan avaient entrepris cette transformation. Toutefois, le hollandais a vraiment pris beaucoup de soin pour transformer une Super Duke R 1290 en RC8 R. Il a utilisé diverses pièces de chez KTM pour opérer la transformation du roadster en sportive. Daan s’est vraiment donné beaucoup de mal en repensant le té de fourche supérieur ou en concevant des platines de déports au niveau du bas moteur inférieur, sans compter l’intégration de l’échappement. Que de travail !', 'ktm.jpg', 1),
(11, 'Torres del Paine', 'En Patagonie chilienne, ce massif montagneux du sud des Andes abrite un parc national de 181 000 hectares déclaré réserve biosphère par l’UNESCO dès 1978. Une terre qui tient son nom des trois grandes formations granitiques qui le composent même si les paysages se caractérisent par leur grande diversité entre montagnes et vallées, glaciers et lacs. Le climat y est rude avec un vent fort parfois glacial et de nombreuses averses.', 'mountain.jpg', 2),
(12, 'Lac de Gadi Sagar', 'Situé à Jaisalmer, au Rajasthan, le lac de Gadi Sagar est entouré de temples et de sanctuaires, donnant des allures de Tomb Raider aux environs. En hiver, une grande variété d’oiseaux aquatiques s’y regroupent.', 'lac.jpg', 2),
(14, 'Sydney-Melbourne', 'La route Sydney - Melbourne via les Alpes Australiennes constitue à vrai défi pour les amateurs de sports en tous genres. Les Alpes traversent la Nouvelle Galles du sud, le Territoire de la capitale australienne et le Victoria, comprenant 16 parcs nationaux et réserves. Elles offrent des vues magnifiques et des possibilités d’aventures de plein air en toute saison. Dévalez les pentes en hiver à ski ou snowboard, faites du ski de fond parmi les gommiers des neiges ou partez en randonnée parmi les fleurs sauvages de l’été. Faites une partie du sentier de grande randonnée des Alpes australiennes, ou bien profitez des panoramas des nombreuses chaînes montagneuses en conduisant le long de la Great Alpine Road ou Great Alpine Way.', 'australie.jpg', 2),
(15, 'Chichen Itzà', 'D’une taille considérable et très touristique, le site est bien balisé et vous accéderez aux différentes parties du lieu très facilement.  Outre la magnifique pyramide principale “Kukulkan”, célèbre dans le monde entier de par son excellent état de conservation et représentant un serpent à plumes, vous y découvrirez différents types d’architecture maya tous plus beaux les uns que les autres : l’immense jeu de balle, l’observatoire astronomique, et le très ornementé couvent présentant tous des architectures très différentes…', 'mexico-3774303_640.jpg', 2),
(16, 'Connemara', 'Le nom de Connemara provient de l\'irlandais Conmaicne Mara, qui signifie littéralement « descendants de Con Mhac de la mer ». Les Conmaicne Mara sont en effet une branche d’une ancienne tribu irlandaise issue de Connacht et localisée sur la côte atlantique. Con Mhac, « fils du chien », d\'après la mythologie irlandaise, est le fils d\'une reine de Connacht.', 'bw.jpg', 2),
(17, 'Entretien de la chaine', 'Les kits-chaîne montés d’origine sur les motos sont généralement d’excellente qualité. Leur entretien est souvent négligé car même mal entretenu, il assure un bon kilométrage (10.000 à 15.000 km) avant de donner les premiers signes de faiblesse. Or l’usure de la transmission secondaire n’est pas progressive.\r\n\r\nSans d’entretien, elle n’accusera un jeu significatif qu’à l’approche de sa fin de vie. Il sera alors inutile de la retendre et de la noyer sous la graisse  : le mal est déjà fait. La seule façon d’assurer une longue vie à la chaîne est un entretien régulier.\r\n\r\nEn grande majorité, les chaînes d\'aujourdh\'ui sont équipées de petits joints qui retiennent la graisse appliquée en usine sur l’axe interne de chaque maillon. Ce graissage «  à vie  » est destiné à limiter l’usure des axes, donc l’étirement global de la chaîne. Vous n’y pouvez rien, c’est lié à la qualité de celle-ci.\r\n\r\nIl vous reste à veiller à la lubrification des pièces extérieures. Comme les rouleaux, ces pièces cylindriques qui viennent au contact des dents du pignon et de la couronne arrière. Un film de graisse permanent à ce niveau réduit l’usure provoquée par la contrainte entre ces pièces cruciales. Si ce film de graisse est maintenu par un graissage au bon moment, rouleaux et roues dentées s’useront plus lentement, tandis que l’ensemble du kit-chaîne assurera un kilométrage bien supérieur.', 'chaine.jpg', 3),
(18, 'Entretien des freins', 'Surveillez bien l’usure de vos plaquettes pour les changer à temps. L’épaisseur de garniture minimale est d’environ 2 mm, vérifiable à l’œil à l’aide d’une lampe de poche si nécessaire. Les plaquettes peuvent être munies d’un témoin, il s’agit généralement d’une entaille pratiquée dans la garniture qui réduit avec l’usure. Si le voyant de frein s\'allume, vérifiez rapidement l\'usure des plaquettes.\r\n\r\nDes plaquettes de frein trop usées endommagent les disques, alors ne tardez pas trop !\r\n\r\nAvant de passer sur des plaquettes en métal fritté, bien regarder les préconisations constructeur car si la moto n\'est pas prévue pour, cela peut être dangereux (destruction des disques). Attention ! Ces plaquettes ne sont réellement efficaces qu\'une fois arrivé à leur température de fonctionnement (250°). Il est rare sur route d\'atteindre cette température. En dessous, elles sont moins efficaces que des plaquettes d\'origine.', 'frein.jpg', 3),
(19, 'Entretien des pneumatiques', 'La bonne lecture du marquage de son pneumatique permet de s\'assurer du respect de la loi :\r\n\r\n    Les pneumatiques doivent être de même type sur un même essieu, c\'est-à-dire : même marque, même structure (radiale), même dimension, même catégorie d\'utilisation (été ou hiver), mêmes indices de charges et de vitesse.\r\n    Les pneus montés doivent respecter l\'homologation de première monte du constructeur : dimension, indices de charge et de vitesse.\r\n    La dimension sur un essieu peut-être modifiée en respectant les règles de transformations transmises par les professionnels (tableaux d\'équivalence à respecter, les transformations n\'étant toutefois pas conseillées).\r\n    Il est interdit de monter des pneumatiques dont :\r\n        l\'indice de charge est inférieur à l\'indice de charge homologué en première monte,\r\n        l\'indice de vitesse est inférieur à l\'indice de vitesse homologué en première monte, sauf dans le cas d\'un passage en pneumatique hiver (une pastille spécifique devant alors être apposée sur le pare-brise du véhicule).\r\n    1,6 mm : c\'est la profondeur de sculpture minimale tolérée sur chaque point de la bande de roulement.\r\n        En deçà, le pneu doit être changé.\r\n        Des témoins d\'usure aident à visualiser ce seuil, certains manufacturiers y ajoutant des repères visuels sur le flanc du pneu pour détecter les endroits où sont positionnés ces témoins.', 'pneu.jpg', 3),
(20, 'Entretien des amortisseurs', 'Les deux roues de la moto sont reliées au châssis par un système de suspensions. Que ce soit à l\'avant ou à l\'arrière, la suspension est pratiquement toujours assurée par un ressort (ou de l\'air sous pression) associé à un amortisseur destiné à freiner les oscillations. Un réglage correct de la suspension et une pression correcte des pneus sont essentiels pour rouler en sécurité; ces réglages sont bien plus importants pour une moto que pour un véhicule à quatre roues car la moindre perte d’adhérence peut amener à la perte de contrôle de la moto.\r\n\r\nLa suspension avant est le plus souvent constituée de deux tubes coulissants intégrant des ressorts et/ou des amortisseurs hydrauliques (fourche télescopique), mais de nombreux autres systèmes existent ou ont existé (parallélogramme, fourche Earles, avec un bras oscillant, par exemple).\r\n\r\nOn rencontre de nombreux types différents de suspensions arrière. Les machines les plus anciennes avaient un arrière rigide (l\'essentiel de la suspension étant assurée par la selle), puis une suspension coulissante (arrière rigide, où seule la roue est suspendue), puis une suspension par bras oscillant sur presque toutes les motos modernes. Les fourches à suspensions ont été inventées vers les années 1900, au début de XX° siècle.', 'amortisseur.jpg', 3),
(21, 'Rôle d\'un piston', 'Les pistons sont présents dans de nombreuses applications mécaniques. La plus courante est le moteur à combustion interne, notamment dans l\'automobile. On trouve également un ou plusieurs pistons dans les compresseurs, les pompes, les vérins, les détendeurs, les régulateurs, les distributeurs, les valves, les amortisseurs, mais aussi les seringues médicales ou les instruments de musique à pistons.\r\n\r\nIl existe deux types de pistons : les pistons à simple effet, où la pression n\'agit que sur une face (seringues médicales), et les pistons à double effet, où la pression agit sur ses deux faces (locomotive à vapeur). Le déplacement du piston provoque ou est provoqué par une pression à l\'intérieur de la chambre.', 'piston.jpg', 3),
(22, 'Fonctionnement d\'un moteur', 'Dans les moteurs à combustion interne, il existe le moteur 2 temps, le moteur 4 temps.On compte parmi ces moteurs, le moteur à essence et le moteur diesel. Le moteur diesel ayant fait qu\'une brève apparition dans le monde de la moto, il ne sera pas abordé dans cette page web.\r\n\r\nAvant de se lancer dans l\'explication de comment marche un moteur à combustion interne (quelque fois appelé abusivement &quot;moteur à explosion&quot;),il me semble indispensable de voir les différents organes d\'un moteur afin d\'être sûr que tout le monde parle de la même chose.\r\nSuite à &quot;l\'explosion&quot;, le piston effectue un va et vient dans le cylindre. Par l\'intermédiaire de la bielle,le mouvement du piston est transféré au vilebrequin transformant ainsi le mouvement alternatif du piston en un mouvement rotatif au niveau du vilebrequin. La tête de la bielle s\'articule sur un maneton qui est un axe excentré par rapport au centre du vilebrequin et qui détermine la course du piston.La culasse couvre le cylindre et va permettre la compression des gaz ainsi que l\'entrée des gaz frais et l\'expulsion des gaz brulés. Par ailleurs, j\'attire votre attention sur le fait qu\'il y a au moins 2 soupapes. Une soupape d\'admission (à gauche)et une soupape d\'échappement (à droite) (Attention ceci est spécifique au 4 temps)\r\nLa soupape d\'admission ouvre ou ferme un passage vers le carburateur qui permet de faire le mélange air/essence.La soupape d\'échappement ouvre le passage vers l\'extérieur ou échappement.', 'engine.jpg', 3);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
