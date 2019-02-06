<?php
/*栏目修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('ajax');//管理员验证

$action = isset($_POST['action'])?$_POST['action']:null;

$id = isset($_POST['id'])?(int)$_POST['id']:0;//栏目编号
$title = isset($_POST['title'])?escape_str($_POST['title']):null;//栏目标题

if($action == 'title'){
	/*栏目标题修改*/
	$sql = "update ".$lc."_lanmu set c_title = '{$title}' where c_id = '{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo "yes";
	}else{
		echo "no";
	}
}elseif ($action == 'del'){

	$type = isset($_POST['type'])?(int)$_POST['type']:0;//栏目类型
	$del = isset($_POST['del'])?(int)$_POST['del']:0;//删除类型（1是删除0是放入回收站）

	if($del=="0"){

		$sql="update ".$lc."_lanmu set c_zt=0 where c_delete=0 and c_id='{$id}'";
		$rs = mysql_query($sql);
		if(mysql_affected_rows()>0){
			echo yes;
			recycle_lanmu_by_cid($id,$type);//将该栏目下所有资源 放入回收站
		}else{
			echo no;
		}
	}elseif($del=="1"){

		$sql = "delete from ".lc()."_lanmu where c_delete=0 and c_id='{$id}'";
		$rs = mysql_query($sql);
		if(mysql_affected_rows()>0){
			echo yes;
			del_lanmu_by_cid($id,$type);//将该栏目下所有资源删除
		}else{
			echo no;
		}
	}else{
		echo '-1';//删除类型参数为空
	}
}elseif ($action == 'num'){
	
	$key = isset($_POST['key'])?(string)$_POST['key']:null;
	
	$total_num = 0;

	$sql = "select c_id from ".$lc."_lanmu where c_zt!=0 ";
	if($key<>""){
		$sql = $sql." and c_title like '%{$key}%'";
	}
	$rs = mysql_query($sql);
	if($rs){
		$total_num = mysql_num_rows($rs);
	}
	echo $total_num;
}elseif ($action == 'zt'){
	
	$op = isset($_POST['op'])?(int)$_POST['op']:0;//操作值
	$op_t = isset($_POST['op_t'])?escape_str($_POST['op_t']):null;//操作类型
	
	if($op_t){
		if($op_t=='pc'){
			$fields = 'c_pc';
		}elseif($op_t=='phone'){
			$fields = 'c_phone';
		}
		$sql = "update ".$lc."_lanmu set ".$fields." = '{$op}' where c_id = '{$id}'";
		$rs = mysql_query($sql);
		if($rs && mysql_affected_rows()>0){
			echo "yes";
		}else{
			echo "no".$sql;
		}
	}
}
?>