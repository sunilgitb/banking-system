-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307:3307
-- Generation Time: Jul 02, 2023 at 09:55 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `balance` decimal(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `transaction_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `user_id`, `balance`, `created_at`, `updated_at`, `transaction_type`) VALUES
(1, 2, '66.00', '2023-07-01 09:54:26', '2023-07-01 07:43:53', ''),
(2, 1, '1675.00', '2023-07-01 08:31:23', '2023-07-02 00:49:56', ''),
(3, 1, '777.00', '2023-07-01 08:31:45', '2023-07-01 08:31:45', ''),
(4, 5, '666.00', '2023-07-01 08:35:06', '2023-07-01 08:35:06', ''),
(5, 3, '246.00', '2023-07-01 13:12:41', '2023-07-01 13:22:44', ''),
(6, 3, '555.00', '2023-07-01 13:24:59', '2023-07-01 13:24:59', ''),
(7, 3, '5555.00', '2023-07-01 13:30:42', '2023-07-01 13:30:42', ''),
(8, 3, '1111.00', '2023-07-01 13:31:51', '2023-07-01 13:31:51', ''),
(9, 3, '555.00', '2023-07-01 13:33:40', '2023-07-01 13:33:40', ''),
(10, 3, '5555.00', '2023-07-01 13:35:01', '2023-07-01 13:35:01', ''),
(11, 3, '5555.00', '2023-07-01 13:35:50', '2023-07-01 13:35:50', ''),
(12, 3, '1111.00', '2023-07-01 13:36:29', '2023-07-01 13:36:29', ''),
(13, 3, '111.00', '2023-07-01 13:40:38', '2023-07-01 13:40:38', ''),
(14, 3, '5555.00', '2023-07-01 13:45:28', '2023-07-01 13:45:28', ''),
(15, 3, '5555.00', '2023-07-01 13:53:48', '2023-07-01 13:53:48', ''),
(16, 3, '5555.00', '2023-07-01 13:55:36', '2023-07-01 13:55:36', ''),
(17, 3, '5555.00', '2023-07-01 14:06:08', '2023-07-01 14:06:08', ''),
(18, 1, '555.00', '2023-07-01 23:15:46', '2023-07-01 23:15:46', ''),
(19, 2, '55.00', '2023-07-01 23:19:46', '2023-07-01 23:19:46', ''),
(20, 1, '555.00', '2023-07-02 00:14:20', '2023-07-02 00:14:20', 'deposit'),
(21, 1, '555.00', '2023-07-02 00:25:12', '2023-07-02 00:25:12', 'deposit'),
(22, 1, '555.00', '2023-07-02 00:29:47', '2023-07-02 00:29:47', 'withdraw'),
(23, 1, '1111.00', '2023-07-02 00:30:10', '2023-07-02 00:30:10', 'deposit'),
(24, 1, '2222.00', '2023-07-02 00:30:18', '2023-07-02 00:30:18', 'deposit'),
(25, 1, '222.00', '2023-07-02 00:30:26', '2023-07-02 00:30:26', 'deposit'),
(26, 1, '222.00', '2023-07-02 00:30:33', '2023-07-02 00:30:33', 'deposit'),
(27, 1, '500.00', '2023-07-02 00:34:07', '2023-07-02 00:34:07', 'withdraw'),
(28, 1, '100.00', '2023-07-02 00:35:29', '2023-07-02 00:35:29', 'withdraw'),
(29, 1, '555.00', '2023-07-02 00:39:47', '2023-07-02 00:39:47', 'deposit'),
(30, 1, '555.00', '2023-07-02 00:40:26', '2023-07-02 00:40:26', 'deposit'),
(31, 1, '2222.00', '2023-07-02 00:40:33', '2023-07-02 00:40:33', 'withdraw'),
(32, 1, '5555.00', '2023-07-02 00:42:59', '2023-07-02 00:42:59', 'deposit'),
(33, 1, '1111.00', '2023-07-02 00:44:54', '2023-07-02 00:44:54', 'deposit'),
(34, 1, '2222.00', '2023-07-02 00:45:00', '2023-07-02 00:45:00', 'deposit'),
(35, 1, '5555.00', '2023-07-02 00:45:12', '2023-07-02 00:45:12', 'withdraw'),
(36, 1, '555.00', '2023-07-02 00:49:56', '2023-07-02 00:49:56', 'withdraw'),
(37, 6, '445.00', '2023-07-02 01:06:29', '2023-07-02 01:17:57', 'deposit'),
(38, 6, '200.00', '2023-07-02 01:06:38', '2023-07-02 01:06:38', 'deposit'),
(39, 6, '555.00', '2023-07-02 01:06:44', '2023-07-02 01:06:44', 'withdraw'),
(40, 6, '555.00', '2023-07-02 01:06:57', '2023-07-02 01:06:57', 'withdraw'),
(41, 6, '555.00', '2023-07-02 01:12:46', '2023-07-02 01:12:46', 'withdraw'),
(42, 6, '555.00', '2023-07-02 01:12:52', '2023-07-02 01:12:52', 'deposit'),
(43, 6, '222.00', '2023-07-02 01:15:56', '2023-07-02 01:15:56', 'withdraw'),
(44, 6, '555.00', '2023-07-02 01:16:08', '2023-07-02 01:16:08', 'withdraw'),
(45, 6, '555.00', '2023-07-02 01:17:58', '2023-07-02 01:17:58', 'withdraw'),
(46, 6, '555.00', '2023-07-02 01:26:02', '2023-07-02 01:26:02', 'deposit'),
(47, 6, '222.00', '2023-07-02 01:28:47', '2023-07-02 01:28:47', 'withdraw'),
(48, 6, '225.00', '2023-07-02 01:39:04', '2023-07-02 01:39:04', 'withdraw'),
(49, 6, '555.00', '2023-07-02 01:40:05', '2023-07-02 01:40:05', 'deposit');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(5, '2023_07_01_083743_create_accounts_table', 2),
(6, '2023_07_01_101255_add_usertype_to_users_table', 3),
(7, '2023_07_02_053845_add_transaction_type_to_accounts_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `usertype`) VALUES
(1, 'User', 'user@gmail.com', NULL, '$2y$10$s29ab.HwZMFZJXyHfFAWd.AdG4Wtre5sNWYLSTgsKuRzAkmoGLP/q', NULL, '2023-06-30 13:01:22', '2023-06-30 13:01:22', 'user'),
(2, 'test', 'test@gmail.com', NULL, '$2y$10$ConDOuiVB24AOZdJZMO8duL.yocBu7PJZjiqAErlTyoAISYHylRw.', NULL, '2023-07-01 04:04:33', '2023-07-01 04:04:33', 'user'),
(3, 'test test', 'test55@gmail.com', NULL, '$2y$10$IkjBD0grQZg2pEpJPFXrte8jplrF1jaiKvNBGt37DUEmfMkznrnB.', NULL, '2023-07-01 04:12:19', '2023-07-01 04:12:19', 'user'),
(4, 'Admin', 'admin@gmail.com', NULL, '$2y$10$w6Kd8q8CvInmCpCvixskTeFmKcHQhAstCFv9ysg1a6SYOgBXz/qsC', NULL, '2023-07-01 05:55:33', '2023-07-01 05:55:33', 'admin'),
(5, 'TestUser', 'testuser@gmail.com', NULL, '$2y$10$.rkNGj0bboa38a7zAf7blug1ToufW75q/xzO4nvUIaVl5bmNLhk9W', NULL, '2023-07-01 06:36:28', '2023-07-01 06:36:28', 'user'),
(6, 'Test22', 'test22@gmail.com', NULL, '$2y$10$q9ZWBkXtzrNItuJELJiune3CWreta2VvJCzi5N.R0YlfqBDDaQSQy', NULL, '2023-07-02 01:01:36', '2023-07-02 01:01:36', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accounts_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
