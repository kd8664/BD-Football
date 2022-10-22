-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: mysql
-- Время создания: Окт 22 2022 г., 13:23
-- Версия сервера: 8.0.29
-- Версия PHP: 8.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ais_dzhetpisov3841_web60991kd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `calendar`
--

CREATE TABLE `calendar` (
  `id` int NOT NULL,
  `id_user` int NOT NULL COMMENT 'id владельца календаря',
  `id_event` int NOT NULL COMMENT 'id события'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `calendar`
--

INSERT INTO `calendar` (`id`, `id_user`, `id_event`) VALUES
(39, 3, 65);

-- --------------------------------------------------------

--
-- Структура таблицы `event`
--

CREATE TABLE `event` (
  `id` int NOT NULL COMMENT 'id события',
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL COMMENT 'Название события',
  `start` date NOT NULL COMMENT 'Дата начала события',
  `end` date NOT NULL COMMENT 'Дата конца события',
  `picture_url` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `event`
--

INSERT INTO `event` (`id`, `title`, `start`, `end`, `picture_url`) VALUES
(65, 'monk', '2022-06-26', '2022-06-27', 'https://s3.everlearn.ru/surgu/student/file451484.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `Game`
--

CREATE TABLE `Game` (
  `id` int NOT NULL COMMENT 'id игры',
  `id_team1` int NOT NULL COMMENT 'id первой команды',
  `id_team2` int NOT NULL COMMENT 'id второй команды'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='матч – id(PK), id_команды1 (FK), id_команды2 (FK)';

-- --------------------------------------------------------

--
-- Структура таблицы `Goal`
--

CREATE TABLE `Goal` (
  `id` int NOT NULL COMMENT 'id гола',
  `id_game` int NOT NULL COMMENT 'id игры',
  `id_player` int NOT NULL COMMENT 'id игрока',
  `time` double NOT NULL COMMENT 'время от начала матча'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='гол – id(PK), id_матча (FK), id_игрока (FK), время_от_начала';

-- --------------------------------------------------------

--
-- Структура таблицы `Player`
--

CREATE TABLE `Player` (
  `id` int NOT NULL COMMENT 'id игрока',
  `id_team` int NOT NULL COMMENT 'id команды',
  `FIO` varchar(255) NOT NULL COMMENT 'ФИО',
  `amplua` varchar(255) NOT NULL COMMENT 'Амплуа игрока'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='игрок – id(PK), id_команды (FK), ФИО, амплуа';

-- --------------------------------------------------------

--
-- Структура таблицы `Team`
--

CREATE TABLE `Team` (
  `id` int NOT NULL COMMENT 'id команды',
  `Name` varchar(255) NOT NULL COMMENT 'наименование команды'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='команда – id(PK), наименование';

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL COMMENT 'id пользователя',
  `name` varchar(255) NOT NULL COMMENT 'Имя пользователя',
  `surname` varchar(255) NOT NULL COMMENT 'Фамилия пользователя',
  `email` varchar(255) NOT NULL COMMENT 'Адрес электронной почты',
  `password` varchar(255) NOT NULL COMMENT 'Пароль пользователя',
  `role` varchar(255) NOT NULL COMMENT 'Роль пользователя в системе'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `email`, `password`, `role`) VALUES
(3, 'Kirill', 'Dzhetpisov', 'kir', '123', 'admin'),
(4, 'K', 'D', 'kd', '123', 'guest');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `calendar_ibfk_2` (`id_event`);

--
-- Индексы таблицы `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Game`
--
ALTER TABLE `Game`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_team1` (`id_team1`,`id_team2`),
  ADD KEY `id_team2` (`id_team2`);

--
-- Индексы таблицы `Goal`
--
ALTER TABLE `Goal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_game` (`id_game`,`id_player`),
  ADD KEY `id_player` (`id_player`);

--
-- Индексы таблицы `Player`
--
ALTER TABLE `Player`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_team` (`id_team`);

--
-- Индексы таблицы `Team`
--
ALTER TABLE `Team`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `event`
--
ALTER TABLE `event`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'id события', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `Game`
--
ALTER TABLE `Game`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'id игры';

--
-- AUTO_INCREMENT для таблицы `Goal`
--
ALTER TABLE `Goal`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'id гола';

--
-- AUTO_INCREMENT для таблицы `Player`
--
ALTER TABLE `Player`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'id игрока';

--
-- AUTO_INCREMENT для таблицы `Team`
--
ALTER TABLE `Team`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'id команды';

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'id пользователя', AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `calendar`
--
ALTER TABLE `calendar`
  ADD CONSTRAINT `calendar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `calendar_ibfk_2` FOREIGN KEY (`id_event`) REFERENCES `event` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `Game`
--
ALTER TABLE `Game`
  ADD CONSTRAINT `Game_ibfk_1` FOREIGN KEY (`id_team1`) REFERENCES `Team` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Game_ibfk_2` FOREIGN KEY (`id_team2`) REFERENCES `Team` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `Goal`
--
ALTER TABLE `Goal`
  ADD CONSTRAINT `Goal_ibfk_1` FOREIGN KEY (`id_game`) REFERENCES `Game` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Goal_ibfk_2` FOREIGN KEY (`id_player`) REFERENCES `Player` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `Player`
--
ALTER TABLE `Player`
  ADD CONSTRAINT `Player_ibfk_1` FOREIGN KEY (`id_team`) REFERENCES `Team` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
