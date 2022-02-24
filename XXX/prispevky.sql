-- Adminer 4.8.1 MySQL 5.5.5-10.4.19-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `prispevky`;
CREATE TABLE `prispevky` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `meno` varchar(20) NOT NULL,
  `prispevok` text NOT NULL,
  `cas` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `prispevky` (`id`, `meno`, `prispevok`, `cas`) VALUES
(1,	'Peter Holuz',	'Rád by som sa s Vami podelil o jednu zaujímavú stránku. Určite navštívne [url]http://zenit.svsbb.sk[/url]',	'2015-09-01 11:15:00'),
(2,	'Eva Krahulová',	'Dobrý deň, \nod dnešného dňa môžete vkladať príspevky do našej [b]knihy návštev[/b]. Budeme Vám vdačný za každý Váš postreh a názor.\nS pozdravom [u]Eva Krahulová[/u]',	'2016-06-26 01:10:00'),
(3,	'Magnus',	'Toto je super stránka na testovanie [i]PHP, JavaScript a MySQL[/i] útokov.\nAspoň zisťím, čí im to funguje alebo nie, muhaha',	'2017-10-17 10:05:00'),
(5,	'John',	'Doe',	'2021-11-30 11:33:42'),
(6,	'John',	'Doe',	'2021-11-30 11:34:06'),
(7,	'Peter',	'test',	'2021-11-30 11:35:27'),
(8,	'skuska',	'test',	'2021-11-30 11:36:22'),
(9,	'fugujeto',	'nice',	'2021-11-30 11:37:00');

-- 2021-11-30 12:22:35
