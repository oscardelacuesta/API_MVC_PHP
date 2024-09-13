-- Crear la base de datos
CREATE DATABASE refranes CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

-- Usar la base de datos
USE refranes;

-- Crear la tabla de refranes
CREATE TABLE `refranes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `autor` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `frase` text NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `idioma` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `es_admin` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `frase` (`frase`) USING HASH
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
