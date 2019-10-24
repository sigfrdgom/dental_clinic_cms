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


-- Volcando estructura de base de datos para agenda
CREATE DATABASE IF NOT EXISTS `agenda` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `agenda`;

-- Volcando estructura para tabla agenda.actividades
CREATE TABLE IF NOT EXISTS `actividades` (
  `codigoActividad` int(11) NOT NULL,
  `nombreActividad` varchar(250) NOT NULL,
  `estadoActividad` tinyint(4) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`codigoActividad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla agenda.actividades: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `actividades` DISABLE KEYS */;
/*!40000 ALTER TABLE `actividades` ENABLE KEYS */;

-- Volcando estructura para tabla agenda.baselegal
CREATE TABLE IF NOT EXISTS `baselegal` (
  `codigoBaseLegal` int(11) NOT NULL,
  `baseLegal` varchar(200) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  PRIMARY KEY (`codigoBaseLegal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla agenda.baselegal: ~13 rows (aproximadamente)
/*!40000 ALTER TABLE `baselegal` DISABLE KEYS */;
INSERT INTO `baselegal` (`codigoBaseLegal`, `baseLegal`, `estado`) VALUES
	(1, 'locura anciana', 1),
	(2, 'Demencia Señil', 1),
	(3, 'cocina', 1),
	(4, 'Vergon', 0),
	(5, 'cinco', 0),
	(6, 'seis', 0),
	(7, 'jose', 0),
	(8, 'jose jose', 0),
	(9, 'kiak', 1),
	(10, 'jaksa', 1),
	(11, 'ttttttt', 1),
	(12, 'asdasaaaaaaaaaa', 0),
	(13, 'tytyty', 0);
/*!40000 ALTER TABLE `baselegal` ENABLE KEYS */;

-- Volcando estructura para tabla agenda.cargos
CREATE TABLE IF NOT EXISTS `cargos` (
  `codigoCargo` int(11) NOT NULL,
  `cargo` varchar(100) NOT NULL,
  PRIMARY KEY (`codigoCargo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla agenda.cargos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
/*!40000 ALTER TABLE `cargos` ENABLE KEYS */;

-- Volcando estructura para tabla agenda.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla agenda.categoria: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`codigo`, `nombre`, `estado`) VALUES
	(1, 'payara', b'1'),
	(2, 'JAVA', b'1'),
	(3, '', b'1');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;

-- Volcando estructura para tabla agenda.categoriatrabajadoresbeneficiados
CREATE TABLE IF NOT EXISTS `categoriatrabajadoresbeneficiados` (
  `codigoCategoriaBeneficiado` int(11) NOT NULL,
  `categoria` varchar(200) NOT NULL,
  PRIMARY KEY (`codigoCategoriaBeneficiado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla agenda.categoriatrabajadoresbeneficiados: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `categoriatrabajadoresbeneficiados` DISABLE KEYS */;
INSERT INTO `categoriatrabajadoresbeneficiados` (`codigoCategoriaBeneficiado`, `categoria`) VALUES
	(1, 'adasdas'),
	(2, 'vvv'),
	(3, 'ggg');
/*!40000 ALTER TABLE `categoriatrabajadoresbeneficiados` ENABLE KEYS */;

-- Volcando estructura para tabla agenda.causaderesultado
CREATE TABLE IF NOT EXISTS `causaderesultado` (
  `codigoCausa` int(11) NOT NULL,
  `causa` varchar(250) NOT NULL,
  PRIMARY KEY (`codigoCausa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla agenda.causaderesultado: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `causaderesultado` DISABLE KEYS */;
/*!40000 ALTER TABLE `causaderesultado` ENABLE KEYS */;

-- Volcando estructura para tabla agenda.claees
CREATE TABLE IF NOT EXISTS `claees` (
  `codigoClaees` int(7) NOT NULL,
  `nombreClaees` varchar(200) COLLATE utf8_bin NOT NULL,
  `codigoSubClase` int(5) NOT NULL,
  PRIMARY KEY (`codigoClaees`),
  KEY `FK_claees_subclases` (`codigoSubClase`),
  CONSTRAINT `FK_claees_subclases` FOREIGN KEY (`codigoSubClase`) REFERENCES `subclases` (`codigoSubClase`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla agenda.claees: ~20 rows (aproximadamente)
/*!40000 ALTER TABLE `claees` DISABLE KEYS */;
INSERT INTO `claees` (`codigoClaees`, `nombreClaees`, `codigoSubClase`) VALUES
	(1111111, 'agricultura6', 11111),
	(1111112, 'agricultura7', 11111),
	(1111113, 'agricultura8', 11111),
	(1111114, 'agricultura9', 11111),
	(1111115, 'agricultura10', 11111),
	(1112101, 'pesca6', 11121),
	(1112102, 'pesca61', 11121),
	(1112103, 'pesca63', 11121),
	(2222222, 'apicultura6', 22222),
	(2222223, 'apicultura61', 22222),
	(3333333, 'silvicultura6', 33333),
	(3333334, 'silvicultura61', 33333),
	(3333335, 'silvicultura62', 33333),
	(3333336, 'silvicultura53', 33333),
	(4444444, 'ganaderia60', 44444),
	(4444445, 'ganaderia61', 44444),
	(4444446, 'ganaderia62', 44444),
	(5555551, 'fauna6', 55555),
	(6666669, 'ganado63', 66669),
	(7777777, 'jugos6', 77777);
/*!40000 ALTER TABLE `claees` ENABLE KEYS */;

-- Volcando estructura para tabla agenda.clases
CREATE TABLE IF NOT EXISTS `clases` (
  `codigoClase` int(4) NOT NULL,
  `nombreClase` varchar(200) COLLATE utf8_bin NOT NULL,
  `codigoGrupo` int(3) NOT NULL,
  PRIMARY KEY (`codigoClase`),
  KEY `FK_clases_grupos` (`codigoGrupo`),
  CONSTRAINT `FK_clases_grupos` FOREIGN KEY (`codigoGrupo`) REFERENCES `grupos` (`codigoGrupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla agenda.clases: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `clases` DISABLE KEYS */;
INSERT INTO `clases` (`codigoClase`, `nombreClase`, `codigoGrupo`) VALUES
	(1111, 'agricultura4', 111),
	(1112, 'pesca4', 112),
	(2222, 'apicultura4', 222),
	(2223, 'apicultua41', 222),
	(3333, 'silvicultura4', 333),
	(3334, 'silvicultura44', 333),
	(4444, 'ganaderia4', 444),
	(5555, 'fauna4', 555),
	(6668, 'ganado42', 668),
	(6669, 'ganado43', 696),
	(7777, 'jugos4', 777);
/*!40000 ALTER TABLE `clases` ENABLE KEYS */;

-- Volcando estructura para tabla agenda.departamentos
CREATE TABLE IF NOT EXISTS `departamentos` (
  `codigoDepartamento` int(11) NOT NULL,
  `nombreDepartamento` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`codigoDepartamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla agenda.departamentos: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
INSERT INTO `departamentos` (`codigoDepartamento`, `nombreDepartamento`) VALUES
	(1, 'Sonsonate'),
	(2, 'Ahuachapán'),
	(3, 'Santa Ana'),
	(4, 'Cuscatlán'),
	(5, 'San Salvador'),
	(6, 'Chalatenango');
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;

-- Volcando estructura para tabla agenda.divisiones
CREATE TABLE IF NOT EXISTS `divisiones` (
  `codigoDivision` int(2) NOT NULL,
  `nombreDivision` varchar(200) COLLATE utf8_bin NOT NULL,
  `codigoRama` char(1) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`codigoDivision`),
  KEY `FK_divisiones_ramas` (`codigoRama`),
  CONSTRAINT `FK_divisiones_ramas` FOREIGN KEY (`codigoRama`) REFERENCES `ramas` (`codigoRama`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla agenda.divisiones: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `divisiones` DISABLE KEYS */;
INSERT INTO `divisiones` (`codigoDivision`, `nombreDivision`, `codigoRama`) VALUES
	(11, 'agricultura2', 'a'),
	(12, 'pesca2', 'b'),
	(13, 'agricultura23', 'a'),
	(22, 'apicultura2', 'c'),
	(23, 'apicultura2', 'c'),
	(33, 'silvicultura2', 'd'),
	(34, 'silvicultura2', 'd'),
	(44, 'ganaderia2', 'e'),
	(55, 'fauna2', 'f'),
	(66, 'ganado2', 'g'),
	(67, 'ganado21', 'g'),
	(68, 'ganado22', 'g'),
	(69, 'ganado23', 'g'),
	(77, 'jugos2', 'j');
/*!40000 ALTER TABLE `divisiones` ENABLE KEYS */;

-- Volcando estructura para tabla agenda.empresasentidades
CREATE TABLE IF NOT EXISTS `empresasentidades` (
  `codigoEmpresa` int(11) NOT NULL,
  `nombreEmpresa` varchar(200) COLLATE utf8_bin NOT NULL,
  `nombrePatronoRazonSocial` varchar(200) COLLATE utf8_bin NOT NULL,
  `rama` char(1) COLLATE utf8_bin NOT NULL,
  `actividadEconomica` int(7) NOT NULL,
  `codigoSector` int(11) DEFAULT NULL,
  `nitEmpresa` bigint(15) NOT NULL,
  PRIMARY KEY (`codigoEmpresa`),
  KEY `FK_empresas_ramas` (`rama`),
  KEY `FK_empresas_claees` (`actividadEconomica`),
  KEY `FK_empresas_sector` (`codigoSector`),
  CONSTRAINT `FK_empresas_claees` FOREIGN KEY (`actividadEconomica`) REFERENCES `claees` (`codigoClaees`),
  CONSTRAINT `FK_empresas_ramas` FOREIGN KEY (`rama`) REFERENCES `ramas` (`codigoRama`),
  CONSTRAINT `FK_empresas_sector` FOREIGN KEY (`codigoSector`) REFERENCES `sectores` (`codigoSector`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla agenda.empresasentidades: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `empresasentidades` DISABLE KEYS */;
/*!40000 ALTER TABLE `empresasentidades` ENABLE KEYS */;

-- Volcando estructura para tabla agenda.entidadessolicitantesdeinspeccion
CREATE TABLE IF NOT EXISTS `entidadessolicitantesdeinspeccion` (
  `codigoEntidadSolicitante` int(11) NOT NULL,
  `nombreEntidadSolicitante` varchar(200) NOT NULL,
  PRIMARY KEY (`codigoEntidadSolicitante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla agenda.entidadessolicitantesdeinspeccion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `entidadessolicitantesdeinspeccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `entidadessolicitantesdeinspeccion` ENABLE KEYS */;

-- Volcando estructura para tabla agenda.grupos
CREATE TABLE IF NOT EXISTS `grupos` (
  `codigoGrupo` int(3) NOT NULL,
  `nombreGrupo` varchar(200) COLLATE utf8_bin NOT NULL,
  `codigoDivision` int(2) NOT NULL,
  PRIMARY KEY (`codigoGrupo`),
  KEY `FK_grupos_divisiones` (`codigoDivision`),
  CONSTRAINT `FK_grupos_divisiones` FOREIGN KEY (`codigoDivision`) REFERENCES `divisiones` (`codigoDivision`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla agenda.grupos: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `grupos` DISABLE KEYS */;
INSERT INTO `grupos` (`codigoGrupo`, `nombreGrupo`, `codigoDivision`) VALUES
	(111, 'agricultura3', 11),
	(112, 'pesca3', 12),
	(222, 'apicultura3', 22),
	(223, 'apicultura32', 22),
	(333, 'silvicultura3', 33),
	(334, 'silvicultura31', 33),
	(444, 'ganaderia3', 44),
	(555, 'fauna3', 55),
	(666, 'ganado3', 66),
	(667, 'ganado31', 67),
	(668, 'ganado32', 68),
	(669, 'ganado33', 67),
	(696, 'ganado33', 69),
	(777, 'jugos3', 77);
/*!40000 ALTER TABLE `grupos` ENABLE KEYS */;

-- Volcando estructura para tabla agenda.lugaresdetrabajo
CREATE TABLE IF NOT EXISTS `lugaresdetrabajo` (
  `codigoLugarDeTrabajo` int(11) NOT NULL,
  `codigoEmpresa` int(11) NOT NULL,
  `codigoMunicipio` int(11) NOT NULL,
  `direccion` varchar(250) COLLATE utf8_bin NOT NULL,
  `empleadosHombre` int(11) NOT NULL,
  `empleadosMujeres` int(11) NOT NULL,
  `estadoLugarDeTrabajo` bit(1) NOT NULL,
  `fechaUltimaInspeccion` datetime NOT NULL,
  PRIMARY KEY (`codigoLugarDeTrabajo`),
  KEY `FK_lugaresdetrabajo_empresas` (`codigoEmpresa`),
  KEY `FK_lugaresdetrabajo_municipios` (`codigoMunicipio`),
  CONSTRAINT `FK_lugaresdetrabajo_empresas` FOREIGN KEY (`codigoEmpresa`) REFERENCES `empresasentidades` (`codigoEmpresa`),
  CONSTRAINT `FK_lugaresdetrabajo_municipios` FOREIGN KEY (`codigoMunicipio`) REFERENCES `municipios` (`codigoMunicipio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla agenda.lugaresdetrabajo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `lugaresdetrabajo` DISABLE KEYS */;
/*!40000 ALTER TABLE `lugaresdetrabajo` ENABLE KEYS */;

-- Volcando estructura para tabla agenda.menuporroles
CREATE TABLE IF NOT EXISTS `menuporroles` (
  `codigoMenuRoles` int(11) NOT NULL,
  `codigoMenu` tinyint(4) NOT NULL,
  `codigoRol` int(11) NOT NULL,
  PRIMARY KEY (`codigoMenuRoles`),
  KEY `FK_MenuRoles_Menus` (`codigoMenu`),
  KEY `FK_MenuRoles_Roles` (`codigoRol`),
  CONSTRAINT `FK_MenuRoles_Menus` FOREIGN KEY (`codigoMenu`) REFERENCES `menus` (`codigoMenu`),
  CONSTRAINT `FK_MenuRoles_Roles` FOREIGN KEY (`codigoRol`) REFERENCES `roles` (`codigo_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla agenda.menuporroles: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `menuporroles` DISABLE KEYS */;
INSERT INTO `menuporroles` (`codigoMenuRoles`, `codigoMenu`, `codigoRol`) VALUES
	(1, 1, 2),
	(2, 4, 1),
	(4, 2, 2),
	(5, 3, 2),
	(6, 5, 2),
	(7, 6, 1),
	(8, 7, 3),
	(9, 8, 1),
	(10, 9, 2),
	(11, 10, 2),
	(12, 11, 2),
	(13, 12, 2),
	(14, 13, 2);
/*!40000 ALTER TABLE `menuporroles` ENABLE KEYS */;

-- Volcando estructura para tabla agenda.menus
CREATE TABLE IF NOT EXISTS `menus` (
  `codigoMenu` tinyint(4) NOT NULL,
  `nombreMenu` varchar(100) COLLATE utf8_bin NOT NULL,
  `url` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `codigoSubMenu` tinyint(4) DEFAULT NULL,
  `tipo` enum('S','M') COLLATE utf8_bin NOT NULL,
  `icono` varchar(75) COLLATE utf8_bin DEFAULT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`codigoMenu`),
  KEY `FK_Menu_SubMenu` (`codigoSubMenu`),
  CONSTRAINT `FK_Menu_SubMenu` FOREIGN KEY (`codigoSubMenu`) REFERENCES `menus` (`codigoMenu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla agenda.menus: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` (`codigoMenu`, `nombreMenu`, `url`, `codigoSubMenu`, `tipo`, `icono`, `estado`) VALUES
	(1, 'Notas', '', NULL, 'S', NULL, b'1'),
	(2, 'Nuevo', '/agendaWeb-war/Accesos/User/nuevo.jsf', 1, 'M', NULL, b'1'),
	(3, 'Buscar', '/agendaWeb-war/Accesos/User/buscar.jsf', 1, 'M', NULL, b'1'),
	(4, 'Comentar', '/agendaWeb-war/Accesos/Admin/comentar.jsf', NULL, 'M', NULL, b'1'),
	(5, 'Telefonos', '/agendaWeb-war/Accesos/User/telefonos.jsf', NULL, 'M', NULL, b'1'),
	(6, 'Consultar', '/agendaWeb-war/Accesos/Admin/consultar.jsf', NULL, 'M', NULL, b'1'),
	(7, 'Claees', '/agendaWeb-war/Accesos/Supervisor/claees.jsf', NULL, 'M', NULL, b'1'),
	(8, 'Configuración Inicial', '/agendaWeb-war/Accesos/Admin/configInicial.jsf', NULL, 'M', NULL, b'1'),
	(9, 'Tipo de Telefono', '/agendaWeb-war/Accesos/tipoTelefonos.jsf', NULL, 'M', NULL, b'1'),
	(10, 'Tipo de Inspeccion', '/agendaWeb-war/Accesos/tipoInspeccion.jsf', NULL, 'M', NULL, b'1'),
	(11, 'Base Legal', '/agendaWeb-war/Accesos/baseLegal.jsf', NULL, 'M', NULL, b'1'),
	(12, 'Tipo de Infraccion', '/agendaWeb-war/Accesos/tipoInfraccion.jsf', NULL, 'M', NULL, b'1'),
	(13, 'CategoriaTrabajadoresBeneficiados', '/agendaWeb-war/Accesos/categoriaTrabajadoresBeneficiados.jsf', NULL, 'M', NULL, b'1');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;

-- Volcando estructura para tabla agenda.metasanuales
CREATE TABLE IF NOT EXISTS `metasanuales` (
  `codigoMetaAnual` int(11) NOT NULL,
  `codigoActividad` int(11) NOT NULL,
  `metaAnualProgramada` int(11) NOT NULL,
  `metaAnualAlcanzada` int(11) NOT NULL,
  `porcentajeAnualProgramado` decimal(3,3) NOT NULL,
  `porcentajeAnualAlcanzado` decimal(3,3) NOT NULL,
  `anio` year(4) NOT NULL,
  PRIMARY KEY (`codigoMetaAnual`),
  KEY `fk_metasAnuales_actividades1` (`codigoActividad`),
  CONSTRAINT `fk_metasAnuales_actividades1` FOREIGN KEY (`codigoActividad`) REFERENCES `actividades` (`codigoActividad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla agenda.metasanuales: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `metasanuales` DISABLE KEYS */;
/*!40000 ALTER TABLE `metasanuales` ENABLE KEYS */;

-- Volcando estructura para tabla agenda.metasmensuales
CREATE TABLE IF NOT EXISTS `metasmensuales` (
  `codigoMeta` int(11) NOT NULL,
  `codigoActividad` int(11) NOT NULL,
  `nombreMes` varchar(100) NOT NULL,
  `metaMensualProgramada` int(11) NOT NULL,
  `metaMensualAlcanzada` int(11) NOT NULL,
  `porcentajeActividadProgramado` decimal(3,3) NOT NULL,
  `porcentajeActividadAlcanzado` decimal(3,3) NOT NULL,
  PRIMARY KEY (`codigoMeta`),
  KEY `fk_metasMensuales_actividades1` (`codigoActividad`),
  CONSTRAINT `fk_metasMensuales_actividades1` FOREIGN KEY (`codigoActividad`) REFERENCES `actividades` (`codigoActividad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla agenda.metasmensuales: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `metasmensuales` DISABLE KEYS */;
/*!40000 ALTER TABLE `metasmensuales` ENABLE KEYS */;

-- Volcando estructura para tabla agenda.motivos
CREATE TABLE IF NOT EXISTS `motivos` (
  `codigoMotivo` int(11) NOT NULL,
  `motivo` varchar(250) NOT NULL,
  PRIMARY KEY (`codigoMotivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla agenda.motivos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `motivos` DISABLE KEYS */;
/*!40000 ALTER TABLE `motivos` ENABLE KEYS */;

-- Volcando estructura para tabla agenda.municipios
CREATE TABLE IF NOT EXISTS `municipios` (
  `codigoMunicipio` int(11) NOT NULL,
  `nombreMunicipio` varchar(100) COLLATE utf8_bin NOT NULL,
  `codigoDepartamento` int(11) NOT NULL,
  PRIMARY KEY (`codigoMunicipio`),
  KEY `FK_municipios_departamentos` (`codigoDepartamento`),
  CONSTRAINT `FK_municipios_departamentos` FOREIGN KEY (`codigoDepartamento`) REFERENCES `departamentos` (`codigoDepartamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla agenda.municipios: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `municipios` DISABLE KEYS */;
INSERT INTO `municipios` (`codigoMunicipio`, `nombreMunicipio`, `codigoDepartamento`) VALUES
	(1, 'Juayúa', 1),
	(2, 'Salcoatitán', 1),
	(3, 'Nahuizalco', 1);
/*!40000 ALTER TABLE `municipios` ENABLE KEYS */;

-- Volcando estructura para tabla agenda.nota
CREATE TABLE IF NOT EXISTS `nota` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_persona` int(11) NOT NULL,
  `codigo_categoria` int(11) NOT NULL,
  `encabezado` varchar(50) COLLATE utf8_bin NOT NULL,
  `cuerpo` varchar(500) COLLATE utf8_bin NOT NULL,
  `fecha` datetime NOT NULL,
  `comentarioAdmin` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `valorizacion` enum('1','2','3','4','5') COLLATE utf8_bin DEFAULT '1',
  PRIMARY KEY (`codigo`),
  KEY `FK1_nota_categoria` (`codigo_categoria`),
  KEY `FK2_nota_persona` (`codigo_persona`),
  CONSTRAINT `FK1_nota_categoria` FOREIGN KEY (`codigo_categoria`) REFERENCES `categoria` (`codigo`),
  CONSTRAINT `FK2_nota_persona` FOREIGN KEY (`codigo_persona`) REFERENCES `persona` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla agenda.nota: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `nota` DISABLE KEYS */;
INSERT INTO `nota` (`codigo`, `codigo_persona`, `codigo_categoria`, `encabezado`, `cuerpo`, `fecha`, `comentarioAdmin`, `valorizacion`) VALUES
	(1, 2, 2, 'Prueba de PrimeFaces', 'Primer intento de guardar datos', '2019-05-19 15:18:00', 'Primer intento de valorización', '5'),
	(2, 2, 1, 'Segunda pruba de datos', 'Verificación del ingreso de datos, para poder valorizarlos ', '2019-05-21 13:19:00', 'Funciona perfectamente', '4'),
	(4, 14, 2, 'Prueba #2', 'Creando nueva nota con nuevo usuario', '2019-06-26 22:39:02', NULL, NULL),
	(5, 12, 1, 'Tercera prueba', 'La segunda fallo en la fecha, ya que no se muestra correctamente', '2019-06-28 23:14:36', '', '1'),
	(6, 14, 1, 'Tercer intento', 'Falla en la fecha', '2019-07-01 21:29:03', NULL, NULL),
	(7, 12, 2, 'Cuarto intento', 'Siguen los problemas con las fechas', '2019-07-01 22:06:05', NULL, NULL),
	(8, 2, 2, 'Quinto intento', 'Sigue fallado la fecha cuando se consulta', '2019-07-01 22:41:24', NULL, NULL);
/*!40000 ALTER TABLE `nota` ENABLE KEYS */;

-- Volcando estructura para tabla agenda.persona
CREATE TABLE IF NOT EXISTS `persona` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) COLLATE utf8_bin NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_bin NOT NULL,
  `sexo` enum('M','F') COLLATE utf8_bin NOT NULL,
  `fechaNacimiento` date NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla agenda.persona: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` (`codigo`, `nombres`, `apellidos`, `sexo`, `fechaNacimiento`) VALUES
	(1, 'MANUEL ANTONIO', 'SICILIANO LIQUEZ', 'M', '2013-01-18'),
	(2, 'CARLOS ALBERTO', 'MARTINEZ LOPEZ', 'M', '2019-03-30'),
	(11, 'Antonio', 'Liquez', 'M', '2019-06-24'),
	(12, 'Fernando', 'Aguilar', 'M', '2019-06-22'),
	(13, 'Fernando', 'Murillo', 'M', '2019-06-27'),
	(14, 'Mirna', 'Liquez', 'F', '2019-06-13'),
	(17, 'Cesar', 'Siciliano', 'M', '2019-07-04'),
	(22, 'wqda', 'asda', 'M', '2019-09-12');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;

-- Volcando estructura para tabla agenda.ramas
CREATE TABLE IF NOT EXISTS `ramas` (
  `codigoRama` char(1) COLLATE utf8_bin NOT NULL,
  `nombreRama` varchar(200) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`codigoRama`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla agenda.ramas: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `ramas` DISABLE KEYS */;
INSERT INTO `ramas` (`codigoRama`, `nombreRama`) VALUES
	('a', 'agricultura'),
	('b', 'pesca1'),
	('c', 'apicultura'),
	('d', 'silvicultura'),
	('e', 'ganaderia'),
	('f', 'fauna'),
	('g', 'ganado'),
	('h', 'Hortalizas'),
	('j', 'jugos');
/*!40000 ALTER TABLE `ramas` ENABLE KEYS */;

-- Volcando estructura para tabla agenda.requerimientoslugardetrabajo
CREATE TABLE IF NOT EXISTS `requerimientoslugardetrabajo` (
  `codigoRequerimiento` int(11) NOT NULL,
  `nombreRequerimiento` varchar(150) NOT NULL,
  PRIMARY KEY (`codigoRequerimiento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla agenda.requerimientoslugardetrabajo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `requerimientoslugardetrabajo` DISABLE KEYS */;
/*!40000 ALTER TABLE `requerimientoslugardetrabajo` ENABLE KEYS */;

-- Volcando estructura para tabla agenda.resultadoinspeccionesreinspeccion
CREATE TABLE IF NOT EXISTS `resultadoinspeccionesreinspeccion` (
  `codigoResultado` int(11) NOT NULL,
  `resultado` varchar(250) NOT NULL,
  PRIMARY KEY (`codigoResultado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla agenda.resultadoinspeccionesreinspeccion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `resultadoinspeccionesreinspeccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `resultadoinspeccionesreinspeccion` ENABLE KEYS */;

-- Volcando estructura para tabla agenda.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `codigo_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(150) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(150) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`codigo_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla agenda.roles: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`codigo_rol`, `nombre_rol`, `descripcion`) VALUES
	(1, 'Admin', 'Administrador del sistema'),
	(2, 'User', 'Usuario del sistema'),
	(3, 'Supervisor', 'Supervisa el ingreso de datos');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Volcando estructura para tabla agenda.sectores
CREATE TABLE IF NOT EXISTS `sectores` (
  `codigoSector` int(11) NOT NULL,
  `nombreSector` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`codigoSector`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla agenda.sectores: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `sectores` DISABLE KEYS */;
/*!40000 ALTER TABLE `sectores` ENABLE KEYS */;

-- Volcando estructura para tabla agenda.subclases
CREATE TABLE IF NOT EXISTS `subclases` (
  `codigoSubClase` int(5) NOT NULL,
  `nombreSubClase` varchar(200) COLLATE utf8_bin NOT NULL,
  `codigoClase` int(4) NOT NULL,
  PRIMARY KEY (`codigoSubClase`),
  KEY `FK_subclases_clases` (`codigoClase`),
  CONSTRAINT `FK_subclases_clases` FOREIGN KEY (`codigoClase`) REFERENCES `clases` (`codigoClase`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla agenda.subclases: ~15 rows (aproximadamente)
/*!40000 ALTER TABLE `subclases` DISABLE KEYS */;
INSERT INTO `subclases` (`codigoSubClase`, `nombreSubClase`, `codigoClase`) VALUES
	(11111, 'agricultura5', 1111),
	(11112, 'agricultura51', 1111),
	(11121, 'pesca5', 1112),
	(22222, 'apicultura5', 2222),
	(33333, 'silvicultura5', 3333),
	(33334, 'silvicultura51', 3333),
	(44444, 'ganaderia5', 4444),
	(44445, 'ganaderia55', 4444),
	(44446, 'ganaderia56', 4444),
	(44447, 'ganaderia57', 4444),
	(44448, 'ganaderia58', 4444),
	(44449, 'ganaderia59', 4444),
	(55555, 'fauna5', 5555),
	(66669, 'ganado53', 6669),
	(77777, 'jugos5', 7777);
/*!40000 ALTER TABLE `subclases` ENABLE KEYS */;

-- Volcando estructura para tabla agenda.telefono
CREATE TABLE IF NOT EXISTS `telefono` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_persona` int(11) NOT NULL,
  `numero` char(9) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `FK1_Telefono_Persona` (`codigo_persona`),
  CONSTRAINT `FK1_Telefono_Persona` FOREIGN KEY (`codigo_persona`) REFERENCES `persona` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla agenda.telefono: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `telefono` DISABLE KEYS */;
INSERT INTO `telefono` (`codigo`, `codigo_persona`, `numero`) VALUES
	(19, 2, '11111111'),
	(20, 2, '66666666'),
	(21, 2, '88888888'),
	(22, 2, '44444444'),
	(23, 2, '99999999'),
	(24, 2, '77777888'),
	(25, 2, '33333333'),
	(26, 2, '44444444'),
	(27, 2, '77777777'),
	(28, 2, '88888888'),
	(29, 2, '77777777');
/*!40000 ALTER TABLE `telefono` ENABLE KEYS */;

-- Volcando estructura para tabla agenda.tipoinfraccion
CREATE TABLE IF NOT EXISTS `tipoinfraccion` (
  `codigoTipoInfraccion` int(11) NOT NULL,
  `tipoInfraccion` varchar(200) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  PRIMARY KEY (`codigoTipoInfraccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla agenda.tipoinfraccion: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `tipoinfraccion` DISABLE KEYS */;
INSERT INTO `tipoinfraccion` (`codigoTipoInfraccion`, `tipoInfraccion`, `estado`) VALUES
	(1, 'Infraccion de amor', 1),
	(2, 'Codigo de amor', 0),
	(3, 'caca', 0),
	(4, 'kakaroto', 0),
	(5, 'TUTU', 0),
	(6, 'lololo', 1);
/*!40000 ALTER TABLE `tipoinfraccion` ENABLE KEYS */;

-- Volcando estructura para tabla agenda.tipoinspeccion
CREATE TABLE IF NOT EXISTS `tipoinspeccion` (
  `codigoTipoInspeccion` int(11) NOT NULL,
  `tipoInspeccion` varchar(150) NOT NULL,
  PRIMARY KEY (`codigoTipoInspeccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla agenda.tipoinspeccion: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `tipoinspeccion` DISABLE KEYS */;
INSERT INTO `tipoinspeccion` (`codigoTipoInspeccion`, `tipoInspeccion`) VALUES
	(1, 'ytftfy'),
	(2, 'saaaaa'),
	(3, 'rrrr'),
	(4, 'asdasd'),
	(5, 'dddddd'),
	(6, 'uuuu'),
	(7, 'jjj');
/*!40000 ALTER TABLE `tipoinspeccion` ENABLE KEYS */;

-- Volcando estructura para tabla agenda.tipotelefono
CREATE TABLE IF NOT EXISTS `tipotelefono` (
  `codigoTipoTelefono` int(11) NOT NULL,
  `tipoTelefono` varchar(100) NOT NULL,
  PRIMARY KEY (`codigoTipoTelefono`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla agenda.tipotelefono: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `tipotelefono` DISABLE KEYS */;
INSERT INTO `tipotelefono` (`codigoTipoTelefono`, `tipoTelefono`) VALUES
	(1, 'Telefono Fijo'),
	(2, 'Telefono Fax'),
	(3, 'Telefono Celular'),
	(4, 'Telefono X'),
	(5, 'xxxxx'),
	(6, 'asdasd'),
	(7, 'adasd'),
	(8, 'yyy'),
	(10, 'cccc'),
	(11, 'xxx'),
	(12, '3333');
/*!40000 ALTER TABLE `tipotelefono` ENABLE KEYS */;

-- Volcando estructura para tabla agenda.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `codigoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_persona` int(11) NOT NULL,
  `usuario` varchar(100) COLLATE utf8_bin NOT NULL,
  `clave` varchar(200) COLLATE utf8_bin NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `fechaCreado` date DEFAULT NULL,
  `fechaModificado` date DEFAULT NULL,
  PRIMARY KEY (`codigoUsuario`),
  UNIQUE KEY `usuario` (`usuario`),
  KEY `FK1_usuarios_persona` (`codigo_persona`),
  CONSTRAINT `FK1_usuarios_persona` FOREIGN KEY (`codigo_persona`) REFERENCES `persona` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla agenda.usuarios: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`codigoUsuario`, `codigo_persona`, `usuario`, `clave`, `estado`, `fechaCreado`, `fechaModificado`) VALUES
	(1, 1, 'sici1230', 'jZae727K08KaOmKSgOaGzww/XVqGr/PKEgIMkjrcbJI=', 1, '2019-03-29', NULL),
	(2, 2, 'ml12008', 'BPiZbadjt6lpsQKO4wB1aerzpjVIbdqyEdUSyFud+Ps=', 1, '2019-03-30', NULL),
	(11, 11, 'antonio123', 'TuNnmJLmrFpbUT66f9Up02PXqWUIQhxdvUSwGzSc9RQ=', 1, NULL, NULL),
	(12, 12, 'fernando', 'B2qJwjF5zt/GEXH+QA7PAft2uaSKaPuC3QzWiNaE2QA=', 1, NULL, NULL),
	(13, 13, 'fer123', 'B2qJwjF5zt/GEXH+QA7PAft2uaSKaPuC3QzWiNaE2QA=', 1, NULL, NULL),
	(14, 14, 'Raquel', 'WZRHGrsBESr8wYFZ9sx0tPURuZgG2lmzyvWpwXPKz8U=', 1, NULL, NULL),
	(17, 17, 'Cesar123', 'WZRHGrsBESr8wYFZ9sx0tPURuZgG2lmzyvWpwXPKz8U=', 1, NULL, NULL),
	(22, 22, 'cali21', 'A6xnQhbz4Vx2HuGl4lXwZ5U2I8iziLRFnhP5eNfIRvQ=', 1, NULL, NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla agenda.usuariosporroles
CREATE TABLE IF NOT EXISTS `usuariosporroles` (
  `codigo_usuario_roles` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_usuario` int(11) NOT NULL,
  `codigo_rol` int(11) NOT NULL,
  PRIMARY KEY (`codigo_usuario_roles`),
  KEY `FK1_usuarioporroles_usuarios` (`codigo_usuario`),
  KEY `FK2_usuarioporroles_roles` (`codigo_rol`),
  CONSTRAINT `FK1_usuarioporroles_usuarios` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuarios` (`codigoUsuario`),
  CONSTRAINT `FK2_usuarioporroles_roles` FOREIGN KEY (`codigo_rol`) REFERENCES `roles` (`codigo_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla agenda.usuariosporroles: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `usuariosporroles` DISABLE KEYS */;
INSERT INTO `usuariosporroles` (`codigo_usuario_roles`, `codigo_usuario`, `codigo_rol`) VALUES
	(1, 1, 1),
	(2, 2, 2),
	(7, 11, 2),
	(8, 12, 2),
	(9, 13, 2),
	(10, 14, 2),
	(13, 17, 3),
	(18, 22, 1);
/*!40000 ALTER TABLE `usuariosporroles` ENABLE KEYS */;

-- Volcando estructura para vista agenda.v_usuarios_roles
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `v_usuarios_roles` (
	`codigo_usuario` INT(11) NOT NULL,
	`codigo_rol` INT(11) NOT NULL,
	`usuario` VARCHAR(100) NOT NULL COLLATE 'utf8_bin',
	`clave` VARCHAR(200) NOT NULL COLLATE 'utf8_bin',
	`perfil` VARCHAR(150) NOT NULL COLLATE 'utf8_bin',
	`nombres` VARCHAR(100) NOT NULL COLLATE 'utf8_bin',
	`apellidos` VARCHAR(100) NOT NULL COLLATE 'utf8_bin'
) ENGINE=MyISAM;

-- Volcando estructura para vista agenda.v_usuarios_roles
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `v_usuarios_roles`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_usuarios_roles` AS select ur.codigo_usuario, ur.codigo_rol, u.usuario,
u.clave, r.nombre_rol as perfil, p.nombres, p.apellidos
from persona p inner join usuarios u  on p.codigo = u.codigo_persona inner join usuariosporroles ur on ur.codigo_usuario = u.codigoUsuario
inner join roles r on r.codigo_rol = ur.codigo_rol ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
