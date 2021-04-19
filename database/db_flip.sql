/*
SQLyog Community v13.1.1 (64 bit)
MySQL - 10.1.34-MariaDB : Database - db_flip
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_flip` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_flip`;

/*Table structure for table `disburse` */

DROP TABLE IF EXISTS `disburse`;

CREATE TABLE `disburse` (
  `id` bigint(10) unsigned NOT NULL,
  `amount` int(10) unsigned NOT NULL,
  `status` varchar(10) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bank_code` varchar(10) NOT NULL,
  `account_number` varchar(30) NOT NULL,
  `beneficiary_name` varchar(100) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `receipt` varchar(255) DEFAULT NULL,
  `time_served` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fee` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `disburse` */

insert  into `disburse`(`id`,`amount`,`status`,`timestamp`,`bank_code`,`account_number`,`beneficiary_name`,`remark`,`receipt`,`time_served`,`fee`) values 
(3021723751,20000,'SUCCESS','2021-04-19 10:51:18','bni','12345678910','PT FLIP','sample remark  bni','https://flip-receipt.oss-ap-southeast-5.aliyuncs.com/debit_receipt/126316_3d07f9fef9612c7275b3c36f7e1e5762.jpg','2021-04-19 10:50:17',4000),
(4373758629,20000,'SUCCESS','2021-04-19 00:33:38','bca','1234567890','PT FLIP','sample remark  bca','https://flip-receipt.oss-ap-southeast-5.aliyuncs.com/debit_receipt/126316_3d07f9fef9612c7275b3c36f7e1e5762.jpg','2021-04-19 00:32:35',4000);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
