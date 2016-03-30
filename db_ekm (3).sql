-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 29, 2016 at 11:38 PM
-- Server version: 10.0.23-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ekm`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `is_show` varchar(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `is_show`, `created_at`, `updated_at`) VALUES
(2, 'Engine', '0', '2016-03-26 07:27:01', '2016-03-26 07:27:11'),
(3, 'Radiator', '1', '2016-03-27 03:15:31', '2016-03-27 03:15:31'),
(4, 'Tired', '1', '2016-03-27 03:15:46', '2016-03-27 03:15:46'),
(5, 'Air Filter AC', '1', '2016-03-27 03:16:12', '2016-03-27 03:16:12'),
(6, 'AS Kapel', '1', '2016-03-27 03:16:24', '2016-03-27 03:16:24'),
(7, 'Alarm Remote', '1', '2016-03-27 03:16:35', '2016-03-27 03:16:35'),
(8, 'Oli Filter', '1', '2016-03-27 03:17:01', '2016-03-27 03:17:01'),
(9, 'Master Kopling', '1', '2016-03-27 03:18:02', '2016-03-27 03:18:02'),
(10, 'Lower Arm', '1', '2016-03-27 03:18:18', '2016-03-27 03:18:18'),
(12, 'Lighter', '1', '2016-03-27 03:18:41', '2016-03-27 03:18:41'),
(13, 'Lampu Belakang', '1', '2016-03-27 03:57:33', '2016-03-27 03:57:33'),
(14, 'Lampu Depan', '1', '2016-03-27 03:57:42', '2016-03-27 03:57:42'),
(15, 'Busi', '1', '2016-03-27 03:57:47', '2016-03-27 03:57:47'),
(16, 'Oli Gardan', '1', '2016-03-27 03:59:03', '2016-03-27 03:59:03'),
(17, 'Engine Break', '1', '2016-03-27 03:59:09', '2016-03-27 03:59:09');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `messages` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `subject`, `messages`, `created_at`, `updated_at`) VALUES
(1, 'Hasan', 'riza@gmail.com', 'tanya', 'harga product nya berapa ya ?', '2016-03-27 07:22:17', '2016-03-27 07:22:17'),
(2, 'Riza', 'riza@gmail.com', 'tanya harga barang', 'harga barang nya berapa ya ?', '2016-03-27 07:22:51', '2016-03-27 07:22:51');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(4) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `fullname`, `email`, `phone`, `address`, `product_id`, `qty`, `price`, `created_at`, `updated_at`, `status`) VALUES
(2, 'Hasan', 'hasabasri2307@gmail.com', '0829321423', 'rawamagun jakarta timur', 7, 3, 150000, '2016-03-27 04:39:05', '2016-03-27 04:39:05', '1'),
(3, 'Riza ', 'riza@gmail.com', '123123123', 'testestestestes', 14, 15, 1800000, '2016-03-27 04:39:27', '2016-03-27 04:39:27', '1'),
(4, 'Eko', 'eko@gmail.com', '09877823413', 'jalan raya buaya', 12, 2, 15000000, '2016-03-27 04:39:52', '2016-03-27 04:39:52', '1'),
(5, 'Wahyudi', 'wahyu@gmail.com', '09123215521', 'jalan raya minang no.13', 10, 21, 10000000000, '2016-03-27 04:40:29', '2016-03-27 04:40:29', '1'),
(6, 'Bela', 'bela@gmail.com', '09173214213', 'jalan raya mangindang', 13, 11, 8000000, '2016-03-27 04:41:26', '2016-03-27 04:41:26', '1'),
(7, 'Polim', 'polim@gmail.com', '0812342135', 'Jlan alam sutra raya', 14, 5, 5000000, '2016-03-27 04:42:51', '2016-03-27 04:42:51', '1'),
(8, 'Jokowi', 'jokowi@gmail.com', '082131413', 'Jalan Teggniri no13.a', 13, 5, 9087744, '2016-03-27 08:23:11', '2016-03-27 08:23:11', '1'),
(9, 'Agus', 'agus@yahoo.com', '091234134', 'Jalan Bekasi Timur. No.13', 14, 2, 7000000, '2016-03-27 10:15:37', '2016-03-27 10:15:37', '0');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `description` text NOT NULL,
  `is_available` varchar(1) NOT NULL DEFAULT '0',
  `is_show` varchar(1) NOT NULL DEFAULT '0',
  `discount` double NOT NULL DEFAULT '0',
  `cat_id` int(11) NOT NULL,
  `tags` text NOT NULL,
  `pict_1` varchar(100) NOT NULL,
  `pict_2` varchar(100) NOT NULL,
  `pict_3` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `p_name`, `price`, `description`, `is_available`, `is_show`, `discount`, `cat_id`, `tags`, `pict_1`, `pict_2`, `pict_3`, `created_at`, `updated_at`) VALUES
(6, 'Radiator', 150000, 'tetsts', '1', '1', 0, 3, 'radiator,suzuki', '2151b4943f920ad04fbedee1aa786f85.jpg', '', '', '2016-03-27 03:19:44', '2016-03-27 09:36:29'),
(7, 'Product 2', 980000, 'test product', '1', '1', 0, 3, 'lampu', 'f34349369c07379a04db89da56a36407.jpg', '', '', '2016-03-27 03:20:10', '2016-03-27 03:20:10'),
(8, 'Product 3', 18900000, 'tes test testes tes', '1', '1', 0, 3, 'mesin,alarm', '2dee2c9e03f259dd12eda2ac67908fff.jpg', '', '', '2016-03-27 03:20:47', '2016-03-27 03:20:47'),
(9, 'Product 4', 2580000, 'test test es testes', '1', '1', 0, 3, '', 'd34b85c5653b344e28665e2cdaed19b5.jpg', '', '', '2016-03-27 03:21:34', '2016-03-27 03:21:34'),
(10, 'Product 5', 445000, 'teststestestse', '1', '1', 0, 3, '', 'e523d8c2d44aac70bcde825299b445d5.jpg', '', '', '2016-03-27 03:21:55', '2016-03-27 03:21:55'),
(11, 'Product 6', 3360000, 'tes test tes', '1', '1', 0, 3, '', '385e42258f80e1b19c46fe500cc71d2d.jpg', '', '', '2016-03-27 03:22:24', '2016-03-27 03:22:24'),
(12, 'Product 7', 19000000, 'tes tes testest es test estestes', '1', '1', 0, 3, '', '7e6f17aebf5288223b44402654291974.jpg', '', '', '2016-03-27 03:22:46', '2016-03-27 03:22:46'),
(13, 'Product 8', 9087744, 'testestestes', '1', '1', 0, 3, 'mesin,dalem', '9af10074f6aac79dea3057525438cb46.jpg', '', '', '2016-03-27 03:24:20', '2016-03-27 03:24:20'),
(14, 'Product 9', 7000000, 'tes test tes', '1', '1', 0, 7, 'alarm,mobil', 'd4eaffac5d019d3602819718a8b422c4.jpg', '', '', '2016-03-27 03:24:46', '2016-03-27 03:24:46');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `perusahaan` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `nama`, `email`, `telepon`, `perusahaan`, `isi`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hasan', 'hasanbasri2307@gmail.com', '0859213213', 'PT Maju Jaya', 'PT Express Sangat Bagus Terimakasi', '1', '2016-03-29 23:26:38', '2016-03-29 23:26:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL,
  `password` varchar(100) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `u_name`, `email`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hasan Basri', 'hasanbasri2307@gmail.com', '1', '$2y$10$OymEEzBgqTIT.FNGsCofsepbW8Ew7yKPo8VAy7uO7Y2lN9wD6ShgO', 'HaUSKrsOGZfjsDOgEV4RxahZmccdld7QSkbIybHDWeANDBAIKNW2wwhgKG0Z', '2016-03-23 04:17:38', '2016-03-27 09:55:00'),
(8, 'Riza', 'riza@gmail.com', '2', '$2y$10$QFNN0BNNPPOgL8xbIYvv/ONiBUKYVE58gx8c.WN3HBy9oP4oBK7li', NULL, '2016-03-26 06:48:27', '2016-03-26 07:00:39'),
(9, 'Agus Nurcholis', 'noercholisagus@yahoo.com', '1', '$2y$10$GHvdtdhWNCDdwtRZIOp1auJMALYqFLmelDUUEzJI4u.xUF1Pw53Ra', NULL, '2016-03-27 09:54:57', '2016-03-27 09:54:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_user` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_categories` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
