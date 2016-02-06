-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 06, 2016 at 09:22 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quart`
--

-- --------------------------------------------------------

--
-- Table structure for table `quart_answers`
--

CREATE TABLE IF NOT EXISTS `quart_answers` (
  `answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `user_answered` varchar(500) NOT NULL,
  `answer_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `answer` varchar(50000) NOT NULL,
  `anonymous` int(11) NOT NULL,
  `upvote` int(11) NOT NULL,
  `downvote` int(11) NOT NULL,
  PRIMARY KEY (`answer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `quart_answers`
--

INSERT INTO `quart_answers` (`answer_id`, `question_id`, `user_answered`, `answer_time`, `answer`, `anonymous`, `upvote`, `downvote`) VALUES
(1, 1, '', '2016-02-06 10:54:18', 'ice is cool', 0, 0, 0),
(2, 1, '', '2016-02-06 10:56:05', 'ice is water condensed', 0, 0, 0),
(3, 3, 'suraj', '2016-02-06 11:58:37', 'read well', 0, 0, 0),
(4, 3, 'suraj', '2016-02-06 12:00:53', 'sleep well', 0, 0, 0),
(5, 3, 'suraj', '2016-02-06 12:05:02', 'eat well', 0, 0, 0),
(6, 3, 'suraj', '2016-02-06 12:06:16', 'why are you sleeping?', 0, 0, 0),
(7, 4, 'suraj', '2016-02-06 12:06:35', 'i am don.', 0, 0, 0),
(8, 4, 'anonymous', '2016-02-06 12:19:47', 'i am a big don', 0, 0, 0),
(9, 5, 'suraj', '2016-02-06 12:37:01', 'ice is water condensed', 1, 0, 0),
(10, 4, 'swastik', '2016-02-06 14:43:53', 'deighsz,gbh', 0, 0, 0),
(11, 4, 'swastik', '2016-02-06 14:44:11', 'sdnf djfh', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `quart_questions`
--

CREATE TABLE IF NOT EXISTS `quart_questions` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(10000) NOT NULL,
  `user_asked` varchar(100) NOT NULL,
  `category` varchar(1000) NOT NULL,
  `asked_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `anonymous` int(11) NOT NULL,
  `upvote` int(11) NOT NULL,
  `downvote` int(11) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `quart_questions`
--

INSERT INTO `quart_questions` (`question_id`, `question`, `user_asked`, `category`, `asked_time`, `anonymous`, `upvote`, `downvote`) VALUES
(1, 'what is ice?', '', 'chemistry,water,ice', '2016-02-06 10:02:04', 0, 0, 0),
(3, 'how to read', '', 'free', '2016-02-06 11:56:09', 0, 0, 0),
(4, 'who am i?', 'suraj', '', '2016-02-06 11:56:48', 0, 0, 0),
(5, 'asking as anonymous', 'suraj', 'anonymous', '2016-02-06 12:14:02', 0, 0, 0),
(6, 'try again', 'anonymous', 'anonymous', '2016-02-06 12:15:04', 0, 0, 0),
(7, 'what is shekhar?', 'suraj', 'sheckah', '2016-02-06 12:36:06', 1, 0, 0),
(8, 'sjdh jsdhw ueyw we udwey d', 'swastik', '', '2016-02-06 14:44:42', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `quart_users`
--

CREATE TABLE IF NOT EXISTS `quart_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `quart_users`
--

INSERT INTO `quart_users` (`id`, `username`, `email`, `password`) VALUES
(1, 'sy', 'shj', 'ghu'),
(2, 'suraj', 's@gmail.com', ''),
(3, 'punnu', 'dnjha240@gmail.com', ''),
(4, 'hero', 'ghui@gmail.com', '1234'),
(5, 'swastik', 'hja@gmail.com', '1234');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
