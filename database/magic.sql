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
  `card_id` int(11) NOT NULL AUTO_INCREMENT,
  `set_id` int(11) NOT NULL,
  `card_multiverse_id` int(11) DEFAULT NULL,    
  `card_name` varchar(256) NOT NULL,
  `card_mana_cost` varchar(50) NOT NULL,
  `card_cmc` int(11) NOT NULL,
  `card_colors` varchar(256) NOT NULL,
  `card_type` varchar(256) NOT NULL,
  `card_supertypes` varchar(256) DEFAULT NULL,
  `card_types` varchar(256) DEFAULT NULL,
  `card_subtypes` varchar(256) DEFAULT NULL,
  `card_rarity` varchar(50) NOT NULL,
  `card_text` text DEFAULT NULL,
  `card_flavor` varchar(256) DEFAULT NULL,
  `card_artist` varchar(256) NOT NULL,
  `card_number` int(11) DEFAULT NULL,
  `card_power` varchar(50) DEFAULT NULL,
  `card_toughness` varchar(50) DEFAULT NULL,
  `card_loyalty` int(11) DEFAULT NULL,
  `card_layout` varchar(50) NOT NULL,
  `card_variations` varchar(256) DEFAULT NULL,
  `card_image_name` varchar(256) NOT NULL,
  `card_watermark` varchar(50) DEFAULT NULL,
  `card_border` varchar(50) DEFAULT NULL,
  `card_hand` varchar(50) DEFAULT NULL,
  `card_life` varchar(50) DEFAULT NULL,
  `card_rulings` varchar(256) DEFAULT NULL,
  `card_foreign_names` varchar(256) DEFAULT NULL,
  `card_printings` varchar(256) DEFAULT NULL,
  `card_original_text` varchar(256) DEFAULT NULL,
  `card_original_type` varchar(50) DEFAULT NULL,
  `card_legalities` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`card_id`),
  INDEX(`card_multiverse_id`),
  INDEX(`set_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table sets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sets`;

CREATE TABLE `sets` (
  `set_id` int(11) NOT NULL AUTO_INCREMENT,  
  `set_code` varchar(50) NOT NULL,
  `set_name` varchar(256) NOT NULL,
  `set_gatherer_code` varchar(50) NOT NULL,
  `set_oldCode` varchar(50) NOT NULL,
  `set_release_date` date NOT NULL,
  `set_border` varchar(50) NOT NULL,
  `set_type` varchar(50) NOT NULL,
  `set_block` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`set_id`),
  INDEX(`set_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
