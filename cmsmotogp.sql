-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: cmsmotogp
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

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
-- Table structure for table `builder`
--

DROP TABLE IF EXISTS `builder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `builder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `featuredMedia_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nameEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `descriptionEN` longtext COLLATE utf8_unicode_ci,
  `seoTitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoTitleEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoKeywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoKeywordsEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `_order` int(11) DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  `updatedAt` date DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D627AF49C6604E13` (`featuredMedia_id`),
  CONSTRAINT `FK_D627AF49C6604E13` FOREIGN KEY (`featuredMedia_id`) REFERENCES `featured_media__media` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `builder`
--

LOCK TABLES `builder` WRITE;
/*!40000 ALTER TABLE `builder` DISABLE KEYS */;
INSERT INTO `builder` VALUES (1,NULL,'YAMAHA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,NULL,'RMS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `builder` ENABLE KEYS */;
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
  `description` longtext COLLATE utf8_unicode_ci,
  `descriptionEN` longtext COLLATE utf8_unicode_ci,
  `_order` int(11) DEFAULT NULL,
  `nameEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoTitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoTitleEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoKeywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoKeywordsEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  `updatedAt` date DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Motogp','Descripción de categoría motogp',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `circuit`
--

DROP TABLE IF EXISTS `circuit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `circuit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `featuredMedia_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nameEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `descriptionEN` longtext COLLATE utf8_unicode_ci,
  `seoTitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoTitleEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoKeywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoKeywordsEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `_order` int(11) DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  `updatedAt` date DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  `subtitleEN` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1325F3A64E7AF8F` (`gallery_id`),
  KEY `IDX_1325F3A6C6604E13` (`featuredMedia_id`),
  CONSTRAINT `FK_1325F3A64E7AF8F` FOREIGN KEY (`gallery_id`) REFERENCES `media__gallery` (`id`),
  CONSTRAINT `FK_1325F3A6C6604E13` FOREIGN KEY (`featuredMedia_id`) REFERENCES `featured_media__media` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `circuit`
--

LOCK TABLES `circuit` WRITE;
/*!40000 ALTER TABLE `circuit` DISABLE KEYS */;
INSERT INTO `circuit` VALUES (1,12,'Losail International Circuit','sadasd',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'GP de Qatar','ES',NULL,'adsdsadsad',NULL),(2,27,'France circuit','France circué',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'GP de France','ES',NULL,'Le france circué',NULL),(3,NULL,'Circuito',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','',NULL,'',NULL),(4,40,'Circui','c',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ca','ES',NULL,'c',NULL);
/*!40000 ALTER TABLE `circuit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comments` varchar(2048) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mediaType` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userConfirmed` tinyint(1) DEFAULT NULL,
  `adminConfirmed` tinyint(1) DEFAULT NULL,
  `activationHash` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (9,'Nombre','Apellido','emgoya@outlook.es','920000','public',NULL,1,1,NULL,'en');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_customergroup`
--

DROP TABLE IF EXISTS `customer_customergroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_customergroup` (
  `customer_id` int(11) NOT NULL,
  `customergroup_id` int(11) NOT NULL,
  PRIMARY KEY (`customer_id`,`customergroup_id`),
  KEY `IDX_11E0AA9395C3F3` (`customer_id`),
  KEY `IDX_11E0AA96C19C84` (`customergroup_id`),
  CONSTRAINT `FK_11E0AA9395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_11E0AA96C19C84` FOREIGN KEY (`customergroup_id`) REFERENCES `customer_group` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_customergroup`
--

LOCK TABLES `customer_customergroup` WRITE;
/*!40000 ALTER TABLE `customer_customergroup` DISABLE KEYS */;
INSERT INTO `customer_customergroup` VALUES (9,1),(9,2);
/*!40000 ALTER TABLE `customer_customergroup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_group`
--

DROP TABLE IF EXISTS `customer_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_group`
--

LOCK TABLES `customer_group` WRITE;
/*!40000 ALTER TABLE `customer_group` DISABLE KEYS */;
INSERT INTO `customer_group` VALUES (1,'Prensa meh'),(2,'Otro grupo');
/*!40000 ALTER TABLE `customer_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_type`
--

DROP TABLE IF EXISTS `customer_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_type`
--

LOCK TABLES `customer_type` WRITE;
/*!40000 ALTER TABLE `customer_type` DISABLE KEYS */;
INSERT INTO `customer_type` VALUES (1,'public','Público'),(2,'sponsor','Sponsor'),(3,'media','Medio'),(4,'public','Público'),(5,'sponsor','Sponsor'),(6,'media','Medio'),(7,'public','Público'),(8,'sponsor','Sponsor'),(9,'media','Medio'),(10,'public','Público'),(11,'sponsor','Sponsor'),(12,'media','Medio');
/*!40000 ALTER TABLE `customer_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `featured_media__media`
--

DROP TABLE IF EXISTS `featured_media__media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `featured_media__media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `enabled` tinyint(1) NOT NULL,
  `provider_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_status` int(11) NOT NULL,
  `provider_reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_metadata` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `length` decimal(10,0) DEFAULT NULL,
  `content_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content_size` int(11) DEFAULT NULL,
  `copyright` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `context` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cdn_is_flushable` tinyint(1) DEFAULT NULL,
  `cdn_flush_identifier` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cdn_flush_at` datetime DEFAULT NULL,
  `cdn_status` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `featured_media__media`
--

LOCK TABLES `featured_media__media` WRITE;
/*!40000 ALTER TABLE `featured_media__media` DISABLE KEYS */;
INSERT INTO `featured_media__media` VALUES (1,'post-image-1802200216','a',1,'sonata.media.provider.image',1,'2443919e67770a9885d38f52dbe0f8e2b2e28cb6.jpeg','{\"filename\":\"5a8c13abcd046.jpg\"}',1366,408,NULL,'image/jpeg',277931,NULL,NULL,'imagenes',1,NULL,NULL,3,'2018-02-20 13:25:21','2018-02-20 12:14:16',NULL,'a'),(2,'post-image-1802200238',NULL,1,'sonata.media.provider.image',1,'c1bcc3a34e6c5494977c638bf61a1d5a3525fe2a.jpeg','{\"filename\":\"5a95c395322cf.jpg\"}',3163,2101,NULL,'image/jpeg',1640651,NULL,NULL,'imagenes',1,NULL,NULL,3,'2018-02-27 21:46:15','2018-02-20 12:20:38',NULL,NULL),(3,'post-image-1802200255','hola',1,'sonata.media.provider.image',1,'d958aaa569fc6bcc45cdc23e936718eebfd3974b.jpeg','{\"filename\":\"5a95c3a717cd8.jpg\"}',318,159,NULL,'image/jpeg',17678,NULL,NULL,'imagenes',1,NULL,NULL,3,'2018-02-27 21:46:36','2018-02-20 13:07:55',NULL,'hola'),(4,'post-image-1802200244',NULL,1,'sonata.media.provider.image',1,'bf12dbb85b5213ff49f3a0a8cff950d1f55c94fb.jpeg','{\"filename\":\"5a8c15ae7107b.jpg\"}',1366,710,NULL,'image/jpeg',362066,NULL,NULL,'imagenes',1,NULL,NULL,3,'2018-02-20 13:33:55','2018-02-20 13:33:45',NULL,NULL),(5,'post-image-1802200201',NULL,1,'sonata.media.provider.image',1,'967d93d87f24e5a346a90a189e64e057da5014e2.jpeg','{\"filename\":\"5a8c18c34791a.jpg\"}',1366,408,NULL,'image/jpeg',255657,NULL,NULL,'imagenes',NULL,NULL,NULL,NULL,'2018-02-20 13:47:01','2018-02-20 13:47:01',NULL,NULL),(6,'post-image-1802200211',NULL,1,'sonata.media.provider.image',1,'b42ed841b8f0854c03e2da8e1ba5f8bd3da4540f.jpeg','{\"filename\":\"5a8c190131062.jpg\"}',1366,408,NULL,'image/jpeg',255657,NULL,NULL,'imagenes',NULL,NULL,NULL,NULL,'2018-02-20 13:48:11','2018-02-20 13:48:11',NULL,NULL),(7,'post-image-1802200215','adios',0,'sonata.media.provider.image',1,'5978b7567d0efcf2f43ac465a0529b29a6522ed7.jpeg','{\"filename\":\"5a9465ed60c85.jpg\"}',318,159,NULL,'image/jpeg',17678,NULL,NULL,'featured',1,NULL,NULL,3,'2018-02-26 20:56:07','2018-02-20 15:45:15',NULL,'adios'),(8,'post-image-1802200226',NULL,1,'sonata.media.provider.image',1,'2e869b4ebf893bf38bbf8403ec68f3011a929fb0.jpeg','{\"filename\":\"5a8c6b03cd027.jpg\"}',3840,2160,NULL,'image/jpeg',4923213,NULL,NULL,'imagenes',NULL,NULL,NULL,NULL,'2018-02-20 19:38:26','2018-02-20 19:38:26',NULL,NULL),(9,'post-image-1802200247',NULL,0,'sonata.media.provider.image',1,'47b7a3aa89deff4de568e46ed25b23f275ade085.jpeg','{\"filename\":\"5a9ac48845061.jpg\"}',146,108,NULL,'image/jpeg',36336,NULL,NULL,'imagenes',1,NULL,NULL,3,'2018-03-03 16:51:54','2018-02-20 19:40:48',NULL,NULL),(10,'post-image-1802200251',NULL,0,'sonata.media.provider.image',1,'d9305918b8de524bf6c5187fe5236caf53122dd5.jpeg','{\"filename\":\"5a8c6e78bf0c0.jpg\"}',3840,2160,NULL,'image/jpeg',4923213,NULL,NULL,'imagenes',NULL,NULL,NULL,NULL,'2018-03-03 16:52:37','2018-02-20 19:52:51',NULL,NULL),(11,'post-image-1802210224',NULL,0,'sonata.media.provider.image',1,'b2762ad0f132fa25945b714cedfcd6f55878e736.png','{\"filename\":\"5a946a423388e.png\"}',96,144,NULL,'image/png',5739,NULL,NULL,'imagenes',1,NULL,NULL,3,'2018-02-26 21:13:11','2018-02-21 16:49:24',NULL,NULL),(12,'post-image-1802210251',NULL,1,'sonata.media.provider.image',1,'bb851d9a6965dd3ad7919f8a02ac6e83a1797121.jpeg','{\"filename\":\"5a8deb648ded8.jpg\"}',3883,1054,NULL,'image/jpeg',830254,NULL,NULL,'imagenes',1,NULL,NULL,3,'2018-02-21 22:58:04','2018-02-21 20:21:52',NULL,NULL),(13,'post-image-1802210209',NULL,1,'sonata.media.provider.image',1,'reference','[]',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'imagenes',NULL,NULL,NULL,NULL,'2018-02-21 21:43:09','2018-02-21 21:43:09',NULL,NULL),(14,'post-image-1802250247',NULL,0,'sonata.media.provider.image',1,'d17697c3107016034d7ff92dd8a604c38641a933.jpeg','{\"filename\":\"5a94694a2d461.jpg\"}',275,183,NULL,'image/jpeg',13501,NULL,NULL,'imagenes',1,NULL,NULL,3,'2018-02-26 21:09:20','2018-02-25 13:09:47',NULL,NULL),(15,'post-image-1802250229',NULL,0,'sonata.media.provider.image',1,'reference','[]',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'imagenes',NULL,NULL,NULL,NULL,'2018-03-02 14:30:57','2018-02-25 13:55:29',NULL,NULL),(16,'post-image-1802250226',NULL,1,'sonata.media.provider.image',1,'38a781f70afd1232a6476ac455605d662f1aa464.jpeg','{\"filename\":\"5a92b9bc55094.jpg\"}',3840,2160,NULL,'image/jpeg',4923213,NULL,NULL,'imagenes',NULL,NULL,NULL,NULL,'2018-02-25 14:27:27','2018-02-25 14:27:27',NULL,NULL),(17,'post-image-1802260243',NULL,0,'sonata.media.provider.image',1,'81e35286dda42082e7a738c111aed0edf09fc6a4.jpeg','{\"filename\":\"5a94688710cc8.jpg\"}',318,159,NULL,'image/jpeg',17678,NULL,NULL,'featured',1,NULL,NULL,3,'2018-02-26 21:05:38','2018-02-26 21:00:43',NULL,NULL),(18,'post-image-1802260219',NULL,0,'sonata.media.provider.image',1,'563ec20841638e1de00d9bdbe8582d4ff29c65fa.jpeg','{\"filename\":\"5a9468b8d3cf9.jpg\"}',318,159,NULL,'image/jpeg',17678,NULL,NULL,'featured',NULL,NULL,NULL,NULL,'2018-02-26 21:08:00','2018-02-26 21:06:19',NULL,NULL),(19,'post-image-1802260208',NULL,1,'sonata.media.provider.image',1,'62568a63708ff54b98755fe87fcb088f60ec8001.jpeg','{\"filename\":\"5a946925ad929.jpg\"}',318,159,NULL,'image/jpeg',17678,NULL,NULL,'featured',NULL,NULL,NULL,NULL,'2018-02-26 21:08:08','2018-02-26 21:08:08',NULL,NULL),(20,'post-image-1802260235',NULL,0,'sonata.media.provider.image',1,'bc6eb7bcf52089c856c4abe7ef1064eff50f1e63.png','{\"filename\":\"5a946979b9845.png\"}',96,144,NULL,'image/png',5739,NULL,NULL,'featured',NULL,NULL,NULL,NULL,'2018-02-26 21:12:35','2018-02-26 21:09:35',NULL,NULL),(21,'post-image-1802260217',NULL,1,'sonata.media.provider.image',1,'15436509436962d0bcc4b80536218f8ffa105265.png','{\"filename\":\"5a946a5c4f582.png\"}',96,144,NULL,'image/png',5739,NULL,NULL,'featured',NULL,NULL,NULL,NULL,'2018-02-26 21:13:17','2018-02-26 21:13:17',NULL,NULL),(22,'post-image-1802270209',NULL,1,'sonata.media.provider.image',1,'81ea43d422734ba91aaa67971e2e7fa8bb1bc7f9.jpeg','{\"filename\":\"5a95c34907f2a.jpg\"}',3163,2101,NULL,'image/jpeg',1640651,NULL,NULL,'featured',NULL,NULL,NULL,NULL,'2018-02-27 21:45:09','2018-02-27 21:45:09',NULL,NULL),(23,'post-image-1802270252',NULL,1,'sonata.media.provider.image',1,'2036431db5311e90717a0171d681c541adbe88bb.jpeg','{\"filename\":\"5a95c3745763e.jpg\"}',4896,3264,NULL,'image/jpeg',1359700,NULL,NULL,'featured',NULL,NULL,NULL,NULL,'2018-02-27 21:45:53','2018-02-27 21:45:53',NULL,NULL),(24,'post-image-1803030307',NULL,1,'sonata.media.provider.image',1,'09d70ecbf7ed02f08c764e604e5fd57a13c2168c.jpeg','{\"filename\":\"5aa279e4b6298.jpg\"}',1280,720,NULL,'image/jpeg',234246,NULL,NULL,'featured',1,NULL,NULL,3,'2018-03-09 13:11:29','2018-03-03 16:52:07',NULL,NULL),(25,'post-image-1803030322',NULL,1,'sonata.media.provider.image',1,'b14cf095574db0b9409fd5b1662a8984e7136222.png','{\"filename\":\"5a9ac51fc386d.png\"}',315,160,NULL,'image/png',2714,NULL,NULL,'featured',NULL,NULL,NULL,NULL,'2018-03-03 16:54:22','2018-03-03 16:54:22',NULL,NULL),(26,'post-image-1803030316',NULL,1,'sonata.media.provider.image',1,'3ebcf8b915ff049589fe08257bec51795649aabb.png','{\"filename\":\"5a9ac594395e0.png\"}',288,175,NULL,'image/png',4396,NULL,NULL,'featured',NULL,NULL,NULL,NULL,'2018-03-03 16:56:16','2018-03-03 16:56:16',NULL,NULL),(27,'post-image-1803030320',NULL,1,'sonata.media.provider.image',1,'96afb00a23ffbf1efe6e44661e16046d8cbbf310.jpeg','{\"filename\":\"5a9af2679a0c8.jpg\"}',715,374,NULL,'image/jpeg',102686,NULL,NULL,'featured',NULL,NULL,NULL,NULL,'2018-03-03 20:07:20','2018-03-03 20:07:20',NULL,NULL),(28,'post-image-1803040335',NULL,1,'sonata.media.provider.image',1,'f3f6daa7020336ad29444630c12898e518c61c10.png','{\"filename\":\"5aa294083af9d.png\"}',500,445,NULL,'image/png',264522,NULL,NULL,'featured',1,NULL,NULL,3,'2018-03-09 15:02:53','2018-03-04 21:31:35',NULL,NULL),(29,'post-image-1803040348',NULL,1,'sonata.media.provider.image',1,'d7a6d61c3e27bd70634dd0db9c41785fb67d0b39.png','{\"filename\":\"5a9c57b36a4ed.png\"}',885,788,NULL,'image/png',467872,NULL,NULL,'featured',NULL,NULL,NULL,NULL,'2018-03-04 21:31:49','2018-03-04 21:31:49',NULL,NULL),(30,'post-image-1803070335',NULL,1,'sonata.media.provider.image',1,'78cac6fcceab93fb0a8129ebd3c8774782dfb426.jpeg','{\"filename\":\"5aa0340178b25.jpg\"}',1200,800,NULL,'image/jpeg',310711,NULL,NULL,'featured',NULL,NULL,NULL,NULL,'2018-03-07 19:48:35','2018-03-07 19:48:35',NULL,NULL),(31,'post-image-1803070358',NULL,1,'sonata.media.provider.image',1,'c59beea6d3acfb57867757f6540c3fc968c4bde0.jpeg','{\"filename\":\"5aa04622ea744.jpg\"}',4896,3264,NULL,'image/jpeg',1359700,NULL,NULL,'featured',1,NULL,NULL,3,'2018-03-07 21:05:56','2018-03-07 19:55:58',NULL,NULL),(32,'post-image-1803070340',NULL,1,'sonata.media.provider.image',1,'eab89dac170783b04a538a623a34f226f03d7e8a.png','{\"filename\":\"5aa035d55ba17.png\"}',960,846,NULL,'image/png',571952,NULL,NULL,'featured',NULL,NULL,NULL,NULL,'2018-03-07 19:56:40','2018-03-07 19:56:40',NULL,NULL),(33,'post-image-1803070330',NULL,1,'sonata.media.provider.image',1,'6867d7a6bcab24ea5327e3fc552eb1fb8cf9a7bc.jpeg','{\"filename\":\"5aa04645bc54e.jpg\"}',3163,2101,NULL,'image/jpeg',1640651,NULL,NULL,'featured',NULL,NULL,NULL,NULL,'2018-03-07 21:06:30','2018-03-07 21:06:30',NULL,NULL),(34,'post-image-1803070310',NULL,1,'sonata.media.provider.image',1,'a92820c77f79d924718955714c33bb34399ea810.jpeg','{\"filename\":\"5aa0466d76c3a.jpg\"}',3163,2101,NULL,'image/jpeg',1640651,NULL,NULL,'featured',NULL,NULL,NULL,NULL,'2018-03-07 21:07:10','2018-03-07 21:07:10',NULL,NULL),(35,'post-image-1803070330',NULL,1,'sonata.media.provider.image',1,'f89a7949aaaf32b8201bda3f0f48ec8129d47d77.jpeg','{\"filename\":\"5aa046817ba95.jpg\"}',715,374,NULL,'image/jpeg',102686,NULL,NULL,'featured',NULL,NULL,NULL,NULL,'2018-03-07 21:07:30','2018-03-07 21:07:30',NULL,NULL),(36,'post-image-1803100342',NULL,1,'sonata.media.provider.image',1,'be75e8296f2ce34404cf46c6d212a8907884695c.png','{\"filename\":\"5aa43d08b9c2e.png\"}',384,384,NULL,'image/png',95699,NULL,NULL,'featured',1,NULL,NULL,3,'2018-03-10 21:16:18','2018-03-10 21:14:42',NULL,NULL),(37,'post-image-1803130330',NULL,1,'sonata.media.provider.image',1,'756ca64e0c0336f0e8436717dc80bc9594015985.png','{\"filename\":\"5aa7b528e79c0.png\"}',500,445,NULL,'image/png',264522,NULL,NULL,'featured',NULL,NULL,NULL,NULL,'2018-03-13 12:25:30','2018-03-13 12:25:30',NULL,NULL),(38,'post-image-1803130320',NULL,1,'sonata.media.provider.image',1,'df3d2aa072cb6102ba67edcf70d446d3f9219173.png','{\"filename\":\"5aa7b554a1f0c.png\"}',500,445,NULL,'image/png',264522,NULL,NULL,'featured',NULL,NULL,NULL,NULL,'2018-03-13 12:26:20','2018-03-13 12:26:20',NULL,NULL),(39,'post-image-1803130319',NULL,1,'sonata.media.provider.image',1,'c3d4e151551c2d1d7f7acae61ac6ebeb864fd164.png','{\"filename\":\"5aa7b59069335.png\"}',500,445,NULL,'image/png',264522,NULL,NULL,'featured',NULL,NULL,NULL,NULL,'2018-03-13 12:27:19','2018-03-13 12:27:19',NULL,NULL),(40,'post-image-1803140341',NULL,1,'sonata.media.provider.image',1,'90e6b5156437164945279e8f7d41e5946575a6ec.jpeg','{\"filename\":\"5aa9490787bf4.jpg\"}',240,210,NULL,'image/jpeg',6425,NULL,NULL,'featured',NULL,NULL,NULL,NULL,'2018-03-14 17:08:41','2018-03-14 17:08:41',NULL,NULL);
/*!40000 ALTER TABLE `featured_media__media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fos_user`
--

DROP TABLE IF EXISTS `fos_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fos_user`
--

LOCK TABLES `fos_user` WRITE;
/*!40000 ALTER TABLE `fos_user` DISABLE KEYS */;
INSERT INTO `fos_user` VALUES (1,'emgoya','emgoya','emgoya@gmail.com','emgoya@gmail.com',1,NULL,'$2y$13$WkFlQJJz1nvo9M46WsLfH.rkC8UfVDTzNsFDuG6VxmUy/eGrR4m/i','2018-02-10 17:12:45',NULL,NULL,'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}'),(2,'admin','admin','test@test.com','test@test.com',1,NULL,'$2y$13$XIgoUY4kCQkBr59VleeMZOV4CpCd4SOKqpIdPEbuhJjWXEe.eFFPK','2018-03-16 13:26:16',NULL,NULL,'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}'),(3,'em','em','nadie@ndie.com','nadie@ndie.com',1,NULL,'$2y$13$s4tiVA6kqYFv4BWernIO.etyIKH0wECfMyqjOaDvgdISpsrbmXJXK','2018-03-06 15:46:37',NULL,NULL,'a:1:{i:0;s:10:\"ROLE_ADMIN\";}');
/*!40000 ALTER TABLE `fos_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modality_id` int(11) DEFAULT NULL,
  `season_id` int(11) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nameEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `descriptionEN` longtext COLLATE utf8_unicode_ci,
  `seoTitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoTitleEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoKeywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoKeywordsEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `_order` int(11) DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  `updatedAt` date DEFAULT NULL,
  `featuredMedia_id` int(11) DEFAULT NULL,
  `circuit_id` int(11) DEFAULT NULL,
  `rider_id` int(11) DEFAULT NULL,
  `race_id` int(11) DEFAULT NULL,
  `circuitOrder` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_472B783A2D6D889B` (`modality_id`),
  KEY `IDX_472B783AC6604E13` (`featuredMedia_id`),
  KEY `IDX_472B783A4EC001D1` (`season_id`),
  KEY `IDX_472B783ACF2182C8` (`circuit_id`),
  KEY `IDX_472B783AFF881F6` (`rider_id`),
  KEY `IDX_472B783A6E59D40D` (`race_id`),
  KEY `IDX_472B783A12469DE2` (`category_id`),
  CONSTRAINT `FK_472B783A12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL,
  CONSTRAINT `FK_472B783A2D6D889B` FOREIGN KEY (`modality_id`) REFERENCES `modality` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_472B783A4EC001D1` FOREIGN KEY (`season_id`) REFERENCES `season` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_472B783A6E59D40D` FOREIGN KEY (`race_id`) REFERENCES `race` (`id`) ON DELETE SET NULL,
  CONSTRAINT `FK_472B783AC6604E13` FOREIGN KEY (`featuredMedia_id`) REFERENCES `featured_media__media` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_472B783ACF2182C8` FOREIGN KEY (`circuit_id`) REFERENCES `circuit` (`id`) ON DELETE SET NULL,
  CONSTRAINT `FK_472B783AFF881F6` FOREIGN KEY (`rider_id`) REFERENCES `rider` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery`
--

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` VALUES (3,1,NULL,'inicio_moto_gp','inicio - Moto GP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,2,NULL,'inicio_moto_3','inicio - Moto 3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,1,NULL,'contacto_moto_gp','contacto - Moto GP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,2,NULL,'contacto_moto_3','contacto - Moto 3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,1,NULL,'noticias_moto_gp','noticias - Moto GP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,2,NULL,'noticias_moto_3','noticias - Moto 3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,1,NULL,'videos_moto_gp','videos - Moto GP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(16,2,NULL,'videos_moto_3','videos - Moto 3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(20,1,NULL,'imagenes_moto_gp','imagenes - Moto GP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(21,2,NULL,'imagenes_moto_3','imagenes - Moto 3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(23,1,NULL,'motos_moto_gp','motos - Moto GP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(24,2,NULL,'motos_moto_3','motos - Moto 3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,1,NULL,'staff_moto_gp','staff - Moto GP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(27,2,NULL,'staff_moto_3','staff - Moto 3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(29,1,NULL,'sponsor_moto_gp','sponsor - Moto GP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(30,2,NULL,'sponsor_moto_3','sponsor - Moto 3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(33,1,NULL,'riders_moto_gp','riders - Moto GP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(34,2,NULL,'riders_moto_3','riders - Moto 3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(37,1,NULL,'register_moto_gp','register - Moto GP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(38,2,NULL,'register_moto_3','register - Moto 3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(40,8,NULL,'inicio_fim_jr','inicio - FIM-JR',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(41,8,NULL,'contacto_fim_jr','contacto - FIM-JR',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(42,8,NULL,'noticias_fim_jr','noticias - FIM-JR',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(43,8,NULL,'videos_fim_jr','videos - FIM-JR',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(44,8,NULL,'imagenes_fim_jr','imagenes - FIM-JR',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(45,8,NULL,'motos_fim_jr','motos - FIM-JR',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(46,8,NULL,'staff_fim_jr','staff - FIM-JR',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(47,8,NULL,'sponsor_fim_jr','sponsor - FIM-JR',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(48,8,NULL,'riders_fim_jr','riders - FIM-JR',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(49,8,NULL,'register_fim_jr','register - FIM-JR',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(51,1,NULL,NULL,'moto3','a',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,1,NULL,1),(52,1,NULL,NULL,'Gallerie',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(53,1,NULL,NULL,'Galerrie 2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery_category`
--

DROP TABLE IF EXISTS `gallery_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery_category` (
  `gallery_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`gallery_id`,`category_id`),
  KEY `IDX_33C1CB7A4E7AF8F` (`gallery_id`),
  KEY `IDX_33C1CB7A12469DE2` (`category_id`),
  CONSTRAINT `FK_33C1CB7A12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_33C1CB7A4E7AF8F` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery_category`
--

LOCK TABLES `gallery_category` WRITE;
/*!40000 ALTER TABLE `gallery_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `gallery_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery_media__media`
--

DROP TABLE IF EXISTS `gallery_media__media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery_media__media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `enabled` tinyint(1) NOT NULL,
  `provider_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_status` int(11) NOT NULL,
  `provider_reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_metadata` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `length` decimal(10,0) DEFAULT NULL,
  `content_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content_size` int(11) DEFAULT NULL,
  `copyright` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `context` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cdn_is_flushable` tinyint(1) DEFAULT NULL,
  `cdn_flush_identifier` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cdn_flush_at` datetime DEFAULT NULL,
  `cdn_status` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `_order` int(11) DEFAULT NULL,
  `rider_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C08DDDAE7E3C61F9` (`owner_id`),
  KEY `IDX_C08DDDAEFF881F6` (`rider_id`),
  CONSTRAINT `FK_C08DDDAE7E3C61F9` FOREIGN KEY (`owner_id`) REFERENCES `gallery` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_C08DDDAEFF881F6` FOREIGN KEY (`rider_id`) REFERENCES `rider` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery_media__media`
--

LOCK TABLES `gallery_media__media` WRITE;
/*!40000 ALTER TABLE `gallery_media__media` DISABLE KEYS */;
INSERT INTO `gallery_media__media` VALUES (19,3,'gallery-image-1802260257','Lorem ipsum dolor sit amet, Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet',1,'sonata.media.provider.image',1,'0d308d92ca5143c96bdd1b750e33c02655527b8e.jpeg','{\"filename\":\"5a94879105b42.jpg\"}',3163,2101,NULL,'image/jpeg',1640651,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-11 00:15:37','2018-02-26 23:17:58','http://google.es','Descripzione engilsh',NULL,NULL,'PODIO DE BAUTISTA EN JEREZ','PODIUM OF JEREZ BAUZISZA'),(20,3,'gallery-image-1802260257','una cosa indefinida descrita',1,'sonata.media.provider.image',1,'30cbd2bd8f9e0e3c28bcba9bfa41f41f4e48b05d.jpeg','{\"filename\":\"5a948793bb9f5.jpg\"}',4896,3264,NULL,'image/jpeg',1359700,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-02-27 20:53:19','2018-02-26 23:17:58','http://algo.com',NULL,NULL,NULL,'Una cosa indefinida',NULL),(25,20,'gallery-image-1803030352',NULL,1,'sonata.media.provider.image',1,'f5055774c0d819490664527cefd6ebaf34e1c49f.jpeg','{\"filename\":\"5a9af02f5ddcb.jpg\"}',1200,800,NULL,'image/jpeg',310711,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-03 19:57:52','2018-03-03 19:57:52',NULL,NULL,NULL,NULL,NULL,NULL),(26,20,'gallery-image-1803030328',NULL,1,'sonata.media.provider.image',1,'607f85d990337f6e9c4830e0d9f7a7dad981f379.jpeg','{\"filename\":\"5a9af08e9c08f.jpg\"}',3163,2101,NULL,'image/jpeg',1640651,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-03 19:59:29','2018-03-03 19:59:29',NULL,NULL,NULL,NULL,NULL,NULL),(27,16,'gallery-image-1803040307',NULL,1,'sonata.media.provider.image',1,'2d24191b6aa786649b310a71adaa7d28e4e1f429.jpeg','{\"filename\":\"5a9bf27ec644c.jpg\"}',980,554,NULL,'image/jpeg',85614,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-04 14:20:07','2018-03-04 14:20:07',NULL,NULL,NULL,NULL,NULL,NULL),(28,16,'gallery-image-1803040307',NULL,1,'sonata.media.provider.image',1,'9f8ef3178d5d2b50648c015b9c91e509b4ae0bf8.jpeg','{\"filename\":\"5a9bf285b50e6.jpg\"}',3163,2101,NULL,'image/jpeg',1640651,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-04 14:20:07','2018-03-04 14:20:07',NULL,NULL,NULL,NULL,NULL,NULL),(29,15,'gallery-image-1803040310',NULL,1,'sonata.media.provider.image',1,'b76715c3e912cd20fdb5845f8a5a076fe0d8028c.jpeg','{\"filename\":\"5a9bf2c0a5164.jpg\"}',1200,800,NULL,'image/jpeg',310711,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-04 15:01:51','2018-03-04 14:21:10',NULL,NULL,NULL,NULL,'VIDEO GALLERY',NULL),(31,23,'gallery-image-1803040341',NULL,1,'sonata.media.provider.image',1,'20f22e2c87e60ba7f2d0aedc2610d249f4f700f3.jpeg','{\"filename\":\"5a9c19858c4a3.jpg\"}',3163,2101,NULL,'image/jpeg',1640651,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-04 17:06:42','2018-03-04 17:06:42',NULL,NULL,NULL,NULL,NULL,NULL),(32,23,'gallery-image-1803040341',NULL,1,'sonata.media.provider.image',1,'918fcd802861ae613f9e0bce2292fff4fabe83d8.jpeg','{\"filename\":\"5a9c19904c4c2.jpg\"}',4896,3264,NULL,'image/jpeg',1359700,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-04 17:06:42','2018-03-04 17:06:42',NULL,NULL,NULL,NULL,NULL,NULL),(33,23,'gallery-image-1803040307',NULL,1,'sonata.media.provider.image',1,'8ab80713b9e695335acb3c87d7c23714c036e559.jpeg','{\"filename\":\"5a9c26867de8a.jpg\"}',275,183,NULL,'image/jpeg',13501,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-04 18:02:07','2018-03-04 18:02:07',NULL,NULL,NULL,NULL,NULL,NULL),(34,23,'gallery-image-1803040307',NULL,1,'sonata.media.provider.image',1,'a17ca714a30308f58659d2acee7bf44a7f1408f3.jpeg','{\"filename\":\"5a9c268a2e58e.jpg\"}',318,159,NULL,'image/jpeg',17678,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-04 18:02:07','2018-03-04 18:02:07',NULL,NULL,NULL,NULL,NULL,NULL),(35,23,'gallery-image-1803040307',NULL,1,'sonata.media.provider.image',1,'088e490008fab3bfbeb2bd4a99ec0b4bc4a9150c.jpeg','{\"filename\":\"5a9c268d435aa.jpg\"}',1200,800,NULL,'image/jpeg',310711,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-04 18:02:07','2018-03-04 18:02:07',NULL,NULL,NULL,NULL,NULL,NULL),(36,33,'gallery-image-1803040329',NULL,1,'sonata.media.provider.image',1,'f2785dbed636b432913ee949f4e3d0bf9dec0f64.jpeg','{\"filename\":\"5a9c54a8e7587.jpg\"}',1124,445,NULL,'image/jpeg',265783,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-04 21:19:29','2018-03-04 21:19:29',NULL,NULL,NULL,NULL,NULL,NULL),(37,26,'gallery-image-1803050359',NULL,1,'sonata.media.provider.image',1,'d974a6f080ef60c4312db7b1e7ab2eca3891d525.png','{\"filename\":\"5a9d61fe0912b.png\"}',2560,1409,NULL,'image/png',1327754,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-05 16:28:00','2018-03-05 16:28:00',NULL,NULL,NULL,NULL,NULL,NULL),(42,7,'gallery-image-1803090310',NULL,1,'sonata.media.provider.image',1,'7265eee4f860f2f99bc6bea65c4482f1dc6ebf65.jpeg','{\"filename\":\"5aa2e9a942c49.jpg\"}',1280,720,NULL,'image/jpeg',234246,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-09 21:08:10','2018-03-09 21:08:10',NULL,NULL,NULL,NULL,NULL,NULL),(43,4,'gallery-image-1803100314',NULL,1,'sonata.media.provider.image',1,'498fcefe129050a1aa3e1efa058e09924702c562.png','{\"filename\":\"5aa436f4ed45e.png\"}',950,388,NULL,'image/png',488107,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-10 20:50:14','2018-03-10 20:50:14',NULL,NULL,NULL,NULL,NULL,NULL),(45,29,'gallery-image-1803120332',NULL,1,'sonata.media.provider.image',1,'cff4fd8b6c7394ca327c42d0513e51a88e87bc2e.png','{\"filename\":\"5aa66e370381b.png\"}',927,372,NULL,'image/png',551034,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-12 13:10:32','2018-03-12 13:10:32',NULL,NULL,NULL,NULL,NULL,NULL),(46,12,'gallery-image-1803120338',NULL,1,'sonata.media.provider.image',1,'93cb654993fa032e53c5b18117e2016bf1f65833.png','{\"filename\":\"5aa67a2e23aa2.png\"}',927,372,NULL,'image/png',551034,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-12 14:01:38','2018-03-12 14:01:38',NULL,NULL,NULL,NULL,NULL,NULL),(47,51,'gallery-image-1803120303',NULL,1,'sonata.media.provider.image',1,'7aff16493b80446f33a60c4ed08b0b8566124f7c.png','{\"filename\":\"5aa67ca214374.png\"}',500,445,NULL,'image/png',264522,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-12 14:12:03','2018-03-12 14:12:03',NULL,NULL,NULL,NULL,NULL,NULL),(48,51,'gallery-image-1803120330',NULL,1,'sonata.media.provider.image',1,'40c0ddd138864c17968b9d3edbd76076b95ffd63.png','{\"filename\":\"5aa68fd5422c0.png\"}',2560,1409,NULL,'image/png',1327754,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-12 15:34:31','2018-03-12 15:34:31',NULL,NULL,NULL,NULL,NULL,NULL),(49,51,'gallery-image-1803120330',NULL,1,'sonata.media.provider.image',1,'4396fa4ec125da25ef7a7e894b8b6c42a33fa896.png','{\"filename\":\"5aa68fd6bd8bf.png\"}',2560,1409,NULL,'image/png',1327754,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-12 15:34:31','2018-03-12 15:34:31',NULL,NULL,NULL,NULL,NULL,NULL),(50,51,'gallery-image-1803120330',NULL,1,'sonata.media.provider.image',1,'82a8f38a50fb9303fd46813581ab6f95de13fa2e.png','{\"filename\":\"5aa68fd86fdb6.png\"}',2560,1409,NULL,'image/png',1327754,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-12 15:34:31','2018-03-12 15:34:31',NULL,NULL,NULL,NULL,NULL,NULL),(51,51,'gallery-image-1803120330',NULL,1,'sonata.media.provider.image',1,'f183831d02a806c5a19ef655f131093af8763ef8.png','{\"filename\":\"5aa68fdae1e50.png\"}',2560,1409,NULL,'image/png',1327754,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-12 15:34:31','2018-03-12 15:34:31',NULL,NULL,NULL,NULL,NULL,NULL),(52,51,'gallery-image-1803120330',NULL,1,'sonata.media.provider.image',1,'d7b7d63c54cd1f20595598c951e2204913403086.png','{\"filename\":\"5aa68fdd02bf8.png\"}',1901,907,NULL,'image/png',909988,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-12 15:34:31','2018-03-12 15:34:31',NULL,NULL,NULL,NULL,NULL,NULL),(53,51,'gallery-image-1803120330',NULL,1,'sonata.media.provider.image',1,'ab0e00ab12c78db4422b089631db02400d888bb4.png','{\"filename\":\"5aa68fdf0285b.png\"}',2560,1409,NULL,'image/png',1327754,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-12 15:34:31','2018-03-12 15:34:31',NULL,NULL,NULL,NULL,NULL,NULL),(54,51,'gallery-image-1803120330',NULL,1,'sonata.media.provider.image',1,'72926571188171a2e7c0d4dd7fce3ee79d087f32.png','{\"filename\":\"5aa68fe05bc0c.png\"}',1901,907,NULL,'image/png',909988,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-12 15:34:31','2018-03-12 15:34:31',NULL,NULL,NULL,NULL,NULL,NULL),(55,51,'gallery-image-1803120330',NULL,1,'sonata.media.provider.image',1,'3104f685043e038a9155902ad3e57cbf2977da8c.png','{\"filename\":\"5aa68fe204560.png\"}',2560,1409,NULL,'image/png',1327754,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-12 15:34:32','2018-03-12 15:34:32',NULL,NULL,NULL,NULL,NULL,NULL),(56,51,'gallery-image-1803120330',NULL,1,'sonata.media.provider.image',1,'8dc67ca818ab5c0529d197dd732e8672832f6def.png','{\"filename\":\"5aa68fe4228b3.png\"}',1901,907,NULL,'image/png',909988,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-12 15:34:32','2018-03-12 15:34:32',NULL,NULL,NULL,NULL,NULL,NULL),(57,51,'gallery-image-1803120330',NULL,1,'sonata.media.provider.image',1,'29173ef2b82c70a8bf76abaaceaab38b46290ada.jpeg','{\"filename\":\"5aa68fe9982be.jpg\"}',1280,720,NULL,'image/jpeg',234246,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-12 15:34:32','2018-03-12 15:34:32',NULL,NULL,NULL,NULL,NULL,NULL),(58,51,'gallery-image-1803120330',NULL,1,'sonata.media.provider.image',1,'688f5dd85abeb5c1ff7963c4d2f339c1afde2821.jpeg','{\"filename\":\"5aa68fec15061.jpg\"}',1280,720,NULL,'image/jpeg',234246,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-12 15:34:32','2018-03-12 15:34:32',NULL,NULL,NULL,NULL,NULL,NULL),(59,51,'gallery-image-1803120330',NULL,1,'sonata.media.provider.image',1,'d3f4ef20c57fa113d836e40e0fdef41c688cde81.png','{\"filename\":\"5aa68ff021216.png\"}',1901,907,NULL,'image/png',909988,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-12 15:34:32','2018-03-12 15:34:32',NULL,NULL,NULL,NULL,NULL,NULL),(60,51,'gallery-image-1803120330',NULL,1,'sonata.media.provider.image',1,'d16ab56e3790ac4fba9441e2cf0d720d292be572.jpeg','{\"filename\":\"5aa68ff324439.JPG\"}',2482,4535,NULL,'image/jpeg',4806830,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-12 15:34:32','2018-03-12 15:34:32',NULL,NULL,NULL,NULL,NULL,NULL),(61,37,'gallery-image-1803120356',NULL,1,'sonata.media.provider.image',1,'59c550ed987be68743c3a71f72730b3ceee1c7b9.png','{\"filename\":\"5aa6ca6b1ae99.png\"}',950,388,NULL,'image/png',488107,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-12 19:43:56','2018-03-12 19:43:56',NULL,NULL,NULL,NULL,NULL,NULL),(62,52,'gallery-image-1803150333',NULL,1,'sonata.media.provider.image',1,'02f891948a318730e562936c24c7bdc28fa13939.jpeg','{\"filename\":\"5aaacc2e22a25.jpg\"}',1080,800,NULL,'image/jpeg',309070,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-15 20:40:33','2018-03-15 20:40:33',NULL,NULL,NULL,NULL,NULL,NULL),(63,52,'gallery-image-1803150333',NULL,1,'sonata.media.provider.image',1,'37df9684b27c3614c12e0cec0b6e219bb3acf8d7.jpeg','{\"filename\":\"5aaacc2f9d3a7.jpg\"}',1080,800,NULL,'image/jpeg',309070,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-15 20:40:33','2018-03-15 20:40:33',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `gallery_media__media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `homeimage__media`
--

DROP TABLE IF EXISTS `homeimage__media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `homeimage__media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `enabled` tinyint(1) NOT NULL,
  `provider_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_status` int(11) NOT NULL,
  `provider_reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_metadata` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `length` decimal(10,0) DEFAULT NULL,
  `content_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content_size` int(11) DEFAULT NULL,
  `copyright` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `context` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cdn_is_flushable` tinyint(1) DEFAULT NULL,
  `cdn_flush_identifier` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cdn_flush_at` datetime DEFAULT NULL,
  `cdn_status` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `homeimage__media`
--

LOCK TABLES `homeimage__media` WRITE;
/*!40000 ALTER TABLE `homeimage__media` DISABLE KEYS */;
INSERT INTO `homeimage__media` VALUES (1,'post-image-1803020318',NULL,1,'sonata.media.provider.image',1,'f64fcb5d3c5c1e353f7d27951f1ef76bfd458c00.png','{\"filename\":\"5a9fd638de660.png\"}',500,445,NULL,'image/png',226409,NULL,NULL,'homeimage',1,NULL,NULL,3,'2018-03-07 13:08:27','2018-03-02 14:30:18',NULL,NULL),(2,'post-image-1803020356',NULL,1,'sonata.media.provider.image',1,'edfb58ca7b23ba7710446ff173cf74e3384fb949.png','{\"filename\":\"5a998ac609ac3.png\"}',885,788,NULL,'image/png',467872,NULL,NULL,'homeimage',1,NULL,NULL,3,'2018-03-02 18:32:55','2018-03-02 14:30:56',NULL,NULL),(3,'post-image-1803020339',NULL,1,'sonata.media.provider.image',1,'f339953e3ea2a74277fa9e416734cb10af94477a.png','{\"filename\":\"5a99ae3772ac9.png\"}',480,445,NULL,'image/png',199290,NULL,NULL,'homeimage',1,NULL,NULL,3,'2018-03-02 21:04:09','2018-03-02 19:49:40',NULL,NULL),(4,'post-image-1803100342',NULL,1,'sonata.media.provider.image',1,'e8f590ab903aa677cf941058a8d4f861677ed6ca.png','{\"filename\":\"5aa43d0c50a06.png\"}',384,384,NULL,'image/png',95699,NULL,NULL,'homeimage',1,NULL,NULL,3,'2018-03-10 21:16:18','2018-03-10 21:14:42',NULL,NULL),(5,'post-image-1803130319',NULL,1,'sonata.media.provider.image',1,'0e955165c9922848732381d04f53881fc20fd5d2.png','{\"filename\":\"5aa7b592391ac.png\"}',500,445,NULL,'image/png',264522,NULL,NULL,'homeimage',NULL,NULL,NULL,NULL,'2018-03-13 12:27:19','2018-03-13 12:27:19',NULL,NULL),(6,'post-image-1803130336',NULL,1,'sonata.media.provider.image',1,'35bf19201623c9f0af1b9aad989a6ac4d7d934fd.png','{\"filename\":\"5aa7b5a39fab9.png\"}',500,445,NULL,'image/png',264522,NULL,NULL,'homeimage',NULL,NULL,NULL,NULL,'2018-03-13 12:27:36','2018-03-13 12:27:36',NULL,NULL);
/*!40000 ALTER TABLE `homeimage__media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logo__media`
--

DROP TABLE IF EXISTS `logo__media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logo__media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `enabled` tinyint(1) NOT NULL,
  `provider_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_status` int(11) NOT NULL,
  `provider_reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_metadata` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `length` decimal(10,0) DEFAULT NULL,
  `content_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content_size` int(11) DEFAULT NULL,
  `copyright` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `context` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cdn_is_flushable` tinyint(1) DEFAULT NULL,
  `cdn_flush_identifier` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cdn_flush_at` datetime DEFAULT NULL,
  `cdn_status` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logo__media`
--

LOCK TABLES `logo__media` WRITE;
/*!40000 ALTER TABLE `logo__media` DISABLE KEYS */;
INSERT INTO `logo__media` VALUES (1,'post-image-1802260215','a',0,'sonata.media.provider.image',1,'ad641f91c0287d0a3bb8c1eec41ccccfff9bf056.png','{\"filename\":\"5a94697e09688.png\"}',605,136,NULL,'image/png',59619,NULL,NULL,'imagenes',1,NULL,NULL,3,'2018-02-26 21:11:16','2018-02-26 11:30:15',NULL,'a'),(2,'post-image-1802260223',NULL,1,'sonata.media.provider.image',1,'6e2077ae3eb76e025f6c396e69dcbeada96aa9b4.jpeg','{\"filename\":\"5a93eb3b4f6b0.jpg\"}',275,183,NULL,'image/jpeg',11490,NULL,NULL,'imagenes',1,NULL,NULL,3,'2018-02-26 12:10:53','2018-02-26 12:09:23',NULL,NULL),(3,'post-image-1802260217',NULL,0,'sonata.media.provider.image',1,'2901906f19f8d129889f883af07ac1899e083f67.png','{\"filename\":\"5a946a1f90660.png\"}',605,136,NULL,'image/png',59619,NULL,NULL,'logo',NULL,NULL,NULL,NULL,'2018-02-26 21:12:35','2018-02-26 21:12:17',NULL,NULL),(4,'post-image-1803070346',NULL,1,'sonata.media.provider.image',1,'65b3ce2ed60cfcb408a25379b2b4dc69c223d6ea.png','{\"filename\":\"5aa26d6e7a84e.png\"}',950,388,NULL,'image/png',488107,NULL,NULL,'logo',1,NULL,NULL,3,'2018-03-09 12:18:09','2018-03-07 14:01:46',NULL,NULL),(5,'post-image-1803070305',NULL,1,'sonata.media.provider.image',1,'ae640dbfc00ee92c1eb11010f2c5a5d0da72f7f8.png','{\"filename\":\"5a9fe33b527e5.png\"}',256,156,NULL,'image/png',17962,NULL,NULL,'logo',1,NULL,NULL,3,'2018-03-07 14:03:57','2018-03-07 14:02:05',NULL,NULL),(7,'post-image-1803090329',NULL,1,'sonata.media.provider.image',1,'b0e7ad1e26d5d3dcc6074d0fa9553282a0f45478.jpeg','{\"filename\":\"5aa279e2b8a25.jpg\"}',146,108,NULL,'image/jpeg',36336,NULL,NULL,'logo',NULL,NULL,NULL,NULL,'2018-03-09 13:11:29','2018-03-09 13:11:29',NULL,NULL),(8,'post-image-1803090326',NULL,1,'sonata.media.provider.image',1,'240dcfd063dac0675f91d16a88dae9f14b1b31f7.png','{\"filename\":\"5aa27c07302ef.png\"}',256,120,NULL,'image/png',29023,NULL,NULL,'logo',NULL,NULL,NULL,NULL,'2018-03-09 13:20:26','2018-03-09 13:20:26',NULL,NULL),(9,'post-image-1803090333',NULL,1,'sonata.media.provider.image',1,'f23a759ec1fdcf0cd9a52c44e98ea4e0a1b0905a.png','{\"filename\":\"5aa286d53fb16.png\"}',288,175,NULL,'image/png',4396,NULL,NULL,'logo',NULL,NULL,NULL,NULL,'2018-03-09 14:06:33','2018-03-09 14:06:33',NULL,NULL),(10,'post-image-1803100313',NULL,1,'sonata.media.provider.image',1,'c4bcd78a792049795b33f196df13a60f9d54ac78.png','{\"filename\":\"5aa3dbc28ddad.png\"}',500,445,NULL,'image/png',264522,NULL,NULL,'logo',NULL,NULL,NULL,NULL,'2018-03-10 14:21:13','2018-03-10 14:21:13',NULL,NULL),(11,'post-image-1803100346',NULL,1,'sonata.media.provider.image',1,'d53c8ddc1e47a1b311755c18fdfa9423f788cea3.jpeg','{\"filename\":\"5aa43c35c1339.jpeg\"}',300,168,NULL,'image/jpeg',15574,NULL,NULL,'logo',NULL,NULL,NULL,NULL,'2018-03-10 21:12:46','2018-03-10 21:12:46',NULL,NULL),(12,'post-image-1803100342',NULL,1,'sonata.media.provider.image',1,'882295d38fd67520e814ae3e450edb6bc27f35c5.png','{\"filename\":\"5aa43d0e0653d.png\"}',384,384,NULL,'image/png',95699,NULL,NULL,'logo',1,NULL,NULL,3,'2018-03-10 21:16:18','2018-03-10 21:14:42',NULL,NULL),(13,'post-image-1803130319',NULL,1,'sonata.media.provider.image',1,'75537b01922aae5487f7b0d5980e5a9407bb1cb8.png','{\"filename\":\"5aa7b5942afd1.png\"}',500,445,NULL,'image/png',264522,NULL,NULL,'logo',NULL,NULL,NULL,NULL,'2018-03-13 12:27:19','2018-03-13 12:27:19',NULL,NULL),(14,'post-image-1803130336',NULL,1,'sonata.media.provider.image',1,'8d43d4ca489d9aaef0b98f752638089b51f5eea9.png','{\"filename\":\"5aa7b5a4ef1de.png\"}',500,445,NULL,'image/png',264522,NULL,NULL,'logo',NULL,NULL,NULL,NULL,'2018-03-13 12:27:36','2018-03-13 12:27:36',NULL,NULL);
/*!40000 ALTER TABLE `logo__media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media__gallery`
--

DROP TABLE IF EXISTS `media__gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media__gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `context` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `default_format` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media__gallery`
--

LOCK TABLES `media__gallery` WRITE;
/*!40000 ALTER TABLE `media__gallery` DISABLE KEYS */;
INSERT INTO `media__gallery` VALUES (1,'Nombre','default','reference',0,'2018-02-09 03:41:14','2018-02-09 03:41:14'),(2,'hola','default','reference',0,'2018-02-09 04:00:33','2018-02-09 04:00:33');
/*!40000 ALTER TABLE `media__gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media__gallery_media`
--

DROP TABLE IF EXISTS `media__gallery_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media__gallery_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) DEFAULT NULL,
  `media_id` int(11) DEFAULT NULL,
  `position` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_80D4C5414E7AF8F` (`gallery_id`),
  KEY `IDX_80D4C541EA9FDD75` (`media_id`),
  CONSTRAINT `FK_80D4C5414E7AF8F` FOREIGN KEY (`gallery_id`) REFERENCES `media__gallery` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_80D4C541EA9FDD75` FOREIGN KEY (`media_id`) REFERENCES `media__media` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media__gallery_media`
--

LOCK TABLES `media__gallery_media` WRITE;
/*!40000 ALTER TABLE `media__gallery_media` DISABLE KEYS */;
INSERT INTO `media__gallery_media` VALUES (1,1,9,1,0,'2018-02-09 03:41:14','2018-02-09 03:41:14'),(2,2,11,1,0,'2018-02-09 04:00:33','2018-02-09 04:00:33');
/*!40000 ALTER TABLE `media__gallery_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media__media`
--

DROP TABLE IF EXISTS `media__media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media__media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `enabled` tinyint(1) NOT NULL,
  `provider_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_status` int(11) NOT NULL,
  `provider_reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_metadata` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `length` decimal(10,0) DEFAULT NULL,
  `content_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content_size` int(11) DEFAULT NULL,
  `copyright` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `context` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cdn_is_flushable` tinyint(1) DEFAULT NULL,
  `cdn_flush_identifier` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cdn_flush_at` datetime DEFAULT NULL,
  `cdn_status` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media__media`
--

LOCK TABLES `media__media` WRITE;
/*!40000 ALTER TABLE `media__media` DISABLE KEYS */;
INSERT INTO `media__media` VALUES (3,'paso_final_prestige.png',NULL,0,'sonata.media.provider.image',1,'75e2c4fc2714b65435c379ab4b5a4fafeb2259e4.png','{\"filename\":\"paso_final_prestige.png\"}',1284,907,NULL,'image/png',65171,NULL,NULL,'default',NULL,NULL,NULL,NULL,'2018-02-09 03:28:35','2018-02-09 03:28:35',NULL,NULL),(8,'em.jpeg',NULL,0,'sonata.media.provider.image',1,'e729d63dc04fe7b87cfb691323c634553045445e.jpeg','{\"filename\":\"em.jpeg\"}',540,659,NULL,'image/jpeg',58404,NULL,NULL,'default',NULL,NULL,NULL,NULL,'2018-02-09 03:40:19','2018-02-09 03:40:19',NULL,NULL),(9,'em.jpeg',NULL,0,'sonata.media.provider.image',1,'5145e1ef6d6d4d35c577b4ba1b37a7b83a3e5b76.jpeg','{\"filename\":\"em.jpeg\"}',540,659,NULL,'image/jpeg',58404,NULL,NULL,'default',NULL,NULL,NULL,NULL,'2018-02-09 03:40:58','2018-02-09 03:40:58',NULL,NULL),(10,'em.jpeg',NULL,0,'sonata.media.provider.image',1,'84ed35ce2a047fbfe0cbafc7cdd93f2c2f9b8968.jpeg','{\"filename\":\"em.jpeg\"}',540,659,NULL,'image/jpeg',58404,NULL,NULL,'default',NULL,NULL,NULL,NULL,'2018-02-09 03:47:28','2018-02-09 03:47:28',NULL,NULL),(11,'em.jpeg',NULL,0,'sonata.media.provider.image',1,'981f94ad4d74fd458d2eae5c0aa24108f7f389a2.jpeg','{\"filename\":\"em.jpeg\"}',540,659,NULL,'image/jpeg',58404,NULL,NULL,'default',NULL,NULL,NULL,NULL,'2018-02-09 04:00:23','2018-02-09 04:00:23',NULL,NULL),(12,'descarga.png',NULL,0,'sonata.media.provider.image',1,'44f93c3c3eba9d2f59088a1f5a9da1904ba6d5fd.png','{\"filename\":\"descarga.png\"}',195,195,NULL,'image/png',4523,NULL,NULL,'imagenes',NULL,NULL,NULL,NULL,'2018-02-09 13:32:45','2018-02-09 13:32:45',NULL,NULL),(13,'vp.png',NULL,0,'sonata.media.provider.image',1,'3f3c791956225c6e66586633da574844de456dbb.png','{\"filename\":\"vp.png\"}',1272,867,NULL,'image/png',1143678,NULL,NULL,'imagenes',1,NULL,NULL,3,'2018-02-17 16:51:57','2018-02-17 16:49:56',NULL,NULL),(14,'vp.png',NULL,0,'sonata.media.provider.image',1,'9e017de1b68974ef4a2f5a9095f8029f70428a4b.png','{\"filename\":\"vp.png\"}',1272,867,NULL,'image/png',1143678,NULL,NULL,'imagenes',NULL,NULL,NULL,NULL,'2018-02-17 16:51:56','2018-02-17 16:51:56',NULL,NULL),(15,'vp.png',NULL,0,'sonata.media.provider.image',1,'32bfbd99ff19b16f4f63ea1457c378def2c431cc.png','{\"filename\":\"vp.png\"}',1272,867,NULL,'image/png',1143678,NULL,NULL,'imagenes',1,NULL,NULL,3,'2018-02-18 11:56:35','2018-02-18 11:54:35',NULL,NULL),(16,'vp.png',NULL,0,'sonata.media.provider.image',1,'65c41338e78f43dcdf2bbe3f24e4fa18aa1cdafb.png','{\"filename\":\"vp.png\"}',1272,867,NULL,'image/png',1143678,NULL,NULL,'imagenes',NULL,NULL,NULL,NULL,'2018-02-18 11:56:35','2018-02-18 11:56:35',NULL,NULL),(17,'599dc627c316d.jpg',NULL,0,'sonata.media.provider.image',1,'ed9ef902a210f434df2c7407cb2ba3aaeade8333.jpeg','{\"filename\":\"599dc627c316d.jpg\"}',1024,532,NULL,'image/jpeg',111018,NULL,NULL,'imagenes',NULL,NULL,NULL,NULL,'2018-02-20 11:42:19','2018-02-20 11:42:19',NULL,NULL);
/*!40000 ALTER TABLE `media__media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modality`
--

DROP TABLE IF EXISTS `modality`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modality` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `descriptionEN` longtext COLLATE utf8_unicode_ci,
  `_order` int(11) DEFAULT NULL,
  `nameEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoTitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoTitleEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoKeywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoKeywordsEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  `updatedAt` date DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modality`
--

LOCK TABLES `modality` WRITE;
/*!40000 ALTER TABLE `modality` DISABLE KEYS */;
INSERT INTO `modality` VALUES (1,'Moto GP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'moto-gp'),(2,'Moto 3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'moto-3'),(8,'FIM-JR',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fim-jr');
/*!40000 ALTER TABLE `modality` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moto`
--

DROP TABLE IF EXISTS `moto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `builder_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nameEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `descriptionEN` longtext COLLATE utf8_unicode_ci,
  `seoTitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoTitleEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoKeywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoKeywordsEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `_order` int(11) DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  `updatedAt` date DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3DDDBCE4959F66E4` (`builder_id`),
  CONSTRAINT `FK_3DDDBCE4959F66E4` FOREIGN KEY (`builder_id`) REFERENCES `builder` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moto`
--

LOCK TABLES `moto` WRITE;
/*!40000 ALTER TABLE `moto` DISABLE KEYS */;
INSERT INTO `moto` VALUES (1,1,'Yamaha bebere beberre','English neim',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL);
/*!40000 ALTER TABLE `moto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nameEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `descriptionEN` longtext COLLATE utf8_unicode_ci,
  `seoTitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoTitleEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoKeywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoKeywordsEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `_order` int(11) DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  `updatedAt` date DEFAULT NULL,
  `lastSendAt` date DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7E8585C84B89032C` (`post_id`),
  CONSTRAINT `FK_7E8585C84B89032C` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newsletter`
--

LOCK TABLES `newsletter` WRITE;
/*!40000 ALTER TABLE `newsletter` DISABLE KEYS */;
INSERT INTO `newsletter` VALUES (1,2,'Prueba newsletter','a',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-03-16',NULL);
/*!40000 ALTER TABLE `newsletter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `newsletter_customergroup`
--

DROP TABLE IF EXISTS `newsletter_customergroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `newsletter_customergroup` (
  `newsletter_id` int(11) NOT NULL,
  `customergroup_id` int(11) NOT NULL,
  PRIMARY KEY (`newsletter_id`,`customergroup_id`),
  KEY `IDX_D3C221A322DB1917` (`newsletter_id`),
  KEY `IDX_D3C221A396C19C84` (`customergroup_id`),
  CONSTRAINT `FK_D3C221A322DB1917` FOREIGN KEY (`newsletter_id`) REFERENCES `newsletter` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_D3C221A396C19C84` FOREIGN KEY (`customergroup_id`) REFERENCES `customer_group` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newsletter_customergroup`
--

LOCK TABLES `newsletter_customergroup` WRITE;
/*!40000 ALTER TABLE `newsletter_customergroup` DISABLE KEYS */;
/*!40000 ALTER TABLE `newsletter_customergroup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `newsletter_customertype`
--

DROP TABLE IF EXISTS `newsletter_customertype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `newsletter_customertype` (
  `newsletter_id` int(11) NOT NULL,
  `customertype_id` int(11) NOT NULL,
  PRIMARY KEY (`newsletter_id`,`customertype_id`),
  KEY `IDX_85AB215B22DB1917` (`newsletter_id`),
  KEY `IDX_85AB215B8DBAB741` (`customertype_id`),
  CONSTRAINT `FK_85AB215B22DB1917` FOREIGN KEY (`newsletter_id`) REFERENCES `newsletter` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_85AB215B8DBAB741` FOREIGN KEY (`customertype_id`) REFERENCES `customer_type` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newsletter_customertype`
--

LOCK TABLES `newsletter_customertype` WRITE;
/*!40000 ALTER TABLE `newsletter_customertype` DISABLE KEYS */;
INSERT INTO `newsletter_customertype` VALUES (1,1),(1,2);
/*!40000 ALTER TABLE `newsletter_customertype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `descriptionEN` longtext COLLATE utf8_unicode_ci,
  `_order` int(11) DEFAULT NULL,
  `modality_id` int(11) DEFAULT NULL,
  `nameEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoTitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoTitleEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoKeywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoKeywordsEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  `updatedAt` date DEFAULT NULL,
  `featuredMedia_id` int(11) DEFAULT NULL,
  `rider_id` int(11) DEFAULT NULL,
  `circuit_id` int(11) DEFAULT NULL,
  `season_id` int(11) DEFAULT NULL,
  `publishedAt` date DEFAULT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  `circuitOrder` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5A8A6C8D2D6D889B` (`modality_id`),
  KEY `IDX_5A8A6C8DFF881F6` (`rider_id`),
  KEY `IDX_5A8A6C8DCF2182C8` (`circuit_id`),
  KEY `IDX_5A8A6C8D4EC001D1` (`season_id`),
  KEY `IDX_5A8A6C8DC6604E13` (`featuredMedia_id`),
  KEY `IDX_5A8A6C8D4E7AF8F` (`gallery_id`),
  KEY `IDX_5A8A6C8D12469DE2` (`category_id`),
  CONSTRAINT `FK_5A8A6C8D12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL,
  CONSTRAINT `FK_5A8A6C8D2D6D889B` FOREIGN KEY (`modality_id`) REFERENCES `modality` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_5A8A6C8D4E7AF8F` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`id`) ON DELETE SET NULL,
  CONSTRAINT `FK_5A8A6C8D4EC001D1` FOREIGN KEY (`season_id`) REFERENCES `season` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_5A8A6C8DC6604E13` FOREIGN KEY (`featuredMedia_id`) REFERENCES `featured_media__media` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_5A8A6C8DCF2182C8` FOREIGN KEY (`circuit_id`) REFERENCES `circuit` (`id`) ON DELETE SET NULL,
  CONSTRAINT `FK_5A8A6C8DFF881F6` FOREIGN KEY (`rider_id`) REFERENCES `rider` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (2,'Rossi: \"Las salvadas de Márquez no son coincidenciaaaaaaaaaaaaaaaa algo','<p><strong>&Aacute;ngel Nieto Rold&aacute;n</strong>&nbsp;(<a href=\"https://es.wikipedia.org/wiki/Zamora\" title=\"Zamora\">Zamora</a>,&nbsp;<a href=\"https://es.wikipedia.org/wiki/25_de_enero\" title=\"25 de enero\">25 de enero</a>&nbsp;de&nbsp;<a href=\"https://es.wikipedia.org/wiki/1947\" title=\"1947\">1947</a>-<a href=\"https://es.wikipedia.org/wiki/Ibiza\" title=\"Ibiza\">Ibiza</a>,&nbsp;<a href=\"https://es.wikipedia.org/wiki/3_de_agosto\" title=\"3 de agosto\">3 de agosto</a>&nbsp;de&nbsp;<a href=\"https://es.wikipedia.org/wiki/2017\" title=\"2017\">2017</a>)<sup><a href=\"https://es.wikipedia.org/wiki/%C3%81ngel_Nieto#cite_note-:0-1\">1</a></sup>​ fue un piloto de&nbsp;<a href=\"https://es.wikipedia.org/wiki/Motociclismo\" title=\"Motociclismo\">motociclismo</a><a href=\"https://es.wikipedia.org/wiki/Espa%C3%B1a\" title=\"España\">espa&ntilde;ol</a>, campe&oacute;n del mundo en 13 ocasiones, aunque por&nbsp;<a href=\"https://es.wikipedia.org/wiki/Triscaidecafobia\" title=\"Triscaidecafobia\">triscaidecafobia</a>&nbsp;prefer&iacute;a decir que fueron 12+1. Tiene el mejor palmar&eacute;s entre los motociclistas espa&ntilde;oles y el segundo a nivel mundial tras&nbsp;<a href=\"https://es.wikipedia.org/wiki/Giacomo_Agostini\" title=\"Giacomo Agostini\">Giacomo Agostini</a>. Consigui&oacute; 6 t&iacute;tulos mundiales en la categor&iacute;a de 50cc (1969, 1970, 1972. 1975, 1976 y 1977) y 7 en la de 125cc (1971, 1972, 1979, 1981, 1982, 1983 y 1984), conquistas que logr&oacute; con cinco marcas distintas (<a href=\"https://es.wikipedia.org/wiki/Derbi_(motocicleta)\" title=\"Derbi (motocicleta)\">Derbi</a>,&nbsp;<a href=\"https://es.wikipedia.org/wiki/Kreidler\" title=\"Kreidler\">Kreidler</a>,&nbsp;<a href=\"https://es.wikipedia.org/wiki/Bultaco\" title=\"Bultaco\">Bultaco</a>, Minarelli y&nbsp;<a href=\"https://es.wikipedia.org/wiki/Garelli\" title=\"Garelli\">Garelli</a>). Adem&aacute;s logr&oacute; 4 subcampeonatos del mundo, 23 campeonatos de Espa&ntilde;a y 5 subcampeonatos de Espa&ntilde;a. Tambi&eacute;n forman parte de su palmar&eacute;s las 90 victorias en grandes premios de motociclismo y 139 podios, y 128 victorias en campeonatos de Espa&ntilde;a.<sup><a href=\"https://es.wikipedia.org/wiki/%C3%81ngel_Nieto#cite_note-2\">2</a></sup>​</p>\r\n\r\n<p>Nieto abri&oacute; la puerta a la gran generaci&oacute;n pilotos que lleg&oacute; detr&aacute;s, tanto dentro como fuera de su familia. Era padre de los tambi&eacute;n expilotos de motociclismo&nbsp;<a href=\"https://es.wikipedia.org/wiki/%C3%81ngel_Nieto_Jr.\" title=\"Ángel Nieto Jr.\">&Aacute;ngel Nieto Jr.</a>&nbsp;(1976),&nbsp;<a href=\"https://es.wikipedia.org/wiki/Pablo_Nieto\" title=\"Pablo Nieto\">Pablo Nieto</a>&nbsp;(1980) y t&iacute;o del piloto&nbsp;<a href=\"https://es.wikipedia.org/wiki/Fonsi_Nieto\" title=\"Fonsi Nieto\">Fonsi Nieto</a>(1978). Pilotos como los&nbsp;<a href=\"https://es.wikipedia.org/wiki/Sito_Pons\" title=\"Sito Pons\">Pons</a>,&nbsp;<a href=\"https://es.wikipedia.org/wiki/Jorge_Mart%C3%ADnez_%C2%ABAspar%C2%BB\" title=\"Jorge Martínez «Aspar»\">Aspar</a>,&nbsp;<a href=\"https://es.wikipedia.org/wiki/Champi_Herreros\" title=\"Champi Herreros\">Herreros</a>,&nbsp;<a href=\"https://es.wikipedia.org/wiki/%C3%80lex_Crivill%C3%A9\" title=\"Àlex Crivillé\">Crivill&eacute;</a>,&nbsp;<a href=\"https://es.wikipedia.org/wiki/Jorge_Lorenzo\" title=\"Jorge Lorenzo\">Lorenzo</a>,&nbsp;<a href=\"https://es.wikipedia.org/wiki/Marc_M%C3%A1rquez\" title=\"Marc Márquez\">M&aacute;rquez</a>&nbsp;y compa&ntilde;&iacute;a siguieron la senda del &lsquo;Maestro&rsquo; para convertir a Espa&ntilde;a en una de las dos grandes potencias del motociclismo mundial junto a Italia.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>&Iacute;ndice</h2>\r\n\r\n<p>&nbsp;&nbsp;[ocultar]&nbsp;</p>\r\n\r\n<ul>\r\n	<li><a href=\"https://es.wikipedia.org/wiki/%C3%81ngel_Nieto#Biograf%C3%ADa\">1Biograf&iacute;a</a>\r\n\r\n	<ul>\r\n		<li><a href=\"https://es.wikipedia.org/wiki/%C3%81ngel_Nieto#Pionero\">1.1Pionero</a></li>\r\n		<li><a href=\"https://es.wikipedia.org/wiki/%C3%81ngel_Nieto#Retirada_del_motociclismo_activo\">1.2Retirada del motociclismo activo</a></li>\r\n		<li><a href=\"https://es.wikipedia.org/wiki/%C3%81ngel_Nieto#Muerte\">1.3Muerte</a></li>\r\n	</ul>\r\n	</li>\r\n	<li><a href=\"https://es.wikipedia.org/wiki/%C3%81ngel_Nieto#Vida_personal\">2Vida personal</a></li>\r\n	<li><a href=\"https://es.wikipedia.org/wiki/%C3%81ngel_Nieto#Premios_y_reconocimientos\">3Premios y reconocimientos</a></li>\r\n	<li><a href=\"https://es.wikipedia.org/wiki/%C3%81ngel_Nieto#Estad%C3%ADsticas_de_carrera\">4Estad&iacute;sticas de carrera</a>\r\n	<ul>\r\n		<li><a href=\"https://es.wikipedia.org/wiki/%C3%81ngel_Nieto#Palmar%C3%A9s\">4.1Palmar&eacute;s</a></li>\r\n		<li><a href=\"https://es.wikipedia.org/wiki/%C3%81ngel_Nieto#Cifras\">4.2Cifras</a></li>\r\n		<li><a href=\"https://es.wikipedia.org/wiki/%C3%81ngel_Nieto#Campeonato_Mundial_de_Motociclismo\">4.3Campeonato Mundial de Motociclismo</a>\r\n		<ul>\r\n			<li><a href=\"https://es.wikipedia.org/wiki/%C3%81ngel_Nieto#Carreras_por_a%C3%B1o\">4.3.1Carreras por a&ntilde;o</a></li>\r\n		</ul>\r\n		</li>\r\n	</ul>\r\n	</li>\r\n	<li><a href=\"https://es.wikipedia.org/wiki/%C3%81ngel_Nieto#Filmograf%C3%ADa\">5Filmograf&iacute;a</a></li>\r\n	<li><a href=\"https://es.wikipedia.org/wiki/%C3%81ngel_Nieto#V%C3%A9ase_tambi%C3%A9n\">6V&eacute;ase tambi&eacute;n</a></li>\r\n	<li><a href=\"https://es.wikipedia.org/wiki/%C3%81ngel_Nieto#Referencias\">7Referencias</a></li>\r\n	<li><a href=\"https://es.wikipedia.org/wiki/%C3%81ngel_Nieto#Enlaces_externos\">8Enlaces externos</a></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Biograf&iacute;a[<a href=\"https://es.wikipedia.org/w/index.php?title=%C3%81ngel_Nieto&amp;action=edit&amp;section=1\" title=\"Editar sección: Biografía\">editar</a>]</h2>\r\n\r\n<p>Naci&oacute; en la ciudad de&nbsp;<a href=\"https://es.wikipedia.org/wiki/Zamora\" title=\"Zamora\">Zamora</a>, en el seno de una familia humilde que finalmente tuvo que emigrar al&nbsp;<a href=\"https://es.wikipedia.org/wiki/Madrid\" title=\"Madrid\">madrile&ntilde;o</a>barrio de&nbsp;<a href=\"https://es.wikipedia.org/wiki/Vallecas\" title=\"Vallecas\">Vallecas</a>, cuando ten&iacute;a un solo a&ntilde;o de edad, y en el que pas&oacute; su infancia y naci&oacute; su pasi&oacute;n por el motociclismo.<sup><a href=\"https://es.wikipedia.org/wiki/%C3%81ngel_Nieto#cite_note-:1-3\">3</a></sup>​ No le atra&iacute;an los estudios pero s&iacute; la mec&aacute;nica. Empez&oacute; a trabajar como aprendiz en el taller de Tom&aacute;s D&iacute;az Vald&eacute;s, un periodista especializado en temas de motor y con importantes contactos en Madrid que le prest&oacute; ayuda en sus inicios deportivos.<sup><a href=\"https://es.wikipedia.org/wiki/%C3%81ngel_Nieto#cite_note-:1-3\">3</a></sup>​<sup><a href=\"https://es.wikipedia.org/wiki/%C3%81ngel_Nieto#cite_note-:2-4\">4</a></sup>​</p>\r\n\r\n<p>Un d&iacute;a en Madrid en una carrera de campeonato en el&nbsp;<a href=\"https://es.wikipedia.org/wiki/Parque_del_Retiro_de_Madrid\" title=\"Parque del Retiro de Madrid\">parque del Retiro</a>&nbsp;se cuela y llega hasta los boxes donde encuentra a&nbsp;<a href=\"https://es.wikipedia.org/wiki/Paco_Bult%C3%B3\" title=\"Paco Bultó\">Paco Bult&oacute;</a>, due&ntilde;o de&nbsp;<a href=\"https://es.wikipedia.org/wiki/Bultaco\" title=\"Bultaco\">Bultaco</a>, y le pregunta c&oacute;mo hacer para trabajar en el departamento de competici&oacute;n de su marca y este le dice que escriba una carta y ya le contestar&aacute;n. Como la carta nunca llega &Aacute;ngel Nieto decide a los catorce a&ntilde;os trasladarse a Barcelona a vivir con su t&iacute;a y buscar trabajo de mec&aacute;nico.<sup><a href=\"https://es.wikipedia.org/wiki/%C3%81ngel_Nieto#cite_note-:2-4\">4</a></sup>​</p>\r\n\r\n<p>Intenta trabajar en Derbi de aprendiz en el departamento de competici&oacute;n, pero casi no le reciben. Apenas vive unos d&iacute;as en casa de su t&iacute;a y se traslada a una pensi&oacute;n con el poco dinero que le queda. Decidido a entrar en&nbsp;<a href=\"https://es.wikipedia.org/wiki/Bultaco\" title=\"Bultaco\">Bultaco</a>&nbsp;se va a la puerta de la f&aacute;brica a esperar a&nbsp;<a href=\"https://es.wikipedia.org/wiki/Paco_Bult%C3%B3\" title=\"Paco Bultó\">Paco Bult&oacute;</a>. Cuando llega, &eacute;ste le recuerda de Madrid y decide enviarle al departamento de competici&oacute;n como aprendiz.<sup><a href=\"https://es.wikipedia.org/wiki/%C3%81ngel_Nieto#cite_note-:2-4\">4</a></sup>​ No durar&aacute; mucho. Medrano, uno de los pilotos oficiales de Bultaco, se va de gira, y &Aacute;ngel le propone ir con &eacute;l. Aunque no tiene dinero para pagarle le basta con que le d&eacute; de comer y le deje dormir en el Renault Dauphine. Significa para &eacute;l un paso adelante, aunque no cobre ya no es un aprendiz sino un mec&aacute;nico de competici&oacute;n.<sup><a href=\"https://es.wikipedia.org/wiki/%C3%81ngel_Nieto#cite_note-:2-4\">4</a></sup>​</p>\r\n\r\n<p>Cuando la gira termina y vuelve a Barcelona se encuentra sin trabajo, ya que se ha marchado sin permiso, pero durante la gira ha conocido a gente de&nbsp;<a href=\"https://es.wikipedia.org/wiki/Ducati\" title=\"Ducati\">Ducati</a>&nbsp;que le dar&aacute; trabajo. Sin embargo, el departamento de competici&oacute;n de Ducati solo tiene motos de 125 cent&iacute;metros c&uacute;bicos que &Aacute;ngel, con quince a&ntilde;os, no puede llevar. Cumplidos los diecis&eacute;is busca de nuevo trabajo en&nbsp;<a href=\"https://es.wikipedia.org/wiki/Derbi_(motocicleta)\" title=\"Derbi (motocicleta)\">Derbi</a>, que tiene motos de 50cc. Empieza entonces su preparaci&oacute;n como piloto.<sup><a href=\"https://es.wikipedia.org/wiki/%C3%81ngel_Nieto#cite_note-:2-4\">4</a></sup>​</p>','<p>Transleitee</p>',3,1,'Rossi: The saved are not coincidence',NULL,NULL,NULL,NULL,NULL,NULL,22,NULL,2,1,'2018-02-21',NULL,NULL,1,'rossi-las-salvadas-de-marquez-no-son-coincidenciaaaaaaaaaaaaaaaa-algo'),(3,'Hamilton alaba a los pilotos de motos.','<p>El texto en s&iacute; no tiene sentido, aunque no es completamente aleatorio, sino que deriva de un texto de&nbsp;<a href=\"https://es.wikipedia.org/wiki/Cicer%C3%B3n\" title=\"Cicerón\">Cicer&oacute;n</a>&nbsp;en lengua&nbsp;<a href=\"https://es.wikipedia.org/wiki/Lat%C3%ADn\" title=\"Latín\">latina</a>, a cuyas palabras se les han eliminado s&iacute;labas o letras. El significado del texto no tiene importancia, ya que solo es una demostraci&oacute;n o prueba, pero se inspira en la obra de&nbsp;<a href=\"https://es.wikipedia.org/wiki/Cicer%C3%B3n\" title=\"Cicerón\">Cicer&oacute;n</a>&nbsp;<em><a href=\"https://es.wikipedia.org/wiki/De_finibus\" title=\"De finibus\">De finibus bonorum et malorum</a></em>&nbsp;(<em>Sobre los l&iacute;mites del bien y del mal</em>) que comienza con:</p>',NULL,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,23,NULL,1,1,'2018-02-22',52,NULL,1,'hamilton-alaba-a-los-pilotos-de-motos'),(4,'Moto3','<p>a</p>','<p>a</p>',2,1,'a',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,1,'2018-03-12',NULL,NULL,1,'moto3');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_category`
--

DROP TABLE IF EXISTS `post_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_category` (
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`,`category_id`),
  KEY `IDX_B9A190604B89032C` (`post_id`),
  KEY `IDX_B9A1906012469DE2` (`category_id`),
  CONSTRAINT `FK_B9A1906012469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_B9A190604B89032C` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_category`
--

LOCK TABLES `post_category` WRITE;
/*!40000 ALTER TABLE `post_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_gallery`
--

DROP TABLE IF EXISTS `post_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_gallery` (
  `post_id` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`,`gallery_id`),
  KEY `IDX_7AC3CF094B89032C` (`post_id`),
  KEY `IDX_7AC3CF094E7AF8F` (`gallery_id`),
  CONSTRAINT `FK_7AC3CF094B89032C` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_7AC3CF094E7AF8F` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_gallery`
--

LOCK TABLES `post_gallery` WRITE;
/*!40000 ALTER TABLE `post_gallery` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_media__media`
--

DROP TABLE IF EXISTS `post_media__media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_media__media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `enabled` tinyint(1) NOT NULL,
  `provider_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_status` int(11) NOT NULL,
  `provider_reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_metadata` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `length` decimal(10,0) DEFAULT NULL,
  `content_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content_size` int(11) DEFAULT NULL,
  `copyright` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `context` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cdn_is_flushable` tinyint(1) DEFAULT NULL,
  `cdn_flush_identifier` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cdn_flush_at` datetime DEFAULT NULL,
  `cdn_status` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `_order` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `titleEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F750AA9D7E3C61F9` (`owner_id`),
  CONSTRAINT `FK_F750AA9D7E3C61F9` FOREIGN KEY (`owner_id`) REFERENCES `post` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_media__media`
--

LOCK TABLES `post_media__media` WRITE;
/*!40000 ALTER TABLE `post_media__media` DISABLE KEYS */;
INSERT INTO `post_media__media` VALUES (54,'post-image-1802200201',NULL,1,'sonata.media.provider.image',1,'c814e07fa72cfaee3f17a785f94bbde55060eb4c.jpeg','{\"filename\":\"5a8c18c1017e6.jpg\"}',1366,408,NULL,'image/jpeg',277931,NULL,NULL,'imagenes',NULL,NULL,NULL,NULL,'2018-02-20 13:47:01','2018-02-20 13:47:01',NULL,NULL,NULL,NULL,NULL,NULL),(55,'post-image-1803070334',NULL,1,'sonata.media.provider.image',1,'e21b8ba398e8aa0c4979858ae020174a98a6e93f.png','{\"filename\":\"5a9fd6f1083b7.png\"}',927,372,NULL,'image/png',551034,NULL,NULL,'post',NULL,NULL,NULL,NULL,'2018-03-07 13:11:34','2018-03-07 13:11:34',2,NULL,NULL,NULL,NULL,NULL),(56,'post-image-1803070334',NULL,1,'sonata.media.provider.image',1,'966d001e3dc0b822e5151d2f499df523db103627.png','{\"filename\":\"5a9fd6f11af98.png\"}',950,388,NULL,'image/png',488107,NULL,NULL,'post',NULL,NULL,NULL,NULL,'2018-03-07 13:11:34','2018-03-07 13:11:34',2,NULL,NULL,NULL,NULL,NULL),(58,'post-image-1803150306',NULL,1,'sonata.media.provider.image',1,'cae2b13b10d41f00bfd7e75fb61c1dd9803c4cbe.jpeg','{\"filename\":\"5aaabdc3bede9.jpg\"}',3163,2101,NULL,'image/jpeg',1640651,NULL,NULL,'post',NULL,NULL,NULL,NULL,'2018-03-15 19:39:06','2018-03-15 19:39:06',2,NULL,NULL,NULL,NULL,NULL),(59,'post-image-1803150306',NULL,1,'sonata.media.provider.image',1,'ad4df4c51553d31088059ddf9451642b2d3e39a7.jpeg','{\"filename\":\"5aaabdc84aacf.jpg\"}',715,374,NULL,'image/jpeg',102686,NULL,NULL,'post',NULL,NULL,NULL,NULL,'2018-03-15 19:39:06','2018-03-15 19:39:06',2,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `post_media__media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `previewimage__media`
--

DROP TABLE IF EXISTS `previewimage__media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `previewimage__media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `enabled` tinyint(1) NOT NULL,
  `provider_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_status` int(11) NOT NULL,
  `provider_reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_metadata` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `length` decimal(10,0) DEFAULT NULL,
  `content_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content_size` int(11) DEFAULT NULL,
  `copyright` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `context` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cdn_is_flushable` tinyint(1) DEFAULT NULL,
  `cdn_flush_identifier` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cdn_flush_at` datetime DEFAULT NULL,
  `cdn_status` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `previewimage__media`
--

LOCK TABLES `previewimage__media` WRITE;
/*!40000 ALTER TABLE `previewimage__media` DISABLE KEYS */;
INSERT INTO `previewimage__media` VALUES (1,'preview-image-1803070306',NULL,1,'sonata.media.provider.image',1,'fc718036b83e9860b27dafe720a20b6be87351cc.jpeg','{\"filename\":\"5a9fd60a3d5b6.jpg\"}',1200,800,NULL,'image/jpeg',310711,NULL,NULL,'previewimage',1,NULL,NULL,3,'2018-03-07 13:07:40','2018-03-07 12:26:06',NULL,NULL),(2,'preview-image-1803070334',NULL,1,'sonata.media.provider.image',1,'ddd06a24055ef91980f92259c48b1e3e4bb0a333.png','{\"filename\":\"5a9fcc68993dc.png\"}',288,175,NULL,'image/png',4396,NULL,NULL,'previewimage',NULL,NULL,NULL,NULL,'2018-03-07 12:26:34','2018-03-07 12:26:34',NULL,NULL),(3,'preview-image-1803100346',NULL,1,'sonata.media.provider.image',1,'1f26bc225a2148ccd7242a225b7028434c19d650.jpeg','{\"filename\":\"5aa43c381e143.jpeg\"}',300,168,NULL,'image/jpeg',15574,NULL,NULL,'previewimage',NULL,NULL,NULL,NULL,'2018-03-10 21:12:46','2018-03-10 21:12:46',NULL,NULL),(4,'preview-image-1803100342',NULL,1,'sonata.media.provider.image',1,'092a6aa06f6dd2aa7524939287a2f1766dc9072c.png','{\"filename\":\"5aa43d0f76866.png\"}',384,384,NULL,'image/png',95699,NULL,NULL,'previewimage',1,NULL,NULL,3,'2018-03-10 21:16:17','2018-03-10 21:14:42',NULL,NULL),(5,'preview-image-1803130319',NULL,1,'sonata.media.provider.image',1,'90827b3dea61ae74e2dcff53390af49882a8709a.png','{\"filename\":\"5aa7b595d08a7.png\"}',500,445,NULL,'image/png',264522,NULL,NULL,'previewimage',NULL,NULL,NULL,NULL,'2018-03-13 12:27:19','2018-03-13 12:27:19',NULL,NULL),(6,'preview-image-1803130336',NULL,1,'sonata.media.provider.image',1,'3ffb08a05a07a8741d4c92ca80c4df8dee931b58.png','{\"filename\":\"5aa7b5a66b108.png\"}',500,445,NULL,'image/png',264522,NULL,NULL,'previewimage',NULL,NULL,NULL,NULL,'2018-03-13 12:27:36','2018-03-13 12:27:36',NULL,NULL);
/*!40000 ALTER TABLE `previewimage__media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `race`
--

DROP TABLE IF EXISTS `race`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `race` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `season_id` int(11) DEFAULT NULL,
  `circuit_id` int(11) DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nameEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `descriptionEN` longtext COLLATE utf8_unicode_ci,
  `seoTitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoTitleEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoKeywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoKeywordsEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `_order` int(11) DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  `updatedAt` date DEFAULT NULL,
  `modality_id` int(11) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DA6FBBAF4EC001D1` (`season_id`),
  KEY `IDX_DA6FBBAFCF2182C8` (`circuit_id`),
  KEY `IDX_DA6FBBAF2D6D889B` (`modality_id`),
  CONSTRAINT `FK_DA6FBBAF2D6D889B` FOREIGN KEY (`modality_id`) REFERENCES `modality` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_DA6FBBAF4EC001D1` FOREIGN KEY (`season_id`) REFERENCES `season` (`id`),
  CONSTRAINT `FK_DA6FBBAFCF2182C8` FOREIGN KEY (`circuit_id`) REFERENCES `circuit` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `race`
--

LOCK TABLES `race` WRITE;
/*!40000 ALTER TABLE `race` DISABLE KEYS */;
INSERT INTO `race` VALUES (1,1,2,'2018-02-02','2023-04-02','CARRERA DE MÑA A LAS 12 EN FUNTO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL);
/*!40000 ALTER TABLE `race` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rider`
--

DROP TABLE IF EXISTS `rider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `descriptionEN` longtext COLLATE utf8_unicode_ci,
  `_order` int(11) DEFAULT NULL,
  `modality_id` int(11) DEFAULT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nameEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoTitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoTitleEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoKeywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoKeywordsEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  `updatedAt` date DEFAULT NULL,
  `teamCategory_id` int(11) DEFAULT NULL,
  `riderTeam_id` int(11) DEFAULT NULL,
  `featuredMedia_id` int(11) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `birthPlace` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstRace` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstGrandPrix` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstVictory` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastVictory` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstPole` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstFastLap` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstPodium` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `victorys` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `poles` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fastLaps` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bestGeneralResult` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gpss` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `victoryList` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstRaceEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstGrandPrixEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstVictoryEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastVictoryEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstPoleEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstFastLapEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstPodiumEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `victorysEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `polesEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fastLapsEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bestGeneralResultEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gpssEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `victoryListEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `moto_id` int(11) DEFAULT NULL,
  `external` tinyint(1) DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo_id` int(11) DEFAULT NULL,
  `homeImage_id` int(11) DEFAULT NULL,
  `showInHome` tinyint(1) DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `podiums` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `podiumsEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `previewImage_id` int(11) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_EA4110352D6D889B` (`modality_id`),
  KEY `IDX_EA411035C9489088` (`teamCategory_id`),
  KEY `IDX_EA411035C30DB9F9` (`riderTeam_id`),
  KEY `IDX_EA411035C6604E13` (`featuredMedia_id`),
  KEY `IDX_EA41103578B8F2AC` (`moto_id`),
  KEY `IDX_EA411035F98F144A` (`logo_id`),
  KEY `IDX_EA4110355BB6D1E` (`homeImage_id`),
  KEY `IDX_EA4110352B41B23D` (`previewImage_id`),
  CONSTRAINT `FK_EA4110352B41B23D` FOREIGN KEY (`previewImage_id`) REFERENCES `previewimage__media` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_EA4110352D6D889B` FOREIGN KEY (`modality_id`) REFERENCES `modality` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_EA4110355BB6D1E` FOREIGN KEY (`homeImage_id`) REFERENCES `homeimage__media` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_EA41103578B8F2AC` FOREIGN KEY (`moto_id`) REFERENCES `moto` (`id`) ON DELETE SET NULL,
  CONSTRAINT `FK_EA411035C30DB9F9` FOREIGN KEY (`riderTeam_id`) REFERENCES `rider_team` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_EA411035C6604E13` FOREIGN KEY (`featuredMedia_id`) REFERENCES `featured_media__media` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_EA411035C9489088` FOREIGN KEY (`teamCategory_id`) REFERENCES `team_category` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_EA411035F98F144A` FOREIGN KEY (`logo_id`) REFERENCES `logo__media` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rider`
--

LOCK TABLES `rider` WRITE;
/*!40000 ALTER TABLE `rider` DISABLE KEYS */;
INSERT INTO `rider` VALUES (1,'Team',NULL,NULL,2,1,'Rider 1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,'',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'team-rider-1'),(2,'Álvaro','<p><strong>Lorem ipsum</strong>&nbsp;es el texto que se usa habitualmente en&nbsp;<a href=\"https://es.wikipedia.org/wiki/Dise%C3%B1o_gr%C3%A1fico\" title=\"Diseño gráfico\">dise&ntilde;o gr&aacute;fico</a>&nbsp;en demostraciones de&nbsp;<a href=\"https://es.wikipedia.org/wiki/Tipograf%C3%ADa\" title=\"Tipografía\">tipograf&iacute;as</a>&nbsp;o de&nbsp;<a href=\"https://es.wikipedia.org/wiki/Borrador_(boceto)\" title=\"Borrador (boceto)\">borradores</a>&nbsp;de dise&ntilde;o para probar el dise&ntilde;o visual antes de insertar el texto final.</p>\r\n\r\n<p>Aunque no posee actualmente fuentes para justificar sus hip&oacute;tesis, el profesor de filolog&iacute;a cl&aacute;sica Richard McClintock asegura que su uso se remonta a los impresores de comienzos del siglo XVI.<sup><a href=\"https://es.wikipedia.org/wiki/Lorem_ipsum#cite_note-1\">1</a></sup>​ Su uso en algunos&nbsp;<a href=\"https://es.wikipedia.org/wiki/Editor_de_texto\" title=\"Editor de texto\">editores de texto</a>&nbsp;muy conocidos en la actualidad ha dado al texto&nbsp;<em>lorem ipsum</em>&nbsp;nueva popularidad.</p>\r\n\r\n<p>El texto en s&iacute; no tiene sentido, aunque no es completamente aleatorio, sino que deriva de un texto de&nbsp;<a href=\"https://es.wikipedia.org/wiki/Cicer%C3%B3n\" title=\"Cicerón\">Cicer&oacute;n</a>&nbsp;en lengua&nbsp;<a href=\"https://es.wikipedia.org/wiki/Lat%C3%ADn\" title=\"Latín\">latina</a>, a cuyas palabras se les han eliminado s&iacute;labas o letras. El significado del texto no tiene importancia, ya que solo es una demostraci&oacute;n o prueba, pero se inspira en la obra de&nbsp;<a href=\"https://es.wikipedia.org/wiki/Cicer%C3%B3n\" title=\"Cicerón\">Cicer&oacute;n</a>&nbsp;<em><a href=\"https://es.wikipedia.org/wiki/De_finibus\" title=\"De finibus\">De finibus bonorum et malorum</a></em>&nbsp;(<em>Sobre los l&iacute;mites del bien y del mal</em>) que comienza con</p>','<p>In a place of the mancha</p>',1,1,'Bautista',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,28,'1984-11-21',NULL,'Primera carrera','Primer gran premio','Primera victoria','Última victoria','Primera Pole','Primera vuelta rápida','Primer Podio','Victorias','Podios','Vueltas rápidas','Mejor resultado general','Mejor resultado general',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,'AF',4,1,1,'http://facebook.com/tal','http://twitter.com/tal','http://instagram.com/tal',19,NULL,NULL,1,'alvaro-bautista19'),(3,'Team',NULL,NULL,NULL,1,'Rider 2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'team-rider-2'),(4,'Karel',NULL,NULL,2,1,'Abraham',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,29,'2018-02-01',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,'AF',5,2,1,NULL,NULL,NULL,17,NULL,NULL,2,'karel-abraham17'),(8,'Team',NULL,NULL,NULL,1,'Rider 3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'team-rider-3'),(9,'Team',NULL,NULL,NULL,1,'Rider 4',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'team-rider-4'),(10,'Team',NULL,NULL,NULL,1,'Rider 5',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'team-rider-5'),(11,'Team',NULL,NULL,NULL,1,'Rider 6',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'team-rider-6'),(12,'Team',NULL,NULL,NULL,1,'Rider 8',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'team-rider-8'),(13,'Team',NULL,NULL,NULL,1,'Rider 7',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'team-rider-7'),(14,'Team',NULL,NULL,NULL,1,'Rider 9',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'team-rider-9'),(15,'Team',NULL,NULL,NULL,1,'Rider 10',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'team-rider-10'),(16,'Team',NULL,NULL,NULL,2,'Rider 13',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,37,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'team-rider-13'),(17,'team',NULL,NULL,NULL,2,'rider 20',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'team-rider-20'),(18,'Don',NULL,NULL,1,2,'Alguien',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,39,'2018-03-29',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,'AF',13,5,1,NULL,NULL,NULL,90,NULL,NULL,5,'don-alguien90'),(19,'Bob',NULL,NULL,2,2,'Esponja',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,38,'2018-03-22',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,'AF',14,6,1,NULL,NULL,NULL,2,NULL,NULL,6,'bob-esponja2');
/*!40000 ALTER TABLE `rider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rider_media__media`
--

DROP TABLE IF EXISTS `rider_media__media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rider_media__media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `enabled` tinyint(1) NOT NULL,
  `provider_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_status` int(11) NOT NULL,
  `provider_reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_metadata` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `length` decimal(10,0) DEFAULT NULL,
  `content_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content_size` int(11) DEFAULT NULL,
  `copyright` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `context` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cdn_is_flushable` tinyint(1) DEFAULT NULL,
  `cdn_flush_identifier` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cdn_flush_at` datetime DEFAULT NULL,
  `cdn_status` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `_order` int(11) DEFAULT NULL,
  `description_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_277E5DB07E3C61F9` (`owner_id`),
  CONSTRAINT `FK_277E5DB07E3C61F9` FOREIGN KEY (`owner_id`) REFERENCES `rider` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rider_media__media`
--

LOCK TABLES `rider_media__media` WRITE;
/*!40000 ALTER TABLE `rider_media__media` DISABLE KEYS */;
INSERT INTO `rider_media__media` VALUES (3,2,'rider-image-1803090359',NULL,1,'sonata.media.provider.image',1,'d4a495ba8d173cf9af5ec310d5a1589ae2aaca0b.png','{\"filename\":\"5aa271174c7b1.png\"}',2560,1409,NULL,'image/png',1327754,NULL,NULL,'rider',NULL,NULL,NULL,NULL,'2018-03-09 12:33:59','2018-03-09 12:33:59',NULL,NULL,NULL,NULL,NULL),(4,2,'rider-image-1803090359',NULL,1,'sonata.media.provider.image',1,'a82bda317fd578be17663757040f2ab163d65567.png','{\"filename\":\"5aa2711bbc1a4.png\"}',950,388,NULL,'image/png',488107,NULL,NULL,'rider',NULL,NULL,NULL,NULL,'2018-03-09 12:33:59','2018-03-09 12:33:59',NULL,NULL,NULL,NULL,NULL),(5,2,'rider-image-1803090359',NULL,1,'sonata.media.provider.image',1,'d88d9ce270a667261bb8f9584e40c451d7cd0229.png','{\"filename\":\"5aa27124ee422.png\"}',288,175,NULL,'image/png',4396,NULL,NULL,'rider',NULL,NULL,NULL,NULL,'2018-03-09 12:33:59','2018-03-09 12:33:59',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `rider_media__media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rider_team`
--

DROP TABLE IF EXISTS `rider_team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rider_team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `descriptionEN` longtext COLLATE utf8_unicode_ci,
  `_order` int(11) DEFAULT NULL,
  `nameEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoTitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoTitleEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoKeywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoKeywordsEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  `updatedAt` date DEFAULT NULL,
  `main` tinyint(1) DEFAULT NULL,
  `history` longtext COLLATE utf8_unicode_ci,
  `historyEN` longtext COLLATE utf8_unicode_ci,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rider_team`
--

LOCK TABLES `rider_team` WRITE;
/*!40000 ALTER TABLE `rider_team` DISABLE KEYS */;
INSERT INTO `rider_team` VALUES (1,'Equipo 1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'Ángel Nieto Team','<p><strong>&Aacute;ngel Nieto Rold&aacute;n</strong>&nbsp;(<a href=\"https://es.wikipedia.org/wiki/Zamora\" title=\"Zamora\">Zamora</a>,&nbsp;<a href=\"https://es.wikipedia.org/wiki/25_de_enero\" title=\"25 de enero\">25 de enero</a>&nbsp;de&nbsp;<a href=\"https://es.wikipedia.org/wiki/1947\" title=\"1947\">1947</a>-<a href=\"https://es.wikipedia.org/wiki/Ibiza\" title=\"Ibiza\">Ibiza</a>,&nbsp;<a href=\"https://es.wikipedia.org/wiki/3_de_agosto\" title=\"3 de agosto\">3 de agosto</a>&nbsp;de&nbsp;<a href=\"https://es.wikipedia.org/wiki/2017\" title=\"2017\">2017</a>)<sup><a href=\"https://es.wikipedia.org/wiki/%C3%81ngel_Nieto#cite_note-:0-1\">1</a></sup>​ fue un piloto de&nbsp;<a href=\"https://es.wikipedia.org/wiki/Motociclismo\" title=\"Motociclismo\">motociclismo</a><a href=\"https://es.wikipedia.org/wiki/Espa%C3%B1a\" title=\"España\">espa&ntilde;ol</a>, campe&oacute;n del mundo en 13 ocasiones, aunque por&nbsp;<a href=\"https://es.wikipedia.org/wiki/Triscaidecafobia\" title=\"Triscaidecafobia\">triscaidecafobia</a>&nbsp;prefer&iacute;a decir que fueron 12+1. Tiene el mejor palmar&eacute;s entre los motociclistas espa&ntilde;oles y el segundo a nivel mundial tras&nbsp;<a href=\"https://es.wikipedia.org/wiki/Giacomo_Agostini\" title=\"Giacomo Agostini\">Giacomo Agostini</a>. Consigui&oacute; 6 t&iacute;tulos mundiales en la categor&iacute;a de 50cc (1969, 1970, 1972. 1975, 1976 y 1977) y 7 en la de 125cc (1971, 1972, 1979, 1981, 1982, 1983 y 1984), conquistas que logr&oacute; con cinco marcas distintas (<a href=\"https://es.wikipedia.org/wiki/Derbi_(motocicleta)\" title=\"Derbi (motocicleta)\">Derbi</a>,&nbsp;<a href=\"https://es.wikipedia.org/wiki/Kreidler\" title=\"Kreidler\">Kreidler</a>,&nbsp;<a href=\"https://es.wikipedia.org/wiki/Bultaco\" title=\"Bultaco\">Bultaco</a>, Minarelli y&nbsp;<a href=\"https://es.wikipedia.org/wiki/Garelli\" title=\"Garelli\">Garelli</a>). Adem&aacute;s logr&oacute; 4 subcampeonatos del mundo, 23 campeonatos de Espa&ntilde;a y 5 subcampeonatos de Espa&ntilde;a. Tambi&eacute;n forman parte de su palmar&eacute;s las 90 victorias en grandes premios de motociclismo y 139 podios, y 128 victorias en campeonatos de Espa&ntilde;a.<sup><a href=\"https://es.wikipedia.org/wiki/%C3%81ngel_Nieto#cite_note-2\">2</a></sup>​</p>\r\n\r\n<p>Nieto abri&oacute; la puerta a la gran generaci&oacute;n pilotos que lleg&oacute; detr&aacute;s, tanto dentro como fuera de su familia. Era padre de los tambi&eacute;n expilotos de motociclismo&nbsp;<a href=\"https://es.wikipedia.org/wiki/%C3%81ngel_Nieto_Jr.\" title=\"Ángel Nieto Jr.\">&Aacute;ngel Nieto Jr.</a>&nbsp;(1976),&nbsp;<a href=\"https://es.wikipedia.org/wiki/Pablo_Nieto\" title=\"Pablo Nieto\">Pablo Nieto</a>&nbsp;(1980) y t&iacute;o del piloto&nbsp;<a href=\"https://es.wikipedia.org/wiki/Fonsi_Nieto\" title=\"Fonsi Nieto\">Fonsi Nieto</a>(1978). Pilotos como los&nbsp;<a href=\"https://es.wikipedia.org/wiki/Sito_Pons\" title=\"Sito Pons\">Pons</a>,&nbsp;<a href=\"https://es.wikipedia.org/wiki/Jorge_Mart%C3%ADnez_%C2%ABAspar%C2%BB\" title=\"Jorge Martínez «Aspar»\">Aspar</a>,&nbsp;<a href=\"https://es.wikipedia.org/wiki/Champi_Herreros\" title=\"Champi Herreros\">Herreros</a>,&nbsp;<a href=\"https://es.wikipedia.org/wiki/%C3%80lex_Crivill%C3%A9\" title=\"Àlex Crivillé\">Crivill&eacute;</a>,&nbsp;<a href=\"https://es.wikipedia.org/wiki/Jorge_Lorenzo\" title=\"Jorge Lorenzo\">Lorenzo</a>,&nbsp;<a href=\"https://es.wikipedia.org/wiki/Marc_M%C3%A1rquez\" title=\"Marc Márquez\">M&aacute;rquez</a>&nbsp;y compa&ntilde;&iacute;a siguieron la senda del &lsquo;Maestro&rsquo; para convertir a Espa&ntilde;a en una de las dos grandes potencias del motociclismo mundial junto a Italia.</p>',NULL,NULL,'Ángel Nieto Team',NULL,NULL,NULL,NULL,NULL,NULL,1,'<p><strong>&Aacute;ngel Nieto Rold&aacute;n</strong>&nbsp;(<a href=\"https://es.wikipedia.org/wiki/Zamora\" title=\"Zamora\">Zamora</a>,&nbsp;<a href=\"https://es.wikipedia.org/wiki/25_de_enero\" title=\"25 de enero\">25 de enero</a>&nbsp;de&nbsp;<a href=\"https://es.wikipedia.org/wiki/1947\" title=\"1947\">1947</a>-<a href=\"https://es.wikipedia.org/wiki/Ibiza\" title=\"Ibiza\">Ibiza</a>,&nbsp;<a href=\"https://es.wikipedia.org/wiki/3_de_agosto\" title=\"3 de agosto\">3 de agosto</a>&nbsp;de&nbsp;<a href=\"https://es.wikipedia.org/wiki/2017\" title=\"2017\">2017</a>)<sup><a href=\"https://es.wikipedia.org/wiki/%C3%81ngel_Nieto#cite_note-:0-1\">1</a></sup>​ fue un piloto de&nbsp;<a href=\"https://es.wikipedia.org/wiki/Motociclismo\" title=\"Motociclismo\">motociclismo</a><a href=\"https://es.wikipedia.org/wiki/Espa%C3%B1a\" title=\"España\">espa&ntilde;ol</a>, campe&oacute;n del mundo en 13 ocasiones, aunque por&nbsp;<a href=\"https://es.wikipedia.org/wiki/Triscaidecafobia\" title=\"Triscaidecafobia\">triscaidecafobia</a>&nbsp;prefer&iacute;a decir que fueron 12+1. Tiene el mejor palmar&eacute;s entre los motociclistas espa&ntilde;oles y el segundo a nivel mundial tras&nbsp;<a href=\"https://es.wikipedia.org/wiki/Giacomo_Agostini\" title=\"Giacomo Agostini\">Giacomo Agostini</a>. Consigui&oacute; 6 t&iacute;tulos mundiales en la categor&iacute;a de 50cc (1969, 1970, 1972. 1975, 1976 y 1977) y 7 en la de 125cc (1971, 1972, 1979, 1981, 1982, 1983 y 1984), conquistas que logr&oacute; con cinco marcas distintas (<a href=\"https://es.wikipedia.org/wiki/Derbi_(motocicleta)\" title=\"Derbi (motocicleta)\">Derbi</a>,&nbsp;<a href=\"https://es.wikipedia.org/wiki/Kreidler\" title=\"Kreidler\">Kreidler</a>,&nbsp;<a href=\"https://es.wikipedia.org/wiki/Bultaco\" title=\"Bultaco\">Bultaco</a>, Minarelli y&nbsp;<a href=\"https://es.wikipedia.org/wiki/Garelli\" title=\"Garelli\">Garelli</a>). Adem&aacute;s logr&oacute; 4 subcampeonatos del mundo, 23 campeonatos de Espa&ntilde;a y 5 subcampeonatos de Espa&ntilde;a. Tambi&eacute;n forman parte de su palmar&eacute;s las 90 victorias en grandes premios de motociclismo y 139 podios, y 128 victorias en campeonatos de Espa&ntilde;a.<sup><a href=\"https://es.wikipedia.org/wiki/%C3%81ngel_Nieto#cite_note-2\">2</a></sup>​</p>\r\n\r\n<p>Nieto abri&oacute; la puerta a la gran generaci&oacute;n pilotos que lleg&oacute; detr&aacute;s, tanto dentro como fuera de su familia. Era padre de los tambi&eacute;n expilotos de motociclismo&nbsp;<a href=\"https://es.wikipedia.org/wiki/%C3%81ngel_Nieto_Jr.\" title=\"Ángel Nieto Jr.\">&Aacute;ngel Nieto Jr.</a>&nbsp;(1976),&nbsp;<a href=\"https://es.wikipedia.org/wiki/Pablo_Nieto\" title=\"Pablo Nieto\">Pablo Nieto</a>&nbsp;(1980) y t&iacute;o del piloto&nbsp;<a href=\"https://es.wikipedia.org/wiki/Fonsi_Nieto\" title=\"Fonsi Nieto\">Fonsi Nieto</a>(1978). Pilotos como los&nbsp;<a href=\"https://es.wikipedia.org/wiki/Sito_Pons\" title=\"Sito Pons\">Pons</a>,&nbsp;<a href=\"https://es.wikipedia.org/wiki/Jorge_Mart%C3%ADnez_%C2%ABAspar%C2%BB\" title=\"Jorge Martínez «Aspar»\">Aspar</a>,&nbsp;<a href=\"https://es.wikipedia.org/wiki/Champi_Herreros\" title=\"Champi Herreros\">Herreros</a>,&nbsp;<a href=\"https://es.wikipedia.org/wiki/%C3%80lex_Crivill%C3%A9\" title=\"Àlex Crivillé\">Crivill&eacute;</a>,&nbsp;<a href=\"https://es.wikipedia.org/wiki/Jorge_Lorenzo\" title=\"Jorge Lorenzo\">Lorenzo</a>,&nbsp;<a href=\"https://es.wikipedia.org/wiki/Marc_M%C3%A1rquez\" title=\"Marc Márquez\">M&aacute;rquez</a>&nbsp;y compa&ntilde;&iacute;a siguieron la senda del &lsquo;Maestro&rsquo; para convertir a Espa&ntilde;a en una de las dos grandes potencias del motociclismo mundial junto a Italia.</p>',NULL,'http://facebook.com','http://twitter.com','http://instagram.com','http://youtube.com',NULL);
/*!40000 ALTER TABLE `rider_team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `score`
--

DROP TABLE IF EXISTS `score`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `race_id` int(11) DEFAULT NULL,
  `rider_id` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nameEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `descriptionEN` longtext COLLATE utf8_unicode_ci,
  `seoTitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoTitleEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoKeywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoKeywordsEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `_order` int(11) DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  `updatedAt` date DEFAULT NULL,
  `timeMinutes` int(11) DEFAULT NULL,
  `timeSeconds` int(11) DEFAULT NULL,
  `timeMilliseconds` int(11) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_329937516E59D40D` (`race_id`),
  KEY `IDX_32993751FF881F6` (`rider_id`),
  CONSTRAINT `FK_329937516E59D40D` FOREIGN KEY (`race_id`) REFERENCES `race` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_32993751FF881F6` FOREIGN KEY (`rider_id`) REFERENCES `rider` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `score`
--

LOCK TABLES `score` WRITE;
/*!40000 ALTER TABLE `score` DISABLE KEYS */;
INSERT INTO `score` VALUES (1,1,1,11,'180217-Feb07',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,59,333,NULL),(5,NULL,2,12,'180217-Feb28',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,NULL,3,11,'180217-Feb28',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,NULL,2,123,'180217-Feb05',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,1,3,10,'180217-Feb16',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,2,2,NULL),(9,1,2,3,'180225-Feb32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,0,NULL),(20,1,4,2,'180312-Mar17',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,1,NULL),(21,1,8,9,'180312-Mar38',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(22,1,9,8,'180312-Mar38',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(23,1,10,7,'180312-Mar38',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(24,1,11,6,'180312-Mar38',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(25,1,13,6,'180312-Mar38',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,1,12,5,'180312-Mar38',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(27,1,14,5,'180312-Mar38',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(28,1,15,5,'180312-Mar38',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(29,1,18,4,'180312-Mar38',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(35,1,17,5,'180316-Mar21',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `score` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `season`
--

DROP TABLE IF EXISTS `season`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `season` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nameEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `descriptionEN` longtext COLLATE utf8_unicode_ci,
  `seoTitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoTitleEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoKeywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoKeywordsEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `_order` int(11) DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  `updatedAt` date DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `current` tinyint(1) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `season`
--

LOCK TABLES `season` WRITE;
/*!40000 ALTER TABLE `season` DISABLE KEYS */;
INSERT INTO `season` VALUES (1,'2018',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-04-02','2018-12-23',1,NULL),(2,'a',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-03-30','2018-03-30',0,NULL);
/*!40000 ALTER TABLE `season` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `season_circuit`
--

DROP TABLE IF EXISTS `season_circuit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `season_circuit` (
  `season_id` int(11) NOT NULL,
  `circuit_id` int(11) NOT NULL,
  PRIMARY KEY (`season_id`,`circuit_id`),
  KEY `IDX_365C5AF84EC001D1` (`season_id`),
  KEY `IDX_365C5AF8CF2182C8` (`circuit_id`),
  CONSTRAINT `FK_365C5AF84EC001D1` FOREIGN KEY (`season_id`) REFERENCES `season` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_365C5AF8CF2182C8` FOREIGN KEY (`circuit_id`) REFERENCES `circuit` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `season_circuit`
--

LOCK TABLES `season_circuit` WRITE;
/*!40000 ALTER TABLE `season_circuit` DISABLE KEYS */;
INSERT INTO `season_circuit` VALUES (1,1),(1,2);
/*!40000 ALTER TABLE `season_circuit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sponsor`
--

DROP TABLE IF EXISTS `sponsor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sponsor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `descriptionEN` longtext COLLATE utf8_unicode_ci,
  `_order` int(11) DEFAULT NULL,
  `nameEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoTitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoTitleEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoKeywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoKeywordsEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  `updatedAt` date DEFAULT NULL,
  `webUrl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `featuredMedia_id` int(11) DEFAULT NULL,
  `bn` tinyint(1) DEFAULT NULL,
  `logo_id` int(11) DEFAULT NULL,
  `webUrlEN` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_818CC9D4C6604E13` (`featuredMedia_id`),
  KEY `IDX_818CC9D4F98F144A` (`logo_id`),
  CONSTRAINT `FK_818CC9D4C6604E13` FOREIGN KEY (`featuredMedia_id`) REFERENCES `featured_media__media` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_818CC9D4F98F144A` FOREIGN KEY (`logo_id`) REFERENCES `logo__media` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sponsor`
--

LOCK TABLES `sponsor` WRITE;
/*!40000 ALTER TABLE `sponsor` DISABLE KEYS */;
INSERT INTO `sponsor` VALUES (1,'MOTARDo','<p>Las&nbsp;<strong>bebidas energ&eacute;ticas</strong>&nbsp;o&nbsp;<strong>hipert&oacute;nicas</strong>&nbsp;son bebidas sin alcohol que contienen sustancias&nbsp;<a href=\"https://es.wikipedia.org/wiki/Bebida_estimulante\" title=\"Bebida estimulante\">estimulantes</a>&nbsp;y que ofrecen al&nbsp;<a href=\"https://es.wikipedia.org/wiki/Consumidor\" title=\"Consumidor\">consumidor</a>&nbsp;el evitar o disminuir la&nbsp;<a href=\"https://es.wikipedia.org/wiki/Cansancio\" title=\"Cansancio\">fatiga y el agotamiento</a>, adem&aacute;s de aumentar la habilidad mental y proporcionar un incremento de la resistencia f&iacute;sica. Est&aacute;n compuestas principalmente por&nbsp;<a href=\"https://es.wikipedia.org/wiki/Cafe%C3%ADna\" title=\"Cafeína\">cafe&iacute;na</a>, varias&nbsp;<a href=\"https://es.wikipedia.org/wiki/Vitamina\" title=\"Vitamina\">vitaminas</a>, carbohidratos y otras sustancias naturales org&aacute;nicas como la&nbsp;<a href=\"https://es.wikipedia.org/wiki/Taurina\" title=\"Taurina\">taurina</a>, que eliminan la sensaci&oacute;n de agotamiento de la persona que las consume. No se deben confundir con las&nbsp;<a href=\"https://es.wikipedia.org/wiki/Bebida_isot%C3%B3nica\" title=\"Bebida isotónica\">bebidas isot&oacute;nicas</a>&nbsp;ni con otro tipo de bebidas como las gaseosas, ya que inclusive en los mismos envases se advierte que no se consideran bebidas hidratantes. Por contener altas dosis de cafe&iacute;na pueden producir dependencia y otros efectos adversos.</p>\r\n\r\n<p>Parte de la sensaci&oacute;n de bienestar producida por las bebidas energ&eacute;ticas es causada por un efecto energ&eacute;tico que se produce por la acci&oacute;n de sustancias psicoactivas (siendo la cafe&iacute;na, un&nbsp;<a href=\"https://es.wikipedia.org/wiki/Alcaloide\" title=\"Alcaloide\">alcaloide</a>, uno de los ingredientes en estas bebidas) que act&uacute;an sobre el&nbsp;<a href=\"https://es.wikipedia.org/wiki/Sistema_nervioso_central\" title=\"Sistema nervioso central\">sistema nervioso central</a>, inhibiendo los neurotransmisores encargados de transmitir las sensaciones de cansancio o sue&ntilde;o y potenciando aquellos relacionados con las sensaciones de bienestar y la concentraci&oacute;n. La cafe&iacute;na, por ejemplo, logra aumentar los niveles extracelulares de los neurotransmisores&nbsp;<a href=\"https://es.wikipedia.org/wiki/Noradrenalina\" title=\"Noradrenalina\">noradrenalina</a>&nbsp;y&nbsp;<a href=\"https://es.wikipedia.org/wiki/Dopamina\" title=\"Dopamina\">dopamina</a>&nbsp;en la corteza prefrontal del cerebro, lo que explica buena parte de sus efectos favorables sobre la concentraci&oacute;n.</p>\r\n\r\n<p>Si bien estas bebidas incluyen en su composici&oacute;n&nbsp;<a href=\"https://es.wikipedia.org/wiki/Glucosa\" title=\"Glucosa\">glucosa</a>&nbsp;y otros az&uacute;cares que proporcionan energ&iacute;a al cuerpo (excepto las versiones diet&eacute;ticas), no eliminan realmente la fatiga muscular ni el agotamiento en general, solamente inhibe temporalmente estas sensaciones, por lo tanto es normal una sensaci&oacute;n de decaimiento una vez que acaba su efecto en el organismo. Al margen de los efectos que producen la cafe&iacute;na y el az&uacute;car que contienen, los estudios al respecto concluyen que hay pocas o ninguna evidencia de que la amplia variedad de ingredientes adicionales tenga efecto alguno.</p>','<p>Las&nbsp;<strong>bebidas energ&eacute;ticas</strong>&nbsp;o&nbsp;<strong>hipert&oacute;nicas</strong>&nbsp;son bebidas sin alcohol que contienen sustancias&nbsp;<a href=\"https://es.wikipedia.org/wiki/Bebida_estimulante\" title=\"Bebida estimulante\">estimulantes</a>&nbsp;y que ofrecen al&nbsp;<a href=\"https://es.wikipedia.org/wiki/Consumidor\" title=\"Consumidor\">consumidor</a>&nbsp;el evitar o disminuir la&nbsp;<a href=\"https://es.wikipedia.org/wiki/Cansancio\" title=\"Cansancio\">fatiga y el agotamiento</a>, adem&aacute;s de aumentar la habilidad mental y proporcionar un incremento de la resistencia f&iacute;sica. Est&aacute;n compuestas principalmente por&nbsp;<a href=\"https://es.wikipedia.org/wiki/Cafe%C3%ADna\" title=\"Cafeína\">cafe&iacute;na</a>, varias&nbsp;<a href=\"https://es.wikipedia.org/wiki/Vitamina\" title=\"Vitamina\">vitaminas</a>, carbohidratos y otras sustancias naturales org&aacute;nicas como la&nbsp;<a href=\"https://es.wikipedia.org/wiki/Taurina\" title=\"Taurina\">taurina</a>, que eliminan la sensaci&oacute;n de agotamiento de la persona que las consume. No se deben confundir con las&nbsp;<a href=\"https://es.wikipedia.org/wiki/Bebida_isot%C3%B3nica\" title=\"Bebida isotónica\">bebidas isot&oacute;nicas</a>&nbsp;ni con otro tipo de bebidas como las gaseosas, ya que inclusive en los mismos envases se advierte que no se consideran bebidas hidratantes. Por contener altas dosis de cafe&iacute;na pueden producir dependencia y otros efectos adversos.</p>\r\n\r\n<p>Parte de la sensaci&oacute;n de bienestar producida por las bebidas energ&eacute;ticas es causada por un efecto energ&eacute;tico que se produce por la acci&oacute;n de sustancias psicoactivas (siendo la cafe&iacute;na, un&nbsp;<a href=\"https://es.wikipedia.org/wiki/Alcaloide\" title=\"Alcaloide\">alcaloide</a>, uno de los ingredientes en estas bebidas) que act&uacute;an sobre el&nbsp;<a href=\"https://es.wikipedia.org/wiki/Sistema_nervioso_central\" title=\"Sistema nervioso central\">sistema nervioso central</a>, inhibiendo los neurotransmisores encargados de transmitir las sensaciones de cansancio o sue&ntilde;o y potenciando aquellos relacionados con las sensaciones de bienestar y la concentraci&oacute;n. La cafe&iacute;na, por ejemplo, logra aumentar los niveles extracelulares de los neurotransmisores&nbsp;<a href=\"https://es.wikipedia.org/wiki/Noradrenalina\" title=\"Noradrenalina\">noradrenalina</a>&nbsp;y&nbsp;<a href=\"https://es.wikipedia.org/wiki/Dopamina\" title=\"Dopamina\">dopamina</a>&nbsp;en la corteza prefrontal del cerebro, lo que explica buena parte de sus efectos favorables sobre la concentraci&oacute;n.</p>\r\n\r\n<p>Si bien estas bebidas incluyen en su composici&oacute;n&nbsp;<a href=\"https://es.wikipedia.org/wiki/Glucosa\" title=\"Glucosa\">glucosa</a>&nbsp;y otros az&uacute;cares que proporcionan energ&iacute;a al cuerpo (excepto las versiones diet&eacute;ticas), no eliminan realmente la fatiga muscular ni el agotamiento en general, solamente inhibe temporalmente estas sensaciones, por lo tanto es normal una sensaci&oacute;n de decaimiento una vez que acaba su efecto en el organismo. Al margen de los efectos que producen la cafe&iacute;na y el az&uacute;car que contienen, los estudios al respecto concluyen que hay pocas o ninguna evidencia de que la amplia variedad de ingredientes adicionales tenga efecto alguno.</p>',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'https://www.motard.es/',24,1,7,'meh','motardo'),(2,'MRW',NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'http://sponsor.com',25,1,8,'dasdas','mrw'),(3,'MICHELIN',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'http://michelin.es',26,0,9,'gfdgdfg','michelin'),(4,'POh','<p>a</p>','<p>a</p>',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'sadsad',NULL,1,10,'sadsad','poh');
/*!40000 ALTER TABLE `sponsor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sponsor_modality`
--

DROP TABLE IF EXISTS `sponsor_modality`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sponsor_modality` (
  `sponsor_id` int(11) NOT NULL,
  `modality_id` int(11) NOT NULL,
  PRIMARY KEY (`sponsor_id`,`modality_id`),
  KEY `IDX_A8E1C67212F7FB51` (`sponsor_id`),
  KEY `IDX_A8E1C6722D6D889B` (`modality_id`),
  CONSTRAINT `FK_A8E1C67212F7FB51` FOREIGN KEY (`sponsor_id`) REFERENCES `sponsor` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_A8E1C6722D6D889B` FOREIGN KEY (`modality_id`) REFERENCES `modality` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sponsor_modality`
--

LOCK TABLES `sponsor_modality` WRITE;
/*!40000 ALTER TABLE `sponsor_modality` DISABLE KEYS */;
INSERT INTO `sponsor_modality` VALUES (1,1),(2,2),(3,2),(4,2),(4,8);
/*!40000 ALTER TABLE `sponsor_modality` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `descriptionEN` longtext COLLATE utf8_unicode_ci,
  `_order` int(11) DEFAULT NULL,
  `teamCategory_id` int(11) DEFAULT NULL,
  `nameEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoTitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoTitleEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoKeywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoKeywordsEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  `updatedAt` date DEFAULT NULL,
  `riderTeam_id` int(11) DEFAULT NULL,
  `featuredMedia_id` int(11) DEFAULT NULL,
  `rider_id` int(11) DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C4E0A61FC9489088` (`teamCategory_id`),
  KEY `IDX_C4E0A61FC30DB9F9` (`riderTeam_id`),
  KEY `IDX_C4E0A61FFF881F6` (`rider_id`),
  KEY `IDX_C4E0A61FC6604E13` (`featuredMedia_id`),
  CONSTRAINT `FK_C4E0A61FC30DB9F9` FOREIGN KEY (`riderTeam_id`) REFERENCES `rider_team` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_C4E0A61FC6604E13` FOREIGN KEY (`featuredMedia_id`) REFERENCES `featured_media__media` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_C4E0A61FC9489088` FOREIGN KEY (`teamCategory_id`) REFERENCES `team_category` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_C4E0A61FFF881F6` FOREIGN KEY (`rider_id`) REFERENCES `rider` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team`
--

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` VALUES (3,'Nombre','<p>a</p>','<p>a</p>',2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,31,NULL,'KH',NULL),(4,'Pppp','<p>aaa</p>','<p>bbbbb</p>',46,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,32,NULL,'AE',NULL),(5,'Level4','<p>s</p>','<p>s</p>',NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,33,NULL,'BE',NULL),(6,'sdfdsfsf',NULL,NULL,3,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,34,NULL,'AF',NULL),(7,'Level uan',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,35,NULL,'AO',NULL);
/*!40000 ALTER TABLE `team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_category`
--

DROP TABLE IF EXISTS `team_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `descriptionEN` longtext COLLATE utf8_unicode_ci,
  `_order` int(11) DEFAULT NULL,
  `nameEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoTitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoTitleEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoKeywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoKeywordsEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  `updatedAt` date DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_category`
--

LOCK TABLES `team_category` WRITE;
/*!40000 ALTER TABLE `team_category` DISABLE KEYS */;
INSERT INTO `team_category` VALUES (1,'Level 1','Lorem ipsum',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'Level 2',NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'Level 3',NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'Level 4',NULL,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'Level 5',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `team_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_modality`
--

DROP TABLE IF EXISTS `team_modality`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team_modality` (
  `team_id` int(11) NOT NULL,
  `modality_id` int(11) NOT NULL,
  PRIMARY KEY (`team_id`,`modality_id`),
  KEY `IDX_883B54BE296CD8AE` (`team_id`),
  KEY `IDX_883B54BE2D6D889B` (`modality_id`),
  CONSTRAINT `FK_883B54BE296CD8AE` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_883B54BE2D6D889B` FOREIGN KEY (`modality_id`) REFERENCES `modality` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_modality`
--

LOCK TABLES `team_modality` WRITE;
/*!40000 ALTER TABLE `team_modality` DISABLE KEYS */;
INSERT INTO `team_modality` VALUES (3,2),(4,1),(4,2),(7,1);
/*!40000 ALTER TABLE `team_modality` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `track_record`
--

DROP TABLE IF EXISTS `track_record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `track_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rider_id` int(11) DEFAULT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descriptionEN` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D3F65E78FF881F6` (`rider_id`),
  CONSTRAINT `FK_D3F65E78FF881F6` FOREIGN KEY (`rider_id`) REFERENCES `rider` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `track_record`
--

LOCK TABLES `track_record` WRITE;
/*!40000 ALTER TABLE `track_record` DISABLE KEYS */;
INSERT INTO `track_record` VALUES (1,NULL,'1992','First cosa','First thing'),(2,NULL,'1','a','a'),(3,2,'1992','Lorem ipsum lorem ipsum','Lorem ipsum lorem ipsum'),(4,2,'1994','Lorem ipsum lorem ipsum','Lorem ipsum lorem ipsum'),(5,2,'1997','Lorem ipsum lorem ipsum','Lorem ipsum lorem ipsum'),(6,2,'1999','Lorem ipsum lorem ipsum','Lorem ipsum lorem ipsum'),(7,2,'2000','Lorem ipsum lorem ipsum','Lorem ipsum lorem ipsum'),(8,2,'2001','Lorem ipsum lorem ipsum','Lorem ipsum lorem ipsum'),(9,2,'2002','Lorem ipsum lorem ipsum','Lorem ipsum lorem ipsum'),(10,2,'2003','Lorem ipsum lorem ipsum','Lorem ipsum lorem ipsum'),(11,2,'2004','Lorem ipsum lorem ipsum','Lorem ipsum lorem ipsum'),(12,2,'2012','Lorem ipsum lorem ipsum','Lorem ipsum lorem ipsum'),(13,2,'2016','Lorem ipsum lorem ipsum','Lorem ipsum lorem ipsum'),(14,2,'2018','Lorem ipsum','Lorem ipsum'),(15,2,'2018','Lorem ipsum','Lorem ipsum'),(16,2,'2018','Lorem ipsum','Lorem ipsum'),(17,2,'2018','Lorem ipsum','Lorem ipsum'),(18,2,'2018','Lorem ipsum','Lorem ipsum'),(19,2,'2018','Lorem ipsum','Lorem ipsum'),(20,2,'2018','Lorem ipsum','Lorem ipsum'),(21,2,'2018','Lorem ipsum','Lorem ipsum'),(22,2,'1992-93','Lorem ipsum','Lorem ipsum'),(23,2,'1992-1993','Lorem ipsum','Lorem ipsum'),(24,2,'1993','Lorem ipsum','Lorem ipsum'),(25,2,'1993','Lorem ipsum','Lorem ipsum'),(26,2,'1993','Lorem ipsum','Lorem ipsum'),(27,2,'1993','Lorem ipsum','Lorem ipsum'),(28,2,'1993','Lorem ipsum','Lorem ipsum'),(29,2,'1993','Lorem ipsum','Lorem ipsum'),(30,2,'1993','Lorem ipsum','Lorem ipsum');
/*!40000 ALTER TABLE `track_record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descriptionEN` longtext COLLATE utf8_unicode_ci,
  `_order` int(11) DEFAULT NULL,
  `urlEN` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nameEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoTitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoTitleEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoKeywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoKeywordsEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  `updatedAt` date DEFAULT NULL,
  `rider_id` int(11) DEFAULT NULL,
  `season_id` int(11) DEFAULT NULL,
  `circuit_id` int(11) DEFAULT NULL,
  `modality_id` int(11) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7CC7DA2CFF881F6` (`rider_id`),
  KEY `IDX_7CC7DA2C4EC001D1` (`season_id`),
  KEY `IDX_7CC7DA2CCF2182C8` (`circuit_id`),
  KEY `IDX_7CC7DA2C2D6D889B` (`modality_id`),
  CONSTRAINT `FK_7CC7DA2C2D6D889B` FOREIGN KEY (`modality_id`) REFERENCES `modality` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_7CC7DA2C4EC001D1` FOREIGN KEY (`season_id`) REFERENCES `season` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_7CC7DA2CCF2182C8` FOREIGN KEY (`circuit_id`) REFERENCES `circuit` (`id`) ON DELETE SET NULL,
  CONSTRAINT `FK_7CC7DA2CFF881F6` FOREIGN KEY (`rider_id`) REFERENCES `rider` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video`
--

LOCK TABLES `video` WRITE;
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
INSERT INTO `video` VALUES (1,'https://www.youtube.com/watch?v=iDDhI8Htji4',NULL,'youtube','Vídeo',NULL,2,'https://www.youtube.com/watch?v=iDDhI8Htji4','Le english vidioum',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,3,8,NULL),(2,'https://www.youtube.com/watch?v=t9uIMJRwGeo',NULL,NULL,'Another vídeo',NULL,NULL,'https://www.youtube.com/watch?v=t9uIMJRwGeo','anothar video',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,2,NULL);
/*!40000 ALTER TABLE `video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video_category`
--

DROP TABLE IF EXISTS `video_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video_category` (
  `video_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`video_id`,`category_id`),
  KEY `IDX_AECE2B7D29C1004E` (`video_id`),
  KEY `IDX_AECE2B7D12469DE2` (`category_id`),
  CONSTRAINT `FK_AECE2B7D12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_AECE2B7D29C1004E` FOREIGN KEY (`video_id`) REFERENCES `video` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video_category`
--

LOCK TABLES `video_category` WRITE;
/*!40000 ALTER TABLE `video_category` DISABLE KEYS */;
INSERT INTO `video_category` VALUES (1,1);
/*!40000 ALTER TABLE `video_category` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-16 13:00:35
