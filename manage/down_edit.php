<?php
require (dirname(__FILE__).'/common/common.php');
admin_checklogin_sub();//登录验证
get_qx('down');//是否有添加下载权限
SetSysEvent('down_edit');//添加日志功能

$id = isset($_GET['id'])?(int)$_GET['id']:0;//编号
$lanmu = isset($_GET['lanmu'])?(int)$_GET['lanmu']:0;//所属栏目
if(!$id){
  mx_msg("亲，请求参数有误！",'');
}

$sql = "select * from ".$lc."_down where lc_id = '{$id}'";
$rs = mysql_query($sql);
if($rs){
  $rows=mysql_fetch_assoc($rs);
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo constant("web_name")?>- 后台管理系统</title>
<?php require('sub_linkfile.php')?>
<script type="text/javascript">
function down_check(){
	var title=document.getElementById("lc_title").value;
	if(title==""){
		mx_tipmsg('亲，标题不能为空！');
		return false;
		}
	}
//编辑器初始化
KindEditor.ready(function(K) { 
  var editor = K.editor({ 
    allowFileManager : true 
    });
    K('#Kind_upload_file').click(function() {
      editor.loadPlugin('insertfile', function() {
        editor.plugin.fileDialog({
          fileUrl : K('#lc_url').val(),
          clickFn : function(url, title) {
            K('#lc_url').val(url);
            editor.hideDialog();
          }
        });
      });
    });
  })
</script>
</head>

<body>
<form action="action/down_action.php" method="post" enctype="multipart/form-data" onSubmit="return down_check()">
  <input name="lanmu" type="hidden" value="<?php echo $lanmu?>">
  <input name="id" type="hidden" value="<?php echo $rows['lc_id']?>">
  <input name="action" type="hidden" value="edit">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">标&nbsp;&nbsp;&nbsp;&nbsp;题：</span></td>
      <td><input type="text" name="lc_title" class="edit_input" id="lc_title" style="width:500px" value="<?php echo $rows['lc_title']?>">
        &nbsp;&nbsp;
        图片：
        <input type="button" value="&nbsp;&nbsp;选&nbsp;择&nbsp;图&nbsp;片&nbsp;&nbsp;" onclick="lc_pic.click()" class="button">  
        <input type="file" id="lc_pic" name="lc_pic" style="display:none">      
      </td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">下&nbsp;&nbsp;&nbsp;&nbsp;载：</span></td>
      <td>
        <select name="c_id" size="1" class="input" style="background-color: #ECF3FF;width:100px;height:30px">
          <?php get_down_type(0,$rows['c_id'],$lanmu)?>
        </select>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;来&nbsp;&nbsp;源&nbsp;&nbsp;
        <input type="text" name="lc_from" class="edit_input" id="lc_from" style="width:200px" value="<?php echo $rows['lc_from']?>">
        &nbsp;&nbsp;
        <input type="checkbox" name="lc_tj" value="1">
        推荐
        <input type="checkbox" name="lc_yc" value="1">
        是否远程图片
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;权&nbsp;&nbsp;&nbsp;&nbsp;限：&nbsp;&nbsp;
        <select name="lc_qx" class="input" style="width:70px;height:30px">
          <option value="0"
          <?php if($rows['lc_qx']==0){ echo 'selected="selected"';}?>>全部</option>
          <option value="1"
          <?php if($rows['lc_qx']==1){ echo 'selected="selected"';}?>>会员</option>
        </select></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">附&nbsp;&nbsp;&nbsp;&nbsp;件：</span></td>
      <td><input type="text" id="lc_url" name="lc_url" class="edit_input" style="width:500px;" value="<?php echo $rows['lc_url']?>">
      <span>&nbsp;&nbsp;&nbsp;<input type="button" id="Kind_upload_file" value="&nbsp;&nbsp;上&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;传&nbsp;&nbsp;" class="button"></span>    
      </td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">文&nbsp;章&nbsp;内&nbsp;容：</span></td>
      <td><div id="lc_content">
          <textarea name="lc_content" style="height:230px; width: 750px"><?php echo $rows['lc_content']?></textarea>
        </div></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">关&nbsp;键&nbsp;词：</span></td>
      <td><input type="text" name="lc_keywords" class="edit_input keywords" value="<?php echo $rows['lc_keywords']?>">
        <span class="edit_title">描&nbsp;述：</span>
        <input type="text" name="lc_description" class="edit_input description" value="<?php echo $rows['lc_description']?>"></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">文&nbsp;章&nbsp;简&nbsp;介：</span></td>
      <td><input type="text" name="lc_jianjie" class="edit_input intro" value="<?php echo $rows['lc_jianjie']?>"></td>
    </tr>
    <?php echo get_customfields('down',$rows)?>
    <tr class="sub_tr">
      <td colspan="2"><input type="submit" value="提交" class="button"></td>
    </tr>
  </table>
</form>
</body>
</html>