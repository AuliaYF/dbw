-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2014 at 02:56 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project_forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(8) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) DEFAULT NULL,
  `cat_desc` text,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_desc`) VALUES
(4, 'Testz', 'ini test'),
(6, 'Android', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE IF NOT EXISTS `replies` (
  `rp_id` int(8) NOT NULL AUTO_INCREMENT,
  `rp_title` text,
  `rp_content` text,
  `rp_date` datetime DEFAULT NULL,
  `rp_thread` int(8) NOT NULL,
  `rp_starter` int(8) NOT NULL,
  PRIMARY KEY (`rp_id`),
  KEY `rp_starter` (`rp_starter`),
  KEY `rp_thread` (`rp_thread`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE IF NOT EXISTS `threads` (
  `th_id` int(8) NOT NULL AUTO_INCREMENT,
  `th_title` text NOT NULL,
  `th_date` date NOT NULL,
  `th_topic` int(8) NOT NULL,
  `th_icon` int(8) DEFAULT NULL,
  `th_starter` int(8) NOT NULL,
  PRIMARY KEY (`th_id`),
  KEY `th_topic` (`th_topic`),
  KEY `th_starter` (`th_starter`),
  KEY `th_icon` (`th_icon`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`th_id`, `th_title`, `th_date`, `th_topic`, `th_icon`, `th_starter`) VALUES
(2, 'test thread', '0000-00-00', 6, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `tp_id` int(8) NOT NULL AUTO_INCREMENT,
  `tp_title` text NOT NULL,
  `tp_cat` int(8) NOT NULL,
  `tp_icon` int(8) DEFAULT NULL,
  `tp_desc` text,
  PRIMARY KEY (`tp_id`),
  KEY `tp_cat` (`tp_cat`),
  KEY `tp_icon` (`tp_icon`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`tp_id`, `tp_title`, `tp_cat`, `tp_icon`, `tp_desc`) VALUES
(5, 'asdasd', 6, NULL, 'asdasdasd'),
(6, 'Testasd', 4, NULL, 'asdasdsa');

-- --------------------------------------------------------

--
-- Table structure for table `tp_icons`
--

CREATE TABLE IF NOT EXISTS `tp_icons` (
  `ti_id` int(8) NOT NULL AUTO_INCREMENT,
  `ti_image` longblob,
  `ti_desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ti_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(8) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_profile_pic` longblob,
  `user_profile_signature` text,
  `user_date_joined` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_profile_pic`, `user_profile_signature`, `user_date_joined`) VALUES
(1, 'ucup', 'auliayf', 'auliayf@gmail.com', NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_ibfk_2` FOREIGN KEY (`rp_starter`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `replies_ibfk_3` FOREIGN KEY (`rp_thread`) REFERENCES `threads` (`th_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `threads`
--
ALTER TABLE `threads`
  ADD CONSTRAINT `threads_ibfk_1` FOREIGN KEY (`th_topic`) REFERENCES `topics` (`tp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `threads_ibfk_2` FOREIGN KEY (`th_starter`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `threads_ibfk_3` FOREIGN KEY (`th_icon`) REFERENCES `tp_icons` (`ti_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`tp_cat`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`tp_icon`) REFERENCES `tp_icons` (`ti_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
