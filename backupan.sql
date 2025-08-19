-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Waktu pembuatan: 19 Agu 2025 pada 12.33
-- Versi server: 8.4.5
-- Versi PHP: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siom_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensis`
--

CREATE TABLE `absensis` (
  `id` bigint UNSIGNED NOT NULL,
  `pertemuan_id` bigint UNSIGNED NOT NULL,
  `anggota_id` bigint UNSIGNED NOT NULL,
  `status` enum('Hadir','Tidak Hadir','Izin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Hadir',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `periode_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `absensis`
--

INSERT INTO `absensis` (`id`, `pertemuan_id`, `anggota_id`, `status`, `created_at`, `updated_at`, `periode_id`) VALUES
(38, 25, 14, 'Hadir', '2025-05-04 08:43:46', '2025-05-04 08:43:46', NULL),
(39, 25, 15, 'Tidak Hadir', '2025-05-04 08:43:46', '2025-05-04 08:43:46', NULL),
(40, 25, 17, 'Tidak Hadir', '2025-05-04 08:43:46', '2025-05-04 08:43:46', NULL),
(41, 25, 18, 'Hadir', '2025-05-04 08:43:46', '2025-05-04 08:43:46', NULL),
(42, 26, 12, 'Hadir', '2025-05-06 13:10:14', '2025-05-06 13:10:14', NULL),
(43, 26, 16, 'Tidak Hadir', '2025-05-06 13:10:14', '2025-05-06 13:10:14', NULL),
(44, 26, 19, 'Hadir', '2025-05-06 13:10:14', '2025-05-06 13:10:14', NULL),
(57, 26, 20, 'Hadir', '2025-05-10 12:15:36', '2025-05-10 12:15:36', NULL),
(62, 31, 12, 'Hadir', '2025-05-10 14:37:09', '2025-05-10 14:37:09', NULL),
(63, 31, 16, 'Hadir', '2025-05-10 14:37:09', '2025-05-10 14:37:09', NULL),
(64, 31, 19, 'Hadir', '2025-05-10 14:37:09', '2025-05-10 14:37:09', NULL),
(65, 31, 20, 'Hadir', '2025-05-10 14:37:09', '2025-05-10 14:37:09', NULL),
(66, 32, 14, 'Hadir', '2025-05-10 15:09:13', '2025-05-10 15:09:13', NULL),
(67, 32, 15, 'Hadir', '2025-05-10 15:09:13', '2025-05-10 15:09:13', NULL),
(68, 32, 17, 'Hadir', '2025-05-10 15:09:13', '2025-05-10 15:09:13', NULL),
(69, 32, 18, 'Hadir', '2025-05-10 15:09:13', '2025-05-10 15:09:13', NULL),
(70, 33, 12, 'Hadir', '2025-05-12 01:51:03', '2025-05-12 01:51:03', NULL),
(71, 33, 16, 'Izin', '2025-05-12 01:51:03', '2025-05-12 01:51:03', NULL),
(72, 33, 19, 'Tidak Hadir', '2025-05-12 01:51:03', '2025-05-12 01:51:03', NULL),
(73, 33, 20, 'Hadir', '2025-05-12 01:51:03', '2025-05-12 01:51:03', NULL),
(79, 35, 14, 'Izin', '2025-06-11 07:00:21', '2025-06-11 07:00:21', NULL),
(80, 35, 15, 'Tidak Hadir', '2025-06-11 07:00:21', '2025-06-11 07:00:21', NULL),
(81, 35, 17, 'Hadir', '2025-06-11 07:00:21', '2025-06-11 07:00:21', NULL),
(82, 35, 18, 'Hadir', '2025-06-11 07:00:22', '2025-06-11 07:00:22', NULL),
(83, 35, 21, 'Hadir', '2025-06-11 07:00:22', '2025-06-11 07:00:22', NULL),
(84, 35, 22, 'Hadir', '2025-06-11 07:00:22', '2025-06-11 07:00:22', NULL),
(85, 36, 14, 'Hadir', '2025-06-12 07:42:00', '2025-06-12 07:42:00', NULL),
(86, 36, 15, 'Tidak Hadir', '2025-06-12 07:42:00', '2025-06-12 07:42:00', NULL),
(87, 36, 17, 'Izin', '2025-06-12 07:42:00', '2025-06-12 07:42:00', NULL),
(88, 36, 18, 'Hadir', '2025-06-12 07:42:00', '2025-06-12 07:42:00', NULL),
(89, 36, 21, 'Hadir', '2025-06-12 07:42:00', '2025-06-12 07:42:00', NULL),
(90, 36, 22, 'Hadir', '2025-06-12 07:42:00', '2025-06-12 07:42:00', NULL),
(91, 36, 23, 'Hadir', '2025-06-12 07:42:00', '2025-06-12 07:42:00', NULL),
(94, 39, 37, 'Hadir', '2025-06-24 11:00:27', '2025-06-24 11:00:27', NULL),
(95, 40, 25, 'Hadir', '2025-06-30 10:17:11', '2025-06-30 10:17:11', NULL),
(96, 40, 26, 'Tidak Hadir', '2025-06-30 10:17:11', '2025-06-30 10:17:11', NULL),
(97, 40, 27, 'Hadir', '2025-06-30 10:17:11', '2025-06-30 10:17:11', NULL),
(98, 40, 28, 'Izin', '2025-06-30 10:17:11', '2025-06-30 10:17:11', NULL),
(99, 40, 35, 'Hadir', '2025-06-30 10:17:11', '2025-06-30 10:17:11', NULL),
(100, 40, 38, 'Hadir', '2025-06-30 10:17:11', '2025-06-30 10:17:11', NULL),
(101, 41, 25, 'Hadir', '2025-07-02 10:04:20', '2025-07-02 10:04:20', NULL),
(102, 41, 26, 'Hadir', '2025-07-02 10:04:20', '2025-07-02 10:04:20', NULL),
(103, 41, 27, 'Izin', '2025-07-02 10:04:20', '2025-07-02 10:04:20', NULL),
(104, 41, 28, 'Tidak Hadir', '2025-07-02 10:04:20', '2025-07-02 10:04:20', NULL),
(105, 41, 35, 'Hadir', '2025-07-02 10:04:20', '2025-07-02 10:04:20', NULL),
(106, 41, 38, 'Hadir', '2025-07-02 10:04:20', '2025-07-02 10:04:20', NULL),
(107, 42, 25, 'Izin', '2025-07-07 10:02:50', '2025-07-07 10:02:50', NULL),
(108, 42, 26, 'Tidak Hadir', '2025-07-07 10:02:50', '2025-07-07 10:02:50', NULL),
(109, 42, 27, 'Hadir', '2025-07-07 10:02:50', '2025-07-07 10:02:50', NULL),
(110, 42, 28, 'Hadir', '2025-07-07 10:02:50', '2025-07-07 10:02:50', NULL),
(111, 42, 35, 'Hadir', '2025-07-07 10:02:50', '2025-07-07 10:02:50', NULL),
(112, 42, 38, 'Hadir', '2025-07-07 10:02:50', '2025-07-07 10:02:50', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggotas`
--

CREATE TABLE `anggotas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prodi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dibuat_oleh_user_id` bigint UNSIGNED NOT NULL,
  `periode_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `anggotas`
--

INSERT INTO `anggotas` (`id`, `nama`, `nim`, `prodi`, `created_at`, `updated_at`, `dibuat_oleh_user_id`, `periode_id`) VALUES
(12, 'MAULANA ADITYA', '23102017', 'S1 Fisioterapi', '2025-05-01 05:14:39', '2025-05-01 05:14:39', 14, NULL),
(14, 'MAULANA ADITYA', '23102017', 'S1 INFORMATIKA', '2025-05-01 05:42:31', '2025-05-01 05:42:31', 4, NULL),
(15, 'Nadia Qotrunada Shalshabila', '23102017', 'S1 INFORMATIKA', '2025-05-01 06:10:32', '2025-05-01 06:10:32', 4, NULL),
(16, 'Nadia Qotrunada Shalshabila', '23102017', 'S1 INFORMATIKA', '2025-05-02 05:07:51', '2025-05-02 05:07:51', 14, NULL),
(17, 'Robiatul Adawiyah', '23102017', 'S1 Fisioterapi', '2025-05-02 06:35:33', '2025-05-02 06:35:33', 4, NULL),
(18, 'Araya', '23102017', 'S1 Fisioterapi', '2025-05-02 13:30:53', '2025-05-02 13:30:53', 4, NULL),
(19, 'Ardhan Aghsal Dwi Putra', '23102011', 'Informatika', '2025-05-02 23:49:27', '2025-05-02 23:49:27', 14, NULL),
(20, 'Araya', '23102017', 'S1 Fisioterapi', '2025-05-08 07:11:04', '2025-05-08 07:11:04', 14, NULL),
(21, 'syahwa wahyu s', '231001', 'fisioterapi', '2025-06-04 06:37:39', '2025-06-04 06:37:39', 4, NULL),
(22, 'Nadia Qotrunada Shalshabila', '23102019', 'S1 INFORMATIKA', '2025-06-11 06:58:42', '2025-06-11 06:58:42', 4, NULL),
(23, 'Robiatul Adawiyah', '23102019', 'S1 INFORMATIKA', '2025-06-12 07:40:52', '2025-06-12 07:40:52', 4, NULL),
(25, 'Maulana Aditya', '23102019', 'Sosial Masyarakat', '2025-06-24 07:06:01', '2025-06-24 07:06:01', 4, 1),
(26, 'Hadani Zenitha Pinkan', '23102014', 'Sosial Masyarakat', '2025-06-24 07:06:55', '2025-06-24 07:06:55', 4, 1),
(27, 'Syahwa Wahyu Setyaji', '23102019', 'Promosi', '2025-06-24 07:07:13', '2025-06-24 07:07:13', 4, 1),
(28, 'Diva Resti Nur Cahyani', '23102010', 'Sekretaris I', '2025-06-24 07:07:48', '2025-06-24 07:07:48', 4, 1),
(29, 'MAULANA ADITYA', '23102019', 'Promosi', '2025-06-24 08:20:30', '2025-06-24 08:20:30', 14, 1),
(35, 'anas', '23102010', 'PDD', '2025-06-24 09:09:56', '2025-06-24 09:09:56', 4, 1),
(36, 'alif', '2210008', 'sosmas', '2025-06-24 10:09:49', '2025-06-24 10:09:49', 14, 1),
(37, 'Syani', '23102010', 'Bendahara', '2025-06-24 10:58:41', '2025-06-24 10:58:41', 4, 2),
(38, 'MAULANA ADITYA', '23102019', 'Sosial Masyarakat', '2025-06-28 07:07:42', '2025-06-28 07:07:42', 4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gurus`
--

CREATE TABLE `gurus` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mapel_id` bigint UNSIGNED NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwals`
--

CREATE TABLE `jadwals` (
  `id` bigint UNSIGNED NOT NULL,
  `kelas_id` bigint UNSIGNED NOT NULL,
  `mapel_id` bigint UNSIGNED NOT NULL,
  `hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dari_jam` time NOT NULL,
  `sampai_jam` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawabans`
--

CREATE TABLE `jawabans` (
  `id` bigint UNSIGNED NOT NULL,
  `tugas_id` bigint UNSIGNED NOT NULL,
  `siswa_id` bigint UNSIGNED NOT NULL,
  `jawaban` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusans`
--

CREATE TABLE `jurusans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jurusans`
--

INSERT INTO `jurusans` (`id`, `nama_jurusan`, `created_at`, `updated_at`) VALUES
(3, 'HIMA S1 Informatika', '2025-03-07 03:10:52', '2025-03-07 03:10:52'),
(4, 'HIMA S1 Farmasi', '2025-03-07 03:11:04', '2025-03-07 03:11:04'),
(5, 'IPA', NULL, NULL),
(6, 'IPS', NULL, NULL),
(7, 'IPA', NULL, NULL),
(8, 'IPS', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kas_anggotas`
--

CREATE TABLE `kas_anggotas` (
  `id` bigint UNSIGNED NOT NULL,
  `anggota_id` bigint UNSIGNED NOT NULL,
  `dibuat_oleh_user_id` bigint UNSIGNED NOT NULL,
  `jumlah` int NOT NULL,
  `status` enum('sudah','belum','menyicil') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'sudah',
  `tanggal` date NOT NULL DEFAULT '2025-05-02',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `periode_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kas_anggotas`
--

INSERT INTO `kas_anggotas` (`id`, `anggota_id`, `dibuat_oleh_user_id`, `jumlah`, `status`, `tanggal`, `created_at`, `updated_at`, `periode_id`) VALUES
(113, 12, 14, 5000, 'sudah', '2025-05-08', '2025-05-08 07:27:19', '2025-05-08 07:27:19', NULL),
(114, 16, 14, 5000, 'sudah', '2025-05-08', '2025-05-08 07:27:19', '2025-05-08 07:27:19', NULL),
(115, 19, 14, 5000, 'sudah', '2025-05-08', '2025-05-08 07:27:19', '2025-05-08 07:27:19', NULL),
(116, 20, 14, 5000, 'belum', '2025-05-08', '2025-05-08 07:27:19', '2025-05-08 07:27:19', NULL),
(137, 14, 4, 5000, 'belum', '2025-06-11', '2025-06-11 07:03:44', '2025-06-11 07:03:44', NULL),
(138, 15, 4, 5000, 'belum', '2025-06-11', '2025-06-11 07:03:44', '2025-06-11 07:03:44', NULL),
(139, 17, 4, 5000, 'belum', '2025-06-11', '2025-06-11 07:03:44', '2025-06-11 07:03:44', NULL),
(140, 18, 4, 5000, 'sudah', '2025-06-11', '2025-06-11 07:03:44', '2025-06-11 07:03:44', NULL),
(141, 21, 4, 3000, 'menyicil', '2025-06-11', '2025-06-11 07:03:44', '2025-06-11 07:04:26', NULL),
(142, 22, 4, 5000, 'belum', '2025-06-11', '2025-06-11 07:03:44', '2025-06-11 07:03:44', NULL),
(143, 14, 4, 5000, 'sudah', '2025-06-12', '2025-06-12 07:44:33', '2025-06-12 07:44:33', NULL),
(144, 15, 4, 3000, 'menyicil', '2025-06-12', '2025-06-12 07:44:33', '2025-06-12 07:45:36', NULL),
(145, 17, 4, 5000, 'sudah', '2025-06-12', '2025-06-12 07:44:33', '2025-06-12 07:44:33', NULL),
(146, 18, 4, 2000, 'menyicil', '2025-06-12', '2025-06-12 07:44:33', '2025-06-12 07:46:19', NULL),
(147, 21, 4, 5000, 'sudah', '2025-06-12', '2025-06-12 07:44:33', '2025-06-12 07:44:33', NULL),
(148, 22, 4, 5000, 'belum', '2025-06-12', '2025-06-12 07:44:33', '2025-06-12 07:44:33', NULL),
(149, 23, 4, 5000, 'sudah', '2025-06-12', '2025-06-12 07:44:33', '2025-06-12 07:44:33', NULL),
(159, 37, 4, 10000, 'sudah', '2025-06-24', '2025-06-24 10:59:20', '2025-06-24 10:59:20', 2),
(160, 25, 4, 7000, 'sudah', '2025-06-24', '2025-06-24 18:26:40', '2025-06-24 18:26:40', 1),
(161, 26, 4, 7000, 'belum', '2025-06-24', '2025-06-24 18:26:40', '2025-06-24 18:26:40', 1),
(162, 27, 4, 7000, 'sudah', '2025-06-24', '2025-06-24 18:26:40', '2025-06-24 18:26:40', 1),
(163, 28, 4, 7000, 'belum', '2025-06-24', '2025-06-24 18:26:40', '2025-06-24 18:26:40', 1),
(164, 35, 4, 7000, 'sudah', '2025-06-24', '2025-06-24 18:26:40', '2025-06-24 18:26:40', 1),
(183, 25, 4, 5000, 'sudah', '2025-07-22', '2025-07-22 12:35:25', '2025-07-22 12:35:25', 1),
(184, 26, 4, 5000, 'sudah', '2025-07-22', '2025-07-22 12:35:25', '2025-07-22 12:35:25', 1),
(185, 27, 4, 5000, 'sudah', '2025-07-22', '2025-07-22 12:35:25', '2025-07-22 12:35:25', 1),
(186, 28, 4, 5000, 'sudah', '2025-07-22', '2025-07-22 12:35:25', '2025-07-22 12:35:25', 1),
(187, 35, 4, 5000, 'sudah', '2025-07-22', '2025-07-22 12:35:25', '2025-07-22 12:35:25', 1),
(188, 38, 4, 5000, 'sudah', '2025-07-22', '2025-07-22 12:35:25', '2025-07-22 12:35:25', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan_id` bigint UNSIGNED NOT NULL,
  `guru_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keuangans`
--

CREATE TABLE `keuangans` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `kas_anggota_id` bigint UNSIGNED DEFAULT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `periode_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `keuangans`
--

INSERT INTO `keuangans` (`id`, `user_id`, `kas_anggota_id`, `jenis`, `keterangan`, `tanggal`, `jumlah`, `created_at`, `updated_at`, `periode_id`) VALUES
(66, 14, NULL, 'pemasukan', 'Kas HIMA', '2026-06-02', 2450000, '2025-05-04 02:30:10', '2025-05-04 02:30:10', NULL),
(67, 14, NULL, 'pengeluaran', 'AIR PUTIH', '2025-05-28', 30000, '2025-05-04 04:58:07', '2025-05-04 04:58:07', NULL),
(77, 14, NULL, 'pemasukan', 'sponsor', '2025-05-08', 1000000, '2025-05-08 07:14:24', '2025-05-08 07:14:24', NULL),
(78, 14, 113, 'pemasukan', 'Pemasukan kas dari anggota', '2025-05-08', 15000, '2025-05-08 07:27:19', '2025-05-08 07:27:19', NULL),
(85, 4, NULL, 'pemasukan', 'Kas HIMA', '2025-06-26', 200000, '2025-06-11 07:01:37', '2025-06-11 07:01:37', NULL),
(86, 4, NULL, 'pengeluaran', 'AIR PUTIH', '2025-06-28', 50000, '2025-06-11 07:01:57', '2025-06-11 07:01:57', NULL),
(87, 4, 140, 'pemasukan', 'Pemasukan kas dari anggota', '2025-06-11', 8000, '2025-06-11 07:03:44', '2025-06-11 07:04:26', NULL),
(88, 4, NULL, 'pemasukan', 'sponsor', '2025-06-12', 300000, '2025-06-12 07:43:09', '2025-06-12 07:43:09', NULL),
(89, 4, NULL, 'pengeluaran', 'AIR PUTIH', '2025-06-11', 100000, '2025-06-12 07:43:30', '2025-06-12 07:43:30', NULL),
(90, 4, 143, 'pemasukan', 'Pemasukan kas dari anggota', '2025-06-12', 25000, '2025-06-12 07:44:33', '2025-06-12 07:46:19', NULL),
(91, 4, NULL, 'pengeluaran', 'Uang Fee', '2025-06-30', 83000, '2025-06-14 19:18:12', '2025-06-14 19:18:12', NULL),
(92, 4, NULL, 'pemasukan', 'Uang Fee', '2025-06-25', 20000, '2025-06-16 17:56:21', '2025-06-16 17:56:21', 1),
(94, 14, NULL, 'pemasukan', 'sponsor', '2025-06-25', 1000000, '2025-06-24 08:22:27', '2025-06-24 08:22:27', 1),
(95, 14, NULL, 'pengeluaran', 'konsumsi', '2025-06-25', 456700, '2025-06-24 08:23:04', '2025-06-24 08:23:04', 1),
(98, 4, NULL, 'pengeluaran', 'peminjaman ayi', '2025-06-25', 10000, '2025-06-24 09:07:01', '2025-06-24 09:07:01', 1),
(99, 4, NULL, 'pemasukan', 'uang kas', '2025-06-25', 500000, '2025-06-24 10:57:06', '2025-06-24 10:57:06', 2),
(100, 4, 159, 'pemasukan', 'Pemasukan kas dari anggota', '2025-06-24', 10000, '2025-06-24 10:59:20', '2025-06-24 10:59:20', 2),
(101, 4, NULL, 'pemasukan', 'konsumsi', '2025-06-30', 120000, '2025-06-24 11:13:58', '2025-06-24 11:13:58', 1),
(102, 4, 160, 'pemasukan', 'Pemasukan kas dari anggota', '2025-06-24', 21000, '2025-06-24 18:26:40', '2025-06-24 18:26:40', 1),
(103, 4, NULL, 'pemasukan', 'sponsor', '2025-06-28', 300000, '2025-06-28 07:22:28', '2025-06-28 07:22:28', 1),
(105, 4, NULL, 'pengeluaran', 'Konsumsi', '2025-07-02', 50000, '2025-07-02 10:05:52', '2025-07-02 10:05:52', 1),
(107, 4, NULL, 'pemasukan', 'sponsor', '2025-07-02', 400000, '2025-07-02 10:08:02', '2025-07-02 10:08:02', 1),
(108, 4, NULL, 'pengeluaran', 'sponsor', '2025-07-07', 10000, '2025-07-07 10:04:33', '2025-07-07 10:04:33', 1),
(110, 4, 183, 'pemasukan', 'Pemasukan kas dari anggota', '2025-07-22', 30000, '2025-07-22 12:35:25', '2025-07-22 12:35:25', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lpjs`
--

CREATE TABLE `lpjs` (
  `id` bigint UNSIGNED NOT NULL,
  `judul_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ormawa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_lpj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dibuat_oleh_user_id` bigint UNSIGNED NOT NULL,
  `status` enum('pending_admin','revisi_admin','pending_pembina','revisi_pembina','pending_kaprodi','revisi_kaprodi','pending_kemahasiswaan','revisi_kemahasiswaan','pending_wr3','revisi_wr3','acc_final') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending_admin',
  `current_reviewer_id` bigint UNSIGNED DEFAULT NULL,
  `catatan_revisi` text COLLATE utf8mb4_unicode_ci,
  `ttd_pembina` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttd_kemahasiswaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttd_kaprodi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttd_wr3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_revisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_dana` int NOT NULL DEFAULT '9000000',
  `sisa_dana` int NOT NULL DEFAULT '9000000',
  `total_keseluruhan` int NOT NULL DEFAULT '0',
  `file_lpj_pdf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dokumentasi_paths` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `nota_paths` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `periode_id` bigint UNSIGNED DEFAULT NULL
) ;

--
-- Dumping data untuk tabel `lpjs`
--

INSERT INTO `lpjs` (`id`, `judul_kegiatan`, `ormawa`, `prodi`, `file_lpj`, `dibuat_oleh_user_id`, `status`, `current_reviewer_id`, `catatan_revisi`, `ttd_pembina`, `ttd_kemahasiswaan`, `ttd_kaprodi`, `ttd_wr3`, `file_revisi`, `total_dana`, `sisa_dana`, `total_keseluruhan`, `file_lpj_pdf`, `created_at`, `updated_at`, `dokumentasi_paths`, `nota_paths`, `periode_id`) VALUES
(26, 'Pengabdian Masyarakat', 'himatif', 'informatika', 'storage/LPJ_1749529256.docx', 4, 'pending_admin', 1, NULL, NULL, NULL, NULL, NULL, NULL, 9000000, 9000000, 6000, 'storage/lpj/LPJ_1749529256.pdf', '2025-06-10 04:21:04', '2025-06-10 04:21:04', '[\"storage\\/dokumentasi\\/QaHmkkd0iA4kiL046StDFDsUFFfdE1clYuGnvBzV.png\",\"storage\\/dokumentasi\\/1Jq2jVj73pqzVyZc007t1GoCwsaOATBKYFHf7Qw8.png\",\"storage\\/dokumentasi\\/0YMpvIoXDY2drlZPMKLkbQVTwiZoUpYdWBCf1y99.png\"]', '[\"storage\\/nota\\/MaDbDhPT73BueSMkxCUNAHwAhrUl55gC8gLPbvRv.png\",\"storage\\/nota\\/rmlDSfPSwvOoebiFhHxnuyU9XrXKZunadspByhCM.png\",\"storage\\/nota\\/TDVwhMQPNB2jIPdpI1r6LYjo9C9xkLPanQzpZbOy.png\"]', NULL),
(27, 'Pengabdian Masyarakat', 'himatif', 'informatika', 'storage/Perbaikan_LPJ_1749902677.docx', 4, 'pending_admin', 1, NULL, NULL, NULL, NULL, NULL, NULL, 9000000, 9000000, 8000, 'storage/lpj/Perbaikan_LPJ_1749902677.pdf', '2025-06-11 06:57:10', '2025-06-14 19:04:38', '[\"storage\\/dokumentasi\\/yN320CWg7XoZkYPscKI0QfHX7JTBJOTxV4b5ijHO.jpg\",\"storage\\/dokumentasi\\/dnt4Y1Rm9iTZNuQuU2skjYWlyeYlMH6lLLtKv6ba.jpg\"]', '[\"storage\\/nota\\/4EvD64cXEzmGVkGmFQGlICPJ8nAXRKgoNXL86ncF.jpg\",\"storage\\/nota\\/VhhlF1ner8oSvycSjPaZGY06dppF2qt5Jcl9KEug.jpg\"]', NULL),
(28, 'Defis AI', 'himatif', 'informatika', 'storage/LPJ_1749902212.docx', 4, 'acc_final', 4, NULL, 'tanda_tangan/tanda_tangan_10.png', 'tanda_tangan/kemahasiswaan.png', 'tanda_tangan/ttd_kaprodi_13.png', 'tanda_tangan/wr3.png', NULL, 9000000, 9000000, 6393, 'storage/lpj/LPJ_1749902212.pdf', '2025-06-14 18:56:54', '2025-06-14 19:17:06', '[\"storage\\/dokumentasi\\/GQmyR7noGRh62ZSzI4OwKNRwr5Ee64CQkApfmzDO.png\"]', '[\"storage\\/nota\\/35Hzz5OntvrSGq9pkTIa3Sm1VOjpiKa5tRlzzluC.png\"]', NULL),
(29, 'Dies Natalis Hima Fisioterapi', 'himafis', 'fisioterapi', 'storage/LPJ_1750061312.docx', 14, 'pending_pembina', 16, NULL, NULL, NULL, NULL, NULL, NULL, 9000000, 9000000, 66000, 'storage/lpj/LPJ_1750061312.pdf', '2025-06-16 15:08:35', '2025-06-16 15:10:59', '[\"storage\\/dokumentasi\\/rn3Q80udI4zaKdgD2NlVTj6KydBKhyN85kznPzQm.jpg\",\"storage\\/dokumentasi\\/PPPkVfhFzd9OqPAK73p2nn1seFAQppKl9Hgj80BF.png\"]', '[\"storage\\/nota\\/mZ8DqcfpSATvVQpB22U0TdMEwlW5qvtDl2A3fe8O.jpg\",\"storage\\/nota\\/2PSmSoTbFDal0N4qoU73waaj7LUpxnnxfNGJWW52.png\"]', NULL),
(30, 'Malam Keakraban Fisioterapi', 'himafis', 'fisioterapi', 'storage/LPJ_1750061390.docx', 14, 'pending_kaprodi', 19, NULL, 'tanda_tangan/tanda_tangan_16.png', NULL, NULL, NULL, NULL, 9000000, 9000000, 221000, 'storage/lpj/LPJ_1750061390.pdf', '2025-06-16 15:09:52', '2025-06-16 15:30:31', '[\"storage\\/dokumentasi\\/IkOdoNsp3lcc3Dqesa3u6YskgsSbgcBNzKqv1ftc.jpg\",\"storage\\/dokumentasi\\/9507FlBgQ8uhZt68mdYlJV9OGB340scwMYbcmHTl.png\"]', '[\"storage\\/nota\\/Ut2me0uoLncCmRFzrxi25dd6JjXVyVluZbLNQsK3.jpg\",\"storage\\/nota\\/UfhUahLiIVfpr36zVodcpmAxadU1KsT2xIRg68aQ.png\"]', NULL),
(31, 'Defis AI', 'himatif', 'informatika', 'storage/LPJ_1750069690.docx', 4, 'pending_admin', 1, NULL, NULL, NULL, NULL, NULL, NULL, 9000000, 8993607, 53613, 'storage/lpj/LPJ_1750069690.pdf', '2025-06-16 17:28:13', '2025-06-16 17:28:13', '[\"storage\\/dokumentasi\\/yJuopVzKIfjOTRSpVUIUuyBOox4UyOzwdiy7iMro.jpg\",\"storage\\/dokumentasi\\/HhKmmLwq0gXgBkajedNEcMHpsOhmmaMHB56ETt6f.png\"]', '[\"storage\\/nota\\/jJpSWLvaXYEgsuC43yAnP9Y8R03jfyfYS3AOZpPf.jpg\",\"storage\\/nota\\/2Ej3vVlFuUEiX5UMveD1l7N7Zcs9e0NLzbFjAVNf.png\"]', 1),
(32, 'Defis AI', 'himatif', 'informatika', 'storage/LPJ_1750688199.docx', 4, 'pending_admin', 1, NULL, NULL, NULL, NULL, NULL, NULL, 9000000, 8993607, 4664, 'storage/lpj/LPJ_1750688199.pdf', '2025-06-23 21:16:41', '2025-06-23 21:16:41', '[\"storage\\/dokumentasi\\/TqM6TlgF1m5CV2AmbytgGqoETLidbpm6BClKAdyL.jpg\",\"storage\\/dokumentasi\\/e6Jr3GVv60HWDiV3YjWoEf9NUkomt2ecBIRePPYK.png\"]', '[\"storage\\/nota\\/jWU1r40fw2TFG70DfUXFvZL2U8JePvos4RXKjjLU.png\",\"storage\\/nota\\/qwh1ISI5cYgFSooQAXAqmTZbOxjFSC47eutFuvLL.png\"]', 1),
(33, 'Defis AI', 'himatif', 'informatika', 'storage/LPJ_1750690592.docx', 4, 'pending_admin', 1, NULL, NULL, NULL, NULL, NULL, NULL, 9000000, 8993607, 2, 'storage/lpj/LPJ_1750690592.pdf', '2025-06-23 21:56:39', '2025-06-23 21:56:39', '[\"storage\\/dokumentasi\\/gdzXAesVmTmpBak4taDG8d3U65GzEraR0S2TOOQc.jpg\",\"storage\\/dokumentasi\\/o21lJjxHZRfK22YkLIjKggGLqMnuDBCC1PGU8nyB.png\"]', '[\"storage\\/nota\\/hFPBZLrjtptRjHjaUeFt8wqamTxmi6hG7t0SdcpK.jpg\",\"storage\\/nota\\/5OJvi2WaL0Tanl6Tycl8AHik4ZUpLgQQq2BY8Azt.png\"]', 1),
(39, 'Defis AI', 'himatif', 'informatika', 'storage/LPJ_1751501153.docx', 4, 'pending_pembina', 10, NULL, NULL, NULL, NULL, NULL, NULL, 9000000, 8993607, 100097, 'storage/lpj/LPJ_1751501153.pdf', '2025-07-03 07:05:55', '2025-07-03 19:42:51', '[\"storage\\/dokumentasi\\/L98uaUrp6xaDkkEUb2nBVltFEtfNA46qb9oHWYOP.png\",\"storage\\/dokumentasi\\/uT2xsM9Mba1AYWTypxHGo29kQ6UNGKCOiIiDrL7W.png\"]', '[{\"uraian\":\"as\",\"path\":\"storage\\/nota\\/ITer1FfwVPuufFypMgvMYoWlVMPPapv2XarzsAvq.jpg\"},{\"uraian\":\"pensil\",\"path\":\"storage\\/nota\\/UaTKoey5wMhDDhTkisxhyIMY9wXl77va9ARTqdWf.jpg\"}]', 1),
(40, 'Defis AI', 'himatif', 'informatika', 'storage/LPJ_1751557089.docx', 4, 'pending_admin', 1, NULL, NULL, NULL, NULL, NULL, NULL, 9000000, 8993607, 2772, 'storage/lpj/LPJ_1751557089.pdf', '2025-07-03 22:38:13', '2025-07-03 22:38:13', '[\"storage\\/dokumentasi\\/rDoGSHpE945phlewCyowct2mLonM3U4nIqK4siye.jpg\",\"storage\\/dokumentasi\\/fHJucQfDE2iO3iG2wYOJ6LWSOpsA5pjKT5j929DU.jpg\"]', '[{\"uraian\":\"gedung\",\"path\":\"storage\\/nota\\/A37W4KrDbbVYv48IrNT8UzQKnCvJSRGm6677KfXg.jpg\"}]', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapels`
--

CREATE TABLE `mapels` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `materis`
--

CREATE TABLE `materis` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guru_id` bigint UNSIGNED NOT NULL,
  `kelas_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_03_040519_create_jurusans_table', 1),
(6, '2022_02_03_051314_create_mapels_table', 1),
(7, '2022_02_03_051430_create_gurus_table', 1),
(8, '2022_02_03_051554_create_kelas_table', 1),
(9, '2022_02_03_051656_create_siswas_table', 1),
(10, '2022_02_14_062239_create_materis_table', 1),
(11, '2022_02_15_132849_create_tugas_table', 1),
(12, '2022_02_15_134138_create_jawabans_table', 1),
(13, '2022_11_24_084715_create_jadwals_table', 1),
(14, '2024_12_03_093344_create_pengumuman_sekolahs_table', 1),
(15, '2024_12_03_205921_create_pengaturans_table', 1),
(16, '2024_12_04_100425_create_orangtuas_table', 1),
(17, '2024_12_04_100726_create_orangtua_siswas_table', 1),
(18, '2025_03_17_105229_create_proposals_table', 2),
(19, '2025_03_17_131545_add_file_revisi_to_proposals_table', 3),
(20, '2025_03_17_194935_add_sisa_dana_to_proposals_table', 4),
(21, '2025_03_19_203527_add_ttd_kemahasiswaan_to_proposals_table', 5),
(22, '2025_04_17_122658_add_role_to_users_table', 6),
(23, '2025_04_24_193540_add_total_keseluruhan_to_proposals_table', 7),
(24, '2025_04_25_203706_add_ttd_kaprodi_to_users_table', 8),
(25, '2025_04_25_205654_add_ttd_kaprodi_to_proposals_table', 9),
(26, '2025_04_25_205844_add_ttd_kaprodi_to_proposals_table', 10),
(27, '2025_04_26_164818_create_absens_table', 11),
(28, '2025_04_26_172258_create_anggota_ormawa_table', 12),
(29, '2025_04_26_173131_create_anggota_ormawas_table', 13),
(30, '2025_04_27_080002_create_anggotas_table', 14),
(31, '2025_04_27_122821_create_absensis_table', 15),
(32, '2025_04_27_130713_add_pertemuan_columns_to_absensis_table', 16),
(33, '2025_04_27_152441_create_pertemuan_table', 17),
(34, '2025_04_27_152637_create_absensi_table', 18),
(35, '2025_04_29_052854_create_pengaturan_danas_table', 19),
(36, '2025_04_30_213409_add_dibuat_oleh_user_id_to_anggotas_table', 20),
(37, '2025_04_30_213943_add_dibuat_oleh_user_id_to_anggotas_table', 21),
(38, '2025_04_30_222701_add_dibuat_oleh_user_id_to_pertemuans_table', 22),
(39, '2025_04_30_223032_add_dibuat_oleh_user_id_to_pertemuans_table', 23),
(40, '2025_05_01_054848_add_ormawa_to_users_table', 24),
(41, '2025_05_01_060155_add_ormawa_to_proposals_table', 25),
(42, '2025_05_01_060406_add_ormawa_to_proposals_table', 25),
(43, '2025_05_01_083326_add_file_proposal_pdf_to_proposals_table', 26),
(44, '2025_05_01_111705_add_prodi_to_users_table', 27),
(45, '2025_05_01_111820_add_prodi_to_proposals_table', 28),
(46, '2025_05_01_182646_create_keuangans_table', 29),
(47, '2025_05_02_112133_create_kas_anggotas_table', 30),
(48, '2025_05_02_142754_add_status_to_kas_anggotas_table', 31),
(49, '2025_05_02_164408_add_status_to_kas_anggotas_table', 32),
(50, '2025_05_02_164500_add_kas_anggota_id_to_keuangans_table', 32),
(51, '2025_05_03_204859_add_ttd_to_users_table', 33),
(52, '2025_04_26_152109_create_notifications_table', 34),
(53, '2025_05_09_172526_create_lpjs_table', 34),
(54, '2025_05_10_170234_add_dokumentasi_to_pertemuans_table', 35),
(55, '2025_05_10_211925_add_dokumentasi_to_pertemuans_table', 36),
(56, '2025_05_11_082217_add_dokumentasi_nota_to_lpjs_table', 37),
(57, '2025_06_16_162003_create_periodes_table', 38),
(58, '2025_06_16_164350_add_periode_id_to_multiple_tables', 39),
(59, '2025_06_16_164553_add_periode_id_to_lpjs_tables', 40),
(60, '2025_06_16_164712_add_periode_id_to_lpjs_table', 41),
(61, '2025_06_16_175855_add_periode_id_to_kas_anggotas_table', 42),
(62, '2025_06_16_182314_add_periode_id_to_pengaturan_danas_table', 43),
(63, '2025_06_16_183917_update_unique_constraint_on_pengaturan_danas_table', 44),
(64, '2025_07_03_170849_create_pengumumans_table', 45);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('02eb52da-55de-4aa2-838a-35ed7c47cd13', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":119,\"judul\":null,\"next_role\":\"Proposal baru \'Dies Natalis Hima Fisoterapi\' telah diajukan oleh HIMA FISIOTERAPI.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Dies Natalis Hima Fisoterapi\' telah diajukan oleh HIMA FISIOTERAPI..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27dies%20natalis%20hima%20fisoterapi%27%20telah%20diajukan%20oleh%20hima%20fisioterapi.&id=119\"}', '2025-05-11 23:48:47', '2025-05-11 23:44:55', '2025-05-11 23:48:47'),
('047461fc-cbb3-4427-bb69-fa2650a7fbde', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 10, '{\"proposal_id\":123,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20pembina.&id=123\"}', NULL, '2025-05-27 01:12:12', '2025-05-27 01:12:12'),
('06a2cc1e-b6f5-4936-9ca5-9712ae367145', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":149,\"judul\":null,\"next_role\":\"Proposal baru \'Dies Natalis Hima Fisioterapi\' telah diajukan oleh Hima Informatika.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Dies Natalis Hima Fisioterapi\' telah diajukan oleh Hima Informatika..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27dies%20natalis%20hima%20fisioterapi%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=149\"}', NULL, '2025-06-23 22:33:01', '2025-06-23 22:33:01'),
('0d6effbf-959f-4df8-900a-7743c976c848', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 10, '{\"proposal_id\":151,\"judul\":null,\"next_role\":\"Proposal \'Defis AI\' siap ditinjau oleh Pembina.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Defis AI\' siap ditinjau oleh Pembina..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20%27defis%20ai%27%20siap%20ditinjau%20oleh%20pembina.&id=151\"}', NULL, '2025-06-23 22:40:43', '2025-06-23 22:40:43'),
('0de4ba43-04a7-4fba-8201-1274689e7d1d', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 12, '{\"proposal_id\":135,\"judul\":null,\"next_role\":\"Proposal \'Defis AI\' siap ditinjau oleh Warek III.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Defis AI\' siap ditinjau oleh Warek III..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20%27defis%20ai%27%20siap%20ditinjau%20oleh%20warek%20iii.&id=135\"}', NULL, '2025-06-17 14:06:00', '2025-06-17 14:06:00'),
('0e3c355a-6fc3-45af-82b6-7b6d0578fc3b', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 13, '{\"proposal_id\":125,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Kaprodi.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Kaprodi..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20kaprodi.&id=125\"}', '2025-06-17 11:21:02', '2025-06-04 06:57:48', '2025-06-17 11:21:02'),
('1206a037-a5af-4417-b238-6e6c5c7d0259', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 12, '{\"proposal_id\":125,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Warek III.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Warek III..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20warek%20iii.&id=125\"}', NULL, '2025-06-04 07:00:35', '2025-06-04 07:00:35'),
('12367f9f-1c09-48b3-b578-209762b27cee', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":129,\"judul\":null,\"next_role\":\"Proposal baru \'Dies Natalis Hima Informatika\' telah diajukan oleh HIMA INFORMATIKA.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Dies Natalis Hima Informatika\' telah diajukan oleh HIMA INFORMATIKA..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27dies%20natalis%20hima%20informatika%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=129\"}', NULL, '2025-06-12 07:36:48', '2025-06-12 07:36:48'),
('13414966-64f7-426e-b4b0-c0050c4bead0', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":132,\"judul\":null,\"next_role\":\"Proposal baru \'Dies Natalis Hima Fisioterapi\' telah diajukan oleh Hima Fisioterapi.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Dies Natalis Hima Fisioterapi\' telah diajukan oleh Hima Fisioterapi..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27dies%20natalis%20hima%20fisioterapi%27%20telah%20diajukan%20oleh%20hima%20fisioterapi.&id=132\"}', NULL, '2025-06-16 15:05:46', '2025-06-16 15:05:46'),
('19c4b66c-316b-4d69-aed7-1d0e99d52216', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":126,\"judul\":null,\"next_role\":\"Proposal baru \'Dies Natalis Hima Fisoterapi\' telah diajukan oleh HIMA INFORMATIKA.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Dies Natalis Hima Fisoterapi\' telah diajukan oleh HIMA INFORMATIKA..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27dies%20natalis%20hima%20fisoterapi%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=126\"}', '2025-06-10 04:19:44', '2025-06-10 04:18:06', '2025-06-10 04:19:44'),
('1b23c9a9-4815-4abd-92ab-5a8be0cb4d59', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 10, '{\"proposal_id\":131,\"judul\":null,\"next_role\":\"Proposal \'Defis AI\' siap ditinjau oleh Pembina.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Defis AI\' siap ditinjau oleh Pembina..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20%27defis%20ai%27%20siap%20ditinjau%20oleh%20pembina.&id=131\"}', NULL, '2025-06-14 18:04:12', '2025-06-14 18:04:12'),
('1b2763dc-f989-4b90-b65b-2f2a36f68d9d', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 11, '{\"proposal_id\":122,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Kemahasiswaan.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Kemahasiswaan..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20kemahasiswaan.&id=122\"}', NULL, '2025-05-27 13:01:42', '2025-05-27 13:01:42'),
('1cad76bb-20de-40ad-b4bf-9c789aace7e7', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":127,\"judul\":null,\"next_role\":\"Proposal baru \'Dies Natalis Hima Informatika\' telah diajukan oleh HIMA INFORMATIKA.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Dies Natalis Hima Informatika\' telah diajukan oleh HIMA INFORMATIKA..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27dies%20natalis%20hima%20informatika%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=127\"}', '2025-06-10 04:19:52', '2025-06-10 04:18:48', '2025-06-10 04:19:52'),
('1e0a2435-8dcc-4b85-bb64-d7eda8e8b85a', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 16, '{\"proposal_id\":122,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20pembina.&id=122\"}', '2025-05-27 03:12:29', '2025-05-12 05:32:43', '2025-05-27 03:12:29'),
('1e2089ca-03cb-4766-aaa7-a6f0c03f75ea', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":139,\"judul\":null,\"next_role\":\"Proposal baru \'as\' telah diajukan oleh Hima Informatika.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'as\' telah diajukan oleh Hima Informatika..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27as%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=139\"}', NULL, '2025-06-23 21:21:51', '2025-06-23 21:21:51'),
('2142bb20-bac3-4fe6-8b48-5877160502c5', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":154,\"judul\":null,\"next_role\":\"Proposal baru \'LKMM-TD\' telah diajukan oleh BEM.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'LKMM-TD\' telah diajukan oleh BEM..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27lkmm-td%27%20telah%20diajukan%20oleh%20bem.&id=154\"}', NULL, '2025-06-24 10:43:47', '2025-06-24 10:43:47'),
('25f77dfe-6fc1-4654-84e2-c22ea6f51c35', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":123,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' dikembalikan untuk revisi oleh Admin.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' dikembalikan untuk revisi oleh Admin..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20dikembalikan%20untuk%20revisi%20oleh%20admin.&id=123\"}', '2025-06-10 04:19:49', '2025-05-27 12:48:13', '2025-06-10 04:19:49'),
('260ca8a4-2dee-4c93-ae1b-aca467e6f423', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":123,\"judul\":null,\"next_role\":\"Proposal baru \'Dies Natalis Hima Fisoterapi\' telah diajukan oleh HIMA INFORMATIKA.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Dies Natalis Hima Fisoterapi\' telah diajukan oleh HIMA INFORMATIKA..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27dies%20natalis%20hima%20fisoterapi%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=123\"}', '2025-05-14 07:57:03', '2025-05-12 08:40:33', '2025-05-14 07:57:03'),
('28f7e0a0-9a0c-465e-93e1-5b691f38f6c3', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 11, '{\"proposal_id\":131,\"judul\":null,\"next_role\":\"Proposal \'Defis AI\' siap ditinjau oleh Kemahasiswaan.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Defis AI\' siap ditinjau oleh Kemahasiswaan..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20%27defis%20ai%27%20siap%20ditinjau%20oleh%20kemahasiswaan.&id=131\"}', NULL, '2025-06-14 18:28:18', '2025-06-14 18:28:18'),
('296272b9-dbc2-4b85-9bc8-1515487c85aa', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 11, '{\"proposal_id\":151,\"judul\":null,\"next_role\":\"Proposal \'Defis AI\' siap ditinjau oleh Kemahasiswaan.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Defis AI\' siap ditinjau oleh Kemahasiswaan..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20%27defis%20ai%27%20siap%20ditinjau%20oleh%20kemahasiswaan.&id=151\"}', NULL, '2025-06-23 22:43:49', '2025-06-23 22:43:49'),
('2ce7bdde-6553-4503-87ea-7c88871a2cd8', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 11, '{\"proposal_id\":135,\"judul\":null,\"next_role\":\"Proposal \'Defis AI\' siap ditinjau oleh Kemahasiswaan.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Defis AI\' siap ditinjau oleh Kemahasiswaan..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20%27defis%20ai%27%20siap%20ditinjau%20oleh%20kemahasiswaan.&id=135\"}', NULL, '2025-06-17 13:37:14', '2025-06-17 13:37:14'),
('37a3b39d-88b2-49b3-b7bf-1add13729cd8', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":122,\"judul\":null,\"next_role\":\"Proposal baru \'Dies Natalis Hima Fisoterapi\' telah diajukan oleh HIMA FISIOTERAPI.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Dies Natalis Hima Fisoterapi\' telah diajukan oleh HIMA FISIOTERAPI..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27dies%20natalis%20hima%20fisoterapi%27%20telah%20diajukan%20oleh%20hima%20fisioterapi.&id=122\"}', '2025-05-14 07:57:05', '2025-05-12 05:32:09', '2025-05-14 07:57:05'),
('40c4cc99-84fb-4c66-a814-19eddc91acc1', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 12, '{\"proposal_id\":126,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Warek III.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Warek III..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20warek%20iii.&id=126\"}', NULL, '2025-06-12 03:34:13', '2025-06-12 03:34:13'),
('4731560c-6a9a-4b7b-95f1-4872748a990a', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 19, '{\"proposal_id\":122,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Kaprodi.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Kaprodi..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20kaprodi.&id=122\"}', NULL, '2025-05-27 12:41:57', '2025-05-27 12:41:57'),
('4869bc3b-4239-4554-8a8f-61ac3b8c2c2e', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 4, '{\"proposal_id\":129,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Informatika\' dikembalikan untuk revisi oleh Admin.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Informatika\' dikembalikan untuk revisi oleh Admin..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20informatika%27%20dikembalikan%20untuk%20revisi%20oleh%20admin.&id=129\"}', NULL, '2025-06-14 18:08:55', '2025-06-14 18:08:55'),
('49f51172-d478-4d03-8981-b54c284104fa', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":120,\"judul\":null,\"next_role\":\"Proposal baru \'Dies Natalis Hima Fisoterapi\' telah diajukan oleh HIMA INFORMATIKA.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Dies Natalis Hima Fisoterapi\' telah diajukan oleh HIMA INFORMATIKA..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27dies%20natalis%20hima%20fisoterapi%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=120\"}', '2025-05-12 03:27:33', '2025-05-12 01:52:09', '2025-05-12 03:27:33'),
('4fa82612-1814-4022-8e51-584e3c62f581', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 10, '{\"proposal_id\":126,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20pembina.&id=126\"}', NULL, '2025-06-10 04:33:21', '2025-06-10 04:33:21'),
('55556e22-9308-42e6-be64-5ab98ae2345d', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":150,\"judul\":null,\"next_role\":\"Proposal baru \'Defis AI\' telah diajukan oleh Hima Informatika.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Defis AI\' telah diajukan oleh Hima Informatika..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27defis%20ai%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=150\"}', NULL, '2025-06-23 22:37:02', '2025-06-23 22:37:02'),
('55609bdf-5115-46a6-917d-80b941406355', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 10, '{\"proposal_id\":125,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20pembina.&id=125\"}', NULL, '2025-06-04 06:51:48', '2025-06-04 06:51:48'),
('5bf0302f-8ef4-4be0-98ea-014ec573ac31', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":124,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' telah direvisi oleh Pembina dan dikembalikan ke Admin.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' telah direvisi oleh Pembina dan dikembalikan ke Admin..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20telah%20direvisi%20oleh%20pembina%20dan%20dikembalikan%20ke%20admin.&id=124\"}', '2025-05-27 12:47:52', '2025-05-27 12:45:40', '2025-05-27 12:47:52'),
('5e6e01a8-7eb3-459e-9f8d-c3bc35662e51', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 12, '{\"proposal_id\":122,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Warek III.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Warek III..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20warek%20iii.&id=122\"}', NULL, '2025-05-27 13:34:00', '2025-05-27 13:34:00'),
('5e998fb2-6d0e-497c-9b52-02817b3359c5', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":124,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' telah direvisi oleh Pembina dan dikembalikan ke Admin.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' telah direvisi oleh Pembina dan dikembalikan ke Admin..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20telah%20direvisi%20oleh%20pembina%20dan%20dikembalikan%20ke%20admin.&id=124\"}', '2025-05-27 12:47:53', '2025-05-27 12:44:10', '2025-05-27 12:47:53'),
('684086e2-4099-4428-9b35-15c4c5e360e7', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 16, '{\"proposal_id\":132,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisioterapi\' siap ditinjau oleh Pembina.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisioterapi\' siap ditinjau oleh Pembina..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisioterapi%27%20siap%20ditinjau%20oleh%20pembina.&id=132\"}', NULL, '2025-06-16 15:10:33', '2025-06-16 15:10:33'),
('698d5bd7-6273-4669-a740-dcf75c735ce1', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 11, '{\"proposal_id\":126,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Kemahasiswaan.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Kemahasiswaan..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20kemahasiswaan.&id=126\"}', NULL, '2025-06-10 09:42:23', '2025-06-10 09:42:23'),
('6b451028-002b-4ecd-abb6-80e0063b2ccc', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":140,\"judul\":null,\"next_role\":\"Proposal baru \'Defis AI\' telah diajukan oleh Hima Informatika.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Defis AI\' telah diajukan oleh Hima Informatika..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27defis%20ai%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=140\"}', NULL, '2025-06-23 21:27:21', '2025-06-23 21:27:21'),
('6c8ce283-eba3-4812-b08a-b7499b758ed2', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":125,\"judul\":null,\"next_role\":\"Proposal baru \'Dies Natalis Hima Fisoterapi\' telah diajukan oleh HIMA INFORMATIKA.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Dies Natalis Hima Fisoterapi\' telah diajukan oleh HIMA INFORMATIKA..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27dies%20natalis%20hima%20fisoterapi%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=125\"}', '2025-06-10 04:19:47', '2025-06-04 06:32:08', '2025-06-10 04:19:47'),
('6d38be26-4608-4372-b245-8acd719cba33', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":132,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisioterapi\' dikembalikan untuk revisi oleh Admin.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisioterapi\' dikembalikan untuk revisi oleh Admin..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisioterapi%27%20dikembalikan%20untuk%20revisi%20oleh%20admin.&id=132\"}', NULL, '2025-06-16 15:29:59', '2025-06-16 15:29:59'),
('6faa3d25-8bbf-4f85-97b9-fc4053a156e4', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":128,\"judul\":null,\"next_role\":\"Proposal baru \'Dies Natalis Hima Informatika\' telah diajukan oleh HIMA INFORMATIKA.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Dies Natalis Hima Informatika\' telah diajukan oleh HIMA INFORMATIKA..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27dies%20natalis%20hima%20informatika%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=128\"}', NULL, '2025-06-11 06:53:47', '2025-06-11 06:53:47'),
('700ccc1a-1ac4-4514-bba6-d192cd6e1223', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 10, '{\"proposal_id\":119,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20pembina.&id=119\"}', '2025-05-12 01:55:03', '2025-05-11 23:48:38', '2025-05-12 01:55:03'),
('748327b7-c3b8-4102-b2ab-f7f6da1001e2', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":124,\"judul\":null,\"next_role\":\"Proposal baru \'Dies Natalis Hima Fisoterapi\' telah diajukan oleh HIMA INFORMATIKA.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Dies Natalis Hima Fisoterapi\' telah diajukan oleh HIMA INFORMATIKA..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27dies%20natalis%20hima%20fisoterapi%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=124\"}', '2025-05-27 12:46:33', '2025-05-27 02:27:57', '2025-05-27 12:46:33'),
('794682a6-bed2-4c1a-861e-50e4616f9dab', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":158,\"judul\":null,\"next_role\":\"Proposal baru \'Defis AI\' telah diajukan oleh Hima Kedokteran Gigi.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Defis AI\' telah diajukan oleh Hima Kedokteran Gigi..\",\"link\":\"http:\\/\\/localhost:8000\\/ormawa\\/proposal\\/list?role=proposal%20baru%20%27defis%20ai%27%20telah%20diajukan%20oleh%20hima%20kedokteran%20gigi.&id=158\"}', '2025-06-28 07:27:46', '2025-06-28 07:18:50', '2025-06-28 07:27:46'),
('7ad1204f-3b07-47d3-884b-1a398034a3de', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 13, '{\"proposal_id\":131,\"judul\":null,\"next_role\":\"Proposal \'Defis AI\' siap ditinjau oleh Kaprodi.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Defis AI\' siap ditinjau oleh Kaprodi..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20%27defis%20ai%27%20siap%20ditinjau%20oleh%20kaprodi.&id=131\"}', '2025-06-17 11:20:49', '2025-06-14 18:25:51', '2025-06-17 11:20:49'),
('837a2062-e583-4ad8-94fe-f4d6f33b025c', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 10, '{\"proposal_id\":124,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20pembina.&id=124\"}', NULL, '2025-05-27 02:29:07', '2025-05-27 02:29:07'),
('87e55e08-2b41-4097-b545-48aa50dc4e38', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 13, '{\"proposal_id\":151,\"judul\":null,\"next_role\":\"Proposal \'Defis AI\' siap ditinjau oleh Kaprodi.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Defis AI\' siap ditinjau oleh Kaprodi..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20%27defis%20ai%27%20siap%20ditinjau%20oleh%20kaprodi.&id=151\"}', NULL, '2025-06-23 22:43:11', '2025-06-23 22:43:11'),
('8a0890f0-bff5-431e-aedf-89eae9544295', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":151,\"judul\":null,\"next_role\":\"Proposal baru \'Defis AI\' telah diajukan oleh Hima Informatika.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Defis AI\' telah diajukan oleh Hima Informatika..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27defis%20ai%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=151\"}', NULL, '2025-06-23 22:38:36', '2025-06-23 22:38:36'),
('8df219d9-01f0-425b-852d-cce0a6fbd366', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 4, '{\"proposal_id\":158,\"judul\":null,\"next_role\":\"Proposal \'Defis AI\' dikembalikan untuk revisi oleh Admin.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Defis AI\' dikembalikan untuk revisi oleh Admin..\",\"link\":\"http:\\/\\/localhost:8000\\/ormawa\\/proposal\\/list?role=proposal%20%27defis%20ai%27%20dikembalikan%20untuk%20revisi%20oleh%20admin.&id=158\"}', NULL, '2025-06-28 07:25:36', '2025-06-28 07:25:36'),
('8e5f8486-3f26-4f3b-9db3-52c353a21ce1', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 19, '{\"proposal_id\":133,\"judul\":null,\"next_role\":\"Proposal \'Malam Keakraban Fisioterapi\' siap ditinjau oleh Kaprodi.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Malam Keakraban Fisioterapi\' siap ditinjau oleh Kaprodi..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20%27malam%20keakraban%20fisioterapi%27%20siap%20ditinjau%20oleh%20kaprodi.&id=133\"}', NULL, '2025-06-16 15:29:02', '2025-06-16 15:29:02'),
('8fab4da4-a63c-4443-8840-685ac89b4255', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 11, '{\"proposal_id\":125,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Kemahasiswaan.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Kemahasiswaan..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20kemahasiswaan.&id=125\"}', NULL, '2025-06-04 06:58:44', '2025-06-04 06:58:44'),
('934a3482-6c99-49eb-9353-1448370c3d05', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":137,\"judul\":null,\"next_role\":\"Proposal baru \'Defis AI\' telah diajukan oleh Hima Informatika.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Defis AI\' telah diajukan oleh Hima Informatika..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27defis%20ai%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=137\"}', NULL, '2025-06-23 21:03:48', '2025-06-23 21:03:48'),
('9961d5b1-9f6b-4875-99df-b4fe22f970e0', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":138,\"judul\":null,\"next_role\":\"Proposal baru \'Defis AI\' telah diajukan oleh Hima Informatika.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Defis AI\' telah diajukan oleh Hima Informatika..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27defis%20ai%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=138\"}', NULL, '2025-06-23 21:14:49', '2025-06-23 21:14:49'),
('9fa41850-8000-4e28-a5fe-c7e127fb8951', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 10, '{\"proposal_id\":130,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Informatika\' siap ditinjau oleh Pembina.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Informatika\' siap ditinjau oleh Pembina..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20informatika%27%20siap%20ditinjau%20oleh%20pembina.&id=130\"}', NULL, '2025-06-12 07:51:44', '2025-06-12 07:51:44'),
('a6d99547-511c-4267-b56e-c40c767f8a0a', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 10, '{\"proposal_id\":118,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20pembina.&id=118\"}', '2025-05-12 01:55:05', '2025-05-12 01:53:21', '2025-05-12 01:55:05'),
('a7742a3b-f05a-4962-968b-7ce29fccfb27', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":130,\"judul\":null,\"next_role\":\"Proposal baru \'Dies Natalis Hima Informatika\' telah diajukan oleh HIMA INFORMATIKA.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Dies Natalis Hima Informatika\' telah diajukan oleh HIMA INFORMATIKA..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27dies%20natalis%20hima%20informatika%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=130\"}', NULL, '2025-06-12 07:50:09', '2025-06-12 07:50:09'),
('a7e7a10f-157b-4259-aef5-89b91757f1de', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":124,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' telah direvisi oleh Pembina dan dikembalikan ke Admin.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' telah direvisi oleh Pembina dan dikembalikan ke Admin..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20telah%20direvisi%20oleh%20pembina%20dan%20dikembalikan%20ke%20admin.&id=124\"}', '2025-05-27 12:47:50', '2025-05-27 12:45:58', '2025-05-27 12:47:50'),
('a9a9cce0-c138-4e8c-bdff-5f0b261019e3', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 4, '{\"proposal_id\":131,\"judul\":null,\"next_role\":\"Proposal \'Defis AI\' telah disetujui sepenuhnya oleh Warek III.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Defis AI\' telah disetujui sepenuhnya oleh Warek III..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20%27defis%20ai%27%20telah%20disetujui%20sepenuhnya%20oleh%20warek%20iii.&id=131\"}', NULL, '2025-06-14 18:34:45', '2025-06-14 18:34:45'),
('a9edcd83-ba14-4be9-985f-832495dfb1fb', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":146,\"judul\":null,\"next_role\":\"Proposal baru \'Defis AI\' telah diajukan oleh Hima Informatika.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Defis AI\' telah diajukan oleh Hima Informatika..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27defis%20ai%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=146\"}', NULL, '2025-06-23 22:10:49', '2025-06-23 22:10:49'),
('aab00a3d-00cc-4967-9a39-46b93b0c5d6f', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 12, '{\"proposal_id\":131,\"judul\":null,\"next_role\":\"Proposal \'Defis AI\' siap ditinjau oleh Warek III.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Defis AI\' siap ditinjau oleh Warek III..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20%27defis%20ai%27%20siap%20ditinjau%20oleh%20warek%20iii.&id=131\"}', NULL, '2025-06-14 18:32:00', '2025-06-14 18:32:00'),
('ab6807a3-408b-40ca-a4d8-920d2b630177', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 4, '{\"proposal_id\":125,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' sudah disetujui.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' sudah disetujui..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20sudah%20disetujui.&id=125\"}', NULL, '2025-06-04 07:01:06', '2025-06-04 07:01:06'),
('ae121b32-e882-449c-9b5d-c23c45318781', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":148,\"judul\":null,\"next_role\":\"Proposal baru \'Defis AI\' telah diajukan oleh Hima Informatika.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Defis AI\' telah diajukan oleh Hima Informatika..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27defis%20ai%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=148\"}', NULL, '2025-06-23 22:27:59', '2025-06-23 22:27:59'),
('ae7aa4bd-7995-4686-bd0c-a6b7bef91f07', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":156,\"judul\":null,\"next_role\":\"Proposal baru \'diees natalis itsk\' telah diajukan oleh HIMA AKUPUNKTUR.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'diees natalis itsk\' telah diajukan oleh HIMA AKUPUNKTUR..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27diees%20natalis%20itsk%27%20telah%20diajukan%20oleh%20hima%20akupunktur.&id=156\"}', '2025-06-28 07:27:50', '2025-06-24 10:51:24', '2025-06-28 07:27:50'),
('b2c78e85-a2c8-4d58-b4d2-f3cb685ed1b0', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 13, '{\"proposal_id\":126,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Kaprodi.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Kaprodi..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20kaprodi.&id=126\"}', '2025-06-17 11:20:58', '2025-06-10 04:47:21', '2025-06-17 11:20:58'),
('b4efe14e-166f-441c-a5a2-9dd6b1e52045', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":144,\"judul\":null,\"next_role\":\"Proposal baru \'Defis AI\' telah diajukan oleh Hima Informatika.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Defis AI\' telah diajukan oleh Hima Informatika..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27defis%20ai%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=144\"}', NULL, '2025-06-23 21:48:05', '2025-06-23 21:48:05'),
('b91f7f57-ee22-4ce6-b4e8-c16004a7db93', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 10, '{\"proposal_id\":135,\"judul\":null,\"next_role\":\"Proposal \'Defis AI\' siap ditinjau oleh Pembina.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Defis AI\' siap ditinjau oleh Pembina..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20%27defis%20ai%27%20siap%20ditinjau%20oleh%20pembina.&id=135\"}', NULL, '2025-06-17 13:35:55', '2025-06-17 13:35:55'),
('bc468bfc-3c90-4914-9111-8e1d7a3960af', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":133,\"judul\":null,\"next_role\":\"Proposal baru \'Malam Keakraban Fisioterapi\' telah diajukan oleh Hima Fisioterapi.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Malam Keakraban Fisioterapi\' telah diajukan oleh Hima Fisioterapi..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27malam%20keakraban%20fisioterapi%27%20telah%20diajukan%20oleh%20hima%20fisioterapi.&id=133\"}', NULL, '2025-06-16 15:07:08', '2025-06-16 15:07:08'),
('c323b16d-f6f2-40e0-a7f5-0a384fc23f7b', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":152,\"judul\":null,\"next_role\":\"Proposal baru \'Defis AI\' telah diajukan oleh Hima Informatika.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Defis AI\' telah diajukan oleh Hima Informatika..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27defis%20ai%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=152\"}', NULL, '2025-06-24 09:21:35', '2025-06-24 09:21:35'),
('c5fb5061-dd38-4a16-be5c-b3044af4543c', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 4, '{\"proposal_id\":127,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Informatika\' dikembalikan untuk revisi oleh Admin.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Informatika\' dikembalikan untuk revisi oleh Admin..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20informatika%27%20dikembalikan%20untuk%20revisi%20oleh%20admin.&id=127\"}', NULL, '2025-06-10 04:33:38', '2025-06-10 04:33:38'),
('c8590925-2656-4337-9a55-3aad82377cf8', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":155,\"judul\":null,\"next_role\":\"Proposal baru \'diees natalis itsk\' telah diajukan oleh HIMA AKUPUNKTUR.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'diees natalis itsk\' telah diajukan oleh HIMA AKUPUNKTUR..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27diees%20natalis%20itsk%27%20telah%20diajukan%20oleh%20hima%20akupunktur.&id=155\"}', '2025-06-28 07:27:54', '2025-06-24 10:51:20', '2025-06-28 07:27:54'),
('c9b669fd-51ee-413d-9a72-974c92d4f265', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":153,\"judul\":null,\"next_role\":\"Proposal baru \'Defis AI\' telah diajukan oleh Hima Fisioterapi.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Defis AI\' telah diajukan oleh Hima Fisioterapi..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27defis%20ai%27%20telah%20diajukan%20oleh%20hima%20fisioterapi.&id=153\"}', NULL, '2025-06-24 09:32:36', '2025-06-24 09:32:36'),
('cd6a1366-e32d-4566-8ff0-b11138831f3f', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":143,\"judul\":null,\"next_role\":\"Proposal baru \'Defis AI\' telah diajukan oleh Hima Informatika.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Defis AI\' telah diajukan oleh Hima Informatika..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27defis%20ai%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=143\"}', NULL, '2025-06-23 21:43:03', '2025-06-23 21:43:03'),
('d1172ba2-9e16-42a2-adaf-b95a89b9ffb8', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 10, '{\"proposal_id\":148,\"judul\":null,\"next_role\":\"Proposal \'Defis AI\' siap ditinjau oleh Pembina.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Defis AI\' siap ditinjau oleh Pembina..\",\"link\":\"http:\\/\\/localhost:8000\\/ormawa\\/proposal\\/list?role=proposal%20%27defis%20ai%27%20siap%20ditinjau%20oleh%20pembina.&id=148\"}', NULL, '2025-07-22 12:40:30', '2025-07-22 12:40:30'),
('d2aa2eb6-f866-4dd2-bb27-884ad4c12a3f', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":135,\"judul\":null,\"next_role\":\"Proposal baru \'Defis AI\' telah diajukan oleh Hima Informatika.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Defis AI\' telah diajukan oleh Hima Informatika..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27defis%20ai%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=135\"}', NULL, '2025-06-17 13:35:21', '2025-06-17 13:35:21'),
('d3e29716-3f64-4508-b350-754def1184ba', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 4, '{\"proposal_id\":150,\"judul\":null,\"next_role\":\"Proposal \'Defis AI\' dikembalikan untuk revisi oleh Admin.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Defis AI\' dikembalikan untuk revisi oleh Admin..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20%27defis%20ai%27%20dikembalikan%20untuk%20revisi%20oleh%20admin.&id=150\"}', NULL, '2025-06-23 22:41:43', '2025-06-23 22:41:43'),
('d54d1995-5480-452c-8256-858347092d4b', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":121,\"judul\":null,\"next_role\":\"Proposal baru \'Dies Natalis Hima Fisoterapi\' telah diajukan oleh HIMA INFORMATIKA.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Dies Natalis Hima Fisoterapi\' telah diajukan oleh HIMA INFORMATIKA..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27dies%20natalis%20hima%20fisoterapi%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=121\"}', '2025-05-12 05:31:33', '2025-05-12 05:29:51', '2025-05-12 05:31:33'),
('d8427f56-a819-4aaa-9319-5af77cb57a73', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":136,\"judul\":null,\"next_role\":\"Proposal baru \'Malam Keakraban Informatika\' telah diajukan oleh Hima Informatika.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Malam Keakraban Informatika\' telah diajukan oleh Hima Informatika..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27malam%20keakraban%20informatika%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=136\"}', NULL, '2025-06-23 20:40:39', '2025-06-23 20:40:39'),
('d88693ff-d25b-4025-87d3-562c824dd855', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 10, '{\"proposal_id\":158,\"judul\":null,\"next_role\":\"Proposal \'Defis AI\' siap ditinjau oleh Pembina.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Defis AI\' siap ditinjau oleh Pembina..\",\"link\":\"http:\\/\\/localhost:8000\\/ormawa\\/proposal\\/list?role=proposal%20%27defis%20ai%27%20siap%20ditinjau%20oleh%20pembina.&id=158\"}', NULL, '2025-06-28 07:27:09', '2025-06-28 07:27:09'),
('dc0accf1-95b7-43cc-8cfc-f50d378b5103', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 14, '{\"proposal_id\":122,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' sudah disetujui.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' sudah disetujui..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20sudah%20disetujui.&id=122\"}', NULL, '2025-05-27 13:34:54', '2025-05-27 13:34:54'),
('dc989750-0ad4-4ef2-8f61-66fd52ee491f', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 11, '{\"proposal_id\":130,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Informatika\' siap ditinjau oleh Kemahasiswaan.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Informatika\' siap ditinjau oleh Kemahasiswaan..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20informatika%27%20siap%20ditinjau%20oleh%20kemahasiswaan.&id=130\"}', NULL, '2025-06-14 19:09:54', '2025-06-14 19:09:54'),
('de4c081e-b95d-4d33-9d48-b04f360a2e3b', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 4, '{\"proposal_id\":126,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' sudah disetujui.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' sudah disetujui..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20sudah%20disetujui.&id=126\"}', NULL, '2025-06-12 03:44:52', '2025-06-12 03:44:52'),
('dfb708ba-f9ca-448a-86b4-5ff8a2c91fba', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 16, '{\"proposal_id\":122,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20pembina.&id=122\"}', '2025-05-27 03:12:27', '2025-05-27 01:12:06', '2025-05-27 03:12:27'),
('e33ad7b9-a245-4ac0-ab9a-1a40d6288db5', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 16, '{\"proposal_id\":133,\"judul\":null,\"next_role\":\"Proposal \'Malam Keakraban Fisioterapi\' siap ditinjau oleh Pembina.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Malam Keakraban Fisioterapi\' siap ditinjau oleh Pembina..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20%27malam%20keakraban%20fisioterapi%27%20siap%20ditinjau%20oleh%20pembina.&id=133\"}', NULL, '2025-06-16 15:10:45', '2025-06-16 15:10:45'),
('e78dac94-69cd-4e25-86ed-d64194eb8559', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":145,\"judul\":null,\"next_role\":\"Proposal baru \'Defis AI\' telah diajukan oleh Hima Informatika.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Defis AI\' telah diajukan oleh Hima Informatika..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27defis%20ai%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=145\"}', NULL, '2025-06-23 21:51:52', '2025-06-23 21:51:52'),
('eb31557d-d2b1-4cfe-bd24-30e9b8b5e8d7', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 12, '{\"proposal_id\":151,\"judul\":null,\"next_role\":\"Proposal \'Defis AI\' siap ditinjau oleh Warek III.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Defis AI\' siap ditinjau oleh Warek III..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20%27defis%20ai%27%20siap%20ditinjau%20oleh%20warek%20iii.&id=151\"}', NULL, '2025-06-23 22:44:59', '2025-06-23 22:44:59'),
('ec6427f2-d7f3-407a-96e0-ca27729f7908', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 4, '{\"proposal_id\":151,\"judul\":null,\"next_role\":\"Proposal \'Defis AI\' telah disetujui sepenuhnya oleh Warek III.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Defis AI\' telah disetujui sepenuhnya oleh Warek III..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20%27defis%20ai%27%20telah%20disetujui%20sepenuhnya%20oleh%20warek%20iii.&id=151\"}', NULL, '2025-06-23 22:45:40', '2025-06-23 22:45:40'),
('ede40f3f-6404-4deb-9bdb-a8bcf38341ed', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 13, '{\"proposal_id\":130,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Informatika\' siap ditinjau oleh Kaprodi.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Informatika\' siap ditinjau oleh Kaprodi..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20informatika%27%20siap%20ditinjau%20oleh%20kaprodi.&id=130\"}', '2025-06-17 11:20:54', '2025-06-12 07:52:29', '2025-06-17 11:20:54');
INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('eeec5ae7-463c-46cd-803d-cbae4b36a5d0', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":142,\"judul\":null,\"next_role\":\"Proposal baru \'as\' telah diajukan oleh Hima Informatika.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'as\' telah diajukan oleh Hima Informatika..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27as%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=142\"}', NULL, '2025-06-23 21:37:43', '2025-06-23 21:37:43'),
('f046611d-8ebc-48fe-be1f-f12200a51400', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 13, '{\"proposal_id\":135,\"judul\":null,\"next_role\":\"Proposal \'Defis AI\' siap ditinjau oleh Kaprodi.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Defis AI\' siap ditinjau oleh Kaprodi..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20%27defis%20ai%27%20siap%20ditinjau%20oleh%20kaprodi.&id=135\"}', NULL, '2025-06-17 13:36:30', '2025-06-17 13:36:30'),
('f45477d6-752c-4225-b8bf-a90619faf2a7', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":134,\"judul\":null,\"next_role\":\"Proposal baru \'sas\' telah diajukan oleh Hima Informatika.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'sas\' telah diajukan oleh Hima Informatika..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27sas%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=134\"}', NULL, '2025-06-16 17:50:23', '2025-06-16 17:50:23'),
('f604ade3-e7b0-4b72-b6fb-1cb531e06fd7', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":147,\"judul\":null,\"next_role\":\"Proposal baru \'Defis AI\' telah diajukan oleh Hima Informatika.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Defis AI\' telah diajukan oleh Hima Informatika..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27defis%20ai%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=147\"}', NULL, '2025-06-23 22:19:13', '2025-06-23 22:19:13'),
('f6788c87-a56c-4501-8280-007a35d72ce3', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":141,\"judul\":null,\"next_role\":\"Proposal baru \'Defis AI\' telah diajukan oleh Hima Informatika.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Defis AI\' telah diajukan oleh Hima Informatika..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27defis%20ai%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=141\"}', NULL, '2025-06-23 21:32:05', '2025-06-23 21:32:05'),
('f9df9963-7aff-4938-8b73-60f781f2b680', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 10, '{\"proposal_id\":126,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20pembina.&id=126\"}', NULL, '2025-06-10 04:33:50', '2025-06-10 04:33:50'),
('fca10d5a-20e6-4846-9cd2-124c60d4f1ac', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":131,\"judul\":null,\"next_role\":\"Proposal baru \'Defis AI\' telah diajukan oleh Hima Informatika.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Defis AI\' telah diajukan oleh Hima Informatika..\",\"link\":\"http:\\/\\/localhost:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27defis%20ai%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=131\"}', NULL, '2025-06-15 05:29:57', '2025-06-15 05:29:57'),
('fe776658-eaa8-4504-b0c1-b58b733d4c4b', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":159,\"judul\":null,\"next_role\":\"Proposal baru \'Defis AI\' telah diajukan oleh Hima Informatika.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Defis AI\' telah diajukan oleh Hima Informatika..\",\"link\":\"http:\\/\\/localhost:8000\\/ormawa\\/proposal\\/list?role=proposal%20baru%20%27defis%20ai%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=159\"}', NULL, '2025-07-02 17:26:43', '2025-07-02 17:26:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orangtuas`
--

CREATE TABLE `orangtuas` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `orangtua_siswas`
--

CREATE TABLE `orangtua_siswas` (
  `id` bigint UNSIGNED NOT NULL,
  `orangtua_id` bigint UNSIGNED NOT NULL,
  `siswa_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('pembinahimatif@mail.com', '$2y$10$2FfZtCesmjq3XXdDsyxPO.hn1EYg3BaO3Z6eg96dnd1/KL4PKcQAm', '2025-06-14 18:15:58'),
('awildan283@gmail.com', '$2y$10$oVJwlCL6GYcFs/9.o94XQeCA3Z2/wuSIDosDeUDYeY5ycAyrTOKSe', '2025-07-03 20:05:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturans`
--

CREATE TABLE `pengaturans` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengaturans`
--

INSERT INTO `pengaturans` (`id`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'SIOM', 'assets/img/p-250.png', '2025-03-06 13:40:02', '2025-04-30 02:14:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan_danas`
--

CREATE TABLE `pengaturan_danas` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `total_awal` int NOT NULL DEFAULT '9000000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `periode_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengaturan_danas`
--

INSERT INTO `pengaturan_danas` (`id`, `user_id`, `total_awal`, `created_at`, `updated_at`, `periode_id`) VALUES
(1, 4, 9000000, '2025-04-28 23:09:01', '2025-04-30 15:42:12', NULL),
(2, 14, 9000000, '2025-04-30 15:44:31', '2025-06-04 06:52:55', NULL),
(19, 4, 1000000, '2025-06-16 18:39:46', '2025-06-16 18:40:00', 1),
(20, 14, 9000000, '2025-06-16 18:39:46', '2025-06-16 18:39:46', 1),
(21, 4, 9000000, '2025-06-16 18:40:09', '2025-06-16 18:40:09', 2),
(22, 14, 9000000, '2025-06-16 18:40:09', '2025-06-16 18:40:09', 2),
(23, 21, 10000000, '2025-07-03 20:11:26', '2025-07-03 20:18:49', 1),
(24, 21, 9000000, '2025-07-03 20:19:27', '2025-07-03 20:19:27', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumumans`
--

CREATE TABLE `pengumumans` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengumumans`
--

INSERT INTO `pengumumans` (`id`, `judul`, `deskripsi`, `file_path`, `created_at`, `updated_at`) VALUES
(2, 'Laporan Tahunan Penelitian Tahun 2022-2023', 'Tidak Ada Deskripsi', 'pengumuman/WFlpZEXvXhdnyDpcmyzWZ11Y5gGo1KDsgJAsiMdd.pdf', '2025-07-03 18:10:32', '2025-07-03 18:10:32'),
(3, 'KUISIONER PELAKSANAAN PENGABDIAN 2024/2025', 'adadadddsa', 'pengumuman/wMfoHOfnGMn64IjkWoVrjN6a7kw3kHRCTlEGF9Bf.pdf', '2025-07-03 19:19:01', '2025-07-03 19:19:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman_sekolahs`
--

CREATE TABLE `pengumuman_sekolahs` (
  `id` bigint UNSIGNED NOT NULL,
  `start_at` date NOT NULL,
  `end_at` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `periodes`
--

CREATE TABLE `periodes` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `periodes`
--

INSERT INTO `periodes` (`id`, `nama`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '2024/2025', 1, '2025-06-16 16:39:31', '2025-06-17 09:16:22'),
(2, '2025/2026', 0, '2025-06-16 17:07:06', '2025-06-17 09:16:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertemuans`
--

CREATE TABLE `pertemuans` (
  `id` bigint UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `pokok_bahasan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_pokok_bahasan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dibuat_oleh_user_id` bigint UNSIGNED NOT NULL,
  `dokumentasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `periode_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pertemuans`
--

INSERT INTO `pertemuans` (`id`, `tanggal`, `pokok_bahasan`, `sub_pokok_bahasan`, `created_at`, `updated_at`, `dibuat_oleh_user_id`, `dokumentasi`, `periode_id`) VALUES
(23, '2025-04-11', 'INI PUNYA HIMATIF', NULL, '2025-04-30 15:36:52', '2025-04-30 15:36:52', 4, NULL, NULL),
(24, '2025-04-11', 'INI PUNYA HIMAFIS', NULL, '2025-04-30 15:37:26', '2025-04-30 15:37:26', 14, NULL, NULL),
(25, '2025-05-23', 'INI PUNYA HIMATIF 2', NULL, '2025-05-04 08:43:46', '2025-05-04 08:43:46', 4, NULL, NULL),
(26, '2025-05-17', 'Pembahasan Kegiatan', 'naisu', '2025-05-06 13:10:14', '2025-05-10 12:15:36', 14, NULL, NULL),
(31, '2025-05-17', 'takda', 'ada', '2025-05-10 14:37:09', '2025-05-10 14:37:09', 14, 'dokumentasi/5xA5rC5jB5cFmMMjwSVWI20yeuTzeJkIty0HYUHq.png', NULL),
(32, '2025-05-16', 'INI PUNYA HIMATIF 3', 'Pandemi COVID-19 telah menciptakan tantangan besar bagi 212 negara yang terjangkit virus tersebut. Hingga hari Senin, 20 April 2020, WHO mencatat 2.245.872 total kasus terkonfirmasi dan korban meninggal sejumlah 152.707. Amerika Serikat (AS) tercatat sebagai negara dengan jumlah kasus terkonfirmasi (695.353) dan korban meninggal dunia (32.427), tertinggi di dunia. Sementara itu, jumlah kasus terkonfirmasi di Indonesia hingga Senin, 20 April 2020 adalah 6.575 dengan korban meninggal sebanyak 582 (berdasarkan data Kementerian Kesehatan). Sejauh ini, perhatian masyarakat terpaku pada penyebaran COVID-19 di berbagai provinsi di Indonesia. Bagaimana dengan situasi warga negara Indonesia (WNI) di luar negeri di tengah pandemi global COVID-19? Bagaimana politik luar negeri Indonesia dalam upaya memitigasi pandemi global COVID-19? Artikel ini akan mendeskripsikan hal-hal tersebut dengan ringkas.\r\n\r\nBerdasarkan keterangan Menteri Luar Negeri (Menlu) Retno L. P. Marsudi pada tahun 2016, jumlah WNI di luar negeri yang tercatat di Kementerian Luar Negeri (Kemlu) adalah sebanyak 2,7 juta. Namun angka sebenarnya diperkirakan sekitar 4,3 juta. Data tersebut sudah tentu berubah pada tahun 2020. Terlepas dari pertanyaan berapa jumlah tercatat dan riil saat ini, isu yang perlu diperhatikan dengan saksama adalah kondisi WNI di luar negeri di tengah pandemi global COVID-19. Pada hari Kamis, 9 April 2020, Menlu Retno telah menyatakan bahwa fokus pemerintah sekarang adalah memberikan perlindungan bagi WNI di luar negeri dan memfasilitasi kerja sama internasional. Jumlah kasus terkonfirmasi di kalangan WNI di luar negeri sampai hari Senin, 20 April 2020 adalah sebanyak 473. Kasus sembuh mencapai 109 dan meninggal dunia 19.', '2025-05-10 15:09:13', '2025-05-10 15:09:13', 4, 'dokumentasi/nykvnCL47IEzOMQGWU9jyD8YhMo6HCTMEwsBb6Lw.jpg', NULL),
(33, '2025-05-13', 'Buka Bersama HIMA Informatika 2024/2025', 'mencoba', '2025-05-12 01:51:03', '2025-05-12 01:51:03', 14, 'dokumentasi/NMYzvUibP6aMNUWH8iYckyjezgzBjPP8xxVr6qYX.jpg', NULL),
(35, '2025-06-10', 'asw', 'jkj', '2025-06-11 07:00:21', '2025-06-11 07:00:21', 4, 'dokumentasi/a4BdZxwsWWWxlknhHhWUnzd97xuCxD8WhXzWMBuz.jpg', NULL),
(36, '2025-06-13', 'Rapat 1', 'qdsqdqdq\r\ndqsdqddsq', '2025-06-12 07:42:00', '2025-06-12 07:54:54', 4, 'dokumentasi/FFOfpvoofrYlscZH6s23XHebJZPNKQEPN01DdRM8.jpg', NULL),
(37, '2025-06-16', 'ada', 'ada', '2025-06-16 18:17:56', '2025-06-16 18:17:56', 4, 'dokumentasi/Z8vbgPqwlkVvQHWM7iSdNgBF9X6FfVK1ymQthiOw.jpg', NULL),
(39, '2025-06-25', 'Lomba', 'Lomba Desain', '2025-06-24 11:00:27', '2025-06-24 11:00:27', 4, 'dokumentasi/Y4xnAFnI4l0nvwPz6vTr1Ry9nl58kFeUZQJ5zCgJ.jpg', 2),
(40, '2025-06-30', 'Lomba', 'Lomba 17 Agustus', '2025-06-30 10:17:11', '2025-06-30 10:17:11', 4, 'dokumentasi/3jPsxm4aiy1S15EnDFrDO6LMIyV8XCYCObwukSpu.jpg', 1),
(41, '2025-07-02', 'Dies Natalis', 'tes', '2025-07-02 10:04:20', '2025-07-02 10:04:20', 4, 'dokumentasi/ThssGjNKsO163jsYcJ6odfw0AWAn2B3nPk190ZqW.png', 1),
(42, '2025-07-07', 'LKMM', 'LKMM', '2025-07-07 10:02:50', '2025-07-07 10:02:50', 4, 'dokumentasi/eErbZz1MY21jj99DbVlXamXM8GWsoLO4Cjeh8Cdk.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `proposals`
--

CREATE TABLE `proposals` (
  `id` bigint UNSIGNED NOT NULL,
  `judul_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ormawa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prodi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_proposal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dibuat_oleh_user_id` bigint UNSIGNED NOT NULL,
  `status` enum('pending_admin','revisi_admin','pending_pembina','revisi_pembina','pending_kaprodi','revisi_kaprodi','pending_kemahasiswaan','revisi_kemahasiswaan','pending_wr3','revisi_wr3','acc_final') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending_admin',
  `current_reviewer_id` bigint UNSIGNED DEFAULT NULL,
  `catatan_revisi` text COLLATE utf8mb4_unicode_ci,
  `ttd_pembina` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttd_kemahasiswaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttd_wr3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file_revisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_dana` int NOT NULL DEFAULT '9000000',
  `sisa_dana` int NOT NULL DEFAULT '9000000',
  `total_keseluruhan` int NOT NULL DEFAULT '0',
  `ttd_kaprodi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_proposal_pdf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `periode_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `proposals`
--

INSERT INTO `proposals` (`id`, `judul_kegiatan`, `ormawa`, `prodi`, `file_proposal`, `dibuat_oleh_user_id`, `status`, `current_reviewer_id`, `catatan_revisi`, `ttd_pembina`, `ttd_kemahasiswaan`, `ttd_wr3`, `created_at`, `updated_at`, `file_revisi`, `total_dana`, `sisa_dana`, `total_keseluruhan`, `ttd_kaprodi`, `file_proposal_pdf`, `periode_id`) VALUES
(104, 'Dies Natalis Hima Fisoterapi', 'himafis', 'fisioterapi', 'storage/Perbaikan_Proposal_1746266671.docx', 14, 'acc_final', 14, NULL, 'tanda_tangan/pembina.png', 'tanda_tangan/kemahasiswaan.png', 'tanda_tangan/wr3.png', '2025-05-03 09:55:06', '2025-05-03 10:06:26', NULL, 9000000, 9000000, 80000, 'tanda_tangan/kaprodi.png', 'storage/proposal/Perbaikan_Proposal_1746266671.pdf', NULL),
(109, 'Dies Natalis Hima Fisoterapi', 'himatif', 'informatika', 'storage/Proposal_1746283046.docx', 4, 'acc_final', 4, NULL, 'tanda_tangan/tanda_tangan_10.png', 'tanda_tangan/kemahasiswaan.png', 'tanda_tangan/wr3.png', '2025-05-03 14:37:30', '2025-05-08 07:39:04', NULL, 9000000, 9000000, 80000, 'tanda_tangan/ttd_kaprodi_13.png', 'storage/proposal/Proposal_1746283046.pdf', NULL),
(122, 'Dies Natalis Hima Fisoterapi', 'himafis', 'fisioterapi', 'storage/Proposal_1747027926.docx', 14, 'acc_final', 14, NULL, 'tanda_tangan/tanda_tangan_16.png', 'tanda_tangan/kemahasiswaan.png', 'tanda_tangan/wr3.png', '2025-05-12 05:32:09', '2025-05-27 13:34:54', NULL, 9000000, 9000000, 80000, 'tanda_tangan/ttd_kaprodi_19.png', 'storage/proposal/Proposal_1747027926.pdf', NULL),
(125, 'Dies Natalis Hima Fisoterapi', 'himatif', 'informatika', 'storage/Proposal_1749018716.docx', 4, 'acc_final', 4, NULL, 'tanda_tangan/tanda_tangan_10.png', 'tanda_tangan/kemahasiswaan.png', 'tanda_tangan/wr3.png', '2025-06-04 06:32:05', '2025-06-04 07:01:06', NULL, 9000000, 9000000, 100000, 'tanda_tangan/ttd_kaprodi_13.png', 'storage/proposal/Proposal_1749018716.pdf', NULL),
(126, 'Dies Natalis Hima Fisoterapi', 'himatif', 'informatika', 'storage/Proposal_1749529062.docx', 4, 'acc_final', 4, NULL, 'tanda_tangan/tanda_tangan_10.png', 'tanda_tangan/kemahasiswaan.png', 'tanda_tangan/wr3.png', '2025-06-10 04:18:01', '2025-06-12 03:44:52', NULL, 9000000, 9000000, 80000, 'tanda_tangan/ttd_kaprodi_13.png', 'storage/proposal/Proposal_1749529062.pdf', NULL),
(128, 'Dies Natalis Hima Informatika', 'himatif', 'informatika', 'storage/Proposal_1749624814.docx', 4, 'pending_admin', 1, NULL, NULL, NULL, NULL, '2025-06-11 06:53:45', '2025-06-11 06:53:45', NULL, 9000000, 9000000, 80000, NULL, 'storage/proposal/Proposal_1749624814.pdf', NULL),
(129, 'Dies Natalis Hima Informatika', 'himatif', 'informatika', 'storage/proposal/Perbaikan_Proposal_1749899398.docx', 4, 'pending_admin', 1, NULL, NULL, NULL, NULL, '2025-06-12 07:36:45', '2025-06-14 18:10:00', NULL, 9000000, 9000000, 140000, NULL, 'storage/proposal/Perbaikan_Proposal_1749899398.pdf', NULL),
(130, 'Dies Natalis Hima Informatika', 'himatif', 'informatika', 'storage/Proposal_1749714604.docx', 4, 'pending_kemahasiswaan', 11, NULL, 'tanda_tangan/tanda_tangan_10.png', NULL, NULL, '2025-06-12 07:50:08', '2025-06-14 19:09:54', NULL, 9000000, 9000000, 160000, 'tanda_tangan/ttd_kaprodi_13.png', 'storage/proposal/Proposal_1749714604.pdf', NULL),
(131, 'Defis AI', 'himatif', 'informatika', 'storage/proposal/Proposal_1749940194.docx', 4, 'acc_final', 4, NULL, 'tanda_tangan/tanda_tangan_10.png', 'tanda_tangan/kemahasiswaan.png', 'tanda_tangan/wr3.png', '2025-06-15 05:29:56', '2025-06-14 18:34:45', NULL, 9000000, 9000000, 2462, 'tanda_tangan/ttd_kaprodi_13.png', 'storage/proposal/Proposal_1749940194.pdf', NULL),
(132, 'Dies Natalis Hima Fisioterapi', 'himafis', 'fisioterapi', 'storage/proposal/Proposal_1750061141.docx', 14, 'revisi_pembina', 1, 'sudah bagus', NULL, NULL, NULL, '2025-06-16 15:05:44', '2025-06-16 15:29:59', NULL, 9000000, 9000000, 23000, NULL, 'storage/proposal/Proposal_1750061141.pdf', NULL),
(133, 'Malam Keakraban Fisioterapi', 'himafis', 'fisioterapi', 'storage/proposal/Proposal_1750061225.docx', 14, 'pending_kaprodi', 19, NULL, 'tanda_tangan/tanda_tangan_16.png', NULL, NULL, '2025-06-16 15:07:07', '2025-06-16 15:29:02', NULL, 9000000, 9000000, 64000, NULL, 'storage/proposal/Proposal_1750061225.pdf', NULL),
(148, 'Defis AI', 'himatif', 'informatika', 'storage/proposal/Proposal_1750692474.docx', 4, 'pending_pembina', 10, NULL, NULL, NULL, NULL, '2025-06-23 22:27:59', '2025-07-22 12:40:28', NULL, 9000000, 9000000, 252, NULL, 'storage/proposal/Proposal_1750692474.pdf', 1),
(150, 'Defis AI', 'himatif', 'informatika', 'storage/proposal/Perbaikan_Proposal_1750693597.docx', 4, 'pending_admin', 1, NULL, NULL, NULL, NULL, '2025-06-23 22:37:02', '2025-06-23 22:46:42', NULL, 9000000, 9000000, 9, NULL, 'storage/proposal/Perbaikan_Proposal_1750693597.pdf', 1),
(151, 'Defis AI', 'himatif', 'informatika', 'storage/proposal/Proposal_1750693113.docx', 4, 'acc_final', 4, NULL, 'tanda_tangan/tanda_tangan_10.png', 'tanda_tangan/kemahasiswaan.png', 'tanda_tangan/wr3.png', '2025-06-23 22:38:35', '2025-06-23 22:45:40', NULL, 9000000, 9000000, 12, 'tanda_tangan/ttd_kaprodi_13.png', 'storage/proposal/Proposal_1750693113.pdf', 1),
(152, 'Defis AI', 'himatif', 'informatika', 'storage/proposal/Proposal_1750731688.docx', 4, 'pending_admin', 1, NULL, NULL, NULL, NULL, '2025-06-24 09:21:33', '2025-06-24 09:21:33', NULL, 9000000, 9000000, 920000, NULL, 'storage/proposal/Proposal_1750731688.pdf', 1),
(153, 'Defis AI', 'himafis', 'fisioterapi', 'storage/proposal/Proposal_1750732354.docx', 14, 'pending_admin', 1, NULL, NULL, NULL, NULL, '2025-06-24 09:32:36', '2025-06-24 09:32:36', NULL, 9000000, 9000000, 20000, NULL, 'storage/proposal/Proposal_1750732354.pdf', 1),
(154, 'LKMM-TD', 'himatif', 'informatika', 'storage/proposal/Proposal_1750736624.docx', 4, 'pending_admin', 1, NULL, NULL, NULL, NULL, '2025-06-24 10:43:47', '2025-06-24 10:43:47', NULL, 9000000, 9000000, 3660000, NULL, 'storage/proposal/Proposal_1750736624.pdf', 2),
(155, 'diees natalis itsk', 'himatif', 'informatika', 'storage/proposal/Proposal_1750737076.docx', 4, 'pending_admin', 1, NULL, NULL, NULL, NULL, '2025-06-24 10:51:20', '2025-06-24 10:51:20', NULL, 9000000, 9000000, 100000, NULL, 'storage/proposal/Proposal_1750737076.pdf', 2),
(156, 'diees natalis itsk', 'himatif', 'informatika', 'storage/proposal/Proposal_1750737082.docx', 4, 'pending_admin', 1, NULL, NULL, NULL, NULL, '2025-06-24 10:51:24', '2025-06-24 10:51:24', NULL, 9000000, 9000000, 100000, NULL, 'storage/proposal/Proposal_1750737082.pdf', 2),
(158, 'Defis AI', 'himatif', 'informatika', 'storage/proposal/Perbaikan_Proposal_1751070385.docx', 4, 'pending_pembina', 10, NULL, NULL, NULL, NULL, '2025-06-28 07:18:49', '2025-06-28 07:27:09', NULL, 9000000, 9000000, 147744, NULL, 'storage/proposal/Perbaikan_Proposal_1751070385.pdf', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelas_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id` bigint UNSIGNED NOT NULL,
  `kelas_id` bigint UNSIGNED NOT NULL,
  `guru_id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ormawa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prodi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ttd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `roles`, `ormawa`, `prodi`, `remember_token`, `nis`, `nip`, `created_at`, `updated_at`, `ttd`) VALUES
(1, 'Admin', 'admin@mail.com', NULL, '$2y$10$mukjLsx9N1xCRv73BvZQOOu72RwCo3STPGOtLdbiTdtTGm.mHM80.', 'admin', NULL, NULL, NULL, NULL, NULL, '2025-05-01 04:24:38', '2025-05-01 04:24:38', NULL),
(4, 'Hima Informatika', 'himatif@mail.com', NULL, '$2y$10$/HyjlsjvzQnXUyMCpSR6j.4VNng83QXmn8pAF8xo.Ez8LwROf1VmK', 'ormawa', 'himatif', 'informatika', 'U76hMPemifaO277NTyHEdn6lSUzMPAoXdM0TZ2KlG8KKUqLStccAhbWaDz51', '123454321', NULL, '2025-03-17 21:05:18', '2025-06-14 18:38:12', NULL),
(10, 'Pembina Himatif', 'pembinahimatif@mail.com', NULL, '$2y$10$2Ru7Sk0Z0az6oTsL5kKky.Olh/ydCVA5fi19DubqBpQCuDEaGJfem', 'pembina', 'himatif', 'informatika', NULL, NULL, '111122223333', '2025-04-30 14:19:22', '2025-06-30 10:28:00', 'tanda_tangan/tanda_tangan_10.png'),
(11, 'Kemahasiswaan', 'kemahasiswaan@mail.com', NULL, '$2y$10$VrzUBziUfUfZ4ixssOstfOitHLQSReS2FFGcE178TLBf.Vk20/MgG', 'kemahasiswaan', NULL, NULL, NULL, NULL, '444455556666', '2025-05-01 04:24:39', '2025-05-01 04:24:39', NULL),
(12, 'Wakil Rektor 3', 'wr3@mail.com', NULL, '$2y$10$suF0a8O4ismMZYhmpYRIMe4vuQCSUZA5Pi72asFkjLvgS1GVP.74m', 'wr3', NULL, NULL, NULL, NULL, '777788889999', '2025-05-01 04:24:39', '2025-05-01 04:24:39', NULL),
(13, 'Kaprodi Informatika', 'kaproditif@mail.com', NULL, '$2y$10$pYjukMeTxO6sTa2qfDTyNOQDw/RclN4bRz3gZDaRdri9AEMD9ehYy', 'kaprodi', 'himatif', 'informatika', NULL, NULL, NULL, '2025-04-30 22:55:07', '2025-05-03 14:36:23', 'tanda_tangan/ttd_kaprodi_13.png'),
(14, 'Hima Fisioterapi', 'himafis@mail.com', NULL, '$2y$10$IYVVpetoOk1kGE4BO4WwfumZBvsu3EYRfL00WvUzeYX0lMlC38D9W', 'ormawa', 'himafis', 'fisioterapi', NULL, NULL, NULL, '2025-05-01 04:24:39', '2025-05-01 04:24:39', NULL),
(16, 'Pembina Fisioterapi', 'pembinafis@mail.com', NULL, '$2y$10$v8Dc5Q4Guf.N3fo7EnJEIuF43IQiXgYHAgsHdH/W/HgJFEoNFjuwW', 'pembina', 'himafis', 'fisioterapi', NULL, NULL, NULL, '2025-05-01 04:24:39', '2025-05-27 12:41:05', 'tanda_tangan/tanda_tangan_16.png'),
(19, 'Kaprodi Fisioterapi', 'kaprodifis@mail.com', NULL, '$2y$10$FYYvnHHNFZ/XeD1j1d0UB.oJCEG4Ui67qtA/xyLqJo9giLoiCndue', 'kaprodi', 'himafis', 'fisioterapi', NULL, NULL, NULL, '2025-05-01 04:24:39', '2025-05-27 13:01:00', 'tanda_tangan/ttd_kaprodi_19.png'),
(21, 'Hima RMIK', 'himarmik@mail.com', NULL, '$2y$10$K0irfneRyyLlc42l564C/.mLQ9JmOkUp3Ae3v06pQxFaGe1Xq2eHK', 'ormawa', 'himarmik', 'RMIK', NULL, NULL, NULL, '2025-07-02 19:07:41', '2025-07-02 19:07:41', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensis`
--
ALTER TABLE `absensis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensis_pertemuan_id_foreign` (`pertemuan_id`),
  ADD KEY `absensis_anggota_id_foreign` (`anggota_id`),
  ADD KEY `absensis_periode_id_foreign` (`periode_id`);

--
-- Indeks untuk tabel `anggotas`
--
ALTER TABLE `anggotas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anggotas_dibuat_oleh_user_id_foreign` (`dibuat_oleh_user_id`),
  ADD KEY `anggotas_periode_id_foreign` (`periode_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gurus_user_id_foreign` (`user_id`),
  ADD KEY `gurus_mapel_id_foreign` (`mapel_id`);

--
-- Indeks untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwals_kelas_id_foreign` (`kelas_id`),
  ADD KEY `jadwals_mapel_id_foreign` (`mapel_id`);

--
-- Indeks untuk tabel `jawabans`
--
ALTER TABLE `jawabans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jawabans_tugas_id_foreign` (`tugas_id`),
  ADD KEY `jawabans_siswa_id_foreign` (`siswa_id`);

--
-- Indeks untuk tabel `jurusans`
--
ALTER TABLE `jurusans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kas_anggotas`
--
ALTER TABLE `kas_anggotas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kas_anggotas_anggota_id_foreign` (`anggota_id`),
  ADD KEY `kas_anggotas_dibuat_oleh_user_id_foreign` (`dibuat_oleh_user_id`),
  ADD KEY `kas_anggotas_periode_id_foreign` (`periode_id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_jurusan_id_foreign` (`jurusan_id`),
  ADD KEY `kelas_guru_id_foreign` (`guru_id`);

--
-- Indeks untuk tabel `keuangans`
--
ALTER TABLE `keuangans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keuangans_user_id_foreign` (`user_id`),
  ADD KEY `keuangans_kas_anggota_id_foreign` (`kas_anggota_id`),
  ADD KEY `keuangans_periode_id_foreign` (`periode_id`);

--
-- Indeks untuk tabel `lpjs`
--
ALTER TABLE `lpjs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lpjs_dibuat_oleh_user_id_foreign` (`dibuat_oleh_user_id`),
  ADD KEY `lpjs_current_reviewer_id_foreign` (`current_reviewer_id`),
  ADD KEY `lpjs_periode_id_foreign` (`periode_id`);

--
-- Indeks untuk tabel `mapels`
--
ALTER TABLE `mapels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mapels_jurusan_id_foreign` (`jurusan_id`);

--
-- Indeks untuk tabel `materis`
--
ALTER TABLE `materis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materis_guru_id_foreign` (`guru_id`),
  ADD KEY `materis_kelas_id_foreign` (`kelas_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indeks untuk tabel `orangtuas`
--
ALTER TABLE `orangtuas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orangtuas_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `orangtua_siswas`
--
ALTER TABLE `orangtua_siswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orangtua_siswas_orangtua_id_foreign` (`orangtua_id`),
  ADD KEY `orangtua_siswas_siswa_id_foreign` (`siswa_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pengaturans`
--
ALTER TABLE `pengaturans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengaturan_danas`
--
ALTER TABLE `pengaturan_danas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pengaturan_danas_user_id_periode_id_unique` (`user_id`,`periode_id`),
  ADD KEY `pengaturan_danas_periode_id_foreign` (`periode_id`);

--
-- Indeks untuk tabel `pengumumans`
--
ALTER TABLE `pengumumans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengumuman_sekolahs`
--
ALTER TABLE `pengumuman_sekolahs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `periodes`
--
ALTER TABLE `periodes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `periodes_nama_unique` (`nama`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pertemuans`
--
ALTER TABLE `pertemuans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pertemuans_dibuat_oleh_user_id_foreign` (`dibuat_oleh_user_id`),
  ADD KEY `pertemuans_periode_id_foreign` (`periode_id`);

--
-- Indeks untuk tabel `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proposals_dibuat_oleh_user_id_foreign` (`dibuat_oleh_user_id`),
  ADD KEY `proposals_current_reviewer_id_foreign` (`current_reviewer_id`),
  ADD KEY `proposals_periode_id_foreign` (`periode_id`);

--
-- Indeks untuk tabel `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswas_user_id_foreign` (`user_id`),
  ADD KEY `siswas_kelas_id_foreign` (`kelas_id`);

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tugas_kelas_id_foreign` (`kelas_id`),
  ADD KEY `tugas_guru_id_foreign` (`guru_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensis`
--
ALTER TABLE `absensis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT untuk tabel `anggotas`
--
ALTER TABLE `anggotas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jawabans`
--
ALTER TABLE `jawabans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kas_anggotas`
--
ALTER TABLE `kas_anggotas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `keuangans`
--
ALTER TABLE `keuangans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT untuk tabel `lpjs`
--
ALTER TABLE `lpjs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mapels`
--
ALTER TABLE `mapels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `materis`
--
ALTER TABLE `materis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `orangtuas`
--
ALTER TABLE `orangtuas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `orangtua_siswas`
--
ALTER TABLE `orangtua_siswas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengaturans`
--
ALTER TABLE `pengaturans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengaturan_danas`
--
ALTER TABLE `pengaturan_danas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `pengumumans`
--
ALTER TABLE `pengumumans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengumuman_sekolahs`
--
ALTER TABLE `pengumuman_sekolahs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `periodes`
--
ALTER TABLE `periodes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pertemuans`
--
ALTER TABLE `pertemuans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT untuk tabel `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensis`
--
ALTER TABLE `absensis`
  ADD CONSTRAINT `absensis_anggota_id_foreign` FOREIGN KEY (`anggota_id`) REFERENCES `anggotas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `absensis_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periodes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `absensis_pertemuan_id_foreign` FOREIGN KEY (`pertemuan_id`) REFERENCES `pertemuans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `anggotas`
--
ALTER TABLE `anggotas`
  ADD CONSTRAINT `anggotas_dibuat_oleh_user_id_foreign` FOREIGN KEY (`dibuat_oleh_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `anggotas_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periodes` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `gurus`
--
ALTER TABLE `gurus`
  ADD CONSTRAINT `gurus_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `gurus_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  ADD CONSTRAINT `jadwals_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwals_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jawabans`
--
ALTER TABLE `jawabans`
  ADD CONSTRAINT `jawabans_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jawabans_tugas_id_foreign` FOREIGN KEY (`tugas_id`) REFERENCES `tugas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kas_anggotas`
--
ALTER TABLE `kas_anggotas`
  ADD CONSTRAINT `kas_anggotas_anggota_id_foreign` FOREIGN KEY (`anggota_id`) REFERENCES `anggotas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kas_anggotas_dibuat_oleh_user_id_foreign` FOREIGN KEY (`dibuat_oleh_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kas_anggotas_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periodes` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `gurus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kelas_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `keuangans`
--
ALTER TABLE `keuangans`
  ADD CONSTRAINT `keuangans_kas_anggota_id_foreign` FOREIGN KEY (`kas_anggota_id`) REFERENCES `kas_anggotas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `keuangans_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periodes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `keuangans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lpjs`
--
ALTER TABLE `lpjs`
  ADD CONSTRAINT `lpjs_current_reviewer_id_foreign` FOREIGN KEY (`current_reviewer_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `lpjs_dibuat_oleh_user_id_foreign` FOREIGN KEY (`dibuat_oleh_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lpjs_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periodes` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mapels`
--
ALTER TABLE `mapels`
  ADD CONSTRAINT `mapels_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `materis`
--
ALTER TABLE `materis`
  ADD CONSTRAINT `materis_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `gurus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `materis_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `orangtuas`
--
ALTER TABLE `orangtuas`
  ADD CONSTRAINT `orangtuas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `orangtua_siswas`
--
ALTER TABLE `orangtua_siswas`
  ADD CONSTRAINT `orangtua_siswas_orangtua_id_foreign` FOREIGN KEY (`orangtua_id`) REFERENCES `orangtuas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orangtua_siswas_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengaturan_danas`
--
ALTER TABLE `pengaturan_danas`
  ADD CONSTRAINT `pengaturan_danas_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periodes` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pertemuans`
--
ALTER TABLE `pertemuans`
  ADD CONSTRAINT `pertemuans_dibuat_oleh_user_id_foreign` FOREIGN KEY (`dibuat_oleh_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pertemuans_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periodes` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `proposals`
--
ALTER TABLE `proposals`
  ADD CONSTRAINT `proposals_current_reviewer_id_foreign` FOREIGN KEY (`current_reviewer_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `proposals_dibuat_oleh_user_id_foreign` FOREIGN KEY (`dibuat_oleh_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proposals_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periodes` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswas`
--
ALTER TABLE `siswas`
  ADD CONSTRAINT `siswas_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `gurus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tugas_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
