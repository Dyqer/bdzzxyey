<?php
/*单页添加修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('action');//管理员验证

$action = isset($_POST['action'])?$_POST['action']:'add';//默认添加

$title = isset($_POST['lc_title'])?escape_str($_POST['lc_title']):null;//标题
$content = isset($_POST['lc_content'])?escape_str($_POST['lc_content']):null;

if($title){
	if($action == 'add'){
		$sql = "insert into ".$lc."_user_type(lc_title,lc_content) values ('{$title}','{$content}')";
		$rs = mysql_query($sql);
		if($rs && mysql_affected_rows()>0){
			mx_msg("添加成功！","../user_type_add.php");
		}else{
			mx_msg("添加失败！",1);
		}
	}elseif ($action == 'edit' && $id){
		$sql = "update ".$lc."_user_type set ";
		$sql.= " lc_title='{$title}',";
		$sql.= "lc_content='{$content}'";
		$sql.= " where lc_id='{$id}'";
		$rs = mysql_query($sql);
		if($rs){
			mx_msg("修改成功！","../user_type_edit.php?id=".$id);
		}else{
			mx_msg("修改失败！",1);
		}
	}else{
		mx_msg("请求参数有误！",1);
	}
}else{
	mx_msg("标题不能为空！",1);
}
?>