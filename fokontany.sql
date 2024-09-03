-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 20 mars 2024 à 18:02
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fokontany`
--

-- --------------------------------------------------------

--
-- Structure de la table `adidy`
--

CREATE TABLE `adidy` (
  `idadidy` int(11) NOT NULL,
  `idkarine` int(11) NOT NULL,
  `prix` text NOT NULL,
  `ans` date NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `pseudoadmin` text NOT NULL,
  `mdpadmin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`idadmin`, `pseudoadmin`, `mdpadmin`) VALUES
(2, 'Cecilien', '12345'),
(3, 'solofoson', '12');

-- --------------------------------------------------------

--
-- Structure de la table `ankohonana`
--

CREATE TABLE `ankohonana` (
  `idankohonana` int(11) NOT NULL,
  `idkarine` int(11) NOT NULL,
  `idusers` int(11) NOT NULL,
  `idfokontany` int(11) NOT NULL,
  `sarampisoratana` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ankohonana`
--

INSERT INTO `ankohonana` (`idankohonana`, `idkarine`, `idusers`, `idfokontany`, `sarampisoratana`, `date`) VALUES
(19, 32, 55, 14, 'Voaloha', '2024-03-19 01:30:44'),
(20, 33, 57, 14, 'Voaloha', '2024-03-20 16:54:42');

-- --------------------------------------------------------

--
-- Structure de la table `boriborintany`
--

CREATE TABLE `boriborintany` (
  `idboribory` int(11) NOT NULL,
  `distrika` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `boriborintany`
--

INSERT INTO `boriborintany` (`idboribory`, `distrika`) VALUES
(14, 'AMBATONDRAZAKA'),
(15, 'AMPARAFARAVOLA'),
(16, 'ANDILAMENA'),
(17, 'ANOSIBE AN ALA'),
(18, 'MORAMANGA'),
(19, 'AMBATOFINANDRAHANA'),
(20, 'AMBOSITRA'),
(21, 'FANDRIANA'),
(22, 'MANANDRIANA'),
(23, 'Ambohidratrimo'),
(24, 'Andramasina'),
(25, '\r\nAnjozorobe\r\n'),
(26, 'Ankazobe'),
(27, 'Antananarivo Atsimondrano'),
(28, 'Antananarivo Avaradrano'),
(29, 'Antananarivo-I'),
(30, ' Antananarivo-II'),
(31, 'Antananarivo-III'),
(32, 'Antananarivo-IV'),
(33, 'Antananarivo-V'),
(34, 'Antananarivo-VI'),
(35, 'Manjakandriana'),
(36, 'FENERIVE EST'),
(37, ' MANANARA-NORD'),
(38, 'MAROANTSETRA'),
(39, 'SAINTE MARIE'),
(40, 'SOANIERANA IVONGO'),
(41, ' VAVATENINA'),
(42, 'AMBOVOMBE ANDROY'),
(43, 'BEKILY'),
(44, ' BELOHA ANDROY'),
(45, 'TSIHOMBE'),
(46, ' AMBOASARY SUD'),
(47, ' BETROKA'),
(48, 'TAOLANARO'),
(49, ' AMPANIHY OUEST'),
(50, ' ANKAZOABO SUD'),
(51, ' BENENITRA'),
(52, ' BEROROHA'),
(53, ' BETIOKY SUD'),
(54, 'MOROMBE'),
(55, ' SAKARAHA'),
(56, 'TOLIARY I'),
(57, 'TOLIARY II'),
(58, ' BEFOTAKA ATSIMO'),
(59, 'FARAFANGANA'),
(60, 'MIDONGY SUD'),
(61, ' VANGAINDRANO'),
(62, 'VONDROZO'),
(63, 'ANTANAMBAO MANAMPO'),
(64, 'BRICKAVILLE'),
(65, 'MAHANORO'),
(66, 'MAROLAMBO'),
(67, 'TOAMASINA I'),
(68, 'TOAMASINA II'),
(69, 'VATOMANDRY'),
(70, 'KANDREHO'),
(71, 'MAEVATANANA'),
(72, 'TSARATANANA'),
(73, ' AMBATO BOENI'),
(74, 'MAHAJANGA I'),
(75, 'MAHAJANGA II'),
(76, ' MAROVOAY'),
(77, ' MITSINJO'),
(78, 'SOALALA'),
(79, 'FENOARIVOBE'),
(80, 'TSIROANOMANDIDY'),
(81, 'AMBANJA'),
(82, 'AMBILOBE'),
(83, 'ANTSIRANANA I'),
(84, 'ANTSIRANANA II'),
(85, ' NOSY-BE'),
(86, 'IKONGO'),
(87, ' MANAKARA'),
(88, ' VOHIPENO'),
(89, ' AMBALAVAO'),
(90, 'AMBOHIMAHASOA'),
(91, 'FIANARANTSOA'),
(92, 'IKALAMAVONY'),
(93, ' ISANDRA'),
(94, 'LALANGINA'),
(95, ' VOHIBATO'),
(96, 'IAKORA'),
(97, 'IHOSY'),
(98, ' IVOHIBE'),
(99, 'ARIVONIMAMO'),
(100, 'MIARINARIVO'),
(101, ' SOAVINANDRIANA'),
(102, 'AMBATOMAINTY'),
(103, 'ANTSALOVA'),
(104, ' BESALAMPY'),
(105, 'MAINTIRANO'),
(106, 'MORAFENOBE'),
(107, ' BELO SUR TSIRIBIHINA'),
(108, ' MAHABO'),
(109, ' MANJA'),
(110, 'MIANDRIVAZO'),
(111, 'MORONDAVA'),
(112, ' ANDAPA'),
(113, 'ANTALAHA'),
(114, ' SAMBAVA'),
(115, ' VOHEMAR'),
(116, 'ANALALAVA'),
(117, ' ANTSOHIHY'),
(118, ' BEALANANA'),
(119, 'BEFANDRIANA NORD'),
(120, 'MAMPIKONY'),
(121, 'MANDRITSARA'),
(122, 'PORT-BERGE'),
(123, ' AMBATOLAMPY'),
(124, 'ANTANIFOTSY'),
(125, ' ANTSIRABE I'),
(126, 'ANTSIRABE II'),
(127, ' BETAFO'),
(128, 'FARATSIHO'),
(129, ' MANDOTO'),
(130, ' IFANADIANA'),
(131, 'MANANJARY'),
(132, 'NOSY VARIKA');

-- --------------------------------------------------------

--
-- Structure de la table `distrika_kaominina`
--

CREATE TABLE `distrika_kaominina` (
  `iddistrika_kaominina` int(11) NOT NULL,
  `idboribory` int(11) NOT NULL,
  `idkaominina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `distrika_kaominina`
--

INSERT INTO `distrika_kaominina` (`iddistrika_kaominina`, `idboribory`, `idkaominina`) VALUES
(10, 27, 17),
(11, 28, 17),
(12, 29, 17),
(13, 30, 17),
(14, 31, 17),
(15, 32, 17),
(16, 33, 17),
(17, 34, 17),
(18, 73, 18),
(19, 74, 20),
(20, 78, 21),
(21, 73, 19),
(22, 14, 22),
(23, 19, 23),
(24, 65, 24),
(25, 42, 25),
(26, 47, 26),
(27, 56, 27),
(28, 58, 28),
(29, 67, 29),
(30, 71, 30),
(31, 80, 31),
(32, 81, 32),
(33, 87, 33),
(34, 91, 34),
(35, 97, 35),
(36, 99, 36),
(37, 105, 37),
(38, 110, 38),
(39, 86, 43),
(40, 115, 39),
(41, 121, 40),
(42, 125, 41),
(43, 131, 42);

-- --------------------------------------------------------

--
-- Structure de la table `faritra`
--

CREATE TABLE `faritra` (
  `idfaritra` int(11) NOT NULL,
  `nomfaritra` text NOT NULL,
  `saryregion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `faritra`
--

INSERT INTO `faritra` (`idfaritra`, `nomfaritra`, `saryregion`) VALUES
(1, ' ALAOTRA-MANGORO', 'OIP.jpg'),
(26, 'AMORON&#039;I MANIA', 'OIP1.jpg'),
(27, 'ANALAMANGA', 'belle-maison-architecte-couv.jpg'),
(28, ' ANALANJIROFO', 'Maison20contemporaine2010-1.jpg'),
(29, 'ANDROY', 'fkt10.jpg'),
(30, 'ANOSY', 'fkt9.jpg'),
(31, ' ATSIMO-ANDREFANA', '12.jpg'),
(32, 'ATSIMO-ATSINANANA', '13.jpg'),
(33, 'ATSINANANA', '16.jpg'),
(34, 'BETSIBOKA', '17.jpg'),
(35, ' BOENY', '18.jpg'),
(36, 'BONGOLAVA', '20.jpg'),
(37, 'DIANA', '21.jpg'),
(38, 'FITOVINANY', '22.jpg'),
(39, ' HAUTE MATSIATRA', '23.jpg'),
(40, 'IHOROMBE', '24.jpg'),
(41, 'ITASY', '25.jpg'),
(42, 'MELAKY', '26.jpg'),
(43, 'MENABE', 'sary.jpg'),
(44, 'SAVA', 'thumb-1920-682311.jpg'),
(45, 'SOFIA', '19.jpg'),
(46, 'VAKINANKARATRA', '28.jpg'),
(47, 'VATOVAVY', 'thumb-1920-288367.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `fokontany`
--

CREATE TABLE `fokontany` (
  `idfokontany` int(11) NOT NULL,
  `nomfokontany` text NOT NULL,
  `saryfokontany` text NOT NULL,
  `iddistrika_kaominina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fokontany`
--

INSERT INTO `fokontany` (`idfokontany`, `nomfokontany`, `saryfokontany`, `iddistrika_kaominina`) VALUES
(7, 'Ambanidia-faliarivo', 'fkt1.jpg', 13),
(8, 'Ambanidia-miandrarivo', 'fkt2.jpg', 13),
(9, 'Ambanidia-volosarika', 'fkt3.jpg', 13),
(10, 'Ambatoroka', 'fkt4.jpg', 13),
(11, 'Tsiadana', 'fkt5.jpg', 13),
(12, 'Ankazotokana ambony', 'fkt6.jpg', 13),
(13, 'Mahajanga ville', 'fkt7.jpg', 19),
(14, 'Ambohimandamina', 'fkt8.jpg', 19),
(15, 'Antanimalandy', 'fkt9.jpg', 19),
(16, 'Ambondrona', 'fkt10.jpg', 19);

-- --------------------------------------------------------

--
-- Structure de la table `kaominina`
--

CREATE TABLE `kaominina` (
  `idkaominina` int(11) NOT NULL,
  `nomkaominina` text NOT NULL,
  `idfaritra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `kaominina`
--

INSERT INTO `kaominina` (`idkaominina`, `nomkaominina`, `idfaritra`) VALUES
(17, 'Antananarivo', 27),
(18, 'Ambatoboeny', 35),
(19, 'Sitampiky', 35),
(20, 'MAHAJANGA', 35),
(21, 'SOALALA', 35),
(22, 'AMBATONDRAZAKA', 1),
(23, 'AMBATOFINANDRAHANA', 26),
(24, 'MAHANORO', 28),
(25, 'AMBOVOMBE ANDROY', 29),
(26, 'BETROKA', 30),
(27, 'TOLIARA I', 31),
(28, 'ANTANINARENINA', 32),
(29, 'CU TOAMASINA', 33),
(30, 'AMBALAJIA', 34),
(31, 'AMBALANIRANA', 36),
(32, 'AMBALAHONKO', 37),
(33, 'AMBAHATRAZO', 38),
(34, 'CU FIANARANTSOA', 39),
(35, 'AMBATOLAHY', 40),
(36, 'ALAKAMISIKELY', 41),
(37, 'MAINTIRANO', 42),
(38, 'MIANDRIVAZO', 43),
(39, 'VOHEMAR', 44),
(40, 'AMBALAKIRAJY', 45),
(41, 'ANTSIRABE', 46),
(42, 'AMBALAHOSY NORD', 47),
(43, 'AMBATOFOTSY', 38);

-- --------------------------------------------------------

--
-- Structure de la table `karine`
--

CREATE TABLE `karine` (
  `idkarine` int(11) NOT NULL,
  `laharanakarine` text NOT NULL,
  `idfokontany` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `karine`
--

INSERT INTO `karine` (`idkarine`, `laharanakarine`, `idfokontany`) VALUES
(32, '001', 14),
(33, '002', 14),
(34, '003', 14);

-- --------------------------------------------------------

--
-- Structure de la table `payment`
--

CREATE TABLE `payment` (
  `idpayment` int(11) NOT NULL,
  `saranyf` text NOT NULL,
  `adidy` text NOT NULL,
  `sazy` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `payment`
--

INSERT INTO `payment` (`idpayment`, `saranyf`, `adidy`, `sazy`) VALUES
(1, '4000', '2500', '10000');

-- --------------------------------------------------------

--
-- Structure de la table `publications`
--

CREATE TABLE `publications` (
  `idpublication` int(11) NOT NULL,
  `idfokontany` int(11) NOT NULL,
  `publication` text NOT NULL,
  `datepublication` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `publications`
--

INSERT INTO `publications` (`idpublication`, `idfokontany`, `publication`, `datepublication`) VALUES
(12, 14, 'Ilazana Isika fa misy fanadiovana faobe amin&#039;izao zoma 22/03/24 hoavy izao, manentana anstika rehetra mba ho tonga, izay tsy tonga dia tsy maintsy mandoa sazy 10.000 ariary. Misaotra Tompoka', '2024-03-19 01:59:41');

-- --------------------------------------------------------

--
-- Structure de la table `sazy`
--

CREATE TABLE `sazy` (
  `idsazy` int(11) NOT NULL,
  `idkarine` int(11) NOT NULL,
  `presence` text NOT NULL,
  `motif` text NOT NULL,
  `date` date NOT NULL,
  `datecur` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `sektera`
--

CREATE TABLE `sektera` (
  `idsektera` int(11) NOT NULL,
  `nomsektera` text NOT NULL,
  `idfokontany` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sektera`
--

INSERT INTO `sektera` (`idsektera`, `nomsektera`, `idfokontany`) VALUES
(56, 'Secteur I', 14),
(57, 'Secteur II', 14),
(58, 'Secteur III', 14);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idusers` int(11) NOT NULL,
  `idfokontany` int(11) NOT NULL,
  `idsektera` int(11) DEFAULT NULL,
  `finday` text DEFAULT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `ddn` date NOT NULL,
  `ddnlieux` text NOT NULL,
  `rayniteraka` text NOT NULL,
  `renyniterak` text NOT NULL,
  `cin` text DEFAULT NULL,
  `cindate` date DEFAULT NULL,
  `cinlieux` text DEFAULT NULL,
  `sary` text DEFAULT NULL,
  `pasipaoronum` text DEFAULT NULL,
  `pasipaorolieux` text DEFAULT NULL,
  `pasipaorodelai` text DEFAULT NULL,
  `adiresy` text NOT NULL,
  `asaatao` text DEFAULT NULL,
  `toeranaantrano` text DEFAULT NULL,
  `safidy` text DEFAULT NULL,
  `sexe` text NOT NULL,
  `mdp` text DEFAULT NULL,
  `statut` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `numkarine` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idusers`, `idfokontany`, `idsektera`, `finday`, `nom`, `prenom`, `ddn`, `ddnlieux`, `rayniteraka`, `renyniterak`, `cin`, `cindate`, `cinlieux`, `sary`, `pasipaoronum`, `pasipaorolieux`, `pasipaorodelai`, `adiresy`, `asaatao`, `toeranaantrano`, `safidy`, `sexe`, `mdp`, `statut`, `date`, `numkarine`) VALUES
(1, 7, NULL, '3444', 'RABARINIRINA', 'Emile ', '1989-06-15', 'Antananarivo', 'RABARINIRINA Emilien', 'Marie Claire', '12345', '2011-10-26', 'Antananarivo', 'president6.png', NULL, NULL, NULL, 'LOTVT NKA AMBANIDIA-FALIARIVO', 'Tantsaha', NULL, NULL, 'Lahy', 'jkd9Dw==', 'Filoham-pokontany', '2024-03-18 23:47:13', NULL),
(2, 8, NULL, '5443', 'NOMENJANAHARY', 'Julien', '1991-07-26', 'Antanannarivo', 'NOMENJANAHARY Jean', 'Claire', '2345', '1978-11-10', 'Antananarivo', 'president7.jpg', NULL, NULL, NULL, 'LOTNG AMBANIDIA-MIANDRARIVO', 'Tantsaha', NULL, NULL, 'Lahy', 'jkd9', 'Filoham-pokontany', '2024-03-19 00:02:28', NULL),
(47, 9, NULL, '2234', 'RAKOTONIRINA', 'Jean Aim&eacute;e', '1997-08-02', 'Antananarivo', 'RAKOTONIRINA Boby', 'Soary', '123456', '2024-03-15', 'Antananarivo', 'president8.jpeg', NULL, NULL, NULL, 'LOTN AMBANIDIA', 'Tantsaha', NULL, NULL, 'Lahy', 'jkd9', 'Filoham-pokontany', '2024-03-19 00:06:25', NULL),
(48, 10, NULL, '234', 'LAHINIRIKO', 'Bernard', '1990-07-20', 'Antananarivo', 'LAHINIRIKO Rakoto', 'Soazara', '54360', '2011-06-25', 'Antananarivo', 'president9.jpg', NULL, NULL, NULL, 'LOTGH AMBATAOROKA', 'Tantsaha', NULL, NULL, 'Lahy', 'jkd9', 'Filoham-pokontany', '2024-03-19 00:09:56', NULL),
(49, 11, NULL, '2333', 'ZAKANDRINA', 'Jos&eacute;', '1992-07-09', 'Antananarivo', 'ZAKA Rainibe', 'Marie Jeanne', '12512', '2012-11-22', 'Antananarivo', 'president10.jpg', NULL, NULL, NULL, 'LOT VTY TSIADANA', 'Tantsaha', NULL, NULL, 'Lahy', 'jkd9', 'Filoham-pokontany', '2024-03-19 00:13:22', NULL),
(50, 12, NULL, '123', 'NOMENA', 'Bella', '1993-03-18', 'Antananarivo', 'NOMENJANAHARY Emile', 'Emile Claire', '123251', '2014-06-05', 'Antananarivo', 'president2.jpg', NULL, NULL, NULL, 'LOTYU ANKAZOTOKANA-AMBONY', 'Tantsaha', NULL, NULL, 'Vavy', 'jkd9', 'Filoham-pokontany', '2024-03-19 00:16:39', NULL),
(51, 13, NULL, '1234', 'ZAKANDRINA', 'Lolita', '1996-11-22', 'Mahajanga', 'ZAKANDRINA', 'Marie Emilia', '15290', '2015-06-19', 'Mahajanga', 'president1.jpg', NULL, NULL, NULL, 'LOTH MAHAJANGA VILLE', 'Tantsaha', NULL, NULL, 'Vavy', 'jkd9', 'Filoham-pokontany', '2024-03-19 00:19:44', NULL),
(52, 14, NULL, '23444', 'ANDRIANIRINA', 'Cynthia', '1993-03-13', 'Mahajanga', 'ANDRIANIRINA Richard', 'Jeannette', '56120', '2014-07-17', 'Mahajanga', 'user7.jpg', NULL, NULL, NULL, 'LOTF AMBOHIMANDAMINA', 'Tantsaha', NULL, NULL, 'Vavy', 'jkd9', 'Filoham-pokontany', '2024-03-19 00:22:50', NULL),
(53, 15, NULL, '1233', 'RAFIDIMANANA', 'Ariel', '1992-07-03', 'Mahajanga', 'RAFIDIMANANA Arnaud', 'Soazara', '12124', '2019-10-18', 'Mahajanga', 'president4.jpg', NULL, NULL, NULL, 'LOT GG ANTANIMALANDY', 'Tantsaha', NULL, NULL, 'Vavy', 'jkd9', 'Filoham-pokontany', '2024-03-19 00:26:46', NULL),
(54, 16, NULL, '888', 'RAZANAKOTO', 'Lafatra', '1992-06-11', 'Mahajanga', 'RAZANAKOTO Dede', 'Zakiliny', '9876', '2013-06-13', 'Mahajanga', 'president5.jpg', NULL, NULL, NULL, 'LOTD AMBONDRONA', 'Tantsaha', NULL, NULL, 'Vavy', 'jkd9', 'Filoham-pokontany', '2024-03-19 00:30:08', NULL),
(55, 14, 56, '2334', 'NOMENJANAHARY', 'Nomena', '2003-02-05', 'Antananarivo', 'NOMENJANAHARY Bera', 'Marie Claire', '34566', '2021-11-26', 'Antananarivo', 'user13.jpg', '', '', '', 'Lot vtb Ambohimandamina', 'Tantsaha', 'Loham-pianakaviana', 'Tompon-trano', 'Lahy', 'jkd9', 'Mponina', '2024-03-19 01:30:13', NULL),
(56, 14, 56, '0324556789', 'RAKOTO', 'NDRINA', '1989-07-07', 'MAHAJANGA', 'NDRINA', 'RABAROELINA', '987654322342', '2013-02-06', 'MAHAJANGA', '15.jpg', '', '', '', 'LOT VTNK ZER', 'TANTSA', 'Miaramonina', 'Tompon-trano', 'Lahy', 'jkd9Dy7rr+DN', 'Vaovao', '2024-03-20 16:34:34', NULL),
(57, 14, 57, '0346789021', 'BOTRALAHY', 'Stella', '2003-04-15', 'Sitampiky', 'BOTRALAHY Solofoson', 'Cecilia Natsa', '098765432123', '2022-07-14', 'MAHAJANGA', 'DSC04215.jpg', '', '', '', 'LOT VTNK ZER', 'Mpianatra', 'Zanaka', 'Mpanofa', 'Vavy', 'jkd9Dy7squvAhA==', 'Mponina', '2024-03-20 16:45:24', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adidy`
--
ALTER TABLE `adidy`
  ADD PRIMARY KEY (`idadidy`),
  ADD KEY `idkarine` (`idkarine`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Index pour la table `ankohonana`
--
ALTER TABLE `ankohonana`
  ADD PRIMARY KEY (`idankohonana`),
  ADD KEY `idkarine` (`idkarine`),
  ADD KEY `idusers` (`idusers`),
  ADD KEY `idfokontany` (`idfokontany`);

--
-- Index pour la table `boriborintany`
--
ALTER TABLE `boriborintany`
  ADD PRIMARY KEY (`idboribory`);

--
-- Index pour la table `distrika_kaominina`
--
ALTER TABLE `distrika_kaominina`
  ADD PRIMARY KEY (`iddistrika_kaominina`),
  ADD KEY `idboribory` (`idboribory`),
  ADD KEY `idkaominina` (`idkaominina`);

--
-- Index pour la table `faritra`
--
ALTER TABLE `faritra`
  ADD PRIMARY KEY (`idfaritra`);

--
-- Index pour la table `fokontany`
--
ALTER TABLE `fokontany`
  ADD PRIMARY KEY (`idfokontany`),
  ADD KEY `iddistrika_kaominina` (`iddistrika_kaominina`);

--
-- Index pour la table `kaominina`
--
ALTER TABLE `kaominina`
  ADD PRIMARY KEY (`idkaominina`),
  ADD KEY `idfaritra` (`idfaritra`);

--
-- Index pour la table `karine`
--
ALTER TABLE `karine`
  ADD PRIMARY KEY (`idkarine`),
  ADD KEY `idfokontany` (`idfokontany`);

--
-- Index pour la table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`idpayment`);

--
-- Index pour la table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`idpublication`),
  ADD KEY `idfokontany` (`idfokontany`);

--
-- Index pour la table `sazy`
--
ALTER TABLE `sazy`
  ADD PRIMARY KEY (`idsazy`),
  ADD KEY `idkarine` (`idkarine`);

--
-- Index pour la table `sektera`
--
ALTER TABLE `sektera`
  ADD PRIMARY KEY (`idsektera`),
  ADD KEY `idfokontany` (`idfokontany`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`),
  ADD KEY `idfokontany` (`idfokontany`),
  ADD KEY `idsektera` (`idsektera`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adidy`
--
ALTER TABLE `adidy`
  MODIFY `idadidy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `ankohonana`
--
ALTER TABLE `ankohonana`
  MODIFY `idankohonana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `boriborintany`
--
ALTER TABLE `boriborintany`
  MODIFY `idboribory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT pour la table `distrika_kaominina`
--
ALTER TABLE `distrika_kaominina`
  MODIFY `iddistrika_kaominina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `faritra`
--
ALTER TABLE `faritra`
  MODIFY `idfaritra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `fokontany`
--
ALTER TABLE `fokontany`
  MODIFY `idfokontany` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `kaominina`
--
ALTER TABLE `kaominina`
  MODIFY `idkaominina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `karine`
--
ALTER TABLE `karine`
  MODIFY `idkarine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `payment`
--
ALTER TABLE `payment`
  MODIFY `idpayment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `publications`
--
ALTER TABLE `publications`
  MODIFY `idpublication` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `sazy`
--
ALTER TABLE `sazy`
  MODIFY `idsazy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `sektera`
--
ALTER TABLE `sektera`
  MODIFY `idsektera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adidy`
--
ALTER TABLE `adidy`
  ADD CONSTRAINT `adidy_ibfk_1` FOREIGN KEY (`idkarine`) REFERENCES `karine` (`idkarine`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ankohonana`
--
ALTER TABLE `ankohonana`
  ADD CONSTRAINT `ankohonana_ibfk_1` FOREIGN KEY (`idkarine`) REFERENCES `karine` (`idkarine`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ankohonana_ibfk_2` FOREIGN KEY (`idusers`) REFERENCES `users` (`idusers`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ankohonana_ibfk_3` FOREIGN KEY (`idfokontany`) REFERENCES `fokontany` (`idfokontany`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `distrika_kaominina`
--
ALTER TABLE `distrika_kaominina`
  ADD CONSTRAINT `distrika_kaominina_ibfk_2` FOREIGN KEY (`idboribory`) REFERENCES `boriborintany` (`idboribory`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `distrika_kaominina_ibfk_3` FOREIGN KEY (`idkaominina`) REFERENCES `kaominina` (`idkaominina`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `fokontany`
--
ALTER TABLE `fokontany`
  ADD CONSTRAINT `fokontany_ibfk_1` FOREIGN KEY (`iddistrika_kaominina`) REFERENCES `distrika_kaominina` (`iddistrika_kaominina`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `kaominina`
--
ALTER TABLE `kaominina`
  ADD CONSTRAINT `kaominina_ibfk_1` FOREIGN KEY (`idfaritra`) REFERENCES `faritra` (`idfaritra`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `karine`
--
ALTER TABLE `karine`
  ADD CONSTRAINT `karine_ibfk_1` FOREIGN KEY (`idfokontany`) REFERENCES `fokontany` (`idfokontany`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `publications`
--
ALTER TABLE `publications`
  ADD CONSTRAINT `publications_ibfk_1` FOREIGN KEY (`idfokontany`) REFERENCES `fokontany` (`idfokontany`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `sazy`
--
ALTER TABLE `sazy`
  ADD CONSTRAINT `sazy_ibfk_1` FOREIGN KEY (`idkarine`) REFERENCES `karine` (`idkarine`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idfokontany`) REFERENCES `fokontany` (`idfokontany`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`idsektera`) REFERENCES `sektera` (`idsektera`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
