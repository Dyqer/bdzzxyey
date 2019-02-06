<?php
/*下载修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('ajax');//管理员验证

$action = isset($_POST['action'])?$_POST['action']:null;

$id = isset($_POST['id'])?(int)$_POST['id']:0;//编号
$title = isset($_POST['title'])?escape_str($_POST['title']):null;//标题

if($action == 'title'){
	/*标题修改*/
	$sql = "update ".$lc."_down set lc_title = '{$title}' where lc_id = '{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo "yes";
	}else{
		echo "no";
	}
}elseif ($action == 'del'){
	/*删除*/
	$sql = "delete from ".$lc."_down where lc_id = '{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		del_pic_by_downid($id);//通过产品编号删除其图片
		echo "yes";
	}else{
		echo "no";
	}
}elseif($action == 'num'){
	
	$lanmu = isset($_POST['lanmu'])?(int)$_POST['lanmu']:0;
	$key = isset($_POST['key'])?(string)$_POST['key']:null;
	$c_id = isset($_POST['c_id'])?$_POST['c_id']:0;
	
	$total_num = 0;
	$wheresql = " where 1=1 ";
	$sql_num = "select lc_id from ".$lc."_down ";
	if($c_id<>0){
		$wheresql.= " and c_id in (".get_down_all_child_id($c_id)."{$c_id})";
	}
	if($lanmu<>0){
		$wheresql.= " and c_id in (select c_id from ".$lc."_down_type where lanmu = '{$lanmu}')";
	}
	if($key<>""){
		$wheresql.= " and lc_title like '%{$key}%'";
	}
	$sql_num = $sql_num.$wheresql;
	$rs_num = mysql_query($sql_num);
	if($rs_num){
		$total_num = mysql_num_rows($rs_num);
	}
	echo $total_num;
}
?>