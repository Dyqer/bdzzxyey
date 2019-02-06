<?php
/*
 * LCMX 4.0 For Touch Smarty页面标签设置
 * ============================================================================
 * 版权所有: 山西龙采科技，并保留所有权利。
 * 网站地址: http://www.longcai0351.com
 * ============================================================================
 */
$_CONFIG['now_url']='http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];//获取当前的网址
$_CONFIG['touch_name']=touch_name();//手机网站名称
$_CONFIG['nav']=nav();//手机导航
$_CONFIG['lanmu_name'] = get_lanmu_name($_GET['lanmu']);//获取栏目的名称
?>