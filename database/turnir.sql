-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2022 at 06:06 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `turnir`
--

-- --------------------------------------------------------

--
-- Table structure for table `ekipe`
--

CREATE TABLE `ekipe` (
  `ime_ekipe` varchar(40) NOT NULL,
  `grad` varchar(30) NOT NULL,
  `trener` varchar(30) NOT NULL,
  `registracioni_broj` int(5) NOT NULL,
  `lozinka` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ekipe`
--

INSERT INTO `ekipe` (`ime_ekipe`, `grad`, `trener`, `registracioni_broj`, `lozinka`) VALUES
('Warriors', 'Kraljevo', 'Nikola Krsmanovic', 12345, 'warrior'),
('Pacers', 'Subotica', 'Predrag Babic', 33444, 'raptor'),
('Raptors', 'Kragujevac', 'Ognjen Kukalj', 34215, 'raptor'),
('Nuggets', 'Novi Sad', 'Milosav Zivkovic', 54321, 'nugget');

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--


CREATE TABLE `komentari` (
  `opis` varchar(50) NOT NULL,
  `imeKreatora` varchar(30) NOT NULL,
  `utakmica_id` int(2) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- --------------------------------------------------------

--
-- Table structure for table `utakmice`
--

CREATE TABLE `utakmice` (
  `id` int(2) UNSIGNED NOT NULL,
  `domacin` varchar(30) NOT NULL,
  `gost` varchar(30) NOT NULL,
  `datum` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utakmice`
--

INSERT INTO `utakmice` (`id`, `domacin`, `gost`, `datum`) VALUES
(1, 'Warriors', 'Pacers', '2022-12-13'),
(3, 'Pacers', 'Nuggets', '2022-12-22'),
(4, 'Warriors', 'Nuggets', '2022-12-14'),
(6, 'Raptors', 'Nuggets', '2022-12-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ekipe`
--
ALTER TABLE `ekipe`
  ADD PRIMARY KEY (`registracioni_broj`);

--
-- Indexes for table `utakmice`
--
ALTER TABLE `utakmice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `utakmice`
--
ALTER TABLE `utakmice`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
