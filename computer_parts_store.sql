CREATE DATABASE  IF NOT EXISTS `computer_parts_store` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `computer_parts_store`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: computer_parts_store
-- ------------------------------------------------------
-- Server version	5.6.12-log

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
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answers` (
  `question_id` int(10) unsigned NOT NULL,
  `answer_numner` int(10) unsigned NOT NULL,
  `answer` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`question_id`,`answer_numner`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `audio_devices_specs`
--

DROP TABLE IF EXISTS `audio_devices_specs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audio_devices_specs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `upc` char(12) NOT NULL,
  `model_number` varchar(30) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `manufacturer` varchar(45) DEFAULT NULL,
  `power` varchar(10) DEFAULT NULL,
  `channels` varchar(10) DEFAULT NULL,
  `quantity` int(11) DEFAULT '0',
  `price` float DEFAULT '0',
  `rating` float DEFAULT '0',
  PRIMARY KEY (`id`,`upc`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `upc_UNIQUE` (`upc`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audio_devices_specs`
--

LOCK TABLES `audio_devices_specs` WRITE;
/*!40000 ALTER TABLE `audio_devices_specs` DISABLE KEYS */;
INSERT INTO `audio_devices_specs` VALUES (1,'917140603030','NS-PCS20','Insignia - 2.0 Stereo Computer Speaker System','Insignia',NULL,'2.0',12,19.99,0),(2,'532502391839','980-000417','Logitech - Z130 2.0 Speaker System','Logitech','2.5W','2.0',4,24.99,0),(3,'753928367991','COMPANION 2 SERIES III SYSTEM','Bose - Companion 2 Series III Multimedia Speaker System','Bose',NULL,'2.0',22,99.99,0),(4,'113103999526','KLIPSCH PRO','Klipsch - ProMedia 2.1 Speaker System','Klipsch','200W','2.1',2,139.99,0),(5,'450937980945','980-000430','Logitech - Z506 5.1 Surround Sound Speakers','Logitech','101W','5.1',9,69.99,0),(6,'249562549847','NS-PCS21','Insignia - 2.1 Speaker System','Insignia','12.8W','2.1',1,29.99,0),(7,'296506407774','JEMBEBLKAM','JBL - Jembe 2.0 Entertainment Speaker System','JBL','12W','2.0',33,59.99,0),(8,'841751495214','COMPANION 20','Bose - Companion 20 Multimedia Speaker System','Bose',NULL,'2.0',11,249.99,0),(9,'348883243705','980-000354','Logitech - Z323 Speaker System','Logitech',NULL,'2.1',7,69.99,0),(10,'013649112585','XD3','Cerwin Vega - 2.0 Powered Desktop Speaker','Cerwin Vega','30W','2.0',10,119.99,0);
/*!40000 ALTER TABLE `audio_devices_specs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cases_specs`
--

DROP TABLE IF EXISTS `cases_specs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cases_specs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `upc` char(12) NOT NULL,
  `model_number` varchar(30) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `manufacturer` varchar(45) DEFAULT NULL,
  `case_type` varchar(45) DEFAULT NULL,
  `drive_bays` varchar(50) DEFAULT NULL,
  `cooling_fans` varchar(45) DEFAULT NULL,
  `height` varchar(15) DEFAULT NULL,
  `width` varchar(15) DEFAULT NULL,
  `depth` varchar(15) DEFAULT NULL,
  `weight` varchar(15) DEFAULT NULL,
  `quantity` int(11) DEFAULT '0',
  `price` float DEFAULT '0',
  `rating` float DEFAULT '0',
  PRIMARY KEY (`id`,`upc`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `upc_UNIQUE` (`upc`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cases_specs`
--

LOCK TABLES `cases_specs` WRITE;
/*!40000 ALTER TABLE `cases_specs` DISABLE KEYS */;
INSERT INTO `cases_specs` VALUES (1,'314093624276','SOURCE 210ELITE BLACK','NZXT - Source 210 Elite ATX/Micro','NZXT','Mid-tower','3 External; 8 Internal','One 120mm; One 140mm','17.3 inches','7.6 inches','19.5 inches','14.3 lbs',7,49.99,0),(2,'932759372220','GUARDIAN 921RB-BL','NZXT - Crafted Series Guardian 921 RB','NZXT','Mid-tower','5 External; 4 Internal','3','18 inches','8.1 inches','20.5 inches','18 lbs',11,69.99,0),(3,'741512798231','RX-I','Thermaltake - Overseer System Cabinet','Thernaltake','Full-tower','9','3','21.0 inches','8.7 inches','22.8 inches','22.71 lbs',3,129.99,0),(4,'960960693109','CA-PH530-W1','NZXT - Phantom 530','NZXT','Full-tower','3 External; 6 Internal','One 200mm; one 140mm','22.5 inches','9.25 inches','21.4 inches','23.1 lbs',8,115.98,0),(5,'339878834845','RC-912-KKN1','Cooler Master - HAF91','Cooler Master','Mid-tower','4 External; 6 Internal','2','18.9 inches','9.1 inches','19.5 inches','16.5 lbs',22,59.99,0),(6,'692394982632','CC-9011011-WW','Corsair - Carbide Series 400R','Corsair','Mid-tower','4 External; 6 Internal','3','19.8 inches','8.1 inches','20.5 inches','15.6 lbs',1,99.99,0),(7,'699718448510','PHANTOM BLACK','NZXT - Phantom','NZXT','Full-tower',NULL,'Three 120mm; One 200mm','21.2 inches','8.7 inches','24.5 inches','24.2 lbs',9,119.99,0),(8,'817942524754','PHANTOM 410 RED','NZXT - Phantom 410','NZXT','Mid-tower','3 External; 6 Internal','One 120mm; One 140mm','20.3 inches','8.4 inches','20.9 inches','19.8 inches',5,99.99,0),(9,'895258665153','PHANTOM 820 GUNMETAL','NZXT - Phantom 820','NZXT','Full-tower','4 External; 6 Internal',NULL,'25.5 inches','9.2 inches','24 inches','32 lbs',10,219.99,0),(10,'742260511866','NSK4482B','Antec - Computer Case','Antec','Mid-tower','5 External; 3 Internal','1','16.6 inches','7.8 inches','16.5 inches','18 lbs',15,119.99,0);
/*!40000 ALTER TABLE `cases_specs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `current_orders`
--

DROP TABLE IF EXISTS `current_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `current_orders` (
  `order_id` int(10) unsigned NOT NULL,
  `upc` int(10) unsigned NOT NULL,
  `email` varchar(50) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `subtotal` float DEFAULT NULL,
  `tax` float DEFAULT NULL,
  `shipping` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  PRIMARY KEY (`order_id`,`upc`,`email`),
  KEY `email_idx` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `current_orders`
--

LOCK TABLES `current_orders` WRITE;
/*!40000 ALTER TABLE `current_orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `current_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disk_drives_specs`
--

DROP TABLE IF EXISTS `disk_drives_specs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disk_drives_specs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `upc` char(12) NOT NULL,
  `model_number` varchar(30) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `manufacturer` varchar(45) DEFAULT NULL,
  `media_supported` varchar(50) DEFAULT NULL,
  `read_speed` varchar(15) DEFAULT NULL,
  `write_speed` varchar(15) DEFAULT NULL,
  `height` varchar(15) DEFAULT NULL,
  `width` varchar(15) DEFAULT NULL,
  `depth` varchar(15) DEFAULT NULL,
  `weight` varchar(15) DEFAULT NULL,
  `quantity` int(11) DEFAULT '0',
  `price` float DEFAULT '0',
  `rating` float DEFAULT '0',
  PRIMARY KEY (`id`,`upc`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `upc_UNIQUE` (`upc`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disk_drives_specs`
--

LOCK TABLES `disk_drives_specs` WRITE;
/*!40000 ALTER TABLE `disk_drives_specs` DISABLE KEYS */;
INSERT INTO `disk_drives_specs` VALUES (1,'981184522557','GH24NS90','LG - Super-Multi 24x Internal Drive','LG','DVD; CD','16x DVD; 48x CD','16x DVD; 48x CD','1.6 inches','5.7 inches','6.5 inches','1.8 lbs',4,39.99,0),(2,'746099014346','DRW-24B3ST','Asus - Internal DVD-Writer Drive','Asus','DVD; CD','16x DVD; 48x CD','24x DVD; 48x CD','1.6 inches','5.7 inches','6.7 inches','1.43 lbs',8,27.94,0),(3,'508462381942','SH-224DB','Samsung Internal DVD-Writer Drive','Samsung','DVD; CD','16x DVD; 48x CD','24x DVD; 48x CD','1.6 inches','5.7 inches','6.6 inches','1.5 lbs',10,15.99,0),(4,'748273673077','343791-B21','HP - Internal CD/DVD Combo Drive','HP','DVD; CD','24x CD','8x DVD; 24x CD','1.6 inches','5.7 inches','6.7 inches','1.7 lbs',14,129.99,0),(5,'028565261535','BDR-2206','Pioneer - Write DVD Internal Blu-ray Writer Drive','Pioneer','DVD; CD','16x DVD; 40x CD','16x DVD; 40x CD','1.7 inches','5.8 inches','7.1 inches','1.8 lbs',1,147.99,0),(6,'941783065156','447328-B21','HP - DVD Internal DVD-Writer Drive','HP','DVD; CD','16x DVD; 40x CD','16x DVD; 40x CD','1.63 inches','5.7 inches','7.9 inches','2.0 lbs',13,71.99,0),(7,'768934499035','331346-B21','HP - Internal DVD-Reader Drive','HP','DVD; CD','16x DVD; 48x CD',NULL,'1.7 inches','5.9 inches','8.2 inches','1.9 lbs',18,129.99,0),(8,'322193164371','447326-B21','HP - DVD-ROM Drive','HP','DVD; CD','16x DVD; 40x CD',NULL,'1.6 inches','5.7 inches','7.9 inches','1.6 lbs',17,129.99,0),(9,'331406930270','BDR-2208B5PK','Pioneer - Internal Blu-ray Disc','Pioneer','DVD; CD','8x DVD; 40x CD','8x DVD; 24x CD','1.7 inches','5.8 inches','7.1 inches','1.6 lbs',9,129.99,0),(10,'237196904346','43N3292','Lenovo Slim CD/DVD Combo Drive','Lenovo','DVD; CD','8x DVD; 24x CD','24x CD','0.4 inches','5 inches','5. inches','4.94 oz',3,86.99,0);
/*!40000 ALTER TABLE `disk_drives_specs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hard_drives_specs`
--

DROP TABLE IF EXISTS `hard_drives_specs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hard_drives_specs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `upc` char(12) NOT NULL,
  `model_number` varchar(30) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `manufacturer` varchar(45) DEFAULT NULL,
  `capacity` varchar(10) DEFAULT NULL,
  `connectivity` varchar(15) DEFAULT NULL,
  `height` varchar(15) DEFAULT NULL,
  `width` varchar(15) DEFAULT NULL,
  `depth` varchar(15) DEFAULT NULL,
  `weight` varchar(15) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `quantity` int(11) DEFAULT '0',
  `price` float DEFAULT '0',
  `rating` float DEFAULT '0',
  PRIMARY KEY (`id`,`upc`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `upc_UNIQUE` (`upc`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hard_drives_specs`
--

LOCK TABLES `hard_drives_specs` WRITE;
/*!40000 ALTER TABLE `hard_drives_specs` DISABLE KEYS */;
INSERT INTO `hard_drives_specs` VALUES (1,'788197088710','STDR1000100','Seagate - Backup Plus Slim External Hard Drive','Seagate','1TB','USB 2.0|USB 3.0','4.5 inches','3 inches','0.5 inches','5.6 ounces','external_storage',5,89.99,0),(2,'938618267419','WDBZFP0010BBK-NESN','WD - My Passport Ultra External Hard Drive','WD','1TB','USB 3.0','4.4 inches','3.2 inches','0.6 inches','5.4 ounces','external_storage',13,89.99,0),(3,'289497211406','HDTC720XK3C1','Toshiba - Canvio Connect External Hard Drive','Toshiba','2TB','USB 2.0|USB 3.0','0.8 inches','3.1 inches','4.4 inches','8.1 ounces','external_storage',8,119.99,0),(4,'062623782530','HDTD205XK3D1','Toshiba - Canvio Slim II External Hard Drive','Toshiba','500GB','USB 2.0|USB 3.0','0.4 inches','3 inches','4.2 inches','4.4 ounces','external_storage',18,59.99,0),(5,'598462817090','WDBPGC5000ABK-NESN','WD - My Passport Ultra External Hard Drive','WD','500GB','USB 3.0','0.5 inches','3.2 inches','4.3 inches','4.8 ounces','external_storage',22,69.99,0),(6,'330359398803','STCD500102','Seagate - Slim External Hard Drive','Seagate','500GB','USB 2.0|USB 3.0','4.5 inches','3 inches','0.4 inches','5.3 ounces','external_storage',1,69.99,0),(7,'354801120607','STDR2000100','Seagate - Backup Plus External Hard Drive','Seagate','2TB','USB 2.0|USB 3.0','4.5 inches','3 inches','0.5 inches','4.8 ounces','external_storage',11,149.99,0),(8,'663444910925','WDBFJK0030HBK-NESN','WD - My Book External Hard Drive','WD','3TB','USB 3.0','6.7 inches','1.9 inches','5.5 inches','2.2 lbs','external_storage',15,139.99,0),(9,'982488131586','WDBFJK0040HBK-NESN','WD - My Book External Hard Drive','WD','4TB','USB 3.0','6.7 inches','1.9 inches','5.5 inches','2.3 lbs','external_storage',4,179.99,0),(10,'990174053204','HDWC130XK3J1','Toshiba - Canvio External Hard Drive','Toshiba','3TB','USB 3.0','6.6 inches','1.7 inches','5.1 inches','2.2 lbs','external_storage',10,119.99,0),(11,'953535355844','ST310005N1A1AS-RK','Seagate - Internal Serial ATA Hard Drive','Seagate','1TB','Serial ATA','5.75 inches','4 inches','0.5 inches','14.4 ounces','hard_drives',4,69.99,0),(12,'828057211933','WDBH2D0010HNC-NRSN','WD - Mainstream Internal Serial ATA Hard Drive','WD','1TB','Serial ATA','1 inches','4 inches','5.8 inches','1.5 lbs','hard_drives',10,69.99,0),(13,'221074893050','ST3500641AS-RK','Seagate - Barracuda Internal Serial ATA Hard Drive','Seagate','500GB','Serial ATA','1 inches','4 inches','5.8 inches','1.6 lbs','hard_drives',13,64.99,0),(14,'266043032497','WDBMYH3200ANC-NRSN','WD - Mainstream Internal Serial ATA Hard Drive','WD','320GB','Serial ATA','0.4 inches','2.75 inches','3.9 inches','4.3 ounces','hard_drives',18,49.99,0),(15,'555413386388','STBD2000101','Seagate - Barracuda Internal Serial ATA Hard Drive','Seagate','2TB','Serial ATA','1 inches','4 inches','5.8 inches','1.5 lbs','hard_drives',22,104.99,0),(16,'692225505815','ST903203N1A','Seagate - Internal Serial ATA Hard Drive','Seagate','320GB','Serial ATA','0.4 inches','2.75 inches','3.9 inches','4.3 ounces','hard_drives',1,54.99,0),(17,'388411912493','WDBH2D0020HNC-NRSN','WD - Mainstream Internal Serial ATA Hard Drive','WD','2TB','Serial ATA','1 inches','4 inches','5.8 inches','1.5 lbs','hard_drives',29,99.99,0),(18,'156396561740','STBD3000100','Seagate - Barracuda Internal Serial ATA Hard Drive','Seagate','3TB','Serial ATA','1 inches','4 inches','5.8 inches','1.4 lbs','hard_drives',3,134.99,0),(19,'390056350246','WDBH2D5000ENC-NRSN','WD - Mainstream Internal Serial ATA Hard Drive','WD','500GB','Serial ATA','1 inches','4 inches','5.8 inches','1.5 lbs','hard_drives',8,69.99,0),(20,'603084577589','WDBSLA0020HNC-NRSN','WD - Performance Internal Serial ATA Hard Drive','WD','2TB','Serial ATA','1 inches','4 inches','5.8 inches','1.5 lbs','hard_drives',11,164.99,0),(21,'569835797801','MZ-7TE250BW','Samsung - 840 EVO ','Samsung','250GB','Serial ATA III','0.3 inches','2.75 inches','3.9 inches','14 ounces','ssds',8,189.99,0),(22,'419867533731','BBSSDSC240A4K5','Intel - 530 Series','Intel','240GB','Serial ATA','0.3 inches','2.5 inches','5.7 inches','12 ounces','ssds',6,219.99,0),(23,'713184859718','HDTS312XZSTA','Toshiba - Q Series Pro','Toshiba','128G','Serial ATA','0.3 inches','2.75 inches','3.9 inches','1.7 ounces','ssds',15,99.99,0),(24,'502628309078','HDTS325XZSTA','Toshiba - Q Series Pro','Toshiba','256GB','Serial ATA','0.3 inches','2.75 inches','3.9 inches','1.9 ounces','ssds',11,189.99,0),(25,'358375978463','SSD9SC120GMDF-RB','PNY - XLR8','PNY','120GB','Serial ATA III','0.4 inches','2.8 inches','3.9 inches','2.8 ounces','ssds',23,69.99,0),(26,'102005599491','BBSSDSC180A4K5','Intel - 530 Series','Intel','180GB','Serial ATA','0.3 inches','2.5 inches','5.7 inches','12 ounces','ssds',17,169.99,0),(27,'389087246481','MZ-7PD256BW','Samsung - 840 Pro','Samsung','256GB','Serial ATA','0.3 inches','2.5 inches','5.7 inches','3.2 ounces','ssds',8,209.95,0),(28,'909962479554','M500','Crucial - 2.5\" Internal Solid State Drive','Crucial','240GB','Serial ATA','0.3 inches','2.5 inches','5.7 inches','3.0 ounces','ssds',7,129.99,0),(29,'433387437950','MZ-7TE500LW','Samsung - 840 EVO','Samsung','500GB','Serial ATA III','0.3 inches','2.75 inches','3.9 inches','3.2 ounces','ssds',20,499.99,0),(30,'547112596560','SH103S3B/240G','Kingston Technology - HyperX 3K','Kingston','240GB','Serial ATA III','0.4 inches','2.8 inches','3.9 inches','2.8 ounces','ssds',11,239.99,0);
/*!40000 ALTER TABLE `hard_drives_specs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keyboards_specs`
--

DROP TABLE IF EXISTS `keyboards_specs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `keyboards_specs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `upc` char(12) NOT NULL,
  `model_number` varchar(30) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `manufacturer` varchar(45) DEFAULT NULL,
  `palm_rest` varchar(1) DEFAULT NULL,
  `quantity` int(11) DEFAULT '0',
  `price` float DEFAULT '0',
  `rating` float DEFAULT '0',
  PRIMARY KEY (`id`,`upc`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `upc_UNIQUE` (`upc`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keyboards_specs`
--

LOCK TABLES `keyboards_specs` WRITE;
/*!40000 ALTER TABLE `keyboards_specs` DISABLE KEYS */;
INSERT INTO `keyboards_specs` VALUES (1,'403863974309','MK320','Logitech - Wireless Desktop Keyboard and Mouse','Logitech','N',4,39.99,0),(2,'255898603849','920-003070','Logitech - K400 Wireless Keyboard','Logitech','N',11,39.99,0),(3,'583726911227','MC184LL/B','Apple - Wireless Keyboard','Apple','N',22,69.99,0),(4,'641018216973','DX-WRK1401','Dynex - USB Keyboard','Dynex','N',1,9.99,0),(5,'846103447891','K3500','HP - Wireless Keyboard','HP','N',13,29.99,0),(6,'483891903042','DX-WLC1401','Dynex - Wireless Keyboard and Wireless Mouse','Dynes','N',10,29.99,0),(7,'110366410820','920-004088','Logitech - K360 Wireless Keyboard','Logitech','N',8,29.99,0),(8,'121522927341','L3V-00001','Microsoft - Sculpt Comfort Wireless Keyboard and Mouse','Microsoft','Y',17,79.99,0),(9,'582624314100','B2M-00012','Microsoft - Natural Ergonomic Keyboard','Microsoft','Y',3,49.99,0),(10,'758601404569','K4000','HP - Bluetooth Wireless Keyboard','HP','N',7,49.99,0);
/*!40000 ALTER TABLE `keyboards_specs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `memory_specs`
--

DROP TABLE IF EXISTS `memory_specs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `memory_specs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `upc` char(12) NOT NULL,
  `model_number` varchar(30) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `manufacturer` varchar(45) DEFAULT NULL,
  `capacity` varchar(10) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `pin_configuration` varchar(20) DEFAULT NULL,
  `quantity` int(11) DEFAULT '0',
  `price` float DEFAULT '0',
  `rating` float DEFAULT '0',
  PRIMARY KEY (`id`,`upc`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `upc_UNIQUE` (`upc`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `memory_specs`
--

LOCK TABLES `memory_specs` WRITE;
/*!40000 ALTER TABLE `memory_specs` DISABLE KEYS */;
INSERT INTO `memory_specs` VALUES (1,'051280138282','MD2048SD2-800','PNY - Optima','PNY','2GB','PC2-6400 DDR2','240-pin DIMM',6,39.99,0),(2,'375810824808','MN4096SD3-1333','PNY - SDRAM','PNY','4GB','PC3-10666 DDR3','204-pin SoDIMM',11,44.99,0),(3,'559502911619','MN8192KD31333AP','PNY - Optima','PNY','8GB','PC3-10666 DDR3','240-pin DIMM',2,74.99,0),(4,'522214049122','CMSO8GX3M2A1333C9','Corsair - 2 Pack','Corsair','8GB','DDR3','204-pin SoDIMM',20,79.99,0),(5,'327332181118','CMSX16GX3M2A1600C10','Corsair - Vengeance','Corsair','16GB','DDR3','204-pin SoDIMM',10,169.99,0),(6,'242066224606','KHX1600C9D3B1/4G','Kingston - HyperX blu','Kingston','4GB','DDR3','240-pin DIMM',1,44.99,0),(7,'412560231474','MD4096KD2-800','PNY - Optima 2-Pack','PNY','4GB','PC2-6400 DDR2','240-pin DIMM',13,59.99,0),(8,'452374510501','CT25664BA1339','Crucial - Memory Module','Crucial','2GB','PC3-10600 DDR3','240-pin SDRAM DIMM',8,22.94,0),(9,'898429769115','KVR13N9S8/4','Kingston Technology - Non-ECC Memory','Kingston','4GB','PC3-10600 DDR3','240-pin DIMM',7,36.95,0),(10,'089297398488','CM10246412800SOX20240','CMS - Apple Mac Memory','CMS','16GB','PC3-12800 DDR3','240-pin DIMM',14,175,0);
/*!40000 ALTER TABLE `memory_specs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monitors_specs`
--

DROP TABLE IF EXISTS `monitors_specs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `monitors_specs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `upc` char(12) NOT NULL,
  `model_number` varchar(30) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `manufacturer` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `screen_size` varchar(10) DEFAULT NULL,
  `resolution` varchar(10) DEFAULT NULL,
  `input_types` varchar(20) DEFAULT NULL,
  `height` varchar(15) DEFAULT NULL,
  `width` varchar(15) DEFAULT NULL,
  `weight` varchar(15) DEFAULT NULL,
  `quantity` int(11) DEFAULT '0',
  `price` float DEFAULT '0',
  `rating` float DEFAULT '0',
  PRIMARY KEY (`id`,`upc`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `upc_UNIQUE` (`upc`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `monitors_specs`
--

LOCK TABLES `monitors_specs` WRITE;
/*!40000 ALTER TABLE `monitors_specs` DISABLE KEYS */;
INSERT INTO `monitors_specs` VALUES (1,'630415913783','S200HQL BD','Acer - 20\" LED HD Monitor','Acer','LED','20\"','1600x900','VGA','13.1 inches','18.3 inches','5.1 lbs',8,129.99,0),(2,'728352743019','S22C300HS','Samsung - 21.5\" LED HD Monitor','Samsung','LED','21.5\"','1920x1080','VGA; HDMI','15.7 inches','20.1 inches','6.4 lbs',18,169.99,0),(3,'093789111058','S2440L','Dell - 24\" LED HD Monitor','Dell','LED','24\"','1920x1080','VGA; HDMI','16.5 inches','22.3 inches','10.9 lbs',4,249.99,0),(4,'958824534729','I2269VW','AOC - 21.5\" IPS LED HD Monitor','AOC','LED','21.5\"','1920x1080','VGA; DVI','15.6 inches','19.6 inches','7.7 lbs',20,149.99,0),(5,'885687124065','22bw','HP - Pavilion 21.5\" IPS LED HD Monitor','HP','LED','21.5\"','1920x1080','VGA; DVI; HDMI','15 inches','21 inches','10 lbs',17,179.99,0),(6,'951134090923','H236HL BID','Acer - H6 Series 23\" IPS LED HD Monitor','Acer','LED','23\"','1920x1080','VGA; DVI; HDMI','15.9 inches','20.9 inches','7.9 lbs',1,179.99,0),(7,'942191869826','S27C390H','Samsung - 27\" LED HD Monitor','Samsung','LED','27\"','1920x1080','VGA; HDMI','18.5 inches','25.3 inches','9.2 lbs',9,279.99,0),(8,'667753879007','VN247HP','Asus - 23.6\" LED HD Monitor','Asus','LED','23.6\"','1920x1080','VGA; DVI; HDMI','15.5 inches','21.6 inches','8.2 lbs',21,189.99,0),(9,'795492234843','T232HL ABMJJZ','Acer - 23\" IPS LED HD Touch-Screen Monitor','Acer','LED','23\"','1920x1080','VGA; HDMI','17.9 inches','21.5 inches','12.6 lbs',11,449.99,0),(10,'868294066763','E2060SWD','AOC - 19.5\" LED HD Monitor','AOC','LED','19.5\"','1600x900','VGA; DVI','14.1 inches','18.8 inches','6.1 lbs',2,109.99,0);
/*!40000 ALTER TABLE `monitors_specs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `motherboards_specs`
--

DROP TABLE IF EXISTS `motherboards_specs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `motherboards_specs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `upc` char(12) NOT NULL,
  `model_number` varchar(30) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `manufacturer` varchar(45) DEFAULT NULL,
  `multiple_gpu_supported` varchar(20) DEFAULT NULL,
  `memory_slots` int(11) DEFAULT NULL,
  `maximum_memory` varchar(10) DEFAULT NULL,
  `pci_slots` varchar(30) DEFAULT NULL,
  `usb_ports` varchar(30) DEFAULT NULL,
  `ps2_ports` varchar(30) DEFAULT NULL,
  `width` varchar(15) DEFAULT NULL,
  `depth` varchar(15) DEFAULT NULL,
  `quantity` int(11) DEFAULT '0',
  `price` float DEFAULT '0',
  `rating` float DEFAULT '0',
  PRIMARY KEY (`id`,`upc`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `upc_UNIQUE` (`upc`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `motherboards_specs`
--

LOCK TABLES `motherboards_specs` WRITE;
/*!40000 ALTER TABLE `motherboards_specs` DISABLE KEYS */;
INSERT INTO `motherboards_specs` VALUES (1,'984825424845','GA-Z87X-UD3H','GIGABYTE - ATX Motherboard','GIGABYTE','N',4,'32GB','4','6','Yes','12 inches','9 inches',5,169.99,0),(2,'144065846337','Z87-PLUS','Asus - Desktop Motherboard','Asus','CrossFireX, SLI',4,'32GB','5','6','Yes','12 inches','9.2 inches',13,160.85,0),(3,'272482002423','Z87-G45 GAMING','MSI - Desktop Motherboard','MSI','CrossFireX, SLI',4,'64GB','7','6','Yes','12 inches','9.6 inches',15,158.85,0),(4,'395392964480','MAXIMUS VI HERO','Asus - Desktop Motherboard','Asus','CrossFireX, SLI',4,'32GB','6','8','Yes','12 inches','9.6 inches',3,200,0),(5,'080774826382','SABERTOOTH990FXR2.0','Asus - Sabertooth','Asus','N',4,'32GB','4','10','Yes','12 inches','9.2 inches',18,190.99,0),(6,'899654232663','GA-F2A88X-UP','Gigabyte - Ultra Durable 5 Plus','Gigabyte','Hybrid CrossFireX',4,'64GB','1','6','Yes','12 inches','9.6 inches',1,110.99,0),(7,'547205891226','P8Z77-V','Asus - ATX Motherboard','Asus','CrossFireX, SLI',4,'32GB','2','6','1','12 inches','9.9 inches',17,165.99,0),(8,'182703908300','P8B75-M/CSM','Asus - Micro ATX Motherboard','Asus','CrossFireX, SLI',4,'32GB','1','6','Yes','12 inches','9.6 inches',4,79.99,0),(9,'397227395576','G1.Sniper M5','Gigabyte - Ultra Durable 5 Plus','Gigabyte','CrossFireX, SLI',4,'32GB','4','6','Yes','9.6 inches','9.6 inches',11,200.5,0),(10,'703147012578','990FXA-GD80V2','MSI - Desktop Motherboard','MSI','CrossFireX, SLI',4,'32GB','1','6','Yes','12 inches','9.6 inches',8,171.99,0);
/*!40000 ALTER TABLE `motherboards_specs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_information`
--

DROP TABLE IF EXISTS `payment_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `card_type` varchar(10) DEFAULT NULL,
  `card_number` int(16) DEFAULT NULL,
  `name_on_card` varchar(100) DEFAULT NULL,
  `security_code` char(3) DEFAULT NULL,
  PRIMARY KEY (`id`,`email`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `email_idx` (`email`),
  CONSTRAINT `email` FOREIGN KEY (`email`) REFERENCES `user` (`email`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_information`
--

LOCK TABLES `payment_information` WRITE;
/*!40000 ALTER TABLE `payment_information` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment_information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `printers_specs`
--

DROP TABLE IF EXISTS `printers_specs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `printers_specs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `upc` char(12) NOT NULL,
  `model_number` varchar(30) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `manufacturer` varchar(45) DEFAULT NULL,
  `cartridges` varchar(40) DEFAULT NULL,
  `wireless` varchar(5) DEFAULT NULL,
  `height` varchar(15) DEFAULT NULL,
  `width` varchar(15) DEFAULT NULL,
  `depth` varchar(15) DEFAULT NULL,
  `weight` varchar(15) DEFAULT NULL,
  `quantity` int(11) DEFAULT '0',
  `price` float DEFAULT '0',
  `rating` float DEFAULT '0',
  PRIMARY KEY (`id`,`upc`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `upc_UNIQUE` (`upc`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `printers_specs`
--

LOCK TABLES `printers_specs` WRITE;
/*!40000 ALTER TABLE `printers_specs` DISABLE KEYS */;
INSERT INTO `printers_specs` VALUES (1,'238978325024','XP-410 - C11CC87201','Epson - Expression Home XP-410','Epson','1 Black, 1 Cyan, 1 Magenta, 1 Yellow','Yes','11 inches','15.4 inches','20.8 inches','9 lbs',8,99.99,0),(2,'037242441440','A9T80A','HP - Envy 4500','HP','1 Black, 1 Tricolor','Yes','4.7 inches','17.5 inches','13.2 inches','12.3 lbs',13,99.99,0),(3,'208609417443','6520','HP - Photosmart 6520','HP','1 Black, 1 Cyan, 1 Magenta, 1 Yellow','Yes','17.2 inches','17.3 inches','22.2 inches','13.7 lbs',1,149.99,0),(4,'951631378633','7520','HP - Photosmart 7520','HP','1 Black, 1 Cyan, 1 Magenta, 1 Yellow','Yes','8.7 inches','17.9 inches','21.7 inches','23.4 lbs',18,199.99,0),(5,'208503198140','OJPro 8600','HP - Officejet Pro 8600','HP','1 Black, 1 Cyan, 1 Magenta, 1 Yellow','Yes','11.8 inches','19.4 inches','16.3 inches','26.4 lbs',4,199.99,0),(6,'442196628299','OFFICEJET 4630','HP - Officejet','HP','1 Black, 1 Tricolor','Yes','7.4 inches','17.6 inches','13.1 inches','16.7 lbs',9,99.99,0),(7,'116342689751','ENVY 5530','HP - Envy 5530','HP','1 Black, 1 Tricolor','Yes','4.7 inches','17.5 inches','13.2 inches','12.3 lbs',14,129.99,0),(8,'577533118081','CZ155A#B1H','HP - Officejet 660','HP','1 Black, 1 Cyan, 1 Magenta, 1 Yellow','Yes','9.9 inches','18.3 inches','21.9 inches','17.2 lbs',3,149.99,0),(9,'676353817297','DESKJET 2540','HP - Deskjet','HP','1 Black, 1 Tricolor','Yes','9.9 inches','16.7 inches','21.7 inches','7.9 lbs',12,79.99,0),(10,'285998533868','MX452','Canon - PIXMA MX 452','Canon','3 Black, 2 Color','Yes','7.9 inches','18.1 inches','15.2 inches','19 lbs',4,99.99,0);
/*!40000 ALTER TABLE `printers_specs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `processors_specs`
--

DROP TABLE IF EXISTS `processors_specs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `processors_specs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `upc` char(12) NOT NULL,
  `model_number` varchar(30) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `manufacturer` varchar(45) DEFAULT NULL,
  `number_of_cores` int(11) DEFAULT NULL,
  `clock_speed` varchar(10) DEFAULT NULL,
  `quantity` int(11) DEFAULT '0',
  `price` float DEFAULT '0',
  `rating` float DEFAULT '0',
  PRIMARY KEY (`id`,`upc`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `upc_UNIQUE` (`upc`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `processors_specs`
--

LOCK TABLES `processors_specs` WRITE;
/*!40000 ALTER TABLE `processors_specs` DISABLE KEYS */;
INSERT INTO `processors_specs` VALUES (1,'031790888857','BX80646I74770K','Intel - Core i7-4770K','Intel',4,'3.5GHz',5,349.99,0),(2,'080895089725','BX80646I54670K','Intel - Core i5-4670K','Intel',4,'3.4GHz',2,249.99,0),(3,'325810731231','FX-8350','AMD - Socket AM3','AMD',8,'4GHz',13,200,0),(4,'519029564436','A10-5800K','AMD - Socket FM2','AMD',4,'3.8GHz',9,131.99,0),(5,'641831305975','BX80646I54570','Intel - Core i5-4570','Intel',4,'3.2GHz',14,196.99,0),(6,'251094082084','X5650','HP - Intel Xeon','HP',6,'2.66GHz',7,585.99,0),(7,'429147053335','40K2519','IBM - Intel Xeon ','IBM',1,'3.8GHz',11,389.4,0),(8,'746166240653','8216','HP - AMD Opteron','HP',2,'2.4GHz',1,129.95,0),(9,'821993860636','E7340','HP - Intel Xeon MP','HP',4,'2.4GHz',14,768,0),(10,'918037000157','L5240','HP - Intel Xeon DP','HP',2,'3GHz',3,129.99,0);
/*!40000 ALTER TABLE `processors_specs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_reviews`
--

DROP TABLE IF EXISTS `product_reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_reviews`
--

LOCK TABLES `product_reviews` WRITE;
/*!40000 ALTER TABLE `product_reviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions_answers`
--

DROP TABLE IF EXISTS `questions_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions_answers`
--

LOCK TABLES `questions_answers` WRITE;
/*!40000 ALTER TABLE `questions_answers` DISABLE KEYS */;
/*!40000 ALTER TABLE `questions_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_cart`
--

DROP TABLE IF EXISTS `shopping_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_cart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `upc` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`email`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `email_idx` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_cart`
--

LOCK TABLES `shopping_cart` WRITE;
/*!40000 ALTER TABLE `shopping_cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` char(102) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `middleInitial` char(1) DEFAULT NULL,
  `lastName` varchar(30) NOT NULL,
  `homePhone` varchar(15) DEFAULT NULL,
  `cellPhone` varchar(15) DEFAULT NULL,
  `active` char(32) DEFAULT NULL,
  `billStreetAddress` varchar(100) NOT NULL,
  `billCity` varchar(50) NOT NULL,
  `billState` char(2) NOT NULL,
  `billZipcode` varchar(10) NOT NULL,
  `shipStreetAddress` varchar(100) NOT NULL,
  `shipCity` varchar(50) NOT NULL,
  `shipState` char(2) NOT NULL,
  `shipZipcode` varchar(10) NOT NULL,
  PRIMARY KEY (`id`,`email`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video_cards_specs`
--

DROP TABLE IF EXISTS `video_cards_specs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video_cards_specs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `upc` char(12) NOT NULL,
  `model_number` varchar(30) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `manufacturer` varchar(45) DEFAULT NULL,
  `slot_type` varchar(30) DEFAULT NULL,
  `output_types` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT '0',
  `price` float DEFAULT '0',
  `rating` float DEFAULT '0',
  PRIMARY KEY (`id`,`upc`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `upc_UNIQUE` (`upc`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video_cards_specs`
--

LOCK TABLES `video_cards_specs` WRITE;
/*!40000 ALTER TABLE `video_cards_specs` DISABLE KEYS */;
INSERT INTO `video_cards_specs` VALUES (1,'033121700247','VCGGT6302XPB','PNY - GeForce GT 630','PNY','PCI Express','HDMI; DVI; VGA',12,99.99,0),(2,'240478439816','R5230ACLHR','XFX - Core Edition Radeon','XFX','PCI Express','HDMI; DVI; VGA',4,49.99,0),(3,'966084824029','VCGGTX650XPB','PNY - XLR8 GeForce GTX 650','PNY','PCI Express','HDMI; DVI',6,159.99,0),(4,'310064315011','900120052500000','NVIDIA - GeForce GTX 770','NVIDIA','PCI','HDMI; DVI',11,379.99,0),(5,'669459135508','02G-P4-3769-KB','EVGA - NVIDIA GeForce GTX 760','NVIDIA','PCI Express','HDMI; DVI',14,299.99,0),(6,'086429566733','R9-270X-CDFR','XFX - Radeon R9 270X','XFX','PCI Express 3.0','HDMI; DVI',1,249.99,0),(7,'010079795943','900120042510000','NVIDIA - GeForce GTX 760','NVIDIA','PCI Express','HDMI; DVI',7,299.99,0),(8,'156102241006','BB61TGS4HX2LTX','Galaxy - GeForce GT 610 GC','NVIDIA','PCI Express','HDMI; DVI; VGA',19,49.99,0),(9,'355697406613','64TGF8HX6FTZ','Galaxy - GeForce GT 640','NVIDIA','PCI Express 3.0','HDMI; DVI; VGA',3,99.99,0),(10,'888300786827','02G-P4-3059-KB','EVGA - GeForce GTX 650 Ti','NVIDIA','PCI Express','HDMI; DVI',10,210.99,0);
/*!40000 ALTER TABLE `video_cards_specs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-04-16 20:23:25