-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  Dim 29 mars 2020 à 20:42
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

USE BLOGART20;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blogart20`
--

-- --------------------------------------------------------

-- --------------------------------------------------------
--
-- Structure de la table `motclearticle`
--

DROP TABLE IF EXISTS `motclearticle`;
CREATE TABLE IF NOT EXISTS `motclearticle` (
  `NumArt` char(10) NOT NULL,
  `NumMoCle` char(8) NOT NULL,
  PRIMARY KEY (`NumArt`,`NumMoCle`),
  KEY `MOTCLEARTICLE_FK` (`NumArt`),
  KEY `MOTCLEARTICLE2_FK` (`NumMoCle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `motclearticle`
--

INSERT INTO `motclearticle` (`NumArt`, `NumMoCle`) VALUES
('1', 'MTCL0101'),
('2', 'MTCL0101'),
('3', 'MTCL0101'),
('5', 'MTCL0101'),
('6', 'MTCL0101'),
('7', 'MTCL0101'),
('1', 'MTCL0102'),
('1', 'MTCL0103'),
('1', 'MTCL0104'),
('2', 'MTCL0104'),
('1', 'MTCL0105'),
('5', 'MTCL0105'),
('6', 'MTCL0105'),
('7', 'MTCL0105'),
('2', 'MTCL0106'),
('2', 'MTCL0107'),
('2', 'MTCL0108'),
('3', 'MTCL0109'),
('6', 'MTCL0109'),
('3', 'MTCL110'),
('3', 'MTCL111'),
('3', 'MTCL112'),
('4', 'MTCL113'),
('4', 'MTCL114'),
('4', 'MTCL115'),
('4', 'MTCL116'),
('4', 'MTCL117'),
('4', 'MTCL118'),
('6', 'MTCL118'),
('5', 'MTCL119'),
('5', 'MTCL120'),
('5', 'MTCL121'),
('6', 'MTCL121'),
('6', 'MTCL122'),
('6', 'MTCL123'),
('6', 'MTCL124'),
('7', 'MTCL125'),
('7', 'MTCL126'),
('7', 'MTCL127');

-- --------------------------------------------------------

--
-- Structure de la table `motcle`
--

DROP TABLE IF EXISTS `motcle`;
CREATE TABLE IF NOT EXISTS `motcle` (
  `NumMoCle` char(8) NOT NULL,
  `LibMoCle` char(30) DEFAULT NULL,
  `NumLang` char(8) NOT NULL,
  PRIMARY KEY (`NumMoCle`),
  KEY `MOTCLE_FK` (`NumMoCle`),
  KEY `FK_ASSOCIATION_5` (`NumLang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `motcle`
--

INSERT INTO `motcle` (`NumMoCle`, `LibMoCle`, `NumLang`) VALUES
('MTCL0101', 'bar', 'FRAN01'),
('MTCL0102', 'gaming', 'FRAN01'),
('MTCL0103', 'nintendo', 'FRAN01'),
('MTCL0104', 'tournois', 'FRAN01'),
('MTCL0105', 'Bordeaux', 'FRAN01'),
('MTCL0106', 'compétition', 'FRAN01'),
('MTCL0107', 'sport', 'FRAN01'),
('MTCL0108', 'jeux', 'FRAN01'),
('MTCL0109', 'insolite', 'FRAN01'),
('MTCL110', 'fermeture', 'FRAN01'),
('MTCL111', 'ouverture', 'FRAN01'),
('MTCL112', 'futur', 'FRAN01'),
('MTCL113', 'bière artisanale', 'FRAN01'),
('MTCL114', 'locale', 'FRAN01'),
('MTCL115', 'Québec', 'FRAN01'),
('MTCL116', 'broue-pub', 'FRAN01'),
('MTCL117', 'bio', 'FRAN01'),
('MTCL118', 'brasserie', 'FRAN01'),
('MTCL119', 'chats', 'FRAN01'),
('MTCL120', 'animaux', 'FRAN01'),
('MTCL121', 'Fait-maison', 'FRAN01'),
('MTCL122', 'moine', 'FRAN01'),
('MTCL123', 'monastère', 'FRAN01'),
('MTCL124', 'prière', 'FRAN01'),
('MTCL125', 'étudiants', 'FRAN01'),
('MTCL126', 'cocktails', 'FRAN01'),
('MTCL127', 'top', 'FRAN01');


-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `NumCom` char(6) NOT NULL,
  `DtCreC` datetime DEFAULT NULL,
  `PseudoAuteur` char(20) NOT NULL,
  `EmailAuteur` char(60) NOT NULL,
  `TitrCom` char(60) NOT NULL,
  `LibCom` text NOT NULL,
  `NumArt` char(10) NOT NULL,
  PRIMARY KEY (`NumCom`),
  KEY `COMMENT_FK` (`NumCom`),
  KEY `FK_ASSOCIATION_7` (`NumArt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `NumArt` char(10) NOT NULL,
  `DtCreA` date DEFAULT NULL,
  `LibTitrA` text,
  `LibChapoA` text,
  `LibAccrochA` text,
  `Parag1A` text,
  `LibSsTitr1` text,
  `Parag2A` text,
  `LibSsTitr2` text,
  `Parag3A` text,
  `LibConclA` text,
  `UrlPhotA` char(62) DEFAULT NULL,
  `Likes` int(11) DEFAULT NULL,
  `NumAngl` char(8) NOT NULL,
  `NumThem` char(8) NOT NULL,
  `NumLang` char(8) NOT NULL,
  PRIMARY KEY (`NumArt`),
  KEY `ARTICLE_FK` (`NumArt`),
  KEY `FK_ASSOCIATION_1` (`NumAngl`),
  KEY `FK_ASSOCIATION_2` (`NumThem`),
  KEY `FK_ASSOCIATION_3` (`NumLang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`NumArt`, `DtCreA`, `LibTitrA`, `LibChapoA`, `LibAccrochA`, `Parag1A`, `LibSsTitr1`, `Parag2A`, `LibSsTitr2`, `Parag3A`, `LibConclA`, `UrlPhotA`, `Likes`, `NumAngl`, `NumThem`, `NumLang`) VALUES
('1', '2020-03-29', 'Bar le R4ndom Bordeaux: comment boire et jouer dans une même soirée ?', 'Le R4ndom est un bar gamer réputé pour ses tournois divers et variés. Je me suis donc chargé de cette lourde mission qu’est d’aller goûter pour vous leur bière en happy-hour. J’ai eu l’occasion de la déguster entouré de consoles qui réchauffent l’air, dans une atmosphère de concentration humide créée par les participants du tournois.\r\n', 'J’ai vu, j’ai bu, j’ai joué.', ' C’est ainsi que toute personne entrant dans ce fameux bar devrait résumer sa soirée. La mienne n’échappe pas à cette règle. Découvrez en ma compagnie cette soirée avant de vous faire un avis sur ce lieu. Je suis arrivé devant cette devanture grise, une odeur de gaming intense s’échappe du bar. Je me suis tout de même inscrit au tournoi Smash Bros du soir donc je me décide de rentrer. L’intérieur du bar est en accord avec la couleur grise de sa devanture avec comme supplément, quelques touches geeks. L’univers Nintendo prend une grande partie de la décoration du bar : Spyro, Mario, les plantes Piranha, Pokémon, etc… Des consoles vintages sont dispersées un peu partout dans le bar. Le tournoi est dans 30 minutes et le bar est déjà bondé de tee-shirts avec des “jeux de mots” geeks du genre “Il me reste plus qu’un coeur” ou bien “Game over, I’m married”, on reconnaît également ceux qui vont participer au tournoi grâce à leurs tee-shirts Smash Bros et Nintendo. On remarque qu’ici, les clients sont avant tout des fans inconditionnels du jeux vidéo et cela se ressent dans l’ambiance bonne enfant qui circule au sein du bar. Je me faufile tel Snake pour rejoindre le bar, là où je peux vali', 'Ma première quête :', 'Qu\'est-ce qui pourrait étancher ma soif ? Sur la carte, nous avons comme dans tous les bars, les “long drinks” (vin, bière, rhum, etc.), les bières, des softs, des thés, des cafés et différentes saveurs de mojitos (mangue, fraises, sans alcool, etc…). Pour un “long drink”, vous devrez débourser 5-6 euros et 8 euros pour les mojitos. En retournant le fascicule des boissons, je remarque qu’en fait, il y a une panoplie d’autres boissons à l\'effigie du jeux vidéo qui sont disponibles (et ils ont l’air succulent !). Dans la team cocktails à 6.50 euros, j’hésite entre le Donkey Kong qui est à base de vodka, rhum, citron et Coca-Cola et le Kirby qui est à base de lait, téquila et fraise.  Quoique le célèbre dragon à lui aussi le droit à sa boisson, Spyro, à base de schweppes, violette, citron et gin me donne envie ! Dans la team adverse, à 5 euros, les cocktails sans alcool ne sont pas ridicules : le Rondoudou à base d’ananas, lait, fraise et framboise et le Pikachu à base d’Orangina, fraise et framboise. Mais de toutes façons, je crois avoir trouvé mon bonheur : le cocktail sans alcool du célèbre compagnon de Sonic, Tails à l’air de surclasser sa team avec sa recette à base de caramel, c', 'Le Boss d’arène :', 'Le tournoi Smash Bros débute, les challengers adverses sont décontractés, souriants. Pour les débutants en gaming, “Super Smash Bros.” est un jeu vidéo de combat et de plates-formes où elle met en scène des combats entre de nombreux personnages majoritairement issus de l\'univers des jeux de la franchise Nintendo. Le tournoi se déroule de la façon suivante : chaque joueur affronte son adversaire en trois manches. Le gagnant monte pour la phase d’après, dans le Winner Bracket et le perdant passe en Loser Bracket, ou les combats ne sont plus qu’en une manche et ou la défaite, a pour sentence, l\'élimination. Premier match : Sire Cravate, Personnage : Terry Bogard. Il est clairement un habitué du bar et je vais devoir faire de mon mieux pour ne pas me faire ridiculiser. Mon Bowser est prêt, je me suis entraîné pour cette instant, je vais réussir à gagner ! Résultat du Match : 2 - 0, pour lui, je tombe donc en Loser Bracket, ma dernière chance de gagner ne serait ce qu’un match dans ce tournoi ! Mon adversaire est un dénommé Arakiels, un joueur de Byleth. Miracle ! Je réussis à  gagner ! Motivé comme jamais, me voilà contre Bart, lui aussi joueur de Bowser. Je lui prends ses 2 premières ', 'En conclusion, si vous êtes fan de jeux vidéos, adepte des bars-concepts ou bien nostalgique de votre manette, “Le R4dom” est fait pour vous !', '', 0, 'ANGL0101', 'THE0101', 'FRAN01'),
('2', '2020-03-29', 'INSOLITE : LES JEUX BARALYMPIQUES', 'Je suis si content de vous retrouver aujourd’hui! En pleine période de confinement je pense à vous mes chers lecteurs et j’ai décidé de vous raconter ma folle nuit des jeux baralympiques, de quoi vous donner quelques idées pour aborder le post confinement! ', 'Tout commence assez banalement.', 'Je suis avec mes meilleurs amis Paul et Thomas. C’était l\'année dernière fin mai, le vendredi soir de la fin de nos examens. Quelle délivrance! Mais une question restait en suspend… Comment débuter la fête? Comment débuter cette longue et douce période qu’est l’été? Il fallait commencer en fanfare, on attendait ce moment depuis tellement de temps! Fins joueurs que nous sommes (certains plus sportifs que d’autres, certes) , nous sommes dit : amusons nous ce soir, arrosons nous mais sous le signe du jeu et du sport tout de même! Puis c’est vrai quand même, quelle idée d’allier jeux et boissons dans un bar? Nous savions que certains bars à jeux existaient, nous nous devions de découvrir cette discipline et de pousser nos investigations dans les bars les plus sportifs! C’est vrai quoi, boire dans un bar c’est bien, avec des amis c’est encore mieux, mais avec une petite partie de Uno, de fléchettes ou de pétanque, c’est beaucoup mieux! Alors on s’est créé une liste de bars de Bordeaux qui répondait à nos attentes. Commençons par les bars à jeux de sociétés et finissons en beauté avec les bars sportifs! C’est parti pour les baralympiques!', 'ENTRÉE EN BOUCHE AVEC LES JEUX DE SOCIÉTÉS', 'On commence notre nuit avec Jeu Barjo, 12 rue St James. Nous sommes en début de soirée, il n’y a pas grand monde à l’intérieur. Nous arrivons dans l’intérieur très spacieux, il y a à notre disposition une mezzanine, une cave et de gigantesques bibliothèques. Un serveur nous aborde, nous propose sa carte richement garnie de grands vins et de bières variées. Ensuite, ce même serveur nous conseille et nous avise sur quel jeu pourrait accompagner notre début de soirée, nous partons sur un uno! Classique, mais intemporel. Après quelques parties et quelques verres, nous quittons ce bel endroit pour aller au Muse Café. En plus d’offrir une énorme quantité de jeux, l’établissement nous propose une carte de cuisine de bistrot tout à fait honorable. L’ambiance conviviale et authentique nous absorbe, nous découvrons qu’un quizz est organisé ce soir là (tous les vendredis en fait)! Nous participons au quizz culture pop comme des fous, personne ne peut nous arrêter. Il y a aussi des créateurs de jeux ce soir là, le bar est connu pour ça. Nous parlons avec eux, nous mangeons, nous buvons, nous jouons. Cette ambiance estivale nous régale. Assez joué, maintenant nous allons nous la jouer sport!', 'LA SUITE PLUS SPORTIVE', 'L’introduction de la soirée avec les jeux de sociétés étant faite, nous pouvons maintenant aller dans les bars où nous pouvons retrouver les indispensables des jeux de bars. Comment parler de ces derniers sans parler sport officiel de tout bar? Le baby-foot est bien évidemment un incontournable dans son domaine, c’est pourquoi nous nous dirigeons vers la Tencha, 22 quai de la monnaie. Que c’est bon de retrouver cette ambiance fraîche et festive des quais! Nos parties s’enflamment au rythme du DJ set, marque de fabrique de la Tencha. Maintenant, direction le Sherlock Holmes 16 rue Judaïque pour une autre discipline mythique des bars, les fléchettes! Les bières artisanales comme la Banana Bread ou la Bombardier nous octroient des super pouvoirs de francs-tireurs. L’ambiance anglo-saxonne nous rappelle pourquoi nous aimons tant ce bar. Il est tard, très tard. Nous décidons de nous départager Paul, Thomas et moi une dernière fois autour d’un billard. La meilleure table de billard se trouve au Bad Motherfucker, 16 Cours de l’Argonne. Nos parties furent épiques, on a tout donné! Pour ce qu’il est du vainqueur, au bout d’une certaine heure de la nuit cette notion devient complètement ridi', 'Quelle nuit! J’espère qu’elle vous aura inspiré pour que vous puissiez vous aussi profiter de ces différents bars à jeux de Bordeaux. Vous avez les cartes en main, à vous de jouer!', '', 0, 'ANGL0010', 'THE0104', 'FRAN01'),
('3', '2020-03-29', 'Bordeaux en attente: les bars à venir ou l’avenir des bars?', 'Si vous lisez ces lignes, c’est que vous êtes désespéré, comme moi. Nous sommes tous réunis ici pour les mêmes raisons, trouver des lieux insolites au pouvoir de pimenter nos soirées. C’est en me basant sur ce simple besoin que je vous propose ce tour d’horizon des bars innovants. Sans plus tarder, découvrons les nouveaux concepts et les transformations des bars bordelais.\r\n', 'Oui les Bars évoluent.', 'Simple exemple: le pub Saint Aubin qui est actuellement en rénovation. C’est aussi la tragique fermeture temporaire de ce véritable repère qui m’a poussé à écrire. Une véritable déchirure depuis le 7 janvier 2020, date de fermeture du bar.\r\nPlongeons nous maintenant dans ce qu’il se fait de plus fous actuellement. Commençons doucement, avec le Barberousse, bar destiné aux aventureux pirates que vous êtes. Toute la décoration y à été savamment pensée pour vous faire oublier que vous vivez au XXIème siècle. deux défauts majeurs: le nombre de personnes pouvant s\'engouffrer dans ce four micro-ondes est impressionnant. C’est à peine si l’on arrive à respirer les jeudis soirs. second défaut, la musique, digne d’un album “mix beauf 2000”. Bar suivant: l’I-boat, véritable bar flottant, vous découvrirez une atmosphère tout-à fait unique, avec vue sur la garonne, et de bons DJ pour vos soirées les plus aquatiques. Amateurs de pétanque, ricard et autre? Dommage, Les cadets à fermé. Une véritable piste de pétanque et un fort accent gascon vous attendaient, en plus de nombreux tournois les week-ends.', 'Et au futur proche ?', 'J’y viens, reprend ton calme, souffle un coup, bois, fais quelque chose. On y est ? Bien. Les concepts les plus fous sont ici permis, mais je préfère vous prévenir tout de suite, personne ne peut dire à l’heure actuelle si ces bars verront un jour le jour. Commençons. L’Alfredo, c’est ainsi que se prénomme le futur bar fondé sur l’univers de Jurassic Park, film ayant marqué toute une génération. Pascal, le créateur nous l’affirme “avec ce bar, je vise une énorme partie de la jeunesse bordelaise”. Attendez-vous donc dans les prochaines années à d’énormes frissons, accompagnés de dinosaures. ur ertz est le prochain sur la liste.  Bar destiné aux basques qui ont le mal du pays. Véritables jambon et Belhara au rendez-vous. De nombreux banquets y seront organisés, selon patrice, de directeur du futur établissement. Vous rêvez de sanglier? Qu\'à cela ne tienne, voici le Bar Toutatis, véritable échoppe gauloise. Une décoration comme vous en trouverez nul part ailleurs, de la cervoise qui coule à flots, et une ambiance digne de nos ancêtres. Ce bar sera sûrement le plus décalé de tout Bordeaux si il sort de terre un jour. Bonus, allez lire l’article sur le Gratissimum, bar monastique.\r\n', 'Les grands retours attendus', 'C’est dur à avouer, mais certains bars chéris par le public viennent à mettre la clef sous la porte. Voici donc les bars à concepts fermés dont on attend leur retour de pied ferme.\r\nC’est en 2012 que l’Ice Room s’est réchauffé. Bar à -10°C, il était sculpté entièrement dans la glace, de quoi garder la tête froide. Concept original, une réouverture ferait le plus grand bien à tous les lecteurs de ce blog j’en suis sûr. Autre perte inestimable; le bar Les Cadets, qui nous proposait pour notre plus grand plaisir une piste de pétanque avec tournois les weeks-ends. Le goût du pastis et le son du patois gascon ne sont plus accessibles. C’est une fois de plus avec grande impatience que nous attendons sa réouverture ! Les souterrains de Bordeaux accueillaient autrefois un bar nommé l’Underground, situé sous Bordeaux, dans ses souterrains. L’ambiance y était bonne, tout filait pour le mieux jusqu’au jour où l’administration bordelaise s’en mêla, et décida de faire fermer ce magnifique bar pour des raisons de sécurité. Nous espérons une réouverture prochaine, ce qui n’est pas gagné, la mairie refusant toute tentative de réouverture.\r\n', 'Ils sont nombreux, ils sont tous différents, mais ils sont tous des bars accueillants. Je vous propose de clore cet article en priant tous ensemble au bar Le Gratissimum pour leur ouverture où leur réouverture. Sur ce, à la votre!', '', 0, 'ANGL0102', 'THE0104', 'FRAN01'),
('4', '2020-03-29', 'Bière ultra-locale artisanale : un Broue-Pub québécois à Bordeaux !', '\r\nVenez découvrir le « broue-pub » bordelais qui n’est rien d’autre que la micro-brasserie  « Au nouveau Monde », dans laquelle la distance entre la cuve et votre bière ne fait qu’un seul étage. Vous pourrez déguster une sélection variée d’une dizaine de bières bio aux noms aussi salivant que intrigant, tout en dégustant une Poutine directement sortie du Québéc.\r\n', 'Manipuler vos sens avec de la bière, Au Nouveau Monde sait le faire, ce pub est bien plus qu’une sim', 'C’est une micro-brasserie, dans laquelle la bière est produite directement au sous-sol, avec des produits locaux. Pour couronner le tout, le bar Au Nouveau Monde est le premier bar de France à posséder une certification bio. En plein centre du vieux bordeaux (quartier Saint-Pierre) à deux pas de la grosse Cloche, vous pourrez aisément vous y rendre pour un afterwork ou un apéro de qualité entre amis. La micro-brasserie est tellement prisée que je vous conseille de réserver votre table avant d’y aller. Une fois sur place, vous découvrirez un bâtiment en pierre typiquement bordelais avec des fenêtres voûtées. Les différentes saveurs vous feront voyager de l’Irlande au Québec. Le panel de bières qui vous est offert saura vous transporter d’un imaginaire à l’autre.', 'Une carte de bières unique en son genre', 'Qu’est-ce qui fait de cette carte quelque chose de si unique ? Il vous suffit de la lire pour constater l’originalité et la sélection « maison » des bières qui vous sont proposées. Chaque nom de ces breuvages semble annoncer un voyage pour vos papilles, c’est là le point fort du Nouveau Monde. Pour ne vous citer que quelques-unes d’entre elles on propose la Fair Black Lady, la Fille du Soleil ou encore la Cascara’s Dream. Il y en aura pour tous les goûts, les bières vont de 5 % à 10 % alc., de quoi en satisfaire un grand nombre… Mais qu’est-ce qui caractérise ces intrigantes bières et justifie ces appellations farfelues ? D’abord « La Fair Black Lady », est un Stout, une bière sombre (qui rappellera la Guinness à certain.e.s),  elle est brassée à partir de grains très torréfiés, ce qui offre quelques arômes de cacao. Ensuite, son nom nous annonce immédiatement fraîcheur et lumière « la Fille du Soleil » est une bière blanche, sa légère acidité saura rafraîchir vos chaudes journées. Enfin celle qui évoque de chaleureux voyages et de multiples saveurs, la Cascara’s Dream aux notes de caramel et de figue égaiera vos soirées hivernales. \r\n\r\nVoilà un léger aperçu de ce que nous offre la c', 'Un bar, oui mais pas seulement', 'Comme vous avez pu le comprendre, toutes ces bières proviennent toutes d’un seul et même endroit, la cave voûtée en dessous de vos pieds. Et ce grâce à l’initiative d’Etienne, qui en plus de ça a décidé d’inviter sa lointaine contrée à Bordeaux. Ce fabuleux mélange entre orge et Québec donne un « Broue-pub », un bar dans lequel la bière est brassée sur place et où on y sert la poutine pour accompagner la bière. Pour pousser le concept à son paroxysme, tous les mardi vous pourrez participer aux soirées quizz, portant sur la bière et le Québec évidemment !\r\n\r\nBien sûr l’idée de créer cette micro-brasserie ne s’arrête pas aux spécialités (régionales), l’objectif est également d’apporter une démarche responsable à ce concept, tout ce qui est servi dans cet établissement est bio, fait maison et tend à être le plus local possible. Les plats qui y sont proposés correspondent à tout le monde, allant du burger végétarien au burger classique en passant par la fameuse Poutine, si caractéristique du Québec. Pour ceux qui ne connaissent pas, la Poutine est le délicieux assemblage entre frites et sauce fromagère, et croyez-moi elle vaut le détour.\r\n', 'Le Nouveau Monde ne s’inscrit pas seul dans cette démarche puisqu’il propose même de nous enseigner l’art de la bière ! Et, oui pour ceux qui ne le savent pas encore, vous pouvez facilement produire votre bière chez vous ou avec vos amis pour un résultat bien plus que satisfaisant à la clé. Derrière ce petit pub se cache une réelle philosophie avec de grandes ambitions et une volonté de faire évoluer votre temps passé au bord des bars !', '', 0, 'ANGL0101', 'THE0104', 'FRAN01'),
('5', '2020-03-29', 'Un Bar à Chat bordelais ?! Le Comptoir des chats, entre félin et produit frais !', 'N’avez-vous jamais rêvé de pouvoir dégustez de délicieux en compagnie d’adorable petite boule de poils ? Et bien le Comptoir des chats est fait pour vous ! Ce Bar à chat situé en plein cœur de la Perle d’Aquitaine, vous ouvre ses portes du mardi au samedi de midi à 18 h 30 ! Vous y retrouverez des produits entièrement fait maison, et surtout, des Chats ! Nous sommes allés visiter ce petit coin de douceur au centre de Bordeaux', '120 cm ! C’est la taille de la tête à la queue de Mignon, le Maine Coon du Bar !', '', 'Félins ! De toute les tailles et de toutes les couleurs, tous plus mignon les uns que les autres !', 'En compagnie de Lily, Ben, Molly, Moira, Marlow, Twiggy, Garfield, Mina et Miss Tigrise, Mignon est le 10ème chat de la bande de bête poilu que l’on peut croiser au Comptoir des chats ! Lorsque l’on rentre dans le bar, on se rend rapidement compte que ce dernier a était construit avant pour nos amis les félidés : coussin, Arbre de jeu, plateforme d’observation et autre zone d’escalade sont présente partout dans l’enceinte du bar. Les sièges destinés à nous êtres humains semble superflu dans tous cette artillerie destiné au chat ! Naturellement, on se fait tout petit une fois qu’on est assis dans l’antre des félins, en essayant de déranger au minimum, ces magnifiques créatures. Mais ! Au moindre passage de l’un d’elle à moins de 50 centimètres de sois, tout le monde s’arrête, et tend la main en direction de l’animal pour pouvoir le caresser ! Chaque chat son caractère dans cette situation, certains se laissent prendre au jeu et demandent plus de caresse, d’autre font preuve de tout le snobisme caractéristique des félins, ignorant absolument toute tentative de « câlinage humain ». Heureusement, avec 10 chats, on peut facilement avoir son petit préféré !', 'Des chats, mais pas que ! De succulents mets fait avec attention et amours par le personnel du Compt', 'Et oui, parce que si dans ce Royaume de félin, les chats attire toute l’attention, la nourriture n’est pas en reste ! En effet, tous les produits que l’on peut goûter son cuisiné par l’équipe du Comptoir des Chats, et le tout avec des aliments le plus frais possible ! Sincèrement, tous leurs plats sucré sont succulent, imaginez donc le délice qu’est « Un Chocolat viennois avec son lot de crème chantilly et ses Marshmallow », le tout accompagné d’un cookie chat, et d’une Panna Cotta ! Rappelons que tout cela est fait maison ! Pour ceux, ce qui souhaite manger sur place, vous pouvez y discuter les Buddha Bowls à base quinoa, existant en plusieurs variantes, dont des versions végétariennes et végan ! Vous avez clairement de quoi bien vous régalez, et ceux toujours en compagnie d’adorable boules de poils. De plus, les humains peuplant ces lieux, les gérants du bar, sont eux aussi très sympathiques. Ils vous exposeront clairement les règles que vis-à-vis des chats, et l’on peut sentir l’amour profond qu’ils éprouvent pour ces derniers.\r\n', 'Des chats, un personnel accueillant, et des tas de bons plats ! Tel sont les ingrédients pour créer un lieu mémorable, ou il fait bon de venir se ressourcer. Un havre de paix et de chat mignon au plein centre de Bordeaux ! Nous vous conseillons donc vivement le Comptoir des Chats aux 8 Rue Pierre de Coubertin, 33000 Bordeaux. Et ceux que vous soyez amateur de félins, en recherche d’un endroit calme et plaisant, ou simplement d’un endroit sympathique pour manger ! C’est donc à partir de 7 ans et du mardi au samedi de 12 h à 18 h 30 que ses portes vous sont ouvertes ! N’hésitez pas, les chats n’attendent que vous !', '', 0, 'ANGL0101', 'THE0104', 'FRAN01'),
('6', '2020-03-29', 'Entre bière et religion, des Moines unis pour les plus démunis', 'Ce Bar bordelais tenue par un groupe de Moines propose de venir déguster bon nombre de bières brassées par des abbayes de la région !', '18h, ouverture du bar, comme à leurs habitudes Jacques, Paulin et Alexandre, trois Moines chrétiens ', 'Le bar se situe dans d’anciennes caves à vin bordelaise. Nous nous retrouverons donc plongés dans cette architecture mythique jonchée d\'arches de pierre et de tonneaux authentiques !\r\nL\'ouverture commence avec un chant solennel en latin d\'une forte voix baryton.\r\nUne cloche sonne et le silence retombe.\r\n\r\n«gratias tibi valde.»\r\n\r\nLe murmure des conversations reprend dans le bar. Le temps est maintenant à l\'accueil des clients.\r\nAu bar, nos trois moines sont ouverts à toutes les discussions avec les clients car avant d\'être des barmans ce sont des hommes d\'écoute.\r\n«Nous voulons que les gens comprennent que le christianisme ne se résume pas aux messes du dimanche et aux mariages » \r\nContre toute attente, le bar accueille une clientèle jeune et de bonne humeur le tout accompagné par une musique pop-rock.\r\n', 'Un large choix pour épater nos sens gustatifs !', 'Le Gratissimum (nom du bar, traduit du latin “bienvenue”) propose à sa clientèle plus d\'une vingtaine de bières trappistes avec de la Westmalle, de la Chimay, de la Rochefort ou encore mieux, de la Belharra du pays basque, une bière volontairement amère mais rehaussé par des notes très fruitées ! \r\nL\'originalité de ce bar passe aussi par le fait qu\'il propose une très grande quantité de bières du monde on pourra retrouver notamment la Saigon du Vietnam cette bière blonde est faite à partir de malt et de riz, ce qui lui donne des arômes céréaliers. La Asahi du Japon avec son goût Rafraîchissante, maltée et croustillante, ou encore la 3 Cordilleras de Colombie qui sort de l\'ordinaire avec des saveurs maltées et houblonnées originales, une complexité d\'arômes sur des notes fleuries, et d\'herbes fraîchement coupées.\r\nNous nous retrouvons donc plongés dans un tour du monde gustatif !\r\nMais attention, l\'abus d\'alcool est dangereux pour la santé, les boissons alcoolisées sont à consommer avec modération !\r\nPour couronner le tout, le Gratissimum adopte une démarche écologique en ne proposant uniquement que des bières respectant les labels verts.', 'Un bar, de l’alcool, mais des Moines avant tout.', 'L\'originalité de ce bar tient par le fait qu\'il est tenu par des moines ils en gardent donc les principes. Tous les bénéfices engendrés par le bar vont directement aider les populations les plus précaires. Ils sont en relation avec Les Restos du Coeur et proposent même de manger sur place pour un prix très raisonnable ! \r\nEn dehors des ouvertures du bar, ils y sont bénévoles.\r\nNous nous sommes rendu compte qu’au-delà d’être un bar le Gratissimum est d’abord une grande famille, même si sa population n’est presque jamais la même, tous les clients gardent le même état d’esprit, celui de la convivialité et de la bonne humeur.', 'Ce bar en surprendra plus d’un ! Nous vous conseillons vivement d’aller rencontrer Jacques, Paulin et Alexandre qui avec leurs connaissances vous feront voyager aux grés des bières...\r\n', '', 0, 'ANGL0101', 'THE0104', 'FRAN01'),
('7', '2020-03-29', 'Les 5 meilleurs bars, les moins chers de Bordeaux', 'Étant étudiant, j’ai toujours cherché à pouvoir sortir boire un coup entre amis au moindre coup. C’est pour cela que je suis parti à la recherche des MEILLEURS bars les MOINS chers de Bordeaux, pour que vous puissiez sortir entre amis, au moindre coup. Voici une liste de mes coups cœurs de la journée :', 'J’ai commencé ma quête en trouvant une rhumerie/pub au niveau de la Grosse Cloche vers la Cours Vict', '« Le Vintage » J’arrive devant une enseigne couleur bordeaux, qui s’inscrit parfaitement dans le vieux Bordeaux. Dès mon entrée, l’ambiance vintage et chaleureuse me saute aux yeux. La décoration est finement réussie et le personnel agréable. Passons aux choses sérieuses, que proposent-ils ici : vins bio, bières locales ou encore boissons artisanales. Côté prix, durant les fameuses « Happy Hour » de 17h à 21H, les bières sont à 3€, il y a des verres de vin à partir de 1,80€ et des assiettes de charcuterie pour 5€. Ce bar a tout pour plaire ! J’y ai passé un agréable moment, si vous êtes adepte des sonorités venant tout droit des 80’S, n’hésitez pas, « Le Vintage » est fait pour vous ! En continuant mes recherches, je me suis demandé s’il était possible de boire un verre dans un endroit luxueux pour l’équivalent d’un McFirst. La réponse est : OUI. Après être passé devant le Grand Théâtre, je suis arrivé devant « Le Bar à Vin du CIVB », qui a une décoration tanguant vers les années 50 qui est accompagnée d’une sublime touche luxueuse. En rentrant, je me suis demandé s’il est possible de boire un coup dans ce sublime établissement pour pratiquement rien. J’ai été surpris quand j’ai vu', '19 heures 30 :', 'Après avoir passé un agréable moment dans le monde du vin, je recherche un endroit qui peut me rendre nostalgique de mon enfance à la campagne. C’est comme cela, que non loin de la Victoire, je suis arrivé à « La Grange ». L’intérieur entièrement en bois, m’envoie dans un bar de campagne dès mon entrée. Une bouffée de nostalgie s’empare de moi : une ambiance rock, amicale et avec une fine odeur d’alcool parfumant la pièce. Je m’assieds à une place et je m’attaque à la carte : shooters à 3€ et cocktails à 5€ ! Les prix sont très abordables. Par contre, j’ai bien fait d’avoir un fond de monnaie sur moi car l’établissement n’accepte pas la carte. Dans tous les cas, je recommande cet établissement si vous êtes fan de cocktails et de rock ! Pour cet avant-dernier bar, je veux trouver un bar digne de ce nom. C’est comme ça que non loin du Pont de Pierre, je suis tombé nez à nez devant le « Le Saint-Christophe ». Cette devanture rouge, légèrement abîmé, ne m’inspire pas confiance. À l’intérieur, le bar me semble assez étroit, je m’installe tout de même. Une multitude de tableaux sont affichés dans le bar, c’est comme si le bar est un « mini-musée ». Je me mets à regarder la carte et là je', '22 heures :', 'La nuit tombe sur Bordeaux. Je veux finir cette quête en beauté avec un bar animé, où on peut se défouler tout en buvant un verre. Pas très loin de la place de la Bourse, dans une petite rue perpendiculaire à la Rue Saint- Rémi, je vois au loin un bar où une musique forte et des luminaires multicolores s’en échappent. Je décide d’y aller. La devanture très colorée avec un style latino-cubain ne me déplaît pas. Je rentre, la musique latine me fait bouger la tête. Un fort brouhaha mélangé à ces sonorités qui me donne des envies de danses endiablées résonnent au sein du bar. Je m’attaque à la carte et celle-ci propose une rangée de cocktail pour moins de 10€. Les prix sont supérieurs aux autres bars présents dans cette liste de différents bars mais dès que j’ai bu une gorgée de mon Mojito, j’ai compris que ce bar survole ses prédécesseurs sans hésitation. Une explosion de saveurs se déroule en ce moment même sur mon palet : la puissance du rhum, la fraîcheur de la menthe, l’acidité du citron vert et la douceur du sucre de canne m’ont conquis. Grâce à son ambiance latine, ses cocktails divins, le prix en vaut totalement la peine. Le « Calle Ocho » est mon coup de cœur de cette journée!', 'Grâce à cette liste des meilleurs bars, les moins chers de Bordeaux, vous avez toutes les cartes en main pour passer de superbes moments entre amis ou bien tout simplement pour vous détendre accompagnée d’un verre. Mais n’oubliez pas : l’abus d’alcool est dangereux pour la santé ;)', '', 0, 'ANGL0101', 'THE0104', 'FRAN01');


-- Structure de la table `thematique`
--

DROP TABLE IF EXISTS `thematique`;
CREATE TABLE IF NOT EXISTS `thematique` (
  `NumThem` char(8) NOT NULL,
  `LibThem` char(60) DEFAULT NULL,
  `NumLang` char(8) NOT NULL,
  PRIMARY KEY (`NumThem`),
  KEY `THEMATIQUE_FK` (`NumThem`),
  KEY `FK_ASSOCIATION_4` (`NumLang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `thematique`
--

INSERT INTO `thematique` (`NumThem`, `LibThem`, `NumLang`) VALUES
('THE0101', 'L\'événement', 'FRAN01'),
('THE0102', 'L\'acteur-clé', 'FRAN01'),
('THE0103', 'Le mouvement émergeant', 'FRAN01'),
('THE0104', 'L\'insolite / le clin d\'oeil', 'FRAN01'),
('THE0201', 'The event', 'ANGL01'),
('THE0202', 'The key player', 'ANGL01'),
('THE0203', 'The emerging movement', 'ANGL01'),
('THE0204', 'The unusual / the wink', 'ANGL01'),
('THE0301', 'Die Veranstaltung', 'ALLE01'),
('THE0302', 'Der Schlüsselakteur', 'ALLE01'),
('THE0303', 'Die entstehende Bewegung', 'ALLE01'),
('THE0304', 'Das Ungewöhnliche / das Augenzwinkern', 'ALLE01');



-- --------------------------------------------------------

--
-- Structure de la table `angle`
--

DROP TABLE IF EXISTS `angle`;
CREATE TABLE IF NOT EXISTS `angle` (
  `NumAngl` char(8) NOT NULL,
  `LibAngl` char(60) DEFAULT NULL,
  `NumLang` char(8) NOT NULL,
  PRIMARY KEY (`NumAngl`),
  KEY `ANGLE_FK` (`NumAngl`),
  KEY `FK_ASSOCIATION_6` (`NumLang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `angle`
--

INSERT INTO `angle` (`NumAngl`, `LibAngl`, `NumLang`) VALUES
('ANGL0010', 'jeux et bars', 'FRAN01'),
('ANGL0101', 'découverte de bar', 'FRAN01'),
('ANGL0102', 'thèmes de bars', 'FRAN01');



--
-- Structure de la table `date`
--

DROP TABLE IF EXISTS `date`;
CREATE TABLE IF NOT EXISTS `date` (
  `DtJour` datetime NOT NULL,
  PRIMARY KEY (`DtJour`),
  KEY `DATE_FK` (`DtJour`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `date`
--

INSERT INTO `date` (`DtJour`) VALUES
('2017-12-12 00:00:00'),
('2018-11-09 00:00:00'),
('2018-12-01 00:00:00'),
('2018-12-12 00:00:00'),
('2018-12-12 09:00:00'),
('2018-12-12 11:00:00'),
('2018-12-13 00:00:00'),
('2018-12-17 00:00:00'),
('2018-12-18 00:00:00'),
('2019-01-11 00:00:00'),
('2019-01-13 00:00:00'),
('2019-01-17 00:00:00'),
('2019-02-22 14:30:00');

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

DROP TABLE IF EXISTS `langue`;
CREATE TABLE IF NOT EXISTS `langue` (
  `NumLang` char(8) NOT NULL,
  `Lib1Lang` char(25) DEFAULT NULL,
  `Lib2Lang` char(45) DEFAULT NULL,
  `NumPays` char(4) DEFAULT NULL,
  PRIMARY KEY (`NumLang`),
  KEY `LANGUE_FK` (`NumLang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `langue`
--

INSERT INTO `langue` (`NumLang`, `Lib1Lang`, `Lib2Lang`, `NumPays`) VALUES
('ALLE01', 'Allemand(e)', 'Langue allemande', 'ALLE'),
('ANGL01', 'Anglais(e)', 'Langue anglaise', 'ANGL'),
('BULG01', 'Bulgare', 'Langue bulgare', 'BULG'),
('ESPA01', 'Espagnol(e)', 'Langue espagnole', 'ESPA'),
('FRAN01', 'Français(e)', 'Langue française', 'FRAN'),
('ITAL01', 'Italien(ne)', 'Langue italienne', 'ITAL'),
('RUSS01', 'Russe', 'Langue russe', 'RUSS'),
('UKRA01', 'Ukrainien(ne)', 'Langue ukrainienne', 'UKRA');



--
-- Structure de la table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `idPays` int(11) NOT NULL AUTO_INCREMENT,
  `cdPays` char(2) NOT NULL,
  `numPays` char(4) NOT NULL,
  `frPays` varchar(255) NOT NULL,
  `enPays` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idPays`),
  KEY `PAYS_FK` (`idPays`)
) ENGINE=InnoDB AUTO_INCREMENT=239 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`idPays`, `cdPays`, `numPays`, `frPays`, `enPays`) VALUES
(1, 'AF', 'AFGH', 'Afghanistan', 'Afghanistan'),
(2, 'ZA', 'AFRI', 'Afrique du Sud', 'South Africa'),
(3, 'AL', 'ALBA', 'Albanie', 'Albania'),
(4, 'DZ', 'ALGE', 'Algérie', 'Algeria'),
(5, 'DE', 'ALLE', 'Allemagne', 'Germany'),
(6, 'AD', 'ANDO', 'Andorre', 'Andorra'),
(7, 'AO', 'ANGO', 'Angola', 'Angola'),
(8, 'AI', 'ANGU', 'Anguilla', 'Anguilla'),
(9, 'AQ', 'ARTA', 'Antarctique', 'Antarctica'),
(10, 'AG', 'ANTG', 'Antigua-et-Barbuda', 'Antigua & Barbuda'),
(11, 'AN', 'ANTI', 'Antilles néerlandaises', 'Netherlands Antilles'),
(12, 'SA', 'ARAB', 'Arabie saoudite', 'Saudi Arabia'),
(13, 'AR', 'ARGE', 'Argentine', 'Argentina'),
(14, 'AM', 'ARME', 'Arménie', 'Armenia'),
(15, 'AW', 'ARUB', 'Aruba', 'Aruba'),
(16, 'AU', 'AUST', 'Australie', 'Australia'),
(17, 'AT', 'AUTR', 'Autriche', 'Austria'),
(18, 'AZ', 'AZER', 'Azerbaïdjan', 'Azerbaijan'),
(19, 'BJ', 'BENI', 'Bénin', 'Benin'),
(20, 'BS', 'BAHA', 'Bahamas', 'Bahamas, The'),
(21, 'BH', 'BAHR', 'Bahreïn', 'Bahrain'),
(22, 'BD', 'BANG', 'Bangladesh', 'Bangladesh'),
(23, 'BB', 'BARB', 'Barbade', 'Barbados'),
(24, 'PW', 'BELA', 'Belau', 'Palau'),
(25, 'BE', 'BELG', 'Belgique', 'Belgium'),
(26, 'BZ', 'BELI', 'Belize', 'Belize'),
(27, 'BM', 'BERM', 'Bermudes', 'Bermuda'),
(28, 'BT', 'BHOU', 'Bhoutan', 'Bhutan'),
(29, 'BY', 'BIEL', 'Biélorussie', 'Belarus'),
(30, 'MM', 'BIRM', 'Birmanie', 'Myanmar (ex-Burma)'),
(31, 'BO', 'BOLV', 'Bolivie', 'Bolivia'),
(32, 'BA', 'BOSN', 'Bosnie-Herzégovine', 'Bosnia and Herzegovina'),
(33, 'BW', 'BOTS', 'Botswana', 'Botswana'),
(34, 'BR', 'BRES', 'Brésil', 'Brazil'),
(35, 'BN', 'BRUN', 'Brunei', 'Brunei Darussalam'),
(36, 'BG', 'BULG', 'Bulgarie', 'Bulgaria'),
(37, 'BF', 'BURK', 'Burkina Faso', 'Burkina Faso'),
(38, 'BI', 'BURU', 'Burundi', 'Burundi'),
(39, 'CI', 'IVOI', 'Côte d\'Ivoire', 'Ivory Coast (see Cote d\'Ivoire)'),
(40, 'KH', 'CAMB', 'Cambodge', 'Cambodia'),
(41, 'CM', 'CAME', 'Cameroun', 'Cameroon'),
(42, 'CA', 'CANA', 'Canada', 'Canada'),
(43, 'CV', 'CVER', 'Cap-Vert', 'Cape Verde'),
(44, 'CL', 'CHIL', 'Chili', 'Chile'),
(45, 'CN', 'CHIN', 'Chine', 'China'),
(46, 'CY', 'CHYP', 'Chypre', 'Cyprus'),
(47, 'CO', 'COLO', 'Colombie', 'Colombia'),
(48, 'KM', 'COMO', 'Comores', 'Comoros'),
(49, 'CG', 'CONG', 'Congo', 'Congo'),
(50, 'KP', 'CNOR', 'Corée du Nord', 'Korea, Demo. People s Rep. of'),
(51, 'KR', 'CSUD', 'Corée du Sud', 'Korea, (South) Republic of'),
(52, 'CR', 'RICA', 'Costa Rica', 'Costa Rica'),
(53, 'HR', 'CROA', 'Croatie', 'Croatia'),
(54, 'CU', 'CUBA', 'Cuba', 'Cuba'),
(55, 'DK', 'DANE', 'Danemark', 'Denmark'),
(56, 'DJ', 'DJIB', 'Djibouti', 'Djibouti'),
(57, 'DM', 'DOMI', 'Dominique', 'Dominica'),
(58, 'EG', 'EGYP', 'Égypte', 'Egypt'),
(59, 'AE', 'EMIR', 'Émirats arabes unis', 'United Arab Emirates'),
(60, 'EC', 'EQUA', 'Équateur', 'Ecuador'),
(61, 'ER', 'ERYT', 'Érythrée', 'Eritrea'),
(62, 'ES', 'ESPA', 'Espagne', 'Spain'),
(63, 'EE', 'ESTO', 'Estonie', 'Estonia'),
(64, 'US', 'USA_', 'États-Unis', 'United States'),
(65, 'ET', 'ETHO', 'Éthiopie', 'Ethiopia'),
(66, 'FI', 'FINL', 'Finlande', 'Finland'),
(67, 'FR', 'FRAN', 'France', 'France'),
(68, 'GE', 'GEOR', 'Géorgie', 'Georgia'),
(69, 'GA', 'GABO', 'Gabon', 'Gabon'),
(70, 'GM', 'GAMB', 'Gambie', 'Gambia, the'),
(71, 'GH', 'GANA', 'Ghana', 'Ghana'),
(72, 'GI', 'GIBR', 'Gibraltar', 'Gibraltar'),
(73, 'GR', 'GREC', 'Grèce', 'Greece'),
(74, 'GD', 'GREN', 'Grenade', 'Grenada'),
(75, 'GL', 'GROE', 'Groenland', 'Greenland'),
(76, 'GP', 'GUAD', 'Guadeloupe', 'Guinea, Equatorial'),
(77, 'GU', 'GUAM', 'Guam', 'Guam'),
(78, 'GT', 'GUAT', 'Guatemala', 'Guatemala'),
(79, 'GN', 'GUIN', 'Guinée', 'Guinea'),
(80, 'GQ', 'GUIE', 'Guinée équatoriale', 'Equatorial Guinea'),
(81, 'GW', 'GUIB', 'Guinée-Bissao', 'Guinea-Bissau'),
(82, 'GY', 'GUYA', 'Guyana', 'Guyana'),
(83, 'GF', 'GUYF', 'Guyane française', 'Guiana, French'),
(84, 'HT', 'HAIT', 'Haïti', 'Haiti'),
(85, 'HN', 'HOND', 'Honduras', 'Honduras'),
(86, 'HK', 'KONG', 'Hong Kong', 'Hong Kong, (China)'),
(87, 'HU', 'HONG', 'Hongrie', 'Hungary'),
(88, 'BV', 'BOUV', 'Ile Bouvet', 'Bouvet Island'),
(89, 'CX', 'CHRI', 'Ile Christmas', 'Christmas Island'),
(90, 'NF', 'NORF', 'Ile Norfolk', 'Norfolk Island'),
(91, 'KY', 'CAYM', 'Iles Cayman', 'Cayman Islands'),
(92, 'CK', 'COOK', 'Iles Cook', 'Cook Islands'),
(93, 'FO', 'FERO', 'Iles Féroé', 'Faroe Islands'),
(94, 'FK', 'FALK', 'Iles Falkland', 'Falkland Islands (Malvinas)'),
(95, 'FJ', 'FIDJ', 'Iles Fidji', 'Fiji'),
(96, 'GS', 'GEOR', 'Iles Géorgie du Sud et Sandwich du Sud', 'S. Georgia and S. Sandwich Is.'),
(97, 'HM', 'HEAR', 'Iles Heard et McDonald', 'Heard and McDonald Islands'),
(98, 'MH', 'MARS', 'Iles Marshall', 'Marshall Islands'),
(99, 'PN', 'PITC', 'Iles Pitcairn', 'Pitcairn Island'),
(100, 'SB', 'SALO', 'Iles Salomon', 'Solomon Islands'),
(101, 'SJ', 'SVAL', 'Iles Svalbard et Jan Mayen', 'Svalbard and Jan Mayen Islands'),
(102, 'TC', 'TURK', 'Iles Turks-et-Caicos', 'Turks and Caicos Islands'),
(103, 'VI', 'VIEA', 'Iles Vierges américaines', 'Virgin Islands, U.S.'),
(104, 'VG', 'VIEB', 'Iles Vierges britanniques', 'Virgin Islands, British'),
(105, 'CC', 'COCO', 'Iles des Cocos (Keeling)', 'Cocos (Keeling) Islands'),
(106, 'UM', 'MINE', 'Iles mineures éloignées des États-Unis', 'US Minor Outlying Islands'),
(107, 'IN', 'INDE', 'Inde', 'India'),
(108, 'ID', 'INDO', 'Indonésie', 'Indonesia'),
(109, 'IR', 'IRAN', 'Iran', 'Iran, Islamic Republic of'),
(110, 'IQ', 'IRAQ', 'Iraq', 'Iraq'),
(111, 'IE', 'IRLA', 'Irlande', 'Ireland'),
(112, 'IS', 'ISLA', 'Islande', 'Iceland'),
(113, 'IL', 'ISRA', 'Israël', 'Israel'),
(114, 'IT', 'ITAL', 'Italie', 'Italy'),
(115, 'JM', 'JAMA', 'Jamaïque', 'Jamaica'),
(116, 'JP', 'JAPO', 'Japon', 'Japan'),
(117, 'JO', 'JORD', 'Jordanie', 'Jordan'),
(118, 'KZ', 'KAZA', 'Kazakhstan', 'Kazakhstan'),
(119, 'KE', 'KNYA', 'Kenya', 'Kenya'),
(120, 'KG', 'KIRG', 'Kirghizistan', 'Kyrgyzstan'),
(121, 'KI', 'KIRI', 'Kiribati', 'Kiribati'),
(122, 'KW', 'KWEI', 'Koweït', 'Kuwait'),
(123, 'LA', 'LAOS', 'Laos', 'Lao People s Democratic Republic'),
(124, 'LS', 'LESO', 'Lesotho', 'Lesotho'),
(125, 'LV', 'LETT', 'Lettonie', 'Latvia'),
(126, 'LB', 'LIBA', 'Liban', 'Lebanon'),
(127, 'LR', 'LIBE', 'Liberia', 'Liberia'),
(128, 'LY', 'LIBY', 'Libye', 'Libyan Arab Jamahiriya'),
(129, 'LI', 'LIEC', 'Liechtenstein', 'Liechtenstein'),
(130, 'LT', 'LITU', 'Lituanie', 'Lithuania'),
(131, 'LU', 'LUXE', 'Luxembourg', 'Luxembourg'),
(132, 'MO', 'MACA', 'Macao', 'Macao, (China)'),
(133, 'MG', 'MADA', 'Madagascar', 'Madagascar'),
(134, 'MY', 'MALA', 'Malaisie', 'Malaysia'),
(135, 'MW', 'MALW', 'Malawi', 'Malawi'),
(136, 'MV', 'MALD', 'Maldives', 'Maldives'),
(137, 'ML', 'MALI', 'Mali', 'Mali'),
(138, 'MT', 'MALT', 'Malte', 'Malta'),
(139, 'MP', 'MARI', 'Mariannes du Nord', 'Northern Mariana Islands'),
(140, 'MA', 'MARO', 'Maroc', 'Morocco'),
(141, 'MQ', 'MART', 'Martinique', 'Martinique'),
(142, 'MU', 'MAUC', 'Maurice', 'Mauritius'),
(143, 'MR', 'MAUR', 'Mauritanie', 'Mauritania'),
(144, 'YT', 'MAYO', 'Mayotte', 'Mayotte'),
(145, 'MX', 'MEXI', 'Mexique', 'Mexico'),
(146, 'FM', 'MICR', 'Micronésie', 'Micronesia, Federated States of'),
(147, 'MD', 'MOLD', 'Moldavie', 'Moldova, Republic of'),
(148, 'MC', 'MONA', 'Monaco', 'Monaco'),
(149, 'MN', 'MONG', 'Mongolie', 'Mongolia'),
(150, 'MS', 'MONS', 'Montserrat', 'Montserrat'),
(151, 'MZ', 'MOZA', 'Mozambique', 'Mozambique'),
(152, 'NP', 'NEPA', 'Népal', 'Nepal'),
(153, 'NA', 'NAMI', 'Namibie', 'Namibia'),
(154, 'NR', 'NAUR', 'Nauru', 'Nauru'),
(155, 'NI', 'NICA', 'Nicaragua', 'Nicaragua'),
(156, 'NE', 'NIGE', 'Niger', 'Niger'),
(157, 'NG', 'NIGA', 'Nigeria', 'Nigeria'),
(158, 'NU', 'NIOU', 'Nioué', 'Niue'),
(159, 'NO', 'NORV', 'Norvège', 'Norway'),
(160, 'NC', 'NOUC', 'Nouvelle-Calédonie', 'New Caledonia'),
(161, 'NZ', 'NOUZ', 'Nouvelle-Zélande', 'New Zealand'),
(162, 'OM', 'OMAN', 'Oman', 'Oman'),
(163, 'UG', 'OUGA', 'Ouganda', 'Uganda'),
(164, 'UZ', 'OUZE', 'Ouzbékistan', 'Uzbekistan'),
(165, 'PE', 'PERO', 'Pérou', 'Peru'),
(166, 'PK', 'PAKI', 'Pakistan', 'Pakistan'),
(167, 'PA', 'PANA', 'Panama', 'Panama'),
(168, 'PG', 'PAPU', 'Papouasie-Nouvelle-Guinée', 'Papua New Guinea'),
(169, 'PY', 'PARA', 'Paraguay', 'Paraguay'),
(170, 'NL', 'PBAS', 'pays-Bas', 'Netherlands'),
(171, 'PH', 'PHIL', 'Philippines', 'Philippines'),
(172, 'PL', 'POLO', 'Pologne', 'Poland'),
(173, 'PF', 'POLY', 'Polynésie française', 'French Polynesia'),
(174, 'PR', 'RICO', 'Porto Rico', 'Puerto Rico'),
(175, 'PT', 'PORT', 'Portugal', 'Portugal'),
(176, 'QA', 'QATA', 'Qatar', 'Qatar'),
(177, 'CF', 'CAFR', 'République centrafricaine', 'Central African Republic'),
(178, 'CD', 'CONG', 'République démocratique du Congo', 'Congo, Democratic Rep. of the'),
(179, 'DO', 'DOMI', 'République dominicaine', 'Dominican Republic'),
(180, 'CZ', 'TCHE', 'République tchèque', 'Czech Republic'),
(181, 'RE', 'REUN', 'Réunion', 'Reunion'),
(182, 'RO', 'ROUM', 'Roumanie', 'Romania'),
(183, 'GB', 'MIQU', 'Royaume-Uni', 'Saint Pierre and Miquelon'),
(184, 'RU', 'RUSS', 'Russie', 'Russia (Russian Federation)'),
(185, 'RW', 'RWAN', 'Rwanda', 'Rwanda'),
(186, 'SN', 'SENE', 'Sénégal', 'Senegal'),
(187, 'EH', 'SAHA', 'Sahara occidental', 'Western Sahara'),
(188, 'KN', 'NIEV', 'Saint-Christophe-et-Niévès', 'Saint Kitts and Nevis'),
(189, 'SM', 'SMAR', 'Saint-Marin', 'San Marino'),
(190, 'PM', 'SPIE', 'Saint-Pierre-et-Miquelon', 'Saint Pierre and Miquelon'),
(191, 'VA', 'SSIE', 'Saint-Siège ', 'Vatican City State (Holy See)'),
(192, 'VC', 'SVIN', 'Saint-Vincent-et-les-Grenadines', 'Saint Vincent and the Grenadines'),
(193, 'SH', 'SLN_', 'Sainte-Hélène', 'Saint Helena'),
(194, 'LC', 'SLUC', 'Sainte-Lucie', 'Saint Lucia'),
(195, 'SV', 'SALV', 'Salvador', 'El Salvador'),
(196, 'WS', 'SAMO', 'Samoa', 'Samoa'),
(197, 'AS', 'SAMA', 'Samoa américaines', 'American Samoa'),
(198, 'ST', 'TOME', 'Sao Tomé-et-Principe', 'Sao Tome and Principe'),
(199, 'SC', 'SEYC', 'Seychelles', 'Seychelles'),
(200, 'SL', 'LEON', 'Sierra Leone', 'Sierra Leone'),
(201, 'SG', 'SING', 'Singapour', 'Singapore'),
(202, 'SI', 'SLOV', 'Slovénie', 'Slovenia'),
(203, 'SK', 'SLOQ', 'Slovaquie', 'Slovakia'),
(204, 'SO', 'SOMA', 'Somalie', 'Somalia'),
(205, 'SD', 'SOUD', 'Soudan', 'Sudan'),
(206, 'LK', 'SRIL', 'Sri Lanka', 'Sri Lanka (ex-Ceilan)'),
(207, 'SE', 'SUED', 'Suède', 'Sweden'),
(208, 'CH', 'SUIS', 'Suisse', 'Switzerland'),
(209, 'SR', 'SURI', 'Suriname', 'Suriname'),
(210, 'SZ', 'SWAZ', 'Swaziland', 'Swaziland'),
(211, 'SY', 'SYRI', 'Syrie', 'Syrian Arab Republic'),
(212, 'TW', 'TAIW', 'Taïwan', 'Taiwan'),
(213, 'TJ', 'TADJ', 'Tadjikistan', 'Tajikistan'),
(214, 'TZ', 'TANZ', 'Tanzanie', 'Tanzania, United Republic of'),
(215, 'TD', 'TCHA', 'Tchad', 'Chad'),
(216, 'TF', 'TERR', 'Terres australes françaises', 'French Southern Territories - TF'),
(217, 'IO', 'BOIN', 'Territoire britannique de l Océan Indien', 'British Indian Ocean Territory'),
(218, 'TH', 'THAI', 'Thaïlande', 'Thailand'),
(219, 'TL', 'TIMO', 'Timor Oriental', 'Timor-Leste (East Timor)'),
(220, 'TG', 'TOGO', 'Togo', 'Togo'),
(221, 'TK', 'TOKE', 'Tokélaou', 'Tokelau'),
(222, 'TO', 'TONG', 'Tonga', 'Tonga'),
(223, 'TT', 'TOBA', 'Trinité-et-Tobago', 'Trinidad & Tobago'),
(224, 'TN', 'TUNI', 'Tunisie', 'Tunisia'),
(225, 'TM', 'TURK', 'Turkménistan', 'Turkmenistan'),
(226, 'TR', 'TURQ', 'Turquie', 'Turkey'),
(227, 'TV', 'TUVA', 'Tuvalu', 'Tuvalu'),
(228, 'UA', 'UKRA', 'Ukraine', 'Ukraine'),
(229, 'UY', 'URUG', 'Uruguay', 'Uruguay'),
(230, 'VU', 'VANU', 'Vanuatu', 'Vanuatu'),
(231, 'VE', 'VENE', 'Venezuela', 'Venezuela'),
(232, 'VN', 'VIET', 'Viêt Nam', 'Viet Nam'),
(233, 'WF', 'WALI', 'Wallis-et-Futuna', 'Wallis and Futuna'),
(234, 'YE', 'YEME', 'Yémen', 'Yemen'),
(235, 'YU', 'YOUG', 'Yougoslavie', 'Saint Pierre and Miquelon'),
(236, 'ZM', 'ZAMB', 'Zambie', 'Zambia'),
(237, 'ZW', 'ZIMB', 'Zimbabwe', 'Zimbabwe'),
(238, 'MK', 'MACE', 'ex-République yougoslave de Macédoine', 'Macedonia, TFYR');

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Login` char(30) NOT NULL,
  `Pass` char(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `LastName` char(30) DEFAULT NULL,
  `FirstName` char(30) DEFAULT NULL,
  `EMail` char(50) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`Login`,`Pass`),
  KEY `USER_FK` (`Login`,`Pass`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`Login`, `Pass`, `LastName`, `FirstName`, `EMail`, `admin`) VALUES
('Admin', '$2y$10$E5vhWNQa5893y3ZmZu4QD.d.wk1KE.mPVyPZ59hFhL9jHH2ajI.bW', 'Admin', 'Admin', 'Admin@Admin', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `angle`
--
ALTER TABLE `angle`
  ADD CONSTRAINT `FK_ASSOCIATION_6` FOREIGN KEY (`NumLang`) REFERENCES `langue` (`NumLang`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_ASSOCIATION_1` FOREIGN KEY (`NumAngl`) REFERENCES `angle` (`NumAngl`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_ASSOCIATION_2` FOREIGN KEY (`NumThem`) REFERENCES `thematique` (`NumThem`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_ASSOCIATION_3` FOREIGN KEY (`NumLang`) REFERENCES `langue` (`NumLang`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_ASSOCIATION_7` FOREIGN KEY (`NumArt`) REFERENCES `article` (`NumArt`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `motcle`
--
ALTER TABLE `motcle`
  ADD CONSTRAINT `FK_ASSOCIATION_5` FOREIGN KEY (`NumLang`) REFERENCES `langue` (`NumLang`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `motclearticle`
--
ALTER TABLE `motclearticle`
  ADD CONSTRAINT `FK_MotCleArt1` FOREIGN KEY (`NumMoCle`) REFERENCES `motcle` (`NumMoCle`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_MotCleArt2` FOREIGN KEY (`NumArt`) REFERENCES `article` (`NumArt`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `thematique`
--
ALTER TABLE `thematique`
  ADD CONSTRAINT `FK_ASSOCIATION_4` FOREIGN KEY (`NumLang`) REFERENCES `langue` (`NumLang`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
