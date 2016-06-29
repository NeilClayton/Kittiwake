-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 29, 2016 at 05:52 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_shopping_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE IF NOT EXISTS `tbl_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `name`) VALUES
(1, 'Birthday Cards'),
(2, 'Christmas Cards'),
(3, 'Happy new year cards');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE IF NOT EXISTS `tbl_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `category_id`, `name`, `description`, `price`, `image`) VALUES
(1, 1, 'Unisex 18th Birthday Card', 'Unisex 18th Birthday Card description here.', 3.00, '18_birthday_card.jpg'),
(2, 1, 'Female 18th Birthday Card', 'Female 18th Birthday Card description here.', 3.00, 'female_18_birthday_card.jpg'),
(3, 2, 'Landscape Christmas Card', 'Landscape Christmas Card description here.', 4.00, 'landscape_christmas_card.jpeg'),
(4, 1, 'Female Birthday Card', 'Female Birthday Card description here.', 5.00, 'female_birthday_card.jpg'),
(5, 2, 'Portrait Christmas Card', 'Portrait Christmas Card description here.', 14.00, 'portrait_christmas_card.jpeg'),
(6, 2, 'Blue Christmas Card', 'Blue Christmas Card description here', 20.00, 'blue_christmas_card.jpg'),
(7, 2, 'Starry Night Christmas Card', 'Starry Night Christmas Card description here.', 40.00, 'stars_blue_christmas_card.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
