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
<div class="box" id="header">
  <div class="logo"><a href="main.php"><img src="resource/image/logo.png" /></a></div>
  <div class="clear"></div>
</div>
<div id="Nav">
  <ul>
    <li><a href="config_edit.php"><img src="resource/image/bd1.png" /></a><a href="config_edit.php">
      <p>系统设置</p>
      </a></li>
    <li><a href="danye_lanmu.php"><img src="resource/image/bd3.png" /></a><a href="danye_lanmu.php">
      <p>单页管理</p>
      </a></li>
    <li><a href="news_lanmu.php"><img src="resource/image/bd4.png" /></a><a href="news_lanmu.php">
      <p>新闻管理</p>
      </a></li>
    <li><a href="products_lanmu.php"><img src="resource/image/bd5.png" /></a><a href="products_lanmu.php">
      <p>图文管理</p>
      </a></li>
    <li><a href="jianli_list.php"><img src="resource/image/bd6.png" /></a><a href="jianli_list.php">
      <p>诚聘英才</p>
      </a></li>
    <li><a href="gbook_lanmu.php"><img src="resource/image/bd7.png" /></a><a href="gbook_lanmu.php">
      <p>留言管理</p>
      </a></li>
    <li><a href="online_edit.php"><img src="resource/image/bd8.png" /></a><a href="online_edit.php">
      <p>在线修改</p>
      </a></li>
    <li><a href="tel:400-622-8811"><img src="resource/image/bd9.png" /></a><a href="tel:400-622-8811">
      <p>客服热线</p>
      </a></li>
  </ul>
</div>
</body>
</html>