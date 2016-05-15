-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 26, 2016 at 09:38 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: finca
--

-- --------------------------------------------------------

--
-- Table structure for table Bono
--

CREATE TABLE IF NOT EXISTS Bono (
  id int(11) NOT NULL,
  titulo varchar(50) DEFAULT NULL,
  monto float DEFAULT NULL,
  estado int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table descripcion_planilla
--

CREATE TABLE IF NOT EXISTS descripcion_planilla (
  id int(11) NOT NULL,
  planilla int(11) DEFAULT NULL,
  usuario int(11) DEFAULT NULL,
  monto float DEFAULT NULL,
  creado timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  creador varchar(50) DEFAULT NULL,
  estado int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table descripcion_planilla
--

INSERT INTO descripcion_planilla (id, planilla, usuario, monto, creado, creador, estado) VALUES
(1, 2, 19940800, 5000, '2016-03-26 06:42:31', 'j', 1),
(2, 2, 19940802, 5000, '2016-03-26 06:42:31', 'j', 1),
(3, 2, 19940805, 5000, '2016-03-26 06:42:31', 'j', 1),
(4, 3, 19940803, 0, '2016-03-26 06:43:18', 'j', 1),
(5, 4, 19940803, 0, '2016-03-26 06:49:06', 'j', 1),
(6, 5, 19940803, 0, '2016-03-26 06:50:15', 'j', 1),
(7, 6, 19940803, 0, '2016-03-26 06:53:03', 'j', 1),
(8, 7, 19940803, 0, '2016-03-26 06:53:41', 'j', 1),
(9, 10, 19940803, 56.9, '2016-03-26 18:19:04', 'j', 1),
(10, 11, 19940803, 450, '2016-03-26 18:21:01', 'j', 1),
(11, 12, 19940800, 5000, '2016-03-26 18:25:23', 'j', 1),
(12, 12, 19940802, 5000, '2016-03-26 18:25:23', 'j', 1),
(13, 12, 19940805, 5000, '2016-03-26 18:25:23', 'j', 1),
(14, 13, 19940803, 450, '2016-03-26 19:33:34', 'j', 1),
(15, 13, 19940806, 450, '2016-03-26 19:33:34', 'j', 1),
(16, 14, 19940803, 450, '2016-03-26 19:43:28', 'j', 1),
(17, 14, 19940806, 450, '2016-03-26 19:43:28', 'j', 1),
(18, 14, 19940809, 0, '2016-03-26 19:43:28', 'j', 1);

-- --------------------------------------------------------

--
-- Table structure for table jornada
--

CREATE TABLE IF NOT EXISTS jornada (
  id int(11) NOT NULL,
  titulo varchar(50) DEFAULT NULL,
  inicia varchar(20) DEFAULT NULL,
  finaliza varchar(20) DEFAULT NULL,
  incremento_valor_hora float DEFAULT NULL,
  estado int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table jornada
--

INSERT INTO jornada (id, titulo, inicia, finaliza, incremento_valor_hora, estado) VALUES
(1, 'matutina', '06:00:00 AM', '03:00:00 PM', 1.5, 1),
(2, 'vespertina', '02:00:00 PM', '09:00:00 PM', 2.5, 1),
(3, 'nocturna', '05:00:00 AM', '11:00:00 Pm', 2.5, 1);

-- --------------------------------------------------------

--
-- Table structure for table marcaje
--

CREATE TABLE IF NOT EXISTS marcaje (
  id int(11) NOT NULL,
  usuario int(11) NOT NULL,
  inicio timestamp NULL DEFAULT NULL,
  fin timestamp NULL DEFAULT NULL,
  estado int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table marcaje
--

INSERT INTO marcaje (id, usuario, inicio, fin, estado) VALUES
(3, 19940800, '2016-03-25 12:42:45', '2016-03-26 00:42:45', 1),
(10, 19940800, '2016-03-26 12:42:45', '2016-03-27 02:42:45', 1),
(12, 19940802, '2016-03-25 09:42:45', '2016-03-26 03:00:00', 1),
(14, 19940803, '2016-03-25 12:42:45', '2016-03-25 21:42:45', 1),
(18, 19940806, '2016-03-25 12:42:45', '2016-03-25 21:42:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table planilla
--

CREATE TABLE IF NOT EXISTS planilla (
  id int(11) NOT NULL,
  titulo varchar(50) DEFAULT NULL,
  momento timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  autorizo varchar(50) DEFAULT NULL,
  estado int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table planilla
--

INSERT INTO planilla (id, titulo, momento, autorizo, estado) VALUES
(1, 'enero', '2016-03-26 06:41:47', 'j', 1),
(2, 'febrero', '2016-03-26 06:42:31', 'j', 1),
(3, 'marzo', '2016-03-26 06:43:18', 'j', 1),
(4, 'abril', '2016-03-26 06:49:06', 'j', 1),
(5, 'mayo', '2016-03-26 06:50:15', 'j', 1),
(6, 'junio', '2016-03-26 06:53:03', 'j', 1),
(7, 'dfasd', '2016-03-26 06:53:41', 'j', 1),
(8, 'junio', '2016-03-26 18:16:22', 'j', 1),
(9, 'dfd', '2016-03-26 18:17:12', 'j', 1),
(10, 'octubre', '2016-03-26 18:19:04', 'j', 1),
(11, 'noviembre', '2016-03-26 18:21:01', 'j', 1),
(12, 'noviembre', '2016-03-26 18:25:23', 'j', 1),
(13, 'diciembre', '2016-03-26 19:33:34', 'j', 1),
(14, 'enero2016', '2016-03-26 19:43:28', 'j', 1);

-- --------------------------------------------------------

--
-- Table structure for table puesto_bono
--

CREATE TABLE IF NOT EXISTS puesto_bono (
  tipo int(11) NOT NULL,
  bono int(11) NOT NULL,
  monto float DEFAULT NULL,
  estado int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table tipo_marcaje
--

CREATE TABLE IF NOT EXISTS tipo_marcaje (
  id int(11) NOT NULL,
  titulo varchar(40) DEFAULT NULL,
  estado int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table tipo_marcaje
--

INSERT INTO tipo_marcaje (id, titulo, estado) VALUES
(1, 'entrada', 1),
(2, 'salida', 1);

-- --------------------------------------------------------

--
-- Table structure for table tipo_puesto
--

CREATE TABLE IF NOT EXISTS tipo_puesto (
  id int(11) NOT NULL,
  titulo varchar(50) DEFAULT NULL,
  valor_hora float DEFAULT NULL,
  salario float DEFAULT NULL,
  estado int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table tipo_puesto
--

INSERT INTO tipo_puesto (id, titulo, valor_hora, salario, estado) VALUES
(1, 'Programador', 0, 5000, 1),
(8, 'manager2', 5.5, 7.78, 1),
(9, 'jornalero', 50, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table Usuario
--

CREATE TABLE IF NOT EXISTS Usuario (
  id int(11) NOT NULL,
  tipo int(11) DEFAULT NULL,
  jornada int(11) DEFAULT NULL,
  nombre varchar(50) DEFAULT NULL,
  apellido varchar(50) DEFAULT NULL,
  ingreso timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  estado int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19940810 DEFAULT CHARSET=latin1;

--
-- Dumping data for table Usuario
--

INSERT INTO Usuario (id, tipo, jornada, nombre, apellido, ingreso, estado) VALUES
(19940800, 1, 1, 'Javier', 'morales', '2016-03-25 06:42:45', 1),
(19940801, 8, 2, 'Franck', 'xavier', '2016-03-25 16:31:53', 1),
(19940802, 1, 1, 'leo', 'messi', '2016-03-25 16:36:46', 1),
(19940803, 9, 1, 'franck', 'ribery', '2016-03-25 17:52:31', 1),
(19940805, 1, 1, 'ney', 'jr', '2016-03-25 20:06:21', 1),
(19940806, 9, 1, 'Steve', 'jobs', '2016-03-26 19:23:59', 1),
(19940807, 1, 1, 'Claudio ', 'Bravo', '2016-03-26 19:38:52', 1),
(19940808, 1, 1, 'Ter', 'Stegen', '2016-03-26 19:39:22', 1),
(19940809, 9, 1, 'Juan', 'Diaz', '2016-03-26 19:43:14', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table Bono
--
ALTER TABLE Bono
  ADD PRIMARY KEY (id);

--
-- Indexes for table descripcion_planilla
--
ALTER TABLE descripcion_planilla
  ADD PRIMARY KEY (id),
  ADD KEY IX_Relationship9 (usuario),
  ADD KEY IX_Relationship11 (planilla);

--
-- Indexes for table jornada
--
ALTER TABLE jornada
  ADD PRIMARY KEY (id);

--
-- Indexes for table marcaje
--
ALTER TABLE marcaje
  ADD PRIMARY KEY (id,usuario),
  ADD KEY Relationship2 (usuario);

--
-- Indexes for table planilla
--
ALTER TABLE planilla
  ADD PRIMARY KEY (id);

--
-- Indexes for table puesto_bono
--
ALTER TABLE puesto_bono
  ADD PRIMARY KEY (tipo,bono),
  ADD KEY Relationship13 (bono);

--
-- Indexes for table tipo_marcaje
--
ALTER TABLE tipo_marcaje
  ADD PRIMARY KEY (id);

--
-- Indexes for table tipo_puesto
--
ALTER TABLE tipo_puesto
  ADD PRIMARY KEY (id);

--
-- Indexes for table Usuario
--
ALTER TABLE Usuario
  ADD PRIMARY KEY (id),
  ADD KEY IX_Relationship6 (tipo),
  ADD KEY IX_Relationship7 (jornada);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table Bono
--
ALTER TABLE Bono
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table descripcion_planilla
--
ALTER TABLE descripcion_planilla
  MODIFY id int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table jornada
--
ALTER TABLE jornada
  MODIFY id int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table marcaje
--
ALTER TABLE marcaje
  MODIFY id int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table planilla
--
ALTER TABLE planilla
  MODIFY id int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table tipo_marcaje
--
ALTER TABLE tipo_marcaje
  MODIFY id int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table tipo_puesto
--
ALTER TABLE tipo_puesto
  MODIFY id int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table Usuario
--
ALTER TABLE Usuario
  MODIFY id int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19940810;
--
-- Constraints for dumped tables
--

--
-- Constraints for table descripcion_planilla
--
ALTER TABLE descripcion_planilla
  ADD CONSTRAINT Relationship11 FOREIGN KEY (planilla) REFERENCES planilla (id),
  ADD CONSTRAINT Relationship9 FOREIGN KEY (usuario) REFERENCES Usuario (id);

--
-- Constraints for table marcaje
--
ALTER TABLE marcaje
  ADD CONSTRAINT Relationship2 FOREIGN KEY (usuario) REFERENCES Usuario (id);

--
-- Constraints for table puesto_bono
--
ALTER TABLE puesto_bono
  ADD CONSTRAINT Relationship12 FOREIGN KEY (tipo) REFERENCES tipo_puesto (id),
  ADD CONSTRAINT Relationship13 FOREIGN KEY (bono) REFERENCES Bono (id);

--
-- Constraints for table Usuario
--
ALTER TABLE Usuario
  ADD CONSTRAINT Relationship6 FOREIGN KEY (tipo) REFERENCES tipo_puesto (id),
  ADD CONSTRAINT Relationship7 FOREIGN KEY (jornada) REFERENCES jornada (id);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
