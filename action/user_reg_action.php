<?php
/*
 * LCMX 4.0 网站会员注册
 * ============================================================================
 * 版权所有: 山西龙采科技，并保留所有权利。
 * 网站地址: http://www.longcai0351.com
 * ============================================================================
 */
$lc_user = isset($_POST['lc_user'])?$_POST['lc_user']:null;//用户名
$lc_password = isset($_POST['lc_password'])?$_POST['lc_password']:null;//密码
$lc_password2 = isset($_POST['lc_password2'])?$_POST['lc_password2']:null;//确认密码
$yzm=isset($_POST['yzm'])?$_POST['yzm']:null;//验证码
$yzm = strtoupper(trim($yzm));//将验证码转换为大写且清除空格和其他符号

if($lc_user=="" || $lc_password=="" || $yzm==""){
	mx_msg("亲，用户名、密码或者验证码不能为空！",1);
	exit;
}

if($lc_password<>$lc_password2){
	mx_msg("亲，两次输入密码不一致，请重新输入！",1);
	exit;
}

$sql_have = "select * from ".lc()."_user where lc_title = '{$lc_user}'";
$rs_have = mysql_query($sql_have);
if(mysql_num_rows($rs_have)>0){
	mx_msg("亲，用户名已经存在，请重新输入！",1);
	exit;
}

$lc_name = isset($_POST['lc_name'])?$_POST['lc_name']:null;
$lc_tel = isset($_POST['lc_tel'])?$_POST['lc_tel']:null;
$lc_email = isset($_POST['lc_email'])?$_POST['lc_email']:null;
$lc_zt = isset($_POST['lc_zt'])?$_POST['lc_zt']:1;//默认1为普通会员
$lc_ip = getip();//获取IP地址
$lc_password=md5($lc_password);
if($yzm == $_SESSION['validationcode']){
	$sql = "insert into ".lc()."_user (lc_title,lc_password,lc_name,lc_tel,lc_email,lc_ip,lc_datetime,lc_zt) values ('{$lc_user}','{$lc_password}','{$lc_name}','{$lc_tel}','{$lc_email}','{$lc_ip}',NOW(),'{$lc_zt}')";
	$rs = mysql_query($sql);
	if($rs){
		$user_id = mysql_insert_id();
		$_SESSION['user'] = $lc_user;//用户名
		$_SESSION['user_zt'] = 0;//会员等级(默认是0)
		$_SESSION['user_id'] = $user_id;//会员id
		mx_msg("亲，注册成功！","index.php?p=user");
	}else{
		mx_msg("亲，注册失败！",1);
	}
}else{
	mx_msg("亲，验证码输入有误！",1);
}