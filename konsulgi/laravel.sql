-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2025 at 08:48 AM
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
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$12$0KR5K8Q9LU9OSt8tYZbNIuLfZzV11OgHmt3odl2N9KMqdAhdrD.IO', '2025-05-19 06:49:32', '2025-05-19 06:49:32');

-- --------------------------------------------------------

--
-- Table structure for table `ahli_gizis`
--

CREATE TABLE `ahli_gizis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ahli_gizis`
--

INSERT INTO `ahli_gizis` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Afifa Fadila,S.Gz', '2025-06-03 05:13:48', '2025-06-03 05:13:48'),
(2, 'Annisa Khaira Ma\'adi,S.Gz', '2025-06-03 05:13:48', '2025-06-03 05:13:48'),
(3, 'Arif Dwisetyo H,S.Gz.Mph', '2025-06-03 05:13:48', '2025-06-03 05:13:48'),
(4, 'Emma Afriany,S.Gz', '2025-06-03 05:13:48', '2025-06-03 05:13:48'),
(5, 'Ervinna Ayu S.B, S.Tr.Gz', '2025-06-03 05:13:48', '2025-06-03 05:13:48'),
(6, 'Gyzka Arte Tifa,S.Gz', '2025-06-03 05:13:48', '2025-06-03 05:13:48'),
(7, 'Ika Retno Wahyuni,S.Gz', '2025-06-03 05:13:48', '2025-06-03 05:13:48'),
(8, 'Jumiyati,S.Gz RD', '2025-06-03 05:13:48', '2025-06-03 05:13:48'),
(9, 'Lola Alviche,S.Gz', '2025-06-03 05:13:48', '2025-06-03 05:13:48'),
(10, 'Minati Chairunisa, S.Tr.Gz', '2025-06-03 05:13:48', '2025-06-03 05:13:48'),
(11, 'Retno Tyas Ning W, S.Gz', '2025-06-03 05:13:48', '2025-06-03 05:13:48'),
(12, 'Sarinilasih, S.Tr.Gz', '2025-06-03 05:13:48', '2025-06-03 05:13:48'),
(13, 'Sri Wahyuni, S.Tr.Gz', '2025-06-03 05:13:48', '2025-06-03 05:13:48');

-- --------------------------------------------------------

--
-- Table structure for table `artikel_gizis`
--

CREATE TABLE `artikel_gizis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `konten` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artikel_gizis`
--

INSERT INTO `artikel_gizis` (`id`, `judul`, `tanggal`, `kategori`, `konten`, `created_at`, `updated_at`) VALUES
(2, 'Apa Akibatnya Kekurangan Vitamin D?', '2025-05-15', 'Tips Gizi', '<p>blablabla</p>', '2025-06-01 22:53:20', '2025-06-01 22:53:20');

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
-- Table structure for table `data_ahli_gizi`
--

CREATE TABLE `data_ahli_gizi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_whatsapp` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_ahli_gizi`
--

INSERT INTO `data_ahli_gizi` (`id`, `nama`, `no_whatsapp`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Afifa Fadila,S.Gz', '6289665818311', 'afifa', '$2y$12$snm2i3UhG7buGJv/r2WJT.q2BKtbfNg6zWqKaulzjXOF7uYa45CfK', '2025-04-30 17:45:15', '2025-06-02 11:22:27'),
(2, 'Annisa Khaira Ma\'adi,S.Gz', '6289665818310', 'annisa', '$2y$12$.0iLbTqOW0ygGWHIczq.LOArNDwkXzx9fraF8CwdSS91XpBpIiTxO', '2025-04-30 17:45:37', '2025-06-15 16:42:40'),
(3, 'Arif Dwisetyo H,S.Gz.Mph', '6289665818312', 'arif', '$2y$12$95PDMKWaONdSJBBz1SmLVuVUMH3YmNBTNWi9mJ2G2QKjCvz85uKzC', '2025-04-30 17:45:37', '2025-06-15 16:42:48'),
(4, 'Emma Afriany,S.Gz', '6289665818320', 'emma', '$2y$12$FMQ6SsmzU29HyEc81Uz.ceZbqeF4AMUXG5zDvIDDWKZq9U3s5Cwo6', '2025-04-30 17:45:37', '2025-06-15 16:43:00'),
(5, 'Ervinna Ayu S.B, S.Tr.Gz', '6289665818319', 'ervinna', '$2y$12$7klK.uTiFfQP17rEqcYGf.eTJlUZ2Nat36WwrPk9x009epy.lxw6O', '2025-04-30 17:45:37', '2025-06-15 16:42:54'),
(6, 'Gyzka Arte Tifa,S.Gz', '6289665818389', 'gyzka', '$2y$12$FBWxXq1Q73/1yhy0bAfYs.0Ztf.JEQl4/mmaTFkEnEMJ8J5x598ti', '2025-04-30 17:45:37', '2025-06-15 16:43:16'),
(7, 'Ika Retno Wahyuni,S.Gz', '6289665818336', 'ika', '$2y$12$U77EKH7Han9lYyxRM9HWMOgmuNOYOVYm8bwhmd3zJML4btBrcPzwm', '2025-04-30 17:45:37', '2025-06-15 16:43:09'),
(8, 'Jumiyati,S.Gz RD', '6289665818323', 'jumiyati', '$2y$12$yB4qvh3BilnCE2j7U7C7Ue4Kz2Il5PTX4Q2GJM5ZxhXNEDJBgRHE2', '2025-04-30 17:45:37', '2025-06-15 16:44:03'),
(9, 'Lola Alviche,S.Gz', '6289665818348', 'lola', '$2y$12$yMplVN96cQwpWoR9ibOKR.aP4sb3V85kAghxcb5Qp/LhGfuPxT/IO', '2025-04-30 17:45:37', '2025-06-15 16:44:14'),
(10, 'Minati Chairunisa, S.Tr.Gz', '6289665818376', 'minati', '$2y$12$yLKPSFBXduJQtEBNbW8j3eP17PuV.WByedFCg847RK95273o3WpXm', '2025-04-30 17:45:37', '2025-06-15 16:46:02'),
(11, 'Retno Tyas Ning W, S.Gz', '6289665818384', 'retno', '$2y$12$VgK0qEiCO7hZxhyixXAsFuHHH43ovo21dTDhPW03tZDqO5ybcr/Pe', '2025-04-30 17:45:37', '2025-06-15 16:46:12'),
(12, 'Sarinilasih, S.Tr.Gz', '6289665818352', 'sarini', '$2y$12$K16s6rOyW.isFst0Lr.L7uZJHSMZvwPaOEtNwY0hA9kKraVrTyZQq', '2025-04-30 17:45:37', '2025-06-15 16:46:20'),
(13, 'Sri Wahyuni, S.Tr.Gz', '6289665818391', 'sri', '$2y$12$4QShc5xaO79S/6GILKCtVeh.vwoHndy6iItzdTJ.xc9cFx5yAS3T6', '2025-04-30 17:45:37', '2025-06-15 16:46:31');

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
-- Table structure for table `konsultasis`
--

CREATE TABLE `konsultasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pasien_id` bigint(20) UNSIGNED NOT NULL,
  `ahli_gizi_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_konsultasi` date NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hasil` text DEFAULT NULL,
  `isi_piringku_hasil` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `konsultasis`
--

INSERT INTO `konsultasis` (`id`, `pasien_id`, `ahli_gizi_id`, `tanggal_konsultasi`, `keluhan`, `status`, `created_at`, `updated_at`, `hasil`, `isi_piringku_hasil`) VALUES
(8, 1, 13, '2025-06-03', 'saya merasa mual dan pusing setiap kali bangun tidur.', 'selesai', '2025-06-02 22:17:55', '2025-06-22 14:00:07', 'Disarankan agar selalu menjaga pola waktu tidur agar tidak kurang maupun lebih. Dianjurkan agar minimal tidur 7 hingga 8 jam di malam hari.', '{\"nama\":\"Racheal Mustika\",\"data\":{\"konsultasi_id\":\"8\",\"_token\":\"ScYfdd5nkKFejEot6u8fMWMMGobsa7GXPl7O4TBx\",\"nama\":\"Racheal Mustika\",\"umur\":\"21\",\"jenis_kelamin\":\"Perempuan\",\"penyakit\":null,\"aktivitas\":\"jalan\",\"faktor_stress\":\"tidak_ada\",\"berat\":\"52\",\"tinggi\":\"153\"},\"imt\":22.2,\"kategori\":\"Normal\",\"energi\":316.275,\"kalori\":316.275,\"protein\":12,\"karbo\":47,\"lemak\":9,\"bmr\":263.6}');

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
(4, '2025_05_11_091029_create_pasiens_table', 1),
(5, '2025_05_11_152901_create_konsultasis_table', 1),
(6, '2025_05_11_183227_create_ahli_gizis_table', 1),
(7, '2025_05_14_111200_create_messages_table', 1),
(8, '2025_05_17_183419_create_admins_table', 2),
(9, '2025_05_20_092421_create_profil_ahli_gizi_table', 3),
(10, '2025_06_01_172657_create_artikel_gizis_table', 4),
(11, '2025_06_02_071523_create_ahli_gizis_table', 5),
(12, '2025_06_02_121608_create_konsultasis_table', 6),
(13, '2025_06_02_172656_create_data_ahli_gizi_table', 7),
(14, '2025_06_12_054203_add_hasil_to_konsultasis_table', 8),
(15, '2025_06_22_151718_add_isi_piringku_hasil_to_konsultasis_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `pasiens`
--

CREATE TABLE `pasiens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_rekam_medis` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_whatsapp` varchar(20) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pasiens`
--

INSERT INTO `pasiens` (`id`, `no_rekam_medis`, `tanggal_lahir`, `no_whatsapp`, `nama`, `created_at`, `updated_at`) VALUES
(1, '0001750484', '2004-10-29', '62895408677979', 'Harnita Risa', '2025-05-17 05:38:51', '2025-06-22 07:07:47'),
(2, '0001718058', '1992-05-01', '621435430738', 'Tedi Narpati', '2025-02-18 01:17:49', '2025-05-28 03:56:40'),
(3, '0001701234', '1985-03-14', '621530201026', 'Ahmad Fauzi', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(4, '0001705239', '1992-08-22', '621544712944', 'Dewi Sartika', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(5, '0001798762', '1979-06-01', '621332961676', 'Budi Santoso', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(6, '0001743567', '1988-12-05', '621230669578', 'Siti Nurhaliza', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(7, '0001787654', '1990-10-19', '621354462892', 'Andi Rahman', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(8, '0001734672', '1987-05-30', '621280305758', 'Indah Permatasari', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(9, '0001776521', '1991-09-12', '621538140146', 'Rizky Ramadhan', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(10, '0001700987', '1980-04-21', '621049783489', 'Putri Amelia', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(11, '0001764532', '1993-01-18', '62834497035', 'Fajar Nugroho', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(12, '0001704452', '1984-07-10', '621223134741', 'Nurul Hidayah', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(13, '0001712341', '1975-11-23', '62812182632', 'Taufik Hidayat', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(14, '0001728761', '1986-02-14', '621591508967', 'Lestari Dewi', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(15, '0001700005', '1994-03-03', '621720996972', 'Doni Saputra', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(16, '0001700111', '1983-06-26', '621030457988', 'Aulia Fitriani', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(17, '0001701222', '1978-09-17', '621189299057', 'Hendra Wijaya', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(18, '0001701343', '1990-01-01', '621055121353', 'Rina Kurniawati', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(19, '0001701456', '1982-08-09', '62907709623', 'Dimas Prasetyo', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(20, '0001701567', '1995-10-11', '621573184090', 'Eka Yuliana', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(21, '0001701678', '1976-05-02', '621342791612', 'Arif Nugraha', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(22, '0001701789', '1981-12-20', '621194405818', 'Mega Lestari', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(23, '0001701890', '1989-04-15', '621143654289', 'Fikri Maulana', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(24, '0001701901', '1987-07-08', '621335054020', 'Wulan Ayu', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(25, '0001702002', '1983-03-30', '621444307263', 'Dedi Firmansyah', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(26, '0001702113', '1977-01-10', '621416374289', 'Yulia Rahmawati', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(27, '0001702224', '1980-11-01', '62948949685', 'Agus Salim', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(28, '0001702335', '1992-06-06', '621695625591', 'Maya Sari', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(29, '0001702446', '1994-08-14', '62831278929', 'Bayu Wicaksono', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(30, '0001702557', '1985-10-22', '621269517905', 'Farah Zahrani', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(31, '0001702668', '1981-03-12', '621053752770', 'Rafi Hakim', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(32, '0001702779', '1986-05-25', '621660210164', 'Intan Melati', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(33, '0001702880', '1991-07-17', '621339792541', 'Galih Permadi', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(34, '0001702991', '1979-09-05', '62918332247', 'Novi Anggraini', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(35, '0001703002', '1984-02-28', '621772283641', 'Syahrul Anwar', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(36, '0001703113', '1993-12-03', '621306421497', 'Fitriani Nur', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(37, '0001703224', '1982-06-18', '621415256593', 'Aditya Putra', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(38, '0001703335', '1990-09-25', '621357018504', 'Sri Wahyuni', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(39, '0001703446', '1978-04-11', '621739322771', 'Yusuf Arifin', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(40, '0001703557', '1991-01-27', '62825558375', 'Melati Zahra', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(41, '0001703668', '1988-03-07', '621109823595', 'Reza Kurnia', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(42, '0001703779', '1983-10-15', '621272442879', 'Dian Maharani', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(43, '0001703880', '1977-12-29', '621232743643', 'Tommy Gunawan', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(44, '0001703991', '1992-02-09', '621546389610', 'Ayu Lestari', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(45, '0001704000', '1985-08-16', '621233717151', 'Irwan Prakoso', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(46, '0001704111', '1980-01-05', '621729416957', 'Anita Sari', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(47, '0001704222', '1986-07-30', '621145933362', 'M. Alif Ramadhan', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(48, '0001704333', '1994-11-11', '621741415970', 'Citra Indah', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(49, '0001704444', '1976-05-08', '621469279794', 'Hamzah Rizqi', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(50, '0001704555', '1990-06-19', '621322151094', 'Yuni Kurniasih', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(51, '0001704666', '1989-04-01', '621402916118', 'Bambang Susanto', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(52, '0001704777', '1982-09-20', '621283098229', 'Desi Marlina', '2025-05-17 16:31:18', '2025-05-17 16:31:18'),
(53, '0001706001', '2000-04-12', '62801626079', 'Aisyah Nabila', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(54, '0001706002', '2001-06-24', '621358835740', 'Bagas Pratama', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(55, '0001706003', '2002-08-10', '621589300494', 'Cindy Lestari', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(56, '0001706004', '2003-01-19', '621069995281', 'Dika Nugraha', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(57, '0001706005', '2004-03-27', '621782074955', 'Elvina Putri', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(58, '0001706006', '2005-09-05', '62900388962', 'Fikri Ramadhan', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(59, '0001706007', '2006-11-15', '621355719978', 'Ghina Ayu', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(60, '0001706008', '2007-07-20', '621277433035', 'Hafiz Hidayat', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(61, '0001706009', '2008-02-28', '621520005272', 'Indah Permata', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(62, '0001706010', '2009-10-17', '62967727287', 'Joko Santoso', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(63, '0001706011', '2010-12-08', '621478620648', 'Kirana Syifa', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(64, '0001706012', '2011-05-14', '621689921410', 'Lutfi Hakim', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(65, '0001706013', '2012-03-09', '621213745140', 'Mega Rahayu', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(66, '0001706014', '2013-07-22', '621198961498', 'Naufal Azka', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(67, '0001706015', '2014-01-04', '621553572104', 'Olivia Salsabila', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(68, '0001706016', '2015-06-16', '621370976055', 'Putra Wicaksono', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(69, '0001706017', '2016-09-01', '621394163996', 'Qanita Nuraini', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(70, '0001706018', '2017-04-30', '621057891847', 'Rizky Maulana', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(71, '0001706019', '2018-08-13', '621306967275', 'Sari Amelia', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(72, '0001706020', '2019-02-25', '621561160868', 'Tegar Alamsyah', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(73, '0001706021', '2020-01-01', '621084902547', 'Umi Hasanah', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(74, '0001706022', '2000-02-02', '62941030162', 'Vino Saputra', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(75, '0001706023', '2001-03-15', '621650443201', 'Wulan Aprilia', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(76, '0001706024', '2002-07-30', '621629125547', 'Xena Pratama', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(77, '0001706025', '2003-10-06', '621394298165', 'Yoga Prabowo', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(78, '0001706026', '2004-05-12', '621284114217', 'Zahra Nurfadillah', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(79, '0001706027', '2005-11-28', '621437676618', 'Andi Gunawan', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(80, '0001706028', '2006-08-04', '621536040472', 'Bella Sari', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(81, '0001706029', '2007-12-15', '621567172538', 'Cahya Dwi', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(82, '0001706030', '2008-06-07', '621427741304', 'Dewi Kartika', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(83, '0001706031', '2009-03-03', '621637188939', 'Erik Tanjung', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(84, '0001706032', '2010-01-10', '621102720813', 'Fatimah Nur', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(85, '0001706033', '2011-04-18', '62802037279', 'Gilang Permadi', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(86, '0001706034', '2012-02-24', '62902023987', 'Hilma Septi', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(87, '0001706035', '2013-10-11', '621304008128', 'Irwan Subekti', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(88, '0001706036', '2014-05-21', '621013968713', 'Jihan Azahra', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(89, '0001706037', '2015-07-19', '621357819209', 'Kevin Hadi', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(90, '0001706038', '2016-09-27', '62947189939', 'Lina Marlina', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(91, '0001706039', '2017-12-31', '62862492099', 'Miko Satrio', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(92, '0001706040', '2018-11-02', '621670890710', 'Nanda Fikri', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(93, '0001706041', '2019-03-20', '62966977283', 'Oktaviani Cahya', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(94, '0001706042', '2020-06-06', '621022214318', 'Putri Cempaka', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(95, '0001706043', '2000-07-07', '621410139770', 'Qori Hidayah', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(96, '0001706044', '2001-01-25', '621184055926', 'Rama Perdana', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(97, '0001706045', '2002-04-04', '62889860354', 'Siska Rahmawati', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(98, '0001706046', '2003-08-18', '621097134023', 'Tia Nurlela', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(99, '0001706047', '2004-12-29', '621016089084', 'Usman Hasyim', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(100, '0001706048', '2005-06-02', '628125061423', 'Vania Lestari', '2025-05-17 16:47:25', '2025-05-17 16:47:25'),
(101, '0001706049', '2006-10-14', '628125068735', 'Wahyu Gunawan', '2025-05-17 16:47:25', '2025-05-17 16:47:25');

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
('NkEn8SlQyhIAPUz40SuGLTjHUoaQAhKrhm39Unml', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTVJreGE0SlRSbU5BWjlwR2ZnQXl1cEtyNmNoT3d5RG9WRzdYWnhseSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1750661135);

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
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `ahli_gizis`
--
ALTER TABLE `ahli_gizis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artikel_gizis`
--
ALTER TABLE `artikel_gizis`
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
-- Indexes for table `data_ahli_gizi`
--
ALTER TABLE `data_ahli_gizi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_ahli_gizi_username_unique` (`username`);

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
-- Indexes for table `konsultasis`
--
ALTER TABLE `konsultasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `konsultasis_pasien_id_foreign` (`pasien_id`),
  ADD KEY `konsultasis_ahli_gizi_id_foreign` (`ahli_gizi_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasiens`
--
ALTER TABLE `pasiens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pasiens_no_rekam_medis_unique` (`no_rekam_medis`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ahli_gizis`
--
ALTER TABLE `ahli_gizis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `artikel_gizis`
--
ALTER TABLE `artikel_gizis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_ahli_gizi`
--
ALTER TABLE `data_ahli_gizi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
-- AUTO_INCREMENT for table `konsultasis`
--
ALTER TABLE `konsultasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pasiens`
--
ALTER TABLE `pasiens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `konsultasis`
--
ALTER TABLE `konsultasis`
  ADD CONSTRAINT `konsultasis_ahli_gizi_id_foreign` FOREIGN KEY (`ahli_gizi_id`) REFERENCES `ahli_gizis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `konsultasis_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasiens` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
