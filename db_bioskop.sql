/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.4.19-MariaDB : Database - db_bioskop
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_bioskop` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_bioskop`;

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `login` */

insert  into `login`(`username`,`password`) values 
('fadlan','$2a$12$hl7/Ex0QmUnLwgu3B.BXxOhzz0jKSg3aYHYrG3Z0bkrOvNqKisQJq');

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(12) NOT NULL,
  `metode_pembayaran` varchar(24) NOT NULL,
  `norek` varchar(24) NOT NULL,
  `atasnama` varchar(48) NOT NULL,
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pembayaran` */

insert  into `pembayaran`(`id_pembayaran`,`metode_pembayaran`,`norek`,`atasnama`) values 
('D-001','Dana','08111111','Fadlan Alfalah Baihaqi'),
('D-002','BCA','08222222','Dion'),
('D-003','BNI','08333333','Wildan'),
('D-004','BRI','08444444','Habib');

/*Table structure for table `pemesanan` */

DROP TABLE IF EXISTS `pemesanan`;

CREATE TABLE `pemesanan` (
  `id_pemesanan` varchar(12) NOT NULL,
  `id_pembayaran` varchar(12) NOT NULL,
  `id_tiket` varchar(12) NOT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `jam` varchar(5) DEFAULT NULL,
  `tanggal` varchar(10) DEFAULT NULL,
  `jumlah_tiket` int(11) NOT NULL,
  PRIMARY KEY (`id_pemesanan`),
  KEY `id_pembayaran` (`id_pembayaran`),
  KEY `id_tiket` (`id_tiket`),
  CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_tiket`) REFERENCES `tiket` (`id_tiket`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pemesanan` */

insert  into `pemesanan`(`id_pemesanan`,`id_pembayaran`,`id_tiket`,`nama`,`jam`,`tanggal`,`jumlah_tiket`) values 
('TRX-001','D-001','A-001','Fadlan Alfalah Baihaqi','14:00','12-06-2022',1),
('TRX-002','D-002','A-002','Dion','13:00','19-07-2022',3);

/*Table structure for table `tiket` */

DROP TABLE IF EXISTS `tiket`;

CREATE TABLE `tiket` (
  `id_tiket` varchar(12) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `film` varchar(48) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id_tiket`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tiket` */

insert  into `tiket`(`id_tiket`,`genre`,`film`,`harga`) values 
('A-001','Action','Iron Man',50000),
('A-002','Action','Hulk',45000),
('H-001','Horror','Ajab',30000),
('H-002','Horror','Desa Penari',40000);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
