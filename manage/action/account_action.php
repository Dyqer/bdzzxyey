<?php
/*创建新管理员*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('action');//管理员验证

$action = isset($_POST['action'])?$_POST['action']:'add';//默认添加

$username = isset($_POST['admin_username'])?escape_str($_POST['admin_username']):null;
$password = isset($_POST['admin_password'])?escape_str($_POST['admin_password']):null;
$rpassword = isset($_POST['admin_rpassword'])?escape_str($_POST['admin_rpassword']):null;

//获取相应权限(默认0无权限)
$xitong = isset($_POST['xitong'])?(int)$_POST['xitong']:0;
$lanmu = isset($_POST['lanmu'])?(int)$_POST['lanmu']:0;
$danye = isset($_POST['danye'])?(int)$_POST['danye']:0;
$news = isset($_POST['news'])?(int)$_POST['news']:0;
$products = isset($_POST['products'])?(int)$_POST['products']:0;
$down = isset($_POST['down'])?(int)$_POST['down']:0;
$user = isset($_POST['user'])?(int)$_POST['user']:0;
$gbook = isset($_POST['gbook'])?(int)$_POST['gbook']:0;
$job = isset($_POST['job'])?(int)$_POST['job']:0;
$dingdan = isset($_POST['dingdan'])?(int)$_POST['dingdan']:0;
$gaoji = isset($_POST['gaoji'])?(int)$_POST['gaoji']:0;
$touch = isset($_POST['touch'])?(int)$_POST['touch']:0;
$weixin = isset($_POST['weixin'])?(int)$_POST['weixin']:0;
$hsz = isset($_POST['hsz'])?(int)$_POST['hsz']:0;
$nav = isset($_POST['nav'])?(int)$_POST['nav']:0;

if($action == 'add'){
	if($username=="" || $password==""){
		mx_msg("亲，用户名和密码不能为空！",1);
		exit;
	}
	if($password!==$rpassword){
		mx_msg("亲，两次输入密码不一致，请重新输入！",1);
		exit;
	}
	$sql_have = "select lc_admin_id from ".$lc."_admin where lc_admin_name = '{$username}'";
	$rs_have = mysql_query($sql_have);
	if(mysql_num_rows($rs_have)>0){
		mx_msg("亲，用户名已经存在，请重新输入！",1);
		exit;
	}
	$password = md5($password);//密码md5加密

	$sql = "insert into ".$lc."_admin (lc_admin_name,lc_admin_password,lc_admin_issuper,xitong,lanmu,danye,news,products,down,user,gbook,job,dingdan,gaoji,touch,hsz,weixin,nav)
	values ('{$username}','{$password}',0,{$xitong},{$lanmu},{$danye},{$news},{$products},{$down},{$user},{$gbook},{$job},{$dingdan},{$gaoji},{$touch},{$hsz},{$weixin},{$nav})";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		mx_msg("亲，帐号创建成功！","../list.php?C=account_list&nav=2");
	}else{
		mx_msg("亲，帐号创建失败！",1);
	}
}elseif ($action == 'edit'){
	$id = isset($_POST['id'])?(int)$_POST['id']:0;//编号
	if($password!==$rpassword){
		mx_msg("亲，两次输入密码不一致，请重新输入！",1);
		exit;
	}
	$password = md5($password);//密码md5加密

	$sql = "update ".$lc."_admin set ";
	$sql.= " xitong='{$xitong}'";
	if($password){
		$sql.= " ,lc_admin_password='{$password}'";
	}
	$sql.= " ,lanmu='{$lanmu}'";
	$sql.= " ,danye='{$danye}'";
	$sql.= " ,news='{$news}'";
	$sql.= " ,products='{$products}'";
	$sql.= " ,down='{$down}'";
	$sql.= " ,user='{$user}'";
	$sql.= " ,gbook='{$gbook}'";
	$sql.= " ,job='{$job}'";
	$sql.= " ,dingdan='{$dingdan}'";
	$sql.= " ,gaoji='{$gaoji}'";
	$sql.= " ,touch='{$touch}'";
	$sql.= " ,hsz='{$hsz}'";

	$sql.= " where lc_admin_id='{$id}'";
	$rs = mysql_query($sql);
	if($rs){
		mx_msg("亲，修改成功！","../account_edit.php?id={$id}");
	}else{
		mx_msg("亲，修改失败！",1);
	}
}else{
	mx_msg("请求参数有误！",1);
}
?>