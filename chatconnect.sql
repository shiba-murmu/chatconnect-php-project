-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2025 at 11:55 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatconnect`
--

-- --------------------------------------------------------

--
-- Table structure for table `friendlist`
--

CREATE TABLE `friendlist` (
  `id` int(255) NOT NULL,
  `receiver_id` int(255) NOT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `receiver_user_name` varchar(255) NOT NULL,
  `sender_id` int(255) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `sender_user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `friendlist`
--

INSERT INTO `friendlist` (`id`, `receiver_id`, `receiver_name`, `receiver_user_name`, `sender_id`, `sender_name`, `sender_user_name`) VALUES
(249, 267, 'bishnu', 'bishnu', 266, 'shiba murmu', 'shiba_'),
(250, 266, 'shiba murmu', 'shiba_', 267, 'bishnu', 'bishnu'),
(251, 270, 'Shiba2', 'manoj', 269, 'shiva', 'shiba___'),
(252, 269, 'shiva', 'shiba___', 270, 'Shiba2', 'manoj');

-- --------------------------------------------------------

--
-- Table structure for table `friendrequest`
--

CREATE TABLE `friendrequest` (
  `id` int(255) NOT NULL,
  `receiverId` varchar(200) NOT NULL,
  `receiverName` varchar(255) NOT NULL,
  `receiverUserName` varchar(255) NOT NULL,
  `senderId` int(255) NOT NULL,
  `senderUserName` varchar(155) NOT NULL,
  `senderName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='table for all friend request';

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `userimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `userid`, `name`, `userimage`) VALUES
(93, '265', 'shivani singh', '../assets/images/20241110_122841.jpg'),
(94, '266', 'shiba murmu', '../assets/images/WhatsApp Image 2024-05-23 at 16.33.21_3d3b377f.jpg'),
(95, '267', 'bishnu', '../assets/images/default.png'),
(96, '268', 'shiba murmu', '../assets/images/default.png'),
(97, '269', 'shiva', '../assets/images/IMG_20240801_1E.png'),
(98, '270', 'Shiba2', '../assets/images/default.png'),
(99, '271', 'shiba murmu', '../assets/images/study2.jpg'),
(100, '272', 'Shiva Murmu', '../assets/images/default.png'),
(101, '273', 'Shiva Murmu', '../assets/images/pexels-enfantnocta-2106065-3732993.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `userdatastatus`
--

CREATE TABLE `userdatastatus` (
  `id` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `datastatus` varchar(255) NOT NULL,
  `tracknotificationfor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usernotifications`
--

CREATE TABLE `usernotifications` (
  `id` int(255) NOT NULL,
  `notificationSenderId` int(255) NOT NULL,
  `notificationSenderName` varchar(255) NOT NULL,
  `notificationReceiverId` int(255) NOT NULL,
  `notificationReceiverName` varchar(255) NOT NULL,
  `notificationContent` longtext NOT NULL,
  `notificationTime` varchar(255) NOT NULL,
  `notificationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usernotifications`
--

INSERT INTO `usernotifications` (`id`, `notificationSenderId`, `notificationSenderName`, `notificationReceiverId`, `notificationReceiverName`, `notificationContent`, `notificationTime`, `notificationDate`) VALUES
(115, 267, 'bishnu', 266, 'shiba murmu', 'Friend request accepted now you can text to each other.', '02-12-2024', '02:40 PM'),
(116, 270, 'Shiba2', 269, 'shiva', 'Friend request accepted now you can text to each other.', '03-12-2024', '12:49 PM');

-- --------------------------------------------------------

--
-- Table structure for table `userotherdata`
--

CREATE TABLE `userotherdata` (
  `id` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `phone` int(155) NOT NULL,
  `dateofbirth` varchar(255) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `education` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL,
  `joineddate` varchar(100) NOT NULL,
  `joinedtime` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `insta` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Data of the user';

--
-- Dumping data for table `userotherdata`
--

INSERT INTO `userotherdata` (`id`, `userid`, `phone`, `dateofbirth`, `gender`, `education`, `college`, `joineddate`, `joinedtime`, `address`, `insta`, `facebook`, `twitter`, `linkedin`, `bio`) VALUES
(7, 268, 0, '', '', '', '', '15-11-2024', '08:46 PM', '', '', '', '', '', ''),
(8, 269, 0, 'NULL', 'NULL', 'NULL', 'NULL', '03-12-2024', '12:41 PM', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL'),
(9, 270, 0, 'NULL', 'NULL', 'NULL', 'NULL', '03-12-2024', '12:44 PM', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL'),
(10, 271, 0, 'NULL', 'NULL', 'NULL', 'NULL', '08-01-2025', '07:40 PM', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL'),
(11, 272, 0, 'NULL', 'NULL', 'NULL', 'NULL', '07-05-2025', '08:17 AM', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL'),
(12, 273, 0, 'NULL', 'NULL', 'NULL', 'NULL', '07-05-2025', '08:22 AM', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table for users details';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `username`, `email`, `password`) VALUES
(265, 'shivani singh', '_miss_rajput__30', 'shivani1930singh@gmail.com', '$2y$10$Jk96GXGipB6IEtQjlZWRm.Ns0upTqSYs0/ynsMOz7eNUSkhpTZheu'),
(266, 'shiba murmu', 'shiba_', 'Shivamurmu001@gmail.com', '$2y$10$A9zX67oNvjpEwFvXGDdz8eYnhgnuaxjmmA6HI7Qq.OXXMGZVbN7hm'),
(267, 'bishnu', 'bishnu', 'asdf@gmail.com', '$2y$10$X219zQrjaMN0kQgRGdkVZuVrJDLhAkBOrjxmX/UX3UNGT5HlTw5g.'),
(268, 'shiba murmu', 'shiva', 'h@gmail.com', '$2y$10$ksfo/0ie12ohmclp/OqdmOeTnEJaNS.uAmYgdnOs/q0lezvq1Q3NW'),
(269, 'shiva', 'shiba___', 'san@gmail.com', '$2y$10$F/VQgJLIhaik5jjzSmKQX.P9.rV/zpzYUX0zL5XFtgWiZ0WwqHA.m'),
(270, 'Shiba2', 'manoj', 'sanop@gmail.com', '$2y$10$VrKPYtgSMWX.sSTGP.pRpOHzhrC7vsAOo/cbaIQyKTckOlHZzf3Ui'),
(271, 'shiba murmu', '__shiba__', 'shibamurmu001@gmail.com', '$2y$10$HCsHgT/b/bf/M/9SxgMKx.jSuwyT7p52wjD93b1bE9Bmi6clFDSnG'),
(272, 'Shiva Murmu', 'murmujsr', 'shivamurmu@gmail.com', '$2y$10$2BL2FF6fCPwnTpEwMb3l5Oz4It2eRjpia8D4jck2FYTLFELzTVnAO'),
(273, 'Shiva Murmu', 'mrmjsrjsr', 'raajraaj001@gmail.com', '$2y$10$L7PX8zPaop8Lk9PsPglpo.VirVGjnynEl.UBxXGRCJ5.CO60bYf2i');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friendlist`
--
ALTER TABLE `friendlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friendrequest`
--
ALTER TABLE `friendrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdatastatus`
--
ALTER TABLE `userdatastatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usernotifications`
--
ALTER TABLE `usernotifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userotherdata`
--
ALTER TABLE `userotherdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friendlist`
--
ALTER TABLE `friendlist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `friendrequest`
--
ALTER TABLE `friendrequest`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `userdatastatus`
--
ALTER TABLE `userdatastatus`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=272;

--
-- AUTO_INCREMENT for table `usernotifications`
--
ALTER TABLE `usernotifications`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `userotherdata`
--
ALTER TABLE `userotherdata`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
