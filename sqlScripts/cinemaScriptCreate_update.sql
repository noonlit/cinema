-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2016 at 10:21 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinemadatabase`
--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `year`, `cast`, `duration`, `poster`, `link_imdb`, `search_title`) VALUES
(1, 'Me Before you', 2016, 'Jojo Moyes, Scott Neustadter, Michael H. Weber', 2, '/cinema/web/img/movie/poster/Me-Before-You_poster.jpg', 'http://www.imdb.com/title/tt0117509/', ''),
(2, 'Warcraft', 2016, 'Travis Fimmel, Ben Foster', 2, '/cinema/web/img/movie/poster/Warcraft_poster.jpg', 'http://www.imdb.com/title/tt0803096/', ''),
(3, 'Django Unchained', 2012, 'Jamie Foxx, Christoph Waltz', 2, '/cinema/web/img/movie/poster/Django-Unchained_poster.jpg', 'http://www.imdb.com/title/tt1853728/', ''),
(4, '28 Days Later', 2002, 'Cillian Murphy, Naomie Harris, Christopher Eccleston ', 2, '/cinema/web/img/movie/poster/28-Days-Later_poster.jpg', 'http://www.imdb.com/title/tt0289043/', ''),
(5, 'Black Swan', 2010, 'Natalie Portman, Mila Kunis, Vincent Cassel ', 2, '/cinema/web/img/movie/poster/Black-Swan_poster.png', 'http://www.imdb.com/title/tt0947798/', ''),
(6, 'The Prestige', 2006, 'Christian Bale, Hugh Jackman, Scarlett Johansson ', 2, '/cinema/web/img/movie/poster/The-Prestige_poster.jpg', 'http://www.imdb.com/title/tt0482571', ''),
(7, 'Captain America: Civil War', 2016, 'Chris Evans, Robert Downey Jr., Scarlett Johansson ', 2, '/cinema/web/img/movie/poster/Civil-War_poster.jpg', 'http://www.imdb.com/title/tt3498820/', ''),
(8, 'Guardians of the Galaxy', 2014, 'Chris Pratt, Vin Diesel, Bradley Cooper, Zoe Saldana', 2, '/cinema/web/img/movie/poster/Guardians_poster.jpg', 'http://www.imdb.com/title/tt2015381/', ''),
(9, 'Ex Machina', 2015, 'Alicia Vikander, Domhnall Gleeson, Oscar Isaac ', 2, '/cinema/web/img/movie/poster/Ex-Machina_poster.jpg', 'http://www.imdb.com/title/tt0470752/', ''),
(10, 'Interstellar', 2014, 'Matthew McConaughey, Anne Hathaway, Jessica Chastain', 2, '/cinema/web/img/movie/poster/Interstellar_poster.jpg', 'http://www.imdb.com/title/tt0816692/', '');

-- --------------------------------------------------------

--
-- Dumping data for table `movie_to_genres`
--

INSERT INTO `movie_to_genres` (`movie_id`, `genre_id`) VALUES
(1, 3),
(2, 2),
(2, 7),
(2, 8),
(3, 3),
(4, 6),
(4, 5),
(5, 3),
(5, 5),
(9, 3),
(9, 4),
(6, 3),
(7, 2),
(7, 4),
(8, 2),
(8, 4),
(10, 3),
(10, 4);

-- --------------------------------------------------------

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `capacity`) VALUES
(1, 'S01', 100),
(2, 'S02', 123),
(3, 'S03', 45),
(4, 'A01', 421),
(5, 'A02', 15);

-- --------------------------------------------------------


INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Comedy'),
(2, 'Action'),
(3, 'Drama'),
(4, 'SF'),
(5, 'Thriler'),
(6, 'Horror'),
(7, 'Adventure'),
(8, 'Fantasy');

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `date`, `time`, `remaining_seats`, `ticket_price`, `room_id`, `movie_id`) VALUES
(4, '2016-05-28', '11:00:00', 100, 1, 1, 1),
(5, '2016-06-08', '18:00:00', 123, 1, 2, 2),
(6, '2016-05-24', '12:00:00', 45, 1, 3, 3),
(8, '2016-05-25', '17:00:00', 421, 1, 4, 3),
(9, '2016-05-23', '15:00:00', 421, 1, 4, 4),
(10, '2016-05-31', '09:00:00', 15, 1, 5, 5),
(11, '2016-05-18', '18:00:00', 15, 1, 5, 6),
(12, '2016-05-22', '12:00:00', 100, 1, 1, 7),
(13, '2016-05-16', '18:00:00', 100, 1, 1, 8),
(14, '2016-05-17', '18:00:00', 123, 1, 2, 9),
(15, '2016-05-30', '15:00:00', 15, 1, 5, 10);

-- --------------------------------------------------------

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `email`, `active`, `role`) VALUES
(1, 'WSfrshzy6IKS6cPU96WfEjrow3FWCoxgqt8N6yGMxxa8gGW99/T5knbZHz4e/AxrQi5H4BWNEZlK9x1/d35oRg==', 'root@root.com', 1, 1);
