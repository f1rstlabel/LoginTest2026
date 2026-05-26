-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2026 at 04:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabelsiswa`
--

CREATE TABLE `tabelsiswa` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `TTL` varchar(50) NOT NULL,
  `Umur` int(50) NOT NULL,
  `Jenkel` varchar(50) NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `Kelas` varchar(50) NOT NULL,
  `Hobi` varchar(50) NOT NULL,
  `Catatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabelsiswa`
--

INSERT INTO `tabelsiswa` (`id`, `username`, `password`, `Nama`, `TTL`, `Umur`, `Jenkel`, `Alamat`, `Kelas`, `Hobi`, `Catatan`) VALUES
(13, '', '', 'Regy Kurnia Saputra', '24 september 2003', 21, 'selected disabled', 'Bandung', 'pemrograman-1', 'Bermain Bola', 'sayang tataaa selamanya'),
(14, '', '', 'Ita Rosita', '24 maret 2003', 22, 'perempuan', 'cimahi selatan', 'pemrograman-1', 'membaca', 'sayang egii selamanya'),
(18, '', '', 'Arsyila', '11 januari', 22, 'perempuan', 'jlnnn', 'pemrograman-3', '', ''),
(35, 'admin', '011117', '', '', 0, '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabelsiswa`
--
ALTER TABLE `tabelsiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabelsiswa`
--
ALTER TABLE `tabelsiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
