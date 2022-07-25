-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2022 at 03:36 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sate_mafazapwt`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_halaman_utama`
--

CREATE TABLE `tb_halaman_utama` (
  `id_halaman_utama` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_halaman_utama`
--

INSERT INTO `tb_halaman_utama` (`id_halaman_utama`, `judul`, `foto`) VALUES
(1, 'SATE MAFAZA Sedia Sate Ayam & Sate Kambing', '1658449616_hero.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu_utama`
--

CREATE TABLE `tb_menu_utama` (
  `id_menu_utama` int(11) NOT NULL,
  `foto` text DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_menu_utama`
--

INSERT INTO `tb_menu_utama` (`id_menu_utama`, `foto`, `judul`, `deskripsi`) VALUES
(12, '1657764640_Menu1.webp', 'Sate Ayam', 'Monggo bisa pilih menu buat sarapan atau makan siang nanti. Tersedia pilihan menu olahan ayam dan kambing'),
(13, '1657764664_Menu2.webp', 'Gulai Kambing', 'Siang-siang hujan gini enaknya ya makan yang berkuah sih, gulai kambing bisa jadi salah satu pilihan menunya nih guys. Yuk mampir'),
(14, '1657764689_Menu3.webp', 'Tongseng Ayam', 'Rasanya gurih, pedas, seger. Cocok banget buat menu makan siang nanti');

-- --------------------------------------------------------

--
-- Table structure for table `tb_soft_opening`
--

CREATE TABLE `tb_soft_opening` (
  `id_soft_opening` int(11) NOT NULL,
  `foto` text DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_soft_opening`
--

INSERT INTO `tb_soft_opening` (`id_soft_opening`, `foto`, `judul`, `deskripsi`) VALUES
(5, '1657764732_Soft Opening 1.webp', 'Soft Opening', 'Akhirnya yang ditunggu buka juga yeay InsyaAllah mulai hari ini kita mulai buka operasional yaa'),
(6, '1657764749_Soft Opening 2.webp', 'Soft Opening', 'Akhirnya yang ditunggu buka juga yeay InsyaAllah mulai hari ini kita mulai buka operasional yaa'),
(7, '1657764765_Soft Opening 3.webp', 'Soft Opening', 'Akhirnya yang ditunggu buka juga yeay InsyaAllah mulai hari ini kita mulai buka operasional yaa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_testimonial`
--

CREATE TABLE `tb_testimonial` (
  `id_testimonial` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `testimonial` text NOT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_testimonial`
--

INSERT INTO `tb_testimonial` (`id_testimonial`, `nama`, `testimonial`, `foto`) VALUES
(1, 'Abdul Hafiz Ramadan', 'Makanannya enak dan mantap', 'Testi 1.webp'),
(2, 'Ilham Imaman', 'Murah banget!', 'Testi 2.webp'),
(3, 'Muhammad Fadli Hidayatullah', 'Wah enak!', 'Testi 3.webp'),
(4, 'Azka Amarul Ihsan', 'Wow sedap dan sehat!', 'Testi 1.webp');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama`, `photo`) VALUES
(1, 'admin', 'b93d83634de0b8143a418f91495b4fdb', 'Admin Ganteng', '-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_halaman_utama`
--
ALTER TABLE `tb_halaman_utama`
  ADD PRIMARY KEY (`id_halaman_utama`);

--
-- Indexes for table `tb_menu_utama`
--
ALTER TABLE `tb_menu_utama`
  ADD PRIMARY KEY (`id_menu_utama`);

--
-- Indexes for table `tb_soft_opening`
--
ALTER TABLE `tb_soft_opening`
  ADD PRIMARY KEY (`id_soft_opening`);

--
-- Indexes for table `tb_testimonial`
--
ALTER TABLE `tb_testimonial`
  ADD PRIMARY KEY (`id_testimonial`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_halaman_utama`
--
ALTER TABLE `tb_halaman_utama`
  MODIFY `id_halaman_utama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_menu_utama`
--
ALTER TABLE `tb_menu_utama`
  MODIFY `id_menu_utama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_soft_opening`
--
ALTER TABLE `tb_soft_opening`
  MODIFY `id_soft_opening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_testimonial`
--
ALTER TABLE `tb_testimonial`
  MODIFY `id_testimonial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
