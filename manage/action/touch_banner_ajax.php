<?php
/*手机banner修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('ajax');//管理员验证

$action = isset($_POST['action'])?$_POST['action']:null;

$id = isset($_POST['id'])?(int)$_POST['id']:0;//编号

if ($action == 'del'){
	/*删除*/
	$sql = "delete from ".lc()."_touch_banner where lc_id='{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo "yes";
	}else{
		echo "no";
	}
}elseif ($action == 'title'){
	$title = isset($_POST['title'])?escape_str($_POST['title']):0;//标题

	$sql = "update ".$lc."_touch_banner set lc_title='{$title}' where lc_id = '{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo "yes";//成功了
	}else{
		echo "no";//失败了
	}

}elseif ($action == 'sort'){
	$sort = isset($_POST['sortid'])?(int)$_POST['sortid']:0;//排序

	$sql = "update ".$lc."_touch_banner set lc_sort_id='{$sort}' where lc_id = '{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo "yes";//成功了
	}else{
		echo "no".$sql;//失败了
	}
}
?>