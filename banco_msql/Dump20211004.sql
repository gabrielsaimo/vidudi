-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: crud
-- ------------------------------------------------------
-- Server version	8.0.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `celula`
--

DROP TABLE IF EXISTS `celula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `celula` (
  `idcelula` int NOT NULL AUTO_INCREMENT,
  `celula` varchar(45) DEFAULT NULL,
  `inidata` date DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `idlider` int DEFAULT NULL,
  `horario` varchar(7) DEFAULT NULL,
  `dia` varchar(20) DEFAULT NULL,
  `status` varchar(10) DEFAULT 'INATIVO',
  PRIMARY KEY (`idcelula`)
) ENGINE=InnoDB AUTO_INCREMENT=6888 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `celula`
--

LOCK TABLES `celula` WRITE;
/*!40000 ALTER TABLE `celula` DISABLE KEYS */;
INSERT INTO `celula` VALUES (6882,'charis2','2021-12-23','rua nasei bairro tebere',2410,'20h','quarta','ATIVO'),(6884,'kadoshi','2021-10-13','Sebastião Rangel 460',2410,'18:30h','sexta','ATIVO'),(6885,'kadoshi','2021-10-03','Apartamento A',2410,'20h','quarta','ATIVO'),(6887,'kairos','2021-10-03','Sebastião Rangel 460',2416,'20h','sexta','');
/*!40000 ALTER TABLE `celula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emcargo`
--

DROP TABLE IF EXISTS `emcargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emcargo` (
  `idemcargo` char(2) NOT NULL,
  `cargo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idemcargo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emcargo`
--

LOCK TABLES `emcargo` WRITE;
/*!40000 ALTER TABLE `emcargo` DISABLE KEYS */;
INSERT INTO `emcargo` VALUES ('1','Membro'),('2','Lidér'),('3','Dicipulador'),('4','Obreiro'),('5','Pastor');
/*!40000 ALTER TABLE `emcargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pessoa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(55) NOT NULL,
  `telefone` char(11) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `idade` date DEFAULT NULL,
  `sexo` varchar(15) NOT NULL,
  `idempresa` int DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `idemcargo` char(2) NOT NULL DEFAULT '1',
  `idrede` char(1) NOT NULL DEFAULT '1',
  `cursao` char(1) DEFAULT 'N',
  `ctl` char(1) DEFAULT 'N',
  `batizado` char(1) DEFAULT 'N',
  `status` varchar(7) NOT NULL DEFAULT 'INATIVO',
  `idusuario` varchar(11) DEFAULT NULL,
  `idlider` varchar(11) DEFAULT NULL,
  `criadoem` varchar(45) NOT NULL,
  `alteradoem` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2420 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa`
--

LOCK TABLES `pessoa` WRITE;
/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
INSERT INTO `pessoa` VALUES (2407,'teste','34984343378','gaaaa@a.com','2021-02-11','Homem',NULL,NULL,'4','3','N','N','N','ATIVO','12','2416','2021-10-01 10:42:33','2021-10-04 10:24:41'),(2408,'saimo1','96981392329','','2021-10-13','',NULL,NULL,'','','N','N','N','ATIVO','13','2410','2021-10-01 10:52:44','2021-10-04 10:13:42'),(2409,'gabriel3',NULL,'gabriel3@g.com',NULL,'Homem',NULL,NULL,'1','1','N','N','N','ATIVO','14',NULL,'2021-10-01 11:07:02','2021-10-01 11:07:02'),(2410,'hermes pedro',NULL,'hermesp@gmai.com',NULL,'Homem',NULL,NULL,'2','1','N','N','N','ATIVO','5',NULL,'2021-10-01 13:51:44','2021-10-01 13:51:44'),(2411,'saimo f.e',NULL,'Saimo@g.com',NULL,'Homem',NULL,NULL,'4','1','N','N','N','ATIVO','3',NULL,'2021-10-01 14:06:17','2021-10-01 14:06:17'),(2412,'saimo3','96981392329','','2021-09-29','',NULL,NULL,'','','N','N','N','INATIVO','15','','2021-10-01 14:18:04','2021-10-04 10:22:49'),(2413,'saimo4','349841-8413','','1997-09-10','',NULL,NULL,'','','N','N','N','INATIVO','13','','2021-10-04 10:00:26','2021-10-04 10:00:26'),(2414,'Gabriel Saimo Ferreira Espindola','33465656655','gabrielsaimo68@gmail.com','1997-09-10','Homem',NULL,NULL,'3','3','N','N','N','ATIVO','6',NULL,'2021-10-04 10:51:52','2021-10-04 10:51:52'),(2415,'gabrielsss','34984343378','gabrielsaimo68@gmail.com','2021-10-06','mulher',NULL,NULL,'4','3','N','N','N','INATIVO','17','2410','2021-10-04 10:52:47','2021-10-04 10:52:47'),(2416,'Gs mais nem tanto','34984343378','gsfe@meta.edu.br','2021-10-14','Homem',NULL,NULL,'2','1','N','N','N','ATIVO','18','2410','2021-10-04 11:14:05','2021-10-04 11:14:05'),(2417,'Narutinho','96981392329','ga8@gmail.com','2021-10-01','Homem',NULL,NULL,'1','4','N','N','N','ATIVO','19','2416','2021-10-04 12:50:32','2021-10-04 12:50:32'),(2418,'Bruno','34984281627','bruno@gmail.com','1985-06-21','Homem',NULL,NULL,'5','2','N','N','N','INATIVO','20','2414','2021-10-04 16:54:36','2021-10-04 16:54:36'),(2419,'Marlon','34984343376','marlon@m.com','2021-10-13','Homem',NULL,NULL,'5','1','N','N','N','INATIVO','21','2414','2021-10-04 17:01:37','2021-10-04 17:01:37');
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoas`
--

DROP TABLE IF EXISTS `pessoas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pessoas` (
  `idpessoa` int DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `criadoem` varchar(10) DEFAULT NULL,
  `alteradoem` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoas`
--

LOCK TABLES `pessoas` WRITE;
/*!40000 ALTER TABLE `pessoas` DISABLE KEYS */;
INSERT INTO `pessoas` VALUES (NULL,'gabriel','sexo',NULL,NULL),(NULL,'gabriel','maxoxo',NULL,NULL),(NULL,'gabriel','maxoxo',NULL,NULL),(NULL,'gabriel','maxoxo',NULL,NULL),(NULL,'gabriel','maxoxo',NULL,NULL),(NULL,'gabriel','maxoxo',NULL,NULL),(NULL,'gabriel','maxoxo',NULL,NULL),(NULL,'gabriel','maxoxo',NULL,NULL),(NULL,'gabriel','maxoxo',NULL,NULL),(NULL,'gabriel','maxoxo',NULL,NULL),(NULL,'gabriel','maxoxo',NULL,NULL),(NULL,'gabriel','maxoxo',NULL,NULL),(NULL,'gabriel','maxoxo',NULL,NULL),(NULL,'gabriel','maxoxo',NULL,NULL),(NULL,'gabriel','maxoxo',NULL,NULL),(NULL,'gabriel','maxoxo',NULL,NULL),(NULL,'gabriel','maxoxo',NULL,NULL);
/*!40000 ALTER TABLE `pessoas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rede`
--

DROP TABLE IF EXISTS `rede`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rede` (
  `idrede` int NOT NULL,
  `rede` varchar(20) NOT NULL,
  PRIMARY KEY (`idrede`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rede`
--

LOCK TABLES `rede` WRITE;
/*!40000 ALTER TABLE `rede` DISABLE KEYS */;
INSERT INTO `rede` VALUES (1,'jovens'),(2,'adolecentes'),(3,'adultos'),(4,'kids');
/*!40000 ALTER TABLE `rede` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `idusuario` int NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `criadoem` datetime DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'gabriel','123456',NULL),(2,'saima','123456','2021-09-29 13:19:59'),(3,'saimo','123456','2021-09-29 13:23:14'),(4,'saimo1','123456','2021-09-29 15:06:47'),(5,'hermesp','123456','2021-09-29 15:08:50'),(6,'saimo3','123456','2021-09-29 16:50:24'),(7,'saimo6','123456','2021-09-29 16:55:18'),(8,'saimo9','asdasd','2021-09-29 16:55:57'),(9,'saimo5','asdas','2021-09-29 16:56:25'),(10,'saimo54','dvzdvc','2021-09-29 16:58:53'),(11,'aaaaa','123456','2021-09-30 16:28:16'),(12,'gabriel3','123456','2021-10-01 10:41:17'),(13,'Gabriel Saimo','gs221097','2021-10-01 10:48:25'),(14,'Gabriel Saimo3','gs221097','2021-10-01 10:57:41'),(15,'espindola','gs221097','2021-10-01 14:17:30'),(16,'espindola6','gs221097','2021-10-04 09:06:12'),(17,'saimo10','123456','2021-10-04 10:43:55'),(18,'gs','gs221097','2021-10-04 11:13:14'),(19,'naruto','123456','2021-10-04 12:49:31'),(20,'pastor','123456','2021-10-04 16:38:25'),(21,'pastor2','123456','2021-10-04 16:58:38');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'crud'
--

--
-- Dumping routines for database 'crud'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-04 17:53:24
