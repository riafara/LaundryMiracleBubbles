-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 01, 2023 at 02:18 PM
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
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id_customer` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`id_customer`, `nama`, `alamat`, `no_hp`) VALUES
('CSR001', 'Sindi Sukma Wati', 'Perum Mastrip', '089876543543'),
('CSR002', 'Emiliya', 'Sumbersari Jember', '088765432156');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `id_detail` varchar(10) NOT NULL,
  `id_transaksi` varchar(10) NOT NULL,
  `id_paket` varchar(10) NOT NULL,
  `qty` int NOT NULL,
  `biaya` int NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_detail_transaksi`
--

INSERT INTO `tb_detail_transaksi` (`id_detail`, `id_transaksi`, `id_paket`, `qty`, `biaya`, `keterangan`) VALUES
('DTRS001', 'TRS001', 'PKT001', 7, 32000, ''),
('DTRS002', 'TRS002', 'PKT001', 5, 20000, ''),
('DTRS003', 'TRS003', 'PKT002', 8, 40000, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id_paket` varchar(10) NOT NULL,
  `paket` varchar(100) NOT NULL,
  `harga_kilo` int NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_paket`
--

INSERT INTO `tb_paket` (`id_paket`, `paket`, `harga_kilo`, `deskripsi`) VALUES
('PKT001', 'Cuci Kering', 4000, 'Selesai 3 hari'),
('PKT002', 'Cuci Setrika', 5000, 'Selesai 3 hari');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `id_customer` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_paket` varchar(10) NOT NULL,
  `qty` int NOT NULL,
  `biaya` int NOT NULL,
  `bayar` int NOT NULL,
  `kembalian` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `tanggal`, `id_customer`, `nama`, `id_paket`, `qty`, `biaya`, `bayar`, `kembalian`) VALUES
('TRS001', '2022-09-15', 'CSR001', 'Sindi Sukma Wati', 'PKT001', 7, 32000, 50000, 18000),
('TRS002', '2022-10-18', 'CSR002', 'Emiliya', 'PKT001', 5, 20000, 50000, 30000),
('TRS003', '2022-10-23', 'CSR001', 'Sindi Sukma Wati', 'PKT002', 8, 40000, 55000, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id` int NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `level` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `user_email`, `user_password`, `user_fullname`, `level`) VALUES
(2, 'admin@admin.com', '12344321', 'adminn', 1),
(5, 'riafara@user.com', '12345678', 'riafaraa', 2),
(6, 'dhila@user.com', '123455454', 'dhila', 2),
(9, 'ria@user.com', '12344321', 'faradhila', 2),
(11, 'sindisukma@gmail.com', '12344321', 'sindisukma', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_paket` (`id_paket`);

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
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level` (`level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
