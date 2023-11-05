-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2023 at 02:37 PM
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
  `tag` varchar(50) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `rating` varchar(11) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `trailer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `name`, `movie_banner`, `tag`, `duration`, `rating`, `description`, `trailer`) VALUES
(1, 'Avatar: The Way of Water', 'movie_avatar.png', 'Now Showing', '3h 12m', 'PG 13', 'Jake Sully and Ney\'tiri have formed a family and are doing everything to stay together. However, they must leave their home and explore the regions of Pandora. When an ancient threat resurfaces, Jake must fight a difficult war against the humans.\r\n\r\n', 'trailer_avatar.mp4'),
(2, 'Talk to me', 'movie_talktome.png', 'Advance Sales', '1h 35m', 'NC 16', 'When a group of friends discover how to conjure spirits with an embalmed hand, they become hooked on the new thrill and high-stakes party game -- until one of them goes too far and unleashes terrifying supernatural forces.', 'trailer_talktome.mp4'),
(8, 'No Hard Feelings', 'movie_nohardfeelings.png', 'Now Showing', '1h 43m', 'M 18', 'On the brink of losing her childhood home, a desperate woman agrees to date a wealthy couple\'s introverted and awkward 19-year-old son. However, he proves to be more of a challenge than she expected, and time is running out before she loses it all.', 'trailer_nhf.mp4'),
(9, 'Leo:Bloody Sweet', 'movie_leo.png', 'Advance Sales', '2h 44m', 'NC 16', 'The film follows Parthi, a café owner \r\nand animal rescuer in Theog, who is pursued by gangsters Antony and Harold Das who suspect him to be Antony\'s estranged son, Leo.', 'trailer_leo.mp4'),
(10, 'Pain Hustlers', 'movie_painhustlers.png', 'Advance Sales', '2h 2m', 'PG 13', 'After losing her job, a woman who\'s struggling to raise her daughter takes a job out of desperation. She begins work at a failing pharmaceutical startup, but what she doesn\'t anticipate is the dangerous racketeering scheme she\'s suddenly entered.', 'trailer_painhustlers.mp4'),
(11, 'Ballerina', 'movie_ballerina.png', 'Now Showing', '1h 33m', 'PG 13', 'Grieving the loss of a best friend she could not protect, former bodyguard Ok-ju sets out to fulfil her dear friend\'s last wish: sweet, sweet revenge.', 'trailer_ballerina.mp4'),
(12, 'The Nun II', 'movie_thenun.png', 'Now Showing', '1h 50m', 'NC 16', 'In 1956 France, a priest is violently murdered, and Sister Irene begins to investigate. She once again comes face-to-face with a powerful evil.', 'trailer_thenun.mp4'),
(13, 'Foe', 'movie_foe', 'Advance Sales', '1h 48m', 'PG 13', 'Hen and Junior\'s quiet life is thrown into turmoil when an uninvited stranger shows up at their door with a startling proposal.', 'trailer_foe.mp4'),
(14, 'Dumb Money', 'movie_dumbmoney', 'Advance Sales', '1h 44m', 'M 18', 'Everyday people flip the script on Wall Street and get rich by turning GameStop into one of the world\'s hottest companies. In the middle of everything is Keith Gill, a regular guy who starts it all by sinking his life savings into the stock. When his social media posts start blowing up, so does his life and the lives of everyone following him. As a stock tip becomes a movement, everyone gets wealthy -- until the billionaires fight back and both sides find their worlds turned upside down.', 'trailer_dumbmoney.mp4\r\n'),
(15, 'Elemental', 'movie_elemental.png', 'Now Showing', '1h 42m', 'PG 13', 'In a city where fire, water, land, and air residents live together, a fiery young woman and a go-with-the-flow guy discover something elemental: how much they actually have in common.', 'trailer_elemental.mp4');

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
