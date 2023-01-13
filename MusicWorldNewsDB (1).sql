-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Січ 10 2023 р., 15:57
-- Версія сервера: 8.0.30
-- Версія PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `MusicWorldNewsDB`
--

-- --------------------------------------------------------

--
-- Структура таблиці `Genre`
--

CREATE TABLE `Genre` (
  `id` int NOT NULL,
  `Genre_name` varchar(255) NOT NULL,
  `Genre_discription` varchar(255) DEFAULT NULL,
  `Genre_photolink` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп даних таблиці `Genre`
--

INSERT INTO `Genre` (`id`, `Genre_name`, `Genre_discription`, `Genre_photolink`) VALUES
(1, 'Рок', NULL, NULL),
(2, 'Реп', NULL, NULL),
(3, 'Класика', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `Genre_news`
--

CREATE TABLE `Genre_news` (
  `id` int NOT NULL,
  `Genre ID` int NOT NULL,
  `News_name` varchar(255) NOT NULL,
  `News_text_content` text NOT NULL,
  `Photo_link` text NOT NULL,
  `Author_id` int NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `User`
--

CREATE TABLE `User` (
  `id` int NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Firstname` varchar(255) NOT NULL,
  `Surname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп даних таблиці `User`
--

INSERT INTO `User` (`id`, `login`, `password`, `Firstname`, `Surname`) VALUES
(1, 'admin', 'admin', 'Yaroslav', 'Tsalko');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `Genre`
--
ALTER TABLE `Genre`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `Genre_news`
--
ALTER TABLE `Genre_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Genre ID` (`Genre ID`);

--
-- Індекси таблиці `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `Genre`
--
ALTER TABLE `Genre`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблиці `Genre_news`
--
ALTER TABLE `Genre_news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `User`
--
ALTER TABLE `User`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `Genre_news`
--
ALTER TABLE `Genre_news`
  ADD CONSTRAINT `genre_news_ibfk_1` FOREIGN KEY (`Genre ID`) REFERENCES `Genre` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
