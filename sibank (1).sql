-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2024 at 11:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sibank`
--

-- --------------------------------------------------------

--
-- Table structure for table `debitur`
--

CREATE TABLE `debitur` (
  `nik` bigint(16) NOT NULL,
  `no_kk` bigint(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` int(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `desa` varchar(25) NOT NULL,
  `kecamatan` varchar(25) NOT NULL,
  `kota` varchar(25) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `pekerjaan` varchar(15) NOT NULL,
  `status_perkawinan` varchar(15) NOT NULL,
  `kewarganegaraan` varchar(3) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `no_npwp` bigint(16) NOT NULL,
  `pendidikan` varchar(25) NOT NULL,
  `no_hp` bigint(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` int(12) NOT NULL,
  `nama_cust` varchar(50) NOT NULL,
  `pinjaman` float NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `nama_cust`, `pinjaman`, `tanggal`) VALUES
(1, 'wendi', 12345, '2024-09-26'),
(2, 'adhi', 35275400, '2024-09-26'),
(3, 'arie', 43517900, '2024-09-26'),
(4, 'nabil', 25000, '2024-09-27'),
(5, 'test', 35000000, '2024-10-12');

-- --------------------------------------------------------

--
-- Table structure for table `pas_debt`
--

CREATE TABLE `pas_debt` (
  `nik_pas` bigint(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pas_debt`
--

INSERT INTO `pas_debt` (`nik_pas`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`) VALUES
(3215052112960005, 'Sely Elviana', 'Karawang', '2024-10-02', 'test database');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id_pinjaman` bigint(12) NOT NULL,
  `sumber` int(2) NOT NULL,
  `nama_sumber` varchar(50) NOT NULL,
  `nama_sales` varchar(50) NOT NULL,
  `pinajam` int(12) NOT NULL,
  `tenor` int(3) NOT NULL,
  `tujuan` varchar(20) NOT NULL,
  `produk` int(2) NOT NULL,
  `pot` int(2) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `debitur` bigint(16) NOT NULL,
  `pasangan` bigint(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`id_pinjaman`, `sumber`, `nama_sumber`, `nama_sales`, `pinajam`, `tenor`, `tujuan`, `produk`, `pot`, `deskripsi`, `debitur`, `pasangan`) VALUES
(202410070001, 1, 'Adhi', 'Nugraha', 50000000, 24, 'Konsumtif', 1, 1, 'pinjaman pertama', 3215052112960002, 3215052112960005);

-- --------------------------------------------------------

--
-- Table structure for table `pot`
--

CREATE TABLE `pot` (
  `id_pot` int(2) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(2) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sumber`
--

CREATE TABLE `sumber` (
  `id_sumber` int(2) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sumber`
--

INSERT INTO `sumber` (`id_sumber`, `keterangan`) VALUES
(1, 'Mitra Bisnis'),
(2, 'Repeat Order');

-- --------------------------------------------------------

--
-- Table structure for table `tujuan_pinjaman`
--

CREATE TABLE `tujuan_pinjaman` (
  `id_tujuan` int(1) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` int(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(8) NOT NULL,
  `jabatan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `nama`, `password`, `jabatan`) VALUES
(123456, 'Tangguh Colay', '@12345', 'MANAGER'),
(211296, 'Wendi Nugraha N', '123@abc', 'IT STAFF');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `debitur`
--
ALTER TABLE `debitur`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pas_debt`
--
ALTER TABLE `pas_debt`
  ADD PRIMARY KEY (`nik_pas`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`),
  ADD KEY `debitur` (`debitur`),
  ADD KEY `pasangan` (`pasangan`);

--
-- Indexes for table `pot`
--
ALTER TABLE `pot`
  ADD PRIMARY KEY (`id_pot`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `sumber`
--
ALTER TABLE `sumber`
  ADD PRIMARY KEY (`id_sumber`);

--
-- Indexes for table `tujuan_pinjaman`
--
ALTER TABLE `tujuan_pinjaman`
  ADD PRIMARY KEY (`id_tujuan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD CONSTRAINT `debitur` FOREIGN KEY (`debitur`) REFERENCES `debitur` (`nik`),
  ADD CONSTRAINT `pasangan` FOREIGN KEY (`pasangan`) REFERENCES `pas_debt` (`nik_pas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
