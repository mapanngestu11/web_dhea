-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2023 at 06:59 PM
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
-- Table structure for table `tbl_jadwal_kegiatan`
--

CREATE TABLE `tbl_jadwal_kegiatan` (
  `id_jadwal` int(11) NOT NULL,
  `nama_kegiatan` varchar(50) NOT NULL,
  `waktu` date NOT NULL,
  `isi_kegiatan` text NOT NULL,
  `gambar` text NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `nama_user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jadwal_kegiatan`
--

INSERT INTO `tbl_jadwal_kegiatan` (`id_jadwal`, `nama_kegiatan`, `waktu`, `isi_kegiatan`, `gambar`, `tempat`, `nama_user`) VALUES
(2, 'AGENDA KEGIATAN MEMERIAHKAN HUT KE 78 KEMERDEKAAN ', '2023-08-17', 'Panita Peringatan Hari Ulang Tahun Ke-78 Proklamasi Kemerdekaan Republik Indonesia Tahun 2023 Kelurahan Karang Timur akan mengadakan berbagai macam kegiatan. Dengan harapan bahwa Peringatan HUT dimaksud dapat berjalan dengan meriah, marak dan mampu menumbuhkan semangat kebangsaan di masyarakat. ', 'd3293f53d4bead5982cc6e1b86a3f3b4.png', 'Kelurahan Karang Timur', 'admin');

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
(5, 'Penyemprotan Disinfektan', 'Upaya pencegahan dan penyebaran virus dan mensemprot disetiap rumah ke rumah', '9c83eb25815dea343862cfc40058fe91.jpg', '2020-03-24', 'Kelurahan Karang Timur', '2023-09-06 08:51:47', 'admin'),
(6, 'Vaksinasi', 'Kegiatan vaksinasi ini untuk mengurangi resiko penularan covid19 dengan bertujuan untuk menjaga kekebalan tubuh atau daya tahan tubuh', 'f0b7295eaa1f539069291eebef308cdb.jpg', '2021-08-25', 'Kelurahan Karang Timur', '2023-09-06 08:57:33', 'admin'),
(7, 'Kegiatan lomba 17 agustus', 'Untuk meramaikan susasana kemerdekaan indonesia yang diselenggarakan pada tanggal 17 agustus 1945\r\n', '4dd2dcb4200ab4177c0a4cf2fc5cdf2e.jpg', '2023-08-17', 'Kelurahan Karang Timur', '2023-09-06 08:58:56', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permohonan_ktp_baru`
--

CREATE TABLE `tbl_permohonan_ktp_baru` (
  `id_ktp_baru` int(11) NOT NULL,
  `kode_permohonan` int(10) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
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

INSERT INTO `tbl_permohonan_ktp_baru` (`id_ktp_baru`, `kode_permohonan`, `nik`, `nama_lengkap`, `kebutuhan`, `status`, `file_pemohon`, `nama_user`, `file_surat`, `keterangan`, `tanggal`) VALUES
(1, 631982, '1234', '', '1234', 1, 'caca5d2b137e34736cb6f19ab0d08d3a.pdf', 'admin', 'caca5d2b137e34736cb6f19ab0d08d3a.pdf', '1234', '2023-08-24 02:01:36'),
(3, 864777, '1234', '', 'testing ', 0, '76171e922bab866c1b62c1e97069affb.pdf', '', '', '', '2023-08-24 10:40:18'),
(4, 883401, '1234', '', '123', 0, 'b79cb2cfe1b226f91a7eaad17f6c0948.pdf', 'admin', '', '', '2023-07-25 10:43:17'),
(5, 912546, '1234', '', 'bikin pendatang', 0, '8bd0d25ba69fa9121f1767a60b68570c.pdf', '', '', '', '2023-08-25 01:54:01'),
(6, 855779, '1234', '', 'sadas', 0, '8300fb2c34ad54e19969ce512b191294.jpg', '', '', '', '2023-08-29 09:22:14'),
(7, 429955, NULL, '', '123', 0, 'cb87eb56ab4589070ead9df1b50e48f1.pdf', '', '', '', '2023-09-09 06:48:45'),
(8, 337070, NULL, 'budi', 'test', 0, '3461443c69e747a7aa897a6e2d61215d.pdf', '', '', '', '2023-09-09 07:02:29');

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
(2, 16309, '1234', 'sdasda', 0, '5d55ce67dc17b7a69cea820e92b90575.pdf', '', '', '', '2023-08-25 01:55:20'),
(3, 691016, '3671012708670001', 'tesrub', 1, '5c82179f1bff12ba8d787da5f0f3ad5c.pdf', 'admin', '', 'silahkan ambil di kelrurahan', '2023-09-06 09:25:20');

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
(2, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2023-04-10 07:09:00'),
(3, 'lurah', 'lurah', '9d2a50653cfb887a750a903d363c6be5', 'lurah', '2023-10-14 09:11:07');

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
  `file` text,
  `status` int(2) NOT NULL,
  `nama_user` varchar(30) DEFAULT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_warga`
--

INSERT INTO `tbl_warga` (`id_warga`, `nik`, `nama_lengkap`, `jenis_kelamin`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kota`, `provinsi`, `kode_pos`, `telp`, `email`, `jumlah_anggota_keluarga`, `file`, `status`, `nama_user`, `tanggal`) VALUES
(1, '3671012708670001', 'Budi', 'Laki-Laki', 'Perum Rajeg', '1', '1', 'Rajeg', 'Senopati', 'Tangerang', 'Banten', '15540', '1', '123@gmail.com', 0, 'd268852944c5005fd2ff02883a809fcd.pdf', 1, 'admin', '2023-09-06 09:16:22'),
(2, '3603131708990006', 'Banu', 'Laki-Laki', 'Cimone', '1', '1', 'Karawaci', 'Karawaci', 'Tangerang', 'Banten', '15114', '08976543221', '123@gmail.com', 1, 'd268852944c5005fd2ff02883a809fcd.pdf', 2, 'admin', '2023-09-06 09:47:30'),
(3, '3671012708670004', 'didi', 'Laki-Laki', 'adsa', '1', '1', '1', '1', '1', '1', '1', '1', '123@gmail.com', 1, 'd268852944c5005fd2ff02883a809fcd.pdf', 0, 'admin', '2023-09-10 04:54:21'),
(4, '3671102611970005', 'Julianto', 'Laki-Laki', 'Sepatan', '12', '12', 'Karawaci', 'Sepatan', 'Tangerang', 'Banten', '15520', '08976543211', '1@gmail.com', 1, 'd9f6210d4ba426208b5e53bdfc6b83ba.pdf', 2, 'admin', '2023-09-06 09:49:26'),
(5, '3671012708670004', 'Prastama', 'Laki-Laki', 'adsa', '11', '11', '13', '13', '12', '12', '12', '12', '123@gmail.com', 12, '0d11bb9be34c53288aa0811b359ce3c2.pdf', 1, 'admin', '2023-09-10 04:55:03'),
(6, '3671012708670004', 'janu', 'Laki-Laki', 'adsa', '1', '1', '1', '1', '1', '1', '1', '1', '', 1, '4aedc1b313bed38f0f45ca489bcc176d.pdf', 1, 'admin', '2023-09-07 02:10:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_jadwal_kegiatan`
--
ALTER TABLE `tbl_jadwal_kegiatan`
  ADD PRIMARY KEY (`id_jadwal`);

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
-- AUTO_INCREMENT for table `tbl_jadwal_kegiatan`
--
ALTER TABLE `tbl_jadwal_kegiatan`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_permohonan_ktp_baru`
--
ALTER TABLE `tbl_permohonan_ktp_baru`
  MODIFY `id_ktp_baru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_permohonan_surat_kelahiran`
--
ALTER TABLE `tbl_permohonan_surat_kelahiran`
  MODIFY `id_surat_kelahiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_permohonan_surat_pendatang`
--
ALTER TABLE `tbl_permohonan_surat_pendatang`
  MODIFY `id_surat_pendatang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_warga`
--
ALTER TABLE `tbl_warga`
  MODIFY `id_warga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
