-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2021 at 04:35 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengadaan2021`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `email_admin` varchar(100) NOT NULL,
  `alamat_admin` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `token` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama_admin`, `email_admin`, `alamat_admin`, `password`, `status`, `token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', 'Karawang', 'eyJpdiI6IjA3Wm1JdGlsT1BoYlZvWjNHS2xaNGc9PSIsInZhbHVlIjoibUI5NFhvNlJhZWV0UGcrUGQ0eTFsUT09IiwibWFjIjoiYTgyZThkNWEyMTQzMjhmNmEzMDAwNjI1YjYxZmVmNDkyZmIzNDY3N2U4NDQyMjEwN2Q1NDE5M2YwNGFiY2VkNSJ9', 1, 'keluar', '2021-08-01 20:42:08', '2021-08-18 20:40:32'),
(2, 'Fajar', 'fajar.d.pamungkas@karawangkab.go.id', 'Karawang', 'eyJpdiI6ImJqaTFKaCswV041OHlUMmR5bUFEd3c9PSIsInZhbHVlIjoiWmUwcG5sTVlzdHFHWHJEM01nOExLK1FTTW0zS1hLcXd1Z1htQklqK1NNaE9vNlwvK05SVkVPRGF4YlU2Sm9uXC85IiwibWFjIjoiZmJjZjA3ZTRmN2M5YzUwZDVhZGI2NmYwZDY3OTA5ZjVhNmQwYjFkOTQzYTFmNzRkMTQ0ZGRjZDlkYWY0ZmY2NSJ9', 1, 'keluar', '2021-08-09 19:55:12', '2021-08-17 21:38:53'),
(7, 'Admin Coba', 'admincoba@admin.com', 'Karawang', 'eyJpdiI6IkxiN093VUllMm9VbU5QZXZYWVhMclE9PSIsInZhbHVlIjoicG4wT0U4WlBaWlRtZk0zdzExUVJkMlBJZHl6OWc4UEhKeU1wbG1pT2ZhVT0iLCJtYWMiOiI4M2U0MTAwMDdjZmQ3NmI0NTRlODZmOTc0NzEyODA5MDkyYzliYjM4NWU4ODk1MmM5NDAyMGMzMDdhODI4Y2I0In0=', 1, NULL, '2021-08-14 15:58:01', '2021-08-14 15:58:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_laporan`
--

CREATE TABLE `tbl_laporan` (
  `id_laporan` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `id_suplier` int(11) NOT NULL,
  `laporan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_laporan`
--

INSERT INTO `tbl_laporan` (`id_laporan`, `id_pengajuan`, `id_suplier`, `laporan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'public/laporan/ZwwUK13XFhCWAb8SQ19HVJ4LP5wV8UJbRjOaoI7K.pdf', '2021-08-15 14:52:39', '2021-08-15 14:52:39'),
(2, 3, 1, 'public/laporan/wmvHaf6J75pZFBMf0CKPWkTPFTGrwkbehhfKfd5I.pdf', '2021-08-15 18:51:24', '2021-08-15 18:51:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengadaan`
--

CREATE TABLE `tbl_pengadaan` (
  `id_pengadaan` int(11) NOT NULL,
  `nama_pengadaan` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL,
  `anggaran` double NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengadaan`
--

INSERT INTO `tbl_pengadaan` (`id_pengadaan`, `nama_pengadaan`, `deskripsi`, `gambar`, `anggaran`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Meja Kayu', 'https://balittanah.litbang.pertanian.go.id/ind/dokumentasi/lainnya/apbn2012/rktm/Proposal%20Pengadaan%20Peralatan%20%26%20Fasilitas%20Perkantoran.pdf', 'public/gambar/u7Nmk42dEgrN8wUWzUjRTY2LQxKB4kKzkAq0M0LE.jpg', 1000000, 1, '2021-08-14 15:47:20', '2021-08-14 19:52:02'),
(2, 'Lemari', 'http://balittanah.litbang.pertanian.go.id/ind/dokumentasi/lainnya/apbn2012/rktm/Proposal%20Pengadaan%20Peralatan%20&%20Fasilitas%20Perkantoran.pdf', 'public/gambar/XB1KHVAUFZqKhd6y93nJC2mMHqKniXpveSIfuVXm.jpg', 9000000, 1, '2021-08-14 15:53:18', '2021-08-14 15:53:18'),
(3, 'Rak', 'http://balittanah.litbang.pertanian.go.id/ind/dokumentasi/lainnya/apbn2012/rktm/Proposal%20Pengadaan%20Peralatan%20&%20Fasilitas%20Perkantoran.pdf', 'public/gambar/ywksfazM28Vl3IKShK6922Cy9rbgPiH7mloLMVSd.png', 5000000, 1, '2021-08-14 15:56:24', '2021-08-14 19:42:13'),
(6, 'Rak Server', 'http://balittanah.litbang.pertanian.go.id/ind/dokumentasi/lainnya/apbn2012/rktm/Proposal%20Pengadaan%20Peralatan%20&%20Fasilitas%20Perkantoran.pdf', 'public/gambar/76Hlzkjq1T3HjvpplLt98ibK3R4WSwoFLOjqV8Nb.jpg', 6500000, 1, '2021-08-14 17:03:43', '2021-08-14 19:42:58'),
(7, 'Router', 'http://balittanah.litbang.pertanian.go.id/ind/dokumentasi/lainnya/apbn2012/rktm/Proposal%20Pengadaan%20Peralatan%20&%20Fasilitas%20Perkantoran.pdf', 'public/gambar/68rUHIq0lJ5Fr440U5i91cO0XCi3dAPVkB8p62Eo.jpg', 2500000, 1, '2021-08-14 17:38:02', '2021-08-14 17:38:02'),
(8, 'Switch 8 port', 'http://balittanah.litbang.pertanian.go.id/ind/dokumentasi/lainnya/apbn2012/rktm/Proposal%20Pengadaan%20Peralatan%20&%20Fasilitas%20Perkantoran.pdf', 'public/gambar/YcWiwEOaEu6kNbxTlX88cbnLdPPkbzMDAxrZwhR6.jpg', 2500000, 1, '2021-08-14 19:56:36', '2021-08-14 20:06:47'),
(9, 'Access Point Outdoor', 'http://balittanah.litbang.pertanian.go.id/ind/dokumentasi/lainnya/apbn2012/rktm/Proposal%20Pengadaan%20Peralatan%20&%20Fasilitas%20Perkantoran.pdf', 'public/gambar/Q38fy1A3Ql5OiAWGgZQ3iPwtyAWI7Tij2n4CAghR.jpg', 2500000, 1, '2021-08-14 20:07:20', '2021-08-14 20:07:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan`
--

CREATE TABLE `tbl_pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_suplier` int(11) NOT NULL,
  `id_pengadaan` int(11) NOT NULL,
  `anggaran` double NOT NULL,
  `proposal` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengajuan`
--

INSERT INTO `tbl_pengajuan` (`id_pengajuan`, `id_suplier`, `id_pengadaan`, `anggaran`, `proposal`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1000000, 'public/proposal/hqoWopdvd3N5aYC4i8EP4arObAEJMZgIGKcMWaqW.pdf', 3, '2021-08-15 07:08:00', '2021-08-15 15:37:27'),
(2, 3, 6, 6500000, 'public/proposal/DUCNpF125J4ze0lW42Avq3FKjnFduQsz1VHlZF7P.pdf', 0, '2021-08-15 08:45:56', '2021-08-15 19:12:04'),
(3, 1, 7, 2500000, 'public/proposal/E12LWduF6zp3Zq3QLjRslxNUaS8tf8mm9AOiefvJ.pdf', 0, '2021-08-15 09:25:25', '2021-08-15 19:19:06'),
(4, 1, 3, 5000000, 'public/proposal/KTnES36mDIlJxIyhuZkfilQpJnot3myi1UGEekjE.pdf', 2, '2021-08-15 19:11:28', '2021-08-15 19:13:23'),
(5, 1, 8, 2500000, 'public/proposal/y7fv9Pld1Fq67JCHrfzDs7C9wcj8y07s1fj6PZF0.pdf', 0, '2021-08-15 19:37:03', '2021-08-15 19:37:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suplier`
--

CREATE TABLE `tbl_suplier` (
  `id_suplier` int(11) NOT NULL,
  `nama_usaha` varchar(100) NOT NULL,
  `email_usaha` varchar(100) NOT NULL,
  `alamat_usaha` text NOT NULL,
  `npwp_usaha` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `token` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_suplier`
--

INSERT INTO `tbl_suplier` (`id_suplier`, `nama_usaha`, `email_usaha`, `alamat_usaha`, `npwp_usaha`, `password`, `status`, `token`, `created_at`, `updated_at`) VALUES
(1, 'PT. AKU DAN DIA', 'akudandia@bahagia.com', 'Jl. Kemana Aja', '123456789', 'eyJpdiI6InltVkFTa2t5SUFnTEN2R3QxTUt5QVE9PSIsInZhbHVlIjoiZXZpbjFHMnBtc09wa0Iya1I3Nm9jQT09IiwibWFjIjoiMWY1OWE1MDIxNDFhMmM5YTc4NmJlMDlkNzM3MWM5OGVjMWJiNDFkMzA5NGZhMjQ5YjMzNjk0Y2U4MGUxNzdlOSJ9', 1, 'keluar', '2021-07-27 20:51:15', '2021-08-18 20:41:11'),
(2, 'PT. COBA LAGI', 'cobalagi@gmail.com', 'Jl. Coba Terus', '123456788', 'eyJpdiI6IlZpK25wb2xtXC90SU9xbmhVYmNmVFVRPT0iLCJ2YWx1ZSI6IloxZmhCSjhuRjJCaEVvSkZBOFhmNWc9PSIsIm1hYyI6ImMyNzMzOWNiMmE1ZjMyYWVkMzZiZDhmNGVkMDc4NjYxNDFhMDhkMDhlOWQ2NTViMzNlYTNjMmJjZjFlMDExNWIifQ==', 1, 'keluar', '2021-07-27 21:01:39', '2021-08-17 21:08:31'),
(3, 'PT. GAGAL MANING', 'gagalmaning@masalahloe.com', 'Jl. Ribut Mulu no. 300', '456456789', 'eyJpdiI6InpiZk9wTFU5N2tHXC9BXC9lMHNxYmM3QT09IiwidmFsdWUiOiI3cjhid0FBM0h1K0ZsaFJ5RHp4RU93PT0iLCJtYWMiOiJkMDk3YzA3NjNiOTU5MjRjOTY4MmM5ZGY1M2YyY2Q3NDdjYTM2NWIyNWIxNGZiNmMzOTM1NzJkMDM1NTVmNzQ5In0=', 1, 'keluar', '2021-08-01 19:28:54', '2021-08-17 21:08:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `tbl_pengadaan`
--
ALTER TABLE `tbl_pengadaan`
  ADD PRIMARY KEY (`id_pengadaan`);

--
-- Indexes for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pengadaan`
--
ALTER TABLE `tbl_pengadaan`
  MODIFY `id_pengadaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
