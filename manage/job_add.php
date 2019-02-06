<?php
require (dirname(__FILE__).'/common/common.php');
admin_checklogin_sub();//登录验证
get_qx('job');//是否有管理职位权限
SetSysEvent('job_add');//添加日志功能
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo constant("web_name")?>- 后台管理系统</title>
<?php require('sub_linkfile.php')?>
<script type="text/javascript">
function add_job_check(){
  var title = document.getElementById('lc_title').value;
  if(title==""){
    mx_tipmsg('亲，标题不能为空！');
    return false;
    }
  }
</script>
</head>
<body>
<form action="action/job_action.php" method="post" onSubmit="return add_danye_check()">
  <input name="action" type="hidden" value="add">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">职&nbsp;位&nbsp;标&nbsp;题：</span></td>
      <td><input type="text" class="edit_input" name="lc_title" id="lc_title" style="width: 555px"></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">招&nbsp;聘&nbsp;人&nbsp;数：</span></td>
      <td><input type="text" name="lc_num" class="edit_input" id="lc_num" style="width: 150px"></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">内&nbsp;&nbsp;&nbsp;&nbsp;容：</span></td>
      <td><div id="lc_content">
          <textarea name="lc_content" style="height:260px; width: 750px"></textarea>
        </div></td>
    </tr>    
    <tr class="sub_tr">
      <td colspan="2"><input type="submit" value="提交" class="button"></td>
    </tr>
  </table>
</form>
</body>
</html>