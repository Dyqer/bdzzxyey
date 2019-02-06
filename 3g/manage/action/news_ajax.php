<?php
require (dirname(dirname(__FILE__))."/common/common.php");

wap_check_login_ajax();

$action = isset($_POST['action'])?$_POST['action']:null;

$id = isset($_POST['id'])?(int)$_POST['id']:0;
$title = isset($_POST['title'])?escape_str($_POST['title']):null;//标题

if($action == 'del'){
	$sql = "update ".$lc."_news set lc_del = 1,lc_del_time=NOW() where lc_id='{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo yes;
	}else{
		echo no;
	}
}elseif ($action == 'title'){
	$sql = "update {$lc}_news set lc_title='{$title}' where lc_id='{$id}'";
	$rs = mysql_query($sql);

	if($rs && mysql_affected_rows()>0){
		echo "yes";
	}else{
		echo "no";
	}
}
?>