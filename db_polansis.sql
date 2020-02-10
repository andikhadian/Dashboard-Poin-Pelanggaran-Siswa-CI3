-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 05, 2020 at 03:23 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_polansis`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pelanggaran`
--

CREATE TABLE `jenis_pelanggaran` (
  `jenis_pelanggaran_id` int(11) NOT NULL,
  `jenis_pelanggaran` varchar(200) NOT NULL,
  `point` int(11) NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenis_pelanggaran`
--

INSERT INTO `jenis_pelanggaran` (`jenis_pelanggaran_id`, `jenis_pelanggaran`, `point`, `counter`) VALUES
(1, 'Tidak memakai seragam / aksesoris sesuai aturan dan ketentuan. Seperti celana pensil, Memakai kalung, Gelang, Make up dan aksesoris lainnya', 5, 11),
(2, 'Membuang sampah tidak pada tempatnya dan meludah sembarangan', 5, 5),
(3, 'Tidak mengikuti upacara bendera hari senin / hari besar nasional', 5, 4),
(4, 'Terlambat masuk sekolah 3 kali berturut turut', 10, 6),
(5, 'Mengganggu kelas lain yang sedang belajar atau membuat gaduh', 10, 13),
(6, 'Menggunakan smarthphone, walkman, ipad, dan sejenisnya pada saat belajar', 10, 17),
(7, 'Rambut gondrong, disambung, dan diberi warna', 10, 3),
(8, 'Tidak masuk sekolah / mangkir / tanpa keterangan', 10, 4),
(9, 'Berbohong tidak menyampaikan pesan orang tua, memalsukan tanda tangan, menyalahgunakan uang titipan orang tua untuk sekolah', 10, 3),
(10, 'Merusak / mengotori fasilitas belajar di lingkungan sekolah', 25, 1),
(11, 'Membawa tamu dari luar tanpa izin guru piket', 25, 3),
(12, 'Melawan / menghina guru / karyawan sekolah dengan kata-kata kasar / perbuatan', 25, 0),
(14, 'Merokok di lingkungan sekolah', 50, 1),
(15, 'Membawa, membaca, mengedarkan dan menonton konten pornografi.', 50, 1),
(16, 'Memalak/meminta uang atau barang dengan paksa/ancaman.', 50, 0),
(17, 'Bermain judi atau lotere disekolah.', 50, 0),
(18, 'Memasang tato, tindik hidung/bibir.', 50, 1),
(19, 'Membawa senjata tajam, senjata api atau benda yang dapat membahayakan orang lain', 50, 0),
(20, 'Berkeleahi/tawuran/melakukan kekearasan.', 100, 0),
(21, 'Melakukan tindakan pencurian, perbuatan asusila dan tindak penganiayaan.', 100, 0),
(22, 'Terlibat membawa, memakai, mengedarkan narkoba, obat-obatan terlarang, ganja dan miras.', 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` int(11) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `jumlah_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `kelas`, `jumlah_siswa`) VALUES
(1, 'X RPL 1', 39),
(2, 'X MM 1', 1),
(3, 'X TKJ 1', 1),
(4, 'X BC 1', 0),
(5, 'XI RPL 1', 0),
(6, 'X RPL 2', 0),
(7, 'XI RPL 2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggar`
--

CREATE TABLE `pelanggar` (
  `pelanggar_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tgl_melanggar` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `jenis_pelanggaran_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pelanggar`
--

INSERT INTO `pelanggar` (`pelanggar_id`, `user_id`, `tgl_melanggar`, `siswa_id`, `jenis_pelanggaran_id`) VALUES
(93, 11, 1580908626, 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role`) VALUES
(1, 'Admin'),
(2, 'Guru');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `siswa_id` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(200) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sisa_point` int(11) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`siswa_id`, `nis`, `nama`, `jenis_kelamin`, `kelas_id`, `no_hp`, `email`, `sisa_point`, `status`) VALUES
(1, 20201001, 'Dhimas Ishlah', 'Laki-Laki', 1, '021381238128', 'dhimas@gmail.com', 100, 'Aktif'),
(2, 20201013, 'Dita Rizky Ananda Saputri', 'Perempuan', 1, '09281281281', 'dita@gmail.com', 100, 'Aktif'),
(3, 20201002, 'Budi Setiawan', 'Laki-Laki', 1, '09650682129', 'budi@gmail.com', 100, 'Aktif'),
(4, 20201003, 'Siti Amalia', 'Perempuan', 1, '089650682122', 'siti@gmail.com\r\n', 100, 'Aktif'),
(5, 20201004, 'Lulu Regita', 'Perempuan', 1, '089650682121', 'lulu@gmail.com', 100, 'Aktif'),
(6, 20201005, 'Muhammad Rafli', 'Laki-Laki', 1, '089650682125', 'rafli@gmail.com', 100, 'Aktif'),
(7, 20201006, 'Abdul Shomad', 'Laki-Laki', 1, '021381238122', 'abdul@gmail.com', 100, 'Aktif'),
(8, 20201007, 'Agung Sutiyoso', 'Laki-Laki', 1, '092281829292', 'agung@gmail.com', 100, 'Aktif'),
(9, 20201008, 'Cintya Nur', 'Perempuan', 1, '029281229292', 'cintya@gmail.com', 100, 'Tidak Aktif'),
(11, 20201009, 'Erik Fernandes', 'Laki-Laki', 1, '089259291292', 'erik@gmail.com', 100, 'Aktif'),
(12, 20201010, 'Alan Suryana', 'Laki-Laki', 1, '089650682110', 'alan@gmail.com', 100, 'Aktif'),
(13, 20201011, 'Faris Al Fathin', 'Laki-Laki', 1, '089650682125', 'farisalfathin77@gmail.com', 100, 'Aktif'),
(14, 20201012, 'Tsanny Alamsyah', 'Laki-Laki', 1, '89650682148', 'tsany@gmail.com', 50, 'Aktif'),
(15, 20201014, 'Budiman Setia', 'Laki-Laki', 1, '089650682291', 'budiman@gmail.com', 25, 'Tidak Aktif'),
(16, 20201015, 'Indah Oktaviani', 'Perempuan', 1, '089650682219', 'indah@gmail.com', 10, 'Aktif'),
(17, 20201016, 'Ade Adika', 'Laki-Laki', 1, '089650682111', 'adeadika@gmail.com', 25, 'Aktif'),
(18, 20201017, 'Anita Laksita', 'Laki-Laki', 1, '089650682112', 'anita@gmail.com', 100, 'Aktif'),
(19, 20201018, 'Salsabila Jamila', 'Perempuan', 1, '089650682121', 'salsabila@gmail.com', 95, 'Aktif'),
(20, 20201019, 'Vanya Lestari', 'Perempuan', 1, '089650682120', 'vanya@gmail.com', 100, 'Aktif'),
(21, 20201020, 'Kemal Kenari', 'Laki-Laki', 1, '89650592022', 'kemal@gmail.com', 100, 'Aktif'),
(22, 20201021, 'Bambang Surya', 'Laki-Laki', 1, '089650682191', 'bambang@gmail.com', 100, 'Aktif'),
(23, 20201022, 'Vannesa Indah', 'Perempuan', 1, '089650682910', 'vannesa@gmail.com', 90, 'Aktif'),
(24, 20201023, 'Rahman Sirait', 'Laki-Laki', 1, '089650682911', 'rahman@gmail.com', 100, 'Aktif'),
(25, 20201024, 'Yani Rika', 'Perempuan', 1, '089650682921', 'yanirika@gmail.com', 100, 'Aktif'),
(26, 20201025, 'Gilang Tedi', 'Laki-Laki', 1, '089650692192', 'gilang@gmail.com', 100, 'Aktif'),
(27, 20201026, 'Ani Yulianti', 'Laki-Laki', 1, '08927182912', 'aniyulianti@gmail.com', 100, 'Aktif'),
(28, 20201027, 'Mahesa Maulana', 'Laki-Laki', 1, '08928112929', 'mahesa@gmail.com', 100, 'Aktif'),
(29, 20201028, 'Oliva Puspita', 'Laki-Laki', 1, '09281292819', 'olivia@gmail.com', 100, 'Aktif'),
(30, 20201029, 'Yosef Prabowo', 'Laki-Laki', 1, '08921782912', 'yosef@gmail.com', 100, 'Aktif'),
(31, 20201030, 'Karya Jati', 'Laki-Laki', 1, '08921912829', 'karya@gmail.com', 90, 'Aktif'),
(32, 20201031, 'Dagel Ramadan', 'Laki-Laki', 1, '0928119292', 'dagel@gmail.com', 100, 'Aktif'),
(33, 20201032, 'Vera Janet', 'Perempuan', 1, '0949291922', 'verajanet@gmail.com', 100, 'Aktif'),
(34, 20201033, 'Fitria Puspita', 'Perempuan', 1, '0921912912', 'fitria@gmail.com', 100, 'Aktif'),
(35, 20201034, 'Kajen Ardianto', 'Laki-Laki', 1, '0929191222', 'kajen@gmail.com', 100, 'Aktif'),
(36, 20201035, 'Rika Widiastuti', 'Perempuan', 1, '0121929192', 'rikaw@gmail.com', 100, 'Aktif'),
(37, 20201036, 'Ina Paramita', 'Perempuan', 1, '0291912922', 'inaparamita@gmail.com', 100, 'Aktif'),
(38, 20201037, 'Yoga Manullang', 'Laki-Laki', 1, '0219192922', 'yogama@gmail.com', 100, 'Aktif'),
(39, 20201038, 'Nilam Rajut', 'Laki-Laki', 1, '0291192192', 'nilam@gmail.com', 100, 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `last_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nama_user`, `email`, `password`, `image`, `jenis_kelamin`, `role_id`, `is_active`, `date_created`, `last_login`) VALUES
(1, 'Bianco Akbar', 'bianco@gmail.com', '$2y$10$TkqVuEG92UDyqeqgIdPYtOSuR.HBmfv6k4.wlUMOc99BMmcNr7Ki6', 'default.png', '', 2, 1, 1579442969, 1580877251),
(2, 'Admin', 'admin@gmail.com', '$2y$10$m3W5FUZZgCwjoaBk2vn2pORxLtgoVx1e5IZq5ybg0LnWr7knlSile', 'default.png', '', 1, 1, 1579473984, 1580902263),
(3, 'Muhammad Rifki', 'rifki@gmail.com', '$2y$10$1O.ayNaC.8.WzVoDFhlAtuNyCI7YGUOYJpSnPl1EtTNLKRlwLTKua', 'default.png', '', 2, 1, 1579443553, 1580807920),
(4, 'Faris', 'faris@gmail.com', '$2y$10$sLNrXqGXmgRnY7Y/tWhOdeUFDlz/U08s7s6WJtFBJvYjoVdJgwuvS', 'default.png', '', 2, 2, 1579443615, 0),
(9, 'Linda Ramadhani', 'linda@gmail.com', '$2y$10$m4eBFzMuxOuNQag/L9gKKeokoUxn0HtJRYlXwAU3ih783oJInatdC', 'default.png', '', 2, 1, 1579493081, 1580877219),
(10, 'Zuditya Agung', 'zudit@gmail.com', '$2y$10$RJj86PWZ38wPq1hlcyFY5eoeGg9usdKQsdX0fqGASgakFtiEJU53O', 'default.png', '', 2, 1, 1579563292, 1580121446),
(11, 'Andikha Dian Nugraha', 'andikha.dian@yahoo.com', '$2y$10$SVm1hxwxdZh6hPbc7EviKOsFzQ6rqcPu9PZNi40Ko8.3bQVw827t.', 'default.png', '', 2, 1, 1579703876, 1580908924),
(12, 'tester', 'tester@gmail.com', '$2y$10$R6Lo.gUk8FCVXG8Qlh7xRe9D1JU4WDwWljlIKL3Xxx/N/0UUpZQw6', 'default.png', '', 2, 1, 1580188829, 1580730336);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_pelanggaran`
--
ALTER TABLE `jenis_pelanggaran`
  ADD PRIMARY KEY (`jenis_pelanggaran_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas_id`);

--
-- Indexes for table `pelanggar`
--
ALTER TABLE `pelanggar`
  ADD PRIMARY KEY (`pelanggar_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`siswa_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_pelanggaran`
--
ALTER TABLE `jenis_pelanggaran`
  MODIFY `jenis_pelanggaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kelas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pelanggar`
--
ALTER TABLE `pelanggar`
  MODIFY `pelanggar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `siswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
