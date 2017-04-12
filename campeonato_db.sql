-- MySQL Script generated by MySQL Workbench
-- Qua 12 Abr 2017 16:16:45 BRT
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema campeonato_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema campeonato_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `campeonato_db` DEFAULT CHARACTER SET latin1 ;
USE `campeonato_db` ;

-- -----------------------------------------------------
-- Table `campeonato_db`.`time`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campeonato_db`.`time` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(30) NOT NULL,
  `pontos` INT(10) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `campeonato_db`.`jogador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campeonato_db`.`jogador` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(30) NOT NULL,
  `id_time` INT(10) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_time` (`id_time` ASC),
  CONSTRAINT `jogador_ibfk_1`
    FOREIGN KEY (`id_time`)
    REFERENCES `campeonato_db`.`time` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `campeonato_db`.`jogo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campeonato_db`.`jogo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `data` DATE NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `campeonato_db`.`jogo_tem_time`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campeonato_db`.`jogo_tem_time` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `time_id` INT(10) NOT NULL,
  `jogo_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_jogo_tem_time_time1_idx` (`time_id` ASC),
  INDEX `fk_jogo_tem_time_jogo1_idx` (`jogo_id` ASC),
  CONSTRAINT `fk_jogo_tem_time_time1`
    FOREIGN KEY (`time_id`)
    REFERENCES `campeonato_db`.`time` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jogo_tem_time_jogo1`
    FOREIGN KEY (`jogo_id`)
    REFERENCES `campeonato_db`.`jogo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `campeonato_db`.`info_gol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campeonato_db`.`info_gol` (
  `id` INT NOT NULL COMMENT '	',
  `jogador_id` INT(10) NOT NULL,
  `time_id` INT(10) NOT NULL,
  `jogo_id` INT(11) NOT NULL,
  INDEX `fk_info_gol_jogador1_idx` (`jogador_id` ASC),
  INDEX `fk_info_gol_time1_idx` (`time_id` ASC),
  INDEX `fk_info_gol_jogo1_idx` (`jogo_id` ASC),
  CONSTRAINT `fk_info_gol_jogador1`
    FOREIGN KEY (`jogador_id`)
    REFERENCES `campeonato_db`.`jogador` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_info_gol_time1`
    FOREIGN KEY (`time_id`)
    REFERENCES `campeonato_db`.`time` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_info_gol_jogo1`
    FOREIGN KEY (`jogo_id`)
    REFERENCES `campeonato_db`.`jogo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `campeonato_db`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campeonato_db`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
