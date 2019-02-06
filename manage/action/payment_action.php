<?php
/*支付管理 修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('action');//管理员验证

$partner = isset($_POST['partner'])?escape_str($_POST['partner']):null;
$key = isset($_POST['key'])?escape_str($_POST['key']):null;
$email = isset($_POST['seller_email'])?escape_str($_POST['seller_email']):null;

update_config("partner",$_POST['partner']);
update_config("key",$_POST['key']);
update_config("seller_email",$_POST['seller_email']);

mx_msg("修改成功！","../list.php?C=payment");
?>
