-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Sep 2021 pada 10.15
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donatur_ym`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_karyawan`
--

CREATE TABLE `data_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `gender` varchar(128) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `no_tlpn` int(11) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `status_karyawan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_karyawan`
--

INSERT INTO `data_karyawan` (`id_karyawan`, `nik`, `nama`, `gender`, `tgl_lahir`, `alamat`, `no_tlpn`, `jabatan`, `email`, `status_karyawan`) VALUES
(1, 111, 'babat', 'Laki-laki', '2021-02-02', 'asf', 8765431, 'asd', 'admin@gmail.com', 'Tetap'),
(5, 22222, 'Abdurrahman Hanif', 'Laki-laki', '1999-12-02', 'Putat Gede Barat 2/7 Surabaya', 11, 'hrd', 'abdurrahmanhanif85@gmail.co.id', 'Tetap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kelompok`
--

CREATE TABLE `data_kelompok` (
  `id_kelompok` int(11) NOT NULL,
  `kode_kelompok` varchar(10) NOT NULL,
  `nama_kelompok` varchar(50) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_kelompok`
--

INSERT INTO `data_kelompok` (`id_kelompok`, `kode_kelompok`, `nama_kelompok`, `create_at`, `update_at`) VALUES
(3, 'W-001', 'Surabaya Barat', '2021-09-21 11:20:56', NULL),
(4, 'W-002', 'Surabaya Timur', '2021-09-21 11:21:14', NULL),
(5, 'W-003', 'Surabaya Utara', '2021-09-21 11:21:28', NULL),
(6, 'W-004', 'Surabaya Selatan', '2021-09-21 11:21:43', NULL),
(7, 'W-005', 'Surabaya Pusat', '2021-09-21 11:22:02', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pju`
--

CREATE TABLE `data_pju` (
  `id_pju` int(11) NOT NULL,
  `kode_kelompok` varchar(11) NOT NULL,
  `kode_pju` varchar(50) NOT NULL,
  `alamat_pju` varchar(128) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_pju`
--

INSERT INTO `data_pju` (`id_pju`, `kode_kelompok`, `kode_pju`, `alamat_pju`, `lat`, `lng`, `create_at`) VALUES
(1, 'W-001', 'P-001', 'Putat Gede', -7.26128835544977, 112.69936155289817, '2021-09-21 07:31:59'),
(8, 'W-002', 'P-012', 'pradah', -7.253538340531229, 112.7417619077669, '2021-09-22 05:28:26'),
(14, 'W-004', 'P-001', 'putat', -7.246215914307619, 112.76545117778643, '2021-09-22 06:20:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `deteksi_pju`
--

CREATE TABLE `deteksi_pju` (
  `id_deteksi` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `whatsapp` int(13) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `kelurahan` varchar(20) NOT NULL,
  `laporan` varchar(256) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `create_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `donatur`
--

CREATE TABLE `donatur` (
  `id_donatur` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `name` varchar(128) NOT NULL,
  `gender` varchar(128) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `no_tlpn` varchar(20) NOT NULL,
  `hobi` varchar(128) NOT NULL,
  `status` varchar(128) NOT NULL,
  `pekerjaan` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `status_donatur` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `donatur`
--

INSERT INTO `donatur` (`id_donatur`, `nik`, `name`, `gender`, `tgl_lahir`, `alamat`, `no_tlpn`, `hobi`, `status`, `pekerjaan`, `email`, `status_donatur`) VALUES
(27, '1234567890', 'Abdurrahman Hanif', 'Laki-laki', '1999-12-09', 'Putat Gede Barat 2, Surabaya', '08765431', 'Desain', 'Lajang', 'Mahasiswa', 'abdurrahmanhanif85@gmail.com', 'Aktif'),
(28, '04072000', 'Adif Julianto', 'Laki-laki', '2000-07-04', 'Jl. Putat Gede Barat 2, Surabaya', '089778668768', 'Menggambar', 'Lajang', 'Swasta', 'bunda@yahoo.com', 'Aktif'),
(29, '04101998', 'Dinda Rahayu R.S', 'Laki-laki', '1998-10-04', 'Jl. Gayungsari 123, Surabaya', '083885460045', 'Berenang', 'Lajang', 'Swasta', 'bunda@yahoo.com', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `merchant`
--

CREATE TABLE `merchant` (
  `id_merchant` int(11) NOT NULL,
  `name_merchant` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `merchant`
--

INSERT INTO `merchant` (`id_merchant`, `name_merchant`) VALUES
(1, 'Mandiri Bersama'),
(2, 'Infak Yatim'),
(3, 'GenOTA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_donatur` int(11) NOT NULL,
  `jenis_transaksi` varchar(128) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `nominal` decimal(10,0) NOT NULL,
  `payment_gateway` varchar(128) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `id_merchant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_donatur`, `jenis_transaksi`, `keterangan`, `nominal`, `payment_gateway`, `tanggal_transaksi`, `id_merchant`) VALUES
(10, 28, 'Lunas', '-', '1000000', 'Lunas', '2021-06-15', 3),
(11, 28, 'Lunas', '-', '1000000', 'Lunas', '2021-06-10', 2),
(12, 27, 'Lunas', '-', '5000000', 'Lunas', '2021-06-17', 2),
(13, 29, 'Lunas', '-', '7000000', 'Lunas', '2021-06-15', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(5, 'Admin', 'admin@gmail.com', 'default.jpg', '$2y$10$mEQ2eQ6CbC7Hw7R80WKFfux1XHAAhMlGyca74SpuKuR2dJmG/8Q1a', 1, 1, 1614930452),
(12, 'hanif', 'abdurrahmanhanif85@gmail.com', 'default.jpg', '$2y$10$CJ74Xyydqx/VqIWmtyNJbOyW6QWgxAmPDJqSnwlWAueBCj8lUnWRS', 2, 1, 1614926608);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`role_id`, `role`) VALUES
(1, 'Admin'),
(2, 'User');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `data_kelompok`
--
ALTER TABLE `data_kelompok`
  ADD PRIMARY KEY (`id_kelompok`);

--
-- Indeks untuk tabel `data_pju`
--
ALTER TABLE `data_pju`
  ADD PRIMARY KEY (`id_pju`);

--
-- Indeks untuk tabel `deteksi_pju`
--
ALTER TABLE `deteksi_pju`
  ADD PRIMARY KEY (`id_deteksi`);

--
-- Indeks untuk tabel `donatur`
--
ALTER TABLE `donatur`
  ADD PRIMARY KEY (`id_donatur`);

--
-- Indeks untuk tabel `merchant`
--
ALTER TABLE `merchant`
  ADD PRIMARY KEY (`id_merchant`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_karyawan`
--
ALTER TABLE `data_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `data_kelompok`
--
ALTER TABLE `data_kelompok`
  MODIFY `id_kelompok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `data_pju`
--
ALTER TABLE `data_pju`
  MODIFY `id_pju` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `deteksi_pju`
--
ALTER TABLE `deteksi_pju`
  MODIFY `id_deteksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `donatur`
--
ALTER TABLE `donatur`
  MODIFY `id_donatur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `merchant`
--
ALTER TABLE `merchant`
  MODIFY `id_merchant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
