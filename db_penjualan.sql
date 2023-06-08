-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2023 at 04:45 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE `tb_akun` (
  `username` varchar(30) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(40) NOT NULL,
  `pw` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`username`, `jabatan`, `jenis_kelamin`, `alamat`, `email`, `pw`) VALUES
('Afriansyah', 'owner', 'Laki-laki', 'parung serab', 'afri@gmail.com', '123'),
('Fahmi Aziz', 'admin', 'Laki-laki', 'bogor', 'azisgurih712@gmail.com', '12345'),
('Jamal', 'admin', 'Laki-laki', 'pabuaran', 'jamal@gmail.com', '111'),
('Maman', 'owner', 'Laki-laki', 'depok barat', 'mamanracing@gmail.com', 'qwerty'),
('Maman1', 'owner1', 'Laki-laki', 'depok barat1', 'mamanracing1@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `barang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `barang`) VALUES
(2, 'Kopi Taktik'),
(4, 'Kopi Dolce 2'),
(8, 'Kopi Expresso'),
(10, 'Matcha Ice');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id_penjualan`, `id_barang`, `jumlah`, `tgl_penjualan`, `username`) VALUES
(51, 3, 12, '2023-05-26', 'Jamal'),
(53, 3, 22, '2024-10-22', 'Jamal'),
(54, 4, 12, '2023-06-06', 'Fahmi Aziz'),
(55, 2, 6, '2023-07-06', 'Fahmi Aziz'),
(58, 3, 9, '2023-05-31', 'Afriansyah'),
(65, 3, 12, '2023-05-30', 'Afriansyah'),
(66, 4, 2, '2023-06-21', 'Afriansyah'),
(68, 2, 1, '2023-06-03', 'Afriansyah'),
(71, 0, 3, '2023-06-22', 'Afriansyah'),
(72, 6, 12, '2023-06-04', 'Afriansyah'),
(74, 8, 5, '2023-06-15', 'Afriansyah'),
(75, 10, 14, '2023-06-08', 'Afriansyah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
