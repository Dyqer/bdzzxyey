<?php
/*留言修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('action');//管理员验证

$action = isset($_POST['action'])?$_POST['action']:'edit';//默认修改

$reply = isset($_POST['lc_reply'])?escape_str($_POST['lc_reply']):null;
$zt = isset($_POST['lc_zt'])?escape_str($_POST['lc_zt']):null;

$id = isset($_POST['id'])?(int)$_POST['id']:0;//编号

$sql = "update ".$lc."_gbook set ";
$sql.= " lc_reply='{$reply}'";
$sql.= " ,lc_zt='{$zt}'";
$sql.= " where lc_id='{$id}'";
$rs = mysql_query($sql);

if($rs){
	mx_msg("修改成功！","../gbook_edit.php?id={$id}");
}else{
	mx_msg("修改失败！",1);
}
?>
