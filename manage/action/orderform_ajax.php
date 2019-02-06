<?php
/*订单管理处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('ajax');//管理员验证

$action = isset($_POST['action'])?$_POST['action']:null;

$id = isset($_POST['id'])?(int)$_POST['id']:0;//编号

if($action == 'del'){
	/*删除*/
	$sql = "delete from ".$lc."_dingdan where lc_id='{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo yes;
	}else{
		echo no;
	}
}elseif ($action == 'zt'){
	$zt = isset($_POST['zt'])?(int)$_POST['zt']:0;
	
	$sql = "update ".$lc."_dingdan set lc_zt='{$zt}' where lc_id = '{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo "yes";//成功了
	}else{
		echo "no".$sql;//失败了
	}
}
?>