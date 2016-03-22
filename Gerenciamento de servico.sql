-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`empresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`empresa` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `cnpj` VARCHAR(45) NULL,
  `senha` VARCHAR(255) NULL,
  `telefone` VARCHAR(45) NULL,
  `email` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`setor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`setor` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `id_empresa`
    FOREIGN KEY (`id`)
    REFERENCES `mydb`.`empresa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`funcionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`funcionario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cpf` VARCHAR(45) NULL,
  PRIMARY KEY (`id`, `cpf`),
  CONSTRAINT `id_setor`
    FOREIGN KEY (`id`)
    REFERENCES `mydb`.`setor` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`projetos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`projetos` (
  `id` INT NOT NULL,
  `nome` VARCHAR(45) NULL,
  `descricao` VARCHAR(255) NULL,
  `horas` INT NULL,
  `projetoscol` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `id_empresa`
    FOREIGN KEY (`id`)
    REFERENCES `mydb`.`empresa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`status` (
  `id` INT NOT NULL,
  `descricao` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`servico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`servico` (
  `id` INT NOT NULL,
  `descricao` VARCHAR(45) NULL,
  `horas` INT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `id_projeto`
    FOREIGN KEY (`id`)
    REFERENCES `mydb`.`projetos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_setor`
    FOREIGN KEY (`id`)
    REFERENCES `mydb`.`setor` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_funcionario`
    FOREIGN KEY (`id`)
    REFERENCES `mydb`.`funcionario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_status`
    FOREIGN KEY (`id`)
    REFERENCES `mydb`.`status` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`registro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`registro` (
  `id` INT NOT NULL,
  `descricao` VARCHAR(255) NULL,
  `dataHoraIni` INT NULL,
  `dataHoraFim` INT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `id_servico`
    FOREIGN KEY (`id`)
    REFERENCES `mydb`.`servico` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_funcionario`
    FOREIGN KEY (`id`)
    REFERENCES `mydb`.`funcionario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_satus`
    FOREIGN KEY (`id`)
    REFERENCES `mydb`.`status` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
