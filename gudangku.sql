-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2023 at 09:04 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
  `kode_barang_keluar` int(11) NOT NULL,
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

INSERT INTO `barang_keluar` (`id_barang_keluar`, `kode_barang_keluar`, `id_barang`, `tanggal`, `jumlah`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 1, '2023-07-11 21:10:39', 50, '2023-07-12 06:10:39', '2023-07-12 06:10:39', '2023-07-12 06:10:39');

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
  `kode_barang_masuk` varchar(100) NOT NULL,
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

INSERT INTO `barang_masuk` (`id_barang_masuk`, `kode_barang_masuk`, `id_barang`, `tanggal`, `jumlah`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '20230713103815', 1, '2023-07-13 00:00:00', 200, '2023-07-13 03:38:29', '2023-07-13 03:38:29', '0000-00-00 00:00:00');

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
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `persediaan`
--

INSERT INTO `persediaan` (`id_barang`, `jumlah`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 550, '2023-07-12 06:06:09', '2023-07-12 06:06:09', '2023-07-12 06:06:09');

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
(1, '6752608', 'Yayasan Handayani', 'Kpg. Bappenas No. 326', 'Banda Aceh', '0235 7842 3609', 'uyainah.murti@maulana.info', 'incidunt', '2023-07-13 05:54:18', '2023-07-13 05:54:18', '0000-00-00 00:00:00'),
(2, '2052411', 'Perum Ardianto', 'Ki. Lembong No. 133', 'Binjai', '0772 9335 3495', 'bakda98@utami.com', 'facilis', '2023-07-13 05:54:18', '2023-07-13 05:54:18', '0000-00-00 00:00:00'),
(3, '6137379', 'UD Iswahyudi Andriani (Persero) Tbk', 'Jr. Ekonomi No. 614', 'Palopo', '(+62) 559 6820 9142', 'fwastuti@astuti.net', 'tempora', '2023-07-13 05:54:18', '2023-07-13 05:54:18', '0000-00-00 00:00:00'),
(4, '7910029', 'PT Nasyiah (Persero) Tbk', 'Jln. Bata Putih No. 606', 'Banjar', '0287 9833 267', 'victoria32@pudjiastuti.mil.id', 'quia', '2023-07-13 05:54:18', '2023-07-13 05:54:18', '0000-00-00 00:00:00'),
(5, '8253294', 'Fa Namaga', 'Ds. Baabur Royan No. 211', 'Pasuruan', '(+62) 673 3230 9890', 'unamaga@purwanti.web.id', 'qui', '2023-07-13 05:54:18', '2023-07-13 05:54:18', '0000-00-00 00:00:00'),
(6, '5345119', 'Yayasan Yulianti Hasanah', 'Dk. Siliwangi No. 909', 'Prabumulih', '(+62) 284 1271 466', 'orahmawati@kusmawati.org', 'rerum', '2023-07-13 05:54:18', '2023-07-13 05:54:18', '0000-00-00 00:00:00'),
(7, '8380459', 'Fa Najmudin Nurdiyanti', 'Ds. Imam No. 741', 'Sungai Penuh', '(+62) 848 189 034', 'prakasa.ella@oktaviani.asia', 'maxime', '2023-07-13 05:54:18', '2023-07-13 05:54:18', '0000-00-00 00:00:00'),
(8, '8889308', 'Yayasan Januar', 'Ki. Baja No. 480', 'Jambi', '(+62) 492 4192 089', 'salwa43@natsir.org', 'et', '2023-07-13 05:54:18', '2023-07-13 05:54:18', '0000-00-00 00:00:00'),
(9, '4062843', 'PJ Mansur', 'Jln. Barasak No. 679', 'Dumai', '(+62) 899 087 330', 'usada.balangga@laksmiwati.tv', 'quia', '2023-07-13 05:54:18', '2023-07-13 05:54:18', '0000-00-00 00:00:00'),
(10, '6779315', 'Yayasan Fujiati Nurdiyanti', 'Jr. Kalimalang No. 870', 'Balikpapan', '025 7341 5569', 'prayitna43@oktaviani.name', 'consequuntur', '2023-07-13 05:54:18', '2023-07-13 05:54:18', '0000-00-00 00:00:00'),
(11, '9684590', 'UD Budiyanto Usamah', 'Jr. Baan No. 53', 'Parepare', '(+62) 25 3212 516', 'raisa.samosir@kusmawati.name', 'ea', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(12, '7463929', 'UD Yulianti Januar', 'Kpg. Honggowongso No. 168', 'Tomohon', '(+62) 653 1015 2823', 'raharja91@nasyiah.or.id', 'et', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(13, '7241562', 'PD Hassanah Haryanto', 'Jln. Sutami No. 351', 'Pasuruan', '0367 3793 123', 'pratama.maria@pradipta.com', 'culpa', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(14, '4137119', 'Fa Wacana Tbk', 'Gg. Basuki No. 192', 'Kotamobagu', '0318 7050 9694', 'wlaksita@astuti.web.id', 'in', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(15, '2573526', 'PT Andriani Riyanti', 'Ds. Balikpapan No. 499', 'Pasuruan', '0950 1352 2658', 'pkuswandari@hassanah.mil.id', 'non', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(16, '2539866', 'CV Rahmawati', 'Jr. Suprapto No. 436', 'Tanjung Pinang', '0265 9527 430', 'wulandari.padma@gunarto.net', 'reprehenderit', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(17, '4925930', 'PT Suartini', 'Gg. Panjaitan No. 634', 'Padangsidempuan', '0714 5458 369', 'malika.situmorang@pudjiastuti.asia', 'sit', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(18, '3840532', 'Perum Manullang', 'Ds. B.Agam Dlm No. 329', 'Bekasi', '(+62) 447 7043 9859', 'ganjaran29@simbolon.org', 'voluptates', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(19, '2058381', 'PT Lestari (Persero) Tbk', 'Psr. Cikutra Timur No. 454', 'Kupang', '(+62) 985 5247 907', 'elisa80@wahyuni.my.id', 'eligendi', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(20, '8035931', 'PT Kurniawan Ramadan (Persero) Tbk', 'Jr. Antapani Lama No. 299', 'Bengkulu', '(+62) 953 8160 1175', 'fitriani17@laksita.net', 'porro', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(21, '4045323', 'Fa Setiawan (Persero) Tbk', 'Kpg. Yap Tjwan Bing No. 866', 'Cirebon', '(+62) 276 6026 8682', 'zelaya74@usamah.web.id', 'omnis', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(22, '4521754', 'Yayasan Simbolon (Persero) Tbk', 'Gg. Bagonwoto  No. 611', 'Padangpanjang', '0504 2603 365', 'leo14@wasita.biz', 'fugiat', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(23, '1690922', 'Yayasan Mustofa Manullang', 'Dk. Kiaracondong No. 400', 'Lubuklinggau', '0674 5434 0713', 'prasetya.paris@aryani.tv', 'quisquam', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(24, '3762721', 'Fa Prayoga Tbk', 'Dk. Monginsidi No. 28', 'Bima', '0295 9601 985', 'lmanullang@waskita.desa.id', 'qui', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(25, '6994615', 'UD Winarno Pradana', 'Ki. Bagas Pati No. 786', 'Banjar', '0962 0055 612', 'zizi.nasyidah@winarsih.co.id', 'aut', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(26, '9379089', 'UD Yolanda Tbk', 'Kpg. Bhayangkara No. 188', 'Tegal', '(+62) 527 3195 123', 'yuliarti.mitra@saragih.sch.id', 'rem', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(27, '7386880', 'Fa Mayasari', 'Ki. Basket No. 720', 'Tanjung Pinang', '0526 0773 8033', 'pudjiastuti.ani@haryanti.sch.id', 'modi', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(28, '3335027', 'UD Yolanda (Persero) Tbk', 'Dk. Bacang No. 937', 'Probolinggo', '0842 002 513', 'ysitumorang@salahudin.biz', 'facilis', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(29, '4965232', 'Perum Hidayanto Sitorus (Persero) Tbk', 'Kpg. Barasak No. 334', 'Tarakan', '(+62) 920 2646 3587', 'shakila04@widodo.name', 'enim', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(30, '4666928', 'UD Tampubolon Gunarto', 'Kpg. Banceng Pondok No. 148', 'Madiun', '(+62) 433 0503 738', 'diana.mayasari@tampubolon.desa.id', 'quasi', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(31, '8334280', 'Fa Zulkarnain Permata (Persero) Tbk', 'Psr. Gajah No. 174', 'Gunungsitoli', '(+62) 784 8564 9843', 'purwanti.cawisadi@budiman.ac.id', 'veritatis', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(32, '6422277', 'PJ Prasasta Rahmawati (Persero) Tbk', 'Kpg. Katamso No. 126', 'Medan', '0361 7899 9598', 'hdabukke@wibisono.web.id', 'in', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(33, '3358357', 'PD Mayasari Tbk', 'Gg. Agus Salim No. 525', 'Padang', '0219 4347 6405', 'bahuwarna04@utami.in', 'quasi', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(34, '4649002', 'PT Wahyudin Purwanti (Persero) Tbk', 'Dk. B.Agam Dlm No. 710', 'Pekalongan', '0788 6434 840', 'sari.utami@wijaya.com', 'voluptatem', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(35, '6654619', 'CV Hasanah Tbk', 'Psr. Ekonomi No. 307', 'Banda Aceh', '(+62) 822 3663 1177', 'dnovitasari@najmudin.mil.id', 'ipsam', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(36, '1529171', 'Perum Kuswandari Fujiati Tbk', 'Jln. R.E. Martadinata No. 798', 'Bandung', '0271 0478 283', 'pratiwi.wakiman@kurniawan.com', 'tempora', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(37, '9443177', 'PJ Firmansyah', 'Ki. Bhayangkara No. 663', 'Pagar Alam', '(+62) 435 3987 919', 'zulkarnain.gabriella@simbolon.in', 'rerum', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(38, '6867818', 'Perum Nuraini Sihombing (Persero) Tbk', 'Gg. Adisumarmo No. 825', 'Bontang', '0217 3847 232', 'mulyani.indah@manullang.desa.id', 'sint', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(39, '3551915', 'Perum Rahmawati Uwais Tbk', 'Dk. Ketandan No. 186', 'Subulussalam', '0477 6641 7210', 'rahmi.halim@pradana.co.id', 'placeat', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(40, '7074132', 'Fa Hassanah Tarihoran', 'Ds. Supomo No. 91', 'Banda Aceh', '0325 8167 659', 'xhabibi@zulkarnain.web.id', 'et', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(41, '8047015', 'PJ Mansur', 'Jln. Halim No. 172', 'Sawahlunto', '(+62) 22 4912 4166', 'gsamosir@prabowo.biz.id', 'sequi', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(42, '4768639', 'PJ Firgantoro', 'Ki. Kali No. 373', 'Kupang', '0387 4351 7544', 'manullang.carla@laksmiwati.mil.id', 'nihil', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(43, '5496418', 'Fa Salahudin Wibowo', 'Dk. Bambu No. 588', 'Administrasi Jakarta Selatan', '(+62) 413 4612 046', 'halimah.ikhsan@kusmawati.name', 'quis', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(44, '7821843', 'PD Wahyudin Setiawan', 'Kpg. Teuku Umar No. 361', 'Administrasi Jakarta Utara', '(+62) 574 8663 212', 'raisa.pudjiastuti@suryatmi.co.id', 'aut', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(45, '3059087', 'PJ Puspita (Persero) Tbk', 'Ki. Basoka Raya No. 137', 'Singkawang', '(+62) 25 9341 957', 'rahayu.clara@agustina.in', 'architecto', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(46, '6706623', 'PT Prastuti', 'Psr. Rajawali Barat No. 322', 'Magelang', '0365 6341 5143', 'tarihoran.kala@ardianto.biz', 'quia', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(47, '1963389', 'PJ Simanjuntak (Persero) Tbk', 'Psr. HOS. Cjokroaminoto (Pasirkaliki) No. 438', 'Cilegon', '0511 1068 799', 'astuti.labuh@riyanti.desa.id', 'animi', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(48, '8958898', 'Fa Rahayu', 'Psr. Yohanes No. 974', 'Bekasi', '0869 823 183', 'halimah.mulya@hastuti.asia', 'dignissimos', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(49, '5932824', 'Yayasan Mustofa Haryanti', 'Psr. Agus Salim No. 421', 'Tangerang', '0429 5838 323', 'yuliana30@yolanda.biz.id', 'libero', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(50, '3485177', 'PD Usada', 'Dk. Zamrud No. 303', 'Subulussalam', '0571 8224 162', 'jailani.maras@maulana.biz.id', 'velit', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(51, '6751425', 'Yayasan Wibowo', 'Ds. Imam No. 607', 'Semarang', '(+62) 897 705 624', 'latif35@pertiwi.com', 'omnis', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(52, '7293873', 'UD Pratama', 'Psr. Dipenogoro No. 620', 'Pematangsiantar', '0585 9210 7599', 'laksana42@najmudin.my.id', 'perspiciatis', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(53, '3116709', 'PT Napitupulu Hastuti Tbk', 'Kpg. Cikutra Timur No. 247', 'Jambi', '(+62) 841 291 533', 'ika19@maryati.biz.id', 'deleniti', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(54, '8187599', 'PT Uyainah (Persero) Tbk', 'Kpg. Bakit  No. 849', 'Tanjung Pinang', '(+62) 762 9328 611', 'sidiq.maryati@adriansyah.ac.id', 'consectetur', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(55, '1954490', 'Fa Wibowo Maheswara (Persero) Tbk', 'Ds. Labu No. 694', 'Lubuklinggau', '0660 4680 4072', 'prabowo25@haryanti.co.id', 'rerum', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(56, '9854900', 'PD Puspasari', 'Gg. Halim No. 415', 'Administrasi Jakarta Pusat', '0899 652 713', 'sprastuti@hardiansyah.or.id', 'ipsam', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(57, '5095631', 'Perum Saptono Tbk', 'Ki. Sukabumi No. 188', 'Kediri', '028 1959 261', 'jsitumorang@nurdiyanti.co', 'qui', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(58, '2858273', 'Fa Mayasari', 'Psr. Ahmad Dahlan No. 661', 'Semarang', '(+62) 460 3408 313', 'haryanti.safina@hidayat.asia', 'voluptates', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(59, '8243286', 'CV Haryanti Sudiati', 'Ds. Rajawali Barat No. 677', 'Kupang', '028 5804 5332', 'cemplunk90@firgantoro.biz', 'aut', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(60, '5271024', 'Fa Pratiwi', 'Kpg. Yos No. 621', 'Administrasi Jakarta Timur', '028 8525 805', 'usada.shakila@rahmawati.or.id', 'facere', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(61, '8141595', 'Perum Pertiwi Prabowo Tbk', 'Jr. K.H. Wahid Hasyim (Kopo) No. 829', 'Pagar Alam', '0295 5419 137', 'aris91@novitasari.name', 'debitis', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(62, '4098222', 'Perum Firmansyah', 'Dk. Nakula No. 787', 'Balikpapan', '(+62) 25 2664 454', 'ztarihoran@hidayat.org', 'quos', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(63, '4664021', 'Yayasan Rajasa Mangunsong', 'Gg. Mulyadi No. 409', 'Bandar Lampung', '(+62) 760 7807 6594', 'saragih.bella@siregar.go.id', 'autem', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(64, '8961117', 'Perum Astuti Sinaga', 'Kpg. Monginsidi No. 392', 'Ambon', '0873 2233 126', 'anom.mansur@pudjiastuti.co', 'et', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(65, '1123842', 'PJ Mayasari', 'Jr. Untung Suropati No. 508', 'Tanjung Pinang', '0879 3598 924', 'bnamaga@puspasari.name', 'est', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(66, '4359284', 'UD Mandasari Wijayanti', 'Dk. Dahlia No. 540', 'Padangsidempuan', '(+62) 808 447 938', 'laksmiwati.kasusra@kusumo.name', 'nam', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(67, '1132691', 'Fa Wijayanti Tbk', 'Jln. Bata Putih No. 397', 'Cilegon', '0553 0011 0482', 'umelani@yolanda.biz.id', 'quo', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(68, '2622898', 'PD Marpaung Tarihoran', 'Ds. Yogyakarta No. 463', 'Sorong', '(+62) 249 4328 2273', 'niyaga86@hidayat.tv', 'rerum', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(69, '5530218', 'CV Anggraini (Persero) Tbk', 'Jln. Sentot Alibasa No. 138', 'Bogor', '(+62) 618 8479 037', 'nasyidah.indah@lailasari.web.id', 'molestias', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(70, '1889533', 'Fa Winarsih', 'Jr. Siliwangi No. 930', 'Padang', '(+62) 479 7277 2956', 'nsudiati@nasyidah.sch.id', 'rem', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(71, '8546904', 'Perum Puspita Nurdiyanti', 'Kpg. Sutami No. 881', 'Palu', '(+62) 471 7813 8325', 'kamila.pradipta@pratiwi.go.id', 'et', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(72, '3867007', 'Yayasan Firmansyah Salahudin', 'Dk. K.H. Wahid Hasyim (Kopo) No. 935', 'Tarakan', '(+62) 424 9774 604', 'citra.winarsih@fujiati.my.id', 'maiores', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(73, '9858126', 'CV Hasanah Hutagalung', 'Dk. Pasirkoja No. 624', 'Sawahlunto', '0843 290 019', 'jarwa.puspita@pertiwi.info', 'ad', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(74, '2841229', 'PT Yolanda Mulyani Tbk', 'Psr. Salak No. 64', 'Bitung', '023 7567 111', 'prasetyo.lili@permata.sch.id', 'nesciunt', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(75, '9208217', 'PT Agustina Firgantoro', 'Gg. Antapani Lama No. 43', 'Depok', '(+62) 312 6600 621', 'yulianti.hasta@wastuti.biz.id', 'accusamus', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(76, '2088259', 'PD Kusmawati (Persero) Tbk', 'Jln. Ciumbuleuit No. 191', 'Surakarta', '0697 6021 3013', 'belinda50@wahyuni.go.id', 'ea', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(77, '2410992', 'Fa Prasetya', 'Psr. Bakau No. 917', 'Yogyakarta', '(+62) 872 7410 4663', 'saptono.langgeng@nurdiyanti.web.id', 'aspernatur', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(78, '4201334', 'Yayasan Maulana Widiastuti', 'Ds. Orang No. 883', 'Mojokerto', '(+62) 247 9442 1766', 'pmustofa@utami.web.id', 'rerum', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(79, '9739721', 'CV Sudiati Tbk', 'Kpg. Bawal No. 150', 'Madiun', '(+62) 924 8040 5503', 'fujiati.garang@sitompul.biz', 'enim', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(80, '9083663', 'Perum Simanjuntak Kusmawati', 'Jr. Perintis Kemerdekaan No. 148', 'Sorong', '(+62) 805 3099 533', 'lurhur.sudiati@nainggolan.tv', 'ipsam', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(81, '6052985', 'Yayasan Samosir', 'Psr. Ciwastra No. 642', 'Bukittinggi', '0628 7949 748', 'capa59@mansur.ac.id', 'vero', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(82, '4792487', 'PT Utami Tbk', 'Gg. Ciumbuleuit No. 931', 'Serang', '0862 0823 266', 'ilsa.pudjiastuti@putra.id', 'eligendi', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(83, '7635896', 'UD Firmansyah', 'Jln. Uluwatu No. 296', 'Banjar', '(+62) 23 9815 366', 'yuni87@pratiwi.tv', 'natus', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(84, '4636275', 'CV Widodo Gunarto', 'Jr. Suryo Pranoto No. 48', 'Cilegon', '(+62) 502 8784 778', 'wijaya.jayadi@agustina.my.id', 'et', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(85, '1964188', 'CV Yolanda Natsir (Persero) Tbk', 'Ki. Abdul. Muis No. 585', 'Administrasi Jakarta Timur', '0786 3506 1170', 'cecep.hutasoit@mayasari.mil.id', 'aut', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(86, '5827604', 'Fa Suartini Pratiwi', 'Kpg. Setiabudhi No. 109', 'Pangkal Pinang', '(+62) 29 6092 0732', 'laksmiwati.drajat@hasanah.co.id', 'ipsa', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(87, '6950790', 'Perum Winarsih Firgantoro Tbk', 'Ki. Abdullah No. 593', 'Pariaman', '0389 8327 0847', 'whastuti@mulyani.my.id', 'aliquid', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(88, '6732217', 'Perum Mandasari Palastri Tbk', 'Ds. Salatiga No. 842', 'Banjarbaru', '0289 4060 787', 'latika.kusmawati@pertiwi.com', 'mollitia', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(89, '4236909', 'Fa Damanik Pradipta', 'Psr. Yohanes No. 114', 'Sawahlunto', '(+62) 516 0767 667', 'ihandayani@wulandari.biz.id', 'praesentium', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(90, '9874745', 'PT Haryanto Tbk', 'Psr. Moch. Toha No. 774', 'Prabumulih', '(+62) 370 0320 5012', 'rahman.wacana@puspita.mil.id', 'labore', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(91, '9782885', 'Yayasan Pudjiastuti', 'Kpg. Sugiyopranoto No. 698', 'Kupang', '0260 9303 1645', 'cager.halimah@zulaika.asia', 'neque', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(92, '7694883', 'PD Mangunsong', 'Ki. Rajiman No. 948', 'Banda Aceh', '(+62) 784 2213 5392', 'mulyani.garang@maulana.go.id', 'quibusdam', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(93, '6279698', 'PD Napitupulu Simanjuntak', 'Ki. Bappenas No. 771', 'Bukittinggi', '0961 8030 175', 'wakiman20@hutapea.web.id', 'minus', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(94, '9180186', 'PD Widodo Tbk', 'Jr. Thamrin No. 697', 'Padangsidempuan', '(+62) 879 1935 846', 'tmayasari@pratama.or.id', 'voluptates', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(95, '6487810', 'Yayasan Wasita Tbk', 'Dk. Basuki No. 289', 'Probolinggo', '0874 1586 5731', 'gawati32@susanti.co.id', 'sint', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(96, '3910913', 'CV Salahudin', 'Psr. Kiaracondong No. 754', 'Lubuklinggau', '(+62) 784 1247 825', 'tsaptono@pratama.co', 'nobis', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(97, '5613104', 'PJ Utama', 'Dk. Yos No. 189', 'Tarakan', '0484 1717 555', 'knasyidah@salahudin.ac.id', 'quaerat', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(98, '4001628', 'PJ Nuraini Sudiati Tbk', 'Ki. Orang No. 105', 'Banjarbaru', '0781 0719 860', 'cemani30@kusmawati.co.id', 'quia', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(99, '9606632', 'PD Rahayu Lazuardi (Persero) Tbk', 'Jr. Sutarto No. 177', 'Lhokseumawe', '0708 3681 622', 'utama.cawisadi@sihombing.org', 'sint', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(100, '8915983', 'Perum Novitasari Rahmawati (Persero) Tbk', 'Psr. Bayam No. 77', 'Payakumbuh', '0611 1133 6177', 'mpuspita@ramadan.tv', 'veritatis', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(101, '9737301', 'Fa Hartati Saptono', 'Gg. Gremet No. 452', 'Kupang', '0695 5139 165', 'himawan.yuniar@pradipta.id', 'repudiandae', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(102, '2357494', 'Fa Winarsih Namaga (Persero) Tbk', 'Dk. Kusmanto No. 301', 'Tidore Kepulauan', '029 4922 8528', 'farhunnisa22@ardianto.name', 'qui', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(103, '8291289', 'PJ Mustofa Tbk', 'Jln. Imam No. 452', 'Kotamobagu', '0681 0028 1549', 'rini.puspasari@sudiati.org', 'sint', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(104, '2210308', 'Yayasan Nashiruddin (Persero) Tbk', 'Ki. Casablanca No. 950', 'Padangsidempuan', '0331 4165 216', 'prayitna66@palastri.info', 'natus', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(105, '5207989', 'UD Permata Hastuti', 'Dk. Astana Anyar No. 161', 'Tanjung Pinang', '0471 6373 898', 'putra.melinda@marbun.in', 'nihil', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(106, '7200422', 'Perum Latupono Tbk', 'Ds. Orang No. 817', 'Pangkal Pinang', '026 4909 9399', 'nugroho.wardaya@adriansyah.or.id', 'non', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(107, '1498917', 'Fa Tarihoran Tbk', 'Gg. Juanda No. 420', 'Salatiga', '(+62) 931 1037 931', 'kezia29@siregar.co.id', 'vel', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(108, '6808052', 'PT Narpati Yolanda', 'Ki. Ki Hajar Dewantara No. 110', 'Yogyakarta', '(+62) 680 8202 2098', 'prasasta.belinda@sudiati.biz', 'praesentium', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(109, '6228059', 'Yayasan Prasetyo (Persero) Tbk', 'Kpg. Acordion No. 222', 'Sorong', '(+62) 328 7161 475', 'lailasari.iriana@sinaga.sch.id', 'veniam', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(110, '1781045', 'UD Rajata Sirait', 'Jln. Karel S. Tubun No. 537', 'Cirebon', '021 6297 9823', 'fathonah.kurniawan@sudiati.desa.id', 'doloremque', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(111, '1397623', 'Fa Januar', 'Dk. Baing No. 692', 'Tangerang', '(+62) 448 8284 8598', 'septi.namaga@usamah.sch.id', 'id', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(112, '2611722', 'PT Melani Mansur', 'Jln. Sugiono No. 61', 'Bukittinggi', '(+62) 924 2696 451', 'tarihoran.violet@maryadi.biz.id', 'sunt', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(113, '4334144', 'Yayasan Latupono Novitasari', 'Ki. Asia Afrika No. 997', 'Medan', '(+62) 435 5540 6296', 'ihardiansyah@tamba.web.id', 'ut', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(114, '5227382', 'CV Mandasari Wijayanti', 'Jr. Sentot Alibasa No. 537', 'Gorontalo', '0660 9155 0706', 'gsinaga@hakim.tv', 'autem', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(115, '6911653', 'Yayasan Kusumo Pangestu (Persero) Tbk', 'Kpg. Tentara Pelajar No. 673', 'Magelang', '021 2476 5844', 'rwibisono@handayani.ac.id', 'vero', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(116, '6348790', 'UD Purwanti Uyainah', 'Jln. Lumban Tobing No. 212', 'Tangerang Selatan', '0600 4549 2646', 'oliva21@hasanah.asia', 'saepe', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(117, '9009026', 'PD Handayani Uyainah', 'Psr. Reksoninten No. 178', 'Gorontalo', '(+62) 622 1698 1829', 'wulan.hastuti@januar.id', 'incidunt', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(118, '8622301', 'Perum Purnawati', 'Kpg. Bakaru No. 789', 'Tasikmalaya', '(+62) 859 7149 373', 'cahyono.hardiansyah@aryani.web.id', 'et', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(119, '4934051', 'Perum Dabukke Adriansyah', 'Dk. Kalimantan No. 601', 'Parepare', '0586 8131 018', 'gangsar.wibisono@puspasari.biz.id', 'cumque', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(120, '2096238', 'Fa Hartati (Persero) Tbk', 'Kpg. Aceh No. 242', 'Sabang', '0238 5592 645', 'ghaliyati.lazuardi@astuti.biz', 'sequi', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(121, '6833421', 'Perum Hartati Pudjiastuti Tbk', 'Kpg. Nangka No. 695', 'Subulussalam', '0499 3465 7503', 'diah.purwanti@yuniar.co', 'quam', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(122, '5497458', 'PD Mandala Yolanda Tbk', 'Gg. Urip Sumoharjo No. 881', 'Solok', '(+62) 23 3630 4990', 'fitria.yuniar@wulandari.in', 'ratione', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(123, '3527371', 'PT Aryani Marpaung Tbk', 'Jr. Pahlawan No. 124', 'Batu', '029 9674 126', 'zizi96@lailasari.biz.id', 'dolores', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(124, '8839363', 'Perum Riyanti Prasasta', 'Kpg. Daan No. 570', 'Sabang', '(+62) 640 4955 272', 'cahyadi.sudiati@prakasa.desa.id', 'ut', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(125, '6465936', 'UD Lazuardi Halimah', 'Gg. Salam No. 965', 'Ternate', '(+62) 945 9996 821', 'ina37@hutasoit.com', 'dolores', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(126, '2362244', 'Perum Puspita', 'Ds. Raden Saleh No. 605', 'Prabumulih', '(+62) 584 5114 292', 'gambira51@nasyidah.sch.id', 'assumenda', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(127, '2363365', 'Yayasan Suryono Haryanti (Persero) Tbk', 'Dk. R.M. Said No. 812', 'Subulussalam', '(+62) 834 4402 241', 'cmayasari@maryadi.org', 'mollitia', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(128, '2966134', 'CV Waskita Widiastuti Tbk', 'Gg. Sutan Syahrir No. 180', 'Gunungsitoli', '0756 5264 5013', 'qwulandari@hasanah.go.id', 'rem', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(129, '8674138', 'UD Mulyani Ardianto', 'Jr. Dewi Sartika No. 851', 'Denpasar', '0301 4554 9235', 'cwasita@prastuti.id', 'quod', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(130, '3707603', 'Perum Yolanda Waskita Tbk', 'Dk. Bakti No. 847', 'Sabang', '024 8399 071', 'irawan.sidiq@saputra.web.id', 'cupiditate', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(131, '4166547', 'Fa Yuliarti', 'Psr. M.T. Haryono No. 72', 'Pagar Alam', '0497 0402 3264', 'shakila.samosir@samosir.in', 'incidunt', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(132, '5908702', 'PT Riyanti Tbk', 'Ds. Gajah No. 687', 'Tegal', '(+62) 695 5750 830', 'luluh.pratiwi@prasasta.com', 'velit', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(133, '6250401', 'Yayasan Mustofa Tbk', 'Dk. Cikutra Barat No. 188', 'Jambi', '(+62) 231 0853 871', 'jaga85@halimah.id', 'neque', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(134, '8335441', 'Fa Prastuti', 'Jr. Basoka Raya No. 738', 'Gunungsitoli', '0238 9905 1824', 'cinta04@wastuti.go.id', 'et', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(135, '5531639', 'Yayasan Nuraini (Persero) Tbk', 'Jr. Sadang Serang No. 584', 'Tegal', '0594 2359 334', 'simbolon.kartika@halimah.in', 'necessitatibus', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(136, '5393342', 'Fa Gunawan', 'Kpg. Thamrin No. 851', 'Pariaman', '0536 9319 6649', 'ujanuar@hartati.asia', 'et', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(137, '8565223', 'PJ Usamah', 'Jln. Labu No. 307', 'Gorontalo', '0208 8957 841', 'xanana62@thamrin.my.id', 'incidunt', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(138, '7050246', 'Fa Simanjuntak (Persero) Tbk', 'Psr. Lumban Tobing No. 247', 'Balikpapan', '0379 0131 190', 'martana.rahmawati@hastuti.desa.id', 'est', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(139, '4870092', 'PT Nababan', 'Jln. Yos No. 233', 'Administrasi Jakarta Timur', '0524 0009 526', 'oni82@sudiati.go.id', 'ut', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(140, '8711232', 'PT Pratiwi Tbk', 'Jr. Ujung No. 150', 'Subulussalam', '(+62) 848 202 524', 'habibi.wadi@fujiati.in', 'aperiam', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(141, '1147597', 'Fa Wasita Uyainah', 'Jln. Gedebage Selatan No. 242', 'Yogyakarta', '0260 5721 135', 'siska28@mansur.name', 'quia', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(142, '3809657', 'Yayasan Wahyudin Tbk', 'Kpg. Dahlia No. 187', 'Tual', '0531 1814 3908', 'paulin18@kuswandari.in', 'laborum', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(143, '4008948', 'UD Wijayanti (Persero) Tbk', 'Psr. Raden No. 104', 'Tanjungbalai', '(+62) 915 0633 8578', 'kemba.safitri@rahimah.sch.id', 'culpa', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(144, '4561670', 'Fa Nasyiah Natsir Tbk', 'Dk. Barasak No. 512', 'Pontianak', '(+62) 23 6698 3179', 'ismail.waskita@wijayanti.asia', 'et', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(145, '2022130', 'PD Permata Maulana Tbk', 'Psr. Lembong No. 239', 'Bima', '0400 9127 6031', 'farida.ina@halimah.or.id', 'sunt', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(146, '2589434', 'PT Setiawan Sitompul', 'Jln. Perintis Kemerdekaan No. 25', 'Palangka Raya', '0966 6867 515', 'srahimah@purnawati.org', 'aut', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(147, '8351288', 'Yayasan Adriansyah Sihotang (Persero) Tbk', 'Jln. Madiun No. 973', 'Banjarmasin', '0749 6292 3735', 'jagaraga.hutagalung@widodo.in', 'numquam', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(148, '7537315', 'CV Damanik Tbk', 'Ki. Salam No. 418', 'Blitar', '0706 3704 003', 'vwaluyo@mandala.com', 'asperiores', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(149, '5601291', 'UD Januar', 'Dk. Raya Ujungberung No. 398', 'Probolinggo', '0858 971 745', 'jumadi67@novitasari.id', 'pariatur', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(150, '4216079', 'Yayasan Waskita Tbk', 'Ki. Sadang Serang No. 150', 'Batu', '0487 2876 698', 'bahuwarna36@lestari.tv', 'et', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(151, '9374278', 'PT Lailasari (Persero) Tbk', 'Jr. Kalimalang No. 338', 'Sorong', '(+62) 627 9933 746', 'rahimah.michelle@nurdiyanti.my.id', 'enim', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(152, '4449780', 'UD Santoso Tbk', 'Jr. Peta No. 645', 'Tanjung Pinang', '(+62) 23 8272 1331', 'twaluyo@samosir.go.id', 'minima', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(153, '6337536', 'Fa Suartini Tbk', 'Dk. Juanda No. 723', 'Lubuklinggau', '0837 8805 596', 'jabal.hariyah@ardianto.web.id', 'delectus', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(154, '6735925', 'CV Purwanti Siregar Tbk', 'Ds. Gotong Royong No. 526', 'Samarinda', '022 1207 769', 'narpati.ika@salahudin.go.id', 'perspiciatis', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(155, '5766643', 'Perum Rahayu Handayani (Persero) Tbk', 'Jr. Moch. Yamin No. 915', 'Prabumulih', '(+62) 24 7384 692', 'lanang.sitompul@pudjiastuti.go.id', 'omnis', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(156, '2485529', 'PT Lailasari Mustofa', 'Psr. Diponegoro No. 459', 'Pekalongan', '(+62) 947 9320 784', 'nyoman07@lestari.desa.id', 'officiis', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(157, '1199213', 'PJ Iswahyudi', 'Kpg. Gajah Mada No. 771', 'Parepare', '022 3354 585', 'maryani@marbun.in', 'dolorum', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(158, '8377558', 'Yayasan Nashiruddin', 'Kpg. Babadak No. 942', 'Batam', '(+62) 353 2480 734', 'hasna.kuswoyo@hutasoit.com', 'sapiente', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(159, '8975660', 'PT Prabowo', 'Psr. Sumpah Pemuda No. 723', 'Pekalongan', '(+62) 600 6697 097', 'suartini.agnes@pratiwi.id', 'quae', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(160, '4723632', 'Fa Rahayu', 'Ds. Balikpapan No. 50', 'Tanjungbalai', '0980 6913 5386', 'isuartini@nuraini.biz.id', 'harum', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(161, '4641134', 'PJ Latupono', 'Kpg. Bakhita No. 464', 'Tomohon', '(+62) 554 0496 103', 'prasetya.indah@puspita.com', 'qui', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(162, '1549331', 'CV Hassanah Tbk', 'Jr. Sumpah Pemuda No. 386', 'Banjar', '(+62) 699 6086 268', 'raden44@lailasari.ac.id', 'fugiat', '2023-07-13 05:55:08', '2023-07-13 05:55:08', '0000-00-00 00:00:00'),
(163, '8944285', 'CV Santoso Sitompul', 'Jln. Sugiyopranoto No. 169', 'Palangka Raya', '027 5298 7872', 'aswani91@novitasari.com', 'autem', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(164, '4294540', 'PD Maulana Usamah', 'Gg. Baabur Royan No. 451', 'Lhokseumawe', '025 0278 469', 'ghidayanto@ardianto.biz', 'totam', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(165, '4261901', 'PJ Maulana Yuliarti', 'Jr. M.T. Haryono No. 579', 'Tual', '022 0441 9701', 'farah.puspita@zulkarnain.co', 'ut', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(166, '6992204', 'Fa Waluyo Wijayanti Tbk', 'Jr. B.Agam Dlm No. 846', 'Banjarbaru', '0693 3153 1510', 'rsuwarno@zulaika.com', 'voluptate', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(167, '5165254', 'UD Pradipta', 'Jr. Ahmad Dahlan No. 307', 'Tanjung Pinang', '021 9174 231', 'wijayanti.ajiono@mahendra.biz.id', 'eos', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(168, '4335023', 'UD Utami Namaga (Persero) Tbk', 'Jln. Pasir Koja No. 924', 'Bandung', '(+62) 453 0961 5266', 'irawan.kenzie@gunawan.co.id', 'fugit', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(169, '7986378', 'PD Zulaika Tbk', 'Psr. Arifin No. 195', 'Dumai', '0458 2986 048', 'jumadi90@suryatmi.biz', 'officiis', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(170, '5080218', 'PD Nasyiah', 'Jln. Ikan No. 996', 'Dumai', '(+62) 885 9563 8804', 'jprayoga@dabukke.info', 'ipsum', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(171, '9599640', 'CV Januar Santoso (Persero) Tbk', 'Psr. Sampangan No. 729', 'Magelang', '(+62) 226 5071 4511', 'winarno.gawati@prayoga.org', 'dolores', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(172, '5137834', 'UD Padmasari Hariyah (Persero) Tbk', 'Gg. Sudirman No. 460', 'Sibolga', '(+62) 714 0367 6018', 'jsuwarno@sudiati.desa.id', 'sapiente', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(173, '1549556', 'Fa Mahendra', 'Ki. Cikapayang No. 717', 'Bandung', '0572 9659 552', 'cornelia73@safitri.mil.id', 'deleniti', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(174, '3790562', 'Perum Irawan Kusmawati', 'Ki. Cemara No. 191', 'Batam', '(+62) 441 9548 272', 'johan.nasyiah@tamba.ac.id', 'omnis', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(175, '2782895', 'Yayasan Hakim', 'Ds. Kyai Gede No. 275', 'Banda Aceh', '(+62) 687 9516 366', 'gunawan.citra@pratama.biz.id', 'deserunt', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(176, '3813378', 'PJ Aryani', 'Psr. Yoga No. 723', 'Banjarmasin', '026 9096 777', 'adiarja.laksita@budiyanto.id', 'sunt', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(177, '8852956', 'Yayasan Irawan Wahyudin', 'Gg. Cihampelas No. 257', 'Balikpapan', '(+62) 354 3275 952', 'viktor.mardhiyah@najmudin.org', 'consequuntur', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(178, '8775492', 'PJ Wulandari Tbk', 'Ki. Astana Anyar No. 449', 'Parepare', '0898 5266 2892', 'epratiwi@usamah.co', 'delectus', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(179, '6732420', 'Perum Pratiwi', 'Jr. Gading No. 717', 'Sorong', '0370 4330 204', 'kiandra.usada@nasyiah.co', 'itaque', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(180, '5856672', 'UD Pertiwi Tbk', 'Gg. Basudewo No. 416', 'Sorong', '(+62) 994 2520 720', 'sakura80@saefullah.or.id', 'accusantium', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(181, '4167676', 'Fa Ardianto Rahayu', 'Psr. Baiduri No. 479', 'Jayapura', '0402 9142 713', 'pratiwi.cindy@sudiati.info', 'expedita', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(182, '4183119', 'PD Hastuti Nainggolan', 'Psr. Merdeka No. 152', 'Balikpapan', '0713 9651 913', 'surya50@zulaika.name', 'occaecati', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(183, '6108666', 'PJ Hakim', 'Jln. Kyai Gede No. 477', 'Cilegon', '0819 8452 974', 'usada.labuh@farida.name', 'dolore', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(184, '9040882', 'CV Purnawati Hutagalung Tbk', 'Dk. Cokroaminoto No. 994', 'Sabang', '(+62) 460 9306 205', 'jlaksita@natsir.id', 'et', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(185, '8923199', 'PJ Simbolon Jailani (Persero) Tbk', 'Dk. Yoga No. 394', 'Solok', '0857 0197 0868', 'zwaskita@mandala.info', 'maiores', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(186, '6705516', 'PD Usamah Hakim Tbk', 'Psr. Kartini No. 458', 'Makassar', '(+62) 839 1993 7273', 'lriyanti@suryono.co.id', 'saepe', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(187, '3749048', 'PJ Latupono Sudiati (Persero) Tbk', 'Dk. Diponegoro No. 345', 'Subulussalam', '0794 8821 882', 'emin.salahudin@laksita.my.id', 'consequatur', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(188, '1321297', 'Fa Anggraini Pranowo', 'Psr. Sugiyopranoto No. 220', 'Tarakan', '0459 4587 5723', 'fpuspita@marpaung.web.id', 'possimus', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(189, '3268078', 'PD Oktaviani', 'Jln. Dipatiukur No. 882', 'Tasikmalaya', '(+62) 402 2367 1892', 'lnababan@sinaga.sch.id', 'quia', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(190, '9376330', 'Yayasan Laksita', 'Dk. Bambu No. 413', 'Parepare', '0463 8616 0470', 'vivi.halim@aryani.in', 'nam', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(191, '4390655', 'PT Zulaika (Persero) Tbk', 'Kpg. Tangkuban Perahu No. 344', 'Banjarbaru', '0780 2590 554', 'psihotang@novitasari.or.id', 'alias', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(192, '4354438', 'Perum Zulkarnain Damanik', 'Ds. Ciumbuleuit No. 954', 'Bau-Bau', '(+62) 243 9564 2827', 'tyuliarti@suartini.mil.id', 'libero', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(193, '2399181', 'PJ Gunarto Nurdiyanti', 'Kpg. Merdeka No. 32', 'Jambi', '0419 0678 5651', 'oktaviani.mariadi@tarihoran.net', 'quisquam', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(194, '5134365', 'PJ Mahendra', 'Gg. Ujung No. 157', 'Sabang', '0674 7810 8931', 'zahra.wasita@padmasari.name', 'aut', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(195, '1713126', 'PT Nasyidah Laksita Tbk', 'Ds. Uluwatu No. 32', 'Tasikmalaya', '0471 0510 4402', 'vera.mardhiyah@pudjiastuti.net', 'et', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(196, '1169544', 'Perum Prakasa Kuswandari', 'Psr. Yos No. 130', 'Jambi', '(+62) 663 1526 953', 'zelda78@utama.desa.id', 'et', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(197, '6933945', 'Yayasan Yuliarti', 'Jln. Pasirkoja No. 30', 'Magelang', '0605 6102 391', 'pertiwi.balamantri@halim.id', 'non', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(198, '9357427', 'PT Marpaung Pranowo Tbk', 'Kpg. Hang No. 743', 'Banjarbaru', '(+62) 907 2108 1226', 'vkusmawati@usamah.go.id', 'nihil', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(199, '4488456', 'CV Susanti Halim (Persero) Tbk', 'Ds. Nanas No. 854', 'Salatiga', '(+62) 279 2611 7572', 'dpradana@permata.asia', 'dolores', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(200, '1006516', 'UD Najmudin (Persero) Tbk', 'Kpg. Sutami No. 760', 'Manado', '(+62) 418 0383 750', 'jprayoga@anggriawan.co', 'iste', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(201, '7186957', 'PT Uwais Mulyani', 'Psr. Dipenogoro No. 919', 'Sungai Penuh', '(+62) 566 2968 1434', 'hutapea.siska@dongoran.or.id', 'aliquid', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(202, '9530587', 'PT Hutapea Rahmawati', 'Jr. Madiun No. 650', 'Tidore Kepulauan', '0600 4910 8371', 'lalita79@hakim.or.id', 'fuga', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(203, '4310883', 'CV Haryanto', 'Jln. Moch. Ramdan No. 268', 'Medan', '(+62) 365 1129 1154', 'imam71@mayasari.co', 'ea', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(204, '8130187', 'CV Pranowo Hidayanto Tbk', 'Gg. Sumpah Pemuda No. 711', 'Banjar', '0313 5569 749', 'dputra@kuswoyo.org', 'dolorum', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(205, '7162589', 'Yayasan Sihombing Agustina', 'Jr. Cokroaminoto No. 255', 'Palangka Raya', '(+62) 503 7733 276', 'gina.hasanah@puspita.biz.id', 'nihil', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(206, '4660394', 'Fa Winarsih (Persero) Tbk', 'Gg. Bakau No. 58', 'Kediri', '0365 8844 7263', 'tnababan@hasanah.desa.id', 'et', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(207, '2378519', 'Perum Hasanah (Persero) Tbk', 'Ds. Pahlawan No. 279', 'Banjarbaru', '(+62) 999 1847 4458', 'bahuwirya94@riyanti.info', 'ut', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(208, '6542822', 'CV Irawan', 'Jr. Abdul Rahmat No. 189', 'Madiun', '0750 7685 2185', 'jailani.wani@siregar.sch.id', 'dolor', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(209, '8470706', 'PJ Marbun Wulandari', 'Jr. Antapani Lama No. 553', 'Surakarta', '0363 6735 940', 'prasetyo.edi@usamah.my.id', 'omnis', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00'),
(210, '6136821', 'PT Prastuti Tbk', 'Kpg. Suryo No. 960', 'Administrasi Jakarta Pusat', '0763 0157 974', 'gamblang.maheswara@hariyah.asia', 'nemo', '2023-07-13 05:55:09', '2023-07-13 05:55:09', '0000-00-00 00:00:00');

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
  MODIFY `id_barang_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
