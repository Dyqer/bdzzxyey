<?php
require (dirname(__FILE__)."/common/common.php");

wap_admin_check_login();//登录验证
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
  <div class="top_left"><?php echo wap_admin_top() ?></span></div>
  <div class="top_right"><a id="touch2" onClick="Tab_to_switch('touch',2,2)">PC设置</a></div>
  <div class="top_right"><a id="touch1" class="tubiao_hover" onClick="Tab_to_switch('touch',1,2)">手机设置</a></div>
  <div class="clear"></div>
</div>
<div id="subNav">
  <div id="con_touch_1">
    <ul>
      <?php echo wap_get_lanmu_list(2,"products_list.php")?>
    </ul>
  </div>
  <div id="con_touch_2" style="display: none">
    <ul>
      <?php echo wap_get_pc_lanmu_list(2,"products_list.php")?>
    </ul>
  </div>
</div>
</body>
</html>