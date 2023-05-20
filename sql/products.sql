-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2023 at 05:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `products`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `sku` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `product_type` varchar(20) NOT NULL,
  `size` int(11) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `dimensions` varchar(50) DEFAULT NULL,
  `width` varchar(255) NOT NULL,
  `length` varchar(200) NOT NULL,
  `height` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sku`, `name`, `price`, `product_type`, `size`, `weight`, `dimensions`, `width`, `length`, `height`) VALUES
(59, 'ggg-11-11', 'Acme Disc', 1, 'DVD-disc', 700, '', '', '', '', ''),
(60, 'ABD200', 'Acme Disc', 20, 'DVD-disc', 700, '', '', '', '', ''),
(61, 'ABD201', 'Acme Disc', 20, 'DVD-disc', 700, '', '', '', '', ''),
(62, 'ABD202', 'Acme Disc', 20, 'DVD-disc', 700, '', '', '', '', ''),
(63, 'GGWP0007', 'War ', 50, 'Book', 0, '2', '', '', '', ''),
(64, 'GGWP0008', 'War', 50, 'Book', 0, '2', '', '', '', ''),
(65, 'GGWP0009', 'War', 50, 'Book', 0, '2', '', '', '', ''),
(66, 'GGWP00010', 'War', 50, 'Book', 0, '2', '', '', '', ''),
(67, 'HYY520001', 'Table', 100, 'Furniture', 0, '', '10', '45', '', '24'),
(69, 'HYY520002', 'Table', 100, 'Furniture', 0, '', '30', '20', '', '10'),
(75, 'HYY5200022', 'Acme Disc', 22, 'Furniture', 0, '', '20', '20', '', '20'),
(76, 'HYY5200021', 'Table', 100, 'Furniture', 0, '', '16', '15', '', '12'),
(77, '', '', 0, '', 0, '', '', '', '', ''),
(88, 'sss', '', 0, '', 0, '', '', '', '', ''),
(90, 'aa', 'aa', 11, 'Furniture', 0, '', '11', '11', '', '11'),
(98, 'ss', 'aa', 111, '', 0, '', '', '', '', ''),
(101, 'ssss', 'ss', 11, 'DVD-disc', 10, '', '', '', '', ''),
(102, 'test', 'toshiba', 222, 'Book', 0, '11', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
