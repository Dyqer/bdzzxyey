<?php
/*文章分类修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('ajax');//管理员验证

$action = isset($_POST['action'])?$_POST['action']:null;

$id = isset($_POST['id'])?(int)$_POST['id']:0;//文章分类编号
$title = isset($_POST['title'])?escape_str($_POST['title']):0;//文章分类编号

if($action == 'title'){
	$sql = "update ".$lc."_news_type set c_title='{$title}' where c_id='{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo "yes";
	}else{
		echo "no";
	}
}elseif ($action == 'del'){
	/*文章分类 删除*/
	$sql = "delete from ".$lc."_news_type where c_id in (".get_news_all_child_id($id)."{$id})";
	$sql2 = "delete from ".$lc."_news where c_id in (".get_news_all_child_id($id)."{$id})";
	
	$rs = mysql_query($sql);
	$rs2 = mysql_query($sql);
	if($rs && $rs2){
		echo "yes";
	}else{
		echo "no";
	}
}