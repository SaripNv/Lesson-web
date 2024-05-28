-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 28, 2024 at 03:14 PM
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
  `id_teacher` int DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id_course`, `judul_course`, `id_teacher`, `created_at`, `updated_at`) VALUES
(1, 'Inggris I', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Inggris II', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Inggris III', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(3, 'example', '1715125181_514f2c79344c67412b9c.jpeg', 'a'),
(5, 'example1', '1715743290_4201e30db831616dd79f.jpg', 'test');

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
  `video_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`id_lesson`, `title`, `content`, `id_course`, `order`, `video_url`, `created_at`, `updated_at`) VALUES
(1, 'introduction', '', 1, 1, 'https://youtu.be/P4wgwrAIFfA?si=GWxrM60Q9hVyVNfD', '2024-05-28 07:59:36', '2024-05-28 07:59:36'),
(2, 'grammar I', '', 1, 2, 'https://youtu.be/k2_2H3qT9q0?si=wjvc-62R5mdGikw7', '2024-05-28 08:00:05', '2024-05-28 08:00:05'),
(3, 'grammar II', '', 1, 3, 'https://youtu.be/P4wgwrAIFfA?si=GWxrM60Q9hVyVNfD', '2024-05-28 08:00:22', '2024-05-28 08:00:58'),
(4, 'grammar III', '', 1, 4, 'https://youtu.be/P4wgwrAIFfA?si=GWxrM60Q9hVyVNfD', '2024-05-28 08:00:42', '2024-05-28 08:00:42');

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
  `role` enum('admin','teacher','user') NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'sarip', 'sarip0747@gmail.com', '$2y$10$ANFsvdxgYgf00tGDUU5PfeL9Bcf1u.0s6eYcbLl49xndrbcU5aGii', 'admin', '2024-04-14 01:40:02', '2024-04-14 01:40:02'),
(4, 'core', 'core7843@gmail.com', '$2y$10$OcHDUHisluRTtgsY5tB/UOlUKKRCH4/9jRkCW3W7PzU9z8SJYK2ce', 'teacher', '2024-04-16 12:55:53', '2024-04-16 12:55:53');

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
  MODIFY `id_lesson` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id_teacher` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
