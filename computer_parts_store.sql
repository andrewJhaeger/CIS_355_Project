-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 19, 2014 at 11:32 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `computer_parts_store`
--
CREATE DATABASE IF NOT EXISTS `computer_parts_store` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `computer_parts_store`;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` int(10) unsigned NOT NULL,
  `answer` varchar(2000) DEFAULT NULL,
  `answered_by` varchar(30) NOT NULL,
  PRIMARY KEY (`id`,`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- Table structure for table `audio_devices_specs`
--

CREATE TABLE IF NOT EXISTS `audio_devices_specs` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `audio_devices_specs`
--

INSERT INTO `audio_devices_specs` (`id`, `upc`, `model_number`, `product_name`, `manufacturer`, `power`, `channels`, `quantity`, `price`, `rating`) VALUES
(1, '917140603030', 'NS-PCS20', 'Insignia - 2.0 Stereo Computer Speaker System', 'Insignia', 'N/A', '2.0', 12, 19.99, 4.4),
(2, '532502391839', '980-000417', 'Logitech - Z130 2.0 Speaker System', 'Logitech', '2.5W', '2.0', 4, 24.99, 3.8),
(3, '753928367991', 'COMPANION 2 SERIES III SYSTEM', 'Bose - Companion 2 Series III Multimedia Speaker System', 'Bose', 'N/A', '2.0', 22, 99.99, 4.5),
(4, '113103999526', 'KLIPSCH PRO', 'Klipsch - ProMedia 2.1 Speaker System', 'Klipsch', '200W', '2.1', 2, 139.99, 3.8),
(5, '450937980945', '980-000430', 'Logitech - Z506 5.1 Surround Sound Speakers', 'Logitech', '101W', '5.1', 9, 69.99, 4.8),
(6, '249562549847', 'NS-PCS21', 'Insignia - 2.1 Speaker System', 'Insignia', '12.8W', '2.1', 1, 29.99, 4.6),
(7, '296506407774', 'JEMBEBLKAM', 'JBL - Jembe 2.0 Entertainment Speaker System', 'JBL', '12W', '2.0', 33, 59.99, 4.5),
(8, '841751495214', 'COMPANION 20', 'Bose - Companion 20 Multimedia Speaker System', 'Bose', 'N/A', '2.0', 11, 249.99, 4.8),
(9, '348883243705', '980-000354', 'Logitech - Z323 Speaker System', 'Logitech', 'N/A', '2.1', 7, 69.99, 4.2),
(10, '113649112585', 'XD3', 'Cerwin Vega - 2.0 Powered Desktop Speaker', 'Cerwin Vega', '30W', '2.0', 10, 119.99, 3.3);

-- --------------------------------------------------------

--
-- Table structure for table `cases_specs`
--

CREATE TABLE IF NOT EXISTS `cases_specs` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `cases_specs`
--

INSERT INTO `cases_specs` (`id`, `upc`, `model_number`, `product_name`, `manufacturer`, `case_type`, `drive_bays`, `cooling_fans`, `height`, `width`, `depth`, `weight`, `quantity`, `price`, `rating`) VALUES
(1, '314093624276', 'SOURCE 210ELITE BLACK', 'NZXT - Source 210 Elite ATX/Micro', 'NZXT', 'Mid-tower', '3 External; 8 Internal', 'One 120mm; One 140mm', '17.3 inches', '7.6 inches', '19.5 inches', '14.3 lbs', 7, 49.99, 4.3),
(2, '932759372220', 'GUARDIAN 921RB-BL', 'NZXT - Crafted Series Guardian 921 RB', 'NZXT', 'Mid-tower', '5 External; 4 Internal', '3', '18 inches', '8.1 inches', '20.5 inches', '18 lbs', 11, 69.99, 3.7),
(3, '741512798231', 'RX-I', 'Thermaltake - Overseer System Cabinet', 'Thernaltake', 'Full-tower', '9', '3', '21.0 inches', '8.7 inches', '22.8 inches', '22.71 lbs', 3, 129.99, 4),
(4, '960960693109', 'CA-PH530-W1', 'NZXT - Phantom 530', 'NZXT', 'Full-tower', '3 External; 6 Internal', 'One 200mm; one 140mm', '22.5 inches', '9.25 inches', '21.4 inches', '23.1 lbs', 8, 115.98, 3.9),
(5, '339878834845', 'RC-912-KKN1', 'Cooler Master - HAF91', 'Cooler Master', 'Mid-tower', '4 External; 6 Internal', '2', '18.9 inches', '9.1 inches', '19.5 inches', '16.5 lbs', 22, 59.99, 2.8),
(6, '692394982632', 'CC-9011011-WW', 'Corsair - Carbide Series 400R', 'Corsair', 'Mid-tower', '4 External; 6 Internal', '3', '19.8 inches', '8.1 inches', '20.5 inches', '15.6 lbs', 1, 99.99, 4.5),
(7, '699718448510', 'PHANTOM BLACK', 'NZXT - Phantom', 'NZXT', 'Full-tower', 'N/A', 'Three 120mm; One 200mm', '21.2 inches', '8.7 inches', '24.5 inches', '24.2 lbs', 9, 119.99, 3.4),
(8, '817942524754', 'PHANTOM 410 RED', 'NZXT - Phantom 410', 'NZXT', 'Mid-tower', '3 External; 6 Internal', 'One 120mm; One 140mm', '20.3 inches', '8.4 inches', '20.9 inches', '19.8 inches', 5, 99.99, 4.2),
(9, '895258665153', 'PHANTOM 820 GUNMETAL', 'NZXT - Phantom 820', 'NZXT', 'Full-tower', '4 External; 6 Internal', 'N/A', '25.5 inches', '9.2 inches', '24 inches', '32 lbs', 10, 219.99, 4.2),
(10, '742260511866', 'NSK4482B', 'Antec - Computer Case', 'Antec', 'Mid-tower', '5 External; 3 Internal', '1', '16.6 inches', '7.8 inches', '16.5 inches', '18 lbs', 15, 119.99, 4.1);

-- --------------------------------------------------------

--
-- Table structure for table `current_orders`
--

CREATE TABLE IF NOT EXISTS `current_orders` (
  `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `upc` int(10) unsigned NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_id`,`upc`,`user_id`),
  KEY `email_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `disk_drives_specs`
--

CREATE TABLE IF NOT EXISTS `disk_drives_specs` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `disk_drives_specs`
--

INSERT INTO `disk_drives_specs` (`id`, `upc`, `model_number`, `product_name`, `manufacturer`, `media_supported`, `read_speed`, `write_speed`, `height`, `width`, `depth`, `weight`, `quantity`, `price`, `rating`) VALUES
(1, '981184522557', 'GH24NS90', 'LG - Super-Multi 24x Internal Drive', 'LG', 'DVD; CD', '16x DVD; 48x CD', '16x DVD; 48x CD', '1.6 inches', '5.7 inches', '6.5 inches', '1.8 lbs', 4, 39.99, 4.3),
(2, '746099014346', 'DRW-24B3ST', 'Asus - Internal DVD-Writer Drive', 'Asus', 'DVD; CD', '16x DVD; 48x CD', '24x DVD; 48x CD', '1.6 inches', '5.7 inches', '6.7 inches', '1.43 lbs', 8, 27.94, 3.4),
(3, '508462381942', 'SH-224DB', 'Samsung Internal DVD-Writer Drive', 'Samsung', 'DVD; CD', '16x DVD; 48x CD', '24x DVD; 48x CD', '1.6 inches', '5.7 inches', '6.6 inches', '1.5 lbs', 10, 15.99, 3.1),
(4, '748273673077', '343791-B21', 'HP - Internal CD/DVD Combo Drive', 'HP', 'DVD; CD', '24x CD', '8x DVD; 24x CD', '1.6 inches', '5.7 inches', '6.7 inches', '1.7 lbs', 14, 129.99, 3),
(5, '128565261535', 'BDR-2206', 'Pioneer - Write DVD Internal Blu-ray Writer Drive', 'Pioneer', 'DVD; CD', '16x DVD; 40x CD', '16x DVD; 40x CD', '1.7 inches', '5.8 inches', '7.1 inches', '1.8 lbs', 1, 147.99, 4.6),
(6, '941783065156', '447328-B21', 'HP - DVD Internal DVD-Writer Drive', 'HP', 'DVD; CD', '16x DVD; 40x CD', '16x DVD; 40x CD', '1.63 inches', '5.7 inches', '7.9 inches', '2.0 lbs', 13, 71.99, 4.8),
(7, '768934499035', '331346-B21', 'HP - Internal DVD-Reader Drive', 'HP', 'DVD; CD', '16x DVD; 48x CD', 'N/A', '1.7 inches', '5.9 inches', '8.2 inches', '1.9 lbs', 18, 129.99, 4.1),
(8, '322193164371', '447326-B21', 'HP - DVD-ROM Drive', 'HP', 'DVD; CD', '16x DVD; 40x CD', 'N/A', '1.6 inches', '5.7 inches', '7.9 inches', '1.6 lbs', 17, 129.99, 4.8),
(9, '331406930270', 'BDR-2208B5PK', 'Pioneer - Internal Blu-ray Disc', 'Pioneer', 'DVD; CD', '8x DVD; 40x CD', '8x DVD; 24x CD', '1.7 inches', '5.8 inches', '7.1 inches', '1.6 lbs', 9, 129.99, 4.6),
(10, '237196904346', '43N3292', 'Lenovo Slim CD/DVD Combo Drive', 'Lenovo', 'DVD; CD', '8x DVD; 24x CD', '24x CD', '0.4 inches', '5 inches', '5. inches', '4.94 oz', 3, 86.99, 4.6);

-- --------------------------------------------------------

--
-- Table structure for table `hard_drives_specs`
--

CREATE TABLE IF NOT EXISTS `hard_drives_specs` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `hard_drives_specs`
--

INSERT INTO `hard_drives_specs` (`id`, `upc`, `model_number`, `product_name`, `manufacturer`, `capacity`, `connectivity`, `height`, `width`, `depth`, `weight`, `type`, `quantity`, `price`, `rating`) VALUES
(1, '788197088710', 'STDR1000100', 'Seagate - Backup Plus Slim External Hard Drive', 'Seagate', '1TB', 'USB 2.0|USB 3.0', '4.5 inches', '3 inches', '0.5 inches', '5.6 ounces', 'external_storage', 5, 89.99, 3.7),
(2, '938618267419', 'WDBZFP0010BBK-NESN', 'WD - My Passport Ultra External Hard Drive', 'WD', '1TB', 'USB 3.0', '4.4 inches', '3.2 inches', '0.6 inches', '5.4 ounces', 'external_storage', 13, 89.99, 4.9),
(3, '289497211406', 'HDTC720XK3C1', 'Toshiba - Canvio Connect External Hard Drive', 'Toshiba', '2TB', 'USB 2.0|USB 3.0', '0.8 inches', '3.1 inches', '4.4 inches', '8.1 ounces', 'external_storage', 8, 119.99, 4.4),
(4, '162623782530', 'HDTD205XK3D1', 'Toshiba - Canvio Slim II External Hard Drive', 'Toshiba', '500GB', 'USB 2.0|USB 3.0', '0.4 inches', '3 inches', '4.2 inches', '4.4 ounces', 'external_storage', 18, 59.99, 3),
(5, '598462817090', 'WDBPGC5000ABK-NESN', 'WD - My Passport Ultra External Hard Drive', 'WD', '500GB', 'USB 3.0', '0.5 inches', '3.2 inches', '4.3 inches', '4.8 ounces', 'external_storage', 22, 69.99, 3.9),
(6, '330359398803', 'STCD500102', 'Seagate - Slim External Hard Drive', 'Seagate', '500GB', 'USB 2.0|USB 3.0', '4.5 inches', '3 inches', '0.4 inches', '5.3 ounces', 'external_storage', 1, 69.99, 3.1),
(7, '354801120607', 'STDR2000100', 'Seagate - Backup Plus External Hard Drive', 'Seagate', '2TB', 'USB 2.0|USB 3.0', '4.5 inches', '3 inches', '0.5 inches', '4.8 ounces', 'external_storage', 11, 149.99, 4.2),
(8, '663444910925', 'WDBFJK0030HBK-NESN', 'WD - My Book External Hard Drive', 'WD', '3TB', 'USB 3.0', '6.7 inches', '1.9 inches', '5.5 inches', '2.2 lbs', 'external_storage', 15, 139.99, 3.2),
(9, '982488131586', 'WDBFJK0040HBK-NESN', 'WD - My Book External Hard Drive', 'WD', '4TB', 'USB 3.0', '6.7 inches', '1.9 inches', '5.5 inches', '2.3 lbs', 'external_storage', 4, 179.99, 5),
(10, '990174053204', 'HDWC130XK3J1', 'Toshiba - Canvio External Hard Drive', 'Toshiba', '3TB', 'USB 3.0', '6.6 inches', '1.7 inches', '5.1 inches', '2.2 lbs', 'external_storage', 10, 119.99, 4.5),
(11, '953535355844', 'ST310005N1A1AS-RK', 'Seagate - Internal Serial ATA Hard Drive', 'Seagate', '1TB', 'Serial ATA', '5.75 inches', '4 inches', '0.5 inches', '14.4 ounces', 'hard_drives', 4, 69.99, 3.8),
(12, '828057211933', 'WDBH2D0010HNC-NRSN', 'WD - Mainstream Internal Serial ATA Hard Drive', 'WD', '1TB', 'Serial ATA', '1 inches', '4 inches', '5.8 inches', '1.5 lbs', 'hard_drives', 10, 69.99, 3.6),
(13, '221074893050', 'ST3500641AS-RK', 'Seagate - Barracuda Internal Serial ATA Hard Drive', 'Seagate', '500GB', 'Serial ATA', '1 inches', '4 inches', '5.8 inches', '1.6 lbs', 'hard_drives', 13, 64.99, 4.5),
(14, '266043032497', 'WDBMYH3200ANC-NRSN', 'WD - Mainstream Internal Serial ATA Hard Drive', 'WD', '320GB', 'Serial ATA', '0.4 inches', '2.75 inches', '3.9 inches', '4.3 ounces', 'hard_drives', 18, 49.99, 4.8),
(15, '555413386388', 'STBD2000101', 'Seagate - Barracuda Internal Serial ATA Hard Drive', 'Seagate', '2TB', 'Serial ATA', '1 inches', '4 inches', '5.8 inches', '1.5 lbs', 'hard_drives', 22, 104.99, 4.4),
(16, '692225505815', 'ST903203N1A', 'Seagate - Internal Serial ATA Hard Drive', 'Seagate', '320GB', 'Serial ATA', '0.4 inches', '2.75 inches', '3.9 inches', '4.3 ounces', 'hard_drives', 1, 54.99, 4.5),
(17, '388411912493', 'WDBH2D0020HNC-NRSN', 'WD - Mainstream Internal Serial ATA Hard Drive', 'WD', '2TB', 'Serial ATA', '1 inches', '4 inches', '5.8 inches', '1.5 lbs', 'hard_drives', 29, 99.99, 4.2),
(18, '156396561740', 'STBD3000100', 'Seagate - Barracuda Internal Serial ATA Hard Drive', 'Seagate', '3TB', 'Serial ATA', '1 inches', '4 inches', '5.8 inches', '1.4 lbs', 'hard_drives', 3, 134.99, 3),
(19, '390056350246', 'WDBH2D5000ENC-NRSN', 'WD - Mainstream Internal Serial ATA Hard Drive', 'WD', '500GB', 'Serial ATA', '1 inches', '4 inches', '5.8 inches', '1.5 lbs', 'hard_drives', 8, 69.99, 3.5),
(20, '603084577589', 'WDBSLA0020HNC-NRSN', 'WD - Performance Internal Serial ATA Hard Drive', 'WD', '2TB', 'Serial ATA', '1 inches', '4 inches', '5.8 inches', '1.5 lbs', 'hard_drives', 11, 164.99, 4.5),
(21, '569835797801', 'MZ-7TE250BW', 'Samsung - 840 EVO ', 'Samsung', '250GB', 'Serial ATA III', '0.3 inches', '2.75 inches', '3.9 inches', '14 ounces', 'ssds', 8, 189.99, 4.5),
(22, '419867533731', 'BBSSDSC240A4K5', 'Intel - 530 Series', 'Intel', '240GB', 'Serial ATA', '0.3 inches', '2.5 inches', '5.7 inches', '12 ounces', 'ssds', 6, 219.99, 3.8),
(23, '713184859718', 'HDTS312XZSTA', 'Toshiba - Q Series Pro', 'Toshiba', '128G', 'Serial ATA', '0.3 inches', '2.75 inches', '3.9 inches', '1.7 ounces', 'ssds', 15, 99.99, 3),
(24, '502628309078', 'HDTS325XZSTA', 'Toshiba - Q Series Pro', 'Toshiba', '256GB', 'Serial ATA', '0.3 inches', '2.75 inches', '3.9 inches', '1.9 ounces', 'ssds', 11, 189.99, 3.9),
(25, '358375978463', 'SSD9SC120GMDF-RB', 'PNY - XLR8', 'PNY', '120GB', 'Serial ATA III', '0.4 inches', '2.8 inches', '3.9 inches', '2.8 ounces', 'ssds', 23, 69.99, 4.6),
(26, '102005599491', 'BBSSDSC180A4K5', 'Intel - 530 Series', 'Intel', '180GB', 'Serial ATA', '0.3 inches', '2.5 inches', '5.7 inches', '12 ounces', 'ssds', 17, 169.99, 5),
(27, '389087246481', 'MZ-7PD256BW', 'Samsung - 840 Pro', 'Samsung', '256GB', 'Serial ATA', '0.3 inches', '2.5 inches', '5.7 inches', '3.2 ounces', 'ssds', 8, 209.95, 3.1),
(28, '909962479554', 'M500', 'Crucial - 2.5" Internal Solid State Drive', 'Crucial', '240GB', 'Serial ATA', '0.3 inches', '2.5 inches', '5.7 inches', '3.0 ounces', 'ssds', 7, 129.99, 4),
(29, '433387437950', 'MZ-7TE500LW', 'Samsung - 840 EVO', 'Samsung', '500GB', 'Serial ATA III', '0.3 inches', '2.75 inches', '3.9 inches', '3.2 ounces', 'ssds', 20, 499.99, 4.6),
(30, '547112596560', 'SH103S3B/240G', 'Kingston Technology - HyperX 3K', 'Kingston', '240GB', 'Serial ATA III', '0.4 inches', '2.8 inches', '3.9 inches', '2.8 ounces', 'ssds', 11, 239.99, 4.5);

-- --------------------------------------------------------

--
-- Table structure for table `keyboards_specs`
--

CREATE TABLE IF NOT EXISTS `keyboards_specs` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `keyboards_specs`
--

INSERT INTO `keyboards_specs` (`id`, `upc`, `model_number`, `product_name`, `manufacturer`, `palm_rest`, `quantity`, `price`, `rating`) VALUES
(1, '403863974309', 'MK320', 'Logitech - Wireless Desktop Keyboard and Mouse', 'Logitech', 'N', 4, 39.99, 4.3),
(2, '255898603849', '920-003070', 'Logitech - K400 Wireless Keyboard', 'Logitech', 'N', 11, 39.99, 3.2),
(3, '583726911227', 'MC184LL/B', 'Apple - Wireless Keyboard', 'Apple', 'N', 22, 69.99, 3.4),
(4, '641018216973', 'DX-WRK1401', 'Dynex - USB Keyboard', 'Dynex', 'N', 1, 9.99, 4.9),
(5, '846103447891', 'K3500', 'HP - Wireless Keyboard', 'HP', 'N', 13, 29.99, 4.9),
(6, '483891903042', 'DX-WLC1401', 'Dynex - Wireless Keyboard and Wireless Mouse', 'Dynes', 'N', 10, 29.99, 3.7),
(7, '110366410820', '920-004088', 'Logitech - K360 Wireless Keyboard', 'Logitech', 'N', 8, 29.99, 3.2),
(8, '121522927341', 'L3V-00001', 'Microsoft - Sculpt Comfort Wireless Keyboard and Mouse', 'Microsoft', 'Y', 17, 79.99, 3.8),
(9, '582624314100', 'B2M-00012', 'Microsoft - Natural Ergonomic Keyboard', 'Microsoft', 'Y', 3, 49.99, 3.2),
(10, '758601404569', 'K4000', 'HP - Bluetooth Wireless Keyboard', 'HP', 'N', 7, 49.99, 4.5);

-- --------------------------------------------------------

--
-- Table structure for table `memory_specs`
--

CREATE TABLE IF NOT EXISTS `memory_specs` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `memory_specs`
--

INSERT INTO `memory_specs` (`id`, `upc`, `model_number`, `product_name`, `manufacturer`, `capacity`, `type`, `pin_configuration`, `quantity`, `price`, `rating`) VALUES
(1, '151280138282', 'MD2048SD2-800', 'PNY - Optima', 'PNY', '2GB', 'PC2-6400 DDR2', '240-pin DIMM', 6, 39.99, 4.7),
(2, '375810824808', 'MN4096SD3-1333', 'PNY - SDRAM', 'PNY', '4GB', 'PC3-10666 DDR3', '204-pin SoDIMM', 11, 44.99, 3.5),
(3, '559502911619', 'MN8192KD31333AP', 'PNY - Optima', 'PNY', '8GB', 'PC3-10666 DDR3', '240-pin DIMM', 2, 74.99, 3.1),
(4, '522214049122', 'CMSO8GX3M2A1333C9', 'Corsair - 2 Pack', 'Corsair', '8GB', 'DDR3', '204-pin SoDIMM', 20, 79.99, 4.8),
(5, '327332181118', 'CMSX16GX3M2A1600C10', 'Corsair - Vengeance', 'Corsair', '16GB', 'DDR3', '204-pin SoDIMM', 10, 169.99, 3.8),
(6, '242066224606', 'KHX1600C9D3B1/4G', 'Kingston - HyperX blu', 'Kingston', '4GB', 'DDR3', '240-pin DIMM', 1, 44.99, 4.5),
(7, '412560231474', 'MD4096KD2-800', 'PNY - Optima 2-Pack', 'PNY', '4GB', 'PC2-6400 DDR2', '240-pin DIMM', 13, 59.99, 4),
(8, '452374510501', 'CT25664BA1339', 'Crucial - Memory Module', 'Crucial', '2GB', 'PC3-10600 DDR3', '240-pin SDRAM DIMM', 8, 22.94, 4.9),
(9, '898429769115', 'KVR13N9S8/4', 'Kingston Technology - Non-ECC Memory', 'Kingston', '4GB', 'PC3-10600 DDR3', '240-pin DIMM', 7, 36.95, 4.7),
(10, '189297398488', 'CM10246412800SOX20240', 'CMS - Apple Mac Memory', 'CMS', '16GB', 'PC3-12800 DDR3', '240-pin DIMM', 14, 175, 4.3);

-- --------------------------------------------------------

--
-- Table structure for table `monitors_specs`
--

CREATE TABLE IF NOT EXISTS `monitors_specs` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `monitors_specs`
--

INSERT INTO `monitors_specs` (`id`, `upc`, `model_number`, `product_name`, `manufacturer`, `type`, `screen_size`, `resolution`, `input_types`, `height`, `width`, `weight`, `quantity`, `price`, `rating`) VALUES
(1, '630415913783', 'S200HQL BD', 'Acer - 20" LED HD Monitor', 'Acer', 'LED', '20"', '1600x900', 'VGA', '13.1 inches', '18.3 inches', '5.1 lbs', 8, 129.99, 3.6),
(2, '728352743019', 'S22C300HS', 'Samsung - 21.5" LED HD Monitor', 'Samsung', 'LED', '21.5"', '1920x1080', 'VGA; HDMI', '15.7 inches', '20.1 inches', '6.4 lbs', 18, 169.99, 4.8),
(3, '193789111058', 'S2440L', 'Dell - 24" LED HD Monitor', 'Dell', 'LED', '24"', '1920x1080', 'VGA; HDMI', '16.5 inches', '22.3 inches', '10.9 lbs', 4, 249.99, 4),
(4, '958824534729', 'I2269VW', 'AOC - 21.5" IPS LED HD Monitor', 'AOC', 'LED', '21.5"', '1920x1080', 'VGA; DVI', '15.6 inches', '19.6 inches', '7.7 lbs', 20, 149.99, 4.5),
(5, '885687124065', '22bw', 'HP - Pavilion 21.5" IPS LED HD Monitor', 'HP', 'LED', '21.5"', '1920x1080', 'VGA; DVI; HDMI', '15 inches', '21 inches', '10 lbs', 17, 179.99, 5),
(6, '951134090923', 'H236HL BID', 'Acer - H6 Series 23" IPS LED HD Monitor', 'Acer', 'LED', '23"', '1920x1080', 'VGA; DVI; HDMI', '15.9 inches', '20.9 inches', '7.9 lbs', 1, 179.99, 4.1),
(7, '942191869826', 'S27C390H', 'Samsung - 27" LED HD Monitor', 'Samsung', 'LED', '27"', '1920x1080', 'VGA; HDMI', '18.5 inches', '25.3 inches', '9.2 lbs', 9, 279.99, 4.5),
(8, '667753879007', 'VN247HP', 'Asus - 23.6" LED HD Monitor', 'Asus', 'LED', '23.6"', '1920x1080', 'VGA; DVI; HDMI', '15.5 inches', '21.6 inches', '8.2 lbs', 21, 189.99, 4.6),
(9, '795492234843', 'T232HL ABMJJZ', 'Acer - 23" IPS LED HD Touch-Screen Monitor', 'Acer', 'LED', '23"', '1920x1080', 'VGA; HDMI', '17.9 inches', '21.5 inches', '12.6 lbs', 11, 449.99, 3.1),
(10, '868294066763', 'E2060SWD', 'AOC - 19.5" LED HD Monitor', 'AOC', 'LED', '19.5"', '1600x900', 'VGA; DVI', '14.1 inches', '18.8 inches', '6.1 lbs', 2, 109.99, 5);

-- --------------------------------------------------------

--
-- Table structure for table `motherboards_specs`
--

CREATE TABLE IF NOT EXISTS `motherboards_specs` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `motherboards_specs`
--

INSERT INTO `motherboards_specs` (`id`, `upc`, `model_number`, `product_name`, `manufacturer`, `multiple_gpu_supported`, `memory_slots`, `maximum_memory`, `pci_slots`, `usb_ports`, `ps2_ports`, `width`, `depth`, `quantity`, `price`, `rating`) VALUES
(1, '984825424845', 'GA-Z87X-UD3H', 'GIGABYTE - ATX Motherboard', 'GIGABYTE', 'N', 4, '32GB', '4', '6', 'Yes', '12 inches', '9 inches', 5, 169.99, 3.7),
(2, '144065846337', 'Z87-PLUS', 'Asus - Desktop Motherboard', 'Asus', 'CrossFireX, SLI', 4, '32GB', '5', '6', 'Yes', '12 inches', '9.2 inches', 13, 160.85, 4.3),
(3, '272482002423', 'Z87-G45 GAMING', 'MSI - Desktop Motherboard', 'MSI', 'CrossFireX, SLI', 4, '64GB', '7', '6', 'Yes', '12 inches', '9.6 inches', 15, 158.85, 4.2),
(4, '395392964480', 'MAXIMUS VI HERO', 'Asus - Desktop Motherboard', 'Asus', 'CrossFireX, SLI', 4, '32GB', '6', '8', 'Yes', '12 inches', '9.6 inches', 3, 200, 4.3),
(5, '180774826382', 'SABERTOOTH990FXR2.0', 'Asus - Sabertooth', 'Asus', 'N', 4, '32GB', '4', '10', 'Yes', '12 inches', '9.2 inches', 18, 190.99, 3.2),
(6, '899654232663', 'GA-F2A88X-UP', 'Gigabyte - Ultra Durable 5 Plus', 'Gigabyte', 'Hybrid CrossFireX', 4, '64GB', '1', '6', 'Yes', '12 inches', '9.6 inches', 1, 110.99, 3.7),
(7, '547205891226', 'P8Z77-V', 'Asus - ATX Motherboard', 'Asus', 'CrossFireX, SLI', 4, '32GB', '2', '6', 'Yes', '12 inches', '9.9 inches', 17, 165.99, 4.3),
(8, '182703908300', 'P8B75-M/CSM', 'Asus - Micro ATX Motherboard', 'Asus', 'CrossFireX, SLI', 4, '32GB', '1', '6', 'Yes', '12 inches', '9.6 inches', 4, 79.99, 4.3),
(9, '397227395576', 'G1.Sniper M5', 'Gigabyte - Ultra Durable 5 Plus', 'Gigabyte', 'CrossFireX, SLI', 4, '32GB', '4', '6', 'Yes', '9.6 inches', '9.6 inches', 11, 200.5, 3.9),
(10, '703147012578', '990FXA-GD80V2', 'MSI - Desktop Motherboard', 'MSI', 'CrossFireX, SLI', 4, '32GB', '1', '6', 'Yes', '12 inches', '9.6 inches', 8, 171.99, 3.9);

-- --------------------------------------------------------

--
-- Table structure for table `payment_information`
--

CREATE TABLE IF NOT EXISTS `payment_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `card_number` varchar(16) DEFAULT NULL,
  `name_on_card` varchar(100) DEFAULT NULL,
  `expiration_month` varchar(15) NOT NULL,
  `expiration_year` char(4) NOT NULL,
  `security_code` char(3) DEFAULT NULL,
  PRIMARY KEY (`id`,`email`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `email_idx` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `printers_specs`
--

CREATE TABLE IF NOT EXISTS `printers_specs` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `printers_specs`
--

INSERT INTO `printers_specs` (`id`, `upc`, `model_number`, `product_name`, `manufacturer`, `cartridges`, `wireless`, `height`, `width`, `depth`, `weight`, `quantity`, `price`, `rating`) VALUES
(1, '238978325024', 'XP-410 - C11CC87201', 'Epson - Expression Home XP-410', 'Epson', '1 Black, 1 Cyan, 1 Magenta, 1 Yellow', 'Yes', '11 inches', '15.4 inches', '20.8 inches', '9 lbs', 8, 99.99, 4.5),
(2, '137242441440', 'A9T80A', 'HP - Envy 4500', 'HP', '1 Black, 1 Tricolor', 'Yes', '4.7 inches', '17.5 inches', '13.2 inches', '12.3 lbs', 13, 99.99, 3),
(3, '208609417443', '6520', 'HP - Photosmart 6520', 'HP', '1 Black, 1 Cyan, 1 Magenta, 1 Yellow', 'Yes', '17.2 inches', '17.3 inches', '22.2 inches', '13.7 lbs', 1, 149.99, 4.7),
(4, '951631378633', '7520', 'HP - Photosmart 7520', 'HP', '1 Black, 1 Cyan, 1 Magenta, 1 Yellow', 'Yes', '8.7 inches', '17.9 inches', '21.7 inches', '23.4 lbs', 18, 199.99, 4.2),
(5, '208503198140', 'OJPro 8600', 'HP - Officejet Pro 8600', 'HP', '1 Black, 1 Cyan, 1 Magenta, 1 Yellow', 'Yes', '11.8 inches', '19.4 inches', '16.3 inches', '26.4 lbs', 4, 199.99, 4),
(6, '442196628299', 'OFFICEJET 4630', 'HP - Officejet', 'HP', '1 Black, 1 Tricolor', 'Yes', '7.4 inches', '17.6 inches', '13.1 inches', '16.7 lbs', 9, 99.99, 3.3),
(7, '116342689751', 'ENVY 5530', 'HP - Envy 5530', 'HP', '1 Black, 1 Tricolor', 'Yes', '4.7 inches', '17.5 inches', '13.2 inches', '12.3 lbs', 14, 129.99, 4),
(8, '577533118081', 'CZ155A#B1H', 'HP - Officejet 660', 'HP', '1 Black, 1 Cyan, 1 Magenta, 1 Yellow', 'Yes', '9.9 inches', '18.3 inches', '21.9 inches', '17.2 lbs', 3, 149.99, 4.5),
(9, '676353817297', 'DESKJET 2540', 'HP - Deskjet', 'HP', '1 Black, 1 Tricolor', 'Yes', '9.9 inches', '16.7 inches', '21.7 inches', '7.9 lbs', 12, 79.99, 3.7),
(10, '285998533868', 'MX452', 'Canon - PIXMA MX 452', 'Canon', '3 Black, 2 Color', 'Yes', '7.9 inches', '18.1 inches', '15.2 inches', '19 lbs', 4, 99.99, 3.6);

-- --------------------------------------------------------

--
-- Table structure for table `processors_specs`
--

CREATE TABLE IF NOT EXISTS `processors_specs` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `processors_specs`
--

INSERT INTO `processors_specs` (`id`, `upc`, `model_number`, `product_name`, `manufacturer`, `number_of_cores`, `clock_speed`, `quantity`, `price`, `rating`) VALUES
(1, '131790888857', 'BX80646I74770K', 'Intel - Core i7-4770K', 'Intel', 4, '3.5GHz', 5, 349.99, 3.7),
(2, '180895089725', 'BX80646I54670K', 'Intel - Core i5-4670K', 'Intel', 4, '3.4GHz', 2, 249.99, 4.5),
(3, '325810731231', 'FX-8350', 'AMD - Socket AM3', 'AMD', 8, '4GHz', 13, 200, 4.4),
(4, '519029564436', 'A10-5800K', 'AMD - Socket FM2', 'AMD', 4, '3.8GHz', 9, 131.99, 3.9),
(5, '641831305975', 'BX80646I54570', 'Intel - Core i5-4570', 'Intel', 4, '3.2GHz', 14, 196.99, 4.6),
(6, '251094082084', 'X5650', 'HP - Intel Xeon', 'HP', 6, '2.66GHz', 7, 585.99, 4),
(7, '429147053335', '40K2519', 'IBM - Intel Xeon ', 'IBM', 1, '3.8GHz', 11, 389.4, 3),
(8, '746166240653', '8216', 'HP - AMD Opteron', 'HP', 2, '2.4GHz', 1, 129.95, 4.1),
(9, '821993860636', 'E7340', 'HP - Intel Xeon MP', 'HP', 4, '2.4GHz', 14, 768, 4.7),
(10, '918037000157', 'L5240', 'HP - Intel Xeon DP', 'HP', 2, '3GHz', 3, 129.99, 4.6);

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE IF NOT EXISTS `product_reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_title` varchar(300) NOT NULL,
  `question` varchar(2000) DEFAULT NULL,
  `asked_by` varchar(30) NOT NULL,
  `replies` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE IF NOT EXISTS `shopping_cart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `upc` char(12) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`email`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `email_idx` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`id`, `email`, `upc`, `quantity`) VALUES
(1, '', '2147483647', 1);

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_files`
--

CREATE TABLE IF NOT EXISTS `uploaded_files` (
  `post_number` int(11) NOT NULL,
  `post_type` varchar(10) NOT NULL,
  `uploaded_filename` varchar(255) NOT NULL,
  `saved_filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `firstName`, `middleInitial`, `lastName`, `homePhone`, `cellPhone`, `active`, `billStreetAddress`, `billCity`, `billState`, `billZipcode`, `shipStreetAddress`, `shipCity`, `shipState`, `shipZipcode`) VALUES
(8, 'student@svsu.edu', '6367c48dd193d56ea7b0baad25b19455e529f5ee', 'Andrew', 'J', 'Haeger', '9896627524', '9894158421', NULL, '420 Virginia Street', 'Auburn', 'MI', '48611', '420 Virginia Street', 'Auburn', 'MI', '48611');

-- --------------------------------------------------------

--
-- Table structure for table `video_cards_specs`
--

CREATE TABLE IF NOT EXISTS `video_cards_specs` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `video_cards_specs`
--

INSERT INTO `video_cards_specs` (`id`, `upc`, `model_number`, `product_name`, `manufacturer`, `slot_type`, `output_types`, `quantity`, `price`, `rating`) VALUES
(1, '133121700247', 'VCGGT6302XPB', 'PNY - GeForce GT 630', 'PNY', 'PCI Express', 'HDMI; DVI; VGA', 12, 99.99, 3.8),
(2, '240478439816', 'R5230ACLHR', 'XFX - Core Edition Radeon', 'XFX', 'PCI Express', 'HDMI; DVI; VGA', 4, 49.99, 4.5),
(3, '966084824029', 'VCGGTX650XPB', 'PNY - XLR8 GeForce GTX 650', 'PNY', 'PCI Express', 'HDMI; DVI', 6, 159.99, 4.9),
(4, '310064315011', '900120052500000', 'NVIDIA - GeForce GTX 770', 'NVIDIA', 'PCI', 'HDMI; DVI', 11, 379.99, 5),
(5, '669459135508', '02G-P4-3769-KB', 'EVGA - NVIDIA GeForce GTX 760', 'NVIDIA', 'PCI Express', 'HDMI; DVI', 14, 299.99, 3.6),
(6, '186429566733', 'R9-270X-CDFR', 'XFX - Radeon R9 270X', 'XFX', 'PCI Express 3.0', 'HDMI; DVI', 1, 249.99, 4.5),
(7, '110079795943', '900120042510000', 'NVIDIA - GeForce GTX 760', 'NVIDIA', 'PCI Express', 'HDMI; DVI', 7, 299.99, 4),
(8, '156102241006', 'BB61TGS4HX2LTX', 'Galaxy - GeForce GT 610 GC', 'NVIDIA', 'PCI Express', 'HDMI; DVI; VGA', 19, 49.99, 4.5),
(9, '355697406613', '64TGF8HX6FTZ', 'Galaxy - GeForce GT 640', 'NVIDIA', 'PCI Express 3.0', 'HDMI; DVI; VGA', 3, 99.99, 4.3),
(10, '888300786827', '02G-P4-3059-KB', 'EVGA - GeForce GTX 650 Ti', 'NVIDIA', 'PCI Express', 'HDMI; DVI', 10, 210.99, 3.6);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment_information`
--
ALTER TABLE `payment_information`
  ADD CONSTRAINT `email` FOREIGN KEY (`email`) REFERENCES `user` (`email`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
