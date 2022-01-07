-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 06 Oca 2022, 15:53:15
-- Sunucu sürümü: 10.4.22-MariaDB
-- PHP Sürümü: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sah`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin_auths`
--

CREATE TABLE `admin_auths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auths` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `admin_auths`
--

INSERT INTO `admin_auths` (`id`, `name`, `auths`, `created_at`, `updated_at`) VALUES
(1, 'Yönetici', '[\"menu_1\",\"menu_11\",\"menu_12\",\"menu_9\",\"menu_10\",\"menu_6\",\"menu_8\",\"menu_2\",\"menu_3\",\"menu_4\",\"menu_5\",\"menu_7\",\"auth_users_stats\"]', '2021-08-08 18:10:20', '2021-08-11 13:01:20');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin_users`
--

CREATE TABLE `admin_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth_id` bigint(20) UNSIGNED NOT NULL,
  `log_kayit` int(11) NOT NULL DEFAULT 1,
  `iki_adimli` int(11) NOT NULL DEFAULT 0,
  `hesap_onay` int(11) NOT NULL DEFAULT 0,
  `darkmode` int(11) NOT NULL DEFAULT 0,
  `eposta` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sifre` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `profil_resmi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soyad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefon` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dogum_tarihi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adres` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dil` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'tr',
  `tarih_formati` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'd.m.Y',
  `zaman_dilimi` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Europe/Istanbul',
  `notifications` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `admin_users`
--

INSERT INTO `admin_users` (`id`, `token`, `auth_id`, `log_kayit`, `iki_adimli`, `hesap_onay`, `darkmode`, `eposta`, `sifre`, `profil_resmi`, `ad`, `soyad`, `telefon`, `dogum_tarihi`, `adres`, `dil`, `tarih_formati`, `zaman_dilimi`, `notifications`, `created_at`, `updated_at`) VALUES
(1, 'e46d9a50-f873-11eb-a5bd-305a3a4abe7a', 1, 1, 0, 0, 0, 'yasin@test.com', '202cb962ac59075b964b07152d234b70', NULL, 'Yasin', 'ŞAHİN', '05392918278', '08.05.1997', 'test adres', 'tr', 'd.m.Y', 'Europe/Istanbul', '[\"admin_send_notifications\"]', '2021-08-08 18:10:20', '2022-01-06 14:47:15');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin_users_activities`
--

CREATE TABLE `admin_users_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `browser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin_users_notifications`
--

CREATE TABLE `admin_users_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `read_state` int(11) NOT NULL DEFAULT 0,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `renk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(20, 'SOĞUK KAHVELER', '2021-08-14 22:37:57', '2021-08-14 22:49:03'),
(21, 'KAHVELER', '2021-08-14 22:39:05', '2021-08-14 22:39:05'),
(22, 'SOĞUK İÇECEKLER', '2021-08-14 22:55:23', '2021-08-14 22:55:23'),
(23, 'VİTAMİN', '2021-08-14 23:03:21', '2021-08-14 23:03:21'),
(24, 'FROZEN', '2021-08-14 23:04:58', '2021-08-14 23:04:58'),
(25, 'MILKSHAKE', '2021-08-14 23:08:07', '2021-08-14 23:08:07'),
(26, 'ÇAYLAR', '2021-08-14 23:10:56', '2021-08-14 23:10:56'),
(27, 'KOKTEYL', '2021-08-14 23:14:32', '2021-08-14 23:14:32'),
(28, 'SICAK İÇECEKLER', '2021-08-14 23:22:20', '2021-08-14 23:22:20'),
(29, 'PASTALAR', '2021-08-14 23:27:41', '2021-08-14 23:27:41'),
(30, 'WAFFLE', '2021-08-14 23:32:09', '2021-08-14 23:32:09'),
(31, 'EXTRA', '2021-08-14 23:33:59', '2021-08-14 23:33:59'),
(32, 'NARGİLE', '2021-08-14 23:35:15', '2021-08-14 23:35:15'),
(34, 'TOSTLAR', '2021-08-14 23:37:00', '2021-08-14 23:37:00'),
(35, 'MAKARNALAR', '2021-08-14 23:37:07', '2021-08-14 23:37:07'),
(36, 'ET YEMEKLERİ', '2021-08-14 23:37:15', '2021-08-14 23:37:15'),
(37, 'PİZZALAR', '2021-08-14 23:37:19', '2021-08-14 23:37:19'),
(38, 'TAVUK YEMEKLERİ', '2021-08-14 23:37:22', '2021-08-14 23:37:22'),
(39, 'HAMBURGERLER', '2021-08-14 23:37:37', '2021-08-14 23:37:37'),
(40, 'WRAPLER', '2021-08-14 23:37:44', '2021-08-14 23:37:44'),
(41, 'KIZARTMALAR', '2021-08-14 23:38:33', '2021-08-14 23:38:33');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
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
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_08_19_000000_create_failed_jobs_table', 1),
(2, '2021_04_30_134359_create_admin_auths_table', 1),
(3, '2021_04_30_185103_create_admin_users_table', 1),
(4, '2021_05_12_211436_create_admin_users_activities_table', 1),
(5, '2021_05_16_022622_create_admin_users_notifications_table', 1),
(6, '2021_08_08_211205_create_categories_table', 2),
(8, '2021_08_09_004831_create_products_table', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `picture` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  `sale_price` double DEFAULT NULL,
  `durum` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `category_id`, `picture`, `name`, `desc`, `price`, `sale_price`, `durum`, `created_at`, `updated_at`) VALUES
(10, 21, NULL, 'TÜRK KAHVESİ', NULL, 12, NULL, 1, '2021-08-14 22:40:23', '2021-08-15 22:06:23'),
(11, 21, NULL, 'OSMANLI DİBEK KAHVESİ', NULL, 15, NULL, 1, '2021-08-14 22:40:42', '2021-08-15 22:06:47'),
(12, 21, NULL, 'DAMLA SAKIZLI TÜRK KAHVESİ', NULL, 13, NULL, 1, '2021-08-14 22:40:56', '2021-08-15 22:07:01'),
(13, 21, NULL, 'SÜTLÜ TÜRK KAHVESİ', NULL, 14, NULL, 1, '2021-08-14 22:41:32', '2021-08-15 22:08:07'),
(14, 21, NULL, 'DOUBLE TÜRK KAHVESİ', NULL, 16, NULL, 1, '2021-08-14 22:41:45', '2021-08-15 22:08:44'),
(15, 21, NULL, 'MENENGİÇ KAHVESİ', NULL, 15, NULL, 1, '2021-08-14 22:41:59', '2021-08-15 22:09:07'),
(16, 21, NULL, 'ESPRESSO', NULL, 14, NULL, 1, '2021-08-14 22:43:01', '2021-08-15 22:09:47'),
(17, 21, NULL, 'AMERICANO', NULL, 15, NULL, 1, '2021-08-14 22:43:20', '2021-08-14 22:46:40'),
(18, 21, NULL, 'CAFFE LATTE', NULL, 16, NULL, 1, '2021-08-14 22:43:38', '2021-08-15 22:10:23'),
(19, 21, NULL, 'CAPPUCCINO', NULL, 17, NULL, 1, '2021-08-14 22:44:19', '2021-08-15 22:11:16'),
(20, 28, NULL, 'CHAI TEA LATTE', NULL, 15, NULL, 1, '2021-08-14 22:44:37', '2021-08-15 22:35:31'),
(21, 21, NULL, 'CAFE MOCHA', NULL, 16, NULL, 1, '2021-08-14 22:44:53', '2021-09-01 11:52:16'),
(22, 21, NULL, 'WHITE MOCHA', NULL, 17, NULL, 1, '2021-08-14 22:45:06', '2021-08-15 22:12:14'),
(23, 21, NULL, 'NESCAFE', NULL, 15, NULL, 1, '2021-08-14 22:45:16', '2021-08-15 22:13:00'),
(24, 21, NULL, 'FILTRE KAHVE', NULL, 16, NULL, 1, '2021-08-14 22:46:08', '2021-08-15 22:13:33'),
(25, 20, NULL, 'ICE AMERICANO', NULL, 15, NULL, 1, '2021-08-14 22:49:35', '2021-08-14 22:53:38'),
(26, 20, NULL, 'ICE LATTE', NULL, 17, NULL, 1, '2021-08-14 22:49:48', '2021-08-15 22:04:02'),
(27, 20, NULL, 'ICE MOCHA', NULL, 18, NULL, 1, '2021-08-14 22:50:05', '2021-08-15 22:05:48'),
(28, 20, NULL, 'ICE WHITE MOCHA', NULL, 17, NULL, 1, '2021-08-14 22:51:55', '2021-09-01 11:54:32'),
(29, 20, NULL, 'FRAPPE', 'Oreo, Çilek, Karamel, Çikolata, Vanilya', 18, NULL, 1, '2021-08-14 22:53:30', '2021-09-01 11:52:40'),
(30, 22, NULL, 'AYRAN', NULL, 7, NULL, 1, '2021-08-14 22:56:57', '2021-08-14 23:01:48'),
(31, 22, NULL, 'COCA-COLA', NULL, 8, NULL, 1, '2021-08-14 22:57:09', '2021-08-15 22:14:57'),
(32, 22, NULL, 'FANTA', NULL, 8, NULL, 1, '2021-08-14 22:57:28', '2021-08-15 22:15:13'),
(33, 22, NULL, 'SPRITE', NULL, 8, NULL, 1, '2021-08-14 22:57:36', '2021-08-15 22:15:25'),
(34, 22, NULL, 'FUSE TEA', 'Karpuz, Mango-Ananas, Şeftali,Limon', 8, NULL, 1, '2021-08-14 22:57:46', '2021-08-15 22:16:16'),
(35, 22, NULL, 'CAPPY', 'Vişne,Şeftali,Karışık,Atom', 8, NULL, 1, '2021-08-14 22:58:51', '2021-08-15 22:15:37'),
(36, 22, NULL, 'SODA', NULL, 5, NULL, 1, '2021-08-14 22:59:40', '2021-08-15 22:16:46'),
(37, 22, NULL, 'MEYVELI SODA', 'Çilek,Elma,Limon', 6, NULL, 1, '2021-08-14 23:00:22', '2021-08-14 23:02:11'),
(38, 22, NULL, 'CHURCHILL', NULL, 8, NULL, 1, '2021-08-14 23:00:38', '2021-08-15 22:17:13'),
(39, 22, NULL, 'SU', NULL, 3, NULL, 1, '2021-08-14 23:00:50', '2021-08-14 23:02:15'),
(40, 22, NULL, 'RED BULL', NULL, 16, NULL, 1, '2021-08-14 23:01:32', '2021-08-15 22:17:52'),
(41, 23, NULL, 'PORTAKAL SUYU', NULL, 16, NULL, 1, '2021-08-14 23:03:41', '2021-08-14 23:04:27'),
(42, 23, NULL, 'NAR SUYU', NULL, 16, NULL, 1, '2021-08-14 23:03:50', '2021-08-14 23:04:30'),
(43, 23, NULL, 'LİMONATA', NULL, 15, NULL, 1, '2021-08-14 23:04:03', '2021-09-03 14:05:54'),
(44, 23, NULL, 'PORTAKAL + NAR', NULL, 18, NULL, 1, '2021-08-14 23:04:19', '2021-08-14 23:04:35'),
(45, 24, NULL, 'ŞEFTALİ FROZEN', NULL, 18, NULL, 1, '2021-08-14 23:05:27', '2021-09-01 12:01:03'),
(46, 24, NULL, 'KARPUZ FROZEN', NULL, 18, NULL, 1, '2021-08-14 23:05:38', '2021-09-01 12:01:15'),
(47, 24, NULL, 'KARADUT FROZEN', NULL, 18, NULL, 1, '2021-08-14 23:05:48', '2021-09-01 12:01:27'),
(48, 24, NULL, 'MANGO FROZEN', NULL, 18, NULL, 1, '2021-08-14 23:06:30', '2021-09-01 11:55:59'),
(49, 24, NULL, 'ÇİLEK FROZEN', NULL, 18, NULL, 1, '2021-08-14 23:06:39', '2021-09-01 11:56:18'),
(50, 24, NULL, 'YEŞİL ELMA FROZEN', NULL, 18, NULL, 1, '2021-08-14 23:06:52', '2021-09-01 12:02:01'),
(51, 24, NULL, 'NANE LİMON FROZEN', NULL, 20, NULL, 1, '2021-08-14 23:07:08', '2021-08-15 22:24:25'),
(52, 24, NULL, 'SPECIAL TATLI FROZEN', NULL, 23, NULL, 1, '2021-08-14 23:07:25', '2021-09-01 12:02:48'),
(53, 24, NULL, 'SPECIAL EKŞİ', NULL, 23, NULL, 1, '2021-08-14 23:07:33', '2021-09-01 12:00:40'),
(54, 25, NULL, 'ÇİKOLATA MILKSHAKE', NULL, 19, NULL, 1, '2021-08-14 23:09:16', '2021-09-01 11:57:56'),
(55, 25, NULL, 'ÇİLEK MILKSHAKE', NULL, 19, NULL, 1, '2021-08-14 23:09:29', '2021-09-01 11:59:23'),
(56, 25, NULL, 'KARAMEL MILKSHAKE', NULL, 19, NULL, 1, '2021-08-14 23:09:44', '2021-09-01 11:57:41'),
(57, 25, NULL, 'VANILYA MILKSHAKE', NULL, 19, NULL, 1, '2021-08-14 23:09:57', '2021-09-01 11:57:28'),
(58, 25, NULL, 'OREO SHAKE', NULL, 20, NULL, 1, '2021-08-14 23:10:29', '2021-09-01 11:55:39'),
(59, 26, NULL, 'ÇAY', NULL, 4, NULL, 1, '2021-08-14 23:11:09', '2021-08-14 23:13:24'),
(60, 26, NULL, 'FİNCAN ÇAY', NULL, 6, NULL, 1, '2021-08-14 23:11:22', '2021-08-14 23:13:24'),
(61, 26, NULL, 'ADA ÇAYI', NULL, 16, NULL, 1, '2021-08-14 23:12:15', '2021-08-15 22:28:02'),
(62, 26, NULL, 'KIŞ ÇAYI', NULL, 16, NULL, 1, '2021-08-14 23:12:25', '2021-08-15 22:28:42'),
(63, 26, NULL, 'IHLAMUR', NULL, 16, NULL, 1, '2021-08-14 23:12:36', '2021-08-15 22:28:55'),
(64, 26, NULL, 'NANE LİMON', NULL, 16, NULL, 1, '2021-08-14 23:12:43', '2021-08-15 22:29:15'),
(65, 26, NULL, 'KUŞ BURNU', NULL, 16, NULL, 1, '2021-08-14 23:12:58', '2021-08-15 22:30:42'),
(66, 26, NULL, 'YEŞİL ÇAY', NULL, 16, NULL, 1, '2021-08-14 23:13:06', '2021-08-15 22:29:59'),
(67, 26, NULL, 'NANELİ YEŞİL ÇAY', NULL, 16, NULL, 1, '2021-08-14 23:13:16', '2021-08-15 22:29:32'),
(68, 27, NULL, 'GÖK KUŞAĞI', NULL, 23, NULL, 1, '2021-08-14 23:15:06', '2021-08-15 22:32:05'),
(69, 27, NULL, 'MOJITO', NULL, 24, NULL, 1, '2021-08-14 23:15:16', '2021-08-15 22:32:37'),
(70, 27, NULL, 'SPRASH', NULL, 23, NULL, 1, '2021-08-14 23:16:20', '2021-08-15 22:32:54'),
(71, 27, NULL, 'BLUE BERRY RED BULL', NULL, 25, NULL, 1, '2021-08-14 23:17:09', '2021-09-01 13:01:33'),
(72, 27, NULL, 'FANCY FEET', NULL, 25, NULL, 1, '2021-08-14 23:17:43', '2021-09-01 13:01:49'),
(73, 27, NULL, 'SWEET SOUR', NULL, 25, NULL, 1, '2021-08-14 23:18:18', '2021-09-01 13:01:12'),
(74, 27, NULL, 'COCONOUT CREAM', NULL, 23, NULL, 1, '2021-08-14 23:21:00', '2021-08-15 22:34:33'),
(75, 28, NULL, 'SICAK ÇİKOLATA', NULL, 17, NULL, 1, '2021-08-14 23:22:33', '2021-08-15 22:35:53'),
(76, 28, NULL, 'SALEP', NULL, 17, NULL, 1, '2021-08-14 23:22:45', '2021-08-15 22:36:05'),
(77, 28, NULL, 'FINDIKLI SALEP', NULL, 18, NULL, 1, '2021-08-14 23:23:28', '2021-08-15 22:36:31'),
(78, 28, NULL, 'ÇİLEKLİ SICAK ÇİKOLATA', NULL, 15, NULL, 1, '2021-08-14 23:23:43', '2021-08-14 23:25:26'),
(79, 28, NULL, 'SICAK SÜT', NULL, 8, NULL, 1, '2021-08-14 23:23:52', '2021-08-14 23:25:26'),
(80, 28, NULL, 'BALLI SICAK SÜT', NULL, 14, NULL, 1, '2021-08-14 23:24:01', '2021-08-15 22:37:23'),
(81, 28, NULL, 'BEYAZ ÇİKOLATA', NULL, 13, NULL, 1, '2021-08-14 23:24:25', '2021-08-14 23:25:27'),
(82, 29, NULL, 'TIRAMISU', NULL, 17, NULL, 1, '2021-08-14 23:28:14', '2021-08-14 23:30:12'),
(83, 29, NULL, 'MOZAIK', NULL, 16, NULL, 1, '2021-08-14 23:28:25', '2021-08-14 23:30:12'),
(84, 29, NULL, 'FISTIK RÜYASI', NULL, 19, NULL, 1, '2021-08-14 23:28:42', '2021-08-14 23:30:20'),
(85, 29, NULL, 'ÇİKOLATALI ÇITIR', NULL, 18, NULL, 1, '2021-08-14 23:28:51', '2021-08-14 23:30:20'),
(86, 29, NULL, 'KUŞ SÜTLÜ PASTA', NULL, 18, NULL, 1, '2021-08-14 23:29:01', '2021-08-14 23:30:21'),
(87, 29, NULL, 'CHEESCAKE', NULL, 17, NULL, 1, '2021-08-14 23:29:18', '2021-09-01 13:35:39'),
(88, 29, NULL, 'BELLA WISTA', NULL, 18, NULL, 1, '2021-08-14 23:29:29', '2021-08-14 23:30:24'),
(90, 30, NULL, 'ŞAH WAFFLE', NULL, 27, NULL, 1, '2021-08-14 23:32:58', '2021-09-01 13:28:09'),
(91, 30, NULL, 'TEK MEYVELİ WAFFLE', NULL, 24, NULL, 1, '2021-08-14 23:33:10', '2021-09-01 13:28:25'),
(92, 30, NULL, 'DONDURMALI WAFFLE', NULL, 30, NULL, 1, '2021-08-14 23:33:23', '2021-08-14 23:33:41'),
(93, 31, NULL, 'ÇEREZ TABAĞI', NULL, 20, NULL, 1, '2021-08-14 23:34:12', '2021-08-15 11:04:47'),
(94, 31, NULL, 'MEYVE TABAĞI', NULL, 20, NULL, 1, '2021-08-14 23:34:28', '2021-08-15 11:04:40'),
(95, 34, NULL, 'KAŞARLI TOST', 'PATATES KIZARTMASI İLE', 22, NULL, 1, '2021-08-15 10:53:26', '2021-09-01 13:00:37'),
(96, 34, NULL, 'KARIŞIK TOST', 'PATATES KIZARTMASI İLE', 25, NULL, 1, '2021-08-15 10:56:23', '2021-09-01 13:00:24'),
(97, 34, NULL, 'KAVURMALI KARIŞIK TOST', 'PATATES KIZARTMASI İLE', 28, NULL, 1, '2021-08-15 11:05:50', '2021-08-15 11:07:11'),
(98, 41, NULL, 'PATATES KIZARTMASI', NULL, 14, NULL, 1, '2021-08-15 11:10:32', '2021-08-15 11:12:58'),
(99, 41, NULL, 'KIZARTMA SEPETİ', 'PATATES KIZARTMASI,SOĞAN HALKASI,SOSİS,NUGGET', 24, NULL, 1, '2021-08-15 11:12:35', '2021-08-15 11:12:50'),
(100, 40, NULL, 'ET WRAP', 'PATATES KIZARTMASI VE SALATA İLE', 30, NULL, 1, '2021-09-01 13:04:14', '2021-09-01 13:04:59'),
(101, 40, NULL, 'TAVUK WRAP', 'PATATES KIZRTMASI VE SALATA İLE', 26, NULL, 1, '2021-09-01 13:04:43', '2021-09-01 13:05:05'),
(102, 39, NULL, 'KLASİK BURGER', 'PATATES KIZARTMASI İLE', 28, NULL, 1, '2021-09-01 13:07:47', '2021-09-01 13:24:35'),
(103, 39, NULL, 'ŞAH SPECİAL BURGER', 'PATATES KIZARTMASI,SOĞAN HALKASI İLE', 33, NULL, 1, '2021-09-01 13:25:24', '2021-09-01 13:25:36'),
(104, 38, NULL, 'CURRY SOSLU TAVUK', 'MAKARNA VE SALATA İLE', 28, NULL, 1, '2021-09-01 13:29:52', '2021-09-01 13:30:24'),
(105, 38, NULL, 'MEXİCO SOSLU TAVUK', 'MAKARNA VE SALATA İLE', 28, NULL, 1, '2021-09-01 13:30:17', '2021-09-01 13:30:30'),
(106, 35, NULL, 'KREMA MANTARLI PENNE', NULL, 25, NULL, 1, '2021-09-01 13:31:01', '2021-09-01 13:31:10'),
(107, 37, NULL, 'KARIŞIK PİZZA', NULL, 30, NULL, 1, '2021-09-01 13:31:53', '2021-09-01 13:32:16'),
(108, 37, NULL, 'KAVURMALI PİZZA', NULL, 35, NULL, 1, '2021-09-01 13:32:07', '2021-09-01 13:32:22'),
(109, 36, NULL, 'İÇ BONFİLE', NULL, 38, NULL, 1, '2021-09-01 13:34:03', '2021-09-01 13:34:43'),
(110, 36, NULL, 'ET SOTE', NULL, 36, NULL, 1, '2021-09-01 13:34:30', '2021-09-01 13:34:50'),
(111, 29, NULL, 'SUFFLE', NULL, 20, NULL, 1, '2021-09-03 14:06:11', '2021-09-03 14:06:21');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin_auths`
--
ALTER TABLE `admin_auths`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_eposta_unique` (`eposta`),
  ADD UNIQUE KEY `admin_users_telefon_unique` (`telefon`),
  ADD UNIQUE KEY `admin_users_token_unique` (`token`) USING HASH,
  ADD KEY `admin_users_auth_id_foreign` (`auth_id`);

--
-- Tablo için indeksler `admin_users_activities`
--
ALTER TABLE `admin_users_activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_users_activities_user_id_foreign` (`user_id`);

--
-- Tablo için indeksler `admin_users_notifications`
--
ALTER TABLE `admin_users_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_users_notifications_user_id_foreign` (`user_id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`) USING HASH;

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin_auths`
--
ALTER TABLE `admin_auths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `admin_users_activities`
--
ALTER TABLE `admin_users_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=328;

--
-- Tablo için AUTO_INCREMENT değeri `admin_users_notifications`
--
ALTER TABLE `admin_users_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `admin_users`
--
ALTER TABLE `admin_users`
  ADD CONSTRAINT `admin_users_auth_id_foreign` FOREIGN KEY (`auth_id`) REFERENCES `admin_auths` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `admin_users_activities`
--
ALTER TABLE `admin_users_activities`
  ADD CONSTRAINT `admin_users_activities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admin_users` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `admin_users_notifications`
--
ALTER TABLE `admin_users_notifications`
  ADD CONSTRAINT `admin_users_notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admin_users` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
