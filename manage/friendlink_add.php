<?php
require (dirname(__FILE__).'/common/common.php');
admin_checklogin_sub();//登录验证
get_qx('gaoji');//是否有管理高级功能权限
SetSysEvent('friendlink_add');//添加日志功能
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
	width:400px;
	height: 31px;
	line-height: 31px;
	border:#dfdfdf 1px solid; padding-left:3px
}
</style>
</head>
<body>
<form action="action/friendlink_action.php" method="post" onSubmit="return add_check()" enctype="multipart/form-data">
  <input name="action" type="hidden" value="add">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">标题：</span></td>
      <td><input type="text" id="lc_title" class="input" name="lc_title"></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">类别：</span></td>
      <td><select name="c_id" class="input" style="background-color: #ECF3FF;width:100px;height:30px;">
          <?php
				$sql = "select * from ".lc()."_friendlink_type order by c_sort_id desc";
				$rs = mysql_query($sql);
				if($rs){
					while($rows = mysql_fetch_assoc($rs)){?>
                    <option value="<?php echo $rows['c_id']?>"><?php echo $rows['c_title']?></option>
					<?php }
				}
				?>
        </select></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">图片：</span></td>
      <td>
        <input type="button" style="width:100px" value="&nbsp;&nbsp;选&nbsp;择&nbsp;图&nbsp;片&nbsp;&nbsp;" onclick="pic.click()" class="button">
        <input type="file" id="pic" name="pic" style="display:none">
      </td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">链接地址：</span></td>
      <td><input type="text" class="input" name="lc_url"></td>
    </tr>
    <tr class="sub_tr">
      <td colspan="2"><input type="submit" value="提交" class="button"></td>
    </tr>
  </table>
</form>
</body>
</html>