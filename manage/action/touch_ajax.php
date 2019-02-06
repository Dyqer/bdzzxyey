<?php
/*手机修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('ajax');//管理员验证

$action = isset($_POST['action'])?$_POST['action']:null;

$id = isset($_POST['id'])?(int)$_POST['id']:0;//编号

if ($action == 'bot' && $id){
	$con = isset($_POST['content'])?$_POST['content']:null;//底部
	
	$sql = "update ".lc()."_touch set touch_footer='{$con}' where id='{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo "yes";
	}else{
		echo "no";
	}
}elseif ($action == 'intro' && $id){
	$con = isset($_POST['content'])?$_POST['content']:null;//简介
	
	$sql = "update ".lc()."_touch set touch_companyinfo = '{$con}' where id='{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo "yes";
	}else{
		echo "no";
	}
}