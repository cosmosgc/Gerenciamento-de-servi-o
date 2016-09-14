-- MySQL dump 10.15  Distrib 10.0.20-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: u474781536_royal
-- ------------------------------------------------------
-- Server version	10.0.20-MariaDB

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
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cnpj` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc_empresa` text COLLATE utf8_unicode_ci NOT NULL,
  `ceo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (1,'vinicius','cnpj','202cb962ac59075b964b07152d234b70','','cosmoskitsune@hotmail.com','','','',''),(2,'cosmosgc','061.480.139-75','864f1a5b1b39f5f071ca3123c4e806bb','4734421282','cosmoskitsune@hotmail.com','','','São Francisco do Sul','SC'),(3,'teste1','123456789','202cb962ac59075b964b07152d234b70','4734421282','cosmoskitsune@hotmail.com','empresa com coisas que começa com letra b','','São Francisco do Sul, SC',''),(4,'teste2','123456789','202cb962ac59075b964b07152d234b70','4734421282','cosmoskitsune@hotmail.com','Coisas','','SFS',''),(5,'teste3','123456789','202cb962ac59075b964b07152d234b70','4734421282','cosmoskitsune@hotmail.com','bush','','R. Francisco Mascarenhas\r\nReta',''),(6,'teste4','123456789','202cb962ac59075b964b07152d234b70','4734421282','cosmoskitsune@hotmail.com','bush','','R. Francisco Mascarenhas\r\nReta',''),(7,'testes','123456789','d41d8cd98f00b204e9800998ecf8427e','','','','','',''),(8,'teste5','123456789','202cb962ac59075b964b07152d234b70','4734421282','cosmoskitsune@hotmail.com','Uma empresa ','','SFS',''),(9,'teste6','123456789','202cb962ac59075b964b07152d234b70','4734421282','cosmoskitsune@hotmail.com','Uma empresa ','','SFS',''),(10,'teste7','1234567895','202cb962ac59075b964b07152d234b70','4734421282','cosmoskitsune@hotmail.com','bites','','algum lugar',''),(11,'Shukin','','5797fa2cd8e16663d2636a15a6efd182','','shukin@shukinhekon.com','','','',''),(12,'Shukin1','','d0970714757783e6cf17b26fb8e2298f','','shukin@shukin.com','','','',''),(13,'Shukin2','','d0970714757783e6cf17b26fb8e2298f','','shukin@shukin.com','','','',''),(14,'Shukin3','','d0970714757783e6cf17b26fb8e2298f','','shukin@shukin.com','','','',''),(15,'rodape','12345678951','202cb962ac59075b964b07152d234b70','4734421282','cosmoskitsune@hotmail.com','coisas estranhas','','invisivel',''),(16,'sim','','202cb962ac59075b964b07152d234b70','','email','','','',''),(17,'jabuti','','202cb962ac59075b964b07152d234b70','','lucas@gmail.com','','','',''),(18,'Teste','','698dc19d489c4e4db73e28a713eab07b','','pc@pc.com','','','',''),(19,'raposa','','864f1a5b1b39f5f071ca3123c4e806bb','','cosmoskitsune@hotmail.com','','','',''),(20,'raposacosmica','','864f1a5b1b39f5f071ca3123c4e806bb','34421282','cosmoskitsune@hotmail.com','Uma empresa para os furries','Vinícius Bretas','Rua francisco mascarenhas - 6000','');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;

--
-- Table structure for table `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcionario` (
  `id_funcionario` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fk_setor` int(11) NOT NULL,
  PRIMARY KEY (`id_funcionario`),
  KEY `fk_setor` (`fk_setor`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario`
--

/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;

--
-- Table structure for table `projetos`
--

DROP TABLE IF EXISTS `projetos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projetos` (
  `id_projeto` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `horas` int(11) NOT NULL,
  `fk_empresa` int(11) NOT NULL,
  PRIMARY KEY (`id_projeto`),
  KEY `fk_empresa` (`fk_empresa`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projetos`
--

/*!40000 ALTER TABLE `projetos` DISABLE KEYS */;
/*!40000 ALTER TABLE `projetos` ENABLE KEYS */;

--
-- Table structure for table `registro`
--

DROP TABLE IF EXISTS `registro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registro` (
  `id_registro` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dataHoraIni` datetime NOT NULL,
  `dataHorafim` datetime NOT NULL,
  `fk_funcionario` int(11) NOT NULL,
  `fk_servico` int(11) NOT NULL,
  `fk_status` int(11) NOT NULL,
  PRIMARY KEY (`id_registro`),
  KEY `fk_funcionario` (`fk_funcionario`,`fk_servico`,`fk_status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro`
--

/*!40000 ALTER TABLE `registro` DISABLE KEYS */;
/*!40000 ALTER TABLE `registro` ENABLE KEYS */;

--
-- Table structure for table `servico`
--

DROP TABLE IF EXISTS `servico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servico` (
  `id_servico` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `horas` int(11) NOT NULL,
  `fk_projeto` int(11) NOT NULL,
  `fk_status` int(11) NOT NULL,
  `fk_funcionario` int(11) NOT NULL,
  `fk_setor` int(11) NOT NULL,
  PRIMARY KEY (`id_servico`),
  KEY `fk_projeto` (`fk_projeto`,`fk_status`,`fk_funcionario`,`fk_setor`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servico`
--

/*!40000 ALTER TABLE `servico` DISABLE KEYS */;
/*!40000 ALTER TABLE `servico` ENABLE KEYS */;

--
-- Table structure for table `setor`
--

DROP TABLE IF EXISTS `setor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setor` (
  `id_setor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fk_empresa` int(11) NOT NULL,
  PRIMARY KEY (`id_setor`),
  KEY `fk_empresa` (`fk_empresa`)
) ENGINE=MyISAM AUTO_INCREMENT=388887 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setor`
--

/*!40000 ALTER TABLE `setor` DISABLE KEYS */;
INSERT INTO `setor` VALUES (388861,'giga',10),(388862,'mega',10),(388863,'byte',10),(388864,'Música Boa',11),(388865,'Música Ruim',11),(388866,'Música Mediana',11),(388867,'Música Ruim',12),(388868,'Música Ruim',13),(388869,'Música Ruim',14),(388870,'chico bueno',15),(388871,'beringela',15),(388872,'legal',15),(388873,'show',15),(388874,'setorlegal',16),(388875,'',16),(388876,'',16),(388877,'',16),(388878,'',16),(388879,'',17),(388880,'',18),(388881,'',19),(388882,'furry',20),(388883,'discord',20),(388884,'bot',20),(388885,'e-sport',20),(388886,'cursos',20);
/*!40000 ALTER TABLE `setor` ENABLE KEYS */;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

/*!40000 ALTER TABLE `status` DISABLE KEYS */;
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-09-14 13:46:26
