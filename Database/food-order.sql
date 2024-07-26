-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2024 at 10:24 AM
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
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(19, 'Ananya', 'chuni', '827ccb0eea8a706c4c34a16891f84e7b'),
(23, 'Ashis', 'asis', '9e1e06ec8e02f0a0074f2fcc6b26303b'),
(26, 'Roya', 'riya', '81dc9bdb52d04dc20036dbd8313ed055'),
(29, 'wert', 'ananya', '81dc9bdb52d04dc20036dbd8313ed055'),
(30, 'sur', 'ananya', '09e5cb531a1f732e541bb04f9b680249');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(1, 'Fish Item', 'Food_Category_270.jpg', 'Yes', 'Yes'),
(14, 'Starter', 'Food_Category_970.jpg', 'Yes', 'Yes'),
(17, 'Biriyani Item', 'Food_Category_908.jpg', 'Yes', 'Yes'),
(18, 'Desserts', 'Food_Category_800.jpg', 'Yes', 'Yes'),
(20, 'Chicken Item', 'Food_Category_101.jpg', 'Yes', 'Yes'),
(21, 'Mutton Item', 'Food_Category_952.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(7, 'Mutton biriyani', 'Flavorful mutton biryani with fragrant spices and tender meat.', 300, 'Food_Name_851.jpg', 17, 'Yes', 'Yes'),
(8, 'Golap jamun', 'Sweet, soft golap jamuns drenched in aromatic syrup bliss.', 70, 'Food_Name_137.jpg', 18, 'Yes', 'Yes'),
(9, 'Sandesh', 'Delicate Bengali sweet made from fresh paneer and sugar', 200, 'Food_Name_742.jpg', 18, 'Yes', 'Yes'),
(10, 'Fish  Rezela', 'Mildly spiced fish curry in creamy yogurt sauce.', 200, 'Food_Name_24.jpg', 1, 'Yes', 'Yes'),
(11, 'Chicken Biriyani', 'Spiced basmati rice with tender chicken and herbs.', 250, 'Food_Name_63.jpg', 17, 'Yes', 'Yes'),
(12, 'Mutton Rogan Josh', 'Tender mutton in rich, aromatic Kashmiri curry.', 400, 'Food_Name_445.jpg', 21, 'Yes', 'Yes'),
(13, 'Egg Chicken Roll', 'Flaky paratha filled with chicken, egg, spices.', 80, 'Food_Name_952.jpg', 14, 'Yes', 'Yes'),
(15, 'Golbari style Mutton', 'Spicy, slow-cooked mutton in rich gravy.', 450, 'Food_Name_69.jpg', 21, 'Yes', 'Yes'),
(16, 'veg pokora', 'Crispy, golden-brown veg pakoras bursting with spicy flavor.', 100, 'Food_Name_597.jpg', 14, 'Yes', 'Yes'),
(17, 'Chicken Kabab', 'Chicken kabab is a mouthwatering dish made from marinated chicken pieces', 200, 'Food_Name_418.jpg', 20, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Mutton biriyani', 300.00, 2, 600.00, '2024-07-19 06:30:58', 'Ordered', 'Diya Dey', '678943378', 'manami.cal.in@gmail.com', 'burdwan'),
(7, 'Egg Chicken Roll', 80.00, 1, 80.00, '2024-07-19 02:49:22', 'Ordered', 'mnhjuyy', '6798903421', 'manami.cal.in@gmail.com', ' Dum dum'),
(8, 'Egg Chicken Roll', 80.00, 2, 160.00, '2024-07-19 03:04:47', 'On Delivery', 'Ram', '6798903421', 'acd.cal.in@gmail.com', ' kolkata'),
(9, 'Fish  Rezela', 200.00, 3, 600.00, '2024-07-19 03:05:36', 'Delivered', 'Diya Dey', '9546784356', 'acd.cal.in@gmail.com', 'kolkata');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
