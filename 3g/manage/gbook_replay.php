<?php
require (dirname(__FILE__)."/common/common.php");

wap_admin_check_login();//登录验证

$id = isset($_GET['id'])?(int)$_GET['id']:0;//编号

$sql = "select * from ".lc()."_gbook where lc_id ='{$id}'";
$rs = mysql_query($sql);
if($rs){
	$rows=mysql_fetch_assoc($rs);
}?>
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
  <!--<div class="top_right"><a id="tubiao">栏目列表</a></div>-->
  <div class="clear"></div>
</div>
<form class="froms option con" action="gbook_action.php" method="post">
  <input name="action" type="hidden" value="reply">
  <input name="id" type="hidden" value="<?php echo $id?>">
  <p>留言标题：</p>
  <p>
    <input type="text" disabled value="<?php echo $rows['lc_title']?>">
  </p>
  <p>姓名：</p>
  <p>
    <input type="text" disabled value="<?php echo $rows['lc_name']?>">
  </p>
  <p>邮件：</p>
  <p>
    <input type="text" disabled value="<?php echo $rows['lc_email']?>">
  </p>
  <p>电话：</p>
  <p>
    <input type="text" disabled value="<?php echo $rows['lc_tel']?>">
  </p>
  <p>IP地址：</p>
  <p>
    <input type="text" disabled value="<?php echo $rows['lc_ip']?>">
  </p>
  <p>留言内容:</p>
  <p>
    <textarea disabled="disabled" style="width:100%"><?php echo $rows['lc_content']?></textarea>
  </p>
  <p>留言回复:</p>
  <p>
    <textarea name="lc_reply" style="width:100%"><?php echo $rows['lc_reply']?></textarea>
  </p>
  <p>
    <input value="确定" type="submit"  class="bton_1">
  </p>
</form>
</div>
</body>
</html>