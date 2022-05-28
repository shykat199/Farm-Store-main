-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2022 at 01:46 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `hno` text NOT NULL,
  `society` text NOT NULL,
  `area` text NOT NULL,
  `pincode` int(11) NOT NULL,
  `landmark` text DEFAULT NULL,
  `type` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `uid`, `hno`, `society`, `area`, `pincode`, `landmark`, `type`, `status`, `name`) VALUES
(1, 1, '56/2', 'B K Roy Road', 'Khulna', 9100, 'Poipara Mondir', 'Home', 1, 'Test User'),
(2, 2, '70/2', 'aaa', 'aaa', 144601, 'aaa', 'southwinds', 1, 'shykat roy');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(8) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `contact_no` varchar(14) NOT NULL,
  `nid` varchar(20) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT 1,
  `approve` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `fname`, `lname`, `address`, `contact_no`, `nid`, `gender`, `user_type`, `approve`) VALUES
(1, 'superadmin', '123456', 'Super', 'Admin', 'Khulna', '01111111111', '0111111111', 'Male', 0, 0),
(2, 'Subadmin1', '123456789', 'Super', 'Admin', 'Khulna', '01111111111', '0111111111', 'Male', 1, 0),
(3, 'Subadmin2', '123456789', 'Super', 'Admin', 'Khulna', '01111111111', '0111111111', 'Male', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart_table`
--

CREATE TABLE `cart_table` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` text NOT NULL,
  `pname` text NOT NULL,
  `pimg` text NOT NULL,
  `ptype` text NOT NULL,
  `price` text NOT NULL,
  `discount` float NOT NULL,
  `qty` text NOT NULL,
  `total` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_table`
--

INSERT INTO `cart_table` (`id`, `uid`, `pid`, `pname`, `pimg`, `ptype`, `price`, `discount`, `qty`, `total`) VALUES
(31, 2, '6', 'Product 1', 'cat/thump_1652925485.jpg', '0', '0', 10, '2', 200),
(34, 1, '6', 'Product 1', 'cat/thump_1652925485.jpg', '0', '0', 10, '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `catname` text NOT NULL,
  `catimg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `catname`, `catimg`) VALUES
(4, 'Prestiside', 'cat/thump_1652925417.jpg'),
(6, 'Fertilizer', 'cat/thump_1653017798.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(14) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `contact_no`, `message`, `date`) VALUES
(1, 'Test', 'test@test.com', '01729277765', 'This is a test message.', '2022-05-21 10:44:45'),
(2, 'shykat roy', 'abc@gmail.com', '01317120335', 'sss', '2022-05-22 13:39:11'),
(3, 'shykat roy', 'dipakkumarray199@gmail.com', '01317120335', 'hello hii', '2022-05-22 13:44:37'),
(4, 'shykat roy', 'bhanuprasadmiryala32@gmail.com', '01317120335', 'Hello Bhanu...\r\nSending mail is working for multiple user...', '2022-05-22 13:56:10');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(8) NOT NULL,
  `oid` text NOT NULL,
  `uid` int(11) NOT NULL,
  `pname` text NOT NULL,
  `pid` text NOT NULL,
  `ptype` text NOT NULL,
  `pprice` text NOT NULL,
  `ddate` text NOT NULL,
  `timesloat` text NOT NULL,
  `order_date` date NOT NULL,
  `status` text NOT NULL,
  `qty` text NOT NULL,
  `total` float NOT NULL,
  `rate` int(11) NOT NULL DEFAULT 0,
  `p_method` text DEFAULT NULL,
  `photo` longtext DEFAULT NULL,
  `tax` int(11) NOT NULL DEFAULT 0,
  `address_id` int(11) NOT NULL DEFAULT 0,
  `tid` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `oid`, `uid`, `pname`, `pid`, `ptype`, `pprice`, `ddate`, `timesloat`, `order_date`, `status`, `qty`, `total`, `rate`, `p_method`, `photo`, `tax`, `address_id`, `tid`) VALUES
(1, 'af3a74c6a3', 1, 'Product 2', '2', '1 gms', '1', '2022-02-28', '9AM to 5PM', '2022-02-28', 'completed', '1', 1, 0, 'Cash on Delivery', NULL, 0, 1, NULL),
(5, '077c6f42c4', 1, 'Product 1', '1', '250 gms', '10', '2022-02-28', '9AM to 5PM', '2022-02-28', 'completed', '11', 110, 0, 'Cash on Delivery', NULL, 0, 1, NULL),
(6, 'c1d575ae00', 1, 'Product 1', '1', '250 gms', '10', '2022-03-06', '9AM to 5PM', '2022-03-06', 'pending', '15', 150, 0, 'Cash on Delivery', NULL, 0, 1, NULL),
(7, '8ab6027c97', 1, 'Product 1', '1', '1 gms', '1', '2022-04-26', '9AM to 5PM', '2022-04-16', 'completed', '1000', 1100, 0, 'Cash on Delivery', NULL, 0, 1, NULL),
(8, '29c0dc73dd', 1, 'Product 1', '3', '1 kg', '100', '2022-05-18', '9AM to 5PM', '2022-05-15', 'completed', '2', 798, 0, 'Cash on Delivery', NULL, 0, 1, NULL),
(9, '0e56663e9a', 2, 'Product 1', '3', '1 kg', '100', '2022-05-18', '9AM to 5PM', '2022-05-15', 'completed', '2', 300, 0, 'Cash on Delivery', NULL, 0, 2, NULL),
(10, '122764c501', 1, 'Product 1', '3', '1 kg', '100', '2022-05-20', '9AM to 5PM', '2022-05-15', 'completed', '2', 300, 0, 'Cash on Delivery', NULL, 0, 1, NULL),
(11, 'cab39f8b2e', 2, 'Product 1', '6', '1 kg', '100', '2022-05-22', '9AM to 5PM', '2022-05-19', 'cancelled', '2', 198, 0, 'Cash on Delivery', NULL, 0, 2, NULL),
(12, '6601673500', 1, 'Product 1', '6', '1 kg', '100', '2022-05-24', '9AM to 5PM', '2022-05-19', 'pending', '2', 320, 0, 'Cash on Delivery', NULL, 0, 1, NULL),
(13, '163816157b', 2, 'Product 1', '6', '1 kg', '100', '2022-05-24', '9AM to 5PM', '2022-05-21', 'cancelled', '2', 198, 0, 'Cash on Delivery', NULL, 0, 2, NULL),
(14, 'f9eecf0ee7', 2, 'Product 1', '6', '1 kg', '100', '2022-05-24', '9AM to 5PM', '2022-05-21', 'completed', '2', 198, 0, 'Cash on Delivery', NULL, 0, 2, NULL),
(15, '1605baf660', 1, 'Product 5', '7', '5 kg', '600', '2022-05-26', '9AM to 5PM', '2022-05-21', 'pending', '1', 760, 0, 'Cash on Delivery', NULL, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `pname` text NOT NULL,
  `sname` text NOT NULL,
  `cid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `psdesc` text NOT NULL,
  `pgms` text NOT NULL,
  `pprice` text NOT NULL,
  `status` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `pimg` text NOT NULL,
  `prel` longtext DEFAULT NULL,
  `date` datetime NOT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `popular` int(11) NOT NULL,
  `area` varchar(255) NOT NULL DEFAULT 'Mohanogor'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `pname`, `sname`, `cid`, `sid`, `psdesc`, `pgms`, `pprice`, `status`, `stock`, `pimg`, `prel`, `date`, `discount`, `popular`, `area`) VALUES
(6, 'Product 1', 'Admin', 4, 11, 'Test 1', '1 kg', '100', 1, 1, 'cat/thump_1652925485.jpg', 'cat/0WhatsApp Image 2022-04-28 at 6.58.58 PM.jpeg,cat/1download.jpg', '2022-05-19 03:58:05', 0, 1, 'Mohanogor'),
(7, 'Product 5', 'Admin', 4, 11, 'Test 5', '5 kg', '600', 1, 1, 'cat/thump_1653015615.jpeg', 'cat/0download.jpg', '2022-05-20 05:00:15', 0, 1, 'Mohanogor'),
(8, 'Product 1', 'Admin', 6, 12, 'Test 1', '1 kg', '500', 1, 0, 'cat/thump_1653017927.jpg', 'cat/0WhatsApp Image 2022-04-28 at 6.58.58 PM.jpeg,cat/1download.jpg', '2022-05-20 05:38:47', 0, 0, 'Mohanogor');

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_email` text NOT NULL,
  `rating` varchar(255) NOT NULL,
  `review` text NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_review`
--

INSERT INTO `product_review` (`id`, `product_id`, `user_id`, `user_email`, `rating`, `review`, `status`, `added_on`) VALUES
(1, 7, 1, 'vxgxx@gmail.com', '5', 'ddd', 1, '2022-05-21 21:41:09'),
(2, 6, 2, 'abc@gmail.com', '4', 'Good Product', 0, '2022-05-21 23:04:06');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `currency` text CHARACTER SET utf8 NOT NULL,
  `privacy_policy` longtext NOT NULL,
  `about_us` longtext NOT NULL,
  `contact_us` longtext NOT NULL,
  `o_min` int(11) NOT NULL,
  `timezone` text NOT NULL,
  `tax` int(11) NOT NULL,
  `logo` text NOT NULL,
  `favicon` text NOT NULL,
  `title` text NOT NULL,
  `terms` text NOT NULL,
  `delivery_charge` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `currency`, `privacy_policy`, `about_us`, `contact_us`, `o_min`, `timezone`, `tax`, `logo`, `favicon`, `title`, `terms`, `delivery_charge`) VALUES
(1, 'BDT', '', '', '', 100, 'Asia/Dhaka', 10, 'website/thump_1650089274.png', 'website/thump_1644821581.png', '', '', 100.00);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `cat_id`, `name`, `img`) VALUES
(11, 4, 'Non-organic', 'subcategory/thump_1652925432.jpeg'),
(12, 6, 'Bio Fertilizer', 'subcategory/thump_1653017862.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `imei` text NOT NULL,
  `email` text NOT NULL,
  `ccode` text NOT NULL,
  `mobile` text NOT NULL,
  `rdate` datetime NOT NULL,
  `password` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `pin` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `imei`, `email`, `ccode`, `mobile`, `rdate`, `password`, `status`, `pin`) VALUES
(1, 'Test User', '', 'test@test.com', '+88', '01729277765', '0000-00-00 00:00:00', '123456789', 1, NULL),
(2, 'Monoget Saha', '', 'monoget1@gmail.com', '+88', '01679503004', '0000-00-00 00:00:00', '123456789', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_table`
--
ALTER TABLE `cart_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart_table`
--
ALTER TABLE `cart_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
