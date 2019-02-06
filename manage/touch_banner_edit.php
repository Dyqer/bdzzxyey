<?php
require (dirname(__FILE__).'/common/common.php');
admin_checklogin_sub();//登录验证
get_qx('touch');//是否有权限管理手机
SetSysEvent('touch_banner_edit');//添加日志功能

$id = isset($_GET['id'])?(int)$_GET['id']:0;//编号

$sql = "select * from ".$lc."_touch_banner where lc_id = '{$id}'";
$rs = mysql_query($sql);
if($rs){
	$rows=mysql_fetch_assoc($rs);
}
get_qx('touch');
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
<input name="id" type="hidden" value="<?php echo $rows['lc_id']?>">
<input name="action" type="hidden" value="edit">
 <table width="90%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin:0 auto">
    <tr>
      <td colspan="2" height="15"></td>
    </tr>
    <tr>
      <td><h2>标&nbsp;&nbsp;&nbsp;&nbsp;题：</h2></td>
      <td><input type="text" name="lc_title" id="lc_title" style="width: 440px" class="edit_input" value="<?php echo $rows['lc_title']?>"></td>
    </tr>
    <tr>
      <td colspan="2" height="10"></td>
    </tr>
    <tr>
      <td><h2>图&nbsp;&nbsp;&nbsp;&nbsp;片：</h2></td>
      <td>
        <input type="button" value="&nbsp;&nbsp;选&nbsp;择&nbsp;图&nbsp;片&nbsp;&nbsp;" onclick="lc_pic.click()" style="width:100px;" class="button">
        <input type="file" id="lc_pic" name="lc_pic" style="display:none">
      </td>
    </tr>
    <tr>
      <td colspan="2" height="10"></td>
    </tr>
    <tr>
      <td><h2>外部链接：</h2></td>
      <td><input type="text" name="lc_url" style="width: 440px" class="edit_input" value="<?php echo $rows['lc_url']?>"></td>
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