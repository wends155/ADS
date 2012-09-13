-- MySQL dump 10.13  Distrib 5.1.37, for Win32 (ia32)
--
-- Host: .    Database: ADS
-- ------------------------------------------------------
-- Server version	5.1.37

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (4,'admin','admin','2012-05-21');
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
  `price` varchar(100) NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (43,'iPhone','already fix it i\'ll try this if it is working . . . hopefully it will be fine and remain on his original size hahahha ^_^','','2012-06-26'),(35,'Boardwalk','Your Fashion, Our Business\r\nweeh !','','2012-06-09'),(36,'Marikina Shoe Exchange (MSE)','TARA! Kumita Kasama ang MSE','','2012-06-12');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `contactID` int(30) NOT NULL AUTO_INCREMENT,
  `contactnum` varchar(30) NOT NULL,
  `dealerID` int(30) NOT NULL,
  PRIMARY KEY (`contactID`),
  UNIQUE KEY `dealerID` (`dealerID`),
  UNIQUE KEY `dealerID_2` (`dealerID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `franchiser`
--

DROP TABLE IF EXISTS `franchiser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `franchiser` (
  `franchiserID` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contactID` varchar(50) NOT NULL,
  `id` int(50) NOT NULL,
  PRIMARY KEY (`franchiserID`),
  UNIQUE KEY `contactID` (`contactID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `franchiser`
--

LOCK TABLES `franchiser` WRITE;
/*!40000 ALTER TABLE `franchiser` DISABLE KEYS */;
/*!40000 ALTER TABLE `franchiser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manufacturer`
--

DROP TABLE IF EXISTS `manufacturer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manufacturer` (
  `manufacturerID` int(50) NOT NULL AUTO_INCREMENT,
  `manufacturerCompName` varchar(50) NOT NULL,
  `id` int(50) NOT NULL,
  PRIMARY KEY (`manufacturerID`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manufacturer`
--

LOCK TABLES `manufacturer` WRITE;
/*!40000 ALTER TABLE `manufacturer` DISABLE KEYS */;
/*!40000 ALTER TABLE `manufacturer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `orderID` int(11) NOT NULL AUTO_INCREMENT,
  `dealerID` int(11) NOT NULL,
  `orderNum` int(11) NOT NULL,
  `orderDate` datetime NOT NULL,
  `orderQty` int(11) NOT NULL,
  PRIMARY KEY (`orderID`),
  UNIQUE KEY `dealerID` (`dealerID`),
  UNIQUE KEY `dealerID_2` (`dealerID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `cat_id` int(100) NOT NULL,
  `product_name` varchar(80) NOT NULL,
  `price` varchar(50) NOT NULL,
  `qty` int(100) NOT NULL,
  `details` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `subcategory` varchar(50) NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_name` (`product_name`),
  UNIQUE KEY `product_name_2` (`product_name`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (62,0,'i hate love story ','890',9,'kjkfjdk','','','2012-06-07'),(63,0,'xoxoxo','678',5,'hahahhaha','','','2012-06-12'),(64,0,'yoy','1000',1,'my cattery','','','2012-06-15'),(67,0,'MIHO','8999',1,'my girlfriend is a gumiho','','','2012-06-30'),(66,0,'Rosemale','900',800,'Ahaha','','','2012-06-23');
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
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `category_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategory`
--

LOCK TABLES `subcategory` WRITE;
/*!40000 ALTER TABLE `subcategory` DISABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (72,'Florefie Remedios','florefie','36ffa98ff34c2b49979fa7b8f224d75d','2012-06-20','san vicente','Panabo City','Davao del Norte','0934568778','Female','Filipino','skdjksjdks','Single'),(71,'Paul Wesley','paul','a09f91f8be77e65b371a64bf1d8305c9','2012-06-20','sdksjkdsjkdk','lkdlsdksl','lklklsdkflkdl','09128559617','Male','kfldkfldkfdl','skalkslkalskla','Married'),(69,'Rosemale-John II','rosemalejohn','0f63001c087a7fadcbcad219fa62358a','2012-06-18','Quezon','Panabo City','Davao del Norte','09128564110','Male','Filipino','Techie.','Single'),(70,'Dovina Rose Villacorta','dovina','a34e03ee7659c2fff0a2cbfd6760b36b','2012-06-20','jadkjdkjs','kjkjdksjdksjk','skdlskdlksl','09128559617','Female','ksdjskjdks','jkjskjkjkjsd','Single'),(66,'virginia villacorta','virginia','61e1f08a425cb79a18c3f6224011ab74','2012-06-13','Quezon St.','Panabo City','Davao del Norte','09103235491','Female','fgfgg','hhh','Married'),(68,'Adolfo Perez','adolfo','10b28c9abf3a62e9dcb63da27a7186d8','2012-06-17','skdkdjsk','jksjdksjksjksjdsk','jskdfjk','98989','Male','dfdfdfd','dfdffdfd','Widowed'),(67,'Rosemarie Villacorta','mahree','6228507dcce6751bf9e392ee9332a1e8','2012-06-13','Quezon St.','Panabo City','Davao del Norte','09306673054','Female','Filipino','hahhaha','Single'),(73,'adolfo villacorta','adolfo','10b28c9abf3a62e9dcb63da27a7186d8','2012-06-20','jdksjdksjkdjk','kjskdjkjskjk','jkjkdsjkfksj','09234788888','Male','jdksjdkjskjdks','sldksldksjdksk','Married'),(75,'Jellene Pastoral','jelai','ba1f4f88f52b8acc1d331611f4be6816','2012-06-26','kjskkdjdjksk','kjkdjskjdks','jkjdksdjksjk','lkfldkfldkfdlkl','Female','jdkjdkjskdskj','kjkjksjkjrke','Single');
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

-- Dump completed on 2012-07-03 11:46:02
