

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
)  ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='管理员帐号' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `mi_admin`
--

INSERT INTO `mi_admin` (`id`, `name`, `nickname`, `password`, `logintime`) VALUES
(1, 'admin', '小西瓜', '21232f297a57a5a743894a0e4a801fc3', 1404116067);



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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='文章数据' AUTO_INCREMENT=114 ;

--
-- 转存表中的数据 `mi_article`
--

INSERT INTO `mi_article` (`aid`, `cid`, `title`, `content`, `time`, `img`, `tag`, `summary`, `click`, `hot`) VALUES
(20, 1, '我愛臺北', '<p>\r\n  返校陪同学提前拍完了毕业照，走走停停在校园转了一大圈。四年前暑假，通过豆瓣我认识了两个比我大一届的学长，领着在校园里逛了一圈，巧得很，今天的路线顺序和那天是一样的。\r\n</p>\r\n<p>\r\n 同寝的一个同学放弃了本校的保研、但又考外失败最后调剂了回来，一波三折倒也还算有个不错的结果，下周随着学校的安排去到海南实习；另一个签了百度，不多不少的薪酬将将好，现在已经去到北京做事了。\r\n</p>\r\n<p>\r\n  有个室友大一就转到生科院的重点班去了（所以算上我，寝室只有三个人）。当年的转院考试我也报考了，所有的细节我都还记得很清楚：生科院的教室很大，头顶的日光灯灯管一直在闪，后墙贴着绿色的吹塑纸和剪贴画，黑板一侧钉着着生物肌肉挂图；监考的是一个秃顶的胖子，搬来一张椅子坐在挂图正下面，另一个穿长裙的四十来岁的女监考老师则踏着高跟鞋走来走去。过几天放榜了，我没考上，抹了一中午眼泪，下午旷课跑去看电影，张艺谋的《山楂树》。现在想想，如果考试真要是通过了，人生该是走上了一条多么不同的路。\r\n</p>\r\n<p>\r\n 不过究竟哪条路会更好，现在看来也难以权衡。但说到底，权衡又有什么意义呢。\r\n</p>', 1401177141, '', '臺北生活', '', 1, 1);
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='分类数据' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `mi_category`
--

INSERT INTO `mi_category` (`cid`, `cname`, `cdescription`) VALUES
(1, '臺北生活', '關於自己的生活日記'),
(4, '我的旅行', '四處遊走');

-- --------------------------------------------------------

--
-- 表的结构 `mi_comment`
--

CREATE TABLE IF EXISTS `mi_comment` ;
CREATE TABLE `mi_comment` (
  `coid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '评论id',
  `aid` int(11) NOT NULL,
  `couname` varchar(20) NOT NULL COMMENT '评论用户名称',
  `email` varchar(255) NOT NULL COMMENT '评论邮箱',
  `content` varchar(255) NOT NULL COMMENT '评论内容',
  `reply` varchar(255) DEFAULT NULL,
  `respond` char(10) NOT NULL DEFAULT '未回复',
  `time` int(10) NOT NULL COMMENT '评论时间',
  PRIMARY KEY (`coid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评论数据' AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='导航数据' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `mi_menu`
--

INSERT INTO `mi_menu` (`mid`, `mname`, `url`, `sort`) VALUES
(1, '部落格', './', 1),
(2, '關於', 'page/1.html', 2);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='独立页数据' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `mi_page`
--

INSERT INTO `mi_page` (`pid`, `name`, `title`, `keywords`, `description`, `content`) VALUES
(1, 'About', '關於自己', '簡單的男孩子', '簡單', '我是一個來自臺北的男孩子，你呢：）');