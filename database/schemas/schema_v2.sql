-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 13, 2020 at 08:54 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `youniti`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pays` varchar(255) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '0',
  `date_inscription` datetime DEFAULT CURRENT_TIMESTAMP,
  `ville` varchar(20) DEFAULT NULL,
  `commune` varchar(20) DEFAULT NULL,
  `promo1` varchar(20) DEFAULT NULL,
  `emploi` varchar(20) DEFAULT NULL,
  `universite` varchar(20) DEFAULT NULL,
  `promo2` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `nom`, `prenom`, `email`, `pays`, `numero`, `password`, `active`, `date_inscription`, `ville`, `commune`, `promo1`, `emploi`, `universite`, `promo2`) VALUES
(12, NULL, 'Job12', 'Jean-Marc', 'jeanmarcdjebi@gmail.com', 'SA', '+255 47 37 28 02', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '2020-03-22 12:01:12', 'Abidjan', 'AngrÃ©', '2000', NULL, NULL, '2003'),
(13, NULL, 'Badra', 'Ali', 'ali.badra@gmail.com', 'SA', '+255 47 37 28 02', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '2020-03-22 12:32:10', 'Abidjan', 'AngrÃ©', '2016', NULL, NULL, '2018');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=425;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
