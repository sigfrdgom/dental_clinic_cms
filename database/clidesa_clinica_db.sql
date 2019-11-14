-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         10.3.13-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para clidesa_clinica_db
CREATE DATABASE IF NOT EXISTS `clidesa_clinica_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `clidesa_clinica_db`;

-- Volcando estructura para tabla clidesa_clinica_db.bitacora
CREATE TABLE IF NOT EXISTS `bitacora` (
  `id_bitacora` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `accion` varchar(200) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `titulo` varchar(300) DEFAULT NULL,
  `tipo_usuario` varchar(50) NOT NULL,
  PRIMARY KEY (`id_bitacora`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla clidesa_clinica_db.bitacora: ~35 rows (aproximadamente)
/*!40000 ALTER TABLE `bitacora` DISABLE KEYS */;
INSERT INTO `bitacora` (`id_bitacora`, `usuario`, `accion`, `fecha`, `titulo`, `tipo_usuario`) VALUES
	(1, 'clidesa.admin', 'Finalizo su Sesion', '2019-11-13 22:39:12', 'Clidesa', 'ADMIN'),
	(2, 'clidesa.admin', 'Inicio de su Sesion', '2019-11-13 22:39:17', 'Clidesa', 'ADMIN'),
	(3, 'clidesa.admin', 'Agrego una Categoria', '2019-11-13 23:11:44', 'Categoria LOLOLO', 'ADMIN'),
	(4, 'clidesa.admin', 'Modifico una Categoria', '2019-11-13 23:33:37', 'Categoria Modificada', 'ADMIN'),
	(5, 'clidesa.admin', 'Desactivo una Categoria', '2019-11-13 23:34:24', 'Categoria Desactivada', 'ADMIN'),
	(6, 'clidesa.admin', 'Activo una Categoria', '2019-11-13 23:34:27', 'Categoria Activada', 'ADMIN'),
	(7, 'clidesa.admin', 'Activo una Categoria', '2019-11-13 23:34:29', 'Categoria Activada', 'ADMIN'),
	(8, 'clidesa.admin', 'Desactivo una Categoria', '2019-11-13 23:34:37', 'Categoria Desactivada', 'ADMIN'),
	(9, 'clidesa.admin', 'Desactivo una Categoria', '2019-11-13 23:34:40', 'Categoria Desactivada', 'ADMIN'),
	(10, 'clidesa.admin', 'Desactivo una Categoria', '2019-11-13 23:34:42', 'Categoria Desactivada', 'ADMIN'),
	(11, 'clidesa.admin', 'Modifico una Categoria', '2019-11-13 23:34:52', 'Categoria Modificada', 'ADMIN'),
	(12, 'clidesa.admin', 'Modifico una Categoria', '2019-11-13 23:35:05', 'Categoria Modificada', 'ADMIN'),
	(13, 'clidesa.admin', 'Activo una Categoria', '2019-11-13 23:37:07', 'Categoria Activada', 'ADMIN'),
	(14, 'clidesa.admin', 'Activo una Categoria', '2019-11-13 23:37:08', 'Categoria Activada', 'ADMIN'),
	(15, 'clidesa.admin', 'Activo una Categoria', '2019-11-13 23:37:09', 'Categoria Activada', 'ADMIN'),
	(16, 'clidesa.admin', 'Agrego una Categoria', '2019-11-13 23:39:21', 'Categoria xxxxxxxxxx', 'ADMIN'),
	(17, 'clidesa.admin', 'Agrego una Categoria', '2019-11-13 23:39:31', 'Categoria xxxxxxxxxx', 'ADMIN'),
	(18, 'clidesa.admin', 'Desactivo una Categoria', '2019-11-13 23:39:41', 'Categoria Desactivada', 'ADMIN'),
	(19, 'clidesa.admin', 'Desactivo una Categoria', '2019-11-14 00:05:32', 'Categoria Desactivada', 'ADMIN'),
	(20, 'clidesa.admin', 'Desactivo una Categoria', '2019-11-14 00:38:22', 'Categoria Desactivada ', 'ADMIN'),
	(21, 'clidesa.admin', 'Activo una Categoria', '2019-11-14 00:39:51', 'Categoria Activada', 'ADMIN'),
	(22, 'clidesa.admin', 'Activo una Categoria', '2019-11-14 00:42:45', 'Categoria Activada', 'ADMIN'),
	(23, 'clidesa.admin', 'Activo una Categoria', '2019-11-14 00:43:46', 'Categoria Activada', 'ADMIN'),
	(24, 'clidesa.admin', 'Activo una Categoria', '2019-11-14 00:43:46', 'Categoria Activada', 'ADMIN'),
	(25, 'clidesa.admin', 'Activo una Categoria', '2019-11-14 00:44:33', 'Categoria Activada', 'ADMIN'),
	(26, 'clidesa.admin', 'Activo una Categoria', '2019-11-14 00:44:34', 'Categoria Activada', 'ADMIN'),
	(27, 'clidesa.admin', 'Desactivo una Categoria', '2019-11-14 00:46:58', 'Categoria Desactivada ', 'ADMIN'),
	(28, 'clidesa.admin', 'Activo una Categoria', '2019-11-14 00:47:59', 'Categoria Activada', 'ADMIN'),
	(29, 'clidesa.admin', 'Activo una Categoria', '2019-11-14 00:48:00', 'Categoria Activada', 'ADMIN'),
	(30, 'clidesa.admin', 'Desactivo una Categoria', '2019-11-14 00:49:01', 'Categoria Desactivada ', 'ADMIN'),
	(31, 'clidesa.admin', 'Agrego una Categoria', '2019-11-14 00:50:43', 'Categoria cccccccc', 'ADMIN'),
	(32, 'clidesa.admin', 'Activo una Categoria', '2019-11-14 00:50:47', 'Categoria Locuritas', 'ADMIN'),
	(33, 'clidesa.admin', 'Activo una Categoria', '2019-11-14 00:50:48', 'Categoria Curiosidades Dentales', 'ADMIN'),
	(34, 'clidesa.admin', 'Desactivo una Categoria', '2019-11-14 00:50:50', 'Categoria Curiosidades Dentales', 'ADMIN'),
	(35, 'clidesa.admin', 'Modifico una Categoria', '2019-11-14 00:50:54', 'Categoria Curiosidades Dentales', 'ADMIN'),
	(36, 'clidesa.admin', 'Visualizo una Cita', '2019-11-14 00:57:15', 'Cita Leida de xxxxx', 'ADMIN'),
	(37, 'clidesa.admin', 'Creo un Nuevo Servicio', '2019-11-14 01:06:49', 'xxxxxxx', 'ADMIN'),
	(38, 'clidesa.admin', 'Elimino un Servicio', '2019-11-14 01:07:17', 'SERVICIO ', 'ADMIN'),
	(39, 'clidesa.admin', 'Creo un Nuevo Servicio', '2019-11-14 01:09:53', 'xxxxxxxxxxxx', 'ADMIN'),
	(40, 'clidesa.admin', 'Elimino un Servicio', '2019-11-14 01:09:59', 'SERVICIO ', 'ADMIN'),
	(41, 'clidesa.admin', 'Creo un Nuevo Servicio', '2019-11-14 01:11:02', 'xxxxxxxxx', 'ADMIN'),
	(42, 'clidesa.admin', 'Elimino un Servicio', '2019-11-14 01:11:08', 'SERVICIO xxxxxxxxx', 'ADMIN'),
	(43, 'clidesa.admin', 'Desactivo una Categoria', '2019-11-14 02:56:46', 'Categoria Locuritas', 'ADMIN');
/*!40000 ALTER TABLE `bitacora` ENABLE KEYS */;

-- Volcando estructura para tabla clidesa_clinica_db.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  PRIMARY KEY (`id_categoria`),
  KEY `id_tipo` (`id_tipo`),
  CONSTRAINT `FK_categoria_tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla clidesa_clinica_db.categoria: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`id_categoria`, `nombre`, `descripcion`, `estado`, `id_tipo`) VALUES
	(8, 'Locuritas', 'asdasd', 0, 4),
	(9, 'Curiosidades Dentales', 'Locura de dientes', 0, 4),
	(12, 'LOLOLO', 'cccccccc', 0, 3),
	(13, 'xxxxxxxxxx', 'xxxxxxxxx', 0, 2),
	(14, 'xxxxxxxxxx', 'xxxxxxxxxx', 0, 3),
	(15, 'cccccccc', 'cccccccc', 1, 3);
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;

-- Volcando estructura para tabla clidesa_clinica_db.cita
CREATE TABLE IF NOT EXISTS `cita` (
  `id_cita` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(64) NOT NULL,
  `celular` varchar(16) NOT NULL,
  `email` varchar(50) NOT NULL,
  `padecimientos` varchar(50) NOT NULL,
  `procedimiento` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `comentario` text DEFAULT NULL,
  `fecha_solicitud` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_cita`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla clidesa_clinica_db.cita: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cita` DISABLE KEYS */;
INSERT INTO `cita` (`id_cita`, `nombre`, `celular`, `email`, `padecimientos`, `procedimiento`, `fecha`, `hora`, `comentario`, `fecha_solicitud`, `estado`) VALUES
	(4, 'xxxxx', '503111111111', 'valmatl21@gmail.com', 'Tyrodism', 'Dental procedure', '2019-11-14', '10:00:00', 'asdasdas', '2019-11-14 00:56:58', 0);
/*!40000 ALTER TABLE `cita` ENABLE KEYS */;

-- Volcando estructura para tabla clidesa_clinica_db.contacto
CREATE TABLE IF NOT EXISTS `contacto` (
  `id_contacto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(64) NOT NULL,
  `telefono` varchar(16) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comentario` text DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_contacto`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla clidesa_clinica_db.contacto: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `contacto` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacto` ENABLE KEYS */;

-- Volcando estructura para tabla clidesa_clinica_db.publicacion
CREATE TABLE IF NOT EXISTS `publicacion` (
  `id_publicacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `titulo` varchar(90) NOT NULL,
  `texto_introduccion` varchar(256) NOT NULL,
  `contenido` text NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `recurso_av_1` varchar(200) DEFAULT NULL,
  `fecha_ingreso` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_publicacion`),
  KEY `fkcategoria` (`id_categoria`),
  KEY `publicacion_ibfk_1` (`id_usuario`),
  KEY `fk_tipo_post` (`id_tipo`),
  CONSTRAINT `fk_tipo_post` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id_tipo`),
  CONSTRAINT `fkcategoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
  CONSTRAINT `publicacion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla clidesa_clinica_db.publicacion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `publicacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `publicacion` ENABLE KEYS */;

-- Volcando estructura para tabla clidesa_clinica_db.tipo
CREATE TABLE IF NOT EXISTS `tipo` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla clidesa_clinica_db.tipo: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;
INSERT INTO `tipo` (`id_tipo`, `nombre`, `estado`) VALUES
	(1, 'SERVICIOS', 1),
	(2, 'BLOG', 0),
	(3, 'TESTIMONIOS', 1),
	(4, 'METODOS DE PAGO', 1);
/*!40000 ALTER TABLE `tipo` ENABLE KEYS */;

-- Volcando estructura para tabla clidesa_clinica_db.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(64) NOT NULL,
  `apellidos` varchar(64) NOT NULL,
  `nombre_usuario` varchar(32) NOT NULL,
  `contrasenia` varchar(256) NOT NULL,
  `tipo_usuario` set('ADMIN','MERCADEO','ATENCION AL CLIENTE') NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla clidesa_clinica_db.usuario: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id_usuario`, `nombres`, `apellidos`, `nombre_usuario`, `contrasenia`, `tipo_usuario`, `estado`) VALUES
	(1, 'Clidesa', 'admin', 'clidesa.admin', '$2y$13$.zmlCWcyyJOKzTqQTSYwBuf01I7CLEagI6jcjCOfcxgW5NMMvOGwW', 'ADMIN', 1),
	(7, 'Carlos', 'Martinez', 'Matl21', '$2y$13$Qm8mCnKI4T41/XGymNGpGeqD3t3gPhcThYZOGb0tUib9920RTlkXK', 'MERCADEO', 1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
