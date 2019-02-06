<?php
defined('LC_MX') or define('LC_MX',dirname(dirname(__FILE__)).'/');//系统目录定义

require(LC_MX."common/core.php");//加载核心文件
require(LC_MX."Lib/Smarty/taglibrary.php");//加载标签文件
require(LC_MX."Lib/Smarty/Smarty.class.php");//加载Smarty类
require(LC_MX."Lib/Smarty/common.php");//加载Smarty所需方法

$smarty = new Smarty();//实例化Smarty
$smarty->caching = $smarty_cache;//true建立缓存(性能加速)
$smarty->template_dir = LC_MX."templates/".$TPL_folder;
$smarty->compile_dir = LC_MX."cache/pc/";
$smarty->cache_dir = LC_MX."cache/pc/";
$smarty->left_delimiter = "{%";
$smarty->right_delimiter = "%}";
$smarty->assign("URL","templates/".$TPL_folder."/");
$smarty->assign("web_name",web_name);//网站名称
$smarty->assign("web_keywords",web_keywords);//网站关键词
$smarty->assign("web_description",web_description);//网站描述
?>