-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2020 at 10:59 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipelad`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nm_admin` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `pass` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nm_admin`, `username`, `pass`) VALUES
(1, 'Admin 1', 'admin1', '$2y$10$msz7UKpU2TLL1NKIPVC.WulRlaIVRvYOQkNXBWk2EB0mR7X2/E5qO');

-- --------------------------------------------------------

--
-- Table structure for table `apoteker`
--

CREATE TABLE `apoteker` (
  `id_apoteker` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `pass` varchar(128) DEFAULT NULL,
  `nm_apoteker` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apoteker`
--

INSERT INTO `apoteker` (`id_apoteker`, `username`, `pass`, `nm_apoteker`, `alamat`) VALUES
(2, 'apoteker2', '$2y$10$DpqoWN08fbJOOL3uGTei8O3MhjfYE/SPvO6HupYs3P4SL6mAdXCNO', 'Apoteker 2', 'Karawang'),
(3, 'apoteker3', NULL, 'Apoteker 3', 'Karawang'),
(5, 'apoteker4', '$2y$10$VtGpPIoOWkddquw6uaK3a.md62bR98qoeuFOYviQEp.ZyBiJKI.Ba', 'Apoteker 4', 'Karawang');

-- --------------------------------------------------------

--
-- Table structure for table `detail_rawat_jalan`
--

CREATE TABLE `detail_rawat_jalan` (
  `id_detail` int(11) NOT NULL,
  `id_rawat` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_rawat_jalan`
--

INSERT INTO `detail_rawat_jalan` (`id_detail`, `id_rawat`, `id_obat`, `harga`, `jumlah`, `total_harga`) VALUES
(14, 23, 1, 1000, 1, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `pass` varchar(128) DEFAULT NULL,
  `nm_dokter` varchar(50) DEFAULT NULL,
  `tlp_dokter` varchar(16) DEFAULT NULL,
  `spesialis` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `username`, `pass`, `nm_dokter`, `tlp_dokter`, `spesialis`, `alamat`) VALUES
(1, 'dokter1', '$2y$10$msz7UKpU2TLL1NKIPVC.WulRlaIVRvYOQkNXBWk2EB0mR7X2/E5qO', 'Dokter 1', '0856123456', 'Jantung', 'Karawang'),
(2, 'dokter2', '$2y$10$G8gJM5jImSv2MP.qtmbRn.juF87cjQ6ylpRI4/KlYWDAXWdb8CrwS', 'Dokter 2', '085812345678', 'Hati', 'Karawang'),
(3, 'sdfdsfdsf', '$2y$10$gsW66BHig/Yu.NmziS8juOrw4qDKUveEzkOPfamPMszJY0wTuLw3K', 'Dokter 3', '085812345678', 'dsfdsf', 'Karawang'),
(4, 'dokter4', '$2y$10$u9tcwNy41n69cYakzqIHbu.JjPAxb3dEogw7/nFGDqF3NCjFxbbGa', 'Dokter 4', '085812345678', 'dsfdsf', 'Karawang');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nm_obat` varchar(50) DEFAULT NULL,
  `kategori` varchar(20) DEFAULT NULL,
  `no_rak` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nm_obat`, `kategori`, `no_rak`, `harga`, `jumlah`) VALUES
(1, 'Bodrex', 'Sakit Kepala', 1, 1000, 10),
(3, 'Oskadon', 'Sakit Kepala', 12, 3000, 15),
(5, 'Kalpanax', 'Obat Kulit', 1, 5000, 20);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nm_pasien` varchar(50) DEFAULT NULL,
  `nm_keluarga` varchar(50) DEFAULT NULL,
  `jenis_kelamin` char(1) DEFAULT NULL COMMENT 'l = Laki-laki\r\np = Perempuan',
  `umur` int(11) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nm_pasien`, `nm_keluarga`, `jenis_kelamin`, `umur`, `alamat`) VALUES
(2, 'Pasien 2', 'Pasien 2', 'p', 27, 'Bekasi'),
(3, 'Pasien 3', 'Pasien 3', 'l', 40, 'Karawang'),
(5, 'Jeni', 'Jeni', 'p', 32, 'Bandung'),
(11, 'Bobi', 'Jamal', 'l', 26, 'Karawang'),
(12, 'sdsd', 'sddd3', 'l', 33, 'as'),
(13, 'sasasa', 'assasasa', 'p', 2, 's'),
(14, 'Ju', 'sdasd', 'l', 1, 's'),
(15, 'asdsadasd', 'sadsad', 'l', 4, 'sd'),
(16, 'Baruu', 'sdnnsf', 'l', 4, 'sddd'),
(17, 'ss', 'sss', 'l', 3, 's'),
(18, 'ohu', 'sss', 'l', 33, 's'),
(19, 'hhgh', 'jjbjj', 'l', 6, 'g'),
(20, 'coba modal', 'hh', 'l', 66, 'j'),
(21, 'Budi', 'Bambang Hermawan', 'l', 34, 'Karawang');

-- --------------------------------------------------------

--
-- Table structure for table `rawat_jalan`
--

CREATE TABLE `rawat_jalan` (
  `id_rawat_jalan` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_apoteker` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rawat_jalan`
--

INSERT INTO `rawat_jalan` (`id_rawat_jalan`, `id_pasien`, `id_apoteker`, `tanggal`, `total`) VALUES
(23, 2, 2, '2020-05-06', 1000),
(24, 2, 2, '2020-05-06', 1000),
(25, 2, 2, '2020-05-07', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `id_rekam_medis` int(11) NOT NULL,
  `id_dokter` int(11) DEFAULT NULL,
  `id_pasien` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `diagnosa` text DEFAULT NULL,
  `resep_obat` text DEFAULT NULL,
  `kesimpulan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`id_rekam_medis`, `id_dokter`, `id_pasien`, `tanggal`, `diagnosa`, `resep_obat`, `kesimpulan`) VALUES
(1, 1, 2, '2020-05-01', 'Sakit Kepala', 'Bodrex', 'Anda '),
(3, 1, 3, '2020-05-01', 'Sakit Pinggang', 'Hemaviton', 'Banyakin rebahan'),
(4, 1, 5, '2020-05-01', 'Sakit Hati', 'Bodrex Hemnarl', 'Iya gitu aja'),
(5, 1, 20, '2020-05-04', 'iii', 'jjj', 'j'),
(6, 1, 21, '2020-05-07', 'Sakit Kepala', 'Bodrex', 'Istirahat yang cukup'),
(7, 1, 21, '2020-05-07', 'Sakit Kepala', 'Bodrex', 'Istirahat yang cukup');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `apoteker`
--
ALTER TABLE `apoteker`
  ADD PRIMARY KEY (`id_apoteker`);

--
-- Indexes for table `detail_rawat_jalan`
--
ALTER TABLE `detail_rawat_jalan`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `rawat_jalan`
--
ALTER TABLE `rawat_jalan`
  ADD PRIMARY KEY (`id_rawat_jalan`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id_rekam_medis`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `apoteker`
--
ALTER TABLE `apoteker`
  MODIFY `id_apoteker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `detail_rawat_jalan`
--
ALTER TABLE `detail_rawat_jalan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `rawat_jalan`
--
ALTER TABLE `rawat_jalan`
  MODIFY `id_rawat_jalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `id_rekam_medis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD CONSTRAINT `rekam_medis_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`),
  ADD CONSTRAINT `rekam_medis_ibfk_2` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
