-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Янв 16 2015 г., 17:52
-- Версия сервера: 5.6.22
-- Версия PHP: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `toys_new`
--

-- --------------------------------------------------------

--
-- Структура таблицы `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `use` tinyint(1) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `image_url` varchar(255) CHARACTER SET utf8 NOT NULL,
  `href` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `banners`
--

INSERT INTO `banners` (`id`, `use`, `title`, `image_url`, `href`) VALUES
(2, 1, 'banner_2', '2_a110d84f7835e5390bbfe53d7e78051d.png', '/page/actions');

-- --------------------------------------------------------

--
-- Структура таблицы `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('56c603f732dc9c892750417cf4e3affa', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:34.0) Gecko/20100101 Firefox/34.0', 1421254352, 'a:2:{s:9:"user_data";s:0:"";s:4:"user";a:3:{s:8:"username";s:5:"admin";s:9:"logged_in";b:1;s:4:"role";s:1:"1";}}'),
('fd2973c34d4152effb18938ec64b3344', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:34.0) Gecko/20100101 Firefox/34.0', 1421306500, '');

-- --------------------------------------------------------

--
-- Структура таблицы `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `ckey` varchar(255) CHARACTER SET utf8 NOT NULL,
  `value` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`ckey`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `config`
--

INSERT INTO `config` (`ckey`, `value`, `title`) VALUES
('central_office', 'г.Пятигорск, ул.Фрунзе д.10 ', 'Основной адрес'),
('footer', '© ООО ''SLW-Toys''', 'Подвал'),
('kredo', 'SLW-Toys', 'Надпись под логотипом'),
('meta_desc', 'Магазин игрушек в Краснодаре', 'Мета-описание'),
('meta_keywords', 'Игрушки, коляски, дети, веселье', 'Мета-теги'),
('offices', 'Краснодарский край:\nг. Краснодар, ул. Уральская д.40﻿ \nг.Лабинск, ул.Строителей д.1', 'Адреса'),
('phone', 'Самый Лучший Возраст', 'Текст заголовка'),
('title', 'SLW-Toys', 'Заголовок');

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `article` varchar(255) NOT NULL,
  `measure` varchar(50) DEFAULT 'шт.',
  `weight` varchar(50) DEFAULT '0',
  `volume` varchar(50) DEFAULT '0',
  `barcode` varchar(250) DEFAULT '0',
  `packed` varchar(250) DEFAULT NULL,
  `description` text,
  `price` float DEFAULT NULL,
  `in_stock` int(11) NOT NULL DEFAULT '0',
  `meta_desc` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id`, `category_id`, `type_id`, `country_id`, `title`, `article`, `measure`, `weight`, `volume`, `barcode`, `packed`, `description`, `price`, `in_stock`, `meta_desc`, `meta_keywords`) VALUES
(1, 1, NULL, NULL, NULL, '', 'шт.', '0', '0', '0', NULL, NULL, 390, 0, NULL, NULL),
(2, 1, 1, 2, ' Матрешка матрешечная Матрешка матрешечная', '', 'шт.', '5', '5', '4242424242421444444', '', '<p>Матрешка матрешечная, очень красивая, Китай нрукриукикцпк3пукм екпкупрвпикуи укпукикупкп купукпукп куекпукпукпк упукпкуп</p>', 390, 0, '', ''),
(3, 1, NULL, NULL, NULL, '', 'шт.', '0', '0', '0', NULL, NULL, 390, 0, NULL, NULL),
(4, 2, 3, 2, ' Матрешка матрешечная Матрешка матрешечная', '', 'шт.', '5', '5', '4242424242421', NULL, 'Матрешка матрешечная, очень красивая, Китай', 390, 0, NULL, NULL),
(5, 2, 3, 2, ' Матрешка матрешечная Матрешка матрешечная', '', 'шт.', '5', '5', '4242424242421', NULL, 'Матрешка матрешечная, очень красивая, Китай', 390, 0, NULL, NULL),
(6, 1, 3, 1, ' Матрешка матрешечная Матрешка матрешечная', '', 'шт.', '5', '5', '4242424242421', NULL, 'Матрешка матрешечная, очень красивая, Китай', 390, 0, NULL, NULL),
(7, NULL, NULL, NULL, NULL, '', 'шт.', '0', '0', '0', NULL, NULL, NULL, 0, NULL, NULL),
(8, NULL, NULL, NULL, NULL, '', 'шт.', '0', '0', '0', NULL, NULL, NULL, 0, NULL, NULL),
(9, NULL, NULL, NULL, NULL, '', 'шт.', '0', '0', '0', NULL, NULL, NULL, 0, NULL, NULL),
(10, NULL, NULL, NULL, NULL, '', 'шт.', '0', '0', '0', NULL, NULL, NULL, 0, NULL, NULL),
(11, NULL, NULL, NULL, NULL, '', 'шт.', '0', '0', '0', NULL, NULL, NULL, 0, NULL, NULL),
(12, NULL, NULL, NULL, NULL, '', 'шт.', '0', '0', '0', NULL, NULL, NULL, 0, NULL, NULL),
(13, NULL, NULL, NULL, NULL, '', 'шт.', '0', '0', '0', NULL, NULL, NULL, 0, NULL, NULL),
(14, NULL, NULL, NULL, NULL, '', 'шт.', '0', '0', '0', NULL, NULL, NULL, 0, NULL, NULL),
(15, NULL, NULL, NULL, NULL, '', 'шт.', '0', '0', '0', NULL, NULL, NULL, 0, NULL, NULL),
(16, NULL, NULL, NULL, NULL, '', 'шт.', '0', '0', '0', NULL, NULL, NULL, 0, NULL, NULL),
(17, NULL, NULL, NULL, NULL, '', 'шт.', '0', '0', '0', NULL, NULL, NULL, 0, NULL, NULL),
(18, NULL, NULL, NULL, NULL, '', 'шт.', '0', '0', '0', NULL, NULL, NULL, 0, NULL, NULL),
(19, NULL, NULL, NULL, NULL, '', 'шт.', '0', '0', '0', NULL, NULL, NULL, 0, NULL, NULL),
(20, NULL, NULL, NULL, NULL, '', 'шт.', '0', '0', '0', NULL, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `items_category`
--

CREATE TABLE IF NOT EXISTS `items_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `category_title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `items_category`
--

INSERT INTO `items_category` (`id`, `slug`, `category_title`) VALUES
(1, '', 'Игрушки'),
(2, '', 'Велосипеды');

-- --------------------------------------------------------

--
-- Структура таблицы `items_countries`
--

CREATE TABLE IF NOT EXISTS `items_countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `items_countries`
--

INSERT INTO `items_countries` (`id`, `country_title`) VALUES
(1, 'Россия'),
(2, 'Китай');

-- --------------------------------------------------------

--
-- Структура таблицы `items_images`
--

CREATE TABLE IF NOT EXISTS `items_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `items_images`
--

INSERT INTO `items_images` (`id`, `item_id`, `image_url`) VALUES
(6, 2, '2_b35cd3b35d5fa471d034301e2a982d2c.png'),
(7, 2, '2_cf0aa61c305a0d992bff5cfc8560079f.png'),
(8, 2, '2_9fce3ca6e8b682de8e56ba25a5a8491a.jpg'),
(9, 2, '2_cfc0f4eb4e4d7ca9e1a1d41066d53825.jpg'),
(10, 2, '2_8c034844146bff662b7588261dc75d99.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `items_types`
--

CREATE TABLE IF NOT EXISTS `items_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `items_types`
--

INSERT INTO `items_types` (`id`, `type_title`) VALUES
(1, 'Куклы'),
(2, 'Машинки'),
(3, 'Спортивные');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) CHARACTER SET utf8 NOT NULL,
  `slug` varchar(128) CHARACTER SET utf8 NOT NULL,
  `text` text CHARACTER SET utf8 NOT NULL,
  `meta_desc` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `meta_keywords` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `text`, `meta_desc`, `meta_keywords`, `created`) VALUES
(4, '15 февраля - Сретенье. Первая встреча зимы с весной.', '15 февраля 2015', '<p>Вот и Сретенье пришло,<br />Землю снегом замело,<br />Но душа уже поет:<br />Все равно весне черед.</p>', 'Сретенье, СЛВ, игрушки', 'Сретенье, СЛВ, игрушки', '2015-01-14 19:54:17'),
(5, 'Минимальный заказ.', '14 Января, 13:45', '<p>Уважаемые покупатели! Обращаем Ваше внимание на то, что <span style="text-decoration: underline;">минимальный заказ в нашем магазине 1 - упаковка</span>. При формировании заказа выбирайте способ доставки "По согласованию с администрацией". Всегда рады Вам в нашем магазине!&nbsp;</p>', 'Игрушки, СЛВ, Краснодар', 'Игрушки, СЛВ, Краснодар', '2015-01-14 19:23:13');

-- --------------------------------------------------------

--
-- Структура таблицы `slides`
--

CREATE TABLE IF NOT EXISTS `slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `image_url` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `slides`
--

INSERT INTO `slides` (`id`, `title`, `image_url`) VALUES
(1, 'slide_1', '1_3f848046a9c8b31d177746eb11535e99.png'),
(2, 'slide_2', '2_dbbdf2a9d7965e8b2edbc3cf20f7ba38.JPG'),
(3, 'slide_3', '3_3b8c490d1b34b51ba4f77db70c8bd719.jpg'),
(4, 'slide_4', '4_46538a88d4ba070714fc57edcd273de4.png');

-- --------------------------------------------------------

--
-- Структура таблицы `static_pages`
--

CREATE TABLE IF NOT EXISTS `static_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `meta_desc` text,
  `meta_keywords` text,
  `desc` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `static_pages`
--

INSERT INTO `static_pages` (`id`, `name`, `title`, `meta_desc`, `meta_keywords`, `desc`) VALUES
(1, 'ipoteka', 'Ипотека', 'описание ипотеки', 'ключевики ипотеки', '<p><strong dir="auto">Ипотека</strong>&nbsp;&mdash; это одна из форм <a title="Залог (гражданское право)" href="../wiki/%D0%97%D0%B0%D0%BB%D0%BE%D0%B3_(%D0%B3%D1%80%D0%B0%D0%B6%D0%B4%D0%B0%D0%BD%D1%81%D0%BA%D0%BE%D0%B5_%D0%BF%D1%80%D0%B0%D0%B2%D0%BE)">залога</a>, при которой закладываемое недвижимое имущество остается в собственности должника, а <a title="Кредитор" href="../wiki/%D0%9A%D1%80%D0%B5%D0%B4%D0%B8%D1%82%D0%BE%D1%80">кредитор</a> в случае невыполнения последним своего обязательства приобретает право получить удовлетворение за счет реализации данного имущества. Имущество, на которое установлена ипотека, остается у залогодателя в его владении и пользовании.</p>\n<div id="bodyContent" class="mw-body-content">\n<div id="mw-content-text" class="mw-content-ltr" dir="ltr" lang="ru">\n<p>Следует различать понятия ипотека и <a title="Ипотечное кредитование" href="../wiki/%D0%98%D0%BF%D0%BE%D1%82%D0%B5%D1%87%D0%BD%D0%BE%D0%B5_%D0%BA%D1%80%D0%B5%D0%B4%D0%B8%D1%82%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5">ипотечное кредитование</a>, при котором <a title="Кредит" href="../wiki/%D0%9A%D1%80%D0%B5%D0%B4%D0%B8%D1%82">кредит</a> выдаётся <a title="Банк" href="../wiki/%D0%91%D0%B0%D0%BD%D0%BA">банком</a> под залог недвижимого имущества. Ипотечный кредит&nbsp;&mdash; одна из составляющих ипотечной системы. При получении кредита на покупку недвижимого имущества сама приобретаемая недвижимость поступает в ипотеку (залог) банку как гарантия возврата кредита.</p>\n<p>Ипотекой является также залог уже существующего недвижимого имущества собственника для получения им кредита или <a title="Заём" href="../wiki/%D0%97%D0%B0%D1%91%D0%BC">займа</a>, которые будут направлены либо на ремонт или строительство, либо на иные нужды по усмотрению заемщика-залогодателя.</p>\n<p>В случае неисполнения основного обязательства, взыскание обращается только на заложенное недвижимое имущество, а залогодержатель имеет преимущественное право на удовлетворение своих требований перед другими <a title="Кредитор" href="../wiki/%D0%9A%D1%80%D0%B5%D0%B4%D0%B8%D1%82%D0%BE%D1%80">кредиторами</a> должника. Одним из способов снижения рисков кредитора является <a title="Ипотечное страхование" href="../wiki/%D0%98%D0%BF%D0%BE%D1%82%D0%B5%D1%87%D0%BD%D0%BE%D0%B5_%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5">ипотечное страхование</a>.</p>\n&nbsp;<br />\n<h2><span id=".D0.9F.D1.80.D0.BE.D0.B8.D1.81.D1.85.D0.BE.D0.B6.D0.B4.D0.B5.D0.BD.D0.B8.D0.B5_.D0.BF.D0.BE.D0.BD.D1.8F.D1.82.D0.B8.D1.8F" class="mw-headline">Происхождение понятия</span></h2>\n<p>Термин &laquo;ипотека&raquo; (от <a title="Древнегреческий язык" href="../wiki/%D0%94%D1%80%D0%B5%D0%B2%D0%BD%D0%B5%D0%B3%D1%80%D0%B5%D1%87%D0%B5%D1%81%D0%BA%D0%B8%D0%B9_%D1%8F%D0%B7%D1%8B%D0%BA">др.-греч.</a> <span lang="grc" xml:lang="grc"><span style="font-family: palatino linotype, new athena unicode, athena, gentium, code2000, serif; font-size: 105%;">ὑ&pi;&omicron;&theta;ή&kappa;&eta;</span></span>) впервые появился в <a title="Греция" href="../wiki/%D0%93%D1%80%D0%B5%D1%86%D0%B8%D1%8F">Греции</a> в начале VI&nbsp;в. до&nbsp;н.&nbsp;э. Древние <a title="Греки" href="../wiki/%D0%93%D1%80%D0%B5%D0%BA%D0%B8">греки</a> так обозначали форму ответственности <a title="Должник" href="../wiki/%D0%94%D0%BE%D0%BB%D0%B6%D0%BD%D0%B8%D0%BA">должника</a> перед <a title="Кредитор" href="../wiki/%D0%9A%D1%80%D0%B5%D0%B4%D0%B8%D1%82%D0%BE%D1%80">кредитором</a> своей <a title="Земля" href="../wiki/%D0%97%D0%B5%D0%BC%D0%BB%D1%8F">землёй</a>. На границе земельного участка заёмщика ставили столб с надписью, которая гласила, что эта земля обеспечивает <a title="Долг" href="../wiki/%D0%94%D0%BE%D0%BB%D0%B3">долг</a>. Такой столб и назывался &laquo;ипотекой&raquo;, в переводе с древнегреческого&nbsp;&mdash; &laquo;подпорка&raquo;, &laquo;подставка&raquo;. Хотя залог земли, как способ обеспечения исполнения <a title="Обязательство" href="../wiki/%D0%9E%D0%B1%D1%8F%D0%B7%D0%B0%D1%82%D0%B5%D0%BB%D1%8C%D1%81%D1%82%D0%B2%D0%BE">обязательства</a>, был известен ещё в <a title="Древний Египет" href="../wiki/%D0%94%D1%80%D0%B5%D0%B2%D0%BD%D0%B8%D0%B9_%D0%95%D0%B3%D0%B8%D0%BF%D0%B5%D1%82">Древнем Египте</a>.</p>\n<h2><span id=".D0.9E.D1.81.D0.BE.D0.B1.D0.B5.D0.BD.D0.BD.D0.BE.D1.81.D1.82.D0.B8_.D0.B8.D0.BF.D0.BE.D1.82.D0.B5.D1.87.D0.BD.D0.BE.D0.B3.D0.BE_.D0.BA.D1.80.D0.B5.D0.B4.D0.B8.D1.82.D0.B0" class="mw-headline">Особенности ипотечного кредита</span></h2>\n<p>Кредит выдаётся обычно на длительный срок. Процентная ставка по ипотечному кредиту обычно ниже, чем по другим видам кредитов, особенно в случае низкой оценки рисков, которой, например, может способствовать низкое соотношение суммы кредита к оценочной стоимости недвижимости, ликвидность и другие причины. Обычно банк выдвигает к заёмщику ипотечного кредита менее жёсткие требования, чем при других видах кредитования, тем не менее обычной практикой является проверка дохода, требование страхования залога, проверка оценки недвижимости аккредитованными оценщиками, иногда проверка непрерывного стажа работы и прочие действия, повышающие безопасность сделки. Погашение ипотечного кредита часто осуществляется равными платежами&nbsp;&mdash; <a title="Аннуитет" href="../wiki/%D0%90%D0%BD%D0%BD%D1%83%D0%B8%D1%82%D0%B5%D1%82">аннуитетами</a>. Размер такого постоянного <em>аннуитетного платежа</em> (<strong><img class="mwe-math-fallback-png-inline tex" src="//upload.wikimedia.org/math/7/f/c/7fc56270e7a70fa81a5935b72eacbe29.png" alt="A" /></strong>) вычисляется по формуле:</p>\n<p><img class="mwe-math-fallback-png-inline tex" src="//upload.wikimedia.org/math/1/c/4/1c4b58d3c308d9032e9fc4bfecc2f819.png" alt="A=\\frac{S * p}{1-(1+p)^{-n}}" />, где <img class="mwe-math-fallback-png-inline tex" src="//upload.wikimedia.org/math/5/d/b/5dbc98dcc983a70728bd082d1a47546e.png" alt="S" />&nbsp;&mdash; величина (тело) кредита, <img class="mwe-math-fallback-png-inline tex" src="//upload.wikimedia.org/math/8/3/8/83878c91171338902e0fe0fb97a8c47a.png" alt="p" />&nbsp;&mdash; величина процентной ставки за период (в долях), <img class="mwe-math-fallback-png-inline tex" src="//upload.wikimedia.org/math/7/b/8/7b8b965ad4bca0e41ab51de7b31363a1.png" alt="n" />&nbsp;&mdash; количество периодов. Но существуют и многие другие программы погашения. Одна из иных форм&nbsp;&mdash; <em>дифференцированные платежи</em> (когда тело <a title="Кредит" href="../wiki/%D0%9A%D1%80%D0%B5%D0%B4%D0%B8%D1%82">кредита</a> выплачивают равными долями, а процентные платежи меняются от максимума в начале, до минимума в конце); здесь размер первого платежа (<img class="mwe-math-fallback-png-inline tex" src="//upload.wikimedia.org/math/2/7/f/27f237e6b7f96587b6202ff3607ad88a.png" alt="A1" />) таков: <strong><img class="mwe-math-fallback-png-inline tex" src="//upload.wikimedia.org/math/f/3/9/f3969031ccb3070ab69678f1b7d22082.png" alt="A1=S*(p+ 1/n)" /></strong>.</p>\n<p>Достоинством дифференцированной формы платежей является меньшая сумма процентов (меньше переплата).</p>\n</div>\n</div>'),
(2, 'education', 'Обучение и вакансии', 'Обучение и вакансии', 'Обучение и вакансии', '<div style="float: right;">&laquo;Не думай о карьере свысока,<br /> Наступит время &ndash; сам поймешь, наверное,<br /> Карьера в жизни каждого важна<br /> Карьера, карьера, карьера&hellip;&raquo;</div>\n<p><br /> <br /> <br /> <br /> <br /> <br /> <br /> Карьера в сфере недвижимости предполагает как горизонтальное, так и вертикальное развитие.<br /> <br /> Горизонтальный карьерный рост предполагает профессиональное развитие специалиста по недвижимости от &laquo;зеленого&raquo; новичка до эксперта, основанное на последовательном, постоянном и системном обучении в корпоративном институте &laquo;REAList&raquo;.</p>\n<h2>Для новичков (стажеров)</h2>\n<p><br /> проводится обучение продолжительностью 2 недели, включающее семинары, практические занятия, лекционные курсы, психологические тренинги. Учебные мероприятия проводятся специалистами компании (преподавателями корпоративного университета), которые посвящают стажеров во все тонкости риэлторской деятельности. Всем слушателям предоставляются развернутые раздаточные материалы. Обучение завершается аттестационным экзаменом, который позволяет оценить степень освоения стажерами учебного материала.</p>\n<h2>Обучение для состоявшихся специалистов</h2>\n<p><br /> предусматривает два основных направления: специальное и психологическое. <br /> Специальное направление включает в себя: <br /> <br /> <strong>тематические семинары</strong> &ndash; с участием приглашенных лекторов, которые знакомят с существующей практикой, процедурными нововведениями, отвечают на различные вопросы <br /> <br /> <strong>мастер-классы</strong> &ndash; проводятся опытными специалистами компании по принципу &laquo;делай, как я!&raquo;, рассказывающими о своей успешной практике <br /> <br /> <strong>юридические практикумы</strong> &ndash; юристы компании рассказывают о новостях в законодательстве, разбирают различные ситуации, знакомят с изменениями в типовой документации.<br /> <br /> Система психологических тренингов и деловых игр направлена на развитие коммуникативной компетентности, уверенности в себе и формирует навыки ведения переговоров, принятия нестандартных решений. Теоретический материал сведен к минимуму, что позволяет превратить занятия в увлекательную, веселую и полезную игру. В игровой форме отрабатываются техники самопрезентации, установления доверительных отношений с клиентом, разрешения конфликтных ситуаций, подачи цены объекта недвижимости и услуг, а также множество других важных элементов, определяющих успешность риэлтора.<br /> <br /> При достижении определенного профессионального уровня, специалисты могут пойти путем создания собственной команды через делегирование части своих отдельных профессиональных задач ассистентам, которых могут нанять к себе на работу. Таким образом, увеличивая масштаб своей эффективности и продуктивности, такие специалисты имеют возможность выйти на новый профессиональный уровень, получить более широкую реализацию своего бизнеса внутри компании.</p>\n<h2>Вертикальная карьера</h2>\n<p><br /> предполагает не только профессиональный, но и должностной рост сотрудника.<br /> Именно на реализации таких карьерных возможностей основано динамичное развитие агентства, разветвленная филиальная сеть которого сегодня состоит из 35 отделений, открытых по инициативе успешных специалистов, пожелавших реализовать свои управленческие амбиции.<br /> <br /> Поскольку состав руководителей различного уровня постоянно пополняется и обновляется, в компании большое внимание уделяется программам управленческого обучения в корпоративном институте &laquo;REAList&raquo;, которые включают в себя цикл семинаров, тренингов, деловых игр, непосредственно связанных с реальной практикой. Целью такого обучения являются рост управленческой компетенции руководителей, аккумуляция и передача передового опыта, совершенствование технологий и повышение эффективности работы.<br /> <br /> С недавнего времени в &laquo;Невальянс&raquo; внедряется практика создания индивидуальных стратегических планов развития личной карьеры сотрудников. Данные планы разрабатываются адресно с помощью непосредственного руководителя в соответствии с личными целями сотрудника и представляют собой абсолютно прозрачную и ясную концепцию построения его карьеры.<br /> <br /> В нашей компании есть немало ярких примеров успешного развития карьеры, которые являются доказательством неограниченных возможностей каждого сотрудника.<br /> <br /> <br /> Залог долгосрочного успеха в нашей компании &ndash; Ваше искреннее желание<br /> быть частью Команды Невальянс, ибо Мы любим, то что мы делаем!<br /> Удовлетворенность и доверие каждого нашего сотрудника &ndash;<br /> это честь и привилегия для Нас!</p>'),
(3, 'contact', 'Контакты', 'Контакты', 'Контакты', '<p style="text-align: center;"><span style="font-size: x-large;"><span style="font-family: times new roman,times;">&nbsp;</span></span></p>\n<table style="width: 685px; height: 123px;" border="0">\n<tbody>\n<tr>\n<td><span style="font-family: georgia,palatino;"><span style="font-size: large;">e-mail:<br /></span></span></td>\n<td><span style="font-size: large;"><span style="font-family: georgia,palatino;">317417@mail.ru</span></span></td>\n</tr>\n<tr>\n<td><span style="font-family: georgia,palatino;"><span style="font-size: large;">тел:</span></span></td>\n<td><span style="font-size: large;"><span style="font-family: georgia,palatino;">(8793) 317-417</span></span></td>\n</tr>\n<tr>\n<td>&nbsp;</td>\n<td><span style="font-size: large;"><span style="font-family: georgia,palatino;">(8793) 317-418</span></span></td>\n</tr>\n<tr>\n<td>&nbsp;</td>\n<td><span style="font-size: large;"><span style="font-family: georgia,palatino;">(8793) 317-419</span></span></td>\n</tr>\n<tr>\n<td>&nbsp;</td>\n<td><span style="font-size: large;"><span style="font-family: georgia,palatino;">(8793) 317-420</span></span></td>\n</tr>\n</tbody>\n</table>'),
(4, 'about', 'О компании', 'О компании', 'О компании', '<p style="text-align: center;"><span style="font-family: andale mono,times;"><span style="font-size: x-large;">Здравствуйте, мы рады, что наш магазин заинтересовал Вас.</span></span></p>\n<p><span style="font-family: andale mono,times;"><span style="font-size: large;">Наш магазин расчитан на оптовых покупателей дестких игрушек отечественных и зарубежных производителей.<br /></span></span></p>\n<p><span style="font-family: andale mono,times;"><span style="font-size: large;">Для того, что бы зарегистрироваться в системе и начать делать заказы в магазине Вам необходимо связаться с нашими менеджерами. Контактные данные Вы можете получить в разделе <a title="&quot;Контакты&quot;" href="../page/contact">"Контакты".</a></span></span></p>'),
(5, 'anketa', 'Анкета', 'анкета', 'анкета', 'анкета соискателя'),
(6, 'actions', 'Акции', 'Акции', 'Акции', 'Акции'),
(7, 'services', 'Услуги', 'Услуги', 'Услуги', '<p><span style="font-family: andale mono,times;"><span style="font-size: large;">Доставка производится по согласованию с нашими менеджерами, в момент согласования заказа. </span></span></p>\n<p><span style="font-family: andale mono,times;"><span style="font-size: large;">В зависимости от объема Вашего заказа, мы можем доставить заказ автомобилями:</span></span></p>\n<p><span style="font-family: andale mono,times;"><span style="font-size: large;">ГАЗ''ель объемом до 16 м<sup>3</sup></span></span></p>\n<p><span style="font-family: andale mono,times;"><span style="font-size: large;">Автомобилями объемом до 65 м<sup>3</sup></span></span></p>\n<p><span style="font-family: andale mono,times;"><span style="font-size: large;">Так-же вы можете самостоятельно забрать Ваш заказ у нас на складе.</span></span></p>\n<p><span style="font-family: andale mono,times;"><span style="font-size: large;">Свяжитесь с нашими менеджерами и согласуйте забор Вашего заказа. Контактная информация доступна в разделе <a title="Контакты" href="../page/contact">"Контакты"</a></span></span></p>');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) CHARACTER SET utf8 NOT NULL,
  `password` varchar(128) CHARACTER SET utf8 NOT NULL,
  `role_id` int(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`) VALUES
(1, 'admin', '698d51a19d8a121ce581499d7b701668', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
