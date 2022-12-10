-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 04, 2022 at 01:09 PM
-- Server version: 10.3.22-MariaDB-log
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `concert`
--

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `artist` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `description` text COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `artist`, `description`, `password`, `active`) VALUES
(1, 'BTOB', 'BtoB (/ˈbiːtuːbiː/ BEE-too-bee; Korean: 비투비; acronym for Born to Beat; often stylized as BTOB) is a South Korean boy band formed in 2012 by Cube Entertainment. The group consists of Seo Eun-kwang, Lee Min-hyuk, Lee Chang-sub, Im Hyun-sik, Peniel Shin and Yook Sung-jae. Originally a septet, Jung Il-hoon departed from the group on December 31, 2020.\r\n\r\nBtoB debuted on March 21, 2012, performing \"Insane\" (비밀) and \"Imagine\" on M Countdown.[1] The group\'s debut EP, Born to Beat was released on April 3, 2012. They released their first full-length album, Complete, in June 2015. In November 2014, they made their Japanese debut with \"Wow\" under the Japanese agency Kiss Entertainment.\r\n\r\nSince the group\'s 2012 debut, they have received multiple awards, including the 30th Golden Disc Awards Best Vocal Group in 2016, 2017 Melon Music Awards Top 10 Bonsang and 25th Seoul Music Awards Ballad Award in 2018.[2] Five of their albums topped the Gaon Album Chart, and nine of their singles peaked in top ten on the national Gaon Digital Chart.', 'btobmelody', 1),
(2, 'Stray Kids', 'Stray Kids (Korean: 스트레이 키즈; RR: Seuteurei Kijeu; often abbreviated as SKZ) is a South Korean boy band formed by JYP Entertainment through the 2017 reality show of the same name. The group is composed of eight members: Bang Chan, Lee Know, Changbin, Hyunjin, Han, Felix, Seungmin, and I.N. Originally a nine-piece group, member Woojin left due to undisclosed personal reasons in October 2019. Stray Kids released their pre-debut extended play (EP) Mixtape in January 2018 and officially debuted on March 25 with the EP I Am Not.[1][2]', 'skzstay', 1),
(3, 'admin', 'The user who controls the whole site', 'admin123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Pop'),
(2, 'Classic'),
(3, 'Ballad'),
(4, 'Rock');

-- --------------------------------------------------------

--
-- Table structure for table `organizers`
--

CREATE TABLE `organizers` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `singer` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `img` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT 'a.jpg',
  `category_id` int(11) NOT NULL,
  `poster` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT 'a.jpg',
  `date` date NOT NULL,
  `price` int(11) NOT NULL DEFAULT 50,
  `places` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `organizers`
--

INSERT INTO `organizers` (`id`, `title`, `singer`, `img`, `category_id`, `poster`, `date`, `price`, `places`) VALUES
(1, 'Be Together', 'BTOB', 'grbtob.jpg', 3, 'btob.jpeg', '2022-12-31', 150, 500),
(2, 'London The 02', 'Panic! At the Disco', 'panicpic.jpg', 4, 'panic.jpg', '2023-03-07', 200, 2000),
(3, 'The Fonda', 'Conry Henry', 'picconry.jpg', 2, 'conryhenry.png', '2023-03-29', 220, 1800),
(4, 'Maniac', 'Stray Kids', 'grskz.jpg', 1, 'straykids.jpg', '2023-03-11', 300, 4000),
(5, 'The Garage', 'Harry Styles', 'pichs.jpg', 1, 'harrystyles.jpg', '2023-03-13', 250, 2000),
(6, 'Born Pink', 'Blackpink', 'bppic.jpg', 1, 'blackpink.jpg', '2022-12-18', 500, 3500),
(7, 'С камерным оркестром \"ТУРКИСТОН\"', 'Захар Ващенко', 'zaharpic.jpg', 2, 'zaharvash.png', '2022-12-09', 15, 500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizers`
--
ALTER TABLE `organizers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `organizers`
--
ALTER TABLE `organizers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `organizers`
--
ALTER TABLE `organizers`
  ADD CONSTRAINT `organizers_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
