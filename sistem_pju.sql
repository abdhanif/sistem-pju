-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Okt 2021 pada 10.31
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
-- Database: `sistem_pju`
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
(1, 'W-001', 'PJU-006', 'Putat Gede', -7.26128835544977, 112.69936155289817, '2021-09-21 07:31:59'),
(8, 'W-002', 'PJU-012', 'pradah', -7.253538340531229, 112.7417619077669, '2021-09-22 05:28:26'),
(14, 'W-004', 'PJU-001', 'putat', -7.246215914307619, 112.76545117778643, '2021-09-22 06:20:06'),
(15, 'W-001', 'PJU-005', 'Kawal', -7.26047750662601, 112.7510101690341, '2021-09-24 08:37:25'),
(16, 'W-002', 'PJU-007', 'Pradah', -7.2373039632982525, 112.75540898723467, '2021-10-05 07:34:48'),
(17, 'W-005', 'PJU-010', 'Simo', -7.285040442162224, 112.72733893819051, '2021-10-05 07:35:23'),
(18, 'W-005', 'PJU-011', 'Dipo', -7.268140546455926, 112.75800704956055, '2021-10-05 07:35:59'),
(19, 'W-003', 'PJU-020', 'Setro', -7.2426252432966765, 112.80319542226232, '2021-10-05 07:36:39'),
(20, 'W-003', 'PJU-013', 'Kenjeran', -7.294192946546676, 112.80160903930664, '2021-10-05 07:37:19'),
(21, 'W-004', 'PJU-015', 'Karah', -7.336588706569289, 112.71509170532227, '2021-10-05 07:38:30'),
(22, 'W-001', 'PJU-016', 'Kupang', -7.269102941156375, 112.72854545224918, '2021-10-05 07:40:50'),
(23, 'W-001', 'PJU-017', 'Lontar', -7.300492972697578, 112.67251968383789, '2021-10-05 07:46:26'),
(24, 'W-001', 'PJU-212', 'LALA', -7.2594557956381465, 112.7556718486294, '2021-10-06 13:11:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `deteksi_pju`
--

CREATE TABLE `deteksi_pju` (
  `id_deteksi` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `whatsapp` int(13) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `kelurahan` varchar(20) NOT NULL,
  `laporan` varchar(256) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `verifikasi` varchar(128) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `deteksi_pju`
--

INSERT INTO `deteksi_pju` (`id_deteksi`, `nama`, `whatsapp`, `alamat`, `kecamatan`, `kelurahan`, `laporan`, `gambar`, `verifikasi`, `create_at`) VALUES
(1, 'dad', 11, 'ffd', 'efd', 'dvdv', 'vsv', 'svdv', 'DISETUJUI', '2021-09-27 11:45:27'),
(2, 'Abdurrahman Hanif', 2147483647, 'Jl.Putat Gede Barat 2/7', 'Sukomanunggal', 'Putat Gede', 'Lampu PJU mati di ruas jalan Hr.Muhammad depan Pom Bensin Hr.Muhammad arah ke Mayjend Sungkono sampai dengan depan Daihatsu Hr.Muhammad', 'default.jpg', 'DISETUJUI', '2021-09-27 14:30:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `kode_kelompok` varchar(128) NOT NULL,
  `kode_pju` varchar(128) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `kode_kelompok`, `kode_pju`, `status`, `create_at`, `update_at`) VALUES
(23, 'W-001', 'PJU-005', 'BELUM', '2021-10-05 13:21:58', '2021-10-05 13:21:58'),
(24, 'W-002', 'PJU-012', 'BELUM', '2021-10-05 13:22:50', '2021-10-05 13:22:50'),
(25, 'W-004', 'PJU-001', 'BELUM', '2021-10-05 13:23:04', '2021-10-05 13:23:04'),
(27, 'W-001', 'PJU-006', 'BELUM', '2021-10-05 13:23:17', '2021-10-05 13:23:17'),
(28, 'W-004', 'PJU-015', 'BELUM', '2021-10-05 14:39:14', '2021-10-05 14:39:14'),
(29, 'W-002', 'PJU-007', 'BELUM', '2021-10-05 14:39:35', '2021-10-05 14:39:35'),
(30, 'W-001', 'PJU-016', 'BELUM', '2021-10-05 14:41:05', '2021-10-05 14:41:05');

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
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

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
  MODIFY `id_pju` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `deteksi_pju`
--
ALTER TABLE `deteksi_pju`
  MODIFY `id_deteksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
