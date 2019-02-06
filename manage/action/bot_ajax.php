<?php
/*底部 修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('ajax');//管理员验证

$id = isset($_POST['id'])?(int)$_POST['id']:0;//编号
$content = isset($_POST['content'])?escape_str($_POST['content']):null;

if($content){
	$sql = "update ".$lc."_dibu set lc_content='{$content}' where lc_id='{$id}'";
	
	$rs = mysql_query($sql);
	if($rs){
		echo "yes";//成功了
	}else{
		echo "no";//失败了
	}
}
?>