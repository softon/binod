-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.1.72-community - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for binod
CREATE DATABASE IF NOT EXISTS `binod` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `binod`;

-- Dumping structure for table binod.blog
CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(250) COLLATE ucs2_bin DEFAULT NULL,
  `contents` text COLLATE ucs2_bin,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=ucs2 COLLATE=ucs2_bin;

-- Dumping data for table binod.blog: 4 rows
DELETE FROM `blog`;
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` (`id`, `user_id`, `title`, `contents`, `created_at`) VALUES
	(1, 1, 'Given the current state of affairs, engaging in a senseless trend seems to be the only sensible thing to do, and the only fun we can have this year. Here\'s to Binod.', 'It would require a lot of digging, a few professional investigators, an agency of private detectives, and a group of research analysts to find the roots of the Binod trend, as not just the nation but several nations want to know “What is Binod?”.', '2020-08-25'),
	(2, 1, 'Netflix India boards the trend train with these \'Binod\' inspired memes. Check them out', 'If you’ve been on the Internet recently, then you may have heard of the Binod trend. As peculiar as it sounds, under this trend everything and everyone is, you guessed it, Binod.', '2020-08-25'),
	(3, 1, 'Who is \'Binod\'? Why is he trending? Find out here', 'On August 7, one of India’s largest online payment platforms, Paytm, changed the name of its Twitter account to ‘Binod’. ‘Binod’ has been trending on social media platforms like Twitter, Reddit and YouTube for the past week and Paytm jumped on board...', '2020-09-05'),
	(4, 1, 'Who is Binod? How a YouTube Comment Turned into a Viral Meme-fest on Desi Internet', 'In a stand-up gig back in February, Anubhav Singh Bassi had famously said, "Koi sense hai iss baat ki? (Does this even make sense?)" and the comedian had pretty much summed it all.', '2020-09-05');
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;

-- Dumping structure for table binod.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `blog_id` int(10) unsigned DEFAULT NULL,
  `contents` text COLLATE ucs2_bin,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_comments_blog` (`blog_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=ucs2 COLLATE=ucs2_bin;

-- Dumping data for table binod.comments: 8 rows
DELETE FROM `comments`;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `blog_id`, `contents`, `created_at`) VALUES
	(1, 1, 'Nyc post', '2020-09-05 17:06:47'),
	(2, 1, 'best post', '0000-00-00 00:00:00'),
	(3, 1, 'best post', '2020-09-05 19:57:04'),
	(4, 1, 'best post', '2020-09-05 19:57:59'),
	(5, 1, 'best post', '2020-09-05 19:58:05'),
	(6, 1, 'best post', '2020-09-05 19:58:42'),
	(7, 2, 'best blog', '2020-09-05 19:59:35'),
	(8, 2, 'best blog', '2020-09-05 20:05:22');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Dumping structure for table binod.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `is_admin` tinyint(4) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=ucs2 COLLATE=ucs2_bin;

-- Dumping data for table binod.users: 1 rows
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `created_at`) VALUES
	(1, 'Binod Kumar', 'shibu@gmail.com', 'password', 0, '2020-09-03 11:12:06');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
