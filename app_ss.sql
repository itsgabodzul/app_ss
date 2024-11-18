-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2024 a las 01:27:30
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `app_ss`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(5) NOT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `matricula` varchar(9) DEFAULT NULL,
  `carrera` varchar(255) NOT NULL,
  `sexo` varchar(255) NOT NULL,
  `ingreso` int(3) NOT NULL,
  `rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombres`, `apellidos`, `email`, `contrasena`, `matricula`, `carrera`, `sexo`, `ingreso`, `rol`) VALUES
(1, 'Todos', NULL, NULL, NULL, NULL, '', '', 0, ''),
(8, 'Jonathan', 'Heredia Cardenas', 'LE20080123@merida.tecnm.mx', '$2y$10$7H4BHxdv65hSh.JlN27hKumO6LAKus4qJpJUgQ5sxYBct0AhDVfFy', 'E20080123', 'Ingenieria en Sistemas Computacionales', 'masculino', 9, 'estudiante'),
(9, 'Juan', 'Carrillo Torres', 'LE20080895@merida.tecnm.mx', '$2y$10$pvVLLZJ4DtCQ9Z3mkH7q1uCwZ2aos0hJ1QLofUxcEJV6gYtfYJLIG', 'E20080895', 'Ing Ambiental', 'masculino', 9, 'estudiante'),
(10, 'Aldo', 'Espadas', 'LE20080485@merida.tecnm.mx', '$2y$10$5ha6A3zDW6TX10cBUeXOFef/cJ6SbAAffSD.JX4L3s7RfJi6/HObG', 'E80200485', 'Ingenieria en Sistemas Computacionales', 'masculino', 11, 'estudiante'),
(11, 'prueba todos', 'aasas', 'LE20080895@merida.tecnm.mx', '$2y$10$1HtyLQgZxZidLSXXEIZKbOdK8/5a2/Hip4iy4S6Oc2cwail4OqPji', 'E20080927', 'Ing Ambiental', 'masculino', 11, 'estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `id_asistencia` int(5) NOT NULL,
  `alumno` int(5) NOT NULL,
  `fecha` varchar(255) DEFAULT NULL,
  `hora_inicio` varchar(255) DEFAULT NULL,
  `hora_fin` varchar(255) DEFAULT NULL,
  `acumuldas` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asistencias`
--

INSERT INTO `asistencias` (`id_asistencia`, `alumno`, `fecha`, `hora_inicio`, `hora_fin`, `acumuldas`) VALUES
(1, 8, ' 11-noviembre-2024', ' 21:21', '21:42', 0.35),
(2, 8, ' 11-noviembre-2024', ' 21:49', '21:59', 0.1667),
(3, 8, ' 12-noviembre-2024', ' 14:14', '14:14', 0.0167),
(4, 8, ' 12-noviembre-2024', ' 15:51', '15:52', 0.0167),
(5, 8, ' 17-noviembre-2024', ' 15:29', '15:33', 0.0666667),
(6, 8, ' 17-noviembre-2024', ' 16:01', '16:02', 0.0166667),
(7, 8, ' 17-noviembre-2024', ' 16:02', '16:07', 0.0833333),
(8, 8, ' 17-noviembre-2024', ' 17:40', '18:00', 0.333333),
(9, 8, '17-noviembre-2024', '18:20', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aulas`
--

CREATE TABLE `aulas` (
  `id_aula` int(5) NOT NULL,
  `aula` varchar(5) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `clima` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aulas`
--

INSERT INTO `aulas` (`id_aula`, `aula`, `tipo`, `estado`, `clima`) VALUES
(1, 'H1', 'Laboratorio', 'abierto', NULL),
(2, 'H2', 'Laboratorio', 'cerrado', NULL),
(3, 'H3', 'Salon', 'abierto', NULL),
(4, 'H4', 'Salon', 'abierto', NULL),
(5, 'H5', 'Salon', 'abierto', NULL),
(6, 'H6', 'Salon', 'cerrado', NULL),
(7, 'H7', 'Laboratotrio', 'abierto', NULL),
(8, 'H8', 'Laboratorio', 'cerrado', NULL),
(9, 'H9', 'Salon', 'abierto', NULL),
(10, 'H10', 'Salon', 'cerrado', NULL),
(11, 'H11', 'Salon', 'cerrado', NULL),
(12, 'H12', 'Salon', 'abierto', NULL),
(13, 'G1', 'Salon', 'cerrado', NULL),
(14, 'G2', 'Salon', 'cerrado', NULL),
(15, 'G3', 'Salon', 'cerrado', NULL),
(16, 'G4', 'Laboratotrio', 'cerrado', NULL),
(17, 'G5', 'Salon', 'cerrado', NULL),
(18, 'G6', 'Salon', 'cerrado', NULL),
(19, 'G7', 'Salon', 'cerrado', NULL),
(20, 'G8', 'Laboratotrio', 'cerrado', NULL),
(21, 'LCOM3', 'Laboratotrio', 'cerrado', NULL),
(22, 'LCOM4', 'Laboratorio', 'abierto', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id_docente` int(5) NOT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `jefatura` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id_docente`, `nombres`, `apellidos`, `jefatura`) VALUES
(1, 'Juan Manuel', 'Camacho Perez', 'N/A'),
(4, 'Enrique', 'Camacho Perez', 'N/A'),
(5, 'Pedro', 'Rodriguez', 'Tutorias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jueves`
--

CREATE TABLE `jueves` (
  `id` int(5) NOT NULL,
  `aula` int(5) DEFAULT NULL,
  `maestro` int(5) DEFAULT NULL,
  `clima` varchar(255) DEFAULT NULL,
  `hora` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lunes`
--

CREATE TABLE `lunes` (
  `id` int(5) NOT NULL,
  `aula` int(5) DEFAULT NULL,
  `maestro` int(5) DEFAULT NULL,
  `clima` varchar(255) DEFAULT NULL,
  `hora` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lunes`
--

INSERT INTO `lunes` (`id`, `aula`, `maestro`, `clima`, `hora`) VALUES
(2, 2, 4, 'Apagado', 14),
(3, 2, 4, 'Apagado', 15),
(4, 10, 5, 'Apagado', 13),
(5, 10, 5, 'Apagado', 14),
(6, 10, 5, 'Apagado', 14),
(7, 5, 1, 'Apagado', 16),
(8, 5, 1, 'Apagado', 17),
(9, 5, 1, 'Apagado', 18),
(10, 14, 5, 'Encendido', 19),
(11, 14, 5, 'Encendido', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `martes`
--

CREATE TABLE `martes` (
  `id` int(5) NOT NULL,
  `aula` int(5) DEFAULT NULL,
  `maestro` int(5) DEFAULT NULL,
  `clima` varchar(255) DEFAULT NULL,
  `hora` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `martes`
--

INSERT INTO `martes` (`id`, `aula`, `maestro`, `clima`, `hora`) VALUES
(1, 1, 5, 'Encendido', 7),
(2, 1, 5, 'Encendido', 8),
(3, 5, 1, '', 15),
(4, 6, 1, '', 12),
(5, 6, 1, '', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miercoles`
--

CREATE TABLE `miercoles` (
  `id` int(5) NOT NULL,
  `aula` int(5) DEFAULT NULL,
  `maestro` int(5) DEFAULT NULL,
  `clima` varchar(255) DEFAULT NULL,
  `hora` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id_tarea` int(5) NOT NULL,
  `nombre_tarea` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `usuario` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id_tarea`, `nombre_tarea`, `descripcion`, `estado`, `usuario`) VALUES
(6, 'PruebaNuevo', 'asdasdad', 'Activa', 9),
(7, 'Traer comida', 'Ir a comprar en la caferteria la comida de la maestra', 'Activa', 8),
(10, 'Reparar Xampp', 'Reparar el instaldor del xampp', 'Activa', 9),
(16, 'Todos', 'asdfsbgnhas', 'Activa', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(5) NOT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `matricula` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `email`, `contrasena`, `matricula`) VALUES
(1, 'Admin', 'Root', 'admin@root', '$2y$10$NwF5Ns2ivNJtX/AARvCMFuUDuhrVwLtpHvGnu4Z/YP97fwI/15Gd2', '001'),
(2, 'Raul', 'Perez', 'raul@gmail.com', '$2y$10$8YhBGl.TnR0glP1xZKq5uutbaHzO7yR6.hRHOyAq3ynsM4JLwAu8G', '002'),
(4, 'Pedro', 'Rodriguez', 'pedro@rd.com', '$2y$10$e/8q3AsAwTShLnK.wskCPu7n3VsNwOKn/T4puAgCB/uEKb6gq9EvW', '003');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viernes`
--

CREATE TABLE `viernes` (
  `id` int(5) NOT NULL,
  `aula` int(5) DEFAULT NULL,
  `maestro` int(5) DEFAULT NULL,
  `clima` varchar(255) DEFAULT NULL,
  `hora` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`id_asistencia`),
  ADD KEY `asistencia-alumno` (`alumno`);

--
-- Indices de la tabla `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id_aula`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id_docente`);

--
-- Indices de la tabla `jueves`
--
ALTER TABLE `jueves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jueves-aula` (`aula`),
  ADD KEY `jueves-maestro` (`maestro`);

--
-- Indices de la tabla `lunes`
--
ALTER TABLE `lunes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lunes-aula` (`aula`),
  ADD KEY `lunes-maestro` (`maestro`);

--
-- Indices de la tabla `martes`
--
ALTER TABLE `martes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `martes-aula` (`aula`),
  ADD KEY `martes-maestro` (`maestro`);

--
-- Indices de la tabla `miercoles`
--
ALTER TABLE `miercoles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `miercoles-aula` (`aula`),
  ADD KEY `miercoles-maestro` (`maestro`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id_tarea`),
  ADD KEY `tareas_alumnos` (`usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `viernes`
--
ALTER TABLE `viernes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `viernes-aula` (`aula`),
  ADD KEY `viernes-maestro` (`maestro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `id_asistencia` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id_aula` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id_docente` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `jueves`
--
ALTER TABLE `jueves`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lunes`
--
ALTER TABLE `lunes`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `martes`
--
ALTER TABLE `martes`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `miercoles`
--
ALTER TABLE `miercoles`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id_tarea` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `viernes`
--
ALTER TABLE `viernes`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD CONSTRAINT `asistencia-alumno` FOREIGN KEY (`alumno`) REFERENCES `alumnos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `jueves`
--
ALTER TABLE `jueves`
  ADD CONSTRAINT `jueves-aula` FOREIGN KEY (`aula`) REFERENCES `aulas` (`id_aula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jueves-maestro` FOREIGN KEY (`maestro`) REFERENCES `docentes` (`id_docente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `lunes`
--
ALTER TABLE `lunes`
  ADD CONSTRAINT `lunes-aula` FOREIGN KEY (`aula`) REFERENCES `aulas` (`id_aula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lunes-maestro` FOREIGN KEY (`maestro`) REFERENCES `docentes` (`id_docente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `martes`
--
ALTER TABLE `martes`
  ADD CONSTRAINT `martes-aula` FOREIGN KEY (`aula`) REFERENCES `aulas` (`id_aula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `martes-maestro` FOREIGN KEY (`maestro`) REFERENCES `docentes` (`id_docente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `miercoles`
--
ALTER TABLE `miercoles`
  ADD CONSTRAINT `miercoles-aula` FOREIGN KEY (`aula`) REFERENCES `aulas` (`id_aula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `miercoles-maestro` FOREIGN KEY (`maestro`) REFERENCES `docentes` (`id_docente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD CONSTRAINT `tareas_alumnos` FOREIGN KEY (`usuario`) REFERENCES `alumnos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `viernes`
--
ALTER TABLE `viernes`
  ADD CONSTRAINT `viernes-aula` FOREIGN KEY (`aula`) REFERENCES `aulas` (`id_aula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `viernes-maestro` FOREIGN KEY (`maestro`) REFERENCES `docentes` (`id_docente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
