-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 06 Nov 2022 pada 12.10
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belajar_pa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id_plg` int(11) NOT NULL,
  `username_plg` varchar(30) NOT NULL,
  `nama_plg` varchar(30) NOT NULL,
  `no_hp_plg` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id_plg`, `username_plg`, `nama_plg`, `no_hp_plg`, `password`) VALUES
(1, 'alex', 'alex', '9213456', '$2y$10$tDkkJSZhIQVSExMMg2QHMeKQPco7CeAAnD.9k2X74fTgbt1S32/1m'),
(2, 'dsfds', 'sdfsd', '332', '$2y$10$Ni634YnDP1xHQkd3QXL0.eOkmDpHewN3D7QK5Qt8U7vLwPmq1rbO.'),
(3, 'budi', 'budi321', '831543212', '$2y$10$uiwCrjZC21qhCEcI4TpS1O7GBCgpKRUelWjs6qYr3I/L/4g5mzKdu'),
(4, 'dsfds', 'dsfsd', '3442', '$2y$10$iNcd0w30m6MPGtwUDAWpXudCrzD.YZbyKgw0kPgd67czQhT1XiEAS'),
(5, 'siti21z', 'siti', '8123456', '$2y$10$mjVHHneStoFQvyaSBV97SOR1L9U4V7ivgBF0fDpZZo94BI.o5e7W6'),
(6, 'andri213', 'andri', '083874934188', '$2y$10$mSY/HIv6Wes9rXWHZZvMnOydmZkuWPa7ZM2dCqJDaM1kFqcxGfzsm');

-- --------------------------------------------------------

--
-- Struktur dari tabel `goods`
--

CREATE TABLE `goods` (
  `id_barang` int(5) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jenis_barang` varchar(30) NOT NULL,
  `stok_barang` int(5) NOT NULL,
  `status_barang` enum('ready','tidak') DEFAULT NULL,
  `harga_barang` int(20) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `goods`
--

INSERT INTO `goods` (`id_barang`, `nama_barang`, `jenis_barang`, `stok_barang`, `status_barang`, `harga_barang`, `gambar`, `tanggal`) VALUES
(140, 'dfds', 'sdfsd', 232, 'tidak', 5000, 'kacamata.jpg', '2022-11-05 02:46:26'),
(141, 'bandana', 'atribut basket', 40, 'tidak', 5000, 'foto_hendy_1.jpeg', '2022-11-05 21:52:39'),
(142, 'barbel', 'alat angkat berat', 50, 'ready', 100000, 'raket.jpeg', '2022-11-05 21:54:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_hp` int(12) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `username`, `nama`, `no_hp`, `password`) VALUES
(3, 'april', '', 0, '$2y$10$eFvwSdxXQoQl7YQQz6doaOOp3HclK0BlT.mXinn5vRPhLbXrPN8FK'),
(4, 'alex', '', 0, '$2y$10$v4WM0hu75K66UXAfRXZxwu.lKd9lCsYYnESn9U3T6.2PMbSmgbTli'),
(5, 'budianto', '', 0, '$2y$10$vfdJpAGiiy3rPq1QvVpC5uJqYSE.XvHHHmYNxbukZamFSUVV.Fjee'),
(6, 'alif', '', 0, '$2y$10$itOFFYVDq..hMERDlXsgY.Hvk/qnhdMijltSsc6KQDu9DP4WMa4Jm'),
(7, 'said', '', 0, '$2y$10$2huHBPCtPSRv13cPsg6IWOCkeiBh0TdlQbchitrKLn6tkmgN5yCJC'),
(8, 'alif', '', 0, '$2y$10$nCVl2sxdjAL7WuVZLjSvmu/CSQ9wrEXazwvDx7M.ZE2kYzgUinwD.'),
(9, 'hendy', '', 0, '$2y$10$3szleGbfUziHjw7zcXpVyeLjhpG7qHitYWeiAVsrYb57xiP0M/oYO'),
(10, 'tano', '', 0, '$2y$10$AhRU/KOFwo1Ba9wVJPrs4OQhnaMvX3rgcuOkx.dxOTRGlnbU4aPCO'),
(11, 'anjas', '', 0, '$2y$10$9HRJampGAnmi/mJxj/mZU.fbd5TWXWvMd/TFPhUAyftqLeNWSA78m'),
(12, 'andri21', 'andri mana', 81243567, '$2y$10$NqGHcvJeavWP7J.ZGC7i0.813x8jgeg40CJQIOlki0WDlmlXT/Nh6'),
(13, 'aprilia', 'adfs', 304928, '$2y$10$Krk1E2aDEg.12SFg.HB.PemNSLJtDtJZx1WTnIyKih5j9GsQ.cIlq');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_plg`);

--
-- Indeks untuk tabel `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id_plg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `goods`
--
ALTER TABLE `goods`
  MODIFY `id_barang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
