SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `knowledge_room` ;
CREATE SCHEMA IF NOT EXISTS `knowledge_room` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `knowledge_room` ;

-- -----------------------------------------------------
-- Table `knowledge_room`.`topCategory`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `knowledge_room`.`topCategory` ;

CREATE TABLE IF NOT EXISTS `knowledge_room`.`topCategory` (
  `categoryId` INT NOT NULL AUTO_INCREMENT,
  `categoryName` VARCHAR(100) NOT NULL,
  `categoryDescription` TEXT NULL,
  `categoryImg` VARCHAR(150) NULL,
  PRIMARY KEY (`categoryId`),
  UNIQUE INDEX `categoryName_UNIQUE` (`categoryName` ASC),
  UNIQUE INDEX `categoryImg_UNIQUE` (`categoryImg` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `knowledge_room`.`subCategory`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `knowledge_room`.`subCategory` ;

CREATE TABLE IF NOT EXISTS `knowledge_room`.`subCategory` (
  `subCategoryId` INT NOT NULL AUTO_INCREMENT,
  `subCategoryName` VARCHAR(100) NOT NULL,
  `subCategoryDescription` TEXT NULL,
  `topCategory` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`subCategoryId`),
  INDEX `fk_subCategory_category_idx` (`topCategory` ASC),
  UNIQUE INDEX `subCategoryName_UNIQUE` (`subCategoryName` ASC),
  CONSTRAINT `fk_subCategory_category`
    FOREIGN KEY (`topCategory`)
    REFERENCES `knowledge_room`.`topCategory` (`categoryName`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `knowledge_room`.`language`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `knowledge_room`.`language` ;

CREATE TABLE IF NOT EXISTS `knowledge_room`.`language` (
  `languageId` INT NOT NULL,
  `lang` VARCHAR(45) NOT NULL,
  `icon` VARCHAR(45) NULL,
  PRIMARY KEY (`languageId`),
  UNIQUE INDEX `lang_UNIQUE` (`lang` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `knowledge_room`.`resource`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `knowledge_room`.`resource` ;

CREATE TABLE IF NOT EXISTS `knowledge_room`.`resource` (
  `resourceId` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(200) NOT NULL,
  `annotationDate` DATE NOT NULL,
  `description` TEXT NULL,
  `subCategory` VARCHAR(100) NOT NULL,
  `language` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`resourceId`),
  UNIQUE INDEX `title_UNIQUE` (`title` ASC),
  INDEX `fk_resource_subCategory_idx` (`subCategory` ASC),
  INDEX `fk_resource_language_idx` (`language` ASC),
  CONSTRAINT `fk_resource_subCategory`
    FOREIGN KEY (`subCategory`)
    REFERENCES `knowledge_room`.`subCategory` (`subCategoryName`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_resource_language`
    FOREIGN KEY (`language`)
    REFERENCES `knowledge_room`.`language` (`lang`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `knowledge_room`.`linkType`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `knowledge_room`.`linkType` ;

CREATE TABLE IF NOT EXISTS `knowledge_room`.`linkType` (
  `linkTypeId` INT NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(45) NOT NULL,
  `linkIconName` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`linkTypeId`, `type`),
  UNIQUE INDEX `type_UNIQUE` (`type` ASC),
  UNIQUE INDEX `linkIconName_UNIQUE` (`linkIconName` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `knowledge_room`.`link`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `knowledge_room`.`link` ;

CREATE TABLE IF NOT EXISTS `knowledge_room`.`link` (
  `linkId` INT NOT NULL AUTO_INCREMENT,
  `linkPath` TEXT NOT NULL,
  `linkType` VARCHAR(45) NOT NULL,
  `resource` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`linkId`),
  INDEX `fk_link_linkType_idx` (`linkType` ASC),
  UNIQUE INDEX `resource_resourceId_UNIQUE` (`resource` ASC),
  CONSTRAINT `fk_link_linkType`
    FOREIGN KEY (`linkType`)
    REFERENCES `knowledge_room`.`linkType` (`type`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_link_resource`
    FOREIGN KEY (`resource`)
    REFERENCES `knowledge_room`.`resource` (`title`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `knowledge_room`.`favouriteItem`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `knowledge_room`.`favouriteItem` ;

CREATE TABLE IF NOT EXISTS `knowledge_room`.`favouriteItem` (
  `favouriteId` INT NOT NULL AUTO_INCREMENT,
  `resourceTitle` VARCHAR(200) NOT NULL,
  `star` TINYINT(1) NOT NULL,
  `eye` TINYINT(1) NOT NULL,
  PRIMARY KEY (`favouriteId`),
  INDEX `fk_favourite_resource_idx` (`resourceTitle` ASC),
  UNIQUE INDEX `resourceTitle_UNIQUE` (`resourceTitle` ASC),
  CONSTRAINT `fk_favourite_resource`
    FOREIGN KEY (`resourceTitle`)
    REFERENCES `knowledge_room`.`resource` (`title`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `knowledge_room`.`favouriteCategories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `knowledge_room`.`favouriteCategories` ;

CREATE TABLE IF NOT EXISTS `knowledge_room`.`favouriteCategories` (
  `favouriteCategoriesId` INT NOT NULL AUTO_INCREMENT,
  `favCategoryName` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`favouriteCategoriesId`),
  INDEX `fk_favouriteCategories_topCategory1_idx` (`favCategoryName` ASC),
  CONSTRAINT `fk_favouriteCategories_topCategory`
    FOREIGN KEY (`favCategoryName`)
    REFERENCES `knowledge_room`.`topCategory` (`categoryName`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `knowledge_room`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `knowledge_room`.`user` ;

CREATE TABLE IF NOT EXISTS `knowledge_room`.`user` (
  `userId` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `surname` VARCHAR(45) NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `role` INT NOT NULL,
  `description` TEXT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
