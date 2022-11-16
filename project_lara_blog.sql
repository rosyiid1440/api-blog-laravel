-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Nov 2022 pada 01.46
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
-- Database: `project_lara_blog`
--

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
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'HTML', 'html', '2022-03-29 08:32:22', '2022-03-29 08:32:23', NULL),
(2, 'PHP', 'php', '2022-03-29 08:32:31', '2022-03-29 08:32:32', NULL),
(3, 'Laravel', 'laravel', '2022-03-29 08:59:30', '2022-03-29 08:59:30', NULL),
(4, 'Coba Saja', 'coba-saja', '2022-03-30 00:49:12', '2022-04-09 12:39:26', '2022-04-09 12:39:26'),
(5, 'Coba Kategori', 'coba-kategori', '2022-04-09 11:52:11', '2022-04-09 12:39:22', '2022-04-09 12:39:22'),
(6, 'hahah', 'hahah', '2022-04-09 11:55:44', '2022-04-09 12:39:04', '2022-04-09 12:39:04'),
(7, 'dasd', 'dasd', '2022-04-09 11:57:38', '2022-04-09 12:35:36', '2022-04-09 12:35:36'),
(8, 'dasda', 'dasda', '2022-04-09 11:58:00', '2022-04-09 12:38:57', '2022-04-09 12:38:57'),
(9, 'hello world', 'hello-world', '2022-04-09 12:10:24', '2022-04-09 12:39:29', '2022-04-09 12:39:29'),
(10, 'Coba lagi', 'coba-lagi', '2022-04-09 12:11:38', '2022-04-09 12:39:17', '2022-04-09 12:39:17'),
(11, 'Coba Kategori', 'coba-kategori', '2022-04-09 12:40:10', '2022-04-09 12:57:03', '2022-04-09 12:57:03'),
(12, 'Coba Kategori', 'coba-kategori', '2022-04-09 12:57:35', '2022-04-09 12:58:16', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
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
(1, '2013_03_29_060157_create_role_table', 1),
(2, '2013_03_29_060242_create_modul_table', 1),
(3, '2014_10_12_000000_create_users_table', 2),
(4, '2014_10_12_100000_create_password_resets_table', 2),
(5, '2019_08_19_000000_create_failed_jobs_table', 2),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(7, '2022_03_29_060215_create_role_has_permission_table', 2),
(8, '2022_03_29_060315_create_kategori_table', 2),
(9, '2022_03_29_060326_create_post_table', 2),
(10, '2022_03_29_060428_create_post_kategori_table', 2),
(11, '2022_03_29_060443_create_menu_table', 3),
(12, '2022_03_29_060455_create_setting_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `modul`
--

CREATE TABLE `modul` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_modul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `modul`
--

INSERT INTO `modul` (`id`, `nama_modul`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kategori', '2022-03-30 06:11:36', '2022-03-29 23:24:01', NULL),
(2, 'User', '2022-03-29 23:18:32', '2022-03-29 23:18:32', NULL),
(3, 'Post', '2022-03-30 11:16:00', '2022-03-30 11:16:01', NULL);

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
-- Struktur dari tabel `post`
--

CREATE TABLE `post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`id`, `judul`, `gambar`, `slug`, `isi`, `status`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Coba', 'dasda', 'coba', 'asdad', 'publish', 1, '2022-03-29 08:32:53', '2022-03-29 08:32:54', NULL),
(2, 'laravel', 'adas', 'laravel', 'asdasd', 'publish', 3, '2022-03-29 08:59:48', '2022-03-29 08:59:49', NULL),
(4, 'Coba post lara', 'asdasd', 'coba-post-lara', 'Coba post lara', 'publish', 1, '2022-03-30 04:40:11', '2022-03-30 04:45:45', '2022-03-30 04:45:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `post_kategori`
--

CREATE TABLE `post_kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `post_kategori`
--

INSERT INTO `post_kategori` (`id`, `kategori_id`, `post_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2022-03-29 08:33:01', '2022-03-29 08:33:02', NULL),
(2, 2, 1, '2022-03-29 08:33:08', '2022-03-29 08:33:09', NULL),
(3, 3, 2, '2022-03-29 09:00:03', '2022-03-29 09:00:04', NULL),
(4, 2, 2, '2022-03-29 09:00:17', '2022-03-29 09:00:18', NULL),
(5, 1, 4, '2022-03-30 04:40:11', '2022-03-30 04:40:11', NULL),
(6, 2, 4, '2022-03-30 04:40:11', '2022-03-30 04:45:02', '2022-03-30 04:45:02'),
(7, 3, 4, '2022-03-30 04:40:44', '2022-03-30 04:40:44', NULL),
(8, 2, 4, '2022-03-30 04:45:25', '2022-03-30 04:45:25', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `nama_role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', '2022-03-29 06:51:10', '2022-03-29 06:51:11', NULL),
(2, 'User', '2022-03-29 06:56:59', '2022-03-29 06:56:59', NULL),
(3, 'pengunjung', '2022-03-29 23:37:10', '2022-03-29 23:38:01', '2022-03-29 23:38:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permission`
--

CREATE TABLE `role_has_permission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `modul_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_has_permission`
--

INSERT INTO `role_has_permission` (`id`, `role_id`, `modul_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, '2022-03-30 06:55:04', '2022-03-30 06:55:05', NULL),
(2, 1, 1, '2022-03-30 07:30:17', '2022-03-30 07:30:18', NULL),
(3, 1, 3, '2022-03-30 11:16:12', '2022-03-30 11:16:13', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_web` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_singkat_web` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_nav` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_web` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', NULL, '$2a$12$3KFC8zh4oAyYuYpQ6J7B2.FP1NU/iq2yAvNbIJ8LONTeipRIsYVQK', 1, NULL, '2022-03-29 06:51:27', '2022-03-29 06:51:27', NULL),
(3, 'user', 'user', 'user@gmail.com', NULL, '$2y$10$cIonSGd0AKC0aHSSy2Ia1OcSRmyFO0Q2pYNef41XYbp1llDcBYAYu', 2, NULL, '2022-03-28 23:57:42', '2022-03-28 23:57:42', NULL),
(17, 'asdasdasd', 'asdasdasd', 'asdasdasd@gmail.com', NULL, '$2y$10$Uo1Tn1hYvoigXDSI2h/wcu9OXCUEb2k8g0IX4OpNGiNK/oZszOFUG', 2, NULL, '2022-04-04 06:35:57', '2022-04-04 06:35:57', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `modul`
--
ALTER TABLE `modul`
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
-- Indeks untuk tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `post_kategori`
--
ALTER TABLE `post_kategori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_kategori_kategori_id_foreign` (`kategori_id`),
  ADD KEY `post_kategori_post_id_foreign` (`post_id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role_has_permission`
--
ALTER TABLE `role_has_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_has_permission_role_id_foreign` (`role_id`),
  ADD KEY `role_has_permission_modul_id_foreign` (`modul_id`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `modul`
--
ALTER TABLE `modul`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `post`
--
ALTER TABLE `post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `post_kategori`
--
ALTER TABLE `post_kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `role_has_permission`
--
ALTER TABLE `role_has_permission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `post_kategori`
--
ALTER TABLE `post_kategori`
  ADD CONSTRAINT `post_kategori_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_kategori_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permission`
--
ALTER TABLE `role_has_permission`
  ADD CONSTRAINT `role_has_permission_modul_id_foreign` FOREIGN KEY (`modul_id`) REFERENCES `modul` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permission_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
