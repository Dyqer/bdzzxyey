<?php
require (dirname(__FILE__)."/common/common.php");

wap_admin_check_login();//登录验证

$sql="SELECT touch_name,touch_url,touch_keywords,touch_description FROM ".$lc."_touch WHERE id=1";
$rs = mysql_query($sql);
if($rs){
	$rows = mysql_fetch_assoc($rs);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title><?php echo constant("web_name")?>- 后台管理系统 - Powered by 龙采MX</title>
<?php require ('link_files.php')?>
</head>
<body>
<?php require ('head.php')?>
<div id="top">
  <div class="top_left"><?php echo wap_admin_top()?></span></div>
  <div class="top_right"><a id="touch2" onClick="Tab_to_switch('touch',2,2)">PC设置</a></div>
  <div class="top_right"><a id="touch1" class="tubiao_hover" onClick="Tab_to_switch('touch',1,2)">手机设置</a></div>
  <div class="clear"></div>
</div>
<div id="con_touch_1">
  <form method="post" action="action/config_action.php">
    <input name="action" type="hidden" value="touch">
    <div class="froms option con">
      <p>网站名称：
        <input type="text" name="web_name" value="<?php echo $rows['touch_name']?>">
      </p>
      <p>网关键词：
        <input type="text" name="web_keywords" class="textCo" value="<?php echo $rows['touch_keywords']?>">
      </p>
      <p>网站描述：
        <input type="text" name="web_description" class="textCo" value="<?php echo $rows['touch_description']?>">
      </p>
      <p>&nbsp;</p>
      <p>
        <input value="确定" type="submit" class="bton_1"/>
        <input type="reset" value="重置" class="bton_1">
      </p>
    </div>
  </form>
</div>
<div id="con_touch_2" style="display:none">
  <form method="post" action="action/config_action.php">
    <input name="action" type="hidden" value="pc">
    <div class="froms option con">
      <p>网站名称：
        <input type="text" name="web_name" value="<?php echo constant("web_name")?>">
      </p>
      <p>网关键词：
        <input type="text" name="web_keywords" class="textCo" value="<?php echo constant("web_keywords")?>">
      </p>
      <p>网站描述：
        <input type="text" name="web_description" class="textCo" value="<?php echo constant("web_description")?>">
      </p>
      <p>&nbsp;</p>
      <p>
        <input type="submit" value="确定" class="bton_1">
        <input type="reset" value="重置" class="bton_1">
      </p>
    </div>
  </form>
</div>
</body>
</html>