-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2018-12-27 10:21:59
-- 服务器版本： 10.1.37-MariaDB
-- PHP 版本： 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `zh`
--

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE `article` (
  `id` int(5) UNSIGNED NOT NULL COMMENT '主键',
  `title` varchar(200) NOT NULL DEFAULT '' COMMENT '文章标题',
  `title_img` varchar(200) NOT NULL DEFAULT '' COMMENT '文章图片',
  `cate_id` int(2) NOT NULL DEFAULT '0' COMMENT '栏目id',
  `user_id` int(2) NOT NULL DEFAULT '0' COMMENT '用户id',
  `is_hot` int(1) NOT NULL DEFAULT '0' COMMENT '热门',
  `is_top` int(1) NOT NULL DEFAULT '0' COMMENT '置顶',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `content` text NOT NULL COMMENT '文章内容',
  `pv` int(3) NOT NULL DEFAULT '0' COMMENT '浏览量',
  `create_time` int(13) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(13) NOT NULL DEFAULT '0' COMMENT '修改时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`id`, `title`, `title_img`, `cate_id`, `user_id`, `is_hot`, `is_top`, `status`, `content`, `pv`, `create_time`, `update_time`) VALUES
(1, '微信支付技巧', 'uploads/20181225\\6586d1e2a79f7787b5688d64f3834da9.jpg', 4, 21, 0, 0, 1, '微信支付技巧微信支付技巧微信支付技巧微信支付技巧微信支付技巧微信支付技巧微信支付技巧', 0, 1545705707, 1545705707),
(2, '第二篇文章的发布', 'uploads/20181225\\8ccfac4881b090a25c90e662fd6c67e4.jpg', 5, 21, 0, 0, 1, '文章内容文章内容文章内容文章内容文章内容文章内容', 5, 1545705954, 1545794440),
(3, '文章标题啊啊啊测试', 'uploads/20181225\\83a61c125318aed398112204d5ed8372.jpg', 6, 21, 0, 0, 1, '文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容', 0, 1545705998, 1545705998),
(4, 'php函数练习', 'uploads/20181225\\acb811de2420db21fb4f0d6f2c2a6c0a.jpg', 4, 21, 0, 0, 1, 'php函数练习php函数练习php函数练习php函数练习php函数练习php函数练习php函数练习php函数练习php函数练习php函数练习php函数练习php函数练习php函数练习', 3, 1545728201, 1545876251),
(5, 'javascript基础知识', 'uploads/20181225\\c9ba0e43bfb915e9d4445a87e23259e5.jpg', 7, 21, 0, 0, 1, 'javascript基础知识javascript基础知识javascript基础知识javascript基础知识javascript基础知识javascript基础知识javascript基础知识javascript基础知识javascript基础知识javascript基础知识javascript基础知识', 5, 1545730008, 1545898895),
(6, 'MySQL指南手册', 'uploads/20181226\\f9b4c9541e0817a4e4652c5bab188911.jpg', 6, 21, 0, 0, 1, 'MySQL指南手册MySQL指南手册MySQL指南手册MySQL指南手册MySQL指南手册MySQL指南手册MySQL指南手册MySQL指南手册MySQL指南手册MySQL指南手册', 76, 1545787942, 1545898893),
(7, 'MySQL基础1', 'uploads/20181227\\d5a317923b7723afc8251025322b57c3.jpg', 6, 21, 0, 0, 1, 'MySQL基础1MySQL基础1MySQL基础1MySQL基础1MySQL基础1MySQL基础1MySQL基础1MySQL基础1<br>', 0, 1545893285, 1545893285),
(8, 'MySQL基础2', 'uploads/20181227\\ad3d141efeb41f9d9f457a030c7e58c4.jpg', 6, 21, 0, 0, 1, 'MySQL基础2MySQL基础2MySQL基础2MySQL基础2MySQL基础2MySQL基础2MySQL基础2MySQL基础2<br>', 0, 1545893310, 1545893310),
(9, 'MySQL基础3', 'uploads/20181227\\84340e390036a2e181061e0a54fc6fc9.jpg', 6, 21, 0, 0, 1, 'MySQL基础3MySQL基础3MySQL基础3MySQL基础3MySQL基础3MySQL基础3MySQL基础3MySQL基础3MySQL基础3<br>', 0, 1545893329, 1545893329),
(10, 'MySQL基础4', 'uploads/20181227\\4ae1a0b2afac824a13ed57c20bd84363.jpg', 6, 21, 0, 0, 1, 'MySQL基础4MySQL基础4MySQL基础4MySQL基础4MySQL基础4MySQL基础4MySQL基础4MySQL基础4MySQL基础4MySQL基础4<br>', 2, 1545893364, 1545898867);

-- --------------------------------------------------------

--
-- 表的结构 `article_category`
--

CREATE TABLE `article_category` (
  `id` int(5) UNSIGNED NOT NULL COMMENT '主键',
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '栏目名称',
  `user_id` int(5) NOT NULL COMMENT '用户id',
  `sort` int(5) NOT NULL COMMENT '排序',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `create_time` int(13) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(13) NOT NULL DEFAULT '0' COMMENT '修改时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `article_category`
--

INSERT INTO `article_category` (`id`, `name`, `user_id`, `sort`, `status`, `create_time`, `update_time`) VALUES
(4, 'PHP', 21, 1, 1, 0, 0),
(5, '前端', 21, 5, 1, 0, 0),
(6, 'MySQL', 21, 3, 1, 0, 0),
(7, 'JavaScript', 21, 4, 1, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(4) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL DEFAULT '',
  `email` varchar(200) NOT NULL DEFAULT '',
  `mobile` varchar(11) NOT NULL DEFAULT '',
  `password` varchar(40) NOT NULL DEFAULT '',
  `status` int(1) NOT NULL,
  `is_admin` int(2) NOT NULL DEFAULT '0',
  `create_time` int(10) NOT NULL,
  `update_time` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `mobile`, `password`, `status`, `is_admin`, `create_time`, `update_time`) VALUES
(21, 'zhangyc', 'zhangyc@qq.com', '18633599875', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 0, 1545616544, 1545616544),
(22, 'gurui', 'gurui@qq.com', '15688933652', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 0, 1545622035, 1545622035),
(24, 'admin', 'admin@qq.com', '18633563692', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 0, 1545717405, 1545717405);

-- --------------------------------------------------------

--
-- 表的结构 `user_fav`
--

CREATE TABLE `user_fav` (
  `id` int(5) UNSIGNED NOT NULL COMMENT '主键',
  `article_id` int(2) NOT NULL COMMENT '文章id',
  `user_id` int(2) NOT NULL COMMENT '用户id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user_fav`
--

INSERT INTO `user_fav` (`id`, `article_id`, `user_id`) VALUES
(8, 6, 21),
(9, 5, 21);

-- --------------------------------------------------------

--
-- 表的结构 `user_like`
--

CREATE TABLE `user_like` (
  `id` int(5) UNSIGNED NOT NULL COMMENT '主键',
  `article_id` int(5) NOT NULL COMMENT '文章id',
  `user_id` int(5) NOT NULL COMMENT '用户id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转储表的索引
--

--
-- 表的索引 `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `article_category`
--
ALTER TABLE `article_category`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `user_fav`
--
ALTER TABLE `user_fav`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `user_like`
--
ALTER TABLE `user_like`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `article`
--
ALTER TABLE `article`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=11;

--
-- 使用表AUTO_INCREMENT `article_category`
--
ALTER TABLE `article_category`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- 使用表AUTO_INCREMENT `user_fav`
--
ALTER TABLE `user_fav`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=10;

--
-- 使用表AUTO_INCREMENT `user_like`
--
ALTER TABLE `user_like`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
