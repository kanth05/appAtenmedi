-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2020 a las 04:36:29
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `atenmedi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companias`
--

CREATE TABLE `companias` (
  `cod_compania` varchar(10) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `companias`
--

INSERT INTO `companias` (`cod_compania`, `descripcion`) VALUES
('01', 'HMO'),
('02', 'Clínica Fulana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conversaciones`
--

CREATE TABLE `conversaciones` (
  `idconv` decimal(10,0) NOT NULL,
  `idoper` decimal(10,0) NOT NULL,
  `fecha_conversacion` date NOT NULL,
  `idsesion` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_operaciones`
--

CREATE TABLE `historial_operaciones` (
  `idoper` decimal(10,0) NOT NULL,
  `idmedi` decimal(10,0) NOT NULL,
  `idusr` decimal(10,0) NOT NULL,
  `cod_operacion` varchar(10) COLLATE utf8_bin NOT NULL,
  `causa` varchar(255) COLLATE utf8_bin NOT NULL,
  `sintomas` varchar(255) COLLATE utf8_bin NOT NULL,
  `fecha_oper` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `idmedi` decimal(10,0) NOT NULL,
  `idusr` decimal(10,0) NOT NULL,
  `stsmedi` varchar(10) COLLATE utf8_bin NOT NULL,
  `turno` varchar(10) COLLATE utf8_bin NOT NULL,
  `fec_ult_conec` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`idmedi`, `idusr`, `stsmedi`, `turno`, `fec_ult_conec`) VALUES
('1', '1', 'ACT', '1', '2020-05-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `idsms` decimal(10,0) NOT NULL,
  `idconv` decimal(10,0) NOT NULL,
  `idemisor` decimal(10,0) NOT NULL,
  `idreceptor` decimal(10,0) NOT NULL,
  `fecha_sms` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operaciones`
--

CREATE TABLE `operaciones` (
  `cod_operacion` varchar(10) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `operaciones`
--

INSERT INTO `operaciones` (`cod_operacion`, `descripcion`) VALUES
('01', 'VideoLlamada'),
('02', 'VideoLlamada'),
('03', 'Traslado'),
('04', 'AMD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `cod_producto` varchar(10) COLLATE utf8_bin NOT NULL,
  `stsprod` varchar(10) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`cod_producto`, `stsprod`, `descripcion`) VALUES
('01', 'ACT', 'Home Care'),
('02', 'ACT', 'Atenmedi Corporativo'),
('03', 'ACT', 'Atenmedi Family');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prod_usr`
--

CREATE TABLE `prod_usr` (
  `idprod` decimal(10,0) NOT NULL,
  `cod_producto` varchar(10) COLLATE utf8_bin NOT NULL,
  `idusr` decimal(10,0) NOT NULL,
  `stsprodusr` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `prod_usr`
--

INSERT INTO `prod_usr` (`idprod`, `cod_producto`, `idusr`, `stsprodusr`) VALUES
('1', '01', '1', 'ACT'),
('2', '01', '2', 'ACT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `cod_rol` varchar(10) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`cod_rol`, `descripcion`) VALUES
('00', 'Administrador'),
('01', 'Moderador'),
('02', 'Paciente'),
('03', 'Doctor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusr` decimal(10,0) NOT NULL,
  `cod_rol` varchar(10) COLLATE utf8_bin NOT NULL,
  `cod_compania` varchar(10) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(255) COLLATE utf8_bin NOT NULL,
  `correo` varchar(255) COLLATE utf8_bin NOT NULL,
  `cedula` decimal(10,0) NOT NULL,
  `contrasena` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusr`, `cod_rol`, `cod_compania`, `nombre`, `correo`, `cedula`, `contrasena`) VALUES
('1', '03', '01', 'Lily la doctora', 'ladoctora@gmail.com', '15135925', '123456789'),
('2', '02', '01', 'Andrew Duran', 'azure_04@hotmail.com', '20127909', '$2y$04$DyYZT/YrHjDyrEHHxUTSCu.tQfAqFYYURH41/4H.DHBLR6tue4OXW');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_producto`
--

CREATE TABLE `usuarios_producto` (
  `iduserp` decimal(10,0) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_bin NOT NULL,
  `cedula` decimal(10,0) NOT NULL,
  `cod_producto` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios_producto`
--

INSERT INTO `usuarios_producto` (`iduserp`, `nombre`, `cedula`, `cod_producto`) VALUES
('1', 'Don Julian', '20127909', '01'),
('2', 'Maria la bonita', '19872332', '01'),
('3', 'Lily la doctora', '15135925', '01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videollamadas`
--

CREATE TABLE `videollamadas` (
  `idllamada` decimal(10,0) NOT NULL,
  `idoper` decimal(10,0) NOT NULL,
  `fecha_llamada` date NOT NULL,
  `idsesion` varchar(255) COLLATE utf8_bin NOT NULL,
  `token` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `companias`
--
ALTER TABLE `companias`
  ADD PRIMARY KEY (`cod_compania`);

--
-- Indices de la tabla `conversaciones`
--
ALTER TABLE `conversaciones`
  ADD PRIMARY KEY (`idconv`),
  ADD KEY `historial_medico_conversacion_fk` (`idoper`);

--
-- Indices de la tabla `historial_operaciones`
--
ALTER TABLE `historial_operaciones`
  ADD PRIMARY KEY (`idoper`),
  ADD KEY `tipo_operacion_historial_medico_fk` (`cod_operacion`),
  ADD KEY `usuario_historial_medico_fk` (`idusr`),
  ADD KEY `medicos_historial_medico_fk` (`idmedi`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`idmedi`),
  ADD KEY `usuario_medicos_fk` (`idusr`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`idsms`),
  ADD KEY `conversacion_mensajes_fk` (`idconv`);

--
-- Indices de la tabla `operaciones`
--
ALTER TABLE `operaciones`
  ADD PRIMARY KEY (`cod_operacion`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`cod_producto`);

--
-- Indices de la tabla `prod_usr`
--
ALTER TABLE `prod_usr`
  ADD PRIMARY KEY (`idprod`),
  ADD KEY `producto_prod_usr_fk` (`cod_producto`),
  ADD KEY `usuario_prod_usr_fk` (`idusr`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`cod_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusr`),
  ADD KEY `roles_usuario_fk` (`cod_rol`),
  ADD KEY `tipo_companias_usuario_fk` (`cod_compania`);

--
-- Indices de la tabla `usuarios_producto`
--
ALTER TABLE `usuarios_producto`
  ADD PRIMARY KEY (`iduserp`);

--
-- Indices de la tabla `videollamadas`
--
ALTER TABLE `videollamadas`
  ADD PRIMARY KEY (`idllamada`),
  ADD KEY `historial_medico_videollamada_fk` (`idoper`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `conversaciones`
--
ALTER TABLE `conversaciones`
  ADD CONSTRAINT `historial_medico_conversacion_fk` FOREIGN KEY (`idoper`) REFERENCES `historial_operaciones` (`idoper`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `historial_operaciones`
--
ALTER TABLE `historial_operaciones`
  ADD CONSTRAINT `medicos_historial_medico_fk` FOREIGN KEY (`idmedi`) REFERENCES `medicos` (`idmedi`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tipo_operacion_historial_medico_fk` FOREIGN KEY (`cod_operacion`) REFERENCES `operaciones` (`cod_operacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuario_historial_medico_fk` FOREIGN KEY (`idusr`) REFERENCES `usuarios` (`idusr`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD CONSTRAINT `usuario_medicos_fk` FOREIGN KEY (`idusr`) REFERENCES `usuarios` (`idusr`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `conversacion_mensajes_fk` FOREIGN KEY (`idconv`) REFERENCES `conversaciones` (`idconv`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `prod_usr`
--
ALTER TABLE `prod_usr`
  ADD CONSTRAINT `producto_prod_usr_fk` FOREIGN KEY (`cod_producto`) REFERENCES `productos` (`cod_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuario_prod_usr_fk` FOREIGN KEY (`idusr`) REFERENCES `usuarios` (`idusr`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `roles_usuario_fk` FOREIGN KEY (`cod_rol`) REFERENCES `roles` (`cod_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tipo_companias_usuario_fk` FOREIGN KEY (`cod_compania`) REFERENCES `companias` (`cod_compania`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `videollamadas`
--
ALTER TABLE `videollamadas`
  ADD CONSTRAINT `historial_medico_videollamada_fk` FOREIGN KEY (`idoper`) REFERENCES `historial_operaciones` (`idoper`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
