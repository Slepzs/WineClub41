-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 25. 11 2018 kl. 17:18:28
-- Serverversion: 5.7.17-log
-- PHP-version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `winebase`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `comments_wine`
--

CREATE TABLE `comments_wine` (
  `comwine_id` int(11) NOT NULL,
  `users_userid` int(11) NOT NULL,
  `wines_wineid` int(11) NOT NULL,
  `comment` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `comment_posts`
--

CREATE TABLE `comment_posts` (
  `compostid` int(11) NOT NULL,
  `users_userid` int(11) NOT NULL,
  `posts_postid` int(11) NOT NULL,
  `comment` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `posts`
--

CREATE TABLE `posts` (
  `postid` int(11) NOT NULL,
  `post_text` longtext,
  `post_image` varchar(255) DEFAULT NULL,
  `users_userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `stars`
--

CREATE TABLE `stars` (
  `wines_wineid` int(11) NOT NULL,
  `users_userid` int(11) NOT NULL,
  `stars` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data dump for tabellen `stars`
--

INSERT INTO `stars` (`wines_wineid`, `users_userid`, `stars`) VALUES
(1, 4, 4),
(1, 4, 2),
(1, 4, 2),
(1, 4, 2),
(1, 4, 6),
(1, 4, 7),
(1, 4, 7);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT 'Wine drinker',
  `admin` varchar(45) DEFAULT 'false',
  `banned` varchar(20) DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data dump for tabellen `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `email`, `title`, `admin`, `banned`) VALUES
(4, 'slepzs', '$2y$10$C2VacGlz31IqCsP3wuUcxOKl762hVSkaLHa8ot3L99wEPoSZwoiFC', 'slepzs@outlook.com', 'Wine drinker', 'false', 'false');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `wines`
--

CREATE TABLE `wines` (
  `wineid` int(11) NOT NULL,
  `wine_name` varchar(255) DEFAULT NULL,
  `wine_region_country` varchar(255) DEFAULT NULL,
  `wine_grapes` varchar(255) DEFAULT NULL,
  `wine_year` int(11) DEFAULT NULL,
  `wine_volume` float DEFAULT NULL,
  `wine_size` int(11) DEFAULT NULL,
  `wine_price` int(11) DEFAULT NULL,
  `wine_real_price` int(11) DEFAULT NULL,
  `wine_date` date DEFAULT NULL,
  `wine_img` varchar(255) NOT NULL,
  `users_userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data dump for tabellen `wines`
--

INSERT INTO `wines` (`wineid`, `wine_name`, `wine_region_country`, `wine_grapes`, `wine_year`, `wine_volume`, `wine_size`, `wine_price`, `wine_real_price`, `wine_date`, `wine_img`, `users_userid`) VALUES
(1, 'Montgras (reserva especial)', 'Chile (Central Valley)', 'Cabernet Sauvignon And Syrah', 2016, 14.5, 75, 55, 55, '2018-04-18', 'wine.jpg', 4);

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `comments_wine`
--
ALTER TABLE `comments_wine`
  ADD PRIMARY KEY (`comwine_id`),
  ADD KEY `fk_comments_wine_users1_idx` (`users_userid`),
  ADD KEY `fk_comments_wine_wines1_idx` (`wines_wineid`);

--
-- Indeks for tabel `comment_posts`
--
ALTER TABLE `comment_posts`
  ADD PRIMARY KEY (`compostid`),
  ADD KEY `fk_comment_posts_users1_idx` (`users_userid`),
  ADD KEY `fk_comment_posts_posts1_idx` (`posts_postid`);

--
-- Indeks for tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postid`),
  ADD KEY `fk_posts_users1_idx` (`users_userid`);

--
-- Indeks for tabel `stars`
--
ALTER TABLE `stars`
  ADD KEY `fk_table1_wines1_idx` (`wines_wineid`),
  ADD KEY `fk_table1_users1_idx` (`users_userid`);

--
-- Indeks for tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- Indeks for tabel `wines`
--
ALTER TABLE `wines`
  ADD PRIMARY KEY (`wineid`),
  ADD KEY `fk_wines_users_idx` (`users_userid`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `comments_wine`
--
ALTER TABLE `comments_wine`
  MODIFY `comwine_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tilføj AUTO_INCREMENT i tabel `comment_posts`
--
ALTER TABLE `comment_posts`
  MODIFY `compostid` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tilføj AUTO_INCREMENT i tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tilføj AUTO_INCREMENT i tabel `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Tilføj AUTO_INCREMENT i tabel `wines`
--
ALTER TABLE `wines`
  MODIFY `wineid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Begrænsninger for dumpede tabeller
--

--
-- Begrænsninger for tabel `comments_wine`
--
ALTER TABLE `comments_wine`
  ADD CONSTRAINT `fk_comments_wine_users1` FOREIGN KEY (`users_userid`) REFERENCES `users` (`userid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comments_wine_wines1` FOREIGN KEY (`wines_wineid`) REFERENCES `wines` (`wineid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Begrænsninger for tabel `comment_posts`
--
ALTER TABLE `comment_posts`
  ADD CONSTRAINT `fk_comment_posts_posts1` FOREIGN KEY (`posts_postid`) REFERENCES `posts` (`postid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comment_posts_users1` FOREIGN KEY (`users_userid`) REFERENCES `users` (`userid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Begrænsninger for tabel `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_posts_users1` FOREIGN KEY (`users_userid`) REFERENCES `users` (`userid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Begrænsninger for tabel `stars`
--
ALTER TABLE `stars`
  ADD CONSTRAINT `fk_table1_users1` FOREIGN KEY (`users_userid`) REFERENCES `users` (`userid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_table1_wines1` FOREIGN KEY (`wines_wineid`) REFERENCES `wines` (`wineid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Begrænsninger for tabel `wines`
--
ALTER TABLE `wines`
  ADD CONSTRAINT `fk_wines_users` FOREIGN KEY (`users_userid`) REFERENCES `users` (`userid`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
