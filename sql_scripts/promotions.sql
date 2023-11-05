-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2023 at 01:30 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diamondbay`
--

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(100) NOT NULL,
  `promo_name` varchar(100) NOT NULL,
  `promo_image` varchar(50) NOT NULL,
  `promo_info` mediumtext NOT NULL,
  `terms_conditions` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `promo_name`, `promo_image`, `promo_info`, `terms_conditions`) VALUES
(0, 'Spook-Tastic Halloween Deal! (Exclusive for Students!)', 'halloweendeal.png', 'Gather your squad for a Halloween movie night like no other! We\'re treating students to a fang-tastic deal that\'s too good to pass up. When you and your friends come in a group of four and flash your student IDs to our friendly staff, you\'ll receive a wicked 15% discount on your movie tickets. It\'s the perfect way to celebrate the season of scares with your favorite people.', 'Ensure that you are a student with a valid student pass. This deal is only available from 31 October to 15 November 2023. Screenshots or images of ID proof will not be accepted. Please bring your physical ID for verification purposes.'),
(1, 'Early Bird Promotion!', 'earlybirddeal.png', 'Be the first to catch the latest blockbuster when it hits the screen! We\'re thrilled to offer you an incredible Early Bird deal that you won\'t want to miss. Purchase your movie tickets within the first 12 hours of release and enjoy an amazing 5% discount off your total bill. It\'s the perfect way to experience the magic of cinema, right from the very beginning.\r\n\r\nUse code EARLYBIRD at the checkout to enjoy this deal! It will only work for the first 12 hours of movie release.', '- Promotion is only valid for movies under the Advance Sales section.\r\n- Valid only for first 12 hours of movie release.\r\n- Limited redemption to only once per customer.\r\n- This promotion is only valid for online purchase, and will be rejected if purchased in-store.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
