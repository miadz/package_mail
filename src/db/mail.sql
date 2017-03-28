-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2017 at 02:23 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev_laravel_v53`
--

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

DROP TABLE IF EXISTS `mails`;
CREATE TABLE `mails` (
  `mail_id` int(11) NOT NULL,
  `mail_name` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mails`
--

INSERT INTO `mails` (`mail_id`, `mail_name`) VALUES
(4, 'grimreaperld@gmail.com'),
(9, 'sontung.buinguyen@gmail.com'),
(5, 'maily27196@gmail.com'),
(6, 'kinokonguyen0196@outlook.com'),
(8, 'ptnhuan@gmail.com'),
(11, 'nguyenanhhoanld.thienhaxaxoi@gmail.com'),
(12, 'bibiambibiam@gmail.com'),
(13, 'thanhhuy.25101996@gmail.com'),
(24, 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `mails_contacts`
--

DROP TABLE IF EXISTS `mails_contacts`;
CREATE TABLE `mails_contacts` (
  `mail_contact_id` int(11) NOT NULL,
  `mail_contact_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mail_contact_subject` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mail_contact_content` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mails_contacts`
--

INSERT INTO `mails_contacts` (`mail_contact_id`, `mail_contact_name`, `mail_contact_subject`, `mail_contact_content`) VALUES
(1, 'user01@gmail.com', 'Refund', 'Error product.'),
(6, 'grimreaperld@gmail.com', 'Error', 'Refund my money'),
(5, 'user02@gmail.com', 'Test01', 'Check01'),
(7, 'grimreaperld@gmail.com', 'Test001', 'Check001'),
(8, 'grimreaperld@gmail.com', 'Test002', 'Check002'),
(9, 'grimreaperld@gmail.com', 'Test003', 'Check003');

-- --------------------------------------------------------

--
-- Table structure for table `mails_histories`
--

DROP TABLE IF EXISTS `mails_histories`;
CREATE TABLE `mails_histories` (
  `mail_history_id` int(11) NOT NULL,
  `mail_history_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mail_history_subject` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mail_history_content` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mail_history_attach` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mails_histories`
--

INSERT INTO `mails_histories` (`mail_history_id`, `mail_history_name`, `mail_history_subject`, `mail_history_content`, `mail_history_attach`) VALUES
(55, 'grimreaperld@gmail.com', 'Test send file 38', 'Check38', NULL),
(7, 'grimreaperld@gmail.com', 'Guitar song', 'Source: (Alan Walker) Faded - Fingerstyle Guitar Cover (with TABS)\r\nName: https://www.youtube.com/watch?v=44FPny8k4DM', ''),
(52, 'grimreaperld@gmail.com', 'Test send file 35', 'Reply about "Error" with content "Refund my money"', 'upload/382Annie Build Guide - The Professional Mid Carry.pdf'),
(9, 'kinokonguyen0196@outlook.com', 'Refund', 'Reply about "Error" with content "Refund my money".\r\nWe\'re reply soon.', ''),
(10, 'grimreaperld@gmail.com', 'Refund', 'Reply about "Error" with content "Refund my money".\r\nWe\'re reply soon.', ''),
(43, 'grimreaperld@gmail.com', 'Test send file 28', 'Check28', 'upload/Annie Build Guide - The Professional Mid Carry.pdf'),
(37, 'grimreaperld@gmail.com, a@gmail.com, b@gmail.com', '', '', NULL),
(36, 'grimreaperld@gmail.com, a@gmail.com, b@gmail.com', '', '', NULL),
(54, 'grimreaperld@gmail.com, nguyenanhhoanld@gmail.com', 'Test send file 37', 'Check37', NULL),
(53, 'grimreaperld@gmail.com, nguyenanhhoanld@gmail.com', 'Test send file 36', 'Check36', 'upload/2284088342-infinity-wallpaper.jpg'),
(45, 'grimreaperld@gmail.com', 'Test send file 30', 'Check30', NULL),
(46, 'grimreaperld@gmail.com', 'Test send file 31', 'Check31', 'upload/Annie Build Guide - The Professional Mid Carry.pdf'),
(47, 'grimreaperld@gmail.com, thanhhuy.25101996@gmail.com', 'Test send file 32', 'Check32', 'upload/Capture2.PNG'),
(48, 'ptnhuan@gmail.com', 'Test', 'Check', 'upload/MkiUfl73FwRjlAtNgTczwIVX-vqQvgEblFpoIjP2ucFkkFavNfGqwhidw1bosNM-hQ=h900.png'),
(49, 'ptnhuan@gmail.com', 'Test01', 'Check01', 'upload/Annie Build Guide - The Professional Mid Carry.pdf'),
(51, 'grimreaperld@gmail.com', 'Test send file 34', 'Check34', 'upload/554Capture1.PNG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`mail_id`),
  ADD UNIQUE KEY `mail_name` (`mail_name`);

--
-- Indexes for table `mails_contacts`
--
ALTER TABLE `mails_contacts`
  ADD PRIMARY KEY (`mail_contact_id`);

--
-- Indexes for table `mails_histories`
--
ALTER TABLE `mails_histories`
  ADD PRIMARY KEY (`mail_history_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mails`
--
ALTER TABLE `mails`
  MODIFY `mail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `mails_contacts`
--
ALTER TABLE `mails_contacts`
  MODIFY `mail_contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `mails_histories`
--
ALTER TABLE `mails_histories`
  MODIFY `mail_history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
