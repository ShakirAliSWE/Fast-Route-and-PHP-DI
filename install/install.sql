/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 8.0.30 : Database - fast-route-and-php-di
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`fast-route-and-php-di` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `fast-route-and-php-di`;

/*Table structure for table `movies` */

DROP TABLE IF EXISTS `movies`;

CREATE TABLE `movies` (
                          `id` int NOT NULL AUTO_INCREMENT,
                          `title` varchar(225) DEFAULT NULL,
                          `description` text,
                          `release_date` date DEFAULT NULL,
                          `director` varchar(225) DEFAULT NULL,
                          `ratings` double DEFAULT NULL,
                          PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `movies` */

insert  into `movies`(`title`,`description`,`release_date`,`director`,`ratings`) values
('The Midnight Sky','In a post-apocalyptic world, a lone scientist in the Arctic races to contact a spaceship.','2020-12-23','George Clooney',7.1),
('Tenet','A secret agent embarks on a mission to prevent World War III through time manipulation.','2020-08-26','Christopher Nolan',7.5),
('Soul','A musician who has lost his passion for music is transported out of his body and must find his way back with the help of an infant soul learning about herself.','2020-12-25','Pete Docter, Kemp Powers',8.1),
('Parasite','Greed and class discrimination threaten the newly formed symbiotic relationship between the wealthy Park family and the destitute Kim clan.','2019-05-30','Bong Joon-ho',8.6),
('The Irishman','A mob hitman recalls his possible involvement with the slaying of Jimmy Hoffa.','2019-11-27','Martin Scorsese',7.9),
('Knives Out','A detective investigates the death of a patriarch of an eccentric, combative family.','2019-11-27','Rian Johnson',7.9),
('The Trial of the Chicago 7','The story of 7 people on trial stemming from various charges surrounding the uprising at the 1968 Democratic National Convention in Chicago, Illinois.','2020-10-16','Aaron Sorkin',7.8),
('Wonder Woman 1984','Diana must contend with a work colleague and businessman, whose desire for extreme wealth sends the world down a path of destruction, after an ancient artifact that grants wishes goes missing.','2020-12-25','Patty Jenkins',5.4),
('The Father','A man refuses all assistance from his daughter as he ages. As he tries to make sense of his changing circumstances, he begins to doubt his loved ones, his own mind and even the fabric of his reality.','2020-12-18','Florian Zeller',8.3);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
