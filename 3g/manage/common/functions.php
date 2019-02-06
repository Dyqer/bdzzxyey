<?php
/*
 * LCMX 4.0 For Touch 后台公用自定义方法
 * ============================================================================
 * 版权所有: 山西龙采科技，并保留所有权利。
 * 网站地址: http://www.longcai0351.com
 * ============================================================================
 */

//Touch后台登录验证
function wap_admin_check_login(){
	if(!$_SESSION['c_name']){
		mx_msg('您未登录或者登录已经过期！','index.php');
		exit;
	}
}
//Touch后台会员名展示
function wap_admin_top(){
	echo "您好：".$_SESSION['c_name']."&nbsp;<a href='logout.php'>退出</a>";
}
//Touch后台ajax处理验证
function wap_check_login_ajax(){
	if(!$_SESSION['c_name']){
		echo 'nologin';
		exit;
	}
}