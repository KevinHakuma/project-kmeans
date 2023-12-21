-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 05:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kmeans`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil_kuesioner`
--

CREATE TABLE `tb_hasil_kuesioner` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `jumlah_puas` int(11) NOT NULL,
  `jumlah_tidak_puas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_hasil_kuesioner`
--

INSERT INTO `tb_hasil_kuesioner` (`id`, `nama`, `jumlah_puas`, `jumlah_tidak_puas`) VALUES
(1, 'tes', 7, 0),
(2, 'tes', 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kuesioner`
--

CREATE TABLE `tb_kuesioner` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `produk_puas` int(11) NOT NULL,
  `layanan_puas` int(11) NOT NULL,
  `mudah_produk` int(11) NOT NULL,
  `kemungkinan_beli` int(11) NOT NULL,
  `kemungkinan_rekomendasi` int(11) NOT NULL,
  `pengiriman_puas` int(11) NOT NULL,
  `layanan_responsif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kuesioner`
--

INSERT INTO `tb_kuesioner` (`id`, `nama`, `produk_puas`, `layanan_puas`, `mudah_produk`, `kemungkinan_beli`, `kemungkinan_rekomendasi`, `pengiriman_puas`, `layanan_responsif`) VALUES
(1, 'andri', 3, 2, 5, 1, 4, 1, 4),
(2, 'kevin', 5, 2, 3, 1, 5, 4, 5),
(7, 'John', 4, 5, 4, 4, 5, 4, 3),
(8, 'Sarah', 3, 4, 3, 3, 4, 3, 4),
(9, 'Michael', 5, 5, 5, 5, 5, 5, 5),
(10, 'Emily', 2, 3, 2, 2, 3, 2, 2),
(11, 'David', 4, 4, 4, 4, 4, 4, 4),
(12, 'Jessica', 3, 3, 3, 3, 3, 3, 3),
(13, 'Brian', 5, 5, 5, 5, 5, 5, 5),
(14, 'Megan', 4, 4, 4, 4, 4, 4, 4),
(15, 'Christopher', 3, 3, 3, 3, 3, 3, 3),
(16, 'Lauren', 2, 2, 2, 2, 2, 2, 2),
(17, 'Daniel', 5, 5, 5, 5, 5, 5, 5),
(18, 'Ashley', 4, 4, 4, 4, 4, 4, 4),
(19, 'Kevin', 5, 2, 3, 1, 5, 4, 5),
(20, 'Zachary', 4, 4, 4, 4, 4, 4, 4),
(21, 'Madison', 5, 5, 5, 5, 5, 5, 5),
(22, 'Grace', 3, 3, 3, 3, 3, 3, 3),
(23, 'William', 2, 2, 2, 2, 2, 2, 2),
(24, 'Isabella', 4, 4, 4, 4, 4, 4, 4),
(25, 'Mia', 5, 5, 5, 5, 5, 5, 5),
(26, 'Kevin', 5, 2, 3, 1, 5, 4, 5),
(27, 'xdas', 2, 3, 4, 2, 1, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `nama`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'admin123'),
(2, 'kevin', 'kevin', '$2y$10$0IsJ3IjF'),
(3, 'kepin', 'kepin', '$2y$10$67aeHY8w');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_hasil_kuesioner`
--
ALTER TABLE `tb_hasil_kuesioner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kuesioner`
--
ALTER TABLE `tb_kuesioner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_hasil_kuesioner`
--
ALTER TABLE `tb_hasil_kuesioner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kuesioner`
--
ALTER TABLE `tb_kuesioner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
