-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2020 at 06:33 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `rubriek`
--

CREATE TABLE `rubriek` (
  `rubrieknummer` decimal(3,0) NOT NULL,
  `rubrieknaam` char(24) NOT NULL,
  `Rubriek` decimal(3,0) DEFAULT NULL,
  `volgnr` decimal(2,0) DEFAULT NULL,
  `toestand` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rubriek`
--

INSERT INTO `rubriek` (`rubrieknummer`, `rubrieknaam`, `Rubriek`, `volgnr`, `toestand`) VALUES
('1', 'Audio, Tv en Foto', NULL, '1', 1),
('2', 'Boeken', NULL, '2', 1),
('3', 'Computers en Software', NULL, '3', 1),
('4', 'Accessoires', '1', NULL, 2),
('5', 'Audio', '1', NULL, 2),
('6', 'Film, Video en Tv', '1', NULL, 2),
('7', 'Fotografie', '1', NULL, 2),
('8', 'Optische apparatuur', '1', '5', 2),
('9', 'Overige', '1', '6', 2),
('16', 'Accu\'s en Batterijen', '4', '1', 3),
('17', 'Afstandsbedieningen', '4', '1', 3),
('18', 'Kabels', '4', '1', 3),
('128', 'Opladers', '4', '1', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rubriek`
--
ALTER TABLE `rubriek`
  ADD PRIMARY KEY (`rubrieknummer`),
  ADD KEY `rubriek_ibfk_1` (`Rubriek`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rubriek`
--
ALTER TABLE `rubriek`
  ADD CONSTRAINT `rubriek_ibfk_1` FOREIGN KEY (`Rubriek`) REFERENCES `rubriek` (`rubrieknummer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
