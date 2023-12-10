-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2023 at 05:58 PM
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
-- Database: `db_wedding`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id_feed` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `tgl` date NOT NULL,
  `rating` int(5) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `komplain`
--

CREATE TABLE `komplain` (
  `id_komplain` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_admin` int(5) NOT NULL,
  `komplain` varchar(200) NOT NULL,
  `tanggal_komplain` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_bayar` int(5) NOT NULL,
  `id_pesan` int(5) NOT NULL,
  `bukti_bayar` varchar(100) NOT NULL,
  `total_bayar` varchar(100) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `status` enum('belum tervalidasi','tervalidasi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_bayar`, `id_pesan`, `bukti_bayar`, `total_bayar`, `tgl_bayar`, `status`) VALUES
(18, 40, '09112022141710Dark wallpaper desktop background (14) - Design your way.png', '32000000', '2022-11-10', 'tervalidasi'),
(19, 41, '11112022172803contactus.png', '13000000', '2022-11-11', 'belum tervalidasi');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `tanggal_acara` date NOT NULL,
  `alamat_acara` varchar(100) NOT NULL,
  `jumlah_undangan` varchar(100) NOT NULL,
  `bayar` varchar(100) NOT NULL,
  `status` enum('dipesan','terkirim') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_produk`, `id_user`, `tanggal_pesan`, `tanggal_acara`, `alamat_acara`, `jumlah_undangan`, `bayar`, `status`) VALUES
(40, 4, 2, '2022-11-09', '2022-11-10', 'jl Mawar', '33', '32000000', 'dipesan'),
(41, 5, 2, '2022-11-11', '2022-11-12', 'jl mahakam', '23', '13000000', 'dipesan');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `deskripsi_lengkap` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_user`, `nama_produk`, `deskripsi`, `deskripsi_lengkap`, `gambar`, `harga`) VALUES
(2, 1, 'Wedding Planning', 'Wedding Planning Lengkap', 'MAKE UP & GOWN\r\nMake Up & Touch Up Resepsi\r\nKebaya Akad dan Resepsi\r\nBeskap/Jas Pengantin Akad dan Resepsi\r\nAksesoris Pengantin Akad/Resepsi\r\nMake Up Hairdo/Jilbab Ibu Kedua Mempelai\r\nDua Set Kebaya Ibu Kedua Mempelai\r\nDua Set Beskap Bapak Kedua Mempelai\r\nKalung Melati Pengantin\r\nHand Bouquet\r\n\r\nDEKORASI\r\nPelaminan 6-8 Meter\r\nTaman Pelaminan Artificial\r\nPergola Masuk Pengantin 3×3 1 Buah\r\nStanding Flower Jalan 4 Buah\r\nKarpet Jalan\r\nMeja dan Kursi Penerima Tamu\r\nKotak Angpau 4 Buah\r\nPhoto Booth\r\nDekorasi Area Catering\r\nDekorasi Area VIP dan Area Pengantin\r\nJanur 1 Buah\r\nBuku Tamu\r\nMeja Akad\r\n\r\nHIBURAN\r\n1 Vocal\r\n1 Keyboard\r\n1 Bass\r\n1 Violin/ Saxophone\r\nSound 3000 watt\r\n\r\nMASTER OF CEREMONY\r\nAkad\r\nResepsi\r\n\r\nDOKUMENTASI\r\nDokumentasi Akad dan Resepsi\r\n1 Album Magazine Style 8Rp (20×30)\r\n1 Box Album Costum\r\n1 DVD Video Liputan Acara & Editing\r\n1 Pembesaran 16Rp Termasuk Frame Laminasi\r\nAll Photo Dalam DVD\r\n\r\nWEDDING ORGANIZER\r\nPembuatan Buku Panduan Acara Pernikahan\r\nKonsultasi Acara (Konsep dll)\r\nSatu Kali Family Meeting\r\nKoordinasi Vendor\r\nSatu Kali Technical Meeting Seluruh Vendor\r\nPengaturan Acara Hari H\r\nHandy Talky\r\nPerson In Charge Saat Acara 4 Orang\r\nSeragam WO\r\nVIP Service', 'bundar3.jpg', '1000000'),
(3, 1, 'Dekor', 'Dekor Wedding', 'DEKOR TERMASUK\r\n-Tempat duduk pengantin dan pendamping\r\n-Dekor Meja dan kursi tamu\r\n-Penataan tempat\r\n-Background foto\r\n', 'bundar4.jpg', '3000000'),
(4, 25, 'Wedding Buffet', 'Wedding Buffet (200 orang)', 'Fasilitas yang didapat dengan harga tersebut antara lain:\r\n\r\nDekorasi Meja Prasmanan\r\nMeja + Gubukan 2 buah\r\nPiring + Sendok + Garpu 200 set\r\nPemanas 5 set + Sendok Service\r\nTempat Nasi 1 buah + Sendok Nasi\r\nPelaminan rumah dengan bunga segar\r\nDekorasi kamar pengantin\r\nJanur Pintu (1 pasang)\r\nUmbul-umbul (1 buah)\r\nRias pengantin untuk akad nikah\r\nRias dan busana pengantin untuk resepsi 2x\r\nRias dan busana kedua orang tua (4 orang)\r\nRias dan busana pagar ayu (6 orang)\r\nFoto Digital\r\nStudio Mini (Background Kanvas)\r\n10 sheet Album Kolase\r\nDekorasi meja penerima tamu\r\nKotak uang 2 buah (dipinjamkan)\r\nKursi lipat 100 buah\r\nTenda VIP 5 x 10 m2', 'bundar2.jpg', '32000000'),
(5, 26, 'SAFIR', 'Paket Murmer tanpa Catering', '\r\nRIAS\r\nPengantin Akad\r\nPengantin Resepsi\r\nIbu 2 orang\r\nKeluarga 2 orang\r\nPager Ayu 4 orang\r\nBUSANA ready stock\r\nPengantin Akad\r\nPengantin Resepsi\r\nIbu 2 orang\r\nBapak 2 orang\r\nPager Ayu 4 orang\r\nPager Bagus 4 orang\r\nDekor Kuade 6 Meter dengan Bunga segar\r\nBONUS\r\nPre-Wedding Treatment\r\nBunga Hand Bouquet\r\nKalung Melati\r\nTempat Mahar 2 buah\r\nGratis Buku “Kabagjaan Rumah Tangga”\r\nBuku Tamu 2 set', 'bundar5.jpg', '13000000'),
(6, 25, 'Foto Wedding', ' Foto Only', 'Isi Paket\r\n\r\n1 Fotographer Peralatan & Perlengkapan Full Set \r\nDurasi Pemotretan 4 Jam sesi pemotretan di rumahan Atau\r\n3 Jam Sesi Pemotretan di Gedung\r\nHasil Yang Didapat :\r\n– All File Foto Master\r\n– Bonus 20 Foto Edit With Balance Color\r\n– Master Foto dikirim Via Email', 'bundar6.jpg', '900000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `type_user` enum('customer','vendor') NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenis_kelamin` tinyint(1) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `foto_profil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `type_user`, `username`, `email`, `password`, `alamat`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `no_hp`, `foto_profil`) VALUES
(1, 'WEO.id', 'vendor', 'vendor', 'vendor@mail.com', 'vendor', 'Jl.Naga No.03 Wonosobo', 1, 'Wonosobo', '2021-06-28', '021119878', '02072021151226ui-sherman.jpg'),
(2, 'customer', 'customer', 'customer', 'customer@mail.com', 'customer', 'Jl.Elang No.03 Wonosobo', 1, 'Wonosobo', '2021-06-29', '0812415261', '11112022152236Annotation 2021-08-28 202706.png'),
(3, 'sdas', 'customer', 'dasd', 'manaada@mail.com', 'dsasd', 'sadas', 0, 'asdads', '2021-06-29', '213123', '29062021145628Karim.jpg'),
(24, 'warni', 'customer', 'warni', 'warni@mail.com', 'warni', 'Jl.Kembang', 2, 'Banjarnegara', '2021-05-30', '09123132', '02072021150358ui-divya.jpg'),
(25, 'WeddingMYwe', 'vendor', 'we', 'WeddingMYwe@mail', 'we', 'jl.Kartonyono', 1, 'Wanayasa', '2021-07-20', '0986784663', '02072021151100ui-sam.jpg'),
(26, 'WEDDING CUY', 'vendor', 'weddingcuy', 'weddingcuy', 'weddingcuy', 'Banjarnegara', 1, 'Banjarnegara', '1998-07-14', '021342342', 'jeff.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id_wishlist` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id_wishlist`, `id_user`, `id_produk`) VALUES
(29, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feed`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `komplain`
--
ALTER TABLE `komplain`
  ADD PRIMARY KEY (`id_komplain`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_wishlist`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feed` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `komplain`
--
ALTER TABLE `komplain`
  MODIFY `id_komplain` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_bayar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
