-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2024 at 11:35 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bluehorizon`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_admin` int(10) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `notelp_admin` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_admin`, `nama_admin`, `notelp_admin`, `username`, `password`, `level`) VALUES
(1, 'owner', 'owner', 'owner', 'owner', 'owner'),
(2, 'budi', 'admin', 'admin1', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id_payment` int(10) NOT NULL,
  `notelp_pl` varchar(15) NOT NULL,
  `nama_pl` varchar(30) NOT NULL,
  `norek_pl` varchar(20) NOT NULL,
  `email_pl` varchar(50) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `jumlah_tamu` int(100) NOT NULL,
  `id_room` varchar(10) NOT NULL,
  `harga_total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id_payment`, `notelp_pl`, `nama_pl`, `norek_pl`, `email_pl`, `checkin`, `checkout`, `jumlah_tamu`, `id_room`, `harga_total`) VALUES
(36, '222', 'suryo', '2222222222', 'suryo.nugroohoo@gmail.com', '2024-03-05', '2024-03-08', 5, 'ER001', 6000000),
(37, '222', 'suryo', '2222222222', 'suryo.nugroohoo@gmail.com', '2024-03-05', '2024-03-08', 5, 'BR001', 1500000),
(38, '222', 'suryo', '2222222222', 'suryo.nugroohoo@gmail.com', '2024-03-05', '2024-03-08', 5, 'DR001', 3000000),
(39, '222', 'suryo', '2222222222', 'suryo.nugroohoo@gmail.com', '2024-03-05', '2024-03-08', 5, 'PR001', 4500000),
(40, '222', 'suryo', '2222222222', 'suryo.nugroohoo@gmail.com', '2024-03-05', '2024-03-08', 5, 'HR001', 7500000),
(41, '02220', 'sam', '333333', 'sam@hmail.com', '2024-03-05', '2024-03-06', 1, 'ER001', 2000000),
(42, '02220', 'sam', '333333', 'sam@hmail.com', '2024-03-05', '2024-03-06', 1, 'BR001', 500000),
(43, '02220', 'sam2', '3333333', 'sam@hmail.com', '2024-03-05', '2024-03-06', 1, 'BR002', 500000),
(44, '08959595', 'sarba', '111111111111', 'sarba@hassa.com', '2024-03-08', '2024-03-11', 1, 'ER001', 6000000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `norek_pl` varchar(20) NOT NULL,
  `nama_pl` varchar(30) NOT NULL,
  `harga_keseluruhan` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`norek_pl`, `nama_pl`, `harga_keseluruhan`) VALUES
('111111111111', 'sarba', 6000000),
('2222222222', 'suryo', 22500000),
('333333', 'sam', 2000000),
('3333333', 'sam2', 500000);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id_room` varchar(10) NOT NULL,
  `tipe_room` varchar(10) NOT NULL,
  `harga_room` int(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id_room`, `tipe_room`, `harga_room`, `status`) VALUES
('BR001', 'Basic', 500000, 'Available'),
('BR002', 'Basic', 500000, 'Available'),
('BR003', 'Basic', 500000, 'Available'),
('BR004', 'Basic', 500000, 'Available'),
('BR005', 'Basic', 500000, 'Available'),
('DR001', 'Daily', 1000000, 'Available'),
('DR002', 'Daily', 1000000, 'Available'),
('DR003', 'Daily', 1000000, 'Available'),
('DR004', 'Daily', 1000000, 'Available'),
('DR005', 'Daily', 1000000, 'Available'),
('ER001', 'Exclusive', 2000000, 'Booked'),
('ER002', 'Exclusive', 2000000, 'Available'),
('ER003', 'Exclusive', 2000000, 'Available'),
('ER004', 'Exclusive', 2000000, 'Available'),
('ER005', 'Exclusive', 2000000, 'Available'),
('HR001', 'Honey', 2500000, 'Available'),
('HR002', 'Honey', 2500000, 'Available'),
('HR003', 'Honey', 2500000, 'Available'),
('HR004', 'Honey', 2500000, 'Available'),
('HR005', 'Honey', 2500000, 'Available'),
('PR001', 'Panoramic', 1500000, 'Available'),
('PR002', 'Panoramic', 1500000, 'Available'),
('PR003', 'Panoramic', 1500000, 'Available'),
('PR004', 'Panoramic', 1500000, 'Available'),
('PR005', 'Panoramic', 1500000, 'Available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `id_room` (`id_room`),
  ADD KEY `norek_pl` (`norek_pl`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`norek_pl`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id_room`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`id_room`) REFERENCES `room` (`id_room`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
