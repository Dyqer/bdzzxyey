<?php
require (dirname(dirname(__FILE__))."/common/common.php");

wap_check_login_ajax();

$action = isset($_POST['action'])?$_POST['action']:null;

$id = isset($_POST['id'])?(int)$_POST['id']:0;
$title = isset($_POST['title'])?escape_str($_POST['title']):null;//标题

if($action == 'title'){
	$sql = "update {$lc}_products set lc_title='{$title}' where lc_id='{$id}'";
	$rs = mysql_query($sql);

	if($rs && mysql_affected_rows()>0){
		echo "yes";
	}else{
		echo "no";
	}
}elseif ($action == 'del'){
	$sql = "update ".$lc."_products set lc_del = 1,lc_del_time=NOW() where lc_id='{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo yes;
	}else{
		echo no;
	}
}elseif ($action == 'pictitle'){
	$sql = "update {$lc}_products_pics set lc_title='{$title}' where lc_id='{$id}'";
	$rs = mysql_query($sql);

	if($rs && mysql_affected_rows()>0){
		echo "yes";
	}else{
		echo "no";
	}
}elseif ($action == 'picfengmian'){

	$product_id = isset($_POST['product_id'])?(int)$_POST['product_id']:0;

	//先设置所有图片不是封面图
	$sql = "update ".$lc."_products_pics set lc_fengmian='0' where product_id='{$product_id}'";
	mysql_query($sql);
	//再设置某张图片为封面图
	$sqlw = "update ".$lc."_products_pics set lc_fengmian='1' where lc_id='{$id}'";
	$rs = mysql_query($sqlw);

	if($rs && mysql_affected_rows()>0){
		echo yes;//成功了
	}else{
		echo no;//失败了
	}
}elseif ($action == 'picdel'){

	$sql="select lc_pic from ".lc()."_products_pics where lc_id='{$id}'";
	$rs = mysql_query($sql);
	$pic_url = "";//图片路径
	if($rs && mysql_num_rows($rs)>0){
		$rows = mysql_fetch_assoc($rs);
		$pic_url = $rows['lc_pic'];
	}

	$sql = "delete from ".$lc."_products_pics where lc_id='{$id}'";
	$rs=mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		//判断图片是否存在并删除
		if(file_exists(LC_MX_3G.$pic_url)){
			unlink(LC_MX_3G.$pic_url);
		}
		echo yes;
	}else{
		echo no;
	}
}
?>