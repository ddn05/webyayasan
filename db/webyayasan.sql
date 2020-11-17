/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.11-MariaDB : Database - webyayasan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`webyayasan` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `webyayasan`;

/*Table structure for table `tb_berita` */

DROP TABLE IF EXISTS `tb_berita`;

CREATE TABLE `tb_berita` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `tgl` date DEFAULT NULL,
  `judul` varchar(90) DEFAULT NULL,
  `redaksi` text DEFAULT NULL,
  `cover` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_berita` */

insert  into `tb_berita`(`id`,`tgl`,`judul`,`redaksi`,`cover`) values 
(1,'2020-11-17','Pengumuman Pemilihan Dosen ITPA tahap 1','<p>sasasasa</p>','WhatsApp_Image_2020-11-16_at_5_54_36_AM_(2).jpeg');

/*Table structure for table `tb_jumbotron` */

DROP TABLE IF EXISTS `tb_jumbotron`;

CREATE TABLE `tb_jumbotron` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(250) DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_jumbotron` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
