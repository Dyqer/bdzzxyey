<?php
require (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('xitong');//判断权限
$c = isset($_GET['C'])?$_GET['C']:"systemconfig";//控制器(默认打开系统配置)
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo constant("web_name")?> - 后台管理系统</title>
<?php require('link_file.php')?>
</head>
<body>
<?php require('head.php')?>
<div class="main">
  <?php require('left.php')?>
  <div class="mx_right" id="mx_right">
    <?php include($c.".php")?>
  </div>
  <div class="clear"></div>
</div>
<?php require('foot.php')?>
</body>
</html>