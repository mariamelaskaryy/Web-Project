-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 25, 2021 at 09:49 PM
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
-- Table structure for table `CommentsByAuditor`
--

CREATE TABLE `CommentsByAuditor` (
  `ID` int(255) NOT NULL,
  `MessageID` int(255) NOT NULL,
  `SenderID` int(255) NOT NULL,
  `Comment` varchar(255) NOT NULL,
  `TimeStamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `CommentsByAuditor`
--

INSERT INTO `CommentsByAuditor` (`ID`, `MessageID`, `SenderID`, `Comment`, `TimeStamp`) VALUES
(1, 16, 31, 'v bad communication', '2021-02-25 12:02:41.587923'),
(2, 16, 30, 'v bad communication', '2021-02-25 12:02:41.587923'),
(3, 16, 30, 'Inappropriate ', '2021-02-25 12:02:41.587923'),
(4, 16, 30, 'Inappropriate ', '2021-02-25 12:02:41.587923'),
(5, 22, 30, 'Inappropriate ', '2021-02-25 12:02:41.587923'),
(6, 23, 30, 'Inappropriate ', '2021-02-25 12:02:41.587923'),
(7, 16, 30, 'wellll', '2021-02-25 12:02:41.587923'),
(8, 24, 30, 'agaaain', '2021-02-25 12:02:41.587923'),
(9, 24, 30, 'agaaain', '2021-02-25 12:02:41.587923'),
(10, 24, 30, 'agaaain', '2021-02-25 12:02:41.587923'),
(11, 24, 36, 'agaaain', '2021-02-25 12:02:41.587923'),
(14, 20, 30, 'yarab', '2021-02-25 12:02:41.587923'),
(16, 17, 30, 'yaraaaaaab', '2021-02-25 12:02:41.587923'),
(17, 22, 36, 'wellllllllll', '2021-02-25 12:02:41.587923'),
(18, 22, 36, '', '2021-02-25 12:02:41.587923'),
(19, 16, 30, 'not working???', '2021-02-25 12:02:41.587923'),
(20, 30, 30, 'v bad communication', '2021-02-25 12:02:41.587923'),
(21, 20, 30, 'v bad communication', '2021-02-25 12:02:58.377635'),
(22, 16, 30, 'Inappropriate ', '2021-02-25 12:03:23.416913'),
(23, 16, 30, 'v bad communication', '2021-02-25 14:33:30.174241');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CommentsByAuditor`
--
ALTER TABLE `CommentsByAuditor`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MessageID` (`MessageID`,`SenderID`),
  ADD KEY `SenderID` (`SenderID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CommentsByAuditor`
--
ALTER TABLE `CommentsByAuditor`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `CommentsByAuditor`
--
ALTER TABLE `CommentsByAuditor`
  ADD CONSTRAINT `commentsbyauditor_ibfk_1` FOREIGN KEY (`MessageID`) REFERENCES `ContactUs` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commentsbyauditor_ibfk_2` FOREIGN KEY (`SenderID`) REFERENCES `ContactUs` (`fromHikerID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
