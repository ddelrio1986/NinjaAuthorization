<?php

namespace DoctrineORMModule\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class Version20140811195008 extends AbstractMigration
{
  public function up(Schema $schema)
  {
    /*$this->addSql("
      CREATE TABLE IF NOT EXISTS `user` (
        `id` INT UNSIGNED NULL AUTO_INCREMENT,
      ) ENGINE = InnoDB;
    ");*/

    $this->addSql("
      CREATE TABLE IF NOT EXISTS `role` (
        `id` INT UNSIGNED NULL AUTO_INCREMENT,
        `parent_role_id` INT UNSIGNED NULL DEFAULT NULL,
        `name` VARCHAR(25) NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE INDEX `name_UNIQUE` (`name` ASC),
        CONSTRAINT `fk_role_role_id`
          FOREIGN KEY (`parent_role_id`)
          REFERENCES `role` (`id`)
          ON DELETE NO ACTION
          ON UPDATE NO ACTION
      ) ENGINE = InnoDB;
    ");

    $this->addSql("
      CREATE TABLE IF NOT EXISTS `role_assignment` (
        `id` INT UNSIGNED NULL AUTO_INCREMENT,
        `user_id` INT UNSIGNED NOT NULL,
        `role_id` INT UNSIGNED NOT NULL,
        PRIMARY KEY (`id`),
        CONSTRAINT `fk_role_assignment_user_id`
          FOREIGN KEY (`user_id`)
          REFERENCES `user` (`id`)
          ON DELETE NO ACTION
          ON UPDATE NO ACTION,
        CONSTRAINT `fk_role_assignment_role_id`
          FOREIGN KEY (`role_id`)
          REFERENCES `role` (`id`)
          ON DELETE NO ACTION
          ON UPDATE NO ACTION
      ) ENGINE = InnoDB;
    ");

    $this->addSql("
      CREATE TABLE IF NOT EXISTS `resource` (
        `id` INT UNSIGNED NULL AUTO_INCREMENT,
        `name` VARCHAR(45) NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE INDEX `name_UNIQUE` (`name` ASC)
      ) ENGINE = InnoDB;
    ");

    $this->addSql("
      CREATE TABLE IF NOT EXISTS `privilege` (
        `id` INT UNSIGNED NULL AUTO_INCREMENT,
        `name` VARCHAR(45) NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE INDEX `name_UNIQUE` (`name` ASC)
      ) ENGINE = InnoDB;
    ");

    $this->addSql("
      CREATE TABLE IF NOT EXISTS `permission` (
        `id` INT UNSIGNED NULL AUTO_INCREMENT,
        `role_id` INT UNSIGNED NULL DEFAULT NULL,
        `user_id` INT UNSIGNED NULL DEFAULT NULL,
        `resource_id` INT UNSIGNED NULL DEFAULT NULL,
        `privilege_id` INT UNSIGNED NULL DEFAULT NULL,
        `allow` TINYINT(1) NOT NULL DEFAULT 1,
        PRIMARY KEY (`id`),
        CONSTRAINT `fk_permission_role_id`
          FOREIGN KEY (`role_id`)
          REFERENCES `role` (`id`)
          ON DELETE NO ACTION
          ON UPDATE NO ACTION,
        CONSTRAINT `fk_permission_user_id`
          FOREIGN KEY (`user_id`)
          REFERENCES `user` (`id`)
          ON DELETE NO ACTION
          ON UPDATE NO ACTION,
        CONSTRAINT `fk_permission_resource_id`
          FOREIGN KEY (`resource_id`)
          REFERENCES `resource` (`id`)
          ON DELETE NO ACTION
          ON UPDATE NO ACTION,
        CONSTRAINT `fk_permission_privilege_id`
          FOREIGN KEY (`privilege_id`)
          REFERENCES `privilege` (`id`)
          ON DELETE NO ACTION
          ON UPDATE NO ACTION
      ) ENGINE = InnoDB;
    ");
  }

  public function down(Schema $schema)
  {
    $this->addSql("SET foreign_key_checks = 0;");
    //$this->addSql("DROP TABLE IF EXISTS `user`");
    $this->addSql("DROP TABLE IF EXISTS `role`");
    $this->addSql("DROP TABLE IF EXISTS `role_assignment`");
    $this->addSql("DROP TABLE IF EXISTS `resource`");
    $this->addSql("DROP TABLE IF EXISTS `privilege`");
    $this->addSql("DROP TABLE IF EXISTS `permission`");
    $this->addSql("SET foreign_key_checks = 1;");
  }
}
