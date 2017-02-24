-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2017 at 07:45 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movefree`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `user_id` varchar(3) NOT NULL,
  `current_location` text NOT NULL,
  `destination` text NOT NULL,
  `price` varchar(10) NOT NULL,
  `payment_type` text NOT NULL,
  `time` time NOT NULL,
  `time_suffix` varchar(2) NOT NULL,
  `reservation_type` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservationtypes`
--

CREATE TABLE `reservationtypes` (
  `id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `alias` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `price` varchar(10) NOT NULL,
  `available` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservationtypes`
--

INSERT INTO `reservationtypes` (`id`, `name`, `alias`, `type`, `price`, `available`) VALUES
(1, 'Pick Up', 'pickup', 'Standard', '1000', '20'),
(2, 'Ride along', 'ride', 'Standard', '500', '20'),
(3, 'Luxury hire', 'luxury', 'Basic', '4000', '2'),
(4, 'Personal', 'personal', 'customize', '000', '0');

-- --------------------------------------------------------

--
-- Table structure for table `reserved`
--

CREATE TABLE `reserved` (
  `id` int(11) NOT NULL,
  `passenger_id` varchar(3) NOT NULL,
  `driver_id` varchar(3) NOT NULL,
  `res_id` varchar(3) NOT NULL,
  `timestamp` timestamp NOT NULL,
  `paymentStatus` varchar(10) NOT NULL DEFAULT 'pending',
  `paymentTime` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(180) NOT NULL,
  `profile_pic` varchar(40) NOT NULL DEFAULT 'images/avatar.png',
  `type` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservationtypes`
--
ALTER TABLE `reservationtypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserved`
--
ALTER TABLE `reserved`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reservationtypes`
--
ALTER TABLE `reservationtypes`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reserved`
--
ALTER TABLE `reserved`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
