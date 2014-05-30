-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 26, 2014 at 07:32 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `magic`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE IF NOT EXISTS `cards` (
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
  `power` varchar(11) DEFAULT NULL,
  `toughness` varchar(11) DEFAULT NULL,
  `layout` varchar(50) NOT NULL,
  `multiverseid` int(11) NOT NULL,
  `imageName` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sets`
--

CREATE TABLE IF NOT EXISTS `sets` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `code` varchar(50) NOT NULL,
  `gatherer_code` varchar(50) NOT NULL,
  `release_date` date NOT NULL,
  `border` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
