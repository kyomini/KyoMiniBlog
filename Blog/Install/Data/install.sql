

SET FOREIGN_KEY_CHECKS=0;
--

-- --------------------------------------------------------

--
-- 表的结构 `mi_admin`
--
DROP TABLE IF EXISTS `mi_admin`;
CREATE TABLE `mi_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(100) NOT NULL,
  `nickname` char(100) NOT NULL,
  `password` char(32) NOT NULL,
  `logintime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='管理员帐号'  AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `mi_admin`
--

INSERT INTO `mi_admin` (`id`, `name`, `nickname`, `password`, `logintime`) VALUES
(1, 'admin', '小铃铛', 'c4ca4238a0b923820dcc509a6f75849b', 0);



-- --------------------------------------------------------

--
-- 表的结构 `mi_article`
--

CREATE TABLE IF EXISTS `mi_article`;
CREATE TABLE `mi_article` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `time` int(10) NOT NULL,
  `img` varchar(200) NOT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `click` int(11) NOT NULL COMMENT '点击数',
  `hot` tinyint(4) NOT NULL DEFAULT '1' COMMENT '置顶',
  PRIMARY KEY (`aid`),
  UNIQUE KEY `aid` (`aid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='文章数据';



-- --------------------------------------------------------

--
-- 表的结构 `mi_category`
--

CREATE TABLE IF EXISTS `mi_category`;
CREATE TABLE `mi_category`(
  `cid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cname` varchar(30) NOT NULL,
  `cdescription` varchar(255) NOT NULL,
  PRIMARY KEY (`cid`),
  UNIQUE KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='分类数据' ;


-- --------------------------------------------------------

--
-- 表的结构 `mi_comment`
--

CREATE TABLE IF EXISTS `mi_comment` ;
CREATE TABLE `mi_comment` (
  `coid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '评论id',
  `couname` varchar(20) NOT NULL COMMENT '评论用户名称',
  `email` varchar(255) NOT NULL COMMENT '评论邮箱',
  `content` varchar(255) NOT NULL COMMENT '评论内容',
  `reply` varchar(255) DEFAULT NULL,
  `respond` char(10) NOT NULL DEFAULT '未回复',
  `time` int(10) NOT NULL COMMENT '评论时间',
  PRIMARY KEY (`coid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='评论数据' ;

-- --------------------------------------------------------

--
-- 表的结构 `mi_menu`
--

CREATE TABLE IF EXISTS `mi_menu` ;
CREATE TABLE `mi_menu` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '导航id',
  `mname` varchar(255) NOT NULL COMMENT '导航名称',
  `url` varchar(255) NOT NULL COMMENT '导航地址',
  `sort` smallint(6) NOT NULL COMMENT '导航排序',
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='导航数据';

-- --------------------------------------------------------

--
-- 表的结构 `mi_page`
--

CREATE TABLE IF EXISTS `mi_page`;
CREATE TABLE `mi_page` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(200) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`pid`),
  UNIQUE KEY `pid` (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='独立页数据' ;
;

