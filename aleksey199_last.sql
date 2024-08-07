-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Авг 05 2024 г., 19:13
-- Версия сервера: 5.7.27-30-log
-- Версия PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `aleksey199`
--

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author_id` int(11) DEFAULT NULL,
  `text` text,
  `color` int(4) NOT NULL DEFAULT '0',
  `theme` varchar(100) NOT NULL DEFAULT 'Без темы'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `date`, `author_id`, `text`, `color`, `theme`) VALUES
(2, '2024-08-05 14:26:39', 9, 'Привет! Это первая запись! Я люблю пофантазировать. И вот подумал, а что если сделать сайт, на котором я не только отработаю свои новые навыки web разработчика. \r\n<br><br>\r\nТакой сайт, который принесёт новое и приятное для моих друзей и близких. И вот оно! Что-то вроде закрытой соц сети, где можно комфортно поделиться и почитать. Где нет каналов, которые безостановочно присылают уведомления и провоцируют оценочное мышление. Конечно это вряд ли замена существующих средств...\r\n<br><br>\r\nНо я уже увидел, что это может быть интересно, на примере той веселухи на страничке с картинками!\r\n<br><br>\r\nСпасибо! за ваше участие в этом развлечении!\r\n<br><br>\r\nА вот ещё забыл, расскажу почему зазывается RoomNeto. Сначала это была просто страничка регистрации и пустым личным кабинетом. Пустой room! Потом я добавил при покупке домена net (вроде как сеть). Но и так домен был занят. Поэтому получилось что то немного неуклюже звучащее румнето. Вполне моём духе автора МГОО. Теперь остаётся принять и полюбить эту неуклюжесть!', 1, 'ИДЕЯ САЙТА ROOMNETO.RU'),
(3, '2024-08-05 15:15:39', 14, 'А что будет, если использовать кавычки?) А можно я попробую хакнуть тебе базу данных? Ронять базу не буду, конечно, но интересно, пройдёт ли какая-нибудь sql инъекция на изменение имени другого пользователя) ', 2, 'ВЗЛОМ ЖЕПЫ'),
(4, '2024-08-05 15:19:45', 9, 'Короче это Лев написал снизу. Но то ли он взломал, то ли само так глючно, что везде пишет автор админ. Мех...', 0, 'БАГИ');

-- --------------------------------------------------------

--
-- Структура таблицы `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='галерея';

--
-- Дамп данных таблицы `pictures`
--

INSERT INTO `pictures` (`id`, `img`, `date`, `author`) VALUES
(1, 'gl_uploads/1721987275_20150501_191056 (2).jpg', '2024-07-26 09:47:55', 'admin'),
(3, 'gl_uploads/1721997646_Emdenskaya-poroda-gusej.jpg', '2024-07-26 12:40:46', 'admin'),
(4, 'gl_uploads/1722000876_linuxperftools.png', '2024-07-26 13:34:36', 'Android '),
(5, 'gl_uploads/1722009921_IMG_20240229_204531.jpg', '2024-07-26 16:05:21', 'levaman'),
(7, 'gl_uploads/1722010117__DSC0053.JPG', '2024-07-26 16:08:37', 'levaman'),
(8, 'gl_uploads/1722010190_IMG_4115.JPG', '2024-07-26 16:09:50', 'levaman'),
(9, 'gl_uploads/1722013508_IMG_0888.jpeg', '2024-07-26 17:05:08', 'Kgb'),
(10, 'gl_uploads/1722013610_143F0581-8A17-48F3-BFD0-337F8759812B-30244-000004DA7734F7EC.jpeg', '2024-07-26 17:06:50', 'Kgb'),
(11, 'gl_uploads/1722013753_IMG_0626.jpeg', '2024-07-26 17:09:13', 'Kgb'),
(12, 'gl_uploads/1722014424_IMG_3592.jpeg', '2024-07-26 17:20:24', 'Sofa'),
(14, 'gl_uploads/1722014481_IMG_4927.jpeg', '2024-07-26 17:21:21', 'Sofa'),
(17, 'gl_uploads/1722014618_IMG_4668.jpeg', '2024-07-26 17:23:38', 'Sofa'),
(19, 'gl_uploads/1722024338_ева.jpg', '2024-07-26 20:05:38', 'pol1ana'),
(21, 'gl_uploads/1722069584_17220695536128564224970349455486.jpg', '2024-07-27 08:39:44', 'levaman'),
(22, 'gl_uploads/1722069903_125.jpg', '2024-07-27 08:45:03', 'NadiaNevraera'),
(23, 'gl_uploads/1722069937_20240715_123944.jpg', '2024-07-27 08:45:37', 'NadiaNevraera'),
(40, 'gl_uploads/1722147917_photo_2024-07-28_09-24-34.jpg', '2024-07-28 06:25:17', 'rfnt'),
(50, 'gl_uploads/1722165785_photo_2024-07-28_11-13-43.jpg', '2024-07-28 11:23:05', 'admin'),
(51, 'gl_uploads/1722341631_photo_2024-07-30_13-17-53.jpg', '2024-07-30 12:13:51', 'admin'),
(53, 'gl_uploads/1722364219_Screenshot_20200408-215343_Gallery.jpg', '2024-07-30 18:30:19', 'Android '),
(55, 'gl_uploads/1722509090_logo.jpg', '2024-08-01 10:44:50', 'admin'),
(58, 'gl_uploads/1722870665_Screenshot_2024-08-05-18-09-44-175_org.telegram.messenger.jpg', '2024-08-05 15:11:05', 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(100) DEFAULT NULL,
  `full_name` varchar(355) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `avatar` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `full_name`, `email`, `password`, `avatar`) VALUES
(9, 'admin', 'Алексей Троицкий', 'Aleksey-1998@yandex.ru', '202cb962ac59075b964b07152d234b70', 'uploads/1721749087_Koala.jpg'),
(10, 'pol1ana', 'Ммм', 'not.fantasy1408@gmail.com', 'd4af0946e27c9264ed38b325abe25f64', 'uploads/1721939831_руки (1).png'),
(11, 'Android ', 'Andrey', 'Nino.ru4@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'uploads/1721967006_IMG-f3d1acfd330dec3f99d9c18f18e92396-V.jpg'),
(13, 'Уга буга', NULL, 'pavel111scorp@mail.ru', '86ebbb178179a432d60be7668f5a9f1c', 'uploads/1721994078_1721911699291.jpg'),
(14, 'levaman', NULL, 'levaman97@gmail.com', '249bce1db66f5b5d793231f0b96cc374', 'uploads/1722009868_IMG_20240228_142207.jpg'),
(15, 'Kgb', NULL, 'blinov.kirill@yandex.ru', '9aefeea48e612febb851d13d3f030efa', 'uploads/1722013381_A11F6746-71A1-4268-A565-4D730BC37846-30244-000004DA9443FD2A.jpeg'),
(16, 'Sofa', NULL, 'cofya.s@mail.ru', '1ee084e2697bd3b98e5ed82b3eaf1bb4', 'uploads/1722014211_IMG_2835.jpeg'),
(17, 'NadiaNevraera', NULL, 'xo.frerard@gmail.com', '474ecba87d175da5ffeb5b31a562b160', 'uploads/1722069535_20240627_204237.jpg'),
(18, 'rfnt', NULL, 'kc@nntu.ru', 'a9a811359788f810d3ed103a583f921f', 'uploads/1722147410_photo_2024-07-28_09-09-38.jpg'),
(19, 'Ялу', NULL, 'koxana5ul@yandex.ru ', 'cb3f69b7768644e30f00bd169c3b8fbe', 'uploads/1722535026_IMG_20240515_154815.jpg'),
(20, 'ЧелТест', NULL, 'No', '45c48cce2e2d7fbdea1afc51c7c6ad26', 'uploads/1722871337_Screenshot_2024-08-05-18-09-44-175_org.telegram.messenger.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--
-- Индексы таблицы `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
