-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2018 at 06:38 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adventure`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(99) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_lengkap`, `username`, `password`, `jenis_kelamin`, `agama`, `alamat`, `foto`) VALUES
(6, 'Rama', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Laki-laki', 'Islam', '', 'RAMA.JPG.png');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(99) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `isi_pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id_category` int(99) NOT NULL,
  `nama_category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id_category`, `nama_category`) VALUES
(2, 'Peralatan Camp'),
(3, 'Peralatan RC'),
(4, 'Peralatan Pendaki');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keranjang`
--

CREATE TABLE `tbl_keranjang` (
  `id_keranjang` int(99) NOT NULL,
  `id_produk` int(99) NOT NULL,
  `id_pembeli` varchar(500) NOT NULL,
  `tanggal_keranjang` text NOT NULL,
  `jam_keranjang` text NOT NULL,
  `qty` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_keranjang`
--

INSERT INTO `tbl_keranjang` (`id_keranjang`, `id_produk`, `id_pembeli`, `tanggal_keranjang`, `jam_keranjang`, `qty`) VALUES
(8, 15, 'Intan Widya Wati', '2018-11-16', '21:09:02', 5),
(9, 7, 'Intan Widya Wati', '2018-11-16', '21:09:35', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_pemesan`
--

CREATE TABLE `tbl_order_pemesan` (
  `id_order` int(99) NOT NULL,
  `nama_category` varchar(500) NOT NULL,
  `nama_produk` varchar(500) NOT NULL,
  `tanggal_order` date NOT NULL,
  `jam_order` time NOT NULL,
  `status_order` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kode_pos` varchar(20) NOT NULL,
  `kontak` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `harga` varchar(500) NOT NULL,
  `harga_total` varchar(5000) NOT NULL,
  `foto` varchar(5000) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `status_transaksi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order_pemesan`
--

INSERT INTO `tbl_order_pemesan` (`id_order`, `nama_category`, `nama_produk`, `tanggal_order`, `jam_order`, `status_order`, `nama_lengkap`, `email`, `kode_pos`, `kontak`, `alamat`, `harga`, `harga_total`, `foto`, `qty`, `status_transaksi`) VALUES
(3, 'Peralatan Camp', 'Tenda terpal', '2018-12-10', '09:29:28', 'Lunas', 'rama alfareza', 'ramaalfareza999@gmail.com', '452121', '08982828287', 'jl.sesama', '100.000', '100', 'RAMA.JPG.png', '1', 'Sudah Transaksi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembeli`
--

CREATE TABLE `tbl_pembeli` (
  `id_pembeli` int(99) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto_pembeli` varchar(500) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `handphone` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembeli`
--

INSERT INTO `tbl_pembeli` (`id_pembeli`, `username`, `password`, `foto_pembeli`, `nama_lengkap`, `handphone`, `jenis_kelamin`, `alamat`) VALUES
(19, 'ramaalfareza999@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '', 'rama alfareza', '08973474769', 'Laki-laki', 'jl.sesama'),
(20, 'rama@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '', 'Rama Alfareza', '08973474769', 'Laki-laki', 'jl.bahagia'),
(21, 'aki@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 'Akika', '08973474769', 'Perempuan', 'Junti');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(99) NOT NULL,
  `id_category` int(99) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` varchar(100) NOT NULL,
  `stok_barang` varchar(100) NOT NULL,
  `gambar_produk` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `id_category`, `nama_produk`, `deskripsi`, `harga`, `stok_barang`, `gambar_produk`) VALUES
(3, 4, 'Sepatu Eiger', 'Sepatu Tracking cocok untuk kamu yang ingin mendaki', '1500000', '10', 'sepatu2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spa`
--

CREATE TABLE `tbl_spa` (
  `id_spa` int(99) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_spa`
--

INSERT INTO `tbl_spa` (`id_spa`, `nama`, `alamat`, `foto`) VALUES
(1, 'Rama Alfareza', 'jl.Jendral sudirman no.08', 'IMG-20180715-WA0186.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscribe`
--

CREATE TABLE `tbl_subscribe` (
  `id_subscribe` int(99) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimoni`
--

CREATE TABLE `tbl_testimoni` (
  `id_testimoni` int(99) NOT NULL,
  `id_produk` int(99) NOT NULL,
  `id_category` int(99) NOT NULL,
  `nama_komentar` varchar(50) NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `isi_komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_testimoni`
--

INSERT INTO `tbl_testimoni` (`id_testimoni`, `id_produk`, `id_category`, `nama_komentar`, `kontak`, `email`, `isi_komentar`) VALUES
(1, 2, 2, 'rama', '08982828287', 'Rama@gmail.com', 'Mantap josss');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(99) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `kontak` varchar(30) NOT NULL,
  `foto_transaksi` varchar(500) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `tbl_order_pemesan`
--
ALTER TABLE `tbl_order_pemesan`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `tbl_pembeli`
--
ALTER TABLE `tbl_pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tbl_spa`
--
ALTER TABLE `tbl_spa`
  ADD PRIMARY KEY (`id_spa`);

--
-- Indexes for table `tbl_subscribe`
--
ALTER TABLE `tbl_subscribe`
  ADD PRIMARY KEY (`id_subscribe`);

--
-- Indexes for table `tbl_testimoni`
--
ALTER TABLE `tbl_testimoni`
  ADD PRIMARY KEY (`id_testimoni`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(99) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id_category` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  MODIFY `id_keranjang` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_order_pemesan`
--
ALTER TABLE `tbl_order_pemesan`
  MODIFY `id_order` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pembeli`
--
ALTER TABLE `tbl_pembeli`
  MODIFY `id_pembeli` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_spa`
--
ALTER TABLE `tbl_spa`
  MODIFY `id_spa` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_subscribe`
--
ALTER TABLE `tbl_subscribe`
  MODIFY `id_subscribe` int(99) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_testimoni`
--
ALTER TABLE `tbl_testimoni`
  MODIFY `id_testimoni` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(99) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
