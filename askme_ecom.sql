-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2021 at 01:05 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `askme_ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `as_categories`
--

CREATE TABLE `as_categories` (
  `id` bigint(20) NOT NULL,
  `category_name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `as_categories`
--

INSERT INTO `as_categories` (`id`, `category_name`, `category_url`) VALUES
(1, 'Fruits and Vegitable', 'PNG-3-300x300.png'),
(2, 'Meat', 'meat.png'),
(3, 'Nadan Fish', 'fish.png'),
(4, 'Homely & Handmade Products', 'Homely.png');

-- --------------------------------------------------------

--
-- Table structure for table `as_products`
--

CREATE TABLE `as_products` (
  `id` bigint(20) NOT NULL,
  `product_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `image_url` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `actual_price` float NOT NULL,
  `offer_price` float NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` bigint(10) NOT NULL,
  `product_status` int(1) NOT NULL DEFAULT 1 COMMENT '1= Active, 0= Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `as_products`
--

INSERT INTO `as_products` (`id`, `product_name`, `category_id`, `image_url`, `actual_price`, `offer_price`, `description`, `quantity`, `product_status`) VALUES
(1, 'Kerala Pearl Spot ( നാടൻ കരിമീ', 3, 'karimeen_nadan_(single)_2.png', 520, 600, 'Karimeen or Pearl spot fish is found very common in Kerala backwaters. All through Kerala, you will get this dish but with varying flavour.. The taste and preparation changes slightly as we go from one end of Kerala to the other! . This caught traditional catchers from the backwaters in the suburbs of Chambakkara and received on a daily basis as half live condition', 10, 1),
(2, 'Quail (kada Kozhi) ( കാട കോഴി ', 2, 'online__fish_kochi_kerala_quail_meat_chicken.jpg', 300, 330, 'A delicate yet delectable little bird, quail offers a more flavorful meat than other members of the bird family. Think of it like a miniature chicken with extra richness and moistness in every bite. online delivery for quail meat is in the form of whole skinless meat .', 8, 1),
(3, 'King Fish (Extra Large) (10 kg', 3, 'neymeen_2.png', 570, 650, 'Kingfish are ocean fish that are related to the Spanish mackerel. In the United States, king fish are fished off the coasts of California and in the Gulf of Mexico. Like other large, slightly oily fish, king fish can be grilled, broiled or poached with satisfying results. The thick steaks stand up well to high heat as well as simmering. Most preferred and tasty fish', 8, 1),
(4, 'Barramundi ( കായൽ കാളാഞ്ചി )', 3, 'Kalanji.png', 425, 530, 'The barramundi or Asian sea bass (Lates calcarifer) is a species of catadromous fish in family Latidae of order Perciformes. The species is widely distributed in the Indo-West Pacific region from Southeast Asia to Papua New Guinea and Northern Australia. Known in Thai language as pla kapong it is very popular in Thai cuisine.', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `as_user`
--

CREATE TABLE `as_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'U' COMMENT 'U= User, A= Admin, V= Vendor',
  `user_status` int(1) NOT NULL DEFAULT 1 COMMENT '1= Active, 0= Inactive',
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `as_categories`
--
ALTER TABLE `as_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `as_products`
--
ALTER TABLE `as_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_name` (`product_name`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `as_user`
--
ALTER TABLE `as_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `as_categories`
--
ALTER TABLE `as_categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `as_products`
--
ALTER TABLE `as_products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `as_user`
--
ALTER TABLE `as_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `as_products`
--
ALTER TABLE `as_products`
  ADD CONSTRAINT `as_products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `as_categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
