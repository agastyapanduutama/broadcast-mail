-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2021 at 03:53 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mail`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_anggota`
--

CREATE TABLE `t_anggota` (
  `id` int(11) NOT NULL,
  `id_pangkat` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nrp` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_anggota`
--

INSERT INTO `t_anggota` (`id`, `id_pangkat`, `id_jabatan`, `id_kategori`, `nrp`, `nama`, `email`, `keterangan`) VALUES
(1, 1, 11, 1, 'pandu', 'pandu', 'agastypandu@gmail.com', 'uwu'),
(2, 1, 11, 1, 'agastya', 'agastya', 'agastyapandu7@gmail.com', ''),
(3, 1, 11, 1, 'agastya', 'agastya', 'uwu', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_detailmail`
--

CREATE TABLE `t_detailmail` (
  `id` int(11) NOT NULL,
  `id_mail` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `tanggal_dibuat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_detailmail`
--

INSERT INTO `t_detailmail` (`id`, `id_mail`, `id_anggota`, `email`, `status`, `tanggal_dibuat`) VALUES
(1, 1, 3, '', '', '2021-01-28 11:24:31'),
(2, 1, 2, '', '', '2021-01-28 11:24:31'),
(3, 1, 1, '', '', '2021-01-28 11:24:31'),
(4, 2, 3, '', '', '2021-01-28 11:29:39'),
(5, 2, 2, '', '', '2021-01-28 11:29:39'),
(6, 2, 1, '', '', '2021-01-28 11:29:39'),
(7, 3, 3, '', '', '2021-01-28 11:30:01'),
(8, 3, 2, '', '', '2021-01-28 11:30:01'),
(9, 3, 1, '', '', '2021-01-28 11:30:01'),
(10, 4, 3, '', '', '2021-01-28 11:30:43'),
(11, 4, 2, '', '', '2021-01-28 11:30:43'),
(12, 4, 1, '', '', '2021-01-28 11:30:43'),
(13, 5, 3, '', '', '2021-01-28 11:31:10'),
(14, 5, 2, '', '', '2021-01-28 11:31:10'),
(15, 5, 1, '', '', '2021-01-28 11:31:10'),
(16, 6, 3, '', '', '2021-01-28 11:31:23'),
(17, 6, 2, '', '', '2021-01-28 11:31:23'),
(18, 6, 1, '', '', '2021-01-28 11:31:23'),
(19, 7, 3, '', '', '2021-01-28 11:31:41'),
(20, 7, 2, '', '', '2021-01-28 11:31:41'),
(21, 7, 1, '', '', '2021-01-28 11:31:41'),
(22, 8, 1, '', '', '2021-01-28 11:35:27'),
(23, 8, 2, '', '', '2021-01-28 11:35:27'),
(24, 8, 3, '', '', '2021-01-28 11:35:27'),
(25, 9, 1, '', '', '2021-01-28 11:35:51'),
(26, 9, 2, '', '', '2021-01-28 11:35:51'),
(27, 9, 3, '', '', '2021-01-28 11:35:51'),
(28, 10, 1, '', '', '2021-01-28 11:37:18'),
(29, 10, 2, '', '', '2021-01-28 11:37:18'),
(30, 10, 3, '', '', '2021-01-28 11:37:18'),
(31, 11, 1, '', '', '2021-01-28 11:44:59'),
(32, 11, 2, '', '', '2021-01-28 11:44:59'),
(33, 11, 3, '', '', '2021-01-28 11:44:59'),
(34, 12, 1, '', '', '2021-01-28 11:45:14'),
(35, 12, 2, '', '', '2021-01-28 11:45:14'),
(36, 12, 3, '', '', '2021-01-28 11:45:14'),
(37, 13, 1, '', '', '2021-01-28 11:45:28'),
(38, 13, 2, '', '', '2021-01-28 11:45:28'),
(39, 13, 3, '', '', '2021-01-28 11:45:28'),
(40, 14, 1, '', '', '2021-01-28 11:46:18'),
(41, 14, 2, '', '', '2021-01-28 11:46:18'),
(42, 14, 3, '', '', '2021-01-28 11:46:18'),
(43, 15, 1, '', '', '2021-01-28 11:47:07'),
(44, 15, 2, '', '', '2021-01-28 11:47:07'),
(45, 15, 3, '', '', '2021-01-28 11:47:07'),
(46, 16, 1, '', '', '2021-01-28 11:50:12'),
(47, 16, 2, '', '', '2021-01-28 11:50:12'),
(48, 16, 3, '', '', '2021-01-28 11:50:12'),
(49, 17, 1, '', '', '2021-01-28 11:52:03'),
(50, 17, 2, '', '', '2021-01-28 11:52:03'),
(51, 17, 3, '', '', '2021-01-28 11:52:03'),
(52, 18, 1, '', '', '2021-01-28 11:53:14'),
(53, 18, 2, '', '', '2021-01-28 11:53:14'),
(54, 18, 3, '', '', '2021-01-28 11:53:14'),
(55, 19, 1, '', '', '2021-01-28 11:57:12'),
(56, 19, 2, '', '', '2021-01-28 11:57:12'),
(57, 19, 3, '', '', '2021-01-28 11:57:12'),
(58, 20, 3, '', '', '2021-01-28 14:29:16'),
(59, 20, 2, '', '', '2021-01-28 14:29:16'),
(60, 20, 1, '', '', '2021-01-28 14:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `t_jabatan`
--

CREATE TABLE `t_jabatan` (
  `id` int(11) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `urutan` int(11) NOT NULL,
  `is_plus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_jabatan`
--

INSERT INTO `t_jabatan` (`id`, `nama_jabatan`, `urutan`, `is_plus`) VALUES
(11, 'Staf Ahli I', 3, 0),
(12, 'Asintel I', 5, 0),
(13, 'Asops I', 7, 0),
(14, 'Aspers I', 10, 0),
(15, 'Aslog I', 11, 0),
(16, 'Asren I', 15, 0),
(17, 'Aster I/<br/>Aspotmar I/<br/>Aspotdirga I', 13, 0),
(18, 'Askomlek I', 17, 0),
(19, 'Staf Ahli II', 4, 0),
(20, 'Asintel II', 6, 0),
(21, 'Asops II', 8, 0),
(22, 'Aspers II', 11, 0),
(23, 'Aslog II', 12, 0),
(24, 'Aster II /<br/>Aspotmar II /<br/>Aspotdirga II', 14, 0),
(25, 'Asren II', 16, 0),
(26, 'Askomlek II', 18, 0),
(27, 'Kepala Staf', 2, 2),
(29, 'Askomlek III', 19, 0),
(30, 'Asops III', 9, 0),
(31, 'Staff Ahli III', 5, 0),
(32, 'Aspotmar I', 13, 0),
(33, 'Aspotmar II', 14, 0),
(34, 'Aslog III', 13, 0),
(35, 'Aspotdirga I', 13, 0),
(36, 'Aspotdirga II', 14, 0),
(37, 'Panglima', 0, 0),
(38, 'Panglima Kodam', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_kategori`
--

CREATE TABLE `t_kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_kategori`
--

INSERT INTO `t_kategori` (`id`, `nama_kategori`, `keterangan`) VALUES
(1, 'TNI AD', ''),
(4, 'TNI AU', ''),
(5, 'TNI AL', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_konfigurasi`
--

CREATE TABLE `t_konfigurasi` (
  `id` int(11) NOT NULL,
  `nama_konfigurasi` varchar(50) NOT NULL,
  `host` varchar(50) NOT NULL,
  `smtp_secure` varchar(50) NOT NULL,
  `port` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_konfigurasi`
--

INSERT INTO `t_konfigurasi` (`id`, `nama_konfigurasi`, `host`, `smtp_secure`, `port`, `keterangan`) VALUES
(1, 'Gmail', 'smtp.gmail.com', 'ssl', 465, ''),
(3, 'ab', 'ab', 'ab', 12312, '');

-- --------------------------------------------------------

--
-- Table structure for table `t_mail`
--

CREATE TABLE `t_mail` (
  `id` int(11) NOT NULL,
  `tanggal_kirim` date NOT NULL,
  `judul` varchar(255) NOT NULL,
  `subjek` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `lampiran` text NOT NULL,
  `file` text NOT NULL COMMENT 'file in directory',
  `asal` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kategori` enum('1','2','3','4') NOT NULL COMMENT '1 = Perorangan\r\n2 = semua pasis\r\n3 = Pangkat\r\n4 = Kategori (TNI AL, TNI AD, TNI AU)',
  `tanggal_dibuat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_mail`
--

INSERT INTO `t_mail` (`id`, `tanggal_kirim`, `judul`, `subjek`, `isi`, `lampiran`, `file`, `asal`, `jumlah`, `kategori`, `tanggal_dibuat`) VALUES
(1, '2021-01-28', 'uwu', 'uwu', '<p>uwu<br></p>', '1217619 (2).pdf,11112019Panduan (2).pdf,ilovepdf_merged (1).pdf', '', 1, 3, '1', '2021-01-28 11:24:31'),
(2, '2021-01-28', 'lorem', 'lorem', '<h4><pre class=\"lang-php s-code-block hljs\" style=\"margin-bottom: calc(var(--s-prose-spacing) + 0.4em); padding: 12px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: 400; font-stretch: inherit; line-height: 1.30769; font-family: Consolas, Menlo, Monaco, &quot;Lucida Console&quot;, &quot;Liberation Mono&quot;, &quot;DejaVu Sans Mono&quot;, &quot;Bitstream Vera Sans Mono&quot;, &quot;Courier New&quot;, monospace, sans-serif; font-size: 13px; vertical-align: baseline; box-sizing: inherit; width: auto; max-height: 600px; background-color: var(--highlight-bg); border-radius: 5px; color: var(--highlight-color); overflow-wrap: normal;\"><code style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 13px; vertical-align: baseline; box-sizing: inherit; background-color: transparent; white-space: inherit;\"><span class=\"hljs-variable\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--highlight-variable);\">$config</span>[<span class=\"hljs-string\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--highlight-variable);\">\'permitted_uri_chars\'</span>] = <span class=\"hljs-string\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit; color: var(--highlight-variable);\">\'a-z 0-9~%.:_\\-@\\=\'</span>;</code></pre></h4>', '1217619 (2).pdf,11112019Panduan (2).pdf,ilovepdf_merged (1).pdf,ilovepdf_merged.pdf', '', 1, 3, '1', '2021-01-28 11:29:39'),
(3, '2021-01-28', 'lorem', 'lorem', '<p>lorem<br></p>', '<', '<', 1, 3, '1', '2021-01-28 11:30:01'),
(4, '2021-01-28', 'awd', 'awd', '<p>awd<br></p>', '11112019Panduan (2).pdf,ilovepdf_merged (1).pdf', '1606a2bceff27233b88d1e16c851b4e9.pdf,ad6d948829bff86072ff1f2522e35d18.pdf', 1, 3, '1', '2021-01-28 11:30:43'),
(5, '2021-01-28', 'awd', 'awd', '<p>awd</p>', '11112019Panduan (2).pdf,ilovepdf_merged (1).pdf,ilovepdf_merged.pdf', '7f897af10e0834a4e8a5c6d876d7c6c0.pdf,5b868e477677a01af9131f613e7a2034.pdf,5672ed8c8f11e89657eea71e356fcded.pdf', 1, 3, '1', '2021-01-28 11:31:10'),
(6, '2021-01-28', 'awdawdaw', 'awdawdaw', '<p>awdaw</p>', '<', '<', 1, 3, '1', '2021-01-28 11:31:23'),
(7, '2021-01-28', 'uwu', 'uwu', '<p>awdawd</p>', '1217619 (2).pdf,11112019Panduan (2).pdf,ilovepdf_merged (1).pdf,ilovepdf_merged.pdf', 'e363d27f4139a293ab2d84dfbfaa1dea.pdf,1125d575d3ad825dadc276560f49ef27.pdf,811792a03f374b021513fba11a46c2d0.pdf,fa8dc977b1f2e2799463801de84100df.pdf', 1, 3, '1', '2021-01-28 11:31:41'),
(8, '2021-01-28', 'lorem', 'lorem', '<p>lorem<br></p>', '11112019Panduan (2).pdf,ilovepdf_merged (1).pdf', '634bb0ef957999cae18cc8143af8475a.pdf,f67a0f05dc6901febcedc55c692242a2.pdf', 1, 3, '1', '2021-01-28 11:35:27'),
(9, '2021-01-28', 'uwuuwuwuwu', 'uwuuwuwuwu', '<p>uwuuwuwuwu<br></p>', '11112019Panduan (2).pdf,ilovepdf_merged (1).pdf,ilovepdf_merged.pdf', '1d64f3aa758760d08d56bc19f363c9ce.pdf,fdf06611ad83ec7806f3a8f8d644eb28.pdf,aa1624c8733b34776244ac2f9f87f10b.pdf', 1, 3, '1', '2021-01-28 11:35:51'),
(10, '2021-01-28', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', '11112019Panduan (2).pdf,ilovepdf_merged (1).pdf,ilovepdf_merged.pdf', '49e9e4a0bd658891c0bd748de84770f4.pdf,b19fee119fdf049419075a8d5c36d752.pdf,608aa395f9c5379e3256650e2d1b3f57.pdf', 1, 3, '4', '2021-01-28 11:37:18'),
(11, '2021-01-28', 'coba file', 'coba file', '<p>coba file<br></p>', 'ilovepdf_merged (1).pdf', 'd792474fcd1889c4529ecd58843658a6.pdf', 1, 3, '4', '2021-01-28 11:44:59'),
(12, '2021-01-28', 'coba file', 'coba file', '<p>coba file<br></p>', 'ilovepdf_merged (1).pdf', '4e1b325679d37c6ad7fe82793500c463.pdf', 1, 3, '4', '2021-01-28 11:45:14'),
(13, '2021-01-28', 'coba file', 'coba file', '<p>coba file<br></p>', 'ilovepdf_merged (1).pdf', '0b7b085a5b57b01210f5c445c96ecb2c.pdf', 1, 3, '4', '2021-01-28 11:45:28'),
(14, '2021-01-28', 'coba file', 'coba file', '<p>coba file<br></p>', 'ilovepdf_merged (1).pdf', '62ef6102f95c10c333693ba163dcd2f4.pdf', 1, 3, '4', '2021-01-28 11:46:18'),
(15, '2021-01-28', 'coba file', 'coba file', '<p>coba file<br></p>', 'ilovepdf_merged (1).pdf', '248f48be20496cc5b0b5f4b36b044ebe.pdf', 1, 3, '4', '2021-01-28 11:47:07'),
(16, '2021-01-28', 'lorem ipsum', 'lorem ipsum', '<p>dolor sit amet</p>', 'ilovepdf_merged (1).pdf', 'f5b93d5ebf541c5b45183d6f066b5be0.pdf', 1, 3, '4', '2021-01-28 11:50:12'),
(17, '2021-01-28', 'awdawd', 'awdawd', '<p>awd</p>', '0', '0', 1, 3, '4', '2021-01-28 11:52:03'),
(18, '2021-01-28', 'cobacoba', 'cobacoba', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. A facere vero amet nam, adipisci delectus blanditiis, quaerat sequi iure eos maiores doloribus, ea eveniet fugit enim ipsum natus iusto laborum!', '0', '0', 1, 3, '4', '2021-01-28 11:53:14'),
(19, '2021-01-28', 'awdawdawdjkawd', 'awdawdawdjkawd', '<p>adwawd</p>', '1217619 (2).pdf,11112019Panduan (2).pdf,ilovepdf_merged (1).pdf', 'c17c7b08e39e5111113a4c17b1465e3e.pdf,240d90602705a4bd2ad52029e091a3a5.pdf,c0c0826a572130a94286d8b16f9ad634.pdf', 1, 3, '4', '2021-01-28 11:57:12'),
(20, '2021-01-28', 'user lain', 'user lain', '<p>user lain<br></p>', '11112019Panduan (2).pdf', '4c27cd428d6e3935fe363683540398cd.pdf', 5, 3, '1', '2021-01-28 14:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `t_pangkat`
--

CREATE TABLE `t_pangkat` (
  `id` int(11) NOT NULL,
  `nama_pangkat` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_pangkat`
--

INSERT INTO `t_pangkat` (`id`, `nama_pangkat`, `keterangan`, `status`) VALUES
(1, 'Kolonel Int', '', '1'),
(2, 'Kolonel Pnb', '', '1'),
(3, 'Kolonel Laut (P)', '', '1'),
(4, 'Kolonel Arh', '', '1'),
(5, 'Kolonel Czi', '', '1'),
(6, 'Kolonel Kav', '', '1'),
(7, 'Kolonel Laut (E)', '', '1'),
(13, 'Colonel AD', '', '1'),
(14, 'Kolonel Pas', '', '1'),
(15, 'Kolonel Arm', '', '1'),
(16, 'Kombes Pol', '', '1'),
(17, 'Kolonel Inf', '', '1'),
(18, 'Kombes Pol', '', '1'),
(19, 'Kolonel Laut (T)', '', '1'),
(20, 'Kolonel Tek', '', '1'),
(21, 'Kolonel Lek', '', '1'),
(22, 'Kolonel Kal', '', '1'),
(23, 'Group Captain AU', '', '1'),
(24, ' Kolonel Nav', '', '1'),
(25, 'Kolonel Laut (S)', '', '1'),
(26, ' Kolonel Mar', '', '1'),
(27, ' Kolonel Pom', '', '1'),
(28, 'Jendral', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `t_quotes`
--

CREATE TABLE `t_quotes` (
  `id` int(11) NOT NULL,
  `quotes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_quotes`
--

INSERT INTO `t_quotes` (`id`, `quotes`) VALUES
(1, 'Belajar tanpa berpikir itu tidaklah berguna, tapi berpikir tanpa belajar itu sangatlah berbahaya! -Soekarno'),
(2, 'Beri aku 1.000 orang tua, niscaya akan kucabut semeru dari akarnya. Beri aku 10 pemuda niscaya akan kuguncangkan dunia.  -Soekarno'),
(3, 'Bangsa yang besar adalah bangsa yang menghormati jasa pahlawannya. -Soekarno'),
(4, 'Laki-laki dan perempuan adalah sebagai dua sayapnya seekor burung. Jika dua sayap sama kuatnya, maka terbanglah burung itu sampai ke puncak yang setinggi-tingginya; jika patah satu dari pada dua sayap itu, maka tak dapatlah terbang burung itu sama sekali. -Soekarno'),
(5, 'Barangsiapa ingin mutiara, harus berani terjun di lautan yang dalam.\r\n -Soekarno'),
(6, 'Jika kita memiliki keinginan yang kuat dari dalam hati, maka seluruh alam semesta akan bahu membahu mewujudkannya. -Soekarno'),
(7, 'Gantungkan cita-cita mu setinggi langit! Bermimpilah setinggi langit. Jika engkau jatuh, engkau akan jatuh di antara bintang-bintang. -Soekarno'),
(8, 'Bunga mawar tidak mempropagandakan harum semerbaknya, dengan sendirinya harum semerbaknya itu tersebar di sekelilingnya. -Soekarno'),
(9, 'Aku akan memuji apa yang baik, tak pandang sesuatu itu datangnya dari seorang komunis, islam, atau seorang Hopi Indian. -Soekarno'),
(10, 'Jadikan deritaku ini sebagai kesaksian bahwa kekuasaan seorang Presiden sekalipun ada batasnya. Karena kekuasaan yang langgeng hanya kekuasaan rakyat. Dan diatas segalanya adalah Kekuasaan Tuhan Yang Maha Esa. -Soekarno'),
(11, 'Hati yang sabar, pemikiran yang religius, tindakan yang baik. -Seoharto'),
(12, 'Kaya tanpa harta, menantang tanpa orang lain, berani tanpa gagang, dan menang tanpa membunuh. -Seoharto'),
(13, 'Kalau kamu ingin menjadi pribadi yang maju, kamu harus pandai mengenal apa yang terjadi, pandai melihat, pandai mendengar, dan pandai menganalisis. -Seoharto'),
(14, 'Penguasa yang enak hidupnya hanya karena banyak harta bendanya, kelak matinya tidak akan terhormat. Oleh karena itu jangan kejam dan sewenang-wenang terhadap rakyatnya. -Seoharto'),
(15, 'kita perlu berani mengatakan yang benar itu benar dan yang salah itu salah. -Seoharto'),
(16, 'Siapa saja yang mencoba melawan, akan saya gebuki. -Seoharto'),
(17, 'Jangan mudah terkejut, tidak kagum, dan jangan sombong. -Seoharto'),
(18, 'Saya ini tentara. Tentara itu pedoman hidupnya Sapta Marga. Kami patriot Indonesia, pendukung dan pembela ideologi negara yang bertanggungjawab dan tidak mengenal menyerah. -Seoharto'),
(19, 'Seseorang harus menjaga kebaikannya. Karena itu adalah investasi yang baik bagi kehidupan. -Seoharto'),
(20, 'Sehubungan dengan Tuhanmu, guru, ratu dan orang tua Anda. -Seoharto');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `id_konfigurasi` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password_email` text NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id`, `id_konfigurasi`, `username`, `password`, `email`, `password_email`, `nama_user`, `level`, `keterangan`, `status`) VALUES
(1, 1, 'admin', '580097c0183509887837571145ccc3ad', 'agastypandu@gmail.com', 'UVdkaGMzUjVZVEEzTURnNU9TRT0', 'Administrator', 1, '0', '1'),
(5, 1, 'user', '7648be42b5e3e6afde12b6bd7f300b52', 'user@user.com', 'ZFhObGNnPT0', 'user', 2, '', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_anggota`
--
ALTER TABLE `t_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_detailmail`
--
ALTER TABLE `t_detailmail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_jabatan`
--
ALTER TABLE `t_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_kategori`
--
ALTER TABLE `t_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_konfigurasi`
--
ALTER TABLE `t_konfigurasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_mail`
--
ALTER TABLE `t_mail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pangkat`
--
ALTER TABLE `t_pangkat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_quotes`
--
ALTER TABLE `t_quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_anggota`
--
ALTER TABLE `t_anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_detailmail`
--
ALTER TABLE `t_detailmail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `t_jabatan`
--
ALTER TABLE `t_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `t_kategori`
--
ALTER TABLE `t_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_konfigurasi`
--
ALTER TABLE `t_konfigurasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_mail`
--
ALTER TABLE `t_mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `t_pangkat`
--
ALTER TABLE `t_pangkat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `t_quotes`
--
ALTER TABLE `t_quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
