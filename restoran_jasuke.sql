-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 28, 2021 at 07:28 AM
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
  `kode_menu` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `no_pembayaran` int(11) NOT NULL,
  `kuantitas` int(11) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `status_pemesanan` enum('Belum Selesai','Selesai') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`no_pemesanan`,`kode_menu`,`no_pembayaran`),
  KEY `kode_menu` (`kode_menu`),
  KEY `no_pembayaran` (`no_pembayaran`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`no_pemesanan`, `kode_menu`, `no_pembayaran`, `kuantitas`, `subtotal`, `status_pemesanan`) VALUES
(1, 'MN01', 1, 2, '26000.00', 'Belum Selesai'),
(1, 'MN02', 1, 3, '15000.00', 'Belum Selesai'),
(2, 'MN01', 2, 1, '13000.00', 'Selesai'),
(2, 'MN02', 2, 2, '10000.00', 'Selesai'),
(2, 'MN03', 2, 1, '8000.00', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

DROP TABLE IF EXISTS `meja`;
CREATE TABLE IF NOT EXISTS `meja` (
  `no_meja` int(11) NOT NULL AUTO_INCREMENT,
  `status` enum('Kosong','Terisi') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`no_meja`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`no_meja`, `status`) VALUES
(1, 'Kosong'),
(2, 'Terisi'),
(3, 'Terisi'),
(4, 'Kosong'),
(5, 'Kosong');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `kode_menu` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`kode_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`kode_menu`, `nama`, `harga`, `stok`, `gambar`, `deskripsi`) VALUES
('MN01', 'Rendang', '13000.00', 50, 'rendang.jpg', 'Rendang Sapi cita rasa pejabat harga merakyat'),
('MN02', 'Semur Jengkol', '5000.00', 67, 'semur-jengkol.jpg', 'Semur Jengkol sedap'),
('MN03', 'Ayam Penyet', '8000.00', 182, 'ayam-penyet.jpg', 'Ayam Penyet nikmat');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE IF NOT EXISTS `pegawai` (
  `nrp` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jabatan` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamat` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_telepon` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`nrp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nrp`, `nama`, `jabatan`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `no_telepon`, `username`, `password`) VALUES
('KOK001', 'Romeo', 'Koki', 'Florida', '1980-01-01', 'Laki-laki', 'St. Florida No. 1', '08123453', 'koki1', 'koki1'),
('KSR001', 'Mawar', 'Kasir', 'Jakarta', '1980-01-01', 'Perempuan', 'Jl. Kasir No. 1', '08123452', 'kasir1', 'kasir1'),
('PYN001', 'Asep', 'Pelayan', 'Bandung', '1980-01-01', 'Laki-laki', 'Jl. Pelayan No 1', '08123451', 'pelayan1', 'pelayan1');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `no_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `total_harga` decimal(10,2) DEFAULT NULL,
  `pajak` decimal(10,2) DEFAULT NULL,
  `total_bayar` decimal(10,2) DEFAULT NULL,
  `uang_bayar` decimal(10,2) DEFAULT NULL,
  `uang_kembalian` decimal(10,2) DEFAULT NULL,
  `nrp` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`no_pembayaran`),
  KEY `nrp` (`nrp`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`no_pembayaran`, `tanggal`, `total_harga`, `pajak`, `total_bayar`, `uang_bayar`, `uang_kembalian`, `nrp`) VALUES
(1, '2021-07-13', '41000.00', '4100.00', '45100.00', '50000.00', '4900.00', 'KSR001'),
(2, '2021-07-13', '31000.00', '3100.00', '34100.00', '50000.00', '15900.00', 'KSR001');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

DROP TABLE IF EXISTS `pemesanan`;
CREATE TABLE IF NOT EXISTS `pemesanan` (
  `no_pemesanan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `no_meja` int(11) DEFAULT NULL,
  PRIMARY KEY (`no_pemesanan`),
  KEY `no_meja` (`no_meja`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`no_pemesanan`, `nama_pelanggan`, `tanggal`, `no_meja`) VALUES
(1, 'Rahman Insani', '2021-07-16', 2),
(2, 'Muhammad Jafar Shidik', '2021-07-16', 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD CONSTRAINT `detail_pemesanan_ibfk_1` FOREIGN KEY (`no_pemesanan`) REFERENCES `pemesanan` (`no_pemesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pemesanan_ibfk_2` FOREIGN KEY (`kode_menu`) REFERENCES `menu` (`kode_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pemesanan_ibfk_3` FOREIGN KEY (`no_pembayaran`) REFERENCES `pembayaran` (`no_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`nrp`) REFERENCES `pegawai` (`nrp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`no_meja`) REFERENCES `meja` (`no_meja`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
