-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 11, 2020 at 08:37 AM
-- Server version: 10.2.31-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gizw8294_gizi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(8) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `asupan`
--

CREATE TABLE `asupan` (
  `id` int(8) NOT NULL,
  `id_pasien` varchar(8) NOT NULL,
  `kalori` double NOT NULL,
  `protein` varchar(5) NOT NULL,
  `karbohidrat` varchar(5) NOT NULL,
  `lemak` varchar(5) NOT NULL,
  `fa` varchar(5) NOT NULL,
  `fs` varchar(5) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(6) NOT NULL,
  `protein_gr` double NOT NULL,
  `karbo_gr` double NOT NULL,
  `lemak_gr` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asupan`
--

INSERT INTO `asupan` (`id`, `id_pasien`, `kalori`, `protein`, `karbohidrat`, `lemak`, `fa`, `fs`, `tanggal`, `waktu`, `protein_gr`, `karbo_gr`, `lemak_gr`) VALUES
(21, 'PSN002', 1840.32, '15', '60', '15', '1.2', '1', '2019-12-04', 'Pagi', 69.012, 276.048, 30.672),
(22, 'PSN004', 2165.592, '15', '60', '15', '1.3', '1.2', '2019-12-03', 'Pagi', 81.2097, 324.8388, 36.0932),
(24, 'PSN001', 1636.704, '15', '61', '15', '1.2', '1.2', '2020-01-08', 'Pagi', 61.3764, 249.59736, 27.2784),
(25, 'PSN001', 1773.096, '17', '65', '15', '1.3', '1.2', '2020-01-08', 'Siang', 75.35658, 288.1281, 29.5516),
(26, 'PSN003', 2306.46, '16', '64', '17', '1.5', '1.3', '2020-01-14', 'Pagi', 92.2584, 369.0336, 43.566466666667),
(27, 'PSN002', 1993.68, '15', '61', '16', '1.3', '1', '2020-01-14', 'Siang', 74.763, 304.0362, 35.4432),
(28, 'PSN003', 2306.46, '17', '66', '16', '1.5', '1.3', '2020-01-14', 'Siang', 98.02455, 380.5659, 41.003733333333),
(29, 'PSN005', 2991.33, '17', '62', '17', '1.5', '1.35', '2020-01-15', 'Pagi', 127.131525, 463.65615, 56.5029),
(30, 'PSN008', 1570.725, '17', '63', '17', '1.3', '1.35', '2020-01-15', 'Pagi', 66.7558125, 247.3891875, 29.66925),
(31, 'PSN008', 1745.25, '16', '64', '18', '1.3', '1.5', '2020-01-15', 'Siang', 69.81, 279.24, 34.905),
(32, 'PSN008', 1628.9, '18', '64', '18', '1.4', '1.3', '2020-01-15', 'Malam', 73.3005, 260.624, 32.578),
(33, 'PSN006', 2372.253, '17', '63', '16', '1.3', '1.3', '2020-01-15', 'Pagi', 100.8207525, 373.6298475, 42.173386666667),
(34, 'PSN001', 2045.88, '16', '60', '17', '1.5', '1.2', '2020-01-15', 'Pagi', 81.8352, 306.882, 38.6444),
(35, 'PSN009', 3838.8, '20', '67', '20', '1.75', '1.6', '2020-01-15', 'Malam', 191.94, 642.999, 85.306666666667),
(36, 'PSN009', 3838.8, '19', '65', '18', '1.75', '1.6', '2020-01-15', 'Siang', 182.343, 623.805, 76.776),
(37, 'PSN001', 1841.292, '16', '64', '18', '1.2', '1.35', '2020-01-27', 'Pagi', 73.65168, 294.60672, 36.82584),
(38, 'PSN001', 2585.765, '17', '62', '17', '1.75', '1.3', '2020-01-27', 'Siang', 109.8950125, 400.793575, 48.842227777778),
(39, 'PSN001', 2148.174, '15', '62', '16', '1.4', '1.35', '2020-01-27', 'Malam', 80.556525, 332.96697, 38.18976),
(40, 'PSN003', 2502.549, '18', '65', '18', '1.4', '1.35', '2020-01-27', 'Pagi', 112.614705, 406.6642125, 50.05098),
(41, 'PSN005', 3323.7, '18', '64', '18', '1.5', '1.5', '2020-01-27', 'Pagi', 149.5665, 531.792, 66.474),
(42, 'PSN001', 1363.92, '16', '62', '16', '1.2', '1', '2020-01-28', 'Pagi', 54.5568, 211.4076, 24.247466666667),
(43, 'PSN001', 1909.488, '17', '65', '19', '1.4', '1.2', '2020-01-28', 'Siang', 81.15324, 310.2918, 40.311413333333),
(44, 'PSN001', 1477.58, '16', '61', '16', '1.3', '1', '2020-01-28', 'Malam', 59.1032, 225.33095, 26.268088888889);

-- --------------------------------------------------------

--
-- Table structure for table `asupan2`
--

CREATE TABLE `asupan2` (
  `id` int(8) NOT NULL,
  `id_pasien` varchar(8) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(5) NOT NULL,
  `kalori` double NOT NULL,
  `protein` double NOT NULL,
  `karbo` double NOT NULL,
  `lemak` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asupan2`
--

INSERT INTO `asupan2` (`id`, `id_pasien`, `tanggal`, `waktu`, `kalori`, `protein`, `karbo`, `lemak`) VALUES
(1, 'PSN001', '2019-12-03', 'Malam', 487.04, 19.065, 65.15, 17.23),
(2, 'PSN003', '2019-12-02', 'Pagi', 702.04, 22.765, 68.85, 59.03),
(3, 'PSN002', '2019-12-04', 'Pagi', 1787.56, 128.64, 257.55, 59.355),
(4, 'PSN001', '2020-01-08', 'Pagi', 487.04, 19.065, 65.15, 17.23),
(5, 'PSN001', '2020-01-08', 'Siang', 2002.56, 132.34, 261.25, 101.155),
(27, 'PSN001', '2020-01-28', 'Pagi', 1969.06, 131.39, 285.65, 66.205),
(28, 'PSN001', '2020-01-28', 'Pagi', 1900.34, 129.622, 284.43, 61.705),
(32, 'PSN001', '2020-01-28', 'Siang', 1900.34, 129.622, 284.43, 61.705),
(33, 'PSN001', '2020-01-28', 'Malam', 1900.34, 129.622, 284.43, 61.705),
(34, 'PSN002', '2020-01-28', 'Pagi', 606.32, 14.762, 115.458, 11.29),
(35, 'PSN002', '2020-01-28', 'Pagi', 1900.34, 129.622, 284.43, 61.705),
(36, 'PSN002', '2020-01-28', 'Pagi', 1900.34, 129.622, 284.43, 61.705),
(37, 'PSN002', '2020-01-28', 'Siang', 587.9, 26.324, 100.627, 10.775),
(38, 'PSN001', '2020-01-28', 'Malam', 848.07, 33.845, 134.384, 17.645),
(39, 'PSN002', '2020-01-28', 'Malam', 638.51, 25.015, 99.034, 15.63),
(40, 'PSN014', '2020-01-28', 'Malam', 859.28, 36.345, 104.89, 33.81);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_makanan`
--

CREATE TABLE `jenis_makanan` (
  `id_jenis` int(8) NOT NULL,
  `jenis` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_makanan`
--

INSERT INTO `jenis_makanan` (`id_jenis`, `jenis`) VALUES
(1, 'menu_utama'),
(2, 'lauk_hewani'),
(3, 'lauk_nabati'),
(4, 'sayur'),
(5, 'buah'),
(6, 'snack');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(3) NOT NULL,
  `nama` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `nama`) VALUES
(2, 'mawar 01'),
(6, 'mawar 02'),
(7, 'Lili 01'),
(8, 'Lili 02'),
(9, 'asoka 01'),
(10, 'melati 1'),
(11, 'melati 2'),
(12, 'melati 3');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(8) NOT NULL,
  `id_pasien` varchar(32) NOT NULL,
  `waktu` varchar(10) NOT NULL,
  `kamar` varchar(12) NOT NULL,
  `diet` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `menu_utama` varchar(4) NOT NULL,
  `lauk_hewani` varchar(4) NOT NULL,
  `lauk_nabati` varchar(4) NOT NULL,
  `sayur` varchar(4) NOT NULL,
  `buah` varchar(4) NOT NULL,
  `snack` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `id_pasien`, `waktu`, `kamar`, `diet`, `tanggal`, `menu_utama`, `lauk_hewani`, `lauk_nabati`, `sayur`, `buah`, `snack`) VALUES
(28, 'PSN001', 'Pagi', 'mawar 01', 'nasi', '2019-12-01', '50%', '25%', '25%', '5%', '0%', '95%'),
(29, 'PSN001', 'Siang', '-', 'nasi', '2019-12-01', '25%', '75%', '25%', '50%', '0%', '100%'),
(30, 'PSN001', 'Pagi', 'mawar 02', '0', '2020-01-04', '100%', '100%', '100%', '100%', '100%', '100%'),
(31, 'PSN001', 'Pagi', '', 'sambel coe', '0000-00-00', '75%', '75%', '100%', '95%', '50%', '100%'),
(32, 'PSN002', 'Siang', '', '', '0000-00-00', '25%', '5%', '25%', '25%', '95%', '50%'),
(34, 'PSN005', 'Pagi', 'Lili 01', '', '2020-01-13', '0%', '0%', '0%', '0%', '0%', '0%'),
(35, 'PSN008', 'Pagi', 'mawar 01', '', '2020-01-15', '25%', '50%', '25%', '95%', '0%', '100%'),
(36, 'PSN008', 'Siang', 'mawar 01', '', '2020-01-15', '25%', '95%', '50%', '50%', '50%', '100%'),
(37, 'PSN008', 'Malam', 'mawar 01', '', '2020-01-15', '5%', '50%', '75%', '100%', '0%', '50%'),
(38, 'PSN007', 'Pagi', 'mawar 02', '', '2020-01-15', '0%', '50%', '75%', '0%', '75%', '100%'),
(39, 'PSN007', 'Siang', 'mawar 02', '', '2020-01-15', '75%', '75%', '5%', '0%', '0%', '0%'),
(40, 'PSN007', 'Malam', 'mawar 02', '', '2020-01-15', '50%', '75%', '75%', '50%', '0%', '100%'),
(41, 'PSN006', 'Pagi', 'Lili 01', '', '2020-01-15', '0%', '75%', '75%', '0%', '0%', '100%'),
(42, 'PSN006', 'Siang', 'Lili 01', '', '2020-01-15', '0%', '95%', '25%', '0%', '0%', '100%'),
(43, 'PSN006', 'Malam', 'Lili 01', '', '2020-01-15', '5%', '75%', '25%', '0%', '0%', '100%'),
(44, 'PSN009', 'Malam', 'Lili 01', '', '2020-01-15', '100%', '100%', '100%', '100%', '100%', '100%'),
(45, 'PSN009', 'Siang', 'Lili 01', '', '2020-01-15', '100%', '100%', '100%', '100%', '100%', '100%'),
(46, 'PSN010', 'Pagi', 'Lili 01', '', '2020-01-15', '0%', '0%', '0%', '0%', '0%', '0%'),
(47, 'PSN001', 'Pagi', 'mawar 02', 'Nasi', '2020-01-28', '5%', '50%', '25%', '5%', '75%', '100%'),
(48, 'PSN014', 'Malam', 'melati 2', '', '2020-01-28', '25%', '0%', '5%', '0%', '50%', '100%'),
(49, 'PSN001', 'Pagi', 'mawar 02', '', '2020-01-30', '10%', '25%', '90%', '0%', '75%', '90%'),
(50, 'PSN002', 'Pagi', 'Lili 01', '', '2020-01-30', '10%', '10%', '10%', '10%', '10%', '10%');

-- --------------------------------------------------------

--
-- Table structure for table `menu_makanan`
--

CREATE TABLE `menu_makanan` (
  `id_menu` varchar(8) NOT NULL,
  `id_jenis` int(8) NOT NULL,
  `nama_menu` varchar(35) NOT NULL,
  `berat` varchar(5) NOT NULL,
  `kalori` double NOT NULL,
  `protein` double NOT NULL,
  `karbo` double NOT NULL,
  `lemak` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_makanan`
--

INSERT INTO `menu_makanan` (`id_menu`, `id_jenis`, `nama_menu`, `berat`, `kalori`, `protein`, `karbo`, `lemak`) VALUES
('MNU001', 3, 'opor telur', '52', 1338.2, 112.3, 192.6, 45.3),
('MNU002', 1, 'bubur nasi', '70', 249.9, 5.88, 53.97, 1.19),
('MNU003', 2, 'bola bola daging sapi bb terik', '62', 152.78, 9.61, 4.88, 10.715),
('MNU004', 3, 'tahu bumbu kuning', '27', 37.68, 2.725, 0.2, 3.175),
('MNU005', 4, 'tumis terong labu siam', '102', 46.68, 0.85, 6.1, 2.15),
('MNU006', 6, 'teh manis', '22', 84.78, 0.482, 19.98, 2.15),
('MNU007', 6, 'klepon', '100', 215, 3.7, 41.8, 0.07),
('MNU008', 3, 'telur ayam ras bb semur', '60', 88.25, 7.105, 0.835, 6.005),
('MNU009', 3, 'pepes tempe', '34', 52.21, 5.352, 3.863, 2.22),
('MNU010', 4, 'Sop Gambas tomat', '62', 29.58, 0.53, 2.52, 2.15),
('MNU011', 6, 'Kue lumpur', '50', 145.5, 1.8, 22.05, 5.55),
('MNU012', 2, 'Bola-bola ayam bb kuning', '50', 149, 9.1, 0, 12.5),
('MNU013', 3, 'Tahu bacem', '30', 38.4, 2.725, 4.8, 1.175),
('MNU014', 4, 'Bobor bayam', '58', 36.02, 0.66, 4.55, 1.195),
('MNU015', 5, 'Semangka', '100', 28, 0.5, 6.9, 0.2),
('MNU016', 5, 'Semangka', '100', 28, 0.5, 6.9, 0.2),
('MNU017', 4, 'Pecel bayam, wortel, toge', '170', 180.5, 7.59, 20.15, 9.19),
('MNU018', 3, 'Tempe bb balado', '28.5', 76.29, 5.2, 4.315, 4.7),
('MNU019', 2, 'Rolade ikan nila fillet', '93', 136.99, 13.45, 11.364, 3.82),
('MNU020', 1, 'Bubur nasi', '75', 267.75, 6.3, 57.825, 1.275),
('MNU021', 6, 'Pastel', '50', 153.5, 2.25, 21.2, 6.65),
('MNU022', 6, 'Pisang susu', '100', 134, 1.1, 35.5, 2.65),
('MNU023', 4, 'Tumis sawi hijau', '52.5', 36.1, 1.15, 2, 2.65),
('MNU024', 3, 'Tahu bumbu balado', '27.5', 42.1, 2.725, 0.2, 3.675),
('MNU025', 2, 'Bakso daging sapi kuah', '52.5', 122.6, 9.4, 0, 9.5),
('MNU026', 2, 'Bola bola ikan tengiri bb asam', '56', 88.34, 0.85, 6.82, 3.75),
('MNU027', 3, 'Tempe bumbu rica rica', '24', 70.66, 4.16, 3.64, 3.75),
('MNU028', 4, 'Sop kol putih, wortel, tomat', '50', 14.6, 3.08, 2.65, 0.34),
('MNU029', 3, 'fdf', 'dfds', 12, 12, 21, 12),
('MNU030', 4, 'sayur asem', '100', 1338.3, 112.6, 6.1, 2.15),
('MNU031', 5, 'pisang', '50', 46.68, 3.7, 4.88, 1.19);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` varchar(8) NOT NULL,
  `nama_pasien` varchar(20) NOT NULL,
  `gender` varchar(3) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `umur` varchar(5) NOT NULL,
  `kategori` varchar(12) NOT NULL,
  `berat_badan` varchar(5) NOT NULL,
  `tinggi_badan` varchar(5) NOT NULL,
  `kamar` varchar(10) NOT NULL,
  `BEE` varchar(9) NOT NULL,
  `brr` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `gender`, `tanggal_lahir`, `alamat`, `tanggal_masuk`, `umur`, `kategori`, `berat_badan`, `tinggi_badan`, `kamar`, `BEE`, `brr`) VALUES
('PSN001', 'luluk putri', 'Pr', '2012-03-07', 'lombok', '2019-12-01', '17', 'umum', '30', '155', 'mawar 02', '1136.6', 750),
('PSN002', 'arman', 'Lk', '1997-06-10', 'condongcatur', '2019-12-02', '22', 'dm', '56', '170', 'Lili 01', '1533.6', 1680),
('PSN003', 'Nn tety', 'Pr', '1998-01-16', 'Condongcatur', '2019-03-14', '20', 'umum', '51', '155', 'asoka 01', '1324.1', 0.92727272727273),
('PSN004', 'Sdr Tri', 'Lk', '1989-01-12', 'Condongcatur', '2020-01-05', '27', 'dm', '60', '170', 'Lili 02', '1554.4', 0.85714285714286),
('PSN005', 'Nn Siti ', 'Pr', '1997-01-09', 'Sleman', '2020-01-01', '23', 'umum', '67', '163', 'melati 3', '1477.2', 1.0634920634921),
('PSN006', 'Tn toty', 'Lk', '1999-01-05', 'Sleman', '2020-01-02', '20', 'dm', '51', '155', 'Lili 01', '1403.7', 0.92727272727273),
('PSN007', 'Sdr ashari', 'Lk', '1991-01-03', 'Ngemplak', '2020-01-09', '26', 'umum', '55', '175', 'mawar 02', '1517.7', 0.73333333333333),
('PSN008', 'Tn wiliyadi', 'Lk', '1953-01-08', 'Sleman', '2020-01-04', '73', 'dm', '42', '150', 'mawar 01', '895', 0.84),
('PSN009', 'Anik', 'Pr', '2000-01-15', 'Sragen', '2020-01-14', '20', 'umum', '55', '160', 'Lili 01', '1371', 0.91666666666667),
('PSN010', 'Anik', 'Pr', '2000-01-15', 'Sragen', '2020-01-14', '20', 'dm', '55', '160', 'Lili 01', '1371', 0.91666666666667),
('PSN011', 'luluk', 'Pr', '1997-08-15', 'depok, sleman, jogja', '2020-01-16', '22', 'umum', '170', '155', 'mawar 01', '2457.1', 3.0909090909091),
('PSN012', 'Ny indrawati', 'Pr', '1980-06-11', 'condongcatur', '2020-01-16', '39', 'dm', '56', '160', 'asoka 01', '1291.3', 0.93333333333333),
('PSN013', 'Luluk', 'Pr', '1997-01-14', 'Lombok', '2020-01-09', '23', 'umum', '56', '155', 'asoka 01', '1358', 1.0181818181818),
('PSN014', 'pasien baru', 'Lk', '1985-02-05', 'condongcatur', '2020-01-28', '34', 'dm', '73', '167', 'melati 2', '1669.9', 1.089552238806);

-- --------------------------------------------------------

--
-- Table structure for table `pasiendm`
--

CREATE TABLE `pasiendm` (
  `id` int(8) NOT NULL,
  `id_pasien` varchar(8) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(6) NOT NULL,
  `kalori` double NOT NULL,
  `protein` double NOT NULL,
  `karbo` double NOT NULL,
  `lemak` double NOT NULL,
  `protein_gr` double NOT NULL,
  `karbo_gr` double NOT NULL,
  `lemak_gr` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasiendm`
--

INSERT INTO `pasiendm` (`id`, `id_pasien`, `tanggal`, `waktu`, `kalori`, `protein`, `karbo`, `lemak`, `protein_gr`, `karbo_gr`, `lemak_gr`) VALUES
(16, 'PSN003', '2019-12-02', 'Pagi', 0, 15, 62, 16, 43.03125, 177.8625, 20.4),
(17, 'PSN001', '2019-12-03', 'Pagi', 0, 15, 63, 17, 22.78125, 95.68125, 11.475),
(18, 'PSN002', '2019-12-02', 'Pagi', 0, 16, 61, 15, 57.12, 217.77, 23.8),
(22, 'PSN004', '2019-12-02', 'Pagi', 0, 15, 60, 16, 1.5, 6, 0.71111111111111),
(23, 'PSN005', '2019-12-02', 'Siang', 30, 15, 62, 16, 1.125, 4.65, 0.53333333333333),
(24, 'PSN007', '2020-01-15', 'Pagi', 40, 16, 63, 16, 1.6, 6.3, 0.71111111111111),
(25, 'PSN007', '2020-01-15', 'Siang', 40, 17, 63, 19, 1.7, 6.3, 0.84444444444444),
(26, 'PSN007', '2020-01-15', 'Malam', 40, 16, 62, 17, 1.6, 6.2, 0.75555555555556),
(27, 'PSN005', '2020-01-15', 'Pagi', 30, 17, 63, 17, 1.275, 4.725, 0.56666666666667),
(28, 'PSN005', '2020-01-15', 'Siang', 30, 18, 64, 17, 1.35, 4.8, 0.56666666666667),
(29, 'PSN001', '2020-01-15', 'Malam', 15, 20, 67, 20, 0.75, 2.5125, 0.33333333333333),
(30, 'PSN009', '2020-01-15', 'Pagi', 30, 18, 62, 18, 1.35, 4.65, 0.6),
(31, 'PSN002', '2020-01-28', 'Pagi', 15, 15, 60, 15, 0.5625, 2.25, 0.25),
(32, 'PSN002', '2020-01-28', 'Siang', 15, 17, 65, 17, 0.6375, 2.4375, 0.28333333333333),
(33, 'PSN002', '2020-01-28', 'Malam', 15, 17, 62, 19, 0.6375, 2.325, 0.31666666666667),
(34, 'PSN014', '2020-01-28', 'Malam', 30, 15, 65, 18, 1.125, 4.875, 0.6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(8) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`) VALUES
(13, 'luluk sundarina', 'luluk', 'ee11cbb19052e40b07aac0ca060c23ee'),
(15, 'indah permata', 'permata', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `asupan`
--
ALTER TABLE `asupan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asupan2`
--
ALTER TABLE `asupan2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_makanan`
--
ALTER TABLE `jenis_makanan`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `menu_makanan`
--
ALTER TABLE `menu_makanan`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `pasiendm`
--
ALTER TABLE `pasiendm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asupan`
--
ALTER TABLE `asupan`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `asupan2`
--
ALTER TABLE `asupan2`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `jenis_makanan`
--
ALTER TABLE `jenis_makanan`
  MODIFY `id_jenis` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `pasiendm`
--
ALTER TABLE `pasiendm`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu_makanan`
--
ALTER TABLE `menu_makanan`
  ADD CONSTRAINT `menu_makanan_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_makanan` (`id_jenis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
