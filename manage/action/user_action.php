<?php
/*单页添加修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('action');//管理员验证

$action = isset($_POST['action'])?$_POST['action']:'add';//默认添加

$username = isset($_POST['username'])?escape_str($_POST['username']):null;//会员名
$password = isset($_POST['password'])?escape_str($_POST['password']):null;//密码
$password2 = isset($_POST['password2'])?escape_str($_POST['password2']):null;//确认密码
$zt = isset($_POST['lc_zt'])?escape_str($_POST['lc_zt']):null;//会员等级
$name = isset($_POST['lc_name'])?escape_str($_POST['lc_name']):null;//会员姓名
$tel = isset($_POST['lc_tel'])?escape_str($_POST['lc_tel']):null;//电话
$email = isset($_POST['lc_email'])?escape_str($_POST['lc_email']):null;//邮箱
$ip = getip();//ip地址

$id = isset($_POST['id'])?(int)$_POST['id']:0;//会员编号

if($action == 'add'){
	if($username=="" || $password==""){
		mx_msg("用户名和密码不能为空！",1);
		exit;
	}
	if($password<>$password2){
		mx_msg("两次输入密码不一致，请重新输入！",1);
		exit;
	}
	$sql_have = "select * from ".$lc."_user where lc_title = '{$username}'";
	$rs_have = mysql_query($sql_have);
	if(mysql_num_rows($rs_have)>0){
		mx_msg("用户名已经存在，请重新输入！",1);
		exit;
	}

	$password = md5($password);//加密

	$sql = "insert into ".$lc."_user (lc_title,lc_password,lc_name,lc_tel,lc_email,lc_zt,lc_ip,lc_datetime)
	 values ('{$username}','{$password}','{$name}','{$tel}','{$email}','{$zt}','{$ip}',NOW())";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		mx_msg("注册成功！","../user_add.php");
	}else{
		mx_msg("注册失败！",1);
	}
}elseif ($action == 'edit' && $id){
	$sql = "update ".$lc."_user set lc_title='{$username}',";
	if($password){
		$password=md5($password);
		$sql.= " lc_password='{$password}',";
	}
	$sql.= " lc_tel='{$tel}',";
	$sql.= " lc_email='{$email}',";
	$sql.= " lc_name='{$name}',";
	$sql.= " lc_zt='{$zt}'";
	$sql.= " where lc_id='{$id}'";

	$rs = mysql_query($sql);
	if($rs){
		mx_msg("修改成功！","../user_edit.php?id={$id}");
	}else{
		mx_msg("修改失败！",1);
	}
}else{
	mx_msg("请求参数有误！",1);
}
?>