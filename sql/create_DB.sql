-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 26, 2010 at 06:56 AM
-- Server version: 5.1.40
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `joelotz_pm`
--

-- --------------------------------------------------------

--
-- Table structure for table `completed`
--
DROP TABLE IF EXISTS `completed`;
CREATE TABLE IF NOT EXISTS `completed` (
  `completedID` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `jobsID` varchar(30) NOT NULL,
  `equipmentID` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `notes` text,
  `dueDate` date NOT NULL,
  `completedDate` date NOT NULL,
  `discipline` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`completedID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2345 ;

-- --------------------------------------------------------

--
-- Table structure for table `discipline`
--
DROP TABLE IF EXISTS `discipline`;
CREATE TABLE IF NOT EXISTS `discipline` (
  `disciplineID` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`disciplineID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `equipcategory`
--
DROP TABLE IF EXISTS `equipcategory`;
CREATE TABLE IF NOT EXISTS `equipcategory` (
  `categoryID` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(30) NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--
DROP TABLE IF EXISTS `equipment`;
CREATE TABLE IF NOT EXISTS `equipment` (
  `equipmentID` varchar(30) NOT NULL,
  `description` text,
  `location` varchar(30) DEFAULT NULL,
  `category_name` varchar(30) NOT NULL,
  PRIMARY KEY (`equipmentID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `jobsID` varchar(30) NOT NULL,
  `equipmentID` varchar(30) NOT NULL,
  `description` text,
  `actions` text,
  `timeInterval` smallint(6) DEFAULT NULL,
  `timeUnit` varchar(20) DEFAULT NULL,
  `startDate` date NOT NULL,
  `lastDate` date DEFAULT NULL,
  `nextDate` date DEFAULT NULL,
  `discipline` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=250 ;

