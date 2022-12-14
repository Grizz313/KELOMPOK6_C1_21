-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 12 Nov 2022 pada 15.17
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
(1, 'alex22', 'alex', '081254254527', '$2y$10$AImV17sorWYjMGPw71rWy.TkMXlM8V4juOmh4vF7zEYSIV.K5FThK'),
(2, 'dsfds', 'sdfsd', '332', '$2y$10$Ni634YnDP1xHQkd3QXL0.eOkmDpHewN3D7QK5Qt8U7vLwPmq1rbO.'),
(6, 'andri213', 'andri', '083874934188', '$2y$10$5EMcQXe3amw2aeZive7Dru8E1yDNn2KofdsjfEGIn7ivg2U9yGKjW'),
(8, 'sambo12', 'sambo', '083153568054', '$2y$10$O5pgH2qGW8B4soRkneXnqeN8Fj1bau0rpzcTU.1n16qUXTUKd7912'),
(9, 'putra12', 'putra', '0811224356332', '$2y$10$pIymTrikA7RW2HyVGAzHhO5Ui6EHW2UAVFGsP3EYUEMov2BABDLGu'),
(10, 'hendy32', 'hendy', '08881223', '$2y$10$Y68SIypBa5JijOgzMig5KeyBnlUAP1ONybUdu/Ll2Lg9/WArRc/.i');

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
(175, 'barbel', 'peralatan gym', 30, 'ready', 4000, '636f8a155bb41.jpeg', '2022-11-12 19:57:09'),
(176, 'raket', 'alat_bulu tangkis', 30, 'ready', 5000, '636f91dfdec68.jpeg', '2022-11-12 20:30:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id_pesanan` int(11) NOT NULL,
  `id_plg` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jmlh_pesanan` int(11) NOT NULL,
  `total_harga_pesanan` int(11) NOT NULL,
  `tgl_pesanan` date NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id_pesanan`, `id_plg`, `id_barang`, `jmlh_pesanan`, `total_harga_pesanan`, `tgl_pesanan`, `alamat`) VALUES
(51, 1, 176, 2, 10000, '2022-11-12', 'jl. lancar'),
(52, 1, 175, 30, 120000, '2022-11-12', 'dsfdsf'),
(53, 1, 176, 40, 200000, '2022-11-12', 'dfdsfsd'),
(54, 1, 176, 2, 10000, '2022-11-12', 'dsfds');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `username`, `nama`, `no_hp`, `password`) VALUES
(18, 'admin21', 'admin', '0921554433', '$2y$10$9XnGsKYSctzAh77ZsKzP4OmlKp7tm28oNANAG4CoaypvdmPmxArgi'),
(20, 'hendy', 'hendy', '088221133', '$2y$10$0f7xOS0/vr8xwt5Eim4iSOof3QVlXoX.ZSmn0JmPE41iIxaaCzRV2'),
(21, 'sarah21', 'sarah', '09654321', '$2y$10$tqMqAqStdx4cGmbWBIZ9lulPilhgXotbowo/tKjYhohSM/qSSQCR2');

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
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_plg` (`id_plg`),
  ADD KEY `id_barang` (`id_barang`);

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
  MODIFY `id_plg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `goods`
--
ALTER TABLE `goods`
  MODIFY `id_barang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_plg`) REFERENCES `customers` (`id_plg`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `goods` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
