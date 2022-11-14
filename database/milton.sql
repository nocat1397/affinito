-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2021 at 07:43 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `milton`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `quantity`, `product_id`, `created_at`, `updated_at`) VALUES
(23, 2, 12, 1, '2021-02-06 05:35:20', '2021-02-08 03:51:01'),
(27, 3, 1, 1, '2021-02-09 23:27:45', '2021-02-09 23:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `file`, `created_at`, `updated_at`) VALUES
(1, 'paneer.jpg', '2021-01-08 08:57:36', '2021-01-08 08:57:36'),
(3, 'cheese.jpeg', '2021-01-11 00:23:35', '2021-01-11 00:23:35'),
(4, 'dahi.jpg', '2021-01-11 01:39:11', '2021-01-11 01:39:11'),
(5, 'cheese-2.jpg', '2021-01-12 04:43:48', '2021-01-12 04:43:48'),
(6, 'cute-funny-Santa-cartoon-pictures-for-facebook-5801x4966.jpg', '2021-01-18 10:45:56', '2021-01-18 10:45:56'),
(7, 'dahi.jpg', '2021-01-31 01:38:43', '2021-01-31 01:38:43'),
(13, '5dahi.jpg', '2021-02-05 10:13:32', '2021-02-05 10:13:32'),
(14, '5milk.jpg', '2021-02-05 10:13:32', '2021-02-05 10:13:32');

-- --------------------------------------------------------

--
-- Table structure for table `image_product`
--

CREATE TABLE `image_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_product`
--

INSERT INTO `image_product` (`id`, `image_id`, `product_id`, `created_at`, `updated_at`) VALUES
(3, 4, 4, NULL, NULL),
(4, 5, 5, NULL, NULL),
(5, 6, 6, NULL, NULL),
(6, 3, 3, NULL, NULL),
(7, 1, 1, NULL, NULL),
(14, 13, 5, NULL, NULL),
(15, 14, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_07_133552_create_roles_table', 1),
(5, '2021_01_07_133619_create_products_table', 1),
(6, '2021_01_07_133701_create_purchasers_table', 1),
(7, '2021_01_08_070905_create_images_table', 2),
(8, '2021_01_19_100014_create_tags_table', 3),
(9, '2021_01_21_035830_create_carts_table', 4),
(10, '2021_01_21_184505_create_wishlists_table', 5),
(11, '2021_01_30_135017_create_images_products_table', 6),
(12, '2021_02_03_111238_create_newsletters_table', 7),
(13, '2021_02_04_125652_create_orders_table', 8),
(14, '2021_02_07_095349_create_orderstatuses_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rzp_order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rzp_payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderstatus_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `rzp_order_id`, `rzp_payment_id`, `amount`, `payment_mode`, `orderstatus_id`, `created_at`, `updated_at`) VALUES
(1, 3, 'order_GYEZVIeE7Ys0nT', NULL, '60', NULL, NULL, '2021-02-06 03:41:07', '2021-02-06 03:41:07'),
(2, 3, 'order_GYEimA8KzgsT2m', NULL, '60', NULL, NULL, '2021-02-06 03:49:53', '2021-02-06 03:49:54'),
(3, 3, 'order_GYElAO54cNkBgM', NULL, '60', NULL, NULL, '2021-02-06 03:52:09', '2021-02-06 03:52:10'),
(4, 3, 'order_GYEpqJKmcP8FAH', NULL, '60', NULL, NULL, '2021-02-06 03:56:34', '2021-02-06 03:56:35'),
(5, 3, 'order_GYEuNombSKcUwl', NULL, '60', NULL, NULL, '2021-02-06 04:00:53', '2021-02-06 04:00:53'),
(6, 3, 'order_GYF0zUdMeBQJRX', NULL, '60', NULL, NULL, '2021-02-06 04:07:08', '2021-02-06 04:07:08'),
(7, 3, 'order_GYF38jGAFRuzzb', NULL, '60', NULL, NULL, '2021-02-06 04:09:10', '2021-02-06 04:09:11'),
(8, 3, 'order_GYF51Zb0o1W7dl', 'pay_GYF5RwNrELwXz4', '60', 'card', 5, '2021-02-06 04:10:57', '2021-02-13 15:00:14'),
(9, 3, 'order_GYFEqN56gBWvsM', 'pay_GYFFCfEKXgfASx', '100', 'card', 6, '2021-02-06 04:20:14', '2021-02-15 14:21:59'),
(10, 3, NULL, NULL, NULL, NULL, NULL, '2021-02-06 04:22:56', '2021-02-06 04:22:56'),
(11, 3, 'order_GYFHgfvX6ia68c', NULL, '60', NULL, NULL, '2021-02-06 04:22:56', '2021-02-06 04:22:57'),
(12, 3, 'order_GYFIHceQodTAmV', NULL, '60', NULL, NULL, '2021-02-06 04:23:30', '2021-02-06 04:23:31'),
(13, 3, NULL, NULL, NULL, NULL, NULL, '2021-02-06 04:23:30', '2021-02-06 04:23:30'),
(14, 3, 'order_GYFJWX4ee5Rsqa', NULL, '60', NULL, NULL, '2021-02-06 04:24:40', '2021-02-06 04:24:41'),
(15, 3, NULL, NULL, NULL, NULL, NULL, '2021-02-06 04:24:40', '2021-02-06 04:24:40'),
(16, 3, 'order_GYFc8XgDlJO46N', 'pay_GYFeXBHc47Dv7Z', '160', 'card', 6, '2021-02-06 04:42:18', '2021-02-15 14:41:25'),
(17, 2, NULL, NULL, '10000', NULL, NULL, '2021-02-06 04:53:16', '2021-02-06 04:53:16'),
(18, 2, NULL, NULL, '10000', NULL, NULL, '2021-02-06 04:53:22', '2021-02-06 04:53:22'),
(19, 2, 'order_GYFoWAilW15U8M', 'pay_GYFon7Wv0pZCXZ', '10000', 'card', 2, '2021-02-06 04:54:01', '2021-02-06 04:54:21'),
(20, 2, 'order_GYFsAjN1IUPeKC', NULL, '160', NULL, NULL, '2021-02-06 04:57:29', '2021-02-06 04:57:29'),
(21, 2, 'order_GYFsRd0qcJFssj', NULL, '160', NULL, NULL, '2021-02-06 04:57:44', '2021-02-06 04:57:45'),
(22, 2, 'order_GYFss4OZg8uKF1', 'pay_GYFtW0gUiIZdlf', '10060', 'card', 2, '2021-02-06 04:58:08', '2021-02-08 03:43:04'),
(23, 2, 'order_GZ1iXdCXHc9bao', NULL, '1000', NULL, 1, '2021-02-08 03:45:39', '2021-02-08 03:45:40'),
(24, 2, 'order_GZ1oMYKsGRyPj4', NULL, '1200', NULL, NULL, '2021-02-08 03:51:10', '2021-02-08 03:51:10'),
(25, 3, 'order_GZklMJL2QnPjHU', NULL, '100', NULL, NULL, '2021-02-09 23:49:32', '2021-02-09 23:49:33'),
(26, 3, NULL, NULL, '100', NULL, NULL, '2021-02-10 06:27:48', '2021-02-10 06:27:48'),
(27, 3, 'order_GZrYB7Wwr6huz5', NULL, '100', NULL, NULL, '2021-02-10 06:27:55', '2021-02-10 06:27:55'),
(28, 3, 'order_GZrYvieHDGNdpv', NULL, '100', NULL, NULL, '2021-02-10 06:28:37', '2021-02-10 06:28:38'),
(29, 3, NULL, NULL, '100', NULL, NULL, '2021-02-10 06:30:02', '2021-02-10 06:30:02'),
(30, 3, 'order_GZrafs2HwddCPX', NULL, '100', NULL, NULL, '2021-02-10 06:30:16', '2021-02-10 06:30:17'),
(31, 3, NULL, NULL, '100', NULL, NULL, '2021-02-10 06:31:50', '2021-02-10 06:31:50'),
(32, 3, 'order_GZrcW7YT53mUSc', NULL, '100', NULL, NULL, '2021-02-10 06:31:59', '2021-02-10 06:32:02'),
(33, 3, NULL, NULL, '100', NULL, NULL, '2021-02-10 06:34:29', '2021-02-10 06:34:29'),
(34, 3, 'order_GZrfLNtKI2IuVY', NULL, '100', NULL, NULL, '2021-02-10 06:34:42', '2021-02-10 06:34:42'),
(35, 3, NULL, NULL, '100', NULL, NULL, '2021-02-10 06:37:05', '2021-02-10 06:37:05'),
(36, 3, NULL, NULL, '100', NULL, NULL, '2021-02-10 06:38:02', '2021-02-10 06:38:02'),
(37, 3, 'order_GZrixOPMVrKna5', NULL, '100', NULL, NULL, '2021-02-10 06:38:07', '2021-02-10 06:38:07'),
(38, 3, 'order_GZrk4GZID6qMNg', NULL, '100', NULL, NULL, '2021-02-10 06:39:08', '2021-02-10 06:39:11'),
(39, 3, 'order_GZswQglQVcFuuf', NULL, '100', NULL, NULL, '2021-02-10 07:49:33', '2021-02-10 07:49:35'),
(40, 3, 'order_GZsxQvZAjc31uL', NULL, '100', NULL, NULL, '2021-02-10 07:50:30', '2021-02-10 07:50:33'),
(41, 3, 'order_GZtBls07VTbsW4', NULL, '100', NULL, NULL, '2021-02-10 08:04:04', '2021-02-10 08:04:10'),
(42, 3, 'order_GZtMYT2qIh8rjd', NULL, '100', NULL, NULL, '2021-02-10 08:14:18', '2021-02-10 08:14:18'),
(43, 3, 'order_GZtmyNGPAbRC8o', NULL, '100', NULL, NULL, '2021-02-10 08:39:18', '2021-02-10 08:39:19'),
(44, 3, 'order_GZtsudppBjsXdw', NULL, '100', NULL, NULL, '2021-02-10 08:44:55', '2021-02-10 08:44:57'),
(45, 3, 'order_GZtuwcXFPdY7kQ', NULL, '100', NULL, NULL, '2021-02-10 08:46:49', '2021-02-10 08:46:53'),
(46, 3, 'order_GZtv0nzni6UawZ', NULL, '100', NULL, NULL, '2021-02-10 08:46:53', '2021-02-10 08:46:56'),
(47, 3, NULL, NULL, '100', NULL, NULL, '2021-02-10 08:55:46', '2021-02-10 08:55:46'),
(48, 3, NULL, NULL, '100', NULL, NULL, '2021-02-10 08:56:16', '2021-02-10 08:56:16'),
(49, 3, 'order_GZu6DTtJOxkQsO', NULL, '100', NULL, NULL, '2021-02-10 08:57:28', '2021-02-10 08:57:32'),
(50, 3, NULL, NULL, '100', NULL, NULL, '2021-02-10 08:59:51', '2021-02-10 08:59:51'),
(51, 3, 'order_GZu9I3HOMBdKcu', NULL, '100', NULL, NULL, '2021-02-10 09:00:19', '2021-02-10 09:00:27');

-- --------------------------------------------------------

--
-- Table structure for table `orderstatuses`
--

CREATE TABLE `orderstatuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderstatuses`
--

INSERT INTO `orderstatuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Not Confirmed', NULL, NULL),
(2, 'Confirmed', NULL, NULL),
(3, 'Dispatched', NULL, NULL),
(4, 'Delivered', NULL, NULL),
(5, 'Cancellation in progress', NULL, NULL),
(6, 'Return/Refund Confirmed', NULL, NULL),
(7, 'Return/Refund in Progress', NULL, NULL),
(8, 'Return/Refund Delivered', NULL, NULL),
(9, 'Cancelled', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `quantity`, `quantity_unit`, `amount`, `amount_unit`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 'Paneer', 'It is a non-aged, non-melting soft cheese made by curdling milk with a fruit- or vegetable-derived acid, such as lemon juice. Its acid-set form before pressing is called chhena.', '898', 'kg', '100', 'kg', 1, '2021-01-08 08:57:36', '2021-02-06 04:54:21'),
(3, 'Cheese', 'It comprises proteins and fat from milk, usually the milk of cows, buffalo, goats, or sheep.', '0', 'kg', '100', 'kg', 1, '2021-01-11 00:23:35', '2021-02-06 04:58:50'),
(4, 'Curd', 'Curd is obtained by coagulating milk in a sequential process called curdling.', '998', 'kg', '60', 'kg', 2, '2021-01-11 01:39:11', '2021-02-06 04:44:44'),
(5, 'Parmesan-Cheese', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit.', '998', 'kg', '60', 'kg', 2, NULL, '2021-02-06 04:58:50');

-- --------------------------------------------------------

--
-- Table structure for table `purchasers`
--

CREATE TABLE `purchasers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchasers`
--

INSERT INTO `purchasers` (`id`, `product_id`, `quantity`, `order_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 8, 3, '2021-02-06 04:11:27', '2021-02-06 04:11:27'),
(2, 3, 1, 9, 3, '2021-02-06 04:20:42', '2021-02-06 04:20:42'),
(3, 4, 1, 16, 3, '2021-02-06 04:44:44', '2021-02-06 04:44:44'),
(4, 1, 1, 16, 3, '2021-02-06 04:44:44', '2021-02-06 04:44:44'),
(5, 1, 100, 19, 2, '2021-02-06 04:54:21', '2021-02-06 04:54:21'),
(6, 5, 1, 22, 2, '2021-02-06 04:58:50', '2021-02-06 04:58:50'),
(7, 3, 100, 22, 2, '2021-02-06 04:58:50', '2021-02-06 04:58:50');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Customer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Trending', NULL, NULL),
(2, 'Mostview', NULL, NULL),
(3, 'Featured', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `city`, `address`, `pincode`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nilay Gajjar', 'nilay@gmail.com', NULL, '$2y$10$oiPifpNxG4Bmo6rL5XmdOew3H.leapgQuIOnotGRNpypNwIEKR2Ey', '9574995119', NULL, NULL, NULL, 1, NULL, '2021-01-07 12:29:50', '2021-01-07 12:29:50'),
(2, 'Chavda Chnadrakant', 'chavda.ahm@gmail.com', NULL, '$2y$10$1drEjVS3ewLppxqxoCieoOWUE.aqlWrKqJMMCF2dRnT7WON74uFL2', '01478523690', 'Ahmedabad', 'Harsh flat, nr. kumkum vidhyalaya, ghodasar, Ahmedabad', '380003', 2, NULL, '2021-01-11 07:44:32', '2021-01-11 07:44:32'),
(3, 'Vikas Shah', 'vikas@gmail.com', NULL, '$2y$10$1l9hLv8KvRIf3UMmqlA.jObHk9fO6O4vB.bpgDEwZcBkjJM6ZG.Ay', '07894561230', 'Ahmedabad', '20 Tejendra society,  nirant cross road, vastral, ahmedabad', '382418', 2, NULL, '2021-01-11 08:51:11', '2021-01-11 08:51:11');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2021-01-21 13:44:29', '2021-01-21 13:44:29'),
(2, 2, 3, '2021-01-21 13:47:04', '2021-01-21 13:47:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_product`
--
ALTER TABLE `image_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderstatuses`
--
ALTER TABLE `orderstatuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchasers`
--
ALTER TABLE `purchasers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `image_product`
--
ALTER TABLE `image_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `orderstatuses`
--
ALTER TABLE `orderstatuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `purchasers`
--
ALTER TABLE `purchasers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
