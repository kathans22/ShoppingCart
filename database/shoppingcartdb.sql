-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2023 at 12:51 PM
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
-- Database: `shoppingcartdb`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ordertb`
--

CREATE TABLE `ordertb` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `pid` varchar(100) DEFAULT NULL,
  `poid` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordertb`
--

INSERT INTO `ordertb` (`id`, `username`, `pid`, `poid`, `qty`) VALUES
(49, 'hrithik', 'p1', 7, 1),
(50, 'kathan', 'p40', 8, 7),
(51, 'kathan', 'p15', 8, 4),
(52, 'kathan', 'p5', 8, 5),
(53, 'kathan', 'p45', 8, 20),
(54, 'kathan', 'p3', 8, 9),
(57, 'kathan', 'p3', 8, 1),
(58, 'kathan', 'p3', 9, 1),
(59, 'kathan', 'p4', 8, 1),
(60, 'kathan', 'p4', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payordertb`
--

CREATE TABLE `payordertb` (
  `poid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `creditcardno` mediumtext NOT NULL,
  `cvv` mediumtext NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payordertb`
--

INSERT INTO `payordertb` (`poid`, `username`, `creditcardno`, `cvv`, `status`) VALUES
(7, 'hrithik', 'SLNCOLgAUSKsnGpUcyhMQwIRMaBBS8UNSNz+PECK9H4=', 'SLNCOLgAUSKsnGpUcyhMQ79oySOBU4yP1PJz4TpmwyA=', 'done'),
(8, 'kathan', 'iF+MtLmMPD5QXUJGZRSiI5zVYyQS4q3kX9E1PTBx3mw=', 'iF+MtLmMPD5QXUJGZRSiI8BOcMgG5v7nyObwWX8k2Q8=', 'done'),
(9, 'kathan', '96lL7l3f52wUkCbdA6u+uYPMW+MaH6y7uVD5F0Z9sS4=', '96lL7l3f52wUkCbdA6u+ufNIgMfYC33e3VkMQeIgvLs=', 'done');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productstb`
--

INSERT INTO `productstb` (`id`, `pid`, `pname`, `price`, `category`, `pimage`) VALUES
(1, 'p1', 'pizza', 500, 'non-vegetarian', 'images/food-2.png'),
(2, 'p2', 'burger', 700, 'non-vegetarian', 'images/food-1.png'),
(3, 'p3', 'paratha', 900, 'vegetarian', 'images/food-6.png'),
(5, 'p5', 'coca-cola', 100, 'vegetarian', 'images/food-5.png'),
(6, 'p4', 'burger', 700, 'vegetarian', 'images/food-3.png'),
(7, 'p10', 'sandwich', 500, 'vegetarian', 'images/food-4.png'),
(8, 'p15', 'french fries', 50, 'vegetarian', 'images/food-6.png'),
(9, 'p20', 'salad', 5, 'vegetarian', 'images/salad.jpg'),
(10, 'p25', 'combo mania', 250, 'non-vegetarian', 'images/combo mania.jpg'),
(11, 'p45', 'combo mania', 500, 'vegetarian', 'images/combo mania.jpg'),
(12, 'p40', 'mix-vegetable', 450, 'vegetarian', 'images/mixveg.jpg');

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
  ADD KEY `pid` (`pid`),
  ADD KEY `poid` (`poid`);

--
-- Indexes for table `payordertb`
--
ALTER TABLE `payordertb`
  ADD PRIMARY KEY (`poid`),
  ADD KEY `username` (`username`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `ordertb`
--
ALTER TABLE `ordertb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `payordertb`
--
ALTER TABLE `payordertb`
  MODIFY `poid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `productstb`
--
ALTER TABLE `productstb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  ADD CONSTRAINT `ordertb_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `productstb` (`pid`),
  ADD CONSTRAINT `poidfk` FOREIGN KEY (`poid`) REFERENCES `payordertb` (`poid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payordertb`
--
ALTER TABLE `payordertb`
  ADD CONSTRAINT `usernamefk` FOREIGN KEY (`username`) REFERENCES `cartlogintb` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
