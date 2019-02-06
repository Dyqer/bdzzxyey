<?php
require (dirname(__FILE__).'/common/common.php');
admin_checklogin_sub();//登录验证
get_qx('gaoji');//是否有管理高级功能权限
SetSysEvent('banner_add');//添加日志功能

$type = isset($_GET['type'])?(int)$_GET['type']:1;//获取类型（1是banner2是广告图）
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo constant("web_name")?>- 后台管理系统</title>
<?php require('sub_linkfile.php')?>
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
<style type="text/css">
.input {
	width: 450px
}
</style>
</head>
<body>
<form action="action/banner_action.php" method="post" onSubmit="return add_check()" enctype="multipart/form-data">
  <input name="type" type="hidden" value="<?php echo $type?>"><input name="action" type="hidden" value="add">
  <table width="95%" border="0" cellspacing="0" cellpadding="0" style="margin:0 auto">
    <tr>
      <td colspan="2" height="10"></td>
    </tr>
    <tr>
      <td><h2 align="right">图文标题：</h2></td>
      <td><input type="text" id="lc_title" class="edit_input" style="width:400px;" name="lc_title"></td>
    </tr>
    <tr>
      <td colspan="2" height="10"></td>
    </tr>
    <tr>
      <td><h2 align="right">图文类别：</h2></td>
      <td><select style="padding-top:3px;width:400px;" class="edit_input" size="1" name="c_id">
          <?php
				$sql = "select * from ".lc()."_banner_type where c_type='{$type}' order by c_sort_id desc";
				$rs = mysql_query($sql);
				if($rs){
					while($rows = mysql_fetch_assoc($rs)){?>
          <option value="<?php echo $rows['c_id']?>"><?php echo $rows['c_title']?></option>
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
      <td><input type="text" class="edit_input" style="width:400px;" name="lc_url"></td>
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