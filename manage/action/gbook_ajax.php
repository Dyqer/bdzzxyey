<?php
/*留言修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('ajax');//管理员验证

$action = isset($_POST['action'])?$_POST['action']:null;

$id = isset($_POST['id'])?(int)$_POST['id']:0;//栏目编号

if($action=='del'){
	/*删除*/
	$sql = "delete from ".$lc."_gbook where lc_id = '{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo yes;
	}else{
		echo no;
	}
}elseif ($action == 'reply'){
	
	$reply = isset($_POST['reply'])?escape_str($_POST['reply']):null;
	
	$sql = "update ".lc()."_gbook set ";
	$sql.= " lc_reply='{$reply}'";
	$sql.= ",lc_zt='1'";
	$sql.= " where lc_id='{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo "yes";//成功了
	}else{
		echo "no";//失败了
	}
}
?>