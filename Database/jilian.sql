-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Mar 2024 pada 14.22
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
-- Database: `jilian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(4) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `maker_barang` int(4) NOT NULL,
  `tanggal_barang` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(4) NOT NULL,
  `id_guru_user` int(4) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `tanggal_guru` datetime NOT NULL DEFAULT current_timestamp(),
  `maker_guru` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `id_guru_user`, `nik`, `nama_guru`, `jk`, `tanggal_guru`, `maker_guru`) VALUES
(7, 26, '8647383656725637', 'admin', 'Laki-Laki', '2024-03-23 19:07:54', 26),
(8, 27, '7868632864325872', 'kepala sekolah', 'Perempuan', '2024-03-23 19:08:12', 26),
(9, 28, '6437215854625868', 'kesiswaan', 'Perempuan', '2024-03-23 19:08:32', 26),
(10, 29, '9784628654753277', 'guru', 'Perempuan', '2024-03-23 07:09:02', 26);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman_pengembalian`
--

CREATE TABLE `peminjaman_pengembalian` (
  `id_pp` int(4) NOT NULL,
  `id_barang_pp` int(4) NOT NULL,
  `stok` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `maker_pp` int(4) NOT NULL,
  `tanggal_pp` datetime NOT NULL DEFAULT current_timestamp(),
  `tanggal_pengembalian` datetime NOT NULL,
  `tanggal_laporan` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Trigger `peminjaman_pengembalian`
--
DELIMITER $$
CREATE TRIGGER `peminjaman_barang` AFTER INSERT ON `peminjaman_pengembalian` FOR EACH ROW UPDATE barang SET jumlah = jumlah - new.stok WHERE id_barang = new.id_barang_pp
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pengembalian_barang` AFTER UPDATE ON `peminjaman_pengembalian` FOR EACH ROW UPDATE barang SET jumlah = jumlah + new.stok WHERE id_barang = new.id_barang_pp AND new.id_barang_pp IN (SELECT id_barang_pp FROM peminjaman_pengembalian WHERE status = 'Barang Telah Diterima')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendataan_barang`
--

CREATE TABLE `pendataan_barang` (
  `id_pb` int(4) NOT NULL,
  `id_barang_pb` int(4) NOT NULL,
  `stok` varchar(255) NOT NULL,
  `maker_pb` int(4) NOT NULL,
  `tanggal_pb` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Trigger `pendataan_barang`
--
DELIMITER $$
CREATE TRIGGER `hapus_pendataan` AFTER DELETE ON `pendataan_barang` FOR EACH ROW update barang set jumlah = jumlah-old.stok WHERE id_barang = old.id_barang_pb
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pendataan_barang` AFTER INSERT ON `pendataan_barang` FOR EACH ROW UPDATE barang SET jumlah = jumlah + new.stok WHERE id_barang = new.id_barang_pb
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perizinan_sekolah`
--

CREATE TABLE `perizinan_sekolah` (
  `id_ps` int(4) NOT NULL,
  `status` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `jam_izin` datetime NOT NULL DEFAULT current_timestamp(),
  `jam_diizinkan` datetime NOT NULL,
  `maker_ps` int(4) NOT NULL,
  `tanggal_ps` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(4) NOT NULL,
  `id_siswa_user` int(4) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `tanggal_siswa` datetime NOT NULL DEFAULT current_timestamp(),
  `maker_siswa` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_siswa_user`, `nis`, `nama_siswa`, `jk`, `tanggal_siswa`, `maker_siswa`) VALUES
(10, 25, '1212132434', 'jilian 01', 'Perempuan', '2024-03-23 07:04:53', 25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(25, 'Jilian', '3dcf34a6023633a0d92521ec9c8d5ae4', 6),
(26, 'admin', '3dcf34a6023633a0d92521ec9c8d5ae4', 1),
(27, 'kepala sekolah', '3dcf34a6023633a0d92521ec9c8d5ae4', 2),
(28, 'kesiswaan', '3dcf34a6023633a0d92521ec9c8d5ae4', 3),
(29, 'guru', '3dcf34a6023633a0d92521ec9c8d5ae4', 4);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD UNIQUE KEY `BARANG` (`nama_barang`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD UNIQUE KEY `NIK` (`nik`);

--
-- Indeks untuk tabel `peminjaman_pengembalian`
--
ALTER TABLE `peminjaman_pengembalian`
  ADD PRIMARY KEY (`id_pp`);

--
-- Indeks untuk tabel `pendataan_barang`
--
ALTER TABLE `pendataan_barang`
  ADD PRIMARY KEY (`id_pb`);

--
-- Indeks untuk tabel `perizinan_sekolah`
--
ALTER TABLE `perizinan_sekolah`
  ADD PRIMARY KEY (`id_ps`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `NIS` (`nis`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `USERNAME` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `peminjaman_pengembalian`
--
ALTER TABLE `peminjaman_pengembalian`
  MODIFY `id_pp` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pendataan_barang`
--
ALTER TABLE `pendataan_barang`
  MODIFY `id_pb` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `perizinan_sekolah`
--
ALTER TABLE `perizinan_sekolah`
  MODIFY `id_ps` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
