-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2017 at 08:30 AM
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
CREATE DATABASE IF NOT EXISTS `dev_laravel_v53` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `dev_laravel_v53`;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `protected` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`, `protected`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', '{"_superadmin":1}', 0, '2017-02-16 19:07:34', '2017-02-16 19:07:34'),
(2, 'editor', '{"_user-editor":1,"_group-editor":1}', 0, '2017-02-16 19:07:34', '2017-02-16 19:07:34'),
(3, 'base admin', '{"_user-editor":1}', 0, '2017-02-16 19:07:34', '2017-02-16 19:07:34');

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
(7, 'test@gmail.com'),
(5, 'maily27196@gmail.com'),
(6, 'kinokonguyen0196@outlook.com');

-- --------------------------------------------------------

--
-- Table structure for table `mails_histories`
--

DROP TABLE IF EXISTS `mails_histories`;
CREATE TABLE `mails_histories` (
  `mail_history_id` int(11) DEFAULT NULL,
  `mail_history_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mail_history_content` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2012_12_06_225988_migration_cartalyst_sentry_install_throttle', 1),
(2, '2014_02_19_095545_create_users_table', 1),
(3, '2014_02_19_095623_create_user_groups_table', 1),
(4, '2014_02_19_095637_create_groups_table', 1),
(5, '2014_02_19_160516_create_permission_table', 1),
(6, '2014_02_26_165011_create_user_profile_table', 1),
(7, '2014_05_06_122145_create_profile_field_types', 1),
(8, '2014_05_06_122155_create_profile_field', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

DROP TABLE IF EXISTS `permission`;
CREATE TABLE `permission` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permission` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `protected` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `description`, `permission`, `protected`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', '_superadmin', 0, '2017-02-16 19:07:34', '2017-02-16 19:07:34'),
(2, 'user editor', '_user-editor', 0, '2017-02-16 19:07:34', '2017-02-16 19:07:34'),
(3, 'group editor', '_group-editor', 0, '2017-02-16 19:07:34', '2017-02-16 19:07:34'),
(4, 'permission editor', '_permission-editor', 0, '2017-02-16 19:07:34', '2017-02-16 19:07:34'),
(5, 'profile type editor', '_profile-editor', 0, '2017-02-16 19:07:34', '2017-02-16 19:07:34');

-- --------------------------------------------------------

--
-- Table structure for table `profile_field`
--

DROP TABLE IF EXISTS `profile_field`;
CREATE TABLE `profile_field` (
  `id` int(10) UNSIGNED NOT NULL,
  `profile_id` int(10) UNSIGNED NOT NULL,
  `profile_field_type_id` int(10) UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile_field_type`
--

DROP TABLE IF EXISTS `profile_field_type`;
CREATE TABLE `profile_field_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `samples`
--

DROP TABLE IF EXISTS `samples`;
CREATE TABLE `samples` (
  `sample_id` int(11) NOT NULL,
  `sample_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `sample_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `samples`
--

INSERT INTO `samples` (`sample_id`, `sample_name`, `category_id`, `sample_image`, `status_id`) VALUES
(1, 'Ronaldo 7', 0, '', 0),
(2, 'Messi', 0, '', 0),
(3, 'Rooney', 0, '', 0),
(4, 'Mourinho', 0, '', 0),
(5, 'Van Persie', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `samples_categories`
--

DROP TABLE IF EXISTS `samples_categories`;
CREATE TABLE `samples_categories` (
  `sample_category_id` int(11) NOT NULL,
  `sample_category_name` varchar(55) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `samples_categories`
--

INSERT INTO `samples_categories` (`sample_category_id`, `sample_category_name`) VALUES
(6, 'SSH'),
(2, 'Var'),
(3, 'List'),
(4, 'Get'),
(5, 'Post'),
(7, 'kkl');

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

DROP TABLE IF EXISTS `throttle`;
CREATE TABLE `throttle` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `ip_address`, `attempts`, `suspended`, `banned`, `last_attempt_at`, `suspended_at`, `banned_at`) VALUES
(1, 1, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(2, 2, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `protected` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `activated`, `banned`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `protected`, `created_at`, `updated_at`) VALUES
(1, 'admin@admin.com', '$2y$10$8OWc3y5qDAPGkd/G/vr1Je4pYtqlDKRt4SJonbiXKb6vA.AaJVZPK', NULL, 1, 0, NULL, NULL, '2017-03-14 19:57:13', '$2y$10$sEECRTICxCEfU.CHb9xcZuDifqP/lTTesumjzw/LGtDJhKmcoegKG', NULL, 0, '2017-02-16 19:07:34', '2017-03-14 19:57:13');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`user_id`, `group_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

DROP TABLE IF EXISTS `user_profile`;
CREATE TABLE `user_profile` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vat` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` blob,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `code`, `vat`, `first_name`, `last_name`, `phone`, `state`, `city`, `country`, `zip`, `address`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-02-16 19:07:34', '2017-02-16 19:07:34'),
(2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-02-17 02:09:29', '2017-02-17 02:09:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `groups_name_unique` (`name`);

--
-- Indexes for table `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`mail_id`),
  ADD UNIQUE KEY `mail_name` (`mail_name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_field`
--
ALTER TABLE `profile_field`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profile_field_profile_id_profile_field_type_id_unique` (`profile_id`,`profile_field_type_id`),
  ADD KEY `profile_field_profile_field_type_id_foreign` (`profile_field_type_id`);

--
-- Indexes for table `profile_field_type`
--
ALTER TABLE `profile_field_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `samples`
--
ALTER TABLE `samples`
  ADD PRIMARY KEY (`sample_id`);

--
-- Indexes for table `samples_categories`
--
ALTER TABLE `samples_categories`
  ADD PRIMARY KEY (`sample_category_id`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_index` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_activation_code_index` (`activation_code`),
  ADD KEY `users_reset_password_code_index` (`reset_password_code`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`user_id`,`group_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_profile_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mails`
--
ALTER TABLE `mails`
  MODIFY `mail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `profile_field`
--
ALTER TABLE `profile_field`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profile_field_type`
--
ALTER TABLE `profile_field_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `samples`
--
ALTER TABLE `samples`
  MODIFY `sample_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `samples_categories`
--
ALTER TABLE `samples_categories`
  MODIFY `sample_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
