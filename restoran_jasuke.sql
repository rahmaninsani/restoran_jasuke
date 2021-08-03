-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 03, 2021 at 11:44 AM
-- Server version: 10.5.8-MariaDB-log
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran_jasuke`
--
CREATE DATABASE IF NOT EXISTS `restoran_jasuke` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `restoran_jasuke`;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

DROP TABLE IF EXISTS `detail_pemesanan`;
CREATE TABLE IF NOT EXISTS `detail_pemesanan` (
  `no_pemesanan` int(11) NOT NULL,
  `no_pembayaran` int(11) NOT NULL,
  `kode_menu` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `kuantitas` int(11) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  KEY `detail_pemesanan_ibfk_1` (`no_pemesanan`),
  KEY `detail_pemesanan_ibfk_3` (`no_pembayaran`),
  KEY `detail_pemesanan_ibfk_2` (`kode_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`no_pemesanan`, `no_pembayaran`, `kode_menu`, `kuantitas`, `subtotal`) VALUES
(1, 1, 'MN01', 3, '1000.00'),
(1, 1, 'MN02', 1, '2000.00'),
(1, 4, 'MN06', 100, '1000.00'),
(2, 2, 'MN02', 1, '3000.00');

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

DROP TABLE IF EXISTS `meja`;
CREATE TABLE IF NOT EXISTS `meja` (
  `no_meja` int(11) NOT NULL AUTO_INCREMENT,
  `status_meja` enum('Kosong','Terisi') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`no_meja`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`no_meja`, `status_meja`) VALUES
(1, 'Kosong'),
(2, 'Terisi'),
(3, 'Terisi'),
(4, 'Kosong'),
(5, 'Kosong'),
(6, 'Kosong');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `kode_menu` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`kode_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`kode_menu`, `nama`, `slug`, `harga`, `stok`, `gambar`, `deskripsi`) VALUES
('MN01', 'Rendang', 'rendang', '15000.00', 20, '1627453710_6b72aeb6d7fa05dd6a1e.jpg', 'Rendang atau randang adalah masakan daging asli Indonesia yang berasal dari daerah Minangkabau. '),
('MN02', 'Lotek', 'lotek', '15000.00', 22, '1627453758_65bab4854c445476e0cf.jpg', 'Lotek adalah salah satu makanan dari Jawa Barat yang mudah ditemukan di seluruh wilayah Jawa Barat'),
('MN03', 'Data Kosong', 'data-kosong', '15000.00', 20, 'default.jpg', 'Mencoba ketika tidak memasukan gambar'),
('MN04', 'Bubur', 'bubur', '7000.00', 30, '1627657885_d81ea0b52b8e295c42c2.jpg', 'Bubur merupakan istilah umum untuk mengacu pada campuran bahan padat dan cair.'),
('MN05', 'Sate', 'sate', '20000.00', 10, '1627657997_0b25b45d8836732f110b.jpg', 'adalah hidangan Asia Tenggara yang terdiri dari daging yang dibumbui, ditusuk dan dipanggang, '),
('MN06', 'Bakso', 'bakso', '10000.00', 40, '1627658086_519e95249148036c0eed.jpeg', 'adalah makanan khas Indonesia yang digemari banyak orang. '),
('MN07', 'Nasi Goreng', 'nasi-goreng', '15000.00', 10, '1627659454_881eae4d011f421e89c7.jpeg', 'adalah sebuah makanan berupa nasi yang digoreng dan diaduk dalam minyak goreng, margarin, atau mentega. '),
('MN09', 'Ayam bakar', 'ayam-bakar', '30000.00', 5, '1627659680_deb3ce68cdd1bf2abc63.jpg', 'adalah sebuah hidangan Asia Tenggara Maritim, terutama hidangan Indonesia atau Malaysia'),
('MN10', 'Tumpeng', 'tumpeng', '30000.00', 0, '1627743117_59bd6e71ecf8ea30e160.jpg', 'Tumpeng atau nasi tumpeng adalah makanan masyarakat Jawa yang penyajian nasinya dibentuk kerucut dan ditata bersama dengan lauk-pauknya.');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE IF NOT EXISTS `pegawai` (
  `nrp` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jabatan` enum('Kasir','Koki','Pelayan') COLLATE utf8_unicode_ci DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`nrp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nrp`, `nama`, `jabatan`, `jenis_kelamin`, `username`, `password`) VALUES
('KOK001', 'Romeo', 'Koki', 'Laki-laki', 'koki1', 'koki1'),
('KSR001', 'Mawar', 'Kasir', 'Perempuan', 'kasir1', 'kasir1'),
('PYN001', 'Asep', 'Pelayan', 'Laki-laki', 'pelayan1', 'pelayan1');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `no_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_pembayaran` date DEFAULT NULL,
  `total_harga` decimal(10,2) DEFAULT NULL,
  `pajak` decimal(10,2) DEFAULT NULL,
  `total_bayar` decimal(10,2) DEFAULT NULL,
  `uang_bayar` decimal(10,2) DEFAULT NULL,
  `uang_kembalian` decimal(10,2) DEFAULT NULL,
  `status_pembayaran` enum('Belum Bayar','Sudah Bayar') COLLATE utf8_unicode_ci DEFAULT NULL,
  `nrp` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`no_pembayaran`),
  KEY `nrp` (`nrp`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`no_pembayaran`, `tanggal_pembayaran`, `total_harga`, `pajak`, `total_bayar`, `uang_bayar`, `uang_kembalian`, `status_pembayaran`, `nrp`) VALUES
(1, '2021-08-03', '41000.00', '4100.00', '45100.00', '50000.00', '4900.00', NULL, 'KSR001'),
(2, '2021-08-01', '31000.00', '3100.00', '34100.00', '50000.00', '15900.00', NULL, 'KSR001'),
(3, '2021-08-03', '1000.00', '100.00', '1100.00', '2000.00', '9000.00', NULL, 'KSR001'),
(4, '2021-07-05', '1000.00', '100.00', '10000.00', '1000.00', '1000.00', NULL, 'KSR001');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

DROP TABLE IF EXISTS `pemesanan`;
CREATE TABLE IF NOT EXISTS `pemesanan` (
  `no_pemesanan` int(11) NOT NULL AUTO_INCREMENT,
  `no_meja` int(11) NOT NULL,
  `tanggal_pemesanan` date DEFAULT NULL,
  `nama_pelanggan` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_pemesanan` enum('Belum Selesai','Selesai') COLLATE utf8_unicode_ci DEFAULT NULL,
  `nrp` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`no_pemesanan`),
  KEY `no_meja` (`no_meja`),
  KEY `nrp` (`nrp`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`no_pemesanan`, `no_meja`, `tanggal_pemesanan`, `nama_pelanggan`, `status_pemesanan`, `nrp`) VALUES
(1, 2, '2021-07-16', 'Rahman Insani', 'Belum Selesai', NULL),
(2, 3, '2021-07-16', 'Muhammad Jafar Shidik', 'Belum Selesai', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD CONSTRAINT `detail_pemesanan_ibfk_1` FOREIGN KEY (`no_pemesanan`) REFERENCES `pemesanan` (`no_pemesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pemesanan_ibfk_2` FOREIGN KEY (`no_pembayaran`) REFERENCES `pembayaran` (`no_pembayaran`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pemesanan_ibfk_3` FOREIGN KEY (`kode_menu`) REFERENCES `menu` (`kode_menu`) ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`nrp`) REFERENCES `pegawai` (`nrp`) ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`no_meja`) REFERENCES `meja` (`no_meja`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`nrp`) REFERENCES `pegawai` (`nrp`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
