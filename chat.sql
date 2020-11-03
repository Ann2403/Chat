-- phpMyAdmin SQL Dump
-- version 5.0.2
<<<<<<< HEAD
-- https:// www.phpmyadmin.net/
=======
-- https://www.phpmyadmin.net/
>>>>>>> 2a7bad082ab6785293a6d65eb92fe72a46c0a24f
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 02 2020 г., 08:33
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `chat`
--

-- --------------------------------------------------------

--
-- Структура таблицы `friends`
--

CREATE TABLE `friends` (
  `user_1` int(11) NOT NULL,
  `user_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `friends`
--

INSERT INTO `friends` (`user_1`, `user_2`) VALUES
(1, 2),
(1, 3),
(2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id_sms` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_user_2` int(11) NOT NULL,
  `text` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id_sms`, `id_user`, `id_user_2`, `text`, `time`) VALUES
(1, 1, 2, 'Привет!', '2020-10-27 09:02:41'),
(2, 2, 1, 'Приветики', '2020-10-27 09:32:00');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `online` int(1) NOT NULL DEFAULT 0,
  `data_online` datetime NOT NULL,
  `email` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'user0.png',
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `online`, `data_online`, `email`, `photo`, `password`) VALUES
(1, 'Ann', 1, '2020-10-30 08:24:21', 'zubenko9529@gmail.com', 'user9.png', '4bff891aaede7bd000f72a6af982b182'),
(2, 'Andrey', 0, '2020-10-27 11:10:02', 'andrey@gmail.com', 'user3.png', '6b5d7ba4130b84ed146888c5f6025574'),
(3, 'Oksana', 0, '2020-10-27 09:31:09', 'oksana@gmail.com', 'user1.png', '9ffef885b4bccf01bd646dfbbad10e58'),
(4, 'Alya', 0, '2020-10-24 18:52:03', 'alina@gmail.com', 'user7.png', 'e89c582057bb1408aacee20b3beb89cf'),
(5, 'Alex', 0, '0000-00-00 00:00:00', 'alex@gmail.com', 'user4.png', '0312d0d39585741666c19c217ed769f7'),
(6, 'Anton', 0, '0000-00-00 00:00:00', 'anton@gmail.com', 'user6.png', 'f24c9173af9efe8be0066cb78991cf1c'),
(7, ' Vasya', 0, '0000-00-00 00:00:00', ' vasya@gmail.com', 'user8.png', 'fd4af291374403da28b49877dc6ada96'),
(8, 'Olya', 0, '0000-00-00 00:00:00', 'olya@gmail.com', 'user2.png', '085efa3151efa58eef1093203c827483'),
(9, 'Viktor', 0, '0000-00-00 00:00:00', 'viktor@gmail.com', 'user0.png', 'c28703ca46df39d4165ce6f0df1c01db');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `friends`
--
ALTER TABLE `friends`
  ADD UNIQUE KEY `user_1` (`user_1`,`user_2`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_sms`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id_sms` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
