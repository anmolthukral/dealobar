-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 26, 2016 at 12:55 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `1213052`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category` varchar(200) NOT NULL,
  `cathref` varchar(200) NOT NULL,
  `products` int(11) NOT NULL,
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `category` (`category`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `dateposted` datetime NOT NULL,
  `name` varchar(200) NOT NULL,
  `link` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `parentsite` varchar(50) NOT NULL,
  `category` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `sellingprice` varchar(20) NOT NULL,
  `keywords` text NOT NULL,
  `details` text NOT NULL,
  `coupons` text NOT NULL,
  `localimage` text NOT NULL,
  `discount` varchar(4) NOT NULL,
  `categoryid` varchar(100) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `usertoken` varchar(259) NOT NULL,
  `id` bigint(20) NOT NULL,
  `review` text NOT NULL,
  `date` date NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `review_id` varchar(100) NOT NULL,
  UNIQUE KEY `review_id` (`review_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `secret`
--

CREATE TABLE IF NOT EXISTS `secret` (
  `secret` varchar(259) NOT NULL,
  `id` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `secret`
--

INSERT INTO `secret` (`secret`, `id`) VALUES
('yada', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userauthentication`
--

CREATE TABLE IF NOT EXISTS `userauthentication` (
  `email` varchar(259) DEFAULT NULL,
  `password` varchar(259) DEFAULT NULL,
  `usertoken` varchar(259) NOT NULL DEFAULT '',
  PRIMARY KEY (`usertoken`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `userproperties`
--

CREATE TABLE IF NOT EXISTS `userproperties` (
  `email` varchar(200) NOT NULL,
  `usertoken` varchar(259) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lastlogin` datetime NOT NULL,
  `lastlogout` datetime NOT NULL,
  `is_login` tinyint(1) NOT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `usertoken` (`usertoken`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
