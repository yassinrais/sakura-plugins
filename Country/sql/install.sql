-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 05 août 2020 à 19:50
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Structure de la table `sakura_country`
--

DROP TABLE IF EXISTS `sakura_country`;
CREATE TABLE IF NOT EXISTS `sakura_country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num` smallint(6) DEFAULT NULL,
  `iso2` char(2) COLLATE utf8_bin NOT NULL,
  `iso3` char(3) COLLATE utf8_bin DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `title` varchar(100) COLLATE utf8_bin NOT NULL,
  `capital` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `currency` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `phonecode` int(5) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=240 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `sakura_country`
--

INSERT INTO `sakura_country` (`id`, `num`, `iso2`, `iso3`, `name`, `title`, `capital`, `currency`, `phonecode`, `status`) VALUES
(1, 4, 'AF', 'AFG', 'AFGHANISTAN', 'Afghanistan', 'Kabul', '', 93, 1),
(2, 8, 'AL', 'ALB', 'ALBANIA', 'Albania', 'Tirana', NULL, 355, 1),
(3, 12, 'DZ', 'DZA', 'ALGERIA', 'Algeria', 'Algiers', NULL, 213, 1),
(4, 16, 'AS', 'ASM', 'AMERICAN SAMOA', 'American Samoa', 'Pago Pago', NULL, 1684, 1),
(5, 20, 'AD', 'AND', 'ANDORRA', 'Andorra', 'Andorra la Vella', NULL, 376, 1),
(6, 24, 'AO', 'AGO', 'ANGOLA', 'Angola', 'Luanda', NULL, 244, 1),
(7, 660, 'AI', 'AIA', 'ANGUILLA', 'Anguilla', 'The Valley', NULL, 1264, 1),
(8, 672, 'AQ', NULL, 'ANTARCTICA', 'Antarctica', NULL, NULL, 0, 1),
(9, 28, 'AG', 'ATG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'St. John\'s', NULL, 1268, 1),
(10, 32, 'AR', 'ARG', 'ARGENTINA', 'Argentina', 'Buenos Aires', NULL, 54, 1),
(11, 51, 'AM', 'ARM', 'ARMENIA', 'Armenia', 'Yerevan', NULL, 374, 1),
(12, 533, 'AW', 'ABW', 'ARUBA', 'Aruba', 'Oranjestad', NULL, 297, 1),
(13, 36, 'AU', 'AUS', 'AUSTRALIA', 'Australia', 'Canberra', NULL, 61, 1),
(14, 40, 'AT', 'AUT', 'AUSTRIA', 'Austria', 'Vienna', NULL, 43, 1),
(15, 31, 'AZ', 'AZE', 'AZERBAIJAN', 'Azerbaijan', 'Baku', NULL, 994, 1),
(16, 44, 'BS', 'BHS', 'BAHAMAS', 'Bahamas', 'Nassau', NULL, 1242, 1),
(17, 48, 'BH', 'BHR', 'BAHRAIN', 'Bahrain', 'Manama', NULL, 973, 1),
(18, 50, 'BD', 'BGD', 'BANGLADESH', 'Bangladesh', 'Dhaka', NULL, 880, 1),
(19, 52, 'BB', 'BRB', 'BARBADOS', 'Barbados', 'Bridgetown', NULL, 1246, 1),
(20, 112, 'BY', 'BLR', 'BELARUS', 'Belarus', 'Minsk', NULL, 375, 1),
(21, 56, 'BE', 'BEL', 'BELGIUM', 'Belgium', 'Brussels', NULL, 32, 1),
(22, 84, 'BZ', 'BLZ', 'BELIZE', 'Belize', 'Belmopan', NULL, 501, 1),
(23, 204, 'BJ', 'BEN', 'BENIN', 'Benin', 'Porto-Novo', NULL, 229, 1),
(24, 60, 'BM', 'BMU', 'BERMUDA', 'Bermuda', 'Hamilton', NULL, 1441, 1),
(25, 64, 'BT', 'BTN', 'BHUTAN', 'Bhutan', 'Thimphu', NULL, 975, 1),
(26, 68, 'BO', 'BOL', 'BOLIVIA', 'Bolivia', 'Sucre', NULL, 591, 1),
(27, 70, 'BA', 'BIH', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'Sarajevo', NULL, 387, 1),
(28, 72, 'BW', 'BWA', 'BOTSWANA', 'Botswana', 'Gaborone', NULL, 267, 1),
(29, 74, 'BV', NULL, 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0, 1),
(30, 76, 'BR', 'BRA', 'BRAZIL', 'Brazil', 'Brasília', NULL, 55, 1),
(31, 86, 'IO', NULL, 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246, 1),
(32, 96, 'BN', 'BRN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', NULL, NULL, 673, 1),
(33, 100, 'BG', 'BGR', 'BULGARIA', 'Bulgaria', 'Sofia', NULL, 359, 1),
(34, 854, 'BF', 'BFA', 'BURKINA FASO', 'Burkina Faso', 'Ouagadougou', NULL, 226, 1),
(35, 108, 'BI', 'BDI', 'BURUNDI', 'Burundi', 'Bujumbura', NULL, 257, 1),
(36, 116, 'KH', 'KHM', 'CAMBODIA', 'Cambodia', 'Phnom Penh', NULL, 855, 1),
(37, 120, 'CM', 'CMR', 'CAMEROON', 'Cameroon', 'Yaoundé', NULL, 237, 1),
(38, 124, 'CA', 'CAN', 'CANADA', 'Canada', 'Ottawa', NULL, 1, 1),
(39, 132, 'CV', 'CPV', 'CAPE VERDE', 'Cape Verde', 'Praia', NULL, 238, 1),
(40, 136, 'KY', 'CYM', 'CAYMAN ISLANDS', 'Cayman Islands', 'George Town', NULL, 1345, 1),
(41, 140, 'CF', 'CAF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'Bangui', NULL, 236, 1),
(42, 148, 'TD', 'TCD', 'CHAD', 'Chad', 'N\'Djamena', NULL, 235, 1),
(43, 152, 'CL', 'CHL', 'CHILE', 'Chile', 'Santiago', NULL, 56, 1),
(44, 156, 'CN', 'CHN', 'CHINA', 'China', 'Beijing', NULL, 86, 1),
(45, 162, 'CX', NULL, 'CHRISTMAS ISLAND', 'Christmas Island', 'Flying Fish Cove', NULL, 61, 1),
(46, 166, 'CC', NULL, 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', 'West Island', NULL, 672, 1),
(47, 170, 'CO', 'COL', 'COLOMBIA', 'Colombia', 'Bogotá', NULL, 57, 1),
(48, 174, 'KM', 'COM', 'COMOROS', 'Comoros', 'Moroni', NULL, 269, 1),
(49, 178, 'CG', 'COG', 'CONGO', 'Congo', NULL, NULL, 242, 1),
(50, 180, 'CD', 'COD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', NULL, NULL, 242, 1),
(51, 184, 'CK', 'COK', 'COOK ISLANDS', 'Cook Islands', 'Avarua', NULL, 682, 1),
(52, 188, 'CR', 'CRI', 'COSTA RICA', 'Costa Rica', 'San José', NULL, 506, 1),
(53, 384, 'CI', 'CIV', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'Yamoussoukro', NULL, 225, 1),
(54, 191, 'HR', 'HRV', 'CROATIA', 'Croatia', 'Zagreb', NULL, 385, 1),
(55, 192, 'CU', 'CUB', 'CUBA', 'Cuba', 'Havana', NULL, 53, 1),
(56, 196, 'CY', 'CYP', 'CYPRUS', 'Cyprus', 'Nicosia', NULL, 357, 1),
(57, 203, 'CZ', 'CZE', 'CZECH REPUBLIC', 'Czech Republic', 'Prague', NULL, 420, 1),
(58, 208, 'DK', 'DNK', 'DENMARK', 'Denmark', 'Copenhagen', NULL, 45, 1),
(59, 262, 'DJ', 'DJI', 'DJIBOUTI', 'Djibouti', 'Djibouti', NULL, 253, 1),
(60, 212, 'DM', 'DMA', 'DOMINICA', 'Dominica', 'Roseau', NULL, 1767, 1),
(61, 214, 'DO', 'DOM', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'Santo Domingo', NULL, 1809, 1),
(62, 218, 'EC', 'ECU', 'ECUADOR', 'Ecuador', 'Quito', NULL, 593, 1),
(63, 818, 'EG', 'EGY', 'EGYPT', 'Egypt', 'Cairo', NULL, 20, 1),
(64, 222, 'SV', 'SLV', 'EL SALVADOR', 'El Salvador', 'San Salvador', NULL, 503, 1),
(65, 226, 'GQ', 'GNQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'Malabo', NULL, 240, 1),
(66, 232, 'ER', 'ERI', 'ERITREA', 'Eritrea', 'Asmara', NULL, 291, 1),
(67, 233, 'EE', 'EST', 'ESTONIA', 'Estonia', 'Tallinn', NULL, 372, 1),
(68, 231, 'ET', 'ETH', 'ETHIOPIA', 'Ethiopia', 'Addis Ababa', NULL, 251, 1),
(69, 238, 'FK', 'FLK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', NULL, NULL, 500, 1),
(70, 234, 'FO', 'FRO', 'FAROE ISLANDS', 'Faroe Islands', 'Tórshavn', NULL, 298, 1),
(71, 242, 'FJ', 'FJI', 'FIJI', 'Fiji', 'Suva', NULL, 679, 1),
(72, 246, 'FI', 'FIN', 'FINLAND', 'Finland', 'Helsinki', NULL, 358, 1),
(73, 250, 'FR', 'FRA', 'FRANCE', 'France', 'Paris', NULL, 33, 1),
(74, 254, 'GF', 'GUF', 'FRENCH GUIANA', 'French Guiana', 'Cayenne', NULL, 594, 1),
(75, 258, 'PF', 'PYF', 'FRENCH POLYNESIA', 'French Polynesia', 'Papeete', NULL, 689, 1),
(76, 260, 'TF', NULL, 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0, 1),
(77, 266, 'GA', 'GAB', 'GABON', 'Gabon', 'Libreville', NULL, 241, 1),
(78, 270, 'GM', 'GMB', 'GAMBIA', 'Gambia', 'Banjul', NULL, 220, 1),
(79, 268, 'GE', 'GEO', 'GEORGIA', 'Georgia', 'Tbilisi', NULL, 995, 1),
(80, 276, 'DE', 'DEU', 'GERMANY', 'Germany', 'Berlin', NULL, 49, 1),
(81, 288, 'GH', 'GHA', 'GHANA', 'Ghana', 'Accra', NULL, 233, 1),
(82, 292, 'GI', 'GIB', 'GIBRALTAR', 'Gibraltar', 'Gibraltar', NULL, 350, 1),
(83, 300, 'GR', 'GRC', 'GREECE', 'Greece', 'Athens', NULL, 30, 1),
(84, 304, 'GL', 'GRL', 'GREENLAND', 'Greenland', 'Nuuk', NULL, 299, 1),
(85, 308, 'GD', 'GRD', 'GRENADA', 'Grenada', 'St. George\'s', NULL, 1473, 1),
(86, 312, 'GP', 'GLP', 'GUADELOUPE', 'Guadeloupe', NULL, NULL, 590, 1),
(87, 316, 'GU', 'GUM', 'GUAM', 'Guam', 'Hagåtña', NULL, 1671, 1),
(88, 320, 'GT', 'GTM', 'GUATEMALA', 'Guatemala', 'Guatemala City', NULL, 502, 1),
(89, 324, 'GN', 'GIN', 'GUINEA', 'Guinea', 'Conakry', NULL, 224, 1),
(90, 624, 'GW', 'GNB', 'GUINEA-BISSAU', 'Guinea-Bissau', 'Bissau', NULL, 245, 1),
(91, 328, 'GY', 'GUY', 'GUYANA', 'Guyana', 'Georgetown', NULL, 592, 1),
(92, 332, 'HT', 'HTI', 'HAITI', 'Haiti', 'Port-au-Prince', NULL, 509, 1),
(93, 334, 'HM', NULL, 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0, 1),
(94, 336, 'VA', 'VAT', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', NULL, NULL, 39, 1),
(95, 340, 'HN', 'HND', 'HONDURAS', 'Honduras', 'Tegucigalpa', NULL, 504, 1),
(96, 344, 'HK', 'HKG', 'HONG KONG', 'Hong Kong', NULL, NULL, 852, 1),
(97, 348, 'HU', 'HUN', 'HUNGARY', 'Hungary', 'Budapest', NULL, 36, 1),
(98, 352, 'IS', 'ISL', 'ICELAND', 'Iceland', 'Reykjavík', NULL, 354, 1),
(99, 356, 'IN', 'IND', 'INDIA', 'India', 'New Delhi', NULL, 91, 1),
(100, 360, 'ID', 'IDN', 'INDONESIA', 'Indonesia', 'Jakarta', NULL, 62, 1),
(101, 364, 'IR', 'IRN', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', NULL, NULL, 98, 1),
(102, 368, 'IQ', 'IRQ', 'IRAQ', 'Iraq', 'Baghdad', NULL, 964, 1),
(103, 372, 'IE', 'IRL', 'IRELAND', 'Ireland', 'Dublin', NULL, 353, 1),
(104, 376, 'IL', 'ISR', 'ISRAEL', 'Israel', 'Jerusalem', NULL, 972, 1),
(105, 380, 'IT', 'ITA', 'ITALY', 'Italy', 'Rome', NULL, 39, 1),
(106, 388, 'JM', 'JAM', 'JAMAICA', 'Jamaica', 'Kingston', NULL, 1876, 1),
(107, 392, 'JP', 'JPN', 'JAPAN', 'Japan', 'Tokyo', NULL, 81, 1),
(108, 400, 'JO', 'JOR', 'JORDAN', 'Jordan', 'Amman', NULL, 962, 1),
(109, 398, 'KZ', 'KAZ', 'KAZAKHSTAN', 'Kazakhstan', 'Astana', NULL, 7, 1),
(110, 404, 'KE', 'KEN', 'KENYA', 'Kenya', 'Nairobi', NULL, 254, 1),
(111, 296, 'KI', 'KIR', 'KIRIBATI', 'Kiribati', 'Tarawa', NULL, 686, 1),
(112, 408, 'KP', 'PRK', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', NULL, NULL, 850, 1),
(113, 410, 'KR', 'KOR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', NULL, NULL, 82, 1),
(114, 414, 'KW', 'KWT', 'KUWAIT', 'Kuwait', 'Kuwait City', NULL, 965, 1),
(115, 417, 'KG', 'KGZ', 'KYRGYZSTAN', 'Kyrgyzstan', 'Bishkek', NULL, 996, 1),
(116, 418, 'LA', 'LAO', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', NULL, NULL, 856, 1),
(117, 428, 'LV', 'LVA', 'LATVIA', 'Latvia', 'Riga', NULL, 371, 1),
(118, 422, 'LB', 'LBN', 'LEBANON', 'Lebanon', 'Beirut', NULL, 961, 1),
(119, 426, 'LS', 'LSO', 'LESOTHO', 'Lesotho', 'Maseru', NULL, 266, 1),
(120, 430, 'LR', 'LBR', 'LIBERIA', 'Liberia', 'Monrovia', NULL, 231, 1),
(121, 434, 'LY', 'LBY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', NULL, NULL, 218, 1),
(122, 438, 'LI', 'LIE', 'LIECHTENSTEIN', 'Liechtenstein', 'Vaduz', NULL, 423, 1),
(123, 440, 'LT', 'LTU', 'LITHUANIA', 'Lithuania', 'Vilnius', NULL, 370, 1),
(124, 442, 'LU', 'LUX', 'LUXEMBOURG', 'Luxembourg', 'Luxembourg', NULL, 352, 1),
(125, 446, 'MO', 'MAC', 'MACAO', 'Macao', NULL, NULL, 853, 1),
(126, 807, 'MK', 'MKD', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', NULL, NULL, 389, 1),
(127, 450, 'MG', 'MDG', 'MADAGASCAR', 'Madagascar', 'Antananarivo', NULL, 261, 1),
(128, 454, 'MW', 'MWI', 'MALAWI', 'Malawi', 'Lilongwe', NULL, 265, 1),
(129, 458, 'MY', 'MYS', 'MALAYSIA', 'Malaysia', 'Kuala Lumpur', NULL, 60, 1),
(130, 462, 'MV', 'MDV', 'MALDIVES', 'Maldives', 'Malé', NULL, 960, 1),
(131, 466, 'ML', 'MLI', 'MALI', 'Mali', 'Bamako', NULL, 223, 1),
(132, 470, 'MT', 'MLT', 'MALTA', 'Malta', 'Valletta', NULL, 356, 1),
(133, 584, 'MH', 'MHL', 'MARSHALL ISLANDS', 'Marshall Islands', 'Majuro', NULL, 692, 1),
(134, 474, 'MQ', 'MTQ', 'MARTINIQUE', 'Martinique', NULL, NULL, 596, 1),
(135, 478, 'MR', 'MRT', 'MAURITANIA', 'Mauritania', 'Nouakchott', NULL, 222, 1),
(136, 480, 'MU', 'MUS', 'MAURITIUS', 'Mauritius', 'Port Louis', NULL, 230, 1),
(137, 175, 'YT', NULL, 'MAYOTTE', 'Mayotte', NULL, NULL, 269, 1),
(138, 484, 'MX', 'MEX', 'MEXICO', 'Mexico', 'Mexico City', NULL, 52, 1),
(139, 583, 'FM', 'FSM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', NULL, NULL, 691, 1),
(140, 498, 'MD', 'MDA', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', NULL, NULL, 373, 1),
(141, 492, 'MC', 'MCO', 'MONACO', 'Monaco', 'Monaco', NULL, 377, 1),
(142, 496, 'MN', 'MNG', 'MONGOLIA', 'Mongolia', 'Ulaanbaatar', NULL, 976, 1),
(143, 500, 'MS', 'MSR', 'MONTSERRAT', 'Montserrat', 'Plymouth', NULL, 1664, 1),
(144, 504, 'MA', 'MAR', 'MOROCCO', 'Morocco', 'Rabat', NULL, 212, 1),
(145, 508, 'MZ', 'MOZ', 'MOZAMBIQUE', 'Mozambique', 'Maputo', NULL, 258, 1),
(146, 104, 'MM', 'MMR', 'MYANMAR', 'Myanmar', 'Naypyidaw', NULL, 95, 1),
(147, 516, 'NA', 'NAM', 'NAMIBIA', 'Namibia', 'Windhoek', NULL, 264, 1),
(148, 520, 'NR', 'NRU', 'NAURU', 'Nauru', 'Yaren', NULL, 674, 1),
(149, 524, 'NP', 'NPL', 'NEPAL', 'Nepal', 'Kathmandu', NULL, 977, 1),
(150, 528, 'NL', 'NLD', 'NETHERLANDS', 'Netherlands', 'Amsterdam', NULL, 31, 1),
(151, 530, 'AN', 'ANT', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', NULL, NULL, 599, 1),
(152, 540, 'NC', 'NCL', 'NEW CALEDONIA', 'New Caledonia', 'Nouméa', NULL, 687, 1),
(153, 554, 'NZ', 'NZL', 'NEW ZEALAND', 'New Zealand', 'Wellington', NULL, 64, 1),
(154, 558, 'NI', 'NIC', 'NICARAGUA', 'Nicaragua', 'Managua', NULL, 505, 1),
(155, 562, 'NE', 'NER', 'NIGER', 'Niger', 'Niamey', NULL, 227, 1),
(156, 566, 'NG', 'NGA', 'NIGERIA', 'Nigeria', 'Abuja', NULL, 234, 1),
(157, 570, 'NU', 'NIU', 'NIUE', 'Niue', 'Alofi', NULL, 683, 1),
(158, 574, 'NF', 'NFK', 'NORFOLK ISLAND', 'Norfolk Island', 'Kingston', NULL, 672, 1),
(159, 580, 'MP', 'MNP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'Saipan', NULL, 1670, 1),
(160, 578, 'NO', 'NOR', 'NORWAY', 'Norway', 'Oslo', NULL, 47, 1),
(161, 512, 'OM', 'OMN', 'OMAN', 'Oman', 'Muscat', NULL, 968, 1),
(162, 586, 'PK', 'PAK', 'PAKISTAN', 'Pakistan', 'Islamabad', NULL, 92, 1),
(163, 585, 'PW', 'PLW', 'PALAU', 'Palau', 'Ngerulmud', NULL, 680, 1),
(164, 274, 'PS', NULL, 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970, 1),
(165, 591, 'PA', 'PAN', 'PANAMA', 'Panama', 'Panama City', NULL, 507, 1),
(166, 598, 'PG', 'PNG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'Port Moresby', NULL, 675, 1),
(167, 600, 'PY', 'PRY', 'PARAGUAY', 'Paraguay', 'Asunción', NULL, 595, 1),
(168, 604, 'PE', 'PER', 'PERU', 'Peru', 'Lima', NULL, 51, 1),
(169, 608, 'PH', 'PHL', 'PHILIPPINES', 'Philippines', 'Manila', NULL, 63, 1),
(170, 612, 'PN', 'PCN', 'PITCAIRN', 'Pitcairn', NULL, NULL, 0, 1),
(171, 616, 'PL', 'POL', 'POLAND', 'Poland', 'Warsaw', NULL, 48, 1),
(172, 620, 'PT', 'PRT', 'PORTUGAL', 'Portugal', 'Lisbon', NULL, 351, 1),
(173, 630, 'PR', 'PRI', 'PUERTO RICO', 'Puerto Rico', 'San Juan', NULL, 1787, 1),
(174, 634, 'QA', 'QAT', 'QATAR', 'Qatar', 'Doha', NULL, 974, 1),
(175, 638, 'RE', 'REU', 'REUNION', 'Reunion', NULL, NULL, 262, 1),
(176, 642, 'RO', 'ROM', 'ROMANIA', 'Romania', 'Bucharest', NULL, 40, 1),
(177, 643, 'RU', 'RUS', 'RUSSIAN FEDERATION', 'Russian Federation', NULL, NULL, 70, 1),
(178, 646, 'RW', 'RWA', 'RWANDA', 'Rwanda', 'Kigali', NULL, 250, 1),
(179, 654, 'SH', 'SHN', 'SAINT HELENA', 'Saint Helena', 'Jamestown', NULL, 290, 1),
(180, 659, 'KN', 'KNA', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'Basseterre', NULL, 1869, 1),
(181, 662, 'LC', 'LCA', 'SAINT LUCIA', 'Saint Lucia', 'Castries', NULL, 1758, 1),
(182, 666, 'PM', 'SPM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'St. Pierre', NULL, 508, 1),
(183, 670, 'VC', 'VCT', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'Kingstown', NULL, 1784, 1),
(184, 882, 'WS', 'WSM', 'SAMOA', 'Samoa', 'Apia', NULL, 684, 1),
(185, 674, 'SM', 'SMR', 'SAN MARINO', 'San Marino', 'San Marino', NULL, 378, 1),
(186, 678, 'ST', 'STP', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'São Tomé', NULL, 239, 1),
(187, 682, 'SA', 'SAU', 'SAUDI ARABIA', 'Saudi Arabia', 'Riyadh', NULL, 966, 1),
(188, 686, 'SN', 'SEN', 'SENEGAL', 'Senegal', 'Dakar', NULL, 221, 1),
(189, 891, 'CS', NULL, 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381, 1),
(190, 690, 'SC', 'SYC', 'SEYCHELLES', 'Seychelles', 'Victoria', NULL, 248, 1),
(191, 694, 'SL', 'SLE', 'SIERRA LEONE', 'Sierra Leone', 'Freetown', NULL, 232, 1),
(192, 702, 'SG', 'SGP', 'SINGAPORE', 'Singapore', 'Singapore', NULL, 65, 1),
(193, 703, 'SK', 'SVK', 'SLOVAKIA', 'Slovakia', 'Bratislava', NULL, 421, 1),
(194, 705, 'SI', 'SVN', 'SLOVENIA', 'Slovenia', 'Ljubljana', NULL, 386, 1),
(195, 90, 'SB', 'SLB', 'SOLOMON ISLANDS', 'Solomon Islands', 'Honiara', NULL, 677, 1),
(196, 706, 'SO', 'SOM', 'SOMALIA', 'Somalia', 'Mogadishu', NULL, 252, 1),
(197, 710, 'ZA', 'ZAF', 'SOUTH AFRICA', 'South Africa', 'Pretoria', NULL, 27, 1),
(198, 239, 'GS', NULL, 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', 'Grytviken', NULL, 0, 1),
(199, 724, 'ES', 'ESP', 'SPAIN', 'Spain', 'Madrid', NULL, 34, 1),
(200, 144, 'LK', 'LKA', 'SRI LANKA', 'Sri Lanka', 'Sri Jayawardenapura Kotte', NULL, 94, 1),
(201, 736, 'SD', 'SDN', 'SUDAN', 'Sudan', 'Khartoum', NULL, 249, 1),
(202, 740, 'SR', 'SUR', 'SURINAME', 'Suriname', 'Paramaribo', NULL, 597, 1),
(203, 744, 'SJ', 'SJM', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', NULL, NULL, 47, 1),
(204, 748, 'SZ', 'SWZ', 'SWAZILAND', 'Swaziland', 'Mbabane', NULL, 268, 1),
(205, 752, 'SE', 'SWE', 'SWEDEN', 'Sweden', 'Stockholm', NULL, 46, 1),
(206, 756, 'CH', 'CHE', 'SWITZERLAND', 'Switzerland', 'Bern', NULL, 41, 1),
(207, 760, 'SY', 'SYR', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', NULL, NULL, 963, 1),
(208, 158, 'TW', 'TWN', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', NULL, NULL, 886, 1),
(209, 762, 'TJ', 'TJK', 'TAJIKISTAN', 'Tajikistan', 'Dushanbe', NULL, 992, 1),
(210, 834, 'TZ', 'TZA', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', NULL, NULL, 255, 1),
(211, 764, 'TH', 'THA', 'THAILAND', 'Thailand', 'Bangkok', NULL, 66, 1),
(212, 626, 'TL', '', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670, 1),
(213, 768, 'TG', 'TGO', 'TOGO', 'Togo', 'Lomé', NULL, 228, 1),
(214, 772, 'TK', 'TKL', 'TOKELAU', 'Tokelau', NULL, NULL, 690, 1),
(215, 776, 'TO', 'TON', 'TONGA', 'Tonga', 'Nuku\'alofa', NULL, 676, 1),
(216, 780, 'TT', 'TTO', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'Port of Spain', NULL, 1868, 1),
(217, 788, 'TN', 'TUN', 'TUNISIA', 'Tunisia', 'Tunis', NULL, 216, 1),
(218, 792, 'TR', 'TUR', 'TURKEY', 'Turkey', 'Ankara', NULL, 90, 1),
(219, 795, 'TM', 'TKM', 'TURKMENISTAN', 'Turkmenistan', 'Ashgabat', NULL, 7370, 1),
(220, 796, 'TC', 'TCA', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'Cockburn Town', NULL, 1649, 1),
(221, 798, 'TV', 'TUV', 'TUVALU', 'Tuvalu', 'Funafuti', NULL, 688, 1),
(222, 800, 'UG', 'UGA', 'UGANDA', 'Uganda', 'Kampala', NULL, 256, 1),
(223, 804, 'UA', 'UKR', 'UKRAINE', 'Ukraine', 'Kiev', NULL, 380, 1),
(224, 784, 'AE', 'ARE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'Abu Dhabi', NULL, 971, 1),
(225, 826, 'GB', 'GBR', 'UNITED KINGDOM', 'United Kingdom', NULL, NULL, 44, 1),
(226, 840, 'US', 'USA', 'UNITED STATES', 'United States', 'Washington, D.C.', NULL, 1, 1),
(227, 581, 'UM', 'UMI', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1, 1),
(228, 858, 'UY', 'URY', 'URUGUAY', 'Uruguay', 'Montevideo', NULL, 598, 1),
(229, 860, 'UZ', 'UZB', 'UZBEKISTAN', 'Uzbekistan', 'Tashkent', NULL, 998, 1),
(230, 548, 'VU', 'VUT', 'VANUATU', 'Vanuatu', 'Port Vila', NULL, 678, 1),
(231, 862, 'VE', 'VEN', 'VENEZUELA', 'Venezuela', 'Caracas', NULL, 58, 1),
(232, 704, 'VN', 'VNM', 'VIET NAM', 'Viet Nam', NULL, NULL, 84, 1),
(233, 92, 'VG', 'VGB', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', NULL, NULL, 1284, 1),
(234, 850, 'VI', 'VIR', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', NULL, NULL, 1340, 1),
(235, 876, 'WF', 'WLF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'Mata-Utu', NULL, 681, 1),
(236, 732, 'EH', 'ESH', 'WESTERN SAHARA', 'Western Sahara', 'El Aaiún', NULL, 212, 1),
(237, 887, 'YE', 'YEM', 'YEMEN', 'Yemen', 'Sanaá', NULL, 967, 1),
(238, 894, 'ZM', 'ZMB', 'ZAMBIA', 'Zambia', 'Lusaka', NULL, 260, 1),
(239, 716, 'ZW', 'ZWE', 'ZIMBABWE', 'Zimbabwe', 'Harare', NULL, 263, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
