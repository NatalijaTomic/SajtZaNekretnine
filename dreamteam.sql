-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2023 at 01:32 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dreamteam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agency`
--

CREATE TABLE `tbl_agency` (
  `id` int(11) NOT NULL,
  `agency` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_agency`
--

INSERT INTO `tbl_agency` (`id`, `agency`) VALUES
(1, 'Agencija Dream Team'),
(3, 'Dream Team 2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `email` varchar(256) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `usertype` int(11) DEFAULT NULL,
  `lastname` varchar(256) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `city` varchar(256) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `agency_id` int(11) DEFAULT NULL,
  `agent_licence` varchar(10) DEFAULT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`id`, `username`, `password`, `create_at`, `email`, `name`, `usertype`, `lastname`, `phone`, `city`, `birthdate`, `agency_id`, `agent_licence`, `status_id`) VALUES
(1, 'admin', '$2y$10$3ZnwXA1hl0oSTOmnRC7KRu4jh0d8eVsZfIWpT.6nPuuvpb.MU96tW', '2023-04-26 05:37:37', '', 'admin', 0, '', '', '', NULL, 0, '', 1),
(2, 'user', '$2y$10$3ZnwXA1hl0oSTOmnRC7KRu4jh0d8eVsZfIWpT.6nPuuvpb.MU96tW', '2023-04-26 05:36:52', '', 'User1', 1, '', '', '', NULL, 0, '', 1),
(4, 'korisnik', '$2y$10$NDizqYJGVlpNpyAPYzgV0e5WSylzodjujafdb1gBXTpcG75CxL32q', '2023-04-26 05:10:45', 'milicastojkovic@gmail.com', 'test', 1, 'Stojkovic', NULL, NULL, NULL, NULL, NULL, 3),
(5, 'test', '$2y$10$SUxBohq.z/b4usV8LRG36Oys8LWHtaZrxHolM4aX8wZ/zv3Lkvs3G', '2023-04-16 20:04:53', 'test@test.com', 'test', 1, 'test', NULL, NULL, NULL, NULL, NULL, 3),
(6, 'mogul', '$2y$10$DVITsIhDXP.luvIu8mAidOw6Z0w4EO7hJyxvK.61RYIELD/iebLlq', '2023-04-16 19:53:13', 'svetozar.stojkovic@mogul.com', 'test mogul', 2, 'Stojkovic', NULL, NULL, NULL, 1, NULL, 3),
(7, 't4', '$2y$10$5lxdt4z9xTjr3j3MAI3dL.wGh/Breejzdxfi7..eX00qDJYbNGZx2', '2023-04-16 19:56:48', 'tes4t@test.com', 'Test 4', 3, 'ln4', NULL, NULL, NULL, 3, '1234123412', 3),
(8, 'test10', '$2y$10$Mn3FLE5s5OSO376.rG3Z6.JngsCzm2Zxv4qqiY1EwDWTXv0tzn04W', '2023-04-16 21:13:54', 'test10@test.com', 'test10', 2, 'test', '+381638044653', 'Beograd', '0000-00-00', 1, '1234123412', 3),
(9, 'user999', '$2y$10$6NDgj.qADfmkxKXi00icC.QSgJ7nK.PwgUNaz6tJzrmORTQW1dKKG', '2023-04-16 21:20:35', 'user99@test.com', 'test99', 2, '99', '+381638044653', 'Beograd', '0000-00-00', 1, 'testtest', 3),
(10, 'nikmaram', '$2y$10$lTrijO6sbb9aLTX9QkyAz.bThuDoCDqlTELi14UB.WJ.CCqi7utOS', '2023-05-29 15:11:09', 'maranik87@gmail.com', 'Marija', 1, 'Nik?evi?', '+381629877899', 'Kraljevo', '0000-00-00', 1, '657', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_property`
--

CREATE TABLE `tbl_property` (
  `id` int(11) NOT NULL,
  `adresa` varchar(256) NOT NULL,
  `opis` varchar(50) NOT NULL,
  `cena` int(11) NOT NULL,
  `slika` varchar(50) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_property`
--

INSERT INTO `tbl_property` (`id`, `adresa`, `opis`, `cena`, `slika`, `status_id`) VALUES
(1, 'Milesevska 12, Vracar, Beograd', 'dvokrevetna', 135000, 'img_1', 1),
(2, 'Miloja Zakića 18, Filmski grad, Beograd', 'trokrevetna', 95000, 'img_2', 1),
(3, 'Senjačka 7, Senjak, Beograd', 'petokrevetna', 150000, 'img_3', 1),
(4, 'Jurija Gagarina 70, Novi beograd, Srbija', 'dvokrevetna', 128000, 'img_4', 1),
(5, 'Blagoja Parovića 67, Beograd', 'jednosoban', 154000, 'img_5', 1),
(7, 'Vojvode Šupljikca 45, Beograd', 'jednoiposoban', 345000, 'img_6', 0),
(9, 'Vojvode Stepe 145, Beograd', 'trosoban', 345000, 'img_8', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id` int(11) NOT NULL,
  `status` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`id`, `status`) VALUES
(1, 'active'),
(2, 'deactive'),
(3, 'request'),
(4, 'sold');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_agency`
--
ALTER TABLE `tbl_agency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_property`
--
ALTER TABLE `tbl_property`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_agency`
--
ALTER TABLE `tbl_agency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_property`
--
ALTER TABLE `tbl_property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
