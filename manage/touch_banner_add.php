<?php
require (dirname(__FILE__).'/common/common.php');
admin_checklogin_sub();//登录验证
get_qx('touch');//是否有权限管理手机
SetSysEvent('touch_banner_add');//添加日志功能

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo constant("web_name")?>- 后台管理系统</title>
<?php require('sub_linkfile.php')?>
<script type="text/javascript">
function touch_banner_check(){
	var title=document.getElementById("lc_title").value;
	if(title==""){
		mx_tipmsg('亲，标题不能为空！');
		return false;
		}
	}
</script>
</head>

<body>
<form action="action/touch_banner_action.php" method="post" enctype="multipart/form-data" onsubmit="return touch_banner_check()">
  <input name="action" type="hidden" value="add">
  <table width="90%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin:0 auto">
    <tr>
      <td colspan="2" height="15"></td>
    </tr>
    <tr>
      <td>标&nbsp;&nbsp;&nbsp;&nbsp;题：</td>
      <td><input type="text" name="lc_title" id="lc_title" style="width: 440px" class="edit_input"></td>
    </tr>
    <tr>
      <td colspan="2" height="10"></td>
    </tr>
    <tr>
      <td>图&nbsp;&nbsp;&nbsp;&nbsp;片：</td>
      <td>
        <input type="button" value="&nbsp;&nbsp;选&nbsp;择&nbsp;图&nbsp;片&nbsp;&nbsp;" onclick="lc_pic.click()" style="width:100px;" class="button">
        <input type="file" id="lc_pic" name="lc_pic" style="display:none">
      </td>
    </tr>
    <tr>
      <td colspan="2" height="10"></td>
    </tr>
    <tr>
      <td>外部链接：</td>
      <td><input type="text" name="lc_url" style="width: 440px" class="edit_input"></td>
    </tr>
    <tr>
      <td colspan="2" height="15"></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" value="提交" class="button"></td>
    </tr>
  </table>
</form>
</body>
</html>