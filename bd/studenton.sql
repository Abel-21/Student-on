-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2018 a las 12:32:38
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `studenton`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `claveM` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `titulo` text COLLATE utf8_spanish_ci NOT NULL,
  `ubicacion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`claveM`, `titulo`, `ubicacion`, `fecha`) VALUES
('B102', 'Ejemplo', 'pdf-sample.pdf', '2018-10-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursando`
--

CREATE TABLE `cursando` (
  `claveC` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `matricula` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cursando`
--

INSERT INTO `cursando` (`claveC`, `matricula`) VALUES
('B102', '201145875'),
('M101', '201145875'),
('M101', '201668479'),
('B102', '201668479');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `clave` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `horario` text COLLATE utf8_spanish_ci NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`clave`, `horario`, `nombre`) VALUES
('B102', '1:00 pm-2pm L-Ma', 'Medicina Bucal'),
('M101', '10:00 am-12:00 pm Lu-Vi', 'Patología');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro`
--

CREATE TABLE `foro` (
  `matricula` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `comentario` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `titulo` text COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `foro`
--

INSERT INTO `foro` (`matricula`, `comentario`, `fecha`, `titulo`, `tipo`) VALUES
('200048751', 'Ya subi las calificaciones del primer parcial, no se les olvide verificarlas. En caso de duda o aclaracion, no duden en contactarme', '2018-10-18', 'Aviso del dia 17/10/2018', 'admin'),
('201145875', 'Muchas gracias por el aviso profe, la ire a ver pronto', '2018-10-18', 'Enterada', 'alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE `materiales` (
  `clave` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `existencia` int(30) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `Estado` text COLLATE utf8_spanish_ci NOT NULL,
  `disponibles` int(30) NOT NULL,
  `prestados` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `materiales`
--

INSERT INTO `materiales` (`clave`, `existencia`, `nombre`, `Estado`, `disponibles`, `prestados`) VALUES
('101', 10, 'Microscopio', 'En perfectas condiciones', 8, 2),
('222', 8, 'Moldes de Inclusion', 'Perfectas condiciones', 8, 0),
('301', 15, 'Dispensador de Purafina', 'Con pequenos detalles', 15, 0),
('351', 20, 'Cuchilla desechable', 'Nuevo', 20, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paselista`
--

CREATE TABLE `paselista` (
  `matricula` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `pase` int(2) NOT NULL,
  `claveC` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `paselista`
--

INSERT INTO `paselista` (`matricula`, `fecha`, `pase`, `claveC`) VALUES
('201145875', '2018-10-18', 2, 'B102'),
('201668479', '2018-10-18', 2, 'B102'),
('201145875', '2018-10-18', 2, 'M101');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `claveM` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `matricula` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fechaI` date NOT NULL,
  `fechaF` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`claveM`, `cantidad`, `matricula`, `fechaI`, `fechaF`) VALUES
('101', 2, '201145875', '2018-10-18', '2018-10-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `email` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` text COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` text COLLATE utf8_spanish_ci NOT NULL,
  `matricula` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `contra` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `cursos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`email`, `nombres`, `apellidos`, `matricula`, `contra`, `cursos`, `tipo`) VALUES
('admin@email.com', 'Dra. Samantha', 'Rivera Macias', '200048751', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '', 'admin'),
('ilzei@gmail.com', 'sarai', 'asdfaf', '201145875', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'B102,M101', 'alumno'),
('ilze.sarai@gmail.com', 'Ilse Sarai', 'Lopez Lopez', '201668479', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'M101,B102', 'alumno');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cursando`
--
ALTER TABLE `cursando`
  ADD KEY `claveC` (`claveC`),
  ADD KEY `matricula` (`matricula`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`clave`);

--
-- Indices de la tabla `foro`
--
ALTER TABLE `foro`
  ADD KEY `matricula` (`matricula`);

--
-- Indices de la tabla `materiales`
--
ALTER TABLE `materiales`
  ADD PRIMARY KEY (`clave`);

--
-- Indices de la tabla `paselista`
--
ALTER TABLE `paselista`
  ADD KEY `claveC` (`claveC`),
  ADD KEY `matricula` (`matricula`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD KEY `claveM` (`claveM`),
  ADD KEY `matricula` (`matricula`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`matricula`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cursando`
--
ALTER TABLE `cursando`
  ADD CONSTRAINT `cursando_ibfk_2` FOREIGN KEY (`claveC`) REFERENCES `cursos` (`clave`),
  ADD CONSTRAINT `cursando_ibfk_3` FOREIGN KEY (`matricula`) REFERENCES `usuarios` (`matricula`);

--
-- Filtros para la tabla `foro`
--
ALTER TABLE `foro`
  ADD CONSTRAINT `foro_ibfk_1` FOREIGN KEY (`matricula`) REFERENCES `usuarios` (`matricula`);

--
-- Filtros para la tabla `paselista`
--
ALTER TABLE `paselista`
  ADD CONSTRAINT `paselista_ibfk_2` FOREIGN KEY (`claveC`) REFERENCES `cursos` (`clave`),
  ADD CONSTRAINT `paselista_ibfk_3` FOREIGN KEY (`matricula`) REFERENCES `usuarios` (`matricula`);

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `prestamos_ibfk_1` FOREIGN KEY (`claveM`) REFERENCES `materiales` (`clave`),
  ADD CONSTRAINT `prestamos_ibfk_2` FOREIGN KEY (`matricula`) REFERENCES `usuarios` (`matricula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
