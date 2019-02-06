<?php
/*字段 修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('ajax');//管理员验证

$action = isset($_POST['action'])?$_POST['action']:null;

$id = isset($_POST['id'])?(int)$_POST['id']:0;
$title = isset($_POST['title'])?escape_str($_POST['title']):null;
$op = isset($_POST['op'])?(int)$_POST['op']:0;

if($id && $action){
	if($action=='title'){
		$oldfield = get_field_by_id($id,'lc_fieldname');
		$sql = "update ".$lc."_customfields set lc_fieldname='{$title}' where lc_id='{$id}'";
		$rs = mysql_query($sql);
		if($rs && mysql_affected_rows()>0){
			echo "yes";
			if(get_field_by_id($id,'lc_zt')==0){
				update_field($oldfield,$id);
			}
		}else{
			echo "no";
		}
	}
	if($action=='zt'){
		$sql = "update ".$lc."_customfields set lc_zt='{$op}' where lc_id='{$id}'";
		$rs = mysql_query($sql);
		if($rs && mysql_affected_rows()>0){
			echo "yes";
			if($op==1){
				del_field($id);
			}else{
				add_field($id);
			}
		}else{
			echo "no";
		}
	}
	if($action=='del'){
		$sql = "delete from ".$lc."_customfields where lc_id='{$id}'";
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
	$sql = "select lc_id from ".lc()."_customfields";
	$rs = mysql_query($sql);
	if($rs){
		$total_num = mysql_num_rows($rs);
	}
	echo $total_num;
}
?>