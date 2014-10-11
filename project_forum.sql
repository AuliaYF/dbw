-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2014 at 09:24 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_desc`) VALUES
(4, 'Testzzxczxczxcxzc', 'ini test'),
(7, 'Android', 'asdasdasdzxc');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`rp_id`, `rp_title`, `rp_content`, `rp_date`, `rp_thread`, `rp_starter`) VALUES
(6, 'test', '<p>asdasdasdas</p>', '2014-10-11 14:23:11', 9, 12);

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE IF NOT EXISTS `threads` (
  `th_id` int(8) NOT NULL AUTO_INCREMENT,
  `th_title` text NOT NULL,
  `th_date` datetime NOT NULL,
  `th_topic` int(8) NOT NULL,
  `th_icon` int(8) DEFAULT NULL,
  `th_starter` int(8) NOT NULL,
  PRIMARY KEY (`th_id`),
  KEY `th_topic` (`th_topic`),
  KEY `th_starter` (`th_starter`),
  KEY `th_icon` (`th_icon`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`th_id`, `th_title`, `th_date`, `th_topic`, `th_icon`, `th_starter`) VALUES
(9, 'test', '2014-10-11 14:23:11', 6, NULL, 12);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`tp_id`, `tp_title`, `tp_cat`, `tp_icon`, `tp_desc`) VALUES
(6, 'Testasdzxc', 4, NULL, 'asdasdsa'),
(8, 'Test', 4, NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

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
  `user_date_joined` date DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_profile_pic`, `user_profile_signature`, `user_date_joined`) VALUES
(11, 'ucup', 'vkSbPVsexUwslw49/Sw4HQ6Cw9wnPLFhxhDyNB2VAp+Z0VzQRJ0tpc8U5/Qvz5x0wr5NyQthSpm8rSsGcPdf0A==', 'auliayf@gmail.com', NULL, '', '2014-10-05'),
(12, 'auliayf', '9TH0dd4tFLnAHXcRJDyfTw3xyx0Cn78oQLoqs7yZSMw7WmzHY7tigmZnmMZ1NPaJI1ngtHbcfMhKRkubEw34xQ==', 'ucup@gmail.com', NULL, 'ucup', '2014-10-08');

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
