-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 13, 2023 at 09:34 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ajchat`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pfp` varchar(100) DEFAULT NULL,
  `bio` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `name`, `email`, `password`, `pfp`, `bio`) VALUES
(1, 'admin', 'admin@ajchat.com', '$2y$10$C8.BJdmBhNnAzdtsPvjXne3P4asima7HDCLbkjIP5FK9DAEDqXSuS', '647f378028e94.jpg', NULL),
(2, 'Jonathan Wuntu', 'wuntujoy@gmail.com', '$2y$10$eeu1sM8Tsb0B29vlFY/lX.Id1SLCY5c19d8CU1VrJUTAXT1yNKdie', '6485e6b72ea8e.png', 'ap cb'),
(3, 'Golden Lamatwelu', 'golden@gmail.com', '$2y$10$VTuxFnr3KQrqu3nFwE/0CeAhnjEzv4HHxlQ8DNBnF0nWqDUYl/FqO', '648813224b8f1.png', 'Biography'),
(10, 'andre', 'andre@gmail.com', '$2y$10$.s6lw3HkX43V8Hlg3DqEkOIhjpDwD4T.U0E2cn0Km/l8ZdN3MJ/s2', 'pfpPlaceholder.png', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `chatlist_admin@ajchat.com`
--

CREATE TABLE `chatlist_admin@ajchat.com` (
  `name` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chatlist_andre@gmail.com`
--

CREATE TABLE `chatlist_andre@gmail.com` (
  `name` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `chatlist_andre@gmail.com`
--

INSERT INTO `chatlist_andre@gmail.com` (`name`, `id`) VALUES
('Jonathan Wuntu', 2);

-- --------------------------------------------------------

--
-- Table structure for table `chatlist_golden@gmail.com`
--

CREATE TABLE `chatlist_golden@gmail.com` (
  `name` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `chatlist_golden@gmail.com`
--

INSERT INTO `chatlist_golden@gmail.com` (`name`, `id`) VALUES
('Jonathan Wuntu', 2);

-- --------------------------------------------------------

--
-- Table structure for table `chatlist_wuntujoy@gmail.com`
--

CREATE TABLE `chatlist_wuntujoy@gmail.com` (
  `name` varchar(20) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `chatlist_wuntujoy@gmail.com`
--

INSERT INTO `chatlist_wuntujoy@gmail.com` (`name`, `id`) VALUES
('andre', 10),
('Golden Lamatwelu', 3);

-- --------------------------------------------------------

--
-- Table structure for table `msg_log`
--

CREATE TABLE `msg_log` (
  `id_receiver` int(11) NOT NULL,
  `id_sender` int(11) NOT NULL,
  `msg` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `msg_log`
--

INSERT INTO `msg_log` (`id_receiver`, `id_sender`, `msg`, `time`) VALUES
(3, 2, 'ql3fzQ==', '2023-06-13 00:37:19'),
(3, 2, 'tlGM24I2Sg==', '2023-06-13 00:55:14'),
(2, 3, 'JQLG2LtiAKoPyb1nWfCK', '2023-06-13 00:59:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
