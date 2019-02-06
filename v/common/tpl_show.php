<?php
/*
 * LCMX 4.0 For Micro 网站Smarty模版展示
 */
require(LC_MX_V."common/common.php");
require(LC_MX_V.'common/taglibrary.php');
require(LC_MX."Lib/Smarty/Smarty.class.php");
require(LC_MX."Lib/Smarty/common.php");

$smarty = new Smarty();
$smarty->template_dir = LC_MX_V."templates/".$TPL_folder;
$smarty->compile_dir = LC_MX."cache/v/";
$smarty->cache_dir = LC_MX."cache/v/";
$smarty->caching = $smarty_cache;//true建立缓存(性能加速)
$smarty->left_delimiter = '{%';
$smarty->right_delimiter = '%}';
$smarty->assign("URL",'templates/'.$TPL_folder.'/');
$smarty->assign("web_name",web_name);//把网站名 赋值给web_name
$smarty->assign("web_keywords",web_keywords);//把网站关键词赋值给web_keywords
$smarty->assign("web_description",web_description);//把网站描述赋值给web_description
?>