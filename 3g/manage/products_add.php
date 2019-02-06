<?php
require (dirname(__FILE__)."/common/common.php");

wap_admin_check_login();//登录验证

$lanmu = isset($_GET['lanmu'])?$_GET['lanmu']:0;//获取所属栏目
if(!$lanmu){
	echo "<script>alert('请求参数不正确！');location.href='products_lanmu.php'</script>";
	exit;
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
<script type="text/javascript">
KindEditor.ready(function(K) {
	var editor;
	editor = K.create('textarea[name="lc_content"]', {
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
	var editor1;
	editor1 = K.create('textarea[name="lc_phone_content"]', {
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
<form name="myform" class="froms option con" action="products_action.php" method="post" enctype="multipart/form-data">
  <input name="action" type="hidden" value="add">
  <input name="lanmu" type="hidden" value="<?php echo $lanmu?>">
  <p>图文标题：</p>
  <p>
    <input type="text" name="lc_title" />
  </p>
  <p>添加图片：</p>
  <p>
    <input type="file" name="lc_pic" id="pre_file"/>
  </p>
  <p>选择类别：</p>
  <p>
    <select name="c_id">
      <?php echo get_products_type(0,$c_id,$lanmu);?>
    </select>
  </p>
  <p>图文来源：</p>
  <p>
    <input type="text" name="lc_from" />
  </p>
  <p>Touch图文内容:</p>
  <p>
    <textarea name="lc_phone_content" style="width:100%;height:300px"></textarea>
  </p>
  <p>PC图文内容:</p>
  <p>
    <textarea name="lc_content" style="width:100%;height:300px"></textarea>
  </p>
  <p>
    <input value="确定" type="submit"  class="bton_1">
    <input value="清空" type="reset"  class="bton_1">
  </p>
</form>
<!--<script src="resource/js/cut_img_touch.js"></script>-->
</body>
</html>