-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2020-09-22 03:47:07
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
-- 表的结构 `admins`
--

CREATE TABLE `admins` (
  `id` int(6) NOT NULL,
  `user_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `user_pass` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `admins`
--

INSERT INTO `admins` (`id`, `user_name`, `user_pass`) VALUES
(1, 'admin', 'admin');

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
(1, '山区上坡路段跟车过程中遇前车停车时怎么办？', '单选题', 'A、从前车两侧超越', 'B、紧跟前车后停车', 'C、保持大距离停车', 'D、连续鸣喇叭提示', 'B'),
(2, '下长坡连续使用行车制动会造成什么不良后果？', '单选题', 'A、缩短发动机使用寿命', 'B、驾驶人容易疲劳', 'C、容易造成机动车倾翻', 'D、制动器制动效果下降', 'B'),
(3, '驾驶机动车在山区道路怎样跟车行驶？', '单选题', 'A、紧随前车之后', 'B、加大安全距离', 'C、减小纵向间距', 'D、尽快超越前车', 'B'),
(4, '机动车通过隧道时，禁止以下哪些行为？', '单选题', 'A、超车', 'B、停车', 'C、掉头', 'D、倒车', 'B'),
(5, '下长坡时，控制车速的正确方法是什么？', '单选题', 'A、空挡滑行', 'B、挂低速挡', 'C、踏下离合器踏板滑行', 'D、使用驻车制动器', 'B');

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
(1, 'aaajiinvh', '140522199410042012', '1', '4', 'B', '2'),
(2, 'aaajiinvh', '140522199410042012', '2', '3', 'B', '2'),
(3, 'aaajiinvh', '140522199410042012', '3', '1', 'B', '2'),
(4, 'aaajiinvh', '140522199410042012', '4', '2', 'B', '2'),
(5, 'aaajiinvh', '140522199410042012', '5', '5', 'B', '2'),
(6, '', '', '1', '2', '', '');

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
(1, 'aaajiinvh', '140522199410042012', '1600672388');

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
(1, '小猴abcd', 'e10adc3949ba59abbe56e057f20f883e', '140522199410042033', '100'),
(11, 'abcdef', '5218f8e7861969c7581d68bed2c3a185', '140522199410042032', '80'),
(12, '小刘同学', '666666', '140522199802023324', '90'),
(13, 'aaajiinvh', 'e10adc3949ba59abbe56e057f20f883e', '140522199410042012', '10');

--
-- 转储表的索引
--

--
-- 表的索引 `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

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
-- 使用表AUTO_INCREMENT `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `item_bank`
--
ALTER TABLE `item_bank`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用表AUTO_INCREMENT `myitem_bank`
--
ALTER TABLE `myitem_bank`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用表AUTO_INCREMENT `systems`
--
ALTER TABLE `systems`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `user_time`
--
ALTER TABLE `user_time`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `user_xinxi`
--
ALTER TABLE `user_xinxi`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
