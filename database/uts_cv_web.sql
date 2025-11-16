-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 16, 2025 at 01:41 AM
-- Server version: 11.7.2-MariaDB-log
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts_cv_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `school_name` varchar(100) DEFAULT NULL,
  `degree` varchar(100) DEFAULT NULL,
  `start_year` char(4) DEFAULT NULL,
  `end_year` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `school_name`, `degree`, `start_year`, `end_year`) VALUES
(1, 'Universitas Muhammadiyah Sukabumi', 'S1 Teknik Informatika', '2023', '2027'),
(2, 'SMA Negeri 1 Sukaraja', 'IPA', '2020', '2023');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id` int(11) NOT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `start_date` varchar(20) DEFAULT NULL,
  `end_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `company_name`, `role`, `description`, `start_date`, `end_date`) VALUES
(1, 'PT. Astra Internasional', 'Cyber Security', 'Berfokus pada pengembangan kemampuan di bidang keamanan siber dan perlindungan data. Aktif mempelajari sistem keamanan jaringan serta cara mendeteksi kerentanan dalam sistem informasi.', 'Jan 2024', 'Apr 2025'),
(2, 'PT Traveloka Tbk', 'Cyber Security', 'Sedang mempelajari dasar-dasar keamanan siber, termasuk pengenalan ancaman siber, enkripsi data, dan keamanan jaringan. Tertarik mengembangkan kemampuan dalam mendeteksi, mencegah, dan mengatasi potensi serangan digital melalui pembelajaran dan praktik langsung.', ' Apr 2025', 'Sekarang');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `id` int(11) NOT NULL,
  `org_name` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `start_year` char(4) DEFAULT NULL,
  `end_year` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `org_name`, `role`, `description`, `start_year`, `end_year`) VALUES
(1, 'Himpunan Mahasiswa Teknik Informatika', 'Anggota PSDM', 'Sebagai anggota divisi PSDM, saya berperan dalam mengelola dan mengembangkan potensi anggota organisasi melalui berbagai program pelatihan, evaluasi, dan kegiatan internal. Saya turut berkontribusi dalam menjaga semangat, solidaritas, serta peningkatan kualitas sumber daya manusia di dalam organisasi.', '2024', '2025');

-- --------------------------------------------------------

--
-- Table structure for table `personal_data`
--

CREATE TABLE `personal_data` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `summary` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal_data`
--

INSERT INTO `personal_data` (`id`, `full_name`, `email`, `phone`, `address`, `summary`) VALUES
(1, 'Mochammad Bimo Ibrahim', 'bimoibr159@gmail.com', '085864333518', 'Grand Panorama, Selabintana', 'Saya adalah mahasiswa IT yang sedang memperdalam kemampuan di bidang teknologi, seperti pemrograman dan pengelolaan data. Walaupun masih dalam tahap belajar, saya antusias untuk menambah pengalaman melalui magang dan siap beradaptasi dengan lingkungan kerja profesional. Saya percaya bahwa setiap kesempatan belajar akan membantu saya menjadi lebih kompeten di bidang IT.');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `skill_name` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `percentage` int(3) DEFAULT 90,
  `level_text` varchar(50) DEFAULT 'Mahir'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill_name`, `category`, `percentage`, `level_text`) VALUES
(1, 'PHP', 'Bahasa Pemrograman', 100, 'Ahli'),
(2, 'CodeIgniter 4', 'Framework', 85, 'Mahir'),
(3, 'Network Security', 'Cyber Security', 90, 'Mahir'),
(4, 'JavaScript', 'Bahasa Pemrograman', 70, 'Menengah'),
(5, 'MySQL', 'Database', 100, 'Ahli'),
(6, 'Git', 'Tools', 70, 'Menengah'),
(7, 'Bootstrap 5', 'Tools', 85, 'Mahir'),
(8, 'HTML5', 'Bahasa Pemrograman', 100, 'Ahli'),
(9, 'CSS3', 'Bahasa Pemrograman', 70, 'Menengah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_data`
--
ALTER TABLE `personal_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_data`
--
ALTER TABLE `personal_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
