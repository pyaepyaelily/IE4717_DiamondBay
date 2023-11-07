-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2023 at 03:03 PM
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
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `movie_banner` varchar(100) NOT NULL,
  `release_date` varchar(1000) NOT NULL,
  `tag` varchar(50) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `languages` varchar(1000) NOT NULL,
  `rating` varchar(11) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `trailer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `name`, `movie_banner`, `release_date`, `tag`, `duration`, `languages`, `rating`, `description`, `trailer`) VALUES
(1, 'Avatar: The Way of Water', 'movie_avatar.png', '16 December 2022', 'Now Showing', '3h 12m', 'English, English (Chinese Sub)', 'PG 13', 'Jake Sully and Ney\'tiri have formed a family and are doing everything to stay together. However, they must leave their home and explore the regions of Pandora. When an ancient threat resurfaces, Jake must fight a difficult war against the humans.\r\n\r\n', 'trailer_avatar.mp4'),
(2, 'Talk to me', 'movie_talktome.png', '27 December 2023', 'Advance Sales', '1h 35m', '', 'NC 16', 'When a group of friends discover how to conjure spirits with an embalmed hand, they become hooked on the new thrill and high-stakes party game -- until one of them goes too far and unleashes terrifying supernatural forces.', 'trailer_talktome.mp4'),
(8, 'No Hard Feelings', 'movie_nohardfeelings.png', '23 June 2023', 'Now Showing', '1h 43m', 'English, English (Chinese Sub)', 'M 18', 'On the brink of losing her childhood home, a desperate woman agrees to date a wealthy couple\'s introverted and awkward 19-year-old son. However, he proves to be more of a challenge than she expected, and time is running out before she loses it all.', 'trailer_nhf.mp4'),
(9, 'Leo:Bloody Sweet', 'movie_leo.png', '2 December 2023', 'Advance Sales', '2h 44m', 'Tamil, Tamil (Eng sub), Hindi (Eng Sub)', 'NC 16', 'The film follows Parthi, a café owner \r\nand animal rescuer in Theog, who is pursued by gangsters Antony and Harold Das who suspect him to be Antony\'s estranged son, Leo.', 'trailer_leo.mp4'),
(12, 'The Nun II', 'movie_thenun.png', '7 September 2023', 'Now Showing', '1h 50m', 'English, English (Chinese Sub)', 'NC 16', 'In 1956 France, a priest is violently murdered, and Sister Irene begins to investigate. She once again comes face-to-face with a powerful evil.', 'trailer_thenun.mp4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
