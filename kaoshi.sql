-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2020-09-15 03:33:32
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
-- 数据库： `kaoshi`
--

-- --------------------------------------------------------

--
-- 表的结构 `item_bank`
--

CREATE TABLE `item_bank` (
  `id` int(6) NOT NULL,
  `titles` varchar(300) COLLATE utf8_bin NOT NULL COMMENT '题目',
  `item_type` varchar(50) COLLATE utf8_bin NOT NULL COMMENT '题型',
  `A` varchar(300) COLLATE utf8_bin NOT NULL,
  `B` varchar(300) COLLATE utf8_bin NOT NULL,
  `C` varchar(300) COLLATE utf8_bin NOT NULL,
  `D` varchar(300) COLLATE utf8_bin NOT NULL,
  `item_right` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '正确答案'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `item_bank`
--

INSERT INTO `item_bank` (`id`, `titles`, `item_type`, `A`, `B`, `C`, `D`, `item_right`) VALUES
(1, '1+1=', '单选题', '2', '3', '4', '5', 'A'),
(2, '2+2=', '单选题', '2', '3', '4', '5', 'C'),
(3, '酒驾有什么处罚？', '多选题', '扣除12分', '吊销半年', '拘役7-15天', '奖励200元', 'A,B,C'),
(4, '高速可以逆行', '单选题', '对', '错', '', '', 'B'),
(5, '刘佳欣心大', '单选题', '小', '中', '大', '很大', 'C'),
(6, '10+10=', '单选题', '20', '30', '40', '50', 'A'),
(7, '20+20=', '单选题', '40', '50', '60', '70', 'A'),
(8, '5*5=', '单选题', '10', '15', '20', '25', 'D'),
(9, '15*15=', '单选题', '200', '205', '215', '225', 'D'),
(10, '16*16=', '单选题', '236', '246', '256', '266', 'C'),
(11, '100+1=', '单选题', '101', '102', '103', '104', 'A'),
(12, '100+10=', '单选题', '110', '120', '130', '140', 'A');

-- --------------------------------------------------------

--
-- 表的结构 `myitem_bank`
--

CREATE TABLE `myitem_bank` (
  `id` int(8) NOT NULL,
  `user_name` varchar(50) COLLATE utf8_bin NOT NULL COMMENT '用户名',
  `userId` varchar(50) COLLATE utf8_bin NOT NULL COMMENT '身份证号',
  `titleNum_self` varchar(4) COLLATE utf8_bin NOT NULL COMMENT '自己的题号',
  `titleNum` varchar(4) COLLATE utf8_bin NOT NULL COMMENT '题库的题号',
  `myItem_right` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '自己答案',
  `grades` varchar(3) COLLATE utf8_bin NOT NULL COMMENT '分数'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `myitem_bank`
--

INSERT INTO `myitem_bank` (`id`, `user_name`, `userId`, `titleNum_self`, `titleNum`, `myItem_right`, `grades`) VALUES
(1, 'abcdef', '140522199410042032', '1', '3', 'A,B,C', '2'),
(2, 'abcdef', '140522199410042032', '2', '8', 'D', '2'),
(3, 'abcdef', '140522199410042032', '3', '12', 'A', '2'),
(4, 'abcdef', '140522199410042032', '4', '1', 'A', '2'),
(5, 'abcdef', '140522199410042032', '5', '9', 'D', '2'),
(6, 'abcdef', '140522199410042032', '6', '6', 'A', '2'),
(7, 'abcdef', '140522199410042032', '7', '5', 'C', '2'),
(8, 'abcdef', '140522199410042032', '8', '10', 'D', '0'),
(9, 'abcdef', '140522199410042032', '9', '4', 'B', '2'),
(10, 'abcdef', '140522199410042032', '10', '7', 'A', '2'),
(11, 'abcdef', '140522199410042032', '11', '11', 'A', '2'),
(12, 'abcdef', '140522199410042032', '12', '2', 'C', '2');

-- --------------------------------------------------------

--
-- 表的结构 `systems`
--

CREATE TABLE `systems` (
  `id` int(8) NOT NULL,
  `max_num` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `systems`
--

INSERT INTO `systems` (`id`, `max_num`) VALUES
(1, '50');

-- --------------------------------------------------------

--
-- 表的结构 `user_time`
--

CREATE TABLE `user_time` (
  `id` int(6) NOT NULL,
  `user_name` varchar(50) COLLATE utf8_bin NOT NULL COMMENT '用户名',
  `userId` varchar(50) COLLATE utf8_bin NOT NULL COMMENT '身份证',
  `user_time` varchar(40) COLLATE utf8_bin NOT NULL COMMENT '时间戳'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `user_time`
--

INSERT INTO `user_time` (`id`, `user_name`, `userId`, `user_time`) VALUES
(11, '小猴abcd', '140522199410042033', '1599642567'),
(52, 'abcdef', '140522199410042032', '1600136115');

-- --------------------------------------------------------

--
-- 表的结构 `user_xinxi`
--

CREATE TABLE `user_xinxi` (
  `id` int(6) NOT NULL,
  `user_name` varchar(50) COLLATE utf8_bin NOT NULL COMMENT '用户名',
  `user_pass` varchar(50) COLLATE utf8_bin NOT NULL COMMENT '密码',
  `user_code` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '身份证号',
  `total_grade` varchar(6) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `user_xinxi`
--

INSERT INTO `user_xinxi` (`id`, `user_name`, `user_pass`, `user_code`, `total_grade`) VALUES
(1, '小猴abcd', 'e10adc3949ba59abbe56e057f20f883e', '140522199410042033', ''),
(4, 'abcdef', 'e35cf7b66449df565f93c607d5a81d09', '140522199410042032', '');

--
-- 转储表的索引
--

--
-- 表的索引 `item_bank`
--
ALTER TABLE `item_bank`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `myitem_bank`
--
ALTER TABLE `myitem_bank`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `systems`
--
ALTER TABLE `systems`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `user_time`
--
ALTER TABLE `user_time`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `user_xinxi`
--
ALTER TABLE `user_xinxi`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `item_bank`
--
ALTER TABLE `item_bank`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用表AUTO_INCREMENT `myitem_bank`
--
ALTER TABLE `myitem_bank`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用表AUTO_INCREMENT `systems`
--
ALTER TABLE `systems`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `user_time`
--
ALTER TABLE `user_time`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- 使用表AUTO_INCREMENT `user_xinxi`
--
ALTER TABLE `user_xinxi`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
