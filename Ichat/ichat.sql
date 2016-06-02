-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-03-18 07:08:15
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ichat`
--

-- --------------------------------------------------------

--
-- 表的结构 `friend`
--

CREATE TABLE IF NOT EXISTS `friend` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` varchar(32) NOT NULL,
  `f_nickname` varchar(32) NOT NULL,
  `zt` tinyint(1) NOT NULL DEFAULT '0',
  `fzt` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=99 ;

--
-- 转存表中的数据 `friend`
--

INSERT INTO `friend` (`id`, `nickname`, `f_nickname`, `zt`, `fzt`) VALUES
(47, 'Spiderman', 'Jet Li', 0, 1),
(22, 'Spiderman', 'Yuan Wang', 0, 1),
(46, 'Sue', 'Jet Li', 0, 1),
(45, '', 'Sue', 0, 1),
(24, 'Spiderman', 'Abc', 0, 1),
(25, 'Spiderman', 'Bill Gates', 0, 1),
(26, 'Spiderman', 'Larry Page', 0, 1),
(44, 'Sue', 'Yuan Wang', 0, 1),
(43, '', 'Yuan Wang', 0, 1),
(30, 'Spiderman', 'Sue', 0, 1),
(42, 'Yuan Wang', 'Sue', 0, 1),
(68, 'Barack Obama', 'Barack Obama', 0, 1),
(35, 'Abc', 'Spiderman', 0, 1),
(40, 'aaa', 'Sue', 0, 1),
(39, 'Sue', 'Spiderman', 0, 1),
(38, 'Sue', 'Abc', 0, 1),
(48, 'Spiderman', 'Susan', 0, 1),
(49, 'Spiderman', 'Bruce Lee', 0, 1),
(67, 'Barack Obama', 'Yuan Wang', 0, 1),
(65, '', 'Sue', 0, 1),
(55, 'Bruce Lee', 'Spiderman', 0, 1),
(56, '', 'Bruce Lee', 0, 1),
(57, 'Bruce Lee', 'Susan', 0, 1),
(64, 'Sue', 'Susan', 0, 1),
(59, '', 'Bruce Lee', 0, 1),
(60, 'Susan', 'Bruce Lee', 0, 1),
(62, 'Susan', 'Sue', 0, 1),
(66, 'Barack Obama', 'Spiderman', 0, 0),
(69, 'Barack Obama', 'Sue', 0, 1),
(70, 'Barack Obama', 'Larry Page', 0, 1),
(71, 'Barack Obama', 'Bill Gates', 0, 1),
(72, 'Barack Obama', 'Jet Li', 0, 1),
(73, 'Barack Obama', 'Bruce Lee', 0, 1),
(74, 'Barack Obama', 'Susan', 0, 1),
(76, '', 'Barack Obama', 0, 1),
(77, 'Bruce Lee', 'Barack Obama', 0, 1),
(78, '', 'Bruce Lee', 0, 1),
(79, '', 'Spiderman', 0, 1),
(80, '', 'Sue', 0, 1),
(81, '', 'Barack Obama', 0, 1),
(82, 'Jet Li', 'Barack Obama', 0, 1),
(83, '', 'Jet Li', 0, 1),
(84, '', 'Barack Obama', 0, 1),
(85, 'Susan', 'Barack Obama', 0, 1),
(86, '', 'Susan', 0, 1),
(87, '', 'Barack Obama', 0, 1),
(88, 'Sue', 'Barack Obama', 0, 1),
(89, '', 'Sue', 0, 1),
(90, '', 'Barack Obama', 0, 1),
(91, 'Larry Page', 'Barack Obama', 0, 1),
(92, '', 'Larry Page', 0, 1),
(93, '', 'Barack Obama', 0, 1),
(94, 'Bill Gates', 'Barack Obama', 0, 1),
(95, '', 'Bill Gates', 0, 1),
(96, '', 'Barack Obama', 0, 1),
(97, 'Yuan Wang', 'Barack Obama', 0, 1),
(98, '', 'Yuan Wang', 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sender` varchar(64) NOT NULL,
  `geter` varchar(64) NOT NULL,
  `content` text NOT NULL,
  `stime` datetime NOT NULL,
  `mloop` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`id`, `sender`, `geter`, `content`, `stime`, `mloop`) VALUES
(1, 'Sue', 'Spiderman', 'hello', '2015-03-14 22:42:47', 1),
(3, 'Sue', 'Spiderman', '12345', '2015-03-14 22:49:19', 1),
(5, 'Sue', 'Spiderman', 'qq', '2015-03-14 22:51:41', 1),
(6, 'Spiderman', 'Sue', 'Hello', '2015-03-15 11:25:03', 1),
(7, 'Spiderman', 'Sue', 'hhh', '2015-03-15 11:26:48', 1),
(8, 'Spiderman', 'Sue', 'he', '2015-03-15 11:42:09', 1),
(9, 'Sue', 'Spiderman', 'hedd', '2015-03-15 11:42:37', 1),
(10, 'Spiderman', 'Sue', '111', '2015-03-15 12:10:18', 1),
(11, 'Sue', 'Spiderman', 'qwqr', '2015-03-15 12:10:54', 1),
(12, 'Aaa', 'Sue', 'hello spider', '2015-03-15 13:20:51', 0),
(13, 'Sue', 'Spiderman', 'Hello', '2015-03-15 13:21:44', 1),
(14, 'Spiderman', 'Sue', 'haha', '2015-03-15 13:22:01', 1),
(15, 'Yuan Wang', 'Sue', 'ddd', '2015-03-15 13:24:17', 1),
(16, 'Sue', 'Yuan Wang', 'hhhhhhhhhhhhhhhhhh', '2015-03-15 13:26:45', 1),
(17, 'Yuan Wang', 'Sue', 'rrrrrrrrrrrrrrr', '2015-03-15 13:26:51', 1),
(18, 'Yuan Wang', 'Sue', 'ddd', '2015-03-15 13:28:05', 1),
(19, 'Yuan Wang', 'Sue', 'fdgf', '2015-03-15 13:28:09', 1),
(20, 'Spiderman', 'Yuan Wang', 'hi', '2015-03-17 20:10:19', 0),
(21, 'Bruce Lee', 'Susan', 'Hi', '2015-03-17 21:15:33', 1),
(22, 'Susan', 'Bruce Lee', 'kkk', '2015-03-17 21:16:19', 1),
(23, 'Sue', 'Susan', 'Hi', '2015-03-17 21:45:01', 1),
(24, 'Sue', 'Susan', 'new', '2015-03-17 21:48:25', 1),
(25, 'Sue', 'Susan', 'new', '2015-03-17 21:48:55', 1),
(26, 'Susan', 'Sue', 'OK', '2015-03-17 21:49:27', 1),
(27, 'Sue', 'Susan', 'HiHI', '2015-03-17 21:57:44', 1),
(28, 'Susan', 'Sue', 'Hello', '2015-03-17 21:58:12', 1),
(29, 'Yuan Wang', 'Barack Obama', 'Hello!', '2015-03-17 22:29:18', 1),
(30, 'Barack Obama', 'Yuan Wang', 'Welcome to the US', '2015-03-17 22:29:55', 1),
(31, 'Yuan Wang', 'Barack Obama', 'Blablabla...', '2015-03-17 22:30:14', 1),
(32, 'Barack Obama', 'Yuan Wang', 'Funny', '2015-03-17 22:30:23', 1),
(33, 'Barack Obama', 'Yuan Wang', 'Bye', '2015-03-17 22:30:42', 1),
(34, 'Yuan Wang', 'Barack Obama', 'Byebye', '2015-03-17 22:30:51', 1);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `login_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `gender`, `login_status`) VALUES
(1, 'Spiderman', 'spiderman@scu.edu', 'e10adc3949ba59abbe56e057f20f883e', 'male', 0),
(2, 'Yuan Wang', 'ywang@scu.edu', 'e10adc3949ba59abbe56e057f20f883e', 'male', 0),
(3, 'Barack Obama', 'bobama@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'male', 0),
(8, 'Sue', 'sue@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'female', 0),
(14, 'Larry Page', 'lpage@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'male', 0),
(15, 'Bill Gates', 'bgates@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'male', 0),
(16, 'Abc', 'abc@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'female', 0),
(17, 'Jet Li', 'jli@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'male', 0),
(18, 'Bruce Lee', 'blee@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'male', 0),
(23, 'Susan', 'susan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'female', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
