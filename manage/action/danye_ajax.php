<?php
/*单页修改删除处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('ajax');//管理员验证

$action = isset($_POST['action'])?$_POST['action']:null;

$id = isset($_POST['id'])?(int)$_POST['id']:0;
$del = isset($_POST['del'])?(int)$_POST['del']:0;//删除类型（1是删除0是放入回收站）

if($action == 'title'){
	/*标题修改*/
	$sql = "update ".$lc."_danye set lc_title = '{$title}' where lc_id = '{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo "yes";
	}else{
		echo "no";
	}
}elseif ($action == 'del'){
	/*放入回收站*/
	if($del=="0"){
		$sql = "update ".$lc."_danye set lc_del = 1,lc_del_time=NOW() where lc_id ='{$id}'";
		$rs = mysql_query($sql);
		if($rs && mysql_affected_rows()>0){
			echo 'yes';
		}else{
			echo 'no';
		}
	}
	if($del=="1"){
		/*删除*/
		$sql = "delete from ".$lc."_danye where lc_id='{$id}'";
		$rs = mysql_query($sql);
		if($rs && mysql_affected_rows()>0){
			echo 'yes';
		}else{
			echo 'no';
		}
	}
}elseif($action == 'num'){
	$lanmu = isset($_POST['lanmu'])?(int)$_POST['lanmu']:0;
	$key = isset($_POST['key'])?(string)$_POST['key']:null;
	
	$total_num = 0;
	$sql_num = "select lc_id from ".$lc."_danye ";
	$wheresql = ' where lc_del = 0 ';
	if($lanmu<>0){
		$wheresql.= " and lanmu = '{$lanmu}'";
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