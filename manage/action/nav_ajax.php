<?php
/*导航修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('ajax');//管理员验证

$action = isset($_POST['action'])?$_POST['action']:null;

$id = isset($_POST['id'])?(int)$_POST['id']:0;
$title = isset($_POST['title'])?escape_str($_POST['title']):null;
$url = isset($_POST['url'])?escape_str($_POST['url']):null;
$op = isset($_POST['op'])?(int)$_POST['op']:0;

if($id && $action){
	if($action=='title'){
		$sql = "update ".$lc."_navigation set lc_title='{$title}' where lc_id={$id}";
		$rs = mysql_query($sql);
		if($rs && mysql_affected_rows()>0){
			echo "yes";
		}else{
			echo "no";
		}
	}
	if($action=='url'){
		$sql = "update ".$lc."_navigation set lc_link_url='{$url}' where lc_id={$id}";
		$rs = mysql_query($sql);
		if($rs && mysql_affected_rows()>0){
			echo "yes";
		}else{
			echo "no";
		}
	}
	if($action=='zt'){
		$sql = "update ".$lc."_navigation set lc_zt='{$op}' where lc_id={$id}";
		$rs = mysql_query($sql);
		if($rs && mysql_affected_rows()>0){
			echo "yes";
		}else{
			echo "no";
		}
	}
	if($action=='del'){
		$sql = "delete from ".$lc."_navigation where lc_id='{$id}'";
		$rs = mysql_query($sql);
		if($rs && mysql_affected_rows()>0){
			echo "yes";
		}else{
			echo "no";
		}
	}
}
if($action=='num'){

	$total_num = 0;
	$sql = "select lc_id from ".lc()."_navigation";
	$rs = mysql_query($sql);
	if($rs){
		$total_num = mysql_num_rows($rs);
	}
	echo $total_num;
}
?>