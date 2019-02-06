<?php
require (dirname(__FILE__).'/common/common.php');
admin_checklogin_sub();//登录验证
get_qx('gaoji');//是否有管理高级功能权限
SetSysEvent('banner_type_add');//添加日志功能

$type = isset($_GET['type'])?(int)$_GET['type']:0;//获取类型
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo constant("web_name")?>- 后台管理系统</title>
<?php require('sub_linkfile.php')?>
<script type="text/javascript">
function type_check(){
  var title=document.getElementById("c_title").value;
  if(title==""){
    mx_tipmsg('亲，标题不能为空！');
    return false;
    }
  }
</script>
</head>
<body>
<form action="action/banner_type_action.php" method="post" onSubmit="return type_check()">
  <input name="type" type="hidden" value="<?php echo $type?>">
  <input name="action" type="hidden" value="add">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">标&nbsp;&nbsp;&nbsp;&nbsp;题：</span></td>
      <td><input type="text" name="c_title" class="edit_input" id="c_title" style="width: 555px"></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">内&nbsp;&nbsp;&nbsp;&nbsp;容：</span></td>
      <td><div id="lc_content">
          <textarea name="lc_content" style="height:300px; width: 750px"></textarea>
        </div>
      </td>
    </tr>
    <tr class="edit_tr">
      <td></td>
      <td>
        <input type="submit" value="提交" class="edit_but select">
        <input type="button" value="返回" onClick="location.href='banner_type_list.php?type=<?php echo $type?>'" class="edit_but unselect">
      </td>
    </tr>
  </table>
</form>
</body>
</html>