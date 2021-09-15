-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2021 at 09:16 AM
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
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `pukul` time(6) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `sub` varchar(1000) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `tanggal`, `pukul`, `judul`, `sub`, `gambar`) VALUES
(27, '2021-08-30', '20:28:00.000000', 'Belajar', 'Isi dalam teks deskripsi menggambarkan objek secara konkret. Tujuan teks deskripsi ialah menggambarkan objek dengan memerinci secara subjektif atau melukiskan kondisi objek dari sudut pandang penulis.  Penulis harus menggambarkan objek sekonkret mungkin sehingga pembaca seakan-akan melihat, mendengar hingga merasakan.  Adapun objek yang dibicarakan pada teks deskripsi lebih bersifat khusus. Kemudian objek yang dideskripsikan bersifat pendapat personal.  Itulah gambaran atau pengertian teks deskripsi secara umum. Adapun untuk lebih detailnya, berikut ini ciri-ciri, tujuan, struktur hingga contoh teks deskripsi, seperti dirangkum dari Buku Siswa Bahasa Indonesia dan Portal-Ilmu, Rabu (29/7/2020).', '612cdd10dd09e.jpg'),
(28, '2021-08-24', '20:29:00.000000', 'Data', 'Isi dalam teks deskripsi menggambarkan objek secara konkret. Tujuan teks deskripsi ialah menggambarkan objek dengan memerinci secara subjektif atau melukiskan kondisi objek dari sudut pandang penulis.  Penulis harus menggambarkan objek sekonkret mungkin sehingga pembaca seakan-akan melihat, mendengar hingga merasakan.  Adapun objek yang dibicarakan pada teks deskripsi lebih bersifat khusus. Kemudian objek yang dideskripsikan bersifat pendapat personal.  Itulah gambaran atau pengertian teks deskripsi secara umum. Adapun untuk lebih detailnya, berikut ini ciri-ciri, tujuan, struktur hingga contoh teks deskripsi, seperti dirangkum dari Buku Siswa Bahasa Indonesia dan Portal-Ilmu, Rabu (29/7/2020).', '612cdd3742663.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
