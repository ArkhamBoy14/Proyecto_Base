-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-05-2019 a las 19:16:49
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4
create database base; 
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `base`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boda`
--

CREATE TABLE `boda` (
  `idboda` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `presupuesto` double DEFAULT NULL,
  `idcliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `body` text COLLATE utf8_spanish_ci NOT NULL,
  `url` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `class` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'event-important',
  `start` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `end` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `inicio_normal` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `final_normal` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitados`
--

CREATE TABLE `invitados` (
  `idinvitados` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `asitensia` varchar(1) DEFAULT NULL,
  `invitacion` varchar(1) DEFAULT NULL,
  `nota` varchar(1) DEFAULT NULL,
  `idcliente` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `invitados`
--

INSERT INTO `invitados` (`idinvitados`, `nombre`, `telefono`, `correo`, `asitensia`, `invitacion`, `nota`, `idcliente`) VALUES
(6, 'isarel gomez', '0484983902390', 'kfkrsdsk@gmail.com', NULL, NULL, NULL, '3'),
(7, 'doris maria del camen', '48293898493', 'correo@dominio.com', NULL, NULL, NULL, '3'),
(8, 'del carmen gomez dario', '40902029309', 'sfsuiufi@gmail.com', NULL, NULL, NULL, '3'),
(9, 'jose peralta', '42930923090', 'kvuriuviru@fakjd.com', NULL, NULL, NULL, '3'),
(10, 'selene perez gomez', '093094039403', 'vnjviruji@kjdwsd.com', NULL, NULL, NULL, '6'),
(11, 'manuel enrique', '94829892839', 'correo@ksdjsdj.com', NULL, NULL, NULL, '3'),
(13, 'manuel ', '9933080317', 'mono@gmail.com', NULL, NULL, NULL, '17'),
(14, 'erick samuel ', '48220039', 'sjfvksfk@fkjvkjd.com', NULL, NULL, NULL, '3'),
(15, 'fwwoiefo', '4920930239', 'kvll@srjkjr.com', NULL, NULL, NULL, '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquete`
--

CREATE TABLE `paquete` (
  `idpaquete` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `costo` varchar(45) DEFAULT NULL,
  `caracteristicas` varchar(200) DEFAULT NULL,
  `idagente` int(11) DEFAULT NULL,
  `idcliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paquete`
--

INSERT INTO `paquete` (`idpaquete`, `nombre`, `costo`, `caracteristicas`, `idagente`, `idcliente`) VALUES
(9, 'economico', '10000', 'de todo un poco', 18, NULL),
(10, 'economico', '10000', 'muchas cosas', 2, NULL),
(11, 'gold ', '10000', 'muchas cosas y otro poco', 2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `pass` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `nombre_tu` varchar(50) DEFAULT NULL,
  `apm_tu` varchar(50) DEFAULT NULL,
  `app_tu` varchar(50) DEFAULT NULL,
  `dir` varchar(200) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `sexo` varchar(50) DEFAULT NULL,
  `creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `telefono`, `correo`, `pass`, `tipo`, `nombre_tu`, `apm_tu`, `app_tu`, `dir`, `fecha`, `sexo`, `creacion`) VALUES
(1, 'manuel enrique', 'uco ble', '9933080317', 'mhanuelxd.03@gmail.com', 'bjmpw504', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00'),
(2, 'alejandro', 'salvador real', '8328742939', 'mono@gmail.com', 'monito', 'agente', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00'),
(3, 'erick samuel', 'garcia ramoz', '3892839823992', 'erick@gmail.com', 'erick', 'cliente', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00'),
(5, 'jovita', 'jimenez', '42983203909', 'jovita@correo.com', '12345', 'agente', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00'),
(6, 'nombre', 'apellido', '324982390', 'nombre@correo.com', '12345', 'cliente', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00'),
(7, 'manuel ', 'BLE', '9284984982', 'mfskjfk@gdkaj.com', 'nomelase', 'cliente', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00'),
(8, 'administrador', 'admin', '9933080317', 'admin@admin.com', 'nomelase', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00'),
(17, 'Paola', 'ARRELLANO', '9331544705', 'paoladata@gmail.com', 'paola', 'cliente', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00'),
(18, 'manuell', 'uco', '49839823989', 'manuel@gmail.com', 'nomelase', 'agente', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00'),
(19, 'manuel ', 'uco', '48298392398839', 'CO@D1.COM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00'),
(20, 'erick samuel', 'samuel', '4823989283', 'vnjviruji@kjdwsd.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00'),
(21, 'nombre cualquiera', 'cual sea', '9834989589282', 'new@correo.com', 'nomelase', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00'),
(22, 'klfja;kvaeifkp', 'lsfnkv;lek;o', '049204909402', 'sdmvsldmvl@kdjk.com', 'ljsoipweofpw', 'agente', 'florencia', 'uco', 'romero', ',fmvaskfv\'akvnaova;ov,s;lk', '1996-12-03', NULL, '0000-00-00'),
(23, 'manuel enrique', 'uco ble', '9933080317', 'correo@gmail.com', 'bjmpw504', 'agente', 'florencio', 'uco', 'romero', 'calle 20 de noviembre', '1996-12-03', NULL, '0000-00-00'),
(24, 'nuevo', 'fsjfkjks', '3589384938405', 'correo@gmail.com', 'lkrglektltr', 'agente', 'jhjh', 'khihik', 'kjhkj', 'kjrksjtkj', '2019-05-19', NULL, '0000-00-00'),
(15301035, 'manu', 'uco', '9284982498249', 'correddddo@gmail.com', 'bjmpw504', 'cliente', 'florencio', 'romero', 'uco', 'ble', '0000-00-00', '2019-05-21', '2019-05-09'),
(87989898, 'manuel', 'uco ble', '4898493849', 'correo@gmail.com', '', 'agente', 'florencio', 'romero', 'uco', 'ksjdfkwurajdkf', '2019-05-18', NULL, '2019-05-09'),
(1530103534, 'manuel', 'uco', '9341189980', 'mhanuelxd.03@gmail.com', 'bjmpw504', 'agente', 'florencio uco romero', 'romero', 'uco', 'calle 20 de noviembre', '2019-05-26', 'Hombre', '2019-05-09');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boda`
--
ALTER TABLE `boda`
  ADD PRIMARY KEY (`idboda`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `invitados`
--
ALTER TABLE `invitados`
  ADD PRIMARY KEY (`idinvitados`);

--
-- Indices de la tabla `paquete`
--
ALTER TABLE `paquete`
  ADD PRIMARY KEY (`idpaquete`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `boda`
--
ALTER TABLE `boda`
  MODIFY `idboda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `invitados`
--
ALTER TABLE `invitados`
  MODIFY `idinvitados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `paquete`
--
ALTER TABLE `paquete`
  MODIFY `idpaquete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1530103535;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
