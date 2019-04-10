-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2019 at 06:42 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `group_user`
--

CREATE TABLE `group_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_user`
--

INSERT INTO `group_user` (`id`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', NULL, NULL),
(2, 'Digital Group', NULL, NULL),
(3, 'Organize', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(3, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(4, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(5, '2016_06_01_000004_create_oauth_clients_table', 1),
(6, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(7, '2019_04_08_044735_create_group_user_table', 1),
(8, '2019_04_08_045318_create_organize_table', 1),
(9, '2019_04_08_053048_create_news_type_table', 1),
(10, '2019_04_10_110202_create_users_table', 2),
(11, '2019_04_10_110212_create_news_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `organize_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `images` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `publish_status` int(11) NOT NULL DEFAULT '0',
  `view_count` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news_type`
--

CREATE TABLE `news_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_type`
--

INSERT INTO `news_type` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'การงาน', NULL, NULL),
(2, 'การเงิน', NULL, NULL),
(3, 'การท่องเที่ยว', NULL, NULL),
(4, 'การศึกษา', NULL, NULL),
(5, 'สุขภาพ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('020b211eb0931d0631825deb864cb6701f887b525e242f4d5b651402915f475b16fa430a8b1baaf9', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 08:12:21', '2019-04-10 08:12:21', '2020-04-10 15:12:21'),
('0aa977c235d95900dcc08cc98fcb707becc387789bee12dc32e8a4c60a670bf7dcbc2852d9f7ea7b', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 07:59:35', '2019-04-10 07:59:35', '2020-04-10 14:59:35'),
('1c6998b1760c8841d96867604a0e2d7ca03bff61120fa5786c0ebded300312e5883aac0c7a8a7d27', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-10 04:48:37', '2019-04-10 04:48:37', '2020-04-10 11:48:37'),
('29408781adf9c7317a14141f161c5c0e33e620bc424513a516c195289f66e955ed4c79e449dd4108', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 08:15:07', '2019-04-10 08:15:07', '2020-04-10 15:15:07'),
('2a045b7b140c4f8f3603bedbccf853ddbd4c902794f2782def846cb64fc99217b11365a8977438ab', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 08:27:15', '2019-04-10 08:27:15', '2020-04-10 15:27:15'),
('2ec9085d937ddb310306b1ceea9cd5367e8ba4bb82592776ccb8ac0bbd3d7751540cfb936ca41278', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-10 04:07:51', '2019-04-10 04:07:51', '2020-04-10 11:07:51'),
('31e61cf2f3ed7ff9f5efe077f286b96b9237edf90143434e51a2d45840b83aea7882fc3a8c4ed539', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 08:13:53', '2019-04-10 08:13:53', '2020-04-10 15:13:53'),
('4bc6f420b15c56dce246ef5870461a804ff23417e957f8c9419ec8b134446f5d364deb094eac2cac', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 08:15:09', '2019-04-10 08:15:09', '2020-04-10 15:15:09'),
('4c9b8be24536824c6d583aabf223b8dd065e22c330dec9d4add3c8a6c1c533b9bcfd7ebdfa3c22d7', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 07:48:38', '2019-04-10 07:48:38', '2020-04-10 14:48:38'),
('4ef15d8253953febc09219cdff0f15566eddbed0ed91ffb18bb14ca53100c6395fd397428f51e09c', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 09:00:35', '2019-04-10 09:00:35', '2020-04-10 16:00:35'),
('5dba8f4a3e4f63b3fce39cfe6bece44a76bbe613e3122bca49d03d7442e4965ce379ec23762f8d6d', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 08:08:49', '2019-04-10 08:08:49', '2020-04-10 15:08:49'),
('61c3202bf669a9f879ee0d05f6588ca069f0d1b008d01b0cc94ce94b2bd4a8130e41b90579ee66e2', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 07:35:19', '2019-04-10 07:35:19', '2020-04-10 14:35:19'),
('6dcf6b6458a3735797a851749d119c40102ad4fc2a885cf7b582db031d9bd3a9367615e4142d7ece', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 08:15:22', '2019-04-10 08:15:22', '2020-04-10 15:15:22'),
('6e5bd456e9b7783261cac28b45f3c0658d3b0b629cdc5b4bbb915a5be276330c59b7931a4eead508', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 08:04:15', '2019-04-10 08:04:15', '2020-04-10 15:04:15'),
('6f89078c11d1210a2b64fae0a9699f21938ed3d70b3ef26e03be69690ea656b4078ba6c9eebdd044', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 07:48:45', '2019-04-10 07:48:45', '2020-04-10 14:48:45'),
('7859a72729944b3f2e3bdc6423b7d155d6b7e6097918b7641df3994836e9d4e42286c980cfdc2fd4', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-10 04:51:07', '2019-04-10 04:51:07', '2020-04-10 11:51:07'),
('8427044d44223010e3febcf7ff78530d647498aa0a1ad351e9ff16ca777f3a6abc52e2532776a716', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 08:29:13', '2019-04-10 08:29:13', '2020-04-10 15:29:13'),
('8a1bb656f756263b717caacdbd923ed2af150998e7375a1fb682d6c521b0786cbec70945a4ac986d', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 08:11:34', '2019-04-10 08:11:34', '2020-04-10 15:11:34'),
('982b2d0577e653f95a3864d899b342ed787f5794f3b7a8a3086129afd58d1f6fb0ca9922647ce393', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 08:31:38', '2019-04-10 08:31:38', '2020-04-10 15:31:38'),
('b256d751ec887284f75bb39147b510f68000358435acd2e0467be10cb42a4a042aadec5ec9ecd3af', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 08:13:21', '2019-04-10 08:13:21', '2020-04-10 15:13:21'),
('bc3620418c932b25911ec89c0118b2d1eb2aa855f8cc7748e6134e1427fc81c06e92109a67161feb', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 08:00:28', '2019-04-10 08:00:28', '2020-04-10 15:00:28'),
('c2f07c317781b8329f953a9c9064fb9e728520f8ad0df20c1493b5e6d2978bf2b32f8fdb3b75a47b', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-10 04:49:01', '2019-04-10 04:49:01', '2020-04-10 11:49:01'),
('c38ec4742340a09909e317ae3d09503d416fdbc21692f709ae25f4cb1dc360b914d1a231582fc36e', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 08:13:12', '2019-04-10 08:13:12', '2020-04-10 15:13:12'),
('c68f76571dd16de07c406f0e689cbf4127e25cf1b00e667968326bbe6634a70f40c2ca84f8bb971b', 2, 1, 'Personal Access Token', '[]', 0, '2019-04-10 04:08:41', '2019-04-10 04:08:41', '2020-04-10 11:08:41'),
('e0aa7752a772d0f8a0f0b8265f9864d166683ebbed57c9bbfbe01c9c0162eea398a590c10859f70f', 3, 1, 'Personal Access Token', '[]', 0, '2019-04-10 04:11:34', '2019-04-10 04:11:34', '2020-04-10 11:11:34'),
('eca7325f96664327848cc18eb4e7b4f4ef7e93c88a31507e2286ce97bfde09949fd96a8b1ba682f0', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-10 04:50:12', '2019-04-10 04:50:12', '2020-04-10 11:50:12');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'q7yUBOte0UqW1XilzdewIn7BFMny5SY8UgECZm4L', 'http://localhost', 1, 0, 0, '2019-04-10 04:07:40', '2019-04-10 04:07:40'),
(2, NULL, 'Laravel Password Grant Client', 'NSmaHETJbz3G1yrDPqcWvdivOCuHKyQTYlAprntJ', 'http://localhost', 0, 1, 0, '2019-04-10 04:07:40', '2019-04-10 04:07:40');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-04-10 04:07:40', '2019-04-10 04:07:40');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organize`
--

CREATE TABLE `organize` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` bigint(20) NOT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organize`
--

INSERT INTO `organize` (`id`, `name`, `group_id`, `district`, `province`, `postcode`, `created_at`, `updated_at`) VALUES
(1, 'กระทรวง 1', 2, 'จตุจักร', 'กทม.', '10900', NULL, NULL),
(2, 'กระทรวง 2', 3, 'พญาไท', 'กทม.', '10400', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organize_id` bigint(20) UNSIGNED DEFAULT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `organize_id`, `group_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'hine', 'test@gmail.com', NULL, '$2y$10$epnpCZKEhXwzuo9xzFr6COZ3N65oOcOzkSbTioR4hCfG2BXMhEy/u', 1, 3, NULL, '2019-04-10 04:07:10', '2019-04-10 04:07:10', NULL),
(2, 'majin', 'test2@gmail.com', NULL, '$2y$10$CZaKRy1DBpND694v8xEz9eUTyhLHsYmGDILOPCW2MOfq012hlRKVe', 2, 2, NULL, '2019-04-10 04:08:17', '2019-04-10 04:08:17', NULL),
(3, 'boo', 'test3@gmail.com', NULL, '$2y$10$huJRrq4TroZ3pzfV.N2NReFuAKlI8u0l7LXJnJOv48fxt27uKS.Q6', 1, 2, NULL, '2019-04-10 04:10:02', '2019-04-10 04:10:02', NULL),
(4, 'test14', 'test14@gmail.com', NULL, '$2y$10$YIYOp9XN4s5OGiY9ZJiCbeojvhWINM3wAnfvFbxU62/Yv2IW3kjlK', 1, 3, NULL, '2019-04-10 04:41:22', '2019-04-10 04:41:22', NULL),
(5, 'hine', 'testnew@gmail.com', NULL, '$2y$10$HlTL7B72qeUA8cVBxnXr0.aciJ54Oy3b2XVO9nSLNcNKZIM2B7TI2', 2, 2, NULL, '2019-04-10 06:50:51', '2019-04-10 06:50:51', NULL),
(6, 'test', 'testttt@gamil.com', NULL, '$2y$10$dnvIthZdcYzlQz6Yh92brOPrGuqJWZ49bzWLWMxioYN7a89fxSP9W', 1, 2, NULL, '2019-04-10 06:53:46', '2019-04-10 06:53:46', NULL),
(7, 'test55', 'test55@gmail.com', NULL, '$2y$10$zOOEaPXzJuOus0KhW3wy7eiAbC1YeyGMA2Dj2HMDlDbywoMUuZzoy', 2, 2, NULL, '2019-04-10 07:35:58', '2019-04-10 07:35:58', NULL),
(8, 'noo', 'test33@gmail.com', NULL, '$2y$10$wDvLtn1PFllx2gUHA/tovOeY0GTQE8BC/Ms3oXbLBANJJ0i.aKtXO', 2, 2, NULL, '2019-04-10 07:44:53', '2019-04-10 07:44:53', NULL),
(9, 'noo', 'test66@gmail.com', NULL, '$2y$10$/thNRzRw.VBqzT1kKWFWdOZGM.3ECOxHSOPH2gKS5EXjtcKDDXn6W', 2, 3, NULL, '2019-04-10 07:45:39', '2019-04-10 07:45:39', NULL),
(10, 'noo', 'test77@gmail.com', NULL, '$2y$10$mhmYP4/WLHZ6MLxaUV8.I.rPHtb4xY5qDi0h6DzsGEplDkAVOgsY2', 1, 2, NULL, '2019-04-10 07:45:55', '2019-04-10 07:45:55', NULL),
(11, 'hine22', 'test88@gmail.com', NULL, '$2y$10$DbSmnNYb6XZPtBr6l5wIguVrROgNMFKVL8ZPSAVLQWEuBnXwrdJWu', 2, 2, NULL, '2019-04-10 07:48:32', '2019-04-10 07:48:32', NULL),
(12, 'testtt', 'testteeet@ku.th', NULL, 'test1234', 1, 11, NULL, '2019-04-10 09:15:46', '2019-04-10 09:15:46', NULL),
(13, 'testtt', 'test12eee@gmail.com', NULL, 'test1234', 1, 22, NULL, '2019-04-10 09:18:22', '2019-04-10 09:18:22', NULL),
(14, 'testttee', 'test12eeeeee@gmail.com', NULL, 'test1234', 1, 22, NULL, '2019-04-10 09:19:53', '2019-04-10 09:19:53', NULL),
(15, 'testtteee', 'test12eeeeeeeee@gmail.com', NULL, 'test1234', 1, 22, NULL, '2019-04-10 09:21:00', '2019-04-10 09:21:00', NULL),
(16, 'testfinal', 'test12final@gmail.com', NULL, 'test1234', 1, 11, NULL, '2019-04-10 09:21:42', '2019-04-10 09:21:42', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `group_user`
--
ALTER TABLE `group_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_type`
--
ALTER TABLE `news_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_type_type_unique` (`type`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `organize`
--
ALTER TABLE `organize`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `organize_name_unique` (`name`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `group_user`
--
ALTER TABLE `group_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_type`
--
ALTER TABLE `news_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `organize`
--
ALTER TABLE `organize`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
