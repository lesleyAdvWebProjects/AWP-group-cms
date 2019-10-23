-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 138.201.81.134:3306
-- Generation Time: Oct 23, 2019 at 03:01 AM
-- Server version: 5.7.25-28-log
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devfoodi_foodies`
--

-- --------------------------------------------------------

--
-- Table structure for table `ingredients-table-new`
--

CREATE TABLE `ingredients-table-new` (
  `ingredients` mediumtext NOT NULL,
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `rating_number` int(11) NOT NULL,
  `user_ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'User IP Address',
  `submitted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `post_id`, `rating_number`, `user_ip`, `submitted`) VALUES
(7, 2, 3, '107.204.51.248', '2019-10-21 06:38:31'),
(8, 2, 4, '107.204.51.246', '2019-10-21 06:42:05'),
(9, 3, 4, '107.204.51.246', '2019-10-21 06:52:43'),
(10, 5, 5, '107.204.51.246', '2019-10-21 06:53:55'),
(11, 1, 4, '107.204.51.246', '2019-10-23 02:59:15');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `ID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `instructions` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `chefname` varchar(255) NOT NULL,
  `entrydate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`ID`, `title`, `instructions`, `photo`, `chefname`, `entrydate`) VALUES
(1, 'Tilapia With Sauce', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.', 'https://sparkpeo.hs.llnwd.net/e1/resize/300m300/e2/guid/Broiled-Tilapia-Parmesan/0373b8cc-2f30-4260-8a80-888319e38851.jpg', 'Tom Burger', '2019-10-11'),
(2, 'Beans Soup', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.', 'https://sparkpeo.hs.llnwd.net/e1/resize/300m300/e2/guid/Spicy-Taco-Soup/b89993f2-011e-4d26-89ca-37a6e5351029.jpg', 'Patty Melt', '2019-10-11'),
(3, 'Cheesecake', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.', 'https://sparkpeo.hs.llnwd.net/e1/resize/300m300/e2/guid/No-Bake-Graham-Cracker-Cheesycake/4d986ec5-34fe-4a90-bdf0-8479081c8441.jpg', 'Sweety Pie', '2019-10-10'),
(4, '', '', '', '', '0000-00-00'),
(5, 'Momo', 'It takes too long, just get delivery lol', 'https://i.ytimg.com/vi/7tdUCk9pLPw/maxresdefault.jpg', 'christikaes', '2019-10-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ingredients-table-new`
--
ALTER TABLE `ingredients-table-new`
  ADD KEY `id` (`id`),
  ADD KEY `title` (`title`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `title` (`title`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ingredients-table-new`
--
ALTER TABLE `ingredients-table-new`
  ADD CONSTRAINT `ingredients-table-new_ibfk_1` FOREIGN KEY (`title`) REFERENCES `recipes` (`title`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
