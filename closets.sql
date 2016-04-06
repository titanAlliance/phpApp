-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2016 at 07:41 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `closets`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE IF NOT EXISTS `actors` (
  `actorId` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`actorId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `commentId` int(11) NOT NULL AUTO_INCREMENT,
  `commentscol` mediumtext NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `gameId` int(11) DEFAULT NULL,
  PRIMARY KEY (`commentId`),
  KEY `fk_comments_users1_idx` (`userId`),
  KEY `fk_comments_games1_idx` (`gameId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `esrbratings`
--

CREATE TABLE IF NOT EXISTS `esrbratings` (
  `esrbRatingId` int(11) NOT NULL AUTO_INCREMENT,
  `esrbRatingName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`esrbRatingId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `gameId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) DEFAULT NULL,
  `releaseDate` datetime DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `parentGame` int(11) DEFAULT NULL,
  `publisherId` int(11) DEFAULT NULL,
  `esrbRatingId` int(11) DEFAULT NULL,
  `platformId` int(11) DEFAULT NULL,
  PRIMARY KEY (`gameId`),
  UNIQUE KEY `title_UNIQUE` (`title`),
  KEY `fk_games_publishers_idx` (`publisherId`),
  KEY `fk_games_esrbRatings1_idx` (`esrbRatingId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gamesactors`
--

CREATE TABLE IF NOT EXISTS `gamesactors` (
  `gameId` int(11) NOT NULL,
  `actorId` int(11) NOT NULL,
  PRIMARY KEY (`gameId`,`actorId`),
  KEY `fk_gamesActors_actors1_idx` (`actorId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gamesgenres`
--

CREATE TABLE IF NOT EXISTS `gamesgenres` (
  `gameId` int(11) NOT NULL,
  `genreId` int(11) NOT NULL,
  PRIMARY KEY (`gameId`,`genreId`),
  KEY `fk_gamesGenres_genres1_idx` (`genreId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gamesplatforms`
--

CREATE TABLE IF NOT EXISTS `gamesplatforms` (
  `gameId` int(11) NOT NULL,
  `platformId` int(11) NOT NULL,
  PRIMARY KEY (`gameId`,`platformId`),
  KEY `fk_games_has_platforms_platforms1_idx` (`platformId`),
  KEY `fk_games_has_platforms_games1_idx` (`gameId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
  `genreId` int(11) NOT NULL AUTO_INCREMENT,
  `genreName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`genreId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `platforms`
--

CREATE TABLE IF NOT EXISTS `platforms` (
  `platformId` int(11) NOT NULL AUTO_INCREMENT,
  `platformName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`platformId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE IF NOT EXISTS `publishers` (
  `publisherId` int(11) NOT NULL AUTO_INCREMENT,
  `publisherName` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`publisherId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `userlevels`
--

CREATE TABLE IF NOT EXISTS `userlevels` (
  `levelId` int(11) NOT NULL AUTO_INCREMENT,
  `levelName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`levelId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `userlevels`
--

INSERT INTO `userlevels` (`levelId`, `levelName`) VALUES
(1, 'admin'),
(2, 'mod'),
(3, 'verified'),
(4, 'guest'),
(5, 'disabled');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `emailAddress` varchar(80) DEFAULT NULL,
  `hashcode` varchar(40) DEFAULT NULL,
  `alias` varchar(45) DEFAULT NULL,
  `rating` int(11) DEFAULT '0',
  `joinDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `levelId` int(11) DEFAULT '4',
  PRIMARY KEY (`userId`),
  UNIQUE KEY `alias_UNIQUE` (`alias`),
  UNIQUE KEY `emailAddress_UNIQUE` (`emailAddress`),
  KEY `fk_users_userLevels1_idx` (`levelId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `firstName`, `lastName`, `emailAddress`, `hashcode`, `alias`, `rating`, `joinDate`, `levelId`) VALUES
(5, 'Kevin', 'Grant', 'kg_99@yahoo.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'averagebroe', 0, '2016-03-04 14:18:10', 5),
(6, 'Darren', 'Hagler', 'dphagler@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'drnkthecptn', 0, '2016-03-04 14:18:47', 5),
(8, 'Jen', 'Bays', 'jenniferbays1983@gmail.com', '689fe9b15aa7a44a049b491d84475ffa31445650', 'iDontCare', 0, '2016-03-16 13:40:54', 5);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_games1` FOREIGN KEY (`gameId`) REFERENCES `games` (`gameId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comments_users1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `fk_games_esrbRatings1` FOREIGN KEY (`esrbRatingId`) REFERENCES `esrbratings` (`esrbRatingId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_games_publishers` FOREIGN KEY (`publisherId`) REFERENCES `publishers` (`publisherId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `gamesactors`
--
ALTER TABLE `gamesactors`
  ADD CONSTRAINT `fk_gamesActors_actors1` FOREIGN KEY (`actorId`) REFERENCES `actors` (`actorId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_gamesActors_games1` FOREIGN KEY (`gameId`) REFERENCES `games` (`gameId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `gamesgenres`
--
ALTER TABLE `gamesgenres`
  ADD CONSTRAINT `fk_gamesGenres_games1` FOREIGN KEY (`gameId`) REFERENCES `games` (`gameId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_gamesGenres_genres1` FOREIGN KEY (`genreId`) REFERENCES `genres` (`genreId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `gamesplatforms`
--
ALTER TABLE `gamesplatforms`
  ADD CONSTRAINT `fk_games_has_platforms_games1` FOREIGN KEY (`gameId`) REFERENCES `games` (`gameId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_games_has_platforms_platforms1` FOREIGN KEY (`platformId`) REFERENCES `platforms` (`platformId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_userLevels1` FOREIGN KEY (`levelId`) REFERENCES `userlevels` (`levelId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
