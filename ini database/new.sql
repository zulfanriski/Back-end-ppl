-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Apr 2023 pada 07.21
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
-- Database: `new`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `nomertlp` int(14) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `name`, `email`, `password`, `image`, `nomertlp`, `alamat`) VALUES
(1, 'admin', 'admin@gmail.com', '12345', 'eko.PNG', 812398, 'mojokerto');

-- --------------------------------------------------------

--
-- Struktur dari tabel `formulir`
--

CREATE TABLE `formulir` (
  `id_form` int(11) NOT NULL,
  `id_mitra` int(100) NOT NULL,
  `id_Agro` int(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nomertlp` int(14) NOT NULL,
  `alasan` text NOT NULL,
  `tgldibuat` date NOT NULL,
  `tglsetuju` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `formulir`
--

INSERT INTO `formulir` (`id_form`, `id_mitra`, `id_Agro`, `nama`, `alamat`, `nomertlp`, `alasan`, `tgldibuat`, `tglsetuju`) VALUES
(6, 4, 3, 'fara', 'sumolawang', 8965412, 'sadqw', '2023-04-11', 1),
(7, 4, 3, 'mnmansd', 'ajdhkqwkjh', 12412314, 'askdbqkjb', '2023-04-15', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitra`
--

CREATE TABLE `mitra` (
  `id_mitra` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `namausaha` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `visimisi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mitra`
--

INSERT INTO `mitra` (`id_mitra`, `name`, `email`, `password`, `namausaha`, `image`, `visimisi`) VALUES
(1, 'zulfan', 'zulfan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', '', ''),
(2, 'riski', 'riski@gmail.com', '202cb962ac59075b964b07152d234b70', '', '', ''),
(3, 'dj', 'dj@gmail.com', '202cb962ac59075b964b07152d234b70', 'asds', '527454.jpg', 'sadsadas'),
(4, 'fara', 'fara@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelakuagro`
--

CREATE TABLE `pelakuagro` (
  `id_agro` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL,
  `namausaha` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelakuagro`
--

INSERT INTO `pelakuagro` (`id_agro`, `name`, `email`, `password`, `image`, `namausaha`, `deskripsi`) VALUES
(3, 'zulfan', 'zulfan@gma', '81dc9bdb52d04dc20036dbd8313ed055', 'ARKOM poster.png', 'chrome', 'alkdqhwilhdfqbqbf'),
(4, 'ijat', 'ijat@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'apakabar.PNG', 'pt ijat', 'turu terus'),
(5, 'ccc', 'ccc@gmail.', '81dc9bdb52d04dc20036dbd8313ed055', '', '', ''),
(6, 'ijatkun', 'jati@gmail.com', '202cb962ac59075b964b07152d234b70', '', '', ''),
(7, 'ros', 'ros@gmail.com', '202cb962ac59075b964b07152d234b70', 'ajh.PNG', 'asdasd', 'qwdqwfsa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `formulir`
--
ALTER TABLE `formulir`
  ADD PRIMARY KEY (`id_form`);

--
-- Indeks untuk tabel `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id_mitra`);

--
-- Indeks untuk tabel `pelakuagro`
--
ALTER TABLE `pelakuagro`
  ADD PRIMARY KEY (`id_agro`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `formulir`
--
ALTER TABLE `formulir`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id_mitra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pelakuagro`
--
ALTER TABLE `pelakuagro`
  MODIFY `id_agro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
