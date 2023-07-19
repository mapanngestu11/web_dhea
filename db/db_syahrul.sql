-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2023 at 07:52 AM
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
-- Database: `db_syahrul`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id_banner` int(11) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `gambar` text NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`id_banner`, `judul`, `gambar`, `nama_lengkap`, `tanggal`) VALUES
(1, 'gambar', '8b65d230a9894f177f1080bf71b1fbec.png', 'syahrul', '2023-07-07 02:44:36');

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
  `nama_lengkap` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kegiatan`
--

INSERT INTO `tbl_kegiatan` (`id_kegiatan`, `nama_kegiatan`, `isi_kegiatan`, `gambar`, `status`, `tanggal`, `nama_lengkap`) VALUES
(1, 'nama', 'admin', '9eafefcd1e9c380fc801af60d015b94e.png', 0, '2023-07-10 11:26:00', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permohonan_kk_baru`
--

CREATE TABLE `tbl_permohonan_kk_baru` (
  `id_kk_baru` int(11) NOT NULL,
  `kode_permohonan` int(10) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `alasan` int(2) NOT NULL,
  `status` int(2) NOT NULL,
  `file_pemohon` text,
  `nama_user` varchar(30) DEFAULT NULL,
  `file_surat` text,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permohonan_kk_perubahan`
--

CREATE TABLE `tbl_permohonan_kk_perubahan` (
  `id_kk_perubahan` int(11) NOT NULL,
  `kode_permohonan` int(10) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `no_kk` varchar(20) NOT NULL,
  `alasan` int(2) NOT NULL,
  `status` int(2) DEFAULT NULL,
  `file_pemohon` text,
  `nama_user` varchar(30) DEFAULT NULL,
  `file_surat` text,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permohonan_surat_pindah`
--

CREATE TABLE `tbl_permohonan_surat_pindah` (
  `id_surat_pindah` int(11) NOT NULL,
  `kode_permohonan` int(10) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `status` int(2) NOT NULL,
  `file_pemohon` text,
  `alasan` int(11) NOT NULL,
  `nama_user` varchar(30) DEFAULT NULL,
  `file_surat` text,
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
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '0000-00-00 00:00:00'),
(2, 'aku', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2023-07-06 01:59:34'),
(3, 'syahrul', 'syahrul', '25d55ad283aa400af464c76d713c07ad', 'admin', '2023-07-07 09:23:45');

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
-- Dumping data for table `tbl_warga`
--

INSERT INTO `tbl_warga` (`id_warga`, `nik`, `nama_lengkap`, `jenis_kelamin`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kota`, `provinsi`, `kode_pos`, `telp`, `file`, `status`, `nama_user`, `tanggal`) VALUES
(1, '123', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, 'admin', '2023-07-15 00:00:00');

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
-- Indexes for table `tbl_permohonan_kk_baru`
--
ALTER TABLE `tbl_permohonan_kk_baru`
  ADD PRIMARY KEY (`id_kk_baru`);

--
-- Indexes for table `tbl_permohonan_kk_perubahan`
--
ALTER TABLE `tbl_permohonan_kk_perubahan`
  ADD PRIMARY KEY (`id_kk_perubahan`);

--
-- Indexes for table `tbl_permohonan_surat_pindah`
--
ALTER TABLE `tbl_permohonan_surat_pindah`
  ADD PRIMARY KEY (`id_surat_pindah`);

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
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_permohonan_kk_baru`
--
ALTER TABLE `tbl_permohonan_kk_baru`
  MODIFY `id_kk_baru` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_permohonan_kk_perubahan`
--
ALTER TABLE `tbl_permohonan_kk_perubahan`
  MODIFY `id_kk_perubahan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_permohonan_surat_pindah`
--
ALTER TABLE `tbl_permohonan_surat_pindah`
  MODIFY `id_surat_pindah` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_warga`
--
ALTER TABLE `tbl_warga`
  MODIFY `id_warga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
