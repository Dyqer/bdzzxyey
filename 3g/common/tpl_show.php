<?php
/*
 * LCMX 4.0 For Touch Smarty模版展示
 */
require(LC_MX_3G."common/common.php");
require(LC_MX_3G.'common/taglibrary.php');
require(LC_MX."Lib/Smarty/Smarty.class.php");
require(LC_MX."Lib/Smarty/common.php");

$smarty = new Smarty();
$smarty->template_dir = LC_MX_3G."templates/".$TPL_folder;
$smarty->compile_dir = LC_MX."cache/3g/";
$smarty->cache_dir = LC_MX."cache/3g/";
$smarty->caching = $smarty_cache;//true建立缓存(性能加速)
$smarty->left_delimiter = '{%';
$smarty->right_delimiter = '%}';
$smarty->assign("URL",'3g/templates/'.$TPL_folder.'/');
$smarty->assign("web_name",web_name);//把网站名 赋值给web_name
$smarty->assign("web_keywords",web_keywords);//把网站关键词赋值给web_keywords
$smarty->assign("web_description",web_description);//把网站描述赋值给web_description
?>