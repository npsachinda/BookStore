-- MySQL dump 10.13  Distrib 5.7.30, for Linux (x86_64)
--
-- Host: localhost    Database: bookstore
-- ------------------------------------------------------
-- Server version	5.7.30-0ubuntu0.18.04.1

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
-- Table structure for table `author`
--

DROP TABLE IF EXISTS `author`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci,
  `contact` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `author`
--

LOCK TABLES `author` WRITE;
/*!40000 ALTER TABLE `author` DISABLE KEYS */;
INSERT INTO `author` VALUES (1,'Saman Wickramarachchi',NULL,NULL),(2,'Darshana Shammi Wijethilake',NULL,NULL),(3,'Jayathika Kammalaweera',NULL,NULL),(4,'Kevin Kwan',NULL,NULL),(5,'Nicholas Sparks',NULL,NULL),(6,'Daniel Steel',NULL,NULL),(7,'Alwyn Hamilton',NULL,NULL),(8,'Mahinda Prasad Masimbula',NULL,NULL),(9,'Wimal Udaya Hapugodaarachchi',NULL,NULL),(10,'Hailey Edwards',NULL,NULL),(11,'Paul M.M Cooper',NULL,NULL),(12,'Susitha Ruwan',NULL,NULL),(13,'Dick King-Smith',NULL,NULL),(14,'J.B Dissanayake',NULL,NULL),(15,'Janaki Suriyarachchi',NULL,NULL),(16,'Rupa Sriyani Ekanayake',NULL,NULL),(17,'S. Ayagama',NULL,NULL),(18,'Athula R. Perera',NULL,NULL),(19,'Sibil Weththasinghe',NULL,NULL),(20,'Piyawathi Jayasuriya',NULL,NULL),(21,'Asanga Jayasuriya',NULL,NULL);
/*!40000 ALTER TABLE `author` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `isbn` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `unit_price` decimal(7,2) NOT NULL,
  `preview_img_path` longtext COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `created_by` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `category_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `publication_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4A1B2A92F675F31B` (`author_id`),
  KEY `IDX_4A1B2A9238B217A7` (`publication_id`),
  KEY `FK_4A1B2A9212469DE2` (`category_id`),
  CONSTRAINT `FK_4A1B2A9212469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `FK_4A1B2A9238B217A7` FOREIGN KEY (`publication_id`) REFERENCES `publication` (`id`),
  CONSTRAINT `FK_4A1B2A92F675F31B` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'Appachchi awith','Ghost','665184','Sinhala',450.00,'images/book_previews/1.jpg',45,'1','2020-06-11 00:00:00',2,1,1),(2,'Asanaga Wesi','Story','25355','Sinhala',875.00,'images/book_previews/2.jpg',56,'1','2020-06-11 00:00:00',2,2,2),(3,'Asandhimiththa','Love Story','2641616','Sinhala',990.00,'images/book_previews/3.jpg',8,'1','2020-06-11 00:00:00',2,1,1),(4,'Chakra','Story','6451495','Sinhala',420.00,'images/book_previews/4.jpg',95,'1','2020-06-12 00:00:00',2,3,4),(5,'Crazy Rich Asians','Asian story','955252','English',780.00,'images/book_previews/5.jpg',21,'1','2020-06-11 00:00:00',2,4,3),(6,'Every Breath','Love Story','56595','English',1550.00,'images/book_previews/6.jpg',23,'1','2020-06-11 00:00:00',2,5,3),(7,'In His Father Footsteps','Father story','6596555','English',2150.00,'images/book_previews/7.jpg',12,'1','2020-06-11 00:00:00',2,6,3),(8,'Rebel-Of-The-Sands','','19465191','English',1700.00,'images/book_previews/8.jpg',6,'1','2020-06-11 00:00:00',2,7,3),(9,'Senkottan','Village Story','1646115','Sinhala',590.00,'images/book_previews/9.jpg',59,'1','2020-06-11 00:00:00',2,8,1),(10,'Yakada Silpara','Story','64946111','Sinhala',860.00,'images/book_previews/10.jpg',12,'1','2020-06-11 00:00:00',2,9,2),(11,'Rise-Against-The-Foundling-Series','Novel','29815','English',2920.00,'images/book_previews/11.jpg',5,'1','2020-06-12 00:00:00',2,10,3),(12,'River-Of-Ink','Novel','26845','English',525.00,'images/book_previews/12.jpg',92,'1','2020-06-13 00:00:00',2,11,3),(13,'Sarwanasha','Story','774233','Sinhala',960.00,'images/book_previews/13.jpg',6,'1','2020-06-14 00:00:00',2,12,4),(14,'The Water Horse','Adventure','9495165','English',1560.00,'images/book_previews/14.jpg',16,'1','2020-06-11 00:00:00',2,13,3),(15,'Abara Sil gaththu Heti','Children','56525','Sinhala',150.00,'images/book_previews/15.jpg',56,'1','2020-06-11 00:00:00',1,14,5),(16,'Adanne Ai sudu amme','Children','75555','Sinhala',90.00,'images/book_previews/16.jpg',47,'1','2020-06-11 00:00:00',1,15,6),(17,'Ati kehel kapu Uguduwa','Children','15164615','Sinhala',190.00,'images/book_previews/17.jpg',12,'1','2020-06-11 00:00:00',1,14,5),(18,'AggalaLiyamana','Child','446584','Sinhala',350.00,'images/book_previews/18.jpg',12,'1','2020-06-11 00:00:00',1,16,4),(19,'Ahas gamata giya siththra','Child','49455','Sinhala',495.00,'images/book_previews/19.jpg',5,'1','2020-06-11 00:00:00',1,17,2),(20,'Ahas Maliga','Child','465656','Sinhala',192.00,'images/book_previews/20.jpg',74,'1','2020-06-11 00:00:00',1,14,5),(21,'Akbar Barbel','Child','49496494','Sinhala',120.00,'images/book_previews/21.jpg',65,'1','2020-06-11 00:00:00',1,18,6),(22,'Akeekaru Bakamuuna','Child','984848','Sinhala',220.00,'images/book_previews/22.jpg',2,'1','2020-06-11 00:00:00',1,19,4),(23,'Akeekaru Punchi Berakaru','Child','7456','Sinhala',175.00,'images/book_previews/23.jpg',31,'1','2020-06-11 00:00:00',1,20,2),(24,'Alabola Vidyalaya','Child','494445','Sinhala',260.00,'images/book_previews/24.jpg',23,'1','2020-06-11 00:00:00',1,21,5);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Children'),(2,'Fiction');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupon`
--

DROP TABLE IF EXISTS `coupon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `issued_date` datetime NOT NULL,
  `expired_date` datetime NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupon`
--

LOCK TABLES `coupon` WRITE;
/*!40000 ALTER TABLE `coupon` DISABLE KEYS */;
/*!40000 ALTER TABLE `coupon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration_versions`
--

LOCK TABLES `migration_versions` WRITE;
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
INSERT INTO `migration_versions` VALUES ('20200616144537'),('20200617060956'),('20200617061458'),('20200617094307'),('20200617100738'),('20200617102223');
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bookorder_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `unit_price` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_62809DB06AF7A4D3` (`bookorder_id`),
  KEY `IDX_62809DB016A2B381` (`book_id`),
  CONSTRAINT `FK_62809DB016A2B381` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  CONSTRAINT `FK_62809DB06AF7A4D3` FOREIGN KEY (`bookorder_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `total_amount` decimal(8,2) NOT NULL,
  `discount_amount` decimal(7,2) NOT NULL,
  `net_amount` decimal(8,2) NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `coupon_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E52FFDEE66C5951B` (`coupon_id`),
  CONSTRAINT `FK_E52FFDEE66C5951B` FOREIGN KEY (`coupon_id`) REFERENCES `coupon` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id_id` int(11) NOT NULL,
  `paid_amount` decimal(8,2) NOT NULL,
  `card_cvc` int(11) NOT NULL,
  `card_expiry_month` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `card_expiry_year` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `card_holder_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_reference` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6D28840DFCDAEAAA` (`order_id_id`),
  CONSTRAINT `FK_6D28840DFCDAEAAA` FOREIGN KEY (`order_id_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publication`
--

DROP TABLE IF EXISTS `publication`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publication` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci,
  `contact` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publication`
--

LOCK TABLES `publication` WRITE;
/*!40000 ALTER TABLE `publication` DISABLE KEYS */;
INSERT INTO `publication` VALUES (1,'Author Publication',NULL,NULL),(2,'Gunasena Publication','Maradana','0112856974'),(3,'Sarasavi Publication','Nugegoda','0112425874'),(4,'Sanhinda Publication','Maharagama','0114527841'),(5,'Wasana Publication','Kotte','0117845236'),(6,'Wijitha Yapa Publication','Colombo-03','0112574894');
/*!40000 ALTER TABLE `publication` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-17 22:17:34
