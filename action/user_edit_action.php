<?php
/*
 * LCMX 4.0 会员个人信息修改
 * ============================================================================
 * 版权所有: 山西龙采科技，并保留所有权利。
 * 网站地址: http://www.longcai0351.com
 * ============================================================================
 */
check_userlogin();//登录验证

$user_id=$_SESSION['user_id'];//会员id
$lc_password = isset($_POST['lc_password'])?$_POST['lc_password']:null;
$lc_password2 = isset($_POST['lc_password2'])?$_POST['lc_password2']:null;
$lc_name = isset($_POST['lc_name'])?$_POST['lc_name']:null;
$lc_tel = isset($_POST['lc_tel'])?$_POST['lc_tel']:null;
$lc_email = isset($_POST['lc_email'])?$_POST['lc_email']:null;

if($lc_password && $lc_password !== $lc_password2){
	mx_msg("两次密码不相同！",1);
	exit;
}

$sql = "update ".$lc."_user set ";
if($lc_password){
	$lc_password=md5($_POST['lc_password']);
	$sql.= " lc_password='{$lc_password}',";
}
$sql.= " lc_tel='{$lc_tel}',";
$sql.= " lc_email='{$lc_email}',";
$sql.= " lc_name='{$lc_name}' ";
$sql.= " where lc_id='{$user_id}'";

$rs = mysql_query($sql);
if($rs){
	mx_msg("修改成功！","index.php?p=user");
}else{
	mx_msg("修改失败！",1);
}
?>