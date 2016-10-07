-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2016 at 10:21 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suratapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE IF NOT EXISTS `alat` (
  `alat_id` int(10) unsigned NOT NULL,
  `nama_alat` varchar(50) NOT NULL,
  `jumlah` int(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alat`
--

INSERT INTO `alat` (`alat_id`, `nama_alat`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 'Sound System', 4, '2016-07-08 11:12:09', '2016-07-08 04:12:09'),
(2, 'Microphone', 4, '2016-07-04 03:50:36', '2016-07-04 03:50:36'),
(3, 'Kursi Kuliah', 200, '2016-07-04 03:51:07', '2016-07-04 03:51:07');

-- --------------------------------------------------------

--
-- Table structure for table `alat_ruang`
--

CREATE TABLE IF NOT EXISTS `alat_ruang` (
  `alat_ruang_id` int(2) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jenis_id` int(1) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alat_ruang`
--

INSERT INTO `alat_ruang` (`alat_ruang_id`, `nama_barang`, `jenis_id`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 'Sound System', 1, 0, '2016-07-08 04:04:20', '2016-07-08 04:04:20'),
(2, 'Microphone', 1, 0, '2016-07-08 04:14:12', '2016-07-08 04:14:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_07_03_130619_create_roles_table', 1),
('2016_07_03_130628_create_permissions_table', 1),
('2016_07_03_130637_create_permission_role_table', 1),
('2016_07_03_130642_create_role_user_table', 1),
('2016_07_03_143925_create_peminjamen_table', 2),
('2016_07_03_143939_create_ormawas_table', 2),
('2016_07_03_144019_create_ruangs_table', 2),
('2016_07_03_144029_create_alats_table', 2),
('2016_07_07_152035_create_table_peminjaman_ruang_alat', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE IF NOT EXISTS `peminjaman` (
  `peminjaman_id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `nomor` int(3) NOT NULL,
  `panitia_kegiatan` varchar(50) NOT NULL,
  `kode_divisi` varchar(1) NOT NULL,
  `jumlah_lampiran` int(2) NOT NULL,
  `ketua_panitia` varchar(50) NOT NULL,
  `nim` varchar(12) NOT NULL,
  `nama_kegiatan` varchar(50) NOT NULL,
  `tanggal_pinjam` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tanggal_kembali` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`peminjaman_id`, `user_id`, `nomor`, `panitia_kegiatan`, `kode_divisi`, `jumlah_lampiran`, `ketua_panitia`, `nim`, `nama_kegiatan`, `tanggal_pinjam`, `tanggal_kembali`, `created_at`, `updated_at`) VALUES
(3, 2, 0, '', '', 0, '', '', 'Diklat Ruang Balwana', '2016-07-18 02:00:00', '2016-07-20 02:00:00', '2016-07-15 06:49:18', '2016-07-15 06:49:18'),
(6, 2, 0, '', '', 0, '', '', 'Friendship 2016', '2016-07-18 17:00:00', '2016-07-19 17:00:00', '2016-07-15 07:51:46', '2016-07-15 07:51:46'),
(7, 2, 0, '', '', 0, '', '', 'Semnas 2016', '2016-07-27 17:00:00', '2016-07-28 17:00:00', '2016-07-15 07:54:08', '2016-07-15 07:54:08'),
(8, 2, 0, '', '', 0, '', '', 'Iset 2016', '2016-07-26 02:00:00', '2016-07-26 10:00:00', '2016-07-16 08:04:32', '2016-07-16 08:04:32'),
(9, 2, 0, '', '', 0, '', '', 'Diklat Ruang Balwana', '2016-07-26 03:00:00', '2016-07-26 09:00:00', '2016-07-16 08:04:52', '2016-07-16 08:04:52'),
(10, 2, 1, '', '', 0, '', '', 'ISET 2016', '2016-08-01 02:00:00', '2016-08-02 01:00:00', '2016-07-27 23:38:55', '2016-07-27 23:38:55'),
(11, 2, 2, '', '', 0, '', '', 'ISET 2016', '2016-07-28 01:00:00', '2016-07-28 07:00:00', '2016-07-27 23:40:40', '2016-07-27 23:40:40'),
(12, 2, 3, 'Friendship', 'C', 1, '', '', 'Friendship 2016', '2016-08-05 01:00:00', '2016-08-06 06:00:00', '2016-07-27 23:44:09', '2016-07-27 23:44:09'),
(13, 5, 1, 'Sisfocup2016', 'E', 1, 'Ridlo Pamungkas', '132410101063', 'Sisfo Cup 2016', '2016-08-02 02:53:10', '2016-07-31 02:00:00', '2016-08-02 02:53:10', '2016-07-29 06:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_alat`
--

CREATE TABLE IF NOT EXISTS `peminjaman_alat` (
  `peminjaman_id` int(6) NOT NULL,
  `alat_id` int(6) NOT NULL,
  `jumlah` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman_alat`
--

INSERT INTO `peminjaman_alat` (`peminjaman_id`, `alat_id`, `jumlah`) VALUES
(3, 1, 2),
(3, 2, 4),
(6, 1, 1),
(6, 3, 15),
(8, 1, 3),
(9, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_ruang`
--

CREATE TABLE IF NOT EXISTS `peminjaman_ruang` (
  `peminjaman_id` int(6) NOT NULL,
  `ruang_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman_ruang`
--

INSERT INTO `peminjaman_ruang` (`peminjaman_id`, `ruang_id`) VALUES
(3, 1),
(3, 2),
(7, 2),
(8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'access.admin', '2016-07-03 13:34:44', '0000-00-00 00:00:00'),
(2, 'access.user', '2016-07-03 13:34:44', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2016-07-03 13:34:44', '0000-00-00 00:00:00'),
(2, 'user', '2016-07-03 13:34:44', '0000-00-00 00:00:00'),
(3, 'admin', '2016-07-03 14:44:26', '0000-00-00 00:00:00'),
(4, 'user', '2016-07-03 14:44:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE IF NOT EXISTS `role_user` (
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`) VALUES
(1, 1),
(2, 2),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE IF NOT EXISTS `ruang` (
  `ruang_id` int(6) unsigned NOT NULL,
  `nama_ruang` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`ruang_id`, `nama_ruang`, `created_at`, `updated_at`) VALUES
(1, 'Ruang 3', '2016-07-04 15:11:18', '2016-07-04 08:11:18'),
(2, 'Ruang 2', '2016-07-04 03:58:49', '2016-07-04 03:58:49');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE IF NOT EXISTS `surat` (
  `surat_id` int(6) NOT NULL,
  `ormawa_id` int(3) NOT NULL,
  `peminjaman_id` int(3) NOT NULL,
  `nomor_surat` int(6) NOT NULL,
  `panitia_kegiatan` varchar(50) NOT NULL,
  `kode_divisi` varchar(50) NOT NULL,
  `periode_jabatan` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama_ketua` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nim` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `nama_ketua`, `nim`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@example.com', '', '', '$2y$10$JH20JM7i9t8a3WSRyOdaneYtkfKonI.Rsgm2HZRJzeurIkFUwrejm', 'l7BZH0aTNM36Q3PFT2LVYx2XR1XSlvfI9zt5KSslN6TQA7GpSXZCZ5DtCP0N', '2016-07-05 15:34:37', '2016-07-05 08:34:37'),
(2, 'BEM PSSI', 'bempssi@example.com', 'Dias Novsa Pradana', '132410101055', '$2y$10$3QjQZ4MpZWQOzSQCro34qOkZKcvvPWoyWHsUzk6Uod6ek1hkmxpWG', 'MvaPPWQqdcPa80WM7uTCgyheyZUnwdXZJNSrtmM44vhiZflBPUhajIlO3jJr', '2016-08-01 14:33:50', '2016-07-29 06:38:35'),
(5, 'UKM O Maco', 'ukmmaco@example.com', 'Bagus Akbar Prabowo', '132410101088', '$2y$10$PFI5Z8aNMXX5LPG3sRZdm.v6AXKBxerf6Ox7x.iR9MP6KkDkEVFSC', 'ju0vuX9pChN924fmDMOvUjpNBxMqNkvFo0ij2iiHhHK8cy2bBSm4MKxrIDrQ', '2016-08-02 02:50:14', '2016-07-29 06:51:08'),
(6, 'UKM Balawana', 'ukmbalwana@example.com', '', '', '$2y$10$E/CM8F.A1MiCly7KW7q6hOZZmmPc0iVgIjy8iEfYmNhwpCJqbpnoe', '4jSAtQUWcSgmSXNHXBHpOIYYdyaTTFtGtmjhuMKtZBypgh9J6RHrZJizdTjx', '2016-08-02 02:25:53', '2016-08-01 19:25:53'),
(7, 'UKM Binary', 'ukmbinary@example.com', '', '', '$2y$10$APYMlU.C8SISQqDQhERzJ.O9jte9eofhL55dYz4lz3hfIojxm8UoG', 'hUluD2SrEbq4XaepY1uvjaj2rxQ2a6Zm9eGDO0bPuZhXs8a7vHl4fh3tc1JG', '2016-07-28 13:12:59', '2016-07-28 06:12:59'),
(8, 'UKM K  Etalase', 'ukmetalase@example.com', '', '', '$2y$10$6rCPo1QQng40sZZGHu1EWe8fPMJHUx.ZidkBNSHm8M9WU2mcKTL5K', 'FEeSUOS2t9hrADRImcujlstd3E9c9h1quXWT7txnNBObFyqGY9J4UsNUl8Ow', '2016-07-28 13:15:01', '2016-07-28 06:15:01'),
(9, 'BPM PSSI', 'bpmpssi@example.com', '', '', '$2y$10$c3ReiAunu6z5Nu.8gkBmteBVSRMPSJzhT.xAe21OdRqESYBppADWe', 'GOR39glyrv5W6kXFo7jVrLHvnrJYbVWCkjKMrgEGOHiKnodjrL8Bt4jNgTZ9', '2016-07-28 13:31:44', '2016-07-28 06:31:44'),
(10, 'HIMASIF', 'himasif@example.com', '', '', '$2y$10$VJv5Yz.Oko7ufMrHurI/ReQy8BvkZBC3RUEpilrsN.UiShQ4WVvpm', NULL, '2016-07-28 06:32:16', '2016-07-28 06:32:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`alat_id`);

--
-- Indexes for table `alat_ruang`
--
ALTER TABLE `alat_ruang`
  ADD PRIMARY KEY (`alat_ruang_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`peminjaman_id`),
  ADD UNIQUE KEY `peminjaman_id` (`peminjaman_id`);

--
-- Indexes for table `peminjaman_alat`
--
ALTER TABLE `peminjaman_alat`
  ADD PRIMARY KEY (`peminjaman_id`,`alat_id`);

--
-- Indexes for table `peminjaman_ruang`
--
ALTER TABLE `peminjaman_ruang`
  ADD PRIMARY KEY (`peminjaman_id`,`ruang_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`role_id`,`user_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`ruang_id`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`surat_id`);

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
-- AUTO_INCREMENT for table `alat`
--
ALTER TABLE `alat`
  MODIFY `alat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `alat_ruang`
--
ALTER TABLE `alat_ruang`
  MODIFY `alat_ruang_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `peminjaman_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `ruang_id` int(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `surat_id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
