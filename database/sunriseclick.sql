-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.4.6-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for sunriseclick
DROP DATABASE IF EXISTS `sunriseclick`;
CREATE DATABASE IF NOT EXISTS `sunriseclick` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sunriseclick`;

-- Dumping structure for table sunriseclick.cms_content
DROP TABLE IF EXISTS `cms_content`;
CREATE TABLE IF NOT EXISTS `cms_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heading1` varchar(50) NOT NULL DEFAULT '0',
  `heading2` varchar(50) NOT NULL DEFAULT '0',
  `count_year` int(11) NOT NULL DEFAULT 0,
  `count_month` int(11) NOT NULL DEFAULT 0,
  `count_date` int(11) NOT NULL DEFAULT 0,
  `count_hours` int(11) NOT NULL DEFAULT 0,
  `count_minutes` int(11) NOT NULL DEFAULT 0,
  `count_seconds` int(11) NOT NULL DEFAULT 0,
  `fb_url` varchar(300) NOT NULL DEFAULT '0',
  `ytb_url` varchar(300) NOT NULL DEFAULT '0',
  `twt_url` varchar(300) NOT NULL DEFAULT '0',
  `email` varchar(120) NOT NULL DEFAULT '0',
  `working_time` varchar(80) NOT NULL DEFAULT '0',
  `phone` varchar(15) NOT NULL DEFAULT '0',
  `working_days` varchar(50) NOT NULL DEFAULT '0',
  `off_days` varchar(300) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table sunriseclick.cms_content: ~0 rows (approximately)
/*!40000 ALTER TABLE `cms_content` DISABLE KEYS */;
REPLACE INTO `cms_content` (`id`, `heading1`, `heading2`, `count_year`, `count_month`, `count_date`, `count_hours`, `count_minutes`, `count_seconds`, `fb_url`, `ytb_url`, `twt_url`, `email`, `working_time`, `phone`, `working_days`, `off_days`, `created_at`, `updated_at`) VALUES
	(1, 'Our website is', 'Our website is', 2020, 10, 1, 11, 10, 11, 'https://www.facebook.com/SunriseClickOfficial', 'https://www.youtube.com/channel/UCFm00xWhiFfq1XDwhWrclDg', 'https://twitter.com/SunriseClick', 'customercare@sunriseclick.com', '9AM TO 1PM, 2PM To 6PM (UTC+8)', '+65 6259 8668', 'Monday To Friday', 'Closed Saturday, Sunday And Singapore Public Holidays', '2020-01-20 18:53:55', '2020-01-20 18:53:55');
/*!40000 ALTER TABLE `cms_content` ENABLE KEYS */;

-- Dumping structure for table sunriseclick.subscribers
DROP TABLE IF EXISTS `subscribers`;
CREATE TABLE IF NOT EXISTS `subscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `email` varchar(120) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table sunriseclick.subscribers: ~4 rows (approximately)
/*!40000 ALTER TABLE `subscribers` DISABLE KEYS */;
REPLACE INTO `subscribers` (`id`, `name`, `email`, `created_at`, `updated_at`) VALUES
	(1, 'janak', 'janak@gmail.com', '2020-01-20 19:38:13', '2020-01-20 19:38:13'),
	(2, 'test', 'test@gmail.com', '2020-01-20 16:00:50', '2020-01-20 20:30:50'),
	(3, 'test1', 'test1@gmail.com', '2020-01-20 16:02:50', '2020-01-20 20:32:50'),
	(4, 'janak1', 'janak1@gmail.com', '2020-01-20 16:56:28', '2020-01-20 21:26:28');
/*!40000 ALTER TABLE `subscribers` ENABLE KEYS */;

-- Dumping structure for table sunriseclick.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(450) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table sunriseclick.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
	(1, 'SunriseClick', 'admin@sunriseclick.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '2020-01-20 16:27:10', '2020-01-20 16:27:14');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
