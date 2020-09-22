-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2020-09-22 02:45:52
-- 服务器版本： 10.4.13-MariaDB
-- PHP 版本： 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `ks`
--

-- --------------------------------------------------------

--
-- 表的结构 `admins`
--

CREATE TABLE `admins` (
  `id` int(4) NOT NULL,
  `user` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `pass` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `admins`
--

INSERT INTO `admins` (`id`, `user`, `pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `item_pool`
--

CREATE TABLE `item_pool` (
  `id` int(4) NOT NULL,
  `titles` varchar(300) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '题目',
  `types` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '题型',
  `A` varchar(300) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `B` varchar(300) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `C` varchar(300) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `D` varchar(300) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `rights` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '正确答案'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `item_pool`
--

INSERT INTO `item_pool` (`id`, `titles`, `types`, `A`, `B`, `C`, `D`, `rights`) VALUES
(1, '山区上坡路段跟车过程中遇前车停车时怎么办？', '单选', 'A、从前车两侧超越', 'B、紧跟前车后停车', 'C、保持大距离停车', 'D、连续鸣喇叭提示', 'B'),
(2, '驾驶机动车在山区道路怎样跟车行驶？', '单选', 'A、紧随前车之后', 'B、加大安全距离', 'C、减小纵向间距', 'D、尽快超越前车', 'B'),
(3, '下长坡连续使用行车制动会造成什么不良后果？', '单选', 'A、缩短发动机使用寿命', 'B、驾驶人容易疲劳', 'C、容易造成机动车倾翻', 'D、制动器制动效果下降', 'B'),
(4, '山区上坡路段跟车过程中遇前车停车时怎么办？', '单选', 'A、从前车两侧超越', 'B、紧跟前车后停车', 'C、保持大距离停车', 'D、连续鸣喇叭提示', 'B'),
(5, '驾驶机动车在山区道路怎样跟车行驶？', '单选', 'A、紧随前车之后', 'B、加大安全距离', 'C、减小纵向间距', 'D、尽快超越前车', 'B'),
(6, '下长坡连续使用行车制动会造成什么不良后果？', '单选', 'A、缩短发动机使用寿命', 'B、驾驶人容易疲劳', 'C、容易造成机动车倾翻', 'D、制动器制动效果下降', 'B');

-- --------------------------------------------------------

--
-- 表的结构 `systems`
--

CREATE TABLE `systems` (
  `id` int(3) NOT NULL,
  `max_num` int(3) NOT NULL COMMENT '随机考试个数'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `systems`
--

INSERT INTO `systems` (`id`, `max_num`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `id` int(6) NOT NULL,
  `names` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '用户名',
  `pass` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '密码',
  `codes` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '身份证号',
  `grades` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '总成绩'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `names`, `pass`, `codes`, `grades`) VALUES
(1, 'liujunjun', 'e10adc3949ba59abbe56e057f20f883e', '132522198802031234', '99.99'),
(2, '李思远', 'e10adc3949ba59abbe56e057f20f883e', '132522198802031236', '33.33');

-- --------------------------------------------------------

--
-- 表的结构 `user_pool`
--

CREATE TABLE `user_pool` (
  `id` int(10) NOT NULL,
  `names` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '用户名',
  `codes` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '身份证号',
  `title_num_self` varchar(4) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '自己题号',
  `title_num` varchar(4) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '题库的题号',
  `results` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '自己答案',
  `grades` float NOT NULL COMMENT '得分'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `user_pool`
--

INSERT INTO `user_pool` (`id`, `names`, `codes`, `title_num_self`, `title_num`, `results`, `grades`) VALUES
(1, 'liujunjun', '132522198802031234', '1', '4', 'B', 33.3333),
(2, 'liujunjun', '132522198802031234', '2', '5', 'B', 33.3333),
(3, 'liujunjun', '132522198802031234', '3', '1', 'B', 33.3333),
(4, '李思远', '132522198802031236', '1', '2', 'A', 0),
(5, '李思远', '132522198802031236', '2', '1', 'B', 33.3333),
(6, '李思远', '132522198802031236', '3', '4', 'C', 0);

-- --------------------------------------------------------

--
-- 表的结构 `user_times`
--

CREATE TABLE `user_times` (
  `id` int(6) NOT NULL,
  `names` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '姓名',
  `codes` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '身份证号',
  `times` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '时间戳'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `user_times`
--

INSERT INTO `user_times` (`id`, `names`, `codes`, `times`) VALUES
(1, 'liujunjun', '132522198802031234', '1600674075'),
(2, '李思远', '132522198802031236', '1600669097');

--
-- 转储表的索引
--

--
-- 表的索引 `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `item_pool`
--
ALTER TABLE `item_pool`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `systems`
--
ALTER TABLE `systems`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `user_pool`
--
ALTER TABLE `user_pool`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `user_times`
--
ALTER TABLE `user_times`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `item_pool`
--
ALTER TABLE `item_pool`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用表AUTO_INCREMENT `systems`
--
ALTER TABLE `systems`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `user_pool`
--
ALTER TABLE `user_pool`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用表AUTO_INCREMENT `user_times`
--
ALTER TABLE `user_times`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
