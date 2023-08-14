-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2023 at 02:04 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dea`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id_banner` int(11) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `gambar` text NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`id_banner`, `judul`, `gambar`, `nama_user`, `tanggal`) VALUES
(1, 'Banner 1', 'fe1abd753a2472b906cfef3926d6061e.png', '', '2023-08-14 00:01:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kegiatan`
--

CREATE TABLE `tbl_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(30) NOT NULL,
  `isi_kegiatan` text NOT NULL,
  `gambar` text NOT NULL,
  `status` int(5) NOT NULL,
  `tanggal` datetime NOT NULL,
  `nama_user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kegiatan`
--

INSERT INTO `tbl_kegiatan` (`id_kegiatan`, `nama_kegiatan`, `isi_kegiatan`, `gambar`, `status`, `tanggal`, `nama_user`) VALUES
(1, 'testing', 'isi kegiatan 1', '61ef5bf41e67922629f8eabf00e8f02d.jpg', 1, '2023-08-13 02:44:32', 'admin'),
(2, 'kegiatan 2', 'isi kegiatan 2', '829ecdc17263382811bc0d96a297a8ff.jpg', 1, '2023-08-13 02:48:18', 'admin'),
(3, 'kegiatan 3', 'isi kegiatan 3', '48c3d3f754c4a7681964fcede1dacd2f.jpg', 1, '2023-08-13 02:49:19', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permohonan_ktp_baru`
--

CREATE TABLE `tbl_permohonan_ktp_baru` (
  `id_ktp_baru` int(11) NOT NULL,
  `kode_permohonan` int(10) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `kebutuhan` text NOT NULL,
  `status` int(2) NOT NULL,
  `file_pemohon` text NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `file_surat` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permohonan_surat_kelahiran`
--

CREATE TABLE `tbl_permohonan_surat_kelahiran` (
  `id_surat_kelahiran` int(11) NOT NULL,
  `kode_permohonan` int(10) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `kebutuhan` text NOT NULL,
  `status` int(2) NOT NULL,
  `file_pemohon` text NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `file_surat` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permohonan_surat_pendatang`
--

CREATE TABLE `tbl_permohonan_surat_pendatang` (
  `id_surat_pendatang` int(11) NOT NULL,
  `kode_permohonan` int(10) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `kebutuhan` text NOT NULL,
  `status` int(2) NOT NULL,
  `file_pemohon` text NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `file_surat` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hak_akses` varchar(10) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_lengkap`, `username`, `password`, `hak_akses`, `waktu`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_warga`
--

CREATE TABLE `tbl_warga` (
  `id_warga` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `kelurahan` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `file` text NOT NULL,
  `status` int(2) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `tbl_permohonan_ktp_baru`
--
ALTER TABLE `tbl_permohonan_ktp_baru`
  ADD PRIMARY KEY (`id_ktp_baru`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_warga`
--
ALTER TABLE `tbl_warga`
  ADD PRIMARY KEY (`id_warga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_permohonan_ktp_baru`
--
ALTER TABLE `tbl_permohonan_ktp_baru`
  MODIFY `id_ktp_baru` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_warga`
--
ALTER TABLE `tbl_warga`
  MODIFY `id_warga` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
