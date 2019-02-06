<?php
/*微信修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('ajax');//管理员验证

$action = isset($_POST['action'])?$_POST['action']:null;

if($action=='mi'){
	$sql = "select * from ".lc()."_miyao where lc_id=1";
	$rs = mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		if($rows['lc_value']<>""){
			echo "1";
		}else{
			echo "-1";
		}
	}
}
?>