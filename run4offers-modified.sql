-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jul 18, 2016 at 07:16 PM
-- Server version: 5.5.45-cll-lve
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `run4offers`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `memberID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` bigint(10) NOT NULL,
  `active` varchar(255) NOT NULL,
  `resetToken` varchar(255) DEFAULT NULL,
  `resetComplete` varchar(3) DEFAULT 'No',
  PRIMARY KEY (`memberID`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `number` (`number`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memberID`, `name`, `password`, `email`, `number`, `active`, `resetToken`, `resetComplete`) VALUES
(1, 'Manish Bisht', '$2y$10$5Iu1i9cZ3tj8qakvMWytXuvLCtSj.MPbok6/q5adKJjC0b1a3Aemi', 'manish.bisht490@gmail.com', 8559874393, 'Yes', '803c54826079ac57e981bf7ff3c46b90', 'No'),
(2, 'Manish', '$2y$10$JryYhFOYvjRg/MAH9BnLAuTJJBMihIQKiuMZ6AF82b1stE36IZ//u', 'manish.bisht@gmail.com', 9660390698, '82dca0608055f637c17ed8b4f9a7c582', NULL, 'No'),
(3, 'Manish02', '$2y$10$DC2Aa/5FMcANB52U7tCFauwXrk0ZNJ1GU2ubRmHDR5QAjL7a7x.eu', 'manish.bish0t@gmail.com', 9874563214, '0cbe878dd346102735be2fee877849d5', NULL, 'No'),
(4, 'Manish21296', '$2y$10$NaH5qAZx2Acpr7dPcQk9XeK35jaBP26qgGw//9ny/.7CxiREzAMuS', 'manish@ymail.com', 8559874347, '934341af203b8e4cc4c718a1790a4cac', NULL, 'No'),
(5, 'Manish Bisht', '$2y$10$IQdoccTzoTUPJ5DNW64gbO15stQkfC1X2xW6zVzBq3HR9u55s5mUW', 'admin@gmail.com', 9660762055, 'Yes', NULL, 'No'),
(6, 'Wasique Ansari', '$2y$10$jyw8BaCaVjY7Dbne8cNZMOp76CX1KFKZIvT6IgG1h0x5jErB2h1D2', 'wasique3@gmail.com', 9785322878, 'Yes', NULL, 'No'),
(7, 'Yash Mathur', '$2y$10$VQNfj97dVIwF8hVQu1B5tOIU5/xijWPYLLjrvHBiBbkZ9s/Qu7Vb.', 'yashmathur45@gmail.com', 919024639373, 'Yes', NULL, 'No'),
(8, 'Shivdutt ', '$2y$10$qkWyBTlNp.B6yCH4LxE12.cumPN.YihAn/y1YS48XPGwhtiQLJdfG', 'sshivdutt34@yahoo.com', 8562819910, 'Yes', NULL, 'No'),
(9, 'rahul yadav', '$2y$10$0SVpRsNVc1NOFSpFSGTIv.OKPlbY8.SwnT.L2a0WATAQ0n4hf3nJ6', 'yadav.coolrahul@gmail.com', 7023015595, 'Yes', NULL, 'No'),
(10, 'rahul', '$2y$10$LVziABkys0xWGVrS1Z.mrOKeR/imC.rQDVjUeH2GfHUAMyYpXUxHi', 'yadav.coolrahul31@gmail.com', 9529291704, 'Yes', NULL, 'No'),
(11, 'ankit maheshwari', '$2y$10$1q4YV4mkV2Dc6WMwbqpapeNcAAA0BTmcg4YNPwwPKJGxSvlF/CgOG', 'mankit793@gmail.com', 7597925356, 'Yes', NULL, 'No'),
(12, 'jyotish tiwari', '$2y$10$keMYNURwelV5adC797B6HueVTdSHl8.6.v4C2T9BQr4boOu2iHT2m', 'jyotishtiwari555@gmail.com', 8107688974, 'Yes', NULL, 'No'),
(13, 'janaknandani kalal', '$2y$10$durrtVQl0wN2HCrlZCEuBuGQOJGSZ0G2ZiUUyx8W7jvi3Sq8Jpify', 'nandani.kalal1696@gmail.com', 9983739311, 'Yes', NULL, 'No'),
(14, 'Nishank Garg', '$2y$10$SnOFdHsTVwSiTMfpLS.caOParHokkoqz/pY7XiDIfdJGrs6JeZVXC', 'nishankgarg9@gmail.com', 8302256731, 'Yes', NULL, 'No'),
(15, 'Khush Vyas', '$2y$10$aGYq9wcw/QHCOZ9auj6Qf.oabdaF.h99paGyF2jQMQUHzcJonxjvO', 'khushvyas1@gmail.com', 9461167216, 'Yes', NULL, 'No');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
