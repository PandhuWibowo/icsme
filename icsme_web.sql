-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 23, 2018 at 02:54 PM
-- Server version: 5.5.59-cll
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icsme_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_confirmation`
--

CREATE TABLE `data_confirmation` (
  `confirmation_id` int(11) NOT NULL,
  `sender_name` varchar(100) NOT NULL,
  `tranfser_date` date DEFAULT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `account_number` varchar(50) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `payment_slip` varchar(250) DEFAULT NULL,
  `input_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_confirmation`
--

INSERT INTO `data_confirmation` (`confirmation_id`, `sender_name`, `tranfser_date`, `bank`, `account_number`, `amount`, `payment_slip`, `input_date`) VALUES
(1, 'Rifal', '2018-07-16', 'BCA', '12345678900', 3, '1505_m00_i104_n054_f_c06_top-view-sea-ships-seamless-background-.jpg', '2018-07-16 06:14:34'),
(2, 'Mira Maulida', '2018-07-16', 'ABC Bank', '12345678', 0, 'Market_Access_Worldwide_-_International_Business_Development_-_International_Strategic_Partnership.pdf', '2018-07-16 06:18:15');

-- --------------------------------------------------------

--
-- Table structure for table `data_member`
--

CREATE TABLE `data_member` (
  `member_id` int(11) NOT NULL,
  `user_type` varchar(50) DEFAULT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` text,
  `institution` varchar(100) DEFAULT NULL,
  `submission_id` varchar(100) DEFAULT NULL,
  `input_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_member`
--

INSERT INTO `data_member` (`member_id`, `user_type`, `fullname`, `email`, `phone`, `address`, `institution`, `submission_id`, `input_date`) VALUES
(1, 'professional', 'Waluyo Hatmoko', 'whatmoko@yahoo.com', '08122103205', 'Jalan Ir. H. Juanda 193, Bandung 40135', 'Research Center for Water Resources, Agency of Research and Development, Ministry of Public Works', '', '2018-07-16 02:55:32'),
(2, 'professional', 'Rifal', 'rifal.mcrs@gmail.com', '085776175549', 'Tytyan Indah', 'Tidak ada', '', '2018-07-16 03:43:46'),
(3, 'professional', 'lemi ', 'mfaguslemi@gmail.com', '081294643280', 'jl. tes', 'diatrans', '', '2018-07-16 06:10:01'),
(4, 'professional', 'Mira Maulida', 'miramaulida@yahoo.com', '+6281382002233', 'Jl. ABC\r\nXYZ', 'M Corp', '', '2018-07-16 06:16:40'),
(5, 'professional', 'Mira Maulida', 'miramaulida@yahoo.com', '+6281382002233', 'Jl. ABC\r\nXYZ', 'M Corp', '', '2018-07-16 06:36:55'),
(6, 'professional', 'Lemi', 'mfaguslemi@gmail.com', '081294643280', 'Jalan tulalit', 'Diatrans', '', '2018-07-16 06:55:26'),
(8, 'professional', 'Susi Hidayah', 'hidayahsusi@gmail.com', '0819-3195-2559', 'Balai Irigasi Jl. Cut Meutia 147 (Depan Unisma)', 'Experimental Station for Irrigation', '', '2018-07-17 04:21:10'),
(9, 'professional', 'Adji Krisbandono', 'adji.krisbandono@pu.go.id', '081317673830', 'Jl. Pattimura 20 Kebayoran Baru, Jakarta Selatan', 'Ministry of Public Works and Housing', '', '2018-07-18 08:44:26'),
(10, 'professional', 'Ai Yeni Rohaeni', 'ayeni2612@gmail.com', '081322233708', 'Jl. Ir. H. Juanda No 193 Bandung', 'Puslitbang Sumber Daya Air', '', '2018-07-20 03:41:44'),
(11, 'professional', 'Ai Yeni Rohaeni', 'ayeni2612@gmail.com', '081322233708', 'Jl. Ir. H. Juanda No. 193 Bandung', 'Puslitbang Sumber Daya Air', '', '2018-07-20 03:43:36'),
(12, 'professional', 'Adji Krisbandono', 'adji.krisbandono@pu.go.id', '081317673830', 'Jl. Pattimura 20 Kebayoran Baru, Jakarta Selatan', 'Ministry of Public Works and Housing', '', '2018-07-20 07:43:30'),
(13, 'professional', 'Krisna Sudiro', 'krisna@sudiros.com', '62818797818', 'dharmawangsa sq ', 'webgopek', '', '2018-07-20 09:31:27'),
(14, 'professional', 'gfuff', 'hghhj', 'khi', 'ugig', '7uiu', '', '2018-07-20 10:36:11'),
(15, 'professional', 'Dali Sadli Mulia', 'dali.sadli.mulia@gmail.com', '08119932245', 'Jl. Delman Indah V no.16, Tanah Kusir', 'Star Energy Geothermal', '', '2018-07-20 23:19:55');

-- --------------------------------------------------------

--
-- Table structure for table `data_payment`
--

CREATE TABLE `data_payment` (
  `payment_id` int(11) NOT NULL,
  `order_number` varchar(50) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `product` varchar(100) DEFAULT NULL,
  `quantity` tinyint(4) NOT NULL DEFAULT '1',
  `price` float DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `input_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_payment`
--

INSERT INTO `data_payment` (`payment_id`, `order_number`, `member_id`, `product`, `quantity`, `price`, `subtotal`, `input_date`) VALUES
(23, 'PO14173758', 14, 'PRESENTER - Early Bird', 1, 250, 250, '2018-07-20 10:37:58'),
(22, 'PO12144403', 12, 'PRESENTER - Early Bird', 1, 250, 250, '2018-07-20 07:44:03'),
(4, 'po_2104446', 2, 'PRESENTER - Early Bird', 1, 250, 250, '2018-07-16 03:44:46'),
(5, 'po_3131024', 3, 'PRESENTER - Early Bird', 1, 250, 250, '2018-07-16 06:10:24'),
(6, 'po_4131657', 4, 'PRESENTER - Early Bird', 1, 250, 250, '2018-07-16 06:16:57'),
(7, 'po_6135539', 6, 'PRESENTER - Early Bird', 2, 250, 500, '2018-07-16 06:55:39');

-- --------------------------------------------------------

--
-- Table structure for table `master_user`
--

CREATE TABLE `master_user` (
  `user_id` mediumint(9) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `level` enum('Superadmin','Admin','Standard','Employee','HRD','Marketing 1','Marketing 2') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Admin',
  `level_id` tinyint(4) NOT NULL DEFAULT '2',
  `fullname` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `gender` enum('Pria','Wanita') CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT 'Pria',
  `address` varchar(250) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `phone` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `mobile` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `picture` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `master_user`
--

INSERT INTO `master_user` (`user_id`, `username`, `password`, `level`, `level_id`, `fullname`, `gender`, `address`, `phone`, `mobile`, `email`, `picture`) VALUES
(1, 'adminsyx', 'e3f65bd4202d7cef4ce8e9849f4e653b', 'Superadmin', 1, 'Djono Amidjojo', 'Pria', '\nJl. TB. Simatupang 36\n', '123456', '0857820948844', 'djonoamidjojo@gmail.com', '1457541403-best-production-icon.png'),
(2, 'admin', '9ec704dfffbd6b3a2fe4584c019015f1', 'Admin', 2, 'Webgopek', 'Pria', '', '', '', 'admin@webgopek.com', '1466134954-1459936677-visisoft_anime.gif'),
(3, 'krisna', '9de218ca194f2093206f0fb9e5371475', 'Admin', 2, 'krisna sudiro', 'Pria', '', '', '', 'krisna@sudiros.com', '1466134932-1464255401-webgopek_logo.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `data_confirmation`
--
ALTER TABLE `data_confirmation`
  ADD PRIMARY KEY (`confirmation_id`);

--
-- Indexes for table `data_member`
--
ALTER TABLE `data_member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `data_payment`
--
ALTER TABLE `data_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `master_user`
--
ALTER TABLE `master_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_confirmation`
--
ALTER TABLE `data_confirmation`
  MODIFY `confirmation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_member`
--
ALTER TABLE `data_member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `data_payment`
--
ALTER TABLE `data_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `master_user`
--
ALTER TABLE `master_user`
  MODIFY `user_id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
