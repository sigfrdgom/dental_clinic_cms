CREATE DATABASE clinica_db;

USE clinica_db;

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`, `descripcion`,`estado`) VALUES
(1, 'Dentista general', 'La categoria para clasificar contenido acorde a odontologia general.',1),
(2, 'Especialidades Dentales', 'La categoria para clasificar contenido acorde a especialidades dentales.',1),
(3, 'Especialidades Medicas', 'La categoria para clasificar contenido acorde a especialidades medicas.',1),
(4, 'Curiosidades Dentales', 'La categoria para clasificar contenido acorde a tips y curiosidades.',1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `id_cita` int(11) NOT NULL,
  `nombre` varchar(64) NOT NULL,
  `celular` varchar(16) NOT NULL,
  `email` varchar(50) NOT NULL,
  `padecimientos` varchar(50) NOT NULL,
  `procedimiento` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `comentario` text,
  `fecha_solicitud` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id_contacto` int(11) NOT NULL,
  `nombre` varchar(64) NOT NULL,
  `telefono` varchar(16) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comentario` text,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE `publicacion` (
  `id_publicacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `titulo` varchar(64) NOT NULL,
  `texto_introduccion` varchar(256) NOT NULL,
  `contenido` text NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `recurso_av_1` varchar(200) NOT NULL,
  `recurso_av_2` varchar(200) DEFAULT NULL,
  `recurso_av_3` varchar(200) DEFAULT NULL,
  `recurso_av_4` varchar(200) DEFAULT NULL,
  `fecha_ingreso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `publicacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id_tipo` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id_tipo`, `nombre`, `estado`) VALUES
(1, 'SERVICIOS', 1),
(2, 'BLOG', 1),
(3, 'TESTIMONIOS', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(64) NOT NULL,
  `apellidos` varchar(64) NOT NULL,
  `nombre_usuario` varchar(32) NOT NULL,
  `contrasenia` varchar(256) NOT NULL,
  `tipo_usuario` set('ADMIN','GENERATOR','SIMPLE') NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombres`, `apellidos`, `nombre_usuario`, `contrasenia`, `tipo_usuario`, `estado`) VALUES
(1, 'Clidesa', 'admin', 'clidesa.admin', '$2y$13$.zmlCWcyyJOKzTqQTSYwBuf01I7CLEagI6jcjCOfcxgW5NMMvOGwW', 'ADMIN', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`id_cita`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id_contacto`);

--
-- Indices de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`id_publicacion`),
  ADD KEY `fkcategoria` (`id_categoria`),
  ADD KEY `publicacion_ibfk_1` (`id_usuario`),
  ADD KEY `fk_tipo_post` (`id_tipo`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `id_publicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD CONSTRAINT `fk_tipo_post` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id_tipo`),
  ADD CONSTRAINT `fkcategoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `publicacion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;