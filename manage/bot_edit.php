<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('gaoji');//高级管理权限验证
SetSysEvent('bot_edit');//添加日志功能

$id = isset($_GET['id'])?(int)$_GET['id']:0;
if(!$id){
	$id = isset($_POST['id'])?(int)$_POST['id']:0;
}

$sql = "select * from ".$lc."_dibu where lc_id = '{$id}'";
$rs = mysql_query($sql);
if($rs){
	$rows = mysql_fetch_assoc($rs);
}
?>
<script type="text/javascript">
$(function(){
	$.getScript('../resource/kindeditor/kindeditor.js', function() {
		KindEditor.basePath = '../resource/kindeditor/';
		KindEditor.create('textarea[name="lc_content"]',{
			allowFileManager : true,
			<?php if($id==4){?>filterMode : false,<?php }?>
			afterBlur:function(){
				this.sync(); 
			}
			});
	});
})
function save_bot(id){
	var content = $("#lc_content").val();
	$.post('action/bot_ajax.php',{id:id,content:content},function(data){
		if(data == 'yes'){
			mx_msg("修改成功！");
			}else{
				mx_msg("修改失败！");
				}
		})
	}
</script>
<div class="main_l">
  <div class="mx_right_top">
    <div class="operatearea">
      <ul class="operateul">
        <li><a class="release"><?php if($id==1){ echo '底部版权';}if($id==3){ echo '企业QQ';}if($id==4){ echo '嵌入代码';}?></a></li>
      </ul>
    </div>
  </div>
  <div class="mx_right_con">
    <div class="main_con">
		<table width="80%" style="margin-left:20px" align="center" cellpadding="3" cellspacing="1">
	      <tr>
	        <td height="10"></td>
	      </tr>
	      <tr>
	        <td><textarea name="lc_content" id="lc_content" style="width: 680px; height: 300px"><?php echo $rows['lc_content']?></textarea></td>
	      </tr>
	      <tr>
	        <td height="10"></td>
	      </tr>
	      <tr>
	        <td><input type="button" value="提交" class="checkall_sub" onClick="save_bot(<?php echo $id?>)"></td>
	      </tr>
	    </table>
    </div>
  </div>
</div>