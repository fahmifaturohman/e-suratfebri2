-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 16, 2024 at 12:21 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_esurat_febri2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_tujuan`
--

DROP TABLE IF EXISTS `tb_tujuan`;
CREATE TABLE IF NOT EXISTS `tb_tujuan` (
  `id_tujuan` int NOT NULL AUTO_INCREMENT,
  `nama_tujuan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_hp` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `urutan` int DEFAULT NULL,
  PRIMARY KEY (`id_tujuan`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_tujuan`
--

INSERT INTO `tb_tujuan` (`id_tujuan`, `nama_tujuan`, `no_hp`, `urutan`) VALUES
(1, 'Ketua', '-', 1),
(2, 'Wakil Ketua', '-', 2),
(3, 'Panitera', '_', 3),
(4, 'Sekretaris', '6285781480396', 4),
(5, 'Kabag Umum dan Keuangan', '-', 6),
(6, 'Kabag Perencanaan dan Kepegawaian', '-', 5),
(7, 'Panitera Muda Banding', '-', 7),
(8, 'Panitera Muda Hukum', '-', 8),
(9, 'Kasubag TURT', '-', 9),
(10, 'Kasubag Perencanaan', '-', 10),
(11, 'Kasubag Kepegawaian dan TI', '-', 11),
(12, 'PTSP', '-', NULL),
(14, 'Ketua Korwil Lampung ULP Mahkamah Agung RI', '-', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
