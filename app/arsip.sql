-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2025 at 02:42 PM
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
-- Database: `arsip`
--

-- --------------------------------------------------------

--
-- Table structure for table `archives`
--

CREATE TABLE `archives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `physical_location` varchar(255) NOT NULL,
  `pdf_path` varchar(255) NOT NULL,
  `stored_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `archives`
--

INSERT INTO `archives` (`id`, `title`, `physical_location`, `pdf_path`, `stored_at`, `created_at`, `updated_at`) VALUES
(2, 'asd', 'asd', 'archives/SMGBHC1qyWuWwGNEJfQEX4j4VaZYpnpQgD6lqLqm.pdf', '2025-05-29', '2025-05-29 08:56:06', '2025-05-29 08:56:06'),
(3, 'test', 'rak02', 'archives/dxyPgLXGkyhy9hJpP8Poi31IsmgBPRbJuDlJwGvG.pdf', '2025-05-30', '2025-05-29 23:26:21', '2025-05-29 23:26:21'),
(5, 'IIIB', 'RAK01', 'archives/xiR949pTDzhjUJzPlPjFUxehg3c6Kdqc4XanVecZ.pdf', '2025-05-31', '2025-05-30 18:48:24', '2025-05-30 18:48:24'),
(6, 'w', 'w', 'archives/UUtumvMeQAimmsctsK8Rd8wzhzLQi2u0tO1SIMZg.pdf', '2025-05-31', '2025-05-30 19:19:47', '2025-05-30 19:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `archives1`
--

CREATE TABLE `archives1` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `physical_location` varchar(255) NOT NULL,
  `pdf_path` varchar(255) NOT NULL,
  `stored_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `archives1`
--

INSERT INTO `archives1` (`id`, `title`, `physical_location`, `pdf_path`, `stored_at`, `created_at`, `updated_at`) VALUES
(2, 'IIIB', '12320', 'archives1/rXpaVqET5wqiaGKjhOF8pHPrM4JQvonVHlMvDMEd.pdf', '2025-05-31', '2025-05-31 04:04:13', '2025-05-31 04:04:13'),
(3, 'IT', '12320', 'archives2/quUyug1XeebVLXBjw9PdFpxw06Py9zwvC951T2HC.pdf', '2025-05-31', '2025-05-31 04:38:02', '2025-05-31 04:38:02');

-- --------------------------------------------------------

--
-- Table structure for table `archives2`
--

CREATE TABLE `archives2` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `physical_location` varchar(255) NOT NULL,
  `pdf_path` varchar(255) NOT NULL,
  `stored_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `archives2`
--

INSERT INTO `archives2` (`id`, `title`, `physical_location`, `pdf_path`, `stored_at`, `created_at`, `updated_at`) VALUES
(1, 'IT', '12320', 'archives2/QpqYiR7SEJrOvW9vFQweH4DiBGRsxpgDN9XSpYyT.pdf', '2025-05-31', '2025-05-31 05:30:46', '2025-05-31 05:30:46');

-- --------------------------------------------------------

--
-- Table structure for table `arsip_files`
--

CREATE TABLE `arsip_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `arsip_pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `tipe` enum('sk_golongan','sk_jabatan','sertifikat_diklat') NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `arsip_pegawais`
--

CREATE TABLE `arsip_pegawais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nrk` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `lokasi_rak` varchar(255) NOT NULL,
  `sk_cpns` varchar(255) DEFAULT NULL,
  `sk_pns` varchar(255) DEFAULT NULL,
  `sk_golongan` varchar(255) DEFAULT NULL,
  `sk_jabatan` varchar(255) DEFAULT NULL,
  `buku_nikah` varchar(255) DEFAULT NULL,
  `akte_kelahiran` varchar(255) DEFAULT NULL,
  `kartu_pegawai` varchar(255) DEFAULT NULL,
  `kartu_istri` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `akte_kelahiran_suami` varchar(255) DEFAULT NULL,
  `akte_kelahiran_istri` varchar(255) DEFAULT NULL,
  `akte_kelahiran_anak_1` varchar(255) DEFAULT NULL,
  `akte_kelahiran_anak_2` varchar(255) DEFAULT NULL,
  `akte_kelahiran_anak_3` varchar(255) DEFAULT NULL,
  `akte_kelahiran_anak_4` varchar(255) DEFAULT NULL,
  `akte_kelahiran_anak_5` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `tempattugas` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `sk_jabatan_1` varchar(255) DEFAULT NULL,
  `keterangan_sk_jabatan_1` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `arsip_pegawais`
--

INSERT INTO `arsip_pegawais` (`id`, `nrk`, `nama`, `lokasi_rak`, `sk_cpns`, `sk_pns`, `sk_golongan`, `sk_jabatan`, `buku_nikah`, `akte_kelahiran`, `kartu_pegawai`, `kartu_istri`, `created_at`, `updated_at`, `akte_kelahiran_suami`, `akte_kelahiran_istri`, `akte_kelahiran_anak_1`, `akte_kelahiran_anak_2`, `akte_kelahiran_anak_3`, `akte_kelahiran_anak_4`, `akte_kelahiran_anak_5`, `jabatan`, `tempattugas`, `keterangan`, `sk_jabatan_1`, `keterangan_sk_jabatan_1`) VALUES
(4, '789456', 'test', 'rak0001', 'pegawai/789456/S95aHHyMa4oD5qwa7Ndny4AVUDd5XJadD0GJoF1H.pdf', 'pegawai/789456/AXNfyDcxMaYjyFZN88WALy2yhYhNkRKsO8e3BDJb.pdf', 'pegawai/789456/TavQ4eVa5OiLB53mXfu9qOMqmV82yRtspB6uSMZA.pdf', 'pegawai/789456/Tcc1i9ZP05CJHJGO5NJVtUIMoIwSYaKc9wAXQtP9.pdf', 'pegawai/789456/OBq7QyoIySE5qyzeyFl0eA19WHB6N1F3jlwolZed.pdf', NULL, NULL, NULL, '2025-05-29 08:47:41', '2025-05-30 00:37:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Kasubbag Umum / 01/02/2025', 'Kecamatan Pesanggrahan', NULL, NULL, NULL),
(6, '12320', 'Doni', 'Rak001/002', 'pegawai/12320/zSZFWep0ve1k397xqccZj9qQih5QElKUkadpVqme.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-30 00:52:59', '2025-05-30 00:52:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PJLP / 02/02/2025', 'Kecamatan Pesanggrahan', NULL, NULL, NULL),
(7, '789', 'Doni', 'Rak01/02', NULL, NULL, NULL, 'pegawai/789/98LPkZ4wQmBNg8jTa264dvsjhg7iVfvRzZIUvwmi.pdf', NULL, NULL, NULL, NULL, '2025-05-30 02:16:15', '2025-05-30 02:16:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kasi / 20/02/2025', 'Kecamatan Pesanggrahan', NULL, NULL, NULL),
(12, '123', 'w', 'w', 'pegawai/123/5Kvd1WtNPcBjT3v9MKeSEWGUrEZB8d3yvFt0Ptk0.pdf', NULL, NULL, 'pegawai/123/9Zw0sVhIJSuNXjoZtMcrkJyQBSsy6qEBuFLWBUSd.pdf', NULL, NULL, NULL, NULL, '2025-05-30 02:58:02', '2025-05-30 18:05:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'w', 'w', 'w1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_22_094322_create_archives_table', 1),
(5, '2025_05_26_070650_create_arsip_pegawais_table', 1),
(6, '2025_05_26_123734_add_akte_kelahiran_suami_to_arsip_pegawais_table', 1),
(7, '2025_05_29_163522_create_arsip_files_table', 2),
(8, '2025_05_30_003147_add_jabatan_to_arsip_pegawais_table', 3),
(9, '2025_05_30_004818_create_arsip_files_table', 4),
(10, '2025_05_30_072631_add_tempattugas_to_arsip_pegawais_table', 5),
(11, '2025_05_30_075924_add_keterangan_to_arsip_pegawais_table', 6),
(12, '2025_05_30_133342_add_sk_jabatan_1_to_arsip_pegawais_table', 7),
(13, '2025_05_31_010819_create_archives1_table', 8),
(14, '2025_05_31_111743_create_archives2_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('sSDrknSMoQEdfkFyWJngZ69MGwq6OVpKy3J16X5y', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSkljUU0zVVRoUldIdGNsaTZlY2dzU2czbHpHUDlrMEZpbm1CY3pDOCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcnNpcC1wZWdhd2FpIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1748694878);

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'a3', 'a3@gmail.com', NULL, '$2y$12$f1rIHynv3szlxTYW1l41HexOZ50GCGTVyO0kqm.cCSI/pdLjAvRKi', NULL, '2025-05-28 18:40:57', '2025-05-28 18:40:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archives`
--
ALTER TABLE `archives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archives1`
--
ALTER TABLE `archives1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archives2`
--
ALTER TABLE `archives2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arsip_files`
--
ALTER TABLE `arsip_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `arsip_files_arsip_pegawai_id_foreign` (`arsip_pegawai_id`);

--
-- Indexes for table `arsip_pegawais`
--
ALTER TABLE `arsip_pegawais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `archives`
--
ALTER TABLE `archives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `archives1`
--
ALTER TABLE `archives1`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `archives2`
--
ALTER TABLE `archives2`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `arsip_files`
--
ALTER TABLE `arsip_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `arsip_pegawais`
--
ALTER TABLE `arsip_pegawais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `arsip_files`
--
ALTER TABLE `arsip_files`
  ADD CONSTRAINT `arsip_files_arsip_pegawai_id_foreign` FOREIGN KEY (`arsip_pegawai_id`) REFERENCES `arsip_pegawais` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
