<?php
/*子导航修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('action');//管理员验证

require(LC_MX."Lib/upload.php");//加载图片上传类

$id = isset($_POST['id'])?(int)$_POST['id']:0;
$lc_title = isset($_POST['lc_title'])?escape_str($_POST['lc_title']):null;
$lc_link_url = isset($_POST['lc_link_url'])?escape_str($_POST['lc_link_url']):null;
$lc_rwlink_url = isset($_POST['lc_rwlink_url'])?escape_str($_POST['lc_rwlink_url']):null;
$lc_target = isset($_POST['lc_target'])?escape_str($_POST['lc_target']):null;
$lc_content = isset($_POST['lc_content'])?escape_str($_POST['lc_content']):null;
$lc_zt = isset($_POST['lc_zt'])?escape_str($_POST['lc_zt']):1;
$lc_parent_id = isset($_POST['lc_parent_id'])?(int)$_POST['lc_parent_id']:0;

if(!$id || !$lc_parent_id){
	mx_msg("请求参数错误,请关闭重新打开！",1);
	exit;
}
if($lc_title && $lc_link_url){
	
	$sql = "update ".$lc."_navigation set ";
	$sql.= "lc_link_url='{$lc_link_url}',";
	$sql.= "lc_rwlink_url='{$lc_rwlink_url}',";
	$sql.= "lc_target='{$lc_target}',";
	//导航图片保存
	if($_FILES['lc_pic']['name']<>""){
		$up=new upphoto;
		$up->get_ph_tmpname($_FILES['lc_pic']['tmp_name']);
		$up->get_ph_type($_FILES['lc_pic']['type']);
		$up->get_ph_size($_FILES['lc_pic']['size']);
		$up->get_ph_name($_FILES['lc_pic']['name']);
		$up->save();
		$sql.= "lc_pic='{$up->ph_name}',";
	}
	$sql.= "lc_content='{$lc_content}',";
	$sql.= "lc_zt='{$lc_zt}',";
	$sql.= "lc_edit_datetime=NOW()";
	$sql.= " where lc_id='{$id}'";
	
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		mx_msg("修改成功！","../nav_edit_submenu.php?id={$id}");
	}else{
		mx_msg("修改失败！",1);
	}
}else{
	mx_msg("标题或导航链接不能为空！",1);
}
?>