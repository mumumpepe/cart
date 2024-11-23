-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2024 at 01:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cartdevelopment`
--

-- --------------------------------------------------------

--
-- Table structure for table `15june2024mumumpepe`
--

CREATE TABLE `15june2024mumumpepe` (
  `userid` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `unity_price` int(11) DEFAULT NULL,
  `discount_percentage` int(11) DEFAULT NULL,
  `new_price` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `15june2024mumumpepe`
--

INSERT INTO `15june2024mumumpepe` (`userid`, `product_id`, `product_name`, `product_image`, `unity_price`, `discount_percentage`, `new_price`, `amount`, `subtotal`) VALUES
(1, 1, 'Washing Machine', 'www.washingmachine.com', 123, 2, 121, 1, 121),
(2, 3, 'car', 'car.com', 80, 5, 76, 3, 228),
(3, 4, 'soap', 'soap.com', 4, 5, 4, 3, 12);

-- --------------------------------------------------------

--
-- Table structure for table `20november2024mumumpepe`
--

CREATE TABLE `20november2024mumumpepe` (
  `userid` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `unity_price` int(11) DEFAULT NULL,
  `discount_percentage` int(11) DEFAULT NULL,
  `new_price` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `20november2024mumumpepe`
--

INSERT INTO `20november2024mumumpepe` (`userid`, `product_id`, `product_name`, `product_image`, `unity_price`, `discount_percentage`, `new_price`, `amount`, `subtotal`) VALUES
(1, 1, 'Washing Machine', 'www.washingmachine.com', 123, 2, 121, 5, 605),
(2, 2, 'laundry machine', 'www.laudrymachine.com', 125, 3, 121, 7, 847),
(3, 3, 'car', 'car.com', 80, 5, 76, NULL, NULL),
(5, 5, 'water pump', 'www.waterpump.com', 300, 5, 285, 6, 1710);

-- --------------------------------------------------------

--
-- Table structure for table `22march2024mumumpepe`
--

CREATE TABLE `22march2024mumumpepe` (
  `userid` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `unity_price` int(11) DEFAULT NULL,
  `discount_percentage` int(11) DEFAULT NULL,
  `new_price` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `22march2024mumumpepe`
--

INSERT INTO `22march2024mumumpepe` (`userid`, `product_id`, `product_name`, `product_image`, `unity_price`, `discount_percentage`, `new_price`, `amount`, `subtotal`) VALUES
(15, 1, 'Washing Machine', 'www.washingmachine.com', 123, 2, 121, 1, 121),
(16, 2, 'laundry machine', 'www.laudrymachine.com', 125, 3, 121, 1, 121),
(17, 4, 'soap', 'soap.com', 4, 5, 4, 1, 4),
(18, 5, 'water pump', 'www.waterpump.com', 300, 5, 285, 1, 285),
(19, 1, 'Washing Machine', 'www.washingmachine.com', 123, 2, 121, 1, 121),
(20, 2, 'laundry machine', 'www.laudrymachine.com', 125, 3, 121, 1, 121),
(21, 3, 'car', 'car.com', 80, 5, 76, 1, 76),
(22, 1, 'Washing Machine', 'www.washingmachine.com', 123, 2, 121, 1, 121);

-- --------------------------------------------------------

--
-- Table structure for table `23march2024mumumpepe`
--

CREATE TABLE `23march2024mumumpepe` (
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `unity_price` int(11) DEFAULT NULL,
  `discount_percentage` int(11) DEFAULT NULL,
  `new_price` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `23march2024mumumpepe`
--

INSERT INTO `23march2024mumumpepe` (`product_id`, `product_name`, `product_image`, `unity_price`, `discount_percentage`, `new_price`, `amount`, `subtotal`) VALUES
(4, 'soap', 'soap.com', 4, 5, 4, 6, 24),
(5, 'water pump', 'www.waterpump.com', 300, 5, 285, 7, 1995),
(4, 'soap', 'soap.com', 4, 5, 4, 6, 24),
(5, 'water pump', 'www.waterpump.com', 300, 5, 285, 7, 1995),
(5, 'water pump', 'www.waterpump.com', 300, 5, 285, 7, 1995),
(4, 'soap', 'soap.com', 4, 5, 4, 6, 24),
(2, 'laundry machine', 'www.laudrymachine.com', 125, 3, 121, 2, 242),
(3, 'car', 'car.com', 80, 5, 76, 1, 76),
(4, 'soap', 'soap.com', 4, 5, 4, 6, 24),
(5, 'water pump', 'www.waterpump.com', 300, 5, 285, 7, 1995),
(1, 'Washing Machine', 'www.washingmachine.com', 123, 2, 121, 1, 121),
(2, 'laundry machine', 'www.laudrymachine.com', 125, 3, 121, 2, 242),
(3, 'car', 'car.com', 80, 5, 76, 1, 76),
(4, 'soap', 'soap.com', 4, 5, 4, 6, 24),
(5, 'water pump', 'www.waterpump.com', 300, 5, 285, 7, 1995);

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `product_picture` varchar(255) DEFAULT NULL,
  `unity_price` int(11) DEFAULT NULL,
  `product_description` varchar(255) DEFAULT NULL,
  `discount_percentage` int(11) DEFAULT NULL,
  `new_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`product_id`, `product_name`, `product_picture`, `unity_price`, `product_description`, `discount_percentage`, `new_price`) VALUES
(1, 'Washing Machine', 'www.washingmachine.com', 123, 'best washing machine ever', 2, 121),
(2, 'laundry machine', 'www.laudrymachine.com', 125, 'less energy greateer work', 3, 121),
(3, 'car', 'car.com', 80, 'best driving car', 5, 76),
(4, 'soap', 'soap.com', 4, 'for washing', 5, 4),
(5, 'water pump', 'www.waterpump.com', 300, 'the best water pump that uses the solar power', 5, 285),
(10, '', '', 0, '', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `15june2024mumumpepe`
--
ALTER TABLE `15june2024mumumpepe`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `20november2024mumumpepe`
--
ALTER TABLE `20november2024mumumpepe`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `22march2024mumumpepe`
--
ALTER TABLE `22march2024mumumpepe`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `15june2024mumumpepe`
--
ALTER TABLE `15june2024mumumpepe`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `20november2024mumumpepe`
--
ALTER TABLE `20november2024mumumpepe`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `22march2024mumumpepe`
--
ALTER TABLE `22march2024mumumpepe`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
