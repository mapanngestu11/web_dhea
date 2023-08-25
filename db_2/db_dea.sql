-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2023 at 09:03 AM
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
-- Table structure for table `tbl_kegiatan`
--

CREATE TABLE `tbl_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(30) NOT NULL,
  `isi_kegiatan` text NOT NULL,
  `gambar` text NOT NULL,
  `waktu` date NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL,
  `nama_user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kegiatan`
--

INSERT INTO `tbl_kegiatan` (`id_kegiatan`, `nama_kegiatan`, `isi_kegiatan`, `gambar`, `waktu`, `tempat`, `tanggal`, `nama_user`) VALUES
(5, 'Penyemprotan Disinfektan', 'Nurhasan ketua Rw 09 Kelurahan Karang Timur Kecamatan Karang Tengah Kota Tangerang, peduli terhadap kesehatan lingkungan warga nya di Rt 01, 02, 03 dan 04, 24/3/2020.', '9c83eb25815dea343862cfc40058fe91.jpg', '2020-03-24', 'Kelurahan Karang Timur', '2023-08-25 09:19:36', 'admin'),
(6, 'Vaksinasi', 'Kegiatan Vaksinasi keluar', 'f0b7295eaa1f539069291eebef308cdb.jpg', '2021-08-25', 'Kelurahan Karang Timur', '2023-08-25 09:21:59', 'admin'),
(7, 'kegiatan lomba 17 agustus', 'kegiatan lomba warga ', '4dd2dcb4200ab4177c0a4cf2fc5cdf2e.jpg', '2023-08-17', 'Kelurahan Karang Timur', '2023-08-25 09:28:20', 'admin');

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
  `keterangan` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_permohonan_ktp_baru`
--

INSERT INTO `tbl_permohonan_ktp_baru` (`id_ktp_baru`, `kode_permohonan`, `nik`, `kebutuhan`, `status`, `file_pemohon`, `nama_user`, `file_surat`, `keterangan`, `tanggal`) VALUES
(1, 631982, '1234', '1234', 1, 'caca5d2b137e34736cb6f19ab0d08d3a.pdf', 'admin', 'caca5d2b137e34736cb6f19ab0d08d3a.pdf', '1234', '2023-08-24 02:01:36'),
(3, 864777, '1234', 'testing ', 0, '76171e922bab866c1b62c1e97069affb.pdf', '', '', '', '2023-08-24 10:40:18'),
(4, 883401, '1234', '123', 0, 'b79cb2cfe1b226f91a7eaad17f6c0948.pdf', 'admin', '', '', '2023-08-25 10:43:17'),
(5, 912546, '1234', 'bikin pendatang', 0, '8bd0d25ba69fa9121f1767a60b68570c.pdf', '', '', '', '2023-08-25 01:54:01');

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
  `keterangan` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_permohonan_surat_kelahiran`
--

INSERT INTO `tbl_permohonan_surat_kelahiran` (`id_surat_kelahiran`, `kode_permohonan`, `nik`, `kebutuhan`, `status`, `file_pemohon`, `nama_user`, `file_surat`, `keterangan`, `tanggal`) VALUES
(1, 909441, '1234', 'kelahiran', 1, '3e92e7febf80cf0d56a0cd4c2aae80c6.pdf', 'admin', '', 'sda', '2023-08-25 11:08:27'),
(2, 752149, '1234', 'surat lahir', 0, '7ae44cbd19b69c07003907f6aaa17b5f.pdf', '', '', '', '2023-08-25 02:02:28');

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
  `keterangan` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_permohonan_surat_pendatang`
--

INSERT INTO `tbl_permohonan_surat_pendatang` (`id_surat_pendatang`, `kode_permohonan`, `nik`, `kebutuhan`, `status`, `file_pemohon`, `nama_user`, `file_surat`, `keterangan`, `tanggal`) VALUES
(1, 483390, '1234', 'pendatang', 1, '9bfc3e7228e21429724792ece3a99f0f.pdf', 'admin', '', '', '2023-08-25 10:44:25'),
(2, 16309, '1234', 'sdasda', 0, '5d55ce67dc17b7a69cea820e92b90575.pdf', '', '', '', '2023-08-25 01:55:20');

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
  `email` varchar(50) NOT NULL,
  `jumlah_anggota_keluarga` int(2) NOT NULL,
  `file` text NOT NULL,
  `status` int(2) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_warga`
--

INSERT INTO `tbl_warga` (`id_warga`, `nik`, `nama_lengkap`, `jenis_kelamin`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kota`, `provinsi`, `kode_pos`, `telp`, `email`, `jumlah_anggota_keluarga`, `file`, `status`, `nama_user`, `tanggal`) VALUES
(1, '1234', 'BUDI a', 'Laki-Laki', '1', '1', '1', '1', '1', '1', '1', '1', '1', '123@gmail.com', 1, 'd268852944c5005fd2ff02883a809fcd.pdf', 1, 'admin', '2023-08-23 09:14:01'),
(2, '1235', 'banu', 'Laki-Laki', '1', '1', '1', '1', '1', '1', '1', '1', '1', '123@gmail.com', 1, 'd268852944c5005fd2ff02883a809fcd.pdf', 2, 'admin', '2023-08-23 09:14:01'),
(3, '1236', 'didi', 'Laki-Laki', '1', '1', '1', '1', '1', '1', '1', '1', '1', '123@gmail.com', 1, 'd268852944c5005fd2ff02883a809fcd.pdf', 0, 'admin', '2023-08-23 09:14:01');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `tbl_permohonan_surat_kelahiran`
--
ALTER TABLE `tbl_permohonan_surat_kelahiran`
  ADD PRIMARY KEY (`id_surat_kelahiran`);

--
-- Indexes for table `tbl_permohonan_surat_pendatang`
--
ALTER TABLE `tbl_permohonan_surat_pendatang`
  ADD PRIMARY KEY (`id_surat_pendatang`);

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
-- AUTO_INCREMENT for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_permohonan_ktp_baru`
--
ALTER TABLE `tbl_permohonan_ktp_baru`
  MODIFY `id_ktp_baru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_permohonan_surat_kelahiran`
--
ALTER TABLE `tbl_permohonan_surat_kelahiran`
  MODIFY `id_surat_kelahiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_permohonan_surat_pendatang`
--
ALTER TABLE `tbl_permohonan_surat_pendatang`
  MODIFY `id_surat_pendatang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_warga`
--
ALTER TABLE `tbl_warga`
  MODIFY `id_warga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
