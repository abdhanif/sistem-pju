-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Nov 2021 pada 12.39
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
(5, 22222, 'Abdurrahman Hanif', 'Laki-laki', '1999-12-02', 'Putat Gede Barat 2/7 Surabaya', 12222, 'hrd', 'abdurrahmanhanif85@gmail.co.id', 'Tetap'),
(6, 1111, 'Abdurrahman Hanif', 'Lakilaki', '1999-12-02', 'Putat Gede Barat 2/7 Surabaya', 11, 'hrd', 'hajayakak@gaha.com', 'Tetap'),
(7, 1111, 'Abdurrahman Hanif', 'Perempuan', '0000-00-00', 'Putat Gede Barat 2/7 Surabaya', 0, 'hrd', 'hajayakak@gaha.com', 'Kontrak'),
(8, 1111, 'Abdurrahman Hanif', 'Perempuan', '1999-12-02', 'Putat Gede Barat 2/7 Surabaya', 33, 'hrd', 'hajayakak@gaha.com', 'Resign');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kelompok`
--

CREATE TABLE `data_kelompok` (
  `id_kelompok` int(11) NOT NULL,
  `nama_kelompok` varchar(50) NOT NULL,
  `create_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_kelompok`
--

INSERT INTO `data_kelompok` (`id_kelompok`, `nama_kelompok`, `create_at`) VALUES
(1, 'Surabaya Pusat', '0000-00-00'),
(2, 'Surabaya Barat', '0000-00-00'),
(3, 'Surabaya Utara', '0000-00-00'),
(4, 'Surabaya Timur', '0000-00-00'),
(5, 'Surabaya Selatan', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pju`
--

CREATE TABLE `data_pju` (
  `id_pju` int(11) NOT NULL,
  `id_kelompok` int(11) NOT NULL,
  `kode_pju` varchar(20) NOT NULL,
  `alamat_pju` varchar(128) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `create_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_pju`
--

INSERT INTO `data_pju` (`id_pju`, `id_kelompok`, `kode_pju`, `alamat_pju`, `lat`, `lng`, `create_at`) VALUES
(1, 2, 'PJU-006', 'Jl. Raya Graha Famili Utara, Pradahkalikendal, Kec. Dukuhpakis, Kota SBY, Jawa Timur 60227', -7.291243325904042, 112.68613815318533, '0000-00-00'),
(4, 4, 'PJU-012', 'Tebel Tengah, Tebel, Kec. Gedangan, Kabupaten Sidoarjo, Jawa Timur 61254', -7.405451911517074, 112.72687912074618, '0000-00-00'),
(14, 5, 'PJU-001', 'Surabaya, Prapen, Kec. Tenggilis Mejoyo, Kota SBY, Jawa Timur 60299', -7.314795831313746, 112.75492697640342, '0000-00-00'),
(15, 2, 'PJU-005', 'Jl. Dukuh Kupang XI, Dukuh Kupang, Kec. Dukuhpakis, Kota SBY, Jawa Timur 60225', -7.279251032510824, 112.71421025676592, '0000-00-00'),
(16, 4, 'PJU-007', 'Gedung I, Siwalankerto, Kec. Wonocolo, Kota SBY, Jawa Timur 60236', -7.33948304919021, 112.73757934570312, '0000-00-00'),
(17, 1, 'PJU-010', 'Jl. Kembang Kuning Kramat Jaya No.2, RT.015/RW.06, Pakis, Kec. Sawahan, Kota SBY, Jawa Timur 60256', -7.2765490317618315, 112.72518217563629, '0000-00-00'),
(18, 1, 'PJU-011', 'Jl. Mayjen Prof. Dr. Moestopo No.6-8, Airlangga, Kec. Gubeng, Kota SBY, Jawa Timur 60286', -7.268140546455926, 112.75800704956055, '0000-00-00'),
(19, 3, 'PJU-020', 'Jl. Kalisari Damen 3-14, Kalisari, Kec. Mulyorejo, Kota SBY, Jawa Timur 60112', -7.27399947170167, 112.79815813078454, '0000-00-00'),
(20, 3, 'PJU-013', 'Jl. Keputih Tegal No.10, Keputih, Kec. Sukolilo, Kota SBY, Jawa Timur 60111', -7.294192946546676, 112.80160903930664, '0000-00-00'),
(21, 5, 'PJU-015', 'Jl. Jemur Andayani XXI No.18 Jemur Wonosari Wonocolo Surabaya Jawa Timur, Pagesangan, Kec. Jambangan, Kota SBY, Jawa Timur 60237', -7.336588706569289, 112.71509170532227, '0000-00-00'),
(22, 2, 'PJU-016', 'Jl. Petemon Timur No.10, RW.01, Sawahan, Kec. Sawahan, Kota SBY, Jawa Timur 60251', -7.269102941156375, 112.72854545224918, '0000-00-00'),
(23, 2, 'PJU-017', 'Jl. Lidah Wetan, Lidah Wetan, Kec. Lakarsantri, Kota SBY, Jawa Timur 60213', -7.300492972697578, 112.67251968383789, '0000-00-00'),
(26, 4, 'PJU-021', 'Jl. Joyoboyo 8, Bungur, Medaeng, Kec. Waru, Kabupaten Sidoarjo, Jawa Timur 61256', -7.353599793432107, 112.72145748051118, '0000-00-00'),
(27, 4, 'PJU-022', 'Surabaya, Manyar Sabrangan, Kec. Mulyorejo, Kota SBY, Jawa Timur 60116', -7.286806443184338, 112.76330441236497, '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `deteksi_pju`
--

CREATE TABLE `deteksi_pju` (
  `id_deteksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_tlpn` int(13) NOT NULL,
  `kode_pju_box` varchar(20) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `laporan` varchar(256) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `verifikasi` varchar(128) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `deteksi_pju`
--

INSERT INTO `deteksi_pju` (`id_deteksi`, `id_user`, `no_tlpn`, `kode_pju_box`, `alamat`, `laporan`, `gambar`, `verifikasi`, `create_at`) VALUES
(11, 3, 122, 'PJU-015', 'scsc', 'scsc', 'PJU-015.jpg', '', '2021-11-23 11:33:10'),
(12, 4, 12233, 'PJU-020', 'scsc', 'scscs', 'PJU-020.png', 'DISETUJUI', '2021-11-23 11:36:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_kelompok` int(11) NOT NULL,
  `kode_jadwal` varchar(20) NOT NULL,
  `kode_pju` varchar(20) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `create_at` date NOT NULL DEFAULT current_timestamp(),
  `id_mst_maintenance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_kelompok`, `kode_jadwal`, `kode_pju`, `status`, `create_at`, `id_mst_maintenance`) VALUES
(23, 2, 'J-001', 'PJU-005', 'SUDAH', '2021-10-05', NULL),
(24, 4, 'J-004', 'PJU-012', 'BELUM', '2021-10-05', NULL),
(25, 5, 'J-006', 'PJU-001', 'BELUM', '2021-11-05', NULL),
(27, 2, 'J-002', 'PJU-006', 'BELUM', '2021-10-05', NULL),
(28, 5, 'J-007', 'PJU-015', 'BELUM', '2021-10-05', NULL),
(29, 4, 'J-005', 'PJU-007', 'BELUM', '2021-10-05', NULL),
(30, 2, 'J-003', 'PJU-016', 'BELUM', '2021-10-05', NULL),
(32, 4, 'J-008', 'PJU-021', 'BELUM', '2021-10-16', NULL),
(33, 4, 'J-009', 'PJU-022', 'BELUM', '2021-10-29', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_data_maintenance`
--

CREATE TABLE `master_data_maintenance` (
  `ID` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `waktu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_data_maintenance`
--

INSERT INTO `master_data_maintenance` (`ID`, `deskripsi`, `waktu`) VALUES
(2, 'Ganti Kabel', 60),
(3, 'Ganti Resistor', 90),
(4, 'Cek Sensor', 365);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pju_data_maintenance`
--

CREATE TABLE `pju_data_maintenance` (
  `ID` int(11) NOT NULL,
  `kode_pju` varchar(20) NOT NULL,
  `id_mst_maintenance` int(11) NOT NULL,
  `tgl_terakhir_maintenance` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pju_data_maintenance`
--

INSERT INTO `pju_data_maintenance` (`ID`, `kode_pju`, `id_mst_maintenance`, `tgl_terakhir_maintenance`) VALUES
(1, 'PJU-006', 2, '2021-11-21 16:50:23'),
(2, 'PJU-006', 2, '2021-11-21 17:37:00'),
(3, 'PJU-006', 2, '2021-11-21 17:37:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `table_user`
--

CREATE TABLE `table_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(256) NOT NULL,
  `user_akses` int(11) NOT NULL,
  `user_status` int(11) NOT NULL,
  `create_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `table_user`
--

INSERT INTO `table_user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_akses`, `user_status`, `create_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 'b759497cf50772b2452434b3983eebcc1772f1e03bbd76dc2a139da7', 1, 1, '0000-00-00'),
(2, 'Hanif', 'hanif@gmail.com', 'b759497cf50772b2452434b3983eebcc1772f1e03bbd76dc2a139da7', 2, 1, '0000-00-00'),
(3, 'Masyarakat', 'masyarakat@gmail.com', 'b759497cf50772b2452434b3983eebcc1772f1e03bbd76dc2a139da7', 3, 1, '0000-00-00'),
(4, 'Dinda', 'dinda@gmail.com', 'b759497cf50772b2452434b3983eebcc1772f1e03bbd76dc2a139da7', 3, 1, '0000-00-00'),
(7, 'bima', 'bima@gmail.com', 'b759497cf50772b2452434b3983eebcc1772f1e03bbd76dc2a139da7', 3, 0, '2021-11-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_akses`
--

CREATE TABLE `user_akses` (
  `akses_id` int(11) NOT NULL,
  `akses` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_akses`
--

INSERT INTO `user_akses` (`akses_id`, `akses`) VALUES
(1, 'Staff'),
(2, 'Teknisi'),
(3, 'Masyarakat');

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
-- Indeks untuk tabel `master_data_maintenance`
--
ALTER TABLE `master_data_maintenance`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `pju_data_maintenance`
--
ALTER TABLE `pju_data_maintenance`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `table_user`
--
ALTER TABLE `table_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `user_akses`
--
ALTER TABLE `user_akses`
  ADD PRIMARY KEY (`akses_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_karyawan`
--
ALTER TABLE `data_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `data_kelompok`
--
ALTER TABLE `data_kelompok`
  MODIFY `id_kelompok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `data_pju`
--
ALTER TABLE `data_pju`
  MODIFY `id_pju` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `deteksi_pju`
--
ALTER TABLE `deteksi_pju`
  MODIFY `id_deteksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `master_data_maintenance`
--
ALTER TABLE `master_data_maintenance`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pju_data_maintenance`
--
ALTER TABLE `pju_data_maintenance`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `table_user`
--
ALTER TABLE `table_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_akses`
--
ALTER TABLE `user_akses`
  MODIFY `akses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
