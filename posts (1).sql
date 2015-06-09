-- phpMyAdmin SQL Dump
-- version 4.0.10.9
-- http://www.phpmyadmin.net
--
-- ホスト: localhost
-- 生成日時: 2015 年 6 月 09 日 12:30
-- サーバのバージョン: 5.1.73
-- PHP のバージョン: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- データベース: `Raiber_Project`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `reply_post_id` int(11) NOT NULL,
  `delete_flag` int(11) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- テーブルのデータのダンプ `posts`
--

INSERT INTO `posts` (`id`, `message`, `user_id`, `reply_post_id`, `delete_flag`, `created`, `modified`) VALUES
(1, '初ツイート！！', 1, 0, 0, '2015-06-09 11:16:15', NULL),
(2, '続・初ツイート！！', 1, 0, 0, '2015-06-09 11:18:48', NULL),
(3, 'ぞくぞくするぜ・初ツイート！！', 1, 0, 0, '2015-06-09 11:18:48', NULL),
(4, '乗ってきたぜ・初ツイート！！', 1, 0, 0, '2015-06-09 11:18:48', NULL),
(5, 'ブラウザ上で初めての投稿！！', 0, 0, 0, '2015-06-09 20:00:45', '2015-06-09 20:00:45'),
(6, '成功！！', 0, 0, 0, '2015-06-09 20:00:59', '2015-06-09 20:00:59'),
(7, '次はuse_idを載せたいがどうすればいいのか・・・', 0, 0, 0, '2015-06-09 20:04:08', '2015-06-09 20:04:08'),
(8, 'まずはuserを作ろう', 0, 0, 0, '2015-06-09 20:04:35', '2015-06-09 20:04:35');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
