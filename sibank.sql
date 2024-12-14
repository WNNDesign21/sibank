-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Des 2024 pada 15.36
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

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
-- Struktur dari tabel `debitur`
--

CREATE TABLE `debitur` (
  `nik` bigint(16) NOT NULL,
  `no_kk` bigint(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `rtrw` int(7) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `debitur`
--

INSERT INTO `debitur` (`nik`, `no_kk`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `rtrw`, `desa`, `kecamatan`, `kota`, `agama`, `pekerjaan`, `status_perkawinan`, `kewarganegaraan`, `nama_ibu`, `no_npwp`, `pendidikan`, `no_hp`) VALUES
(3471140209790001, 0, 'RIYANTO. SE	', 'GROBOGAN', '1979-09-02', 'LAKI-LAKI', 'PRM PURI DOMAS D-3, SEMPU	', 1, 'WEDOMARTANI	', 'NGEMPLAK	', 'SLEMAN	', 'ISLAM	', 'PEDAGANG	', 'KAWIN', 'WNI', '', 0, '', 0),
(3471140209790002, 0, 'RIYANTO. SE	', 'GROBOGAN', '1979-09-02', 'LAKI-LAKI', 'PRM PURI DOMAS D-3, SEMPU	', 1, 'WEDOMARTANI	', 'NGEMPLAK	', 'SLEMAN	', 'ISLAM	', 'PEDAGANG	', 'KAWIN', 'WNI', '', 0, '', 0),
(3471140209790003, 0, 'RIYANTO. SE	', 'GROBOGAN', '1979-09-02', 'LAKI-LAKI', 'PRM PURI DOMAS D-3, SEMPU	', 1, 'WEDOMARTANI	', 'NGEMPLAK	', 'SLEMAN	', 'ISLAM	', 'PEDAGANG	', 'KAWIN', 'WNI', '', 0, '', 0),
(3471140209790004, 0, 'RIYANTO. SE	', 'GROBOGAN', '1979-09-02', 'LAKI-LAKI', 'PRM PURI DOMAS D-3, SEMPU	', 1, 'WEDOMARTANI	', 'NGEMPLAK	', 'SLEMAN	', 'ISLAM	', 'PEDAGANG	', 'KAWIN', 'WNI', '', 0, '', 0),
(3471140209790005, 0, 'RIYANTO. SE	', 'GROBOGAN', '1979-09-02', 'LAKI-LAKI', 'PRM PURI DOMAS D-3, SEMPU	', 1, 'WEDOMARTANI	', 'NGEMPLAK	', 'SLEMAN	', 'ISLAM	', 'PEDAGANG	', 'KAWIN', 'WNI', '', 0, '', 0),
(3471140209790006, 0, 'RIYANTO. SE	', 'GROBOGAN', '1979-09-02', 'LAKI-LAKI', 'PRM PURI DOMAS D-3, SEMPU	', 1, 'WEDOMARTANI	', 'NGEMPLAK	', 'SLEMAN	', 'ISLAM	', 'PEDAGANG	', 'KAWIN', 'WNI', '', 0, '', 0),
(3471140209790007, 0, 'RIYANTO. SE	', 'GROBOGAN', '1979-09-02', 'LAKI-LAKI', 'PRM PURI DOMAS D-3, SEMPU	', 1, 'WEDOMARTANI	', 'NGEMPLAK	', 'SLEMAN	', 'ISLAM	', 'PEDAGANG	', 'KAWIN', 'WNI', '', 0, '', 0),
(3471140209790008, 0, 'RIYANTO. SE	', 'GROBOGAN', '1979-09-02', 'LAKI-LAKI', 'PRM PURI DOMAS D-3, SEMPU	', 1, 'WEDOMARTANI	', 'NGEMPLAK	', 'SLEMAN	', 'ISLAM	', 'PEDAGANG	', 'KAWIN', 'WNI', '', 0, '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `loans`
--

CREATE TABLE `loans` (
  `id` int(12) NOT NULL,
  `nama_cust` varchar(50) NOT NULL,
  `pinjaman` float NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `loans`
--

INSERT INTO `loans` (`id`, `nama_cust`, `pinjaman`, `tanggal`) VALUES
(1, 'wendi', 12345, '2024-09-26'),
(2, 'adhi', 35275400, '2024-09-26'),
(3, 'arie', 43517900, '2024-09-26'),
(4, 'nabil', 25000, '2024-09-27'),
(5, 'test', 35000000, '2024-10-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pas_debt`
--

CREATE TABLE `pas_debt` (
  `nik_pas` bigint(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pas_debt`
--

INSERT INTO `pas_debt` (`nik_pas`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`) VALUES
(3215052112960005, 'Sely Elviana', 'Karawang', '2024-10-02', 'test database');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjaman`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pinjaman`
--

INSERT INTO `pinjaman` (`id_pinjaman`, `sumber`, `nama_sumber`, `nama_sales`, `pinajam`, `tenor`, `tujuan`, `produk`, `pot`, `deskripsi`, `debitur`, `pasangan`) VALUES
(202410070001, 1, 'Adhi', 'Nugraha', 50000000, 24, 'Konsumtif', 1, 1, 'pinjaman pertama', 3215052112960002, 3215052112960005);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pot`
--

CREATE TABLE `pot` (
  `id_pot` int(2) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(2) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sumber`
--

CREATE TABLE `sumber` (
  `id_sumber` int(2) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sumber`
--

INSERT INTO `sumber` (`id_sumber`, `keterangan`) VALUES
(1, 'Mitra Bisnis'),
(2, 'Repeat Order');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tujuan_pinjaman`
--

CREATE TABLE `tujuan_pinjaman` (
  `id_tujuan` int(1) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `username` int(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(8) NOT NULL,
  `jabatan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`username`, `nama`, `password`, `jabatan`) VALUES
(123456, 'Tangguh Colay', '@12345', 'MANAGER'),
(211296, 'Wendi Nugraha N', '123@abc', 'IT STAFF');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `debitur`
--
ALTER TABLE `debitur`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pas_debt`
--
ALTER TABLE `pas_debt`
  ADD PRIMARY KEY (`nik_pas`);

--
-- Indeks untuk tabel `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`),
  ADD KEY `debitur` (`debitur`),
  ADD KEY `pasangan` (`pasangan`);

--
-- Indeks untuk tabel `pot`
--
ALTER TABLE `pot`
  ADD PRIMARY KEY (`id_pot`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `sumber`
--
ALTER TABLE `sumber`
  ADD PRIMARY KEY (`id_sumber`);

--
-- Indeks untuk tabel `tujuan_pinjaman`
--
ALTER TABLE `tujuan_pinjaman`
  ADD PRIMARY KEY (`id_tujuan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
