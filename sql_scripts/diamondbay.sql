-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2023 at 02:11 PM
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
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `show_time_id` int(11) NOT NULL,
  `hall_id` int(11) NOT NULL,
  `seat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `movie_id`, `show_time_id`, `hall_id`, `seat_id`) VALUES
(47, 1, 1, 1, 1),
(48, 1, 1, 1, 6),
(49, 1, 1, 1, 2),
(50, 2, 7, 1, 40),
(51, 2, 7, 1, 41),
(52, 2, 7, 1, 40),
(53, 2, 7, 1, 43),
(54, 2, 7, 1, 43),
(55, 2, 7, 1, 43),
(56, 2, 7, 1, 43),
(57, 2, 7, 1, 41),
(58, 2, 7, 1, 42),
(59, 1, 3, 1, 21),
(60, 1, 3, 1, 22);

-- --------------------------------------------------------

--
-- Table structure for table `gifts`
--

CREATE TABLE `gifts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` text NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `terms` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gifts`
--

INSERT INTO `gifts` (`id`, `name`, `type`, `description`, `image`, `terms`) VALUES
(1, 'Gift Voucher (Brown)', 'gift', '$120.00 (Batch of 10)', 'voucher_brown.png', 'Each voucher is priced at S$12.00 and sold in sets of 10,\r\nAvailable for purchase at any Diamond Bay Box Office,\r\nValid for 6 months from date of issue,\r\nValid for any movie on all days at any Diamond Bay in Singapore'),
(2, 'IMAX Gift Voucher', 'gift', '$50.00 (a pair)', 'voucher_imax.png', 'Voucher is priced at S$50 for a pair,\r\nAvailable for purchase at any Diamond Bay Box Office,\r\nValid for 12 months from date of issue,\r\nValid for any movie on all days at any Diamond Bay IMAX in Singapore'),
(3, 'Premiere Gift Voucher', 'gift', '$70.00 (a pair)', 'voucher_premiere.png', 'Voucher is priced at S$70 for a pair (Comes with an exquisitely designed holder),  \r\nAvailable for purchase at any Box Office Counter,\r\nValid for a 6 months from date of issue,  \r\nValid for any movie on all days at Diamond Bay premiere'),
(4, 'MovieBites Popcorn Combo Voucher', 'corporate', '$17.00', 'corporate_1.png', 'Each voucher is priced at S$17.00 with a minimum order of 100 pieces and order must be in denominations of 10,\r\nIncludes one (1) Movie Voucher and one (1) Regular Popcorn Combo Voucher,\r\nValid for 12 months from date of issue,\r\nValid for any movie on all days at any Diamond Bay in Singapore'),
(5, 'IMAX Movie Voucher', 'corporate', '$23.00', 'corporate_2.png', 'This movie voucher is priced at $23 with a minimum order of 100 pieces and order must be in pairs,\r\nValid for 12 months from date of issue,\r\nValid for any movie on all days at any Diamond Bay IMAX in Singapore'),
(6, 'Movie Voucher (Blue)', 'corporate', '$11.50', 'corporate_3.png', 'Each voucher is priced at S$11.50 each with a minimum order of 100 pieces and order must be in denominations of 10,\r\nValid for 12 months from date of issue,\r\nValid for any movie on all days at any Diamond Bay in Singapore');

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

CREATE TABLE `hall` (
  `id` int(11) NOT NULL,
  `hall_num` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `seat_num` varchar(20) NOT NULL,
  `available` tinyint(1) NOT NULL,
  `show_time_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`id`, `hall_num`, `type`, `price`, `seat_num`, `available`, `show_time_id`) VALUES
(1, 1, 'Adult', 13.00, 'A1', 1, 1),
(2, 1, 'Adult', 13.00, 'A2', 1, 1),
(3, 1, 'Adult', 13.00, 'A3', 0, 1),
(4, 1, 'Adult', 13.00, 'A4', 0, 1),
(5, 1, 'Adult', 13.00, 'A5', 0, 1),
(6, 1, 'Adult', 13.00, 'B1', 1, 1),
(7, 1, 'Adult', 13.00, 'B2', 0, 1),
(8, 1, 'Adult', 13.00, 'B3', 0, 1),
(9, 1, 'Adult', 13.00, 'B4', 1, 1),
(10, 1, 'Adult', 13.00, 'B5', 1, 1),
(11, 2, 'Adult', 13.00, 'A1', 0, 4),
(12, 2, 'Adult', 13.00, 'A2', 1, 4),
(13, 2, 'Adult', 13.00, 'A3', 0, 4),
(14, 2, 'Adult', 13.00, 'A4', 0, 4),
(15, 1, 'Adult', 13.00, 'A1', 1, 3),
(16, 1, 'Adult', 13.00, 'A2', 1, 3),
(17, 1, 'Adult', 13.00, 'A3', 0, 3),
(18, 1, 'Adult', 13.00, 'A4', 0, 3),
(19, 1, 'Adult', 13.00, 'A5', 0, 3),
(20, 1, 'Adult', 13.00, 'B1', 1, 3),
(21, 1, 'Adult', 13.00, 'B2', 1, 3),
(22, 1, 'Adult', 13.00, 'B3', 1, 3),
(23, 1, 'Adult', 13.00, 'B4', 1, 3),
(24, 1, 'Adult', 13.00, 'B5', 1, 3),
(25, 1, 'Adult', 13.00, 'A1', 0, 2),
(26, 1, 'Adult', 13.00, 'A2', 0, 2),
(27, 1, 'Adult', 13.00, 'A3', 0, 2),
(28, 1, 'Adult', 13.00, 'A4', 0, 2),
(29, 1, 'Adult', 13.00, 'A5', 0, 2),
(30, 2, 'Adult', 13.00, 'A1', 0, 6),
(31, 2, 'Adult', 13.00, 'A2', 1, 6),
(32, 2, 'Adult', 13.00, 'A3', 0, 6),
(33, 2, 'Adult', 13.00, 'A4', 0, 6),
(34, 1, 'Adult', 13.00, 'A1', 1, 7),
(35, 1, 'Adult', 13.00, 'A2', 1, 7),
(36, 1, 'Adult', 13.00, 'A3', 0, 7),
(37, 1, 'Adult', 13.00, 'A4', 0, 7),
(38, 1, 'Adult', 13.00, 'A5', 0, 7),
(39, 1, 'Adult', 13.00, 'B1', 1, 7),
(40, 1, 'Adult', 13.00, 'B2', 1, 7),
(41, 1, 'Adult', 13.00, 'B3', 1, 7),
(42, 1, 'Adult', 13.00, 'B4', 0, 7),
(43, 1, 'Adult', 13.00, 'B5', 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `movie_banner` varchar(100) NOT NULL,
  `tag` varchar(50) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `rating` varchar(11) NOT NULL,
  `language` varchar(1000) NOT NULL,
  `release_date` varchar(100) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `trailer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `name`, `movie_banner`, `tag`, `duration`, `rating`, `language`, `release_date`, `description`, `trailer`) VALUES
(1, 'Avatar: The Way of Water', 'movie_avatar.png', 'Now Showing', '3h 12m', 'PG 13', 'English, English (Chinese Sub)', '16 September 2023', 'Jake Sully and Ney\'tiri have formed a family and are doing everything to stay together. However, they must leave their home and explore the regions of Pandora. When an ancient threat resurfaces, Jake must fight a difficult war against the humans.\r\n\r\n', 'trailer_avatar.mp4'),
(2, 'Talk to me', 'movie_talktome.png', 'Advance Sales', '1h 35m', 'NC 16', 'English, English (Chinese Sub)', '23 December 2023', 'When a group of friends discover how to conjure spirits with an embalmed hand, they become hooked on the new thrill and high-stakes party game -- until one of them goes too far and unleashes terrifying supernatural forces.', 'trailer_talktome.mp4'),
(8, 'No Hard Feelings', 'movie_nohardfeelings.png', 'Now Showing', '1h 43m', 'M 18', 'English, English (Chinese Sub)', '23 July 2023', 'On the brink of losing her childhood home, a desperate woman agrees to date a wealthy couple\'s introverted and awkward 19-year-old son. However, he proves to be more of a challenge than she expected, and time is running out before she loses it all.', 'trailer_nhf.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `online_deals`
--

CREATE TABLE `online_deals` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `online_deals`
--

INSERT INTO `online_deals` (`id`, `name`, `price`, `description`, `image`) VALUES
(1, 'Combo 1', 12.00, '1x Large Popcorn, 1x Regular Drink & 1x Sweets', 'combo1.jpg'),
(2, 'Combo 2', 17.00, '1x Large Popcorn, 1x Regular Drink & 1x Nachos', 'combo2.jpg'),
(3, 'Combo 3', 17.00, '1x Large Popcorn, 1x Regular Drink & 1x Hotdog', 'combo3.jpg');

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

-- --------------------------------------------------------

--
-- Table structure for table `show_time`
--

CREATE TABLE `show_time` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `theatre` text NOT NULL,
  `hall` int(1) NOT NULL,
  `movie_date` date NOT NULL,
  `movie_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `show_time`
--

INSERT INTO `show_time` (`id`, `movie_id`, `theatre`, `hall`, `movie_date`, `movie_time`) VALUES
(1, 1, 'Compass One', 1, '2023-11-18', '09:00:00'),
(2, 1, 'Jurong Point', 1, '2023-11-18', '09:00:00'),
(3, 1, 'Compass One', 1, '2023-11-18', '13:00:00'),
(4, 8, 'Compass One', 2, '2023-11-17', '15:00:00'),
(6, 8, 'Compass One', 2, '2023-11-19', '13:00:00'),
(7, 2, 'Compass One', 1, '2023-11-30', '19:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gifts`
--
ALTER TABLE `gifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hall`
--
ALTER TABLE `hall`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hall_show_time` (`show_time_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_deals`
--
ALTER TABLE `online_deals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `show_time`
--
ALTER TABLE `show_time`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_show_time_movie` (`movie_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `gifts`
--
ALTER TABLE `gifts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hall`
--
ALTER TABLE `hall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `online_deals`
--
ALTER TABLE `online_deals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `show_time`
--
ALTER TABLE `show_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hall`
--
ALTER TABLE `hall`
  ADD CONSTRAINT `fk_hall_show_time` FOREIGN KEY (`show_time_id`) REFERENCES `show_time` (`id`);

--
-- Constraints for table `show_time`
--
ALTER TABLE `show_time`
  ADD CONSTRAINT `fk_show_time_movie` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
