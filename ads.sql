-- MySQL dump 10.13  Distrib 5.1.63, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: ads
-- ------------------------------------------------------
-- Server version	5.1.63-0ubuntu0.11.10.1

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (4,'admin','admin','2012-05-21'),(11,'johnrosemale','elamesor_11','2012-07-29');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `cat_id` int(50) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=137 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (130,'Natasha','Natasha Products','2012-08-09'),(127,'Avon','All about Avon.','2012-08-08'),(128,'Personal Collection (PC)','Personal Collection Products','2012-08-09'),(131,'Ever Bilena','Ever Bilena Collection','2012-08-09'),(136,'Marikina Shoe Exchange (MSE)','All about MSE products ... ','2012-09-07');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(120) CHARACTER SET utf8 NOT NULL,
  `price` decimal(50,2) NOT NULL,
  `quantity` smallint(6) NOT NULL,
  `size` varchar(50) CHARACTER SET utf8 NOT NULL,
  `color` varchar(50) CHARACTER SET utf8 NOT NULL,
  `subtotal` decimal(50,2) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` VALUES (1,0,'burke','120.30',1,'weewe','sdfsdf','1212.00',2),(2,0,'sdgfsd','320.00',2,'sfsfd','asfsdf','1234.43',2),(3,124,'BURKE','500.00',1,'Small','black','500.00',3),(4,124,'BURKE','500.00',1,'Small','black','500.00',3),(5,124,'BURKE','500.00',1,'','','500.00',4),(6,121,'Keziah','321.00',1,'','','321.00',4),(7,124,'BURKE','500.00',1,'','','500.00',5),(8,121,'Keziah','321.00',1,'','','321.00',5),(9,124,'BURKE','500.00',1,'','','500.00',6),(10,121,'Keziah','321.00',1,'','','321.00',6),(11,124,'BURKE','500.00',1,'','','500.00',7),(12,121,'Keziah','321.00',1,'','','321.00',7),(13,109,'Secret Fantasy','800.00',1,'','','800.00',8),(14,121,'Keziah','321.00',1,'','','321.00',9);
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `dealer_id` int(25) NOT NULL,
  `total` decimal(50,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `downpayment` decimal(20,2) NOT NULL,
  `balance` decimal(20,2) NOT NULL,
  `date_paid` date NOT NULL,
  `date_claimed` date NOT NULL,
  `due` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dealer_id` (`dealer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,0,'0.00','0000-00-00 00:00:00','0.00','0.00','2012-09-20','0000-00-00','0000-00-00'),(2,131,'100.00','2012-09-20 09:05:41','3123.00','123.00','0000-00-00','0000-00-00','0000-00-00'),(3,131,'821.00','2012-09-21 02:58:57','246.30','821.00','0000-00-00','0000-00-00','0000-00-00'),(4,131,'821.00','2012-09-21 03:24:24','246.30','821.00','0000-00-00','0000-00-00','0000-00-00'),(5,131,'821.00','2012-09-21 03:25:53','246.30','821.00','0000-00-00','0000-00-00','0000-00-00'),(6,131,'821.00','2012-09-21 03:26:01','246.30','821.00','0000-00-00','0000-00-00','0000-00-00'),(7,131,'821.00','2012-09-21 03:27:47','246.30','821.00','0000-00-00','0000-00-00','0000-00-00'),(8,131,'800.00','2012-09-21 03:28:21','240.00','800.00','0000-00-00','0000-00-00','0000-00-00'),(9,107,'321.00','2012-09-21 03:41:01','96.30','321.00','0000-00-00','0000-00-00','0000-00-00');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(80) NOT NULL,
  `details` varchar(100) NOT NULL,
  `price` decimal(50,2) DEFAULT NULL,
  `qty` int(100) NOT NULL,
  `date` date NOT NULL,
  `subcategory_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=125 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (115,'Uptight','Blouse','500.00',7,'0000-00-00',30),(116,'Tribute','Blouse Color: off-white, pink(pow)','465.00',6,'0000-00-00',30),(114,'Flex','Man-made Leather, Sole Rubber, Sizes: 50-90 Color: White','1180.00',15,'0000-00-00',54),(117,'Atom','Semi Body Fit Sizes: s, m, l, xl Color: white','550.00',4,'0000-00-00',31),(118,'Baby Love','Sizes: S, M, L Color: red, white (REW)','495.00',2,'0000-00-00',34),(119,'Josie','Multi-color underwear','128.00',3,'0000-00-00',29),(120,'Assasin','szes: s, m, l, xl. color: black, navy blue, white (WNB)','320.00',5,'0000-00-00',31),(121,'Keziah','Blouse Size: Small, Large, XLarge','321.00',4,'0000-00-00',30),(123,'Asprey','Size/s: S, M, L, XL','400.00',4,'0000-00-00',30),(124,'BURKE','Semi-Body Fit\r\nSize/s: S, M, L, XL\r\nColor: black','500.00',2,'0000-00-00',31),(110,'Like','Ladies Hand Bag','782.00',4,'0000-00-00',53),(109,'Secret Fantasy','Body Spray','800.00',12,'0000-00-00',27),(108,'Sweet Honesty','Purse Concentrate 50mL','234.00',10,'0000-00-00',25),(111,'Imari Mystique','Hand and Body Lotion 150 mL','119.00',3,'0000-00-00',25),(112,'Liwanag','Upper: Man-made Leather\r\nSole: pu\r\nHeel height: 2 1/2\"\r\nSize: 50-90\r\ncolor: Black','695.00',8,'0000-00-00',54),(113,'Orca','Skinny Jeans\r\nSizes: 26\" - 32\", 34\"','995.00',3,'0000-00-00',55);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales` (
  `salesID` int(50) NOT NULL AUTO_INCREMENT,
  `remarks` varchar(50) NOT NULL,
  `id` int(50) NOT NULL,
  PRIMARY KEY (`salesID`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subcategory`
--

DROP TABLE IF EXISTS `subcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subcategory` (
  `sub_id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `category_id` int(100) NOT NULL,
  PRIMARY KEY (`sub_id`),
  KEY `subcategory` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategory`
--

LOCK TABLES `subcategory` WRITE;
/*!40000 ALTER TABLE `subcategory` DISABLE KEYS */;
INSERT INTO `subcategory` VALUES (28,'Avon Make-Up',127),(27,'Avon Fragrance',127),(26,'Avon Personal Care',127),(30,'Natasha Ladies Wear',130),(25,'Avon Skin Care',127),(29,'Avon Intimate Apparel',127),(31,'Natasha Mens Wear',130),(32,'Renee Salud Collection',130),(33,'Natasha Beauty',130),(34,'Natasha Kids',130),(36,'PC Home Care',128),(37,'PC Health Care',128),(43,'TRU Wear',130),(44,'Ever Bilena Mens Fragrance',131),(45,'Ever Bilena Ladies Fragrance',131),(46,'Ever Bilena Advance',131),(47,'Careline',131),(48,'Ever Bilena Beauty',131),(53,'Sundance Ladies Wear',135),(54,'MSE Footwear',136),(55,'MSE Denim',136);
/*!40000 ALTER TABLE `subcategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` mediumtext NOT NULL,
  `birthday` date NOT NULL,
  `date` date NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `cnum` varchar(100) NOT NULL,
  `gender` enum('Female','Male') DEFAULT NULL,
  `nationality` varchar(100) NOT NULL,
  `bio` text NOT NULL,
  `status` enum('Single','Married','Widowed') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=132 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (127,'Rosemarie Villacorta','mahree','6228507dcce6751bf9e392ee9332a1e8','0000-00-00','2012-09-03','Quezon Street','Panabo City','Davao del Norte','09306673054','Female','Filipino','better to know me well :)) hahah ...','Single'),(107,'Jellene Pastoral','jelai','1c8e5ae4e6dbb61b56dddbccfc03d935','0000-00-00','2012-08-13','Jose abad santos','Panabo City','Davao del Norte','09476922154','Female','Filipino','beautiful :P','Married'),(131,'Elena Gilbert','elena','e14c4ec12adad2f00980d8da23864c97','0000-00-00','2012-09-04','Catherine St.,','New York','USA','09287798299','Female','Bulgarian','Likes: Adventurous Person, TVD Series, Bugatti Mc Clarence Cars, Ice Cream ^^',''),(105,'Rosemale-John Villacorta','rosemalejohn','0f63001c087a7fadcbcad219fa62358a','0000-00-00','2012-08-07','Quezon Street','Panabo City','Davao del Norte','09103235491','Male','Filipino','\"Sorry for the inconvenience, Brain is under construction.\"','Single'),(123,'maxwell chavez maluenda','maxwell','2a7d544ccb742bd155e55c796de8e511','0001-01-01','2012-09-03','budbud','davao','davao del sur','09129126200','Male','Filipino','testingggg','Single'),(128,'Apple Jean Y. Constancio','apple','3d682a9968ca50cb9fb7e0c109de2179','1990-09-09','2012-09-04','Rempohito subdivsion','Panabo City','Davao del norte','09487846461','Female','Filipino','simple','Single');
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

-- Dump completed on 2012-09-21 12:10:28
