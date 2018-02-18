-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-02-2018 a las 23:17:36
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.2.0

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
  `IDSUBFAMILIA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`ID`, `NOMBRE`, `FOTO`, `DESCRIPCION`, `PRECIO`, `STOCK`, `IDSUBFAMILIA`) VALUES
(1, 'Obturador', '1.png', 'dadsafdgs', '0.09', 3, 3),
(2, 'Gato', '2.jpg', 'Un lindo gatito', '1000.04', 5, 14),
(3, 'EstaciÃ³n de Santa Justa', '3.jpg', 'Maravilla arquitectÃ³nica', '0.06', 20, 6),
(4, 'Luna', '4.jpg', 'Luna ocultÃ¡ndose tras las ramas de un aromÃ¡tico pino', '8.25', 23, 12),
(5, 'Abubilla', '5.jpg', 'Abubilla salvaje', '4.50', 25, 13),
(6, 'LibÃ©lula', '6.jpg', 'LibÃ©lula en un paisaje desÃ©rtico', '14.99', 35, 13),
(7, 'Madera', '7.jpg', 'Textura de la madera', '8.00', 50, 9),
(8, 'Ave', '8.jpg', 'Ave de Madrid', '25.00', 15, 7),
(9, 'Resplandor de atardecer', '9.jpg', 'Sol ocultÃ¡ndose tras las casas', '0.55', 10, 2),
(10, 'Perro triste', '10.jpg', 'Mi perro estÃ¡ triste porque no estÃ¡n sus otros amos', '20.99', 26, 14),
(11, 'Naranja solitaria', '11.jpg', 'Naranja emprendiendo su camino', '10.00', 15, 9),
(12, 'Superando obstÃ¡culos', '12.jpg', 'Usando los medios que nos ofrece el entorno para superar un obstÃ¡culo', '30.36', 100, 12),
(13, 'En manos del destino', '13.jpeg', 'Dejando nuestro destino a la suerte', '25.00', 55, 9),
(14, 'Flow', '14.jpg', 'RepresentaciÃ³n de la el objetivo Ãºltimo', '18.00', 37, 9);

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
(18, '2018-02-18', 2);

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
  `PRECIO` decimal(11,2) NOT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `IDFACTURA` int(11) NOT NULL,
  `IDARTICULO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lineas`
--

INSERT INTO `lineas` (`ID`, `PRECIO`, `CANTIDAD`, `IDFACTURA`, `IDARTICULO`) VALUES
(16, '0.06', 5, 18, 3),
(17, '0.09', 4, 18, 1),
(18, '18.00', 5, 18, 14),
(19, '25.00', 5, 18, 8),
(20, '14.99', 2, 18, 6);

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
(12, 'Paisajes especiales', 'Paisajes en condiciones extraordinarias y nocturnos', 1),
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
  `PROVINCIA` varchar(50) NOT NULL,
  `ADMIN` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID`, `USUARIO`, `NOMBRE`, `APELLIDOS`, `EMAIL`, `PASSWORD`, `DIRECCION`, `PROVINCIA`, `ADMIN`) VALUES
(1, 'admin', 'Pepe', 'García', 'no-reply@example.com', '$2y$10$XzA3j1rv4pov.oH4QsdGnOUMJR5.6GJxqZbJ1ZlS2iq.j2sMgWkXO', 'C/ Dirección 55', 'Mi provincia', 1),
(2, 'usuario', 'Agapito', 'Empalagoso', 'no-reply@example.com', '$2y$10$XzA3j1rv4pov.oH4QsdGnOUMJR5.6GJxqZbJ1ZlS2iq.j2sMgWkXO', 'C/ Mi direccion, 12', 'Sevillo', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Fk_subfamilia` (`IDSUBFAMILIA`);

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
  ADD KEY `Fk_facturas` (`IDFACTURA`),
  ADD KEY `fk_idarticulo` (`IDARTICULO`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `familia`
--
ALTER TABLE `familia`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `lineas`
--
ALTER TABLE `lineas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `subfamilia`
--
ALTER TABLE `subfamilia`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
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
  ADD CONSTRAINT `Fk_facturas` FOREIGN KEY (`IDFACTURA`) REFERENCES `factura` (`ID`),
  ADD CONSTRAINT `fk_idarticulo` FOREIGN KEY (`IDARTICULO`) REFERENCES `articulos` (`ID`);

--
-- Filtros para la tabla `subfamilia`
--
ALTER TABLE `subfamilia`
  ADD CONSTRAINT `Fk_idfamilia` FOREIGN KEY (`IDFAMILIA`) REFERENCES `familia` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
