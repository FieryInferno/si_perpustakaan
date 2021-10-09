-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 08, 2021 at 10:50 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd_anggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_identitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_anggota` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jkelamin` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keanggotaan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `kd_anggota`, `no_identitas`, `nama_anggota`, `jkelamin`, `tempat_lahir`, `tgl_lahir`, `keanggotaan`, `status`, `gambar`, `created_at`, `updated_at`) VALUES
(3, 'S00001', '160820001', 'Karina Indah Sari', 'Perempuan', 'Jakarta', '2000-04-20', 'Aktif', 'Siswa', 'profile-default.png', '2021-04-08 18:00:09', '2021-04-28 08:40:02'),
(4, 'S08982', '130550001', 'Johan Sanjaya', 'Laki-laki', 'Jakarta', '2000-04-21', 'Non-aktif', 'Siswa', '-Johan Sanjaya.png', '2021-04-08 18:00:09', '2021-04-28 11:27:10'),
(5, 'S00003', '03281093', 'Arman Ghani', 'Laki-laki', 'Denpasar', '2021-04-27', 'Non-aktif', 'Siswa', '03281093.jpg', '2021-04-08 18:00:09', '2021-06-04 23:32:34'),
(6, 'S00004', '09120912', 'Fina Pandu', 'Perempuan', 'Depok', '2021-04-27', 'Aktif', 'Siswa', '-Fina Pandu.png', '2021-04-08 18:00:09', '2021-04-28 12:02:24'),
(9, 'S00025', '83127678721', 'Asmaya', 'Perempuan', 'Solo', '1986-01-06', 'Aktif', 'Guru', 'Guru-Asmaya-83127678721.png', '2021-04-08 18:00:09', NULL),
(0, '10104019', '3213012611980001', 'M. Bagas Setia', 'Laki-laki', 'Bandung', '2000-11-26', 'Aktif', 'Siswa', 'Siswa-M. Bagas Setia-3213012611980001.jpg', NULL, '2021-06-06 03:09:06');

-- --------------------------------------------------------

--
-- Table structure for table `bahasa`
--

CREATE TABLE `bahasa` (
  `id` int(11) NOT NULL,
  `bahasa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bahasa`
--

INSERT INTO `bahasa` (`id`, `bahasa`) VALUES
(1, 'in - Indonesia'),
(2, 'en - English'),
(3, 'en - in (English-Indonesia)');

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
-- Table structure for table `jenis_bahan`
--

CREATE TABLE `jenis_bahan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_bahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_bahan`
--

INSERT INTO `jenis_bahan` (`id`, `jenis_bahan`) VALUES
(2, 'Buku Pelajaran  (Buku Pelajaran Siswa)'),
(1, 'Buku Pelajaran PG (Pegangan-Guru)'),
(3, 'Kamus'),
(4, 'Monograf (Buku, Jurnal, laporan)');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_karya`
--

CREATE TABLE `jenis_karya` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_karya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_karya`
--

INSERT INTO `jenis_karya` (`id`, `jenis_karya`) VALUES
(4, 'antologi'),
(3, 'biografi'),
(2, 'fiksi'),
(1, 'non-fiksi'),
(5, 'panduan');

-- --------------------------------------------------------

--
-- Table structure for table `katalog`
--

CREATE TABLE `katalog` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bib_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_utama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_sub` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengarang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_terbit` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbit` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thn_terbit` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sampul_depan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_hlm` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dimensi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edisi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelas_ddc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_panggil` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isbn` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_bahasa` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_jenis_bahan` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenis_karya` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `katalog`
--

INSERT INTO `katalog` (`id`, `bib_id`, `judul_utama`, `judul_sub`, `pengarang`, `tempat_terbit`, `penerbit`, `thn_terbit`, `sampul_depan`, `jumlah_hlm`, `dimensi`, `edisi`, `kelas_ddc`, `no_panggil`, `isbn`, `id_bahasa`, `id_jenis_bahan`, `id_jenis_karya`, `created_at`, `updated_at`) VALUES
(3, '0010-1120000001', 'Matematika Dasar', 'Matematika Untuk SMA kelas 10', 'Haryanto', 'Yoygakarta', 'Erlangga', '2020', '0010-1120000001-Matematika Dasar.jpg', '400', '17,6 cm x 25 cm', NULL, '510.370', '510.370', '1221-1221-1221', '1', '1', '1', '2021-04-08 18:00:09', '2021-05-22 00:38:56'),
(4, '0010-1120000002', 'Matematika Dasar', 'Matematika Untuk SMA kelas 10', 'Haryanto', 'Yoygakarta', 'Erlangga', '2020', 'sampul-default.png', '400', '17,6 cm x 25 cm', NULL, '510.370', ' 510.370', '1221-1221-1221', '1', '2', '1', '2021-04-08 18:00:09', NULL),
(5, '0010-1120000003', 'Ilmu Pengetahuan Alam', 'IPA', 'Erna', 'Surabaya', 'Kencana Terbit', '2018', 'sampul-default.png', '500', '13 x 19 cm', NULL, '510.2', '510.2 ern i', '1289-1298-1221', '1', '2', '1', '2021-05-03 18:13:57', NULL),
(6, '0010-1120000004', 'Oxford Dictionary', 'Pocket Edision', 'Oxford University', 'Oxford University', 'Oxford University', '2018', 'sampul-default.png', '50', '5A', '2', '120.1', '120.1 oxf k', '9823-239823-23098', '1', '3', '1', '2021-05-03 18:36:17', '2021-05-03 19:42:46'),
(7, '0010-120000005', 'Ilmu Pengetahuan Sosial', 'IPS untuk Kelas 11', 'Sumarni', 'Yogyakarta', 'Erlangga', '2019', 'sampul-default.png', '300', '13 x 19 cm', NULL, '510.1', '510.1 sum i', '04398-439934-43', '1', '2', '1', '2021-05-07 02:39:21', NULL),
(8, '0010-20000006', 'Buku Matematika Kelas XII', 'Matematika untuk kelas XII', 'Abdur Rahman As\'ari, Dr, H, M.Pd, M.A / Dahliatul Hasanah / Ipung Yuwono / Latifah Mustofa L / Lathi', 'Jakarta', 'Buku Sekolah Elektronik (BSE)', 'Juni 2018', '0010-20000006-Buku Matematika Kelas XII.jpg', '242', '13 x 19 cm', 'Edisi revisi 2018 kurikulum 2013', '510.1', '510.1', '129821-12982-1212', '1', '1', '1', '2021-05-21 21:59:28', '2021-05-21 22:00:06'),
(9, '0010-0000007', 'Buku Matematika Kelas 10 Kurikulum 2013', 'Matematika Kelas 10', 'Asri', 'Jakarta', 'Buku Sekolah Elektronik (BSE)', '2018', '0010-0000007-Buku Matematika Kelas 10 Kurikulum 2013.jpg', '250', '13 x 15 cm', 'Revisi 2018', '510.0', '510.0', '12989-1298-129', '1', '2', '1', '2021-05-21 22:05:46', '2021-05-21 22:24:24'),
(10, '0010-0000008', 'Kamus Bahasa Jepang', 'Indonesia - Jepang', 'Kano', 'Jakarta', 'Gramedi', '2019', 'sampul-default.png', '200', '18cm x 25cm', '-', '410.1', '410.1 Ka', '98320-320923-2309', '1', '3', '1', '2021-06-04 23:21:45', NULL),
(11, '0010-0000009', 'Matematika Dasar', 'Matematika untuk SD', 'Nunu', 'Subang', 'Erlangga', '2021', 'sampul-default.png', '120', '10 cm x 25 cm', NULL, '510.370', '510.370', '1221-1221-1221', '4', '2', '4', '2021-06-06 03:12:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `koleksi`
--

CREATE TABLE `koleksi` (
  `id` int(11) NOT NULL,
  `id_buku` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgl_pengadaan` date DEFAULT NULL,
  `jenis_sumber` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama_sumber` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `akses` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ketersediaan` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bib_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `koleksi`
--

INSERT INTO `koleksi` (`id`, `id_buku`, `tgl_pengadaan`, `jenis_sumber`, `nama_sumber`, `akses`, `ketersediaan`, `bib_id`, `created_at`, `updated_at`) VALUES
(1, '0001', '2021-05-04', 'Pengadaan', 'Sekolah', 'Dapat dipinjam', 'Dipinjam', '0010-1120000002', '2021-05-04 06:46:37', '2021-10-08 01:41:03'),
(2, '09202', '2021-05-04', 'Pembelian', 'Sekolah', 'Baca ditempat', 'Tersedia', '0010-1120000004', '2021-05-04 02:35:38', NULL),
(4, '0004', '2021-05-07', 'Pembelian', 'Sekolah', 'Dapat dipinjam', 'Dipinjam', '0010-1120000003', '2021-05-07 00:55:00', '2021-10-08 01:42:09'),
(5, '012345', '2021-05-22', 'Pengadaan', 'Sekolah', 'Dapat dipinjam', 'Tersedia', '0010-20000006', '2021-05-21 22:01:07', '2021-06-04 00:07:49'),
(6, '000032', '2021-05-13', 'Pembelian', 'Sekolah', 'Dapat dipinjam', 'Tersedia', '0010-0000008', '2021-06-04 23:22:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan`
--

CREATE TABLE `kunjungan` (
  `id` int(11) NOT NULL,
  `kd_anggota` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kunjungan`
--

INSERT INTO `kunjungan` (`id`, `kd_anggota`, `tgl`) VALUES
(1, 'S08982', '2021-05-21 03:57:44'),
(2, 'S00001', '2021-06-01 03:58:56'),
(3, 'S00025', '2021-06-01 04:13:29'),
(5, 's00001', '2021-06-06 09:55:35');

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
(15, '2021_04_26_064218_create_guru_table', 1),
(19, '2021_04_26_063521_create_siswa_table', 2),
(23, '2014_10_12_000000_create_users_table', 3),
(24, '2014_10_12_100000_create_password_resets_table', 3),
(25, '2019_08_19_000000_create_failed_jobs_table', 3),
(26, '2021_04_28_184046_anggota_table', 3),
(27, '2021_05_03_081151_create_katalog_table', 3),
(28, '2021_05_03_081212_create_katalog_jenis_bahan_table', 3),
(29, '2021_05_03_081226_create_katalog_jenis_karya_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@mail.com', '$2y$10$LZ/fTtEngzJOv8Nrp22u2ulX8beFgURosbuHoJU4EXoqQtdMvEw8.', '2021-05-07 09:50:45');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran`
--

CREATE TABLE `pelanggaran` (
  `id` int(11) NOT NULL,
  `no_transaksi` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_buku` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `jenis_pelanggaran` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `jenis_denda` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `jumlah_denda` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE `tamu` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `instansi` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `keperluan` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tamu`
--

INSERT INTO `tamu` (`id`, `nama`, `instansi`, `keperluan`, `tgl`) VALUES
(1, 'Luna', 'Perpusnas', 'Sosialisasi', '2021-05-02 03:05:49'),
(2, 'Prisma', 'Industri', 'Seminar', '2021-05-02 03:06:00'),
(3, 'Prisma', 'Industri', 'Seminar', '2021-05-02 03:06:05'),
(4, 'Sasa', 'ASN', 'Seminar', '2021-05-03 03:06:11'),
(6, 'Dinda', 'PGRI 2', 'Rapat', '2021-05-03 03:06:14'),
(7, 'Mina', 'PGRI', 'Rapat', '2021-05-03 03:06:17'),
(8, 'M. Bagas Setia Permana', 'Politeknik Negeri Subang', 'Mencari buku', '2021-06-06 09:56:00');

-- --------------------------------------------------------

--
-- Table structure for table `temp_kembali`
--

CREATE TABLE `temp_kembali` (
  `id_buku` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_transaksi` varchar(50) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `jatuh_tempo` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp_kembali`
--

INSERT INTO `temp_kembali` (`id_buku`, `no_transaksi`, `tgl_pinjam`, `jatuh_tempo`) VALUES
('0004', 'S00001', '2021-05-15', '2021-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `temp_peminjaman`
--

CREATE TABLE `temp_peminjaman` (
  `id_buku` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `kd_anggota` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `jatuh_tempo` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_koleksi`
--

CREATE TABLE `transaksi_koleksi` (
  `no` int(11) NOT NULL,
  `no_transaksi` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `kd_anggota` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_buku` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `jatuh_tempo` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `status_pinjam` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'Pinjam',
  `tinyint` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` varchar(50) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', '$2y$10$11d6UVHfAdPUssPvX7oEXuzqvHihkqSc2TukRRjmFH48qWnSisXsy', '1', NULL, '2021-04-08 18:00:09', '2021-05-03 01:38:07'),
(2, 'petugas', 'user@mail.com', '$2y$10$snPpU/sH5NWLLg80tHE3yuySWXpjGSN84RcNK9.y4osmXV8B0lXt2', '0', NULL, '2021-06-11 20:46:55', '2021-05-03 01:38:07'),
(3, 'Rima', 'Rima@mail.com', '$2y$10$O7SM8KCCFHymQxDlcOkwBeVGdyodnhze7GF84uAB5UGKMYSMSUvru', '1', NULL, '2021-06-04 22:00:27', '2021-06-04 22:00:27'),
(16, 'M. Bagas Setia', 'bagassetia271@gmail.com', '$2y$10$TxS0HPGxmX/GNuJ2RqUE4eTMrCwBEyHoWUi9dTqlEz4otWqCuLLWy', '0', NULL, '2021-06-13 22:47:11', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_eksemplar`
-- (See below for the actual view)
--
CREATE TABLE `v_eksemplar` (
`id_katalog` varchar(255)
,`judul_utama` varchar(100)
,`judul_sub` varchar(100)
,`pengarang` varchar(100)
,`tempat_terbit` varchar(100)
,`penerbit` varchar(100)
,`thn_terbit` varchar(100)
,`sampul_depan` varchar(255)
,`jumlah_hlm` varchar(100)
,`dimensi` varchar(255)
,`edisi` varchar(100)
,`kelas_ddc` varchar(100)
,`no_panggil` varchar(100)
,`isbn` varchar(100)
,`created_at` timestamp
,`id_buku` varchar(100)
,`tgl_pengadaan` date
,`jenis_sumber` varchar(100)
,`nama_sumber` varchar(100)
,`akses` varchar(100)
,`ketersediaan` varchar(100)
,`eksemplar` bigint(21)
,`id_bahan` bigint(20) unsigned
,`bahan` varchar(255)
,`id_karya` bigint(20) unsigned
,`karya` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_koleksi_katalog`
-- (See below for the actual view)
--
CREATE TABLE `v_koleksi_katalog` (
`id_buku` varchar(100)
,`bib_id` varchar(255)
,`judul_utama` varchar(100)
,`judul_sub` varchar(100)
,`pengarang` varchar(100)
,`tempat_terbit` varchar(100)
,`penerbit` varchar(100)
,`thn_terbit` varchar(100)
,`sampul_depan` varchar(255)
,`jumlah_hlm` varchar(100)
,`dimensi` varchar(255)
,`edisi` varchar(100)
,`kelas_ddc` varchar(100)
,`no_panggil` varchar(100)
,`isbn` varchar(100)
,`tgl_pengadaan` date
,`jenis_sumber` varchar(100)
,`nama_sumber` varchar(100)
,`akses` varchar(100)
,`ketersediaan` varchar(100)
,`eksemplar` bigint(21)
,`id_bahan` bigint(20) unsigned
,`bahan` varchar(255)
,`id_karya` bigint(20) unsigned
,`karya` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_transaksi`
-- (See below for the actual view)
--
CREATE TABLE `v_transaksi` (
`kd_anggota` varchar(255)
,`nama_anggota` varchar(100)
,`status` varchar(100)
,`id_buku` varchar(100)
,`judul_utama` varchar(100)
,`judul_sub` varchar(100)
,`pengarang` varchar(100)
,`tempat_terbit` varchar(100)
,`penerbit` varchar(100)
,`thn_terbit` varchar(100)
,`jumlah_hlm` varchar(100)
,`dimensi` varchar(255)
,`edisi` varchar(100)
,`bahan` varchar(255)
,`no_transaksi` varchar(50)
,`tgl_pinjam` date
,`jatuh_tempo` date
,`tgl_kembali` date
,`status_pinjam` varchar(255)
,`tinyint` tinyint(4)
);

-- --------------------------------------------------------

--
-- Structure for view `v_eksemplar`
--
DROP TABLE IF EXISTS `v_eksemplar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_eksemplar`  AS SELECT `a`.`bib_id` AS `id_katalog`, `a`.`judul_utama` AS `judul_utama`, `a`.`judul_sub` AS `judul_sub`, `a`.`pengarang` AS `pengarang`, `a`.`tempat_terbit` AS `tempat_terbit`, `a`.`penerbit` AS `penerbit`, `a`.`thn_terbit` AS `thn_terbit`, `a`.`sampul_depan` AS `sampul_depan`, `a`.`jumlah_hlm` AS `jumlah_hlm`, `a`.`dimensi` AS `dimensi`, `a`.`edisi` AS `edisi`, `a`.`kelas_ddc` AS `kelas_ddc`, `a`.`no_panggil` AS `no_panggil`, `a`.`isbn` AS `isbn`, `a`.`created_at` AS `created_at`, `b`.`id_buku` AS `id_buku`, `b`.`tgl_pengadaan` AS `tgl_pengadaan`, `b`.`jenis_sumber` AS `jenis_sumber`, `b`.`nama_sumber` AS `nama_sumber`, `b`.`akses` AS `akses`, `b`.`ketersediaan` AS `ketersediaan`, count(`b`.`id_buku`) AS `eksemplar`, `c`.`id` AS `id_bahan`, `c`.`jenis_bahan` AS `bahan`, `d`.`id` AS `id_karya`, `d`.`jenis_karya` AS `karya` FROM ((((`katalog` `a` left join `koleksi` `b` on(`b`.`bib_id` = `a`.`bib_id`)) left join `jenis_bahan` `c` on(`c`.`id` = `a`.`id_jenis_bahan`)) left join `jenis_karya` `d` on(`d`.`id` = `a`.`id_jenis_karya`)) left join `bahasa` `e` on(`e`.`id` = `a`.`id_bahasa`)) GROUP BY `a`.`bib_id` ;

-- --------------------------------------------------------

--
-- Structure for view `v_koleksi_katalog`
--
DROP TABLE IF EXISTS `v_koleksi_katalog`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_koleksi_katalog`  AS SELECT `b`.`id_buku` AS `id_buku`, `a`.`bib_id` AS `bib_id`, `a`.`judul_utama` AS `judul_utama`, `a`.`judul_sub` AS `judul_sub`, `a`.`pengarang` AS `pengarang`, `a`.`tempat_terbit` AS `tempat_terbit`, `a`.`penerbit` AS `penerbit`, `a`.`thn_terbit` AS `thn_terbit`, `a`.`sampul_depan` AS `sampul_depan`, `a`.`jumlah_hlm` AS `jumlah_hlm`, `a`.`dimensi` AS `dimensi`, `a`.`edisi` AS `edisi`, `a`.`kelas_ddc` AS `kelas_ddc`, `a`.`no_panggil` AS `no_panggil`, `a`.`isbn` AS `isbn`, `b`.`tgl_pengadaan` AS `tgl_pengadaan`, `b`.`jenis_sumber` AS `jenis_sumber`, `b`.`nama_sumber` AS `nama_sumber`, `b`.`akses` AS `akses`, `b`.`ketersediaan` AS `ketersediaan`, count(`b`.`id_buku`) AS `eksemplar`, `c`.`id` AS `id_bahan`, `c`.`jenis_bahan` AS `bahan`, `d`.`id` AS `id_karya`, `d`.`jenis_karya` AS `karya` FROM ((((`katalog` `a` join `koleksi` `b` on(`b`.`bib_id` = `a`.`bib_id`)) join `jenis_bahan` `c` on(`c`.`id` = `a`.`id_jenis_bahan`)) join `jenis_karya` `d` on(`d`.`id` = `a`.`id_jenis_karya`)) join `bahasa` `e` on(`e`.`id` = `a`.`id_bahasa`)) GROUP BY `a`.`bib_id` ;

-- --------------------------------------------------------

--
-- Structure for view `v_transaksi`
--
DROP TABLE IF EXISTS `v_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_transaksi`  AS SELECT `b`.`kd_anggota` AS `kd_anggota`, `b`.`nama_anggota` AS `nama_anggota`, `b`.`status` AS `status`, `c`.`id_buku` AS `id_buku`, `c`.`judul_utama` AS `judul_utama`, `c`.`judul_sub` AS `judul_sub`, `c`.`pengarang` AS `pengarang`, `c`.`tempat_terbit` AS `tempat_terbit`, `c`.`penerbit` AS `penerbit`, `c`.`thn_terbit` AS `thn_terbit`, `c`.`jumlah_hlm` AS `jumlah_hlm`, `c`.`dimensi` AS `dimensi`, `c`.`edisi` AS `edisi`, `c`.`bahan` AS `bahan`, `a`.`no_transaksi` AS `no_transaksi`, `a`.`tgl_pinjam` AS `tgl_pinjam`, `a`.`jatuh_tempo` AS `jatuh_tempo`, `a`.`tgl_kembali` AS `tgl_kembali`, `a`.`status_pinjam` AS `status_pinjam`, `a`.`tinyint` AS `tinyint` FROM ((`transaksi_koleksi` `a` left join `anggota` `b` on(`b`.`kd_anggota` = `a`.`kd_anggota`)) left join `v_koleksi_katalog` `c` on(`c`.`id_buku` = `a`.`id_buku`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahasa`
--
ALTER TABLE `bahasa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenis_bahan`
--
ALTER TABLE `jenis_bahan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jenis_bahan_id_unique` (`id`),
  ADD UNIQUE KEY `jenis_bahan_jenis_bahan_unique` (`jenis_bahan`);

--
-- Indexes for table `jenis_karya`
--
ALTER TABLE `jenis_karya`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jenis_karya_id_unique` (`id`),
  ADD UNIQUE KEY `jenis_karya_jenis_karya_unique` (`jenis_karya`);

--
-- Indexes for table `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `katalog_bib_id_unique` (`bib_id`);

--
-- Indexes for table `koleksi`
--
ALTER TABLE `koleksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_peminjaman`
--
ALTER TABLE `temp_peminjaman`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `transaksi_koleksi`
--
ALTER TABLE `transaksi_koleksi`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahasa`
--
ALTER TABLE `bahasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_bahan`
--
ALTER TABLE `jenis_bahan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenis_karya`
--
ALTER TABLE `jenis_karya`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `katalog`
--
ALTER TABLE `katalog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `koleksi`
--
ALTER TABLE `koleksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tamu`
--
ALTER TABLE `tamu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaksi_koleksi`
--
ALTER TABLE `transaksi_koleksi`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
