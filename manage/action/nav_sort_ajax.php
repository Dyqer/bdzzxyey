<?php
/*导航排序处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('ajax');//管理员验证

$order = isset($_POST['order'])?$_POST['order']:null;
$ids = isset($_POST['ids'])?trim($_POST['ids']):null;

$orderArr=explode(",",$order);
$oldidsArr=explode(",",$ids);

$len=count($orderArr);

for($i=0;$i<$len;$i++){
	$query = mysql_query("update ".lc()."_navigation set lc_sort_id='{$orderArr[$i]}' where lc_id='{$oldidsArr[$i]}'");
}
if($query && mysql_affected_rows()>0){
	echo "yes";
}else{
	echo "no";
}
?>