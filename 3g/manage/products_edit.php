<?php
require (dirname(__FILE__)."/common/common.php");

wap_admin_check_login();//登录验证

$id = isset($_GET['id'])?(int)$_GET['id']:0;//编号
$lanmu = isset($_GET['lanmu'])?(int)$_GET['lanmu']:0;//栏目
$type = isset($_GET['type'])?(string)$_GET['type']:null;//获取类型（pc是电脑sj是手机）
if(!$type){
	echo "<script>alert('请求参数不正确！');location.href='products_lanmu.php'</script>";
	exit;
	}
$sql = "select * from ".$lc."_products where lc_id = '{$id}'";
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
var editor;
KindEditor.ready(function(K) {
	editor = K.create('textarea[name="content"]', {
		designMode : true,
		allowImageRemote : false,
		resizeType : 1,
		allowPreviewEmoticons : false,
		allowImageUpload : true,
		afterBlur:function(){ 
			this.sync(); 
		},
		items : ['source','|','fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
		'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', '|', 'image', 'link']
	});
});

</script>
<div id="top">
  <div class="top_left"><?php echo wap_admin_top()?></span></div>
  <div class="top_right"><a class="tubiao_hover" href="products_pic.php?id=<?php echo $rows['lc_id']?>">图片管理</a></div>
  <div class="clear"></div>
</div>
<form class="froms option con" action="products_action.php" method="post" enctype="multipart/form-data">
  <input name="action" type="hidden" value="edit">
  <input name="lanmu" type="hidden" value="<?php echo $lanmu?>">
  <input name="id" type="hidden" value="<?php echo $id?>">
  <input name="type" type="hidden" value="<?php echo $type?>">
  <p>图文标题：</p>
  <p>
    <input type="text" name="lc_title" value="<?php echo $rows['lc_title']?>">
  </p>
  <p>添加图片：</p>
  <p>
    <input type="file" name="lc_pic">
  </p>
  <p>选择类别：</p>
  <p>
    <select name="c_id">
      <?php echo get_products_type(0,$rows['c_id'],$lanmu)?>
    </select>
  </p>
  <p>图文来源：</p>
  <p>
    <input type="text" name="lc_from" value="<?php echo $rows['lc_from']?>">
  </p>
  <p>图文内容:</p>
  <p>
    <textarea name="content" style="width:100%;height:300px"><?php echo $content?></textarea>
  </p>
  <p>
    <input value="确定" type="submit"  class="bton_1"/>
  </p>
</form>
<!--<script src="resource/js/cut_img_touch.js"></script>-->
</body>
</html>