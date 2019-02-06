<?php
/*回收站 数据恢复处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('ajax');//管理员验证

$action = isset($_POST['action'])?$_POST['action']:null;

$id = isset($_POST['id'])?(int)$_POST['id']:0;//编号

if($action=='lanmu'){
	/*恢复删除的栏目*/
	$sql = "update ".$lc."_lanmu set c_zt=1 where c_id = '{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo yes;
		$type = get_type_by_lanmu($id);//通过栏目id获取所属类型
		if($type==1){
			//文章
			$up_sql="update ".lc()."_news_type set c_del=0 where lanmu = '{$id}'";//恢复该栏目的所有分类
			mysql_query($up_sql);
		}
		if($type==2){
			//图文
			$up_sql="update ".lc()."_products_type set c_del=0 where lanmu = '{$id}'";//恢复该栏目的所有分类
			mysql_query($up_sql);
		}
	}else{
		echo no;
	}
}elseif ($action=='danye'){
	/*恢复删除的单页*/
	$sql = "update ".$lc."_danye set lc_del=0 where lc_id = '{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo yes;
	}else{
		echo no;
	}
}elseif ($action=='news'){
	/*恢复删除的文章*/
	$sql = "update ".$lc."_news set lc_del = 0 where lc_id = '{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo yes;
	}else{
		echo no;
	}
}elseif ($action=='products'){
	/*恢复删除的图文*/
	$sql = "update ".$lc."_products set lc_del = 0 where lc_id = {$id}";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo yes;
	}else{
		echo no;
	}
}
?>