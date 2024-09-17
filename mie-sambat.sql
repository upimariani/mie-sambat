-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2024 at 01:54 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mie-sambat`
--

-- --------------------------------------------------------

--
-- Table structure for table `analisis`
--

CREATE TABLE `analisis` (
  `id_analisis` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `periode` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `eoq` int(11) NOT NULL,
  `rop` int(11) NOT NULL,
  `total_kebutuhan` int(11) NOT NULL,
  `frequensi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analisis`
--

INSERT INTO `analisis` (`id_analisis`, `id_barang`, `periode`, `tahun`, `eoq`, `rop`, `total_kebutuhan`, `frequensi`) VALUES
(1, 1, 9, 2024, 190, 10, 300, 2),
(2, 2, 9, 2024, 77, 3, 94, 1);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_barang` varchar(125) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `harga_supplier` varchar(20) NOT NULL,
  `gambar` text NOT NULL,
  `stok_min` int(11) NOT NULL,
  `eoq_in` int(11) NOT NULL,
  `stok_gudang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `nama_barang`, `keterangan`, `harga_supplier`, `gambar`, `stok_min`, `eoq_in`, `stok_gudang`) VALUES
(1, 1, 'Tepung Terigu', 'kg', '11000', 'ab.png', 10, 190, 0),
(2, 1, 'Tepung Tapioka', 'kg', '10000', 'ab.png', 3, 77, 0),
(3, 1, 'Telor', 'kg', '26000', 'ab.png', 0, 0, 0),
(4, 2, 'Ayam', 'kg', '30000', 'ab.png', 0, 0, 0),
(5, 2, 'Garam', 'bungkus', '2000', 'ab.png', 0, 0, 0),
(6, 2, 'Penyedap', 'bungkus', '500', 'ab.png', 0, 0, 0),
(7, 2, 'Minyak', 'liter', '12000', 'ab.png', 0, 0, 0),
(8, 2, 'Kentang', 'kg', '26000', 'ab.png', 0, 0, 0),
(9, 2, 'Keju', 'pcs', '20000', 'ab.png', 0, 0, 0),
(10, 2, 'Kecap', 'bungkus', '5000', 'ab.png', 0, 0, 0),
(11, 2, 'Tepung Roti', 'kg', '6000', 'ab.png', 0, 0, 0),
(12, 3, 'Ceker', 'kg', '10000', 'ab.png', 0, 0, 0),
(13, 3, 'Tulang', 'kg', '6000', 'ab.png', 0, 0, 0),
(14, 3, 'Bakso', 'bungkus', '15000', 'ab.png', 0, 0, 0),
(15, 4, 'Kulit Lumpia', 'bungkus', '5000', 'ab.png', 0, 0, 0),
(16, 4, 'Pisang', 'kg', '4000', 'ab.png', 0, 0, 0),
(17, 4, 'Coklat', 'kg', '10000', 'ab.png', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_bkeluar` int(11) NOT NULL,
  `tgl_keluar` varchar(20) NOT NULL,
  `total_bayar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_bkeluar`, `tgl_keluar`, `total_bayar`) VALUES
(3, '2024-09-11', '87500');

-- --------------------------------------------------------

--
-- Table structure for table `dbarang_keluar`
--

CREATE TABLE `dbarang_keluar` (
  `id_dbarang` int(11) NOT NULL,
  `id_bkeluar` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dbarang_keluar`
--

INSERT INTO `dbarang_keluar` (`id_dbarang`, `id_bkeluar`, `id_barang`, `jumlah`) VALUES
(3, 3, 1, 2),
(4, 3, 3, 1),
(5, 3, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_transaksi`, `id_barang`, `qty`) VALUES
(1, 1, 5, 24),
(2, 2, 8, 23),
(3, 3, 8, 25),
(4, 4, 5, 27),
(5, 5, 9, 23),
(6, 6, 2, 21),
(7, 7, 13, 26),
(8, 8, 5, 27),
(9, 9, 10, 23),
(10, 10, 11, 24),
(11, 11, 2, 26),
(12, 12, 2, 22),
(13, 13, 17, 23),
(14, 14, 5, 26),
(15, 15, 8, 30),
(16, 16, 9, 25),
(17, 17, 6, 24),
(18, 18, 4, 23),
(19, 19, 14, 25),
(20, 20, 16, 30),
(21, 21, 14, 29),
(22, 22, 13, 26),
(23, 23, 6, 29),
(24, 24, 14, 26),
(25, 25, 7, 22),
(26, 26, 17, 29),
(27, 27, 4, 26),
(28, 28, 6, 23),
(29, 29, 14, 29),
(30, 30, 4, 29),
(31, 31, 13, 26),
(32, 32, 15, 22),
(33, 33, 13, 21),
(34, 34, 1, 25),
(35, 35, 17, 25),
(36, 36, 11, 22),
(37, 37, 16, 27),
(38, 38, 3, 23),
(39, 39, 12, 22),
(40, 40, 7, 30),
(41, 41, 17, 23),
(42, 42, 6, 23),
(43, 43, 15, 26),
(44, 44, 9, 30),
(45, 45, 4, 27),
(46, 46, 6, 26),
(47, 47, 2, 25),
(48, 48, 13, 26);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Mie'),
(2, 'Cemilan'),
(3, 'Pedesan'),
(4, 'Dessert');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `level_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama`, `alamat`, `no_hp`, `username`, `password`, `level_pengguna`) VALUES
(1, 'Ubaydi', 'Kuningan', '089987612343', 'admin', 'admin', 1),
(2, 'Gudang', 'Kuningan', '089987651212', 'gudang', 'gudang', 2),
(3, 'Supplier 1', 'Kuningan', '089987654543', 'supplier', 'supplier', 3),
(5, 'Pemilik', 'Kuningan', '089987654543', 'pemilik', 'pemilik', 4);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `total_bayar` varchar(20) NOT NULL,
  `stat_pembayaran` int(11) NOT NULL,
  `bukti_bayar` text NOT NULL,
  `stat_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pengguna`, `tgl`, `total_bayar`, `stat_pembayaran`, `bukti_bayar`, `stat_transaksi`) VALUES
(1, 3, '2024-08-01', '48000', 1, '0', 3),
(2, 3, '2024-09-02', '598000', 1, '0', 3),
(3, 3, '2024-09-03', '650000', 1, '0', 3),
(4, 3, '2024-09-04', '54000', 1, '0', 3),
(5, 3, '2024-09-05', '460000', 1, '0', 3),
(6, 3, '2024-09-06', '210000', 1, '0', 3),
(7, 3, '2024-09-07', '156000', 1, '0', 3),
(8, 3, '2024-09-08', '54000', 1, '0', 3),
(9, 3, '2024-09-09', '115000', 1, '0', 3),
(10, 3, '2024-09-10', '144000', 1, '0', 3),
(11, 3, '2024-09-11', '260000', 1, '0', 3),
(12, 3, '2024-09-12', '220000', 1, '0', 3),
(13, 3, '2024-09-13', '230000', 1, '0', 3),
(14, 3, '2024-09-14', '52000', 1, '0', 3),
(15, 3, '2024-09-15', '780000', 1, '0', 3),
(16, 3, '2024-09-16', '500000', 1, '0', 3),
(17, 3, '2024-09-17', '12000', 1, '0', 3),
(18, 3, '2024-09-18', '690000', 1, '0', 3),
(19, 3, '2024-09-19', '375000', 1, '0', 3),
(20, 3, '2024-09-20', '120000', 1, '0', 3),
(21, 3, '2024-09-21', '435000', 1, '0', 3),
(22, 3, '2024-09-22', '156000', 1, '0', 3),
(23, 3, '2024-09-23', '14500', 1, '0', 3),
(24, 3, '2024-09-24', '390000', 1, '0', 3),
(25, 3, '2024-09-25', '264000', 1, '0', 3),
(26, 3, '2024-09-26', '290000', 1, '0', 3),
(27, 3, '2024-09-27', '780000', 1, '0', 3),
(28, 3, '2024-09-28', '11500', 1, '0', 3),
(29, 3, '2024-09-29', '435000', 1, '0', 3),
(30, 3, '2024-09-30', '870000', 1, '0', 3),
(31, 3, '2024-09-01', '156000', 1, '0', 3),
(32, 3, '2024-09-02', '110000', 1, '0', 3),
(33, 3, '2024-09-03', '126000', 1, '0', 3),
(34, 3, '2024-09-04', '275000', 1, '0', 3),
(35, 3, '2024-09-05', '250000', 1, '0', 3),
(36, 3, '2024-09-06', '132000', 1, '0', 3),
(37, 3, '2024-09-07', '108000', 1, '0', 3),
(38, 3, '2024-09-08', '598000', 1, '0', 3),
(39, 3, '2024-09-09', '220000', 1, '0', 3),
(40, 3, '2024-09-10', '360000', 1, '0', 3),
(41, 3, '2024-09-11', '230000', 1, '0', 3),
(42, 3, '2024-09-12', '11500', 1, '0', 3),
(43, 3, '2024-09-13', '130000', 1, '0', 3),
(44, 3, '2024-09-14', '600000', 1, '0', 3),
(45, 3, '2024-09-15', '810000', 1, '0', 3),
(46, 3, '2024-09-16', '13000', 1, '0', 3),
(47, 3, '2024-09-17', '250000', 1, '0', 3),
(48, 3, '2024-09-18', '156000', 1, '0', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analisis`
--
ALTER TABLE `analisis`
  ADD PRIMARY KEY (`id_analisis`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_bkeluar`);

--
-- Indexes for table `dbarang_keluar`
--
ALTER TABLE `dbarang_keluar`
  ADD PRIMARY KEY (`id_dbarang`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analisis`
--
ALTER TABLE `analisis`
  MODIFY `id_analisis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_bkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dbarang_keluar`
--
ALTER TABLE `dbarang_keluar`
  MODIFY `id_dbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
