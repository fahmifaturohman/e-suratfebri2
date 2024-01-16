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
-- Table structure for table `tb_disposisi_masuk`
--

DROP TABLE IF EXISTS `tb_disposisi_masuk`;
CREATE TABLE IF NOT EXISTS `tb_disposisi_masuk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(50) DEFAULT NULL,
  `id_dari` int DEFAULT NULL,
  `dari` varchar(100) DEFAULT NULL,
  `id_tujuan` int DEFAULT NULL,
  `ttd` varchar(50) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `id_petunjuk` int NOT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `status` enum('disposisi','distribusikan','distribusi') NOT NULL DEFAULT 'disposisi',
  `sifat` enum('biasa','segera','sangat segera') NOT NULL DEFAULT 'segera',
  `deleted` int NOT NULL DEFAULT '0',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_disposisi_masuk`
--

INSERT INTO `tb_disposisi_masuk` (`id`, `no_surat`, `id_dari`, `dari`, `id_tujuan`, `ttd`, `jabatan`, `id_petunjuk`, `catatan`, `status`, `sifat`, `deleted`, `create_at`) VALUES
(11, '123', 12, 'ptsp', 9, 'Yoshi Aria', 'Kasubag TURT', 1, 'Setuju Sesuai Ketentuan Yang Berlaku', 'disposisi', 'segera', 0, '2024-01-15 08:32:25'),
(12, '123', 9, 'Yoshi Aria', 5, 'anis khoirunnisa', 'Kabag Umum dan Keuangan', 4, 'Jawab Sesuai Ketentuan Yang Berlaku', 'disposisi', 'segera', 0, '2024-01-15 08:33:34'),
(13, '123', 5, 'anis khoirunnisa', 4, 'Aziz Falahudin', 'Sekretaris', 1, 'Setuju Sesuai Ketentuan Yang Berlaku', 'disposisi', 'segera', 0, '2024-01-15 08:34:52'),
(14, '123', 4, 'Aziz Falahudin', 1, 'ketua', 'Ketua', 1, 'Setuju Sesuai Ketentuan Yang Berlaku', 'disposisi', 'segera', 0, '2024-01-15 08:35:28'),
(15, '123', 1, 'ketua', 5, 'anis khoirunnisa', 'Kabag Umum dan Keuangan', 3, 'Selesaikan Sesuai Ketentuan Yang Berlaku', 'distribusi', 'sangat segera', 0, '2024-01-15 08:36:03');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
