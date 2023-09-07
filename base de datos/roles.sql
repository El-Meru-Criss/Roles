-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema roles
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema roles
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `roles` DEFAULT CHARACTER SET utf8 ;
USE `roles` ;

-- -----------------------------------------------------
-- Table `roles`.`Permisos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `roles`.`Permisos` (
  `idPermisos` INT NOT NULL AUTO_INCREMENT,
  `Nom_Permiso` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPermisos`),
  UNIQUE INDEX `Nom_Permiso_UNIQUE` (`Nom_Permiso` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `roles`.`Roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `roles`.`Roles` (
  `idRoles` INT NOT NULL,
  `Nom_Rol` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idRoles`),
  UNIQUE INDEX `Nom_Rol_UNIQUE` (`Nom_Rol` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `roles`.`Permisos_has_Roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `roles`.`Permisos_has_Roles` (
  `Permisos_idPermisos` INT NOT NULL,
  `Roles_idRoles` INT NOT NULL,
  `estado_rol` BINARY(1) NOT NULL,
  PRIMARY KEY (`Permisos_idPermisos`, `Roles_idRoles`),
  INDEX `fk_Permisos_has_Roles_Roles1_idx` (`Roles_idRoles` ASC) ,
  INDEX `fk_Permisos_has_Roles_Permisos_idx` (`Permisos_idPermisos` ASC) ,
  CONSTRAINT `fk_Permisos_has_Roles_Permisos`
    FOREIGN KEY (`Permisos_idPermisos`)
    REFERENCES `roles`.`Permisos` (`idPermisos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Permisos_has_Roles_Roles1`
    FOREIGN KEY (`Roles_idRoles`)
    REFERENCES `roles`.`Roles` (`idRoles`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `roles`.`Usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `roles`.`Usuarios` (
  `cc` INT NOT NULL,
  `Nombre` VARCHAR(45) NOT NULL,
  `contraseña` VARCHAR(45) NOT NULL,
  `Roles_idRoles` INT NOT NULL,
  PRIMARY KEY (`cc`),
  INDEX `fk_Usuarios_Roles1_idx` (`Roles_idRoles` ASC) ,
  CONSTRAINT `fk_Usuarios_Roles1`
    FOREIGN KEY (`Roles_idRoles`)
    REFERENCES `roles`.`Roles` (`idRoles`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `roles`.`Permisos_has_Usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `roles`.`Permisos_has_Usuarios` (
  `Permisos_idPermisos` INT NOT NULL,
  `Usuarios_cc` INT NOT NULL,
  `estado_usuario` BINARY(1) NOT NULL,
  PRIMARY KEY (`Permisos_idPermisos`, `Usuarios_cc`),
  INDEX `fk_Permisos_has_Usuarios_Usuarios1_idx` (`Usuarios_cc` ASC) ,
  INDEX `fk_Permisos_has_Usuarios_Permisos1_idx` (`Permisos_idPermisos` ASC) ,
  CONSTRAINT `fk_Permisos_has_Usuarios_Permisos1`
    FOREIGN KEY (`Permisos_idPermisos`)
    REFERENCES `roles`.`Permisos` (`idPermisos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Permisos_has_Usuarios_Usuarios1`
    FOREIGN KEY (`Usuarios_cc`)
    REFERENCES `roles`.`Usuarios` (`cc`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `roles`.`libros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `roles`.`libros` (
  `idlibros` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idlibros`),
  UNIQUE INDEX `titulo_UNIQUE` (`titulo` ASC) )
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
