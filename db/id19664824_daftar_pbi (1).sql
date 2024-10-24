-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jan 2023 pada 23.15
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

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
('111', 'Fitri Asnah', 'Staff HRD', '09876765'),
('1214', 'Asep Saepudin', 'PPIC', '089456721546'),
('222', 'Cepi Febrian', 'Asisten Manajer', '087542464');

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
(4, '320539', 'indieproject@gmail.com', '$2y$10$l6SxOMCiikeDN52J8.BH4OHvipckRfLXEI4XdqY1k92s9tq.9kv..', 'FARIZ RIZAL MUBAROK', 'Laki-laki', 'Garut', '2002-12-12', '178', 'Kp. Citarik', '08561775388', 'Operator', '3', 'Purwakarta', 'NG MCU', '-', 'Karyawan', '2023-01-01 04:47:18', '2023-01-01 04:58:16'),
(5, '321', 'sarah@a.c', '$2y$10$SxnOKD2k6qrvt/clMQ5v9ugVtQU6lNkVSYturmd759scJI5sDwkku', 'SARAH MUSTARI', 'Perempuan', 'Jakarta', '2003-02-05', '159', 'Graha Asri Jl. Cimandiri IX A', '082541558', 'QC', '3', 'Cikarang', '-', '-', 'Oms', '2023-01-01 05:22:54', '2023-01-01 05:22:54'),
(6, '1212', 'dea@a.c', '$2y$10$W5XSbAKEhSX18MxLylda8ekFrMPxjjlbnEr0muvlesiER2j2vGYwm', 'DEA AULIA', 'Perempuan', 'Jakarta', '2003-03-05', '160', 'Cikarang Timur', '087584648', 'Operator', '3', 'Purwakarta', 'Proses', '-', 'Karyawan', '2023-01-01 05:29:02', '2023-01-01 05:57:46'),
(7, '1122', 'syafiq@a.c', '$2y$10$O/Ia0euNjKjXwcXlUsI1RueYLr/5TUt58tH8YeB4B5U/nrrawqYCi', 'SYAFIQ ATHAR NABIL', 'Laki-laki', 'Bekasi', '2003-01-09', '170', 'Cikarang Timur', '085215234125', 'PE', '3', 'Purwakarta', 'OK Test', '-', 'tklp', '2023-01-01 05:31:28', '2023-01-01 05:58:26'),
(8, '123', 'fadhil@a.c', '$2y$10$PC7BEJKyvS7w0IRuXM8tHOyjaDKXepia8dDEMJSeBDIrkub/Jt8w6', 'M. FADHIL ', 'Laki-laki', 'Bekasi', '2002-05-17', '185', 'Cikarang', '085213645798', '-', '3', 'Purwakarta', 'OK MCU', '-', 'Pelamar', '2023-01-01 05:34:15', '2023-01-01 05:59:37'),
(9, '333', 'shofi@a.c', '$2y$10$6INNED8ZuvMyJpU4nSfeHeOApN/EbBXZcfoSFzuHHlXfKETVc/lqK', 'SHOFI AFIFAH', 'Perempuan', 'Bekasi', '2002-04-07', '161', 'Cikarang', '085213645798', '-', '3', 'Purwakarta', 'Selesai', '-', 'Pelamar', '2023-01-01 05:39:55', '2023-01-01 06:03:40'),
(10, '124', 'azka@a.c', '$2y$10$8qSnLmrTGayh3mi4IxIiGucLeGvR69y9Mo6qmsoyFVNK3ZPsYWHmu', 'AZKA', 'Perempuan', 'Bekasi', '2002-03-06', '168', 'Cikarang', '005231456987', 'QC', '3', 'Purwakarta', 'Training', '-', 'Karyawan', '2023-01-01 05:44:34', '2023-01-01 06:01:12');

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
(2, '111', '320539'),
(3, '0785421840', '321'),
(4, '222', '1212'),
(5, '085125123456', '1122'),
(6, '1214', '124');

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
(1, '0785421840', 'Endang'),
(2, '085125123456', 'Odang');

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
(2, '320539', '2023-01-02', 'Gagal', 'Miopia &amp; TBC'),
(3, '123', '2023-01-03', 'Lolos', 'Fit To Work'),
(4, '124', '2023-01-02', 'Lolos', 'Fit To Work'),
(5, '333', '2023-01-02', 'Lolos', 'Fit To Work');

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
(2, '320539', '2023-01-02', 'Lolos', 'Nilai Sesuai'),
(3, '1212', '2023-01-02', 'Belum Ada Hasil', '-'),
(4, '1122', '2023-01-03', 'Lolos', '-'),
(5, '123', '2023-01-02', 'Lolos', 'Nilai Sesuai'),
(6, '124', '2023-01-02', 'Lolos', 'Nilai Sesuai'),
(7, '333', '2023-01-02', 'Lolos', 'Nilai Sesuai');

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
(2, '124', '2023-01-09', 'Sedang Berlangsung'),
(3, '333', '2023-01-09', 'Selesai');

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
  MODIFY `id_pelamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `referensi`
--
ALTER TABLE `referensi`
  MODIFY `id_referensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tes_kesehatan`
--
ALTER TABLE `tes_kesehatan`
  MODIFY `id_kesehatan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tes_tulis`
--
ALTER TABLE `tes_tulis`
  MODIFY `id_tesTulis` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `training`
--
ALTER TABLE `training`
  MODIFY `id_training` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
