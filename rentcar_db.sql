-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:8111
-- Generation Time: Mar 18, 2026 at 11:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentcar_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `idakun` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`idakun`, `nama`, `password`) VALUES
(1, 'vektor', 'vektor123');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `idmobil` int(11) NOT NULL,
  `nama_mobil` varchar(100) NOT NULL,
  `harga_12` int(11) DEFAULT NULL,
  `harga_24` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `kapasitas` int(11) DEFAULT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`idmobil`, `nama_mobil`, `harga_12`, `harga_24`, `rating`, `kapasitas`, `gambar`) VALUES
(1, 'Toyota Avanza', 250000, 400000, 5, 7, './images/avanza.jpg'),
(2, 'Honda Brio', 200000, 350000, 4, 5, './images/brio.jpg'),
(3, 'Toyota Innova', 400000, 700000, 5, 8, './images/innova.jpg'),
(4, 'Daihatsu Xenia', 230000, 380000, 4, 7, './images/xenia.jpg'),
(5, 'Suzuki Ertiga', 270000, 420000, 4, 7, './images/ertiga.jpg'),
(6, 'Mitsubishi Pajero', 600000, 950000, 5, 7, './images/pajero.jpg'),
(7, 'Toyota Fortuner', 650000, 1000000, 5, 7, './images/fortuner.jpg'),
(8, 'Honda Mobilio', 240000, 390000, 4, 7, './images/mobilio.jpg'),
(9, 'Nissan Livina', 260000, 410000, 4, 7, './images/livina.jpg'),
(10, 'Wuling Almaz', 350000, 600000, 5, 7, './images/almaz.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`idakun`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`idmobil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
