SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `egjhatti_db` DEFAULT CHARACTER SET latin1 ;
USE `egjhatti_db` ;

-- -----------------------------------------------------
-- Table `egjhatti_db`.`categorytype`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `egjhatti_db`.`categorytype` ;

CREATE TABLE IF NOT EXISTS `egjhatti_db`.`categorytype` (
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`name`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `egjhatti_db`.`category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `egjhatti_db`.`category` ;

CREATE TABLE IF NOT EXISTS `egjhatti_db`.`category` (
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(1000) NULL DEFAULT NULL,
  `categorytype_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`name`),
  INDEX `fk_category_categorytype1_idx` (`categorytype_name` ASC),
  CONSTRAINT `fk_category_categorytype1`
    FOREIGN KEY (`categorytype_name`)
    REFERENCES `egjhatti_db`.`categorytype` (`name`)
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
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


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
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `egjhatti_db`.`customers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `egjhatti_db`.`customers` ;

CREATE TABLE IF NOT EXISTS `egjhatti_db`.`customers` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `first name` VARCHAR(45) NOT NULL,
  `surname` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `user_username` VARCHAR(45) NOT NULL,
  `postcode` VARCHAR(45) NULL DEFAULT NULL,
  `woonplaats` VARCHAR(45) NULL DEFAULT NULL,
  `adress` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_customers_user1_idx` (`user_username` ASC),
  CONSTRAINT `fk_customers_user1`
    FOREIGN KEY (`user_username`)
    REFERENCES `egjhatti_db`.`user` (`username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `egjhatti_db`.`menu`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `egjhatti_db`.`menu` ;

CREATE TABLE IF NOT EXISTS `egjhatti_db`.`menu` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `link` VARCHAR(100) NOT NULL,
  `menu_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `egjhatti_db`.`orders`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `egjhatti_db`.`orders` ;

CREATE TABLE IF NOT EXISTS `egjhatti_db`.`orders` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `customers_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_orders_customers1_idx` (`customers_id` ASC),
  CONSTRAINT `fk_orders_customers1`
    FOREIGN KEY (`customers_id`)
    REFERENCES `egjhatti_db`.`customers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `egjhatti_db`.`products`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `egjhatti_db`.`products` ;

CREATE TABLE IF NOT EXISTS `egjhatti_db`.`products` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `price` DECIMAL(5,2) NOT NULL,
  `description` VARCHAR(1000) NULL DEFAULT NULL,
  `short_description` VARCHAR(100) NULL,
  `image` VARCHAR(500) NULL DEFAULT NULL,
  `category` VARCHAR(45) NOT NULL,
  `subcategory` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_products_category1_idx` (`category` ASC),
  INDEX `fk_products_category2_idx` (`subcategory` ASC),
  CONSTRAINT `fk_products_category1`
    FOREIGN KEY (`category`)
    REFERENCES `egjhatti_db`.`category` (`name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_products_category2`
    FOREIGN KEY (`subcategory`)
    REFERENCES `egjhatti_db`.`category` (`name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 30;


-- -----------------------------------------------------
-- Table `egjhatti_db`.`products_has_orders`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `egjhatti_db`.`products_has_orders` ;

CREATE TABLE IF NOT EXISTS `egjhatti_db`.`products_has_orders` (
  `products_id` INT(11) NOT NULL,
  `orders_id` INT(11) NOT NULL,
  `amount` INT(11) NOT NULL,
  PRIMARY KEY (`products_id`, `orders_id`),
  INDEX `fk_products_has_orders_orders1_idx` (`orders_id` ASC),
  INDEX `fk_products_has_orders_products1_idx` (`products_id` ASC),
  CONSTRAINT `fk_products_has_orders_orders1`
    FOREIGN KEY (`orders_id`)
    REFERENCES `egjhatti_db`.`orders` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_products_has_orders_products1`
    FOREIGN KEY (`products_id`)
    REFERENCES `egjhatti_db`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `egjhatti_db`.`progress`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `egjhatti_db`.`progress` ;

CREATE TABLE IF NOT EXISTS `egjhatti_db`.`progress` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `made` VARCHAR(100) NOT NULL,
  `who` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
