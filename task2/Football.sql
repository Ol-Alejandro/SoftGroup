-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 20 2017 г., 13:08
-- Версия сервера: 5.5.48
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Football`
--

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(10) unsigned NOT NULL,
  `name_city` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`id`, `name_city`) VALUES
(1, 'Київ'),
(2, 'Мадрид'),
(3, 'Мілан'),
(4, 'Донецьк'),
(5, 'мілан'),
(6, 'Барселона'),
(7, 'Мюнхен'),
(8, 'Манчестер'),
(9, 'Лондон'),
(10, 'Лісабон'),
(11, 'Турин'),
(12, 'Дортмунд'),
(13, 'Берлін'),
(14, 'Варшава');

-- --------------------------------------------------------

--
-- Структура таблицы `club`
--

CREATE TABLE IF NOT EXISTS `club` (
  `id` int(10) unsigned NOT NULL,
  `name_club` varchar(50) NOT NULL,
  `id_city` int(10) unsigned NOT NULL,
  `id_country` int(10) unsigned NOT NULL,
  `id_league` int(10) unsigned NOT NULL,
  `trophies` int(3) unsigned NOT NULL,
  `budget` int(9) unsigned NOT NULL,
  `president` varchar(50) NOT NULL,
  `id_stadium` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `club`
--

INSERT INTO `club` (`id`, `name_club`, `id_city`, `id_country`, `id_league`, `trophies`, `budget`, `president`, `id_stadium`) VALUES
(3, 'Динамо', 1, 1, 1, 25, 10000000, 'Суркіс', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(10) unsigned NOT NULL,
  `name_country` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`id`, `name_country`) VALUES
(1, 'Україна'),
(2, 'Англія'),
(3, 'Нідерланди'),
(4, 'Німеччина'),
(5, 'Франція'),
(6, 'Португалія'),
(7, 'Бельгія'),
(8, 'Португалія'),
(9, 'Італія'),
(10, 'Іспанія'),
(11, 'Італія'),
(12, 'Хорватія'),
(13, 'Туреччина'),
(14, 'Росія'),
(15, 'Польща');

-- --------------------------------------------------------

--
-- Структура таблицы `league`
--

CREATE TABLE IF NOT EXISTS `league` (
  `id` int(10) unsigned NOT NULL,
  `name_league` varchar(50) NOT NULL,
  `id_country` int(10) unsigned NOT NULL,
  `rating` float NOT NULL,
  `surname_president` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `league`
--

INSERT INTO `league` (`id`, `name_league`, `id_country`, `rating`, `surname_president`) VALUES
(1, 'УПЛ', 1, 48, 'Павелко');

-- --------------------------------------------------------

--
-- Структура таблицы `stadium`
--

CREATE TABLE IF NOT EXISTS `stadium` (
  `id` int(10) unsigned NOT NULL,
  `name_stadium` varchar(50) NOT NULL,
  `year_foundation` int(4) unsigned NOT NULL,
  `capacity` int(6) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `stadium`
--

INSERT INTO `stadium` (`id`, `name_stadium`, `year_foundation`, `capacity`) VALUES
(1, 'НСК Олімпійський', 2010, 80000);

-- --------------------------------------------------------

--
-- Структура таблицы `trophy`
--

CREATE TABLE IF NOT EXISTS `trophy` (
  `id` int(10) unsigned NOT NULL,
  `name_trophy` varchar(50) NOT NULL,
  `year_foundation` int(6) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `trophy`
--

INSERT INTO `trophy` (`id`, `name_trophy`, `year_foundation`) VALUES
(1, 'Кубок України', 1992);

-- --------------------------------------------------------

--
-- Структура таблицы `victory`
--

CREATE TABLE IF NOT EXISTS `victory` (
  `id` int(10) unsigned NOT NULL,
  `id_club` int(10) unsigned NOT NULL,
  `id_trophy` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `victory`
--

INSERT INTO `victory` (`id`, `id_club`, `id_trophy`) VALUES
(1, 3, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_city` (`id_city`),
  ADD KEY `id_country` (`id_country`),
  ADD KEY `id_league` (`id_league`),
  ADD KEY `id_stadium` (`id_stadium`);

--
-- Индексы таблицы `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `league`
--
ALTER TABLE `league`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_country` (`id_country`);

--
-- Индексы таблицы `stadium`
--
ALTER TABLE `stadium`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `trophy`
--
ALTER TABLE `trophy`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `victory`
--
ALTER TABLE `victory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_club` (`id_club`),
  ADD KEY `id_trophy` (`id_trophy`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `city`
--
ALTER TABLE `city`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `club`
--
ALTER TABLE `club`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `country`
--
ALTER TABLE `country`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `league`
--
ALTER TABLE `league`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `stadium`
--
ALTER TABLE `stadium`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `trophy`
--
ALTER TABLE `trophy`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `victory`
--
ALTER TABLE `victory`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `club`
--
ALTER TABLE `club`
  ADD CONSTRAINT `club_ibfk_1` FOREIGN KEY (`id_league`) REFERENCES `league` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `club_ibfk_2` FOREIGN KEY (`id_country`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `club_ibfk_3` FOREIGN KEY (`id_stadium`) REFERENCES `stadium` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `club_ibfk_4` FOREIGN KEY (`id_city`) REFERENCES `city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `league`
--
ALTER TABLE `league`
  ADD CONSTRAINT `league_ibfk_1` FOREIGN KEY (`id_country`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `victory`
--
ALTER TABLE `victory`
  ADD CONSTRAINT `victory_ibfk_1` FOREIGN KEY (`id_club`) REFERENCES `club` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `victory_ibfk_2` FOREIGN KEY (`id_trophy`) REFERENCES `trophy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
