-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2021 at 10:08 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `as_address`
--

CREATE TABLE `as_address` (
  `ad_id` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ad_title` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `line_1` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `line_2` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `line_3` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin` int(10) NOT NULL,
  `district` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number_1` int(15) NOT NULL,
  `contact_number_2` int(15) NOT NULL,
  `ad_status` int(1) NOT NULL DEFAULT 1 COMMENT '1= Active, 0= Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `as_address`
--

INSERT INTO `as_address` (`ad_id`, `user_id`, `ad_title`, `line_1`, `line_2`, `line_3`, `post`, `pin`, `district`, `state`, `contact_number_1`, `contact_number_2`, `ad_status`) VALUES
(1, 11, 'Home', 'House number 2', 'Street 1', '', 'Post 2', 685454, 'Kollam', 'Kerala', 2147483647, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `as_categories`
--

CREATE TABLE `as_categories` (
  `c_id` bigint(20) NOT NULL,
  `category_name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_status` int(3) NOT NULL DEFAULT 1 COMMENT '1 = Active, 0 = Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `as_categories`
--

INSERT INTO `as_categories` (`c_id`, `category_name`, `category_url`, `c_status`) VALUES
(3, 'Nadan Fish', 'fish.png', 1),
(4, 'Homely & Handmade Products', 'Homely.png', 1),
(5, 'Used Products', 'PNG-7-300x300.png', 1),
(6, 'Fruits and Vegitables', 'PNG-3-300x3002.png', 1),
(8, 'Egg', 'PNG_10.png', 1),
(9, 'Fresh Meat', 'PNG_4.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `as_orders`
--

CREATE TABLE `as_orders` (
  `or_id` bigint(20) NOT NULL,
  `address_id` bigint(20) NOT NULL,
  `total_amount` float NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `as_order_detail`
--

CREATE TABLE `as_order_detail` (
  `or_detail_id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `quantity` bigint(10) NOT NULL,
  `individual_price` float NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `as_order_status`
--

CREATE TABLE `as_order_status` (
  `ors_id` bigint(20) NOT NULL,
  `status_name` varchar(20) NOT NULL,
  `default_status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `as_order_status`
--

INSERT INTO `as_order_status` (`ors_id`, `status_name`, `default_status`) VALUES
(1, 'Placed', 1);

-- --------------------------------------------------------

--
-- Table structure for table `as_products`
--

CREATE TABLE `as_products` (
  `p_id` bigint(20) NOT NULL,
  `master_product_id` bigint(20) NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `actual_price` float NOT NULL,
  `offer_price` float NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` bigint(10) NOT NULL,
  `product_status` int(1) NOT NULL DEFAULT 1 COMMENT '1= Active, 0= Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `as_products`
--

INSERT INTO `as_products` (`p_id`, `master_product_id`, `vendor_id`, `actual_price`, `offer_price`, `description`, `quantity`, `product_status`) VALUES
(1, 1, 3, 204, 254, 'The green chromide is a species of cichlid fish that is native to fresh and brackish water habitats in some parts in India such as Kerala, Goa, Chilika Lake in Odisha and Sri Lanka. The species was first described by Marcus Elieser Bloch in 1790', 10, 1),
(3, 1, 12, 175, 320, 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Let', 54, 1);

-- --------------------------------------------------------

--
-- Table structure for table `as_product_images`
--

CREATE TABLE `as_product_images` (
  `id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `image_url` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `as_product_images`
--

INSERT INTO `as_product_images` (`id`, `product_id`, `image_url`) VALUES
(1, 1, 'Karimeen.jpg'),
(2, 1, 'Karimeen_1.jpg'),
(4, 1, 'Karimeen_EPS1234.jpg'),
(9, 3, 'Karimeen.jpg'),
(10, 3, 'Karimeen_1.jpg'),
(11, 3, 'Karimeen_2.jpg'),
(12, 3, 'Karimeen_89.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `as_product_master`
--

CREATE TABLE `as_product_master` (
  `id` bigint(20) NOT NULL,
  `product_name` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `as_product_master`
--

INSERT INTO `as_product_master` (`id`, `product_name`, `category_id`) VALUES
(1, 'കരിമീൻ ', 3),
(2, 'Laptop', 5);

-- --------------------------------------------------------

--
-- Table structure for table `as_user`
--

CREATE TABLE `as_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'U' COMMENT 'U= User, A= Admin, V= Vendor',
  `user_status` int(1) NOT NULL DEFAULT 1 COMMENT '1= Active, 0= Inactive',
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `as_user`
--

INSERT INTO `as_user` (`user_id`, `name`, `email`, `password`, `user_type`, `user_status`, `created_date`, `updated_date`) VALUES
(2, 'Ajay Raveendran', 'ajay.r@gmail.com', '$2y$10$dsqrWGuL9ZSG1DPNpS1QXu6PeJ3Y6zLBu1v8wOMwtbCiNuYZuDB7K', 'U', 1, '2021-05-16 00:00:00', '2021-05-16 00:00:00'),
(3, 'Akhil', 'akhil@gmail.com', '$2y$10$Ot65qYj0W5knWYc5QOnnFOz8MJTJjDTmCu2N3NxXyDUqx1gyMz9jK', 'V', 1, '2021-05-16 00:00:00', '2021-05-16 00:00:00'),
(6, 'Ajay', 'ajay@gmail.com', '$2y$10$ltiub9LL0huIKywgsKXp3eNzIau0zq9AlzoLXQPyLm8EXf0ShVwmO', 'V', 0, '2021-05-16 00:00:00', '2021-05-16 00:00:00'),
(10, 'Ajay', 'admin@gmail.com', '$2y$10$Ot65qYj0W5knWYc5QOnnFOz8MJTJjDTmCu2N3NxXyDUqx1gyMz9jK', 'A', 1, '2021-05-16 00:00:00', '2021-05-16 00:00:00'),
(11, 'Ajay R', 'ar@gmail.com', '$2y$10$URobmd53d75OXbVjqQ4ftuFHrVMJpO1YCcdPdOhX2GLMHeaoiL9vi', 'U', 1, '2021-05-16 00:00:00', '2021-05-19 02:05:32'),
(12, 'Arun', 'arun@gmail.com', '$2y$10$RGCE6YW6F1D7xHn2K2oDReuVZ73WTGucsiT8eeFDavJCHMQqqBsPu', 'V', 1, '2021-05-17 00:00:00', '2021-05-17 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `as_address`
--
ALTER TABLE `as_address`
  ADD PRIMARY KEY (`ad_id`),
  ADD UNIQUE KEY `ad_id` (`ad_id`),
  ADD KEY `user_in_address` (`user_id`);

--
-- Indexes for table `as_categories`
--
ALTER TABLE `as_categories`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `as_orders`
--
ALTER TABLE `as_orders`
  ADD PRIMARY KEY (`or_id`),
  ADD KEY `address_to_order` (`address_id`),
  ADD KEY `user_id_to_orders` (`user_id`),
  ADD KEY `status_to_order` (`status_id`);

--
-- Indexes for table `as_order_detail`
--
ALTER TABLE `as_order_detail`
  ADD PRIMARY KEY (`or_detail_id`),
  ADD UNIQUE KEY `or_detail_id` (`or_detail_id`),
  ADD KEY `order_in_detail` (`order_id`),
  ADD KEY `product_in_order` (`product_id`);

--
-- Indexes for table `as_order_status`
--
ALTER TABLE `as_order_status`
  ADD PRIMARY KEY (`ors_id`);

--
-- Indexes for table `as_products`
--
ALTER TABLE `as_products`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `master_product` (`master_product_id`),
  ADD KEY `vendor_id_in_products` (`vendor_id`);

--
-- Indexes for table `as_product_images`
--
ALTER TABLE `as_product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `as_product_master`
--
ALTER TABLE `as_product_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_to_product` (`category_id`);

--
-- Indexes for table `as_user`
--
ALTER TABLE `as_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `as_address`
--
ALTER TABLE `as_address`
  MODIFY `ad_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `as_categories`
--
ALTER TABLE `as_categories`
  MODIFY `c_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `as_orders`
--
ALTER TABLE `as_orders`
  MODIFY `or_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `as_order_detail`
--
ALTER TABLE `as_order_detail`
  MODIFY `or_detail_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `as_order_status`
--
ALTER TABLE `as_order_status`
  MODIFY `ors_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `as_products`
--
ALTER TABLE `as_products`
  MODIFY `p_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `as_product_images`
--
ALTER TABLE `as_product_images`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `as_product_master`
--
ALTER TABLE `as_product_master`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `as_user`
--
ALTER TABLE `as_user`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `as_address`
--
ALTER TABLE `as_address`
  ADD CONSTRAINT `user_in_address` FOREIGN KEY (`user_id`) REFERENCES `as_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `as_orders`
--
ALTER TABLE `as_orders`
  ADD CONSTRAINT `address_to_order` FOREIGN KEY (`address_id`) REFERENCES `as_address` (`ad_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `status_to_order` FOREIGN KEY (`status_id`) REFERENCES `as_order_status` (`ors_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_to_orders` FOREIGN KEY (`user_id`) REFERENCES `as_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `as_order_detail`
--
ALTER TABLE `as_order_detail`
  ADD CONSTRAINT `order_in_detail` FOREIGN KEY (`order_id`) REFERENCES `as_orders` (`or_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_in_order` FOREIGN KEY (`product_id`) REFERENCES `as_products` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `as_products`
--
ALTER TABLE `as_products`
  ADD CONSTRAINT `master_product` FOREIGN KEY (`master_product_id`) REFERENCES `as_product_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vendor_id_in_products` FOREIGN KEY (`vendor_id`) REFERENCES `as_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `as_product_images`
--
ALTER TABLE `as_product_images`
  ADD CONSTRAINT `as_product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `as_products` (`p_id`);

--
-- Constraints for table `as_product_master`
--
ALTER TABLE `as_product_master`
  ADD CONSTRAINT `category_to_product` FOREIGN KEY (`category_id`) REFERENCES `as_categories` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
