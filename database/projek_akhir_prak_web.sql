-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2023 at 01:30 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek_akhir_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id_resep` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `bahan_bahan` text NOT NULL,
  `cara_pembuatan` text NOT NULL,
  `tgl_pembuatan` date NOT NULL DEFAULT current_timestamp(),
  `foto` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`id_resep`, `judul`, `deskripsi`, `bahan_bahan`, `cara_pembuatan`, `tgl_pembuatan`, `foto`, `id_user`) VALUES
(9, 'Kolak Pisang', 'Kolak pisang adalah hidangan tradisional Indonesia yang terdiri dari pisang dimasak dalam kuah manis berbasis kelapa, dengan tambahan gula merah, pandan, dan kelapa parut. Pisang yang lembut bertemu dengan kuah kaya dan gurih, menjadikannya hidangan penutup hangat yang sering dihadirkan dalam berbagai momen spesial di Indonesia.', '<p>pisang kepok<br>1/2 kg ubi madu<br>santan (1/2 buah kelapa arut)<br>daun pandan<br>gula pasir<br>garam<br>Gula merah secukupnya (sebagai pewarna biar gak pucat)</p>', '<p><strong>Langakah 1</strong><br>Kupas ubi,dan potong pisang beserta ubi cuci dan sisihkan.<br><strong>Langkah 2</strong><br>Peras santan ke wadah,masukkan ubi dan pisang yg sudah di potong<br><strong>Langkah 3</strong><br>Didihkan,sambil menunggu ubinya empuk masukkan daunp andan,garam,gula,gula merah tunggu hingga meresap sekitar 5 menit.tes rasa jika sudah pas matikan api dan sajikan.</p>', '2023-11-30', '65683c1ca826b.webp', 2),
(10, 'Cendol Dawet', 'Cendol dawet merupakan minuman tradisional Indonesia yang menyegarkan dan unik. Terdiri dari cendol, sejenis adonan berwarna hijau dari tepung beras, yang disajikan dalam santan kelapa dan gula merah cair. Dawet, sejenis jelly hijau, juga sering ditambahkan untuk memberikan tekstur kenyal. Cendol dawet dikenal akan kombinasi rasa manis, segar, dan lembut, menjadikannya pilihan populer untuk meredakan dahaga dan menikmati sensasi rasa tradisional Indonesia.', '<p><strong>60 gr</strong> Tepung Beras, <br><strong>40 gr</strong> Tepung Tapioka, <br><strong>1 Bks</strong> Nutrijell Plain,10gr / kecil (me: Nutrijell Melon), <br><strong>1/2 sdt </strong>Garam, <br><strong>1 sdm</strong> Gula Pasir, <br><strong>500 ml</strong> Air, <br><strong>Secukupnya</strong> Perisa Pandan, <br><strong>Secukupnya</strong> Es batu.</p>', '<p><strong>Langakah 1</strong><br>Campur tepung, garam, gula &amp; Nutrijell.. Aduk rata Masukkan air, lalu aduk hingga tak ada yg bergerindil, tambahkan perisa pandan &frac12; sdt atau secukupnya.<br><strong>Langkah 2<br></strong>Jerang di atas kompor, aduk perlahan sampai kental &amp; meletup&sup2; Kecilkan api, aduk terus hingga adonan kalis, terlihat bening &amp; mengkilap... matikan api<br><strong>Langkah 3</strong><br>Siapkan wadah berisi air &amp; es batu <br><strong>Langkah 4<br></strong>Segera cetak menggunakan cetakan dawet atau pakai saringan/parutan kasar sepertiku On Pict ini masih kurang kalis yaaa, terlalu lemes, tapi aku dah tak sabar 😁<br><strong>Langkah 5</strong><br>Lumayan.... Ada beras merah nyempil 🤭 tadi tepung berasnya kurang 1sdm, jadi aku kasih tepung beras merah (blender sendiri) 😁</p>', '2023-11-30', '65683d359bea5.webp', 2),
(11, 'Es Pisang Ijo', 'Es Pisang Ijo adalah hidangan penutup khas Makassar, Indonesia, yang terkenal dengan kelezatan dan keunikan penyajiannya. Hidangan ini terdiri dari pisang yang dibungkus dengan lapisan adonan berwarna hijau dari tepung beras ketan, kemudian dikukus hingga matang. Pisang yang telah dibalut adonan hijau tersebut kemudian dipotong tipis dan disajikan dengan saus santan dan sirup gula merah. Es Pisang Ijo menawarkan kombinasi rasa manis, lembut, dan segar, menjadikannya hidangan yang sangat disukai untuk dinikmati dalam suasana hangat Indonesia.', '<p><strong>3 buah</strong> pisang kepok, <br>☘️BAHAN PISANG IJO, <br><strong>35 gram</strong> tepung beras, <br><strong>35 gram</strong> tepung terigu, <br><strong>75 m</strong>l jus pandan (10 lbr daun pandan, 4 daun Suji 300 ml air), <br><strong>Secubit</strong> garam, <br><strong>1/2 sachet</strong> segitiga santan, <br>☘️BAHAN BUBUR SUM SUM, <br><strong>60 gram</strong> tepung beras, <br><strong>500 ml</strong> air, <br><strong>1.5</strong> segitiga santan, <br><strong>1/4</strong> sdt garam, <br><strong>1 sdm</strong> gula pasir, <br><strong>1 lembar</strong> daun pandan di sobek lalu di simpul, <br>☘️BAHAN LAINNYA, <br><strong>disesuaikan</strong> Sirup cocopandan, <br><strong>disesuaikan</strong> Es batu,</p>', '<p><strong>Langkah 1<br></strong>Kukus pisang kepok 10 menit. Jus daun pandan dan daun Suji, lalu saring, <br><strong>Langakah 2</strong><br>Dalam panci campur jadi satu terigu dan tepung beras,tambahkan garam,gula dan jus pandan,serta santan instan. Aduk rata tidak ada yg bergerindil. Masak dengan api kecil sambil diaduk hingga Kalis, tidak menempel di panci. angkat. <br><strong>Langakah 3</strong><br>Ambil secukupnya adonan, alasi dng plastik. Pipihkan adonan merata lalu taruh pisang diatas nya dan guling serta rapikan hingga pisang terbalut adonan sempurna. Kukus selama 20 menit atau sampai matang <br><strong>Langakah 4</strong><br>Masukkan bahan bubur jadi satu. Masak bahan bubur sambil sesekali di aduk aduk supaya tidak gosong.<br><strong>Langakah 5</strong><br>Aduk aduk terus sampai mendidih dan meletup letuo. Matikan api <br><strong>Langakah 6</strong><br>Ambil mangkok. Isi dengan bubur sum sum. Lalu potong2 pisang ijo dan tata diatas nya.beri es batu lalu tambahkan sirup cocopandan. Enak banget segar dan mengenyangkan</p>', '2023-11-30', '65683dffcb1ea.webp', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `headline` varchar(255) DEFAULT NULL,
  `profilePicture` varchar(255) DEFAULT 'profile-dummy.png',
  `namaLengkap` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `password`, `headline`, `profilePicture`, `namaLengkap`) VALUES
(1, '123', NULL, '$2y$10$zo6zYOO48h69FBYfyC3lgOXzPZdZYOqDZBeFYZKdy9bsESkoTnkz2', NULL, 'profile-dummy.png', NULL),
(2, 'wijdan', 'wijdan@gmail.com', '$2y$10$pW4frmTIKVu4gaAS3EahiOEHXgOCVFKq43u36fc3I/B3Ab0pGTRZS', 'Mahasiswa yang suka menulis minuman khas Indonesia', '65683b5ca0a91.jpeg', ' Wijdan Akhmad'),
(3, 'adit', NULL, '$2y$10$lHS2kHs.erS5GmfTuZGgZO9Y0JHA4gUUJVW9gc0rhDRCSj1otY6WG', NULL, 'profile-dummy.png', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `id_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `resep_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
