-- phpMyAdmin SQL Dump
-- version 4.0.10.9
-- http://www.phpmyadmin.net
--
-- ホスト: localhost
-- 生成日時: 2016 年 1 月 31 日 12:13
-- サーバのバージョン: 5.1.73
-- PHP のバージョン: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- データベース: `Raiber`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_date` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- テーブルのデータのダンプ `categories`
--

INSERT INTO `categories` (`id`, `name`, `user_id`, `deleted`, `deleted_date`, `created`, `modified`) VALUES
(1, '本 Book', 0, 0, NULL, NULL, NULL),
(2, '生活用品 Daily necessities', 0, 0, NULL, NULL, NULL),
(3, '食品 Food', 0, 0, NULL, NULL, NULL),
(4, '電気機器類 Electrical', 0, 0, NULL, NULL, NULL),
(5, 'リクエスト Request', 0, 0, NULL, NULL, NULL),
(6, 'その他', 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `favorites`
--

CREATE TABLE IF NOT EXISTS `favorites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `discription` text NOT NULL,
  `image1` varchar(500) NOT NULL,
  `image2` varchar(500) NOT NULL,
  `image3` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) DEFAULT '0',
  `deleted_date` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=186 ;

--
-- テーブルのデータのダンプ `items`
--

INSERT INTO `items` (`id`, `user_id`, `category_id`, `title`, `discription`, `image1`, `image2`, `image3`, `status`, `deleted`, `deleted_date`, `created`, `modified`) VALUES
(182, 117, 3, 'New Raiber', 'Hello, brand new world!!   Hello, brand new world!!   Hello, brand new world!!   Hello, brand new world!!   Hello, brand new world!!   Hello, brand new world!!   Hello, brand new world!!   Hello, brand new world!!   Hello, brand new world!!   Hello, brand new world!!   Hello, brand new world!!   Hello, brand new world!!   Hello, brand new world!!   Hello, brand new world!!   Hello, brand new world!!   Hello, brand new world!!   Hello, brand new world!!   Hello, brand new world!!   Hello, brand new world!!   Hello, brand new world!!   Hello, brand new world!!   Hello, brand new world!!   Hello, brand new world!!   Hello, brand new world!!   Hello, brand new world!!   Hello, brand new world!!   Hello, brand new world!!   Hello, brand new world!!   Hello, brand new world!!   Hello, brand new world!!   ', 'apple.jpg', 'orange.jpg', 'mango.jpg', 0, 0, NULL, '2015-10-10 15:27:05', '2015-11-15 14:31:58'),
(183, 118, 2, 'hige', 'baby', 'baby.jpeg', '', '', 0, 0, NULL, '2015-10-10 15:50:40', '2015-10-10 15:50:40'),
(184, 118, 3, 'coffee', 'relux', 'coffee.jpg', '', '', 0, 0, NULL, '2015-10-10 15:51:03', '2015-10-10 15:51:03'),
(185, 117, 2, 'シャンプー欲しい人いませんか？', 'TSUBAKIのシャンプーです。もうすぐ卒業するので余った物欲しいかたがいたら交換してください。未使用の物と半分以上残っている物があります。', '077cc654584828d5473c0e90894f730b_9048.jpeg', '86080461000728691.jpg', '337.jpg', 0, 0, NULL, '2015-10-11 09:56:12', '2015-11-15 14:33:39');

-- --------------------------------------------------------

--
-- テーブルの構造 `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `reply_post_id` int(11) NOT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `deleted_date` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=201 ;


--
-- テーブルの構造 `trades`
--

CREATE TABLE IF NOT EXISTS `trades` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `get_user_id` int(11) NOT NULL,
  `get_item_id` int(11) NOT NULL,
  `delete_flag` int(11) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(1) NOT NULL,
  `fb_id` int(11) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=122 ;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
