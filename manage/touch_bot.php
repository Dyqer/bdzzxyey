<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('touch');//是否有权限管理手机
SetSysEvent('tauch_bot');//添加日志功能

$sql = "select * from ".$lc."_touch where id=1";
$rs = mysql_query($sql);
if($rs){
	$rows=mysql_fetch_assoc($rs);
}
?>
<link rel="stylesheet" href="../resource/kindeditor/themes/default/default.css" />
<script src="../resource/kindeditor/kindeditor.js"></script>
<script src="../resource/kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript">
KindEditor.ready(function(K) {
	var editor1 = K.create('textarea[name="lc_content"]', {
		allowFileManager : true,
		afterBlur:function(){ 
			this.sync(); 
		}
	});
});
function save_bot(id){
	var content = $("#lc_content").val();
	$.post('action/touch_ajax.php',{id:id,content:content,action:'bot'},function(data){
		if(data == 'yes'){
			mx_msg("修改成功！");
		}else{
			mx_msg("修改失败！");
		}
	})
}
</script>
<div class="mx_right_top">
  <div class="operatearea">
    <ul class="operateul">
      <li><a class="typemanage" href="list.php?C=touchconfig">系统设置</a></li>
      <li><a class="typemanage" href="list.php?C=touch_banner_list">Banner管理</a></li>
      <li><a class="typemanageh" href="list.php?C=touch_bot">底部信息</a></li>
      <li><a class="typemanage" href="list.php?C=touch_introduction">公司简介</a></li>
    </ul>
  </div>
</div>
<div style="margin-left:25px; margin-top:20px">
  <textarea cols="100" name="lc_content" id="lc_content" style="width: 680px; height: 300px"><?php echo $rows['touch_footer']?></textarea>
  <div style="margin-top:15px">
    <input type="button" value="保存" class="checkall_sub" onClick="save_bot(1)">
  </div>
</div>