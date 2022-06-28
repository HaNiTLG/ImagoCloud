-- MySQL dump 10.19  Distrib 10.3.34-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: imagodb
-- ------------------------------------------------------
-- Server version	10.3.34-MariaDB-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `uploaded_imagomedias`
--

DROP TABLE IF EXISTS `uploaded_imagomedias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uploaded_imagomedias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `new_name` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `upload_date` date DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uploaded_imagomedias`
--

LOCK TABLES `uploaded_imagomedias` WRITE;
/*!40000 ALTER TABLE `uploaded_imagomedias` DISABLE KEYS */;
INSERT INTO `uploaded_imagomedias` VALUES (1,'Untitled Diagram.drawio (7).png','2604221651002311Untitled Diagram.drawio (7).png','62684bc7954bf',0,'hani','2022-05-15','https://imagocloud.gutti.rocks/webinterface/download.php?token=62684bc7954bf'),(9,'photoOfAPlant.jpg','2604221651006253photoOfAPlant.jpg','62685b2d6e398',0,'PhilK','2022-04-26','https://imagocloud.gutti.rocks/webinterface/download.php?token=62685b2d6e398'),(10,'Kompensation ALDA.jpg','2604221651006972Kompensation ALDA.jpg','62685dfc33fb8',0,'PhilK','2022-04-26','https://imagocloud.gutti.rocks/webinterface/download.php?token=62685dfc33fb8'),(11,'Klausur_SecAT_SS_21_8 - 83.jpg','2604221651007045Klausur_SecAT_SS_21_8 - 83.jpg','62685e455087a',0,'PhilK','2022-04-26','https://imagocloud.gutti.rocks/webinterface/download.php?token=62685e455087a'),(13,'st_logo.png','2704221651022191st_logo.png','6268996f4e911',0,'edis','2022-04-27','https://imagocloud.gutti.rocks/webinterface/download.php?token=6268996f4e911'),(14,'wildfly_logo.png','2704221651022233wildfly_logo.png','62689999738ac',0,'edis','2022-04-27','https://imagocloud.gutti.rocks/webinterface/download.php?token=62689999738ac'),(15,'jbosscommunity_logo_hori_white.png','2704221651022254jbosscommunity_logo_hori_white.png','626899ae67c2e',0,'edis','2022-04-27','https://imagocloud.gutti.rocks/webinterface/download.php?token=626899ae67c2e'),(17,'favicon.ico','2704221651093686favicon.ico','6269b0b6d1666',0,'edis','2022-04-27','https://imagocloud.gutti.rocks/webinterface/download.php?token=6269b0b6d1666'),(18,'89bc3f59-1f68-4ab5-baf7-eda69f357679.JPG','280422165117807389bc3f59-1f68-4ab5-baf7-eda69f357679.JPG','626afa59e672d',0,'Reumi','2022-04-28','https://imagocloud.gutti.rocks/webinterface/download.php?token=626afa59e672d'),(25,'89bc3f59-1f68-4ab5-baf7-eda69f357679.JPG','220622165591729689bc3f59-1f68-4ab5-baf7-eda69f357679.JPG','62b34af0e50c4',0,'test','2022-06-22','https://imagocloud.gutti.rocks/webinterface/download.php?token=62b34af0e50c4'),(28,'MazeEscape.png','2206221655935800MazeEscape.png','62b39338ebec6',0,'hani','2022-06-22','https://imagocloud.gutti.rocks/webinterface/download.php?token=62b39338ebec6');
/*!40000 ALTER TABLE `uploaded_imagomedias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `useraccounts`
--

DROP TABLE IF EXISTS `useraccounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `useraccounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `useraccounts`
--

LOCK TABLES `useraccounts` WRITE;
/*!40000 ALTER TABLE `useraccounts` DISABLE KEYS */;
INSERT INTO `useraccounts` VALUES (1,'hani','$2y$10$3R6kDqE7QlHa65FD.P0M9uaA4V5OLv412DC6akkLheXqQ53crUR2C','2022-04-24 16:32:11'),(2,'test','$2y$10$3R6kDqE7QlHa65FD.P0M9uaA4V5OLv412DC6akkLheXqQ53crUR2C','2022-04-25 23:14:15'),(3,'julian','$2y$10$2.vCNJZP2eyinqZm9sUGcuq.283.VGjqL/K98y8fkopvjaZKUV8by','2022-04-25 23:49:37'),(4,'gutti','$2y$10$jzEOxjCw5A9njP8WL.1bq.zmkaQo..pKc1dlY182Ivtj2g1DcCC7y','2022-04-26 20:00:16'),(5,'PhilK','$2y$10$frLVqgD3o6Y/5NA4APAyeugg5dMv274R9jM6N1t35rAHHu83xKK1u','2022-04-26 20:47:41'),(6,'kinghanidererste','$2y$10$9y/hyvsHRTOak1dX4gk8ve7MPdY/QQPCczuIBzSp9y6uIFZNMwTkq','2022-04-26 20:59:48'),(7,'teeessttt','$2y$10$x5TGNO.qS2MHyFi6g7SqbObFzXHvC27DUaBPbOkyTnnOQLYmyTt0O','2022-04-26 21:20:45'),(8,'Juliansen','$2y$10$KZorHyRPUR0gG.PAHvYw4.1nvFe7q3FNIP5fgslpfEIhhWF.TqQBS','2022-04-28 20:33:36'),(9,'Reumi','$2y$10$jsX./9sIe9Pd.1ohm3TGn.gCoy2i6aB1YhV9a1tJrGvqQmX.1/k7G','2022-04-28 20:34:12'),(10,'hani22','$2y$10$9Ld42XdbkTPFxN.wSXDZ3uQDhrPUZ3psp7WYAoqQCcHYabZtjhkdi','2022-04-30 08:08:58');
/*!40000 ALTER TABLE `useraccounts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-27 21:08:02
