<?php
require (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('products');//图文管理权限验证
SetSysEvent('products_show');//添加日志功能

$id = isset($_GET['id'])?(int)$_GET['id']:0;//图文编号
if($id==0){
	mx_msg("亲，请求参数错误！",1);
	exit;
}

$sql = "select * from ".$lc."_products where lc_id = '{$id}'";
$rs = mysql_query($sql);
if($rs){
	$rows = mysql_fetch_assoc($rs);
	/*获取多图*/
	$sql_list="select * from ".$lc."_products_pics where product_id='{$rows['lc_id']}'";
	$rs_list = mysql_query($sql_list);
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo constant("web_name")?>- 图文展示 - 后台管理系统</title>
<?php require('link_file.php')?>
<style type="text/css">
#main {
	background: none
}
#title {
	width: 200px;
	margin: 0 auto;
	text-align: center
}
#content {
	width: 800px;
	margin: 0 auto
}
#pic_list {
	width:800px; margin:0 auto;
}
#pic_list li { width:300px; float:left}
</style>
</head>

<body>
<?php require('head.php')?>
<div class="main">
  <?php require('left.php')?>
  <div class="mx_right" id="mx_right">
  	<div id="title">
    <h3><?php echo $rows['lc_title']?></h3>
  </div>
  <div id="content"><?php echo $rows['lc_content']?></div>
  <ul id="pic_list">
    <?php
      if($rs_list && mysql_num_rows($rs_list)>0){
		  while($rows_list = mysql_fetch_assoc($rs_list)){?>
          <li><img src="<?php echo $rows_list['lc_pic']?>" width="260" title="<?php $rows_list['lc_title']?>"></li>
		  <?php
          }
	}else{
		echo "暂无图片";
		}?>
  </ul>
  </div>
  <div class="clear"></div>
</div>
<?php require('foot.php')?>
</body>
</html>
