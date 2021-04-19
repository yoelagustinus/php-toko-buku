-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2020 at 07:40 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_buku`
--

-- --------------------------------------------------------

--
-- Table structure for table `list_buku`
--

CREATE TABLE `list_buku` (
  `ID` int(11) NOT NULL,
  `Nama_Buku` varchar(255) NOT NULL,
  `Penulis` varchar(255) NOT NULL,
  `Penerbit` varchar(255) NOT NULL,
  `Rating` float NOT NULL,
  `Jumlah_Halaman` varchar(30) NOT NULL,
  `Harga` int(10) NOT NULL,
  `Sinopsis` varchar(2000) NOT NULL,
  `Cover` varchar(255) NOT NULL,
  `Kategori` varchar(40) NOT NULL,
  `Jumlah` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_buku`
--

INSERT INTO `list_buku` (`ID`, `Nama_Buku`, `Penulis`, `Penerbit`, `Rating`, `Jumlah_Halaman`, `Harga`, `Sinopsis`, `Cover`, `Kategori`, `Jumlah`) VALUES
(1, 'Algoritma & Pemrograman Menggunakan Java', 'Abdul Kadir', 'ANDI Yogyakarta', 4.5, '288 halaman', 71900, 'Buku yang sangat berguna bagi  Anda yang sedang mempelajari Algoritma dan Java, \r\n		Menggunakan bahasa yang sederharna dan mudah dipahami.', 'DataBuku/buku/Algoritma dan Pemograman menggunakan Java.jpg', 'Edukasi', 10),
(2, 'Kalkulus Edisi Kedelapan Jilid I', 'Varger Purcel Rigdon', 'Erlangga', 4, '457 halaman', 270000, 'Kalkulus jilid I adalah buku yang     \r\n		ditujukan untuk para mahasiswa dari setiap jurusan yang ada di Fakultas MIPA, Teknik, atau bahkan Ekonomi di setiap perguruan tinggi. \r\n		Para mahasiswa ini selalu membutuhkan pemahaman dasar akan kalkulus yang akan diterapkan pada bidang masing-masing sesuai dengan \r\n	    program studinya.', 'DataBuku/buku/Kalkulus Edisi Kedelapan JilidI.jpg', 'Edukasi', 3),
(3, 'Kamus Bisnis Dan Kewirausahaan', 'Pipin Asropudin', 'CV Titian Ilmu', 3.5, '120 halaman', 35000, 'Buku yang berjudul Kamus bisnis dan   \r\n		Kewirausahaan, berbicara tentang istilah dalam dunia bisnis, baik yang sering kita dengar maupun yang tidak pernah kita dengar. \r\n		Buku yang ditulis oleh Pipin Asropudin dapat dimiliki oleh siapapun yang ingin menjadi pembisnis maupun yang sudah terjun dalam dunia bisnis.  \r\n		Di zaman sekarang usaha bisnis sangat diminati dari berbagai kalangan, baik dari yang muda maupun yang sudah merintis suatu usaha. \r\n		Namun, dalam membangun suatu usah kita harus memahami terlebih dulu istilah-istilah dalam dunia bisnis. \r\n		Sehingga usaha yang kita jalanin bisa berkembang.', 'DataBuku/buku/Kamus Bisnis dan Kewirausahaan.jpg', 'Kamus', 19),
(4, 'TESAURUS plus Indonesia-Inggris', 'Aris Mansur Makmur', 'Pt Mizan Publika', 3.7, '540 halaman', 115000, 'Walau bukan berlatar belakang  \r\n		pendidikan Bahasa,  Ia mampu menulis buku ini. Menurut saya hal ini merupakan suatu yang unik dan secara pribadi Saya memberikan acungan \r\n		â€œdua jempolâ€  padanya. Berkat keuletannya selama sepuluh tahun menyusun buku ini, akhirnya buku ini bisa diterbitkan.', 'DataBuku/buku/Tesaurus plus Indonesia-Inggris.jpg', 'Kamus', 30),
(5, 'One Piece', 'Eiichiro Oda', 'PT Elex Media Komputindo', 4, '182 halaman', 55800, 'Komik ini menceritakan seorang bajak laut amatiran  \r\n		bernama Luffy yang ingin mencari sebuah harta karun legendaris dengan mencari anggota yang lain agar ikut bergabung. \r\n		Tetapi mereka semua harus menghadapi banyak rintangan selama di lautan karena ada banyak lautan ganas di berbagai daerah, \r\n		serta banyak juga bajak laut yang menghadang mereka karena pemikiran berbeda. Mereka semua sendiri pun harus berlatih dan bisa mengeluarkan \r\n		jurus baru agar lawan-lawan semakin kuat dapat mereka tumbangkan, dan apa yang mereka ambisikan dapat menjadi kenyataan. Walaupun di tengah seri ini \r\n		ada banyak pengorbanan dari yang Luffy sayangi agar dapat menjadi raja bajak laut.', 'DataBuku/buku/One Piece.jpg', 'Komik', 25),
(6, 'Naruto Vol 72', 'Mashashi Kishimoto', 'PT Elex Media Komputindo', 4.1, '193 halaman', 48500, 'Sebagai Ninja muda, Uzumaki Naruto \r\n		memiliki kebiasaan unik untuk membuat kerusakan dan menjadi pengacau terbesar di Akademi Ninja Shinobi di desa Konohagakure. Dia adalah orang buangan \r\n		karena ada sesuatu yang khusus tentang dia. Ketika ia masih bayi, orang tua Naruto ,Minato dan Kushina menyegel roh rubah berekor sembilan \r\n		yang bernama Kurama di dalam tubuh bayi nya. Seiring berjalannya waktu, ia menjadi seorang ninja dengan teman-teman sekelasnya Haruno Sakura dan \r\n		Uchiha Sasuke. Sekarang, berusia 16 tahun dan Naruto harus menyelamatkan dunia.', 'DataBuku/buku/Naruto Vol 72.jpg', 'Komik', 40),
(7, 'Membuat Kue Bolu Buah dan Sayur', 'Anti Aprilyanti Suganti', 'Penebar Plus', 4, '132 halaman', 25000, 'Kue bolu merupakan salah satu makanan \r\n		yang digemari banyak orang. Namun, kue bolu yang ditemui masih masih menggunakan bahan-bahan yang kurang menyehatkan sehingga bisa membua badan gemuk. \r\n		Kombinasi bahan kue dari bahan buah dan sayuran paut anda coba. Oleh karena itu, resep kue bolu yang ada di buku Membuat Kue Bolu Buah dan Sayur ini \r\n		banyak menggunakan sayuran dan buah-buahan yang pastinya membuat bisa membuat anda sehat serta baik juga untuk jajanan anak-anak. Selain menjadi camilan \r\n		yang enak, kue bolu juga bisa disajikan sebagai penambah vitamin ke anak-anak.', 'DataBuku/buku/Kue Bolu buah dan sayur.jpeg', 'Majalah', 10),
(8, 'Motor Trend Indonesia Four Door Miracles', 'Azman Osman', 'Source Interlink Media', 3.1, '118 halaman', 85000, 'Buku ini menjelaskan berbagai \r\n		macam hal tentang mobil yang terdiri dari trend-trend mobil yang sedang hits, lalu mengenai first_look, ada juga mengenai beberapa Test Drive yang \r\n		dilakukan, dan model SUV Trend.', 'DataBuku/buku/Motor Trend Indonesia.jpg', 'Majalah', 1),
(9, 'Paper Towns', 'John Green', 'Gramedia', 2.5, '360 halaman', 51000, 'Margo Roth Spiegelman dan Quentin Jacobsen bersahabat saat \r\n		masih berumur sembilan tahun duluâ€”dikarenakan orangtua mereka bersahabat dan rumah mereka bersebelahan, terkadang mereka juga sering main bersama.\r\n		Margo memang menyukai misteri. Bahkan saat mereka menemukan seorang mayat laki-laki di Jefferson Park, bukannya menjauhi mayat itu, Margo malahan \r\n		mendekati mayat itu. Berbeda dengan Quentin yang ingin segera pulang ke rumah dan menangis diam-diam tanpa Margo ketahui.', 'DataBuku/buku/Paper Towns.jpg', 'Novel', 28),
(10, 'The Maze Runner', 'James Dashner', 'Mizan Fantasi', 4.8, '477 halaman', 71900, 'Thomas, seorang anak cerdas yang dikirim ke Glade sama \r\n		seperti anak-anak lelaki lainnya. Meski menggunakan sudut pandang orang ketiga, rasanya James terlalu Thomas-sentris, maklum karena \r\n		tokoh yang diplot sebagai pemeran utama adalah Thomas. Thomas datang sebagai Anak-Bawang (Greenie) di Glade. Di sana dia bertemu \r\n		dengan anak laki-laki dari berbagai ras dan kepribadian. Berkat rasa ingin tahunya, Thomas cepat belajar mengenai kehidupan di Glade. Rasa \r\n		ingin tahunya itu pula yang membuatnya bercita-cita menjadi seorang Runner.', 'DataBuku/buku/The Maze Runner.png', 'Novel', 22);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Pass` varchar(255) NOT NULL,
  `Kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Nama`, `Email`, `Pass`, `Kategori`) VALUES
(3, 'admin', 'admin@toko.com', '202cb962ac59075b964b07152d234b70', '1'),
(4, 'user', 'user@gmail.com', '202cb962ac59075b964b07152d234b70', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list_buku`
--
ALTER TABLE `list_buku`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list_buku`
--
ALTER TABLE `list_buku`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
