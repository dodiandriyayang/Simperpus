-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18 Feb 2019 pada 18.53
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project-perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `nis` int(13) NOT NULL,
  `nama` varchar(10) NOT NULL,
  `kelas` int(2) NOT NULL,
  `jurusan` varchar(3) NOT NULL,
  `jenkel` varchar(10) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`nis`, `nama`, `kelas`, `jurusan`, `jenkel`, `alamat`) VALUES
(11160894, 'agus', 10, 'IPA', 'laki-laki', 'banten'),
(111608022, 'dodi', 10, 'IPS', 'laki-laki', 'tangerang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `kd_buku` varchar(10) NOT NULL,
  `jd_buku` varchar(10) NOT NULL,
  `jns_buku` varchar(10) NOT NULL,
  `pengarang` varchar(10) NOT NULL,
  `penerbit` varchar(10) NOT NULL,
  `th_terbit` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`kd_buku`, `jd_buku`, `jns_buku`, `pengarang`, `penerbit`, `th_terbit`, `stok`) VALUES
('BK001', 'langit', 'paket', 'ir', 'airlangga', 2105, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjam`
--

CREATE TABLE `peminjam` (
  `id_peminjam` int(11) NOT NULL,
  `nis` int(13) NOT NULL,
  `kd_buku` varchar(10) NOT NULL,
  `tgl_pinjam` varchar(10) NOT NULL,
  `jth_tempo` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjam`
--

INSERT INTO `peminjam` (`id_peminjam`, `nis`, `kd_buku`, `tgl_pinjam`, `jth_tempo`, `status`) VALUES
(1, 11160894, 'B005', '26-12-2018', '27-12-2018', 'dikembalikan'),
(2, 111608022, 'BK001', '30-12-2018', '31-12-2018', 'dikembalikan'),
(3, 11160894, 'BK001', '31-12-2018', '01-01-2019', 'dikembalikan'),
(4, 111608022, 'BK001', '31-12-2018', '25-12-2018', 'dikembalikan'),
(5, 111608022, 'BK001', '31-12-2018', '23-12-2018', 'dikembalikan'),
(6, 0, '----Pilih ', '02-01-2019', '', 'dipinjam'),
(7, 11160894, 'BK001', '05-01-2019', '10-01-2019', 'dikembalikan'),
(8, 0, 'BK001', '05-01-2019', '10-01-2019', 'dipinjam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_peminjam` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `kd_buku` varchar(10) NOT NULL,
  `tgl_kembali` varchar(10) NOT NULL,
  `telat` varchar(10) NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `id_peminjam`, `nis`, `kd_buku`, `tgl_kembali`, `telat`, `denda`) VALUES
(1, 1, 11160894, 'B005', '30-12-2018', '3hari', 0),
(2, 1, 11160894, 'B005', '30-12-2018', '3', 6000),
(4, 5, 111608022, 'BK001', '31-12-2018', '8', 16000),
(5, 4, 111608022, 'BK001', '31-12-2018', '6', 12000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `level`) VALUES
('admin', 'admin', 'admin'),
('petugas', 'petugas', 'petugas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kd_buku`);

--
-- Indexes for table `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`id_peminjam`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `peminjam`
--
ALTER TABLE `peminjam`
  MODIFY `id_peminjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
