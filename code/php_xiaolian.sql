-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-11-30 12:46:48
-- 服务器版本： 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_xiaolian`
--

-- --------------------------------------------------------

--
-- 表的结构 `think_access`
--

CREATE TABLE `think_access` (
  `role_id` smallint(6) UNSIGNED NOT NULL,
  `node_id` smallint(6) UNSIGNED NOT NULL,
  `module` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `think_access`
--

INSERT INTO `think_access` (`role_id`, `node_id`, `module`) VALUES
(3, 7, NULL),
(3, 9, NULL),
(3, 8, NULL),
(3, 5, NULL),
(3, 1, NULL),
(2, 14, NULL),
(2, 13, NULL),
(2, 12, NULL),
(0, 5, NULL),
(3, 16, NULL),
(3, 15, NULL),
(3, 11, NULL),
(3, 17, NULL),
(3, 18, NULL),
(3, 19, NULL),
(3, 20, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `think_node`
--

CREATE TABLE `think_node` (
  `id` smallint(6) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) UNSIGNED DEFAULT NULL,
  `pid` smallint(6) UNSIGNED NOT NULL,
  `level` tinyint(1) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `think_node`
--

INSERT INTO `think_node` (`id`, `name`, `title`, `status`, `remark`, `sort`, `pid`, `level`) VALUES
(12, 'Home', '前端模块', 1, NULL, 100, 0, 1),
(5, 'University', 'admin/university', 1, NULL, 100, 1, 2),
(1, 'Admin', '后台模块', 1, NULL, 100, 0, 1),
(8, 'add', 'admin/university/add', 1, NULL, 100, 5, 3),
(9, 'view', 'admin/university/view', 1, NULL, 100, 5, 3),
(13, 'News', '前端控制器', 1, NULL, 100, 12, 2),
(11, 'update', 'admin/university/update', 1, NULL, 100, 5, 3),
(15, 'News', 'Admin/news', 1, NULL, NULL, 1, 2),
(16, 'view', 'admin模块news控制器view方法', 1, NULL, NULL, 15, 3),
(17, 'add', 'admin模块news控制器add方法', 1, NULL, NULL, 15, 3),
(18, 'update', 'admin模块news控制器update方法', 1, NULL, 100, 15, 3),
(19, 'show', 'admin模块news控制器show方法', 1, NULL, 100, 15, 3),
(20, 'show', 'admin/university/show', 1, NULL, 100, 5, 3);

-- --------------------------------------------------------

--
-- 表的结构 `think_role`
--

CREATE TABLE `think_role` (
  `id` smallint(6) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) UNSIGNED DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `think_role`
--

INSERT INTO `think_role` (`id`, `name`, `pid`, `status`, `remark`) VALUES
(2, '小编', NULL, 1, '一些简单的操作'),
(3, '主编', NULL, 1, '所有操作'),
(0, '游客', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `think_role_user`
--

CREATE TABLE `think_role_user` (
  `role_id` mediumint(9) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` char(32) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `think_role_user`
--

INSERT INTO `think_role_user` (`role_id`, `user_id`) VALUES
(2, '2'),
(3, '3');

-- --------------------------------------------------------

--
-- 表的结构 `think_user`
--

CREATE TABLE `think_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `passwd` char(32) NOT NULL,
  `time` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `think_user`
--

INSERT INTO `think_user` (`id`, `name`, `passwd`, `time`) VALUES
(0, 'guest', 'e10adc3949ba59abbe56e057f20f883e', 0),
(2, 'test', 'e10adc3949ba59abbe56e057f20f883e', 1435557375),
(3, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1435647649);

-- --------------------------------------------------------

--
-- 表的结构 `xl_match`
--

CREATE TABLE `xl_match` (
  `mid` int(11) NOT NULL COMMENT '匹配的id',
  `fid` int(11) NOT NULL,
  `funiid` int(11) NOT NULL COMMENT '发送者所在大学id',
  `tuniid` int(11) NOT NULL,
  `tid` int(11) DEFAULT NULL,
  `tagone` int(11) NOT NULL,
  `tagtwo` int(11) NOT NULL,
  `mgotime` timestamp NOT NULL,
  `msendtime` timestamp NOT NULL COMMENT '发送时间',
  `mmessage` text COMMENT '附加信息',
  `mconnect` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='匹配表';

-- --------------------------------------------------------

--
-- 表的结构 `xl_receiverequest`
--

CREATE TABLE `xl_receiverequest` (
  `rrid` int(11) NOT NULL COMMENT '成功的id',
  `mid` int(11) NOT NULL COMMENT '匹配表的id',
  `id` int(11) NOT NULL COMMENT '发送者id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='接收请求表';

-- --------------------------------------------------------

--
-- 表的结构 `xl_topline`
--

CREATE TABLE `xl_topline` (
  `tlid` int(11) NOT NULL COMMENT '文章id',
  `tlimage` varchar(100) NOT NULL COMMENT '文章图片',
  `tltitle` varchar(50) NOT NULL COMMENT '文章标题',
  `tlcontent` text NOT NULL COMMENT '文章内容',
  `tladdtime` timestamp NOT NULL COMMENT '文章添加时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='4.2.2	头条文章表';

-- --------------------------------------------------------

--
-- 表的结构 `xl_toplinecomment`
--

CREATE TABLE `xl_toplinecomment` (
  `tlcid` int(11) NOT NULL COMMENT '评论ID',
  `tlccontent` text NOT NULL COMMENT '评论内容',
  `tlcaddtime` timestamp NOT NULL COMMENT '评论时间',
  `tlcnickname` varchar(100) NOT NULL COMMENT '微信昵称',
  `tlcimage` varchar(100) NOT NULL COMMENT '微信头像',
  `tlid` int(11) NOT NULL COMMENT '文章id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='头条文章评论表';

-- --------------------------------------------------------

--
-- 表的结构 `xl_university`
--

CREATE TABLE `xl_university` (
  `uniid` int(11) NOT NULL COMMENT '大学id',
  `uniname` varchar(20) NOT NULL COMMENT '大学名称',
  `uniimage` varchar(100) NOT NULL COMMENT '大学校徽',
  `unidescription` text NOT NULL COMMENT '大学描述',
  `uniaddress` varchar(20) NOT NULL COMMENT '大学所在地'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='大学简介表';

-- --------------------------------------------------------

--
-- 表的结构 `xl_user`
--

CREATE TABLE `xl_user` (
  `id` int(11) NOT NULL COMMENT 'id',
  `openid` varchar(100) DEFAULT NULL,
  `tlcnickname` varchar(100) DEFAULT NULL,
  `sex` varchar(10) NOT NULL COMMENT '性别',
  `headimgurl` varchar(100) DEFAULT NULL,
  `uniid` int(11) NOT NULL COMMENT '大学外键',
  `college` varchar(30) NOT NULL COMMENT '大学',
  `phonenumber` varchar(20) NOT NULL COMMENT '电话号码',
  `name` varchar(30) NOT NULL COMMENT '姓名',
  `sno` int(11) NOT NULL COMMENT '学号'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户表';

-- --------------------------------------------------------

--
-- 表的结构 `xl_xiaolianarticle`
--

CREATE TABLE `xl_xiaolianarticle` (
  `xlaid` int(11) NOT NULL COMMENT '校脸圈id',
  `xlaaddtime` timestamp NOT NULL COMMENT '发送时间',
  `xlaimage` varchar(50) NOT NULL COMMENT '微信头像',
  `xlatitle` varchar(50) NOT NULL COMMENT '笑脸标题',
  `xlaauthor` varchar(100) NOT NULL COMMENT '作者的Nickname',
  `xlacontent` text NOT NULL COMMENT '发表的内容',
  `xlaviews` int(11) NOT NULL COMMENT '浏览次数',
  `xlalikes` int(11) NOT NULL COMMENT '点赞次数'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='4.2.5	校脸圈文章表';

-- --------------------------------------------------------

--
-- 表的结构 `xl_xiaolianarticlecomment`
--

CREATE TABLE `xl_xiaolianarticlecomment` (
  `xlacid` int(11) NOT NULL COMMENT '评论id',
  `xlacaddtime` timestamp NOT NULL COMMENT '发送时间',
  `xlaccomment` text NOT NULL COMMENT '评论内容',
  `xlacnickname` varchar(100) NOT NULL COMMENT '评论人的名字',
  `xlacimage` varchar(100) NOT NULL COMMENT '评论人的头像',
  `xlaid` int(11) NOT NULL COMMENT '评论文章的id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='4.2.6	校脸圈文章评论表';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `think_access`
--
ALTER TABLE `think_access`
  ADD UNIQUE KEY `role_id` (`role_id`,`node_id`),
  ADD KEY `groupId` (`role_id`),
  ADD KEY `nodeId` (`node_id`);

--
-- Indexes for table `think_node`
--
ALTER TABLE `think_node`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level` (`level`),
  ADD KEY `pid` (`pid`),
  ADD KEY `status` (`status`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `think_role`
--
ALTER TABLE `think_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pid` (`pid`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `think_role_user`
--
ALTER TABLE `think_role_user`
  ADD PRIMARY KEY (`role_id`,`user_id`),
  ADD KEY `group_id` (`role_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `think_user`
--
ALTER TABLE `think_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xl_match`
--
ALTER TABLE `xl_match`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `xl_receiverequest`
--
ALTER TABLE `xl_receiverequest`
  ADD PRIMARY KEY (`rrid`);

--
-- Indexes for table `xl_topline`
--
ALTER TABLE `xl_topline`
  ADD PRIMARY KEY (`tlid`);

--
-- Indexes for table `xl_toplinecomment`
--
ALTER TABLE `xl_toplinecomment`
  ADD PRIMARY KEY (`tlcid`);

--
-- Indexes for table `xl_university`
--
ALTER TABLE `xl_university`
  ADD PRIMARY KEY (`uniid`);

--
-- Indexes for table `xl_user`
--
ALTER TABLE `xl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xl_xiaolianarticle`
--
ALTER TABLE `xl_xiaolianarticle`
  ADD PRIMARY KEY (`xlaid`);

--
-- Indexes for table `xl_xiaolianarticlecomment`
--
ALTER TABLE `xl_xiaolianarticlecomment`
  ADD PRIMARY KEY (`xlacid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `think_node`
--
ALTER TABLE `think_node`
  MODIFY `id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- 使用表AUTO_INCREMENT `think_role`
--
ALTER TABLE `think_role`
  MODIFY `id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `think_user`
--
ALTER TABLE `think_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `xl_match`
--
ALTER TABLE `xl_match`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT COMMENT '匹配的id';
--
-- 使用表AUTO_INCREMENT `xl_receiverequest`
--
ALTER TABLE `xl_receiverequest`
  MODIFY `rrid` int(11) NOT NULL AUTO_INCREMENT COMMENT '成功的id';
--
-- 使用表AUTO_INCREMENT `xl_topline`
--
ALTER TABLE `xl_topline`
  MODIFY `tlid` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章id';
--
-- 使用表AUTO_INCREMENT `xl_toplinecomment`
--
ALTER TABLE `xl_toplinecomment`
  MODIFY `tlcid` int(11) NOT NULL AUTO_INCREMENT COMMENT '评论ID';
--
-- 使用表AUTO_INCREMENT `xl_university`
--
ALTER TABLE `xl_university`
  MODIFY `uniid` int(11) NOT NULL AUTO_INCREMENT COMMENT '大学id';
--
-- 使用表AUTO_INCREMENT `xl_user`
--
ALTER TABLE `xl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id';
--
-- 使用表AUTO_INCREMENT `xl_xiaolianarticle`
--
ALTER TABLE `xl_xiaolianarticle`
  MODIFY `xlaid` int(11) NOT NULL AUTO_INCREMENT COMMENT '校脸圈id';
--
-- 使用表AUTO_INCREMENT `xl_xiaolianarticlecomment`
--
ALTER TABLE `xl_xiaolianarticlecomment`
  MODIFY `xlacid` int(11) NOT NULL AUTO_INCREMENT COMMENT '评论id';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
