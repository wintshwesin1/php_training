-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: auth
-- ------------------------------------------------------
-- Server version	8.0.28

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
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(200) NOT NULL,
  `reset_link_token` varchar(255) DEFAULT NULL,
  `exp_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (14,'admin','admin@gmail.com','0192023a7bbd73250516f069df18b500',NULL,NULL,'2022-02-22 02:54:08','2022-02-24 07:43:06'),(15,'wss','wint1shwe21sin1997@gmail.com','9dda76286167eea792cb0c35356ff02c','ca93806d03f4de482521ba472e44488d8112','2022-02-25 22:00:30','2022-02-23 02:54:08','2022-02-25 04:22:58'),(18,'cho','cho@gmail.com','a9e09a27007f8e8bad58d68c3f2fa4de',NULL,NULL,'2022-02-23 03:55:54',NULL),(19,'jay','jay@gmail.com','f0e7d0d17cff891edbc9cdf92dcd9297',NULL,NULL,'2022-02-21 03:59:08',NULL),(20,'john','john@gmail.com','6e0b7076126a29d5dfcbd54835387b7b',NULL,NULL,'2022-02-24 04:33:19','2022-02-23 08:15:46'),(21,'ingyin','ingyin@gmail.com','27359be4b8f3357648f40fa46b6c9095',NULL,NULL,'2022-02-24 04:39:41','2022-02-23 08:13:02'),(22,'joe','joe@gmail.com','50d1b87fb44094fe7485bdd2b292f83c',NULL,NULL,'2022-02-23 08:16:15',NULL),(23,'wintshwesin','wintshwesin211@gmail.com','9dda76286167eea792cb0c35356ff02c',NULL,NULL,'2022-02-24 06:13:24','2022-02-24 07:41:45'),(24,'shwe','shwe@gmail.com','fa80a12377040b4590616bceac44448d',NULL,NULL,'2022-02-24 06:22:20',NULL),(30,'poe','poe@gmail.com','815dbf94c2680321e98ebe24dd5182ad',NULL,NULL,'2022-02-24 06:39:09',NULL),(32,'chit','chit@gmail.com','605d5716a7072dfb3dee769bdc36f7ef',NULL,NULL,'2022-02-24 07:12:56',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-02-25 11:11:44
