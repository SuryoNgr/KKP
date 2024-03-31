-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2024 at 05:06 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_ahp`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id`, `nama`) VALUES
(23, 'Basic Room'),
(24, 'Daily Room'),
(25, 'Panoramic Room'),
(26, 'Exclusive Room'),
(27, 'Honey Room');

-- --------------------------------------------------------

--
-- Table structure for table `ir`
--

CREATE TABLE `ir` (
  `jumlah` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ir`
--

INSERT INTO `ir` (`jumlah`, `nilai`) VALUES
(1, 0),
(2, 0),
(3, 0.58),
(4, 0.9),
(5, 1.12),
(6, 1.24),
(7, 1.32),
(8, 1.41),
(9, 1.45),
(10, 1.49),
(11, 1.51),
(12, 1.48),
(13, 1.56),
(14, 1.57),
(15, 1.59);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`) VALUES
(35, 'Fasilitas'),
(36, 'Pemandangan'),
(37, 'Harga'),
(38, 'Luas Ruangan'),
(39, 'Ulasan');

-- --------------------------------------------------------

--
-- Table structure for table `perbandingan_alternatif`
--

CREATE TABLE `perbandingan_alternatif` (
  `id` int(11) NOT NULL,
  `alternatif1` int(11) NOT NULL,
  `alternatif2` int(11) NOT NULL,
  `pembanding` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `perbandingan_alternatif`
--

INSERT INTO `perbandingan_alternatif` (`id`, `alternatif1`, `alternatif2`, `pembanding`, `nilai`) VALUES
(51, 23, 26, 35, 0.341),
(50, 23, 25, 35, 0.447),
(49, 23, 24, 35, 0.714),
(54, 24, 26, 35, 0.471),
(53, 24, 25, 35, 0.625),
(52, 23, 27, 35, 0.692),
(57, 25, 27, 35, 0.871),
(56, 25, 26, 35, 0.781),
(55, 24, 27, 35, 0.725),
(58, 26, 27, 35, 0.667),
(59, 23, 24, 36, 0.625),
(60, 23, 25, 36, 0.341),
(61, 23, 26, 36, 0.258),
(62, 23, 27, 36, 0.595),
(63, 24, 25, 36, 0.441),
(64, 24, 26, 36, 0.331),
(65, 24, 27, 36, 0.562),
(66, 25, 26, 36, 0.749),
(67, 25, 27, 36, 0.882),
(68, 26, 27, 36, 0.543),
(69, 23, 24, 37, 2.52),
(70, 23, 25, 37, 0.693),
(71, 23, 26, 37, 0.624),
(72, 23, 27, 37, 1),
(73, 24, 25, 37, 1.278),
(74, 24, 26, 37, 0.693),
(75, 24, 27, 37, 1.323),
(76, 25, 26, 37, 1),
(77, 25, 27, 37, 1.021),
(78, 26, 27, 37, 0.424),
(79, 23, 24, 38, 0.375),
(80, 23, 25, 38, 0.189),
(81, 23, 26, 38, 0.131),
(82, 23, 27, 38, 0.345),
(83, 24, 25, 38, 0.282),
(84, 24, 26, 38, 0.191),
(85, 24, 27, 38, 0.323),
(86, 25, 26, 38, 1),
(87, 25, 27, 38, 0.693),
(88, 26, 27, 38, 1.278),
(89, 23, 24, 39, 0.8),
(90, 23, 25, 39, 0.5),
(91, 23, 26, 39, 0.4),
(92, 23, 27, 39, 0.75),
(93, 24, 25, 39, 0.667),
(94, 24, 26, 39, 0.444),
(95, 24, 27, 39, 0.714),
(96, 25, 26, 39, 0.8),
(97, 25, 27, 39, 0.875),
(98, 26, 27, 39, 0.571);

-- --------------------------------------------------------

--
-- Table structure for table `perbandingan_kriteria`
--

CREATE TABLE `perbandingan_kriteria` (
  `id` int(11) NOT NULL,
  `kriteria1` int(11) NOT NULL,
  `kriteria2` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `perbandingan_kriteria`
--

INSERT INTO `perbandingan_kriteria` (`id`, `kriteria1`, `kriteria2`, `nilai`) VALUES
(16, 35, 36, 3.175),
(17, 35, 37, 1.651),
(18, 35, 38, 2.289),
(19, 35, 39, 1),
(20, 36, 37, 0.437),
(21, 36, 38, 0.606),
(22, 36, 39, 0.493),
(23, 37, 38, 1),
(24, 37, 39, 0.679),
(25, 38, 39, 0.606);

-- --------------------------------------------------------

--
-- Table structure for table `pv_alternatif`
--

CREATE TABLE `pv_alternatif` (
  `id` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pv_alternatif`
--

INSERT INTO `pv_alternatif` (`id`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(67, 25, 35, 0.223229),
(66, 24, 35, 0.147868),
(70, 23, 36, 0.0940258),
(65, 23, 35, 0.114657),
(69, 27, 35, 0.247391),
(68, 26, 35, 0.266854),
(73, 26, 36, 0.280397),
(72, 25, 36, 0.237196),
(71, 24, 36, 0.11983),
(74, 27, 36, 0.268551),
(75, 23, 37, 0.206204),
(76, 24, 37, 0.176893),
(77, 25, 37, 0.195566),
(78, 26, 37, 0.196708),
(79, 27, 37, 0.224628),
(80, 23, 38, 0.0529793),
(81, 24, 38, 0.0869228),
(82, 25, 38, 0.261419),
(83, 26, 38, 0.343107),
(84, 27, 38, 0.255571),
(85, 23, 39, 0.126252),
(86, 24, 39, 0.145677),
(87, 25, 39, 0.217636),
(88, 26, 39, 0.256186),
(89, 27, 39, 0.254249);

-- --------------------------------------------------------

--
-- Table structure for table `pv_kriteria`
--

CREATE TABLE `pv_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pv_kriteria`
--

INSERT INTO `pv_kriteria` (`id_kriteria`, `nilai`) VALUES
(35, 0.304443),
(36, 0.0988149),
(37, 0.183674),
(38, 0.157169),
(39, 0.2559);

-- --------------------------------------------------------

--
-- Table structure for table `ranking`
--

CREATE TABLE `ranking` (
  `id_alternatif` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ranking`
--

INSERT INTO `ranking` (`id_alternatif`, `nilai`) VALUES
(25, 0.224099),
(24, 0.140289),
(23, 0.122707),
(26, 0.264563),
(27, 0.248342);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ir`
--
ALTER TABLE `ir`
  ADD PRIMARY KEY (`jumlah`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perbandingan_alternatif`
--
ALTER TABLE `perbandingan_alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perbandingan_kriteria`
--
ALTER TABLE `perbandingan_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pv_alternatif`
--
ALTER TABLE `pv_alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pv_kriteria`
--
ALTER TABLE `pv_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `perbandingan_alternatif`
--
ALTER TABLE `perbandingan_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `perbandingan_kriteria`
--
ALTER TABLE `perbandingan_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pv_alternatif`
--
ALTER TABLE `pv_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
