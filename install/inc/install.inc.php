<?php
/*
 * 龙采MX 4.0安装程序公用配置文件
 * ============================================================================
 * 版权所有: 山西龙采科技，并保留所有权利。
 * 网站地址: http://www.longcai0351.com
 * ============================================================================
 */
if(!defined('IN_LCMX')){
	die('禁止访问！');
}
define('LCMX_CHARSET', 'utf8');
define('LCMX_DBCHARSET', 'utf8');
error_reporting(E_ERROR);
header("Content-Type:text/html;charset=".LCMX_CHARSET);

require(LCMX_install.'inc/install.fun.php');

if(!empty($_GET)){
	$_GET = fanxiexian($_GET);
}
if(!empty($_POST)){
	$_POST = fanxiexian($_POST);
}
$_COOKIE   = fanxiexian($_COOKIE);
$_REQUEST  = fanxiexian($_REQUEST);

PHP_VERSION > '5.1'?date_default_timezone_set("PRC"):'';

$timestamp = time();
$php_self = isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
$url = $php_self."?".$_SERVER['QUERY_STRING'];
if (!file_exists(LCMX_install)){
	echo "“install”目录不存在！";
	exit();
}
if (!is_readable(LCMX_install) || !is_writable(LCMX_install) || !is_readable(LCMX_install.'templates_c/') || !is_writable(LCMX_install.'templates_c/')){
	exit("请先将“install”目录以及此目录下的子目录设置为可读写状态（777）<br />建议您先阅读“安装说明”后在做操作！");
}
require(LCMX_ROOT_PATH.'Lib/Smarty/Smarty.class.php');

$install_smarty = new Smarty();
$install_smarty->template_dir = LCMX_install."templates/";
$install_smarty->compile_dir = LCMX_install."templates_c/";
$install_smarty->caching = false;
$install_smarty->left_delimiter = "{%";
$install_smarty->right_delimiter = "%}";

$list_check_dirs = array(
	'common',
	'config',
	'install',
	'Lib',
	'manage',
	'resource',
	'templates',
	'uploadfile'
);
?>