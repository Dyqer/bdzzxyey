<?php
/*管理密码修改*/
require (dirname(dirname(__FILE__)).'/common/common.php');

$userid = isset($_SESSION['lc_admin_user_id'])?$_SESSION['lc_admin_user_id']:0;//获取当前管理员id
$password = isset($_POST['password'])?escape_str($_POST['password']):null;

if($userid){
	if($password){
		$password = md5($password);//密码MD5加密
		$sql = "update ".$lc."_admin set lc_admin_password='{$password}' where lc_admin_id='{$userid}'";
		$rs = mysql_query($sql);
		if($rs && mysql_affected_rows()>0){
			echo "yes";//修改成功
		}else{
			echo "no";//修改失败
		}
	}else{
		echo "-2";//密码不能为空
	}
}else{
	echo "-1";//未登录或登录已失效
}
?>