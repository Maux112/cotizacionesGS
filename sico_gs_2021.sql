-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-04-2021 a las 23:17:04
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sico_gs_2021`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gramaje`
--

CREATE TABLE `gramaje` (
  `idGramaje` int(11) NOT NULL,
  `desGramaje` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `estado_gramaje` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `gramaje`
--

INSERT INTO `gramaje` (`idGramaje`, `desGramaje`, `estado_gramaje`) VALUES
(1, '48.8', 1),
(2, '56', 1),
(3, '60', 1),
(4, '63', 1),
(5, '70', 1),
(6, '75', 1),
(7, '80', 1),
(8, '90', 1),
(9, '115', 1),
(10, '120', 1),
(11, '130', 1),
(12, '150', 1),
(13, '170', 1),
(14, '180', 1),
(15, '200', 1),
(16, '210', 1),
(17, '220', 1),
(18, '230', 1),
(19, '240', 1),
(20, '250', 1),
(21, '280', 1),
(22, '300', 1),
(23, '305', 1),
(24, '335', 1),
(25, '350', 1),
(26, '365', 1),
(27, '395', 1),
(28, '45', 1),
(29, '35.5', 1),
(30, '30', 1),
(31, '20', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `Id_Login` int(11) NOT NULL,
  `Usuario` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Clave` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `RolUsuario_FK` int(11) NOT NULL,
  `Usuario_FK` int(11) DEFAULT NULL,
  `Fecha_Registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `Estado_Login` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`Id_Login`, `Usuario`, `Clave`, `RolUsuario_FK`, `Usuario_FK`, `Fecha_Registro`, `Estado_Login`) VALUES
(1, 'singular', 'singular', 1, NULL, '2021-04-20 14:00:05', 1),
(2, 'mauro', '12345', 2, 1, '2021-04-20 14:00:40', 1),
(3, 'ala', 'ala', 6, 2, '2021-04-20 14:36:57', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `idMarca` int(11) NOT NULL,
  `desMarca` varchar(120) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `estado_marca` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`idMarca`, `desMarca`, `estado_marca`) VALUES
(1, 'OTROS', 1),
(2, 'GOLD EAST', 1),
(3, 'SAPPI', 1),
(4, 'SUNBRITE', 1),
(5, 'CMPC', 1),
(6, 'a', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medida`
--

CREATE TABLE `medida` (
  `idMedida` int(11) NOT NULL,
  `desmedida` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `estado_medida` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `medida`
--

INSERT INTO `medida` (`idMedida`, `desmedida`, `estado_medida`) VALUES
(1, '67 X 87', 1),
(2, '67 X 89', 1),
(3, '77 X 110', 1),
(4, '70 X 110', 1),
(5, '50 X 100', 1),
(7, '60 X 100', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquete`
--

CREATE TABLE `paquete` (
  `idPaquete` int(11) NOT NULL,
  `cantPaquete` int(11) DEFAULT NULL,
  `estado_paquete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `paquete`
--

INSERT INTO `paquete` (`idPaquete`, `cantPaquete`, `estado_paquete`) VALUES
(1, 500, 1),
(2, 250, 1),
(3, 125, 1),
(4, 100, 1),
(5, 50, 1),
(6, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precio`
--

CREATE TABLE `precio` (
  `IdPrecio` int(11) NOT NULL,
  `idProducto_key` int(11) DEFAULT NULL,
  `idMarca_key` int(11) DEFAULT NULL,
  `idProveedor_key` int(11) DEFAULT NULL,
  `idGramaje_key` int(11) DEFAULT NULL,
  `idMedida_key` int(11) DEFAULT NULL,
  `idPaquete_key` int(11) DEFAULT NULL,
  `precio` decimal(19,2) NOT NULL,
  `estado_precio` tinyint(1) NOT NULL,
  `Fecha_Registro_Precio` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `precio`
--

INSERT INTO `precio` (`IdPrecio`, `idProducto_key`, `idMarca_key`, `idProveedor_key`, `idGramaje_key`, `idMedida_key`, `idPaquete_key`, `precio`, `estado_precio`, `Fecha_Registro_Precio`) VALUES
(1, 3, 2, 1, 12, 1, 3, '120.50', 1, '2021-04-20 14:39:03'),
(2, 4, 3, 1, 10, 3, 3, '66.50', 1, '2021-04-20 16:57:28'),
(3, 3, 3, 1, 9, 2, 2, '171.67', 1, '2021-04-20 17:55:00'),
(4, 5, 5, 2, 31, 1, 1, '200.10', 1, '2021-04-24 16:34:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `desProducto` varchar(120) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `estado_producto` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `desProducto`, `estado_producto`) VALUES
(1, 'Papel periódico', 1),
(2, 'Papel Bond blanco', 1),
(3, 'Papel Couché blanco brillo', 1),
(4, 'Papel Couché blanco mate', 1),
(5, 'Papel Duplex', 1),
(6, 'Papel Triplex', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idProveedor` int(11) NOT NULL,
  `nombreProveedor` varchar(120) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `estado_proveedor` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idProveedor`, `nombreProveedor`, `estado_proveedor`) VALUES
(1, 'IMPEXPAP', 1),
(2, 'MADEPA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_usuario`
--

CREATE TABLE `rol_usuario` (
  `Id_UserRol` int(11) NOT NULL,
  `Rol` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `rol_usuario`
--

INSERT INTO `rol_usuario` (`Id_UserRol`, `Rol`) VALUES
(1, 'SUPERADMIN'),
(2, 'ADMINISTRADOR(A)'),
(3, 'COTIZADOR(A)'),
(4, 'CAJERO(A)'),
(5, 'DISEÑADOR(A)'),
(6, 'ALMACENERO(A)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id_Usuario` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Apellidos` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Celular` varchar(20) COLLATE utf8mb4_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_Usuario`, `Nombre`, `Apellidos`, `Celular`) VALUES
(1, 'Mauro Rodrigo', 'Cornejo PintoS', '79633559'),
(2, 'Aldo Alfredos', 'Cordero Perezs', '7888558');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `gramaje`
--
ALTER TABLE `gramaje`
  ADD PRIMARY KEY (`idGramaje`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Id_Login`),
  ADD KEY `RolUsuario_FK` (`RolUsuario_FK`),
  ADD KEY `Usuario_FK` (`Usuario_FK`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idMarca`);

--
-- Indices de la tabla `medida`
--
ALTER TABLE `medida`
  ADD PRIMARY KEY (`idMedida`);

--
-- Indices de la tabla `paquete`
--
ALTER TABLE `paquete`
  ADD PRIMARY KEY (`idPaquete`);

--
-- Indices de la tabla `precio`
--
ALTER TABLE `precio`
  ADD PRIMARY KEY (`IdPrecio`),
  ADD KEY `idProducto_key` (`idProducto_key`),
  ADD KEY `idMarca_key` (`idMarca_key`),
  ADD KEY `idProveedor_key` (`idProveedor_key`),
  ADD KEY `idGramaje_key` (`idGramaje_key`),
  ADD KEY `idMedida_key` (`idMedida_key`),
  ADD KEY `idPaquete_key` (`idPaquete_key`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idProveedor`);

--
-- Indices de la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  ADD PRIMARY KEY (`Id_UserRol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `gramaje`
--
ALTER TABLE `gramaje`
  MODIFY `idGramaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `Id_Login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `idMarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `medida`
--
ALTER TABLE `medida`
  MODIFY `idMedida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `paquete`
--
ALTER TABLE `paquete`
  MODIFY `idPaquete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `precio`
--
ALTER TABLE `precio`
  MODIFY `IdPrecio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`RolUsuario_FK`) REFERENCES `rol_usuario` (`Id_UserRol`),
  ADD CONSTRAINT `login_ibfk_2` FOREIGN KEY (`Usuario_FK`) REFERENCES `usuario` (`Id_Usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
