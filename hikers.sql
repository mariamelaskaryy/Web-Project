-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2021 at 09:08 PM
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
-- Table structure for table `hikers`
--

CREATE TABLE `hikers` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Birthdate` date DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `ConfirmPassword` varchar(255) NOT NULL,
  `Role` varchar(255) NOT NULL,
  `Bio` varchar(255) DEFAULT NULL,
  `ProfilePicture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hikers`
--

INSERT INTO `hikers` (`ID`, `Name`, `Birthdate`, `Email`, `Password`, `ConfirmPassword`, `Role`, `Bio`, `ProfilePicture`) VALUES
(2, ' yahya ', NULL, ' yahya ', ' yahya ', ' yahya ', '', '', NULL),
(3, ' zeina ', NULL, ' zeina ', ' 123 ', ' 123 ', '', '', NULL),
(4, ' Mahi ', NULL, ' Mahi ', ' mahi ', ' mahi ', '', '', NULL),
(9, '  ', NULL, '  ', '  ', '  ', '', '', NULL),
(11, ' reem ', NULL, ' reem ', ' reem ', ' reem ', '', '', NULL),
(12, ' Nour ', NULL, ' nada@gmail.com ', ' 123 ', ' 1234 ', 'Admin', '', NULL),
(13, ' whats ', NULL, ' wjdd ', ' 123 ', ' 12345 ', '', '', NULL),
(14, ' dmms ', NULL, ' amd ', ' 123 ', ' 64gc ', '', '', NULL),
(15, ' fefc ', NULL, ' sd ', ' adch ', ' ljnu ', '', '', NULL),
(16, ' fsc ', NULL, ' sxv ', ' sfvvg ', ' mkjhn ', '', '', NULL),
(17, ' fd ', NULL, ' csd ', ' fhvv ', ' htbcs ', '', '', NULL),
(18, ' yaay ', NULL, ' yaay ', ' 123 ', ' 123 ', '', '', NULL),
(22, ' yahyaa ', NULL, ' yahyaa ', ' 123 ', ' 123 ', '', '', NULL),
(23, ' Nour ', NULL, ' nouuur ', ' 123 ', ' 123 ', '', '', NULL),
(26, ' nour ', NULL, ' mahi123@gmail ', ' 123 ', ' 123 ', 'User', '', NULL),
(30, ' fuego ', NULL, 'fuego@gmail.com ', ' 1234 ', ' 1234 ', 'Admin', '', NULL),
(31, ' whatever ', NULL, 'whatever@gmail.com ', ' 1234 ', ' 1234 ', 'User', '', NULL),
(32, ' zeina ', NULL, 'zeina@gmail.com ', ' 123456 ', ' 123456 ', 'User', '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hikers`
--
ALTER TABLE `hikers`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hikers`
--
ALTER TABLE `hikers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
