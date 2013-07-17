SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `NinjaAuthorization` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `NinjaAuthorization` ;

-- -----------------------------------------------------
-- Table `NinjaAuthorization`.`user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `NinjaAuthorization`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `deleted` TINYINT(1) NOT NULL DEFAULT 0 ,
  `date_added` DATETIME NOT NULL ,
  `date_modified` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NinjaAuthorization`.`role`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `NinjaAuthorization`.`role` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(25) NOT NULL ,
  `parent_role_id` INT UNSIGNED NOT NULL DEFAULT NULL ,
  `deleted` TINYINT(1) NOT NULL DEFAULT 0 ,
  `date_added` DATETIME NOT NULL ,
  `date_modified` DATETIME NOT NULL ,
  PRIMARY KEY (`id`, `parent_role_id`) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) ,
  CONSTRAINT `fk_role_role_id`
    FOREIGN KEY (`parent_role_id` )
    REFERENCES `NinjaAuthorization`.`role` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NinjaAuthorization`.`role_assignment`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `NinjaAuthorization`.`role_assignment` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `user_id` INT UNSIGNED NOT NULL ,
  `role_id` INT UNSIGNED NOT NULL ,
  `deleted` TINYINT(1) NOT NULL DEFAULT 0 ,
  `date_added` DATETIME NOT NULL ,
  `date_modified` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_role_assignment_user_id`
    FOREIGN KEY (`user_id` )
    REFERENCES `NinjaAuthorization`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_role_assignment_role_id`
    FOREIGN KEY (`role_id` )
    REFERENCES `NinjaAuthorization`.`role` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NinjaAuthorization`.`resource`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `NinjaAuthorization`.`resource` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `deleted` TINYINT(1) NOT NULL DEFAULT 0 ,
  `date_added` DATETIME NOT NULL ,
  `date_modified` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NinjaAuthorization`.`privilege`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `NinjaAuthorization`.`privilege` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `deleted` TINYINT(1) NOT NULL DEFAULT 0 ,
  `date_added` DATETIME NOT NULL ,
  `date_modified` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NinjaAuthorization`.`permission`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `NinjaAuthorization`.`permission` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `role_id` INT UNSIGNED NULL DEFAULT NULL ,
  `user_id` INT UNSIGNED NULL DEFAULT NULL ,
  `resource_id` INT UNSIGNED NULL DEFAULT NULL ,
  `privilege_id` INT UNSIGNED NULL DEFAULT NULL ,
  `deleted` TINYINT(1) NOT NULL DEFAULT 0 ,
  `date_added` DATETIME NOT NULL ,
  `date_modified` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_permission_role_id`
    FOREIGN KEY (`role_id` )
    REFERENCES `NinjaAuthorization`.`role` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_permission_user_id`
    FOREIGN KEY (`user_id` )
    REFERENCES `NinjaAuthorization`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_permission_resource_id`
    FOREIGN KEY (`resource_id` )
    REFERENCES `NinjaAuthorization`.`resource` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_permission_privilege_id`
    FOREIGN KEY (`privilege_id` )
    REFERENCES `NinjaAuthorization`.`privilege` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
