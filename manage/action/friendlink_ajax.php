<?php
/*友情链接 修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('ajax');//管理员验证

$action = isset($_POST['action'])?$_POST['action']:null;

$id = isset($_POST['id'])?(int)$_POST['id']:0;//编号
$title = isset($_POST['title'])?escape_str($_POST['title']):null;//标题
$sort_id = isset($_POST['sort_id'])?(int)$_POST['sort_id']:0;//排序编号
$zt = isset($_POST['zt'])?(int)$_POST['zt']:0;//状态（隐藏、显示）

if($action=='title'){
	//标题修改
	$sql = "update ".$lc."_friendlink set lc_title='{$title}' where lc_id='{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo "yes";//成功了
	}else{
		echo "no";//失败了
	}
}elseif($action=='sort'){
	//排序修改
	$sql = "update ".$lc."_friendlink set lc_sort_id='{$sort_id}' where lc_id='{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo "yes";//成功了
	}else{
		echo "no";//失败了
	}
}elseif($action=='del'){
	//删除
	$cxsql="select lc_pic from ".lc()."_friendlink where lc_id='{$id}'";
	$cxrs = mysql_query($cxsql);
	$pic = "../";
	if($cxrs && mysql_num_rows($cxrs)>0){
		$cxrows = mysql_fetch_assoc($cxrs);
		$pic.= $cxrows['lc_pic'];
	}
	$sql = "delete from ".$lc."_friendlink where lc_id='{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo "yes";//成功了

		//判断图片是否存在并删除
		if(file_exists(LC_MX_M.$pic)){
			unlink(LC_MX_M.$pic);
		}
	}else{
		echo "no";//失败了
	}
}elseif ($action=='zt'){
	//显示与隐藏
	$sql = "update ".$lc."_friendlink set lc_zt='{$zt}' where lc_id='{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo "yes";//成功了
	}else{
		echo "no";//失败了
	}
}elseif($action == 'num'){
	
	$c_id = isset($_POST['c_id'])?$_POST['c_id']:0;
	
	$total_num = 0;
	$sql_num = "select lc_id from ".$lc."_friendlink";
	$wheresql=" where 1=1 ";
	if($c_id<>0){
		$wheresql.=" and c_id='{$c_id}' ";
	}
	$sql_num = $sql_num.$wheresql;
	$rs_num = mysql_query($sql_num);
	if($rs_num){
		$total_num = mysql_num_rows($rs_num);
	}
	echo $total_num;
}
?>