-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2019 at 03:05 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `date_created` int(11) NOT NULL,
  `no_ktp` int(50) NOT NULL,
  `kelamin` enum('Laki-Laki','Perempuan','L','K') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` int(50) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `fname`, `date_created`, `no_ktp`, `kelamin`, `alamat`, `no_telp`, `image`) VALUES
(6, 'Nasrul', 1558615268, 2147483647, 'Laki-Laki', 'Jln. Kalimaya', 9876863, 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `angsuran1`
--

CREATE TABLE `angsuran1` (
  `id` int(11) NOT NULL,
  `nama_anggota` text NOT NULL,
  `no_kk` text NOT NULL,
  `no_ktp` text NOT NULL,
  `jumlah_pinjaman` text NOT NULL,
  `sisa_saldo_pinjaman` text NOT NULL,
  `jangka_waktu_pembayaran` text NOT NULL,
  `jangka_angsuran` text NOT NULL,
  `waktu_pembayaran` text NOT NULL,
  `total_angsuran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id` int(11) NOT NULL,
  `nama_anggota` text NOT NULL,
  `no_ktp` text NOT NULL,
  `no_kk` text NOT NULL,
  `no_telp` text NOT NULL,
  `alamat` text NOT NULL,
  `jumlah_pinjaman` text NOT NULL,
  `tanggal_pinjam` text NOT NULL,
  `status` enum('Lunas','Proses','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`id`, `nama_anggota`, `no_ktp`, `no_kk`, `no_telp`, `alamat`, `jumlah_pinjaman`, `tanggal_pinjam`, `status`) VALUES
(8, 'Muh Nasrul', '0987698535326', '80764538777', '09876863', 'jln.bangkok', '1500', '2019-06-10', 'Proses');

-- --------------------------------------------------------

--
-- Table structure for table `simpanan_anggota`
--

CREATE TABLE `simpanan_anggota` (
  `id` int(11) NOT NULL,
  `nama_anggota` text NOT NULL,
  `no_ktp` text NOT NULL,
  `no_kk` text NOT NULL,
  `no_telp` text NOT NULL,
  `simpanan_pokok` text NOT NULL,
  `alamat` text NOT NULL,
  `status` enum('Anggota','Calon Anggota') NOT NULL,
  `date_created` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simpanan_anggota`
--

INSERT INTO `simpanan_anggota` (`id`, `nama_anggota`, `no_ktp`, `no_kk`, `no_telp`, `simpanan_pokok`, `alamat`, `status`, `date_created`) VALUES
(8, 'Muh Nasrul', '0987698535326', '80764538777', '09876863', '4000', 'Jln. Kalimaya', 'Calon Anggota', '23 april 2015');

-- --------------------------------------------------------

--
-- Table structure for table `simpanan_sukarela`
--

CREATE TABLE `simpanan_sukarela` (
  `id` int(11) NOT NULL,
  `nama_anggota` text NOT NULL,
  `no_ktp` text NOT NULL,
  `no_kk` text NOT NULL,
  `no_telp` text NOT NULL,
  `simpanan_sukarela` text NOT NULL,
  `alamat` text NOT NULL,
  `date_created` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simpanan_sukarela`
--

INSERT INTO `simpanan_sukarela` (`id`, `nama_anggota`, `no_ktp`, `no_kk`, `no_telp`, `simpanan_sukarela`, `alamat`, `date_created`, `status`) VALUES
(15, 'Muh Nasrul S', '0987698535326', '80764538777', '09876863', '1000', 'jln.bangkok', '23 april 2015', '');

-- --------------------------------------------------------

--
-- Table structure for table `simpanan_wajib`
--

CREATE TABLE `simpanan_wajib` (
  `id` int(11) NOT NULL,
  `nama_anggota` text NOT NULL,
  `no_ktp` text NOT NULL,
  `no_kk` text NOT NULL,
  `no_telp` text NOT NULL,
  `simpanan_wajib` int(9) NOT NULL,
  `alamat` text NOT NULL,
  `date_created` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simpanan_wajib`
--

INSERT INTO `simpanan_wajib` (`id`, `nama_anggota`, `no_ktp`, `no_kk`, `no_telp`, `simpanan_wajib`, `alamat`, `date_created`, `status`) VALUES
(33, 'Muh Nasrul', '0987698535326', '80764538777', '09876863', 4000, 'Jln. Kalimaya', '23 april 2015', 'Anggota');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `kelamin` enum('laki-laki','perempuan','L','P','Laki-Laki','Perempuan','l','p') NOT NULL,
  `email` text NOT NULL,
  `image` text NOT NULL,
  `password` text NOT NULL,
  `date_created` int(11) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `kelamin`, `email`, `image`, `password`, `date_created`, `alamat`) VALUES
(52, 'Muhammad Nasrul S', 'laki-laki', 'nasrulmuhammad676@gmail.com', 'default1.jpg', '$2y$10$ou863AgiFPiU./xcEYiXzOZqysPIKlswyZJF23WySuI2M36RHCtyq', 1558615168, 'Jln. Kalimaya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `angsuran1`
--
ALTER TABLE `angsuran1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `simpanan_anggota`
--
ALTER TABLE `simpanan_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `simpanan_sukarela`
--
ALTER TABLE `simpanan_sukarela`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `simpanan_wajib`
--
ALTER TABLE `simpanan_wajib`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `angsuran1`
--
ALTER TABLE `angsuran1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `simpanan_anggota`
--
ALTER TABLE `simpanan_anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `simpanan_sukarela`
--
ALTER TABLE `simpanan_sukarela`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `simpanan_wajib`
--
ALTER TABLE `simpanan_wajib`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
