<?php
require (dirname(__FILE__)."/common/common.php");

wap_admin_check_login();//登录验证

$action = isset($_POST['action'])?$_POST['action']:null;

$lanmu = isset($_POST['lanmu'])?(int)$_POST['lanmu']:0;//所属栏目
$title = isset($_POST['lc_title'])?escape_str($_POST['lc_title']):null;//标题
$content = isset($_POST['lc_content'])?escape_str($_POST['lc_content']):null;//pc版内容
$phone_content = isset($_POST['lc_phone_content'])?escape_str($_POST['lc_phone_content']):null;//手机版
$keywords = isset($_POST['lc_keywords'])?escape_str($_POST['lc_keywords']):null;//关键词
$description = isset($_POST['lc_description'])?escape_str($_POST['lc_description']):null;//描述

$id = isset($_POST['id'])?(int)$_POST['id']:0;//单页编号
$type = isset($_POST['type'])?(string)$_POST['type']:null;//修改类型（touch和pc）
$content = isset($_POST['content'])?escape_str($_POST['content']):null;

if($action == 'add'){
	if($title){

		$sql = "insert into ".$lc."_danye(lc_title,lc_content,lc_phone_content,lc_zt,lc_phone,lanmu,lc_keywords,lc_description)
		values('{$title}','{$content}','{$phone_content}',1,1,'{$lanmu}','{$keywords}','{$description}')";
		$rs = mysql_query($sql);
		if($rs){
			mx_wap_msg("添加成功！","danye_add.php?lanmu={$lanmu}");
		}else{
			mx_wap_msg("添加失败！",1);
		}
	}else{
		mx_wap_msg("标题不能为空！",1);
	}
}elseif ($action == 'edit'){
	if($title){

		$sql = "update ".lc()."_danye set ";
		$sql.=" lc_title='{$title}',";
		if($type=="pc"){
			$sql.="lc_content='{$content}'";
		}elseif($type=="touch"){
			$sql.="lc_phone_content='{$content}'";
		}
		$sql = $sql." where lc_id = '{$id}'";
		$rs = mysql_query($sql);
		if($rs){
			mx_wap_msg("修改成功！","danye_edit.php?lanmu={$lanmu}&id={$id}&type={$type}");
		}else{
			mx_wap_msg("修改失败！",1);
		}
	}else{
		mx_wap_msg("标题不能为空！",1);
	}
}else{
	mx_wap_msg("请求参数错误！",1);
}
?>