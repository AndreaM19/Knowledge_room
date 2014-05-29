SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `knowledge_room` ;
CREATE SCHEMA IF NOT EXISTS `knowledge_room` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `knowledge_room` ;

-- -----------------------------------------------------
-- Table `knowledge_room`.`topCategory`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `knowledge_room`.`topCategory` (
  `categoryId` INT NOT NULL AUTO_INCREMENT,
  `categoryName` VARCHAR(45) NOT NULL,
  `categoryDescription` TEXT NULL,
  PRIMARY KEY (`categoryId`),
  UNIQUE INDEX `categoryName_UNIQUE` (`categoryName` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `knowledge_room`.`subCategory`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `knowledge_room`.`subCategory` (
  `subCategoryId` INT NOT NULL AUTO_INCREMENT,
  `subCategoryDescription` TEXT NULL,
  `topCategory` INT NOT NULL,
  PRIMARY KEY (`subCategoryId`),
  INDEX `fk_subCategory_category1_idx` (`topCategory` ASC),
  CONSTRAINT `fk_subCategory_category`
    FOREIGN KEY (`topCategory`)
    REFERENCES `knowledge_room`.`topCategory` (`categoryId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `knowledge_room`.`resource`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `knowledge_room`.`resource` (
  `resourceId` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `annotationDate` DATE NOT NULL,
  `description` TEXT NULL,
  `subCategory` INT NOT NULL,
  PRIMARY KEY (`resourceId`),
  INDEX `fk_resource_subCategory1_idx` (`subCategory` ASC),
  UNIQUE INDEX `title_UNIQUE` (`title` ASC),
  CONSTRAINT `fk_resource_subCategory`
    FOREIGN KEY (`subCategory`)
    REFERENCES `knowledge_room`.`subCategory` (`subCategoryId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `knowledge_room`.`linkType`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `knowledge_room`.`linkType` (
  `linkTypeId` INT NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`linkTypeId`, `type`),
  UNIQUE INDEX `type_UNIQUE` (`type` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `knowledge_room`.`link`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `knowledge_room`.`link` (
  `linkId` INT NOT NULL AUTO_INCREMENT,
  `linkPath` VARCHAR(200) NOT NULL,
  `linkType` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`linkId`),
  INDEX `fk_link_linkType_idx` (`linkType` ASC),
  CONSTRAINT `fk_link_linkType`
    FOREIGN KEY (`linkType`)
    REFERENCES `knowledge_room`.`linkType` (`type`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `knowledge_room`.`linkConnection`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `knowledge_room`.`linkConnection` (
  `resourceId` INT NOT NULL,
  `linkId` INT NOT NULL,
  PRIMARY KEY (`resourceId`, `linkId`),
  INDEX `fk_resource_has_link_link1_idx` (`linkId` ASC),
  INDEX `fk_resource_has_link_resource1_idx` (`resourceId` ASC),
  CONSTRAINT `fk_resource_has_link_resource`
    FOREIGN KEY (`resourceId`)
    REFERENCES `knowledge_room`.`resource` (`resourceId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_resource_has_link_link`
    FOREIGN KEY (`linkId`)
    REFERENCES `knowledge_room`.`link` (`linkId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Data for table `knowledge_room`.`topCategory`
-- -----------------------------------------------------
START TRANSACTION;
USE `knowledge_room`;
INSERT INTO `knowledge_room`.`topCategory` (`categoryId`, `categoryName`, `categoryDescription`) VALUES (1, 'Informatics', 'This section contains knowledge about: programming, coding, networks, systems ecc');
INSERT INTO `knowledge_room`.`topCategory` (`categoryId`, `categoryName`, `categoryDescription`) VALUES (2, 'Elctronics', 'This section contains knowledge about: electronics');
INSERT INTO `knowledge_room`.`topCategory` (`categoryId`, `categoryName`, `categoryDescription`) VALUES (3, 'Music', 'This section contains something about music world, songs, artists ecc');
INSERT INTO `knowledge_room`.`topCategory` (`categoryId`, `categoryName`, `categoryDescription`) VALUES (4, 'Audio Technology', 'This section contains knowledge about audio technologies, music equipment, intresting audio stuff, ecc');

COMMIT;


-- -----------------------------------------------------
-- Data for table `knowledge_room`.`linkType`
-- -----------------------------------------------------
START TRANSACTION;
USE `knowledge_room`;
INSERT INTO `knowledge_room`.`linkType` (`linkTypeId`, `type`) VALUES (5, 'Microsoft Excel');
INSERT INTO `knowledge_room`.`linkType` (`linkTypeId`, `type`) VALUES (4, 'Microsoft PowerPoint ');
INSERT INTO `knowledge_room`.`linkType` (`linkTypeId`, `type`) VALUES (3, 'Microsoft Word');
INSERT INTO `knowledge_room`.`linkType` (`linkTypeId`, `type`) VALUES (6, 'Other');
INSERT INTO `knowledge_room`.`linkType` (`linkTypeId`, `type`) VALUES (2, 'PDF document');
INSERT INTO `knowledge_room`.`linkType` (`linkTypeId`, `type`) VALUES (1, 'WEB Page');

COMMIT;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
