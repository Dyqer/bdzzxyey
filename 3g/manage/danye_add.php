<?php
require (dirname(__FILE__)."/common/common.php");

wap_admin_check_login();//登录验证

$lanmu = isset($_GET['lanmu'])?(int)$_GET['lanmu']:0;//获取所属栏目
if(!$lanmu){
	echo "<script>alert('请求参数不正确！');location.href='danye_lanmu.php'</script>";
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
	var editor1 = K.create('textarea[name="lc_content"]', {
		items : ['source','image','fullscreen'],
		allowImageRemote:false,
		designMode :true,
		resizeType :2,
		allowPreviewEmoticons : false,
		allowImageUpload : true,
		afterBlur:function(){ 
			this.sync(); 
		}
	});
	var editor2 = K.create('textarea[name="lc_phone_content"]', {
		items : ['source','image','fullscreen'],
		allowImageRemote:false,
		designMode :true,
		resizeType :2,
		allowPreviewEmoticons : false,
		allowImageUpload : true,
		afterBlur:function(){ 
			this.sync(); 
		}
	});
});
function check_add(){
	var title=$("#lc_title").val();
	if(!title){
		touchmsg("亲，标题不能为空！");
		return false;
		}
	}
</script>
<div id="top">
  <div class="top_left"><?php echo wap_admin_top()?></span></div>
  <!--<div class="top_right"><a id="tubiao">栏目列表</a></div>-->
  <div class="clear"></div>
</div>
<form name="myform" class="froms option con" action="danye_action.php" method="post" onSubmit="return check_add()">
  <input name="action" type="hidden" value="add">
  <input name="lanmu" type="hidden" value="<?php echo $lanmu?>">
  <p>单页标题：</p>
  <p>
    <input type="text" id="lc_title" name="lc_title">
  </p>
  <p>Touch单页内容:</p>
  <p>
    <textarea name="lc_phone_content" style="width: 100%; height: 300px"></textarea>
  </p>
  <p>PC单页内容:</p>
  <p>
    <textarea name="lc_content" style="width: 100%; height: 300px"></textarea>
  </p>
  <p>关键词：</p>
  <p>
    <input type="text" name="lc_keywords">
  </p>
  <p>描述：</p>
  <p>
    <input type="text" name="lc_description">
  </p>
  <p>
    <input value="确定" type="submit" class="bton_1">
  </p>
</form>
</div>
</body>
</html>