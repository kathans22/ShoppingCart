-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2022 at 05:58 AM
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
-- Database: `shopcartdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cartlogintb`
--

CREATE TABLE `cartlogintb` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phno` varchar(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cartlogintb`
--

INSERT INTO `cartlogintb` (`id`, `email`, `phno`, `username`, `password`) VALUES
(1, 'admin@gmail.com', '7990688265', 'admin', 'admin@12345'),
(2, 'kathan22@gmail.com', '9723276484', 'kathan', 'kathan12'),
(4, 'manan@gmail.com', '901688265', 'manan', 'manan12'),
(5, 'rohitsharma@gmail.com', '9595827595', 'Rohit', 'rohit@45'),
(6, 'hrithik@gmail.com', '1234567891', 'hrithik', 'hr12'),
(7, 'abhay@gmail.com', '7984993782', 'abhay', 'abhay12'),
(8, 'rishi@gmail.com', '7573021301', 'rishi', 'rishi12'),
(9, 'devraaj@gmail.com', '7096893346', 'devraaj', 'dp12'),
(10, 'smit@gmail.com', '9712000502', 'smit', 'smit117'),
(11, 'newuser@gmail.com', '1212345712', 'new user', 'newuser12');

-- --------------------------------------------------------

--
-- Table structure for table `carttb`
--

CREATE TABLE `carttb` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `pid` varchar(100) DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carttb`
--

INSERT INTO `carttb` (`id`, `username`, `pid`, `qty`) VALUES
(48, 'kathan', 'p1', 20);

-- --------------------------------------------------------

--
-- Table structure for table `ordertb`
--

CREATE TABLE `ordertb` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `pid` varchar(100) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordertb`
--

INSERT INTO `ordertb` (`id`, `username`, `pid`, `qty`) VALUES
(22, 'Rohit', 'p3', 1),
(25, 'Rohit', 'p4', 5),
(28, 'kathan', 'p1', 9),
(32, 'kathan', 'p4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `productstb`
--

CREATE TABLE `productstb` (
  `id` int(11) NOT NULL,
  `pid` varchar(100) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `pimage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productstb`
--

INSERT INTO `productstb` (`id`, `pid`, `pname`, `price`, `category`, `pimage`) VALUES
(1, 'p1', 'pizza', 500, 'non-vegetarian', 'images/food-2.png'),
(2, 'p2', 'burger', 700, 'non-vegetarian', 'images/food-1.png'),
(3, 'p3', 'paratha', 900, 'vegetarian', 'images/food-6.png'),
(5, 'p5', 'coca-cola', 100, 'vegetarian', 'images/food-5.png'),
(6, 'p4', 'burger', 700, 'vegetarian', 'images/food-3.png'),
(7, 'p10', 'sandwich', 500, 'vegetarian', 'images/food-4.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cartlogintb`
--
ALTER TABLE `cartlogintb`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `carttb`
--
ALTER TABLE `carttb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `ordertb`
--
ALTER TABLE `ordertb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `productstb`
--
ALTER TABLE `productstb`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pid` (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cartlogintb`
--
ALTER TABLE `cartlogintb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `carttb`
--
ALTER TABLE `carttb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `ordertb`
--
ALTER TABLE `ordertb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `productstb`
--
ALTER TABLE `productstb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carttb`
--
ALTER TABLE `carttb`
  ADD CONSTRAINT `carttb_ibfk_1` FOREIGN KEY (`username`) REFERENCES `cartlogintb` (`username`),
  ADD CONSTRAINT `carttb_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `productstb` (`pid`);

--
-- Constraints for table `ordertb`
--
ALTER TABLE `ordertb`
  ADD CONSTRAINT `ordertb_ibfk_1` FOREIGN KEY (`username`) REFERENCES `cartlogintb` (`username`),
  ADD CONSTRAINT `ordertb_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `productstb` (`pid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
