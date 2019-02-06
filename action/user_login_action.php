<?php
/*
 * LCMX 4.0 网站会员登录
 * ============================================================================
 * 版权所有: 山西龙采科技，并保留所有权利。
 * 网站地址: http://www.longcai0351.com
 * ============================================================================
 */

$user=isset($_POST['lc_user'])?$_POST['lc_user']:null;//用户名
$password=isset($_POST['lc_password'])?$_POST['lc_password']:null;//密码
$yzm=isset($_POST['yzm'])?$_POST['yzm']:null;//验证码
$yzm = strtoupper(trim($yzm));//将验证码转换为大写且清除空格和其他符号

if(!$user || !$password || !$yzm){
	mx_msg("亲，用户名、密码或者验证码不能为空！",1);
	exit;
}
$password = md5($password);

if($yzm == $_SESSION['validationcode']){
	$sql ="select * from ".lc()."_user where lc_title= '{$user}' and lc_password = '{$password}'";
	$rs = mysql_query($sql);
	if($rs && $rows=mysql_fetch_assoc($rs)){
		$_SESSION['user_name'] = $rows['lc_title'];//用户名
		$_SESSION['user_zt'] = $rows['lc_zt'];//会员等级
		$_SESSION['user_id'] = $rows['lc_id'];//会员id
		mx_msg("亲，登录成功咯！","index.php?p=user");
	}else{
		mx_msg("亲，抱歉您用户名或密码不正确，请重新输入！",1);
	}
}else{
	mx_msg("亲，验证码输入有误！",1);
}