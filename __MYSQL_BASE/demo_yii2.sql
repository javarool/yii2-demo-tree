-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июл 08 2017 г., 15:38
-- Версия сервера: 5.7.17-log
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `demo_yii2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `parents_id` varchar(255) CHARACTER SET cp1251 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu_items`
--

INSERT INTO `menu_items` (`id`, `link`, `name`, `parents_id`) VALUES
(18, 'http://bourabai.kz/alg/oop.htm', 'Основные понятия ООП', ''),
(19, 'http://bourabai.kz/alg/oop.htm', 'Основы теории трансляторов', ''),
(20, 'http://bourabai.kz/alg/oop.htm', 'Платформы ООП', ''),
(21, 'http://bourabai.kz/alg/oop3.htm', 'Введение в ООП. История ООП', '18'),
(22, 'http://bourabai.kz/alg/oop31.htm', 'ОО-технология разработки программ', '18'),
(23, 'http://bourabai.kz/alg/oop1.htm', 'Типы данных', '18'),
(24, 'http://bourabai.kz/alg/oop32.htm#3', 'Инкапсуляция', '18'),
(25, 'http://bourabai.kz/alg/oop32.htm#4', 'Наследование', '18'),
(26, 'http://bourabai.kz/alg/oop32.htm#5', 'Полиморфизм', '18'),
(27, 'http://bourabai.kz/alg/oop2.htm', 'Методология программирования', '18'),
(28, 'http://bourabai.kz/alg/oop119.htm', 'Объектно-ориентированные системы', '18'),
(29, 'http://bourabai.kz/alg/a23.htm', 'Транслятор, компилятор, интерпретатор', '19'),
(30, 'http://bourabai.kz/dm/translators.htm', 'Введение в теорию трансляторов', '19'),
(31, 'http://bourabai.kz/dm/grammar.htm', 'Теория формальных грамматик', '19'),
(32, 'http://bourabai.kz/alg/java.htm', 'Технология Java', '20'),
(33, 'http://bourabai.kz/alg/dll.htm', 'DLL - динамические библиотеки', '20'),
(34, 'http://bourabai.kz/alg/dde.htm', 'Технология взаимодействия программ DDE', '20'),
(35, 'http://bourabai.kz/alg/oop3.htm', 'Естественное стремление разработчиков программ', '18,21'),
(36, 'http://bourabai.kz/alg/oop3.htm', 'Развитие технологии и языков программирования', '18,21,35'),
(37, 'http://bourabai.kz/alg/oop31.htm', 'Объектно-ориентированное программирование', '18,22'),
(38, 'http://bourabai.kz/alg/oop31.htm', 'Объектно – ориентированная технология разработки программ', '18,22'),
(39, 'http://bourabai.kz/alg/oop31.htm', 'Объект', '18,22'),
(40, 'http://bourabai.kz/alg/oop31.htm', 'Объект состоит из следующих трех частей', '18,22,37'),
(41, 'http://bourabai.kz/alg/oop31.htm', 'имя объекта', '18,22,37,40'),
(42, 'http://bourabai.kz/alg/oop31.htm', 'состояние (переменные состояния);', '18,22,37,40'),
(43, 'http://bourabai.kz/alg/oop31.htm', 'методы (операции).', '18,22,37,40'),
(44, 'http://bourabai.kz/alg/oop1.htm#1', 'Современное понятие типа в языках программирования', '18,23'),
(45, 'http://bourabai.kz/alg/oop1.htm', 'Базовые типы.', '18,23'),
(46, 'http://bourabai.kz/alg/oop1.htm', 'Основные конструкторы типов.', '18,23'),
(47, 'http://bourabai.kz/alg/oop1.htm#1', 'Целый (integer)', '18,23,45'),
(48, 'http://bourabai.kz/alg/oop1.htm#1', 'Литерный (char)', '18,23,45'),
(49, 'http://bourabai.kz/alg/oop1.htm#1', 'Вещественный (real, float, double …)', '18,23,45'),
(50, 'https://habrahabr.ru/post/210288/', 'Шпаргалка по шаблонам проектирования', ''),
(51, 'http://developer.uz/blog/activerecord-yii2-and-yii1/', 'Сравнение ActiveRecord в Yii2 и Yii1', ''),
(52, 'http://www.yiiframework.com/doc/guide/1.1/ru/index', 'Полное руководство по Yii', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
