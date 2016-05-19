-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2016 at 10:21 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19
    
use cinemadatabase;

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

INSERT INTO `movies` (`title`, `year`, `cast`, `duration`, `poster`, `link_imdb`, `search_title`) VALUES
    ('Me Before You', 2016, 'Jojo Moyes, Scott Neustadter, Michael H. Weber', 2, '/img/movie/poster/Me_Before_You_poster.jpg', 'http://www.imdb.com/title/tt0117509/', 'me before you'),
    ('Warcraft', 2016, 'Travis Fimmel, Ben Foster', 2, '/img/movie/poster/Warcraft_poster.jpg', 'http://www.imdb.com/title/tt0803096/', 'warcraft'),
    ('Django Unchained', 2012, 'Jamie Foxx, Christoph Waltz', 2, '/img/movie/poster/Django_Unchained_poster.jpg', 'http://www.imdb.com/title/tt1853728/', 'django unchained'),
    ('28 Days Later', 2002, 'Cillian Murphy, Naomie Harris, Christopher Eccleston ', 2, '/img/movie/poster/28_Days_Later_poster.jpg', 'http://www.imdb.com/title/tt0289043/', '28 days later'),
    ('Black Swan', 2010, 'Natalie Portman, Mila Kunis, Vincent Cassel ', 2, '/img/movie/poster/Black_Swan_poster.png', 'http://www.imdb.com/title/tt0947798/', 'black swan'),
    ('The Prestige', 2006, 'Christian Bale, Hugh Jackman, Scarlett Johansson ', 2, '/img/movie/poster/The_Prestige_poster.jpg', 'http://www.imdb.com/title/tt0482571', 'the prestige'),
    ('Captain America: Civil War', 2016, 'Chris Evans, Robert Downey Jr., Scarlett Johansson ', 2, '/img/movie/poster/Civil_War_poster.jpg', 'http://www.imdb.com/title/tt3498820/', 'captain america civil war'),
    ('Guardians of the Galaxy', 2014, 'Chris Pratt, Vin Diesel, Bradley Cooper, Zoe Saldana', 2, '/img/movie/poster/Guardians_of_the_Galaxy_poster.jpg', 'http://www.imdb.com/title/tt2015381/', 'guardians of the galaxy'),
    ('Ex Machina', 2015, 'Alicia Vikander, Domhnall Gleeson, Oscar Isaac ', 2, '/img/movie/poster/Ex_Machina_poster.jpg', 'http://www.imdb.com/title/tt0470752/', 'ex machina'),
    ('Interstellar', 2014, 'Matthew McConaughey, Anne Hathaway, Jessica Chastain', 2, '/img/movie/poster/Interstellar_poster.jpg', 'http://www.imdb.com/title/tt0816692/', 'interstellar'),
    ('Hotel Transylvania 2', 2015, 'Adam Sandler, Andy Samberg, Selena Gomez', 2, '/img/movie/poster/Hotel _Transylvania_2_poster.jpg', 'http://www.imdb.com/title/tt2510894/', 'hotel transylvania 2'),
    ('Mr. Holmes', 2015, 'Ian McKellen, Laura Linney', 2, '/img/movie/poster/Mr._Holmes_poster.jpg', 'http://www.imdb.com/title/tt3168230/', 'mr holmes'),
    ('Southpaw', 2015, 'Jake Gyllenhaal, Rachel McAdams, Forest Whitaker', 2, '/img/movie/poster/Southpaw_poster.jpg', 'http://www.imdb.com/title/tt1798684/', 'southpaw'),
    ('Look Who\'s Back', 2015, 'Oliver Masucci, Marc-Marvin Israel', 2, '/img/movie/poster/Look_Who\'s_Back_poster.jpg', 'http://www.imdb.com/title/tt4176826/', 'look who s back'),
    ('Minions', 2015, 'Sandra Bullock, Jon Hamm, Michael Keaton', 2, '/img/movie/poster/Minions_poster.jpg', 'http://www.imdb.com/title/tt2293640/', 'minions'),
    ('Despicable Me 2', 2013, 'Steve Carell, Kristen Wiig, Benjamin Bratt', 2, '/img/movie/poster/Despicable_Me_2_poster.jpg', 'http://www.imdb.com/title/tt1690953/', 'despicable me 2'),
    ('Despicable Me', 2010, 'Russell Brand, Kristen Wiig, Jason Segel', 2, '/img/movie/poster/Despicable_Me_poster.jpg', 'http://www.imdb.com/title/tt1323594/', 'despicable me'),
    ('Shutter Island', 2010, 'Leonardo DiCaprio, Mark Ruffalo, Ben Kingsley', 2, '/img/movie/poster/Shutter_Island_poster.jpg', 'http://www.imdb.com/title/tt1130884/', 'shutter island'),
    ('Penguins of Madagascar', 2014, 'Tom McGrath, Chris Miller', 2, '/img/movie/poster/Penguins_of_Madagascar_poster.jpg', 'http://www.imdb.com/title/tt1911658/', 'penguins of madagascar'),
    ('I Am Ali', 2014, 'Muhammad Ali Jnr', 2, '/img/movie/poster/I_Am_Ali_poster.jpg', 'http://www.imdb.com/title/tt4008652/', 'i am ali'),
    ('Prisoners', 2013, 'Hugh Jackman, Jake Gyllenhaal', 2, '/img/movie/poster/Prisoners_poster.jpg', 'http://www.imdb.com/title/tt1392214/', 'prisoners'),
    ('Nightcrawler', 2014, 'Jake Gyllenhaal, Michael Papajohn', 2, '/img/movie/poster/Nightcrawler_poster.jpg', 'http://www.imdb.com/title/tt2872718/', 'nightcrawler'),
    ('Seven Pounds', 2008, 'Will Smith, Rosario Dawson, Woody Harrelson', 2, '/img/movie/poster/Seven_Pounds_poster.jpg', 'http://www.imdb.com/title/tt0814314/', 'seven pounds'),
    ('Big Hero 6', 2014, 'Scott Adsit, Ryan Potter, Daniel Henney', 2, '/img/movie/poster/Big_Hero_6_poster.jpg', 'http://www.imdb.com/title/tt2245084/', 'big hero 6'),
    ('Public Enemies', 2009, 'David Wenham, Christian Stolte, Johnny Depp', 2, '/img/movie/poster/Public_Enemies_poster.jpg', 'http://www.imdb.com/title/tt1152836/', 'public enemies'),
    ('Fight Club', 1999, 'Edward Norton, Brad Pitt', 2, '/img/movie/poster/Fight_Club_poster.jpg', 'http://www.imdb.com/title/tt0137523/', 'fight club'),
    ('The Internship', 2013, 'Vince Vaughn, Owen Wilson, Rose Byrne', 2, '/img/movie/poster/The_Internship_poster.jpg', 'http://www.imdb.com/title/tt2557490/', 'the internship'),
    ('A Million Ways to Die in the West', 2010, 'Seth MacFarlane, Charlize Theron, Amanda Seyfried', 2, '/img/movie/poster/A_Million_Ways_to_Die_in_the_West_poster.jpg', 'http://www.imdb.com/title/tt2557490/', 'a million ways to die in the west'),
    ('Schindler\'s List', 1993, 'Liam Neeson, Ben Kingsley', 2, '/img/movie/poster/Schindler\'s_List_poster.jpg', 'http://www.imdb.com/title/tt0108052/', 'schindler s list'),
    ('Forrest Gump', 1994, 'Tom Hanks, Rebecca Williams, Sally Field', 2, '/img/movie/poster/Forrest_Gump_poster.jpg', 'http://www.imdb.com/title/tt0109830/', 'forrest gump'),
    ('Dallas Buyers Club', 2013, 'Matthew McConaughey, Jennifer Garner, Jared Leto', 2, '/img/movie/poster/Dallas_Buyers_Club_poster.jpg', 'http://www.imdb.com/title/tt0790636/', 'dallas buyers club'),
    ('Premium Rush', 2012, 'Joseph Gordon-Levitt, Dania Ramirez', 2, '/img/movie/poster/Premium_Rush_poster.jpg', 'http://www.imdb.com/title/tt1547234/', 'premium rush');

-- --------------------------------------------------------

--
-- Dumping data for table `movie_to_genres`
--

INSERT INTO `movie_to_genres` (`movie_id`, `genre_id`) VALUES
    (1, 3),
    (2, 2),
    (2, 7),
    (2, 8),
    (3, 2),
    (4, 6),
    (4, 5),
    (5, 3),
    (5, 5),
    (6, 3),
    (7, 2),
    (7, 4),
    (8, 2),
    (8, 4),
    (9, 2),
    (10, 3),
    (10, 4),
    (11, 8),
    (12, 3),
    (13, 2),
    (13, 3),
    (14, 1),
    (14, 6),
    (15, 8),
    (16, 8),
    (17, 8),
    (18, 2),
    (18, 5),
    (19, 8),
    (20, 3),
    (21, 3),
    (21, 5),
    (22, 3),
    (23, 7),
    (24, 1),
    (24, 8),
    (25, 2),
    (25, 5),
    (26, 3),
    (26, 5),
    (27, 1),
    (28, 1),
    (28, 7),
    (29, 3),
    (29, 5),
    (30, 1),
    (30, 3),
    (31, 2),
    (31, 3),
    (32, 2),
    (32, 7);

-- --------------------------------------------------------

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` ( `name`, `capacity`) VALUES
    ('SalaA1', 100),
    ('SalaA2', 123),
    ('SalaB1', 412),
    ('SalaB2', 15);

-- --------------------------------------------------------


INSERT INTO `genres` ( `name`) VALUES
    ('Comedy'),
    ('Action'),
    ('Drama'),
    ('SF'),
    ('Thriler'),
    ('Horror'),
    ('Adventure'),
    ('Fantasy');


--
-- Dumping data for table `schedules`
--
INSERT INTO `schedules` (`date`, `time`, `remaining_seats`, `ticket_price`, `room_id`, `movie_id`) VALUES
    ('2016-05-20', '10:00:00', 100, 10, 1, 1),
    ('2016-05-20', '14:00:00', 100, 10, 1, 4),
    ('2016-05-20', '18:00:00', 100, 10, 1, 7),
    ('2016-05-20', '20:00:00', 100, 10, 1, 10),
    ('2016-05-21', '08:00:00', 100, 10, 1, 13),
    ('2016-05-21', '10:00:00', 100, 10, 1, 16),
    ('2016-05-21', '12:00:00', 100, 10, 1, 19),
    ('2016-05-21', '16:00:00', 100, 10, 1, 22),
    ('2016-05-22', '14:00:00', 100, 10, 1, 25),
    ('2016-05-22', '16:00:00', 100, 10, 1, 28),
    ('2016-05-22', '18:00:00', 100, 10, 1, 31),
    ('2016-05-22', '20:00:00', 100, 10, 1, 2),
    ('2016-05-20', '10:00:00', 123, 10, 2, 18),
    ('2016-05-20', '14:00:00', 123, 10, 2, 5),
    ('2016-05-20', '16:00:00', 123, 10, 2, 8),
    ('2016-05-20', '20:00:00', 123, 10, 2, 11),
    ('2016-05-21', '08:00:00', 123, 10, 2, 14),
    ('2016-05-21', '10:00:00', 123, 10, 2, 17),
    ('2016-05-21', '08:00:00', 123, 10, 2, 20),
    ('2016-05-21', '16:00:00', 123, 10, 2, 23),
    ('2016-05-22', '12:00:00', 123, 10, 2, 26),
    ('2016-05-22', '16:00:00', 123, 10, 2, 29),
    ('2016-05-22', '18:00:00', 123, 10, 2, 32),
    ('2016-05-22', '20:00:00', 123, 10, 2, 3),
    ('2016-05-20', '08:00:00', 412, 10, 3, 3),
    ('2016-05-20', '14:00:00', 412, 10, 3, 9),
    ('2016-05-20', '12:00:00', 412, 10, 3, 11),
    ('2016-05-20', '20:00:00', 412, 10, 3, 12),
    ('2016-05-21', '10:00:00', 412, 10, 3, 17),
    ('2016-05-21', '10:00:00', 412, 10, 3, 15),
    ('2016-05-21', '12:00:00', 412, 10, 3, 22),
    ('2016-05-21', '14:00:00', 412, 10, 3, 27),
    ('2016-05-22', '12:00:00', 412, 10, 3, 29),
    ('2016-05-22', '16:00:00', 412, 10, 3, 30),
    ('2016-05-22', '08:00:00', 412, 10, 3, 31),
    ('2016-05-22', '20:00:00', 412, 10, 3, 1),
    ('2016-05-20', '12:00:00', 15, 10, 4, 4),
    ('2016-05-20', '14:00:00', 15, 10, 4, 7),
    ('2016-05-20', '16:00:00', 15, 10, 4, 10),
    ('2016-05-20', '18:00:00', 15, 10, 4, 12),
    ('2016-05-21', '12:00:00', 15, 10, 4, 16),
    ('2016-05-21', '10:00:00', 15, 10, 4, 15),
    ('2016-05-21', '14:00:00', 15, 10, 4, 20),
    ('2016-05-21', '20:00:00', 15, 10, 4, 21),
    ('2016-05-22', '10:00:00', 15, 10, 4, 28),
    ('2016-05-22', '14:00:00', 15, 10, 4, 24),
    ('2016-05-22', '18:00:00', 15, 10, 4, 23),
    ('2016-05-22', '20:00:00', 15, 10, 4, 6);
    

-- --------------------------------------------------------

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`password`, `email`, `active`, `role`) VALUES
	('WSfrshzy6IKS6cPU96WfEjrow3FWCoxgqt8N6yGMxxa8gGW99/T5knbZHz4e/AxrQi5H4BWNEZlK9x1/d35oRg==', 'root1@root.com', 1, 1),
	('WSfrshzy6IKS6cPU96WfEjrow3FWCoxgqt8N6yGMxxa8gGW99/T5knbZHz4e/AxrQi5H4BWNEZlK9x1/d35oRg==', 'root2@root.com', 1, 1),
	('WSfrshzy6IKS6cPU96WfEjrow3FWCoxgqt8N6yGMxxa8gGW99/T5knbZHz4e/AxrQi5H4BWNEZlK9x1/d35oRg==', 'root3@root.com', 1, 1),
	('WSfrshzy6IKS6cPU96WfEjrow3FWCoxgqt8N6yGMxxa8gGW99/T5knbZHz4e/AxrQi5H4BWNEZlK9x1/d35oRg==', 'root4@root.com', 1, 1),
	('WSfrshzy6IKS6cPU96WfEjrow3FWCoxgqt8N6yGMxxa8gGW99/T5knbZHz4e/AxrQi5H4BWNEZlK9x1/d35oRg==', 'root5@root.com', 1, 1),
	('WSfrshzy6IKS6cPU96WfEjrow3FWCoxgqt8N6yGMxxa8gGW99/T5knbZHz4e/AxrQi5H4BWNEZlK9x1/d35oRg==', 'user1@gmail.com', 1, -1),
	('WSfrshzy6IKS6cPU96WfEjrow3FWCoxgqt8N6yGMxxa8gGW99/T5knbZHz4e/AxrQi5H4BWNEZlK9x1/d35oRg==', 'user2@gmail.com', 1, -1),
	('WSfrshzy6IKS6cPU96WfEjrow3FWCoxgqt8N6yGMxxa8gGW99/T5knbZHz4e/AxrQi5H4BWNEZlK9x1/d35oRg==', 'user3@gmail.com', 1, -1),
	('WSfrshzy6IKS6cPU96WfEjrow3FWCoxgqt8N6yGMxxa8gGW99/T5knbZHz4e/AxrQi5H4BWNEZlK9x1/d35oRg==', 'user4@gmail.com', 1, -1),
	('WSfrshzy6IKS6cPU96WfEjrow3FWCoxgqt8N6yGMxxa8gGW99/T5knbZHz4e/AxrQi5H4BWNEZlK9x1/d35oRg==', 'user5@gmail.com', 1, -1),
	('WSfrshzy6IKS6cPU96WfEjrow3FWCoxgqt8N6yGMxxa8gGW99/T5knbZHz4e/AxrQi5H4BWNEZlK9x1/d35oRg==', 'user6@gmail.com', 1, -1),
	('WSfrshzy6IKS6cPU96WfEjrow3FWCoxgqt8N6yGMxxa8gGW99/T5knbZHz4e/AxrQi5H4BWNEZlK9x1/d35oRg==', 'user7@gmail.com', 1, -1),
	('WSfrshzy6IKS6cPU96WfEjrow3FWCoxgqt8N6yGMxxa8gGW99/T5knbZHz4e/AxrQi5H4BWNEZlK9x1/d35oRg==', 'user8@gmail.com', 1, -1),
	('WSfrshzy6IKS6cPU96WfEjrow3FWCoxgqt8N6yGMxxa8gGW99/T5knbZHz4e/AxrQi5H4BWNEZlK9x1/d35oRg==', 'user9@gmail.com', 1, -1),
	('WSfrshzy6IKS6cPU96WfEjrow3FWCoxgqt8N6yGMxxa8gGW99/T5knbZHz4e/AxrQi5H4BWNEZlK9x1/d35oRg==', 'user10@gmail.com', 1, -1),
	('WSfrshzy6IKS6cPU96WfEjrow3FWCoxgqt8N6yGMxxa8gGW99/T5knbZHz4e/AxrQi5H4BWNEZlK9x1/d35oRg==', 'user11@gmail.com', 1, -1),
	('WSfrshzy6IKS6cPU96WfEjrow3FWCoxgqt8N6yGMxxa8gGW99/T5knbZHz4e/AxrQi5H4BWNEZlK9x1/d35oRg==', 'user12@gmail.com', 1, -1),
	('WSfrshzy6IKS6cPU96WfEjrow3FWCoxgqt8N6yGMxxa8gGW99/T5knbZHz4e/AxrQi5H4BWNEZlK9x1/d35oRg==', 'user13@gmail.com', 1, -1),
	('WSfrshzy6IKS6cPU96WfEjrow3FWCoxgqt8N6yGMxxa8gGW99/T5knbZHz4e/AxrQi5H4BWNEZlK9x1/d35oRg==', 'user14@gmail.com', 1, -1),
	('WSfrshzy6IKS6cPU96WfEjrow3FWCoxgqt8N6yGMxxa8gGW99/T5knbZHz4e/AxrQi5H4BWNEZlK9x1/d35oRg==', 'user15@gmail.com', 1, -1),
	('WSfrshzy6IKS6cPU96WfEjrow3FWCoxgqt8N6yGMxxa8gGW99/T5knbZHz4e/AxrQi5H4BWNEZlK9x1/d35oRg==', 'user16@gmail.com', 1, -1),
	('WSfrshzy6IKS6cPU96WfEjrow3FWCoxgqt8N6yGMxxa8gGW99/T5knbZHz4e/AxrQi5H4BWNEZlK9x1/d35oRg==', 'user17@gmail.com', 1, -1),
	('WSfrshzy6IKS6cPU96WfEjrow3FWCoxgqt8N6yGMxxa8gGW99/T5knbZHz4e/AxrQi5H4BWNEZlK9x1/d35oRg==', 'user18@gmail.com', 1, -1),
	('WSfrshzy6IKS6cPU96WfEjrow3FWCoxgqt8N6yGMxxa8gGW99/T5knbZHz4e/AxrQi5H4BWNEZlK9x1/d35oRg==', 'user19@gmail.com', 1, -1),
	('WSfrshzy6IKS6cPU96WfEjrow3FWCoxgqt8N6yGMxxa8gGW99/T5knbZHz4e/AxrQi5H4BWNEZlK9x1/d35oRg==', 'user20@gmail.com', 1, -1);

