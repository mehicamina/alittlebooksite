-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: alittlebooksite
-- ------------------------------------------------------
-- Server version	8.0.23

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
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `addresses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `country` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `addresses_users_idx` (`user_id`),
  CONSTRAINT `addresses_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresses`
--

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
INSERT INTO `addresses` VALUES (1,1,NULL,NULL,NULL),(2,2,NULL,NULL,NULL),(3,2,'Bosnia and Herzegovina','Sarajevo','71000'),(4,2,'Bosnia & Herzegovina','Sarajevo','71000'),(6,3,'Bosnia and Herzegovina','Sarajevo','71000');
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `realise_year` year DEFAULT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'AVAILABLE',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'Alef',NULL,'Novel',NULL,'AVAIBLE'),(2,'Veronica Decides to Die',NULL,NULL,NULL,'AVAIBLE'),(3,'Veronica Decides to Die',NULL,NULL,NULL,'AVAIBLE'),(4,'Eleven minutes',NULL,NULL,NULL,'AVAIBLE'),(5,'Alchemic',NULL,NULL,NULL,'AVAIBLE'),(6,'Twelfth Angel',NULL,NULL,NULL,'AVAIBLE'),(7,'The Coice',NULL,NULL,NULL,'AVAIBLE'),(8,'The Greatest Salesman in the World',NULL,NULL,NULL,'AVAIBLE'),(9,'The Greatest Secret in the World',NULL,NULL,NULL,'AVAIBLE'),(10,'The Greatest Mistery in the World',NULL,NULL,NULL,'AVAIBLE'),(11,'The Monk Who Sold His Ferrari',NULL,NULL,NULL,'AVAIBLE'),(12,'xd','Paulo Coelho','Novel',2011,'ACTIVE'),(13,'string','Paulo Coelho','Novel',2011,'AVAILABLE');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_id` int NOT NULL,
  KEY `categories_books_idx` (`book_id`),
  CONSTRAINT `categories_books` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Science Fiction',1),(1,'Science Fiction',2),(1,'Science Fiction',2),(1,'Science Fiction',2),(1,'Science Fiction',2),(1,'Science Fiction',2),(1,'Science Fiction',2),(1,'Science Fiction',2),(1,'Science Fiction',2),(1,'Science Fiction',2),(1,'Science Fiction',2),(1,'Science Fiction',2),(1,'Science Fiction',2),(1,'Science Fiction',2),(1,'Science Fiction',2),(1,'Science Fiction',2),(1,'Science Fiction',2),(1,'Science Fiction',2),(1,'Science Fiction',2),(1,'Science Fiction',2),(1,'Science Fiction',2),(1,'Science Fiction',2),(1,'Science Fiction',2),(1,'Science Fiction',2),(1,'Science Fiction',2),(1,'Science Fiction',2),(1,'Science Fiction',2),(1,'Science Fiction',2),(1,'Science Fiction',2),(1,'Science Fiction',2),(1,'Science Fiction',2),(1,'Science Fiction',2),(1,'Science Fiction',2),(1,'Science Fiction',2),(2,'Novel',3),(3,'Novellllll',3);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rentals`
--

DROP TABLE IF EXISTS `rentals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rentals` (
  `id` int NOT NULL,
  `book_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `rental_date` int DEFAULT NULL,
  `return_date` int DEFAULT NULL,
  KEY `rentals_books_idx` (`book_id`),
  KEY `rentals_users_idx` (`user_id`),
  CONSTRAINT `rentals_books` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  CONSTRAINT `rentals_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rentals`
--

LOCK TABLES `rentals` WRITE;
/*!40000 ALTER TABLE `rentals` DISABLE KEYS */;
INSERT INTO `rentals` VALUES (1,2,2,1310,22222);
/*!40000 ALTER TABLE `rentals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT 'PENDING',
  `role` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT 'USER',
  `token` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Amina','Mehic','061','Sarajevo','amina@mehic.xd','amina3',NULL,'user',NULL),(2,'Emina','Mehic Sero',NULL,NULL,' emi@mehic.ba','567',NULL,'user',NULL),(3,'faris','bektas','061833538','Streljacka','faris@bekta.me','1234444',NULL,'user',NULL),(5,'beka','fare',NULL,'Streljacka','farisbektas0@gmail.com','01cfcd4f6b8770febfb40cb906715822',NULL,'user',NULL),(7,'emina','b',NULL,'Bistrik','eminab0@gmail.com','698d51a19d8a121ce581499d7b701668','ACTIVE','USER','e5dff5204fcc12928859c121260173a4'),(8,'Beka2','Beka',NULL,'My Address','farisbeka@gmail.com','321','PENDING','USER',NULL);
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

-- Dump completed on 2021-06-27 15:08:47
