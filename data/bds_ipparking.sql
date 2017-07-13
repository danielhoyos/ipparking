-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2016 a las 07:00:54
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bds_ipparking`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_camara`
--

CREATE TABLE `tbl_camara` (
  `cam_id` int(11) NOT NULL,
  `cam_nombre` varchar(50) NOT NULL,
  `cam_ip` varchar(15) NOT NULL,
  `cam_puerto` varchar(5) NOT NULL,
  `cam_usuario` varchar(50) NOT NULL,
  `cam_password` varchar(50) NOT NULL,
  `par_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_camara`
--

INSERT INTO `tbl_camara` (`cam_id`, `cam_nombre`, `cam_ip`, `cam_puerto`, `cam_usuario`, `cam_password`, `par_id`) VALUES
(2, 'CAM1 - PRINCIPAL', '192.168.137.116', '8080', '', '', 61),
(3, 'Cam  Prueba', '192.168.137.224', '8080', '', '', 61);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_contrato_parqueadero`
--

CREATE TABLE `tbl_contrato_parqueadero` (
  `con_id` int(11) NOT NULL,
  `tcp_id` int(11) NOT NULL,
  `con_descripcion` varchar(200) NOT NULL,
  `par_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_contrato_parqueadero`
--

INSERT INTO `tbl_contrato_parqueadero` (`con_id`, `tcp_id`, `con_descripcion`, `par_id`) VALUES
(42, 2, 'Contrato por prestacion de Servicio de sistema de información de IPParking', 61),
(43, 1, 'Contrato por prestacion de Servicio de sistema de información de IPParking', 62),
(44, 1, 'Contrato por prestacion de Servicio de sistema de información de IPParking', 63),
(45, 2, 'Contrato por prestacion de Servicio de sistema de información de IPParking', 64);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estacion`
--

CREATE TABLE `tbl_estacion` (
  `est_id` int(11) NOT NULL,
  `est_codigo` varchar(10) NOT NULL,
  `est_tipo` enum('vehiculo','llave','casco') NOT NULL,
  `est_estado` enum('disponible','nodisponible') NOT NULL,
  `tiv_id` int(11) DEFAULT NULL,
  `par_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_estacion`
--

INSERT INTO `tbl_estacion` (`est_id`, `est_codigo`, `est_tipo`, `est_estado`, `tiv_id`, `par_id`) VALUES
(251, 'A1', 'vehiculo', 'disponible', 1, 61),
(252, 'A2', 'vehiculo', 'disponible', 1, 61),
(253, 'A3', 'vehiculo', 'disponible', 1, 61),
(254, 'A4', 'vehiculo', 'disponible', 1, 61),
(255, 'A5', 'vehiculo', 'disponible', 1, 61),
(256, 'A6', 'vehiculo', 'disponible', 1, 61),
(257, 'M1', 'vehiculo', 'disponible', 2, 61),
(258, 'M2', 'vehiculo', 'disponible', 2, 61),
(259, 'M3', 'vehiculo', 'disponible', 2, 61),
(260, 'M4', 'vehiculo', 'disponible', 2, 61),
(261, 'M5', 'vehiculo', 'disponible', 2, 61),
(262, 'M6', 'vehiculo', 'disponible', 2, 61),
(263, 'M7', 'vehiculo', 'disponible', 2, 61),
(264, 'M8', 'vehiculo', 'disponible', 2, 61),
(267, 'B1', 'vehiculo', 'disponible', 3, 61),
(268, 'B2', 'vehiculo', 'disponible', 3, 61),
(269, 'B3', 'vehiculo', 'disponible', 3, 61),
(270, 'B4', 'vehiculo', 'disponible', 3, 61),
(271, 'B5', 'vehiculo', 'disponible', 3, 61),
(272, 'B6', 'vehiculo', 'disponible', 3, 61),
(273, 'B7', 'vehiculo', 'disponible', 3, 61),
(274, 'B8', 'vehiculo', 'disponible', 3, 61),
(275, 'B9', 'vehiculo', 'disponible', 3, 61),
(276, 'B10', 'vehiculo', 'disponible', 3, 61),
(277, 'L1', 'llave', 'disponible', NULL, 61),
(278, 'L2', 'llave', 'disponible', NULL, 61),
(279, 'L3', 'llave', 'disponible', NULL, 61),
(280, 'L4', 'llave', 'disponible', NULL, 61),
(281, 'L5', 'llave', 'disponible', NULL, 61),
(282, 'L6', 'llave', 'disponible', NULL, 61),
(283, 'C1', 'casco', 'disponible', NULL, 61),
(284, 'C2', 'casco', 'disponible', NULL, 61),
(285, 'C3', 'casco', 'disponible', NULL, 61),
(286, 'C4', 'casco', 'disponible', NULL, 61),
(287, 'C5', 'casco', 'disponible', NULL, 61),
(288, 'C6', 'casco', 'disponible', NULL, 61),
(289, 'C7', 'casco', 'disponible', NULL, 61),
(290, 'C8', 'casco', 'disponible', NULL, 61),
(291, 'C9', 'casco', 'disponible', NULL, 61),
(292, 'C10', 'casco', 'disponible', NULL, 61),
(293, 'C11', 'casco', 'disponible', NULL, 61),
(294, 'C12', 'casco', 'disponible', NULL, 61),
(295, 'C13', 'casco', 'disponible', NULL, 61),
(296, 'C14', 'casco', 'disponible', NULL, 61),
(297, 'C15', 'casco', 'disponible', NULL, 61),
(298, 'C16', 'casco', 'disponible', NULL, 61),
(299, 'C1', 'vehiculo', 'disponible', 1, 62);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_factura`
--

CREATE TABLE `tbl_factura` (
  `fac_id` int(11) NOT NULL,
  `fac_codigo` varchar(100) NOT NULL,
  `fac_fecha_venta` date NOT NULL,
  `fac_hora_venta` time NOT NULL,
  `fac_valor_total` int(11) NOT NULL,
  `pao_id` int(11) NOT NULL,
  `fac_pdf` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_factura`
--

INSERT INTO `tbl_factura` (`fac_id`, `fac_codigo`, `fac_fecha_venta`, `fac_hora_venta`, `fac_valor_total`, `pao_id`, `fac_pdf`) VALUES
(13, '1', '2016-11-13', '20:00:48', 500, 13, 'fac-1-1006956884.pdf'),
(14, '2', '2016-11-13', '20:03:37', 500, 14, 'fac-2-1006956884.pdf'),
(15, '3', '2016-11-13', '20:05:33', 500, 15, 'fac-3-1006956884.pdf'),
(16, '4', '2016-11-14', '10:57:42', 500, 16, 'fac-4-61-1061791895.pdf'),
(17, '5', '2016-11-14', '10:57:45', 500, 16, 'fac-5-61-1061791895.pdf'),
(18, '6', '2016-11-14', '10:57:46', 500, 16, 'fac-6-61-1061791895.pdf'),
(19, '7', '2016-11-14', '10:57:47', 500, 16, 'fac-7-61-1061791895.pdf'),
(20, '8', '2016-11-14', '10:57:47', 500, 16, 'fac-8-61-1061791895.pdf'),
(21, '9', '2016-11-14', '10:57:48', 500, 16, 'fac-9-61-1061791895.pdf'),
(22, '10', '2016-11-14', '10:57:49', 500, 16, 'fac-10-61-1061791895.pdf'),
(23, '11', '2016-11-14', '10:57:49', 500, 16, 'fac-11-61-1061791895.pdf'),
(24, '12', '2016-11-14', '10:57:50', 500, 16, 'fac-12-61-1061791895.pdf'),
(25, '13', '2016-11-14', '10:57:50', 500, 16, 'fac-13-61-1061791895.pdf'),
(26, '14', '2016-11-14', '10:57:51', 500, 16, 'fac-14-61-1061791895.pdf'),
(27, '15', '2016-11-14', '10:57:52', 500, 16, 'fac-15-61-1061791895.pdf'),
(28, '16', '2016-11-14', '10:57:53', 500, 16, 'fac-16-61-1061791895.pdf'),
(29, '17', '2016-11-14', '10:57:54', 500, 16, 'fac-17-61-1061791895.pdf'),
(30, '18', '2016-11-14', '10:57:55', 500, 16, 'fac-18-61-1061791895.pdf'),
(31, '19', '2016-11-14', '10:57:56', 500, 16, 'fac-19-61-1061791895.pdf'),
(32, '20', '2016-11-14', '10:57:57', 500, 16, 'fac-20-61-1061791895.pdf'),
(33, '21', '2016-11-14', '10:57:58', 500, 16, 'fac-21-61-1061791895.pdf'),
(34, '22', '2016-11-14', '10:57:59', 500, 16, 'fac-22-61-1061791895.pdf'),
(35, '23', '2016-11-14', '10:57:59', 500, 16, 'fac-23-61-1061791895.pdf'),
(36, '24', '2016-11-14', '10:58:00', 500, 16, 'fac-24-61-1061791895.pdf'),
(37, '25', '2016-11-14', '10:58:01', 500, 16, 'fac-25-61-1061791895.pdf'),
(38, '26', '2016-11-14', '10:58:01', 500, 16, 'fac-26-61-1061791895.pdf'),
(39, '27', '2016-11-14', '10:58:02', 500, 16, 'fac-27-61-1061791895.pdf'),
(40, '28', '2016-11-14', '10:58:03', 500, 16, 'fac-28-61-1061791895.pdf'),
(41, '29', '2016-11-14', '10:58:04', 500, 16, 'fac-29-61-1061791895.pdf'),
(42, '30', '2016-11-14', '10:58:05', 500, 16, 'fac-30-61-1061791895.pdf'),
(43, '31', '2016-11-14', '10:58:05', 500, 16, 'fac-31-61-1061791895.pdf'),
(44, '32', '2016-11-14', '10:58:06', 500, 16, 'fac-32-61-1061791895.pdf'),
(45, '33', '2016-11-14', '10:58:07', 500, 16, 'fac-33-61-1061791895.pdf'),
(46, '34', '2016-11-14', '10:58:08', 500, 16, 'fac-34-61-1061791895.pdf'),
(47, '35', '2016-11-14', '10:58:08', 500, 16, 'fac-35-61-1061791895.pdf'),
(48, '36', '2016-11-14', '10:58:09', 500, 16, 'fac-36-61-1061791895.pdf'),
(49, '37', '2016-11-14', '10:58:09', 500, 16, 'fac-37-61-1061791895.pdf'),
(50, '38', '2016-11-14', '10:58:10', 500, 16, 'fac-38-61-1061791895.pdf'),
(51, '39', '2016-11-14', '10:58:10', 500, 16, 'fac-39-61-1061791895.pdf'),
(52, '40', '2016-11-14', '10:58:23', 500, 16, 'fac-40-61-1061791895.pdf'),
(53, '41', '2016-11-14', '10:58:24', 500, 16, 'fac-41-61-1061791895.pdf'),
(54, '42', '2016-11-14', '10:58:24', 500, 16, 'fac-42-61-1061791895.pdf'),
(55, '43', '2016-11-14', '10:58:25', 500, 16, 'fac-43-61-1061791895.pdf'),
(56, '44', '2016-11-14', '10:58:26', 500, 16, 'fac-44-61-1061791895.pdf'),
(57, '45', '2016-11-14', '10:58:26', 500, 16, 'fac-45-61-1061791895.pdf'),
(58, '46', '2016-11-14', '10:58:27', 500, 16, 'fac-46-61-1061791895.pdf'),
(59, '47', '2016-11-14', '10:58:27', 500, 16, 'fac-47-61-1061791895.pdf'),
(60, '48', '2016-11-14', '10:58:28', 500, 16, 'fac-48-61-1061791895.pdf'),
(61, '49', '2016-11-14', '10:58:29', 500, 16, 'fac-49-61-1061791895.pdf'),
(62, '50', '2016-11-14', '10:58:30', 500, 16, 'fac-50-61-1061791895.pdf'),
(63, '51', '2016-11-14', '10:58:31', 500, 16, 'fac-51-61-1061791895.pdf'),
(64, '52', '2016-11-14', '10:58:32', 500, 16, 'fac-52-61-1061791895.pdf'),
(65, '53', '2016-11-14', '10:58:32', 500, 16, 'fac-53-61-1061791895.pdf'),
(66, '54', '2016-11-14', '10:58:33', 500, 16, 'fac-54-61-1061791895.pdf'),
(67, '55', '2016-11-14', '10:58:33', 500, 16, 'fac-55-61-1061791895.pdf'),
(68, '56', '2016-11-14', '10:58:43', 500, 17, 'fac-56-61-1061791895.pdf'),
(69, '57', '2016-11-14', '10:58:44', 500, 17, 'fac-57-61-1061791895.pdf'),
(70, '58', '2016-11-14', '10:58:45', 500, 17, 'fac-58-61-1061791895.pdf'),
(71, '59', '2016-11-14', '10:58:45', 500, 17, 'fac-59-61-1061791895.pdf'),
(72, '60', '2016-11-14', '10:58:46', 500, 17, 'fac-60-61-1061791895.pdf'),
(73, '61', '2016-11-14', '10:58:47', 500, 17, 'fac-61-61-1061791895.pdf'),
(74, '62', '2016-11-14', '10:58:47', 500, 17, 'fac-62-61-1061791895.pdf'),
(75, '63', '2016-11-14', '10:58:48', 500, 17, 'fac-63-61-1061791895.pdf'),
(76, '64', '2016-11-14', '10:58:49', 500, 17, 'fac-64-61-1061791895.pdf'),
(77, '65', '2016-11-14', '10:58:49', 500, 17, 'fac-65-61-1061791895.pdf'),
(78, '66', '2016-11-14', '10:58:50', 500, 17, 'fac-66-61-1061791895.pdf'),
(79, '67', '2016-11-14', '10:58:50', 500, 17, 'fac-67-61-1061791895.pdf'),
(80, '68', '2016-11-14', '10:58:51', 500, 17, 'fac-68-61-1061791895.pdf'),
(81, '69', '2016-11-14', '10:58:52', 500, 17, 'fac-69-61-1061791895.pdf'),
(82, '70', '2016-11-14', '10:58:52', 500, 17, 'fac-70-61-1061791895.pdf'),
(83, '71', '2016-11-14', '10:58:53', 500, 17, 'fac-71-61-1061791895.pdf'),
(84, '72', '2016-11-14', '10:58:53', 500, 17, 'fac-72-61-1061791895.pdf'),
(85, '73', '2016-11-14', '10:58:54', 500, 17, 'fac-73-61-1061791895.pdf'),
(86, '74', '2016-11-14', '10:58:55', 500, 17, 'fac-74-61-1061791895.pdf'),
(87, '75', '2016-11-14', '10:58:56', 500, 17, 'fac-75-61-1061791895.pdf'),
(88, '76', '2016-11-14', '10:58:56', 500, 17, 'fac-76-61-1061791895.pdf'),
(89, '77', '2016-11-14', '10:58:57', 500, 17, 'fac-77-61-1061791895.pdf'),
(90, '78', '2016-11-14', '10:58:58', 500, 17, 'fac-78-61-1061791895.pdf'),
(91, '79', '2016-11-14', '11:01:17', 500, 17, 'fac-79-61-1061791895.pdf'),
(92, '80', '2016-11-14', '11:05:08', 500, 17, 'fac-80-61-1061791895.pdf'),
(93, '81', '2016-11-14', '11:05:45', 500, 17, 'fac-81-61-1061791895.pdf'),
(94, '82', '2016-11-14', '11:07:25', 500, 16, 'fac-82-61-1061791895.pdf'),
(95, '83', '2016-11-14', '11:09:09', 500, 18, 'fac-83-61-1061791895.pdf'),
(96, '84', '2016-11-14', '11:26:50', 500, 19, 'fac-84-61-1061791895.pdf'),
(97, '85', '2016-11-14', '11:34:32', 500, 19, 'fac-85-61-1061791895.pdf'),
(98, '86', '2016-11-14', '11:46:34', 500, 19, 'fac-86-61-1061791895.pdf'),
(99, '87', '2016-11-14', '11:46:35', 500, 19, 'fac-87-61-1061791895.pdf'),
(100, '88', '2016-11-14', '11:46:36', 500, 19, 'fac-88-61-1061791895.pdf'),
(101, '89', '2016-11-14', '11:57:30', 1000, 19, 'fac-89-61-1061791895.pdf'),
(102, '90', '2016-11-14', '11:59:34', 1000, 19, 'fac-90-61-1061791895.pdf'),
(103, '91', '2016-11-14', '12:05:14', 1000, 19, 'fac-91-61-1061791895.pdf'),
(104, '92', '2016-11-14', '12:14:17', 1000, 19, 'fac-92-61-1061791895.pdf'),
(105, '93', '2016-11-14', '12:15:37', 1000, 19, 'fac-93-61-1061791895.pdf'),
(106, '94', '2016-11-14', '12:29:57', 1500, 19, 'fac-94-61-1061791895.pdf'),
(107, '95', '2016-11-14', '12:30:01', 1500, 19, 'fac-95-61-1061791895.pdf'),
(108, '96', '2016-11-14', '12:32:28', 500, 20, 'fac-96-61-1061791895.pdf'),
(109, '97', '2016-11-14', '12:32:31', 500, 20, 'fac-97-61-1061791895.pdf'),
(110, '98', '2016-11-14', '12:38:56', 500, 20, 'fac-98-61-1061791895.pdf'),
(111, '99', '2016-11-14', '12:48:35', 500, 20, 'fac-99-61-1061791895.pdf'),
(112, '100', '2016-11-14', '13:20:01', 1000, 20, 'fac-100-61-1061791895.pdf'),
(113, '101', '2016-11-14', '13:24:07', 1000, 20, 'fac-101-61-1061791895.pdf'),
(114, '102', '2016-11-14', '16:44:59', 500, 21, 'fac-102-61-1061791895.pdf'),
(115, '103', '2016-11-14', '16:45:46', 500, 22, 'fac-103-61-1061791895.pdf'),
(116, '104', '2016-11-14', '16:46:19', 500, 23, 'fac-104-61-1061791895.pdf'),
(117, '105', '2016-11-14', '16:49:57', 500, 23, 'fac-105-61-1061791895.pdf'),
(118, '106', '2016-11-14', '16:51:21', 500, 24, 'fac-106-61-1061791895.pdf'),
(119, '107', '2016-11-14', '16:52:27', 500, 25, 'fac-107-61-1061791895.pdf'),
(120, '108', '2016-11-14', '16:55:23', 500, 25, 'fac-108-61-1061791895.pdf'),
(122, '110', '2016-11-14', '17:35:29', 1000, 27, 'fac-110-61-1061791895.pdf'),
(123, '111', '2016-11-14', '17:37:21', 500, 28, 'fac-111-61-1061791895.pdf'),
(124, '112', '2016-11-14', '17:39:27', 500, 29, 'fac-112-61-1061791895.pdf'),
(125, '113', '2016-11-14', '17:41:46', 500, 30, 'fac-113-61-1061791895.pdf'),
(126, '114', '2016-11-14', '17:45:40', 500, 31, 'fac-114-61-1061791895.pdf'),
(127, '115', '2016-11-14', '17:46:39', 1000, 32, 'fac-115-61-1061791895.pdf'),
(128, '116', '2016-11-14', '17:47:35', 3000, 33, 'fac-116-61-1061791895.pdf'),
(129, '117', '2016-11-15', '02:08:58', 5000, 34, 'fac-117-1061791895.pdf'),
(130, '118', '2016-11-15', '02:32:35', 500, 35, 'fac-118-61-1061791895.pdf'),
(131, '119', '2016-11-15', '02:32:39', 500, 35, 'fac-119-61-1061791895.pdf'),
(132, '120', '2016-11-15', '02:32:40', 500, 35, 'fac-120-61-1061791895.pdf'),
(133, '121', '2016-11-15', '02:32:41', 500, 35, 'fac-121-61-1061791895.pdf'),
(134, '122', '2016-11-15', '02:32:42', 500, 35, 'fac-122-61-1061791895.pdf'),
(135, '123', '2016-11-15', '02:36:47', 500, 36, 'fac-123-61-1061791895.pdf'),
(136, '124', '2016-11-15', '12:26:32', 2500, 37, 'fac-124-61-1061791895.pdf'),
(137, '125', '2016-11-15', '12:26:35', 2500, 37, 'fac-125-61-1061791895.pdf'),
(138, '126', '2016-11-15', '12:27:05', 500, 38, 'fac-126-61-1006956884.pdf'),
(139, '127', '2016-11-15', '12:29:41', 500, 40, 'fac-127-61-1006956884.pdf'),
(140, '128', '2016-11-15', '12:30:14', 500, 41, 'fac-128-61-1061791895.pdf'),
(141, '129', '2016-11-15', '12:30:15', 500, 41, 'fac-129-61-1061791895.pdf'),
(142, '130', '2016-11-15', '12:30:16', 500, 41, 'fac-130-61-1061791895.pdf'),
(143, '131', '2016-11-15', '12:30:18', 500, 41, 'fac-131-61-1061791895.pdf'),
(144, '132', '2016-11-15', '12:30:19', 500, 41, 'fac-132-61-1061791895.pdf'),
(145, '133', '2016-11-15', '12:32:55', 400, 42, 'fac-133-61-1061791895.pdf'),
(146, '134', '2016-11-15', '12:36:08', 500, 43, 'fac-134-61-1061791895.pdf'),
(147, '135', '2016-11-15', '12:36:10', 500, 43, 'fac-135-61-1061791895.pdf'),
(148, '136', '2016-11-15', '12:36:11', 500, 43, 'fac-136-61-1061791895.pdf'),
(149, '137', '2016-11-15', '12:36:12', 500, 43, 'fac-137-61-1061791895.pdf'),
(150, '138', '2016-11-15', '12:36:13', 500, 43, 'fac-138-61-1061791895.pdf'),
(151, '139', '2016-11-15', '12:36:15', 500, 43, 'fac-139-61-1061791895.pdf'),
(152, '140', '2016-11-15', '12:36:16', 500, 43, 'fac-140-61-1061791895.pdf'),
(153, '141', '2016-11-15', '12:36:57', 400, 44, 'fac-141-61-1061791895.pdf'),
(154, '142', '2016-11-15', '12:37:57', 400, 45, 'fac-142-61-1061791895.pdf'),
(155, '143', '2016-11-15', '12:41:58', 400, 46, 'fac-143-61-1061791895.pdf'),
(156, '144', '2016-11-15', '12:43:20', 500, 47, 'fac-144-61-1061791895.pdf'),
(157, '145', '2016-11-15', '12:43:50', 400, 48, 'fac-145-61-1061791895.pdf'),
(158, '146', '2016-11-15', '17:30:20', 2500, 49, 'fac-146-61-1061791895.pdf'),
(159, '147', '2016-11-17', '09:16:57', 1500, 50, 'fac-147-61-1061791895.pdf'),
(160, '147', '2016-11-18', '15:22:55', 600, 51, 'fac-147-61-1061791895.pdf'),
(161, '148', '2016-11-18', '15:25:22', 450, 52, 'fac-148-61-1062754459.pdf'),
(162, '149', '2016-11-22', '16:58:14', 32250, 53, 'fac-149-61-41170945.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_marca`
--

CREATE TABLE `tbl_marca` (
  `mar_id` int(11) NOT NULL,
  `mar_nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_marca`
--

INSERT INTO `tbl_marca` (`mar_id`, `mar_nombre`) VALUES
(2, 'Honda'),
(4, 'QUINGQI'),
(1, 'Susuki'),
(3, 'Yamaha');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_novedad`
--

CREATE TABLE `tbl_novedad` (
  `nov_id` int(11) NOT NULL,
  `nov_nombre` varchar(25) NOT NULL,
  `nov_apellido` varchar(25) NOT NULL,
  `nov_correo` varchar(50) NOT NULL,
  `nov_telefono` varchar(25) NOT NULL,
  `nov_asunto` enum('felicitacion','solicitud','queja','pedido') NOT NULL,
  `nov_mensaje` varchar(200) NOT NULL,
  `nov_estado` enum('atendida','pendiente') NOT NULL,
  `usu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pago_contrato_parqueadero`
--

CREATE TABLE `tbl_pago_contrato_parqueadero` (
  `pcp_id` int(11) NOT NULL,
  `con_id` int(11) NOT NULL,
  `pcp_fecha_pago` datetime NOT NULL,
  `pcp_fecha_inicio_periodo` date NOT NULL,
  `pcp_fecha_fin_periodo` date NOT NULL,
  `pcp_valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_pago_contrato_parqueadero`
--

INSERT INTO `tbl_pago_contrato_parqueadero` (`pcp_id`, `con_id`, `pcp_fecha_pago`, `pcp_fecha_inicio_periodo`, `pcp_fecha_fin_periodo`, `pcp_valor`) VALUES
(27, 42, '2016-10-03 17:34:00', '2016-10-30', '2017-04-30', 120000),
(28, 43, '2016-10-03 17:51:02', '2016-10-27', '2017-01-27', 60000),
(29, 44, '2016-11-18 15:09:48', '2016-11-30', '2017-03-02', 60000),
(30, 45, '2016-11-22 09:52:13', '2016-11-16', '2017-05-16', 120000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_parqueadero`
--

CREATE TABLE `tbl_parqueadero` (
  `par_id` int(11) NOT NULL,
  `par_nit` varchar(15) NOT NULL,
  `par_nombre` varchar(25) NOT NULL,
  `par_direccion` varchar(50) NOT NULL,
  `par_telefono` varchar(25) NOT NULL,
  `par_capacidad_carros` int(11) DEFAULT NULL,
  `par_capacidad_motos` int(11) DEFAULT NULL,
  `par_capacidad_bicicletas` int(11) DEFAULT NULL,
  `par_capacidad_cascos` int(11) DEFAULT NULL,
  `par_capacidad_llaves` int(11) DEFAULT NULL,
  `par_fecha_registro` datetime NOT NULL,
  `par_avatar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_parqueadero`
--

INSERT INTO `tbl_parqueadero` (`par_id`, `par_nit`, `par_nombre`, `par_direccion`, `par_telefono`, `par_capacidad_carros`, `par_capacidad_motos`, `par_capacidad_bicicletas`, `par_capacidad_cascos`, `par_capacidad_llaves`, `par_fecha_registro`, `par_avatar`) VALUES
(61, '1062754459-4', 'Parqueadero Caldas', 'Calle 6ta No. 10-06 Centro', '8212121 - 8222233', 5, 8, 10, 20, 8, '2016-10-03 17:34:00', 'parqueaderocaldas-1062754459-4.png'),
(62, '1061731864-1', 'Parqueadero El Recuerdo', 'Calle 6ta No. 10-06 El Recuerdo', '8202020 - 8203020', 1, 1, 1, 1, 1, '2016-10-03 17:51:01', 'parqueaderoelrecuerdo-1061731864-1.jpg'),
(63, '12345-67', 'parqueadero-sena', 'centro', '313144363', NULL, NULL, NULL, NULL, NULL, '2016-11-18 15:09:48', 'parqueadero-sena-12345-67.jpg'),
(64, '106178299-0', 'Parqueadero San Carlos', 'Carrera 12 No. 10-26 Santa Clara', '3138844770', NULL, NULL, NULL, NULL, NULL, '2016-11-22 09:52:13', 'parqueaderosancarlos-106178299-0.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_parqueadero_administrador`
--

CREATE TABLE `tbl_parqueadero_administrador` (
  `padm_id` int(11) NOT NULL,
  `par_id` int(11) NOT NULL,
  `adm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_parqueadero_administrador`
--

INSERT INTO `tbl_parqueadero_administrador` (`padm_id`, `par_id`, `adm_id`) VALUES
(17, 61, 40),
(18, 62, 41),
(19, 63, 45),
(20, 64, 47);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_parqueadero_administrador_empleado`
--

CREATE TABLE `tbl_parqueadero_administrador_empleado` (
  `pae_id` int(11) NOT NULL,
  `padm_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_parqueadero_administrador_empleado`
--

INSERT INTO `tbl_parqueadero_administrador_empleado` (`pae_id`, `padm_id`, `emp_id`) VALUES
(3, 17, 44);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_parqueo`
--

CREATE TABLE `tbl_parqueo` (
  `pao_id` int(11) NOT NULL,
  `pao_fecha_inicio` date NOT NULL,
  `pao_hora_inicio` time NOT NULL,
  `pao_fecha_fin` date DEFAULT NULL,
  `pao_hora_fin` time DEFAULT NULL,
  `est_id` int(11) DEFAULT NULL,
  `veh_id` int(11) NOT NULL,
  `vendedor_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `pao_estado` enum('activo','finalizado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_parqueo`
--

INSERT INTO `tbl_parqueo` (`pao_id`, `pao_fecha_inicio`, `pao_hora_inicio`, `pao_fecha_fin`, `pao_hora_fin`, `est_id`, `veh_id`, `vendedor_id`, `cliente_id`, `pao_estado`) VALUES
(13, '2016-11-13', '20:00:02', '2016-11-13', '20:00:49', 251, 38, 40, 40, 'finalizado'),
(14, '2016-11-13', '20:01:06', '2016-11-13', '20:03:38', 251, 38, 40, 40, 'finalizado'),
(15, '2016-11-13', '20:03:38', '2016-11-13', '20:05:34', 251, 38, 40, 40, 'finalizado'),
(16, '2016-11-14', '10:57:15', '2016-11-14', '11:07:26', 256, 38, 40, 1, 'finalizado'),
(17, '2016-11-14', '10:58:19', '2016-11-14', '11:05:46', 251, 17, 40, 1, 'finalizado'),
(18, '2016-11-14', '11:08:50', '2016-11-14', '11:09:10', 251, 38, 40, 1, 'finalizado'),
(19, '2016-11-14', '11:26:21', '2016-11-14', '12:30:05', 251, 17, 40, 1, 'finalizado'),
(20, '2016-11-14', '12:32:11', '2016-11-14', '13:24:08', 251, 17, 40, 1, 'finalizado'),
(21, '2016-11-14', '16:44:43', '2016-11-14', '16:45:00', 251, 17, 40, 1, 'finalizado'),
(22, '2016-11-14', '16:45:29', '2016-11-14', '16:45:47', 251, 38, 40, 1, 'finalizado'),
(23, '2016-11-14', '16:46:02', '2016-11-14', '16:49:58', 251, 38, 40, 1, 'finalizado'),
(24, '2016-11-14', '16:47:29', '2016-11-14', '16:51:22', 252, 17, 40, 1, 'finalizado'),
(25, '2016-11-14', '16:52:02', '2016-11-14', '16:55:23', 251, 39, 40, 1, 'finalizado'),
(27, '2016-11-14', '17:03:42', '2016-11-14', '17:35:30', 251, 38, 40, 1, 'finalizado'),
(28, '2016-11-14', '17:37:09', '2016-11-14', '17:37:22', 251, 17, 40, 1, 'finalizado'),
(29, '2016-11-14', '17:37:54', '2016-11-14', '17:39:28', 251, 38, 40, 1, 'finalizado'),
(30, '2016-11-14', '17:39:29', '2016-11-14', '17:41:47', 251, 38, 40, 1, 'finalizado'),
(31, '2016-11-14', '17:44:15', '2016-11-14', '17:45:40', 251, 38, 40, 1, 'finalizado'),
(32, '2016-11-14', '17:00:41', '2016-11-14', '17:46:40', 251, 17, 40, 1, 'finalizado'),
(33, '2016-11-14', '14:46:41', '2016-11-14', '17:47:36', 251, 38, 40, 1, 'finalizado'),
(34, '2016-11-14', '17:48:17', '2016-11-15', '02:08:59', 251, 38, 40, 1, 'finalizado'),
(35, '2016-11-15', '02:32:01', '2016-11-15', '02:32:45', 251, 17, 40, 1, 'finalizado'),
(36, '2016-11-15', '02:35:52', '2016-11-15', '02:36:48', 251, 17, 40, 1, 'finalizado'),
(37, '2016-11-15', '09:17:14', '2016-11-15', '12:26:37', 251, 17, 40, 1, 'finalizado'),
(38, '2016-11-15', '12:20:18', '2016-11-15', '12:27:06', 252, 38, 40, 40, 'finalizado'),
(39, '2016-11-15', '12:20:18', NULL, NULL, 252, 38, 40, 40, 'activo'),
(40, '2016-11-15', '12:29:14', '2016-11-15', '12:29:42', 251, 38, 40, 40, 'finalizado'),
(41, '2016-11-15', '12:29:43', '2016-11-15', '12:30:20', 251, 38, 40, 1, 'finalizado'),
(42, '2016-11-15', '12:30:55', '2016-11-15', '12:32:56', 251, 17, 40, 1, 'finalizado'),
(43, '2016-11-15', '12:32:56', '2016-11-15', '12:36:17', 251, 38, 40, 1, 'finalizado'),
(44, '2016-11-15', '12:36:40', '2016-11-15', '12:36:58', 251, 17, 40, 1, 'finalizado'),
(45, '2016-11-15', '12:37:38', '2016-11-15', '12:37:58', 251, 17, 40, 1, 'finalizado'),
(46, '2016-11-15', '12:41:28', '2016-11-15', '12:41:59', 251, 17, 40, 1, 'finalizado'),
(47, '2016-11-15', '12:42:37', '2016-11-15', '12:43:21', 251, 38, 40, 1, 'finalizado'),
(48, '2016-11-15', '12:43:27', '2016-11-15', '12:43:51', 251, 17, 40, 1, 'finalizado'),
(49, '2016-11-15', '15:18:41', '2016-11-15', '17:30:22', 251, 38, 40, 1, 'finalizado'),
(50, '2016-11-17', '08:12:09', '2016-11-17', '09:17:00', 251, 38, 40, 1, 'finalizado'),
(51, '2016-11-18', '15:17:27', '2016-11-18', '15:22:58', 251, 38, 40, 1, 'finalizado'),
(52, '2016-11-18', '15:20:08', '2016-11-18', '15:25:23', 257, 17, 40, 40, 'finalizado'),
(53, '2016-11-19', '14:44:32', '2016-11-22', '16:58:16', 257, 40, 40, 46, 'finalizado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_parqueo_estacion`
--

CREATE TABLE `tbl_parqueo_estacion` (
  `paes_id` int(11) NOT NULL,
  `est_id` int(11) DEFAULT NULL,
  `pao_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_parqueo_estacion`
--

INSERT INTO `tbl_parqueo_estacion` (`paes_id`, `est_id`, `pao_id`) VALUES
(56, 277, 13),
(57, 277, 16),
(58, 277, 19),
(59, 283, NULL),
(60, 284, NULL),
(61, 277, 37),
(62, 277, 40),
(63, 277, 43),
(64, 277, 49),
(65, 277, 50),
(66, 277, 51),
(67, 283, 52),
(68, 284, 52),
(69, 283, 53),
(70, 284, 53);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_persona`
--

CREATE TABLE `tbl_persona` (
  `per_id` int(11) NOT NULL,
  `tip_id` int(11) DEFAULT NULL,
  `per_identificacion` varchar(12) NOT NULL,
  `per_nombre` varchar(25) NOT NULL,
  `per_apellido` varchar(25) NOT NULL,
  `per_genero` enum('M','F') DEFAULT NULL,
  `per_direccion` varchar(50) DEFAULT NULL,
  `per_fecha_nacimiento` date DEFAULT NULL,
  `per_correo` varchar(50) DEFAULT NULL,
  `per_telefono` varchar(23) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_persona`
--

INSERT INTO `tbl_persona` (`per_id`, `tip_id`, `per_identificacion`, `per_nombre`, `per_apellido`, `per_genero`, `per_direccion`, `per_fecha_nacimiento`, `per_correo`, `per_telefono`) VALUES
(1, 1, '1061791895', 'Daniel', 'Hoyos', 'M', 'Sena - Centro de Comercio y Servicios', '1996-06-30', 'danielhoyos350@gmail.com', '3508957850'),
(67, 1, '1062754459', 'Darwin', 'Villaquiran', 'M', 'Sena - Centro de Comercio y Servicios', '1994-12-05', 'dbvillaquiran@misena.edu.co', '3204823336'),
(69, 1, '1061731864', 'Jessica', 'Hoyos', 'F', 'Calle 6ta No. 10-06 Barrio el Recuerdo', '1990-03-19', 'jessicahoyos@gmail.com', '3157549498'),
(83, 1, '1059606126', 'Nidia Stell', 'Mamian', NULL, 'Morales', NULL, 'nidiastella98@gmail.com', '8203049'),
(84, 1, '123456', 'carlos', 'jimenez', NULL, 'sena', NULL, 'ohviveros@misena.edu.co', '234667'),
(85, NULL, '41170945', 'Esperanza', 'Caicedo', 'F', 'Sena Centro de Comercio y Servicios', '1984-05-06', 'esperanzacaicedo@gmail.com', '3143150757'),
(86, 1, '12345', 'Sebastian', 'Dorado', 'M', 'Yescas', '1998-06-05', 'sebastiandoraro@gmail.com', '3138844470');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_rol`
--

CREATE TABLE `tbl_rol` (
  `rol_id` int(11) NOT NULL,
  `rol_nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_rol`
--

INSERT INTO `tbl_rol` (`rol_id`, `rol_nombre`) VALUES
(2, 'Administrador'),
(4, 'Cliente'),
(3, 'Empleado'),
(1, 'Gerente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tarifa`
--

CREATE TABLE `tbl_tarifa` (
  `tar_id` int(11) NOT NULL,
  `tar_valor_minuto` int(11) NOT NULL DEFAULT '0',
  `tar_valor_hora` int(11) NOT NULL DEFAULT '0',
  `tar_hora_minima` int(11) NOT NULL DEFAULT '0',
  `tar_valor_minima` int(11) NOT NULL DEFAULT '0',
  `tar_hora_maxima` int(11) NOT NULL DEFAULT '0',
  `tar_valor_maxima` int(11) NOT NULL DEFAULT '0',
  `tar_valor_dia` int(11) NOT NULL DEFAULT '0',
  `tar_valor_quincena` int(11) NOT NULL DEFAULT '0',
  `tar_valor_mes` int(11) NOT NULL DEFAULT '0',
  `par_id` int(11) NOT NULL,
  `tiv_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_tarifa`
--

INSERT INTO `tbl_tarifa` (`tar_id`, `tar_valor_minuto`, `tar_valor_hora`, `tar_hora_minima`, `tar_valor_minima`, `tar_hora_maxima`, `tar_valor_maxima`, `tar_valor_dia`, `tar_valor_quincena`, `tar_valor_mes`, `par_id`, `tiv_id`) VALUES
(8, 20, 1200, 3, 3000, 8, 6000, 15000, 30000, 60000, 61, 1),
(9, 15, 900, 3, 2200, 8, 5000, 10000, 20000, 40000, 61, 2),
(10, 10, 600, 0, 0, 0, 0, 3000, 8000, 15000, 61, 3),
(11, 15, 1100, 0, 0, 0, 10, 0, 0, 0, 62, 1),
(12, 0, 1000, 0, 0, 24, 0, 0, 0, 0, 62, 2),
(13, 0, 500, 0, 0, 0, 0, 0, 0, 0, 62, 3),
(14, 0, 1400, 0, 0, 0, 0, 0, 0, 0, 63, 1),
(15, 0, 1100, 0, 0, 0, 0, 0, 0, 0, 63, 2),
(16, 0, 700, 0, 0, 0, 0, 0, 0, 0, 63, 3),
(17, 0, 1000, 0, 0, 0, 0, 0, 0, 0, 64, 1),
(18, 0, 800, 0, 0, 0, 0, 0, 0, 0, 64, 2),
(19, 0, 500, 0, 0, 0, 0, 0, 0, 0, 64, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tiempo_contrato_parqueadero`
--

CREATE TABLE `tbl_tiempo_contrato_parqueadero` (
  `tcp_id` int(11) NOT NULL,
  `tcp_cantidad_meses` int(11) NOT NULL,
  `tcp_valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_tiempo_contrato_parqueadero`
--

INSERT INTO `tbl_tiempo_contrato_parqueadero` (`tcp_id`, `tcp_cantidad_meses`, `tcp_valor`) VALUES
(1, 3, 60000),
(2, 6, 120000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_identificacion`
--

CREATE TABLE `tbl_tipo_identificacion` (
  `tip_id` int(11) NOT NULL,
  `tip_nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_tipo_identificacion`
--

INSERT INTO `tbl_tipo_identificacion` (`tip_id`, `tip_nombre`) VALUES
(1, 'Cedula de Ciudadanía'),
(2, 'Cedula de Extranjeria'),
(3, 'Nit'),
(4, 'Targeta de Identidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_vehiculo`
--

CREATE TABLE `tbl_tipo_vehiculo` (
  `tiv_id` int(11) NOT NULL,
  `tiv_nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_tipo_vehiculo`
--

INSERT INTO `tbl_tipo_vehiculo` (`tiv_id`, `tiv_nombre`) VALUES
(1, 'Automovil'),
(3, 'Bicicleta'),
(2, 'Motocicleta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `usu_id` int(11) NOT NULL,
  `usu_usuario` varchar(20) NOT NULL,
  `usu_password` varchar(50) NOT NULL,
  `usu_avatar` varchar(54) DEFAULT NULL,
  `usu_portada` varchar(54) DEFAULT NULL,
  `usu_estado` enum('activo','inactivo','pendiente','') NOT NULL,
  `usu_fecha_registro` date NOT NULL,
  `per_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`usu_id`, `usu_usuario`, `usu_password`, `usu_avatar`, `usu_portada`, `usu_estado`, `usu_fecha_registro`, `per_id`, `rol_id`) VALUES
(1, 'gerente', '89707d24a21f3348e8b3b734dc00869b', 'gerente.jpg', 'gerente.jpg', 'activo', '2016-08-20', 1, 1),
(40, 'admin1', '25d55ad283aa400af464c76d713c07ad', 'admin1.jpg', 'admin1.jpg', 'activo', '2016-10-03', 67, 2),
(41, 'admin2', '25d55ad283aa400af464c76d713c07ad', 'admin2.jpg', NULL, 'activo', '2016-10-03', 69, 2),
(44, 'nidiastella98', 'de31d6661f271bcf5c8e4ce177d9a253', NULL, NULL, 'pendiente', '2016-10-05', 83, 3),
(45, 'oscar', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, 'activo', '2016-11-18', 84, 2),
(46, 'DUL11A', 'bb4594fc0ca94fe6fe0aa2c09b1a52f7', 'PHP123.jpg', 'PHP123.jpg', 'activo', '2016-11-19', 85, 4),
(47, 'sebastiandorado', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, 'activo', '2016-11-22', 86, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_vehiculo`
--

CREATE TABLE `tbl_vehiculo` (
  `veh_id` int(11) NOT NULL,
  `veh_placa` varchar(6) NOT NULL,
  `veh_color` enum('blanco','negro','rojo','azul','gris','amarillo','verde','otro') NOT NULL,
  `mar_id` int(11) DEFAULT NULL,
  `tiv_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_vehiculo`
--

INSERT INTO `tbl_vehiculo` (`veh_id`, `veh_placa`, `veh_color`, `mar_id`, `tiv_id`) VALUES
(17, 'LLC38', 'negro', 2, 2),
(19, 'DUL11A', 'negro', 3, 1),
(20, 'KPC46C', 'negro', 2, 1),
(21, 'CTB52E', 'negro', 2, 2),
(22, 'RNX54C', 'negro', 4, 2),
(38, 'SAP100', 'blanco', 2, 1),
(39, 'CTB52C', 'blanco', 2, 1),
(40, 'PHP123', 'negro', 2, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_camara`
--
ALTER TABLE `tbl_camara`
  ADD PRIMARY KEY (`cam_id`),
  ADD KEY `par_id` (`par_id`);

--
-- Indices de la tabla `tbl_contrato_parqueadero`
--
ALTER TABLE `tbl_contrato_parqueadero`
  ADD PRIMARY KEY (`con_id`),
  ADD KEY `par_id` (`par_id`),
  ADD KEY `tcp_id` (`tcp_id`);

--
-- Indices de la tabla `tbl_estacion`
--
ALTER TABLE `tbl_estacion`
  ADD PRIMARY KEY (`est_id`),
  ADD KEY `tiv_id` (`tiv_id`),
  ADD KEY `par_id` (`par_id`);

--
-- Indices de la tabla `tbl_factura`
--
ALTER TABLE `tbl_factura`
  ADD PRIMARY KEY (`fac_id`),
  ADD KEY `pao_id` (`pao_id`);

--
-- Indices de la tabla `tbl_marca`
--
ALTER TABLE `tbl_marca`
  ADD PRIMARY KEY (`mar_id`),
  ADD UNIQUE KEY `mar_nombre` (`mar_nombre`);

--
-- Indices de la tabla `tbl_novedad`
--
ALTER TABLE `tbl_novedad`
  ADD PRIMARY KEY (`nov_id`),
  ADD KEY `usu_id` (`usu_id`);

--
-- Indices de la tabla `tbl_pago_contrato_parqueadero`
--
ALTER TABLE `tbl_pago_contrato_parqueadero`
  ADD PRIMARY KEY (`pcp_id`),
  ADD KEY `con_id` (`con_id`);

--
-- Indices de la tabla `tbl_parqueadero`
--
ALTER TABLE `tbl_parqueadero`
  ADD PRIMARY KEY (`par_id`),
  ADD UNIQUE KEY `par_nit` (`par_nit`);

--
-- Indices de la tabla `tbl_parqueadero_administrador`
--
ALTER TABLE `tbl_parqueadero_administrador`
  ADD PRIMARY KEY (`padm_id`),
  ADD KEY `par_id` (`par_id`),
  ADD KEY `usu_id` (`adm_id`);

--
-- Indices de la tabla `tbl_parqueadero_administrador_empleado`
--
ALTER TABLE `tbl_parqueadero_administrador_empleado`
  ADD PRIMARY KEY (`pae_id`),
  ADD KEY `pad_id` (`padm_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indices de la tabla `tbl_parqueo`
--
ALTER TABLE `tbl_parqueo`
  ADD PRIMARY KEY (`pao_id`),
  ADD KEY `est_id` (`est_id`),
  ADD KEY `vendedor_id` (`vendedor_id`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `veh_id` (`veh_id`);

--
-- Indices de la tabla `tbl_parqueo_estacion`
--
ALTER TABLE `tbl_parqueo_estacion`
  ADD PRIMARY KEY (`paes_id`),
  ADD KEY `est_id` (`est_id`),
  ADD KEY `pao_id` (`pao_id`);

--
-- Indices de la tabla `tbl_persona`
--
ALTER TABLE `tbl_persona`
  ADD PRIMARY KEY (`per_id`),
  ADD UNIQUE KEY `per_identificacion` (`per_identificacion`),
  ADD UNIQUE KEY `per_correo` (`per_correo`),
  ADD KEY `tip_id` (`tip_id`);

--
-- Indices de la tabla `tbl_rol`
--
ALTER TABLE `tbl_rol`
  ADD PRIMARY KEY (`rol_id`),
  ADD UNIQUE KEY `rol_nombre` (`rol_nombre`);

--
-- Indices de la tabla `tbl_tarifa`
--
ALTER TABLE `tbl_tarifa`
  ADD PRIMARY KEY (`tar_id`),
  ADD KEY `par_id` (`par_id`),
  ADD KEY `tiv_id` (`tiv_id`),
  ADD KEY `tiv_id_2` (`tiv_id`);

--
-- Indices de la tabla `tbl_tiempo_contrato_parqueadero`
--
ALTER TABLE `tbl_tiempo_contrato_parqueadero`
  ADD PRIMARY KEY (`tcp_id`);

--
-- Indices de la tabla `tbl_tipo_identificacion`
--
ALTER TABLE `tbl_tipo_identificacion`
  ADD PRIMARY KEY (`tip_id`),
  ADD UNIQUE KEY `tip_Nombre` (`tip_nombre`);

--
-- Indices de la tabla `tbl_tipo_vehiculo`
--
ALTER TABLE `tbl_tipo_vehiculo`
  ADD PRIMARY KEY (`tiv_id`),
  ADD UNIQUE KEY `tiv_nombre` (`tiv_nombre`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`usu_id`),
  ADD UNIQUE KEY `usu_usuario` (`usu_usuario`),
  ADD UNIQUE KEY `usu_portada` (`usu_portada`),
  ADD UNIQUE KEY `usu_avatar` (`usu_avatar`),
  ADD KEY `per_id` (`per_id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- Indices de la tabla `tbl_vehiculo`
--
ALTER TABLE `tbl_vehiculo`
  ADD PRIMARY KEY (`veh_id`),
  ADD UNIQUE KEY `veh_placa` (`veh_placa`),
  ADD KEY `mar_id` (`mar_id`),
  ADD KEY `tiv_id` (`tiv_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_camara`
--
ALTER TABLE `tbl_camara`
  MODIFY `cam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbl_contrato_parqueadero`
--
ALTER TABLE `tbl_contrato_parqueadero`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT de la tabla `tbl_estacion`
--
ALTER TABLE `tbl_estacion`
  MODIFY `est_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;
--
-- AUTO_INCREMENT de la tabla `tbl_factura`
--
ALTER TABLE `tbl_factura`
  MODIFY `fac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;
--
-- AUTO_INCREMENT de la tabla `tbl_marca`
--
ALTER TABLE `tbl_marca`
  MODIFY `mar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbl_novedad`
--
ALTER TABLE `tbl_novedad`
  MODIFY `nov_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_pago_contrato_parqueadero`
--
ALTER TABLE `tbl_pago_contrato_parqueadero`
  MODIFY `pcp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `tbl_parqueadero`
--
ALTER TABLE `tbl_parqueadero`
  MODIFY `par_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT de la tabla `tbl_parqueadero_administrador`
--
ALTER TABLE `tbl_parqueadero_administrador`
  MODIFY `padm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `tbl_parqueadero_administrador_empleado`
--
ALTER TABLE `tbl_parqueadero_administrador_empleado`
  MODIFY `pae_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbl_parqueo`
--
ALTER TABLE `tbl_parqueo`
  MODIFY `pao_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT de la tabla `tbl_parqueo_estacion`
--
ALTER TABLE `tbl_parqueo_estacion`
  MODIFY `paes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT de la tabla `tbl_persona`
--
ALTER TABLE `tbl_persona`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT de la tabla `tbl_rol`
--
ALTER TABLE `tbl_rol`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbl_tarifa`
--
ALTER TABLE `tbl_tarifa`
  MODIFY `tar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `tbl_tiempo_contrato_parqueadero`
--
ALTER TABLE `tbl_tiempo_contrato_parqueadero`
  MODIFY `tcp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbl_tipo_identificacion`
--
ALTER TABLE `tbl_tipo_identificacion`
  MODIFY `tip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbl_tipo_vehiculo`
--
ALTER TABLE `tbl_tipo_vehiculo`
  MODIFY `tiv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT de la tabla `tbl_vehiculo`
--
ALTER TABLE `tbl_vehiculo`
  MODIFY `veh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_camara`
--
ALTER TABLE `tbl_camara`
  ADD CONSTRAINT `fk_camara_parqueadero` FOREIGN KEY (`par_id`) REFERENCES `tbl_parqueadero` (`par_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_contrato_parqueadero`
--
ALTER TABLE `tbl_contrato_parqueadero`
  ADD CONSTRAINT `fk_contratoparqueadero_parqueadero` FOREIGN KEY (`par_id`) REFERENCES `tbl_parqueadero` (`par_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contratoparqueadero_tiempocontratoparqueadero` FOREIGN KEY (`tcp_id`) REFERENCES `tbl_tiempo_contrato_parqueadero` (`tcp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_estacion`
--
ALTER TABLE `tbl_estacion`
  ADD CONSTRAINT `fk_parqueadero_estacion` FOREIGN KEY (`par_id`) REFERENCES `tbl_parqueadero` (`par_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tipo_vehiculo_estacion` FOREIGN KEY (`tiv_id`) REFERENCES `tbl_tipo_vehiculo` (`tiv_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_factura`
--
ALTER TABLE `tbl_factura`
  ADD CONSTRAINT `fk_factura_parqueo` FOREIGN KEY (`pao_id`) REFERENCES `tbl_parqueo` (`pao_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_novedad`
--
ALTER TABLE `tbl_novedad`
  ADD CONSTRAINT `fk_usuario_novedad` FOREIGN KEY (`usu_id`) REFERENCES `tbl_usuario` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_pago_contrato_parqueadero`
--
ALTER TABLE `tbl_pago_contrato_parqueadero`
  ADD CONSTRAINT `fk_pagocontratoparqueadero_contratoparqueadero` FOREIGN KEY (`con_id`) REFERENCES `tbl_contrato_parqueadero` (`con_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_parqueadero_administrador`
--
ALTER TABLE `tbl_parqueadero_administrador`
  ADD CONSTRAINT `fk_parqueaderoadministrador_parqueadero` FOREIGN KEY (`par_id`) REFERENCES `tbl_parqueadero` (`par_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_parqueaderoadministrador_usuario` FOREIGN KEY (`adm_id`) REFERENCES `tbl_usuario` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_parqueadero_administrador_empleado`
--
ALTER TABLE `tbl_parqueadero_administrador_empleado`
  ADD CONSTRAINT `fk_parqueaderoempleado_parqueaderoadministrador` FOREIGN KEY (`padm_id`) REFERENCES `tbl_parqueadero_administrador` (`padm_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_parqueaderoempleado_usuario` FOREIGN KEY (`emp_id`) REFERENCES `tbl_usuario` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_parqueo`
--
ALTER TABLE `tbl_parqueo`
  ADD CONSTRAINT `fk_estacion_parqueo` FOREIGN KEY (`est_id`) REFERENCES `tbl_estacion` (`est_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_parqueo_usuario_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `tbl_usuario` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_parqueo_usuario_vendedor` FOREIGN KEY (`vendedor_id`) REFERENCES `tbl_usuario` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_parqueo_vehiculo` FOREIGN KEY (`veh_id`) REFERENCES `tbl_vehiculo` (`veh_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_parqueo_estacion`
--
ALTER TABLE `tbl_parqueo_estacion`
  ADD CONSTRAINT `fk_paes_est` FOREIGN KEY (`est_id`) REFERENCES `tbl_estacion` (`est_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_paes_pao` FOREIGN KEY (`pao_id`) REFERENCES `tbl_parqueo` (`pao_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `tbl_persona`
--
ALTER TABLE `tbl_persona`
  ADD CONSTRAINT `fk_persona_tipo_identificacion` FOREIGN KEY (`tip_id`) REFERENCES `tbl_tipo_identificacion` (`tip_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_tarifa`
--
ALTER TABLE `tbl_tarifa`
  ADD CONSTRAINT `fk_tarifa_parqueadero` FOREIGN KEY (`par_id`) REFERENCES `tbl_parqueadero` (`par_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tarifa_tipo_vehiculo` FOREIGN KEY (`tiv_id`) REFERENCES `tbl_tipo_vehiculo` (`tiv_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD CONSTRAINT `fk_usuario_persona` FOREIGN KEY (`per_id`) REFERENCES `tbl_persona` (`per_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`rol_id`) REFERENCES `tbl_rol` (`rol_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_vehiculo`
--
ALTER TABLE `tbl_vehiculo`
  ADD CONSTRAINT `fk_vehiculo_marca` FOREIGN KEY (`mar_id`) REFERENCES `tbl_marca` (`mar_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vehiculo_tipo_vehiculo` FOREIGN KEY (`tiv_id`) REFERENCES `tbl_tipo_vehiculo` (`tiv_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
