
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
