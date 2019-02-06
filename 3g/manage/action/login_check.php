<?php
require (dirname(dirname(__FILE__))."/common/common.php");

$c_name = isset($_POST['c_name'])?$_POST['c_name']:null;//管理员用户名
$c_password = isset($_POST['c_password'])?$_POST['c_password']:null;//管理员密码
$yzm = isset($_POST['yzm'])?$_POST['yzm']:null;//验证码

if($c_name=="" || $c_password==""){
	mx_msg("用户名和密码不能为空！",1);
}
if($yzm){
	$yzm = strtoupper(trim($yzm));//将验证码转换为大写且清除空格和其他符号
	$c_password = md5($c_password);
	if($yzm == $_SESSION['validationcode']){
		$sql = "select lc_admin_id,lc_admin_name from ".$lc."_admin where lc_admin_name='{$c_name}' and lc_admin_password='{$c_password}'";
		$rs = mysql_query($sql);
		if($rs && $rows = mysql_fetch_assoc($rs)){
			$_SESSION['c_name'] = $rows['lc_admin_name'];
			$_SESSION['c_id'] = $rows['lc_admin_id'];
			echo "<script>location.href='../main.php'</script>";
		}else{
			mx_msg("用户名或密码输入错误！",1);
		}
	}else{
		mx_msg("验证码输入不正确！",1);
	}
}else{
	mx_msg("验证码不能为空！",1);
}
?>