/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.14-MariaDB : Database - komando
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) DEFAULT NULL,
  `menu_name` varchar(50) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `link` varchar(60) DEFAULT NULL,
  `menu_type_id` int(11) DEFAULT NULL,
  `menu_category_id` int(11) DEFAULT NULL,
  `unis_id` int(11) DEFAULT NULL,
  `group_menu_id` int(11) DEFAULT NULL,
  `publish` enum('Yes','No') DEFAULT NULL,
  `sortir` int(3) DEFAULT NULL,
  `not_view` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `trash` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `menu` */

insert  into `menu`(`id`,`id_menu`,`menu_name`,`parent_id`,`link`,`menu_type_id`,`menu_category_id`,`unis_id`,`group_menu_id`,`publish`,`sortir`,`not_view`,`created`,`created_by`,`modified`,`modified_by`,`active`,`trash`) values (1,1,'MASTER',0,'/#',1,1,1,NULL,'Yes',1,1,'2021-11-17 11:43:01',1,NULL,NULL,1,0),(2,2,'MENU',1,'/menu',1,2,1,NULL,'Yes',2,1,'2021-11-17 11:43:33',1,NULL,NULL,1,0),(3,3,'USER',0,'/#',1,1,1,NULL,'Yes',1,1,'2021-11-17 11:55:00',1,NULL,NULL,1,0),(4,4,'ADMIN',3,'/user',1,2,1,NULL,'Yes',2,1,'2021-11-17 11:55:32',1,NULL,NULL,1,0);

/*Table structure for table `menu_category` */

DROP TABLE IF EXISTS `menu_category`;

CREATE TABLE `menu_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_category_name` varchar(10) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `trash` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `menu_category` */

insert  into `menu_category`(`id`,`menu_category_name`,`active`,`trash`) values (1,'Parent',1,0),(2,'Child',1,0);

/*Table structure for table `menu_group` */

DROP TABLE IF EXISTS `menu_group`;

CREATE TABLE `menu_group` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `menu_group_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `trash` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `active` (`active`),
  KEY `trash` (`trash`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `menu_group` */

insert  into `menu_group`(`id`,`menu_group_name`,`description`,`created`,`created_by`,`modified`,`modified_by`,`active`,`trash`) values (1,'topmenu',NULL,'2019-01-31 16:06:14',0,NULL,NULL,1,0),(2,'mainmenu',NULL,'2019-01-31 17:21:52',0,NULL,NULL,1,0),(3,'middlemenu',NULL,'2019-01-31 17:23:24',0,NULL,NULL,1,0),(4,'footermenu',NULL,'2019-01-31 17:24:15',0,NULL,NULL,1,0);

/*Table structure for table `menu_map` */

DROP TABLE IF EXISTS `menu_map`;

CREATE TABLE `menu_map` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `unis_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `trash` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `menu_map` */

insert  into `menu_map`(`id`,`user_id`,`menu_id`,`unis_id`,`created`,`created_by`,`modified`,`modified_by`,`active`,`trash`) values (1,1,1,1,'2021-11-17 11:49:59',NULL,NULL,NULL,1,0),(2,1,2,1,'2021-11-17 11:50:00',NULL,NULL,NULL,1,0),(3,1,3,1,'2021-11-17 11:55:42',1,NULL,NULL,1,0),(4,1,4,1,'2021-11-17 11:55:43',1,NULL,NULL,1,0);

/*Table structure for table `menu_type` */

DROP TABLE IF EXISTS `menu_type`;

CREATE TABLE `menu_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_type_name` varchar(20) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `trash` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `menu_type` */

insert  into `menu_type`(`id`,`menu_type_name`,`active`,`trash`) values (1,'Backend',1,0),(2,'Frontend',1,0);

/*Table structure for table `module` */

DROP TABLE IF EXISTS `module`;

CREATE TABLE `module` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `filename` varchar(150) DEFAULT NULL,
  `type_id` int(2) DEFAULT NULL,
  `f_path` varchar(200) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `trash` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `typeid` (`type_id`),
  KEY `active` (`active`),
  KEY `trash` (`trash`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `module` */

/*Table structure for table `pos_module` */

DROP TABLE IF EXISTS `pos_module`;

CREATE TABLE `pos_module` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `module_id` int(5) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `limit` int(5) DEFAULT NULL,
  `data_start` int(5) DEFAULT NULL,
  `unis_id` int(2) DEFAULT NULL,
  `page` varchar(255) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `ordering` int(5) DEFAULT NULL,
  `publish_up` datetime DEFAULT NULL,
  `publish_down` datetime DEFAULT NULL,
  `menu_id` int(5) DEFAULT NULL,
  `fontsize_title` int(11) NOT NULL DEFAULT 20,
  `fontsize_cat` int(11) NOT NULL DEFAULT 12,
  `fontsize_timespan` int(11) NOT NULL DEFAULT 16,
  `fontsize_content` int(11) NOT NULL DEFAULT 14,
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `trash` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pos_module` */

/*Table structure for table `unit_system` */

DROP TABLE IF EXISTS `unit_system`;

CREATE TABLE `unit_system` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `system_name` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `trash` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `unit_system` */

insert  into `unit_system`(`id`,`system_name`,`created`,`created_by`,`modified`,`modified_by`,`active`,`trash`) values (1,'karya','2021-11-17 18:16:20',1,NULL,NULL,1,0);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(16) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `gender` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `konfirmasi_password` varchar(255) DEFAULT NULL,
  `place_birth` varchar(50) DEFAULT NULL,
  `date_birth` date DEFAULT NULL,
  `age` int(2) DEFAULT NULL,
  `handphone` varchar(13) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `religion` enum('Islam','Kristen','Katolik','Hindu','Budha','Konghucu') DEFAULT NULL,
  `married` enum('Single','Married') DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `twitter` varchar(50) DEFAULT NULL,
  `instagram` varchar(50) DEFAULT NULL,
  `youtube` varchar(50) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `sa` int(1) DEFAULT NULL,
  `end_login_date` datetime DEFAULT NULL,
  `on_off` enum('On','Off') DEFAULT NULL,
  `cek_group_map` tinyint(1) DEFAULT 0,
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `trash` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`nik`,`first_name`,`last_name`,`gender`,`address`,`email`,`username`,`password`,`konfirmasi_password`,`place_birth`,`date_birth`,`age`,`handphone`,`telp`,`religion`,`married`,`facebook`,`twitter`,`instagram`,`youtube`,`image`,`sa`,`end_login_date`,`on_off`,`cek_group_map`,`created`,`created_by`,`modified`,`modified_by`,`active`,`trash`) values (1,'4435353542442434','Aceng','Willy','Laki-laki','Jalan-jalan diakhir pekan lihat ke kiri dan ke kanan','a@gmail.com','stronger','$2y$10$Cqc0e9iM61CJOS3qB4SdouXn/Fq5rq.ddNkCRaRXGaGPnbBShWgYy',NULL,'Serengat','2021-11-17',11,'088888888888',NULL,'Islam','Single',NULL,NULL,NULL,NULL,'/uploads/user/Aceng Willy.png',1,'2021-12-24 02:01:41','Off',1,'2021-11-17 11:38:00',1,NULL,NULL,1,0);

/*Table structure for table `user_group` */

DROP TABLE IF EXISTS `user_group`;

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_name` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `trash` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `user_group` */

insert  into `user_group`(`id`,`user_group_name`,`created`,`created_by`,`modified`,`modified_by`,`active`,`trash`) values (1,'Superadmin','2020-07-03 14:47:45',1,NULL,NULL,1,0),(2,'Administrator','2020-07-03 14:48:10',1,NULL,NULL,1,0),(3,'Manager','2020-07-03 15:04:42',1,NULL,NULL,1,0);

/*Table structure for table `user_group_map` */

DROP TABLE IF EXISTS `user_group_map`;

CREATE TABLE `user_group_map` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `user_group_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `trash` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `user_group_map` */

insert  into `user_group_map`(`id`,`user_id`,`user_group_id`,`created`,`created_by`,`modified`,`modified_by`,`active`,`trash`) values (1,1,1,'2021-11-17 11:39:25',1,NULL,NULL,1,0);

/*Table structure for table `user_store_password` */

DROP TABLE IF EXISTS `user_store_password`;

CREATE TABLE `user_store_password` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `trash` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `user_store_password` */

insert  into `user_store_password`(`id`,`user_id`,`password`,`created`,`created_by`,`modified`,`modified_by`,`active`,`trash`) values (1,1,'34567','2021-11-17 11:38:00',1,NULL,NULL,1,0);

/*Table structure for table `user_usergroup_map` */

DROP TABLE IF EXISTS `user_usergroup_map`;

CREATE TABLE `user_usergroup_map` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `unis_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `trash` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `user_usergroup_map` */

insert  into `user_usergroup_map`(`id`,`user_id`,`group_id`,`unis_id`,`created`,`created_by`,`modified`,`modified_by`,`active`,`trash`) values (1,1,1,1,'2021-11-17 18:46:43',1,NULL,NULL,1,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
