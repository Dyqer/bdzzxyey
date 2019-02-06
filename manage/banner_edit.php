<?php
require (dirname(__FILE__).'/common/common.php');
admin_checklogin_sub();//登录验证
get_qx('gaoji');//是否有管理高级功能权限
SetSysEvent('banner_edit');//添加日志功能

$id = isset($_GET['id'])?(int)$_GET['id']:0;

$sql = "select * from ".$lc."_banner where lc_id='{$id}'";
$rs = mysql_query($sql);
if($rs){
	$rows=mysql_fetch_assoc($rs);
	$type=$rows['lc_type'];//获取类型
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo constant("web_name")?>- 后台管理系统</title>
<?php require('sub_linkfile.php')?>
<style type="text/css">
#msg {
	padding: 3px 5px 3px 5px;
	background: #68af02;
	display: none
}
.input {
	width: 450px
}
</style>
<script type="text/javascript">
/*提交判断*/
function add_check(){
	var title=document.getElementById("lc_title").value;
	if(title==""){
		mx_tipmsg('亲，标题不能为空！');
		return false;
		}
	}
</script>
</head>
<body>
<form action="action/banner_action.php" method="post" onSubmit="return add_check()" enctype="multipart/form-data">
  <input name="id" type="hidden" value="<?php echo $rows['lc_id']?>"><input name="action" type="hidden" value="edit">
  <table width="95%" border="0" cellspacing="0" cellpadding="0" style="margin:0 auto">
    <tr>
      <td colspan="2" height="10"></td>
    </tr>
    <tr>
      <td><h2 align="right">图文标题：</h2></td>
      <td><input name="lc_title" type="text" class="edit_input" style="width:400px;" id="lc_title" value="<?php echo $rows['lc_title']?>"></td>
    </tr>
    <tr>
      <td colspan="2" height="10"></td>
    </tr>
    <tr>
      <td><h2 align="right">图文类别：</h2></td>
      <td><select style="width:400px;padding-top:3px" class="edit_input" size="1" name="c_id">
          <?php
				$sql2 = "select * from ".lc()."_banner_type where c_type='{$type}' order by c_sort_id desc";
				$rs2 = mysql_query($sql2);
				if($rs2){
					while($rows2 = mysql_fetch_assoc($rs2)){?>
          <option value="<?php echo $rows2['c_id']?>" <?php if($rows2['c_id']==$rows['c_id']){echo "selected=\"selected\"";}?>><?php echo $rows2['c_title']?></option>
          <?php }
				}
				?>
        </select></td>
    </tr>
    <tr>
      <td colspan="2" height="10"></td>
    </tr>
    <tr>
      <td><h2 align="right">Banner图：</h2></td>
      <td><!-- <input type="file" style="width:300px" class="input" name="banner"> -->
        <input type="button" style="width:100px" value="&nbsp;&nbsp;选&nbsp;择&nbsp;图&nbsp;片&nbsp;&nbsp;" onclick="banner.click()" class="button">
        <input type="file" id="banner" name="banner" style="display:none">
      </td>
    </tr>
    <tr>
      <td colspan="2" height="10"></td>
    </tr>
    <tr>
      <td><h2 align="right">链接地址：</h2></td>
      <td><input type="text" class="edit_input" style="width:400px;" name="lc_url" value="<?php echo $rows['lc_url']?>"></td>
    </tr>
    <tr>
      <td colspan="2" height="15"></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" class="button" value="提交"></td>
    </tr>
  </table>
</form>
</body>
</html>