-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema appointment_app
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema appointment_app
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `appointment_app` DEFAULT CHARACTER SET utf8 ;
USE `appointment_app` ;

-- -----------------------------------------------------
-- Table `appointment_app`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `appointment_app`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `doh` VARCHAR(45) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `appointment_app`.`appointments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `appointment_app`.`appointments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `date` DATE NULL,
  `time` TIME NULL,
  `tasks` VARCHAR(45) NULL,
  `status` VARCHAR(45) NULL,
  `created_at` VARCHAR(45) NULL,
  `updated_at` VARCHAR(45) NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`, `user_id`),
  INDEX `fk_appointments_users_idx` (`user_id` ASC),
  CONSTRAINT `fk_appointments_users`
    FOREIGN KEY (`user_id`)
    REFERENCES `appointment_app`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
