-- Adminer 4.3.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `campeonato_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `campeonato_db`;

DROP TABLE IF EXISTS `jogador`;
CREATE TABLE `jogador` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `gols` int(10) NOT NULL,
  `id_time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_time` (`id_time`),
  CONSTRAINT `jogador_ibfk_1` FOREIGN KEY (`id_time`) REFERENCES `time` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `jogo`;
CREATE TABLE `jogo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `jogo_ibfk_1` FOREIGN KEY (`id`) REFERENCES `jogo_tem_time` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `jogo_tem_time`;
CREATE TABLE `jogo_tem_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time_id` int(10) NOT NULL,
  `gols` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `time_id` (`time_id`),
  KEY `gols` (`gols`),
  CONSTRAINT `jogo_tem_time_ibfk_1` FOREIGN KEY (`time_id`) REFERENCES `time` (`id`),
  CONSTRAINT `jogo_tem_time_ibfk_2` FOREIGN KEY (`gols`) REFERENCES `time` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `time`;
CREATE TABLE `time` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `pontos` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2017-04-12 16:22:20
