<?php
header("Content-Type:text/html;charset=utf-8");
defined('LC_MX') or define('LC_MX',dirname(dirname(dirname(__FILE__))).'/');//系统目录定义
defined('LC_MX_M') or define('LC_MX_M',dirname(dirname(__FILE__)).'/');//系统后台目录定义
error_reporting(~E_NOTICE);//屏蔽Notice错误
require_once 'x.php';
require (LC_MX.'common/conn.php');
require (LC_MX_M.'common/functions.php');

require (LC_MX_M."common/inc_news.php");
require (LC_MX_M."common/inc_products.php");
require (LC_MX_M."common/inc_down.php");
require (LC_MX_M."common/inc_lanmu.php");
require (LC_MX_M."common/inc_danye.php");
require (LC_MX_M."common/inc_gbook.php");
require (LC_MX_M."common/inc_job.php");
require (LC_MX_M."common/inc_user.php");
require (LC_MX_M."common/inc_orderform.php");
require (LC_MX_M."common/inc_banner.php");
require (LC_MX_M."common/inc_friendlink.php");
require (LC_MX_M."common/inc_field.php");
?>