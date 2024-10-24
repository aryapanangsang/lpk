-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Des 2022 pada 08.15
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id19664824_daftar_pbi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `nip` varchar(20) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `bagian` varchar(20) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`nip`, `nama_karyawan`, `bagian`, `no_hp`) VALUES
('000', 'Fitri Asnah', 'Staff HRD', '08811897593'),
('01', 'Pak Cepi', 'Asisten Manager ', '085559564132'),
('333', 'Sapan', 'PE', '68576'),
('3355', 'Sapan', 'PE', '445');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelamar`
--

CREATE TABLE `pelamar` (
  `id_pelamar` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama_pelamar` varchar(40) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` varchar(10) NOT NULL,
  `tb` varchar(3) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `pengalaman` varchar(100) NOT NULL,
  `vaksin` varchar(10) NOT NULL,
  `tujuan` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `tgl_buat` timestamp NOT NULL DEFAULT current_timestamp(),
  `tgl_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelamar`
--

INSERT INTO `pelamar` (`id_pelamar`, `nik`, `email`, `password`, `nama_pelamar`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `tb`, `alamat`, `no_hp`, `pengalaman`, `vaksin`, `tujuan`, `status`, `foto`, `keterangan`, `tgl_buat`, `tgl_update`) VALUES
(2, '3275124807040004', 'deaputriadelinnainggolan@gmail.comgdg', '$2y$10$5.OuP4V8WEwNBGSK..6Ot.D6YchUKMJCdph0wTnXWqhIpBKIXeRem', 'Dea Putri Adelin Magdalena', 'Perempuan', 'Jakarta', '2004-07-07', '', 'Kampung mekar no 50', '08811897593', 'Tidak ada', '3', 'Cikarang', 'Selesai', '', 'Karyawan', '2022-10-04 15:54:11', '2022-12-23 08:54:42'),
(3, '3215145111030008', 'ekadfdgylnngsh@gmail.com', '$2y$10$8lMTGac8q3zbDwl3finM0uNKEb39So6r4LmIxLZPVzW5S4GyZt9He', 'Eka Yulianingsih', 'Perempuan', 'Karawang ', '2003-11-11', '', 'Sukamaju RT 02 RW 04 Desa Jatisari Kecamatan Jatisari Kabupaten Karawang ', '089650088326', '-', '3', 'Cikarang', '-', '', '', '2022-10-04 15:54:11', '2022-12-23 04:25:08'),
(4, '3214036807040002', 'addawiadfgdfgdazzahra@gmail.com', '$2y$10$1OkBVPDIWTl5NQV1a99Xq./nf3NrzQExXijF8sugPFIJrW.SFPu5O', 'Addawia Azzahra ', 'Perempuan', 'Purwakarta ', '2004-07-28', '', 'Kp.Ciganea RT07/03 Des. Mekargalih Kec. Jatiluhur Kab. Purwakarta', '085559564132', 'Fresh graduate ', '3', 'Purwakarta', '-', '', 'Karyawan', '2022-10-04 15:54:11', '2022-12-23 06:25:19'),
(13, '2423', 'indieproject18@gmail.com', '$2y$10$8vbkSTVR5OB5fKH5VwLzm.wW8qfQUElfg3Aatjhc40d1Q5KLv1Pqi', 'JAMALUDIN AL GIFARI', 'Laki-laki', 'Garut', '2002-07-12', '189', 'Garut', '463465', 'QC', '3', 'Cikarang', '-', '', '', '2022-11-03 06:33:42', '2022-12-23 04:25:08'),
(14, '3453', 'cek@g.css', '$2y$10$dNy4OVbCIW.oVFQpQ/zT7.8HsLd5JRxaZWe5qSReEp4ommiegUrRu', 'AKA', 'Laki-laki', 'Garut', '2003-02-20', '189', 'Garut', '1234', 'QC', '3', 'Cikarang', '-', '-', '-', '2022-12-14 04:22:14', '2022-12-23 04:25:08'),
(15, '', '', '$2y$10$wIyJLrYUPjNyZo/3cyKDxOvfKXeU/3zl0Cc1cJJvDIod3/gs5qhgu', '', 'Laki-laki', '', '2003-02-02', '189', '', '', '', '3', 'Purwakarta', '-', '-', 'Karyawan', '2022-12-19 06:59:19', '2022-12-23 04:25:08'),
(16, '3', 'cek@g.css22', '$2y$10$M6ey3lqYr3RXe/Cl/cgvmeytVvWaGt1w01AfQoIoccjjklOG8nyZG', '', 'Laki-laki', '', '2003-02-02', '178', '', '', '', '3', 'Purwakarta', '-', '-', 'tklp', '2022-12-19 07:01:21', '2022-12-23 04:25:08'),
(17, '36', 'cek@g.css222', '$2y$10$9pHVcstgFjZb3.wWytq0e.bhQclGu5iNUTHYVJxiJ7QTpclmxunzS', 'Adi', 'Laki-laki', '', '2003-02-02', '169', '', '', '', '3', 'Purwakarta', 'Selesai', '-', 'tklp', '2022-12-19 07:02:04', '2022-12-23 08:49:01'),
(18, '366', 'cek@g.css229', '$2y$10$v5PYG4Sw9y1Flz2BaaykkOFiVygf7cis7CG/GsCRXeV4z2SP95eTC', '', 'Laki-laki', '', '2003-02-02', '169', '', '', '', '3', 'Purwakarta', '-', '-', 'Karyawan', '2022-12-19 07:04:01', '2022-12-23 04:25:08'),
(19, '361', 'cek@g.css2291', '$2y$10$cVxVHYZDIkWjK0zrh4slrOOYWKIClfv4zN.SD82ytH30h2t2WGGTu', '', 'Laki-laki', '', '2003-02-02', '190', '', '', '', '3', 'Purwakarta', '-', '-', 'Pelamar', '2022-12-19 07:04:51', '2022-12-23 04:25:08'),
(20, '3612', 'cek@g.css22921', '$2y$10$rXT1MrbmPVKHjdWzSC.rCeMKMYS.QXfeJ90uZpjdXT.3qsNc5TvtG', '', 'Laki-laki', '', '2003-02-02', '198', '', '', '', '3', 'Cikarang', '-', '-', 'Oms', '2022-12-19 07:05:32', '2022-12-23 04:25:08'),
(21, '361243', 'cek@g.css229213', '$2y$10$9tgQCTlyJ5Zh9hK5aorSc.Ur5cTitSYGQxBLgCTZdPZhY.HGx/KIG', '', 'Laki-laki', '', '2003-02-02', '198', '', '', '', '3', 'Cikarang', '-', '-', 'Oms', '2022-12-19 07:07:00', '2022-12-23 04:25:08'),
(22, '3612434', 'cek@g.css2292131', '$2y$10$QENWNSX023RrQ2axw72/YeUlrnb0l.DXmt4B7q9xEq/QF6EWlekJu', '', 'Laki-laki', '', '2003-02-02', '188', '', '', '', '3', 'Cikarang', '-', '-', 'Pelamar', '2022-12-19 07:07:50', '2022-12-23 04:25:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` varchar(20) NOT NULL,
  `nama_perusahaan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `referensi`
--

CREATE TABLE `referensi` (
  `id_referensi` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `id_pelamar` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `referensi`
--

INSERT INTO `referensi` (`id_referensi`, `nip`, `id_pelamar`) VALUES
(8, '000', '32053944'),
(9, '000', '3275124807040004'),
(10, '04', '3215145111030008'),
(11, '01', '3214036807040002'),
(12, '03', '3209136806020001'),
(13, '01', '3205'),
(14, '333', '234234'),
(15, '333', '343245'),
(16, '333', '343245'),
(17, '333', '343245'),
(18, '333', '343245'),
(19, '333', '123412'),
(20, '333', '2423'),
(21, '444', '55656'),
(22, '444', '55656'),
(23, '444', '3453'),
(24, '444', '3453'),
(25, '3355', ''),
(26, '085521', '3'),
(27, '333', '366'),
(28, '085521', '36'),
(29, '08545454', '361243');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sponsor`
--

CREATE TABLE `sponsor` (
  `id` int(11) NOT NULL,
  `id_sponsor` varchar(15) NOT NULL,
  `nama_sponsor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sponsor`
--

INSERT INTO `sponsor` (`id`, `id_sponsor`, `nama_sponsor`) VALUES
(1, '444', ''),
(2, '085521', 'Odang'),
(3, '08545454', 'Endang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tes_kesehatan`
--

CREATE TABLE `tes_kesehatan` (
  `id_kesehatan` int(20) NOT NULL,
  `id_pelamar` varchar(20) NOT NULL,
  `tgl_tesK` varchar(10) NOT NULL,
  `hasil` varchar(30) NOT NULL,
  `ketMcu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tes_kesehatan`
--

INSERT INTO `tes_kesehatan` (`id_kesehatan`, `id_pelamar`, `tgl_tesK`, `hasil`, `ketMcu`) VALUES
(1, '3275124807040004', '2022-10-04', 'Lolos', 'Fit To Work'),
(2, '3215145111030008', '2022-10-04', 'Gagal', '-'),
(3, '3214036807040002', '2022-10-04', 'Lolos', 'Fit'),
(4, '3209136806020001', '2022-10-04', 'Belum Ada Hasil', '-'),
(5, '32053944', '2022-10-04', 'Gagal', '-'),
(6, '2423', '2022-11-30', 'Lolos', 'Fit To Work'),
(7, '36', '2022-12-24', 'Lolos', 'Fit ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tes_tulis`
--

CREATE TABLE `tes_tulis` (
  `id_tesTulis` int(20) NOT NULL,
  `id_pelamar` varchar(20) NOT NULL,
  `tgl_tesT` varchar(10) NOT NULL,
  `hasil` varchar(30) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tes_tulis`
--

INSERT INTO `tes_tulis` (`id_tesTulis`, `id_pelamar`, `tgl_tesT`, `hasil`, `keterangan`) VALUES
(1, '3275124807040004', '2022-10-04', 'Lolos', '-'),
(2, '3215145111030008', '2022-10-04', 'Lolos', '-'),
(13, '2423', '2022-11-30', 'Lolos', 'Nilai Sesuai'),
(14, '3214036807040002', '2022-12-15', 'Lolos', 'Nilai Sesuai'),
(20, '36', '2022-12-24', 'Lolos', 'Nilai Sesuai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `training`
--

CREATE TABLE `training` (
  `id_training` int(11) NOT NULL,
  `id_pelamar` varchar(20) NOT NULL,
  `tgl_training` varchar(10) NOT NULL,
  `ket` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `training`
--

INSERT INTO `training` (`id_training`, `id_pelamar`, `tgl_training`, `ket`) VALUES
(1, '2423', '2022-12-03', 'Belum Ada Jadwal'),
(4, '36', '2022-12-27', ''),
(5, '3275124807040004', '2022-12-10', 'Berlangsung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(500) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `level` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_admin`, `level`) VALUES
(1, 'pbi', '123', 'Fariz', ''),
(2, 'mkn', '123', 'Jay', ''),
(3, 'imc@admin.cc', '$2y$10$yCYjh5dxfcGXnXur20XzWO4BimYR/xVlX0ggiJbafwq4qq4Iy2qJ.', 'IMC', '2'),
(4, 'superadmin@adminpbi.cc', '$2y$10$YWZXamovyikeUh8YFgyqF.4JmWD7DSLHqMIcRBeuvsDKJ0SYGDwua', 'Fariz Rizal M', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`id_pelamar`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indeks untuk tabel `referensi`
--
ALTER TABLE `referensi`
  ADD PRIMARY KEY (`id_referensi`);

--
-- Indeks untuk tabel `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tes_kesehatan`
--
ALTER TABLE `tes_kesehatan`
  ADD PRIMARY KEY (`id_kesehatan`),
  ADD KEY `id_pelamar` (`id_pelamar`);

--
-- Indeks untuk tabel `tes_tulis`
--
ALTER TABLE `tes_tulis`
  ADD PRIMARY KEY (`id_tesTulis`),
  ADD KEY `id_pelamar` (`id_pelamar`);

--
-- Indeks untuk tabel `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id_training`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pelamar`
--
ALTER TABLE `pelamar`
  MODIFY `id_pelamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `referensi`
--
ALTER TABLE `referensi`
  MODIFY `id_referensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tes_kesehatan`
--
ALTER TABLE `tes_kesehatan`
  MODIFY `id_kesehatan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tes_tulis`
--
ALTER TABLE `tes_tulis`
  MODIFY `id_tesTulis` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `training`
--
ALTER TABLE `training`
  MODIFY `id_training` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
