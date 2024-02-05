-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2024 at 03:59 PM
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
-- Database: `masterkomputer`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `name`, `price`, `image`, `quantity`) VALUES
(32, 16, 'ASRock B760M Pro RS', '3000000.00', '../assets/images/2.png', 3),
(33, 16, 'NVIDIA GeForce RTX 4090', '30000000.00', '../assets/images/1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(80) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(16) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_user`, `nama`, `no_telp`, `alamat`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin', 'admin'),
(2, 'user', '0895333111273', 'jl.gassaelah nomor 30', 'user', 'user', 'user'),
(17, 'Suryo', '0895333181279', 'Jl.Madrasah', 'suryo', 'gass', 'user'),
(18, 'Alif', '02154848777', 'Jl.gassparah', 'alif', 'gass', 'user'),
(19, 'Rakel', '025487756884', 'Jl.KemayoranGass', 'rakel', 'gass', 'user'),
(20, 'Nugroho', '0980', 'sdasd', 'nugroho', 'user', 'user'),
(21, 'owner', 'owner', 'owner', 'owner', 'owner', 'owner'),
(24, 'admincoba', '20202020', 'sdasdasdssss', 'admin2', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `payment_date` datetime DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `id_user`, `payment_date`, `amount`, `created_at`, `updated_at`) VALUES
(41, 17, '2023-07-01 00:00:00', '32800000.00', '2023-07-01 13:57:32', '2023-07-01 13:57:32'),
(42, 18, '2023-07-01 00:00:00', '11850000.00', '2023-07-01 14:00:01', '2023-07-01 14:00:01'),
(43, 19, '2023-07-01 00:00:00', '11850000.00', '2023-07-01 14:01:00', '2023-07-01 14:01:00'),
(44, 2, '2023-07-01 00:00:00', '42550000.00', '2023-07-01 14:02:04', '2023-07-01 14:02:04'),
(45, 2, '2023-07-01 00:00:00', '30000000.00', '2023-07-01 14:09:55', '2023-07-01 14:09:55'),
(46, 2, '2023-07-01 00:00:00', '3000000.00', '2023-07-01 14:10:40', '2023-07-01 14:10:40'),
(47, 17, '2023-07-01 16:41:24', '3000000.00', '2023-07-01 14:41:24', '2023-07-01 14:41:24'),
(48, 17, '2023-07-01 21:43:57', '8000000.00', '2023-07-01 14:43:57', '2023-07-01 14:43:57'),
(49, 20, '2023-07-07 13:54:48', '30000000.00', '2023-07-07 06:54:48', '2023-07-07 06:54:48'),
(50, 20, '2023-07-07 13:56:31', '60700000.00', '2023-07-07 06:56:31', '2023-07-07 06:56:31'),
(51, 2, '2024-02-05 20:19:02', '60000000.00', '2024-02-05 13:19:02', '2024-02-05 13:19:02');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `stok` int(10) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
