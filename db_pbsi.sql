-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 27 Jul 2016 pada 01.10
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `db_pbsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_class`
--

CREATE TABLE IF NOT EXISTS `tbl_class` (
  `class_id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(1) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  PRIMARY KEY (`class_id`),
  KEY `type_id` (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `tbl_class`
--

INSERT INTO `tbl_class` (`class_id`, `type_id`, `class_name`) VALUES
(1, 1, 'Men Singles'),
(2, 1, 'Woman Singles'),
(3, 2, 'Men Doubles'),
(4, 2, 'Woman Doubles'),
(5, 2, 'Mixed Doubles');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_country`
--

CREATE TABLE IF NOT EXISTS `tbl_country` (
  `country_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(50) NOT NULL,
  `country_flag` varchar(55) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tbl_country`
--

INSERT INTO `tbl_country` (`country_id`, `country_name`, `country_flag`) VALUES
(1, 'Indonesia', 'indonesia.png'),
(2, 'Denmark', 'denmark.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_court`
--

CREATE TABLE IF NOT EXISTS `tbl_court` (
  `court_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` tinyint(1) NOT NULL,
  `subclass_id` tinyint(1) NOT NULL,
  `country_id1` int(11) NOT NULL,
  `country_id2` int(11) NOT NULL,
  `club_name1` varchar(50) DEFAULT NULL,
  `club_name2` varchar(50) DEFAULT NULL,
  `club_name_doubles_1` varchar(50) DEFAULT NULL,
  `club_name_doubles_2` varchar(50) DEFAULT NULL,
  `club_name_doubles_3` varchar(50) DEFAULT NULL,
  `club_name_doubles_4` varchar(50) DEFAULT NULL,
  `court_number` set('1','2','3','4','5','6') NOT NULL,
  `umpire_name` varchar(50) NOT NULL,
  `order_of_play` int(11) NOT NULL,
  `status` set('0','1','2') NOT NULL,
  `time` time DEFAULT NULL,
  `shuttle_cock` tinyint(2) NOT NULL,
  `player_name_1` varchar(100) DEFAULT NULL,
  `player_name_2` varchar(100) DEFAULT NULL,
  `player_name_3` varchar(100) DEFAULT NULL,
  `player_name_4` varchar(100) DEFAULT NULL,
  `type_id` set('1','2') NOT NULL,
  `player_single_1` varchar(100) DEFAULT NULL,
  `player_single_2` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`court_id`),
  KEY `class_id` (`class_id`),
  KEY `subclass_id` (`subclass_id`),
  KEY `class_id_2` (`class_id`),
  KEY `subclass_id_2` (`subclass_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data untuk tabel `tbl_court`
--

INSERT INTO `tbl_court` (`court_id`, `class_id`, `subclass_id`, `country_id1`, `country_id2`, `club_name1`, `club_name2`, `club_name_doubles_1`, `club_name_doubles_2`, `club_name_doubles_3`, `club_name_doubles_4`, `court_number`, `umpire_name`, `order_of_play`, `status`, `time`, `shuttle_cock`, `player_name_1`, `player_name_2`, `player_name_3`, `player_name_4`, `type_id`, `player_single_1`, `player_single_2`) VALUES
(18, 3, 1, 1, 2, NULL, NULL, 'Victor', 'Exist', 'Djarum', 'Yonex', '1', 'yahya', 1, '1', '00:00:10', 1, 'Torik', 'Yandi', 'Alkatiri', 'Sofyan', '2', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_player`
--

CREATE TABLE IF NOT EXISTS `tbl_player` (
  `player_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` int(11) NOT NULL,
  `player_name` varchar(15) NOT NULL,
  PRIMARY KEY (`player_id`),
  KEY `court_id` (`team_id`),
  KEY `team_id` (`team_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `tbl_player`
--

INSERT INTO `tbl_player` (`player_id`, `team_id`, `player_name`) VALUES
(1, 35, 'Torik'),
(2, 35, 'Alkatiri'),
(3, 36, 'Yandi'),
(4, 36, 'Sofyan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_stage`
--

CREATE TABLE IF NOT EXISTS `tbl_stage` (
  `stage_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` int(11) NOT NULL,
  `stage_number` tinyint(1) NOT NULL,
  `score` tinyint(4) NOT NULL,
  PRIMARY KEY (`stage_id`),
  KEY `court_id` (`team_id`),
  KEY `team_id` (`team_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Dumping data untuk tabel `tbl_stage`
--

INSERT INTO `tbl_stage` (`stage_id`, `team_id`, `stage_number`, `score`) VALUES
(69, 35, 1, 2),
(70, 36, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_subclass`
--

CREATE TABLE IF NOT EXISTS `tbl_subclass` (
  `subclass_id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `subclass_name` varchar(3) NOT NULL,
  PRIMARY KEY (`subclass_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tbl_subclass`
--

INSERT INTO `tbl_subclass` (`subclass_id`, `subclass_name`) VALUES
(1, 'U13'),
(2, 'U15'),
(3, 'U17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_team`
--

CREATE TABLE IF NOT EXISTS `tbl_team` (
  `team_id` int(11) NOT NULL AUTO_INCREMENT,
  `court_id` int(11) NOT NULL,
  `country_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`team_id`),
  KEY `country_id` (`country_id`),
  KEY `court_id` (`court_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data untuk tabel `tbl_team`
--

INSERT INTO `tbl_team` (`team_id`, `court_id`, `country_id`) VALUES
(35, 18, 1),
(36, 18, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_type`
--

CREATE TABLE IF NOT EXISTS `tbl_type` (
  `type_id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(10) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tbl_type`
--

INSERT INTO `tbl_type` (`type_id`, `type_name`) VALUES
(1, 'Singles'),
(2, 'Doubles');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD CONSTRAINT `tbl_class_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `tbl_type` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_court`
--
ALTER TABLE `tbl_court`
  ADD CONSTRAINT `tbl_court_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `tbl_class` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_court_ibfk_2` FOREIGN KEY (`subclass_id`) REFERENCES `tbl_subclass` (`subclass_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_player`
--
ALTER TABLE `tbl_player`
  ADD CONSTRAINT `tbl_player_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `tbl_team` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_stage`
--
ALTER TABLE `tbl_stage`
  ADD CONSTRAINT `tbl_stage_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `tbl_team` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_team`
--
ALTER TABLE `tbl_team`
  ADD CONSTRAINT `tbl_team_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `tbl_country` (`country_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_team_ibfk_2` FOREIGN KEY (`court_id`) REFERENCES `tbl_court` (`court_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
