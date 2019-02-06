/*Data for the table `mx_config` */

INSERT  INTO `mx_config`(`lc_id`,`lc_name`,`lc_value`) VALUES (1,'partner',''),(2,'key',''),(3,'seller_email ',''),(4,'program_schema',''),(5,'have_phone','0'),(6,'root_url','/mx3.3/'),(7,'web_name','MX5.0'),(8,'web_keywords','MX5.0'),(9,'web_description','MX5.0'),(10,'email_port','465'),(15,'gbook_email_come','0'),(16,'gbook_email_go','0'),(17,'email_zt','qq'),(18,'email_user',''),(19,'email_password',''),(20,'job_email_come','0'),(21,'job_email_go','1'),(23,'x_eid',''),(24,'x_uid',''),(25,'x_pwd_md5',''),(29,'job_duanxin_come','0'),(30,'gbook_duanxin_come','0'),(31,'x_target_no',''),(32,'pc_big_width','600'),(33,'pc_big_height','0'),(34,'pc_small_width','220'),(35,'pc_small_height','0'),(36,'sj_big_width','300'),(37,'sj_big_height','0'),(38,'sj_small_width','120'),(39,'sj_small_height','0'),(40,'web_keywords','MX5.0'),(41,'pc_big_cut','0'),(42,'pc_small_cut','0'),(43,'sj_big_cut','0'),(44,'sj_small_cut','0');

/*Data for the table `mx_dibu` */

INSERT  INTO `mx_dibu`(`lc_id`,`lc_content`) VALUES (1,'<div id=\"botbj\">\r\n	<div id=\"bot\">\r\n<div id=\"fot\">\r\n<p>\r\n地址：黑龙江省哈尔滨市道里区尚志大街29号\r\n			</p>\r\n			<p>\r\n				咨询热线：400-622-8811\r\n			</p>\r\n\r\n		</div>\r\n	</div>\r\n</div>'),(2,'<p>\r\n	<strong>友情链接：</strong> <a href=\"http://www.longcai.com\" target=\"_blank\">龙采集团</a> <a href=\"http://www.longcai.com\" target=\"_blank\">山西龙采</a></p>\r\n'),(3,'<p>\r\n	<!-- 填写企业qq代码 --></p>\r\n'),(4,'1'),(5,'../uploadfile/73965_20140610082627.png');

/*Data for the table `mx_lanmu` */

INSERT  INTO `mx_lanmu`(`c_id`,`c_title`,`c_type`,`c_content`,`c_link`,`c_sort_id`,`c_delete`,`c_pc`,`c_phone`,`c_phone_name`,`c_zt`) VALUES (1,'新闻中心',1,'','index.php?p=news_list&lanmu=1',1,1,1,1,'新闻中心',1),(2,'精彩案例',2,'','index.php?p=products_list&lanmu=2',2,1,1,1,'精彩案例',1),(3,'走进公司',0,'','index.php?p=about&lanmu=3',3,1,1,1,'走进公司',1),(4,'下载中心',3,'','index.php?p=down_list&lanmu=4',4,1,1,0,'下载中心',1),(5,'在线招聘',4,'','index.php?p=job_list&lanmu=5',5,1,1,0,'在线招聘',1),(6,'留言列表',5,'','index.php?p=gbook&lanmu=6',6,1,1,0,'留言列表',1),(7,'百度推广',0,'','index.php?p=about&lanmu=7',7,0,1,1,'百度推广',1),(8,'网站建设',0,'','index.php?p=about&lanmu=8',8,0,1,1,'网站建设',1),(9, '联系我们', 0, '', 'index.php?p=about&lanmu=9', 9, 0, 1, 1, '联系我们', 1),(10, '关于我们简介', 0, '', 'index.php?p=about&lanmu=10', 10, 0, 1, 0, '', -1);

/*Data for the table `mx_banner` */

INSERT  INTO `mx_banner`(`lc_id`,`lc_title`,`lc_pic`,`lc_datetime`,`lc_sort_id`,`lc_url`,`lc_zt`,`c_id`,`lc_type`) VALUES (1,'1','../uploadfile/98437_20140610082218.jpg','2014-06-10 16:22:18',1,'',1,1,1),(2,'2','../uploadfile/77467_20140610082234.jpg','2014-06-10 16:22:34',2,'',1,1,1),(3,'3','../uploadfile/30917_20140610082249.jpg','2014-06-10 16:22:49',3,'',1,1,1);

/*Data for the table `mx_banner_type` */

INSERT  INTO `mx_banner_type`(`c_id`,`c_title`,`c_datetime`,`c_content`,`c_sort_id`,`c_type`) VALUES (1,'banenr','2014-06-10 16:21:54','',1,1);

/*Data for the table `mx_danye` */

INSERT INTO `mx_danye` (`lc_id`,`lc_title`,`lc_content`,`lc_sort_id`,`lc_phone`,`lc_del`,`lc_del_time`,`lc_cant_del`,`lc_zt`,`lanmu`,`lc_phone_content`,`lc_url`,`lc_keywords`,`lc_description`,`lc_pic`) VALUES (1, '走进龙采', '&nbsp; &nbsp; &nbsp; 龙采龙采龙采龙采测试', 1, 1, 0, '2013-06-18 15:56:54', 0, 1, 3, '龙采龙采', 'index.php', '', '', '../uploadfile/image/20150929/20150929144418_82616.jpg'),(2, '联系我们', '<p>\r\n	联系我们联系我们联系我们d\r\n</p>\r\n<br />', 2, 1, 1, '2015-09-29 16:37:45', 0, 1, 3, '测试', '', '', '', NULL),(3, '百度推广', '<p style="text-align:center;">\r\n	<img src="../uploadfile/2014/06/20140610093836S.jpg" alt="" /> \r\n</p>\r\n<p style="text-align:center;">\r\n	<b>各销售战线精英齐聚冰城，共飨盛典</b> \r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="../uploadfile/2014/06/20140610093837C.jpg" alt="" /> \r\n</p>', 3, 0, 0, NULL, 0, 1, 7, '百度推广11', '', '', '', NULL),(4, '网站建设', '网站建设', 4, 0, 0, NULL, 0, 1, 8, '<span>网站建设</span>', '', '', '', NULL),(5, 'dfdfd', '', 5, 0, 1, '2014-06-04 12:08:22', 0, 1, 3, '测试', '', '', '', NULL),(6, '联系我们', '', 6, 0, 0, NULL, 0, 1, 9, '联系我们', '', '', '', NULL),(7, '公司简介', '&nbsp; &nbsp; 黑龙江龙采科技集团有限责任公司是集网站建设、网络推广、网络工程建设、软件开发、计算机维护、多媒体视频制作为主营业务 的高新技术企业。公司以科技为发展之本，在管理与技 术领域中大力发掘人才、培养技术精英，为企业的持续快速发展提公以科技为发展之本，在管理与技 术领域中大力发掘人才、培养技术精英，为企业的持续快速发展提供强&nbsp;', 7, 0, 0, NULL, 0, 1, 10, '&nbsp; &nbsp; 黑龙江龙采科技集团有限责任公司是集网站建设、网络推广、网络工程建设、软件开发、计算机维护、多媒体视频制作为主营业务 的高新技术企业。公司以科技为发展之本，在管理与技 术领域中大力发掘人才、培养技术精英，为企业的持续快速发展提公以科技为发展之本，在管理与技 术领域中大力发掘人才、培养技术精英，为企业的持续快速发展提供强&nbsp;', '', '', '', '../uploadfile/image/20150930/20150930085717_19665.jpg');



/*Data for the table `mx_down` */

INSERT  INTO `mx_down`(`lc_id`,`lc_title`,`lc_pic`,`lc_url`,`lc_datetime`,`lc_content`,`lc_jianjie`,`lc_key`,`lc_sort_id`,`lc_tj`,`lc_hits`,`lc_from`,`lc_qx`,`c_id`,`lc_phone_content`,`lc_keywords`,`lc_description`) VALUES (1,'1','','/mx3.3/uploadfile/file/20140604/20140604005717_30374.docx','2014-06-04 08:57:22','','',NULL,1,0,0,'',0,1,NULL,'',''),(2,'1','','/mx3.3/uploadfile/file/20140604/20140604005746_45625.docx','2014-06-04 08:57:49','','',NULL,2,0,0,'',0,1,NULL,'',''),(3,'3','','','2014-06-04 08:58:25','','',NULL,3,0,0,'',0,1,NULL,'',''),(4,'4','','','2014-06-04 08:58:34','','',NULL,4,0,0,'',0,1,NULL,'','');

/*Data for the table `mx_down_type` */

INSERT  INTO `mx_down_type`(`c_id`,`c_title`,`c_pid`,`c_datetime`,`c_content`,`c_sort_id`,`lanmu`) VALUES (1,'下载中心',0,'2014-03-04 11:37:49','',1,4);

/*Data for the table `mx_friendlink` */

INSERT  INTO `mx_friendlink`(`lc_id`,`lc_title`,`lc_pic`,`lc_url`,`c_id`,`lc_sort_id`,`lc_datetime`,`lc_zt`) VALUES (1,'百度','','http://baidu.com',1,1,'2014-08-28 14:25:53',0),(2,'腾讯','','http://www.qq.com',1,3,'2014-08-28 14:40:10',0),(3,'龙采','../uploadfile/image/20140828/20140828144208_86300.jpg','http://longcai.com',1,2,'2014-08-28 14:42:08',0);

/*Data for the table `mx_friendlink_type` */

INSERT  INTO `mx_friendlink_type`(`c_id`,`c_title`,`c_datetime`,`c_content`,`c_sort_id`) VALUES (1,'友情链接','2014-08-28 12:13:13','友情链接',1);
INSERT  INTO `mx_friendlink_type`(`c_id`,`c_title`,`c_datetime`,`c_content`,`c_sort_id`) VALUES (2,'友情链接2','2014-08-28 14:00:04','友情链接2',2);

/*Data for the table `mx_navigation` */

INSERT  INTO `mx_navigation`(`lc_id`,`lc_title`,`lc_parent_id`,`lc_link_url`,`lc_rwlink_url`,`lc_sort_id`,`lc_datetime`,`lc_edit_datetime`,`lc_zt`,`lc_pic`,`lc_content`,`lc_target`) VALUES (1,'首页',0,'index.php','',1,'2014-07-23 17:26:21','2014-07-23 17:38:25',1,'','',''),(2,'新闻中心',0,'index.php?p=news_list&lanmu=1','',2,'2014-07-23 17:26:46','2014-07-23 17:38:43',1,'','',''),(3,'精彩案例',0,'index.php?p=products_list&lanmu=2','',3,'2014-07-23 17:27:20',NULL,1,'','',''),(4,'下载中心',0,'index.php?p=down_list&lanmu=4','',4,'2014-07-23 17:27:38',NULL,1,'','',''),(5,'留言列表',0,'index.php?p=gbook&lanmu=6','',5,'2014-07-23 17:28:32',NULL,1,'','',''),(6,'在线招聘',0,'index.php?p=job_list&lanmu=5','',6,'2014-07-23 17:29:02',NULL,1,'','',''),(7,'走进龙采',0,'index.php?p=about&lanmu=3','',7,'2014-07-23 17:29:28',NULL,1,'','',''),(8,'网站建设',0,'index.php?p=about&lanmu=8','',8,'2014-07-23 17:30:16',NULL,1,'','',''),(9,'百度推广',0,'index.php?p=about&lanmu=7','',9,'2014-07-23 17:30:29',NULL,1,'','','');

/*Data for the table `mx_jianli` */

INSERT  INTO `mx_jianli`(`lc_id`,`lc_title`,`lc_sex`,`lc_birthday`,`lc_sfz`,`lc_married`,`lc_zhicheng`,`lc_school`,`lc_zhuanye`,`lc_xueli`,`lc_address`,`lc_jiguan`,`lc_tel`,`lc_zhiwei`,`lc_price`,`lc_xxjl`,`lc_gzjl`,`lc_yaoqiu`,`lc_techang`,`lc_datetime`,`lc_zt`) VALUES (1,'对方答复','男','12222222','','未婚','','','','','','','','','','','','','','2014-06-04 08:55:06',0);

/*Data for the table `mx_job` */

INSERT  INTO `mx_job`(`lc_id`,`lc_title`,`lc_content`,`lc_num`,`lc_sort_id`,`lc_hits`,`lc_datetime`) VALUES (1,'诚聘程序员','诚聘程序员&nbsp;&nbsp; 诚聘程序员&nbsp;&nbsp;诚聘程序员&nbsp;&nbsp;诚聘程序员&nbsp;&nbsp;诚聘程序员&nbsp;&nbsp;诚聘程序员&nbsp;&nbsp;诚聘程序员&nbsp;&nbsp;<br />','3',1,0,'2014-02-25 17:32:09'),(2,'诚聘美工','诚聘美工 诚聘美工&nbsp; 诚聘美工 诚聘美工&nbsp;&nbsp;&nbsp; 诚聘美工 诚聘美工&nbsp; 诚聘美工 诚聘美工&nbsp;&nbsp;&nbsp;诚聘美工 诚聘美工&nbsp; 诚聘美工 诚聘美工&nbsp;&nbsp;&nbsp;<br />','6',2,0,'2014-02-26 08:36:47');

/*Data for the table `mx_news` */

INSERT  INTO `mx_news`(`lc_id`,`lc_title`,`lc_pic`,`lc_datetime`,`lc_content`,`lc_jianjie`,`lc_key`,`lc_sort_id`,`lc_tj`,`lc_hits`,`lc_from`,`lc_phone`,`lc_del`,`lc_del_time`,`lc_zt`,`lc_cant_del`,`c_id`,`lc_phone_content`,`lc_url`,`lc_keywords`,`lc_description`) VALUES (1,'PHP开发工具PHPEclipse','../uploadfile/20140225092614.jpg','2013-12-20 10:05:51','<p>\r\n	PHPEclipse 是一个相当强大的一个Eclipse下开发PHP的插件，包括的功能有：PHP语法分析,调试，代码格式化，大纲视图，代码模板定制等。\r\n</p>\r\n<p>\r\n	<img alt=\"\" src=\"http://www.oschina.net/uploads/img/200809/14122754_yYr8.jpg\" /> \r\n</p>','PHPEclipse是一个相当强大的一个Eclipse下开发PHP的插件，包括的功能有：PHP语法分析,调试，代码格式化，大纲视图，代码模板定制等。',NULL,1,0,1,'',1,0,NULL,1,0,2,'PHPEclipse是一个相当强大的一个Eclipse下开发PHP的插件，包括的功能有：PHP语法分析,调试，代码格式化，大纲视图，代码模板定制等。','','PHP开发工具','PHP开发工具'),(2,'轻量级PHP开发框架ThinkPHP','','2013-12-20 10:07:06','<p>\r\n	<img alt=\"\" src=\"http://static.oschina.net/uploads/img/201202/16233232_kZEh.png\" />\r\n</p>\r\n<p>\r\n	ThinkPHP 是一个<span style=\"color:#FF0000;\"><strong>免费开源</strong></span>的，快速、简单的面向对象的 轻量级PHP开发框架，遵循Apache2开源协议发布，是为了敏捷WEB应用开发和简化企业应用开发而诞生的。ThinkPHP从诞生以来一直秉承简洁实用的设计原则，在保持出色的性能和至简的代码的同时，也注重易用性。并且拥有众多的原创功能和特性，在社区团队的积极参与下，在易用性、扩展性和性能方面不断优化和改进，众多的典型案例确保可以稳定用于商业以及门户级的开发。\r\n</p>\r\n<p>\r\n	经过6年的不断积累和重构，3.0版本在框架底层的定制和扩展方面趋于完善，使得应用的开发范围和需求适应度更加扩大，能够满足不同程度的开发人员的需求。而且引入了全新的CBD（核心+行为+驱动）架构模式，旨在打造DIY框架和AOP编程体验，让ThinkPHP能够在不同方面都能快速满足项目和应用的需求，并且正式引入SAE、REST和Mongo支持。\r\n</p>\r\n<p>\r\n	使用ThinkPHP，你可以更方便和快捷的开发和部署应用。当然不仅仅是企业级应用，任何PHP应用开发都可以从ThinkPHP的简单和快速的特性中受益。ThinkPHP本身具有很多的原创特性，并且倡导大道至简，开发由我的开发理念，用最少的代码完成更多的功能，宗旨就是让WEB应用开发更简单、更快速。为此ThinkPHP会不断吸收和融入更好的技术以保证其新鲜和活力，提供WEB应用开发的最佳实践！经过6年来的不断重构和改进，ThinkPHP达到了一个新的阶段，能够满足企业开发中复杂的项目需求，足以达到企业级和门户级的开发标准。\r\n</p>','ThinkPHP是一个免费开源的，快速、简单的面向对象的轻量级PHP开发框架',NULL,2,0,1,'',1,0,NULL,1,0,2,'ThinkPHP是一个免费开源的，快速、简单的面向对象的轻量级PHP开发框架，遵循Apache2开源协议发布，是为了敏捷WEB应用开发和简化企业应用开发而诞生的。ThinkPHP从诞生以来一直秉承简洁实用的设计原则，在保持出色的性能和至简的代码的同时，也注重易用性。并且拥有众多的原创功能和特性，在社区团队的积极参与下，在易用性、扩展性和性能方面不断优化和改进，众多的典型案例确保可以稳定用于商业以及门户级的开发。经过6年的不断积累和重构，3.0版本在框架底层的定制和扩展方面趋于完善，使得应用的开发范围和需求适应度更加扩大，能够满足不同程度的开发人员的需求。而且引入了全新的CBD（核心+行为+驱动）架构模式，旨在打造DIY框架和AOP编程体验，让ThinkPHP能够在不同方面都能快速满足项目和应用的需求，并且正式引入SAE、REST和Mongo支持。使用ThinkPHP，你可以更方便和快捷的开发和部署应用。当然不仅仅是企业级应用，任何PHP应用开发都可以从ThinkPHP的简单和快速的特性中受益。ThinkPHP本身具有很多的原创特性，并且倡导大道至简，开发由我的开发理念，用最少的代码完成更多的功能，宗旨就是让WEB应用开发更简单、更快速。为此ThinkPHP会不断吸收和融入更好的技术以保证其新鲜和活力，提供WEB应用开发的最佳实践！经过6年来的不断重构和改进，ThinkPHP达到了一个新的阶段，能够满足企业开发中复杂的项目需求，足以达到企业级和门户级的开发标准。','','ThinkPHP','ThinkPHP'),(3,'PHPforAndroid','../uploadfile/87178_20140610082115.jpg','2013-12-20 10:09:01','<p>\r\n	<img alt=\"\" src=\"http://www.oschina.net/uploads/img/201007/17201233_dgsj.png\" height=\"240\" width=\"327\" /> \r\n</p>\r\n<p>\r\n	PHP可不仅仅只能在互联网站上发展，一个PHP for Android (PFA)站点表示他们将可以发布编程模型、工具盒文档让PHP在Android上实现应用。该项目的主要赞助商是开源公司IronTec，PFA使用 Scripting Layer for Android (SL4A)，也就是Androd Scripting Environment (ASE)来实现这一点，您可以参看他们的网站来了解更多技术内幕。\r\n</p>','',NULL,3,1,2,'',1,0,NULL,1,0,2,'PHP可不仅仅只能在互联网站上发展，一个PHPforAndroid(PFA)站点表示他们将可以发布编程模型、工具盒文档让PHP在Android上实现应用。该项目的主要赞助商是开源公司IronTec，PFA使用ScriptingLayerforAndroid(SL4A)，也就是AndrodScriptingEnvironment(ASE)来实现这一点，您可以参看他们的网站来了解更多技术内幕。','','PHP for Android','PHP for Android'),(4,'可视化HTML编辑器KindEditor','../uploadfile/78090_20140610082056.jpg','2013-12-20 10:13:51','<p>\r\n	KindEditor 是一套开源的在线HTML编辑器，主要用于让用户在网站上获得所见即所得编辑效果，开发人员可以用 KindEditor 把传统的多行文本输入框(textarea)替换为可视化的富文本输入框。 KindEditor 使用 JavaScript 编写，可以无缝地与 Java、.NET、PHP、ASP 等程序集成，比较适合在 CMS、商城、论坛、博客、Wiki、电子邮件等互联网应用上使用。\r\n</p>\r\n<p>\r\n	<img alt=\"\" src=\"http://static.oschina.net/uploads/space/2011/1211/151206_Ku7F_96323.gif\" height=\"152\" width=\"600\" /> \r\n</p>\r\n<h3>\r\n	主要特点\r\n</h3>\r\n<ul>\r\n	<li>\r\n		快速：体积小，加载速度快\r\n	</li>\r\n	<li>\r\n		开源：开放源代码，高水平，高品质\r\n	</li>\r\n	<li>\r\n		底层：内置自定义 DOM 类库，精确操作 DOM\r\n	</li>\r\n	<li>\r\n		扩展：基于插件的设计，所有功能都是插件，可根据需求增减功能\r\n	</li>\r\n	<li>\r\n		风格：修改编辑器风格非常容易，只需修改一个 CSS 文件\r\n	</li>\r\n	<li>\r\n		兼容：支持大部分主流浏览器，比如 IE、Firefox、Safari、Chrome、Opera\r\n	</li>\r\n</ul>','可视化HTML编辑器KindEditor',NULL,4,0,2,'',1,0,NULL,1,0,1,'KindEditor是一套开源的在线HTML编辑器，主要用于让用户在网站上获得所见即所得编辑效果，开发人员可以用KindEditor把传统的多行文本输入框(textarea)替换为可视化的富文本输入框。KindEditor使用JavaScript编写，可以无缝地与Java、.NET、PHP、ASP等程序集成，比较适合在CMS、商城、论坛、博客、Wiki、电子邮件等互联网应用上使用。主要特点快速：体积小，加载速度快开源：开放源代码，高水平，高品质底层：内置自定义DOM类库，精确操作DOM扩展：基于插件的设计，所有功能都是插件，可根据需求增减功能风格：修改编辑器风格非常容易，只需修改一个CSS文件兼容：支持大部分主流浏览器，比如IE、Firefox、Safari、Chrome、Opera','','可视化HTML编辑器KindEditor','可视化HTML编辑器KindEditor'),(13,'“互联网思维下的营销变革”','','2014-06-10 16:30:44','<p class=\"MsoNormal\" style=\"text-indent:28.0pt;\">\r\n	自<span>2013</span>年以来“互联网思维”变得越来越不陌生，运用网络营销平台，传导关切价值，满足关切需求，谋划超速发展的跨界共赢的思想方式。虽然传统大企业拥有足够多的资金实力和市场知名度，但在新的<span>O2O</span>的市场环境中却很难完成顺畅的转型，旧模式的桎梏送给中小企业一次绝佳的成长机会，互联网思维能够帮助中小企业实现完美逆袭。<span></span> \r\n</p>\r\n<p class=\"MsoNormal\" style=\"text-indent:28.0pt;\">\r\n	历经十四年快速成长，百度已成为全球最大的中文搜索引擎，成功覆盖<span>PC</span>及移动平台，每天响应数十亿次搜索请求，成为国内最大网民需求入口。今年是百度连续第五年举办“营销中国行”活动。五年来，通过“营销中国行”这个平台，百度一共举办了<span>1500</span>多场活动，与近<span>30</span>万家企业进行了企业发展和营销创新方面的深度沟通，他们中的大部分现在正通过百度的平台，拥抱时代变革的力量，实现了更快、更健康的发展。<span></span> \r\n</p>\r\n2014年<span>5</span>月<span>20</span>日，<span>“</span>互联网思维下的营销变革<span>”</span>——<span>2014</span>百度营销中国行哈尔滨站在曼哈顿大酒店隆重举行，为龙江企业送来福音，政府部门领导、百度高管、行业专家以及众多业界精英、企业客户代表齐聚一堂，从多维度解析互联网思维，结合诸多案例与丰富产品介绍，深度剖析互联网思维下企业营销之道。','',NULL,13,0,0,'',1,0,NULL,1,0,2,'自2013年以来“互联网思维”变得越来越不陌生，运用网络营销平台，传导关切价值，满足关切需求，谋划超速发展的跨界共赢的思想方式。虽然传统大企业拥有足够多的资金实力和市场知名度，但在新的O2O的市场环境中却很难完成顺畅的转型，旧模式的桎梏送给中小企业一次绝佳的成长机会，互联网思维能够帮助中小企业实现完美逆袭。历经十四年快速成长，百度已成为全球最大的中文搜索引擎，成功覆盖PC及移动平台，每天响应数十亿次搜索请求，成为国内最大网民需求入口。今年是百度连续第五年举办“营销中国行”活动。五年来，通过“营销中国行”这个平台，百度一共举办了1500多场活动，与近30万家企业进行了企业发展和营销创新方面的深度沟通，他们中的大部分现在正通过百度的平台，拥抱时代变革的力量，实现了更快、更健康的发展。2014年5月20日，“互联网思维下的营销变革”——2014百度营销中国行哈尔滨站在曼哈顿大酒店隆重举行，为龙江企业送来福音，政府部门领导、百度高管、行业专家以及众多业界精英、企业客户代表齐聚一堂，从多维度解析互联网思维，结合诸多案例与丰富产品介绍，深度剖析互联网思维下企业营销之道。','','',''),(14,'新起点新挑战新征程——2014龙采科技集团销售战线会议胜利召开','','2014-06-10 16:53:10','<p style=\"text-align:center;\">\r\n	<img src=\"http://www.longcai.com/uploadfile/image/20140416/20140416004207_39492.jpg\" alt=\"\" /> \r\n</p>\r\n<p style=\"text-align:center;\">\r\n	<b>各销售战线精英齐聚冰城，共飨盛典</b> \r\n</p>\r\n<p style=\"text-align:center;\">\r\n	<img src=\"http://www.longcai.com/uploadfile/image/20140416/20140416004234_99783.jpg\" alt=\"\" /> \r\n</p>\r\n<p class=\"MsoNormal\" style=\"text-indent:21.0pt;\">\r\n	<span>2014</span>年<span>4</span>月<span>8</span>日，以“新起点、新挑战、新征程”为主题的<span>2014</span>龙\r\n采科技集团销售战线会议在哈尔滨华融饭店隆重举行。龙采企业董事长 \r\n总裁杨国廷先生、龙采科技集团总裁张栋先生、龙采企业法务公关副总裁李忠兵女士、龙采科技集团客服副总裁单文斯女士、龙采科技集团大连管理区大区总经理王\r\n晓磊先生、黑龙江龙采企业管理咨询有限公司总经理兼龙采企业管理局财务顾问宋成雁女士、龙采科技集团技术副总裁姚响先生、龙采科技集团黑龙江管理区大区总\r\n经理曲萌女士等领导以及优秀的各销售战线代表共<span>200</span>余人参加了此次会议。&nbsp;<span></span> \r\n</p>\r\n<div style=\"text-align:center;\">\r\n	<img src=\"http://www.longcai.com/uploadfile/image/20140416/20140416004252_85563.jpg\" alt=\"\" /> \r\n</div>\r\n<p style=\"text-align:center;\">\r\n	<span style=\"line-height:1.5;\">&nbsp;</span><b>杨老师致大会开幕辞</b> \r\n</p>\r\n<p>\r\n	在热烈的掌声中，龙采企业董事长 总裁杨国廷先生致大会开幕辞，会议正式开始。\r\n</p>\r\n<p style=\"text-align:center;\">\r\n	<img src=\"http://www.longcai.com/uploadfile/image/20140416/20140416004400_42049.jpg\" alt=\"\" />&nbsp;<img src=\"http://www.longcai.com/uploadfile/image/20140416/20140416004409_97599.jpg\" alt=\"\" /> \r\n</p>\r\n<p style=\"text-align:center;\">\r\n	<b>张总对<span>Q1</span>季度销售工作做全局性总结，并部署下一季度工作重点&nbsp;</b> \r\n</p>\r\n<p class=\"MsoNormal\" style=\"text-indent:21.0pt;\">\r\n	会上，龙采科技集团总裁张栋先生对<span>Q1</span>季度销售工作做了全局性总结，并作重要工作指示。在讲话中，张总用翔实的数据、有力的语言对集团三大区<span>2014</span>年<span>Q1</span>季度百度新单、新增毛利、各区销售中心、综合销售情况、分公司实收纯利排名及同比增长、分公司百度单子排名及同比、分公司百度单子排名及同比、分公司销售人均毛利、公司人均创效情况等方面工作进行了总结。并对<span>Q2</span>季度销售重点工作做了部署：要求在百度巡讲工作、方案性营销、增加销售人员数量、规范<span>ERP</span>判单原则、销售培训工作、销售支持工作继续加强、分行业开发、高管深入一线等方面都有所突破。<span>&nbsp; &nbsp;</span> \r\n</p>\r\n<p style=\"text-align:center;\">\r\n	<img src=\"http://www.longcai.com/uploadfile/image/20140416/20140416004527_42640.jpg\" alt=\"\" /> \r\n</p>\r\n<p style=\"text-align:center;\">\r\n	<b>各位高管带来的精彩无比的主题演讲</b> \r\n</p>\r\n<p class=\"MsoNormal\" style=\"text-indent:21.0pt;\">\r\n	接下来的环节是各位高管的主题演讲。他们结合丰富的业内经验，各自从职业规划、百度产品、销售理念、销售技巧、团队管理、员工培训等不同角度、不同层面，为与会人员呈现了一场又一场精彩生动的演讲，拓展了大家的知识层面、提升了业务技能。<span></span> \r\n</p>\r\n在随后的大讨论中，大家共同探讨解决了实际工作中碰到的困惑和问题，气氛热烈而和谐。张总最后的总结更让大家进一步认清了市场发展趋势，明确了下一季度的各项工作目标，理清了工作思路，提升了工作士气。','',NULL,14,0,0,'',1,0,NULL,1,0,2,'各销售战线精英齐聚冰城，共飨盛典2014年4月8日，以“新起点、新挑战、新征程”为主题的2014龙采科技集团销售战线会议在哈尔滨华融饭店隆重举行。龙采企业董事长总裁杨国廷先生、龙采科技集团总裁张栋先生、龙采企业法务公关副总裁李忠兵女士、龙采科技集团客服副总裁单文斯女士、龙采科技集团大连管理区大区总经理王晓磊先生、黑龙江龙采企业管理咨询有限公司总经理兼龙采企业管理局财务顾问宋成雁女士、龙采科技集团技术副总裁姚响先生、龙采科技集团黑龙江管理区大区总经理曲萌女士等领导以及优秀的各销售战线代表共200余人参加了此次会议。杨老师致大会开幕辞在热烈的掌声中，龙采企业董事长总裁杨国廷先生致大会开幕辞，会议正式开始。张总对Q1季度销售工作做全局性总结，并部署下一季度工作重点会上，龙采科技集团总裁张栋先生对Q1季度销售工作做了全局性总结，并作重要工作指示。在讲话中，张总用翔实的数据、有力的语言对集团三大区2014年Q1季度百度新单、新增毛利、各区销售中心、综合销售情况、分公司实收纯利排名及同比增长、分公司百度单子排名及同比、分公司百度单子排名及同比、分公司销售人均毛利、公司人均创效情况等方面工作进行了总结。并对Q2季度销售重点工作做了部署：要求在百度巡讲工作、方案性营销、增加销售人员数量、规范ERP判单原则、销售培训工作、销售支持工作继续加强、分行业开发、高管深入一线等方面都有所突破。各位高管带来的精彩无比的主题演讲接下来的环节是各位高管的主题演讲。他们结合丰富的业内经验，各自从职业规划、百度产品、销售理念、销售技巧、团队管理、员工培训等不同角度、不同层面，为与会人员呈现了一场又一场精彩生动的演讲，拓展了大家的知识层面、提升了业务技能。在随后的大讨论中，大家共同探讨解决了实际工作中碰到的困惑和问题，气氛热烈而和谐。张总最后的总结更让大家进一步认清了市场发展趋势，明确了下一季度的各项工作目标，理清了工作思路，提升了工作士气。','','',''),(15,'互联网思维下的营销变革—2014年百度营销中国行','','2014-06-10 17:01:34','<p style=\"text-align:center;\">\r\n	<img src=\"../uploadfile/2014/06/20140610090134i.jpg\" alt=\"\" height=\"275\" width=\"780\" /> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p class=\"MsoNormal\" style=\"text-indent:21.0pt;\">\r\n	进入<span>2014</span>年，“互联网思维”越来越多地被我们所提及，而在互联网思维下，营销不再是单纯的售卖传播，而是与企业生产、客户服务等各个环节紧密相连，既是企业的产品出口也是生产开端。面对机遇与挑战，您准备好了吗？<span></span> \r\n</p>\r\n<p class=\"MsoNormal\">\r\n	<br />\r\n</p>\r\n<p class=\"MsoNormal\" style=\"text-indent:21.0pt;\">\r\n	历经十四年快速成长，百度已成为全球最大的中文搜索引擎，成功覆盖<span>PC</span>及移动平台，每天响应数十亿次搜索请求，成为国内最大网民需求入口。百度推广现已为全国<span>50</span>万家中小企业提供搜索服务，极大地促进了中小企业的快速成长，提高其企业信息化建设及市场适应能力，为推动企业经济发展发挥了重要的作用。<span></span> \r\n</p>\r\n<p class=\"MsoNormal\">\r\n	<br />\r\n</p>\r\n<p class=\"MsoNormal\" style=\"text-indent:21.0pt;\">\r\n	2014年春季，百度营销中国行来到大连，为您打造了营销智慧的顶级盛宴！。<b>现诚邀您参加“互联网思维下的营销变革<span>—2014</span>年百度营销中国行“</b>活动。<span></span> \r\n</p>\r\n<p class=\"MsoNormal\" style=\"text-indent:21.0pt;\">\r\n	届时，政府部门领导、百度高管，行业专家以及众多业界精英、主流媒体和企业客户代表将共聚一堂，从多维度解析互联网思维，结合诸多案例与丰富产品介绍，深度剖析互联网思维下企业营销之道。<span></span> \r\n</p>\r\n<p class=\"MsoNormal\" style=\"text-indent:21.0pt;\">\r\n	在此，我们再次诚邀您的到来，与百度一起，携手引领未来，赢在互联网时代！<span></span> \r\n</p>','',NULL,15,0,0,'',1,0,NULL,1,0,2,'进入2014年，“互联网思维”越来越多地被我们所提及，而在互联网思维下，营销不再是单纯的售卖传播，而是与企业生产、客户服务等各个环节紧密相连，既是企业的产品出口也是生产开端。面对机遇与挑战，您准备好了吗？历经十四年快速成长，百度已成为全球最大的中文搜索引擎，成功覆盖PC及移动平台，每天响应数十亿次搜索请求，成为国内最大网民需求入口。百度推广现已为全国50万家中小企业提供搜索服务，极大地促进了中小企业的快速成长，提高其企业信息化建设及市场适应能力，为推动企业经济发展发挥了重要的作用。2014年春季，百度营销中国行来到大连，为您打造了营销智慧的顶级盛宴！。现诚邀您参加“互联网思维下的营销变革—2014年百度营销中国行“活动。届时，政府部门领导、百度高管，行业专家以及众多业界精英、主流媒体和企业客户代表将共聚一堂，从多维度解析互联网思维，结合诸多案例与丰富产品介绍，深度剖析互联网思维下企业营销之道。在此，我们再次诚邀您的到来，与百度一起，携手引领未来，赢在互联网时代！','','',''),(16,'关于百度推广服务费调整的通知','','2014-06-10 17:26:51','<div class=\"xw_con\">\r\n	<p style=\"color:#333333;font-size:14px;text-indent:24px;font-family:\'Microsoft Yahei\', Arial, 宋体, Helvetica;background-color:#F8F8F8;\">\r\n		<strong>关于百度推广服务费调整的通知</strong> \r\n	</p>\r\n	<p style=\"color:#333333;font-size:14px;text-indent:24px;font-family:\'Microsoft Yahei\', Arial, 宋体, Helvetica;background-color:#F8F8F8;\">\r\n		尊敬的百度推广用户朋友们：\r\n	</p>\r\n	<p style=\"color:#333333;font-size:14px;text-indent:24px;font-family:\'Microsoft Yahei\', Arial, 宋体, Helvetica;background-color:#F8F8F8;\">\r\n		随着百度推广产品不断发展，百度产品售后服务成本及各项费用的增加，现有的百度服务费标准已不适应当前百度推广产品售后服务发展的需要。\r\n	</p>\r\n	<p style=\"color:#333333;font-size:14px;text-indent:24px;font-family:\'Microsoft Yahei\', Arial, 宋体, Helvetica;background-color:#F8F8F8;\">\r\n		为进一步促进合作与发展，经研究百度（大连）客户服务中心对百度推广标准服务进行了统一和升级，并做出如下决定：\r\n	</p>\r\n	<p style=\"color:#333333;font-size:14px;text-indent:24px;font-family:\'Microsoft Yahei\', Arial, 宋体, Helvetica;background-color:#F8F8F8;\">\r\n		一、自2014年4月1日起，新签单或续服务费的客户百度推广服务费由1000元/年/户调整为1200元/年/户。\r\n	</p>\r\n	<p style=\"color:#333333;font-size:14px;text-indent:24px;font-family:\'Microsoft Yahei\', Arial, 宋体, Helvetica;background-color:#F8F8F8;\">\r\n		二、服务到期后未按时续交百度推广年服务费会影响账户使用；\r\n	</p>\r\n	<p style=\"color:#333333;font-size:14px;text-indent:24px;font-family:\'Microsoft Yahei\', Arial, 宋体, Helvetica;background-color:#F8F8F8;\">\r\n		三、推广服务费交纳时间以推广账户注册月为起始，满12个月为一个服务年，按此服务期收取。\r\n	</p>\r\n	<p style=\"color:#333333;font-size:14px;text-indent:24px;font-family:\'Microsoft Yahei\', Arial, 宋体, Helvetica;background-color:#F8F8F8;\">\r\n		<br />\r\n	</p>\r\n	<p style=\"color:#333333;font-size:14px;text-indent:24px;font-family:\'Microsoft Yahei\', Arial, 宋体, Helvetica;background-color:#F8F8F8;\">\r\n		&nbsp; 龙采科技集团\r\n	</p>\r\n	<p style=\"color:#333333;font-size:14px;text-indent:24px;font-family:\'Microsoft Yahei\', Arial, 宋体, Helvetica;background-color:#F8F8F8;\">\r\n		&nbsp; 2014年3月\r\n	</p>\r\n</div>','',NULL,16,0,0,'',1,0,NULL,1,0,2,'关于百度推广服务费调整的通知尊敬的百度推广用户朋友们：随着百度推广产品不断发展，百度产品售后服务成本及各项费用的增加，现有的百度服务费标准已不适应当前百度推广产品售后服务发展的需要。为进一步促进合作与发展，经研究百度（大连）客户服务中心对百度推广标准服务进行了统一和升级，并做出如下决定：一、自2014年4月1日起，新签单或续服务费的客户百度推广服务费由1000元/年/户调整为1200元/年/户。二、服务到期后未按时续交百度推广年服务费会影响账户使用；三、推广服务费交纳时间以推广账户注册月为起始，满12个月为一个服务年，按此服务期收取。龙采科技集团2014年3月','','','');

/*Data for the table `mx_news_type` */

INSERT  INTO `mx_news_type`(`c_id`,`c_title`,`c_pid`,`c_datetime`,`c_content`,`c_sort_id`,`lanmu`,`c_del`,`c_del_time`) VALUES (1,'行业新闻',0,'2013-12-17 18:46:34','',1,1,0,NULL),(2,'新闻中心',0,'2013-12-17 18:49:29','',2,1,0,NULL);

/*Data for the table `mx_products` */

INSERT  INTO `mx_products`(`lc_id`,`lc_title`,`lc_pic`,`lc_datetime`,`lc_content`,`lc_jianjie`,`lc_price`,`lc_key`,`lc_sort_id`,`lc_tj`,`lc_hits`,`lc_from`,`lc_url`,`lc_phone`,`lc_del`,`lc_del_time`,`lc_zt`,`lc_cant_del`,`c_id`,`lc_phone_content`,`lc_keywords`,`lc_description`) VALUES (1,'首页banner','','2014-02-25 16:17:48','','',0,NULL,1,1,0,'','',0,0,NULL,0,0,3,'','',''),(3,'LCO-DL-0012',NULL,'2014-06-03 16:27:00','','',0,NULL,3,1,0,'','',1,0,NULL,1,0,2,NULL,'',''),(4,'LCO-DL-0013',NULL,'2014-06-03 16:27:01','','',0,NULL,4,1,0,'','',1,0,NULL,1,0,2,NULL,'',''),(5,'LCO-DL-0098',NULL,'2014-06-03 16:27:03','','',0,NULL,9,1,0,'','',1,0,NULL,1,0,2,NULL,'',''),(6,'LCO-HLJ-0033',NULL,'2014-06-03 16:27:05','','',0,NULL,5,0,0,'','',1,0,NULL,1,0,2,NULL,'',''),(7,'LCO-HLJ-0034',NULL,'2014-06-03 16:27:05','','',0,NULL,7,0,0,'','',1,0,NULL,1,0,2,NULL,'',''),(8,'20140603105505581',NULL,'2014-06-03 16:39:52','','',0,NULL,8,0,0,'','',1,0,NULL,1,0,2,NULL,'',''),(9,'LCO-HLJ-0302',NULL,'2014-06-03 16:39:53','','',0,NULL,6,0,0,'','',1,0,NULL,1,0,2,NULL,'',''),(10,'LCO-SX-0300',NULL,'2014-06-03 16:39:53','<p style=\"text-align:center;\" align=\"center\">\r\n	<img src=\"../uploadfile/2014/06/20140610093554f.jpg\" alt=\"\" /> \r\n</p>\r\n<p style=\"text-align:center;\" align=\"center\">\r\n	<b>各销售战线精英齐聚冰城，共飨盛典</b> \r\n</p>\r\n<p style=\"text-align:center;\" align=\"center\">\r\n	<img src=\"../uploadfile/2014/06/20140610093558o.jpg\" alt=\"\" /> \r\n</p>\r\n<p class=\"MsoNormal\" style=\"text-indent:21.0pt;\" align=\"center\">\r\n	<span>2014</span>年<span>4</span>月<span>8</span>日，以“新起点、新挑战、新征程”为主题的<span>2014</span>龙\r\n采科技集团销售战线会议在哈尔滨华融饭店隆重举行。龙采企业董事长 \r\n总裁杨国廷先生、龙采科技集团总裁张栋先生、龙采企业法务公关副总裁李忠兵女士、龙采科技集团客服副总裁单文斯女士、龙采科技集团大连管理区大区总经理王\r\n晓磊先生、黑龙江龙采企业管理咨询有限公司总经理兼龙采企业管理局财务顾问宋成雁女士、龙采科技集团技术副总裁姚响先生、龙采科技集团黑龙江管理区大区总\r\n经理曲萌女士等领导以及优秀的各销售战线代表共<span>200</span>余人参加了此次会议。&nbsp;<span></span> \r\n</p>\r\n<div style=\"text-align:center;\" align=\"center\">\r\n	<img src=\"../uploadfile/2014/06/20140610093609a.jpg\" alt=\"\" /> \r\n</div>\r\n<p style=\"text-align:center;\" align=\"center\">\r\n	<span style=\"line-height:1.5;\">&nbsp;</span><b>杨老师致大会开幕辞</b> \r\n</p>\r\n<p align=\"center\">\r\n	在热烈的掌声中，龙采企业董事长 总裁杨国廷先生致大会开幕辞，会议正式开始。\r\n</p>\r\n<div align=\"center\">\r\n	<img src=\"../uploadfile/2014/06/201406100936106.jpg\" alt=\"\" /><br />\r\n</div>','',0,NULL,10,0,0,'','',1,0,NULL,1,0,2,NULL,'','');

/*Data for the table `mx_products_pics` */

INSERT  INTO `mx_products_pics`(`lc_id`,`lc_pic`,`lc_title`,`lc_sort_id`,`product_id`,`lc_fengmian`) VALUES (1,'../uploadfile/image/20140225/20140225081745_47032.png',NULL,0,1,0),(2,'../uploadfile/image/20140225/20140225081745_48693.jpg',NULL,0,1,0),(3,'../uploadfile/image/20140225/20140225081745_20285.png',NULL,0,1,0),(6,'../uploadfile/image/20140603/20140603070717_71688.jpg',NULL,0,2,1),(7,'../uploadfile/20140603/20140603082700_38907.jpg',NULL,0,3,1),(8,'../uploadfile/20140603/20140603082701_15322.jpg',NULL,0,4,1),(9,'../uploadfile/20140603/20140603082703_81287.jpg',NULL,0,5,1),(10,'../uploadfile/20140603/20140603082705_13779.jpg',NULL,0,6,1),(11,'../uploadfile/20140603/20140603082705_50849.jpg',NULL,0,7,1),(12,'../uploadfile/20140603/20140603083952_17640.jpg',NULL,0,8,1),(13,'../uploadfile/20140603/20140603083953_92087.jpg',NULL,0,9,1),(14,'../uploadfile/20140603/20140603083953_26556.jpg',NULL,0,10,1);

/*Data for the table `mx_products_type` */

INSERT  INTO `mx_products_type`(`c_id`,`c_title`,`c_pid`,`c_datetime`,`c_content`,`c_sort_id`,`lanmu`,`c_del`,`c_del_time`) VALUES (1,'龙采MX创意站',0,'2013-12-20 09:25:08','',1,2,0,NULL),(2,'龙采Smart智能站',0,'2013-12-20 09:25:25','',2,2,0,NULL),(3,'首页banner',0,'2014-02-25 16:17:11','',3,7,0,NULL),(4,'龙采one经典网站',0,'2014-06-03 16:22:55','',4,2,0,NULL);

/*Data for the table `mx_touch` */

INSERT  INTO `mx_touch`(`id`,`logo_url`,`datatime`,`logo_name`,`touch_name`,`touch_url`,`touch_keywords`,`touch_description`,`touch_footer`,`touch_tel`,`touch_duanxin`,`touch_companyinfo`,`touch_script`, `touch_lng`, `touch_lat`,`touch_mapdizhi`) VALUES (1, '../uploadfile/image/20150928/20150928152230_25861.jpg', '2015-09-28 15:22:30', '', 'MXTouch', '', 'MXTouch', 'MXTouch', 'MX：龙采科技集团测试', '', '', '&nbsp;&nbsp;黑龙江龙采科技开发有限责任公司是集网站建设、网络推广、网络工程建设、软件开发、计算机维护、多媒体视频制作为主营业务 的高新技术企业。公司以科技为发展之本，在管理与技术领域中大力发掘人才、培养技术精英，为企业的持续快速发展提供强有力的技术后备队伍。<br />', NULL, '126.631308', '45.77305', '龙采科技集团');

/*Data for the table `mx_touch_banner` */

INSERT  INTO `mx_touch_banner`(`lc_id`,`lc_title`,`lc_pic`,`lc_datetime`,`lc_sort_id`,`lc_url`) VALUES (1, 'Touch', '../uploadfile/image/20150924/20150924173828_55249.jpg', '2014-02-26 10:37:35', 0, 'http://longcai.com/3g'),(2, 'Touch', '../uploadfile/image/20150928/20150928102729_99848.jpg', '2014-02-26 10:38:12', 0, 'http://longcai.com/3g'),(3, 'Touch', '../uploadfile/image/20150928/20150928102738_71034.jpg', '2014-02-26 10:38:25', 0, 'http://longcai.com/3g');



/*Data for the table `mx_user_type` */

INSERT  INTO `mx_user_type`(`lc_id`,`lc_title`,`lc_content`) VALUES (1,'普通会员',NULL),(2,'高级会员',NULL),(3,'钻石会员',NULL);