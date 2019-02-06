<?php
/*Banner修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('ajax');//管理员验证

$action = isset($_POST['action'])?$_POST['action']:null;

$id = isset($_POST['id'])?(int)$_POST['id']:0;//编号
$title = isset($_POST['title'])?escape_str($_POST['title']):null;//标题
$sort_id = isset($_POST['sort_id'])?(int)$_POST['sort_id']:0;//排序编号

if($action==1){
	//标题修改
	$sql = "update ".$lc."_banner set lc_title='{$title}' where lc_id='{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo "yes";//成功了
	}else{
		echo "no";//失败了
	}
}elseif($action==2){
	//排序修改
	$sql = "update ".$lc."_banner set lc_sort_id='{$sort_id}' where lc_id='{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo "yes";//成功了
	}else{
		echo "no";//失败了
	}
}elseif($action=='del'){
	//删除
	$cxsql="select lc_pic from ".lc()."_banner where lc_id='{$id}'";
	$cxrs = mysql_query($cxsql);
	if($cxrs && mysql_num_rows($cxrs)>0){
		$cxrows = mysql_fetch_assoc($cxrs);
	}
	$sql = "delete from ".$lc."_banner where lc_id='{$id}'";
	mysql_query($sql);
	if(mysql_affected_rows()>0){
		echo "yes";
		//判断图片是否存在并删除
		if(file_exists("../".$cxrows['lc_pic'])){
			unlink("../".$cxrows['lc_pic']);
		}
	}else{
		echo "no";
	}
}elseif ($action=='bannernum'){
	//获取banner总数
	$ctype = isset($_POST['ctype'])?$_POST['ctype']:1;//所属类型
	$c_id = isset($_POST['c_id'])?$_POST['c_id']:0;//所属分类
	
	$total_num = 0;
	$wheresql=" where lc_zt=1 and lc_type='{$ctype}'";
	if($c_id<>0){
		$wheresql.=" and c_id='{$c_id}' ";
	}
	$sql = "select lc_id from ".lc()."_banner ".$wheresql;
	$rs = mysql_query($sql);
	if($rs){
		$total_num = mysql_num_rows($rs);
	}
	echo $total_num;
}
?>