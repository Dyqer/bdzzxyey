<?php
/*后台登录验证*/
require (dirname(dirname(__FILE__)).'/common/common.php');

$error_num = isset($_COOKIE['login_err'])?(int)$_COOKIE['login_err']:0;//登录错误次数
$user = isset($_POST['user'])?escape_str($_POST['user']):null;//用户名
$password = isset($_POST['password'])?escape_str($_POST['password']):null;//密码
$l_error=array();

$password = md5($password);//加密
if($error_num>=3){
	$yzm = $_POST['yzm'];//验证码
	$yzm = strtoupper(trim($yzm));//将验证码转换为大写且清除空格和其他符号
	if($yzm){
		if($yzm == $_SESSION['validationcode']){
			$sql = "select * from ".$lc."_admin where lc_admin_name='{$user}' and lc_admin_password='{$password}'";
			$rs = mysql_query($sql);
			if($rows=mysql_fetch_assoc($rs)){
				$_SESSION['lc_admin_user_id']= $rows['lc_admin_id'];//用户id
				$_SESSION['lc_admin_name'] = $rows['lc_admin_name'];//用户名
				$_SESSION['lc_admin_issuper']= $rows['lc_admin_issuper'];//是否超级管理员
				setcookie("login_err",0,time()+18000,'/');//设置错误次数cookie
				$l_error['err']=1;//登录成功
			}else{
				$l_error['err']=-2;//用户名或密码输入错误
			}
		}else{
			$l_error['err']=-1;//验证码输入不正确
		}
	}else{
		$l_error['err']=-3;//验证码为空
	}
}else{
	$sql = "select * from ".$lc."_admin where lc_admin_name='{$user}' and lc_admin_password='{$password}'";
	$rs = mysql_query($sql);
	if($rows=mysql_fetch_assoc($rs)){
		$_SESSION['lc_admin_user_id']= $rows['lc_admin_id'];//用户id
		$_SESSION['lc_admin_name'] = $rows['lc_admin_name'];//用户名
		$_SESSION['lc_admin_issuper']= $rows['lc_admin_issuper'];//是否超级管理员
		$l_error['err']=1;//登录成功
	}else{
		$error_num=$error_num+1;
		setcookie("login_err",$error_num,time()+18000,'/');//设置错误次数cookie
		$l_error['err']=-2;//用户名或密码输入错误
	}
}
$l_error['num']=$error_num;//登录错误次数
SetSysEvent('login');//添加日志功能

echo json_encode($l_error);
?>