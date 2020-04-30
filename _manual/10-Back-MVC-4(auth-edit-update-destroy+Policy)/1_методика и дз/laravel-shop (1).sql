-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 19 2020 г., 09:31
-- Версия сервера: 5.7.29-0ubuntu0.16.04.1
-- Версия PHP: 7.1.33-12+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `laravel-shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `apimessages`
--

CREATE TABLE `apimessages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datevisit` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `apimessages`
--

INSERT INTO `apimessages` (`id`, `user_id`, `title`, `message`, `datevisit`) VALUES
(1, 2, 'aaa', 'bbb', '2020-04-11'),
(2, 1, 'From admin', 'After a morning make-up, for American ladies, and a morning shirt pressing, for American men, he/she runs to their car and heads to the working place.', '2020-04-13'),
(3, 1, 'From admin again', 'The leisure time in the evening is spent either with children, or in the night clubs with friends, or at a restaurant with a beloved person.', '2020-04-13'),
(7, 3, 'Message from Serg...', 'The leisure time in the evening is spent either with children, or in the night clubs with friends, or at a restaurant with a beloved person.', '2020-04-18');

-- --------------------------------------------------------

--
-- Структура таблицы `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `name`, `price`, `image`) VALUES
(1, 1, 'Small Table', '320.00', 'bg-img/6.jpg'),
(2, 1, 'Modern Rocking Chair', '318.00', 'bg-img/8.jpg'),
(3, 2, 'Modern Rocking Chair', '318.00', 'bg-img/8.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_02_02_082606_products', 1),
(4, '2019_02_03_082606_carts', 1),
(5, '2019_02_04_082606_substribes', 1),
(6, '2019_02_05_082606_apimessages', 1),
(7, '2019_02_06_082606_create_foreign_keys', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `top9` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `top9`) VALUES
(1, 'Modern Chair', '180.00', 'bg-img/1.jpg', 1),
(2, 'Minimalistic Plant Pot', '180.00', 'bg-img/2.jpg', 1),
(3, 'Modern Chair', '180.00', 'bg-img/3.jpg', 1),
(4, 'Night Stand', '180.00', 'bg-img/4.jpg', 1),
(5, 'Plant Pot', '18.00', 'bg-img/5.jpg', 1),
(6, 'Small Table', '320.00', 'bg-img/6.jpg', 1),
(8, 'Modern Rocking Chair', '318.00', 'bg-img/8.jpg', 1),
(9, 'Home Deco', '318.00', 'bg-img/9.jpg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `substribes`
--

CREATE TABLE `substribes` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('user','redac','admin') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `api_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `api_token`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$S/cKbm/jxAoCqKVdto9yj.Lz.kTwHFHrVFSv6IVIkYrlqXKxppE/6', 'aBK5garbamEk6ZBTNSRm8cVwOgR6PP6ak6xdDYQUUjyJHArC6ngWp9bfsYgB', '2020-04-11 11:38:28', '2020-04-11 11:38:28', 'admin', 'rzzclJEf'),
(2, 'alex', 'alex@gmail.com', NULL, '$2y$10$a61OmD6Wj/35P/VQrhoxmeuTcwvPWonHI50nDRAyQURJuloCAUWJ6', 'hlRLtadSiZlwptDzuHBLRq3ZUzChJc78vNR9p0c7L3o7m45L4jtzefFaQyac', '2020-04-11 11:38:28', '2020-04-11 11:38:28', 'redac', '37v0alG0'),
(3, 'serg', 'serg@gmail.com', NULL, '$2y$10$.4a.HC7LCqLV/WvmOVxyUOKFr7qFOCMBNmx8jEE143vOtVWjVbDZS', 'YsLK6kc9H1jychmXeHMfjLtMKQ8KWSEtBwuaZCsDgCIOIoy4leHAmNR3gOby', '2020-04-11 11:38:28', '2020-04-11 11:38:28', 'user', 'w10VJmp8'),
(4, 'helen', 'helen@gmail.com', NULL, '$2y$10$PFMmP3vfWp7sNZTOZ5GtW.RTWplXAwKnzFyJkCgpxZ6bL6CGAD8MK', 'eS9yQfY8NT', '2020-04-11 11:38:28', '2020-04-11 11:38:28', 'user', 'JqXSs7Si');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `apimessages`
--
ALTER TABLE `apimessages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apimessages_user_id_index` (`user_id`);

--
-- Индексы таблицы `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_index` (`user_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `substribes`
--
ALTER TABLE `substribes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `apimessages`
--
ALTER TABLE `apimessages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `substribes`
--
ALTER TABLE `substribes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `apimessages`
--
ALTER TABLE `apimessages`
  ADD CONSTRAINT `apimessages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
