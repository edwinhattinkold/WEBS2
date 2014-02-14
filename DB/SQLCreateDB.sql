SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `egjhatti_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `egjhatti_db` ;

-- -----------------------------------------------------
-- Table `egjhatti_db`.`category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `egjhatti_db`.`category` ;

CREATE TABLE IF NOT EXISTS `egjhatti_db`.`category` (
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(1000) NULL,
  PRIMARY KEY (`name`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `egjhatti_db`.`products`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `egjhatti_db`.`products` ;

CREATE TABLE IF NOT EXISTS `egjhatti_db`.`products` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `price` DECIMAL(5,2) NOT NULL,
  `description` VARCHAR(1000) NULL,
  `image` VARCHAR(500) NULL,
  `category_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`, `category_name`),
  INDEX `fk_products_category1_idx` (`category_name` ASC),
  CONSTRAINT `fk_products_category1`
    FOREIGN KEY (`category_name`)
    REFERENCES `egjhatti_db`.`category` (`name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `egjhatti_db`.`rights`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `egjhatti_db`.`rights` ;

CREATE TABLE IF NOT EXISTS `egjhatti_db`.`rights` (
  `right` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`right`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `egjhatti_db`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `egjhatti_db`.`user` ;

CREATE TABLE IF NOT EXISTS `egjhatti_db`.`user` (
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `rights_right` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`username`),
  INDEX `fk_user_rights1_idx` (`rights_right` ASC),
  CONSTRAINT `fk_user_rights1`
    FOREIGN KEY (`rights_right`)
    REFERENCES `egjhatti_db`.`rights` (`right`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `egjhatti_db`.`customers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `egjhatti_db`.`customers` ;

CREATE TABLE IF NOT EXISTS `egjhatti_db`.`customers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `first name` VARCHAR(45) NOT NULL,
  `surname` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `user_username` VARCHAR(45) NOT NULL,
  `postcode` VARCHAR(45) NULL,
  `woonplaats` VARCHAR(45) NULL,
  `adress` VARCHAR(100) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_customers_user1_idx` (`user_username` ASC),
  CONSTRAINT `fk_customers_user1`
    FOREIGN KEY (`user_username`)
    REFERENCES `egjhatti_db`.`user` (`username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `egjhatti_db`.`orders`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `egjhatti_db`.`orders` ;

CREATE TABLE IF NOT EXISTS `egjhatti_db`.`orders` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `customers_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_orders_customers1_idx` (`customers_id` ASC),
  CONSTRAINT `fk_orders_customers1`
    FOREIGN KEY (`customers_id`)
    REFERENCES `egjhatti_db`.`customers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `egjhatti_db`.`products_has_orders`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `egjhatti_db`.`products_has_orders` ;

CREATE TABLE IF NOT EXISTS `egjhatti_db`.`products_has_orders` (
  `products_id` INT NOT NULL,
  `orders_id` INT NOT NULL,
  `amount` INT NOT NULL,
  PRIMARY KEY (`products_id`, `orders_id`),
  INDEX `fk_products_has_orders_orders1_idx` (`orders_id` ASC),
  INDEX `fk_products_has_orders_products1_idx` (`products_id` ASC),
  CONSTRAINT `fk_products_has_orders_products1`
    FOREIGN KEY (`products_id`)
    REFERENCES `egjhatti_db`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_products_has_orders_orders1`
    FOREIGN KEY (`orders_id`)
    REFERENCES `egjhatti_db`.`orders` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
