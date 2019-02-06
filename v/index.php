<?php
/*
 * LCMX 4.0 For Micro Website (微网站)入口文件
 */
header("Content-Type:text/html;charset=utf-8");
require_once '../x.php';
define('LC_MX',dirname(dirname(__FILE__)).'/');//系统目录定义
define('LC_MX_V',dirname(__FILE__).'/');//系统V目录定义

$page = isset($_GET['p'])?$_GET['p']:"index";//获取page参数
$action = isset($_GET['a'])?$_GET['a']:null;//获取action参数

if($action){
	//业务逻辑处理
	if(file_exists(LC_MX_V.'action/'.$action.'_action.php')){
		include(LC_MX.'common/conn.php');//加载核心文件
		include(LC_MX_V.'action/'.$action.'_action.php');//加载对应操作文件
	}else{
		echo "请求错误！";
		exit;
	}
}else{
	//view视图展示
	if(file_exists(LC_MX_V.'config/page_config.php')){
		$TPLPage = include(LC_MX_V."config/page_config.php");//加载page配置文件
	}
	$TPL=$TPLPage[$page]["tpl"];//获取指定模版文件名称
	if(!$TPL){
		echo "模版指定失败！";
		exit;
	}
	include(LC_MX_V.'config/config.php');//加载配置文件
	$TPL_URL = LC_MX_V."templates/{$TPL_folder}/".$TPL;//模版文件路径
	if(!file_exists($TPL_URL)){
		echo "模版加载失败，请联系管理员！".$TPL_URL;
		exit;
	}
	include(LC_MX_V.'common/tpl_show.php');//加载核心文件
	$smarty->assign("LCMX",$_CONFIG);//将标签配置赋值给smarty
	$smarty->display($TPL);
}
?>