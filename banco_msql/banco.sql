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
-- Table structure for table `bairro`
--

DROP TABLE IF EXISTS `bairro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bairro` (
  `idbairro` int NOT NULL AUTO_INCREMENT,
  `bairro` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idbairro`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bairro`
--

LOCK TABLES `bairro` WRITE;
/*!40000 ALTER TABLE `bairro` DISABLE KEYS */;
INSERT INTO `bairro` VALUES (1,'Aclimação'),(2,'Alto Umuarama'),(3,'Alvorada'),(4,'Bom Jesus'),(5,'Brasil'),(6,'Carajás'),(7,'Cazeca'),(8,'Centro'),(9,'Chácaras\nTubalina'),(10,'Cidade Jardim'),(11,'Custódio\nPereira'),(12,'Daniel Fonseca'),(13,'Distrito\nIndustrial'),(14,'Dona Zulmira'),(15,'Fundinho'),(16,'Gávea'),(17,'Granada'),(18,'Grand Ville'),(19,'Granja\nMarileusa'),(20,'Guarani'),(21,'Jaraguá'),(22,'Jardim Brasília'),(23,'Jardim Canaã'),(24,'Jardim das\nPalmeiras'),(25,'Jardim Europa'),(26,'Jardim Holanda'),(27,'Jardim\nInconfidência'),(28,'Jardim Ipanema'),(29,'Jardim Karaíba'),(30,'Jardim Patrícia'),(31,'Jardim sul'),(32,'Gávea'),(33,'Lagoinha'),(34,'Laranjeiras'),(35,'Lídice'),(36,'Luizote de\nFreitas'),(37,'Mansour'),(38,'Maravilha'),(39,'Marta Helena'),(40,'Martins'),(41,'Minas Gerais'),(42,'Morada da\nColina1'),(43,'Morada do Sol'),(44,'Monte Hebron'),(45,'Morumbi'),(46,'Nossa Senhora\nAparecida'),(47,'Nossa Senhora\ndas Graças'),(48,'Novo Mundo'),(49,'Nova\nUberlândia'),(50,'Osvaldo\nRezende'),(51,'Pacaembu'),(52,'Pampulha'),(53,'Panorama'),(54,'Patrimônio'),(55,'Pequis'),(56,'Portal do Vale'),(57,'Presidente\nRoosevelt'),(58,'Residencial\nGramado'),(59,'Residencial\nIntegração'),(60,'Residencial Pequis'),(61,'Santa Luzia'),(62,'Santa Mônica'),(63,'Santa Rosa'),(64,'São Jorge'),(65,'São José'),(66,'Saraiva'),(67,'Segismundo\nPereira'),(68,'Shopping Park'),(69,'Tabajaras'),(70,'Taiaman'),(71,'Tibery'),(72,'Tocantins'),(73,'Tubalina'),(74,'Umuarama'),(75,'Vigilato Pereira');
/*!40000 ALTER TABLE `bairro` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=6889 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `celula`
--

LOCK TABLES `celula` WRITE;
/*!40000 ALTER TABLE `celula` DISABLE KEYS */;
INSERT INTO `celula` VALUES (6882,'charis2','2021-12-23','rua nasei bairro tebere',2410,'20h','quarta','ATIVO'),(6884,'kadoshi','2021-10-13','Sebastião Rangel 460',2410,'18:30h','sexta','ATIVO'),(6885,'kadoshi','2021-10-03','Apartamento A',2410,'20h','quarta','ATIVO'),(6887,'kairos','2021-10-03','Sebastião Rangel 460',2416,'20h','sexta',''),(6888,'charis','2021-10-03','Apartamento A',3,'20h','sexta','ATIVO');
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
  `cursao` char(2) DEFAULT 'N',
  `ctl` char(2) DEFAULT 'N',
  `batizado` char(2) DEFAULT 'N',
  `status` varchar(7) NOT NULL DEFAULT 'INATIVO',
  `idusuario` varchar(11) DEFAULT NULL,
  `idlider` varchar(11) DEFAULT NULL,
  `criadoem` varchar(45) NOT NULL,
  `alteradoem` varchar(45) NOT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa`
--

LOCK TABLES `pessoa` WRITE;
/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
INSERT INTO `pessoa` VALUES (3,'Gabriel Saimo Ferreira Espindola','34984343376','gabrielsaimo68@gmail.com','1976-06-17','Homem',NULL,'Sebastião Rangel 460','2','1','Y','N','Y','ATIVO','3','3','2021-10-05 15:14:25','2021-10-05 15:14:25','62'),(4,'brino','96981392329','bruno@gmail.com','1986-07-12','Homem',NULL,'Sebastião Rangel 460','5','2','Y','Y','Y','ATIVO','1','4','2021-10-05 15:17:05','2021-10-05 15:17:05','62');
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
INSERT INTO `rede` VALUES (1,'Jovens'),(2,'Adolecentes'),(3,'Adultos'),(4,'kids');
/*!40000 ALTER TABLE `rede` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_estados`
--

DROP TABLE IF EXISTS `tb_estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_estados` (
  `id` int(2) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `uf` varchar(10) NOT NULL DEFAULT '',
  `nome` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `ix_estado` (`nome`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_estados`
--

LOCK TABLES `tb_estados` WRITE;
/*!40000 ALTER TABLE `tb_estados` DISABLE KEYS */;
INSERT INTO `tb_estados` VALUES (01,'AC','Acre'),(02,'AL','Alagoas'),(03,'AM','Amazonas'),(04,'AP','Amapá'),(05,'BA','Bahia'),(06,'CE','Ceará'),(07,'DF','Distrito Federal'),(08,'ES','Espírito Santo'),(09,'GO','Goiás'),(10,'MA','Maranhão'),(11,'MG','Minas Gerais'),(12,'MS','Mato Grosso do Sul'),(13,'MT','Mato Grosso'),(14,'PA','Pará'),(15,'PB','Paraíba'),(16,'PE','Pernambuco'),(17,'PI','Piauí'),(18,'PR','Paraná'),(19,'RJ','Rio de Janeiro'),(20,'RN','Rio Grande do Norte'),(21,'RO','Rondônia'),(22,'RR','Roraima'),(23,'RS','Rio Grande do Sul'),(24,'SC','Santa Catarina'),(25,'SE','Sergipe'),(26,'SP','São Paulo'),(27,'TO','Tocantins');
/*!40000 ALTER TABLE `tb_estados` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'gabriel','123456',NULL),(2,'saima','123456','2021-09-29 13:19:59'),(3,'saimo','123456','2021-09-29 13:23:14'),(4,'saimo1','123456','2021-09-29 15:06:47'),(5,'hermesp','123456','2021-09-29 15:08:50'),(6,'saimo3','123456','2021-09-29 16:50:24'),(7,'saimo6','123456','2021-09-29 16:55:18'),(8,'saimo9','asdasd','2021-09-29 16:55:57'),(9,'saimo5','asdas','2021-09-29 16:56:25'),(10,'saimo54','dvzdvc','2021-09-29 16:58:53'),(11,'aaaaa','123456','2021-09-30 16:28:16'),(12,'gabriel3','123456','2021-10-01 10:41:17'),(13,'Gabriel Saimo','gs221097','2021-10-01 10:48:25'),(14,'Gabriel Saimo3','gs221097','2021-10-01 10:57:41'),(15,'espindola','gs221097','2021-10-01 14:17:30'),(16,'espindola6','gs221097','2021-10-04 09:06:12'),(17,'saimo10','123456','2021-10-04 10:43:55'),(18,'gs','gs221097','2021-10-04 11:13:14'),(19,'naruto','123456','2021-10-04 12:49:31'),(20,'pastor','123456','2021-10-04 16:38:25'),(21,'pastor2','123456','2021-10-04 16:58:38'),(22,'gabriel33','123456','2021-10-05 09:36:39'),(23,'gabriel55','123456','2021-10-05 09:53:38'),(24,'gabriel550','123456','2021-10-05 14:28:28'),(25,'gabriel551','123456','2021-10-05 14:44:12');
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

-- Dump completed on 2021-10-06 10:04:32
