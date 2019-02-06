<?php
require('../class/conn.php');
require('admin_top_inc.php');
$lc_admin_id = (int)$_GET['lc_admin_id'];

$sql = "delete from ".$lc."_admin where lc_admin_id = {$lc_admin_id}";

$rs = mysql_query($sql);
if($rs){
	fn_location("删除成功！","manage_list.php");
}else{
	fn_location("删除失败！","manage_list.php");
}
?>