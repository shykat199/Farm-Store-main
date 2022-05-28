-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2022 at 12:16 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

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
(2, 'Fertilizers', 'cat/thump_1653538933.jpg'),
(3, 'Pesticides', 'cat/thump_1653538969.jfif'),
(4, 'Seeds', 'cat/thump_1653538990.jpg');

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
(2, 'Hybrid Vegetable Seeds', 'Admin', 4, 9, 'A hybrid vegetable is created when plant breeders intentionally cross-pollinate two different varieties of a plant, aiming to produce an offspring, or hybrid, that contains the best traits of each of the parents. Cross-pollination is a natural process that occurs within members of the same plant species.', '1kg ', '50', 1, 1, 'cat/thump_1653546603.jpg', 'cat/0Hybrid Vegetable Seeds3.jpg,cat/1Hybrid Vegetable Seeds4.jpg,cat/2Hybrid Vegetable Seeds5.jpg', '2022-05-26 08:30:03', 0, 1, 'Mohanogor'),
(3, 'Natural Multicolor Vegetables Seeds', 'Admin', 4, 9, 'Product Specification\r\nBrand	MGBN\r\nUsage/Application	Gardening\r\nType	Natural\r\nColor	Multicolor\r\nMinimum Order Quantity	5gm\r\nCountry of Origin	Made in India\r\nMinimum Order Quantity	5 Gram', '1 gms', '195', 1, 1, 'cat/thump_1653546705.png', 'cat/0Natural Multicolor Vegetables Seeds3.png,cat/1Natural Multicolor Vegetables Seeds4.png,cat/2Natural Multicolor Vegetables Seeds5.png', '2022-05-26 08:31:45', 0, 0, 'Mohanogor'),
(4, 'Safflower Seeds', 'Admin', 4, 9, 'Our company is a prominent Manufacturer and Supplier of Safflower Seeds. Safflower Seeds are also known as carthami semen and carthami flos. Safflower Seeds are used in coloring and flavoring foods and also used for preparing cooking oil and salads and bird feeds. Our agriculturists cultivate, process as well as pack these Safflower Seeds in the most favorable conditions, and supply them on time to the clients.', '1 kg', '65', 1, 1, 'cat/thump_1653546779.jpg', 'cat/0Safflower Seeds.jpg,cat/1Safflower Seeds1.jpg,cat/2Safflower Seeds2.jpg', '2022-05-26 08:32:59', 0, 0, 'Mohanogor'),
(5, 'E-nnovative Agrico Pesticides', 'Admin', 3, 7, 'We “E-Nnovative Agrico” are the Manufacturer and Supplier of a wide range of Bio Pesticide, Plant Growth Stimulant, Chemicals And Solvents, Agriculture Fertilizers, Soil Conditioners, etc.', '1 ltr', '120', 1, 1, 'cat/thump_1653546931.jpg', 'cat/0product-jpeg-500x500 (1).jpg,cat/1product-jpeg-500x500 (2).jpg,cat/2product-jpeg-500x500.jpg', '2022-05-26 08:35:31', 0, 0, 'Mohanogor'),
(6, 'NemoFunGo', 'Admin', 3, 7, 'Specifications:\r\nNemoFunGo is a consortium of various fungi prepared by concept of Biotechnology. \r\nNemoFunGo is made from the various effective fungi like Trichoderma Harzianum, Trichoderma Viride, Pochonia Chlamydosporia, Paecilomyces Lilacinus and many other fungi that are effective in controlling different types of soil borne Nematodes and Fungi.', '250 ml', '320', 1, 1, 'cat/thump_1653546991.jpg', 'cat/1nemofungo-500x500 (1).jpg', '2022-05-26 08:36:31', 0, 0, 'Mohanogor'),
(7, 'Organic Insecticide', 'Admin', 3, 7, 'To make your own organic insecticide spray, chop up two cups of fresh tomato leaves, place them into a quart of water, and allow the mixture to steep overnight. Strain, pour into a spray bottle and spray directly onto plant foliage. Most effective for: aphids.', '1 ltr', '1500', 1, 1, 'cat/thump_1653547177.jfif', '', '2022-05-26 08:39:37', 0, 0, 'Mohanogor'),
(8, 'Power Plant Orgomite', 'Admin', 3, 8, 'Product Description\r\nOrgomite is potent botanical formulation for effective control of mites and thrips. It is a organic miticide suitable for mite control programs, integrated pest management and sustainable/organic practices. It can  effectively be used to control against Mites, Red Spider mites, two spotted mites etc in crops. Bio-extract based formulation attacks metabolism of mites. It penetrates the \'skin\' of insects effectively blocking their breathing holes suffocating them. The protective membrane around insect eggs is also broken down resulting in death via dehydration. Orgomite also has a mild repellency action on the leaves of plants, which discourages insects from laying new eggs on sprayed areas. It also has growth promoting characteristics to recover plant losses incurred due to pest attack. It can be used in all crops, fruits, vegetables, Ornamental etc. \r\n', '1 ltr', '1200', 1, 1, 'cat/thump_1653547304.webp', 'cat/0power-plant-orgomite-500x500 (1).jpg,cat/1power-plant-orgomite-500x500 (2).jpg,cat/2power-plant-orgomite-500x500.jpg', '2022-05-26 08:41:44', 0, 1, 'Mohanogor'),
(9, 'VAAYU-Organic Pesticide', 'Admin', 3, 8, 'VAAYU:--THE ANTI FEEDANT & REPELLENT. A potential  Larvicide and Anti Feedant against chewing caterpillars and borers prepared under the Ancient Ayurvedha system .VAAYU - is an Eco friendly, Economical ,Effective herbal formulation .VAAYU  has Stomach action ,Contact action and Fumigant action.', '1 bottle', '650', 1, 1, 'cat/thump_1653547416.jpg', 'cat/0img-20220411-wa0051-jpg-500x500.jpg,cat/1organic-larvicide-stem-borer-shoot-borer--500x500.jpg,cat/2product-jpeg-500x500.jpg', '2022-05-26 08:43:36', 0, 1, 'Mohanogor'),
(10, 'Rooting Hormone', 'Admin', 2, 4, 'Willow water has been used as a natural rooting hormone for centuries. It\'s made by steeping young, freshly cut willow twigs in plain water for 24 to 72 hours. Keep the container in a dark, cool spot while you await the brew. Filter out the willow stems and plan to use it right away on your cuttings.', '100 gms', '350', 1, 1, 'cat/thump_1653547510.jpg', 'cat/0rooting-hormone-rise-up-500x500.jpg,cat/1rooting-hormone-rise-up-500x500.png,cat/2rooting-powder-germinating-powder-500x500.jpg', '2022-05-26 08:45:10', 0, 1, 'Mohanogor'),
(11, 'Micro Fert Combi G-2,', 'Admin', 2, 5, 'Benefits:\r\nCombi Liquid G-2 Is a balanced combination of all micronutrients required for normal growth &reproduction of crop plants. Micronutrients in COMBI G-2 are fully chelated and are 100% water soluble. These nutrients are working in a wide range of pH of soil when applied either directly or through fertigation . Thus COMBI G-2 helps to overcome the deficiency of micronutrients when used judiciously. COMBI G-2 is greenish micro granule\r\n\r\nDose:\r\nApply G-2= 250gm to 500gm per acre dose for soil application\r\nUse 100gm to 200gm per acre for foliar spray', '1 bottle', '233', 1, 1, 'cat/thump_1653547572.jpg', 'cat/0micro-fert-combi-g-2-500x500 (1).jpg,cat/1micro-fert-combi-g-2-500x500 (2).jpg,cat/2microfert-combi-g-2-500x500.jpg', '2022-05-26 08:46:12', 0, 1, 'Mohanogor'),
(12, 'Bio Vita Z', 'Admin', 2, 4, 'Product Details :\r\nBIOVITA is based on seaweed Ascophyllum nodosum, the finest marine plant available for agricultural use and is recognized world over as an excellent natural fertilizer and source of organic matter. BIOVITA application enables plants to receive direct benefits from the naturally balanced nutrients and plant growth substances available in the seaweed extract.\r\n\r\nFeatures\r\nBIOVITA provides over 60 naturally occurring major and minor nutrients and plant development substances comprising of enzymes, proteins, cytokinins, amino acids, vitamins, gibberellins, auxins, betains etc. in organic form.\r\nBIOVITA provides all constituents in balanced form for healthier plant growth.\r\nBIOVITA contributes to greater microbial activity when applied to soil and thus increasing the nutrient availability to plants.\r\nBIOVITA is an ideal organic product for better growth and productivity, which can be used on all types of plants, whether indoor, outdoor, garden, nursery, lawns, turf, agriculture or plantation crops.\r\nApplication Method\r\nField crops – Broadcast BIOVITA granules uniformly on thick sown crops. For wide spacing crops, use furrows / spots/fertigation methods of application.\r\nVegetables, Fruits, Plantation crops – Apply BIOVITA granules in furrows or in spots around the plants, mix with the soil and then water the plants/field.\r\nFlowers & pot plants – Apply 8-10 grams of BIOVITA granules around each plant, 2 to 3 inches away from the stem. After application, earth up the soil to mix the granules with top layer and water the plants normally.\r\nTurf and Lawns – Broad cast 40 to 50 grams BIOVITA granules per square meter before planting or 20 to 25 grams after planting and water the lawn. Repeat the granular application once in every six month.Packaging\r\nBIOVITA Granules - Available in 1 kg, 4 kg, 8 kg 10 kg (bucket) and 50 kg (drum) packs.', '1 packet', '330', 1, 1, 'cat/thump_1653547659.jpg', 'cat/0Bio Vita Z2.jpg,cat/1Bio Vita Z3.jpg,cat/2Bio Vita Z4.jpg', '2022-05-26 08:47:39', 0, 1, 'Mohanogor'),
(13, 'Bio-Tech Grade', 'Admin', 2, 4, 'We are engaged in offering Organic Fertilizer, which is extremely praised in the market. Owing to high demand, professionals make these products in varied patterns.', '1 kg', '25', 1, 1, 'cat/thump_1653558540.jpg', 'cat/0Bio-Tech Grade.jpg,cat/1Bio-Tech Grade2.jpg,cat/2Bio-Tech Grade3.jpg', '2022-05-26 11:49:00', 0, 1, 'Mohanogor'),
(14, 'EM Solution', 'Admin', 2, 4, 'EM Solution is a mixture of various beneficial microbes. They help to protect plants from various fungal and bacterial pathogens. EM solution will improve crop protection and help in crop yield if applied on regular intervals.', '1 bottle', '100', 1, 1, 'cat/thump_1653558639.jpg', 'cat/0EM Solution1.jpg,cat/1EM Solution2.jpg,cat/2EM Solution3.jpg', '2022-05-26 11:50:39', 0, 1, 'Mohanogor'),
(15, 'Bio Fungi Powder', 'Admin', 2, 6, 'Bio Fungi Plus Powder is Organic & biological organisms, used to kill or inhibit fungi or fungal spores. Fungus can cause serious damage in agriculture, resulting in critical losses of yield, quality and profit. We offer superior & powerful Bio Fungicides Plus Powder.', '1 kg', '380', 1, 0, 'cat/thump_1653558718.webp', 'cat/0bio-fungicide-powder-500x500 (1).png,cat/1bio-fungicide-powder-500x500 (2).png,cat/2bio-fungicide-powder-500x500.png', '2022-05-26 11:51:58', 0, 0, 'Mohanogor'),
(16, 'Culture Azolla Seed', 'Admin', 2, 6, 'Our firm is ranked amongst the reputed names in the market for offering an extensive range of Culture Azolla Seed. Besides, we present this series to our clients at nominal prices.', '1 kg', '300', 1, 1, 'cat/thump_1653558796.jpg', 'cat/0culture-azolla-seed-500x500 (1).jpg,cat/1culture-azolla-seed-500x500 (2).jpg,cat/2culture-azolla-seed-500x500 (3).jpg', '2022-05-26 11:53:16', 0, 1, 'Mohanogor'),
(17, 'Microbes-DG', 'Admin', 2, 5, '• Microbes–DG is a unique formulation of different microorganisms like Phosphate Solubilising bacteria, Potash solubilising Bacteria, Azospirillium, Azotobacter, microbes for solubilizing various micronutrients and other antifungal microorganisms, which give vigor to the plants against various soil borne diseases.\r\n• Microbes-DG Develops resistance against various fungal and many soil borne diseases.\r\n• Increase in crop production and enhanced soil fertility.\r\n• Better efficiency of various nutrients and micronutrients present in the soil.\r\n• Substantial Phosphate and Micronutrient Solubilization Plant can sustains high temperature and water scarcity under adverse conditions.\r\n• Requirement of various chemical fertilizers including nitrogen, phosphorous reduces.', '1 ltr', '380', 1, 1, 'cat/thump_1653558891.jpg', 'cat/0microbes-dg-combination-of-useful-microorganism-for-soil-and-plant-health-for-drip-grade--500x500 (1).jpg,cat/1microbes-dg-combination-of-useful-microorganism-for-soil-and-plant-health-for-drip-grade--500x500 (2).jpg,cat/2microbes-dg-combination-of-useful-microorganism-for-soil-and-plant-health-for-drip-grade--500x500 (3).jpg', '2022-05-26 11:54:51', 0, 1, 'Mohanogor'),
(18, 'Organic Bio Fertilizers', 'Admin', 2, 6, 'Bioorganic Fertilizer (BOF) is a processed inoculated compost from any organic material that has undergone rapid decomposition by the introduction of homogeneous microbial inoculants.', '1 kg', '120', 1, 1, 'cat/thump_1653558973.jpg', 'cat/0organic-bio-fertilizer-500x500 (3).jpg,cat/1organic-bio-fertilizer-500x500 (4).jpg,cat/2organic-bio-fertilizer-500x500 (5).jpg', '2022-05-26 11:56:13', 0, 1, 'Mohanogor');

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
(4, 2, 'Organic', 'subcategory/thump_1653546426.jpg'),
(5, 2, 'Non Organic', 'subcategory/thump_1653546440.jpg'),
(6, 2, 'Bio Fertilizers', 'subcategory/thump_1653546457.jpg'),
(7, 3, 'Organic', 'subcategory/thump_1653546476.jfif'),
(8, 3, 'Non Organic', 'subcategory/thump_1653546496.jpg'),
(9, 4, 'Seeds', 'subcategory/thump_1653546525.jpg');

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
  `rdate` datetime NOT NULL DEFAULT current_timestamp(),
  `password` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `pin` text DEFAULT NULL,
  `resetToken` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `imei`, `email`, `ccode`, `mobile`, `rdate`, `password`, `status`, `pin`, `resetToken`) VALUES
(5, 'shykat roy', '', 'shykatroy.11815813@gmail.com', '+88', '01317120335', '2022-05-25 13:16:44', '10101013', 1, NULL, NULL),
(6, 'Bhanu', '', 'bhanu11802334@gmail.com', '+88', '01904689903', '2022-05-25 18:23:34', 'kumar123', 1, NULL, '83b31a38a67b2e8e'),
(7, 'Kumar', '', 'kumar123@gmail.com', '+88', '01904689905', '2022-05-26 15:43:15', 'kumar123', 0, NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
