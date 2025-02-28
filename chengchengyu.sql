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
-- Eliminar la base de datos si existe
DROP DATABASE IF EXISTS concesionario;

-- Crear la base de datos nuevamente
CREATE DATABASE concesionario;

-- Usar la base de datos recién creada
USE concesionario;

DROP TABLE IF EXISTS `alquiler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alquiler` (
  `ALQUILER_ID` int NOT NULL AUTO_INCREMENT,
  `CLIENTE_ID` int NOT NULL,
  `MATRICULA` char(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `LUGAR_RECOGIDA` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `FECHA_RECOGIDA` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `FECHA_DEVOLUCION` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `PRECIO` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`ALQUILER_ID`),
  KEY `CLIENTE_ID` (`CLIENTE_ID`),
  KEY `MATRICULA` (`MATRICULA`),
  CONSTRAINT `alquiler_ibfk_1` FOREIGN KEY (`CLIENTE_ID`) REFERENCES `cliente` (`cliente_id`),
  CONSTRAINT `alquiler_ibfk_2` FOREIGN KEY (`MATRICULA`) REFERENCES `vehiculo` (`MATRICULA`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alquiler`
--

LOCK TABLES `alquiler` WRITE;
/*!40000 ALTER TABLE `alquiler` DISABLE KEYS */;
INSERT INTO `alquiler` VALUES (1,2,'1234ASA','Aeropuerto','2025-02-20','2025-02-25',150.00),(2,13,'1234ASX','','2025-02-23','2025-02-24',150.45),(3,13,'7777ASA','','2025-03-09','2025-03-23',1957.50),(6,13,'1234LHH','','2025-03-19','2025-03-22',516.00),(7,13,'4390JKL','Gran Via','2025-02-28','2025-03-01',169.00),(8,13,'7777ASA','','2025-03-29','2025-03-30',261.00),(9,13,'1255ASD','','2025-03-02','2025-03-09',1128.00),(10,13,'4390JKL','','2025-03-09','2025-03-13',422.50),(11,13,'4390JKL','','2025-03-09','2025-03-13',422.50),(12,13,'1234ASX','','2025-03-08','2025-03-12',630.00),(13,13,'1234LHH','','2025-03-23','2025-04-04',1066.00),(14,13,'1234LHH','','2025-03-23','2025-04-04',1066.00),(15,13,'1234LHH','','2025-03-23','2025-04-04',1066.00),(16,13,'1234LHH','','2025-03-23','2025-04-04',1066.00),(17,13,'1234LHH','','2025-03-23','2025-04-04',1066.00),(18,13,'1234LHH','','2025-03-23','2025-04-04',1066.00),(19,13,'1234LHH','','2025-03-23','2025-04-04',1066.00),(20,13,'1234LHH','','2025-03-23','2025-04-04',1066.00),(21,13,'1234LHH','','2025-03-23','2025-04-04',1066.00),(22,13,'1255ASD','','2025-03-23','2025-04-11',2820.00),(23,13,'1255ASD','','2025-03-23','2025-04-11',2820.00),(24,13,'1255ASD','','2025-03-23','2025-04-11',2820.00);
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
  `documento_identidad` char(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apellidos` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefono` int DEFAULT NULL,
  `direccion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha_nacimiento` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fotografia` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `login` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`cliente_id`),
  UNIQUE KEY `documento_identidad` (`documento_identidad`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (2,'I2141346B','Juan','Perez Galde','luislopez@gmail.com',213123,'calle benito','2025-01-03','imagen.jpg','',''),(7,'X7834782N','hola','Lopez Martin','carmenpez@gmail.com',333999999,'calle hola','2025-01-03','mclaren.png','',''),(11,'I2134612B','Angela','celalla','yushen740@gmail.com',999999999,'calle hola','2025-02-14','','',''),(12,'X8355111X','asoidn','asfdsa','luislopez@gmail.com',234324232,'calle benito','2025-02-01','galaxia.jpg','',''),(13,'A1234567B','ChengCheng','Yu','ccyu945@gmail.com',123456789,'Calle Falsa 123','2000-02-21','foto.jpg','chengyu','$2y$12$DFJP.7cSJPDWGh1EcFBAJucaPIdALYIdNwKLRHGNApxjZLbPBAdBe');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `idiomas`
--

DROP TABLE IF EXISTS `idiomas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `idiomas` (
  `ESPAÑOL` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `INGLES` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `CATALAN` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `EUSKERA` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `idiomas`
--

LOCK TABLES `idiomas` WRITE;
/*!40000 ALTER TABLE `idiomas` DISABLE KEYS */;
INSERT INTO `idiomas` VALUES ('alta','high','alta','altu'),('baja','low','baixa','behera'),('modificación','modification','modificació','aldaketa'),('consulta','query','consulta','kontsulta'),('listado','list','llistat','zerrenda'),('ayuda','help','ajuda','laguntza'),('idioma','language','idioma','hizkuntza'),('moneda','currency','moneda','moneta'),('Privada','Private','Privada','Pribatua'),('Busca tu coche para alquilar:','Find your car to rent:','Busca el teu cotxe per llogar','Aurkitu zure autoa alokatzeko'),('buscar','search','buscar','bilatu'),('disponibilidad','availability','disponibilitat','eskuragarritasun'),('Matricula','License plate','Matricula','Matrikula'),('Marca','Brand','Marca','Marka'),('Modelo','Model','Model','Eredu'),('Potencia','Power','Potencia','Potentzia'),('Velocidad maxima','Maximum speed','Velocitat maxima','Abiadura maximoa'),('Imagen','Image','Imatge','Irudia'),('Operacion','Operation','Operacio','Operazio'),('Iniciar sesion','Login','Iniciar sessio','Saioa hasi'),('Usuario','Login','Usuario','Saioa'),('Contraseña','Password','Contrasenya','Pasahitza'),('Fecha inicial','Start date','Data inicial','Hasierako data'),('Fecha devolucion','Return date','Data de devolucio','Itzulketa data'),('Introduce la fecha inicial','Enter the start date','Introdueix la data inicial','Sartu hasierako data'),('Introduce una fecha mayor que hoy','Enter a date greater than today','Introdueix una data més gran que avui','Sartu gaur baino data handiagoa'),('Introduce la fecha de alquiler','Enter the rental date','Introdueix la data de lloguer','Sartu alokairuaren data'),('La fecha de alquiler debe ser mayor que la fecha inicial','The rental date must be greater than the start date','La data de lloguer ha de ser més gran que la data inicial','Alokairuaren data hasierako datatik handiagoa izan behar da'),('Alquilar','Rent','Llogar','Alokatu'),('Inicia tu sesión de cliente','Start your customer session','Inicia la teva sessió de client','Hasieratu zure bezero saioa'),('Volver','Return','Tornar','Itzuli'),('El usuario es obligatorio','Login is mandatory','El usuario és obligatori','Saioa derrigorrezkoa da'),('El formato de login es incorrecto','The login format is incorrect','El format de login és incorrecte','Loginaren formatua okerra da'),('La contraseña es obligatorio','The password is mandatory','La contrasenya és obligatòria','Pasahitza derrigorrezkoa da'),('El formato de password es incorrecto','The password format is incorrect','El format de la contrasenya és incorrecte','Pasahitzaren formatua okerra da'),('La contraseña es incorrecto','The password is incorrect','La contrasenya és incorrecta','Pasahitza okerra da'),('No eres cliente, no está registrado','You are not a customer, you are not registered','No ets client, no estàs registrat','Ez zara bezero, ez zaude erregistratuta'),('Facturación de alquiler de vehículo','Vehicle rental billing','Facturació de lloguer de vehicle','Ibilgailuen alokairuaren fakturazioa'),('Datos de cliente','Customer details','Dades del client','Bezeroaren datuak'),('Datos de vehículo','Vehicle details','Dades del vehicle','Ibilgailuaren datuak'),('Detalles de alquiler','Rental details','Detalls de lloguer','Alokairuaren xehetasunak'),('ID cliente','Customer ID','ID client','Bezeroaren ID'),('Documento de identidad','ID document','Document identitat','Identitate-dokumentua'),('Nombre','First name','Nom','Izena'),('Apellidos','Last name','Cognoms','Abizenak'),('Correo electrónico','Email','Correu electrònic','Posta elektronikoa'),('Teléfono','Phone','Telèfon','Telefonoa'),('Dirección','Address','Adreça','Helbidea'),('Fecha de nacimiento','Date of birth','Data de naixement','Jaio-data'),('Arrendatario','Tenant','Arrendatari','Alokatzailea'),('Vehículo','Vehicle','Vehicle','Ibilgailua'),('Fecha inicial','Start date','Data inicial','Hasierako data'),('Fecha de devolución','Return date','Data de devolució','Itzulpen data'),('Detalles de costes','Cost details','Detalls de costos','Kostuen xehetasunak'),('Precios base','Base prices','Preus base','Prezio baseak'),('Gama de vehículo','Vehicle range','Gamma de vehicle','Ibilgailu gama'),('Precio/Día','Price/Day','Preu/Dia','Prezioa/Eguna'),('Número de días','Number of days','Número de dies','Egun kopurua'),('PRECIO TOTAL','TOTAL PRICE','PREU TOTAL','TOTAL PREZIOA'),('Lugar de recogida (*Opcional)','Pick-up location (*Optional)','Lloc de recollida (*Opcional)','Hartzearen lekua (*Aukerakoa)'),('Cancelar alquiler','Cancel rental','Cancelar lloguer','Alokairua ezeztatu'),('Confirmar alquiler','Confirm rental','Confirmar lloguer','Alokairua baieztatu'),('Introduce una dirección para el recogida de vehículo','Enter an address for the vehicle pick-up','Introdueix una adreça per a la recollida del vehicle','Sartu ibilgailuaren jasotze helbide bat'),('Introduce una dirección para el recogida de vehículo','Enter an address for the vehicle pick-up','Introdueix una adreça per a la recollida del vehicle','Sartu ibilgailuaren jasotze helbide bat'),('Alquilado el vehículo correctamente','Vehicle rented successfully','Vehicle llogat correctament','Ibilgailua alokatu da zuzenki'),('Introduce el usuario','Enter the login','Introdueix el login','Sartu saioa'),('Introduce el contraseña','Enter the password','Introdueix el password','Sartu pasahitza'),('El password es incorrecto','The password is incorrect','La contrasenya és incorrecta','Pasahitza okerra da'),('El usuario no es administrador','The user is not an administrator','usuari no és administrador','Erabiltzailea ez da administratzailea'),('Cerrar sesión','Log out','Tanca sessió','Saioa itxi'),('Gestionar Clientes','Manage Clients','Gestiona Clients','Bezeroak Kudeatu'),('Gestionar Vehículos','Manage Vehicles','Gestiona Vehicles','Ibilgailuak Kudeatu'),('Gestionar Usuarios','Manage Users','Gestiona Usuaris','Erabiltzaileak Kudeatu'),('Gestionar Alquileres','Manage Rentals','Gestiona Lloguers','Alokairuak Kudeatu');
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
  `NOMBRE` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `APELLIDOS` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `FECHA_DE_NACIMIENTO` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `LOGIN` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `PASSWORD` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `GRUPO` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
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
  `MATRICULA` char(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `MARCA` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `MODELO` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `POTENCIA` int DEFAULT NULL,
  `VELOCIDAD_MAX` int DEFAULT NULL,
  `IMAGEN` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`MATRICULA`),
  UNIQUE KEY `MATRICULA` (`MATRICULA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculo`
--

LOCK TABLES `vehiculo` WRITE;
/*!40000 ALTER TABLE `vehiculo` DISABLE KEYS */;
INSERT INTO `vehiculo` VALUES ('1234ASA','RENAULT','MEGANE',110,190,'Renault.jpg'),('1234ASX','TESLA','MODEL 3',210,260,'Tesla.png'),('1234LHH','MERCEDE','CLA220',200,240,'Mercedes-Benz.jpg'),('1255ASD','AUDI','X6',290,300,'Audi.png'),('4390JKL','JEEP','WRANGLER',220,250,'jeep.png'),('7777ASA','BMW','M1',210,320,'Porsche.jpg');
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

-- Dump completed on 2025-02-28 21:47:24
