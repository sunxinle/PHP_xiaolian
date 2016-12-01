-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 �?12 �?01 �?15:38
-- 服务器版本: 5.5.40
-- PHP 版本: 5.5.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `php_xiaolian`
--

-- --------------------------------------------------------

--
-- 表的结构 `think_access`
--

CREATE TABLE IF NOT EXISTS `think_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  UNIQUE KEY `role_id` (`role_id`,`node_id`),
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
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
(3, 20, NULL),
(3, 21, NULL),
(3, 22, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `think_node`
--

CREATE TABLE IF NOT EXISTS `think_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

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
(20, 'show', 'admin/university/show', 1, NULL, 100, 5, 3),
(21, 'delete', 'admin模块news控制器delete方法', 1, NULL, 100, 15, 3),
(22, 'delete', 'admin模块university控制器delete方法', 1, NULL, 100, 5, 3);

-- --------------------------------------------------------

--
-- 表的结构 `think_role`
--

CREATE TABLE IF NOT EXISTS `think_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

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

CREATE TABLE IF NOT EXISTS `think_role_user` (
  `role_id` mediumint(9) unsigned NOT NULL DEFAULT '0',
  `user_id` char(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`role_id`,`user_id`),
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
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

CREATE TABLE IF NOT EXISTS `think_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `passwd` char(32) NOT NULL,
  `time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

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

CREATE TABLE IF NOT EXISTS `xl_match` (
  `mid` int(11) NOT NULL AUTO_INCREMENT COMMENT '匹配的id',
  `fid` int(11) NOT NULL,
  `funiid` int(11) NOT NULL COMMENT '发送者所在大学id',
  `tuniid` int(11) NOT NULL,
  `tid` int(11) DEFAULT NULL,
  `tagone` int(11) NOT NULL,
  `tagtwo` int(11) NOT NULL,
  `mgotime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `msendtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '发送时间',
  `mmessage` text COMMENT '附加信息',
  `mconnect` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='匹配表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `xl_receiverequest`
--

CREATE TABLE IF NOT EXISTS `xl_receiverequest` (
  `rrid` int(11) NOT NULL AUTO_INCREMENT COMMENT '成功的id',
  `mid` int(11) NOT NULL COMMENT '匹配表的id',
  `id` int(11) NOT NULL COMMENT '发送者id',
  PRIMARY KEY (`rrid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='接收请求表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `xl_topline`
--

CREATE TABLE IF NOT EXISTS `xl_topline` (
  `tlid` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `tlimage` varchar(100) NOT NULL COMMENT '文章图片',
  `tltitle` varchar(50) NOT NULL COMMENT '文章标题',
  `tlcontent` text NOT NULL COMMENT '文章内容',
  `tladdtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '文章添加时间',
  PRIMARY KEY (`tlid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='4.2.2	头条文章表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `xl_toplinecomment`
--

CREATE TABLE IF NOT EXISTS `xl_toplinecomment` (
  `tlcid` int(11) NOT NULL AUTO_INCREMENT COMMENT '评论ID',
  `tlccontent` text NOT NULL COMMENT '评论内容',
  `tlcaddtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '评论时间',
  `tlcnickname` varchar(100) NOT NULL COMMENT '微信昵称',
  `tlcimage` varchar(100) NOT NULL COMMENT '微信头像',
  `tlid` int(11) NOT NULL COMMENT '文章id',
  PRIMARY KEY (`tlcid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='头条文章评论表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `xl_university`
--

CREATE TABLE IF NOT EXISTS `xl_university` (
  `uniid` int(11) NOT NULL AUTO_INCREMENT COMMENT '大学id',
  `uniname` varchar(20) NOT NULL COMMENT '大学名称',
  `uniimage` varchar(100) NOT NULL COMMENT '大学校徽',
  `unidescription` text NOT NULL COMMENT '大学描述',
  `uniaddress` varchar(20) NOT NULL COMMENT '大学所在地',
  PRIMARY KEY (`uniid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='大学简介表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `xl_user`
--

CREATE TABLE IF NOT EXISTS `xl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `openid` varchar(100) DEFAULT NULL,
  `tlcnickname` varchar(100) DEFAULT NULL,
  `sex` varchar(10) NOT NULL COMMENT '性别',
  `headimgurl` varchar(100) DEFAULT NULL,
  `uniid` int(11) NOT NULL COMMENT '大学外键',
  `college` varchar(30) NOT NULL COMMENT '大学',
  `phonenumber` varchar(20) NOT NULL COMMENT '电话号码',
  `name` varchar(30) NOT NULL COMMENT '姓名',
  `sno` int(11) NOT NULL COMMENT '学号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `xl_xiaolianarticle`
--

CREATE TABLE IF NOT EXISTS `xl_xiaolianarticle` (
  `xlaid` int(11) NOT NULL AUTO_INCREMENT COMMENT '校脸圈id',
  `xlaaddtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '发送时间',
  `xlaimage` varchar(50) NOT NULL COMMENT '微信头像',
  `xlatitle` varchar(50) NOT NULL COMMENT '笑脸标题',
  `xlaauthor` varchar(100) NOT NULL COMMENT '作者的Nickname',
  `xlacontent` text NOT NULL COMMENT '发表的内容',
  `xlaviews` int(11) NOT NULL COMMENT '浏览次数',
  `xlalikes` int(11) NOT NULL COMMENT '点赞次数',
  PRIMARY KEY (`xlaid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='4.2.5	校脸圈文章表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `xl_xiaolianarticlecomment`
--

CREATE TABLE IF NOT EXISTS `xl_xiaolianarticlecomment` (
  `xlacid` int(11) NOT NULL AUTO_INCREMENT COMMENT '评论id',
  `xlacaddtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '发送时间',
  `xlaccomment` text NOT NULL COMMENT '评论内容',
  `xlacnickname` varchar(100) NOT NULL COMMENT '评论人的名字',
  `xlacimage` varchar(100) NOT NULL COMMENT '评论人的头像',
  `xlaid` int(11) NOT NULL COMMENT '评论文章的id',
  PRIMARY KEY (`xlacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='4.2.6	校脸圈文章评论表' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
