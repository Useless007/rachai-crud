-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2022 at 03:35 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newweb_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `m_id` int(3) NOT NULL,
  `m_stuid` text NOT NULL,
  `m_fname` varchar(50) NOT NULL,
  `m_lname` varchar(50) NOT NULL,
  `m_age` int(2) NOT NULL,
  `m_grade` text NOT NULL,
  `m_picture` text NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`m_id`, `m_stuid`, `m_fname`, `m_lname`, `m_age`, `m_grade`, `m_picture`, `date_create`) VALUES
(1, '64302040004', 'Jintaphas', 'Thammabuth', 19, '2545', 'https://i.imgur.com/GGdJXrO.png', '2022-02-14 14:21:24'),
(2, '64302040005', 'Jintaphas', 'Thammabuth', 20, '2545', 'https://i.imgur.com/w10HB07.jpg', '2022-02-14 14:21:24'),
(3, '64302040006', 'Jintaphas', 'Thammabuth', 21, '2545', 'https://i.imgur.com/7YdMIaK.jpg', '2022-02-14 14:21:24'),
(4, '64302040007', 'Jintaphas', 'Thammabuth', 22, '2545', 'https://i.imgur.com/JDeBqhY.png', '2022-02-14 14:21:24'),
(5, '64302040008', 'Jintaphas', 'Thammabuth', 23, '2545', 'https://i.imgur.com/XJfwmzy.png', '2022-02-14 14:21:24'),
(6, '64302040009', 'Jintaphas', 'Thammabuth', 24, '2545', 'https://i.imgur.com/1dvLcNN.jpg', '2022-02-14 14:21:24'),
(7, '64302040010', 'Jintaphas', 'Thammabuth', 25, '2545', 'https://i.imgur.com/XeKXGo9.png', '2022-02-14 14:21:24'),
(8, '64302040011', 'Jintaphas', 'Thammabuth', 26, '2545', 'https://i.imgur.com/ZDFwRm5.png', '2022-02-14 14:21:24'),
(9, '64302040012', 'Jintaphas', 'Thammabuth', 27, '2545', 'https://i.imgur.com/vSS7YEx.jpg', '2022-02-14 14:21:24'),
(10, '64302040013', 'Jintaphas', 'Thammabuth', 28, '2545', 'https://i.imgur.com/1T4MdoO.jpg', '2022-02-14 14:21:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`m_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `m_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
