<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('weixin');//微信管理权限验证
SetSysEvent('weixin_manage');//添加日志功能

$sql = "select * from ".lc()."_miyao where lc_id=1";
$rs = mysql_query($sql);
if($rs){
	$rows = mysql_fetch_assoc($rs);
}
$url = urlencode(dirname('http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"]));
?>
<!--fu_right_top-->
<div class="fu_right_top">
  <div class="mx_manage_gj"> <a onClick="weixinguanli(6)" class="touch_nav">微信管理</a> <a href="list.php?C=weixin">密钥管理</a> </div>
</div>
<!--end fu_right_top-->
<div style="width:100%; height:25px"></div>
<div id="touch_banner">
  <iframe src="http://v.longcai.pw/mx/index.php?token=<?php echo $rows['lc_value']?>&url=<?php echo $url?>" id="mainiframe" name="mainiframe" width="100%" allowtransparency="true"
	frameborder="0" scrolling="no"></iframe>
</div>