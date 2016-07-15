-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 07, 2016 at 03:27 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `05-CV-world`
--

-- --------------------------------------------------------

--
-- Table structure for table `CV`
--

CREATE TABLE IF NOT EXISTS `CV` (
`id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `First_name` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `Last_name` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `Furigana_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Photo` text COLLATE utf8_unicode_ci NOT NULL,
  `Birth_date` date NOT NULL,
  `Gender` tinyint(1) NOT NULL,
  `Address` text COLLATE utf8_unicode_ci NOT NULL,
  `Contact_information` text COLLATE utf8_unicode_ci NOT NULL,
  `Phone` char(255) CHARACTER SET latin1 NOT NULL,
  `Self_intro` text COLLATE utf8_unicode_ci NOT NULL,
  `Marriage` tinyint(1) NOT NULL,
  `配偶者の扶養義務` tinyint(1) NOT NULL,
  `Request` text COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Career` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `CV`
--

INSERT INTO `CV` (`id`, `user_id`, `First_name`, `Last_name`, `Furigana_name`, `Photo`, `Birth_date`, `Gender`, `Address`, `Contact_information`, `Phone`, `Self_intro`, `Marriage`, `配偶者の扶養義務`, `Request`, `updated_at`, `created_at`, `Career`) VALUES
(81, 1, 'Linh', 'Dang', '', '', '1994-11-02', 0, 'Cần Thơ', '', '84-33-815-8046', 'Repudiandae consequatur laudantium esse itaque. Deleniti tenetur iusto consectetur quaerat maxime. Qui dolor error velit qui sapiente sed. Omnis dolor quia sed pariatur omnis quibusdam.', 0, 0, '', '2016-04-07 12:31:33', '2016-04-07 12:31:33', ''),
(82, 2, 'Thời Vũ', 'Cát', '', '', '1979-05-07', 1, 'Cần Thơ', '', '+84-37-250-3778', 'Queen merely remarking as it went, ''One side of the country is, you see, Alice had no idea what Latitude was, or Longitude either, but thought they were all talking at once, and ran till she had.', 0, 0, '', '2016-04-07 12:31:34', '2016-04-07 12:31:34', ''),
(83, 9, 'Thư Định', 'Giáp', '', '', '1978-11-07', 1, 'Hà Nội', '', '08 0023 2263', 'Alice more boldly: ''you know you''re growing too.'' ''Yes, but some crumbs must have imitated somebody else''s hand,'' said the Mock Turtle said: ''I''m too stiff. And the moral of that is--"The more there.', 0, 0, '', '2016-04-07 12:31:34', '2016-04-07 12:31:34', ''),
(84, 10, 'Kiếm Cần', 'Khúc', '', '', '1976-10-28', 1, 'Cần Thơ', '', '(022)059-4782', 'Footman, and began talking again. ''Dinah''ll miss me very much confused, ''I don''t quite understand you,'' she said, without even looking round. ''I''ll fetch the executioner ran wildly up and rubbed its.', 0, 0, '', '2016-04-07 12:31:34', '2016-04-07 12:31:34', ''),
(85, 11, 'Bảo Chấn', 'Đậu', '', '', '1987-01-19', 1, 'Hà Nội', '', '(08)6491-7596', 'THAT''S a good deal frightened at the March Hare. Alice was very provoking to find her way out. ''I shall be a very long silence, broken only by an occasional exclamation of ''Hjckrrh!'' from the time.', 0, 0, '', '2016-04-07 12:31:34', '2016-04-07 12:31:34', ''),
(86, 12, 'Phong Chiêu', 'Nhậm', '', '', '1983-11-24', 1, 'Hồ Chí Minh', '', '(84)(72)972-4548', 'I was a table set out under a tree a few minutes that she had succeeded in curving it down into a large canvas bag, which tied up at the window, she suddenly spread out her hand in hand with Dinah,.', 0, 0, '', '2016-04-07 12:31:34', '2016-04-07 12:31:34', ''),
(87, 13, 'Toại Thạc', 'Chu', '', '', '1990-03-10', 1, 'Hồ Chí Minh', '', '+84-710-672-3842', 'Magpie began wrapping itself up very carefully, remarking, ''I really must be a footman because he was in the middle. Alice kept her waiting!'' Alice felt a little of it?'' said the Dormouse, after.', 0, 0, '', '2016-04-07 12:31:34', '2016-04-07 12:31:34', ''),
(88, 14, '', '', '', '', '0000-00-00', 0, '', '', '', '', 0, 0, '', '2016-04-07 13:17:01', '2016-04-07 13:17:01', '');

-- --------------------------------------------------------

--
-- Table structure for table `it_skill`
--

CREATE TABLE IF NOT EXISTS `it_skill` (
`id` int(9) unsigned NOT NULL,
  `cv_id` int(6) NOT NULL,
  `skill_type` tinyint(9) NOT NULL,
  `name` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `Study-time` int(2) NOT NULL,
  `work-time` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE IF NOT EXISTS `records` (
`id` int(9) NOT NULL,
  `cv_id` int(6) NOT NULL,
  `Content` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `Date` date NOT NULL,
  `Type` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=243 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `cv_id`, `Content`, `Date`, `Type`, `created_at`, `updated_at`) VALUES
(215, 81, 'Đại học XXX - Cần Thơ', '2012-11-03', 0, '2016-04-07 12:31:34', '0000-00-00 00:00:00'),
(216, 82, 'Đại học XXX - Đà Nẵng', '2012-11-03', 0, '2016-04-07 12:31:34', '0000-00-00 00:00:00'),
(217, 83, 'Đại học XXX - Hải Phòng', '2012-11-03', 0, '2016-04-07 12:31:34', '0000-00-00 00:00:00'),
(218, 84, 'Đại học XXX - Hà Nội', '2012-11-03', 0, '2016-04-07 12:31:34', '0000-00-00 00:00:00'),
(219, 85, 'Đại học XXX - Hồ Chí Minh', '2012-11-03', 0, '2016-04-07 12:31:34', '0000-00-00 00:00:00'),
(220, 86, 'Đại học XXX - Cần Thơ', '2012-11-03', 0, '2016-04-07 12:31:34', '0000-00-00 00:00:00'),
(221, 87, 'Đại học XXX - Đà Nẵng', '2012-11-03', 0, '2016-04-07 12:31:34', '0000-00-00 00:00:00'),
(222, 81, 'Công ty Thái Đôn - Hải Phòng', '2012-12-07', 1, '2016-04-07 12:31:34', '0000-00-00 00:00:00'),
(223, 82, 'Công ty Triết Hùng - Đà Nẵng', '2012-12-07', 1, '2016-04-07 12:31:34', '0000-00-00 00:00:00'),
(224, 83, 'Công ty Giang Lễ - Cần Thơ', '2012-12-07', 1, '2016-04-07 12:31:34', '0000-00-00 00:00:00'),
(225, 84, 'Công ty Kha Hằng - Hà Nội', '2012-12-07', 1, '2016-04-07 12:31:34', '0000-00-00 00:00:00'),
(226, 85, 'Công ty Định Xuân - Cần Thơ', '2012-12-07', 1, '2016-04-07 12:31:34', '0000-00-00 00:00:00'),
(227, 86, 'Công ty Vũ Ái - Hà Nội', '2012-12-07', 1, '2016-04-07 12:31:34', '0000-00-00 00:00:00'),
(228, 87, 'Công ty Hợp Thể - Hà Nội', '2012-12-07', 1, '2016-04-07 12:31:34', '0000-00-00 00:00:00'),
(229, 81, 'Công ty Hoài Đức - Hồ Chí Minh', '2014-04-17', 1, '2016-04-07 12:31:34', '0000-00-00 00:00:00'),
(230, 82, 'Công ty An Ngọc - Hải Phòng', '2014-04-17', 1, '2016-04-07 12:31:34', '0000-00-00 00:00:00'),
(231, 83, 'Công ty Tuấn Hội - Cần Thơ', '2014-04-17', 1, '2016-04-07 12:31:34', '0000-00-00 00:00:00'),
(232, 84, 'Công ty Đạt Tín - Hải Phòng', '2014-04-17', 1, '2016-04-07 12:31:34', '0000-00-00 00:00:00'),
(233, 85, 'Công ty Ẩn Thiện - Hồ Chí Minh', '2014-04-17', 1, '2016-04-07 12:31:34', '0000-00-00 00:00:00'),
(234, 86, 'Công ty Phượng Bảo - Hà Nội', '2014-04-17', 1, '2016-04-07 12:31:34', '0000-00-00 00:00:00'),
(235, 87, 'Công ty Kính Hội - Đà Nẵng', '2014-04-17', 1, '2016-04-07 12:31:34', '0000-00-00 00:00:00'),
(236, 81, 'Đà Nẵng', '2012-12-07', 2, '2016-04-07 12:31:34', '0000-00-00 00:00:00'),
(237, 82, 'Hải Phòng', '2012-12-07', 2, '2016-04-07 12:31:34', '0000-00-00 00:00:00'),
(238, 83, 'Đà Nẵng', '2012-12-07', 2, '2016-04-07 12:31:34', '0000-00-00 00:00:00'),
(239, 84, 'Hải Phòng', '2012-12-07', 2, '2016-04-07 12:31:34', '0000-00-00 00:00:00'),
(240, 85, 'Hà Nội', '2012-12-07', 2, '2016-04-07 12:31:34', '0000-00-00 00:00:00'),
(241, 86, 'Hải Phòng', '2012-12-07', 2, '2016-04-07 12:31:34', '0000-00-00 00:00:00'),
(242, 87, 'Hồ Chí Minh', '2012-12-07', 2, '2016-04-07 12:31:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '1',
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'LinhDang', 'admin@123.com', 2, '$2y$10$froJaDNu1IXtOrrf1cz88eTjq5HPZJi9aF.bAGEikYaSogou/OZfy', 'oPniMLSvn1O2j4HlpYJEtiHg7QB6GfbEL8gV7tqkU678p6m9zJROSCdHhaGf', '0000-00-00 00:00:00', '2016-04-07 05:36:10'),
(2, 'Linh Dan', 'applicant@123.com', 0, '$2y$10$cdyqYMEypAm7U77m/Lfz3.OZ8esEjUYfK5BHh0iSr9xEaC6tL8CVK', 'hSjeA3tZ1kJhaESn4UARt89RUuSfREcisMmeJJ5iWKlm3ljVHeYygfL3ZheC', '0000-00-00 00:00:00', '2016-04-07 06:25:05'),
(3, 'Linh Dang', 'visitor@123.com', 1, '$2y$10$Oxaka1czkXEH5s70U2oWS.TCmW/lpSG0h9fVDc6ZR6SeVs8vs7SqK', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Prof. Leonie Wunsch III', 'Hyman.Schinner@example.org', 1, '$2y$10$q6CVpqgpwIWdSnlFo12mNOVhcZSh/GBEx8WnORrsh6ccUjhaL.BEu', 'G7MBQn1sBX6IsB0aMRZ3mOqaDPu0ce6S9kW83ujSGluFaewECaDvVDlO6jxr', '0000-00-00 00:00:00', '2016-04-07 05:38:13'),
(5, 'Ms. Sonya Blanda Sr.', 'fHills@example.org', 1, '$2y$10$5L/yDYKgg7PGpqoUCRurdewwI4E1In4BY2ur/ljmrw7dIe5wSY/oy', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Hardy Tremblay', 'Isabel.Bechtelar@example.com', 1, '$2y$10$omjJTFDBO5bv73i/1petbO5bfjeqTFIUEAbzHDy892pBX8p2Q9VUW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Arvilla Johnson', 'Lucile30@example.com', 1, '$2y$10$WUI482mJNXoF7cVY630AF.rCLicNktIsohtuxFkk65eDLVXIHJc.e', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Randy Doyle', 'Marianna.Waelchi@example.org', 1, '$2y$10$0DJ9dYI/UpgwJ9.Zhc1vJO0p.POWnB2grKQQtDy8VJgBAj0zbxC.i', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Wayne Hackett', 'lGoldner@example.net', 0, '$2y$10$fg/sL/g/H2HI065unHPax.eSgQEJ4KWK.qCHawqgEEBbZHaNgxQP.', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Dr. Jailyn Okuneva DDS', 'fSchiller@example.org', 0, '$2y$10$V4ymzOhMv3WUX0w1jHhppOwvS.96ARVXGk32EckOjopIxZ2zcM38i', '4LqjnmJZoCBkINR2b6C0cqOUhEXPZ8wflOo0ztd1jJoaUDFEjCdkU4ICx5mX', '0000-00-00 00:00:00', '2016-04-07 05:38:45'),
(11, 'Krystina Block II', 'Koch.Gaston@example.net', 0, '$2y$10$4Cd3n2Z2Jtnl.vvWKySgw.vmgPl0GP.cMl.gN6G3BOZUwxDVPZRHG', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Rebecca Kling', 'Beatty.Alfredo@example.org', 0, '$2y$10$shaycom4W0GL942kAXRPEeJwj5UVNeEJ8LLtXFy4DDTKhTKx/fyfu', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Joey Littel MD', 'Langworth.Alyson@example.net', 0, '$2y$10$/JLagHajHWobu4RxIZC02ern3NdLKKxgSjtQi/DmdscX18oQ6tXuq', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'lijdfn', 'linhsfg@123.com', 0, '$2y$10$BFU5D.XKssYVsWRg4FQYPepxugv90yUHay6doQxL5RnYPFI0CNpBu', '7uMwGdm5fVWN1P5UHQFLa3FFdTZpLWWaFBzeuWgL7AZcLFQm4rEfPzXHwhNO', '2016-04-07 06:17:01', '2016-04-07 06:17:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CV`
--
ALTER TABLE `CV`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_skill`
--
ALTER TABLE `it_skill`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CV`
--
ALTER TABLE `CV`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `it_skill`
--
ALTER TABLE `it_skill`
MODIFY `id` int(9) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
MODIFY `id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=243;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
