-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2021 at 04:57 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

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

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `no_meja` int(11) NOT NULL,
  `status` enum('Kosong','Terisi') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `menu` (
  `kode_menu` varchar(4) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `slug` varchar(225) NOT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
('MN10', 'Tumpeng', 'tumpeng', '30000.00', 5, '1627743117_59bd6e71ecf8ea30e160.jpg', 'Tumpeng atau nasi tumpeng adalah makanan masyarakat Jawa yang penyajian nasinya dibentuk kerucut dan ditata bersama dengan lauk-pauknya.'),
('MN11', 'Ayam geprek', 'ayam-geprek', '15000.00', 5, '1627743573_fcdfeefc446f97a95ffc.jpg', 'ayam geprek terdiri dari ayam goreng dan sambel dengan rempah-rempah asli indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

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
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `pembayaran` (
  `no_pembayaran` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `total_harga` decimal(10,2) DEFAULT NULL,
  `pajak` decimal(10,2) DEFAULT NULL,
  `total_bayar` decimal(10,2) DEFAULT NULL,
  `uang_bayar` decimal(10,2) DEFAULT NULL,
  `uang_kembalian` decimal(10,2) DEFAULT NULL,
  `nrp` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `pemesanan` (
  `no_pemesanan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `no_meja` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`no_pemesanan`, `nama_pelanggan`, `tanggal`, `no_meja`) VALUES
(1, 'Rahman Insani', '2021-07-16', 2),
(2, 'Muhammad Jafar Shidik', '2021-07-16', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`no_meja`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`kode_menu`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nrp`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`no_pembayaran`),
  ADD KEY `nrp` (`nrp`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`no_pemesanan`),
  ADD KEY `no_meja` (`no_meja`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `no_meja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `no_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `no_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

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
