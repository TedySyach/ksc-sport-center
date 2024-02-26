-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 26, 2024 at 05:42 AM
-- Server version: 10.11.7-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u991604500_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id_album` int(11) NOT NULL,
  `id_sycAlbum` int(11) DEFAULT NULL,
  `nama_album` char(50) NOT NULL,
  `slug_album` char(50) NOT NULL,
  `foto` text NOT NULL,
  `created_by` char(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` char(20) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id_album`, `id_sycAlbum`, `nama_album`, `slug_album`, `foto`, `created_by`, `created_at`, `modified_by`, `modified_at`) VALUES
(1, NULL, 'Percobaan', 'percobaan', 'percobaan20180411012221.jpg', 'amperakoding', '2018-04-11 06:14:08', 'amperakoding', '2021-05-17 19:57:25'),
(2, NULL, 'Percobaan ke2', 'percobaan-ke2', 'percobaan-ke220180414141810.jpg', 'amperakoding', '2018-04-11 06:20:52', 'amperakoding', '2021-05-17 19:57:25'),
(3, NULL, 'Coba Lagi', 'coba-lagi', 'coba-lagi20180414141800.jpg', 'amperakoding', '2018-04-11 06:23:01', 'amperakoding', '2021-05-17 19:57:25'),
(4, NULL, 'Lagi coba', 'lagi-coba', 'lagi-coba20180414141618.jpg', 'amperakoding', '2018-04-11 06:23:11', 'amperakoding', '2021-05-17 19:57:25'),
(5, NULL, 'Scenery', 'scenery', 'scenery20180414141646.jpg', 'amperakoding', '2018-04-14 19:16:46', 'amperakoding', '2021-05-17 19:57:28'),
(6, NULL, 'Lake House', 'lake-house', 'lake-house20180414141705.jpg', 'amperakoding', '2018-04-14 19:17:05', 'amperakoding', '2021-05-17 19:57:28'),
(7, NULL, 'House', 'house', 'house20180414141719.jpg', 'amperakoding', '2018-04-14 19:17:19', 'amperakoding', '2021-05-17 19:57:28');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `atas_nama` varchar(100) NOT NULL,
  `norek` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `atas_nama`, `norek`, `logo`) VALUES
(1, 'BNI', 'Microtron', '12345678', 'bni.png'),
(2, 'BRI', 'Microtron', '87873412323', 'bri.png'),
(3, 'Mandiri', 'Microtron', '778734098', 'mandiri.png'),
(4, 'BCA', 'Microtron', '998980342487', 'bca.png');

-- --------------------------------------------------------

--
-- Table structure for table `cabor`
--

CREATE TABLE `cabor` (
  `id_cabor` int(11) NOT NULL,
  `nama_cabor` varchar(225) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cabor`
--

INSERT INTO `cabor` (`id_cabor`, `nama_cabor`, `created_date`) VALUES
(1, 'Mini Soccer', '2024-02-15 02:04:00'),
(2, 'Basket', '2024-02-15 02:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id_company` int(11) NOT NULL,
  `id_sycCom` int(11) DEFAULT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_desc` text NOT NULL,
  `company_address` text NOT NULL,
  `company_maps` text NOT NULL,
  `company_phone` char(30) NOT NULL,
  `company_phone2` char(30) NOT NULL,
  `company_fax` char(30) NOT NULL,
  `company_email` char(30) NOT NULL,
  `foto` text NOT NULL,
  `foto_type` char(10) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL,
  `created_by` char(50) NOT NULL,
  `modified_by` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id_company`, `id_sycCom`, `company_name`, `company_desc`, `company_address`, `company_maps`, `company_phone`, `company_phone2`, `company_fax`, `company_email`, `foto`, `foto_type`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(1, 1, 'Kscsportcenter', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vel nibh ac nisl porttitor tempus sit amet et diam. Etiam sed leo eu elit varius venenatis sed ac arcu. Praesent malesuada gravida diam et tincidunt. Mauris quis metus eget magna efficitur scelerisque. Sed mollis porttitor erat ullamcorper sodales. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse congue, dolor ultricies mollis molestie, libero diam auctor mauris, ultrices euismod leo justo vel enim. Etiam non rutrum arcu. Maecenas at dictum dui, sit amet gravida mauris. Vivamus sagittis neque in purus dapibus, ut pellentesque purus pulvinar. Nunc pretium porta ipsum, at iaculis felis elementum in. Duis cursus ex vitae nunc hendrerit blandit.\r\n\r\nMorbi vel est sed dui tristique elementum sed sed purus. Ut interdum nisi et felis vulputate, quis tempus diam blandit. Mauris tincidunt tellus faucibus, posuere turpis a, consectetur lacus. Nullam quis ipsum neque. Praesent sapien tellus, molestie et diam vel, cursus tristique neque. Nullam sit amet ornare odio. Ut vehicula risus id lacus blandit rutrum. Duis non molestie purus. Etiam turpis ligula, tincidunt sit amet dolor at, rutrum viverra orci. Etiam egestas urna id velit bibendum mollis.\r\n\r\nSed eu sem cursus, congue massa at, bibendum leo. Praesent cursus in nulla a egestas. Fusce aliquam leo eu enim feugiat ullamcorper. Nullam pulvinar dolor eu lacinia bibendum. Integer id ipsum cursus, luctus enim nec, fringilla dolor. Sed sit amet ipsum sit amet quam suscipit gravida vitae ut elit. Donec pellentesque non tortor vitae euismod. Praesent suscipit tempor ex ac viverra. Nunc ut sapien eu velit tempor hendrerit. Vestibulum posuere nisl massa, ornare commodo lorem sagittis ultrices. Sed eget rutrum neque, sed ullamcorper dui. Sed ultricies purus vitae lectus cursus, vestibulum faucibus quam posuere. Donec cursus vitae ipsum nec ullamcorper. Donec maximus orci finibus ante hendrerit, vitae maximus quam facilisis. Cras commodo fringilla porttitor.\r\n\r\nNam pharetra a tortor quis venenatis. Nunc lectus nibh, auctor id ante vel, interdum maximus felis. Cras libero est, mattis a sollicitudin sit amet, ultricies sed tellus. Ut augue lacus, luctus convallis enim quis, ultricies aliquet sem. Sed venenatis eros sit amet velit varius, ac rhoncus nibh sodales. Etiam sit amet efficitur est, vel pretium arcu. Morbi diam nulla, dictum quis ornare ultrices, pharetra quis mi. Nam sollicitudin pharetra congue. Praesent sed mauris at ante tincidunt blandit. Aliquam cursus ante efficitur, iaculis turpis eget, ornare quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis lobortis leo. Cras ut risus orci. Sed mattis purus ac libero suscipit, nec venenatis tortor semper. Aliquam sodales massa eget dignissim pharetra.\r\n\r\nNam sed enim vitae erat vulputate feugiat in tempus metus. In maximus erat risus. Donec et viverra nibh. Maecenas hendrerit, sapien id suscipit fermentum, tellus nisl sollicitudin erat, non laoreet dui ex sit amet odio. Nullam sit amet arcu sed felis tempor dapibus. Aliquam erat volutpat. Aenean malesuada a eros sed aliquet. Phasellus condimentum lobortis sapien, sit amet viverra sem iaculis venenatis. Morbi interdum nulla ut nulla fringilla commodo. In eu magna ornare libero pellentesque congue. Vestibulum ultrices congue feugiat.', 'Jl. Maju Mundur Kec. Camat Kel. Lurahan, Kab. Bupaten, Dunia Lain', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16327777.649419477!2d108.84621849858628!3d-2.415291213289622!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c4c07d7496404b7%3A0xe37b4de71badf485!2sIndonesia!5e0!3m2!1sen!2sid!4v1506312173230\" width=\"100%\" height=\"200\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', '081241412', '0711412402', '12414', 'daftarin@gmail.com', 'kscsportcenter20240116140055', '.png', '2017-11-09 06:45:34', NULL, 'superadmin', 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
--

CREATE TABLE `diskon` (
  `id` int(11) NOT NULL,
  `id_sycDiskon` int(11) DEFAULT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `diskon`
--

INSERT INTO `diskon` (`id`, `id_sycDiskon`, `harga`) VALUES
(1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` int(11) NOT NULL,
  `id_sycEvent` int(11) DEFAULT NULL,
  `nama_event` varchar(100) NOT NULL,
  `slug_event` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `kategori` int(11) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `foto_type` char(10) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` char(50) NOT NULL,
  `modified_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `modified_by` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `id_sycEvent`, `nama_event`, `slug_event`, `deskripsi`, `kategori`, `foto`, `foto_type`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(2, NULL, 'What is Lorem Ipsum?', 'what-is-lorem-ipsum', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><img src=\"http://localhost/olshop2/assets/images/upload/Screenshot_from_2018-03-22_20-37-321.png\" width=\"500\" height=\"200\"></p>\r\n<p>Why do we use it?<br>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Why do we use it?<br>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 1, 'what-is-lorem-ipsum20240116135103', '.jpg', '2018-04-02 20:21:59', 'administrator', '2024-01-16 06:51:03', 'superadmin'),
(3, NULL, 'Why do we use it?', 'why-do-we-use-it', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', 1, 'why-do-we-use-it20240116135048', '.jpg', '2018-04-02 21:13:48', 'administrator', '2024-01-16 06:50:48', 'superadmin'),
(4, NULL, 'Where does it come from?', 'where-does-it-come-from', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 1, 'where-does-it-come-from20240116135130', '.jpg', '2018-04-02 21:14:39', 'administrator', '2024-01-16 06:51:31', 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `nama_foto` char(100) NOT NULL,
  `slug_foto` char(100) NOT NULL,
  `foto` text NOT NULL,
  `created_by` char(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` char(20) NOT NULL,
  `modified_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id_foto`, `album_id`, `nama_foto`, `slug_foto`, `foto`, `created_by`, `created_at`, `modified_by`, `modified_at`) VALUES
(1, 1, 'Testing Saja Cuis', 'testing-saja-cuis', 'testing-saja-cuis20180411025319.jpg', 'amperakoding', '2018-04-11 07:41:29', 'amperakoding', '2021-05-17 19:57:13'),
(2, 4, 'Foto Lagi Coba', 'foto-lagi-coba', 'foto-lagi-coba20180411024503.jpg', 'amperakoding', '2018-04-11 07:45:03', 'amperakoding', '2021-05-17 19:58:17'),
(3, 3, 'Foto Coba Lagi Saja', 'foto-coba-lagi-saja', 'foto-coba-lagi-saja20180411024712.jpg', 'amperakoding', '2018-04-11 07:47:12', 'amperakoding', '2021-05-17 19:58:17'),
(4, 1, 'Teasdasd', 'teasdasd', 'teasdasd20180414101405.png', 'amperakoding', '2018-04-14 15:13:17', 'amperakoding', '2021-05-17 19:57:13'),
(5, 3, 'Agains', 'agains', 'agains20180414101428.jpg', 'amperakoding', '2018-04-14 15:14:29', 'amperakoding', '2021-05-17 19:58:17'),
(6, 4, 'Waasd', 'waasd', 'waasd20180414101515.jpg', 'amperakoding', '2018-04-14 15:15:15', 'amperakoding', '2021-05-17 19:58:17'),
(7, 1, 'ASczxc', 'asczxc', 'asczxc20180414101545.jpg', 'amperakoding', '2018-04-14 15:15:45', 'amperakoding', '2021-05-17 19:58:17'),
(8, 1, 'ASXzc', 'asxzc', 'asxzc20180414101604.jpg', 'amperakoding', '2018-04-14 15:16:05', 'amperakoding', '2021-05-17 19:58:17'),
(9, 2, 'ASczxcacasc', 'asczxcacasc', 'asczxcacasc20180414101613.png', 'amperakoding', '2018-04-14 15:16:13', 'amperakoding', '2021-05-17 19:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `jam`
--

CREATE TABLE `jam` (
  `id` int(11) NOT NULL,
  `id_cabor_jam` int(11) DEFAULT NULL,
  `jam` varchar(50) NOT NULL,
  `durasi` int(11) DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `harga_jual_sabtu` int(11) DEFAULT NULL,
  `harga_jual_minggu` int(11) DEFAULT NULL,
  `is_available` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jam`
--

INSERT INTO `jam` (`id`, `id_cabor_jam`, `jam`, `durasi`, `jam_selesai`, `harga_jual`, `harga_jual_sabtu`, `harga_jual_minggu`, `is_available`) VALUES
(1, 1, '06:00:00', 2, '08:00:00', 1000000, 500, 150, 1),
(2, 1, '08:00:00', 2, '10:00:00', 100, 500, 150, 1),
(3, 1, '10:00:00', 2, '12:00:00', 100, 200, 150, 1),
(4, 1, '12:00:00', 2, '14:00:00', 100, 200, 150, 1),
(5, 1, '14:00:00', 2, '16:00:00', 200, 200, 150, 1),
(6, 1, '16:00:00', 2, '18:00:00', 200, 200, 150, 1),
(7, 1, '18:00:00', 2, '20:00:00', 200, 200, 150, 1),
(8, 1, '20:00:00', 2, '22:00:00', 200, 200, 350, 1),
(20, 2, '06:00:00', 2, '08:00:00', 50000, 57000, 35000, 1),
(21, 2, '08:00:00', 2, '10:00:00', 50000, 57000, 35000, 1),
(22, 2, '10:00:00', 2, '12:00:00', 50000, 57000, 35000, 1),
(23, 2, '12:00:00', 2, '14:00:00', 50000, 57000, 35000, 1),
(24, 2, '14:00:00', 2, '16:00:00', 50000, 57000, 35000, 1),
(25, 2, '16:00:00', 2, '18:00:00', 50000, 57000, 35000, 1),
(26, 2, '18:00:00', 2, '20:00:00', 58000, 60000, 40000, 1),
(27, 2, '20:00:00', 2, '22:00:00', 58000, 60000, 40000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL,
  `slug_kat` varchar(20) NOT NULL,
  `created_by` char(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` char(50) NOT NULL,
  `modified_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `slug_kat`, `created_by`, `created_at`, `modified_by`, `modified_at`) VALUES
(1, 'Turnamen', 'turnamen', 'administrator', '2018-07-23 08:38:39', 'administrator', '2024-01-16 06:40:04'),
(2, 'Kerja Sama', 'kerja-sama', 'administrator', '2018-07-23 08:38:39', 'administrator', '2024-01-16 06:40:07');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `nama_kontak` char(50) NOT NULL,
  `nohp` char(50) NOT NULL,
  `created_by` char(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` char(50) NOT NULL,
  `modified_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `nama_kontak`, `nohp`, `created_by`, `created_at`, `modified_by`, `modified_at`) VALUES
(1, 'Cristian Ronaldo', '6281228289766', 'superadmin', '2018-07-23 11:16:57', 'superadmin', '2024-01-16 04:54:52'),
(2, 'Leonel Mesi', '628218467736', 'superadmin', '2018-07-23 11:16:57', 'superadmin', '2024-01-16 04:56:00'),
(3, 'Edin Hazard', '62867481471', 'superadmin', '2018-07-23 11:20:44', 'superadmin', '2024-01-16 04:56:08'),
(4, 'Angela', '628785689755', 'superadmin', '2023-12-11 16:34:25', 'superadmin', '2024-01-16 04:56:14');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `provinsi_id` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `provinsi_id`, `nama_kota`) VALUES
(1, 21, 'Aceh Barat'),
(2, 21, 'Aceh Barat Daya'),
(3, 21, 'Aceh Besar'),
(4, 21, 'Aceh Jaya'),
(5, 21, 'Aceh Selatan'),
(6, 21, 'Aceh Singkil'),
(7, 21, 'Aceh Tamiang'),
(8, 21, 'Aceh Tengah'),
(9, 21, 'Aceh Tenggara'),
(10, 21, 'Aceh Timur'),
(11, 21, 'Aceh Utara'),
(12, 32, 'Agam'),
(13, 23, 'Alor'),
(14, 19, 'Ambon'),
(15, 34, 'Asahan'),
(16, 24, 'Asmat'),
(17, 1, 'Badung'),
(18, 13, 'Balangan'),
(19, 15, 'Balikpapan'),
(20, 21, 'Banda Aceh'),
(21, 18, 'Bandar Lampung'),
(22, 9, 'Bandung'),
(23, 9, 'Bandung'),
(24, 9, 'Bandung Barat'),
(25, 29, 'Banggai'),
(26, 29, 'Banggai Kepulauan'),
(27, 2, 'Bangka'),
(28, 2, 'Bangka Barat'),
(29, 2, 'Bangka Selatan'),
(30, 2, 'Bangka Tengah'),
(31, 11, 'Bangkalan'),
(32, 1, 'Bangli'),
(33, 13, 'Banjar'),
(34, 9, 'Banjar'),
(35, 13, 'Banjarbaru'),
(36, 13, 'Banjarmasin'),
(37, 10, 'Banjarnegara'),
(38, 28, 'Bantaeng'),
(39, 5, 'Bantul'),
(40, 33, 'Banyuasin'),
(41, 10, 'Banyumas'),
(42, 11, 'Banyuwangi'),
(43, 13, 'Barito Kuala'),
(44, 14, 'Barito Selatan'),
(45, 14, 'Barito Timur'),
(46, 14, 'Barito Utara'),
(47, 28, 'Barru'),
(48, 17, 'Batam'),
(49, 10, 'Batang'),
(50, 8, 'Batang Hari'),
(51, 11, 'Batu'),
(52, 34, 'Batu Bara'),
(53, 30, 'Bau-Bau'),
(54, 9, 'Bekasi'),
(55, 9, 'Bekasi'),
(56, 2, 'Belitung'),
(57, 2, 'Belitung Timur'),
(58, 23, 'Belu'),
(59, 21, 'Bener Meriah'),
(60, 26, 'Bengkalis'),
(61, 12, 'Bengkayang'),
(62, 4, 'Bengkulu'),
(63, 4, 'Bengkulu Selatan'),
(64, 4, 'Bengkulu Tengah'),
(65, 4, 'Bengkulu Utara'),
(66, 15, 'Berau'),
(67, 24, 'Biak Numfor'),
(68, 22, 'Bima'),
(69, 22, 'Bima'),
(70, 34, 'Binjai'),
(71, 17, 'Bintan'),
(72, 21, 'Bireuen'),
(73, 31, 'Bitung'),
(74, 11, 'Blitar'),
(75, 11, 'Blitar'),
(76, 10, 'Blora'),
(77, 7, 'Boalemo'),
(78, 9, 'Bogor'),
(79, 9, 'Bogor'),
(80, 11, 'Bojonegoro'),
(81, 31, 'Bolaang Mongondow (Bolmong)'),
(82, 31, 'Bolaang Mongondow Selatan'),
(83, 31, 'Bolaang Mongondow Timur'),
(84, 31, 'Bolaang Mongondow Utara'),
(85, 30, 'Bombana'),
(86, 11, 'Bondowoso'),
(87, 28, 'Bone'),
(88, 7, 'Bone Bolango'),
(89, 15, 'Bontang'),
(90, 24, 'Boven Digoel'),
(91, 10, 'Boyolali'),
(92, 10, 'Brebes'),
(93, 32, 'Bukittinggi'),
(94, 1, 'Buleleng'),
(95, 28, 'Bulukumba'),
(96, 16, 'Bulungan (Bulongan)'),
(97, 8, 'Bungo'),
(98, 29, 'Buol'),
(99, 19, 'Buru'),
(100, 19, 'Buru Selatan'),
(101, 30, 'Buton'),
(102, 30, 'Buton Utara'),
(103, 9, 'Ciamis'),
(104, 9, 'Cianjur'),
(105, 10, 'Cilacap'),
(106, 3, 'Cilegon'),
(107, 9, 'Cimahi'),
(108, 9, 'Cirebon'),
(109, 9, 'Cirebon'),
(110, 34, 'Dairi'),
(111, 24, 'Deiyai (Deliyai)'),
(112, 34, 'Deli Serdang'),
(113, 10, 'Demak'),
(114, 1, 'Denpasar'),
(115, 9, 'Depok'),
(116, 32, 'Dharmasraya'),
(117, 24, 'Dogiyai'),
(118, 22, 'Dompu'),
(119, 29, 'Donggala'),
(120, 26, 'Dumai'),
(121, 33, 'Empat Lawang'),
(122, 23, 'Ende'),
(123, 28, 'Enrekang'),
(124, 25, 'Fakfak'),
(125, 23, 'Flores Timur'),
(126, 9, 'Garut'),
(127, 21, 'Gayo Lues'),
(128, 1, 'Gianyar'),
(129, 7, 'Gorontalo'),
(130, 7, 'Gorontalo'),
(131, 7, 'Gorontalo Utara'),
(132, 28, 'Gowa'),
(133, 11, 'Gresik'),
(134, 10, 'Grobogan'),
(135, 5, 'Gunung Kidul'),
(136, 14, 'Gunung Mas'),
(137, 34, 'Gunungsitoli'),
(138, 20, 'Halmahera Barat'),
(139, 20, 'Halmahera Selatan'),
(140, 20, 'Halmahera Tengah'),
(141, 20, 'Halmahera Timur'),
(142, 20, 'Halmahera Utara'),
(143, 13, 'Hulu Sungai Selatan'),
(144, 13, 'Hulu Sungai Tengah'),
(145, 13, 'Hulu Sungai Utara'),
(146, 34, 'Humbang Hasundutan'),
(147, 26, 'Indragiri Hilir'),
(148, 26, 'Indragiri Hulu'),
(149, 9, 'Indramayu'),
(150, 24, 'Intan Jaya'),
(151, 6, 'Jakarta Barat'),
(152, 6, 'Jakarta Pusat'),
(153, 6, 'Jakarta Selatan'),
(154, 6, 'Jakarta Timur'),
(155, 6, 'Jakarta Utara'),
(156, 8, 'Jambi'),
(157, 24, 'Jayapura'),
(158, 24, 'Jayapura'),
(159, 24, 'Jayawijaya'),
(160, 11, 'Jember'),
(161, 1, 'Jembrana'),
(162, 28, 'Jeneponto'),
(163, 10, 'Jepara'),
(164, 11, 'Jombang'),
(165, 25, 'Kaimana'),
(166, 26, 'Kampar'),
(167, 14, 'Kapuas'),
(168, 12, 'Kapuas Hulu'),
(169, 10, 'Karanganyar'),
(170, 1, 'Karangasem'),
(171, 9, 'Karawang'),
(172, 17, 'Karimun'),
(173, 34, 'Karo'),
(174, 14, 'Katingan'),
(175, 4, 'Kaur'),
(176, 12, 'Kayong Utara'),
(177, 10, 'Kebumen'),
(178, 11, 'Kediri'),
(179, 11, 'Kediri'),
(180, 24, 'Keerom'),
(181, 10, 'Kendal'),
(182, 30, 'Kendari'),
(183, 4, 'Kepahiang'),
(184, 17, 'Kepulauan Anambas'),
(185, 19, 'Kepulauan Aru'),
(186, 32, 'Kepulauan Mentawai'),
(187, 26, 'Kepulauan Meranti'),
(188, 31, 'Kepulauan Sangihe'),
(189, 6, 'Kepulauan Seribu'),
(190, 31, 'Kepulauan Siau Tagulandang Biaro (Sitaro)'),
(191, 20, 'Kepulauan Sula'),
(192, 31, 'Kepulauan Talaud'),
(193, 24, 'Kepulauan Yapen (Yapen Waropen)'),
(194, 8, 'Kerinci'),
(195, 12, 'Ketapang'),
(196, 10, 'Klaten'),
(197, 1, 'Klungkung'),
(198, 30, 'Kolaka'),
(199, 30, 'Kolaka Utara'),
(200, 30, 'Konawe'),
(201, 30, 'Konawe Selatan'),
(202, 30, 'Konawe Utara'),
(203, 13, 'Kotabaru'),
(204, 31, 'Kotamobagu'),
(205, 14, 'Kotawaringin Barat'),
(206, 14, 'Kotawaringin Timur'),
(207, 26, 'Kuantan Singingi'),
(208, 12, 'Kubu Raya'),
(209, 10, 'Kudus'),
(210, 5, 'Kulon Progo'),
(211, 9, 'Kuningan'),
(212, 23, 'Kupang'),
(213, 23, 'Kupang'),
(214, 15, 'Kutai Barat'),
(215, 15, 'Kutai Kartanegara'),
(216, 15, 'Kutai Timur'),
(217, 34, 'Labuhan Batu'),
(218, 34, 'Labuhan Batu Selatan'),
(219, 34, 'Labuhan Batu Utara'),
(220, 33, 'Lahat'),
(221, 14, 'Lamandau'),
(222, 11, 'Lamongan'),
(223, 18, 'Lampung Barat'),
(224, 18, 'Lampung Selatan'),
(225, 18, 'Lampung Tengah'),
(226, 18, 'Lampung Timur'),
(227, 18, 'Lampung Utara'),
(228, 12, 'Landak'),
(229, 34, 'Langkat'),
(230, 21, 'Langsa'),
(231, 24, 'Lanny Jaya'),
(232, 3, 'Lebak'),
(233, 4, 'Lebong'),
(234, 23, 'Lembata'),
(235, 21, 'Lhokseumawe'),
(236, 32, 'Lima Puluh Koto/Kota'),
(237, 17, 'Lingga'),
(238, 22, 'Lombok Barat'),
(239, 22, 'Lombok Tengah'),
(240, 22, 'Lombok Timur'),
(241, 22, 'Lombok Utara'),
(242, 33, 'Lubuk Linggau'),
(243, 11, 'Lumajang'),
(244, 28, 'Luwu'),
(245, 28, 'Luwu Timur'),
(246, 28, 'Luwu Utara'),
(247, 11, 'Madiun'),
(248, 11, 'Madiun'),
(249, 10, 'Magelang'),
(250, 10, 'Magelang'),
(251, 11, 'Magetan'),
(252, 9, 'Majalengka'),
(253, 27, 'Majene'),
(254, 28, 'Makassar'),
(255, 11, 'Malang'),
(256, 11, 'Malang'),
(257, 16, 'Malinau'),
(258, 19, 'Maluku Barat Daya'),
(259, 19, 'Maluku Tengah'),
(260, 19, 'Maluku Tenggara'),
(261, 19, 'Maluku Tenggara Barat'),
(262, 27, 'Mamasa'),
(263, 24, 'Mamberamo Raya'),
(264, 24, 'Mamberamo Tengah'),
(265, 27, 'Mamuju'),
(266, 27, 'Mamuju Utara'),
(267, 31, 'Manado'),
(268, 34, 'Mandailing Natal'),
(269, 23, 'Manggarai'),
(270, 23, 'Manggarai Barat'),
(271, 23, 'Manggarai Timur'),
(272, 25, 'Manokwari'),
(273, 25, 'Manokwari Selatan'),
(274, 24, 'Mappi'),
(275, 28, 'Maros'),
(276, 22, 'Mataram'),
(277, 25, 'Maybrat'),
(278, 34, 'Medan'),
(279, 12, 'Melawi'),
(280, 8, 'Merangin'),
(281, 24, 'Merauke'),
(282, 18, 'Mesuji'),
(283, 18, 'Metro'),
(284, 24, 'Mimika'),
(285, 31, 'Minahasa'),
(286, 31, 'Minahasa Selatan'),
(287, 31, 'Minahasa Tenggara'),
(288, 31, 'Minahasa Utara'),
(289, 11, 'Mojokerto'),
(290, 11, 'Mojokerto'),
(291, 29, 'Morowali'),
(292, 33, 'Muara Enim'),
(293, 8, 'Muaro Jambi'),
(294, 4, 'Muko Muko'),
(295, 30, 'Muna'),
(296, 14, 'Murung Raya'),
(297, 33, 'Musi Banyuasin'),
(298, 33, 'Musi Rawas'),
(299, 24, 'Nabire'),
(300, 21, 'Nagan Raya'),
(301, 23, 'Nagekeo'),
(302, 17, 'Natuna'),
(303, 24, 'Nduga'),
(304, 23, 'Ngada'),
(305, 11, 'Nganjuk'),
(306, 11, 'Ngawi'),
(307, 34, 'Nias'),
(308, 34, 'Nias Barat'),
(309, 34, 'Nias Selatan'),
(310, 34, 'Nias Utara'),
(311, 16, 'Nunukan'),
(312, 33, 'Ogan Ilir'),
(313, 33, 'Ogan Komering Ilir'),
(314, 33, 'Ogan Komering Ulu'),
(315, 33, 'Ogan Komering Ulu Selatan'),
(316, 33, 'Ogan Komering Ulu Timur'),
(317, 11, 'Pacitan'),
(318, 32, 'Padang'),
(319, 34, 'Padang Lawas'),
(320, 34, 'Padang Lawas Utara'),
(321, 32, 'Padang Panjang'),
(322, 32, 'Padang Pariaman'),
(323, 34, 'Padang Sidempuan'),
(324, 33, 'Pagar Alam'),
(325, 34, 'Pakpak Bharat'),
(326, 14, 'Palangka Raya'),
(327, 33, 'Palembang'),
(328, 28, 'Palopo'),
(329, 29, 'Palu'),
(330, 11, 'Pamekasan'),
(331, 3, 'Pandeglang'),
(332, 9, 'Pangandaran'),
(333, 28, 'Pangkajene Kepulauan'),
(334, 2, 'Pangkal Pinang'),
(335, 24, 'Paniai'),
(336, 28, 'Parepare'),
(337, 32, 'Pariaman'),
(338, 29, 'Parigi Moutong'),
(339, 32, 'Pasaman'),
(340, 32, 'Pasaman Barat'),
(341, 15, 'Paser'),
(342, 11, 'Pasuruan'),
(343, 11, 'Pasuruan'),
(344, 10, 'Pati'),
(345, 32, 'Payakumbuh'),
(346, 25, 'Pegunungan Arfak'),
(347, 24, 'Pegunungan Bintang'),
(348, 10, 'Pekalongan'),
(349, 10, 'Pekalongan'),
(350, 26, 'Pekanbaru'),
(351, 26, 'Pelalawan'),
(352, 10, 'Pemalang'),
(353, 34, 'Pematang Siantar'),
(354, 15, 'Penajam Paser Utara'),
(355, 18, 'Pesawaran'),
(356, 18, 'Pesisir Barat'),
(357, 32, 'Pesisir Selatan'),
(358, 21, 'Pidie'),
(359, 21, 'Pidie Jaya'),
(360, 28, 'Pinrang'),
(361, 7, 'Pohuwato'),
(362, 27, 'Polewali Mandar'),
(363, 11, 'Ponorogo'),
(364, 12, 'Pontianak'),
(365, 12, 'Pontianak'),
(366, 29, 'Poso'),
(367, 33, 'Prabumulih'),
(368, 18, 'Pringsewu'),
(369, 11, 'Probolinggo'),
(370, 11, 'Probolinggo'),
(371, 14, 'Pulang Pisau'),
(372, 20, 'Pulau Morotai'),
(373, 24, 'Puncak'),
(374, 24, 'Puncak Jaya'),
(375, 10, 'Purbalingga'),
(376, 9, 'Purwakarta'),
(377, 10, 'Purworejo'),
(378, 25, 'Raja Ampat'),
(379, 4, 'Rejang Lebong'),
(380, 10, 'Rembang'),
(381, 26, 'Rokan Hilir'),
(382, 26, 'Rokan Hulu'),
(383, 23, 'Rote Ndao'),
(384, 21, 'Sabang'),
(385, 23, 'Sabu Raijua'),
(386, 10, 'Salatiga'),
(387, 15, 'Samarinda'),
(388, 12, 'Sambas'),
(389, 34, 'Samosir'),
(390, 11, 'Sampang'),
(391, 12, 'Sanggau'),
(392, 24, 'Sarmi'),
(393, 8, 'Sarolangun'),
(394, 32, 'Sawah Lunto'),
(395, 12, 'Sekadau'),
(396, 28, 'Selayar (Kepulauan Selayar)'),
(397, 4, 'Seluma'),
(398, 10, 'Semarang'),
(399, 10, 'Semarang'),
(400, 19, 'Seram Bagian Barat'),
(401, 19, 'Seram Bagian Timur'),
(402, 3, 'Serang'),
(403, 3, 'Serang'),
(404, 34, 'Serdang Bedagai'),
(405, 14, 'Seruyan'),
(406, 26, 'Siak'),
(407, 34, 'Sibolga'),
(408, 28, 'Sidenreng Rappang/Rapang'),
(409, 11, 'Sidoarjo'),
(410, 29, 'Sigi'),
(411, 32, 'Sijunjung (Sawah Lunto Sijunjung)'),
(412, 23, 'Sikka'),
(413, 34, 'Simalungun'),
(414, 21, 'Simeulue'),
(415, 12, 'Singkawang'),
(416, 28, 'Sinjai'),
(417, 12, 'Sintang'),
(418, 11, 'Situbondo'),
(419, 5, 'Sleman'),
(420, 32, 'Solok'),
(421, 32, 'Solok'),
(422, 32, 'Solok Selatan'),
(423, 28, 'Soppeng'),
(424, 25, 'Sorong'),
(425, 25, 'Sorong'),
(426, 25, 'Sorong Selatan'),
(427, 10, 'Sragen'),
(428, 9, 'Subang'),
(429, 21, 'Subulussalam'),
(430, 9, 'Sukabumi'),
(431, 9, 'Sukabumi'),
(432, 14, 'Sukamara'),
(433, 10, 'Sukoharjo'),
(434, 23, 'Sumba Barat'),
(435, 23, 'Sumba Barat Daya'),
(436, 23, 'Sumba Tengah'),
(437, 23, 'Sumba Timur'),
(438, 22, 'Sumbawa'),
(439, 22, 'Sumbawa Barat'),
(440, 9, 'Sumedang'),
(441, 11, 'Sumenep'),
(442, 8, 'Sungaipenuh'),
(443, 24, 'Supiori'),
(444, 11, 'Surabaya'),
(445, 10, 'Surakarta (Solo)'),
(446, 13, 'Tabalong'),
(447, 1, 'Tabanan'),
(448, 28, 'Takalar'),
(449, 25, 'Tambrauw'),
(450, 16, 'Tana Tidung'),
(451, 28, 'Tana Toraja'),
(452, 13, 'Tanah Bumbu'),
(453, 32, 'Tanah Datar'),
(454, 13, 'Tanah Laut'),
(455, 3, 'Tangerang'),
(456, 3, 'Tangerang'),
(457, 3, 'Tangerang Selatan'),
(458, 18, 'Tanggamus'),
(459, 34, 'Tanjung Balai'),
(460, 8, 'Tanjung Jabung Barat'),
(461, 8, 'Tanjung Jabung Timur'),
(462, 17, 'Tanjung Pinang'),
(463, 34, 'Tapanuli Selatan'),
(464, 34, 'Tapanuli Tengah'),
(465, 34, 'Tapanuli Utara'),
(466, 13, 'Tapin'),
(467, 16, 'Tarakan'),
(468, 9, 'Tasikmalaya'),
(469, 9, 'Tasikmalaya'),
(470, 34, 'Tebing Tinggi'),
(471, 8, 'Tebo'),
(472, 10, 'Tegal'),
(473, 10, 'Tegal'),
(474, 25, 'Teluk Bintuni'),
(475, 25, 'Teluk Wondama'),
(476, 10, 'Temanggung'),
(477, 20, 'Ternate'),
(478, 20, 'Tidore Kepulauan'),
(479, 23, 'Timor Tengah Selatan'),
(480, 23, 'Timor Tengah Utara'),
(481, 34, 'Toba Samosir'),
(482, 29, 'Tojo Una-Una'),
(483, 29, 'Toli-Toli'),
(484, 24, 'Tolikara'),
(485, 31, 'Tomohon'),
(486, 28, 'Toraja Utara'),
(487, 11, 'Trenggalek'),
(488, 19, 'Tual'),
(489, 11, 'Tuban'),
(490, 18, 'Tulang Bawang'),
(491, 18, 'Tulang Bawang Barat'),
(492, 11, 'Tulungagung'),
(493, 28, 'Wajo'),
(494, 30, 'Wakatobi'),
(495, 24, 'Waropen'),
(496, 18, 'Way Kanan'),
(497, 10, 'Wonogiri'),
(498, 10, 'Wonosobo'),
(499, 24, 'Yahukimo'),
(500, 24, 'Yalimo'),
(501, 5, 'Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `id_lapangan` int(11) NOT NULL,
  `id_sycPlat` int(11) DEFAULT NULL,
  `id_cabor` int(11) DEFAULT NULL,
  `nama_lapangan` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` text NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(50) NOT NULL,
  `modified_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`id_lapangan`, `id_sycPlat`, `id_cabor`, `nama_lapangan`, `harga`, `foto`, `created_by`, `created_at`, `modified_by`, `modified_at`) VALUES
(1, 1, 1, 'Lapangan A1', 200, 'lapangan-a20180610164236.jpg', 'superadmin', '2018-06-10 15:37:43', 'superadmin', '2024-02-01 19:06:28'),
(7, 1, 2, 'Basket B', 0, 'lapangan-b20240202145629.jpg', 'superadmin', '2024-01-10 08:16:12', 'superadmin', '2024-02-02 07:56:44'),
(8, 1, 1, 'Lapangan C1', 0, 'lapangan-c20240110151635.jpg', 'superadmin', '2024-01-10 08:16:35', 'superadmin', '2024-02-02 07:48:58'),
(9, 1, 2, 'Basket A', 0, 'basket-a20240202145533.jpg', 'superadmin', '2024-02-02 07:49:43', 'superadmin', '2024-02-02 07:55:35'),
(11, 1, 1, 'Lapangan Test', 0, 'lapangan-test20240222095350.jpeg', 'superadmin', '2024-02-22 02:53:50', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `login` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `time` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(20, '2001:448a:3070:', 'tedyysyyach123@gmail.com', 1708566433);

-- --------------------------------------------------------

--
-- Table structure for table `member_premium_request`
--

CREATE TABLE `member_premium_request` (
  `id_rm` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `fotoKtp` varchar(225) DEFAULT NULL,
  `status` enum('0','1','2','3') NOT NULL DEFAULT '0',
  `ket` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_premium_request`
--

INSERT INTO `member_premium_request` (`id_rm`, `id_user`, `fotoKtp`, `status`, `ket`, `created`, `updated`) VALUES
(1, 5, 'default.svg', '1', '-', '2024-01-26 12:45:27', '2024-02-06 17:34:23'),
(2, 21, 'membership.png', '2', '-', '2024-01-27 15:50:43', '2024-02-06 17:13:19'),
(3, 24, 'fg.png', '0', '-', '2024-01-29 12:03:25', '2024-02-06 17:11:49');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id_page` int(11) NOT NULL,
  `judul_page` varchar(50) NOT NULL,
  `judul_seo` varchar(50) NOT NULL,
  `isi_page` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id_page`, `judul_page`, `judul_seo`, `isi_page`, `gambar`) VALUES
(1, 'Home', 'home', '', ''),
(2, 'Download', 'download', 'download', ''),
(3, 'Kontak', 'kontak', '<p style=\"text-align: center;\">&nbsp;<img src=\"http://localhost/tol/assets/images/upload/whatsapp.png\" /><br /><strong>SMS/ Call/ Whatsapp</strong></p>\r\n<p style=\"text-align: center;\">0853-6873-3631</p>\r\n<p style=\"text-align: center;\">0822-8155-1666</p>', ''),
(4, 'Profil', 'profil', '<p style=\"text-align: justify;\">Kami merupakan toko yang menyediakan berbagai macam parfum, obat-obatan herbal, baju koko, dan aksesoris muslim lainnya. Toko kami beralamat di Jl. Dr. M. Isa No.1109, Kuto Batu, Ilir Tim. II, Kota Palembang, Sumatera Selatan 30114.</p>\r\n<p style=\"text-align: justify;\">Berikut adalah foto toko kami:</p>', ''),
(5, 'Order', 'order', '<p>Anda dapat menghubungi&nbsp;kami melalui tombol order via whatsapp di masing-masing produk atau melalui customer service/ kontak yang telah disediakan di sisi kanan website ini</p>', '');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `nama_provinsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(1, 'Bali'),
(2, 'Bangka Belitung'),
(3, 'Banten'),
(4, 'Bengkulu'),
(5, 'DI Yogyakarta'),
(6, 'DKI Jakarta'),
(7, 'Gorontalo'),
(8, 'Jambi'),
(9, 'Jawa Barat'),
(10, 'Jawa Tengah'),
(11, 'Jawa Timur'),
(12, 'Kalimantan Barat'),
(13, 'Kalimantan Selatan'),
(14, 'Kalimantan Tengah'),
(15, 'Kalimantan Timur'),
(16, 'Kalimantan Utara'),
(17, 'Kepulauan Riau'),
(18, 'Lampung'),
(19, 'Maluku'),
(20, 'Maluku Utara'),
(21, 'Nanggroe Aceh Darussalam (NAD)'),
(22, 'Nusa Tenggara Barat (NTB)'),
(23, 'Nusa Tenggara Timur (NTT)'),
(24, 'Papua'),
(25, 'Papua Barat'),
(26, 'Riau'),
(27, 'Sulawesi Barat'),
(28, 'Sulawesi Selatan'),
(29, 'Sulawesi Tengah'),
(30, 'Sulawesi Tenggara'),
(31, 'Sulawesi Utara'),
(32, 'Sumatera Barat'),
(33, 'Sumatera Selatan'),
(34, 'Sumatera Utara');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `nama_slider` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `foto` text NOT NULL,
  `foto_type` char(10) NOT NULL,
  `foto_size` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` char(50) NOT NULL,
  `modified_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `modified_by` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `no_urut`, `nama_slider`, `link`, `foto`, `foto_type`, `foto_size`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(2, 1, 'Slider 1', '#', '120240116134850', '.png', 833, '2017-11-25 08:05:03', '', '2024-01-16 06:48:50', 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `id_subscriber` int(11) NOT NULL,
  `email` char(20) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `synchronization_plat`
--

CREATE TABLE `synchronization_plat` (
  `id_syc` int(11) NOT NULL,
  `id_merchat_upos` int(11) DEFAULT NULL,
  `id_organize_daftarin` int(11) DEFAULT NULL,
  `apiKeyMasterWeb` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `synchronization_plat`
--

INSERT INTO `synchronization_plat` (`id_syc`, `id_merchat_upos`, `id_organize_daftarin`, `apiKeyMasterWeb`) VALUES
(1, 5, 1, 'fdsfsdf34343'),
(2, 3, 2, 'fdr433434');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_trans` int(11) NOT NULL,
  `id_sycPlat` int(11) DEFAULT NULL,
  `tipe_trx` int(11) NOT NULL DEFAULT 1,
  `payment_type` varchar(225) DEFAULT NULL,
  `company_code` varchar(225) DEFAULT NULL,
  `bank_transfer` varchar(225) DEFAULT NULL,
  `va` varchar(125) DEFAULT NULL,
  `id_invoice` char(15) NOT NULL,
  `ip_addres` char(225) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `diskonPersen` int(11) DEFAULT NULL,
  `diskon` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `deadline` datetime NOT NULL,
  `catatan` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_trans`, `id_sycPlat`, `tipe_trx`, `payment_type`, `company_code`, `bank_transfer`, `va`, `id_invoice`, `ip_addres`, `user_id`, `subtotal`, `diskonPersen`, `diskon`, `grand_total`, `deadline`, `catatan`, `status`, `created_date`, `created_time`) VALUES
(1, 1, 1, NULL, NULL, NULL, NULL, 'J-240117-0001', '2001:448a:3070:1057:a5c7:1e19:8b1a:3889', 5, 100, NULL, 0, 100, '2024-01-17 11:28:04', '', 1, '2024-01-17', '10:28:04'),
(2, 1, 2, NULL, NULL, NULL, NULL, 'J-240117-0002', '2001:448a:3070:1057:a5c7:1e19:8b1a:3889', 8, 10000, NULL, 0, 10000, '2024-01-17 11:40:31', '', 4, '2024-01-17', '10:40:31'),
(3, 1, 1, NULL, NULL, NULL, NULL, 'J-240117-0003', '2001:448a:3070:1057:a5c7:1e19:8b1a:3889', 5, 100, NULL, 0, 100, '2024-01-17 11:31:46', '', 1, '2024-01-17', '10:31:46'),
(4, 1, 1, NULL, NULL, NULL, NULL, 'J-240117-0004', '2001:448a:3070:1057:a5c7:1e19:8b1a:3889', 5, 100, NULL, 0, 100, '2024-01-17 11:37:58', '', 2, '2024-01-17', '10:37:58'),
(5, 1, 2, NULL, NULL, NULL, NULL, 'J-240117-0005', '2001:448a:3070:1057:a5c7:1e19:8b1a:3889', 8, 100, NULL, 0, 100, '2024-01-17 12:08:07', '', 2, '2024-01-17', '11:08:07'),
(6, 1, 2, NULL, NULL, NULL, NULL, 'J-240117-0006', '2001:448a:3070:1057:a5c7:1e19:8b1a:3889', 10, 100, NULL, 0, 100, '2024-01-18 19:55:04', '', 2, '2024-01-17', '18:55:04'),
(7, 1, 2, NULL, NULL, NULL, NULL, 'J-240117-0007', '2001:448a:302c:3b2d:29d2:2981:32c7:8417', 14, 200, NULL, 0, 200, '2024-01-17 14:19:14', '', 2, '2024-01-17', '13:19:14'),
(8, NULL, 1, NULL, NULL, NULL, NULL, 'J-240117-0008', '2001:448a:302c:3b2d:29d2:2981:32c7:8417', 13, 0, NULL, 0, 0, '0000-00-00 00:00:00', '', 0, '2024-01-17', '14:18:26'),
(9, NULL, 1, NULL, NULL, NULL, NULL, 'J-240117-0009', '2001:448a:302c:3b2d:29d2:2981:32c7:8417', 1, 0, NULL, 0, 0, '0000-00-00 00:00:00', '', 0, '2024-01-17', '14:19:06'),
(10, NULL, 1, NULL, NULL, NULL, NULL, 'J-240117-0010', '2001:448a:302c:3b2d:29d2:2981:32c7:8417', 0, 0, NULL, 0, 0, '0000-00-00 00:00:00', '', 0, '2024-01-17', '14:21:16'),
(11, NULL, 1, NULL, NULL, NULL, NULL, 'J-240118-0011', '140.213.104.79', 0, 0, NULL, 0, 0, '0000-00-00 00:00:00', '', 0, '2024-01-18', '05:52:42'),
(12, NULL, 1, NULL, NULL, NULL, NULL, 'J-240118-0012', '112.215.238.201', 0, 0, NULL, 0, 0, '0000-00-00 00:00:00', '', 0, '2024-01-18', '14:52:07'),
(13, NULL, 1, NULL, NULL, NULL, NULL, 'J-240118-0013', '140.213.104.239', 0, 0, NULL, 0, 0, '0000-00-00 00:00:00', '', 0, '2024-01-18', '14:57:31'),
(14, NULL, 1, NULL, NULL, NULL, NULL, 'J-240118-0014', '182.0.168.231', 0, 0, NULL, 0, 0, '0000-00-00 00:00:00', '', 0, '2024-01-18', '15:21:29'),
(15, 1, 2, NULL, NULL, NULL, NULL, 'J-240118-0015', '140.213.104.239', 5, 100, NULL, 0, 100, '2024-01-18 17:04:54', '', 3, '2024-01-18', '16:04:54'),
(16, 1, 2, NULL, NULL, NULL, NULL, 'J-240118-0016', '182.0.168.231', 8, 20000, NULL, 0, 20000, '2024-01-18 16:34:43', '', 2, '2024-01-18', '15:34:43'),
(17, NULL, 1, NULL, NULL, NULL, NULL, 'J-240118-0017', '182.0.168.231', 1, 0, NULL, 0, 0, '0000-00-00 00:00:00', '', 0, '2024-01-18', '15:48:32'),
(18, NULL, 1, NULL, NULL, NULL, NULL, 'J-240118-0018', '2001:448a:3070:1057:9321:970:be15:75d7', 0, 0, NULL, 0, 0, '0000-00-00 00:00:00', '', 0, '2024-01-18', '17:39:00'),
(19, 1, 1, NULL, NULL, NULL, NULL, 'J-240118-0019', '2001:448a:3070:1057:9321:970:be15:75d7', 5, 100, NULL, 0, 100, '2024-01-18 18:40:10', '', 1, '2024-01-18', '17:40:10'),
(20, NULL, 1, NULL, NULL, NULL, NULL, 'J-240118-0020', '2400:9800:1f0:1219:9442:e5ff:fe09:c61d', 0, 0, NULL, 0, 0, '0000-00-00 00:00:00', '', 0, '2024-01-18', '17:41:56'),
(21, 1, 2, NULL, NULL, NULL, NULL, 'J-240118-0021', '2001:448a:3070:1057:9833:2183:a89f:270a', 5, 100, NULL, 0, 100, '2024-01-18 20:40:09', '', 4, '2024-01-18', '19:40:09'),
(22, 1, 2, NULL, NULL, NULL, NULL, 'J-240118-0022', '2001:448a:3070:1057:9833:2183:a89f:270a', 10, 100, NULL, 0, 100, '2024-01-18 20:17:54', '', 4, '2024-01-18', '19:17:54'),
(23, NULL, 1, NULL, NULL, NULL, NULL, 'J-240118-0023', '140.213.37.154', 0, 0, NULL, 0, 0, '0000-00-00 00:00:00', '', 0, '2024-01-18', '19:38:17'),
(24, 1, 1, NULL, NULL, NULL, NULL, 'J-240118-0024', '140.213.37.154', 5, 100, NULL, 0, 100, '2024-01-18 20:45:40', '', 1, '2024-01-18', '19:45:40'),
(25, 1, 1, NULL, NULL, NULL, NULL, 'J-240118-0025', '140.213.37.154', 5, 100, NULL, 0, 100, '2024-01-18 20:49:21', '', 2, '2024-01-18', '19:49:21'),
(26, NULL, 1, NULL, NULL, NULL, NULL, 'J-240119-0026', '2001:448a:3070:1057:2c7a:2c66:a6be:a9df', 0, 0, NULL, 0, 0, '0000-00-00 00:00:00', '', 0, '2024-01-19', '13:20:01'),
(27, NULL, 1, NULL, NULL, NULL, NULL, 'J-240120-0027', '::1', 0, 0, NULL, 0, 0, '0000-00-00 00:00:00', '', 0, '2024-01-20', '16:56:54'),
(28, 1, 1, NULL, NULL, NULL, NULL, 'J-240120-0028', '::1', 5, 200, NULL, 0, 200, '2024-01-20 19:11:35', '', 1, '2024-01-20', '18:11:35'),
(29, 1, 1, NULL, NULL, NULL, NULL, 'J-240120-0029', '::1', 5, 200, NULL, 0, 200, '2024-01-20 19:22:57', '', 1, '2024-01-20', '18:22:57'),
(30, 1, 1, NULL, NULL, NULL, NULL, 'J-240120-0030', '::1', 5, 200, NULL, 0, 200, '2024-01-20 19:34:10', '', 1, '2024-01-20', '18:34:10'),
(31, 1, 1, NULL, NULL, NULL, NULL, 'J-240120-0031', '::1', 5, 200, NULL, 0, 200, '2024-01-20 19:42:52', '', 1, '2024-01-20', '18:42:52'),
(32, 1, 1, NULL, NULL, NULL, NULL, 'J-240120-0032', '::1', 5, 200, NULL, 0, 200, '2024-01-20 19:52:10', '', 1, '2024-01-20', '18:52:10'),
(33, 1, 1, NULL, NULL, NULL, NULL, 'J-240120-0033', '::1', 5, 200, NULL, 0, 200, '2024-01-20 20:11:40', '', 1, '2024-01-20', '19:32:00'),
(34, 1, 1, NULL, NULL, NULL, NULL, 'J-240120-0034', '::1', 5, 200, NULL, 0, 200, '2024-01-20 20:34:15', '', 1, '2024-01-20', '19:34:15'),
(35, 1, 1, NULL, NULL, NULL, NULL, 'J-240120-0035', '::1', 5, 200, NULL, 0, 200, '2024-01-20 20:37:57', '', 1, '2024-01-20', '19:37:57'),
(36, 1, 1, NULL, NULL, NULL, NULL, 'J-240120-0036', '::1', 5, 200, NULL, 0, 200, '2024-01-21 01:19:50', '', 1, '2024-01-20', '00:19:50'),
(37, 1, 1, NULL, NULL, NULL, NULL, 'J-240121-0037', '::1', 5, 400, NULL, 0, 400, '2024-01-22 18:58:33', '', 2, '2024-01-21', '17:58:33'),
(38, 1, 1, NULL, NULL, NULL, NULL, 'J-240123-0038', '::1', 5, 400, NULL, 0, 400, '2024-01-23 12:09:03', '', 2, '2024-01-23', '11:09:03'),
(39, 1, 1, NULL, NULL, NULL, NULL, 'J-240124-0039', '::1', 5, 200, NULL, 0, 200, '2024-01-24 13:06:17', '', 1, '2024-01-24', '12:06:17'),
(40, 1, 1, NULL, NULL, NULL, NULL, 'J-240124-0040', '::1', 5, 200, NULL, 0, 200, '2024-01-24 13:09:36', '', 1, '2024-01-24', '12:09:36'),
(42, NULL, 1, NULL, NULL, NULL, NULL, 'J-240124-0042', '2001:448a:3020:291f:1007:1132:ecd2:99d0', 3, 0, NULL, 0, 0, '0000-00-00 00:00:00', '', 0, '2024-01-24', '12:44:11'),
(43, 1, 1, NULL, NULL, NULL, NULL, 'J-240124-0043', '2001:448a:3020:291f:1007:1132:ecd2:99d0', 1, 100, NULL, 0, 100, '2024-01-24 13:55:48', '', 1, '2024-01-24', '12:55:48'),
(44, 1, 1, NULL, NULL, NULL, NULL, 'J-240124-0044', '2001:448a:3070:1d24:abec:8233:72f6:c28a', 5, 100, NULL, 0, 100, '2024-01-24 14:05:39', '', 1, '2024-01-24', '13:05:39'),
(45, 1, 1, NULL, NULL, NULL, NULL, 'J-240124-0045', '2001:448a:3070:1d24:abec:8233:72f6:c28a', 5, 100, NULL, 0, 100, '2024-01-24 14:06:08', '', 2, '2024-01-24', '13:06:08'),
(46, 1, 1, NULL, NULL, NULL, NULL, 'J-240124-0046', '2001:448a:3070:1d24:abec:8233:72f6:c28a', 5, 100, NULL, 0, 100, '2024-01-24 14:07:56', '', 1, '2024-01-24', '13:07:56'),
(47, 1, 1, NULL, NULL, NULL, NULL, 'K-240124-0047', '2001:448a:3070:1d24:abec:8233:72f6:c28a', 5, 100, NULL, 0, 100, '2024-01-24 14:25:05', '', 1, '2024-01-24', '13:25:05'),
(48, 1, 1, NULL, NULL, NULL, NULL, 'K-240124-0048', '2001:448a:3070:1d24:abec:8233:72f6:c28a', 5, 100, NULL, 0, 100, '2024-01-24 14:47:37', '', 2, '2024-01-24', '13:47:37'),
(49, 1, 2, NULL, NULL, NULL, NULL, 'K-240125-0049', '2001:448a:3070:1d24:f11e:da04:6e30:6f63', 5, 300, NULL, 0, 300, '2024-01-25 03:51:33', '', 2, '2024-01-25', '02:51:33'),
(50, 1, 2, NULL, NULL, NULL, NULL, 'K-240125-0050', '2001:448a:3070:1d24:f11e:da04:6e30:6f63', 5, 100, NULL, 0, 100, '2024-01-25 04:55:17', '', 4, '2024-01-25', '03:55:17'),
(51, 1, 2, NULL, NULL, NULL, NULL, 'K-240125-0051', '2001:448a:3070:1d24:f11e:da04:6e30:6f63', 5, 100, NULL, 0, 100, '2024-01-25 04:56:58', '', 2, '2024-01-25', '03:56:58'),
(52, 1, 1, NULL, NULL, NULL, NULL, 'L-240126-0052', '2001:448a:3070:1d24:f10c:be19:21fc:ed25', 18, 100, NULL, 0, 100, '2024-01-26 02:17:05', '', 1, '2024-01-26', '01:17:05'),
(53, 1, 1, NULL, NULL, NULL, NULL, 'L-240126-0053', '2001:448a:3070:1d24:f10c:be19:21fc:ed25', 5, 100, NULL, 0, 100, '2024-01-26 02:32:11', '', 1, '2024-01-26', '01:32:11'),
(54, 1, 1, NULL, NULL, NULL, NULL, 'L-240126-0054', '2001:448a:3070:1d24:f10c:be19:21fc:ed25', 5, 100, NULL, 0, 100, '2024-01-26 02:35:44', '', 1, '2024-01-26', '01:35:44'),
(55, 1, 1, NULL, NULL, NULL, NULL, 'L-240126-0055', '2001:448a:3070:1d24:f10c:be19:21fc:ed25', 19, 150, NULL, 0, 150, '2024-01-26 02:41:40', '', 1, '2024-01-26', '01:48:40'),
(56, 1, 1, NULL, NULL, NULL, NULL, 'L-240126-0056', '2001:448a:3070:1d24:f10c:be19:21fc:ed25', 5, 150, NULL, 0, 150, '2024-01-26 02:56:55', '', 1, '2024-01-26', '01:56:55'),
(57, 1, 2, NULL, NULL, NULL, NULL, 'L-240126-0057', '2001:448a:3070:1d24:f10c:be19:21fc:ed25', 5, 100, NULL, 0, 100, '2024-01-26 03:02:28', '', 1, '2024-01-26', '02:02:28'),
(58, 1, 2, NULL, NULL, NULL, NULL, 'L-240126-0058', '2001:448a:3070:1d24:f10c:be19:21fc:ed25', 5, 100, NULL, 0, 100, '2024-01-26 03:03:25', '', 1, '2024-01-26', '02:03:25'),
(59, 1, 1, NULL, NULL, NULL, NULL, 'L-240126-0059', '2001:448a:3070:1d24:f10c:be19:21fc:ed25', 5, 100, NULL, 0, 100, '2024-01-26 03:04:43', '', 1, '2024-01-26', '02:04:43'),
(60, 1, 1, NULL, NULL, NULL, NULL, 'L-240126-0060', '2001:448a:3070:1d24:9914:c318:cbec:dab4', 20, 100, NULL, 0, 100, '2024-01-26 03:39:25', '', 3, '2024-01-26', '02:39:25'),
(61, 1, 1, NULL, NULL, NULL, NULL, 'L-240126-0061', '2001:448a:3070:1d24:9914:c318:cbec:dab4', 5, 100, NULL, 0, 100, '2024-01-26 05:38:09', '', 1, '2024-01-26', '04:38:09'),
(62, 1, 1, NULL, NULL, NULL, NULL, 'L-240129-0062', '2001:448a:3070:1d3d:6ca8:f03c:ee5f:8594', 22, 200, NULL, 0, 200, '2024-01-29 12:57:11', '', 2, '2024-01-29', '11:57:11'),
(66, 1, 1, NULL, NULL, NULL, NULL, 'L-240130-0066', '2001:448a:3070:4e1f:51e0:c40e:b51b:f9c0', 27, 100, NULL, 0, 100, '2024-01-30 23:25:22', '', 2, '2024-01-30', '22:25:22'),
(67, 1, 1, NULL, NULL, NULL, NULL, 'L-240130-0067', '2001:448a:3070:4e1f:51e0:c40e:b51b:f9c0', 5, 100, NULL, 0, 100, '2024-01-30 23:28:24', '', 1, '2024-01-30', '22:28:24'),
(68, 1, 1, NULL, NULL, NULL, NULL, 'L-240131-0068', '2001:448a:3070:4e1f:35e9:2a70:c51b:c3cb', 28, 100, NULL, 0, 100, '2024-01-31 15:34:53', '', 1, '2024-01-31', '14:34:53'),
(69, 1, 1, NULL, NULL, NULL, NULL, 'L-240131-0069', '2001:448a:3070:4e1f:35e9:2a70:c51b:c3cb', 29, 200, NULL, 0, 200, '2024-01-31 15:41:34', '', 1, '2024-01-31', '14:41:34'),
(70, 1, 1, NULL, NULL, NULL, NULL, 'L-240131-0070', '140.213.43.75', 5, 1000000, NULL, 0, 1000000, '2024-01-31 17:31:12', '', 1, '2024-01-31', '16:31:12'),
(71, 1, 1, NULL, NULL, NULL, NULL, 'L-240131-0071', '2001:448a:3070:4e1f:35e9:2a70:c51b:c3cb', 30, 1000, NULL, 0, 1000, '2024-01-31 17:39:58', '', 1, '2024-01-31', '16:39:58'),
(72, 1, 1, NULL, NULL, NULL, NULL, 'L-240131-0072', '2001:448a:3070:4e1f:25e9:3f65:ccf:5639', 5, 1000500, NULL, 0, 1000500, '2024-01-31 17:45:37', '', 1, '2024-01-31', '16:45:37'),
(73, 1, 1, NULL, NULL, NULL, NULL, 'L-240131-0073', '140.213.43.75', 5, 1000200, NULL, 0, 1000200, '2024-01-31 18:18:04', '', 1, '2024-01-31', '17:18:04'),
(74, 1, 1, NULL, NULL, NULL, NULL, 'L-240201-0001', '2001:448a:3070:37d4:9b5e:f1c3:1e1:e613', 31, 200, NULL, 0, 200, '2024-02-01 08:45:51', '', 1, '2024-02-01', '07:45:51'),
(75, 1, 1, NULL, NULL, NULL, NULL, 'L-240201-0002', '2001:448a:3070:37d4:a94e:6fc3:200e:9a9c', 5, 1000150, NULL, 0, 1000150, '2024-02-01 16:34:33', '', 1, '2024-02-01', '15:34:33'),
(76, 1, 1, NULL, NULL, NULL, NULL, 'L-240201-0003', '2001:448a:3070:37d4:a94e:6fc3:200e:9a9c', 5, 1000650, NULL, 0, 1000650, '2024-02-01 16:39:15', '', 1, '2024-02-01', '15:39:15'),
(77, 1, 1, NULL, NULL, NULL, NULL, 'L-240201-0004', '2001:448a:3070:37d4:2c80:60fa:6b48:7605', 5, 1000650, NULL, 0, 1000650, '2024-02-01 16:43:09', '', 1, '2024-02-01', '15:43:09'),
(78, 1, 1, NULL, NULL, NULL, NULL, 'L-240201-0005', '2001:448a:3070:37d4:bc06:1c15:e436:ff', 32, 1000, NULL, 0, 1000, '2024-02-01 16:52:55', '', 1, '2024-02-01', '15:52:55'),
(79, 1, 1, NULL, NULL, NULL, NULL, 'L-240201-0006', '2001:448a:3070:37d4:407f:371e:4b24:7484', 33, 400, NULL, 0, 400, '2024-02-01 16:54:07', '', 1, '2024-02-01', '15:54:07'),
(80, 1, 1, NULL, NULL, NULL, NULL, 'L-240201-0007', '2001:448a:3070:37d4:a94e:6fc3:200e:9a9c', 5, 1000650, NULL, 0, 1000650, '2024-02-01 17:09:18', '', 1, '2024-02-01', '16:09:18'),
(81, 1, 1, NULL, NULL, NULL, NULL, 'L-240201-0008', '2001:448a:3070:37d4:2c80:60fa:6b48:7605', 5, 2000150, NULL, 0, 2000150, '2024-02-01 17:12:33', '', 1, '2024-02-01', '16:12:33'),
(82, 1, 1, NULL, NULL, NULL, NULL, 'L-240201-0009', '2001:448a:3070:37d4:2c80:60fa:6b48:7605', 5, 2000000, NULL, 0, 2000000, '2024-02-01 17:19:49', '', 1, '2024-02-01', '16:19:49'),
(83, 1, 1, NULL, NULL, NULL, NULL, 'L-240201-0010', '2001:448a:3070:37d4:2c80:60fa:6b48:7605', 5, 2000500, NULL, 0, 2000500, '2024-02-01 17:28:02', '', 1, '2024-02-01', '16:28:02'),
(84, 1, 1, NULL, NULL, NULL, NULL, 'L-240201-0011', '2001:448a:3070:37d4:a94e:6fc3:200e:9a9c', 5, 1000300, NULL, 0, 1000300, '2024-02-01 17:29:23', '', 1, '2024-02-01', '16:29:23'),
(85, 1, 1, NULL, NULL, NULL, NULL, 'L-240201-0012', '2001:448a:3070:37d4:bc06:1c15:e436:ff', 34, 1000, NULL, 0, 1000, '2024-02-01 17:34:30', '', 1, '2024-02-01', '16:34:30'),
(86, 1, 1, NULL, NULL, NULL, NULL, 'L-240201-0013', '2001:448a:3070:37d4:a94e:6fc3:200e:9a9c', 5, 100, NULL, 0, 100, '2024-02-01 18:00:33', '', 2, '2024-02-01', '17:00:33'),
(87, 1, 1, NULL, NULL, NULL, NULL, 'L-240201-0014', '2001:448a:3070:37d4:2c80:60fa:6b48:7605', 5, 150, NULL, 0, 150, '2024-02-01 18:08:33', '', 2, '2024-02-01', '17:08:33'),
(88, 1, 1, NULL, NULL, NULL, NULL, 'L-240201-0015', '2001:448a:3070:37d4:a94e:6fc3:200e:9a9c', 5, 100, NULL, 0, 100, '2024-02-01 19:16:29', '', 2, '2024-02-01', '18:16:29'),
(89, 1, 1, NULL, NULL, NULL, NULL, 'L-240201-0016', '2001:448a:3070:37d4:2c80:60fa:6b48:7605', 5, 100, NULL, 0, 100, '2024-02-01 19:18:21', '', 2, '2024-02-01', '18:18:21'),
(90, 1, 1, NULL, NULL, NULL, NULL, 'L-240201-0017', '36.74.45.140', 5, 2000200, NULL, 0, 2000200, '2024-02-02 00:53:48', '', 1, '2024-02-01', '23:53:48'),
(91, 1, 1, NULL, NULL, NULL, NULL, 'L-240202-0018', '2001:448a:3070:37d4:2c80:60fa:6b48:7605', 5, 100, NULL, 0, 100, '2024-02-02 03:27:26', '', 2, '2024-02-02', '02:27:26'),
(92, 1, 1, NULL, NULL, NULL, NULL, 'L-240202-0019', '2001:448a:3070:37d4:2c80:60fa:6b48:7605', 5, 50000, NULL, 0, 50000, '2024-02-02 04:59:32', '', 1, '2024-02-02', '03:59:32'),
(93, 1, 1, NULL, NULL, NULL, NULL, 'L-240202-0020', '2001:448a:3070:37d4:2c80:60fa:6b48:7605', 5, 50000, NULL, 0, 50000, '2024-02-02 05:01:06', '', 1, '2024-02-02', '04:01:06'),
(94, 1, 1, NULL, NULL, NULL, NULL, 'L-240202-0021', '2001:448a:3070:37d4:2c80:60fa:6b48:7605', 5, 100, NULL, 0, 100, '2024-02-02 05:17:51', '', 1, '2024-02-02', '04:17:51'),
(95, 1, 1, NULL, NULL, NULL, NULL, 'L-240202-0022', '2001:448a:3070:37d4:5197:2ba9:ac5c:acf7', 5, 500, NULL, 0, 500, '2024-02-02 12:01:10', '', 1, '2024-02-02', '11:01:10'),
(96, 1, 1, NULL, NULL, NULL, NULL, 'L-240202-0023', '36.74.45.140', 35, 114000, NULL, 0, 114000, '2024-02-02 12:40:51', '', 1, '2024-02-02', '11:40:51'),
(97, 1, 1, NULL, NULL, NULL, NULL, 'L-240202-0024', '2001:448a:3070:37d4:a745:6684:562a:a639', 36, 100, NULL, 0, 100, '2024-02-02 14:04:57', '', 2, '2024-02-02', '13:04:57'),
(98, 1, 1, NULL, NULL, NULL, NULL, 'L-240202-0025', '2001:448a:3070:37d4:583f:4d81:9faf:f059', 5, 107000, NULL, 0, 107000, '2024-02-02 20:25:17', '', 1, '2024-02-02', '19:25:17'),
(99, 1, 1, NULL, NULL, NULL, NULL, 'L-240202-0026', '2001:448a:3070:37d4:3e61:289f:93db:fd54', 5, 100, NULL, 0, 100, '2024-02-02 21:36:45', '', 2, '2024-02-02', '20:36:45'),
(100, 1, 1, NULL, NULL, NULL, NULL, 'L-240203-0027', '182.1.87.66', 37, 57000, NULL, 0, 57000, '2024-02-03 14:23:52', '', 3, '2024-02-03', '13:23:52'),
(101, 1, 1, NULL, NULL, NULL, NULL, 'L-240203-0028', '182.1.87.66', 38, 500, NULL, 0, 500, '2024-02-03 14:25:01', '', 3, '2024-02-03', '13:25:01'),
(102, 1, 2, NULL, NULL, NULL, NULL, 'L-240205-0029', '2001:448a:3070:37d4:99a9:838f:a1c0:1d15', 1, 1000100, NULL, 0, 1000100, '2024-02-05 13:51:17', '', 4, '2024-02-05', '12:51:17'),
(103, 1, 2, NULL, NULL, NULL, NULL, 'L-240205-0030', '2001:448a:3070:37d4:99a9:838f:a1c0:1d15', 5, 1000200, NULL, 0, 1000200, '2024-02-05 13:57:03', '', 1, '2024-02-05', '12:57:03'),
(104, 1, 2, NULL, NULL, NULL, NULL, 'L-240205-0031', '2001:448a:3070:37d4:99a9:838f:a1c0:1d15', 5, 2000000, NULL, 0, 2000000, '2024-02-05 14:33:58', '', 1, '2024-02-05', '13:33:58'),
(105, 1, 2, NULL, NULL, NULL, NULL, 'L-240205-0032', '2001:448a:3070:37d4:99a9:838f:a1c0:1d15', 5, 2000000, NULL, 0, 2000000, '2024-02-05 18:43:01', '', 2, '2024-02-05', '17:43:01'),
(106, 1, 2, NULL, NULL, NULL, NULL, 'K-240207-0033', '2001:448a:3070:4e39:38fe:cfd5:425a:4ea4', 5, 1000000, 3, 30000, 970000, '2024-02-07 13:30:01', '', 1, '2024-02-07', '12:30:01'),
(107, 1, 1, NULL, NULL, NULL, NULL, 'L-240207-0033', '2001:448a:3070:4e39:38fe:cfd5:425a:4ea4', 5, 500, NULL, 3, 497, '2024-02-07 13:31:52', '', 1, '2024-02-07', '12:31:52'),
(108, 1, 1, NULL, NULL, NULL, NULL, 'L-240207-0034', '2001:448a:3070:4e39:38fe:cfd5:425a:4ea4', 39, 150, NULL, 0, 150, '2024-02-07 13:33:18', '', 1, '2024-02-07', '12:33:18'),
(109, 1, 2, NULL, NULL, NULL, NULL, 'K-240207-0035', '2001:448a:3070:4e39:38fe:cfd5:425a:4ea4', 40, 500, 0, 0, 500, '2024-02-07 13:52:31', '', 4, '2024-02-07', '12:52:31'),
(110, 1, 1, NULL, NULL, NULL, NULL, 'L-240207-0035', '2001:448a:3070:4e39:38fe:cfd5:425a:4ea4', 41, 650, NULL, 0, 650, '2024-02-07 13:54:10', '', 1, '2024-02-07', '12:54:10'),
(111, 1, 1, NULL, NULL, NULL, NULL, 'L-240207-0036', '2001:448a:3070:4e39:38fe:cfd5:425a:4ea4', 42, 650, NULL, 0, 650, '2024-02-07 13:57:51', '', 1, '2024-02-07', '12:57:51'),
(112, 1, 2, 'bank_transfer', '-', 'bni', '8578768417882654', 'K-240207-0037', '2001:448a:3070:4e39:46a5:b47a:e54d:634d', 5, 500, 3, 15, 485, '2024-02-07 17:27:39', '', 3, '2024-02-07', '16:27:39'),
(113, 1, 1, 'bank_transfer', '-', 'bni', '8578133943531892', 'L-240207-0037', '2001:448a:3070:4e39:46a5:b47a:e54d:634d', 5, 150, NULL, 3, 147, '2024-02-07 17:35:58', '', 3, '2024-02-07', '16:35:58'),
(114, 1, 2, 'bank_transfer', '-', 'Permata', '8778001107502008', 'K-240207-0038', '2001:448a:3070:4e39:46a5:b47a:e54d:634d', 1, 100, 0, 0, 100, '2024-02-07 17:38:12', '', 3, '2024-02-07', '16:38:12'),
(115, 1, 2, NULL, NULL, NULL, NULL, 'K-240207-0038', '2001:448a:3070:4e39:46a5:b47a:e54d:634d', 5, 150, 3, 5, 146, '2024-02-07 17:41:32', '', 4, '2024-02-07', '16:41:32'),
(116, 1, 2, NULL, NULL, NULL, NULL, 'K-240207-0038', '2001:448a:3070:4e39:46a5:b47a:e54d:634d', 5, 150, 3, 5, 146, '2024-02-07 17:42:11', '', 4, '2024-02-07', '16:42:11'),
(117, 1, 2, 'qris', '-', '-', '-', 'L-240207-0038', '2001:448a:3070:4e39:46a5:b47a:e54d:634d', 5, 150, 3, 5, 146, '2024-02-07 17:49:17', '', 2, '2024-02-07', '16:49:17'),
(118, 1, 2, 'echannel', '70012', 'Mandiri', '151036211189', 'L-240207-0039', '2001:448a:3070:4e39:46a5:b47a:e54d:634d', 8, 100, 0, 0, 100, '2024-02-07 18:02:02', '', 3, '2024-02-07', '17:02:02'),
(119, 1, 2, 'qris', '-', '-', '-', 'L-240207-0040', '2001:448a:3070:4e39:46a5:b47a:e54d:634d', 5, 100, 3, 3, 97, '2024-02-07 18:04:20', '', 2, '2024-02-07', '17:04:20'),
(120, 1, 2, 'bank_transfer', '-', 'bni', '8578684390059890', 'L-240207-0041', '2001:448a:3070:4e39:46a5:b47a:e54d:634d', 5, 100, 3, 3, 97, '2024-02-07 18:14:05', '', 3, '2024-02-07', '17:14:05'),
(121, 1, 2, 'qris', '-', '-', '-', 'L-240207-0042', '2001:448a:3070:4e39:46a5:b47a:e54d:634d', 5, 100, 3, 3, 97, '2024-02-07 18:16:44', '', 2, '2024-02-07', '17:16:44'),
(122, 1, 2, 'bank_transfer', '-', 'bni', '8578383417573879', 'L-240207-0043', '2001:448a:3070:4e39:46a5:b47a:e54d:634d', 5, 100000, 3, 3000, 97000, '2024-02-07 18:55:47', '', 3, '2024-02-07', '17:55:47'),
(123, 1, 1, NULL, NULL, NULL, NULL, 'L-240208-0044', '2001:448a:3070:4e39:46a5:b47a:e54d:634d', 5, 1050000, NULL, 3, 1049997, '2024-02-08 14:59:14', '', 1, '2024-02-08', '13:59:14'),
(124, 1, 1, 'bank_transfer', '-', 'bni', '8578004884035737', 'L-240208-0045', '2001:448a:3070:4e39:46a5:b47a:e54d:634d', 5, 50500, NULL, 3, 50497, '2024-02-08 15:14:56', '', 3, '2024-02-08', '14:14:56'),
(125, 1, 1, 'bank_transfer', '-', 'bni', '8578961617586528', 'L-240208-0046', '2001:448a:3070:4e39:46a5:b47a:e54d:634d', 5, 1050000, NULL, 3, 1049997, '2024-02-08 15:23:09', '', 3, '2024-02-08', '14:23:09'),
(126, 1, 1, 'qris', '-', '-', '-', 'L-240208-0047', '2001:448a:3070:4e39:46a5:b47a:e54d:634d', 5, 500, NULL, 3, 497, '2024-02-08 15:28:27', '', 3, '2024-02-08', '14:28:27'),
(127, 1, 1, 'bank_transfer', '-', 'bni', '8578149029024805', 'L-240208-0048', '2001:448a:3070:4e39:46a5:b47a:e54d:634d', 5, 50150, NULL, 3, 50147, '2024-02-08 15:32:34', '', 3, '2024-02-08', '14:32:34'),
(128, 1, 1, 'qris', '-', '-', '-', 'L-240208-0049', '2001:448a:3070:4e39:46a5:b47a:e54d:634d', 5, 50000, NULL, 3, 49997, '2024-02-08 15:42:11', '', 3, '2024-02-08', '14:42:11'),
(129, 1, 1, 'echannel', '70012', 'Mandiri', '840947022264', 'L-240208-0050', '2001:448a:3070:4e39:46a5:b47a:e54d:634d', 5, 500, NULL, 3, 497, '2024-02-08 15:45:24', '', 3, '2024-02-08', '14:45:24'),
(130, 1, 1, 'qris', '-', '-', '-', 'L-240208-0051', '2001:448a:3070:4e39:46a5:b47a:e54d:634d', 5, 50000, NULL, 3, 49997, '2024-02-08 15:47:35', '', 3, '2024-02-08', '14:47:35'),
(131, 1, 1, 'qris', '-', '-', '-', 'L-240208-0052', '2001:448a:3070:4e39:46a5:b47a:e54d:634d', 5, 50000, NULL, 3, 49997, '2024-02-08 15:53:54', '', 3, '2024-02-08', '14:53:54'),
(132, 1, 1, 'qris', '-', '-', '-', 'L-240208-0053', '2001:448a:3070:4e39:46a5:b47a:e54d:634d', 5, 50000, NULL, 3, 49997, '2024-02-08 16:04:25', '', 3, '2024-02-08', '15:04:25'),
(133, 1, 1, 'qris', '-', '-', '-', 'L-240208-0054', '2001:448a:3070:4e39:46a5:b47a:e54d:634d', 5, 50000, NULL, 3, 49997, '2024-02-08 16:09:37', '', 3, '2024-02-08', '15:09:37'),
(134, 1, 1, 'qris', '-', '-', '-', 'L-240209-0055', '2001:448a:3070:4e39:46a5:b47a:e54d:634d', 5, 50000, 3, 1500, 48500, '2024-02-09 16:02:27', '', 3, '2024-02-09', '15:02:27'),
(135, 1, 1, 'bank_transfer', '-', 'Permata', '8778009426380648', 'L-240209-0056', '2001:448a:3070:4e39:46a5:b47a:e54d:634d', 5, 107000, 3, 3210, 103790, '2024-02-09 17:03:59', '', 3, '2024-02-09', '16:03:59'),
(137, 1, 1, 'echannel', '70012', 'Mandiri', '409871193766', 'L-240209-0058', '2001:448a:3070:4e39:46a5:b47a:e54d:634d', 5, 35000, 3, 1050, 33950, '2024-02-09 20:46:24', '', 3, '2024-02-09', '19:46:24'),
(138, 1, 1, NULL, NULL, NULL, NULL, 'L-240210-0059', '2001:448a:3070:4e39:c5df:80fa:ad8b:4fa6', 5, 57000, 3, 1710, 55290, '2024-02-10 15:53:17', '', 1, '2024-02-10', '14:53:17'),
(139, 1, 2, 'qris', '-', '-', '-', 'L-240217-0060', '2001:448a:3070:5aec:bc34:7e2e:f1b:3b71', 5, 92000, 3, 2760, 89240, '2024-02-17 05:01:49', '', 3, '2024-02-17', '04:01:49'),
(140, 1, 1, NULL, NULL, NULL, NULL, 'L-240220-0061', '2001:448a:3070:5b60:f5d9:db7e:4ce1:ae57', 44, 200000, 0, 0, 200000, '2024-02-20 09:18:02', '', 1, '2024-02-20', '08:18:02'),
(141, 1, 2, NULL, NULL, NULL, NULL, 'L-240222-0062', '2001:448a:3070:1724:82:b765:6e63:3b77', 44, 100, 0, 0, 100, '2024-02-22 15:27:03', '', 1, '2024-02-22', '14:27:03'),
(142, 1, 2, 'bank_transfer', '-', 'bni', '8578116893627844', 'L-240223-0063', '2001:448a:3070:1724:82:b765:6e63:3b77', 5, 600, 3, 18, 582, '2024-02-23 08:37:03', '', 3, '2024-02-23', '07:37:03');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_transdet` int(11) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `lapangan_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time DEFAULT NULL,
  `durasi` int(11) NOT NULL,
  `jam_selesai` time DEFAULT NULL,
  `harga_jual` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_transdet`, `trans_id`, `lapangan_id`, `tanggal`, `jam_mulai`, `durasi`, `jam_selesai`, `harga_jual`, `total`, `created_at`) VALUES
(1, 1, 1, '2024-01-17', '06:00:00', 1, '07:00:00', 100, 100, '2024-01-17 03:27:58'),
(3, 3, 1, '2024-01-17', '06:00:00', 1, '07:00:00', 100, 100, '2024-01-17 03:31:37'),
(4, 4, 1, '2024-01-17', '06:00:00', 1, '07:00:00', 100, 100, '2024-01-17 03:37:51'),
(5, 2, 7, '2024-01-17', '06:00:00', 1, '07:00:00', 10000, 10000, '2024-01-17 03:40:20'),
(9, 5, 1, '2024-01-17', '07:00:00', 1, '08:00:00', 100, 100, '2024-01-17 04:07:55'),
(11, 7, 1, '2024-01-17', '20:00:00', 2, '22:00:00', 100, 100, '2024-01-17 06:18:27'),
(12, 8, 1, '0000-00-00', NULL, 0, NULL, 100, 100, '2024-01-17 07:18:26'),
(14, 10, 1, '0000-00-00', NULL, 0, NULL, 100, 100, '2024-01-17 07:21:16'),
(16, 12, 1, '0000-00-00', NULL, 0, NULL, 100, 100, '2024-01-18 07:52:07'),
(18, 14, 1, '0000-00-00', NULL, 0, NULL, 100, 100, '2024-01-18 08:21:29'),
(23, 16, 7, '2024-01-18', '15:00:00', 2, '17:00:00', 10000, 10000, '2024-01-18 08:34:05'),
(24, 15, 1, '2024-01-19', '10:00:00', 1, '11:00:00', 100, 100, '2024-01-18 09:03:51'),
(26, 19, 1, '2024-01-18', '06:00:00', 1, '07:00:00', 100, 100, '2024-01-18 10:39:59'),
(27, 20, 1, '0000-00-00', NULL, 0, NULL, 100, 100, '2024-01-18 10:41:56'),
(28, 6, 1, '2024-01-18', '06:00:00', 1, '07:00:00', 100, 100, '2024-01-18 11:54:57'),
(29, 21, 1, '2024-01-18', '07:00:00', 1, '08:00:00', 100, 100, '2024-01-18 11:55:33'),
(30, 22, 1, '2024-01-18', '07:00:00', 1, '08:00:00', 100, 100, '2024-01-18 12:17:46'),
(31, 23, 1, '0000-00-00', NULL, 0, NULL, 100, 100, '2024-01-18 12:38:17'),
(32, 24, 1, '2024-01-18', '07:00:00', 1, '08:00:00', 100, 100, '2024-01-18 12:44:24'),
(33, 25, 1, '2024-01-18', '07:00:00', 1, '08:00:00', 100, 100, '2024-01-18 12:49:09'),
(35, 27, 1, '0000-00-00', NULL, 0, NULL, 100, 100, '2024-01-20 16:56:54'),
(36, 28, 1, '2024-01-20', '22:00:00', 2, '24:00:00', 100, 100, '2024-01-20 17:57:20'),
(37, 29, 1, '2024-01-20', '06:00:00', 2, '08:00:00', 100, 100, '2024-01-20 18:12:05'),
(38, 30, 1, '2024-01-20', '06:00:00', 2, '08:00:00', 100, 100, '2024-01-20 18:23:08'),
(39, 31, 1, '2024-01-20', '06:00:00', 2, '08:00:00', 100, 100, '2024-01-20 18:34:22'),
(40, 32, 1, '2024-01-20', '06:00:00', 2, '08:00:00', 100, 200, '2024-01-20 18:43:06'),
(41, 33, 1, '2024-01-21', '06:00:00', 2, '08:00:00', 100, 200, '2024-01-21 18:59:30'),
(42, 34, 1, '2024-01-20', '06:00:00', 2, '08:00:00', 100, 200, '2024-01-20 19:11:51'),
(43, 35, 1, '2024-01-21', '06:00:00', 2, '08:00:00', 100, 200, '2024-01-20 19:34:25'),
(44, 36, 1, '2024-01-22', '06:00:00', 2, '08:00:00', 100, 200, '2024-01-20 19:38:11'),
(45, 37, 1, '2024-01-22', '06:00:00', 2, '08:00:00', 200, 200, '2024-01-21 00:20:01'),
(46, 38, 1, '2024-01-23', '06:00:00', 2, '08:00:00', 200, 200, '2024-01-23 11:08:47'),
(47, 39, 1, '2024-01-24', '06:00:00', 2, '08:00:00', 100, 100, '2024-01-24 12:06:17'),
(48, 39, 1, '2024-01-25', '06:00:00', 2, '08:00:00', 100, 100, '2024-01-24 12:06:17'),
(49, 40, 1, '2024-01-24', '06:00:00', 2, '08:00:00', 100, 100, '2024-01-24 12:09:36'),
(50, 40, 1, '2024-01-25', '06:00:00', 2, '08:00:00', 100, 100, '2024-01-24 12:09:36'),
(52, 42, 1, '0000-00-00', NULL, 0, NULL, 200, 200, '2024-01-24 05:44:11'),
(53, 43, 1, '2024-01-24', '06:00:00', 2, '08:00:00', 100, 100, '2024-01-24 05:55:48'),
(54, 44, 1, '2024-01-24', '06:00:00', 2, '08:00:00', 100, 100, '2024-01-24 06:05:39'),
(55, 45, 1, '2024-01-25', '06:00:00', 2, '08:00:00', 100, 100, '2024-01-24 06:06:08'),
(56, 46, 1, '2024-01-26', '06:00:00', 2, '08:00:00', 100, 100, '2024-01-24 06:07:56'),
(57, 47, 1, '2024-01-24', '06:00:00', 2, '08:00:00', 100, 100, '2024-01-24 06:25:05'),
(58, 48, 1, '2024-01-24', '06:00:00', 2, '08:00:00', 100, 100, '2024-01-24 06:47:37'),
(59, 49, 1, '2024-01-26', '06:00:00', 2, '08:00:00', 100, 100, '2024-01-24 19:51:33'),
(60, 49, 1, '2024-01-27', '06:00:00', 2, '08:00:00', 200, 200, '2024-01-24 19:51:33'),
(61, 50, 1, '2024-01-29', '06:00:00', 2, '08:00:00', 100, 100, '2024-01-24 20:55:17'),
(62, 51, 1, '2024-01-29', '06:00:00', 2, '08:00:00', 100, 100, '2024-01-24 20:56:58'),
(63, 52, 1, '2024-01-31', '06:00:00', 2, '08:00:00', 100, 100, '2024-01-25 18:17:05'),
(64, 53, 1, '2024-01-31', '06:00:00', 2, '08:00:00', 100, 100, '2024-01-25 18:32:11'),
(65, 54, 1, '2024-01-31', '06:00:00', 2, '08:00:00', 100, 100, '2024-01-25 18:35:44'),
(66, 55, 1, '2024-01-28', '06:00:00', 2, '08:00:00', 150, 150, '2024-01-25 18:41:40'),
(67, 56, 1, '2024-01-28', '06:00:00', 2, '08:00:00', 150, 150, '2024-01-26 18:56:55'),
(68, 57, 1, '2024-01-30', '06:00:00', 2, '08:00:00', 100, 100, '2024-01-25 19:02:28'),
(69, 58, 1, '2024-01-31', '06:00:00', 2, '08:00:00', 100, 100, '2024-01-25 19:03:25'),
(70, 59, 1, '2024-01-31', '08:00:00', 2, '10:00:00', 100, 100, '2024-01-25 19:04:43'),
(71, 60, 1, '2024-01-26', '08:00:00', 2, '10:00:00', 100, 100, '2024-01-25 19:39:25'),
(72, 61, 1, '2024-01-26', '08:00:00', 2, '10:00:00', 100, 100, '2024-01-25 21:38:09'),
(73, 62, 1, '2024-02-01', '06:00:00', 2, '08:00:00', 100, 100, '2024-01-29 04:57:11'),
(74, 62, 1, '2024-02-02', '06:00:00', 2, '08:00:00', 100, 100, '2024-01-29 04:57:11'),
(80, 66, 1, '2024-01-30', '08:00:00', 2, '10:00:00', 100, 100, '2024-01-30 15:25:22'),
(81, 67, 1, '2024-01-31', '08:00:00', 2, '10:00:00', 100, 100, '2024-01-30 15:28:24'),
(82, 68, 1, '2024-02-01', '10:00:00', 2, '12:00:00', 100, 100, '2024-01-31 07:34:53'),
(83, 69, 1, '2024-02-01', '08:00:00', 2, '10:00:00', 100, 100, '2024-01-31 07:41:34'),
(84, 69, 1, '2024-02-01', '10:00:00', 2, '12:00:00', 100, 100, '2024-01-31 07:41:34'),
(85, 70, 7, '2024-01-31', '06:00:00', 2, '08:00:00', 1000000, 1000000, '2024-01-31 09:31:12'),
(86, 71, 1, '2024-01-31', '08:00:00', 2, '10:00:00', 100, 100, '2024-01-31 09:39:58'),
(87, 71, 1, '2024-02-01', '12:00:00', 2, '14:00:00', 100, 100, '2024-01-31 09:39:58'),
(88, 71, 1, '2024-01-31', '14:00:00', 2, '16:00:00', 200, 200, '2024-01-31 09:39:58'),
(89, 71, 1, '2024-02-01', '14:00:00', 2, '16:00:00', 200, 200, '2024-01-31 09:39:58'),
(90, 71, 1, '2024-02-01', '16:00:00', 2, '18:00:00', 200, 200, '2024-01-31 09:39:58'),
(91, 71, 1, '2024-01-31', '16:00:00', 2, '18:00:00', 200, 200, '2024-01-31 09:39:58'),
(92, 72, 7, '2024-02-03', '06:00:00', 2, '08:00:00', 500, 500, '2024-01-31 09:45:37'),
(93, 72, 7, '2024-02-02', '06:00:00', 2, '08:00:00', 1000000, 1000000, '2024-01-31 09:45:37'),
(94, 73, 7, '2024-02-01', '06:00:00', 2, '08:00:00', 1000000, 1000000, '2024-01-31 10:18:04'),
(95, 73, 7, '2024-02-01', '08:00:00', 2, '10:00:00', 100, 100, '2024-01-31 10:18:04'),
(96, 73, 7, '2024-01-31', '08:00:00', 2, '10:00:00', 100, 100, '2024-01-31 10:18:04'),
(97, 74, 1, '2024-02-01', '08:00:00', 2, '10:00:00', 100, 100, '2024-02-01 00:45:51'),
(98, 74, 1, '2024-02-02', '08:00:00', 2, '10:00:00', 100, 100, '2024-02-01 00:45:51'),
(99, 75, 1, '2024-02-05', '06:00:00', 2, '08:00:00', 1000000, 1000000, '2024-02-01 08:34:33'),
(100, 75, 1, '2024-02-04', '06:00:00', 2, '08:00:00', 150, 150, '2024-02-01 08:34:33'),
(101, 76, 1, '2024-02-03', '06:00:00', 2, '08:00:00', 500, 500, '2024-02-01 08:39:15'),
(102, 76, 1, '2024-02-04', '06:00:00', 2, '08:00:00', 150, 150, '2024-02-01 08:39:15'),
(103, 76, 1, '2024-02-05', '06:00:00', 2, '08:00:00', 1000000, 1000000, '2024-02-01 08:39:15'),
(104, 77, 1, '2024-02-03', '06:00:00', 2, '08:00:00', 500, 500, '2024-02-01 08:43:09'),
(105, 77, 1, '2024-02-04', '06:00:00', 2, '08:00:00', 150, 150, '2024-02-01 08:43:09'),
(106, 77, 1, '2024-02-05', '06:00:00', 2, '08:00:00', 1000000, 1000000, '2024-02-01 08:43:09'),
(107, 78, 1, '2024-02-03', '06:00:00', 2, '08:00:00', 500, 500, '2024-02-01 08:52:55'),
(108, 78, 1, '2024-02-03', '08:00:00', 2, '10:00:00', 500, 500, '2024-02-01 08:52:55'),
(109, 79, 1, '2024-02-01', '08:00:00', 2, '10:00:00', 100, 100, '2024-02-01 08:54:07'),
(110, 79, 1, '2024-02-02', '08:00:00', 2, '10:00:00', 100, 100, '2024-02-01 08:54:07'),
(111, 79, 1, '2024-02-01', '10:00:00', 2, '12:00:00', 100, 100, '2024-02-01 08:54:07'),
(112, 79, 1, '2024-02-02', '10:00:00', 2, '12:00:00', 100, 100, '2024-02-01 08:54:07'),
(113, 80, 1, '2024-02-03', '06:00:00', 2, '08:00:00', 500, 500, '2024-02-01 09:09:18'),
(114, 80, 1, '2024-02-04', '06:00:00', 2, '08:00:00', 150, 150, '2024-02-01 09:09:18'),
(115, 80, 1, '2024-02-05', '06:00:00', 2, '08:00:00', 1000000, 1000000, '2024-02-01 09:09:18'),
(116, 81, 1, '2024-02-04', '06:00:00', 2, '08:00:00', 150, 150, '2024-02-01 09:12:33'),
(117, 81, 1, '2024-02-05', '06:00:00', 2, '08:00:00', 1000000, 1000000, '2024-02-01 09:12:33'),
(118, 81, 1, '2024-02-06', '06:00:00', 2, '08:00:00', 1000000, 1000000, '2024-02-01 09:12:33'),
(119, 82, 7, '2024-02-01', '06:00:00', 2, '08:00:00', 1000000, 1000000, '2024-02-01 09:19:49'),
(120, 82, 7, '2024-02-02', '06:00:00', 2, '08:00:00', 1000000, 1000000, '2024-02-01 09:19:49'),
(121, 83, 1, '2024-02-03', '06:00:00', 2, '08:00:00', 500, 500, '2024-02-01 09:28:02'),
(122, 83, 1, '2024-02-05', '06:00:00', 2, '08:00:00', 1000000, 1000000, '2024-02-01 09:28:02'),
(123, 83, 7, '2024-02-01', '06:00:00', 2, '08:00:00', 1000000, 1000000, '2024-02-01 09:28:02'),
(124, 84, 1, '2024-02-04', '06:00:00', 2, '08:00:00', 150, 150, '2024-02-01 09:29:23'),
(125, 84, 1, '2024-02-06', '06:00:00', 2, '08:00:00', 1000000, 1000000, '2024-02-01 09:29:23'),
(126, 84, 1, '2024-02-04', '08:00:00', 2, '10:00:00', 150, 150, '2024-02-01 09:29:23'),
(127, 85, 1, '2024-02-03', '06:00:00', 2, '08:00:00', 500, 500, '2024-02-01 09:34:30'),
(128, 85, 1, '2024-02-03', '08:00:00', 2, '10:00:00', 500, 500, '2024-02-01 09:34:30'),
(129, 86, 1, '2024-02-01', '08:00:00', 2, '10:00:00', 100, 100, '2024-02-01 10:00:33'),
(130, 87, 1, '2024-02-04', '06:00:00', 2, '08:00:00', 150, 150, '2024-02-01 10:08:33'),
(131, 88, 1, '2024-02-01', '10:00:00', 2, '12:00:00', 100, 100, '2024-02-01 11:16:29'),
(132, 89, 1, '2024-02-01', '12:00:00', 2, '14:00:00', 100, 100, '2024-02-01 11:18:21'),
(133, 90, 1, '2024-02-05', '06:00:00', 2, '08:00:00', 1000000, 1000000, '2024-02-01 16:53:48'),
(134, 90, 1, '2024-02-05', '08:00:00', 2, '10:00:00', 100, 100, '2024-02-01 16:53:48'),
(135, 90, 1, '2024-02-06', '08:00:00', 2, '10:00:00', 100, 100, '2024-02-01 16:53:48'),
(136, 90, 1, '2024-02-06', '06:00:00', 2, '08:00:00', 1000000, 1000000, '2024-02-01 16:53:48'),
(137, 91, 7, '2024-02-02', '08:00:00', 2, '10:00:00', 100, 100, '2024-02-01 19:27:26'),
(138, 92, 7, '2024-02-02', '06:00:00', 2, '08:00:00', 50000, 50000, '2024-02-01 20:59:32'),
(139, 93, 7, '2024-02-02', '06:00:00', 2, '08:00:00', 50000, 50000, '2024-02-01 21:01:06'),
(140, 94, 1, '2024-02-02', '08:00:00', 2, '10:00:00', 100, 100, '2024-02-01 21:17:51'),
(141, 95, 1, '2024-02-03', '06:00:00', 2, '08:00:00', 500, 500, '2024-02-02 04:01:10'),
(142, 96, 7, '2024-02-03', '06:00:00', 2, '08:00:00', 57000, 57000, '2024-02-02 04:40:51'),
(143, 96, 7, '2024-02-03', '08:00:00', 2, '10:00:00', 57000, 57000, '2024-02-02 04:40:51'),
(144, 97, 1, '2024-02-02', '08:00:00', 2, '10:00:00', 100, 100, '2024-02-02 06:04:57'),
(145, 98, 9, '2024-02-02', '06:00:00', 2, '08:00:00', 50000, 50000, '2024-02-02 12:25:17'),
(146, 98, 9, '2024-02-03', '06:00:00', 2, '08:00:00', 57000, 57000, '2024-02-02 12:25:17'),
(147, 99, 1, '2024-02-02', '10:00:00', 2, '12:00:00', 100, 100, '2024-02-02 13:36:45'),
(148, 100, 9, '2024-02-03', '06:00:00', 2, '08:00:00', 57000, 57000, '2024-02-03 06:23:52'),
(149, 101, 1, '2024-02-03', '06:00:00', 2, '08:00:00', 500, 500, '2024-02-03 06:25:01'),
(150, 102, 1, '2024-02-05', '06:00:00', 2, '08:00:00', 1000000, 1000000, '2024-02-05 05:51:17'),
(151, 102, 1, '2024-02-05', '08:00:00', 2, '10:00:00', 100, 100, '2024-02-05 05:51:17'),
(152, 103, 1, '2024-02-05', '06:00:00', 2, '08:00:00', 1000000, 1000000, '2024-02-05 05:57:03'),
(153, 103, 1, '2024-02-05', '08:00:00', 2, '10:00:00', 100, 100, '2024-02-05 05:57:03'),
(154, 103, 1, '2024-02-05', '10:00:00', 2, '12:00:00', 100, 100, '2024-02-05 05:57:03'),
(155, 104, 1, '2024-02-06', '06:00:00', 2, '08:00:00', 1000000, 1000000, '2024-02-05 06:33:58'),
(156, 104, 1, '2024-02-07', '06:00:00', 2, '08:00:00', 1000000, 1000000, '2024-02-05 06:33:58'),
(157, 105, 1, '2024-02-08', '06:00:00', 2, '08:00:00', 1000000, 1000000, '2024-02-05 10:43:01'),
(158, 105, 1, '2024-02-09', '06:00:00', 2, '08:00:00', 1000000, 1000000, '2024-02-05 10:43:01'),
(159, 106, 1, '2024-02-12', '06:00:00', 2, '08:00:00', 1000000, 1000000, '2024-02-07 05:30:01'),
(160, 107, 1, '2024-02-10', '06:00:00', 2, '08:00:00', 500, 500, '2024-02-07 05:31:52'),
(161, 108, 1, '2024-02-11', '06:00:00', 2, '08:00:00', 150, 150, '2024-02-07 05:33:18'),
(162, 109, 1, '2024-02-10', '06:00:00', 2, '08:00:00', 500, 500, '2024-02-07 05:52:31'),
(163, 110, 1, '2024-02-10', '06:00:00', 2, '08:00:00', 500, 500, '2024-02-07 05:54:10'),
(164, 110, 1, '2024-02-11', '06:00:00', 2, '08:00:00', 150, 150, '2024-02-07 05:54:10'),
(165, 111, 1, '2024-02-10', '06:00:00', 2, '08:00:00', 500, 500, '2024-02-07 05:57:51'),
(166, 111, 1, '2024-02-11', '06:00:00', 2, '08:00:00', 150, 150, '2024-02-07 05:57:51'),
(167, 112, 1, '2024-02-10', '06:00:00', 2, '08:00:00', 500, 500, '2024-02-07 09:27:39'),
(168, 113, 1, '2024-02-11', '06:00:00', 2, '08:00:00', 150, 150, '2024-02-07 09:35:58'),
(169, 114, 1, '2024-02-07', '08:00:00', 2, '10:00:00', 100, 100, '2024-02-07 09:38:12'),
(170, 115, 1, '2024-02-11', '06:00:00', 2, '08:00:00', 150, 150, '2024-02-07 09:41:32'),
(171, 116, 1, '2024-02-11', '06:00:00', 2, '08:00:00', 150, 150, '2024-02-07 09:42:11'),
(172, 117, 1, '2024-02-11', '06:00:00', 2, '08:00:00', 150, 150, '2024-02-07 09:49:17'),
(173, 118, 1, '2024-02-08', '08:00:00', 2, '10:00:00', 100, 100, '2024-02-07 10:02:02'),
(174, 119, 1, '2024-02-08', '08:00:00', 2, '10:00:00', 100, 100, '2024-02-07 10:04:20'),
(175, 120, 1, '2024-02-09', '08:00:00', 2, '10:00:00', 100, 100, '2024-02-07 10:14:05'),
(176, 121, 1, '2024-02-12', '08:00:00', 2, '10:00:00', 100, 100, '2024-02-07 10:16:44'),
(177, 122, 7, '2024-02-07', '06:00:00', 2, '08:00:00', 50000, 50000, '2024-02-07 10:55:47'),
(178, 122, 7, '2024-02-08', '06:00:00', 2, '08:00:00', 50000, 50000, '2024-02-07 10:55:47'),
(179, 123, 9, '2024-02-08', '06:00:00', 2, '08:00:00', 50000, 50000, '2024-02-08 06:59:14'),
(180, 123, 1, '2024-02-13', '06:00:00', 2, '08:00:00', 1000000, 1000000, '2024-02-08 06:59:14'),
(181, 124, 9, '2024-02-08', '06:00:00', 2, '08:00:00', 50000, 50000, '2024-02-08 07:14:56'),
(182, 124, 1, '2024-02-10', '08:00:00', 2, '10:00:00', 500, 500, '2024-02-08 07:14:56'),
(183, 125, 9, '2024-02-08', '06:00:00', 2, '08:00:00', 50000, 50000, '2024-02-08 07:23:09'),
(184, 125, 1, '2024-02-13', '06:00:00', 2, '08:00:00', 1000000, 1000000, '2024-02-08 07:23:09'),
(185, 126, 1, '2024-02-10', '08:00:00', 2, '10:00:00', 500, 500, '2024-02-08 07:28:27'),
(186, 127, 9, '2024-02-08', '06:00:00', 2, '08:00:00', 50000, 50000, '2024-02-08 07:32:34'),
(187, 127, 1, '2024-02-11', '08:00:00', 2, '10:00:00', 150, 150, '2024-02-08 07:32:34'),
(188, 128, 9, '2024-02-08', '06:00:00', 2, '08:00:00', 50000, 50000, '2024-02-08 07:42:11'),
(189, 129, 1, '2024-02-10', '08:00:00', 2, '10:00:00', 500, 500, '2024-02-08 07:45:24'),
(190, 130, 9, '2024-02-08', '06:00:00', 2, '08:00:00', 50000, 50000, '2024-02-08 07:47:35'),
(191, 131, 9, '2024-02-08', '06:00:00', 2, '08:00:00', 50000, 50000, '2024-02-08 07:53:54'),
(192, 132, 9, '2024-02-08', '06:00:00', 2, '08:00:00', 50000, 50000, '2024-02-08 08:04:25'),
(193, 133, 9, '2024-02-08', '06:00:00', 2, '08:00:00', 50000, 50000, '2024-02-08 08:09:37'),
(194, 134, 9, '2024-02-09', '06:00:00', 2, '08:00:00', 50000, 50000, '2024-02-09 08:02:27'),
(195, 135, 9, '2024-02-09', '06:00:00', 2, '08:00:00', 50000, 50000, '2024-02-09 09:03:59'),
(196, 135, 9, '2024-02-10', '06:00:00', 2, '08:00:00', 57000, 57000, '2024-02-09 09:03:59'),
(198, 137, 9, '2024-02-11', '06:00:00', 2, '08:00:00', 35000, 35000, '2024-02-09 12:46:24'),
(199, 138, 9, '2024-02-10', '06:00:00', 2, '08:00:00', 57000, 57000, '2024-02-10 07:53:17'),
(200, 139, 7, '2024-02-17', '06:00:00', 2, '08:00:00', 57000, 57000, '2024-02-16 21:01:49'),
(201, 139, 7, '2024-02-18', '06:00:00', 2, '08:00:00', 35000, 35000, '2024-02-16 21:01:49'),
(202, 140, 9, '2024-02-20', '06:00:00', 2, '08:00:00', 50000, 50000, '2024-02-20 01:18:02'),
(203, 140, 9, '2024-02-21', '06:00:00', 2, '08:00:00', 50000, 50000, '2024-02-20 01:18:02'),
(204, 140, 9, '2024-02-22', '06:00:00', 2, '08:00:00', 50000, 50000, '2024-02-20 01:18:02'),
(205, 140, 9, '2024-02-20', '08:00:00', 2, '10:00:00', 50000, 50000, '2024-02-20 01:18:02'),
(206, 141, 1, '2024-02-23', '08:00:00', 2, '10:00:00', 100, 100, '2024-02-22 07:27:03'),
(207, 142, 1, '2024-02-25', '06:00:00', 2, '08:00:00', 150, 150, '2024-02-23 00:37:03'),
(208, 142, 1, '2024-03-03', '06:00:00', 2, '08:00:00', 150, 150, '2024-02-23 00:37:03'),
(209, 142, 1, '2024-03-10', '06:00:00', 2, '08:00:00', 150, 150, '2024-02-23 00:37:03'),
(210, 142, 1, '2024-03-17', '06:00:00', 2, '08:00:00', 150, 150, '2024-02-23 00:37:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_sycPlatUsr` int(11) DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `provinsi` int(11) DEFAULT NULL,
  `kota` int(11) DEFAULT NULL,
  `address` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `usertype` int(11) NOT NULL,
  `active` tinyint(3) UNSIGNED DEFAULT NULL,
  `photo` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `photo_type` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `salt` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `activation_code` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `forgotten_password_code` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `forgotten_password_time` int(10) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `last_login` int(11) DEFAULT NULL,
  `created_on` int(11) NOT NULL,
  `modified` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_sycPlatUsr`, `name`, `username`, `password`, `email`, `phone`, `provinsi`, `kota`, `address`, `usertype`, `active`, `photo`, `photo_type`, `ip_address`, `salt`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `last_login`, `created_on`, `modified`) VALUES
(0, NULL, 'guest', 'guest', '$2y$08$Bmor3AWJsNHPdnmb6F371.cJUrmIJGVGV714dFTndhJWt5pygQzqC', 'guest@code.com', '97856', 9, 468, 'jl melt', 4, 1, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-12-12 07:44:52'),
(1, 1, 'SuperAdmin', 'superadmin', '$2y$08$MgqVq4tEsxeN/3s46NvDDOG77Ha51KyqFhYpmRBKpcjCA4gYwqqw6', 'superadmin@gmail.com', '081228289766', 6, 151, 'asdasdasdsa', 1, 1, 'superadmin20240117103013', '.png', '::1', NULL, 'c6ad242e6fd3de875568c7de5ba23af4a24137ef', 'tHafW45duPzrU3oWR0AVuO48b26088a3cd65edc4', 1621246176, 'E.NDNDdmFga1stIGrwJh/u', 1708649254, 2147483647, '2024-02-23 00:47:34'),
(2, NULL, 'Admin', 'administrator', '$2y$08$rnCngWyQhFLdVJijctNDKuwJZ8o9VfcSsZ9IM9XN71ugxIpQFeCWe', 'administrator@gmail.com', '08124124', NULL, NULL, 'kaldjlas', 2, 1, 'admin20180424102408', '.jpeg', '::1', NULL, NULL, NULL, NULL, NULL, 1704444544, 1524551716, '2024-01-05 15:49:04'),
(3, NULL, 'Batistuta', 'batistuta', '$2y$08$.5EYrM8S8Up0LcpFiEmjauyPVdWOmylLZ.MqM0zBKyDVKniwdVbYi', 'batistuta@gmail.com', '0812412414', 33, 327, 'Jl. Skdlajsdlasjkdl', 4, 1, NULL, NULL, '127.0.0.1', NULL, NULL, NULL, NULL, 'bP1vzcrMcsHTQLaetXr6We', 1702266998, 1528634033, '2023-12-11 10:56:38'),
(4, NULL, 'User Premium', 'userpremium', '$2y$08$Wv3MA.DnwTNzBeF62o9neuSXeVdIA/bjlxOzSxtD6DtgStEBn//s.', 'userpremium@gmail.com', '0812412412', 3, 106, 'kaljdklasjdkl', 3, 1, NULL, NULL, '::1', NULL, NULL, NULL, NULL, NULL, 1621252638, 1531807819, '2021-05-17 18:57:18'),
(5, NULL, 'Olih Solihudin', 'solihudin', '$2y$08$Bmor3AWJsNHPdnmb6F371.cJUrmIJGVGV714dFTndhJWt5pygQzqC', 'olihsolih213@gmail.com', '089678575', 9, 468, 'jl melati', 3, 1, NULL, NULL, '::1', NULL, NULL, '0wvkRAHq5L1rBHxqbneMh.fbdeec39e2448404be', 1702377039, NULL, 1707551588, 1702286101, '2024-02-10 07:53:08'),
(7, NULL, 'Coba register pas cekout', 'coc', '$2y$08$N9PsLAS02Y8Nuhdn74YCJOvhhQDwtBfv4lkZzcxyo3Y4KtuVkEJ8.', 'olihsolihudin34@gmail.com', '0976785767', 9, 469, 'gdfgfdg', 4, 1, NULL, NULL, '::1', NULL, NULL, NULL, NULL, NULL, 1702347596, 1702347596, '2023-12-12 09:19:56'),
(8, NULL, 'Rian Kurnia', 'rian344', '$2y$08$ymFDayucKcs5OME6tr5tVugJenUUBz1cTTzyuMz74eUgJ6Z8RC.Fi', 'riankur56@yahoo.com', '079685676', 7, 88, 'gtfdfgfd', 4, 1, NULL, NULL, '::1', NULL, NULL, NULL, NULL, NULL, 1702358268, 1702358268, '2023-12-12 12:17:48'),
(9, NULL, 'ferere', 'edfdfd', '$2y$08$Va85tf9UiEXLzwKnHpw4P.J1oZ79orNIZC64aJdvGEJ40cvWQ3z0G', 'sdsdsds@gmail.com', '3455423', 9, 126, 'sdadsadsa', 4, 1, NULL, NULL, '::1', NULL, NULL, NULL, NULL, NULL, 1702358488, 1702358487, '2023-12-12 12:21:28'),
(10, NULL, 'Siti', 'siti78', '$2y$08$/43SZnVLg32HPAR2JYTEc.D45vctYpHHW6Q.tbQli22bLlba7v0Pa', 'siti78@yahoo.com', '089768565', 9, 469, 'fhdfgfdg', 4, 1, NULL, NULL, '::1', NULL, NULL, 'uFohyPdWQLhfQQK9w4jGYeeb747f7a80ab43da51', 1702377023, NULL, 1702358891, 1702358891, '2024-02-06 10:13:48'),
(11, NULL, 'Sutisna', 'sutisna45', '$2y$08$dk1Ea6cUpvfZDHf/hRQwteEyKFuBsazsAQjcUIHvU6biWZbK2gezO', 'sutisna45@gmail.com', '0869758564', 10, 196, 'jl melati', 4, 1, NULL, NULL, '2001:448a:3070:29e3:4dce:8b80:1bbc:29d8', NULL, NULL, NULL, NULL, NULL, 1702366131, 1702366131, '2023-12-12 07:28:51'),
(12, NULL, 'Farhan', 'farhan213', '$2y$08$uaF3ZARlh0gvZJDx22rWl.s21t3crCsifGNhWnm788/7n2GZvfY62', 'farhan213@gmail.com', '078667457', 9, 469, 'jl melati', 3, 1, NULL, NULL, '2001:448a:3070:29e3:4dce:8b80:1bbc:29d8', NULL, NULL, NULL, NULL, NULL, 1702382187, 1702382186, '2023-12-12 12:04:21'),
(13, NULL, 'Muhamad Rafli', 'Flyy9', '$2y$08$MYRULabm56zt3CL6QcqcIeNOCmqToeKUh.jezIP9LkA9128gDdXuO', 'muhamadrafli6207@gmail.com', '0895610411991', 9, 22, 'Kp. Bojongnangka', 4, 1, NULL, NULL, '223.255.230.45', NULL, NULL, NULL, NULL, 'i6M4lbGqcma0Ju9ssxFj0u', 1704870235, 1702454990, '2024-01-10 07:03:55'),
(14, NULL, 'gigink nugraha', 'giginkaditya', '$2y$08$ByoGbfSHdqMCEhQVhcqPnuvpgNgBxkbYV2hdF4vOk9r5ZwT3laUh6', 'giginkaditya@yahoo.co.id', '082215758687', 9, 22, 'Jalan tentara pelajar gg.budirasa 1', 4, 1, NULL, NULL, '118.99.73.130', NULL, NULL, NULL, NULL, NULL, 1702459113, 1702459113, '2023-12-13 09:18:33'),
(15, NULL, 'Riad', 'riad324', '$2y$08$SxEJXXq05KBm.ERk9QVmVuLF5fQbMXbAXOhx8WfHIuf/L/K5BPUoC', 'riadm@gmail.com', '0785654546', 9, 54, 'Jl Melati', 4, 1, NULL, NULL, '::1', NULL, NULL, NULL, NULL, NULL, 1704366603, 1704366603, '2024-01-04 18:10:03'),
(16, NULL, 'ronaldo', 'ronaldo24770', '$2y$08$luTDBEU9xtDV39FDB5WDj.tv3hiCQx26JPP6gY51PVogke9SSsfWa', 'ronaldo234@gmail.com', '08796788757', 0, 0, '-', 4, 1, NULL, NULL, '36.74.44.245', NULL, NULL, NULL, NULL, NULL, NULL, 1705130212, NULL),
(18, NULL, 'Leonel Mesi', 'Leonel Mesi7711', '$2y$08$OA6LBorCGO2d2/kHgsF93.ss.9HIIh1QLK9MDaN2X/yYbBxLxgdxG', 'lmesi234@gmail.com', '07867857', 0, 0, '-', 4, 1, NULL, NULL, '2001:448a:3070:1d24:f10c:be19:21fc:ed25', NULL, NULL, NULL, NULL, NULL, NULL, 1706206625, NULL),
(19, NULL, 'jihan', 'jihan12308', '$2y$08$EGai6TBXQ067j/mA6fvFIuZ5flGb8wrPWkwCwLOMScgYeniEMB9Qu', 'jihan34@gmail.com', '067856745', 0, 0, '-', 4, 1, NULL, NULL, '2001:448a:3070:1d24:f10c:be19:21fc:ed25', NULL, NULL, NULL, NULL, NULL, NULL, 1706208100, NULL),
(20, NULL, 'Ronaldo', 'Ronaldo13453', '$2y$08$2/UPDDr/nKtVtBvhh9UuxO2t7QyY7mmepVgV4a5Lc4.X3CbpKb8eu', 'r9gh@gmail.com', '085343262', 0, 0, '-', 4, 1, NULL, NULL, '2001:448a:3070:1d24:9914:c318:cbec:dab4', NULL, NULL, NULL, NULL, NULL, NULL, 1706211565, NULL),
(21, NULL, 'sinta', 'sinta', '$2y$08$fq.vWceUNrvxSreDpVYjXOuhvFrhk34gqTRe4QruSGMYXUNXzhtuy', 'sinta2@gmail.com', '0678567456', 4, 63, 'jl melati', 4, 1, NULL, NULL, '2001:448a:3070:1d24:abec:8233:72f6:c28a', NULL, NULL, NULL, NULL, NULL, 1706345426, 1706345408, '2024-01-27 08:50:26'),
(22, NULL, 'suhatda', 'suhatda39033', '$2y$08$vSeY3AFUt3vyYAKTgbSLbOpCIH38h1sspXRZCh84bDJem.es27YyS', 'suhatda@gmil.com', '088786767565', 0, 0, '-', 4, 1, NULL, NULL, '2001:448a:3070:1d3d:6ca8:f03c:ee5f:8594', NULL, NULL, NULL, NULL, NULL, NULL, 1706504231, NULL),
(24, NULL, 'indah', 'indah', '$2y$08$UQRUJUTC7Eewc7kYT1bVqe3w4gVK7HV6VwUqhbsu1rZKR7img.Dq6', 'indah@gmail.com', '09686765', 9, 104, 'jl Melati', 4, 1, NULL, NULL, '2001:448a:3070:1d3d:6ca8:f03c:ee5f:8594', NULL, NULL, NULL, NULL, NULL, 1706504563, 1706504529, '2024-01-29 05:02:43'),
(27, NULL, 'Andri', 'Andri32582', '$2y$08$NV9jqgayRBKCclFrQcV8PeGragbfCNLKlzFKpRGh8R12o5/lzas6q', 'andri@gmail.com', '08386695832', 0, 0, '-', 4, 1, NULL, NULL, '2001:448a:3070:4e1f:51e0:c40e:b51b:f9c0', NULL, NULL, NULL, NULL, NULL, NULL, 1706628322, NULL),
(28, NULL, 'Tedy Syach', 'Tedy Syach92163', '$2y$08$0QfBX14uTIiaPFFknwg1wO3oDvh8ZNioFU6KK7fMfyucQIBpartVe', 'tedyysyyacwh@gmail.com', '0852369147', 0, 0, '-', 4, 1, NULL, NULL, '2001:448a:3070:4e1f:35e9:2a70:c51b:c3cb', NULL, NULL, NULL, NULL, NULL, NULL, 1706686493, NULL),
(29, NULL, 'Tedy Syach', 'Tedy Syach75435', '$2y$08$shS6rCae/lq7y6c3hK148eUvxvjmTdkVE6qmEBu.6Eeh.zJnpQ60i', 'tedyysyyaceh@gmail.com', '0852369147', 0, 0, '-', 4, 1, NULL, NULL, '2001:448a:3070:4e1f:35e9:2a70:c51b:c3cb', NULL, NULL, NULL, NULL, NULL, NULL, 1706686894, NULL),
(30, NULL, 'Tedy Syach', 'Tedy Syach7285', '$2y$08$rXWnG7svUA.X/rPt8YIRXO5KoRkpenIkEBmeeGGW77NSPrK8K.4D2', 'tedyysyyacha@gmail.com', '0852369147', 0, 0, '-', 4, 1, NULL, NULL, '2001:448a:3070:4e1f:35e9:2a70:c51b:c3cb', NULL, NULL, NULL, NULL, NULL, NULL, 1706693998, NULL),
(31, NULL, 'Tedy Syach', 'Tedy Syach42397', '$2y$08$2ZIoPb.V0U2aGQSl0x8IKeso0yve6RE9QgAEOIxQ9zrCnqF8NZy/e', 'tedyysytyach@gmail.com', '0852369147', 0, 0, '-', 4, 1, NULL, NULL, '2001:448a:3070:37d4:9b5e:f1c3:1e1:e613', NULL, NULL, NULL, NULL, NULL, NULL, 1706748351, NULL),
(32, NULL, 'Tedy Syach', 'Tedy Syach8417', '$2y$08$vCNfAypb7j4M40mTyUdJfuybd4lBYrFvP.oWJjSUX6cIIn6M5OL8y', 'tedyys2yyac2h@gmail.com', '0852369147', 0, 0, '-', 4, 1, NULL, NULL, '2001:448a:3070:37d4:bc06:1c15:e436:ff', NULL, NULL, NULL, NULL, NULL, NULL, 1706777575, NULL),
(33, NULL, 'Tedy Syach', 'Tedy Syach55350', '$2y$08$67tR86pF7RB82BiNXtB6GuRazMFpKizdq2GE06GE./KwTJqQ1fsh.', 'tedwuwhyysyyach@gmail.com', '0852369147', 0, 0, '-', 4, 1, NULL, NULL, '2001:448a:3070:37d4:407f:371e:4b24:7484', NULL, NULL, NULL, NULL, NULL, NULL, 1706777647, NULL),
(34, NULL, 'Snack', 'Snack63931', '$2y$08$0m2BkXvqT.RGVKOGjVRvpe9iOw3NHbiPSUr1zahzdwMjAVF.GCR3q', 'tedyysyy568tigach@gmail.com', '0852369147', 0, 0, '-', 4, 1, NULL, NULL, '2001:448a:3070:37d4:bc06:1c15:e436:ff', NULL, NULL, NULL, NULL, NULL, NULL, 1706780070, NULL),
(35, NULL, 'Snack', 'Snack46532', '$2y$08$ZYgtNvSlttjgD.nqqM6.t.U6FR.npdcDN216vxhtyTW0WSwh04w1u', 'tedyysyyadawdach@gmail.com', '0852369147', 0, 0, '-', 4, 1, NULL, NULL, '36.74.45.140', NULL, NULL, NULL, NULL, NULL, NULL, 1706848851, NULL),
(36, NULL, 'test1', 'test168585', '$2y$08$XSDPJwmK/tf4Gqw30qyiO.lvVECdc7oAm1bStLVCToV87EO21vc.a', 'test@gmail.com', '0852369147', 0, 0, '-', 4, 1, NULL, NULL, '2001:448a:3070:37d4:a745:6684:562a:a639', NULL, NULL, NULL, NULL, NULL, NULL, 1706853897, NULL),
(37, NULL, 'Tes', 'Tes52949', '$2y$08$Pfr53yQ223Sc4CpensKf8uYBlb/ohkL5fTxaTfDkFPVjLkwLSUkXa', 'tea@hab.co', '0814554', 0, 0, '-', 4, 1, NULL, NULL, '182.1.87.66', NULL, NULL, NULL, NULL, NULL, NULL, 1706941432, NULL),
(38, NULL, 'Tes', 'Tes44208', '$2y$08$ymUxva111Fy4PKREtURpPuukPHrkmVsGDCt5lP7rzKxTLFecOjxuG', 'ajjd@ho.co', '45465487878', 0, 0, '-', 4, 1, NULL, NULL, '182.1.87.66', NULL, NULL, NULL, NULL, NULL, NULL, 1706941501, NULL),
(39, NULL, 'Ronaldo', 'Ronaldo45100', '$2y$08$0QV8wcfqzVDJ/ddHZWqCleG6D/bKDrYQ8nc6/ged3mbJFF68Sed62', 'ronaldo23@gmail.com', '09876543', 0, 0, '-', 4, 1, NULL, NULL, '2001:448a:3070:4e39:38fe:cfd5:425a:4ea4', NULL, NULL, NULL, NULL, NULL, NULL, 1707283997, NULL),
(40, NULL, 'testingCuy', 'testingCuy30017', '$2y$08$VXlipxYaUT5.bvObeLolGuk8Slj2Z.s2hz356UET8Xc.Cx4OuVdWO', 'tesbugadmin@gmail.com', '08798654', 6, 6, '-', 4, 1, NULL, NULL, '2001:448a:3070:4e39:38fe:cfd5:425a:4ea4', NULL, NULL, NULL, NULL, NULL, NULL, 1707285137, NULL),
(41, NULL, 'testingTanpaLogin', 'testingTanpaLogin42146', '$2y$08$Ch95A4OUiK.0r6Of.YAtQenBkjBSucOW80wyBo/wmBDxZZRX0l2mW', 'testyutg@gmail.com', '09876544', 6, 6, '-', 4, 1, NULL, NULL, '2001:448a:3070:4e39:38fe:cfd5:425a:4ea4', NULL, NULL, NULL, NULL, NULL, NULL, 1707285250, NULL),
(42, NULL, 'TestingTanpaLogin Lagi', 'TestingTanpaLogin Lagi70817', '$2y$08$bn/qr423YDCjlKzjCv76B.OvYpaBUspZL66ffIt6kyojeG1qgcBxy', 'tes3455@yahoo.com', '09786754', 6, 152, '-', 4, 1, NULL, NULL, '2001:448a:3070:4e39:38fe:cfd5:425a:4ea4', NULL, NULL, NULL, NULL, NULL, NULL, 1707285471, NULL),
(44, NULL, 'Tedy Syach', 'Tedy Syach79115', '$2y$08$2qH1097xnvMZ6Gh2M0GDbOh73p61xmopjtRYDGFM0kVJB5s37B7ke', 'tedyysyyach12@gmail.com', '0852369147', 6, 152, '-', 4, 1, NULL, NULL, '2001:448a:3070:5b60:f5d9:db7e:4ce1:ae57', NULL, NULL, NULL, NULL, NULL, NULL, 1708391882, NULL),
(45, NULL, 'Tedy Syach12', 'tedysyach1', '$2y$08$EDK0763tXGwpClnWmtBq9eBOzeJ39i3T1hqIThwj4UjlkWFOrkdsi', 'tedyysyyach123@gmail.com', '081280020562', 9, 22, 'link jelat', 4, 1, NULL, NULL, '2001:448a:3070:5b60:f5d9:db7e:4ce1:ae57', NULL, NULL, NULL, NULL, 'ndrgkgn7x2r3tdfjw6/1ne', 1708565276, 1708393204, '2024-02-22 01:27:56');

-- --------------------------------------------------------

--
-- Table structure for table `users_group`
--

CREATE TABLE `users_group` (
  `id_group` int(11) NOT NULL,
  `name_group` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users_group`
--

INSERT INTO `users_group` (`id_group`, `name_group`) VALUES
(1, 'SuperAdmin'),
(2, 'Administrator'),
(3, 'Member Premium'),
(4, 'Member Biasa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `cabor`
--
ALTER TABLE `cabor`
  ADD PRIMARY KEY (`id_cabor`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`);

--
-- Indexes for table `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `foto_FK` (`album_id`);

--
-- Indexes for table `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`id_lapangan`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_premium_request`
--
ALTER TABLE `member_premium_request`
  ADD PRIMARY KEY (`id_rm`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id_page`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`id_subscriber`);

--
-- Indexes for table `synchronization_plat`
--
ALTER TABLE `synchronization_plat`
  ADD PRIMARY KEY (`id_syc`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_trans`),
  ADD KEY `transaksi_FK` (`user_id`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_transdet`),
  ADD KEY `transaksi_detail_FK` (`lapangan_id`),
  ADD KEY `transaksi_detail_FK_1` (`trans_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_group`
--
ALTER TABLE `users_group`
  ADD PRIMARY KEY (`id_group`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cabor`
--
ALTER TABLE `cabor`
  MODIFY `id_cabor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jam`
--
ALTER TABLE `jam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `id_lapangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `member_premium_request`
--
ALTER TABLE `member_premium_request`
  MODIFY `id_rm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `id_subscriber` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `synchronization_plat`
--
ALTER TABLE `synchronization_plat`
  MODIFY `id_syc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id_transdet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users_group`
--
ALTER TABLE `users_group`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_FK` FOREIGN KEY (`album_id`) REFERENCES `album` (`id_album`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `transaksi_detail_FK` FOREIGN KEY (`lapangan_id`) REFERENCES `lapangan` (`id_lapangan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_detail_FK_1` FOREIGN KEY (`trans_id`) REFERENCES `transaksi` (`id_trans`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
