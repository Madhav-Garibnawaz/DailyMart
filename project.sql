-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2025 at 07:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_master`
--

CREATE TABLE `admin_master` (
  `aid` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_master`
--

INSERT INTO `admin_master` (`aid`, `name`, `email`, `password`, `status`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin1234', 0),
(2, 'Madhav Garibnawaz', 'sanjaygaribnavaz123@gmail.com', '', 0),
(3, 'Madhav Garibnawaz', 'sanjaygaribnavaz123@gmail.com', '12345', 0),
(4, 'Yash', 'yash@gmail.com', '123', 0),
(5, 'Jhanvi Patel', 'jhanvip@gmail.com', '12345', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category_master`
--

CREATE TABLE `category_master` (
  `cid` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_master`
--

INSERT INTO `category_master` (`cid`, `cname`, `photo`, `status`) VALUES
(5, 'Fruits & Vegetables', 'vegetables.jpg', 0),
(7, 'Cereals & Grains', 'cereals_grains.jpeg', 0),
(8, 'Pulses & Lentils', 'pulses_lentils.jpg', 0),
(9, 'Flours & Rice Varieties', 'flours_rice_varieties.jpg', 0),
(10, 'Oils & Ghee', 'oil_ghee.jpg', 0),
(11, 'Masalas & Spices', 'masalas_spices.jpg', 0),
(12, 'Dry Fruits & Nuts', 'dryfruitsandnuts.jpg', 0),
(13, 'Snacks & Ready-to-Eat', 'snacks_ready_to_eat.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_master`
--

CREATE TABLE `login_master` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_master`
--

INSERT INTO `login_master` (`id`, `email`, `password`, `status`) VALUES
(1, 'sanjaygaribnavaz123@gmail.com', '1234', 0),
(2, 'madhavgaribnavaz123@gmail.com', '12345', 0),
(3, 'a@gmail.com', '123', 0),
(4, 'v@gmail.com', '123', 0),
(5, 'kalpesh@gmail.com', '12', 0),
(6, 'ksnsharma@gmail.com', '12345', 0),
(7, 'j@gmail.com', '12', 0),
(8, 'vanshika@gmail.com', '1234', 0),
(9, 'nish@gmail.com', '1234', 0),
(10, 'yash@gmail.com', '1234', 0),
(11, 'nidhi@gmail.com', '1234', 0),
(12, ' b@gmail.com', ' 1234', 0),
(13, 'harshit@gmail.com', '1234', 0),
(14, 'neha@gmail.com', '1234', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE `order_master` (
  `oid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `pdesc` varchar(100) NOT NULL,
  `rate` int(11) NOT NULL,
  `photo` varchar(1000) NOT NULL,
  `qty` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_master`
--

INSERT INTO `order_master` (`oid`, `uid`, `pid`, `pname`, `pdesc`, `rate`, `photo`, `qty`) VALUES
(42, 2, 33, 'Desi Ghee ', 'Pure cow ghee with rich aroma, perfect for cooking ', 550, 'desighee-removebg-preview.png', 2),
(43, 2, 41, 'Almonds ', 'Premium quality crunchy almonds, rich in nutrients ', 850, 'almonds-removebg-preview.png', 1),
(44, 2, 42, 'Cashews ', 'Whole cashew nuts, perfect for snacking and cooking ', 900, 'cashews-removebg-preview.png', 2),
(45, 5, 16, 'Strawberry ', 'Fresh and sweet strawberries ', 120, 'product-4.jpg', 1),
(48, 4, 28, 'Masoor Dal (Red Lentil) ', 'Rich in protein, quick to cook red lentils for tasty curries ', 110, 'masoordal.png', 1),
(49, 4, 25, 'Toor Dal (Pigeon Pea) ', 'Premium quality toor dal for everyday Indian cooking ', 120, 'toordal-removebg-preview.png', 1),
(50, 4, 29, 'Basmati Rice ', 'Aromatic long-grain basmati rice for biryani ', 120, 'basmatirice.png', 1),
(51, 4, 35, 'Mustard Oil ', 'Pure mustard oil with strong aroma, ideal for Indian recipes ', 170, 'mustardoil-removebg-preview.png', 1),
(52, 4, 31, 'Wheat Flour (Atta) ', 'Freshly milled whole wheat flour for soft chapatis ', 55, 'wheatflour-removebg-preview.png', 1),
(53, 3, 46, 'Instant Noodles ', 'Quick and delicious instant noodles ready in 2 minutes ', 50, 'instantnoodle-removebg-preview.png', 1),
(54, 3, 48, 'Namkeen (Mixture/Sev) ', 'Spicy and crunchy namkeen mixture, a perfect evening snack ', 70, 'namkeen-removebg-preview.png', 1),
(57, 6, 17, 'Zucchini ', 'Fresh farm zucchini ', 30, 'product-5.jpg', 1),
(59, 7, 45, 'Potato Chips ', 'Crispy and tasty potato chips for anytime snacking ', 20, 'potatochips-removebg-preview.png', 1),
(60, 7, 46, 'Instant Noodles ', 'Quick and delicious instant noodles ready in 2 minutes ', 50, 'instantnoodle-removebg-preview.png', 1),
(62, 1, 17, 'Zucchini ', 'Fresh farm zucchini ', 30, 'product-5.jpg', 1),
(64, 1, 33, 'Desi Ghee ', 'Pure cow ghee with rich aroma, perfect for cooking ', 550, 'desighee-removebg-preview.png', 1),
(66, 11, 16, 'Strawberry ', 'Fresh and sweet strawberries ', 120, 'product-4.jpg', 1),
(69, 11, 37, 'Turmeric Powder ', 'Natural turmeric powder with strong aroma and color ', 90, 'turmericpowder-removebg-preview.png', 1),
(70, 11, 37, 'Turmeric Powder ', 'Natural turmeric powder with strong aroma and color ', 90, 'turmericpowder-removebg-preview.png', 1),
(71, 11, 45, 'Potato Chips ', 'Crispy and tasty potato chips for anytime snacking ', 20, 'potatochips-removebg-preview.png', 1),
(72, 1, 42, 'Cashews ', 'Whole cashew nuts, perfect for snacking and cooking ', 900, 'cashews-removebg-preview.png', 1),
(75, 1, 22, 'Maize (Corn) ', 'Fresh yellow maize, ideal for flour, soups, and snack ', 50, 'maize-removebg-preview.png', 1),
(76, 1, 16, 'Strawberry ', 'Fresh and sweet strawberries ', 120, 'product-4.jpg', 1),
(77, 1, 17, 'Zucchini ', 'Fresh farm zucchini ', 30, 'product-5.jpg', 1),
(79, 15, 14, 'Fresh Pineapples ', 'Juicy and sweet pineapple ', 70, 'product-2.jpg', 1),
(81, 1, 21, 'Wheat', 'High-quality whole wheat grains for everyday use', 45, 'wheat.png', 1),
(82, 1, 15, 'Chili Pepper', 'Fresh and spicy green and red chilies', 40, 'product-3.jpg', 1),
(85, 1, 13, 'Fresh Tomatoes', 'Fresh red tomatoes from farm', 50, 'product-1.jpg', 1),
(86, 1, 14, 'Fresh Pineapples ', 'Juicy and sweet pineapple ', 70, 'product-2.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_master`
--

CREATE TABLE `product_master` (
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `pdesc` varchar(1500) NOT NULL,
  `qty` int(11) NOT NULL,
  `rate` double NOT NULL,
  `pdate` date NOT NULL,
  `photo` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_master`
--

INSERT INTO `product_master` (`pid`, `cid`, `pname`, `pdesc`, `qty`, `rate`, `pdate`, `photo`, `status`) VALUES
(13, 5, 'Fresh Tomatoes', 'Fresh red tomatoes from farm', 100, 50, '2025-08-29', 'product-1.jpg', 0),
(14, 5, 'Fresh Pineapples', 'Juicy and sweet pineapple', 60, 70, '2025-08-29', 'product-2.jpg', 0),
(15, 5, 'Chili Pepper', 'Fresh and spicy green and red chilies', 100, 40, '2025-08-29', 'product-3.jpg', 0),
(16, 5, 'Strawberry', 'Fresh and sweet strawberries', 70, 120, '2025-08-29', 'product-4.jpg', 0),
(17, 5, 'Zucchini', 'Fresh farm zucchini', 40, 30, '2025-08-29', 'product-5.jpg', 0),
(18, 5, 'Cherry Tomatoes', 'Sweet small cherry tomatoes', 45, 90, '2025-08-29', 'product-6.jpg', 0),
(19, 5, 'Potatoes', 'Fresh and tasty potatoes', 150, 60, '2025-08-29', 'product-7.jpg', 0),
(20, 5, 'Banana', 'Fresh ripe bananas', 300, 20, '2025-08-29', 'product-8.jpg', 0),
(21, 7, 'Wheat', 'High-quality whole wheat grains for everyday use', 100, 45, '2025-09-02', 'wheat.png', 0),
(22, 7, 'Maize (Corn)', 'Fresh yellow maize, ideal for flour, soups, and snack', 80, 50, '2025-09-02', 'maize-removebg-preview.png', 0),
(23, 7, 'Barley', 'Nutritious barley grains, perfect for soups and porridge', 60, 60, '2025-09-02', 'barley-seeds-1000x1000.jpg', 0),
(24, 7, 'Oats', 'Rolled oats for a healthy and wholesome breakfast', 70, 150, '2025-09-02', 'oats-removebg-preview.png', 0),
(25, 8, 'Toor Dal (Pigeon Pea)', 'Premium quality toor dal for everyday Indian cooking', 90, 120, '2025-09-02', 'toordal-removebg-preview.png', 0),
(26, 8, 'Moong Dal (Green Gram)', 'Protein-rich moong dal, easy to cook and digest', 85, 130, '2025-09-02', 'moongdal-removebg-preview.png', 0),
(27, 8, 'Chana Dal (Bengal Gram)', 'Fresh and clean chana dal, perfect for dals and snacks', 75, 95, '2025-09-02', 'chanadal.png', 0),
(28, 8, 'Masoor Dal (Red Lentil)', 'Rich in protein, quick to cook red lentils for tasty curries', 70, 110, '2025-09-02', 'masoordal.png', 0),
(29, 9, 'Basmati Rice', 'Aromatic long-grain basmati rice for biryani & pulao', 100, 120, '2025-09-02', 'basmatirice.png', 0),
(30, 9, 'Brown Rice', 'Healthy and fiber-rich brown rice for daily meals', 60, 140, '2025-09-02', 'brownrice-removebg-preview.png', 0),
(31, 9, 'Wheat Flour (Atta)', 'Freshly milled whole wheat flour for soft chapatis', 120, 55, '2025-09-02', 'wheatflour-removebg-preview.png', 0),
(32, 9, 'Rice Flour', 'Fine rice flour for idiyappam, snacks, and sweets', 50, 65, '2025-09-02', 'riceflour-removebg-preview.png', 0),
(33, 10, 'Desi Ghee', 'Pure cow ghee with rich aroma, perfect for cooking & sweets', 40, 550, '2025-09-02', 'desighee-removebg-preview.png', 0),
(34, 10, 'Sunflower Oil', 'Light and healthy sunflower oil for everyday cooking', 80, 160, '2025-09-02', 'sunfloweroil-removebg-preview.png', 0),
(35, 10, 'Mustard Oil', 'Pure mustard oil with strong aroma, ideal for Indian recipes', 60, 170, '2025-09-02', 'mustardoil-removebg-preview.png', 0),
(36, 10, 'Groundnut Oil', 'Traditional cold-pressed groundnut oil for cooking and frying', 70, 165, '2025-09-02', 'groundnutoil-removebg-preview.png', 0),
(37, 11, 'Turmeric Powder', 'Natural turmeric powder with strong aroma and color', 60, 90, '2025-09-02', 'turmericpowder-removebg-preview.png', 0),
(38, 11, 'Red Chili Powder', 'Pure and spicy red chili powder for curries and pickles', 70, 110, '2025-09-02', 'redchilipowder-removebg-preview.png', 0),
(39, 11, 'Black Pepper', 'Strong and aromatic whole black pepper for seasoning.', 50, 450, '2025-09-02', 'blackpepper-removebg-preview.png', 0),
(40, 11, 'Coriander Powder', 'Fresh ground coriander powder for everyday Indian dishes', 65, 100, '2025-09-02', 'corianderpowder-removebg-preview.png', 0),
(41, 12, 'Almonds', 'Premium quality crunchy almonds, rich in nutrients', 40, 850, '2025-09-02', 'almonds-removebg-preview.png', 0),
(42, 12, 'Cashews', 'Whole cashew nuts, perfect for snacking and cooking', 35, 900, '2025-09-02', 'cashews-removebg-preview.png', 0),
(43, 12, 'Walnuts', 'Fresh walnut kernels rich in omega-3 and antioxidant', 30, 1000, '2025-09-02', 'walnuts-removebg-preview.png', 0),
(44, 12, 'Raisins', 'Sweet golden raisins, great for desserts and snacking', 50, 300, '2025-09-02', 'raisins-removebg-preview.png', 0),
(45, 13, 'Potato Chips', 'Crispy and tasty potato chips for anytime snacking', 200, 20, '2025-09-02', 'potatochips-removebg-preview.png', 0),
(46, 13, 'Instant Noodles', 'Quick and delicious instant noodles ready in 2 minutes', 150, 50, '2025-09-02', 'instantnoodle-removebg-preview.png', 0),
(47, 13, 'Biscuits', 'Crunchy and tasty biscuits, perfect with tea', 180, 30, '2025-09-02', 'biscuits-removebg-preview.png', 0),
(48, 13, 'Namkeen (Mixture/Sev)', 'Spicy and crunchy namkeen mixture, a perfect evening snack', 100, 70, '2025-09-02', 'namkeen-removebg-preview.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `register_master`
--

CREATE TABLE `register_master` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` double NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register_master`
--

INSERT INTO `register_master` (`id`, `fullname`, `email`, `phone`, `password`, `gender`, `status`) VALUES
(1, 'Madhav Garibnawaz', 'sanjaygaribnavaz123@gmail.com', 9978075828, '1234', 'male', 0),
(2, 'Sanjay Garibnawaz', 'sanjaygaribnavaz123@gmail.com', 9978075828, '1234', 'male', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `uid` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` bigint(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`uid`, `uname`, `address`, `email`, `password`, `mobile`, `status`) VALUES
(1, 'Raj Patel', '', 'raj@gmail.com', '12345', 9876543210, 0),
(2, 'Kishan Sharma', '', 'kishan@gmail.com', '1234', 9123456789, 0),
(3, 'Krish patel', '', 'krish@gmail.com', '12345', 9988776655, 0),
(4, 'Jiya Shah', '', 'jiya@gmail.com', '1234', 9654321870, 0),
(5, 'Meet Patel', '', 'meet@gmail.com', '12345', 9765432109, 0),
(6, 'Madhav Garibnawaz', '', 'madhav@gmail.com', '12345', 9978075828, 0),
(7, 'Harry Pandya', '', 'harry@gmail.com', '12345', 9812345678, 0),
(8, 'Priya Sharma', '', 'priya@gmail.com', '1234', 9743844945, 0),
(9, 'Abhay Mishra', '', 'abhay@gmail.com', '123456', 8527167662, 0),
(10, 'Jinal Patel', '', 'jinalp@gmail.com', '12345', 8775345849, 0),
(11, 'Jaydeep Tailor', '', 'j@gmail.com', '12345', 7895347589, 0),
(12, 'Vanshika', '', 'vanshikamatawala1312@gmail.com', '123', 8160234437, 0),
(13, 'Yash Jariwala', '', 'yjyash795@gmail.com', 'Yash7953', 9924282678, 0),
(14, 'Nishchay ', '', 'nish@gmail.com', '12345678', 1234567890, 0),
(15, 'Twinkle Kachiwala', '', 'tw@gmail.com', '1234', 1234567890, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_master`
--
ALTER TABLE `admin_master`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `category_master`
--
ALTER TABLE `category_master`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `login_master`
--
ALTER TABLE `login_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_master`
--
ALTER TABLE `order_master`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `product_master`
--
ALTER TABLE `product_master`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `register_master`
--
ALTER TABLE `register_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_master`
--
ALTER TABLE `admin_master`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category_master`
--
ALTER TABLE `category_master`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `login_master`
--
ALTER TABLE `login_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_master`
--
ALTER TABLE `order_master`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `product_master`
--
ALTER TABLE `product_master`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `register_master`
--
ALTER TABLE `register_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_master`
--
ALTER TABLE `order_master`
  ADD CONSTRAINT `order_master_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user_master` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_master_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `product_master` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_master`
--
ALTER TABLE `product_master`
  ADD CONSTRAINT `product_master_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `category_master` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
