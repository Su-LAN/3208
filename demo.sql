-- phpMyAdmin SQL Dump
-- version 5.0.4deb2~bpo10+1+bionic1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 10, 2021 at 12:27 PM
-- Server version: 5.7.35-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `collect`
--

CREATE TABLE `collect` (
  `username` varchar(15) NOT NULL,
  `file_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collect`
--

INSERT INTO `collect` (`username`, `file_id`) VALUES
('lansu123', 45),
('SU', 45),
('lansu123', 47),
('lansu123', 48),
('lansu123', 49),
('SU', 49),
('SU', 51),
('SU', 88);

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `username` varchar(15) NOT NULL,
  `file_id` int(11) NOT NULL,
  `y_n` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`username`, `file_id`, `y_n`) VALUES
('1', 45, 1),
('lansu123', 45, 0),
('lansu123', 46, 0),
('lansu123', 47, 1),
('lansu123', 48, 1),
('lansu123', 50, 1),
('lansu123', 88, 1),
('LS', 45, 1),
('SU', 45, 1);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `filename` text NOT NULL,
  `path` text NOT NULL,
  `username` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `filename`, `path`, `username`) VALUES
(45, 'sun.jpg', '/var/www/htdocs/infs3200/uploads/sun.jpg', '1'),
(46, 'dog-puppy-on-garden.jpg', '/var/www/htdocs/infs3200/uploads/dog-puppy-on-garden.jpg', 'lansu123'),
(47, 'Screen_Shot_2021-04-21_at_9_51_24_pm.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-04-21_at_9_51_24_pm.png', 'lansu123'),
(48, '3f34d130c3c6406d89b24cfc0cec3fe4.gif', '/var/www/htdocs/infs3200/uploads/3f34d130c3c6406d89b24cfc0cec3fe4.gif', '1'),
(49, 'img-00d4e7a09729aef3a34984d47d34ee0a.jpg', '/var/www/htdocs/infs3200/uploads/img-00d4e7a09729aef3a34984d47d34ee0a.jpg', '1'),
(50, 'img-3c1c9127ff71e4dfe635141f223bf268.jpg', '/var/www/htdocs/infs3200/uploads/img-3c1c9127ff71e4dfe635141f223bf268.jpg', '1'),
(51, 'img-3c2ca2845c5451ac142b37add4d60d26.jpg', '/var/www/htdocs/infs3200/uploads/img-3c2ca2845c5451ac142b37add4d60d26.jpg', '1'),
(52, 'Screen_Shot_2021-04-27_at_4_14_35_pm.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-04-27_at_4_14_35_pm.png', 'lansu123'),
(53, 'Screen_Shot_2021-04-27_at_3_05_00_pm.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-04-27_at_3_05_00_pm.png', 'lansu123'),
(54, 'Screen_Shot_2021-03-24_at_3_02_05_pm.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-03-24_at_3_02_05_pm.png', 'lansu123'),
(55, 'Screen_Shot_2021-03-25_at_12_30_41_am.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-03-25_at_12_30_41_am.png', 'lansu123'),
(56, 'Screen_Shot_2021-05-04_at_1_23_54_pm.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-05-04_at_1_23_54_pm.png', 'lansu123'),
(57, 'Screen_Shot_2021-05-04_at_1_23_54_pm1.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-05-04_at_1_23_54_pm1.png', 'lansu123'),
(58, 'Screen_Shot_2021-05-03_at_11_56_13_pm.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-05-03_at_11_56_13_pm.png', 'lansu123'),
(59, 'Screen_Shot_2021-05-04_at_1_33_09_pm.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-05-04_at_1_33_09_pm.png', 'lansu123'),
(60, 'Screen_Shot_2021-05-04_at_1_33_13_pm.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-05-04_at_1_33_13_pm.png', 'lansu123'),
(61, 'Screen_Shot_2021-05-04_at_1_33_09_pm1.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-05-04_at_1_33_09_pm1.png', 'lansu123'),
(62, 'Screen_Shot_2021-05-04_at_1_33_13_pm1.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-05-04_at_1_33_13_pm1.png', 'lansu123'),
(63, 'Screen_Shot_2021-05-04_at_1_33_09_pm2.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-05-04_at_1_33_09_pm2.png', 'lansu123'),
(64, 'Screen_Shot_2021-05-04_at_1_33_13_pm2.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-05-04_at_1_33_13_pm2.png', 'lansu123'),
(65, 'Screen_Shot_2021-05-04_at_1_33_09_pm3.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-05-04_at_1_33_09_pm3.png', 'lansu123'),
(66, 'Screen_Shot_2021-05-04_at_1_33_13_pm3.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-05-04_at_1_33_13_pm3.png', 'lansu123'),
(67, 'Screen_Shot_2021-05-03_at_11_56_13_pm1.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-05-03_at_11_56_13_pm1.png', 'lansu123'),
(68, 'Screen_Shot_2021-05-03_at_11_56_13_pm2.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-05-03_at_11_56_13_pm2.png', 'lansu123'),
(69, 'Screen_Shot_2021-05-04_at_1_35_26_pm.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-05-04_at_1_35_26_pm.png', 'lansu123'),
(70, 'Screen_Shot_2021-05-04_at_1_35_28_pm.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-05-04_at_1_35_28_pm.png', 'lansu123'),
(71, 'Screen_Shot_2021-05-04_at_1_35_26_pm1.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-05-04_at_1_35_26_pm1.png', 'lansu123'),
(72, 'Screen_Shot_2021-05-04_at_1_35_28_pm1.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-05-04_at_1_35_28_pm1.png', 'lansu123'),
(73, 'Screen_Shot_2021-05-04_at_1_35_26_pm2.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-05-04_at_1_35_26_pm2.png', 'lansu123'),
(74, 'Screen_Shot_2021-05-04_at_1_39_45_pm.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-05-04_at_1_39_45_pm.png', 'lansu123'),
(75, 'Screen_Shot_2021-05-04_at_1_39_50_pm.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-05-04_at_1_39_50_pm.png', 'lansu123'),
(76, 'Screen_Shot_2021-05-04_at_1_39_45_pm1.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-05-04_at_1_39_45_pm1.png', 'lansu123'),
(77, 'Screen_Shot_2021-05-04_at_1_39_50_pm1.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-05-04_at_1_39_50_pm1.png', 'lansu123'),
(78, 'Screen_Shot_2021-05-04_at_1_35_28_pm2.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-05-04_at_1_35_28_pm2.png', 'lansu123'),
(79, 'Screen_Shot_2021-05-04_at_1_39_45_pm2.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-05-04_at_1_39_45_pm2.png', 'lansu123'),
(80, 'Screen_Shot_2021-05-04_at_1_39_50_pm2.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-05-04_at_1_39_50_pm2.png', 'lansu123'),
(81, 'Screen_Shot_2021-05-12_at_11_03_05_pm.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-05-12_at_11_03_05_pm.png', 'lansu123'),
(83, 'Screen_Shot_2021-05-12_at_12_01_06_pm1.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-05-12_at_12_01_06_pm1.png', 'anonymous'),
(84, 'Screen_Shot_2021-05-12_at_12_01_19_pm.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-05-12_at_12_01_19_pm.png', 'lansu123'),
(85, 'Screen_Shot_2021-05-12_at_1_09_05_am.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-05-12_at_1_09_05_am.png', 'lansu123'),
(86, 'Screen_Shot_2021-05-12_at_12_01_06_pm2.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-05-12_at_12_01_06_pm2.png', 'lansu123'),
(87, 'Screen_Shot_2021-05-12_at_12_01_19_pm1.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-05-12_at_12_01_19_pm1.png', 'anonymous'),
(88, 'Screen_Shot_2021-05-12_at_1_09_05_am1.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-05-12_at_1_09_05_am1.png', 'anonymous'),
(89, 'Screen_Shot_2021-05-15_at_6_07_51_pm.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-05-15_at_6_07_51_pm.png', 'anonymous'),
(90, 'Screen_Shot_2021-05-15_at_6_09_00_pm.png', '/var/www/htdocs/infs3200/uploads/Screen_Shot_2021-05-15_at_6_09_00_pm.png', 'anonymous'),
(91, 'Page_3.png', '/var/www/htdocs/infs3200/uploads/Page_3.png', 'anonymous');

-- --------------------------------------------------------

--
-- Table structure for table `file_description`
--

CREATE TABLE `file_description` (
  `username` varchar(30) NOT NULL,
  `file_id` int(11) NOT NULL,
  `description` text,
  `id` int(15) NOT NULL,
  `ip_address` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_description`
--

INSERT INTO `file_description` (`username`, `file_id`, `description`, `id`, `ip_address`) VALUES
('Anonymous', 45, 'good', 6, '172.23.119.81'),
('Anonymous', 45, 'good', 17223, '172.23.119.81'),
('Anonymous', 45, 'w', 17224, NULL),
('Anonymous***.**', 45, 'good', 17225, NULL),
('Anonymous***.**', 45, 'good', 17226, NULL),
('Anonymous***.**', 46, 'a d s f', 17227, NULL),
('Anonymous17223*', 46, '111', 17228, NULL),
('Anonymous172.23', 46, '111', 17229, NULL),
('Anonymous172.23', 46, '2', 17230, NULL),
('Anonymous172.23.***.***', 46, 'good', 17231, NULL),
('Anonymous172.23.***.***', 45, '1', 17232, '172.23.119.81'),
('lansu123', 45, '123', 17233, NULL),
('lansu123', 45, 'adf', 17234, NULL),
('Anonymous172.23.***.***', 45, 'sa', 17235, '172.23.119.81'),
('Anonymous172.23.***.***', 48, 'dank memes', 17236, '172.23.119.81'),
('lansu123', 45, 'nihao', 17237, NULL),
('Anonymous172.23.***.***', 45, 'nishuosm ', 17238, '172.23.119.81'),
('Anonymous172.23.***.***', 45, 'i LOVE INFS3202', 17239, '172.23.119.81'),
('Anonymous172.23.***.***', 47, 'Hi', 17240, '172.23.119.81'),
('lansu123', 45, 'a', 17241, NULL),
('lansu123', 50, 'nonono', 17242, NULL),
('Anonymous172.23.***.***', 45, 'nihao', 17243, '172.23.119.81'),
('Anonymous172.23.***.***', 45, 'sss', 17244, '172.23.119.81'),
('lansu123', 45, 'la', 17245, NULL),
('Anonymous172.23.***.***', 45, '12', 17246, '172.23.119.81'),
('Anonymous172.23.***.***', 45, 'good', 17247, '172.23.119.81'),
('Anonymous172.23.***.***', 57, 'lalal', 17248, '172.23.119.81'),
('lansu123', 45, 'k', 17249, NULL),
('lansu123', 45, 'k', 17250, NULL),
('lansu123', 45, 'k', 17251, NULL),
('lansu123', 45, 'k', 17252, NULL),
('lansu123', 45, 'k', 17253, NULL),
('lansu123', 45, 'k', 17254, NULL),
('lansu123', 45, '1', 17255, NULL),
('lansu123', 45, 'kkk', 17256, NULL),
('lansu123', 45, '1', 17257, NULL),
('lansu123', 45, 'infs 3200', 17258, NULL),
('lansu123', 45, 'infs 3200', 17259, NULL),
('lansu123', 45, 'infs 3200', 17260, NULL),
('lansu123', 45, 'infs 3200', 17261, NULL),
('lansu123', 45, 'infs 3200', 17262, NULL),
('Anonymous172.23.***.***', 79, '?', 17263, '172.23.119.81'),
('Anonymous172.23.***.***', 79, 'good', 17264, '172.23.119.81'),
('Anonymous172.23.***.***', 79, 'lei', 17265, '172.23.119.81'),
('Anonymous172.23.***.***', 80, '???', 17266, '172.23.119.81'),
('Anonymous172.23.***.***', 80, 'f?f', 17267, '172.23.119.81'),
('Anonymous172.23.***.***', 80, '???', 17268, '172.23.119.81'),
('Anonymous172.23.***.***', 45, 'asdf', 17269, '172.23.119.81');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `txn_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payer_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payer_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `price` float(10,2) NOT NULL,
  `currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'USD',
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `currency`, `status`) VALUES
(1, 'change name card', '', 14.99, 'USD', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sample_data`
--

CREATE TABLE `sample_data` (
  `id` int(10) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `age` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(256) NOT NULL,
  `r_date` date NOT NULL,
  `is_confirm` int(2) NOT NULL,
  `phone_num` int(20) DEFAULT NULL,
  `path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `email`, `r_date`, `is_confirm`, `phone_num`, `path`) VALUES
('1', '12', 'lansu@gamil.com', '2021-04-07', 0, NULL, 'user.png'),
('alex', 'lansu123', 'shiyansu777@gmail.com', '2021-04-27', 1, NULL, 'user.png'),
('Anonymous', 'Anonymous', '', '2021-05-20', 1, NULL, ''),
('dank memes', 'Password123~', '123@123.com.au', '2021-04-28', 0, NULL, 'user.png'),
('infs', 'lansu123', 'lan1@qq2.com', '2021-04-24', 0, 1442123, 'Screen_Shot_2021-04-08_at_3_05_29_am.png'),
('Jason', 'Wangjiancong138', 'w1094426212@gmail.com', '2021-05-15', 0, NULL, 'user.png'),
('LAN', '$2y$10$HVA.vqRKNgwB09xcyC', 'lan@qq2.com', '2021-05-16', 0, NULL, 'user.png'),
('lansii', 'lansus@las.com', 'lansu123', '2021-04-20', 0, NULL, 'user.png'),
('lansu111', 'Ls990905', 'lan18310086356@gmail.com', '2021-04-27', 0, NULL, 'user.png'),
('lansu123', '$2y$10$5fQE/IfxaiHaolj4qFP5BuaAVhAieJxml0kQlVxRfzHDKpgaTy4Cy', 'lan1830086356@gmail.com', '2021-04-08', 1, 12387635, 'Screen_Shot_2021-05-04_at_1_39_45_pm.png'),
('laolan', 'Lan990905', '39042376@qq.com', '2021-04-29', 1, 123456, 'user.png'),
('LS', 'lan@gmail.com', 'lansu123', '2021-04-20', 0, NULL, 'user.png'),
('lsy', 'lsy@gmail.com', 'lansu123', '2021-04-24', 0, NULL, 'user.png'),
('nihao', 'Lansu123', 'lansueee@gmail.com', '2021-04-29', 0, NULL, 'user.png'),
('OP', 'OP@gmail.com', 'lansu123', '2021-04-20', 0, NULL, 'user.png'),
('pipipie3', 'Lansu123', 'lan1830086ddd356@gmail.com', '2021-05-04', 0, NULL, 'user.png'),
('SU', '$2y$10$5D1Rq5dim0BuOLKiRLqWheWGJpO.pwwqY0b9qHLD.aGCuzZWIDW9W', 'lan2@qq2.com', '2021-05-16', 0, NULL, 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_avatar`
--

CREATE TABLE `user_avatar` (
  `username` varchar(15) NOT NULL,
  `is_set` int(4) NOT NULL,
  `path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_avatar`
--

INSERT INTO `user_avatar` (`username`, `is_set`, `path`) VALUES
('1', 0, '/var/www/htdocs/infs3200/uploads/user_avatar/li.jpg'),
('lansu123', 0, '/var/www/htdocs/infs3200/uploads/user_avatar/BoardingPass_MyNameOnFutureMission_(1).png');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `title` varchar(256) NOT NULL,
  `username` varchar(15) NOT NULL,
  `tag` varchar(256) NOT NULL,
  `videoid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collect`
--
ALTER TABLE `collect`
  ADD PRIMARY KEY (`username`,`file_id`),
  ADD KEY `file_id` (`file_id`);

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`username`,`file_id`),
  ADD KEY `file_id` (`file_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_upload` (`username`);

--
-- Indexes for table `file_description`
--
ALTER TABLE `file_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sample_data`
--
ALTER TABLE `sample_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `user_avatar`
--
ALTER TABLE `user_avatar`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`videoid`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `file_description`
--
ALTER TABLE `file_description`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17270;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sample_data`
--
ALTER TABLE `sample_data`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `videoid` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `collect`
--
ALTER TABLE `collect`
  ADD CONSTRAINT `collect_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`),
  ADD CONSTRAINT `collect_ibfk_2` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `favourite`
--
ALTER TABLE `favourite`
  ADD CONSTRAINT `favourite_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`),
  ADD CONSTRAINT `favourite_ibfk_2` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `FK_user_upload` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `user_avatar`
--
ALTER TABLE `user_avatar`
  ADD CONSTRAINT `user_avatar_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `videoid` FOREIGN KEY (`videoid`) REFERENCES `files` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
