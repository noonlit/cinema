-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 09 Mai 2016 la 07:32
-- Versiune server: 5.7.12
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinemadatabase`
--

INSERT INTO `movies` (`id`, `title`, `year`, `cast`, `duration`, `poster`, `link_imdb`, `search_title`) VALUES
(1, 'Romeo and Julieta', 1996, 'Romeo,Julieta', 2, 'posterRomeoSiJulieta', 'http://www.imdb.com/title/tt0117509/', 'romeo and julieta'),
(2, 'Batman vs Superman', 2016, 'Batman,Superman', 2, 'posterBatmanVsSuperman', 'http://www.imdb.com/title/tt5602908/?ref_=fn_al_tt_2', 'batman vs superman'),
(3, 'Warcraft', 2016, 'Travis Fimmel,Ben Foster', 2, 'posterWarcraft', 'http://www.imdb.com/title/tt0803096/?ref_=nv_sr_1', 'warcraft'),
(4, 'Django Unchained', 2012, 'Jamix Foxx,Christoph Waltz', 2, 'posterDjangoUnchained', 'http://www.imdb.com/title/tt1853728/?ref_=nv_sr_1', 'django unchained'),
(5, 'Fight Club', 1999, 'Brad Pitt,Edward Norton', 2, 'posterFightClub', 'http://www.imdb.com/title/tt0137523/?ref_=tt_rec_tt', 'fight club');

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Comedy'),
(2, 'Action'),
(3, 'Drama'),
(4, 'SF'),
(5, 'Thriler'),
(6, 'Horror');

INSERT INTO `rooms` (`id`, `name`, `capacity`) VALUES
(1, 'S01', 100),
(2, 'S02', 123),
(3, 'S03', 45),
(4, 'A01', 421),
(5, 'A02', 15);

INSERT INTO `users` (`id`, `password`, `email`, `active`, `role`) VALUES
(1, 'parola', 'mihai@gmail.com', 1, 1),
(2, 'parola', 'cioban@gmail.com', 1, 1),
(3, 'parola', 'gulas@gmail.com', 0, 1),
(4, 'parola', 'robert@gmail.com', 1, 1),
(5, 'parola', 'iarut@gmail.com', 1, 1);


INSERT INTO `movie_to_genres` (`movie_id`, `genre_id`) VALUES
(1, 2),
(2, 2),
(3, 3),
(4, 4),
(5, 6);

INSERT INTO `schedules` (`id`, `date`, `time`, `remaining_seats`, `ticket_price`, `room_id`, `movie_id`) VALUES
(1, '2016-05-08', '12:00:00', 2, 1, 1, 1),
(2, '2016-05-09', '14:00:00', 5, 1, 2, 3),
(3, '2016-05-09', '16:00:00', 10, 1, 3, 2),
(4, '2016-05-10', '12:00:00', 5, 1, 4, 5),
(5, '2016-05-10', '18:00:00', 15, 1, 5, 4),
(6, '2016-05-10', '18:00:00', 10, 1, 3, 5);

