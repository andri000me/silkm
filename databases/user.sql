-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2021 at 09:15 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `praktik industri`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nim` varchar(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `program` varchar(100) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `angkatan` int(4) NOT NULL,
  `perusahaan` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nim`, `nama`, `email`, `program`, `prodi`, `angkatan`, `perusahaan`, `password`) VALUES
(9, '18051204034', 'Rois', 'roisyaris303@gmail.com', 'praktik industri', 'sistem informasi', 2019, 'Jurusan Teknik Informatika', '$2y$10$b4I.T0Y9me7C044T0PG0m.On5NVPxewCakVzxSJ9XY2c86js3Qkau'),
(10, '18051214044', 'Aziz Mahardika', 'aziz@gmail.com', 'praktik industri', 'sistem informasi', 0, '', '$2y$10$rxUGVEA5SWNae6pJ2TfYX..bT2uIU2K.W6jPi/HVY5K9OsSLxLx5K'),
(12, '18051214076', 'Alfando Vifan', 'fando@gmail.com', 'praktik industri', 'sistem informasi', 2018, 'Jurusan Teknik Informatika', '$2y$10$2zp9BgDqNsjsRDr1xirCI.bilaaaiWyrk71/TJLn17hp6dyoElZJu'),
(13, '123', 'Rois', 'roisyaris303@gmail.com', 'praktik industri', 'sistem informasi', 2018, 'Jurusan Teknik Informatika', '$2y$10$oi6typCFLPcPaBd2CqmrKen8vxBMsrn3BK1jWa273Ecjy16QIi2ei');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
