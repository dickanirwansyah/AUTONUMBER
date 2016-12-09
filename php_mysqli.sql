-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema php_mysqli
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `php_mysqli` ;

-- -----------------------------------------------------
-- Schema php_mysqli
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `php_mysqli` DEFAULT CHARACTER SET utf8 ;
USE `php_mysqli` ;

-- -----------------------------------------------------
-- Table `php_mysqli`.`barang`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `php_mysqli`.`barang` ;

CREATE TABLE IF NOT EXISTS `php_mysqli`.`barang` (
  `kd_barang` VARCHAR(15) NOT NULL,
  `nama` VARCHAR(45) NOT NULL,
  `jumlah` INT NOT NULL,
  `harga` DOUBLE NOT NULL,
  PRIMARY KEY (`kd_barang`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
