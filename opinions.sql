-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01 يناير 2020 الساعة 23:46
-- إصدار الخادم: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mywebsite`
--

-- --------------------------------------------------------

--
-- بنية الجدول `opinions`
--

CREATE TABLE `opinions` (
  `opinion_id` int(11) NOT NULL,
  `opinion_user_name` varchar(255) NOT NULL,
  `opinion` text NOT NULL,
  `opinion_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `opinions`
--

INSERT INTO `opinions` (`opinion_id`, `opinion_user_name`, `opinion`, `opinion_date`) VALUES
(2, 'hatem', 'very nice work', '2020-01-01 23:50:53'),
(3, 'Ali', 'Bad Work Man', '2020-01-01 23:53:19'),
(4, 'Ahmed', 'Very Fantastic', '2020-01-01 23:54:26'),
(64, 'Elsheref', 'This Is A Good Job Best Wishes', '2020-01-02 00:08:45'),
(65, 'sara', 'goood', '2020-01-02 00:14:52'),
(66, 'Elsheref', 'Elheref', '2020-01-02 00:15:56'),
(67, 'Mona', 'Bad', '2020-01-02 00:23:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `opinions`
--
ALTER TABLE `opinions`
  ADD PRIMARY KEY (`opinion_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `opinions`
--
ALTER TABLE `opinions`
  MODIFY `opinion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
