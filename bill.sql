-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2023 at 05:40 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bill`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill_info`
--

CREATE TABLE `bill_info` (
  `No` int(2) NOT NULL,
  `Description` varchar(60) NOT NULL,
  `Qty` varchar(11) NOT NULL,
  `Rate` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill_info`
--

INSERT INTO `bill_info` (`No`, `Description`, `Qty`, `Rate`) VALUES
(0, '5A plug point', '1', 220),
(1, '5A Light Point', '1', 220),
(2, '15A Plug Point', '1', 375),
(3, ' 5A 2Way Point', '1', 420),
(4, '15A Point', '1', 420),
(5, 'Ac Point', '1', 420),
(6, 'Bell Point', '1', 420),
(7, 'channel Point', '1', 220),
(8, 'Telephone pont', '1', 220),
(9, 'Speaker Point', '1', 220),
(10, '1 sq mm line', '1 per sqr f', 20),
(11, '1.5 sq mm line', '1 per sqr f', 25),
(12, '2.5 sq mm line', '1 per sqr f', 30),
(13, '4 sq mm line', '1 per sqr f', 35),
(14, '6 sq mm line', '1 per sqr f', 45),
(15, 'Channel Line', '1 per sqr f', 15),
(16, 'Telephone Line', '1 per sqr f', 15),
(17, 'Speaker Line', '1 per sqr f', 15),
(18, 'CCTV Line', '1 per sqr f', 15),
(19, 'CAT 6 Line', '1 per sqr f', 15),
(20, '3 Phase Line(4MM)', '1 per sqr f', 60),
(21, '3 Phase Line(6MM)', '1 per sqr f', 70),
(22, '3 Phase Line(10mm)', '1 per sqr f', 95),
(23, 'Fasanar Fitting', '1', 250),
(24, 'Light Fitting', '1', 100),
(25, 'Zumar Fitting', '1', 600),
(26, 'Profile Fitting', '1 Sq Mt.', 50),
(27, '3 Phase Distribution (Fitting)', '1', 1500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill_info`
--
ALTER TABLE `bill_info`
  ADD PRIMARY KEY (`No`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
