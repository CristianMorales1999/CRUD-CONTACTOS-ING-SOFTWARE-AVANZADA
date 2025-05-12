-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2025 a las 14:00:22
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
-- Base de datos: `almacen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `servicio` varchar(30) NOT NULL,
  `consulta` longtext NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `nombre`, `email`, `telefono`, `servicio`, `consulta`, `fecha`) VALUES
(1, 'María Pérez', 'maria.perez@gmail.com', '998765432', 'Información General', '¿Cuáles son los servicios disponibles?', '2025-05-12 13:29:23'),
(2, 'José López', 'jose.lopez@outlook.com', '912345678', 'TI', '¿Cómo puedo acceder a soporte técnico?', '2025-05-12 13:30:13'),
(3, 'Ana Torres', 'ana.torres@yahoo.com', '987654321', 'Teléfono', '¿Cuánto cuesta una línea nueva?', '2025-05-12 13:31:03'),
(4, 'Juan Ramos', 'juan.ramos@gmail.com', '956789012', 'TI', '¿Pueden ayudarme con mi conexión lenta?', '2025-05-12 13:31:45'),
(5, 'Laura Sánchez', 'laura.sanchez@hotmail.com', '954321789', 'Información General', '¿Cuáles son los horarios de atención?', '2025-05-12 13:33:21'),
(6, 'Pedro Castillo', 'pedro.castillo@gmail.com', '999112233', 'TI', '¿Pueden configurar mi router?', '2025-05-12 13:34:04'),
(7, 'Rosa Díaz', 'rosa.diaz@outlook.com', '911223344', 'Teléfono', '¿Cómo cambio mi plan de llamadas?', '2025-05-12 13:34:49'),
(8, 'Andrés García', 'andres.garcia@gmail.com', '998877665', 'Información General', '¿Qué servicios ofrecen para empresas?', '2025-05-12 13:36:08'),
(9, 'Lucía Fernández', 'lucia.fernandez@yahoo.com', '966554433', 'TI', '¿Cómo puedo mejorar la seguridad de mi red?', '2025-05-12 13:36:42'),
(10, 'Diego Romero', 'diego.romero@gmail.com', '933221144', 'Teléfono', '¿Hay promociones en líneas nuevas?', '2025-05-12 13:37:07'),
(11, 'Carla Herrera', 'carla.herrera@hotmail.com', '988776655', 'Información General', '¿Puedo hacer una cita para atención presencial?', '2025-05-12 13:37:33'),
(12, 'Miguel Vargas', 'miguel.vargas@outlook.com', '921234567', 'TI', '¿Cómo puedo optimizar el rendimiento de mi servidor?', '2025-05-12 13:37:59'),
(13, 'Isabel Medina', 'isabel.medina@gmail.com', '987123456', 'Teléfono', '¿Puedo transferir mi número a otra operadora?', '2025-05-12 13:38:33'),
(14, 'Fernando Rojas', 'fernando.rojas@yahoo.com', '965432198', 'Información General', '¿Cómo funciona el sistema de fidelidad?', '2025-05-12 13:39:13'),
(15, 'Patricia Castro', 'patricia.castro@gmail.com', '912345987', 'TI', '¿Ofrecen servicios de mantenimiento preventivo?', '2025-05-12 13:39:44'),
(16, 'Raúl Salinas', 'raul.salinas@gmail.com', '953214789', 'Teléfono', '¿Puedo agregar líneas adicionales a mi plan?', '2025-05-12 13:40:16'),
(17, 'Andrea Vargas', 'andrea.vargas@hotmail.com', '998877123', 'Información General', '¿Cómo puedo actualizar mis datos de contacto?', '2025-05-12 13:40:44'),
(18, 'David Castillo', 'david.castillo@gmail.com', '921234111', 'TI', '¿Pueden ayudarme con un problema de conexión remota?', '2025-05-12 13:41:12'),
(19, 'Sofía Morales', 'sofia.morales@yahoo.com', '988654321', 'Teléfono', '¿Cómo cambio mi plan de llamadas?', '2025-05-12 13:41:38'),
(20, 'Javier Jiménez', 'javier.jimenez@gmail.com', '955667788', 'Información General', '¿Ofrecen atención personalizada para empresas?', '2025-05-12 13:42:12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
