-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 09, 2022 at 11:56 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `konferans`
--

-- --------------------------------------------------------

--
-- Table structure for table `ayarlar`
--

DROP TABLE IF EXISTS `ayarlar`;
CREATE TABLE IF NOT EXISTS `ayarlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `footer_text` text,
  `footer_hakkimizda` text,
  `logo` text,
  `logo_footer` text,
  `favicon` text,
  `lang` text,
  `lang_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `footer_text`, `footer_hakkimizda`, `logo`, `logo_footer`, `favicon`, `lang`, `lang_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '© Copyright 2021 by Elmar Dadashov. Tüm Haklar Sakldıır.', 'Donec consectetur diam ac nibh auctor ultricies. Integer mauris lacus, consequat in luctus id, semper sed felis. Cum sociis natoque penatibus et magnis.', 'uploads/ayarlar/1641250248.png', 'uploads/ayarlar/1640569769.png', 'uploads/ayarlar/1640569769.png', 'tr', 1635233954, NULL, NULL, '2022-01-03 22:50:48');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone_code` int(5) NOT NULL,
  `country_code` char(2) NOT NULL,
  `country_name` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=253 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `phone_code`, `country_code`, `country_name`) VALUES
(1, 93, 'AF', 'Afghanistan'),
(2, 358, 'AX', 'Aland Islands'),
(3, 355, 'AL', 'Albania'),
(4, 213, 'DZ', 'Algeria'),
(5, 1684, 'AS', 'American Samoa'),
(6, 376, 'AD', 'Andorra'),
(7, 244, 'AO', 'Angola'),
(8, 1264, 'AI', 'Anguilla'),
(9, 672, 'AQ', 'Antarctica'),
(10, 1268, 'AG', 'Antigua and Barbuda'),
(11, 54, 'AR', 'Argentina'),
(12, 374, 'AM', 'Armenia'),
(13, 297, 'AW', 'Aruba'),
(14, 61, 'AU', 'Australia'),
(15, 43, 'AT', 'Austria'),
(16, 994, 'AZ', 'Azerbaijan'),
(17, 1242, 'BS', 'Bahamas'),
(18, 973, 'BH', 'Bahrain'),
(19, 880, 'BD', 'Bangladesh'),
(20, 1246, 'BB', 'Barbados'),
(21, 375, 'BY', 'Belarus'),
(22, 32, 'BE', 'Belgium'),
(23, 501, 'BZ', 'Belize'),
(24, 229, 'BJ', 'Benin'),
(25, 1441, 'BM', 'Bermuda'),
(26, 975, 'BT', 'Bhutan'),
(27, 591, 'BO', 'Bolivia'),
(28, 599, 'BQ', 'Bonaire, Sint Eustatius and Saba'),
(29, 387, 'BA', 'Bosnia and Herzegovina'),
(30, 267, 'BW', 'Botswana'),
(31, 55, 'BV', 'Bouvet Island'),
(32, 55, 'BR', 'Brazil'),
(33, 246, 'IO', 'British Indian Ocean Territory'),
(34, 673, 'BN', 'Brunei Darussalam'),
(35, 359, 'BG', 'Bulgaria'),
(36, 226, 'BF', 'Burkina Faso'),
(37, 257, 'BI', 'Burundi'),
(38, 855, 'KH', 'Cambodia'),
(39, 237, 'CM', 'Cameroon'),
(40, 1, 'CA', 'Canada'),
(41, 238, 'CV', 'Cape Verde'),
(42, 1345, 'KY', 'Cayman Islands'),
(43, 236, 'CF', 'Central African Republic'),
(44, 235, 'TD', 'Chad'),
(45, 56, 'CL', 'Chile'),
(46, 86, 'CN', 'China'),
(47, 61, 'CX', 'Christmas Island'),
(48, 672, 'CC', 'Cocos (Keeling) Islands'),
(49, 57, 'CO', 'Colombia'),
(50, 269, 'KM', 'Comoros'),
(51, 242, 'CG', 'Congo'),
(52, 242, 'CD', 'Congo, Democratic Republic of the Congo'),
(53, 682, 'CK', 'Cook Islands'),
(54, 506, 'CR', 'Costa Rica'),
(55, 225, 'CI', 'Cote D\'Ivoire'),
(56, 385, 'HR', 'Croatia'),
(57, 53, 'CU', 'Cuba'),
(58, 599, 'CW', 'Curacao'),
(59, 357, 'CY', 'Cyprus'),
(60, 420, 'CZ', 'Czech Republic'),
(61, 45, 'DK', 'Denmark'),
(62, 253, 'DJ', 'Djibouti'),
(63, 1767, 'DM', 'Dominica'),
(64, 1809, 'DO', 'Dominican Republic'),
(65, 593, 'EC', 'Ecuador'),
(66, 20, 'EG', 'Egypt'),
(67, 503, 'SV', 'El Salvador'),
(68, 240, 'GQ', 'Equatorial Guinea'),
(69, 291, 'ER', 'Eritrea'),
(70, 372, 'EE', 'Estonia'),
(71, 251, 'ET', 'Ethiopia'),
(72, 500, 'FK', 'Falkland Islands (Malvinas)'),
(73, 298, 'FO', 'Faroe Islands'),
(74, 679, 'FJ', 'Fiji'),
(75, 358, 'FI', 'Finland'),
(76, 33, 'FR', 'France'),
(77, 594, 'GF', 'French Guiana'),
(78, 689, 'PF', 'French Polynesia'),
(79, 262, 'TF', 'French Southern Territories'),
(80, 241, 'GA', 'Gabon'),
(81, 220, 'GM', 'Gambia'),
(82, 995, 'GE', 'Georgia'),
(83, 49, 'DE', 'Germany'),
(84, 233, 'GH', 'Ghana'),
(85, 350, 'GI', 'Gibraltar'),
(86, 30, 'GR', 'Greece'),
(87, 299, 'GL', 'Greenland'),
(88, 1473, 'GD', 'Grenada'),
(89, 590, 'GP', 'Guadeloupe'),
(90, 1671, 'GU', 'Guam'),
(91, 502, 'GT', 'Guatemala'),
(92, 44, 'GG', 'Guernsey'),
(93, 224, 'GN', 'Guinea'),
(94, 245, 'GW', 'Guinea-Bissau'),
(95, 592, 'GY', 'Guyana'),
(96, 509, 'HT', 'Haiti'),
(97, 0, 'HM', 'Heard Island and Mcdonald Islands'),
(98, 39, 'VA', 'Holy See (Vatican City State)'),
(99, 504, 'HN', 'Honduras'),
(100, 852, 'HK', 'Hong Kong'),
(101, 36, 'HU', 'Hungary'),
(102, 354, 'IS', 'Iceland'),
(103, 91, 'IN', 'India'),
(104, 62, 'ID', 'Indonesia'),
(105, 98, 'IR', 'Iran, Islamic Republic of'),
(106, 964, 'IQ', 'Iraq'),
(107, 353, 'IE', 'Ireland'),
(108, 44, 'IM', 'Isle of Man'),
(109, 972, 'IL', 'Israel'),
(110, 39, 'IT', 'Italy'),
(111, 1876, 'JM', 'Jamaica'),
(112, 81, 'JP', 'Japan'),
(113, 44, 'JE', 'Jersey'),
(114, 962, 'JO', 'Jordan'),
(115, 7, 'KZ', 'Kazakhstan'),
(116, 254, 'KE', 'Kenya'),
(117, 686, 'KI', 'Kiribati'),
(118, 850, 'KP', 'Korea, Democratic People\'s Republic of'),
(119, 82, 'KR', 'Korea, Republic of'),
(120, 381, 'XK', 'Kosovo'),
(121, 965, 'KW', 'Kuwait'),
(122, 996, 'KG', 'Kyrgyzstan'),
(123, 856, 'LA', 'Lao People\'s Democratic Republic'),
(124, 371, 'LV', 'Latvia'),
(125, 961, 'LB', 'Lebanon'),
(126, 266, 'LS', 'Lesotho'),
(127, 231, 'LR', 'Liberia'),
(128, 218, 'LY', 'Libyan Arab Jamahiriya'),
(129, 423, 'LI', 'Liechtenstein'),
(130, 370, 'LT', 'Lithuania'),
(131, 352, 'LU', 'Luxembourg'),
(132, 853, 'MO', 'Macao'),
(133, 389, 'MK', 'Macedonia, the Former Yugoslav Republic of'),
(134, 261, 'MG', 'Madagascar'),
(135, 265, 'MW', 'Malawi'),
(136, 60, 'MY', 'Malaysia'),
(137, 960, 'MV', 'Maldives'),
(138, 223, 'ML', 'Mali'),
(139, 356, 'MT', 'Malta'),
(140, 692, 'MH', 'Marshall Islands'),
(141, 596, 'MQ', 'Martinique'),
(142, 222, 'MR', 'Mauritania'),
(143, 230, 'MU', 'Mauritius'),
(144, 269, 'YT', 'Mayotte'),
(145, 52, 'MX', 'Mexico'),
(146, 691, 'FM', 'Micronesia, Federated States of'),
(147, 373, 'MD', 'Moldova, Republic of'),
(148, 377, 'MC', 'Monaco'),
(149, 976, 'MN', 'Mongolia'),
(150, 382, 'ME', 'Montenegro'),
(151, 1664, 'MS', 'Montserrat'),
(152, 212, 'MA', 'Morocco'),
(153, 258, 'MZ', 'Mozambique'),
(154, 95, 'MM', 'Myanmar'),
(155, 264, 'NA', 'Namibia'),
(156, 674, 'NR', 'Nauru'),
(157, 977, 'NP', 'Nepal'),
(158, 31, 'NL', 'Netherlands'),
(159, 599, 'AN', 'Netherlands Antilles'),
(160, 687, 'NC', 'New Caledonia'),
(161, 64, 'NZ', 'New Zealand'),
(162, 505, 'NI', 'Nicaragua'),
(163, 227, 'NE', 'Niger'),
(164, 234, 'NG', 'Nigeria'),
(165, 683, 'NU', 'Niue'),
(166, 672, 'NF', 'Norfolk Island'),
(167, 1670, 'MP', 'Northern Mariana Islands'),
(168, 47, 'NO', 'Norway'),
(169, 968, 'OM', 'Oman'),
(170, 92, 'PK', 'Pakistan'),
(171, 680, 'PW', 'Palau'),
(172, 970, 'PS', 'Palestinian Territory, Occupied'),
(173, 507, 'PA', 'Panama'),
(174, 675, 'PG', 'Papua New Guinea'),
(175, 595, 'PY', 'Paraguay'),
(176, 51, 'PE', 'Peru'),
(177, 63, 'PH', 'Philippines'),
(178, 64, 'PN', 'Pitcairn'),
(179, 48, 'PL', 'Poland'),
(180, 351, 'PT', 'Portugal'),
(181, 1787, 'PR', 'Puerto Rico'),
(182, 974, 'QA', 'Qatar'),
(183, 262, 'RE', 'Reunion'),
(184, 40, 'RO', 'Romania'),
(185, 70, 'RU', 'Russian Federation'),
(186, 250, 'RW', 'Rwanda'),
(187, 590, 'BL', 'Saint Barthelemy'),
(188, 290, 'SH', 'Saint Helena'),
(189, 1869, 'KN', 'Saint Kitts and Nevis'),
(190, 1758, 'LC', 'Saint Lucia'),
(191, 590, 'MF', 'Saint Martin'),
(192, 508, 'PM', 'Saint Pierre and Miquelon'),
(193, 1784, 'VC', 'Saint Vincent and the Grenadines'),
(194, 684, 'WS', 'Samoa'),
(195, 378, 'SM', 'San Marino'),
(196, 239, 'ST', 'Sao Tome and Principe'),
(197, 966, 'SA', 'Saudi Arabia'),
(198, 221, 'SN', 'Senegal'),
(199, 381, 'RS', 'Serbia'),
(200, 381, 'CS', 'Serbia and Montenegro'),
(201, 248, 'SC', 'Seychelles'),
(202, 232, 'SL', 'Sierra Leone'),
(203, 65, 'SG', 'Singapore'),
(204, 1, 'SX', 'Sint Maarten'),
(205, 421, 'SK', 'Slovakia'),
(206, 386, 'SI', 'Slovenia'),
(207, 677, 'SB', 'Solomon Islands'),
(208, 252, 'SO', 'Somalia'),
(209, 27, 'ZA', 'South Africa'),
(210, 500, 'GS', 'South Georgia and the South Sandwich Islands'),
(211, 211, 'SS', 'South Sudan'),
(212, 34, 'ES', 'Spain'),
(213, 94, 'LK', 'Sri Lanka'),
(214, 249, 'SD', 'Sudan'),
(215, 597, 'SR', 'Suriname'),
(216, 47, 'SJ', 'Svalbard and Jan Mayen'),
(217, 268, 'SZ', 'Swaziland'),
(218, 46, 'SE', 'Sweden'),
(219, 41, 'CH', 'Switzerland'),
(220, 963, 'SY', 'Syrian Arab Republic'),
(221, 886, 'TW', 'Taiwan, Province of China'),
(222, 992, 'TJ', 'Tajikistan'),
(223, 255, 'TZ', 'Tanzania, United Republic of'),
(224, 66, 'TH', 'Thailand'),
(225, 670, 'TL', 'Timor-Leste'),
(226, 228, 'TG', 'Togo'),
(227, 690, 'TK', 'Tokelau'),
(228, 676, 'TO', 'Tonga'),
(229, 1868, 'TT', 'Trinidad and Tobago'),
(230, 216, 'TN', 'Tunisia'),
(231, 90, 'TR', 'Turkey'),
(232, 7370, 'TM', 'Turkmenistan'),
(233, 1649, 'TC', 'Turks and Caicos Islands'),
(234, 688, 'TV', 'Tuvalu'),
(235, 256, 'UG', 'Uganda'),
(236, 380, 'UA', 'Ukraine'),
(237, 971, 'AE', 'United Arab Emirates'),
(238, 44, 'GB', 'United Kingdom'),
(239, 1, 'US', 'United States'),
(240, 1, 'UM', 'United States Minor Outlying Islands'),
(241, 598, 'UY', 'Uruguay'),
(242, 998, 'UZ', 'Uzbekistan'),
(243, 678, 'VU', 'Vanuatu'),
(244, 58, 'VE', 'Venezuela'),
(245, 84, 'VN', 'Viet Nam'),
(246, 1284, 'VG', 'Virgin Islands, British'),
(247, 1340, 'VI', 'Virgin Islands, U.s.'),
(248, 681, 'WF', 'Wallis and Futuna'),
(249, 212, 'EH', 'Western Sahara'),
(250, 967, 'YE', 'Yemen'),
(251, 260, 'ZM', 'Zambia'),
(252, 263, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `etiket`
--

DROP TABLE IF EXISTS `etiket`;
CREATE TABLE IF NOT EXISTS `etiket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `etiket`
--

INSERT INTO `etiket` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Mathematics and statistics', 1, '2022-01-08 13:46:36', '2022-01-08 13:46:36'),
(7, 'Business and Economics', 1, '2022-01-08 13:46:18', '2022-01-08 13:46:18'),
(8, 'Health and Medicine', 1, '2022-01-08 13:46:28', '2022-01-08 13:46:28'),
(10, 'Engineering and Technology', 1, '2022-01-08 13:46:47', '2022-01-08 13:46:47'),
(11, 'Education', 1, '2022-01-08 13:46:55', '2022-01-08 13:46:55'),
(12, 'Social Sciences and Humanities', 1, '2022-01-08 13:47:01', '2022-01-08 13:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `etkinlik`
--

DROP TABLE IF EXISTS `etkinlik`;
CREATE TABLE IF NOT EXISTS `etkinlik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `website` text,
  `date` datetime DEFAULT NULL,
  `date1` datetime DEFAULT NULL,
  `email` text,
  `country` text,
  `text` text,
  `etiket` text,
  `image` text,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `url` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `etkinlik`
--

INSERT INTO `etkinlik` (`id`, `title`, `website`, `date`, `date1`, `email`, `country`, `text`, `etiket`, `image`, `user_id`, `status`, `url`, `created_at`, `updated_at`) VALUES
(21, '1205th International Conference on Economics and Finance', 'http://researchworld.org/Conference2022/Russia/1/ICEFR/', '2022-01-26 18:51:00', '2022-01-11 18:51:00', 'info@researchworld.org', 'MX', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', '7', 'uploads/event/1205th-international-conference-on-economics-and-finance.png', 1, 1, '1205th-international-conference-on-economics-and-finance', '2022-01-08 13:52:51', '2022-01-09 22:01:51'),
(23, '1026th International Conference on Science, Engineering & Technology (ICSET)', 'http://researchfora.com/Conference2022/Spain/1/ICSET/', '2022-01-25 04:00:00', '2022-01-29 06:01:00', 'info@researchfora.com', 'ES', '\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"', '12', 'uploads/event/1026th-international-conference-on-science-engineering-technology-icset.jpg', 1, 1, '1026th-international-conference-on-science-engineering-technology-icset', '2022-01-09 22:01:43', '2022-01-09 22:01:43'),
(24, 'International Conference on Finance, Bank & Economics', 'http://sciencefora.org/Conference/10660/ICFBE/', '2022-02-07 04:06:00', '2022-02-24 06:06:00', 'info.sciencefora@gmail.com', 'AZ', '\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"', '12', 'uploads/event/international-conference-on-finance-bank-economics.jpg', 1, 1, 'international-conference-on-finance-bank-economics', '2022-01-09 22:07:40', '2022-01-09 22:07:40');

-- --------------------------------------------------------

--
-- Table structure for table `hakkimizda`
--

DROP TABLE IF EXISTS `hakkimizda`;
CREATE TABLE IF NOT EXISTS `hakkimizda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `text` text,
  `image` text,
  `user_id` int(11) DEFAULT NULL,
  `lang` text,
  `lang_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hakkimizda`
--

INSERT INTO `hakkimizda` (`id`, `title`, `text`, `image`, `user_id`, `lang`, `lang_id`, `created_at`, `updated_at`) VALUES
(1, 'Hakkımızda', '<p style=\"margin-bottom: 15px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 24px; font-family: \"Open Sans\", HelveticaNeue, \"Helvetica Neue\", Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(136, 136, 136); letter-spacing: normal;\">onec ut molestie turpis, elementum tempor metus. Vestibulum non nibh porttitor, eleifend purus eu, pulvinar orci. Quisque a gravida lorem, eu lobortis magna. Nulla auctor urna quis facilisis pretium. Cras facilisis risus sed mauris gravida, id vestibulum erat dictum. Nam in ante massa. Integer ultricies libero lorem, egestas dictum augue aliquam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis.</p><p style=\"margin-bottom: 15px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 24px; font-family: \"Open Sans\", HelveticaNeue, \"Helvetica Neue\", Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(136, 136, 136); letter-spacing: normal;\">Elementum tempor metus donec ut molestie turpis. Vestibulum non nibh porttitor, eleifend purus eu, pulvinar orci. Quisque a gravida lorem, eu lobortis magna. Nulla auctor urna quis facilisis pretium. Cras facilisis risus sed mauris gravida, id vestibulum erat dictum. Nam in ante massa. Integer ultricies libero lorem.</p>', 'uploads/hakkimizda/turkce-baslik.jpg', NULL, 'tr', 1635233954, NULL, '2021-12-07 19:13:27'),
(2, 'Ingilizce Baslik', '<p>Ingilizce Icerim<br></p>', 'uploads/hakkimizda/ingilizce-baslik.jpg', NULL, 'en', 1635233954, NULL, '2021-11-01 05:33:02');

-- --------------------------------------------------------

--
-- Table structure for table `hakkimizda_gorsel`
--

DROP TABLE IF EXISTS `hakkimizda_gorsel`;
CREATE TABLE IF NOT EXISTS `hakkimizda_gorsel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hakkimizda_id` int(11) DEFAULT NULL,
  `gorsel` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hakkimizda_gorsel`
--

INSERT INTO `hakkimizda_gorsel` (`id`, `hakkimizda_id`, `gorsel`) VALUES
(6, 1635233954, '/uploads/hakkimizdaimages/16417660970.jpeg'),
(7, 1635233954, '/uploads/hakkimizdaimages/16417660971.jpeg'),
(8, 1635233954, '/uploads/hakkimizdaimages/16417660972.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `iletisim`
--

DROP TABLE IF EXISTS `iletisim`;
CREATE TABLE IF NOT EXISTS `iletisim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tel_1` int(11) DEFAULT NULL,
  `tel_2` int(11) DEFAULT NULL,
  `tel_3` int(11) DEFAULT NULL,
  `email_1` text,
  `email_2` text,
  `adres` text,
  `iframe` text,
  `lang` text,
  `lang_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `iletisim`
--

INSERT INTO `iletisim` (`id`, `tel_1`, `tel_2`, `tel_3`, `email_1`, `email_2`, `adres`, `iframe`, `lang`, `lang_id`, `created_at`, `updated_at`) VALUES
(1, 4441728, NULL, NULL, 'sakaryauni@sakarya.edu.tr', NULL, 'Esentepe Kampüsü, Üniversite Cd., 54050', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12091.635064557599!2d30.332731!3d40.742033!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc7996fa884f94c03!2sSakarya%20%C3%9Cniversitesi!5e0!3m2!1str!2str!4v1638826888250!5m2!1str!2str\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'tr', 1635233954, NULL, '2021-12-27 02:05:59');

-- --------------------------------------------------------

--
-- Table structure for table `iletisim_form`
--

DROP TABLE IF EXISTS `iletisim_form`;
CREATE TABLE IF NOT EXISTS `iletisim_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` text,
  `email` text,
  `text` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `iletisim_form`
--

INSERT INTO `iletisim_form` (`id`, `ad`, `email`, `text`, `created_at`, `updated_at`) VALUES
(1, 'Elmar', 'elmar.dadashow@gmail.com', 'Deneme Mesaj', '2022-01-06 01:13:34', '2022-01-06 01:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `istatistik`
--

DROP TABLE IF EXISTS `istatistik`;
CREATE TABLE IF NOT EXISTS `istatistik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `page` text,
  `device` mediumtext,
  `browser` mediumtext,
  `ms` mediumtext,
  `tekil` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2124 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `istatistik`
--

INSERT INTO `istatistik` (`id`, `ip`, `date`, `page`, `device`, `browser`, `ms`, `tekil`) VALUES
(2123, '127.0.0.1', '2020-11-18 17:55:10', 'anasayfa', 'Windows 10', 'Firefox', 'SYSTEM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `langs`
--

DROP TABLE IF EXISTS `langs`;
CREATE TABLE IF NOT EXISTS `langs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang` text,
  `langName` text,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `langs`
--

INSERT INTO `langs` (`id`, `lang`, `langName`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'tr', 'Türkçe', '2021-02-19 16:52:36', '2021-02-19 16:52:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` char(49) COLLATE utf8_turkish_ci DEFAULT NULL,
  `iso_639_1` char(2) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `iso_639_1` (`iso_639_1`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `iso_639_1`) VALUES
(1, 'English', 'en'),
(2, 'Afar', 'aa'),
(3, 'Abkhazian', 'ab'),
(4, 'Afrikaans', 'af'),
(5, 'Amharic', 'am'),
(6, 'Arabic', 'ar'),
(7, 'Assamese', 'as'),
(8, 'Aymara', 'ay'),
(9, 'Azerbaijani', 'az'),
(10, 'Bashkir', 'ba'),
(11, 'Belarusian', 'be'),
(12, 'Bulgarian', 'bg'),
(13, 'Bihari', 'bh'),
(14, 'Bislama', 'bi'),
(15, 'Bengali/Bangla', 'bn'),
(16, 'Tibetan', 'bo'),
(17, 'Breton', 'br'),
(18, 'Catalan', 'ca'),
(19, 'Corsican', 'co'),
(20, 'Czech', 'cs'),
(21, 'Welsh', 'cy'),
(22, 'Danish', 'da'),
(23, 'German', 'de'),
(24, 'Bhutani', 'dz'),
(25, 'Greek', 'el'),
(26, 'Esperanto', 'eo'),
(27, 'Spanish', 'es'),
(28, 'Estonian', 'et'),
(29, 'Basque', 'eu'),
(30, 'Persian', 'fa'),
(31, 'Finnish', 'fi'),
(32, 'Fiji', 'fj'),
(33, 'Faeroese', 'fo'),
(34, 'French', 'fr'),
(35, 'Frisian', 'fy'),
(36, 'Irish', 'ga'),
(37, 'Scots/Gaelic', 'gd'),
(38, 'Galician', 'gl'),
(39, 'Guarani', 'gn'),
(40, 'Gujarati', 'gu'),
(41, 'Hausa', 'ha'),
(42, 'Hindi', 'hi'),
(43, 'Croatian', 'hr'),
(44, 'Hungarian', 'hu'),
(45, 'Armenian', 'hy'),
(46, 'Interlingua', 'ia'),
(47, 'Interlingue', 'ie'),
(48, 'Inupiak', 'ik'),
(49, 'Indonesian', 'in'),
(50, 'Icelandic', 'is'),
(51, 'Italian', 'it'),
(52, 'Hebrew', 'iw'),
(53, 'Japanese', 'ja'),
(54, 'Yiddish', 'ji'),
(55, 'Javanese', 'jw'),
(56, 'Georgian', 'ka'),
(57, 'Kazakh', 'kk'),
(58, 'Greenlandic', 'kl'),
(59, 'Cambodian', 'km'),
(60, 'Kannada', 'kn'),
(61, 'Korean', 'ko'),
(62, 'Kashmiri', 'ks'),
(63, 'Kurdish', 'ku'),
(64, 'Kirghiz', 'ky'),
(65, 'Latin', 'la'),
(66, 'Lingala', 'ln'),
(67, 'Laothian', 'lo'),
(68, 'Lithuanian', 'lt'),
(69, 'Latvian/Lettish', 'lv'),
(70, 'Malagasy', 'mg'),
(71, 'Maori', 'mi'),
(72, 'Macedonian', 'mk'),
(73, 'Malayalam', 'ml'),
(74, 'Mongolian', 'mn'),
(75, 'Moldavian', 'mo'),
(76, 'Marathi', 'mr'),
(77, 'Malay', 'ms'),
(78, 'Maltese', 'mt'),
(79, 'Burmese', 'my'),
(80, 'Nauru', 'na'),
(81, 'Nepali', 'ne'),
(82, 'Dutch', 'nl'),
(83, 'Norwegian', 'no'),
(84, 'Occitan', 'oc'),
(85, '(Afan)/Oromoor/Oriya', 'om'),
(86, 'Punjabi', 'pa'),
(87, 'Polish', 'pl'),
(88, 'Pashto/Pushto', 'ps'),
(89, 'Portuguese', 'pt'),
(90, 'Quechua', 'qu'),
(91, 'Rhaeto-Romance', 'rm'),
(92, 'Kirundi', 'rn'),
(93, 'Romanian', 'ro'),
(94, 'Russian', 'ru'),
(95, 'Kinyarwanda', 'rw'),
(96, 'Sanskrit', 'sa'),
(97, 'Sindhi', 'sd'),
(98, 'Sangro', 'sg'),
(99, 'Serbo-Croatian', 'sh'),
(100, 'Singhalese', 'si'),
(101, 'Slovak', 'sk'),
(102, 'Slovenian', 'sl'),
(103, 'Samoan', 'sm'),
(104, 'Shona', 'sn'),
(105, 'Somali', 'so'),
(106, 'Albanian', 'sq'),
(107, 'Serbian', 'sr'),
(108, 'Siswati', 'ss'),
(109, 'Sesotho', 'st'),
(110, 'Sundanese', 'su'),
(111, 'Swedish', 'sv'),
(112, 'Swahili', 'sw'),
(113, 'Tamil', 'ta'),
(114, 'Telugu', 'te'),
(115, 'Tajik', 'tg'),
(116, 'Thai', 'th'),
(117, 'Tigrinya', 'ti'),
(118, 'Turkmen', 'tk'),
(119, 'Tagalog', 'tl'),
(120, 'Setswana', 'tn'),
(121, 'Tonga', 'to'),
(122, 'Turkish', 'tr'),
(123, 'Tsonga', 'ts'),
(124, 'Tatar', 'tt'),
(125, 'Twi', 'tw'),
(126, 'Ukrainian', 'uk'),
(127, 'Urdu', 'ur'),
(128, 'Uzbek', 'uz'),
(129, 'Vietnamese', 'vi'),
(130, 'Volapuk', 'vo'),
(131, 'Wolof', 'wo'),
(132, 'Xhosa', 'xh'),
(133, 'Yoruba', 'yo'),
(134, 'Chinese', 'zh'),
(135, 'Zulu', 'zu');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `moduleName` text,
  `moduleController` text,
  `moduleLink` text,
  `moduleSlug` text,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `moduleName`, `moduleController`, `moduleLink`, `moduleSlug`, `status`) VALUES
(1, 'Anasayfa', 'HomeController', '/', 'anasayfa', 1),
(2, 'Üyeler', 'AdminController', '/uyeler', 'uyeler', 1);

-- --------------------------------------------------------

--
-- Table structure for table `referans`
--

DROP TABLE IF EXISTS `referans`;
CREATE TABLE IF NOT EXISTS `referans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `link` text,
  `image` text,
  `status` int(11) DEFAULT '1',
  `user_id` int(11) DEFAULT NULL,
  `lang` text,
  `lang_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `referans`
--

INSERT INTO `referans` (`id`, `title`, `link`, `image`, `status`, `user_id`, `lang`, `lang_id`, `created_at`, `updated_at`) VALUES
(34, 'Logo 5', 'https://www.google.com', 'uploads/referans/logo-5.png', 1, NULL, 'tr', 1640569175, '2021-12-27 01:39:35', '2021-12-31 15:29:56'),
(35, 'Logo 6', 'https://www.google.com', 'uploads/referans/logo-6.png', 1, NULL, 'tr', 1640569196, '2021-12-27 01:39:56', '2021-12-31 15:30:03'),
(31, 'Logo 2', 'https://www.google.com', 'uploads/referans/logo-2.png', 1, NULL, 'tr', 1640569112, '2021-12-27 01:38:32', '2021-12-31 15:30:08'),
(32, 'Logo 4', 'https://www.google.com', 'uploads/referans/logo-4.png', 1, NULL, 'tr', 1640569127, '2021-12-27 01:38:47', '2021-12-31 15:30:28'),
(33, 'Logo 3', 'https://www.google.com', 'uploads/referans/logo-3.png', 1, NULL, 'tr', 1640569151, '2021-12-27 01:39:11', '2021-12-31 15:31:51'),
(30, 'Logo', 'https://www.google.com', 'uploads/referans/logo.png', 0, NULL, 'tr', 1640568910, '2021-12-27 01:35:10', '2021-12-31 15:32:16');

-- --------------------------------------------------------

--
-- Table structure for table `sayfa`
--

DROP TABLE IF EXISTS `sayfa`;
CREATE TABLE IF NOT EXISTS `sayfa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `url` text,
  `title` text,
  `text` text,
  `image` text,
  `status` int(11) NOT NULL DEFAULT '0',
  `link` text,
  `sira` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `kategori` text,
  `kategori_tree` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sayfa`
--

INSERT INTO `sayfa` (`id`, `name`, `url`, `title`, `text`, `image`, `status`, `link`, `sira`, `type`, `kategori`, `kategori_tree`, `created_at`, `updated_at`) VALUES
(9, NULL, NULL, 'Google', NULL, NULL, 0, 'https://www.google.com', NULL, NULL, NULL, NULL, '2021-12-30 20:23:20', '2021-12-30 20:23:32'),
(8, NULL, 'sakarya', 'Sakarya', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; letter-spacing: normal;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; letter-spacing: normal;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', NULL, 0, NULL, 1, 1, NULL, NULL, '2021-12-30 20:19:35', '2021-12-30 20:19:59');

-- --------------------------------------------------------

--
-- Table structure for table `sayfa_gorsel`
--

DROP TABLE IF EXISTS `sayfa_gorsel`;
CREATE TABLE IF NOT EXISTS `sayfa_gorsel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sayfa_id` int(11) DEFAULT NULL,
  `gorsel` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sayfa_gorsel`
--

INSERT INTO `sayfa_gorsel` (`id`, `sayfa_id`, `gorsel`) VALUES
(1, NULL, NULL),
(2, 3, '/uploads/blogimages/16357552700.jpeg'),
(3, 3, '/uploads/sayfa/16405541530.jpeg'),
(4, 3, '/uploads/sayfa/16405541531.jpeg'),
(5, 3, '/uploads/sayfa/16405541532.jpeg'),
(6, 8, '/uploads/sayfa/16408955990.jpeg'),
(7, 8, '/uploads/sayfa/16408955991.jpeg'),
(8, 8, '/uploads/sayfa/16408955992.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `sayfa_kategori`
--

DROP TABLE IF EXISTS `sayfa_kategori`;
CREATE TABLE IF NOT EXISTS `sayfa_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` text,
  `kategori_tree` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sayfa_kategori`
--

INSERT INTO `sayfa_kategori` (`id`, `kategori`, `kategori_tree`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Deneme Genels', 0, 1, '2021-12-26 20:54:43', '2021-12-26 21:12:20'),
(2, 'Deneem Alt', 1, 0, '2021-12-26 20:55:02', '2021-12-26 20:55:02');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siteName` text,
  `siteDescription` text,
  `siteAuthorName` text,
  `siteAuthorLink` text,
  `siteLogo` text,
  `siteFavicon` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `siteName`, `siteDescription`, `siteAuthorName`, `siteAuthorLink`, `siteLogo`, `siteFavicon`) VALUES
(1, 'Panel', 'Panel hakkında açıklama yazınız buraya gelir', 'IFeelCode', 'https://ifeelcode.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `site_ayarlar`
--

DROP TABLE IF EXISTS `site_ayarlar`;
CREATE TABLE IF NOT EXISTS `site_ayarlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_name` text,
  `site_description` text,
  `site_footer_text` text,
  `site_google` int(11) DEFAULT NULL,
  `site_logo` text,
  `site_favicon` text,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site_ayarlar`
--

INSERT INTO `site_ayarlar` (`id`, `site_name`, `site_description`, `site_footer_text`, `site_google`, `site_logo`, `site_favicon`, `updated_at`) VALUES
(1, 'Site Başlığı', 'Site Açıklama', 'Footer Textt', 0, '1604080337.png', '1606742471.jpeg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `title_2` text,
  `image` text,
  `video` text,
  `sira` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `user_id` int(11) DEFAULT NULL,
  `lang` text,
  `lang_id` int(11) DEFAULT NULL,
  `buton` text,
  `url` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `title_2`, `image`, `video`, `sira`, `status`, `user_id`, `lang`, `lang_id`, `buton`, `url`, `created_at`, `updated_at`) VALUES
(15, 'Section 1.10.33 of \"de Finibus Bonorum et Malorum\"', '1914 translation by H. Rackham', 'uploads/slider/section-11033-of-de-finibus-bonorum-et-malorum.jpg', NULL, NULL, 1, NULL, 'tr', 1641768827, NULL, NULL, '2022-01-09 22:53:47', '2022-01-09 22:53:47'),
(14, 'The standard Lorem Ipsum passage', '1914 translation by H. Rackham', 'uploads/slider/the-standard-lorem-ipsum-passage.jpg', NULL, NULL, 1, NULL, 'tr', 1641162574, NULL, NULL, '2022-01-02 22:29:35', '2022-01-09 22:54:07');

-- --------------------------------------------------------

--
-- Table structure for table `sosyal_medya`
--

DROP TABLE IF EXISTS `sosyal_medya`;
CREATE TABLE IF NOT EXISTS `sosyal_medya` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facebook` text,
  `instagram` text,
  `twitter` text,
  `linkedin` text,
  `youtube` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sosyal_medya`
--

INSERT INTO `sosyal_medya` (`id`, `facebook`, `instagram`, `twitter`, `linkedin`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'Instagram', 'Twitter', 'Linkedin', 'Youtube', NULL, '2021-11-09 10:18:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` text CHARACTER SET utf8,
  `image` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `role` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `image`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin1', NULL, 'uploads/user/ifeelcodee.jpg', 'admin@gmail.com', NULL, '$2y$10$/VN49fWrMjMo3ApMVORl7.gBHUleAXOcxhElLGg71fiqpYZuxFzx6', NULL, 0, 1, '2020-02-10 00:42:39', '2022-01-09 18:50:14');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
