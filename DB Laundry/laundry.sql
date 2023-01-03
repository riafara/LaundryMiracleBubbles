-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 02, 2023 at 02:13 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundryy`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id_customer` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_hp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`id_customer`, `nama`, `alamat`, `no_hp`) VALUES
('CSR001', 'Sindi Sukma Wati', 'Perum Mastrip', '089876543543'),
('CSR002', 'Emiliya', 'Sumbersari Jember', '088765432156'),
('CSR003', 'Rasyid Ridhowi', 'Perum Puri', '089765432123'),
('CSR004', 'Marisa', 'Perum Mastrip', '087698654345'),
('CSR005', 'Vania', 'Jember', '0876789876543'),
('CSR006', 'Caca', 'Jember', '087987654321'),
('CSR007', 'Ria Fara', 'Perum Mastrip', '089345675432'),
('CSR008', 'Lutfa', 'Tegalgede', '087654765345'),
('CSR009', 'Yuyun', 'Kaliurang', '087654876543'),
('CSR010', 'Lelita', 'Kaliurang', '089765432345');

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id_paket` varchar(10) NOT NULL,
  `paket` varchar(100) NOT NULL,
  `harga_kilo` int NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_paket`
--

INSERT INTO `tb_paket` (`id_paket`, `paket`, `harga_kilo`, `deskripsi`) VALUES
('PKT001', 'Cuci Kering', 4000, 'Selesai 3 hari'),
('PKT002', 'Cuci Setrika', 5000, 'Selesai 3 hari'),
('PKT003', 'Cuci Kering', 5000, 'Selesai 2 hari'),
('PKT004', 'Cuci Setrika', 6000, 'Selesai 2 hari'),
('PKT005', 'Cuci Kering', 6000, 'Selesai 1 hari'),
('PKT006', 'Cuci Setrika', 7000, 'Selesai 1 hari');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `id_customer` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_paket` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `qty` int NOT NULL,
  `biaya` int NOT NULL,
  `bayar` int NOT NULL,
  `kembalian` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `tanggal`, `id_customer`, `nama`, `id_paket`, `qty`, `biaya`, `bayar`, `kembalian`) VALUES
('TRS001', '2022-09-15', 'CSR001', 'Sindi Sukma Wati', 'PKT001', 7, 32000, 50000, 18000),
('TRS002', '2022-10-18', 'CSR002', 'Emiliya', 'PKT001', 5, 20000, 50000, 30000),
('TRS003', '2022-10-23', 'CSR001', 'Sindi Sukma Wati', 'PKT002', 8, 40000, 55000, 15000),
('TRS004', '2022-11-13', 'CSR004', 'Marisa', 'PKT002', 3, 15000, 20000, 5000),
('TRS005', '2022-11-15', 'CSR005', 'Vania', 'PKT001', 5, 20000, 20000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `level` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `user_email`, `user_password`, `user_fullname`, `level`) VALUES
(1, 'admin@admin.com', '12344321', 'admin', 1),
(2, 'owner@owner.com', '12345678', 'owner', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pelanggan` (`id_customer`),
  ADD KEY `kd_paket` (`id_paket`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level` (`level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `tb_customer` (`id_customer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
