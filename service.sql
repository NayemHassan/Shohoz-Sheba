-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2022 at 03:21 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `service`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `blog_user_id` int(11) NOT NULL,
  `blog_title` text NOT NULL,
  `blog_details` text NOT NULL,
  `blog_image` varchar(255) NOT NULL,
  `blog_status` text NOT NULL DEFAULT 'Enable',
  `blog_delete` int(11) NOT NULL DEFAULT 0,
  `blog_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `cart_customer_id` int(11) NOT NULL,
  `cart_category_id` int(11) NOT NULL,
  `cart_service_id` int(11) NOT NULL,
  `cart_service_quantity` int(11) NOT NULL,
  `cart_status` text NOT NULL DEFAULT 'Enable',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_details` text NOT NULL,
  `cat_image` varchar(255) NOT NULL,
  `cat_status` varchar(255) NOT NULL DEFAULT 'Enable',
  `cat_delete` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_details`, `cat_image`, `cat_status`, `cat_delete`, `created_at`, `updated_at`) VALUES
(1, 'Ac Servicing', '<div data-v-3f9453f1=\"\" class=\"service-overview-component\" style=\"margin: 0px 0px 20px; scroll-behavior: smooth; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); word-spacing: 1px;\"><h4 data-v-3f9453f1=\"\" class=\"service-overview-component__title\" style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; scroll-behavior: smooth; font-family: Poppins, sans-serif; font-weight: 600; line-height: 1.56; font-size: 18px; color: rgba(0, 0, 0, 0.8);\">What\'s Included?</h4><p data-v-3f9453f1=\"\" class=\"service-overview-component__info\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; scroll-behavior: smooth; font-size: 16px; line-height: 1.5; color: rgb(56, 58, 60);\"></p><div data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth;\"><ul data-v-3f9453f1=\"\" class=\"list-unordered\" style=\"margin-right: 0px; margin-left: 0px; scroll-behavior: smooth; list-style: none; padding-left: 25px;\"><li data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; font-size: 16px; line-height: 1.5; color: rgb(56, 58, 60); padding-bottom: 10px; padding-left: 0px; position: relative;\"><span data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; position: absolute; content: \"\"; width: 5px; height: 5px; line-height: 16px; border-radius: 50%; background-image: linear-gradient(135deg, rgb(0, 0, 0) 100%, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 0px); color: rgb(255, 255, 255); text-align: center; top: 10px; left: -21px;\"></span>Only service charge</li><li data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; font-size: 16px; line-height: 1.5; color: rgb(56, 58, 60); padding-bottom: 10px; padding-left: 0px; position: relative;\"><span data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; position: absolute; content: \"\"; width: 5px; height: 5px; line-height: 16px; border-radius: 50%; background-image: linear-gradient(135deg, rgb(0, 0, 0) 100%, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 0px); color: rgb(255, 255, 255); text-align: center; top: 10px; left: -21px;\"></span>7 Days service warranty</li></ul></div></div><div data-v-3f9453f1=\"\" class=\"service-overview-component\" style=\"margin: 0px 0px 20px; scroll-behavior: smooth; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); word-spacing: 1px;\"><h4 data-v-3f9453f1=\"\" class=\"service-overview-component__title\" style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; scroll-behavior: smooth; font-family: Poppins, sans-serif; font-weight: 600; line-height: 1.56; font-size: 18px; color: rgba(0, 0, 0, 0.8);\">What\'s Excluded?</h4><p data-v-3f9453f1=\"\" class=\"service-overview-component__info\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; scroll-behavior: smooth; font-size: 16px; line-height: 1.5; color: rgb(56, 58, 60);\"></p><div data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth;\"><ul data-v-3f9453f1=\"\" class=\"list-unordered\" style=\"margin-right: 0px; margin-left: 0px; scroll-behavior: smooth; list-style: none; padding-left: 25px;\"><li data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; font-size: 16px; line-height: 1.5; color: rgb(56, 58, 60); padding-bottom: 10px; padding-left: 0px; position: relative;\"><span data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; position: absolute; content: \"\"; width: 5px; height: 5px; line-height: 16px; border-radius: 50%; background-image: linear-gradient(135deg, rgb(0, 0, 0) 100%, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 0px); color: rgb(255, 255, 255); text-align: center; top: 10px; left: -21px;\"></span>Price of materials or parts</li><li data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; font-size: 16px; line-height: 1.5; color: rgb(56, 58, 60); padding-bottom: 10px; padding-left: 0px; position: relative;\"><span data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; position: absolute; content: \"\"; width: 5px; height: 5px; line-height: 16px; border-radius: 50%; background-image: linear-gradient(135deg, rgb(0, 0, 0) 100%, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 0px); color: rgb(255, 255, 255); text-align: center; top: 10px; left: -21px;\"></span>Transportation cost for carrying new materials/parts</li><li data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; font-size: 16px; line-height: 1.5; color: rgb(56, 58, 60); padding-bottom: 10px; padding-left: 0px; position: relative;\"><span data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; position: absolute; content: \"\"; width: 5px; height: 5px; line-height: 16px; border-radius: 50%; background-image: linear-gradient(135deg, rgb(0, 0, 0) 100%, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 0px); color: rgb(255, 255, 255); text-align: center; top: 10px; left: -21px;\"></span>Warranty given by manufacturer</li></ul></div></div><div data-v-3f9453f1=\"\" class=\"service-overview-component\" style=\"margin: 0px 0px 20px; scroll-behavior: smooth; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); word-spacing: 1px;\"><h4 data-v-3f9453f1=\"\" class=\"service-overview-component__title\" style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; scroll-behavior: smooth; font-family: Poppins, sans-serif; font-weight: 600; line-height: 1.56; font-size: 18px; color: rgba(0, 0, 0, 0.8);\">Available Services</h4><p data-v-3f9453f1=\"\" class=\"service-overview-component__info\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; scroll-behavior: smooth; font-size: 16px; line-height: 1.5; color: rgb(56, 58, 60);\"></p><div data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth;\"><ul data-v-3f9453f1=\"\" class=\"list-unordered\" style=\"margin-right: 0px; margin-left: 0px; scroll-behavior: smooth; list-style: none; padding-left: 25px;\"><li data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; font-size: 16px; line-height: 1.5; color: rgb(56, 58, 60); padding-bottom: 10px; padding-left: 0px; position: relative;\"><span data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; position: absolute; content: \"\"; width: 5px; height: 5px; line-height: 16px; border-radius: 50%; background-image: linear-gradient(135deg, rgb(0, 0, 0) 100%, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 0px); color: rgb(255, 255, 255); text-align: center; top: 10px; left: -21px;\"></span>AC Basic Servicing</li><li data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; font-size: 16px; line-height: 1.5; color: rgb(56, 58, 60); padding-bottom: 10px; padding-left: 0px; position: relative;\"><span data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; position: absolute; content: \"\"; width: 5px; height: 5px; line-height: 16px; border-radius: 50%; background-image: linear-gradient(135deg, rgb(0, 0, 0) 100%, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 0px); color: rgb(255, 255, 255); text-align: center; top: 10px; left: -21px;\"></span>AC Master Service</li><li data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; font-size: 16px; line-height: 1.5; color: rgb(56, 58, 60); padding-bottom: 10px; padding-left: 0px; position: relative;\"><span data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; position: absolute; content: \"\"; width: 5px; height: 5px; line-height: 16px; border-radius: 50%; background-image: linear-gradient(135deg, rgb(0, 0, 0) 100%, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 0px); color: rgb(255, 255, 255); text-align: center; top: 10px; left: -21px;\"></span>AC Water Drop Solution</li><li data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; font-size: 16px; line-height: 1.5; color: rgb(56, 58, 60); padding-bottom: 10px; padding-left: 0px; position: relative;\"><span data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; position: absolute; content: \"\"; width: 5px; height: 5px; line-height: 16px; border-radius: 50%; background-image: linear-gradient(135deg, rgb(0, 0, 0) 100%, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 0px); color: rgb(255, 255, 255); text-align: center; top: 10px; left: -21px;\"></span>AC Jet Wash</li></ul></div></div>', 'public/category/1668665369.jpg', 'Enable', 0, NULL, NULL),
(2, 'Gas stove repair', '<p><span style=\"color: rgb(33, 37, 41); font-family: Poppins, sans-serif; font-size: 16px; word-spacing: 1px;\">Gas Stove is very important in our daily life, most importantly it cooks food. So, when a gas stove breaks down it requires urgent servicing.</span><br style=\"margin: 0px; scroll-behavior: smooth; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 16px; word-spacing: 1px;\"><span style=\"color: rgb(33, 37, 41); font-family: Poppins, sans-serif; font-size: 16px; word-spacing: 1px;\">Now you don’t have to go out and search for gas stove servicing centers. At Sheba.xyz marketplace we offer doorstep expert gas stove servicing and repairing. Upon receiving your order online our vetted service providers will get in touch with you and reach at your doorstep to perform initial diagnosis to identify problems.</span><br></p>', 'public/category/1668765984.jpg', 'Enable', 0, '2022-11-18 10:06:24', NULL),
(3, 'Painting service', '<h4 data-v-3f9453f1=\"\" class=\"service-overview-component__title\" style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; scroll-behavior: smooth; font-family: Poppins, sans-serif; font-weight: 600; line-height: 1.56; font-size: 18px; color: rgba(0, 0, 0, 0.8); word-spacing: 1px;\">Why take sheba.xyz painting service?</h4><p data-v-3f9453f1=\"\" class=\"service-overview-component__info\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; scroll-behavior: smooth; font-family: Poppins, sans-serif; font-size: 16px; line-height: 1.5; color: rgb(56, 58, 60); word-spacing: 1px;\"></p><div data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); word-spacing: 1px;\"><ul data-v-3f9453f1=\"\" class=\"list-unordered\" style=\"margin-right: 0px; margin-left: 0px; scroll-behavior: smooth; list-style: none; padding-left: 25px;\"><li data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; font-size: 16px; line-height: 1.5; color: rgb(56, 58, 60); padding-bottom: 10px; padding-left: 0px; position: relative;\"><span data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; position: absolute; content: &quot;&quot;; width: 5px; height: 5px; line-height: 16px; border-radius: 50%; background-image: linear-gradient(135deg, rgb(0, 0, 0) 100%, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 0px); color: rgb(255, 255, 255); text-align: center; top: 10px; left: -21px;\"></span>We ensure experienced professional and expert painters</li><li data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; font-size: 16px; line-height: 1.5; color: rgb(56, 58, 60); padding-bottom: 10px; padding-left: 0px; position: relative;\"><span data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; position: absolute; content: &quot;&quot;; width: 5px; height: 5px; line-height: 16px; border-radius: 50%; background-image: linear-gradient(135deg, rgb(0, 0, 0) 100%, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 0px); color: rgb(255, 255, 255); text-align: center; top: 10px; left: -21px;\"></span>We ensure only branded products are used by experts</li><li data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; font-size: 16px; line-height: 1.5; color: rgb(56, 58, 60); padding-bottom: 10px; padding-left: 0px; position: relative;\"><span data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; position: absolute; content: &quot;&quot;; width: 5px; height: 5px; line-height: 16px; border-radius: 50%; background-image: linear-gradient(135deg, rgb(0, 0, 0) 100%, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 0px); color: rgb(255, 255, 255); text-align: center; top: 10px; left: -21px;\"></span>We ensure proper safety and service equipment carries by expert</li><li data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; font-size: 16px; line-height: 1.5; color: rgb(56, 58, 60); padding-bottom: 10px; padding-left: 0px; position: relative;\"><span data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; position: absolute; content: &quot;&quot;; width: 5px; height: 5px; line-height: 16px; border-radius: 50%; background-image: linear-gradient(135deg, rgb(0, 0, 0) 100%, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 0px); color: rgb(255, 255, 255); text-align: center; top: 10px; left: -21px;\"></span>We ensure proper covering before painting and cleaning after service</li><li data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; font-size: 16px; line-height: 1.5; color: rgb(56, 58, 60); padding-bottom: 10px; padding-left: 0px; position: relative;\"><span data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; position: absolute; content: &quot;&quot;; width: 5px; height: 5px; line-height: 16px; border-radius: 50%; background-image: linear-gradient(135deg, rgb(0, 0, 0) 100%, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 0px); color: rgb(255, 255, 255); text-align: center; top: 10px; left: -21px;\"></span>We ensure right measurement, process and product at the same time</li><li data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; font-size: 16px; line-height: 1.5; color: rgb(56, 58, 60); padding-bottom: 10px; padding-left: 0px; position: relative;\"><span data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; position: absolute; content: &quot;&quot;; width: 5px; height: 5px; line-height: 16px; border-radius: 50%; background-image: linear-gradient(135deg, rgb(0, 0, 0) 100%, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 0px); color: rgb(255, 255, 255); text-align: center; top: 10px; left: -21px;\"></span>We ensure our customer post service warranty protection</li><li data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; font-size: 16px; line-height: 1.5; color: rgb(56, 58, 60); padding-bottom: 10px; padding-left: 0px; position: relative;\"><span data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; position: absolute; content: &quot;&quot;; width: 5px; height: 5px; line-height: 16px; border-radius: 50%; background-image: linear-gradient(135deg, rgb(0, 0, 0) 100%, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 0px); color: rgb(255, 255, 255); text-align: center; top: 10px; left: -21px;\"></span>We assist our customer up-to 12 months EMI facility</li><li data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; font-size: 16px; line-height: 1.5; color: rgb(56, 58, 60); padding-bottom: 10px; padding-left: 0px; position: relative;\"><span data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; position: absolute; content: &quot;&quot;; width: 5px; height: 5px; line-height: 16px; border-radius: 50%; background-image: linear-gradient(135deg, rgb(0, 0, 0) 100%, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 0px); color: rgb(255, 255, 255); text-align: center; top: 10px; left: -21px;\"></span>We ensure cost savings for long time to our customers</li><li data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; font-size: 16px; line-height: 1.5; color: rgb(56, 58, 60); padding-bottom: 10px; padding-left: 0px; position: relative;\"><span data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; position: absolute; content: &quot;&quot;; width: 5px; height: 5px; line-height: 16px; border-radius: 50%; background-image: linear-gradient(135deg, rgb(0, 0, 0) 100%, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 0px); color: rgb(255, 255, 255); text-align: center; top: 10px; left: -21px;\"></span>We ensure on time work completion with quality service</li><li data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; font-size: 16px; line-height: 1.5; color: rgb(56, 58, 60); padding-bottom: 10px; padding-left: 0px; position: relative;\"><span data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; position: absolute; content: &quot;&quot;; width: 5px; height: 5px; line-height: 16px; border-radius: 50%; background-image: linear-gradient(135deg, rgb(0, 0, 0) 100%, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 0px); color: rgb(255, 255, 255); text-align: center; top: 10px; left: -21px;\"></span>We ensure no hidden cost un-like other local service providers</li></ul></div>', 'public/category/1668766031.jpg', 'Enable', 0, '2022-11-18 10:07:11', NULL),
(4, 'Mens', '<p>dffsdfd</p>', 'public/category/1669384626.jpg', 'Enable', 0, '2022-11-25 13:57:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` bigint(20) UNSIGNED NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_address` varchar(255) NOT NULL,
  `contact_page` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `contact_number`, `contact_email`, `contact_address`, `contact_page`, `created_at`, `updated_at`) VALUES
(1, '01794973738', 'mutasimnaib0@gmail.com', 'Zorabari,Domar,Nilphamari', 'https://www.facebook.com/mutasim.sumit.71/', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `customer_birthday` date NOT NULL,
  `customer_image` varchar(255) DEFAULT NULL,
  `customer_gender` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `customer_status` text NOT NULL DEFAULT 'Enable',
  `customer_delete` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_phone`, `customer_birthday`, `customer_image`, `customer_gender`, `customer_address`, `customer_password`, `customer_status`, `customer_delete`, `created_at`, `updated_at`) VALUES
(1, 'User-1', 'user@gmail.com', '12312312312', '2022-11-02', 'public/customer/1669370251.jpg', 'Male', 'Zorabari,Domar,Nilphamari', '25f9e794323b453885f5181f1b624d0b', 'Enable', 0, '2022-11-25 09:57:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `order_customer_id` int(11) NOT NULL,
  `order_customer_name` varchar(255) NOT NULL,
  `order_customer_email` varchar(255) NOT NULL,
  `order_customer_phone` varchar(255) NOT NULL,
  `order_customer_address` text NOT NULL,
  `order_amount` double(8,2) NOT NULL,
  `order_status` text NOT NULL DEFAULT 'Pending',
  `payment_method` int(11) NOT NULL DEFAULT 2,
  `payment_status` text NOT NULL DEFAULT 'Paid',
  `order_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'public/logos/1668601255.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` bigint(20) UNSIGNED NOT NULL,
  `message_user_name` varchar(255) NOT NULL,
  `message_user_email` varchar(255) NOT NULL,
  `message_user_phone` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `message_reply` text DEFAULT NULL,
  `message_reply_by` text DEFAULT NULL,
  `message_status` text NOT NULL DEFAULT 'Unseen',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `message_user_name`, `message_user_email`, `message_user_phone`, `message`, `message_reply`, `message_reply_by`, `message_status`, `created_at`, `updated_at`) VALUES
(1, 'Sumit', 'mutasimnaib0@gmail.com', '12312312312', 'dsadsfdsf', NULL, NULL, 'Seen', '2022-11-25 13:07:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2022_11_16_180539_create_logos_table', 2),
(10, '2022_11_17_114844_create_categories_table', 3),
(11, '2022_11_17_162634_create_services_table', 4),
(12, '2022_11_18_092754_create_blogs_table', 5),
(13, '2022_11_18_131023_create_customers_table', 6),
(14, '2022_11_20_102918_create_cart_table', 7),
(15, '2022_11_21_182612_create_customer_orders_table', 8),
(16, '2022_11_21_182701_create_order_services_table', 8),
(18, '2022_11_22_195715_create_reviews_table', 9),
(19, '2022_11_25_184827_create_messages_table', 10),
(20, '2022_11_25_191638_create_contacts_table', 11),
(21, '2022_11_26_122309_create_quotes_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `o_customer_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `currency` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_services`
--

CREATE TABLE `order_services` (
  `os_id` bigint(20) UNSIGNED NOT NULL,
  `os_customer_id` int(11) NOT NULL,
  `os_order_id` int(11) NOT NULL,
  `os_service_id` int(11) NOT NULL,
  `os_service_cost` double(8,2) NOT NULL,
  `os_service_quantity` int(11) NOT NULL,
  `os_service_discount` double(8,2) NOT NULL,
  `os_service_discount_cost` double(8,2) NOT NULL,
  `os_service_total_cost` double NOT NULL,
  `os_technician_name` varchar(255) DEFAULT NULL,
  `os_technician_phone` varchar(255) DEFAULT NULL,
  `os_service_date` date DEFAULT NULL,
  `os_status` text NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `quote_id` bigint(20) UNSIGNED NOT NULL,
  `quote_author` varchar(255) NOT NULL,
  `quote_details` text NOT NULL,
  `quote_author_image` varchar(255) NOT NULL,
  `quote_status` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`quote_id`, `quote_author`, `quote_details`, `quote_author_image`, `quote_status`, `created_at`, `updated_at`) VALUES
(2, 'John Keats', 'I love you the more in that I believe you had liked me for my own sake and for nothing else', 'public/quotes/1669449771.jpg', 'Enable', '2022-11-26 08:02:51', NULL),
(3, 'John Keats', 'I love you the more in that I believe you had liked me for my own sake and for nothing else', 'public/quotes/1669450824.jpg', 'Enable', '2022-11-26 08:20:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` bigint(20) UNSIGNED NOT NULL,
  `review_customer_id` int(11) NOT NULL,
  `review_category_id` int(11) NOT NULL,
  `review` text NOT NULL,
  `review_status` text NOT NULL DEFAULT 'Disable',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `service_cat_id` int(11) NOT NULL,
  `service_cat_name` varchar(255) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_cost` double(8,2) NOT NULL,
  `service_discount` double(8,2) NOT NULL,
  `service_unit` text NOT NULL,
  `service_discount_cost` double(8,2) NOT NULL,
  `service_details` text NOT NULL,
  `service_status` text NOT NULL DEFAULT 'Enable',
  `service_delete` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_cat_id`, `service_cat_name`, `service_name`, `service_cost`, `service_discount`, `service_unit`, `service_discount_cost`, `service_details`, `service_status`, `service_delete`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ac Servicing', 'Ac Jet Wash', 200.00, 10.00, 'Unit', 180.00, '<p>dfasdasdsasfsdfsdfsdfsdfsdfsdfsdf</p>', 'Enable', 0, '2022-11-17 10:52:16', '2022-11-19 09:55:00'),
(2, 1, 'Ac Servicing', 'Ac Master Service', 200.00, 50.00, 'Piece', 100.00, '<p>No Need</p>', 'Enable', 0, '2022-11-19 09:37:56', '2022-11-19 09:55:43'),
(3, 2, 'Gas stove repair', 'Gas Stove Leak Repair', 300.00, 0.00, 'Piece', 300.00, '<p>No Need</p>', 'Enable', 0, '2022-11-19 10:01:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` int(11) DEFAULT NULL COMMENT '1=Super Admin , 2=Admin',
  `status` text NOT NULL DEFAULT 'Enable',
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `gender`, `image`, `address`, `email_verified_at`, `role`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'SUPER-1', 'super@gmail.com', '01234567890', 'Male', 'public/user_images/1668595245.jpg', 'Dhaka', NULL, 1, 'Enable', '$2y$10$RHRd1S7QqdVSLw.vnwf5Qu4chwYzGmnm.GUtuzNw8Dt3zARaPi7Sy', NULL, '2022-11-16 05:46:44', '2022-11-16 11:10:51'),
(6, 'ADMIN-1', 'admin@gmail.com', '12312312312', 'Male', 'public/user_images/1668594214.jpg', 'Dhaka', NULL, 2, 'Enable', '$2y$10$dtdtYqx16kI.loDpCQKmleChH/UygUAn7eBRWYVuIwRw3/EU.Rk3K', NULL, '2022-11-16 10:23:35', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_services`
--
ALTER TABLE `order_services`
  ADD PRIMARY KEY (`os_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`quote_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_services`
--
ALTER TABLE `order_services`
  MODIFY `os_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `quote_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
