-- MySQL dump 10.14  Distrib 5.5.33-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: invision
-- ------------------------------------------------------
-- Server version	5.5.33-MariaDB

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
-- Table structure for table `bitacora`
--

DROP TABLE IF EXISTS `bitacora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bitacora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `direccion` varchar(15) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `tabla` varchar(100) DEFAULT NULL,
  `dato_tabla` int(11) DEFAULT NULL,
  `error` varchar(255) DEFAULT NULL,
  `dato_error` varchar(255) DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `sede_id` int(11) NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bitacora_FI_1` (`sede_id`),
  CONSTRAINT `bitacora_FK_1` FOREIGN KEY (`sede_id`) REFERENCES `sede` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora`
--

LOCK TABLES `bitacora` WRITE;
/*!40000 ALTER TABLE `bitacora` DISABLE KEYS */;
INSERT INTO `bitacora` VALUES (1,'Acceso','127.0.0.1','2014-08-09 21:25:34','admin','usuario',0,NULL,NULL,1,0,'admin','admin','2014-08-09 21:25:34','2014-08-09 21:25:34'),(2,'Creacion de Perfil','127.0.0.1','2014-08-09 21:26:33','admin','perfil',0,'','',1,0,'admin','admin','2014-08-09 21:26:33','2014-08-09 21:26:33'),(3,'Asignacion de menus a perfil','127.0.0.1','2014-08-09 21:26:49','admin','perfil_menu',0,'','',1,0,'admin','admin','2014-08-09 21:26:49','2014-08-09 21:26:49'),(4,'Asignacion de menus a perfil','127.0.0.1','2014-08-09 21:30:49','admin','perfil_menu',0,'','',1,0,'admin','admin','2014-08-09 21:30:49','2014-08-09 21:30:49'),(5,'Asignacion de menus a perfil','127.0.0.1','2014-08-09 21:31:00','admin','perfil_menu',0,'','',1,0,'admin','admin','2014-08-09 21:31:00','2014-08-09 21:31:00'),(6,'Modificación de horarios','127.0.0.1','2014-08-09 21:39:31','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 21:39:31','2014-08-09 21:39:31'),(7,'Modificación de horarios','127.0.0.1','2014-08-09 21:39:31','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 21:39:31','2014-08-09 21:39:31'),(8,'Modificación de horarios','127.0.0.1','2014-08-09 21:39:31','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 21:39:31','2014-08-09 21:39:31'),(9,'Modificación de horarios','127.0.0.1','2014-08-09 21:39:31','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 21:39:31','2014-08-09 21:39:31'),(10,'Modificación de horarios','127.0.0.1','2014-08-09 21:39:31','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 21:39:31','2014-08-09 21:39:31'),(11,'Modificación de horarios','127.0.0.1','2014-08-09 21:39:31','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 21:39:31','2014-08-09 21:39:31'),(12,'Modificación de horarios','127.0.0.1','2014-08-09 21:39:31','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 21:39:31','2014-08-09 21:39:31'),(13,'Modificación de horarios','127.0.0.1','2014-08-09 22:05:29','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:05:29','2014-08-09 22:05:29'),(14,'Modificación de horarios','127.0.0.1','2014-08-09 22:05:29','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:05:29','2014-08-09 22:05:29'),(15,'Modificación de horarios','127.0.0.1','2014-08-09 22:05:29','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:05:29','2014-08-09 22:05:29'),(16,'Modificación de horarios','127.0.0.1','2014-08-09 22:05:29','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:05:29','2014-08-09 22:05:29'),(17,'Modificación de horarios','127.0.0.1','2014-08-09 22:05:29','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:05:29','2014-08-09 22:05:29'),(18,'Modificación de horarios','127.0.0.1','2014-08-09 22:05:29','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:05:29','2014-08-09 22:05:29'),(19,'Modificación de horarios','127.0.0.1','2014-08-09 22:05:29','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:05:29','2014-08-09 22:05:29'),(20,'Acceso','127.0.0.1','2014-08-09 22:06:42','admin','usuario',0,NULL,NULL,1,0,'admin','admin','2014-08-09 22:06:42','2014-08-09 22:06:42'),(21,'Modificación de horarios','127.0.0.1','2014-08-09 22:08:16','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:08:16','2014-08-09 22:08:16'),(22,'Modificación de horarios','127.0.0.1','2014-08-09 22:08:16','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:08:16','2014-08-09 22:08:16'),(23,'Modificación de horarios','127.0.0.1','2014-08-09 22:08:16','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:08:16','2014-08-09 22:08:16'),(24,'Modificación de horarios','127.0.0.1','2014-08-09 22:08:16','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:08:16','2014-08-09 22:08:16'),(25,'Modificación de horarios','127.0.0.1','2014-08-09 22:08:16','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:08:16','2014-08-09 22:08:16'),(26,'Modificación de horarios','127.0.0.1','2014-08-09 22:08:16','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:08:16','2014-08-09 22:08:16'),(27,'Modificación de horarios','127.0.0.1','2014-08-09 22:08:16','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:08:16','2014-08-09 22:08:16'),(28,'Modificación de horarios','127.0.0.1','2014-08-09 22:11:34','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:11:34','2014-08-09 22:11:34'),(29,'Modificación de horarios','127.0.0.1','2014-08-09 22:11:34','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:11:34','2014-08-09 22:11:34'),(30,'Modificación de horarios','127.0.0.1','2014-08-09 22:11:34','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:11:34','2014-08-09 22:11:34'),(31,'Modificación de horarios','127.0.0.1','2014-08-09 22:11:34','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:11:34','2014-08-09 22:11:34'),(32,'Modificación de horarios','127.0.0.1','2014-08-09 22:11:34','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:11:34','2014-08-09 22:11:34'),(33,'Modificación de horarios','127.0.0.1','2014-08-09 22:11:34','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:11:34','2014-08-09 22:11:34'),(34,'Modificación de horarios','127.0.0.1','2014-08-09 22:11:34','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:11:34','2014-08-09 22:11:34'),(35,'Acceso','127.0.0.1','2014-08-09 22:12:49','admin','usuario',0,NULL,NULL,1,0,'admin','admin','2014-08-09 22:12:49','2014-08-09 22:12:49'),(36,'Modificación de horarios','127.0.0.1','2014-08-09 22:13:02','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:13:02','2014-08-09 22:13:02'),(37,'Modificación de horarios','127.0.0.1','2014-08-09 22:13:02','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:13:02','2014-08-09 22:13:02'),(38,'Modificación de horarios','127.0.0.1','2014-08-09 22:13:02','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:13:02','2014-08-09 22:13:02'),(39,'Modificación de horarios','127.0.0.1','2014-08-09 22:13:02','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:13:02','2014-08-09 22:13:02'),(40,'Modificación de horarios','127.0.0.1','2014-08-09 22:13:02','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:13:02','2014-08-09 22:13:03'),(41,'Modificación de horarios','127.0.0.1','2014-08-09 22:13:03','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:13:03','2014-08-09 22:13:03'),(42,'Modificación de horarios','127.0.0.1','2014-08-09 22:13:03','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:13:03','2014-08-09 22:13:03'),(43,'Cambio de clave','127.0.0.1','2014-08-09 22:16:15','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:16:15','2014-08-09 22:16:15'),(44,'Cambio de clave','127.0.0.1','2014-08-09 22:16:51','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:16:51','2014-08-09 22:16:51'),(45,'eliminacion de usuario','127.0.0.1','2014-08-09 22:19:03','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:19:03','2014-08-09 22:19:03'),(46,'creacion de usuario','127.0.0.1','2014-08-09 22:19:52','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:19:52','2014-08-09 22:19:52'),(47,'Se elimino e usuario \"admin\"','127.0.0.1','2014-08-09 22:24:11','admin','usuario',2,'','',1,0,'admin','admin','2014-08-09 22:24:11','2014-08-09 22:24:11'),(48,'creacion de usuario','127.0.0.1','2014-08-09 22:24:38','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:24:38','2014-08-09 22:24:38'),(49,'Acceso','127.0.0.1','2014-08-09 22:24:46','admin','usuario',0,NULL,NULL,1,0,'admin','admin','2014-08-09 22:24:46','2014-08-09 22:24:46'),(50,'Modificación de horarios','127.0.0.1','2014-08-09 22:44:35','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:44:35','2014-08-09 22:44:35'),(51,'Modificación de horarios','127.0.0.1','2014-08-09 22:44:35','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:44:35','2014-08-09 22:44:35'),(52,'Modificación de horarios','127.0.0.1','2014-08-09 22:44:35','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:44:35','2014-08-09 22:44:35'),(53,'Modificación de horarios','127.0.0.1','2014-08-09 22:44:36','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:44:36','2014-08-09 22:44:36'),(54,'Modificación de horarios','127.0.0.1','2014-08-09 22:44:36','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:44:36','2014-08-09 22:44:36'),(55,'Modificación de horarios','127.0.0.1','2014-08-09 22:44:36','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:44:36','2014-08-09 22:44:36'),(56,'Modificación de horarios','127.0.0.1','2014-08-09 22:44:36','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:44:36','2014-08-09 22:44:36'),(57,'Modificación de horarios','127.0.0.1','2014-08-09 22:44:59','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:44:59','2014-08-09 22:44:59'),(58,'Modificación de horarios','127.0.0.1','2014-08-09 22:44:59','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:44:59','2014-08-09 22:44:59'),(59,'Modificación de horarios','127.0.0.1','2014-08-09 22:44:59','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:44:59','2014-08-09 22:44:59'),(60,'Modificación de horarios','127.0.0.1','2014-08-09 22:44:59','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:44:59','2014-08-09 22:44:59'),(61,'Modificación de horarios','127.0.0.1','2014-08-09 22:44:59','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:44:59','2014-08-09 22:44:59'),(62,'Modificación de horarios','127.0.0.1','2014-08-09 22:44:59','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:44:59','2014-08-09 22:44:59'),(63,'Modificación de horarios','127.0.0.1','2014-08-09 22:44:59','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 22:44:59','2014-08-09 22:44:59'),(64,'Eliminacion de perfil','127.0.0.1','2014-08-09 22:50:30','admin','perfil',0,'','',1,0,'admin','admin','2014-08-09 22:50:30','2014-08-09 22:50:30'),(66,'Asignacion de menus a perfil','127.0.0.1','2014-08-09 22:52:17','admin','perfil_menu',0,'','',1,0,'admin','admin','2014-08-09 22:52:17','2014-08-09 22:52:17'),(67,'Salida','127.0.0.1','2014-08-09 23:06:15','admin','usuario',0,'Salida',NULL,1,0,'admin','admin','2014-08-09 23:06:15','2014-08-09 23:06:15'),(68,'Acceso','127.0.0.1','2014-08-09 23:06:19','admin','usuario',0,NULL,NULL,1,0,'admin','admin','2014-08-09 23:06:19','2014-08-09 23:06:19'),(69,'Salida','127.0.0.1','2014-08-09 23:07:19','admin','usuario',0,'Salida',NULL,1,0,'admin','admin','2014-08-09 23:07:19','2014-08-09 23:07:19'),(70,'Acceso','127.0.0.1','2014-08-09 23:07:23',NULL,'usuario',0,'acceso','adminadmin.12',0,0,NULL,NULL,'2014-08-09 23:07:23','2014-08-09 23:07:23'),(71,'Acceso','127.0.0.1','2014-08-09 23:07:26','admin','usuario',0,NULL,NULL,1,0,'admin','admin','2014-08-09 23:07:26','2014-08-09 23:07:26'),(72,'Se agrego el color \"Magenta\"','127.0.0.1','2014-08-09 23:10:58','admin','color',0,'','',1,0,'admin','admin','2014-08-09 23:10:58','2014-08-09 23:10:58'),(73,'Se ha editado el color \"Cafe\"','127.0.0.1','2014-08-09 23:12:04','admin','color',0,'','',1,0,'admin','admin','2014-08-09 23:12:04','2014-08-09 23:12:04'),(75,'edicion de usuario','127.0.0.1','2014-08-09 23:19:55','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 23:19:55','2014-08-09 23:19:55'),(76,'Modificación de los horarios del usuario \"admin\"','127.0.0.1','2014-08-09 23:20:03','admin','usuario',0,'','',1,0,'admin','admin','2014-08-09 23:20:03','2014-08-09 23:20:03'),(77,'Se ha editado el articulo \"00000101010\"','127.0.0.1','2014-08-09 23:27:31','admin','inventario',101010,'','',1,0,'admin','admin','2014-08-09 23:27:31','2014-08-09 23:27:31'),(78,'Acceso','127.0.0.1','2014-08-10 13:28:19',NULL,'usuario',0,'acceso','adminadmin12',0,0,NULL,NULL,'2014-08-10 13:28:19','2014-08-10 13:28:19'),(79,'Acceso','127.0.0.1','2014-08-10 13:28:24',NULL,'usuario',0,'acceso','adminadmin14',0,0,NULL,NULL,'2014-08-10 13:28:24','2014-08-10 13:28:24'),(80,'Acceso','127.0.0.1','2014-08-10 13:28:28',NULL,'usuario',0,'acceso','adminadmin.12',0,0,NULL,NULL,'2014-08-10 13:28:28','2014-08-10 13:28:28'),(81,'Acceso','127.0.0.1','2014-08-10 13:28:31',NULL,'usuario',0,'acceso','adminadmin12',0,0,NULL,NULL,'2014-08-10 13:28:31','2014-08-10 13:28:31'),(82,'Acceso','127.0.0.1','2014-08-10 13:28:35',NULL,'usuario',0,'acceso','adminadmin.12',0,0,NULL,NULL,'2014-08-10 13:28:35','2014-08-10 13:28:35'),(83,'Acceso','127.0.0.1','2014-08-10 13:28:38',NULL,'usuario',0,'acceso','adminadmin10',0,0,NULL,NULL,'2014-08-10 13:28:38','2014-08-10 13:28:38'),(84,'Acceso','127.0.0.1','2014-08-10 13:28:41',NULL,'usuario',0,'acceso','adminadmin14',0,0,NULL,NULL,'2014-08-10 13:28:41','2014-08-10 13:28:41'),(85,'Acceso','127.0.0.1','2014-08-10 13:28:44',NULL,'usuario',0,'acceso','adminadmin12',0,0,NULL,NULL,'2014-08-10 13:28:44','2014-08-10 13:28:44'),(86,'Acceso','127.0.0.1','2014-08-10 13:28:48',NULL,'usuario',0,'acceso','adminadmin15',0,0,NULL,NULL,'2014-08-10 13:28:48','2014-08-10 13:28:48'),(87,'Acceso','127.0.0.1','2014-08-10 13:29:55',NULL,'usuario',0,'acceso','adminadmin.14',0,0,NULL,NULL,'2014-08-10 13:29:55','2014-08-10 13:29:55'),(88,'Acceso','127.0.0.1','2014-08-10 13:29:58',NULL,'usuario',0,'acceso','adminadmin.14',0,0,NULL,NULL,'2014-08-10 13:29:58','2014-08-10 13:29:58'),(89,'Acceso','127.0.0.1','2014-08-10 13:30:01','admin','usuario',0,NULL,NULL,1,0,'admin','admin','2014-08-10 13:30:01','2014-08-10 13:30:01'),(90,'Se agrego el color \"Rosado\"','127.0.0.1','2014-08-10 13:30:38','admin','color',0,'','',1,0,'admin','admin','2014-08-10 13:30:38','2014-08-10 13:30:38'),(91,'Se agrego el color \"Cobalto\"','127.0.0.1','2014-08-10 13:30:52','admin','color',0,'','',1,0,'admin','admin','2014-08-10 13:30:52','2014-08-10 13:30:52'),(92,'Se agrego el color \"Siena\"','127.0.0.1','2014-08-10 13:31:05','admin','color',0,'','',1,0,'admin','admin','2014-08-10 13:31:05','2014-08-10 13:31:05'),(93,'Se ha agregado el articulo \"012341201234\"','127.0.0.1','2014-08-10 13:31:58','admin','inventario',2147483647,'','',1,0,'admin','admin','2014-08-10 13:31:58','2014-08-10 13:31:58'),(94,'Se ha agregado el articulo \"012312\"','127.0.0.1','2014-08-10 13:32:35','admin','inventario',12312,'','',1,0,'admin','admin','2014-08-10 13:32:35','2014-08-10 13:32:35'),(95,'Se ha editado el articulo \"012312\"','127.0.0.1','2014-08-10 13:32:58','admin','inventario',12312,'','',1,0,'admin','admin','2014-08-10 13:32:58','2014-08-10 13:32:58'),(96,'Se ha agregado el articulo \"0098901234\"','127.0.0.1','2014-08-10 13:34:14','admin','inventario',98901234,'','',1,0,'admin','admin','2014-08-10 13:34:14','2014-08-10 13:34:14'),(97,'Se ha editado el articulo \"00000101010\"','127.0.0.1','2014-08-10 14:23:30','admin','inventario',101010,'','',1,0,NULL,NULL,'2014-08-10 14:23:30','2014-08-10 14:23:30'),(98,'Se ha editado el articulo \"012312\"','127.0.0.1','2014-08-10 14:23:59','admin','inventario',12312,'','',1,0,NULL,NULL,'2014-08-10 14:23:59','2014-08-10 14:23:59'),(99,'Se ha editado el articulo \"012341201234\"','127.0.0.1','2014-08-10 14:24:07','admin','inventario',2147483647,'','',1,0,NULL,NULL,'2014-08-10 14:24:07','2014-08-10 14:24:07'),(100,'Se ha editado el articulo \"012312\"','127.0.0.1','2014-08-10 14:24:15','admin','inventario',12312,'','',1,0,NULL,NULL,'2014-08-10 14:24:15','2014-08-10 14:24:15'),(101,'Se ha editado el articulo \"0098901234\"','127.0.0.1','2014-08-10 14:24:29','admin','inventario',98901234,'','',1,0,NULL,NULL,'2014-08-10 14:24:29','2014-08-10 14:24:29'),(102,'Salida','127.0.0.1','2014-08-10 14:57:04','admin','usuario',0,'Salida',NULL,1,0,NULL,NULL,'2014-08-10 14:57:04','2014-08-10 14:57:04'),(103,'Acceso','127.0.0.1','2014-08-10 14:57:15','admin','usuario',0,NULL,NULL,1,0,NULL,NULL,'2014-08-10 14:57:15','2014-08-10 14:57:15'),(104,'Salida','127.0.0.1','2014-08-10 14:57:20','admin','usuario',0,'Salida',NULL,1,0,NULL,NULL,'2014-08-10 14:57:20','2014-08-10 14:57:20'),(105,'Acceso','127.0.0.1','2014-08-10 16:25:30','admin','usuario',0,NULL,NULL,1,0,NULL,NULL,'2014-08-10 16:25:30','2014-08-10 16:25:30'),(106,'Usuario creado','127.0.0.1','2014-08-10 16:26:45','admin','usuario',0,'','',1,0,NULL,NULL,'2014-08-10 16:26:45','2014-08-10 16:26:45'),(107,'Asignacion de menus a perfil','127.0.0.1','2014-08-10 16:27:38','admin','perfil_menu',0,'','',1,0,NULL,NULL,'2014-08-10 16:27:38','2014-08-10 16:27:38'),(108,'Se ha agregado el articulo \"5677823\"','127.0.0.1','2014-08-10 16:28:54','admin','inventario',5677823,'','',1,0,NULL,NULL,'2014-08-10 16:28:54','2014-08-10 16:28:54'),(109,'edicion de usuario','127.0.0.1','2014-08-10 16:48:17','admin','usuario',0,'','',1,0,NULL,NULL,'2014-08-10 16:48:17','2014-08-10 16:48:17'),(110,'Salida','127.0.0.1','2014-08-10 16:48:26','admin','usuario',0,'Salida',NULL,1,0,NULL,NULL,'2014-08-10 16:48:26','2014-08-10 16:48:26'),(111,'Acceso','127.0.0.1','2014-08-10 16:48:31',NULL,'usuario',0,'acceso','danieldaniel14',0,0,NULL,NULL,'2014-08-10 16:48:31','2014-08-10 16:48:31'),(112,'Acceso','127.0.0.1','2014-08-10 16:48:35',NULL,'usuario',0,'acceso','danieldaniel14',0,0,NULL,NULL,'2014-08-10 16:48:35','2014-08-10 16:48:35'),(113,'Acceso','127.0.0.1','2014-08-10 16:48:41','admin','usuario',0,NULL,NULL,1,0,NULL,NULL,'2014-08-10 16:48:41','2014-08-10 16:48:41'),(114,'edicion de usuario','127.0.0.1','2014-08-10 16:49:03','admin','usuario',0,'','',1,0,NULL,NULL,'2014-08-10 16:49:03','2014-08-10 16:49:03'),(115,'Salida','127.0.0.1','2014-08-10 16:49:06','admin','usuario',0,'Salida',NULL,1,0,NULL,NULL,'2014-08-10 16:49:06','2014-08-10 16:49:06'),(116,'Acceso','127.0.0.1','2014-08-10 16:49:10','daniel','usuario',0,NULL,NULL,1,0,NULL,NULL,'2014-08-10 16:49:10','2014-08-10 16:49:10'),(117,'Salida','127.0.0.1','2014-08-10 16:49:30','daniel','usuario',0,'Salida',NULL,1,0,NULL,NULL,'2014-08-10 16:49:30','2014-08-10 16:49:30'),(118,'Acceso','127.0.0.1','2014-08-10 16:49:37','admin','usuario',0,NULL,NULL,1,0,NULL,NULL,'2014-08-10 16:49:37','2014-08-10 16:49:37'),(119,'Salida','127.0.0.1','2014-08-10 16:50:18','admin','usuario',0,'Salida',NULL,1,0,NULL,NULL,'2014-08-10 16:50:18','2014-08-10 16:50:18'),(121,'Se agrego el nuevo tipo de sede \"Laboratorio\"','127.0.0.1','2014-08-10 21:46:04','3','tipo_sede',2,NULL,NULL,1,1,NULL,NULL,'2014-08-10 21:46:04','2014-08-10 21:46:04'),(122,'Se edito el tipo de sede \"Clinica\"','127.0.0.1','2014-08-10 21:49:48','3','tipo_sede',1,NULL,NULL,1,1,NULL,NULL,'2014-08-10 21:49:48','2014-08-10 21:49:48'),(124,'Se elimino el tipo de sede \"Laboratorio\"','127.0.0.1','2014-08-10 21:56:02','admin','tipo_sede',2,NULL,NULL,1,1,NULL,NULL,'2014-08-10 21:56:02','2014-08-10 21:56:02'),(127,'Se agrego el nuevo tipo de sede \"Laboratorio\"','127.0.0.1','2014-08-10 22:26:13','admin','tipo_sede',3,NULL,NULL,1,1,NULL,NULL,'2014-08-10 22:26:13','2014-08-10 22:26:13'),(128,'Se agrego la nueva sede \"Laboratorio central\"','127.0.0.1','2014-08-10 22:26:27','admin','sede',2,NULL,NULL,1,1,NULL,NULL,'2014-08-10 22:26:27','2014-08-10 22:26:27'),(129,'Se edito la sede \"Clinica central\"','127.0.0.1','2014-08-10 22:26:35','admin','sede',2,NULL,NULL,1,1,NULL,NULL,'2014-08-10 22:26:35','2014-08-10 22:26:35'),(130,'Se edito la sede \"Laboratorio central\"','127.0.0.1','2014-08-10 22:26:59','admin','sede',2,NULL,NULL,1,1,NULL,NULL,'2014-08-10 22:26:59','2014-08-10 22:26:59'),(131,'Se elimino la sede \"Laboratorio central\"','127.0.0.1','2014-08-10 22:27:16','admin','sede',2,NULL,NULL,1,1,NULL,NULL,'2014-08-10 22:27:16','2014-08-10 22:27:16'),(132,'Acceso','127.0.0.1','2014-08-11 20:15:35','admin','usuario',0,NULL,NULL,1,1,NULL,NULL,'2014-08-11 20:15:35','2014-08-11 20:15:35'),(133,'Se agrego el color \"Dorado\"','127.0.0.1','2014-08-11 20:27:29','admin','color',0,'','',1,1,NULL,NULL,'2014-08-11 20:27:29','2014-08-11 20:27:29'),(134,'Se ha eliminado el color \"Dorado\"','127.0.0.1','2014-08-11 20:29:49','admin','color',0,'','',1,1,NULL,NULL,'2014-08-11 20:29:49','2014-08-11 20:29:49'),(135,'Se agrego la nueva sede \"Laboratorio central\"','127.0.0.1','2014-08-11 20:49:24','admin','sede',2,NULL,NULL,1,1,NULL,NULL,'2014-08-11 20:49:24','2014-08-11 20:49:24'),(136,'Se ha agregado el articulo \"A0001\"','127.0.0.1','2014-08-11 20:53:08','admin','inventario',0,'','',1,1,NULL,NULL,'2014-08-11 20:53:08','2014-08-11 20:53:08'),(138,'Se agrego la maleta del usuario \"admin\"','127.0.0.1','2014-08-11 21:38:15','admin','maleta',4,'','',1,1,NULL,NULL,'2014-08-11 21:38:15','2014-08-11 21:38:15'),(139,'Se edito la maleta del usuario \"daniel\"','127.0.0.1','2014-08-11 21:41:12','admin','maleta',4,'','',1,1,NULL,NULL,'2014-08-11 21:41:12','2014-08-11 21:41:12'),(140,'Se ha editado el articulo \"A0002\"','127.0.0.1','2014-08-11 22:19:33','admin','inventario',0,'','',1,1,NULL,NULL,'2014-08-11 22:19:33','2014-08-11 22:19:33'),(141,'Acceso','127.0.0.1','2014-08-11 22:21:14','admin','usuario',0,NULL,NULL,1,1,NULL,NULL,'2014-08-11 22:21:14','2014-08-11 22:21:14'),(142,'Se ha agregado el articulo \"A0001\"','127.0.0.1','2014-08-11 22:27:20','admin','inventario',0,'','',1,1,NULL,NULL,'2014-08-11 22:27:20','2014-08-11 22:27:20'),(143,'Se edito la maleta del usuario \"daniel\"','127.0.0.1','2014-08-11 23:06:27','admin','maleta',4,'','',1,1,NULL,NULL,'2014-08-11 23:06:27','2014-08-11 23:06:27'),(144,'Se elimino un articulo de la maleta del usuario \"daniel\"','127.0.0.1','2014-08-11 23:30:09','admin','maleta_detalle',4,'','',1,1,NULL,NULL,'2014-08-11 23:30:09','2014-08-11 23:30:09'),(145,'Se elimino un articulo de la maleta del usuario \"daniel\"','127.0.0.1','2014-08-11 23:30:47','admin','maleta_detalle',4,'','',1,1,NULL,NULL,'2014-08-11 23:30:47','2014-08-11 23:30:47'),(146,'Se agregaron \"2\" articulos a la maleta del usuario \"daniel\"','127.0.0.1','2014-08-11 23:31:06','admin','maleta_detalle',4,'','',1,1,NULL,NULL,'2014-08-11 23:31:06','2014-08-11 23:31:06'),(147,'Se agrego la maleta del usuario \"daniel\"','127.0.0.1','2014-08-11 23:31:49','admin','maleta',5,'','',1,1,NULL,NULL,'2014-08-11 23:31:49','2014-08-11 23:31:49'),(148,'Se agregaron \"2\" articulos a la maleta del usuario \"daniel\"','127.0.0.1','2014-08-11 23:32:03','admin','maleta_detalle',5,'','',1,1,NULL,NULL,'2014-08-11 23:32:03','2014-08-11 23:32:03'),(149,'Se agregaron \"20\" articulos a la maleta del usuario \"daniel\"','127.0.0.1','2014-08-11 23:32:16','admin','maleta_detalle',5,'','',1,1,NULL,NULL,'2014-08-11 23:32:16','2014-08-11 23:32:16'),(150,'Se elimino un articulo de la maleta del usuario \"daniel\"','127.0.0.1','2014-08-11 23:32:22','admin','maleta_detalle',5,'','',1,1,NULL,NULL,'2014-08-11 23:32:22','2014-08-11 23:32:22'),(151,'Se agregaron \"10\" articulos a la maleta del usuario \"daniel\"','127.0.0.1','2014-08-11 23:32:32','admin','maleta_detalle',5,'','',1,1,NULL,NULL,'2014-08-11 23:32:32','2014-08-11 23:32:32'),(152,'Acceso','127.0.0.1','2014-08-12 19:51:33','admin','usuario',0,NULL,NULL,1,1,NULL,NULL,'2014-08-12 19:51:33','2014-08-12 19:51:33'),(153,'Acceso','127.0.0.1','2014-08-12 20:26:17','admin','usuario',0,NULL,NULL,1,1,NULL,NULL,'2014-08-12 20:26:17','2014-08-12 20:26:17'),(154,'Se elimino un articulo de la maleta del usuario \"daniel\"','127.0.0.1','2014-08-12 21:12:58','admin','maleta_detalle',5,'','',1,1,NULL,NULL,'2014-08-12 21:12:58','2014-08-12 21:12:58'),(155,'Se elimino un articulo de la maleta del usuario \"daniel\"','127.0.0.1','2014-08-12 21:14:18','admin','maleta_detalle',5,'','',1,1,NULL,NULL,'2014-08-12 21:14:18','2014-08-12 21:14:18'),(156,'Se elimino un articulo de la maleta del usuario \"daniel\"','127.0.0.1','2014-08-12 21:14:43','admin','maleta_detalle',5,'','',1,1,NULL,NULL,'2014-08-12 21:14:43','2014-08-12 21:14:43'),(157,'Se elimino un articulo de la maleta del usuario \"daniel\"','127.0.0.1','2014-08-12 21:15:20','admin','maleta_detalle',5,'','',1,1,NULL,NULL,'2014-08-12 21:15:20','2014-08-12 21:15:20'),(158,'Se elimino un articulo de la maleta del usuario \"daniel\"','127.0.0.1','2014-08-12 21:15:33','admin','maleta_detalle',5,'','',1,1,NULL,NULL,'2014-08-12 21:15:33','2014-08-12 21:15:33'),(159,'Se elimino un articulo de la maleta del usuario \"daniel\"','127.0.0.1','2014-08-12 21:49:31','admin','maleta_detalle',5,'','',1,1,NULL,NULL,'2014-08-12 21:49:31','2014-08-12 21:49:31'),(160,'Se elimino un articulo de la maleta del usuario \"daniel\"','127.0.0.1','2014-08-12 21:49:57','admin','maleta_detalle',5,'','',1,1,NULL,NULL,'2014-08-12 21:49:57','2014-08-12 21:49:57'),(161,'Se elimino un articulo de la maleta del usuario \"daniel\"','127.0.0.1','2014-08-12 21:50:26','admin','maleta_detalle',5,'','',1,1,NULL,NULL,'2014-08-12 21:50:26','2014-08-12 21:50:26'),(162,'Se agrego la maleta del usuario \"admin\"','127.0.0.1','2014-08-12 21:50:59','admin','maleta',6,'','',1,1,NULL,NULL,'2014-08-12 21:50:59','2014-08-12 21:50:59'),(163,'Se agregaron \"10\" articulos a la maleta del usuario \"admin\"','127.0.0.1','2014-08-12 21:51:23','admin','maleta_detalle',6,'','',1,1,NULL,NULL,'2014-08-12 21:51:23','2014-08-12 21:51:23'),(164,'Se elimino un articulo de la maleta del usuario \"admin\"','127.0.0.1','2014-08-12 21:51:36','admin','maleta_detalle',6,'','',1,1,NULL,NULL,'2014-08-12 21:51:36','2014-08-12 21:51:36'),(165,'Se edito la cantidad del articulo \"A0001\" de color \"Negro\" en la maleta del usuario \"admin\"','127.0.0.1','2014-08-12 21:57:01','admin','maleta_detalle',6,'','',1,1,NULL,NULL,'2014-08-12 21:57:01','2014-08-12 21:57:01'),(166,'Acceso','127.0.0.1','2014-08-12 22:50:51','admin','usuario',0,NULL,NULL,1,1,NULL,NULL,'2014-08-12 22:50:51','2014-08-12 22:50:51'),(167,'Se agrego el material \"Polietireno\"','127.0.0.1','2014-08-12 23:19:15','admin','material',0,'','',1,1,NULL,NULL,'2014-08-12 23:19:15','2014-08-12 23:19:15'),(168,'Se edito el material \"Vidrio\"','127.0.0.1','2014-08-12 23:22:42','admin','material',0,'','',1,1,NULL,NULL,'2014-08-12 23:22:42','2014-08-12 23:22:42'),(169,'Se elimino el material \"Vidrio\"','127.0.0.1','2014-08-12 23:28:03','admin','material',0,'','',1,1,NULL,NULL,'2014-08-12 23:28:03','2014-08-12 23:28:03'),(170,'Se elimino el material \"Polietireno\"','127.0.0.1','2014-08-12 23:28:38','admin','material',0,'','',1,1,NULL,NULL,'2014-08-12 23:28:38','2014-08-12 23:28:38'),(171,'Se agrego el material \"Vidrio\"','127.0.0.1','2014-08-12 23:29:20','admin','material',0,'','',1,1,NULL,NULL,'2014-08-12 23:29:20','2014-08-12 23:29:20'),(172,'Se edito el material \"Vidrio\"','127.0.0.1','2014-08-12 23:29:26','admin','material',0,'','',1,1,NULL,NULL,'2014-08-12 23:29:26','2014-08-12 23:29:26'),(173,'Se elimino el material \"Vidrio\"','127.0.0.1','2014-08-12 23:29:31','admin','material',0,'','',1,1,NULL,NULL,'2014-08-12 23:29:31','2014-08-12 23:29:31'),(174,'Se agrego el material \"Vidrio\"','127.0.0.1','2014-08-12 23:29:58','admin','material',0,'','',1,1,NULL,NULL,'2014-08-12 23:29:58','2014-08-12 23:29:58'),(175,'Se elimino un articulo de la maleta del usuario \"admin\"','127.0.0.1','2014-08-12 23:30:41','admin','maleta_detalle',6,'','',1,1,NULL,NULL,'2014-08-12 23:30:41','2014-08-12 23:30:41'),(176,'Se elimino la maleta del usuario \"admin\"','127.0.0.1','2014-08-12 23:32:14','admin','maleta',6,'','',1,1,NULL,NULL,'2014-08-12 23:32:14','2014-08-12 23:32:14'),(177,'Acceso','127.0.0.1','2014-08-12 23:54:37','admin','usuario',0,NULL,NULL,1,1,NULL,NULL,'2014-08-12 23:54:37','2014-08-12 23:54:37'),(178,'Se agrego el proceso extra \"Anti - Reflectivo\"','127.0.0.1','2014-08-12 23:57:16','admin','proceso_extra',0,'','',1,1,NULL,NULL,'2014-08-12 23:57:16','2014-08-12 23:57:16'),(179,'Se agrego el proceso extra \"Anti - Reflectivo\"','127.0.0.1','2014-08-12 23:57:38','admin','proceso_extra',0,'','',1,1,NULL,NULL,'2014-08-12 23:57:38','2014-08-12 23:57:38'),(180,'Se edito el proceso extra \"Anti - Reflectivo\"','127.0.0.1','2014-08-12 23:59:35','admin','proceso_extra',0,'','',1,1,NULL,NULL,'2014-08-12 23:59:35','2014-08-12 23:59:35'),(182,'Se elimino el proceso extra \"Anti - Reflectivo\"','127.0.0.1','2014-08-13 00:02:27','admin','proceso_extra',0,'','',1,1,NULL,NULL,'2014-08-13 00:02:27','2014-08-13 00:02:27'),(183,'Se agrego el proceso extra \"Anti - Reflectivo\"','127.0.0.1','2014-08-13 00:03:23','admin','proceso_extra',0,'','',1,1,NULL,NULL,'2014-08-13 00:03:23','2014-08-13 00:03:23'),(184,'Se agrego el proceso extra \"Fotogrey\"','127.0.0.1','2014-08-13 00:04:14','admin','proceso_extra',0,'','',1,1,NULL,NULL,'2014-08-13 00:04:14','2014-08-13 00:04:14'),(185,'Se edito el proceso extra \"Fotogrey\"','127.0.0.1','2014-08-13 00:04:19','admin','proceso_extra',0,'','',1,1,NULL,NULL,'2014-08-13 00:04:19','2014-08-13 00:04:19'),(186,'Se elimino el proceso extra \"Fotogrey\"','127.0.0.1','2014-08-13 00:04:24','admin','proceso_extra',0,'','',1,1,NULL,NULL,'2014-08-13 00:04:24','2014-08-13 00:04:24');
/*!40000 ALTER TABLE `bitacora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `color`
--

DROP TABLE IF EXISTS `color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `color`
--

LOCK TABLES `color` WRITE;
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
INSERT INTO `color` VALUES (1,'Cafe','admin','admin','2014-08-09 14:53:06','2014-08-09 14:53:06'),(3,'Negro','admin','admin','2014-08-09 14:54:29','2014-08-09 14:54:29'),(4,'Blanco','admin','admin','2014-08-09 14:54:33','2014-08-09 14:54:33'),(5,'Cromado','admin','admin','2014-08-09 14:54:38','2014-08-09 14:54:38'),(6,'Rojo','admin','admin','2014-08-09 14:54:43','2014-08-09 14:54:43'),(7,'Morado/Purpura','admin','admin','2014-08-09 14:54:53','2014-08-09 14:54:53'),(8,'Azul','admin','admin','2014-08-09 23:09:50','2014-08-09 23:09:50'),(9,'Magenta','admin','admin','2014-08-09 23:10:57','2014-08-09 23:10:57'),(10,'Rosado','admin','admin','2014-08-10 13:30:38','2014-08-10 13:30:38'),(11,'Cobalto','admin','admin','2014-08-10 13:30:52','2014-08-10 13:30:52'),(12,'Siena','admin','admin','2014-08-10 13:31:05','2014-08-10 13:31:05');
/*!40000 ALTER TABLE `color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dia`
--

DROP TABLE IF EXISTS `dia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dia`
--

LOCK TABLES `dia` WRITE;
/*!40000 ALTER TABLE `dia` DISABLE KEYS */;
INSERT INTO `dia` VALUES (1,'Lunes'),(2,'Martes'),(3,'Miercoles'),(4,'Jueves'),(5,'Viernes'),(6,'Sabado'),(7,'Domingo');
/*!40000 ALTER TABLE `dia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horario`
--

DROP TABLE IF EXISTS `horario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dia_id` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `horario_FI_1` (`dia_id`),
  CONSTRAINT `horario_FK_1` FOREIGN KEY (`dia_id`) REFERENCES `dia` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horario`
--

LOCK TABLES `horario` WRITE;
/*!40000 ALTER TABLE `horario` DISABLE KEYS */;
INSERT INTO `horario` VALUES (1,1,'07:00:00','23:55:00'),(2,2,'07:00:00','23:55:00'),(3,3,'07:00:00','23:55:00'),(4,4,'07:00:00','23:55:00'),(5,5,'07:00:00','23:55:00'),(6,6,'07:00:00','23:55:00'),(7,7,'07:00:00','23:55:00'),(8,1,'07:00:00','15:00:00'),(9,2,'07:00:00','15:00:00'),(10,3,'07:00:00','15:00:00'),(11,4,'07:00:00','15:00:00'),(12,5,'07:00:00','15:00:00'),(13,6,'00:00:00','00:00:00'),(14,7,'00:00:00','00:00:00');
/*!40000 ALTER TABLE `horario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventario`
--

DROP TABLE IF EXISTS `inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(100) NOT NULL,
  `color_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `costo` double NOT NULL,
  `venta` double NOT NULL,
  `descripcion` text,
  `imagen` text,
  `sede_id` int(11) NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inventario_FI_1` (`color_id`),
  KEY `inventario_FI_2` (`sede_id`),
  CONSTRAINT `inventario_FK_1` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`),
  CONSTRAINT `inventario_FK_2` FOREIGN KEY (`sede_id`) REFERENCES `sede` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventario`
--

LOCK TABLES `inventario` WRITE;
/*!40000 ALTER TABLE `inventario` DISABLE KEYS */;
INSERT INTO `inventario` VALUES (2,'A0001',3,25,200,500,'Modelo Harley Davidson',NULL,2,NULL,NULL,'2014-08-11 20:53:08','2014-08-12 23:30:41'),(3,'A0002',4,6,300,400,'Diseño de temporada de verano',NULL,1,NULL,NULL,'2014-08-11 22:19:03','2014-08-11 23:32:03'),(4,'A0001',5,5,300,500,'DIseño Harley Davidson Luxe',NULL,2,NULL,NULL,'2014-08-11 22:27:20','2014-08-11 23:26:38');
/*!40000 ALTER TABLE `inventario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maleta`
--

DROP TABLE IF EXISTS `maleta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maleta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `maleta_FI_2` (`usuario_id`),
  KEY `maleta_FI_1` (`usuario_id`),
  CONSTRAINT `maleta_FK_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maleta`
--

LOCK TABLES `maleta` WRITE;
/*!40000 ALTER TABLE `maleta` DISABLE KEYS */;
INSERT INTO `maleta` VALUES (5,500,4);
/*!40000 ALTER TABLE `maleta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maleta_detalle`
--

DROP TABLE IF EXISTS `maleta_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maleta_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) NOT NULL,
  `inventario_id` int(11) NOT NULL,
  `maleta_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `maleta_detalle_FI_1` (`maleta_id`),
  KEY `maleta_detalle_FI_2` (`inventario_id`),
  CONSTRAINT `maleta_detalle_FK_1` FOREIGN KEY (`maleta_id`) REFERENCES `maleta` (`id`),
  CONSTRAINT `maleta_detalle_FK_2` FOREIGN KEY (`inventario_id`) REFERENCES `inventario` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maleta_detalle`
--

LOCK TABLES `maleta_detalle` WRITE;
/*!40000 ALTER TABLE `maleta_detalle` DISABLE KEYS */;
INSERT INTO `maleta_detalle` VALUES (5,2,3,5),(7,5,2,5);
/*!40000 ALTER TABLE `maleta_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text,
  `costo` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material`
--

LOCK TABLES `material` WRITE;
/*!40000 ALTER TABLE `material` DISABLE KEYS */;
INSERT INTO `material` VALUES (4,'Vidrio','Con este material se consigue una vista mucho mas nitida en las gafas',50);
/*!40000 ALTER TABLE `material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material_proceso_extra`
--

DROP TABLE IF EXISTS `material_proceso_extra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material_proceso_extra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `material_id` int(11) NOT NULL,
  `proceso_extra_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `material_proceso_extra_FI_1` (`material_id`),
  KEY `material_proceso_extra_FI_2` (`proceso_extra_id`),
  CONSTRAINT `material_proceso_extra_FK_2` FOREIGN KEY (`proceso_extra_id`) REFERENCES `proceso_extra` (`id`) ON DELETE CASCADE,
  CONSTRAINT `material_proceso_extra_FK_1` FOREIGN KEY (`material_id`) REFERENCES `material` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material_proceso_extra`
--

LOCK TABLES `material_proceso_extra` WRITE;
/*!40000 ALTER TABLE `material_proceso_extra` DISABLE KEYS */;
/*!40000 ALTER TABLE `material_proceso_extra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `ruta` varchar(45) NOT NULL,
  `icono` varchar(45) NOT NULL,
  `superior` int(45) NOT NULL,
  `visible` int(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'Catalogos','#','fa fa-book',0,1),(2,'Seguridad','#','fa fa-shield',0,1),(3,'Usuarios','Invision_SoporteBundle_Usuario_list','fa fa-group',2,1),(4,'Reportes','#','fa fa-clipboard',0,1),(5,'Bitacora','bitacora','fa fa-calendar',4,1),(6,'Perfiles','Invision_SoporteBundle_Perfil_list','fa fa-sitemap',2,1),(7,'colores','Invision_InventarioBundle_Color_list','fa fa-tint',1,1),(8,'Inventario','Invision_InventarioBundle_Inventario_list','fa fa-bars',1,1),(9,'Consultas','#','fa fa-search',0,1),(10,'Inventario','busqueda_inventario','fa fa-bars',9,1),(11,'Movimientos','#','fa fa-random',0,1),(12,'Procesos','#','fa fa-gear',0,1),(13,'Tipos de sede','Invision_SoporteBundle_TipoSede_list','fa fa-cubes',2,1),(14,'Sedes','Invision_SoporteBundle_Sede_list','fa fa-home',2,1),(15,'Maletas','Invision_InventarioBundle_Maleta_list','fa fa-briefcase',1,1),(16,'Materiales','Invision_InventarioBundle_Material_list','fa fa-puzzle-piece',1,1),(17,'Procesos extras','Invision_InventarioBundle_ProcesoExtra_list','fa fa-flask',1,1);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` VALUES (1,'Administrador','Admin',NULL,NULL,NULL,NULL),(2,'Supervisor','Gerente de sección','admin','admin','2014-08-09 14:59:10','2014-08-09 14:59:10');
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil_menu`
--

DROP TABLE IF EXISTS `perfil_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `perfil_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `perfil_menu_FI_1` (`perfil_id`),
  KEY `perfil_menu_FI_2` (`menu_id`),
  CONSTRAINT `perfil_menu_FK_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `perfil_menu_FK_2` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil_menu`
--

LOCK TABLES `perfil_menu` WRITE;
/*!40000 ALTER TABLE `perfil_menu` DISABLE KEYS */;
INSERT INTO `perfil_menu` VALUES (27,1,1,'admin','admin','2014-08-09 22:52:17','2014-08-09 22:52:17'),(28,1,2,'admin','admin','2014-08-09 22:52:17','2014-08-09 22:52:17'),(29,1,3,'admin','admin','2014-08-09 22:52:17','2014-08-09 22:52:17'),(30,1,4,'admin','admin','2014-08-09 22:52:17','2014-08-09 22:52:17'),(31,1,5,'admin','admin','2014-08-09 22:52:17','2014-08-09 22:52:17'),(32,1,6,'admin','admin','2014-08-09 22:52:17','2014-08-09 22:52:17'),(33,1,7,'admin','admin','2014-08-09 22:52:17','2014-08-09 22:52:17'),(34,1,8,'admin','admin','2014-08-09 22:52:17','2014-08-09 22:52:17'),(35,1,9,'admin','admin','2014-08-09 22:52:17','2014-08-09 22:52:17'),(36,1,10,'admin','admin','2014-08-09 22:52:17','2014-08-09 22:52:17'),(37,1,11,'admin','admin','2014-08-09 22:52:17','2014-08-09 22:52:17'),(38,1,12,'admin','admin','2014-08-09 22:52:17','2014-08-09 22:52:17'),(39,2,1,NULL,NULL,'2014-08-10 16:27:37','2014-08-10 16:27:37'),(40,2,7,NULL,NULL,'2014-08-10 16:27:38','2014-08-10 16:27:38'),(41,2,8,NULL,NULL,'2014-08-10 16:27:38','2014-08-10 16:27:38'),(42,2,9,NULL,NULL,'2014-08-10 16:27:38','2014-08-10 16:27:38'),(43,2,10,NULL,NULL,'2014-08-10 16:27:38','2014-08-10 16:27:38'),(44,1,13,NULL,NULL,NULL,NULL),(45,1,14,NULL,NULL,NULL,NULL),(46,1,15,NULL,NULL,NULL,NULL),(47,1,16,NULL,NULL,NULL,NULL),(48,1,17,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `perfil_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proceso_extra`
--

DROP TABLE IF EXISTS `proceso_extra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proceso_extra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text,
  `costo` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proceso_extra`
--

LOCK TABLES `proceso_extra` WRITE;
/*!40000 ALTER TABLE `proceso_extra` DISABLE KEYS */;
INSERT INTO `proceso_extra` VALUES (2,'Anti - Reflectivo','Este proceso se recomienda principalmente para quienes pasan largos periodos de tiempo en el ordenador.',50);
/*!40000 ALTER TABLE `proceso_extra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `propel_migration`
--

DROP TABLE IF EXISTS `propel_migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `propel_migration` (
  `version` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propel_migration`
--

LOCK TABLES `propel_migration` WRITE;
/*!40000 ALTER TABLE `propel_migration` DISABLE KEYS */;
INSERT INTO `propel_migration` VALUES (1407908329);
/*!40000 ALTER TABLE `propel_migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sede`
--

DROP TABLE IF EXISTS `sede`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sede` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `tipo_sede_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sede_FI_1` (`tipo_sede_id`),
  CONSTRAINT `sede_FK_1` FOREIGN KEY (`tipo_sede_id`) REFERENCES `tipo_sede` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sede`
--

LOCK TABLES `sede` WRITE;
/*!40000 ALTER TABLE `sede` DISABLE KEYS */;
INSERT INTO `sede` VALUES (1,'Clinica central',NULL,NULL,1),(2,'Laboratorio central',NULL,NULL,3);
/*!40000 ALTER TABLE `sede` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_sede`
--

DROP TABLE IF EXISTS `tipo_sede`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_sede` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_sede`
--

LOCK TABLES `tipo_sede` WRITE;
/*!40000 ALTER TABLE `tipo_sede` DISABLE KEYS */;
INSERT INTO `tipo_sede` VALUES (1,'Clinica',NULL),(3,'Laboratorio',NULL);
/*!40000 ALTER TABLE `tipo_sede` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `dpi` varchar(255) DEFAULT NULL,
  `perfil_id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `ultimo_cambio_password` date DEFAULT NULL,
  `sede_id` int(11) NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_FI_1` (`perfil_id`),
  KEY `usuario_FI_2` (`sede_id`),
  CONSTRAINT `usuario_FK_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id`),
  CONSTRAINT `usuario_FK_2` FOREIGN KEY (`sede_id`) REFERENCES `sede` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (3,'Administrador','javierhabieru@gmail.com',NULL,'General',NULL,1,'admin','e0f35b93d054740a2807ba25bd057168bb7dcd40',NULL,'1994-12-14',NULL,1,'admin','admin','2014-08-09 22:24:38','2014-08-09 23:19:55'),(4,'Daniel','ejemplo@ejemplo.com',NULL,'Cute',NULL,2,'daniel','87cf2a843e2e43a05edc326327fca7e1388bc196',NULL,'1986-12-14',NULL,1,NULL,NULL,'2014-08-10 16:26:45','2014-08-10 16:49:03');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_horario`
--

DROP TABLE IF EXISTS `usuario_horario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_horario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `horario_id` int(11) NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_horario_FI_1` (`usuario_id`),
  KEY `usuario_horario_FI_2` (`horario_id`),
  CONSTRAINT `usuario_horario_FK_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `usuario_horario_FK_2` FOREIGN KEY (`horario_id`) REFERENCES `horario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_horario`
--

LOCK TABLES `usuario_horario` WRITE;
/*!40000 ALTER TABLE `usuario_horario` DISABLE KEYS */;
INSERT INTO `usuario_horario` VALUES (60,3,1,'admin','admin','2014-08-09 23:20:03','2014-08-09 23:20:03'),(61,3,9,'admin','admin','2014-08-09 23:20:03','2014-08-09 23:20:03'),(62,3,10,'admin','admin','2014-08-09 23:20:03','2014-08-09 23:20:03'),(63,3,11,'admin','admin','2014-08-09 23:20:03','2014-08-09 23:20:03'),(64,3,12,'admin','admin','2014-08-09 23:20:03','2014-08-09 23:20:03'),(65,3,6,'admin','admin','2014-08-09 23:20:03','2014-08-09 23:20:03'),(66,3,7,'admin','admin','2014-08-09 23:20:03','2014-08-09 23:20:03'),(67,4,8,NULL,NULL,'2014-08-10 16:26:45','2014-08-10 16:26:45'),(68,4,9,NULL,NULL,'2014-08-10 16:26:45','2014-08-10 16:26:45'),(69,4,10,NULL,NULL,'2014-08-10 16:26:45','2014-08-10 16:26:45'),(70,4,11,NULL,NULL,'2014-08-10 16:26:45','2014-08-10 16:26:45'),(71,4,12,NULL,NULL,'2014-08-10 16:26:45','2014-08-10 16:26:45');
/*!40000 ALTER TABLE `usuario_horario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-08-13  0:05:24
