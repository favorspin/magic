# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.34)
# Database: magic
# Generation Time: 2014-05-31 14:55:08 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table cards
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cards`;

CREATE TABLE `cards` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `manaCost` varchar(50) NOT NULL,
  `cmc` int(11) NOT NULL,
  `colors` varchar(256) NOT NULL,
  `type` varchar(256) NOT NULL,
  `supertypes` varchar(256) DEFAULT NULL,
  `types` varchar(256) DEFAULT NULL,
  `subtypes` varchar(256) DEFAULT NULL,
  `rarity` varchar(50) NOT NULL,
  `text` varchar(256) DEFAULT NULL,
  `flavor` varchar(256) DEFAULT NULL,
  `artist` varchar(256) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `power` varchar(50) DEFAULT NULL,
  `toughness` varchar(50) DEFAULT NULL,
  `loyalty` int(11) DEFAULT NULL,
  `layout` varchar(50) NOT NULL,
  `multiverseid` int(11) NOT NULL,
  `variations` varchar(256) DEFAULT NULL,
  `imageName` varchar(256) NOT NULL,
  `watermark` varchar(50) DEFAULT NULL,
  `border` varchar(50) DEFAULT NULL,
  `hand` varchar(50) DEFAULT NULL,
  `life` varchar(50) DEFAULT NULL,
  `rulings` varchar(256) DEFAULT NULL,
  `foreignNames` varchar(256) DEFAULT NULL,
  `printings` varchar(256) DEFAULT NULL,
  `originalText` varchar(256) DEFAULT NULL,
  `originalType` varchar(50) DEFAULT NULL,
  `legalities` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table sets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sets`;

CREATE TABLE `sets` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `code` varchar(50) NOT NULL,
  `gatherer_code` varchar(50) NOT NULL,
  `oldCode` varchar(50) NOT NULL,
  `release_date` date NOT NULL,
  `border` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `block` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
