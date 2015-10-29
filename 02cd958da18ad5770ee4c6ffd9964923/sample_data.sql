-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2015 at 06:06 AM
-- Server version: 5.6.17-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `date`) VALUES
(2, 'Test Article', 'Donec tristique vestibulum ultrices. Cras ac est nec diam elementum ultricies id ut neque. Praesent mollis consequat urna vitae eleifend. Cras diam arcu, porta ut diam quis, molestie consectetur velit. Nunc vitae augue a tellus rhoncus tincidunt. Phasellus ac tellus ut arcu pharetra auctor id fermentum ligula. Quisque elementum a tortor quis pharetra. Integer a massa ac lorem dapibus consequat. Sed ultrices sit amet nisl in vehicula. Donec facilisis libero enim, vitae maximus velit maximus id. Phasellus commodo gravida sem, vel fermentum augue cursus sed. Ut pulvinar, metus nec congue luctus, nunc eros congue nibh, sit amet consequat tellus lorem pretium odio. Proin ac hendrerit tellus. Quisque euismod semper ex sed placerat.', '2015-10-29 03:02:35'),
(11, 'Lorem ipsum!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur eget sapien vitae euismod. Vivamus eu efficitur ex. Pellentesque et accumsan sapien. Donec ornare sodales dolor at porttitor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris rutrum, dolor sed finibus tempor, diam augue iaculis lacus, vitae posuere elit dui placerat risus. Mauris dignissim scelerisque magna sed euismod. Nullam vitae nisl sapien. Phasellus ac pharetra tellus, sit amet hendrerit nunc. Morbi dictum, dolor a lobortis eleifend, metus nisi placerat magna, sit amet elementum est lacus in ipsum. Etiam vel mauris id turpis ullamcorper faucibus. In et varius ex. Praesent eu hendrerit enim.', '2015-10-29 04:56:14');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
