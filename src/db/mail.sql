-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2017 at 09:22 AM
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
(37, 'test@gmail.com'),
(30, 'check@gmail.com');

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
  `mail_history_name` text CHARACTER SET utf8 NOT NULL,
  `mail_history_subject` varchar(100) CHARACTER SET utf8 NOT NULL,
  `mail_history_content` text CHARACTER SET utf8 NOT NULL,
  `mail_history_attach` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mails_histories`
--

INSERT INTO `mails_histories` (`mail_history_id`, `mail_history_name`, `mail_history_subject`, `mail_history_content`, `mail_history_attach`) VALUES
(68, 'grimreaperld@gmail.com', 'Test send file 51', 'Check51 - include file.', 'upload/832PackageStandart.pdf'),
(67, 'grimreaperld@gmail.com', 'Test send file 50', 'Check50 - None file.', NULL),
(66, 'grimreaperld@gmail.com    nguyenanhhoanld.thienhaxaxoi@gmail.com', 'Test send file 49', 'Check49 - send multiple mail.', 'upload/997Annie Build Guide - The Professional Mid Carry.pdf'),
(64, 'grimreaperld@gmail.com', 'Test send file 47', 'Check47 - None file.', NULL),
(65, 'grimreaperld@gmail.com', 'Test send file 48', 'Check 48 - include file.', 'upload/5864088342-infinity-wallpaper.jpg');

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
  MODIFY `mail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `mails_contacts`
--
ALTER TABLE `mails_contacts`
  MODIFY `mail_contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `mails_histories`
--
ALTER TABLE `mails_histories`
  MODIFY `mail_history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
