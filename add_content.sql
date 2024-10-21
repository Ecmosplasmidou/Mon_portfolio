-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: portfolio
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `lien` varchar(255) DEFAULT NULL,
  `github` varchar(255) DEFAULT NULL,
  `project_date` date DEFAULT NULL,
  `stack` varchar(255) DEFAULT NULL,
  `carousel_photos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`carousel_photos`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `instagram` varchar(255) DEFAULT NULL,
  `cms` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'Olympic Ticket Hub','<p><strong>&quot;Olympic Ticket Hub&quot;</strong> is a streamlined platform for purchasing tickets to the Olympic Games. It offers easy seat selection, secure payments, and real-time updates, providing a simple and efficient ticket-buying experience.</p>\r\n','images/athlete-feminine.jpg','https://jo-ticketing-site-e53a4a320f9f.herokuapp.com/','https://github.com/Ecmosplasmidou/site_jo_finale.git','2024-10-01','Python/Django/JS/Bootstrap','[\"images\\/jo_image_1.png\",\"images\\/jo_image_2.png\",\"images\\/jo_image_3.png\"]','2024-10-20 18:17:15','',''),(2,'Trendy-Paris','<p><strong>Dont be original, be unique!</strong></p>\r\n\r\n<p>Trendy Paris was my first e-commerce web project. Specialized in the sale of ÔÇïstreetwear clothing.</p>\r\n','images/trendy-paris.png','','','2021-10-13','HTML/CSS/JavaScript','[\"images\\/TP.jpg\",\"images\\/TP_1.jpg\",\"images\\/TP_2.jpg\"]','2024-10-21 09:43:16','https://www.instagram.com/trendypofficiel/','SHOPIFY'),(3,'Ecmosgotchi','<p><strong>Come to play with teh ecmosgotchi her:</strong></p>\r\n','images/ecmosgotchi_acceuil.png','https://ecmosgotchi-tamagotchi-by-ecmosdev.netlify.app/','','2024-03-13','HTML/CSS/JavaScript','[\"images\\/ecmosgotchi.png\",\"images\\/ecmosgotchi_2.png\",\"images\\/ecmosgotchi_3.png\"]','2024-10-21 11:58:21','','');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','$2y$10$6EVcPOcbzdR61Mu.SVvG3umptdl6aMSJ1GKuwkS/ruCPwA5msF0Yu','2024-10-21 09:23:24');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-21 17:22:27
