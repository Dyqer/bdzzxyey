<?php
/*会员等级分类修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('ajax');//管理员验证

$action = isset($_POST['action'])?$_POST['action']:null;

$id = isset($_POST['id'])?(int)$_POST['id']:0;//分类编号
$title = isset($_POST['title'])?escape_str($_POST['title']):0;//分类标题

if($action == 'title'){
	$sql = "update ".$lc."_user_type set lc_title='{$title}' where lc_id='{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo "yes";
	}else{
		echo "no";
	}
}elseif ($action == 'del'){
	/*分类 删除*/
	$sql = "delete from ".$lc."_user_type where lc_id = '{$id}'";
	$rs = mysql_query($sql);
	if($rs){
		echo "yes";
	}else{
		echo "no";
	}
}