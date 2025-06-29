-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2025 at 03:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensis`
--

CREATE TABLE `absensis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pertemuan_id` bigint(20) UNSIGNED NOT NULL,
  `anggota_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('Hadir','Tidak Hadir','Izin') NOT NULL DEFAULT 'Hadir',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absensis`
--

INSERT INTO `absensis` (`id`, `pertemuan_id`, `anggota_id`, `status`, `created_at`, `updated_at`) VALUES
(38, 25, 14, 'Hadir', '2025-05-04 08:43:46', '2025-05-04 08:43:46'),
(39, 25, 15, 'Tidak Hadir', '2025-05-04 08:43:46', '2025-05-04 08:43:46'),
(40, 25, 17, 'Tidak Hadir', '2025-05-04 08:43:46', '2025-05-04 08:43:46'),
(41, 25, 18, 'Hadir', '2025-05-04 08:43:46', '2025-05-04 08:43:46'),
(42, 26, 12, 'Hadir', '2025-05-06 13:10:14', '2025-05-06 13:10:14'),
(43, 26, 16, 'Tidak Hadir', '2025-05-06 13:10:14', '2025-05-06 13:10:14'),
(44, 26, 19, 'Hadir', '2025-05-06 13:10:14', '2025-05-06 13:10:14'),
(57, 26, 20, 'Hadir', '2025-05-10 12:15:36', '2025-05-10 12:15:36'),
(62, 31, 12, 'Hadir', '2025-05-10 14:37:09', '2025-05-10 14:37:09'),
(63, 31, 16, 'Hadir', '2025-05-10 14:37:09', '2025-05-10 14:37:09'),
(64, 31, 19, 'Hadir', '2025-05-10 14:37:09', '2025-05-10 14:37:09'),
(65, 31, 20, 'Hadir', '2025-05-10 14:37:09', '2025-05-10 14:37:09'),
(66, 32, 14, 'Hadir', '2025-05-10 15:09:13', '2025-05-10 15:09:13'),
(67, 32, 15, 'Hadir', '2025-05-10 15:09:13', '2025-05-10 15:09:13'),
(68, 32, 17, 'Hadir', '2025-05-10 15:09:13', '2025-05-10 15:09:13'),
(69, 32, 18, 'Hadir', '2025-05-10 15:09:13', '2025-05-10 15:09:13'),
(70, 33, 12, 'Hadir', '2025-05-12 01:51:03', '2025-05-12 01:51:03'),
(71, 33, 16, 'Izin', '2025-05-12 01:51:03', '2025-05-12 01:51:03'),
(72, 33, 19, 'Tidak Hadir', '2025-05-12 01:51:03', '2025-05-12 01:51:03'),
(73, 33, 20, 'Hadir', '2025-05-12 01:51:03', '2025-05-12 01:51:03'),
(79, 35, 14, 'Izin', '2025-06-11 07:00:21', '2025-06-11 07:00:21'),
(80, 35, 15, 'Tidak Hadir', '2025-06-11 07:00:21', '2025-06-11 07:00:21'),
(81, 35, 17, 'Hadir', '2025-06-11 07:00:21', '2025-06-11 07:00:21'),
(82, 35, 18, 'Hadir', '2025-06-11 07:00:22', '2025-06-11 07:00:22'),
(83, 35, 21, 'Hadir', '2025-06-11 07:00:22', '2025-06-11 07:00:22'),
(84, 35, 22, 'Hadir', '2025-06-11 07:00:22', '2025-06-11 07:00:22'),
(85, 36, 14, 'Hadir', '2025-06-12 07:42:00', '2025-06-12 07:42:00'),
(86, 36, 15, 'Tidak Hadir', '2025-06-12 07:42:00', '2025-06-12 07:42:00'),
(87, 36, 17, 'Izin', '2025-06-12 07:42:00', '2025-06-12 07:42:00'),
(88, 36, 18, 'Hadir', '2025-06-12 07:42:00', '2025-06-12 07:42:00'),
(89, 36, 21, 'Hadir', '2025-06-12 07:42:00', '2025-06-12 07:42:00'),
(90, 36, 22, 'Hadir', '2025-06-12 07:42:00', '2025-06-12 07:42:00'),
(91, 36, 23, 'Hadir', '2025-06-12 07:42:00', '2025-06-12 07:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `anggotas`
--

CREATE TABLE `anggotas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` varchar(255) DEFAULT NULL,
  `prodi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dibuat_oleh_user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggotas`
--

INSERT INTO `anggotas` (`id`, `nama`, `nim`, `prodi`, `created_at`, `updated_at`, `dibuat_oleh_user_id`) VALUES
(12, 'MAULANA ADITYA', '23102017', 'S1 Fisioterapi', '2025-05-01 05:14:39', '2025-05-01 05:14:39', 14),
(14, 'MAULANA ADITYA', '23102017', 'S1 INFORMATIKA', '2025-05-01 05:42:31', '2025-05-01 05:42:31', 4),
(15, 'Nadia Qotrunada Shalshabila', '23102017', 'S1 INFORMATIKA', '2025-05-01 06:10:32', '2025-05-01 06:10:32', 4),
(16, 'Nadia Qotrunada Shalshabila', '23102017', 'S1 INFORMATIKA', '2025-05-02 05:07:51', '2025-05-02 05:07:51', 14),
(17, 'Robiatul Adawiyah', '23102017', 'S1 Fisioterapi', '2025-05-02 06:35:33', '2025-05-02 06:35:33', 4),
(18, 'Araya', '23102017', 'S1 Fisioterapi', '2025-05-02 13:30:53', '2025-05-02 13:30:53', 4),
(19, 'Ardhan Aghsal Dwi Putra', '23102011', 'Informatika', '2025-05-02 23:49:27', '2025-05-02 23:49:27', 14),
(20, 'Araya', '23102017', 'S1 Fisioterapi', '2025-05-08 07:11:04', '2025-05-08 07:11:04', 14),
(21, 'syahwa wahyu s', '231001', 'fisioterapi', '2025-06-04 06:37:39', '2025-06-04 06:37:39', 4),
(22, 'Nadia Qotrunada Shalshabila', '23102019', 'S1 INFORMATIKA', '2025-06-11 06:58:42', '2025-06-11 06:58:42', 4),
(23, 'Robiatul Adawiyah', '23102019', 'S1 INFORMATIKA', '2025-06-12 07:40:52', '2025-06-12 07:40:52', 4);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gurus`
--

CREATE TABLE `gurus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `mapel_id` bigint(20) UNSIGNED NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwals`
--

CREATE TABLE `jadwals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `mapel_id` bigint(20) UNSIGNED NOT NULL,
  `hari` varchar(255) NOT NULL,
  `dari_jam` time NOT NULL,
  `sampai_jam` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jawabans`
--

CREATE TABLE `jawabans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tugas_id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `jawaban` varchar(255) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jurusans`
--

CREATE TABLE `jurusans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusans`
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
-- Table structure for table `kas_anggotas`
--

CREATE TABLE `kas_anggotas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `anggota_id` bigint(20) UNSIGNED NOT NULL,
  `dibuat_oleh_user_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` enum('sudah','belum','menyicil') NOT NULL DEFAULT 'sudah',
  `tanggal` date NOT NULL DEFAULT '2025-05-02',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kas_anggotas`
--

INSERT INTO `kas_anggotas` (`id`, `anggota_id`, `dibuat_oleh_user_id`, `jumlah`, `status`, `tanggal`, `created_at`, `updated_at`) VALUES
(113, 12, 14, 5000, 'sudah', '2025-05-08', '2025-05-08 07:27:19', '2025-05-08 07:27:19'),
(114, 16, 14, 5000, 'sudah', '2025-05-08', '2025-05-08 07:27:19', '2025-05-08 07:27:19'),
(115, 19, 14, 5000, 'sudah', '2025-05-08', '2025-05-08 07:27:19', '2025-05-08 07:27:19'),
(116, 20, 14, 5000, 'belum', '2025-05-08', '2025-05-08 07:27:19', '2025-05-08 07:27:19'),
(137, 14, 4, 5000, 'belum', '2025-06-11', '2025-06-11 07:03:44', '2025-06-11 07:03:44'),
(138, 15, 4, 5000, 'belum', '2025-06-11', '2025-06-11 07:03:44', '2025-06-11 07:03:44'),
(139, 17, 4, 5000, 'belum', '2025-06-11', '2025-06-11 07:03:44', '2025-06-11 07:03:44'),
(140, 18, 4, 5000, 'sudah', '2025-06-11', '2025-06-11 07:03:44', '2025-06-11 07:03:44'),
(141, 21, 4, 3000, 'menyicil', '2025-06-11', '2025-06-11 07:03:44', '2025-06-11 07:04:26'),
(142, 22, 4, 5000, 'belum', '2025-06-11', '2025-06-11 07:03:44', '2025-06-11 07:03:44'),
(143, 14, 4, 5000, 'sudah', '2025-06-12', '2025-06-12 07:44:33', '2025-06-12 07:44:33'),
(144, 15, 4, 3000, 'menyicil', '2025-06-12', '2025-06-12 07:44:33', '2025-06-12 07:45:36'),
(145, 17, 4, 5000, 'sudah', '2025-06-12', '2025-06-12 07:44:33', '2025-06-12 07:44:33'),
(146, 18, 4, 2000, 'menyicil', '2025-06-12', '2025-06-12 07:44:33', '2025-06-12 07:46:19'),
(147, 21, 4, 5000, 'sudah', '2025-06-12', '2025-06-12 07:44:33', '2025-06-12 07:44:33'),
(148, 22, 4, 5000, 'belum', '2025-06-12', '2025-06-12 07:44:33', '2025-06-12 07:44:33'),
(149, 23, 4, 5000, 'sudah', '2025-06-12', '2025-06-12 07:44:33', '2025-06-12 07:44:33');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `jurusan_id` bigint(20) UNSIGNED NOT NULL,
  `guru_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keuangans`
--

CREATE TABLE `keuangans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kas_anggota_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jenis` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keuangans`
--

INSERT INTO `keuangans` (`id`, `user_id`, `kas_anggota_id`, `jenis`, `keterangan`, `tanggal`, `jumlah`, `created_at`, `updated_at`) VALUES
(66, 14, NULL, 'pemasukan', 'Kas HIMA', '2026-06-02', 2450000, '2025-05-04 02:30:10', '2025-05-04 02:30:10'),
(67, 14, NULL, 'pengeluaran', 'AIR PUTIH', '2025-05-28', 30000, '2025-05-04 04:58:07', '2025-05-04 04:58:07'),
(77, 14, NULL, 'pemasukan', 'sponsor', '2025-05-08', 1000000, '2025-05-08 07:14:24', '2025-05-08 07:14:24'),
(78, 14, 113, 'pemasukan', 'Pemasukan kas dari anggota', '2025-05-08', 15000, '2025-05-08 07:27:19', '2025-05-08 07:27:19'),
(85, 4, NULL, 'pemasukan', 'Kas HIMA', '2025-06-26', 200000, '2025-06-11 07:01:37', '2025-06-11 07:01:37'),
(86, 4, NULL, 'pengeluaran', 'AIR PUTIH', '2025-06-28', 50000, '2025-06-11 07:01:57', '2025-06-11 07:01:57'),
(87, 4, 140, 'pemasukan', 'Pemasukan kas dari anggota', '2025-06-11', 8000, '2025-06-11 07:03:44', '2025-06-11 07:04:26'),
(88, 4, NULL, 'pemasukan', 'sponsor', '2025-06-12', 300000, '2025-06-12 07:43:09', '2025-06-12 07:43:09'),
(89, 4, NULL, 'pengeluaran', 'AIR PUTIH', '2025-06-11', 100000, '2025-06-12 07:43:30', '2025-06-12 07:43:30'),
(90, 4, 143, 'pemasukan', 'Pemasukan kas dari anggota', '2025-06-12', 25000, '2025-06-12 07:44:33', '2025-06-12 07:46:19');

-- --------------------------------------------------------

--
-- Table structure for table `lpjs`
--

CREATE TABLE `lpjs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul_kegiatan` varchar(255) NOT NULL,
  `ormawa` varchar(255) NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `file_lpj` varchar(255) NOT NULL,
  `dibuat_oleh_user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending_admin','revisi_admin','pending_pembina','revisi_pembina','pending_kaprodi','revisi_kaprodi','pending_kemahasiswaan','revisi_kemahasiswaan','pending_wr3','revisi_wr3','acc_final') NOT NULL DEFAULT 'pending_admin',
  `current_reviewer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `catatan_revisi` text DEFAULT NULL,
  `ttd_pembina` varchar(255) DEFAULT NULL,
  `ttd_kemahasiswaan` varchar(255) DEFAULT NULL,
  `ttd_kaprodi` varchar(255) DEFAULT NULL,
  `ttd_wr3` varchar(255) DEFAULT NULL,
  `file_revisi` varchar(255) DEFAULT NULL,
  `total_dana` int(11) NOT NULL DEFAULT 9000000,
  `sisa_dana` int(11) NOT NULL DEFAULT 9000000,
  `total_keseluruhan` int(11) NOT NULL DEFAULT 0,
  `file_lpj_pdf` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dokumentasi_paths` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`dokumentasi_paths`)),
  `nota_paths` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`nota_paths`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lpjs`
--

INSERT INTO `lpjs` (`id`, `judul_kegiatan`, `ormawa`, `prodi`, `file_lpj`, `dibuat_oleh_user_id`, `status`, `current_reviewer_id`, `catatan_revisi`, `ttd_pembina`, `ttd_kemahasiswaan`, `ttd_kaprodi`, `ttd_wr3`, `file_revisi`, `total_dana`, `sisa_dana`, `total_keseluruhan`, `file_lpj_pdf`, `created_at`, `updated_at`, `dokumentasi_paths`, `nota_paths`) VALUES
(26, 'Pengabdian Masyarakat', 'himatif', 'informatika', 'storage/LPJ_1749529256.docx', 4, 'pending_admin', 1, NULL, NULL, NULL, NULL, NULL, NULL, 9000000, 9000000, 6000, 'storage/lpj/LPJ_1749529256.pdf', '2025-06-10 04:21:04', '2025-06-10 04:21:04', '[\"storage\\/dokumentasi\\/QaHmkkd0iA4kiL046StDFDsUFFfdE1clYuGnvBzV.png\",\"storage\\/dokumentasi\\/1Jq2jVj73pqzVyZc007t1GoCwsaOATBKYFHf7Qw8.png\",\"storage\\/dokumentasi\\/0YMpvIoXDY2drlZPMKLkbQVTwiZoUpYdWBCf1y99.png\"]', '[\"storage\\/nota\\/MaDbDhPT73BueSMkxCUNAHwAhrUl55gC8gLPbvRv.png\",\"storage\\/nota\\/rmlDSfPSwvOoebiFhHxnuyU9XrXKZunadspByhCM.png\",\"storage\\/nota\\/TDVwhMQPNB2jIPdpI1r6LYjo9C9xkLPanQzpZbOy.png\"]'),
(27, 'Pengabdian Masyarakat', 'himatif', 'informatika', 'storage/LPJ_1749625027.docx', 4, 'pending_admin', 1, NULL, NULL, NULL, NULL, NULL, NULL, 9000000, 9000000, 8000, 'storage/lpj/LPJ_1749625027.pdf', '2025-06-11 06:57:10', '2025-06-11 06:57:10', '[\"storage\\/dokumentasi\\/yN320CWg7XoZkYPscKI0QfHX7JTBJOTxV4b5ijHO.jpg\",\"storage\\/dokumentasi\\/dnt4Y1Rm9iTZNuQuU2skjYWlyeYlMH6lLLtKv6ba.jpg\"]', '[\"storage\\/nota\\/4EvD64cXEzmGVkGmFQGlICPJ8nAXRKgoNXL86ncF.jpg\",\"storage\\/nota\\/VhhlF1ner8oSvycSjPaZGY06dppF2qt5Jcl9KEug.jpg\"]');

-- --------------------------------------------------------

--
-- Table structure for table `mapels`
--

CREATE TABLE `mapels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_mapel` varchar(255) NOT NULL,
  `jurusan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materis`
--

CREATE TABLE `materis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `guru_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
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
(56, '2025_05_11_082217_add_dokumentasi_nota_to_lpjs_table', 37);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('02eb52da-55de-4aa2-838a-35ed7c47cd13', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":119,\"judul\":null,\"next_role\":\"Proposal baru \'Dies Natalis Hima Fisoterapi\' telah diajukan oleh HIMA FISIOTERAPI.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Dies Natalis Hima Fisoterapi\' telah diajukan oleh HIMA FISIOTERAPI..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27dies%20natalis%20hima%20fisoterapi%27%20telah%20diajukan%20oleh%20hima%20fisioterapi.&id=119\"}', '2025-05-11 23:48:47', '2025-05-11 23:44:55', '2025-05-11 23:48:47'),
('047461fc-cbb3-4427-bb69-fa2650a7fbde', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 10, '{\"proposal_id\":123,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20pembina.&id=123\"}', NULL, '2025-05-27 01:12:12', '2025-05-27 01:12:12'),
('0e3c355a-6fc3-45af-82b6-7b6d0578fc3b', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 13, '{\"proposal_id\":125,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Kaprodi.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Kaprodi..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20kaprodi.&id=125\"}', NULL, '2025-06-04 06:57:48', '2025-06-04 06:57:48'),
('1206a037-a5af-4417-b238-6e6c5c7d0259', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 12, '{\"proposal_id\":125,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Warek III.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Warek III..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20warek%20iii.&id=125\"}', NULL, '2025-06-04 07:00:35', '2025-06-04 07:00:35'),
('12367f9f-1c09-48b3-b578-209762b27cee', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":129,\"judul\":null,\"next_role\":\"Proposal baru \'Dies Natalis Hima Informatika\' telah diajukan oleh HIMA INFORMATIKA.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Dies Natalis Hima Informatika\' telah diajukan oleh HIMA INFORMATIKA..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27dies%20natalis%20hima%20informatika%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=129\"}', NULL, '2025-06-12 07:36:48', '2025-06-12 07:36:48'),
('19c4b66c-316b-4d69-aed7-1d0e99d52216', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":126,\"judul\":null,\"next_role\":\"Proposal baru \'Dies Natalis Hima Fisoterapi\' telah diajukan oleh HIMA INFORMATIKA.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Dies Natalis Hima Fisoterapi\' telah diajukan oleh HIMA INFORMATIKA..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27dies%20natalis%20hima%20fisoterapi%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=126\"}', '2025-06-10 04:19:44', '2025-06-10 04:18:06', '2025-06-10 04:19:44'),
('1b2763dc-f989-4b90-b65b-2f2a36f68d9d', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 11, '{\"proposal_id\":122,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Kemahasiswaan.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Kemahasiswaan..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20kemahasiswaan.&id=122\"}', NULL, '2025-05-27 13:01:42', '2025-05-27 13:01:42'),
('1cad76bb-20de-40ad-b4bf-9c789aace7e7', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":127,\"judul\":null,\"next_role\":\"Proposal baru \'Dies Natalis Hima Informatika\' telah diajukan oleh HIMA INFORMATIKA.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Dies Natalis Hima Informatika\' telah diajukan oleh HIMA INFORMATIKA..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27dies%20natalis%20hima%20informatika%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=127\"}', '2025-06-10 04:19:52', '2025-06-10 04:18:48', '2025-06-10 04:19:52'),
('1e0a2435-8dcc-4b85-bb64-d7eda8e8b85a', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 16, '{\"proposal_id\":122,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20pembina.&id=122\"}', '2025-05-27 03:12:29', '2025-05-12 05:32:43', '2025-05-27 03:12:29'),
('25f77dfe-6fc1-4654-84e2-c22ea6f51c35', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":123,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' dikembalikan untuk revisi oleh Admin.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' dikembalikan untuk revisi oleh Admin..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20dikembalikan%20untuk%20revisi%20oleh%20admin.&id=123\"}', '2025-06-10 04:19:49', '2025-05-27 12:48:13', '2025-06-10 04:19:49'),
('260ca8a4-2dee-4c93-ae1b-aca467e6f423', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":123,\"judul\":null,\"next_role\":\"Proposal baru \'Dies Natalis Hima Fisoterapi\' telah diajukan oleh HIMA INFORMATIKA.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Dies Natalis Hima Fisoterapi\' telah diajukan oleh HIMA INFORMATIKA..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27dies%20natalis%20hima%20fisoterapi%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=123\"}', '2025-05-14 07:57:03', '2025-05-12 08:40:33', '2025-05-14 07:57:03'),
('37a3b39d-88b2-49b3-b7bf-1add13729cd8', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":122,\"judul\":null,\"next_role\":\"Proposal baru \'Dies Natalis Hima Fisoterapi\' telah diajukan oleh HIMA FISIOTERAPI.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Dies Natalis Hima Fisoterapi\' telah diajukan oleh HIMA FISIOTERAPI..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27dies%20natalis%20hima%20fisoterapi%27%20telah%20diajukan%20oleh%20hima%20fisioterapi.&id=122\"}', '2025-05-14 07:57:05', '2025-05-12 05:32:09', '2025-05-14 07:57:05'),
('40c4cc99-84fb-4c66-a814-19eddc91acc1', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 12, '{\"proposal_id\":126,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Warek III.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Warek III..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20warek%20iii.&id=126\"}', NULL, '2025-06-12 03:34:13', '2025-06-12 03:34:13'),
('4731560c-6a9a-4b7b-95f1-4872748a990a', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 19, '{\"proposal_id\":122,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Kaprodi.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Kaprodi..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20kaprodi.&id=122\"}', NULL, '2025-05-27 12:41:57', '2025-05-27 12:41:57'),
('49f51172-d478-4d03-8981-b54c284104fa', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":120,\"judul\":null,\"next_role\":\"Proposal baru \'Dies Natalis Hima Fisoterapi\' telah diajukan oleh HIMA INFORMATIKA.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Dies Natalis Hima Fisoterapi\' telah diajukan oleh HIMA INFORMATIKA..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27dies%20natalis%20hima%20fisoterapi%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=120\"}', '2025-05-12 03:27:33', '2025-05-12 01:52:09', '2025-05-12 03:27:33'),
('4fa82612-1814-4022-8e51-584e3c62f581', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 10, '{\"proposal_id\":126,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20pembina.&id=126\"}', NULL, '2025-06-10 04:33:21', '2025-06-10 04:33:21'),
('55609bdf-5115-46a6-917d-80b941406355', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 10, '{\"proposal_id\":125,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20pembina.&id=125\"}', NULL, '2025-06-04 06:51:48', '2025-06-04 06:51:48'),
('5bf0302f-8ef4-4be0-98ea-014ec573ac31', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":124,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' telah direvisi oleh Pembina dan dikembalikan ke Admin.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' telah direvisi oleh Pembina dan dikembalikan ke Admin..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20telah%20direvisi%20oleh%20pembina%20dan%20dikembalikan%20ke%20admin.&id=124\"}', '2025-05-27 12:47:52', '2025-05-27 12:45:40', '2025-05-27 12:47:52'),
('5e6e01a8-7eb3-459e-9f8d-c3bc35662e51', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 12, '{\"proposal_id\":122,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Warek III.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Warek III..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20warek%20iii.&id=122\"}', NULL, '2025-05-27 13:34:00', '2025-05-27 13:34:00'),
('5e998fb2-6d0e-497c-9b52-02817b3359c5', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":124,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' telah direvisi oleh Pembina dan dikembalikan ke Admin.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' telah direvisi oleh Pembina dan dikembalikan ke Admin..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20telah%20direvisi%20oleh%20pembina%20dan%20dikembalikan%20ke%20admin.&id=124\"}', '2025-05-27 12:47:53', '2025-05-27 12:44:10', '2025-05-27 12:47:53'),
('698d5bd7-6273-4669-a740-dcf75c735ce1', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 11, '{\"proposal_id\":126,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Kemahasiswaan.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Kemahasiswaan..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20kemahasiswaan.&id=126\"}', NULL, '2025-06-10 09:42:23', '2025-06-10 09:42:23'),
('6c8ce283-eba3-4812-b08a-b7499b758ed2', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":125,\"judul\":null,\"next_role\":\"Proposal baru \'Dies Natalis Hima Fisoterapi\' telah diajukan oleh HIMA INFORMATIKA.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Dies Natalis Hima Fisoterapi\' telah diajukan oleh HIMA INFORMATIKA..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27dies%20natalis%20hima%20fisoterapi%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=125\"}', '2025-06-10 04:19:47', '2025-06-04 06:32:08', '2025-06-10 04:19:47'),
('6faa3d25-8bbf-4f85-97b9-fc4053a156e4', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":128,\"judul\":null,\"next_role\":\"Proposal baru \'Dies Natalis Hima Informatika\' telah diajukan oleh HIMA INFORMATIKA.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Dies Natalis Hima Informatika\' telah diajukan oleh HIMA INFORMATIKA..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27dies%20natalis%20hima%20informatika%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=128\"}', NULL, '2025-06-11 06:53:47', '2025-06-11 06:53:47'),
('700ccc1a-1ac4-4514-bba6-d192cd6e1223', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 10, '{\"proposal_id\":119,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20pembina.&id=119\"}', '2025-05-12 01:55:03', '2025-05-11 23:48:38', '2025-05-12 01:55:03'),
('748327b7-c3b8-4102-b2ab-f7f6da1001e2', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":124,\"judul\":null,\"next_role\":\"Proposal baru \'Dies Natalis Hima Fisoterapi\' telah diajukan oleh HIMA INFORMATIKA.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Dies Natalis Hima Fisoterapi\' telah diajukan oleh HIMA INFORMATIKA..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27dies%20natalis%20hima%20fisoterapi%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=124\"}', '2025-05-27 12:46:33', '2025-05-27 02:27:57', '2025-05-27 12:46:33'),
('837a2062-e583-4ad8-94fe-f4d6f33b025c', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 10, '{\"proposal_id\":124,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20pembina.&id=124\"}', NULL, '2025-05-27 02:29:07', '2025-05-27 02:29:07'),
('8fab4da4-a63c-4443-8840-685ac89b4255', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 11, '{\"proposal_id\":125,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Kemahasiswaan.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Kemahasiswaan..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20kemahasiswaan.&id=125\"}', NULL, '2025-06-04 06:58:44', '2025-06-04 06:58:44'),
('9fa41850-8000-4e28-a5fe-c7e127fb8951', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 10, '{\"proposal_id\":130,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Informatika\' siap ditinjau oleh Pembina.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Informatika\' siap ditinjau oleh Pembina..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20informatika%27%20siap%20ditinjau%20oleh%20pembina.&id=130\"}', NULL, '2025-06-12 07:51:44', '2025-06-12 07:51:44'),
('a6d99547-511c-4267-b56e-c40c767f8a0a', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 10, '{\"proposal_id\":118,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20pembina.&id=118\"}', '2025-05-12 01:55:05', '2025-05-12 01:53:21', '2025-05-12 01:55:05'),
('a7742a3b-f05a-4962-968b-7ce29fccfb27', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":130,\"judul\":null,\"next_role\":\"Proposal baru \'Dies Natalis Hima Informatika\' telah diajukan oleh HIMA INFORMATIKA.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Dies Natalis Hima Informatika\' telah diajukan oleh HIMA INFORMATIKA..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27dies%20natalis%20hima%20informatika%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=130\"}', NULL, '2025-06-12 07:50:09', '2025-06-12 07:50:09'),
('a7e7a10f-157b-4259-aef5-89b91757f1de', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":124,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' telah direvisi oleh Pembina dan dikembalikan ke Admin.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' telah direvisi oleh Pembina dan dikembalikan ke Admin..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20telah%20direvisi%20oleh%20pembina%20dan%20dikembalikan%20ke%20admin.&id=124\"}', '2025-05-27 12:47:50', '2025-05-27 12:45:58', '2025-05-27 12:47:50'),
('ab6807a3-408b-40ca-a4d8-920d2b630177', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 4, '{\"proposal_id\":125,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' sudah disetujui.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' sudah disetujui..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20sudah%20disetujui.&id=125\"}', NULL, '2025-06-04 07:01:06', '2025-06-04 07:01:06'),
('b2c78e85-a2c8-4d58-b4d2-f3cb685ed1b0', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 13, '{\"proposal_id\":126,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Kaprodi.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Kaprodi..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20kaprodi.&id=126\"}', NULL, '2025-06-10 04:47:21', '2025-06-10 04:47:21'),
('c5fb5061-dd38-4a16-be5c-b3044af4543c', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 4, '{\"proposal_id\":127,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Informatika\' dikembalikan untuk revisi oleh Admin.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Informatika\' dikembalikan untuk revisi oleh Admin..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20informatika%27%20dikembalikan%20untuk%20revisi%20oleh%20admin.&id=127\"}', NULL, '2025-06-10 04:33:38', '2025-06-10 04:33:38'),
('d54d1995-5480-452c-8256-858347092d4b', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 1, '{\"proposal_id\":121,\"judul\":null,\"next_role\":\"Proposal baru \'Dies Natalis Hima Fisoterapi\' telah diajukan oleh HIMA INFORMATIKA.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal baru \'Dies Natalis Hima Fisoterapi\' telah diajukan oleh HIMA INFORMATIKA..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20baru%20%27dies%20natalis%20hima%20fisoterapi%27%20telah%20diajukan%20oleh%20hima%20informatika.&id=121\"}', '2025-05-12 05:31:33', '2025-05-12 05:29:51', '2025-05-12 05:31:33'),
('dc0accf1-95b7-43cc-8cfc-f50d378b5103', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 14, '{\"proposal_id\":122,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' sudah disetujui.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' sudah disetujui..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20sudah%20disetujui.&id=122\"}', NULL, '2025-05-27 13:34:54', '2025-05-27 13:34:54'),
('de4c081e-b95d-4d33-9d48-b04f360a2e3b', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 4, '{\"proposal_id\":126,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' sudah disetujui.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' sudah disetujui..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20sudah%20disetujui.&id=126\"}', NULL, '2025-06-12 03:44:52', '2025-06-12 03:44:52'),
('dfb708ba-f9ca-448a-86b4-5ff8a2c91fba', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 16, '{\"proposal_id\":122,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20pembina.&id=122\"}', '2025-05-27 03:12:27', '2025-05-27 01:12:06', '2025-05-27 03:12:27'),
('ede40f3f-6404-4deb-9bdb-a8bcf38341ed', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 13, '{\"proposal_id\":130,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Informatika\' siap ditinjau oleh Kaprodi.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Informatika\' siap ditinjau oleh Kaprodi..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20informatika%27%20siap%20ditinjau%20oleh%20kaprodi.&id=130\"}', NULL, '2025-06-12 07:52:29', '2025-06-12 07:52:29'),
('f9df9963-7aff-4938-8b73-60f781f2b680', 'App\\Notifications\\ProposalStatusChanged', 'App\\Models\\User', 10, '{\"proposal_id\":126,\"judul\":null,\"next_role\":\"Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina.\",\"message\":\"Proposal \\u201c\\u201d siap diproses oleh Proposal \'Dies Natalis Hima Fisoterapi\' siap ditinjau oleh Pembina..\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/siswa\\/proposal\\/list?role=proposal%20%27dies%20natalis%20hima%20fisoterapi%27%20siap%20ditinjau%20oleh%20pembina.&id=126\"}', NULL, '2025-06-10 04:33:50', '2025-06-10 04:33:50');

-- --------------------------------------------------------

--
-- Table structure for table `orangtuas`
--

CREATE TABLE `orangtuas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orangtua_siswas`
--

CREATE TABLE `orangtua_siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orangtua_id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengaturans`
--

CREATE TABLE `pengaturans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengaturans`
--

INSERT INTO `pengaturans` (`id`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'SIOM', 'assets/img/p-250.png', '2025-03-06 13:40:02', '2025-04-30 02:14:12');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan_danas`
--

CREATE TABLE `pengaturan_danas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_awal` int(11) NOT NULL DEFAULT 9000000,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengaturan_danas`
--

INSERT INTO `pengaturan_danas` (`id`, `user_id`, `total_awal`, `created_at`, `updated_at`) VALUES
(1, 4, 9000000, '2025-04-28 23:09:01', '2025-04-30 15:42:12'),
(2, 14, 9000000, '2025-04-30 15:44:31', '2025-06-04 06:52:55');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman_sekolahs`
--

CREATE TABLE `pengumuman_sekolahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start_at` date NOT NULL,
  `end_at` date NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pertemuans`
--

CREATE TABLE `pertemuans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `pokok_bahasan` varchar(255) NOT NULL,
  `sub_pokok_bahasan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dibuat_oleh_user_id` bigint(20) UNSIGNED NOT NULL,
  `dokumentasi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pertemuans`
--

INSERT INTO `pertemuans` (`id`, `tanggal`, `pokok_bahasan`, `sub_pokok_bahasan`, `created_at`, `updated_at`, `dibuat_oleh_user_id`, `dokumentasi`) VALUES
(23, '2025-04-11', 'INI PUNYA HIMATIF', NULL, '2025-04-30 15:36:52', '2025-04-30 15:36:52', 4, NULL),
(24, '2025-04-11', 'INI PUNYA HIMAFIS', NULL, '2025-04-30 15:37:26', '2025-04-30 15:37:26', 14, NULL),
(25, '2025-05-23', 'INI PUNYA HIMATIF 2', NULL, '2025-05-04 08:43:46', '2025-05-04 08:43:46', 4, NULL),
(26, '2025-05-17', 'Pembahasan Kegiatan', 'naisu', '2025-05-06 13:10:14', '2025-05-10 12:15:36', 14, NULL),
(31, '2025-05-17', 'takda', 'ada', '2025-05-10 14:37:09', '2025-05-10 14:37:09', 14, 'dokumentasi/5xA5rC5jB5cFmMMjwSVWI20yeuTzeJkIty0HYUHq.png'),
(32, '2025-05-16', 'INI PUNYA HIMATIF 3', 'Pandemi COVID-19 telah menciptakan tantangan besar bagi 212 negara yang terjangkit virus tersebut. Hingga hari Senin, 20 April 2020, WHO mencatat 2.245.872 total kasus terkonfirmasi dan korban meninggal sejumlah 152.707. Amerika Serikat (AS) tercatat sebagai negara dengan jumlah kasus terkonfirmasi (695.353) dan korban meninggal dunia (32.427), tertinggi di dunia. Sementara itu, jumlah kasus terkonfirmasi di Indonesia hingga Senin, 20 April 2020 adalah 6.575 dengan korban meninggal sebanyak 582 (berdasarkan data Kementerian Kesehatan). Sejauh ini, perhatian masyarakat terpaku pada penyebaran COVID-19 di berbagai provinsi di Indonesia. Bagaimana dengan situasi warga negara Indonesia (WNI) di luar negeri di tengah pandemi global COVID-19? Bagaimana politik luar negeri Indonesia dalam upaya memitigasi pandemi global COVID-19? Artikel ini akan mendeskripsikan hal-hal tersebut dengan ringkas.\r\n\r\nBerdasarkan keterangan Menteri Luar Negeri (Menlu) Retno L. P. Marsudi pada tahun 2016, jumlah WNI di luar negeri yang tercatat di Kementerian Luar Negeri (Kemlu) adalah sebanyak 2,7 juta. Namun angka sebenarnya diperkirakan sekitar 4,3 juta. Data tersebut sudah tentu berubah pada tahun 2020. Terlepas dari pertanyaan berapa jumlah tercatat dan riil saat ini, isu yang perlu diperhatikan dengan saksama adalah kondisi WNI di luar negeri di tengah pandemi global COVID-19. Pada hari Kamis, 9 April 2020, Menlu Retno telah menyatakan bahwa fokus pemerintah sekarang adalah memberikan perlindungan bagi WNI di luar negeri dan memfasilitasi kerja sama internasional. Jumlah kasus terkonfirmasi di kalangan WNI di luar negeri sampai hari Senin, 20 April 2020 adalah sebanyak 473. Kasus sembuh mencapai 109 dan meninggal dunia 19.', '2025-05-10 15:09:13', '2025-05-10 15:09:13', 4, 'dokumentasi/nykvnCL47IEzOMQGWU9jyD8YhMo6HCTMEwsBb6Lw.jpg'),
(33, '2025-05-13', 'Buka Bersama HIMA Informatika 2024/2025', 'mencoba', '2025-05-12 01:51:03', '2025-05-12 01:51:03', 14, 'dokumentasi/NMYzvUibP6aMNUWH8iYckyjezgzBjPP8xxVr6qYX.jpg'),
(35, '2025-06-10', 'asw', 'jkj', '2025-06-11 07:00:21', '2025-06-11 07:00:21', 4, 'dokumentasi/a4BdZxwsWWWxlknhHhWUnzd97xuCxD8WhXzWMBuz.jpg'),
(36, '2025-06-13', 'Rapat 1', 'qdsqdqdq\r\ndqsdqddsq', '2025-06-12 07:42:00', '2025-06-12 07:54:54', 4, 'dokumentasi/FFOfpvoofrYlscZH6s23XHebJZPNKQEPN01DdRM8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE `proposals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul_kegiatan` varchar(255) NOT NULL,
  `ormawa` varchar(255) DEFAULT NULL,
  `prodi` varchar(255) DEFAULT NULL,
  `file_proposal` varchar(255) NOT NULL,
  `dibuat_oleh_user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending_admin','revisi_admin','pending_pembina','revisi_pembina','pending_kaprodi','revisi_kaprodi','pending_kemahasiswaan','revisi_kemahasiswaan','pending_wr3','revisi_wr3','acc_final') NOT NULL DEFAULT 'pending_admin',
  `current_reviewer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `catatan_revisi` text DEFAULT NULL,
  `ttd_pembina` varchar(255) DEFAULT NULL,
  `ttd_kemahasiswaan` varchar(255) DEFAULT NULL,
  `ttd_wr3` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file_revisi` varchar(255) DEFAULT NULL,
  `total_dana` int(11) NOT NULL DEFAULT 9000000,
  `sisa_dana` int(11) NOT NULL DEFAULT 9000000,
  `total_keseluruhan` int(11) NOT NULL DEFAULT 0,
  `ttd_kaprodi` varchar(255) DEFAULT NULL,
  `file_proposal_pdf` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proposals`
--

INSERT INTO `proposals` (`id`, `judul_kegiatan`, `ormawa`, `prodi`, `file_proposal`, `dibuat_oleh_user_id`, `status`, `current_reviewer_id`, `catatan_revisi`, `ttd_pembina`, `ttd_kemahasiswaan`, `ttd_wr3`, `created_at`, `updated_at`, `file_revisi`, `total_dana`, `sisa_dana`, `total_keseluruhan`, `ttd_kaprodi`, `file_proposal_pdf`) VALUES
(104, 'Dies Natalis Hima Fisoterapi', 'himafis', 'fisioterapi', 'storage/Perbaikan_Proposal_1746266671.docx', 14, 'acc_final', 14, NULL, 'tanda_tangan/pembina.png', 'tanda_tangan/kemahasiswaan.png', 'tanda_tangan/wr3.png', '2025-05-03 09:55:06', '2025-05-03 10:06:26', NULL, 9000000, 9000000, 80000, 'tanda_tangan/kaprodi.png', 'storage/proposal/Perbaikan_Proposal_1746266671.pdf'),
(109, 'Dies Natalis Hima Fisoterapi', 'himatif', 'informatika', 'storage/Proposal_1746283046.docx', 4, 'acc_final', 4, NULL, 'tanda_tangan/tanda_tangan_10.png', 'tanda_tangan/kemahasiswaan.png', 'tanda_tangan/wr3.png', '2025-05-03 14:37:30', '2025-05-08 07:39:04', NULL, 9000000, 9000000, 80000, 'tanda_tangan/ttd_kaprodi_13.png', 'storage/proposal/Proposal_1746283046.pdf'),
(122, 'Dies Natalis Hima Fisoterapi', 'himafis', 'fisioterapi', 'storage/Proposal_1747027926.docx', 14, 'acc_final', 14, NULL, 'tanda_tangan/tanda_tangan_16.png', 'tanda_tangan/kemahasiswaan.png', 'tanda_tangan/wr3.png', '2025-05-12 05:32:09', '2025-05-27 13:34:54', NULL, 9000000, 9000000, 80000, 'tanda_tangan/ttd_kaprodi_19.png', 'storage/proposal/Proposal_1747027926.pdf'),
(125, 'Dies Natalis Hima Fisoterapi', 'himatif', 'informatika', 'storage/Proposal_1749018716.docx', 4, 'acc_final', 4, NULL, 'tanda_tangan/tanda_tangan_10.png', 'tanda_tangan/kemahasiswaan.png', 'tanda_tangan/wr3.png', '2025-06-04 06:32:05', '2025-06-04 07:01:06', NULL, 9000000, 9000000, 100000, 'tanda_tangan/ttd_kaprodi_13.png', 'storage/proposal/Proposal_1749018716.pdf'),
(126, 'Dies Natalis Hima Fisoterapi', 'himatif', 'informatika', 'storage/Proposal_1749529062.docx', 4, 'acc_final', 4, NULL, 'tanda_tangan/tanda_tangan_10.png', 'tanda_tangan/kemahasiswaan.png', 'tanda_tangan/wr3.png', '2025-06-10 04:18:01', '2025-06-12 03:44:52', NULL, 9000000, 9000000, 80000, 'tanda_tangan/ttd_kaprodi_13.png', 'storage/proposal/Proposal_1749529062.pdf'),
(127, 'Dies Natalis Hima Informatika', 'himatif', 'informatika', 'storage/Proposal_1749529121.docx', 4, 'revisi_admin', 4, 'Kurang ganteng', NULL, NULL, NULL, '2025-06-10 04:18:48', '2025-06-10 04:33:37', NULL, 9000000, 9000000, 80000, NULL, 'storage/proposal/Proposal_1749529121.pdf'),
(128, 'Dies Natalis Hima Informatika', 'himatif', 'informatika', 'storage/Proposal_1749624814.docx', 4, 'pending_admin', 1, NULL, NULL, NULL, NULL, '2025-06-11 06:53:45', '2025-06-11 06:53:45', NULL, 9000000, 9000000, 80000, NULL, 'storage/proposal/Proposal_1749624814.pdf'),
(129, 'Dies Natalis Hima Informatika', 'himatif', 'informatika', 'storage/Proposal_1749713785.docx', 4, 'pending_admin', 1, NULL, NULL, NULL, NULL, '2025-06-12 07:36:45', '2025-06-12 07:36:45', NULL, 9000000, 9000000, 140000, NULL, 'storage/proposal/Proposal_1749713785.pdf'),
(130, 'Dies Natalis Hima Informatika', 'himatif', 'informatika', 'storage/Proposal_1749714604.docx', 4, 'pending_kaprodi', 13, NULL, 'tanda_tangan/tanda_tangan_10.png', NULL, NULL, '2025-06-12 07:50:08', '2025-06-12 07:52:29', NULL, 9000000, 9000000, 160000, NULL, 'storage/proposal/Proposal_1749714604.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nis` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `guru_id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `roles` varchar(255) NOT NULL,
  `ormawa` varchar(255) DEFAULT NULL,
  `prodi` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `nis` varchar(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ttd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `roles`, `ormawa`, `prodi`, `remember_token`, `nis`, `nip`, `created_at`, `updated_at`, `ttd`) VALUES
(1, 'Admin', 'admin@mail.com', NULL, '$2y$10$mukjLsx9N1xCRv73BvZQOOu72RwCo3STPGOtLdbiTdtTGm.mHM80.', 'admin', NULL, NULL, NULL, NULL, NULL, '2025-05-01 04:24:38', '2025-05-01 04:24:38', NULL),
(4, 'Hima Informatika', 'himatif@mail.com', NULL, '$2y$10$8fcdBHP8BC2Blx6NaPa0I.NjE6eNRxu3fx0k3os9l./EyIA59bdTK', 'siswa', 'himatif', 'informatika', NULL, '123454321', NULL, '2025-03-17 21:05:18', '2025-03-17 21:05:18', NULL),
(10, 'Pembina Himatif', 'pembinahimatif@mail.com', NULL, '$2y$10$kaIAKr5.RKkzzogJJVisnewwNWZTfbilr8ic/bWXSHeJRuQCvy2di', 'pembina', 'himatif', 'informatika', NULL, NULL, '111122223333', '2025-04-30 14:19:22', '2025-05-09 10:17:44', 'tanda_tangan/tanda_tangan_10.png'),
(11, 'Kemahasiswaan', 'kemahasiswaan@mail.com', NULL, '$2y$10$VrzUBziUfUfZ4ixssOstfOitHLQSReS2FFGcE178TLBf.Vk20/MgG', 'kemahasiswaan', NULL, NULL, NULL, NULL, '444455556666', '2025-05-01 04:24:39', '2025-05-01 04:24:39', NULL),
(12, 'Wakil Rektor 3', 'wr3@mail.com', NULL, '$2y$10$suF0a8O4ismMZYhmpYRIMe4vuQCSUZA5Pi72asFkjLvgS1GVP.74m', 'wr3', NULL, NULL, NULL, NULL, '777788889999', '2025-05-01 04:24:39', '2025-05-01 04:24:39', NULL),
(13, 'Kaprodi Informatika', 'kaproditif@mail.com', NULL, '$2y$10$pYjukMeTxO6sTa2qfDTyNOQDw/RclN4bRz3gZDaRdri9AEMD9ehYy', 'kaprodi', 'himatif', 'informatika', NULL, NULL, NULL, '2025-04-30 22:55:07', '2025-05-03 14:36:23', 'tanda_tangan/ttd_kaprodi_13.png'),
(14, 'Hima Fisioterapi', 'himafis@mail.com', NULL, '$2y$10$IYVVpetoOk1kGE4BO4WwfumZBvsu3EYRfL00WvUzeYX0lMlC38D9W', 'siswa', 'himafis', 'fisioterapi', NULL, NULL, NULL, '2025-05-01 04:24:39', '2025-05-01 04:24:39', NULL),
(16, 'Pembina Fisioterapi', 'pembinafis@mail.com', NULL, '$2y$10$v8Dc5Q4Guf.N3fo7EnJEIuF43IQiXgYHAgsHdH/W/HgJFEoNFjuwW', 'pembina', 'himafis', 'fisioterapi', NULL, NULL, NULL, '2025-05-01 04:24:39', '2025-05-27 12:41:05', 'tanda_tangan/tanda_tangan_16.png'),
(19, 'Kaprodi Fisioterapi', 'kaprodifis@mail.com', NULL, '$2y$10$FYYvnHHNFZ/XeD1j1d0UB.oJCEG4Ui67qtA/xyLqJo9giLoiCndue', 'kaprodi', 'himafis', 'fisioterapi', NULL, NULL, NULL, '2025-05-01 04:24:39', '2025-05-27 13:01:00', 'tanda_tangan/ttd_kaprodi_19.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensis`
--
ALTER TABLE `absensis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensis_pertemuan_id_foreign` (`pertemuan_id`),
  ADD KEY `absensis_anggota_id_foreign` (`anggota_id`);

--
-- Indexes for table `anggotas`
--
ALTER TABLE `anggotas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anggotas_dibuat_oleh_user_id_foreign` (`dibuat_oleh_user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gurus_user_id_foreign` (`user_id`),
  ADD KEY `gurus_mapel_id_foreign` (`mapel_id`);

--
-- Indexes for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwals_kelas_id_foreign` (`kelas_id`),
  ADD KEY `jadwals_mapel_id_foreign` (`mapel_id`);

--
-- Indexes for table `jawabans`
--
ALTER TABLE `jawabans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jawabans_tugas_id_foreign` (`tugas_id`),
  ADD KEY `jawabans_siswa_id_foreign` (`siswa_id`);

--
-- Indexes for table `jurusans`
--
ALTER TABLE `jurusans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kas_anggotas`
--
ALTER TABLE `kas_anggotas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kas_anggotas_anggota_id_foreign` (`anggota_id`),
  ADD KEY `kas_anggotas_dibuat_oleh_user_id_foreign` (`dibuat_oleh_user_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_jurusan_id_foreign` (`jurusan_id`),
  ADD KEY `kelas_guru_id_foreign` (`guru_id`);

--
-- Indexes for table `keuangans`
--
ALTER TABLE `keuangans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keuangans_user_id_foreign` (`user_id`),
  ADD KEY `keuangans_kas_anggota_id_foreign` (`kas_anggota_id`);

--
-- Indexes for table `lpjs`
--
ALTER TABLE `lpjs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lpjs_dibuat_oleh_user_id_foreign` (`dibuat_oleh_user_id`),
  ADD KEY `lpjs_current_reviewer_id_foreign` (`current_reviewer_id`);

--
-- Indexes for table `mapels`
--
ALTER TABLE `mapels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mapels_jurusan_id_foreign` (`jurusan_id`);

--
-- Indexes for table `materis`
--
ALTER TABLE `materis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materis_guru_id_foreign` (`guru_id`),
  ADD KEY `materis_kelas_id_foreign` (`kelas_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orangtuas`
--
ALTER TABLE `orangtuas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orangtuas_user_id_foreign` (`user_id`);

--
-- Indexes for table `orangtua_siswas`
--
ALTER TABLE `orangtua_siswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orangtua_siswas_orangtua_id_foreign` (`orangtua_id`),
  ADD KEY `orangtua_siswas_siswa_id_foreign` (`siswa_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pengaturans`
--
ALTER TABLE `pengaturans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaturan_danas`
--
ALTER TABLE `pengaturan_danas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pengaturan_danas_user_id_unique` (`user_id`);

--
-- Indexes for table `pengumuman_sekolahs`
--
ALTER TABLE `pengumuman_sekolahs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pertemuans`
--
ALTER TABLE `pertemuans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pertemuans_dibuat_oleh_user_id_foreign` (`dibuat_oleh_user_id`);

--
-- Indexes for table `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proposals_dibuat_oleh_user_id_foreign` (`dibuat_oleh_user_id`),
  ADD KEY `proposals_current_reviewer_id_foreign` (`current_reviewer_id`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswas_user_id_foreign` (`user_id`),
  ADD KEY `siswas_kelas_id_foreign` (`kelas_id`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tugas_kelas_id_foreign` (`kelas_id`),
  ADD KEY `tugas_guru_id_foreign` (`guru_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensis`
--
ALTER TABLE `absensis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `anggotas`
--
ALTER TABLE `anggotas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jawabans`
--
ALTER TABLE `jawabans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kas_anggotas`
--
ALTER TABLE `kas_anggotas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keuangans`
--
ALTER TABLE `keuangans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `lpjs`
--
ALTER TABLE `lpjs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `mapels`
--
ALTER TABLE `mapels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `materis`
--
ALTER TABLE `materis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `orangtuas`
--
ALTER TABLE `orangtuas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orangtua_siswas`
--
ALTER TABLE `orangtua_siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengaturans`
--
ALTER TABLE `pengaturans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengaturan_danas`
--
ALTER TABLE `pengaturan_danas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pengumuman_sekolahs`
--
ALTER TABLE `pengumuman_sekolahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pertemuans`
--
ALTER TABLE `pertemuans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensis`
--
ALTER TABLE `absensis`
  ADD CONSTRAINT `absensis_anggota_id_foreign` FOREIGN KEY (`anggota_id`) REFERENCES `anggotas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `absensis_pertemuan_id_foreign` FOREIGN KEY (`pertemuan_id`) REFERENCES `pertemuans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `anggotas`
--
ALTER TABLE `anggotas`
  ADD CONSTRAINT `anggotas_dibuat_oleh_user_id_foreign` FOREIGN KEY (`dibuat_oleh_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gurus`
--
ALTER TABLE `gurus`
  ADD CONSTRAINT `gurus_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `gurus_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD CONSTRAINT `jadwals_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwals_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jawabans`
--
ALTER TABLE `jawabans`
  ADD CONSTRAINT `jawabans_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jawabans_tugas_id_foreign` FOREIGN KEY (`tugas_id`) REFERENCES `tugas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kas_anggotas`
--
ALTER TABLE `kas_anggotas`
  ADD CONSTRAINT `kas_anggotas_anggota_id_foreign` FOREIGN KEY (`anggota_id`) REFERENCES `anggotas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kas_anggotas_dibuat_oleh_user_id_foreign` FOREIGN KEY (`dibuat_oleh_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `gurus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kelas_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `keuangans`
--
ALTER TABLE `keuangans`
  ADD CONSTRAINT `keuangans_kas_anggota_id_foreign` FOREIGN KEY (`kas_anggota_id`) REFERENCES `kas_anggotas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `keuangans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lpjs`
--
ALTER TABLE `lpjs`
  ADD CONSTRAINT `lpjs_current_reviewer_id_foreign` FOREIGN KEY (`current_reviewer_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `lpjs_dibuat_oleh_user_id_foreign` FOREIGN KEY (`dibuat_oleh_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mapels`
--
ALTER TABLE `mapels`
  ADD CONSTRAINT `mapels_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `materis`
--
ALTER TABLE `materis`
  ADD CONSTRAINT `materis_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `gurus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `materis_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orangtuas`
--
ALTER TABLE `orangtuas`
  ADD CONSTRAINT `orangtuas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orangtua_siswas`
--
ALTER TABLE `orangtua_siswas`
  ADD CONSTRAINT `orangtua_siswas_orangtua_id_foreign` FOREIGN KEY (`orangtua_id`) REFERENCES `orangtuas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orangtua_siswas_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pertemuans`
--
ALTER TABLE `pertemuans`
  ADD CONSTRAINT `pertemuans_dibuat_oleh_user_id_foreign` FOREIGN KEY (`dibuat_oleh_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `proposals`
--
ALTER TABLE `proposals`
  ADD CONSTRAINT `proposals_current_reviewer_id_foreign` FOREIGN KEY (`current_reviewer_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `proposals_dibuat_oleh_user_id_foreign` FOREIGN KEY (`dibuat_oleh_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `siswas`
--
ALTER TABLE `siswas`
  ADD CONSTRAINT `siswas_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `gurus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tugas_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
