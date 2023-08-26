-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-08-2023 a las 02:04:31
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_Categoria` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_Categoria`, `nombre`) VALUES
(1, 'Mesa'),
(2, 'Silla'),
(3, 'Mueble'),
(4, 'Bajo Mesada'),
(8, 'Escritorio'),
(10, 'Parlante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_Pedido` int(11) NOT NULL,
  `id_Usuario` int(11) NOT NULL,
  `provincia` varchar(100) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  `cp` int(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `costo` float(200,2) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_Pedido`, `id_Usuario`, `provincia`, `localidad`, `cp`, `direccion`, `costo`, `estado`, `fecha`, `hora`) VALUES
(1, 8, 'Olavarria', 'Olavarria', 7400, 'Collinet', 6100.00, 'Confirmado', '2023-08-19', '22:24:42'),
(47, 8, 'Olavarria', 'Olavarria', 7400, 'Collinet', 6100.00, 'Confirmado', '2023-08-19', '23:22:54'),
(48, 9, 'Olavarria', 'Olavarria', 7400, 'Collinet', 6100.00, 'Confirmado', '2023-08-19', '23:29:25'),
(49, 9, 'Olavarria', 'Olavarria', 7400, 'Collinet', 6100.00, 'Confirmado', '2023-08-19', '23:43:54'),
(50, 9, 'Olavarria', 'Olavarria', 7400, 'Collinet', 600.00, 'Confirmado', '2023-08-20', '20:32:57'),
(51, 9, 'Olavarria', 'Olavarria', 7400, 'Collinet', 2800.00, 'Devolucion Pedido', '2023-08-21', '14:57:38'),
(52, 14, 'Buenos Aires', 'Olavarria', 7400, 'Avenida Pringles 3502', 37000.00, 'Devolucion Pedido', '2023-08-21', '17:13:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_productos`
--

CREATE TABLE `pedidos_productos` (
  `id_Pedido_Usuario` int(11) NOT NULL,
  `id_Pedido` int(11) NOT NULL,
  `id_Producto` int(11) NOT NULL,
  `unidades` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos_productos`
--

INSERT INTO `pedidos_productos` (`id_Pedido_Usuario`, `id_Pedido`, `id_Producto`, `unidades`) VALUES
(1, 47, 6, 5),
(2, 47, 5, 1),
(3, 47, 15, 2),
(4, 47, 16, 4),
(5, 48, 6, 5),
(6, 48, 5, 1),
(7, 48, 15, 2),
(8, 48, 16, 4),
(9, 49, 6, 5),
(10, 49, 5, 1),
(11, 49, 15, 2),
(12, 49, 16, 4),
(13, 50, 5, 2),
(14, 51, 16, 2),
(15, 51, 6, 2),
(16, 51, 15, 2),
(17, 52, 17, 7),
(18, 52, 19, 2),
(19, 52, 5, 2),
(20, 52, 15, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_Producto` int(11) NOT NULL,
  `id_Categoria` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` float(100,2) NOT NULL,
  `stock` int(100) NOT NULL,
  `fecha` date NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_Producto`, `id_Categoria`, `nombre`, `descripcion`, `precio`, `stock`, `fecha`, `imagen`) VALUES
(5, 2, 'Silla Escritorio', ' Excelente silla para escritorios modernos', 300.00, 7, '0000-00-00', 'SillaEscritorio.jpg'),
(6, 2, 'Silla Moderna', ' Buenísima silla para un Comedor grande', 600.00, 8, '0000-00-00', 'SillaModerna.jpg'),
(15, 1, 'Mesa Oficina', '    Excelente Mesa para oficina', 200.00, 10, '2023-08-05', 'MesaOficina.jpg'),
(16, 4, 'Bajo Mesada', '    Bajo Mesada para Laboratorio', 600.00, 10, '2023-08-05', 'BajoMesada.jpg'),
(17, 10, 'Parlante JBL', 'Parlante para Fiesta ', 5000.00, 10, '2023-08-21', 'parlante.jpg'),
(18, 3, 'Mueble Pared', ' Mueble para comedor', 10000.00, 3, '2023-08-21', 'Mueble.jpg'),
(19, 8, 'Escritorio Pc', 'Pc Oficina ', 500.00, 5, '2023-08-21', 'Escritorio.jpg'),
(20, 2, 'Silla Escritorio Tipo 2', ' Tipo 2', 1000.00, 3, '2023-08-25', 'SillaEscritorioTipo2.jpg'),
(21, 2, 'Silla Gamer', 'Marca Gamer ', 1500.00, 5, '2023-08-25', 'SillaGamer.jpg'),
(22, 2, 'Silla Madera', 'Silla Basica ', 700.00, 4, '2023-08-25', 'SillaMadera.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_Usuario` int(4) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rol` varchar(100) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_Usuario`, `nombre`, `apellido`, `email`, `password`, `rol`, `imagen`) VALUES
(8, 'qq', 'qq', 'qq@hotmail.com.ar', '$2y$04$Kw2Y3jvbXC1jrQNWE9hmh.3koZ9HEWGC1gPsqX9aRrCN9Ira1NNF6', 'administrador', NULL),
(9, 'ww', 'ww', 'ww@hotmail.com.ar', '$2y$04$qIWWXTKUBdgY9lXcyAhGwuHlZ4TOT2rYRJXlgZvh8.pn/w6er/0xi', 'usuario', NULL),
(13, 'admin', 'admin', 'admin@hotmail.com.ar', '$2y$04$doNFYIHe8mWej0Maj.q6fu9zeqRBN0yHf60DuHNVf.SYHrNVuXK1C', 'administrador', NULL),
(14, 'usuario', 'usuario', 'usuario@hotmail.com.ar', '$2y$04$VDaLhDJ8fQy0SPYzZ8PdOeP8/3l2Gb6dWpbU7d9VryX15reZ5/TFu', 'usuario', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_Categoria`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_Pedido`),
  ADD KEY `id_Usuario` (`id_Usuario`);

--
-- Indices de la tabla `pedidos_productos`
--
ALTER TABLE `pedidos_productos`
  ADD PRIMARY KEY (`id_Pedido_Usuario`),
  ADD KEY `id_Pedido` (`id_Pedido`),
  ADD KEY `id_Producto` (`id_Producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_Producto`),
  ADD KEY `id_Categoria` (`id_Categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_Usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_Pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `pedidos_productos`
--
ALTER TABLE `pedidos_productos`
  MODIFY `id_Pedido_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_Usuario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuarios` (`id_Usuario`);

--
-- Filtros para la tabla `pedidos_productos`
--
ALTER TABLE `pedidos_productos`
  ADD CONSTRAINT `pedidos_productos_ibfk_1` FOREIGN KEY (`id_Producto`) REFERENCES `productos` (`id_Producto`),
  ADD CONSTRAINT `pedidos_productos_ibfk_2` FOREIGN KEY (`id_Pedido`) REFERENCES `pedidos` (`id_Pedido`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_Categoria`) REFERENCES `categorias` (`id_Categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
