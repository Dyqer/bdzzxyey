<?php
/*
 * LCMX 4.0 核心公用文件
 * ============================================================================
 * 版权所有: 山西龙采科技，并保留所有权利。
 * 网站地址: http://www.longcai0351.com
 * ============================================================================
 * @author LJay <ljay88@vip.qq.com>
 */
header("Content-Type:text/html;charset=utf-8");
error_reporting(~E_NOTICE);//屏蔽Notice错误
defined('LC_MX') or define('LC_MX',dirname(dirname(__FILE__)).'/');//系统目录定义
require(LC_MX."common/conn.php");

require(LC_MX."common/inc_news.php");
require(LC_MX."common/inc_products.php");
require(LC_MX."common/inc_down.php");
require(LC_MX."common/inc_lanmu.php");
require(LC_MX."common/inc_danye.php");
require(LC_MX."common/inc_gbook.php");
require(LC_MX."common/inc_job.php");
require(LC_MX."common/inc_user.php");
require(LC_MX."common/inc_qt.php");
require(LC_MX."common/inc_weixin.php");
require(LC_MX."common/inc_orderlist.php");
require(LC_MX."common/inc_banner.php");
require(LC_MX."common/inc_sendmsg.php");