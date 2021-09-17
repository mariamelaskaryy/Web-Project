-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 28, 2021 at 10:08 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Hiking`
--

-- --------------------------------------------------------

--
-- Table structure for table `LoginDeets`
--

CREATE TABLE `LoginDeets` (
  `LoginDeetsID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `LastAct` timestamp NOT NULL DEFAULT current_timestamp(),
  `CurrentTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `LoginDeets`
--

INSERT INTO `LoginDeets` (`LoginDeetsID`, `UserID`, `LastAct`, `CurrentTime`) VALUES
(1, 31, '2021-02-27 00:03:39', '2021-02-27 00:06:16'),
(5, 30, '2021-02-27 10:23:57', '2021-02-27 11:21:57'),
(6, 47, '2021-02-27 22:25:23', '2021-02-27 22:25:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `LoginDeets`
--
ALTER TABLE `LoginDeets`
  ADD PRIMARY KEY (`LoginDeetsID`),
  ADD KEY `UserID` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `LoginDeets`
--
ALTER TABLE `LoginDeets`
  MODIFY `LoginDeetsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `LoginDeets`
--
ALTER TABLE `LoginDeets`
  ADD CONSTRAINT `LoginDetail` FOREIGN KEY (`UserID`) REFERENCES `Hikers` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
