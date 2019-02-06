<?php
/*
 * LCMX 4.0 网站入口文件
 * ============================================================================
 * 版权所有: 山西龙采科技，并保留所有权利。
 * 网站地址: http://www.longcai0351.com
 * ============================================================================
 * @author LJay <ljay88@vip.qq.com>
 */
define('LC_MX',dirname(__FILE__).'/');//系统目录定义
header("Content-Type:text/html;charset=utf-8");
require_once 'x.php';
if(file_exists('config/config_db.php')){
	
	$page = isset($_GET['p'])?$_GET['p']:"index";//获取page参数
	$action = isset($_GET['a'])?$_GET['a']:null;//获取action参数
	
	include(LC_MX."config/config.php");//加载网站配置文件
	include(LC_MX."config/config_web.php");//加载全局配置文件
	if($have_phone){
		//检测移动设备访问（是否移动设备访问）
		$touch_arr =array("mobile","android","wap","uc","wml","vnd","adr","mqqbrowser","nokiaBrowser","playbook", "blackberry","bb10","ipad","iphone");
		$useragent=$_SERVER["HTTP_USER_AGENT"];//获取浏览器User-Agent (UA)
		$th=str_ireplace($touch_arr,'',$useragent);
		if($useragent<>$th){
			header("location:3g/");
			exit;
		}
	}
	if($action){
		//业务逻辑处理
		if(file_exists(LC_MX.'action/'.$action.'_action.php')){
			include(LC_MX.'common/core.php');//加载核心文件
			include(LC_MX.'action/'.$action.'_action.php');//加载对应操作文件
		}else{
			include 'resource/404/404.htm';
			exit;
		}
	}else{
		//view视图展示
		if($use_smarty){
			if(file_exists(LC_MX.'config/page_config.php')){
				$TPLPage = include(LC_MX."config/page_config.php");//加载page配置文件
			}
			$TPL = $TPLPage[$page]["tpl"];//获取指定模版文件名称
			if(!$TPL){
				include 'resource/404/404.htm';
				exit;
			}
			$TPL_URL = LC_MX."templates/{$TPL_folder}/".$TPL;//模版文件路径
			if(!file_exists($TPL_URL)){
				include 'resource/404/404.htm';
				exit;
			}
			include(LC_MX.'Lib/Smarty/tpl_show.php');//加载核心文件
			$smarty->assign("LCMX",$_CONFIG);//将标签配置赋值给smarty
			$smarty->display($TPL);
		}else{
			include(LC_MX.'common/functions.php');
			define("TPL_URL","templates/default_php/");//模版路径定义
			$view_page = LC_MX.TPL_URL.$page.".php";
			if(!file_exists($view_page)){
				include 'resource/404/404.htm';
				exit;
			}
			include($view_page);
		}
	}
}else{
	header("location:install/");
}
?>