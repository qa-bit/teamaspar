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
  PRIMARY KEY (`id`),
  KEY `IDX_D627AF49C6604E13` (`featuredMedia_id`),
  CONSTRAINT `FK_D627AF49C6604E13` FOREIGN KEY (`featuredMedia_id`) REFERENCES `featured_media__media` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `builder`
--

LOCK TABLES `builder` WRITE;
/*!40000 ALTER TABLE `builder` DISABLE KEYS */;
INSERT INTO `builder` VALUES (1,NULL,'YAMAHA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,NULL,'RMS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Motogp','Descripción de categoría motogp',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'Noticias',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'Misc',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'Sponsors',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1325F3A64E7AF8F` (`gallery_id`),
  KEY `IDX_1325F3A6C6604E13` (`featuredMedia_id`),
  CONSTRAINT `FK_1325F3A64E7AF8F` FOREIGN KEY (`gallery_id`) REFERENCES `media__gallery` (`id`),
  CONSTRAINT `FK_1325F3A6C6604E13` FOREIGN KEY (`featuredMedia_id`) REFERENCES `featured_media__media` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `circuit`
--

LOCK TABLES `circuit` WRITE;
/*!40000 ALTER TABLE `circuit` DISABLE KEYS */;
INSERT INTO `circuit` VALUES (1,12,'Losail International Circuit',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'GP de Qatar','ES',NULL),(2,27,'France circuit',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'GP de France','ES',NULL),(3,NULL,'Circuito',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','',NULL);
/*!40000 ALTER TABLE `circuit` ENABLE KEYS */;
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
  `surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'NOmbre','apellido','email@email.com','922000000');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `featured_media__media`
--

LOCK TABLES `featured_media__media` WRITE;
/*!40000 ALTER TABLE `featured_media__media` DISABLE KEYS */;
INSERT INTO `featured_media__media` VALUES (1,'post-image-1802200216','a',1,'sonata.media.provider.image',1,'2443919e67770a9885d38f52dbe0f8e2b2e28cb6.jpeg','{\"filename\":\"5a8c13abcd046.jpg\"}',1366,408,NULL,'image/jpeg',277931,NULL,NULL,'imagenes',1,NULL,NULL,3,'2018-02-20 13:25:21','2018-02-20 12:14:16',NULL,'a'),(2,'post-image-1802200238',NULL,1,'sonata.media.provider.image',1,'c1bcc3a34e6c5494977c638bf61a1d5a3525fe2a.jpeg','{\"filename\":\"5a95c395322cf.jpg\"}',3163,2101,NULL,'image/jpeg',1640651,NULL,NULL,'imagenes',1,NULL,NULL,3,'2018-02-27 21:46:15','2018-02-20 12:20:38',NULL,NULL),(3,'post-image-1802200255','hola',1,'sonata.media.provider.image',1,'d958aaa569fc6bcc45cdc23e936718eebfd3974b.jpeg','{\"filename\":\"5a95c3a717cd8.jpg\"}',318,159,NULL,'image/jpeg',17678,NULL,NULL,'imagenes',1,NULL,NULL,3,'2018-02-27 21:46:36','2018-02-20 13:07:55',NULL,'hola'),(4,'post-image-1802200244',NULL,1,'sonata.media.provider.image',1,'bf12dbb85b5213ff49f3a0a8cff950d1f55c94fb.jpeg','{\"filename\":\"5a8c15ae7107b.jpg\"}',1366,710,NULL,'image/jpeg',362066,NULL,NULL,'imagenes',1,NULL,NULL,3,'2018-02-20 13:33:55','2018-02-20 13:33:45',NULL,NULL),(5,'post-image-1802200201',NULL,1,'sonata.media.provider.image',1,'967d93d87f24e5a346a90a189e64e057da5014e2.jpeg','{\"filename\":\"5a8c18c34791a.jpg\"}',1366,408,NULL,'image/jpeg',255657,NULL,NULL,'imagenes',NULL,NULL,NULL,NULL,'2018-02-20 13:47:01','2018-02-20 13:47:01',NULL,NULL),(6,'post-image-1802200211',NULL,1,'sonata.media.provider.image',1,'b42ed841b8f0854c03e2da8e1ba5f8bd3da4540f.jpeg','{\"filename\":\"5a8c190131062.jpg\"}',1366,408,NULL,'image/jpeg',255657,NULL,NULL,'imagenes',NULL,NULL,NULL,NULL,'2018-02-20 13:48:11','2018-02-20 13:48:11',NULL,NULL),(7,'post-image-1802200215','adios',0,'sonata.media.provider.image',1,'5978b7567d0efcf2f43ac465a0529b29a6522ed7.jpeg','{\"filename\":\"5a9465ed60c85.jpg\"}',318,159,NULL,'image/jpeg',17678,NULL,NULL,'featured',1,NULL,NULL,3,'2018-02-26 20:56:07','2018-02-20 15:45:15',NULL,'adios'),(8,'post-image-1802200226',NULL,1,'sonata.media.provider.image',1,'2e869b4ebf893bf38bbf8403ec68f3011a929fb0.jpeg','{\"filename\":\"5a8c6b03cd027.jpg\"}',3840,2160,NULL,'image/jpeg',4923213,NULL,NULL,'imagenes',NULL,NULL,NULL,NULL,'2018-02-20 19:38:26','2018-02-20 19:38:26',NULL,NULL),(9,'post-image-1802200247',NULL,0,'sonata.media.provider.image',1,'47b7a3aa89deff4de568e46ed25b23f275ade085.jpeg','{\"filename\":\"5a9ac48845061.jpg\"}',146,108,NULL,'image/jpeg',36336,NULL,NULL,'imagenes',1,NULL,NULL,3,'2018-03-03 16:51:54','2018-02-20 19:40:48',NULL,NULL),(10,'post-image-1802200251',NULL,0,'sonata.media.provider.image',1,'d9305918b8de524bf6c5187fe5236caf53122dd5.jpeg','{\"filename\":\"5a8c6e78bf0c0.jpg\"}',3840,2160,NULL,'image/jpeg',4923213,NULL,NULL,'imagenes',NULL,NULL,NULL,NULL,'2018-03-03 16:52:37','2018-02-20 19:52:51',NULL,NULL),(11,'post-image-1802210224',NULL,0,'sonata.media.provider.image',1,'b2762ad0f132fa25945b714cedfcd6f55878e736.png','{\"filename\":\"5a946a423388e.png\"}',96,144,NULL,'image/png',5739,NULL,NULL,'imagenes',1,NULL,NULL,3,'2018-02-26 21:13:11','2018-02-21 16:49:24',NULL,NULL),(12,'post-image-1802210251',NULL,1,'sonata.media.provider.image',1,'bb851d9a6965dd3ad7919f8a02ac6e83a1797121.jpeg','{\"filename\":\"5a8deb648ded8.jpg\"}',3883,1054,NULL,'image/jpeg',830254,NULL,NULL,'imagenes',1,NULL,NULL,3,'2018-02-21 22:58:04','2018-02-21 20:21:52',NULL,NULL),(13,'post-image-1802210209',NULL,1,'sonata.media.provider.image',1,'reference','[]',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'imagenes',NULL,NULL,NULL,NULL,'2018-02-21 21:43:09','2018-02-21 21:43:09',NULL,NULL),(14,'post-image-1802250247',NULL,0,'sonata.media.provider.image',1,'d17697c3107016034d7ff92dd8a604c38641a933.jpeg','{\"filename\":\"5a94694a2d461.jpg\"}',275,183,NULL,'image/jpeg',13501,NULL,NULL,'imagenes',1,NULL,NULL,3,'2018-02-26 21:09:20','2018-02-25 13:09:47',NULL,NULL),(15,'post-image-1802250229',NULL,0,'sonata.media.provider.image',1,'reference','[]',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'imagenes',NULL,NULL,NULL,NULL,'2018-03-02 14:30:57','2018-02-25 13:55:29',NULL,NULL),(16,'post-image-1802250226',NULL,1,'sonata.media.provider.image',1,'38a781f70afd1232a6476ac455605d662f1aa464.jpeg','{\"filename\":\"5a92b9bc55094.jpg\"}',3840,2160,NULL,'image/jpeg',4923213,NULL,NULL,'imagenes',NULL,NULL,NULL,NULL,'2018-02-25 14:27:27','2018-02-25 14:27:27',NULL,NULL),(17,'post-image-1802260243',NULL,0,'sonata.media.provider.image',1,'81e35286dda42082e7a738c111aed0edf09fc6a4.jpeg','{\"filename\":\"5a94688710cc8.jpg\"}',318,159,NULL,'image/jpeg',17678,NULL,NULL,'featured',1,NULL,NULL,3,'2018-02-26 21:05:38','2018-02-26 21:00:43',NULL,NULL),(18,'post-image-1802260219',NULL,0,'sonata.media.provider.image',1,'563ec20841638e1de00d9bdbe8582d4ff29c65fa.jpeg','{\"filename\":\"5a9468b8d3cf9.jpg\"}',318,159,NULL,'image/jpeg',17678,NULL,NULL,'featured',NULL,NULL,NULL,NULL,'2018-02-26 21:08:00','2018-02-26 21:06:19',NULL,NULL),(19,'post-image-1802260208',NULL,1,'sonata.media.provider.image',1,'62568a63708ff54b98755fe87fcb088f60ec8001.jpeg','{\"filename\":\"5a946925ad929.jpg\"}',318,159,NULL,'image/jpeg',17678,NULL,NULL,'featured',NULL,NULL,NULL,NULL,'2018-02-26 21:08:08','2018-02-26 21:08:08',NULL,NULL),(20,'post-image-1802260235',NULL,0,'sonata.media.provider.image',1,'bc6eb7bcf52089c856c4abe7ef1064eff50f1e63.png','{\"filename\":\"5a946979b9845.png\"}',96,144,NULL,'image/png',5739,NULL,NULL,'featured',NULL,NULL,NULL,NULL,'2018-02-26 21:12:35','2018-02-26 21:09:35',NULL,NULL),(21,'post-image-1802260217',NULL,1,'sonata.media.provider.image',1,'15436509436962d0bcc4b80536218f8ffa105265.png','{\"filename\":\"5a946a5c4f582.png\"}',96,144,NULL,'image/png',5739,NULL,NULL,'featured',NULL,NULL,NULL,NULL,'2018-02-26 21:13:17','2018-02-26 21:13:17',NULL,NULL),(22,'post-image-1802270209',NULL,1,'sonata.media.provider.image',1,'81ea43d422734ba91aaa67971e2e7fa8bb1bc7f9.jpeg','{\"filename\":\"5a95c34907f2a.jpg\"}',3163,2101,NULL,'image/jpeg',1640651,NULL,NULL,'featured',NULL,NULL,NULL,NULL,'2018-02-27 21:45:09','2018-02-27 21:45:09',NULL,NULL),(23,'post-image-1802270252',NULL,1,'sonata.media.provider.image',1,'2036431db5311e90717a0171d681c541adbe88bb.jpeg','{\"filename\":\"5a95c3745763e.jpg\"}',4896,3264,NULL,'image/jpeg',1359700,NULL,NULL,'featured',NULL,NULL,NULL,NULL,'2018-02-27 21:45:53','2018-02-27 21:45:53',NULL,NULL),(24,'post-image-1803030307',NULL,1,'sonata.media.provider.image',1,'0bd824e51d378abf64840448b8848aef13784bd8.jpeg','{\"filename\":\"5a9ac4a4e2629.jpg\"}',146,108,NULL,'image/jpeg',36336,NULL,NULL,'featured',NULL,NULL,NULL,NULL,'2018-03-03 16:52:07','2018-03-03 16:52:07',NULL,NULL),(25,'post-image-1803030322',NULL,1,'sonata.media.provider.image',1,'b14cf095574db0b9409fd5b1662a8984e7136222.png','{\"filename\":\"5a9ac51fc386d.png\"}',315,160,NULL,'image/png',2714,NULL,NULL,'featured',NULL,NULL,NULL,NULL,'2018-03-03 16:54:22','2018-03-03 16:54:22',NULL,NULL),(26,'post-image-1803030316',NULL,1,'sonata.media.provider.image',1,'3ebcf8b915ff049589fe08257bec51795649aabb.png','{\"filename\":\"5a9ac594395e0.png\"}',288,175,NULL,'image/png',4396,NULL,NULL,'featured',NULL,NULL,NULL,NULL,'2018-03-03 16:56:16','2018-03-03 16:56:16',NULL,NULL),(27,'post-image-1803030320',NULL,1,'sonata.media.provider.image',1,'96afb00a23ffbf1efe6e44661e16046d8cbbf310.jpeg','{\"filename\":\"5a9af2679a0c8.jpg\"}',715,374,NULL,'image/jpeg',102686,NULL,NULL,'featured',NULL,NULL,NULL,NULL,'2018-03-03 20:07:20','2018-03-03 20:07:20',NULL,NULL),(28,'post-image-1803040335',NULL,1,'sonata.media.provider.image',1,'16a7b951839936fe152b8adc3288073aced1c80d.png','{\"filename\":\"5a9c57a5da54f.png\"}',960,846,NULL,'image/png',571952,NULL,NULL,'featured',NULL,NULL,NULL,NULL,'2018-03-04 21:31:35','2018-03-04 21:31:35',NULL,NULL),(29,'post-image-1803040348',NULL,1,'sonata.media.provider.image',1,'d7a6d61c3e27bd70634dd0db9c41785fb67d0b39.png','{\"filename\":\"5a9c57b36a4ed.png\"}',885,788,NULL,'image/png',467872,NULL,NULL,'featured',NULL,NULL,NULL,NULL,'2018-03-04 21:31:49','2018-03-04 21:31:49',NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fos_user`
--

LOCK TABLES `fos_user` WRITE;
/*!40000 ALTER TABLE `fos_user` DISABLE KEYS */;
INSERT INTO `fos_user` VALUES (1,'emgoya','emgoya','emgoya@gmail.com','emgoya@gmail.com',1,NULL,'$2y$13$WkFlQJJz1nvo9M46WsLfH.rkC8UfVDTzNsFDuG6VxmUy/eGrR4m/i','2018-02-10 17:12:45',NULL,NULL,'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}'),(2,'admin','admin','test@test.com','test@test.com',1,NULL,'$2y$13$XIgoUY4kCQkBr59VleeMZOV4CpCd4SOKqpIdPEbuhJjWXEe.eFFPK','2018-03-06 11:23:06',NULL,NULL,'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}');
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
  PRIMARY KEY (`id`),
  KEY `IDX_472B783A2D6D889B` (`modality_id`),
  KEY `IDX_472B783AC6604E13` (`featuredMedia_id`),
  KEY `IDX_472B783A4EC001D1` (`season_id`),
  KEY `IDX_472B783ACF2182C8` (`circuit_id`),
  KEY `IDX_472B783AFF881F6` (`rider_id`),
  KEY `IDX_472B783A6E59D40D` (`race_id`),
  CONSTRAINT `FK_472B783A2D6D889B` FOREIGN KEY (`modality_id`) REFERENCES `modality` (`id`),
  CONSTRAINT `FK_472B783A4EC001D1` FOREIGN KEY (`season_id`) REFERENCES `season` (`id`),
  CONSTRAINT `FK_472B783A6E59D40D` FOREIGN KEY (`race_id`) REFERENCES `race` (`id`),
  CONSTRAINT `FK_472B783AC6604E13` FOREIGN KEY (`featuredMedia_id`) REFERENCES `featured_media__media` (`id`),
  CONSTRAINT `FK_472B783ACF2182C8` FOREIGN KEY (`circuit_id`) REFERENCES `circuit` (`id`),
  CONSTRAINT `FK_472B783AFF881F6` FOREIGN KEY (`rider_id`) REFERENCES `rider` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery`
--

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` VALUES (3,1,NULL,'inicio_moto_gp','inicio - Moto GP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,2,NULL,'inicio_moto_3','inicio - Moto 3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,3,NULL,'inicio_campeonato_espana','inicio - Campeonato españa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,4,NULL,'inicio_otro','inicio - Otro',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,1,NULL,'contacto_moto_gp','contacto - Moto GP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,2,NULL,'contacto_moto_3','contacto - Moto 3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,3,NULL,'contacto_campeonato_espana','contacto - Campeonato españa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,4,NULL,'contacto_otro','contacto - Otro',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,1,NULL,'noticias_moto_gp','noticias - Moto GP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,2,NULL,'noticias_moto_3','noticias - Moto 3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,3,NULL,'noticias_campeonato_espana','noticias - Campeonato españa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(14,4,NULL,'noticias_otro','noticias - Otro',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,1,NULL,'videos_moto_gp','videos - Moto GP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(16,2,NULL,'videos_moto_3','videos - Moto 3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,3,NULL,'videos_campeonato_espana','videos - Campeonato españa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(18,4,NULL,'videos_otro','videos - Otro',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,NULL,NULL,NULL,'A new Gallery',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,2),(20,1,NULL,'imagenes_moto_gp','imagenes - Moto GP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(21,2,NULL,'imagenes_moto_3','imagenes - Moto 3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(22,3,NULL,'imagenes_campeonato_espana','imagenes - Campeonato españa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(23,1,NULL,'motos_moto_gp','motos - Moto GP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(24,2,NULL,'motos_moto_3','motos - Moto 3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(25,3,NULL,'motos_campeonato_espana','motos - Campeonato españa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,1,NULL,'staff_moto_gp','staff - Moto GP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(27,2,NULL,'staff_moto_3','staff - Moto 3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(28,3,NULL,'staff_campeonato_espana','staff - Campeonato españa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(29,1,NULL,'sponsor_moto_gp','sponsor - Moto GP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(30,2,NULL,'sponsor_moto_3','sponsor - Moto 3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(31,3,NULL,'sponsor_campeonato_espana','sponsor - Campeonato españa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(32,NULL,NULL,NULL,'Anotha gallery',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,2),(33,1,NULL,'riders_moto_gp','riders - Moto GP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(34,2,NULL,'riders_moto_3','riders - Moto 3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(35,3,NULL,'riders_campeonato_espana','riders - Campeonato españa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
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
INSERT INTO `gallery_category` VALUES (19,1);
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
  PRIMARY KEY (`id`),
  KEY `IDX_C08DDDAE7E3C61F9` (`owner_id`),
  KEY `IDX_C08DDDAEFF881F6` (`rider_id`),
  CONSTRAINT `FK_C08DDDAE7E3C61F9` FOREIGN KEY (`owner_id`) REFERENCES `gallery` (`id`),
  CONSTRAINT `FK_C08DDDAEFF881F6` FOREIGN KEY (`rider_id`) REFERENCES `rider` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery_media__media`
--

LOCK TABLES `gallery_media__media` WRITE;
/*!40000 ALTER TABLE `gallery_media__media` DISABLE KEYS */;
INSERT INTO `gallery_media__media` VALUES (19,3,'gallery-image-1802260257','una descripcion',1,'sonata.media.provider.image',1,'0d308d92ca5143c96bdd1b750e33c02655527b8e.jpeg','{\"filename\":\"5a94879105b42.jpg\"}',3163,2101,NULL,'image/jpeg',1640651,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-03 19:46:50','2018-02-26 23:17:58','http://google.es',NULL,NULL,NULL,'Un título'),(20,3,'gallery-image-1802260257','una cosa indefinida descrita',1,'sonata.media.provider.image',1,'30cbd2bd8f9e0e3c28bcba9bfa41f41f4e48b05d.jpeg','{\"filename\":\"5a948793bb9f5.jpg\"}',4896,3264,NULL,'image/jpeg',1359700,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-02-27 20:53:19','2018-02-26 23:17:58','http://algo.com',NULL,NULL,NULL,'Una cosa indefinida'),(21,19,'gallery-image-1802270257','lalalalalallala',1,'sonata.media.provider.image',1,'ddde518b4a4afbefe2824b93474c5c9c9bd8dba5.jpeg','{\"filename\":\"5a95a4171a567.jpg\"}',4896,3264,NULL,'image/jpeg',1359700,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-03 21:27:03','2018-02-27 19:31:57',NULL,NULL,NULL,5,NULL),(22,32,'gallery-image-1802270243',NULL,1,'sonata.media.provider.image',1,'9ee753829089a2e8d4e2d5c3dc3269c6dbaf460f.jpeg','{\"filename\":\"5a95d0cf3efba.jpg\"}',4896,3264,NULL,'image/jpeg',1359700,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-02-27 22:42:43','2018-02-27 22:42:43',NULL,NULL,NULL,NULL,NULL),(23,32,'gallery-image-1802270243',NULL,1,'sonata.media.provider.image',1,'ee655eabed619d00972cb102e5a5f8b82ddf8901.jpeg','{\"filename\":\"5a95d0d25d282.jpg\"}',318,159,NULL,'image/jpeg',17678,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-02-27 22:42:43','2018-02-27 22:42:43',NULL,NULL,NULL,NULL,NULL),(24,19,'gallery-image-1802270209','memememem',1,'sonata.media.provider.image',1,'49d9d2b204b6a72bbf1a485e1ad2f69211b45ab8.jpeg','{\"filename\":\"5a95d2cc0779a.jpg\"}',326,154,NULL,'image/jpeg',6227,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-03 21:27:03','2018-02-27 22:51:09',NULL,NULL,NULL,NULL,NULL),(25,20,'gallery-image-1803030352',NULL,1,'sonata.media.provider.image',1,'f5055774c0d819490664527cefd6ebaf34e1c49f.jpeg','{\"filename\":\"5a9af02f5ddcb.jpg\"}',1200,800,NULL,'image/jpeg',310711,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-03 19:57:52','2018-03-03 19:57:52',NULL,NULL,NULL,NULL,NULL),(26,20,'gallery-image-1803030328',NULL,1,'sonata.media.provider.image',1,'607f85d990337f6e9c4830e0d9f7a7dad981f379.jpeg','{\"filename\":\"5a9af08e9c08f.jpg\"}',3163,2101,NULL,'image/jpeg',1640651,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-03 19:59:29','2018-03-03 19:59:29',NULL,NULL,NULL,NULL,NULL),(27,16,'gallery-image-1803040307',NULL,1,'sonata.media.provider.image',1,'2d24191b6aa786649b310a71adaa7d28e4e1f429.jpeg','{\"filename\":\"5a9bf27ec644c.jpg\"}',980,554,NULL,'image/jpeg',85614,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-04 14:20:07','2018-03-04 14:20:07',NULL,NULL,NULL,NULL,NULL),(28,16,'gallery-image-1803040307',NULL,1,'sonata.media.provider.image',1,'9f8ef3178d5d2b50648c015b9c91e509b4ae0bf8.jpeg','{\"filename\":\"5a9bf285b50e6.jpg\"}',3163,2101,NULL,'image/jpeg',1640651,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-04 14:20:07','2018-03-04 14:20:07',NULL,NULL,NULL,NULL,NULL),(29,15,'gallery-image-1803040310',NULL,1,'sonata.media.provider.image',1,'b76715c3e912cd20fdb5845f8a5a076fe0d8028c.jpeg','{\"filename\":\"5a9bf2c0a5164.jpg\"}',1200,800,NULL,'image/jpeg',310711,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-04 15:01:51','2018-03-04 14:21:10',NULL,NULL,NULL,NULL,'VIDEO GALLERY'),(31,23,'gallery-image-1803040341',NULL,1,'sonata.media.provider.image',1,'20f22e2c87e60ba7f2d0aedc2610d249f4f700f3.jpeg','{\"filename\":\"5a9c19858c4a3.jpg\"}',3163,2101,NULL,'image/jpeg',1640651,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-04 17:06:42','2018-03-04 17:06:42',NULL,NULL,NULL,NULL,NULL),(32,23,'gallery-image-1803040341',NULL,1,'sonata.media.provider.image',1,'918fcd802861ae613f9e0bce2292fff4fabe83d8.jpeg','{\"filename\":\"5a9c19904c4c2.jpg\"}',4896,3264,NULL,'image/jpeg',1359700,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-04 17:06:42','2018-03-04 17:06:42',NULL,NULL,NULL,NULL,NULL),(33,23,'gallery-image-1803040307',NULL,1,'sonata.media.provider.image',1,'8ab80713b9e695335acb3c87d7c23714c036e559.jpeg','{\"filename\":\"5a9c26867de8a.jpg\"}',275,183,NULL,'image/jpeg',13501,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-04 18:02:07','2018-03-04 18:02:07',NULL,NULL,NULL,NULL,NULL),(34,23,'gallery-image-1803040307',NULL,1,'sonata.media.provider.image',1,'a17ca714a30308f58659d2acee7bf44a7f1408f3.jpeg','{\"filename\":\"5a9c268a2e58e.jpg\"}',318,159,NULL,'image/jpeg',17678,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-04 18:02:07','2018-03-04 18:02:07',NULL,NULL,NULL,NULL,NULL),(35,23,'gallery-image-1803040307',NULL,1,'sonata.media.provider.image',1,'088e490008fab3bfbeb2bd4a99ec0b4bc4a9150c.jpeg','{\"filename\":\"5a9c268d435aa.jpg\"}',1200,800,NULL,'image/jpeg',310711,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-04 18:02:07','2018-03-04 18:02:07',NULL,NULL,NULL,NULL,NULL),(36,33,'gallery-image-1803040329',NULL,1,'sonata.media.provider.image',1,'f2785dbed636b432913ee949f4e3d0bf9dec0f64.jpeg','{\"filename\":\"5a9c54a8e7587.jpg\"}',1124,445,NULL,'image/jpeg',265783,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-04 21:19:29','2018-03-04 21:19:29',NULL,NULL,NULL,NULL,NULL),(37,26,'gallery-image-1803050359',NULL,1,'sonata.media.provider.image',1,'d974a6f080ef60c4312db7b1e7ab2eca3891d525.png','{\"filename\":\"5a9d61fe0912b.png\"}',2560,1409,NULL,'image/png',1327754,NULL,NULL,'gallery',NULL,NULL,NULL,NULL,'2018-03-05 16:28:00','2018-03-05 16:28:00',NULL,NULL,NULL,NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `homeimage__media`
--

LOCK TABLES `homeimage__media` WRITE;
/*!40000 ALTER TABLE `homeimage__media` DISABLE KEYS */;
INSERT INTO `homeimage__media` VALUES (1,'post-image-1803020318',NULL,1,'sonata.media.provider.image',1,'54fae2b917c4905fca48eb1c34f5150054949587.png','{\"filename\":\"5a995e0819975.png\"}',885,788,NULL,'image/png',543027,NULL,NULL,'homeimage',1,NULL,NULL,3,'2018-03-02 15:22:02','2018-03-02 14:30:18',NULL,NULL),(2,'post-image-1803020356',NULL,1,'sonata.media.provider.image',1,'edfb58ca7b23ba7710446ff173cf74e3384fb949.png','{\"filename\":\"5a998ac609ac3.png\"}',885,788,NULL,'image/png',467872,NULL,NULL,'homeimage',1,NULL,NULL,3,'2018-03-02 18:32:55','2018-03-02 14:30:56',NULL,NULL),(3,'post-image-1803020339',NULL,1,'sonata.media.provider.image',1,'f339953e3ea2a74277fa9e416734cb10af94477a.png','{\"filename\":\"5a99ae3772ac9.png\"}',480,445,NULL,'image/png',199290,NULL,NULL,'homeimage',1,NULL,NULL,3,'2018-03-02 21:04:09','2018-03-02 19:49:40',NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logo__media`
--

LOCK TABLES `logo__media` WRITE;
/*!40000 ALTER TABLE `logo__media` DISABLE KEYS */;
INSERT INTO `logo__media` VALUES (1,'post-image-1802260215','a',0,'sonata.media.provider.image',1,'ad641f91c0287d0a3bb8c1eec41ccccfff9bf056.png','{\"filename\":\"5a94697e09688.png\"}',605,136,NULL,'image/png',59619,NULL,NULL,'imagenes',1,NULL,NULL,3,'2018-02-26 21:11:16','2018-02-26 11:30:15',NULL,'a'),(2,'post-image-1802260223',NULL,1,'sonata.media.provider.image',1,'6e2077ae3eb76e025f6c396e69dcbeada96aa9b4.jpeg','{\"filename\":\"5a93eb3b4f6b0.jpg\"}',275,183,NULL,'image/jpeg',11490,NULL,NULL,'imagenes',1,NULL,NULL,3,'2018-02-26 12:10:53','2018-02-26 12:09:23',NULL,NULL),(3,'post-image-1802260217',NULL,0,'sonata.media.provider.image',1,'2901906f19f8d129889f883af07ac1899e083f67.png','{\"filename\":\"5a946a1f90660.png\"}',605,136,NULL,'image/png',59619,NULL,NULL,'logo',NULL,NULL,NULL,NULL,'2018-02-26 21:12:35','2018-02-26 21:12:17',NULL,NULL);
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modality`
--

LOCK TABLES `modality` WRITE;
/*!40000 ALTER TABLE `modality` DISABLE KEYS */;
INSERT INTO `modality` VALUES (1,'Moto GP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'Moto 3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'Campeonato españa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'Otro',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
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
  PRIMARY KEY (`id`),
  KEY `IDX_3DDDBCE4959F66E4` (`builder_id`),
  CONSTRAINT `FK_3DDDBCE4959F66E4` FOREIGN KEY (`builder_id`) REFERENCES `builder` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moto`
--

LOCK TABLES `moto` WRITE;
/*!40000 ALTER TABLE `moto` DISABLE KEYS */;
INSERT INTO `moto` VALUES (1,1,'Yamaha bebere beberre','English neim',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL);
/*!40000 ALTER TABLE `moto` ENABLE KEYS */;
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
  PRIMARY KEY (`id`),
  KEY `IDX_5A8A6C8D2D6D889B` (`modality_id`),
  KEY `IDX_5A8A6C8DFF881F6` (`rider_id`),
  KEY `IDX_5A8A6C8DCF2182C8` (`circuit_id`),
  KEY `IDX_5A8A6C8D4EC001D1` (`season_id`),
  KEY `IDX_5A8A6C8DC6604E13` (`featuredMedia_id`),
  CONSTRAINT `FK_5A8A6C8D2D6D889B` FOREIGN KEY (`modality_id`) REFERENCES `modality` (`id`),
  CONSTRAINT `FK_5A8A6C8D4EC001D1` FOREIGN KEY (`season_id`) REFERENCES `season` (`id`),
  CONSTRAINT `FK_5A8A6C8DC6604E13` FOREIGN KEY (`featuredMedia_id`) REFERENCES `featured_media__media` (`id`),
  CONSTRAINT `FK_5A8A6C8DCF2182C8` FOREIGN KEY (`circuit_id`) REFERENCES `circuit` (`id`),
  CONSTRAINT `FK_5A8A6C8DFF881F6` FOREIGN KEY (`rider_id`) REFERENCES `rider` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (2,'ipsum lorem lorem','<p>El texto en s&iacute; no tiene sentido, aunque no es completamente aleatorio, sino que deriva de un texto de&nbsp;<a href=\"https://es.wikipedia.org/wiki/Cicer%C3%B3n\" title=\"Cicerón\">Cicer&oacute;n</a>&nbsp;en lengua&nbsp;<a href=\"https://es.wikipedia.org/wiki/Lat%C3%ADn\" title=\"Latín\">latina</a>, a cuyas palabras se les han eliminado s&iacute;labas o letras. El significado del texto no tiene importancia, ya que solo es una demostraci&oacute;n o prueba, pero se inspira en la obra de&nbsp;<a href=\"https://es.wikipedia.org/wiki/Cicer%C3%B3n\" title=\"Cicerón\">Cicer&oacute;n</a>&nbsp;<em><a href=\"https://es.wikipedia.org/wiki/De_finibus\" title=\"De finibus\">De finibus bonorum et malorum</a></em>&nbsp;(<em>Sobre los l&iacute;mites del bien y del mal</em>) que comienza con:</p>',NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,22,NULL,2,1,'2018-02-21'),(3,'lorem ipsum and lorem','<p>El texto en s&iacute; no tiene sentido, aunque no es completamente aleatorio, sino que deriva de un texto de&nbsp;<a href=\"https://es.wikipedia.org/wiki/Cicer%C3%B3n\" title=\"Cicerón\">Cicer&oacute;n</a>&nbsp;en lengua&nbsp;<a href=\"https://es.wikipedia.org/wiki/Lat%C3%ADn\" title=\"Latín\">latina</a>, a cuyas palabras se les han eliminado s&iacute;labas o letras. El significado del texto no tiene importancia, ya que solo es una demostraci&oacute;n o prueba, pero se inspira en la obra de&nbsp;<a href=\"https://es.wikipedia.org/wiki/Cicer%C3%B3n\" title=\"Cicerón\">Cicer&oacute;n</a>&nbsp;<em><a href=\"https://es.wikipedia.org/wiki/De_finibus\" title=\"De finibus\">De finibus bonorum et malorum</a></em>&nbsp;(<em>Sobre los l&iacute;mites del bien y del mal</em>) que comienza con:</p>',NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,23,NULL,NULL,1,'2018-02-22'),(4,'A lorem ipsum is ipsum and ipsum','<p>El texto en s&iacute; no tiene sentido, aunque no es completamente aleatorio, sino que deriva de un texto de&nbsp;<a href=\"https://es.wikipedia.org/wiki/Cicer%C3%B3n\" title=\"Cicerón\">Cicer&oacute;n</a>&nbsp;en lengua&nbsp;<a href=\"https://es.wikipedia.org/wiki/Lat%C3%ADn\" title=\"Latín\">latina</a>, a cuyas palabras se les han eliminado s&iacute;labas o letras. El significado del texto no tiene importancia, ya que solo es una demostraci&oacute;n o prueba, pero se inspira en la obra de&nbsp;<a href=\"https://es.wikipedia.org/wiki/Cicer%C3%B3n\" title=\"Cicerón\">Cicer&oacute;n</a>&nbsp;<em><a href=\"https://es.wikipedia.org/wiki/De_finibus\" title=\"De finibus\">De finibus bonorum et malorum</a></em>&nbsp;(<em>Sobre los l&iacute;mites del bien y del mal</em>) que comienza con:</p>','<p>a</p>',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,1,'2018-02-03'),(5,'Lorem ipsum ipsum',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL,1,'2018-02-28'),(6,'Ipsum ipsum lorem','<p>adsadas</p>','<p>dasdsa</p>',NULL,1,'dsadas',NULL,NULL,NULL,NULL,NULL,NULL,13,2,NULL,1,'2018-02-21');
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
INSERT INTO `post_category` VALUES (4,1);
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
INSERT INTO `post_gallery` VALUES (3,19);
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
  PRIMARY KEY (`id`),
  KEY `IDX_F750AA9D7E3C61F9` (`owner_id`),
  CONSTRAINT `FK_F750AA9D7E3C61F9` FOREIGN KEY (`owner_id`) REFERENCES `post` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_media__media`
--

LOCK TABLES `post_media__media` WRITE;
/*!40000 ALTER TABLE `post_media__media` DISABLE KEYS */;
INSERT INTO `post_media__media` VALUES (54,'post-image-1802200201',NULL,1,'sonata.media.provider.image',1,'c814e07fa72cfaee3f17a785f94bbde55060eb4c.jpeg','{\"filename\":\"5a8c18c1017e6.jpg\"}',1366,408,NULL,'image/jpeg',277931,NULL,NULL,'imagenes',NULL,NULL,NULL,NULL,'2018-02-20 13:47:01','2018-02-20 13:47:01',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `post_media__media` ENABLE KEYS */;
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
  PRIMARY KEY (`id`),
  KEY `IDX_DA6FBBAF4EC001D1` (`season_id`),
  KEY `IDX_DA6FBBAFCF2182C8` (`circuit_id`),
  CONSTRAINT `FK_DA6FBBAF4EC001D1` FOREIGN KEY (`season_id`) REFERENCES `season` (`id`),
  CONSTRAINT `FK_DA6FBBAFCF2182C8` FOREIGN KEY (`circuit_id`) REFERENCES `circuit` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `race`
--

LOCK TABLES `race` WRITE;
/*!40000 ALTER TABLE `race` DISABLE KEYS */;
INSERT INTO `race` VALUES (1,1,2,'2018-02-02','2023-04-02','CARRERA DE MÑA A LAS 12 EN FUNTO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,1,1,'2017-03-01','2015-01-01','sadsad',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
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
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo_id` int(11) DEFAULT NULL,
  `homeImage_id` int(11) DEFAULT NULL,
  `showInHome` tinyint(1) DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `podiums` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `podiumsEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_EA4110352D6D889B` (`modality_id`),
  KEY `IDX_EA411035C9489088` (`teamCategory_id`),
  KEY `IDX_EA411035C30DB9F9` (`riderTeam_id`),
  KEY `IDX_EA411035C6604E13` (`featuredMedia_id`),
  KEY `IDX_EA41103578B8F2AC` (`moto_id`),
  KEY `IDX_EA411035F98F144A` (`logo_id`),
  KEY `IDX_EA4110355BB6D1E` (`homeImage_id`),
  CONSTRAINT `FK_EA4110352D6D889B` FOREIGN KEY (`modality_id`) REFERENCES `modality` (`id`),
  CONSTRAINT `FK_EA4110355BB6D1E` FOREIGN KEY (`homeImage_id`) REFERENCES `homeimage__media` (`id`),
  CONSTRAINT `FK_EA41103578B8F2AC` FOREIGN KEY (`moto_id`) REFERENCES `moto` (`id`),
  CONSTRAINT `FK_EA411035C30DB9F9` FOREIGN KEY (`riderTeam_id`) REFERENCES `rider_team` (`id`),
  CONSTRAINT `FK_EA411035C6604E13` FOREIGN KEY (`featuredMedia_id`) REFERENCES `featured_media__media` (`id`),
  CONSTRAINT `FK_EA411035C9489088` FOREIGN KEY (`teamCategory_id`) REFERENCES `team_category` (`id`),
  CONSTRAINT `FK_EA411035F98F144A` FOREIGN KEY (`logo_id`) REFERENCES `logo__media` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rider`
--

LOCK TABLES `rider` WRITE;
/*!40000 ALTER TABLE `rider` DISABLE KEYS */;
INSERT INTO `rider` VALUES (1,'Angel',NULL,NULL,2,1,'Nieto',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,'',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'Álvaro','<p><strong>Lorem ipsum</strong>&nbsp;es el texto que se usa habitualmente en&nbsp;<a href=\"https://es.wikipedia.org/wiki/Dise%C3%B1o_gr%C3%A1fico\" title=\"Diseño gráfico\">dise&ntilde;o gr&aacute;fico</a>&nbsp;en demostraciones de&nbsp;<a href=\"https://es.wikipedia.org/wiki/Tipograf%C3%ADa\" title=\"Tipografía\">tipograf&iacute;as</a>&nbsp;o de&nbsp;<a href=\"https://es.wikipedia.org/wiki/Borrador_(boceto)\" title=\"Borrador (boceto)\">borradores</a>&nbsp;de dise&ntilde;o para probar el dise&ntilde;o visual antes de insertar el texto final.</p>\r\n\r\n<p>Aunque no posee actualmente fuentes para justificar sus hip&oacute;tesis, el profesor de filolog&iacute;a cl&aacute;sica Richard McClintock asegura que su uso se remonta a los impresores de comienzos del siglo XVI.<sup><a href=\"https://es.wikipedia.org/wiki/Lorem_ipsum#cite_note-1\">1</a></sup>​ Su uso en algunos&nbsp;<a href=\"https://es.wikipedia.org/wiki/Editor_de_texto\" title=\"Editor de texto\">editores de texto</a>&nbsp;muy conocidos en la actualidad ha dado al texto&nbsp;<em>lorem ipsum</em>&nbsp;nueva popularidad.</p>\r\n\r\n<p>El texto en s&iacute; no tiene sentido, aunque no es completamente aleatorio, sino que deriva de un texto de&nbsp;<a href=\"https://es.wikipedia.org/wiki/Cicer%C3%B3n\" title=\"Cicerón\">Cicer&oacute;n</a>&nbsp;en lengua&nbsp;<a href=\"https://es.wikipedia.org/wiki/Lat%C3%ADn\" title=\"Latín\">latina</a>, a cuyas palabras se les han eliminado s&iacute;labas o letras. El significado del texto no tiene importancia, ya que solo es una demostraci&oacute;n o prueba, pero se inspira en la obra de&nbsp;<a href=\"https://es.wikipedia.org/wiki/Cicer%C3%B3n\" title=\"Cicerón\">Cicer&oacute;n</a>&nbsp;<em><a href=\"https://es.wikipedia.org/wiki/De_finibus\" title=\"De finibus\">De finibus bonorum et malorum</a></em>&nbsp;(<em>Sobre los l&iacute;mites del bien y del mal</em>) que comienza con</p>','<p>In a place of the mancha</p>',1,1,'Bautista',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,28,'1984-11-21',NULL,'Primera carrera','Primer gran premio','Primera victoria','Última victoria','Primera Pole','Primera vuelta rápida','Primer Podio','Victorias','Podios','Vueltas rápidas','Mejor resultado general','Mejor resultado general',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,'AF',NULL,1,1,'http://facebook.com/tal','http://twitter.com/tal','http://instagram.com/tal',19,NULL,NULL),(3,'Blah',NULL,NULL,NULL,1,'blah',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'Karel',NULL,NULL,2,1,'Abraham',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,29,'2018-02-01',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,'AF',NULL,2,1,NULL,NULL,NULL,17,NULL,NULL),(5,'Bob',NULL,NULL,2,1,'Esponja',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,16,'2018-02-23',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,'AF',NULL,3,0,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `rider` ENABLE KEYS */;
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rider_team`
--

LOCK TABLES `rider_team` WRITE;
/*!40000 ALTER TABLE `rider_team` DISABLE KEYS */;
INSERT INTO `rider_team` VALUES (1,'Equipo 1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'Ángel Nieto Team',NULL,NULL,NULL,'Ángel Nieto Team',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,'http://facebook.com','http://twitter.com','http://instagram.com','http://youtube.com');
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
  `time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `score_race_rider` (`race_id`,`rider_id`),
  KEY `IDX_329937516E59D40D` (`race_id`),
  KEY `IDX_32993751FF881F6` (`rider_id`),
  CONSTRAINT `FK_329937516E59D40D` FOREIGN KEY (`race_id`) REFERENCES `race` (`id`),
  CONSTRAINT `FK_32993751FF881F6` FOREIGN KEY (`rider_id`) REFERENCES `rider` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `score`
--

LOCK TABLES `score` WRITE;
/*!40000 ALTER TABLE `score` DISABLE KEYS */;
INSERT INTO `score` VALUES (1,1,1,103,'900','180217-Feb07',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,NULL,2,12,'190','180217-Feb28',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,NULL,3,11,'111','180217-Feb28',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,NULL,2,123,'12','180217-Feb05',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,1,3,124,'1','180217-Feb16',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,1,2,7,'7','180225-Feb32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,1,5,900,'1222','180228-Feb31',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `season`
--

LOCK TABLES `season` WRITE;
/*!40000 ALTER TABLE `season` DISABLE KEYS */;
INSERT INTO `season` VALUES (1,'2018',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-04-02','2018-12-23');
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
  PRIMARY KEY (`id`),
  KEY `IDX_818CC9D4C6604E13` (`featuredMedia_id`),
  CONSTRAINT `FK_818CC9D4C6604E13` FOREIGN KEY (`featuredMedia_id`) REFERENCES `featured_media__media` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sponsor`
--

LOCK TABLES `sponsor` WRITE;
/*!40000 ALTER TABLE `sponsor` DISABLE KEYS */;
INSERT INTO `sponsor` VALUES (1,'MOTARD',NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'https://www.michelin.es/',24,0),(2,'MRW',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'http://sponsor.com',25,0),(3,'MICHELIN',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'http://michelin.es',26,1);
/*!40000 ALTER TABLE `sponsor` ENABLE KEYS */;
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
  PRIMARY KEY (`id`),
  KEY `IDX_C4E0A61FC9489088` (`teamCategory_id`),
  KEY `IDX_C4E0A61FC30DB9F9` (`riderTeam_id`),
  KEY `IDX_C4E0A61FFF881F6` (`rider_id`),
  KEY `IDX_C4E0A61FC6604E13` (`featuredMedia_id`),
  CONSTRAINT `FK_C4E0A61FC30DB9F9` FOREIGN KEY (`riderTeam_id`) REFERENCES `rider_team` (`id`),
  CONSTRAINT `FK_C4E0A61FC6604E13` FOREIGN KEY (`featuredMedia_id`) REFERENCES `featured_media__media` (`id`),
  CONSTRAINT `FK_C4E0A61FC9489088` FOREIGN KEY (`teamCategory_id`) REFERENCES `team_category` (`id`),
  CONSTRAINT `FK_C4E0A61FFF881F6` FOREIGN KEY (`rider_id`) REFERENCES `rider` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team`
--

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` VALUES (1,'Mecanico mec',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,21,NULL,'DE'),(2,'hi',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'');
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_category`
--

LOCK TABLES `team_category` WRITE;
/*!40000 ALTER TABLE `team_category` DISABLE KEYS */;
INSERT INTO `team_category` VALUES (1,'Mecánico','Lorem ipsum',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'Marketing',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `team_category` ENABLE KEYS */;
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
  CONSTRAINT `FK_D3F65E78FF881F6` FOREIGN KEY (`rider_id`) REFERENCES `rider` (`id`)
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
  PRIMARY KEY (`id`),
  KEY `IDX_7CC7DA2CFF881F6` (`rider_id`),
  KEY `IDX_7CC7DA2C4EC001D1` (`season_id`),
  KEY `IDX_7CC7DA2CCF2182C8` (`circuit_id`),
  CONSTRAINT `FK_7CC7DA2C4EC001D1` FOREIGN KEY (`season_id`) REFERENCES `season` (`id`),
  CONSTRAINT `FK_7CC7DA2CCF2182C8` FOREIGN KEY (`circuit_id`) REFERENCES `circuit` (`id`),
  CONSTRAINT `FK_7CC7DA2CFF881F6` FOREIGN KEY (`rider_id`) REFERENCES `rider` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video`
--

LOCK TABLES `video` WRITE;
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
INSERT INTO `video` VALUES (1,'https://www.youtube.com/watch?v=iDDhI8Htji4',NULL,'youtube','Vídeo',NULL,2,'https://www.youtube.com/watch?v=iDDhI8Htji4',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,3),(2,'https://www.youtube.com/watch?v=t9uIMJRwGeo',NULL,NULL,'Another vídeo',NULL,NULL,'https://www.youtube.com/watch?v=t9uIMJRwGeo','anothar video',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL);
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
INSERT INTO `video_category` VALUES (1,1),(1,3);
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

-- Dump completed on 2018-03-06 10:23:53
