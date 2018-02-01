-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2017 a las 14:53:14
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `FOTO` varchar(50) NOT NULL,
  `DESCRIPCION` varchar(200) DEFAULT NULL,
  `PRECIO` decimal(11,2) NOT NULL,
  `STOCK` int(11) NOT NULL,
  `IDSUBFAMILIA` int(11) NOT NULL,
  `IDLINEA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`ID`, `NOMBRE`, `FOTO`, `DESCRIPCION`, `PRECIO`, `STOCK`, `IDSUBFAMILIA`, `IDLINEA`) VALUES
(1, 'Objeto', '1.png', 'dadsafdgs', '0.09', 10, 3, 1),
(2, 'Gato', '2.jpg', 'Un lindo gatito', '1000.04', 5, 14, 1),
(3, 'EstaciÃ³n de Santa Justa', '3.jpg', 'Maravilla arquitectÃ³nica', '0.06', 7, 11, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `ID` int(11) NOT NULL,
  `FECHA` date NOT NULL,
  `IDUSUARIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`ID`, `FECHA`, `IDUSUARIO`) VALUES
(1, '2017-12-07', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familia`
--

CREATE TABLE `familia` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(30) NOT NULL,
  `DESCRIPCION` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `familia`
--

INSERT INTO `familia` (`ID`, `NOMBRE`, `DESCRIPCION`) VALUES
(1, 'Naturaleza', 'Fotos tomadas en plena naturaleza'),
(2, 'Urbano', 'Fotos de tipo urbano'),
(3, 'Personas', 'Fotos de personas'),
(4, 'Arquitectura', 'Diferentes tipos de arquitectura'),
(5, 'Animales', 'Fotos de animales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas`
--

CREATE TABLE `lineas` (
  `ID` int(11) NOT NULL,
  `PRECIO` int(20) NOT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `IDFACTURA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lineas`
--

INSERT INTO `lineas` (`ID`, `PRECIO`, `CANTIDAD`, `IDFACTURA`) VALUES
(1, 30, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subfamilia`
--

CREATE TABLE `subfamilia` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(30) NOT NULL,
  `DESCRIPCION` varchar(200) DEFAULT NULL,
  `IDFAMILIA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subfamilia`
--

INSERT INTO `subfamilia` (`ID`, `NOMBRE`, `DESCRIPCION`, `IDFAMILIA`) VALUES
(2, 'Amanecer/Atardecer', 'Tomas en esos momentos espirituales del dÃ­a', 1),
(3, 'Playa', 'Fotos de las costas', 1),
(4, 'VegetaciÃ³n', 'Formaciones vegetales interesantes', 1),
(5, 'Calle', '', 2),
(6, 'Edificios', 'Fotos de edificios', 2),
(7, 'Paisaje urbano', 'Fotos de ciudades o formaciones urbanas', 2),
(8, 'Retrato', 'Fotos retratrando a personas', 3),
(9, 'Otro', 'Otro tipo de fotos a personas', 3),
(10, 'Monumentos', 'Construcciones arquitectÃ³nicas merecedoras de reconocimiento', 4),
(11, 'Arquitectura moderna', 'Arquitectura de estilo moderno', 4),
(12, 'Construcciones antiguas', 'Yacimientos o construcciones del pasado', 4),
(13, 'Salvajes', 'Animales salvajes', 5),
(14, 'Mascotas', 'Fotos de mascotas', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL,
  `USUARIO` varchar(20) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `APELLIDOS` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PASSWORD` varchar(300) NOT NULL,
  `DIRECCION` varchar(100) NOT NULL,
  `PROVINCIA` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID`, `USUARIO`, `NOMBRE`, `APELLIDOS`, `EMAIL`, `PASSWORD`, `DIRECCION`, `PROVINCIA`) VALUES
(1, 'ismenc', 'Ismael', 'apellidoo', 'emailll', 'una', 'direccionnn', 'provinciaaa');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Fk_subfamilia` (`IDSUBFAMILIA`),
  ADD KEY `Fk_linea` (`IDLINEA`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Fk_usuario` (`IDUSUARIO`);

--
-- Indices de la tabla `familia`
--
ALTER TABLE `familia`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `lineas`
--
ALTER TABLE `lineas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Fk_facturas` (`IDFACTURA`);

--
-- Indices de la tabla `subfamilia`
--
ALTER TABLE `subfamilia`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Fk_idfamilia` (`IDFAMILIA`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `familia`
--
ALTER TABLE `familia`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `lineas`
--
ALTER TABLE `lineas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `subfamilia`
--
ALTER TABLE `subfamilia`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `Fk_linea` FOREIGN KEY (`IDLINEA`) REFERENCES `lineas` (`ID`),
  ADD CONSTRAINT `Fk_subfamilia` FOREIGN KEY (`IDSUBFAMILIA`) REFERENCES `subfamilia` (`ID`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `Fk_usuario` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuario` (`ID`);

--
-- Filtros para la tabla `lineas`
--
ALTER TABLE `lineas`
  ADD CONSTRAINT `Fk_facturas` FOREIGN KEY (`IDFACTURA`) REFERENCES `factura` (`ID`);

--
-- Filtros para la tabla `subfamilia`
--
ALTER TABLE `subfamilia`
  ADD CONSTRAINT `Fk_idfamilia` FOREIGN KEY (`IDFAMILIA`) REFERENCES `familia` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
