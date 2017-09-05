-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017-09-05 20:18:45
-- 服务器版本： 5.7.10-log
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- 表的结构 `blog_aboutme`
--

CREATE TABLE `blog_aboutme` (
  `id` mediumint(9) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `blog_aboutme`
--

INSERT INTO `blog_aboutme` (`id`, `content`) VALUES
(1, '&lt;p&gt;本人是广东工业大学信息工程学院的学生，喜欢web技术，欢迎广大同行交流探讨!&lt;/p&gt;');

-- --------------------------------------------------------

--
-- 表的结构 `blog_admin`
--

CREATE TABLE `blog_admin` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `blog_admin`
--

INSERT INTO `blog_admin` (`id`, `username`, `password`) VALUES
(1, 'supadmin', '4b43d1d4b0a3253266b7af4b40c60290'),
(6, 'admin', 'e10adc3949ba59abbe56e057f20f883e'),
(7, 'weile', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- 表的结构 `blog_article`
--

CREATE TABLE `blog_article` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(60) NOT NULL COMMENT '文章标题',
  `descr` varchar(255) NOT NULL COMMENT '文章描述',
  `pic` varchar(100) NOT NULL COMMENT '文章缩略图',
  `content` text NOT NULL COMMENT '文章内容',
  `cateid` mediumint(9) NOT NULL COMMENT '所属栏目id',
  `time` datetime NOT NULL COMMENT '发布时间',
  `recommend` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `blog_article`
--

INSERT INTO `blog_article` (`id`, `title`, `descr`, `pic`, `content`, `cateid`, `time`, `recommend`) VALUES
(14, 'jquery是一个很强大的库', 'jquery是很强大的库，jquery是很强大的库，jquery是很强大的库，jquery是很强大的库...', 'Public/upLoad/2017-09-01/59a90d8f0fa24.jpg', '&lt;p&gt;jquery是很强大的库，jquery是很强大的库，jquery是很强大的库，jquery是很强大的库jquery是很强大的库，jquery是很强大的库，jquery是很强大的库，jquery是很强大的库jquery是很强大的库，jquery是很强大的库，jquery是很强大的库，jquery是很强大的库jquery是很强大的库，jquery是很强大的库，jquery是很强大的库，jquery是很强大的库jquery是很强大的库，jquery是很强大的库，jquery是很强大的库，jquery是很强大的库jquery是很强大的库，jquery是很强大的库，jquery是很强大的库，jquery是很强大的库jquery是很强大的库，jquery是很强大的库，jquery是很强大的库，jquery是很强大的库jquery是很强大的库，jquery是很强大的库，jquery是很强大的库，jquery是很强大的库jquery是很强大的库，jquery是很强大的库，jquery是很强大的库，jquery是很强大的库jquery是很强大的库，jquery是很强大的库，jquery是很强大的库，jquery是很强大的库jquery是很强大的库，jquery是很强大的库，jquery是很强大的库，jquery是很强大的库jquery是很强大的库，jquery是很强大的库，jquery是很强大的库，jquery是很强大的库jquery是很强大的库，jquery是很强大的库，jquery是很强大的库，jquery是很强大的库jquery是很强大的库，jquery是很强大的库，jquery是很强大的库，jquery是很强大的库jquery是很强大的库，jquery是很强大的库，jquery是很强大的库，jquery是很强大的库jquery是很强大的库，jquery是很强大的库，jquery是很强大的库，jquery是很强大的库&lt;/p&gt;', 10, '2017-08-30 09:30:09', '是'),
(15, 'thinkphp的强大', 'thinkphp的强大', 'Public/upLoad/2017-09-01/59a90dc2606dc.jpg', '&lt;p&gt;thinkphp的强大thinkphp的强大thinkphp的强大thinkphp的强大thinkphp的强大thinkphp的强大thinkphp的强大thinkphp的强大thinkphp的强大thinkphp的强大thinkphp的强大thinkphp的强大&lt;/p&gt;', 15, '2017-09-01 00:00:00', '是'),
(16, '很棒棒的心灵文章', '心灵鸡汤', 'Public/upLoad/2017-09-01/59a90ded4cc3b.jpg', '&lt;p&gt;心灵鸡汤心灵鸡汤&lt;/p&gt;', 14, '2017-09-01 10:30:15', '是'),
(17, '哲理是这样形成的', '哲理是这样形成的', 'Public/upLoad/2017-09-01/59a90e0e33d55.jpg', '&lt;p&gt;哲理是这样形成的哲理是这样形成的哲理是这样形成的哲理是这样形成的哲理是这样形成的哲理是这样形成的哲理是这样形成的哲理是这样形成的哲理是这样形成的&lt;/p&gt;', 16, '2017-08-31 00:00:00', '否'),
(18, 'gulp的使用', 'gulp是一个项目构建，打包工具', '', '&lt;p&gt;gulp是一个项目构建，打包工具gulp是一个项目构建，打包工具gulp是一个项目构建，打包工具gulp是一个项目构建，打包工具gulp是一个项目构建，打包工具gulp是一个项目构建，打包工具gulp是一个项目构建，打包工具gulp是一个项目构建，打包工具gulp是一个项目构建，打包工具gulp是一个项目构建，打包工具gulp是一个项目构建，打包工具gulp是一个项目构建，打包工具gulp是一个项目构建，打包工具gulp是一个项目构建，打包工具gulp是一个项目构建，打包工具gulp是一个项目构建，打包工具gulp是一个项目构建，打包工具&lt;/p&gt;', 10, '2017-09-01 12:00:00', '否'),
(19, 'webpack的使用', 'webpack是一个功能强大的打包工具', 'Public/upLoad/2017-09-01/59a93f19bc95e.jpg', '&lt;p&gt;webpack是一个功能强大的打包工具webpack是一个功能强大的打包工具webpack是一个功能强大的打包工具webpack是一个功能强大的打包工具webpack是一个功能强大的打包工具webpack是一个功能强大的打包工具webpack是一个功能强大的打包工具webpack是一个功能强大的打包工具webpack是一个功能强大的打包工具webpack是一个功能强大的打包工具webpack是一个功能强大的打包工具&lt;/p&gt;', 10, '2017-09-01 19:06:01', '是'),
(20, '爱爱爱', '啊啊啊啊啊啊啊哎', '', '&lt;p&gt;推荐测试&lt;/p&gt;', 16, '2017-09-01 21:25:11', '否'),
(21, 'margin重叠现象', 'margin重叠现象margin重叠现象', 'Public/upLoad/2017-09-02/59aa51c361198.jpg', '&lt;p&gt;margin重叠现象margin重叠现象margin重叠现象margin重叠现象margin重叠现象margin重叠现象margin重叠现象margin重叠现象margin重叠现象margin重叠现象margin重叠现象margin重叠现象margin重叠现象margin重叠现象margin重叠现象margin重叠现象margin重叠现象margin重叠现象margin重叠现象margin重叠现象margin重叠现象margin重叠现象margin重叠现象margin重叠现象&lt;/p&gt;', 10, '2017-09-02 14:37:55', '是'),
(22, 'seo优化', 'seo优化seo优化seo优化seo优化seo优化', '', '&lt;p&gt;seo优化seo优化seo优化seo优化seo优化seo优化seo优化seo优化seo优化seo优化seo优化seo优化seo优化seo优化seo优化seo优化seo优化seo优化seo优化seo优化seo优化seo优化seo优化seo优化seo优化seo优化seo优化seo优化seo优化seo优化seo优化seo优化seo优化seo优化seo优化&lt;/p&gt;', 10, '2017-09-02 14:39:01', '否'),
(23, '网站性能优化', '网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化', '', '&lt;p&gt;网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化网站性能优化&lt;/p&gt;', 10, '2017-09-02 14:40:05', '否');

-- --------------------------------------------------------

--
-- 表的结构 `blog_cate`
--

CREATE TABLE `blog_cate` (
  `id` mediumint(8) UNSIGNED NOT NULL COMMENT '栏目ID',
  `catename` varchar(40) NOT NULL COMMENT '栏目名称',
  `sort` mediumint(9) DEFAULT NULL COMMENT '排序'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `blog_cate`
--

INSERT INTO `blog_cate` (`id`, `catename`, `sort`) VALUES
(10, 'web前端', 1),
(14, '心灵文章', 3),
(15, 'php后台', 2),
(16, '哲学文章', 4);

-- --------------------------------------------------------

--
-- 表的结构 `blog_link`
--

CREATE TABLE `blog_link` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(40) NOT NULL,
  `url` varchar(100) NOT NULL,
  `descr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_aboutme`
--
ALTER TABLE `blog_aboutme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_admin`
--
ALTER TABLE `blog_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_article`
--
ALTER TABLE `blog_article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_cate`
--
ALTER TABLE `blog_cate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_link`
--
ALTER TABLE `blog_link`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `blog_aboutme`
--
ALTER TABLE `blog_aboutme`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `blog_admin`
--
ALTER TABLE `blog_admin`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `blog_article`
--
ALTER TABLE `blog_article`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- 使用表AUTO_INCREMENT `blog_cate`
--
ALTER TABLE `blog_cate`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '栏目ID', AUTO_INCREMENT=17;
--
-- 使用表AUTO_INCREMENT `blog_link`
--
ALTER TABLE `blog_link`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
