
SET FOREIGN_KEY_CHECKS=0
; 
/* Drop Tables */

DROP TABLE IF EXISTS `Direccion` CASCADE
;

DROP TABLE IF EXISTS `Registro` CASCADE
;

DROP TABLE IF EXISTS `Usuario` CASCADE
;

/* Create Tables */

CREATE TABLE `Direccion`
(
	`idDireccion` INTEGER(3) AUTO_INCREMENT,
	`numero` DECIMAL(4,0) NULL,
	`nombre` VARCHAR(20) NULL,
	`ciudad` VARCHAR(20) NULL,
	`codPostal` DECIMAL(5,0) NULL,
	`latitud` VARCHAR(20) NULL,
	`longitud` VARCHAR(20) NULL,
	`idUsuario` VARCHAR(11) NULL,
	CONSTRAINT `PK_Direccion` PRIMARY KEY (`idDireccion` ASC)
)

;

CREATE TABLE `Registro`
(
	`idRegistro` INTEGER(3) AUTO_INCREMENT,
	`username` VARCHAR(30) NULL,
	`pass` VARCHAR(30) NULL,
	`imagenUrl` VARCHAR(80) NULL,
	`idUsuario` VARCHAR(11) NULL,
	CONSTRAINT `PK_Login` PRIMARY KEY (`idRegistro` ASC)
)

;

CREATE TABLE `Usuario`
(
	`tipo` VARCHAR(3) NULL,
	`documento` VARCHAR(11) NOT NULL,
	`nombre` VARCHAR(20) NULL,
	`apellido` VARCHAR(20) NULL,
	`email` VARCHAR(50) NULL,
	`telefono` VARCHAR(14) NULL,
	`edad` DECIMAL(3,0) NULL,
	`genero` VARCHAR(1) NULL,
	CONSTRAINT `PK_Usuario` PRIMARY KEY (`documento` ASC)
)

;

/* Create Primary Keys, Indexes, Uniques, Checks */

ALTER TABLE `Direccion` 
 ADD INDEX `IXFK_Direccion_Usuario` (`idUsuario` ASC)
;

ALTER TABLE `Registro` 
 ADD INDEX `IXFK_Registro_Usuario` (`idUsuario` ASC)
;

/* Create Foreign Key Constraints */

ALTER TABLE `Direccion` 
 ADD CONSTRAINT `FK_Direccion_Usuario`
	FOREIGN KEY (`idUsuario`) REFERENCES `Usuario` (`documento`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `Registro` 
 ADD CONSTRAINT `FK_Registro_Usuario`
	FOREIGN KEY (`idUsuario`) REFERENCES `Usuario` (`documento`) ON DELETE Restrict ON UPDATE Restrict
;

SET FOREIGN_KEY_CHECKS=1
; 
