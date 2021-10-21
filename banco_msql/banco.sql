CREATE DATABASE  IF NOT EXISTS `vid_udi`;
USE `vid_udi`;

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `idusuario` int NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `criadoem` datetime DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
);

INSERT INTO `usuario` VALUES (1,'gabriel','123456',NULL),(2,'saima','123456','2021-09-29 13:19:59'),(3,'saimo','123456','2021-09-29 13:23:14'),(4,'saimo1','123456','2021-09-29 15:06:47'),(5,'hermesp','123456','2021-09-29 15:08:50'),(6,'saimo3','123456','2021-09-29 16:50:24'),(7,'saimo6','123456','2021-09-29 16:55:18'),(8,'saimo9','asdasd','2021-09-29 16:55:57'),(9,'saimo5','asdas','2021-09-29 16:56:25'),(10,'saimo54','dvzdvc','2021-09-29 16:58:53'),(11,'aaaaa','123456','2021-09-30 16:28:16'),(12,'gabriel3','123456','2021-10-01 10:41:17'),(13,'Gabriel Saimo','gs221097','2021-10-01 10:48:25'),(14,'Gabriel Saimo3','gs221097','2021-10-01 10:57:41'),(15,'espindola','gs221097','2021-10-01 14:17:30'),(16,'espindola6','gs221097','2021-10-04 09:06:12'),(17,'saimo10','123456','2021-10-04 10:43:55'),(18,'gs','gs221097','2021-10-04 11:13:14'),(19,'naruto','123456','2021-10-04 12:49:31'),(20,'pastor','123456','2021-10-04 16:38:25'),(21,'pastor2','123456','2021-10-04 16:58:38'),(22,'gabriel33','123456','2021-10-05 09:36:39'),(23,'gabriel55','123456','2021-10-05 09:53:38'),(24,'gabriel550','123456','2021-10-05 14:28:28'),(25,'gabriel551','123456','2021-10-05 14:44:12'),(26,'gabriel77','123456','2021-10-09 12:11:48'),(27,'Jonatasgabriel','jonatas89','2021-10-10 16:23:19'),(28,'test123','123456','2021-10-10 16:32:26'),(29,'0123','123456','2021-10-13 16:50:53'),(30,'gabriel11111','123456','2021-10-13 21:41:16'),(31,'aula','123456','2021-10-19 19:24:19'),(32,'aula2','123456','2021-10-19 19:27:21'),(33,'aula3','123456','2021-10-19 19:35:55'),(34,'aula4','123456','2021-10-19 20:18:33'),(35,'eu','123456','2021-10-19 21:19:56'),(36,'aula 22','123456','2021-10-20 20:49:01'),(37,'aula de hoje','123456','2021-10-20 21:21:28'),(38,'2555','123456','2021-10-20 21:31:15');


DROP TABLE IF EXISTS `tb_estados`;

CREATE TABLE `tb_estados` (
  `id` int(2) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `uf` varchar(10) NOT NULL DEFAULT '',
  `nome` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `ix_estado` (`nome`) USING BTREE
);

INSERT INTO `tb_estados` VALUES (01,'AC','Acre'),(02,'AL','Alagoas'),(03,'AM','Amazonas'),(04,'AP','Amapá'),(05,'BA','Bahia'),(06,'CE','Ceará'),(07,'DF','Distrito Federal'),(08,'ES','Espírito Santo'),(09,'GO','Goiás'),(10,'MA','Maranhão'),(11,'MG','Minas Gerais'),(12,'MS','Mato Grosso do Sul'),(13,'MT','Mato Grosso'),(14,'PA','Pará'),(15,'PB','Paraíba'),(16,'PE','Pernambuco'),(17,'PI','Piauí'),(18,'PR','Paraná'),(19,'RJ','Rio de Janeiro'),(20,'RN','Rio Grande do Norte'),(21,'RO','Rondônia'),(22,'RR','Roraima'),(23,'RS','Rio Grande do Sul'),(24,'SC','Santa Catarina'),(25,'SE','Sergipe'),(26,'SP','São Paulo'),(27,'TO','Tocantins');

DROP TABLE IF EXISTS `rede`;

CREATE TABLE `rede` (
  `idrede` int NOT NULL,
  `rede` varchar(20) NOT NULL,
  PRIMARY KEY (`idrede`)
);

INSERT INTO `rede` VALUES (1,'Jovens'),(2,'Adolecentes'),(3,'Adultos'),(4,'kids');



DROP TABLE IF EXISTS `pessoa`;

CREATE TABLE `pessoa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(55) NOT NULL,
  `telefone` char(11) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `idade` date DEFAULT NULL,
  `sexo` varchar(15) NOT NULL,
  `idempresa` int DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `idemcargo` char(2) NOT NULL DEFAULT '1',
  `idrede` char(1) NOT NULL DEFAULT '1',
  `cursao` char(1) DEFAULT 'N',
  `ctl` char(1) DEFAULT 'N',
  `batizado` char(2) DEFAULT 'N',
  `semi` char(1) DEFAULT 'N',
  `status` varchar(7) NOT NULL DEFAULT 'INATIVO',
  `idusuario` varchar(11) NOT NULL,
  `idlider` varchar(11) DEFAULT NULL,
  `criadoem` varchar(45) DEFAULT NULL,
  `alteradoem` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `pessoa` VALUES (3,'Gabriel Saimo Ferreira Espindola','34984343376','gabrielsaimo68@gmail.com','1976-06-17','Homem',NULL,'62','Sebastião Rangel 460','2','1','Y','N','Y',NULL,'ATIVO','3','3','2021-10-05 15:14:25','2021-10-05 15:14:25'),(4,'brino','96981392329','bruno@gmail.com','1986-07-12','Homem',NULL,'62','Sebastião Rangel 460','5','2','Y','Y','Y',NULL,'ATIVO','1','4','2021-10-05 15:17:05','2021-10-05 15:17:05'),(5,'brino1','96981392329','bruno@gmail.com','1986-07-12','Homem',NULL,'62','Sebastião Rangel 460','3','2','Y','Y','Y',NULL,'ATIVO','1','4','2021-10-05 15:17:05','2021-10-05 15:17:05'),(12,'Gabriel Saimo Ferreira Espindola','34984343376','gabrielsaimo68@gmail.com','1976-06-17','Homem',NULL,'62','Sebastião Rangel 460','2','1','Y','N','Y',NULL,'ATIVO','3','4','2021-10-05 15:14:25','2021-10-05 15:14:25'),(27,'0123','55466328796','gabriel@gmail.com','2021-10-22','Homem',NULL,'8','rua da casa','5','2','Y','N','Y','N','INATIVO','29','0',NULL,NULL),(28,'aula test',NULL,'test@g.com',NULL,'Homem',NULL,NULL,NULL,'5','1','N','N','N','N','INATIVO','31',NULL,NULL,NULL),(29,'saimon','34984373376','gabrielsaimo68@gmail.com','2021-10-15','Homem',NULL,'6','rua da casa','3','1','Y','N','Y','N','INATIVO','32','0',NULL,NULL),(30,'saimon','55466328796','gabrielsaimo68@gmail.com','2021-09-26','Homem',NULL,'4','rua da casa','4','1','Y','Y','Y','Y','INATIVO','33','3',NULL,NULL),(31,'sasukeee','55466328796','gabrielsaimo68@gmail.com','2021-10-21','Homem',NULL,'68','rua da casa','4','1','Y','Y','Y','Y','INATIVO','34','12',NULL,NULL),(33,'aula de testes ','55466328796','gabrielsaimo68@gmail.com','2021-10-22','Homem',NULL,'53','rua da casa','5','1','Y','N','Y','N','INATIVO','36','13',NULL,NULL),(34,'caio da silva','34984373376','caio@g.mail.com','1997-09-10','Homem',NULL,'62','rua da casa','1','1','Y','N','Y','N','INATIVO','37','0',NULL,NULL),(35,'saimon','55466328796','gabrielsaimo68@gmail.com','2021-10-22','Homem',NULL,'5','rua da casa','4','1','Y','Y','Y','N','INATIVO','38','5',NULL,NULL);

DROP TABLE IF EXISTS `emcargo`;

CREATE TABLE `emcargo` (
  `idemcargo` char(2) NOT NULL,
  `cargo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idemcargo`)
);

INSERT INTO `emcargo` VALUES ('1','Membro'),('2','Lidér'),('3','Dicipulador'),('4','Obreiro'),('5','Pastor');

DROP TABLE IF EXISTS `celula`;
CREATE TABLE `celula` (
  `idcelula` int NOT NULL AUTO_INCREMENT,
  `celula` varchar(45) DEFAULT NULL,
  `inidata` date DEFAULT NULL,
  `bairro` char(2) DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `idlider` int DEFAULT NULL,
  `horario` varchar(7) DEFAULT NULL,
  `dia` varchar(20) DEFAULT NULL,
  `status` varchar(10) DEFAULT 'INATIVO',
  PRIMARY KEY (`idcelula`)
);

INSERT INTO `celula` VALUES (6887,'kairos','2021-10-03',NULL,'Sebastião Rangel 460',2416,'20h','sexta','INATIVO'),(6888,'charis','2021-10-03',NULL,'Apartamento A',3,'20h','sexta','ATIVO'),(6889,'kadoshi','2010-06-09',NULL,'não sei a=mais',4,'20h','quarta','INATIVO'),(6890,'testatn dadasd dddddd ddd','2021-10-07','62','top lugar 2 ',4,'6h','domingo','INATIVO'),(6891,'testatn dadasd dddddd ddd','2021-10-16','16','top lugar',3,'5h','domingo','INATIVO'),(6892,'o super test22','2021-10-29','1','daasd sdsd ',5,'6h','domingo','INATIVO'),(6893,NULL,NULL,'1',NULL,NULL,NULL,NULL,'INATIVO');

DROP TABLE IF EXISTS `bairro`;

CREATE TABLE `bairro` (
  `idbairro` int NOT NULL AUTO_INCREMENT,
  `bairro` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idbairro`)
);

INSERT INTO `bairro` VALUES (1,'Aclimação'),(2,'Alto Umuarama'),(3,'Alvorada'),(4,'Bom Jesus'),(5,'Brasil'),(6,'Carajás'),(7,'Cazeca'),(8,'Centro'),(9,'Chácaras\nTubalina'),(10,'Cidade Jardim'),(11,'Custódio\nPereira'),(12,'Daniel Fonseca'),(13,'Distrito\nIndustrial'),(14,'Dona Zulmira'),(15,'Fundinho'),(16,'Gávea'),(17,'Granada'),(18,'Grand Ville'),(19,'Granja\nMarileusa'),(20,'Guarani'),(21,'Jaraguá'),(22,'Jardim Brasília'),(23,'Jardim Canaã'),(24,'Jardim das\nPalmeiras'),(25,'Jardim Europa'),(26,'Jardim Holanda'),(27,'Jardim\nInconfidência'),(28,'Jardim Ipanema'),(29,'Jardim Karaíba'),(30,'Jardim Patrícia'),(31,'Jardim sul'),(32,'Gávea'),(33,'Lagoinha'),(34,'Laranjeiras'),(35,'Lídice'),(36,'Luizote de\nFreitas'),(37,'Mansour'),(38,'Maravilha'),(39,'Marta Helena'),(40,'Martins'),(41,'Minas Gerais'),(42,'Morada da\nColina1'),(43,'Morada do Sol'),(44,'Monte Hebron'),(45,'Morumbi'),(46,'Nossa Senhora\nAparecida'),(47,'Nossa Senhora\ndas Graças'),(48,'Novo Mundo'),(49,'Nova\nUberlândia'),(50,'Osvaldo\nRezende'),(51,'Pacaembu'),(52,'Pampulha'),(53,'Panorama'),(54,'Patrimônio'),(55,'Pequis'),(56,'Portal do Vale'),(57,'Presidente\nRoosevelt'),(58,'Residencial\nGramado'),(59,'Residencial\nIntegração'),(60,'Residencial Pequis'),(61,'Santa Luzia'),(62,'Santa Mônica'),(63,'Santa Rosa'),(64,'São Jorge'),(65,'São José'),(66,'Saraiva'),(67,'Segismundo\nPereira'),(68,'Shopping Park'),(69,'Tabajaras'),(70,'Taiaman'),(71,'Tibery'),(72,'Tocantins'),(73,'Tubalina'),(74,'Umuarama'),(75,'Vigilato Pereira');

DROP TABLE IF EXISTS `anexo`;

CREATE TABLE `anexo` (
  `idanexo` int NOT NULL AUTO_INCREMENT,
  `anexo` mediumblob,
  `idobjeto` int DEFAULT NULL,
  `criadoem` datetime DEFAULT NULL,
  `atualizadoem` datetime DEFAULT NULL,
  `tipoanexo` varchar(20) DEFAULT NULL,
  `link` varchar(150) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `linkaudio` varchar(150) DEFAULT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idanexo`)
);