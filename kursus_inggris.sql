-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 14, 2024 at 08:48 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kursus_inggris`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id_course` int NOT NULL,
  `judul_course` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_teacher` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id_course`, `judul_course`, `id_teacher`) VALUES
(1, 'Inggris I', 1),
(3, 'Inggris II', 2),
(4, 'Inggris III', 3);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` int NOT NULL,
  `nama_foto` varchar(100) NOT NULL,
  `foto` text,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `nama_foto`, `foto`, `deskripsi`) VALUES
(1, 'course', '1715124200_06b6c6adc83b11f9f691.jpg', 'a'),
(2, 'english', '1715124219_bedab6e48ac6e000caff.jpeg', 'a'),
(3, 'example', '1715125181_514f2c79344c67412b9c.jpeg', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `id_lesson` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `id_course` int DEFAULT NULL,
  `order` int DEFAULT NULL,
  `file_video` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`id_lesson`, `title`, `content`, `id_course`, `order`, `file_video`) VALUES
(5, 'Basic English Fundamentals', 'pada tahap ini', 1, 1, '1718334634_95c86f9373cdb1b4b480.mp4'),
(6, 'Essential Vocabulary', 'pada tahap ke 2', 1, 2, '1718338543_3fdd706e9a7cd1c7f501.mp4'),
(7, 'Mastering Tenses and Grammar', 'pada tahap 1', 3, 1, '1718338612_d1f3694f56c8d04b6843.mp4'),
(8, 'Mastery of Complex Language Aspects', 'pada tahap selanjutnya', 4, NULL, '1718353587_2ec5d15fcf87a8edcd72.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id_teacher` int NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `bidang_keahlian` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `foto_guru` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id_teacher`, `nama`, `email`, `bidang_keahlian`, `deskripsi`, `foto_guru`) VALUES
(1, 'Mawar Siti', 'Yamaha32@gmail.com', 'speak inggris', 'Mawar Siti adalah seorang guru biologi yang penuh semangat dan berdedikasi dengan pengalaman lebih dari sepuluh tahun di bidang pendidikan. Ia memiliki gelar Sarjana dalam Biologi dari Universitas XYZ dan gelar Magister dalam Pendidikan dari Sekolah Tinggi ABC. Selama karirnya, Mawar telah menginspirasi banyak siswa dengan gaya mengajar yang menarik dan pendekatan langsung dalam pembelajaran. Keahliannya meliputi ekologi, genetika, dan biologi evolusi. Di luar kelas, Mawar menikmati mendaki gunung, mengamati burung, dan berkontribusi sebagai relawan di organisasi lingkungan setempat. Ia berkomitmen untuk menanamkan cinta akan ilmu pengetahuan kepada siswanya dan mempersiapkan mereka untuk sukses akademis dan karir di bidang biologi', '1713055158_ecb42d274f7832461991.jpg'),
(2, 'Pexel', 'chocho@gmail.com', 'match', 'Pexel adalah seorang guru biologi yang penuh semangat dan berdedikasi dengan pengalaman lebih dari sepuluh tahun di bidang pendidikan. Ia memiliki gelar Sarjana dalam Biologi dari Universitas XYZ dan gelar Magister dalam Pendidikan dari Sekolah Tinggi ABC. Selama karirnya, Mawar telah menginspirasi banyak siswa dengan gaya mengajar yang menarik dan pendekatan langsung dalam pembelajaran. Keahliannya meliputi ekologi, genetika, dan biologi evolusi. Di luar kelas, Mawar menikmati mendaki gunung, mengamati burung, dan berkontribusi sebagai relawan di organisasi lingkungan setempat. Ia berkomitmen untuk menanamkan cinta akan ilmu pengetahuan kepada siswanya dan mempersiapkan mereka untuk sukses akademis dan karir di bidang biologi', '1715121618_0322103cf05a3a1dd324.jpg'),
(3, 'Ling ling', 'jordi69@gmail.com', 'grandmaster', 'Ling ling adalah seorang guru biologi yang penuh semangat dan berdedikasi dengan pengalaman lebih dari sepuluh tahun di bidang pendidikan. Ia memiliki gelar Sarjana dalam Biologi dari Universitas XYZ dan gelar Magister dalam Pendidikan dari Sekolah Tinggi ABC. Selama karirnya, Mawar telah menginspirasi banyak siswa dengan gaya mengajar yang menarik dan pendekatan langsung dalam pembelajaran. Keahliannya meliputi ekologi, genetika, dan biologi evolusi. Di luar kelas, Mawar menikmati mendaki gunung, mengamati burung, dan berkontribusi sebagai relawan di organisasi lingkungan setempat. Ia berkomitmen untuk menanamkan cinta akan ilmu pengetahuan kepada siswanya dan mempersiapkan mereka untuk sukses akademis dan karir di bidang biologi', '1715121653_65f6a16b3d379b735b1b.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','teacher','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `role`) VALUES
(4, 'core', 'core7843@gmail.com', '$2y$10$OcHDUHisluRTtgsY5tB/UOlUKKRCH4/9jRkCW3W7PzU9z8SJYK2ce', 'teacher'),
(5, 'admin', 'admin2105@gmail.com', '$2y$10$G5y/rDqXLNN9FuevmebJou7UEoq86/fZwowKSGjZyOYnHzjqay55O', 'admin'),
(6, 'sarip', 'sarip0747@gmail.com', '$2y$10$vT1.o5tTk/Ab5iZnY4xNa.ECoU8lrFC.weyP2fAhIx9HcUxERg1pW', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id_course`),
  ADD KEY `id_teacher` (`id_teacher`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id_lesson`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id_teacher`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id_course` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_gallery` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id_lesson` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id_teacher` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`id_teacher`) REFERENCES `teacher` (`id_teacher`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
