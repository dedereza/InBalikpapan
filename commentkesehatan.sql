-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2021 at 11:00 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `parent_comment_id` int(11) DEFAULT NULL,
  `comment` text NOT NULL,
  `comment_sender_name` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `parent_comment_id`, `comment`, `comment_sender_name`, `date`) VALUES
(53, 0, 'Menteri Badan Usaha Milik Negara (BUMN) Erick Thohir mengatakan, pemerintah sejak awal pandemi Covid-19 konsisten pada tiga program, yakni Indonesia Sehat, Indonesia Bekerja, dan Indonesia Tumbuh. Erick menilai, tidak akan mungkin perekonomian Indonesia dapat kembali bekerja dan bertumbuh tanpa adanya pemulihan sektor kesehatan terlebih dahulu.\r\n\r\n\"Kita tidak mungkin bisa selesaikan perang melawan Covid-19 tanpa gotong royong. Di sini poin terpenting, yakni vaksinasi harus dipercepat dan harus berjalan dengan baik,\" ujar Erick saat sosialisasi sentra vaksinasi gotong royong bertajuk \"Sukseskan Vaksinasi Gotong Royong untuk Bangkit Bersama\" di Senayan Park, Jakarta, Rabu (19/5).\r\n\r\nErick mencontohkan penurunan kasus Covid-19 dan tingkat kematian di DKI Jakarta setelah vaksinasi dilakukan secara bertahap. Ia menilai, vaksinasi menjadi kata kunci dalam melawan Covid-19. Untuk menciptakan kekebalan kelompok lewat vaksinasi, Erick menyebut ketersediaan vaksin menjadi sangat vital saat ini.', 'ssd', '2021-05-19 08:55:14'),
(54, 53, 'ded', 'ree', '2021-05-19 08:55:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
