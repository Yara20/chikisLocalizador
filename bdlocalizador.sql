-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2020 a las 07:23:27
-- Versión del servidor: 8.0.18
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdlocalizador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivo`
--

CREATE TABLE `dispositivo` (
  `idDispositivo` int(11) NOT NULL,
  `imei` varchar(45) NOT NULL,
  `marca` varchar(45) NOT NULL DEFAULT 'Chikis',
  `modelo` varchar(45) NOT NULL COMMENT 'SIM808\nSIM900',
  `precio` float NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 Disponible\n2 Activo\n0 Inactivo',
  `fechaActualizacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `dispositivo`
--

INSERT INTO `dispositivo` (`idDispositivo`, `imei`, `marca`, `modelo`, `precio`, `estado`) VALUES
(1, '865067022657343', 'Chikis', 'SIM808', 100, 1),
(2, '865067022657344', 'Chikis', 'SIM808', 100, 1),
(3, '865067022657345', 'Chikis', 'SIM808', 100, 1),
(4, '865067022657346', 'Chikis', 'SIM808', 100, 1),
(5, '865067022657347', 'Chikis', 'SIM808', 100, 1),
(6, '865067022657348', 'Chikis', 'SIM808', 100, 1),
(7, '865067022657345', 'Chikis', 'SIM808', 100, 1),
(8, '86506702265734555', 'Chikis', 'SIM808', 100, 1),
(9, '86506702265734588', 'Chikis', 'SIM808', 100, 1),
(10, '865067022657345989', 'Chikis', 'SIM808', 100, 1),
(11, '865067022657345111', 'Chikis', 'SIM808', 100, 1),
(12, '8650670226573451111', 'Chikis', 'SIM808', 100, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hijo`
--

CREATE TABLE `hijo` (
  `idHijo` int(11) NOT NULL,
  `nombreHijo` varchar(45) NOT NULL,
  `codigoPais` smallint(6) NOT NULL,
  `celular` int(11) NOT NULL,
  `operadorMovil` varchar(5) NOT NULL COMMENT 'Viva\\nTigo\\nEntel',
  `imei` varchar(45) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 Activo\\n0 Inactivo',
  `fechaActualizacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idUsuario` int(11) NOT NULL,
  `idDispositivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `hijo`
--

INSERT INTO `hijo` (`idHijo`, `nombreHijo`, `codigoPais`, `celular`, `operadorMovil`, `imei`, `estado`, `idUsuario`, `idDispositivo`) VALUES
(1, 'Dafne', 591, 76234562, 'Entel', '865067022657343', 1, 2, 1),
(2, 'Russel', 591, 76523412, 'Entel', '865067022657344', 1, 2, 2),
(3, 'Angeline', 591, 73263742, 'Entel', '865067022657345', 1, 3, 3),
(20, 'Fernanda', 591, 765236562, 'Entel', '865067022657344', 1, 4, 2),
(21, 'Nicole', 591, 72364532, 'Entel', '865067022657345', 1, 4, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localizacion`
--

CREATE TABLE `localizacion` (
  `idLocalizacion` int(11) NOT NULL,
  `latitud` varchar(15) NOT NULL,
  `longitud` varchar(15) NOT NULL,
  `imei` varchar(45) NOT NULL,
  `fechaActualizacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idHijo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `localizacion`
--

INSERT INTO `localizacion` (`idLocalizacion`, `latitud`, `longitud`, `imei`, `idHijo`) VALUES
(1, '-17.7963008', ' -63.2532954', '865067022657343', 1),
(2, '-17.796323', ' -63.2532936', '865067022657343', 1),
(3, '-17.7963092', ' -63.2532911', '865067022657343', 1),
(4, '-17.796353', ' -63.2632954', '865067022657343', 1),
(5, '-17.7963978', ' -63.253124', '865067022657343', 1),
(6, '-17.796390', ' -63.253219', '865067022657343', 1),
(7, '-17.79632455', ' -63.253002', '865067022657343', 1),
(8, '-17.7963008', ' -63.2532954', '865067022657344', 2),
(9, '-17.7963392', ' -63.2532190', '865067022657344', 2),
(10, '-17.7963109', ' -63.2532331', '865067022657344', 2),
(11, '-17.796431', ' -63.2531323', '865067022657345', 3),
(12, '-17.7964987', ' -63.2531367', '865067022657345', 3),
(13, '-17.7963392', ' -63.2532190', '865067022657344', 20),
(14, '-17.7963109', ' -63.2532331', '865067022657344', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` tinyint(4) NOT NULL,
  `tipoRol` varchar(13) NOT NULL COMMENT 'Administrador\\nPadre'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `tipoRol`) VALUES
(1, 'Administrador'),
(2, 'Padre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE `seguimiento` (
  `idSeguimiento` int(11) NOT NULL,
  `fechaInicio` datetime NOT NULL,
  `fechaFin` datetime DEFAULT NULL,
  `idHijo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `seguimiento`
--

INSERT INTO `seguimiento` (`idSeguimiento`, `fechaInicio`, `fechaFin`, `idHijo`) VALUES
(1, '2020-11-27 03:15:54', '2020-11-27 03:20:47', 20),
(2, '2020-11-27 03:24:26', '2020-11-27 03:24:38', 20),
(3, '2020-11-27 03:35:49', '2020-11-27 03:37:24', 21),
(4, '2020-11-27 03:36:19', '2020-11-27 03:36:32', 20),
(5, '2020-11-27 03:38:53', '2020-11-27 03:39:12', 20),
(6, '2020-11-27 03:58:24', '2020-11-27 03:58:30', 3),
(7, '2020-11-16 21:16:46', '2020-11-18 21:16:46', 1),
(8, '2020-11-19 21:16:46', '2020-11-21 21:16:46', 1),
(9, '2020-11-27 05:02:22', '2020-11-27 05:02:27', 20),
(10, '2020-11-27 05:03:11', '2020-11-27 05:06:06', 20),
(11, '2020-11-27 05:07:11', '2020-11-27 05:07:35', 20),
(12, '2020-11-27 05:15:41', '2020-11-27 05:19:14', 20),
(13, '2020-11-27 05:24:47', '2020-11-27 05:24:53', 20),
(14, '2020-11-27 05:25:57', '2020-11-27 05:26:01', 20),
(15, '2020-11-27 05:28:54', '2020-11-27 05:29:11', 21),
(16, '2020-11-27 06:45:06', '2020-11-27 07:08:52', 1),
(17, '2020-11-27 06:53:41', NULL, 20),
(18, '2020-11-27 06:53:56', NULL, 21),
(19, '2020-11-27 07:21:23', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombreCompleto` varchar(100) NOT NULL,
  `ci` varchar(15) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `codigoPais` smallint(6) NOT NULL,
  `celular` int(11) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 activo\n0 inactivo',
  `fechaActualizacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idRol` tinyint(4) NOT NULL DEFAULT '2' COMMENT '1 Adiministrador\n2 Padre'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombreCompleto`, `ci`, `correo`, `codigoPais`, `celular`, `usuario`, `clave`, `estado`, `idRol`) VALUES
(1, 'Yara Alejandra Romero Alcocer', '8826228', 'yara.ale.ok.97@gmail.com', 591, 60397406, 'yara97', '6006605c2cfc6c453e3aac6c9193bd30', 1, 1),
(2, 'Thelma Vanessa Romero Alcocer', '12145231', 'thelma.romero@gmail.com', 591, 67234562, 'thelma', 'dd6351a57967a171c02d2c96bc0b8a60', 1, 2),
(3, 'Brenda Belen Martinez Frontanilla', '4523122', 'belen.martinez@gmail.com', 591, 72536421, 'belen', 'e77d6dbd4480d23799a1ffe8883afdfa', 1, 2),
(4, 'Kevin', '3748347', 'kevin@gmail.com', 591, 76723879, 'kevin', '9d5e3ecdeb4cdb7acfd63075ae046672', 1, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  ADD PRIMARY KEY (`idDispositivo`);

--
-- Indices de la tabla `hijo`
--
ALTER TABLE `hijo`
  ADD PRIMARY KEY (`idHijo`),
  ADD KEY `fk_Dispositivo_Usuario1_idx` (`idUsuario`),
  ADD KEY `fk_hijo_dispositivo1_idx` (`idDispositivo`);

--
-- Indices de la tabla `localizacion`
--
ALTER TABLE `localizacion`
  ADD PRIMARY KEY (`idLocalizacion`),
  ADD KEY `fk_Historial_Dispositivo1_idx` (`idHijo`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD PRIMARY KEY (`idSeguimiento`),
  ADD KEY `fk_Seguimiento_hijo1_idx` (`idHijo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_Usuario_Rol_idx` (`idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  MODIFY `idDispositivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `hijo`
--
ALTER TABLE `hijo`
  MODIFY `idHijo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `localizacion`
--
ALTER TABLE `localizacion`
  MODIFY `idLocalizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  MODIFY `idSeguimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `hijo`
--
ALTER TABLE `hijo`
  ADD CONSTRAINT `fk_Dispositivo_Usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `fk_hijo_dispositivo1` FOREIGN KEY (`idDispositivo`) REFERENCES `dispositivo` (`idDispositivo`);

--
-- Filtros para la tabla `localizacion`
--
ALTER TABLE `localizacion`
  ADD CONSTRAINT `fk_Historial_Dispositivo1` FOREIGN KEY (`idHijo`) REFERENCES `hijo` (`idHijo`);

--
-- Filtros para la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD CONSTRAINT `fk_Seguimiento_hijo1` FOREIGN KEY (`idHijo`) REFERENCES `hijo` (`idHijo`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_Rol` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
