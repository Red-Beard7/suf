/**
  Counties
*/
INSERT INTO `counties`(`id`,`name`) VALUES (1,'Mombasa'),(2,'Kwale'),(3,'Kilifi'),(4,'Tana River'),(5,'Lamu'),(6,'Taita-Taveta'),(7,'Garissa'),(8,'Wajir'),(9,'Mandera'),(10,'Marsabit'),(11,'Isiolo'),(12,'Meru'),(13,'Tharaka-Nithi'),(14,'Embu'),(15,'Kitui'),(16,'Machakos'),(17,'Makueni'),(18,'Nyandarua'),(19,'Nyeri'),(20,'Kirinyaga'),(21,'Murang\'a'),(22,'Kiambu'),(23,'Turkana'),(24,'West Pokot'),(25,'Samburu'),(26,'Trans-Nzoia'),(27,'Uasin Gishu'),(28,'Elgeyo-Marakwet'),(29,'Nandi'),(30,'Baringo'),(31,'Laikipia'),(32,'Nakuru'),(33,'Narok'),(34,'Kajiado'),(35,'Kericho'),(36,'Bomet'),(37,'Kakamega'),(38,'Vihiga'),(39,'Bungoma'),(40,'Busia'),(41,'Siaya'),(42,'Kisumu'),(43,'Homa Bay'),(44,'Migori'),(45,'Kisii'),(46,'Nyamira'),(47,'Nairobi');


/**
  Sub-Counties
*/
INSERT  INTO `sub_counties`(`id`,`county_id`,`name`) VALUES
(1,1,'CHANGAMWE \r'),
(2,1,'JOMVU \r'),
(3,1,'KISAUNI \r'),
(4,1,'LIKONI \r'),
(5,1,'MVITA (MOMBASA) \r'),
(6,1,'NYALI \r'),
(7,2,'KINANGO \r'),
(8,2,'KWALE \r'),
(9,2,'LUNGA LUNGA \r'),
(10,2,'MSAMBWENI \r'),
(11,3,'BAHARI (KILIFI) \r'),
(12,3,'GANZE \r'),
(13,3,'KALOLENI \r'),
(14,3,'KILIFI SOUTH \r'),
(15,3,'MAGARINI \r'),
(16,3,'MALINDI \r'),
(17,3,'RABAI \r'),
(18,4,'BURA (TANA NORTH) \r'),
(19,4,'TANA DELTA \r'),
(20,4,'TANA RIVER \r'),
(21,5,'LAMU EAST \r'),
(22,5,'LAMU WEST \r'),
(23,6,'MWATATE \r'),
(24,6,'TAVETA \r'),
(25,6,'VOI \r'),
(26,6,'WUNDANYI (TAITA) \r'),
(27,7,'BALAMBALA \r'),
(28,7,'DADAAB \r'),
(29,7,'FAFI \r'),
(30,7,'GARISSA \r'),
(31,7,'HULUGHO \r'),
(32,7,'IJARA \r'),
(33,7,'LAGDERA \r'),
(34,8,'BUNA \r'),
(35,8,'ELDAS \r'),
(36,8,'HABASWEIN \r'),
(37,8,'TARBAJ \r'),
(38,8,'WAJIR EAST \r'),
(39,8,'WAJIR NORTH \r'),
(40,8,'WAJIR SOUTH \r'),
(41,8,'WAJIR WEST \r'),
(42,9,'BANISA \r'),
(43,9,'LAFEY \r'),
(44,9,'MANDERA CENTRAL \r'),
(45,9,'MANDERA EAST \r'),
(46,9,'MANDERA NORTH \r'),
(47,9,'MANDERA WEST \r'),
(48,10,'CHALBI \r'),
(49,10,'HORR NORTH \r'),
(50,10,'LOIYANGALANI \r'),
(51,10,'MARSABIT \r'),
(52,10,'MARSABIT SOUTH (LAISAMIS) \r'),
(53,10,'MOYALE \r'),
(54,10,'SOLOLO \r'),
(55,11,'GARBATULA \r'),
(56,11,'ISIOLO \r'),
(57,11,'MERTI \r'),
(58,12,'BUURI \r'),
(59,12,'IGEMBE CENTRAL \r'),
(60,12,'IGEMBE NORTH \r'),
(61,12,'IGEMBE SOUTH \r'),
(62,12,'IMENTI NORTH \r'),
(63,12,'IMENTI SOUTH \r'),
(64,12,'MERU CENTRAL \r'),
(65,12,'TIGANIA CENTRAL \r'),
(66,12,'TIGANIA EAST \r'),
(67,12,'TIGANIA WEST \r'),
(68,13,'MAARA \r'),
(69,13,'MERU SOUTH \r'),
(70,13,'THARAKA NORTH \r'),
(71,13,'THARAKA SOUTH \r'),
(72,14,'EMBU EAST \r'),
(73,14,'EMBU NORTH \r'),
(74,14,'EMBU WEST \r'),
(75,14,'MBEERE NORTH \r'),
(76,14,'MBEERE SOUTH \r'),
(77,15,'IKUTHA \r'),
(78,15,'KATULANI \r'),
(79,15,'KISASI \r'),
(80,15,'KITUI CENTRAL \r'),
(81,15,'KITUI WEST \r'),
(82,15,'KYUSO \r'),
(83,15,'LOWER YATTA \r'),
(84,15,'MATINYANI \r'),
(85,15,'MUMONI \r'),
(86,15,'MUTITO \r'),
(87,15,'MUTOMO \r'),
(88,15,'MWINGI CENTRAL \r'),
(89,15,'MWINGI EAST \r'),
(90,15,'MWINGI WEST /MIGWANI \r'),
(91,15,'NZAMBANI \r'),
(92,15,'TSEIKURU \r'),
(93,16,'ATHI RIVER \r'),
(94,16,'KANGUNDO \r'),
(95,16,'KATHIANI \r'),
(96,16,'MACHAKOS \r'),
(97,16,'MASINGA \r'),
(98,16,'MATUNGULU \r'),
(99,16,'MWALA \r'),
(100,16,'YATTA \r'),
(101,17,'KATHONZWENI \r'),
(102,17,'KIBWEZI \r'),
(103,17,'KILUNGU \r'),
(104,17,'MAKINDU \r'),
(105,17,'MAKUENI \r'),
(106,17,'MBOONI EAST \r'),
(107,17,'MBOONI WEST \r'),
(108,17,'MUKAA \r'),
(109,17,'NZAUI \r'),
(110,18,'KINANGOP \r'),
(111,18,'KIPIPIRI \r'),
(112,18,'MIRANGINE \r'),
(113,18,'NYANDARUA CENTRAL \r'),
(114,18,'NYANDARUA NORTH \r'),
(115,18,'NYANDARUA SOUTH \r'),
(116,18,'NYANDARUA WEST \r'),
(117,19,'KIENI EAST \r'),
(118,19,'KIENI WEST \r'),
(119,19,'MATHIRA EAST \r'),
(120,19,'MATHIRA WEST \r'),
(121,19,'MUKURWE-INI \r'),
(122,19,'NYERI CENTRAL \r'),
(123,19,'NYERI SOUTH \r'),
(124,19,'TETU \r'),
(125,20,'KIRINYAGA CENTRAL \r'),
(126,20,'KIRINYAGA EAST \r'),
(127,20,'KIRINYAGA WEST \r'),
(128,20,'MWEA EAST \r'),
(129,20,'MWEA WEST \r'),
(130,21,'GATANGA \r'),
(131,21,'KAHURO \r'),
(132,21,'KANDARA \r'),
(133,21,'KANGEMA \r'),
(134,21,'KIGUMO \r'),
(135,21,'MATHIOYA \r'),
(136,21,'MURANG\'A EAST \r'),
(137,21,'MURANG\'A SOUTH \r'),
(138,22,'GATUNDU NORTH \r'),
(139,22,'GATUNDU SOUTH \r'),
(140,22,'GITHUNGURI \r'),
(141,22,'JUJA \r'),
(142,22,'KABETE \r'),
(143,22,'KIAMBAA \r'),
(144,22,'KIAMBU \r'),
(145,22,'KIKUYU \r'),
(146,22,'LARI \r'),
(147,22,'LIMURU \r'),
(148,22,'RUIRU \r'),
(149,22,'THIKA EAST \r'),
(150,22,'THIKA WEST \r'),
(151,23,'KIBISH \r'),
(152,23,'LOIMA \r'),
(153,23,'TURKANA CENTRAL \r'),
(154,23,'TURKANA EAST \r'),
(155,23,'TURKANA NORTH \r'),
(156,23,'TURKANA SOUTH \r'),
(157,23,'TURKANA WEST \r'),
(158,24,'KIPKOMO \r'),
(159,24,'POKOT CENTRAL \r'),
(160,24,'POKOT NORTH \r'),
(161,24,'POKOT SOUTH \r'),
(162,24,'WEST POKOT \r'),
(163,25,'SAMBURU CENTRAL \r'),
(164,25,'SAMBURU EAST \r'),
(165,25,'SAMBURU NORTH \r'),
(166,26,'ENDEBES \r'),
(167,26,'KIMININI \r'),
(168,26,'KWANZA \r'),
(169,26,'TRANS NZOIA EAST \r'),
(170,26,'TRANS NZOIA WEST \r'),
(171,27,'ELDORET EAST \r'),
(172,27,'ELDORET WEST \r'),
(173,27,'KESSES \r'),
(174,27,'MOIBEN \r'),
(175,27,'SOY \r'),
(176,27,'WARENG \r'),
(177,28,'KEIYO \r'),
(178,28,'KEIYO SOUTH \r'),
(179,28,'MARAKWET EAST \r'),
(180,28,'MARAKWET WEST \r'),
(181,29,'CHESUMEI \r'),
(182,29,'NANDI CENTRAL \r'),
(183,29,'NANDI EAST \r'),
(184,29,'NANDI NORTH \r'),
(185,29,'NANDI SOUTH \r'),
(186,29,'TINDERET \r'),
(187,30,'BARINGO CENTRAL \r'),
(188,30,'BARINGO NORTH \r'),
(189,30,'EAST POKOT \r'),
(190,30,'KOIBATEK \r'),
(191,30,'MARIGAT \r'),
(192,30,'MOGOTIO \r'),
(193,31,'LAIKIPIA CENTRAL \r'),
(194,31,'LAIKIPIA EAST \r'),
(195,31,'LAIKIPIA NORTH \r'),
(196,31,'LAIKIPIA WEST \r'),
(197,31,'NYAHURURU \r'),
(198,32,'GILGIL \r'),
(199,32,'KURESOI \r'),
(200,32,'KURESOI NORTH \r'),
(201,32,'MOLO \r'),
(202,32,'NAIVASHA \r'),
(203,32,'NAKURU EAST \r'),
(204,32,'NAKURU NORTH \r'),
(205,32,'NAKURU WEST \r'),
(206,32,'NJORO \r'),
(207,32,'RONGAI \r'),
(208,32,'SUBUKIA \r'),
(209,33,'NAROK EAST \r'),
(210,33,'NAROK NORTH \r'),
(211,33,'NAROK SOUTH \r'),
(212,33,'NAROK WEST \r'),
(213,33,'TRANS MARA EAST \r'),
(214,33,'TRANS MARA WEST \r'),
(215,34,'ISINYA \r'),
(216,34,'KAJIADO CENTRAL \r'),
(217,34,'KAJIADO NORTH \r'),
(218,34,'KAJIADO WEST \r'),
(219,34,'LOITOKITOK \r'),
(220,34,'MASHUURU \r'),
(221,35,'BELGUT \r'),
(222,35,'BURETI \r'),
(223,35,'KERICHO \r'),
(224,35,'KIPKELION \r'),
(225,35,'LONDIANI \r'),
(226,35,'SIGOWEI / SOIN \r'),
(227,36,'BOMET \r'),
(228,36,'BOMET EAST \r'),
(229,36,'CHEPALUNGU \r'),
(230,36,'KONOIN \r'),
(231,36,'SOTIK \r'),
(232,37,'BUTERE \r'),
(233,37,'KAKAMEGA CENTRAL \r'),
(234,37,'KAKAMEGA EAST \r'),
(235,37,'KAKAMEGA NORTH \r'),
(236,37,'KAKAMEGA SOUTH \r'),
(237,37,'KHWISERO \r'),
(238,37,'LIKUYANI \r'),
(239,37,'LUGARI \r'),
(240,37,'MATETE \r'),
(241,37,'MATUNGU \r'),
(242,37,'MUMIAS \r'),
(243,37,'MUMIAS EAST \r'),
(244,37,'NAVAKHOLO \r'),
(245,38,'EMUHAYA \r'),
(246,38,'HAMISI \r'),
(247,38,'LUANDA \r'),
(248,38,'SABATIA \r'),
(249,38,'VIHIGA \r'),
(250,39,'BUMULA \r'),
(251,39,'BUNGOMA CENTRAL \r'),
(252,39,'BUNGOMA EAST \r'),
(253,39,'BUNGOMA NORTH \r'),
(254,39,'BUNGOMA SOUTH \r'),
(255,39,'BUNGOMA WEST \r'),
(256,39,'CHEPTAIS \r'),
(257,39,'KIMILILI \r'),
(258,39,'MT ELGON \r'),
(259,39,'WEBUYE WEST \r'),
(260,40,'BUNYALA \r'),
(261,40,'BUSIA \r'),
(262,40,'BUTULA \r'),
(263,40,'NAMBALE \r'),
(264,40,'SAMIA \r'),
(265,40,'TESO NORTH \r'),
(266,40,'TESO SOUTH \r'),
(267,41,'BONDO \r'),
(268,41,'GEM \r'),
(269,41,'RARIEDA \r'),
(270,41,'SIAYA \r'),
(271,41,'UGENYA \r'),
(272,41,'UGUNJA \r'),
(273,42,'KISUMU CENTRAL \r'),
(274,42,'KISUMU EAST \r'),
(275,42,'KISUMU WEST \r'),
(276,42,'MUHORONI \r'),
(277,42,'NYAKACH \r'),
(278,42,'NYANDO \r'),
(279,42,'SEME \r'),
(280,43,'HOMA BAY \r'),
(281,43,'MBITA \r'),
(282,43,'NDHIWA \r'),
(283,43,'RACHUONYO EAST \r'),
(284,43,'RACHUONYO NORTH \r'),
(285,43,'RACHUONYO SOUTH \r'),
(286,43,'RANGWE \r'),
(287,43,'SUBA \r'),
(288,44,'AWENDO \r'),
(289,44,'KURIA EAST \r'),
(290,44,'KURIA WEST \r'),
(291,44,'MIGORI \r'),
(292,44,'NYATIKE \r'),
(293,44,'RONGO \r'),
(294,44,'SUNA WEST \r'),
(295,44,'URIRI \r'),
(296,45,'GUCHA \r'),
(297,45,'GUCHA SOUTH \r'),
(298,45,'KENYENYA \r'),
(299,45,'KISII CENTRAL \r'),
(300,45,'KISII SOUTH \r'),
(301,45,'KITUTU CENTRAL \r'),
(302,45,'MARANI \r'),
(303,45,'MASABA SOUTH \r'),
(304,45,'NYAMACHE \r'),
(305,45,'SAMETA \r'),
(306,46,'BORABU \r'),
(307,46,'MANGA \r'),
(308,46,'MASABA NORTH \r'),
(309,46,'NYAMIRA NORTH \r'),
(310,46,'NYAMIRA SOUTH \r'),
(311,47,'DAGORETTI \r'),
(312,47,'EMBAKASI \r'),
(313,47,'KAMUKUNJI \r'),
(314,47,'KASARANI \r'),
(315,47,'KIBRA \r'),
(316,47,'LANGATA \r'),
(317,47,'MAKADARA \r'),
(318,47,'MATHARE \r'),
(319,47,'NJIRU \r'),
(320,47,'STAREHE \r'),
(321,47,'WESTLANDS \r');
