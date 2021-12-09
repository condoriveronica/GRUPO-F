-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 01-12-2021 a las 21:22:59
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `SistemaRegistro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(30) NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `Descripcion`) VALUES
(01, 'Licuadora'),
(02, 'Refregeradora'),
(03, 'Horno electrica'),
(04, 'Cosina electrica');
(04, 'cucharas');
(04, 'tazas');

-- --------------------------------------------------------


--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `id_Categoria` int(11) NOT NULL,
  `Descripcion` varchar(30) NOT NULL,
  `Precio` double(9,2) NOT NULL,
  `Cantidad` int(20) NOT NULL,
  `Marca` varchar(30) NOT NULL,
  `imagen` mediumblob NOT NULL,
  PRIMARY KEY (`idProducto`),
  KEY `id_Categoria` (`id_Categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `id_Categoria`, `Descripcion`, `Precio`, `Cantidad`, `Marca`, `imagen`) VALUES
(0001, 02, ' Lenovo core i3', 2000.00, 4, 'Lenovo', 0x576861747341707020496d61676520323032312d30382d30352061742030372e33392e3538202831292e6a706567),
(0002, 03, 'Laptop Asus core i5', 2500.00, 5, 'Asus', 0x576861747341707020496d61676520323032312d30382d30352061742030372e33392e35382e6a706567),
(0003, 01, 'Laptop ACER', 2600.00, 2, 'acer', 0x576861747341707020496d61676520323032312d30382d30352061742030372e33392e3538202833292e6a706567);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `Nombres` varchar(50) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Celular` varchar(15) NOT NULL,
  `PW` varchar(20) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUser`, `Nombres`, `Correo`, `Celular`, `PW`) VALUES
(01, 'Admin', 'admin@gmail.com', '9642343', 'admin001');

-- --------------------------------------------------------

-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_Categoria`) REFERENCES `categoria` (`idCategoria`);
