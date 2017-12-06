-- phpMyAdmin SQL Dump
-- version 4.7.0-beta1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Фев 22 2017 г., 11:22
-- Версия сервера: 5.7.16
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tasker`
--

-- --------------------------------------------------------

--
-- Структура таблицы `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `task_name` varchar(250) NOT NULL,
  `task_description` text NOT NULL,
  `imgFile` varchar(250) NOT NULL,
  `status` enum('not','yes') DEFAULT 'not',
  `pubdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `realization_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `task`
--

INSERT INTO `task` (`id`, `author_id`, `task_name`, `task_description`, `imgFile`, `status`, `pubdate`, `realization_date`) VALUES
(169, 36, 'footbal', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit et hic rem voluptatibus obcaecati, eligendi. Error velit necessitatibus, odit, unde quas ea deserunt soluta earum vel repudiandae nostrum autem magni.', 'img/img/taskImg/3658ac5fabcd705img320x240.jpg', 'not', '2017-02-21 19:54:35', '2017-02-24'),
(170, 37, 'mail', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit et hic rem voluptatibus obcaecati, eligendi. Error velit necessitatibus, odit, unde quas ea deserunt soluta earum vel repudiandae nostrum autem magni.', 'img/img/taskImg/3758ac5fc3601f9img320x240.jpg', 'not', '2017-02-22 08:09:58', '2017-02-25'),
(171, 38, 'Create', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit et hic rem voluptatibus obcaecati, eligendi. Error velit necessitatibus, odit, unde quas ea deserunt soluta earum vel repudiandae nostrum autem magni.', 'img/img/taskImg/3858ac5fe8667f7img320x240.jpg', 'not', '2017-02-21 19:47:08', '2017-02-25'),
(172, 39, 'tutu', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit et hic rem voluptatibus obcaecati, eligendi. Error velit necessitatibus, odit, unde quas ea deserunt soluta earum vel repudiandae nostrum autem magni.', 'img/img/taskImg/3958ac603d14c98img320x240.jpg', 'not', '2017-02-21 20:34:15', '2017-02-24'),
(173, 40, 'internet', 'nothing to do fo kity', 'img/img/taskImg/4058ac6060d907dimg320x240.jpg', 'yes', '2017-02-22 07:48:18', '2017-02-24'),
(174, 37, 'gohome', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit et hic rem voluptatibus obcaecati, eligendi. Error velit necessitatibus, odit, unde quas ea deserunt soluta earum vel repudiandae nostrum autem magni.', 'img/img/taskImg/3758ac60a74075aimg320x240.jpg', 'not', '2017-02-21 20:00:53', '2017-03-04'),
(175, 37, 'twerk', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit et hic rem voluptatibus obcaecati, eligendi. Error velit necessitatibus, odit, unde quas ea deserunt soluta earum vel repudiandae nostrum autem magni.', 'img/img/taskImg/3758ac60e61cbebimg320x240.jpg', 'yes', '2017-02-22 08:08:53', '2017-02-16'),
(176, 41, 'musik', '//        if($id_task == $row[\'id\']){\r\n//            $put.= &quot;&lt;option value=\'&quot;.$row[\'id\'].&quot;\' class=\'average_text active\' onclick=\'form.submit()\'&gt; Email: &quot;.$row[\'email\'].&quot; Пользователь: &quot;.$row[\'user_name\'].&quot;&lt;/option&gt;&quot;;\r\n//        }else{\r\n//           $put.= &quot;&lt;option value=\'&quot;.$row[\'id\'].&quot;\' class=\'average_text\' onclick=\'form.submit()\'&gt; Email: &quot;.$row[\'email\'].&quot; Пользователь: &quot;.$row[\'user_name\'].&quot;&lt;/option&gt;&quot;; \r\n//        }', 'img/img/taskImg/4158ac61151a9c2img320x240.jpg', 'not', '2017-02-21 20:30:36', '2017-04-22'),
(177, 40, 'uprise', '//        if($id_task == $row[\'id\']){\r\n//            $put.= &quot;&lt;option value=\'&quot;.$row[\'id\'].&quot;\' class=\'average_text active\' onclick=\'form.submit()\'&gt; Email: &quot;.$row[\'email\'].&quot; Пользователь: &quot;.$row[\'user_name\'].&quot;&lt;/option&gt;&quot;;\r\n//        }else{\r\n//           $put.= &quot;&lt;option value=\'&quot;.$row[\'id\'].&quot;\' class=\'average_text\' onclick=\'form.submit()\'&gt; Email: &quot;.$row[\'email\'].&quot; Пользователь: &quot;.$row[\'user_name\'].&quot;&lt;/option&gt;&quot;; \r\n//        }', 'img/img/taskImg/4058ac613fc6af3img320x240.jpg', 'yes', '2017-02-21 20:32:44', '2017-02-10'),
(178, 42, 'cerbos', 'a//        if($id_task == $row[\'id\']){\r\n//            $put.= &quot;&lt;option value=\'&quot;.$row[\'id\'].&quot;\' class=\'average_text active\' onclick=\'form.submit()\'&gt; Email: &quot;.$row[\'email\'].&quot; Пользователь: &quot;.$row[\'user_name\'].&quot;&lt;/option&gt;&quot;;\r\n//        }else{\r\n//           $put.= &quot;&lt;option value=\'&quot;.$row[\'id\'].&quot;\' class=\'average_text\' onclick=\'form.submit()\'&gt; Email: &quot;.$row[\'email\'].&quot; Пользователь: &quot;.$row[\'user_name\'].&quot;&lt;/option&gt;&quot;; \r\n//        }', 'img/img/taskImg/4258ac619d6c013img320x240.jpg', 'not', '2017-02-21 20:32:12', '2017-02-26'),
(179, 43, 'destroy', '//        if($id_task == $row[\'id\']){\r\n//            $put.= &quot;&lt;option value=\'&quot;.$row[\'id\'].&quot;\' class=\'average_text active\' onclick=\'form.submit()\'&gt; Email: &quot;.$row[\'email\'].&quot; Пользователь: &quot;.$row[\'user_name\'].&quot;&lt;/option&gt;&quot;;\r\n//        }else{\r\n//           $put.= &quot;&lt;option value=\'&quot;.$row[\'id\'].&quot;\' class=\'average_text\' onclick=\'form.submit()\'&gt; Email: &quot;.$row[\'email\'].&quot; Пользователь: &quot;.$row[\'user_name\'].&quot;&lt;/option&gt;&quot;; \r\n//        }', 'img/img/taskImg/4358ac61d2dfaa6img320x240.jpg', 'not', '2017-02-21 19:47:49', '2017-02-26'),
(180, 41, 'new', 'Базы данных \r\n\r\nMySQL\r\n\r\nPostgreSQL\r\n\r\n\r\nPHP конференция 2005\r\nПодробности! \r\n\r\nПредыдущий / Дальше / Вверх / Оглавление\r\n6.3.4. Функции даты и времени\r\n\r\nОписание диапазона величин для каждого типа и возможные форматы представления даты и времени приведены в разделе Раздел 6.2.2, «Типы данных даты и времени».\r\nНиже представлен пример, в котором используются функции даты. Приведенный запрос выбирает все записи с величиной date_col в течение последних 30 дней:', 'img/img/taskImg/4158ac6335ba48bimg320x240.jpg', '', '2017-02-21 15:56:37', '2017-02-10'),
(181, 45, 'kitykity', 'nothing to do fo kity 2', 'img/img/taskImg/4558ad420584e81img320x240.jpg', 'yes', '2017-02-22 07:49:05', '2017-02-26'),
(182, 46, 'test', 'test 3', 'img/img/taskImg/4658ad485947bc0img320x240.jpg', 'not', '2017-02-22 08:14:59', '2017-03-05');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `password` varchar(250) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `email`, `user_name`, `password`, `role`) VALUES
(36, 'user@mail.ru', 'user', NULL, 'user'),
(37, 'email@mail.ru', 'mailer', NULL, 'user'),
(38, 'emvail@mail.ru', 'emvail', NULL, 'user'),
(39, 'player@gmail.ru', 'player', NULL, 'user'),
(40, 'online@mail.ru', 'online', NULL, 'user'),
(41, 'twerk@mail.ru', 'twerk', NULL, 'user'),
(42, 'exxmail@mail.ru', 'zedd', NULL, 'user'),
(43, 'zomer@mail.ru', 'kreator', NULL, 'user'),
(44, '', 'admin', '202cb962ac59075b964b07152d234b70', 'admin'),
(45, 'hellokity@mail.ru', 'kityhello', NULL, 'user'),
(46, 'test@gmail.com', 'test', NULL, 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
