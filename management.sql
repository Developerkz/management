-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Май 06 2019 г., 02:43
-- Версия сервера: 5.7.26-0ubuntu0.18.04.1
-- Версия PHP: 7.2.17-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `management`
--

-- --------------------------------------------------------

--
-- Структура таблицы `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `title` text NOT NULL,
  `website` text NOT NULL,
  `phone` text NOT NULL,
  `address` text NOT NULL,
  `company_type_id` bigint(20) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `creator_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `companies`
--

INSERT INTO `companies` (`id`, `user_id`, `title`, `website`, `phone`, `address`, `company_type_id`, `created`, `updated`, `creator_id`) VALUES
(2, 6, 'TOO Bitlab', 'bitlab.kz', '+7 (747) 599-40-41', 'Satbayeva 7,Dostyk', 1, '2019-05-06 06:25:32', '2019-05-06 08:20:59', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `company_types`
--

CREATE TABLE `company_types` (
  `id` bigint(20) NOT NULL,
  `title` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `creator_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `company_types`
--

INSERT INTO `company_types` (`id`, `title`, `created`, `updated`, `creator_id`) VALUES
(1, 'ИП общеустановленный', '2019-05-06 00:00:00', '2019-05-06 00:00:00', 1),
(2, 'ИП упрощенка', '2019-05-06 00:00:00', '2019-05-06 00:00:00', 1),
(3, 'ТОО общеустановленный', '2019-05-06 00:00:00', '2019-05-06 00:00:00', 1),
(4, 'ТОО упрощенка', '2019-05-06 00:00:00', '2019-05-06 00:00:00', 1),
(5, 'ОО налоговые отчеты', '2019-05-06 00:00:00', '2019-05-06 00:00:00', 1),
(6, 'ОО налоги по зарплате', '2019-05-06 00:00:00', '2019-05-06 00:00:00', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `position_id` bigint(20) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `creator_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `employees`
--

INSERT INTO `employees` (`id`, `user_id`, `position_id`, `created`, `updated`, `creator_id`) VALUES
(1, 2, 2, '2019-05-06 00:00:00', '2019-05-06 08:30:53', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `employee_positions`
--

CREATE TABLE `employee_positions` (
  `id` bigint(20) NOT NULL,
  `title` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `creator_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `employee_positions`
--

INSERT INTO `employee_positions` (`id`, `title`, `created`, `updated`, `creator_id`) VALUES
(1, 'Бухгалтер', '2019-05-06 00:00:00', '2019-05-06 00:00:00', 1),
(2, 'Программист', '2019-05-06 00:00:00', '2019-05-06 00:00:00', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `periods`
--

CREATE TABLE `periods` (
  `id` bigint(20) NOT NULL,
  `title` text NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `periods`
--

INSERT INTO `periods` (`id`, `title`, `value`) VALUES
(1, 'Каждый месяц', 1),
(2, 'Каждый 2 месяца', 2),
(3, 'Каждый 3 месяца', 3),
(4, 'Каждый 4 месяца', 4),
(5, 'Каждый 5 месяца', 5),
(6, 'Каждый 6 месяца', 6),
(7, 'Каждый 7 месяца', 7),
(8, 'Каждый 8 месяца', 8),
(9, 'Каждый 9 месяца', 9),
(10, 'Каждый 10 месяца', 10),
(11, 'Каждый 11 месяца', 11),
(12, 'Каждый год', 12),
(13, 'Каждый 2 года', 24),
(14, 'Каждый 3 года', 36);

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `month` varchar(2) NOT NULL,
  `day` varchar(2) NOT NULL,
  `notify_time` time NOT NULL DEFAULT '10:00:00',
  `executor_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `template_id` bigint(20) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `creator_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `month`, `day`, `notify_time`, `executor_id`, `company_id`, `template_id`, `content`, `status`, `created`, `creator_id`) VALUES
(39, 'Налоговый отчет: Ф.220.00', '1', '1', '10:00:00', 2, 2, 1, '', 0, '2019-05-06 08:21:11', 1),
(40, 'Налоговый отчет: Ф.200.00', '1', '1', '10:00:00', 2, 2, 7, '', 0, '2019-05-06 08:21:12', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `task_templates`
--

CREATE TABLE `task_templates` (
  `id` bigint(20) NOT NULL,
  `company_type_id` bigint(20) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `period_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `task_templates`
--

INSERT INTO `task_templates` (`id`, `company_type_id`, `title`, `content`, `period_id`) VALUES
(1, 1, 'Налоговый отчет: Ф.220.00', '', 12),
(7, 1, 'Налоговый отчет: Ф.200.00', '', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `reg_date` datetime NOT NULL,
  `user_type_id` bigint(20) NOT NULL,
  `locked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `reg_date`, `user_type_id`, `locked`) VALUES
(1, 'Admin', 'Mr', 'admin@mail.kz', 'b36f9c1587307f2ee243f24ca841e769', '2019-05-05 00:00:00', 1, 0),
(2, 'Baglan', 'Abdirassil', 'developerkz44@gmail.com', 'b36f9c1587307f2ee243f24ca841e769', '2019-05-06 00:00:00', 2, 0),
(6, 'Ilyas', 'Zhuanishev', 'admin@bitlab.kz', 'fc517125be5f13a1c17f083d7b446752', '2019-05-06 06:25:32', 3, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user_types`
--

CREATE TABLE `user_types` (
  `id` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_types`
--

INSERT INTO `user_types` (`id`, `name`, `title`) VALUES
(1, 'manager', 'Менеджер'),
(2, 'employee', 'Cотрудник'),
(3, 'company', 'Компания');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_id` (`creator_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `company_type_id` (`company_type_id`);

--
-- Индексы таблицы `company_types`
--
ALTER TABLE `company_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Индексы таблицы `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `creator_id` (`creator_id`),
  ADD KEY `position_id` (`position_id`);

--
-- Индексы таблицы `employee_positions`
--
ALTER TABLE `employee_positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Индексы таблицы `periods`
--
ALTER TABLE `periods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `executor_id` (`executor_id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `creator_id` (`creator_id`),
  ADD KEY `template_id` (`template_id`);

--
-- Индексы таблицы `task_templates`
--
ALTER TABLE `task_templates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `period_id` (`period_id`),
  ADD KEY `company_type_id` (`company_type_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_type_id` (`user_type_id`);

--
-- Индексы таблицы `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `company_types`
--
ALTER TABLE `company_types`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `employee_positions`
--
ALTER TABLE `employee_positions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `periods`
--
ALTER TABLE `periods`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT для таблицы `task_templates`
--
ALTER TABLE `task_templates`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `companies_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `companies_ibfk_3` FOREIGN KEY (`company_type_id`) REFERENCES `company_types` (`id`);

--
-- Ограничения внешнего ключа таблицы `company_types`
--
ALTER TABLE `company_types`
  ADD CONSTRAINT `company_types_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `employees_ibfk_3` FOREIGN KEY (`position_id`) REFERENCES `employee_positions` (`id`);

--
-- Ограничения внешнего ключа таблицы `employee_positions`
--
ALTER TABLE `employee_positions`
  ADD CONSTRAINT `employee_positions_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`executor_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tasks_ibfk_3` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tasks_ibfk_4` FOREIGN KEY (`template_id`) REFERENCES `task_templates` (`id`);

--
-- Ограничения внешнего ключа таблицы `task_templates`
--
ALTER TABLE `task_templates`
  ADD CONSTRAINT `task_templates_ibfk_1` FOREIGN KEY (`period_id`) REFERENCES `periods` (`id`),
  ADD CONSTRAINT `task_templates_ibfk_2` FOREIGN KEY (`company_type_id`) REFERENCES `company_types` (`id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
