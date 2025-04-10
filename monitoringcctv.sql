-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Apr 2025 pada 03.18
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
-- Struktur dari tabel `cctvs`
--

CREATE TABLE `cctvs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namaWilayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaTitik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cctvs`
--

INSERT INTO `cctvs` (`id`, `namaWilayah`, `namaTitik`, `link`, `created_at`, `updated_at`) VALUES
(14, 'KOMINFO SLEMAN 1', 'Bundaran UGM 10', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=BundaranUGM1', '2024-11-21 07:17:36', '2025-02-10 18:28:10'),
(15, 'KOMINFO SLEMAN 1', 'Bundaran UGM 2', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=BundaranUGM2', '2024-11-21 07:18:18', '2024-11-21 07:18:18'),
(16, 'KOMINFO SLEMAN 1', 'Bundaran UGM 3', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=BundaranUGM3', '2024-11-21 07:18:52', '2024-11-21 07:18:52'),
(17, 'KOMINFO SLEMAN 1', 'Flyofer Jombor B', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=FlyOverJomborBarat', '2024-11-21 07:19:49', '2024-11-21 07:20:38'),
(18, 'KOMINFO SLEMAN 1', 'Flyofer Jombor T', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=FlyOverJomborTimur', '2024-11-21 07:20:26', '2024-11-21 07:20:26'),
(19, 'KOMINFO SLEMAN 1', 'Flyofer Jombor U', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=FlyOverJomborUtara', '2024-11-21 07:21:14', '2024-11-21 07:21:14'),
(20, 'KOMINFO SLEMAN 1', 'Perempatan Beran 1', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanBeran1', '2024-11-21 07:21:49', '2024-11-21 07:21:49'),
(21, 'KOMINFO SLEMAN 1', 'Perempetan CondongCatur', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanCondongcatur', '2024-11-21 07:22:57', '2024-11-21 07:22:57'),
(22, 'KOMINFO SLEMAN 1', 'Perempatan Demak Ijo 1', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanDemakIjo1', '2024-11-21 07:23:31', '2024-11-21 07:23:31'),
(23, 'KOMINFO SLEMAN 1', 'Perempatan Demak Ijo 2', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanDemakIjo2', '2024-11-21 07:24:47', '2024-11-21 07:24:47'),
(24, 'KOMINFO SLEMAN 1', 'Perempatan Demak Ijo 3', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanDemakIjo3', '2024-11-21 07:25:25', '2024-11-21 07:25:25'),
(25, 'KOMINFO SLEMAN 1', 'Perempatan Godean 1', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanGodean1', '2024-11-21 07:26:12', '2024-11-21 07:26:12'),
(26, 'KOMINFO SLEMAN 1', 'Perempatan Godean 2', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanGodean2', '2024-11-21 07:26:52', '2024-11-21 07:26:52'),
(27, 'KOMINFO SLEMAN 1', 'Perempatan Kronggahan', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanKronggahan', '2024-11-21 07:27:48', '2024-11-21 07:27:48'),
(28, 'KOMINFO SLEMAN 1', 'Perempatan Mojolali', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanMonjali', '2024-11-21 07:28:45', '2024-11-21 07:28:45'),
(29, 'KOMINFO SLEMAN 2', 'Perempatan Munggur 1', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanMunggur1', '2024-11-21 07:34:18', '2024-11-21 08:03:20'),
(30, 'KOMINFO SLEMAN 2', 'Perempatan Munggur 2', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanMunggur2', '2024-11-21 07:35:40', '2024-11-21 07:35:40'),
(31, 'KOMINFO SLEMAN 2', 'Perempatan Pelemgurih 1', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanPelemgurih1', '2024-11-21 08:03:08', '2024-11-21 08:03:08'),
(32, 'KOMINFO SLEMAN 2', 'Perempatan Pelemgurih 2', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanPelemgurih2', '2024-11-21 08:04:17', '2024-11-21 08:04:17'),
(33, 'KOMINFO SLEMAN 2', 'Perempatan Pelemgurih 3', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanPelemgurih3', '2024-11-21 08:05:12', '2024-11-21 08:05:12'),
(34, 'KOMINFO SLEMAN 2', 'Perempatan Seyegan', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanSeyegan', '2024-11-21 08:06:03', '2024-11-21 08:06:03'),
(35, 'KOMINFO SLEMAN 2', 'Perempatan Tempel 1', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanTempel1', '2024-11-21 08:06:48', '2024-11-21 08:06:48'),
(36, 'KOMINFO SLEMAN 2', 'Perempatan Tempel 2', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanTempel2', '2024-11-21 08:07:37', '2024-11-21 08:07:37'),
(37, 'KOMINFO SLEMAN 2', 'Perempatan UPN 1', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanUPN1', '2024-11-21 08:08:29', '2024-11-21 08:08:29'),
(38, 'KOMINFO SLEMAN 2', 'Perempatan UPN 2', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PerempatanUPN2', '2024-11-21 08:09:13', '2024-11-21 08:09:25'),
(39, 'KOMINFO SLEMAN 2', 'Pertigaan Bantulan 1', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PertigaanBantulan1', '2024-11-21 08:10:05', '2024-11-21 08:10:05'),
(40, 'KOMINFO SLEMAN 2', 'Pertigaan Bantulan 2', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PertigaanBantulan2', '2024-11-21 08:10:38', '2024-11-21 08:10:38'),
(41, 'KOMINFO SLEMAN 2', 'Pertigaan Maguwo 1', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PertigaanMaguwo1', '2024-11-21 08:11:26', '2024-11-21 08:11:26'),
(42, 'KOMINFO SLEMAN 2', 'Pertigaan Maguwo 2', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PertigaanMaguwo2', '2024-11-21 08:12:01', '2024-11-21 08:12:01'),
(43, 'KOMINFO SLEMAN 2', 'Pertigaan Maguwo 3', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PertigaanMaguwo3', '2024-11-21 08:12:42', '2024-11-21 08:12:42'),
(44, 'KOMINFO SLEMAN 3', 'Pertigaan Minggir', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PertigaanMinggir', '2024-11-21 17:51:18', '2024-11-21 17:51:18'),
(45, 'KOMINFO SLEMAN 3', 'Pertigaan Pasar Gamping', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PertigaanPasarGamping', '2024-11-21 17:51:46', '2024-11-21 17:51:46'),
(46, 'KOMINFO SLEMAN 3', 'Pertigaan Pasar Prambanan', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PertigaanPasarPrambanan', '2024-11-21 17:52:29', '2024-11-21 17:52:29'),
(47, 'KOMINFO SLEMAN 3', 'Pertigaan UIN', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PertigaanUIN', '2024-11-21 17:53:11', '2024-11-21 17:53:11'),
(48, 'KOMINFO SLEMAN 3', 'Pos Polisi Jombor', 'http://103.255.15.227:5080/CCTVKOMINFOSLEMAN/play.html?id=PosPolisiJombor', '2024-11-21 17:53:53', '2024-11-21 17:53:53'),
(49, 'Bantul 1', 'Makam Imogiri', 'http://103.255.15.227:5080/CCTVBANTUL/play.html?id=BarcodeBordessMakamImogiri', '2024-11-24 10:09:27', '2024-11-28 19:00:24'),
(50, 'Sekolah', 'SMK2', 'rtmp://103.255.15.222:1935/cctv-sekolah/cctv_smk2yk_a106.stream', '2025-02-10 18:16:23', '2025-02-10 18:16:23'),
(52, 'Sekolah22', 'CCTV_Sekolah', 'rtmp://103.255.15.222:1935/cctv-sekolah/cctv_smk2yk_tiangbendera.stream', '2025-02-10 18:34:02', '2025-02-10 18:34:02'),
(53, 'SMK1Yogyakarta', 'CCTV_Aula1', 'http://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_smk1yk_aula', '2025-02-10 19:02:58', '2025-02-10 19:02:58'),
(54, 'SMK1Yogyakarta', 'CCTV_Aula2', 'http://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_smk1yk_aula2', '2025-02-10 19:03:14', '2025-02-10 19:03:14');

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
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah`
--

CREATE TABLE `sekolah` (
  `id` bigint(20) NOT NULL,
  `namaWilayah` varchar(255) NOT NULL,
  `namaSekolah` varchar(255) NOT NULL,
  `namaTitik` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sekolah`
--

INSERT INTO `sekolah` (`id`, `namaWilayah`, `namaSekolah`, `namaTitik`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Bantul', 'SMKN 1 Yogyakarta', 'CCTV_Sekolah11111 11111 11111 111111', 'http://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_smk1yk_aula', '2025-02-12 20:10:54', '2025-02-14 21:27:10'),
(4, 'Bantul', 'SMKN 1 Yogyakarta', 'CCTV_Sekolah12', 'http://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_smk1yk_aula2', '2025-02-12 20:14:56', '2025-02-12 20:14:56'),
(5, 'Sleman', 'SMKN 1 Yogyakarta', 'CCTV_Sekolah13', 'http://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_smk1yk_aula3', '2025-02-12 21:31:27', '2025-02-16 20:45:24'),
(6, 'Bantul', 'SMKN 1 Jogjakarta', 'SMK2 2222222222 222222222222 22222222222 2222222222 22222', 'rtmp://103.255.15.222:1935/cctv-sekolah/cctv_smk2yk_a106.stream', '2025-02-12 21:35:17', '2025-02-13 02:04:08'),
(7, 'Imogiri', 'SMA 1 Yogyakarta', 'SMK23', 'http://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_smk1yk_aula34', '2025-02-13 21:14:20', '2025-02-16 18:41:21'),
(8, 'Bantul', 'SMA 7 Bantul', 'CCTV Lapangan', 'ttp://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_smk1yk_aula3', '2025-02-16 19:39:33', '2025-02-16 19:39:33'),
(9, 'Bantul', 'SMA 7 Bantul', 'CCTV AULA', 'ttp://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_smk1yk_aulaaula', '2025-02-16 19:40:02', '2025-02-16 19:40:02'),
(10, 'Bantul', 'SMA 7 Bantul', 'CCTV Kantin', 'ttp://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_smk1yk_aulakantin', '2025-02-16 19:40:26', '2025-02-16 19:40:26'),
(11, 'Bantul', 'SMA 7 Bantul', 'CCTV Parkiran', 'ttp://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_smk1yk_aulaparkiran', '2025-02-16 19:40:54', '2025-02-16 19:40:54'),
(12, 'Imogiri', 'SMP 1 Yogyakarta', 'Kelas 7F', 'ttp://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_smk1yk_aula45', '2025-02-19 23:46:13', '2025-02-19 23:46:13'),
(13, 'KOTA JOGJA', 'SMA 7 Bantul', 'CCTV_Sekolah100', 'http://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_smk1yk_aula5', '2025-02-21 00:11:23', '2025-02-21 00:11:23'),
(18, 'KABUPATEN SLEMAN', 'SMKN 1 Sleman', 'CCTV_Sekolah17', 'http://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_smk1yk_aula209', '2025-02-21 00:12:10', '2025-02-21 00:12:10'),
(19, 'KABUPATEN GK', 'SMKN 2 Yogyakarta', 'CCTV_Sekolah4', 'http://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_smk1yk_aula38', '2025-02-21 00:12:59', '2025-02-21 00:12:59'),
(20, 'KOTA JOGJA', 'SMKN 1 Yogyakarta', 'CCTV_Sekolah1', 'tp://103.255.15.227:5080/CCTVSEKOLAH/play.html?id=cctv_smk1yk_aula', '2025-02-21 02:25:06', '2025-02-21 02:25:06'),
(23, 'KOTA JOGJA', 'SMP 7 Bantul', 'CCTV_Sekolah1', 'gf', '2025-02-21 02:33:33', '2025-02-21 02:33:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_me` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cctvs`
--
ALTER TABLE `cctvs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD UNIQUE KEY `link` (`link`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
