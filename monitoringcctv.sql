-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Apr 2025 pada 08.49
-- Versi server: 10.4.17-MariaDB-log
-- Versi PHP: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoringcctv`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cctvs`
--

CREATE TABLE `cctvs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namaWilayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaTitik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'offline',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cctvs`
--

INSERT INTO `cctvs` (`id`, `namaWilayah`, `namaTitik`, `link`, `status`, `created_at`, `updated_at`) VALUES
(14, 'KOMINFO SLEMAN 1', 'Bundaran UGM 10', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=BundaranUGM1', 'offline', '2024-11-21 00:17:36', '2025-02-10 11:28:10'),
(15, 'KOMINFO SLEMAN 1', 'Bundaran UGM 2', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=BundaranUGM2', 'offline', '2024-11-21 00:18:18', '2024-11-21 00:18:18'),
(16, 'KOMINFO SLEMAN 1', 'Bundaran UGM 3', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=BundaranUGM3', 'offline', '2024-11-21 00:18:52', '2024-11-21 00:18:52'),
(17, 'KOMINFO SLEMAN 1', 'Flyofer Jombor B', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=FlyOverJomborBarat', 'offline', '2024-11-21 00:19:49', '2024-11-21 00:20:38'),
(18, 'KOMINFO SLEMAN 1', 'Flyofer Jombor T', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=FlyOverJomborTimur', 'offline', '2024-11-21 00:20:26', '2024-11-21 00:20:26'),
(19, 'KOMINFO SLEMAN 1', 'Flyofer Jombor U', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=FlyOverJomborUtara', 'offline', '2024-11-21 00:21:14', '2024-11-21 00:21:14'),
(20, 'KOMINFO SLEMAN 1', 'Perempatan Beran 1', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanBeran1', 'offline', '2024-11-21 00:21:49', '2024-11-21 00:21:49'),
(21, 'KOMINFO SLEMAN 1', 'Perempetan CondongCatur', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanCondongcatur', 'offline', '2024-11-21 00:22:57', '2024-11-21 00:22:57'),
(22, 'KOMINFO SLEMAN 1', 'Perempatan Demak Ijo 1', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanDemakIjo1', 'offline', '2024-11-21 00:23:31', '2024-11-21 00:23:31'),
(23, 'KOMINFO SLEMAN 1', 'Perempatan Demak Ijo 2', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanDemakIjo2', 'offline', '2024-11-21 00:24:47', '2024-11-21 00:24:47'),
(24, 'KOMINFO SLEMAN 1', 'Perempatan Demak Ijo 3', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanDemakIjo3', 'offline', '2024-11-21 00:25:25', '2024-11-21 00:25:25'),
(25, 'KOMINFO SLEMAN 1', 'Perempatan Godean 1', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanGodean1', 'offline', '2024-11-21 00:26:12', '2024-11-21 00:26:12'),
(26, 'KOMINFO SLEMAN 1', 'Perempatan Godean 2', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanGodean2', 'offline', '2024-11-21 00:26:52', '2024-11-21 00:26:52'),
(27, 'KOMINFO SLEMAN 1', 'Perempatan Kronggahan', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanKronggahan', 'offline', '2024-11-21 00:27:48', '2024-11-21 00:27:48'),
(28, 'KOMINFO SLEMAN 1', 'Perempatan Mojolali', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanMonjali', 'offline', '2024-11-21 00:28:45', '2024-11-21 00:28:45'),
(29, 'KOMINFO SLEMAN 2', 'Perempatan Munggur 1', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanMunggur1', 'offline', '2024-11-21 00:34:18', '2024-11-21 01:03:20'),
(30, 'KOMINFO SLEMAN 2', 'Perempatan Munggur 2', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanMunggur2', 'offline', '2024-11-21 00:35:40', '2024-11-21 00:35:40'),
(31, 'KOMINFO SLEMAN 2', 'Perempatan Pelemgurih 1', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanPelemgurih1', 'offline', '2024-11-21 01:03:08', '2024-11-21 01:03:08'),
(32, 'KOMINFO SLEMAN 2', 'Perempatan Pelemgurih 2', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanPelemgurih2', 'offline', '2024-11-21 01:04:17', '2024-11-21 01:04:17'),
(33, 'KOMINFO SLEMAN 2', 'Perempatan Pelemgurih 3', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanPelemgurih3', 'offline', '2024-11-21 01:05:12', '2024-11-21 01:05:12'),
(34, 'KOMINFO SLEMAN 2', 'Perempatan Seyegan', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanSeyegan', 'offline', '2024-11-21 01:06:03', '2024-11-21 01:06:03'),
(35, 'KOMINFO SLEMAN 2', 'Perempatan Tempel 1', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanTempel1', 'offline', '2024-11-21 01:06:48', '2024-11-21 01:06:48'),
(36, 'KOMINFO SLEMAN 2', 'Perempatan Tempel 2', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanTempel2', 'offline', '2024-11-21 01:07:37', '2024-11-21 01:07:37'),
(37, 'KOMINFO SLEMAN 2', 'Perempatan UPN 1', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanUPN1', 'offline', '2024-11-21 01:08:29', '2024-11-21 01:08:29'),
(38, 'KOMINFO SLEMAN 2', 'Perempatan UPN 2', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanUPN2', 'offline', '2024-11-21 01:09:13', '2024-11-21 01:09:25'),
(39, 'KOMINFO SLEMAN 2', 'Pertigaan Bantulan 1', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PertigaanBantulan1', 'offline', '2024-11-21 01:10:05', '2024-11-21 01:10:05'),
(40, 'KOMINFO SLEMAN 2', 'Pertigaan Bantulan 2', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PertigaanBantulan2', 'offline', '2024-11-21 01:10:38', '2024-11-21 01:10:38'),
(41, 'KOMINFO SLEMAN 2', 'Pertigaan Maguwo 1', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PertigaanMaguwo1', 'offline', '2024-11-21 01:11:26', '2024-11-21 01:11:26'),
(42, 'KOMINFO SLEMAN 2', 'Pertigaan Maguwo 2', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PertigaanMaguwo2', 'offline', '2024-11-21 01:12:01', '2024-11-21 01:12:01'),
(43, 'KOMINFO SLEMAN 2', 'Pertigaan Maguwo 3', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PertigaanMaguwo3', 'offline', '2024-11-21 01:12:42', '2024-11-21 01:12:42'),
(44, 'KOMINFO SLEMAN 3', 'Pertigaan Minggir', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PertigaanMinggir', 'offline', '2024-11-21 10:51:18', '2024-11-21 10:51:18'),
(45, 'KOMINFO SLEMAN 3', 'Pertigaan Pasar Gamping', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PertigaanPasarGamping', 'offline', '2024-11-21 10:51:46', '2024-11-21 10:51:46'),
(46, 'KOMINFO SLEMAN 3', 'Pertigaan Pasar Prambanan', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PertigaanPasarPrambanan', 'offline', '2024-11-21 10:52:29', '2024-11-21 10:52:29'),
(47, 'KOMINFO SLEMAN 3', 'Pertigaan UIN', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PertigaanUIN', 'offline', '2024-11-21 10:53:11', '2024-11-21 10:53:11'),
(48, 'KOMINFO SLEMAN 3', 'Pos Polisi Jombor', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PosPolisiJombor', 'offline', '2024-11-21 10:53:53', '2024-11-21 10:53:53'),
(49, 'Bantul 1', 'Makam Imogiri', 'http://103.255.15.227:5080/CCTVBANTUL/play.html?id=BarcodeBordessMakamImogiri', 'offline', '2024-11-24 03:09:27', '2024-11-28 12:00:24'),
(50, 'Sekolah', 'SMK2', 'rtmp://103.255.15.222:1935/cctv-sekolah/cctv_smk2yk_a106.stream', 'offline', '2025-02-10 11:16:23', '2025-02-10 11:16:23'),
(52, 'Sekolah22', 'CCTV_Sekolah', 'rtmp://103.255.15.222:1935/cctv-sekolah/cctv_smk2yk_tiangbendera.stream', 'offline', '2025-02-10 11:34:02', '2025-02-10 11:34:02'),
(53, 'SMK1Yogyakarta', 'CCTV_Aula1', 'http://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_smk1yk_aula', 'offline', '2025-02-10 12:02:58', '2025-02-10 12:02:58'),
(54, 'SMK1Yogyakarta', 'CCTV_Aula2', 'http://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_smk1yk_aula2', 'offline', '2025-02-10 12:03:14', '2025-02-10 12:03:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_10_072622_create_sekolah_table', 1),
(5, '2025_04_10_074031_create_cctvs_table', 1),
(6, '2025_04_10_085253_create_personal_access_tokens_table', 1),
(7, '2025_04_11_063919_create_panoramas_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `panorama`
--

CREATE TABLE `panorama` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namaWilayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaTitik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'offline',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `panorama`
--

INSERT INTO `panorama` (`id`, `namaWilayah`, `namaTitik`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'KOMINFO SLEMAN 1', 'Bundaran UGM 10', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=BundaranUGM1', 'offline', '2024-11-21 00:17:36', '2025-02-10 11:28:10'),
(2, 'KOMINFO SLEMAN 1', 'Bundaran UGM 2', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=BundaranUGM2', 'offline', '2024-11-21 00:18:18', '2024-11-21 00:18:18'),
(3, 'KOMINFO SLEMAN 1', 'Bundaran UGM 3', 'http://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_smk1yk_aula', 'offline', '2024-11-21 00:18:52', '2025-04-15 19:24:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'auth_token', '3a96fc0414d48a5ec68e59d3bbf14ec4cfb79f805e23ba2c853f2d974ee179bd', '[\"*\"]', NULL, NULL, '2025-04-15 19:23:31', '2025-04-15 19:23:31'),
(2, 'App\\Models\\User', 1, 'auth_token', 'b03aeef1792dbd6ec533f13e67f71297bfb036d4293de6280bb0eb50e81a0012', '[\"*\"]', NULL, NULL, '2025-04-15 23:48:00', '2025-04-15 23:48:00'),
(3, 'App\\Models\\User', 1, 'auth_token', '964166c9f44220a2830bae628c8b561566880bca86a04fa48cd29390f39feeef', '[\"*\"]', NULL, NULL, '2025-04-16 20:24:23', '2025-04-16 20:24:23'),
(4, 'App\\Models\\User', 1, 'auth_token', '5378d46268d3547698edf2581ef48a23e44591c12fd65482200d02a8c3409667', '[\"*\"]', NULL, NULL, '2025-04-16 20:24:24', '2025-04-16 20:24:24'),
(7, 'App\\Models\\User', 1, 'auth_token', 'dfbdd5dc92ed6b763455085be1419d5b2447cde78f65f42128febdb01bd9a8b9', '[\"*\"]', NULL, NULL, '2025-04-20 21:13:56', '2025-04-20 21:13:56'),
(8, 'App\\Models\\User', 1, 'auth_token', '64fb1cc71ac2bca7262f58137c641b0918318ee5c0c3675e33457eec16d8c012', '[\"*\"]', NULL, NULL, '2025-04-21 18:50:01', '2025-04-21 18:50:01'),
(10, 'App\\Models\\User', 1, 'auth_token', 'd84595ff63b54c641d23db46a41e0c208fb81c8c27e38822b21262e829e58573', '[\"*\"]', NULL, NULL, '2025-04-21 23:10:05', '2025-04-21 23:10:05'),
(11, 'App\\Models\\User', 1, 'auth_token', '5508b56339ea5c737868ff4bf006c3c3f0e084b3017985e4e0dbeb2112079272', '[\"*\"]', NULL, NULL, '2025-04-22 00:45:41', '2025-04-22 00:45:41'),
(12, 'App\\Models\\User', 1, 'auth_token', 'e12441bf7e70814b8c523c597938e573a5746bc3bb52e0f6f9a43fe938cf88ed', '[\"*\"]', NULL, NULL, '2025-04-22 00:59:03', '2025-04-22 00:59:03'),
(13, 'App\\Models\\User', 1, 'auth_token', '09e8f79d803893a76c96c801036ce3e2f3e468973277078159a2b569ad8e4f04', '[\"*\"]', NULL, NULL, '2025-04-24 18:48:56', '2025-04-24 18:48:56'),
(15, 'App\\Models\\User', 1, 'auth_token', '1572401225556673f10cd90ff45590a0f1385284e59a95233835a71ef2a82093', '[\"*\"]', NULL, NULL, '2025-04-27 19:51:55', '2025-04-27 19:51:55'),
(16, 'App\\Models\\User', 1, 'auth_token', 'b00eaf31fa618975710dd5d165c392f4ce364e13e14bf53c71dc799fc11e8f6c', '[\"*\"]', NULL, NULL, '2025-04-27 19:51:56', '2025-04-27 19:51:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah`
--

CREATE TABLE `sekolah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namaWilayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaSekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaTitik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'offline',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sekolah`
--

INSERT INTO `sekolah` (`id`, `namaWilayah`, `namaSekolah`, `namaTitik`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bantul', 'SMKN 1 Yogyakarta', 'CCTV_Sekolah', 'http://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_smk1yk_aula', 'offline', '2025-02-12 13:10:54', '2025-04-27 19:52:12'),
(2, 'Bantul', 'SMKN 1 Yogyakarta', 'CCTV_Sekolah12', 'http://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_smk1yk_aula2', 'offline', '2025-02-12 13:14:56', '2025-02-12 13:14:56'),
(3, 'Sleman', 'SMKN 1 Yogyakarta', 'CCTV_Sekolah13', 'http://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_smk1yk_aula3', 'offline', '2025-02-12 14:31:27', '2025-02-16 13:45:24'),
(4, 'Bantul', 'SMKN 1 Jogjakarta', 'Gerbang Belakang Sekolah', 'rtmp://103.255.15.222:1935/cctv-sekolah/cctv_smk2yk_a106.stream', 'offline', '2025-02-12 14:35:17', '2025-04-21 18:51:07'),
(5, 'Imogiri', 'SMA 1 Yogyakarta', 'SMK23', 'http://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_smk1yk_aula34', 'offline', '2025-02-13 14:14:20', '2025-02-16 11:41:21'),
(6, 'Bantul', 'SMA 7 Bantul', 'CCTV Lapangan', 'ttp://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_smk1yk_aula3', 'offline', '2025-02-16 12:39:33', '2025-02-16 12:39:33'),
(7, 'Bantul', 'SMA 7 Bantul', 'CCTV AULA', 'ttp://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_smk1yk_aulaaula', 'offline', '2025-02-16 12:40:02', '2025-02-16 12:40:02'),
(8, 'Bantul', 'SMA 7 Bantul', 'CCTV Kantin', 'ttp://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_smk1yk_aulakantin', 'offline', '2025-02-16 12:40:26', '2025-02-16 12:40:26'),
(9, 'Bantul', 'SMA 7 Bantul', 'CCTV Parkiran', 'ttp://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_smk1yk_aulaparkiran', 'offline', '2025-02-16 12:40:54', '2025-02-16 12:40:54'),
(10, 'Imogiri', 'SMP 1 Yogyakarta', 'Kelas 7F', 'ttp://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_smk1yk_aula45', 'offline', '2025-02-19 16:46:13', '2025-02-19 16:46:13'),
(11, 'KOTA JOGJA', 'SMA 7 Bantul', 'CCTV_Sekolah100', 'http://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_smk1yk_aula5', 'offline', '2025-02-20 17:11:23', '2025-02-20 17:11:23'),
(12, 'KABUPATEN SLEMAN', 'SMKN 1 Sleman', 'CCTV_Sekolah17', 'http://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_smk1yk_aula209', 'offline', '2025-02-20 17:12:10', '2025-02-20 17:12:10'),
(13, 'KABUPATEN GK', 'SMKN 2 Yogyakarta', 'CCTV_Sekolah4', 'http://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_smk1yk_aula38', 'offline', '2025-02-20 17:12:59', '2025-02-20 17:12:59'),
(14, 'KOTA JOGJA', 'SMKN 1 Yogyakarta', 'CCTV_Sekolah1', 'tp://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_smk1yk_aula', 'offline', '2025-02-20 19:25:06', '2025-02-20 19:25:06'),
(15, 'KOTA JOGJA', 'SMP 7 Bantul', 'CCTV_Sekolah1', 'gf', 'offline', '2025-02-20 19:33:33', '2025-02-20 19:33:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Utama', 'admin@example.com', '2025-04-15 18:31:57', '$2y$12$IgoOHG18uZQT5Q/hP7mxC..dZgdVBwbpW9KkIWXzmSzTea3MURA1q', '081234567890', 'PGBUScfPnw', '2025-04-15 18:31:58', '2025-04-15 18:31:58'),
(2, 'Admin Kedua', 'admin2@example.com', '2025-04-15 18:31:58', '$2y$12$l4kjgdZK9fp6s2YUH8OnXOa4b5n.cy56YtoSrVAYsrgb/sbaOi6qG', '082112345678', 'lpJJRwm3qd', '2025-04-15 18:31:58', '2025-04-15 18:31:58'),
(3, 'Admin Ketiga', 'admin3@example.com', '2025-04-15 18:31:58', '$2y$12$m.CQlxXCHZiZKaEPMyuRHOGl7Qzhlj0AEAvzrHrTBD3wV24H8CvTK', '085766543210', 'Zs9vcJEU7j', '2025-04-15 18:31:58', '2025-04-15 18:31:58');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cctvs`
--
ALTER TABLE `cctvs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cctvs_link_unique` (`link`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `panorama`
--
ALTER TABLE `panorama`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `panorama_link_unique` (`link`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sekolah_link_unique` (`link`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT untuk tabel `cctvs`
--
ALTER TABLE `cctvs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `panorama`
--
ALTER TABLE `panorama`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
