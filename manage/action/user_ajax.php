<?php
/*会员修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('ajax');//管理员验证

$action = isset($_POST['action'])?$_POST['action']:null;

$id = isset($_POST['id'])?(int)$_POST['id']:0;//栏目编号

if($action=='del'){
	/*删除*/
	$sql = "delete from ".$lc."_user where lc_id = '{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo yes;
	}else{
		echo no;
	}
}elseif ($action == 'num'){
	
	$key = isset($_POST['key'])?(string)$_POST['key']:null;
	
	$total_num = 0;
	$sql_num = "select lc_id from ".lc()."_user ";
	$wheresql = "";
	if($key<>""){
		$wheresql = " where lc_title like '%{$key}%'";
	}
	$sql_num = $sql_num.$wheresql;

	$rs_num = mysql_query($sql_num);
	if($rs_num){
		$total_num = mysql_num_rows($rs_num);
	}
	echo $total_num;
}
?>