<?php
/*微信管理 修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('action');//管理员验证

$action = isset($_POST['action'])?$_POST['action']:'add';//默认添加

$key = isset($_POST['key'])?escape_str($_POST['key']):null;

if($action == 'add'){
	if($key){
		$sql = "update ".$lc."_miyao set lc_value='{$key}' where lc_id=1";
		$rs = mysql_query($sql);
		if($rs){
			mx_msg("绑定成功！","../list.php?C=weixin_manage");
		}else{
			mx_msg("添加失败！",1);
		}
	}else{
		mx_msg("密钥值不能为空！",1);
	}
}
?>

