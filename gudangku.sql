-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2023 at 06:12 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gudangku`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `jenis_barang`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'BAR00001', 'Tinta Epson 003 Black', 'Tinta', '2023-07-10 06:33:30', '2023-07-10 06:33:30', '2023-07-10 06:33:30'),
(2, 'BAR00002', 'Tinta Epson 003 Cyan', 'Jadi', '2023-07-11 03:23:23', '2023-07-11 03:23:23', '0000-00-00 00:00:00'),
(3, 'BAR00003', 'Tinta Epson 003 Yellow', 'Jadi', '2023-07-11 08:23:26', '2023-07-11 08:23:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barang_keluar`, `id_barang`, `tanggal`, `jumlah`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '2023-07-11 21:10:39', 50, '2023-07-12 06:10:39', '2023-07-12 06:10:39', '2023-07-12 06:10:39');

--
-- Triggers `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `persediaan_after_out` AFTER INSERT ON `barang_keluar` FOR EACH ROW UPDATE persediaan  
SET 
  jumlah = jumlah-NEW.jumlah
WHERE 
  id_barang = NEW.id_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `id_barang`, `tanggal`, `jumlah`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1, '2023-07-11 21:01:18', 100, '2023-07-12 06:01:18', '2023-07-12 06:01:18', '2023-07-12 06:01:18'),
(3, 1, '2023-07-11 21:07:14', 100, '2023-07-12 06:07:14', '2023-07-12 06:07:14', '2023-07-12 06:07:14');

--
-- Triggers `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `persediaan_after_in` AFTER INSERT ON `barang_masuk` FOR EACH ROW UPDATE persediaan  
SET 
  jumlah = jumlah+NEW.jumlah
WHERE 
  id_barang = NEW.id_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `persediaan`
--

CREATE TABLE `persediaan` (
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_masuk` datetime NOT NULL,
  `tanggal_keluar` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `persediaan`
--

INSERT INTO `persediaan` (`id_barang`, `jumlah`, `tanggal_masuk`, `tanggal_keluar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 150, '2023-07-11 21:06:09', '2023-07-12 06:06:09', '2023-07-12 06:06:09', '2023-07-12 06:06:09', '2023-07-12 06:06:09');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id_supplier` int(11) NOT NULL,
  `kode_supplier` varchar(20) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jenis_supplier` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id_supplier`, `kode_supplier`, `nama_supplier`, `alamat`, `kota`, `telp`, `email`, `jenis_supplier`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SUP00001', 'PT. Monotaro', 'Jl. Kalimalang', 'Bekasi', '0212984479200', 'monotaro@monotaro.co.id', 'Barang', '2023-07-03 22:21:21', '2023-07-03 22:21:21', '0000-00-00 00:00:00'),
(2, 'SUP00002', 'PT. Sangga Buana berkah', 'Jl. Raya Badami', 'Karawang', '021388578860', 'sanggabuanaberkah@sbb.co.id', 'Barang & Jasa', '2023-07-03 22:26:38', '2023-07-03 22:26:38', '0000-00-00 00:00:00'),
(3, 'SUP00003', 'PT. Bintang Berkah Perkasa', 'Jl. Ahmad Yani', 'Karawang', '021698937877', 'bintangberkahperkasa@bbp.co.id', 'Barang & Jasa', '2023-07-10 04:02:56', '2023-07-10 04:02:56', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_barang_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barang_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
