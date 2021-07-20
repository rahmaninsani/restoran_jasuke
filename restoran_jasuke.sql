/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 8.0.23 : Database - restoran_jasuke
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`restoran_jasuke` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `restoran_jasuke`;

/*Table structure for table `detail_pemesanan` */

DROP TABLE IF EXISTS `detail_pemesanan`;

CREATE TABLE `detail_pemesanan` (
  `no_pemesanan` int NOT NULL,
  `kode_menu` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `no_pembayaran` int NOT NULL,
  `kuantitas` int DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `status_pemesanan` enum('Belum Selesai','Selesai') DEFAULT NULL,
  PRIMARY KEY (`no_pemesanan`,`kode_menu`,`no_pembayaran`),
  KEY `kode_menu` (`kode_menu`),
  KEY `no_pembayaran` (`no_pembayaran`),
  CONSTRAINT `detail_pemesanan_ibfk_1` FOREIGN KEY (`no_pemesanan`) REFERENCES `pemesanan` (`no_pemesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_pemesanan_ibfk_2` FOREIGN KEY (`kode_menu`) REFERENCES `menu` (`kode_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_pemesanan_ibfk_3` FOREIGN KEY (`no_pembayaran`) REFERENCES `pembayaran` (`no_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `detail_pemesanan` */

insert  into `detail_pemesanan`(`no_pemesanan`,`kode_menu`,`no_pembayaran`,`kuantitas`,`subtotal`,`status_pemesanan`) values 
(1,'MN01',1,2,26000.00,'Belum Selesai'),
(1,'MN02',1,3,15000.00,'Belum Selesai'),
(2,'MN01',2,1,13000.00,'Selesai'),
(2,'MN02',2,2,10000.00,'Selesai'),
(2,'MN03',2,1,8000.00,'Selesai');

/*Table structure for table `meja` */

DROP TABLE IF EXISTS `meja`;

CREATE TABLE `meja` (
  `no_meja` int NOT NULL AUTO_INCREMENT,
  `status` enum('Kosong','Terisi') DEFAULT NULL,
  PRIMARY KEY (`no_meja`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `meja` */

insert  into `meja`(`no_meja`,`status`) values 
(1,'Kosong'),
(2,'Terisi'),
(3,'Terisi'),
(4,'Kosong'),
(5,'Kosong');

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `kode_menu` varchar(4) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `stok` int DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  PRIMARY KEY (`kode_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `menu` */

insert  into `menu`(`kode_menu`,`nama`,`harga`,`stok`,`gambar`,`deskripsi`) values 
('MN01','Rendang',13000.00,50,'rendang.jpg','Rendang Sapi cita rasa pejabat harga merakyat'),
('MN02','Semur Jengkol',5000.00,67,'semur-jengkol.jpg','Semur Jengkol sedap'),
('MN03','Ayam Penyet',8000.00,182,'ayam-penyet.jpg','Ayam Penyet nikmat');

/*Table structure for table `pegawai` */

DROP TABLE IF EXISTS `pegawai`;

CREATE TABLE `pegawai` (
  `nrp` varchar(6) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jabatan` varchar(30) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nrp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `pegawai` */

insert  into `pegawai`(`nrp`,`nama`,`jabatan`,`tempat_lahir`,`tanggal_lahir`,`jenis_kelamin`,`alamat`,`no_telepon`,`username`,`password`) values 
('KOK001','Romeo','Koki','Florida','1980-01-01','Laki-laki','St. Florida No. 1','08123453','koki1','koki1'),
('KSR001','Mawar','Kasir','Jakarta','1980-01-01','Perempuan','Jl. Kasir No. 1','08123452','kasir1','kasir1'),
('PYN001','Asep','Pelayan','Bandung','1980-01-01','Laki-laki','Jl. Pelayan No 1','08123451','pelayan1','pelayan1');

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `no_pembayaran` int NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `total_harga` decimal(10,2) DEFAULT NULL,
  `pajak` decimal(10,2) DEFAULT NULL,
  `total_bayar` decimal(10,2) DEFAULT NULL,
  `uang_bayar` decimal(10,2) DEFAULT NULL,
  `uang_kembalian` decimal(10,2) DEFAULT NULL,
  `nrp` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`no_pembayaran`),
  KEY `nrp` (`nrp`),
  CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`nrp`) REFERENCES `pegawai` (`nrp`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `pembayaran` */

insert  into `pembayaran`(`no_pembayaran`,`tanggal`,`total_harga`,`pajak`,`total_bayar`,`uang_bayar`,`uang_kembalian`,`nrp`) values 
(1,'2021-07-13',41000.00,4100.00,45100.00,50000.00,4900.00,'KSR001'),
(2,'2021-07-13',31000.00,3100.00,34100.00,50000.00,15900.00,'KSR001');

/*Table structure for table `pemesanan` */

DROP TABLE IF EXISTS `pemesanan`;

CREATE TABLE `pemesanan` (
  `no_pemesanan` int NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `no_meja` int DEFAULT NULL,
  PRIMARY KEY (`no_pemesanan`),
  KEY `no_meja` (`no_meja`),
  CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`no_meja`) REFERENCES `meja` (`no_meja`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `pemesanan` */

insert  into `pemesanan`(`no_pemesanan`,`nama_pelanggan`,`tanggal`,`no_meja`) values 
(1,'Rahman Insani','2021-07-16',2),
(2,'Muhammad Jafar Shidik','2021-07-16',3);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
