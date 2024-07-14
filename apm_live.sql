/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 8.0.30 : Database - apm
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`apm` /*!40100 DEFAULT CHARACTER SET utf16 */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `apm`;

/*Table structure for table `balances` */

DROP TABLE IF EXISTS `balances`;

CREATE TABLE `balances` (
  `id` varchar(255) NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `tenantId` varchar(255) DEFAULT NULL,
  `tenantName` varchar(255) DEFAULT NULL,
  `roomId` varchar(255) DEFAULT NULL,
  `amountDue` int DEFAULT NULL,
  `isPaid` tinyint(1) DEFAULT '0',
  `dueDate` datetime DEFAULT NULL,
  `billType` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

/*Table structure for table `complaints` */

DROP TABLE IF EXISTS `complaints`;

CREATE TABLE `complaints` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `subject` varchar(255) DEFAULT NULL,
  `description` text,
  `action_taken` text,
  `tenant_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

/*Table structure for table `messages` */

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` varchar(255) NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

/*Table structure for table `rooms` */

DROP TABLE IF EXISTS `rooms`;

CREATE TABLE `rooms` (
  `id` varchar(255) NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `roomCode` varchar(255) DEFAULT NULL,
  `buildingCode` varchar(255) DEFAULT NULL,
  `isOccupied` tinyint(1) DEFAULT '0',
  `hasKitchen` tinyint(1) DEFAULT '0',
  `hasBathroomComfortRoom` tinyint(1) DEFAULT '0',
  `maxTenantCapacity` int DEFAULT NULL,
  `numberOfBedrooms` int DEFAULT NULL,
  `numberOfFloors` int DEFAULT NULL,
  `ratePerMonth` float DEFAULT NULL,
  `assignedTo` varchar(255) DEFAULT NULL,
  `roomNo` varchar(255) DEFAULT NULL,
  `roomType` varchar(255) DEFAULT NULL,
  `lastDateAssigned` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

/*Table structure for table `staffs` */

DROP TABLE IF EXISTS `staffs`;

CREATE TABLE `staffs` (
  `id` varchar(255) NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `middleName` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

/*Table structure for table `tenants` */

DROP TABLE IF EXISTS `tenants`;

CREATE TABLE `tenants` (
  `id` varchar(255) NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `middleName` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `addressBefore` varchar(255) DEFAULT NULL,
  `isVerified` tinyint(1) DEFAULT '1',
  `isSuspended` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
