-- MySQL dump 10.13  Distrib 5.7.35, for Linux (x86_64)
--
-- Host: localhost    Database: test
-- ------------------------------------------------------
-- Server version	5.7.35

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alumnoAnotaGrupo`
--

DROP TABLE IF EXISTS `alumnoAnotaGrupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumnoAnotaGrupo` (
  `userId` varchar(8) NOT NULL,
  `nombreGrupo` varchar(3) NOT NULL,
  `aprovado` enum('false','true') NOT NULL,
  PRIMARY KEY (`userId`,`nombreGrupo`),
  CONSTRAINT `alumnoanotagrupo_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnoAnotaGrupo`
--

LOCK TABLES `alumnoAnotaGrupo` WRITE;
/*!40000 ALTER TABLE `alumnoAnotaGrupo` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumnoAnotaGrupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asignatura`
--

DROP TABLE IF EXISTS `asignatura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asignatura` (
  `nombreAsignatura` varchar(15) NOT NULL,
  PRIMARY KEY (`nombreAsignatura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignatura`
--

LOCK TABLES `asignatura` WRITE;
/*!40000 ALTER TABLE `asignatura` DISABLE KEYS */;
INSERT INTO `asignatura` VALUES ('ADA'),('Apt1'),('Apt2'),('BBDD1'),('BBDD2'),('Diseoweb1'),('Diseoweb2'),('Electronica'),('Filosofia'),('Geometria1'),('Geometria2'),('Ingles1'),('Ingles2'),('Ingles3'),('Logica'),('Matematica1'),('Matematica3'),('Matimatica2'),('Programacion1'),('Programacion2'),('Programacion3'),('Proyecto'),('SO1'),('SO2'),('SO3'),('Sociologia'),('Taller1'),('Taller2');
/*!40000 ALTER TABLE `asignatura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat` (
  `chatId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` varchar(8) NOT NULL,
  `nombreAsignatura` varchar(15) NOT NULL,
  `fecha` datetime NOT NULL,
  `resuelto` enum('false','true') NOT NULL,
  PRIMARY KEY (`chatId`),
  KEY `nombreAsignatura` (`nombreAsignatura`),
  KEY `userId` (`userId`),
  CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`nombreAsignatura`) REFERENCES `asignatura` (`nombreAsignatura`),
  CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat`
--

LOCK TABLES `chat` WRITE;
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consulta`
--

DROP TABLE IF EXISTS `consulta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consulta` (
  `consultaId` int(11) NOT NULL AUTO_INCREMENT,
  `consultaTitulo` varchar(70) NOT NULL,
  `consultaDescripcion` varchar(500) DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `resuelto` enum('false','true') NOT NULL,
  `alumnoId` varchar(8) DEFAULT NULL,
  `nombreAsignatura` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`consultaId`),
  KEY `nombreAsignatura` (`nombreAsignatura`),
  KEY `alumnoId` (`alumnoId`),
  CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`nombreAsignatura`) REFERENCES `asignatura` (`nombreAsignatura`),
  CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`alumnoId`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consulta`
--

LOCK TABLES `consulta` WRITE;
/*!40000 ALTER TABLE `consulta` DISABLE KEYS */;
INSERT INTO `consulta` VALUES (1,'dasdas','dqeeqw','2021-11-01 03:39:05','false','11111111',NULL),(2,'1123123','','2021-11-01 16:10:49','false','11111111',NULL),(3,'333','','2021-11-01 16:10:52','false','11111111',NULL);
/*!40000 ALTER TABLE `consulta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `docenteAnotaAsignatura`
--

DROP TABLE IF EXISTS `docenteAnotaAsignatura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `docenteAnotaAsignatura` (
  `userId` varchar(8) NOT NULL,
  `nombreAsignatura` varchar(15) NOT NULL,
  `aprovado` enum('false','true') NOT NULL,
  PRIMARY KEY (`userId`,`nombreAsignatura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docenteAnotaAsignatura`
--

LOCK TABLES `docenteAnotaAsignatura` WRITE;
/*!40000 ALTER TABLE `docenteAnotaAsignatura` DISABLE KEYS */;
INSERT INTO `docenteAnotaAsignatura` VALUES ('22222222','ADA','false'),('22222222','Apt1','false'),('22222222','Apt2','false'),('22222222','BBDD1','false'),('22222222','BBDD2','false'),('22222222','Diseoweb1','false'),('22222222','Diseoweb2','false');
/*!40000 ALTER TABLE `docenteAnotaAsignatura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupo`
--

DROP TABLE IF EXISTS `grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupo` (
  `nombreGrupo` varchar(3) NOT NULL,
  PRIMARY KEY (`nombreGrupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo`
--

LOCK TABLES `grupo` WRITE;
/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
INSERT INTO `grupo` VALUES ('1BD'),('1BF'),('2BD'),('2BF'),('3BB');
/*!40000 ALTER TABLE `grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupoTieneAsignatura`
--

DROP TABLE IF EXISTS `grupoTieneAsignatura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupoTieneAsignatura` (
  `nombreGrupo` varchar(3) NOT NULL,
  `nombreAsignatura` varchar(15) NOT NULL,
  `userId` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`nombreGrupo`,`nombreAsignatura`),
  KEY `userId` (`userId`),
  CONSTRAINT `grupotieneasignatura_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupoTieneAsignatura`
--

LOCK TABLES `grupoTieneAsignatura` WRITE;
/*!40000 ALTER TABLE `grupoTieneAsignatura` DISABLE KEYS */;
INSERT INTO `grupoTieneAsignatura` VALUES ('1BD','Apt1',NULL),('1BD','Geometria1',NULL),('1BD','Ingles1',NULL),('1BD','Logica',NULL),('1BD','Matematica1',NULL),('1BD','Programacion1',NULL),('1BD','SO1',NULL),('1BD','Taller1',NULL),('1BF','Apt1',NULL),('1BF','Geometria1',NULL),('1BF','Ingles1',NULL),('1BF','Logica',NULL),('1BF','Matematica1',NULL),('1BF','Programacion1',NULL),('1BF','SO1',NULL),('1BF','Taller1',NULL),('2BD','Apt2',NULL),('2BD','BBDD1',NULL),('2BD','Diseoweb1',NULL),('2BD','Electronica',NULL),('2BD','Geometria2',NULL),('2BD','Ingles2',NULL),('2BD','Matimatica2',NULL),('2BD','Programacion1',NULL),('2BD','SO2',NULL),('2BD','Taller2',NULL),('2BF','Apt2',NULL),('2BF','BBDD1',NULL),('2BF','Diseoweb1',NULL),('2BF','Electronica',NULL),('2BF','Geometria2',NULL),('2BF','Ingles2',NULL),('2BF','Matimatica2',NULL),('2BF','Programacion1',NULL),('2BF','SO2',NULL),('2BF','Taller2',NULL),('3BB','ADA',NULL),('3BB','BBDD2',NULL),('3BB','Diseoweb2',NULL),('3BB','Filosofia',NULL),('3BB','Ingles3',NULL),('3BB','Matematica3',NULL),('3BB','Programacion3',NULL),('3BB','Proyecto',NULL),('3BB','SO3',NULL),('3BB','Sociologia',NULL);
/*!40000 ALTER TABLE `grupoTieneAsignatura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `userId` varchar(8) NOT NULL,
  `fechaLogIn` datetime NOT NULL,
  `fechaLogOut` datetime NOT NULL,
  PRIMARY KEY (`userId`),
  CONSTRAINT `login_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensaje`
--

DROP TABLE IF EXISTS `mensaje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mensaje` (
  `mensajeId` int(11) NOT NULL AUTO_INCREMENT,
  `chatId` int(11) NOT NULL,
  `userId` varchar(8) NOT NULL,
  `fecha` datetime NOT NULL,
  `contenido` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`mensajeId`),
  KEY `userId` (`userId`),
  KEY `chatId` (`chatId`),
  CONSTRAINT `mensaje_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`),
  CONSTRAINT `mensaje_ibfk_2` FOREIGN KEY (`chatId`) REFERENCES `chat` (`chatId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensaje`
--

LOCK TABLES `mensaje` WRITE;
/*!40000 ALTER TABLE `mensaje` DISABLE KEYS */;
/*!40000 ALTER TABLE `mensaje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respuesta`
--

DROP TABLE IF EXISTS `respuesta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respuesta` (
  `respuestaId` int(11) NOT NULL AUTO_INCREMENT,
  `respuestaContenido` varchar(500) DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `userId` varchar(8) DEFAULT NULL,
  `consultaId` int(11) DEFAULT NULL,
  PRIMARY KEY (`respuestaId`),
  KEY `consultaId` (`consultaId`),
  KEY `userId` (`userId`),
  CONSTRAINT `respuesta_ibfk_1` FOREIGN KEY (`consultaId`) REFERENCES `consulta` (`consultaId`),
  CONSTRAINT `respuesta_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respuesta`
--

LOCK TABLES `respuesta` WRITE;
/*!40000 ALTER TABLE `respuesta` DISABLE KEYS */;
/*!40000 ALTER TABLE `respuesta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` varchar(8) NOT NULL,
  `passwordhash` varchar(255) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `avatar` tinyint(4) NOT NULL,
  `aprovado` enum('false','true') NOT NULL,
  `tipodeusuario` enum('alumno','docente','admin') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('11111111','$2y$10$uSXwQpcdGmIqN2E5OwOa1eNfchPf0TWSBRVuJASI8P2yFrOSscJBW','Pepe','Poroto','pepe@gmail.com',6,'true','alumno'),('22222222','$2y$10$PtbDOX1LoaqltTVClejeXuHXrBhKChv7BaCa25ieuTVzSbNEWeKUu','Docentr','Test','pepe@gmail.com',8,'true','docente'),('33333331','$2y$10$Jo7Ty1OgimbK24hUX/03K.zuMVEoa2s/stnuunrhOn4oB3NUUZfxC','Docente','Test2','pepe@gmail.com',5,'false','docente'),('33333333','$2y$10$5eISQaZ/VOwm8yk1Cj4JZ.EIcbmJHk27XlwTrbSQANiVyY0V/CTL2','Admin','Test','pepe@gmail.com',4,'true','admin'),('66666666','$2y$10$xkSgA8OvAeR0FNo0ppK30eSjPKMlcpaW2Bitp1OVaKit//mOZw7hO','Alumno','Test','pepe@gmail.com',5,'false','alumno');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-01 22:51:07
