-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 12, 2019 at 02:44 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `foodies`
--

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
(3, 'Cheesecake', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.', 'https://sparkpeo.hs.llnwd.net/e1/resize/300m300/e2/guid/No-Bake-Graham-Cracker-Cheesycake/4d986ec5-34fe-4a90-bdf0-8479081c8441.jpg', 'Sweety Pie', '2019-10-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
