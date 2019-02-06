<?php
/*排序修改type(1文章2图文)*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('ajax');//管理员验证

$id = isset($_POST['id'])?(int)$_POST['id']:0;//编号
$type = isset($_POST['type'])?(int)$_POST['type']:0;//修改类型（1文章、2图文）
$paixu = isset($_POST['paixu'])?(int)$_POST['paixu']:0;//排序编号

$table="";//数据库表名

if($id&&$type){
	if($type==1){
		$table=$lc."_news";
	}
	if($type==2){
		$table=$lc."_products";
	}
	if($type==3){
		$table=$lc."_down";
	}
	if($type==4){
		$table=$lc."_job";
	}
	$sql = "update ".$table." set lc_sort_id='{$paixu}' where lc_id='{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo "yes";//成功了
	}else{
		echo "no";//失败了
	}
}