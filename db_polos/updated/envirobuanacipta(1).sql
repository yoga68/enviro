-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2019 at 09:04 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `envirobuanacipta`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_berita`
--

CREATE TABLE `t_berita` (
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_katberita` int(11) NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `isi_berita` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status_berita` enum('Publish','Draft','','') NOT NULL,
  `jenis_berita` varchar(20) NOT NULL,
  `keywords` varchar(500) NOT NULL,
  `tanggal_post` date NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_berita`
--

INSERT INTO `t_berita` (`id_berita`, `id_user`, `id_katberita`, `slug_berita`, `judul_berita`, `isi_berita`, `gambar`, `status_berita`, `jenis_berita`, `keywords`, `tanggal_post`, `tanggal`) VALUES
(3, 1, 2, 'ekup-kota-tangerang-2019', 'EKUP Kota Tangerang 2019', 'EKUP Kota Tangerang 2019', 'konfirm1.PNG', 'Publish', 'Berita', 'EKUP, Langit Biru', '2019-09-24', '2019-09-24 19:58:48'),
(5, 1, 1, 'fred-kota-tangerang-2019', 'FRED Kota Tangerang 2019', 'FRED Kota Tangerang 2019', 'imageedit_1_2044687729.png', 'Publish', 'Berita', 'FRED TANGKOT, FRED', '2019-09-24', '2019-09-25 16:50:25');

-- --------------------------------------------------------

--
-- Table structure for table `t_galeri`
--

CREATE TABLE `t_galeri` (
  `id_galeri` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_katlayanan` int(11) NOT NULL,
  `judul_galeri` varchar(255) NOT NULL,
  `isi_galeri` text NOT NULL,
  `website` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `posisi` varchar(20) NOT NULL,
  `tanggal_post` date NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_katberita`
--

CREATE TABLE `t_katberita` (
  `id_katberita` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_katberita`
--

INSERT INTO `t_katberita` (`id_katberita`, `slug_kategori`, `nama_kategori`, `urutan`, `tanggal`) VALUES
(1, 'fun-rally-eco-drive', 'FUN RALLY ECO DRIVE', 2, '2019-09-24 14:55:28'),
(2, 'ekup-evaluasi-kualitas-udara-perkotaan', 'EKUP ( Evaluasi Kualitas Udara Perkotaan )', 1, '2019-09-24 16:20:02'),
(3, 'uji-emisi', 'Uji Emisi', 3, '2019-09-25 15:25:07'),
(4, 'umum', 'Umum', 4, '2019-09-25 15:25:40');

-- --------------------------------------------------------

--
-- Table structure for table `t_katlayanan`
--

CREATE TABLE `t_katlayanan` (
  `id_katlayanan` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_katlayanan`
--

INSERT INTO `t_katlayanan` (`id_katlayanan`, `slug_kategori`, `nama_kategori`, `urutan`, `tanggal`) VALUES
(1, 'environment-monitoring', 'Environment Monitoring', 1, '2019-09-25 16:05:17'),
(2, 'emission-test-equipment', 'Emission Test Equipment', 2, '2019-09-25 16:05:35'),
(3, 'ecodriving-rally', 'EcoDriving Rally', 3, '2019-09-25 16:05:51'),
(4, 'driving-training', 'Driving Training', 4, '2019-09-25 16:06:04');

-- --------------------------------------------------------

--
-- Table structure for table `t_konfigurasi`
--

CREATE TABLE `t_konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `namaweb` varchar(50) NOT NULL,
  `tagline` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(300) DEFAULT NULL,
  `keywords` varchar(300) DEFAULT NULL,
  `metatext` text,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_layanan`
--

CREATE TABLE `t_layanan` (
  `id_layanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_katlayanan` int(11) NOT NULL,
  `slug_layanan` varchar(255) NOT NULL,
  `judul_layanan` varchar(255) NOT NULL,
  `isi_layanan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status_layanan` enum('Publish','Draft','','') NOT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `tanggal_post` date NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_layanan`
--

INSERT INTO `t_layanan` (`id_layanan`, `id_user`, `id_katlayanan`, `slug_layanan`, `judul_layanan`, `isi_layanan`, `gambar`, `status_layanan`, `keywords`, `tanggal_post`, `tanggal`) VALUES
(3, 1, 1, 'vechile-emission-testing', 'Vechile Emission Testing', 'Vechile Emission Testing', 'logo_acara_16.jpg', 'Publish', 'Vechile Emission Testing', '2019-09-25', '2019-09-25 16:49:59');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `tanggal`) VALUES
(1, 'Yoga Priatama', 'yogapriatama738@gmail.com', 'yoga68', 'ebcdf3fd3ed476d49a7a8f8ec422bda1bfc3bb66', 'Admin', '2019-09-24 13:24:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_berita`
--
ALTER TABLE `t_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `t_galeri`
--
ALTER TABLE `t_galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `t_katberita`
--
ALTER TABLE `t_katberita`
  ADD PRIMARY KEY (`id_katberita`);

--
-- Indexes for table `t_katlayanan`
--
ALTER TABLE `t_katlayanan`
  ADD PRIMARY KEY (`id_katlayanan`);

--
-- Indexes for table `t_konfigurasi`
--
ALTER TABLE `t_konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `t_layanan`
--
ALTER TABLE `t_layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_berita`
--
ALTER TABLE `t_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `t_galeri`
--
ALTER TABLE `t_galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_katberita`
--
ALTER TABLE `t_katberita`
  MODIFY `id_katberita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `t_katlayanan`
--
ALTER TABLE `t_katlayanan`
  MODIFY `id_katlayanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `t_konfigurasi`
--
ALTER TABLE `t_konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_layanan`
--
ALTER TABLE `t_layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
