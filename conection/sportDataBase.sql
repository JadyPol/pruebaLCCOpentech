-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Tiempo de generación: 17-03-2016 a las 15:36:40
-- Versión del servidor: 5.5.41
-- Versión de PHP: 5.3.10-1ubuntu3.21

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sportdatabase`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipoDeportivo`
--

CREATE TABLE IF NOT EXISTS `equipoDeportivo` (
  `idequipoDeportivo` int(11) NOT NULL,
  `descripcionED` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`idequipoDeportivo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci COMMENT='Lista de equipos deportivos existentes';

--
-- Volcado de datos para la tabla `equipoDeportivo`
--

INSERT INTO `equipoDeportivo` (`idequipoDeportivo`, `descripcionED`) VALUES
(1, 'Real Madrid'),
(2, 'Manchester United'),
(3, 'Barcelona'),
(4, 'Yankees de Nueva York');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `idmarca` int(11) NOT NULL,
  `descripcion` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`idmarca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci COMMENT='LIsta de marcas existente';

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`idmarca`, `descripcion`) VALUES
(1, 'Nike'),
(2, 'Adidas'),
(3, 'Under Armour'),
(4, 'Reebok'),
(5, 'Quicksilver');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoRopa`
--

CREATE TABLE IF NOT EXISTS `tipoRopa` (
  `idtipoRopa` int(11) NOT NULL,
  `descripcionTR` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`idtipoRopa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci COMMENT='Lista de tipos de ropa existentes';

--
-- Volcado de datos para la tabla `tipoRopa`
--

INSERT INTO `tipoRopa` (`idtipoRopa`, `descripcionTR`) VALUES
(1, 'Franelas'),
(2, 'Shorts'),
(3, 'Zapatos'),
(4, 'Guantes'),
(5, 'Sweaters'),
(6, 'Gorra');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
