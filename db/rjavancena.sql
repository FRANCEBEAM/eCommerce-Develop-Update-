-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2022 at 11:38 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rjavancena`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `product` varchar(50) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `image_file` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `serialnumber` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `email`, `product`, `supplier`, `price`, `image_file`, `image_path`, `qty`, `total_price`, `serialnumber`) VALUES
(623, 'beefsassy2.8@gmail.com', ' Power Sprayer Hose', ' Bult Tough ', ' 310.00 ', ' STON00000002.webp ', ' /pages/uploads/STON/STO2.webp ', 3, '310', '  STON00000002  '),
(625, 'beefsassy2.8@gmail.com', ' Boysen', ' Acrytex ', ' 150.00 ', ' NETH00000003.webp ', ' /pages/uploads/NETH/NET3.webp ', 5, '150', '  NETH00000003  '),
(626, 'beefsassy2.8@gmail.com', ' Mitsushi 220V Electric Jigsaw', ' Mitsushi ', ' 699.00 ', ' IRON00000001.webp ', ' /pages/uploads/IRON/IRO1.webp ', 1, '699', '  IRON00000001  ');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(20) NOT NULL,
  `prefix` varchar(10) NOT NULL,
  `snum` varchar(50) NOT NULL,
  `serialnumber` varchar(50) NOT NULL,
  `product` varchar(200) NOT NULL,
  `descriptions` mediumtext NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `reorder` int(10) NOT NULL,
  `category` varchar(50) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `image_file` varchar(50) NOT NULL,
  `image_path` varchar(150) NOT NULL,
  `added_by` varchar(150) NOT NULL,
  `date` date DEFAULT curdate(),
  `time` time DEFAULT curtime()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `prefix`, `snum`, `serialnumber`, `product`, `descriptions`, `quantity`, `price`, `reorder`, `category`, `supplier`, `image_file`, `image_path`, `added_by`, `date`, `time`) VALUES
(1, 'STON', '00000001', 'STON00000001', 'Welder Mask AHM009', 'specializes in tools and home improvement category which specializes in hardware and powertools. TFM aims to provide authentic and affordable powertools and handtools for the Filipinos giving them a sense of trust in buying online. We at TFM is proudly managed by an award winning general merchandise lazada awards 2020 winner therefore in TFM, we guarantee everyday low price and we guarantee 100% customer satisfaction. \nThese are the main brands that we offer: Powerhouse, Lotus, Ingco, Yamaweld, Mars Tools and Shimaru.', 5, '980.00', 100, 'Stones', 'Ingco', 'STON00000001.webp', '/pages/uploads/STON/STO1.webp', 'Jed', '2022-08-17', '12:44:29'),
(2, 'STON', '00000002', 'STON00000002', 'Power Sprayer Hose', 'specializes in tools and home improvement category which specializes in hardware and powertools. TFM aims to provide authentic and affordable powertools and handtools for the Filipinos giving them a sense of trust in buying online. We at TFM is proudly managed by an award winning general merchandise lazada awards 2020 winner therefore in TFM, we guarantee everyday low price and we guarantee 100% customer satisfaction. \nThese are the main brands that we offer: Powerhouse, Lotus, Ingco, Yamaweld, Mars Tools and Shimaru.', 5, '310.00', 95, 'Stones', 'Bult Tough', 'STON00000002.webp', '/pages/uploads/STON/STO2.webp', 'Jed', '2022-08-17', '12:45:15'),
(3, 'STON', '00000003', 'STON00000003', 'Paint Brush', 'is usually made by clamping bristles to a handle with a ferrule. They are available in various sizes, shapes, and materials. Thicker ones are used for filling in, and thinner ones are used for details.\n', 100, '30.00', 75, 'Stones', 'Pan Club', 'STON00000003.webp', '/pages/uploads/STON/STO3.webp', 'Jed', '2022-08-17', '12:45:46'),
(4, 'DIAM', '00000001', 'DIAM00000001', 'Electric Impact Drill 26V', 'Cordless Hand Drill Power Tools Hammer Drill Driver Double-Speed Rechargeable Drill Lithium Battery Original Electric Drill Screwdriver with LED Light', 10, '4139.00', 50, 'Diamonds', 'MAKITA', 'DIAM00000001.webp', '/pages/uploads/DIAM/DIAM1.webp', 'Jed', '2022-08-17', '12:46:51'),
(5, 'DIAM', '00000002', 'DIAM00000002', 'Davies Sun & Rain', 'Davies Sun & Rain Odourless Elastomeric Waterproofing Paint SR-100 WhiteDavies Paints, a leading premium paint brand in the Philippines preferred by industry professionals, contractors, and consumers.', 50, '95.00', 40, 'Diamonds', 'Davies', 'DIAM00000002.webp', '/pages/uploads/DIAM/DIAM2.webp', 'Jed', '2022-08-17', '12:47:16'),
(6, 'DIAM', '00000003', 'DIAM00000003', 'Professional Repair Tool box', 'Original Professional Repair Tool box organizer for hummer tools metal steel cabinet motorcycle Set Home Hardware accessories Hand ToolBox Case mechanic car kit Portable Repairing With Carry power driling drive all flies pocket pjregico sale. Operator control is superior, and greater accuracy is possible because the sawed line is not obscured by the fuzz of undetached wood fibers or sawdust.', 50, '199.00', 25, 'Diamonds', 'Top Mall', 'DIAM00000003.webp', '/pages/uploads/DIAM/DIAM3.webp', 'Jed', '2022-08-17', '12:47:49'),
(7, 'IRON', '00000001', 'IRON00000001', 'Mitsushi 220V Electric Jigsaw', 'Brand Name: Mitsushi\nModel: MQXJU55\nRated Power: 650W\nRated Voltage: 220V Rated Prequency: 50/60Hz\nNo. Load Speed: 0-3000r/min\nJigsaw are ideal cutting curves and complex shapes in wood,metal,fiber glass,drywall etc.', 25, '699.00', 25, 'Irons', 'Mitsushi', 'IRON00000001.webp', '/pages/uploads/IRON/IRO1.webp', 'Jed', '2022-08-17', '12:48:52'),
(8, 'IRON', '00000002', 'IRON00000002', 'HHAS15400 Hand Saw Wood', 'The familiar modern handsaw, with its thin but wide steel blade, cuts on the push stroke; this permits down hand sawing on wood lay across the knee or on a stool, and the sawing pressure helps to hold the wood still.', 25, '190.00', 20, 'Irons', 'Ingco', 'IRON00000002.webp', '/pages/uploads/IRON/IRO2.webp', 'Jed', '2022-08-17', '12:49:43'),
(9, 'IRON', '00000003', 'IRON00000003', 'Measuring Tape', 'The specialists for determining short distances. Measuring blades with a curved steel blade, compact plastic housing and an integrated spring mechanism to automatically retract the blade.', 25, '120.00', 10, 'Irons', 'Stabila', 'IRON00000003.webp', '/pages/uploads/IRON/IRO3.webp', 'Jed', '2022-08-17', '12:50:25'),
(10, 'NETH', '00000001', 'NETH00000001', 'GKS Circular Saw', 'Established in the year 2013 at Pune , (Maharashtra, India), we \"Toolsmatic” is a Proprietorship firm, engaged as the foremost Authorised Wholesale Dealer wide range of Cordless Products, Rotary Hammer, Diamond Drilling, etc. Our products are high in demand due to their premium quality and affordable prices. Under the direction of our mentor “Abbas Attarwala (Proprietor)”, we have been able to achieve a reputed name in the industry.', 150, '150.00', 150, 'Netherite', 'Netherite Solutions', 'NETH00000001.webp', '/pages/uploads/NETH/NET1.webp', 'Jed', '2022-08-17', '12:51:58'),
(11, 'NETH', '00000002', 'NETH00000002', 'Screw Drivers', 'A typical simple screwdriver has a handle and a shaft, ending in a tip the user puts into the screw head before turning the handle. This form of the screwdriver has been replaced in many workplaces and homes with a more modern and versatile tool, a power drill, as they are quicker, easier, and also can drill holes. The shaft is usually made of tough steel to resist bending or twisting', 150, '150.00', 140, 'Netherite', 'Milikans', 'NETH00000002.webp', '/pages/uploads/NETH/NET2.webp', 'Jed', '2022-08-17', '12:52:18'),
(12, 'NETH', '00000003', 'NETH00000003', 'Boysen', 'BOYSEN® Permacoat™ Latex is a 100% acrylic paint with excellent hiding and outstanding durability. PRINCIPAL USES: It is ideal for interior and exterior surfaces such as concrete, bricks, plaster, and drywalls. FINISH: Flat, Semi-Gloss and Gloss.', 150, '150.00', 100, 'Netherite', 'Acrytex', 'NETH00000003.webp', '/pages/uploads/NETH/NET3.webp', 'Jed', '2022-08-17', '12:52:35');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(255) NOT NULL,
  `paymentmode` varchar(50) NOT NULL,
  `products` varchar(255) NOT NULL,
  `amountpaid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `fullname`, `email`, `phone`, `address`, `paymentmode`, `products`, `amountpaid`) VALUES
(50, 'joe sassy', 'beefsassy2.8@gmail.com', '09354817635', 'BLK 132', 'Cash On Delivery', ' Stone Pickaxe(50),  Stone Shovel(50)', '10000'),
(51, 'joe sassy', 'beefsassy2.8@gmail.com', '09354817635', 'blk 132', 'Cash On Delivery', ' Stone Pickaxe(55),  Stone Axe(52),  Iron Axe(51)', '11975'),
(52, 'joe sassy', 'beefsassy2.8@gmail.com', '09354817635', 'blk 132', 'Cash On Delivery', ' Stone Pickaxe(53)', '5300'),
(53, 'dwada wdadw', 'beefsassy2.8@gmail.com', '0987654321', 'BLK 132 lOT9', 'Cash On Delivery', ' Stone Shovel(2),  Diamond Axe(6),  Stone Axe(1),  Stone Pickaxe(3)', '900'),
(54, 'dwada wdadw', 'beefsassy2.8@gmail.com', '0987654321', 'BLK 132 LOT 9', 'Cash On Delivery', ' Iron Axe(1),  Diamond Axe(1),  Diamond Shovel(1)', '125'),
(55, 'Joe Sassy', 'beefsassy2.8@gmail.com', '09354817635', 'BLK 132 LOT 9 Phase 4', 'Cash On Delivery', ' Power Sprayer Hose(1),  Mitsushi 220V Electric Jigsaw(1)', '1009');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `birthdate` varchar(50) DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `password` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `verification_code` text NOT NULL,
  `email_verified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `phone`, `address`, `birthdate`, `gender`, `password`, `image`, `verification_code`, `email_verified_at`) VALUES
(50, 'softwareversion', 'franks', 'Doe', 'softwareversion2.8@gmail.com', '098765432', 'San Jose Bulacan BLK 22', '05/28/2000', 'Female', '$2y$10$dd.hzLSVDsvpiCubq6fBZu8xyhVYjr2F98ChFMGiOYmuNJtQKuPfG', '19-192368_steve-transparent-minecraft-backround-png-royalty-free-alabama.png', '555979', '2022-09-27 00:43:55'),
(107, 'beef', 'Joe', 'Sassy', 'beefsassy2.8@gmail.com', '09354817635', 'BLK 132 LOT 9 Phase 4', '05/28/2000', 'Male', '$2y$10$jZ90iP5fSL4/Vm8lXGotUugAX/tnI6w16sOhG5KcqSacBRtq0AGjO', NULL, '184377', '2022-11-05 21:22:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `serialnumber_2` (`serialnumber`) USING BTREE,
  ADD KEY `serialnumber` (`serialnumber`) USING BTREE;

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=627;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
