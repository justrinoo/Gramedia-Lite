-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 14, 2021 at 03:58 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book-store`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id_checkout` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_buku` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` char(20) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `harga_buku` int(100) NOT NULL,
  `tipe_pembayaran` enum('Alfamart','Indomart') NOT NULL,
  `status_buku` enum('pending','reject','accept') NOT NULL,
  `tanggal_checkout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id_checkout`, `id_ongkir`, `nama`, `nama_buku`, `email`, `no_telp`, `alamat`, `harga_buku`, `tipe_pembayaran`, `status_buku`, `tanggal_checkout`) VALUES
(7, 2, 'Eren Yeager', 'Demon Slayer Kimetsu No Yaiba', 'eren@mail.com', '827367267', 'Jalan Shingashina', 50000, 'Alfamart', 'accept', '2021-04-14 21:04:00'),
(8, 2, 'Annie Leonhart', 'Jujutsu Kaisen', 'Annie@mail.com', '84882334', 'Jalan Shingasina no 20', 75000, 'Indomart', 'accept', '2021-04-14 23:04:12'),
(9, 2, 'Tanjiru', 'Demon Slayer Kimetsu No Yaiba', 'tanjiru@mail.com', '84882334', 'Jalan Trost', 400000, 'Indomart', 'reject', '2021-04-14 23:04:27'),
(10, 2, 'Levi', 'Demon Slayer: Kimetsu no Yaiba', 'levi@mail.com', '827367267', 'Tester', 120000, 'Indomart', 'accept', '2021-04-16 01:04:41'),
(11, 2, 'jonny miek', 'My Hero Academia', 'jonny@mail.com', '08372844872', 'Jalan jalan aja', 40000, 'Indomart', 'pending', '2021-04-17 00:04:27');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Jakarta', 25000),
(2, 'Bandung', 40000),
(3, 'Bali', 70000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `kategori_buku` varchar(100) NOT NULL,
  `diskon_buku` int(11) NOT NULL,
  `harga_buku` int(100) NOT NULL,
  `pembuat_buku` varchar(50) NOT NULL,
  `deskripsi_buku` varchar(500) NOT NULL,
  `rilis_buku` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `judul_buku`, `kategori_buku`, `diskon_buku`, `harga_buku`, `pembuat_buku`, `deskripsi_buku`, `rilis_buku`) VALUES
(2, 'Shingeki No Kyojin Chapt12 terbaru', 'romance', 80, 35000, 'Hajime Isayama', 'berlatar di dunia tempat umat manusia hidup di wilayah yang dikelilingi tiga lapis tembok besar, yang melindungi mereka dari makhluk pemakan manusia berukuran raksasa yang dikenal sebagai Titan. Manga ini dimuat berseri dalam majalah Bessatsu ShÅnen Magazine terbitan Kodansha sejak bulan September 2009 hingga April 2021, dan telah diterbitkan menjadi 34 volume tankÅbon per bulan Desember 2020. ', '2021-04-23 22:04:53'),
(3, 'Demon Slayer: Kimetsu no Yaiba', 'ghost', 80, 125000, 'Koyoharu GotÅge', 'seorang anak laki-laki yang menjadi pembasmi iblis setelah keluarganya dibunuh dan adik perempuannya yang bernama Nezuko diubah menjadi iblis', '2021-04-23 23:04:42'),
(4, 'Jujutsu Kaisen', 'ghost', 30, 100000, 'Gege Akutami', 'YÅ«ji Itadori adalah seorang siswa SMA dengan atletisitas yang tidak wajar yang tinggal di Sendai bersama kakeknya. Ia sering menghindari Klub Lari karena keengganannya pada bidang atletik, meskipun dia memiliki bakat bawaan untuk olahraga tersebut. Sebaliknya, dia memilih untuk bergabung dengan Klub Penelitian Ilmu Gaib', '2021-04-23 23:04:48'),
(5, 'Haikyu!! Fly High! Volleyball!', 'action', 30, 90000, 'Haruichi Furudate', 'Seorang siswa SMA bernama ShÅyÅ Hinata, menjadi terobsesi dengan bola voliâ€”setelah menyaksikan SMA Karasuno memenangkan pertandingan mereka untuk lolos ke Kejuaraan Nasionalâ€”di TV. Meskipun memiliki tubuh yang pendek, Hinata terinspirasi oleh seorang pemain yang dijuluki &quot;Raksasa Kecil&quot;, pemain spiker sayap Karasuno bertubuh pendek, tetapi berbakat. Meskipun tidak berpengalaman', '2021-04-23 23:04:49'),
(6, 'Shigatsu Wa Kimi no uso - Your Lie in April', 'romance', 30, 50000, 'KyÅhei Ishiguro', 'Kousei Arima adalah seorang anak yang berbakat dalam bermain piano dan selalu tampil mendominasi dalam berbagai kompetisi, sehingga menjadikannya terkenal di antara para musikus cilik. Setelah ibu sekaligus instrukturnya meninggal dunia, dia mengalami penurunan mental di tengah-tengah sebuah pertunjukan piano di usia 11 tahun', '2021-04-23 23:04:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `book_favorite` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Lelaki','Perempuan') NOT NULL,
  `role` enum('buyyer','seller') NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `book_favorite`, `jenis_kelamin`, `role`, `createdAt`) VALUES
(6, 'Mikasa Ackerman', 'mikasa@yahoo.com', '$2y$10$8wgdaFVV51pXWiBLpT7leeXyyPTPL3pWH1bEx/Burori7GZll6iy6', 'Attack on Eren', 'Perempuan', 'seller', '2021-04-09 23:04:14'),
(7, 'Armin Arlert', 'armin@mail.com', '$2y$10$9OSuxn1YKkulcpL0Kpts0O.0uFYEfiPDIww7TUW/WI4x.3FROxs76', 'Shingeki No Kyojin', 'Lelaki', 'buyyer', '2021-04-12 21:04:50'),
(8, 'Levi', 'levi@mail.com', '$2y$10$5mOeOlHnCl0.n7AuKNw16./C1.gFwD3tzH.vXBqWKUM1Tml7Ltor6', 'Shingeki No Kyojin', 'Lelaki', 'buyyer', '2021-04-12 21:04:59'),
(9, 'Eren Yeager', 'eren@mail.com', '$2y$10$99LmOV2Ect1GVvFyzJaW3eocHRgnACjvp9Ot0fDQwW6RUDm9oshxq', 'Shingeki No Kyojin', 'Lelaki', 'buyyer', '2021-04-14 21:04:18'),
(10, 'Annie Leonhart', 'Annie@mail.com', '$2y$10$QBVOnIim.gsMFLfDanBxWeAzCybLPo7tWqnqrCniJQTERM/9iPh9.', 'Shingeki No Kyojin', 'Lelaki', 'buyyer', '2021-04-14 23:04:51'),
(11, 'Tanjiru', 'tanjiru@mail.com', '$2y$10$ZAl5YM3pmy9/uNZfnhKuMur.siX5xHs1onT9BjdD6VY3oF3VOCrhO', 'Shingeki No Kyojin', 'Lelaki', 'buyyer', '2021-04-14 23:04:02'),
(12, 'Nezuko', 'nezuko@mail.com', '$2y$10$2Guv9pjqD4vc1WOwsh2md.anWQ6Z8cVubRxTkwlnr8Ou73/XfMasy', 'Demon Slayer: Kimetsu No Yaiba', 'Perempuan', 'buyyer', '2021-04-15 23:04:18'),
(13, 'jonny miek', 'jonny@mail.com', '$2y$10$MZ9gipgG2YACyBlByEPy6.ved1xRf5YjGGoSP6BCzg7bgK4wSKqOe', 'Shingeki No Kyojin', 'Lelaki', 'buyyer', '2021-04-17 00:04:58'),
(15, 'Nande', 'nande@mail.com', '$2y$10$xljbrKx84//gjVqONStdFukD9.e8T4OK8Px36IK5uvj1CORfd0kqi', 'Shingeki No Kyojin', 'Lelaki', 'buyyer', '2021-04-17 00:04:23'),
(29, 'Arima Kousei', 'kousei@mail.com', '$2y$10$srLKbTTlnTEakh5QdMxC9etaYTjHok308XB9NdVwikiOiz1igkGEa', 'Life in april', 'Lelaki', 'buyyer', '2021-04-20 20:04:36'),
(31, 'Kaori Miyazono', 'kaori@mail.com', '$2y$10$FsV5rqZgFN9LoOCwOMWscOIEvtL.OGkrAwe3WpO9oxKcU68Hqp/vW', 'Life in april', 'Perempuan', 'buyyer', '2021-04-20 21:04:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id_checkout`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id_checkout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
