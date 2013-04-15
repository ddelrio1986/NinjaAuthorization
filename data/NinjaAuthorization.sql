CREATE  TABLE IF NOT EXISTS `NinjaAuthorization`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(20) NOT NULL ,
  `password` VARCHAR(20) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) )
ENGINE = InnoDB;

CREATE  TABLE IF NOT EXISTS `NinjaAuthorization`.`role` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(25) NOT NULL ,
  `parent_role_id` INT NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) )
ENGINE = InnoDB;

CREATE  TABLE IF NOT EXISTS `NinjaAuthorization`.`role_assignment` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL ,
  `role_id` INT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

CREATE  TABLE IF NOT EXISTS `NinjaAuthorization`.`resource` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) )
ENGINE = InnoDB;

CREATE  TABLE IF NOT EXISTS `NinjaAuthorization`.`privilege` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

CREATE  TABLE IF NOT EXISTS `NinjaAuthorization`.`permission` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `role_id` INT NULL ,
  `user_id` INT NULL ,
  `resource_id` INT NULL ,
  `privilege_id` INT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;