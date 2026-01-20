-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20260106.f3f3d53389
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 20, 2026 at 06:40 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `writer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publisher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_year` year NOT NULL,
  `stock` int NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `writer`, `publisher`, `publication_year`, `stock`, `cover`, `created_at`, `updated_at`) VALUES
(1, 'Filosofi Teras', 'Henry Manampiring', 'Kompas', '2019', 5, NULL, '2026-01-19 21:02:11', '2026-01-19 23:18:20'),
(2, 'Atomic Habits', 'James Clear', 'Penguin', '2018', 3, NULL, '2026-01-19 21:02:12', '2026-01-19 21:02:12'),
(3, 'Mastering Laravel 10: From Zero to Hero', 'Taylor Otwell', 'Laravel Press', '2023', 12, NULL, '2026-01-19 22:58:46', '2026-01-19 22:58:46'),
(4, 'Clean Code: A Handbook of Agile Software Craftsmanship', 'Robert C. Martin', 'Prentice Hall', '2008', 5, NULL, '2026-01-19 22:58:46', '2026-01-19 22:58:46'),
(5, 'The Pragmatic Programmer', 'Andrew Hunt', 'Addison-Wesley', '2019', 7, NULL, '2026-01-19 22:58:46', '2026-01-19 22:58:46'),
(6, 'JavaScript: The Good Parts', 'Douglas Crockford', 'O\'Reilly Media', '2008', 10, NULL, '2026-01-19 22:58:46', '2026-01-19 22:58:46'),
(7, 'Belajar Otodidak MySQL', 'Budi Raharjo', 'Informatika', '2022', 15, NULL, '2026-01-19 22:58:46', '2026-01-19 22:58:46'),
(8, 'Algoritma dan Struktur Data', 'Rinaldi Munir', 'Informatika Bandung', '2020', 20, NULL, '2026-01-19 22:58:46', '2026-01-19 22:58:46'),
(9, 'Head First HTML and CSS', 'Elisabeth Robson', 'O\'Reilly Media', '2012', 8, NULL, '2026-01-19 22:58:46', '2026-01-19 22:58:46'),
(10, 'Pro DevOps with Google Cloud', 'Pierluigi Riti', 'Apress', '2018', 4, NULL, '2026-01-19 22:58:46', '2026-01-19 23:18:16'),
(11, 'Laskar Pelangi', 'Andrea Hirata', 'Bentang Pustaka', '2005', 25, NULL, '2026-01-19 22:58:46', '2026-01-19 22:58:46'),
(12, 'Bumi Manusia', 'Pramoedya Ananta Toer', 'Lentera Dipantara', '1980', 10, 'covers/vAjSus74D8vAvs2DzrVWQGzP5Ctp7Bnii1ozgAEY.jpg', '2026-01-19 22:58:46', '2026-01-19 23:34:11'),
(13, 'Cantik Itu Luka', 'Eka Kurniawan', 'Gramedia Pustaka Utama', '2002', 6, NULL, '2026-01-19 22:58:46', '2026-01-19 22:58:46'),
(14, 'Laut Bercerita', 'Leila S. Chudori', 'KPG', '2017', 14, NULL, '2026-01-19 22:58:46', '2026-01-19 22:58:46'),
(15, 'Pulang', 'Tere Liye', 'Republika', '2015', 18, NULL, '2026-01-19 22:58:46', '2026-01-19 22:58:46'),
(16, 'Hujan', 'Tere Liye', 'Gramedia Pustaka Utama', '2016', 20, NULL, '2026-01-19 22:58:46', '2026-01-19 22:58:46'),
(17, 'Harry Potter and the Sorcerer\'s Stone', 'J.K. Rowling', 'Scholastic', '1997', 9, NULL, '2026-01-19 22:58:46', '2026-01-19 22:58:46'),
(18, 'Dunia Sophie', 'Jostein Gaarder', 'Mizan', '1991', 11, NULL, '2026-01-19 22:58:46', '2026-01-19 22:58:46'),
(19, 'Atomic Habits', 'James Clear', 'Penguin Random House', '2018', 30, NULL, '2026-01-19 22:58:46', '2026-01-19 22:58:46'),
(20, 'The Psychology of Money', 'Morgan Housel', 'Harriman House', '2020', 22, NULL, '2026-01-19 22:58:46', '2026-01-19 22:58:46'),
(21, 'Filosofi Teras', 'Henry Manampiring', 'Penerbit Buku Kompas', '2018', 28, NULL, '2026-01-19 22:58:46', '2026-01-19 22:58:46'),
(22, 'Sebuah Seni untuk Bersikap Bodo Amat', 'Mark Manson', 'Grasindo', '2016', 19, NULL, '2026-01-19 22:58:46', '2026-01-19 22:58:46'),
(23, 'Rich Dad Poor Dad', 'Robert T. Kiyosaki', 'Plata Publishing', '1997', 13, NULL, '2026-01-19 22:58:46', '2026-01-19 22:58:46'),
(24, 'Sapiens: A Brief History of Humankind', 'Yuval Noah Harari', 'Harvill Secker', '2011', 7, NULL, '2026-01-19 22:58:46', '2026-01-19 22:58:46'),
(25, 'One Piece Vol. 100', 'Eiichiro Oda', 'Elex Media Komputindo', '2021', 15, NULL, '2026-01-19 22:58:46', '2026-01-19 22:58:46'),
(26, 'Naruto Vol. 72', 'Masashi Kishimoto', 'Elex Media Komputindo', '2015', 12, NULL, '2026-01-19 22:58:46', '2026-01-19 22:58:46'),
(27, 'Detektif Conan Vol. 99', 'Gosho Aoyama', 'Elex Media Komputindo', '2021', 10, NULL, '2026-01-19 22:58:46', '2026-01-19 22:58:46'),
(28, 'Attack on Titan Vol. 34', 'Hajime Isayama', 'Elex Media Komputindo', '2021', 8, NULL, '2026-01-19 22:58:46', '2026-01-19 22:58:46'),
(29, 'Demon Slayer: Kimetsu no Yaiba Vol. 1', 'Koyoharu Gotouge', 'Elex Media Komputindo', '2016', 14, NULL, '2026-01-19 22:58:46', '2026-01-19 22:58:46'),
(30, 'Jujutsu Kaisen Vol. 0', 'Gege Akutami', 'Elex Media Komputindo', '2018', 16, NULL, '2026-01-19 22:58:46', '2026-01-19 22:58:46'),
(31, 'Spy x Family Vol. 1', 'Tatsuya Endo', 'Elex Media Komputindo', '2019', 20, NULL, '2026-01-19 22:58:46', '2026-01-19 22:58:46'),
(32, 'Blue Lock Vol. 1', 'Muneyuki Kaneshiro', 'Elex Media Komputindo', '2018', 18, NULL, '2026-01-19 22:58:46', '2026-01-19 22:58:46');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-ganes@gmail.com|127.0.0.1', 'i:1;', 1768890593),
('laravel-cache-ganes@gmail.com|127.0.0.1:timer', 'i:1768890593;', 1768890593);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `book_id` bigint UNSIGNED NOT NULL,
  `loan_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `status` enum('borrowed','returned') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'borrowed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `user_id`, `book_id`, `loan_date`, `return_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2026-01-20', '2026-01-20', 'returned', '2026-01-19 22:59:39', '2026-01-19 23:18:20'),
(2, 2, 10, '2026-01-20', '2026-01-20', 'returned', '2026-01-19 23:06:54', '2026-01-19 23:18:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_01_20_034633_create_books_table', 1),
(5, '2026_01_20_034636_create_loans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('zW3PImgTpYCHYgzbuPqtPujqfpAq8VFU1z9TnYrR', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUENPbld1UDQ4SkVTRHJvMzZFaFhxbXJOT0hJbmdyMXFPYlBWcFJTSCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6OToiZGFzaGJvYXJkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1768891093);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_lengkap`, `username`, `email`, `password`, `alamat`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', 'admin@sekolah.sch.id', '$2y$12$NWZ7EJWtI4qABz3PbSWuSeQXHJt9P1WmmrFeTil6B0i8.W35Hb.PW', 'Ruang Server', 'admin', NULL, '2026-01-19 21:02:11', '2026-01-19 22:52:05'),
(2, 'Siswa Teladan', 'siswa01', 'siswa@sekolah.sch.id', '$2y$12$i577cji3pkffjFh//3hxsu6L59jwYSbPEOZrJsQyylJ32Q13l6.pW', 'Jl. Pendidikan No. 1', 'user', NULL, '2026-01-19 21:02:11', '2026-01-19 22:56:04'),
(5, 'Ganes Roller', 'ganes', 'ganes@gmail.com', '$2y$12$1rdfYF/f4oSURpHr2jNgi.N9TRp9qZocjKpjNB3BrP2kbd1nGbxs6', NULL, 'user', NULL, '2026-01-19 23:29:13', '2026-01-19 23:29:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
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
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loans_user_id_foreign` (`user_id`),
  ADD KEY `loans_book_id_foreign` (`book_id`);

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
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `loans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
