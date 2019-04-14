-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.31-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for foodies
CREATE DATABASE IF NOT EXISTS `foodies` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `foodies`;

-- Dumping structure for table foodies.food_review
CREATE TABLE IF NOT EXISTS `food_review` (
  `food_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `resturant_id` int(11) DEFAULT NULL,
  `food_reviews` text,
  KEY `food_id` (`food_id`),
  KEY `resturant_id` (`resturant_id`),
  KEY `food_review_ibfk_3` (`user_id`),
  CONSTRAINT `food_review_ibfk_1` FOREIGN KEY (`food_id`) REFERENCES `menu` (`food_id`),
  CONSTRAINT `food_review_ibfk_2` FOREIGN KEY (`resturant_id`) REFERENCES `resturants` (`resturant_id`),
  CONSTRAINT `food_review_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table foodies.food_review: ~3 rows (approximately)
/*!40000 ALTER TABLE `food_review` DISABLE KEYS */;
INSERT INTO `food_review` (`food_id`, `user_id`, `resturant_id`, `food_reviews`) VALUES
	(1, 10, 1, 'Good to eat'),
	(1, 11, 1, 'Perfect for its value'),
	(5, 10, 2, 'Good Food');
/*!40000 ALTER TABLE `food_review` ENABLE KEYS */;

-- Dumping structure for table foodies.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `food_id` int(11) NOT NULL AUTO_INCREMENT,
  `food_name` text,
  `price` float DEFAULT NULL,
  `resturant_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`food_id`),
  KEY `resturant_id` (`resturant_id`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`resturant_id`) REFERENCES `resturants` (`resturant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table foodies.menu: ~8 rows (approximately)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`food_id`, `food_name`, `price`, `resturant_id`) VALUES
	(1, 'MO:MO', 100, 1),
	(2, 'Chowmein', 100, 1),
	(3, 'Alu Tama', 50, 1),
	(4, 'Alu Chop', 20, 1),
	(5, 'Fried Chicken', 150, 2),
	(6, 'MO:MO', 150, 2),
	(7, 'Chowmein', 100, 2),
	(8, 'Choila', 150, 2);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Dumping structure for table foodies.ratings
CREATE TABLE IF NOT EXISTS `ratings` (
  `food_id` int(11) DEFAULT NULL,
  `resturant_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  KEY `food_id` (`food_id`),
  KEY `resturant_id` (`resturant_id`),
  KEY `ratings_ibfk_3` (`user_id`),
  CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`food_id`) REFERENCES `menu` (`food_id`),
  CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`resturant_id`) REFERENCES `resturants` (`resturant_id`),
  CONSTRAINT `ratings_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table foodies.ratings: ~16 rows (approximately)
/*!40000 ALTER TABLE `ratings` DISABLE KEYS */;
INSERT INTO `ratings` (`food_id`, `resturant_id`, `user_id`, `rating`) VALUES
	(1, 1, 10, 4),
	(1, 1, 11, 5),
	(4, 1, 10, 5),
	(3, 1, 12, 5),
	(2, 1, 12, 4),
	(2, 1, 10, 5),
	(2, 1, 11, 4),
	(3, 1, 11, 5),
	(3, 1, 10, 5),
	(8, 2, 10, 5),
	(5, 2, 11, 4),
	(5, 2, 10, 5),
	(8, 2, 11, 1),
	(6, 2, 10, 2),
	(6, 2, 11, 2);
/*!40000 ALTER TABLE `ratings` ENABLE KEYS */;

-- Dumping structure for table foodies.resturants
CREATE TABLE IF NOT EXISTS `resturants` (
  `longitude` text,
  `lattitude` text,
  `resturant_name` text,
  `resturant_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`resturant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table foodies.resturants: ~3 rows (approximately)
/*!40000 ALTER TABLE `resturants` DISABLE KEYS */;
INSERT INTO `resturants` (`longitude`, `lattitude`, `resturant_name`, `resturant_id`) VALUES
	('85.523647', '27.628688', 'Ramesh dai ko kitchen', 1),
	('85.523256', '27.629211', 'Newa kitchen', 2),
	('85.50225734710693', '27.63335299586018', 'The Station Cafe', 11);
/*!40000 ALTER TABLE `resturants` ENABLE KEYS */;

-- Dumping structure for table foodies.resturant_review
CREATE TABLE IF NOT EXISTS `resturant_review` (
  `resturant_id` int(11) DEFAULT NULL,
  `resturant_reviews` text,
  `user_id` int(11) DEFAULT NULL,
  KEY `resturant_id` (`resturant_id`),
  KEY `resturant_review_ibfk_1` (`user_id`),
  CONSTRAINT `resturant_review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table foodies.resturant_review: ~3 rows (approximately)
/*!40000 ALTER TABLE `resturant_review` DISABLE KEYS */;
INSERT INTO `resturant_review` (`resturant_id`, `resturant_reviews`, `user_id`) VALUES
	(1, 'Good ambience', 10),
	(1, 'I didn\'t like the service', 11),
	(2, 'Bad resturant_review', 11),
	(11, 'Goood place to have lunch', 10);
/*!40000 ALTER TABLE `resturant_review` ENABLE KEYS */;

-- Dumping structure for table foodies.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` text,
  `email` text,
  `contact_no` text,
  `pw` text,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table foodies.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `user_name`, `email`, `contact_no`, `pw`, `active`) VALUES
	(10, 'Foodie1', 'foodie@gmail.com', '9860606060', '25d55ad283aa400af464c76d713c07ad', 1),
	(11, 'Foodie2', 'test@gmail.com', '9865468879', '25d55ad283aa400af464c76d713c07ad', 1),
	(12, 'Foodie3', 'foodie@foodie.com', '9806513579', '25d55ad283aa400af464c76d713c07ad', 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
