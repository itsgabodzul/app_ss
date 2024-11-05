-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-09-2024 a las 22:27:57
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `plantilla_dashboard`
--

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
  `fecha_nacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `email`, `contrasena`, `fecha_nacimiento`) VALUES
(1, 'Jesus Gabriel', 'Dzul Gutierrez', 'contacto@gabo.com', '$2y$10$gu2zG1mVZWvU/wCJ3rEa3eP21cP8F3dRIGYZdRpv5wx2gatPCu7Xi', '2002-12-14'),
(2, 'Gabo', 'Dzul', 'admin@admin.com', '$2y$10$mOBvFohxXmlrYQr/oCsVv.GwGQcI4qBAALfOSe9G0vZglPAi5PVhy', '2002-12-22'),
(3, 'Gabo', 'Dzul', 'LE20080928@merida.tecnm.mx', '$2y$10$guWfh72ZjhlPClfJnKpHTOxgcB8IHUT0IlybKaU4aePlEHaBldhlm', '2024-09-02'),
(4, 'Juan', 'Camacho', '1@1.com', '$2y$10$aYiMZwqJKtfmVympzGTsOOR6PX1JEhTmeiWoc7wwI1EID2LYKe1su', '2024-09-03');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
