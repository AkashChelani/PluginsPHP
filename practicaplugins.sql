-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-03-2021 a las 16:14:21
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.33

-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- START TRANSACTION;
-- SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practicaplugins`
--
CREATE DATABASE IF NOT EXISTS `practicaplugins` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `practicaplugins`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horasproyecto`
--

CREATE TABLE `horasproyecto` (
  `tiempo` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareaspendientes`
--

CREATE TABLE `tareaspendientes` (
  `tareas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tareaspendientes`
--

INSERT INTO `tareaspendientes` (`tareas`) VALUES
('Instalacio'),
('Documentacio'),
('Busqueda Informacio'),
('Presentacio');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
