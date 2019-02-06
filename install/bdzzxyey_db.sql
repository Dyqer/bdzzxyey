-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2019-02-06 20:50:43
-- 服务器版本： 5.5.45
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdzzxyey_yey`
--

-- --------------------------------------------------------

--
-- 表的结构 `mx_admin`
--

CREATE TABLE IF NOT EXISTS `mx_admin` (
  `lc_admin_id` int(5) unsigned NOT NULL COMMENT '编号',
  `lc_admin_name` varchar(100) NOT NULL COMMENT '后台帐号会员名',
  `lc_admin_password` varchar(100) NOT NULL COMMENT '会员密码',
  `lc_admin_issuper` int(2) NOT NULL DEFAULT '0' COMMENT '会员是否超级管理员',
  `lc_admin_rank` varchar(150) DEFAULT NULL COMMENT '权限',
  `lc_admin_email` varchar(100) DEFAULT NULL COMMENT '会员邮箱',
  `lc_admin_tel` varchar(100) DEFAULT NULL COMMENT '会员电话',
  `lc_admin_qq` varchar(100) DEFAULT NULL COMMENT '会员QQ号',
  `lc_admin_qx` varchar(150) DEFAULT NULL COMMENT '会员权限',
  `xitong` int(2) DEFAULT '0' COMMENT '系统',
  `lanmu` int(2) DEFAULT '0' COMMENT '栏目',
  `danye` int(2) DEFAULT '0' COMMENT '单页',
  `news` int(2) DEFAULT '0' COMMENT '文章',
  `products` int(2) DEFAULT '0' COMMENT '图文',
  `down` int(2) DEFAULT '0' COMMENT '下载',
  `user` int(2) DEFAULT '0' COMMENT '会员',
  `gbook` int(2) DEFAULT '0' COMMENT '留言',
  `job` int(2) DEFAULT '0' COMMENT '职位',
  `dingdan` int(2) DEFAULT '0' COMMENT '订单',
  `gaoji` int(2) DEFAULT '0' COMMENT '高级',
  `touch` int(2) DEFAULT '0' COMMENT '手机',
  `hsz` int(2) DEFAULT '0' COMMENT '回收站',
  `weixin` int(2) DEFAULT '0' COMMENT '微信网站',
  `nav` int(1) DEFAULT '0' COMMENT '导航',
  `db` int(1) DEFAULT '0' COMMENT '数据库'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mx_admin`
--

INSERT INTO `mx_admin` (`lc_admin_id`, `lc_admin_name`, `lc_admin_password`, `lc_admin_issuper`, `lc_admin_rank`, `lc_admin_email`, `lc_admin_tel`, `lc_admin_qq`, `lc_admin_qx`, `xitong`, `lanmu`, `danye`, `news`, `products`, `down`, `user`, `gbook`, `job`, `dingdan`, `gaoji`, `touch`, `hsz`, `weixin`, `nav`, `db`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '', '', '', '', NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `mx_banner`
--

CREATE TABLE IF NOT EXISTS `mx_banner` (
  `lc_id` int(5) unsigned NOT NULL COMMENT 'banner编号',
  `lc_title` varchar(50) NOT NULL COMMENT 'banner标题',
  `lc_pic` varchar(150) DEFAULT NULL COMMENT 'banner图路径',
  `lc_datetime` datetime NOT NULL COMMENT '添加时间',
  `lc_sort_id` int(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序编号',
  `lc_url` varchar(150) DEFAULT NULL COMMENT '外部链接',
  `lc_zt` int(1) DEFAULT '1' COMMENT '状态',
  `c_id` int(2) NOT NULL DEFAULT '0' COMMENT '类别',
  `lc_type` int(2) DEFAULT '0' COMMENT '所属类型'
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mx_banner`
--

INSERT INTO `mx_banner` (`lc_id`, `lc_title`, `lc_pic`, `lc_datetime`, `lc_sort_id`, `lc_url`, `lc_zt`, `c_id`, `lc_type`) VALUES
(1, '1', '../uploadfile/image/20160415/20160415174423_54541.jpg', '2014-06-10 16:22:18', 1, '', 1, 1, 1),
(2, '2', '../uploadfile/image/20160415/20160415173846_53717.jpg', '2014-06-10 16:22:34', 2, '', 1, 1, 1),
(3, '3', '../uploadfile/image/20160415/20160415173835_13452.jpg', '2014-06-10 16:22:49', 3, '', 1, 1, 1),
(11, '3', '../uploadfile/image/20160415/20160415175821_92584.jpg', '2016-04-15 17:58:21', 10, '', 1, 2, 1),
(10, '2', '../uploadfile/image/20160415/20160415175802_53464.jpg', '2016-04-15 17:58:02', 9, '', 1, 2, 1),
(9, '1', '../uploadfile/image/20160415/20160415175316_40160.jpg', '2016-04-15 17:53:16', 8, '', 1, 2, 1);

-- --------------------------------------------------------

--
-- 表的结构 `mx_banner_type`
--

CREATE TABLE IF NOT EXISTS `mx_banner_type` (
  `c_id` int(10) unsigned NOT NULL COMMENT '编号',
  `c_title` varchar(255) NOT NULL COMMENT '类别标题',
  `c_datetime` datetime DEFAULT NULL COMMENT '添加日期',
  `c_content` text COMMENT '类别说明',
  `c_sort_id` int(2) NOT NULL DEFAULT '0' COMMENT '类别排序',
  `c_type` int(2) DEFAULT '0' COMMENT '所属类型'
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mx_banner_type`
--

INSERT INTO `mx_banner_type` (`c_id`, `c_title`, `c_datetime`, `c_content`, `c_sort_id`, `c_type`) VALUES
(1, 'banenr', '2014-06-10 16:21:54', '', 1, 1),
(2, '关于我们', '2016-03-05 14:04:24', '', 2, 1);

-- --------------------------------------------------------

--
-- 表的结构 `mx_config`
--

CREATE TABLE IF NOT EXISTS `mx_config` (
  `lc_id` int(5) unsigned NOT NULL COMMENT '编号',
  `lc_name` varchar(100) DEFAULT NULL COMMENT '变量名',
  `lc_value` varchar(255) DEFAULT '0' COMMENT '变量值'
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mx_config`
--

INSERT INTO `mx_config` (`lc_id`, `lc_name`, `lc_value`) VALUES
(1, 'partner', ''),
(2, 'key', ''),
(3, 'seller_email ', ''),
(4, 'program_schema', ''),
(5, 'have_phone', '0'),
(6, 'root_url', '/mx3.3/'),
(7, 'web_name', 'MX5.0'),
(8, 'web_keywords', 'MX5.0'),
(9, 'web_description', 'MX5.0'),
(10, 'email_port', '465'),
(15, 'gbook_email_come', '0'),
(16, 'gbook_email_go', '0'),
(17, 'email_zt', 'qq'),
(18, 'email_user', ''),
(19, 'email_password', ''),
(20, 'job_email_come', '0'),
(21, 'job_email_go', '1'),
(23, 'x_eid', ''),
(24, 'x_uid', ''),
(25, 'x_pwd_md5', ''),
(29, 'job_duanxin_come', '0'),
(30, 'gbook_duanxin_come', '0'),
(31, 'x_target_no', ''),
(32, 'pc_big_width', '600'),
(33, 'pc_big_height', '0'),
(34, 'pc_small_width', '220'),
(35, 'pc_small_height', '0'),
(36, 'sj_big_width', '300'),
(37, 'sj_big_height', '0'),
(38, 'sj_small_width', '120'),
(39, 'sj_small_height', '0'),
(40, 'web_keywords', 'MX5.0'),
(41, 'pc_big_cut', '0'),
(42, 'pc_small_cut', '0'),
(43, 'sj_big_cut', '0'),
(44, 'sj_small_cut', '0');

-- --------------------------------------------------------

--
-- 表的结构 `mx_customfields`
--

CREATE TABLE IF NOT EXISTS `mx_customfields` (
  `lc_id` int(10) unsigned NOT NULL,
  `lc_fieldname` varchar(50) DEFAULT NULL COMMENT '字段名',
  `lc_fieldtype` varchar(10) DEFAULT NULL COMMENT '字段类型',
  `lc_fieldlong` int(5) DEFAULT NULL COMMENT '长度',
  `lc_table` varchar(10) DEFAULT NULL COMMENT '所属表',
  `lc_fieldnotes` varchar(100) DEFAULT NULL COMMENT '备注',
  `lc_zt` int(2) NOT NULL DEFAULT '0' COMMENT '审核状态(0启用1禁用)'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `mx_danye`
--

CREATE TABLE IF NOT EXISTS `mx_danye` (
  `lc_id` int(11) NOT NULL COMMENT '编号',
  `lc_title` varchar(255) NOT NULL COMMENT '单页标题',
  `lc_content` text COMMENT '单页内容',
  `lc_sort_id` int(4) NOT NULL DEFAULT '0' COMMENT '排序序号',
  `lc_phone` int(2) DEFAULT '0' COMMENT '是否手机',
  `lc_del` int(2) DEFAULT '0' COMMENT '是否删除',
  `lc_del_time` datetime DEFAULT NULL COMMENT '删除时间',
  `lc_cant_del` int(4) DEFAULT '0' COMMENT '是否可删',
  `lc_zt` int(4) DEFAULT '1' COMMENT '是否发布',
  `lanmu` int(4) NOT NULL COMMENT '所属栏目',
  `lc_phone_content` text COMMENT '手机版内容',
  `lc_url` varchar(50) DEFAULT NULL COMMENT '外部链接',
  `lc_keywords` varchar(100) DEFAULT NULL COMMENT '关键词',
  `lc_description` varchar(100) DEFAULT NULL COMMENT '描述',
  `lc_pic` varchar(255) DEFAULT NULL COMMENT '图片路径'
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mx_danye`
--

INSERT INTO `mx_danye` (`lc_id`, `lc_title`, `lc_content`, `lc_sort_id`, `lc_phone`, `lc_del`, `lc_del_time`, `lc_cant_del`, `lc_zt`, `lanmu`, `lc_phone_content`, `lc_url`, `lc_keywords`, `lc_description`, `lc_pic`) VALUES
(1, '走进龙采', '&nbsp;&nbsp;', 1, 1, 0, '2013-06-18 15:56:54', 0, 1, 3, '龙采龙采', 'index.php', '', '', '../uploadfile/image/20150929/20150929144418_82616.jpg'),
(2, '联系我们', '<p>\r\n	联系我们联系我们联系我们d\r\n</p>\r\n<br />', 2, 1, 1, '2015-09-29 16:37:45', 0, 1, 3, '测试', '', '', '', NULL),
(3, '厨房', '<div style="text-align:center;">\r\n	<img src="/uploadfile/image/20160415/20160415163154_65519.png" alt="" /><span style="line-height:1.5;"></span>\r\n</div>', 3, 0, 0, NULL, 0, 1, 7, '百度推广11', '', '', '', '../uploadfile/image/20160415/20160415163154_65519.png'),
(4, '网站建设', '网站建设', 4, 0, 0, NULL, 0, 1, 8, '<span>网站建设</span>', '', '', '', NULL),
(5, 'dfdfd', '', 5, 0, 1, '2014-06-04 12:08:22', 0, 1, 3, '测试', '', '', '', NULL),
(6, '联系我们', '', 6, 0, 0, NULL, 0, 1, 9, '联系我们', '', '', '', NULL),
(7, '办园目标', '<p class="MsoNormal" style="text-align:center;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">办园目标</span>\r\n</p>\r\n<p class="MsoNormal" style="text-align:center;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">感悟生活&nbsp;培养习惯</span>\r\n</p>\r\n<p class="MsoNormal" style="text-align:center;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">开启智慧&nbsp;&nbsp;提升生命质量</span>\r\n</p>\r\n<p class="MsoNormal" style="text-align:center;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';"><img src="../uploadfile/image/20160415/20160415094620_27723.png" alt="" /><br />\r\n</span>\r\n</p>', 7, 0, 0, NULL, 0, 1, 10, '&nbsp; &nbsp; 黑龙江龙采科技集团有限责任公司是集网站建设、网络推广、网络工程建设、软件开发、计算机维护、多媒体视频制作为主营业务 的高新技术企业。公司以科技为发展之本，在管理与技 术领域中大力发掘人才、培养技术精英，为企业的持续快速发展提公以科技为发展之本，在管理与技 术领域中大力发掘人才、培养技术精英，为企业的持续快速发展提供强&nbsp;', '', '', '', '../uploadfile/image/20150930/20150930085717_19665.jpg'),
(8, '办园理念', '<p class="MsoNormal" style="text-align:center;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">办园理念</span>\r\n</p>\r\n<p class="MsoNormal" style="text-align:center;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">建国君民&nbsp;教学为先&nbsp;人生百年&nbsp;立于幼学&nbsp;蒙以养正</span>\r\n</p>\r\n<p class="MsoNormal" style="text-align:center;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">欣赏生命&nbsp;珍爱生命&nbsp;关注生命&nbsp;尊重生命&nbsp;敬畏生命</span>\r\n</p>\r\n<p class="MsoNormal" style="text-align:center;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';"><img src="../uploadfile/image/20160415/20160415094409_37583.png" alt="" width="800" height="321" title="" align="" /><br />\r\n</span>\r\n</p>', 8, 0, 0, NULL, 0, 1, 10, '', '', '', '', ''),
(9, '关于我们', '<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;"></span> \r\n<p class="MsoNormal" style="text-align:center;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">八陡镇中心幼儿园简介</span> \r\n</p>\r\n<p class="MsoNormal" style="text-indent:24pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">八陡镇中心幼儿园坐落于美丽的黑山脚下，占地面积4267平方米，建筑面积2262平方米，现有教职员工总数17人，专任教师9名，保育员3名，食堂人员2名，专业保安2名，其中公办教师6名。教师学历达标率100%、持证上岗率100%。2015年12月被评为淄博市市级示范幼儿园，博山区教学先进单位。博山区年度工作检查优秀单位、八陡镇基层服务先进单位。</span> \r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:24.1000pt;text-align:justify;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">幼儿园严格按照山东省乡镇中心幼儿园办园标准配齐配足教育教学设施设备，设有专门的寝室、盥洗室、卫生保健室、美术活动室、舞蹈活动室、音乐活动室、图书阅览室、科学发现室等多功能教室；教室内配备大屏幕电视机、电脑、电子钢琴等现代化教学设施，安装有中央空调、紫外线消毒灯等；户外建有高标准的塑胶活动场地，富有童趣的多功能滑梯、篮球架、组合秋千、半球攀爬、多功能荡桥等大型玩具，配有多种多样的体育器械以及中型玩具，各种音乐器械配备齐全，配有沙池、戏水池、种植区、饲养角等幼儿活动场所；有药品柜、保健资料柜、流水洗手设备，有体重计、对数视力表，常用消毒液、体温计、防治常见病药物和外用药等卫生保健设施；驻地企业宏达玻璃有限公司为阅览室配备幼儿及教师读物1500余册。幼儿园环境优美舒适，适合幼儿身心发展，我们深信，在这样优质的教育环境里，孩子们的成长一定是健康快乐的！</span> \r\n</p>\r\n<p class="MsoNormal" style="text-indent:24pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">幼儿园根据幼儿年龄生长特点，制定相应的一日生活作息流程，各班能合理安排幼儿在园一天的生活和学习，内容丰富，形式多样，动静交替，户内户外活动交替，保证每天户外活动2小时；重视培养幼儿良好的生活、卫生习惯，培养幼儿积极参与游戏和其他活动的能力，培养幼儿良好的生活自理能力、自我管理能力和学习能力，培养幼儿的语言表达以及交往能力，培养幼儿欣赏美和表现美的能力。</span> \r\n</p>\r\n<p class="MsoNormal" style="text-indent:24pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">幼儿园教育教学常规工作常抓不懈，积极开展教研和教改，定期组织教师进行业务学习，集体备课，教师业务水平不断提升。</span> \r\n</p>\r\n<p class="MsoNormal" style="text-indent:24pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">幼儿园建立健全并严格执行各项卫生保健制度，卫生保健人员积极参加各种业务知识培训，并定期进行卫生检查，组织园内卫生保健工作评比，对全园的卫生保健工作严格监控把关。</span> \r\n</p>\r\n<p class="MsoNormal" style="text-indent:24pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">幼儿园按要求按季节制定营养均衡食谱，食谱制定符合不同幼儿的生理特点，符合营养均衡和色、香、味、美的原则，食谱对家长公开；对食物的购买、贮存和加工严格把关，坚持食物48小时留样并作好留样记录。</span> \r\n</p>\r\n<p class="MsoNormal" style="text-indent:24.1000pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">八陡镇中心幼儿园张开双臂，拥抱清晨每一个入园的孩子，让更多的孩子在这里接受更优质的学前教育，为更多孩子幸福美好的一生奠定坚实的基础！</span> \r\n</p>\r\n<p class="MsoNormal" style="text-indent:24pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;"> </span> \r\n</p>\r\n<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;"></span><br />', 9, 0, 0, NULL, 0, 1, 10, '', '', '', '', '../uploadfile/image/20160415/20160415175229_36622.jpg'),
(10, '底部二维码', '<img src="../uploadfile/image/20160227/20160227055139_95317.jpg" alt="" />&nbsp;&nbsp; <img src="../uploadfile/image/20160227/20160227055115_85503.jpg" alt="" />&nbsp;&nbsp; <br />', 10, 0, 0, NULL, 0, 1, 3, '', '', '', '', ''),
(11, '电话', '<span style="line-height:2;font-size:18px;font-family:''Microsoft YaHei'';">0533-4911669</span><br />', 11, 0, 0, NULL, 0, 1, 11, '', '', '', '', ''),
(12, 'qq', '121453928<br />', 12, 0, 0, NULL, 0, 1, 11, '', '', '', '', ''),
(13, '展区', '<div style="text-align:center;">\r\n	<img src="/uploadfile/image/20160415/20160415152117_71839.jpg" alt="" /><span style="line-height:1.5;"></span>\r\n</div>', 13, 0, 0, NULL, 0, 1, 7, '', '', '', '', '../uploadfile/image/20160415/20160415163144_25449.png'),
(14, '展区', '<div style="text-align:center;">\r\n	<img src="/uploadfile/image/20160415/20160415152105_97036.jpg" alt="" /><span style="line-height:1.5;"></span>\r\n</div>', 14, 0, 0, NULL, 0, 1, 7, '', '', '', '', '../uploadfile/image/20160415/20160415163130_79038.png'),
(15, '学校外景', '<div style="text-align:center;">\r\n	<img src="/uploadfile/image/20160417/20160417161515_22666.jpg" alt="" /><span style="line-height:1.5;"></span>\r\n</div>', 15, 0, 0, NULL, 0, 1, 7, '', '', '', '', '../uploadfile/image/20160417/20160417161515_22666.jpg'),
(16, '联系内容', '<span style="font-size:16px;font-family:''Microsoft YaHei'';line-height:2;">电话：0533-4911669</span><br />\r\n<span style="font-size:16px;font-family:''Microsoft YaHei'';line-height:2;"> 地址：</span><span style="font-family:''Microsoft YaHei'';font-size:16px;line-height:2;">淄博市博山区八陡镇北河口村黑山前302号</span><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;"></span><br />\r\n<span style="font-size:16px;font-family:''Microsoft YaHei'';line-height:2;"> 电子邮件：12345678@qq.com</span>', 16, 0, 0, NULL, 0, 1, 11, '', '', '', '', ''),
(17, '园所荣誉', '<div style="text-align:center;">\r\n	<img src="../uploadfile/image/20160415/20160415094719_35502.jpg" alt="" width="800" height="593" title="" align="" /> \r\n</div>', 17, 0, 0, NULL, 0, 1, 10, '', '', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `mx_dibu`
--

CREATE TABLE IF NOT EXISTS `mx_dibu` (
  `lc_id` int(4) NOT NULL,
  `lc_content` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mx_dibu`
--

INSERT INTO `mx_dibu` (`lc_id`, `lc_content`) VALUES
(1, '<div id="botbj">\n	<div id="bot">\n		<div id="fot">\n			<p>\n				<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;淄博市博山区八陡镇北河口村黑山前302号</span> \n			</p>\n			<p>\n				<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">咨询热线：0533-</span><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">4911669</span> \n			</p>\n		</div>\n	</div>\n</div>'),
(2, '<p>\r\n	<strong>友情链接：</strong> <a href="http://www.longcai.com" target="_blank">龙采集团</a> <a href="http://www.longcai.com" target="_blank">山西龙采</a></p>\r\n'),
(3, '<p>\r\n	<!-- 填写企业qq代码 --></p>\r\n'),
(4, '1'),
(5, '../uploadfile/image/20160415/20160415155753_40006.png');

-- --------------------------------------------------------

--
-- 表的结构 `mx_dingdan`
--

CREATE TABLE IF NOT EXISTS `mx_dingdan` (
  `lc_id` int(255) NOT NULL,
  `lc_user_id` int(5) NOT NULL COMMENT '会员id',
  `lc_name` varchar(100) CHARACTER SET gbk DEFAULT NULL COMMENT '订单人姓名',
  `lc_place` varchar(150) CHARACTER SET gbk DEFAULT NULL COMMENT '收货地址',
  `lc_phone` int(30) DEFAULT NULL COMMENT '订单人电话',
  `lc_yb` int(30) DEFAULT NULL COMMENT '订单人邮编',
  `lc_time` varchar(50) DEFAULT NULL COMMENT '最佳收货时间',
  `lc_add_time` datetime DEFAULT NULL COMMENT '订单添加时间',
  `lc_price` int(10) NOT NULL COMMENT '邮费',
  `lc_express_way` int(4) DEFAULT NULL COMMENT '配送方式',
  `lc_zt` int(2) DEFAULT NULL COMMENT '状态'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `mx_down`
--

CREATE TABLE IF NOT EXISTS `mx_down` (
  `lc_id` int(11) unsigned NOT NULL,
  `lc_title` varchar(255) NOT NULL COMMENT '文章标题',
  `lc_pic` varchar(255) DEFAULT NULL COMMENT '文章图片',
  `lc_url` varchar(200) DEFAULT NULL COMMENT '下载文件地址',
  `lc_datetime` datetime NOT NULL COMMENT '添加日期',
  `lc_content` text COMMENT '文章内容',
  `lc_jianjie` text COMMENT '文章简介',
  `lc_key` varchar(255) DEFAULT NULL COMMENT '文章关键词',
  `lc_sort_id` int(4) NOT NULL DEFAULT '0' COMMENT '排序序号',
  `lc_tj` int(4) NOT NULL DEFAULT '0' COMMENT '是否推荐，是为1',
  `lc_hits` int(8) NOT NULL DEFAULT '0' COMMENT '点击率',
  `lc_from` varchar(255) DEFAULT NULL COMMENT '来源',
  `lc_qx` int(2) DEFAULT '1' COMMENT '权限',
  `c_id` int(4) NOT NULL DEFAULT '0' COMMENT '类别编号',
  `lc_phone_content` text COMMENT '手机版内容',
  `lc_keywords` varchar(100) DEFAULT NULL COMMENT '关键词',
  `lc_description` varchar(100) DEFAULT NULL COMMENT '描述'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mx_down`
--

INSERT INTO `mx_down` (`lc_id`, `lc_title`, `lc_pic`, `lc_url`, `lc_datetime`, `lc_content`, `lc_jianjie`, `lc_key`, `lc_sort_id`, `lc_tj`, `lc_hits`, `lc_from`, `lc_qx`, `c_id`, `lc_phone_content`, `lc_keywords`, `lc_description`) VALUES
(1, '1', '', '/mx3.3/uploadfile/file/20140604/20140604005717_30374.docx', '2014-06-04 08:57:22', '', '', NULL, 1, 0, 0, '', 0, 1, NULL, '', ''),
(2, '1', '', '/mx3.3/uploadfile/file/20140604/20140604005746_45625.docx', '2014-06-04 08:57:49', '', '', NULL, 2, 0, 0, '', 0, 1, NULL, '', ''),
(3, '3', '', '', '2014-06-04 08:58:25', '', '', NULL, 3, 0, 0, '', 0, 1, NULL, '', ''),
(4, '4', '', '', '2014-06-04 08:58:34', '', '', NULL, 4, 0, 0, '', 0, 1, NULL, '', '');

-- --------------------------------------------------------

--
-- 表的结构 `mx_down_type`
--

CREATE TABLE IF NOT EXISTS `mx_down_type` (
  `c_id` int(10) unsigned NOT NULL COMMENT '编号',
  `c_title` varchar(255) NOT NULL COMMENT '文章类别标题',
  `c_pid` int(4) NOT NULL DEFAULT '0' COMMENT '文章父类别编号',
  `c_datetime` datetime NOT NULL COMMENT '添加日期',
  `c_content` text COMMENT '类别说明',
  `c_sort_id` int(4) NOT NULL DEFAULT '0' COMMENT '类别排序',
  `lanmu` int(4) NOT NULL DEFAULT '0' COMMENT '所属栏目'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mx_down_type`
--

INSERT INTO `mx_down_type` (`c_id`, `c_title`, `c_pid`, `c_datetime`, `c_content`, `c_sort_id`, `lanmu`) VALUES
(1, '下载中心', 0, '2014-03-04 11:37:49', '', 1, 4);

-- --------------------------------------------------------

--
-- 表的结构 `mx_express_way`
--

CREATE TABLE IF NOT EXISTS `mx_express_way` (
  `lc_id` int(4) NOT NULL COMMENT '编号',
  `lc_title` varchar(255) DEFAULT NULL COMMENT '配送方式名称',
  `lc_price` varchar(255) DEFAULT NULL COMMENT '配送方式价格'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `mx_friendlink`
--

CREATE TABLE IF NOT EXISTS `mx_friendlink` (
  `lc_id` int(11) NOT NULL COMMENT '编号',
  `lc_title` varchar(50) NOT NULL COMMENT '标题',
  `lc_pic` varchar(150) NOT NULL COMMENT '图片',
  `lc_url` varchar(50) NOT NULL COMMENT '链接地址',
  `c_id` int(5) NOT NULL DEFAULT '0' COMMENT '分类编号',
  `lc_sort_id` int(5) NOT NULL DEFAULT '0' COMMENT '排序编号',
  `lc_datetime` datetime NOT NULL COMMENT '日期',
  `lc_zt` int(2) NOT NULL DEFAULT '0' COMMENT '状态'
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mx_friendlink`
--

INSERT INTO `mx_friendlink` (`lc_id`, `lc_title`, `lc_pic`, `lc_url`, `c_id`, `lc_sort_id`, `lc_datetime`, `lc_zt`) VALUES
(2, '山东省教育厅', '', 'http://www.sdedu.gov.cn/', 1, 3, '2014-08-28 14:40:10', 0),
(5, '山东省教育厅', '', 'http://www.sdedu.gov.cn/', 1, 5, '2016-04-15 16:39:08', 0);

-- --------------------------------------------------------

--
-- 表的结构 `mx_friendlink_type`
--

CREATE TABLE IF NOT EXISTS `mx_friendlink_type` (
  `c_id` int(10) unsigned NOT NULL,
  `c_title` varchar(50) NOT NULL,
  `c_datetime` datetime DEFAULT NULL,
  `c_content` text,
  `c_sort_id` int(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mx_friendlink_type`
--

INSERT INTO `mx_friendlink_type` (`c_id`, `c_title`, `c_datetime`, `c_content`, `c_sort_id`) VALUES
(1, '友情链接', '2014-08-28 12:13:13', '友情链接', 1);

-- --------------------------------------------------------

--
-- 表的结构 `mx_gbook`
--

CREATE TABLE IF NOT EXISTS `mx_gbook` (
  `lc_id` int(8) unsigned NOT NULL COMMENT '编号',
  `lc_title` varchar(255) NOT NULL COMMENT '留言标题',
  `lc_content` text COMMENT '留言内容',
  `lc_name` varchar(20) DEFAULT NULL COMMENT '留言者姓名',
  `lc_tel` varchar(30) DEFAULT NULL COMMENT '电话',
  `lc_email` varchar(100) DEFAULT NULL COMMENT '邮箱',
  `lc_datetime` varchar(200) DEFAULT NULL COMMENT '添加日期',
  `lc_ip` varchar(100) DEFAULT NULL COMMENT 'IP地址',
  `lc_reply` text COMMENT '回复',
  `lc_zt` int(4) DEFAULT '-1' COMMENT '留言状态',
  `lanmu` int(2) DEFAULT '0' COMMENT '栏目'
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mx_gbook`
--

INSERT INTO `mx_gbook` (`lc_id`, `lc_title`, `lc_content`, `lc_name`, `lc_tel`, `lc_email`, `lc_datetime`, `lc_ip`, `lc_reply`, `lc_zt`, `lanmu`) VALUES
(1, '123', '123', '123', '123', '123', '2016-02-25 15:02:32', '127.0.0.1', NULL, -1, 0),
(2, '1', '1', '1', '1', '1', '2016-02-25 15:20:10', '127.0.0.1', NULL, -1, 0),
(3, 'sd', 'dsd', 'sf', 'sf', 'sd', '2016-02-27 12:50:22', '45.23.50.84', NULL, -1, 0),
(4, '12312321312321123', '123', '娃娃打我的爱我的爱我爱的', '123', '123', '2016-02-27 16:37:43', '45.23.50.84', NULL, -1, 0),
(5, '12312321312321123', '1', '1', '阿达哇哇', '111', '2016-02-27 16:38:12', '45.23.50.84', NULL, -1, 0),
(6, '阿萨德阿萨德阿萨德撒的撒的阿萨德', '阿萨德阿萨德阿萨德撒的撒的阿萨德', '阿萨德阿萨德阿萨德撒的撒的阿萨德 ', ' 阿萨德阿萨德阿萨德撒的撒的阿萨德', '阿萨德阿萨德阿萨德撒的撒的阿萨德', '2016-02-27 16:50:08', '45.23.50.84', NULL, -1, 0),
(7, '的阿萨德阿萨德阿萨德 ', ' 阿大声道阿萨德阿萨德', '阿萨德爱迪生阿萨德阿萨德 ', '阿萨德阿萨德阿萨德 ', '阿萨德阿萨德阿萨 ', '2016-02-27 16:51:07', '45.23.50.84', NULL, -1, 0),
(8, '123123213123211231', '123', '阿大声道阿萨德阿萨德阿萨德', '阿萨德阿萨德阿萨德阿萨 ', '12312', '2016-02-27 16:52:38', '45.23.50.84', NULL, -1, 0),
(9, '阿萨德阿萨德阿萨德阿萨德阿萨德撒的', '阿萨德阿萨德阿萨大声道阿萨德', '阿萨德阿萨德阿萨德阿萨德', '阿萨德阿萨德撒的撒打算', '阿萨德阿萨德阿萨阿萨德阿萨德阿萨德', '2016-02-27 16:55:35', '45.23.50.84', NULL, -1, 0),
(10, '1', '11', '1', '1', '111', '2016-02-27 17:04:57', '45.23.50.84', NULL, -1, 0),
(11, 'merci merci merci me', 'merci merci merci merci merci merci merci merci merci merci mececmirri merci merci merci merci merci merci merci merci merci mercimerci merci merci merci merci merci merci merci merci merci mercimerci merci merci merci merci merci merci merci merci merci mercipour cette sÃ©ance photo, Ã§a a Ã©tÃ© une vraie belle surprise quand on a vu le rÃ©sultat, t&#8217;es vraiment douÃ©e !!!', 'Marty', '4kFFVgH7ikn', 'g4czxctab1@mail.com', '2017-01-10 04:10:24', '188.143.232.32', NULL, -1, 0),
(12, '', '', '', '', '', '2017-01-10 04:10:25', '188.143.232.32', NULL, -1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `mx_gwc`
--

CREATE TABLE IF NOT EXISTS `mx_gwc` (
  `lc_id` int(255) NOT NULL COMMENT '编号',
  `lc_user_id` int(255) NOT NULL COMMENT '会员id',
  `lc_goods_id` int(255) DEFAULT NULL COMMENT '商品id',
  `lc_goods_num` int(255) NOT NULL DEFAULT '1' COMMENT '数量',
  `lc_price` int(255) DEFAULT NULL COMMENT '价格',
  `lc_zt` int(4) DEFAULT NULL COMMENT '购物车状态'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `mx_jianli`
--

CREATE TABLE IF NOT EXISTS `mx_jianli` (
  `lc_id` int(4) NOT NULL COMMENT '编号',
  `lc_title` varchar(200) DEFAULT NULL COMMENT '简历标题',
  `lc_sex` varchar(10) DEFAULT NULL COMMENT '性别',
  `lc_birthday` varchar(50) DEFAULT NULL COMMENT '出生日期',
  `lc_sfz` varchar(100) DEFAULT NULL COMMENT '身份证',
  `lc_married` varchar(10) DEFAULT NULL COMMENT '婚否',
  `lc_zhicheng` varchar(50) DEFAULT NULL COMMENT '职称',
  `lc_school` varchar(200) DEFAULT NULL COMMENT '毕业学校',
  `lc_zhuanye` varchar(200) DEFAULT NULL COMMENT '专业',
  `lc_xueli` varchar(200) DEFAULT NULL COMMENT '学历',
  `lc_address` varchar(200) DEFAULT NULL COMMENT '地址',
  `lc_jiguan` varchar(200) DEFAULT NULL COMMENT '籍贯',
  `lc_tel` varchar(200) DEFAULT NULL COMMENT '电话',
  `lc_zhiwei` varchar(200) DEFAULT NULL COMMENT '应聘职位',
  `lc_price` varchar(200) DEFAULT NULL COMMENT '期望月薪',
  `lc_xxjl` text COMMENT '学习经历',
  `lc_gzjl` text COMMENT '工作经历',
  `lc_yaoqiu` text COMMENT '对公司要求',
  `lc_techang` text COMMENT '特长',
  `lc_datetime` datetime DEFAULT NULL COMMENT '添加日期',
  `lc_zt` int(4) DEFAULT '-1' COMMENT '简历状态'
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mx_jianli`
--

INSERT INTO `mx_jianli` (`lc_id`, `lc_title`, `lc_sex`, `lc_birthday`, `lc_sfz`, `lc_married`, `lc_zhicheng`, `lc_school`, `lc_zhuanye`, `lc_xueli`, `lc_address`, `lc_jiguan`, `lc_tel`, `lc_zhiwei`, `lc_price`, `lc_xxjl`, `lc_gzjl`, `lc_yaoqiu`, `lc_techang`, `lc_datetime`, `lc_zt`) VALUES
(1, '对方答复', '男', '12222222', '', '未婚', '', '', '', '', '', '', '', '', '', '', '', '', '', '2014-06-04 08:55:06', 0),
(2, '1', '男', '1', '1', '未婚', '1', '1', '1', '11', '1', '1', '1', '诚聘美工', '1', '1', '1', '1', '1', '2016-02-25 15:19:42', 0);

-- --------------------------------------------------------

--
-- 表的结构 `mx_job`
--

CREATE TABLE IF NOT EXISTS `mx_job` (
  `lc_id` int(4) NOT NULL COMMENT '编号',
  `lc_title` varchar(200) NOT NULL COMMENT '职位标题',
  `lc_content` text COMMENT '职位内容',
  `lc_num` varchar(20) DEFAULT '0' COMMENT '招聘人数',
  `lc_sort_id` int(8) NOT NULL DEFAULT '0' COMMENT '排序号',
  `lc_hits` int(8) NOT NULL DEFAULT '0' COMMENT '点击率',
  `lc_datetime` datetime NOT NULL COMMENT '添加日期'
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mx_job`
--

INSERT INTO `mx_job` (`lc_id`, `lc_title`, `lc_content`, `lc_num`, `lc_sort_id`, `lc_hits`, `lc_datetime`) VALUES
(1, '诚聘程序员', '诚聘程序员&nbsp;&nbsp; 诚聘程序员&nbsp;&nbsp;诚聘程序员&nbsp;&nbsp;诚聘程序员&nbsp;&nbsp;诚聘程序员&nbsp;&nbsp;诚聘程序员&nbsp;&nbsp;诚聘程序员&nbsp;&nbsp;<br />', '3', 1, 0, '2014-02-25 17:32:09'),
(2, '诚聘美工', '诚聘美工 诚聘美工&nbsp; 诚聘美工 诚聘美工&nbsp;&nbsp;&nbsp; 诚聘美工 诚聘美工&nbsp; 诚聘美工 诚聘美工&nbsp;&nbsp;&nbsp;诚聘美工 诚聘美工&nbsp; 诚聘美工 诚聘美工&nbsp;&nbsp;&nbsp;<br />', '6', 2, 0, '2014-02-26 08:36:47'),
(3, '12', '1', '1', 3, 0, '2016-02-24 17:03:31'),
(4, '1', '1', '1', 4, 0, '2016-02-24 17:03:38'),
(5, '的非官方和购买', '1国际公法就换个', '1', 5, 0, '2016-02-24 17:03:48');

-- --------------------------------------------------------

--
-- 表的结构 `mx_lanmu`
--

CREATE TABLE IF NOT EXISTS `mx_lanmu` (
  `c_id` int(11) NOT NULL COMMENT '编号',
  `c_title` varchar(200) NOT NULL COMMENT '栏目名称',
  `c_type` int(4) NOT NULL DEFAULT '0' COMMENT '栏目类别(0单页1文章2图文3下载4招聘5留言)',
  `c_content` text COMMENT '文章内容',
  `c_link` varchar(255) DEFAULT NULL COMMENT '栏目链接',
  `c_sort_id` int(8) NOT NULL DEFAULT '0' COMMENT '排序序号',
  `c_delete` int(2) NOT NULL DEFAULT '0' COMMENT '是否可删除(1为是)',
  `c_pc` int(2) NOT NULL DEFAULT '1' COMMENT '是否pc显示(1为是)',
  `c_phone` int(2) NOT NULL DEFAULT '0' COMMENT '是否phone显示(1为是)',
  `c_phone_name` varchar(255) DEFAULT NULL COMMENT 'phone栏目名称',
  `c_zt` int(4) DEFAULT '1' COMMENT '栏目状态'
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mx_lanmu`
--

INSERT INTO `mx_lanmu` (`c_id`, `c_title`, `c_type`, `c_content`, `c_link`, `c_sort_id`, `c_delete`, `c_pc`, `c_phone`, `c_phone_name`, `c_zt`) VALUES
(1, '园内文章', 1, '', 'index.php?p=news_list&lanmu=1', 1, 1, 1, 1, '园内文章', 1),
(2, '园内相册', 2, '', 'index.php?p=products_list&lanmu=2', 2, 1, 1, 1, '客户案例', 1),
(3, '走进公司', 0, '', 'index.php?p=about&lanmu=3', 3, 1, 1, 1, '走进公司', 1),
(4, '下载中心', 3, '', 'index.php?p=down_list&lanmu=4', 4, 1, 1, 0, '下载中心', 1),
(5, '园长寄语', 4, '', 'index.php?p=job_list&lanmu=5', 5, 1, 0, 0, '在线招聘', 1),
(6, '在线留言', 5, '', 'index.php?p=gbook_list&lanmu=6', 6, 1, 0, 0, '留言列表', 1),
(7, '学校展示', 0, '', 'index.php?p=about&lanmu=7', 7, 0, 1, 1, '百度推广', 1),
(8, '网站建设', 0, '', 'index.php?p=about&lanmu=8', 8, 0, 1, 1, '网站建设', 1),
(9, '联系我们', 0, '', 'index.php?p=about&lanmu=9', 9, 0, 1, 1, '联系我们', 1),
(10, '关于我们', 0, '', 'index.php?p=about&lanmu=10', 10, 0, 1, 0, '', -1),
(11, '底部', 0, '', 'index.php?p=about&lanmu=11', 11, 0, 1, 0, '', 1),
(12, '园内班级', 2, '', 'index.php?p=products_list&lanmu=12', 12, 0, 1, 0, '', 1),
(13, '友情链接', 1, '', 'index.php?p=news_list&lanmu=13', 13, 0, 1, 0, '', 1);

-- --------------------------------------------------------

--
-- 表的结构 `mx_miyao`
--

CREATE TABLE IF NOT EXISTS `mx_miyao` (
  `lc_id` int(4) NOT NULL,
  `lc_value` varchar(200) NOT NULL COMMENT '密钥值'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `mx_navigation`
--

CREATE TABLE IF NOT EXISTS `mx_navigation` (
  `lc_id` int(3) unsigned NOT NULL COMMENT '编号',
  `lc_title` varchar(200) DEFAULT NULL COMMENT '导航标题',
  `lc_parent_id` int(3) DEFAULT '0' COMMENT '导航父节点',
  `lc_link_url` varchar(255) DEFAULT NULL COMMENT '导航链接地址',
  `lc_rwlink_url` varchar(255) DEFAULT NULL COMMENT '导航链接地址(伪静态)',
  `lc_sort_id` int(3) DEFAULT NULL COMMENT '排序编号',
  `lc_datetime` datetime DEFAULT NULL COMMENT '添加日期',
  `lc_edit_datetime` datetime DEFAULT NULL COMMENT '修改日期',
  `lc_zt` int(1) DEFAULT '1' COMMENT '是否显示',
  `lc_pic` varchar(255) DEFAULT NULL COMMENT '导航图片',
  `lc_content` text COMMENT '导航内容',
  `lc_target` varchar(30) DEFAULT NULL COMMENT '目标打开方式'
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mx_navigation`
--

INSERT INTO `mx_navigation` (`lc_id`, `lc_title`, `lc_parent_id`, `lc_link_url`, `lc_rwlink_url`, `lc_sort_id`, `lc_datetime`, `lc_edit_datetime`, `lc_zt`, `lc_pic`, `lc_content`, `lc_target`) VALUES
(1, '园内首页', 0, 'index.php', '', 1, '2014-07-23 17:26:21', '2016-04-15 09:30:12', 1, '', '', ''),
(2, '园内文章', 0, 'index.php?p=news_list&lanmu=1&c_id=1', '', 4, '2014-07-23 17:26:46', '2016-04-15 09:31:47', 1, '', '', ''),
(3, '园内相册', 0, 'index.php?p=products_list&lanmu=2&c_id=4', '', 3, '2014-07-23 17:27:20', '2016-04-15 10:57:52', 1, '', '', ''),
(4, '下载中心', 0, 'index.php?p=down_list&lanmu=4', '', 9, '2014-07-23 17:27:38', NULL, 0, '', '', ''),
(5, '在线留言', 0, 'index.php?p=gbook&lanmu=6', '', 6, '2014-07-23 17:28:32', '2016-04-15 10:04:43', 0, '', '', ''),
(6, '园长寄语', 0, 'index.php?p=job_list&lanmu=5', '', 7, '2014-07-23 17:29:02', '2016-04-15 10:06:35', 0, '', '', ''),
(7, '关于我们', 0, 'index.php?p=about&lanmu=10', '', 2, '2014-07-23 17:29:28', NULL, 1, '', '', ''),
(8, '园内班级', 0, 'index.php?p=products_list1&lanmu=12&c_id=5', '', 5, '2014-07-23 17:30:16', '2016-04-15 10:58:16', 1, '', '', ''),
(9, '学校展示', 0, 'index.php?p=about&lanmu=7', '', 8, '2014-07-23 17:30:29', '2016-04-16 04:53:24', 0, '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `mx_news`
--

CREATE TABLE IF NOT EXISTS `mx_news` (
  `lc_id` int(11) NOT NULL COMMENT '编号',
  `lc_title` varchar(255) NOT NULL COMMENT '文章标题',
  `lc_pic` varchar(255) DEFAULT NULL COMMENT '文章图片',
  `lc_datetime` datetime DEFAULT NULL COMMENT '添加日期',
  `lc_content` text COMMENT '文章内容',
  `lc_jianjie` text COMMENT '文章简介',
  `lc_key` varchar(255) DEFAULT NULL COMMENT '文章关键词',
  `lc_sort_id` int(4) NOT NULL DEFAULT '0' COMMENT '排序序号',
  `lc_tj` int(4) NOT NULL DEFAULT '0' COMMENT '是否推荐(是为1)',
  `lc_hits` int(8) NOT NULL DEFAULT '0' COMMENT '点击率',
  `lc_from` varchar(255) DEFAULT NULL COMMENT '来源',
  `lc_phone` int(2) DEFAULT '1' COMMENT '是否手机显示',
  `lc_del` int(2) DEFAULT '0' COMMENT '是否删除',
  `lc_del_time` datetime DEFAULT NULL COMMENT '删除时间',
  `lc_zt` int(11) DEFAULT '1' COMMENT '审核状态',
  `lc_cant_del` int(4) DEFAULT '0' COMMENT '是否可删',
  `c_id` int(4) NOT NULL DEFAULT '0' COMMENT '类别编号',
  `lc_phone_content` text COMMENT '手机版内容',
  `lc_url` varchar(100) DEFAULT NULL COMMENT '外部链接',
  `lc_keywords` varchar(100) DEFAULT NULL COMMENT '关键词',
  `lc_description` varchar(100) DEFAULT NULL COMMENT '描述'
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mx_news`
--

INSERT INTO `mx_news` (`lc_id`, `lc_title`, `lc_pic`, `lc_datetime`, `lc_content`, `lc_jianjie`, `lc_key`, `lc_sort_id`, `lc_tj`, `lc_hits`, `lc_from`, `lc_phone`, `lc_del`, `lc_del_time`, `lc_zt`, `lc_cant_del`, `c_id`, `lc_phone_content`, `lc_url`, `lc_keywords`, `lc_description`) VALUES
(1, 'PHP开发工具PHPEclipse', '../uploadfile/20140225092614.jpg', '2013-12-20 10:05:51', '<p>\r\n	PHPEclipse 是一个相当强大的一个Eclipse下开发PHP的插件，包括的功能有：PHP语法分析,调试，代码格式化，大纲视图，代码模板定制等。\r\n</p>\r\n<p>\r\n	<img alt="" src="http://www.oschina.net/uploads/img/200809/14122754_yYr8.jpg" /> \r\n</p>', 'PHPEclipse是一个相当强大的一个Eclipse下开发PHP的插件，包括的功能有：PHP语法分析,调试，代码格式化，大纲视图，代码模板定制等。', NULL, 1, 0, 1, '', 1, 1, '2016-04-15 10:37:32', 1, 0, 2, 'PHPEclipse是一个相当强大的一个Eclipse下开发PHP的插件，包括的功能有：PHP语法分析,调试，代码格式化，大纲视图，代码模板定制等。', '', 'PHP开发工具', 'PHP开发工具'),
(2, '轻量级PHP开发框架ThinkPHP', '', '2013-12-20 10:07:06', '<p>\r\n	<img alt="" src="http://static.oschina.net/uploads/img/201202/16233232_kZEh.png" />\r\n</p>\r\n<p>\r\n	ThinkPHP 是一个<span style="color:#FF0000;"><strong>免费开源</strong></span>的，快速、简单的面向对象的 轻量级PHP开发框架，遵循Apache2开源协议发布，是为了敏捷WEB应用开发和简化企业应用开发而诞生的。ThinkPHP从诞生以来一直秉承简洁实用的设计原则，在保持出色的性能和至简的代码的同时，也注重易用性。并且拥有众多的原创功能和特性，在社区团队的积极参与下，在易用性、扩展性和性能方面不断优化和改进，众多的典型案例确保可以稳定用于商业以及门户级的开发。\r\n</p>\r\n<p>\r\n	经过6年的不断积累和重构，3.0版本在框架底层的定制和扩展方面趋于完善，使得应用的开发范围和需求适应度更加扩大，能够满足不同程度的开发人员的需求。而且引入了全新的CBD（核心+行为+驱动）架构模式，旨在打造DIY框架和AOP编程体验，让ThinkPHP能够在不同方面都能快速满足项目和应用的需求，并且正式引入SAE、REST和Mongo支持。\r\n</p>\r\n<p>\r\n	使用ThinkPHP，你可以更方便和快捷的开发和部署应用。当然不仅仅是企业级应用，任何PHP应用开发都可以从ThinkPHP的简单和快速的特性中受益。ThinkPHP本身具有很多的原创特性，并且倡导大道至简，开发由我的开发理念，用最少的代码完成更多的功能，宗旨就是让WEB应用开发更简单、更快速。为此ThinkPHP会不断吸收和融入更好的技术以保证其新鲜和活力，提供WEB应用开发的最佳实践！经过6年来的不断重构和改进，ThinkPHP达到了一个新的阶段，能够满足企业开发中复杂的项目需求，足以达到企业级和门户级的开发标准。\r\n</p>', 'ThinkPHP是一个免费开源的，快速、简单的面向对象的轻量级PHP开发框架', NULL, 2, 0, 1, '', 1, 1, '2016-04-15 10:37:32', 1, 0, 2, 'ThinkPHP是一个免费开源的，快速、简单的面向对象的轻量级PHP开发框架，遵循Apache2开源协议发布，是为了敏捷WEB应用开发和简化企业应用开发而诞生的。ThinkPHP从诞生以来一直秉承简洁实用的设计原则，在保持出色的性能和至简的代码的同时，也注重易用性。并且拥有众多的原创功能和特性，在社区团队的积极参与下，在易用性、扩展性和性能方面不断优化和改进，众多的典型案例确保可以稳定用于商业以及门户级的开发。经过6年的不断积累和重构，3.0版本在框架底层的定制和扩展方面趋于完善，使得应用的开发范围和需求适应度更加扩大，能够满足不同程度的开发人员的需求。而且引入了全新的CBD（核心+行为+驱动）架构模式，旨在打造DIY框架和AOP编程体验，让ThinkPHP能够在不同方面都能快速满足项目和应用的需求，并且正式引入SAE、REST和Mongo支持。使用ThinkPHP，你可以更方便和快捷的开发和部署应用。当然不仅仅是企业级应用，任何PHP应用开发都可以从ThinkPHP的简单和快速的特性中受益。ThinkPHP本身具有很多的原创特性，并且倡导大道至简，开发由我的开发理念，用最少的代码完成更多的功能，宗旨就是让WEB应用开发更简单、更快速。为此ThinkPHP会不断吸收和融入更好的技术以保证其新鲜和活力，提供WEB应用开发的最佳实践！经过6年来的不断重构和改进，ThinkPHP达到了一个新的阶段，能够满足企业开发中复杂的项目需求，足以达到企业级和门户级的开发标准。', '', 'ThinkPHP', 'ThinkPHP'),
(3, 'PHPforAndroid', '../uploadfile/87178_20140610082115.jpg', '2013-12-20 10:09:01', '<p>\r\n	<img alt="" src="http://www.oschina.net/uploads/img/201007/17201233_dgsj.png" height="240" width="327" /> \r\n</p>\r\n<p>\r\n	PHP可不仅仅只能在互联网站上发展，一个PHP for Android (PFA)站点表示他们将可以发布编程模型、工具盒文档让PHP在Android上实现应用。该项目的主要赞助商是开源公司IronTec，PFA使用 Scripting Layer for Android (SL4A)，也就是Androd Scripting Environment (ASE)来实现这一点，您可以参看他们的网站来了解更多技术内幕。\r\n</p>', '', NULL, 3, 0, 2, '', 1, 1, '2016-04-15 10:37:32', 1, 0, 2, 'PHP可不仅仅只能在互联网站上发展，一个PHPforAndroid(PFA)站点表示他们将可以发布编程模型、工具盒文档让PHP在Android上实现应用。该项目的主要赞助商是开源公司IronTec，PFA使用ScriptingLayerforAndroid(SL4A)，也就是AndrodScriptingEnvironment(ASE)来实现这一点，您可以参看他们的网站来了解更多技术内幕。', '', 'PHP for Android', 'PHP for Android'),
(4, '可视化HTML编辑器KindEditor', '../uploadfile/image/20160227/20160227102427_81488.jpg', '2013-12-20 10:13:51', '<p>\r\n	KindEditor 是一套开源的在线HTML编辑器，主要用于让用户在网站上获得所见即所得编辑效果，开发人员可以用 KindEditor 把传统的多行文本输入框(textarea)替换为可视化的富文本输入框。 KindEditor 使用  编写，可以无缝地与 Java、.NET、PHP、ASP 等程序集成，比较适合在 CMS、商城、论坛、博客、Wiki、电子邮件等互联网应用上使用。\r\n</p>\r\n<p>\r\n	<img alt="" src="http://static.oschina.net/uploads/space/2011/1211/151206_Ku7F_96323.gif" width="600" height="152" /> \r\n</p>\r\n<h3>\r\n	主要特点\r\n</h3>\r\n<ul>\r\n	<li>\r\n		快速：体积小，加载速度快\r\n	</li>\r\n	<li>\r\n		开源：开放源代码，高水平，高品质\r\n	</li>\r\n	<li>\r\n		底层：内置自定义 DOM 类库，精确操作 DOM\r\n	</li>\r\n	<li>\r\n		扩展：基于插件的设计，所有功能都是插件，可根据需求增减功能\r\n	</li>\r\n	<li>\r\n		风格：修改编辑器风格非常容易，只需修改一个 CSS 文件\r\n	</li>\r\n	<li>\r\n		兼容：支持大部分主流浏览器，比如 IE、Firefox、Safari、Chrome、Opera\r\n	</li>\r\n</ul>', '可视化HTML编辑器KindEditor', NULL, 4, 1, 2, '', 1, 1, '2016-02-27 10:49:25', 1, 0, 1, 'KindEditor是一套开源的在线HTML编辑器，主要用于让用户在网站上获得所见即所得编辑效果，开发人员可以用KindEditor把传统的多行文本输入框(textarea)替换为可视化的富文本输入框。KindEditor使用编写，可以无缝地与Java、.NET、PHP、ASP等程序集成，比较适合在CMS、商城、论坛、博客、Wiki、电子邮件等互联网应用上使用。主要特点快速：体积小，加载速度快开源：开放源代码，高水平，高品质底层：内置自定义DOM类库，精确操作DOM扩展：基于插件的设计，所有功能都是插件，可根据需求增减功能风格：修改编辑器风格非常容易，只需修改一个CSS文件兼容：支持大部分主流浏览器，比如IE、Firefox、Safari、Chrome、Opera', '', '可视化HTML编辑器KindEditor', '产品包装的精美和包装质量的保障，能够有效...'),
(13, '“互联网思维下的营销变革”', '../uploadfile/image/20160227/20160227102338_19654.jpg', '2014-06-10 16:30:44', '<p class="MsoNormal" style="text-indent:28.0pt;">\r\n	自<span>2013</span>年以来“互联网思维”变得越来越不陌生，运用网络营销平台，传导关切价值，满足关切需求，谋划超速发展的跨界共赢的思想方式。虽然传统大企业拥有足够多的资金实力和市场知名度，但在新的<span>O2O</span>的市场环境中却很难完成顺畅的转型，旧模式的桎梏送给中小企业一次绝佳的成长机会，互联网思维能够帮助中小企业实现完美逆袭。<span></span> \r\n</p>\r\n<p class="MsoNormal" style="text-indent:28.0pt;">\r\n	历经十四年快速成长，百度已成为全球最大的中文搜索引擎，成功覆盖<span>PC</span>及移动平台，每天响应数十亿次搜索请求，成为国内最大网民需求入口。今年是百度连续第五年举办“营销中国行”活动。五年来，通过“营销中国行”这个平台，百度一共举办了<span>1500</span>多场活动，与近<span>30</span>万家企业进行了企业发展和营销创新方面的深度沟通，他们中的大部分现在正通过百度的平台，拥抱时代变革的力量，实现了更快、更健康的发展。<span></span> \r\n</p>\r\n2014年<span>5</span>月<span>20</span>日，<span>“</span>互联网思维下的营销变革<span>”</span>——<span>2014</span>百度营销中国行哈尔滨站在曼哈顿大酒店隆重举行，为龙江企业送来福音，政府部门领导、百度高管、行业专家以及众多业界精英、企业客户代表齐聚一堂，从多维度解析互联网思维，结合诸多案例与丰富产品介绍，深度剖析互联网思维下企业营销之道。', '', NULL, 13, 0, 0, '', 1, 1, '2016-04-15 10:37:32', 1, 0, 2, '自2013年以来“互联网思维”变得越来越不陌生，运用网络营销平台，传导关切价值，满足关切需求，谋划超速发展的跨界共赢的思想方式。虽然传统大企业拥有足够多的资金实力和市场知名度，但在新的O2O的市场环境中却很难完成顺畅的转型，旧模式的桎梏送给中小企业一次绝佳的成长机会，互联网思维能够帮助中小企业实现完美逆袭。历经十四年快速成长，百度已成为全球最大的中文搜索引擎，成功覆盖PC及移动平台，每天响应数十亿次搜索请求，成为国内最大网民需求入口。今年是百度连续第五年举办“营销中国行”活动。五年来，通过“营销中国行”这个平台，百度一共举办了1500多场活动，与近30万家企业进行了企业发展和营销创新方面的深度沟通，他们中的大部分现在正通过百度的平台，拥抱时代变革的力量，实现了更快、更健康的发展。2014年5月20日，“互联网思维下的营销变革”——2014百度营销中国行哈尔滨站在曼哈顿大酒店隆重举行，为龙江企业送来福音，政府部门领导、百度高管、行业专家以及众多业界精英、企业客户代表齐聚一堂，从多维度解析互联网思维，结合诸多案例与丰富产品介绍，深度剖析互联网思维下企业营销之道。', '', '', '产品包装的精美和包装质量的保障，能够有效...'),
(14, '新起点新挑战新征程——2014龙采科技集团销售战线会议胜利召开', '../uploadfile/image/20160227/20160227102313_50984.jpg', '2014-06-10 16:53:10', '<p style="text-align:center;">\r\n	<img src="http://www.longcai.com/uploadfile/image/20140416/20140416004207_39492.jpg" alt="" /> \r\n</p>\r\n<p style="text-align:center;">\r\n	<b>各销售战线精英齐聚冰城，共飨盛典</b> \r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://www.longcai.com/uploadfile/image/20140416/20140416004234_99783.jpg" alt="" /> \r\n</p>\r\n<p class="MsoNormal" style="text-indent:21.0pt;">\r\n	<span>2014</span>年<span>4</span>月<span>8</span>日，以“新起点、新挑战、新征程”为主题的<span>2014</span>龙\r\n采科技集团销售战线会议在哈尔滨华融饭店隆重举行。龙采企业董事长 \r\n总裁杨国廷先生、龙采科技集团总裁张栋先生、龙采企业法务公关副总裁李忠兵女士、龙采科技集团客服副总裁单文斯女士、龙采科技集团大连管理区大区总经理王\r\n晓磊先生、黑龙江龙采企业管理咨询有限公司总经理兼龙采企业管理局财务顾问宋成雁女士、龙采科技集团技术副总裁姚响先生、龙采科技集团黑龙江管理区大区总\r\n经理曲萌女士等领导以及优秀的各销售战线代表共<span>200</span>余人参加了此次会议。 <span></span> \r\n</p>\r\n<div style="text-align:center;">\r\n	<img src="http://www.longcai.com/uploadfile/image/20140416/20140416004252_85563.jpg" alt="" /> \r\n</div>\r\n<p style="text-align:center;">\r\n	<span style="line-height:1.5;"> </span><b>杨老师致大会开幕辞</b> \r\n</p>\r\n<p>\r\n	在热烈的掌声中，龙采企业董事长 总裁杨国廷先生致大会开幕辞，会议正式开始。\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://www.longcai.com/uploadfile/image/20140416/20140416004400_42049.jpg" alt="" /> <img src="http://www.longcai.com/uploadfile/image/20140416/20140416004409_97599.jpg" alt="" /> \r\n</p>\r\n<p style="text-align:center;">\r\n	<b>张总对<span>Q1</span>季度销售工作做全局性总结，并部署下一季度工作重点 </b> \r\n</p>\r\n<p class="MsoNormal" style="text-indent:21.0pt;">\r\n	会上，龙采科技集团总裁张栋先生对<span>Q1</span>季度销售工作做了全局性总结，并作重要工作指示。在讲话中，张总用翔实的数据、有力的语言对集团三大区<span>2014</span>年<span>Q1</span>季度百度新单、新增毛利、各区销售中心、综合销售情况、分公司实收纯利排名及同比增长、分公司百度单子排名及同比、分公司百度单子排名及同比、分公司销售人均毛利、公司人均创效情况等方面工作进行了总结。并对<span>Q2</span>季度销售重点工作做了部署：要求在百度巡讲工作、方案性营销、增加销售人员数量、规范<span>ERP</span>判单原则、销售培训工作、销售支持工作继续加强、分行业开发、高管深入一线等方面都有所突破。<span> </span> \r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://www.longcai.com/uploadfile/image/20140416/20140416004527_42640.jpg" alt="" /> \r\n</p>\r\n<p style="text-align:center;">\r\n	<b>各位高管带来的精彩无比的主题演讲</b> \r\n</p>\r\n<p class="MsoNormal" style="text-indent:21.0pt;">\r\n	接下来的环节是各位高管的主题演讲。他们结合丰富的业内经验，各自从职业规划、百度产品、销售理念、销售技巧、团队管理、员工培训等不同角度、不同层面，为与会人员呈现了一场又一场精彩生动的演讲，拓展了大家的知识层面、提升了业务技能。<span></span> \r\n</p>\r\n在随后的大讨论中，大家共同探讨解决了实际工作中碰到的困惑和问题，气氛热烈而和谐。张总最后的总结更让大家进一步认清了市场发展趋势，明确了下一季度的各项工作目标，理清了工作思路，提升了工作士气。', '', NULL, 14, 1, 0, '', 1, 1, '2016-04-15 10:37:26', 1, 0, 2, '各销售战线精英齐聚冰城，共飨盛典2014年4月8日，以“新起点、新挑战、新征程”为主题的2014龙采科技集团销售战线会议在哈尔滨华融饭店隆重举行。龙采企业董事长总裁杨国廷先生、龙采科技集团总裁张栋先生、龙采企业法务公关副总裁李忠兵女士、龙采科技集团客服副总裁单文斯女士、龙采科技集团大连管理区大区总经理王晓磊先生、黑龙江龙采企业管理咨询有限公司总经理兼龙采企业管理局财务顾问宋成雁女士、龙采科技集团技术副总裁姚响先生、龙采科技集团黑龙江管理区大区总经理曲萌女士等领导以及优秀的各销售战线代表共200余人参加了此次会议。杨老师致大会开幕辞在热烈的掌声中，龙采企业董事长总裁杨国廷先生致大会开幕辞，会议正式开始。张总对Q1季度销售工作做全局性总结，并部署下一季度工作重点会上，龙采科技集团总裁张栋先生对Q1季度销售工作做了全局性总结，并作重要工作指示。在讲话中，张总用翔实的数据、有力的语言对集团三大区2014年Q1季度百度新单、新增毛利、各区销售中心、综合销售情况、分公司实收纯利排名及同比增长、分公司百度单子排名及同比、分公司百度单子排名及同比、分公司销售人均毛利、公司人均创效情况等方面工作进行了总结。并对Q2季度销售重点工作做了部署：要求在百度巡讲工作、方案性营销、增加销售人员数量、规范ERP判单原则、销售培训工作、销售支持工作继续加强、分行业开发、高管深入一线等方面都有所突破。各位高管带来的精彩无比的主题演讲接下来的环节是各位高管的主题演讲。他们结合丰富的业内经验，各自从职业规划、百度产品、销售理念、销售技巧、团队管理、员工培训等不同角度、不同层面，为与会人员呈现了一场又一场精彩生动的演讲，拓展了大家的知识层面、提升了业务技能。在随后的大讨论中，大家共同探讨解决了实际工作中碰到的困惑和问题，气氛热烈而和谐。张总最后的总结更让大家进一步认清了市场发展趋势，明确了下一季度的各项工作目标，理清了工作思路，提升了工作士气。', '', '', '产品包装的精美和包装质量的保障，能够有效...'),
(15, '互联网思维下的营销变革—2014年百度营销中国行', '../uploadfile/image/20160227/20160227102251_23856.jpg', '2014-06-10 17:01:34', '<p style="text-align:center;">\r\n	<img src="../uploadfile/2014/06/20140610090134i.jpg" alt="" width="780" height="275" /> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p class="MsoNormal" style="text-indent:21.0pt;">\r\n	进入<span>2014</span>年，“互联网思维”越来越多地被我们所提及，而在互联网思维下，营销不再是单纯的售卖传播，而是与企业生产、客户服务等各个环节紧密相连，既是企业的产品出口也是生产开端。面对机遇与挑战，您准备好了吗？<span></span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<br />\r\n</p>\r\n<p class="MsoNormal" style="text-indent:21.0pt;">\r\n	历经十四年快速成长，百度已成为全球最大的中文搜索引擎，成功覆盖<span>PC</span>及移动平台，每天响应数十亿次搜索请求，成为国内最大网民需求入口。百度推广现已为全国<span>50</span>万家中小企业提供搜索服务，极大地促进了中小企业的快速成长，提高其企业信息化建设及市场适应能力，为推动企业经济发展发挥了重要的作用。<span></span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<br />\r\n</p>\r\n<p class="MsoNormal" style="text-indent:21.0pt;">\r\n	2014年春季，百度营销中国行来到大连，为您打造了营销智慧的顶级盛宴！。<b>现诚邀您参加“互联网思维下的营销变革<span>—2014</span>年百度营销中国行“</b>活动。<span></span> \r\n</p>\r\n<p class="MsoNormal" style="text-indent:21.0pt;">\r\n	届时，政府部门领导、百度高管，行业专家以及众多业界精英、主流媒体和企业客户代表将共聚一堂，从多维度解析互联网思维，结合诸多案例与丰富产品介绍，深度剖析互联网思维下企业营销之道。<span></span> \r\n</p>\r\n<p class="MsoNormal" style="text-indent:21.0pt;">\r\n	在此，我们再次诚邀您的到来，与百度一起，携手引领未来，赢在互联网时代！<span></span> \r\n</p>', '', NULL, 15, 1, 0, '', 1, 1, '2016-04-15 10:37:15', 1, 0, 2, '进入2014年，“互联网思维”越来越多地被我们所提及，而在互联网思维下，营销不再是单纯的售卖传播，而是与企业生产、客户服务等各个环节紧密相连，既是企业的产品出口也是生产开端。面对机遇与挑战，您准备好了吗？历经十四年快速成长，百度已成为全球最大的中文搜索引擎，成功覆盖PC及移动平台，每天响应数十亿次搜索请求，成为国内最大网民需求入口。百度推广现已为全国50万家中小企业提供搜索服务，极大地促进了中小企业的快速成长，提高其企业信息化建设及市场适应能力，为推动企业经济发展发挥了重要的作用。2014年春季，百度营销中国行来到大连，为您打造了营销智慧的顶级盛宴！。现诚邀您参加“互联网思维下的营销变革—2014年百度营销中国行“活动。届时，政府部门领导、百度高管，行业专家以及众多业界精英、主流媒体和企业客户代表将共聚一堂，从多维度解析互联网思维，结合诸多案例与丰富产品介绍，深度剖析互联网思维下企业营销之道。在此，我们再次诚邀您的到来，与百度一起，携手引领未来，赢在互联网时代！', '', '', '产品包装的精美和包装质量的保障，能够有效...'),
(16, ' 春季幼儿常见疾病及预防', '../uploadfile/image/20160227/20160227102229_24007.jpg', '2014-06-10 17:26:51', '<div class="xw_con">\r\n	<p>\r\n		<br />\r\n		<p class="MsoNormal" style="margin-left:0pt;text-align:justify;">\r\n			<div style="text-align:center;">\r\n				<span style="font-size:14px;line-height:2;font-family:''Microsoft YaHei'';">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span><span style="font-size:14px;line-height:2;font-family:''Microsoft YaHei'';">&nbsp; &nbsp;</span><span style="font-size:14px;line-height:2;font-family:''Microsoft YaHei'';">春季幼儿常见疾病及预防</span>\r\n			</div>\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">春季常见疾病：</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">感冒&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> &nbsp;感冒是上呼吸道感染最常见的表现。感冒可由病毒引起，很容易在</span><a href="http://rj.5ykj.com/"><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">孩子</span></a><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">之间传播，主要症状包括流清水样鼻涕、轻度发热、食欲下降、咽喉肿痛、嗜睡、淋巴腺轻度肿大等。如果没有并发症，典型的感冒症状在3～4天内就会逐渐消失，通常不需要看医生。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">护理：&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> 1、保证孩子得到足够的休息，给他多喝白开水。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> 2、房间内要保持空气流通，保持适当的温度、湿度。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> 3、饮食要清淡，多吃一些容易消化且营养丰富的食物。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> 4、轻度发热时，可进行物理降温；鼻子不通气时，可用水汽熏蒸，防止鼻腔分泌物更加黏稠。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">预防：</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> 1、随着天气的变化增减衣物，最好是“春捂秋冻”。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> 2、保证充足的睡眠，可以增强体质。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> 3、尽量少去公共场所，远离感冒患者，避免交叉感染。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> 4、在一天之内有规律地洗手，切断感冒的传播途径。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">特别提醒：&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> 除合并细菌感染外，一般不需要使用抗生素。</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> 咳嗽</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;&nbsp;咳嗽也是上呼吸道感染最常见的表现。当位于咽部、气管和肺部的神经末梢受到刺激时，通过一个反射回路，可以使肺部的气体强力排出。如果孩子在咳嗽时伴有发热、易激惹或呼吸困难，很可能是感染引起的，感染的部位不同，咳嗽的声音也有所区别。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">护理&nbsp;：</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> 1、多休息，多喝水，增加室内的湿度。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> 2、如果咳嗽非常剧烈，应在医生的指导下服药。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> 3、当咳嗽是由另一种疾病引起时，必须治疗这种疾病。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">预防&nbsp;：&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> 1、尽量避免患与呼吸道有关的疾病。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> 2、如果咳嗽是由暂时的刺激（如室内的灰尘）引起，应避免这种刺激。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">特别提醒：&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> 在发生上呼吸道感染时，咳嗽是一种保护性机制，可将呼吸道黏液清除，如果不是特别严重的话，一般没有必要抑制。</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> 哮喘&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> &nbsp;许多原因都可以导致哮喘发作，但5岁以下孩子哮喘的最常见原因是病毒性感染造成支气管黏膜发炎并刺激周围的平滑肌。孩子因上呼吸道感染而引起哮喘发作时，主要表现为咳嗽，在夜间、锻炼或与刺激性物质及变应原接触时加重，呼气时会产生哮鸣音。</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">护理：</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> 1、尽可能避免接触引起哮喘发作的因素。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> 2、保证夜间的睡眠。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> 3、遵医嘱服药，在没有与医生沟通前，不要太快停止用药，不要让服药量少于推荐量，不要换用其他药物。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> 4、饮食清淡，营养均衡，多吃新鲜蔬菜和富含维生素C的食物。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">预防：&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> 让孩子远离过敏原，如花粉、尘埃、烟雾、某些宠物或食物等，尽量减少哮喘的发作。　　如果孩子有过敏史或家里人有过敏史，在春季更要特别留意，出现症状后要及时到医院检查。特别提醒： </span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">在发作早期、症状严重前治疗哮喘最容易，效果也最佳。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> 荨麻疹&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> &nbsp;如果孩子的身上出现红色的凸起斑片，且斑片的中心为白色，他就可能患了荨麻疹。这种变态反应可以发生在身体的任何部位。通常情况下，荨麻疹可在几小时内从身体的一个部位消失，再在身体的另一个部位出现。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">护理&nbsp;：&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;1、避免凉风刺激，否则会加重病情。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;2、保持皮肤清洁、干燥。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;3、不要吃刺激性过强的食物，如生葱、辣椒、生蒜等。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;4、对瘙痒的部位进行冷敷，可以缓解症状。尽量不要用手去挠，以免发生感染。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">预防：&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;1、尽量让孩子远离过敏原，如某些食物、药物、植物等。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;2、如果出现荨麻疹有特定的形式，可试着改变日常生活习惯。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">特别提醒：&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;过敏原的种类很多，即使不能一一找出，常见的也一定要避免。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">水痘&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;水痘是一种比较常见的急性传染病，通过飞沫传播，6个月以上的孩子容易被感染。当孩子接触到会引起水痘的病毒后，从出疹到疹子变成小水疱需要10～24小时，同时还伴有轻度发热等症状。水痘隔离期21天。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">护理：&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;1、限制孩子的抓挠，以免引起感染。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;2、用温水给孩子洗澡，有助于防止继发性感染。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;3、不要让孩子服用任何含有阿司匹林的药物，以免发生危险。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;4、需要隔离至全部水疱结痂。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">预防：&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;1、不要接触水痘患者。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;2、接种水痘减毒活疫苗，可获得持久的免疫力。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">特别提醒：&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;由于水痘疫苗是活病毒疫苗，免疫系统有问题的孩子对它没有正常反应，所以不适合接种。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">结膜炎&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;如果孩子的眼白发红，他可能是患上了结膜炎，也叫红眼病。炎症反应通常是感染的信号，但也可能由刺激、变态反应或更严重的疾病引起，通常表现为发痒、流泪、分泌物增加。</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">护理：&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;1、不要用热水清洗孩子的眼睛，以免损伤他的眼角膜。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;2、孩子应勤洗手，避免与家人混用毛巾。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">预防：&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;1、注意个人卫生，尤其是要改掉乱揉眼睛的习惯。</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;2、避免接触结膜炎患者。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">特别提醒：&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;不要擅自给孩子滴眼药水，因为其中可能含有抗生素等成分。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">鼻出血&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;孩子在春季发生鼻出血的比例远远高于其他季节。而且，这种鼻出血多呈突发性。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">护理：&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;让孩子或坐或站，身体稍微向前倾，</span><a href="http://rj.5ykj.com/"><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">家长</span></a><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">用拇指及食指将他两侧的鼻翼向鼻中隔捏紧，压迫止血。如果鼻出血的情况不是非常严重，几分钟后就可以止住。&nbsp;如果不能止血，应到医院请医生处理。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">预防：</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;1、多吃一些具有清热解毒作用的水果、蔬菜，多喝水。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;2、适当增加卧室中的湿度，保持孩子鼻腔黏膜湿润。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;3、帮助孩子改掉抠鼻孔的不良习惯。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">特别提醒：&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;千万不能让孩子仰起头帮他止血。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">食物中毒&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">孩子进食被细菌污染的食物后，就会发生食物中毒。食物中毒的症状包括腹部痉挛、恶心、呕吐、腹泻和发热等。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">护理：&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;1、孩子呕吐或腹泻严重时，可以补充一些电解质溶液。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;2、准备一些容易消化的食物，最好是流食或半流食，比如米粥、面汤等。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">预防：&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;1、餐具定期消毒，厨房用具也要在阳光下晾晒。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;2、购买食品时要认真检查，吃剩的东西也要放好，以免变质。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;3、尽量不要生吃食物。&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">特别提醒：&nbsp;</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;在孩子进食后的几个小时内，如果出现类似于食物中毒的症状，应该马上到医院检查。</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">腮腺炎</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;如果小孩患了流行性腮腺炎，腮腺部肿痛，</span><a href="http://rj.5ykj.com/"><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">宝宝</span></a><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">发病时不一定伴有发热。如果患儿有高热不退、呕吐频繁、头痛、精神萎靡等需警惕并发脑膜炎，应及时去医院诊治。腮腺肿胀部位可采取局部冷敷，减轻疼痛和肿胀。用白醋煮沸后消毒房间空气。腮腺炎隔离期7至9天。</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">腹泻</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;春季腹泻多见于1-3岁的婴幼儿，4岁以上者少见。首发症状是突然间的呕吐，不论喂任何食物，如牛奶、米粥、饮料等均在吃后几分钟内全部吐出。即使喂白开水也几乎全部呕出。呕吐后不久就会出现大便次数增多，大便多以水样便为主，颜色为淡黄色呈蛋花汤样，无酸臭味。一些孩子伴有中等度的发热，体温37-38度，没有咳嗽，鼻塞，流涕等感冒症状。伴有腹痛的患儿会有烦躁不安，哭闹不止的表现。呕吐最多持续2-3天。但腹泻要持续5-7天，个别患儿腹泻达一周以上。大便镜检多数正常或有很少量的白细胞。</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">春季腹泻由什么引起?</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;&nbsp;这种在春冬季容易发生的腹泻多半是由于病毒感染引起的，目前研究较为明确的秋冬季腹泻最常见的病毒就是轮状病毒，其它还有柯萨奇病毒等肠道病毒。</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">孩子腹泻很严重，应如何处理?</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;&nbsp;现在的父母看见孩子上吐下泻，就慌了，并要求医生给孩子输液。其实90%的腹泻病儿都不需要输液治疗，只需用口服补液盐即可。由于腹泻导致的脱水，输液反而会导致2-3天后腹泻仍未止住的情况。一些病儿的父母，在治疗腹泻病的过程中常要求医生给孩子用最好和最新的抗生素。抗生素对病毒性腹泻非但没有任何治疗效果，还会导致一系列不良影响。</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">处理宝典：尽量多饮用“口服补液盐”以补充糖盐和水分，完全没有必要口服或静脉注射抗生素，饮食以容易消化的食物为主，不必刻意限制饮食。还可以口服肠道黏膜保护剂，止泻药物，同时还可以口服乳酸菌活性剂和双歧杆菌制剂等，促进食物的消化和吸收，抑制引起肠道疾病的病原菌，保护肠道。</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">春季</span><a href="http://rj.5ykj.com/"><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">儿童</span></a><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">腹泻如何预防?</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;1、加强食品卫生与水源管理。</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;2、合理喂养，添加辅食应逐步进行。</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;3、养成良好的卫生习惯，食前便后洗手，做好食品、食具消毒。</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;4、避免长期滥用广谱抗生素。</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">怎样预防小儿春季多发病呢?</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;&nbsp;家长应注意以下几点：</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;一、&nbsp;适时增减衣服。要遵循"春捂秋冻"的古训，初春乍暖时，不要急于给孩子减衣，气温骤降时，要及时添衣。 </span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;二、&nbsp;注意卫生。要经常保持室内清洁，开窗通风，使室风空气新鲜，阳光充足。要勤晒被褥和换衣裳，少带小孩去拥挤的公共场所。</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;三、&nbsp;合理膳食。日常膳食中，除吃适量鱼、肉、鸡、蛋外，应多吃些乳、豆制品、蔬菜和水果。婴幼儿必要时要吃点鱼肝油和钙片。</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;四、&nbsp;充足睡眠。春天易发生"春困"，保证小儿充足睡眠，既有利于小儿生长发育，又可增强免疫力。 </span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;五、&nbsp;加强室外活动。春和日丽，万物生发，让孩子到室外活动，能得到日光照射，吸进新鲜空气增强小儿造血及免疫功能。 </span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;六、&nbsp;计划免疫。要按计划及时进行预防接种，以预防小孩子常见传染病。</span>\r\n		</p>\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"></span>\r\n	</p>\r\n</div>', '', NULL, 16, 1, 138, '', 1, 0, NULL, 1, 0, 2, '关于百度推广服务费调整的通知尊敬的百度推广用户朋友们：随着百度推广产品不断发展，百度产品售后服务成本及各项费用的增加，现有的百度服务费标准已不适应当前百度推广产品售后服务发展的需要。为进一步促进合作与发展，经研究百度（大连）客户服务中心对百度推广标准服务进行了统一和升级，并做出如下决定：一、自2014年4月1日起，新签单或续服务费的客户百度推广服务费由1000元/年/户调整为1200元/年/户。二、服务到期后未按时续交百度推广年服务费会影响账户使用；三、推广服务费交纳时间以推广账户注册月为起始，满12个月为一个服务年，按此服务期收取。龙采科技集团2014年3月', '', '', ''),
(17, '幼儿园春季保健小常识', '', '2016-02-27 10:49:52', '<p class="p" style="margin-left:0pt;text-align:center;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">幼儿园春季保健小常识</span>\r\n</p>\r\n<p class="p" style="margin-left:0pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">&nbsp;&nbsp;&nbsp;&nbsp;春季天气变化多端，又是传染病的多发季节，为了能保证幼儿的</span><a href="http://www.99.com.cn/"><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">健康</span></a><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">，使幼儿在春季减少生病的机会，我从衣食住行方面介绍一下幼儿保健</span><a href="http://zyk.99.com.cn/changshi/"><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">常识</span></a><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">，供您参考。</span>\r\n</p>\r\n<p class="p" style="margin-left:0pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">冬春交替的时候温差大、气候变化快，而幼儿身体的适应能力较差，最好不要轻易脱去冬衣，多焐焐更利于幼儿的健康。但在户外活动时要适时减衣、添衣，以免幼儿出汗后受凉，出汗后应拿块干毛巾垫在幼儿背部，帮助汗液的吸收。教师和家长应常带幼儿去户外活动，接受阳光照射，呼吸新鲜空气，让幼儿奔跑、玩耍，增强体质。借此机会，再为大家提供一些用来能增强幼儿抵抗能力的保健方法。</span>\r\n</p>\r\n<p class="p" style="margin-left:0pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">一、盐的妙用。</span>\r\n</p>\r\n<p class="p" style="margin-left:0pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">家长可以为幼儿用盐刷牙，也可以用盐水为幼儿漱口，以保持</span><a href="http://www.99.com.cn/stopic/201202217/kouqiangkuiyang.htm"><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">口腔</span></a><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">清洁，也还以在早晨让幼儿喝点盐水，对肠胃有清洁和清热解毒的</span><a href="http://www.99.com.cn/special/zhongcaoyao.htm"><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">功效</span></a><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">。</span>\r\n</p>\r\n<p class="p" style="margin-left:0pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">二、姜水的妙用。</span>\r\n</p>\r\n<p class="p" style="margin-left:0pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">姜水可以浸脚，也可以用毛巾蘸姜水趁热为幼儿擦擦胸口和背部。这样做可以增强心肺功能，提高身体抵抗能力。</span>\r\n</p>\r\n<p class="p" style="margin-left:0pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">三、衣食住行。</span>\r\n</p>\r\n<p class="p" style="margin-left:0pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">衣：春季气温变化大，而且多风，要注意幼儿衣物的增减，虽然原则上要“春焐”，但也不宜穿的密不透风，限制孩子运动，不仅不利于汗液蒸发，风一吹更容易受凉。</span>\r\n</p>\r\n<p class="p" style="margin-left:0pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">食：注意饮食调养可增强体质，抵抗</span><a href="http://jbk.99.com.cn/"><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">疾病</span></a><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">，同时也有利于长高。春季万物萌动，阳气升发，儿童饮食要以“健脾扶阳”为原则，多吃鸡鸭鱼肉蛋豆制品以及时令蔬菜瓜果。①维生素C：具有抗病毒和增强抵抗力的功能。如青菜、小白菜、雪里红、青椒、</span><a href="http://jf.99.com.cn/sgscl/"><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">番茄</span></a><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">等。②维生素A：具有保护和增强上呼吸道粘膜和呼吸器官上皮细胞的功能，能抵抗各种病菌的侵蚀。如胡萝卜、苋菜及一些黄绿蔬菜等。③食用菌：内含丰富的铁和钙，能促进生长发育，提高肌体抵抗力。如黑木耳、银耳、蘑菇、香菇等。对于有佝偻病或手足抽搐症的幼儿，春天还应当酌情补充钙剂和维生素。</span>\r\n</p>\r\n<p class="p" style="margin-left:0pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">住：要让幼儿有充足的睡眠，注意早睡早起，人体睡眠时分泌旺盛的生长激素，对孩子的生长具有积极的意义，为了克服春困，可以安排一小时左右的午休时间，以弥补睡眠不足。此外，春季各种病原微生物肆虐，要保证儿童的住所有充分的光照并注意经常开窗换气，必要时可采取一些家庭消毒措施。</span>\r\n</p>\r\n<p class="p" style="margin-left:0pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">行：春天是进行郊外和各种体育</span><a href="http://nan.99.com.cn/jianshen/243763.htm"><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">锻炼</span></a><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">的大好时光，空气中的负离子和紫外线对幼儿的健康有好处。运动能促进人体新陈代谢，加速血液循环，改善呼吸消化功能，调节内分泌等。</span>\r\n</p>\r\n<p class="p" style="margin-left:0pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">幼儿的健康是我们共同的希望，愿我们共同的努力，使幼儿快乐地度过春天这个美丽的季节！</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">&nbsp;</span>\r\n</p>', '', NULL, 17, 0, 164, '', 0, 0, NULL, 1, 0, 2, '', '', '', ''),
(18, '中小企业如何进行品牌建设，创业型企业如何构建品牌', '', '2016-02-27 10:50:05', '', '', NULL, 18, 0, 2, '', 0, 1, '2016-04-15 10:37:59', 1, 0, 1, '', '', '', '品牌构建，必须具备：1.理念，2.包装，3.产品或服务理念的传达，是为了精确消费者受众，准确传达产品或服务信息给受众'),
(19, '中小企业如何进行品牌建设，创业型企业如何构建品牌', '', '2016-02-27 10:50:16', '', '', NULL, 19, 0, 7, '', 0, 1, '2016-04-15 10:37:59', 1, 0, 1, '', '', '', '品牌构建，必须具备：1.理念，2.包装，3.产品或服务理念的传达，是为了精确消费者受众，准确传达产品或服务信息给受众'),
(20, '中小企业如何进行品牌建设，创业型企业如何构建品牌', '', '2016-02-27 10:50:24', '', '', NULL, 20, 0, 6, '', 0, 1, '2016-04-15 10:37:59', 1, 0, 1, '', '', '', '品牌构建，必须具备：1.理念，2.包装，3.产品或服务理念的传达，是为了精确消费者受众，准确传达产品或服务信息给受众'),
(21, '天山茶庄绿叶', '../uploadfile/image/20160227/20160227140157_11203.jpg', '2016-02-27 14:01:57', '', '', NULL, 21, 1, 11, '', 0, 1, '2016-04-15 10:37:59', 1, 0, 1, '', '', '', '产品包装的精美和包装质量的保障，能够有效产品包装的精美和包装质量的保障，能够有效...'),
(22, '家长注意----儿童肺炎高发于初春季节', '../uploadfile/image/20160227/20160227140213_76596.jpg', '2016-02-27 14:02:13', '<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:0.0000pt;text-align:center;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';">家长注意----儿童肺炎高发于初春季节</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:0.0000pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';">儿童肺炎高发于初春季节，好发于0－5岁的低龄儿童，大多是由受凉后感冒（上呼吸道感染）发展而成，因此以下几点提请家长们特别关注：</span><br />\r\n<br />\r\n<span style="font-size:14px;font-family:''Microsoft YaHei'';"> 1、初春为感冒流行季节，尽可能少带小儿去公共场所。</span><br />\r\n<br />\r\n<span style="font-size:14px;font-family:''Microsoft YaHei'';"> 2、如果自己的孩子已感冒或咳嗽，并出现以下一种或几种情况，应及时找医生：呼吸比平时加快，每分钟多于60次（小于2个月的孩子），或50次（2－12个月的孩子），或40次（1－4岁的孩子）；呼吸声音粗大；呼吸有间断；吸气时胸廓凹陷；鼻翼扇动；发出哼哼声；不能喝任何液体，一喝就呛；皮肤呈青紫色。</span><br />\r\n<br />\r\n<span style="font-size:14px;font-family:''Microsoft YaHei'';"> 3、家长应在医生的指导下给患儿喂药，不能随意服药。</span><br />\r\n<br />\r\n<span style="font-size:14px;font-family:''Microsoft YaHei'';"> 4、孩子得肺炎后，应继续喂奶、喂食，多喝汤类食物，如果患儿食欲减退，应少量多餐，哺乳婴儿应增加每天的喂奶次数，以增强营养与体力。</span><br />\r\n<br />\r\n<span style="font-size:14px;font-family:''Microsoft YaHei'';"> 5、患儿应注意保暖，呼吸新鲜空气，室内要禁止吸烟，在寒冷的季节，尤其要注意保持适宜的室温，但应注意通风。</span>\r\n</p>', '', NULL, 22, 0, 147, '', 0, 0, NULL, 1, 0, 2, '', '', '', ''),
(23, '天山茶庄绿叶', '../uploadfile/image/20160227/20160227140234_59317.jpg', '2016-02-27 14:02:34', '', '', NULL, 23, 1, 8, '', 0, 1, '2016-04-15 10:37:59', 1, 0, 1, '', '', '', '产品包装的精美和包装质量的保障，能够有效产品包装的精美和包装质量的保障，能够有效...'),
(26, '博山区教育局', '', '2016-03-07 11:12:49', '', '', NULL, 26, 0, 1, '', 0, 1, '2016-04-17 15:48:48', 1, 0, 3, '', '', '', 'www.ruyile.com/jiaoyuju.aspx?id=1540'),
(27, '山东省教育厅', '', '2016-03-07 11:13:07', '', '', NULL, 27, 0, 2, '', 0, 1, '2016-04-17 15:48:49', 1, 0, 3, '', '', '', 'www.sdedu.gov.cn/'),
(28, '跟家长分享的十八句话', '', '2016-04-15 10:38:41', '<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:0.0000pt;text-align:center;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">跟家长分享的十八句话</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:0.0000pt;text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">1、对待我们应该像朋友一样</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:0.0000pt;text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;因为，当你的孩子看到我们的关系很亲密，他也会感到很愉快。比如：父母是否可以和我们幼儿园里的老师一起与孩子照张合影，然后把照片挂在家里的墙上。</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:0.0000pt;text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">2、要把握好时间</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:0.0000pt;text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">&nbsp;&nbsp;&nbsp;&nbsp;如果你每天总是担心上班迟到，结果匆匆忙忙地把孩子送到幼儿园，这会使孩子感到紧张，要腾出一些时间来帮助孩子安顿下来。如果某天下午你很忙，你可以提前给我们打电话，这样等你来接孩子的时候我们会提前帮他准备好。</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:0.0000pt;text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">3、给孩子穿普通的衣服</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:21.0000pt;text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">当你把孩子送到幼儿园来时，不要给孩子穿太好的衣服，否则当他不小心把染料弄到衣服上的时候（这种情况的发生率几乎是100%），他会有挫折感。</span>\r\n</p>\r\n<p class="MsoNormal" style="text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">4、不要把玩具带到幼儿园里来</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:0.0000pt;text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">&nbsp;&nbsp;&nbsp;&nbsp;小孩子通常是不喜欢与别人分享他自己的玩具的，而且幼儿园里已经准备了玩具让小朋友们分享。</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:0.0000pt;text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">5、要带足孩子的用品</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:0.0000pt;text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">&nbsp;&nbsp;&nbsp;&nbsp;如果你的孩子的物品用完了，要我们从别的孩子那里借用，这是不公平的，而且只有自己带的才是最适合孩子的尺寸。</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:0.0000pt;text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">6、家里带来的私人用品写上孩子的名字</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:0.0000pt;text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">&nbsp;&nbsp;&nbsp;&nbsp;把你从家里带到幼儿园的东西写上孩子的名字。有时，我们并不能把每个孩子的东西都分得一清二楚。</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:0.0000pt;text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">7、给我们留一些你的小物品</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:0.0000pt;text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">&nbsp;&nbsp;&nbsp;当孩子想你的时候，我们可以把你留下的这些东西给他，比如：你和孩子的照片，你自己的录音视频，或者一条小手帕，上面洒上你平时使用的香水等，这些通常会使你的孩子感觉舒服一些。</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:0.0000pt;text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">8、离开幼儿园时要微笑着跟孩子说再见</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:0.0000pt;text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">&nbsp;&nbsp;&nbsp;&nbsp;送孩子到幼儿园时，要微笑着和孩子说再见。想到要一整天见不到孩子，所以当与孩子说再见的时候，父母的心情都很复杂，但不要让孩子知道这些，好吗？如果当你要离开的时候，表现得很难过，那么孩子也会表现得更难过。这种情形下，他们更不愿与你分开。</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:0.0000pt;text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">9、请对我们放心</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:0.0000pt;text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">&nbsp;&nbsp;&nbsp;&nbsp;把孩子放在幼儿园里请你放心，我们希望你的孩子过得愉快，我们会尽最大的努力使你的孩子感觉这里就象他的家里一样。</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:0.0000pt;text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">10、对孩子的小情绪不要反应过度</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:0.0000pt;text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">&nbsp;&nbsp;&nbsp;&nbsp;你要知道，你的孩子并不总是兴高采烈、情绪良好。他既然在家里有情绪不好的时候，那么他在幼儿园里也是。既然他在幼儿园里大多数时候都是很高兴的，那么对他的小脾气就请不要反应过度了。</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:0.0000pt;text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">11、接孩子尽量守时</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:21.0000pt;text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">如果我们幼儿园是在下午5点放学，请不要在5点30分才赶到幼儿园接孩子，孩子看到别的小朋友有家长接而他没人接会很难过，次数多了孩子会很失望。</span>\r\n</p>\r\n<p class="MsoNormal" style="text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">12、及时看留言</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:21.0000pt;text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">看看我们给你的通知留言，上面通常有重要的信息。比如幼儿园计划开会或者旅行，你要提前做好准备工作，特别是一些重要的活动。</span>\r\n</p>\r\n<p class="MsoNormal" style="text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">13、和我们保持统一要求</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:0.0000pt;text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">&nbsp;&nbsp;&nbsp;&nbsp;在家里要和在幼儿园的要求保持一致。如果你在家里允许孩子把玩具扔得到处都是，而这在幼儿园里是不允许的，那么孩子就会觉得无所适从。</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:0.0000pt;text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">14、你是孩子最重要的老师</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:0.0000pt;text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">&nbsp;&nbsp;&nbsp;&nbsp;父母永远是孩子最重要的老师！如果你的孩子穿反了裤子，不会系鞋带，请不要急着责怪我们，因为你平时在家里就需要教孩子自立。</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:0.0000pt;text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">15、告诉我们关于孩子生活环境的变化</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:0.0000pt;text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">&nbsp;&nbsp;&nbsp;&nbsp;告诉我们关于孩子生活环境的变化。如果你离婚了，或者你的家里有病人，甚至你的丈夫出去旅游了，要让我们知道，这样我们就会了解孩子一些特殊的举动。如果你家中发生了一些重要的事，不要告诉孩子：在幼儿园要保守秘密。孩子要在幼儿园里呆很长时间，和幼儿园里的老师和其他小朋友相处时，他也需要觉得自己很诚实。</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:0.0000pt;text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">16、请了解我们的发烧规定</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:21.0000pt;text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">你的孩子如果发烧了，当他要重新回到幼儿园时，必须是已经退烧了，而且是已经停药超过24小时后。</span>\r\n</p>\r\n<p class="MsoNormal" style="text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">17、及时交纳生活费等</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:0.0000pt;text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">&nbsp;&nbsp;&nbsp;&nbsp;如果你的财务状况发生问题，或者你需要做特殊的安排，提前让我们知道，我们也可以照顾你的孩子。</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:0.0000pt;text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">18、说谢谢</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:0.0000pt;text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">&nbsp;&nbsp;&nbsp;&nbsp;一定要让我们知道：我们为你的孩子所做的事得到了你的认可。如果你有不满意的地方请告诉我们，我们会及时改进，尽量不要在别的父母面前抱怨，因为孩子好的成长环境是家庭和校园共同创造的。</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:0.0000pt;text-indent:0.0000pt;text-align:justify;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">&nbsp;</span>\r\n</p>', '', NULL, 28, 0, 298, '', 0, 0, NULL, 1, 0, 1, '', '', '', '');
INSERT INTO `mx_news` (`lc_id`, `lc_title`, `lc_pic`, `lc_datetime`, `lc_content`, `lc_jianjie`, `lc_key`, `lc_sort_id`, `lc_tj`, `lc_hits`, `lc_from`, `lc_phone`, `lc_del`, `lc_del_time`, `lc_zt`, `lc_cant_del`, `c_id`, `lc_phone_content`, `lc_url`, `lc_keywords`, `lc_description`) VALUES
(29, '孩子“毛病”的背后是整个家庭的原因', '', '2016-04-15 10:41:45', '<p class="MsoNormal" style="text-align:center;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">孩子“毛病”的背后是整个家庭的原因</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">&nbsp; &nbsp; &nbsp;父母的教育方式对孩子的性格发展有着很大的影响，责备孩子缺点的同时，是不是也该反思一下自己呢？</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<br />\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">孩子的表现	家庭</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">自卑、懦弱	父母其中必然有一人是苛求之人</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">（干涉型家庭教育结果）</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">喜欢暴力或奴性十足	有一个喜欢打骂的家长</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">（干涉型家庭教育结果）</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">胆小害羞	管得过多，时常责怪，包办代替</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">（干涉型家庭教育结果）</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">不善良	父母必有一个人缺乏同情心</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">（暴力型家庭教育结果）</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">不懂是非	必有一个专制，喜欢替孩子做决定的家长。或是一个不明事理的家长。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">（干涉型家庭或溺爱型家庭结果）</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">小心眼	缺乏宽容的家庭环境，指责是这个家庭的主基调</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">（干涉型家庭结果）</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">不上进	父母对孩子要求过高，或父母对自己要求过低</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">（干涉型家庭或放任型家庭）</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">懒惰	父母替孩子做得太多</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">（干涉型家庭或溺爱型家庭）</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">喜欢埋怨	必然有一个负面思维的家长</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">（干涉型家庭或暴力型家庭）</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">脾气暴躁	必然有一个家长脾气不好，习惯通过发火这种不良方式与人沟通</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">（干涉型家庭或暴力型家庭）</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">自以为是	父母溺爱的必然结局</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">（溺爱型家庭或放任型家庭）</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">不会关心人	父母宠爱过度，不让孩子表现</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">（溺爱型家庭或放任型家庭）</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">不快乐整天板着脸	夫妻不和或父母与孩子关系紧张</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">（干涉型家庭、暴力型家庭或放任型家庭）</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">过于敏感、多疑	家庭不包容，缺乏温暖</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">（干涉型家庭或暴力型家庭）</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">不喜欢学习	家长不爱学习或者不认为学习有多重要</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">（干涉型家庭、暴力型家庭、放任型家庭或无文化型家庭）</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">冷酷、孤僻	必然有一个放任不管或喜欢暴力的家长</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">（放任型、暴力型家庭的结果）</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">自私	必然有一个溺爱的父母</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">（溺爱型家庭）</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<br />\r\n</p>\r\n<p class="MsoNormal">\r\n	<p class="p" style="margin-left:0.0000pt;">\r\n		<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">&nbsp;</span>\r\n	</p>\r\n	<p class="p" style="margin-left:0.0000pt;">\r\n		<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">你的今天，就是孩子的明天，</span>\r\n	</p>\r\n	<p class="p" style="margin-left:0.0000pt;">\r\n		<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">你今天对孩子喊，就别怪他明天对你叫;</span>\r\n	</p>\r\n	<p class="p" style="margin-left:0.0000pt;">\r\n		<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">你今天对孩子没耐心，就别怪他明天对你不耐烦;</span>\r\n	</p>\r\n	<p class="p" style="margin-left:0.0000pt;">\r\n		<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">你今天训孩子不如别人优秀，就别怪他明天怨你不如别人爹妈有权势;</span>\r\n	</p>\r\n	<p class="p" style="margin-left:0.0000pt;">\r\n		<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">你处处苛求孩子完美，就别怪他自卑懦弱;</span>\r\n	</p>\r\n	<p class="p" style="margin-left:0.0000pt;">\r\n		<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">你习惯打骂孩子，就别怪他崇尚暴力或奴性十足;</span>\r\n	</p>\r\n	<p class="p" style="margin-left:0.0000pt;">\r\n		<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">你自己界限不清，就别怪他不负责任。</span>\r\n	</p>\r\n	<p class="p" style="margin-left:0.0000pt;">\r\n		<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">&nbsp;</span>\r\n	</p>\r\n	<p class="p" style="margin-left:0.0000pt;">\r\n		<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">所以，真正的教育应该是一场修行，是孩子的纯真、无私、灵动洗濯了成人的浮躁、功力、自大的心理历程。好的教育，应该是父母通过孩子这把镜子，不断发现自我、修正自我、挖掘自我，并用新我来为孩子做示范和表率。我们是在教育的过程中，遇见了更好的自己。</span>\r\n	</p>\r\n<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;"></span>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>', '', NULL, 29, 0, 352, '', 0, 0, NULL, 1, 0, 1, '', '', '', ''),
(30, '节后如何帮宝宝“回归”幼儿园', '', '2016-04-15 10:42:42', '<p class="MsoNormal" style="text-align:center;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">节后如何帮宝宝“回归”幼儿园</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> 节假日后孩子再次入园，往往会出现哭闹、难送或身体不适，不上幼儿园等现象。究其原因，主要是假期孩子的生活规律被打乱，家长娇惯和放纵，这些都给孩子入园带来不必要的麻烦。既然孩子已经不愿意上幼儿园了，则该想想怎样帮助孩子尽快适应幼儿园的生活。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">第一，恢复饮食习惯。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> 许多家长觉得平时没有时间给孩子弄好吃的，正好利用年假好好补偿一下。于是想方设法给孩子买好吃的、做好吃的。只要孩子想吃，不管什么时间，全部满足。因此，假期过后，部分孩子就会出现不会自己吃饭，正餐时间吃不下饭或者身体不适，严重的则不能按时入园，甚至要送医院。为了孩子能顺利地回到幼儿园，家长要尽快恢复过节前的饮食习惯。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">第二，恢复作息时间。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> 一到假期，好多孩子的生活习惯就改变了，对于玩玩具、吃零食、睡觉等，都想怎样就怎样，这就打乱了孩子在幼儿园中建立起来的有规律的生活习惯。最突出的就是午睡，部分孩子干脆就不午睡了，这样不仅破坏了孩子正常的作息规律，更重要的是影响了孩子的生长发育。规律的生活，能帮助孩子更快地适应幼儿园。所以要培养孩子有规律的起居习惯，如早睡早起，按时午睡，睡前不给孩子看过多的电视节目、提供新玩具或其他新鲜的东西等。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">第三，培养孩子独立能力。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> 有些家长对孩子比较溺爱，无论是春节还是周末，都帮孩子做这做那，所以在幼儿园需要自己动手做的时候就不会了，这样不仅影响孩子的情绪，还影响孩子的自信心和自尊心。所以建议家长尽量让孩子自己动手吃饭、穿衣服，独立大小便等。不要嫌孩子太慢或做的不好而又开始帮他，要慢慢养成其独立的习惯。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">最后，给孩子做心理暗示。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> 过年这一段时间，孩子们远离了幼儿园，整天在家长的精心呵护中，随心所欲的生活。因此假期过后，一听说要上幼儿园，孩子就会对幼儿园、老师产生恐惧。因此家长应在家里经常跟孩子一起谈论幼儿园的事情，表现出对幼儿园生活的极大兴趣，还可以告诉孩子，老师打电话来，说这几天他表现得非常好，很喜欢他之类的话。这样的暗示可以激发孩子入园的动力，不至于“谈园色变”。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<br />\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> </span> \r\n</p>', '', NULL, 30, 0, 302, '', 0, 0, NULL, 1, 0, 1, '', '', '', ''),
(31, '每天问孩子四句话 改变孩子的一生', '', '2016-04-15 10:43:47', '<p class="MsoNormal" style="text-align:center;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">每天问孩子四句话&nbsp;改变孩子的一生</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;"> 爸爸妈妈们都希望自己的孩子能健康优秀，可教育方式却可能事倍功半，费力不讨好。今天给大家分享一位父亲对女儿比较独特的教育方式，从来没有辅导过女儿做功课，只是每天回来跟女儿聊十分钟，问四个问题，便完成了家庭教育，十分有效，值得推荐！</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;"> </span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">这四个问题是：</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">1</span><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">、学校有什么好事发生吗？</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">2</span><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">、今天你有什么好的表现？</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">3</span><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">、今天有什么好收获吗？</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">4</span><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">、有什么需要爸爸的帮助吗？</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;"> </span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">看似简单的问题背后其实蕴涵着丰富的含义：</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">第一个问题：</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">其实是在调查女儿的价值观，了解她心里面觉得哪些是好的，哪些是不好的；</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">第二个问题：</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">实际上是在激励女儿，增加她自信心；</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">第三个问题：</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">是让她回顾确认一下具体学到了什么；</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">第四个问题：</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">则有两层意思，一是我很关心你，二是学习是你自己的事。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">就是这简简单单的四个问题，包含了很多关爱、关怀在里面，事实上也证明非常有效。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;"> </span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">在教育理念中，要把孩子教育好，最关键的就是亲子关系要处理好。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">如果家长在孩子心中建立起绝对的责任：孩子相信家长无条件地爱着自己，相信家长所有批评、表扬的出发点都是为了自己好；如果孩子在潜意识里对此达到完全相信，那么这种关系就是良性的，是相互关爱、相互支持、相互理解的稳定关系。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">在这种情况下，教育孩子便是最简单的事情，用苏联大教育家苏霍姆林斯基的话说就是“伴随孩子成长”。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">但是，现实生活大部分人的亲子关系是不稳定的，或者说是扭曲的，孩子并不能真正信任家长。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">谁家的父母都是爱自己子女的，但中国</span><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">98</span><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">％的家长错把爱的方式当成了爱，其实是一种无形害！</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">比如给孩子最好的东西吃，最好的衣服穿，这只是一种爱的方式，并不是爱本身。而家长们的爱也经常是有条件的，比如会出现只要这次考试得了前三名，就带你去哪里玩等等。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;"> </span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">爱是一个生命喜欢另一个生命的感情，是一种平等的关系，是无条件的，是一种整体接纳，是要让对方能接收到的。要真正做一个好家长并不难，要教育好孩子一定要注意下面几句话：</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">1</span><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">、绝对禁止高压、打骂孩子的做法，建立平等的关系。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">2</span><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">、真正地无条件爱孩子，给予孩子精神意义上的爱。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">3</span><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">、一定要尊重孩子的独立人格。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">4</span><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">、用正面的方法教育孩子，时常对其鼓励表扬。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">5</span><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">、调整亲子关系，这是最重要的一点。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">6</span><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">、要注重孩子品格和精神的培养，而非一味的追求分数。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;"> </span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">如果真正理解了以上的六句话，对孩子的教育便不难了。教育是三分教，七分等。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">三分教，是指教诲要适量。说教过多只会让孩子会产生逆反心理，适得其反。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">七分等，是指父母要尊重孩子的天赋秉性、成长步调，对孩子要保有耐心，让孩子去尝试、去体验、去失败、去成功。孩子的成长，需时日和世事的打磨，绝不可能一蹴而就。揠苗助长，只能得不偿失。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">父母有慈爱的德行修养，子女便会善根福德的教顺。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;"> </span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">孩子生长于批评中，便学会论断人。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">孩子生长于敌意中，便学会攻击人。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">孩子生长于恐惧中，便学会了焦虑。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">孩子生长于无助中，便学会了抱憾。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">孩子生长于荒唐中，便学会了羞愧。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">孩子生长于嫉妒中，便学会了怀恨。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">孩子生长于羞辱中，便形成罪恶感。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">孩子生长于鼓励中，便学会了自信。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">孩子生长于包容中，便学会了忍耐。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">孩子生长于赞美中，便学会了欣赏。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">孩子生长于接纳中，便学会了爱人。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">孩子生长于肯定中，便学会了自重。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">孩子生长于认同中，便有确定目标。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">孩子生长于分享中，便学会了慷慨。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">孩子生长于公平中，便学会了公义。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">孩子生长于诚实中，便学会了真理。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">孩子生长于安全中，便充满了信心。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">孩子生长于友爱中，便将乐于存活。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;"> </span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;"> </span> \r\n</p>', '', NULL, 31, 0, 316, '', 0, 0, NULL, 1, 0, 1, '', '', '', ''),
(32, '中班语言活动：运馅饼', '', '2016-04-15 10:48:16', '<p class="p" style="text-align:center;background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">中班语言活动：运馅饼</span>\r\n</p>\r\n<p class="p" style="text-indent:156.0000pt;text-align:right;background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">执教教师&nbsp;&nbsp;陈晓倩</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">活动目标</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">1、&nbsp;理解故事内容中蚂蚁家族分工、合作搬运馅饼的内容，词汇丰富：雄赳赳、气昂昂：气喘吁吁。（重点）</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">2、&nbsp;能仔细观察图片，用较连贯的语言大胆讲述蚂蚁发现馅饼后的活动。（难点）</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">3、&nbsp;懂得团结合作的重要，明白团结力量大的道理。</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">活动准备</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">&nbsp;故事PPT：1）地上有一片香肠，狮子舍弃；2）两只蚂蚁发现香肠，向蚁后报告；3）兵蚁工蚁出发；4）包围馅饼、抬馅饼,运送馅饼；5）运回蚁洞；6）馅饼舞会。</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">活动过程</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">（一）出示故事PPT“发现馅饼”部分，引导幼儿理解香肠的“变化”，引发幼儿观察学习的兴趣</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">1、&nbsp;&nbsp;出示PPT1，观察理解“狮子舍弃馅饼”的情节。</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">提问：</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">地上有一片小小的香肠，看谁来了？</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">狮子看见这片小小的香肠，会怎么说？怎样做？</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">2、&nbsp;出示PPT2，观察理解“蚂蚁眼中香肠的变化和发现香肠的喜悦”。</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">提问：</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">谁又来了？他们发现这一小片香肠会怎样做？</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">在小蚂蚁的眼中，香肠发生了什么变化？为什么？</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">看到这片香肠，他们会说什么？</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">3、&nbsp;教师承接幼儿回答讲述故事第二段。</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">提问：</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">为什么小蚂蚁发现的是一片香肠，向蚂蚁女王报告的时候却说“天上掉下个大馅饼”？</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">4、&nbsp;教师小结：</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">两只小蚂蚁出来找食物，他们的运气太好了，竟然发现了一片香肠，这在小蚂蚁眼中简直就是一个大馅饼！有时候我们遇到这种意外惊喜也会说“天上掉下一个大馅饼”。</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">（二）教师完整讲述故事，引导幼儿理解蚂蚁发现馅饼、运陷饼、分享馅饼的故事内容</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">1、&nbsp;教师完整生动地讲述故事一遍。</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">2、整体出示PPT3，观察理解“蚂蚁女王安排运陷饼”的情节。</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">提问：</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">得知消息后蚂蚁女王是怎样安排的？兵蚁（工蚁）是怎样说、怎样做的呢？（词汇丰富：雄赳赳、气昂昂）</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">请幼儿扮演模仿兵蚁、工蚁，在动作模仿中理解词汇。</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">3、&nbsp;整体出示PPT4，观察理解“蚂蚁合作运陷饼”的情节。</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">提问：</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">见到了大馅饼，兵蚁（工蚁）是怎样做的？</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">蚂蚁们是怎样把大馅饼运回洞的？</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">引导幼儿细致观察、表达兵蚁保护馅饼，工蚁用力抬、运馅饼，并支持幼儿用动作模仿工蚁一起用力抬馅饼的样子。</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">4、依次出示PPT5,6，观察理解“馅饼舞会”的情节。</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">&nbsp;&nbsp;&nbsp;感受工蚁抬运陷饼的辛苦和蚂蚁女王的高兴心情。</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">提问：</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">馅饼运回了蚁洞，工蚁这是怎么了？（丰富词汇：气喘吁吁）</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">蚂蚁女王的心情是怎样的？她又做出了什么“安排”？</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">体验蚂蚁参加馅饼舞会，分享馅饼的愉快感受。</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">提问：</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">这是蚂蚁们在做什么？馅饼有什么变化？</span>\r\n</p>\r\n<p class="p" style="text-indent:24.0000pt;background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">鼓励幼儿细致观察并大胆表达蚂蚁们的庆祝活动，体验他们愉悦的心情</span>\r\n</p>\r\n<p class="p" style="text-indent:24.0000pt;background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">幼儿来表演一下故事，加深印象。</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">5、&nbsp;教师小结：</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">对于狮子来说不够塞牙缝的一小片香肠，对于蚂蚁来说竟然是“天上掉下的大馅饼”！&nbsp;小蚂蚁们齐心协力、团结合作把大馅饼运回家，开“大馅饼舞会”一起分享，真是快乐极了！</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">（三）分享交流生活事件，引导幼儿感受与同伴合作、分享的经历及带来的快乐</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">1、提问：故事里的小蚂蚁们太让人喜欢了，你最喜欢小蚂蚁的什么地方呢？</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">2、引导幼儿讲述交流生活中合作、团结的事情</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">3、&nbsp;教师小结：</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">生活中，小朋友也像小蚂蚁一样，虽然一个人的力量比较小，但是只要我们能互相帮助、一起合作，我们的本领就会变得很大，也会得到更多快乐。</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">附：故事</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">运陷饼</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">地上有一小片香肠。狮子走来，闻了闻，心想：“嗨，还不够塞牙缝呢！”走开了。</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">两只小蚂蚁发现了香肠，赶紧跑回蚂蚁洞里，向蚂蚁女王报告：“报告女王，天上掉下一个大馅饼！”</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">得知这个好消息，蚂蚁女王马上开始安排运陷饼。她先命令兵蚁：“你们赶快出发，去保护好那个大馅饼。”“是，女王。”兵蚁们一个跟着一个，拿着武器雄赳赳、气昂昂地出发了。</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">蚂蚁女王又命令工蚁；“你们听好了，要一起努力，把大馅饼运回来！”“是！女王”工蚁们排着整齐的队伍，踏着整齐的步子出发了。</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">来到了“大馅饼”面前，兵蚁们把“馅饼”四周包围起来，工蚁们一起吆喝，“一二三！”把“大馅饼”抬了起来，顶在头上。</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">工蚁们边走边喊，“一二！一二！”他们抬着“馅饼”一步一步向洞口走去，兵蚁们跟在后面保护。</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">工蚁们累的气喘吁吁，终于，终于把“大馅饼”运进了蚂蚁洞。蚂蚁女王见了，高兴的围着“馅饼”转了一圈又一圈。“太好了！”她要开一个大馅饼舞会。</span>\r\n</p>\r\n<p class="p" style="background:#FFFFFF;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">蚂蚁们打扮的漂漂亮亮的，都来参加“大馅饼”舞会。他们边跳舞边吃，热闹到半夜。不过，这一片小香肠他们都还没吃完呢！</span>\r\n</p>', '', NULL, 32, 0, 115, '', 0, 0, NULL, 1, 0, 4, '', '', '', ''),
(33, '中班音乐活动《下雨了》集体活动展示', '', '2016-04-15 10:49:47', '<p class="MsoNormal" style="text-align:center;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">中班音乐活动《下雨了》集体活动展示</span>\r\n</p>\r\n<p class="MsoNormal" style="text-align:center;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;执教教师：国玉玺</span>\r\n</p>\r\n<p class="p" style="text-align:justify;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">一、活动目标：</span>\r\n</p>\r\n<p class="p" style="text-indent:24.0000pt;text-align:justify;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">1、了解雨天里不同的事物会发出不同的有节奏的声音。</span>\r\n</p>\r\n<p class="p" style="text-indent:24.0000pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">2、体会诗一般语言的特点及感染力，感知不同的音乐节奏型，并尝试用此描述雨天里听到的不同的声音。&nbsp;</span>\r\n</p>\r\n<p class="p" style="text-indent:24.0000pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">3、感受下雨天美好的意境，体验与大自然玩耍的快乐。&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">二、活动准备：PPT课件、图谱、小花、小窗、小门图片&nbsp;</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">三、活动重点及难点：引导幼儿尝试用诗意的语言、有节奏的声音描述雨天的声响。</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">四、活动过程：</span>\r\n</p>\r\n<p class="p" style="text-indent:18.0000pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">1、导入：小鼹鼠引发幼儿兴趣和参与性，赏雨、听雨、引导幼儿进入故事。&nbsp;</span>\r\n</p>\r\n<p class="p" style="text-indent:18.0000pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">2、欣赏故事，让幼儿听一听下雨天鼹鼠发生了哪些故事？</span>\r\n</p>\r\n<p class="p" style="text-indent:18.0000pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">3、提问：雨天里，小鼹鼠的哪些朋友发出了声音？</span>\r\n</p>\r\n<p class="p" style="text-indent:12.0000pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">幼儿：小门、小草、小窗户（老师把图片粘贴到黑板上）</span>\r\n</p>\r\n<p class="p" style="margin-left:5.2500pt;text-indent:6.0000pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">师：还记得鼹鼠朋友小草、小门、小窗，发出的什么声音吗？（把“沙沙沙”“叮叮叮”“咚咚咚”粘贴到相应的图片上）</span>\r\n</p>\r\n<p class="p" style="text-indent:18.0000pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">幼儿：小草发出的是“沙沙沙”的声音</span>\r\n</p>\r\n<p class="p" style="text-indent:18.0000pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">小门发出的是“咚咚咚”的声音</span>\r\n</p>\r\n<p class="p" style="text-indent:18.0000pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">小窗发出的是“叮叮叮”的声音</span>\r\n</p>\r\n<p class="p" style="text-indent:18.0000pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">师：它们发出声音的时候发了几下？</span>\r\n</p>\r\n<p class="p" style="text-indent:18.0000pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">幼儿：3下</span>\r\n</p>\r\n<p class="p" style="text-indent:18.0000pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">师：仔细听一听这3下声音中，哪一下声音是最长的？</span>\r\n</p>\r\n<p class="p" style="text-indent:18.0000pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">幼儿：第三声是最长的</span>\r\n</p>\r\n<p class="p" style="text-indent:18.0000pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">4、展示图谱</span>\r\n</p>\r\n<p class="p" style="text-indent:12.0000pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">（1）出示“x”“x”&nbsp;“X”</span>\r\n</p>\r\n<p class="p" style="text-indent:18.0000pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">师：用这三个“x”来表示小草“沙沙沙”的声音，哪一下是大“X”发出的声音？</span>\r\n</p>\r\n<p class="p" style="text-indent:18.0000pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">幼儿：第三下，最长的声音</span>\r\n</p>\r\n<p class="p" style="text-indent:18.0000pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">（2）”X”“x”“x”让幼儿看一看怎么发声音？</span>\r\n</p>\r\n<p class="p" style="text-indent:18.0000pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">幼儿：小草：沙——沙沙&nbsp;&nbsp;小窗：叮——叮叮&nbsp;&nbsp;小门：咚——咚咚</span>\r\n</p>\r\n<p class="p" style="text-indent:18.0000pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">（3）“xx&nbsp;x”让幼儿观察有什么不一样？</span>\r\n</p>\r\n<p class="p" style="text-indent:18.0000pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">幼儿：三个“x”是一样的，但是多了一条横线，代表快的意思。</span>\r\n</p>\r\n<p class="p" style="text-indent:18.0000pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">师：让幼儿用手打打节奏（啪啪——啪）</span>\r\n</p>\r\n<p class="p" style="text-indent:18.0000pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">（4）“x&nbsp;xx”让幼儿看看有什么不一样？让幼儿用手打打节奏？</span>\r\n</p>\r\n<p class="p" style="text-indent:18.0000pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">幼儿：啪——啪啪</span>\r\n</p>\r\n<p class="p" style="text-indent:18.0000pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">（5）这些都是鼹鼠的朋友打出的有节奏的声音。雨天也有很多别的朋友会发出不同的有节奏的声音，让我们一起去找找吧。</span>\r\n</p>\r\n<p class="p" style="text-indent:18.0000pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">5、让幼儿观察大屏幕，出示路灯、小木桶、小花的图片</span>\r\n</p>\r\n<p class="p" style="text-indent:18.0000pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">（1）提问：这些东西在雨天里会发出声音吗？路灯——当当当；小木桶——通通通；小花——嗒嗒嗒</span>\r\n</p>\r\n<p class="p" style="text-indent:18.0000pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">（2）我们就像鼹鼠一样的来问问它们，是不是它们发出的声音？（老师出示几个不同的图谱，让幼儿根据图谱的节奏回答）</span>\r\n</p>\r\n<p class="p" style="text-indent:18.0000pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">6、继续故事：</span>\r\n</p>\r\n<p class="p" style="text-indent:18.0000pt;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">小鼹鼠就这样听着雨天里的声音“呼呼呼——”的睡着了。</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">五、活动延伸：在我们美丽的校园里也有很多在雨天会发出很好听声音的好朋友，让我们一起去找找他们吧！</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">六、活动反思：</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">&nbsp;&nbsp;&nbsp;&nbsp;本次活动围绕绘本故事《雨天的声音》展开，富有趣味性的引导幼儿认真倾听，感受下雨天美好的意境，体会诗一般语言的特点，并在此基础上学会用有节奏的声音表述雨天不同事物发出的声响，进一步感受雨天的快乐和探索大自然秘密的喜悦！</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<br />\r\n</p>', '', NULL, 33, 0, 158, '', 0, 0, NULL, 1, 0, 4, '', '', '', ''),
(34, '小班体育活动《我们的传球》​集体活动展示', '', '2016-04-15 10:50:50', '<p class="MsoNormal" style="text-align:center;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">小班体育活动《我们的传球》集体活动展示</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">八陡镇中心幼儿园&nbsp;曲晓蒙</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">一&nbsp;、活动目标：</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">1.</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">熟悉同伴的名字&nbsp; </span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">2.</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">能正确地接球和抛球&nbsp; </span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">3.</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">享受运动肢体的乐趣&nbsp; </span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">二、活动准备</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">:&nbsp;</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">一个皮球&nbsp; </span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">三、活动过程：&nbsp;</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">1.</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">让幼儿熟悉同伴的名字&nbsp; </span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">幼儿坐围成一个大圈圈，做传球游戏&nbsp;</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">说明规则：当老师拍手时，第一个小朋友就把小球传给旁边的小朋友，就这样一个接着一个传下去。当老师拍手停止时，小球就停止传送，这时候拿到小球的小朋友就站起来说出自己的名字：我的名字叫××。&nbsp; </span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">(</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">第一遍游戏：主要看幼儿对游戏的熟悉度</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">)&nbsp;</span><span> </span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">2</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">、改变规则：还是跟之前一样当老师的掌声响起时，第一个小朋友就把小球传给旁边的小朋友，就这样一个接着一个传下去。但是当老师的停止时，这时候拿到小球的小朋友不说自己的名字，而是要说出旁边小朋友的名字：我旁边小朋友的名字叫××。（当幼儿说不出名字时，教师可引导幼儿说出来，然后跟着老师一起讲，反复多做几次，让幼儿熟悉同伴的名字。）&nbsp;　　&nbsp; </span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">四、活动延伸：&nbsp;</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">等幼儿玩法熟练后，可以改变游戏的方式，把抛球改为给球、滚球，增加游戏传球的速度或者增加球的个数。</span>\r\n</p>', '', NULL, 34, 0, 133, '', 0, 0, NULL, 1, 0, 4, '', '', '', ''),
(35, '大班散文诗《树真好》', '', '2016-04-15 10:51:47', '<p class="MsoNormal" style="text-align:center;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">大班散文诗《树真好》</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">活动目标：</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">1</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">、根据生活经验想象画面，理解诗歌的内容。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">2</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">、欣赏散文诗，初步运用优美的语言进行表述，体会散文诗的语言美和意境美</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">重点：根据生活经验想象画面，理解诗歌的内容。</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">难点：学习散文诗所表现的语言美和意境美，创编诗歌。</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">材料准备：</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;&nbsp;1</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">、配有文字的图片，</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">ppt</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;&nbsp;2</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">、幼儿有树木的好处的相关经验</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">设计思路：</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;&nbsp;在幼儿园的语言领域教学中，大部分都是儿歌和故事，很少部分会有儿童散文诗的教学，《树真好》是一篇关于树和人类动物之间的和谐关系，从诗歌中透露出淡淡的惬意生活，通过人类和动物，深深的赞美了树对我们的作用。，希望通过这次散文诗欣赏活动，让幼儿感受到散文诗优美的语境，并尝试用诗歌里的话来说“树真好”。</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">活动过程：</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;&nbsp;一、出示大树的图片，发散幼儿思维。</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;&nbsp;1</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">、&nbsp;师：今天老师给小朋友带来了大自然的一位好朋友（大树）。小朋友看到这棵大树会想到什么呢？</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;&nbsp;二、&nbsp;幼儿观看图片，理解诗歌内容。</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;＠这页谁喜欢树？树给小鸟带来了什么好处呢？（树是小鸟的家，有了树小&nbsp;鸟才能在树上做窝。（保持生态平衡）、</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;＠树有什么好处？（挡住风沙）、</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;＠这页树又有什么好处？（净化空气）</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;＠他们在树下干什么呢？为什么在树下野餐（休闲娱乐）、</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;＠为什么他们睡在树下呢？（遮阴）</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;＠小猫为什么要到树上去？（躲避、保护）</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;＠他们又是在玩什么？（玩耍娱乐）、</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;＠这是白天还是晚上，夜晚静悄悄你们都听见过树唱歌吗？是怎么样的？（自然界的一种现象）风吹来，还唱起了好听的歌</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;＠这是什么季节？哪里看出是秋季？铺满落叶的地面是怎么样的像什么？小朋友在干什么？（娱乐，做游戏）</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">（小朋友在铺满落叶的树下打滚）</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;三、通过</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">ppt</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">欣赏散文诗《树真好》</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;&nbsp;1</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">、师：刚刚我们从这本大书里看到了树给我们人和动物带来的好处，人们写了一首散文诗来赞美树木，把树木的每个好处用一句好听的话说出来，我们一起听听是怎么赞美的？</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;&nbsp;2</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">、幼儿完整的欣赏一遍（有录音的</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">ppt)</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">，第二遍、、）</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">赞美树木的散文诗听下来有什么感觉？听出来是怎么赞美的？赞美了什么呢？引导用诗歌里的话来说</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;&nbsp;3</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">、分句欣赏并学习，（</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">ppt</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">第三遍）（理解诗歌的内容，感受散文诗的语言美和意境美）</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">A</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">树给我们的生态带来了平衡，散文诗里是怎么说的？我们听听：（树真好，小鸟可以在树上筑巢，每天天一亮，小鸟就唧唧喳喳的叫），你听到了什么？筑巢是什么意思？小鸟在树上是怎么唱歌的？</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">B</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">树能挡住风沙。如果没有风沙那将会是怎么样？树挡风沙的会怎么说（树真好来——能挡住大风，不许风沙吵吵闹闹，到处乱跑）那些词用得很好的？吵吵闹闹是什么意思呢？吵吵闹闹用的真好，</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">C</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">树能净化空气。树对屋子有什么好？我们听听，用了什么好听的词语</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">D</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">树能遮阴，人们在树荫下野餐的心情是怎么样的？我们来听听，诗歌里是怎么说的？用了什么好听的词？表达的是什么意思吗？（把快乐和热闹的景象表达出来了）（树真好，我们全家在树荫下野餐，大家吃得很香，说说笑笑，热热闹闹）</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;&nbsp;树能遮阴，天气很热选择在大树下睡午觉是件很舒服的事情，听听是怎么说的？哪个字用得非常好，铺是怎么样的？</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;小猫为什么要躲到树上？听听是怎么说的？（树真好，如果有一只大狗来追我的小猫，小猫就爬到树上躲起来，气得大狗“汪汪”叫。</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;树可以玩荡秋千的游戏，让布娃娃玩荡秋千怎么说的？</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;树还会唱好听的歌，我们去听听</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;小朋友和树叶在一起做游戏，他们是怎么做游戏的？他们是怎么玩的？用了什么好听的词？</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;&nbsp;3</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">、&nbsp;引导发现并提升总结</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">师：用了这么好听的词语来赞美树，所以《树真好》的散文诗是很优美的，除了词语用得好，还发现了什么优美的地方？哪句话是相同的呢？怎么说的？</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">师小结：这首散文诗我们小朋友都发现了第一句赞美的话相同的“树真好”，后面把树的好处用优美的语句表达出来，那我们再完整的听一遍。</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;4</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">、引导幼儿创编诗歌</span><br />\r\n<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;师：今天我们学习了这么多优美的句子，请小朋友用上“树真好”来编一句赞美大叔的诗句。（在老师的引导下，让幼儿大胆自由发挥）</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;</span>\r\n</p>', '', NULL, 35, 0, 151, '', 0, 0, NULL, 1, 0, 4, '', '', '', '');
INSERT INTO `mx_news` (`lc_id`, `lc_title`, `lc_pic`, `lc_datetime`, `lc_content`, `lc_jianjie`, `lc_key`, `lc_sort_id`, `lc_tj`, `lc_hits`, `lc_from`, `lc_phone`, `lc_del`, `lc_del_time`, `lc_zt`, `lc_cant_del`, `c_id`, `lc_phone_content`, `lc_url`, `lc_keywords`, `lc_description`) VALUES
(36, '大班语言活动《梨子小提琴》', '', '2016-04-15 10:52:22', '<p class="MsoNormal" style="text-align:center;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">大班语言活动《梨子小提琴》</span>\r\n</p>\r\n<p class="MsoNormal" style="text-align:right;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">博山区八陡镇中心幼儿园</span>\r\n</p>\r\n<p class="MsoNormal" style="text-align:right;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">执教教师：国玉玺</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">一、活动目标：</span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:24pt;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">1、欣赏、理解故事内容，感受故事温馨、柔美的意境，体会音乐的神奇和美妙。</span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:24pt;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">2、丰富词汇“甜蜜蜜”。</span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:24pt;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">3、仿编、创编故事中的部分情节，体验与人友好相处的喜悦，产生对美好生活的向往。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">二、活动准备：制作课件</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">三、活动重点及难点：</span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:24pt;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">在理解故事内容的基础上，体会故事情节的美好、感受音乐的神奇和美妙，并尝试仿编、创编部分故事情节，敢于用清晰的语言表达自己的想法。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">四、活动过程：</span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:24pt;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">1、情景剧场：模拟音乐会现场，邀请幼儿加入音乐会。引出演奏的乐器——梨子，设置悬念，进入故事。</span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:24pt;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">2、分段讲述故事，并提出相应的问题，鼓励幼儿仿编、续编故事。</span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:24pt;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">1）小松鼠会想到一个什么好主意？</span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:24pt;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">2）怎样才能让狮子不追小兔子呢？一起来帮可怜的小兔子想个办法吧。（仿编）</span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:24pt;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">3）小提琴上的小音符会掉到哪里呢？（续编）</span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:24pt;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">3、给故事取名字，完整的欣赏故事，感受音乐的神奇和美妙。</span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:24pt;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">4、交流感受，引出“甜蜜蜜”，唤醒幼儿经验。</span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:24pt;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">5、邀请幼儿加入音乐会，从不同种类的音乐中自行感知音乐的神奇，感受音乐可以改变人的情绪和行为，在欢快的音乐中结束活动。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">五、活动结束及延伸：</span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:27pt;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">音乐会继续，与幼儿共同亲身感受音乐的神奇和美妙，在愉快的气氛中带领幼儿去参加我们自己的音乐会。</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;</span>\r\n</p>', '', NULL, 36, 0, 141, '', 0, 0, NULL, 1, 0, 4, '', '', '', ''),
(37, '《小熊请客》教案', '', '2016-04-15 10:53:04', '<p class="MsoNormal" style="text-align:center;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">《小熊请客》教案</span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:180.0000pt;text-align:right;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">执教教师&nbsp;&nbsp;曲晓蒙</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">活动目标：</span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:24pt;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">1、理解故事内容，了解几种小动物的食性。</span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:24pt;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">2、喜欢听故事，愿意模仿小动物对话，感受故事中朋友友好相处的快乐。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">活动准备：</span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:24pt;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">操作卡（小动物与食物对应卡），鱼、肉骨头、萝卜图片、小熊、小猫、小狗、小兔头饰，故事ppt，故事视频</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">活动重难点：</span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:24pt;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">理解故事，愿意模仿小动物的对话。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">活动过程：</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">一、导入：谈话导入</span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:24pt;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">抛出问题，请幼儿说一说“我想请朋友到家里做客，我要准备什么？”</span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:24pt;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">“今天小熊也要请客，它遇到了一个难题，我们去看一看，小熊遇到了什么问题？帮一帮它。”引出活动</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">二、基本部分：</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">（一）根据ppt讲述故事，理解故事内容，了解小动物食性。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">1、操作“操作卡”，了解小动物食性。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;“今天小熊请到了三位动物朋友，都是有谁？小熊准备了什么？小熊犯糊涂了，朋友们都喜欢吃什么呢？待会朋友来了，要怎么分呢？你们知道吗？帮他分一分吧”</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;幼儿操作“操作卡”，通过动手操作，进一步了解小动物食性。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">2、根据ppt讲述故事，初步理解故事内容。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;“小熊看到小朋友们帮它分的餐，一下子就明白了，原来小猫爱吃鱼，小狗爱吃肉骨头，小兔爱吃胡萝卜。谢谢小朋友们！”</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;“当当当，什么声音？谁来了？小猫来了，对小熊说‘小熊你好’，小熊说‘小猫，请你吃鱼’，汪汪汪……”（边提问，边讲述故事）</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">（二）完整欣赏故事，进一步理解故事内容，学说“你好”、“请”、“谢谢”。</span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:24pt;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">1、“刚刚小朋友们说的都很棒，接下来呢，我要请小朋友们仔细听，只是听哦，看谁听的最棒，最清楚。”（播放故事视频，完整欣赏故事。）</span>\r\n</p>\r\n<p class="MsoNormal" style="text-indent:24pt;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">2、引导幼儿学说，故事中的礼貌用词“你好”、“请”、“谢谢”</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">三、结束部分：表演游戏，愿意模仿小动物对话。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;“动物朋友们在一起聚会，非常的开心，也想邀请小朋友们一起游戏，来模仿一下他们。”（进入表演游戏）</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;</span>\r\n</p>\r\n<p class="MsoNormal" style="text-align:right;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;八陡镇中心幼儿园</span>\r\n</p>', '', NULL, 37, 0, 148, '', 0, 0, NULL, 1, 0, 4, '', '', '', ''),
(38, '大班语言活动《雪孩子》', '', '2016-04-15 10:53:43', '<p class="MsoNormal" style="text-align:center;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">大班语言活动《雪孩子》</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:36pt;text-align:right;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">执教教师&nbsp;&nbsp;&nbsp;&nbsp;孙玉珠</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">设计意图</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;&nbsp;《雪孩子》是一节语言活动，故事语言浅显，简洁，生动地表现了雪孩子奋不顾身从火中救出小白兔，自己却融化成水，经过太阳一晒，又变成天上一朵朵美丽的白云的经过。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">活动目标</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:43.5pt;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">1、&nbsp;知识与能力目标：认真倾听故事，学说故事中的对话。</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:43.5pt;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">2、&nbsp;过程与方法目标：通过故事让幼儿了解，雪遇热融化、蒸发、形成白云的自然常识。</span>\r\n</p>\r\n<p class="MsoNormal" style="margin-left:43.5pt;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">3、&nbsp;情感态度与价值观目标：理解故事内容，感受雪孩子乐于帮助别人的美德。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">活动准备</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;1、《雪孩子》教学挂图5幅、语言CD，搜集图片。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;2、故事动画片、字卡、动物头饰等。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">活动过程</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">（一）导入</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;&nbsp;问好打招呼</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">手指游戏：《冬风》</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">冬天是个野孩子，最爱调皮捣蛋，我把窗户关上，它就在外面砰砰乱撞，我把窗户打开，它就伸出冰冷的手，摸摸我的脸颊，摸摸我的鼻子，我不要跟它玩，我不要跟它玩。</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">1、手指游戏里，调皮的野孩子是谁啊？（冬风）</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">2、冬风是在哪个季节？（冬天）</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">3、冬天除了有调皮的也还爱，还有懂事的好孩子，我们一起去认识一下它吧。（导入动画）</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">（二）观察欣赏</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">完整欣赏故事动画，理解故事内容，感受雪孩子舍身救小白兔的动人情节。</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">（三）理解环节</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">1、观察画面一、</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">（1）天上下了雪，家里没有东西吃了，兔妈妈要出去找点吃的。</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">（2）教师小结：兔妈妈要出去找东西，没有带兔宝宝，为了让兔宝宝乖乖在家里，兔妈妈会怎样做？</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">2、观察画面二</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">(1)&nbsp;小白兔跟新伙伴一起玩耍，给雪孩子唱歌听，给雪孩子跳舞看，跟雪孩子玩得非常开心。</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">(2)教师小结：兔宝宝和雪孩子玩了一会儿，天气真冷，兔宝宝会怎样做？</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">3、观察画面三</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">（1）小兔子躺在床上一会就睡着了。</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">（2）教师小结：兔宝宝睡了，猜猜发生了什么事情?</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;　4、观察画面四</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">（1）雪孩子在干什么？看见了什么？</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">（2）教师小结：雪孩子看见小白兔家着火了是怎么做的？</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">5、观察画面五</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">（1）雪孩子冲进兔宝宝的家，身上感觉热热的，浑身都湿淋淋的。</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">（2&nbsp;）教师小结：雪孩子有没有救出兔宝宝？</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">6、观察画面六、七</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">（1）小白兔得救了，可是雪孩子融化了，浑身湿淋淋的。</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">（2）教师小结：兔妈妈回来发现了什么？它会怎样说？（宝宝，快点醒醒！家里着火了，你怎么躺在这里？）</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">7、观察画面八</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">（1）雪孩子变成了什么？（水）变成水的雪孩子，后来还会变成了什么？</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">（2）教师小结：雪孩子变成了水气，轻轻地往往上飘呀飘呀，一直飘到蓝蓝的天上，变成了一朵白云，他微笑着朝兔妈妈、兔宝宝招招手呢。</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">（四）结束环节</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">1、翻阅大书、听故事朗诵，完整欣赏故事。</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">2、识字环节：出示字宝宝“刺猬”“烧”“帮助”，以幼儿喜爱的识字游戏呈现，加深幼儿对字宝宝理解。</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">3、总结结束：引出故事的名字《雪孩子》，告诉孩子在学习雪孩子舍己救人的精神的时候，首先最重要的是先学会自救，再呼喊大人进行他救。</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">（五）活动延伸</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;1、在科学区投放多种材料，继续引导</span><a href="http://youer.1kejian.com/"><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">幼儿</span></a><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">探索水的三态变化的科学实验，进一步理解雪遇热融化，蒸发形成白云的科学原理。</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">2、课后通过将故事CD及角色头饰放在表演区，小朋友们可以欣赏和表演故事，进一步感受雪孩子舍己救人的美德。</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">3、将这个故事讲给爸爸妈妈听，增进亲子之间感情。</span>\r\n</p>\r\n<p class="p">\r\n	<br />\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>\r\n</p>\r\n<p class="p">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp;</span>\r\n</p>', '', NULL, 38, 0, 145, '', 0, 0, NULL, 1, 0, 4, '', '', '', ''),
(39, '中班语言活动《香喷喷的轮子》', '', '2016-04-15 10:54:53', '<p class="MsoNormal" style="text-align:center;">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">中班语言活动《香喷喷的</span><span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">轮子》</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;执教教师&nbsp;&nbsp;王若伊</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">一、教材分析</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">《香喷喷的轮子》选自主题《我在马路边》之次主题《我看到的车》，本节课以四颗巧克力豆为导火线，以车为线索，展开了小松鼠用巧克力豆车轮热心帮助小鸡和老爷爷的故事，故事生动有趣，充满了想象和浪漫的气息，具有童话色彩，吸引幼儿理解故事，又让幼儿明白了帮助别人的同时也让自己收获了快乐！丰富了幼儿关于车的生活经验，对车进一步认识。同时，中班幼儿已能清晰谈话，但有时讲话断断续续，本节课丰富了幼儿词汇，锻炼幼儿叙述能力，符合中班幼儿发展水平！</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">二、活动目标</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">1.</span><span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">理解小松鼠把巧克力豆变成轮子、帽子和扣子帮助别人的故事内容，感受故事的有趣。丰富词汇：绊、扛、香喷喷、圆溜溜。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">2.</span><span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">能根据故事线索大胆想象和表达小松鼠帮助小鸡和老爷爷的主要情节。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">三、活动重难点</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">1.</span><span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">活动重点：理解故事内容，感受故事的有趣</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">2.</span><span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">活动难点：能根据故事线索大胆想象和表达小松鼠帮助小鸡和老爷爷的主要情节。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">四、活动准备</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">《香喷喷的轮子》图片、挂图、</span><span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">ppt,</span><span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">巧克力豆</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">五、活动过程</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">（一）出示圆圆的巧克力豆，引起幼儿听故事的兴趣</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">1.</span><span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">猜礼物：“小朋友们，看，老师带来了一个神秘的礼物，这是什么？看起来圆溜溜的，请小朋友来闻一闻，嗯，还是香喷喷的，你们吃过吗？</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">2.</span><span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">猜想巧克力豆的变化：“这神奇的巧克力豆可以变成很多东西，会变成什么呢？下面老师给小朋友们将一个小故事，看看故事里巧克力豆变成了什么？”</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">（二）出示图片讲述故事，引导幼儿大胆猜想小松鼠用巧克力豆帮助小鸡和老爷爷的故事情节，初步感受故事的有趣。（实现活动目标</span><span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">2</span><span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">）</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">（</span><span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">1</span><span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">）出示第一幅图片</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">师：“小松鼠怎么了？他是被什么东西绊倒的？诶，像不像我们刚刚看的巧克力豆？他会吃了这些巧克力豆吗？如果他没有吃，那他会用巧克力豆来做什么呢？我们一起来看一看小松鼠用巧克力豆做了什么呢？”</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">（</span><span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">2</span><span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">）出示第二幅图片</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">师：“看，小松鼠用巧克力豆做了什么</span><span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">?</span><span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">（车轮）小松鼠的车是什么车？小松鼠高高兴兴的开着自己的小汽车在田野上飞跑”</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">（</span><span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">3</span><span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">）出示第三幅图</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">师：“小松鼠在田野上遇到了谁？小鸡的脸怎么红红的，他们怎么了？小朋友们来猜一猜，小松鼠会怎样帮助小鸡呢，小鸡会对小松鼠说什么呢？”现在只剩下两个轮子了，两个轮子还能做车吗？什么车是两个轮子的？</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">（</span><span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">4</span><span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">）出示第四幅图</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">师：“看，小松鼠把他的四轮车改成了什么？（两轮摩托车）小松鼠又遇到了谁？老爷爷怎么了？小松鼠会帮助老爷爷吗？他会怎样帮助老爷爷呢？老爷爷对小松鼠说什么？你们猜一猜小松鼠现在的心情是怎样的？现在只剩下一个轮子了，还能做车吗？一个轮子能做什么车呢？”</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">（</span><span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">5</span><span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">）出示第五幅图</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">师：“小松鼠把两轮摩托车改成了独轮车，看，现在小松鼠在干什么呢，他正吃着香喷喷的巧克力豆呢，下面我们也来学一学小松鼠，尝一尝巧克力豆（模仿动作声音）吧嗒吧嗒”</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">（</span><span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">6</span><span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">）出示第六幅图</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">现在小松鼠一个车轮也没有了，那他的车怎么办呢，小松鼠是怎么做的？（扛着车走的）你们猜猜现在小松鼠的心情是怎样的？我们看，在前面有一辆小汽车，这辆小汽车是谁的？上面还写着字：送给可爱的小松鼠。你们猜这是谁送的呢？为什么要送给小松鼠小汽车？”</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">（三）出示教学挂图完整的讲述故事，引导幼儿进一步感受故事的有趣，丰富词汇：绊、扛、香喷喷、圆溜溜。（实现活动目标</span><span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">1</span><span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">）</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">师：“小朋友们看着图片猜想了那么多，那到底是不是这样的呢，下面让我们来完整地欣赏故事吧！”</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">听完故事，提问：小朋友们猜对了吗？小鸡和老爷爷遇到了什么困难？小松鼠是怎样帮助他们的？那这辆车到底是谁送给小松鼠的呢？你们喜欢这只小松鼠吗？这是一只什么样的小松鼠？”</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">小结：小松鼠为了帮助小鸡和老爷爷把自己的巧克力车轮送给了他们，所以当他扛着车往家走的时候，他的好朋友也来帮助小松鼠，并给他一个惊喜（漂亮的小汽车），这是一只善良，聪明、乐于帮助别人的小松鼠，这个故事告诉我们只要你关心、帮助朋友，朋友也会关心帮助你的！好朋友就是要互相帮助的！</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">（四）鼓励幼儿分角色表演故事，大胆表现小松鼠帮助小鸡和老爷爷的主要情节</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">六、活动延伸</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">假如你有好多巧克力豆，你想把他们变成什么？把你的想法画出来吧！</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">附故事：</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">一只小松鼠在草地上散步，他走着走着，一下子被绊了个大跟头。小松鼠低头一看：哇，草地上有四颗圆溜溜、散发着香味的巧克力豆。他捡起一颗放到嘴边刚想吃，突然，想起了什么，停了下来。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">原来，小松鼠做了一辆车。可是没有轮子，这四颗巧克力豆不正可以做车轮吗？</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">小松鼠装好了车轮，开着小汽车在田野上飞跑。前面有两只毛茸茸的小鸡摇摇晃晃。原来，太阳光太热，都快把小鸡晒晕了。小松鼠忙卸下两个车轮，在两边系上带子，给小鸡做了两顶太阳帽。小鸡感激的说：“谢谢小松鼠。”现在只剩下两个轮子了。没关系，小松鼠把小汽车改成了两轮摩托车。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">小松鼠开着摩托车又往前跑，看见一位老爷爷正在发愁。原来，他的纽扣掉了一个。小松鼠又把一个巧克力车轮送给老爷爷当纽扣，老爷爷笑眯眯的说：“谢谢你，小松鼠。”</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">只剩下一颗巧克力豆了。没关系，小松鼠把摩托车改成了独轮车，推着车在草地上继续走。走着走着，小松鼠觉得饿了，他把最后一颗巧克力车轮吃了，“吧嗒吧嗒”吃的真香。没了车轮，小松鼠只好扛着车厢走，好累啊。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">小松鼠走着走着，忽然看见前面有一辆特别漂亮的小汽车，车厢上写着：“送给可爱的小松鼠。”小松鼠开心极了！</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="line-height:2;font-size:14px;font-family:''Microsoft YaHei'';">&nbsp;</span>\r\n</p>', '', NULL, 39, 0, 153, '', 0, 0, NULL, 1, 0, 4, '', '', '', ''),
(40, '小班语言活动《云朵棉花糖》', '', '2016-04-15 10:55:33', '<p class="MsoNormal" style="text-align:center;">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">小班语言活动《云朵棉花</span><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">糖》</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">执教教师&nbsp;&nbsp;岳海燕</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">《云朵棉花糖》是幼儿园教材中的小故事。它蕴含在优美语言中的深刻哲理，引导幼儿体验分享的快乐。在现在独生子女众多的时代，培养幼儿良好的性格品质就显得尤为重要。故事中的鼠老大、鼠老二和鼠小小这兄弟三人组成的优美的画面和精彩对话，带给人一个温馨、和谐的世界，一个给成长中孩子以哲理启示的世界。</span><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">&nbsp;</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">&nbsp;&nbsp;&nbsp;&nbsp;选用《云朵棉花糖》作为小班语言活动素材是因为，主题单纯，故事以“云朵”为线索，贯穿始终；结构简单，情节有趣，充分渲染了主题，便于幼儿理解；故事中充满了不可思议的想象，是幼儿最感兴趣的地方，“云朵”变成了“云朵棉花糖”；故事内容富有儿童情趣，生活情趣，源于幼儿生活又高于生活，“棉花糖”是幼儿熟悉的事物，在活动中可以亲自品尝棉花糖的味道，体验分享的快乐；图片画面的形象直观，主题突出，静态的云朵棉花糖和动态三个小老鼠有助于人物形象的理解，体会“分享快乐”这一道理。</span><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">&nbsp;</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">活动目标：</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">1.</span><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">幼儿能理解故事内容。（教学重点）</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">2.</span><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">体会与朋友分享东西的快乐。（教学难点）</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">3</span><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">、能大胆想象表达自己的想法。&nbsp;</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">活动准备：</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">1</span><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">．鼠老大，鼠小小，鼠老二，屋子，云朵，小动物，太阳的图片。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">2</span><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">．棉花糖图片。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">活动过程：</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">一、用图片导入，激发幼儿的兴趣。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">1</span><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">．师提问：小朋友们喜不喜欢吃棉花糖啊？</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">2.</span><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">教师出示云朵图片，引出云朵棉花糖。教师提问：小朋友们有没有吃过云朵做的棉花糖啊？</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">二、完整欣赏故事，回答问题。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">1.</span><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">教师配合图片，有感情的讲故事，并提问：</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">A</span><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">、故事叫什么？</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">B</span><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">、故事中都有谁？</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">C</span><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">、什么东西飘进了鼠小小的房间里？</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">教师总结：这个故事叫做《云朵棉花糖》，故事中有三只老鼠，它们是：鼠老大，鼠老二，鼠小小，有一天云朵飘进了鼠小小的房间里。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">师：后来又发生了什么事情呢？我们一段一段仔细听。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">三、分段学习故事，解决教学重点</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">1</span><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">．教师讲述故事的前几段。教师提问：</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">A</span><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">、小朋友们知不知道鼠老二想把白云做成什么啊？</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">B</span><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">、鼠小小和鼠老二抱着白云去找鼠老大，鼠老大想把白云做成什么啊？</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">C</span><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">、鼠小小想把棉花糖做成什么啊？</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">教师总结：鼠老大想把云朵做成棉衣，鼠老二想把云朵做成枕头，鼠小小</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">想把云朵做成棉花糖。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">2.</span><span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">教师讲述故事的后几段。教师提问：三只老鼠有没有给森林里的小动物吃啊？</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">四、再次完整欣赏故事，解决难点</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">教师提问：三只老鼠分给森林里的小动物吃棉花糖后，开不开心啊？</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">教师总结：小老鼠和其他小动物分享了棉花糖后很开心，我们小朋友也要学着把自己的东西分给其他小朋友，这样我们才能交到更多的朋友。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">&nbsp;</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:14px;font-family:''Microsoft YaHei'';line-height:2;">&nbsp;</span>\r\n</p>', '', NULL, 40, 0, 114, '', 0, 0, NULL, 1, 0, 4, '', '', '', ''),
(41, '八陡镇中心幼儿园每周食谱', '', '2016-04-15 11:25:27', '<p class="MsoNormal" style="text-indent:238.7500pt;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> </span> \r\n</p>\r\n<p class="MsoNormal" style="text-indent:238.7500pt;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">八陡镇中心幼儿园每周食谱</span> \r\n</p>\r\n<p class="MsoNormal" style="text-indent:238.7500pt;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> 2016</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">年</span><span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;">4月11日——4月15日</span> \r\n</p>\r\n<table class="MsoNormalTable" style="width:662.4pt;">\r\n	<tbody>\r\n		<tr>\r\n			<td width="151" valign="center" style="border:0.5000pt solid windowtext;">\r\n				<p class="MsoNormal" style="text-align:left;">\r\n					<span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;"> 日期 </span><span style="font-family:宋体;font-weight:bold;font-size:12.0000pt;"></span> \r\n				</p>\r\n			</td>\r\n			<td width="216" valign="center" style="border:0.5000pt solid windowtext;">\r\n				<p class="MsoNormal" style="text-indent:24.1000pt;">\r\n					<span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">早餐&nbsp;&nbsp;&nbsp;&nbsp;餐间水果</span><span style="font-family:宋体;font-weight:bold;font-size:12.0000pt;"></span> \r\n				</p>\r\n			</td>\r\n			<td width="348" valign="center" style="border:0.5000pt solid windowtext;">\r\n				<p class="MsoNormal" style="text-align:left;">\r\n					<span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;"> 午&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;餐</span><span style="font-family:宋体;font-weight:bold;font-size:12.0000pt;"></span> \r\n				</p>\r\n			</td>\r\n			<td width="168" valign="center" style="border:0.5000pt solid windowtext;">\r\n				<p class="MsoNormal" style="text-align:left;">\r\n					<span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">午&nbsp;&nbsp;&nbsp;&nbsp;点</span><span style="font-family:宋体;font-weight:bold;font-size:12.0000pt;"></span> \r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td width="151" valign="center" style="border:0.5000pt solid windowtext;">\r\n				<p class="MsoNormal" style="text-align:left;margin-left:-5.6pt;">\r\n					<span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;"> 星期一</span><span style="font-family:宋体;font-weight:bold;font-size:10.5000pt;"></span> \r\n				</p>\r\n			</td>\r\n			<td width="216" valign="center" style="border:0.5000pt solid windowtext;">\r\n				<p class="MsoNormal" style="text-align:left;">\r\n					<span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">面条（</span><span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">黄瓜</span><span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">肉末汤）&nbsp;&nbsp;苹果</span><span style="font-family:宋体;font-weight:bold;font-size:10.5000pt;"></span> \r\n				</p>\r\n			</td>\r\n			<td width="348" valign="center" style="border:0.5000pt solid windowtext;">\r\n				<p class="MsoNormal" style="text-align:left;">\r\n					<span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">馒头 </span><span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">醋溜土豆丝 </span><span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">茄子炖豆腐 </span><span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">玉米粥</span> \r\n				</p>\r\n			</td>\r\n			<td width="168" valign="center" style="border:0.5000pt solid windowtext;">\r\n				<p class="MsoNormal" style="text-indent:26.0500pt;">\r\n					<span style="font-family:''Microsoft YaHei'';font-size:14px;font-weight:bold;line-height:31.1111px;">长寿糕</span>\r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td width="151" valign="center" style="border:0.5000pt solid windowtext;">\r\n				<p class="MsoNormal" style="text-align:left;">\r\n					<span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">星期二</span><span style="font-family:宋体;font-weight:bold;font-size:10.5000pt;"></span> \r\n				</p>\r\n			</td>\r\n			<td width="216" valign="center" style="border:0.5000pt solid windowtext;">\r\n				<p class="MsoNormal">\r\n					<span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;"> 鸡蛋面</span><span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">油条&nbsp;&nbsp;豆浆 </span><span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">橙子</span><span style="font-family:宋体;font-weight:bold;font-size:10.5000pt;"></span> \r\n				</p>\r\n			</td>\r\n			<td width="348" valign="center" style="border:0.5000pt solid windowtext;">\r\n				<p class="MsoNormal" style="text-indent:21.0000pt;">\r\n					<span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">馒头 </span><span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">西红柿木耳鸡蛋汤</span><span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;"> </span><span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">豆芽炒肉</span><span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;"> </span><span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">小</span><span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">米粥</span><span style="font-family:宋体;font-weight:bold;font-size:10.5000pt;"></span> \r\n				</p>\r\n			</td>\r\n			<td width="168" valign="center" style="border:0.5000pt solid windowtext;">\r\n				<p class="MsoNormal">\r\n					<span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;"> </span><span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;"> 糖火烧（白）</span><span style="font-family:宋体;font-weight:bold;font-size:10.5000pt;"></span> \r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td width="151" valign="center" style="border:0.5000pt solid windowtext;">\r\n				<p class="MsoNormal" style="text-align:left;">\r\n					<span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">星期三</span><span style="font-family:宋体;font-weight:bold;font-size:10.5000pt;"></span> \r\n				</p>\r\n			</td>\r\n			<td width="216" valign="center" style="border:0.5000pt solid windowtext;">\r\n				<p class="MsoNormal" style="text-indent:21.1000pt;">\r\n					<span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">肉火烧&nbsp;&nbsp;黑</span><span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">米粥&nbsp;苹果</span><span style="font-family:宋体;font-weight:bold;font-size:10.5000pt;"></span> \r\n				</p>\r\n			</td>\r\n			<td width="348" valign="center" style="border:0.5000pt solid windowtext;">\r\n				<p class="MsoNormal" style="text-indent:10.5500pt;">\r\n					<span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;"> </span><span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">米饭&nbsp;&nbsp;西葫芦</span><span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">蛋花</span><span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">汤 </span><span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">芹菜炒豆腐</span><span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;"> 玉米粥</span><span style="font-family:宋体;font-weight:bold;font-size:10.5000pt;"></span> \r\n				</p>\r\n			</td>\r\n			<td width="168" valign="center" style="border:0.5000pt solid windowtext;">\r\n				<p class="MsoNormal" style="text-align:left;">\r\n					<span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;"> </span><span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">糖三角（红）</span><span style="font-family:宋体;font-weight:bold;font-size:10.5000pt;"></span> \r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td width="151" valign="center" style="border:0.5000pt solid windowtext;">\r\n				<p class="MsoNormal" style="text-align:left;">\r\n					<span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">星期四</span><span style="font-family:宋体;font-weight:bold;font-size:10.5000pt;"></span> \r\n				</p>\r\n			</td>\r\n			<td width="216" valign="center" style="border:0.5000pt solid windowtext;">\r\n				<p class="MsoNormal">\r\n					<span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;"> 油卷&nbsp;菜叶豆腐脑 </span><span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">香蕉</span><span style="font-family:宋体;font-weight:bold;font-size:10.5000pt;"></span> \r\n				</p>\r\n			</td>\r\n			<td width="348" valign="center" style="border:0.5000pt solid windowtext;">\r\n				<p class="MsoNormal" style="text-align:left;">\r\n					<span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">胡萝卜海米木耳</span><span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">肉蒸包 </span><span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">小米粥</span><span style="font-family:宋体;font-weight:bold;font-size:10.5000pt;"></span> \r\n				</p>\r\n			</td>\r\n			<td width="168" valign="center" style="border:0.5000pt solid windowtext;">\r\n				<p class="MsoNormal" style="text-align:left;">\r\n					<span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">方蛋糕</span><span style="font-family:宋体;font-weight:bold;font-size:10.5000pt;"></span> \r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td width="151" valign="center" style="border:0.5000pt solid windowtext;">\r\n				<p class="MsoNormal" style="text-align:left;">\r\n					<span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">星期五</span><span style="font-family:宋体;font-weight:bold;font-size:10.5000pt;"></span> \r\n				</p>\r\n			</td>\r\n			<td width="216" valign="center" style="border:0.5000pt solid windowtext;">\r\n				<p class="MsoNormal" style="text-align:left;">\r\n					<span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">五香茶蛋&nbsp;八宝粥</span><span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;"> </span><span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;"> 苹果</span><span style="font-family:宋体;font-weight:bold;font-size:10.5000pt;"></span> \r\n				</p>\r\n			</td>\r\n			<td width="348" valign="center" style="border:0.5000pt solid windowtext;">\r\n				<p class="MsoNormal" style="text-align:left;">\r\n					<span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">馒头 </span><span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">小白菜炖豆腐</span><span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;"> </span><span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">硬炸肉</span><span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;"> </span><span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">玉米粥</span><span style="font-family:宋体;font-weight:bold;font-size:10.5000pt;"></span> \r\n				</p>\r\n			</td>\r\n			<td width="168" valign="center" style="border:0.5000pt solid windowtext;">\r\n				<p class="MsoNormal" style="text-align:left;">\r\n					<span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;"> </span><span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;"> </span><span style="font-family:''Microsoft YaHei'';font-weight:bold;font-size:14px;line-height:2;">黑米窝头</span><span style="font-family:宋体;font-weight:bold;font-size:10.5000pt;"></span> \r\n				</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p class="MsoNormal" style="text-indent:89.5500pt;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> </span> \r\n</p>\r\n<p class="MsoNormal" style="text-indent:104.4500pt;">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> </span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-family:''Microsoft YaHei'';font-size:14px;line-height:2;"> </span> \r\n</p>', '', NULL, 41, 0, 95, '', 0, 0, NULL, 1, 0, 6, '', '', '', ''),
(42, '园长寄语', '', '2016-04-16 22:22:52', '测试', '文章', NULL, 42, 0, 61, '', 0, 0, NULL, 1, 0, 7, '', '', '测试', '描述'),
(43, 'test', '', '2016-04-16 23:05:23', '', '', NULL, 43, 0, 0, '', 0, 1, '2016-04-16 23:11:33', 1, 0, 3, '', '', '', 'dyqer.cn'),
(44, '博山教体信息网', '', '2016-04-17 15:49:29', '', '', NULL, 44, 0, 0, '', 0, 0, NULL, 1, 0, 3, '', '', '', 'www.bsjy.net'),
(45, '淄博市教育局', '', '2016-04-17 15:50:00', '', '', NULL, 45, 0, 0, '', 0, 0, NULL, 1, 0, 3, '', '', '', 'www.zbedu.gov.cn'),
(46, '淄博市人民政府', '', '2016-04-17 15:51:11', '', '', NULL, 46, 0, 0, '', 0, 0, NULL, 1, 0, 3, '', '', '', 'www.zibo.gov.cn/'),
(47, '山东学前教育网', '', '2016-04-17 15:52:45', '', '', NULL, 47, 0, 0, '', 0, 0, NULL, 1, 0, 3, '', '', '', 'www.sdchild.com/'),
(48, '山东省教育厅', '', '2016-04-17 15:53:11', '', '', NULL, 48, 0, 0, '', 0, 0, NULL, 1, 0, 3, '', '', '', 'www.sdedu.gov.cn'),
(49, '中华人民共和国教育部', '', '2016-04-17 15:54:41', '', '', NULL, 49, 0, 0, '', 0, 0, NULL, 1, 0, 3, '', '', '', 'www.moe.gov.cn/');

-- --------------------------------------------------------

--
-- 表的结构 `mx_news_type`
--

CREATE TABLE IF NOT EXISTS `mx_news_type` (
  `c_id` int(10) unsigned NOT NULL COMMENT '编号',
  `c_title` varchar(255) CHARACTER SET gbk NOT NULL COMMENT '文章类别标题',
  `c_pid` int(4) NOT NULL DEFAULT '0' COMMENT '文章父类别编号',
  `c_datetime` datetime DEFAULT NULL COMMENT '添加日期',
  `c_content` text CHARACTER SET gbk COMMENT '类别说明',
  `c_sort_id` int(4) NOT NULL DEFAULT '0' COMMENT '类别排序',
  `lanmu` int(4) NOT NULL DEFAULT '0' COMMENT '所属栏目编号',
  `c_del` int(1) NOT NULL DEFAULT '0' COMMENT '是否删除',
  `c_del_time` datetime DEFAULT NULL COMMENT '删除时间'
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mx_news_type`
--

INSERT INTO `mx_news_type` (`c_id`, `c_title`, `c_pid`, `c_datetime`, `c_content`, `c_sort_id`, `lanmu`, `c_del`, `c_del_time`) VALUES
(1, '育儿知识', 0, '2013-12-17 18:46:34', '', 1, 1, 0, NULL),
(2, '保健常识', 0, '2013-12-17 18:49:29', '', 2, 1, 0, NULL),
(3, '友情链接', 0, '2016-03-07 11:11:35', '', 3, 13, 0, NULL),
(4, '园内课程', 0, '2016-04-15 10:44:23', '', 4, 1, 0, NULL),
(5, '园内公告', 0, '2016-04-15 10:56:23', '', 5, 1, 0, NULL),
(6, '园内食谱', 0, '2016-04-15 11:21:34', '', 6, 1, 0, NULL),
(7, '园长寄语', 0, '2016-04-15 16:49:15', '', 7, 1, 0, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `mx_pay_way`
--

CREATE TABLE IF NOT EXISTS `mx_pay_way` (
  `lc_id` int(4) NOT NULL COMMENT '编号',
  `lc_title` varchar(255) NOT NULL COMMENT '标题',
  `lc_zt` int(4) NOT NULL DEFAULT '0' COMMENT '状态（是否启用）'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `mx_products`
--

CREATE TABLE IF NOT EXISTS `mx_products` (
  `lc_id` int(11) NOT NULL COMMENT '编号',
  `lc_title` varchar(255) NOT NULL COMMENT '图文标题',
  `lc_pic` varchar(255) DEFAULT NULL COMMENT '图文图片',
  `lc_datetime` datetime DEFAULT NULL COMMENT '添加日期',
  `lc_content` text COMMENT '图文内容',
  `lc_jianjie` text COMMENT '图文简介',
  `lc_price` int(30) DEFAULT '0' COMMENT '价格',
  `lc_key` varchar(255) DEFAULT NULL COMMENT '关键字',
  `lc_sort_id` int(4) NOT NULL DEFAULT '0' COMMENT '排序序号',
  `lc_tj` int(4) NOT NULL DEFAULT '0' COMMENT '是否推荐(是为1)',
  `lc_hits` int(8) NOT NULL DEFAULT '0' COMMENT '点击率',
  `lc_from` varchar(255) DEFAULT NULL COMMENT '来源',
  `lc_url` varchar(100) DEFAULT NULL COMMENT '外部链接',
  `lc_phone` int(2) DEFAULT '1' COMMENT '是否手机版显示此条文章',
  `lc_del` int(2) DEFAULT '0' COMMENT '是否放入回收站',
  `lc_del_time` datetime DEFAULT NULL COMMENT '删除时间',
  `lc_zt` int(4) DEFAULT '1' COMMENT '是否发布',
  `lc_cant_del` int(4) DEFAULT NULL COMMENT '是否可删除',
  `c_id` int(4) NOT NULL DEFAULT '0' COMMENT '类别编号',
  `lc_phone_content` text COMMENT '手机版内容',
  `lc_keywords` varchar(100) DEFAULT NULL COMMENT '关键词',
  `lc_description` varchar(100) DEFAULT NULL COMMENT '描述'
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mx_products`
--

INSERT INTO `mx_products` (`lc_id`, `lc_title`, `lc_pic`, `lc_datetime`, `lc_content`, `lc_jianjie`, `lc_price`, `lc_key`, `lc_sort_id`, `lc_tj`, `lc_hits`, `lc_from`, `lc_url`, `lc_phone`, `lc_del`, `lc_del_time`, `lc_zt`, `lc_cant_del`, `c_id`, `lc_phone_content`, `lc_keywords`, `lc_description`) VALUES
(1, '首页banner', '', '2014-02-25 16:17:48', '', '', 0, NULL, 1, 1, 0, '', '', 0, 0, NULL, 0, 0, 3, '', '', ''),
(3, 'LCO-DL-0012', NULL, '2014-06-03 16:27:00', '', '', 0, NULL, 3, 0, 0, '', '', 1, 1, '2016-02-23 11:02:16', 1, 0, 2, NULL, '', ''),
(4, 'LCO-DL-0013', NULL, '2014-06-03 16:27:01', '', '', 0, NULL, 4, 0, 0, '', '', 1, 1, '2016-02-23 11:02:18', 1, 0, 2, NULL, '', ''),
(5, 'LCO-DL-0098', NULL, '2014-06-03 16:27:03', '', '', 0, NULL, 9, 1, 0, '', '', 1, 1, '2016-02-23 11:01:56', 1, 0, 2, NULL, '', ''),
(6, 'LCO-HLJ-0033', NULL, '2014-06-03 16:27:05', '', '', 0, NULL, 5, 0, 0, '', '', 1, 1, '2016-02-23 11:02:20', 1, 0, 2, NULL, '', ''),
(7, 'LCO-HLJ-0034', NULL, '2014-06-03 16:27:05', '', '', 0, NULL, 7, 1, 0, '', '', 1, 1, '2016-02-23 11:02:24', 1, 0, 2, NULL, '', ''),
(8, '20140603105505581', NULL, '2014-06-03 16:39:52', '', '', 0, NULL, 8, 1, 0, '', '', 1, 1, '2016-02-23 11:02:25', 1, 0, 2, NULL, '', ''),
(9, 'LCO-HLJ-0302', NULL, '2014-06-03 16:39:53', '', '', 0, NULL, 6, 0, 0, '', '', 1, 1, '2016-02-23 11:02:22', 1, 0, 2, NULL, '', ''),
(10, 'LCO-SX-0300', NULL, '2014-06-03 16:39:53', '<p style="text-align:center;" align="center">\r\n	<img src="../uploadfile/2014/06/20140610093554f.jpg" alt="" /> \r\n</p>\r\n<p style="text-align:center;" align="center">\r\n	<b>各销售战线精英齐聚冰城，共飨盛典</b> \r\n</p>\r\n<p style="text-align:center;" align="center">\r\n	<img src="../uploadfile/2014/06/20140610093558o.jpg" alt="" /> \r\n</p>\r\n<p class="MsoNormal" style="text-indent:21.0pt;" align="center">\r\n	<span>2014</span>年<span>4</span>月<span>8</span>日，以“新起点、新挑战、新征程”为主题的<span>2014</span>龙\r\n采科技集团销售战线会议在哈尔滨华融饭店隆重举行。龙采企业董事长 \r\n总裁杨国廷先生、龙采科技集团总裁张栋先生、龙采企业法务公关副总裁李忠兵女士、龙采科技集团客服副总裁单文斯女士、龙采科技集团大连管理区大区总经理王\r\n晓磊先生、黑龙江龙采企业管理咨询有限公司总经理兼龙采企业管理局财务顾问宋成雁女士、龙采科技集团技术副总裁姚响先生、龙采科技集团黑龙江管理区大区总\r\n经理曲萌女士等领导以及优秀的各销售战线代表共<span>200</span>余人参加了此次会议。 <span></span> \r\n</p>\r\n<div style="text-align:center;" align="center">\r\n	<img src="../uploadfile/2014/06/20140610093609a.jpg" alt="" /> \r\n</div>\r\n<p style="text-align:center;" align="center">\r\n	<span style="line-height:1.5;"> </span><b>杨老师致大会开幕辞</b> \r\n</p>\r\n<p align="center">\r\n	在热烈的掌声中，龙采企业董事长 总裁杨国廷先生致大会开幕辞，会议正式开始。\r\n</p>\r\n<div align="center">\r\n	<img src="../uploadfile/2014/06/201406100936106.jpg" alt="" /><br />\r\n</div>', '', 0, NULL, 10, 1, 0, '', '', 1, 1, '2016-02-23 11:01:55', 1, 0, 2, '', '', ''),
(11, '1', NULL, '2016-02-23 11:02:40', 'asdasd sa<br />', '', 0, NULL, 11, 0, 3, '', '', 0, 1, '2016-04-15 11:48:09', 1, 0, 4, '', '', ''),
(12, '12312321312321123', NULL, '2016-02-23 11:03:00', 'aasd asd<br />', '', 0, NULL, 12, 1, 0, '', '', 0, 1, '2016-02-27 10:08:07', 1, 0, 4, '', '', ''),
(13, '3', NULL, '2016-02-23 11:03:14', '12312312qwe', '', 0, NULL, 13, 1, 7, '', '', 0, 1, '2016-02-27 10:08:05', 1, 0, 4, '', '', ''),
(14, '4', NULL, '2016-02-23 11:03:31', 'sadsadsa', '', 0, NULL, 14, 1, 462, '', '', 0, 1, '2016-02-27 10:08:02', 1, 0, 4, '', '', ''),
(15, '123', NULL, '2016-02-25 14:29:28', 'sdada <br />', '', 0, NULL, 15, 0, 448, '', '', 0, 1, '2016-04-15 11:48:11', 1, 0, 4, '', '', ''),
(16, '天山茶庄绿叶', NULL, '2016-02-27 10:08:55', '', '', 0, NULL, 16, 1, 0, '', '', 0, 1, '2016-04-15 11:48:13', 1, 0, 4, '', '', '产品包装的精美和包装质量的保障，能够有效.'),
(17, '天山茶庄绿叶', NULL, '2016-02-27 10:09:23', '', '', 0, NULL, 17, 1, 8, '', '', 0, 1, '2016-04-15 11:48:21', 1, 0, 4, '', '', '产品包装的精美和包装质量的保障，能够有效.'),
(18, '副园长—刘 萍', NULL, '2016-02-27 10:09:48', '', '', 0, NULL, 33, 1, 0, '', '', 0, 0, NULL, 1, 0, 4, '', '', ''),
(23, '教师—国玉玺', NULL, '2016-04-15 11:13:29', '', '', 0, NULL, 26, 0, 0, '', '', 0, 0, NULL, 1, 0, 4, '', '', ''),
(19, '小二班', NULL, '2016-02-27 10:18:05', '', '', 0, NULL, 19, 0, 0, '', '', 0, 0, NULL, 1, 0, 5, '', '', ''),
(20, '小一班', NULL, '2016-02-27 10:18:27', '', '', 0, NULL, 20, 0, 0, '', '', 0, 0, NULL, 1, 0, 6, '', '', ''),
(32, '教师—陈晓倩', NULL, '2016-04-15 13:36:55', '', '', 0, NULL, 29, 0, 0, '', '', 0, 0, NULL, 1, 0, 4, '', '', ''),
(33, '生活教师—吕志弘', NULL, '2016-04-15 13:37:21', '', '', 0, NULL, 22, 0, 0, '', '', 0, 0, NULL, 1, 0, 4, '', '', ''),
(21, '园长—尹树玲', NULL, '2016-02-27 10:44:17', '', '图文简介', 0, NULL, 34, 0, 0, '', '', 0, 0, NULL, 1, 0, 4, '', '关键词', '描述'),
(24, '教师—焦艳霞', NULL, '2016-04-15 11:13:51', '', '', 0, NULL, 28, 0, 0, '', '', 0, 0, NULL, 1, 0, 4, '', '', ''),
(25, '教师—曲晓蒙', NULL, '2016-04-15 11:14:25', '', '', 0, NULL, 31, 0, 0, '', '', 0, 0, NULL, 1, 0, 4, '', '', ''),
(26, '教师—孙玉珠', NULL, '2016-04-15 11:14:47', '', '', 0, NULL, 27, 0, 0, '', '', 0, 0, NULL, 1, 0, 4, '', '', ''),
(22, '中小企业如何进行品牌建设，创业型企业如何构建品牌 ', NULL, '2016-02-27 10:44:39', '品牌构建，必须具备：1.理念，2.包装，3.产品或服务理念的传达，是为了精确消费者受众，准确传达产品或服务信息给受众', '品牌构建，必须具备：1.理念，2.包装，3.产品或服务理念的传达，是为了精确消费者受众，准确传达产品或服务信息给受众', 0, NULL, 23, 0, 16, '', '', 0, 1, '2016-04-15 11:18:42', 1, 0, 2, '', '', ''),
(27, '教师—王若伊', NULL, '2016-04-15 11:15:07', '', '', 0, NULL, 30, 0, 0, '', '', 0, 0, NULL, 1, 0, 4, '', '', ''),
(28, '教师—岳海燕', NULL, '2016-04-15 11:15:27', '', '', 0, NULL, 32, 0, 0, '', '', 0, 0, NULL, 1, 0, 4, '', '', ''),
(29, '生活教师—宋元莹', NULL, '2016-04-15 11:16:07', '', '', 0, NULL, 24, 0, 0, '', '', 0, 0, NULL, 1, 0, 4, '', '', ''),
(30, '生活教师—刑妍妍', NULL, '2016-04-15 11:16:26', '', '', 0, NULL, 21, 0, 0, '', '', 0, 0, NULL, 1, 0, 4, '', '', ''),
(31, '生活教师—刑妍妍', NULL, '2016-04-15 11:16:50', '', '', 0, NULL, 18, 0, 0, '', '', 0, 1, '2016-04-15 13:38:26', 1, 0, 4, '', '', ''),
(34, '生活教师—唐杰', NULL, '2016-04-15 13:38:08', '', '', 0, NULL, 25, 0, 0, '', '', 0, 0, NULL, 1, 0, 4, '', '', ''),
(35, '1', NULL, '2016-04-15 15:14:28', '', '', 0, NULL, 35, 0, 0, '', '', 0, 0, NULL, 1, 0, 2, '', '', ''),
(36, '2', NULL, '2016-04-15 15:20:47', '', '', 0, NULL, 36, 0, 0, '', '', 0, 0, NULL, 1, 0, 2, '', '', ''),
(37, '3', NULL, '2016-04-15 15:21:07', '', '', 0, NULL, 37, 0, 0, '', '', 0, 0, NULL, 1, 0, 2, '', '', ''),
(38, '4', NULL, '2016-04-15 15:21:19', '', '', 0, NULL, 38, 0, 0, '', '', 0, 0, NULL, 1, 0, 2, '', '', ''),
(39, '5', NULL, '2016-04-15 15:21:30', '', '', 0, NULL, 39, 0, 0, '', '', 0, 0, NULL, 1, 0, 2, '', '', ''),
(40, '6', NULL, '2016-04-15 15:21:43', '', '', 0, NULL, 40, 0, 0, '', '', 0, 0, NULL, 1, 0, 2, '', '', ''),
(41, '7', NULL, '2016-04-15 15:21:56', '', '', 0, NULL, 41, 0, 0, '', '', 0, 0, NULL, 1, 0, 2, '', '', ''),
(42, '8', NULL, '2016-04-15 15:22:08', '', '', 0, NULL, 42, 0, 0, '', '', 0, 0, NULL, 1, 0, 2, '', '', ''),
(43, '9', NULL, '2016-04-15 15:22:29', '', '', 0, NULL, 43, 0, 0, '', '', 0, 0, NULL, 1, 0, 2, '', '', ''),
(44, '10', NULL, '2016-04-15 15:22:43', '', '', 0, NULL, 44, 0, 0, '', '', 0, 0, NULL, 1, 0, 2, '', '', ''),
(45, '11', NULL, '2016-04-15 15:23:02', '', '', 0, NULL, 45, 0, 0, '', '', 0, 0, NULL, 1, 0, 2, '', '', ''),
(46, '12', NULL, '2016-04-15 15:23:27', '', '', 0, NULL, 46, 0, 0, '', '', 0, 0, NULL, 1, 0, 2, '', '', ''),
(47, '13', NULL, '2016-04-15 15:24:06', '', '', 0, NULL, 47, 0, 0, '', '', 0, 0, NULL, 1, 0, 2, '', '', ''),
(48, '15', NULL, '2016-04-15 15:24:51', '', '', 0, NULL, 48, 0, 0, '', '', 0, 0, NULL, 1, 0, 2, '', '', ''),
(49, '16', NULL, '2016-04-15 15:25:04', '', '', 0, NULL, 49, 0, 0, '', '', 0, 0, NULL, 1, 0, 2, '', '', ''),
(50, '17', NULL, '2016-04-15 15:25:17', '', '', 0, NULL, 50, 0, 0, '', '', 0, 0, NULL, 1, 0, 2, '', '', ''),
(51, '18', NULL, '2016-04-15 15:25:29', '', '', 0, NULL, 51, 0, 0, '', '', 0, 0, NULL, 1, 0, 2, '', '', ''),
(52, '19', NULL, '2016-04-15 15:25:46', '', '', 0, NULL, 52, 0, 0, '', '', 0, 0, NULL, 1, 0, 2, '', '', ''),
(53, '20', NULL, '2016-04-15 15:25:59', '', '', 0, NULL, 53, 0, 0, '', '', 0, 0, NULL, 1, 0, 2, '', '', ''),
(54, '21', NULL, '2016-04-15 15:26:17', '', '', 0, NULL, 54, 0, 0, '', '', 0, 0, NULL, 1, 0, 2, '', '', ''),
(55, '22', NULL, '2016-04-15 15:26:28', '', '', 0, NULL, 55, 0, 0, '', '', 0, 0, NULL, 1, 0, 2, '', '', ''),
(56, '23', NULL, '2016-04-15 15:26:45', '', '', 0, NULL, 56, 0, 0, '', '', 0, 0, NULL, 1, 0, 2, '', '', ''),
(57, '24', NULL, '2016-04-15 15:27:00', '', '', 0, NULL, 57, 0, 0, '', '', 0, 0, NULL, 1, 0, 2, '', '', ''),
(58, '25', NULL, '2016-04-15 15:27:11', '', '', 0, NULL, 58, 0, 0, '', '', 0, 0, NULL, 1, 0, 2, '', '', ''),
(59, '26', NULL, '2016-04-15 15:27:25', '', '', 0, NULL, 59, 0, 0, '', '', 0, 0, NULL, 1, 0, 2, '', '', ''),
(60, '27', NULL, '2016-04-15 15:27:38', '', '', 0, NULL, 60, 0, 0, '', '', 0, 0, NULL, 1, 0, 2, '', '', ''),
(61, '28', NULL, '2016-04-15 15:27:53', '', '', 0, NULL, 61, 0, 0, '', '', 0, 0, NULL, 1, 0, 2, '', '', ''),
(62, '菜园', NULL, '2016-04-15 15:28:11', '小菜园', '简介', 0, NULL, 62, 0, 0, '', '', 0, 0, NULL, 1, 0, 2, '', '好的', '描述'),
(63, '中班', NULL, '2016-04-15 17:11:17', '', '', 0, NULL, 63, 0, 0, '', '', 0, 0, NULL, 1, 0, 7, '', '', ''),
(64, '大班', NULL, '2016-04-15 17:11:28', '', '', 0, NULL, 64, 0, 0, '', '', 0, 0, NULL, 1, 0, 8, '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `mx_products_pics`
--

CREATE TABLE IF NOT EXISTS `mx_products_pics` (
  `lc_id` int(30) unsigned NOT NULL COMMENT '多图编号',
  `lc_pic` varchar(255) DEFAULT NULL COMMENT '图片路径',
  `lc_title` varchar(50) DEFAULT NULL COMMENT '图片标题',
  `lc_sort_id` int(5) NOT NULL DEFAULT '0' COMMENT '排序编号',
  `product_id` int(10) NOT NULL COMMENT '所属图文编号',
  `lc_fengmian` int(1) NOT NULL DEFAULT '0' COMMENT '是否为封面（1是封面图）'
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mx_products_pics`
--

INSERT INTO `mx_products_pics` (`lc_id`, `lc_pic`, `lc_title`, `lc_sort_id`, `product_id`, `lc_fengmian`) VALUES
(1, '../uploadfile/image/20140225/20140225081745_47032.png', NULL, 0, 1, 0),
(2, '../uploadfile/image/20140225/20140225081745_48693.jpg', NULL, 0, 1, 0),
(3, '../uploadfile/image/20140225/20140225081745_20285.png', NULL, 0, 1, 0),
(6, '../uploadfile/image/20140603/20140603070717_71688.jpg', NULL, 0, 2, 1),
(7, '../uploadfile/20140603/20140603082700_38907.jpg', NULL, 0, 3, 1),
(8, '../uploadfile/20140603/20140603082701_15322.jpg', NULL, 0, 4, 1),
(9, '../uploadfile/20140603/20140603082703_81287.jpg', NULL, 0, 5, 1),
(10, '../uploadfile/20140603/20140603082705_13779.jpg', NULL, 0, 6, 1),
(11, '../uploadfile/20140603/20140603082705_50849.jpg', NULL, 0, 7, 1),
(12, '../uploadfile/20140603/20140603083952_17640.jpg', NULL, 0, 8, 1),
(13, '../uploadfile/20140603/20140603083953_92087.jpg', NULL, 0, 9, 1),
(14, '../uploadfile/20140603/20140603083953_26556.jpg', NULL, 0, 10, 1),
(15, '../uploadfile/image/20160223/20160223030135_45499.png', NULL, 0, 10, 0),
(16, '../uploadfile/image/20160223/20160223030236_59833.png', NULL, 0, 11, 1),
(17, '../uploadfile/image/20160223/20160223030250_30810.jpg', NULL, 0, 12, 1),
(18, '../uploadfile/image/20160223/20160223030311_93743.jpg', NULL, 0, 13, 1),
(19, '../uploadfile/image/20160223/20160223030328_83383.jpg', NULL, 0, 14, 1),
(20, '../uploadfile/image/20160225/20160225062923_36444.jpg', NULL, 0, 15, 1),
(21, '../uploadfile/image/20160227/20160227020745_48073.jpg', NULL, 0, 14, 0),
(22, '../uploadfile/image/20160227/20160227020838_80320.jpg', NULL, 0, 16, 1),
(23, '../uploadfile/image/20160227/20160227020907_43398.jpg', NULL, 0, 17, 1),
(44, '../uploadfile/image/20160415/20160415152129_29577.jpg', NULL, 0, 39, 1),
(41, '../uploadfile/image/20160415/20160415152045_10955.jpg', NULL, 0, 36, 1),
(88, '../uploadfile/image/20160415/20160415171718_94759.jpg', NULL, 0, 34, 1),
(50, '../uploadfile/image/20160415/20160415152300_44392.jpg', NULL, 0, 45, 1),
(49, '../uploadfile/image/20160415/20160415152242_28190.jpg', NULL, 0, 44, 1),
(45, '../uploadfile/image/20160415/20160415152141_71122.jpg', NULL, 0, 40, 1),
(46, '../uploadfile/image/20160415/20160415152154_33582.jpg', NULL, 0, 41, 1),
(47, '../uploadfile/image/20160415/20160415152206_75783.jpg', NULL, 0, 42, 1),
(48, '../uploadfile/image/20160415/20160415152225_82877.jpg', NULL, 0, 43, 1),
(43, '../uploadfile/image/20160415/20160415152117_71839.jpg', NULL, 0, 38, 1),
(42, '../uploadfile/image/20160415/20160415152105_97036.jpg', NULL, 0, 37, 1),
(40, '../uploadfile/image/20160415/20160415151426_52072.jpg', NULL, 0, 35, 1),
(51, '../uploadfile/image/20160415/20160415152322_58578.jpg', NULL, 0, 46, 1),
(53, '../uploadfile/image/20160415/20160415152422_91721.jpg', NULL, 0, 47, 1),
(54, '../uploadfile/image/20160415/20160415152447_59809.jpg', NULL, 0, 48, 1),
(55, '../uploadfile/image/20160415/20160415152502_37119.jpg', NULL, 0, 49, 1),
(56, '../uploadfile/image/20160415/20160415152514_66513.jpg', NULL, 0, 50, 1),
(57, '../uploadfile/image/20160415/20160415152527_61256.jpg', NULL, 0, 51, 1),
(58, '../uploadfile/image/20160415/20160415152544_62520.jpg', NULL, 0, 52, 1),
(59, '../uploadfile/image/20160415/20160415152556_74454.jpg', NULL, 0, 53, 1),
(60, '../uploadfile/image/20160415/20160415152614_29923.jpg', NULL, 0, 54, 1),
(61, '../uploadfile/image/20160415/20160415152626_29341.jpg', NULL, 0, 55, 1),
(62, '../uploadfile/image/20160415/20160415152644_59671.jpg', NULL, 0, 56, 1),
(63, '../uploadfile/image/20160415/20160415152655_59713.jpg', NULL, 0, 57, 1),
(64, '../uploadfile/image/20160415/20160415152709_21115.jpg', NULL, 0, 58, 1),
(65, '../uploadfile/image/20160415/20160415152720_43453.jpg', NULL, 0, 59, 1),
(66, '../uploadfile/image/20160415/20160415152737_28432.jpg', NULL, 0, 60, 1),
(67, '../uploadfile/image/20160415/20160415152749_17679.jpg', NULL, 0, 61, 1),
(68, '../uploadfile/image/20160415/20160415152808_51937.jpg', NULL, 0, 62, 1),
(69, '../uploadfile/image/20160415/20160415153424_92540.jpg', NULL, 0, 21, 1),
(70, '../uploadfile/image/20160415/20160415153435_96602.jpg', NULL, 0, 18, 1),
(71, '../uploadfile/image/20160415/20160415153500_94721.jpg', NULL, 0, 32, 1),
(72, '../uploadfile/image/20160415/20160415153527_62555.jpg', NULL, 0, 28, 1),
(73, '../uploadfile/image/20160415/20160415153539_68191.jpg', NULL, 0, 27, 1),
(74, '../uploadfile/image/20160415/20160415153603_81773.jpg', NULL, 0, 26, 1),
(75, '../uploadfile/image/20160415/20160415153618_90831.jpg', NULL, 0, 25, 1),
(76, '../uploadfile/image/20160415/20160415153644_75374.jpg', NULL, 0, 24, 1),
(77, '../uploadfile/image/20160415/20160415153709_98165.jpg', NULL, 0, 23, 1),
(79, '../uploadfile/image/20160415/20160415153739_42371.jpg', NULL, 0, 33, 1),
(87, '../uploadfile/image/20160415/20160415171641_34246.jpg', NULL, 0, 30, 1),
(81, '../uploadfile/image/20160415/20160415153804_78722.jpg', NULL, 0, 29, 1),
(82, '../uploadfile/image/20160415/20160415171032_28061.jpg', NULL, 0, 20, 1),
(86, '../uploadfile/image/20160415/20160415171210_33774.jpg', NULL, 0, 19, 1),
(84, '../uploadfile/image/20160415/20160415171115_65835.jpg', NULL, 0, 63, 1),
(85, '../uploadfile/image/20160415/20160415171127_82982.jpg', NULL, 0, 64, 1);

-- --------------------------------------------------------

--
-- 表的结构 `mx_products_type`
--

CREATE TABLE IF NOT EXISTS `mx_products_type` (
  `c_id` int(10) unsigned NOT NULL COMMENT '编号',
  `c_title` varchar(255) NOT NULL COMMENT '图文类别标题',
  `c_pid` int(4) NOT NULL DEFAULT '0' COMMENT '图文父类别编号',
  `c_datetime` datetime DEFAULT NULL COMMENT '添加日期',
  `c_content` text COMMENT '类别说明',
  `c_sort_id` int(4) NOT NULL DEFAULT '0' COMMENT '类别排序',
  `lanmu` int(4) NOT NULL DEFAULT '0' COMMENT '所属栏目编号',
  `c_del` int(1) NOT NULL DEFAULT '0' COMMENT '是否删除',
  `c_del_time` datetime DEFAULT NULL COMMENT '删除时间'
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mx_products_type`
--

INSERT INTO `mx_products_type` (`c_id`, `c_title`, `c_pid`, `c_datetime`, `c_content`, `c_sort_id`, `lanmu`, `c_del`, `c_del_time`) VALUES
(1, '精彩瞬间', 0, '2013-12-20 09:25:08', '', 1, 2, 0, NULL),
(2, '园所活动', 0, '2013-12-20 09:25:25', '', 2, 2, 0, NULL),
(3, '首页banner', 0, '2014-02-25 16:17:11', '', 3, 7, 0, NULL),
(4, '教师风采', 0, '2014-06-03 16:22:55', '', 4, 2, 0, NULL),
(5, '小二班', 0, '2016-02-27 10:17:41', '', 5, 12, 0, NULL),
(6, '小一班', 0, '2016-03-05 10:49:44', '', 6, 12, 0, NULL),
(7, '中班', 0, '2016-04-15 12:00:11', '', 7, 12, 0, NULL),
(8, '大班', 0, '2016-04-15 12:00:19', '', 8, 12, 0, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `mx_session`
--

CREATE TABLE IF NOT EXISTS `mx_session` (
  `id` int(10) unsigned NOT NULL COMMENT '编号',
  `s_id` varchar(32) NOT NULL COMMENT 'session编号',
  `s_expired` int(11) NOT NULL COMMENT '是否过期',
  `s_value` text NOT NULL COMMENT 'session值'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `mx_sysevent`
--

CREATE TABLE IF NOT EXISTS `mx_sysevent` (
  `lc_id` int(11) unsigned NOT NULL COMMENT '信息id',
  `lc_uname` varchar(30) NOT NULL COMMENT '用户名',
  `lc_siteid` tinyint(1) unsigned NOT NULL COMMENT '站点id',
  `lc_model` varchar(30) NOT NULL COMMENT '操作模块',
  `lc_classid` int(10) unsigned NOT NULL COMMENT '栏目id',
  `lc_action` varchar(10) NOT NULL COMMENT '执行操作',
  `lc_posttime` int(10) NOT NULL COMMENT '操作时间',
  `lc_ip` varchar(20) NOT NULL COMMENT '操作ip'
) ENGINE=MyISAM AUTO_INCREMENT=907 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mx_sysevent`
--

INSERT INTO `mx_sysevent` (`lc_id`, `lc_uname`, `lc_siteid`, `lc_model`, `lc_classid`, `lc_action`, `lc_posttime`, `lc_ip`) VALUES
(1, 'admin', 0, 'login', 0, 'all', 1456125295, '127.0.0.1'),
(2, 'admin', 0, 'banner_list', 0, 'all', 1456125307, '127.0.0.1'),
(3, 'admin', 0, 'banner_edit', 0, 'all', 1456125310, '127.0.0.1'),
(4, 'admin', 0, 'banner_edit', 0, 'all', 1456125445, '127.0.0.1'),
(5, 'admin', 0, 'banner_list', 0, 'all', 1456125466, '127.0.0.1'),
(6, 'admin', 0, 'banner_edit', 0, 'all', 1456126084, '127.0.0.1'),
(7, 'admin', 0, 'news_list', 0, 'all', 1456126258, '127.0.0.1'),
(8, 'admin', 0, 'news_add', 0, 'all', 1456126259, '127.0.0.1'),
(9, 'admin', 0, 'banner_list', 0, 'all', 1456126531, '127.0.0.1'),
(10, 'admin', 0, 'banner_add', 0, 'all', 1456126533, '127.0.0.1'),
(11, 'admin', 0, 'banner_edit', 0, 'all', 1456126543, '127.0.0.1'),
(12, 'admin', 0, 'banner_list', 0, 'all', 1456126617, '127.0.0.1'),
(13, 'admin', 0, 'banner_edit', 0, 'all', 1456126618, '127.0.0.1'),
(14, 'admin', 0, 'nav_list', 0, 'all', 1456126643, '127.0.0.1'),
(15, 'admin', 0, 'banner_edit', 0, 'all', 1456126726, '127.0.0.1'),
(16, 'admin', 0, 'banner_add', 0, 'all', 1456126734, '127.0.0.1'),
(17, 'admin', 0, 'banner_edit', 0, 'all', 1456126825, '127.0.0.1'),
(18, 'admin', 0, 'banner_edit', 0, 'all', 1456126969, '127.0.0.1'),
(19, 'admin', 0, 'systemconfig', 0, 'all', 1456126986, '127.0.0.1'),
(20, 'admin', 0, 'banner_list', 0, 'all', 1456127615, '127.0.0.1'),
(21, 'admin', 0, 'banner_edit', 0, 'all', 1456127616, '127.0.0.1'),
(22, 'admin', 0, 'banner_edit', 0, 'all', 1456127679, '127.0.0.1'),
(23, 'admin', 0, 'products_list', 0, 'all', 1456128134, '127.0.0.1'),
(24, 'admin', 0, 'products_edit', 0, 'all', 1456128137, '127.0.0.1'),
(25, 'admin', 0, 'danye_list', 0, 'all', 1456128142, '127.0.0.1'),
(26, 'admin', 0, 'danye_add', 0, 'all', 1456128144, '127.0.0.1'),
(27, 'admin', 0, 'danye_add', 0, 'all', 1456128206, '127.0.0.1'),
(28, 'admin', 0, 'banner_list', 0, 'all', 1456128618, '127.0.0.1'),
(29, 'admin', 0, 'banner_edit', 0, 'all', 1456128620, '127.0.0.1'),
(30, 'admin', 0, 'login', 0, 'all', 1456196381, '127.0.0.1'),
(31, 'admin', 0, 'products_list', 0, 'all', 1456196384, '127.0.0.1'),
(32, 'admin', 0, 'products_type_list', 0, 'all', 1456196397, '127.0.0.1'),
(33, 'admin', 0, 'lanmu_list', 0, 'all', 1456196405, '127.0.0.1'),
(34, 'admin', 0, 'products_edit', 0, 'all', 1456196462, '127.0.0.1'),
(35, 'admin', 0, 'products_list', 0, 'all', 1456196510, '127.0.0.1'),
(36, 'admin', 0, 'products_add', 0, 'all', 1456196549, '127.0.0.1'),
(37, 'admin', 0, 'products_list', 0, 'all', 1456196583, '127.0.0.1'),
(38, 'admin', 0, 'products_add', 0, 'all', 1456196613, '127.0.0.1'),
(39, 'admin', 0, 'products_type_list', 0, 'all', 1456196622, '127.0.0.1'),
(40, '', 0, 'login', 0, 'all', 1456295459, '127.0.0.1'),
(41, 'admin', 0, 'login', 0, 'all', 1456295462, '127.0.0.1'),
(42, 'admin', 0, 'nav_list', 0, 'all', 1456295466, '127.0.0.1'),
(43, 'admin', 0, 'nav_add', 0, 'all', 1456295588, '127.0.0.1'),
(44, 'admin', 0, 'job_list', 0, 'all', 1456302092, '127.0.0.1'),
(45, 'admin', 0, 'job_edit', 0, 'all', 1456302094, '127.0.0.1'),
(46, 'admin', 0, 'job_add', 0, 'all', 1456304608, '127.0.0.1'),
(47, 'admin', 0, 'job_list', 0, 'all', 1456304613, '127.0.0.1'),
(48, 'admin', 0, 'login', 0, 'all', 1456379605, '127.0.0.1'),
(49, 'admin', 0, 'danye_list', 0, 'all', 1456379796, '127.0.0.1'),
(50, 'admin', 0, 'lanmu_list', 0, 'all', 1456379803, '127.0.0.1'),
(51, 'admin', 0, 'danye_edit', 0, 'all', 1456379855, '127.0.0.1'),
(52, 'admin', 0, 'danye_add', 0, 'all', 1456379867, '127.0.0.1'),
(53, 'admin', 0, 'danye_list', 0, 'all', 1456379873, '127.0.0.1'),
(54, 'admin', 0, 'lanmu_list', 0, 'all', 1456379983, '127.0.0.1'),
(55, 'admin', 0, 'nav_list', 0, 'all', 1456379992, '127.0.0.1'),
(56, 'admin', 0, 'danye_list', 0, 'all', 1456380078, '127.0.0.1'),
(57, 'admin', 0, 'danye_edit', 0, 'all', 1456380081, '127.0.0.1'),
(58, 'admin', 0, 'products_list', 0, 'all', 1456380367, '127.0.0.1'),
(59, 'admin', 0, 'products_type_list', 0, 'all', 1456380372, '127.0.0.1'),
(60, 'admin', 0, 'products_add', 0, 'all', 1456380377, '127.0.0.1'),
(61, 'admin', 0, 'products_list', 0, 'all', 1456380958, '127.0.0.1'),
(62, 'admin', 0, 'lanmu_list', 0, 'all', 1456380959, '127.0.0.1'),
(63, 'admin', 0, 'nav_list', 0, 'all', 1456381267, '127.0.0.1'),
(64, 'admin', 0, 'products_list', 0, 'all', 1456381735, '127.0.0.1'),
(65, 'admin', 0, 'products_add', 0, 'all', 1456381736, '127.0.0.1'),
(66, 'admin', 0, 'products_list', 0, 'all', 1456383661, '127.0.0.1'),
(67, 'admin', 0, 'nav_list', 0, 'all', 1456383664, '127.0.0.1'),
(68, 'admin', 0, 'gbook_list', 0, 'all', 1456383758, '127.0.0.1'),
(69, 'admin', 0, 'login', 0, 'all', 1456389750, '127.0.0.1'),
(70, 'admin', 0, 'danye_list', 0, 'all', 1456389755, '127.0.0.1'),
(71, 'admin', 0, 'danye_add', 0, 'all', 1456389756, '127.0.0.1'),
(72, 'admin', 0, 'lanmu_list', 0, 'all', 1456389815, '127.0.0.1'),
(73, 'admin', 0, 'danye_list', 0, 'all', 1456389868, '127.0.0.1'),
(74, 'admin', 0, 'danye_edit', 0, 'all', 1456389870, '127.0.0.1'),
(75, 'admin', 0, 'login', 0, 'all', 1456453948, '127.0.0.1'),
(76, 'admin', 0, 'lanmu_list', 0, 'all', 1456453953, '127.0.0.1'),
(77, 'admin', 0, 'danye_list', 0, 'all', 1456453963, '127.0.0.1'),
(78, 'admin', 0, 'danye_add', 0, 'all', 1456453964, '127.0.0.1'),
(79, 'admin', 0, 'danye_edit', 0, 'all', 1456454146, '127.0.0.1'),
(80, 'admin', 0, 'lanmu_list', 0, 'all', 1456454158, '127.0.0.1'),
(81, 'admin', 0, 'login', 0, 'all', 1456455675, '127.0.0.1'),
(82, '', 0, 'login', 0, 'all', 1456537131, '127.0.0.1'),
(83, 'admin', 0, 'login', 0, 'all', 1456537134, '127.0.0.1'),
(84, 'admin', 0, 'danye_list', 0, 'all', 1456537138, '127.0.0.1'),
(85, 'admin', 0, 'danye_edit', 0, 'all', 1456537143, '127.0.0.1'),
(86, 'admin', 0, 'danye_edit', 0, 'all', 1456537401, '127.0.0.1'),
(87, 'admin', 0, 'danye_list', 0, 'all', 1456537407, '127.0.0.1'),
(88, 'admin', 0, 'danye_add', 0, 'all', 1456537408, '127.0.0.1'),
(89, 'admin', 0, 'danye_add', 0, 'all', 1456537474, '127.0.0.1'),
(90, 'admin', 0, 'danye_list', 0, 'all', 1456537475, '127.0.0.1'),
(91, 'admin', 0, 'danye_add', 0, 'all', 1456537916, '127.0.0.1'),
(92, 'admin', 0, 'danye_list', 0, 'all', 1456537917, '127.0.0.1'),
(93, 'admin', 0, 'danye_list', 0, 'all', 1456538237, '127.0.0.1'),
(94, 'admin', 0, 'lanmu_list', 0, 'all', 1456538239, '127.0.0.1'),
(95, 'admin', 0, 'products_list', 0, 'all', 1456538661, '127.0.0.1'),
(96, 'admin', 0, 'products_type_list', 0, 'all', 1456538662, '127.0.0.1'),
(97, 'admin', 0, 'products_edit', 0, 'all', 1456538670, '127.0.0.1'),
(98, 'admin', 0, 'products_edit', 0, 'all', 1456538825, '127.0.0.1'),
(99, 'admin', 0, 'products_list', 0, 'all', 1456538874, '127.0.0.1'),
(100, 'admin', 0, 'products_add', 0, 'all', 1456538888, '127.0.0.1'),
(101, 'admin', 0, 'products_list', 0, 'all', 1456538938, '127.0.0.1'),
(102, 'admin', 0, 'products_add', 0, 'all', 1456538965, '127.0.0.1'),
(103, 'admin', 0, 'products_edit', 0, 'all', 1456539181, '127.0.0.1'),
(104, 'admin', 0, 'lanmu_list', 0, 'all', 1456539426, '127.0.0.1'),
(105, 'admin', 0, 'products_list', 0, 'all', 1456539450, '127.0.0.1'),
(106, 'admin', 0, 'products_add', 0, 'all', 1456539451, '127.0.0.1'),
(107, 'admin', 0, 'products_type_list', 0, 'all', 1456539453, '127.0.0.1'),
(108, 'admin', 0, 'products_type_add', 0, 'all', 1456539454, '127.0.0.1'),
(109, 'admin', 0, 'products_edit', 0, 'all', 1456539511, '127.0.0.1'),
(110, 'admin', 0, 'products_list', 0, 'all', 1456539523, '127.0.0.1'),
(111, 'admin', 0, 'lanmu_list', 0, 'all', 1456539529, '127.0.0.1'),
(112, 'admin', 0, 'news_list', 0, 'all', 1456539707, '127.0.0.1'),
(113, 'admin', 0, 'news_edit', 0, 'all', 1456539718, '127.0.0.1'),
(114, 'admin', 0, 'news_edit', 0, 'all', 1456539795, '127.0.0.1'),
(115, 'admin', 0, 'news_edit', 0, 'all', 1456539856, '127.0.0.1'),
(116, 'admin', 0, 'lanmu_list', 0, 'all', 1456540183, '127.0.0.1'),
(117, 'admin', 0, 'news_list', 0, 'all', 1456540188, '127.0.0.1'),
(118, 'admin', 0, 'news_list', 0, 'all', 1456540259, '127.0.0.1'),
(119, 'admin', 0, 'news_type_list', 0, 'all', 1456540260, '127.0.0.1'),
(120, 'admin', 0, 'danye_list', 0, 'all', 1456540641, '127.0.0.1'),
(121, 'admin', 0, 'danye_edit', 0, 'all', 1456540644, '127.0.0.1'),
(122, 'admin', 0, 'lanmu_list', 0, 'all', 1456540683, '127.0.0.1'),
(123, 'admin', 0, 'danye_list', 0, 'all', 1456540757, '127.0.0.1'),
(124, 'admin', 0, 'danye_list', 0, 'all', 1456540902, '127.0.0.1'),
(125, 'admin', 0, 'danye_add', 0, 'all', 1456540903, '127.0.0.1'),
(126, 'admin', 0, 'products_list', 0, 'all', 1456540993, '127.0.0.1'),
(127, 'admin', 0, 'products_type_list', 0, 'all', 1456541012, '127.0.0.1'),
(128, 'admin', 0, 'products_add', 0, 'all', 1456541026, '127.0.0.1'),
(129, 'admin', 0, 'products_list', 0, 'all', 1456541119, '127.0.0.1'),
(130, 'admin', 0, 'products_type_list', 0, 'all', 1456541253, '127.0.0.1'),
(131, 'admin', 0, 'news_list', 0, 'all', 1456541295, '127.0.0.1'),
(132, 'admin', 0, 'news_type_list', 0, 'all', 1456541295, '127.0.0.1'),
(133, 'admin', 0, 'products_list', 0, 'all', 1456541308, '127.0.0.1'),
(134, 'admin', 0, 'news_add', 0, 'all', 1456541335, '127.0.0.1'),
(135, 'admin', 0, 'news_list', 0, 'all', 1456541359, '127.0.0.1'),
(136, 'admin', 0, 'news_add', 0, 'all', 1456541407, '127.0.0.1'),
(137, 'admin', 0, 'news_list', 0, 'all', 1456541427, '127.0.0.1'),
(138, 'admin', 0, 'news_type_list', 0, 'all', 1456541429, '127.0.0.1'),
(139, 'admin', 0, 'news_list', 0, 'all', 1456541667, '127.0.0.1'),
(140, 'admin', 0, 'news_add', 0, 'all', 1456541672, '127.0.0.1'),
(141, 'admin', 0, 'products_list', 0, 'all', 1456541779, '127.0.0.1'),
(142, 'admin', 0, 'products_type_list', 0, 'all', 1456541783, '127.0.0.1'),
(143, 'admin', 0, 'lanmu_list', 0, 'all', 1456541787, '127.0.0.1'),
(144, 'admin', 0, 'nav_list', 0, 'all', 1456541791, '127.0.0.1'),
(145, 'admin', 0, 'lanmu_list', 0, 'all', 1456542901, '127.0.0.1'),
(146, 'admin', 0, 'systemconfig', 0, 'all', 1456542908, '127.0.0.1'),
(147, 'admin', 0, 'login', 0, 'all', 1456552138, '127.0.0.1'),
(148, 'admin', 0, 'news_list', 0, 'all', 1456552141, '127.0.0.1'),
(149, 'admin', 0, 'danye_list', 0, 'all', 1456552198, '127.0.0.1'),
(150, 'admin', 0, 'danye_edit', 0, 'all', 1456552201, '127.0.0.1'),
(151, 'admin', 0, 'danye_edit', 0, 'all', 1456552307, '127.0.0.1'),
(152, 'admin', 0, 'news_list', 0, 'all', 1456552625, '127.0.0.1'),
(153, 'admin', 0, 'news_type_list', 0, 'all', 1456552626, '127.0.0.1'),
(154, 'admin', 0, 'news_edit', 0, 'all', 1456552634, '127.0.0.1'),
(155, 'admin', 0, 'news_add', 0, 'all', 1456552641, '127.0.0.1'),
(156, 'admin', 0, 'news_add', 0, 'all', 1456552865, '127.0.0.1'),
(157, 'admin', 0, 'news_list', 0, 'all', 1456552921, '127.0.0.1'),
(158, 'admin', 0, 'news_add', 0, 'all', 1456552935, '127.0.0.1'),
(159, 'admin', 0, 'products_list', 0, 'all', 1456555308, '127.0.0.1'),
(160, 'admin', 0, 'lanmu_list', 0, 'all', 1456555322, '127.0.0.1'),
(161, 'admin', 0, 'news_list', 0, 'all', 1456555841, '127.0.0.1'),
(162, 'admin', 0, 'news_type_list', 0, 'all', 1456555847, '127.0.0.1'),
(163, 'admin', 0, 'login', 0, 'all', 1457146136, '45.23.50.84'),
(164, 'admin', 0, 'products_list', 0, 'all', 1457146157, '45.23.50.84'),
(165, 'admin', 0, 'products_type_list', 0, 'all', 1457146160, '45.23.50.84'),
(166, 'admin', 0, 'products_type_add', 0, 'all', 1457146178, '45.23.50.84'),
(167, 'admin', 0, 'products_list', 0, 'all', 1457146445, '45.23.50.84'),
(168, 'admin', 0, 'products_list', 0, 'all', 1457146693, '45.23.50.84'),
(169, 'admin', 0, 'lanmu_list', 0, 'all', 1457146694, '45.23.50.84'),
(170, 'admin', 0, 'products_list', 0, 'all', 1457146854, '45.23.50.84'),
(171, 'admin', 0, 'lanmu_list', 0, 'all', 1457146859, '45.23.50.84'),
(172, 'admin', 0, 'products_type_list', 0, 'all', 1457146872, '45.23.50.84'),
(173, 'admin', 0, 'lanmu_list', 0, 'all', 1457147012, '45.23.50.84'),
(174, 'admin', 0, 'login', 0, 'all', 1457157825, '127.0.0.1'),
(175, 'admin', 0, 'danye_list', 0, 'all', 1457157845, '127.0.0.1'),
(176, 'admin', 0, 'banner_list', 0, 'all', 1457157849, '127.0.0.1'),
(177, 'admin', 0, 'banner_add', 0, 'all', 1457157852, '127.0.0.1'),
(178, 'admin', 0, 'banner_type_list', 0, 'all', 1457157855, '127.0.0.1'),
(179, 'admin', 0, 'banner_type_add', 0, 'all', 1457157856, '127.0.0.1'),
(180, 'admin', 0, 'login', 0, 'all', 1457318825, '127.0.0.1'),
(181, 'admin', 0, 'nav_list', 0, 'all', 1457318836, '127.0.0.1'),
(182, 'admin', 0, 'banner_list', 0, 'all', 1457318836, '127.0.0.1'),
(183, 'admin', 0, 'banner_edit', 0, 'all', 1457318840, '127.0.0.1'),
(184, 'admin', 0, 'login', 0, 'all', 1457319280, '45.23.50.84'),
(185, 'admin', 0, 'danye_list', 0, 'all', 1457319286, '45.23.50.84'),
(186, 'admin', 0, 'danye_edit', 0, 'all', 1457319289, '45.23.50.84'),
(187, 'admin', 0, 'lanmu_list', 0, 'all', 1457319292, '45.23.50.84'),
(188, 'admin', 0, 'products_list', 0, 'all', 1457319632, '127.0.0.1'),
(189, 'admin', 0, 'products_type_list', 0, 'all', 1457319636, '127.0.0.1'),
(190, 'admin', 0, 'nav_list', 0, 'all', 1457319783, '127.0.0.1'),
(191, 'admin', 0, 'danye_list', 0, 'all', 1457320178, '45.23.50.84'),
(192, 'admin', 0, 'danye_edit', 0, 'all', 1457320192, '45.23.50.84'),
(193, 'admin', 0, 'news_list', 0, 'all', 1457320286, '45.23.50.84'),
(194, 'admin', 0, 'news_type_list', 0, 'all', 1457320287, '45.23.50.84'),
(195, 'admin', 0, 'news_type_add', 0, 'all', 1457320288, '45.23.50.84'),
(196, 'admin', 0, 'news_add', 0, 'all', 1457320297, '45.23.50.84'),
(197, 'admin', 0, 'news_edit', 0, 'all', 1457320335, '45.23.50.84'),
(198, 'admin', 0, 'news_add', 0, 'all', 1457320362, '45.23.50.84'),
(199, 'admin', 0, 'news_list', 0, 'all', 1457320363, '45.23.50.84'),
(200, 'admin', 0, 'news_list', 0, 'all', 1457321727, '127.0.0.1'),
(201, 'admin', 0, 'news_type_list', 0, 'all', 1457321733, '45.23.50.84'),
(202, 'admin', 0, 'lanmu_list', 0, 'all', 1457321748, '45.23.50.84'),
(203, 'admin', 0, 'lanmu_list', 0, 'all', 1457322153, '127.0.0.1'),
(204, 'admin', 0, 'banner_list', 0, 'all', 1457322645, '127.0.0.1'),
(205, 'admin', 0, 'banner_edit', 0, 'all', 1457322647, '127.0.0.1'),
(206, 'admin', 0, 'banner_type_list', 0, 'all', 1457322705, '127.0.0.1'),
(207, 'admin', 0, 'banner_list', 0, 'all', 1457322710, '127.0.0.1'),
(208, 'admin', 0, 'banner_edit', 0, 'all', 1457322713, '127.0.0.1'),
(209, 'admin', 0, 'banner_edit', 0, 'all', 1457322774, '127.0.0.1'),
(210, 'admin', 0, 'news_list', 0, 'all', 1457327563, '127.0.0.1'),
(211, 'admin', 0, 'news_type_list', 0, 'all', 1457327564, '127.0.0.1'),
(212, 'admin', 0, 'lanmu_list', 0, 'all', 1457327566, '127.0.0.1'),
(213, 'admin', 0, 'news_list', 0, 'all', 1457327706, '127.0.0.1'),
(214, 'admin', 0, 'news_edit', 0, 'all', 1457327708, '127.0.0.1'),
(215, 'admin', 0, 'danye_list', 0, 'all', 1457331145, '127.0.0.1'),
(216, 'admin', 0, 'login', 0, 'all', 1457331757, '45.23.50.63'),
(217, 'admin', 0, 'danye_list', 0, 'all', 1457331766, '45.23.50.63'),
(218, 'admin', 0, 'danye_edit', 0, 'all', 1457331769, '45.23.50.63'),
(219, 'admin', 0, 'news_list', 0, 'all', 1457331831, '45.23.50.63'),
(220, 'admin', 0, 'products_list', 0, 'all', 1457331835, '45.23.50.63'),
(221, 'admin', 0, 'lanmu_list', 0, 'all', 1457331839, '45.23.50.63'),
(222, 'admin', 0, 'login', 0, 'all', 1457331972, '45.23.50.63'),
(223, 'admin', 0, 'jianli_list', 0, 'all', 1457331972, '45.23.50.63'),
(224, 'admin', 0, 'lanmu_list', 0, 'all', 1457331976, '45.23.50.63'),
(225, 'admin', 0, 'lanmu_list', 0, 'all', 1457332081, '45.23.50.63'),
(226, 'admin', 0, 'touchconfig', 0, 'all', 1457332101, '45.23.50.63'),
(227, 'admin', 0, 'news_list', 0, 'all', 1457332109, '45.23.50.63'),
(228, 'admin', 0, 'down_list', 0, 'all', 1457332116, '45.23.50.63'),
(229, 'admin', 0, 'products_list', 0, 'all', 1457332180, '127.0.0.1'),
(230, 'admin', 0, 'login', 0, 'all', 1460683580, '122.81.247.110'),
(231, 'admin', 0, 'products_list', 0, 'all', 1460683764, '122.81.247.110'),
(232, 'admin', 0, 'products_type_list', 0, 'all', 1460683766, '122.81.247.110'),
(233, 'admin', 0, 'lanmu_list', 0, 'all', 1460683783, '122.81.247.110'),
(234, 'admin', 0, 'nav_list', 0, 'all', 1460683801, '122.81.247.110'),
(235, 'admin', 0, 'nav_edit', 0, 'all', 1460683803, '122.81.247.110'),
(236, 'admin', 0, 'nav_edit', 0, 'all', 1460683880, '122.81.247.110'),
(237, 'admin', 0, 'lanmu_list', 0, 'all', 1460683910, '122.81.247.110'),
(238, 'admin', 0, 'nav_list', 0, 'all', 1460683962, '122.81.247.110'),
(239, 'admin', 0, 'nav_edit', 0, 'all', 1460683983, '122.81.247.110'),
(240, 'admin', 0, 'lanmu_list', 0, 'all', 1460683992, '122.81.247.110'),
(241, 'admin', 0, 'lanmu_list', 0, 'all', 1460684057, '122.81.247.110'),
(242, 'admin', 0, 'nav_list', 0, 'all', 1460684095, '122.81.247.110'),
(243, 'admin', 0, 'nav_edit', 0, 'all', 1460684098, '122.81.247.110'),
(244, 'admin', 0, 'lanmu_list', 0, 'all', 1460684159, '122.81.247.110'),
(245, 'admin', 0, 'products_list', 0, 'all', 1460684191, '122.81.247.110'),
(246, 'admin', 0, 'products_add', 0, 'all', 1460684196, '122.81.247.110'),
(247, 'admin', 0, 'nav_list', 0, 'all', 1460684245, '122.81.247.110'),
(248, 'admin', 0, 'nav_edit', 0, 'all', 1460684251, '122.81.247.110'),
(249, 'admin', 0, 'nav_list', 0, 'all', 1460684363, '122.81.247.110'),
(250, 'admin', 0, 'danye_list', 0, 'all', 1460684467, '122.81.247.110'),
(251, 'admin', 0, 'danye_edit', 0, 'all', 1460684470, '122.81.247.110'),
(252, 'admin', 0, 'danye_edit', 0, 'all', 1460684541, '122.81.247.110'),
(253, 'admin', 0, 'danye_edit', 0, 'all', 1460684675, '122.81.247.110'),
(254, 'admin', 0, 'danye_list', 0, 'all', 1460684797, '122.81.247.110'),
(255, 'admin', 0, 'danye_add', 0, 'all', 1460684800, '122.81.247.110'),
(256, 'admin', 0, 'danye_edit', 0, 'all', 1460684871, '122.81.247.110'),
(257, 'admin', 0, 'danye_list', 0, 'all', 1460685041, '122.81.247.110'),
(258, 'admin', 0, 'danye_edit', 0, 'all', 1460685042, '122.81.247.110'),
(259, 'admin', 0, 'bot_edit', 0, 'all', 1460685047, '122.81.247.110'),
(260, 'admin', 0, 'danye_list', 0, 'all', 1460685151, '122.81.247.110'),
(261, 'admin', 0, 'danye_edit', 0, 'all', 1460685152, '122.81.247.110'),
(262, 'admin', 0, 'danye_edit', 0, 'all', 1460685261, '122.81.247.110'),
(263, 'admin', 0, 'danye_edit', 0, 'all', 1460685322, '122.81.247.110'),
(264, 'admin', 0, 'touchconfig', 0, 'all', 1460685690, '122.81.247.110'),
(265, 'admin', 0, 'lanmu_list', 0, 'all', 1460685693, '122.81.247.110'),
(266, 'admin', 0, 'products_list', 0, 'all', 1460685735, '122.81.247.110'),
(267, 'admin', 0, 'nav_list', 0, 'all', 1460685752, '122.81.247.110'),
(268, 'admin', 0, 'nav_edit', 0, 'all', 1460685756, '122.81.247.110'),
(269, 'admin', 0, 'nav_edit', 0, 'all', 1460685877, '122.81.247.110'),
(270, 'admin', 0, 'lanmu_list', 0, 'all', 1460685887, '122.81.247.110'),
(271, 'admin', 0, 'nav_list', 0, 'all', 1460685951, '122.81.247.110'),
(272, 'admin', 0, 'nav_edit', 0, 'all', 1460685954, '122.81.247.110'),
(273, 'admin', 0, 'nav_list', 0, 'all', 1460686367, '122.81.247.110'),
(274, 'admin', 0, 'nav_edit', 0, 'all', 1460686371, '122.81.247.110'),
(275, 'admin', 0, 'lanmu_list', 0, 'all', 1460686374, '122.81.247.110'),
(276, 'admin', 0, 'danye_list', 0, 'all', 1460686675, '122.81.247.110'),
(277, 'admin', 0, 'danye_edit', 0, 'all', 1460686681, '122.81.247.110'),
(278, 'admin', 0, 'danye_add', 0, 'all', 1460686865, '122.81.247.110'),
(279, 'admin', 0, 'lanmu_list', 0, 'all', 1460686936, '122.81.247.110'),
(280, 'admin', 0, 'nav_list', 0, 'all', 1460686957, '122.81.247.110'),
(281, 'admin', 0, 'nav_edit', 0, 'all', 1460686965, '122.81.247.110'),
(282, 'admin', 0, 'lanmu_list', 0, 'all', 1460687023, '122.81.247.110'),
(283, 'admin', 0, 'products_list', 0, 'all', 1460687040, '122.81.247.110'),
(284, 'admin', 0, 'products_type_list', 0, 'all', 1460687043, '122.81.247.110'),
(285, 'admin', 0, 'nav_list', 0, 'all', 1460687052, '122.81.247.110'),
(286, 'admin', 0, 'nav_list', 0, 'all', 1460687172, '122.81.247.110'),
(287, 'admin', 0, 'lanmu_list', 0, 'all', 1460687273, '122.81.247.110'),
(288, 'admin', 0, 'danye_list', 0, 'all', 1460687519, '122.81.247.110'),
(289, 'admin', 0, 'danye_edit', 0, 'all', 1460687523, '122.81.247.110'),
(290, 'admin', 0, 'news_list', 0, 'all', 1460687600, '122.81.247.110'),
(291, 'admin', 0, 'news_type_list', 0, 'all', 1460687605, '122.81.247.110'),
(292, 'admin', 0, 'news_edit', 0, 'all', 1460687630, '122.81.247.110'),
(293, 'admin', 0, 'news_list', 0, 'all', 1460687687, '122.81.247.110'),
(294, 'admin', 0, 'news_edit', 0, 'all', 1460687745, '122.81.247.110'),
(295, 'admin', 0, 'news_add', 0, 'all', 1460687821, '122.81.247.110'),
(296, 'admin', 0, 'news_type_list', 0, 'all', 1460687823, '122.81.247.110'),
(297, 'admin', 0, 'news_list', 0, 'all', 1460687827, '122.81.247.110'),
(298, 'admin', 0, 'news_add', 0, 'all', 1460687884, '122.81.247.110'),
(299, 'admin', 0, 'news_list', 0, 'all', 1460687922, '122.81.247.110'),
(300, 'admin', 0, 'news_list', 0, 'all', 1460688106, '122.81.247.110'),
(301, 'admin', 0, 'news_add', 0, 'all', 1460688136, '122.81.247.110'),
(302, 'admin', 0, 'news_edit', 0, 'all', 1460688166, '122.81.247.110'),
(303, 'admin', 0, 'news_list', 0, 'all', 1460688228, '122.81.247.110'),
(304, 'admin', 0, 'news_edit', 0, 'all', 1460688230, '122.81.247.110'),
(305, 'admin', 0, 'news_type_list', 0, 'all', 1460688255, '122.81.247.110'),
(306, 'admin', 0, 'news_type_add', 0, 'all', 1460688256, '122.81.247.110'),
(307, 'admin', 0, 'news_add', 0, 'all', 1460688266, '122.81.247.110'),
(308, 'admin', 0, 'news_list', 0, 'all', 1460688497, '122.81.247.110'),
(309, 'admin', 0, 'news_add', 0, 'all', 1460688554, '122.81.247.110'),
(310, 'admin', 0, 'news_list', 0, 'all', 1460688589, '122.81.247.110'),
(311, 'admin', 0, 'news_list', 0, 'all', 1460688651, '122.81.247.110'),
(312, 'admin', 0, 'news_add', 0, 'all', 1460688653, '122.81.247.110'),
(313, 'admin', 0, 'news_list', 0, 'all', 1460688743, '122.81.247.110'),
(314, 'admin', 0, 'news_add', 0, 'all', 1460688745, '122.81.247.110'),
(315, 'admin', 0, 'news_list', 0, 'all', 1460688824, '122.81.247.110'),
(316, 'admin', 0, 'news_add', 0, 'all', 1460688826, '122.81.247.110'),
(317, 'admin', 0, 'news_list', 0, 'all', 1460688894, '122.81.247.110'),
(318, 'admin', 0, 'news_add', 0, 'all', 1460688895, '122.81.247.110'),
(319, 'admin', 0, 'news_type_list', 0, 'all', 1460688976, '122.81.247.110'),
(320, 'admin', 0, 'news_type_add', 0, 'all', 1460688977, '122.81.247.110'),
(321, 'admin', 0, 'products_list', 0, 'all', 1460689033, '122.81.247.110'),
(322, 'admin', 0, 'products_type_list', 0, 'all', 1460689044, '122.81.247.110'),
(323, 'admin', 0, 'nav_list', 0, 'all', 1460689061, '122.81.247.110'),
(324, 'admin', 0, 'nav_edit', 0, 'all', 1460689067, '122.81.247.110'),
(325, 'admin', 0, 'lanmu_list', 0, 'all', 1460689128, '122.81.247.110'),
(326, 'admin', 0, 'nav_list', 0, 'all', 1460689487, '122.81.247.110'),
(327, 'admin', 0, 'products_list', 0, 'all', 1460689518, '122.81.247.110'),
(328, 'admin', 0, 'products_type_list', 0, 'all', 1460689520, '122.81.247.110'),
(329, 'admin', 0, 'products_add', 0, 'all', 1460689529, '122.81.247.110'),
(330, 'admin', 0, 'products_edit', 0, 'all', 1460689532, '122.81.247.110'),
(331, 'admin', 0, 'products_add', 0, 'all', 1460689621, '122.81.247.110'),
(332, 'admin', 0, 'products_edit', 0, 'all', 1460689627, '122.81.247.110'),
(333, 'admin', 0, 'products_edit', 0, 'all', 1460689698, '122.81.247.110'),
(334, 'admin', 0, 'products_edit', 0, 'all', 1460689792, '122.81.247.110'),
(335, 'admin', 0, 'products_list', 0, 'all', 1460689823, '122.81.247.110'),
(336, 'admin', 0, 'products_edit', 0, 'all', 1460689854, '122.81.247.110'),
(337, 'admin', 0, 'products_list', 0, 'all', 1460689913, '122.81.247.110'),
(338, 'admin', 0, 'products_edit', 0, 'all', 1460689920, '122.81.247.110'),
(339, 'admin', 0, 'products_edit', 0, 'all', 1460689983, '122.81.247.110'),
(340, 'admin', 0, 'products_add', 0, 'all', 1460689986, '122.81.247.110'),
(341, 'admin', 0, 'products_list', 0, 'all', 1460690011, '122.81.247.110'),
(342, 'admin', 0, 'products_add', 0, 'all', 1460690069, '122.81.247.110'),
(343, 'admin', 0, 'products_list', 0, 'all', 1460690088, '122.81.247.110'),
(344, 'admin', 0, 'products_add', 0, 'all', 1460690146, '122.81.247.110'),
(345, 'admin', 0, 'products_list', 0, 'all', 1460690168, '122.81.247.110'),
(346, 'admin', 0, 'products_add', 0, 'all', 1460690213, '122.81.247.110'),
(347, 'admin', 0, 'products_edit', 0, 'all', 1460690281, '122.81.247.110'),
(348, 'admin', 0, 'products_type_list', 0, 'all', 1460690351, '122.81.247.110'),
(349, 'admin', 0, 'products_list', 0, 'all', 1460690378, '122.81.247.110'),
(350, 'admin', 0, 'news_list', 0, 'all', 1460690484, '122.81.247.110'),
(351, 'admin', 0, 'news_type_list', 0, 'all', 1460690486, '122.81.247.110'),
(352, 'admin', 0, 'news_type_add', 0, 'all', 1460690487, '122.81.247.110'),
(353, 'admin', 0, 'news_add', 0, 'all', 1460690496, '122.81.247.110'),
(354, 'admin', 0, 'news_list', 0, 'all', 1460690728, '122.81.247.110'),
(355, 'admin', 0, 'news_edit', 0, 'all', 1460690748, '122.81.247.110'),
(356, 'admin', 0, 'news_edit', 0, 'all', 1460690825, '122.81.247.110'),
(357, 'admin', 0, 'news_list', 0, 'all', 1460690954, '122.81.247.110'),
(358, 'admin', 0, 'danye_list', 0, 'all', 1460690986, '122.81.247.110'),
(359, 'admin', 0, 'user_list', 0, 'all', 1460690993, '122.81.247.110'),
(360, 'admin', 0, 'banner_list', 0, 'all', 1460690998, '122.81.247.110'),
(361, 'admin', 0, 'nav_list', 0, 'all', 1460691003, '122.81.247.110'),
(362, 'admin', 0, 'nav_edit', 0, 'all', 1460691007, '122.81.247.110'),
(363, 'admin', 0, 'job_list', 0, 'all', 1460691025, '122.81.247.110'),
(364, 'admin', 0, 'jianli_list', 0, 'all', 1460691030, '122.81.247.110'),
(365, 'admin', 0, 'danye_list', 0, 'all', 1460691453, '122.81.247.110'),
(366, 'admin', 0, 'danye_edit', 0, 'all', 1460691488, '122.81.247.110'),
(367, 'admin', 0, 'news_list', 0, 'all', 1460691505, '122.81.247.110'),
(368, 'admin', 0, 'news_type_list', 0, 'all', 1460691516, '122.81.247.110'),
(369, 'admin', 0, 'news_list', 0, 'all', 1460691606, '122.81.247.110'),
(370, 'admin', 0, 'products_list', 0, 'all', 1460691608, '122.81.247.110'),
(371, 'admin', 0, 'lanmu_list', 0, 'all', 1460691891, '122.81.247.110'),
(372, 'admin', 0, 'danye_list', 0, 'all', 1460691905, '122.81.247.110'),
(373, 'admin', 0, 'danye_edit', 0, 'all', 1460691913, '122.81.247.110'),
(374, 'admin', 0, 'news_list', 0, 'all', 1460691963, '122.81.247.110'),
(375, 'admin', 0, 'products_list', 0, 'all', 1460692039, '122.81.247.110'),
(376, 'admin', 0, 'products_list', 0, 'all', 1460692173, '122.81.247.110'),
(377, 'admin', 0, 'products_type_list', 0, 'all', 1460692235, '122.81.247.110'),
(378, 'admin', 0, 'products_list', 0, 'all', 1460692238, '122.81.247.110'),
(379, 'admin', 0, 'news_list', 0, 'all', 1460692264, '122.81.247.110'),
(380, 'admin', 0, 'news_type_list', 0, 'all', 1460692266, '122.81.247.110'),
(381, 'admin', 0, 'news_add', 0, 'all', 1460692268, '122.81.247.110'),
(382, 'admin', 0, 'danye_list', 0, 'all', 1460692327, '122.81.247.110'),
(383, 'admin', 0, 'lanmu_list', 0, 'all', 1460692408, '122.81.247.110'),
(384, 'admin', 0, 'danye_list', 0, 'all', 1460692424, '122.81.247.110'),
(385, 'admin', 0, 'nav_list', 0, 'all', 1460692428, '122.81.247.110'),
(386, 'admin', 0, 'banner_list', 0, 'all', 1460692495, '122.81.247.110'),
(387, 'admin', 0, 'logo_edit', 0, 'all', 1460692496, '122.81.247.110'),
(388, 'admin', 0, 'friendlink_list', 0, 'all', 1460692498, '122.81.247.110'),
(389, 'admin', 0, 'bot_edit', 0, 'all', 1460692505, '122.81.247.110'),
(390, 'admin', 0, 'field_list', 0, 'all', 1460692510, '122.81.247.110'),
(391, 'admin', 0, 'systemconfig', 0, 'all', 1460692525, '122.81.247.110'),
(392, 'admin', 0, 'touchconfig', 0, 'all', 1460692536, '122.81.247.110'),
(393, 'admin', 0, 'danye_list', 0, 'all', 1460692540, '122.81.247.110'),
(394, 'admin', 0, 'danye_edit', 0, 'all', 1460692559, '122.81.247.110'),
(395, 'admin', 0, 'products_list', 0, 'all', 1460692673, '122.81.247.110'),
(396, 'admin', 0, 'products_type_list', 0, 'all', 1460692675, '122.81.247.110'),
(397, 'admin', 0, 'products_type_edit', 0, 'all', 1460692677, '122.81.247.110'),
(398, 'admin', 0, 'products_edit', 0, 'all', 1460692682, '122.81.247.110'),
(399, 'admin', 0, 'products_list', 0, 'all', 1460692789, '122.81.247.110'),
(400, 'admin', 0, 'products_edit', 0, 'all', 1460692792, '122.81.247.110'),
(401, 'admin', 0, 'products_type_list', 0, 'all', 1460692796, '122.81.247.110'),
(402, 'admin', 0, 'products_type_add', 0, 'all', 1460692806, '122.81.247.110'),
(403, 'admin', 0, 'products_edit', 0, 'all', 1460692943, '122.81.247.110'),
(404, 'admin', 0, 'products_list', 0, 'all', 1460697988, '122.81.247.110'),
(405, 'admin', 0, 'products_edit', 0, 'all', 1460698309, '122.81.247.110'),
(406, 'admin', 0, 'products_list', 0, 'all', 1460698327, '122.81.247.110'),
(407, 'admin', 0, 'products_edit', 0, 'all', 1460698377, '122.81.247.110'),
(408, 'admin', 0, 'products_list', 0, 'all', 1460698399, '122.81.247.110'),
(409, 'admin', 0, 'products_add', 0, 'all', 1460698596, '122.81.247.110'),
(410, 'admin', 0, 'products_list', 0, 'all', 1460698617, '122.81.247.110'),
(411, 'admin', 0, 'products_add', 0, 'all', 1460698677, '122.81.247.110'),
(412, 'admin', 0, 'products_list', 0, 'all', 1460698689, '122.81.247.110'),
(413, 'admin', 0, 'products_type_list', 0, 'all', 1460698727, '122.81.247.110'),
(414, 'admin', 0, 'danye_list', 0, 'all', 1460698765, '122.81.247.110'),
(415, 'admin', 0, 'products_list', 0, 'all', 1460699126, '122.81.247.110'),
(416, 'admin', 0, 'nav_list', 0, 'all', 1460699145, '122.81.247.110'),
(417, 'admin', 0, 'nav_edit', 0, 'all', 1460699192, '122.81.247.110'),
(418, 'admin', 0, 'lanmu_list', 0, 'all', 1460699200, '122.81.247.110'),
(419, 'admin', 0, 'lanmu_list', 0, 'all', 1460699262, '122.81.247.110'),
(420, 'admin', 0, 'lanmu_list', 0, 'all', 1460700205, '122.81.247.110'),
(421, 'admin', 0, 'nav_list', 0, 'all', 1460700209, '122.81.247.110'),
(422, 'admin', 0, 'nav_edit', 0, 'all', 1460700218, '122.81.247.110'),
(423, 'admin', 0, 'products_list', 0, 'all', 1460700730, '122.81.247.110'),
(424, 'admin', 0, 'products_type_list', 0, 'all', 1460700738, '122.81.247.110'),
(425, 'admin', 0, 'products_edit', 0, 'all', 1460700755, '122.81.247.110'),
(426, 'admin', 0, 'touchconfig', 0, 'all', 1460700925, '122.81.247.110'),
(427, 'admin', 0, 'danye_list', 0, 'all', 1460700928, '122.81.247.110'),
(428, 'admin', 0, 'danye_edit', 0, 'all', 1460700932, '122.81.247.110'),
(429, 'admin', 0, 'lanmu_list', 0, 'all', 1460701240, '122.81.247.110'),
(430, 'admin', 0, 'danye_list', 0, 'all', 1460701243, '122.81.247.110'),
(431, 'admin', 0, 'danye_edit', 0, 'all', 1460701246, '122.81.247.110'),
(432, 'admin', 0, 'nav_list', 0, 'all', 1460701523, '122.81.247.110'),
(433, 'admin', 0, 'nav_edit', 0, 'all', 1460701622, '122.81.247.110'),
(434, 'admin', 0, 'nav_list', 0, 'all', 1460701669, '122.81.247.110'),
(435, 'admin', 0, 'banner_list', 0, 'all', 1460701673, '122.81.247.110'),
(436, 'admin', 0, 'products_list', 0, 'all', 1460701755, '122.81.247.110'),
(437, 'admin', 0, 'products_type_list', 0, 'all', 1460701766, '122.81.247.110'),
(438, 'admin', 0, 'products_type_list', 0, 'all', 1460701962, '122.81.247.110'),
(439, 'admin', 0, 'products_list', 0, 'all', 1460701967, '122.81.247.110'),
(440, 'admin', 0, 'banner_list', 0, 'all', 1460702209, '122.81.247.110'),
(441, 'admin', 0, 'products_list', 0, 'all', 1460702274, '122.81.247.110'),
(442, 'admin', 0, 'products_edit', 0, 'all', 1460702282, '122.81.247.110'),
(443, 'admin', 0, 'lanmu_list', 0, 'all', 1460702330, '122.81.247.110'),
(444, 'admin', 0, 'danye_list', 0, 'all', 1460702334, '122.81.247.110'),
(445, 'admin', 0, 'danye_edit', 0, 'all', 1460702340, '122.81.247.110'),
(446, 'admin', 0, 'products_list', 0, 'all', 1460703257, '122.81.247.110'),
(447, 'admin', 0, 'products_edit', 0, 'all', 1460703259, '122.81.247.110'),
(448, 'admin', 0, 'products_list', 0, 'all', 1460703740, '122.81.247.110'),
(449, 'admin', 0, 'products_list', 0, 'all', 1460704449, '122.81.247.110'),
(450, 'admin', 0, 'products_add', 0, 'all', 1460704450, '122.81.247.110'),
(451, 'admin', 0, 'products_type_list', 0, 'all', 1460704484, '122.81.247.110'),
(452, 'admin', 0, 'products_add', 0, 'all', 1460704834, '122.81.247.110'),
(453, 'admin', 0, 'products_list', 0, 'all', 1460704848, '122.81.247.110'),
(454, 'admin', 0, 'products_add', 0, 'all', 1460704905, '122.81.247.110'),
(455, 'admin', 0, 'products_list', 0, 'all', 1460704917, '122.81.247.110'),
(456, 'admin', 0, 'products_list', 0, 'all', 1460704983, '122.81.247.110'),
(457, 'admin', 0, 'products_add', 0, 'all', 1460704983, '122.81.247.110'),
(458, 'admin', 0, 'products_list', 0, 'all', 1460705047, '122.81.247.110'),
(459, 'admin', 0, 'products_edit', 0, 'all', 1460705050, '122.81.247.110'),
(460, 'admin', 0, 'products_add', 0, 'all', 1460705068, '122.81.247.110'),
(461, 'admin', 0, 'products_list', 0, 'all', 1460705118, '122.81.247.110'),
(462, 'admin', 0, 'products_edit', 0, 'all', 1460705131, '122.81.247.110'),
(463, 'admin', 0, 'products_add', 0, 'all', 1460705137, '122.81.247.110'),
(464, 'admin', 0, 'products_list', 0, 'all', 1460705189, '122.81.247.110'),
(465, 'admin', 0, 'products_add', 0, 'all', 1460705208, '122.81.247.110'),
(466, 'admin', 0, 'products_list', 0, 'all', 1460705260, '122.81.247.110'),
(467, 'admin', 0, 'products_add', 0, 'all', 1460705275, '122.81.247.110'),
(468, 'admin', 0, 'products_edit', 0, 'all', 1460705319, '122.81.247.110'),
(469, 'admin', 0, 'products_list', 0, 'all', 1460705336, '122.81.247.110'),
(470, 'admin', 0, 'products_list', 0, 'all', 1460705565, '122.81.247.110'),
(471, 'admin', 0, 'products_edit', 0, 'all', 1460705574, '122.81.247.110'),
(472, 'admin', 0, 'products_type_list', 0, 'all', 1460705645, '122.81.247.110'),
(473, 'admin', 0, 'products_list', 0, 'all', 1460705648, '122.81.247.110'),
(474, 'admin', 0, 'products_edit', 0, 'all', 1460705652, '122.81.247.110'),
(475, 'admin', 0, 'products_list', 0, 'all', 1460705712, '122.81.247.110'),
(476, 'admin', 0, 'products_edit', 0, 'all', 1460705721, '122.81.247.110'),
(477, 'admin', 0, 'products_add', 0, 'all', 1460705750, '122.81.247.110'),
(478, 'admin', 0, 'products_edit', 0, 'all', 1460705785, '122.81.247.110'),
(479, 'admin', 0, 'products_list', 0, 'all', 1460705813, '122.81.247.110'),
(480, 'admin', 0, 'products_edit', 0, 'all', 1460705846, '122.81.247.110'),
(481, 'admin', 0, 'logo_edit', 0, 'all', 1460705958, '122.81.247.110'),
(482, 'admin', 0, 'logo_edit', 0, 'all', 1460706046, '122.81.247.110'),
(483, 'admin', 0, 'logo_edit', 0, 'all', 1460706129, '122.81.247.110'),
(484, 'admin', 0, 'login', 0, 'all', 1460706221, '122.81.247.110'),
(485, 'admin', 0, 'logo_edit', 0, 'all', 1460706225, '122.81.247.110'),
(486, 'admin', 0, 'logo_edit', 0, 'all', 1460706295, '122.81.247.110'),
(487, 'admin', 0, 'logo_edit', 0, 'all', 1460706362, '122.81.247.110'),
(488, 'admin', 0, 'systemconfig', 0, 'all', 1460706600, '122.81.247.110'),
(489, 'admin', 0, 'lanmu_list', 0, 'all', 1460706620, '122.81.247.110'),
(490, 'admin', 0, 'touchconfig', 0, 'all', 1460706621, '122.81.247.110'),
(491, 'admin', 0, 'touch_banner_list', 0, 'all', 1460706623, '122.81.247.110'),
(492, 'admin', 0, 'tauch_bot', 0, 'all', 1460706626, '122.81.247.110'),
(493, 'admin', 0, 'danye_list', 0, 'all', 1460706636, '122.81.247.110'),
(494, 'admin', 0, 'user_list', 0, 'all', 1460706646, '122.81.247.110'),
(495, 'admin', 0, 'logo_edit', 0, 'all', 1460706652, '122.81.247.110'),
(496, 'admin', 0, 'bot_edit', 0, 'all', 1460707012, '122.81.247.110'),
(497, 'admin', 0, 'logo_edit', 0, 'all', 1460707065, '122.81.247.110'),
(498, 'admin', 0, 'products_list', 0, 'all', 1460707287, '122.81.247.110'),
(499, 'admin', 0, 'products_type_list', 0, 'all', 1460707289, '122.81.247.110'),
(500, 'admin', 0, 'bot_edit', 0, 'all', 1460707557, '122.81.247.110'),
(501, 'admin', 0, 'banner_list', 0, 'all', 1460707563, '122.81.247.110'),
(502, 'admin', 0, 'systemconfig', 0, 'all', 1460707989, '122.81.247.110'),
(503, 'admin', 0, 'touchconfig', 0, 'all', 1460707992, '122.81.247.110'),
(504, 'admin', 0, 'danye_list', 0, 'all', 1460707995, '122.81.247.110'),
(505, 'admin', 0, 'danye_edit', 0, 'all', 1460707997, '122.81.247.110'),
(506, 'admin', 0, 'logo_edit', 0, 'all', 1460708141, '122.81.247.110'),
(507, 'admin', 0, 'products_list', 0, 'all', 1460708343, '122.81.247.110'),
(508, 'admin', 0, 'products_type_list', 0, 'all', 1460708347, '122.81.247.110'),
(509, 'admin', 0, 'products_add', 0, 'all', 1460708353, '122.81.247.110'),
(510, 'admin', 0, 'products_edit', 0, 'all', 1460708377, '122.81.247.110'),
(511, 'admin', 0, 'danye_list', 0, 'all', 1460708747, '122.81.247.110'),
(512, 'admin', 0, 'danye_edit', 0, 'all', 1460708749, '122.81.247.110'),
(513, 'admin', 0, 'friendlink_list', 0, 'all', 1460708876, '122.81.247.110'),
(514, 'admin', 0, 'friendlink_edit', 0, 'all', 1460708881, '122.81.247.110'),
(515, 'admin', 0, 'friendlink_list', 0, 'all', 1460708961, '122.81.247.110'),
(516, 'admin', 0, 'danye_list', 0, 'all', 1460709003, '122.81.247.110'),
(517, 'admin', 0, 'danye_edit', 0, 'all', 1460709004, '122.81.247.110'),
(518, 'admin', 0, 'danye_edit', 0, 'all', 1460709079, '122.81.247.110'),
(519, 'admin', 0, 'products_list', 0, 'all', 1460709232, '122.81.247.110'),
(520, 'admin', 0, 'friendlink_list', 0, 'all', 1460709487, '122.81.247.110'),
(521, 'admin', 0, 'friendlink_add', 0, 'all', 1460709491, '122.81.247.110'),
(522, 'admin', 0, 'friendlink_edit', 0, 'all', 1460709523, '122.81.247.110'),
(523, 'admin', 0, 'friendlink_type_list', 0, 'all', 1460709529, '122.81.247.110'),
(524, 'admin', 0, 'friendlink_list', 0, 'all', 1460709549, '122.81.247.110'),
(525, 'admin', 0, 'friendlink_edit', 0, 'all', 1460709611, '122.81.247.110'),
(526, 'admin', 0, 'friendlink_list', 0, 'all', 1460709638, '122.81.247.110'),
(527, 'admin', 0, 'job_list', 0, 'all', 1460710083, '122.81.247.110'),
(528, 'admin', 0, 'job_edit', 0, 'all', 1460710089, '122.81.247.110'),
(529, 'admin', 0, 'news_list', 0, 'all', 1460710148, '122.81.247.110'),
(530, 'admin', 0, 'news_type_list', 0, 'all', 1460710149, '122.81.247.110'),
(531, 'admin', 0, 'news_type_add', 0, 'all', 1460710150, '122.81.247.110'),
(532, 'admin', 0, 'nav_list', 0, 'all', 1460710176, '122.81.247.110'),
(533, 'admin', 0, 'lanmu_list', 0, 'all', 1460710180, '122.81.247.110'),
(534, 'admin', 0, 'products_list', 0, 'all', 1460710348, '122.81.247.110'),
(535, 'admin', 0, 'products_type_list', 0, 'all', 1460710351, '122.81.247.110'),
(536, 'admin', 0, 'banner_list', 0, 'all', 1460710370, '122.81.247.110'),
(537, 'admin', 0, 'banner_type_list', 0, 'all', 1460710373, '122.81.247.110'),
(538, 'admin', 0, 'bot_edit', 0, 'all', 1460710377, '122.81.247.110'),
(539, 'admin', 0, 'user_list', 0, 'all', 1460710580, '122.81.247.110'),
(540, 'admin', 0, 'nav_list', 0, 'all', 1460710590, '122.81.247.110'),
(541, 'admin', 0, 'banner_list', 0, 'all', 1460710594, '122.81.247.110'),
(542, 'admin', 0, 'bot_edit', 0, 'all', 1460710597, '122.81.247.110'),
(543, 'admin', 0, 'bot_edit', 0, 'all', 1460711048, '122.81.247.110'),
(544, 'admin', 0, 'friendlink_list', 0, 'all', 1460711054, '122.81.247.110'),
(545, 'admin', 0, 'friendlink_type_list', 0, 'all', 1460711059, '122.81.247.110'),
(546, 'admin', 0, 'danye_list', 0, 'all', 1460711132, '122.81.247.110'),
(547, 'admin', 0, 'danye_edit', 0, 'all', 1460711137, '122.81.247.110'),
(548, 'admin', 0, 'danye_list', 0, 'all', 1460711206, '122.81.247.110'),
(549, 'admin', 0, 'danye_edit', 0, 'all', 1460711211, '122.81.247.110'),
(550, 'admin', 0, 'logo_edit', 0, 'all', 1460711238, '122.81.247.110'),
(551, 'admin', 0, 'danye_list', 0, 'all', 1460711281, '122.81.247.110'),
(552, 'admin', 0, 'danye_edit', 0, 'all', 1460711283, '122.81.247.110'),
(553, 'admin', 0, 'danye_list', 0, 'all', 1460711344, '122.81.247.110'),
(554, 'admin', 0, 'danye_edit', 0, 'all', 1460711346, '122.81.247.110'),
(555, 'admin', 0, 'products_list', 0, 'all', 1460711420, '122.81.247.110'),
(556, 'admin', 0, 'products_edit', 0, 'all', 1460711422, '122.81.247.110'),
(557, 'admin', 0, 'products_add', 0, 'all', 1460711465, '122.81.247.110'),
(558, 'admin', 0, 'products_list', 0, 'all', 1460711489, '122.81.247.110'),
(559, 'admin', 0, 'products_edit', 0, 'all', 1460711493, '122.81.247.110'),
(560, 'admin', 0, 'logo_edit', 0, 'all', 1460711543, '122.81.247.110'),
(561, 'admin', 0, 'products_list', 0, 'all', 1460711569, '122.81.247.110'),
(562, 'admin', 0, 'products_list', 0, 'all', 1460711639, '122.81.247.110'),
(563, 'admin', 0, 'products_type_list', 0, 'all', 1460711641, '122.81.247.110'),
(564, 'admin', 0, 'products_list', 0, 'all', 1460711713, '122.81.247.110'),
(565, 'admin', 0, 'products_edit', 0, 'all', 1460711734, '122.81.247.110'),
(566, 'admin', 0, 'products_list', 0, 'all', 1460711807, '122.81.247.110'),
(567, 'admin', 0, 'products_edit', 0, 'all', 1460711826, '122.81.247.110'),
(568, 'admin', 0, 'bot_edit', 0, 'all', 1460712055, '122.81.247.110'),
(569, 'admin', 0, 'field_list', 0, 'all', 1460712058, '122.81.247.110'),
(570, 'admin', 0, 'danye_list', 0, 'all', 1460712077, '122.81.247.110'),
(571, 'admin', 0, 'danye_edit', 0, 'all', 1460712079, '122.81.247.110'),
(572, '', 0, 'login', 0, 'all', 1460712228, '122.81.247.110'),
(573, 'admin', 0, 'login', 0, 'all', 1460712250, '122.81.247.110'),
(574, 'admin', 0, 'friendlink_list', 0, 'all', 1460712259, '122.81.247.110'),
(575, 'admin', 0, 'friendlink_add', 0, 'all', 1460712288, '122.81.247.110'),
(576, 'admin', 0, 'friendlink_type_list', 0, 'all', 1460712291, '122.81.247.110'),
(577, 'admin', 0, 'lanmu_list', 0, 'all', 1460712327, '122.81.247.110'),
(578, 'admin', 0, 'news_list', 0, 'all', 1460712350, '122.81.247.110'),
(579, 'admin', 0, 'friendlink_list', 0, 'all', 1460712370, '122.81.247.110'),
(580, 'admin', 0, 'friendlink_edit', 0, 'all', 1460712374, '122.81.247.110'),
(581, 'admin', 0, 'news_edit', 0, 'all', 1460712384, '122.81.247.110'),
(582, 'admin', 0, 'recycle', 0, 'all', 1460712401, '122.81.247.110'),
(583, 'admin', 0, 'lanmu_list', 0, 'all', 1460712408, '122.81.247.110'),
(584, 'admin', 0, 'news_list', 0, 'all', 1460712411, '122.81.247.110'),
(585, 'admin', 0, 'logo_edit', 0, 'all', 1460712420, '122.81.247.110'),
(586, 'admin', 0, 'friendlink_edit', 0, 'all', 1460712441, '122.81.247.110'),
(587, 'admin', 0, 'news_edit', 0, 'all', 1460712449, '122.81.247.110'),
(588, 'admin', 0, 'lanmu_list', 0, 'all', 1460712473, '122.81.247.110'),
(589, 'admin', 0, 'news_list', 0, 'all', 1460712475, '122.81.247.110'),
(590, 'admin', 0, 'bot_edit', 0, 'all', 1460712521, '122.81.247.110'),
(591, 'admin', 0, 'danye_list', 0, 'all', 1460712528, '122.81.247.110'),
(592, 'admin', 0, 'danye_edit', 0, 'all', 1460712531, '122.81.247.110'),
(593, 'admin', 0, 'lanmu_list', 0, 'all', 1460712571, '122.81.247.110'),
(594, 'admin', 0, 'news_list', 0, 'all', 1460712575, '122.81.247.110'),
(595, 'admin', 0, 'news_edit', 0, 'all', 1460712579, '122.81.247.110'),
(596, 'admin', 0, 'news_edit', 0, 'all', 1460712657, '122.81.247.110'),
(597, 'admin', 0, 'news_list', 0, 'all', 1460712712, '122.81.247.110'),
(598, 'admin', 0, 'news_edit', 0, 'all', 1460712719, '122.81.247.110'),
(599, 'admin', 0, 'banner_list', 0, 'all', 1460712829, '122.81.247.110'),
(600, 'admin', 0, 'banner_edit', 0, 'all', 1460712831, '122.81.247.110'),
(601, 'admin', 0, 'banner_list', 0, 'all', 1460712893, '122.81.247.110'),
(602, 'admin', 0, 'banner_edit', 0, 'all', 1460713101, '122.81.247.110'),
(603, 'admin', 0, 'banner_list', 0, 'all', 1460713118, '122.81.247.110'),
(604, 'admin', 0, 'danye_list', 0, 'all', 1460713170, '122.81.247.110'),
(605, 'admin', 0, 'danye_edit', 0, 'all', 1460713173, '122.81.247.110'),
(606, 'admin', 0, 'danye_list', 0, 'all', 1460713258, '122.81.247.110'),
(607, 'admin', 0, 'danye_edit', 0, 'all', 1460713262, '122.81.247.110'),
(608, 'admin', 0, 'nav_list', 0, 'all', 1460713450, '122.81.247.110'),
(609, 'admin', 0, 'banner_list', 0, 'all', 1460713452, '122.81.247.110'),
(610, 'admin', 0, 'banner_edit', 0, 'all', 1460713456, '122.81.247.110'),
(611, 'admin', 0, 'products_list', 0, 'all', 1460713465, '122.81.247.110'),
(612, 'admin', 0, 'banner_list', 0, 'all', 1460713733, '122.81.247.110'),
(613, 'admin', 0, 'banner_add', 0, 'all', 1460713735, '122.81.247.110'),
(614, 'admin', 0, 'banner_edit', 0, 'all', 1460713782, '122.81.247.110'),
(615, 'admin', 0, 'banner_add', 0, 'all', 1460713797, '122.81.247.110'),
(616, 'admin', 0, 'banner_list', 0, 'all', 1460713797, '122.81.247.110'),
(617, 'admin', 0, 'banner_edit', 0, 'all', 1460713872, '122.81.247.110'),
(618, 'admin', 0, 'lanmu_list', 0, 'all', 1460713939, '122.81.247.110'),
(619, 'admin', 0, 'danye_list', 0, 'all', 1460713941, '122.81.247.110'),
(620, 'admin', 0, 'danye_edit', 0, 'all', 1460713944, '122.81.247.110'),
(621, 'admin', 0, 'banner_list', 0, 'all', 1460713978, '122.81.247.110'),
(622, 'admin', 0, 'banner_type_list', 0, 'all', 1460713980, '122.81.247.110'),
(623, 'admin', 0, 'banner_add', 0, 'all', 1460713985, '122.81.247.110'),
(624, 'admin', 0, 'banner_type_edit', 0, 'all', 1460714037, '122.81.247.110'),
(625, 'admin', 0, 'banner_list', 0, 'all', 1460714110, '122.81.247.110'),
(626, 'admin', 0, 'banner_type_list', 0, 'all', 1460714112, '122.81.247.110'),
(627, 'admin', 0, 'banner_type_edit', 0, 'all', 1460714113, '122.81.247.110'),
(628, 'admin', 0, 'banner_list', 0, 'all', 1460714173, '122.81.247.110'),
(629, 'admin', 0, 'banner_list', 0, 'all', 1460714269, '122.81.247.110'),
(630, 'admin', 0, 'banner_add', 0, 'all', 1460714272, '122.81.247.110'),
(631, 'admin', 0, 'banner_type_list', 0, 'all', 1460714284, '122.81.247.110'),
(632, 'admin', 0, 'lanmu_list', 0, 'all', 1460714328, '122.81.247.110'),
(633, 'admin', 0, 'lanmu_list', 0, 'all', 1460714550, '122.81.247.110'),
(634, 'admin', 0, 'lanmu_list', 0, 'all', 1460714770, '122.81.247.110'),
(635, 'admin', 0, 'news_list', 0, 'all', 1460714771, '122.81.247.110'),
(636, 'admin', 0, 'news_edit', 0, 'all', 1460714774, '122.81.247.110'),
(637, 'admin', 0, 'news_list', 0, 'all', 1460714849, '122.81.247.110'),
(638, 'admin', 0, 'danye_list', 0, 'all', 1460714909, '122.81.247.110'),
(639, 'admin', 0, 'bot_edit', 0, 'all', 1460714917, '122.81.247.110'),
(640, 'admin', 0, 'danye_list', 0, 'all', 1460715001, '122.81.247.110'),
(641, 'admin', 0, 'danye_edit', 0, 'all', 1460715004, '122.81.247.110'),
(642, 'admin', 0, 'login', 0, 'all', 1460807375, '162.243.145.47'),
(643, 'admin', 0, 'danye_list', 0, 'all', 1460807388, '162.243.145.47'),
(644, 'admin', 0, 'lanmu_list', 0, 'all', 1460807397, '162.243.145.47'),
(645, 'admin', 0, 'systemconfig', 0, 'all', 1460807403, '162.243.145.47'),
(646, 'admin', 0, 'touchconfig', 0, 'all', 1460807434, '162.243.145.47'),
(647, 'admin', 0, 'danye_list', 0, 'all', 1460807457, '162.243.145.47'),
(648, 'admin', 0, 'danye_edit', 0, 'all', 1460807471, '162.243.145.47'),
(649, 'admin', 0, 'banner_list', 0, 'all', 1460807522, '162.243.145.47'),
(650, 'admin', 0, 'nav_list', 0, 'all', 1460807526, '162.243.145.47'),
(651, 'admin', 0, 'nav_edit', 0, 'all', 1460807540, '162.243.145.47'),
(652, 'admin', 0, 'nav_edit', 0, 'all', 1460807607, '162.243.145.47'),
(653, 'admin', 0, 'nav_list', 0, 'all', 1460807611, '162.243.145.47'),
(654, 'admin', 0, 'danye_list', 0, 'all', 1460807902, '162.243.145.47'),
(655, 'admin', 0, 'nav_list', 0, 'all', 1460807912, '162.243.145.47'),
(656, 'admin', 0, 'banner_list', 0, 'all', 1460807916, '162.243.145.47'),
(657, 'admin', 0, 'field_list', 0, 'all', 1460807933, '162.243.145.47'),
(658, 'admin', 0, 'scan_rubbish', 0, 'all', 1460807941, '162.243.145.47'),
(659, 'admin', 0, 'friendlink_list', 0, 'all', 1460807949, '162.243.145.47'),
(660, 'admin', 0, 'bot_edit', 0, 'all', 1460808011, '162.243.145.47'),
(661, 'admin', 0, 'friendlink_list', 0, 'all', 1460808016, '162.243.145.47'),
(662, 'admin', 0, 'field_list', 0, 'all', 1460808171, '162.243.145.47'),
(663, 'admin', 0, 'friendlink_list', 0, 'all', 1460808187, '162.243.145.47'),
(664, 'admin', 0, 'recycle', 0, 'all', 1460808193, '162.243.145.47'),
(665, 'admin', 0, 'bot_edit', 0, 'all', 1460809423, '58.154.210.213'),
(666, 'admin', 0, 'scan_rubbish', 0, 'all', 1460809527, '58.154.210.213'),
(667, 'admin', 0, 'check_bom', 0, 'all', 1460809530, '58.154.210.213'),
(668, 'admin', 0, 'banner_list', 0, 'all', 1460809535, '58.154.210.213'),
(669, 'admin', 0, 'bot_edit', 0, 'all', 1460809535, '58.154.210.213'),
(670, 'admin', 0, 'products_list', 0, 'all', 1460810788, '58.154.210.213'),
(671, 'admin', 0, 'products_edit', 0, 'all', 1460810812, '58.154.210.213'),
(672, 'admin', 0, 'news_list', 0, 'all', 1460810872, '58.154.210.213'),
(673, 'admin', 0, 'products_type_list', 0, 'all', 1460810879, '58.154.210.213'),
(674, 'admin', 0, 'products_list', 0, 'all', 1460810894, '58.154.210.213'),
(675, 'admin', 0, 'products_list', 0, 'all', 1460810956, '58.154.210.213'),
(676, 'admin', 0, 'products_edit', 0, 'all', 1460810968, '58.154.210.213'),
(677, 'admin', 0, 'login', 0, 'all', 1460816038, '58.154.210.213'),
(678, 'admin', 0, 'products_list', 0, 'all', 1460816044, '58.154.210.213'),
(679, 'admin', 0, 'danye_list', 0, 'all', 1460816052, '58.154.210.213'),
(680, 'admin', 0, 'danye_edit', 0, 'all', 1460816059, '58.154.210.213'),
(681, 'admin', 0, 'recycle', 0, 'all', 1460816108, '58.154.210.213'),
(682, 'admin', 0, 'user_list', 0, 'all', 1460816108, '58.154.210.213'),
(683, 'admin', 0, 'job_list', 0, 'all', 1460816121, '58.154.210.213'),
(684, 'admin', 0, 'jianli_list', 0, 'all', 1460816127, '58.154.210.213'),
(685, 'admin', 0, 'down_list', 0, 'all', 1460816133, '58.154.210.213'),
(686, 'admin', 0, 'products_list', 0, 'all', 1460816136, '58.154.210.213'),
(687, 'admin', 0, 'news_list', 0, 'all', 1460816140, '58.154.210.213'),
(688, 'admin', 0, 'products_edit', 0, 'all', 1460816160, '58.154.210.213'),
(689, 'admin', 0, 'systemconfig', 0, 'all', 1460816386, '58.154.210.213'),
(690, 'admin', 0, 'lanmu_list', 0, 'all', 1460816396, '58.154.210.213'),
(691, 'admin', 0, 'jianli_list', 0, 'all', 1460816405, '58.154.210.213'),
(692, 'admin', 0, 'down_list', 0, 'all', 1460816415, '58.154.210.213'),
(693, 'admin', 0, 'danye_list', 0, 'all', 1460816420, '58.154.210.213'),
(694, 'admin', 0, 'news_list', 0, 'all', 1460816424, '58.154.210.213'),
(695, 'admin', 0, 'products_list', 0, 'all', 1460816433, '58.154.210.213'),
(696, 'admin', 0, 'user_list', 0, 'all', 1460816448, '58.154.210.213'),
(697, 'admin', 0, 'recycle', 0, 'all', 1460816449, '58.154.210.213'),
(698, 'admin', 0, 'touchconfig', 0, 'all', 1460816478, '58.154.210.213'),
(699, 'admin', 0, 'job_list', 0, 'all', 1460816493, '58.154.210.213'),
(700, 'admin', 0, 'jianli_list', 0, 'all', 1460816494, '58.154.210.213'),
(701, 'admin', 0, 'orderform_list', 0, 'all', 1460816497, '58.154.210.213'),
(702, 'admin', 0, 'payment', 0, 'all', 1460816501, '58.154.210.213'),
(703, 'admin', 0, 'down_list', 0, 'all', 1460816511, '58.154.210.213'),
(704, 'admin', 0, 'products_list', 0, 'all', 1460816514, '58.154.210.213'),
(705, 'admin', 0, 'products_edit', 0, 'all', 1460816521, '58.154.210.213'),
(706, 'admin', 0, 'news_list', 0, 'all', 1460816530, '58.154.210.213'),
(707, 'admin', 0, 'news_add', 0, 'all', 1460816534, '58.154.210.213'),
(708, 'admin', 0, 'news_list', 0, 'all', 1460816902, '58.154.210.213'),
(709, 'admin', 0, 'products_list', 0, 'all', 1460816905, '58.154.210.213'),
(710, 'admin', 0, 'products_edit', 0, 'all', 1460816909, '58.154.210.213');
INSERT INTO `mx_sysevent` (`lc_id`, `lc_uname`, `lc_siteid`, `lc_model`, `lc_classid`, `lc_action`, `lc_posttime`, `lc_ip`) VALUES
(711, 'admin', 0, 'products_list', 0, 'all', 1460818256, '58.154.210.213'),
(712, 'admin', 0, 'products_edit', 0, 'all', 1460818262, '58.154.210.213'),
(713, 'admin', 0, 'touchconfig', 0, 'all', 1460818737, '58.154.210.213'),
(714, 'admin', 0, 'danye_list', 0, 'all', 1460818740, '58.154.210.213'),
(715, 'admin', 0, 'products_list', 0, 'all', 1460818762, '58.154.210.213'),
(716, 'admin', 0, 'down_list', 0, 'all', 1460818766, '58.154.210.213'),
(717, 'admin', 0, 'job_list', 0, 'all', 1460818772, '58.154.210.213'),
(718, 'admin', 0, 'lanmu_list', 0, 'all', 1460818782, '58.154.210.213'),
(719, 'admin', 0, 'recycle', 0, 'all', 1460818832, '58.154.210.213'),
(720, 'admin', 0, 'user_list', 0, 'all', 1460818840, '58.154.210.213'),
(721, 'admin', 0, 'touchconfig', 0, 'all', 1460818849, '58.154.210.213'),
(722, 'admin', 0, 'lanmu_list', 0, 'all', 1460818852, '58.154.210.213'),
(723, 'admin', 0, 'login', 0, 'all', 1460819025, '58.154.210.213'),
(724, 'admin', 0, 'news_list', 0, 'all', 1460819038, '58.154.210.213'),
(725, 'admin', 0, 'danye_list', 0, 'all', 1460819041, '58.154.210.213'),
(726, 'admin', 0, 'gbook_list', 0, 'all', 1460819052, '58.154.210.213'),
(727, 'admin', 0, 'products_list', 0, 'all', 1460819055, '58.154.210.213'),
(728, 'admin', 0, 'user_list', 0, 'all', 1460819085, '58.154.210.213'),
(729, 'admin', 0, 'friendlink_list', 0, 'all', 1460819094, '58.154.210.213'),
(730, 'admin', 0, 'news_list', 0, 'all', 1460819100, '58.154.210.213'),
(731, 'admin', 0, 'news_add', 0, 'all', 1460819104, '58.154.210.213'),
(732, 'admin', 0, 'news_edit', 0, 'all', 1460819128, '58.154.210.213'),
(733, 'admin', 0, 'news_edit', 0, 'all', 1460819200, '58.154.210.213'),
(734, 'admin', 0, 'news_edit', 0, 'all', 1460819331, '58.154.210.213'),
(735, 'admin', 0, 'news_edit', 0, 'all', 1460819495, '58.154.210.213'),
(736, 'admin', 0, 'news_list', 0, 'all', 1460819505, '58.154.210.213'),
(737, 'admin', 0, 'login', 0, 'all', 1460878113, '202.118.13.55'),
(738, 'admin', 0, 'news_list', 0, 'all', 1460878136, '202.118.13.55'),
(739, 'admin', 0, 'news_add', 0, 'all', 1460878154, '202.118.13.55'),
(740, 'admin', 0, 'products_list', 0, 'all', 1460878163, '202.118.13.55'),
(741, 'admin', 0, 'down_list', 0, 'all', 1460878193, '202.118.13.55'),
(742, 'admin', 0, 'products_list', 0, 'all', 1460878286, '27.212.246.45'),
(743, 'admin', 0, 'login', 0, 'all', 1460879296, '202.118.13.55'),
(744, 'admin', 0, 'news_list', 0, 'all', 1460879302, '202.118.13.55'),
(745, 'admin', 0, 'news_edit', 0, 'all', 1460879318, '202.118.13.55'),
(746, 'admin', 0, 'news_add', 0, 'all', 1460879331, '202.118.13.55'),
(747, 'admin', 0, 'news_list', 0, 'all', 1460879370, '202.118.13.55'),
(748, 'admin', 0, 'news_add', 0, 'all', 1460879404, '202.118.13.55'),
(749, 'admin', 0, 'news_add', 0, 'all', 1460879473, '202.118.13.55'),
(750, 'admin', 0, 'news_list', 0, 'all', 1460879475, '202.118.13.55'),
(751, 'admin', 0, 'news_edit', 0, 'all', 1460879477, '202.118.13.55'),
(752, 'admin', 0, 'news_add', 0, 'all', 1460879567, '202.118.13.55'),
(753, 'admin', 0, 'news_list', 0, 'all', 1460879570, '202.118.13.55'),
(754, 'admin', 0, 'news_list', 0, 'all', 1460879683, '202.118.13.55'),
(755, 'admin', 0, 'news_list', 0, 'all', 1460880169, '202.118.13.55'),
(756, 'admin', 0, 'recycle', 0, 'all', 1460880231, '202.118.13.55'),
(757, 'admin', 0, 'user_list', 0, 'all', 1460880233, '202.118.13.55'),
(758, 'admin', 0, 'lanmu_list', 0, 'all', 1460880238, '202.118.13.55'),
(759, 'admin', 0, 'products_list', 0, 'all', 1460880338, '202.118.13.55'),
(760, 'admin', 0, 'products_type_list', 0, 'all', 1460880341, '202.118.13.55'),
(761, 'admin', 0, 'products_type_edit', 0, 'all', 1460880348, '202.118.13.55'),
(762, 'admin', 0, 'news_list', 0, 'all', 1460880353, '202.118.13.55'),
(763, 'admin', 0, 'danye_list', 0, 'all', 1460880359, '202.118.13.55'),
(764, 'admin', 0, 'danye_edit', 0, 'all', 1460880362, '202.118.13.55'),
(765, 'admin', 0, 'danye_list', 0, 'all', 1460880441, '202.118.13.55'),
(766, 'admin', 0, 'danye_edit', 0, 'all', 1460880467, '202.118.13.55'),
(767, 'admin', 0, 'user_list', 0, 'all', 1460880493, '202.118.13.55'),
(768, 'admin', 0, 'nav_list', 0, 'all', 1460880499, '202.118.13.55'),
(769, 'admin', 0, 'check_bom', 0, 'all', 1460880512, '202.118.13.55'),
(770, 'admin', 0, 'bot_edit', 0, 'all', 1460880512, '202.118.13.55'),
(771, 'admin', 0, 'banner_list', 0, 'all', 1460880512, '202.118.13.55'),
(772, 'admin', 0, 'products_list', 0, 'all', 1460880512, '202.118.13.55'),
(773, 'admin', 0, 'field_list', 0, 'all', 1460880514, '202.118.13.55'),
(774, 'admin', 0, 'login', 0, 'all', 1460880717, '202.118.13.55'),
(775, 'admin', 0, 'products_list', 0, 'all', 1460880721, '202.118.13.55'),
(776, 'admin', 0, 'danye_list', 0, 'all', 1460880724, '202.118.13.55'),
(777, 'admin', 0, 'danye_edit', 0, 'all', 1460880727, '202.118.13.55'),
(778, 'admin', 0, 'danye_edit', 0, 'all', 1460880882, '202.118.13.55'),
(779, 'admin', 0, 'danye_edit', 0, 'all', 1460881078, '202.118.13.55'),
(780, 'admin', 0, 'danye_edit', 0, 'all', 1460881143, '202.118.13.55'),
(781, 'admin', 0, 'danye_edit', 0, 'all', 1460881416, '202.118.13.55'),
(782, 'admin', 0, 'login', 0, 'all', 1461120518, '122.81.247.110'),
(783, 'admin', 0, 'systemconfig', 0, 'all', 1461120521, '122.81.247.110'),
(784, 'admin', 0, 'danye_list', 0, 'all', 1461120598, '122.81.247.110'),
(785, 'admin', 0, 'user_list', 0, 'all', 1461120601, '122.81.247.110'),
(786, 'admin', 0, 'banner_list', 0, 'all', 1461120626, '122.81.247.110'),
(787, 'admin', 0, 'nav_list', 0, 'all', 1461120629, '122.81.247.110'),
(788, 'admin', 0, 'logo_edit', 0, 'all', 1461120633, '122.81.247.110'),
(789, 'admin', 0, 'systemconfig', 0, 'all', 1461120764, '122.81.247.110'),
(790, 'admin', 0, 'systemconfig', 0, 'all', 1461120913, '122.81.247.110'),
(791, 'admin', 0, 'nav_list', 0, 'all', 1461120958, '122.81.247.110'),
(792, 'admin', 0, 'login', 0, 'all', 1461545609, '122.81.247.110'),
(793, 'admin', 0, 'systemconfig', 0, 'all', 1461545625, '122.81.247.110'),
(794, 'admin', 0, 'lanmu_list', 0, 'all', 1461545650, '122.81.247.110'),
(795, 'admin', 0, 'systemconfig', 0, 'all', 1461545692, '122.81.247.110'),
(796, 'admin', 0, 'systemconfig', 0, 'all', 1461545794, '122.81.247.110'),
(797, 'admin', 0, 'danye_list', 0, 'all', 1461545856, '122.81.247.110'),
(798, 'admin', 0, 'danye_edit', 0, 'all', 1461545864, '122.81.247.110'),
(799, 'admin', 0, 'systemconfig', 0, 'all', 1461546067, '122.81.247.110'),
(800, 'admin', 0, 'login', 0, 'all', 1461546085, '27.195.184.219'),
(801, 'admin', 0, 'products_list', 0, 'all', 1461546121, '27.195.184.219'),
(802, 'admin', 0, 'systemconfig', 0, 'all', 1461546195, '122.81.247.110'),
(803, 'admin', 0, 'systemconfig', 0, 'all', 1461546265, '27.195.184.219'),
(804, 'admin', 0, 'danye_list', 0, 'all', 1461546307, '27.195.184.219'),
(805, 'admin', 0, 'news_list', 0, 'all', 1461546321, '27.195.184.219'),
(806, 'admin', 0, 'news_type_list', 0, 'all', 1461546336, '27.195.184.219'),
(807, 'admin', 0, 'products_list', 0, 'all', 1461546384, '27.195.184.219'),
(808, 'admin', 0, 'danye_list', 0, 'all', 1461546416, '122.81.247.110'),
(809, 'admin', 0, 'danye_edit', 0, 'all', 1461546423, '122.81.247.110'),
(810, 'admin', 0, 'products_list', 0, 'all', 1461546450, '27.195.184.219'),
(811, 'admin', 0, 'danye_list', 0, 'all', 1461546481, '27.195.184.219'),
(812, 'admin', 0, 'danye_add', 0, 'all', 1461546517, '27.195.184.219'),
(813, 'admin', 0, 'danye_edit', 0, 'all', 1461546557, '122.81.247.110'),
(814, 'admin', 0, 'danye_list', 0, 'all', 1461546564, '27.195.184.219'),
(815, 'admin', 0, 'danye_list', 0, 'all', 1461546659, '122.81.247.110'),
(816, 'admin', 0, 'danye_edit', 0, 'all', 1461546665, '122.81.247.110'),
(817, 'admin', 0, 'danye_list', 0, 'all', 1461546759, '27.195.184.219'),
(818, 'admin', 0, 'danye_edit', 0, 'all', 1461546768, '27.195.184.219'),
(819, 'admin', 0, 'danye_edit', 0, 'all', 1461546866, '122.81.247.110'),
(820, 'admin', 0, 'products_list', 0, 'all', 1461546943, '27.195.184.219'),
(821, 'admin', 0, 'news_list', 0, 'all', 1461546955, '27.195.184.219'),
(822, 'admin', 0, 'danye_edit', 0, 'all', 1461547018, '122.81.247.110'),
(823, 'admin', 0, 'news_list', 0, 'all', 1461547030, '122.81.247.110'),
(824, 'admin', 0, 'news_add', 0, 'all', 1461547033, '122.81.247.110'),
(825, 'admin', 0, 'news_type_list', 0, 'all', 1461547037, '122.81.247.110'),
(826, 'admin', 0, 'news_list', 0, 'all', 1461547105, '27.195.184.219'),
(827, 'admin', 0, 'news_add', 0, 'all', 1461547147, '27.195.184.219'),
(828, 'admin', 0, 'news_edit', 0, 'all', 1461547163, '27.195.184.219'),
(829, 'admin', 0, 'news_type_list', 0, 'all', 1461547181, '122.81.247.110'),
(830, 'admin', 0, 'news_type_add', 0, 'all', 1461547197, '122.81.247.110'),
(831, 'admin', 0, 'news_add', 0, 'all', 1461547261, '122.81.247.110'),
(832, 'admin', 0, 'news_edit', 0, 'all', 1461547274, '27.195.184.219'),
(833, 'admin', 0, 'job_list', 0, 'all', 1461547301, '27.195.184.219'),
(834, 'admin', 0, 'jianli_list', 0, 'all', 1461547311, '27.195.184.219'),
(835, 'admin', 0, 'jianli_show', 0, 'all', 1461547318, '27.195.184.219'),
(836, 'admin', 0, 'news_list', 0, 'all', 1461547347, '122.81.247.110'),
(837, 'admin', 0, 'news_type_list', 0, 'all', 1461547350, '122.81.247.110'),
(838, 'admin', 0, 'news_add', 0, 'all', 1461547357, '122.81.247.110'),
(839, 'admin', 0, 'news_list', 0, 'all', 1461547419, '27.195.184.219'),
(840, 'admin', 0, 'news_edit', 0, 'all', 1461547429, '27.195.184.219'),
(841, 'admin', 0, 'news_add', 0, 'all', 1461547437, '27.195.184.219'),
(842, 'admin', 0, 'news_list', 0, 'all', 1461547487, '122.81.247.110'),
(843, 'admin', 0, 'products_list', 0, 'all', 1461547497, '122.81.247.110'),
(844, 'admin', 0, 'products_add', 0, 'all', 1461547501, '122.81.247.110'),
(845, 'admin', 0, 'products_type_list', 0, 'all', 1461547510, '122.81.247.110'),
(846, 'admin', 0, 'news_add', 0, 'all', 1461547521, '27.195.184.219'),
(847, 'admin', 0, 'news_type_list', 0, 'all', 1461547552, '27.195.184.219'),
(848, 'admin', 0, 'products_piliang', 0, 'all', 1461547581, '122.81.247.110'),
(849, 'admin', 0, 'products_type_list', 0, 'all', 1461547589, '122.81.247.110'),
(850, 'admin', 0, 'products_piliang', 0, 'all', 1461547645, '122.81.247.110'),
(851, 'admin', 0, 'products_list', 0, 'all', 1461547680, '122.81.247.110'),
(852, 'admin', 0, 'down_list', 0, 'all', 1461547687, '122.81.247.110'),
(853, 'admin', 0, 'down_edit', 0, 'all', 1461547689, '122.81.247.110'),
(854, 'admin', 0, 'user_list', 0, 'all', 1461547699, '122.81.247.110'),
(855, 'admin', 0, 'nav_list', 0, 'all', 1461547704, '122.81.247.110'),
(856, 'admin', 0, 'products_piliang', 0, 'all', 1461547707, '27.195.184.219'),
(857, 'admin', 0, 'banner_list', 0, 'all', 1461547708, '122.81.247.110'),
(858, 'admin', 0, 'banner_edit', 0, 'all', 1461547713, '122.81.247.110'),
(859, 'admin', 0, 'banner_type_list', 0, 'all', 1461547719, '122.81.247.110'),
(860, 'admin', 0, 'logo_edit', 0, 'all', 1461547758, '122.81.247.110'),
(861, 'admin', 0, 'friendlink_list', 0, 'all', 1461547762, '122.81.247.110'),
(862, 'admin', 0, 'field_list', 0, 'all', 1461547767, '122.81.247.110'),
(863, 'admin', 0, 'bot_edit', 0, 'all', 1461547770, '122.81.247.110'),
(864, 'admin', 0, 'banner_list', 0, 'all', 1461547846, '122.81.247.110'),
(865, 'admin', 0, 'nav_list', 0, 'all', 1461547850, '27.195.184.219'),
(866, 'admin', 0, 'logo_edit', 0, 'all', 1461547874, '27.195.184.219'),
(867, 'admin', 0, 'bot_edit', 0, 'all', 1461547893, '27.195.184.219'),
(868, 'admin', 0, 'banner_edit', 0, 'all', 1461547901, '122.81.247.110'),
(869, 'admin', 0, 'banner_list', 0, 'all', 1461547909, '27.195.184.219'),
(870, 'admin', 0, 'banner_type_list', 0, 'all', 1461547944, '27.195.184.219'),
(871, 'admin', 0, 'banner_type_add', 0, 'all', 1461547977, '27.195.184.219'),
(872, 'admin', 0, 'banner_add', 0, 'all', 1461547984, '122.81.247.110'),
(873, 'admin', 0, 'banner_type_edit', 0, 'all', 1461547993, '122.81.247.110'),
(874, 'admin', 0, 'logo_edit', 0, 'all', 1461548000, '122.81.247.110'),
(875, 'admin', 0, 'bot_edit', 0, 'all', 1461548072, '122.81.247.110'),
(876, 'admin', 0, 'bot_edit', 0, 'all', 1461548137, '27.195.184.219'),
(877, 'admin', 0, 'recycle', 0, 'all', 1461548137, '122.81.247.110'),
(878, 'admin', 0, 'nav_list', 0, 'all', 1461548228, '122.81.247.110'),
(879, 'admin', 0, 'systemconfig', 0, 'all', 1461548246, '122.81.247.110'),
(880, 'admin', 0, 'recycle', 0, 'all', 1461548316, '27.195.184.219'),
(881, 'admin', 0, 'systemconfig', 0, 'all', 1461548651, '122.81.247.110'),
(882, 'admin', 0, 'lanmu_list', 0, 'all', 1461552835, '122.81.247.110'),
(883, 'admin', 0, 'nav_list', 0, 'all', 1461552866, '122.81.247.110'),
(884, 'admin', 0, 'news_list', 0, 'all', 1461552888, '122.81.247.110'),
(885, 'admin', 0, 'products_list', 0, 'all', 1461552890, '122.81.247.110'),
(886, 'admin', 0, 'products_add', 0, 'all', 1461552894, '122.81.247.110'),
(887, 'admin', 0, 'systemconfig', 0, 'all', 1461552985, '122.81.247.110'),
(888, 'admin', 0, 'systemconfig', 0, 'all', 1461553153, '122.81.247.110'),
(889, 'admin', 0, 'lanmu_list', 0, 'all', 1461553155, '122.81.247.110'),
(890, 'admin', 0, 'lanmu_list', 0, 'all', 1461553218, '122.81.247.110'),
(891, 'admin', 0, 'news_list', 0, 'all', 1461553224, '122.81.247.110'),
(892, 'admin', 0, 'lanmu_list', 0, 'all', 1461554734, '122.81.247.110'),
(893, 'admin', 0, 'systemconfig', 0, 'all', 1461554736, '122.81.247.110'),
(894, '', 0, 'login', 0, 'all', 1461554774, '122.81.247.110'),
(895, 'admin', 0, 'login', 0, 'all', 1461830296, '122.81.247.110'),
(896, 'admin', 0, 'login', 0, 'all', 1464336669, '122.81.247.110'),
(897, 'admin', 0, 'lanmu_list', 0, 'all', 1464336672, '122.81.247.110'),
(898, 'admin', 0, 'news_list', 0, 'all', 1464336674, '122.81.247.110'),
(899, 'admin', 0, 'news_edit', 0, 'all', 1464336676, '122.81.247.110'),
(900, 'admin', 0, 'news_list', 0, 'all', 1464336800, '122.81.247.110'),
(901, 'admin', 0, 'news_edit', 0, 'all', 1464336804, '122.81.247.110'),
(902, 'admin', 0, 'news_edit', 0, 'all', 1464336866, '122.81.247.110'),
(903, 'admin', 0, 'news_edit', 0, 'all', 1464337028, '122.81.247.110'),
(904, 'admin', 0, 'news_edit', 0, 'all', 1464337125, '122.81.247.110'),
(905, 'admin', 0, 'news_edit', 0, 'all', 1464337199, '122.81.247.110'),
(906, '', 0, 'login', 0, 'all', 1468916522, '122.81.247.110');

-- --------------------------------------------------------

--
-- 表的结构 `mx_touch`
--

CREATE TABLE IF NOT EXISTS `mx_touch` (
  `id` int(10) unsigned NOT NULL,
  `logo_url` varchar(100) DEFAULT NULL COMMENT '手机logo图片路径',
  `datatime` datetime DEFAULT NULL COMMENT '更新时间',
  `logo_name` varchar(30) DEFAULT NULL COMMENT '手机logo名称',
  `touch_name` varchar(50) DEFAULT NULL COMMENT '手机网站名称',
  `touch_url` varchar(10) DEFAULT NULL COMMENT '手机网站路径',
  `touch_keywords` varchar(100) DEFAULT NULL COMMENT '手机网站关键字',
  `touch_description` varchar(100) DEFAULT NULL COMMENT '手机网站描述',
  `touch_footer` text COMMENT '手机版底部信息',
  `touch_tel` varchar(15) DEFAULT NULL COMMENT '手机版电话号',
  `touch_duanxin` varchar(11) DEFAULT NULL COMMENT '手机版短信号',
  `touch_companyinfo` text COMMENT '手机版公司简介',
  `touch_script` varchar(255) DEFAULT NULL COMMENT '手机版嵌入代码',
  `touch_lng` varchar(255) DEFAULT NULL COMMENT '经度',
  `touch_lat` varchar(255) DEFAULT NULL COMMENT '纬度',
  `touch_mapdizhi` varchar(100) DEFAULT NULL COMMENT '地图地址'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mx_touch`
--

INSERT INTO `mx_touch` (`id`, `logo_url`, `datatime`, `logo_name`, `touch_name`, `touch_url`, `touch_keywords`, `touch_description`, `touch_footer`, `touch_tel`, `touch_duanxin`, `touch_companyinfo`, `touch_script`, `touch_lng`, `touch_lat`, `touch_mapdizhi`) VALUES
(1, '../uploadfile/image/20150928/20150928152230_25861.jpg', '2015-09-28 15:22:30', '', 'MXTouch', '', 'MXTouch', 'MXTouch', 'MX：龙采科技集团测试', '', '', '&nbsp;&nbsp;黑龙江龙采科技开发有限责任公司是集网站建设、网络推广、网络工程建设、软件开发、计算机维护、多媒体视频制作为主营业务 的高新技术企业。公司以科技为发展之本，在管理与技术领域中大力发掘人才、培养技术精英，为企业的持续快速发展提供强有力的技术后备队伍。<br />', NULL, '126.631308', '45.77305', '龙采科技集团');

-- --------------------------------------------------------

--
-- 表的结构 `mx_touch_banner`
--

CREATE TABLE IF NOT EXISTS `mx_touch_banner` (
  `lc_id` int(5) unsigned NOT NULL COMMENT '手机版banner编号',
  `lc_title` varchar(50) NOT NULL COMMENT '手机版banner标题',
  `lc_pic` varchar(255) DEFAULT NULL COMMENT '手机版banner图',
  `lc_datetime` datetime NOT NULL COMMENT '添加时间',
  `lc_sort_id` int(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序编号',
  `lc_url` varchar(255) DEFAULT NULL COMMENT '外部链接'
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mx_touch_banner`
--

INSERT INTO `mx_touch_banner` (`lc_id`, `lc_title`, `lc_pic`, `lc_datetime`, `lc_sort_id`, `lc_url`) VALUES
(1, 'Touch', '../uploadfile/image/20150924/20150924173828_55249.jpg', '2014-02-26 10:37:35', 0, 'http://longcai.com/3g'),
(2, 'Touch', '../uploadfile/image/20150928/20150928102729_99848.jpg', '2014-02-26 10:38:12', 0, 'http://longcai.com/3g'),
(3, 'Touch', '../uploadfile/image/20150928/20150928102738_71034.jpg', '2014-02-26 10:38:25', 0, 'http://longcai.com/3g');

-- --------------------------------------------------------

--
-- 表的结构 `mx_user`
--

CREATE TABLE IF NOT EXISTS `mx_user` (
  `lc_id` int(8) unsigned NOT NULL COMMENT '编号',
  `lc_title` varchar(50) NOT NULL COMMENT '会员名称',
  `lc_password` varchar(100) NOT NULL COMMENT '会员密码',
  `lc_name` varchar(50) DEFAULT NULL COMMENT '真实姓名',
  `lc_tel` varchar(60) DEFAULT NULL COMMENT '电话',
  `lc_email` varchar(100) DEFAULT NULL COMMENT '邮箱',
  `lc_datetime` datetime DEFAULT NULL COMMENT '注册日期',
  `lc_zt` int(4) DEFAULT '1' COMMENT '会员等级',
  `lc_ip` varchar(30) DEFAULT NULL COMMENT 'IP地址',
  `lc_key` varchar(50) DEFAULT NULL COMMENT '密码重置key值',
  `lc_key_time` datetime DEFAULT NULL COMMENT 'key值有效期'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `mx_user_type`
--

CREATE TABLE IF NOT EXISTS `mx_user_type` (
  `lc_id` int(4) NOT NULL COMMENT '编号',
  `lc_title` varchar(255) DEFAULT NULL COMMENT '会员等级名称',
  `lc_content` text COMMENT '会员等级内容'
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mx_user_type`
--

INSERT INTO `mx_user_type` (`lc_id`, `lc_title`, `lc_content`) VALUES
(1, '普通会员', NULL),
(2, '高级会员', NULL),
(3, '钻石会员', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `mx_zijian`
--

CREATE TABLE IF NOT EXISTS `mx_zijian` (
  `id` int(4) NOT NULL COMMENT '编号',
  `name` varchar(255) DEFAULT NULL COMMENT '检测词语'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mx_admin`
--
ALTER TABLE `mx_admin`
  ADD PRIMARY KEY (`lc_admin_id`);

--
-- Indexes for table `mx_banner`
--
ALTER TABLE `mx_banner`
  ADD PRIMARY KEY (`lc_id`);

--
-- Indexes for table `mx_banner_type`
--
ALTER TABLE `mx_banner_type`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `mx_config`
--
ALTER TABLE `mx_config`
  ADD PRIMARY KEY (`lc_id`);

--
-- Indexes for table `mx_customfields`
--
ALTER TABLE `mx_customfields`
  ADD PRIMARY KEY (`lc_id`);

--
-- Indexes for table `mx_danye`
--
ALTER TABLE `mx_danye`
  ADD PRIMARY KEY (`lc_id`);

--
-- Indexes for table `mx_dibu`
--
ALTER TABLE `mx_dibu`
  ADD PRIMARY KEY (`lc_id`);

--
-- Indexes for table `mx_dingdan`
--
ALTER TABLE `mx_dingdan`
  ADD PRIMARY KEY (`lc_id`);

--
-- Indexes for table `mx_down`
--
ALTER TABLE `mx_down`
  ADD PRIMARY KEY (`lc_id`);

--
-- Indexes for table `mx_down_type`
--
ALTER TABLE `mx_down_type`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `mx_express_way`
--
ALTER TABLE `mx_express_way`
  ADD PRIMARY KEY (`lc_id`);

--
-- Indexes for table `mx_friendlink`
--
ALTER TABLE `mx_friendlink`
  ADD PRIMARY KEY (`lc_id`);

--
-- Indexes for table `mx_friendlink_type`
--
ALTER TABLE `mx_friendlink_type`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `mx_gbook`
--
ALTER TABLE `mx_gbook`
  ADD PRIMARY KEY (`lc_id`);

--
-- Indexes for table `mx_gwc`
--
ALTER TABLE `mx_gwc`
  ADD PRIMARY KEY (`lc_id`);

--
-- Indexes for table `mx_jianli`
--
ALTER TABLE `mx_jianli`
  ADD PRIMARY KEY (`lc_id`);

--
-- Indexes for table `mx_job`
--
ALTER TABLE `mx_job`
  ADD PRIMARY KEY (`lc_id`);

--
-- Indexes for table `mx_lanmu`
--
ALTER TABLE `mx_lanmu`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `mx_miyao`
--
ALTER TABLE `mx_miyao`
  ADD PRIMARY KEY (`lc_id`);

--
-- Indexes for table `mx_navigation`
--
ALTER TABLE `mx_navigation`
  ADD PRIMARY KEY (`lc_id`);

--
-- Indexes for table `mx_news`
--
ALTER TABLE `mx_news`
  ADD PRIMARY KEY (`lc_id`);

--
-- Indexes for table `mx_news_type`
--
ALTER TABLE `mx_news_type`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `mx_pay_way`
--
ALTER TABLE `mx_pay_way`
  ADD PRIMARY KEY (`lc_id`);

--
-- Indexes for table `mx_products`
--
ALTER TABLE `mx_products`
  ADD PRIMARY KEY (`lc_id`);

--
-- Indexes for table `mx_products_pics`
--
ALTER TABLE `mx_products_pics`
  ADD PRIMARY KEY (`lc_id`);

--
-- Indexes for table `mx_products_type`
--
ALTER TABLE `mx_products_type`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `mx_session`
--
ALTER TABLE `mx_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mx_sysevent`
--
ALTER TABLE `mx_sysevent`
  ADD PRIMARY KEY (`lc_id`);

--
-- Indexes for table `mx_touch`
--
ALTER TABLE `mx_touch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mx_touch_banner`
--
ALTER TABLE `mx_touch_banner`
  ADD PRIMARY KEY (`lc_id`);

--
-- Indexes for table `mx_user`
--
ALTER TABLE `mx_user`
  ADD PRIMARY KEY (`lc_id`);

--
-- Indexes for table `mx_user_type`
--
ALTER TABLE `mx_user_type`
  ADD PRIMARY KEY (`lc_id`);

--
-- Indexes for table `mx_zijian`
--
ALTER TABLE `mx_zijian`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mx_admin`
--
ALTER TABLE `mx_admin`
  MODIFY `lc_admin_id` int(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '编号',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mx_banner`
--
ALTER TABLE `mx_banner`
  MODIFY `lc_id` int(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'banner编号',AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `mx_banner_type`
--
ALTER TABLE `mx_banner_type`
  MODIFY `c_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '编号',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mx_config`
--
ALTER TABLE `mx_config`
  MODIFY `lc_id` int(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '编号',AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `mx_customfields`
--
ALTER TABLE `mx_customfields`
  MODIFY `lc_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mx_danye`
--
ALTER TABLE `mx_danye`
  MODIFY `lc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `mx_dibu`
--
ALTER TABLE `mx_dibu`
  MODIFY `lc_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mx_dingdan`
--
ALTER TABLE `mx_dingdan`
  MODIFY `lc_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mx_down`
--
ALTER TABLE `mx_down`
  MODIFY `lc_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mx_down_type`
--
ALTER TABLE `mx_down_type`
  MODIFY `c_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '编号',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mx_express_way`
--
ALTER TABLE `mx_express_way`
  MODIFY `lc_id` int(4) NOT NULL AUTO_INCREMENT COMMENT '编号';
--
-- AUTO_INCREMENT for table `mx_friendlink`
--
ALTER TABLE `mx_friendlink`
  MODIFY `lc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mx_friendlink_type`
--
ALTER TABLE `mx_friendlink_type`
  MODIFY `c_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mx_gbook`
--
ALTER TABLE `mx_gbook`
  MODIFY `lc_id` int(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '编号',AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `mx_gwc`
--
ALTER TABLE `mx_gwc`
  MODIFY `lc_id` int(255) NOT NULL AUTO_INCREMENT COMMENT '编号';
--
-- AUTO_INCREMENT for table `mx_jianli`
--
ALTER TABLE `mx_jianli`
  MODIFY `lc_id` int(4) NOT NULL AUTO_INCREMENT COMMENT '编号',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mx_job`
--
ALTER TABLE `mx_job`
  MODIFY `lc_id` int(4) NOT NULL AUTO_INCREMENT COMMENT '编号',AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mx_lanmu`
--
ALTER TABLE `mx_lanmu`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `mx_miyao`
--
ALTER TABLE `mx_miyao`
  MODIFY `lc_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mx_navigation`
--
ALTER TABLE `mx_navigation`
  MODIFY `lc_id` int(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '编号',AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `mx_news`
--
ALTER TABLE `mx_news`
  MODIFY `lc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `mx_news_type`
--
ALTER TABLE `mx_news_type`
  MODIFY `c_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '编号',AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `mx_pay_way`
--
ALTER TABLE `mx_pay_way`
  MODIFY `lc_id` int(4) NOT NULL AUTO_INCREMENT COMMENT '编号';
--
-- AUTO_INCREMENT for table `mx_products`
--
ALTER TABLE `mx_products`
  MODIFY `lc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `mx_products_pics`
--
ALTER TABLE `mx_products_pics`
  MODIFY `lc_id` int(30) unsigned NOT NULL AUTO_INCREMENT COMMENT '多图编号',AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `mx_products_type`
--
ALTER TABLE `mx_products_type`
  MODIFY `c_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '编号',AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `mx_session`
--
ALTER TABLE `mx_session`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '编号';
--
-- AUTO_INCREMENT for table `mx_sysevent`
--
ALTER TABLE `mx_sysevent`
  MODIFY `lc_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '信息id',AUTO_INCREMENT=907;
--
-- AUTO_INCREMENT for table `mx_touch`
--
ALTER TABLE `mx_touch`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mx_touch_banner`
--
ALTER TABLE `mx_touch_banner`
  MODIFY `lc_id` int(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '手机版banner编号',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mx_user`
--
ALTER TABLE `mx_user`
  MODIFY `lc_id` int(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '编号';
--
-- AUTO_INCREMENT for table `mx_user_type`
--
ALTER TABLE `mx_user_type`
  MODIFY `lc_id` int(4) NOT NULL AUTO_INCREMENT COMMENT '编号',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mx_zijian`
--
ALTER TABLE `mx_zijian`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT COMMENT '编号';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
