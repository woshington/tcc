-- MySQL dump 10.13  Distrib 5.6.25, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: tcc
-- ------------------------------------------------------
-- Server version	5.6.25-0ubuntu0.15.04.1

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
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cargo` varchar(200) NOT NULL,
  `setor` varchar(200) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_administrador_usuario1_idx` (`usuario_id`),
  CONSTRAINT `fk_administrador_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` VALUES (1,'Tecnico em Tecnologia da informação','Coordenação de TI',1);
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aula`
--

DROP TABLE IF EXISTS `aula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aula` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` char(1) NOT NULL DEFAULT 'P',
  `modified` date DEFAULT NULL,
  `aula` int(11) NOT NULL,
  `disciplina_id` int(11) NOT NULL,
  `calendario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_aula_disciplina1_idx` (`disciplina_id`),
  KEY `fk_aula_calendario1_idx` (`calendario_id`),
  CONSTRAINT `fk_aula_calendario1` FOREIGN KEY (`calendario_id`) REFERENCES `calendario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_aula_disciplina1` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplina` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aula`
--

LOCK TABLES `aula` WRITE;
/*!40000 ALTER TABLE `aula` DISABLE KEYS */;
INSERT INTO `aula` VALUES (1,'F','2015-09-23',1,1,16),(2,'F','2015-09-22',5,3,16),(3,'F','2015-09-23',2,1,16),(4,'F','2015-09-26',2,1,24),(5,'F','2015-09-27',1,2,23),(6,'M','2015-09-28',2,1,20),(7,'M','2015-09-28',1,1,20),(8,'F','2015-09-28',5,1,20),(9,'F','2015-09-29',1,1,21),(10,'M','2015-10-03',2,1,47),(11,'F','2015-10-03',5,1,47),(12,'F','2015-10-03',6,3,47),(13,'F','2015-10-03',4,2,47);
/*!40000 ALTER TABLE `aula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aula_reposicao_antecipacao`
--

DROP TABLE IF EXISTS `aula_reposicao_antecipacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aula_reposicao_antecipacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aula_repor` int(11) unsigned DEFAULT NULL,
  `reposicao_antecipacao_id` int(11) NOT NULL,
  `aula_id` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_table1_reposicao_antecipacao1_idx` (`reposicao_antecipacao_id`),
  KEY `fk_aula_reposicao_antecipacao_aula1_idx` (`aula_id`),
  CONSTRAINT `fk_aula_reposicao_antecipacao_aula1` FOREIGN KEY (`aula_id`) REFERENCES `aula` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_table1_reposicao_antecipacao1` FOREIGN KEY (`reposicao_antecipacao_id`) REFERENCES `reposicao_antecipacao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aula_reposicao_antecipacao`
--

LOCK TABLES `aula_reposicao_antecipacao` WRITE;
/*!40000 ALTER TABLE `aula_reposicao_antecipacao` DISABLE KEYS */;
INSERT INTO `aula_reposicao_antecipacao` VALUES (22,3,184,13,'C');
/*!40000 ALTER TABLE `aula_reposicao_antecipacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calendario`
--

DROP TABLE IF EXISTS `calendario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calendario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `letivo` tinyint(1) DEFAULT '1',
  `observacao` text,
  `turma_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_calendario_turma1_idx` (`turma_id`),
  CONSTRAINT `fk_calendario_turma1` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calendario`
--

LOCK TABLES `calendario` WRITE;
/*!40000 ALTER TABLE `calendario` DISABLE KEYS */;
INSERT INTO `calendario` VALUES (1,'2015-09-01',0,NULL,1),(2,'2015-09-02',0,NULL,1),(3,'2015-09-03',0,NULL,1),(4,'2015-09-04',0,NULL,1),(5,'2015-09-07',0,NULL,1),(6,'2015-09-08',0,NULL,1),(7,'2015-09-09',0,NULL,1),(8,'2015-09-10',0,NULL,1),(9,'2015-09-11',0,NULL,1),(10,'2015-09-14',0,NULL,1),(11,'2015-09-15',0,NULL,1),(12,'2015-09-16',0,NULL,1),(13,'2015-09-17',0,NULL,1),(14,'2015-09-18',0,NULL,1),(15,'2015-09-21',0,NULL,1),(16,'2015-09-22',1,NULL,1),(17,'2015-09-23',0,NULL,1),(18,'2015-09-24',0,NULL,1),(19,'2015-09-25',0,NULL,1),(20,'2015-09-28',1,NULL,1),(21,'2015-09-29',1,NULL,1),(22,'2015-09-30',1,NULL,1),(23,'2015-09-27',1,NULL,1),(24,'2015-09-26',1,NULL,1),(25,'2015-10-01',0,NULL,1),(26,'2015-10-02',1,NULL,1),(27,'2015-10-05',0,NULL,1),(28,'2015-10-06',0,NULL,1),(29,'2015-10-07',0,NULL,1),(30,'2015-10-08',0,NULL,1),(31,'2015-10-09',0,NULL,1),(32,'2015-10-12',0,NULL,1),(33,'2015-10-13',0,NULL,1),(34,'2015-10-14',0,NULL,1),(35,'2015-10-15',0,NULL,1),(36,'2015-10-16',0,NULL,1),(37,'2015-10-19',0,NULL,1),(38,'2015-10-20',0,NULL,1),(39,'2015-10-21',0,NULL,1),(40,'2015-10-22',0,NULL,1),(41,'2015-10-23',0,NULL,1),(42,'2015-10-26',0,NULL,1),(43,'2015-10-27',0,NULL,1),(44,'2015-10-28',0,NULL,1),(45,'2015-10-29',0,NULL,1),(46,'2015-10-30',0,NULL,1),(47,'2015-10-03',1,NULL,1);
/*!40000 ALTER TABLE `calendario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coordenador`
--

DROP TABLE IF EXISTS `coordenador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coordenador` (
  `professor_id` int(11) NOT NULL,
  `modalidade_id` int(11) NOT NULL,
  PRIMARY KEY (`professor_id`),
  KEY `fk_coordenador_modalidade1_idx` (`modalidade_id`),
  CONSTRAINT `fk_coordenador_modalidade1` FOREIGN KEY (`modalidade_id`) REFERENCES `modalidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_coordenador_professor1` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coordenador`
--

LOCK TABLES `coordenador` WRITE;
/*!40000 ALTER TABLE `coordenador` DISABLE KEYS */;
INSERT INTO `coordenador` VALUES (1,1),(4,2);
/*!40000 ALTER TABLE `coordenador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso`
--

DROP TABLE IF EXISTS `curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(150) NOT NULL,
  `sigla` varchar(45) NOT NULL,
  `modalidade_id` int(11) NOT NULL,
  `eixo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_curso_modalidade1_idx` (`modalidade_id`),
  KEY `eixo_id` (`eixo_id`),
  CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`eixo_id`) REFERENCES `eixo` (`id`),
  CONSTRAINT `fk_curso_modalidade1` FOREIGN KEY (`modalidade_id`) REFERENCES `modalidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso`
--

LOCK TABLES `curso` WRITE;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` VALUES (1,'Desenvolvimento de Software','INFO',1,1);
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disciplina`
--

DROP TABLE IF EXISTS `disciplina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disciplina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disciplina`
--

LOCK TABLES `disciplina` WRITE;
/*!40000 ALTER TABLE `disciplina` DISABLE KEYS */;
INSERT INTO `disciplina` VALUES (1,'Introdução a Programação Orientada a Objeto'),(2,'Programação para WEB'),(3,'Banco de Dados');
/*!40000 ALTER TABLE `disciplina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eixo`
--

DROP TABLE IF EXISTS `eixo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eixo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eixo`
--

LOCK TABLES `eixo` WRITE;
/*!40000 ALTER TABLE `eixo` DISABLE KEYS */;
INSERT INTO `eixo` VALUES (1,'Informação e Comunicação');
/*!40000 ALTER TABLE `eixo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grade_curricular`
--

DROP TABLE IF EXISTS `grade_curricular`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grade_curricular` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carga_horaria` int(11) NOT NULL,
  `obrigatorio` tinyint(1) NOT NULL DEFAULT '1',
  `disciplina_id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `turma_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_grade_curricular_disciplina1_idx` (`disciplina_id`),
  KEY `fk_grade_curricular_professor1_idx` (`professor_id`),
  KEY `fk_grade_curricular_turma1_idx` (`turma_id`),
  CONSTRAINT `fk_grade_curricular_disciplina1` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplina` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_grade_curricular_professor1` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_grade_curricular_turma1` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grade_curricular`
--

LOCK TABLES `grade_curricular` WRITE;
/*!40000 ALTER TABLE `grade_curricular` DISABLE KEYS */;
INSERT INTO `grade_curricular` VALUES (1,60,1,1,2,1),(2,75,1,2,1,1),(3,45,1,3,3,1);
/*!40000 ALTER TABLE `grade_curricular` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horario`
--

DROP TABLE IF EXISTS `horario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dia` int(11) NOT NULL,
  `aula` int(11) NOT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_termino` time DEFAULT NULL,
  `grade_curricular_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_horario_grade_curricular1_idx` (`grade_curricular_id`),
  CONSTRAINT `fk_horario_grade_curricular1` FOREIGN KEY (`grade_curricular_id`) REFERENCES `grade_curricular` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horario`
--

LOCK TABLES `horario` WRITE;
/*!40000 ALTER TABLE `horario` DISABLE KEYS */;
INSERT INTO `horario` VALUES (1,2,1,NULL,NULL,1),(2,2,2,NULL,NULL,1),(3,2,3,NULL,NULL,2),(4,2,4,NULL,NULL,2),(5,2,5,NULL,NULL,3),(6,2,6,NULL,NULL,3),(7,6,1,NULL,NULL,2),(8,6,2,NULL,NULL,1),(9,1,1,NULL,NULL,1),(10,1,2,NULL,NULL,1),(11,1,5,NULL,NULL,1),(12,5,1,NULL,NULL,1),(13,5,2,NULL,NULL,2),(14,5,3,NULL,NULL,3),(15,5,4,NULL,NULL,3),(16,5,5,NULL,NULL,2),(17,5,6,NULL,NULL,1),(18,6,3,NULL,NULL,3),(19,6,4,NULL,NULL,2),(20,6,5,NULL,NULL,1),(21,6,6,NULL,NULL,3);
/*!40000 ALTER TABLE `horario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modalidade`
--

DROP TABLE IF EXISTS `modalidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modalidade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(200) NOT NULL,
  `tempoAula` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modalidade`
--

LOCK TABLES `modalidade` WRITE;
/*!40000 ALTER TABLE `modalidade` DISABLE KEYS */;
INSERT INTO `modalidade` VALUES (1,'Médio/Integrado ao Técnico',50),(2,'Superior',60);
/*!40000 ALTER TABLE `modalidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professor`
--

DROP TABLE IF EXISTS `professor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qualificacao` varchar(100) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `eixo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_professor_usuario_idx` (`usuario_id`),
  KEY `fk_professor_eixo1_idx` (`eixo_id`),
  CONSTRAINT `fk_professor_eixo1` FOREIGN KEY (`eixo_id`) REFERENCES `eixo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_professor_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professor`
--

LOCK TABLES `professor` WRITE;
/*!40000 ALTER TABLE `professor` DISABLE KEYS */;
INSERT INTO `professor` VALUES (1,'Mestre',2,1),(2,'Doutor',3,1),(3,'Mestre',4,1),(4,'Mestre',5,1);
/*!40000 ALTER TABLE `professor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reposicao_antecipacao`
--

DROP TABLE IF EXISTS `reposicao_antecipacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reposicao_antecipacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `justificativa` text NOT NULL,
  `observacao` text,
  `dataReposicao` date NOT NULL,
  `status` char(1) DEFAULT NULL,
  `created` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=186 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reposicao_antecipacao`
--

LOCK TABLES `reposicao_antecipacao` WRITE;
/*!40000 ALTER TABLE `reposicao_antecipacao` DISABLE KEYS */;
INSERT INTO `reposicao_antecipacao` VALUES (184,'dalçdkaçdk',NULL,'2015-10-03',NULL,NULL),(185,'dakdçlakdçalkdaçk',NULL,'2015-10-03','C',NULL);
/*!40000 ALTER TABLE `reposicao_antecipacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sala`
--

DROP TABLE IF EXISTS `sala`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sala` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sala`
--

LOCK TABLES `sala` WRITE;
/*!40000 ALTER TABLE `sala` DISABLE KEYS */;
INSERT INTO `sala` VALUES (1,'A1');
/*!40000 ALTER TABLE `sala` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turma`
--

DROP TABLE IF EXISTS `turma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `ano` int(11) NOT NULL,
  `turno` varchar(45) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `curso_id` int(11) NOT NULL,
  `sala_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_turma_curso1_idx` (`curso_id`),
  KEY `fk_turma_sala1_idx` (`sala_id`),
  CONSTRAINT `fk_turma_curso1` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_turma_sala1` FOREIGN KEY (`sala_id`) REFERENCES `sala` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turma`
--

LOCK TABLES `turma` WRITE;
/*!40000 ALTER TABLE `turma` DISABLE KEYS */;
INSERT INTO `turma` VALUES (1,'3º ANO',2015,'M',1,1,1);
/*!40000 ALTER TABLE `turma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `matricula` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'woshington valdeci','woshington@ifpi.edu.br','$2y$10$O7IniJpsqHB4dM84Iuld2eBQDRQII0M2aiDGYGQsDGz4121O8Oo/6',1,'1816190'),(2,'Jader Barbosa','jaderx@gmail.com','$2y$10$RdkNQtc1ovf3ZHd3iK4z1uT2sQUO1ZpUnheb0q1ERrLmpsX3qeG3e',1,'1816191'),(3,'Rafael Torres','rta@gmail.com','$2y$10$8Y963Np.zjdInTcxcqGGE.K5I8oGIBr0WzmdacnsKb7iNl3lm328.',1,'1816192'),(4,'Aislan Rafael','aislanmaster@gmail.com','$2y$10$IPgBmzQrUemGtrAsH7pIuuj0k9wmg/XaV/6YvlJMnB9A/s6EgmtRq',1,'1618190'),(5,'João Paulo','jpa@gmail.com','$2y$10$CpNrLQbSmvdx9.CxvFF7T.UmYgYYtkRPQxrJ6B//8NeidvrDbfRie',1,'2016190');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-05 16:16:48
