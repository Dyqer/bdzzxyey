<?php
require (dirname(__FILE__)."/common/common.php");

wap_admin_check_login();//登录验证

$action = isset($_POST['action'])?$_POST['action']:null;

$id = isset($_POST['id'])?(int)$_POST['id']:0;
$reply = isset($_POST['lc_reply'])?escape_str($_POST['lc_reply']):null;

if($action == 'reply'){
	if($reply){
		$sql = "update ".$lc."_gbook set ";
		$sql.=" lc_reply='{$reply}',";
		$sql.="lc_zt=1";
		$sql.=" where lc_id='{$id}'";
		$rs = mysql_query($sql);
		if($rs){
			mx_wap_msg("回复成功！","gbook_replay.php?id={$id}");
		}else{
			mx_wap_msg("回复失败！",1);
		}
	}else{
		mx_wap_msg("回复内容不能为空！",1);
	}
}