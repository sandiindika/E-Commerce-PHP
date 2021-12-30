-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2021 at 05:33 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barley`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(35) NOT NULL,
  `harga` varchar(35) NOT NULL,
  `stok` varchar(35) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`, `stok`, `gambar`, `id_kategori`) VALUES
(51, 'Kue Jahe', '20000', '20', 'kue jahe.jpg', 10),
(52, 'Kue Kacang Tanah', '20000', '20', 'kue kacang tanah.jpg', 10),
(53, 'Kue Kastangel', '20000', '20', 'kue kastangel.jpg', 10),
(54, 'Kue Kering Keju', '20000', '20', 'kue kering keju.jpg', 10),
(55, 'Kue Mentega', '20000', '20', 'kue mentega.jpg', 10),
(56, 'Kue Nastar', '20000', '20', 'kue nastar.jpg', 10),
(57, 'Kue Pastel Abon', '20000', '20', 'kue pastel abon.jpg', 10),
(48, 'Kembang Goyang', '20000', '20', 'kembang goyang.jpg', 10),
(49, 'Kue Choco Chips', '20000', '20', 'kue choco chips.jpg', 10),
(50, 'Kue Coklat', '20000', '20', 'kue coklat.jpg', 10),
(37, 'Bika', '20000', '20', 'bika.jpg', 8),
(38, 'Getuk', '15000', '20', 'getuk.jpg', 8),
(39, 'Klepon', '20000', '20', 'klepon.jpg', 8),
(40, 'Kue cucur', '20000', '20', 'kue cucur.jpg', 8),
(41, 'Kue lumpur', '15000', '20', 'kue lumpur.jpg', 8),
(42, 'Kue Pancong', '15000', '20', 'kue pancong.jpg', 8),
(43, 'Kue Putu', '15000', '20', 'kue putu.jpg', 8),
(44, 'Pukis', '20000', '20', 'pukis.jpg', 8),
(58, 'Kue Putri Salju', '20000', '20', 'kue putri salju.jpg', 10),
(46, 'Putu Wayang', '20000', '20', 'putu wayang.jpg', 8),
(47, 'Serabi', '20000', '20', 'serabi.jpg', 8),
(59, 'Banana Muffin', '20000', '20', 'banana muffin.jpg', 13),
(60, 'Blueberry crumble muffin', '20000', '20', 'blueberry crumble muffin.jpg', 13),
(61, 'Chesee muffin', '20000', '20', 'chesee muffin.jpg', 13),
(62, 'Chocochip muffin', '20000', '20', 'chocochip muffin.jpg', 13),
(63, 'Chocolate Muffin', '20000', '20', 'chocolate muffin.jpg', 13),
(64, 'Espresso Banana Muffins', '20000', '20', 'espresso banana muffins.jpg', 13),
(65, 'Muffin Tape Keju', '20000', '20', 'muffin tape keju.jpg', 13),
(66, 'Muffin Ubi Merah', '20000', '20', 'muffin ubi merah.jpg', 13),
(67, 'Stroberi Muffin', '20000', '20', 'stroberi muffin.jpg', 13),
(68, 'Chocolate Cupcakes', '20000', '20', 'chocolate cupcakes.jpg', 14),
(69, 'Chocolate Cupcakes with Raspberry', '20000', '20', 'chocolate cupcakes with raspberry buttercream.jpg', 14),
(70, 'Coffee Cupcake', '20000', '20', 'coffee cupcake.jpg', 14),
(71, 'Berry Cupcake', '20000', '20', 'berry cupcake.jpg', 14),
(72, 'Lollipop Cupcake', '20000', '20', 'lollipop cupcake.jpg', 14),
(73, 'Vanilla Cupcake', '20000', '20', 'vanilla cupcake.jpg', 14);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(8, 'Kue Basah'),
(10, 'Kue Kering'),
(13, 'Muffin'),
(14, 'Cupcake');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `harga_barang` varchar(25) NOT NULL,
  `jumlah_beli` varchar(25) NOT NULL,
  `status` varchar(30) NOT NULL,
  `waktu` varchar(50) NOT NULL,
  `total` varchar(25) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `hak` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama`, `jenis_kelamin`, `tgl_lahir`, `username`, `password`, `hak`) VALUES
(1, 'Barley Bakery Admin', 'Laki-laki', '1997-02-25', 'admin', 'admin', 'admin'),
(2, 'Devi ', 'Perempuan', '2003-02-20', 'devi', 'devi', 'pengguna');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `waktu_transaksi` varchar(50) NOT NULL,
  `subtotal` varchar(25) NOT NULL,
  `status_transaksi` varchar(30) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

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
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
