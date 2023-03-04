-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 02, 2023 at 09:55 AM
-- Server version: 5.6.41
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `APP_PRUEBA`
--

-- --------------------------------------------------------

--
-- Table structure for table `propiedades`
--

CREATE TABLE IF NOT EXISTS `propiedades` (
  `id` int(11) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `VALOR` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `propiedades`
--

INSERT INTO `propiedades` (`id`, `NOMBRE`, `VALOR`) VALUES
(1, 'TIMEOUT_SESSION', '10');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario` varchar(50) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `clave` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `nombre`, `clave`) VALUES
('a5', 'bb54554577', '92eb5ffee6ae2fec3ad71c777531578f'),
('a8', 'bb888888777', 'setas888777'),
('aa', 'aaaaaaaaaaaaaaa77', '21ad0bd836b90d08f4cf640b4c298e7c'),
('aaaa', 'aaaa', '65ba841e01d6db7733e90a5b7f9e6f80'),
('ee', 'ee777', '202cb962ac59075b964b07152d234b70'),
('eeee', 'eeee', '202cb962ac59075b964b07152d234b70'),
('persona1', 'Persona 12999', '4d186321c1a7f0f354b297e8914ab240'),
('toto', '66666777', 'f71dbe52628a3f83a77ab494817525c6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `propiedades`
--
ALTER TABLE `propiedades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `propiedades`
--
ALTER TABLE `propiedades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
