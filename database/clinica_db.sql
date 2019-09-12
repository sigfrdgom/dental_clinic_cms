CREATE SCHEMA IF NOT EXISTS `clinica_db`;
USE clinica_db;


CREATE TABLE IF NOT EXISTS `categoria`(
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` VARCHAR(100) NOT NULL,
  `descripcion` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id_categoria`));
  
  
CREATE TABLE IF NOT EXISTS `tipo` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_tipo`));
  
 
CREATE TABLE IF NOT EXISTS `usuario`(
  `id_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(64) NOT NULL,
  `apellidos` VARCHAR(64) NOT NULL,
  `nombre_usuario` VARCHAR(32) NOT NULL,
  `contrasenia` VARCHAR(256) NOT NULL,
  `tipo_usuario` VARCHAR(32) NOT NULL,
  `estado` TINYINT(2) NOT NULL,
  PRIMARY KEY (`id_usuario`));

CREATE TABLE IF NOT EXISTS `publicacion`(
  `id_publicacion` INT(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` INT(11) NOT NULL,
  `id_categoria` INT(11) NOT NULL,
  `id_tipo` INT(11) NOT NULL,
  `titulo` VARCHAR(64) NOT NULL,
  `texto_introduccion` VARCHAR(256) NOT NULL,
  `contenido` TEXT NOT NULL,
  `estado` TINYINT(1) NOT NULL,
  `recurso_av_1` VARCHAR(200) NOT NULL,
  `recurso_av_2` VARCHAR(200) NULL DEFAULT NULL,
  `recurso_av_3` VARCHAR(200) NULL DEFAULT NULL,
  `recurso_av_4` VARCHAR(200) NULL DEFAULT NULL,
  `fecha_ingreso` DATE NOT NULL,
  PRIMARY KEY (`id_publicacion`), CONSTRAINT `fkcategoria`
    FOREIGN KEY (`id_categoria`)
    REFERENCES `categoria` (`id_categoria`),
  CONSTRAINT `publicacion_ibfk_1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `fk_tipo_post`
    FOREIGN KEY (`id_tipo`)
    REFERENCES `tipo` (`id_tipo`));


CREATE TABLE IF NOT EXISTS `contacto`(
  `id_contacto` INT(11) NOT NULL AUTO_INCREMENT,
  `telefono` VARCHAR(16) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `comentario` VARCHAR(512) NOT NULL,
  PRIMARY KEY (`id_contacto`));


CREATE TABLE IF NOT EXISTS `cita`(
  `id_cita` INT(11) NOT NULL AUTO_INCREMENT,
  `celular` VARCHAR(16) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `padecimientos` VARCHAR(50) NOT NULL,
  `procedimiento` VARCHAR(50) NOT NULL,
  `fecha` DATE NOT NULL,
  `hora` TIME NOT NULL,
  `comentario` VARCHAR(512) NOT NULL,
  PRIMARY KEY (`id_cita`));
  

