-- MySQL Script generated by MySQL Workbench
-- 05/05/16 09:28:57
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema cinemadatabase
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema cinemadatabase
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cinemadatabase` DEFAULT CHARACTER SET utf8 ;
USE `cinemadatabase` ;

-- -----------------------------------------------------
-- Table `cinemadatabase`.`users`
-- -----------------------------------------------------

-- ------------------------------------------------
-- DROP THE BASE  ---- to be implemented
-- ------------------------------------------------ 
DROP TABLE IF EXISTS movie_to_genres;
DROP TABLE IF EXISTS genres;
DROP TABLE IF EXISTS bookings;
DROP TABLE IF EXISTS movies;
DROP TABLE IF EXISTS rooms;
DROP TABLE IF EXISTS users;




CREATE TABLE IF NOT EXISTS `cinemadatabase`.`users` (
  `id` SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `password` VARCHAR(255) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `active` boolean NOT NULL,
  `role` TINYINT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cinemadatabase`.`movies`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cinemadatabase`.`movies` (
  `id` SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `year` YEAR NOT NULL,
  `cast` VARCHAR(512) NOT NULL,
  `duration` TINYINT NOT NULL,
  `poster` VARCHAR(128) NOT NULL,
  `link_imdb` VARCHAR(128) NOT NULL,
  `search_title` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM;

ALTER TABLE movies ADD FULLTEXT(title, search_title);


-- -----------------------------------------------------
-- Table `cinemadatabase`.`rooms`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cinemadatabase`.`rooms` (
  `id` SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `capacity` SMALLINT(3) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cinemadatabase`.`schedules`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cinemadatabase`.`schedules` (
  `id` SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` DATE NOT NULL,
  `time` TIME NOT NULL,
  `remaining_seats` SMALLINT(3) UNSIGNED NOT NULL,
  `ticket_price` FLOAT NOT NULL,
  `room_id` SMALLINT(5) UNSIGNED NOT NULL,
  `movie_id` SMALLINT(5) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_schedules_rooms1_idx` (`room_id` ASC),
  INDEX `fk_schedules_movies1_idx` (`movie_id` ASC),
  CONSTRAINT `fk_schedules_rooms1`
    FOREIGN KEY (`room_id`)
    REFERENCES `cinemadatabase`.`rooms` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_schedules_movies1`
    FOREIGN KEY (`movie_id`)
    REFERENCES `cinemadatabase`.`movies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cinemadatabase`.`bookings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cinemadatabase`.`bookings` (
  `id` SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `seats` SMALLINT(3) UNSIGNED NOT NULL,
  `user_id` SMALLINT(5) UNSIGNED NOT NULL,
  `schedule_id` SMALLINT(5) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_bookings_users_idx` (`user_id` ASC),
  INDEX `fk_bookings_schedules1_idx` (`schedule_id` ASC),
  CONSTRAINT `fk_bookings_users`
    FOREIGN KEY (`user_id`)
    REFERENCES `cinemadatabase`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_bookings_schedules1`
    FOREIGN KEY (`schedule_id`)
    REFERENCES `cinemadatabase`.`schedules` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cinemadatabase`.`genres`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cinemadatabase`.`genres` (
  `id` SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cinemadatabase`.`movie_to_genres`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cinemadatabase`.`movie_to_genres` (
  `movie_id` SMALLINT(5) UNSIGNED NOT NULL,
  `genre_id` SMALLINT(5) UNSIGNED NOT NULL,
  INDEX `fk_movie_to_genres_movies1_idx` (`movie_id` ASC),
  INDEX `fk_movie_to_genres_genres1_idx` (`genre_id` ASC),
  CONSTRAINT `fk_movie_to_genres_movies1`
    FOREIGN KEY (`movie_id`)
    REFERENCES `cinemadatabase`.`movies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_movie_to_genres_genres1`
    FOREIGN KEY (`genre_id`)
    REFERENCES `cinemadatabase`.`genres` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
