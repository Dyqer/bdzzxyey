<?php
/********************************
 * 分类排序修改type(1文章2图文3下载)
 ********************************/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('ajax');//管理员验证

$id = isset($_POST['id'])?(int)$_POST['id']:0;//分类编号
$sort_id = isset($_POST['sort_id'])?(int)$_POST['sort_id']:0;//排序编号
$type = isset($_POST['type'])?(int)$_POST['type']:0;//修改类型（1文章、2图文、3下载）

$table="";//数据库表名

if($id && $type){
	if($type==1){
		$table = $lc."_news_type";
	}
	if($type==2){
		$table = $lc."_products_type";
	}
	if($type==3){
		$table = $lc."_down_type";
	}
	$sql = "update {$table} set c_sort_id='{$sort_id}' where c_id='{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo "yes";//成功了
	}else{
		echo "no";//失败了
	}
}