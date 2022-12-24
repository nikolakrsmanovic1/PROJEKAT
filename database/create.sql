-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2022 at 08:30 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ekipe`
--
CREATE TABLE `komentari` (
  `opis` varchar(50) NOT NULL,
  `imeKreatora` varchar(30) NOT NULL,
  `utakmica_id` int(2) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentari`
--
CREATE TABLE `utakmice` (
  `id` int(2) UNSIGNED NOT NULL,
  `domacin` varchar(30) NOT NULL,
  `gost` varchar(30) NOT NULL,
  `datum` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utakmice`
--
