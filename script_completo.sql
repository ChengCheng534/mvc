-- MySQL dump 10.13  Distrib 8.0.39, for Win64 (x86_64)
--
-- Host: localhost    Database: concesionario
-- ------------------------------------------------------
-- Server version	8.0.39

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alquiler`
--

DROP TABLE IF EXISTS `alquiler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alquiler` (
  `ALQUILER_ID` int NOT NULL AUTO_INCREMENT,
  `CLIENTE_ID` int NOT NULL,
  `MATRICULA` char(7) COLLATE utf8mb4_general_ci NOT NULL,
  `LUGAR_RECOGIDA` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `FECHA_RECOGIDA` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `FECHA_DEVOLUCION` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `PRECIO` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`ALQUILER_ID`),
  KEY `CLIENTE_ID` (`CLIENTE_ID`),
  KEY `MATRICULA` (`MATRICULA`),
  CONSTRAINT `alquiler_ibfk_1` FOREIGN KEY (`CLIENTE_ID`) REFERENCES `cliente` (`cliente_id`),
  CONSTRAINT `alquiler_ibfk_2` FOREIGN KEY (`MATRICULA`) REFERENCES `vehiculo` (`MATRICULA`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alquiler`
--

LOCK TABLES `alquiler` WRITE;
/*!40000 ALTER TABLE `alquiler` DISABLE KEYS */;
INSERT INTO `alquiler` VALUES (1,2,'1234ASA','Aeropuerto','2025-02-20','2025-02-25',150.00);
/*!40000 ALTER TABLE `alquiler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `cliente_id` int NOT NULL AUTO_INCREMENT,
  `documento_identidad` char(9) COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefono` int DEFAULT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha_nacimiento` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fotografia` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `login` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`cliente_id`),
  UNIQUE KEY `documento_identidad` (`documento_identidad`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (2,'I2141346B','Juan','Perez Galde','luislopez@gmail.com',213123,'calle benito','2025-01-03','imagen.jpg','',''),(7,'X7834782N','hola','Lopez Martin','carmenpez@gmail.com',333999999,'calle hola','2025-01-03','mclaren.png','',''),(11,'I2134612B','Angela','celalla','yushen740@gmail.com',999999999,'calle hola','2025-02-14','','',''),(12,'X8355111X','asoidn','asfdsa','luislopez@gmail.com',234324232,'calle benito','2025-02-01','galaxia.jpg','',''),(13,'A1234567B','ChengCheng','Yu','chengyu@gmail.com',123456789,'Calle Falsa 123','2000-02-21',NULL,'chengyu','$2y$12$DFJP.7cSJPDWGh1EcFBAJucaPIdALYIdNwKLRHGNApxjZLbPBAdBe');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `idiomas`
--

DROP TABLE IF EXISTS `idiomas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `idiomas` (
  `ESPAÑOL` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `INGLES` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `CATALAN` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `EUSKERA` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `idiomas`
--

LOCK TABLES `idiomas` WRITE;
/*!40000 ALTER TABLE `idiomas` DISABLE KEYS */;
INSERT INTO `idiomas` VALUES ('alta','high','alta','altu'),('baja','low','baixa','behera'),('modificación','modification','modificació','aldaketa'),('consulta','query','consulta','kontsulta'),('listado','list','llistat','zerrenda'),('ayuda','help','ajuda','laguntza'),('idioma','language','idioma','hizkuntza'),('moneda','currency','moneda','moneta');
/*!40000 ALTER TABLE `idiomas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `APELLIDOS` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `FECHA_DE_NACIMIENTO` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `LOGIN` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `PASSWORD` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `GRUPO` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `LOGIN` (`LOGIN`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'JUAN','PÉREZ GARCIA','1999-05-15','JUANPEREZ','$2y$12$1YgZPorc8zgzJBHdFnER2OQV.Pds0OXsiAzw2EomaKErRL2frcK5W','ADMIN'),(2,'ANA','GARCÍA LÓPEZ','1985-11-20','ANAGARCIA','$2y$12$0sSA4zqTAlgbW2VJ5oYta.UdNAUo6Yn.qevwjy35IUA6tQKmbo78O','USUARIO'),(3,'LUIS','LÓPEZ SÁNCHEZ','1992-02-10','LUISLOPEZ','$2y$12$zSQbYZH/kM5ITJOtITK8fOLVWfRuCLWx82CEs7zQnUXwyoiBqzrDu','USUARIO'),(4,'JAVIER','LÓPEZ GARCIA','1991-08-12','JAVIERLOPEZ','$2y$10$FVx3zLAcjKOINYn7oCJsSOao49G7nkJPNKiZV/rvGy6kkFjgDAEqG','USUARIO'),(5,'JORGE','MARTINEZ GARCIA','1994-11-12','JORGEMARTINEZ','$2y$10$5/WcOIfD/CG96DnvIXBam.7QkIMdtLMrsIFFW6IPApZfvQuiFL5zm','USUARIO'),(7,'JORGE','MARTINEZ GARCIA','1994-11-12','JORGEMARTIWEZ','$2y$10$MDyb7z0VVN1GE8Ah2v2/Se0g3Q8OYmUOAq54z.jyMKeOIW05fATYq','USUARIO');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculo`
--

DROP TABLE IF EXISTS `vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehiculo` (
  `MATRICULA` char(7) COLLATE utf8mb4_general_ci NOT NULL,
  `MARCA` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `MODELO` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `POTENCIA` int DEFAULT NULL,
  `VELOCIDAD_MAX` int DEFAULT NULL,
  `IMAGEN` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`MATRICULA`),
  UNIQUE KEY `MATRICULA` (`MATRICULA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculo`
--

LOCK TABLES `vehiculo` WRITE;
/*!40000 ALTER TABLE `vehiculo` DISABLE KEYS */;
INSERT INTO `vehiculo` VALUES ('1234ASA','BMW','wqe',123,123,'caja.png'),('1234ASX','BMW','',1,1,'estrella.png'),('1234LHH','BMW','M4',200,320,'titulo.png'),('1255ASD','BMW','M4',0,0,'titulo.png'),('7777ASA','BMW','M1',210,320,'Porsche.jpg');
/*!40000 ALTER TABLE `vehiculo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-21 21:44:55
