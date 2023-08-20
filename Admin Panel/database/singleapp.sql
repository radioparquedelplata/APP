-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2021 at 11:06 AM
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
-- Database: `singleapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `server_key` varchar(2500) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `server_key`, `create_at`) VALUES
(1, 'Admin', 'admin@email.com', '$2y$10$vrARjldXebr5mCZEAcSQIuwsLVc2TRzp2tlkkIkd2IC8MeuhqCBE6', 'dsad dsad sada', '2019-02-26 10:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `applist`
--

CREATE TABLE `applist` (
  `id` int(11) NOT NULL,
  `app_name` varchar(255) NOT NULL,
  `radio_stream` varchar(255) NOT NULL,
  `tv_stream` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `facebook_id` varchar(255) NOT NULL,
  `admob_id` varchar(255) NOT NULL,
  `admob_banner_id` varchar(255) NOT NULL,
  `admob_interstitial_id` varchar(255) NOT NULL,
  `admob_native_id` varchar(255) NOT NULL,
  `start_color` varchar(255) NOT NULL,
  `end_color` varchar(255) NOT NULL,
  `cover_image` varchar(2500) NOT NULL,
  `background_image` varchar(2500) NOT NULL,
  `about_us` varchar(2500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `our_service` varchar(2500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `privacy_policy` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `create_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `device_token`
--

CREATE TABLE `device_token` (
  `id` int(11) NOT NULL,
  `device_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `device_token` varchar(2500) COLLATE utf8_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `description` varchar(2500) NOT NULL,
  `tracking_id` varchar(255) NOT NULL,
  `address` varchar(2500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `host` varchar(2500) CHARACTER SET utf8 NOT NULL,
  `username` varchar(2500) CHARACTER SET utf8 NOT NULL,
  `password` varchar(2500) CHARACTER SET utf8 NOT NULL,
  `encryption` varchar(2500) CHARACTER SET utf8 NOT NULL,
  `port` varchar(255) NOT NULL,
  `reply_to` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `title`, `logo`, `email`, `contact`, `description`, `tracking_id`, `address`, `host`, `username`, `password`, `encryption`, `port`, `reply_to`) VALUES
(1, 'Single App', 'uploads/logo/73294_1589510843.jpg', 'admin@sekhontech.com', '1234567886', 'All major Indian FM radio stations ready for you to enjoy free music and much more.', 'fsdf fdsf sfdsfds', 'SCF 53, Phase 2, Sector 54, Sahibzada Ajit Singh Nagar, 160055', 'smtp.gmail.com', 'ekamsoftwares1234@gmail.com', 'ekamsoftwares', 'tls', '465', 'no-reply@multibroadcast.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applist`
--
ALTER TABLE `applist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device_token`
--
ALTER TABLE `device_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applist`
--
ALTER TABLE `applist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `device_token`
--
ALTER TABLE `device_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
