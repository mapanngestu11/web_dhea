-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Des 2023 pada 00.36
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

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
-- Struktur dari tabel `tbl_ktp`
--

CREATE TABLE `tbl_ktp` (
  `id_ktp` int(11) NOT NULL,
  `kode_permohonan` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `tgl_lahir` varchar(30) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `akta` text NOT NULL,
  `kk` text NOT NULL,
  `surat_pengantar` text NOT NULL,
  `status` int(2) NOT NULL,
  `keterangan` text,
  `nama_user` varchar(50) DEFAULT NULL,
  `file_user` text,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ktp`
--

INSERT INTO `tbl_ktp` (`id_ktp`, `kode_permohonan`, `nama`, `jenis_kelamin`, `tgl_lahir`, `tempat_lahir`, `email`, `no_telp`, `pekerjaan`, `pendidikan`, `alamat`, `akta`, `kk`, `surat_pengantar`, `status`, `keterangan`, `nama_user`, `file_user`, `tanggal`) VALUES
(1, 327901, 'MAULANA AGUNG PANGESTU', 'Laki-Laki', '08/12/2023', '123', 'tes@gmail.com', '087771831145', '13', 'd3', 'tangerang', '381410a675eb82434c97af850e7ded2c.pdf', '6bdf69636c98c42742add68695fe55fc.pdf', '451fa267a82a926221e2fa31ef93624f.pdf', 0, NULL, NULL, NULL, '2023-12-14 23:02:09'),
(2, 395662, 'testing', 'Perempuan', '15/12/2023', 'bandung', 'maulanaagung543@gmail.com', '085756678029', '123', 'd3', 'KP. KARANGANYAR', '59bd9f5ffa3c1ef59725323c16d63652.pdf', 'a5c603ee18d17b96bfb88c7390670d52.pdf', '1eedcac7d9c4c3d84292abf49cb18339.pdf', 0, NULL, NULL, NULL, '2023-12-14 23:11:00'),
(3, 640084, 'testing', 'Perempuan', '08/12/2023', 'bandung', 'pangestu2612@gmail.com', '083892670299', '123', 'd3', 'KP. KARANGANYAR', 'aae9beb15367b276cc1b2edd2c4d2123.pdf', '70f77ab6c720b3e18fc8221790c1bcc1.pdf', 'ac98738be3836fd7e33720ae2cd36fff.pdf', 0, NULL, NULL, NULL, '2023-12-14 23:16:54'),
(4, 453565, 'testing', 'Perempuan', '08/12/2023', 'bandung', 'pangestu2612@gmail.com', '083892670299', '123', 'd3', 'KP. KARANGANYAR', 'f32d8a4ed19a1dbac56408ea05a25929.pdf', '430f7a803f6818221c64cdc73c2e8860.pdf', '41dc1fe447dd3dd7bf93048b2c950432.pdf', 0, NULL, NULL, NULL, '2023-12-14 23:18:14'),
(5, 453565, 'testing', 'Perempuan', '08/12/2023', 'bandung', 'pangestu2612@gmail.com', '083892670299', '123', 'd3', 'KP. KARANGANYAR', 'e880273c8bb1efc82fee7c1e0a95e9f3.pdf', 'f00bb5c839afd6319792ff7a18af653f.pdf', '76732bd38cddaf781d303b9f189d0ad0.pdf', 0, NULL, NULL, NULL, '2023-12-14 23:18:31'),
(6, 453565, 'testing', 'Perempuan', '08/12/2023', 'bandung', 'pangestu2612@gmail.com', '083892670299', '123', 'd3', 'KP. KARANGANYAR', '1a9f57a1da70af4c99f7beabd9e3fc89.pdf', 'cc52fcab40cf41c6b2f76d88e923802f.pdf', '836ac72079aa1a7ac2297585597498b6.pdf', 0, NULL, NULL, NULL, '2023-12-14 23:18:42'),
(7, 453565, 'testing', 'Perempuan', '08/12/2023', 'bandung', 'pangestu2612@gmail.com', '083892670299', '123', 'd3', 'KP. KARANGANYAR', '29f5f9905e3c8d3dea57b1464e9c5d43.pdf', '275b3d0ca7f87b5c65254bb478465195.pdf', '9c698b7a46e2a7216e7c28f9b792709b.pdf', 0, NULL, NULL, NULL, '2023-12-14 23:18:53'),
(8, 453565, 'testing', 'Perempuan', '08/12/2023', 'bandung', 'pangestu2612@gmail.com', '083892670299', '123', 'd3', 'KP. KARANGANYAR', 'faad4fa2f978ae3d9bdc367d64358ae3.pdf', '56ef062f787c53ac2bdc66d7fe492ab8.pdf', '59d80e697a1925b3bbfbd4092bf46b76.pdf', 0, NULL, NULL, NULL, '2023-12-14 23:19:03'),
(9, 453565, 'testing', 'Perempuan', '08/12/2023', 'bandung', 'pangestu2612@gmail.com', '083892670299', '123', 'd3', 'KP. KARANGANYAR', '615f65c055371c4cf7ced64066ff37f0.pdf', '95240dd2d5730517092cfe7df0021cbc.pdf', '295e81271012d101bee822bce83f312d.pdf', 0, NULL, NULL, NULL, '2023-12-14 23:21:03'),
(10, 453565, 'testing', 'Perempuan', '08/12/2023', 'bandung', 'pangestu2612@gmail.com', '083892670299', '123', 'd3', 'KP. KARANGANYAR', '58381af7a8ed5834df49b836aed52ad2.pdf', 'aea6816e93e7627d84eade07aa8d9a75.pdf', 'b790623d19d1f665ae4d5e54b8ac2579.pdf', 0, NULL, NULL, NULL, '2023-12-14 23:23:38'),
(11, 453565, 'testing', 'Perempuan', '08/12/2023', 'bandung', 'pangestu2612@gmail.com', '083892670299', '123', 'd3', 'KP. KARANGANYAR', '0e3c7af5cb0578475fb5a0cd8f10ec6d.pdf', 'b487deed2bce9dc87539f0c46a771d88.pdf', '01b56aa5d225f35529854a4c3c1d7102.pdf', 0, NULL, NULL, NULL, '2023-12-14 23:23:53'),
(12, 453565, 'testing', 'Perempuan', '08/12/2023', 'bandung', 'pangestu2612@gmail.com', '083892670299', '123', 'd3', 'KP. KARANGANYAR', '9e689083856b7967b4e839bc38c284d0.pdf', '8aed6badbf9eafcf75f8f03209910733.pdf', 'd900ca13d3e5be4e69f44650f435fd7c.pdf', 0, NULL, NULL, NULL, '2023-12-14 23:24:18');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_ktp`
--
ALTER TABLE `tbl_ktp`
  ADD PRIMARY KEY (`id_ktp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_ktp`
--
ALTER TABLE `tbl_ktp`
  MODIFY `id_ktp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
