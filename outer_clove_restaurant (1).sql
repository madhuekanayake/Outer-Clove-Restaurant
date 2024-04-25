-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2024 at 08:57 AM
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
-- Database: `outer clove restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_register`
--

CREATE TABLE `customer_register` (
  `register_id` int(10) NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `last_name` varchar(225) NOT NULL,
  `gender` varchar(225) NOT NULL,
  `contact_number` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_register`
--

INSERT INTO `customer_register` (`register_id`, `first_name`, `last_name`, `gender`, `contact_number`, `address`, `email`, `password`) VALUES
(4, 'Thilesha', 'Ekanayake', 'Female', '077-9896577', 'No 5 colombo', 'thilesha@gmail.com', '$2y$10$Ak0NgrxnfEIH3pLjzPdGNuyu.FpHy/lUCjdqrTmnQKpYAui2ICuni'),
(5, 'Chamod', 'Mullegama', 'Male', '077-2234556', 'No 26, Kandy', 'chamod@gmail.com', '$2y$10$ypzjRZu1Q79JtrhTimqPbOrAwBVcoPS8jCsJwGw5BM5iHTHkmLh/u'),
(6, 'Nisansala', 'Ekanayake', 'Female', '077-9896577', 'H 212/1 Ihala Mawela', 'nisansalaekanayake73@gmail.com', '$2y$10$3tzGgTjyVGOMVb6KdOOXNumFvFIX6NBxWZa3RQMVywPUIvo6l3sRi'),
(10, 'Nisansala', 'Ekanayake', 'Female', '077-9896577', 'H 212/1 Ihala Mawela', 'thilesha@gmail.com', '$2y$10$Mk.fpa6m2C/VI.Y07.oRLu.xiIZZUXwQBw0eLHVWdE6ByH7WZPmpO');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) NOT NULL,
  `gallery_image` varchar(225) NOT NULL,
  `gallery_discrition` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `gallery_image`, `gallery_discrition`) VALUES
(47, '../uploaded_img/WhatsApp Image 2023-12-17 at 14.51.29_005a1647.jpg', 'Welcome to the Horizon Club, a relaxing place where stunning views and delectable refreshments compliment the impeccable service on offer.'),
(49, '../uploaded_img/WhatsApp Image 2023-12-20 at 17.15.21_d8e5dbc7.jpg', 'Handcrafted works of chocolate art that will sweeten your festive season. Discover our enchanting festive goodies, where every treat in a chapter in a delightful holiday story.'),
(50, '../uploaded_img/WhatsApp Image 2023-12-20 at 17.18.08_93810df7.jpg', 'A feast for the senses and the palate. At Outer Clove palace our aesthetics meet with the sheer precision of flavors.'),
(51, '../uploaded_img/WhatsApp Image 2023-12-20 at 17.24.00_31deb3b8.jpg', 'Elevate your meetings with our hotel\'s modern facilities and top-notch service. Our customizable event spaces ensure a seamless and productive gathering for your team\'s needs.'),
(52, '../uploaded_img/WhatsApp Image 2023-12-20 at 17.27.15_a720080b.jpg', '\"Delight in a diverse array of culinary experiences with our restaurant\'s tempting meal offers. From chef\'s specials to fantastic discounts, relish every bite while enjoying exceptional value for your dining pleasure.'),
(53, '../uploaded_img/WhatsApp Image 2023-12-20 at 17.24.00_31deb3b8.jpg', 'Elevate your meetings with our hotel\'s modern facilities and top-notch service. Our customizable event spaces ensure a seamless and productive gathering for your team\'s needs.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `total_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `total_amount`) VALUES
(3, 'Nisansala Ekanayake', 'nisansalaekanayake73@gmail.com', '077 9896577', 'H 07, Mawela, Hingula', 1800.00),
(4, 'Thilesha Thilesha', 'thilesha@gmail.com', '077 7191688', 'No 7, Kandy', 2350.00),
(5, 'Madhusanka Thennakoon', 'madhusanka@gmail.com', '077 5021534', 'No 5, Kandy', 3600.00),
(6, 'Chamod Mullegama', 'chamod@gmail.com', '070 6369557', 'No 5, Kandy', 1550.00),
(7, 'Manel Jayawardhana', 'manel@gmail.com', '07607578852', 'No 212, Hingula', 4950.00),
(8, 'Thilesha', 'thilesha@gmail.com', '077 7191688', 'No5, Kandy', 1000.00),
(9, 'Nisansala ', 'nisansalaekanayake73@gmail.com', '077 9896577', 'No 7, Mawela, Hingula', 1800.00),
(10, 'Madhusanka Thennakoon', 'madhusanka@gmail.com', '077 5021534', 'No 7, Kandy', 1700.00),
(12, 'Nisansala ', 'nisansalaekanayake73@gmail.com', '077 9896577', 'No 5, Kandy', 1700.00),
(13, 'Nisansala ', 'nisansalaekanayake73@gmail.com', '077 9896577', 'H 212/ 1 Ihala Mawela', 2900.00);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_id` int(10) NOT NULL,
  `Product_name` varchar(225) NOT NULL,
  `Product_price` int(225) NOT NULL,
  `Product_category` varchar(225) NOT NULL,
  `Product_image` varchar(100) NOT NULL,
  `product_discrition` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_id`, `Product_name`, `Product_price`, `Product_category`, `Product_image`, `product_discrition`) VALUES
(34, 'PIZZA', 2000, 'Pizza', '../uploaded_img/product/WhatsApp Image 2023-12-17 at 21.45.26_3f979b67.jpg', 'Pizza is nothing but, just a state of happiness.'),
(37, 'CUP CAKE', 750, 'Desserts', '../uploaded_img/product/WhatsApp Image 2023-12-20 at 16.08.00_d0fccb36.jpg', 'A brownies a day keep frowning away.'),
(38, 'RICE', 1700, 'Rice', '../uploaded_img/product/WhatsApp Image 2023-12-20 at 16.11.25_76a1c84a.jpg', 'Food is for eating, and good food is to be enjoyed.'),
(39, 'NOODLES', 1200, 'Noodles', '../uploaded_img/product/WhatsApp Image 2023-12-20 at 16.08.01_a1c86273.jpg', 'Don\'t cook, just eat.'),
(40, 'LEMON MOJITO', 600, 'Beverages', '../uploaded_img/product/WhatsApp Image 2023-12-20 at 16.15.39_7c827b70.jpg', 'A delightful fusion of white rum, zesty lime crating a refreshing and invigorating cocktail.'),
(41, 'VEGITABLE SOUP', 550, 'Soups and Salads', '../uploaded_img/product/WhatsApp Image 2023-12-20 at 16.08.01_4ee5becc.jpg', 'Healthy foods are made here.'),
(42, 'KOTTU', 1600, 'Kottu', '../uploaded_img/product/WhatsApp Image 2023-12-20 at 16.33.39_3ca9d38b.jpg', 'Kottu is nothing but, just a state of happiness.'),
(43, 'BURGER', 1300, 'Burger', '../uploaded_img/product/WhatsApp Image 2023-12-20 at 16.33.39_9c32d1db.jpg', 'Don\'t regret to have a BURGER, Just enjoy.'),
(44, 'COCA - COLA', 300, 'Beverages', '../uploaded_img/product/WhatsApp Image 2023-12-20 at 16.39.59_9e1add2a.jpg', 'Fizzing refreshment in a red can.'),
(45, 'Waffle Slice', 1000, 'Desserts', '../uploaded_img/product/WhatsApp Image 2023-12-20 at 16.43.12_fd9a2cba.jpg', 'Sweet momo.');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(10) NOT NULL,
  `service_name` varchar(225) NOT NULL,
  `service_image` varchar(225) NOT NULL,
  `service_description` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_name`, `service_image`, `service_description`) VALUES
(3, 'POOL', '../uploaded_img/WhatsApp Image 2023-12-17 at 22.43.36_1f2b028d.jpg', 'The hotel pool, nestled amidst lush greenery, offers a serene oasis with its crystal-clear waters and inviting lounge chairs, perfect for unwinding under the sun.'),
(7, 'CAR PARK', '../uploaded_img/WhatsApp Image 2023-12-18 at 11.05.46_91c586f9.jpg', 'Located on the ground floor, our spacious car park provides uninterrupted parking for diners, ensuring easy access and a comfortable experience from arrival to departure.'),
(8, 'GYM', '../uploaded_img/WhatsApp Image 2023-12-16 at 22.40.44_0f64019a.jpg', 'The hotel gym boasts state-of-the-art equipment and expansive windows that flood the space with natural light, offering guests a motivating environment to achieve their fitness goals during their stay. '),
(9, 'SPA', '../uploaded_img/WhatsApp Image 2023-12-21 at 16.24.15_7cd8c725.jpg', 'Our expert therapists, luxurious treatments, and calming atmosphere invite you to unwind, revitalize, and indulge in a haven crafted to soothe your body and soul.'),
(10, 'BAR', '../uploaded_img/WhatsApp Image 2023-12-21 at 16.24.15_fd7a9283.jpg', 'A cozy spot offering drinks, a relaxed atmosphere, and a place to unwind during your stay.'),
(11, 'FOOD FESTIVAL', '../uploaded_img/WhatsApp Image 2023-12-21 at 16.26.04_b5b802b9.jpg', 'Vibrant celebrations within the hotel premises featuring music, food, entertainment, and a joyful atmosphere, creating memorable experiences for guests.');

-- --------------------------------------------------------

--
-- Table structure for table `table_bookings`
--

CREATE TABLE `table_bookings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `guests` int(11) NOT NULL,
  `special_request` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_bookings`
--

INSERT INTO `table_bookings` (`id`, `name`, `email`, `date`, `time`, `guests`, `special_request`, `created_at`) VALUES
(3, 'Madhusanka Thennakoon', 'madhusanka@gmail.com', '2024-02-07', '16:30:00', 5, 'It means a lot to us to have a table by the window or in a quiet area to make the evening more memorable.', '2023-12-21 08:47:51'),
(4, 'Thilesha', 'thilesha@gmail.com', '2024-02-24', '09:30:00', 3, 'Done quickly', '2023-12-24 12:00:02'),
(5, 'Nisansala Ekanayake', 'nisansalaekanayake73@gmail.com', '2024-02-13', '09:30:00', 5, 'Provide a table from an upper floor.', '2023-12-25 15:43:11');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '1234', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(225) NOT NULL,
  `user_email` varchar(225) NOT NULL,
  `user_password` varchar(225) NOT NULL,
  `user_hashpassword` varchar(225) NOT NULL,
  `user_type` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_hashpassword`, `user_type`) VALUES
(2, 'Madhu', 'madhu@gmail.com', '1234', '$2y$10$woJL3S52cI66DgS.Ti3pPuxfGMSJYKgtt7j8YIa74.QduWt/bdUau', 'Staff'),
(3, 'Chamod', 'chamo@gmail.com', '5678', '$2y$10$07cGEya3ZXwG9Y.BNZjJieDUEdhHKvghNWpV/YrtaBuh9KOUFZmTm', 'Staff'),
(4, 'Thilesha', 'thilesha@gmail.com', '9101', '$2y$10$yvA1Rb3pDfy8Cmfd61/4EOwWITDZrxFryD1nMPTaLRN2/GFFAEcSW', 'Staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_register`
--
ALTER TABLE `customer_register`
  ADD PRIMARY KEY (`register_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
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
  ADD PRIMARY KEY (`Product_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `table_bookings`
--
ALTER TABLE `table_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_register`
--
ALTER TABLE `customer_register`
  MODIFY `register_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `table_bookings`
--
ALTER TABLE `table_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
