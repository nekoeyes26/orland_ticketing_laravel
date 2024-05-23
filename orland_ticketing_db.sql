-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 02:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orland_ticketing_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `creator`
--

CREATE TABLE `creator` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama_organizer` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nomor_ponsel` varchar(255) DEFAULT NULL,
  `tentang` varchar(255) DEFAULT NULL,
  `nomor_ktp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `creator`
--

INSERT INTO `creator` (`id`, `email`, `nama_organizer`, `alamat`, `nomor_ponsel`, `tentang`, `nomor_ktp`, `created_at`, `updated_at`) VALUES
(1, 'bang@mail', 'bang', NULL, NULL, NULL, NULL, '2023-07-05 18:47:31', '2023-07-05 18:47:31'),
(2, 'nyx@mail', 'nyx', NULL, NULL, NULL, NULL, '2023-07-06 06:10:22', '2023-07-06 06:10:22'),
(3, 'acumalaka@mail', 'acumalaka', NULL, NULL, NULL, NULL, '2023-07-07 00:04:19', '2023-07-07 00:04:19'),
(4, 'ray@mail', 'ray cuy', 'Jl. Sudirman', '0871243223123', 'Nyoba aja', '333', '2023-07-08 14:19:52', '2023-07-08 18:37:08'),
(6, 'daus@mail', 'daus', NULL, NULL, NULL, NULL, '2023-07-14 01:11:42', '2023-07-14 01:11:42');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` bigint(20) UNSIGNED NOT NULL,
  `nama_event` varchar(255) NOT NULL,
  `id_format_event` bigint(20) UNSIGNED NOT NULL,
  `id_topik_event` bigint(20) UNSIGNED NOT NULL,
  `id_kategori_event` bigint(20) UNSIGNED NOT NULL,
  `waktu_event` datetime NOT NULL,
  `lokasi_provinsi_event` varchar(255) NOT NULL,
  `lokasi_kota_event` varchar(255) NOT NULL,
  `lokasi_detail_event` varchar(255) NOT NULL,
  `deskripsi_event` varchar(255) NOT NULL,
  `banner_event` varchar(255) DEFAULT NULL,
  `status_event` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `nama_event`, `id_format_event`, `id_topik_event`, `id_kategori_event`, `waktu_event`, `lokasi_provinsi_event`, `lokasi_kota_event`, `lokasi_detail_event`, `deskripsi_event`, `banner_event`, `status_event`, `email`, `created_at`, `updated_at`) VALUES
(2, 'Digiland', 1, 16, 1, '2023-07-14 13:54:00', 'DKI Jakarta', 'Jakarta Pusat', 'Istora Senayan', 'DIGItal LAND (Digiland) menjadi puncak selebrasi peringatan ulang tahun Telkom Indonesia. Pada perayaan ulang tahun ke-58 Telkom,', '1688693653.jpeg', 0, 'bang@mail', '2023-07-06 04:10:15', '2023-07-06 18:34:15'),
(3, 'Bebaskan Energimu Konser - Sidoarjo', 2, 16, 1, '2023-07-19 21:17:00', 'Jawa Timur', 'Sidoarjo', 'Stadion Gelora Delta', 'Persembahan Konser musik kolaboratif dari Kratingdaeng Indonesia untuk Sahabat NOAH yang berada di kota Sidoarjo.', '1688693820.jpg', 0, 'bang@mail', '2023-07-06 04:10:15', '2023-07-06 18:37:02'),
(4, 'Projek-D Vol. 2', 2, 16, 1, '2023-07-13 11:18:00', 'Jawa Tengah', 'Karanganyar', 'De Tjolomadoe', 'PROJEK-D merupakan sebutan singkat dari Projek Dynamic (Dyandra Music & Collaborations),', '1688693918.png', 1, 'bang@mail', '2023-07-06 04:10:15', '2023-07-14 00:01:18'),
(5, 'WE THE FEST 2023', 2, 16, 1, '2023-08-30 18:04:00', 'DKI Jakarta', 'Jakarta Pusat', 'GBK Sport Complex', 'WE THE FEST 2023', '1688694102.jpg', 0, 'bang@mail', '2023-07-06 04:10:15', '2023-07-06 18:41:44'),
(6, 'Dr. Celia Bruen', 10, 10, 1, '1989-06-27 06:11:35', 'Jawa Tengah', 'Semarang', 'Qui autem aut qui voluptas et eos.', 'Aut vero sed ut incidunt ipsa magni occaecati tempore.', NULL, 1, 'bang@mail', '2023-07-06 04:10:15', '2023-07-08 16:36:27'),
(7, 'Odell Shields', 2, 5, 2, '1975-11-06 18:14:19', 'Jawa Tengah', 'Semarang', 'Quia autem illo suscipit aliquid non harum.', 'Minus impedit iusto nesciunt explicabo sit.', NULL, 1, 'bang@mail', '2023-07-06 04:10:15', '2023-07-08 16:36:27'),
(8, 'Marilyne Beahan MD', 3, 8, 1, '1981-04-20 19:48:47', 'Jawa Tengah', 'Semarang', 'Quia culpa nemo et iusto ipsam natus.', 'Aut voluptatum et excepturi voluptates exercitationem dolore.', NULL, 1, 'bang@mail', '2023-07-06 04:10:15', '2023-07-08 16:36:27'),
(9, 'Emie Schumm', 4, 7, 1, '2022-09-27 17:39:33', 'Jawa Tengah', 'Semarang', 'Quia sunt et id veniam illum officiis facilis.', 'Dolores eum harum quia ea et asperiores officia.', NULL, 1, 'bang@mail', '2023-07-06 04:10:15', '2023-07-08 16:36:27'),
(10, 'Prof. Berry Hammes DDS', 1, 10, 1, '1970-10-08 22:08:17', 'Jawa Tengah', 'Semarang', 'Aut iure consequatur tenetur dignissimos quam.', 'Molestiae quia sequi autem vel.', NULL, 1, 'bang@mail', '2023-07-06 04:10:15', '2023-07-08 16:36:27'),
(11, 'Forplay', 3, 3, 1, '2023-07-10 20:00:00', 'DKI Jakarta', 'Jakarta Pusat', 'Bengkel Space', 'tribute to coldplay', '1688645112.jpg', 1, 'bang@mail', '2023-07-06 04:10:15', '2023-07-14 00:01:18'),
(13, 'Joyland', 3, 3, 1, '2023-07-15 22:00:00', 'DKI Jakarta', 'Jakarta Selatan', 'Interpol', '-Music and arts festival held outdoors in open green space\r\n\r\n-Three days of live music, comedy, film, workshops, and marketplace across different areas of the venue\r\n\r\n-A multisensory festival that collaborates with artists in various creative fields', '1688649124.jpg', 0, 'nyx@mail', '2023-07-06 06:12:07', '2023-07-06 06:12:07'),
(14, 'Festival Koplo Indonesia', 2, 15, 1, '2023-07-29 20:00:00', 'DKI Jakarta', 'Jakarta Pusat', 'Parkir Stadion', 'Festival Koplo Indonesia adalah konser dangdut koplo Indonesia, yang diselenggarakan oleh RND dan Nuraga. Konser dangdut koplo ini siap berjoged selama dua hari, pada tanggal 29-30 Juli 2023.', '1688692537.jpg', 0, 'nyx@mail', '2023-07-06 18:15:40', '2023-07-06 18:15:40'),
(15, 'Ghostival', 4, 25, 1, '2023-07-15 00:00:00', 'DKI Jakarta', 'Jakarta Pusat', 'Senayan', 'Leave the drabness of the mundane world behind as Ghostival whisks you away to a realm overflowing with creativity and joy.', '1688692745.jpg', 0, 'nyx@mail', '2023-07-06 18:19:08', '2023-07-06 18:19:08'),
(16, 'Pekan Gembira Ria', 2, 16, 1, '2023-08-12 14:44:00', 'Jawa Barat', 'Bekasi', 'Gladiator Arena', 'Konser Musik, Family & Community Fest.', '1688715892.jpg', 0, 'acumalaka@mail', '2023-07-07 00:44:55', '2023-07-07 00:44:55'),
(17, 'Efek Rumah Kaca', 2, 16, 1, '2023-06-27 14:48:00', 'DKI Jakarta', 'Jakarta Pusat', 'GBK', 'A special show experience by Efek Rumah Kaca to celebrate the launch of their newest album, Rimpang, with a performance set running over 150 minutes that includes songs throughout their two-decade career.', '1688716102.png', 1, 'acumalaka@mail', '2023-07-07 00:48:26', '2023-07-08 16:36:27'),
(18, 'Sprektapora', 9, 15, 1, '2023-07-13 15:26:00', 'DKI Jakarta', 'Jakarta Selatan', 'GBK', 'Spektapora itu', '1688718430.jpg', 1, 'nyx@mail', '2023-07-07 01:27:13', '2023-07-14 00:01:18'),
(20, 'INDONESIAN PRIVATE LESSONS', 12, 23, 1, '2023-07-10 08:46:00', 'Nusa Tenggara Barat (NTB)', 'Mataram', 'Favehotel', 'Bahasa Indonesia online school is a modern service of personal training in the Indonesian language. We help our students improve their knowledge and enjoy every lesson.', '1688867197.jpg', 1, 'ray@mail', '2023-07-08 18:46:40', '2023-07-14 00:01:18'),
(21, 'OPENING CEREMONY CIVFEST 2023', 1, 20, 1, '2023-07-15 13:12:00', 'Kepulauan Riau', 'Batam', 'dimana', 'event ini merupakan event', '1689322403.jpg', 0, 'daus@mail', '2023-07-14 01:13:27', '2023-07-14 01:14:01');

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
-- Table structure for table `format_event`
--

CREATE TABLE `format_event` (
  `id_format_event` bigint(20) UNSIGNED NOT NULL,
  `nama_format_event` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `format_event`
--

INSERT INTO `format_event` (`id_format_event`, `nama_format_event`, `created_at`, `updated_at`) VALUES
(1, 'Festival, Fair, Bazaar', '2023-07-06 04:09:22', '2023-07-06 04:09:22'),
(2, 'Konser', '2023-07-06 04:09:22', '2023-07-06 04:09:22'),
(3, 'Pertandingan', '2023-07-06 04:09:22', '2023-07-06 04:09:22'),
(4, 'Exhibition, Expo, Pameran', '2023-07-06 04:09:22', '2023-07-06 04:09:22'),
(5, 'Konferensi', '2023-07-06 04:09:22', '2023-07-06 04:09:22'),
(6, 'Workshop', '2023-07-06 04:09:22', '2023-07-06 04:09:22'),
(7, 'Pertunjukan', '2023-07-06 04:09:22', '2023-07-06 04:09:22'),
(8, 'Atraksi, Theme Park', '2023-07-06 04:09:22', '2023-07-06 04:09:22'),
(9, 'Akomodasi', '2023-07-06 04:09:22', '2023-07-06 04:09:22'),
(10, 'Seminar, Talk Show', '2023-07-06 04:09:22', '2023-07-06 04:09:22'),
(11, 'Social Gathering', NULL, NULL),
(12, 'Training, Sertifikasi, Ujian', NULL, NULL),
(13, 'Pensi, Event Sekolah, Kampus', NULL, NULL),
(14, 'Trip, Tur', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_event`
--

CREATE TABLE `kategori_event` (
  `id_kategori_event` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori_event` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_event`
--

INSERT INTO `kategori_event` (`id_kategori_event`, `nama_kategori_event`, `created_at`, `updated_at`) VALUES
(1, 'Publik', '2023-07-06 04:09:32', '2023-07-06 04:09:32'),
(2, 'Privat', '2023-07-06 04:09:32', '2023-07-06 04:09:32');

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
(5, '2023_06_19_173823_create_format_event', 1),
(6, '2023_06_19_174019_create_topik_event', 1),
(7, '2023_06_19_174111_create_kategori_event', 1),
(8, '2023_06_19_174128_create_creator', 1),
(9, '2023_06_19_174134_create_event', 1),
(10, '2023_06_19_174159_create_tiket', 1),
(11, '2023_06_19_181125_create_tiket_user', 1),
(12, '2023_06_19_181617_create_pembelian', 1);

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
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_event` bigint(20) UNSIGNED NOT NULL,
  `id_tiket` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `id_event`, `id_tiket`, `email`, `created_at`, `updated_at`) VALUES
(1, 13, 1, 'nyx@mail', '2023-07-06 16:44:49', '2023-07-06 16:44:49'),
(2, 13, 1, 'nyx@mail', '2023-07-06 16:44:49', '2023-07-06 16:44:49'),
(3, 13, 2, 'nyx@mail', '2023-07-06 16:54:45', '2023-07-06 16:54:45'),
(4, 13, 2, 'nyx@mail', '2023-07-06 16:54:46', '2023-07-06 16:54:46'),
(5, 13, 2, 'nyx@mail', '2023-07-06 16:54:46', '2023-07-06 16:54:46'),
(6, 13, 2, 'acumalaka@mail', '2023-07-07 01:23:16', '2023-07-07 01:23:16'),
(7, 13, 2, 'acumalaka@mail', '2023-07-07 01:23:16', '2023-07-07 01:23:16'),
(8, 5, 9, 'ray@mail', '2023-07-08 17:12:51', '2023-07-08 17:12:51'),
(9, 11, 5, 'kumalala@mail', '2023-07-08 20:26:35', '2023-07-08 20:26:35'),
(10, 5, 9, 'kumalala@mail', '2023-07-08 20:27:14', '2023-07-08 20:27:14'),
(11, 15, 4, 'kumalala@mail', '2023-07-08 20:27:43', '2023-07-08 20:27:43'),
(12, 14, 3, 'kumalala@mail', '2023-07-08 20:28:47', '2023-07-08 20:28:47'),
(13, 13, 1, 'daus@mail', '2023-07-14 01:10:22', '2023-07-14 01:10:22'),
(14, 21, 18, 'rex@mail', '2023-07-14 01:15:47', '2023-07-14 01:15:47');

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
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` bigint(20) UNSIGNED NOT NULL,
  `id_event` bigint(20) UNSIGNED NOT NULL,
  `nama_tiket` varchar(255) NOT NULL,
  `deskripsi_tiket` varchar(255) NOT NULL,
  `harga_tiket` double NOT NULL,
  `stock_tiket` int(11) NOT NULL,
  `batas_waktu` datetime NOT NULL,
  `status_tiket` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `id_event`, `nama_tiket`, `deskripsi_tiket`, `harga_tiket`, `stock_tiket`, `batas_waktu`, `status_tiket`, `created_at`, `updated_at`) VALUES
(1, 13, 'presale 1', 'presale 1', 190000, 7, '2023-07-25 08:00:00', 1, '2023-07-06 06:26:44', '2023-07-14 01:10:22'),
(2, 13, 'Presale 2', 'Presale 2', 200000, 95, '2023-07-19 21:00:00', 1, '2023-07-06 09:07:27', '2023-07-07 01:23:16'),
(3, 14, 'Presale 1', 'Presale 1', 175000, 19, '2023-07-20 12:00:00', 1, '2023-07-06 18:16:41', '2023-07-08 20:28:47'),
(4, 15, 'Reguler - EMBERS', 'Reguler', 126000, 19, '2023-07-09 12:00:00', 0, '2023-07-06 18:20:22', '2023-07-14 00:01:19'),
(5, 11, 'Premium - 1', 'Premium', 300000, 29, '2023-07-09 00:00:00', 0, '2023-07-06 18:21:47', '2023-07-14 00:01:19'),
(6, 2, 'Tiket 1', 'Tiket 1', 50000, 100, '2023-07-10 08:59:38', 0, NULL, '2023-07-14 00:01:19'),
(7, 3, 'Tiket', 'Tiket', 99000, 200, '2023-07-16 09:01:34', 1, NULL, NULL),
(8, 4, 'Tiket 1', 'Tiket 1', 120000, 45, '2023-07-10 09:06:33', 0, NULL, '2023-07-14 00:01:19'),
(9, 5, 'Presale 2', 'presale', 299000, 78, '2023-07-30 09:07:24', 1, NULL, '2023-07-08 20:27:14'),
(10, 3, 'Presale 1', 'Presale 1', 75000, 0, '2023-07-06 09:35:58', 0, NULL, NULL),
(11, 17, 'Festival', 'Festival', 100000, 300, '2023-07-20 14:51:00', 1, '2023-07-07 00:51:24', '2023-07-07 00:51:24'),
(12, 18, 'tiket1', 'tiket', 90000, 90, '2023-07-12 15:28:00', 0, '2023-07-07 01:28:38', '2023-07-14 00:01:19'),
(13, 18, 'tiket 2', 'tiket', 90000, 10, '2023-07-19 15:30:00', 1, '2023-07-07 01:30:27', '2023-07-08 12:31:02'),
(14, 18, 'yes', 'yess', 180000, 18, '2023-07-08 15:33:00', 0, '2023-07-07 01:33:20', '2023-07-08 16:42:06'),
(15, 18, 'tiket c', 'tiket c', 170000, 15, '2023-07-08 15:34:00', 0, '2023-07-07 01:34:40', '2023-07-08 16:42:06'),
(17, 20, 'INDONESIAN PRIVATE LESSONS', 'Dear students, we kindly ask you to send tickets to info@bahasaindonesia.school after making payment.', 250000, 120, '2023-07-09 10:00:00', 0, '2023-07-08 18:47:41', '2023-07-14 00:01:19'),
(18, 21, 'presale 1', 'pertama', 20000, 19, '2023-07-14 15:14:00', 1, '2023-07-14 01:14:33', '2023-07-14 01:15:47');

-- --------------------------------------------------------

--
-- Table structure for table `tiket_user`
--

CREATE TABLE `tiket_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_tiket` bigint(20) UNSIGNED NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tiket_user`
--

INSERT INTO `tiket_user` (`id`, `email`, `id_tiket`, `kuantitas`, `status`, `created_at`, `updated_at`) VALUES
(1, 'nyx@mail', 2, 3, '0', '2023-07-06 16:54:46', '2023-07-06 17:41:59'),
(2, 'acumalaka@mail', 2, 2, '0', '2023-07-07 01:23:16', '2023-07-07 01:23:34'),
(3, 'ray@mail', 9, 1, '1', '2023-07-08 17:12:51', '2023-07-08 17:12:51'),
(4, 'kumalala@mail', 5, 1, '0', '2023-07-08 20:26:35', '2023-07-08 20:26:47'),
(5, 'kumalala@mail', 9, 1, '1', '2023-07-08 20:27:14', '2023-07-08 20:27:14'),
(6, 'kumalala@mail', 4, 1, '1', '2023-07-08 20:27:43', '2023-07-08 20:27:43'),
(7, 'kumalala@mail', 3, 1, '1', '2023-07-08 20:28:47', '2023-07-08 20:28:47'),
(8, 'daus@mail', 1, 1, '0', '2023-07-14 01:10:22', '2023-07-14 01:10:57'),
(9, 'rex@mail', 18, 1, '1', '2023-07-14 01:15:47', '2023-07-14 01:15:47');

-- --------------------------------------------------------

--
-- Table structure for table `topik_event`
--

CREATE TABLE `topik_event` (
  `id_topik_event` bigint(20) UNSIGNED NOT NULL,
  `nama_topik_event` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topik_event`
--

INSERT INTO `topik_event` (`id_topik_event`, `nama_topik_event`, `created_at`, `updated_at`) VALUES
(1, 'Anak, Keluarga', '2023-07-06 04:09:40', '2023-07-06 04:09:40'),
(2, 'Bisnis', '2023-07-06 04:09:40', '2023-07-06 04:09:40'),
(3, 'Desain, Foto, Video', '2023-07-06 04:09:40', '2023-07-06 04:09:40'),
(4, 'Fashion, Kecantikan', '2023-07-06 04:09:40', '2023-07-06 04:09:40'),
(5, 'Film, Sinema', '2023-07-06 04:09:40', '2023-07-06 04:09:40'),
(6, 'Game, E-sports', '2023-07-06 04:09:40', '2023-07-06 04:09:40'),
(7, 'Hobi, Kerajinan Tangan', '2023-07-06 04:09:40', '2023-07-06 04:09:40'),
(8, 'Investasi, Saham', '2023-07-06 04:09:40', '2023-07-06 04:09:40'),
(9, 'Karir, Pengembangan Diri', '2023-07-06 04:09:40', '2023-07-06 04:09:40'),
(10, 'Keagamaan', '2023-07-06 04:09:40', '2023-07-06 04:09:40'),
(11, 'Kesehatan, Kebugaran', NULL, NULL),
(12, 'Keuangan, Finansial', NULL, NULL),
(13, 'Lingkungan Hidup', NULL, NULL),
(14, 'Makanan, Minuman', NULL, NULL),
(15, 'Marketing', NULL, NULL),
(16, 'Musik', NULL, NULL),
(17, 'Olahraga', NULL, NULL),
(18, 'Otomotif', NULL, NULL),
(19, 'Sains, Teknologi', NULL, NULL),
(20, 'Seni, Budaya', NULL, NULL),
(21, 'Sosial, Hukum, Politik', NULL, NULL),
(22, 'Standup Comedy', NULL, NULL),
(23, 'Pendidikan, Beasiswa', NULL, NULL),
(24, 'Tech, Start-up', NULL, NULL),
(25, 'Wisata & Liburan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `nomor_ponsel` varchar(255) DEFAULT NULL,
  `tanggal_lahir` datetime DEFAULT NULL,
  `status_creator` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `nama`, `password`, `nomor_ponsel`, `tanggal_lahir`, `status_creator`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Gwah@gmail', 'Gwah', '$2y$10$nQMnL9yoNE7zgCniXG/J0.zGYZCARnWHChJTg2RWXvTA0p288gVge', NULL, NULL, 0, 0, '2023-07-05 18:21:12', '2023-07-05 18:21:12'),
(2, 'arga@mail', 'Arga iseng', '$2y$10$eD5cXdlnk3Zk7oTUN4svz.zEMli5Y6IVE8gQ7aLUaICCpMEPSjapa', NULL, NULL, 0, 0, '2023-07-05 18:34:25', '2023-07-05 18:34:25'),
(4, 'bang@mail', 'bang', '$2y$10$CEutKrDIF.jFO.h/.9LMgOiszCr0FfhnGzvo5aADO9Pj2KdB.Ow86', NULL, NULL, 1, 1, '2023-07-05 18:47:31', '2023-07-05 18:47:31'),
(5, 'nyx@mail', 'Aeonyx', '$2y$10$HeUYmkRinZhHdEPDNEpgA.y5qhYm9twDzQC3Or.M3Lu.AJwNF0nWa', '0857128893452', '2001-09-11 00:00:00', 1, 1, '2023-07-06 06:10:22', '2023-07-06 21:03:38'),
(6, 'acumalaka@mail', 'acumalaka', '$2y$10$olV/lDVZJ453LgJNg3lU/O/j9zmHP9z3CrLbr3.7ETFjyJIYefgqK', NULL, NULL, 1, 0, '2023-07-07 00:01:27', '2023-07-07 00:04:19'),
(7, 'riku@mail', 'riku', '$2y$10$Ou/FhQksvjMHactV5Phob.VIQJDDrdhNWuGzRxiiL4FBUCDFxgay.', NULL, NULL, 0, 0, '2023-07-08 13:58:55', '2023-07-08 13:58:55'),
(8, 'ray@mail', 'ray', '$2y$10$eLtZn41wrMSHVmb7J8g5Uu5nL5vrQytROB1YwOvTYZZ4B94RNJ2VK', NULL, '2004-05-02 00:00:00', 1, 0, '2023-07-08 14:09:25', '2023-07-08 14:28:14'),
(9, 'kumalala@mail', 'kumalala', '$2y$10$yVzcclMJvw6zEQIhu8VFJOdqyRvqzKN56D9aPWOcX0cUPxf5HB6eu', NULL, NULL, 0, 0, '2023-07-08 20:26:13', '2023-07-08 20:26:13'),
(10, 'rex@mail', 'rex', '$2y$10$.GWwMoXlyfTWxDzJPaTW0.ChBMMM5PslokVzgaM0Hc2sKYlPnQcS2', NULL, NULL, 0, 0, '2023-07-14 00:02:27', '2023-07-14 00:02:27'),
(11, 'daus@mail', 'daus', '$2y$10$ylh0ScOvmLIgN/fvb8IONuO/iyiqdFx1sCPfOFvCck8a.GukJ7CLa', NULL, NULL, 1, 0, '2023-07-14 01:09:47', '2023-07-14 01:11:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `creator`
--
ALTER TABLE `creator`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_email_foreign` (`email`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `event_id_format_event_index` (`id_format_event`),
  ADD KEY `event_id_topik_event_index` (`id_topik_event`),
  ADD KEY `event_id_kategori_event_index` (`id_kategori_event`),
  ADD KEY `event_email_index` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `format_event`
--
ALTER TABLE `format_event`
  ADD PRIMARY KEY (`id_format_event`);

--
-- Indexes for table `kategori_event`
--
ALTER TABLE `kategori_event`
  ADD PRIMARY KEY (`id_kategori_event`);

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
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembelian_email_foreign` (`email`),
  ADD KEY `pembelian_id_event_index` (`id_event`),
  ADD KEY `pembelian_id_tiket_index` (`id_tiket`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `tiket_id_event_index` (`id_event`);

--
-- Indexes for table `tiket_user`
--
ALTER TABLE `tiket_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tiket_user_email_foreign` (`email`),
  ADD KEY `tiket_user_id_tiket_index` (`id_tiket`);

--
-- Indexes for table `topik_event`
--
ALTER TABLE `topik_event`
  ADD PRIMARY KEY (`id_topik_event`);

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
-- AUTO_INCREMENT for table `creator`
--
ALTER TABLE `creator`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `format_event`
--
ALTER TABLE `format_event`
  MODIFY `id_format_event` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kategori_event`
--
ALTER TABLE `kategori_event`
  MODIFY `id_kategori_event` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tiket_user`
--
ALTER TABLE `tiket_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `topik_event`
--
ALTER TABLE `topik_event`
  MODIFY `id_topik_event` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `creator`
--
ALTER TABLE `creator`
  ADD CONSTRAINT `creator_email_foreign` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_email_foreign` FOREIGN KEY (`email`) REFERENCES `creator` (`email`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_id_format_event_foreign` FOREIGN KEY (`id_format_event`) REFERENCES `format_event` (`id_format_event`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_id_kategori_event_foreign` FOREIGN KEY (`id_kategori_event`) REFERENCES `kategori_event` (`id_kategori_event`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_id_topik_event_foreign` FOREIGN KEY (`id_topik_event`) REFERENCES `topik_event` (`id_topik_event`) ON DELETE CASCADE;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_email_foreign` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE,
  ADD CONSTRAINT `pembelian_id_event_foreign` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`) ON DELETE CASCADE,
  ADD CONSTRAINT `pembelian_id_tiket_foreign` FOREIGN KEY (`id_tiket`) REFERENCES `tiket` (`id_tiket`) ON DELETE CASCADE;

--
-- Constraints for table `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_id_event_foreign` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`) ON DELETE CASCADE;

--
-- Constraints for table `tiket_user`
--
ALTER TABLE `tiket_user`
  ADD CONSTRAINT `tiket_user_email_foreign` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE,
  ADD CONSTRAINT `tiket_user_id_tiket_foreign` FOREIGN KEY (`id_tiket`) REFERENCES `tiket` (`id_tiket`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
