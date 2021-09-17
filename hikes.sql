-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2021 at 06:11 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hiking`
--

-- --------------------------------------------------------

--
-- Table structure for table `hikes`
--

CREATE TABLE `hikes` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(255) NOT NULL DEFAULT 'current_timestamp(6)',
  `Price` varchar(255) NOT NULL,
  `MaxCapacity` int(255) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hikes`
--

INSERT INTO `hikes` (`ID`, `Name`, `Location`, `Date`, `Time`, `Price`, `MaxCapacity`, `Image`) VALUES
(1, 'Blue Lagoon', 'Dahab', '2021-08-11', ' 23:36 ', ' 500 ', 50, 'blue lagoon.webp'),
(2, 'Mount Moses', 'Sinai', '2021-10-21', '8:30', '1999 ', 150, 'mount moses.webp'),
(3, 'The Coloured Canyon', 'Nuweiba', '2021-10-02', '9:00', '2000', 100, 'colored canyon.webp\r\n'),
(4, 'The Valley of the Whales', 'Fayoum', '2022-01-07', '11:00', '800', 70, 'valley of whales.webp'),
(22, ' Wadi Degla Protectorate ', ' Cairo ', '2021-09-29', '  ', ' 1700 ', 130, 'wadi degla.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hikes`
--
ALTER TABLE `hikes`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hikes`
--
ALTER TABLE `hikes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
