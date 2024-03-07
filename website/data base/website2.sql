-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2023 a las 16:11:25
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `website`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `AlumnoID` int(11) NOT NULL,
  `UsuarioID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`AlumnoID`, `UsuarioID`) VALUES
(2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `ClaseID` int(11) NOT NULL,
  `NombreClase` varchar(255) NOT NULL,
  `ProfesorID` int(11) DEFAULT NULL,
  `FechaHora` datetime DEFAULT NULL,
  `CupoMaximo` int(11) DEFAULT NULL,
  `Descripcion` text DEFAULT NULL,
  `Precio` decimal(10,2) DEFAULT NULL,
  `Nivel` enum('Principiante','Intermedio','Avanzado') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`ClaseID`, `NombreClase`, `ProfesorID`, `FechaHora`, `CupoMaximo`, `Descripcion`, `Precio`, `Nivel`) VALUES
(11, 'poldance', 0, '0000-00-00 00:00:00', 20, 'buena dance', '1500000.00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `PagoID` int(11) NOT NULL,
  `AlumnoID` int(11) DEFAULT NULL,
  `Monto` decimal(10,2) DEFAULT NULL,
  `FechaPago` datetime DEFAULT NULL,
  `MetodoPago` varchar(50) DEFAULT NULL,
  `ComprobantePago` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`PagoID`, `AlumnoID`, `Monto`, `FechaPago`, `MetodoPago`, `ComprobantePago`) VALUES
(10, 2, '12555555.00', '0000-00-00 00:00:00', 'efectivo', 'listo'),
(20, 2, '12555555.00', '0000-00-00 00:00:00', 'efectivo', 'listo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portafolio`
--

CREATE TABLE `portafolio` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `subtitulo` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `cliente` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `portafolio`
--

INSERT INTO `portafolio` (`id`, `titulo`, `subtitulo`, `imagen`, `descripcion`, `cliente`, `categoria`, `url`) VALUES
(52, 'halo', 'war 2', '', 'mejor juego del año', 'Gamers', 'war', 'http://halowar2.com'),
(53, 'una red social', 'sitio de ventas1111', '', 'tenemos toda clase de ropa', 'develoteca ', 'venta  de software', 'http://tiendadeveloteca.com'),
(55, 'las vegas', 'hacemos sitios web a su gusto', '', 'somos la mas grande en el mundo', 'jovernes', 'urbano', 'http://website');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `ProfesorID` int(11) NOT NULL,
  `UsuarioID` int(11) DEFAULT NULL,
  `Experiencia` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`ProfesorID`, `UsuarioID`, `Experiencia`) VALUES
(1, 0, '2 años');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `ReservaID` int(11) NOT NULL,
  `AlumnoID` int(11) DEFAULT NULL,
  `ClaseID` int(11) DEFAULT NULL,
  `FechaReserva` datetime DEFAULT NULL,
  `Estado` enum('Reservada','Cancelada','Completada') DEFAULT NULL,
  `PagoRealizado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `icono` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `icono`, `titulo`, `descripcion`) VALUES
(1, 'fa-shopping-cart', 'venta de softwarer', 'vendemos todo tipo de software'),
(3, 'fa-laptop', 'soporte y mantenimiento', 'somos la mas grande en el mundo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `UsuarioID` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Apellido` varchar(255) NOT NULL,
  `CorreoElectronico` varchar(255) NOT NULL,
  `Contrasena` varchar(255) NOT NULL,
  `Rol` enum('Alumno','Profesor','Administrador') NOT NULL,
  `FechaNacimiento` date DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `Ciudad` varchar(255) DEFAULT NULL,
  `Pais` varchar(100) DEFAULT NULL,
  `codigopostal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`UsuarioID`, `Nombre`, `Apellido`, `CorreoElectronico`, `Contrasena`, `Rol`, `FechaNacimiento`, `Telefono`, `Direccion`, `Ciudad`, `Pais`, `codigopostal`) VALUES
(0, 'JUAN', 'MONROY', 'DUBAN.@HOTMAIL.COM', '1023017280', '', '0000-00-00', '3133697670', '', '', '', 0),
(2, 'CARLOS', 'JIMENEZ', 'CARLOS@GMAIL.COM', '12345', '', '1996-05-12', '3133697670', 'CALLE76B-BIS#16HSUR', 'BOGOTA', 'COLOMBIA', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`AlumnoID`),
  ADD KEY `UsuarioID` (`UsuarioID`);

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`ClaseID`),
  ADD KEY `ProfesorID` (`ProfesorID`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`PagoID`),
  ADD KEY `AlumnoID` (`AlumnoID`);

--
-- Indices de la tabla `portafolio`
--
ALTER TABLE `portafolio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`ProfesorID`),
  ADD KEY `UsuarioID` (`UsuarioID`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`ReservaID`),
  ADD KEY `AlumnoID` (`AlumnoID`),
  ADD KEY `ClaseID` (`ClaseID`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`UsuarioID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `AlumnoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `ClaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `PagoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `portafolio`
--
ALTER TABLE `portafolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `ProfesorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `ReservaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`UsuarioID`) REFERENCES `usuarios` (`UsuarioID`);

--
-- Filtros para la tabla `clases`
--
ALTER TABLE `clases`
  ADD CONSTRAINT `clases_ibfk_1` FOREIGN KEY (`ProfesorID`) REFERENCES `usuarios` (`UsuarioID`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`AlumnoID`) REFERENCES `alumnos` (`AlumnoID`);

--
-- Filtros para la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD CONSTRAINT `profesores_ibfk_1` FOREIGN KEY (`UsuarioID`) REFERENCES `usuarios` (`UsuarioID`);

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`AlumnoID`) REFERENCES `alumnos` (`AlumnoID`),
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`ClaseID`) REFERENCES `clases` (`ClaseID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
