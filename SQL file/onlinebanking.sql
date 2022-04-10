-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 10, 2022 at 03:59 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinebanking`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `fullname` varchar(300) NOT NULL,
  `accountnum` varchar(200) NOT NULL,
  `balance` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`fullname`, `accountnum`, `balance`) VALUES
('Sai Murahari', '956839679', 2938),
('Karthik', '923379759', 2155),
('Rajesh', '704040109', 3548),
('Sunil', '640486108', 3359),
('Avinash', '472264591', 2700);

-- --------------------------------------------------------

--
-- Table structure for table `accountdetails`
--

CREATE TABLE `accountdetails` (
  `email` varchar(200) NOT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `surname` varchar(200) DEFAULT NULL,
  `accountnum` varchar(200) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `profile` varchar(300) DEFAULT NULL,
  `MPIN` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accountdetails`
--

INSERT INTO `accountdetails` (`email`, `fullname`, `surname`, `accountnum`, `mobile`, `dob`, `profile`, `MPIN`) VALUES
('avinash@gmail.com', 'Avinash', 'D', '472264591', '9999999999', '2001-02-05', 'sunil.png', 112233),
('karthik@gmail.com', 'Karthik', 'Vadla', '923379759', '9922334455', '2002-05-03', 'IMG_7763-1623131216.jpeg', 112233),
('laxmisaimurari2001@gmail.com', 'Sai Murahari', 'Tatikonda', '956839679', '+917036670576', '2001-06-07', 'PP_11913079.jpeg', 112233),
('rajesh@gmail.com', 'Rajesh', 'Tatikonda', '704040109', '9876543210', '2001-03-04', 'rajesh.jpeg', 112233),
('sunil@gmail.com', 'Sunil', 'Reddy', '640486108', '6543210987', '2002-02-04', 'sunil.png', 112233);

-- --------------------------------------------------------

--
-- Table structure for table `benificiary`
--

CREATE TABLE `benificiary` (
  `holdername` varchar(200) NOT NULL,
  `holderaccountnum` varchar(200) NOT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `accountnum` varchar(200) DEFAULT NULL,
  `bankname` varchar(200) DEFAULT NULL,
  `ifsc` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `benificiary`
--

INSERT INTO `benificiary` (`holdername`, `holderaccountnum`, `fullname`, `email`, `mobile`, `accountnum`, `bankname`, `ifsc`) VALUES
('Karthik', '923379759', 'Sai Murahari', 'laxmisaimurari2001@gmail.com', 917036670576, '956839679', 'TSM Bank', 'TSM0123456'),
('Karthik', '923379759', 'Sunil', 'sunil@gmail.com', 6543210987, '640486108', 'TSM Bank', 'TSM0123456'),
('Karthik', '923379759', 'Rajesh', 'rajesh@gmail.com', 9876543210, '704040109', 'TSM Bank', 'TSM0123456'),
('Karthik', '923379759', 'Avinash', 'avinash@gmail.com', 9999999999, '472264591', 'TSM Bank', 'TSM0123456');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `fullname` varchar(50) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`fullname`, `mobile`, `email`, `password`) VALUES
('Sai Murahari', 917036670576, 'laxmisaimurari2001@gmail.com', '$2y$10$/.1klC3rTzrzxhhZrxG9QOnhoaTmqJircktaUHtvAeT8Xno3tUU4e'),
('T Sai Murahari', 917036670575, 'laxmisaimurari2002@gmail.com', '$2y$10$Gbo4rlY/AQTZfwnCWmIN1OlNiaNy0BJI3Iq8I12GHdQT0Y2xY9wE.'),
('Mounika', 12312341, 'ravalipriya5@gmail.com', '$2y$10$jlLcSgf5reEKPz8GMaHwkeASO2KUV4t7WsqPKBt6U21eAjyEKnkfm');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `holderaccountnum` varchar(200) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `credit` varchar(200) DEFAULT NULL,
  `debit` varchar(200) DEFAULT NULL,
  `accountnum` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`holderaccountnum`, `date`, `credit`, `debit`, `accountnum`) VALUES
('640486108', '04/07/2022 01:47:45', 'null', '300', '956839679'),
('640486108', '04/07/2022 02:16:37', 'null', '200', '956839679'),
('956839679', '04/07/2022 02:20:26', 'null', '2500', '640486108'),
('956839679', '04/07/2022 02:56:57', 'null', '3200', '923379759'),
('923379759', '04/07/2022 03:04:25', 'null', '2200', '472264591');

-- --------------------------------------------------------

--
-- Table structure for table `transaction1`
--

CREATE TABLE `transaction1` (
  `accountholder` varchar(200) DEFAULT NULL,
  `date` varchar(200) DEFAULT NULL,
  `credit` varchar(200) DEFAULT NULL,
  `debit` varchar(200) DEFAULT NULL,
  `accountnum` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction1`
--

INSERT INTO `transaction1` (`accountholder`, `date`, `credit`, `debit`, `accountnum`) VALUES
('956839679', '04/07/2022 01:47:45', '300', 'null', '640486108'),
('956839679', '04/07/2022 02:16:37', '200', 'null', '640486108'),
('640486108', '04/07/2022 02:20:26', '2500', 'null', '956839679'),
('923379759', '04/07/2022 02:56:57', '3200', 'null', '956839679'),
('472264591', '04/07/2022 03:04:25', '2200', 'null', '923379759');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountdetails`
--
ALTER TABLE `accountdetails`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
