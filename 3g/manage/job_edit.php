<?php
require (dirname(__FILE__)."/common/common.php");

wap_admin_check_login();//登录验证

$id = isset($_GET['id'])?(int)$_GET['id']:0;//编号

$sql = "select * from ".$lc."_job where lc_id = '{$id}'";
$rs = mysql_query($sql);
if($rs){
	$rows=mysql_fetch_assoc($rs);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title><?php echo constant("web_name")?>- 后台管理系统 - Powered by 龙采MX</title>
<?php require ('link_files.php')?>
<script charset="utf-8" src="../../resource/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="../../resource/kindeditor/lang/zh_CN.js"></script>
<script>
var editor;
KindEditor.ready(function(K) {
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
});
</script>
</head>
<body>
<?php require ('head.php')?>
<div id="top">
  <div class="top_left"><?php echo wap_admin_top()?></span></div>
  <!--<div class="top_right"><a id="tubiao">栏目列表</a></div>-->
  <div class="clear"></div>
</div>
<form class="froms option con" action="job_action.php" method="post" enctype="multipart/form-data">
  <input name="action" type="hidden" value="edit"><input name="id" type="hidden" value="<?php echo $rows['lc_id']?>">
  <p>招聘标题：</p>
  <p>
    <input type="text" name="lc_title" value="<?php echo $rows['lc_title']?>">
  </p>
  <p>招聘人数：</p>
  <p>
    <input type="text" name="lc_num" value="<?php echo $rows['lc_num']?>">
  </p>
  <p>招聘内容:</p>
  <p>
    <textarea name="lc_content" style="width:100%;height:300px"><?php echo $rows['lc_content']?></textarea>
  </p>
  <p>
    <input value="确定" type="submit"  class="bton_1">
    <input value="重置" type="reset"  class="bton_1">
  </p>
</form>
</body>
</html>