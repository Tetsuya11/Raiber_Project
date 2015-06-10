-- phpMyAdmin SQL Dump
-- version 4.0.10.9
-- http://www.phpmyadmin.net
--
-- ホスト: localhost
-- 生成日時: 2015 年 6 月 10 日 05:13
-- サーバのバージョン: 5.1.73
-- PHP のバージョン: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- データベース: `raiber_project`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `discription` text NOT NULL,
  `image1` varchar(500) NOT NULL,
  `image2` varchar(500) NOT NULL,
  `image3` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `delete_flag` int(11) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- テーブルのデータのダンプ `items`
--

INSERT INTO `items` (`id`, `user_id`, `category_id`, `title`, `name`, `discription`, `image1`, `image2`, `image3`, `status`, `delete_flag`, `created`, `modified`) VALUES
(2, 2, 3, 'Do you want mango?', 'mango', 'Do you love mango?', 'img56440770', '', '', 0, 0, NULL, NULL),
(3, 0, 0, 'りんご', '', '', 'ringo.jpg', '', '', 0, 0, '2015-06-09 14:25:05', '2015-06-09 14:25:05'),
(4, 0, 0, 'りんごpart2', '', '日本から持ってきた青森県産の美味しいりんごです。７個ほど持っていますが何かと交換して欲しい方いますか？', 'ringo.jpg', '', '', 0, 0, '2015-06-09 14:30:53', '2015-06-09 14:30:53'),
(5, 0, 0, 'りんごpart3', '', '日本から持ってきた青森県産の美味しいりんごです。７個ほど持っていますが何かと交換して欲しい方いますか？', 'ringo.jpg', '', '', 0, 0, '2015-06-09 14:32:47', '2015-06-09 14:32:47'),
(6, 0, 0, 'りんごpart4 画像表示されない indexに戻らない', '', '日本から持ってきた青森県産の美味しいりんごです。７個ほど持っていますが何かと交換して欲しい方いますか？', 'ringo.jpg', '', '', 0, 0, '2015-06-09 14:36:30', '2015-06-09 14:36:30'),
(7, 0, 0, 'りんごpart5 画像表示されない indexに戻らない', '', '戻ってこい！！！！！', 'ringo.jpg', '', '', 0, 0, '2015-06-09 14:40:58', '2015-06-09 14:40:58'),
(8, 0, 0, 'りんごpart6編集したよ', '', '戻ってきてーーーーー', 'ringo.jpg', '', '', 0, 0, '2015-06-09 14:44:55', '2015-06-09 16:49:21');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
