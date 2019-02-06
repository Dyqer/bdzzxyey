<?php
require (dirname(dirname(__FILE__))."/common/common.php");

wap_check_login_ajax();

$action = isset($_POST['action'])?$_POST['action']:null;

$id = isset($_POST['id'])?(int)$_POST['id']:0;
$title = isset($_POST['title'])?escape_str($_POST['title']):null;//标题
$type = isset($_POST['type'])?(int)$_POST['type']:0;//类型(1为手机2为pc)

if($action == 'title'){
	$col="";
	if($type==1){
		$col="c_phone_name='{$title}'";
	}
	if($type==2){
		$col="c_title='{$title}'";
	}
	$sql = "update {$lc}_lanmu set {$col} where c_id='{$id}'";
	$rs = mysql_query($sql);

	if($rs && mysql_affected_rows()>0){
		echo "yes";
	}else{
		echo "no";
	}
}