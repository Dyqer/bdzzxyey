<?php
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('ajax');//管理员验证
/*删除*/
$sql = "delete from ".$lc."_admin where lc_admin_id = '{$id}'";
if(mysql_query($sql)){
	 echo 'yes';
}else{
	echo 'no';	
}
?>
