<?php
/*banner分类修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('ajax');//管理员验证

$action = isset($_POST['action'])?$_POST['action']:null;

$id = isset($_POST['id'])?(int)$_POST['id']:0;//获取编号
$title = isset($_POST['title'])?escape_str($_POST['title']):null;
$sort_id = isset($_POST['sort_id'])?(int)$_POST['sort_id']:0;//获取排序值

if($action == 'title'){
	//标题
	$sql = "update ".$lc."_banner_type set c_title='{$title}' where c_id='{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo "yes";//成功了
	}else{
		echo "no";//失败了
	}
}elseif($action == 'sort'){
	//排序
	$sql = "update ".$lc."_banner_type set c_sort_id='{$sort_id}' where c_id='{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo "yes";//成功了
	}else{
		echo "no";//失败了
	}
}elseif($action == 'del'){
	//分类 删除
	$sql = "delete from ".$lc."_banner_type where c_id = '{$id}'";
	$sql2 = "delete from ".$lc."_banner where c_id = '{$id}'";
	
	$rs = mysql_query($sql);
	$rs2 = mysql_query($sql2);
	if($rs && $rs2){
		echo "yes";
	}else{
		echo "no";
	}
}
?>