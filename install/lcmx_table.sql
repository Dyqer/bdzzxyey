/*Table structure for table `lc_admin` */

CREATE TABLE `mx_admin` (
  `lc_admin_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '编号',
  `lc_admin_name` VARCHAR(100) NOT NULL COMMENT '后台帐号会员名',
  `lc_admin_password` VARCHAR(100) NOT NULL COMMENT '会员密码',
  `lc_admin_issuper` INT(2) NOT NULL DEFAULT '0' COMMENT '会员是否超级管理员',
  `lc_admin_rank` VARCHAR(150) DEFAULT NULL COMMENT '权限',
  `lc_admin_email` VARCHAR(100) DEFAULT NULL COMMENT '会员邮箱',
  `lc_admin_tel` VARCHAR(100) DEFAULT NULL COMMENT '会员电话',
  `lc_admin_qq` VARCHAR(100) DEFAULT NULL COMMENT '会员QQ号',
  `lc_admin_qx` VARCHAR(150) DEFAULT NULL COMMENT '会员权限',
  `xitong` INT(2) DEFAULT '0' COMMENT '系统',
  `lanmu` INT(2) DEFAULT '0' COMMENT '栏目',
  `danye` INT(2) DEFAULT '0' COMMENT '单页',
  `news` INT(2) DEFAULT '0' COMMENT '文章',
  `products` INT(2) DEFAULT '0' COMMENT '图文',
  `down` INT(2) DEFAULT '0' COMMENT '下载',
  `user` INT(2) DEFAULT '0' COMMENT '会员',
  `gbook` INT(2) DEFAULT '0' COMMENT '留言',
  `job` INT(2) DEFAULT '0' COMMENT '职位',
  `dingdan` INT(2) DEFAULT '0' COMMENT '订单',
  `gaoji` INT(2) DEFAULT '0' COMMENT '高级',
  `touch` INT(2) DEFAULT '0' COMMENT '手机',
  `hsz` INT(2) DEFAULT '0' COMMENT '回收站',
  `weixin` INT(2) DEFAULT '0' COMMENT '微信网站',
  `nav` INT(1) DEFAULT '0' COMMENT '导航',
  `db` INT(1) DEFAULT '0' COMMENT '数据库',
  PRIMARY KEY (`lc_admin_id`)
)DEFAULT CHARSET=utf8;

/*Table structure for table `mx_banner` */

CREATE TABLE `mx_banner` (
  `lc_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'banner编号',
  `lc_title` VARCHAR(50) NOT NULL COMMENT 'banner标题',
  `lc_pic` VARCHAR(150) DEFAULT NULL COMMENT 'banner图路径',
  `lc_datetime` DATETIME NOT NULL COMMENT '添加时间',
  `lc_sort_id` INT(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT '排序编号',
  `lc_url` VARCHAR(150) DEFAULT NULL COMMENT '外部链接',
  `lc_zt` INT(1) DEFAULT '1' COMMENT '状态',
  `c_id` INT(2) NOT NULL DEFAULT '0' COMMENT '类别',
  `lc_type` INT(2) DEFAULT '0' COMMENT '所属类型',
  PRIMARY KEY (`lc_id`)
)DEFAULT CHARSET=utf8;

/*Table structure for table `mx_banner_type` */

CREATE TABLE `mx_banner_type` (
  `c_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '编号',
  `c_title` VARCHAR(255) NOT NULL COMMENT '类别标题',
  `c_datetime` DATETIME DEFAULT NULL COMMENT '添加日期',
  `c_content` TEXT COMMENT '类别说明',
  `c_sort_id` INT(2) NOT NULL DEFAULT '0' COMMENT '类别排序',
  `c_type` INT(2) DEFAULT '0' COMMENT '所属类型',
  PRIMARY KEY (`c_id`)
)DEFAULT CHARSET=utf8;

/*Table structure for table `mx_config` */

CREATE TABLE `mx_config` (
  `lc_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '编号',
  `lc_name` VARCHAR(100) DEFAULT NULL COMMENT '变量名',
  `lc_value` VARCHAR(255) DEFAULT '0' COMMENT '变量值',
  PRIMARY KEY (`lc_id`)
)DEFAULT CHARSET=utf8;

/*Table structure for table `mx_customfields` */

CREATE TABLE `mx_customfields` (
  `lc_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lc_fieldname` VARCHAR(50) DEFAULT NULL COMMENT '字段名',
  `lc_fieldtype` VARCHAR(10) DEFAULT NULL COMMENT '字段类型',
  `lc_fieldlong` INT(5) DEFAULT NULL COMMENT '长度',
  `lc_table` VARCHAR(10) DEFAULT NULL COMMENT '所属表',
  `lc_fieldnotes` VARCHAR(100) DEFAULT NULL COMMENT '备注',
  `lc_zt` INT(2) NOT NULL DEFAULT '0' COMMENT '审核状态(0启用1禁用)',
  PRIMARY KEY (`lc_id`)
)DEFAULT CHARSET=utf8;

/*Table structure for table `mx_danye` */

CREATE TABLE `mx_danye` (
  `lc_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `lc_title` VARCHAR(255) NOT NULL COMMENT '单页标题',
  `lc_content` TEXT COMMENT '单页内容',
  `lc_sort_id` INT(4) NOT NULL DEFAULT '0' COMMENT '排序序号',
  `lc_phone` INT(2) DEFAULT '0' COMMENT '是否手机',
  `lc_del` INT(2) DEFAULT '0' COMMENT '是否删除',
  `lc_del_time` DATETIME DEFAULT NULL COMMENT '删除时间',
  `lc_cant_del` INT(4) DEFAULT '0' COMMENT '是否可删',
  `lc_zt` INT(4) DEFAULT '1' COMMENT '是否发布',
  `lanmu` INT(4) NOT NULL COMMENT '所属栏目',
  `lc_phone_content` TEXT COMMENT '手机版内容',
  `lc_url` VARCHAR(50) DEFAULT NULL COMMENT '外部链接',
  `lc_keywords` VARCHAR(100) DEFAULT NULL COMMENT '关键词',
  `lc_description` VARCHAR(100) DEFAULT NULL COMMENT '描述',
  `lc_pic` varchar(255) default NULL COMMENT '图片路径',
  PRIMARY KEY (`lc_id`)
)DEFAULT CHARSET=utf8;

/*Table structure for table `mx_dibu` */

CREATE TABLE `mx_dibu` (
  `lc_id` INT(4) NOT NULL AUTO_INCREMENT,
  `lc_content` TEXT NOT NULL,
  PRIMARY KEY (`lc_id`)
)DEFAULT CHARSET=utf8;

/*Table structure for table `mx_dingdan` */

CREATE TABLE `mx_dingdan` (
  `lc_id` INT(255) NOT NULL AUTO_INCREMENT,
  `lc_user_id` INT(5) NOT NULL COMMENT '会员id',
  `lc_name` VARCHAR(100) CHARACTER SET gbk DEFAULT NULL COMMENT '订单人姓名',
  `lc_place` VARCHAR(150) CHARACTER SET gbk DEFAULT NULL COMMENT '收货地址',
  `lc_phone` INT(30) DEFAULT NULL COMMENT '订单人电话',
  `lc_yb` INT(30) DEFAULT NULL COMMENT '订单人邮编',
  `lc_time` VARCHAR(50) DEFAULT NULL COMMENT '最佳收货时间',
  `lc_add_time` DATETIME DEFAULT NULL COMMENT '订单添加时间',
  `lc_price` INT(10) NOT NULL COMMENT '邮费',
  `lc_express_way` INT(4) DEFAULT NULL COMMENT '配送方式',
  `lc_zt` INT(2) DEFAULT NULL COMMENT '状态',
  PRIMARY KEY (`lc_id`)
)DEFAULT CHARSET=utf8;

/*Table structure for table `mx_down` */

CREATE TABLE `mx_down` (
  `lc_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lc_title` VARCHAR(255) NOT NULL COMMENT '文章标题',
  `lc_pic` VARCHAR(255) DEFAULT NULL COMMENT '文章图片',
  `lc_url` VARCHAR(200) DEFAULT NULL COMMENT '下载文件地址',
  `lc_datetime` DATETIME NOT NULL COMMENT '添加日期',
  `lc_content` TEXT COMMENT '文章内容',
  `lc_jianjie` TEXT COMMENT '文章简介',
  `lc_key` VARCHAR(255) DEFAULT NULL COMMENT '文章关键词',
  `lc_sort_id` INT(4) NOT NULL DEFAULT '0' COMMENT '排序序号',
  `lc_tj` INT(4) NOT NULL DEFAULT '0' COMMENT '是否推荐，是为1',
  `lc_hits` INT(8) NOT NULL DEFAULT '0' COMMENT '点击率',
  `lc_from` VARCHAR(255) DEFAULT NULL COMMENT '来源',
  `lc_qx` INT(2) DEFAULT '1' COMMENT '权限',
  `c_id` INT(4) NOT NULL DEFAULT '0' COMMENT '类别编号',
  `lc_phone_content` TEXT COMMENT '手机版内容',
  `lc_keywords` VARCHAR(100) DEFAULT NULL COMMENT '关键词',
  `lc_description` VARCHAR(100) DEFAULT NULL COMMENT '描述',
  PRIMARY KEY (`lc_id`)
)DEFAULT CHARSET=utf8;

/*Table structure for table `mx_down_type` */

CREATE TABLE `mx_down_type` (
  `c_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '编号',
  `c_title` VARCHAR(255) NOT NULL COMMENT '文章类别标题',
  `c_pid` INT(4) NOT NULL DEFAULT '0' COMMENT '文章父类别编号',
  `c_datetime` DATETIME NOT NULL COMMENT '添加日期',
  `c_content` TEXT COMMENT '类别说明',
  `c_sort_id` INT(4) NOT NULL DEFAULT '0' COMMENT '类别排序',
  `lanmu` INT(4) NOT NULL DEFAULT '0' COMMENT '所属栏目',
  PRIMARY KEY (`c_id`)
)DEFAULT CHARSET=utf8;

/*Table structure for table `mx_express_way` */

CREATE TABLE `mx_express_way` (
  `lc_id` INT(4) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `lc_title` VARCHAR(255) DEFAULT NULL COMMENT '配送方式名称',
  `lc_price` VARCHAR(255) DEFAULT NULL COMMENT '配送方式价格',
  PRIMARY KEY (`lc_id`)
)DEFAULT CHARSET=utf8;

/*Table structure for table `mx_friendlink` */

DROP TABLE IF EXISTS `mx_friendlink`;

CREATE TABLE `mx_friendlink` (
  `lc_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `lc_title` VARCHAR(50) NOT NULL COMMENT '标题',
  `lc_pic` VARCHAR(150) NOT NULL COMMENT '图片',
  `lc_url` VARCHAR(50) NOT NULL COMMENT '链接地址',
  `c_id` INT(5) NOT NULL DEFAULT '0' COMMENT '分类编号',
  `lc_sort_id` INT(5) NOT NULL DEFAULT '0' COMMENT '排序编号',
  `lc_datetime` DATETIME NOT NULL COMMENT '日期',
  `lc_zt` INT(2) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`lc_id`)
)DEFAULT CHARSET=utf8;

/*Table structure for table `mx_friendlink_type` */

CREATE TABLE `mx_friendlink_type` (
  `c_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `c_title` VARCHAR(50) NOT NULL,
  `c_datetime` DATETIME DEFAULT NULL,
  `c_content` TEXT,
  `c_sort_id` INT(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`c_id`)
)DEFAULT CHARSET=utf8;

/*Table structure for table `mx_gbook` */

CREATE TABLE `mx_gbook` (
  `lc_id` INT(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '编号',
  `lc_title` VARCHAR(255) NOT NULL COMMENT '留言标题',
  `lc_content` TEXT COMMENT '留言内容',
  `lc_name` VARCHAR(20) DEFAULT NULL COMMENT '留言者姓名',
  `lc_tel` VARCHAR(30) DEFAULT NULL COMMENT '电话',
  `lc_email` VARCHAR(100) DEFAULT NULL COMMENT '邮箱',
  `lc_datetime` VARCHAR(200) DEFAULT NULL COMMENT '添加日期',
  `lc_ip` VARCHAR(100) DEFAULT NULL COMMENT 'IP地址',
  `lc_reply` TEXT COMMENT '回复',
  `lc_zt` INT(4) DEFAULT '-1' COMMENT '留言状态',
  `lanmu` INT(2) DEFAULT '0' COMMENT '栏目',
  PRIMARY KEY (`lc_id`)
)DEFAULT CHARSET=utf8;

/*Table structure for table `mx_gwc` */

CREATE TABLE `mx_gwc` (
  `lc_id` INT(255) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `lc_user_id` INT(255) NOT NULL COMMENT '会员id',
  `lc_goods_id` INT(255) DEFAULT NULL COMMENT '商品id',
  `lc_goods_num` INT(255) NOT NULL DEFAULT '1' COMMENT '数量',
  `lc_price` INT(255) DEFAULT NULL COMMENT '价格',
  `lc_zt` INT(4) DEFAULT NULL COMMENT '购物车状态',
  PRIMARY KEY (`lc_id`)
)DEFAULT CHARSET=utf8;

/*Table structure for table `mx_jianli` */

CREATE TABLE `mx_jianli` (
  `lc_id` INT(4) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `lc_title` VARCHAR(200) DEFAULT NULL COMMENT '简历标题',
  `lc_sex` VARCHAR(10) DEFAULT NULL COMMENT '性别',
  `lc_birthday` VARCHAR(50) DEFAULT NULL COMMENT '出生日期',
  `lc_sfz` VARCHAR(100) DEFAULT NULL COMMENT '身份证',
  `lc_married` VARCHAR(10) DEFAULT NULL COMMENT '婚否',
  `lc_zhicheng` VARCHAR(50) DEFAULT NULL COMMENT '职称',
  `lc_school` VARCHAR(200) DEFAULT NULL COMMENT '毕业学校',
  `lc_zhuanye` VARCHAR(200) DEFAULT NULL COMMENT '专业',
  `lc_xueli` VARCHAR(200) DEFAULT NULL COMMENT '学历',
  `lc_address` VARCHAR(200) DEFAULT NULL COMMENT '地址',
  `lc_jiguan` VARCHAR(200) DEFAULT NULL COMMENT '籍贯',
  `lc_tel` VARCHAR(200) DEFAULT NULL COMMENT '电话',
  `lc_zhiwei` VARCHAR(200) DEFAULT NULL COMMENT '应聘职位',
  `lc_price` VARCHAR(200) DEFAULT NULL COMMENT '期望月薪',
  `lc_xxjl` TEXT COMMENT '学习经历',
  `lc_gzjl` TEXT COMMENT '工作经历',
  `lc_yaoqiu` TEXT COMMENT '对公司要求',
  `lc_techang` TEXT COMMENT '特长',
  `lc_datetime` DATETIME DEFAULT NULL COMMENT '添加日期',
  `lc_zt` INT(4) DEFAULT '-1' COMMENT '简历状态',
  PRIMARY KEY (`lc_id`)
)DEFAULT CHARSET=utf8;

/*Table structure for table `mx_job` */

CREATE TABLE `mx_job` (
  `lc_id` INT(4) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `lc_title` VARCHAR(200) NOT NULL COMMENT '职位标题',
  `lc_content` TEXT COMMENT '职位内容',
  `lc_num` VARCHAR(20) DEFAULT '0' COMMENT '招聘人数',
  `lc_sort_id` INT(8) NOT NULL DEFAULT '0' COMMENT '排序号',
  `lc_hits` INT(8) NOT NULL DEFAULT '0' COMMENT '点击率',
  `lc_datetime` DATETIME NOT NULL COMMENT '添加日期',
  PRIMARY KEY (`lc_id`)
)DEFAULT CHARSET=utf8;

/*Table structure for table `mx_lanmu` */

CREATE TABLE `mx_lanmu` (
  `c_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `c_title` VARCHAR(200) NOT NULL COMMENT '栏目名称',
  `c_type` INT(4) NOT NULL DEFAULT '0' COMMENT '栏目类别(0单页1文章2图文3下载4招聘5留言)',
  `c_content` TEXT COMMENT '文章内容',
  `c_link` VARCHAR(255) DEFAULT NULL COMMENT '栏目链接',
  `c_sort_id` INT(8) NOT NULL DEFAULT '0' COMMENT '排序序号',
  `c_delete` INT(2) NOT NULL DEFAULT '0' COMMENT '是否可删除(1为是)',
  `c_pc` INT(2) NOT NULL DEFAULT '1' COMMENT '是否pc显示(1为是)',
  `c_phone` INT(2) NOT NULL DEFAULT '0' COMMENT '是否phone显示(1为是)',
  `c_phone_name` VARCHAR(255) DEFAULT NULL COMMENT 'phone栏目名称',
  `c_zt` INT(4) DEFAULT '1' COMMENT '栏目状态',
  PRIMARY KEY (`c_id`)
)DEFAULT CHARSET=utf8;

/*Table structure for table `mx_miyao` */

CREATE TABLE `mx_miyao` (
  `lc_id` INT(4) NOT NULL AUTO_INCREMENT,
  `lc_value` VARCHAR(200) NOT NULL COMMENT '密钥值',
  PRIMARY KEY (`lc_id`)
)DEFAULT CHARSET=utf8;

/*Table structure for table `mx_navigation` */

CREATE TABLE `mx_navigation` (
  `lc_id` INT(3) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '编号',
  `lc_title` VARCHAR(200) DEFAULT NULL COMMENT '导航标题',
  `lc_parent_id` INT(3) DEFAULT '0' COMMENT '导航父节点',
  `lc_link_url` VARCHAR(255) DEFAULT NULL COMMENT '导航链接地址',
  `lc_rwlink_url` VARCHAR(255) DEFAULT NULL COMMENT '导航链接地址(伪静态)',
  `lc_sort_id` INT(3) DEFAULT NULL COMMENT '排序编号',
  `lc_datetime` DATETIME DEFAULT NULL COMMENT '添加日期',
  `lc_edit_datetime` DATETIME DEFAULT NULL COMMENT '修改日期',
  `lc_zt` INT(1) DEFAULT '1' COMMENT '是否显示',
  `lc_pic` VARCHAR(255) DEFAULT NULL COMMENT '导航图片',
  `lc_content` TEXT COMMENT '导航内容',
  `lc_target` VARCHAR(30) DEFAULT NULL COMMENT '目标打开方式',
  PRIMARY KEY (`lc_id`)
)DEFAULT CHARSET=utf8;
/*Table structure for table `mx_news` */

CREATE TABLE `mx_news` (
  `lc_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `lc_title` VARCHAR(255) NOT NULL COMMENT '文章标题',
  `lc_pic` VARCHAR(255) DEFAULT NULL COMMENT '文章图片',
  `lc_datetime` DATETIME DEFAULT NULL COMMENT '添加日期',
  `lc_content` TEXT COMMENT '文章内容',
  `lc_jianjie` TEXT COMMENT '文章简介',
  `lc_key` VARCHAR(255) DEFAULT NULL COMMENT '文章关键词',
  `lc_sort_id` INT(4) NOT NULL DEFAULT '0' COMMENT '排序序号',
  `lc_tj` INT(4) NOT NULL DEFAULT '0' COMMENT '是否推荐(是为1)',
  `lc_hits` INT(8) NOT NULL DEFAULT '0' COMMENT '点击率',
  `lc_from` VARCHAR(255) DEFAULT NULL COMMENT '来源',
  `lc_phone` INT(2) DEFAULT '1' COMMENT '是否手机显示',
  `lc_del` INT(2) DEFAULT '0' COMMENT '是否删除',
  `lc_del_time` DATETIME DEFAULT NULL COMMENT '删除时间',
  `lc_zt` INT(11) DEFAULT '1' COMMENT '审核状态',
  `lc_cant_del` INT(4) DEFAULT '0' COMMENT '是否可删',
  `c_id` INT(4) NOT NULL DEFAULT '0' COMMENT '类别编号',
  `lc_phone_content` TEXT COMMENT '手机版内容',
  `lc_url` VARCHAR(100) DEFAULT NULL COMMENT '外部链接',
  `lc_keywords` VARCHAR(100) DEFAULT NULL COMMENT '关键词',
  `lc_description` VARCHAR(100) DEFAULT NULL COMMENT '描述',
  PRIMARY KEY (`lc_id`)
)DEFAULT CHARSET=utf8;

/*Table structure for table `mx_news_type` */

CREATE TABLE `mx_news_type` (
  `c_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '编号',
  `c_title` VARCHAR(255) CHARACTER SET gbk NOT NULL COMMENT '文章类别标题',
  `c_pid` INT(4) NOT NULL DEFAULT '0' COMMENT '文章父类别编号',
  `c_datetime` DATETIME DEFAULT NULL COMMENT '添加日期',
  `c_content` TEXT CHARACTER SET gbk COMMENT '类别说明',
  `c_sort_id` INT(4) NOT NULL DEFAULT '0' COMMENT '类别排序',
  `lanmu` INT(4) NOT NULL DEFAULT '0' COMMENT '所属栏目编号',
  `c_del` INT(1) NOT NULL DEFAULT '0' COMMENT '是否删除',
  `c_del_time` DATETIME DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`c_id`)
)DEFAULT CHARSET=utf8;

/*Table structure for table `mx_pay_way` */

CREATE TABLE `mx_pay_way` (
  `lc_id` INT(4) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `lc_title` VARCHAR(255) NOT NULL COMMENT '标题',
  `lc_zt` INT(4) NOT NULL DEFAULT '0' COMMENT '状态（是否启用）',
  PRIMARY KEY (`lc_id`)
)DEFAULT CHARSET=utf8;

/*Table structure for table `mx_products` */

CREATE TABLE `mx_products` (
  `lc_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `lc_title` VARCHAR(255) NOT NULL COMMENT '图文标题',
  `lc_pic` VARCHAR(255) DEFAULT NULL COMMENT '图文图片',
  `lc_datetime` DATETIME DEFAULT NULL COMMENT '添加日期',
  `lc_content` TEXT COMMENT '图文内容',
  `lc_jianjie` TEXT COMMENT '图文简介',
  `lc_price` INT(30) DEFAULT '0' COMMENT '价格',
  `lc_key` VARCHAR(255) DEFAULT NULL COMMENT '关键字',
  `lc_sort_id` INT(4) NOT NULL DEFAULT '0' COMMENT '排序序号',
  `lc_tj` INT(4) NOT NULL DEFAULT '0' COMMENT '是否推荐(是为1)',
  `lc_hits` INT(8) NOT NULL DEFAULT '0' COMMENT '点击率',
  `lc_from` VARCHAR(255) DEFAULT NULL COMMENT '来源',
  `lc_url` VARCHAR(100) DEFAULT NULL COMMENT '外部链接',
  `lc_phone` INT(2) DEFAULT '1' COMMENT '是否手机版显示此条文章',
  `lc_del` INT(2) DEFAULT '0' COMMENT '是否放入回收站',
  `lc_del_time` DATETIME DEFAULT NULL COMMENT '删除时间',
  `lc_zt` INT(4) DEFAULT '1' COMMENT '是否发布',
  `lc_cant_del` INT(4) DEFAULT NULL COMMENT '是否可删除',
  `c_id` INT(4) NOT NULL DEFAULT '0' COMMENT '类别编号',
  `lc_phone_content` TEXT COMMENT '手机版内容',
  `lc_keywords` VARCHAR(100) DEFAULT NULL COMMENT '关键词',
  `lc_description` VARCHAR(100) DEFAULT NULL COMMENT '描述',
  PRIMARY KEY (`lc_id`)
)DEFAULT CHARSET=utf8;

/*Table structure for table `mx_products_pics` */

CREATE TABLE `mx_products_pics` (
  `lc_id` INT(30) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '多图编号',
  `lc_pic` VARCHAR(255) DEFAULT NULL COMMENT '图片路径',
  `lc_title` VARCHAR(50) DEFAULT NULL COMMENT '图片标题',
  `lc_sort_id` INT(5) NOT NULL DEFAULT '0' COMMENT '排序编号',
  `product_id` INT(10) NOT NULL COMMENT '所属图文编号',
  `lc_fengmian` INT(1) NOT NULL DEFAULT '0' COMMENT '是否为封面（1是封面图）',
  PRIMARY KEY (`lc_id`)
)DEFAULT CHARSET=utf8;

/*Table structure for table `mx_products_type` */

CREATE TABLE `mx_products_type` (
  `c_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '编号',
  `c_title` VARCHAR(255) NOT NULL COMMENT '图文类别标题',
  `c_pid` INT(4) NOT NULL DEFAULT '0' COMMENT '图文父类别编号',
  `c_datetime` DATETIME DEFAULT NULL COMMENT '添加日期',
  `c_content` TEXT COMMENT '类别说明',
  `c_sort_id` INT(4) NOT NULL DEFAULT '0' COMMENT '类别排序',
  `lanmu` INT(4) NOT NULL DEFAULT '0' COMMENT '所属栏目编号',
  `c_del` INT(1) NOT NULL DEFAULT '0' COMMENT '是否删除',
  `c_del_time` DATETIME DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`c_id`)
)DEFAULT CHARSET=utf8;

/*Table structure for table `mx_session` */

CREATE TABLE `mx_session` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '编号',
  `s_id` VARCHAR(32) NOT NULL COMMENT 'session编号',
  `s_expired` INT(11) NOT NULL COMMENT '是否过期',
  `s_value` TEXT NOT NULL COMMENT 'session值',
  PRIMARY KEY (`id`)
)DEFAULT CHARSET=utf8;

/*Table structure for table `mx_sysevent` */

CREATE TABLE `mx_sysevent` (
  `lc_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '信息id',
  `lc_uname` VARCHAR(30) NOT NULL COMMENT '用户名',
  `lc_siteid` TINYINT(1) UNSIGNED NOT NULL COMMENT '站点id',
  `lc_model` VARCHAR(30) NOT NULL COMMENT '操作模块',
  `lc_classid` INT(10) UNSIGNED NOT NULL COMMENT '栏目id',
  `lc_action` VARCHAR(10) NOT NULL COMMENT '执行操作',
  `lc_posttime` INT(10) NOT NULL COMMENT '操作时间',
  `lc_ip` VARCHAR(20) NOT NULL COMMENT '操作ip',
  PRIMARY KEY  (`lc_id`)
)DEFAULT CHARSET=utf8;

/*Table structure for table `mx_touch` */

CREATE TABLE `mx_touch` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `logo_url` VARCHAR(100) DEFAULT NULL COMMENT '手机logo图片路径',
  `datatime` DATETIME DEFAULT NULL COMMENT '更新时间',
  `logo_name` VARCHAR(30) DEFAULT NULL COMMENT '手机logo名称',
  `touch_name` VARCHAR(50) DEFAULT NULL COMMENT '手机网站名称',
  `touch_url` VARCHAR(10) DEFAULT NULL COMMENT '手机网站路径',
  `touch_keywords` VARCHAR(100) DEFAULT NULL COMMENT '手机网站关键字',
  `touch_description` VARCHAR(100) DEFAULT NULL COMMENT '手机网站描述',
  `touch_footer` TEXT COMMENT '手机版底部信息',
  `touch_tel` VARCHAR(15) DEFAULT NULL COMMENT '手机版电话号',
  `touch_duanxin` VARCHAR(11) DEFAULT NULL COMMENT '手机版短信号',
  `touch_companyinfo` TEXT COMMENT '手机版公司简介',
  `touch_script` VARCHAR(255) DEFAULT NULL COMMENT '手机版嵌入代码',
  `touch_lng` varchar(255) default NULL COMMENT '经度',
  `touch_lat` varchar(255) default NULL COMMENT '纬度',
  `touch_mapdizhi` varchar(100) default NULL COMMENT '地图地址',
  PRIMARY KEY (`id`)
)DEFAULT CHARSET=utf8;

/*Table structure for table `mx_touch_banner` */

CREATE TABLE `mx_touch_banner` (
  `lc_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '手机版banner编号',
  `lc_title` VARCHAR(50) NOT NULL COMMENT '手机版banner标题',
  `lc_pic` VARCHAR(255) DEFAULT NULL COMMENT '手机版banner图',
  `lc_datetime` DATETIME NOT NULL COMMENT '添加时间',
  `lc_sort_id` INT(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT '排序编号',
  `lc_url` VARCHAR(255) DEFAULT NULL COMMENT '外部链接',
  PRIMARY KEY (`lc_id`)
)DEFAULT CHARSET=utf8;

/*Table structure for table `mx_user` */

CREATE TABLE `mx_user` (
  `lc_id` INT(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '编号',
  `lc_title` VARCHAR(50) NOT NULL COMMENT '会员名称',
  `lc_password` VARCHAR(100) NOT NULL COMMENT '会员密码',
  `lc_name` VARCHAR(50) DEFAULT NULL COMMENT '真实姓名',
  `lc_tel` VARCHAR(60) DEFAULT NULL COMMENT '电话',
  `lc_email` VARCHAR(100) DEFAULT NULL COMMENT '邮箱',
  `lc_datetime` DATETIME DEFAULT NULL COMMENT '注册日期',
  `lc_zt` INT(4) DEFAULT '1' COMMENT '会员等级',
  `lc_ip` VARCHAR(30) DEFAULT NULL COMMENT 'IP地址',
  `lc_key` VARCHAR(50) DEFAULT NULL COMMENT '密码重置key值',
  `lc_key_time` DATETIME DEFAULT NULL COMMENT 'key值有效期',
  PRIMARY KEY (`lc_id`)
)DEFAULT CHARSET=utf8;

/*Table structure for table `mx_user_type` */

CREATE TABLE `mx_user_type` (
  `lc_id` INT(4) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `lc_title` VARCHAR(255) DEFAULT NULL COMMENT '会员等级名称',
  `lc_content` TEXT COMMENT '会员等级内容',
  PRIMARY KEY (`lc_id`)
)DEFAULT CHARSET=utf8;

/*Table structure for table `mx_zijian` */

CREATE TABLE `mx_zijian` (
  `id` INT(4) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `name` VARCHAR(255) DEFAULT NULL COMMENT '检测词语',
  PRIMARY KEY (`id`)
)DEFAULT CHARSET=utf8;