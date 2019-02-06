<?php
/*下载分类修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('ajax');//管理员验证

$action = isset($_POST['action'])?$_POST['action']:null;

$id = isset($_POST['id'])?(int)$_POST['id']:0;//文章分类编号
$title = isset($_POST['title'])?escape_str($_POST['title']):null;//文章分类编号

if($action == 'title'){
	$sql = "update ".$lc."_down_type set c_title='{$title}' where c_id='{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo "yes";
	}else{
		echo "no";
	}
}elseif ($action == 'del'){
	$tsql = "delete from ".$lc."_down_type where c_id in (".get_down_all_child_id($id)."{$id})";
	$sql = "delete from ".$lc."_down where c_id in (".get_down_all_child_id($id)."{$id})";
	
	$trs = mysql_query($tsql);
	$rs = mysql_query($sql);
	if($trs && $rs){
		echo "yes";
	}else{
		echo "no";
	}
}
?>