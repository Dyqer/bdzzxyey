<?php
require (dirname(__FILE__)."/common/common.php");

wap_admin_check_login();//登录验证

$id = isset($_GET['id'])?(int)$_GET['id']:0;//编号
$type = isset($_GET['type'])?(string)$_GET['type']:null;//获取类型（pc是电脑sj是手机）
if(!$type || !$id){
	echo "<script>alert('请求参数不正确！');location.href='danye_lanmu.php'</script>";
	exit;
	}
$sql = "select * from ".lc()."_danye where lc_id ='{$id}'";
$rs = mysql_query($sql);
if($rs){
	$rows=mysql_fetch_assoc($rs);
}
if($type=="touch"){
	$content = $rows['lc_phone_content'];
}
if($type=="pc"){
	$content = $rows['lc_content'];
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
<script charset="utf-8" src="../../resource/kindeditor/kindeditor-min.js"></script> 
<script charset="utf-8" src="../../resource/kindeditor/lang/zh_CN.js"></script> 
<script>
KindEditor.ready(function(K){
	var editor = K.create('textarea[name="content"]',{
	designMode : true,
	allowImageRemote:false,
	resizeType :2,
	allowPreviewEmoticons : false,
	allowImageUpload : true,
		afterBlur:function(){
			this.sync();
		},
	items : ['source','image','fullscreen']
	});
});
</script>
<div id="top">
  <div class="top_left"><?php echo wap_admin_top()?></span></div>
  <!--<div class="top_right"><a id="tubiao">栏目列表</a></div>-->
  <div class="clear"></div>
</div>
<form name="myform" class="froms option con" action="danye_action.php" method="post">
  <input name="action" type="hidden" value="edit">
  <input name="lanmu" type="hidden" value="<?php echo $lanmu?>">
  <input name="id" type="hidden" value="<?php echo $id?>">
  <input name="type" type="hidden" value="<?php echo $type?>">
  <p>设置标题：</p>
  <p>
    <input type="text" name="lc_title" value="<?php echo $rows['lc_title']?>">
  </p>
  <p>单页内容:</p>
  <p>
    <textarea name="content" style="width:100%;height:300px"><?php echo $content?></textarea>
  </p>
  <p>
    <input value="确定" type="submit"  class="bton_1">
  </p>
</form>
</body>
</html>