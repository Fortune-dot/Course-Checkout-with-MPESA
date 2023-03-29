-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2023 at 09:56 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tinybills`
--

-- --------------------------------------------------------

--
-- Table structure for table `tinypesa`
--

CREATE TABLE `tinypesa` (
  `CheckoutRequestID` varchar(50) DEFAULT NULL,
  `ResultCode` varchar(10) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `MpesaReceiptNumber` varchar(50) DEFAULT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `Reference` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tinypesa`
--

INSERT INTO `tinypesa` (`CheckoutRequestID`, `ResultCode`, `amount`, `MpesaReceiptNumber`, `PhoneNumber`, `Reference`) VALUES
('ws_CO_28032023171717388740408496', '0', '1.00', 'RCS2TPE1F8', '254740408496', ''),
('ws_CO_28032023174947760740408496', '0', '1.00', 'RCS5TT5G29', '254740408496', 'fortunelangat54@gmail.com'),
('ws_CO_28032023180210548740408496', '0', '1.00', 'RCS4TUNLVU', '254740408496', 'test@mail.com'),
('ws_CO_28032023180857758740408496', '0', '1.00', 'RCS8TVHEXE', '254740408496', 'test4@mail.com'),
('ws_CO_28032023181445848740408496', '0', '1.00', 'RCS5TW87KJ', '254740408496', 'admin22@rhone.co.ke'),
('ws_CO_28032023182412312740408496', '0', '1.00', 'RCS9TXG9J3', '254740408496', 'benjafreepass@gmail.com'),
('ws_CO_28032023185749443740408496', '0', '1.00', 'RCS2U24X8U', '254740408496', 'langat54@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
