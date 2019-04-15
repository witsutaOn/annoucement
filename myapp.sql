-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2019 at 08:42 PM
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
(5, 'สุขภาพ', NULL, NULL),
(6, 'test', '2019-04-15 10:30:49', '2019-04-15 10:30:49'),
(9, 'test22', '2019-04-15 10:33:23', '2019-04-15 10:33:23');

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
('002484d7ebe64f35fe270bfe48ca5d8bfc52061ad0e2e28bec14642fc53f48bb26f53a74d4cca7b8', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:23:46', '2019-04-15 09:23:46', '2020-04-15 16:23:46'),
('020b211eb0931d0631825deb864cb6701f887b525e242f4d5b651402915f475b16fa430a8b1baaf9', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 08:12:21', '2019-04-10 08:12:21', '2020-04-10 15:12:21'),
('05cb686f8581beb2d2cfa6c0e90b7d40115ae394ddfcaf4110d1668d27ea1c9257a13b87daa96ddf', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 04:45:49', '2019-04-15 04:45:49', '2020-04-15 11:45:49'),
('07e5b40335aaf070fea7c4fb0a5a70303ca7b2ed5f380d84fe76c358180e6260680c8eb6ea47f8f7', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 04:48:04', '2019-04-15 04:48:04', '2020-04-15 11:48:04'),
('0aa977c235d95900dcc08cc98fcb707becc387789bee12dc32e8a4c60a670bf7dcbc2852d9f7ea7b', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 07:59:35', '2019-04-10 07:59:35', '2020-04-10 14:59:35'),
('15444e4195a8d5c228df8ca22a4eb1a1e34aadedfe9a4c4d186f8e41a90ef64565dbd86bcd305863', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:08:40', '2019-04-15 09:08:40', '2020-04-15 16:08:40'),
('15c13b07ec01e0e97f9ceb4dcc7a9f7eaf4d5dd80b6ea185988c9b696a44dbb1a75a0b235e1fb667', 2, 1, 'Personal Access Token', '[]', 0, '2019-04-15 11:34:40', '2019-04-15 11:34:40', '2020-04-15 18:34:40'),
('166776a1fae313530f1d3dfbaa3e7cbccc35fb8c108acfba34f8fafd5e0647112ea5d35714d25921', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:38:40', '2019-04-15 09:38:40', '2020-04-15 16:38:40'),
('16c5434e320175eec0e17850b2cd847bef93778db90b60b198f064b25f83190d3cd3a9727d864cab', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 04:40:07', '2019-04-15 04:40:07', '2020-04-15 11:40:07'),
('16cf267c451d84c08fde5489eef6c1189e713fced3064b7d182ec970d0b2acde2ca12346514237bd', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:34:19', '2019-04-15 09:34:19', '2020-04-15 16:34:19'),
('1aee2dbda6de39a232938bc39e5745275f05d41e150dfbdfd2f8835f8bb29083be1e669904d9fb81', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:33:11', '2019-04-15 09:33:11', '2020-04-15 16:33:11'),
('1b8b546c91a291160c3e2a4492217822803d2c0222b7708685e959a1ca45807f6f0496ebebbf4420', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:35:37', '2019-04-15 09:35:37', '2020-04-15 16:35:37'),
('1c6998b1760c8841d96867604a0e2d7ca03bff61120fa5786c0ebded300312e5883aac0c7a8a7d27', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-10 04:48:37', '2019-04-10 04:48:37', '2020-04-10 11:48:37'),
('2253af3f31046585dda90e52da2ea5a003bd293efc7da181100c74f1324cb8c48c46e39a9d0250f5', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:07:26', '2019-04-15 09:07:26', '2020-04-15 16:07:26'),
('29408781adf9c7317a14141f161c5c0e33e620bc424513a516c195289f66e955ed4c79e449dd4108', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 08:15:07', '2019-04-10 08:15:07', '2020-04-10 15:15:07'),
('2a045b7b140c4f8f3603bedbccf853ddbd4c902794f2782def846cb64fc99217b11365a8977438ab', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 08:27:15', '2019-04-10 08:27:15', '2020-04-10 15:27:15'),
('2b3e710e4f28e6de043f29e24ffdaa4058c357141d986b531102a09be539560ef3d5f1ca1de184a0', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:30:53', '2019-04-15 09:30:53', '2020-04-15 16:30:53'),
('2ec9085d937ddb310306b1ceea9cd5367e8ba4bb82592776ccb8ac0bbd3d7751540cfb936ca41278', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-10 04:07:51', '2019-04-10 04:07:51', '2020-04-10 11:07:51'),
('2fd1a1de87b1df8c3cc47c376481eeb26b8ebce8b2f6e0f28998212177aaeb52043ec2833eb94c09', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:29:47', '2019-04-15 09:29:47', '2020-04-15 16:29:47'),
('31e61cf2f3ed7ff9f5efe077f286b96b9237edf90143434e51a2d45840b83aea7882fc3a8c4ed539', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 08:13:53', '2019-04-10 08:13:53', '2020-04-10 15:13:53'),
('3447b32ebe6e2548cca8167e756724cb26e4e2a233cd6db6c6112d4793340f55ded50d6809241881', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:42:59', '2019-04-15 09:42:59', '2020-04-15 16:42:59'),
('3d43bc12cdf46e06c9347ca14b236a537cfbb942da4c026db87b6c51fd71985f8cb907b083907f35', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 11:30:28', '2019-04-15 11:30:28', '2020-04-15 18:30:28'),
('4afa5e1bafe6755ef38bbd692b416216198f5203d0b3ff673afdcd14fe6cbe25b9728069a2b6ba36', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 04:37:31', '2019-04-15 04:37:31', '2020-04-15 11:37:31'),
('4bc6f420b15c56dce246ef5870461a804ff23417e957f8c9419ec8b134446f5d364deb094eac2cac', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 08:15:09', '2019-04-10 08:15:09', '2020-04-10 15:15:09'),
('4c9b8be24536824c6d583aabf223b8dd065e22c330dec9d4add3c8a6c1c533b9bcfd7ebdfa3c22d7', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 07:48:38', '2019-04-10 07:48:38', '2020-04-10 14:48:38'),
('4ef15d8253953febc09219cdff0f15566eddbed0ed91ffb18bb14ca53100c6395fd397428f51e09c', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 09:00:35', '2019-04-10 09:00:35', '2020-04-10 16:00:35'),
('5351aa8574c11b28c336baad61eae69e9d8740b05638be1572cf1573ae30be145f339960869d7183', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:29:04', '2019-04-15 09:29:04', '2020-04-15 16:29:04'),
('5bf53130248cee8be653eb99ebef4f7bf6be641fc62ac7cc928ba7e6e6d47db2a1170df9694e391f', 2, 1, 'Personal Access Token', '[]', 0, '2019-04-15 11:31:38', '2019-04-15 11:31:38', '2020-04-15 18:31:38'),
('5dba8f4a3e4f63b3fce39cfe6bece44a76bbe613e3122bca49d03d7442e4965ce379ec23762f8d6d', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 08:08:49', '2019-04-10 08:08:49', '2020-04-10 15:08:49'),
('5ff86f5ea1a2691204955e1bc705a31c54390c640eafccb0650b6b1bcd497b396e50e816d4989907', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 04:34:28', '2019-04-15 04:34:28', '2020-04-15 11:34:28'),
('61c3202bf669a9f879ee0d05f6588ca069f0d1b008d01b0cc94ce94b2bd4a8130e41b90579ee66e2', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 07:35:19', '2019-04-10 07:35:19', '2020-04-10 14:35:19'),
('62c142e6f7e321b62dee000f4a0b20fcbe973485de3277b360252e1533a6578ca9a37a1ebcc42c8c', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:34:40', '2019-04-15 09:34:40', '2020-04-15 16:34:40'),
('648baddec72255a571aed43fc1653f2cdb22eb6ca4e18b3159ad449307236f07f8dc616bb5e138c2', 23, 1, 'Personal Access Token', '[]', 0, '2019-04-15 11:40:25', '2019-04-15 11:40:25', '2020-04-15 18:40:25'),
('66f2c194231b54a71e525b53ee46f694b48eab05e75855e9c3d740c742ac487a5e7f83ad5c1aa030', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 11:28:07', '2019-04-15 11:28:07', '2020-04-15 18:28:07'),
('6b37e3361ee90e2ce8ce6ec0a12f2ce0c0617854f43f7a92cad3e37f9fef5166e92e54c6946ca164', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 04:42:40', '2019-04-15 04:42:40', '2020-04-15 11:42:40'),
('6ccd68fc6697a5ca36e13c53c9a7e10ccaa9d72585d1a3b27e0d9c8e969c45ada4c7079c6ad56de7', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:25:57', '2019-04-15 09:25:57', '2020-04-15 16:25:57'),
('6cd88c1eb5744a4d6191f4ec8222cfb292dbe457c52862c4b95f51bfe2b019dc2e24d200edc761f8', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:36:26', '2019-04-15 09:36:26', '2020-04-15 16:36:26'),
('6dcf6b6458a3735797a851749d119c40102ad4fc2a885cf7b582db031d9bd3a9367615e4142d7ece', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 08:15:22', '2019-04-10 08:15:22', '2020-04-10 15:15:22'),
('6e5bd456e9b7783261cac28b45f3c0658d3b0b629cdc5b4bbb915a5be276330c59b7931a4eead508', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 08:04:15', '2019-04-10 08:04:15', '2020-04-10 15:04:15'),
('6f89078c11d1210a2b64fae0a9699f21938ed3d70b3ef26e03be69690ea656b4078ba6c9eebdd044', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 07:48:45', '2019-04-10 07:48:45', '2020-04-10 14:48:45'),
('74439ef41d3aba071ce3b1f981f3eb77e237d042762f2d2f8ba99664529924daabd0ffba70625d79', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:37:31', '2019-04-15 09:37:31', '2020-04-15 16:37:31'),
('772bed5d9c97ae2b9ffeb69a726bc4e6a6a31ce8f8e19f5f4cbdd6f336e90da082741f91ee886ba3', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:33:45', '2019-04-15 09:33:45', '2020-04-15 16:33:45'),
('780d423faf4ddbc9aca7a8311a3d94f91a204ebaf4fb3093269a61f241a673f1d6ae1b53d80d68fb', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 10:54:59', '2019-04-15 10:54:59', '2020-04-15 17:54:59'),
('7859a72729944b3f2e3bdc6423b7d155d6b7e6097918b7641df3994836e9d4e42286c980cfdc2fd4', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-10 04:51:07', '2019-04-10 04:51:07', '2020-04-10 11:51:07'),
('7c2b02a784f74da252fe8458519206c0f885f34caae163d280fdf6a29451e819e5eeb625bca14260', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:43:33', '2019-04-15 09:43:33', '2020-04-15 16:43:33'),
('83296b02846aee471e2babc443158b65d75d77f9f3effa937456b5cfbf67c8ac43899ddd3060d468', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 04:33:57', '2019-04-15 04:33:57', '2020-04-15 11:33:57'),
('8427044d44223010e3febcf7ff78530d647498aa0a1ad351e9ff16ca777f3a6abc52e2532776a716', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 08:29:13', '2019-04-10 08:29:13', '2020-04-10 15:29:13'),
('8913d4fb9f1d07877f777213e5549556af46f284fe9d676b19d3a5b33a8a32db883633a4266aa031', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:37:57', '2019-04-15 09:37:57', '2020-04-15 16:37:57'),
('895f60f9ef04b5e40be880ee6ceb87b0e15447ae17f123e8a82b2d7e44e3a35eca7e9e93f81a6991', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:32:31', '2019-04-15 09:32:31', '2020-04-15 16:32:31'),
('8a1bb656f756263b717caacdbd923ed2af150998e7375a1fb682d6c521b0786cbec70945a4ac986d', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 08:11:34', '2019-04-10 08:11:34', '2020-04-10 15:11:34'),
('8aba3ad4c866e32daa2249f7539ac2a7ab91b3b30a83b0e9b0453d2919060e366494dee3e0168add', 2, 1, 'Personal Access Token', '[]', 0, '2019-04-15 11:33:55', '2019-04-15 11:33:55', '2020-04-15 18:33:55'),
('8b422cf5804b59bc979dfc099489c64e07eeaacff398c06df46b278c83ce44d51b3267a0d265dd18', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:02:13', '2019-04-15 09:02:13', '2020-04-15 16:02:13'),
('8db464b45d854766ca5f6be104bcb20d1e581e620902f8d94ce4d6dc53d2e709da2803b0add7b4de', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:36:34', '2019-04-15 09:36:34', '2020-04-15 16:36:34'),
('8dd7b2b7d21a6e0f81bbf048f9d0c78660a31e26292ead1963c5183263b7b44188fa27d6dc14655f', 2, 1, 'Personal Access Token', '[]', 0, '2019-04-15 10:55:58', '2019-04-15 10:55:58', '2020-04-15 17:55:58'),
('8de941cb682cbeb157f540d70f3651531c2125e98f96c3b0e6888a709e0a0e845a06a7e781ab1c42', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:27:52', '2019-04-15 09:27:52', '2020-04-15 16:27:52'),
('8fc28d6f6551ab244b6e7cf48dd60b8e9b52b5784cdf76bb01d290c28362b02eb2c66a8f672125ef', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 04:38:17', '2019-04-15 04:38:17', '2020-04-15 11:38:17'),
('9371a4877913857d6023a1e438633cce296b78d97aa5a54c0a1daea9742f4f80c08992903c7c653d', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:06:37', '2019-04-15 09:06:37', '2020-04-15 16:06:37'),
('982b2d0577e653f95a3864d899b342ed787f5794f3b7a8a3086129afd58d1f6fb0ca9922647ce393', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 08:31:38', '2019-04-10 08:31:38', '2020-04-10 15:31:38'),
('9b6475f9f7ebd7bf9cd758af16dd152e45af9f91b2045bb52bf3238f31c4fce22f15e432a7977ef0', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 04:40:47', '2019-04-15 04:40:47', '2020-04-15 11:40:47'),
('9f1720a94f8c1b688c6b9fcfdc9b46a40322c3c6918d8d796fbd399d2a928a7ab6400429e92393ee', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:05:08', '2019-04-15 09:05:08', '2020-04-15 16:05:08'),
('a027b4d82f225082a797ff1684b3f750f6bb5aa67db75957daa25517afb9fc6093e414139c10a050', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 10:55:23', '2019-04-15 10:55:23', '2020-04-15 17:55:23'),
('a36c6c4845b36976f3a467e6469d52724a1e9977127ca21e2efee9debebb38638130e22e76076b48', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-15 02:20:05', '2019-04-15 02:20:05', '2020-04-15 09:20:05'),
('aab2ab6daea2790824a430f9382d346b2fc61b80577a90fefaf4a6787b8dcb2167ec638cd224ee8e', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:40:07', '2019-04-15 09:40:07', '2020-04-15 16:40:07'),
('b256d751ec887284f75bb39147b510f68000358435acd2e0467be10cb42a4a042aadec5ec9ecd3af', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 08:13:21', '2019-04-10 08:13:21', '2020-04-10 15:13:21'),
('b3b7cf741db578a81ea7c7bc25eeb1835dadd5f105de6dded5823293e283baa2fe7eda08bf34862f', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 02:21:19', '2019-04-15 02:21:19', '2020-04-15 09:21:19'),
('b4d24dd9a22786cc359a04e0f89f144a1a9a6b2234ecf08a05f0dc66efa8f1d15e5f09816b2f14ab', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:39:58', '2019-04-15 09:39:58', '2020-04-15 16:39:58'),
('bb5e9add099bbd117ed7a03da8670204bfe741238b955c5c82f2aec55f9edaedc8f5d17e141309eb', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 11:25:51', '2019-04-15 11:25:51', '2020-04-15 18:25:51'),
('bc3620418c932b25911ec89c0118b2d1eb2aa855f8cc7748e6134e1427fc81c06e92109a67161feb', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 08:00:28', '2019-04-10 08:00:28', '2020-04-10 15:00:28'),
('bdbe60910fc193780f2a5beabb2344f0e814979286165f39c1e8eca7588b9edfc0793c061ae7bf08', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:43:21', '2019-04-15 09:43:21', '2020-04-15 16:43:21'),
('c2f07c317781b8329f953a9c9064fb9e728520f8ad0df20c1493b5e6d2978bf2b32f8fdb3b75a47b', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-10 04:49:01', '2019-04-10 04:49:01', '2020-04-10 11:49:01'),
('c38ec4742340a09909e317ae3d09503d416fdbc21692f709ae25f4cb1dc360b914d1a231582fc36e', 5, 1, 'Personal Access Token', '[]', 0, '2019-04-10 08:13:12', '2019-04-10 08:13:12', '2020-04-10 15:13:12'),
('c62ec414feba7a50ac12bafc32633ca400a657e574352fddd62e1675d685bd2d4de801437343fd54', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:24:25', '2019-04-15 09:24:25', '2020-04-15 16:24:25'),
('c68f76571dd16de07c406f0e689cbf4127e25cf1b00e667968326bbe6634a70f40c2ca84f8bb971b', 2, 1, 'Personal Access Token', '[]', 0, '2019-04-10 04:08:41', '2019-04-10 04:08:41', '2020-04-10 11:08:41'),
('ca894e958028df52faedab4f04a6066f4f3b7e3e92099c760458fe614c1d3e4bdfdfb83f6378f4e1', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 04:39:03', '2019-04-15 04:39:03', '2020-04-15 11:39:03'),
('cf7334d2ba1e972e0b69ec63c9cc0ed5286c24535be749b3ddc722ee1f6812d2ae36c63c319a4012', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 04:42:06', '2019-04-15 04:42:06', '2020-04-15 11:42:06'),
('d07c6816ae0ce1a14f619bdd065d3a50d3c67ef5c9775f10b280b9316425eddea974aae6714ff8d8', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 04:20:16', '2019-04-15 04:20:16', '2020-04-15 11:20:16'),
('d4c5a987ea544baaa7a96eb1a6ee23ee4258a3662930acb30e4f14efff58ff879f8f94ee965bf3d5', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 04:32:51', '2019-04-15 04:32:51', '2020-04-15 11:32:51'),
('dab88f32ad7a50608e482e4297aef3ab272c21b3b969c1232299294dd3219f693841f404fff49404', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 11:31:15', '2019-04-15 11:31:15', '2020-04-15 18:31:15'),
('e061ae7c70312e6f2d628f7974e0cc610f95e1d9cf98becd6736197d1eb7a1b3b83addf73697bb35', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:32:14', '2019-04-15 09:32:14', '2020-04-15 16:32:14'),
('e0aa7752a772d0f8a0f0b8265f9864d166683ebbed57c9bbfbe01c9c0162eea398a590c10859f70f', 3, 1, 'Personal Access Token', '[]', 0, '2019-04-10 04:11:34', '2019-04-10 04:11:34', '2020-04-10 11:11:34'),
('e0c54ccd2b44d7f9e2890333ae006b9dabc4cb5c86a12d90abbd5c614bea49af33a5396fa0b3461e', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:22:02', '2019-04-15 09:22:02', '2020-04-15 16:22:02'),
('e2ca8674ec8109675f7a4c6f849e916becf096134af2cbd3b49a5fa19fb1b0d9e08956ee4911de79', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 11:25:11', '2019-04-15 11:25:11', '2020-04-15 18:25:11'),
('e340a2926553344a3eecfec6b66e8518add8c1edd73e0c92d2c3a2d15538d9fbe260f15c10662010', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:27:23', '2019-04-15 09:27:23', '2020-04-15 16:27:23'),
('e68d78bbb527be93c713f9af8a46b69a3757999de510bc45f4d8c4854dfb847f68281c927fdf5d8d', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:24:59', '2019-04-15 09:24:59', '2020-04-15 16:24:59'),
('e85470c6c88937ec1457dfc3f111815d618ffe3b74f91da42a9401bcb201465b4cb99dbac7d47e99', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 11:33:43', '2019-04-15 11:33:43', '2020-04-15 18:33:43'),
('eca7325f96664327848cc18eb4e7b4f4ef7e93c88a31507e2286ce97bfde09949fd96a8b1ba682f0', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-10 04:50:12', '2019-04-10 04:50:12', '2020-04-10 11:50:12'),
('efdb51fd2dad478636f0470dcad677d31bebf0e53e24049d82dc31d6126f2565d7221480fefb989a', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:23:03', '2019-04-15 09:23:03', '2020-04-15 16:23:03'),
('f120f66d79284369a5ffca25bcf18ea48a7a90d53d8812519be6f1507f93ea1f6f66a67f40d34353', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 08:35:18', '2019-04-15 08:35:18', '2020-04-15 15:35:18'),
('f55a48c6d2937efa883c3ea3e67409e55c0a52eb1d1d68ec45ca5b141d4850451839382bc88aca49', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:36:58', '2019-04-15 09:36:58', '2020-04-15 16:36:58'),
('f688bdad9d1a3864087eff1f5846d3f82a63ca8da540b14c0982ddffe5fb21ab5bc7323bc60b40b0', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 11:29:55', '2019-04-15 11:29:55', '2020-04-15 18:29:55'),
('fa7772fce19db8a6434f22377943802394df6746973331ff2004e9a7f27169292f99949f544ab595', 1, 1, 'Personal Access Token', '[]', 0, '2019-04-15 09:25:30', '2019-04-15 09:25:30', '2020-04-15 16:25:30');

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
(2, 'กระทรวง 2', 3, 'พญาไท', 'กทม.', '10400', NULL, NULL),
(3, 'hine', 3, 'สุขุมวิท', 'กทม.', '12340', '2019-04-15 11:18:19', '2019-04-15 11:18:19'),
(5, 'กระทรวง3', 3, 'สุขุมวิท', 'กทม.', '12340', '2019-04-15 11:18:44', '2019-04-15 11:18:44'),
(7, 'กระทรวง4', 3, 'สุขุมวิท', 'กทม.', '12458', '2019-04-15 11:21:04', '2019-04-15 11:21:04'),
(8, 'กระทรวง456', 3, 'สุขุมวิท', 'กทม.', '14780', '2019-04-15 11:31:56', '2019-04-15 11:31:56');

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
(16, 'testfinal', 'test12final@gmail.com', NULL, 'test1234', 1, 11, NULL, '2019-04-10 09:21:42', '2019-04-10 09:21:42', NULL),
(17, 'hine', 'testgg@gmail.com', NULL, 'test1478', 1, 11, NULL, '2019-04-15 08:36:32', '2019-04-15 08:36:32', NULL),
(18, 'gogo', 'testtt@outlook.com', NULL, 'test1234', 2, 2, NULL, '2019-04-15 08:38:27', '2019-04-15 08:38:27', NULL),
(19, 'testhash', 'test@outlook.com', NULL, '$2y$10$sRFvelmsWiNr.RyvaYcK6ePHVzKqrLd4f6Ota4cc9lmPeDBhasBc.', 2, 3, NULL, '2019-04-15 08:40:17', '2019-04-15 08:40:17', NULL),
(20, 'test23', 'testnewgogo@gmail.com', NULL, 'test1234', 2, 11, NULL, '2019-04-15 09:49:03', '2019-04-15 09:49:03', NULL),
(21, 'hinetest', 'test1234@gmail.com', NULL, '$2y$10$8u.QkfYYdVB8BnL7udySmeAKekJSTgyLbgR6q4sofmIRUBp.bAKMa', 2, 2, NULL, '2019-04-15 09:52:10', '2019-04-15 09:52:10', NULL),
(22, 'gg', 'gg@g.com', NULL, 'test', NULL, 1, NULL, NULL, NULL, NULL),
(23, 'SupAd', 'supadmin@gmail.com', NULL, '$2y$10$kpJmGUnj6f/FR6Sj4EGCquAvBPvUjlAlpVRTWgB8E0/1dAND/ylj6', 5, 1, NULL, '2019-04-15 11:39:01', '2019-04-15 11:39:01', NULL),
(24, 'gogosup', 'testsup@gmail.com', NULL, '$2y$10$.EbRBE0ogKVnSx24uWg2SebCMeJwN/EFbmoHjILcIfsTM2DWo/DSy', 7, 3, NULL, '2019-04-15 11:40:57', '2019-04-15 11:40:57', NULL);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
