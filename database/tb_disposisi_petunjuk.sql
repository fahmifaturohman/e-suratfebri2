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
-- Table structure for table `tb_disposisi_petunjuk`
--

DROP TABLE IF EXISTS `tb_disposisi_petunjuk`;
CREATE TABLE IF NOT EXISTS `tb_disposisi_petunjuk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `petunjuk` varchar(200) DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_disposisi_petunjuk`
--

INSERT INTO `tb_disposisi_petunjuk` (`id`, `petunjuk`, `deleted`) VALUES
(1, 'setuju sesuai ketentuan yang berlaku', 0),
(2, 'tolak sesuai ketentuan yang berlaku', 0),
(3, 'selesaikan sesuai ketentuan yang berlaku', 0),
(4, 'jawab sesuai ketentuan yang berlaku', 0),
(5, 'perbaiki', 0),
(6, 'teliti & pendapat', 0),
(7, 'sesuai catatan', 0),
(8, 'untuk perhatian', 0),
(9, 'untuk diketahui', 0),
(10, 'edarkan', 0),
(11, 'bicarakan dengan saya', 0),
(12, 'bicarakan bersama dan laporkan hasilnya', 0),
(13, 'dijadwalkan', 0),
(14, 'simpan', 0),
(15, 'disiapkan', 0),
(16, 'ingatkan', 0),
(17, 'harap dihadiri/diwakili', 0),
(18, 'asli kepada', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
